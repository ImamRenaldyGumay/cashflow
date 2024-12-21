<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User_Model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_user_by_id($user_id) {
        return $this->db->get_where('users', ['id' => $user_id])->row_array();
    }

    public function update_user_saldo($user_id, $saldo_baru) {
        $this->db->set('saldo_akhir', $saldo_baru);
        $this->db->where('id', $user_id);
        return $this->db->update('users');
    }

    public function cek_buku($id){
        $this->db->where('user_id', $id);
        $query = $this->db->get('books');
        return $query->result_array();
    }

    public function get_transaksi($user_id, $book_id){
        $this->db->select('transaksi.*, categories.category_name as kategori');
        $this->db->from('transaksi');
        $this->db->join('categories', 'transaksi.kategori_id = categories.id', 'left');
        $this->db->where('transaksi.user_id', $user_id);
        $this->db->where('transaksi.book_id', $book_id);
        $this->db->order_by('transaksi.tanggal', 'desc');

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return []; // Kembalikan array kosong jika tidak ada hasil
        }
    }

    public function get_pemasukkan(){
        $this->db->where('type', 'pemasukan');
        $query = $this->db->get('categories');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return []; // Kembalikan array kosong jika tidak ada hasil
        }
    }

    public function get_pengeluaran(){
        $this->db->where('type', 'pengeluaran');
        $query = $this->db->get('categories');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return []; // Kembalikan array kosong jika tidak ada hasil
        }
    }

    public function insert_transaksi($data) {
        return $this->db->insert('transaksi', $data);
    }
    // =================================================================

    // Laporan harian
    public function get_transaksi_by_date($user_id, $book_id, $tanggal) {
        $this->db->where('user_id', $user_id);
        $this->db->where('book_id', $book_id);
        $this->db->where('DATE(tanggal)', $tanggal);
        return $this->db->get('transaksi')->result_array();
    }

    // Laporan bulanan
    public function getBulanan($bulan) {
        $this->db->where('DATE_FORMAT(tanggal, "%Y-%m")', $bulan);
        return $this->db->get('transaksi')->result_array();
    }

    // Laporan tahunan
    public function getTahunan($tahun) {
        $this->db->where('YEAR(tanggal)', $tahun);
        return $this->db->get('transaksi')->result_array();
    }
}
?>