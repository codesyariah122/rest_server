<?php
use RestServer\Libraries\Rest_Controller;

defined('BASEPATH') or exit ('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Users extends REST_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Users_model', 'users');
    }


    public function index_get()
    {
        $id = $this->get('id');
        if($id === null){
            $user = $this->users->getUsers();
        }else{
            $user = $this->users->getUsers($id);
        }

        
        if($user){
            $this->response([
                'status' => true,
                'data' => $user,
            ], REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status' => FALSE,
                'message' => 'id tidak ditemukan',
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function index_delete()
    {
        $id = $this->delete('id');

        if($id === null){
            $this->response([
                'status' => FALSE,
                'message' => 'input id terlebih dahulu',
            ], REST_Controller::HTTP_BAD_REQUEST);
        }else{
            if($this->users->deleteUsers($id) > 0){
                // ok
                $this->response([
                    'status' => true,
                    'id' => $id,
                    'message' => 'user berhasil dihapus.'
                ], REST_Controller::HTTP_OK);
            }else{
                // id not found
                $this->response([
                    'status' => false,
                    'id' => $id,
                    'message' => 'id tidak ada',
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }
}