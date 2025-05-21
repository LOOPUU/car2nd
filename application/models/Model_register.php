<?php
if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );
	class Model_register extends CI_Model {

		public function __construct() {
			parent::__construct ();
	
	}


	function get_data_email_check($email="") {

		$this->db->where('email',$email);
		$this->db->where('email_confirm',0);
		$this->db->delete('tbl_login_member');

	}

	function get_data_email_check_confirm($email="") {

		$query = $this->db->query ( 'select * from tbl_login_member where email ="'.$email.'" AND email_confirm = 1' );
		if($query->num_rows()>0)
			return TRUE;
		else
		return FALSE;
	}

	function get_data_email_check_confirm1($id="") {

		$query = $this->db->query ( 'select * from tbl_login_member where id ="'.$id.'"' );
		if($query->num_rows()>0)
			return TRUE;
		else
		return FALSE;
	}


	/*----------------/ magement - register /---------------------------*/

	function register_add(){

		$str = $this->input->post('birthday');
		$birth = explode("-",$str);


		$key= substr(md5(mt_rand()), 0, 25);

			 $image_info = $this->upload->data();
			 $name = $this->input->post('name');
			 $email = $this->input->post('email');
			 $tel = $this->input->post('tel');
			 $password = md5($this->input->post('password'));
			 $auth_session = $key;
			 $auth_session_edit = $key;
			 $created_date = date('Y-m-d h:i:s');
			 $data = array(
			 	'img' => $image_info['file_name'],
            	'name' => $name,
            	'email' => $email,
            	'tel' => $tel,
            	'password' => $password,
            	'auth_session' => $auth_session,
            	'auth_session_edit' => $auth_session_edit,
            	'created_date' => $created_date
            );
			 $this->db->insert('tbl_login_member', $data);
	}

	function register_add_img(){

		$str = $this->input->post('birthday');
		$birth = explode("-",$str);


		$key= substr(md5(mt_rand()), 0, 25);


			 $name = $this->input->post('name');
			 $email = $this->input->post('email');
			 $tel = $this->input->post('tel');
			 $password = md5($this->input->post('password'));
			 $auth_session = $key;
			 $auth_session_edit = $key;
			 $created_date = date('Y-m-d h:i:s');
			 $data = array(
            	'name' => $name,
            	'email' => $email,
            	'tel' => $tel,
            	'password' => $password,
            	'auth_session' => $auth_session,
            	'auth_session_edit' => $auth_session_edit,
            	'created_date' => $created_date
            );
			 $this->db->insert('tbl_login_member', $data);
	}

	function get_data_email_confirm($email=""){
		$query = $this->db->query ( 'SELECT * FROM tbl_login_member WHERE email = "'.$email.'"');
		return $query->row_array();
	}

	function check_session($id){
		$query = $this->db->query ( 'SELECT * FROM tbl_login_member WHERE id = "'.$id.'"');
		$row = $query->row();
		@$auth_session_edit = $row->auth_session_edit;
		return @$auth_session_edit;
	}

	function email_confirm_complate($id=""){
		$key= substr(md5(mt_rand()), 0, 25);

			$data_update = array (
				'email_confirm' =>  1,
				'auth_session_edit' =>  $key
			);
			$this->db->where('id',  $id);
			$this->db->update ( 'tbl_login_member', $data_update );	
		}
	

}
