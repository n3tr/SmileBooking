<?php
	
	// Show Table of booking
	$tmpl = array (
                    'table_open'          => '<table class="table table-bordered">'
                    );
	$this->table->set_template($tmpl);
	$this->table->set_heading(array('Booking ID', 'Table Number', 'Booking Owner','Booking Status','Confirm','Reject'));

	foreach ($bookings as $booking) {
		$this->table->add_row(array(
			$booking['booking_id'], 
			$booking['tableland_id'],
			$booking['fname'], 
			$booking['booking_status'],
			anchor('booking/admin_confirm/' . $booking["booking_id"],'Confirm'),
			anchor('booking/admin_reject/' . $booking["booking_id"] . '/' . $booking['tableland_id'],'Reject')


			));
	}

	echo $this->table->generate();


	echo form_open('booking/checkbooking');
	echo form_label('Name', 'fname');
	echo form_input('fname');
	echo form_submit('mysubmit', 'Submit');
?>