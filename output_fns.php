<?php
/**
 * @project Name 			CISW31 Final Project
 * @project file            index.php 
 * @project number 			1.0.0
 * @Date 					05172015
 * @project Description 	index pages to show product category
 * @Author					Dopin
 */
?>
 
 <?php
 function do_html_header($title=''){
 //print HTML Header
 // declare the session variables we want access to inside the function
  if (!$_SESSION['items']) {
    $_SESSION['items'] = '0';
  }
  if (!$_SESSION['total_price']) {
    $_SESSION['total_price'] = '0.00';
  }
 ?>

<!DOCTYPE html>
 <html>
 <head>
 <title><?php echo $title; ?></title>
    <style>
      h2 { font-family: Arial, Helvetica, sans-serif; font-size: 22px; color: red; margin: 6px }
      body { font-family: Arial, Helvetica, sans-serif; font-size: 13px }
      li, td { font-family: Arial, Helvetica, sans-serif; font-size: 13px }
      hr { color: #FF0000; width=70%; text-align=center}
      a { color: #000000 }
    </style>
 </head>
 <body>
 
 
 <table width="100%" border="0" cellspacing="0" bgcolor="#cccccc">
  
  <tr>
  <td rowspan="2">
  <a href="index.php"><img src="assets/padre_logo.jpg" alt="PADRE" border="0"
       align="left" valign="bottom" height="55" width="325"/></a>
  </td>
  <td align="right" valign="bottom">
  <?php
     if(isset($_SESSION['admin_user'])) {
       echo "&nbsp;";
     } else {
       echo "Total Items = ".$_SESSION['items'];
     }
  ?>
  </td>
  <td align="right" rowspan="2" width="135">
  <?php
     if(isset($_SESSION['admin_user'])) {
       display_button('logout.php', 'log-out', 'Log Out');
     } else {
       display_button('show_cart.php', 'view-cart', 'View Your Shopping Cart');
     }
  ?>
  </tr>
  <tr>
  <td align="right" valign="top">
  <?php
     if(isset($_SESSION['admin_user'])) {
       echo "&nbsp;";
     } else {
       echo "Total Price = $".number_format($_SESSION['total_price'],2);
     }
  ?>
  </td>
  </tr>
  
  </table>
	<nav>
	 <a href ="index.php">Home</a>
	 <a href ="">About us</a>
	 <a href ="">contact us</a>
	 <a href ="">Services</a>
	</nav>
 
  
	<hr />
 
 <?php
  if($title) {
    do_html_heading($title);
  }
}

function do_html_footer() {
  // print an HTML footer
?>
  </body>
  </html>

  <?php
}
function do_html_heading($heading) {
  // print heading
?>
  <h2><?php echo $heading;?></h2>
<?php
}

function do_html_URL($url, $name) {
  // output URL as link and br
?>
  <br /><a href="<?php echo $url;?>"><?php echo $name;?></a><br />
  
<?php
}

function display_categories($cat_array)
{
echo "<ul>";
foreach ($cat_array as $row){
	$url = "show_cat.php?productLine=".($row['productLine']);
	$title = $row['productLine'];
	echo "<li>";
	do_html_URL($url,$title);
	echo "</li>";
}
echo "</ul>";
echo "<hr />";

?>

<?php
}

function display_employees($employee_array)
{
//print_r ($employee_array);

echo "<ul>";
foreach ($employee_array as $row ){
	$employe_ID = $row['employeeNumber'];
	$employee = get_employee_detail($employe_ID);
	$url = "show_employee.php?employeeNumber=".($row['employeeNumber']);
	$title = $employee['lastName'];
	echo "<li>";
	do_html_URL($url,$title);
	echo "</li>";
	
		
	}
echo "</ul>";
}

function display_employee_detail($employee){
if (is_array($employee)) {
    echo "<table><tr>";
    //display the picture if there is one
    if (@file_exists("assets/".$employee['employeeNumber'].".jpg"))  {
      $size = GetImageSize("assets/".$employee['employeeNumber'].".jpg");
      if(($size[0] > 0) && ($size[1] > 0)) {
        echo "<td><img src=\"assets/".$employee['employeeNumber'].".jpg\"
              style=\"border: 1px solid black\"/></td>";
      }
    }
    echo "<td><ul>";
    echo "<li><strong>Employee lastName:</strong> ";
    echo $employee['lastName'];
    echo "</li><li><strong>email:</strong> ";
    echo $employee['email'];
    echo "</li><li><strong>Report to:</strong> ";
    echo number_format($employee['reportsTo'], 2);
    echo "</li><li><strong>Job Title:</strong> ";
    echo $employee['jobTitle'];
    echo "</li></ul></td></tr></table>";
  } else {
    echo "<p>The details of this book cannot be displayed at this time.</p>";
  }
  echo "<hr />";
}

function display_button($target, $image, $alt) {
  echo "<div align=\"center\"><a href=\"".$target."\">
          <img src=\"assets/".$image.".gif\"
           alt=\"".$alt."\" border=\"0\" height=\"50\"
           width=\"135\"/></a></div>";
}

function display_form_button($image, $alt) {
  echo "<div align=\"center\"><input type=\"image\"
           src=\"assets/".$image.".gif\"
           alt=\"".$alt."\" border=\"0\" height=\"50\"
           width=\"135\"/></div>";
}

?>
