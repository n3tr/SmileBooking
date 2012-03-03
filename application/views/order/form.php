<?php
	echo form_open('order/checkorder');
	echo form_label('เลขโต๊ะ', 'tableland_id');
	echo form_input('tableland_id');
	echo form_submit('mysubmit', 'Submit');
?>