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

	public function get_namber()
	{
		$this->db->order_by('id', 'desc');
		$this->db->limit(1);
		$result = $this->db->select('visit_number')->get('anketas')->row();
		if ($result) {
			return $result->visit_number;
		} else {
			return 0;
		}
	}
}
