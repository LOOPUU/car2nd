<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("Asia/Bangkok");
class Home extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('model_page');
		 $lang=$this->session->userdata("lang")==null?"thailand":$this->session->userdata("lang");
		 $this->lang->load($lang,$lang);
	}

	public function change($type)
	{
		$this->session->set_userdata('lang',$type);
		redirect("home","refresh");
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

		// if(!empty($this->session->userdata('member_id_log'))){
		// 	$this->session->unset_userdata('member_id_log');
		// 	$this->session->unset_userdata('member_name_log');
		// 	$this->session->unset_userdata('member_log');
		// }

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
		 $data['menu'] = $this->model_page->get_data_menu();
		 $data['banner'] = $this->model_page->get_data_banner();
		 $data['banner_count'] = $this->model_page->get_data_banner_count();
		 $data['car_top'] = $this->model_page->get_data_car_top_home();
		 $data['car_top2'] = $this->model_page->get_data_car_top_home2();
		 $data['car_top_count'] = $this->model_page->get_data_car_top_home_count();
		 $data['car_top2_count'] = $this->model_page->get_data_car_top_home2_count();
		 $data['about'] = $this->model_page->get_data_about($id=1);
		 $data['finance1'] = $this->model_page->get_data_finance1();
		 $data['finance2'] = $this->model_page->get_data_finance2();
		 $data['finance3'] = $this->model_page->get_data_finance3();
		 $data['news'] = $this->model_page->get_data_news();
		 $data['menu_footer'] = $this->model_page->get_data_menu_footer();
		 $data['menu_footer2'] = $this->model_page->get_data_menu_footer2();
		 $data['contact'] = $this->model_page->get_data_contact($id=1);
		 $data['contact_facebook'] = $this->model_page->get_data_contact_facebook($id=1);
		 $data['contact_twitter'] = $this->model_page->get_data_contact_twitter($id=1);
		 $data['contact_instragram'] = $this->model_page->get_data_contact_instragram($id=1);
		 $data['setting'] = $this->model_page->get_data_setting($id=1);



		$car_type_id = $this->input->get('car_type_id');
		$car_id = $this->input->get('car_id');
		$data['result_type'] = $this->model_page->get_data_car_type_buy();
		$data['result'] = $this->model_page->get_data_car_buy1();
		$data['result_model'] = $this->model_page->get_data_car_model_buy1();
		$data['result_model_des'] = $this->model_page->get_data_car_model_des_buy1();
		$data['result_price'] = $this->model_page->get_data_price();




		$this->load->view('page/header',$data);
		$this->load->view('page/banner',$data);
		$this->load->view('page/home',$data);
		$this->load->view('page/footer',$data);

	
	}

	 



	
}

