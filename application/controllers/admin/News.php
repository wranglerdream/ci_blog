<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('admin/news_model');
	}
    
	public function index()
	{   
		if(!file_exists(APPPATH.'views/admin/news_list.php')){
			show_404();
		}
        
        $data['news'] = $this->news_model->get_news();
      
		$this->load->view('admin/news_list');
	}
}