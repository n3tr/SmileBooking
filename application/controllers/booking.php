<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Booking extends CI_Controller {


	public function index()
	{
		if($this->session->userdata('logged_in') != TRUE ){
			redirect('signin/loginform');
		}else{


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
			$this->load->view('booking/confirm_booking',$data);

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

		$this->db->insert('booking',$tableland_data);

		$this->db->where('tableland_id',$table_id);
		$this->db->update('tableland',array('status'=>'1'));

		echo "ok";



	}
}