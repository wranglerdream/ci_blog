<?php
/*
news 模型
*/
class Admin_Model extends CI_Model{
	
	public function __construct(){
		$this->load->database();
		$this->load->library('encrypt');
	}

	public function get_values(){
		$query = $this->db->get('admin');
		return $query->row_array();
	}

	public function up_passwd(){

		$apass = $this->input->post('apass');
		$data=array(
			'aPass'=>$this->encrypt->encode($apass),
		);

		$this->db->where('aName',$this->session->aName);
		$this->db->update('admin',$data);
	}
}