<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Booking extends CI_Controller {


	public function index()
	{

		$user_id = $this->session->userdata('user_id');

		$this->db->select('*');
		$this->db->from('booking');
		$this->db->where('cus_id',$user_id);
		$this->db->where('booking_status' , 1);
		$this->db->where('tableland_id !=' , 0);
		$query = $this->db->get();

		//print_r($query->result());die();

		if($query->num_rows() > 0){
			$this->load->view('template/header');
			$this->load->view('booking/alreadybook');
			$this->load->view('template/footer');
			return;
		}

		if($this->session->userdata('logged_in') != TRUE ){
			redirect('signin/loginform');
		}else{

			$this->db->order_by("tableland_id", "asc"); 
			$query = $this->db->get('tableland');

			$data['tablelist'] = $query->result();

			$this->load->view('template/header',$data);
			$this->load->view('booking/new', $data);
			$this->load->view('template/footer',$data);
		}
	}

	public function create($table_id)
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			$user_id = $this->session->userdata('user_id');

			//$tableland_data = array(
							// 	'cus_id' => $user_id,
							// 	'tableland_id' => $table_id
							// );

			//$this->db->insert('booking',$tableland_data);

			//$this->db->where('tableland_id',$table_id);

			

			$query = $this->db->get_where('customer',array('cus_id'=>$user_id),1);
			


			$data['user'] = $query->first_row('array');
			$data['table_id'] = $table_id;

			$this->load->view('template/header');
			$this->load->view('booking/confirm_booking',$data);
			$this->load->view('template/footer');

		}
	}

	public function confirm_booking($table_id)
	{

		$mysqldate = date( 'Y-m-d H:i:s');
		$user_id = $this->session->userdata('user_id');
		$booking_status = 1;

		$tableland_data = array(
								'cus_id' => $user_id,
								'tableland_id' => $table_id,
								'booking_date' => $mysqldate,
								'booking_status' => $booking_status
							);


		$this->db->flush_cache();

		$this->db->insert('booking',$tableland_data);
	

		$this->db->flush_cache();


		$this->db->where('tableland_id',$table_id);
		$this->db->update('tableland',array('status'=>'1'));

		

		$this->db->flush_cache();

		$this->db->select('*');
		$this->db->from('booking');
		$this->db->join('customer','customer.cus_id = booking.cus_id');
		$this->db->where('booking_date',$mysqldate);
		$this->db->where('tableland_id',$table_id);
		$this->db->where('tableland_id !=','0');
		$query = $this->db->get();

		$booking_data = $query->first_row('array');

		$data['booking_data'] = $booking_data;

		$this->session->set_userdata('booking_id',$booking_data['booking_id']);

		$this->load->view('template/header');
		$this->load->view('booking/success_booking',$data);
		$this->load->view('template/footer');

	}





	public function show()
	{	

		$this->db->select('*');
		$this->db->from('booking');
		$this->db->join('customer','customer.cus_id = booking.cus_id');
		$this->db->where('booking_status',1);
		$this->db->where('tableland_id !=',0);
		$query = $this->db->get('');

		$booking = $query->result('array');

		$data['bookings'] = $booking;

		$data['title'] = "Show Booking";
		$this->load->view('admin-template/header',$data);
		$this->load->view('booking/confirm',$data);
		$this->load->view('admin-template/footer');
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

	// Admin

	public function admin_confirm($booking_id)
	{
		if (isset($booking_id)) {
			$this->db->where('booking_id',$booking_id);
			$this->db->update('booking',array('booking_status'=>2));
		
		}
		redirect('booking/show');
		
	}

	public function admin_reject($booking_id,$tableland_id)
	{
		
		if (isset($booking_id)) {
			$this->db->where('booking_id',$booking_id);
			$this->db->update('booking',array('booking_status'=>3));

			$this->db->flush_cache();

			$this->db->where('tableland_id',$tableland_id);
			$this->db->update('tableland',array('status'=>0));

		
		}
		redirect('booking/show');
		
	}



}

