<?php 
include ("../connection.php");
date_default_timezone_set("Asia/Singapore");

if (isset($_POST['addemployeeBtn'])){
    
$InputEmployeeName = $_POST['InputEmployeeName'];
$InputEmployeeLName = $_POST['InputEmployeeLName'];
$InputEmployeeId = $_POST['InputEmployeeId'];
$companyName = $_POST['companyName'];
$department = $_POST['department'];
$lineselect2 = $_POST['lineselect2'];
$modelSelect2 = $_POST['modelSelect2'];

$selectLine = "SELECT * FROM `line` WHERE `line_id` = '$lineselect2'";
$result = mysqli_query($con, $selectLine);

while($userRow = mysqli_fetch_assoc($result)){
  $lineselect2 = $userRow['line_name'];
  
  
}

$sqlinsertEmp= "INSERT INTO `employees`(`emp_id`, `name`, `surname`, `dept`, `company`,`assign`, `assign_line`, `status`) VALUES ('$InputEmployeeId','$InputEmployeeName','$InputEmployeeLName','$department','$companyName','$modelSelect2','$lineselect2','active')";
mysqli_query($con, $sqlinsertEmp);
// $_SESSION['location']="list_of_models";

header("Location: ../userSide/manpower.php");
}

?>