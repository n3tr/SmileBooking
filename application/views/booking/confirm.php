<?php
	echo form_open('booking/checkbooking');
	echo form_label('Name', 'fname');
	echo form_input('fname');
	echo form_submit('mysubmit', 'Submit');
?>