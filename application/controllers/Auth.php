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
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email', [
            'required' => 'Email wajib diisi.',
            'valid_email' => 'Masukkan email yang valid.'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required', ['required' => 'Password wajib diisi.']);

        // Jika validasi gagal
        if ($this->form_validation->run() == FALSE) {
            $data = [
                'title' => "Login - Cashflow",
            ];

            $this->load->view('Layout/auth_header', $data);
            $this->load->view('Auth/login', $data);
            $this->load->view('Layout/auth_footer');
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $admin = $this->AM->check_admin($email, $password);
            if ($admin) {
                $this->session->set_userdata([
                    'user_id' => $admin['id'],
                    'email' => $admin['email'],
                    'role' => 'admin',
                    'name' => $admin['name'],
                    'logged_in' => true,
                ]);
                $this->session->set_flashdata('success', 'Login berhasil!');
                redirect('Dashboard');
            }else{
                // Jika bukan admin, cek sebagai user biasa
                $user = $this->AM->check_user($email, $password);
                if ($user) {
                    $cek_buku = $this->AM->cek_buku_kas($user['id']);
                    if (empty($cek_buku)) {
                        $this->session->set_userdata([
                            'user_id' => $user['id'],
                            'email' => $user['email'],
                            'role' => 'user',
                            'name'=> $user['name'],
                            'logged_in' => true,
                        ]);
                        // $this->session->set_flashdata('success', 'Login berhasil!');
                        redirect('BuatBukuKas/index');
                    }else{
                        $this->session->set_userdata([
                            'user_id' => $user['id'],
                            'email' => $user['email'],
                            'role' => 'user',
                            'name'=> $user['name'],
                            'logged_in' => true,
                        ]);
                        $this->session->set_flashdata('success', 'Login berhasil!');
                        redirect('User');
                    }
                }
            }

            $this->session->set_flashdata('error', 'Email dan Password Salah');
            redirect('Login');
        }
        
    }

    public function regis(){

        // Tambahkan aturan validasi
        $this->form_validation->set_rules('name', 'Nama', 'required', ['required' => 'Nama wajib diisi.']);
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[admins.email]', [
            'required' => 'Email wajib diisi.',
            'valid_email' => 'Masukkan email yang valid.',
            'is_unique' => 'Email sudah terdaftar. Silakan gunakan email lain.'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required', ['required' => 'Password wajib diisi.']);
        $this->form_validation->set_rules('password2', 'Confirm Password', 'required|matches[password]', [
            'required' => 'Konfirmasi password wajib diisi.',
            'matches' => 'Konfirmasi password tidak cocok dengan password.'
        ]);
        $this->form_validation->set_rules('agree_terms', 'Saya setuju dengan Syarat dan Ketentuan', 'required', [
            'required' => 'Anda harus menyetujui syarat dan ketentuan.'
        ]);

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
            $password = $this->input->post('password');

            $data = [
                'name' => $name,
                'email' => $email,
                'password' => md5($password),
                'created_at' => date('Y-m-d H:i:s'),
                // 'subscription_status' => 'inactive',
                // 'role' => 'user'
            ];

            // Simpan ke database
            if ($this->AM->register_admin($data)) {
                $user_id = $this->db->insert_id();
                // $this->session->set_userdata([
                //     'user_id' => $user_id,
                //     'email' => $email,
                //     'role' => 'user',
                //     'logged_in' => true,
                //     'subscription_status' => 'inactive'
                // ]);
                $this->session->set_flashdata('success','Registrasi berhasil. Silakan login.');
                redirect('Login');
            } else {
                $this->session->set_flashdata('error', 'Terjadi kesalahan. Silakan coba lagi.');
                $this->load->view('Regis');
            }
        }
        
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('Home');
    }
}
?>