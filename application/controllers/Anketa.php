<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anketa extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Anketa_model','anketa');
	}

	public function index()
	{
		$data['title'] = "Анкета";
		$data['results'] = $this->anketa->get_status();
		$this->load->view('templates/header', $data);
		$this->load->view('anketa/index', $data);
		$this->load->view('templates/footer');
	}

	public function submit()
	{
		$data= array(
			'ip_address' => $_SERVER['REMOTE_ADDR'],
			'visit_number' => $this->getVisitNumber(),
			'answers' => json_encode($this->input->post('answers')
			));
		$this->anketa->add_anketa($data);
		redirect(base_url());
	}
	private function getVisitNumber() {
		$current_number = $this->anketa->get_namber();
		return $current_number + 1;
	}


}
