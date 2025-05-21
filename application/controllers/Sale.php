<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("Asia/Bangkok");
class Sale extends CI_Controller {
	function __construct()
	{
		parent::__construct ();
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
		$this->load->helper('security');
		$this->load->model('model_page');
		  $lang=$this->session->userdata("lang")==null?"thailand":$this->session->userdata("lang");
		 $this->lang->load($lang,$lang);

		 if($this->session->userdata('member_log')!= TRUE)
		{
			redirect(base_url('member'), "refresh");
	
		}
	}

	public function change($type){
		$this->session->set_userdata('lang',$type);
		$page_sale = $this->session->userdata('page_sale');
		$check = $page_sale;
		if($type=="english"){
			$check_type = str_replace("/change/english","",$check);
		}elseif($type=="thailand"){
			$check_type = str_replace("/change/thailand","",$check);
		}

		redirect($check_type,"refresh");
	}

	public function index(){

	//////////////////set session check step///////////////////////////////
		if(!empty($this->session->userdata('car_top_id_buy'))){

			$data_update = array (
					'downpayment_check' =>  ""
				);
				$this->db->where('car_top_id',  $this->session->userdata('car_top_id_buy'));
				$this->db->update ( 'tbl_car_top', $data_update );	
		}

		$this->session->unset_userdata('url_step1');
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
		$this->session->unset_userdata("downpayment");

		$this->session->unset_userdata('name_type');
		$this->session->unset_userdata('name');
		$this->session->unset_userdata('name_model');
		$this->session->unset_userdata('name_model_des');
		$this->session->unset_userdata('province');


		$this->session->unset_userdata('page');

		////////////////////////////////////////////////////////////

	$id_login1 = $this->session->userdata('member_id_log');
	$data['data_member'] = $this->model_page->get_data_check_pass($id_login1);
	$id_login = $this->session->userdata('member_id_log');

		if($this->input->get('page')!="changepass"){
	
			if($this->lang->line("set_lang")=="th"){
				$this->form_validation->set_message('required', 'กรุณากรอก{field}');
				$this->form_validation->set_message('min_length', 'กรุณากรอก {field} ไม่น้อยกว่า {param} หลัก.');
				$this->form_validation->set_message('max_length', 'กรุณากรอก {field} ไม่เกิน {param} หลัก.');

				$this->form_validation->set_rules('name', 'ชื่อ-นามสกุล', 'trim|required|xss_clean' );
				$this->form_validation->set_rules('tel', 'เบอร์โทรศัพท์', 'trim|numeric|min_length[10]|max_length[10]|required|xss_clean' );
			}else{
				$this->form_validation->set_message('required', 'fill {field} , Please');
				$this->form_validation->set_message('min_length', 'The {field} field must be at least {param} characters in length.');
				$this->form_validation->set_message('max_length', 'The {field} field cannot exceed {param} characters in length.');

				$this->form_validation->set_rules('name', 'province', 'trim|required|xss_clean' );
				$this->form_validation->set_rules('tel', 'tel', 'trim|numeric|min_length[10]|max_length[10]|required|xss_clean' );
			}

			if($this->form_validation->run()==FALSE){

				$data['show_dis'] = "";
				$data['error_text2'] = "";	
				$data['error_text3'] = "";
				$data['check_login_logout'] = $this->session->userdata('member_log');
				$data['menu'] = $this->model_page->get_data_menu();
				$data['menu_footer'] = $this->model_page->get_data_menu_footer();
				$data['menu_footer2'] = $this->model_page->get_data_menu_footer2();
				$data['contact'] = $this->model_page->get_data_contact($id=1);
				$data['contact_facebook'] = $this->model_page->get_data_contact_facebook($id=1);
				$data['contact_twitter'] = $this->model_page->get_data_contact_twitter($id=1);
				$data['contact_instragram'] = $this->model_page->get_data_contact_instragram($id=1);
				$data['setting'] = $this->model_page->get_data_setting($id=1);

				$data['data_history'] =  $this->model_page->get_data_history_sale($id_login);
				$data['data_history_count'] =  $this->model_page->get_data_history_sale_count($id_login);

				$data['data_history_buy'] =  $this->model_page->get_data_history_buy($id_login);
				$data['data_history_count_buy'] =  $this->model_page->get_data_history_buy_count($id_login);

				$data['resume'] = $this->model_page->get_data_resume($id_login);
				$data['id_login'] = $this->session->userdata('member_id_log');
				
				$this->load->view('page/header',$data);
				$this->load->view('page/sale_resume_edit',$data);
				$this->load->view('page/footer',$data);

			 }else{

			 	$id = $this->session->userdata('member_id_log');
			 	$this->model_page->sale_resume_edit($id);
				$this->edit_image_profile($id);

			 }
		}else{
			if($this->lang->line("set_lang")=="th"){
				$this->form_validation->set_message('required', 'กรุณากรอก{field}');
				$this->form_validation->set_message('min_length', 'กรุณากรอก {field} ไม่ต่ำกว่า {param} หลัก.');
				$this->form_validation->set_message('max_length', 'กรุณากรอก {field} ไม่เกิน {param} หลัก.');

				$this->form_validation->set_rules('password_new', 'รหัสผ่านใหม่', 'trim|min_length[6]|required|xss_clean' );
				$this->form_validation->set_rules('re_password', 'ยืนยันรหัสใหม่', 'trim|required|xss_clean' );
			}else{
				$this->form_validation->set_message('required', 'fill {field} , Please');
				$this->form_validation->set_message('min_length', 'The {field} field must be at least {param} characters in length.');
				$this->form_validation->set_message('max_length', 'The {field} field cannot exceed {param} characters in length.');

				$this->form_validation->set_rules('password_new', 'New Password', 'trim|min_length[6]|required|xss_clean' );
				$this->form_validation->set_rules('re_password', 'Confirm new password', 'trim|required|xss_clean' );
			}

			if($this->form_validation->run()==FALSE){

				$data['show_dis'] = "";
				$data['error_text2'] = "";	
				$data['error_text3'] = "";
				$data['check_login_logout'] = $this->session->userdata('member_log');
				$data['menu'] = $this->model_page->get_data_menu();
				$data['menu_footer'] = $this->model_page->get_data_menu_footer();
				$data['menu_footer2'] = $this->model_page->get_data_menu_footer2();
				$data['contact'] = $this->model_page->get_data_contact($id=1);
				$data['contact_facebook'] = $this->model_page->get_data_contact_facebook($id=1);
				$data['contact_twitter'] = $this->model_page->get_data_contact_twitter($id=1);
				$data['contact_instragram'] = $this->model_page->get_data_contact_instragram($id=1);
				$data['setting'] = $this->model_page->get_data_setting($id=1);

				$data['data_history'] =  $this->model_page->get_data_history_sale($id_login);
				$data['data_history_count'] =  $this->model_page->get_data_history_sale_count($id_login);

				$data['data_history_buy'] =  $this->model_page->get_data_history_buy($id_login);
				$data['data_history_count_buy'] =  $this->model_page->get_data_history_buy_count($id_login);

				$data['resume'] = $this->model_page->get_data_resume($id_login);
				$data['id_login'] = $this->session->userdata('member_id_log');
				
				$this->load->view('page/header',$data);
				$this->load->view('page/sale_resume_edit',$data);
				$this->load->view('page/footer',$data);


			}else{

				if($this->input->post('password_new') !== $this->input->post('re_password')){

			 			if($this->lang->line("set_lang")=="th"){
							$data['error_text3'] = "กรอกยืนยันรหัสใหม่ให้ตรงกัน";
						}else{
							$data['error_text3'] = "Confirm new password.";
						}

						$data['show_dis'] = "";
					
						$data['check_login_logout'] = $this->session->userdata('member_log');
						$data['menu'] = $this->model_page->get_data_menu();
						$data['menu_footer'] = $this->model_page->get_data_menu_footer();
						$data['menu_footer2'] = $this->model_page->get_data_menu_footer2();
						$data['contact'] = $this->model_page->get_data_contact($id=1);
						$data['contact_facebook'] = $this->model_page->get_data_contact_facebook($id=1);
						$data['contact_twitter'] = $this->model_page->get_data_contact_twitter($id=1);
						$data['contact_instragram'] = $this->model_page->get_data_contact_instragram($id=1);
						$data['setting'] = $this->model_page->get_data_setting($id=1);

						$data['data_history'] =  $this->model_page->get_data_history_sale($id_login);
						$data['data_history_count'] =  $this->model_page->get_data_history_sale_count($id_login);

						$data['data_history_buy'] =  $this->model_page->get_data_history_buy($id_login);
						$data['data_history_count_buy'] =  $this->model_page->get_data_history_buy_count($id_login);

						$data['resume'] = $this->model_page->get_data_resume($id_login);
						$data['id_login'] = $this->session->userdata('member_id_log');
						
						$this->load->view('page/header',$data);
						$this->load->view('page/sale_resume_edit',$data);
						$this->load->view('page/footer',$data);
				}else{

					$id = $this->session->userdata('member_id_log');
				   $pass=$this->input->post('password_new');
			 		$this->model_page->sale_password_edit($id,$pass);
					if($this->lang->line("set_lang")=="th"){
						echo "<script>alert('เปลี่ยนรหัสผ่านเรียบร้อย');</script>";
						redirect(base_url('sale'), "refresh");
					}else{
						echo "<script>alert('Password changed successfully');</script>";
						redirect(base_url('sale'), "refresh");
					}

				}		   

			}

		}
	}

	public function edit_image_profile($id=""){
		 $config['upload_path'] = './uploads/';
		  $config['file_name']  = 'profile'.'_'.date('Ymd_His');
		  $config['allowed_types'] = 'gif|jpg|png';	

		  $this->load->library('upload', $config);

			if ($this->upload->do_upload()==1){
				if(! $this->upload->do_upload()){
					$error = array('error' => $this->upload->display_errors());
				   	$data['data'] = $this->model_page->get_data_edit_profile($id);
					$this->load->view('page/header',$data);
					$this->load->view('page/sale_resume_edit',$error);
					$this->load->view('page/footer');
				}else{
					 $this->model_page->edit_image_profile($id);

					if($this->lang->line("set_lang")=="th"){
						echo "<script>alert('บันทึกข้อมูลเรียบร้อย');</script>";
					}else{
						echo "<script>alert('Save completed');</script>";
					}
					redirect(base_url('sale/'), "refresh");
				}
		  
		  	}else{
		        $this->model_page->sale_resume_edit($id);
		     		if($this->lang->line("set_lang")=="th"){
						echo "<script>alert('บันทึกข้อมูลเรียบร้อย');</script>";
					}else{
						echo "<script>alert('Save completed');</script>";
					}

				redirect(base_url('sale/'), "refresh");
		   	}
	}

