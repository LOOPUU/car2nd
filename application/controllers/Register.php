<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Bangkok");

class Register extends CI_Controller {
	
	public function __construct() {
		parent::__construct ();
		$this->load->model( 'model_register' );
		$this->load->model( 'model_page' );
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
		$this->load->helper('security');

		  $lang=$this->session->userdata("lang")==null?"thailand":$this->session->userdata("lang");
		 $this->lang->load($lang,$lang);
	}

	public function change($type)
	{
		$this->session->set_userdata('lang',$type);
		redirect("register","refresh");
	}

	public function index()
	{

		if(!empty($this->session->userdata('car_top_id_buy'))){

			$data_update = array (
					'downpayment_check' =>  ""
				);
				$this->db->where('car_top_id',  $this->session->userdata('car_top_id_buy'));
				$this->db->update ( 'tbl_car_top', $data_update );	
		}

		//////////////////set session check step///////////////////////////////
		$this->session->unset_userdata('url1');
		$this->session->unset_userdata('step1');
		$this->session->unset_userdata('url2');
		$this->session->unset_userdata('step2');
		$this->session->unset_userdata('url3');
		$this->session->unset_userdata('step3');
		$this->session->unset_userdata('url4');
		$this->session->unset_userdata('step4');
		$this->session->unset_userdata('url5');
		$this->session->unset_userdata('step5');

		$this->session->unset_userdata('name_year_regis');
		$this->session->unset_userdata('name_year_pro');
		$this->session->unset_userdata('name_color');
		$this->session->unset_userdata('name_gear');
		$this->session->unset_userdata('name_capacity');
		$this->session->unset_userdata('name_mile');
		$this->session->unset_userdata('name_price');
		$this->session->unset_userdata('descript');
		$this->session->unset_userdata('device');
		$this->session->unset_userdata('downpayment');

		$page = $this->session->userdata("page");


		////////////////////////////////////////////////////////////

		$id_login1 = $this->session->userdata('member_id_log');
		$data['data_member'] = $this->model_page->get_data_check_pass($id_login1);
		
		if($this->lang->line("set_lang")=="th"){
			$this->form_validation->set_message('required', 'กรุณากรอก{field}');
			$this->form_validation->set_message('min_length', 'กรุณากรอก {field} ไม่ต่ำกว่า {param} หลัก.');
			$this->form_validation->set_message('max_length', 'กรุณากรอก {field} ไม่เกิน {param} หลัก.');
			$this->form_validation->set_message('unique_com', 'มีข้อมูลนี้อยู่ในระบบแล้ว');
			$this->form_validation->set_message('unique_com1', 'มีข้อมูลนี้อยู่ในระบบแล้ว');

		    $this->form_validation->set_rules('name', 'ชื่อ-นามสกุล', 'trim|required|xss_clean' );
		    $this->form_validation->set_rules('email', 'อีเมล', 'trim|required|xss_clean|unique_com1[tbl_login_member.email]' );
		    $this->form_validation->set_rules('tel', 'เบอร์โทรศัพท์', 'trim|numeric|min_length[10]|max_length[10]|required|xss_clean' );
		    $this->form_validation->set_rules('password', 'รหัสผ่าน', 'trim|min_length[6]|required|xss_clean' );
		    $this->form_validation->set_rules('re_password', 'ยืนยันรหัสผ่าน', 'trim|required|xss_clean' );
		}else{
			$this->form_validation->set_message('required', 'Please fill {field}');
			$this->form_validation->set_message('min_length', 'The {field} field must be at least {param} characters in length.');
			$this->form_validation->set_message('max_length', 'The {field} field cannot exceed {param} characters in length.');
			$this->form_validation->set_message('unique_com', 'This is already in the system.');
			$this->form_validation->set_message('unique_com1', 'This is already in the system.');

			$this->form_validation->set_rules('name', 'name-lastname', 'trim|required|xss_clean' );
		    $this->form_validation->set_rules('email', 'email', 'trim|required|xss_clean|unique_com1[tbl_login_member.email]' );
		    $this->form_validation->set_rules('tel', 'tel', 'trim|numeric|min_length[10]|max_length[10]|required|xss_clean' );
		    $this->form_validation->set_rules('password', 'password', 'trim|min_length[6]|required|xss_clean' );
		    $this->form_validation->set_rules('re_password', 'confirm password', 'trim|required|xss_clean' );
		}


		if($this->form_validation->run()==FALSE){
			$data['check_login_logout'] = $this->session->userdata('member_log');
			$data['menu'] = $this->model_page->get_data_menu();
			
			$data['about'] = $this->model_page->get_data_about($id=1);
			$data['menu_footer'] = $this->model_page->get_data_menu_footer();
			$data['menu_footer2'] = $this->model_page->get_data_menu_footer2();
			$data['contact'] = $this->model_page->get_data_contact($id=1);
			$data['contact_facebook'] = $this->model_page->get_data_contact_facebook($id=1);
			$data['contact_twitter'] = $this->model_page->get_data_contact_twitter($id=1);
			$data['contact_instragram'] = $this->model_page->get_data_contact_instragram($id=1);
			$data['setting'] = $this->model_page->get_data_setting($id=1);
			$data['confirm'] = "";

			$this->load->view("page/header",$data);
			$this->load->view("register/index",$data);
			$this->load->view("page/footer",$data);
		}else{


			if($this->input->post('password')==$this->input->post('re_password')){

				$config['upload_path'] = './uploads/';
	            $config['file_name']  = 'profile'.'_'.date('Ymd_His');
	            $config['allowed_types'] = 'gif|jpg|png';
	            $config['max_size'] = '0'; 
	            $config['max_height']  = '0'; 

	            $this->load->library('upload', $config);

	            $this->upload->initialize($config);

	            $input_name = "userfile";


	            $email = $this->input->post('email');
	            $this->model_register->get_data_email_check($email);


	            if ($this->upload->do_upload($input_name)){

                   $this->model_register->register_add();
 
	            }else{
	            	$this->model_register->register_add_img();
	            }


				$pass = $this->input->post('password');
				$email = $this->input->post('email');

				$this->send_email_confirm($pass,$email);

				if(empty($page)){
					$pp  = "home/";
				}else{
					$pp  = "buy/".$page;
				}

				if($this->lang->line("set_lang")=="th"){
					 echo "<script>
					alert('กรุณายืนยันการสมัครสมาชิกตามที่อยู่อีเมลของท่าน');
					window.location.href='".base_url(''.$pp.'')."';
					</script>";
				}else{
					 echo "<script>
					alert('Please confirm your subscription at your email address.');
					window.location.href='".base_url(''.$pp.'')."';
					</script>";
				}

			}else{

				if($this->lang->line("set_lang")=="th"){
					$data['confirm'] = "กรุณากรอกรหัสยืนยันให้ตรงกัน";
				}else{
					$data['confirm'] = "Please fill in the verification code.";
				}


				$data['check_login_logout'] = $this->session->userdata('member_log');
				$data['menu'] = $this->model_page->get_data_menu();
				
				$data['about'] = $this->model_page->get_data_about($id=1);
				$data['menu_footer'] = $this->model_page->get_data_menu_footer();
				$data['menu_footer2'] = $this->model_page->get_data_menu_footer2();
				$data['contact'] = $this->model_page->get_data_contact($id=1);
				$data['contact_facebook'] = $this->model_page->get_data_contact_facebook($id=1);
				$data['contact_twitter'] = $this->model_page->get_data_contact_twitter($id=1);
				$data['contact_instragram'] = $this->model_page->get_data_contact_instragram($id=1);
				$data['setting'] = $this->model_page->get_data_setting($id=1);

				$this->load->view("page/header",$data);
				$this->load->view("register/index",$data);
				$this->load->view("page/footer",$data);


			}

		}	
	}

	

