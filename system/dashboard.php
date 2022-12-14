<?php
session_start();
include ("../connection.php");

if(!isset( $_SESSION['connected'])){
  header("location:../signin.php");
}

$Department = $_SESSION['department'];

$year='';

$dateNow = new DateTime();
$monthNow  = $dateNow->format('m'); 
if($monthNow == "01" || $monthNow == "02" || $monthNow == "03" || $monthNow == "1" || $monthNow == "2" || $monthNow == "3")
{
  $dateNow->modify('last year');
  $year = $dateNow->format('Y'); 
  $_SESSION['year1']=$year;
}
else{
  $year  = $dateNow->format('Y');
  $_SESSION['year1']=$year; 
}

$dateNow2 = new DateTime();
$monthNow2  = $dateNow2->format('m'); 
if($monthNow2 == "01" || $monthNow2 == "02" || $monthNow2 == "03" || $monthNow2 == "1" || $monthNow2 == "2" || $monthNow2 == "3")
{
  $year2  = $dateNow2->format('Y'); 
}
else{
  $dateNow2->modify('next year');
  $year2  = $dateNow2->format('Y'); 
  $_SESSION['year2']=$year2; 
}



if (isset($_POST['changeFY']))
{
$fyear1 = $_POST['fyear1'];
$_SESSION['year1'] = $fyear1;
$year = $_SESSION['year1'];

$fyear2 = $_POST['fyear2'];
$_SESSION['year2'] = $fyear2;
$year2 = $_SESSION['year2'];
}



$startMonth = "$year-03-01";
$YEAR = new DateTime();
$YEAR  = $YEAR->format('Y');

$MONTH = new DateTime();
$MONTH  = $MONTH->format('F');


$forecastActual = array();
$gpiTarget = array();
$actualManpower = array();
$manpowerRequest = array();

for($i=12; $i>=1; $i--){
  $MONTH = new DateTime($startMonth);
  $MONTH->modify('next month');
  $monthName  = $MONTH->format('F');
  $year  = $MONTH->format('Y');

  $date  = $MONTH->format('Y-m-d');

  $selectTotal = "SELECT SUM(`forecast_actual`) as 'TOTAL' FROM `forecast` WHERE `year` = '$year' and `month`='$monthName' AND `Department` = '$Department';";
  $result1 = mysqli_query($con, $selectTotal);
  while($row = mysqli_fetch_assoc($result1)) {
                       
     $total = $row["TOTAL"];
     if($total==null){
      $total=0;
     }
     array_push($forecastActual, $total);
  }
  $selectTotalGPi = "SELECT SUM(`mp_forecast_gpi_target`) as 'TOTAL' FROM `forecast` WHERE `year` = '$year' and `month`='$monthName' AND `Department` = '$Department';";
  $resultgpi = mysqli_query($con, $selectTotalGPi);
  while($row = mysqli_fetch_assoc($resultgpi)) {
                       
     $totalgpi = $row["TOTAL"];
     if($totalgpi==null){
      $totalgpi=0;
     }
     array_push($gpiTarget, $totalgpi);
  }
  $selectTotalActMan = "SELECT SUM(`actual_manpower`) as 'TOTAL' FROM `forecast` WHERE `year` = '$year' and `month`='$monthName' AND `Department` = '$Department';";
  $resultActMan = mysqli_query($con, $selectTotalActMan);
  while($row = mysqli_fetch_assoc($resultActMan)) {
                       
     $totalActMan = $row["TOTAL"];
     if($totalActMan==null){
      $totalActMan=0;
     }
     array_push($actualManpower, $totalActMan);
  }
  
  $selectTotalMan = "SELECT SUM(`total_manpower_needed`) as 'TOTAL' FROM `forecast` WHERE `year` = '$year' and `month`='$monthName' AND `Department` = '$Department';";
  $resulttotalMan = mysqli_query($con, $selectTotalMan);
  while($row = mysqli_fetch_assoc($resulttotalMan)) {
                       
     $totalmanReq = $row["TOTAL"];
     if($totalmanReq==null){
      $totalmanReq=0;
     }
     array_push($manpowerRequest, $totalmanReq);
  }

$startMonth = $date;
}
// print_r($forecastActual);

// $rowsDate = mysqli_fetch_all($result1, MYSQLI_ASSOC);