	public function sale_resume_edit($id="")
	{
		$id_login1 = $this->session->userdata('member_id_log');
		$data['data_member'] = $this->model_page->get_data_check_pass($id_login1);

		$id_login = $this->session->userdata('member_id_log');

		if($this->input->post('submit_pass')){

			if($this->lang->line("set_lang")=="th"){
				$this->form_validation->set_message('required', 'กรุณากรอก{field}');
				$this->form_validation->set_rules('password', 'รหัสผ่านเดิม', 'trim|required|xss_clean' );
				$this->form_validation->set_rules('password_new', 'รหัสผ่านใหม่', 'trim|required|xss_clean' );
				$this->form_validation->set_rules('re_password', 'ยืนยันรหัสใหม่', 'trim|required|xss_clean' );
			}else{
				$this->form_validation->set_message('required', 'fill {field} , Please');
				$this->form_validation->set_rules('password', 'Old Password', 'trim|required|xss_clean' );
				$this->form_validation->set_rules('password_new', 'New Password', 'trim|required|xss_clean' );
				$this->form_validation->set_rules('re_password', 'Confirm new password', 'trim|required|xss_clean' );
			}

			if($this->form_validation->run()==FALSE){

				$check_pass = $this->model_page->get_check_pass($id);

				if($this->input->post('password')){
					if($check_pass !== md5($this->input->post('password'))){

						if($this->lang->line("set_lang")=="th"){
							$data['error_text2'] = "กรอกรหัสผ่านเดิมไม่ถูกต้อง";
						}else{
							$data['error_text2'] = "Invalid old password.";
						}

						$data['error_text3'] = "";

						$data['check_login_logout'] = $this->session->userdata('member_log');
						$data['menu'] = $this->model_page->get_data_menu();
						$data['menu_footer'] = $this->model_page->get_data_menu_footer();
						$data['menu_footer2'] = $this->model_page->get_data_menu_footer2();
						$data['contact'] = $this->model_page->get_data_contact($id=1);
						$data['contact_facebook'] = $this->model_page->get_data_contact_facebook($id=1);
						$data['contact_twitter'] = $this->model_page->get_data_contact_twitter($id=1);
						$data['contact_instragram'] = $this->model_page->get_data_contact_instragram($id=1);
						$data['setting'] = $this->model_page->get_data_setting($id=1);

						$data['data_history'] =  $this->model_page->get_data_history_sale($id_login);
						$data['data_history_count'] =  $this->model_page->get_data_history_sale_count($id_login);

						$data['resume'] = $this->model_page->get_data_resume($id_login);
						$data['id_login'] = $this->session->userdata('member_id_log');
									
						$this->load->view('page/header',$data);
						$this->load->view('page/sale_resume_edit',$data);
						$this->load->view('page/footer',$data);

					}else{

						$data['error_text2'] = "";
						$data['error_text3'] = "";

						$data['check_login_logout'] = $this->session->userdata('member_log');
						$data['menu'] = $this->model_page->get_data_menu();
						$data['menu_footer'] = $this->model_page->get_data_menu_footer();
						$data['menu_footer2'] = $this->model_page->get_data_menu_footer2();
						$data['contact'] = $this->model_page->get_data_contact($id=1);
						$data['contact_facebook'] = $this->model_page->get_data_contact_facebook($id=1);
						$data['contact_twitter'] = $this->model_page->get_data_contact_twitter($id=1);
						$data['contact_instragram'] = $this->model_page->get_data_contact_instragram($id=1);
						$data['setting'] = $this->model_page->get_data_setting($id=1);

						$data['data_history'] =  $this->model_page->get_data_history_sale($id_login);
						$data['data_history_count'] =  $this->model_page->get_data_history_sale_count($id_login);

						$data['resume'] = $this->model_page->get_data_resume($id_login);
						$data['id_login'] = $this->session->userdata('member_id_log');						
						
						$this->load->view('page/header',$data);
						$this->load->view('page/sale_resume_edit',$data);
						$this->load->view('page/footer',$data);
					}
				}
				
						$data['error_text2'] = "";
						$data['error_text3'] = "";

						$data['check_login_logout'] = $this->session->userdata('member_log');
						$data['menu'] = $this->model_page->get_data_menu();
						$data['menu_footer'] = $this->model_page->get_data_menu_footer();
						$data['menu_footer2'] = $this->model_page->get_data_menu_footer2();
						$data['contact'] = $this->model_page->get_data_contact($id=1);
						$data['contact_facebook'] = $this->model_page->get_data_contact_facebook($id=1);
						$data['contact_twitter'] = $this->model_page->get_data_contact_twitter($id=1);
						$data['contact_instragram'] = $this->model_page->get_data_contact_instragram($id=1);
						$data['setting'] = $this->model_page->get_data_setting($id=1);

						$data['data_history'] =  $this->model_page->get_data_history_sale($id_login);
						$data['data_history_count'] =  $this->model_page->get_data_history_sale_count($id_login);

						$data['resume'] = $this->model_page->get_data_resume($id_login);
						$data['id_login'] = $this->session->userdata('member_id_log');						
						
						$this->load->view('page/header',$data);
						$this->load->view('page/sale_resume_edit',$data);
						$this->load->view('page/footer',$data);
			 }else{

			 	if($this->input->post('password_new') !== $this->input->post('re_password')){

			 			if($this->lang->line("set_lang")=="th"){
							$data['error_text3'] = "กรอกยืนยันรหัสใหม่ให้ตรงกัน";
						}else{
							$data['error_text3'] = "Confirm new password.";
						}

			 			$data['error_text2'] = "";

						$data['check_login_logout'] = $this->session->userdata('member_log');
						$data['menu'] = $this->model_page->get_data_menu();
						$data['menu_footer'] = $this->model_page->get_data_menu_footer();
						$data['menu_footer2'] = $this->model_page->get_data_menu_footer2();
						$data['contact'] = $this->model_page->get_data_contact($id=1);
						$data['contact_facebook'] = $this->model_page->get_data_contact_facebook($id=1);
						$data['contact_twitter'] = $this->model_page->get_data_contact_twitter($id=1);
						$data['contact_instragram'] = $this->model_page->get_data_contact_instragram($id=1);
						$data['setting'] = $this->model_page->get_data_setting($id=1);

						$data['data_history'] =  $this->model_page->get_data_history_sale($id_login);
						$data['data_history_count'] =  $this->model_page->get_data_history_sale_count($id_login);

						$data['resume'] = $this->model_page->get_data_resume($id_login);
						$data['id_login'] = $this->session->userdata('member_id_log');
									
						$this->load->view('page/header',$data);
						$this->load->view('page/sale_resume_edit',$data);
						$this->load->view('page/footer',$data);
				}else{

					$pass=$this->input->post('password');
			 		$this->model_page->sale_password_edit($id,$pass);
					if($this->lang->line("set_lang")=="th"){
						echo "<script>alert('เปลี่ยนรหัสผ่านเรียบร้อย');</script>";
						redirect(base_url('sale/'), "refresh");
					}else{
						echo "<script>alert('Password changed successfully');</script>";
						redirect(base_url('sale/'), "refresh");
					}
				}
				
			 }

		}else{

			if($this->lang->line("set_lang")=="th"){

			$this->form_validation->set_message('required', 'กรุณากรอก{field}');
			$this->form_validation->set_rules('name', 'ชื่อ-นามสกุล', 'trim|required|xss_clean' );
			$this->form_validation->set_rules('gender', 'เพศ', 'trim|required|xss_clean' );
			$this->form_validation->set_rules('birthday', 'วันเดือนปีเกิด', 'trim|required|xss_clean' );
			$this->form_validation->set_rules('address_no', 'บ้านเลขที่', 'trim|required|xss_clean' );
			$this->form_validation->set_rules('province', 'จังหวัด', 'trim|required|xss_clean' );
			$this->form_validation->set_rules('district', 'แขวง/ตำบล', 'trim|required|xss_clean' );
			$this->form_validation->set_rules('area', 'เขต/อำเภอ', 'trim|required|xss_clean' );
			$this->form_validation->set_rules('road', 'ถนน', 'trim|required|xss_clean' );
			$this->form_validation->set_rules('zipcode', 'รหัสไปรษณีย์', 'trim|required|xss_clean' );
			$this->form_validation->set_rules('tel', 'เบอร์โทรศัพท์', 'trim|required|xss_clean' );

			}else{
				$this->form_validation->set_message('required', 'fill {field} , Please');
				$this->form_validation->set_rules('name', 'province', 'trim|required|xss_clean' );
				$this->form_validation->set_rules('gender', 'gender', 'trim|required|xss_clean' );
				$this->form_validation->set_rules('birthday', 'birthday', 'trim|required|xss_clean' );
				$this->form_validation->set_rules('address_no', 'House number', 'trim|required|xss_clean' );
				$this->form_validation->set_rules('province', 'province', 'trim|required|xss_clean' );
				$this->form_validation->set_rules('district', 'district', 'trim|required|xss_clean' );
				$this->form_validation->set_rules('area', 'area', 'trim|required|xss_clean' );
				$this->form_validation->set_rules('road', 'road', 'trim|required|xss_clean' );
				$this->form_validation->set_rules('zipcode', 'zipcode', 'trim|required|xss_clean' );
				$this->form_validation->set_rules('address', 'address', 'trim|required|xss_clean' );
				$this->form_validation->set_rules('tel', 'tel', 'trim|required|xss_clean' );				
			}

			if($this->form_validation->run()==FALSE){

				$data['error_text2'] = "";	
				$data['error_text3'] = "";
				$data['check_login_logout'] = $this->session->userdata('member_log');
				$data['menu'] = $this->model_page->get_data_menu();
				$data['menu_footer'] = $this->model_page->get_data_menu_footer();
				$data['menu_footer2'] = $this->model_page->get_data_menu_footer2();
				$data['contact'] = $this->model_page->get_data_contact($id=1);
				$data['contact_facebook'] = $this->model_page->get_data_contact_facebook($id=1);
				$data['contact_twitter'] = $this->model_page->get_data_contact_twitter($id=1);
				$data['contact_instragram'] = $this->model_page->get_data_contact_instragram($id=1);
				$data['setting'] = $this->model_page->get_data_setting($id=1);

				$data['data_history'] =  $this->model_page->get_data_history_sale($id_login);
				$data['data_history_count'] =  $this->model_page->get_data_history_sale_count($id_login);

				$data['resume'] = $this->model_page->get_data_resume($id_login);
				$data['id_login'] = $this->session->userdata('member_id_log');
				
				$this->load->view('page/header',$data);
				$this->load->view('page/sale_resume_edit',$data);
				$this->load->view('page/footer',$data);

			 }else{

				$this->model_page->sale_resume_edit($id);

				if($this->lang->line("set_lang")=="th"){
					echo "<script>alert('แก้ไขข้อมูลเรียบร้อย');</script>";
					redirect(base_url('sale'), "refresh");
				}else{
					echo "<script>alert('Edit data successfully.');</script>";
					redirect(base_url('sale'), "refresh");
				}
			 }
		}
	}

