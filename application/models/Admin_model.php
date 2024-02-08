<?php

class Admin_model extends CI_Model {


	public function __construct() {
		$this->load->database();
		$this->load->helper('url');
	}
	public function get_anketa()
	{
		$query= $this->db->get('anketas')->result();
		foreach ($query as $result) {
			$result->answers = json_decode($result->answers, true);
		}
		return $query;
	}
	public function update_status()
	{
		$result_id = $this->input->post('result_id');
		$new_status = $this->input->post('new_status');
		$data = array(
			'status' => $new_status
		);

		$this->db->where('id', $result_id);
		if ($this->db->update('anketas', $data)) {
			return true;
		} else {
			return false;
		}
	}


}
