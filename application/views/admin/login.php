<?php
	echo form_open('adminpanel/check');
	echo '<table>';
	echo '<tr>'.'<td>';
	echo form_label('User', 'username');
	echo '</td>'.'<td>'.':';
	echo form_input('username');
	echo '</td>'.'</tr>';
	echo '<tr>'.'<td>';
	echo form_label('Password', 'password');
	echo '</td>'.'<td>'.':';
	echo form_password('password');
	echo '<tr>'.'<td>';
	echo form_submit('mysubmit', 'Submit');
	echo '</td>'.'<td>'.'&nbsp;'.'</td>'.'</tr>';
	echo '</table>';
?>