<?php
/**
 * @project Name 			CISW31 Final Project
 * @project file            show_member.php 
 * @project number 			1.0.0
 * @Date 					05172015
 * @project Description 	page to show member detail
 * @Author					
 **/

 include('fns.php');
 session_start();
 
 //get Employee Information Data from Database
 $employee_ID = $_GET['employeeNumber'];
 $employee = get_employee_detail($employee_ID);
 
 foreach ($employee as $row ){
	
	echo $employee[0]['lastName']; 
	echo $employee[0]['firstName'];
	
		
	} 
 do_html_URL('index.php','Home');
 
?>