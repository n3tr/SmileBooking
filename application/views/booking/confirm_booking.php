<?php



	
	
	$this->table->add_row('Table Number', $table_id);
	$this->table->add_row('Customer Name', $user['fname'] . ' ' . $user['lname']);
	$this->table->add_row('Tel', $user['telephone']);


	$this->table->add_row(anchor('booking',"Cancel"),
		anchor('booking/confirm_booking/' .$table_id,'Confirm'));
	echo $this->table->generate();
?>