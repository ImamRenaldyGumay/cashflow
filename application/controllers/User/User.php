<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('logged_in') != 'true'){
            $this->session->sess_destroy();
            redirect('Login');
        }else{
            $this->load->model('User_Model', 'UM');
        }
    }
    
    public function index() {
        $user_id = $this->session->userdata('user_id');
        // Ambil data buku kas pengguna
        $books = $this->UM->cek_buku($user_id);
        $data['books'] = $books;


        if (!empty($books) && count($books) === 1) {
            $book_id = $books[0]['id']; // Ambil ID buku pertama jika hanya ada satu
        } else {
            $data['message'] = "Anda belum memiliki buku kas. Silakan buat buku kas terlebih dahulu.";
            redirect('Login', 'refresh');
        }
        
        $data['transaksi'] = $this->UM->get_transaksi($user_id, $book_id);
        if (empty($data['transaksi'])) {
            // Tangani kasus ketika tidak ada data
            $data['transaksi'] = []; // Atau bisa juga menampilkan pesan
        }
        $data['pemasukkan'] = $this->UM->get_pemasukkan();
        $data['pengeluaran'] = $this->UM->get_pengeluaran();
        $data['book_id'] = $book_id;

        $data['title'] = "Dashboard - CASHFLOW";
        $this->load->view('Layout/header', $data);
        $this->load->view('Layout/navbar');
        $this->load->view('Layout/sidebar');
        $this->load->view('User/user_dashboard', $data);
        $this->load->view('Layout/footer');
        
    }

    public function tambah_transaksi() {
        $user_id = $this->input->post('user_id');
        $nominal = $this->input->post('nominal');
        $type = $this->input->post('type'); // 'pemasukan' atau 'pengeluaran'

        // Cek apakah sudah ada transaksi untuk pengguna ini
        $transaksi_terakhir = $this->db->order_by('tanggal', 'DESC')
                                        ->get_where('transaksi', ['user_id' => $user_id])
                                        ->row_array();

        // Jika belum ada transaksi, ambil saldo awal dari buku kas
        if (empty($transaksi_terakhir)) {
            $buku_kas = $this->db->get_where('books', ['user_id' => $user_id])->row_array();
            $saldo_akhir = $buku_kas['saldo_awal']; // Ambil saldo awal
        } else {
            // Jika sudah ada transaksi, ambil saldo akhir dari transaksi terakhir
            $saldo_akhir = $transaksi_terakhir['saldo_akhir'];
        }

        // Hitung saldo akhir baru berdasarkan jenis transaksi
        if ($type == 'pemasukan') {
            $saldo_akhir_baru = $saldo_akhir + $nominal;
        } else {
            $saldo_akhir_baru = $saldo_akhir - $nominal;
        }

        // Data untuk transaksi
        $data_transaksi = [
            'user_id' => $user_id,
            'book_id' => $this->input->post('book_id'),
            'tanggal' => date('Y-m-d H:i:s'),
            'kategori_id' => $this->input->post('kategori'),
            'deskripsi' => $this->input->post('deskripsi'),
            'nominal' => $nominal,
            'penulis' => $this->input->post('penulis'),
            'type' => $type,
            'saldo_akhir' => $saldo_akhir_baru // Simpan saldo akhir di transaksi
        ];

        // Mulai transaksi database
        $this->db->trans_start();

        // Tambahkan transaksi
        $this->db->insert('transaksi', $data_transaksi);

        // Perbarui saldo di buku kas
        $this->db->set('saldo_akhir', $saldo_akhir_baru);
        $this->db->where('user_id', $user_id);
        $this->db->update('books');

        // Selesaikan transaksi
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            // Jika ada kesalahan, rollback
            $this->db->trans_rollback();
            redirect('User', 'refresh');
            return false;
        } else {
            redirect('User', 'refresh');
            return true;
        }
    }



    // public function tambah_pemasukkan() {
    //     $data = [
    //         'user_id' => $this->input->post('user_id'),
    //         'book_id' => $this->input->post('book_id'),
    //         'tanggal' => $this->input->post('tanggal'),
    //         'kategori_id' => $this->input->post('kategori'),
    //         'deskripsi' => $this->input->post('deskripsi'),
    //         'nominal' => $this->input->post('nominal'),
    //         'type' => 'pemasukan',
    //         'penulis' => $this->input->post('penulis'),
    //         'created_at' => date('Y-m-d H:i:s'),
    //     ];

    //     $insert = $this->UM->insert_transaksi($data);
    //     if ($insert) {
    //         $this->session->set_flashdata('success', 'Transaksi berhasil ditambahkan');
    //     } else {
    //         $this->session->set_flashdata('error', 'Transaksi gagal ditambahkan');
    //     }
    //     redirect('User', 'refresh'); // Ganti dengan path yang sesuai
    // }

    // public function tambah_pengeluaran() {
    //     $data = [
    //         'user_id' => $this->input->post('user_id'),
    //         'book_id' => $this->input->post('book_id'),
    //         'tanggal' => $this->input->post('tanggal'),
    //         'kategori_id' => $this->input->post('kategori'),
    //         'deskripsi' => $this->input->post('deskripsi'),
    //         'nominal' => $this->input->post('nominal'),
    //         'type' => 'pengeluaran',
    //         'penulis' => $this->input->post('penulis'),
    //         'created_at' => date('Y-m-d H:i:s'),
    //     ];

    //     $insert = $this->UM->insert_transaksi($data);
    //     if ($insert) {
    //         $this->session->set_flashdata('success', 'Transaksi berhasil ditambahkan');
    //     } else {
    //         $this->session->set_flashdata('error', 'Transaksi gagal ditambahkan');
    //     }
    //     redirect('User', 'refresh');
    // }

    public function edit_transaksi() {
        $data = [
            'user_id' => $this->input->post('user_id'),
            'book_id'=> $this->input->post(''),
            'tanggal'=> $this->input->post(''),
            'kategori'=> $this->input->post(''),
            'deskripsi'=> $this->input->post(''),
            
        ];

        $edit = $this->UM->update_transaksi($data);
        if ($edit) {
            $this->session->set_flashdata('success', 'Transaksi berhasil diubah');
        } else {
            $this->session->set_flashdata('error', 'Transaksi gagal diubah');
        }
        redirect('User', 'refresh');
    }
}

?>
