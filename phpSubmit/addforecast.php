<?php 
include ("../connection.php");

date_default_timezone_set("Asia/Singapore");

if (isset($_POST['addForecastBtn'])){
    
$chosenYearForecast = $_POST['chosenYearForecast'];
$inputMonth = $_POST['inputMonth'];
$inputLine = $_POST['inputLine'];
$inputModel = $_POST['inputModel'];
$inputProjQnty = $_POST['inputProjQnty'];
$inputActualTime = $_POST['inputActualTime'];
$inputdaysOfWork = $_POST['inputdaysOfWork'];
$inputActualManpower = $_POST['inputActualManpower'];
$inputJpnSTU = $_POST['inputJpnSTU'];
$inputGpiSTU = $_POST['inputGpiSTU'];
$inputActualTime = $_POST['inputActualTime'];
$inputTotGpiTarget = $_POST['inputTotGpiTarget'];
$inputTotActual = $_POST['inputTotActual'];
$inputForAct = $_POST['inputForAct'];
$inputMFGT = $_POST['inputMFGT'];
$inputFinalForecast = $_POST['inputFinalForecast'];





$sqlinsertForecast= "INSERT INTO `forecast`(`year`, `month`,`Department`, `line`, `model`, `projection_Qty`, `gpiSTU`, `japanSTU`,`actual_time`, `total_gpi_target`, `total_actual`, `forecast_actual`,`actual_manpower`, `mp_forecast_gpi_target`, `total_manpower_needed`,`noOfworkingDays`) VALUES ('$chosenYearForecast','$inputMonth','Production1','$inputLine','$inputModel','$inputProjQnty','$inputGpiSTU','$inputJpnSTU','$inputActualTime','$inputTotGpiTarget','$inputTotActual','$inputForAct','$inputActualManpower','$inputMFGT', '$inputFinalForecast','$inputdaysOfWork')";
mysqli_query($con, $sqlinsertForecast);
// $_SESSION['location']="list_of_models";

header("Location: ../Production1/userHomePage.php");
}


?>