<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('Category_model');
        $this->load->helper(array('form', 'url'));
    }

    public function index() {
        $data['categories'] = $this->Category_model->get_all_categories();
        $this->load->view('category_view', $data);
    }

    public function add() {
        $name = $this->input->post('name');
        $type = $this->input->post('type');
        $this->Category_model->add_category($name, $type);
        redirect('category');
    }

    public function delete($id) {
        $this->Category_model->delete_category($id);
        redirect('category');
    }
}