// $forecastActual = array_map(function ($item) {
//     return $item['forecast_actual'];
// }, $rowsDate);
// $actualManpower = array_map(function ($item) {
//   return $item['actual_manpower'];
// }, $rowsDate);

// $gpiTarget = array_map(function ($item) {
//   return $item['mp_forecast_gpi_target'];
// }, $rowsDate);

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home Page</title>
    <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="../node_modules/fontawesome-free-6.2.0-web/css/all.min.css">
    <!-- <link rel="stylesheet" href="./node_modules/font-awesome/css/font-awesome.min.css"> -->
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    
    <link rel="stylesheet" href="../css/style.css?v=<?php echo time(); ?>">
    <!-- <link rel="stylesheet" type="text/css" href="./node_modules/datatables.net-bs5/css/dataTables.bootstrap5.css"> -->
    <link rel="stylesheet" type="text/css" href="../node_modules/DataTables/datatables.min.css"/>
<link rel="stylesheet" type="text/css" href="../node_modules/DataTables/Responsive-2.3.0/css/responsive.dataTables.min.css"/>
<script src="../node_modules/chart.js/dist/chart.js"></script>
<!-- <script type="text/javascript" charset="utf8" src="./node_modules/datatables.net-bs5/js/dataTables.bootstrap5.js"></script> -->




    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
  
    
      }
    </style>
      <link href="./sidebars.css" rel="stylesheet">
</head>
  <body>
  <?php include "../nav.php";?>
  <?php include "../sidebar.php" ?>
  <?php include "../footer.php"?>
<div class="main-content py-4" id="mainContent" >
  <div class="container text-center balance-container p-4">
    <div class="row h-100" >
      <div class="col-6">
        <h2 class="fw-bolder text-light " >Graph of Manpower as of FY: <span style="color: pink"><?php
                $dateNow = new DateTime();
                $monthNow  = $dateNow->format('m'); 
                if($monthNow == "01" || $monthNow == "02" || $monthNow == "03" || $monthNow == "1" || $monthNow == "2" || $monthNow == "3")
                {
                  $dateNow->modify('last year');
                  $year  = $dateNow->format('Y'); 
                }
                else{
                  $year  = $dateNow->format('Y'); 
                }
                  echo $_SESSION['year1']; 
               
               ?>-<?php
               $dateNow = new DateTime();
               $monthNow  = $dateNow->format('m'); 
               if($monthNow == "01" || $monthNow == "02" || $monthNow == "03" || $monthNow == "1" || $monthNow == "2" || $monthNow == "3")
               {
                 $year  = $dateNow->format('Y'); 
               }
               else{
                 $dateNow->modify('next year');
                 $year  = $dateNow->format('Y'); 
               }
               echo $_SESSION['year2']; 
              
              ?></span></h2>
      </div>

      <div class="col-6">
        <div  class="row g-3">
          <div class="col">
          <form action="dashboard.php" method="POST">
            <div class="input-group mb-3">
        
               <input type="number" name="fyear1" class="form-control" onchange="addYear();" value="<?php
                echo $_SESSION['year1']; 
               
               ?>"placeholder="Enter year"  id="fsyear1">
               <span class="input-group-text">to</span>
               <input type="number" onchange="lessYear();" name="fyear2" id="fsyear2" class="form-control" placeholder="Server"value="<?php

                echo $_SESSION['year2']; 
               
               ?>" aria-label="Server">
               <button type="submit" name="changeFY" class="btn btn-warning">Submit</button>
          
              </div>
              </form>
            </div>
    
        </div> 
      </div>
      <div class="col-12">
        <canvas class="my-4 chartjs-render-monitor" id="myChart"  ></canvas>
    </div>
    </div>
 
  </div>
</div>


