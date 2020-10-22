<?php

defined('BASEPATH') or exit ('No direct script allowed');

class Authentication extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model', 'login');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Login | Page';
        $data['uri'] = $this->uri->segment(1);

        if(!$this->session->userdata('username')){
            $this->template->MyView('contents/auth/login', $data);
        }else{
            redirect(base_url('authentication'));
        }

    }

    public function auth_login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        if(empty($username) OR empty($password)){
            $this->session->set_flashdata('Empty', 'Maaf kolom Username / Password, *Wajib di isi*');
            redirect(base_url('authentication/index'));
        }

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if($this->form_validation->run() !== false){
            $this->session->set_flashdata('success', 'Login Success');

            $where = [
                'username' => $username,
                'password' => $password
            ];
            $login = $this->login->cek_login('userdata', $where);
            
            if($login > 0){

                $stats_login = $this->login->login_status('userdata', ['username'=>$username]);
                
                $where = [
                    'username' => $username
                ];
                $user = $this->login->getUser('userdata', $where);

                $data_session = [
                    'username' => $username,
                    'name' => $user[0]['name'],
                    'status' => $user[0]['status']
                ];
                $this->session->set_userdata($data_session);

                redirect(base_url('home'));

            }else{
                $this->session->set_flashdata('Error', 'Password / Username salah');
                redirect(base_url('authentication/index'));
            }
        }

    }

    public function logout()
    {
        $data['title'] = 'Logout Session';
        $data['uri'] = $this->uri->segment(1);
        $data['breadcrumb'] == 'Logout';

        $this->session->sess_destroy();
        $this->login->logout_status('userdata', ['username' => $this->session->userdata('username')]);
        redirect(base_url('authentication/index'));
    }

}