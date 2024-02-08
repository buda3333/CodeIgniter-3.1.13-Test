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
		$result_id = $this->input->post('result_id');
		$new_status = $this->input->post('new_status');
		$data = $this->admin->update_status($result_id,$new_status);
		echo json_encode(array('success' => $data));
	}

}