	public function edit_account($id="")
	{
		$id_login1 = $this->session->userdata('member_id_log');
		$data['data_member'] = $this->model_page->get_data_check_pass($id_login1);

		$id_login = $this->session->userdata('member_id_log');

		if($this->input->post('password')!==""){

			if($this->lang->line("set_lang")=="th"){
				$this->form_validation->set_message('required', 'กรุณากรอก{field}');
				$this->form_validation->set_message('min_length', 'กรุณากรอก {field} ไม่น้อยกว่า {param} หลัก.');
				$this->form_validation->set_message('max_length', 'กรุณากรอก {field} ไม่เกิน {param} หลัก.');

				$this->form_validation->set_rules('password', 'รหัสผ่านเดิม', 'trim|required|xss_clean' );
				$this->form_validation->set_rules('password_new', 'รหัสผ่านใหม่', 'trim|required|xss_clean' );
				$this->form_validation->set_rules('re_password', 'ยืนยันรหัสใหม่', 'trim|required|xss_clean' );
				$this->form_validation->set_rules('name', 'ชื่อ-นามสกุล', 'trim|required|xss_clean' );
				$this->form_validation->set_rules('tel', 'เบอร์โทรศัพท์', 'trim|numeric|min_length[10]|max_length[10]|required|xss_clean' );
			}else{
				$this->form_validation->set_message('required', 'fill {field} , Please');
				$this->form_validation->set_message('min_length', 'The {field} field must be at least {param} characters in length.');
				$this->form_validation->set_message('max_length', 'The {field} field cannot exceed {param} characters in length.');

				$this->form_validation->set_rules('password', 'Old Password', 'trim|required|xss_clean' );
				$this->form_validation->set_rules('password_new', 'New Password', 'trim|required|xss_clean' );
				$this->form_validation->set_rules('re_password', 'Confirm new password', 'trim|required|xss_clean' );
				$this->form_validation->set_rules('name', 'province', 'trim|required|xss_clean' );
				$this->form_validation->set_rules('tel', 'tel', 'trim|numeric|min_length[10]|max_length[10]|required|xss_clean' );
			}

			if($this->form_validation->run()==FALSE){

				$check_pass = $this->model_page->get_check_pass($id);

				if($this->input->post('password')){
					if($check_pass !== md5($this->input->post('password'))){

						if($this->lang->line("set_lang")=="th"){
							$data['error_text2'] = "กรอกรหัสผ่านเดิมไม่ถูกต้อง";
						}else{
							$data['error_text2'] = "Invalid old password.";
						}

						$data['error_text3'] = "";

						$data['check_login_logout'] = $this->session->userdata('member_log');
						$data['menu'] = $this->model_page->get_data_menu();
						$data['menu_footer'] = $this->model_page->get_data_menu_footer();
						$data['menu_footer2'] = $this->model_page->get_data_menu_footer2();
						$data['contact'] = $this->model_page->get_data_contact($id=1);
						$data['contact_facebook'] = $this->model_page->get_data_contact_facebook($id=1);
						$data['contact_twitter'] = $this->model_page->get_data_contact_twitter($id=1);
						$data['contact_instragram'] = $this->model_page->get_data_contact_instragram($id=1);
						$data['setting'] = $this->model_page->get_data_setting($id=1);

						$data['data_history'] =  $this->model_page->get_data_history_sale($id_login);
						$data['data_history_count'] =  $this->model_page->get_data_history_sale_count($id_login);

						$data['data_history_buy'] =  $this->model_page->get_data_history_buy($id_login);
						$data['data_history_count_buy'] =  $this->model_page->get_data_history_buy_count($id_login);

						$data['resume'] = $this->model_page->get_data_resume($id_login);
						$data['id_login'] = $this->session->userdata('member_id_log');
			

						$data['resume'] = $this->model_page->get_data_resume($id_login);
						$data['id_login'] = $this->session->userdata('member_id_log');
			
						$this->load->view('page/header',$data);
						$this->load->view('page/edit_account',$data);
						$this->load->view('page/footer',$data);

					}else{

						$data['error_text2'] = "";
						$data['error_text3'] = "";

						$data['check_login_logout'] = $this->session->userdata('member_log');
						$data['menu'] = $this->model_page->get_data_menu();
						$data['menu_footer'] = $this->model_page->get_data_menu_footer();
						$data['menu_footer2'] = $this->model_page->get_data_menu_footer2();
						$data['contact'] = $this->model_page->get_data_contact($id=1);
						$data['contact_facebook'] = $this->model_page->get_data_contact_facebook($id=1);
						$data['contact_twitter'] = $this->model_page->get_data_contact_twitter($id=1);
						$data['contact_instragram'] = $this->model_page->get_data_contact_instragram($id=1);
						$data['setting'] = $this->model_page->get_data_setting($id=1);

						$data['data_history'] =  $this->model_page->get_data_history_sale($id_login);
						$data['data_history_count'] =  $this->model_page->get_data_history_sale_count($id_login);

						$data['data_history_buy'] =  $this->model_page->get_data_history_buy($id_login);
						$data['data_history_count_buy'] =  $this->model_page->get_data_history_buy_count($id_login);

						$data['resume'] = $this->model_page->get_data_resume($id_login);
						$data['id_login'] = $this->session->userdata('member_id_log');
			
						$this->load->view('page/header',$data);
						$this->load->view('page/edit_account',$data);
						$this->load->view('page/footer',$data);


					}
				}
				
						$data['error_text2'] = "";
						$data['error_text3'] = "";

						$data['check_login_logout'] = $this->session->userdata('member_log');
						$data['menu'] = $this->model_page->get_data_menu();
						$data['menu_footer'] = $this->model_page->get_data_menu_footer();
						$data['menu_footer2'] = $this->model_page->get_data_menu_footer2();
						$data['contact'] = $this->model_page->get_data_contact($id=1);
						$data['contact_facebook'] = $this->model_page->get_data_contact_facebook($id=1);
						$data['contact_twitter'] = $this->model_page->get_data_contact_twitter($id=1);
						$data['contact_instragram'] = $this->model_page->get_data_contact_instragram($id=1);
						$data['setting'] = $this->model_page->get_data_setting($id=1);

						$data['data_history'] =  $this->model_page->get_data_history_sale($id_login);
						$data['data_history_count'] =  $this->model_page->get_data_history_sale_count($id_login);

						$data['data_history_buy'] =  $this->model_page->get_data_history_buy($id_login);
						$data['data_history_count_buy'] =  $this->model_page->get_data_history_buy_count($id_login);

						$data['resume'] = $this->model_page->get_data_resume($id_login);
						$data['id_login'] = $this->session->userdata('member_id_log');

						$this->load->view('page/header',$data);
						$this->load->view('page/edit_account',$data);
						$this->load->view('page/footer',$data);


			 }else{

			 	if($this->input->post('password_new') !== $this->input->post('re_password')){

			 			if($this->lang->line("set_lang")=="th"){
							$data['error_text3'] = "กรอกยืนยันรหัสใหม่ให้ตรงกัน";
						}else{
							$data['error_text3'] = "Confirm new password.";
						}

			 			$data['error_text2'] = "";

						$data['check_login_logout'] = $this->session->userdata('member_log');
						$data['menu'] = $this->model_page->get_data_menu();
						$data['menu_footer'] = $this->model_page->get_data_menu_footer();
						$data['menu_footer2'] = $this->model_page->get_data_menu_footer2();
						$data['contact'] = $this->model_page->get_data_contact($id=1);
						$data['contact_facebook'] = $this->model_page->get_data_contact_facebook($id=1);
						$data['contact_twitter'] = $this->model_page->get_data_contact_twitter($id=1);
						$data['contact_instragram'] = $this->model_page->get_data_contact_instragram($id=1);
						$data['setting'] = $this->model_page->get_data_setting($id=1);

						$data['data_history'] =  $this->model_page->get_data_history_sale($id_login);
						$data['data_history_count'] =  $this->model_page->get_data_history_sale_count($id_login);

						$data['data_history_buy'] =  $this->model_page->get_data_history_buy($id_login);
						$data['data_history_count_buy'] =  $this->model_page->get_data_history_buy_count($id_login);

						$data['resume'] = $this->model_page->get_data_resume($id_login);
						$data['id_login'] = $this->session->userdata('member_id_log');

						$this->load->view('page/header',$data);
						$this->load->view('page/edit_account',$data);
						$this->load->view('page/footer',$data);

				}else{
					$id = $this->input->get('id_login');
					$pass=$this->input->post('password_new');
			 		$this->model_page->sale_password_edit($id,$pass);
					$this->edit_image_profile($id);
				}
			 }

		}else{ // ไม่กรอก password

			if($this->lang->line("set_lang")=="th"){
				$this->form_validation->set_message('required', 'กรุณากรอก{field}');
				$this->form_validation->set_message('min_length', 'กรุณากรอก {field} ไม่น้อยกว่า {param} หลัก.');
				$this->form_validation->set_message('max_length', 'กรุณากรอก {field} ไม่เกิน {param} หลัก.');

				$this->form_validation->set_rules('name', 'ชื่อ-นามสกุล', 'trim|required|xss_clean' );
				$this->form_validation->set_rules('tel', 'เบอร์โทรศัพท์', 'trim|required|numeric|min_length[10]|max_length[10]|xss_clean' );
			}else{
				$this->form_validation->set_message('required', 'fill {field} , Please');
				$this->form_validation->set_message('min_length', 'The {field} field must be at least {param} characters in length.');
				$this->form_validation->set_message('max_length', 'The {field} field cannot exceed {param} characters in length.');

				$this->form_validation->set_rules('name', 'province', 'trim|required|xss_clean' );
				$this->form_validation->set_rules('tel', 'tel', 'trim|required|numeric|min_length[10]|max_length[10]|xss_clean' );
			}

			if($this->form_validation->run()==FALSE){

				$data['error_text2'] = "";	
				$data['error_text3'] = "";
				$data['check_login_logout'] = $this->session->userdata('member_log');
				$data['menu'] = $this->model_page->get_data_menu();
				$data['menu_footer'] = $this->model_page->get_data_menu_footer();
				$data['menu_footer2'] = $this->model_page->get_data_menu_footer2();
				$data['contact'] = $this->model_page->get_data_contact($id=1);
				$data['contact_facebook'] = $this->model_page->get_data_contact_facebook($id=1);
				$data['contact_twitter'] = $this->model_page->get_data_contact_twitter($id=1);
				$data['contact_instragram'] = $this->model_page->get_data_contact_instragram($id=1);
				$data['setting'] = $this->model_page->get_data_setting($id=1);

				$data['data_history'] =  $this->model_page->get_data_history_sale($id_login);
				$data['data_history_count'] =  $this->model_page->get_data_history_sale_count($id_login);

				$data['data_history_buy'] =  $this->model_page->get_data_history_buy($id_login);
				$data['data_history_count_buy'] =  $this->model_page->get_data_history_buy_count($id_login);

				$data['resume'] = $this->model_page->get_data_resume($id_login);
				$data['id_login'] = $this->session->userdata('member_id_log');
				
				$this->load->view('page/header',$data);
				$this->load->view('page/edit_account',$data);
				$this->load->view('page/footer',$data);

			 }else{

			 	$id = $this->input->get('id_login');
				$this->model_page->sale_resume_edit($id);
				$this->edit_image_profile($id);

			 }
		}

	}

