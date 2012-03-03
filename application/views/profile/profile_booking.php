<p>รายการจองของคุณมีดังนี้</p>

<?php

	if(isset($booking)){
		$this->table->add_row(array('Booking ID',$booking['booking_id']));
	$this->table->add_row(array('Table Number',$booking['tableland_id']));
	$this->table->add_row(array('Booking Time',$booking['booking_date']));

	echo $this->table->generate();	
	echo "<p>คุณสามารถยกเลิกการจองของคุณโดยการ" .  anchor('profile/cancel_booking','คลิกลิ้งค์นี้') . "</p>";
	}else{
		echo "<p>คุณไม่มีการจอง</p>";
	}
	
?>

