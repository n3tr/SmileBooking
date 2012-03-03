<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Booking extends CI_Controller {

	public function show()
	{	
		$this->load->view('booking/confirm');
	}


	public function checkbooking()
	{	
		$fname = $this->input->post('fname');
		$this->db->select('*');
		$this->db->from('booking');
		$this->db->join('customer', 'customer.cus_id = booking.cus_id');
		$this->db->where('fname', $fname);
		$this->db->where('booking_status',1);
		$query = $this->db->get();

		if ($query->num_rows() > 0 ){
		$user = $query->first_row('array');
		$data['user'] = $user;
		

		$this->load->view('booking/show',$data);
		}else{
			redirect('booking/show');
		}
	}

	public function update()
	{	
		$booking_id = $this->input->post('booking_id');
		$this->db->where('booking_id',$booking_id);
		$this->db->update('booking', array('booking_status'=>'2'));
	}
}