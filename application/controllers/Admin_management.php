<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set("Asia/Bangkok");


class Admin_management extends CI_Controller {
	
	public function __construct() {
		parent::__construct ();
		$this->load->model( 'model_admin' );
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
		$this->load->helper('security');
		$this->load->library( 'session' );

		// if($this->session->userdata('admin_log_ikko')!= TRUE)
		// {
		// 	echo "<script>alert('หมดเวลา! กรุณาเข้าสู่ระบบใหม่อีกครั้ง');</script>";
		// 	redirect(base_url('admin'), "refresh");
		// }

	}

/*-----------------------main---------------------------*/
	

	public function main(){

		$data['count_member'] = $this->model_admin->get_data_car_count();
		$data['check_count_comment'] = $this->model_admin->get_data_car_count_buy();
		$data['check_count_comment_contact'] = $this->model_admin->get_data_car_count_contact();

		$this->load->view('admin/header');
		$this->load->view('admin/main',$data);
		$this->load->view('admin/footer');
	}

	public function setting(){
		$this->load->view('admin/header');
		$this->load->view('admin/setting');
		$this->load->view('admin/footer');
	}

/*-----------------------main---------------------------*/

	public function logo_list()
	{
		$data['result'] = $this->model_admin->get_data_logo();
		$this->load->view('admin/header');
		$this->load->view('admin/logo_list',$data);
		$this->load->view('admin/footer');
	}

/*----------------------------/ banner /-----------------------------------------------*/	

	public function banner_list()
	{
		$data['rows'] = $this->model_admin->get_data_banner();
		$this->load->view('admin/header');
		$this->load->view('admin/banner_list',$data);
		$this->load->view('admin/footer');
	}

