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


		$image_path = $food['pic_url']== null ? "upload/image.jpg" : $food['pic_url'];

		$image_properties = array(
          'src' => $image_path,
          'width' => '100',
          'height' => '100'  
		);

		$this->table->set_heading('Image','Name', 'Price','Add');
		
		$this->table->add_row(img($image_properties),$food['name'],$food['price'],anchor('onlineorder/add/' . $food['food_id'],'add'));
	
	}


	
	echo $this->table->generate();
	echo $this->pagination->create_links();
	echo "</div>";
?>