<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {


	public function form()
	{
		$this->load->view('template/header');
		$this->load->view('register/formregister');
		$this->load->view('template/footer');
	}
	public function create()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$fname = $this->input->post('fname');
		$lname = $this->input->post('lname');
		$tel = $this->input->post('tel');
		$email = $this->input->post('email');
		
		$data = array(
			'username' => $username ,
			'password' => $password ,
			'fname' => $fname,
			'lname' => $lname,
			'telephone' => $tel,
			'e-mail' => $email,
);

<<<<<<< HEAD
		$this->db->insert('customer', $data);

		$this->load->view('template/header'); 
		$this->load->view('register/successview');
		$this->load->view('template/footer');
=======
$this->db->insert('customer', $data); 
		redirect('signin/loginform');
>>>>>>> b6b1105e4cbf60a6710383916f084e13d08b7438
	}
}

