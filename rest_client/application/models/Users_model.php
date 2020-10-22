<?php 
use GuzzleHttp\Client;

class Users_model extends CI_model {

    private $_client;

    public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => 'http://localhost/rest_server_codeigniter/with_codeigniter/',
            'auth' => ['admin', '1234']
        ]);
    }

    public function getAllUser()
    {
        // return $this->db->get('userdata')->result_array();
        $response = $this->_client->request('GET', 'users', [
            'query' => [
                'user-api' => 'rest_x_1'
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);

        return $result['data'];
        
    }

    public function getUserById($id)
    {
        // return $this->db->get('userdata')->result_array();
        $client = new Client();
        $response = $this->_client->request('GET', 'users', [
            'query' => [
            'user-api' => 'rest_x_1',
            'id' => $id
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        
        return $result['data'][0];
    }

    public function tambahDataUser()
    {
        $data = [
            "username" => $this->input->post('username', true),
            'name' => $this->input->post('name', true),
            "email" => $this->input->post('email', true),
            "password" => $this->input->post('password1', true),
            "status" => 0
            ];

        // $this->db->insert('userdata', $data);
        $response = $this->_client->request('POST', 'users', [
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents());
        return $result;
    }

    public function hapusDataUser($id)
    {
        // $this->db->where('id', $id);
        // $this->db->delete('userdata', ['id' => $id]);
        $response = $this->_client->request('DELETE', 'users', [
            'form_params' => [
                'id' => $id,
                'user-api' => 'rest_x_1'
            ]
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        
        return $result;
    }

    public function ubahDataUser()
    {
        $data = [
            "username" => $this->input->post('username', true),
            "name" => $this->input->post('name', true),
            "email" => $this->input->post('email', true),
            "id" => $this->input->post('id', $id),
            'user-api' => 'rest_x_1'
        ];

        // $this->db->where('id', $this->input->post('id'));
        // $this->db->update('userdata', $data);
        $response = $this->_client->request('PUT', 'users', [
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents());
        return $result;
    }

    public function cariDataUser()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('username', $keyword);
        $this->db->or_like('email', $keyword);
        return $this->db->get('userdata')->result_array();
    }


    public function getOnline($url)
    {
        $data = curl_init();
        curl_setopt($data, CURLOPT_URL, $url);
        curl_setopt($data, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($data);
        curl_close($data);

        $online = json_decode($result, 1);
        
        if($online !== null){
            return $online['data'][0];
        }else{
            return $online;
        }

    }


}