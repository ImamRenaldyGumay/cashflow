<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('logged_in') != 'true'){
            redirect('Login');
        }else{
            // $this->load->model('Dashboard_model', 'DM');
        }
    }
    
    public function index() {
        $data = [
            'title' => "Dashboard - CASHFLOW"
        ];
        $this->load->view('Layout/header', $data);
        $this->load->view('Layout/navbar');
        $this->load->view('Layout/sidebar');
        $this->load->view('Dashboard_view');
        $this->load->view('Layout/footer');
    }
}

?>
