<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("Asia/Bangkok");
class News extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('model_page');
		$lang=$this->session->userdata("lang")==null?"thailand":$this->session->userdata("lang");
		$this->lang->load($lang,$lang);
		$this->load->library('pagination');
	}

	public function change($type)
	{
		$this->session->set_userdata('lang',$type);
		$page_news = $this->session->userdata('page_news');
		$check = $page_news;
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
		 $data['menu'] = $this->model_page->get_data_menu();
		 $data['banner'] = $this->model_page->get_data_banner();
		 $data['banner_count'] = $this->model_page->get_data_banner_count();
		 // $data['count_news'] = $this->model_page->get_data_banner_news_all();
		 $data['car_top'] = $this->model_page->get_data_car_top();
		 $data['about'] = $this->model_page->get_data_about($id=1);
		 $data['finance1'] = $this->model_page->get_data_finance1();
		 $data['finance2'] = $this->model_page->get_data_finance2();
		 $data['finance3'] = $this->model_page->get_data_finance3();
		 $data['news'] = $this->model_page->get_data_news();
		 
		 $data['news_top'] = $this->model_page->get_data_news_top();
		 $data['menu_footer'] = $this->model_page->get_data_menu_footer();
		 $data['menu_footer2'] = $this->model_page->get_data_menu_footer2();
		 $data['contact'] = $this->model_page->get_data_contact($id=1);
		 $data['contact_facebook'] = $this->model_page->get_data_contact_facebook($id=1);
		 $data['contact_twitter'] = $this->model_page->get_data_contact_twitter($id=1);
		 $data['contact_instragram'] = $this->model_page->get_data_contact_instragram($id=1);
		 $data['setting'] = $this->model_page->get_data_setting($id=1);

		if($this->input->get('page')!=="news_view"){
				$offset = $this->input->get('offset');
				$page = $this->input->get('page');
				
				if($this->lang->line("set_lang")=="th"){
					$lang = $this->lang->line("set_lang");
				}else{
					$lang = $this->lang->line("set_lang");
				}

				$data['news_all'] = $this->model_page->get_data_news_all($offset,$lang,$page);
				$data['count_all'] = $this->model_page->get_data_count_all($offset,$lang,$page);
				$data['count_news'] = $this->model_page->get_data_count_news();

				$this->load->view('page/header',$data);
				$this->load->view('page/banner_all',$data);
				$this->load->view('page/news',$data);
				$this->load->view('page/footer',$data);

		}else{

			$news_id = $this->input->get('news_id');
			$data['news_view'] = $this->model_page->get_data_news_view($news_id);
		
			$this->load->view('page/header',$data);
			$this->load->view('page/banner_all',$data);
			$this->load->view('page/news',$data);
			$this->load->view('page/footer',$data);
		}

	
	}

	 



	
}

