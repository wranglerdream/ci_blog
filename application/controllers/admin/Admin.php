<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
        $this->load->library('encrypt');
		$this->load->library('session');
		$this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('admin/admin_model');
	}
    
	public function index()
	{   
        if($this->session->has_userdata('aName')&&$this->session->has_userdata('aPass')){
            $this->load->view('admin/index');
        }else{
        	redirect('admin/login/login_show');
        }
		
	}


	public function info(){
        
        $this->load->view('admin/info');	
	}

	public function passwd(){

		$this->load->view('admin/passwd');
	}

	public function passwd_run(){
	    $this->form_validation->set_rules('apasso', 'Apasso', 'required');
        $this->form_validation->set_rules('apass', 'Apass', 'required');
        $this->form_validation->set_rules('apass_sure', 'Apass_sure', 'required');

        if($this->form_validation->run() === FALSE){
            $this->passwd();
        }else{
            $admininfo = $this->admin_model->get_values();
          
            if($this->input->post('apasso')!=$this->encrypt->decode($admininfo['aPass'])){
                $data['errors_info'] = '原密码不正确，请重新填写';
                $this->load->view('admin/passwd',$data);
            }else{
                if($this->input->post('apass')!=$this->input->post('apass_sure')){
	                $data['errors_info'] = '两次输入密码不一致，请检查！';
	                $this->load->view('admin/passwd',$data);
	            }else{
	                $this->admin_model->up_passwd();
	                $this->session->sess_destroy();
	                redirect('admin/admin/index');
	            }  
            }   
        }
	}
}