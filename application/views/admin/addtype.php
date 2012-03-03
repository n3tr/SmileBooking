<?php
	echo form_open('adminpanel/addtype');
	echo '<table>'.'<tr>'.'<td>';
	echo form_label('NameType', 'name');
	echo '</td>'.'<td>';
	echo form_input('name');
	echo '</td>'.'<td>';
	echo form_submit('mysubmit', 'Submit');
	echo '</td>'.'</tr>'.'</table>';
?>