<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("Asia/Bangkok");
class Member extends CI_Controller {


	function __construct()
	{
		parent::__construct();
		$this->load->model('model_member');
		$this->load->model('model_page');
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
		$this->load->helper('cookie');
		 $lang=$this->session->userdata("lang")==null?"thailand":$this->session->userdata("lang");
		$this->lang->load($lang,$lang);
	}

	public function change($type)
	{
		$this->session->set_userdata('lang',$type);
		$page_member = $this->session->userdata('page_member');
		$check = $page_member;
		if($type=="english"){
			$check_type = str_replace("/change/english","",$check);
		}elseif($type=="thailand"){
			$check_type = str_replace("/change/thailand","",$check);
		}
		redirect($check_type,"refresh");
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


		//////////////////set session check page///////////////////////////////

		$page = $this->session->userdata("page");
		$data['page'] = $this->session->userdata("page");




		////////////////////////////////////////////////////////////

		if($this->lang->line("set_lang")=="th"){
			$this->form_validation->set_message('required', 'กรุณากรอก{field}');
			$this->form_validation->set_rules('account_user', 'อีเมล', 'trim|required|xss_clean' );
			$this->form_validation->set_rules('pass', 'รหัสผ่าน', 'trim|required|xss_clean' );
			
		}else{
			$this->form_validation->set_message('required', 'fill {field} , Please');
			$this->form_validation->set_rules('account_user', 'email', 'trim|required|xss_clean' );
			$this->form_validation->set_rules('pass', 'password', 'trim|required|xss_clean' );
			
		}

		if($this->form_validation->run()==FALSE){
				$id_login1 = $this->session->userdata('member_id_log');
				$data['data_member'] = $this->model_page->get_data_check_pass($id_login1);
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
				$this->load->view("member/index",$data);
				$this->load->view("page/footer",$data);
		}else{

			if($this->input->post('login')){
				$user=$this->input->post('account_user');
				$pass=md5($this->input->post('pass'));
				if($user=="" ||$pass==""){

					if(!empty($this->session->userdata("car_top_id"))){
						redirect(base_url('buy/finance/'.$this->session->userdata("car_top_id").''), "refresh");
					}else{

						if(empty($page)){
							redirect(base_url('sale'), "refresh");
						}else{
							redirect(base_url('buy/'.$page), "refresh");
						}
					

					}

					
			}else{

			
				  $result=$this->model_member->login_email($user,$pass);
				  $email_confirm=$this->model_member->login_email1($user,$pass);                 
				
				if($result==true){


					if($email_confirm==1){
						if(!empty($this->session->userdata("car_top_id"))){
							redirect(base_url('buy/finance/'.$this->session->userdata("car_top_id").''), "refresh");
						}else{

							if(empty($page)){
								redirect(base_url('sale'), "refresh");
							}else{
								redirect(base_url('buy/'.$page), "refresh");
							}
						

						}

					}else{
						if($this->lang->line("set_lang")=="th"){
						echo "<script>alert('ยังไม่ได้ยืนยันอีเมลสมัครสมาชิก');</script>";
						}else{
							echo "<script>alert('Waiting for email confirmation.');</script>";
						}
					}
				
					  
				}else{ 
					

					if($this->lang->line("set_lang")=="th"){
						echo "<script>alert('กรุณาเข้าสู่ระบบใหม่อีกครั้ง');</script>";
					}else{
						echo "<script>alert('Please login again.');</script>";
					}
				}
			}
		}else if($this->session->userdata('member_log') && $this->session->userdata('member_log')==TRUE){

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
				$this->load->view("member/index",$data);
				$this->load->view("page/footer",$data);
			
			 return;
		}


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
		$this->load->view("member/index",$data);
		$this->load->view("page/footer",$data);

		}


	}

	
	
	public function logout() {

		$this->session->unset_userdata('car_top_id_buy');
		$this->session->unset_userdata('car_top_id');
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

		////////////////////////////////////////////////////////////

		
		$this->model_member->logout();
		redirect(base_url('home'), "refresh");
		//$this->index();
	}


