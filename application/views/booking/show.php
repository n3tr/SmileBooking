<?php
	echo form_open('booking/update');
	echo form_hidden('booking_id',$user['booking_id']);
	echo '<table>'.'<tr>'.'<td>';
	echo 'Booking_id'.'</td>'.'<td>';
	echo $user['booking_id'].'</td>'.'</tr>';
	echo '<tr>'.'<td>';
	echo 'ชื่อ-สกุล'.'</td>'.'<td>';
	echo $user['fname'].'&nbsp;&nbsp;'.$user['lname'];
	echo '</td>'.'</tr>'.'<tr>'.'<td>'.'เลขที่โต๊ะ'.'</td>'.'<td>';
	echo $user['tableland_id'].'</td>'.'</tr>'.'<tr>'.'<td>'.'วันที่ /เวลา'.'</td>'.'<td>';
	echo $user['booking_date'].'</td>'.'</tr>'.'<tr>'.'<td>'.form_submit('mysubmit', 'Submit');
	echo '</td>'.'<td>'.'&nbsp;'.'</td>'.'</tr>'.'</table>';
?>