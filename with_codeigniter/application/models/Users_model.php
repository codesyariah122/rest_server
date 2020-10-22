<?php 
defined('BASEPATH') or exit('No script access allowed');

class Users_model extends CI_Model {

    public function getUsers($id = null)
    {
        if($id === null){
            return $this->db->get('userdata')->result_array();
        }else{
            return $this->db->get_where('userdata', ['id' => $id])->result_array();
        }
    }

    public function getOnline($status = 0){
        if($status === 0){
            return $this->db->get('userdata')->result_array();
        }else{
            return $this->db->get_where('userdata', ['status' => $status])->result_array();
        }
    }

    public function deleteUsers($id)
    {
        $this->db->delete('userdata', ['id' => $id]);
        return $this->db->affected_rows(); 
    }

    public function addUsers($table, $data)
    {
        $this->db->insert($table, $data);
        return $this->db->affected_rows();
    }

    public function updateUsers($table, $data, $id)
    {
        $this->db->update($table, $data, ['id'=>$id]);
        return $this->db->affected_rows();
    }

}