	public function edit_password($id=""){
		$id_login1 = $this->session->userdata('member_id_log');
		$data['data_member'] = $this->model_page->get_data_check_pass($id_login1);

		$id_login = $this->session->userdata('member_id_log');

			if($this->lang->line("set_lang")=="th"){
				$this->form_validation->set_message('required', 'กรุณากรอก{field}');
				$this->form_validation->set_message('min_length', 'กรุณากรอก {field} ไม่น้อยกว่า {param} หลัก.');
				$this->form_validation->set_message('max_length', 'กรุณากรอก {field} ไม่เกิน {param} หลัก.');

				$this->form_validation->set_rules('password_new', 'รหัสผ่านใหม่', 'trim|min_length[6]|required|xss_clean' );
				$this->form_validation->set_rules('re_password', 'ยืนยันรหัสใหม่', 'trim|required|xss_clean' );
			}else{
				$this->form_validation->set_message('required', 'fill {field} , Please');
				$this->form_validation->set_message('min_length', 'The {field} field must be at least {param} characters in length.');
				$this->form_validation->set_message('max_length', 'The {field} field cannot exceed {param} characters in length.');

				$this->form_validation->set_rules('password_new', 'New Password', 'trim|min_length[6]|required|xss_clean' );
				$this->form_validation->set_rules('re_password', 'Confirm new password', 'trim|required|xss_clean' );
			}

			if($this->form_validation->run()==FALSE){

				$check_pass = $this->model_page->get_check_pass($id);

				if($this->input->post('password')){
					if($check_pass !== md5($this->input->post('password'))){

						if($this->lang->line("set_lang")=="th"){
							$data['error_text2'] = "กรอกรหัสผ่านเดิมไม่ถูกต้อง";
						}else{
							$data['error_text2'] = "Invalid old password.";
						}

						$data['error_text3'] = "";

						$data['check_login_logout'] = $this->session->userdata('member_log');
						$data['menu'] = $this->model_page->get_data_menu();
						$data['menu_footer'] = $this->model_page->get_data_menu_footer();
						$data['menu_footer2'] = $this->model_page->get_data_menu_footer2();
						$data['contact'] = $this->model_page->get_data_contact($id=1);
						$data['contact_facebook'] = $this->model_page->get_data_contact_facebook($id=1);
						$data['contact_twitter'] = $this->model_page->get_data_contact_twitter($id=1);
						$data['contact_instragram'] = $this->model_page->get_data_contact_instragram($id=1);
						$data['setting'] = $this->model_page->get_data_setting($id=1);

						$data['data_history'] =  $this->model_page->get_data_history_sale($id_login);
						$data['data_history_count'] =  $this->model_page->get_data_history_sale_count($id_login);

						$data['data_history_buy'] =  $this->model_page->get_data_history_buy($id_login);
						$data['data_history_count_buy'] =  $this->model_page->get_data_history_buy_count($id_login);

						$data['resume'] = $this->model_page->get_data_resume($id_login);
						$data['id_login'] = $this->session->userdata('member_id_log');
						
						$this->load->view('page/header',$data);
						$this->load->view('page/edit_password',$data);
						$this->load->view('page/footer',$data);

					}else{

						$data['error_text2'] = "";
						$data['error_text3'] = "";

						$data['check_login_logout'] = $this->session->userdata('member_log');
						$data['menu'] = $this->model_page->get_data_menu();
						$data['menu_footer'] = $this->model_page->get_data_menu_footer();
						$data['menu_footer2'] = $this->model_page->get_data_menu_footer2();
						$data['contact'] = $this->model_page->get_data_contact($id=1);
						$data['contact_facebook'] = $this->model_page->get_data_contact_facebook($id=1);
						$data['contact_twitter'] = $this->model_page->get_data_contact_twitter($id=1);
						$data['contact_instragram'] = $this->model_page->get_data_contact_instragram($id=1);
						$data['setting'] = $this->model_page->get_data_setting($id=1);

						$data['data_history'] =  $this->model_page->get_data_history_sale($id_login);
						$data['data_history_count'] =  $this->model_page->get_data_history_sale_count($id_login);

						$data['data_history_buy'] =  $this->model_page->get_data_history_buy($id_login);
						$data['data_history_count_buy'] =  $this->model_page->get_data_history_buy_count($id_login);

						$data['resume'] = $this->model_page->get_data_resume($id_login);
						$data['id_login'] = $this->session->userdata('member_id_log');
						
						$this->load->view('page/header',$data);
						$this->load->view('page/edit_password',$data);
						$this->load->view('page/footer',$data);


					}
				}
				
						$data['error_text2'] = "";
						$data['error_text3'] = "";

						$data['check_login_logout'] = $this->session->userdata('member_log');
						$data['menu'] = $this->model_page->get_data_menu();
						$data['menu_footer'] = $this->model_page->get_data_menu_footer();
						$data['menu_footer2'] = $this->model_page->get_data_menu_footer2();
						$data['contact'] = $this->model_page->get_data_contact($id=1);
						$data['contact_facebook'] = $this->model_page->get_data_contact_facebook($id=1);
						$data['contact_twitter'] = $this->model_page->get_data_contact_twitter($id=1);
						$data['contact_instragram'] = $this->model_page->get_data_contact_instragram($id=1);
						$data['setting'] = $this->model_page->get_data_setting($id=1);

						$data['data_history'] =  $this->model_page->get_data_history_sale($id_login);
						$data['data_history_count'] =  $this->model_page->get_data_history_sale_count($id_login);

						$data['data_history_buy'] =  $this->model_page->get_data_history_buy($id_login);
						$data['data_history_count_buy'] =  $this->model_page->get_data_history_buy_count($id_login);

						$data['resume'] = $this->model_page->get_data_resume($id_login);
						$data['id_login'] = $this->session->userdata('member_id_log');	
						
						$this->load->view('page/header',$data);
						$this->load->view('page/edit_password',$data);
						$this->load->view('page/footer',$data);

			 }else{

			 	if($this->input->post('password_new') !== $this->input->post('re_password')){

			 			if($this->lang->line("set_lang")=="th"){
							$data['error_text3'] = "กรอกยืนยันรหัสใหม่ให้ตรงกัน";
						}else{
							$data['error_text3'] = "Confirm new password.";
						}

			 			$data['error_text2'] = "";

						$data['check_login_logout'] = $this->session->userdata('member_log');
						$data['menu'] = $this->model_page->get_data_menu();
						$data['menu_footer'] = $this->model_page->get_data_menu_footer();
						$data['menu_footer2'] = $this->model_page->get_data_menu_footer2();
						$data['contact'] = $this->model_page->get_data_contact($id=1);
						$data['contact_facebook'] = $this->model_page->get_data_contact_facebook($id=1);
						$data['contact_twitter'] = $this->model_page->get_data_contact_twitter($id=1);
						$data['contact_instragram'] = $this->model_page->get_data_contact_instragram($id=1);
						$data['setting'] = $this->model_page->get_data_setting($id=1);

						$data['data_history'] =  $this->model_page->get_data_history_sale($id_login);
						$data['data_history_count'] =  $this->model_page->get_data_history_sale_count($id_login);

						$data['data_history_buy'] =  $this->model_page->get_data_history_buy($id_login);
						$data['data_history_count_buy'] =  $this->model_page->get_data_history_buy_count($id_login);

						$data['resume'] = $this->model_page->get_data_resume($id_login);
						$data['id_login'] = $this->session->userdata('member_id_log');

						$this->load->view('page/header',$data);
						$this->load->view('page/edit_password',$data);
						$this->load->view('page/footer',$data);

				}else{

					$id = $this->input->get('id_login');
					
					$pass=$this->input->post('password_new');
			 		$this->model_page->sale_password_edit($id,$pass);
					if($this->lang->line("set_lang")=="th"){
						echo "<script>alert('เปลี่ยนรหัสผ่านเรียบร้อย');</script>";
						redirect(base_url('sale'), "refresh");
					}else{
						echo "<script>alert('Password changed successfully');</script>";
						redirect(base_url('sale'), "refresh");
					}
					
				}
				
			 }
	}


	public function sale_step1(){

		//////////////////set session check step///////////////////////////////
		$data['url1'] = $this->session->userdata("url1");
		$data['step1'] = $this->session->userdata("step1");

		$data['url2'] = $this->session->userdata("url2");
		$data['step2'] = $this->session->userdata("step2");

		$data['url3'] = $this->session->userdata("url3");
		$data['step3'] = $this->session->userdata("step3");

		$data['url4'] = $this->session->userdata("url4");
		$data['step4'] = $this->session->userdata("step4");

		$data['url5'] = $this->session->userdata("url5");
		$data['step5'] = $this->session->userdata("step5");

		$data['name_year_regis'] = $this->session->userdata("name_year_regis");
		$data['name_year_pro'] = $this->session->userdata("name_year_pro");
		$data['name_color'] = $this->session->userdata("name_color");
		$data['name_gear'] = $this->session->userdata("name_gear");
		$data['name_capacity'] = $this->session->userdata("name_capacity");
		$data['name_mile'] = $this->session->userdata("name_mile");
		$data['name_price'] = $this->session->userdata("name_price");
		$data['descript'] = $this->session->userdata("descript");
		$data['device'] = $this->session->userdata("device");
		$data['downpayment'] = $this->session->userdata("downpayment");

		$data['name_type'] = $this->session->userdata("name_type");
		$data['name'] =$this->session->userdata("name");
		$data['name_model'] = $this->session->userdata("name_model");
		$data['name_model_des'] = $this->session->userdata("name_model_des");
		$data['province'] = $this->session->userdata("province");
		$data['province1'] = $this->session->userdata("province1");

		////////////////////////////////////////////////////////////

		$id_login1 = $this->session->userdata('member_id_log');
		$data['data_member'] = $this->model_page->get_data_check_pass($id_login1);

		if($this->lang->line("set_lang")=="th"){
			$this->form_validation->set_message('required', 'กรุณากรอก{field}');
			$this->form_validation->set_rules('province', 'จังหวัด', 'trim|required|xss_clean' );
		}else{
			$this->form_validation->set_message('required', 'fill {field} , Please');
			$this->form_validation->set_rules('province', 'province', 'trim|required|xss_clean' );
		}

		if($this->form_validation->run()==FALSE){
			$data['check_login_logout'] = $this->session->userdata('member_log');
			$data['menu'] = $this->model_page->get_data_menu();
			$data['menu_footer'] = $this->model_page->get_data_menu_footer();
			$data['menu_footer2'] = $this->model_page->get_data_menu_footer2();
			$data['contact'] = $this->model_page->get_data_contact($id=1);
			$data['contact_facebook'] = $this->model_page->get_data_contact_facebook($id=1);
			$data['contact_twitter'] = $this->model_page->get_data_contact_twitter($id=1);
			$data['contact_instragram'] = $this->model_page->get_data_contact_instragram($id=1);
			$data['setting'] = $this->model_page->get_data_setting($id=1);

			$data['province'] = $this->model_page->get_data_province();
			$data['id_login'] = $this->input->get('id_login');
			$data['province1'] = $this->input->post('province');

			$car_top_id_text = $this->input->get('car_top_id');
			$data['car_data'] = $this->model_page->get_data_car_top_edit($car_top_id_text);

			$this->load->view('page/header',$data);
			$this->load->view('page/sale_step1',$data);
			$this->load->view('page/footer',$data);

		}else{

			$province = $this->input->post('province');
			 echo "<script>
				
				window.location.href='".base_url('sale/sale_step2?province='.$province.'&&id_login='.$id_login1.'&car_top_id='.$this->input->get('car_top_id').'')."';
				</script>";
		}	
	}

