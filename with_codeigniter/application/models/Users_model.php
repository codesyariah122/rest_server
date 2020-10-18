<?php
defined('BASEPATH') or exit ('No direct script access allowed');

class Users_model extends CI_Model {

    public function getUsers($id = null)
    {
        if($id === null){
            return $this->db->get('userdata')->result_array();
        }else{
            return $this->db->get_where('userdata', ['id'=>$id])->result_array();
        }

    }

    public function deleteUsers($id)
    {
        $this->db->delete('userdata', ['id'=>$id]);
        return $this->db->affected_rows();
    }

}