<?php
	echo "<div style='float:left;margin-right:60px'>";
	$drop_type = array();
	$drop_type[0] = 'All';
	foreach ($food_type as $type) {
		$drop_type[$type['type_id']] = $type['name'];
	}

	$food_type_id = isset($food_type_id) ? $food_type_id : 0;

	echo form_open('onlineorder/index');
	echo form_dropdown('food_type_id',$drop_type);
	echo form_submit('submit','Submit');
	echo form_close();


	foreach ($foods as $food) {
		$this->table->set_heading(/*'Image',*/'Name', 'Price','Add');
		
		$this->table->add_row(/*img('images/food.jpg'),*/$food['name'],$food['price'],anchor('onlineorder/add/' . $food['food_id'],'add'));
	
	}


	
	echo $this->table->generate();
	echo $this->pagination->create_links();
	echo "</div>";
?>