	public function sale_step2(){	

		$year_min = $this->model_page->get_data_car_year_min();
		$year_max = $this->model_page->get_data_car_year_max();

		//////////////////set session check step///////////////////////////////
		$data['url_step1'] = $this->session->userdata("url_step1");


		$data['url1'] = $this->session->userdata("url1");
		$data['step1'] = $this->session->userdata("step1");

		$data['url2'] = $this->session->userdata("url2");
		$data['step2'] = $this->session->userdata("step2");

		$data['url3'] = $this->session->userdata("url3");
		$data['step3'] = $this->session->userdata("step3");

		$data['url4'] = $this->session->userdata("url4");
		$data['step4'] = $this->session->userdata("step4");

		$data['url5'] = $this->session->userdata("url5");
		$data['step5'] = $this->session->userdata("step5");
		$data['check_year']="";
		$data['name_year_regis'] = $this->session->userdata("name_year_regis");
		$data['name_year_pro'] = $this->session->userdata("name_year_pro");
		$data['name_color'] = $this->session->userdata("name_color");
		$data['name_gear'] = $this->session->userdata("name_gear");
		$data['name_capacity'] = $this->session->userdata("name_capacity");
		$data['name_mile'] = $this->session->userdata("name_mile");
		$data['name_price'] = $this->session->userdata("name_price");
		$data['descript'] = $this->session->userdata("descript");
		$data['device'] = $this->session->userdata("device");
		$data['downpayment'] = $this->session->userdata("downpayment");

		$data['name_type'] = $this->session->userdata("name_type");
		$data['name'] =$this->session->userdata("name");
		$data['name_model'] = $this->session->userdata("name_model");
		$data['name_model_des'] = $this->session->userdata("name_model_des");
		$data['province'] = $this->session->userdata("province");
		$data['province1'] = $this->session->userdata("province1");


		////////////////////////////////////////////////////////////

		$id_login1 = $this->session->userdata('member_id_log');
		$data['data_member'] = $this->model_page->get_data_check_pass($id_login1);
		

		$data['province'] = $this->input->post('province');

		if($this->input->post('submit_step2')){
			if($this->lang->line("set_lang")=="th"){
				$this->form_validation->set_message('required', 'กรุณากรอก{field}');
				$this->form_validation->set_message('greater_than', 'กรุณากรอก{field}มากกว่า 0');
				
				$this->form_validation->set_rules('id_login', 'id_login', 'trim|xss_clean' );
				$this->form_validation->set_rules('province', 'จังหวัด', 'trim|xss_clean' );
				$this->form_validation->set_rules('name_type', 'ประเภทรถ', 'trim|required|xss_clean' );
				$this->form_validation->set_rules('name', 'ยี่ห้อรถ', 'trim|required|xss_clean' );
				$this->form_validation->set_rules('name_model', 'รุ่นรถ', 'trim|required|xss_clean' );
				$this->form_validation->set_rules('name_model_des', 'รายละเอียดรุ่นรถ', 'trim|xss_clean' );
				$this->form_validation->set_rules('name_color', 'สีรถ', 'trim|required|xss_clean' );
				$this->form_validation->set_rules('name_year_pro', 'ปีที่ผลิต', 'trim|xss_clean' );
				$this->form_validation->set_rules('name_gear', 'ระบบเกียร์', 'trim|xss_clean' );
				$this->form_validation->set_rules('name_capacity', 'ความจุเครื่องยนต์', 'trim|xss_clean' );
				$this->form_validation->set_rules('name_mile', 'เลขไมล์', 'trim|greater_than[0]|xss_clean' );
				$this->form_validation->set_rules('name_price', 'ราคา', 'trim|greater_than[0]|required|xss_clean' );
				$this->form_validation->set_rules('device[]', 'อุปกรณ์', 'trim|xss_clean' );
				$this->form_validation->set_rules('lang', 'lang', 'trim|required|xss_clean' );
				$this->form_validation->set_rules('descript', 'ข้อความผู้ประกาศขาย', 'trim|xss_clean' );
				$this->form_validation->set_rules('downpayment', 'เงินดาวน์', 'trim|greater_than[0]|xss_clean' );
				
			}else{
				$this->form_validation->set_message('required', 'fill {field} , Please');
				$this->form_validation->set_message('greater_than', 'Please enter {field} more than 0');

				$this->form_validation->set_rules('id_login', 'id_login', 'trim|xss_clean' );
				$this->form_validation->set_rules('province', 'province', 'trim|xss_clean' );
				$this->form_validation->set_rules('name_type', 'Car Type', 'trim|required|xss_clean' );
				$this->form_validation->set_rules('name', 'Car Brand', 'trim|required|xss_clean' );
				$this->form_validation->set_rules('name_model', 'Car Model', 'trim|required|xss_clean' );
				$this->form_validation->set_rules('name_model_des', 'Car Model details', 'trim|xss_clean' );
				$this->form_validation->set_rules('name_color', 'Car Color', 'trim|required|xss_clean' );
				$this->form_validation->set_rules('name_year_pro', 'Year of manufacture', 'trim|xss_clean' );
				$this->form_validation->set_rules('name_gear', 'Gearbox', 'trim|xss_clean' );
				$this->form_validation->set_rules('name_capacity', 'Engine capacity', 'trim|xss_clean' );	
				$this->form_validation->set_rules('name_mile', 'Mileage', 'trim|greater_than[0]|xss_clean' );
				$this->form_validation->set_rules('name_price', 'Price', 'trim|greater_than[0]|required|xss_clean' );
				$this->form_validation->set_rules('device[]', 'Device', 'trim|xss_clean' );
				$this->form_validation->set_rules('lang', 'lang', 'trim|required|xss_clean' );
				$this->form_validation->set_rules('descript', 'descript', 'trim|xss_clean' );
				$this->form_validation->set_rules('downpayment', 'downpayment', 'trim|greater_than[0]|xss_clean' );
			}

			if($this->form_validation->run()==FALSE){

				$data['check_login_logout'] = $this->session->userdata('member_log');
				$data['province'] = $this->input->post('province');
				$data['menu'] = $this->model_page->get_data_menu();
				$data['menu_footer'] = $this->model_page->get_data_menu_footer();
				$data['menu_footer2'] = $this->model_page->get_data_menu_footer2();
				$data['contact'] = $this->model_page->get_data_contact($id=1);
				$data['contact_facebook'] = $this->model_page->get_data_contact_facebook($id=1);
				$data['contact_twitter'] = $this->model_page->get_data_contact_twitter($id=1);
				$data['contact_instragram'] = $this->model_page->get_data_contact_instragram($id=1);
				$data['setting'] = $this->model_page->get_data_setting($id=1);

				$data['id_login'] = $this->input->get('id_login');
				$car_type_id = $this->input->get('car_type_id');
				$car_id = $this->input->get('car_id');
				$car_medel_id = $this->input->get('car_model_id');

				$data['result_type'] = $this->model_page->get_data_car_type1();
				$data['result'] = $this->model_page->get_data_car1();
				$data['result_model'] = $this->model_page->get_data_car_model1();
				$data['result_model_des'] = $this->model_page->get_data_car_model_des1();
				$data['car_year_pro_text'] = $this->model_page->get_data_car_year_pro_text();


				$data['result_color'] = $this->model_page->get_data_car_color();
				$data['result_year'] = $this->model_page->get_data_car_year();
				$data['result_gear'] = $this->model_page->get_data_car_gear();
				$data['result_capacity'] = $this->model_page->get_data_car_capacity();
				$data['result_device'] = $this->model_page->get_data_car_device();

				$car_top_id_text = $this->input->get('car_top_id');
				$data['car_data'] = $this->model_page->get_data_car_top_edit($car_top_id_text);
		
				$this->load->view('page/header',$data);
				$this->load->view('page/sale_step2',$data);
				$this->load->view('page/footer',$data);

			}else{
					$data['menu'] = $this->model_page->get_data_menu();
					$data['menu_footer'] = $this->model_page->get_data_menu_footer();
					$data['menu_footer2'] = $this->model_page->get_data_menu_footer2();
					$data['contact'] = $this->model_page->get_data_contact($id=1);
					$data['contact_facebook'] = $this->model_page->get_data_contact_facebook($id=1);
					$data['contact_twitter'] = $this->model_page->get_data_contact_twitter($id=1);
					$data['contact_instragram'] = $this->model_page->get_data_contact_instragram($id=1);
					$data['setting'] = $this->model_page->get_data_setting($id=1);

					$data['id_login'] = $this->input->get('id_login');
					$id_login1 = $this->input->get('id_login');

					$car_top_id_text = $this->input->get('car_top_id');

					if(empty($car_top_id_text) OR $car_top_id_text ==""){
						$this->model_page->car_top_add();
						$car_top_id = $this->model_page->check_id1($id_login1);
						$this->model_page->car_upload($id_login1,$car_top_id);
						$this->model_page->car_upload_file($id_login1,$car_top_id);
						$id_image_multi_max = $this->model_page->check_max_car_top_id($id_login1,$car_top_id);

					}else{
						$this->model_page->car_top_edit($car_top_id_text);
					}
					
					$data['car_data'] = $this->model_page->get_data_car_top_edit($car_top_id_text);

				 	echo "<script>
					 window.location.href='".base_url('sale/gallery_multi/1/1?id_login='.$this->input->get('id_login').'&car_top_id='.$this->input->get('car_top_id').'')."';
				  	</script>";

			}
		}else{

				$data['check_login_logout'] = $this->session->userdata('member_log');
				$data['menu'] = $this->model_page->get_data_menu();
				$data['menu_footer'] = $this->model_page->get_data_menu_footer();
				$data['menu_footer2'] = $this->model_page->get_data_menu_footer2();
				$data['contact'] = $this->model_page->get_data_contact($id=1);
				$data['contact_facebook'] = $this->model_page->get_data_contact_facebook($id=1);
				$data['contact_twitter'] = $this->model_page->get_data_contact_twitter($id=1);
				$data['contact_instragram'] = $this->model_page->get_data_contact_instragram($id=1);
				$data['setting'] = $this->model_page->get_data_setting($id=1);

				$data['id_login'] = $this->input->get('id_login');
				$car_type_id = $this->input->get('car_type_id');
				$car_id = $this->input->get('car_id');
				$car_medel_id = $this->input->get('car_model_id');

				$data['result_type'] = $this->model_page->get_data_car_type1();
				$data['result'] = $this->model_page->get_data_car1();
				$data['result_model'] = $this->model_page->get_data_car_model1();
				$data['result_model_des'] = $this->model_page->get_data_car_model_des1();
				$data['car_year_pro_text'] = $this->model_page->get_data_car_year_pro_text();

				$data['result_color'] = $this->model_page->get_data_car_color();
				$data['result_year'] = $this->model_page->get_data_car_year();
				$data['result_gear'] = $this->model_page->get_data_car_gear();
				$data['result_capacity'] = $this->model_page->get_data_car_capacity();
				$data['result_device'] = $this->model_page->get_data_car_device();

				$car_top_id_text = $this->input->get('car_top_id');
				$data['car_data'] = $this->model_page->get_data_car_top_edit($car_top_id_text);
				
				$this->load->view('page/header',$data);
				$this->load->view('page/sale_step2',$data);
				$this->load->view('page/footer',$data);
		}	
	}


	/////////////////////////////////upload - step3/////////////////////////////////

