<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{
	
	public function __construct(){
       parent::__construct();
       $this->load->helper('captcha');
       //$this->load->model('admin/admin_model');
	}

    public function login_show(){
    	if(!file_exists(APPPATH.'views/admin/login_show.php')){
    		show_404();
    	}
        
    	$this->load->view('admin/login_show');
    }

    public function get_captcha(){
    	$vals = array(
    		'word_length' => 4,
    		);

		  $vals = create_captcha($vals);
      
      echo $vals['word'];
      exit;
    }

    public function login_run(){
      echo 'dddd';
    }
}