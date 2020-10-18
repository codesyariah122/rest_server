<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Mahasiswa_model', 'mhs');
    }

    public function index(){
        $data['mahasiswa'] = $this->mhs->show_data('mahasiswa');
        $this->load->view('mahasiswa/index', $data);
    }

}