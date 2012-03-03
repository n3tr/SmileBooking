<?php
	echo '<table border="1" width="40%">';
	echo '<th align="center" colspan="2">'.'Profile'.'</th>';
	echo '<tr>'.'<td>'.'ชื่อ-สกุล'.'</td>'.'<td>'.$user['fname'].'&nbsp;&nbsp;'.$user['lname'].'</td>'.'</tr>';
	echo '<tr>'.'<td>'.'เบอร์โทรศัพท์'.'</td>'.'<td>'.$user['telephone'].'</td>'.'</tr>';
	echo '<tr>'.'<td>'.'E-mail'.'</td>'.'<td>'.$user['e-mail'].'</td>'.'</tr>';
	echo '</table>'
?>