<?php

	$sum_price = 0;
	$tmpl = array (
                    'table_open'          => '<table class="table table-bordered">'
                    );
	$this->table->set_template($tmpl);
	$this->table->set_heading(array('Food Name', 'Price/Unit','Quantity','Price Con.'));

	foreach ($orders as $order) {
		$this->table->add_row(array(
			$order['name'], 
			$order['price'],
			$order['quantity'],
			$order['quantity'] * $order['price']
		
		


			));
		$sum_price += $order['quantity'] * $order['price'];
	}

	echo $this->table->generate();
	echo "<h3>ราคารวม : " . $sum_price . "</h3>";

	echo anchor('order/form','< Back to order page')
?>


