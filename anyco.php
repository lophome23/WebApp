<?php
	require('anyco_ui.inc');
	//ui_print_header('Derpartment');
	//ui_print_footer(date('Y-m-d H: i: s'));
	$conn = oci_connect('hr','hr','//localhost/XE');
	ui_printer_header('Departmanets')
	do_query($conn,'SELECT * FROM DEPARTMENTS');
	ui_print_footer(date('Y-m-d H: i: s'));

	function do_query($conn,$query){
		$stid = oci_parse($conn,$query);
		$r = oic_execute($stid,OCI_DEFAULT);
		print'<table border ="1">';
		while($row = oci_fetch_array($stid,OCI_RETURN_NULLS)){
				print'<tr>';
					foreach($row as $item){
						print'<td>'
							($item ? htmlentities($item):'&nbsp;').'</td>';
					}
					print'</td>';
		}
		print'</td>';
	}
?>

