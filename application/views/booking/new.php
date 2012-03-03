<?php
	echo img('images/tableplan.jpg');


	foreach ($tablelist as $table) {
		if ($table->status == 0) {
			echo anchor('booking/create/' . $table->tableland_id , $table->tableland_id);
		}else if($table->status == 1){
			echo '<p color="black">' . $table->tableland_id . '</p>';
		}else{
			echo '<p color="red">' . $table->tableland_id . '</p>';
		}
		
	}
?>