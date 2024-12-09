<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_Model extends CI_Model {
    
    // Simpan data user ke database
    public function register_user($data) {
        return $this->db->insert('users', $data);
    }

    // Cek login di tabel admin
    public function check_admin($email, $password) {
        $this->db->where('email', $email);
        $query = $this->db->get('admins');
        
        if ($query->num_rows() == 1) {
            $admin = $query->row();
            if (password_verify($password, $admin->password)) {
                return [
                    'id' => $admin->id,
                    'email' => $admin->email,
                    'role' => 'admin' // Tetapkan role admin
                ];
            }
        }
        return false;
    }

    // Cek login di tabel user
    public function check_user($email, $password) {
        $this->db->where('email', $email);
        $query = $this->db->get('users'); // Tabel `users`
        
        if ($query->num_rows() == 1) {
            $user = $query->row();
            if (password_verify($password, $user->password)) {
                return [
                    'id' => $user->id,
                    'email' => $user->email,
                    'role' => 'user'
                ];
            }
        }
        return false;
    }
}
