<?php
class Category_model extends CI_Model {

    public function get_all_categories() {
        $query = $this->db->get('categories');
        return $query->result();
    }

    public function add_category($name, $type) {
        $data = array(
            'name' => $name,
            'type' => $type
        );
        $this->db->insert('categories', $data);
    }

    public function delete_category($id) {
        $this->db->delete('categories', array('id' => $id));
    }
}
