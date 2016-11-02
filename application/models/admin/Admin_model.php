<?php
/*
news 模型
*/
class Admin_Model extends CI_Model{
	
	public function __construct(){
		$this->load->database();
	}

	public function get_values(){
		$query = $this->db->get('admin');
		return $query->row_array();
	}
}