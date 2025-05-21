<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Bangkok");


class Check extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		$this->load->model( 'model_register' );
		$this->load->library ( 'form_validation' );
		 $lang=$this->session->userdata("lang")==null?"thailand":$this->session->userdata("lang");
		$this->lang->load($lang,$lang);
		
		
		}

	public function change($type)
	{
		$this->session->set_userdata('lang',$type);
		redirect("check","refresh");
	}



	public function auth() {

		$id = $this->input->get('id_session');
		$auth_session = $this->input->get('auth_session');
		$auth_session_edit = $this->model_register->check_session($id);


		$check = $this->model_register->get_data_email_check_confirm1($id);


		if(!empty($check)){
			$id = $this->input->get('id_session');
			@$auth_session = $this->input->get('id_session');

			$this->model_register->email_confirm_complate($id);

			if($this->lang->line("set_lang")=="th"){
			echo "<script>
				alert('ยืนยันการสมัครสมาชิกเรียบร้อย กรอกเข้าสู่ระบบ');
				window.location.href='".base_url('sale?id_login='.$id)."';
			</script>";
			}else{
			echo "<script>
				alert('Confirm the subscription successfully. Fill in the sign');
				window.location.href='".base_url('sale?id_login='.$id)."';
			</script>";
			}
		}else{

			if($this->lang->line("set_lang")=="th"){
				echo "<script>
				alert('ลิ้งค์หมดอายุการใช้งาน');
				window.location.href='".base_url('member')."';
				</script>";
			}else{
				echo "<script>
				alert('The link has expired.');
				window.location.href='".base_url('member')."';
				</script>";
			}

		}

	
	}

	public function auth_change_pass() {
		
		$id = $this->input->get('id_session');
		$auth_session = $this->input->get('auth_session');
		$auth_session_edit = $this->model_register->check_session($id);

		if($auth_session != $auth_session_edit){

			if($this->lang->line("set_lang")=="th"){
				echo "<script>
				alert('ลิ้งค์หมดอายุการใช้งาน');
				window.location.href='".base_url('member')."';
				</script>";
			}else{
				echo "<script>
				alert('The link has expired.');
				window.location.href='".base_url('member')."';
				</script>";
			}
		}else{


			echo "<script>
				window.location.href='".base_url('member/change_password?id_login='.$id)."';
			</script>";
		}
		
	
	}
	
	


}