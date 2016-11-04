<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('form');
        $this->load->library('form_validation');
		$this->load->model('admin/news_model');
		$this->load->model('admin/news_menu_model');
	}

	public function news_cls_add()
	{   
		if(!file_exists(APPPATH.'views/admin/news_cls_add.php')){
			show_404();
		}
         
        $data['one_news_menu_list']=$this->news_menu_model->get_one_news_menu(0);

		$this->load->view('admin/news_cls_add',$data);
	}

	public function news_menu_add_run(){
		$this->form_validation->set_rules('title','Title','required');
		if($this->form_validation->run()===FALSE){
			$this->news_cls_add();
		}else{
			$this->news_menu_model->news_menu_add_run();
			$this->news_cls_list();
		}
	}

	public function news_cls_list()
	{   
		if(!file_exists(APPPATH.'views/admin/news_cls_list.php')){
			show_404();
		}
        
        $data['news_cls_list'] = $this->news_menu_model->get_one_news_menu();
      
		$this->load->view('admin/news_cls_list',$data);
	}

	public function news_menu_del_run(){
		
		$id = $this->uri->segment(4);
		$this->news_menu_model->news_menu_del_run($id);
		$this->news_cls_list();
	}

	public function news_menu_all_run(){
		$all_do = $this->input->post('all_do');
		$id_array = $this->input->post('id');
		$sort_array = $this->input->post('sort');

		if($all_do==1){
            $this->news_menu_model->news_menu_sort_run($id_array,$sort_array);
		}else{
			
			$this->news_menu_model->news_menu_del_run($id_array);
		}
		
		$this->news_cls_list();
	}
    
	public function news_list()
	{   
		if(!file_exists(APPPATH.'views/admin/news_list.php')){
			show_404();
		}
        
        $data['news'] = $this->news_model->get_news();
      
		$this->load->view('admin/news_list');
	}
}