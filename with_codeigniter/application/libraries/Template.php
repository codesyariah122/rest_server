<?php 
defined('BASEPATH') or exit ('No direct script access allowed');

class Template {

    protected $ci_;

    public function __construct()
    {
        $this->ci_ = &get_instance();
    }

    public function MyView($content, $data=null)
    {
        $data['header'] = $this->ci_->load->view('templates/header', $data, TRUE);
        $data['content'] = $this->ci_->load->view($content, $data, TRUE);
        $data['footer'] = $this->ci_->load->view('templates/footer', $data, TRUE);

        $this->ci_->load->view('templates/index', $data);
    }
    

}