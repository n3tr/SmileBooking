<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Adminpanel extends CI_Controller {

	public function login()
	{
		$data['title'] = "Login";
		$this->load->view('admin-template/header',$data);
		$this->load->view('admin/login');
		$this->load->view('admin-template/footer');
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


	public function formtable()
	{
		$data['title'] = "Add Table for Customer";
		$this->load->view('admin-template/header',$data);
		$this->load->view('admin/addtable');
		$this->load->view('admin-template/footer');
	}


	public function addtable()
	{
		if ($this->session->userdata('is_admin') == TRUE ){
			$tableland_id = $this->input->post('tableland_id');
				$data = array(
				'tableland_id' => $tableland_id 
					);
			$this->db->insert('tableland', $data); 
			redirect('adminpanel/formtable');
		} else {
			echo "You not Admin";
		}
	}



	public function managecus()
	{
		$query = $this->db->get('customer');
		$result = $query->result();
		$data['result'] = $result;


		$data['title'] = "Management for Customer";
		$this->load->view('admin-template/header',$data);
		$this->load->view('admin/delcus',$data);
		$this->load->view('admin-template/footer');
	}

	public function delcus($id)
	{
		if ($this->session->userdata('is_admin') == TRUE ){
				
				$this->db->delete('customer', array('cus_id' => $id));
				redirect('adminpanel/managecus');
		} else {
			echo "You not Admin";
		}
			
	}


	public function formtype()
	{	
		$data['title'] = "Add Type of Food";
		$this->load->view('admin-template/header');
		$this->load->view('admin/addtype');
		$this->load->view('admin-template/footer');
	}
	
	public function addtype()
	{	
		if ($this->session->userdata('is_admin') == TRUE ){
		$nametype = $this->input->post('name');
		$data = array(
			'name' => $nametype 
			);
		$this->db->insert('food_type', $data); 
		redirect('adminpanel/formtype');
		} else {
			echo "You not Admin";
		}
	}


	public function formfood()
	{	
		$query = $this->db->get('food_type');
		$option = array();
		foreach ($query->result() as $row)
		{	
			$option[$row->type_id] = $row->name;
		}

		$data['option'] = $option;

		$this->load->view('admin-template/header');
		$this->load->view('admin/addfood', $data);
		$this->load->view('admin-template/footer');
	}


	public function addfood()
	{	
		if ($this->session->userdata('is_admin') == TRUE ){
		$name = $this->input->post('name');
		$price = $this->input->post('price');
		$desc = $this->input->post('desc');
		$pic_url = $this->input->post('pic_url');
		$type_id = $this->input->post('type_id');
		$data = array(
			'name' => $name, 
			'price' => $price,
			'desc' => $desc,
			'pic_url' => $pic_url,
			'type_id' => $type_id
			);
		$this->db->insert('food', $data); 
		redirect('adminpanel/formfood');
		} else {
			echo "You not Admin";
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
	}
}

