<?php
//show product Categories

	include ('fns.php');
	
	session_start();
	$productLine = $_GET['productLine'];
	do_html_header($productLine);
		
	$employee_array = get_employee_Number($productLine);
	if (count($employee_array) ==0){
	echo "no result";
	}else{
	
	display_employees($employee_array);
	}
	do_html_footer();
?>