<?php
	
echo '<table>';
	foreach ($result as $row)
	{	echo '<tr>'.'<td>';
		echo $row->username;
		echo '</td>'.'<td>';
		echo anchor('adminpanel/delcus/' . $row->cus_id, 'delete');
		echo '</td>'.'</tr>';
	}
	echo '</table>';
?>