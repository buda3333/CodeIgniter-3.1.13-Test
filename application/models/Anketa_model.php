<?php

class Anketa_model extends CI_Model {


	public function __construct() {
		$this->load->database();
		$this->load->helper('url');
	}
	public function get_status()
	{
		$results = $this->db->where('status', 'Обработано')->get('anketas')->result();
		foreach ($results as $result) {
			$result->answers = json_decode($result->answers, true);
		}
		return $results;

	}

	public function add_anketa() {
		$data= array(
			'ip_address' => $_SERVER['REMOTE_ADDR'],
			'visit_number' => $this->getVisitNumber(),
			'answers' => json_encode($this->input->post('answers')
		));
		$this->db->insert('anketas', $data);
	}

	private function getVisitNumber() {
		// Здесь вы можете использовать механизм, чтобы определить номер визита
		return 1;
	}

}
