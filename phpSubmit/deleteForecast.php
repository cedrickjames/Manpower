<?php
include ("../connection.php");
if(isset($_POST['DeleteForecast'])){

$forecastID = $_POST['forecastID'];
$sqldelete = "DELETE FROM `forecast` WHERE `forecast_Id` = '$forecastID';";
mysqli_query($con, $sqldelete);
?><script>
      Swal.fire({
    icon: 'success',
    title: 'Success!',
    text: 'Deleted.',
  //   footer: '<a href="">Why do I have this issue?</a>'
  })
   </script><?php 
  header("Location: ../Production1/userHomePage.php");
// header("Refresh:0");
  }
  ?>
  
