   <?php
   class Transaction_model extends CI_Model {

       public function get_all_transactions() {
           $query = $this->db->get('transactions');
           return $query->result();
       }
   }
