<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Onlineorder extends CI_Controller {

	public function index()
	{
		$food_type_id = $this->input->post('food_type_id');

		if ($food_type_id && $food_type_id != 0) {
			$query = $this->db->get('food');
			$food = $query->result('array');
			

			$config['base_url'] = site_url('onlineorder/index/');
			$config['total_rows'] = $this->db->get_where('food',array('type_id'=>$food_type_id))->num_rows();
			$config['per_page'] = 5; 

			$this->pagination->initialize($config); 

			
			$data['foods'] = $this->db->get_where('food', array('type_id'=>$food_type_id),$config['per_page'], $this->uri->segment(3))->result('array');

			$data['food_type_id'] = $food_type_id;
			$data['food_type'] = $this->db->get('food_type')->result('array');

			$this->load->view('template/header');
			$this->load->view('onlineorder/foodlist',$data);
			$this->load->view('onlineorder/cart');
			$this->load->view('template/footer');
		}else{
			$query = $this->db->get('food');
			$food = $query->result('array');
			

			$config['base_url'] = site_url('onlineorder/index/');
			$config['total_rows'] = $this->db->get('food')->num_rows();
			$config['per_page'] = 5; 

			$this->pagination->initialize($config); 

			
			$data['foods'] = $this->db->get('food', $config['per_page'], $this->uri->segment(3))->result('array');
			$data['food_type'] = $this->db->get('food_type')->result('array');
			

			$this->load->view('template/header');
			
			$this->load->view('onlineorder/foodlist',$data);
			$this->load->view('onlineorder/cart');
			$this->load->view('template/footer');
		}
	}


	public function add($food_id=0)
	{
		if ($food_id == 0) {
			redirect('onlineorder/index');
		}else{
			$query = $this->db->get_where('food',array('food_id'=>$food_id));
			$food_data = $query->first_row('array');

			$cart_data = array(
								'id' => $food_data['food_id'],
								'qty' => 1,
								'price' => $food_data['price'],
								'name' => $food_data['name']
				);
			$this->cart->insert($cart_data);

			redirect('onlineorder/index');
		// $this->load->view('template/header');
		// $this->load->view('onlineorder/cart');
		// $this->load->view('template/footer');
		}
	}

	public function updateorder()
	{


		# code...;
		$rowids =  $this->input->post('rowid');
		$qtys = $this->input->post('qty');

		$update_data = array();

		for ($i=0; $i < count($rowids); $i++) { 
			array_push($update_data, array('rowid' => $rowids[$i], 'qty'=> $qtys[$i]));
		}

		$this->cart->update($update_data);

		
	
		redirect('onlineorder/index');
		// $this->load->view('template/header');
		// $this->load->view('onlineorder/cart');
		// $this->load->view('template/footer');
		
	}

	public function placeorder()
	{
		$current_order = $this->session->userdata('booking_id');
		$this->db->insert('order',array('booking_id'=>$current_order));

		$order_id = $this->db->get('order')->last_row('array');

	
		$orders = array();
		foreach ($this->cart->contents() as $order) {
			array_push($orders, array('food_id'=> $order['id'] , 'quantity' => $order['qty'] , 'order_id' => $order_id['order_id'] ));
		}


		$this->db->insert_batch('order_detail',$orders);

		$this->session->unset_userdata('booking_id');
		$this->cart->destroy();

		$this->load->view('template/header');
		$this->load->view('onlineorder/success');
		$this->load->view('template/footer');
	}
}

