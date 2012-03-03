<?php

	// Show Table of booking
	$tmpl = array (
                    'table_open'          => '<table class="table table-bordered">'
                    );
	$this->table->set_template($tmpl);
	$this->table->set_heading(array('Booking ID', 'Table Number', 'Booking Owner','Booking Status','View','Clear'));

	foreach ($bookings as $booking) {
		$this->table->add_row(array(
			$booking['booking_id'], 
			$booking['tableland_id'],
			$booking['fname'], 
			$booking['booking_status'],
			anchor('order/vieworder/' . $booking["order_id"],'View Order'),
			anchor('order/clear/' . $booking["booking_id"] . '/' . $booking['tableland_id'],'Clear Order')


			));
	}

	echo $this->table->generate();
	// echo form_open('order/checkorder');
	// echo form_label('เลขโต๊ะ', 'tableland_id');
	// echo form_input('tableland_id');
	// echo form_submit('mysubmit', 'Submit');
?>