<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data = [
            'title'=> 'Home - Cashflow',
        ];

        $this->load->view('home', $data);
    }
}


?>