	public function gallery_multi($id="1",$no="",$edit="",$error=""){

		$car_top_id_text = $this->input->get('car_top_id');
		if(!empty($car_top_id_text)){
		$data['car_data'] = $this->model_page->get_data_car_top_edit($car_top_id_text);
		}

		$data['url_step1'] = $this->session->userdata("url_step1");
		
		//////////////////set session check step///////////////////////////////
		$data['url1'] = $this->session->userdata("url1");
		$data['step1'] = $this->session->userdata("step1");

		$data['url2'] = $this->session->userdata("url2");
		$data['step2'] = $this->session->userdata("step2");

		$data['url3'] = $this->session->userdata("url3");
		$data['step3'] = $this->session->userdata("step3");

		$data['url4'] = $this->session->userdata("url4");
		$data['step4'] = $this->session->userdata("step4");

		$data['url5'] = $this->session->userdata("url5");
		$data['step5'] = $this->session->userdata("step5");

		$data['name_type'] = $this->session->userdata("name_type");
		$data['name'] =$this->session->userdata("name");
		$data['name_model'] = $this->session->userdata("name_model");
		$data['name_model_des'] = $this->session->userdata("name_model_des");

		$data['name_year_regis'] = $this->session->userdata("name_year_regis");
		$data['name_year_pro'] = $this->session->userdata("name_year_pro");
		$data['name_color'] = $this->session->userdata("name_color");
		$data['name_gear'] = $this->session->userdata("name_gear");
		$data['name_capacity'] = $this->session->userdata("name_capacity");
		$data['name_mile'] = $this->session->userdata("name_mile");
		$data['name_price'] = $this->session->userdata("name_price");
		$data['descript'] = $this->session->userdata("descript");
		$data['device'] = $this->session->userdata("device");
		$data['downpayment'] = $this->session->userdata("downpayment");
		$data['province'] = $this->session->userdata("province");
		$data['province1'] = $this->session->userdata("province1");


		////////////////////////////////////////////////////////////

		$id_login1 = $this->session->userdata('member_id_log');
		$data['data_member'] = $this->model_page->get_data_check_pass($id_login1);
		
		$id_img = $this->uri->segment(5);

		if($id && $no){

				$check = $this->model_page->gallery_check_id($id=1);
				if($check==TRUE){

					$data['gallery_id']=$id; 
					$data['error']=""; 
					if($error) $data['error']=$error;
								$data['id_image'] = $id;
								$this->load->model('model_page');
								$id_login = $this->input->get('id_login');
								$car_top_id = $this->model_page->check_id2($id_login);
								 $data['query'] = $this->model_page->gallery_multi($id,$car_top_id,$id_login);
								 $data['query1'] = $this->model_page->gallery_multi1($id,$car_top_id,$id_login);
								 $data['query2'] = $this->model_page->gallery_multi2($id,$car_top_id,$id_login);
								 $data['tn'] ="";
								 $data['id_image_multi'] = "";
								 $data['id_data_multi'] = "";

							if($edit != "") {

									$dt = $this->model_page->gallery_edit_image_multi($edit);
									$data['tn'] = $dt->thumb_name_multi;
									$data['id_image_multi'] = $edit;
									$data['id_data_multi'] = $no;
      
								}

								$data['result'] = $this->model_page->gallery_view($id);
								$id_login = $this->input->get('id_login');
								$data['car_top_id_max'] = $this->model_page->check_id($id_login);

								$id_login1 = $this->input->get('id_login');
								$car_top_id_max1 = $this->model_page->check_id1($id_login1);
								$image_4 = $this->model_page->check_image_4($id_login1,$car_top_id_max1);   //เช็ค 4 รูปต้องกรอกให้ครบ

								$car_top_id_text = $this->input->get('car_top_id');

								if(!empty($car_top_id_text) OR $car_top_id_text !=""){

									$count_max_id = $this->model_page->count_max_id($id_login1,$car_top_id_text);
									if($count_max_id<19){
										$data['check_image'] = "yes";
									}else{
										$data['check_image'] = "no";
									}

									if($image_4 == 4){
										$data['check_4_image'] = "4_img";
									}else{
										$data['check_4_image'] = "4_img_no";
									}

								}else{

									$count_max_id = $this->model_page->count_max_id($id_login1,$car_top_id_max1);
									if($count_max_id<19){
										$data['check_image'] = "yes";
									}else{
										$data['check_image'] = "no";
									}

									if($image_4 == 4){
										$data['check_4_image'] = "4_img";
									}else{
										$data['check_4_image'] = "4_img_no";
									}


								}


								$data['check_login_logout'] = $this->session->userdata('member_log');
						        $data['num'] = $no;
						        $data['menu'] = $this->model_page->get_data_menu();
								$data['menu_footer'] = $this->model_page->get_data_menu_footer();
								$data['menu_footer2'] = $this->model_page->get_data_menu_footer2();
								$data['contact'] = $this->model_page->get_data_contact($id=1);
								$data['contact_facebook'] = $this->model_page->get_data_contact_facebook($id=1);
								$data['contact_twitter'] = $this->model_page->get_data_contact_twitter($id=1);
								$data['contact_instragram'] = $this->model_page->get_data_contact_instragram($id=1);
								$data['setting'] = $this->model_page->get_data_setting($id=1);
								$data['data_car_top'] = $this->model_page->data_car_top($car_top_id_max1,$id_login1);

								$id_login = $this->input->get('id_login');
								$car_top_id = $this->model_page->check_id2($id_login);
								$data['query'] = $this->model_page->gallery_multi($id,$car_top_id,$id_login);

								$car_top_id_text = $this->input->get('car_top_id');

								if(!empty($car_top_id_text) OR $car_top_id_text !=""){

									$data['show_1'] = $this->model_page->show_11($id,$car_top_id_text,$id_login);
									$data['show_2'] = $this->model_page->show_22($id,$car_top_id_text,$id_login);
									$data['show_3'] = $this->model_page->show_33($id,$car_top_id_text,$id_login);
									$data['show_4'] = $this->model_page->show_44($id,$car_top_id_text,$id_login);
									$data['show_all'] = $this->model_page->show_all11($id,$car_top_id_text,$id_login);
									$data['check_show_all'] = $this->model_page->check_show_all11($id,$car_top_id_text,$id_login);

								}else{

									$data['show_1'] = $this->model_page->show_1($id,$car_top_id,$id_login);
									$data['show_2'] = $this->model_page->show_2($id,$car_top_id,$id_login);
									$data['show_3'] = $this->model_page->show_3($id,$car_top_id,$id_login);
									$data['show_4'] = $this->model_page->show_4($id,$car_top_id,$id_login);
									$data['show_all'] = $this->model_page->show_all($id,$car_top_id,$id_login);
									$data['check_show_all'] = $this->model_page->check_show_all($id,$car_top_id,$id_login);
								}

								$this->load->view('page/header',$data);
								$this->load->view('page/sale_step3',$data);
								$this->load->view('page/footer',$data);
				}else{

					$id_login1 = $this->input->get('id_login');
					$car_top_id = $this->model_page->check_id1($id_login1);
					$id_image_multi_max = $this->model_page->check_max_car_top_id($id_login1,$car_top_id);


					redirect('sale/gallery_multi/'.$data['gallery_id'].'/'.$no.'?id_login='.$this->input->get('id_login').'&car_top_id='.$this->input->get('car_top_id').'#scroll');
				}
		
		}else{
			redirect('sale','refresh');
		}
	}


	function gallery_upload_image_multi($id="",$errer=""){
		
		$id_login1 = $this->session->userdata('member_id_log');
		$data['data_member'] = $this->model_page->get_data_check_pass($id_login1);

		$id_img = $this->uri->segment(5);

		if($id && $this->input->post('num')){

			if($this->input->post('id_image_multi')){

				$config['upload_path'] = './uploads_car/';
				$config['file_name']  = 'CAR_'.$this->input->post('id_image_multi').'_'.date('Ymd_His').'.jpg';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				//$config['max_width'] = 350;
				
				$this->load->library("upload");
				$this->upload->initialize($config);
				$this->load->library('upload', $config);

					if ( ! $this->upload->do_upload()){
						$lang['upload_invalid_dimensions'] = 'รูปภาพมีขนาดไม่ตรงตามที่ระบบกำหนดไว้';
						
						$error =  $this->upload->display_errors();

						$this->gallery_multi($id,$this->input->post('num'),$this->input->post('id_image_multi'),$error);
						}else{
							$data=$this->upload->data();

							$config['image_library'] = 'gd2';
							$config['source_image'] =$data['full_path'];
							$config['maintain_ratio'] = TRUE;
							
							// $config['width'] = 350;

							$this->load->library('image_lib', $config); 

							$this->image_lib->resize();
							$temp = $this->model_page->gallery_update_image_multi($data);

							$data = array('upload_data' => $this->upload->data());

					$id_login1 = $this->input->get('id_login');
					$car_top_id = $this->model_page->check_id1($id_login1);
					$id_image_multi_max = $this->model_page->check_max_car_top_id($id_login1,$car_top_id);

					redirect('sale/gallery_multi/'.$id.'/'.$this->input->post('num').'/?id_login='.$this->input->get('id_login').'&car_top_id='.$this->input->get('car_top_id').'#scroll_pic'.$this->input->post('id_image_multi').'');
				}

			}else{
					$name_array = array();
					$count = count($_FILES['userfile']['size']);
					foreach($_FILES as $key=>$value)
					for($s=0; $s<=$count-1; $s++) {
						$config['upload_path'] = './uploads_car/';
						$config['file_name']  = 'CAR_'.$id.'_'.date('Ymd_His').'.jpg';
						$config['allowed_types'] = 'gif|jpg|png|jpeg';

						$this->load->library("upload");
						$this->upload->initialize($config);
						$this->load->library('upload', $config);
						$data = $this->upload->data();
						// $this->thumb($data);

							$config['image_library'] = 'gd2';
							$config['source_image'] =$data['full_path'];
							$config['maintain_ratio'] = TRUE;
							// $config['width'] = 350;
							
							$this->load->library('image_lib', $config);
							$this->image_lib->resize();

						$name_array[] = $data['file_name'];
					}
						$names= implode(',', $name_array);
						$filename = $names;
						if ( ! $this->upload->do_upload()){
							$error =  $this->upload->display_errors();
							$this->gallery_multi($id,$this->input->post('num'),'',$error);
						}else{

							$car_top_id_text = $this->input->get('car_top_id');

							if(!empty($car_top_id_text) OR $car_top_id_text!=""){

								$id_login1 = $this->input->get('id_login');
								$car_top_id_max1 = $this->model_page->check_id1($id_login1);
								$count_max_id = $this->model_page->count_max_id($id_login1,$car_top_id_max1);

								if($count_max_id<19){  //-อัพรูปภาพไม่เกิน 19 รูป
									$id_login = $this->input->get('id_login');
									$car_top_id_max = $this->model_page->check_id($id_login);


									$query_queue_sort = $this->db->query ( "SELECT MAX(sort_no) as max_id FROM gallery_uploads_multi WHERE car_top_id=".$this->input->get('car_top_id')."" );
		      						 $queue_sort = $query_queue_sort->row ();

									$data = array(
									'gallery_id' => $id,
									'thumb_name_multi'=>$filename,
									'upload_date'=>date("Y-m-d H:i:s"),
									'sort_no'=>$queue_sort->max_id+1,
									'car_top_id'=>$this->input->get('car_top_id'),
									'id_login'=>$this->input->get('id_login')
									);
									$this->db->insert('gallery_uploads_multi', $data);

									$id_login1 = $this->input->get('id_login');
									$car_top_id = $this->model_page->check_id1($id_login1);
									$id_image_multi_max = $this->model_page->check_max_car_top_id($id_login1,$car_top_id);

									redirect('sale/gallery_multi/'.$id.'/'.$this->input->post('num').'?id_login='.$this->input->get('id_login').'&car_top_id='.$this->input->get('car_top_id').'#scroll_pic'.$this->input->post('id_image_multi').'');
								}else{

									if($this->lang->line("set_lang")=="th"){
									
									echo "<script>alert('อัพโหลดรูปภาพไม่เกิน 15 รูปเท่านั้น');</script>";
									redirect(base_url('sale/gallery_multi/1/1/?id_login='.$this->input->get('id_login').'&car_top_id='.$this->input->get('car_top_id').'#scroll_pic'.$this->input->post('id_image_multi').''), "refresh");

									}else{

									echo "<script>alert('Upload no more than 15 photos.');</script>";
									redirect(base_url('sale/gallery_multi/1/1?id_login='.$this->input->get('id_login').'&car_top_id='.$this->input->get('car_top_id').'#scroll_pic'.$this->input->post('id_image_multi').''), "refresh");

									}
								}

							}else{

								$id_login1 = $this->input->get('id_login');
								$car_top_id_max1 = $this->model_page->check_id1($id_login1);
								$count_max_id = $this->model_page->count_max_id($id_login1,$car_top_id_max1);

								
								if($count_max_id<19){  //-อัพรูปภาพไม่เกิน 19 รูป
									$id_login = $this->input->get('id_login');
									$car_top_id_max = $this->model_page->check_id($id_login);


									$query_queue_sort = $this->db->query ( "SELECT MAX(sort_no) as max_id FROM gallery_uploads_multi WHERE car_top_id=".$this->input->post('car_top_id')."" );
		      						 $queue_sort = $query_queue_sort->row ();

									$data = array(
									'gallery_id' => $id,
									'thumb_name_multi'=>$filename,
									'upload_date'=>date("Y-m-d H:i:s"),
									'sort_no'=>$queue_sort->max_id+1,
									'car_top_id'=>$this->input->post('car_top_id'),
									'id_login'=>$this->input->get('id_login')
									);
									$this->db->insert('gallery_uploads_multi', $data);

									$id_login1 = $this->input->get('id_login');
									$car_top_id = $this->model_page->check_id1($id_login1);
									$id_image_multi_max = $this->model_page->check_max_car_top_id($id_login1,$car_top_id);

									redirect('sale/gallery_multi/'.$id.'/'.$this->input->post('num').'?id_login='.$this->input->get('id_login').'&car_top_id='.$this->input->get('car_top_id').'#scroll_pic'.$this->input->post('id_image_multi').'');
								}else{

									if($this->lang->line("set_lang")=="th"){
									
									echo "<script>alert('อัพโหลดรูปภาพไม่เกิน 15 รูปเท่านั้น');</script>";
									redirect(base_url('sale/gallery_multi/1/1/?id_login='.$this->input->get('id_login').'&car_top_id='.$this->input->get('car_top_id').'#scroll_pic'.$this->input->post('id_image_multi').''), "refresh");

									}else{

									echo "<script>alert('Upload no more than 15 photos.');</script>";
									redirect(base_url('sale/gallery_multi/1/1?id_login='.$this->input->get('id_login').'&car_top_id='.$this->input->get('car_top_id').'#scroll_pic'.$this->input->post('id_image_multi').''), "refresh");

									}

								}
							}

							
						}
				}
			}else{

				redirect('sale','refresh');
			}
	}


