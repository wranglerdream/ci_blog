<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('session');
	}
    
	public function index()
	{   
        if($this->session->has_userdata('aName')&&$this->session->has_userdata('aPass')){
            $this->load->view('admin/index');
        }else{
        	redirect('admin/login/login_show');
        }
		
	}


	public function info()
	{   
        $this->load->view('admin/info');	
	}
}