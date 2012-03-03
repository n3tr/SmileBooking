<?php
	
echo '<table class="table table-bordered">';
?>
<thead>
    <tr>
      <th>Customer Username</th>
      <th>Telephone</th>
      <th>Action</th>
    </tr>
  </thead>
  <?php
	foreach ($result as $row)
	{	echo '<tr>'.'<td>';
		echo $row->username;
		echo '</td>'.'<td>';
		echo $row->telephone;
		echo '</td>'.'<td>';
		echo anchor('adminpanel/delcus/' . $row->cus_id, 'delete');
		echo '</td>'.'</tr>';
	}
	echo '</table>';
?>