<?php 
use RestServer\Libraries\Rest_Controller;
defined('BASEPATH') or exit ('No script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Users extends REST_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Users_model', 'users');
        $this->methods['index_get']['limit'] = 100;
    }

    public function index_get()
    {
        $id = $this->get('id');
        $status = $this->get('status');

        if($id === null){
            $user = $this->users->getUsers();
        }else{
            $user = $this->users->getUsers($id);
        }

        if($status === 0){
            $user = $this->user->getOnline(0);
        }else{
            $user = $this->users->getOnline($status);
        }

        if($user){
            $this->response([
                'status' => true,
                'data' => $user,
            ], REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status' => FALSE,
                'message' => 'tidak ada user online'
            ], REST_Controller::HTTP_NOT_FOUND);
        }

    }

    public function index_delete()
    {
        $id = $this->delete('id');

        if($id === null){
            $this->response([
                'status' => false,
                'message' => 'input id terlebih dahulu'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }else{
            if($this->users->deleteUsers($id) > 0){
                $this->response([
                    'status' => true,
                    'id' => $id,
                    'message' => 'user berhasil dihapus'
                ], REST_Controller::HTTP_OK);
            }else{
                $this->response([
                    'status' => false,
                    'id' => $id,
                    'message' => 'id tidak ditemukan'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }


    public function index_post()
    {
        $data = [
            'username' => $this->post('username'),
            'name' => $this->post('name'),
            'email' => $this->post('email'),
            'password' => $this->post('password'),
            'status' => 0
        ];

        if($this->users->addUsers('userdata', $data) > 0){
            $this->response([
                'status' => true,
                'message' => 'new user has been added.'
            ], REST_Controller::HTTP_CREATED);
        }else{
            $this->response([
                'status' => false,
                'id' => $id,
                'message' => 'failed to created new user'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function index_put()
    {
        $id = $this->put('id');
        $data = [
            'username' => $this->put('username'),
            'name' => $this->put('name'),
            'email' => $this->put('email')
        ];

        if($this->users->updateUsers('userdata', $data, $id) > 0){
            $this->response([
                'status' => true,
                'message' => 'new user has been modified.'
            ], REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status' => false,
                'id' => $id,
                'message' => 'failed to modified data'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }

    }


}