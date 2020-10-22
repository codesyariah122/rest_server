<?php
defined('BASEPATH') or exit ('No direct script access allowed');

class Login_model extends CI_Model {

    public function getUser($table, $where)
    {
        return $this->db->get_where($table, $where)->result_array();
    }


    public function cek_login($table, $where)
    {
        $this->db->get_where($table, $where);
        return $this->db->affected_rows();
    }

    public function login_status($table, $where)
    {
        $this->db->set('status', 'status+1', FALSE);
        $this->db->where($where);
        $this->db->update($table);
    }

    public function logout_status($table, $where)
    {
        $this->db->set('status', 0, FALSE);
        $this->db->where($where);
        $this->db->update($table);
    }

}