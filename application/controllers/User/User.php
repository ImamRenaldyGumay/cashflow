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
            redirect('BuatBukuKas/index');
        }
        $data['book_id'] = $book_id;
        $data['title'] = "Dashboard - CASHFLOW";
        $data['transaksi'] = $this->UM->get_transaksi($user_id, $book_id);
        if (empty($data['transaksi'])) {
            // Tangani kasus ketika tidak ada data
            $data['transaksi'] = []; // Atau bisa juga menampilkan pesan
        }
        $data['pemasukkan'] = $this->UM->get_pemasukkan();
        $data['pengeluaran'] = $this->UM->get_pengeluaran();
        $data['book_id'] = $book_id;

        $this->load->view('Layout/header', $data);
        $this->load->view('Layout/navbar');
        $this->load->view('Layout/sidebar');
        $this->load->view('User/user_dashboard', $data);
        $this->load->view('Layout/footer');
        
    }

    public function tambah_transaksi() {
        // Ambil data transaksi baru
        $data = [
            'user_id' => $this->input->post('user_id'),
            'book_id' => $this->input->post('book_id'),
            'tanggal' => $this->input->post('tanggal'),
            'kategori_id' => $this->input->post('kategori'),
            'deskripsi' => $this->input->post('deskripsi'),
            'nominal' => $this->input->post('nominal'),
            'type' => $this->input->post('type'), // 'pemasukan' atau 'pengeluaran'
            'created_at' => date('Y-m-d H:i:s'),
        ];

        // Mulai proses transaksi
        $this->db->trans_start();

        // Tambahkan transaksi ke tabel transaksi
        $insert = $this->db->insert('transaksi', $data);

        if ($insert) {
            // Ambil saldo akhir pengguna saat ini
            $user_id = $this->input->post('user_id');
            $nominal = $this->input->post('nominal');

            // Ambil saldo akhir dari tabel buku kas
            $buku_kas = $this->db->get_where('books', ['user_id' => $user_id])->row_array();

            if ($buku_kas) {
                // Hitung saldo akhir baru
                if ($data['type'] == 'pemasukan') {
                    $saldo_akhir_baru = $buku_kas['saldo_akhir'] + $nominal;
                } else {
                    $saldo_akhir_baru = $buku_kas['saldo_akhir'] - $nominal;
                }

                // Perbarui saldo akhir di tabel buku kas
                $this->db->set('saldo_akhir', $saldo_akhir_baru);
                $this->db->where('user_id', $user_id);
                $this->db->update('books');

                $this->session->set_flashdata('success', 'Transaksi berhasil ditambahkan dan saldo akhir diperbarui.');
            } else {
                $this->session->set_flashdata('error', 'Buku kas tidak ditemukan untuk pengguna ini.');
                $this->db->trans_rollback();
                redirect('User', 'refresh'); // Ganti dengan path yang sesuai
                return;
            }
        } else {
            $this->session->set_flashdata('error', 'Transaksi gagal ditambahkan.');
            $this->db->trans_rollback();
            redirect('User', 'refresh'); // Ganti dengan path yang sesuai
            return;
        }

        // Selesaikan transaksi
        $this->db->trans_complete();

        // Redirect ke halaman pengguna
        redirect('User', 'refresh'); // Ganti dengan path yang sesuai
    }


    public function tambah_pemasukkan() {
        $data = [
            'user_id' => $this->input->post('user_id'),
            'book_id' => $this->input->post('book_id'),
            'tanggal' => $this->input->post('tanggal'),
            'kategori_id' => $this->input->post('kategori'),
            'deskripsi' => $this->input->post('deskripsi'),
            'nominal' => $this->input->post('nominal'),
            'type' => 'pemasukan',
            'penulis' => $this->input->post('penulis'),
            'created_at' => date('Y-m-d H:i:s'),
        ];

        $insert = $this->UM->insert_transaksi($data);
        if ($insert) {
            $this->session->set_flashdata('success', 'Transaksi berhasil ditambahkan');
        } else {
            $this->session->set_flashdata('error', 'Transaksi gagal ditambahkan');
        }
        redirect('User', 'refresh'); // Ganti dengan path yang sesuai
    }

    public function tambah_pengeluaran() {
        $data = [
            'user_id' => $this->input->post('user_id'),
            'book_id' => $this->input->post('book_id'),
            'tanggal' => $this->input->post('tanggal'),
            'kategori_id' => $this->input->post('kategori'),
            'deskripsi' => $this->input->post('deskripsi'),
            'nominal' => $this->input->post('nominal'),
            'type' => 'pengeluaran',
            'penulis' => $this->input->post('penulis'),
            'created_at' => date('Y-m-d H:i:s'),
        ];

        $insert = $this->UM->insert_transaksi($data);
        if ($insert) {
            $this->session->set_flashdata('success', 'Transaksi berhasil ditambahkan');
        } else {
            $this->session->set_flashdata('error', 'Transaksi gagal ditambahkan');
        }
        redirect('User', 'refresh');
    }

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
