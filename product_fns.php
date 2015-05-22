<?php


function get_categories(){
//query database for list of categories
$conn = db_connect();
$query = "select * from productlines";
$result = @$conn->query($query);
if(!$result){
return false;
}
$num_cats = @$result->num_rows;
if ($num_cats == 0){
return false;
}
$result = db_result_to_array($result);
return $result;

}

function get_employee_Number($productLine){
	if ((!$productLine) || ($productLine == '')) {
     return false;
   }
	$conn = db_connect();
	$query = "select * from empskills where productLine ='".$productLine."'";  
	$result = @$conn->query($query);
	
	
	if(!$result){
	return false;
	}
	$result = db_result_to_array($result);
	return $result;

}

function get_product(){


}

function get_employee_detail($employee_ID){

		if ((!$employee_ID) || ($employee_ID == '')) {
		return false;
		}
		
		$conn = db_connect();
		$query = "select * from employees where employeeNumber ='".$employee_ID."'";
		$result = @$conn->query($query);
		
		if(!$result){
		return false;
		}
		
		$num_employees = @$result->num_rows;
		if ($num_employees == 0){
		return false;
		}
		$result = db_result_to_array($result);
		//print_r ($result);
		return $result[0];
}
?>