<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("Asia/Bangkok");
class Buy extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('model_page');
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
		$this->load->helper('security');
		$this->load->library('pagination');
		  $lang=$this->session->userdata("lang")==null?"thailand":$this->session->userdata("lang");
		 $this->lang->load($lang,$lang);
	}

	public function change($type)
	{
		$this->session->set_userdata('lang',$type);
		$page_buy = $this->session->userdata('page_buy');
		$check = $page_buy;
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

		////////////////////////////////////////////////////////////

		$id_login1 = $this->session->userdata('member_id_log');
		$data['data_member'] = $this->model_page->get_data_check_pass($id_login1);

			$this->form_validation->set_rules('name_type', '', 'trim|xss_clean' );
			$this->form_validation->set_rules('name', '', 'trim|xss_clean' );
			$this->form_validation->set_rules('name_model', '', 'trim|xss_clean' );
			$this->form_validation->set_rules('name_model_des', '', 'trim|xss_clean' );
			$this->form_validation->set_rules('keyword', '', 'trim|xss_clean' );
			$this->form_validation->set_rules('province', '', 'trim|xss_clean' );
			$this->form_validation->set_rules('price', '', 'trim|xss_clean' );
			$this->form_validation->set_rules('year_pro', '', 'trim|xss_clean' );
			$this->form_validation->set_rules('year_regis', '', 'trim|xss_clean' );
			$this->form_validation->set_rules('color', '', 'trim|xss_clean' );
			$this->form_validation->set_rules('gear', '', 'trim|xss_clean' );
			$this->form_validation->set_rules('capacity', '', 'trim|xss_clean' );
			$this->form_validation->set_rules('mile', '', 'trim|xss_clean' );

			if($this->form_validation->run()==FALSE){
				//echo "ไม่เลือก";
		        $type = $this->input->get('type');
				$brand = $this->input->get('brand');
				$model = $this->input->get('model');
				$model_des = $this->input->get('model_des');
				$offset = $this->input->get('offset');
				$page = $this->input->get('page');
			

				if($this->lang->line("set_lang")=="th"){
					$lang = $this->lang->line("set_lang");
				}else{
					$lang = $this->lang->line("set_lang");
				}

				$data['car_all'] = $this->model_page->search_all($offset,$lang,$page); 
				$data['count_all'] = $this->model_page->get_data_car_count($offset,$lang);
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
				$data['id_login'] = $this->input->get('id_login');
				$car_type_id = $this->input->get('car_type_id');
				$car_id = $this->input->get('car_id');
				$car_medel_id = $this->input->get('car_model_id');
				$data['result_type'] = $this->model_page->get_data_car_type();
				$data['result'] = $this->model_page->get_data_car_buy1();
				$data['result_model'] = $this->model_page->get_data_car_model_buy1();
				$data['result_model_des'] = $this->model_page->get_data_car_model_des_buy1();
				$data['result_color'] = $this->model_page->get_data_car_color();
				$data['result_year'] = $this->model_page->get_data_car_year();
				$data['result_gear'] = $this->model_page->get_data_car_gear();
				$data['result_capacity'] = $this->model_page->get_data_car_capacity();
				$data['result_device'] = $this->model_page->get_data_car_device();
				$data['result_province'] = $this->model_page->get_data_province();
				$data['result_price'] = $this->model_page->get_data_price();
				$data['result_mile'] = $this->model_page->get_data_mile();

				$this->load->view('page/header',$data);
				$this->load->view('page/buy',$data);
				$this->load->view('page/footer',$data);
			}else{
				//echo "เลือก";
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
				$data['id_login'] = $this->input->get('id_login');
				$car_type_id = $this->input->get('car_type_id');
				$car_id = $this->input->get('car_id');
				$car_model_id = $this->input->get('car_model_id');
				$data['result_type'] = $this->model_page->get_data_car_type_buy();
				$data['result'] = $this->model_page->get_data_car_buy1();
				$data['result_model'] = $this->model_page->get_data_car_model_buy1();
				$data['result_model_des'] = $this->model_page->get_data_car_model_des_buy1();
				$data['result_color'] = $this->model_page->get_data_car_color();
				$data['result_year'] = $this->model_page->get_data_car_year();
				$data['result_gear'] = $this->model_page->get_data_car_gear();
				$data['result_capacity'] = $this->model_page->get_data_car_capacity();
				$data['result_device'] = $this->model_page->get_data_car_device();
				$data['result_province'] = $this->model_page->get_data_province();
				$data['result_price'] = $this->model_page->get_data_price();
				$data['result_mile'] = $this->model_page->get_data_mile();
		        $type = $this->input->get('type');
				$brand = $this->input->get('brand');
				$model = $this->input->get('model');
				$model_des = $this->input->get('model_des');
				$offset = $this->input->get('offset');
				$page = $this->input->get('page');

				if($this->lang->line("set_lang")=="th"){
					$lang = $this->lang->line("set_lang");
				}else{
					$lang = $this->lang->line("set_lang");
				}
				 
				$data['car_all'] = $this->model_page->search_all($offset,$lang,$page);
				$data['count_all'] = $this->model_page->get_data_car_count($offset);
		             
				$name_type = set_value('name_type');
				$name = set_value('name');
				$name_model = set_value('name_model');
				$name_model_des = set_value('name_model_des');
				$color = set_value('color');
				$gear = set_value('gear');
				$data['type'] = $this->model_page->get_data_type($name_type);
				$data['name'] = $this->model_page->get_data_name($name);
				$data['name_model'] = $this->model_page->get_data_name_model($name_model);
				$data['name_model_des'] = $this->model_page->get_data_name_model_des($name_model_des);
				$data['color'] = $this->model_page->get_data_color($color);
				$data['gear'] = $this->model_page->get_data_gear($gear);

				$this->load->view('page/header',$data);
				$this->load->view('page/buy',$data);
				$this->load->view('page/footer',$data);
			}
		
	}


	public function car_view($car_top_id)
	{

		$id_login1 = $this->session->userdata('member_id_log');
		$data['data_member'] = $this->model_page->get_data_check_pass($id_login1);
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

		if(empty($this->input->get('page'))){ ///ฝั่งขาย

			$car_top_id = $this->uri->segment(3);
			$id_login =  $this->model_page->get_data_car_view_check($car_top_id);

			$limit =  9;
			$offset =  $this->input->get('offset');
			$data['count_all'] =  $this->model_page->get_data_car_image_count($car_top_id);
			$data['car_image'] =  $this->model_page->get_data_car_image($car_top_id,$offset,$limit);

			$data['car_view'] =  $this->model_page->get_data_car_view1($car_top_id);
			$data['car_image1'] =  $this->model_page->get_data_car_image1($car_top_id);
			$data['car_file'] =  $this->model_page->get_data_car_file($car_top_id);
			$data['car_file2'] =  $this->model_page->get_data_car_file2($car_top_id);
			$data['car_view_check'] =  $this->model_page->get_data_car_view2($car_top_id);
			$data['car_top'] = $this->model_page->get_data_car_top_buy($car_top_id);
			$data['id_login'] =  $this->model_page->get_data_car_view_check($car_top_id);

			$data['check'] =  $this->model_page->get_data_c($car_top_id,$id_login1);
			// if(!empty($id_login1)){
			// 	$data['check'] =  $this->model_page->get_data_c($car_top_id,$id_login1);
			// }else{
			// 	$data['check'] =  "";
			// }
			$id_login1 = $this->session->userdata('member_id_log');
			$car_top_id = $this->uri->segment(3);
			$data['buy_car_id'] =  $this->model_page->check_buy($id_login1,$car_top_id);

	

			$this->load->view('page/header',$data);
			$this->load->view('page/car_view',$data,$id_login);
			$this->load->view('page/footer',$data);

		}else{ //ฝั่งซื้อ

			$car_buy_id = $this->uri->segment(3);
			$car_top_id = $this->input->get('car_top_id');
			$id_login =  $this->input->get('id_login');


			$limit =  9;
			$offset =  $this->input->get('offset');
			$data['count_all'] =  $this->model_page->get_data_car_image_count($car_top_id);
			$data['car_image'] =  $this->model_page->get_data_car_image($car_top_id,$offset,$limit);

			$data['car_view'] =  $this->model_page->get_data_car_view_buy1($car_buy_id);
			$data['car_image1'] =  $this->model_page->get_data_car_image1($car_top_id);	
			$data['car_file'] =  $this->model_page->get_data_car_file($car_top_id);
			$data['car_file2'] =  $this->model_page->get_data_car_file2($car_top_id);
			$data['car_view_check'] =  $this->model_page->get_data_car_view2($car_top_id);
			$data['car_view_buy'] =  $this->model_page->get_data_car_view_buy($car_buy_id);
			$data['car_top'] = $this->model_page->get_data_car_top_buy($car_top_id);
			$data['id_login'] =  $this->model_page->get_data_car_view_check($car_top_id);

			$this->load->view('page/header',$data);
			$this->load->view('page/car_view',$data,$id_login);
			$this->load->view('page/footer',$data);
		}




	
	}

	public function car_view_save($car_top_id){

		$this->model_page->car_view_save($car_top_id);

		if($this->lang->line("set_lang")=="th"){
			echo "<script>
			alert('แก้ไขข้อมูลสำเร็จ');
			window.location.href='".base_url('buy/car_view/'.$car_top_id.'')."';
			</script>";
		}else{
			echo "<script>
			alert('Edit data successfully');
			window.location.href='".base_url('buy/car_view/'.$car_top_id.'')."';
			</script>";
		}	

	}

	public function car_view_exam($car_top_id)
	{
		$id_login1 = $this->session->userdata('member_id_log');
		$data['data_member'] = $this->model_page->get_data_check_pass($id_login1);

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

		$data['car_view'] =  $this->model_page->get_data_car_view($car_top_id);
		$data['car_image1'] =  $this->model_page->get_data_car_image1($car_top_id);
		$data['car_image'] =  $this->model_page->get_data_car_image($car_top_id);
		$data['car_file'] =  $this->model_page->get_data_car_file($car_top_id);


		$this->load->view('page/header',$data);
		//$this->load->view('page/banner_about',$data);
		$this->load->view('page/car_view',$data);
		$this->load->view('page/footer',$data);

	
	}


	public function finance($car_top_id)
	{

		// echo $this->input->post('downpayment');

		$id_login1 = $this->session->userdata('member_id_log');
		$data['data_member'] = $this->model_page->get_data_check_pass($id_login1);

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

		$data['car_view'] =  $this->model_page->get_data_car_view($car_top_id);
		$data['car_image1'] =  $this->model_page->get_data_car_image1($car_top_id);
		$data['car_image'] =  $this->model_page->get_data_car_image($car_top_id);
		$data['car_file'] =  $this->model_page->get_data_car_file($car_top_id);

		$data['bank'] =  $this->model_page->get_data_car_bank($car_top_id);

		$data['id_login'] = $this->session->userdata('member_id_log');

		
		$data['data_bank'] = $this->model_page->get_data_bank();


		$name_price =  $this->model_page->get_data_car_view_($car_top_id);
		$downpayment = $this->input->post('downpayment');

		

		
		if($name_price>=$downpayment){
			$data['error_check'] = "";
			$data['error_min'] = "";
			$data['error_max'] = "";

			$str=$downpayment;  //คำต้นฉบับ
			$nostr="-";                 // คำที่ต้องการหา
			if(strstr($str,$nostr))
			{
			  $check = "True";                     // กรณีเจอ
			}else{
			  $check = "False";                  // กรณีไม่เจอ
			}

			$str1=$downpayment;  //คำต้นฉบับ
			$nostr1=".";                 // คำที่ต้องการหา
			if(strstr($str1,$nostr1))
			{
			  $check1 = "True";                     // กรณีเจอ
			}else{
			  $check1 = "False";                  // กรณีไม่เจอ
			}

			

				
				if($check=="True" OR $check1=="True"){

					if($check=="True"){

						if($this->lang->line("set_lang")=="th"){
							$data['error_min'] = "* กรุณากรอกเงินดาวน์ไม่น้อยกว่า 0";
						}else{
							$data['error_min'] = "* Please enter down payment not less than 0";
						}
					}elseif($check1=="True"){
						if($this->lang->line("set_lang")=="th"){
							$data['error_check'] = "* กรุณาจำนวนเงินดาวน์เป็นจำนวนเต็มเท่านั้น";
						}else{
							$data['error_check'] = "* Please, the amount of down payment is an integer only.";
						}

					}

				}else{

					if($this->input->post('submit_downpayment')){
						$this->model_page->save_downpayment($car_top_id,$downpayment);
						redirect(base_url('buy/finance/' . $this->uri->segment(3) . '?year='.$this->input->post('year').'#bank'));
					}
					
				}

		}else{

			$data['error_check'] = "";
			$data['error_min'] = "";

			if($this->lang->line("set_lang")=="th"){
				$data['error_max'] = "* กรุณากรอกเงินดาวน์ไม่เกินราคารถยนต์";
			}else{
				$data['error_max'] = "* Please enter the down payment, not more than the car price.";
			}

			
		}

		$this->load->view('page/header',$data);
		$this->load->view('page/finance',$data);
		$this->load->view('page/footer',$data);

	
	}


	public function finance_detail($car_top_id)
	{
		$id_login1 = $this->session->userdata('member_id_log');
		$data['data_member'] = $this->model_page->get_data_check_pass($id_login1);

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

		$data['car_view'] =  $this->model_page->get_data_car_view($car_top_id);
		$data['car_image1'] =  $this->model_page->get_data_car_image1($car_top_id);
		$data['car_image'] =  $this->model_page->get_data_car_image($car_top_id);
		$data['car_file'] =  $this->model_page->get_data_car_file($car_top_id);

		$bank = $this->input->get('bank');
		$data['data_bank_check'] = $this->model_page->get_data_bank_check($bank);
		$data['data_bank'] = $this->model_page->get_data_bank();
		$data['data_buy'] = $this->model_page->get_data_buy($car_top_id,$id_login1);


		$bank = $this->input->get('bank');
		$data['data_bank_image'] = $this->model_page->get_data_bank_image($bank);

		$data['car_top_id'] = $car_top_id;
		$data['id_login'] = $id_login1;
		$data['bank'] = $this->input->get('bank');

		$this->load->view('page/header',$data);
		$this->load->view('page/finance_detail',$data);
		$this->load->view('page/footer',$data);

	
	}


	public function send_finance_detail($car_top_id){
		$id_login1 = $this->session->userdata('member_id_log');
		$data['data_member'] = $this->model_page->get_data_check_pass($id_login1);

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

		$data['car_view'] =  $this->model_page->get_data_car_view($car_top_id);
		$data['car_image1'] =  $this->model_page->get_data_car_image1($car_top_id);
		$data['car_image'] =  $this->model_page->get_data_car_image($car_top_id);
		$data['car_file'] =  $this->model_page->get_data_car_file($car_top_id);


		$data['data_bank'] = $this->model_page->get_data_bank();
		$data['data_buy'] = $this->model_page->get_data_buy($car_top_id,$id_login1);

		$data['car_top_id'] = $car_top_id;
		$data['id_login'] = $id_login1;
		$data['bank'] = $this->input->get('bank');

		$bank = $this->input->get('bank');

		$this->model_page->finance_detail($car_top_id,$id_login1);
		$this->send_email_to_sale($car_top_id,$id_login1,$bank); //ส่งเมลแจ้งผู้ขาย
		$this->send_email_to_buy($car_top_id,$id_login1,$bank); //ส่งเมลแจ้งผู้ซื้อ
		$this->send_email_to_admin($car_top_id,$id_login1,$bank); //ส่งเมลแจ้งadmin
		$this->send_finance_detail_finish($car_top_id);

		$this->model_page->update_downpayment($car_top_id);



	}

	public function send_finance_detail_finish($car_top_id=""){

		$id_login1 = $this->session->userdata('member_id_log');
		$data['data_member'] = $this->model_page->get_data_check_pass($id_login1);

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
		$this->load->view('page/finance_finish',$data);
		$this->load->view('page/footer',$data);

	}

	public function send_email_to_sale($car_top_id,$id_login1,$bank){ //ส่งให้คนขาย

		$row = $this->model_page->get_data_buy($car_top_id,$id_login1); //ข้อมูลการซื้อ
		$row_car = $this->model_page->get_data_car_top_buy_email($car_top_id); //ข้อมูลรถ
		$row_member = $this->model_page->get_data_member($id_login1); //ข้อมูลผู้ซื้อ
		$row_member_car_top = $this->model_page->get_data_member_car_top($car_top_id); // ข้อมูลผู้ขาย
		$row_bank = $this->model_page->get_data_bank_check($bank); // ข้อมูลธนาคาร

		

		$this->load->library('email');
		$config['protocol'] = 'mail';

		 $config['charset'] = 'utf-8';
		 $config['wordwrap'] = FALSE;
		 $config['mailtype'] = "html";
		 $config['newline'] = '<br>';
	     $config['crlf'] = '<br>'; 
		 $this->email->initialize($config);
			
		$this->email->from('contact-postsicar@postsicar.com','บริษัท POSTSICAR (ไทยแลนด์) จำกัด');
			
		$this->email->to($row_member_car_top['email']);
		//$this->email->to("kalamangying@gmail.com");
		$this->email->subject('ระบบแจ้งเตือนการซื้อ บริษัท POSTSICAR (ไทยแลนด์) จำกัด');

		$data="";
		$data.="คุณ ".$row_member['name']."ได้ทำการส่งข้อมูลการซื้อ หมายเลขรถ  ".$row_car['no_car']."";
		$data.="<br>";
		$data.="เบอร์โทรศัพท์ผู้ซื้อ : ".$row_member['tel'];
		$data.="<br>";
		$data.="อีเมลผู้ซื้อ : ".$row_member['email'];
		$data.="<br>";
		$data.="- รายละเอียดรถที่เลือกซื้อ -";
		$data.="<br>";
		$data.="ประเภทรถ : ".$row_car['name_type']."";
		$data.="<br>";
		$data.="ยี่ห้อรถ : ".$row_car['name']."";
		$data.="<br>";
		$data.="รุ่นรถ : ".$row_car['name_model']."";
		$data.="<br>";
		$data.="รายละเอียดรุ่นรถ : ".$row_car['name_model_des']."";
		$data.="<br>";
		$data.="ราคารถ : ".$row_car['name_price']." บาท";
		$data.="<br>";
		$data.="สีรถ : ".$row_car['name_color']."";
		$data.="<br>";
		$data.="<br>";
		$data.="- รายละเอียดไฟแนนซ์ -";
		$data.="<br>";
		$data.="ธนาคารที่เลือก : ".$row_bank['bank_name_th']."";
		$data.="<br>";
		$data.="ดอกเบี้ย : ".$row['interest_rate'].'%';
		$data.="<br>";
		$data.="อัตราดอกเบี้ยต่อปี : ".$row['interest_rate_result'].' บาท';
		$data.="<br>";
		$data.="จำนวนเงินดาวน์	: ".$row['downpayment'].' บาท';
		$data.="<br>";
		$data.="ระยะเวลาผ่อน	 : ".$row['installment_period'].' งวด';
		$data.="<br>";
		$data.="จำนวนเงินผ่อน/เดือน : ".$row['installment_amount'].' บาท';
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

	public function send_email_to_buy($car_top_id,$id_login1,$bank){  //ส่งให้คนซื้อ

		$row = $this->model_page->get_data_buy($car_top_id,$id_login1); //ข้อมูลการซื้อ
		$row_car = $this->model_page->get_data_car_top_buy_email($car_top_id); //ข้อมูลรถ
		$row_member = $this->model_page->get_data_member($id_login1); //ข้อมูลผู้ซื้อ
		$row_member_car_top = $this->model_page->get_data_member_car_top($car_top_id); // ข้อมูลผู้ขาย
		$row_bank = $this->model_page->get_data_bank_check($bank); // ข้อมูลธนาคาร
		

		$this->load->library('email');
		$config['protocol'] = 'mail';

		 $config['charset'] = 'utf-8';
		 $config['wordwrap'] = FALSE;
		 $config['mailtype'] = "html";
		 $config['newline'] = '<br>';
	     $config['crlf'] = '<br>'; 
		 $this->email->initialize($config);
			
		$this->email->from('contact-postsicar@postsicar.com','บริษัท POSTSICAR (ไทยแลนด์) จำกัด');
		
		//$this->email->to("kalamangying@gmail.com");
		$this->email->to($row_member['email']);
		$this->email->subject('ระบบแจ้งเตือนการซื้อ บริษัท POSTSICAR (ไทยแลนด์) จำกัด');

		$data="";
		$data.="เรียน คุณ ".$row_member['name']."ได้ทำการส่งข้อมูลการซื้อ หมายเลขรถ ".$row_car['no_car']." ไปยังผู้ขายเรียบร้อยแล้ว";
		$data.="<br>";
		$data.="- รายละเอียดรถที่คุณเลือกซื้อ -";
		$data.="<br>";
		$data.="ประเภทรถ : ".$row_car['name_type']."";
		$data.="<br>";
		$data.="ยี่ห้อรถ : ".$row_car['name']."";
		$data.="<br>";
		$data.="รุ่นรถ : ".$row_car['name_model']."";
		$data.="<br>";
		$data.="รายละเอียดรุ่นรถ : ".$row_car['name_model_des']."";
		$data.="<br>";
		$data.="ราคารถ : ".$row_car['name_price']." บาท";
		$data.="<br>";
		$data.="สีรถ : ".$row_car['name_color']."";
		$data.="<br>";
		$data.="<br>";
		$data.="- รายละเอียดไฟแนนซ์ -";
		$data.="<br>";
		$data.="ธนาคารที่เลือก : ".$row_bank['bank_name_th']."";
		$data.="<br>";
		$data.="ดอกเบี้ย : ".$row['interest_rate'].'%';
		$data.="<br>";
		$data.="อัตราดอกเบี้ยต่อปี : ".$row['interest_rate_result'].' บาท';
		$data.="<br>";
		$data.="จำนวนเงินดาวน์	: ".$row['downpayment'].' บาท';
		$data.="<br>";
		$data.="ระยะเวลาผ่อน	 : ".$row['installment_period'].' งวด';
		$data.="<br>";
		$data.="จำนวนเงินผ่อน/เดือน : ".$row['installment_amount'].' บาท';
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

	public function send_email_to_admin($car_top_id,$id_login1,$bank){  //ส่งให้admin

		$row = $this->model_page->get_data_buy($car_top_id,$id_login1); //ข้อมูลการซื้อ
		$row_car = $this->model_page->get_data_car_top_buy_email($car_top_id); //ข้อมูลรถ
		$row_member = $this->model_page->get_data_member($id_login1); //ข้อมูลผู้ซื้อ
		$row_member_car_top = $this->model_page->get_data_member_car_top($car_top_id); // ข้อมูลผู้ขาย
		$row_bank = $this->model_page->get_data_bank_check($bank); // ข้อมูลธนาคาร
		$email = $this->model_page->get_data_car_view_email(); // เมลadmin
		

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
		$this->email->subject('ระบบแจ้งเตือนการซื้อขาย บริษัท POSTSICAR (ไทยแลนด์) จำกัด');

		$data="";
		$data.="ขณะนี้ คุณ ".$row_member['name']."ได้ทำการส่งข้อมูลการซื้อ หมายเลขรถ ".$row_car['no_car']." มายังระบบ";
		$data.="<br>";
		$data.="จึงเรียนมาเพื่อทราบ";
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

