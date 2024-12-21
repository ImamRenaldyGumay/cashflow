<?php
class Laporan extends CI_Controller {
    public function __construct(){
        parent::__construct();
        if (!$this->session->userdata("logged_in")) {
            redirect('Login');
        }else{
            $this->load->model("User_Model", "UM");
        }
        
    }

    public function index() {
        $user_id = $this->session->userdata("user_id");
        $books = $this->UM->cek_buku($user_id);
        $data['books'] = $books;

        if (!empty($books) && count($books) === 1) {
            $book_id = $books[0]['id']; // Ambil ID buku pertama jika hanya ada satu
        } else {
            $data['message'] = "Anda belum memiliki buku kas. Silakan buat buku kas terlebih dahulu.";
            redirect('Login', 'refresh');
        }


        $tanggal = $this->input->post('tanggal');
        if ($tanggal) {
            $data['transaksi'] = $this->UM->get_transaksi($user_id, $book_id);
            if (empty($data['transaksi'])) {
                        // Tangani kasus ketika tidak ada data
                        $data['transaksi'] = []; // Atau bisa juga menampilkan pesan
                    }
        }

        
        $now = new DateTime();
        $data['tanggal_sekarang'] = $now->format('d-m-Y');

        $data['user_id'] = $user_id;
        $data['title'] = "Laporan Harian - CASHFLOW";
        $this->load->view('Layout/header', $data);
        $this->load->view('Layout/navbar');
        $this->load->view('Layout/sidebar');
        $this->load->view('User/laporan_harian', $data);
        $this->load->view('Layout/footer');
    }

    public function Bulanan(){
        $data['title'] = "Laporan Bulanan - CASHFLOW";
        $this->load->view('Layout/header', $data);
        $this->load->view('Layout/navbar');
        $this->load->view('Layout/sidebar');
        $this->load->view('User/laporan_bulanan', $data);
        $this->load->view('Layout/footer');
    }

    public function Tahunan(){
        $data['title'] = "Laporan Tahunan - CASHFLOW";
        $this->load->view('Layout/header', $data);
        $this->load->view('Layout/navbar');
        $this->load->view('Layout/sidebar');
        $this->load->view('User/laporan_tahunan', $data);
        $this->load->view('Layout/footer');
    }
}

?>