<?php
	echo 'เลขโต๊ะ  '.$user['tableland_id'];
	echo '<table border="1">';
	echo '<tr>'.'<th>'.'รายการ'.'</th>'.'<th>'.'จำนวน'.'</th>'.'<th>'.'ราคา/หน่วย'.'</th>'.'<th>'.'ราคา'.'</th>'.'</tr>';
	$sum=0;
	$total=0;
	foreach ($orders as $order)
	{
		echo '<tr>'.'<td>';
		echo $order['name'].'</td>'.'<td align="right">';
		echo $order['quantity'].'</td>'.'<td align="right">';
		echo $order['price'].'</td>'.'<td align="right">';
		$sum = $order['quantity']*$order['price'];
		$total = $total+$sum;
		echo $sum.'</td>'.'</tr>';
	}	echo '<tr>'.'<td colspan="3" align="center">'.'รวม'.'</td>'.'<td align="right">'.$total.'</td>'.'</tr>';
	echo '</table>';
?>