<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("Asia/Bangkok");
class Admin extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('model_admin');
		//$this->write_log();


	}

	
	public function index()
	{
		if($this->input->post('login')){	
			$user=$this->input->post('account_user');
			$pass=md5($this->input->post('pass'));
			if($user=="" ||$pass==""){
				echo "<script>alert('กรุณากรอกชื่อผู้ใช้หรือรหัสผ่านให้ถูกต้อง');</script>";
			}else{
				$result=$this->model_admin->login($user,$pass);	
				if($result==true){
					$data['result'] = $this->model_admin->get_data_menu();
						
					redirect(base_url('admin_management/main'), "refresh");
					// $this->load->view('admin/header');
					// $this->load->view('admin/main',$data);
					// $this->load->view('admin/footer');
					
					 return;
				}else{ 
					$text_stat = "Admin login fail : ".$this->input->post('account_user');
					echo "<script>alert('กรุณากรอกชื่อผู้ใช้หรือรหัสผ่านให้ถูกต้อง');</script>";
				}
			}
		}else if($this->session->userdata('admin_log_ikko') && $this->session->userdata('admin_log_ikko')==TRUE){

			$data['result'] = $this->model_admin->get_data_menu();
			redirect(base_url('admin_management/main'), "refresh");
			// $this->load->view('admin/header');
			// $this->load->view('admin/main',$data);
			// $this->load->view('admin/footer');
			return;
		}

	
		$this->load->view("admin/index");
	
		
	}

	public function logout() {

		$this->model_admin->logout();
		$this->index ();
	}
}

