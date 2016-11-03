<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{
	
	public function __construct(){
       parent::__construct();
       $this->load->helper('captcha');
       $this->load->library('session');
       $this->load->library('encrypt');
       $this->load->helper('form');
       $this->load->library('form_validation');
       $this->load->model('admin/admin_model');
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

		  $_SESSION['captcha'] = create_captcha($vals);
    }

    public function login_run(){

      $this->form_validation->set_rules('aname', 'Aname', 'required');
      $this->form_validation->set_rules('apass', 'Apass', 'required');
      $this->form_validation->set_rules('acode', 'Acode', 'required');

      if($this->form_validation->run() === FALSE){
        $this->login_show();
      }else{

        if($this->input->post('acode')!=$_SESSION['captcha']){
          $data['errors_info'] = '验证码不正确，请重新填写';
          $this->load->view('admin/login_show',$data);
        }else{
          $admininfo = $this->admin_model->get_values();
          if($this->input->post('aname')!=$admininfo['aName']||$this->input->post('apass')!=$this->encrypt->decode($admininfo['aPass'])){
            $data['errors_info'] = '用户名或者密码不正确，请重新填写';
            $this->load->view('admin/login_show',$data);
          }else{
            $this->session->set_userdata($admininfo);
            redirect('admin/Admin/index');
          }
        }
      }
    }

    public function login_out(){
      session_destroy();
      redirect('admin/admin/index');
    }
}