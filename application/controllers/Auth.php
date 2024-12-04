<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller{
    public function __construct(){
        parent::__construct();
    }

    public function login(){
        $data = [
            'title' => "Login - Cashflow"
        ];

        $this->load->view('Layout/auth_header', $data);
        $this->load->view('Auth/login', $data);
        $this->load->view('Layout/auth_footer');
    }

    public function regis(){
        $data = [
            'title' => "Register - CASHFLOW"
        ];

        $this->load->view('Layout/auth_header', $data);
        $this->load->view('Auth/register');
        $this->load->view('Layout/auth_footer');
    }
}
?>