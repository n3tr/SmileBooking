<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function show()
	{	
		$id = $this->session->userdata('user_id');
		$query = $this->db->get_where('customer', array('cus_id' => $id), 1);
		$user = $query->first_row('array');
		$data['user'] = $user;

		$this->load->view('template/header',$data);
		$this->load->view('profile/show',$data);
		$this->load->view('template/footer',$data);
	}

	public function booking()
	{
		$data['title'] = "Profile Booking";

		$user_id = $this->session->userdata('user_id');
		if(!isset($user_id)){
			redirect('signin/loginform');
			return;
		}

		$this->db->select('*');
		$this->db->from('booking');
		$this->db->join('customer','customer.cus_id = booking.cus_id');
		$this->db->where('booking.cus_id',$user_id);
		$this->db->where('booking.booking_status',1);
		$this->db->where('booking.tableland_id !=', 0);
		$query = $this->db->get('');

		if ($query->num_rows() > 0) {
			$booking = $query->first_row('array');
			$data['booking'] = $booking;
		}



		$this->load->view('template/header');
		$this->load->view('profile/profile_booking',$data);
		$this->load->view('template/footer');
	}

	public function cancel_booking()
	{
		$user_id = $this->session->userdata('user_id');
		if(!isset($user_id)){
			redirect('signin/loginform');
			return;
		}

		$this->db->select('*');
		$this->db->from('booking');
		$this->db->join('customer','customer.cus_id = booking.cus_id');
		$this->db->where('booking.cus_id',$user_id);
		$this->db->where('booking_status',1);
		$this->db->where('tableland_id !=', 0);
		$query = $this->db->get('');

		$booking = $query->first_row('array');

		$this->db->flush_cache();

		$this->db->where('booking_id',$booking['booking_id']);
		$this->db->where('tableland_id !=',0);
		$this->db->update('booking',array('booking_status'=>3));


		$this->db->flush_cache();

		$this->db->where('tableland_id',$booking['tableland_id']);
		$this->db->update('tableland',array('status'=>0));

		$this->session->unset_userdata('booking_id');

		$this->load->view('template/header');
		$this->load->view('profile/cancel_booking');
		$this->load->view('template/footer');
	}
}

