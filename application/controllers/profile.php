<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function show()
	{	$id = $this->session->userdata('user_id');
		$query = $this->db->get_where('customer', array('cus_id' => $id), 1);
		$user = $query->first_row('array');
		$data['user'] = $user;

		$this->load->view('template/header',$data);
		$this->load->view('profile/show',$data);
		$this->load->view('template/footer',$data);
	}
}

