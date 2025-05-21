<?php
if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );
	class Model_page extends CI_Model {

		public function __construct() {
			parent::__construct ();
			$this->load->library( 'session' );
	}

	function get_data_setting($id) {
		$query = $this->db->query ( 'select * from tbl_setting where setting_id ='.$id.'' );
		return $query->row_array ();
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
	function get_data_car_year_pro_text() {
			$query = $this->db->query ( 'SELECT * FROM tbl_car_model_des WHERE status_id = 1  ORDER BY name_year_pro asc' );
			return $query->result ();
	}

	function get_data_type($name_type="") {
		if(!empty($name_type)){
		$query = $this->db->query ( 'select * from tbl_car_type where car_type_id ='.$name_type.' order by position_id asc' );
		return $query->row_array ();
		}
	}

	function get_data_name($name="") {
		if(!empty($name)){
		$query = $this->db->query ( 'select * from tbl_car where car_id ='.$name.' order by position_id asc' );
		return $query->row_array ();
		}
	}

	function get_data_name_model($name_model="") {
		if(!empty($name_model)){
		$query = $this->db->query ( 'select * from tbl_car_model where car_model_id ='.$name_model.' order by position_id asc' );
		return $query->row_array ();
		}
	}

	function get_data_name_model_des($name_model_des="") {
		if(!empty($name_model_des)){
		$query = $this->db->query ( 'select * from tbl_car_model_des where car_model_des_id ='.$name_model_des.' order by position_id asc' );
		return $query->row_array ();
		}
	}

	function get_data_color($color="") {
		if(!empty($color)){
		$query = $this->db->query ( 'select * from tbl_car_color where car_color_id ='.$color.' order by position_id asc' );
		return $query->row_array ();
		}
	}

	function get_data_gear($gear="") {
		if(!empty($gear)){
		$query = $this->db->query ( 'select * from tbl_car_gear where car_gear_id ='.$gear.' order by position_id asc' );
		return $query->row_array ();
		}
	}


	function get_data_check_pass($id_login1="") {
		if(!empty($id_login1)){
		$query = $this->db->query ( 'select * from tbl_login_member where id='.$id_login1.'' );
		return $query->row_array ();
		}
	}

	function get_data_menu() {
		$query = $this->db->query ( 'select * from tbl_menu where status_id = 1 order by position_id asc' );
		return $query->result ();
	}

	function get_data_bank() {
		$query = $this->db->query ('
			select 
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
				where a.status_id = 1 order by a.position_id asc
			' );
		return $query->result ();
	}


	function get_data_bank_image($bank="") {
		$query = $this->db->query ('
			select 
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
				where a.status_id = 1  AND a.bank_id = '.$bank.'
			' );
		return $query->row_array ();
	}

	function get_data_bank_check($bank="") {
		$query = $this->db->query ( 'select * from tbl_bank where status_id = 1 AND bank_id = '.$bank.' limit 1' );
		return $query->row_array ();
	}

	
	function get_data_menu_footer() {
		$query = $this->db->query ( 'select * from tbl_menu where status_id = 1 AND position_id in(5,6) limit 2' );
		return $query->result ();
	}
	function get_data_menu_footer2() {
		$query = $this->db->query ( 'select * from tbl_menu where status_id = 1 AND position_id in(2,3,4) limit 3' );
		return $query->result ();
	}

	function car_top_delete_no_complete($id_login1="",$car_top_id_max1=""){
			$this->db->where('id_login',$id_login1);
			$this->db->where('check_sale_complete',"");
			$this->db->delete('tbl_car_top');
	}

	function get_data_banner() {

		if(empty($this->uri->segment(1)) OR $this->uri->segment(1)=="home"){
			$page = "home";
		}else{
			$page = $this->uri->segment(1);
		}

			$query = $this->db->query ( 'select * from banner_uploads_multi where page = "'.$page.'" AND status = 1  order by id_image_multi desc' );
			return $query->result ();
	}

	function get_data_banner_count() {

		if(empty($this->uri->segment(1)) OR $this->uri->segment(1)=="home"){
			$page = "home";
		}else{
			$page = $this->uri->segment(1);
		}

			$query = $this->db->query ( 'select count(*) as count_id from banner_uploads_multi where page = "'.$page.'" AND status = 1  order by id_image_multi desc' );
			return $query->row_array ();
	}



	

	
	function get_data_news_top() {

		$query1 = $this->db->query ( 'select max(position_id) as max_position_id from tbl_news');
		$row = $query1->row();

		if(!empty($row->max_position_id)){

			$query = $this->db->query ( 'select *
			 from tbl_news 
				where status_id = 1  AND position_id = '.$row->max_position_id.'
				' );
			return $query->result ();
		}
	}

	function get_data_news_view($news_id="") {
			$query = $this->db->query ( 'select *
			 from tbl_news where status_id = 1 AND img !="" AND title_th !=""
			 AND news_id = '.$news_id.'
				' );
			return $query->row_array ();
	}



	function get_data_news() {
			$query = $this->db->query ( 'select * from tbl_news 
				where status_id = 1 AND img !="" AND title_th !=""
				order by news_id desc
				limit 3' );
			return $query->result ();
	}


	function get_data_new_show($offsetnews="") {

		if(!empty($offsetnews)){
				$offset_show = 'OFFSET '.$offsetnews.'';
		}else{
				$offset_show = '';
		}

			$query = $this->db->query ( 'select * 
			 from tbl_news where status_id = 1 AND page_show = 1
				GROUP BY news_id order by news_id desc LIMIT 2 '.$offset_show.';
				' );
			return $query->result ();
	}

	

	// function get_data_news_all($offset="",$lang="",$page="") {

	// 		if(!empty($offset)){
	// 				$offset_show = 'OFFSET '.$offset.'';
	// 		}else{
	// 				$offset_show = '';
	// 		}

	// 		$query = $this->db->query ( 'select 
	// 			a.news_id as news_id,
	// 			a.title_th as title_th,
	// 			a.title_en as title_en,
	// 			a.description_th as description_th,
	// 			a.description_en as description_en,
	// 			a.status_id as status_id,
	// 			b.news_id as news_id1,
	// 			b.id_image as id_image,
	// 			b.img_name as img_name,
	// 			b.thumb_name as thumb_name,
	// 			b.ext as ext,
	// 			b.upload_date as upload_date,
	// 			b.news_id as news_id_img
	// 		 from tbl_news a 
	// 			left join news_uploads b on a.news_id = b.news_id
	// 			where a.status_id = 1 AND
	// 			a.news_id 
	// 		NOT IN(select 
	// 			max(a.news_id) as news_id
	// 			from tbl_news a 
	// 			left join news_uploads b on a.news_id = b.news_id
	// 			where a.status_id = 1 AND b.id_image !="" AND a.title_th !=""
	// 			order by a.news_id desc
	// 			)
	// 			order by a.news_id desc
	// 			 limit 12 '.$offset_show.'
	// 			' );
	// 		return $query->result ();
	// }

	function get_data_news_all($offset="",$lang="",$page="") {

		
			$query1 = $this->db->query ( 'select max(position_id) as max_position_id from tbl_news');
		    $row = $query1->row();

		    if(!empty($row->max_position_id)){


			$query = $this->db->query ( 'select
			    a.position_id as position_id, 
				a.news_id as news_id,
				a.title_th as title_th,
				a.title_en as title_en,
				a.description_th as description_th,
				a.description_en as description_en,
				a.status_id as status_id,
				a.img as img
			 from tbl_news a 
				where a.status_id = 1 AND
				a.position_id not in('.$row->max_position_id.') 

				 UNION ALL

				 select 
				    aa.position_id as position_id, 
				 	aa.adv_id as news_id,
				    "" as title_th,
					"" as title_en,
					"" as description_th,
					"" as description_en,
					aa.status_id as status_id,
					aa.img as img
				 from tbl_adv aa
				 where aa.status_id = 1
                 order by position_id DESC limit 12 OFFSET '.$offset.'' );
			return $query->result ();
		}
		
		
	}



	function get_data_count_all($offset="",$lang="",$page="") {

			$query1 = $this->db->query ( 'select max(position_id) as max_position_id from tbl_news');
		    $row = $query1->row();

			$query = $this->db->query ('
			SELECT COUNT(*) as count
			FROM
			(
				select
			    a.position_id as count
				
			 from tbl_news a 
				where a.status_id = 1

				 UNION ALL

				 select 
				    aa.position_id as count
				 from tbl_adv aa
				 where aa.status_id = 1 
                 
              )  as count'
             );
			return $query->row_array ();
	}


	function get_data_count_news() {

			$query = $this->db->query ('SELECT position_id as count
			 from tbl_news 
				where status_id = 1');
			return $query->row_array ();
	}



	function get_data_car_top() {
		$query = $this->db->query ('SELECT
			a.*,b.*
		FROM
			tbl_car_top a
		LEFT JOIN gallery_uploads_multi b ON a.car_top_id = b.car_top_id
		WHERE a.status_id = 1 AND a.check_sale_complete = "complete"  GROUP BY a.car_top_id order by a.car_top_id desc' );
		return $query->result ();
	}


	function get_data_car_top_edit($car_top_id_text="") {
		if(!empty($car_top_id_text)){
		$query = $this->db->query ('SELECT
			a.*,b.*
		FROM
			tbl_car_top a
		LEFT JOIN gallery_uploads_multi b ON a.car_top_id = b.car_top_id
		

		
		WHERE  a.car_top_id = '.@$car_top_id_text.'' );
		return $query->row_array ();
		}
	}


	function get_data_car_top_home() {
		$query = $this->db->query ('SELECT
			a.car_top_id as car_top_id,a.status_id,
			a.name_price,
			a.name_year_pro,
			b.status,
			-- a.*,b.*,
			b.thumb_name_multi,
			t.car_type_id as car_type_id_t,
			t.name_type_th as name_type_th_t,
			t.name_type_en as name_type_en_t,
			t.position_id as position_id_t,

			o.car_id as car_id_o,
			o.name_th as name_th_o,
			o.name_en as name_en_o,
			o.position_id as position_id_o,
			o.status_id as status_id_o,
			o.car_type_id as car_type_id_o,

			m.car_model_id as car_model_id2,
			m.name_model_th as name_model_th2,
			m.name_model_en as name_model_en2,
			m.position_id as position_id2,
			m.status_id as status_id2,
			m.car_id as car_id2,

			d.car_model_des_id as car_model_des_id3,
			d.name_model_des_th as car_model_des_th3,
			d.name_model_des_en as car_model_des_en3,
			d.position_id as position_id3,
			d.status_id as status_id3,
			d.car_model_id as car_model_id3

		FROM
			tbl_car_top a
		LEFT JOIN gallery_uploads_multi b ON a.car_top_id = b.car_top_id
		LEFT JOIN tbl_car_type t ON t.car_type_id = a.car_type_id 
		LEFT JOIN tbl_car o ON o.car_id = a.car_id 
		LEFT JOIN tbl_car_model m ON m.car_model_id = a.car_model_id
		LEFT JOIN tbl_car_model_des d ON d.car_model_des_id = a.car_model_des_id
		WHERE a.status_id = 3  AND a.check_sale_complete = "complete"  AND a.status_delete = 0 GROUP BY a.car_top_id order by a.car_top_id desc limit 12' );
		return $query->result ();
	}

	function get_data_car_top_home2() {
		$query = $this->db->query ('SELECT
			a.car_top_id as car_top_id,a.status_id,
			a.name_year_pro,
			a.name_price,
			b.status,
			b.thumb_name_multi,
			-- a.*,b.*,
			t.car_type_id as car_type_id_t,
			t.name_type_th as name_type_th_t,
			t.name_type_en as name_type_en_t,
			t.position_id as position_id_t,

			o.car_id as car_id_o,
			o.name_th as name_th_o,
			o.name_en as name_en_o,
			o.position_id as position_id_o,
			o.status_id as status_id_o,
			o.car_type_id as car_type_id_o,

			m.car_model_id as car_model_id2,
			m.name_model_th as name_model_th2,
			m.name_model_en as name_model_en2,
			m.position_id as position_id2,
			m.status_id as status_id2,
			m.car_id as car_id2,

			d.car_model_des_id as car_model_des_id3,
			d.name_model_des_th as car_model_des_th3,
			d.name_model_des_en as car_model_des_en3,
			d.position_id as position_id3,
			d.status_id as status_id3,
			d.car_model_id as car_model_id3
		FROM
			tbl_car_top a
		LEFT JOIN gallery_uploads_multi b ON a.car_top_id = b.car_top_id
		LEFT JOIN tbl_car_type t ON t.car_type_id = a.car_type_id 
		LEFT JOIN tbl_car o ON o.car_id = a.car_id 
		LEFT JOIN tbl_car_model m ON m.car_model_id = a.car_model_id
		LEFT JOIN tbl_car_model_des d ON d.car_model_des_id = a.car_model_des_id
		WHERE a.status_id in(1,4)  AND a.check_sale_complete = "complete" AND a.status_delete = 0 GROUP BY a.car_top_id order by a.car_top_id desc limit 12' );
		return $query->result ();
	}


	function get_data_car_top_home_count() {
		$query = $this->db->query ('SELECT a.*
		FROM
			tbl_car_top a
		LEFT JOIN gallery_uploads_multi b ON a.car_top_id = b.car_top_id
		LEFT JOIN tbl_car_type t ON t.car_type_id = a.car_type_id 
		LEFT JOIN tbl_car o ON o.car_id = a.car_id 
		LEFT JOIN tbl_car_model m ON m.car_model_id = a.car_model_id
		LEFT JOIN tbl_car_model_des d ON d.car_model_des_id = a.car_model_des_id
		WHERE a.status_id = 3  AND a.check_sale_complete = "complete"  AND a.status_delete = 0 GROUP BY a.car_top_id order by a.car_top_id desc limit 12' );
		return $query->row_array ();
	}

	function get_data_car_top_home2_count() {
		$query = $this->db->query ('SELECT
			a.* FROM
			tbl_car_top a
		LEFT JOIN gallery_uploads_multi b ON a.car_top_id = b.car_top_id
		LEFT JOIN tbl_car_type t ON t.car_type_id = a.car_type_id 
		LEFT JOIN tbl_car o ON o.car_id = a.car_id 
		LEFT JOIN tbl_car_model m ON m.car_model_id = a.car_model_id
		LEFT JOIN tbl_car_model_des d ON d.car_model_des_id = a.car_model_des_id
		WHERE a.status_id = 1  AND a.check_sale_complete = "complete" AND a.status_delete = 0 GROUP BY a.car_top_id order by a.car_top_id desc limit 12' );
		return $query->row_array ();
	}


	function get_data_car_top_buy($car_top_id="") {
		$query = $this->db->query ('SELECT
		a.car_type_id,
		a.no_car,
		a.car_id,
		a.car_model_id,
		a.car_model_des_id,
		a.car_top_id,
		a.name_type,
		a.name,
		a.name_model,
		a.name_model_des,
		a.name_gear,
		a.name_capacity,
		a.name_mile,
		a.province,
		a.device,
		a.name_price,
		a.name_year_regis,
		a.name_year_pro,
		a.name_color,
		a.position_id,
		a.status_id,
		a.id_login,
		a.lang,
		a.descript,
		a.created_date,
		a.modify_date,
		a.check_sale_complete,
		b.id_image_multi,
		b.gallery_id,
		b.thumb_name_multi,
		b.upload_date,
		b.car_top_id as car_top_id1,
		b.status,
		b.sort_no
		
		FROM
			tbl_car_top a
		LEFT JOIN gallery_uploads_multi b ON a.car_top_id = b.car_top_id
		WHERE a.status_id in (1,3) AND a.check_sale_complete = "complete" AND a.status_delete = 0 AND a.car_top_id NOT IN ("'.$car_top_id.'") GROUP BY a.car_top_id order by a.car_top_id desc limit 3' );
		return $query->result ();
	}


	function get_data_car_top_buy_email($car_top_id="") {
		$query = $this->db->query ('SELECT * FROM tbl_car_top where car_top_id='.$car_top_id.' limit 1' );
		return $query->row_array ();
	}



	function data_car_top($car_top_id_max1="",$id_login1="") {
		$query = $this->db->query ( 'select * from tbl_car_top where car_top_id ='.$car_top_id_max1.' AND id_login ='.$id_login1.'' );
		return $query->row_array ();
	}


	function get_data_login($id_login1="") {
		$query = $this->db->query ( 'select * from tbl_login_member where id ='.$id_login1.'' );
		return $query->row_array ();
	}

	function get_data_car_top1($id_login1="",$car_top_id_max1="") {
		$query = $this->db->query ( 'select * from tbl_car_top where car_top_id ='.$car_top_id_max1.' AND id_login ='.$id_login1.'' );
		return $query->row_array ();
	}



	function get_data_about($id) {
		$query = $this->db->query ( 'select * from tbl_about where about_id ='.$id.'' );
		return $query->row_array ();
	}

	function get_data_finance1() {
		$query = $this->db->query ( 'select * from tbl_finance where position_id = 1 AND status_id = 1' );
		return $query->row_array ();
	}
	function get_data_finance2() {
		$query = $this->db->query ( 'select * from tbl_finance where position_id = 2  AND status_id = 1' );
		return $query->row_array ();
	}
	function get_data_finance3() {
		$query = $this->db->query ( 'select * from tbl_finance where position_id = 3  AND status_id = 1' );
		return $query->row_array ();
	}

	function get_data_contact($id) {
		$query = $this->db->query ( 'select * from tbl_contact where contact_id ='.$id.'' );
		return $query->row_array ();
	}


	function get_data_contact_facebook($id) {
		$query = $this->db->query ( 'select facebook from tbl_contact where contact_id ='.$id.'' );
		return $query->row_array ();
	}

	function get_data_contact_twitter($id) {
		$query = $this->db->query ( 'select twitter from tbl_contact where contact_id ='.$id.'' );
		return $query->row_array ();
	}

	function get_data_contact_instragram($id) {
		$query = $this->db->query ( 'select instragram from tbl_contact where contact_id ='.$id.'' );
		return $query->row_array ();
	}

	function get_data_map($id) {
		$query = $this->db->query ( 'select * from tbl_map where map_id ='.$id.'' );
		return $query->row_array ();
	}

/*----------------/ magement - contact (suggestion_add) /---------------------------*/

		function suggestion_add(){
			 $topic = $this->input->post('topic');
			 $name = $this->input->post('name');
			 $email = $this->input->post('email');
			 $tel = $this->input->post('tel');
			 $description = $this->input->post('description');
			 $lang = $this->input->post('lang');
			 $check_count_comment = 1;
			 $data = array(
            	'topic' => $topic,
            	'name' => $name,
            	'email' => $email,
            	'tel' => $tel,
            	'description' => $description,
            	'lang' => $lang,
            	'check_count_comment' => $check_count_comment
            );
			 $this->db->insert('tbl_suggestion', $data);
		}


/*----------------/ magement - edit resume /---------------------------*/

		

		function sale_resume_edit($id){


			$data_update = array (
				'name' =>  $this->input->post('name'),
				'tel' =>  $this->input->post('tel'),
				'modify_date' =>  date('Y-m-d h:i:s')
				
		
			);
			$this->db->where('id',  $id);
			$this->db->update ( 'tbl_login_member', $data_update );	
		}

		function sale_password_edit($id,$pass){

			$data_update = array (
				'password' =>  md5($pass),
				'modify_date_password' =>  date('Y-m-d h:i:s'),
				'modify_date' =>  date('Y-m-d h:i:s')
			);
			$this->db->where('id',  $id);
			$this->db->update ( 'tbl_login_member', $data_update );	
		}


/*----------------/ magement - car_view_save /---------------------------*/

		function car_view_save($car_top_id=""){

			$data_update = array (
				'name_price' =>  $this->input->post('price'),
				'descript' =>  $this->input->post('descript'),
				'modify_date' =>  date('Y-m-d h:i:s')
		
			);
			$this->db->where('car_top_id',$car_top_id);
			$this->db->update ( 'tbl_car_top', $data_update );	

		}



//////////////////////////////////////////////-- sale --//////////////////////////////////////////////////////////

	function get_check_pass($id="") {
		$query = $this->db->query ( 'select * from tbl_login_member where id = '.$this->input->get('id_login').'' );
		$row = $query->row();
		 $password = $row->password;
		return  $password;
	}


	function get_data_resume($id_login="") {
		$query = $this->db->query ( 'select * from tbl_login_member where id = '.$id_login.'' );
		return $query->row_array ();
	}

	function get_data_province() {
		$query = $this->db->query ( 'select * from tbl_province order by province_id asc' );
		return $query->result ();
	}

	function get_data_price() {
		$query = $this->db->query ( 'select * from tbl_car_price where status_id = 1 order by position_id asc' );
		return $query->result ();
	}
	function get_data_mile() {
		$query = $this->db->query ( 'select * from tbl_car_mile where status_id = 1 order by position_id asc' );
		return $query->result ();
	}

	function get_data_car_type() {
		$query = $this->db->query ( 'select * from tbl_car_type where status_id = 1 order by position_id asc' );
		return $query->result ();
	}

	function get_data_car($car_type_id="") {
		if(!empty($car_type_id)){
			$query = $this->db->query ( 'select * from tbl_car where car_type_id ='.$car_type_id.' AND status_id = 1 order by position_id asc' );
			return $query->result ();
		}
	}

	function get_data_car_model($car_id="") {

			if(!empty($car_id)){
				$query = $this->db->query ( 'select * from tbl_car_model where car_id = '.$car_id.' AND status_id = 1 order by position_id asc' );
				return $query->result ();
			}
		}

	function get_data_car_model_des($car_model_id="") {

			if(!empty($car_model_id)){
				$query = $this->db->query ( 'select * from tbl_car_model_des where car_model_id = '.$car_model_id.' AND status_id = 1 order by position_id asc' );
				return $query->result ();
			}
		}


	function get_data_car_type1() {
		$query = $this->db->query ( 'select * from tbl_car_type where status_id = 1 order by position_id asc ' );
		return $query->result ();
	}

	function get_data_car1() {
			$query = $this->db->query ( 'select * from tbl_car where status_id = 1 order by position_id asc' );
			return $query->result ();
	}

	function get_data_car_model1() {

				$query = $this->db->query ( 'select * from tbl_car_model where status_id = 1 order by position_id asc ' );
				return $query->result ();
		}

	function get_data_car_model_des1() {

				$query = $this->db->query ( 'select * from tbl_car_model_des where  status_id = 1 order by position_id asc' );
				return $query->result ();
		}

/*--------------------------------------------------------------------*/

	function get_data_car_type_buy() {
		$query = $this->db->query ( 'select * from tbl_car_type where status_id = 1  order by car_type_id desc' );
		return $query->result ();
	}

	function get_data_car_buy($car_type_id="") {

		if(empty($car_type_id)){
			$query = $this->db->query ( 'select * from tbl_car where  status_id = 1 order by car_id desc' );
			return $query->result ();
		}else{
			$query = $this->db->query ( 'select * from tbl_car where  status_id = 1 AND car_type_id = '.$car_type_id.'  order by car_id desc' );
			return $query->result ();
		}
	
	}

	function get_data_car_model_buy($car_id="") {
		if(empty($car_id)){	
			$query = $this->db->query ( 'select * from tbl_car_model where  status_id = 1  order by car_model_id desc' );
			return $query->result ();
		}else{
			$query = $this->db->query ( 'select * from tbl_car_model where  status_id = 1 AND car_id = '.$car_id.'  order by car_model_id desc' );
			return $query->result ();
		}
	}

	function get_data_car_model_des_buy($car_model_id="") {
		if(empty($car_model_id)){	
			$query = $this->db->query ( 'select * from tbl_car_model_des where  status_id = 1  order by car_model_des_id desc' );
			return $query->result ();
		}else{
			$query = $this->db->query ( 'select * from tbl_car_model_des where  status_id = 1 AND car_model_id = '.$car_model_id.' order by car_model_des_id desc' );
			return $query->result ();
		}

	}


	// function get_data_car_buy1() {
	// 	$query = $this->db->query ( 'select * from tbl_car where  status_id = 1  order by car_id desc' );
	// 	return $query->result ();
		
	// }

	function get_data_car_buy1() {
		$query = $this->db->query ( 'SELECT 
			a.* ,b.*
			FROM tbl_car a 
			RIGHT JOIN tbl_car_type b ON b.car_type_id = a.car_type_id
			where  a.status_id = 1  
			order by a.position_id asc' );
		return $query->result ();
		
	}
	

	// function get_data_car_model_buy1() {
	// 	$query = $this->db->query ( 'select * from tbl_car_model where  status_id = 1  order by car_model_id desc' );
	// 	return $query->result ();
	
	// }

	function get_data_car_model_buy1() {
		$query = $this->db->query ( 'SELECT 
			a.* ,b.*
			FROM tbl_car_model a 
			RIGHT JOIN tbl_car b ON b.car_id = a.car_id
			RIGHT JOIN tbl_car_type c ON c.car_type_id = b.car_type_id
			where  a.status_id = 1  
			order by a.position_id asc' );
		return $query->result ();
	
	}

	function get_data_car_model_des_buy1() {
		
		$query = $this->db->query ( 'SELECT 
			a.* ,b.*
			FROM tbl_car_model_des a 
			RIGHT JOIN tbl_car_model b ON b.car_model_id = a.car_model_id
			RIGHT JOIN tbl_car c ON c.car_id = b.car_id
			RIGHT JOIN tbl_car_type t ON t.car_type_id = c.car_type_id
			where  a.status_id = 1  
			order by a.position_id asc' );
		return $query->result ();

	}


	// function get_data_car_model_des_buy1() {
		
	// 	$query = $this->db->query ( 'select * from tbl_car_model_des where  status_id = 1  order by car_model_des_id desc' );
	// 	return $query->result ();

	// }

/*--------------------------------------------------------------------*/
	function get_data_edit_profile($id) {
		
			$query = $this->db->query ( 'select * from tbl_login_member where id ='.$id.'' );
			return $query->result ();

		}

	function edit_image_profile($id){
			$slide_query_db = $this->db->query ( "SELECT * FROM tbl_login_member WHERE id = ".$id."" );
	        $slide_query = $slide_query_db->row ();
	        $path_to_file = './uploads/'.$slide_query->img;
			if(@unlink($path_to_file)) {
	        }

			$image_info = $this->upload->data();

			$data_update = array (
			'img' => $image_info['file_name']
			);
			$this->db->where('id',  $id);
			$this->db->update ( 'tbl_login_member', $data_update );	
	}

	function get_data_car_color() {
		$query = $this->db->query ( 'select * from tbl_car_color where status_id = 1 order by position_id asc' );
		return $query->result ();
	}

	function get_data_car_year() {
		$query = $this->db->query ( 'select * from tbl_car_year where status_id = 1 order by position_id asc' );
		return $query->result ();
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

	function get_data_car_gear() {
		$query = $this->db->query ( 'select * from tbl_car_gear where status_id = 1 order by position_id asc' );
		return $query->result ();
	}

	function get_data_car_capacity() {
		$query = $this->db->query ( 'select * from tbl_car_capacity where status_id = 1 order by position_id asc' );
		return $query->result ();
	}

	function get_data_car_device() {
		$query = $this->db->query ( 'select * from tbl_device' );
		return $query->result ();
	}

	

	/*----------------/ magement - car top /-------------- -------------*/

	  function car_top_edit($car_top_id_text=""){

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

			
			$data_update = array (
				'province' =>  $this->input->post('province'),
				'modify_date' => date('Y-m-d h:i:s'),
				'car_type_id' => @$this->input->post('name_type'),
				'car_id' => @$this->input->post('name'),
				'car_model_id' => @$this->input->post('name_model'),
				'car_model_des_id' => @$this->input->post('name_model_des'),
				'name_type' => @$row->name_type_th,
				'name' => @$row1->name_th,
				'name_model' => @$row2->name_model_th,
				'name_model_des' => @$ro,
				'name_color' => $this->input->post('name_color'),
				'name_year_pro' => $this->input->post('name_year_pro'),
				'name_gear' => $this->input->post('name_gear'),
				'name_capacity' => $this->input->post('name_capacity'),
				'name_mile' => $this->input->post('name_mile'),
				'name_price' => $this->input->post('name_price'),
				'downpayment' => $this->input->post('downpayment'),
				'device' => $device1,
				'descript' => $this->input->post('descript')

			);
			$this->db->where('car_top_id',  $car_top_id_text);
			$this->db->update ( 'tbl_car_top', $data_update );	
		}


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
			 $id_login = $this->input->get('id_login');
			 $province = $this->input->post('province');
			 $car_type_id = @$this->input->post('name_type');
			 $car_id = @$this->input->post('name');
			 $car_model_id = @$this->input->post('name_model');
			 $car_model_des_id = @$this->input->post('name_model_des');
			 $name_type = @$row->name_type_th;
			 $name = @$row1->name_th;
			 $name_model = @$row2->name_model_th;
			 $name_model_des = @$ro;
			 $name_color = $this->input->post('name_color');
			 $name_year_pro = $this->input->post('name_year_pro');
			 $name_gear = $this->input->post('name_gear');
			 $name_capacity = $this->input->post('name_capacity');
			 $name_mile = $this->input->post('name_mile');
			 $name_price = $this->input->post('name_price');
			 $downpayment = $this->input->post('downpayment');
			 $device = $device1;
			 $status_id = 2;
			 $lang = $this->input->post('lang');
			 $descript = $this->input->post('descript');
			 $created_date = date('Y-m-d h:i:s');
			 $data = array(
			 'no_car' => $random,
			 'id_login' => $id_login,
			 'province' => $province,
			 'car_type_id' => @$car_type_id,
			 'car_id' => @$car_id,
			 'car_model_id' => @$car_model_id,
			 'car_model_des_id' => @$car_model_des_id,
			 'car_model_des_id' => @$car_model_des_id,
			 'name_type' => @$name_type,
			 'name' => @$name,
			 'name_model' => @$name_model,
			 'name_model_des' => @$name_model_des,
			 'name_color' => $name_color,
			 'name_year_pro' => $name_year_pro,
			 'name_gear' => $name_gear,
			 'name_capacity' => $name_capacity,
			 'name_mile' => $name_mile,
			 'name_price' => $name_price,
			 'downpayment' => $downpayment,
			 'device' => $device,
			 'status_id' => $status_id,
			 'lang' => $lang,
			 'descript' => $descript,
			 'created_date' => $created_date
            );
			 $this->db->insert('tbl_car_top', $data);
		}

	function car_upload($id_login1="",$car_top_id=""){

		for($i=1;$i<=4;$i++){
			$id_login = $id_login1;
			$sort_id = $i;
			$data = array(
				'id_login' => $id_login,
				'gallery_id' => 1,
				'car_top_id' => $car_top_id,
				'sort_no' => $i
	        );
			$this->db->insert('gallery_uploads_multi', $data);
		}
	}


	function car_upload_file($id_login1="",$car_top_id=""){

		for($i=1;$i<=2;$i++){
			$id_login = $id_login1;
			$sort_id = $i;
			$data = array(
				'id_login' => $id_login,
				'gallery_id' => 1,
				'car_top_id' => $car_top_id,
				'sort_no' => $i
	        );
			$this->db->insert('file_uploads_multi', $data);
		}
	}


	function check_id($id_login="") {
		$query = $this->db->query ( "select * from tbl_car_top where id_login=".$id_login." order by car_top_id desc limit 1");
		return $query->row_array ();
	}
	function check_id1($id_login1="") {
		$query = $this->db->query ( "select * from tbl_car_top where id_login=".$id_login1." order by car_top_id desc limit 1");
		//return $query;
		$row = $query->row();
        $car_top_id = $row->car_top_id;

        return $car_top_id;
	}

	

	function count_max_id($id_login1="",$car_top_id_max1="") {
		$query = $this->db->query ( "select count(*) as count_max from gallery_uploads_multi where id_login=".$id_login1." AND car_top_id=".$car_top_id_max1."");
		$row = $query->row();
        $count_max = $row->count_max;

        return $count_max;
	}

	function count_max_id1($id_login1="",$car_top_id_text="") {
		$query = $this->db->query ( "select count(*) as count_max from gallery_uploads_multi where id_login=".$id_login1." AND car_top_id=".$car_top_id_max1."");
		$row = $query->row();
        $count_max = $row->count_max;

        return $count_max;
	}

	function count_max_file_id($id_login1="",$car_top_id_max1="") {
		$query = $this->db->query ( "select count(*) as count_max from file_uploads_multi where id_login=".$id_login1." AND car_top_id=".$car_top_id_max1."");
		$row = $query->row();
        $count_max = $row->count_max;

        return $count_max;
	}

	function check_image_4($id_login1="",$car_top_id_max1="") {
		$query = $this->db->query ( "select count(*) as count_img from gallery_uploads_multi where thumb_name_multi !='' AND id_login=".$id_login1." AND car_top_id=".$car_top_id_max1." AND sort_no IN(1,2,3,4)");
		$row = $query->row();
        $count_img = $row->count_img;

        return $count_img;
	}

	function check_image_2($id_login1="",$car_top_id_max1="") {
		$query = $this->db->query ( "select count(*) as count_file from file_uploads_multi where thumb_name_multi !='' AND id_login=".$id_login1." AND car_top_id=".$car_top_id_max1." AND sort_no IN(1,2)");
		$row = $query->row();
        $count_file = $row->count_file;

        return $count_file;
	}

	function check_image_2_text($id_login1="",$car_top_id_text="") {
		$query = $this->db->query ( "select count(*) as count_file from file_uploads_multi where thumb_name_multi !='' AND car_top_id=".$car_top_id_text." AND sort_no IN(1,2)");
		$row = $query->row();
        $count_file = $row->count_file;

        return $count_file;
	}


	function check_id2($id_login="") {
		$query = $this->db->query ( "select * from tbl_car_top where id_login=".$id_login." order by car_top_id desc limit 1");
		//return $query;
		$row = $query->row();
        $car_top_id = $row->car_top_id;

        return $car_top_id;
	}

	function check_max_car_top_id($id_login1="",$car_top_id) {
		$query = $this->db->query ( "select * from gallery_uploads_multi where id_login=".$id_login1." AND car_top_id = ".$car_top_id." order by car_top_id desc limit 1");
		//return $query;
		$row = $query->row();

		if(!empty($row->id_image_multi)){
			$id_image_multi = $row->id_image_multi;
		}else{
			$id_image_multi = "";
		}
        

        return $id_image_multi;
	}

	function check_max_car_top_id_file($id_login1="",$car_top_id) {
		$query = $this->db->query ( "select * from file_uploads_multi where id_login=".$id_login1." AND car_top_id = ".$car_top_id." order by car_top_id desc limit 1");
		//return $query;
		$row = $query->row();
        $id_image_multi = $row->id_image_multi;

        return $id_image_multi;
	}

	function check_max_car_top_id_file_text($car_top_id_text="") {

		if(!empty($car_top_id_text)){
		$query = $this->db->query ( "select * from file_uploads_multi where car_top_id = ".$car_top_id_text." order by car_top_id desc limit 1");
		//return $query;
		$row = $query->row();
        $id_image_multi = $row->id_image_multi;

        return $id_image_multi;
    	}
	}

	function gallery_check_id($id) {
		$query = $this->db->query ( "SELECT * FROM tbl_gallery WHERE gallery_id = ".$id."");
		if($query->num_rows()>0)
			return TRUE;
		else
			return FALSE;
		}


	function show_1($id="",$car_top_id_text="",$id_login="") {
		$query = $this->db->query ( "select * from gallery_uploads_multi where car_top_id=".$car_top_id_text." AND id_login = ".$id_login." AND sort_no = 1");
		return $query->result();
	}

	function show_2($id="",$car_top_id_text="",$id_login="") {
		$query = $this->db->query ( "select * from gallery_uploads_multi where car_top_id=".$car_top_id_text." AND id_login = ".$id_login." AND sort_no = 2");
		return $query->result();
	}

	function show_3($id="",$car_top_id_text="",$id_login="") {
		$query = $this->db->query ( "select * from gallery_uploads_multi where car_top_id=".$car_top_id_text." AND id_login = ".$id_login." AND sort_no = 3");
		return $query->result();
	}

	function show_4($id="",$car_top_id_text="",$id_login="") {
		$query = $this->db->query ( "select * from gallery_uploads_multi where car_top_id=".$car_top_id_text." AND id_login = ".$id_login." AND sort_no = 4");
		return $query->result();
	}
	function show_all($id="",$car_top_id_text="",$id_login="") {
		$query = $this->db->query ( "select * from gallery_uploads_multi where car_top_id=".$car_top_id_text." AND id_login = ".$id_login." AND sort_no not in(1,2,3,4) order by sort_no asc"); 
		return $query->result();
	}
	function check_show_all($id="",$car_top_id="",$id_login="") {
		$query = $this->db->query ( "select * from gallery_uploads_multi where car_top_id=".$car_top_id." AND id_login = ".$id_login." AND sort_no not in(1,2,3,4) order by sort_no desc"); 
		if($query->num_rows()>0){
			$text = "TRUE";
			
		}else{
			$text = "FALSE";
			
		}
		return $text;
	}

	function show_11($id="",$car_top_id_text="",$id_login="") {
		$query = $this->db->query ( "select * from gallery_uploads_multi where car_top_id=".$car_top_id_text."  AND sort_no = 1");
		return $query->result();
	}

	function show_22($id="",$car_top_id_text="",$id_login="") {
		$query = $this->db->query ( "select * from gallery_uploads_multi where car_top_id=".$car_top_id_text."  AND sort_no = 2");
		return $query->result();
	}

	function show_33($id="",$car_top_id_text="",$id_login="") {
		$query = $this->db->query ( "select * from gallery_uploads_multi where car_top_id=".$car_top_id_text."  AND sort_no = 3");
		return $query->result();
	}

	function show_44($id="",$car_top_id_text="",$id_login="") {
		$query = $this->db->query ( "select * from gallery_uploads_multi where car_top_id=".$car_top_id_text."  AND sort_no = 4");
		return $query->result();
	}
	function show_all11($id="",$car_top_id_text="",$id_login="") {
		$query = $this->db->query ( "select * from gallery_uploads_multi where car_top_id=".$car_top_id_text."  AND sort_no not in(1,2,3,4) order by sort_no asc"); 
		return $query->result();
	}


	function check_show_all11($id="",$car_top_id_text="",$id_login="") {
		$query = $this->db->query ( "select * from gallery_uploads_multi where car_top_id=".$car_top_id_text."  AND sort_no not in(1,2,3,4) order by sort_no desc"); 
		if($query->num_rows()>0){
			$text = "TRUE";
			
		}else{
			$text = "FALSE";
			
		}
		return $text;
	}
		
	

	function gallery_multi($id="",$car_top_id="",$id_login="") {
		$query = $this->db->query ( "select * from gallery_uploads_multi where car_top_id=".$car_top_id." AND id_login = ".$id_login."  AND sort_no in (1) order by car_top_id desc limit 4");
		return $query->result();
	}

	function gallery_multi2($id="",$car_top_id="",$id_login="") {
		$query = $this->db->query ( "select * from gallery_uploads_multi where car_top_id=".$car_top_id." AND id_login = ".$id_login."  AND sort_no in (2,3,4) order by car_top_id desc limit 4");
		return $query->result();
	}

	function gallery_multi1($id="",$car_top_id="",$id_login="") {
		$query = $this->db->query ( "select * from gallery_uploads_multi where car_top_id=".$car_top_id." AND id_login = ".$id_login." AND sort_no not in (1,2,3,4) order by car_top_id desc limit 15");
		return $query->result();
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
            
            $file=array(
				'status'=>'delete'
				);
			$this->db->where('id_image_multi', $slide_query->id_image_multi);
			$this->db->update('gallery_uploads_multi',$file);
                
        }
	}


	function gallery_delete_image_multi_4($id) {
		
        $slide_query_db = $this->db->query ( "SELECT * FROM gallery_uploads_multi WHERE id_image_multi = ".$id."" );
        $slide_query = $slide_query_db->row ();
        $path_to_file = './uploads_car/'.$slide_query->thumb_name_multi;
			if(unlink($path_to_file)) {
            }else {
            }
		if($slide_query){    
            $slide_sort_db = $this->db->query ( "SELECT * FROM gallery_uploads_multi WHERE sort_no > ".$slide_query->sort_no."" );
            $slide_sort = $slide_sort_db->result ();
                
              
            $file=array(
            	'upload_date' =>"",
            	'thumb_name_multi' =>"",
				'status'=>'delete'
				);
			$this->db->where('id_image_multi', $slide_query->id_image_multi);
			$this->db->update('gallery_uploads_multi',$file);
                
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
				'upload_date'=>date("Y-m-d H:i:s"),
				'status'=>'no'
				);
			$this->db->where('id_image_multi', $id);
			$this->db->update('gallery_uploads_multi',$file);
		}
	}

	

	public function gallery_view($id) {
        $this->db->select('*');
        $this->db->from('tbl_gallery');
        $this->db->where('gallery_id',$id );
        $query = $this->db->get();
        return $result = $query->row_array();
    }





    //////////////////////////////////////file/////////////////////////////////////////////////


    	function file_multi($id="",$car_top_id="",$id_login="") {
		$query = $this->db->query ( "select * from file_uploads_multi where car_top_id=".$car_top_id." AND id_login = ".$id_login." AND sort_no =  1 order by car_top_id desc limit 1");
		// $this->db->order_by('sort_no','desc');
		// $this->db->where('file_id',$id);
		// $query = $this->db->get('file_uploads_multi');
		return $query->result();
	}

	function file_multi1($id="",$car_top_id="",$id_login="") {
		$query = $this->db->query ( "select * from file_uploads_multi where car_top_id=".$car_top_id." AND id_login = ".$id_login." AND sort_no =  2 order by car_top_id desc limit 1");
		// $this->db->order_by('sort_no','desc');
		// $this->db->where('file_id',$id);
		// $query = $this->db->get('file_uploads_multi');
		return $query->result();
	}


function file_multi_text($id="",$car_top_id="") {
		$query = $this->db->query ( "select * from file_uploads_multi where car_top_id=".$car_top_id." AND sort_no =  1 order by car_top_id desc limit 1");
		// $this->db->order_by('sort_no','desc');
		// $this->db->where('file_id',$id);
		// $query = $this->db->get('file_uploads_multi');
		return $query->result();
	}

	function file_multi1_text($id="",$car_top_id="") {
		$query = $this->db->query ( "select * from file_uploads_multi where car_top_id=".$car_top_id."  AND sort_no =  2 order by car_top_id desc limit 1");
		// $this->db->order_by('sort_no','desc');
		// $this->db->where('file_id',$id);
		// $query = $this->db->get('file_uploads_multi');
		return $query->result();
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
                
                // if($slide_sort){
                //     foreach($slide_sort as $row) {
                //         $data = array (
                //         'sort_no' => $row->sort_no-1
                //     );
	               //      $this->db->where('id_image_multi',  $row->id_image_multi);
	               //      $this->db->update ( 'file_uploads_multi', $data );     
                //     } 
                // }
                // $this->db->where('id_image_multi', $slide_query->id_image_multi);
                // $this->db->delete('file_uploads_multi');
            
            $file=array(
            	'upload_date' =>"",
            	'thumb_name_multi' =>"",
				'status'=>'delete'
				);
			$this->db->where('id_image_multi', $slide_query->id_image_multi);
			$this->db->update('file_uploads_multi',$file);
                
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
				'upload_date'=>date("Y-m-d H:i:s"),
				'status'=>'no'
				);
			$this->db->where('id_image_multi', $id);
			$this->db->update('file_uploads_multi',$file);
		}
	}


	function car_top_complete($id_login1="",$car_top_id_max1=""){
			$data_update = array (
				'check_sale_complete' =>  "complete",
				'status_id' =>  0
			);
			$this->db->where('car_top_id',  $car_top_id_max1);
			$this->db->where('id_login',  $id_login1);
			$this->db->update ( 'tbl_car_top', $data_update );	
	}

	function car_top_comment($id_login1="",$car_top_id_max1=""){
			$data_update = array (
				'comment_member' =>  $this->input->post('comment_member')
			);
			$this->db->where('car_top_id',  $car_top_id_max1);
			$this->db->where('id_login',  $id_login1);
			$this->db->update ( 'tbl_car_top', $data_update );	
	}

	function get_data_history_sale($id_login=""){
		$query = $this->db->query ( 'SELECT
			a.*,b.*,a.car_top_id as car_top_id , b.car_top_id as car_top_id1,
			t.car_type_id as car_type_id_t,
			t.name_type_th as name_type_th_t,
			t.name_type_en as name_type_en_t,
			t.position_id as position_id_t,

			o.car_id as car_id_o,
			o.name_th as name_th_o,
			o.name_en as name_en_o,
			o.position_id as position_id_o,
			o.status_id as status_id_o,
			o.car_type_id as car_type_id_o,

			m.car_model_id as car_model_id2,
			m.name_model_th as name_model_th2,
			m.name_model_en as name_model_en2,
			m.position_id as position_id2,
			m.status_id as status_id2,
			m.car_id as car_id2,

			d.car_model_des_id as car_model_des_id3,
			d.name_model_des_th as car_model_des_th3,
			d.name_model_des_en as car_model_des_en3,
			d.position_id as position_id3,
			d.status_id as status_id3,
			d.car_model_id as car_model_id3,

			cc.name_color_th,cc.name_color_en,
			g.name_gear_th,g.name_gear_en,
			ca.name_capacity_th,ca.name_capacity_en


		FROM
			tbl_car_top a
		LEFT JOIN gallery_uploads_multi b ON b.car_top_id = a.car_top_id
		LEFT JOIN tbl_car_type t ON t.car_type_id = a.car_type_id 
		LEFT JOIN tbl_car o ON o.car_id = a.car_id 
		LEFT JOIN tbl_car_model m ON m.car_model_id = a.car_model_id
		LEFT JOIN tbl_car_model_des d ON d.car_model_des_id = a.car_model_des_id

		LEFT JOIN tbl_car_color cc ON cc.name_color_th = a.name_color OR cc.name_color_en = a.name_color
		LEFT JOIN tbl_car_gear g ON g.name_gear_th = a.name_gear OR g.name_gear_en = a.name_gear
		LEFT JOIN tbl_car_capacity ca ON ca.name_capacity_th = a.name_capacity OR ca.name_capacity_en = a.name_capacity

	
		WHERE
		a.id_login = '.$id_login.'
		AND
		a.check_sale_complete = "complete" AND
		a.status_delete = 0
		GROUP BY a.car_top_id
		ORDER BY
			a.car_top_id DESC
		' );
		return $query->result();
	}


	function get_data_history_buy($id_login=""){
		$query = $this->db->query ( 'SELECT
			a.car_top_id as car_top_id,
			a.buy_car_id,
			a.id_login as id_login,
			a.bank_id,a.interest_rate,a.interest_rate_result,a.downpayment as downpayment_buy,a.installment_period,a.installment_amount,a.price as price_buy,
			b.car_top_id as car_top_id1,
			b.id_image_multi,b.thumb_name_multi,
			b.id_login as id_login1,
			c.car_top_id as car_top_id2,
			c.id_login as id_login2,
			c.*,
			t.car_type_id as car_type_id_t,
			t.name_type_th as name_type_th_t,
			t.name_type_en as name_type_en_t,
			t.position_id as position_id_t,

			o.car_id as car_id_o,
			o.name_th as name_th_o,
			o.name_en as name_en_o,
			o.position_id as position_id_o,
			o.status_id as status_id_o,
			o.car_type_id as car_type_id_o,

			m.car_model_id as car_model_id2,
			m.name_model_th as name_model_th2,
			m.name_model_en as name_model_en2,
			m.position_id as position_id2,
			m.status_id as status_id2,
			m.car_id as car_id2,

			d.car_model_des_id as car_model_des_id3,
			d.name_model_des_th as car_model_des_th3,
			d.name_model_des_en as car_model_des_en3,
			d.position_id as position_id3,
			d.status_id as status_id3,
			d.car_model_id as car_model_id3,

			cc.name_color_th,cc.name_color_en,
			g.name_gear_th,g.name_gear_en,
			ca.name_capacity_th,ca.name_capacity_en,

			bb.bank_name_en,bb.bank_name_th
		FROM
			tbl_buy_car a
		LEFT JOIN tbl_car_top c ON a.car_top_id = c.car_top_id
		LEFT JOIN gallery_uploads_multi b ON b.car_top_id = a.car_top_id
		LEFT JOIN tbl_car_type t ON t.car_type_id = c.car_type_id 
		LEFT JOIN tbl_car o ON o.car_id = c.car_id 
		LEFT JOIN tbl_car_model m ON m.car_model_id = c.car_model_id
		LEFT JOIN tbl_car_model_des d ON d.car_model_des_id = c.car_model_des_id

		LEFT JOIN tbl_car_color cc ON cc.name_color_th = c.name_color OR cc.name_color_en = c.name_color
		LEFT JOIN tbl_car_gear g ON g.name_gear_th = c.name_gear OR g.name_gear_en = c.name_gear
		LEFT JOIN tbl_car_capacity ca ON ca.name_capacity_th = c.name_capacity OR ca.name_capacity_en = c.name_capacity

		LEFT JOIN tbl_bank bb ON bb.bank_id = a.bank_id
		WHERE
		a.id_login = '.$id_login.'
		group by  a.buy_car_id
		ORDER BY
			a.buy_car_id DESC
		' );
		return $query->result();
	}

	function get_data_history_sale1($id_login=""){
		$query = $this->db->query ( 'SELECT
			a.*,b.*,a.car_top_id as car_top_id , b.car_top_id as car_top_id1
		FROM
			tbl_car_top a
		LEFT JOIN gallery_uploads_multi b ON b.car_top_id = a.car_top_id
		WHERE
		a.id_login = '.$id_login.'
		AND
		a.check_sale_complete = "complete"
		GROUP BY a.car_top_id
		ORDER BY
			a.car_top_id DESC
		' );
		$row = $query->row();
        $id = $row->id;

        return $id;
	}

	function check_buy($id_login="",$car_top_id=""){

		if(!empty($id_login) AND !empty($car_top_id)){
		$query = $this->db->query ( 'select buy_car_id from tbl_buy_car where id_login ='.$id_login.' AND car_top_id = '.$car_top_id.'' );

         if($query->num_rows()>0){
			$buy_car_id = "TRUE";
			}else{
				$buy_car_id = "FALSE";
			}
			return $buy_car_id;
    	}
	}

	function get_data_history_sale_count($id_login=""){
		$query = $this->db->query ( 'SELECT
			a.*,b.*,a.car_top_id as car_top_id , b.car_top_id as car_top_id1
		FROM
			tbl_car_top a
		LEFT JOIN gallery_uploads_multi b ON b.car_top_id = a.car_top_id
		WHERE
		a.id_login = '.$id_login.'
		AND
		a.check_sale_complete = "complete"
		AND
		a.status_delete = 0
		GROUP BY a.car_top_id
		ORDER BY
			a.car_top_id DESC
		' );
		if($query->num_rows()>0){
			$check = "TRUE";
		}else{
			$check = "FALSE";
		}
		return $check;
	}

	function get_data_history_buy_count($id_login=""){
		$query = $this->db->query ( 'SELECT
			a.*,b.*,a.car_top_id as car_top_id , b.car_top_id as car_top_id1
		FROM
			tbl_buy_car a
		LEFT JOIN gallery_uploads_multi b ON b.car_top_id = a.car_top_id
		WHERE
		a.id_login = '.$id_login.'
		GROUP BY a.car_top_id
		ORDER BY
			a.car_top_id DESC
		' );
		if($query->num_rows()>0){
			$check = "TRUE";
		}else{
			$check = "FALSE";
		}
		return $check;
	}

	
	function get_data_car_all(){
		$query = $this->db->query ( 'SELECT
			a.*,b.*,a.car_top_id as car_top_id , b.car_top_id as car_top_id1
		FROM
			tbl_car_top a
		LEFT JOIN gallery_uploads_multi b ON b.car_top_id = a.car_top_id
		WHERE
		a.check_sale_complete = "complete"
		AND a.status_id = 1
		GROUP BY a.car_top_id
		ORDER BY
			a.car_top_id DESC
		' );
		return $query->result();
	}

	function get_data_car_view($car_top_id=""){
		$query = $this->db->query ( 'SELECT a.car_type_id,
		a.no_car,
		a.car_id,
		a.car_model_id,
		a.car_model_des_id,
		a.car_top_id,
		a.name_type,
		a.name,
		a.name_model,
		a.name_model_des,
		a.name_gear,
		a.name_capacity,
		a.name_mile,
		a.province,
		a.device,
		a.name_price,
		a.name_year_regis,
		a.name_year_pro,
		a.name_color,
		a.position_id,
		a.status_id,
		a.id_login,
		a.lang,
		a.descript,
		a.created_date,
		a.modify_date,
		a.check_sale_complete,
		a.downpayment,
		a.downpayment_check,
		a.bank_id,
		b.id,
		b.email,
		b.tel,
		b.password,
		b.name as name_lastname,
		b.gender,
		b.address_no,
		b.province,
		b.district,
		b.area,
		b.road,
		b.zipcode,
		b.birthday,


			t.car_type_id as car_type_id_t,
			t.name_type_th as name_type_th_t,
			t.name_type_en as name_type_en_t,
			t.position_id as position_id_t,

			o.car_id as car_id_o,
			o.name_th as name_th_o,
			o.name_en as name_en_o,
			o.position_id as position_id_o,
			o.status_id as status_id_o,
			o.car_type_id as car_type_id_o,

			m.car_model_id as car_model_id2,
			m.name_model_th as name_model_th2,
			m.name_model_en as name_model_en2,
			m.position_id as position_id2,
			m.status_id as status_id2,
			m.car_id as car_id2,

			d.car_model_des_id as car_model_des_id3,
			d.name_model_des_th as car_model_des_th3,
			d.name_model_des_en as car_model_des_en3,
			d.position_id as position_id3,
			d.status_id as status_id3,
			d.car_model_id as car_model_id3,

			cc.name_color_th,cc.name_color_en,
			g.name_gear_th,g.name_gear_en,
			ca.name_capacity_th,ca.name_capacity_en

		FROM tbl_car_top a
		LEFT JOIN tbl_login_member b ON b.id = a.id_login
		LEFT JOIN tbl_car_type t ON t.car_type_id = a.car_type_id 
		LEFT JOIN tbl_car o ON o.car_id = a.car_id 
		LEFT JOIN tbl_car_model m ON m.car_model_id = a.car_model_id
		LEFT JOIN tbl_car_model_des d ON d.car_model_des_id = a.car_model_des_id
		LEFT JOIN tbl_car_color cc ON cc.name_color_th = a.name_color OR cc.name_color_en = a.name_color
		LEFT JOIN tbl_car_gear g ON g.name_gear_th = a.name_gear OR g.name_gear_en = a.name_gear
		LEFT JOIN tbl_car_capacity ca ON ca.name_capacity_th = a.name_capacity OR ca.name_capacity_en = a.name_capacity
		WHERE car_top_id = '.$car_top_id.'');
		return $query->row_array();
	}

	
	function get_data_car_bank($car_top_id=""){
		$query = $this->db->query ( 'SELECT a.car_type_id,
		a.no_car,
		a.car_id,
		a.car_model_id,
		a.car_model_des_id,
		a.car_top_id,
		a.name_type,
		a.name,
		a.name_model,
		a.name_model_des,
		a.name_gear,
		a.name_capacity,
		a.name_mile,
		a.province,
		a.device,
		a.name_price,
		a.name_year_regis,
		a.name_year_pro,
		a.name_color,
		a.position_id,
		a.status_id,
		a.id_login,
		a.lang,
		a.descript,
		a.created_date,
		a.modify_date,
		a.check_sale_complete,
		a.downpayment,
		a.bank_id,
		b.id,
		b.email,
		b.tel,
		b.password,
		b.name as name_lastname,
		b.gender,
		b.address_no,
		b.province,
		b.district,
		b.area,
		b.road,
		b.zipcode,
		b.birthday,


			t.car_type_id as car_type_id_t,
			t.name_type_th as name_type_th_t,
			t.name_type_en as name_type_en_t,
			t.position_id as position_id_t,

			o.car_id as car_id_o,
			o.name_th as name_th_o,
			o.name_en as name_en_o,
			o.position_id as position_id_o,
			o.status_id as status_id_o,
			o.car_type_id as car_type_id_o,

			m.car_model_id as car_model_id2,
			m.name_model_th as name_model_th2,
			m.name_model_en as name_model_en2,
			m.position_id as position_id2,
			m.status_id as status_id2,
			m.car_id as car_id2,

			d.car_model_des_id as car_model_des_id3,
			d.name_model_des_th as car_model_des_th3,
			d.name_model_des_en as car_model_des_en3,
			d.position_id as position_id3,
			d.status_id as status_id3,
			d.car_model_id as car_model_id3,

			cc.car_color_id as car_color_id_cc,
			cc.name_color_th as name_color_th_cc,
			cc.name_color_en as name_color_en_cc,
			cc.position_id as position_id_cc,
			cc.status_id as status_id_cc,

			gg.car_gear_id as car_gear_id_gg,
			gg.name_gear_th as name_gear_th_gg,
			gg.name_gear_en as name_gear_en_gg,
			gg.position_id as position_id_gg,
			gg.status_id as status_id_gg

		FROM tbl_car_top a
		LEFT JOIN tbl_login_member b ON b.id = a.id_login
		LEFT JOIN tbl_car_type t ON t.car_type_id = a.car_type_id 
		LEFT JOIN tbl_car o ON o.car_id = a.car_id 
		LEFT JOIN tbl_car_model m ON m.car_model_id = a.car_model_id
		LEFT JOIN tbl_car_model_des d ON d.car_model_des_id = a.car_model_des_id
		LEFT JOIN tbl_car_color cc ON cc.name_color_th = a.name_color
		LEFT JOIN tbl_car_gear gg ON gg.name_gear_th = a.name_gear
		WHERE car_top_id = '.$car_top_id.'');
		return $query->row_array();
	}


	function get_data_car_view1($car_top_id=""){


		$query = $this->db->query ( 'SELECT a.car_type_id,
		a.no_car,
		a.car_id,
		a.car_model_id,
		a.car_model_des_id,
		a.car_top_id,
		a.name_type,
		a.name,
		a.name_model,
		a.name_model_des,
		a.name_gear,
		a.name_capacity,
		a.name_mile,
		a.province,
		a.device,
		a.name_price,
		a.name_year_regis,
		a.name_year_pro,
		a.name_color,
		a.position_id,
		a.status_id,
		a.id_login,
		a.lang,
		a.descript,
		a.created_date,
		a.modify_date,
		a.check_sale_complete,
		a.downpayment,
		b.id,
		b.email,
		b.tel,
		b.password,
		b.name as name_lastname,
		b.gender,
		b.address_no,
		b.province,
		b.district,
		b.area,
		b.road,
		b.zipcode,
		b.birthday,

		t.car_type_id as car_type_id_t,
		t.name_type_th as name_type_th_t,
		t.name_type_en as name_type_en_t,
		t.position_id as position_id_t,

		o.car_id as car_id_o,
		o.name_th as name_th_o,
		o.name_en as name_en_o,
		o.position_id as position_id_o,
		o.status_id as status_id_o,
		o.car_type_id as car_type_id_o,

		m.car_model_id as car_model_id2,
		m.name_model_th as name_model_th2,
		m.name_model_en as name_model_en2,
		m.position_id as position_id2,
		m.status_id as status_id2,
		m.car_id as car_id2,

		d.car_model_des_id as car_model_des_id3,
		d.name_model_des_th as car_model_des_th3,
		d.name_model_des_en as car_model_des_en3,
		d.position_id as position_id3,
		d.status_id as status_id3,
		d.car_model_id as car_model_id3,

		cc.name_color_th,cc.name_color_en,
		g.name_gear_th,g.name_gear_en,
		ca.name_capacity_th,ca.name_capacity_en


		FROM tbl_car_top a
		LEFT JOIN tbl_login_member b ON b.id = a.id_login
		LEFT JOIN tbl_car_type t ON t.car_type_id = a.car_type_id 
		LEFT JOIN tbl_car o ON o.car_id = a.car_id 
		LEFT JOIN tbl_car_model m ON m.car_model_id = a.car_model_id
		LEFT JOIN tbl_car_model_des d ON d.car_model_des_id = a.car_model_des_id

		LEFT JOIN tbl_car_color cc ON cc.name_color_th = a.name_color OR cc.name_color_en = a.name_color
		LEFT JOIN tbl_car_gear g ON g.name_gear_th = a.name_gear OR g.name_gear_en = a.name_gear
		LEFT JOIN tbl_car_capacity ca ON ca.name_capacity_th = a.name_capacity OR ca.name_capacity_en = a.name_capacity

		WHERE a.car_top_id = '.$car_top_id.'');
		return $query->row_array();

		
	}

	function get_data_car_view_email(){
		$query = $this->db->query ( 'SELECT email FROM tbl_login_admin  limit 1 ');
		$row = $query->row();
		$email = $row->email;
		return $email;
	}

	function get_data_car_view2(){
		$query = $this->db->query ( 'SELECT * FROM tbl_login_admin  limit 1 ');
		return $query->row_array();
	}

	function get_data_email(){
		$query = $this->db->query ( 'SELECT * FROM tbl_login_admin');
		return $query->result();
	}

	function get_data_car_view_buy($car_buy_id=""){
		$query = $this->db->query ( 'SELECT a.bank_id as bank_id,
			a.buy_car_id,
			a.id_login,
			a.interest_rate,
			a.interest_rate_result,
			a.downpayment,
			a.installment_period,
			a.installment_amount,
			a.car_top_id as car_top_id,
			b.bank_id as bank_id1,
			b.four_year,
			b.five_year, 
			b.six_year, 
			b.seven_year, 
			b.bank_name_th, 
			b.bank_name_en, 
			b.status_id, 
			b.position_id
			FROM tbl_buy_car a 
			LEFT JOIN tbl_bank b ON a.bank_id = b.bank_id
			where a.buy_car_id='.$car_buy_id.' limit 1 ');
		return $query->row_array();
	}

	function get_data_c($car_top_id="",$id_login1=""){

		if(!empty($id_login1)){
			$query = $this->db->query ( 'SELECT a.bank_id as bank_id,
				a.buy_car_id,
				a.id_login,
				a.interest_rate,
				a.interest_rate_result,
				a.downpayment,
				a.installment_period,
				a.installment_amount,
				a.status,
				a.car_top_id as car_top_id,
				b.bank_id as bank_id1,
				b.four_year,
				b.five_year, 
				b.six_year, 
				b.seven_year, 
				b.bank_name_th, 
				b.bank_name_en, 
				b.status_id, 
				b.position_id,
				c.*
				FROM tbl_buy_car a 
				LEFT JOIN tbl_bank b ON a.bank_id = b.bank_id
				LEFT JOIN tbl_login_member c ON c.id = a.id_login
				where a.car_top_id='.$car_top_id.' AND c.id='.$id_login1.' AND a.status = 1');
			return $query->row_array();
		}else{

			$query = $this->db->query ( 'SELECT a.bank_id as bank_id,
				a.buy_car_id,
				a.id_login,
				a.interest_rate,
				a.interest_rate_result,
				a.downpayment,
				a.installment_period,
				a.installment_amount,
				a.status,
				a.car_top_id as car_top_id,
				b.bank_id as bank_id1,
				b.four_year,
				b.five_year, 
				b.six_year, 
				b.seven_year, 
				b.bank_name_th, 
				b.bank_name_en, 
				b.status_id, 
				b.position_id,
				c.*
				FROM tbl_buy_car a 
				LEFT JOIN tbl_bank b ON a.bank_id = b.bank_id
				LEFT JOIN tbl_login_member c ON c.id = a.id_login
				where a.car_top_id='.$car_top_id.'  AND a.status = 1');
			return $query->row_array();

		}
		
	}

	

	function get_data_car_view_check($car_top_id=""){
		if(!empty($car_top_id)){
		$query = $this->db->query ( 'SELECT a.id_login
		FROM tbl_car_top a
		LEFT JOIN tbl_login_member b ON b.id = a.id_login
		WHERE car_top_id = '.$car_top_id.'');
		$row = $query->row();
		$id_login = $row->id_login;
		return $id_login;
		}
	}

	function get_data_car_view_($car_top_id=""){
		if(!empty($car_top_id)){
		$query = $this->db->query ( 'SELECT name_price
		FROM tbl_car_top 
		WHERE car_top_id = '.$car_top_id.'');
		$row = $query->row();
		$name_price = $row->name_price;
		return $name_price;
		}
	}

	function get_data_car_view_check11($car_top_id=""){
		if(!empty($car_top_id)){
		$query = $this->db->query ( 'SELECT a.downpayment
		FROM tbl_car_top a
		LEFT JOIN tbl_login_member b ON b.id = a.id_login
		WHERE car_top_id = '.$car_top_id.'');
		$row = $query->row();
		$downpayment = $row->downpayment;
		return $downpayment;
		}
	}

	function get_data_car_view_buy1($car_buy_id="",$id_login=""){
		$query = $this->db->query ( 'SELECT
			a.*
			,b.*,
			c.name as name_lastname,
			c.email,
			c.tel,
			t.car_type_id as car_type_id_t,
			t.name_type_th as name_type_th_t,
			t.name_type_en as name_type_en_t,
			t.position_id as position_id_t,

			o.car_id as car_id_o,
			o.name_th as name_th_o,
			o.name_en as name_en_o,
			o.position_id as position_id_o,
			o.status_id as status_id_o,
			o.car_type_id as car_type_id_o,

			m.car_model_id as car_model_id2,
			m.name_model_th as name_model_th2,
			m.name_model_en as name_model_en2,
			m.position_id as position_id2,
			m.status_id as status_id2,
			m.car_id as car_id2,

			d.car_model_des_id as car_model_des_id3,
			d.name_model_des_th as car_model_des_th3,
			d.name_model_des_en as car_model_des_en3,
			d.position_id as position_id3,
			d.status_id as status_id3,
			d.car_model_id as car_model_id3,

			cc.name_color_th,cc.name_color_en,
			g.name_gear_th,g.name_gear_en,
			ca.name_capacity_th,ca.name_capacity_en

		FROM
			tbl_buy_car a
		LEFT JOIN tbl_car_top b ON a.car_top_id = b.car_top_id
		LEFT JOIN tbl_car_type t ON t.car_type_id = b.car_type_id 
		LEFT JOIN tbl_car o ON o.car_id = b.car_id 
		LEFT JOIN tbl_car_model m ON m.car_model_id = b.car_model_id
		LEFT JOIN tbl_car_model_des d ON d.car_model_des_id = b.car_model_des_id
		LEFT JOIN tbl_login_member c ON c.id = b.id_login

		LEFT JOIN tbl_car_color cc ON cc.name_color_th = b.name_color OR cc.name_color_en = b.name_color
		LEFT JOIN tbl_car_gear g ON g.name_gear_th = b.name_gear OR g.name_gear_en = b.name_gear
		LEFT JOIN tbl_car_capacity ca ON ca.name_capacity_th = b.name_capacity OR ca.name_capacity_en = b.name_capacity

		WHERE
			a.buy_car_id = '.$car_buy_id.'');
		return $query->row_array();
	}

	function get_data_car_image1($car_top_id=""){

		if(!empty($car_top_id)){
			$query = $this->db->query ( 'SELECT * FROM gallery_uploads_multi WHERE car_top_id = '.$car_top_id.' and sort_no = 1 limit 1 ');
			return $query->result();
		}
	}

	function get_data_car_image($car_top_id="",$offset="",$limit=""){
		if(!empty($car_top_id)){
			if(!empty($offset)){
					$offset_show = 'OFFSET '.$offset.'';
			}else{
					$offset_show = '';
			}

			 $query = $this->db->query ( 'SELECT * FROM gallery_uploads_multi WHERE car_top_id = '.$car_top_id.'  
			 	  ORDER BY sort_no asc LIMIT 9  '.$offset_show.'');
			
			return $query->result();
		}
	}

	function get_data_car_image_count($car_top_id=""){

		if(!empty($car_top_id)){
			$query = $this->db->query ( 'SELECT count(*) as count_all FROM gallery_uploads_multi WHERE car_top_id = '.$car_top_id.' AND  sort_no != 1 order by sort_no asc');
			$row = $query->row();
			$count_all1 = $row->count_all;
			return $count_all1;
		}
	}

	function get_data_car_image_buy1($id_login=""){
		$query = $this->db->query ( 'SELECT * FROM gallery_uploads_multi WHERE id_login = '.$id_login.' order by sort_no desc limit 1 ');
		return $query->result();
	}


	function get_data_car_file($car_top_id=""){
		if(!empty($car_top_id)){
			$query = $this->db->query ( 'SELECT * FROM file_uploads_multi WHERE car_top_id = '.$car_top_id.' AND sort_no=1');
			return $query->row_array();
		}
	}

	function get_data_car_file2($car_top_id=""){
		if(!empty($car_top_id)){
		$query = $this->db->query ( 'SELECT * FROM file_uploads_multi WHERE car_top_id = '.$car_top_id.' AND sort_no=2');
		return $query->row_array();
		}
	}

	function search_all($offset="",$lang="",$page=""){


/*--------------------------------------------ถ้าเลือก-----------------------------------------------------------*/

		if($this->input->get('car_type_id') OR $this->input->get('car_id') OR $this->input->get('car_model_id') OR $this->input->get('car_model_des_id')){

			if(!empty($offset)){
					$offset_show = 'OFFSET '.$offset.'';
			}else{
					$offset_show = '';
			}

				if(empty($check_search)){
					$check_search = "";
				}

				if($this->input->post('keyword')){
					
					$check_search = " AND (a.no_car LIKE '%".$this->input->post('keyword')."%' 
					OR a.name_type  LIKE '%".$this->input->post('keyword')."%'
					OR a.name LIKE '%".$this->input->post('keyword')."%'
					OR a.name_model LIKE '%".$this->input->post('keyword')."%'
					OR a.name_model_des LIKE '%".$this->input->post('keyword')."%'
					OR a.province LIKE '%".$this->input->post('keyword')."%'
					OR a.name_year_pro LIKE '%".$this->input->post('keyword')."%'
					OR a.name_year_regis LIKE '%".$this->input->post('keyword')."%'
					OR a.name_color LIKE '%".$this->input->post('keyword')."%'
					OR a.device LIKE '%".$this->input->post('keyword')."%'
					OR a.name_gear LIKE '%".$this->input->post('keyword')."%'
					OR a.name_capacity LIKE '%".$this->input->post('keyword')."%'
					OR a.name_mile LIKE '%".$this->input->post('keyword')."%'
					OR a.name_price LIKE '%".$this->input->post('keyword')."%'

				)";
				}

				if($this->input->post('name_type')){
					$check_type = " AND a.car_type_id  = ".$this->input->post('name_type');
				}else{
					$check_type = "";
				}

				if($this->input->post('name')){
					if($this->input->post('name')!="" AND $this->input->post('name_type')==""){
						$check_car = " AND a.car_id  = ".$this->input->post('name');
					}else{
						$query_name1 = $this->db->query ( 'SELECT * FROM tbl_car_top where car_id = '.$this->input->post('name').'');
						$row_name1 = $query_name1->row();
						if(!empty($row_name1->name)){
							$check_car = " AND (a.name LIKE '%".$row_name1->name."%')";
						}else{
							$check_car = "";
						}
						
					}
				}else{
					$check_car = "";
				}


				if($this->input->post('name_model')){
					$check_model = " AND a.car_model_id  = ".$this->input->post('name_model');
				}else{
					$check_model = "";
				}

				if($this->input->post('name_model_des')){
				 	$check_model_des = " AND a.car_model_des_id  = ".$this->input->post('name_model_des');
				}else{
					$check_model_des = "";
				}

				if($this->input->post('year_min')!="" AND $this->input->post('year_max')!=""){
                  	$check_year_pro = " AND a.name_year_pro  BETWEEN ".$this->input->post('year_min')." AND ".$this->input->post('year_max')." ";
              	}elseif($this->input->post('year_min')!="" AND $this->input->post('year_max')==""){
                    $check_year_pro = " AND a.name_year_pro  BETWEEN ".$this->input->post('year_min')." AND ".date("Y")." ";
               	}elseif($this->input->post('year_min')=="" AND $this->input->post('year_max')==""){
               		$check_year_pro = "";
               	}
				if($this->input->post('color')){
					$query_color1 = $this->db->query ( 'SELECT * FROM tbl_car_color where car_color_id = '.$this->input->post('color').'');
					$row_color1 = $query_color1->row();
					$check_color = " AND (a.name_color LIKE '%".$row_color1->name_color_th."%' OR a.name_color LIKE '%".$row_color1->name_color_en."%')";
				}else{
					$check_color = "";
				}

				if($this->input->post('gear')){
					$query_gear1 = $this->db->query ( 'SELECT * FROM tbl_car_gear where car_gear_id = '.$this->input->post('gear').'');
					$row_gear1 = $query_gear1->row();
					$check_gear = " AND (a.name_gear LIKE '%".$row_gear1->name_gear_th."%' OR a.name_gear LIKE '%".$row_gear1->name_gear_en."%')";
				}else{
					$check_gear = "";
				}

				if($this->input->post('capacity')){
				 	$check_capacity = " AND (a.name_capacity <= ".$this->input->post('capacity').")";
				}else{
					$check_capacity = "";
				}

				@$mile1 = explode("-",$this->input->post('mile'));

				if(@$mile1[0]){
					$check_mile = " AND a.name_mile  BETWEEN ".$mile1[0]." AND ".$mile1[1]." ";
				}else{
					$check_mile = "";
				}

				@$price1 = explode("-",$this->input->post('price'));
				if(@$price1[0]){
					$check_price = " AND a.name_price  BETWEEN ".$price1[0]." AND ".$price1[1]." ";
				}else{
					$check_price = "";
				}


								
				$group_by = " GROUP BY a.car_top_id";

				$order_by = " ORDER BY RAND('car_top_id') DESC LIMIT 12  ".$offset_show." ";


				$query = $this->db->query ( 'SELECT 
				a.car_top_id as car_top_id,a.car_type_id as car_type_id,a.no_car as no_car,a.car_id as car_id,a.car_model_id as car_model_id,
				a.car_model_des_id as car_model_des_id,a.car_top_id as car_top_id,a.name_type as name_type,a.name as name,a.name_model as name_model,
				a.name_model_des as name_model_des,a.name_gear as name_gear,a.name_capacity as name_capacity,a.name_mile as name_mile,a.province as province,
				a.device as device,a.name_price as name_price,a.name_year_regis as name_year_regis,a.name_year_pro as name_year_pro,a.name_color as name_color,
				a.position_id as position_id,a.status_id as status_id,a.id_login as id_login,a.lang as lang,a.descript as descript,a.downpayment as downpayment,
				a.created_date as created_date,a.modify_date as modify_date,a.check_sale_complete as check_sale_complete,a.status_car_show as status_car_show,
			    a.status_delete	 as status_delete
				
				,b.car_top_id as car_top_id1
				,b.id_image_multi as id_image_multi,b.gallery_id as gallery_id
				,b.thumb_name_multi as thumb_name_multi
				,b.upload_date as upload_date,b.id_login as id_login1,b.sort_no as sort_no,b.status as status
				
				,t.car_type_id as car_type_id_t
				,t.name_type_th as name_type_th_t
				,t.name_type_en as name_type_en_t
				,t.position_id as position_id_t
				
				,o.car_id as car_id_o
				,o.name_th as name_th_o
				,o.name_en as name_en_o
				,o.position_id as position_id_o
				,o.status_id as status_id_o
				,o.car_type_id as car_type_id_o
				
				,m.car_model_id as car_model_id2
				,m.name_model_th as name_model_th2
				,m.name_model_en as name_model_en2
				,m.position_id as position_id2
				,m.status_id as status_id2
				,m.car_id as car_id2
				
				,d.car_model_des_id as car_model_des_id3
				,d.name_model_des_th as car_model_des_th3
				,d.name_model_des_en as car_model_des_en3
				,d.position_id as position_id3
				,d.status_id as status_id3
				,d.car_model_id as car_model_id3

				,cc.name_color_th as name_color_th
				,cc.name_color_en as name_color_en
				,g.name_gear_th as name_gear_th
				,g.name_gear_en as name_gear_en
				,ca.name_capacity_th as name_capacity_th
				,ca.name_capacity_en as name_capacity_en
				
			
				FROM tbl_car_top a
				LEFT JOIN gallery_uploads_multi b ON b.car_top_id = a.car_top_id
				LEFT JOIN tbl_car_type t ON t.car_type_id = a.car_type_id 
				LEFT JOIN tbl_car o ON o.car_id = a.car_id 
				LEFT JOIN tbl_car_model m ON m.car_model_id = a.car_model_id
				LEFT JOIN tbl_car_model_des d ON d.car_model_des_id = a.car_model_des_id

				LEFT JOIN tbl_car_color cc ON cc.name_color_th = a.name_color OR cc.name_color_en = a.name_color
				LEFT JOIN tbl_car_gear g ON g.name_gear_th = a.name_gear OR g.name_gear_en = a.name_gear
				LEFT JOIN tbl_car_capacity ca ON ca.name_capacity_th = a.name_capacity OR ca.name_capacity_en = a.name_capacity

				where a.check_sale_complete = "complete"
				AND a.status_id in (1,3,4)
				AND a.status_delete = 0
		
				'.$check_search.' '.$check_type.' '.$check_car.' '.$check_model.'  '.$check_model_des.' '.$check_year_pro.' '.$check_color.' '.$check_gear.'  '.$check_capacity.' '.$check_mile.' '.$check_price.'
				'.$group_by.'


				UNION ALL

				SELECT 
				n.adv_id as car_top_id,"" as car_type_id,"" as no_car,"" as car_id,"" as car_model_id,
				"" as car_model_des_id,"" as car_top_id,"" as name_type,"" as name,"" as name_model,
				"" as name_model_des,"" as name_gear,"" as name_capacity,"" as name_mile,"" as province,
				"" as device,"" as name_price,"" as name_year_regis,"" as name_year_pro,"" as name_color,
				"" as position_id,"" as status_id,"" as id_login,"" as lang,"" as descript,"" as downpayment,
				"" as created_date,"" as modify_date,"" as check_sale_complete,"" as status_car_show,
			    "" as status_delete
				
				,"" as car_top_id1
				,"" as id_image_multi,"" as gallery_id
				,n.img as thumb_name_multi
				,"" as upload_date,"" as id_login1,"" as sort_no,"" as status
				
				,"" as car_type_id_t
				,"" as name_type_th_t
				,"" as name_type_en_t
				,"" as position_id_t
				
				,"" as car_id_o
				,"" as name_th_o
				,"" as name_en_o
				,"" as position_id_o
				,"" as status_id_o
				,"" as car_type_id_o
				
				,"" as car_model_id2
				,"" as name_model_th2
				,"" as name_model_en2
				,"" as position_id2
				,"" as status_id2
				,"" as car_id2
				
				,"" as car_model_des_id3
				,"" as car_model_des_th3
				,"" as car_model_des_en3
				,"" as position_id3
				,"" as status_id3
				,"" as car_model_id3

				,"" as name_color_th
				,"" as name_color_en
				,"" as name_gear_th
				,"" as name_gear_en
				,"" as name_capacity_th
				,"" as name_capacity_en
				
				
				FROM tbl_adv n
				where n.status_id = 1 
				'.$order_by.'
				');
				return $query->result();


/*--------------------------------------------ถ้าไม่เลือก-----------------------------------------------------------*/
		}else{

			if(!empty($offset)){
					$offset_show = 'OFFSET '.$offset.'';
			}else{
					$offset_show = '';
			}

				if(empty($check_search)){
					$check_search = "";
				}

				if($this->input->post('keyword')){
					$check_search = " AND (a.no_car LIKE '%".$this->input->post('keyword')."%' 
					OR a.name_type  LIKE '%".$this->input->post('keyword')."%'
					OR a.name LIKE '%".$this->input->post('keyword')."%'
					OR a.name_model LIKE '%".$this->input->post('keyword')."%'
					OR a.name_model_des LIKE '%".$this->input->post('keyword')."%'
					OR a.province LIKE '%".$this->input->post('keyword')."%'
					OR a.name_year_pro LIKE '%".$this->input->post('keyword')."%'
					OR a.name_year_regis LIKE '%".$this->input->post('keyword')."%'
					OR a.name_color LIKE '%".$this->input->post('keyword')."%'
					OR a.device LIKE '%".$this->input->post('keyword')."%'
					OR a.name_gear LIKE '%".$this->input->post('keyword')."%'
					OR a.name_capacity LIKE '%".$this->input->post('keyword')."%'
					OR a.name_mile LIKE '%".$this->input->post('keyword')."%'
					OR a.name_price LIKE '%".$this->input->post('keyword')."%'

				)";
				}

	
				if($this->input->post('keyword')){
					
					$check_search = " AND (a.no_car LIKE '%".$this->input->post('keyword')."%' 
					OR a.name_type  LIKE '%".$this->input->post('keyword')."%'
					OR a.name LIKE '%".$this->input->post('keyword')."%'
					OR a.name_model LIKE '%".$this->input->post('keyword')."%'
					OR a.name_model_des LIKE '%".$this->input->post('keyword')."%'
					OR a.province LIKE '%".$this->input->post('keyword')."%'
					OR a.name_year_pro LIKE '%".$this->input->post('keyword')."%'
					OR a.name_year_regis LIKE '%".$this->input->post('keyword')."%'
					OR a.name_color LIKE '%".$this->input->post('keyword')."%'
					OR a.device LIKE '%".$this->input->post('keyword')."%'
					OR a.name_gear LIKE '%".$this->input->post('keyword')."%'
					OR a.name_capacity LIKE '%".$this->input->post('keyword')."%'
					OR a.name_mile LIKE '%".$this->input->post('keyword')."%'
					OR a.name_price LIKE '%".$this->input->post('keyword')."%'

				)";
				}

				if($this->input->post('name_type')){
					$check_type = " AND a.car_type_id  = ".$this->input->post('name_type');
				}else{
					$check_type = "";
				}

				if($this->input->post('name')){
					if($this->input->post('name')!="" AND $this->input->post('name_type')==""){
						$check_car = " AND a.car_id  = ".$this->input->post('name');
					}else{
						$query_name1 = $this->db->query ( 'SELECT * FROM tbl_car_top where car_id = '.$this->input->post('name').'');
						$row_name1 = $query_name1->row();
						if(!empty($row_name1->name)){
							$check_car = " AND (a.name LIKE '%".$row_name1->name."%')";
						}else{
							$check_car = "";
						}
						
					}
				}else{
					$check_car = "";
				}


				if($this->input->post('name_model')){
					$check_model = " AND a.car_model_id  = ".$this->input->post('name_model');
				}else{
					$check_model = "";
				}

				if($this->input->post('name_model_des')){
				 	$check_model_des = " AND a.car_model_des_id  = ".$this->input->post('name_model_des');
				}else{
					$check_model_des = "";
				}

				if($this->input->post('year_min')!="" AND $this->input->post('year_max')!=""){
                  	$check_year_pro = " AND a.name_year_pro  BETWEEN ".$this->input->post('year_min')." AND ".$this->input->post('year_max')." ";
              	}elseif($this->input->post('year_min')!="" AND $this->input->post('year_max')==""){
                    $check_year_pro = " AND a.name_year_pro  BETWEEN ".$this->input->post('year_min')." AND ".date("Y")." ";
               	}elseif($this->input->post('year_min')=="" AND $this->input->post('year_max')==""){
               		$check_year_pro = "";
               	}

				if($this->input->post('color')){
					$query_color1 = $this->db->query ( 'SELECT * FROM tbl_car_color where car_color_id = '.$this->input->post('color').'');
					$row_color1 = $query_color1->row();
					$check_color = " AND (a.name_color LIKE '%".$row_color1->name_color_th."%' OR a.name_color LIKE '%".$row_color1->name_color_en."%')";
				}else{
					$check_color = "";
				}

				if($this->input->post('gear')){
					$query_gear1 = $this->db->query ( 'SELECT * FROM tbl_car_gear where car_gear_id = '.$this->input->post('gear').'');
					$row_gear1 = $query_gear1->row();
					$check_gear = " AND (a.name_gear LIKE '%".$row_gear1->name_gear_th."%' OR a.name_gear LIKE '%".$row_gear1->name_gear_en."%')";
				}else{
					$check_gear = "";
				}

				if($this->input->post('capacity')){
				 	$check_capacity = " AND (a.name_capacity <= ".$this->input->post('capacity').")";
				}else{
					$check_capacity = "";
				}

				@$mile1 = explode("-",$this->input->post('mile'));

				if(@$mile1[0]){
					$check_mile = " AND a.name_mile  BETWEEN ".$mile1[0]." AND ".$mile1[1]." ";
				}else{
					$check_mile = "";
				}

				@$price1 = explode("-",$this->input->post('price'));
				if(@$price1[0]){
					$check_price = " AND a.name_price  BETWEEN ".$price1[0]." AND ".$price1[1]." ";
				}else{
					$check_price = "";
				}

				


								
				$group_by = " GROUP BY a.car_top_id";

				$order_by = " ORDER BY RAND('car_top_id') DESC LIMIT 12  ".$offset_show." ";


				$query = $this->db->query ( 'SELECT 
				a.car_top_id as car_top_id,a.car_type_id as car_type_id,a.no_car as no_car,a.car_id as car_id,a.car_model_id as car_model_id,
				a.car_model_des_id as car_model_des_id,a.car_top_id as car_top_id,a.name_type as name_type,a.name as name,a.name_model as name_model,
				a.name_model_des as name_model_des,a.name_gear as name_gear,a.name_capacity as name_capacity,a.name_mile as name_mile,a.province as province,
				a.device as device,a.name_price as name_price,a.name_year_regis as name_year_regis,a.name_year_pro as name_year_pro,a.name_color as name_color,
				a.position_id as position_id,a.status_id as status_id,a.id_login as id_login,a.lang as lang,a.descript as descript,a.downpayment as downpayment,
				a.created_date as created_date,a.modify_date as modify_date,a.check_sale_complete as check_sale_complete,a.status_car_show as status_car_show,
			    a.status_delete	 as status_delete
				
				,b.car_top_id as car_top_id1
				,b.id_image_multi as id_image_multi,b.gallery_id as gallery_id
				,b.thumb_name_multi as thumb_name_multi
				,b.upload_date as upload_date,b.id_login as id_login1,b.sort_no as sort_no,b.status as status
				
				,t.car_type_id as car_type_id_t
				,t.name_type_th as name_type_th_t
				,t.name_type_en as name_type_en_t
				,t.position_id as position_id_t
				
				,o.car_id as car_id_o
				,o.name_th as name_th_o
				,o.name_en as name_en_o
				,o.position_id as position_id_o
				,o.status_id as status_id_o
				,o.car_type_id as car_type_id_o
				
				,m.car_model_id as car_model_id2
				,m.name_model_th as name_model_th2
				,m.name_model_en as name_model_en2
				,m.position_id as position_id2
				,m.status_id as status_id2
				,m.car_id as car_id2
				
				,d.car_model_des_id as car_model_des_id3
				,d.name_model_des_th as car_model_des_th3
				,d.name_model_des_en as car_model_des_en3
				,d.position_id as position_id3
				,d.status_id as status_id3
				,d.car_model_id as car_model_id3


				,cc.name_color_th as name_color_th
				,cc.name_color_en as name_color_en
				,g.name_gear_th as name_gear_th
				,g.name_gear_en as name_gear_en
				,ca.name_capacity_th as name_capacity_th
				,ca.name_capacity_en as name_capacity_en
				
			
				FROM tbl_car_top a
				LEFT JOIN gallery_uploads_multi b ON b.car_top_id = a.car_top_id
				LEFT JOIN tbl_car_type t ON t.car_type_id = a.car_type_id 
				LEFT JOIN tbl_car o ON o.car_id = a.car_id 
				LEFT JOIN tbl_car_model m ON m.car_model_id = a.car_model_id
				LEFT JOIN tbl_car_model_des d ON d.car_model_des_id = a.car_model_des_id

				LEFT JOIN tbl_car_color cc ON cc.name_color_th = a.name_color OR cc.name_color_en = a.name_color
				LEFT JOIN tbl_car_gear g ON g.name_gear_th = a.name_gear OR g.name_gear_en = a.name_gear
				LEFT JOIN tbl_car_capacity ca ON ca.name_capacity_th = a.name_capacity OR ca.name_capacity_en = a.name_capacity

				where a.check_sale_complete = "complete"
				AND a.status_id in (1,3,4)
				AND a.status_delete = 0
		
				'.$check_search.' '.$check_type.' '.$check_car.' '.$check_model.'  '.$check_model_des.' '.$check_year_pro.' '.$check_color.' '.$check_gear.'  '.$check_capacity.' '.$check_mile.' '.$check_price.'
				'.$group_by.'


				UNION ALL

				SELECT 
				n.adv_id as car_top_id,"" as car_type_id,"" as no_car,"" as car_id,"" as car_model_id,
				"" as car_model_des_id,"" as car_top_id,"" as name_type,"" as name,"" as name_model,
				"" as name_model_des,"" as name_gear,"" as name_capacity,"" as name_mile,"" as province,
				"" as device,"" as name_price,"" as name_year_regis,"" as name_year_pro,"" as name_color,
				"" as position_id,"" as status_id,"" as id_login,"" as lang,"" as descript,"" as downpayment,
				"" as created_date,"" as modify_date,"" as check_sale_complete,"" as status_car_show,
			    "" as status_delete
				
				,"" as car_top_id1
				,"" as id_image_multi,"" as gallery_id
				,n.img as thumb_name_multi
				,"" as upload_date,"" as id_login1,"" as sort_no,"" as status
				
				,"" as car_type_id_t
				,"" as name_type_th_t
				,"" as name_type_en_t
				,"" as position_id_t
				
				,"" as car_id_o
				,"" as name_th_o
				,"" as name_en_o
				,"" as position_id_o
				,"" as status_id_o
				,"" as car_type_id_o
				
				,"" as car_model_id2
				,"" as name_model_th2
				,"" as name_model_en2
				,"" as position_id2
				,"" as status_id2
				,"" as car_id2
				
				,"" as car_model_des_id3
				,"" as car_model_des_th3
				,"" as car_model_des_en3
				,"" as position_id3
				,"" as status_id3
				,"" as car_model_id3

				,"" as name_color_th
				,"" as name_color_en
				,"" as name_gear_th
				,"" as name_gear_en
				,"" as name_capacity_th
				,"" as name_capacity_en
				
				
				FROM tbl_adv n
				where n.status_id = 1
				'.$order_by.'
				');
				return $query->result();

		}

			

	}


	function search_all_to($offset="",$lang="",$page=""){  // กด submit ค้นหา แล้ว


		

/*-------------------------------------------- กดค้น แต่กรอก-----------------------------------------------------------*/

		if($this->input->get('car_type_id') OR $this->input->get('car_id') OR $this->input->get('car_model_id') OR $this->input->get('car_model_des_id') OR
			$this->input->post('keyword') OR $this->input->post('province') OR $this->input->post('price') OR $this->input->post('year_pro') OR
			$this->input->post('year_regis') OR $this->input->post('color') OR $this->input->post('gear') OR $this->input->post('capacity') OR $this->input->post('mile')){

			if(!empty($offset)){
					$offset_show = 'OFFSET '.$offset.'';
			}else{
					$offset_show = '';
			}

				if(empty($check_search)){
					$check_search = "";
				}

				if($this->input->post('keyword')){
					$check_search = " AND (a.no_car LIKE '%".$this->input->post('keyword')."%' 
					OR a.name_type  LIKE '%".$this->input->post('keyword')."%'
					OR a.name LIKE '%".$this->input->post('keyword')."%'
					OR a.name_model LIKE '%".$this->input->post('keyword')."%'
					OR a.name_model_des LIKE '%".$this->input->post('keyword')."%'
					OR a.province LIKE '%".$this->input->post('keyword')."%'
					OR a.name_year_pro LIKE '%".$this->input->post('keyword')."%'
					OR a.name_year_regis LIKE '%".$this->input->post('keyword')."%'
					OR a.name_color LIKE '%".$this->input->post('keyword')."%'
					OR a.device LIKE '%".$this->input->post('keyword')."%'
					OR a.name_gear LIKE '%".$this->input->post('keyword')."%'
					OR a.name_capacity LIKE '%".$this->input->post('keyword')."%'
					OR a.name_mile LIKE '%".$this->input->post('keyword')."%'
					OR a.name_price LIKE '%".$this->input->post('keyword')."%'

				)";
				}

				if($this->input->post('keyword')){
					
					$check_search = " AND (a.no_car LIKE '%".$this->input->post('keyword')."%' 
					OR a.name_type  LIKE '%".$this->input->post('keyword')."%'
					OR a.name LIKE '%".$this->input->post('keyword')."%'
					OR a.name_model LIKE '%".$this->input->post('keyword')."%'
					OR a.name_model_des LIKE '%".$this->input->post('keyword')."%'
					OR a.province LIKE '%".$this->input->post('keyword')."%'
					OR a.name_year_pro LIKE '%".$this->input->post('keyword')."%'
					OR a.name_year_regis LIKE '%".$this->input->post('keyword')."%'
					OR a.name_color LIKE '%".$this->input->post('keyword')."%'
					OR a.device LIKE '%".$this->input->post('keyword')."%'
					OR a.name_gear LIKE '%".$this->input->post('keyword')."%'
					OR a.name_capacity LIKE '%".$this->input->post('keyword')."%'
					OR a.name_mile LIKE '%".$this->input->post('keyword')."%'
					OR a.name_price LIKE '%".$this->input->post('keyword')."%'

				)";
				}

				if($this->input->post('name_type')){
					$check_type = " AND a.car_type_id  = ".$this->input->post('name_type');
				}else{
					$check_type = "";
				}

				if($this->input->post('name')){
					if($this->input->post('name')!="" AND $this->input->post('name_type')==""){
						$check_car = " AND a.car_id  = ".$this->input->post('name');
					}else{
						$query_name1 = $this->db->query ( 'SELECT * FROM tbl_car_top where car_id = '.$this->input->post('name').'');
						$row_name1 = $query_name1->row();
						if(!empty($row_name1->name)){
							$check_car = " AND (a.name LIKE '%".$row_name1->name."%')";
						}else{
							$check_car = "";
						}
						
					}
				}else{
					$check_car = "";
				}


				if($this->input->post('name_model')){
					$check_model = " AND a.car_model_id  = ".$this->input->post('name_model');
				}else{
					$check_model = "";
				}

				if($this->input->post('name_model_des')){
				 	$check_model_des = " AND a.car_model_des_id  = ".$this->input->post('name_model_des');
				}else{
					$check_model_des = "";
				}

				if($this->input->post('year_min')!="" AND $this->input->post('year_max')!=""){
                  	$check_year_pro = " AND a.name_year_pro  BETWEEN ".$this->input->post('year_min')." AND ".$this->input->post('year_max')." ";
              	}elseif($this->input->post('year_min')!="" AND $this->input->post('year_max')==""){
                    $check_year_pro = " AND a.name_year_pro  BETWEEN ".$this->input->post('year_min')." AND ".date("Y")." ";
               	}elseif($this->input->post('year_min')=="" AND $this->input->post('year_max')==""){
               		$check_year_pro = "";
               	}
               	
				if($this->input->post('color')){
					$query_color1 = $this->db->query ( 'SELECT * FROM tbl_car_color where car_color_id = '.$this->input->post('color').'');
					$row_color1 = $query_color1->row();
					$check_color = " AND (a.name_color LIKE '%".$row_color1->name_color_th."%' OR a.name_color LIKE '%".$row_color1->name_color_en."%')";
				}else{
					$check_color = "";
				}

				if($this->input->post('gear')){
					$query_gear1 = $this->db->query ( 'SELECT * FROM tbl_car_gear where car_gear_id = '.$this->input->post('gear').'');
					$row_gear1 = $query_gear1->row();
					$check_gear = " AND (a.name_gear LIKE '%".$row_gear1->name_gear_th."%' OR a.name_gear LIKE '%".$row_gear1->name_gear_en."%')";
				}else{
					$check_gear = "";
				}

				if($this->input->post('capacity')){
				 	$check_capacity = " AND (a.name_capacity <= ".$this->input->post('capacity').")";
				}else{
					$check_capacity = "";
				}

				@$mile1 = explode("-",$this->input->post('mile'));

				if(@$mile1[0]){
					$check_mile = " AND a.name_mile  BETWEEN ".$mile1[0]." AND ".$mile1[1]." ";
				}else{
					$check_mile = "";
				}

				@$price1 = explode("-",$this->input->post('price'));
				if(@$price1[0]){
					$check_price = " AND a.name_price  BETWEEN ".$price1[0]." AND ".$price1[1]." ";
				}else{
					$check_price = "";
				}
				
				$group_by = " GROUP BY a.car_top_id";

				$order_by = " ORDER BY RAND('car_top_id') DESC LIMIT 12  ".$offset_show." ";



				$query = $this->db->query ( 'SELECT 
				a.car_top_id as car_top_id,a.car_type_id as car_type_id,a.no_car as no_car,a.car_id as car_id,a.car_model_id as car_model_id,
				a.car_model_des_id as car_model_des_id,a.car_top_id as car_top_id,a.name_type as name_type,a.name as name,a.name_model as name_model,
				a.name_model_des as name_model_des,a.name_gear as name_gear,a.name_capacity as name_capacity,a.name_mile as name_mile,a.province as province,
				a.device as device,a.name_price as name_price,a.name_year_regis as name_year_regis,a.name_year_pro as name_year_pro,a.name_color as name_color,
				a.position_id as position_id,a.status_id as status_id,a.id_login as id_login,a.lang as lang,a.descript as descript,a.downpayment as downpayment,
				a.created_date as created_date,a.modify_date as modify_date,a.check_sale_complete as check_sale_complete,a.status_car_show as status_car_show,
			    a.status_delete	 as status_delete
				
				,b.car_top_id as car_top_id1
				,b.id_image_multi as id_image_multi,b.gallery_id as gallery_id
				,b.thumb_name_multi as thumb_name_multi
				,b.upload_date as upload_date,b.id_login as id_login1,b.sort_no as sort_no,b.status as status
				
				,t.car_type_id as car_type_id_t
				,t.name_type_th as name_type_th_t
				,t.name_type_en as name_type_en_t
				,t.position_id as position_id_t
				
				,o.car_id as car_id_o
				,o.name_th as name_th_o
				,o.name_en as name_en_o
				,o.position_id as position_id_o
				,o.status_id as status_id_o
				,o.car_type_id as car_type_id_o
				
				,m.car_model_id as car_model_id2
				,m.name_model_th as name_model_th2
				,m.name_model_en as name_model_en2
				,m.position_id as position_id2
				,m.status_id as status_id2
				,m.car_id as car_id2
				
				,d.car_model_des_id as car_model_des_id3
				,d.name_model_des_th as car_model_des_th3
				,d.name_model_des_en as car_model_des_en3
				,d.position_id as position_id3
				,d.status_id as status_id3
				,d.car_model_id as car_model_id3

				,cc.name_color_th as name_color_th
				,cc.name_color_en as name_color_en
				,g.name_gear_th as name_gear_th
				,g.name_gear_en as name_gear_en
				,ca.name_capacity_th as name_capacity_th
				,ca.name_capacity_en as name_capacity_en
				
				
				FROM tbl_car_top a
				LEFT JOIN gallery_uploads_multi b ON b.car_top_id = a.car_top_id
				LEFT JOIN tbl_car_type t ON t.car_type_id = a.car_type_id 
				LEFT JOIN tbl_car o ON o.car_id = a.car_id 
				LEFT JOIN tbl_car_model m ON m.car_model_id = a.car_model_id
				LEFT JOIN tbl_car_model_des d ON d.car_model_des_id = a.car_model_des_id

				LEFT JOIN tbl_car_color cc ON cc.name_color_th = a.name_color OR cc.name_color_en = a.name_color
				LEFT JOIN tbl_car_gear g ON g.name_gear_th = a.name_gear OR g.name_gear_en = a.name_gear
				LEFT JOIN tbl_car_capacity ca ON ca.name_capacity_th = a.name_capacity OR ca.name_capacity_en = a.name_capacity

				where a.check_sale_complete = "complete"
				AND a.status_id in (1,3,4)
				AND a.status_delete = 0
				
				'.$check_search.' '.$check_type.' '.$check_car.' '.$check_model.'  '.$check_model_des.' '.$check_year_pro.' '.$check_color.' '.$check_gear.'  '.$check_capacity.' '.$check_mile.' '.$check_price.'
				'.$group_by.'
				'.$order_by.'
				');
				return $query->result();

		}else{
/*--------------------------------------------กดค้น แต่ไม่กรอก-----------------------------------------------------------*/

			if(!empty($offset)){
					$offset_show = 'OFFSET '.$offset.'';
			}else{
					$offset_show = '';
			}

				if(empty($check_search)){
					$check_search = "";
				}

				if($this->input->post('keyword')){
					$check_search = " AND (a.no_car LIKE '%".$this->input->post('keyword')."%' 
					OR a.name_type  LIKE '%".$this->input->post('keyword')."%'
					OR a.name LIKE '%".$this->input->post('keyword')."%'
					OR a.name_model LIKE '%".$this->input->post('keyword')."%'
					OR a.name_model_des LIKE '%".$this->input->post('keyword')."%'
					OR a.province LIKE '%".$this->input->post('keyword')."%'
					OR a.name_year_pro LIKE '%".$this->input->post('keyword')."%'
					OR a.name_year_regis LIKE '%".$this->input->post('keyword')."%'
					OR a.name_color LIKE '%".$this->input->post('keyword')."%'
					OR a.device LIKE '%".$this->input->post('keyword')."%'
					OR a.name_gear LIKE '%".$this->input->post('keyword')."%'
					OR a.name_capacity LIKE '%".$this->input->post('keyword')."%'
					OR a.name_mile LIKE '%".$this->input->post('keyword')."%'
					OR a.name_price LIKE '%".$this->input->post('keyword')."%'

				)";
				}

				if($this->input->post('name_type')){
					$check_type = " AND a.car_type_id  = ".$this->input->post('name_type');
				}else{
					$check_type = "";
				}

				if($this->input->post('name')){
					if($this->input->post('name')!="" AND $this->input->post('name_type')==""){
						$check_car = " AND a.car_id  = ".$this->input->post('name');
					}else{
						$query_name1 = $this->db->query ( 'SELECT * FROM tbl_car_top where car_id = '.$this->input->post('name').'');
						$row_name1 = $query_name1->row();
						if(!empty($row_name1->name)){
							$check_car = " AND (a.name LIKE '%".$row_name1->name."%')";
						}else{
							$check_car = "";
						}
						
					}
				}else{
					$check_car = "";
				}


				if($this->input->post('name_model')){
					$check_model = " AND a.car_model_id  = ".$this->input->post('name_model');
				}else{
					$check_model = "";
				}

				if($this->input->post('name_model_des')){
				 	$check_model_des = " AND a.car_model_des_id  = ".$this->input->post('name_model_des');
				}else{
					$check_model_des = "";
				}

				if($this->input->post('year_min')!="" AND $this->input->post('year_max')!=""){
                  	$check_year_pro = " AND a.name_year_pro  BETWEEN ".$this->input->post('year_min')." AND ".$this->input->post('year_max')." ";
              	}elseif($this->input->post('year_min')!="" AND $this->input->post('year_max')==""){
                    $check_year_pro = " AND a.name_year_pro  BETWEEN ".$this->input->post('year_min')." AND ".date("Y")." ";
               	}elseif($this->input->post('year_min')=="" AND $this->input->post('year_max')==""){
               		$check_year_pro = "";
               	}

				if($this->input->post('color')){
					$check_color = " AND a.name_color LIKE '%".$this->input->post('color')."%'";
				}else{
					$check_color = "";
				}

				if($this->input->post('gear')){
					$check_gear = " AND a.name_gear LIKE '%".$this->input->post('gear')."%'";
				}else{
					$check_gear = "";
				}

				if($this->input->post('capacity')){
				 	$check_capacity = " AND (a.name_capacity <= ".$this->input->post('capacity').")";
				}else{
					$check_capacity = "";
				}

				@$mile1 = explode("-",$this->input->post('mile'));

				if(@$mile1[0]){
					$check_mile = " AND a.name_mile  BETWEEN ".$mile1[0]." AND ".$mile1[1]." ";
				}else{
					$check_mile = "";
				}

				@$price1 = explode("-",$this->input->post('price'));
				if(@$price1[0]){
					$check_price = " AND a.name_price  BETWEEN ".$price1[0]." AND ".$price1[1]." ";
				}else{
					$check_price = "";
				}
				
				$group_by = " GROUP BY a.car_top_id";

				$order_by = " ORDER BY RAND('car_top_id') DESC LIMIT 12  ".$offset_show." ";



				$query = $this->db->query ( 'SELECT 
				a.car_top_id as car_top_id,a.car_type_id as car_type_id,a.no_car as no_car,a.car_id as car_id,a.car_model_id as car_model_id,
				a.car_model_des_id as car_model_des_id,a.car_top_id as car_top_id,a.name_type as name_type,a.name as name,a.name_model as name_model,
				a.name_model_des as name_model_des,a.name_gear as name_gear,a.name_capacity as name_capacity,a.name_mile as name_mile,a.province as province,
				a.device as device,a.name_price as name_price,a.name_year_regis as name_year_regis,a.name_year_pro as name_year_pro,a.name_color as name_color,
				a.position_id as position_id,a.status_id as status_id,a.id_login as id_login,a.lang as lang,a.descript as descript,a.downpayment as downpayment,
				a.created_date as created_date,a.modify_date as modify_date,a.check_sale_complete as check_sale_complete,a.status_car_show as status_car_show,
			    a.status_delete	 as status_delete
				
				,b.car_top_id as car_top_id1
				,b.id_image_multi as id_image_multi,b.gallery_id as gallery_id
				,b.thumb_name_multi as thumb_name_multi
				,b.upload_date as upload_date,b.id_login as id_login1,b.sort_no as sort_no,b.status as status
				
				,t.car_type_id as car_type_id_t
				,t.name_type_th as name_type_th_t
				,t.name_type_en as name_type_en_t
				,t.position_id as position_id_t
				
				,o.car_id as car_id_o
				,o.name_th as name_th_o
				,o.name_en as name_en_o
				,o.position_id as position_id_o
				,o.status_id as status_id_o
				,o.car_type_id as car_type_id_o
				
				,m.car_model_id as car_model_id2
				,m.name_model_th as name_model_th2
				,m.name_model_en as name_model_en2
				,m.position_id as position_id2
				,m.status_id as status_id2
				,m.car_id as car_id2
				
				,d.car_model_des_id as car_model_des_id3
				,d.name_model_des_th as car_model_des_th3
				,d.name_model_des_en as car_model_des_en3
				,d.position_id as position_id3
				,d.status_id as status_id3
				,d.car_model_id as car_model_id3

				,cc.name_color_th as name_color_th
				,cc.name_color_en as name_color_en
				,g.name_gear_th as name_gear_th
				,g.name_gear_en as name_gear_en
				,ca.name_capacity_th as name_capacity_th
				,ca.name_capacity_en as name_capacity_en
				
				
				FROM tbl_car_top a
				LEFT JOIN gallery_uploads_multi b ON b.car_top_id = a.car_top_id
				LEFT JOIN tbl_car_type t ON t.car_type_id = a.car_type_id 
				LEFT JOIN tbl_car o ON o.car_id = a.car_id 
				LEFT JOIN tbl_car_model m ON m.car_model_id = a.car_model_id
				LEFT JOIN tbl_car_model_des d ON d.car_model_des_id = a.car_model_des_id

				LEFT JOIN tbl_car_color cc ON cc.name_color_th = a.name_color OR cc.name_color_en = a.name_color
				LEFT JOIN tbl_car_gear g ON g.name_gear_th = a.name_gear OR g.name_gear_en = a.name_gear
				LEFT JOIN tbl_car_capacity ca ON ca.name_capacity_th = a.name_capacity OR ca.name_capacity_en = a.name_capacity

				where a.check_sale_complete = "complete"
				AND a.status_id in (1,3)
				AND a.status_delete = 0
				
				'.$check_search.' '.$check_type.' '.$check_car.' '.$check_model.'  '.$check_model_des.' '.$check_year_pro.' '.$check_color.' '.$check_gear.'  '.$check_capacity.' '.$check_mile.' '.$check_price.'
				'.$group_by.'

				UNION ALL

				SELECT 
				n.adv_id as car_top_id,"" as car_type_id,"" as no_car,"" as car_id,"" as car_model_id,
				"" as car_model_des_id,"" as car_top_id,"" as name_type,"" as name,"" as name_model,
				"" as name_model_des,"" as name_gear,"" as name_capacity,"" as name_mile,"" as province,
				"" as device,"" as name_price,"" as name_year_regis,"" as name_year_pro,"" as name_color,
				"" as position_id,"" as status_id,"" as id_login,"" as lang,"" as descript,"" as downpayment,
				"" as created_date,"" as modify_date,"" as check_sale_complete,"" as status_car_show,
			    "" as status_delete
				
				,"" as car_top_id1
				,"" as id_image_multi,"" as gallery_id
				,n.img as thumb_name_multi
				,"" as upload_date,"" as id_login1,"" as sort_no,"" as status
				
				,"" as car_type_id_t
				,"" as name_type_th_t
				,"" as name_type_en_t
				,"" as position_id_t
				
				,"" as car_id_o
				,"" as name_th_o
				,"" as name_en_o
				,"" as position_id_o
				,"" as status_id_o
				,"" as car_type_id_o
				
				,"" as car_model_id2
				,"" as name_model_th2
				,"" as name_model_en2
				,"" as position_id2
				,"" as status_id2
				,"" as car_id2
				
				,"" as car_model_des_id3
				,"" as car_model_des_th3
				,"" as car_model_des_en3
				,"" as position_id3
				,"" as status_id3
				,"" as car_model_id3

				,"" as name_color_th
				,"" as name_color_en
				,"" as name_gear_th
				,"" as name_gear_en
				,"" as name_capacity_th
				,"" as name_capacity_en
				
			
				FROM tbl_adv n
				where n.status_id = 1
				'.$order_by.'
				');
				return $query->result();

		}


	}

	function get_data_car_count($offset="",$lang="",$limit="") {

		

		if(!empty($offset)){
				$offset_show = 'OFFSET '.$offset.'';
		}else{
				$offset_show = '';
		}

			if(empty($check_search)){
				$check_search = "";
			}

			if($this->input->post('keyword')){
				$check_search = " AND (a.no_car LIKE '%".$this->input->post('keyword')."%' 
				OR a.name_type  LIKE '%".$this->input->post('keyword')."%'
				OR a.name LIKE '%".$this->input->post('keyword')."%'
				OR a.name_model LIKE '%".$this->input->post('keyword')."%'
				OR a.name_model_des LIKE '%".$this->input->post('keyword')."%'
				OR a.province LIKE '%".$this->input->post('keyword')."%'
				OR a.name_year_pro LIKE '%".$this->input->post('keyword')."%'
				OR a.name_year_regis LIKE '%".$this->input->post('keyword')."%'
				OR a.name_color LIKE '%".$this->input->post('keyword')."%'
				OR a.device LIKE '%".$this->input->post('keyword')."%'
				OR a.name_gear LIKE '%".$this->input->post('keyword')."%'
				OR a.name_capacity LIKE '%".$this->input->post('keyword')."%'
				OR a.name_mile LIKE '%".$this->input->post('keyword')."%'
				OR a.name_price LIKE '%".$this->input->post('keyword')."%'

			)";
			}


			if($this->input->post('keyword')){
					
					$check_search = " AND (a.no_car LIKE '%".$this->input->post('keyword')."%' 
					OR a.name_type  LIKE '%".$this->input->post('keyword')."%'
					OR a.name LIKE '%".$this->input->post('keyword')."%'
					OR a.name_model LIKE '%".$this->input->post('keyword')."%'
					OR a.name_model_des LIKE '%".$this->input->post('keyword')."%'
					OR a.province LIKE '%".$this->input->post('keyword')."%'
					OR a.name_year_pro LIKE '%".$this->input->post('keyword')."%'
					OR a.name_year_regis LIKE '%".$this->input->post('keyword')."%'
					OR a.name_color LIKE '%".$this->input->post('keyword')."%'
					OR a.device LIKE '%".$this->input->post('keyword')."%'
					OR a.name_gear LIKE '%".$this->input->post('keyword')."%'
					OR a.name_capacity LIKE '%".$this->input->post('keyword')."%'
					OR a.name_mile LIKE '%".$this->input->post('keyword')."%'
					OR a.name_price LIKE '%".$this->input->post('keyword')."%'

				)";
				}

				if($this->input->post('name_type')){
					$check_type = " AND a.car_type_id  = ".$this->input->post('name_type');
				}else{
					$check_type = "";
				}

				if($this->input->post('name')){
					if($this->input->post('name')!="" AND $this->input->post('name_type')==""){
						$check_car = " AND a.car_id  = ".$this->input->post('name');
					}else{
						$query_name1 = $this->db->query ( 'SELECT * FROM tbl_car_top where car_id = '.$this->input->post('name').'');
						$row_name1 = $query_name1->row();
						if(!empty($row_name1->name)){
							$check_car = " AND (a.name LIKE '%".$row_name1->name."%')";
						}else{
							$check_car = "";
						}
						
					}
				}else{
					$check_car = "";
				}


				if($this->input->post('name_model')){
					$check_model = " AND a.car_model_id  = ".$this->input->post('name_model');
				}else{
					$check_model = "";
				}

				if($this->input->post('name_model_des')){
				 	$check_model_des = " AND a.car_model_des_id  = ".$this->input->post('name_model_des');
				}else{
					$check_model_des = "";
				}

				if($this->input->post('year_min')!="" AND $this->input->post('year_max')!=""){
                  	$check_year_pro = " AND a.name_year_pro  BETWEEN ".$this->input->post('year_min')." AND ".$this->input->post('year_max')." ";
              	}elseif($this->input->post('year_min')!="" AND $this->input->post('year_max')==""){
                    $check_year_pro = " AND a.name_year_pro  BETWEEN ".$this->input->post('year_min')." AND ".date("Y")." ";
               	}elseif($this->input->post('year_min')=="" AND $this->input->post('year_max')==""){
               		$check_year_pro = "";
               	}

				if($this->input->post('color')){
					$query_color1 = $this->db->query ( 'SELECT * FROM tbl_car_color where car_color_id = '.$this->input->post('color').'');
					$row_color1 = $query_color1->row();
					$check_color = " AND (a.name_color LIKE '%".$row_color1->name_color_th."%' OR a.name_color LIKE '%".$row_color1->name_color_en."%')";
				}else{
					$check_color = "";
				}

				if($this->input->post('gear')){
					$query_gear1 = $this->db->query ( 'SELECT * FROM tbl_car_gear where car_gear_id = '.$this->input->post('gear').'');
					$row_gear1 = $query_gear1->row();
					$check_gear = " AND (a.name_gear LIKE '%".$row_gear1->name_gear_th."%' OR a.name_gear LIKE '%".$row_gear1->name_gear_en."%')";
				}else{
					$check_gear = "";
				}

				if($this->input->post('capacity')){
				 	$check_capacity = " AND (a.name_capacity <= ".$this->input->post('capacity').")";
				}else{
					$check_capacity = "";
				}

				@$mile1 = explode("-",$this->input->post('mile'));

				if(@$mile1[0]){
					$check_mile = " AND a.name_mile  BETWEEN ".$mile1[0]." AND ".$mile1[1]." ";
				}else{
					$check_mile = "";
				}

				@$price1 = explode("-",$this->input->post('price'));
				if(@$price1[0]){
					$check_price = " AND a.name_price  BETWEEN ".$price1[0]." AND ".$price1[1]." ";
				}else{
					$check_price = "";
				}

			$group_by = " GROUP BY a.car_top_id ORDER BY a.car_top_id DESC LIMIT 12  ".$offset_show."";


	/*---------------------------------------------------------------------------------------------*/

			$query = $this->db->query ('SELECT count(*) as count from (
					SELECT 
						a.car_top_id as car_top_id
					FROM tbl_car_top a
					LEFT JOIN tbl_car_type t ON t.car_type_id = a.car_type_id 
					LEFT JOIN tbl_car o ON o.car_id = a.car_id 
					LEFT JOIN tbl_car_model m ON m.car_model_id = a.car_model_id
					LEFT JOIN tbl_car_model_des d ON d.car_model_des_id = a.car_model_des_id

					LEFT JOIN tbl_car_color cc ON cc.name_color_th = a.name_color OR cc.name_color_en = a.name_color
					LEFT JOIN tbl_car_gear g ON g.name_gear_th = a.name_gear OR g.name_gear_en = a.name_gear
					LEFT JOIN tbl_car_capacity ca ON ca.name_capacity_th = a.name_capacity OR ca.name_capacity_en = a.name_capacity

					where a.check_sale_complete = "complete"
					AND a.status_id in (1,3,4)
					AND a.status_delete = 0
			
					'.$check_search.' '.$check_type.' '.$check_car.' '.$check_model.'  '.$check_model_des.' '.$check_year_pro.' '.$check_color.' '.$check_gear.'  '.$check_capacity.' '.$check_mile.' '.$check_price.'


					UNION ALL

					SELECT 
					n.adv_id as car_top_id
					FROM tbl_adv n
					where n.status_id = 1

				
				) count ');
			return $query->row_array();


	


	}

		function get_data_car_count_to($offset="",$lang="",$limit="") {

		

		if(!empty($offset)){
				$offset_show = 'OFFSET '.$offset.'';
		}else{
				$offset_show = '';
		}

			if(empty($check_search)){
				$check_search = "";
			}

			if($this->input->post('keyword')){
				$check_search = " AND (a.no_car LIKE '%".$this->input->post('keyword')."%' 
				OR a.name_type  LIKE '%".$this->input->post('keyword')."%'
				OR a.name LIKE '%".$this->input->post('keyword')."%'
				OR a.name_model LIKE '%".$this->input->post('keyword')."%'
				OR a.name_model_des LIKE '%".$this->input->post('keyword')."%'
				OR a.province LIKE '%".$this->input->post('keyword')."%'
				OR a.name_year_pro LIKE '%".$this->input->post('keyword')."%'
				OR a.name_year_regis LIKE '%".$this->input->post('keyword')."%'
				OR a.name_color LIKE '%".$this->input->post('keyword')."%'
				OR a.device LIKE '%".$this->input->post('keyword')."%'
				OR a.name_gear LIKE '%".$this->input->post('keyword')."%'
				OR a.name_capacity LIKE '%".$this->input->post('keyword')."%'
				OR a.name_mile LIKE '%".$this->input->post('keyword')."%'
				OR a.name_price LIKE '%".$this->input->post('keyword')."%'

			)";
			}

		
			if($this->input->post('keyword')){
					
					$check_search = " AND (a.no_car LIKE '%".$this->input->post('keyword')."%' 
					OR a.name_type  LIKE '%".$this->input->post('keyword')."%'
					OR a.name LIKE '%".$this->input->post('keyword')."%'
					OR a.name_model LIKE '%".$this->input->post('keyword')."%'
					OR a.name_model_des LIKE '%".$this->input->post('keyword')."%'
					OR a.province LIKE '%".$this->input->post('keyword')."%'
					OR a.name_year_pro LIKE '%".$this->input->post('keyword')."%'
					OR a.name_year_regis LIKE '%".$this->input->post('keyword')."%'
					OR a.name_color LIKE '%".$this->input->post('keyword')."%'
					OR a.device LIKE '%".$this->input->post('keyword')."%'
					OR a.name_gear LIKE '%".$this->input->post('keyword')."%'
					OR a.name_capacity LIKE '%".$this->input->post('keyword')."%'
					OR a.name_mile LIKE '%".$this->input->post('keyword')."%'
					OR a.name_price LIKE '%".$this->input->post('keyword')."%'

				)";
				}

				if($this->input->post('name_type')){
					$check_type = " AND a.car_type_id  = ".$this->input->post('name_type');
				}else{
					$check_type = "";
				}

				if($this->input->post('name')){
					if($this->input->post('name')!="" AND $this->input->post('name_type')==""){
						$check_car = " AND a.car_id  = ".$this->input->post('name');
					}else{
						$query_name1 = $this->db->query ( 'SELECT * FROM tbl_car_top where car_id = '.$this->input->post('name').'');
						$row_name1 = $query_name1->row();
						if(!empty($row_name1->name)){
							$check_car = " AND (a.name LIKE '%".$row_name1->name."%')";
						}else{
							$check_car = "";
						}
						
					}
				}else{
					$check_car = "";
				}

				if($this->input->post('name_model')){
					$check_model = " AND a.car_model_id  = ".$this->input->post('name_model');
				}else{
					$check_model = "";
				}

				if($this->input->post('name_model_des')){
				 	$check_model_des = " AND a.car_model_des_id  = ".$this->input->post('name_model_des');
				}else{
					$check_model_des = "";
				}

				if($this->input->post('year_min')!="" AND $this->input->post('year_max')!=""){
                  	$check_year_pro = " AND a.name_year_pro  BETWEEN ".$this->input->post('year_min')." AND ".$this->input->post('year_max')." ";
              	}elseif($this->input->post('year_min')!="" AND $this->input->post('year_max')==""){
                    $check_year_pro = " AND a.name_year_pro  BETWEEN ".$this->input->post('year_min')." AND ".date("Y")." ";
               	}elseif($this->input->post('year_min')=="" AND $this->input->post('year_max')==""){
               		$check_year_pro = "";
               	}

				if($this->input->post('color')){
					$query_color1 = $this->db->query ( 'SELECT * FROM tbl_car_color where car_color_id = '.$this->input->post('color').'');
					$row_color1 = $query_color1->row();
					$check_color = " AND (a.name_color LIKE '%".$row_color1->name_color_th."%' OR a.name_color LIKE '%".$row_color1->name_color_en."%')";
				}else{
					$check_color = "";
				}

				if($this->input->post('gear')){
					$query_gear1 = $this->db->query ( 'SELECT * FROM tbl_car_gear where car_gear_id = '.$this->input->post('gear').'');
					$row_gear1 = $query_gear1->row();
					$check_gear = " AND (a.name_gear LIKE '%".$row_gear1->name_gear_th."%' OR a.name_gear LIKE '%".$row_gear1->name_gear_en."%')";
				}else{
					$check_gear = "";
				}

				if($this->input->post('capacity')){
				 	$check_capacity = " AND (a.name_capacity <= ".$this->input->post('capacity').")";
				}else{
					$check_capacity = "";
				}

				@$mile1 = explode("-",$this->input->post('mile'));

				if(@$mile1[0]){
					$check_mile = " AND a.name_mile  BETWEEN ".$mile1[0]." AND ".$mile1[1]." ";
				}else{
					$check_mile = "";
				}

				@$price1 = explode("-",$this->input->post('price'));
				if(@$price1[0]){
					$check_price = " AND a.name_price  BETWEEN ".$price1[0]." AND ".$price1[1]." ";
				}else{
					$check_price = "";
				}
			
			$group_by = " GROUP BY a.car_top_id ORDER BY a.car_top_id DESC LIMIT 12  ".$offset_show."";


	/*---------------------------------------------------------------------------------------------*/

			$query = $this->db->query ('SELECT count(*) as count from (
					SELECT 
						a.car_top_id as car_top_id
					FROM tbl_car_top a
					LEFT JOIN tbl_car_type t ON t.car_type_id = a.car_type_id 
					LEFT JOIN tbl_car o ON o.car_id = a.car_id 
					LEFT JOIN tbl_car_model m ON m.car_model_id = a.car_model_id
					LEFT JOIN tbl_car_model_des d ON d.car_model_des_id = a.car_model_des_id

					LEFT JOIN tbl_car_color cc ON cc.name_color_th = a.name_color OR cc.name_color_en = a.name_color
					LEFT JOIN tbl_car_gear g ON g.name_gear_th = a.name_gear OR g.name_gear_en = a.name_gear
					LEFT JOIN tbl_car_capacity ca ON ca.name_capacity_th = a.name_capacity OR ca.name_capacity_en = a.name_capacity

					where a.check_sale_complete = "complete"
					AND a.status_id in (1,3,4)
					AND a.status_delete = 0
			
					'.$check_search.'
				
				) count ');
			return $query->row_array();


	


	}



	/*----------------/ magement - add finance_detail /---------------------------*/

	function update_downpayment($car_top_id=""){

		$data_update = array (
				'downpayment_check' =>  ""
			);
			$this->db->where('car_top_id',  $car_top_id);
			$this->db->update ( 'tbl_car_top', $data_update );	

	}

		function save_downpayment($car_top_id="",$downpayment=""){

			$query = $this->db->query ( 'SELECT * FROM tbl_car_top where car_top_id = '.$car_top_id.'');
			$row = $query->row();



			if($row->downpayment == $downpayment){
				$downpayment1 = $row->downpayment;
				$downpayment_post = $this->input->post('downpayment');
				$data_update = array (
					'downpayment' =>  $downpayment1,
					'downpayment_check' =>  $downpayment_post
				);
				$this->db->where('car_top_id',  $car_top_id);
				$this->db->update ( 'tbl_car_top', $data_update );	

				

			}else{
				$downpayment1 = $this->input->post('downpayment');

				$data_update = array (
					'downpayment_check' =>  $downpayment1
				);
				$this->db->where('car_top_id',  $car_top_id);
				$this->db->update ( 'tbl_car_top', $data_update );	
			}
			
		}

		function finance_detail($car_top_id="",$id_login1=""){

			 $id_login = $id_login1;
			 $price = $this->input->get('price');
			 $bank_id = $this->input->get('bank');
			 $interest_rate = $this->input->get('interest_rate');
			 $interest_rate_result = $this->input->get('interest_rate_result');
			 $downpayment = $this->input->get('downpayment');
			 $installment_period = $this->input->get('installment_period');
			 $installment_amount = $this->input->get('installment_amount');
			 $car_top_id = $car_top_id;
			 $created_date = date("Y-m-d H:i:s");
			 $check_count_comment = 1;

			 $data = array(
            	'id_login' => $id_login,
            	'price' => $price,
            	'bank_id' => $bank_id,
            	'interest_rate' => $interest_rate,
            	'interest_rate_result' => $interest_rate_result,
            	'downpayment' => $downpayment,
            	'installment_period' => $installment_period,
            	'installment_amount' => $installment_amount,
            	'car_top_id' => $car_top_id,
            	'created_date' => $created_date,
            	'check_count_comment' => $check_count_comment
            );
			 $this->db->insert('tbl_buy_car', $data);
		}


	function get_data_buy($car_top_id="",$id_login1="") {
		$query = $this->db->query ( 'select * from tbl_buy_car where car_top_id='.$car_top_id.' AND id_login = '.$id_login1.' order by buy_car_id desc limit 1' );
		return $query->row_array ();
	}

	function get_data_member($id_login1="") {
		$query = $this->db->query ( 'select * from tbl_login_member where  id = '.$id_login1.' limit 1' );
		return $query->row_array ();
	}

	function get_data_member_car_top($car_top_id="") {

		$query = $this->db->query ( 'select * from tbl_car_top where car_top_id='.$car_top_id.' limit 1');
		$row = $query->row();

		if($row->id_login==0){
			$query1 = $this->db->query ( 'select * from tbl_login_admin limit 1' );
			return $query1->row_array ();
		}else{
			$query1 = $this->db->query ( 'select * from tbl_car_top a 
			LEFT JOIN tbl_login_member b ON a.id_login = b.id
			WHERE a.car_top_id = '.$car_top_id.'' );
			return $query1->row_array ();
		}

		
	}


	

	
}