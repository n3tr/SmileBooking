<?php
	echo form_open('adminpanel/addtable');
	echo form_label('Add table :', 'tableland_id');
	echo form_input('tableland_id');
	echo form_submit('mysubmit', 'Submit')
?>