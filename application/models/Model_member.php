<?php
if (! defined ( 'BASEPATH' )) exit ( 'No direct script access allowed' );
	class Model_member extends CI_Model {

		public function __construct() {
			parent::__construct ();
			$this->load->library( 'session' );

	}

/*----------------/ login-logout /---------------------------*/

	function login($user, $pass) {

			$this->db->where ( "user", $user );
			$this->db->where ( "password", $pass);
			$query = $this->db->get ( "tbl_login_member" );
			if ($query->num_rows () > 0) {
				foreach ( $query->result () as $rows ) {
					$newdata = array (
						'member_id_log' => $rows->id,
						'member_name_log' => $rows->user,
						'member_log' => TRUE 
					);
				}
				$this->session->set_userdata ( $newdata );
				return true;
			}
			return false;
		}

	function login_email($user, $pass) {
			$this->db->where ( "email", $user );
			$this->db->where ( "password", $pass);
			$this->db->where ( "email_confirm", 1);
			$query = $this->db->get ( "tbl_login_member" );
			if ($query->num_rows () > 0) {
				foreach ( $query->result () as $rows ) {
					$newdata = array (
						'member_id_log' => $rows->id,
						'member_name_log' => $rows->email,
						'member_check_confirm' => $rows->email_confirm,
						'member_log' => TRUE 
					);
				}
				$this->session->set_userdata ( $newdata );
				return true;
			}
			return false;
		}
		
		function logout(){
			
			$this->session->unset_userdata('member_id_log');
			$this->session->unset_userdata('member_name_log');
			$this->session->unset_userdata('member_log');
			// $this->session->unset_userdata('member_check_confirm');

		}

		function get_data_email($email="") {
		
			// $query = $this->db->query ( 'select * from tbl_login_member where email ="'.$email.'"' );
			// $row = $query->row();
			// $email_get = $row->email;
			// return $email_get;
			
			$query = $this->db->query ( 'select * from tbl_login_member where email ="'.$email.'" AND email_confirm = 1' );
			
			if($query->num_rows()>0)
				return TRUE;
			else
				return FALSE;

		}

		function login_email1($user="",$pass="") {
		
			$query = $this->db->query ( 'select * from tbl_login_member where email ="'.$user.'"');
			$row = $query->row();
			
			if(!empty($row->email_confirm)){
				$email_confirm = 1;
			}else{
				$email_confirm = 0;
			}
			
			return $email_confirm;

		}

		function get_data_email1($email="") {
		
			$query = $this->db->query ( 'select * from tbl_login_member where email ="'.$email.'"' );
			$row = $query->row();
			$email_get = $row->email;
			return $email_get;
			
			

		}

		function get_check_pass($id_login="") {
		$query = $this->db->query ( 'select * from tbl_login_member where id = '.$id_login.'' );
		$row = $query->row();
		 $password = $row->password;
		return  $password;
			}

		function get_data_confirm_change_pass($email_get=""){
		$query = $this->db->query ( 'SELECT * FROM tbl_login_member WHERE email = "'.$email_get.'"');
		return $query->row_array();
		}


		function get_data_member($id_login=""){
		$query = $this->db->query ( 'SELECT * FROM tbl_login_member WHERE id = "'.$id_login.'"');
		return $query->row_array();
		}


		function change_password($id_login=""){
			$key= substr(md5(mt_rand()), 0, 25);

			$data_update = array (
				'password' =>  md5($this->input->post('password')),
				'auth_session_edit' => $key,
				'modify_date_password' => date('Y-m-d h:i:s')
			);
			$this->db->where('id',  $id_login);
			$this->db->update ( 'tbl_login_member', $data_update );	
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


		function session_add($email_get1=""){
		$key= substr(md5(mt_rand()), 0, 25);

			$data_update = array (
				'auth_session_edit' =>  $key,
				'auth_session' =>  $key
			);
			$this->db->where('email',  $email_get1);
			$this->db->update ( 'tbl_login_member', $data_update );	
		}

		

		


		
	}