	function gallery_delete_image_multi($id="",$no="",$edit="") {

		$id_img = $this->uri->segment(5);

		if($id && $no && $edit){

			$this->model_page->gallery_delete_image_multi($edit);

			$id_login1 = $this->input->get('id_login');
			$car_top_id = $this->model_page->check_id1($id_login1);
			$id_image_multi_max = $this->model_page->check_max_car_top_id($id_login1,$car_top_id);

			redirect('sale/gallery_multi/'.$id.'/'.$no.'?id_login='.$this->input->get('id_login').'&car_top_id='.$this->input->get('car_top_id').'#scroll_pic_all'.($this->input->get('sort_no')-1));
		}else{
			redirect('sale','refresh');
		}
	}

	function gallery_delete_image_multi_4($id="",$no="",$edit="") {
		$id_img = $this->uri->segment(5);

		if($id && $no && $edit){

			$this->model_page->gallery_delete_image_multi_4($edit);

			$id_login1 = $this->input->get('id_login');
			$car_top_id = $this->model_page->check_id1($id_login1);
			$id_image_multi_max = $this->model_page->check_max_car_top_id($id_login1,$car_top_id);


			redirect('sale/gallery_multi/'.$id.'/'.$no.'/?id_login='.$this->input->get('id_login').'&car_top_id='.$this->input->get('car_top_id').'#scroll_pic'.$edit.'');
		}else{
			redirect('sale','refresh');
		}
	}

	/////////////////////////////////upload - step4/////////////////////////////////

	public function file_multi($id="1",$no="",$edit="",$error=""){

		$data['url_step1'] = $this->session->userdata("url_step1");

		//////////////////set session check step///////////////////////////////
		$data['url1'] = $this->session->userdata("url1");
		$data['step1'] = $this->session->userdata("step1");

		$data['url2'] = $this->session->userdata("url2");
		$data['step2'] = $this->session->userdata("step2");

		$data['url3'] = $this->session->userdata("url3");
		$data['step3'] = $this->session->userdata("step3");

		$data['url4'] = $this->session->userdata("url4");
		$data['step4'] = $this->session->userdata("step4");

		$data['url5'] = $this->session->userdata("url5");
		$data['step5'] = $this->session->userdata("step5");

		$data['name_year_regis'] = $this->session->userdata("name_year_regis");
		$data['name_year_pro'] = $this->session->userdata("name_year_pro");
		$data['name_color'] = $this->session->userdata("name_color");
		$data['name_gear'] = $this->session->userdata("name_gear");
		$data['name_capacity'] = $this->session->userdata("name_capacity");
		$data['name_mile'] = $this->session->userdata("name_mile");
		$data['name_price'] = $this->session->userdata("name_price");
		$data['descript'] = $this->session->userdata("descript");
		$data['device'] = $this->session->userdata("device");
		$data['downpayment'] = $this->session->userdata("downpayment");

		$data['province'] = $this->session->userdata("province");
		$data['province1'] = $this->session->userdata("province1");


		////////////////////////////////////////////////////////////

		$id_login1 = $this->session->userdata('member_id_log');
		$data['data_member'] = $this->model_page->get_data_check_pass($id_login1);

		$id_img = $this->uri->segment(5);

		if($id && $no){

				$check = $this->model_page->gallery_check_id($id=1);
				if($check==TRUE){

					$data['file_id']=$id; 
					$data['error']=""; 
					if($error) $data['error']=$error;
								$data['id_image'] = $id;
								$this->load->model('model_page');
								$id_login = $this->input->get('id_login');
								$car_top_id = $this->model_page->check_id2($id_login);

								$car_top_id_text = $this->input->get('car_top_id');

								if(!empty($car_top_id_text) OR $car_top_id_text!=""){

									$car_top_id = $this->input->get('car_top_id');
									$data['query'] = $this->model_page->file_multi_text($id,$car_top_id);
								 	$data['query1'] = $this->model_page->file_multi1_text($id,$car_top_id);
									
								}else{

									$car_top_id = $this->model_page->check_id2($id_login);
									$data['query'] = $this->model_page->file_multi($id,$car_top_id,$id_login);
								 	$data['query1'] = $this->model_page->file_multi1($id,$car_top_id,$id_login);
								}							
								 $data['tn'] ="";
								 $data['id_image_multi'] = "";
								 $data['id_data_multi'] = "";

							if($edit != "") {
									$dt = $this->model_page->file_edit_image_multi($edit);
									$data['tn'] = $dt->thumb_name_multi;
									$data['id_image_multi'] = $edit;
									$data['id_data_multi'] = $no;  								       
								}

								$data['result'] = $this->model_page->gallery_view($id);

								$id_login = $this->input->get('id_login');
								$data['car_top_id_max'] = $this->model_page->check_id($id_login);

								$id_login1 = $this->input->get('id_login');

								$car_top_id_text = $this->input->get('car_top_id');

								if(!empty($car_top_id_text) OR $car_top_id_text !=""){

									$id_image_multi_max = $this->model_page->check_max_car_top_id_file_text($car_top_id_text);

									$car_top_id_max1 = $this->model_page->check_id1($id_login1);
									$image_2 = $this->model_page->check_image_2_text($id_login1,$car_top_id_text);   //เช็ค 4 รูปต้องกรอกให้ครบ

									if($image_2 == 2){
										$data['check_2_image'] = "2_img";
									}else{
										$data['check_2_image'] = "2_img_no";
									}

								}else{

									$car_top_id = $this->model_page->check_id1($id_login1);
									$id_image_multi_max = $this->model_page->check_max_car_top_id_file($id_login1,$car_top_id);

									$car_top_id_max1 = $this->model_page->check_id1($id_login1);
									$image_2 = $this->model_page->check_image_2($id_login1,$car_top_id_max1);   //เช็ค 4 รูปต้องกรอกให้ครบ

									if($image_2 == 2){
										$data['check_2_image'] = "2_img";
									}else{
										$data['check_2_image'] = "2_img_no";
									}
								}

								$data['check_login_logout'] = $this->session->userdata('member_log');
						        $data['num'] = $no;
						        $data['menu'] = $this->model_page->get_data_menu();
								$data['menu_footer'] = $this->model_page->get_data_menu_footer();
								$data['menu_footer2'] = $this->model_page->get_data_menu_footer2();
								$data['contact'] = $this->model_page->get_data_contact($id=1);
								$data['contact_facebook'] = $this->model_page->get_data_contact_facebook($id=1);
								$data['contact_twitter'] = $this->model_page->get_data_contact_twitter($id=1);
								$data['contact_instragram'] = $this->model_page->get_data_contact_instragram($id=1);
								$data['setting'] = $this->model_page->get_data_setting($id=1);

								$id_login1 = $this->input->get('id_login');
								$data['car_top_id_max1'] = $this->model_page->check_id1($id_login1);

								$car_top_id_text = $this->input->get('car_top_id');
								$data['car_data'] = $this->model_page->get_data_car_top_edit($car_top_id_text);


								$this->load->view('page/header',$data);
								$this->load->view('page/sale_step4',$data);
								$this->load->view('page/footer',$data);
				}else{
					redirect('sale/file_multi/'.$data['file_id'].'/'.$no.'/'.$id_img.'/?id_login='.$this->input->get('id_login').'&car_top_id='.$this->input->get('car_top_id').'#scroll');
				}		
		}else{
			redirect('sale','refresh');
		}
	}