	public function forgot_password(){
		if($this->lang->line("set_lang")=="th"){
			$this->form_validation->set_message('required', 'กรุณากรอก{field}เพื่อเปลี่ยนรหัสผ่าน');
			$this->form_validation->set_rules('email', 'อีเมล', 'trim|required|xss_clean' );
		}else{
			$this->form_validation->set_message('required', 'Please fill {field} for change password');
			$this->form_validation->set_rules('email', 'email', 'trim|required|xss_clean' );
		}

		if($this->form_validation->run()==FALSE){

			$data['error_email'] = "";

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
			$this->load->view('page/header',$data);
			$this->load->view('member/forgot_password',$data);
			$this->load->view('page/footer',$data);

		}else{
			$email = $this->input->post('email');
			$email_get = $this->model_member->get_data_email($email);

			if($email_get == FALSE){
				if($this->lang->line("set_lang")=="th"){
					$data['error_email'] = "อีเมลนี้ไม่พบในระบบ";
				}else{
					$data['error_email'] = "This email was not found in the system.";
				}
			}else{


				$email_get1 = $this->model_member->get_data_email1($email);
				$this->model_member->session_add($email_get1);
				$this->send_confirm_change_pass($email_get1);

				if($this->lang->line("set_lang")=="th"){
					echo "<script>alert('ส่งอีเมลเรียบร้อย กรุณาตรวจสอบอีเมลของท่าน');</script>";
					redirect(base_url('member'), "refresh");
				}else{
					echo "<script>alert('Emailed successfully Please check your email.');</script>";
					redirect(base_url('member'), "refresh");
				}

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
			$this->load->view('page/header',$data);
			$this->load->view('member/forgot_password',$data);
			$this->load->view('page/footer',$data);
		

		}	
	}



	public function send_confirm_change_pass($email_get1=""){

		$row = $this->model_member->get_data_confirm_change_pass($email_get1);

		$this->load->library('email');
		$config['protocol'] = 'mail';

		 $config['charset'] = 'utf-8';
		 $config['wordwrap'] = FALSE;
		 $config['mailtype'] = "html";
		 $config['newline'] = '<br>';
	     $config['crlf'] = '<br>'; 
		 $this->email->initialize($config);
			
		$this->email->from('contact-postsicar@postsicar.com','บริษัท POSTSICAR (ไทยแลนด์) จำกัด');
			
		$this->email->to($email_get1);
		$this->email->subject('ระบบเปลี่ยนรหัสผ่าน บริษัท POSTSICAR (ไทยแลนด์) จำกัด');

		$data="";
		$data.="ชื่อ-นามสกุล:".$row['name'];
		$data.="<br>";
		$data.="เบอร์โทรศัพท์:".$row['tel'];
		$data.="<br>";
		$data.="อีเมล:".$row['email'];
		$data.="<br>";
		$data.="รหัสผ่าน: **** ";
		$data.="<br>";
		$data.= '> > > > <a href="'.base_url().'check/auth_change_pass?auth_session='.$row['auth_session'].'&&email_session='.base64_encode($row['email']).'&&id_session='.$row['id'].'">ยืนยันอีเมล</a>';
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


	public function change_password(){

		if($this->lang->line("set_lang")=="th"){
			$this->form_validation->set_message('required', 'กรุณากรอก{field}');
			$this->form_validation->set_message('min_length', 'กรุณากรอก {field} ไม่ต่ำกว่า {param} หลัก.');

			$this->form_validation->set_rules('email', 'email', 'trim|xss_clean' );
		    $this->form_validation->set_rules('password', 'รหัสผ่าน', 'trim|min_length[6]|required|xss_clean' );
		    $this->form_validation->set_rules('re_password', 'ยืนยันรหัสผ่าน', 'trim|xss_clean' );
		}else{
			$this->form_validation->set_message('required', 'Please fill {field}');
			$this->form_validation->set_message('min_length', 'The {field} field must be at least {param} characters in length.');

			$this->form_validation->set_rules('email', 'email', 'trim|required|xss_clean' );
			$this->form_validation->set_rules('password', 'password', 'trim|min_length[6]|required|xss_clean' );
		    $this->form_validation->set_rules('re_password', 'confirm password', 'trim|xss_clean' );
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
			$id_login = $this->input->get('id_login');

			$data['member'] = $this->model_member->get_data_member($id_login);
			$id_login1 = $this->input->get('id_login');
			$data['data_member'] = $this->model_page->get_data_check_pass($id_login1);

			$data['errer_1'] = "";


			$this->load->view("page/header",$data);
			$this->load->view("member/change_password",$data);
			$this->load->view("page/footer",$data);

		}else{

			$id_login = $this->input->get('id_login');
			$data['member'] = $this->model_member->get_data_member($id_login);

			$check_pass = $this->model_member->get_check_pass($id_login);

			if($this->input->post('password') !== $this->input->post('re_password')){
			 	if($this->lang->line("set_lang")=="th"){
			 		$data['errer_1'] = "กรุณากรอกรหัสผ่านให้ตรงกัน";
			 	}else{
			 		$data['errer_1'] = "Please enter a valid password.";
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
				$id_login1 = $this->input->get('id_login');
				$data['data_member'] = $this->model_page->get_data_check_pass($id_login1);
				

				$this->load->view("page/header",$data);
				$this->load->view("member/change_password",$data);
				$this->load->view("page/footer",$data);



			 }else{

			 	$id_login = $this->input->get('id_login');
			
				$this->model_member->change_password($id_login);
				if($this->lang->line("set_lang")=="th"){
				 echo "<script>
					alert('เปลี่ยนรหัสผ่านเรียบร้อย');
					window.location.href='".base_url('member')."';
					</script>";
				}else{
				  echo "<script>
					alert('Password changed successfully.');
					window.location.href='".base_url('member')."';
					</script>";
				}

			 	
			 }



		}	
	
	}




	
}
