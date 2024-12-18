<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User_Model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function cek_buku($id){
        $this->db->where('user_id', $id);
        $query = $this->db->get('books');
        return $query->result_array();
    }

    public function get_transaksi($user_id, $book_id){
        $this->db->where('user_id', $user_id);
        $this->db->where('book_id', $book_id);
        $this->db->order_by('tanggal', 'desc');
        $query = $this->db->get('transaksi');

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
    public function getHarian($tanggal) {
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