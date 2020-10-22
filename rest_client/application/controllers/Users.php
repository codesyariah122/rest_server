<?php

class Users extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Users_model', 'user');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Daftar User';
        $data['users'] = $this->user->getAllUser();

        if( $this->input->post('keyword') ) {
            $data['users'] = $this->user->cariDataUser();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['judul'] = 'Form Tambah Data Users';

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('password1', 'Password1', 'required|max_length[6]');
        $this->form_validation->set_rules('password2', 'Password2', 'required|max_length[6]|matches[password1]');
        $this->form_validation->set_rules('email', 'Email', 'required');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', 'Error tambah user');

            $this->load->view('templates/header', $data);
            $this->load->view('user/tambah');
            $this->load->view('templates/footer');
        } else {
            $this->user->tambahDataUser();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('users');
        }
    }

    public function hapus($id)
    {
        $this->user->hapusDataUser($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('users');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Data Mahasiswa';
        $data['users'] = $this->user->getUserById($id);
        $this->load->view('templates/header', $data);
        $this->load->view('user/detail', $data);
        $this->load->view('templates/footer');
    }

    public function ubah($id)
    {
        $data['judul'] = 'Form Ubah Data User';
        $data['users'] = $this->user->getUserById($id);

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('user/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->user->ubahDataUser();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('users');
        }
    }

}
