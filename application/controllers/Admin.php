<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model','admin');
	}

	public function index()
	{
		$data['title'] = "Админ";
		$data['results'] = $this->admin->get_anketa();
		$this->load->view('templates/header', $data);
		$this->load->view('anketa/admin', $data);
		$this->load->view('templates/footer');
	}
	public function update() {
		$data = $this->admin->update_status();
		echo json_encode($data);
	}

}
