<?php

class TestCurl extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Users_model', 'user');
    }

    public function getOnline()
    {
        $url = 'http://localhost/rest_server_codeigniter/with_codeigniter/users/?status=1';
        $data['online'] = $this->user->getOnline($url);
        // var_dump($data['online']); die;
        $data['offline'] = [
            'name' => 'Salam Jumpa Semua',
            'tag' => 'Halaman Resmi Offline'
        ];
        if($data['online']){
            $data['status'] = ($data['online']['status'] == 1) ? 'Online' : 'Offline';
            $this->load->view('user/online', $data);
        }else{
            $data['status'] = ($data['online']['status'] == 1) ? 'Online' : 'Offline';
            $this->load->view('user/offline', $data);
        }
        
    }

}


