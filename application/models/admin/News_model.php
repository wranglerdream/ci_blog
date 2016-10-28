<?php
/*
news 模型
*/
class News_Model extends CI_Model{
	
	public function __construct(){
		$this->load->database();
	}

	public function get_news($news_columnid = FALSE){

		if($news_columnid === FALSE){
			$query = $this->db->get('news');
			return $query->result_array();
		}

		$query = $this->db->get_where('news',array('news_columnid'=>$news_columnid));
		return $query->row_array();
	}
}