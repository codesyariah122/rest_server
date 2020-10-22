<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if(!$this->session->userdata('username')){
			redirect(base_url('authentication/'));
		}
	}


	public function index()
	{
		$data['title'] = $this->session->userdata('username');
		$data['status'] = ($this->session->userdata('status') == 1) ? 'Online' : 'Offline';
		$data['breadcrumb'] = '';
		$data['uri'] = $this->uri->segment(2);
		echo $data['uri'];
		$this->template->MyView('contents/userpage/home', $data);
	}

	public function library()
	{
		$data['title'] = $this->session->userdata('username');
		$data['breadcrumb'] = 'library';
		$data['uri'] = $this->uri->segment(2);
		echo $data['uri'];
		$this->template->MyView('contents/userpage/library', $data);
	}

}
