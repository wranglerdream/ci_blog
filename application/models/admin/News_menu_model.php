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
			$query = $this->db->order_by('pid,sort')->get('news_menu');
			return $query->result_array();
		}
        
        if($id>0){
            $query = $this->db->get_where('news_menu',array('id'=>$id));
            return $query->row_array();
        }else{
            $query = $this->db->get_where('news_menu',array('pid'=>$id));
            return $query->result_array();
        }
		
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

     /**
    *获取分类id 进行删除
    */
    public function news_menu_del_run($id = FALSE){

        if($id === FALSE){
            return false;
        }

        if(count($id)>1){
            $this->db->where_in('id',$id);
            $this->db->delete('news_menu');
        }else{
            $id=is_array($id) ? $id[0]:$id;
            $this->db->delete('news_menu',array('id'=>$id));
        }
    }

    /**
    *获取一级分类的分类列表 or 单个分类信息
    */
    public function news_menu_sort_run($id_array=array(),$sort_array=array()){
        if(count($id_array)<1||count($sort_array)<1){
            return false;
        }

        foreach($id_array as $key=>$val){

            $data = array('sort'=>$sort_array[$key]);
            
            $this->db->where('id',$val);
            
            $this->db->update('news_menu',$data);
        }
    }
}