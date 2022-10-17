

<?php
include ("../connection.php");
if(isset($_POST['editForecast'])){

$forecastID = $_POST['EditForecastIdContainer'];

$editchosenYearForecast = $_POST['editchosenYearForecast'];
$editinputMonth = $_POST['editinputMonth'];
$editinputLine = $_POST['editinputLine'];
$editinputModel = $_POST['editinputModel'];
$editinputProjQnty = $_POST['editinputProjQnty'];
$editinputdaysOfWork= $_POST['editinputdaysOfWork'];
$editinputActualManpower = $_POST['editinputActualManpower'];
$editinputJpnSTU = $_POST['editinputJpnSTU'];
$editinputGpiSTU = $_POST['editinputGpiSTU'];
$editinputActualTime = $_POST['editinputActualTime'];
$editinputTotGpiTarget = $_POST['editinputTotGpiTarget'];
$editinputTotActual = $_POST['editinputTotActual'];
$editinputForAct = $_POST['editinputForAct'];
$editinputFinalForecast = $_POST['editinputFinalForecast'];
$editinputMFGT = $_POST['editinputMFGT'];

$sqlupdate = "UPDATE `forecast` SET `year`='$editchosenYearForecast',`month`='$editinputMonth',`line`='$editinputLine',`model`='$editinputModel',`projection_Qty`='$editinputProjQnty',`gpiSTU`='$editinputGpiSTU',`japanSTU`='$editinputJpnSTU',`actual_time`='$editinputActualTime',`total_gpi_target`='$editinputTotGpiTarget',`total_actual`='$editinputTotActual',`forecast_actual`='$editinputForAct',`mp_forecast_gpi_target`='$editinputMFGT',`total_manpower_needed`='$editinputFinalForecast',`noOfworkingDays`='$editinputdaysOfWork' WHERE `forecast_Id` ='$forecastID'";
mysqli_query($con, $sqlupdate);
?><script>
      Swal.fire({
    icon: 'success',
    title: 'Success!',
    text: 'Updated.',
  //   footer: '<a href="">Why do I have this issue?</a>'
  })
   </script><?php 
  header("Location: ../userSide/userHomePage.php");
// header("Refresh:0");
  }
  ?>