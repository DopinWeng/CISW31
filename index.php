<?php
/**
 * @project Name 			CISW31 Final Project
 * @project file            index.php 
 * @project number 			1.0.0
 * @Date 					05172015
 * @project Description 	index pages to show product category
 * @Author					Dopin
 */
 

 include ('fns.php');
 
session_start();
 
do_html_header();
  
  echo "please select Service category that you need.";

  $cat_array = get_categories(); // get product categories

  // display as links to cat pages, we should modify it to our way to display product categories 
  display_categories($cat_array);

  
  
do_html_footer();


?>