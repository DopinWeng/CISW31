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
 $employee_name = $employee['lastName']." ".$employee['firstName']; 
 do_html_header($employee_name);
 
 display_employee_detail($employee);
 
 display_button('show_cart.php?new='.$employee_ID, 'add-to-cart', 'Add to Cart');
 display_button('index.php','Continue-shopping','Home');
 //do_html_URL('index.php','Home');
 
 do_html_footer();
?>