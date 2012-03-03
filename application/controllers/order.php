<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order extends CI_Controller {

	public function form()
	{	
		$this->db->select('*');
		$this->db->from('booking');
		$this->db->join('customer','customer.cus_id = booking.cus_id');
		$this->db->join('order','booking.booking_id = order.booking_id');
		$this->db->where('booking_status',2);
		$this->db->where('tableland_id !=',0);
		$query = $this->db->get('');

		$booking = $query->result('array');

		

		$data['bookings'] = $booking;

		$data['title'] = "Confirm Order";

		
		$this->load->view('admin-template/header', $data);
		$this->load->view('order/form',$data);
		$this->load->view('admin-template/footer');
	}


	public function checkorder()
	{	
		$tableland_id = $this->input->post('tableland_id');
		$this->db->select('*');
		$this->db->from('booking');
		$this->db->join('order', 'order.booking_id = booking.booking_id');
		$this->db->where('tableland_id', $tableland_id);
		$this->db->where('booking_status',2);
		$query = $this->db->get();

		if ($query->num_rows() > 0 ){
		$user = $query->first_row('array');
		$data['user'] = $user;



		//$data['order'] =$this->db->get_where('order_detail',array('order_id'=>$user['order_id']))->result('array');


		$this->db->select('*');
		$this->db->from('order_detail');
		$this->db->join('food', 'food.food_id = order_detail.food_id');
		$this->db->where('order_id', $user['order_id']);
		$order_query = $this->db->get()->result('array');

		$data['orders'] = $order_query;

		$this->load->view('order/show',$data);
		}else{
			redirect('order/form');
		}
	}



	function vieworder($order_id)
	{
		$this->db->select('*');
		$this->db->from('order_detail');
		$this->db->join('food','food.food_id = order_detail.food_id');
		$this->db->where('order_id',$order_id);
		$query = $this->db->get();


		$orders = $query->result('array');
		$data['orders']  = $orders;
		$data['title'] = "Order Detail : " . $order_id; 


		$this->load->view('admin-template/header',$data);
		$this->load->view('order/vieworderdetail');
		$this->load->view('admin-template/footer',$data);
	}


	public function clear($booking_id,$tableland_id)
	{
		$this->db->where('booking_id',$booking_id);
		$this->db->update('booking',array('booking_status' => 4));


		$this->db->where('tableland_id',$tableland_id);
		$this->db->update('tableland',array('status' => 0));

		redirect('order/form');

	}

}

