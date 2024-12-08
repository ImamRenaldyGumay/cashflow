<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('Auth_Model', 'AM');
        $this->load->library('form_validation');
    }

    public function login(){
        // Aturan validasi form
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        // Jika validasi gagal
        if ($this->form_validation->run() == FALSE) {
            $data = [
                'title' => "Login - Cashflow"
            ];

            $this->load->view('Layout/auth_header', $data);
            $this->load->view('Auth/login', $data);
            $this->load->view('Layout/auth_footer');
        }else{
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            // Cek login sebagai admin terlebih dahulu
            $admin = $this->AM->check_admin($email, $password);
            if ($admin) {
                // Simpan data admin ke session
                $this->session->set_userdata([
                    'user_id' => $admin['id'],
                    'email' => $admin['email'],
                    'role' => $admin['role'], // Role = admin
                    'logged_in' => true,
                ]);
                redirect('admin/dashboard'); // Redirect ke halaman admin
            }

            // Jika bukan admin, cek sebagai user biasa
            $user = $this->AM->check_user($email, $password);
            if ($user) {
                // Simpan data user ke session
                $this->session->set_userdata([
                    'user_id' => $user['id'],
                    'email' => $user['email'],
                    'role' => $user['role'], // Role = super_user / user
                    'logged_in' => true,
                ]);

                // Redirect berdasarkan role user
                if ($user['role'] === 'super_user') {
                    redirect('superuser/dashboard');
                } else {
                    redirect('user/dashboard');
                }
            }

            // Jika login gagal
            $this->session->set_flashdata('error', 'Email atau password salah.');
            redirect('auth/login');
        }
        
    }

    public function regis(){

        // Tambahkan aturan validasi
        $this->form_validation->set_rules('name', 'Nama', 'required', ['required' => 'Nama wajib diisi.']);
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email', [
            'required' => 'Email wajib diisi.',
            'valid_email' => 'Masukkan email yang valid.'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required', ['required' => 'Password wajib diisi.']);
        $this->form_validation->set_rules('password2', 'Confirm Password', 'required|matches[password]', [
            'required' => 'Konfirmasi password wajib diisi.',
            'matches' => 'Konfirmasi password tidak cocok dengan password.'
        ]);
        $this->form_validation->set_rules('agree_terms', 'Syarat dan Ketentuan', 'required', [
            'required' => 'Anda harus menyetujui syarat dan ketentuan.'
        ]);

        // Jika validasi gagal
        if ($this->form_validation->run() == FALSE) {
            $data = [
                'title' => "Register - CASHFLOW"
            ];

            $this->load->view('Layout/auth_header', $data);
            $this->load->view('Auth/register');
            $this->load->view('Layout/auth_footer');
        } else {
             // Ambil data input dari form
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);

            // Data yang akan disimpan ke database
            $data = [
                'name' => $name,
                'email' => $email,
                'password' => $password,
                'created_at' => date('Y-m-d H:i:s'),
            ];

            // Simpan ke database
            if ($this->AM->register_user($data)) {
                $this->session->set_flashdata('success', 'Pendaftaran berhasil. Silakan login.');
                redirect('auth/login');
            } else {
                $this->session->set_flashdata('error', 'Terjadi kesalahan. Silakan coba lagi.');
                $this->load->view('auth/register');
            }
        }
        
    }

    public function buatBukuKas(){
        if ($this->form_validation->run() == FALSE) {
            $data = [
                'title' => "Buat Buku Kas - CASHFLOW"
            ];
    
            $this->load->view('Layout/auth_header', $data);
            $this->load->view('Auth/create_books');
            $this->load->view('Layout/auth_footer');
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}
?>