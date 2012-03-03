<?php
	
	$tmpl = array (
                    'table_open'          => '<table class="table table-bordered">'
                    );
	$this->table->set_template($tmpl);
	$this->table->set_heading(array('Date', 'Reverse Count'));

	foreach ($report as $res) {
		$this->table->add_row(array($res['day_date'],$res['count']));
	}

	echo $this->table->generate();
?>