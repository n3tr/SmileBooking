<?php

	$this->table->add_row('Booking ID', $booking_data['booking_id']);
	$this->table->add_row('Booking Owner', $booking_data['fname'] . ' ' . $booking_data['lname']);

	$this->table->add_row('Booking Time', $booking_data['booking_date']);
	$this->table->add_row('Telephone', $booking_data['telephone']);
	$this->table->add_row(anchor('booking','Back to Home'), anchor('onlineorder','Pre Order'));
	echo $this->table->generate();

?>