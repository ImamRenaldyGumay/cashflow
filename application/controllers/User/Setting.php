<?php
class Setting extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model("User_Model", "UM");
    }

    public function Kategori(){
        $data["title"] = 'Pengaturan - CASHFLOW';
        $this->load->view('Layout/header', $data);
        $this->load->view('Layout/navbar', $data);
        $this->load->view('Layout/sidebar', $data);
        $this->load->view('User/setting/kategori', $data);
        $this->load->view('Layout/footer', $data);
    }

    public function BukuKas(){
        $data["title"] = 'Pengaturan - CASHFLOW';
        $this->load->view('Layout/header', $data);
        $this->load->view('Layout/navbar', $data);
        $this->load->view('Layout/sidebar', $data);
        $this->load->view('User/setting/buku_kas', $data);
        $this->load->view('Layout/footer', $data);
    }

    public function Akun(){
        $data["title"] = 'Pengaturan - CASHFLOW';
        $this->load->view('Layout/header', $data);
        $this->load->view('Layout/navbar', $data);
        $this->load->view('Layout/sidebar', $data);
        $this->load->view('User/setting/akun', $data);
        $this->load->view('Layout/footer', $data);
    }

    public function MultiUser(){
        $data["title"] = 'Pengaturan - CASHFLOW';
        $this->load->view('Layout/header', $data);
        $this->load->view('Layout/navbar', $data);
        $this->load->view('Layout/sidebar', $data);
        $this->load->view('User/setting/multi_user', $data);
        $this->load->view('Layout/footer', $data);
    }

    public function RiwayatPembelian(){
        $data["title"] = 'Pengaturan - CASHFLOW';
        $this->load->view('Layout/header', $data);
        $this->load->view('Layout/navbar', $data);
        $this->load->view('Layout/sidebar', $data);
        $this->load->view('User/setting/riwayat_pembelian', $data);
        $this->load->view('Layout/footer', $data);
    }
}
?>