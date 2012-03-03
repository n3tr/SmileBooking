<?php
		echo form_open_multipart('adminpanel/addfood');
		echo '<table class="table table-bordered">'.'<tr>'.'<td>';
		echo form_label('Name', 'name');
		echo '</td>'.'<td>';
		echo form_input('name');
		echo '</td>'.'</tr>'.'<tr>'.'<td>';
		echo form_label('Price', 'price');
		echo '</td>'.'<td>';
		echo form_input('price');
		echo '</td>'.'</tr>'.'<tr>'.'<td>';
		echo form_label('Description', 'desc');
		echo '</td>'.'<td>';
		echo form_input('desc');
		echo '</td>'.'</tr>'.'<tr>'.'<td>';
		echo form_label('Image', 'pic_url');
		echo '</td>'.'<td>';
		echo form_upload('pic_url');
		echo '</td>'.'</tr>'.'<tr>'.'<td>';
		echo form_label('NameType', 'name');
		echo '</td>'.'<td>';
		echo form_dropdown('type_id', $option, '1');
		echo '</td>'.'</tr>'.'<tr>'.'<td>';
		echo form_submit('mysubmit', 'Submit');
		echo '</td>'.'<td>'.'&nbsp;'.'</td>'.'</tr>'.'</table>';

?>