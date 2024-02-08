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

	public function add_anketa($data) {

		$this->db->insert('anketas', $data);
	}



}
