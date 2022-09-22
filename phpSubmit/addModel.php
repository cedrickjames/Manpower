<?php 
include ("../connection.php");
date_default_timezone_set("Asia/Singapore");

if (isset($_POST['addModelBtn'])){
    
$lineId = $_POST['containerOfLineId'];
$modal_line_name = $_POST['modal_line_name'];
$modal_name = $_POST['modal_name'];
$InputJPNSTU = $_POST['jpn_stu'];
$InputGPISTU = $_POST['gpi_stu'];
$InputActualTime = $_POST['actual_time'];


$sqlinsertModel= "INSERT INTO `model`(`model_name`, `model_line`, `id_model_line`, `japan_stu`, `gpi_stu`, `actual_time`) VALUES ('$modal_name','$modal_line_name ','$lineId','$InputJPNSTU','$InputGPISTU','$InputActualTime')";
mysqli_query($con, $sqlinsertModel);
header("Location: ../userSide/list_of_models.php");
}

?>