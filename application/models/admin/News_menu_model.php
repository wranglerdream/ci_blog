<?php
/*
news 模型
*/
class News_menu_Model extends CI_Model{
	
	public function __construct(){
		$this->load->database();
	}
    /**
    *获取一级分类的分类列表 or 单个分类信息
    */
	public function get_one_news_menu($id = FALSE){

		if($id === FALSE){
			$query = $this->db->order_by('pid')->get('news_menu');
			return $query->result_array();
		}

		$query = $this->db->get_where('news_menu',array('pid'=>$id));
		return $query->result_array();
	}

	/**
    *获取一级分类的分类列表 or 单个分类信息
    */
	public function news_menu_add_run(){
        
        $level = $this->input->post('pid')>0?2:1;
        $data = array(
        	'title'=>$this->input->post('title'),
        	'condition'=>$this->input->post('condition'),
        	'pid'=>$this->input->post('pid'),
        	'level'=>$level,
        	'sort'=>$this->input->post('sort'),
        	'addtime'=>time(),
        	'status'=>$this->input->post('status')
        );

        return $this->db->insert('news_menu',$data);
	}
}