	public function banner_add()
	{
	    $this->form_validation->set_rules('title_th', 'ชื่อแบนเนอร์ (ภาษาไทย)', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('title_en', 'ชื่อแบนเนอร์ (ภาษาอังกฤษ)', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('description_th', 'รายละเอียด (ภาษาไทย)', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('description_en', 'รายละเอียด (ภาษาอังกฤษ)', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('position_id', 'ตำแหน่ง', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('status_id', 'สถานะการใช้งาน', 'trim|required|xss_clean' );

		if($this->form_validation->run()==FALSE){

			$data['status'] = $this->model_admin->get_tbl_status();

			$this->load->view('admin/header');
			$this->load->view('admin/banner_add',$data);
			$this->load->view('admin/footer');

		}else{

			$this->model_admin->banner_add();
			 echo "<script>
				alert('เพิ่มข้อมูลเรียบร้อยแล้ว');
				window.location.href='".base_url('admin_management/banner_list/')."';
				</script>";

		}	
	}

	public function banner_edit($id="")
	{

		$this->form_validation->set_rules('title_th', 'ชื่อแบนเนอร์ (ภาษาไทย)', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('title_en', 'ชื่อแบนเนอร์ (ภาษาอังกฤษ)', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('description_th', 'รายละเอียด (ภาษาไทย)', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('description_en', 'รายละเอียด (ภาษาอังกฤษ)', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('position_id', 'ตำแหน่ง', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('status_id', 'สถานะการใช้งาน', 'trim|required|xss_clean' );

		if($this->form_validation->run()==FALSE){

			$data['data'] = $this->model_admin->get_data_edit_banner($id);

			$this->load->view('admin/header');
			$this->load->view('admin/banner_edit',$data);
			$this->load->view('admin/footer');
	
		}else{

			$this->model_admin->banner_edit($id);
			
			echo "<script>
				alert('แก้ไขข้อมูลสำเร็จ');
				window.location.href='".base_url('admin_management/banner_list')."';
			</script>";
		}
	}

	public function banner_delete($id="")
	{
			$this->model_admin->banner_delete($id);
			echo "<script>
				window.location.href='".base_url('admin_management/banner_list')."';
			</script>";
	}




	
   
	


	function thumb($data){
		$config['image_library'] = 'gd2';
		$config['source_image'] =$data['full_path'];
		$config['create_thumb'] = TRUE;
		$config['maintain_ratio'] = TRUE;
		$config['width'] = 275;
		$config['height'] = 250;
		$this->load->library('image_lib', $config);
		$this->image_lib->resize();
	}



/////////////////////////////////banner - multi upload/////////////////////////////////

	public function banner_multi($id="1",$no="",$edit="",$error=""){
		
		if($id && $no){

				$check = $this->model_admin->banner_check_id($id=1);
				if($check==TRUE){

					$data['banner_id']=$id; 
					$data['error']=""; 
					if($error) $data['error']=$error;
								$data['id_image'] = $id;
								$this->load->model('model_admin');
								$car_top_id = $this->uri->segment(4);
								 $data['query'] = $this->model_admin->banner_multi($car_top_id);
								 $data['tn'] ="";
								 $data['id_image_multi'] = "";
								 $data['id_data_multi'] = "";

							if($edit != "") {


									$dt = $this->model_admin->banner_edit_image_multi($edit);
									$data['tn'] = $dt->thumb_name_multi;
									$data['id_image_multi'] = $edit;
									$data['id_data_multi'] = $no;
								       
								       
								}

								$data['result'] = $this->model_admin->banner_view($id);



						        $data['num'] = $no;
						        $this->load->view('admin/header');
								$this->load->view('admin/banner_multi',$data);
								$this->load->view('admin/footer');
				}else{
					redirect('admin_management/banner_multi/'.$data['banner_id'].'/'.$no);
				}

		
		}else{
			redirect('admin','refresh');
		}
	}

	function banner_upload_image_multi($id="",$errer=""){
		if($id && $this->input->post('num')){

			if($this->input->post('id_image_multi')){

				$config['upload_path'] = './uploads/';
				$config['file_name']  = 'BANNER_'.$this->input->post('id_image_multi').'_'.date('Ymd_His').'.jpg';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				
				$this->load->library("upload");
				$this->upload->initialize($config);
				$this->load->library('upload', $config);

					if ( ! $this->upload->do_upload()){
						$error =  $this->upload->display_errors();
						$this->banner_multi($id,$this->input->post('num'),$this->input->post('id_image_multi'),$error);
						}else{
							$data=$this->upload->data();

							$config['image_library'] = 'gd2';
							$config['source_image'] =$data['full_path'];
							$config['maintain_ratio'] = TRUE;
							
							//$config['width'] = 1920;

							$this->load->library('image_lib', $config); 

							$this->image_lib->resize();

							$temp = $this->model_admin->banner_update_image_multi($data);

							$data = array('upload_data' => $this->upload->data());

					redirect('admin_management/banner_multi/'.$id.'/'.$this->input->post('num'));
				}

			}else{
					$name_array = array();
					$count = count($_FILES['userfile']['size']);
					foreach($_FILES as $key=>$value)
					for($s=0; $s<=$count-1; $s++) {
						$config['upload_path'] = './uploads/';
						$config['file_name']  = 'BANNER_'.$id.'_'.date('Ymd_His').'.jpg';
						$config['allowed_types'] = 'gif|jpg|png|jpeg';
				
						$this->load->library("upload");
						$this->upload->initialize($config);
						$this->load->library('upload', $config);
						$data = $this->upload->data();

							$config['image_library'] = 'gd2';
							$config['source_image'] =$data['full_path'];
							$config['maintain_ratio'] = TRUE;
							//$config['width'] = 1920;
						
							
							$this->load->library('image_lib', $config);
							$this->image_lib->resize();

						$name_array[] = $data['file_name'];
					}
						$names= implode(',', $name_array);
						$filename = $names;
						if ( ! $this->upload->do_upload()){
							$error =  $this->upload->display_errors();
							$this->banner_multi($id,$this->input->post('num'),'',$error);
						}else{

							$query_queue_sort = $this->db->query ( "SELECT MAX(sort_no) as max_id FROM banner_uploads_multi WHERE banner_id=".$id."" );
      						 $queue_sort = $query_queue_sort->row ();
							$data = array(
							'banner_id' => $id,
							'thumb_name_multi'=>$filename,
							'upload_date'=>date("Y-m-d H:i:s"),
							'gallery_id'=>$this->uri->segment(4),
							'sort_no'=>$queue_sort->max_id+1
							);
							$this->db->insert('banner_uploads_multi', $data);



							redirect('admin_management/banner_multi/'.$id.'/'.$this->input->post('num'));
						}
				}
			}else{

				redirect('admin','refresh');
			}
	}



	function banner_delete_image_multi($id="",$no="",$edit="") {
		if($id && $no && $edit){

			$this->model_admin->banner_delete_image_multi($edit);
			redirect('admin_management/banner_multi/'.$id.'/'.$no);
		}else{
			redirect('admin','refresh');
		}
	}




	 function banner_edit_image_multi($id="",$error=""){
	 	$id = $this->uri->segment(4);
		$for_id = $this->uri->segment(3);

		if ($id == NULL) {
			redirect('admin_management');
		}
		$data['error']=""; 
		$dt = $this->model_admin->banner_edit_image_multi($id);
		$data['tn'] = $dt->thumb_name_multi;
		$data['id_image_multi'] = $id;
		$data['id_data_multi'] = $for_id;

		$this->load->view('admin/header');
		$this->load->view('admin/banner_edit_image_multi',$data);
		$this->load->view('admin/footer');
	}

	function banner_edit_check($id=""){
		if($id){
			$this->model_admin->banner_edit_check($id);
			echo "<script>
			alert('แก้ไขข้อมูลเรียบร้อยแล้ว');
			window.location.href='".base_url('admin_management/banner_multi/1/1')."';
			</script>";
		}else{
			redirect('admin','refresh');
		}
	}

/*----------------------------/ news /-----------------------------------------------*/

	public function adv_list(){	

		$data['data'] = $this->model_admin->get_data_adv();
		$this->load->view('admin/header');
		$this->load->view('admin/adv_list',$data);
		$this->load->view('admin/footer');
	}

	public function adv_delete(){	

		$adv_id = $this->input->get('adv_id');
			$this->model_admin->adv_delete($adv_id);
			echo "<script>
					window.location.href='".base_url('admin_management/adv_list')."';
				</script>";
	}

	
	public function adv_edit(){	

		$adv_id = $this->input->get('adv_id');
		$this->form_validation->set_rules('status_id', 'สถานะ', 'trim|required|xss_clean' );
		$this->form_validation->set_rules('position_id', 'ตำแหน่ง', 'trim|required|xss_clean' );

			if($this->form_validation->run()==FALSE){

				if($this->input->post('submit')){
				  $config['upload_path'] = './uploads/';
				  $config['file_name']  = 'adv'.'_'.date('Ymd_His');
				  $config['allowed_types'] = 'gif|jpg|png';
			


				  $this->load->library('upload', $config);

				  if ( ! $this->upload->do_upload()){
				   $error = array('error' => $this->upload->display_errors());
				   $data['data'] = $this->model_admin->get_data_adv_view($adv_id);
					$this->load->view('admin/header',$data);
					$this->load->view('admin/adv_edit',$error);
					$this->load->view('admin/footer');
				  }else{
				     $this->model_admin->adv_edit($adv_id);
				      echo "<script>
							alert('บันทึกข้อมูลสำเร็จ');
							window.location.href='".base_url('admin_management/adv_list/')."';
							</script>";
				   }
		  	}else{
		  		$error = array('error' => "");
		  		$data['data'] = $this->model_admin->get_data_adv_view($adv_id);
		  		$this->load->view('admin/header',$data);
				$this->load->view('admin/adv_edit',$error);
				$this->load->view('admin/footer');
		  	}

		}else{

		  $config['upload_path'] = './uploads/';
		  $config['file_name']  = 'adv'.'_'.date('Ymd_His');
		  $config['allowed_types'] = 'gif|jpg|png';
	

		  $this->load->library('upload', $config);

			if ($this->upload->do_upload()==1){
				if(! $this->upload->do_upload()){
					$error = array('error' => $this->upload->display_errors());
				    $data['data'] = $this->model_admin->get_data_adv_view($adv_id);
					$this->load->view('admin/header',$data);
					$this->load->view('admin/adv_edit',$error);
					$this->load->view('admin/footer');
				}else{
					 $this->model_admin->adv_edit_img($adv_id);
		      		echo "<script>
					alert('บันทึกข้อมูลสำเร็จ');
					window.location.href='".base_url('admin_management/adv_list/')."';
					</script>";
				}
		  
		  	}else{
		     $this->model_admin->adv_edit($adv_id);
		      echo "<script>
					alert('บันทึกข้อมูลสำเร็จ');
					window.location.href='".base_url('admin_management/adv_list/')."';
					</script>";
		   	}
		}

	}
	public function adv_add(){	

		$this->form_validation->set_rules('status_id', 'สถานะ', 'trim|required|xss_clean' );
		$this->form_validation->set_rules('position_id', 'ตำแหน่ง', 'trim|required|xss_clean' );

        if($this->form_validation->run()==FALSE){

        	if($this->input->post('submit')){
	            $config['upload_path'] = './uploads/';
	            $config['file_name']  = 'adv'.'_'.date('Ymd_His');
	            $config['allowed_types'] = 'gif|jpg|png';
	            $config['max_size'] = '0'; 
	            // $config['max_width'] = '350';
	            $config['max_height']  = '0'; 

	            $this->load->library('upload', $config);

	            $this->upload->initialize($config);

	            $input_name = "userfile";

	            if ( ! $this->upload->do_upload($input_name)){
	                $error = array('error' => $this->upload->display_errors());
	                $this->load->view('admin/header');
					$this->load->view('admin/adv_add',$error);
					$this->load->view('admin/footer');
	            }else{
	                $error = array('error' => $this->upload->display_errors());
	                $this->load->view('admin/header');
					$this->load->view('admin/adv_add',$error);
					$this->load->view('admin/footer');
	            }
        	}else{
        		 $error = array('error' => "");
        		$this->load->view('admin/header');
				$this->load->view('admin/adv_add',$error);
				$this->load->view('admin/footer');
        	}


        }else{


        	$config['upload_path'] = './uploads/';
            $config['file_name']  = 'adv'.'_'.date('Ymd_His');
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '0'; 
            //$config['max_width'] = '1000';
            $config['max_height']  = '0'; 

            $this->load->library('upload', $config);

            $this->upload->initialize($config);

            $input_name = "userfile";

            if ( ! $this->upload->do_upload($input_name)){

                $error = array('error' => $this->upload->display_errors());
                $this->load->view('admin/header');
				$this->load->view('admin/adv_add',$error);
				$this->load->view('admin/footer');

            }else{

                $this->model_admin->adv_add();

                 echo "<script>
					alert('บันทึกข้อมูลสำเร็จ');
					window.location.href='".base_url('admin_management/adv_list/')."';
					</script>";
            } 
          

               
        }
	}

	

/*----------------------------/ news /-----------------------------------------------*/	

	public function save_page_show($news_id="") {

		$this->model_admin->save_page_show($news_id);
		echo "<script>
			alert('เพิ่มข้อมูลเรียบร้อยแล้ว');
			window.location.href='".base_url('admin_management/news_list/')."';
			</script>";
	}

	public function news_list()
	{
		$data['rows'] = $this->model_admin->get_data_news();
		$this->load->view('admin/header');
		$this->load->view('admin/news_list',$data);
		$this->load->view('admin/footer');
	}

	public function news_add()
	{

	    $this->form_validation->set_rules('title_th', 'หัวข้อข่าวสาร (ภาษาไทย)', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('title_en', 'หัวข้อข่าวสาร (ภาษาอังกฤษ)', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('description_th', 'รายละเอียด (ภาษาไทย)', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('description_en', 'รายละเอียด (ภาษาอังกฤษ)', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('position_id', 'ตำแหน่งการแสดงผล', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('status_id', 'สถานะการใช้งาน', 'trim|required|xss_clean' );

	    
	    if($this->form_validation->run()==FALSE){

        	if($this->input->post('submit')){
	            $config['upload_path'] = './uploads/';
	            $config['file_name']  = 'news'.'_'.date('Ymd_His');
	            $config['allowed_types'] = 'gif|jpg|png';
	            $config['max_size'] = '0'; 
	            // $config['max_width'] = '350';
	            $config['max_height']  = '0'; 

	            $this->load->library('upload', $config);

	            $this->upload->initialize($config);

	            $input_name = "userfile";

	            if ( ! $this->upload->do_upload($input_name)){
	                $error = array('error' => $this->upload->display_errors());
	                $data['status'] = $this->model_admin->get_tbl_status();
	                $this->load->view('admin/header',$error);
					$this->load->view('admin/news_add',$data);
					$this->load->view('admin/footer');
	            }else{
	                $error = array('error' => $this->upload->display_errors());
	                $data['status'] = $this->model_admin->get_tbl_status();
	                $this->load->view('admin/header',$error);
					$this->load->view('admin/news_add',$data);
					$this->load->view('admin/footer');
	            }
        	}else{
        		 $error = array('error' => "");
        		 $data['status'] = $this->model_admin->get_tbl_status();
        		$this->load->view('admin/header',$error);
				$this->load->view('admin/news_add',$data);
				$this->load->view('admin/footer');
        	}


        }else{


        	$config['upload_path'] = './uploads/';
            $config['file_name']  = 'news'.'_'.date('Ymd_His');
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '0'; 
            //$config['max_width'] = '1000';
            $config['max_height']  = '0'; 

            $this->load->library('upload', $config);

            $this->upload->initialize($config);

            $input_name = "userfile";

            if ( ! $this->upload->do_upload($input_name)){

                $error = array('error' => $this->upload->display_errors());
                $data['status'] = $this->model_admin->get_tbl_status();
                $this->load->view('admin/header',$error);
				$this->load->view('admin/news_add',$data);
				$this->load->view('admin/footer');

            }else{

                $this->model_admin->news_add();
			 	echo "<script>
				alert('เพิ่มข้อมูลเรียบร้อยแล้ว');
				window.location.href='".base_url('admin_management/news_list/')."';
				</script>";
            } 
          

               
        }

		// if($this->form_validation->run()==FALSE){

		// 	$data['status'] = $this->model_admin->get_tbl_status();

		// 	$this->load->view('admin/header');
		// 	$this->load->view('admin/news_add',$data);
		// 	$this->load->view('admin/footer');

		// }else{

		// 	$this->model_admin->news_add();
		// 	 echo "<script>
		// 		alert('เพิ่มข้อมูลเรียบร้อยแล้ว');
		// 		window.location.href='".base_url('admin_management/news_list/')."';
		// 		</script>";

		// }	
	}

	public function news_edit($id="")
	{

		$this->form_validation->set_rules('title_th', 'หัวข้อข่าวสาร (ภาษาไทย)', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('title_en', 'หัวข้อข่าวสาร (ภาษาอังกฤษ)', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('description_th', 'รายละเอียด (ภาษาไทย)', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('description_en', 'รายละเอียด (ภาษาอังกฤษ)', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('position_id', 'ตำแหน่งการแสดงผล', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('status_id', 'สถานะการใช้งาน', 'trim|required|xss_clean' );

	    if($this->form_validation->run()==FALSE){

				if($this->input->post('submit')){
				  $config['upload_path'] = './uploads/';
				  $config['file_name']  = 'news'.'_'.date('Ymd_His');
				  $config['allowed_types'] = 'gif|jpg|png';
			


				  $this->load->library('upload', $config);

				  if ( ! $this->upload->do_upload()){
				   $error = array('error' => $this->upload->display_errors());
				   	$data['data'] = $this->model_admin->get_data_edit_news($id);
					$this->load->view('admin/header',$data);
					$this->load->view('admin/news_edit',$error);
					$this->load->view('admin/footer');
				  }else{
				     $this->model_admin->news_edit($id);
				      echo "<script>
							alert('บันทึกข้อมูลสำเร็จ');
							window.location.href='".base_url('admin_management/news_list/')."';
							</script>";
				   }
		  	}else{
		  		$error = array('error' => "");
		  		$data['data'] = $this->model_admin->get_data_edit_news($id);
		  		$this->load->view('admin/header',$data);
				$this->load->view('admin/news_edit',$error);
				$this->load->view('admin/footer');
		  	}

		}else{

		  $config['upload_path'] = './uploads/';
		  $config['file_name']  = 'news'.'_'.date('Ymd_His');
		  $config['allowed_types'] = 'gif|jpg|png';
	

		  $this->load->library('upload', $config);

			if ($this->upload->do_upload()==1){
				if(! $this->upload->do_upload()){
					$error = array('error' => $this->upload->display_errors());
				   	$data['data'] = $this->model_admin->get_data_edit_news($id);
					$this->load->view('admin/header',$data);
					$this->load->view('admin/news_edit',$error);
					$this->load->view('admin/footer');
				}else{
					 $this->model_admin->news_edit_img($id);
		      		echo "<script>
					alert('บันทึกข้อมูลสำเร็จ');
					window.location.href='".base_url('admin_management/news_list/')."';
					</script>";
				}
		  
		  	}else{
		     $this->model_admin->news_edit($id);
		      echo "<script>
					alert('บันทึกข้อมูลสำเร็จ');
					window.location.href='".base_url('admin_management/news_list/')."';
					</script>";
		   	}
		}

		// if($this->form_validation->run()==FALSE){

		// 	$data['data'] = $this->model_admin->get_data_edit_news($id);

		// 	$this->load->view('admin/header');
		// 	$this->load->view('admin/news_edit',$data);
		// 	$this->load->view('admin/footer');
	
		// }else{

		// 	$this->model_admin->news_edit($id);
			
		// 	echo "<script>
		// 		alert('แก้ไขข้อมูลสำเร็จ');
		// 		window.location.href='".base_url('admin_management/news_list')."';
		// 	</script>";
		// }
	}

	public function news_delete($id="")
	{
			$this->model_admin->news_delete($id);
			echo "<script>
				window.location.href='".base_url('admin_management/news_list')."';
			</script>";
	}




	/////////////////////////////////news -  upload/////////////////////////////////

    function news_edit_image($id="",$no="",$error=""){
    	$id = $this->uri->segment(3);
    
		if($id && $no){
			$check = $this->model_admin->news_check_id($id);
			if($check==TRUE){
				$data['id_data']=$id; 
				$data['error']=""; 
				if($error) $data['error']=$error;	
						$check_img = $this->model_admin->news_check_img($id);
						if($check_img==TRUE){
							$dt = $this->model_admin->news_show_image($id);
							$data['tn'] = $dt->img_name;
							$data['ex'] = $dt->ext;
							$data['id_image'] = $dt->id_image;
						}else{
							$data['tn'] = "";
							$data['ex'] = "";
							$data['id_image'] = "";
						}
						

						$data['result'] = $this->model_admin->news_view($id);

						$data['num']=$no;
						$this->load->view('admin/header');
						$this->load->view('admin/news_edit_image', $data);
						$this->load->view('admin/footer');
			}else{

				
				redirect('admin_management/news_edit_image/'.$data['id_data'].'/'.$no);
			}
		}else{
			redirect('admin_management/news_list','refresh');
		}
	}

	function news_do_upload($id){
		$id = $this->uri->segment(3);

		if($this->input->post('upload') && $this->input->post('num')){

			$file_name[1]="";
			$file_name[2]="";
			$file_name[3]="";
			$file_name[4]="";
			$file_name[5]="";
			$file_name[6]="";

			$config['upload_path'] = './uploads/';
			$config['file_name']  = 'news_'.$id.'_'.date('Ymd_His').'.jpg';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library("upload");
			$this->upload->initialize($config);
			$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload())
				{
					$error =  $this->upload->display_errors();
					$this->news_edit_image($id,$this->input->post('num'), $error);
				}
				else
				{
					$data=$this->upload->data();
					$config['image_library'] = 'gd2';
					$config['source_image'] =$data['full_path'];
					$config['maintain_ratio'] = TRUE;
							
					$config['width'] = 350;

					$this->load->library('image_lib', $config); 

					$this->image_lib->resize();
					//$this->thumb($data);

					$temp = $this->model_admin->news_edit_image($data);

					echo $temp;
					$data = array('upload_data' => $this->upload->data());
					redirect('admin_management/news_list','refresh');

					// redirect('admin_management/news_edit_image/'.$id.'/'.$this->input->post('num'),'refresh');
				}
		}else{
				redirect('admin_management/news_list','refresh');
			 }
		}
	


	function news_delete_image($id="",$num="") {
		
		if($id && $num){
			$this->model_admin->news_delete_image($id);
			redirect('admin_management/news_list','refresh');
			// redirect('admin_management/news_edit_image/'.$id.'/'.$num,'refresh');
		}else{
			redirect('admin_management/news_list','refresh');
		}
	}


/*----------------------------/ about /-----------------------------------------------*/

	
	public function about_edit($id="1")
	{

		

		    $this->form_validation->set_rules('descript_th', 'คำอธิบาย (ภาษาไทย)', 'trim|required|xss_clean' );
		    $this->form_validation->set_rules('descript_en', 'คำอธิบาย (ภาษาอังกฤษ)', 'trim|required|xss_clean' );
		    $this->form_validation->set_rules('descript_th_about', 'คำอธิบาย/รูปภาพ (ภาษาไทย)', 'trim|required|xss_clean' );
		    $this->form_validation->set_rules('descript_en_about', 'คำอธิบาย/รูปภาพ (ภาษาอังกฤษ)', 'trim|required|xss_clean' );

			if($this->form_validation->run()==FALSE){

				$data['data'] = $this->model_admin->get_data_edit_about($id);

				$this->load->view('admin/header');
				$this->load->view('admin/about_edit',$data);
				$this->load->view('admin/footer');
		
			}else{

				
 
			    $config['upload_path'] = './uploads/';
			    $config['allowed_types'] = 'gif|jpg|jpeg|png';
			    $config['overwrite'] = FALSE;
			    $this->load->library('upload');
			 
			 
			    $funcNum = $this->input->get('CKEditorFuncNum'); //$_GET['CKEditorFuncNum']
			    $this->upload->initialize($config);
			         
			    if (!$this->upload->do_upload('upload')){ // upload the file, 'upload' is the name of the field from CKEditor
			         // failed upload
			        $message = "Upload failed on blog manager server.";
			        $url = '';
			     
			    }else{ // success copy to wp server
			        $upload_result = base_url() . 'uploads/'. $this->upload->data()['file_name'];
			        $upload_name = $this->upload->data()['file_name'];
			 
			        // after finished uploading, it will receive a URL
			        $url = $this->BlogModel->UploadImage($blogID, $upload_result, $upload_name); 
			 
			        $message = 'Upload success!';
			    }
			    echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($funcNum, '$url', '$message');</script>";



				$this->model_admin->about_edit($id);
				
				echo "<script>
					alert('แก้ไขข้อมูลสำเร็จ');
					window.location.href='".base_url('admin_management/about_edit/'.$id)."';
				</script>";
			}

		



	}

/*----------------------------/ service /-----------------------------------------------*/

	
	public function service_edit($id="1")
	{
		    $this->form_validation->set_rules('descript_th', 'คำอธิบาย (ภาษาไทย)', 'trim|required|xss_clean' );
		    $this->form_validation->set_rules('descript_en', 'คำอธิบาย (ภาษาอังกฤษ)', 'trim|required|xss_clean' );
			if($this->form_validation->run()==FALSE){

				$data['data'] = $this->model_admin->get_data_edit_service($id);

				$this->load->view('admin/header');
				$this->load->view('admin/service_edit',$data);
				$this->load->view('admin/footer');
		
			}else{

				$this->model_admin->service_edit($id);
				
				echo "<script>
					alert('แก้ไขข้อมูลสำเร็จ');
					window.location.href='".base_url('admin_management/service_edit/'.$id)."';
				</script>";
			}

		



	}



/*----------------------------/ howto /-----------------------------------------------*/

	
	public function howto_edit($id="1")
	{

		
		    $this->form_validation->set_rules('descript_th_howto', 'คำอธิบาย/รูปภาพ (ภาษาไทย)', 'trim|required|xss_clean' );
		    $this->form_validation->set_rules('descript_en_howto', 'คำอธิบาย/รูปภาพ (ภาษาอังกฤษ)', 'trim|required|xss_clean' );

			if($this->form_validation->run()==FALSE){

				$data['data'] = $this->model_admin->get_data_edit_howto($id);

				$this->load->view('admin/header');
				$this->load->view('admin/howto_edit',$data);
				$this->load->view('admin/footer');
		
			}else{

				$this->model_admin->howto_edit($id);
				
				echo "<script>
					alert('แก้ไขข้อมูลสำเร็จ');
					window.location.href='".base_url('admin_management/howto_edit/'.$id)."';
				</script>";
			}

		



	}



/*----------------------------/ setting /-----------------------------------------------*/

	
	public function setting_edit($id="1")
	{

		$this->form_validation->set_rules('setting_top_th', 'หัวข้อเว็บไซต์(ไทย)', 'trim|required|xss_clean' );
		$this->form_validation->set_rules('setting_top_en', 'หัวข้อเว็บไซต์(อังกฤษ)', 'trim|required|xss_clean' );
		$this->form_validation->set_rules('setting_des_th', 'คำอธิบายเว็บไซต์(ไทย)', 'trim|required|xss_clean' );
		$this->form_validation->set_rules('setting_des_en', 'คำอธิบายเว็บไซต์(อังกฤษ)', 'trim|required|xss_clean' );
		// $this->form_validation->set_rules('email', 'email', 'trim|required|xss_clean' );
		$this->form_validation->set_rules('seo_keyword_th', 'seo keyword (ไทย)', 'trim|required|xss_clean' );
		$this->form_validation->set_rules('seo_keyword_en', 'seo keyword (อังกฤษ)', 'trim|required|xss_clean' );
		$this->form_validation->set_rules('seo_descript_th', 'seo คำอธิบาย(ไทย)', 'trim|required|xss_clean' );
		$this->form_validation->set_rules('seo_descript_en', 'seo คำอธิบาย(อังกฤษ)', 'trim|required|xss_clean' );
	   
		if($this->form_validation->run()==FALSE){

			$data['data'] = $this->model_admin->get_data_edit_setting($id);

			$this->load->view('admin/header');
			$this->load->view('admin/setting_edit',$data);
			$this->load->view('admin/footer');
	
		}else{

			$this->model_admin->setting_edit($id);
			
			echo "<script>
				alert('แก้ไขข้อมูลสำเร็จ');
				window.location.href='".base_url('admin_management/setting_edit/'.$id)."';
			</script>";
		}
	}

/*----------------------------/ admin /-----------------------------------------------*/

	public function admin_list()
	{
		

		$data['result'] = $this->model_admin->get_data_admin();
		$this->load->view('admin/header');
		$this->load->view('admin/admin_list',$data);
		$this->load->view('admin/footer');
	}


	public function admin_add()
	{

	    $this->form_validation->set_rules('user', 'ชื่อผู้ใช้', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('password', 'รหัสผ่าน', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('email', 'อีเมล', 'trim|required|xss_clean|unique_com[tbl_login_admin.email]' );
	    $this->form_validation->set_rules('tel', 'เบอร์โทรศัพท์', 'trim|required|xss_clean' );

		if($this->form_validation->run()==FALSE){

			$this->load->view('admin/header');
			$this->load->view('admin/admin_add');
			$this->load->view('admin/footer');

		}else{

			$this->model_admin->admin_add();
			 echo "<script>
				alert('เพิ่มข้อมูลเรียบร้อยแล้ว');
				window.location.href='".base_url('admin_management/admin_list/')."';
				</script>";

		}	
	}

	public function admin_edit($id="")
	{

		$this->form_validation->set_rules('user', 'ชื่อผู้ใช้', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('email', 'อีเมล', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('tel', 'เบอร์โทรศัพท์', 'trim|required|xss_clean' );

		if($this->form_validation->run()==FALSE){

			$data['data'] = $this->model_admin->get_data_edit_admin($id);

			$this->load->view('admin/header');
			$this->load->view('admin/admin_edit',$data);
			$this->load->view('admin/footer');
	
		}else{

			//$password = $this->model_admin->check_edit_admin($id);

			$this->model_admin->admin_edit($id);
			
			echo "<script>
				alert('แก้ไขข้อมูลสำเร็จ');
				window.location.href='".base_url('admin_management/admin_list/')."';
			</script>";
		}
	}

	public function admin_setting($id="")
	{

	 $this->form_validation->set_rules('setting_edit', '', 'trim|xss_clean' );
	 $this->form_validation->set_rules('menu_list', '', 'trim|xss_clean' );
	 $this->form_validation->set_rules('banner_multi', '', 'trim|xss_clean' );
	 $this->form_validation->set_rules('about_edit', '', 'trim|xss_clean' );
	 $this->form_validation->set_rules('news_list', '', 'trim|xss_clean' );
	 $this->form_validation->set_rules('adv_list', '', 'trim|xss_clean' );
	 $this->form_validation->set_rules('contact_edit', '', 'trim|xss_clean' );
	 $this->form_validation->set_rules('member_list', '', 'trim|xss_clean' );
	 $this->form_validation->set_rules('car_top_list', '', 'trim|xss_clean' );
	 $this->form_validation->set_rules('car_buy_list', '', 'trim|xss_clean' );
	 $this->form_validation->set_rules('car_type_list', '', 'trim|xss_clean' );
	 $this->form_validation->set_rules('car_price_list', '', 'trim|xss_clean' );
	 $this->form_validation->set_rules('car_year_list', '', 'trim|xss_clean' );
	 $this->form_validation->set_rules('car_color_list', '', 'trim|xss_clean' );
	 $this->form_validation->set_rules('car_gear_list', '', 'trim|xss_clean' );
	 $this->form_validation->set_rules('car_capacity_list', '', 'trim|xss_clean' );
	 $this->form_validation->set_rules('car_mile_list', '', 'trim|xss_clean' );
	 $this->form_validation->set_rules('car_device_list', '', 'trim|xss_clean' );
	 $this->form_validation->set_rules('finance_list', '', 'trim|xss_clean' );
	 $this->form_validation->set_rules('bank_list', '', 'trim|xss_clean' );



		if($this->form_validation->run()==FALSE){

			$data['data'] = $this->model_admin->get_data_edit_admin($id);

			$this->load->view('admin/header');
			$this->load->view('admin/admin_setting',$data);
			$this->load->view('admin/footer');
	
		}else{


			$this->model_admin->admin_setting($id);
			
			echo "<script>
				alert('แก้ไขข้อมูลสำเร็จ');
				window.location.href='".base_url('admin_management/admin_setting/'.$id.'')."';
			</script>";
		}
	}

	public function change_password_admin($id=""){

		if($this->input->post('submit_pass')){
			$this->form_validation->set_rules('password', 'รหัสผ่านใหม่', 'trim|required|xss_clean' );
			$this->form_validation->set_rules('password_new', 'ยืนยันรหัสผ่านใหม่', 'trim|required|xss_clean' );

			
		}else{
			$this->form_validation->set_rules('email', 'email', 'trim|required|xss_clean' );

		}

		if($this->form_validation->run()==FALSE){

				$data['data'] = $this->model_admin->get_data_edit_admin($id);
				$data['error_pass'] = "";
				$this->load->view('admin/header');
				$this->load->view('admin/admin_edit',$data);
				$this->load->view('admin/footer');

				
		}else{

				if($this->input->post('password')!==$this->input->post('password_new')){
					$data['error_pass'] = "กรุณากรอกยืนยันรหัสผ่านให้ตรงกัน";
					$data['data'] = $this->model_admin->get_data_edit_admin($id);

					$this->load->view('admin/header');
					$this->load->view('admin/admin_edit',$data);
					$this->load->view('admin/footer');
				}else{
					$data['error_pass'] = "";
					$this->model_admin->change_password_admin($id);
				
					echo "<script>
						alert('แก้ไขข้อมูลสำเร็จ');
						window.location.href='".base_url('admin_management/admin_list/')."';
					</script>";
				}		
		}
	}



	

	public function admin_delete($id="")
	{
			$this->model_admin->admin_delete($id);
			echo "<script>
				window.location.href='".base_url('admin_management/admin_list')."';
			</script>";
	}


	
	


/*----------------------------/ contact /-----------------------------------------------*/

	
	public function contact_edit($id="1")
	{

		$this->form_validation->set_rules('company_th', 'ชื่อบริษัท (ภาษาไทย)', 'trim|required|xss_clean' );
		$this->form_validation->set_rules('company_en', 'ชื่อบริษัท (ภาษาอังกฤษ)', 'trim|required|xss_clean' );
		$this->form_validation->set_rules('address_th', 'ที่อยู่ (ภาษาไทย)', 'trim|required|xss_clean' );
		$this->form_validation->set_rules('address_en', 'ที่อยู่ (ภาษาอังกฤษ)', 'trim|required|xss_clean' );
		$this->form_validation->set_rules('tel', 'เบอร์โทร', 'trim|required|xss_clean' );
		$this->form_validation->set_rules('fax', 'แฟ็กซ์', 'trim|required|xss_clean' );
		$this->form_validation->set_rules('email', 'อีเมล', 'trim|required|xss_clean' );
		$this->form_validation->set_rules('facebook', 'facebook', 'trim|xss_clean' );
		$this->form_validation->set_rules('instragram', 'instragram', 'trim|xss_clean' );
		$this->form_validation->set_rules('twitter', 'twitter', 'trim|xss_clean' );



		if($this->form_validation->run()==FALSE){

			$data['data'] = $this->model_admin->get_data_edit_contact($id);

			$this->load->view('admin/header');
			$this->load->view('admin/contact_edit',$data);
			$this->load->view('admin/footer');
	
		}else{

			$this->model_admin->contact_edit($id);
			
			echo "<script>
				alert('แก้ไขข้อมูลสำเร็จ');
				window.location.href='".base_url('admin_management/contact_edit/'.$id)."';
			</script>";
		}
	}

	public function contact_suggestion_list()
	{
		$data['rows'] = $this->model_admin->get_data_contact_suggestion();
		$this->load->view('admin/header');
		$this->load->view('admin/contact_suggestion_list',$data);
		$this->load->view('admin/footer');
	}

	public function contact_suggestion_view($suggestion_id)
	{

		$this->model_admin->change_read($suggestion_id);
		$data['rows'] = $this->model_admin->get_data_contact_suggestion_view($suggestion_id);
		$this->load->view('admin/header');
		$this->load->view('admin/contact_suggestion_view',$data);
		$this->load->view('admin/footer');
	}

	public function contact_suggestion_delete($suggestion_id)
	{
			$this->model_admin->contact_suggestion_delete($suggestion_id);
			echo "<script>
				window.location.href='".base_url('admin_management/contact_suggestion_list')."';
			</script>";
	}


	


/*----------------------------/ google map /-----------------------------------------------*/

	
	public function map_edit($id="1")
	{

		$this->form_validation->set_rules('map', 'แผนที่', 'trim|required|xss_clean' );


		if($this->form_validation->run()==FALSE){

			$data['data'] = $this->model_admin->get_data_edit_map($id);

			$this->load->view('admin/header');
			$this->load->view('admin/map_edit',$data);
			$this->load->view('admin/footer');
	
		}else{

			$this->model_admin->map_edit($id);
			
			echo "<script>
				alert('แก้ไขข้อมูลสำเร็จ');
				window.location.href='".base_url('admin_management/map_edit/'.$id)."';
			</script>";
		}
	}


/*----------------------------/ gallery /-----------------------------------------------*/



	public function gallery_edit($id="1")
	{

		$this->form_validation->set_rules('gallery_name_th', 'คำอธิบาย (ภาษาไทย)', 'trim|required|xss_clean' );
		$this->form_validation->set_rules('gallery_name_en', 'คำอธิบาย (ภาษาอังกฤษ)', 'trim|required|xss_clean' );


		if($this->form_validation->run()==FALSE){

			$data['data'] = $this->model_admin->get_data_edit_gallery($id);

			$this->load->view('admin/header');
			$this->load->view('admin/gallery_edit',$data);
			$this->load->view('admin/footer');
	
		}else{

			$this->model_admin->gallery_edit($id);
			
			echo "<script>
				alert('แก้ไขข้อมูลสำเร็จ');
				window.location.href='".base_url('admin_management/gallery_edit/'.$id)."';
			</script>";
		}



	}

	/////////////////////////////////gallery - multi upload/////////////////////////////////

	public function gallery_multi($id="1",$no="",$edit="",$error=""){
		
		if($id && $no){

				$check = $this->model_admin->gallery_check_id($id=1);
				if($check==TRUE){

					$data['gallery_id']=$id; 
					$data['error']=""; 
					if($error) $data['error']=$error;
								$data['id_image'] = $id;
								$this->load->model('model_admin');
								$car_top_id = $this->uri->segment(4);
								 $data['query'] = $this->model_admin->gallery_multi($car_top_id);
								 $data['tn'] ="";
								 $data['id_image_multi'] = "";
								 $data['id_data_multi'] = "";

							if($edit != "") {


									$dt = $this->model_admin->gallery_edit_image_multi($edit);
									$data['tn'] = $dt->thumb_name_multi;
									$data['id_image_multi'] = $edit;
									$data['id_data_multi'] = $no;
								       
								       
								}

								$data['result'] = $this->model_admin->gallery_view($id);



						        $data['num'] = $no;
						        $this->load->view('admin/header');
								$this->load->view('admin/gallery_multi',$data);
								$this->load->view('admin/footer');
				}else{
					redirect("admin_management/gallery_multi/".$data['gallery_id']."/".$no."?type=".$this->input->get('type')."&&car_type_id=".$this->input->get('car_type_id')."&&brand=".$this->input->get('brand')."&&car_id=".$this->input->get('car_id')."&&model=".$this->input->get('model')."&&car_model_id=".$this->input->get('car_model_id')."&&model_des=".$this->input->get('model_des')."&&car_model_des_id=".$this->input->get('car_model_des_id')."");
				}

		
		}else{
			redirect('admin','refresh');
		}
	}

	function gallery_upload_image_multi($id="",$errer=""){
		if($id && $this->input->post('num')){

/*-------------------------------เปลี่ยนสถานะเป็นรถเก่าเมื่อมีการเปลี่ยนแปลง--------------------------------------------------*/

							$data_update = array (
								'status_car_show' =>  1
							);
							$this->db->where('car_top_id',  $this->input->post('num'));
							$this->db->update ( 'tbl_car_top', $data_update );	

/*----------------------------------------------------------------------------------------------------------------------------*/

			if($this->input->post('id_image_multi')){



				$config['upload_path'] = './uploads_car/';
				$config['file_name']  = 'CAR_'.$this->input->post('id_image_multi').'_'.date('Ymd_His').'.jpg';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				
				$this->load->library("upload");
				$this->upload->initialize($config);
				$this->load->library('upload', $config);



					if ( ! $this->upload->do_upload()){
						$error =  $this->upload->display_errors();
						$this->gallery_multi($id,$this->input->post('num'),$this->input->post('id_image_multi'),$error);
						}else{


							$data=$this->upload->data();

							$config['image_library'] = 'gd2';
							$config['source_image'] =$data['full_path'];
							$config['maintain_ratio'] = TRUE;
							
							//$config['width'] = 350;

							$this->load->library('image_lib', $config); 

							$this->image_lib->resize();

							$temp = $this->model_admin->gallery_update_image_multi($data);

							$data = array('upload_data' => $this->upload->data());

					redirect("admin_management/gallery_multi/".$id."/".$this->input->post('num')."?type=".$this->input->get('type')."&&car_type_id=".$this->input->get('car_type_id')."&&brand=".$this->input->get('brand')."&&car_id=".$this->input->get('car_id')."&&model=".$this->input->get('model')."&&car_model_id=".$this->input->get('car_model_id')."&&model_des=".$this->input->get('model_des')."&&car_model_des_id=".$this->input->get('car_model_des_id')."");
				}

			}else{
					$name_array = array();
					$count = count($_FILES['userfile']['size']);
					foreach($_FILES as $key=>$value)
					for($s=0; $s<=$count-1; $s++) {
						$config['upload_path'] = './uploads_car/';
						$config['file_name']  = 'CAR_'.$id.'_'.date('Ymd_His').'.jpg';
						$config['allowed_types'] = 'gif|jpg|png|jpeg';
						//$config['max_width'] = '350';
				
						$this->load->library("upload");
						$this->upload->initialize($config);
						$this->load->library('upload', $config);
						$data = $this->upload->data();

							$config['image_library'] = 'gd2';
							$config['source_image'] =$data['full_path'];
							$config['maintain_ratio'] = TRUE;
							//$config['width'] = 350;
						
							
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


							$query_queue_sort = $this->db->query ( "SELECT MAX(sort_no) as max_id FROM gallery_uploads_multi WHERE car_top_id=".$this->uri->segment(4)."" );
      						 $queue_sort = $query_queue_sort->row ();
							$data = array(
							'gallery_id' => $id,
							'thumb_name_multi'=>$filename,
							'upload_date'=>date("Y-m-d H:i:s"),
							'car_top_id'=>$this->uri->segment(4),
							'sort_no'=>$queue_sort->max_id+1
							);
							$this->db->insert('gallery_uploads_multi', $data);



							redirect("admin_management/gallery_multi/".$id."/".$this->input->post('num')."?type=".$this->input->get('type')."&&car_type_id=".$this->input->get('car_type_id')."&&brand=".$this->input->get('brand')."&&car_id=".$this->input->get('car_id')."&&model=".$this->input->get('model')."&&car_model_id=".$this->input->get('car_model_id')."&&model_des=".$this->input->get('model_des')."&&car_model_des_id=".$this->input->get('car_model_des_id')."");
						}
				}
			}else{

				redirect('admin','refresh');
			}
	}



	function gallery_delete_image_multi($id="",$no="",$edit="") {
		if($id && $no && $edit){

			

			$this->model_admin->gallery_delete_image_multi($edit);
			redirect('admin_management/gallery_multi/'.$id.'/'.$no);
		}else{
			redirect('admin','refresh');
		}
	}




	 function gallery_edit_image_multi($id="",$error=""){
	 	$id = $this->uri->segment(4);
		$for_id = $this->uri->segment(3);

		if ($id == NULL) {
			redirect('admin_management');
		}
		$data['error']=""; 
		$dt = $this->model_admin->gallery_edit_image_multi($id);
		$data['tn'] = $dt->thumb_name_multi;
		$data['id_image_multi'] = $id;
		$data['id_data_multi'] = $for_id;

		$this->load->view('admin/header');
		$this->load->view('admin/gallery_edit_image_multi',$data);
		$this->load->view('admin/footer');
	}

/////////////////////////////////file - multi upload/////////////////////////////////

	public function file_multi($id="1",$no="",$edit="",$error=""){
		
		if($id && $no){

				$check = $this->model_admin->file_check_id($id=1);
				if($check==TRUE){

					$data['file_id']=$id; 
					$data['error']=""; 
					if($error) $data['error']=$error;
								$data['id_image'] = $id;
								$this->load->model('model_admin');
								$car_top_id = $this->uri->segment(4);
								 $data['query'] = $this->model_admin->file_multi($car_top_id);
								 $data['tn'] ="";
								 $data['id_image_multi'] = "";
								 $data['id_data_multi'] = "";

							if($edit != "") {


									$dt = $this->model_admin->file_edit_image_multi($edit);
									$data['tn'] = $dt->thumb_name_multi;
									$data['id_image_multi'] = $edit;
									$data['id_data_multi'] = $no;
								       
								       
								}

								$data['result'] = $this->model_admin->file_view($id);

						        $data['num'] = $no;
						        $this->load->view('admin/header');
								$this->load->view('admin/file_multi',$data);
								$this->load->view('admin/footer');
				}else{
					redirect("admin_management/file_multi/".$data['file_id']."/".$no."?type=".$this->input->get('type')."&&car_type_id=".$this->input->get('car_type_id')."&&brand=".$this->input->get('brand')."&&car_id=".$this->input->get('car_id')."&&model=".$this->input->get('model')."&&car_model_id=".$this->input->get('car_model_id')."&&model_des=".$this->input->get('model_des')."&&car_model_des_id=".$this->input->get('car_model_des_id')."");
				}

		
		}else{
			redirect('admin','refresh');
		}
	}

	function file_upload_image_multi($id="",$errer=""){
		if($id && $this->input->post('num')){

			if($this->input->post('id_image_multi')){

/*-------------------------------เปลี่ยนสถานะเป็นรถเก่าเมื่อมีการเปลี่ยนแปลง--------------------------------------------------*/

							$data_update = array (
								'status_car_show' =>  1
							);
							$this->db->where('car_top_id',  $this->input->post('num'));
							$this->db->update ( 'tbl_car_top', $data_update );	

/*----------------------------------------------------------------------------------------------------------------------------*/

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
							$config['maintain_ratio'] = TRUE;
							
							//$config['width'] = 350;

							$this->load->library('image_lib', $config); 

							$this->image_lib->resize();

							$temp = $this->model_admin->file_update_image_multi($data);

							$data = array('upload_data' => $this->upload->data());

					redirect("admin_management/file_multi/".$id."/".$this->input->post('num')."?type=".$this->input->get('type')."&&car_type_id=".$this->input->get('car_type_id')."&&brand=".$this->input->get('brand')."&&car_id=".$this->input->get('car_id')."&&model=".$this->input->get('model')."&&car_model_id=".$this->input->get('car_model_id')."&&model_des=".$this->input->get('model_des')."&&car_model_des_id=".$this->input->get('car_model_des_id')."");
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
							$config['maintain_ratio'] = TRUE;
							//$config['width'] = 350;
						
							
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
							$no = $this->input->post('num');
							$count_check = $this->model_admin->file_view_check($no);

								if($count_check >1){
								 echo "<script>
								alert('อัพโหลดได้ไม่เกิน 2 ไฟล์');
								window.location.href='".base_url("admin_management/file_multi/".$id."/".$this->input->post('num'))."?type=".$this->input->get('type')."&&car_type_id=".$this->input->get('car_type_id')."&&brand=".$this->input->get('brand')."&&car_id=".$this->input->get('car_id')."&&model=".$this->input->get('model')."&&car_model_id=".$this->input->get('car_model_id')."&&model_des=".$this->input->get('model_des')."&&car_model_des_id=".$this->input->get('car_model_des_id')."';
								</script>";
								}else{

									$query_queue_sort = $this->db->query ( "SELECT MAX(sort_no) as max_id FROM file_uploads_multi WHERE gallery_id=".$id." AND  car_top_id =".$this->uri->segment(4)."" );
		      						 $queue_sort = $query_queue_sort->row ();
									$data = array(
									'gallery_id' => $id,
									'thumb_name_multi'=>$filename,
									'upload_date'=>date("Y-m-d H:i:s"),
									'car_top_id'=>$this->uri->segment(4),
									'sort_no'=>$queue_sort->max_id+1
									);
									$this->db->insert('file_uploads_multi', $data);

									redirect("admin_management/file_multi/".$id."/".$this->input->post('num')."?type=".$this->input->get('type')."&&car_type_id=".$this->input->get('car_type_id')."&&brand=".$this->input->get('brand')."&&car_id=".$this->input->get('car_id')."&&model=".$this->input->get('model')."&&car_model_id=".$this->input->get('car_model_id')."&&model_des=".$this->input->get('model_des')."&&car_model_des_id=".$this->input->get('car_model_des_id')."");
									
								}

							
						}
				}
			}else{

				redirect('admin','refresh');
			}
	}



	function file_delete_image_multi($id="",$no="",$edit="") {
		if($id && $no && $edit){

			

			$this->model_admin->file_delete_image_multi($edit);
			redirect('admin_management/file_multi/'.$id.'/'.$no);
		}else{
			redirect('admin','refresh');
		}
	}




	 function file_edit_image_multi($id="",$error=""){
	 	$id = $this->uri->segment(4);
		$for_id = $this->uri->segment(3);

		if ($id == NULL) {
			redirect('admin_management');
		}
		$data['error']=""; 
		$dt = $this->model_admin->file_edit_image_multi($id);
		$data['tn'] = $dt->thumb_name_multi;
		$data['id_image_multi'] = $id;
		$data['id_data_multi'] = $for_id;

		$this->load->view('admin/header');
		$this->load->view('admin/file_edit_image_multi',$data);
		$this->load->view('admin/footer');
	}



/////////////////////////////////about - multi upload/////////////////////////////////

	public function about_multi($id="1",$no="",$edit="",$error=""){
		
		if($id && $no){

				$check = $this->model_admin->about_check_id($id=1);
				if($check==TRUE){

					$data['about_id']=$id; 
					$data['error']=""; 
					if($error) $data['error']=$error;
								$data['id_image'] = $id;
								$this->load->model('model_admin');
								$car_top_id = $this->uri->segment(4);
								 $data['query'] = $this->model_admin->about_multi($car_top_id);
								 $data['tn'] ="";
								 $data['id_image_multi'] = "";
								 $data['id_data_multi'] = "";

							if($edit != "") {


									$dt = $this->model_admin->about_edit_image_multi($edit);
									$data['tn'] = $dt->thumb_name_multi;
									$data['id_image_multi'] = $edit;
									$data['id_data_multi'] = $no;
								       
								       
								}

								$data['result'] = $this->model_admin->about_view($id);



						        $data['num'] = $no;
						        $this->load->view('admin/header');
								$this->load->view('admin/about_multi',$data);
								$this->load->view('admin/footer');
				}else{
					redirect('admin_management/about_multi/'.$data['about_id'].'/'.$no);
				}

		
		}else{
			redirect('admin','refresh');
		}
	}

	function about_upload_image_multi($id="",$errer=""){
		if($id && $this->input->post('num')){

			if($this->input->post('id_image_multi')){

				$config['upload_path'] = './uploads/';
				$config['file_name']  = 'ABOUT_'.$this->input->post('id_image_multi').'_'.date('Ymd_His').'.jpg';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				
				$this->load->library("upload");
				$this->upload->initialize($config);
				$this->load->library('upload', $config);

					if ( ! $this->upload->do_upload()){
						$error =  $this->upload->display_errors();
						$this->about_multi($id,$this->input->post('num'),$this->input->post('id_image_multi'),$error);
						}else{
							$data=$this->upload->data();

							$config['image_library'] = 'gd2';
							$config['source_image'] =$data['full_path'];
							$config['maintain_ratio'] = TRUE;
							
							$config['width'] = 1920;

							$this->load->library('image_lib', $config); 

							$this->image_lib->resize();

							$temp = $this->model_admin->about_update_image_multi($data);

							$data = array('upload_data' => $this->upload->data());

					redirect('admin_management/about_multi/'.$id.'/'.$this->input->post('num'));
				}

			}else{
					$name_array = array();
					$count = count($_FILES['userfile']['size']);
					foreach($_FILES as $key=>$value)
					for($s=0; $s<=$count-1; $s++) {
						$config['upload_path'] = './uploads/';
						$config['file_name']  = 'ABOUT_'.$id.'_'.date('Ymd_His').'.jpg';
						$config['allowed_types'] = 'gif|jpg|png|jpeg';
				
						$this->load->library("upload");
						$this->upload->initialize($config);
						$this->load->library('upload', $config);
						$data = $this->upload->data();

							$config['image_library'] = 'gd2';
							$config['source_image'] =$data['full_path'];
							$config['maintain_ratio'] = TRUE;
							$config['width'] = 1920;
						
							
							$this->load->library('image_lib', $config);
							$this->image_lib->resize();

						$name_array[] = $data['file_name'];
					}
						$names= implode(',', $name_array);
						$filename = $names;
						if ( ! $this->upload->do_upload()){
							$error =  $this->upload->display_errors();
							$this->about_multi($id,$this->input->post('num'),'',$error);
						}else{

							$query_queue_sort = $this->db->query ( "SELECT MAX(sort_no) as max_id FROM about_uploads_multi WHERE about_id=".$id."" );
      						 $queue_sort = $query_queue_sort->row ();
							$data = array(
							'about_id' => $id,
							'thumb_name_multi'=>$filename,
							'upload_date'=>date("Y-m-d H:i:s"),
							'gallery_id'=>$this->uri->segment(4),
							'sort_no'=>$queue_sort->max_id+1
							);
							$this->db->insert('about_uploads_multi', $data);



							redirect('admin_management/about_multi/'.$id.'/'.$this->input->post('num'));
						}
				}
			}else{

				redirect('admin','refresh');
			}
	}



	function about_delete_image_multi($id="",$no="",$edit="") {
		if($id && $no && $edit){

			

			$this->model_admin->about_delete_image_multi($edit);
			redirect('admin_management/about_multi/'.$id.'/'.$no);
		}else{
			redirect('admin','refresh');
		}
	}




	 function about_edit_image_multi($id="",$error=""){
	 	$id = $this->uri->segment(4);
		$for_id = $this->uri->segment(3);

		if ($id == NULL) {
			redirect('admin_management');
		}
		$data['error']=""; 
		$dt = $this->model_admin->about_edit_image_multi($id);
		$data['tn'] = $dt->thumb_name_multi;
		$data['id_image_multi'] = $id;
		$data['id_data_multi'] = $for_id;

		$this->load->view('admin/header');
		$this->load->view('admin/about_edit_image_multi',$data);
		$this->load->view('admin/footer');
	}

/////////////////////////////////contact - multi upload/////////////////////////////////

	public function contact_multi($id="1",$no="",$edit="",$error=""){
		
		if($id && $no){

				$check = $this->model_admin->contact_check_id($id=1);
				if($check==TRUE){

					$data['contact_id']=$id; 
					$data['error']=""; 
					if($error) $data['error']=$error;
								$data['id_image'] = $id;
								$this->load->model('model_admin');
								$car_top_id = $this->uri->segment(4);
								 $data['query'] = $this->model_admin->contact_multi($car_top_id);
								 $data['tn'] ="";
								 $data['id_image_multi'] = "";
								 $data['id_data_multi'] = "";

							if($edit != "") {


									$dt = $this->model_admin->contact_edit_image_multi($edit);
									$data['tn'] = $dt->thumb_name_multi;
									$data['id_image_multi'] = $edit;
									$data['id_data_multi'] = $no;
								       
								       
								}

								$data['result'] = $this->model_admin->contact_view($id);



						        $data['num'] = $no;
						        $this->load->view('admin/header');
								$this->load->view('admin/contact_multi',$data);
								$this->load->view('admin/footer');
				}else{
					redirect('admin_management/contact_multi/'.$data['contact_id'].'/'.$no);
				}

		
		}else{
			redirect('admin','refresh');
		}
	}

	function contact_upload_image_multi($id="",$errer=""){
		if($id && $this->input->post('num')){

			if($this->input->post('id_image_multi')){

				$config['upload_path'] = './uploads/';
				$config['file_name']  = 'contact_'.$this->input->post('id_image_multi').'_'.date('Ymd_His').'.jpg';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				
				$this->load->library("upload");
				$this->upload->initialize($config);
				$this->load->library('upload', $config);

					if ( ! $this->upload->do_upload()){
						$error =  $this->upload->display_errors();
						$this->contact_multi($id,$this->input->post('num'),$this->input->post('id_image_multi'),$error);
						}else{
							$data=$this->upload->data();

							$config['image_library'] = 'gd2';
							$config['source_image'] =$data['full_path'];
							$config['maintain_ratio'] = TRUE;
							
							$config['width'] = 1920;

							$this->load->library('image_lib', $config); 

							$this->image_lib->resize();

							$temp = $this->model_admin->contact_update_image_multi($data);

							$data = array('upload_data' => $this->upload->data());

					redirect('admin_management/contact_multi/'.$id.'/'.$this->input->post('num'));
				}

			}else{
					$name_array = array();
					$count = count($_FILES['userfile']['size']);
					foreach($_FILES as $key=>$value)
					for($s=0; $s<=$count-1; $s++) {
						$config['upload_path'] = './uploads/';
						$config['file_name']  = 'contact_'.$id.'_'.date('Ymd_His').'.jpg';
						$config['allowed_types'] = 'gif|jpg|png|jpeg';
				
						$this->load->library("upload");
						$this->upload->initialize($config);
						$this->load->library('upload', $config);
						$data = $this->upload->data();

							$config['image_library'] = 'gd2';
							$config['source_image'] =$data['full_path'];
							$config['maintain_ratio'] = TRUE;
							$config['width'] = 1920;
						
							
							$this->load->library('image_lib', $config);
							$this->image_lib->resize();

						$name_array[] = $data['file_name'];
					}
						$names= implode(',', $name_array);
						$filename = $names;
						if ( ! $this->upload->do_upload()){
							$error =  $this->upload->display_errors();
							$this->contact_multi($id,$this->input->post('num'),'',$error);
						}else{

							$query_queue_sort = $this->db->query ( "SELECT MAX(sort_no) as max_id FROM contact_uploads_multi WHERE contact_id=".$id."" );
      						 $queue_sort = $query_queue_sort->row ();
							$data = array(
							'contact_id' => $id,
							'thumb_name_multi'=>$filename,
							'upload_date'=>date("Y-m-d H:i:s"),
							'gallery_id'=>$this->uri->segment(4),
							'sort_no'=>$queue_sort->max_id+1
							);
							$this->db->insert('contact_uploads_multi', $data);



							redirect('admin_management/contact_multi/'.$id.'/'.$this->input->post('num'));
						}
				}
			}else{

				redirect('admin','refresh');
			}
	}



	function contact_delete_image_multi($id="",$no="",$edit="") {
		if($id && $no && $edit){

			

			$this->model_admin->contact_delete_image_multi($edit);
			redirect('admin_management/contact_multi/'.$id.'/'.$no);
		}else{
			redirect('admin','refresh');
		}
	}




	 function contact_edit_image_multi($id="",$error=""){
	 	$id = $this->uri->segment(4);
		$for_id = $this->uri->segment(3);

		if ($id == NULL) {
			redirect('admin_management');
		}
		$data['error']=""; 
		$dt = $this->model_admin->contact_edit_image_multi($id);
		$data['tn'] = $dt->thumb_name_multi;
		$data['id_image_multi'] = $id;
		$data['id_data_multi'] = $for_id;

		$this->load->view('admin/header');
		$this->load->view('admin/contact_edit_image_multi',$data);
		$this->load->view('admin/footer');
	}

/////////////////////////////////news - multi upload/////////////////////////////////

	public function news_multi($id="1",$no="",$edit="",$error=""){
		
		if($id && $no){

				
					$data['error']=""; 
					if($error) $data['error']=$error;
								$data['id_image'] = $id;
								$this->load->model('model_admin');
								 $data['query'] = $this->model_admin->news_multi();
								 $data['tn'] ="";
								 $data['id_image_multi'] = "";
								 $data['id_data_multi'] = "";

							if($edit != "") {


									$dt = $this->model_admin->news_edit_image_multi($edit);
									$data['tn'] = $dt->thumb_name_multi;
									$data['id_image_multi'] = $edit;
									$data['id_data_multi'] = $no;
								       
								       
								}

								$data['result'] = $this->model_admin->news_view1($id);



						        $data['num'] = $no;
						        $this->load->view('admin/header');
								$this->load->view('admin/news_multi',$data);
								$this->load->view('admin/footer');
				

		
		}else{
			redirect('admin','refresh');
		}
	}

	function news_upload_image_multi($id="",$errer=""){
		if($id && $this->input->post('num')){

			if($this->input->post('id_image_multi')){

				$config['upload_path'] = './uploads/';
				$config['file_name']  = 'news_'.$this->input->post('id_image_multi').'_'.date('Ymd_His').'.jpg';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				
				$this->load->library("upload");
				$this->upload->initialize($config);
				$this->load->library('upload', $config);

					if ( ! $this->upload->do_upload()){
						$error =  $this->upload->display_errors();
						$this->news_multi($id,$this->input->post('num'),$this->input->post('id_image_multi'),$error);
						}else{
							$data=$this->upload->data();

							$config['image_library'] = 'gd2';
							$config['source_image'] =$data['full_path'];
							$config['maintain_ratio'] = TRUE;
							
							$config['width'] = 1920;

							$this->load->library('image_lib', $config); 

							$this->image_lib->resize();

							$temp = $this->model_admin->news_update_image_multi($data);

							$data = array('upload_data' => $this->upload->data());

					redirect('admin_management/news_multi/'.$id.'/'.$this->input->post('num'));
				}

			}else{
					$name_array = array();
					$count = count($_FILES['userfile']['size']);
					foreach($_FILES as $key=>$value)
					for($s=0; $s<=$count-1; $s++) {
						$config['upload_path'] = './uploads/';
						$config['file_name']  = 'news_'.$id.'_'.date('Ymd_His').'.jpg';
						$config['allowed_types'] = 'gif|jpg|png|jpeg';
				
						$this->load->library("upload");
						$this->upload->initialize($config);
						$this->load->library('upload', $config);
						$data = $this->upload->data();

							$config['image_library'] = 'gd2';
							$config['source_image'] =$data['full_path'];
							$config['maintain_ratio'] = TRUE;
							$config['width'] = 1920;
						
							
							$this->load->library('image_lib', $config);
							$this->image_lib->resize();

						$name_array[] = $data['file_name'];
					}
						$names= implode(',', $name_array);
						$filename = $names;
						if ( ! $this->upload->do_upload()){
							$error =  $this->upload->display_errors();
							$this->news_multi($id,$this->input->post('num'),'',$error);
						}else{

							$query_queue_sort = $this->db->query ( "SELECT MAX(sort_no) as max_id FROM news_uploads_multi WHERE news_id=".$id."" );
      						 $queue_sort = $query_queue_sort->row ();
							$data = array(
							'news_id' => $id,
							'thumb_name_multi'=>$filename,
							'upload_date'=>date("Y-m-d H:i:s"),
							'gallery_id'=>$this->uri->segment(4),
							'sort_no'=>$queue_sort->max_id+1
							);
							$this->db->insert('news_uploads_multi', $data);



							redirect('admin_management/news_multi/'.$id.'/'.$this->input->post('num'));
						}
				}
			}else{

				redirect('admin','refresh');
			}
	}



	function news_delete_image_multi($id="",$no="",$edit="") {
		if($id && $no && $edit){

			

			$this->model_admin->news_delete_image_multi($edit);
			redirect('admin_management/news_multi/'.$id.'/'.$no);
		}else{
			redirect('admin','refresh');
		}
	}




	 function news_edit_image_multi($id="",$error=""){
	 	$id = $this->uri->segment(4);
		$for_id = $this->uri->segment(3);

		if ($id == NULL) {
			redirect('admin_management');
		}
		$data['error']=""; 
		$dt = $this->model_admin->news_edit_image_multi($id);
		$data['tn'] = $dt->thumb_name_multi;
		$data['id_image_multi'] = $id;
		$data['id_data_multi'] = $for_id;

		$this->load->view('admin/header');
		$this->load->view('admin/news_edit_image_multi',$data);
		$this->load->view('admin/footer');
	}



/*----------------------------/ member /-----------------------------------------------*/

	public function member_list()
	{
		$data['result'] = $this->model_admin->get_data_member();
		$this->load->view('admin/header');
		$this->load->view('admin/member_list',$data);
		$this->load->view('admin/footer');
	}


	public function member_add()
	{
		
	    $this->form_validation->set_rules('name', 'ชื่อสมาชิก', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('tel', 'เบอร์โทร', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('email', 'email', 'trim|required|xss_clean|unique_com[tbl_login_member.email]' );
	    $this->form_validation->set_rules('password', 'รหัสผ่าน', 'trim|required|xss_clean' );
	  


		if($this->form_validation->run()==FALSE){

			$this->load->view('admin/header');
			$this->load->view('admin/member_add');
			$this->load->view('admin/footer');
			
		}else{

			$this->model_admin->member_add();
			 echo "<script>
				alert('เพิ่มข้อมูลเรียบร้อยแล้ว');
				window.location.href='".base_url('admin_management/member_list/')."';
				</script>";

		}	
	}

	public function member_edit($id="")
	{

		$this->form_validation->set_rules('name', 'ชื่อสมาชิก', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('tel', 'เบอร์โทร', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('email', 'email', 'trim|required|xss_clean|unique_edit[tbl_login_member.email.id.'.$id.']' );

	  

		if($this->form_validation->run()==FALSE){

			$data['data'] = $this->model_admin->get_data_edit_member($id);

			$this->load->view('admin/header');
			$this->load->view('admin/member_edit',$data);
			$this->load->view('admin/footer');
	
		}else{

			$this->model_admin->member_edit($id);
			
			echo "<script>
				alert('แก้ไขข้อมูลสำเร็จ');
				window.location.href='".base_url('admin_management/member_list/')."';
			</script>";
		}
	}

	public function change_password_member($id=""){

		if($this->input->post('submit_pass')){
			$this->form_validation->set_rules('password', 'รหัสผ่านใหม่', 'trim|required|xss_clean' );
			$this->form_validation->set_rules('password_new', 'ยืนยันรหัสผ่านใหม่', 'trim|required|xss_clean' );

			
		}else{
			$this->form_validation->set_rules('email', 'email', 'trim|required|xss_clean' );

		}

		if($this->form_validation->run()==FALSE){

				$data['data'] = $this->model_admin->get_data_edit_member($id);
				$data['error_pass'] = "";
				$this->load->view('admin/header');
				$this->load->view('admin/member_edit',$data);
				$this->load->view('admin/footer');

				
		}else{

				if($this->input->post('password')!==$this->input->post('password_new')){
					$data['error_pass'] = "กรุณากรอกยืนยันรหัสผ่านให้ตรงกัน";
					$data['data'] = $this->model_admin->get_data_edit_member($id);

					$this->load->view('admin/header');
					$this->load->view('admin/member_edit',$data);
					$this->load->view('admin/footer');
				}else{
					$data['error_pass'] = "";
					$this->model_admin->change_password_member($id);
				
					echo "<script>
						alert('แก้ไขรหัสผ่านสำเร็จ');
						window.location.href='".base_url('admin_management/member_list/')."';
					</script>";
				}		
		}
	}


	public function member_delete($id="")
	{
			$this->model_admin->member_delete($id);
			echo "<script>
				window.location.href='".base_url('admin_management/member_list')."';
			</script>";
	}

	

/*----------------------------/ menu /-----------------------------------------------*/

	public function menu_list()
	{
		$data['result'] = $this->model_admin->get_data_menu();
		$this->load->view('admin/header');
		$this->load->view('admin/menu_list',$data);
		$this->load->view('admin/footer');
	}


	public function menu_add()
	{

	    $this->form_validation->set_rules('name_th', 'ชื่อเมนู (ภาษาไทย)', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('name_en', 'ชื่อเมนู (ภาษาอังกฤษ)', 'trim|required|xss_clean' );
	    // $this->form_validation->set_rules('route_path', 'ที่อยู่ของ Route Path', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('position_id', 'ตำแหน่งการแสดงผล', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('status_id', 'สถานะการใช้งาน', 'trim|required|xss_clean' );

		if($this->form_validation->run()==FALSE){

			$this->load->view('admin/header');
			$this->load->view('admin/menu_add');
			$this->load->view('admin/footer');

		}else{

			$this->model_admin->menu_add();
			 echo "<script>
				alert('เพิ่มข้อมูลเรียบร้อยแล้ว');
				window.location.href='".base_url('admin_management/menu_list/')."';
				</script>";

		}	
	}

	public function menu_edit($id="")
	{

		$this->form_validation->set_rules('name_th', 'ชื่อเมนู (ภาษาไทย)', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('name_en', 'ชื่อเมนู (ภาษาอังกฤษ)', 'trim|required|xss_clean' );
	    // $this->form_validation->set_rules('route_path', 'ที่อยู่ของ Route Path', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('position_id', 'ตำแหน่งการแสดงผล', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('status_id', 'สถานะการใช้งาน', 'trim|required|xss_clean' );

		if($this->form_validation->run()==FALSE){

			$data['data'] = $this->model_admin->get_data_edit_menu($id);

			$this->load->view('admin/header');
			$this->load->view('admin/menu_edit',$data);
			$this->load->view('admin/footer');
	
		}else{

			$this->model_admin->menu_edit($id);
			
			echo "<script>
				alert('แก้ไขข้อมูลสำเร็จ');
				window.location.href='".base_url('admin_management/menu_list/')."';
			</script>";
		}
	}

	public function menu_delete($id="")
	{
			$this->model_admin->menu_delete($id);
			echo "<script>
				window.location.href='".base_url('admin_management/menu_list')."';
			</script>";
	}


	/*----------------------------/ Car type /-----------------------------------------------*/

	public function car_type_list()
	{
		$data['result'] = $this->model_admin->get_data_car_type();
		$this->load->view('admin/header');
		$this->load->view('admin/car_type_list',$data);
		$this->load->view('admin/footer');
	}


	public function car_type_add()
	{

	    $this->form_validation->set_rules('name_type_th', 'ชื่อประเภทรถ (ภาษาไทย)', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('name_type_en', 'ชื่อประเภทรถ (ภาษาอังกฤษ)', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('position_id', 'ตำแหน่งการแสดงผล', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('status_id', 'สถานะการใช้งาน', 'trim|required|xss_clean' );

		if($this->form_validation->run()==FALSE){
			$data['status'] = $this->model_admin->get_tbl_status();
			$this->load->view('admin/header');
			$this->load->view('admin/car_type_add',$data);
			$this->load->view('admin/footer');

		}else{

			$this->model_admin->car_type_add();
			 echo "<script>
				alert('เพิ่มข้อมูลเรียบร้อยแล้ว');
				window.location.href='".base_url('admin_management/car_type_list/')."';
				</script>";

		}	
	}

	public function car_type_edit($id="")
	{

		$this->form_validation->set_rules('name_type_th', 'ชื่อประเภทรถ (ภาษาไทย)', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('name_type_en', 'ชื่อประเภทรถ (ภาษาอังกฤษ)', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('position_id', 'ตำแหน่งการแสดงผล', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('status_id', 'สถานะการใช้งาน', 'trim|required|xss_clean' );

		if($this->form_validation->run()==FALSE){

			$data['data'] = $this->model_admin->get_data_edit_car_type($id);

			$this->load->view('admin/header');
			$this->load->view('admin/car_type_edit',$data);
			$this->load->view('admin/footer');
	
		}else{

			$this->model_admin->car_type_edit($id);
			
			echo "<script>
				alert('แก้ไขข้อมูลสำเร็จ');
				window.location.href='".base_url('admin_management/car_type_list/')."';
			</script>";
		}
	}

	public function car_type_delete($id="")
	{
			$this->model_admin->car_type_delete($id);
			echo "<script>
				window.location.href='".base_url('admin_management/car_type_list')."';
			</script>";
	}

	/*----------------------------/ Car /-----------------------------------------------*/

	public function car_list($car_type_id="")
	{	
		if(!empty($car_type_id)){
		$data['type'] = $this->model_admin->get_data_car_type_title($car_type_id);
		$data['result'] = $this->model_admin->get_data_car($car_type_id);
		$data['car_type_id'] = $car_type_id;
		$this->load->view('admin/header');
		$this->load->view('admin/car_list',$data);
		$this->load->view('admin/footer');
		}else{
			echo "<script>
				window.location.href='".base_url('admin_management/car_type_list')."';
				</script>";
		}
	}


	public function car_add()
	{

	    $this->form_validation->set_rules('name_th', 'ชื่อยี่ห้อ (ภาษาไทย)', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('name_en', 'ชื่อยี่ห้อ (ภาษาอังกฤษ)', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('position_id', 'ตำแหน่งการแสดงผล', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('status_id', 'สถานะการใช้งาน', 'trim|required|xss_clean' );

		if($this->form_validation->run()==FALSE){
			$data['status'] = $this->model_admin->get_tbl_status();
			$this->load->view('admin/header');
			$this->load->view('admin/car_add',$data);
			$this->load->view('admin/footer');

		}else{

			$car_type_id = $this->uri->segment(3);
			$this->model_admin->car_add();
			 echo "<script>
				alert('เพิ่มข้อมูลเรียบร้อยแล้ว');
				window.location.href='".base_url('admin_management/car_list/'.$car_type_id.'')."';
				</script>";

		}	
	}

	public function car_edit($id="")
	{

		$this->form_validation->set_rules('name_th', 'ชื่อยี่ห้อ (ภาษาไทย)', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('name_en', 'ชื่อยี่ห้อ (ภาษาอังกฤษ)', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('position_id', 'ตำแหน่งการแสดงผล', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('status_id', 'สถานะการใช้งาน', 'trim|required|xss_clean' );

		if($this->form_validation->run()==FALSE){

			$data['data'] = $this->model_admin->get_data_edit_car($id);

			$this->load->view('admin/header');
			$this->load->view('admin/car_edit',$data);
			$this->load->view('admin/footer');
	
		}else{

			$car_type_id = $this->uri->segment(4);

			$this->model_admin->car_edit($id);
			
			echo "<script>
				alert('แก้ไขข้อมูลสำเร็จ');
				window.location.href='".base_url('admin_management/car_list/'.$car_type_id.'')."';
			</script>";
		}
	}

	public function car_delete($id="")
	{
			$car_type_id = $this->uri->segment(4);
			$this->model_admin->car_delete($id);
			echo "<script>
				window.location.href='".base_url('admin_management/car_list/'.$car_type_id.'')."';
			</script>";
	}



	/*----------------------------/ Car model /-----------------------------------------------*/

	public function car_model_list()
	{
		$id = $this->uri->segment(3);
		$data['result'] = $this->model_admin->get_data_car_model($id);
		$data['car_cate'] = $this->model_admin->get_data_car_cate($id);
		$this->load->view('admin/header');
		$this->load->view('admin/car_model_list',$data);
		$this->load->view('admin/footer');
	}


	public function car_model_add()
	{
	    $this->form_validation->set_rules('name_model_th', 'ชื่อรุ่นรถ (ภาษาไทย)', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('name_model_en', 'ชื่อรุ่นรถ (ภาษาอังกฤษ)', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('position_id', 'ตำแหน่งการแสดงผล', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('status_id', 'สถานะการใช้งาน', 'trim|required|xss_clean' );

		if($this->form_validation->run()==FALSE){
			$id = $this->uri->segment(3);
			$data['car_cate'] = $this->model_admin->get_data_car_cate($id);
			$data['status'] = $this->model_admin->get_tbl_status();
			$this->load->view('admin/header');
			$this->load->view('admin/car_model_add',$data);
			$this->load->view('admin/footer');

		}else{

			$id_car = $this->uri->segment(3);
			$this->model_admin->car_model_add($id_car);
			 echo "<script>
				alert('เพิ่มข้อมูลเรียบร้อยแล้ว');
				window.location.href='".base_url('admin_management/car_model_list/'.$id_car.'')."';
				</script>";

		}	
	}

	public function car_model_edit($id="")
	{
		$id_car = $this->uri->segment(4);
		$this->form_validation->set_rules('name_model_th', 'ชื่อรุ่นรถ (ภาษาไทย)', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('name_model_en', 'ชื่อรุ่นรถ (ภาษาอังกฤษ)', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('position_id', 'ตำแหน่งการแสดงผล', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('status_id', 'สถานะการใช้งาน', 'trim|required|xss_clean' );

		if($this->form_validation->run()==FALSE){

			$data['car_cate'] = $this->model_admin->get_data_car_cate($id);
			$data['data'] = $this->model_admin->get_data_edit_car_model($id);
			$data['data_car_year_pro'] = $this->model_admin->get_data_car_year_pro();

			$this->load->view('admin/header');
			$this->load->view('admin/car_model_edit',$data);
			$this->load->view('admin/footer');
	
		}else{

			$this->model_admin->car_model_edit($id);
			
			echo "<script>
				alert('แก้ไขข้อมูลสำเร็จ');
				window.location.href='".base_url('admin_management/car_model_list/'.$id_car.'')."';
			</script>";
		}
	}

	public function car_model_delete($id="")
	{
		$id_car = $this->uri->segment(4);
			$this->model_admin->car_model_delete($id);
			echo "<script>
				window.location.href='".base_url('admin_management/car_model_list/'.$id_car.'')."';
			</script>";
	}


	/*----------------------------/ Car model des /-----------------------------------------------*/

	public function car_model_des_list()
	{
		$id = $this->uri->segment(3);
		$data['result'] = $this->model_admin->get_data_car_model_des($id);
		$data['car_model_cate'] = $this->model_admin->get_data_car_model_cate($id);
		$data['car_check_id'] = $this->model_admin->get_data_car_check_id($id);
		$this->load->view('admin/header');
		$this->load->view('admin/car_model_des_list',$data);
		$this->load->view('admin/footer');
	}


	public function car_model_des_add()
	{
	    $this->form_validation->set_rules('name_model_des_th', 'รายละเอียดรุ่นรถ (ภาษาไทย)', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('name_model_des_en', 'รายละเอียดรุ่นรถ (ภาษาอังกฤษ)', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('name_year_pro', 'ปีที่ผลิต', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('position_id', 'ตำแหน่งการแสดงผล', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('status_id', 'สถานะการใช้งาน', 'trim|required|xss_clean' );

		if($this->form_validation->run()==FALSE){
			$id = $this->uri->segment(3);
			$data['car_model_cate'] = $this->model_admin->get_data_car_model_cate($id);
			$data['car_check_id'] = $this->model_admin->get_data_car_check_id($id);
			$data['status'] = $this->model_admin->get_tbl_status();
			$data['data_car_year_pro'] = $this->model_admin->get_data_car_year_pro();
			$this->load->view('admin/header');
			$this->load->view('admin/car_model_des_add',$data);
			$this->load->view('admin/footer');

		}else{

			$id_car_model = $this->uri->segment(3);

			$this->model_admin->car_model_des_add($id_car_model);
			 echo "<script>
				alert('เพิ่มข้อมูลเรียบร้อยแล้ว');
				window.location.href='".base_url('admin_management/car_model_des_list/'.$id_car_model.'')."';
				</script>";

		}	
	}

	public function car_model_des_edit($id="")
	{
		$id_car = $this->uri->segment(4);
		$this->form_validation->set_rules('name_model_des_th', 'รายละเอียดรุ่นรถ (ภาษาไทย)', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('name_model_des_en', 'รายละเอียดรุ่นรถ (ภาษาอังกฤษ)', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('name_year_pro', 'ปีที่ผลิต', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('position_id', 'ตำแหน่งการแสดงผล', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('status_id', 'สถานะการใช้งาน', 'trim|required|xss_clean' );

		if($this->form_validation->run()==FALSE){

			$id = $this->uri->segment(3);

			$id1 = $this->uri->segment(4);

			$data['car_check_id'] = $this->model_admin->get_data_car_check_id($id1);
			$data['car_model_cate'] = $this->model_admin->get_data_car_model_cate($id);
			$data['data'] = $this->model_admin->get_data_edit_car_model_des($id);
			$data['data_car_year_pro'] = $this->model_admin->get_data_car_year_pro();

			$this->load->view('admin/header');
			$this->load->view('admin/car_model_des_edit',$data);
			$this->load->view('admin/footer');
	
		}else{

			$this->model_admin->car_model_des_edit($id);
			
			echo "<script>
				alert('แก้ไขข้อมูลสำเร็จ');
				window.location.href='".base_url('admin_management/car_model_des_list/'.$id_car.'')."';
			</script>";
		}
	}

	public function car_model_des_delete($id="")
	{
		$id_car_model = $this->uri->segment(4);
			$this->model_admin->car_model_des_delete($id);
			echo "<script>
				window.location.href='".base_url('admin_management/car_model_des_list/'.$id_car_model.'')."';
			</script>";
	}


	/*----------------------------/ Car year /-----------------------------------------------*/

	public function car_year_list() {
		$data['result'] = $this->model_admin->get_data_car_year();
		$this->load->view('admin/header');
		$this->load->view('admin/car_year_list',$data);
		$this->load->view('admin/footer');
	}


	public function car_year_add() {

	    $this->form_validation->set_rules('name_year_min', 'ปีผลิต', 'trim|numeric|required|xss_clean' );
	    $this->form_validation->set_rules('status_id', 'สถานะการใช้งาน', 'trim|required|xss_clean' );

		if($this->form_validation->run()==FALSE){
			$data['status'] = $this->model_admin->get_tbl_status();
			$this->load->view('admin/header');
			$this->load->view('admin/car_year_add',$data);
			$this->load->view('admin/footer');
		}else{
			$this->model_admin->car_year_add();
			 echo "<script>
				alert('เพิ่มข้อมูลเรียบร้อยแล้ว');
				window.location.href='".base_url('admin_management/car_year_list/')."';
				</script>";
		}	
	}

	public function car_year_edit($id="") {

		$this->form_validation->set_rules('name_year_min', 'ปีผลิต', 'trim|numeric|required|xss_clean' );
	    $this->form_validation->set_rules('status_id', 'สถานะการใช้งาน', 'trim|required|xss_clean' );
		if($this->form_validation->run()==FALSE){
			$data['data'] = $this->model_admin->get_data_edit_car_year($id);
			$this->load->view('admin/header');
			$this->load->view('admin/car_year_edit',$data);
			$this->load->view('admin/footer');
		}else{
			$this->model_admin->car_year_edit($id);
			echo "<script>
				alert('แก้ไขข้อมูลสำเร็จ');
				window.location.href='".base_url('admin_management/car_year_list/')."';
			</script>";
		}
	}

	public function car_year_delete($id="") {
		$this->model_admin->car_year_delete($id);
		echo "<script>
			window.location.href='".base_url('admin_management/car_year_list')."';
		</script>";
	}

	/*----------------------------/ Car gear /-----------------------------------------------*/

	public function car_gear_list()
	{
		$data['result'] = $this->model_admin->get_data_car_gear();
		$this->load->view('admin/header');
		$this->load->view('admin/car_gear_list',$data);
		$this->load->view('admin/footer');
	}


	public function car_gear_add()
	{

	    $this->form_validation->set_rules('name_gear_th', 'เกียร์ (ไทย)', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('name_gear_en', 'เกียร์ (อังกฤษ)', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('position_id', 'ตำแหน่งการแสดงผล', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('status_id', 'สถานะการใช้งาน', 'trim|required|xss_clean' );

		if($this->form_validation->run()==FALSE){
			$data['status'] = $this->model_admin->get_tbl_status();
			$this->load->view('admin/header');
			$this->load->view('admin/car_gear_add',$data);
			$this->load->view('admin/footer');

		}else{

			$this->model_admin->car_gear_add();
			 echo "<script>
				alert('เพิ่มข้อมูลเรียบร้อยแล้ว');
				window.location.href='".base_url('admin_management/car_gear_list/')."';
				</script>";

		}	
	}

	public function car_gear_edit($id="")
	{

		$this->form_validation->set_rules('name_gear_th', 'เกียร์ (ภาษาไทย)', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('name_gear_en', 'เกียร์ (ภาษาอังกฤษ)', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('position_id', 'ตำแหน่งการแสดงผล', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('status_id', 'สถานะการใช้งาน', 'trim|required|xss_clean' );

		if($this->form_validation->run()==FALSE){

			$data['data'] = $this->model_admin->get_data_edit_car_gear($id);

			$this->load->view('admin/header');
			$this->load->view('admin/car_gear_edit',$data);
			$this->load->view('admin/footer');
	
		}else{

			$this->model_admin->car_gear_edit($id);
			
			echo "<script>
				alert('แก้ไขข้อมูลสำเร็จ');
				window.location.href='".base_url('admin_management/car_gear_list/')."';
			</script>";
		}
	}

	public function car_gear_delete($id="")
	{
			$this->model_admin->car_gear_delete($id);
			echo "<script>
				window.location.href='".base_url('admin_management/car_gear_list')."';
			</script>";
	}

	/*----------------------------/ Car capacity /-----------------------------------------------*/

	public function car_capacity_list()
	{
		$data['result'] = $this->model_admin->get_data_car_capacity();
		$this->load->view('admin/header');
		$this->load->view('admin/car_capacity_list',$data);
		$this->load->view('admin/footer');
	}


	public function car_capacity_add()
	{

	    $this->form_validation->set_rules('name_capacity_th', 'ความจุเครื่องยนต์ (ไทย)', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('name_capacity_en', 'ความจุเครื่องยนต์ (อังกฤษ)', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('position_id', 'ตำแหน่งการแสดงผล', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('status_id', 'สถานะการใช้งาน', 'trim|required|xss_clean' );

		if($this->form_validation->run()==FALSE){
			$data['status'] = $this->model_admin->get_tbl_status();
			$this->load->view('admin/header');
			$this->load->view('admin/car_capacity_add',$data);
			$this->load->view('admin/footer');

		}else{

			$this->model_admin->car_capacity_add();
			 echo "<script>
				alert('เพิ่มข้อมูลเรียบร้อยแล้ว');
				window.location.href='".base_url('admin_management/car_capacity_list/')."';
				</script>";

		}	
	}

	public function car_capacity_edit($id="")
	{

		$this->form_validation->set_rules('name_capacity_th', 'ความจุเครื่องยนต์ (ภาษาไทย)', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('name_capacity_en', 'ความจุเครื่องยนต์ (ภาษาอังกฤษ)', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('position_id', 'ตำแหน่งการแสดงผล', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('status_id', 'สถานะการใช้งาน', 'trim|required|xss_clean' );

		if($this->form_validation->run()==FALSE){

			$data['data'] = $this->model_admin->get_data_edit_car_capacity($id);

			$this->load->view('admin/header');
			$this->load->view('admin/car_capacity_edit',$data);
			$this->load->view('admin/footer');
	
		}else{

			$this->model_admin->car_capacity_edit($id);
			
			echo "<script>
				alert('แก้ไขข้อมูลสำเร็จ');
				window.location.href='".base_url('admin_management/car_capacity_list/')."';
			</script>";
		}
	}

	public function car_capacity_delete($id="")
	{
			$this->model_admin->car_capacity_delete($id);
			echo "<script>
				window.location.href='".base_url('admin_management/car_capacity_list')."';
			</script>";
	}

/*----------------------------/ Car mile /-----------------------------------------------*/

	public function car_mile_list()
	{
		$data['result'] = $this->model_admin->get_data_car_mile();
		$this->load->view('admin/header');
		$this->load->view('admin/car_mile_list',$data);
		$this->load->view('admin/footer');
	}


	public function car_mile_add()
	{

	    $this->form_validation->set_rules('name_mile_min', 'ไมล์เริ่มต้น', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('name_mile_max', 'ไมล์สิ้นสุด', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('position_id', 'ตำแหน่งการแสดงผล', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('status_id', 'สถานะการใช้งาน', 'trim|required|xss_clean' );

		if($this->form_validation->run()==FALSE){
			$data['status'] = $this->model_admin->get_tbl_status();
			$this->load->view('admin/header');
			$this->load->view('admin/car_mile_add',$data);
			$this->load->view('admin/footer');

		}else{

			$this->model_admin->car_mile_add();
			 echo "<script>
				alert('เพิ่มข้อมูลเรียบร้อยแล้ว');
				window.location.href='".base_url('admin_management/car_mile_list/')."';
				</script>";

		}	
	}

	public function car_mile_edit($id="")
	{

		$this->form_validation->set_rules('name_mile_min', 'ไมล์เริ่มต้น', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('name_mile_max', 'ไมล์สิ้นสุด', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('position_id', 'ตำแหน่งการแสดงผล', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('status_id', 'สถานะการใช้งาน', 'trim|required|xss_clean' );

		if($this->form_validation->run()==FALSE){

			$data['data'] = $this->model_admin->get_data_edit_car_mile($id);

			$this->load->view('admin/header');
			$this->load->view('admin/car_mile_edit',$data);
			$this->load->view('admin/footer');
	
		}else{

			$this->model_admin->car_mile_edit($id);
			
			echo "<script>
				alert('แก้ไขข้อมูลสำเร็จ');
				window.location.href='".base_url('admin_management/car_mile_list/')."';
			</script>";
		}
	}

	public function car_mile_delete($id="")
	{
			$this->model_admin->car_mile_delete($id);
			echo "<script>
				window.location.href='".base_url('admin_management/car_mile_list')."';
			</script>";
	}


/*----------------------------/ Car device /-----------------------------------------------*/

	public function car_device_list()
	{
		$data['result'] = $this->model_admin->get_data_car_device();
		$this->load->view('admin/header');
		$this->load->view('admin/car_device_list',$data);
		$this->load->view('admin/footer');
	}


	public function car_device_add()
	{

	    $this->form_validation->set_rules('device_name_th', 'อุปกรณ์ (ไทย)', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('device_name_en', 'อุปกรณ์ (อังกฤษ)', 'trim|required|xss_clean' );


		if($this->form_validation->run()==FALSE){
			$data['status'] = $this->model_admin->get_tbl_status();
			$this->load->view('admin/header');
			$this->load->view('admin/car_device_add',$data);
			$this->load->view('admin/footer');

		}else{

			$this->model_admin->car_device_add();
			 echo "<script>
				alert('เพิ่มข้อมูลเรียบร้อยแล้ว');
				window.location.href='".base_url('admin_management/car_device_list/')."';
				</script>";

		}	
	}

	public function car_device_edit($id="")
	{

		$this->form_validation->set_rules('device_name_th', 'อุปกรณ์ (ไทย)', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('device_name_en', 'อุปกรณ์ (อังกฤษ)', 'trim|required|xss_clean' );


		if($this->form_validation->run()==FALSE){

			$data['data'] = $this->model_admin->get_data_edit_car_device($id);

			$this->load->view('admin/header');
			$this->load->view('admin/car_device_edit',$data);
			$this->load->view('admin/footer');
	
		}else{

			$this->model_admin->car_device_edit($id);
			
			echo "<script>
				alert('แก้ไขข้อมูลสำเร็จ');
				window.location.href='".base_url('admin_management/car_device_list/')."';
			</script>";
		}
	}

	public function car_device_delete($id="")
	{
			$this->model_admin->car_device_delete($id);
			echo "<script>
				window.location.href='".base_url('admin_management/car_device_list')."';
			</script>";
	}



	/*----------------------------/ Car color /-----------------------------------------------*/

	public function car_color_list()
	{
		$data['result'] = $this->model_admin->get_data_car_color();
		$this->load->view('admin/header');
		$this->load->view('admin/car_color_list',$data);
		$this->load->view('admin/footer');
	}


	public function car_color_add()
	{

	    $this->form_validation->set_rules('name_color_th', 'สี (ไทย)', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('name_color_en', 'สี (อังกฤษ)', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('position_id', 'ตำแหน่งการแสดงผล', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('status_id', 'สถานะการใช้งาน', 'trim|required|xss_clean' );

		if($this->form_validation->run()==FALSE){
			$data['status'] = $this->model_admin->get_tbl_status();
			$this->load->view('admin/header');
			$this->load->view('admin/car_color_add',$data);
			$this->load->view('admin/footer');

		}else{

			$this->model_admin->car_color_add();
			 echo "<script>
				alert('เพิ่มข้อมูลเรียบร้อยแล้ว');
				window.location.href='".base_url('admin_management/car_color_list/')."';
				</script>";

		}	
	}

	public function car_color_edit($id="")
	{

		$this->form_validation->set_rules('name_color_th', 'สี (ภาษาไทย)', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('name_color_en', 'สี (ภาษาอังกฤษ)', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('position_id', 'ตำแหน่งการแสดงผล', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('status_id', 'สถานะการใช้งาน', 'trim|required|xss_clean' );

		if($this->form_validation->run()==FALSE){

			$data['data'] = $this->model_admin->get_data_edit_car_color($id);

			$this->load->view('admin/header');
			$this->load->view('admin/car_color_edit',$data);
			$this->load->view('admin/footer');
	
		}else{

			$this->model_admin->car_color_edit($id);
			
			echo "<script>
				alert('แก้ไขข้อมูลสำเร็จ');
				window.location.href='".base_url('admin_management/car_color_list/')."';
			</script>";
		}
	}

	public function car_color_delete($id="")
	{
			$this->model_admin->car_color_delete($id);
			echo "<script>
				window.location.href='".base_url('admin_management/car_color_list')."';
			</script>";
	}


	/*----------------------------/ bank /-----------------------------------------------*/

	public function bank_list()
	{
		$data['result'] = $this->model_admin->get_data_bank();
		$this->load->view('admin/header');
		$this->load->view('admin/bank_list',$data);
		$this->load->view('admin/footer');
	}


	public function bank_add()
	{

		$this->form_validation->set_rules('bank_name_th', 'ชื่อธนาคาร (ไทย)', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('bank_name_en', 'ชื่อธนาคาร (อังกฤษ)', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('four_year', 'อัตราดอกเบี้ย 4 ปี', 'trim|required|xss_clean|decimal_numeric' );
	    $this->form_validation->set_rules('five_year', 'อัตราดอกเบี้ย 5 ปี', 'trim|required|xss_clean|decimal_numeric' );
	    $this->form_validation->set_rules('six_year', 'อัตราดอกเบี้ย 6 ปี', 'trim|required|xss_clean|decimal_numeric' );
	    $this->form_validation->set_rules('seven_year', 'อัตราดอกเบี้ย 7 ปี', 'trim|required|xss_clean|decimal_numeric' );
	    $this->form_validation->set_rules('status_id', 'สถานะ', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('position_id', 'ตำแหน่ง', 'trim|required|xss_clean' );

	    
	    if($this->form_validation->run()==FALSE){

        	if($this->input->post('submit')){
	            $config['upload_path'] = './uploads/';
	            $config['file_name']  = 'bank'.'_'.date('Ymd_His');
	            $config['allowed_types'] = 'gif|jpg|png';
	            $config['max_size'] = '0'; 
	            // $config['max_width'] = '350';
	            $config['max_height']  = '0'; 

	            $this->load->library('upload', $config);

	            $this->upload->initialize($config);

	            $input_name = "userfile";

	            if ( ! $this->upload->do_upload($input_name)){
	                $error = array('error' => $this->upload->display_errors());
	                $data['status'] = $this->model_admin->get_tbl_status();
	                $this->load->view('admin/header',$error);
					$this->load->view('admin/bank_add',$data);
					$this->load->view('admin/footer');
	            }else{
	                $error = array('error' => $this->upload->display_errors());
	                $data['status'] = $this->model_admin->get_tbl_status();
	                $this->load->view('admin/header',$error);
					$this->load->view('admin/bank_add',$data);
					$this->load->view('admin/footer');
	            }
        	}else{
        		 $error = array('error' => "");
        		 $data['status'] = $this->model_admin->get_tbl_status();
        		$this->load->view('admin/header',$error);
				$this->load->view('admin/bank_add',$data);
				$this->load->view('admin/footer');
        	}


        }else{


        	$config['upload_path'] = './uploads/';
            $config['file_name']  = 'bank'.'_'.date('Ymd_His');
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '0'; 
            //$config['max_width'] = '1000';
            $config['max_height']  = '0'; 

            $this->load->library('upload', $config);

            $this->upload->initialize($config);

            $input_name = "userfile";

            if ( ! $this->upload->do_upload($input_name)){

                $error = array('error' => $this->upload->display_errors());
                $data['status'] = $this->model_admin->get_tbl_status();
                $this->load->view('admin/header',$error);
				$this->load->view('admin/bank_add',$data);
				$this->load->view('admin/footer');

            }else{

                $this->model_admin->bank_add();
			 	echo "<script>
				alert('เพิ่มข้อมูลเรียบร้อยแล้ว');
				window.location.href='".base_url('admin_management/bank_list/')."';
				</script>";
            } 
          

               
        }

		

	 //  	$this->form_validation->set_rules('bank_name_th', 'ชื่อธนาคาร (ไทย)', 'trim|required|xss_clean' );
	 //    $this->form_validation->set_rules('bank_name_en', 'ชื่อธนาคาร (อังกฤษ)', 'trim|required|xss_clean' );
	 //    $this->form_validation->set_rules('four_year', 'อัตราดอกเบี้ย 4 ปี', 'trim|required|xss_clean|decimal_numeric' );
	 //    $this->form_validation->set_rules('five_year', 'อัตราดอกเบี้ย 5 ปี', 'trim|required|xss_clean|decimal_numeric' );
	 //    $this->form_validation->set_rules('six_year', 'อัตราดอกเบี้ย 6 ปี', 'trim|required|xss_clean|decimal_numeric' );
	 //    $this->form_validation->set_rules('seven_year', 'อัตราดอกเบี้ย 7 ปี', 'trim|required|xss_clean|decimal_numeric' );
	 //    $this->form_validation->set_rules('status_id', 'สถานะ', 'trim|required|xss_clean' );
	 //    $this->form_validation->set_rules('position_id', 'ตำแหน่ง', 'trim|required|xss_clean' );


		// if($this->form_validation->run()==FALSE){
		// 	$data['status'] = $this->model_admin->get_tbl_status();
		// 	$this->load->view('admin/header');
		// 	$this->load->view('admin/bank_add',$data);
		// 	$this->load->view('admin/footer');

		// }else{

		// 	$this->model_admin->bank_add();
		// 	 echo "<script>
		// 		alert('เพิ่มข้อมูลเรียบร้อยแล้ว');
		// 		window.location.href='".base_url('admin_management/bank_list/')."';
		// 		</script>";

		// }	
	}

	public function bank_edit($id="")
	{

		$this->form_validation->set_rules('bank_name_th', 'ชื่อธนาคาร (ไทย)', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('bank_name_en', 'ชื่อธนาคาร (อังกฤษ)', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('four_year', 'อัตราดอกเบี้ย 4 ปี', 'trim|required|xss_clean|decimal_numeric' );
	    $this->form_validation->set_rules('five_year', 'อัตราดอกเบี้ย 5 ปี', 'trim|required|xss_clean|decimal_numeric' );
	    $this->form_validation->set_rules('six_year', 'อัตราดอกเบี้ย 6 ปี', 'trim|required|xss_clean|decimal_numeric' );
	    $this->form_validation->set_rules('seven_year', 'อัตราดอกเบี้ย 7 ปี', 'trim|required|xss_clean|decimal_numeric' );
	    $this->form_validation->set_rules('status_id', 'สถานะ', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('position_id', 'ตำแหน่ง', 'trim|required|xss_clean' );

	    if($this->form_validation->run()==FALSE){

				if($this->input->post('submit')){
				  $config['upload_path'] = './uploads/';
				  $config['file_name']  = 'bank'.'_'.date('Ymd_His');
				  $config['allowed_types'] = 'gif|jpg|png';
			


				  $this->load->library('upload', $config);

				  if ( ! $this->upload->do_upload()){
				   $error = array('error' => $this->upload->display_errors());
				   	$data['data'] = $this->model_admin->get_data_edit_bank($id);
					$this->load->view('admin/header',$data);
					$this->load->view('admin/bank_edit',$error);
					$this->load->view('admin/footer');
				  }else{
				     $this->model_admin->bank_edit($id);
				      echo "<script>
							alert('บันทึกข้อมูลสำเร็จ');
							window.location.href='".base_url('admin_management/bank_list/')."';
							</script>";
				   }
		  	}else{
		  		$error = array('error' => "");
		  		$data['data'] = $this->model_admin->get_data_edit_bank($id);
		  		$this->load->view('admin/header',$data);
				$this->load->view('admin/bank_edit',$error);
				$this->load->view('admin/footer');
		  	}

		}else{

		  $config['upload_path'] = './uploads/';
		  $config['file_name']  = 'bank'.'_'.date('Ymd_His');
		  $config['allowed_types'] = 'gif|jpg|png';
	

		  $this->load->library('upload', $config);

			if ($this->upload->do_upload()==1){
				if(! $this->upload->do_upload()){
					$error = array('error' => $this->upload->display_errors());
				   	$data['data'] = $this->model_admin->get_data_edit_bank($id);
					$this->load->view('admin/header',$data);
					$this->load->view('admin/bank_edit',$error);
					$this->load->view('admin/footer');
				}else{
					 $this->model_admin->bank_edit_img($id);
		      		echo "<script>
					alert('บันทึกข้อมูลสำเร็จ');
					window.location.href='".base_url('admin_management/bank_list/')."';
					</script>";
				}
		  
		  	}else{
		     $this->model_admin->bank_edit($id);
		      echo "<script>
					alert('บันทึกข้อมูลสำเร็จ');
					window.location.href='".base_url('admin_management/bank_list/')."';
					</script>";
		   	}
		}

		

		// $this->form_validation->set_rules('bank_name_th', 'ชื่อธนาคาร (ไทย)', 'trim|required|xss_clean' );
	 //    $this->form_validation->set_rules('bank_name_en', 'ชื่อธนาคาร (อังกฤษ)', 'trim|required|xss_clean' );
	 //    $this->form_validation->set_rules('four_year', 'อัตราดอกเบี้ย 4 ปี', 'trim|required|xss_clean|decimal_numeric' );
	 //    $this->form_validation->set_rules('five_year', 'อัตราดอกเบี้ย 5 ปี', 'trim|required|xss_clean|decimal_numeric' );
	 //    $this->form_validation->set_rules('six_year', 'อัตราดอกเบี้ย 6 ปี', 'trim|required|xss_clean|decimal_numeric' );
	 //    $this->form_validation->set_rules('seven_year', 'อัตราดอกเบี้ย 7 ปี', 'trim|required|xss_clean|decimal_numeric' );
	 //    $this->form_validation->set_rules('status_id', 'สถานะ', 'trim|required|xss_clean' );
	 //    $this->form_validation->set_rules('position_id', 'ตำแหน่ง', 'trim|required|xss_clean' );


		// if($this->form_validation->run()==FALSE){

		// 	$data['data'] = $this->model_admin->get_data_edit_bank($id);

		// 	$this->load->view('admin/header');
		// 	$this->load->view('admin/bank_edit',$data);
		// 	$this->load->view('admin/footer');
	
		// }else{

		// 	$this->model_admin->bank_edit($id);
			
		// 	echo "<script>
		// 		alert('แก้ไขข้อมูลสำเร็จ');
		// 		window.location.href='".base_url('admin_management/bank_list/')."';
		// 	</script>";
		// }
	}

	public function bank_delete($id="")
	{
			$this->model_admin->bank_delete($id);
			echo "<script>
				window.location.href='".base_url('admin_management/bank_list')."';
			</script>";
	}


	/////////////////////////////////bank -  upload/////////////////////////////////

    function bank_edit_image($id="",$no="",$error=""){
    	$id = $this->uri->segment(3);
    
		if($id && $no){
			$check = $this->model_admin->bank_check_id($id);
			if($check==TRUE){
				$data['id_data']=$id; 
				$data['error']=""; 
				if($error) $data['error']=$error;	
						$check_img = $this->model_admin->bank_check_img($id);
						if($check_img==TRUE){
							$dt = $this->model_admin->bank_show_image($id);
							$data['tn'] = $dt->img_name;
							$data['ex'] = $dt->ext;
							$data['id_image'] = $dt->id_image;
						}else{
							$data['tn'] = "";
							$data['ex'] = "";
							$data['id_image'] = "";
						}
						

						$data['result'] = $this->model_admin->bank_view($id);

						$data['num']=$no;
						$this->load->view('admin/header');
						$this->load->view('admin/bank_edit_image', $data);
						$this->load->view('admin/footer');
			}else{

				
				redirect('admin_management/bank_edit_image/'.$data['id_data'].'/'.$no);
			}
		}else{
			redirect('admin_management/bank_list','refresh');
		}
	}

	function bank_do_upload($id){
		$id = $this->uri->segment(3);

		if($this->input->post('upload') && $this->input->post('num')){

			$file_name[1]="";
			$file_name[2]="";
			$file_name[3]="";
			$file_name[4]="";
			$file_name[5]="";
			$file_name[6]="";

			$config['upload_path'] = './uploads/';
			$config['file_name']  = 'bank_'.$id.'_'.date('Ymd_His').'.jpg';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library("upload");
			$this->upload->initialize($config);
			$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload())
				{
					$error =  $this->upload->display_errors();
					$this->bank_edit_image($id,$this->input->post('num'), $error);
				}
				else
				{
					$data=$this->upload->data();
					$config['image_library'] = 'gd2';
					$config['source_image'] =$data['full_path'];
					$config['maintain_ratio'] = TRUE;
							
					$config['width'] = 350;

					$this->load->library('image_lib', $config); 

					$this->image_lib->resize();
					//$this->thumb($data);

					$temp = $this->model_admin->bank_edit_image($data);

					echo $temp;
					$data = array('upload_data' => $this->upload->data());
					redirect('admin_management/bank_list','refresh');

					// redirect('admin_management/news_edit_image/'.$id.'/'.$this->input->post('num'),'refresh');
				}
		}else{
				redirect('admin_management/bank_list','refresh');
			 }
		}
	


	function bank_delete_image($id="",$num="") {
		
		if($id && $num){
			$this->model_admin->bank_delete_image($id);
			redirect('admin_management/bank_list','refresh');
			// redirect('admin_management/news_edit_image/'.$id.'/'.$num,'refresh');
		}else{
			redirect('admin_management/bank_list','refresh');
		}
	}


	/*----------------------------/ Car price /-----------------------------------------------*/

	public function car_price_list()
	{
		$data['result'] = $this->model_admin->get_data_car_price();
		$this->load->view('admin/header');
		$this->load->view('admin/car_price_list',$data);
		$this->load->view('admin/footer');
	}


	public function car_price_add()
	{

	    $this->form_validation->set_rules('name_price_min', 'ราคาเริ่มต้น', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('name_price_max', 'ราคาสิ้นสุด', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('position_id', 'ตำแหน่งการแสดงผล', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('status_id', 'สถานะการใช้งาน', 'trim|required|xss_clean' );

		if($this->form_validation->run()==FALSE){
			$data['status'] = $this->model_admin->get_tbl_status();
			$this->load->view('admin/header');
			$this->load->view('admin/car_price_add',$data);
			$this->load->view('admin/footer');

		}else{

			$this->model_admin->car_price_add();
			 echo "<script>
				alert('เพิ่มข้อมูลเรียบร้อยแล้ว');
				window.location.href='".base_url('admin_management/car_price_list/')."';
				</script>";

		}	
	}

	public function car_price_edit($id="")
	{

		$this->form_validation->set_rules('name_price_min', 'ราคาเริ่มต้น', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('name_price_max', 'ราคาสิ้นสุด', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('position_id', 'ตำแหน่งการแสดงผล', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('status_id', 'สถานะการใช้งาน', 'trim|required|xss_clean' );

		if($this->form_validation->run()==FALSE){

			$data['data'] = $this->model_admin->get_data_edit_car_price($id);

			$this->load->view('admin/header');
			$this->load->view('admin/car_price_edit',$data);
			$this->load->view('admin/footer');
	
		}else{

			$this->model_admin->car_price_edit($id);
			
			echo "<script>
				alert('แก้ไขข้อมูลสำเร็จ');
				window.location.href='".base_url('admin_management/car_price_list/')."';
			</script>";
		}
	}

	public function car_price_delete($id="")
	{
			$this->model_admin->car_price_delete($id);
			echo "<script>
				window.location.href='".base_url('admin_management/car_price_list')."';
			</script>";
	}


/*----------------------------/ Car buy /-----------------------------------------------*/

	public function car_buy_list()
	{		
		$data['result'] = $this->model_admin->get_data_car_buy();
		$this->load->view('admin/header');
		$this->load->view('admin/car_buy_list',$data);
		$this->load->view('admin/footer');
	}

	public function car_buy_view($buy_car_id)
	{
		$data['rows'] = $this->model_admin->get_data_car_buy_view($buy_car_id);
		$this->load->view('admin/header');
		$this->load->view('admin/car_buy_view',$data);
		$this->load->view('admin/footer');
	}

	public function car_buy_list_save()
	{

		$this->model_admin->car_buy_list_save();
		$buy_car_id = $this->input->get('buy_car_id');
		$status = $this->input->post('status');
		$car_top_id = $this->model_admin->check_car_top_id($buy_car_id);

		$this->send_email_buy_to_buy($car_top_id,$status); //ส่งถึงผู้ขาย
		echo "<script>
			alert('บันทึกสำเร็จ');
			window.location.href='".base_url('admin_management/car_buy_list')."';
			</script>";
		
	}

	public function send_email_buy_to_buy($car_top_id="",$status="") {

		$email = $this->model_admin->check_car_to_buy($car_top_id);
		$no_car = $this->model_admin->check_car_to_buy_car($car_top_id);
		$name = $this->model_admin->check_car_to_buy_name($car_top_id);

		if($status==0){
			$check = "เปิดการขาย";
		}else{
			$check = "ปิดการขาย เนื่องจากรถของท่านได้ถูกทำการซื้อ";
		}

		
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
		$this->email->subject('ระบบแจ้งเตือนการเปลี่ยนสถานะรถที่ขาย โดยบริษัท POSTSICAR (ไทยแลนด์) จำกัด');

		$data="";
		$data.="เรียน คุณ ".$name;
		$data.="<br>";
		$data.="ทางผูู้แลระบบ ได้ทำการเปลี่ยนสถานะ ของรถหมายเลข ".$no_car." เป็น ".$check."แล้ว";
		$data.="<br>";
		$data.="กรุณาตรวจสอบ.";
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


	public function car_buy_delete($buy_car_id="")
	{
			$this->model_admin->car_buy_delete($buy_car_id);
			echo "<script>
				window.location.href='".base_url('admin_management/car_buy_list')."';
			</script>";
	}

/*----------------------------/ Car top /-----------------------------------------------*/

	public function car_top_list($car_top_id="") {
		
		$data['result'] = $this->model_admin->get_data_car_top();
		$this->load->view('admin/header');
		$this->load->view('admin/car_top_list',$data);
		$this->load->view('admin/footer');
	}

	public function car_top_add() {

		$this->form_validation->set_rules('name_type', 'ประเภทรภ', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('name', 'ยี่ห้อรถ', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('name_model', 'รุ่นรถ', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('name_year_pro', 'ปีที่ผลิต', 'trim|xss_clean' );
	    $this->form_validation->set_rules('name_model_des', 'รายละเอียดรุ่น', 'trim|xss_clean' );
	    $this->form_validation->set_rules('name_gear', 'ระบบเกียร์', 'trim|xss_clean' );
	    $this->form_validation->set_rules('name_capacity', 'ความจุเครื่องยนต์', 'trim|xss_clean' );
	    $this->form_validation->set_rules('name_mile', 'เลขไมล์', 'trim|xss_clean' );
	    $this->form_validation->set_rules('province', 'จังหวัด', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('device[]', 'อุปกรณ์', 'trim|xss_clean' );
	    $this->form_validation->set_rules('name_price', 'ราคารถ', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('name_color', 'สีรถ', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('status_id', 'สถานะการใช้งาน', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('descript', 'ข้อความผู้ประกาศขาย', 'trim|xss_clean' );

		if($this->form_validation->run()==FALSE){

			$data['result_type'] = $this->model_admin->get_data_car_type1();
			$data['result'] = $this->model_admin->get_data_car1();
			$data['result_model'] = $this->model_admin->get_data_car_model1();
			$data['result_model_des'] = $this->model_admin->get_data_car_model_des1();
			$data['result_year'] = $this->model_admin->get_data_car_year();
			$data['result_color'] = $this->model_admin->get_data_car_color();
			$data['result_gear'] = $this->model_admin->get_data_car_gear();
			$data['result_capacity'] = $this->model_admin->get_data_car_capacity();
			$data['result_mile'] = $this->model_admin->get_data_car_mile();
			$data['status'] = $this->model_admin->get_tbl_status();
			$data['province'] = $this->model_admin->get_data_province();
			$data['device'] = $this->model_admin->get_data_device();
			$data['car_year_pro_text'] = $this->model_admin->get_data_car_year_pro_text();

			$this->load->view('admin/header');
			$this->load->view('admin/car_top_add',$data);
			$this->load->view('admin/footer');
		}else{
			$this->model_admin->car_top_add();
			echo "<script>
				alert('เพิ่มข้อมูลเรียบร้อยแล้ว');
				window.location.href='".base_url('admin_management/car_top_list/')."';
				</script>";
		}

	}

	public function car_top_edit($id="") {

		$this->form_validation->set_rules('name_type', 'ประเภทรภ', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('name', 'ยี่ห้อรถ', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('name_model', 'รุ่นรถ', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('name_year_pro', 'ปีที่ผลิต', 'trim|xss_clean' );
	    $this->form_validation->set_rules('name_model_des', 'รายละเอียดรุ่น', 'trim|xss_clean' );
	    $this->form_validation->set_rules('name_gear', 'ระบบเกียร์', 'trim|xss_clean' );
	    $this->form_validation->set_rules('name_capacity', 'ความจุเครื่องยนต์', 'trim|xss_clean' );
	    $this->form_validation->set_rules('name_mile', 'เลขไมล์', 'trim|xss_clean' );
	    $this->form_validation->set_rules('province', 'จังหวัด', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('device[]', 'อุปกรณ์', 'trim|xss_clean' );
	    $this->form_validation->set_rules('name_price', 'ราคารถ', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('name_color', 'สีรถ', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('descript', 'ข้อความผู้ประกาศขาย', 'trim|xss_clean' );
	    $this->form_validation->set_rules('downpayment', 'เงินดาวน์', 'trim|xss_clean' );
	    $this->form_validation->set_rules('status_id', 'สถานะ', 'trim|required|xss_clean' );

		if($this->form_validation->run()==FALSE){

			$data['data'] = $this->model_admin->get_data_edit_car_top($id);
			$car_type_id = $this->input->get('car_type_id');
			$car_id = $this->input->get('car_id');
			$car_medel_id = $this->input->get('car_model_id');

			$data['result_type'] = $this->model_admin->get_data_car_type1();
			$data['result'] = $this->model_admin->get_data_car1();
			$data['result_model'] = $this->model_admin->get_data_car_model1();
			$data['result_model_des'] = $this->model_admin->get_data_car_model_des1();
		
			// $data['result_type'] = $this->model_admin->get_data_car_type11();
			// $data['result'] = $this->model_admin->get_data_car11($car_type_id);
			// $data['result_model'] = $this->model_admin->get_data_car_model11($car_id);
			// $data['result_model_des'] = $this->model_admin->get_data_car_model_des11($car_medel_id);

			$data['result_year'] = $this->model_admin->get_data_car_year();
			$data['result_color'] = $this->model_admin->get_data_car_color();
			$data['result_gear'] = $this->model_admin->get_data_car_gear();
			$data['result_capacity'] = $this->model_admin->get_data_car_capacity();
			$data['result_mile'] = $this->model_admin->get_data_car_mile();
			$data['status'] = $this->model_admin->get_tbl_status();
			$data['province'] = $this->model_admin->get_data_province();
			$data['device'] = $this->model_admin->get_data_device();
			$data['device_count'] = $this->model_admin->get_data_device_count();
			$data['bank'] = $this->model_admin->get_data_bank();
			$data['car_year_pro_text'] = $this->model_admin->get_data_car_year_pro_text();

			$this->load->view('admin/header');
			$this->load->view('admin/car_top_edit',$data);
			$this->load->view('admin/footer');
	
		}else{

			$this->model_admin->car_top_edit($id);
			echo "<script>
				alert('อัพเดตข้อมูล');
				window.location.href='".base_url('admin_management/car_top_list/')."';
				</script>";	
		}
	}

	public function car_top_edit_send_email($id="") {

	    $this->form_validation->set_rules('comment', 'ข้อความถึงผู้ขาย', 'trim|required|xss_clean' );

		if($this->form_validation->run()==FALSE){

			$data['data'] = $this->model_admin->get_data_edit_car_top($id);

			$car_type_id = $this->input->get('car_type_id');
			$car_id = $this->input->get('car_id');
			$car_medel_id = $this->input->get('car_model_id');

			$data['result_type'] = $this->model_admin->get_data_car_type11();
			$data['result'] = $this->model_admin->get_data_car11($car_type_id);
			$data['result_model'] = $this->model_admin->get_data_car_model11($car_id);
			$data['result_model_des'] = $this->model_admin->get_data_car_model_des11($car_medel_id);

			$data['result_year'] = $this->model_admin->get_data_car_year();
			$data['result_color'] = $this->model_admin->get_data_car_color();
			$data['result_gear'] = $this->model_admin->get_data_car_gear();
			$data['result_capacity'] = $this->model_admin->get_data_car_capacity();
			$data['result_mile'] = $this->model_admin->get_data_car_mile();
			$data['status'] = $this->model_admin->get_tbl_status();
			$data['province'] = $this->model_admin->get_data_province();
			$data['device'] = $this->model_admin->get_data_device();
			$data['device_count'] = $this->model_admin->get_data_device_count();
			$data['bank'] = $this->model_admin->get_data_bank();
			//$data['car_year_pro_text'] = $this->model_admin->get_data_car_year_pro_text();();

			$this->load->view('admin/header');
			$this->load->view('admin/car_top_edit_send_email',$data);
			$this->load->view('admin/footer');
	
		}else{

		//////////////////////////////check change status send to email//////////////////////////////////////////////////////////
			$id_login =  $this->model_admin->get_data_check_mem($id);
			if($id_login!==0){
				$status_id1 =  $this->model_admin->get_data_check_status($id);
				$status_id = $this->input->post('status_id');
				$comment = $this->input->post('comment');
				$this->send_email_change_status_sale($id,$status_id,$comment);
			}
		//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

			$this->model_admin->car_top_edit_send_email($id);
			echo "<script>
				alert('ส่งอีเมลสำเร็จ');
				window.location.href='".base_url('admin_management/car_top_list/')."';
			</script>";
		}
	}


	public function car_top_delete($id="") {
		$this->model_admin->car_top_delete($id);
		echo "<script>
			window.location.href='".base_url('admin_management/car_top_list')."';
		</script>";
	}


	public function send_email_change_status_sale($id="",$status_id="",$comment="") {

		$id_login = $this->model_admin->get_check_email_car_top($id);
		$row_member = $this->model_admin->get_data_member_email($id_login);
		$row_car = $this->model_admin->get_data_edit_car_top($id);  //ข้อมูล
	
		$this->load->library('email');
		$config['protocol'] = 'mail';

		$config['charset'] = 'utf-8';
		$config['wordwrap'] = FALSE;
		$config['mailtype'] = "html";
		$config['newline'] = '<br>';
	    $config['crlf'] = '<br>'; 
		$this->email->initialize($config);
			
		$this->email->from('contact-postsicar@postsicar.com','บริษัท POSTSICAR (ไทยแลนด์) จำกัด');
			
		$this->email->to($row_member['email']);
		$this->email->subject('ระบบแจ้งเตือนการอนุมัติการขายของคุณ '.$row_member['name'].' โดยบริษัท POSTSICAR (ไทยแลนด์) จำกัด');

		$data="";
		$data.="เรียน คุณ ".$row_member['name'];
		$data.="<br>";
		$data.='----------------------------------------';
		$data.="<br>";
		$data.="<br>";
		$data.="ข้อความจากผู้ดูแลระบบ :";
		$data.="<br>";
		$data.= $comment;
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

	/*----------------------------/ product /-----------------------------------------------*/	

	public function product_list()
	{
		$data['rows'] = $this->model_admin->get_data_product();
		$this->load->view('admin/header');
		$this->load->view('admin/product_list',$data);
		$this->load->view('admin/footer');
	}

	public function product_add()
	{

	    $this->form_validation->set_rules('title_th', 'ชื่อสินค้า (ภาษาไทย)', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('title_en', 'ชื่อสินค้า (ภาษาอังกฤษ)', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('description_th', 'รายละเอียด (ภาษาไทย)', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('description_en', 'รายละเอียด (ภาษาอังกฤษ)', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('price', 'ราคา', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('position_id', 'ลำดับการเรียง', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('position', 'ตำแหน่งการวาง', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('status_id', 'สถานะการใช้งาน', 'trim|required|xss_clean' );

		if($this->form_validation->run()==FALSE){

			$data['status'] = $this->model_admin->get_tbl_status();

			$this->load->view('admin/header');
			$this->load->view('admin/product_add',$data);
			$this->load->view('admin/footer');

		}else{

			$this->model_admin->product_add();
			 echo "<script>
				alert('เพิ่มข้อมูลเรียบร้อยแล้ว');
				window.location.href='".base_url('admin_management/product_list/')."';
				</script>";

		}	
	}

	public function product_edit($id="")
	{

		$this->form_validation->set_rules('title_th', 'ชื่อสินค้า (ภาษาไทย)', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('title_en', 'ชื่อสินค้า (ภาษาอังกฤษ)', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('description_th', 'รายละเอียด (ภาษาไทย)', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('description_en', 'รายละเอียด (ภาษาอังกฤษ)', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('price', 'ราคา', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('position_id', 'ตำแหน่งการแสดงผล', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('position', 'ตำแหน่งการวางรูป', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('status_id', 'สถานะการใช้งาน', 'trim|required|xss_clean' );

		if($this->form_validation->run()==FALSE){

			$data['data'] = $this->model_admin->get_data_edit_product($id);

			$this->load->view('admin/header');
			$this->load->view('admin/product_edit',$data);
			$this->load->view('admin/footer');
	
		}else{

			$this->model_admin->product_edit($id);
			
			echo "<script>
				alert('แก้ไขข้อมูลสำเร็จ');
				window.location.href='".base_url('admin_management/product_list')."';
			</script>";
		}
	}

	public function product_delete($id="")
	{
			$this->model_admin->product_delete($id);
			echo "<script>
				window.location.href='".base_url('admin_management/product_list')."';
			</script>";
	}

	/////////////////////////////////product -  upload/////////////////////////////////

    function product_edit_image($id="",$no="",$error=""){
    	$id = $this->uri->segment(3);
    
		if($id && $no){
			$check = $this->model_admin->product_check_id($id);
			if($check==TRUE){
				$data['id_data']=$id; 
				$data['error']=""; 
				if($error) $data['error']=$error;	
						$check_img = $this->model_admin->product_check_img($id);
						if($check_img==TRUE){
							$dt = $this->model_admin->product_show_image($id);
							$data['tn'] = $dt->thumb_name;
							$data['ex'] = $dt->ext;
							$data['id_image'] = $dt->id_image;
						}else{
							$data['tn'] = "";
							$data['ex'] = "";
							$data['id_image'] = "";
						}
						

						$data['result'] = $this->model_admin->product_view($id);

						$data['num']=$no;
						$this->load->view('admin/header');
						$this->load->view('admin/product_edit_image', $data);
						$this->load->view('admin/footer');
			}else{
				redirect('admin_management/product_list','refresh');
			}
		}else{
			redirect('admin_management/product_list','refresh');
		}
	}

	function product_do_upload($id){
		$id = $this->uri->segment(3);

		if($this->input->post('upload') && $this->input->post('num')){

			$file_name[1]="";
			$file_name[2]="";
			$file_name[3]="";
			$file_name[4]="";
			$file_name[5]="";
			$file_name[6]="";

			$config['upload_path'] = './uploads/';
			$config['file_name']  = 'PRODUCT_'.$id.'_'.date('Ymd_His').'.jpg';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library("upload");
			$this->upload->initialize($config);
			$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload())
				{
					$error =  $this->upload->display_errors();
					$this->product_edit_image($id,$this->input->post('num'), $error);
				}
				else
				{
					$data=$this->upload->data();
					$this->thumb($data);

					$temp = $this->model_admin->product_edit_image($data);

					echo $temp;
					$data = array('upload_data' => $this->upload->data());

					redirect('admin_management/product_list','refresh');
				}
		}else{
				redirect('admin_management/product_list','refresh');
			 }
		}
	


	

	function product_delete_image($id="",$num="") {
		
		if($id && $num){
			$this->model_admin->product_delete_image($id);
			redirect('admin_management/product_list','refresh');
		}else{
			redirect('admin_management/product_list','refresh');
		}
	}




	/*----------------------------/ recommend /-----------------------------------------------*/	

	public function recommend_list($id="")
	{
		$data['id'] = $id;
		$data['rows'] = $this->model_admin->get_data_recommend($id);
		$data['category'] = $this->model_admin->get_data_category($id);
		$data['recommend_category'] = $this->model_admin->get_tbl_recommend_category();
		$this->load->view('admin/header');
		$this->load->view('admin/recommend_list',$data);
		$this->load->view('admin/footer');
	}

	public function recommend_add($id="")
	{

	    $this->form_validation->set_rules('title_th', 'ชื่อสินค้า (ภาษาไทย)', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('title_en', 'ชื่อสินค้า (ภาษาอังกฤษ)', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('description_th', 'รายละเอียด (ภาษาไทย)', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('description_en', 'รายละเอียด (ภาษาอังกฤษ)', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('position_id', 'ลำดับการเรียง', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('status_id', 'สถานะการใช้งาน', 'trim|required|xss_clean' );


	    if($this->input->post('size') == "" && $this->input->post('size_m') == "" && $this->input->post('size_l') == ""){
	    	$this->form_validation->set_rules('size', 'ขนาด', 'trim|required|xss_clean' );
	    }

	    if($this->input->post('size') == "S"){
	    	$this->form_validation->set_rules('price', 'ราคา size S', 'trim|required|xss_clean' );
	    }

	    if($this->input->post('size_m') == "M"){
	    	$this->form_validation->set_rules('price_m', 'ราคา size M', 'trim|required|xss_clean' );
	    }

	     if($this->input->post('size_l') == "L"){
	    	$this->form_validation->set_rules('price_l', 'ราคา size M', 'trim|required|xss_clean' );
	    }

		if($this->form_validation->run()==FALSE){

			$data['id'] = $id;
			$data['category'] = $this->model_admin->get_data_category($id);
			$data['check_page'] = $this->model_admin->get_data_page($id);
			$data['status'] = $this->model_admin->get_tbl_status();

			$this->load->view('admin/header');
			$this->load->view('admin/recommend_add',$data);
			$this->load->view('admin/footer');

		}else{

			$this->model_admin->recommend_add();
			 echo "<script>
				alert('เพิ่มข้อมูลเรียบร้อยแล้ว');
				window.location.href='".base_url('admin_management/recommend_list/'.$id.'')."';
				</script>";

		}	
	}

	public function recommend_edit($id="",$id_cate="")
	{


	  	$this->form_validation->set_rules('title_th', 'ชื่อสินค้า (ภาษาไทย)', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('title_en', 'ชื่อสินค้า (ภาษาอังกฤษ)', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('description_th', 'รายละเอียด (ภาษาไทย)', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('description_en', 'รายละเอียด (ภาษาอังกฤษ)', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('position_id', 'ลำดับการเรียง', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('status_id', 'สถานะการใช้งาน', 'trim|required|xss_clean' );


	    if($this->input->post('size') == "NULL" && $this->input->post('size_m') == "NULL" && $this->input->post('size_l') == "NULL"){
	    	$this->form_validation->set_rules('size', 'ขนาด', 'trim|required|xss_clean' );
	    }

	    if($this->input->post('size') == "S"){
	    	$this->form_validation->set_rules('price', 'ราคา size S', 'trim|required|xss_clean' );
	    }

	    if($this->input->post('size_m') == "M"){
	    	$this->form_validation->set_rules('price_m', 'ราคา size M', 'trim|required|xss_clean' );
	    }

	     if($this->input->post('size_l') == "L"){
	    	$this->form_validation->set_rules('price_l', 'ราคา size M', 'trim|required|xss_clean' );
	    }



		if($this->form_validation->run()==FALSE){

			$data['check_page'] = $this->model_admin->get_data_page($id);
			$data['data'] = $this->model_admin->get_data_edit_recommend($id);
			$data['category'] = $this->model_admin->get_data_category($id_cate);

			$this->load->view('admin/header');
			$this->load->view('admin/recommend_edit',$data);
			$this->load->view('admin/footer');
	
		}else{

			$this->model_admin->recommend_edit($id);
			
			echo "<script>
				alert('แก้ไขข้อมูลสำเร็จ');
				window.location.href='".base_url('admin_management/recommend_list/'.$id_cate.'')."';
			</script>";
		}
	}


	

	public function recommend_submit()
	{
			if($this->input->post('recommend_category_id')==""){
				$recommend_category_id = $this->input->post('recommend_category_id1');
			}else{
				$recommend_category_id = $this->input->post('recommend_category_id');
			}
			
			    $this->model_admin->recommend_submit();
			
			    echo "<script>
			    	alert('แก้ไขข้อมูลสำเร็จ');
			    	window.location.href='".base_url('admin_management/recommend_list').'/'.$recommend_category_id."';
			    </script>";
		
	}




	public function recommend_delete($id="",$id_cate="")
	{
			$this->model_admin->recommend_delete($id);
			echo "<script>
				window.location.href='".base_url('admin_management/recommend_list/'.$id_cate)."';
			</script>";
	}


	/*----------------------------/ recommend - category /-----------------------------------------------*/	

	public function recommend_category_list()
	{
		$data['rows'] = $this->model_admin->get_data_recommend_category();
		$this->load->view('admin/header');
		$this->load->view('admin/recommend_category_list',$data);
		$this->load->view('admin/footer');
	}

	public function recommend_category_add()
	{

	    $this->form_validation->set_rules('title_cate_th', 'หัวข้อหมวดหมู่ (ภาษาไทย)', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('title_cate_en', 'หัวข้อหมวดหมู่ (ภาษาอังกฤษ)', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('position_cate_id', 'ตำแหน่ง', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('status_cate_id', 'สถานะการใช้งาน', 'trim|required|xss_clean' );

		if($this->form_validation->run()==FALSE){

			$data['status'] = $this->model_admin->get_tbl_status();
			$this->load->view('admin/header');
			$this->load->view('admin/recommend_category_add',$data);
			$this->load->view('admin/footer');

		}else{

			$this->model_admin->recommend_category_add();
			 echo "<script>
				alert('เพิ่มข้อมูลเรียบร้อยแล้ว');
				window.location.href='".base_url('admin_management/recommend_category_list/')."';
				</script>";

		}	
	}

	public function recommend_category_edit($id="")
	{

		$this->form_validation->set_rules('title_cate_th', 'หัวข้อหมวดหมู่ (ภาษาไทย)', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('title_cate_en', 'หัวข้อหมวดหมู่ (ภาษาอังกฤษ)', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('position_cate_id', 'ตำแหน่ง', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('status_cate_id', 'สถานะการใช้งาน', 'trim|required|xss_clean' );

		if($this->form_validation->run()==FALSE){
			$data['status'] = $this->model_admin->get_tbl_status();
			$data['data'] = $this->model_admin->get_data_edit_category_recommend($id);

			$this->load->view('admin/header');
			$this->load->view('admin/recommend_category_edit',$data);
			$this->load->view('admin/footer');
	
		}else{

			$this->model_admin->recommend_category_edit($id);
			
			echo "<script>
				alert('แก้ไขข้อมูลสำเร็จ');
				window.location.href='".base_url('admin_management/recommend_category_list')."';
			</script>";
		}
	}

	public function recommend_category_delete($id="")
	{
			$this->model_admin->recommend_category_delete($id);
			echo "<script>
				window.location.href='".base_url('admin_management/recommend_category_list')."';
			</script>";
	}



	/*----------------------------/ finance /-----------------------------------------------*/	

	public function finance_list()
	{
		$data['rows'] = $this->model_admin->get_data_finance();
		$this->load->view('admin/header');
		$this->load->view('admin/finance_list',$data);
		$this->load->view('admin/footer');
	}

	public function finance_add()
	{

	    $this->form_validation->set_rules('title_th', 'หัวข้อ (ภาษาไทย)', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('title_en', 'หัวข้อ(ภาษาอังกฤษ)', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('descript_th', 'คำอธิบาย (ภาษาไทย)', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('descript_en', 'คำอธิบาย (ภาษาอังกฤษ)', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('position_id', 'ตำแหน่ง', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('status_id', 'สถานะการใช้งาน', 'trim|required|xss_clean' );

		if($this->form_validation->run()==FALSE){

			$data['status'] = $this->model_admin->get_tbl_status();
			$this->load->view('admin/header');
			$this->load->view('admin/finance_add',$data);
			$this->load->view('admin/footer');

		}else{

			$this->model_admin->finance_add();
			 echo "<script>
				alert('เพิ่มข้อมูลเรียบร้อยแล้ว');
				window.location.href='".base_url('admin_management/finance_list/')."';
				</script>";

		}	
	}

	public function finance_edit($id="")
	{

		
	    $this->form_validation->set_rules('title_th', 'หัวข้อ (ภาษาไทย)', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('title_en', 'หัวข้อ(ภาษาอังกฤษ)', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('descript_th', 'คำอธิบาย (ภาษาไทย)', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('descript_en', 'คำอธิบาย (ภาษาอังกฤษ)', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('position_id', 'ตำแหน่ง', 'trim|required|xss_clean' );
	    $this->form_validation->set_rules('status_id', 'สถานะการใช้งาน', 'trim|required|xss_clean' );

		if($this->form_validation->run()==FALSE){
			$data['status'] = $this->model_admin->get_tbl_status();
			$data['data'] = $this->model_admin->get_data_edit_finance($id);

			$this->load->view('admin/header');
			$this->load->view('admin/finance_edit',$data);
			$this->load->view('admin/footer');
	
		}else{

			$this->model_admin->finance_edit($id);
			
			echo "<script>
				alert('แก้ไขข้อมูลสำเร็จ');
				window.location.href='".base_url('admin_management/finance_list')."';
			</script>";
		}
	}

	public function finance_delete($id="")
	{
			$this->model_admin->finance_delete($id);
			echo "<script>
				window.location.href='".base_url('admin_management/finance_list')."';
			</script>";
	}



	/////////////////////////////////recommend -  upload/////////////////////////////////

    function recommend_edit_image($id="",$no="",$error="",$id_cate=""){
    	$id = $this->uri->segment(3);
    	$id_cate = $this->uri->segment(5);
    	
    
		if($id && $no){
			$check = $this->model_admin->recommend_check_id($id);
			if($check==TRUE){
				$data['id_data']=$id; 
				$data['error']=""; 
				if($error) $data['error']=$error;	
						$check_img = $this->model_admin->recommend_check_img($id);
						if($check_img==TRUE){
							$dt = $this->model_admin->recommend_show_image($id);
							$data['tn'] = $dt->thumb_name;
							$data['ex'] = $dt->ext;
							$data['id_image'] = $dt->id_image;
						}else{
							$data['tn'] = "";
							$data['ex'] = "";
							$data['id_image'] = "";
						}
						
						$data['category'] = $this->model_admin->get_data_category($id_cate);

						$data['result'] = $this->model_admin->recommend_view($id);

						$data['num']=$no;
						$this->load->view('admin/header');
						$this->load->view('admin/recommend_edit_image', $data);
						$this->load->view('admin/footer');
			}else{

				
				redirect('admin_management/recommend_list/'.$id_cate.'','refresh');
			}
		}else{
			redirect('admin_management/recommend_list/'.$id_cate.'','refresh');
		}
	}

	function recommend_do_upload($id){
		$id = $this->uri->segment(3);
		$id_cate = $this->uri->segment(5);

		if($this->input->post('upload') && $this->input->post('num')){

			$file_name[1]="";
			$file_name[2]="";
			$file_name[3]="";
			$file_name[4]="";
			$file_name[5]="";
			$file_name[6]="";

			$config['upload_path'] = './uploads/';
			$config['file_name']  = 'RECOM_'.$id.'_'.date('Ymd_His').'.jpg';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library("upload");
			$this->upload->initialize($config);
			$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload())
				{
					$error =  $this->upload->display_errors();
					$this->recommend_edit_image($id,$this->input->post('num'), $error);
				}
				else
				{
					$data=$this->upload->data();
					$this->thumb($data);

					$temp = $this->model_admin->recommend_edit_image($data);

					echo $temp;
					$data = array('upload_data' => $this->upload->data());

					redirect('admin_management/recommend_list/'.$id_cate.'','refresh');
				}
		}else{
				redirect('admin_management/recommend_list/'.$id_cate.'','refresh');
			 }
		}
	


	

	function recommend_delete_image($id="",$num="",$id_cate="") {
		$id_cate = $this->uri->segment(5);
		if($id && $num){
			$this->model_admin->recommend_delete_image($id);
			redirect('admin_management/recommend_list/'.$id_cate.'','refresh');
		}else{
			redirect('admin_management/recommend_list/'.$id_cate.'','refresh');
		}
	}






	

}
