<?php
	echo img('images/tableplan.jpg');

	$seats = array(	);
	$seatinrow = array();
	for ($i=1; $i <= count($tablelist); $i++) { 


		
		if ($tablelist[$i-1]->status == 0) {
	
			array_push($seatinrow , anchor('booking/create/' . $tablelist[$i-1]->tableland_id ,$tablelist[$i-1]->tableland_id ));
		}else if($tablelist[$i-1]->status == 1){
			
			array_push($seatinrow , img('images/jong.bmp'));
		}else{
	
			array_push($seatinrow , img('images/jong.bmp'));
		}


		
		if ($i % 5 == 0) {
			array_push($seats, $seatinrow);
			$seatinrow = array();
		}
	}


	$tmpl = array (
                    'table_open'          => '<table border="1" cellpadding="10" cellspacing="0">',

                    'heading_row_start'   => '<tr>',
                    'heading_row_end'     => '</tr>',
                    'heading_cell_start'  => '<th>',
                    'heading_cell_end'    => '</th>',

                    'row_start'           => '<tr>',
                    'row_end'             => '</tr>',
                    'cell_start'          => '<td>',
                    'cell_end'            => '</td>',

                    'row_alt_start'       => '<tr>',
                    'row_alt_end'         => '</tr>',
                    'cell_alt_start'      => '<td>',
                    'cell_alt_end'        => '</td>',

                    'table_close'         => '</table>'
              );

$this->table->set_template($tmpl);

	echo $this->table->generate($seats);
?>