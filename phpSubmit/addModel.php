<?php 
include ("../connection.php");
date_default_timezone_set("Asia/Singapore");
$Department = $_SESSION['department'];
if (isset($_POST['addModelBtn'])){
    
$lineId = $_POST['containerOfLineId'];
$modal_line_name = $_POST['modal_line_name'];
$modal_name = $_POST['modal_name'];
$InputJPNSTU = $_POST['jpn_stu'];
$InputGPISTU = $_POST['gpi_stu'];
$InputActualTime = $_POST['actual_time'];


$sqlinsertModel= "INSERT INTO `model`(`model_name`, `model_line`, `id_model_line`, `japan_stu`, `gpi_stu`, `actual_time`,`Department`) VALUES ('$modal_name','$modal_line_name ','$lineId','$InputJPNSTU','$InputGPISTU','$InputActualTime','$Department')";
mysqli_query($con, $sqlinsertModel);
// $_SESSION['location']="list_of_models";

header("Location: ../system/list_of_models.php");
}

?>