	function file_upload_image_multi($id="",$errer=""){
		
		$id_login1 = $this->session->userdata('member_id_log');
		$data['data_member'] = $this->model_page->get_data_check_pass($id_login1);

		$id_img = $this->uri->segment(5);
		if($id && $this->input->post('num')){

			if($this->input->post('id_image_multi')){

				$config['upload_path'] = './uploads_file/';
				$config['file_name']  = 'FILE_'.$this->input->post('id_image_multi').'_'.date('Ymd_His').'.jpg';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				
				$this->load->library("upload");
				$this->upload->initialize($config);
				$this->load->library('upload', $config);

					if ( ! $this->upload->do_upload()){
						$error =  $this->upload->display_errors();
						$this->file_multi($id,$this->input->post('num'),$this->input->post('id_image_multi'),$error);
						}else{
							$data=$this->upload->data();

							$config['image_library'] = 'gd2';
							$config['source_image'] =$data['full_path'];
							//$config['create_thumb'] = TRUE;
							$config['maintain_ratio'] = TRUE;
							// $config['width'] = 350;
							$this->load->library('image_lib', $config);
							$this->image_lib->resize();

							$temp = $this->model_page->file_update_image_multi($data);

							$data = array('upload_data' => $this->upload->data());

							$id_login1 = $this->input->get('id_login');
							$car_top_id = $this->model_page->check_id1($id_login1);
							$id_image_multi_max = $this->model_page->check_max_car_top_id_file($id_login1,$car_top_id);

					redirect('sale/file_multi/'.$id.'/'.$this->input->post('num').'/'.$id_img.'/?id_login='.$this->input->get('id_login').'&car_top_id='.$this->input->get('car_top_id').'#scroll');
				}

			}else{
					$name_array = array();
					$count = count($_FILES['userfile']['size']);
					foreach($_FILES as $key=>$value)
					for($s=0; $s<=$count-1; $s++) {
						$config['upload_path'] = './uploads_file/';
						$config['file_name']  = 'FILE_'.$id.'_'.date('Ymd_His').'.jpg';
						$config['allowed_types'] = 'gif|jpg|png|jpeg';
				
						$this->load->library("upload");
						$this->upload->initialize($config);
						$this->load->library('upload', $config);
						$data = $this->upload->data();

							$config['image_library'] = 'gd2';
							$config['source_image'] =$data['full_path'];
							//$config['create_thumb'] = TRUE;
							$config['maintain_ratio'] = TRUE;
							// $config['width'] = 350;
							$this->load->library('image_lib', $config);
							$this->image_lib->resize();

						$name_array[] = $data['file_name'];
					}
						$names= implode(',', $name_array);
						$filename = $names;
						if ( ! $this->upload->do_upload()){
							$error =  $this->upload->display_errors();
							$this->file_multi($id,$this->input->post('num'),'',$error);
						}else{

							$id_login1 = $this->input->get('id_login');
							$car_top_id_max1 = $this->model_page->check_id1($id_login1);
							$count_max_id = $this->model_page->count_max_file_id($id_login1,$car_top_id_max1);
							
							if($count_max_id<1){  //-เช็คเลือกไฟล์อัพโหลด

								$id_login = $this->input->get('id_login');
								$car_top_id_max = $this->model_page->check_id($id_login);

								$query_queue_sort = $this->db->query ( "SELECT MAX(sort_no) as max_id FROM file_uploads_multi WHERE file_id=".$id." AND car_top_id =".$this->input->post('car_top_id')."" );
	      						 $queue_sort = $query_queue_sort->row ();
								$data = array(
								'file_id' => $id,
								'thumb_name_multi'=>$filename,
								'upload_date'=>date("Y-m-d H:i:s"),
								'sort_no'=>$queue_sort->max_id+1,
								'car_top_id'=>$this->input->post('car_top_id'),
								'id_login'=>$this->input->get('id_login')
								);
								$this->db->insert('file_uploads_multi', $data);

								$id_login1 = $this->input->get('id_login');
								$car_top_id = $this->model_page->check_id1($id_login1);
								$id_image_multi_max = $this->model_page->check_max_car_top_id_file($id_login1,$car_top_id);

								redirect('sale/file_multi/'.$id.'/'.$this->input->post('num').'/'.$id_img.'/?id_login='.$this->input->get('id_login').'&car_top_id='.$this->input->get('car_top_id').'');

							}else{
								if($this->lang->line("set_lang")=="th"){
								
								echo "<script>alert('กรุณาเลือกไฟล์อัพโหลด');</script>";
								redirect(base_url('sale/file_multi/1/1?id_login='.$this->input->get('id_login').'&car_top_id='.$this->input->get('car_top_id').''), "refresh");

								}else{

								echo "<script>alert('Please select a file upload.');</script>";
								redirect(base_url('sale/file_multi/1/1?id_login='.$this->input->get('id_login').'&car_top_id='.$this->input->get('car_top_id').''), "refresh");

								}
							}
						}
				}
			}else{
				redirect('sale','refresh');
			}
	}

	function file_delete_image_multi($id="",$no="",$edit="") {
		$id_img = $this->uri->segment(5);
		if($id && $no && $edit){

			$this->model_page->file_delete_image_multi($edit);

			$id_login1 = $this->input->get('id_login');
			$car_top_id = $this->model_page->check_id1($id_login1);
			$id_image_multi_max = $this->model_page->check_max_car_top_id_file($id_login1,$car_top_id);

			redirect('sale/file_multi/'.$id.'/'.$no.'/'.$id_img.'/?id_login='.$this->input->get('id_login').'&car_top_id='.$this->input->get('car_top_id').'#scroll');
		}else{
			redirect('sale','refresh');
		}
	}

	public function sale_step5(){

		$this->session->unset_userdata('url_step1');
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

		$this->session->unset_userdata('name_type');
		$this->session->unset_userdata('name');
		$this->session->unset_userdata('name_model');
		$this->session->unset_userdata('name_model_des');
		$this->session->unset_userdata('province');
		$data['url_step1'] = $this->session->userdata("url_step1");

		//////////////////set session check step///////////////////////////////
		$data['url1'] = $this->session->userdata("url1");
		$data['step1'] = $this->session->userdata("step1");

		$data['url2'] = $this->session->userdata("url2");
		$data['step2'] = $this->session->userdata("step2");

		$data['url3'] = $this->session->userdata("url3");
		$data['step3'] = $this->session->userdata("step3");

		$data['url4'] = $this->session->userdata("url4");
		$data['step4'] = $this->session->userdata("step4");

		$data['url5'] = $this->session->userdata("url5");
		$data['step5'] = $this->session->userdata("step5");

		////////////////////////////////////////////////////////////
		
		$id_login1 = $this->session->userdata('member_id_log');
		$data['data_member'] = $this->model_page->get_data_check_pass($id_login1);
		
			$data['check_login_logout'] = $this->session->userdata('member_log');
			$data['menu'] = $this->model_page->get_data_menu();
			$data['menu_footer'] = $this->model_page->get_data_menu_footer();
			$data['menu_footer2'] = $this->model_page->get_data_menu_footer2();
			$data['contact'] = $this->model_page->get_data_contact($id=1);
			$data['contact_facebook'] = $this->model_page->get_data_contact_facebook($id=1);
			$data['contact_twitter'] = $this->model_page->get_data_contact_twitter($id=1);
			$data['contact_instragram'] = $this->model_page->get_data_contact_instragram($id=1);
			$data['setting'] = $this->model_page->get_data_setting($id=1);

			$data['province'] = $this->model_page->get_data_province();
			$data['id_login'] = $this->input->get('id_login');
			$data['province1'] = $this->input->get('province');

			$id_login1 = $this->input->get('id_login');
			$car_top_id_max1 = $this->model_page->check_id1($id_login1);

			$this->model_page->car_top_complete($id_login1,$car_top_id_max1);
			$this->model_page->car_top_delete_no_complete($id_login1,$car_top_id_max1);

			$car_top_id_text = $this->input->get('car_top_id');

			if(!empty($car_top_id_text) OR $car_top_id_text !=""){
				$car_top_id_max1 = $car_top_id_text;
				$comment_member = $this->input->post('comment_member');
				$this->model_page->car_top_comment($id_login1,$car_top_id_max1);
				$this->send_email_comment($id_login1,$car_top_id_max1,$comment_member);
			}else{
				$this->model_page->car_top_comment($id_login1,$car_top_id_max1);
				$car_top_id_max1 = $this->model_page->check_id1($id_login1);
				$this->send_email($id_login1,$car_top_id_max1);
			}

			$this->load->view('page/header',$data);
			$this->load->view('page/sale_step5',$data);
			$this->load->view('page/footer',$data);
	}

	public function sale_step5_complete(){

		$this->session->unset_userdata('url_step1');
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

		$this->session->unset_userdata('name_type');
		$this->session->unset_userdata('name');
		$this->session->unset_userdata('name_model');
		$this->session->unset_userdata('name_model_des');
		$this->session->unset_userdata('province');

		redirect('sale','refresh');
	}

	public function send_email($id_login1,$car_top_id_max1){

		$row = $this->model_page->get_data_login($id_login1);
		$row1 = $this->model_page->get_data_car_top1($id_login1,$car_top_id_max1);

		$this->load->library('email');
		$config['protocol'] = 'mail';

		 $config['charset'] = 'utf-8';
		 $config['wordwrap'] = FALSE;
		 $config['mailtype'] = "html";
		 $config['newline'] = '<br>';
	     $config['crlf'] = '<br>'; 
		 $this->email->initialize($config);
			
		$this->email->from('contact-postsicar@postsicar.com','บริษัท POSTSICAR (ไทยแลนด์) จำกัด');
		
		$this->email->to($row['email']);
		$this->email->subject('ระบบแจ้งเตือนการขายของคุณ '.$row['name'].' โดยบริษัท POSTSICAR (ไทยแลนด์) จำกัด');

		$data="";
		$data.=" คุณ ".$row['name'];
		$data.="<br>";
		$data.="ได้ทำการเพิ่มข้อมูลการขาย NO. ".$row1['no_car']." เรียบร้อยแล้ว";
		$data.="<br>";
		$data.="รอผู้ดูแลระบบทำการตรวจสอบ";
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

	public function send_email_comment($id_login1,$car_top_id_max1,$comment_member){

		$row = $this->model_page->get_data_login($id_login1);
		$row1 = $this->model_page->get_data_car_top1($id_login1,$car_top_id_max1);

		$this->load->library('email');
		$config['protocol'] = 'mail';

		 $config['charset'] = 'utf-8';
		 $config['wordwrap'] = FALSE;
		 $config['mailtype'] = "html";
		 $config['newline'] = '<br>';
	     $config['crlf'] = '<br>'; 
		 $this->email->initialize($config);
			
		$this->email->from('contact-postsicar@postsicar.com','บริษัท POSTSICAR (ไทยแลนด์) จำกัด');
		
		$this->email->to($row['email']);
		$this->email->subject('ระบบแจ้งเตือนการขายของคุณ '.$row['name'].' โดยบริษัท POSTSICAR (ไทยแลนด์) จำกัด');

		$data="";
		$data.=" คุณ ".$row['name'];
		$data.="<br>";
		$data.="ได้ทำการอัพเดตข้อมูลการขาย NO. ".$row1['no_car']." เรียบร้อยแล้ว";
		$data.="<br>";
		$data.="ข้อความจากผู้ประกาศขาย : ";
		$data.="<br>";
		$data.="".$comment_member."";
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