	public function send_email_confirm($pass="",$email=""){

		$row = $this->model_register->get_data_email_confirm($email);

		$this->load->library('email');
		$config['protocol'] = 'mail';

		 $config['charset'] = 'utf-8';
		 $config['wordwrap'] = FALSE;
		 $config['mailtype'] = "html";
		 $config['newline'] = '<br>';
	     $config['crlf'] = '<br>'; 
		 $this->email->initialize($config);
			
		$this->email->from('contact-postsicar@postsicar.com','บริษัท POSTSICAR (ไทยแลนด์) จำกัด');
			
		$this->email->to($email);
		$this->email->subject('ระบบยืนยันการสมัครสมาชิก บริษัท POSTSICAR (ไทยแลนด์) จำกัด');

		$data="";
		$data.="ชื่อ-นามสกุล:".$row['name'];
		$data.="<br>";
		$data.="เบอร์โทรศัพท์:".$row['tel'];
		$data.="<br>";
		$data.= '> > > > <a href="'.base_url().'check/auth?auth_session='.$row['auth_session'].'&&email_session='.base64_encode($row['email']).'&&id_session='.$row['id'].'">ยืนยันอีเมล</a>';
		$data.="<br>";
		$data.="<br>";
		$data.='----------------------------------------';
		$data.="<br>";
		$data.="บริษัท POSTSICAR (ไทยแลนด์) จำกัด";
		$data.="<br>";
		$data.='----------------------------------------';
		$data.="<br>";
		$this->email->message($data); 
		$this->email->send();


	}

}
