<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Adminpanel extends CI_Controller {

	public function login()
	{
		$this->load->view('admin/login');
	}


	public function check()
	{	
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$query = $this->db->get_where('employee', array('username' => $username, 'password' => $password),1);
		$result = $query->result();

		if(count($result)!=0){
			$newdata = array(
                   'username'  => $username,
                   'logged_in' => TRUE,
					'is_admin' => TRUE
               );
			$this->session->set_userdata($newdata);
		//	$this->load->view('register/successview');
			echo $this->session->userdata('username');
	
		}else{
			redirect('adminpanel/login');
		}
	}


	public function addtable()
	{
		$this->load->view('admin/addtable');
	}

}

