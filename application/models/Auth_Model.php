<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_Model extends CI_Model {
    
    // Simpan data user ke database
    public function register_user($data) {
        return $this->db->insert('users', $data);
    }

    public function register_admin($data) {
        return $this->db->insert('admins', $data);
    }

    public function cek_buku_kas($user_id){
        $query = $this->db->get_where('books', ['user_id' => $user_id]);
        return $query->num_rows() > 0;
    }

    public function check_user($email, $password) {
        $user = $this->db->get_where('users', ['email' => $email])->row_array();

        // Jika pengguna ditemukan dan password cocok
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }

    public function check_admin($email, $password){
        // $query = $this->db->get_where('admins', ['email' => $email, 'password' => md5($password)]);
        // return $query->row_array();
        $this->db->where('email', $email);
        $this->db->where('password', md5($password));
        $query = $this->db->get('admins');
        return $query->row_array();

        // $user = $this->db->get_where('admins', ['email' => $email])->row_array();
        // if ($user && password_verify($password, $user['password'])) {
        //     return $user;
        // }
        // return false;
    }

    public function tambah_buku_kas($data){
        try{
            $this->db->insert('books', $data);
            return true;
        }catch(Exception $e){
            return false;
        }
        
    }

    public function tambah_kategori($user_id, $book_id, $category_name, $type) {
        $kategori_data = [
            'user_id' => $user_id,
            'book_id' => $book_id,
            'category_name' => $category_name,
            'type' => $type,
            'created_at' => date('Y-m-d H:i:s') // Menyimpan waktu pembuatan
        ];
        return $this->db->insert('categories', $kategori_data); // Menyimpan data kategori
    }
}
