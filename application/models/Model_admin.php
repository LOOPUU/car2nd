<?php
if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );
	class Model_admin extends CI_Model {

		public function __construct() {
			parent::__construct ();
			$this->load->library( 'session' );
			
	}

	function get_data_car_count() {
		$query = $this->db->query ( 'select count(status_id) as count_member   from tbl_car_top where status_id = 0 AND check_sale_complete ="complete" AND status_delete = 0 ' );
		$row = $query->row ();
		if(!empty($row->count_member)){
			$count_member = $row->count_member;
		}else{
			$count_member = 0;
		}
		return $count_member;
	}

	function get_data_car_count_buy() {
		$query = $this->db->query ( 'select sum(check_count_comment) as check_count_comment   from tbl_buy_car where check_count_comment = 1' );
		$row = $query->row ();
		if(!empty($row->check_count_comment)){
			$check_count_comment = $row->check_count_comment;
		}else{
			$check_count_comment = 0;
		}
		return $check_count_comment;
	}

	function get_data_car_count_contact() {
		$query = $this->db->query ( 'select sum(check_count_comment) as check_count_comment_contact   from tbl_suggestion where check_count_comment = 1' );
		$row = $query->row ();
		if(!empty($row->check_count_comment_contact)){
			$check_count_comment_contact = $row->check_count_comment_contact;
		}else{
			$check_count_comment_contact = 0;
		}	
		return $check_count_comment_contact;
	}

	function check_car_top_id($buy_car_id="") {
		$query = $this->db->query ( 'select car_top_id from tbl_buy_car where buy_car_id = '.$buy_car_id.'' );
		$row = $query->row ();
		$car_top_id = $row->car_top_id;
		return $car_top_id;
	}

	function get_data_car_year_min() {
		$query = $this->db->query ( 'select min(name_year_min) as name_min  from tbl_car_year where status_id = 1 order by position_id asc' );
		$row = $query->row ();
		$name_min = $row->name_min;
		return $name_min;
	}

	function get_data_car_year_max() {
		$query = $this->db->query ( 'select max(name_year_max) as name_max  from tbl_car_year where status_id = 1 order by position_id asc' );
		$row = $query->row ();
		$name_max = $row->name_max;
		return $name_max;
	}

	function change_read($suggestion_id=""){
		$data_update = array (
			'check_count_comment' =>  0
		);
		$this->db->where('suggestion_id',  $suggestion_id);
		$this->db->update ( 'tbl_suggestion', $data_update );	
	}

/*----------------/ login-logout /---------------------------*/

	function login($user, $pass) {
		$this->db->where ( "user", $user );
		$this->db->where ( "password", $pass);
		$query = $this->db->get ( "tbl_login_admin" );
			if ($query->num_rows () > 0) {
				foreach ( $query->result () as $rows ) {
					$newdata = array (
						'admin_id_ikko' => $rows->id,
						'admin_name_ikko' => $rows->user,
						'admin_log_ikko' => TRUE,
						'setting_edit' => $rows->setting_edit,
						'menu_list' => $rows->menu_list,
						'banner_multi' => $rows->banner_multi,
						'about_edit' => $rows->about_edit,
						'news_list' => $rows->news_list,
						'adv_list' => $rows->adv_list,
						'contact_edit' => $rows->contact_edit,
						'member_list' => $rows->member_list,
						'car_top_list' => $rows->car_top_list,
						'car_buy_list' => $rows->car_buy_list,
						'car_type_list' => $rows->car_type_list,
						'car_price_list' => $rows->car_price_list,
						'car_year_list' => $rows->car_year_list,
						'car_color_list' => $rows->car_color_list,
						'car_gear_list' => $rows->car_gear_list,
						'car_capacity_list' => $rows->car_capacity_list,
						'car_mile_list' => $rows->car_mile_list,
						'car_device_list' => $rows->car_device_list,
						'finance_list' => $rows->finance_list,
						'bank_list' => $rows->bank_list
					);
				}
				$this->session->set_userdata ( $newdata );
				return true;
			}
		return false;
	}
		
	function logout(){
			
		$this->session->unset_userdata('admin_id_ikko');
		$this->session->unset_userdata('admin_name_ikko');
		$this->session->unset_userdata('admin_log_ikko');
		$this->session->unset_userdata('setting_edit');
		$this->session->unset_userdata('menu_list');
		$this->session->unset_userdata('banner_multi');
		$this->session->unset_userdata('about_edit');
		$this->session->unset_userdata('news_list');
		$this->session->unset_userdata('adv_list');
		$this->session->unset_userdata('contact_edit');
		$this->session->unset_userdata('member_list');
		$this->session->unset_userdata('car_top_list');
		$this->session->unset_userdata('car_buy_list');
		$this->session->unset_userdata('car_type_list');
		$this->session->unset_userdata('car_price_list');
		$this->session->unset_userdata('car_year_list');
		$this->session->unset_userdata('car_color_list');
		$this->session->unset_userdata('car_gear_list');
		$this->session->unset_userdata('car_capacity_list');
		$this->session->unset_userdata('car_mile_list');
		$this->session->unset_userdata('car_device_list');
		$this->session->unset_userdata('finance_list');
		$this->session->unset_userdata('bank_list');

	}


/*----------------/ magement - menu /---------------------------*/

		function menu_add() {
			 $name_th = $this->input->post('name_th');
			 $name_en = $this->input->post('name_en');
			 $position_id = $this->input->post('position_id');
			 $status_id = $this->input->post('status_id');
			 $data = array(
            	'name_th' => $name_th,
            	'name_en' => $name_en,
            	'position_id' => $position_id,
            	'status_id' => $status_id
            );
			 $this->db->insert('tbl_menu', $data);
		}

		function menu_edit($id) {
			$data_update = array (
				'name_th' =>  $this->input->post('name_th'),
				'name_en' =>  $this->input->post('name_en'),
				'position_id' =>  $this->input->post('position_id'),
				'status_id' =>  $this->input->post('status_id')
			);
			$this->db->where('menu_id',  $id);
			$this->db->update ( 'tbl_menu', $data_update );	
		}

		function menu_delete($id) {
			$this->db->where('menu_id',$id);
			$this->db->delete('tbl_menu');
		}

/*----------------/ magement - member /---------------------------*/

		function member_add() {
			 $name = $this->input->post('name');
			 $email = $this->input->post('email');
			 $tel = $this->input->post('tel');
			 $password = md5($this->input->post('password'));
			 $created_date = date('Y-m-d h:i:s');
			 $email_confirm = 1;
			 $data = array(
            	'name' => $name,
            	'email' => $email,
            	'tel' => $tel,
            	'password' => $password,
            	'created_date' => $created_date,
            	'email_confirm' => $email_confirm
            );
			 $this->db->insert('tbl_login_member', $data);
		}

		function member_edit($id) {
			$data_update = array (
				'name' =>  $this->input->post('name'),
				'email' =>  $this->input->post('email'),
				'tel' =>  $this->input->post('tel'),
				'email_confirm' =>  $this->input->post('email_confirm'),
				'modify_date' =>  date('Y-m-d h:i:s')
			);
			$this->db->where('id',  $id);
			$this->db->update ( 'tbl_login_member', $data_update );	
		}

		function member_delete($id){
			$this->db->where('id',$id);
			$this->db->delete('tbl_login_member');
		}

		function change_password_member($id){
			$data_update = array (
				'password' =>  md5($this->input->post('password'))
			);
			$this->db->where('id',  $id);
			$this->db->update ( 'tbl_login_member', $data_update );	
		}
/*----------------/ magement - car /---------------------------*/

		function car_add(){
			 $name_th = $this->input->post('name_th');
			 $name_en = $this->input->post('name_en');
			 $position_id = $this->input->post('position_id');
			 $status_id = $this->input->post('status_id');
			 $car_type_id = $this->input->post('car_type_id');
			 $data = array(
            	'name_th' => $name_th,
            	'name_en' => $name_en,
            	'position_id' => $position_id,
            	'status_id' => $status_id,
            	'car_type_id' => $car_type_id
            );
			 $this->db->insert('tbl_car', $data);
		}

		function car_edit($id){
			$data_update = array (
				'name_th' =>  $this->input->post('name_th'),
				'name_en' =>  $this->input->post('name_en'),
				'position_id' =>  $this->input->post('position_id'),
				'status_id' =>  $this->input->post('status_id')
			);
			$this->db->where('car_id',  $id);
			$this->db->update ( 'tbl_car', $data_update );	
		}

		function car_delete($id){
			$query3 = $this->db->query ( 'SELECT tbl_car.car_id,tbl_car_model.car_id,tbl_car_model_des.car_model_id 
				FROM tbl_car 
				LEFT JOIN tbl_car_model ON tbl_car_model.car_id = tbl_car.car_id
				LEFT JOIN tbl_car_model_des ON tbl_car_model_des.car_model_id = tbl_car_model.car_model_id
				WHERE  tbl_car.car_id = '.$id.'' );
			$row3 = $query3->row();

			$this->db->where('car_model_id',$row3->car_model_id);
			$this->db->delete('tbl_car_model_des');

			$this->db->where('car_id',$row3->car_id);
			$this->db->delete('tbl_car_model');
			
			$this->db->where('car_id',$id);
			$this->db->delete('tbl_car');

		}

/*----------------/ magement - car type /-------------- -------------*/

		function car_type_add(){
			 $name_type_th = $this->input->post('name_type_th');
			 $name_type_en = $this->input->post('name_type_en');
			 $position_id = $this->input->post('position_id');
			 $status_id = $this->input->post('status_id');
			 $data = array(
            	'name_type_th' => $name_type_th,
            	'name_type_en' => $name_type_en,
            	'position_id' => $position_id,
            	'status_id' => $status_id
            );
			 $this->db->insert('tbl_car_type', $data);
		}

		function car_type_edit($id){
			$data_update = array (
				'name_type_th' =>  $this->input->post('name_type_th'),
				'name_type_en' =>  $this->input->post('name_type_en'),
				'position_id' =>  $this->input->post('position_id'),
				'status_id' =>  $this->input->post('status_id')
			);
			$this->db->where('car_type_id',  $id);
			$this->db->update ( 'tbl_car_type', $data_update );	
		}

		function car_type_delete($id){
			$query3 = $this->db->query ( 'SELECT tbl_car_type.car_type_id,tbl_car_model.car_id,tbl_car_model_des.car_model_id 
				FROM tbl_car_type 
				LEFT JOIN tbl_car ON tbl_car.car_type_id = tbl_car_type.car_type_id
				LEFT JOIN tbl_car_model ON tbl_car_model.car_id = tbl_car.car_id
				LEFT JOIN tbl_car_model_des ON tbl_car_model_des.car_model_id = tbl_car_model.car_model_id
				WHERE  tbl_car_type.car_type_id = '.$id.'' );
			$row3 = $query3->row();

			$this->db->where('car_model_id',$row3->car_model_id);
			$this->db->delete('tbl_car_model_des');

			$this->db->where('car_id',$row3->car_id);
			$this->db->delete('tbl_car_model');
			
			$this->db->where('car_type_id',$id);
			$this->db->delete('tbl_car');

			$this->db->where('car_type_id',$id);
			$this->db->delete('tbl_car_type');
		}


/*----------------/ magement - car model /-------------- -------------*/

		function car_model_add($id_car=""){
			 $name_model_th = $this->input->post('name_model_th');
			 $name_model_en = $this->input->post('name_model_en');
			 $position_id = $this->input->post('position_id');
			 $status_id = $this->input->post('status_id');
			 $car_id = $id_car;
			 $data = array(
            	'name_model_th' => $name_model_th,
            	'name_model_en' => $name_model_en,
            	'position_id' => $position_id,
            	'status_id' => $status_id,
            	'car_id' => $car_id
            );
			 $this->db->insert('tbl_car_model', $data);
		}

		function car_model_edit($id){
			$data_update = array (
				'name_model_th' =>  $this->input->post('name_model_th'),
				'name_model_en' =>  $this->input->post('name_model_en'),
				'position_id' =>  $this->input->post('position_id'),
				'status_id' =>  $this->input->post('status_id')
			);
			$this->db->where('car_model_id',  $id);
			$this->db->update ( 'tbl_car_model', $data_update );	
		}

		function car_model_delete($id){

			$this->db->where('car_model_id',$id);
			$this->db->delete('tbl_car_model');

			$this->db->where('car_model_id',$id);
			$this->db->delete('tbl_car_model_des');

		}
/*----------------/ magement - car model des /-------------- -------------*/

		function car_model_des_add($car_model_id=""){
			 $name_model_des_th = $this->input->post('name_model_des_th');
			 $name_model_des_en = $this->input->post('name_model_des_en');
			 $name_year_pro = $this->input->post('name_year_pro');
			 $position_id = $this->input->post('position_id');
			 $status_id = $this->input->post('status_id');
			 $car_model_id =  $this->input->post('car_model_id');
			 $data = array(
            	'name_model_des_th' => $name_model_des_th,
            	'name_model_des_en' => $name_model_des_en,
            	'name_year_pro' => $name_year_pro,
            	'position_id' => $position_id,
            	'status_id' => $status_id,
            	'car_model_id' => $car_model_id
            );
			 $this->db->insert('tbl_car_model_des', $data);
		}

		function car_model_des_edit($id){
			$data_update = array (
				'name_model_des_th' =>  $this->input->post('name_model_des_th'),
				'name_model_des_en' =>  $this->input->post('name_model_des_en'),
				'name_year_pro' =>  $this->input->post('name_year_pro'),
				'position_id' =>  $this->input->post('position_id'),
				'status_id' =>  $this->input->post('status_id')
			);
			$this->db->where('car_model_des_id',  $id);
			$this->db->update ( 'tbl_car_model_des', $data_update );	
		}

		function car_model_des_delete($id){
			$this->db->where('car_model_des_id',$id);
			$this->db->delete('tbl_car_model_des');
		}
/*----------------/ magement - car year /---------------------------*/

		function car_year_add() {
			 $name_year_min = $this->input->post('name_year_min');
			 $status_id = $this->input->post('status_id');
			 $data = array(
            	'name_year_min' => $name_year_min,
            	'status_id' => $status_id
            );
			 $this->db->insert('tbl_car_year', $data);
		}

		function car_year_edit($id) {
			$data_update = array (
				'name_year_min' =>  $this->input->post('name_year_min'),
				'status_id' =>  $this->input->post('status_id')
			);
			$this->db->where('car_year_id',  $id);
			$this->db->update ( 'tbl_car_year', $data_update );	
		}

		function car_year_delete($id){
			$this->db->where('car_year_id',$id);
			$this->db->delete('tbl_car_year');
		}
/*----------------/ magement - car gear /---------------------------*/

		function car_gear_add(){
			 $name_gear_th = $this->input->post('name_gear_th');
			 $name_gear_en = $this->input->post('name_gear_en');
			 $position_id = $this->input->post('position_id');
			 $status_id = $this->input->post('status_id');
			 $data = array(
            	'name_gear_th' => $name_gear_th,
            	'name_gear_en' => $name_gear_en,
            	'position_id' => $position_id,
            	'status_id' => $status_id
            );
			 $this->db->insert('tbl_car_gear', $data);
		}

		function car_gear_edit($id){
			$data_update = array (
				'name_gear_th' =>  $this->input->post('name_gear_th'),
				'name_gear_en' =>  $this->input->post('name_gear_en'),
				'position_id' =>  $this->input->post('position_id'),
				'status_id' =>  $this->input->post('status_id')
			);
			$this->db->where('car_gear_id',  $id);
			$this->db->update ( 'tbl_car_gear', $data_update );	
		}

		function car_gear_delete($id){
			$this->db->where('car_gear_id',$id);
			$this->db->delete('tbl_car_gear');
		}

/*----------------/ magement - car capacity /---------------------------*/

		function car_capacity_add(){
			 $name_capacity_th = $this->input->post('name_capacity_th');
			 $name_capacity_en = $this->input->post('name_capacity_en');
			 $position_id = $this->input->post('position_id');
			 $status_id = $this->input->post('status_id');
			 $data = array(
            	'name_capacity_th' => $name_capacity_th,
            	'name_capacity_en' => $name_capacity_en,
            	'position_id' => $position_id,
            	'status_id' => $status_id
            );
			 $this->db->insert('tbl_car_capacity', $data);
		}

		function car_capacity_edit($id){
			$data_update = array (
				'name_capacity_th' =>  $this->input->post('name_capacity_th'),
				'name_capacity_en' =>  $this->input->post('name_capacity_en'),
				'position_id' =>  $this->input->post('position_id'),
				'status_id' =>  $this->input->post('status_id')
			);
			$this->db->where('car_capacity_id',  $id);
			$this->db->update ( 'tbl_car_capacity', $data_update );	
		}

		function car_capacity_delete($id){
			$this->db->where('car_capacity_id',$id);
			$this->db->delete('tbl_car_capacity');
		}

/*----------------/ magement - car mile /---------------------------*/

		function car_mile_add(){
			 $name_mile_min = $this->input->post('name_mile_min');
			 $name_mile_max = $this->input->post('name_mile_max');
			 $position_id = $this->input->post('position_id');
			 $status_id = $this->input->post('status_id');
			 $data = array(
            	'name_mile_min' => $name_mile_min,
            	'name_mile_max' => $name_mile_max,
            	'position_id' => $position_id,
            	'status_id' => $status_id
            );
			 $this->db->insert('tbl_car_mile', $data);
		}

		function car_mile_edit($id){
			$data_update = array (
				'name_mile_min' =>  $this->input->post('name_mile_min'),
				'name_mile_max' =>  $this->input->post('name_mile_max'),
				'position_id' =>  $this->input->post('position_id'),
				'status_id' =>  $this->input->post('status_id')
			);
			$this->db->where('car_mile_id',  $id);
			$this->db->update ( 'tbl_car_mile', $data_update );	
		}

		function car_mile_delete($id){
			$this->db->where('car_mile_id',$id);
			$this->db->delete('tbl_car_mile');
		}

/*----------------/ magement - car color /-------------- -------------*/

		function car_color_add(){
			 $name_color_th = $this->input->post('name_color_th');
			 $name_color_en = $this->input->post('name_color_en');
			 $position_id = $this->input->post('position_id');
			 $status_id = $this->input->post('status_id');
			 $data = array(
            	'name_color_th' => $name_color_th,
            	'name_color_en' => $name_color_en,
            	'position_id' => $position_id,
            	'status_id' => $status_id
            );
			 $this->db->insert('tbl_car_color', $data);
		}

		function car_color_edit($id){
			$data_update = array (
				'name_color_th' =>  $this->input->post('name_color_th'),
				'name_color_en' =>  $this->input->post('name_color_en'),
				'position_id' =>  $this->input->post('position_id'),
				'status_id' =>  $this->input->post('status_id')
			);
			$this->db->where('car_color_id',  $id);
			$this->db->update ( 'tbl_car_color', $data_update );	
		}

		function car_color_delete($id){
			$this->db->where('car_color_id',$id);
			$this->db->delete('tbl_car_color');
		}
/*----------------/ magement - car device /-------------- -------------*/

		function car_device_add(){
			 $device_name_th = str_replace(",","/",$this->input->post('device_name_th'));
			 $device_name_en = str_replace(",","/",$this->input->post('device_name_en'));

			 $device_name_th1 = str_replace("/"," - ",$device_name_th);
			 $device_name_en1 = str_replace("/"," - ",$device_name_en);
			
			 $data = array(
            	'device_name_th' => $device_name_th1,
            	'device_name_en' => $device_name_en1
            	
            );
			 $this->db->insert('tbl_device', $data);
		}

		function car_device_edit($id){
			$data_update = array (
				'device_name_th' =>  str_replace("/"," - ",$this->input->post('device_name_th')),
				'device_name_en' =>  str_replace("/"," - ",$this->input->post('device_name_en'))
			);
			$this->db->where('device_id',  $id);
			$this->db->update ( 'tbl_device', $data_update );	
		}

		function car_device_delete($id){
			$this->db->where('device_id',$id);
			$this->db->delete('tbl_device');
		}


/*----------------/ magement - car price /-------------- -------------*/

		function car_price_add(){
			 $name_price_min = $this->input->post('name_price_min');
			 $name_price_max = $this->input->post('name_price_max');
			 $position_id = $this->input->post('position_id');
			 $status_id = $this->input->post('status_id');
			 $data = array(
            	'name_price_min' => $name_price_min,
            	'name_price_max' => $name_price_max,
            	'position_id' => $position_id,
            	'status_id' => $status_id
            );
			 $this->db->insert('tbl_car_price', $data);
		}

		function car_price_edit($id){
			$data_update = array (
				'name_price_min' =>  $this->input->post('name_price_min'),
				'name_price_max' =>  $this->input->post('name_price_max'),
				'position_id' =>  $this->input->post('position_id'),
				'status_id' =>  $this->input->post('status_id')
			);
			$this->db->where('car_price_id',  $id);
			$this->db->update ( 'tbl_car_price', $data_update );	
		}

		function car_price_delete($id){
			$this->db->where('car_price_id',$id);
			$this->db->delete('tbl_car_price');
		}

/*----------------/ magement - bank /-------------- -------------*/

		function bank_add(){

			 $image_info = $this->upload->data();
			 $bank_name_th = $this->input->post('bank_name_th');
			 $bank_name_en = $this->input->post('bank_name_en');
			 $four_year = $this->input->post('four_year');
			 $five_year = $this->input->post('five_year');
			 $six_year = $this->input->post('six_year');
			 $seven_year = $this->input->post('seven_year');
			 $position_id = $this->input->post('position_id');
			 $status_id = $this->input->post('status_id');
			 $create_date = date('Y-m-d h:i:s');

			 $data = array(
			 	'img' => $image_info['file_name'],
            	'bank_name_th' => $bank_name_th,
            	'bank_name_en' => $bank_name_en,
            	'four_year' => $four_year,
            	'five_year' => $five_year,
            	'six_year' => $six_year,
            	'seven_year' => $seven_year,
            	'position_id' => $position_id,
            	'status_id' => $status_id,
            	'create_date' => $create_date
            );
			 $this->db->insert('tbl_bank', $data);
		}

		function bank_edit($id){
			$image_info = $this->upload->data();
			$data_update = array (
				'bank_name_th' =>  $this->input->post('bank_name_th'),
				'bank_name_en' =>  $this->input->post('bank_name_en'),
				'four_year' =>  $this->input->post('four_year'),
				'five_year' =>  $this->input->post('five_year'),
				'six_year' =>  $this->input->post('six_year'),
				'seven_year' =>  $this->input->post('seven_year'),
				'position_id' =>  $this->input->post('position_id'),
				'status_id' =>  $this->input->post('status_id'),
				'modify_date' =>  date('Y-m-d h:i:s')
				
			);
			$this->db->where('bank_id',  $id);
			$this->db->update ( 'tbl_bank', $data_update );	
		}

		function bank_edit_img($id=""){
			
			$slide_query_db = $this->db->query ( "SELECT * FROM tbl_bank WHERE bank_id = ".$id."" );
	        $slide_query = $slide_query_db->row ();
	        $path_to_file = './uploads/'.$slide_query->img;
			if(@unlink($path_to_file)) {
	        }

			$image_info = $this->upload->data();

			$data_update = array (
			'bank_name_th' =>  $this->input->post('bank_name_th'),
			'bank_name_en' =>  $this->input->post('bank_name_en'),
			'four_year' =>  $this->input->post('four_year'),
			'five_year' =>  $this->input->post('five_year'),
			'six_year' =>  $this->input->post('six_year'),
			'seven_year' =>  $this->input->post('seven_year'),
			'position_id' =>  $this->input->post('position_id'),
			'status_id' =>  $this->input->post('status_id'),
			'modify_date' =>  date('Y-m-d h:i:s'),
			'img' => $image_info['file_name']
			);
			$this->db->where('bank_id',  $id);
			$this->db->update ( 'tbl_bank', $data_update );	
				
		}


		function bank_delete($id){

			$slide_query_db = $this->db->query ( "SELECT * FROM tbl_bank WHERE bank_id = ".$id."" );
	        $slide_query = $slide_query_db->row ();
	        $path_to_file = './uploads/'.$slide_query->img;
			if(@unlink($path_to_file)) {}
			$this->db->where('bank_id',$id);
			$this->db->delete('tbl_bank');

		}

/*----------------/ magement - car top /-------------- -------------*/

		function car_top_add(){

			if(!empty($this->input->post('name_type'))){
				$query = $this->db->query ( 'select * from tbl_car_type where car_type_id = '.$this->input->post('name_type').'' );
				$row = $query->row();
			}

			if(!empty($this->input->post('name'))){
				$query1 = $this->db->query ( 'select * from tbl_car where car_id = '.$this->input->post('name').'' );
				$row1 = $query1->row();
			}

			if(!empty($this->input->post('name_model'))){
				$query2 = $this->db->query ( 'select * from tbl_car_model where car_model_id = '.$this->input->post('name_model').'' );
				$row2 = $query2->row();
			}

			if(!empty($this->input->post('name_model_des'))){
				$query3 = $this->db->query ( 'select * from tbl_car_model_des where car_model_des_id = '.$this->input->post('name_model_des').'' );
				$row3 = $query3->row();
				$ro = $row3->name_model_des_th;
			}else{
				$ro = "-";
			}

			if(empty($this->input->post('device'))){
				$device1 = "";
			}else{
				$device1 = implode( ',' , $this->input->post('device'));
			}

			 $random =  'PSC-'.str_pad(rand(0,999), 5, "0", STR_PAD_LEFT);
			 $car_type_id = $this->input->post('name_type');
			 $car_id = $this->input->post('name');
			 $car_model_id = $this->input->post('name_model');
			 $car_model_des_id = $this->input->post('name_model_des');
			 $name_type = $row->name_type_th;
			 $name = $row1->name_th;
			 $name_model = $row2->name_model_th;
			 $name_model_des = $ro;
			 $name_year_pro = $this->input->post('name_year_pro');
			 $name_gear = $this->input->post('name_gear');
			 $name_capacity = $this->input->post('name_capacity');
			 $name_mile = $this->input->post('name_mile');
			 $province = $this->input->post('province');
			 $device = $device1;
			 $name_price = $this->input->post('name_price');
			 $name_color = $this->input->post('name_color');
			 $status_id = $this->input->post('status_id');
			 $check_sale_complete = "complete";
			 $lang = "th";
			 $created_date = date('Y-m-d h:i:s');
			 $status_car_show =  0;
			 $descript = $this->input->post('descript');


			 $data = array(
			 	'no_car' => $random,
			 	'car_type_id' => $car_type_id,
			 	'car_type_id' => $car_type_id,
			 	'car_id' => $car_id,
			 	'car_model_id' => $car_model_id,
			 	'car_model_des_id' => $car_model_des_id,
            	'name' => $name,
            	'name_type' => $name_type,
            	'name_model' => $name_model,
            	'name_model_des' => $name_model_des,
            	'name_year_pro' => $name_year_pro,
            	'name_gear' => $name_gear,
            	'name_capacity' => $name_capacity,
            	'name_mile' => $name_mile,
            	'province' => $province,
            	'device' => $device,
            	'name_price' => $name_price,
            	'name_color' => $name_color,
            	'status_id' => $status_id,
            	'check_sale_complete' => $check_sale_complete,
            	'lang' => $lang,
            	'created_date' => $created_date,
            	'status_car_show' => $status_car_show,
            	'descript' => $descript
            );
			 $this->db->insert('tbl_car_top', $data);
		}

			function car_top_edit_send_email($id){

			
			
			$data_update = array (
				'status_id' =>  $this->input->post('status_id'),
				'comment' =>  $this->input->post('comment')
			);
			$this->db->where('car_top_id',  $id);
			$this->db->update ( 'tbl_car_top', $data_update );	

			if($this->input->post('status_id')==1){
				$status = 0;
			}else{
				$status = 1;
			}

			$data_update1 = array (
				'status' =>  $status
				
			);
			$this->db->where('car_top_id',  $id);
			$this->db->update ( 'tbl_buy_car', $data_update1 );	

		}

		function car_top_edit($id){

			if(empty($this->input->post('device'))){
				$device1 = "";
			}else{
				$device1 = implode( ',' , $this->input->post('device'));
			}


			if(empty($this->input->post('bank'))){
				$bank1 = "";
			}else{
				$bank1 = implode( ',' , $this->input->post('bank'));
			}

			if(!empty($this->input->post('name_type'))){
				$query = $this->db->query ( 'select * from tbl_car_type where car_type_id = '.$this->input->post('name_type').'' );
				$row = $query->row();
			}

			if(!empty($this->input->post('name'))){
				$query1 = $this->db->query ( 'select * from tbl_car where car_id = '.$this->input->post('name').'' );
				$row1 = $query1->row();
			}

			if(!empty($this->input->post('name_model'))){
				$query2 = $this->db->query ( 'select * from tbl_car_model where car_model_id = '.$this->input->post('name_model').'' );
				$row2 = $query2->row();
			}

			if(!empty($this->input->post('name_model_des'))){
				$query3 = $this->db->query ( 'select * from tbl_car_model_des where car_model_des_id = '.$this->input->post('name_model_des').'' );
				$row3 = $query3->row();
				$ro = $row3->name_model_des_th;
			}else{
				$ro = "-";
			}


			
			$data_update = array (
				'car_type_id' =>  $this->input->post('name_type'),
				'car_id' =>  $this->input->post('name'),
				'car_model_id' =>  $this->input->post('name_model'),
				'car_model_des_id' => $this->input->post('name_model_des'),
				'name_type' =>  $row->name_type_th,
				'name' =>  $row1->name_th,
				'name_model' =>  $row2->name_model_th,
				'name_model_des' =>  $ro,
				'name_gear' =>  $this->input->post('name_gear'),
				'name_capacity' =>  $this->input->post('name_capacity'),
				'name_mile' =>  $this->input->post('name_mile'),
				'province' =>  $this->input->post('province'),
				'device' => $device1,
				'bank_id' => $bank1,
				'name_price' =>  $this->input->post('name_price'),
				'name_year_pro' =>  $this->input->post('name_year_pro'),
				'name_color' =>  $this->input->post('name_color'),
				'modify_date' => date('Y-m-d h:i:s'),
				'status_car_show' =>  1,
				'descript' =>  $this->input->post('descript'),
				'downpayment' =>  $this->input->post('downpayment'),
				'status_id' =>  $this->input->post('status_id')
			);
			$this->db->where('car_top_id',  $id);
			$this->db->update ( 'tbl_car_top', $data_update );	


		}

		function car_top_delete($id){
			// $this->db->where('car_top_id',$id);
			// $this->db->delete('tbl_car_top');

			$data_update = array (
				'status_delete' =>  1
				
			);
			$this->db->where('car_top_id',  $id);
			$this->db->update ( 'tbl_car_top', $data_update );	

		}

/*----------------/ magement - adv /---------------------------*/
		
		function get_data_adv() {
			$query = $this->db->query ( 'select * from tbl_adv order by adv_id desc' );
			return $query->result ();
		}

/*----------------/ magement - banner /---------------------------*/

		function banner_add(){
			 $title_th = $this->input->post('title_th');
			 $title_en = $this->input->post('title_en');
			 $description_th = $this->input->post('description_th');
			 $description_en = $this->input->post('description_en');
			 $status_id = $this->input->post('status_id');
			 $position_id = $this->input->post('position_id');
			 $data = array(
            	'title_th' => $title_th,
            	'title_en' => $title_en,
            	'description_th' => $description_th,
            	'description_en' => $description_en,
            	'status_id' => $status_id,
            	'position_id' => $position_id
            );
			 $this->db->insert('tbl_banner', $data);
		}

		function banner_edit($id){
			$data_update = array (
				'title_th' =>  $this->input->post('title_th'),
				'title_en' =>  $this->input->post('title_en'),
				'description_th' =>  $this->input->post('description_th'),
				'description_en' =>  $this->input->post('description_en'),
				'status_id' =>  $this->input->post('status_id'),
				'position_id' =>  $this->input->post('position_id')
			);
			$this->db->where('banner_id',  $id);
			$this->db->update ( 'tbl_banner', $data_update );	
		}

		function banner_edit_check($id){
			$data_update = array (
				'status' =>  $this->input->post('status'),
				'page' =>  $this->input->post('page')
			);
			$this->db->where('id_image_multi',  $id);
			$this->db->update ( 'banner_uploads_multi', $data_update );	
		}

		function banner_delete($id){
			$this->db->where('banner_id',$id);
			$this->db->delete('tbl_banner');
		}
/*----------------/ magement - news /---------------------------*/
		
		function save_page_show($news_id=""){

			///////////////////////////////////บันทึกค่า POST/////////////////////////////////////////

				$data_update = array (
				
				'page_show' => $this->input->post('page_show'),
				'modify_date' =>  date ( 'Y-m-d H:i:s' )

				);
				$this->db->where('news_id',  $news_id);
				$this->db->update ( 'tbl_news', $data_update );	

			///////////////////////////////////page = 0 ทั้งหมด////////////////////////////////////////

				$data_update = array (
				
				'page' => 0,
				'modify_date' =>  date ( 'Y-m-d H:i:s' )

				);
				$this->db->update ( 'tbl_news', $data_update );

			////////////////////////วนหา news_id เลขคู่ และ page_show =1///////////////////////////////////	

				$news_query_db = $this->db->query ( "SELECT news_id,page FROM tbl_news WHERE news_id%2=0 AND page_show =1" );
         		$news_query = $news_query_db->result ();
         		if($news_query){
                    $i=1; foreach($news_query as $row) {
                        $data = array (
                        'page' => $row->page+$i
                    );
	                    $this->db->where('news_id',  $row->news_id);
	                    $this->db->update ( 'tbl_news', $data );     
                    $i++;} 
                }

			////////////////////////วนหา news_id เลขคี่ และ page_show =1///////////////////////////////////	

				$news_1_query_db = $this->db->query ( "SELECT news_id,page FROM tbl_news WHERE news_id%2!=0 AND page_show =1" );
         		$news_1_query = $news_1_query_db->result ();
         		if($news_1_query){
                    $ii=1; foreach($news_1_query as $row1) {
                        $data1 = array (
                        'page' => $row1->page+$ii
                    );
	                    $this->db->where('news_id',  $row1->news_id);
	                    $this->db->update ( 'tbl_news', $data1 );     
                    $ii++;} 
                }

			
		}


		function news_add(){
			 $image_info = $this->upload->data();
			 $title_th = $this->input->post('title_th');
			 $title_en = $this->input->post('title_en');
			 $description_th = $this->input->post('description_th');
			 $description_en = $this->input->post('description_en');
			 $status_id = $this->input->post('status_id');
			 $position_id = $this->input->post('position_id');
			 $created_date = date ( 'Y-m-d H:i:s' );
			 $data = array(
			 	'img' => $image_info['file_name'],
            	'title_th' => $title_th,
            	'title_en' => $title_en,
            	'description_th' => $description_th,
            	'description_en' => $description_en,
            	'status_id' => $status_id,
            	'position_id' => $position_id,
            	'created_date' => $created_date
            );
			 $this->db->insert('tbl_news', $data);
		}

		function news_edit($id){
			$image_info = $this->upload->data();
			$data_update = array (
				
				'title_th' =>  $this->input->post('title_th'),
				'title_en' =>  $this->input->post('title_en'),
				'description_th' =>  $this->input->post('description_th'),
				'description_en' =>  $this->input->post('description_en'),
				'status_id' =>  $this->input->post('status_id'),
				'position_id' =>  $this->input->post('position_id'),
				'modify_date' =>  date ( 'Y-m-d H:i:s' )

			);
			$this->db->where('news_id',  $id);
			$this->db->update ( 'tbl_news', $data_update );	
		}

		function news_edit_img($id=""){
			
			$slide_query_db = $this->db->query ( "SELECT * FROM tbl_news WHERE news_id = ".$id."" );
	        $slide_query = $slide_query_db->row ();
	        $path_to_file = './uploads/'.$slide_query->img;
			if(@unlink($path_to_file)) {
	        }

			$image_info = $this->upload->data();

			$data_update = array (
			'title_th' =>  $this->input->post('title_th'),
			'title_en' =>  $this->input->post('title_en'),
			'description_th' =>  $this->input->post('description_th'),
			'description_en' =>  $this->input->post('description_en'),
			'status_id' =>  $this->input->post('status_id'),
			'position_id' =>  $this->input->post('position_id'),
			'modify_date' =>  date ( 'Y-m-d H:i:s' ),
			'img' => $image_info['file_name']
			);
			$this->db->where('news_id',  $id);
			$this->db->update ( 'tbl_news', $data_update );	
				
		}

		function news_delete($id){

			$slide_query_db = $this->db->query ( "SELECT * FROM tbl_news WHERE news_id = ".$id."" );
	        $slide_query = $slide_query_db->row ();
	        $path_to_file = './uploads/'.$slide_query->img;
			if(@unlink($path_to_file)) {}
			$this->db->where('news_id',$id);
			$this->db->delete('tbl_news');

		}

/*----------------/ magement - adv /---------------------------*/

        function adv_add(){
			 $image_info = $this->upload->data();
			 $status_id = $this->input->post('status_id');
			 $position_id = $this->input->post('position_id');
			 $data = array(
			 	'img' => $image_info['file_name'],
            	'status_id' => $status_id,
            	'position_id' => $position_id,
            	'created_date' =>  date ( 'Y-m-d H:i:s' )
            );
			 $this->db->insert('tbl_adv', $data);
		}

		function adv_delete($adv_id=""){
			$slide_query_db = $this->db->query ( "SELECT * FROM tbl_adv WHERE adv_id = ".$adv_id."" );
	        $slide_query = $slide_query_db->row ();
	        $path_to_file = './uploads/'.$slide_query->img;
			if(@unlink($path_to_file)) {}
			$this->db->where('adv_id',$adv_id);
			$this->db->delete('tbl_adv');
		}



		function get_data_adv_view($adv_id="") {
			$query = $this->db->query ( 'select * from tbl_adv where adv_id = '.$adv_id.'' );
			return $query->row_array ();
		}

		function adv_edit($adv_id=""){
		
		$image_info = $this->upload->data();

		$data_update = array (
		'position_id' => $this->input->post('position_id'),
		'status_id' =>  $this->input->post('status_id'),
		'modify_date' =>  date('Y-m-d h:i:s')
		);
		$this->db->where('adv_id',  $adv_id);
		$this->db->update ( 'tbl_adv', $data_update );	
			
		}

		function adv_edit_img($adv_id=""){
			
			$slide_query_db = $this->db->query ( "SELECT * FROM tbl_adv WHERE adv_id = ".$adv_id."" );
	        $slide_query = $slide_query_db->row ();
	        $path_to_file = './uploads/'.$slide_query->img;
			if(@unlink($path_to_file)) {
	        }

			$image_info = $this->upload->data();

			$data_update = array (
			'position_id' => $this->input->post('position_id'),
			'status_id' =>  $this->input->post('status_id'),
			'modify_date' =>  date('Y-m-d h:i:s'),
			'img' => $image_info['file_name']
			);
			$this->db->where('adv_id',  $adv_id);
			$this->db->update ( 'tbl_adv', $data_update );	
				
		}




/*----------------/ magement - product /---------------------------*/

		function product_add(){
			 $title_th = $this->input->post('title_th');
			 $title_en = $this->input->post('title_en');
			 $description_th = $this->input->post('description_th');
			 $description_en = $this->input->post('description_en');
			 $price = $this->input->post('price');
			 $position_id = $this->input->post('position_id');
			 $position = $this->input->post('position');
			 $status_id = $this->input->post('status_id');
			 $data = array(
            	'title_th' => $title_th,
            	'title_en' => $title_en,
            	'description_th' => $description_th,
            	'description_en' => $description_en,
            	'price' => $price,
            	'position_id' => $position_id,
            	'position' => $position,
            	'status_id' => $status_id
            );
			 $this->db->insert('tbl_product', $data);
		}

		function product_edit($id){
			$data_update = array (
				'title_th' =>  $this->input->post('title_th'),
				'title_en' =>  $this->input->post('title_en'),
				'description_th' =>  $this->input->post('description_th'),
				'description_en' =>  $this->input->post('description_en'),
				'price' =>  $this->input->post('price'),
				'position_id' =>  $this->input->post('position_id'),
				'position' =>  $this->input->post('position'),
				'status_id' =>  $this->input->post('status_id')
			);
			$this->db->where('product_id',  $id);
			$this->db->update ( 'tbl_product', $data_update );	
		}

		function product_delete($id){
			$this->db->where('product_id',$id);
			$this->db->delete('tbl_product');
		}

/*----------------/ magement - recommend /---------------------------*/



		function recommend_add(){

			
			 $title_th = $this->input->post('title_th');
			 $title_en = $this->input->post('title_en');
			 $description_th = $this->input->post('description_th');
			 $description_en = $this->input->post('description_en');
			 $position_id = $this->input->post('position_id');
			 $status_id = $this->input->post('status_id');
			 $size = $this->input->post('size');
			 $size_m = $this->input->post('size_m');
			 $size_l = $this->input->post('size_l');
			 $price = $this->input->post('price');
			 $price_m = $this->input->post('price_m');
			 $price_l = $this->input->post('price_l');
			 $page = $this->input->post('page');
			 $recommend_category_id = $this->input->post('recommend_category_id');
			 $data = array(
            	'title_th' => $title_th,
            	'title_en' => $title_en,
            	'description_th' => $description_th,
            	'description_en' => $description_en,
            	'position_id' => $position_id,
            	'status_id' => $status_id,
            	'size' => $size,
            	'size_m' => $size_m,
            	'size_l' => $size_l,
            	'price' => $price,
            	'price_m' => $price_m,
            	'price_l' => $price_l,
            	// 'page' => $page,
            	'recommend_category_id' => $recommend_category_id
            );
			 $this->db->insert('tbl_recommend', $data);
		}

		function recommend_edit($id){
			$data_update = array (
				'title_th' =>  $this->input->post('title_th'),
				'title_en' =>  $this->input->post('title_en'),
				'description_th' =>  $this->input->post('description_th'),
				'description_en' =>  $this->input->post('description_en'),
				'position_id' =>  $this->input->post('position_id'),
				'status_id' =>  $this->input->post('status_id'),
				 'size' =>  $this->input->post('size'),
				 'size_m' =>  $this->input->post('size_m'),
				 'size_l' =>  $this->input->post('size_l'),
				 'price' =>  $this->input->post('price'),
				 'price_m' =>  $this->input->post('price_m'),
				 'price_l' =>  $this->input->post('price_l')
				 // 'page' =>  $this->input->post('page')
				//'recommend_category_id' =>  $this->input->post('recommend_category_id')
			);
			$this->db->where('recommend_id',  $id);
			$this->db->update ( 'tbl_recommend', $data_update );	
		}

		function recommend_submit(){

			if($this->input->post('recommend_category_id')==""){
				$recommend_category_id = $this->input->post('recommend_category_id1');
			}else{
				$recommend_category_id = $this->input->post('recommend_category_id');
			}

			 $data_update = array (
			 	 'recommend_category_id' =>  $recommend_category_id
			 );

			 $this->db->where('recommend_id',  $this->input->post('recommend_id'));
			$this->db->update ( 'tbl_recommend', $data_update );	
		}

		function recommend_delete($id){
			$this->db->where('recommend_id',$id);
			$this->db->delete('tbl_recommend');
		}

/*----------------/ magement - recommend category /---------------------------*/

		function recommend_category_add(){
			 $title_cate_th = $this->input->post('title_cate_th');
			 $title_cate_en = $this->input->post('title_cate_en');
			 $position_cate_id = $this->input->post('position_cate_id');
			 $status_cate_id = $this->input->post('status_cate_id');
		
			 $data = array(
            	'title_cate_th' => $title_cate_th,
            	'title_cate_en' => $title_cate_en,
            	'position_cate_id' => $position_cate_id,
            	'status_cate_id' => $status_cate_id
            );
			 $this->db->insert('tbl_recommend_category', $data);
		}

		function recommend_category_edit($id){
			$data_update = array (
				'title_cate_th' =>  $this->input->post('title_cate_th'),
				'title_cate_en' =>  $this->input->post('title_cate_en'),
				'position_cate_id' =>  $this->input->post('position_cate_id'),
				'status_cate_id' =>  $this->input->post('status_cate_id')
			);
			$this->db->where('recommend_category_id',  $id);
			$this->db->update ( 'tbl_recommend_category', $data_update );	
		}

		function recommend_category_delete($id){
			$this->db->where('recommend_category_id',$id);
			$this->db->delete('tbl_recommend_category');
		}
/*----------------/ magement - finance /---------------------------*/

		function finance_add(){
			 $title_th = $this->input->post('title_th');
			 $title_en = $this->input->post('title_en');
			 $descript_en = $this->input->post('descript_en');
			 $descript_th = $this->input->post('descript_th');
			 $position_id = $this->input->post('position_id');
			 $status_id = $this->input->post('status_id');
		
			 $data = array(
            	'title_th' => $title_th,
            	'title_en' => $title_en,
            	'descript_en' => $descript_en,
            	'descript_th' => $descript_th,
            	'position_id' => $position_id,
            	'status_id' => $status_id
            );
			 $this->db->insert('tbl_finance', $data);
		}

		function finance_edit($id){
			$data_update = array (
				'title_th' =>  $this->input->post('title_th'),
				'title_en' =>  $this->input->post('title_en'),
				'descript_en' =>  $this->input->post('descript_en'),
				'descript_th' =>  $this->input->post('descript_th'),
				'position_id' =>  $this->input->post('position_id'),
				'status_id' =>  $this->input->post('status_id')
			);
			$this->db->where('finance_id',  $id);
			$this->db->update ( 'tbl_finance', $data_update );	
		}

		function finance_delete($id){
			$this->db->where('finance_id',$id);
			$this->db->delete('tbl_finance');
		}


/*----------------/ magement - setting /---------------------------*/

		function setting_edit($id){
			$data_update = array (
				'setting_top_th' =>  $this->input->post('setting_top_th'),
				'setting_top_en	' =>  $this->input->post('setting_top_en'),
				'setting_des_th' =>  $this->input->post('setting_des_th'),
				'setting_des_en' =>  $this->input->post('setting_des_en'),
				// 'email' =>  $this->input->post('email'),
				'seo_keyword_th	' =>  $this->input->post('seo_keyword_th'),
				'seo_keyword_en' =>  $this->input->post('seo_keyword_en'),
				'seo_descript_th' =>  $this->input->post('seo_descript_th'),
				'seo_descript_en' =>  $this->input->post('seo_descript_en')
			);
			$this->db->where('setting_id',  $id);
			$this->db->update ( 'tbl_setting', $data_update );	
		}

/*----------------/ magement - admin /---------------------------*/

		function admin_add(){
			 $user = $this->input->post('user');
			 $password = md5($this->input->post('password'));
			 $tel = $this->input->post('tel');
			 $email = $this->input->post('email');
			 $data = array(
            	'user' => $user,
            	'password' => $password,
            	'tel' => $tel,
            	'email' => $email
            );
			 $this->db->insert('tbl_login_admin', $data);
		}

		function admin_edit($id){
			$data_update = array (
				'user' =>  $this->input->post('user'),
				// 'password' =>  $this->input->post('password'),
				'tel' =>  $this->input->post('tel'),
				'email' =>  $this->input->post('email')
			);
			$this->db->where('id',  $id);
			$this->db->update ( 'tbl_login_admin', $data_update );	
		}

		function change_password_admin($id){
			$data_update = array (
				'password' =>  md5($this->input->post('password'))
			);
			$this->db->where('id',  $id);
			$this->db->update ( 'tbl_login_admin', $data_update );	
		}

		function admin_delete($id){
			$this->db->where('id',$id);
			$this->db->delete('tbl_login_admin');
		}

		function admin_setting($id){
			$data_update = array (
				'setting_edit' =>  $this->input->post('setting_edit'),
				'menu_list' =>  $this->input->post('menu_list'),
				'banner_multi' =>  $this->input->post('banner_multi'),
				'about_edit' =>  $this->input->post('about_edit'),
				'news_list' =>  $this->input->post('news_list'),
				'adv_list' =>  $this->input->post('adv_list'),
				'contact_edit' =>  $this->input->post('contact_edit'),
				'member_list' =>  $this->input->post('member_list'),
				'car_top_list' =>  $this->input->post('car_top_list'),
				'car_buy_list' =>  $this->input->post('car_buy_list'),
				'car_type_list' =>  $this->input->post('car_type_list'),
				'car_price_list' =>  $this->input->post('car_price_list'),
				'car_year_list' =>  $this->input->post('car_year_list'),
				'car_color_list' =>  $this->input->post('car_color_list'),
				'car_gear_list' =>  $this->input->post('car_gear_list'),
				'car_capacity_list' =>  $this->input->post('car_capacity_list'),
				'car_mile_list' =>  $this->input->post('car_mile_list'),
				'car_device_list' =>  $this->input->post('car_device_list'),
				'finance_list' =>  $this->input->post('finance_list'),
				'bank_list' =>  $this->input->post('bank_list')
				
			);
			$this->db->where('id',  $id);
			$this->db->update ( 'tbl_login_admin', $data_update );	
		}


/*----------------/ magement - about /---------------------------*/

		function about_edit($id){
			$data_update = array (
				'descript_th' =>  $this->input->post('descript_th'),
				'descript_en' =>  $this->input->post('descript_en'),
				'descript_th_about' =>  $this->input->post('descript_th_about'),
				'descript_en_about' =>  $this->input->post('descript_en_about')
			);
			$this->db->where('about_id',  $id);
			$this->db->update ( 'tbl_about', $data_update );	
		}
/*----------------/ magement - service /---------------------------*/

		function service_edit($id){
			$data_update = array (
				'descript_th' =>  $this->input->post('descript_th'),
				'descript_en' =>  $this->input->post('descript_en')
			);
			$this->db->where('service_id',  $id);
			$this->db->update ( 'tbl_service', $data_update );	
		}

/*----------------/ magement - howto /---------------------------*/

		function howto_edit($id){
			$data_update = array (
				'descript_th_howto' =>  $this->input->post('descript_th_howto'),
				'descript_en_howto' =>  $this->input->post('descript_en_howto')
			);
			$this->db->where('howto_id',  $id);
			$this->db->update ( 'tbl_howto', $data_update );	
		}


		
/*----------------/ magement - contact /---------------------------*/

		function contact_edit($id){
			$data_update = array (
				'company_th' =>  $this->input->post('company_th'),
				'company_en' =>  $this->input->post('company_en'),
				'address_th' =>  $this->input->post('address_th'),
				'address_en' =>  $this->input->post('address_en'),
				'email' =>  $this->input->post('email'),
				'tel' =>  $this->input->post('tel'),
				'fax' =>  $this->input->post('fax'),
				'email' =>  $this->input->post('email'),
				'facebook' =>  $this->input->post('facebook'),
				'twitter' =>  $this->input->post('twitter'),
				'instragram' =>  $this->input->post('instragram')

				
			);
			$this->db->where('contact_id',  $id);
			$this->db->update ( 'tbl_contact', $data_update );	
		}

/*----------------/ magement - map /---------------------------*/

		function map_edit($id){
			$data_update = array (
				'map' =>  $this->input->post('map')
			);
			$this->db->where('map_id',  $id);
			$this->db->update ( 'tbl_map', $data_update );	
		}

/*----------------/ magement - gallery /---------------------------*/

		function gallery_edit($id){
			$data_update = array (
				'gallery_name_th' =>  $this->input->post('gallery_name_th'),
				'gallery_name_en' =>  $this->input->post('gallery_name_en')
			);
			$this->db->where('gallery_id',  $id);
			$this->db->update ( 'tbl_gallery', $data_update );	
		}

	

/*----------------/ data /---------------------------*/

		function contact_suggestion_delete($suggestion_id){
			$this->db->where('suggestion_id',$suggestion_id);
			$this->db->delete('tbl_suggestion');
		}
		
		function get_data_contact_suggestion_view($suggestion_id="") {
			$query = $this->db->query ( 'select * from tbl_suggestion where suggestion_id = '.$suggestion_id.' order by suggestion_id desc' );
			return $query->row_array ();
		}

		function get_data_contact_suggestion() {
			$query = $this->db->query ( 'select * from tbl_suggestion order by suggestion_id desc' );
			return $query->result ();
		}

		function get_data_menu() {
			$query = $this->db->query ( 'select * from tbl_menu order by menu_id desc' );
			return $query->result ();
		}

		function get_data_admin() {
			$query = $this->db->query ( 'select * from tbl_login_admin order by id desc' );
			return $query->result ();
		}

		function get_data_member() {
			$query = $this->db->query ( 'select * from tbl_login_member order by id desc' );
			return $query->result ();
		}


		function get_data_car($car_type_id="") {
			if(!empty($car_type_id)){
			$query = $this->db->query ( 'select * from tbl_car where car_type_id ='.$car_type_id.' order by car_id desc' );
			return $query->result ();
			}
		}
		
		function get_data_car_type11() {
			$query = $this->db->query ( 'select * from tbl_car_type order by car_type_id desc' );
			return $query->result ();
		}

		function get_data_car11($car_type_id="") {
			if(!empty($car_type_id)){
				$query = $this->db->query ( 'select * from tbl_car where car_type_id = '.$car_type_id.' order by car_id desc' );
				return $query->result ();
			}
		}

		function get_data_car_model11($car_id="") {

			if(!empty($car_id)){
				$query = $this->db->query ( 'select * from tbl_car_model where car_id = '.$car_id.' order by car_model_id desc' );
				return $query->result ();
			}
		}

		function get_data_car_model_des11($car_model_id="") {

			if(!empty($car_model_id)){
				$query = $this->db->query ( 'select * from tbl_car_model_des where car_model_id = '.$car_model_id.' order by car_model_des_id desc' );
				return $query->result ();
			}
		}



		function get_data_car_type1() {
			$query = $this->db->query ( 'select * from tbl_car_type order by car_type_id desc' );
			return $query->result ();
		}

		function get_data_car1() {
				$query = $this->db->query ( 'select * from tbl_car  order by car_id desc' );
				return $query->result ();
		}

		function get_data_car_model1() {
				$query = $this->db->query ( 'select * from tbl_car_model e  order by car_model_id desc' );
				return $query->result ();
		}

		function get_data_car_model_des1() {
				$query = $this->db->query ( 'select * from tbl_car_model_des   order by car_model_des_id desc' );
				return $query->result ();
		}




		function get_data_car_type() {
			$query = $this->db->query ( 'select * from tbl_car_type order by car_type_id desc' );
			return $query->result ();
		}

		function get_data_car_type_title($car_type_id="") {

			if(!empty($car_type_id)){
			$query = $this->db->query ( 'select * from tbl_car_type where car_type_id = '.$car_type_id.' order by car_type_id desc' );
			return $query->row_array ();
			}
		}
		function get_data_province() {
			$query = $this->db->query ( 'select * from tbl_province order by province_id asc' );
			return $query->result ();
		}

		function get_data_device() {
			$query = $this->db->query ( 'select  * from tbl_device order by device_id asc' );
			return $query->result ();
		}

		function get_data_device_count() {
			$query = $this->db->query ( 'select  count(*) as count_id from tbl_device order by device_id asc' );
			return $query->row_array ();
		}


		

		function get_data_car_model($id="") {
			$query = $this->db->query ( 'select * from tbl_car_model where car_id = '.$id.' order by car_model_id desc' );
			return $query->result ();
		}

		function get_data_car_model_des($id="") {
			$query = $this->db->query ( 'select * from tbl_car_model_des where car_model_id = '.$id.' order by car_model_des_id desc' );
			return $query->result ();
		}

		function get_data_car_check_id($id1="") {
			$query = $this->db->query ( 'select b.car_id,d.car_type_id,a.car_model_id from tbl_car_model_des a 
			LEFT JOIN tbl_car_model b ON  b.car_model_id = a.car_model_id
			LEFT JOIN tbl_car c ON c.car_id = b.car_id
			LEFT JOIN tbl_car_type d ON d.car_type_id = c.car_type_id
			where a.car_model_id='.$id1.'
			GROUP BY d.car_type_id 
			LIMIT 1' );
			return $query->row_array();
		}

		function get_data_car_cate($id="") {
			$query = $this->db->query ( 'select * from tbl_car where car_id = '.$id.'' );
			return $query->row_array ();
		}

		function get_data_car_model_cate($id="") {
			$query = $this->db->query ( 'select * from tbl_car_model where car_model_id = '.$id.'' );
			return $query->row_array ();
		}

		function get_data_car_year() {
			$query = $this->db->query ( 'select * from tbl_car_year order by car_year_id asc' );
			return $query->result ();
		}

		function get_data_car_year_pro() {
			$query = $this->db->query ( 'select * from tbl_car_year where status_id=1 order by name_year_min asc' );
			return $query->result ();
		}

		function get_data_car_year_pro_text() {
			$query = $this->db->query ( 'SELECT * FROM tbl_car_model_des WHERE status_id = 1  ORDER BY name_year_pro asc' );
			return $query->result ();
		}

		function get_data_car_year_check($name_year_pro="") {

			if(!empty($name_year_pro)){

				$query = $this->db->query ( 'select max(name_year_max) as year_max from tbl_car_year limit 1' );
				$row = $query->row();

				$query_min = $this->db->query ( 'select min(name_year_min) as year_min from tbl_car_year limit 1' );
				$row_min = $query_min->row();

				if($name_year_pro>=$row_min->year_min AND $name_year_pro<=$row->year_max){
					$check = "true";
				}else{
					$check = "false";
				}
				return $check;
			}
			else{
				$check = "";
				return $check;
			}
		}

		function get_data_car_capacity() {
			$query = $this->db->query ( 'select * from tbl_car_capacity order by car_capacity_id desc' );
			return $query->result ();
		}

		function get_data_car_mile() {
			$query = $this->db->query ( 'select * from tbl_car_mile order by car_mile_id desc' );
			return $query->result ();
		}

		function get_data_car_price() {
			$query = $this->db->query ( 'select * from tbl_car_price order by car_price_id desc' );
			return $query->result ();
		}

		function get_data_bank() {
			$query = $this->db->query ( 'select 
				a.bank_id,
				a.four_year,
				a.five_year,
				a.six_year,
				a.seven_year,
				a.bank_name_th,
				a.bank_name_en,
				a.status_id,
				a.position_id,
				a.create_date,
				a.modify_date,
				a.img,
				b.bank_id as bank_id1,
				b.id_image as id_image,
				b.img_name as img_name,
				b.thumb_name as thumb_name,
				b.ext as ext,
				b.upload_date as upload_date,
				b.bank_id as bank_id_img
			 from tbl_bank a 
				left join bank_uploads b on a.bank_id = b.bank_id
				order by a.bank_id desc' );
			return $query->result ();
		}

		function get_data_car_color() {
			$query = $this->db->query ( 'select * from tbl_car_color order by car_color_id desc' );
			return $query->result ();
		}
		function get_data_car_gear() {
			$query = $this->db->query ( 'select * from tbl_car_gear order by car_gear_id desc' );
			return $query->result ();
		}
		function get_data_car_device() {
			$query = $this->db->query ( 'select * from tbl_device order by device_id desc' );
			return $query->result ();
		}

		function get_data_car_top() {
			$query = $this->db->query ( 'SELECT
				a.*,b.*,c.name as name_add,
				a.car_top_id as car_top_id,
				b.car_top_id as car_top_id1
			FROM
				tbl_car_top a
			LEFT JOIN gallery_uploads_multi b ON b.car_top_id = a.car_top_id
			LEFT JOIN tbl_login_member c ON c.id = a.id_login
			where a.check_sale_complete = "complete"
			AND a.status_delete = 0
			group by a.car_top_id
			ORDER BY
				a.car_top_id DESC' );
			return $query->result ();
		}

		function get_data_car_buy() {

			$query = $this->db->query ( 'SELECT
							a.*,b.*,d.*,
							c.name as name_add,
							a.car_top_id as car_top_id,
							b.car_top_id as car_top_id1,
							d.car_top_id as car_top_id2,
							a.id_login as id_login1,
							d.id_login as id_login2,
							c.name as name2,
							cc.name as name_cc
			FROM
				tbl_buy_car d
			LEFT JOIN tbl_car_top a ON d.car_top_id = a.car_top_id
			LEFT JOIN gallery_uploads_multi b ON b.car_top_id = a.car_top_id
			LEFT JOIN tbl_login_member c ON c.id = d.id_login
			LEFT JOIN tbl_login_member cc ON cc.id = a.id_login

			where a.check_sale_complete = "complete"
			group by  d.buy_car_id
			ORDER BY
				d.buy_car_id DESC' );
			return $query->result ();

		}

		function get_data_car_buy_view($buy_car_id="") {

			$query = $this->db->query ( 'SELECT
				a.*,b.*,d.*,e.*,
				c.name as name_add,
				a.car_top_id as car_top_id,
				b.car_top_id as car_top_id1,
				d.car_top_id as car_top_id2,
				a.id_login as id_login1,
				d.id_login as id_login2,
				c.name as name2,
				cc.name as name_cc
			FROM
				tbl_buy_car d
			LEFT JOIN tbl_car_top a ON d.car_top_id = a.car_top_id
			LEFT JOIN gallery_uploads_multi b ON b.car_top_id = a.car_top_id
			LEFT JOIN tbl_login_member c ON c.id = d.id_login
			LEFT JOIN tbl_login_member cc ON cc.id = a.id_login
			LEFT JOIN tbl_bank e ON e.bank_id = d.bank_id

			where buy_car_id = '.$buy_car_id.'
			ORDER BY
				a.car_top_id DESC' );
			return $query->row_array ();

		}



		function get_data_check_name_buy() {

			$query = $this->db->query ( 'SELECT
				d.id_login as id_login2
			FROM
				tbl_buy_car d
			LEFT JOIN tbl_car_top a ON d.car_top_id = a.car_top_id
			LEFT JOIN tbl_login_member c ON c.id = d.id_login
			
			where a.check_sale_complete = "complete"
			group by a.car_top_id
			ORDER BY
				a.car_top_id DESC' );
			$row = $query->row();
			@$id_login_buy = $row->id_login2;


			if(!empty(@$id_login_buy)){
				$query1 = $this->db->query ( 'SELECT * FROM tbl_login_member where id = '.$id_login_buy.'' );
				$row1 = $query1->row();
				$name_buy = $row1->name;
				return $name_buy;
			}

		}


		function get_data_edit_menu($id) {
		
			$query = $this->db->query ( 'select * from tbl_menu where menu_id ='.$id.'' );
			return $query->result ();

		}

		function get_data_edit_member($id) {
		
			$query = $this->db->query ( 'select * from tbl_login_member where id ='.$id.'' );
			return $query->result ();

		}

		function get_data_edit_car($id) {
		
			$query = $this->db->query ( 'select * from tbl_car where car_id ='.$id.'' );
			return $query->result ();

		}

		function get_data_edit_car_type($id) {
		
			$query = $this->db->query ( 'select * from tbl_car_type where car_type_id ='.$id.'' );
			return $query->result ();

		}

		function get_data_edit_car_model($id) {
		
			$query = $this->db->query ( 'select * from tbl_car_model where car_model_id ='.$id.'' );
			return $query->result ();

		}

		function get_data_edit_car_model_des($id) {
		
			$query = $this->db->query ( 'select * from tbl_car_model_des where car_model_des_id ='.$id.'' );
			return $query->result ();

		}

		function get_data_edit_car_year($id) {
		
			$query = $this->db->query ( 'select * from tbl_car_year where car_year_id ='.$id.'' );
			return $query->result ();

		}

		function get_data_edit_car_capacity($id) {
		
			$query = $this->db->query ( 'select * from tbl_car_capacity where car_capacity_id ='.$id.'' );
			return $query->result ();

		}

		function get_data_edit_car_mile($id) {
		
			$query = $this->db->query ( 'select * from tbl_car_mile where car_mile_id ='.$id.'' );
			return $query->result ();

		}

		function get_data_edit_car_gear($id) {
		
			$query = $this->db->query ( 'select * from tbl_car_gear where car_gear_id ='.$id.'' );
			return $query->result ();

		}

		function get_data_edit_car_color($id) {
		
			$query = $this->db->query ( 'select * from tbl_car_color where car_color_id ='.$id.'' );
			return $query->result ();

		}

		function get_data_edit_car_device($id) {
		
			$query = $this->db->query ( 'select * from tbl_device where device_id ='.$id.'' );
			return $query->result ();

		}

		function get_data_edit_car_price($id) {
		
			$query = $this->db->query ( 'select * from tbl_car_price where car_price_id ='.$id.'' );
			return $query->result ();

		}

		function get_data_edit_bank($id) {
		
			$query = $this->db->query ( 'select * from tbl_bank where bank_id ='.$id.'' );
			return $query->result ();

		}

		function get_data_edit_car_top($id) {
		
			$query = $this->db->query ( 'select * from tbl_car_top where car_top_id ='.$id.'' );
			return $query->row_array ();

		}


		function get_data_edit_about($id) {
		
			$query = $this->db->query ( 'select * from tbl_about where about_id ='.$id.'' );
			return $query->result ();

		}

		function get_data_edit_service($id) {
		
			$query = $this->db->query ( 'select * from tbl_service where service_id ='.$id.'' );
			return $query->result ();

		}

		function get_data_edit_howto($id) {
		
			$query = $this->db->query ( 'select * from tbl_howto where howto_id ='.$id.'' );
			return $query->result ();

		}

		function get_data_edit_setting($id) {
		
			$query = $this->db->query ( 'select * from tbl_setting where setting_id ='.$id.'' );
			return $query->result ();

		}

		function get_data_edit_admin($id) {
		
			$query = $this->db->query ( 'select * from tbl_login_admin where id ='.$id.'' );
			return $query->result ();

		}

		function check_edit_admin($id) {
		
			$query = $this->db->query ( 'select password from tbl_login_admin where id ='.$id.'' );
			$row = $query->row ();
			$password = $row->password;
			return $password;

		}

		function get_data_edit_contact($id) {
		
			$query = $this->db->query ( 'select * from tbl_contact where contact_id ='.$id.'' );
			return $query->result ();

		}

		function get_data_edit_map($id) {
		
			$query = $this->db->query ( 'select * from tbl_map where map_id ='.$id.'' );
			return $query->result ();

		}

		function get_data_edit_gallery($id) {
		
			$query = $this->db->query ( 'select * from tbl_gallery where gallery_id ='.$id.'' );
			return $query->result ();

		}

		function get_data_banner() {
			$query = $this->db->query ( 'select 
				a.banner_id as banner_id,
				a.title_th as title_th,
				a.title_en as title_en,
				a.description_th as description_th,
				a.description_en as description_en,
				a.status_id as status_id,
				a.position_id,
				b.banner_id as banner_id1,
				b.id_image as id_image,
				b.img_name as img_name,
				b.thumb_name as thumb_name,
				b.ext as ext,
				b.upload_date as upload_date,
				b.banner_id as banner_id_img
			 from tbl_banner a 
				left join banner_uploads b on a.banner_id = b.banner_id
				order by a.banner_id desc' );
			return $query->result ();
		}

		function get_data_edit_banner($id) {
		
			$query = $this->db->query ( 'select * from tbl_banner where banner_id ='.$id.'' );
			return $query->result ();

		}


		function get_data_news() {
			$query = $this->db->query ( 'select * from tbl_news  order by news_id desc' );
			return $query->result ();
		}

		function get_data_edit_news($id) {
		
			$query = $this->db->query ( 'select * from tbl_news where news_id ='.$id.'' );
			return $query->result ();

		}



		


		function get_data_product() {
			$query = $this->db->query ( 'select 
				a.product_id as product_id,
				a.title_th,
				a.title_en,
				a.description_th,
				a.description_en,
				a.price,
				a.status_id,
				a.position_id,
				a.position,
				b.product_id as product_id1,
				b.id_image,
				b.img_name,
				b.thumb_name,
				b.ext as ext,
				b.upload_date,
				b.product_id as product_id_img
			 from tbl_product a 
				left join product_uploads b on a.product_id = b.product_id
				order by a.product_id asc' );
			return $query->result ();
		}

		function get_data_edit_product($id) {
		
			$query = $this->db->query ( 'select * from tbl_product where product_id ='.$id.'' );
			return $query->result ();

		}

		function get_data_recommend($id="") {

			$query = $this->db->query ( 'select 
				a.recommend_id as recommend_id,
				a.title_th,
				a.title_en,
				a.description_th,
				a.description_en,
				a.price,
				a.status_id,
				a.position_id,
				a.size,
				a.page,
				b.recommend_id as recommend_id1,
				b.id_image,
				b.img_name,
				b.thumb_name,
				b.ext as ext,
				b.upload_date,
				b.recommend_id as recommend_id_img,
				c.recommend_category_id,
				c.title_cate_th,
				c.title_cate_en,
				c.position_cate_id,
				c.status_cate_id
			 from tbl_recommend a 
				left join recommend_uploads b on a.recommend_id = b.recommend_id
				left join tbl_recommend_category c on a.recommend_category_id = c.recommend_category_id
				where a.recommend_category_id = '.$id.'
				order by a.recommend_id asc' );
			return $query->result ();
		}

		function get_data_category($id="") {
			$query = $this->db->query ( 'SELECT * from tbl_recommend_category WHERE recommend_category_id = '.$id.'' );
			return $query->row_array();
		}

		function get_data_category1($id_cate="") {
			$query = $this->db->query ( 'SELECT * from tbl_recommend_category WHERE recommend_category_id = '.$id_cate.'' );
			return $query->row_array();
		}

		function get_data_page($id="") {
			$query = $this->db->query ( 'SELECT * from tbl_recommend order by page desc limit 1' );
			return $query->row_array();
		}

		

		function get_data_recommend_category() {
			$query = $this->db->query ( 'select * from tbl_recommend_category order by recommend_category_id asc' );
			return $query->result ();
		}

		function get_data_finance() {
			$query = $this->db->query ( 'select * from tbl_finance order by finance_id asc' );
			return $query->result ();
		}


		function get_tbl_recommend_category(){
            $result = array();
            $array_keys_values = $this->db->query('SELECT * FROM tbl_recommend_category WHERE title_cate_th != "" ORDER BY recommend_category_id asc');
            $result[""]= '==== เลือก size ====';
            foreach ($array_keys_values->result() as $row)
            {
                $result[$row->recommend_category_id]= $row->title_cate_th;
            }
            return $result;
    	}

    	

    	function get_tbl_status(){
            $result = array();
            $array_keys_values = $this->db->query('SELECT * FROM tbl_status WHERE status_th != "" ORDER BY status_id asc');
            $result[""]= '==== เลือก สถานะการใช้งาน ====';
            foreach ($array_keys_values->result() as $row)
            {
                $result[$row->status_id]= $row->status_th;
            }
            return $result;
    	}

		function get_data_edit_recommend($id) {
		
			$query = $this->db->query ( 'select * from tbl_recommend where recommend_id ='.$id.'' );
			return $query->result ();

		}

		function get_data_edit_category_recommend($id) {
		
			$query = $this->db->query ( 'select * from tbl_recommend_category where recommend_category_id ='.$id.'' );
			return $query->result ();

		}

		function get_data_edit_finance($id) {
		
			$query = $this->db->query ( 'select * from tbl_finance where finance_id ='.$id.'' );
			return $query->result ();

		}

/////////////////////////////////- car buy -////////////////////////////////////////
	function car_buy_list_save(){
		$data_update = array (
			'status' =>  $this->input->post('status'),
			'modify_date' =>  date('Y-m-d h:i:s'),
			'check_count_comment' =>  0
		);
		$this->db->where('car_top_id',  $this->input->post('car_top_id'));
		$this->db->update ( 'tbl_buy_car', $data_update );

		if($this->input->post('status')==0){
			$status = 1;
		}else{
			$status = 4;
		}

		$data_update1 = array (
			'status_id' =>  $status,
			'modify_date' =>  date('Y-m-d h:i:s')
		);
		$this->db->where('car_top_id',  $this->input->post('car_top_id'));
		$this->db->update ( 'tbl_car_top ', $data_update1);	
	}

	function car_buy_delete($buy_car_id){
		
		// $data_update = array (
		// 	'status_delete' =>  1,
		// 	'modify_date' =>  date('Y-m-d h:i:s')
		// );
		// $this->db->where('buy_car_id',  $buy_car_id);
		// $this->db->update ( 'tbl_buy_car', $data_update );	

		$this->db->where('buy_car_id', $buy_car_id);
        $this->db->delete('tbl_buy_car');    

	}

/////////////////////////////////gallery- multi upload/////////////////////////////////



	function gallery_view_multi($id) {
        $this->db->order_by('sort_no','desc');
		$this->db->where('gallery_id',$id);
		$query = $this->db->get('gallery_uploads_multi');
	   	return $query->result();
	}

	function gallery_show_image_multi($a) {
		$d = $this->db->get_where('gallery_uploads_multi', array('gallery_id' => $a))->row();
		return $d;
	}

	function gallery_edit_image_multi($id) {
		$d = $this->db->get_where('gallery_uploads_multi', array('id_image_multi' => $id))->row();
		return $d;
	}

	function gallery_delete_image_multi($id) {
		
        $slide_query_db = $this->db->query ( "SELECT * FROM gallery_uploads_multi WHERE id_image_multi = ".$id."" );
        $slide_query = $slide_query_db->row ();
        $path_to_file = './uploads_car/'.$slide_query->thumb_name_multi;
			if(unlink($path_to_file)) {
            }else {
            }
		if($slide_query){    
            $slide_sort_db = $this->db->query ( "SELECT * FROM gallery_uploads_multi WHERE sort_no > ".$slide_query->sort_no."" );
            $slide_sort = $slide_sort_db->result ();
                
                if($slide_sort){
                    foreach($slide_sort as $row) {
                        $data = array (
                        'sort_no' => $row->sort_no-1
                    );
	                    $this->db->where('id_image_multi',  $row->id_image_multi);
	                    $this->db->update ( 'gallery_uploads_multi', $data );     
                    } 
                }
                $this->db->where('id_image_multi', $slide_query->id_image_multi);
                $this->db->delete('gallery_uploads_multi');    
        }
	}

	function gallery_update_image_multi($data) {
		$id = $this->input->post('id_image_multi');
		$for_id = $this->input->post('id_image');

		if($id == ''){

		}else{
			
			if($data['raw_name']!==""){
				$query = $this->db->query ( "SELECT * FROM gallery_uploads_multi WHERE id_image_multi = ".$id." limit 1");
				$query_data = $query->row();
				$path_to_file = './uploads_car/'.$query_data->thumb_name_multi.$query_data->ext_multi;

				if(unlink($path_to_file) ) {	
				}else {
				}
			}

			$file=array(
				'thumb_name_multi'=>$data['raw_name'].'.jpg',
				'id_image_multi' => $id,
				'upload_date'=>date("Y-m-d H:i:s")
				);
			$this->db->where('id_image_multi', $id);
			$this->db->update('gallery_uploads_multi',$file);
		}
	}

	function gallery_check_id($id) {
		$query = $this->db->query ( "SELECT * FROM tbl_gallery WHERE gallery_id = ".$id."");
		if($query->num_rows()>0)
			return TRUE;
		else
			return FALSE;
		}

	public function gallery_view($id) {
        $this->db->select('*');
        $this->db->from('tbl_gallery');
        $this->db->where('gallery_id',$id );
        $query = $this->db->get();
        return $result = $query->row_array();
    }

    function gallery_multi($car_top_id) {
		$this->db->order_by('sort_no','desc');
		$this->db->where('car_top_id',$car_top_id);
		$query = $this->db->get('gallery_uploads_multi');
		return $query->result();
	}


	/////////////////////////////////file- multi upload/////////////////////////////////



	function file_view_multi($id) {
        $this->db->order_by('sort_no','desc');
		$this->db->where('file_id',$id);
		$query = $this->db->get('file_uploads_multi');
	   	return $query->result();
	}

	function file_show_image_multi($a) {
		$d = $this->db->get_where('file_uploads_multi', array('file_id' => $a))->row();
		return $d;
	}

	function file_edit_image_multi($id) {
		$d = $this->db->get_where('file_uploads_multi', array('id_image_multi' => $id))->row();
		return $d;
	}

	function file_delete_image_multi($id) {
		
        $slide_query_db = $this->db->query ( "SELECT * FROM file_uploads_multi WHERE id_image_multi = ".$id."" );
        $slide_query = $slide_query_db->row ();
        $path_to_file = './uploads_file/'.$slide_query->thumb_name_multi;
			if(unlink($path_to_file)) {
            }else {
            }
		if($slide_query){    
            $slide_sort_db = $this->db->query ( "SELECT * FROM file_uploads_multi WHERE sort_no > ".$slide_query->sort_no."" );
            $slide_sort = $slide_sort_db->result ();
                
                if($slide_sort){
                    foreach($slide_sort as $row) {
                        $data = array (
                        'sort_no' => $row->sort_no-1
                    );
	                    $this->db->where('id_image_multi',  $row->id_image_multi);
	                    $this->db->update ( 'file_uploads_multi', $data );     
                    } 
                }
                $this->db->where('id_image_multi', $slide_query->id_image_multi);
                $this->db->delete('file_uploads_multi');    
        }
	}

	function file_update_image_multi($data) {
		$id = $this->input->post('id_image_multi');
		$for_id = $this->input->post('id_image');

		if($id == ''){

		}else{
			
			if($data['raw_name']!==""){
				$query = $this->db->query ( "SELECT * FROM file_uploads_multi WHERE id_image_multi = ".$id." limit 1");
				$query_data = $query->row();
				$path_to_file = './uploads_file/'.$query_data->thumb_name_multi.$query_data->ext_multi;

				if(unlink($path_to_file) ) {	
				}else {
				}
			}

			$file=array(
				'thumb_name_multi'=>$data['raw_name'].'.jpg',
				'id_image_multi' => $id,
				'upload_date'=>date("Y-m-d H:i:s")
				);
			$this->db->where('id_image_multi', $id);
			$this->db->update('file_uploads_multi',$file);
		}
	}

	function file_check_id($id) {
		$query = $this->db->query ( "SELECT * FROM tbl_gallery WHERE gallery_id = ".$id."");
		if($query->num_rows()>0)
			return TRUE;
		else
			return FALSE;
		}

	public function file_view($id) {
        $this->db->select('*');
        $this->db->from('tbl_gallery');
        $this->db->where('gallery_id',$id );
        $query = $this->db->get();
        return $result = $query->row_array();
    }

    public function file_view_check($no) {
        $query = $this->db->query ( 'select count(*) as count_check from file_uploads_multi where car_top_id = '.$no.'' );
		$row = $query->row();
		 $count_check = $row->count_check;
		return  $count_check;
    }

    function file_multi($car_top_id) {
		$this->db->order_by('sort_no','desc');
		$this->db->where('car_top_id',$car_top_id);
		$query = $this->db->get('file_uploads_multi');
		return $query->result();
	}



	/////////////////////////////////about- multi upload/////////////////////////////////



	function about_view_multi($id) {
        $this->db->order_by('sort_no','desc');
		$this->db->where('about_id',$id);
		$query = $this->db->get('about_uploads_multi');
	   	return $query->result();
	}

	function about_show_image_multi($a) {
		$d = $this->db->get_where('about_uploads_multi', array('about_id' => $a))->row();
		return $d;
	}

	function about_edit_image_multi($id) {
		$d = $this->db->get_where('about_uploads_multi', array('id_image_multi' => $id))->row();
		return $d;
	}

	function about_delete_image_multi($id) {
		
        $slide_query_db = $this->db->query ( "SELECT * FROM about_uploads_multi WHERE id_image_multi = ".$id."" );
        $slide_query = $slide_query_db->row ();
        $path_to_file = './uploads/'.$slide_query->thumb_name_multi;
			if(unlink($path_to_file)) {
            }else {
            }
		if($slide_query){    
            $slide_sort_db = $this->db->query ( "SELECT * FROM about_uploads_multi WHERE sort_no > ".$slide_query->sort_no."" );
            $slide_sort = $slide_sort_db->result ();
                
                if($slide_sort){
                    foreach($slide_sort as $row) {
                        $data = array (
                        'sort_no' => $row->sort_no-1
                    );
	                    $this->db->where('id_image_multi',  $row->id_image_multi);
	                    $this->db->update ( 'about_uploads_multi', $data );     
                    } 
                }
                $this->db->where('id_image_multi', $slide_query->id_image_multi);
                $this->db->delete('about_uploads_multi');    
        }
	}

	function about_update_image_multi($data) {
		$id = $this->input->post('id_image_multi');
		$for_id = $this->input->post('id_image');

		if($id == ''){

		}else{
			
			if($data['raw_name']!==""){
				$query = $this->db->query ( "SELECT * FROM about_uploads_multi WHERE id_image_multi = ".$id." limit 1");
				$query_data = $query->row();
				$path_to_file = './uploads/'.$query_data->thumb_name_multi.$query_data->ext_multi;

				if(unlink($path_to_file) ) {	
				}else {
				}
			}

			$file=array(
				'thumb_name_multi'=>$data['raw_name'].'.jpg',
				'id_image_multi' => $id,
				'upload_date'=>date("Y-m-d H:i:s")
				);
			$this->db->where('id_image_multi', $id);
			$this->db->update('about_uploads_multi',$file);
		}
	}

	function about_check_id($id) {
		$query = $this->db->query ( "SELECT * FROM tbl_about WHERE about_id = ".$id."");
		if($query->num_rows()>0)
			return TRUE;
		else
			return FALSE;
		}

	public function about_view($id) {
        $this->db->select('*');
        $this->db->from('tbl_about');
        $this->db->where('about_id',$id );
        $query = $this->db->get();
        return $result = $query->row_array();
    }

    function about_multi($car_top_id) {
		$this->db->order_by('sort_no','desc');
		$this->db->where('about_id',$car_top_id);
		$query = $this->db->get('about_uploads_multi');
		return $query->result();
	}


/////////////////////////////////banner- multi upload/////////////////////////////////



	function banner_view_multi($id) {
        $this->db->order_by('sort_no','desc');
		$this->db->where('banner_id',$id);
		$query = $this->db->get('banner_uploads_multi');
	   	return $query->result();
	}

	function banner_show_image_multi($a) {
		$d = $this->db->get_where('banner_uploads_multi', array('banner_id' => $a))->row();
		return $d;
	}

	function banner_edit_image_multi($id) {
		$d = $this->db->get_where('banner_uploads_multi', array('id_image_multi' => $id))->row();
		return $d;
	}

	function banner_delete_image_multi($id) {
		
        $slide_query_db = $this->db->query ( "SELECT * FROM banner_uploads_multi WHERE id_image_multi = ".$id."" );
        $slide_query = $slide_query_db->row ();
        $path_to_file = './uploads/'.$slide_query->thumb_name_multi;
			if(unlink($path_to_file)) {
            }else {
            }
		if($slide_query){    
            $slide_sort_db = $this->db->query ( "SELECT * FROM banner_uploads_multi WHERE sort_no > ".$slide_query->sort_no."" );
            $slide_sort = $slide_sort_db->result ();
                
                if($slide_sort){
                    foreach($slide_sort as $row) {
                        $data = array (
                        'sort_no' => $row->sort_no-1
                    );
	                    $this->db->where('id_image_multi',  $row->id_image_multi);
	                    $this->db->update ( 'banner_uploads_multi', $data );     
                    } 
                }
                $this->db->where('id_image_multi', $slide_query->id_image_multi);
                $this->db->delete('banner_uploads_multi');    
        }
	}

	function banner_update_image_multi($data) {
		$id = $this->input->post('id_image_multi');
		$for_id = $this->input->post('id_image');

		if($id == ''){

		}else{
			
			if($data['raw_name']!==""){
				$query = $this->db->query ( "SELECT * FROM banner_uploads_multi WHERE id_image_multi = ".$id." limit 1");
				$query_data = $query->row();
				$path_to_file = './uploads/'.$query_data->thumb_name_multi.$query_data->ext_multi;

				if(unlink($path_to_file) ) {	
				}else {
				}
			}

			$file=array(
				'thumb_name_multi'=>$data['raw_name'].'.jpg',
				'id_image_multi' => $id,
				'upload_date'=>date("Y-m-d H:i:s")
				);
			$this->db->where('id_image_multi', $id);
			$this->db->update('banner_uploads_multi',$file);
		}
	}

	function banner_check_id($id) {
		$query = $this->db->query ( "SELECT * FROM tbl_banner WHERE banner_id = ".$id."");
		if($query->num_rows()>0)
			return TRUE;
		else
			return FALSE;
		}

	public function banner_view($id) {
        $this->db->select('*');
        $this->db->from('tbl_banner');
        $this->db->where('banner_id',$id );
        $query = $this->db->get();
        return $result = $query->row_array();
    }

    function banner_multi($car_top_id) {
		$this->db->order_by('sort_no','desc');
		$this->db->where('banner_id',$car_top_id);
		$query = $this->db->get('banner_uploads_multi');
		return $query->result();
	}



	/////////////////////////////////contact- multi upload/////////////////////////////////



	function contact_view_multi($id) {
        $this->db->order_by('sort_no','desc');
		$this->db->where('contact_id',$id);
		$query = $this->db->get('contact_uploads_multi');
	   	return $query->result();
	}

	function contact_show_image_multi($a) {
		$d = $this->db->get_where('contact_uploads_multi', array('contact_id' => $a))->row();
		return $d;
	}

	function contact_edit_image_multi($id) {
		$d = $this->db->get_where('contact_uploads_multi', array('id_image_multi' => $id))->row();
		return $d;
	}

	function contact_delete_image_multi($id) {
		
        $slide_query_db = $this->db->query ( "SELECT * FROM contact_uploads_multi WHERE id_image_multi = ".$id."" );
        $slide_query = $slide_query_db->row ();
        $path_to_file = './uploads/'.$slide_query->thumb_name_multi;
			if(unlink($path_to_file)) {
            }else {
            }
		if($slide_query){    
            $slide_sort_db = $this->db->query ( "SELECT * FROM contact_uploads_multi WHERE sort_no > ".$slide_query->sort_no."" );
            $slide_sort = $slide_sort_db->result ();
                
                if($slide_sort){
                    foreach($slide_sort as $row) {
                        $data = array (
                        'sort_no' => $row->sort_no-1
                    );
	                    $this->db->where('id_image_multi',  $row->id_image_multi);
	                    $this->db->update ( 'contact_uploads_multi', $data );     
                    } 
                }
                $this->db->where('id_image_multi', $slide_query->id_image_multi);
                $this->db->delete('contact_uploads_multi');    
        }
	}

	function contact_update_image_multi($data) {
		$id = $this->input->post('id_image_multi');
		$for_id = $this->input->post('id_image');

		if($id == ''){

		}else{
			
			if($data['raw_name']!==""){
				$query = $this->db->query ( "SELECT * FROM contact_uploads_multi WHERE id_image_multi = ".$id." limit 1");
				$query_data = $query->row();
				$path_to_file = './uploads/'.$query_data->thumb_name_multi.$query_data->ext_multi;

				if(unlink($path_to_file) ) {	
				}else {
				}
			}

			$file=array(
				'thumb_name_multi'=>$data['raw_name'].'.jpg',
				'id_image_multi' => $id,
				'upload_date'=>date("Y-m-d H:i:s")
				);
			$this->db->where('id_image_multi', $id);
			$this->db->update('contact_uploads_multi',$file);
		}
	}

	function contact_check_id($id) {
		$query = $this->db->query ( "SELECT * FROM tbl_contact WHERE contact_id = ".$id."");
		if($query->num_rows()>0)
			return TRUE;
		else
			return FALSE;
		}

	public function contact_view($id) {
        $this->db->select('*');
        $this->db->from('tbl_contact');
        $this->db->where('contact_id',$id );
        $query = $this->db->get();
        return $result = $query->row_array();
    }

    function contact_multi($car_top_id) {
		$this->db->order_by('sort_no','desc');
		$this->db->where('contact_id',$car_top_id);
		$query = $this->db->get('contact_uploads_multi');
		return $query->result();
	}


	/////////////////////////////////news- multi upload/////////////////////////////////



	function news_view_multi($id) {
        $this->db->order_by('sort_no','desc');
		$this->db->where('news_id',$id);
		$query = $this->db->get('news_uploads_multi');
	   	return $query->result();
	}

	function news_show_image_multi($a) {
		$d = $this->db->get_where('news_uploads_multi', array('news_id' => $a))->row();
		return $d;
	}

	function news_edit_image_multi($id) {
		$d = $this->db->get_where('news_uploads_multi', array('id_image_multi' => $id))->row();
		return $d;
	}

	function news_delete_image_multi($id) {
		
        $slide_query_db = $this->db->query ( "SELECT * FROM news_uploads_multi WHERE id_image_multi = ".$id."" );
        $slide_query = $slide_query_db->row ();
        $path_to_file = './uploads/'.$slide_query->thumb_name_multi;
			if(unlink($path_to_file)) {
            }else {
            }
		if($slide_query){    
            $slide_sort_db = $this->db->query ( "SELECT * FROM news_uploads_multi WHERE sort_no > ".$slide_query->sort_no."" );
            $slide_sort = $slide_sort_db->result ();
                
                if($slide_sort){
                    foreach($slide_sort as $row) {
                        $data = array (
                        'sort_no' => $row->sort_no-1
                    );
	                    $this->db->where('id_image_multi',  $row->id_image_multi);
	                    $this->db->update ( 'news_uploads_multi', $data );     
                    } 
                }
                $this->db->where('id_image_multi', $slide_query->id_image_multi);
                $this->db->delete('news_uploads_multi');    
        }
	}

	function news_update_image_multi($data) {
		$id = $this->input->post('id_image_multi');
		$for_id = $this->input->post('id_image');

		if($id == ''){

		}else{
			
			if($data['raw_name']!==""){
				$query = $this->db->query ( "SELECT * FROM news_uploads_multi WHERE id_image_multi = ".$id." limit 1");
				$query_data = $query->row();
				$path_to_file = './uploads/'.$query_data->thumb_name_multi.$query_data->ext_multi;

				if(unlink($path_to_file) ) {	
				}else {
				}
			}

			$file=array(
				'thumb_name_multi'=>$data['raw_name'].'.jpg',
				'id_image_multi' => $id,
				'upload_date'=>date("Y-m-d H:i:s")
				);
			$this->db->where('id_image_multi', $id);
			$this->db->update('news_uploads_multi',$file);
		}
	}

	function news1_check_id($id) {
		$query = $this->db->query ( "SELECT * FROM tbl_news WHERE news_id = ".$id."");
		if($query->num_rows()>0)
			return TRUE;
		else
			return FALSE;
		}

	public function news_view1($id) {
        $this->db->select('*');
        $this->db->from('tbl_news');
        $this->db->where('news_id',$id );
        $query = $this->db->get();
        return $result = $query->row_array();
    }

    function news_multi() {
		$this->db->order_by('sort_no','desc');
		$query = $this->db->get('news_uploads_multi');
		return $query->result();
	}



/////////////////////////////////bank- upload/////////////////////////////////

	function bank_edit_image($data)
	{

		$id = $this->uri->segment(3);

		if($this->input->post('id_image') == ''){
				$file=array(
					'img_name'=>$data['raw_name'],
					'ext'=>$data['file_ext'],
					'bank_id' => $id,
					'upload_date'=>date("Y-m-d H:i:s")
					);
				$this->db->insert('bank_uploads',$file);	
		}else{
			$id = $this->uri->segment(3);

			if($data['raw_name']!==""){
				$query = $this->db->query ( "SELECT * FROM bank_uploads WHERE bank_id = ".$id." limit 1");
				$query_data = $query->row();
				
				$path_to_file1 = './uploads/'.$query_data->img_name."".$query_data->ext;

					if(unlink($path_to_file1) ) {	
					}
					else {
					}
			}
			$file=array(
				'img_name'=>$data['raw_name'],
				'ext'=>$data['file_ext'],
				'bank_id' => $id,
				'upload_date'=>date("Y-m-d H:i:s")
				);
			$this->db->where('id_image', $this->input->post('id_image'));
			$this->db->update('bank_uploads',$file);
		}
	}

	function bank_show_image($a) {
		$d = $this->db->get_where('bank_uploads', array('bank_id' => $a))->row();
		return $d;
	}

	function bank_delete_image($id) {	
	$query = $this->db->query ( "SELECT * FROM bank_uploads WHERE bank_id = ".$id." limit 1");
	$query_data = $query->row();

    if($query->num_rows()>0){
		$path_to_file1 = './uploads/'.$query_data->img_name."".$query_data->ext;

			if(unlink($path_to_file1) ) {
			}
			else {
			}
		$this->db->delete('bank_uploads', array('bank_id' => $id));
		return;
    }
	}

	function bank_check_id($id){
		$query = $this->db->query ( "SELECT * FROM tbl_bank WHERE bank_id = ".$id."");
		if($query->num_rows()>0)
			return TRUE;
		else
			return FALSE;
	}


	function bank_check_img($id){
		$query = $this->db->query ( "SELECT * FROM bank_uploads WHERE bank_id = ".$id."");
		if($query->num_rows()>0)
			return TRUE;
		else
			return FALSE;
	}

	public function bank_view($id) {

        $this->db->select('*');
        $this->db->from('tbl_bank');
        $this->db->where('bank_id',$id );
        $query = $this->db->get();
        return $result = $query->row_array();
    }


	

   /////////////////////////////////news- upload/////////////////////////////////

	function news_edit_image($data)
	{

		$id = $this->uri->segment(3);

		if($this->input->post('id_image') == ''){
				$file=array(
					'img_name'=>$data['raw_name'],
					'ext'=>$data['file_ext'],
					'news_id' => $id,
					'upload_date'=>date("Y-m-d H:i:s")
					);
				$this->db->insert('news_uploads',$file);	
		}else{
			$id = $this->uri->segment(3);

			if($data['raw_name']!==""){
				$query = $this->db->query ( "SELECT * FROM news_uploads WHERE news_id = ".$id." limit 1");
				$query_data = $query->row();
				
				$path_to_file1 = './uploads/'.$query_data->img_name."".$query_data->ext;

					if(unlink($path_to_file1) ) {	
					}
					else {
					}
			}
			$file=array(
				'img_name'=>$data['raw_name'],
				'ext'=>$data['file_ext'],
				'news_id' => $id,
				'upload_date'=>date("Y-m-d H:i:s")
				);
			$this->db->where('id_image', $this->input->post('id_image'));
			$this->db->update('news_uploads',$file);
		}
	}

	function news_show_image($a) {
		$d = $this->db->get_where('news_uploads', array('news_id' => $a))->row();
		return $d;
	}

	function news_delete_image($id) {	
	$query = $this->db->query ( "SELECT * FROM news_uploads WHERE news_id = ".$id." limit 1");
	$query_data = $query->row();

    if($query->num_rows()>0){
		$path_to_file1 = './uploads/'.$query_data->img_name."".$query_data->ext;

			if(unlink($path_to_file1) ) {
			}
			else {
			}
		$this->db->delete('news_uploads', array('news_id' => $id));
		return;
    }
	}

	function news_check_id($id){
		$query = $this->db->query ( "SELECT * FROM tbl_news WHERE news_id = ".$id."");
		if($query->num_rows()>0)
			return TRUE;
		else
			return FALSE;
	}


	function news_check_img($id){
		$query = $this->db->query ( "SELECT * FROM news_uploads WHERE news_id = ".$id."");
		if($query->num_rows()>0)
			return TRUE;
		else
			return FALSE;
	}

	public function news_view($id) {

        $this->db->select('*');
        $this->db->from('tbl_news');
        $this->db->where('news_id',$id );
        $query = $this->db->get();
        return $result = $query->row_array();
    }


    /////////////////////////////////product- upload/////////////////////////////////

	function product_edit_image($data)
	{

		$id = $this->uri->segment(3);

		if($this->input->post('id_image') == ''){
				$file=array(
					'img_name'=>$data['raw_name'],
					'thumb_name'=>$data['raw_name'].'_thumb',
					'ext'=>$data['file_ext'],
					'product_id' => $id,
					'upload_date'=>date("Y-m-d H:i:s")
					);
				$this->db->insert('product_uploads',$file);	
		}else{
			$id = $this->uri->segment(3);

			if($data['raw_name']!==""){
				$query = $this->db->query ( "SELECT * FROM product_uploads WHERE product_id = ".$id." limit 1");
				$query_data = $query->row();
				
				$path_to_file = './uploads/'.$query_data->thumb_name."".$query_data->ext;
				$path_to_file1 = './uploads/'.$query_data->img_name."".$query_data->ext;

					if(unlink($path_to_file) && unlink($path_to_file1) ) {	
					}
					else {
					}
			}
			$file=array(
				'img_name'=>$data['raw_name'],
				'thumb_name'=>$data['raw_name'].'_thumb',
				'ext'=>$data['file_ext'],
				'product_id' => $id,
				'upload_date'=>date("Y-m-d H:i:s")
				);
			$this->db->where('id_image', $this->input->post('id_image'));
			$this->db->update('product_uploads',$file);
		}
	}

	function product_show_image($a) {
		$d = $this->db->get_where('product_uploads', array('product_id' => $a))->row();
		return $d;
	}

	function product_delete_image($id) {	
	$query = $this->db->query ( "SELECT * FROM product_uploads WHERE product_id = ".$id." limit 1");
	$query_data = $query->row();

    if($query->num_rows()>0){
		$path_to_file = './uploads/'.$query_data->thumb_name."".$query_data->ext;
		$path_to_file1 = './uploads/'.$query_data->img_name."".$query_data->ext;

			if(unlink($path_to_file) && unlink($path_to_file1) ) {
			}
			else {
			}
		$this->db->delete('product_uploads', array('product_id' => $id));
		return;
    }
	}

	function product_check_id($id){
		$query = $this->db->query ( "SELECT * FROM tbl_product WHERE product_id = ".$id."");
		if($query->num_rows()>0)
			return TRUE;
		else
			return FALSE;
	}


	function product_check_img($id){
		$query = $this->db->query ( "SELECT * FROM product_uploads WHERE product_id = ".$id."");
		if($query->num_rows()>0)
			return TRUE;
		else
			return FALSE;
	}

	public function product_view($id) {

        $this->db->select('*');
        $this->db->from('tbl_product');
        $this->db->where('product_id',$id );
        $query = $this->db->get();
        return $result = $query->row_array();
    }


    /////////////////////////////////recommend- upload/////////////////////////////////

	function recommend_edit_image($data)
	{

		$id = $this->uri->segment(3);

		if($this->input->post('id_image') == ''){
				$file=array(
					'img_name'=>$data['raw_name'],
					'thumb_name'=>$data['raw_name'].'_thumb',
					'ext'=>$data['file_ext'],
					'recommend_id' => $id,
					'upload_date'=>date("Y-m-d H:i:s")
					);
				$this->db->insert('recommend_uploads',$file);	
		}else{
			$id = $this->uri->segment(3);

			if($data['raw_name']!==""){
				$query = $this->db->query ( "SELECT * FROM recommend_uploads WHERE recommend_id = ".$id." limit 1");
				$query_data = $query->row();
				
				$path_to_file = './uploads/'.$query_data->thumb_name."".$query_data->ext;
				$path_to_file1 = './uploads/'.$query_data->img_name."".$query_data->ext;

					if(unlink($path_to_file) && unlink($path_to_file1) ) {	
					}
					else {
					}
			}
			$file=array(
				'img_name'=>$data['raw_name'],
				'thumb_name'=>$data['raw_name'].'_thumb',
				'ext'=>$data['file_ext'],
				'recommend_id' => $id,
				'upload_date'=>date("Y-m-d H:i:s")
				);
			$this->db->where('id_image', $this->input->post('id_image'));
			$this->db->update('recommend_uploads',$file);
		}
	}

	function recommend_show_image($a) {
		$d = $this->db->get_where('recommend_uploads', array('recommend_id' => $a))->row();
		return $d;
	}

	function recommend_delete_image($id) {	
	$query = $this->db->query ( "SELECT * FROM recommend_uploads WHERE recommend_id = ".$id." limit 1");
	$query_data = $query->row();

    if($query->num_rows()>0){
		$path_to_file = './uploads/'.$query_data->thumb_name."".$query_data->ext;
		$path_to_file1 = './uploads/'.$query_data->img_name."".$query_data->ext;

			if(unlink($path_to_file) && unlink($path_to_file1) ) {
			}
			else {
			}
		$this->db->delete('recommend_uploads', array('recommend_id' => $id));
		return;
    }
	}

	function recommend_check_id($id){
		$query = $this->db->query ( "SELECT * FROM tbl_recommend WHERE recommend_id = ".$id."");
		if($query->num_rows()>0)
			return TRUE;
		else
			return FALSE;
	}


	function recommend_check_img($id){
		$query = $this->db->query ( "SELECT * FROM recommend_uploads WHERE recommend_id = ".$id."");
		if($query->num_rows()>0)
			return TRUE;
		else
			return FALSE;
	}

	public function recommend_view($id) {

        $this->db->select('*');
        $this->db->from('tbl_recommend');
        $this->db->where('recommend_id',$id );
        $query = $this->db->get();
        return $result = $query->row_array();
    }

    public function get_data_check_status($id="") {
    	$query = $this->db->query ( 'select status_id from tbl_car_top where car_top_id ='.$id.'' );
		$row = $query->row();
		$status_id = $row->status_id;
		return  $status_id;
    }

    public function get_data_check_mem($id="") {
    	$query = $this->db->query ( 'select id_login from tbl_car_top where car_top_id ='.$id.'' );
		$row = $query->row();
		$id_login = $row->id_login;
		return  $id_login;
    }

    public function get_check_email_car_top($id="") {
    	$query = $this->db->query ( 'select id_login from tbl_car_top where car_top_id ='.$id.'' );
		$row = $query->row();
		$id_login = $row->id_login;
		return  $id_login;
    }

    function get_data_member_email($id_login="") {
		$query = $this->db->query ( 'select * from tbl_login_member where id='.$id_login.'' );
		return $query->row_array();
	}

	public function check_car_to_buy($car_top_id="") {
    	$query = $this->db->query ( 'select  b.email
    		from 
    		tbl_car_top a 
    		left join tbl_login_member b on b.id = a.id_login
    		where a.car_top_id ='.$car_top_id.'' );
		$row = $query->row();
		$email = $row->email;
		return  $email;

    }

    public function check_car_to_buy_car($car_top_id="") {
    	$query = $this->db->query ( 'select  a.no_car
    		from 
    		tbl_car_top a 
    		left join tbl_login_member b on b.id = a.id_login
    		where a.car_top_id ='.$car_top_id.'' );
		$row = $query->row();
		$no_car = $row->no_car;
		return  $no_car;

    }

    public function check_car_to_buy_name($car_top_id="") {
    	$query = $this->db->query ( 'select  b.name
    		from 
    		tbl_car_top a 
    		left join tbl_login_member b on b.id = a.id_login
    		where a.car_top_id ='.$car_top_id.'' );
		$row = $query->row();
		$name = $row->name;
		return  $name;

    }

			
			
}
