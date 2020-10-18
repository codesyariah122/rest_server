<?php
class Mahasiswa_model extends CI_Model {

    public function show_data($table){
       return $this->db->get($table)->result();
    }

    public function delete_data($table){
        
    }

}