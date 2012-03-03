<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signin extends CI_Controller {

	public function loginform()
	{
		$this->load->view('signin_view/signinform');
	}
	public function check()
	{	
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$query = $this->db->get_where('customer', array('username' => $username, 'password' => $password),1);
		$result = $query->result();

		if(count($result)!=0){
			$newdata = array(
                   'username'  => $username,
                   'logged_in' => TRUE
               );

			$this->session->set_userdata($newdata);
			$this->load->view('register/successview');
	
		}else{
			$this->load->view('signin_view/signinform');
		}
	}
}

