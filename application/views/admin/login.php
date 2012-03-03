<?php
echo form_open('adminpanel/check');
	echo form_label('User :', 'username');
	echo form_input('username');
	echo br();
	echo form_label('Password :', 'password');
	echo form_password('password');
	echo br();
	echo form_submit('mysubmit', 'Submit');
?>