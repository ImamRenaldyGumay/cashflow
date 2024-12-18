<?php
class BuatBukuKas extends CI_Controller{
    function __construct() {
        parent::__construct();
        if($this->session->userdata('logged_in') != 'true'){
            redirect(base_url('Login'));
        }else {
            $this->load->model('Auth_Model', 'AM');
        }
    }

    function index() {
        $this->form_validation->set_rules('nama_buku_kas', 'Nama Buku Kas', 'required');
        $this->form_validation->set_rules('mata_uang', 'Mata Uang', 'required|max_length[3]');
        $this->form_validation->set_rules('saldo_awal', 'Saldo Awal', 'required');
        if ($this->form_validation->run() == FALSE) {
            $data = [
                'title' => "Buat Buku Kas - CASHFLOW",
            ];
            $this->load->view('Auth/create_books', $data);
        }else{
            $this->tambahBuku();
        }
    }
    public function tambahBuku(){
        if ($this->input->post()){
            $user_id = $this->session->userdata('user_id');
            $nama_buku_kas = $this->input->post('nama_buku_kas');
            $deskripsi = $this->input->post('deskripsi_buku_kas');
            $mata_uang = $this->input->post('mata_uang');
            $saldo_awal = $this->input->post('saldo_awal');

            $bukuKasData = [
                'user_id' => $user_id,
                'nama_buku_kas' => $nama_buku_kas,
                'deskripsi' => $deskripsi,
                'mata_uang' => $mata_uang,
                'saldo_awal' => $saldo_awal,
                'created_at' => date('Y-m-d H:i:s')
            ];
            $tambahBuku = $this->AM->tambah_buku_kas($bukuKasData);
            if ($tambahBuku) {
                $buku_id = $this->db->insert_id();
                $this->session->set_flashdata('success', 'Buku kas berhasil dibuat!');

                // Simpan kategori pemasukan
                $kategoriPemasukan1 = $this->input->post('kategori_pemasukan1');
                $kategoriPemasukan2 = $this->input->post('kategori_pemasukan2');
                $type = 'pemasukan';
                $this->AM->tambah_kategori($user_id, $buku_id, $kategoriPemasukan1, $type);
                $this->AM->tambah_kategori($user_id, $buku_id, $kategoriPemasukan2, $type);

                // Simpan kategori pengeluaran
                $kategoriPengeluaran1 = $this->input->post('kategori_pengeluaran1');
                $kategoriPengeluaran2 = $this->input->post('kategori_pengeluaran2');
                $type= 'pengeluaran';
                $this->AM->tambah_kategori($user_id, $buku_id, $kategoriPengeluaran1, $type);
                $this->AM->tambah_kategori($user_id, $buku_id, $kategoriPengeluaran2, $type);

                redirect('User');
            } else {
                $this->session->set_flashdata('error', 'Gagal membuat buku kas.');
                redirect('BuatBukuKas');
            }
        }
    }

    private function save_kategori($nama_kategori, $book_id, $type) {
        if (!empty($nama_kategori)) {
            // Simpan kategori ke database
            $kategori_data = [
                'book_id' => $book_id,
                'category_name' => $nama_kategori,
                'type' => $type
            ];
            $this->AM->add_kategori($kategori_data);
        }
    }
}
?>