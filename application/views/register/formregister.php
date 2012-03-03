<?php 
	echo form_open('register/create');
	echo form_label('User :', 'username');
	echo form_input('username');
	echo br();
	echo form_label('Password :', 'password');
	echo form_password('password');
	echo br();
	echo form_label('First Name :', 'fname');
	echo form_input('fname');
	echo br();
	echo form_label('Last Name :', 'lname');
	echo form_input('lname');
	echo br();
	echo form_label('Telephone :', 'tel');
	echo form_input('tel');
	echo br();
	echo form_label('E-mail :', 'email');
	echo form_input('email');
	echo br();
	echo form_submit('mysubmit', 'Submit');
?>