<!-- <script src="./node_modules/jquery/dist/jquery.slim.min.js"></scrip> -->
<!-- <script src="./node_modules/jquery/dist/jquery.min.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" ></script> -->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" ></script> -->


    <script type="text/javascript" src="../node_modules/DataTables/datatables.min.js"></script>
    <script type="text/javascript" src="../node_modules/DataTables/Responsive-2.3.0/js/dataTables.responsive.min.js"></script>

    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js" ></script>
    <script src="../sidebars.js"></script> 
    <script>
  var forecastopt = document.getElementById("forecastButton");
  forecastopt.classList.remove("active");
  var dashopt = document.getElementById("dashboardOpt");
  dashopt.classList.add("active");
  var manpowerOpt = document.getElementById("manpowerOpt");
  manpowerOpt.classList.remove("active");

  var requestOpt = document.getElementById("requestOpt");
  requestOpt.classList.remove("active");


  var forecastopt = document.getElementById("forecastButton2");
  forecastopt.classList.remove("active");
  var dashopt = document.getElementById("dashboardOpt2");
  dashopt.classList.add("active");
  var manpowerOpt = document.getElementById("manpowerOpt2");
  manpowerOpt.classList.remove("active");

  var requestOpt = document.getElementById("requestOpt");
  requestOpt.classList.remove("active");


  var forecastopt3 = document.getElementById("footerForecast");
  forecastopt3.classList.remove("footerActive");
  var dashopt3 = document.getElementById("footerDashboard");
  dashopt3.classList.add("footerActive");
  var manpowerOpt3 = document.getElementById("footerManpower");
  manpowerOpt3.classList.remove("footerActive");
  var requestOpt3 = document.getElementById("footerSignup");
  requestOpt3.classList.remove("footerActive");
  document.getElementById("footerDashboard").href = "#";

  
  document.getElementById("dashboardOpt").href = "#";
  document.getElementById("dashboardOpt2").href = "#";


 const forecastActual = <?php echo json_encode($forecastActual) ?>;
 const gpiTarget = <?php echo json_encode($gpiTarget) ?>;
 const manpowerRequest = <?php echo json_encode($manpowerRequest) ?>;
 const actualManpower = <?php echo json_encode($actualManpower) ?>;

const labels = [
    'April',
    'May',
    'June',
    'July',
    'August',
    'September',
    'October',
    'November',
    'December',
    'January',
    'February',
    'March',


  ];
  
  const data = {
    labels: labels,
    datasets: [{
      label: 'Actual Forecast',
      backgroundColor: 'rgb(255, 99, 132)',
      borderColor: 'rgb(255, 99, 132)',
      data: forecastActual,
      pointBackgroundColor: 'white',
      pointBorderColor: 'white',
      pointBorderWidth: 5,
      lineTension: 0,
      borderWidth: 4,
      pointBackgroundColor: 'rgb(255, 99, 132)'
    },
    {
        label: 'Actual Manpower',
        backgroundColor: 'rgb(255, 251, 6)',
        borderColor: 'rgb(255, 251, 6)',
        data: actualManpower,
        pointBackgroundColor: 'white',
        pointBorderColor: 'white',
        pointBorderWidth: 5,
        lineTension: 0,
        borderWidth: 4,
        pointBackgroundColor: 'rgb(255, 251, 6)'
      },
      {
        label: 'GPI Target',
        backgroundColor: 'rgb(6, 255, 39)',
        borderColor: 'rgb(6, 255, 39)',
        data: gpiTarget,
        pointBackgroundColor: 'white',
        pointBorderColor: 'white',
        pointBorderWidth: 5,
        lineTension: 0,
        borderWidth: 4,
        pointBackgroundColor: 'rgb(6, 255, 39)'
      },
      {
        label: 'Manpower Needed',
        backgroundColor: '#faab00',
        borderColor: '#faab00',
        data: manpowerRequest,
        pointBackgroundColor: 'white',
        pointBorderColor: 'white',
        pointBorderWidth: 5,
        lineTension: 0,
        borderWidth: 4,
        pointBackgroundColor: '#faab00'
      }
    ],
   
    
  };
  

      var ctx = document.getElementById("myChart");
      var myChart = new Chart(ctx, {
        type: 'bar',
        data: data,
        options: {
          maintainAspectRatio: false,
                  plugins: {
            legend: {
              labels: {
                color: "white",  
                textAlign:"left",
              },
               position: "top",
               align: "start",
            }
          },
          scales: {
                        y:{
                ticks:{
                    color: 'rgb(255, 99, 132)',
                },
                grid:{
                    color: 'rgb(197, 195, 212)',
                }
            },
            x:{
                ticks:{
                    color: 'rgb(255, 99, 132)',
                },
                grid:{
                    color: 'rgb(197, 195, 212)',
                }
            },
        
            yAxes: [{
              ticks: {
                beginAtZero: false
              },
              grid:{
                color: 'rgb(197, 195, 212)',
                  },
            }]
          },
       
        }
      });

</script>
    <script src="../js/dashboard.js"></script> 
    <script src="../js/userHomePage.js"></script> 



</body>
</html>