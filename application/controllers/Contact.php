<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("Asia/Bangkok");
class Contact extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('model_page');
		 $lang=$this->session->userdata("lang")==null?"thailand":$this->session->userdata("lang");
		$this->lang->load($lang,$lang);
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
		$this->load->helper('security');
		
	}

	public function change($type)
	{
		$this->session->set_userdata('lang',$type);
		$page_contact = $this->session->userdata('page_contact');
		$check = $page_contact;
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

		$this->session->unset_userdata('page');

		////////////////////////////////////////////////////////////

		$id_login1 = $this->session->userdata('member_id_log');
		$data['data_member'] = $this->model_page->get_data_check_pass($id_login1);

		$data['check_login_logout'] = $this->session->userdata('member_log');
		$data['banner'] = $this->model_page->get_data_banner();
		$data['banner_count'] = $this->model_page->get_data_banner_count();
		// $data['count_contact'] = $this->model_page->get_data_banner_contact_all();
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
		$this->load->view('page/banner_all',$data);
		$this->load->view('page/contact',$data);
		$this->load->view('page/footer',$data);

	}

	public function suggestion_save()
	{

		$id_login1 = $this->session->userdata('member_id_log');
		$data['data_member'] = $this->model_page->get_data_check_pass($id_login1);
		
		
		if($this->lang->line("set_lang")=="th"){
		 $this->form_validation->set_message('required', 'กรุณากรอก{field}');
		 $this->form_validation->set_rules('topic', 'หัวข้อที่ต้องการติดต่อ', 'trim|required|xss_clean' );
	     $this->form_validation->set_rules('name', 'ชื่อ - นามสกุล', 'trim|required|xss_clean' );
	     $this->form_validation->set_rules('tel', 'เบอร์โทรศัพท์', 'trim|required|xss_clean' );
	     $this->form_validation->set_rules('email', 'อีเมล', 'trim|required|xss_clean' );
	     $this->form_validation->set_rules('description', 'คำอธิบาย', 'trim|required|xss_clean' );
		 
		}else{
		 $this->form_validation->set_message('required', 'Please fill {field}');
		 $this->form_validation->set_rules('topic', 'Topic Contact Us', 'trim|required|xss_clean' );
	     $this->form_validation->set_rules('name', 'Name - Surname', 'trim|required|xss_clean' );
	     $this->form_validation->set_rules('tel', 'Telephone', 'trim|required|xss_clean' );
	     $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean' );
	     $this->form_validation->set_rules('description', 'Explanation', 'trim|required|xss_clean' );	
		}

	     

		if($this->form_validation->run()==FALSE){
			$data['check_login_logout'] = $this->session->userdata('member_log');
			$data['banner'] = $this->model_page->get_data_banner();
			$data['banner_count'] = $this->model_page->get_data_banner_count();
			//$data['count_contact'] = $this->model_page->get_data_banner_contact_all();
			$data['menu'] = $this->model_page->get_data_menu();
			$data['about'] = $this->model_page->get_data_about($id=1);
			$data['menu_footer'] = $this->model_page->get_data_menu_footer();
			$data['menu_footer2'] = $this->model_page->get_data_menu_footer2();
			$data['contact'] = $this->model_page->get_data_contact($id=1);
			$data['contact_facebook'] = $this->model_page->get_data_contact_facebook($id=1);
			$data['contact_twitter'] = $this->model_page->get_data_contact_twitter($id=1);
			$data['contact_instragram'] = $this->model_page->get_data_contact_instragram($id=1);
			$data['setting'] = $this->model_page->get_data_setting($id=1);
			// $data['map'] = $this->model_page->get_data_map($id=1);

			$this->load->view('page/header',$data);
			$this->load->view('page/banner_all',$data);
			$this->load->view('page/contact',$data);
			$this->load->view('page/footer',$data);

		}else{

			$this->model_page->suggestion_add();

			$topic = $this->input->post('topic');
			$name = $this->input->post('name');
			$tel = $this->input->post('tel');
			$email = $this->input->post('email');
			$description = $this->input->post('description');

			$this->send_email_suggestion($topic,$name,$tel,$email,$description);

			if($this->lang->line("set_lang")=="th"){
				echo "<script>
				alert('ส่งข้อความสำเร็จ');
				window.location.href='".base_url('contact/')."';
				</script>";
			}else{
				echo "<script>
				alert('Send message successfully.');
				window.location.href='".base_url('contact/')."';
				</script>";
			}	
		}
	}


	public function send_email_suggestion($topic="",$name="",$tel="",$email="",$description=""){

		$row = array();
		$row = $this->model_page->get_data_email();

		foreach ($row as $data1) {
			$elements[] = $data1->email;	
		}

		$email1 =  implode(',', $elements);

		$this->load->library('email');
		$config['protocol'] = 'mail';

		 $config['charset'] = 'utf-8';
		 $config['wordwrap'] = FALSE;
		 $config['mailtype'] = "html";
		 $config['newline'] = '<br>';
	     $config['crlf'] = '<br>'; 
		 $this->email->initialize($config);
			
		$this->email->from('contact-postsicar@postsicar.com','บริษัท POSTSICAR (ไทยแลนด์) จำกัด');
		$this->email->to($email1);
		$this->email->subject('ระบบ '.$this->lang->line("contact1").' บริษัท POSTSICAR (ไทยแลนด์) จำกัด');

		$data="";
		$data.=$this->lang->line("contact3").' : '.$topic;
		$data.="<br>";
		$data.=$this->lang->line("contact4").' : '.$name;
		$data.="<br>";
		$data.=$this->lang->line("tel").' : '.$tel;
		$data.="<br>";
		$data.=$this->lang->line("email").' : '.$email;
		$data.="<br>";
		$data.=$this->lang->line("contact7").' : '.nl2br($description);
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

