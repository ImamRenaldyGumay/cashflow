<?php
class Laporan extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model("User_Model", "UM");
    }

    public function index() {
        $filter = $this->input->get('filter'); // Dapatkan filter dari input
        $tanggal = $this->input->get('tanggal'); // Format: YYYY-MM-DD
        $bulan = $this->input->get('bulan'); // Format: YYYY-MM
        $tahun = $this->input->get('tahun'); // Format: YYYY

        $data = [];
        if ($filter == 'harian') {
            $tanggal = $tanggal ?: date('Y-m-d'); // Default hari ini
            $data['transaksi'] = $this->UM->getHarian($tanggal);
        } elseif ($filter == 'bulanan') {
            $bulan = $bulan ?: date('Y-m'); // Default bulan ini
            $data['transaksi'] = $this->UM->getBulanan($bulan);
        } elseif ($filter == 'tahunan') {
            $tahun = $tahun ?: date('Y'); // Default tahun ini
            $data['transaksi'] = $this->UM->getTahunan($tahun);
        }

        $now = new DateTime();
        $data['tanggal_sekarang'] = $now->format('d-m-Y');

        // Kirimkan data input untuk tetap diisi
        $data['filter'] = $filter;
        $data['tanggal'] = $tanggal;
        $data['bulan'] = $bulan;
        $data['tahun'] = $tahun;

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