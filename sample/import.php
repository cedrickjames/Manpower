
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
table, th, td {
  border:1px solid black;
}
</style>
</head>
<body>
<table style="border">
  <tr>
    <th>No.</th>
    <th>Year</th>
    <th>Month</th>
    <th>Department</th>
    <th>Line</th>
    <th>Model</th>
    <th>Projection Quantity</th>
    <!-- <th>No.</th> -->

    <th>GPI STU</th>
    <th>JAPAN STU</th>
    <th>Actual Time</th>
    <!-- <th>Mente</th>
    <th>Lot</th> -->


    <th>Total GPI Target</th>
    <th>Total Actual</th>
    <th>Forecast Actual</th>
    <th>Actual Manpower</th>
    <th>MP Forecast GPI TARGET</th>
    <th>TOTAL Manpower</th>
    <th>No of working Days</th>





  </tr>
  <?php
session_start();
include ("../connection.php");
date_default_timezone_set("Asia/Singapore");



require '../vendor/autoload.php';
// require('../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Spreadsheet.php');
// require('../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/IOFactory.php');


use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if(isset($_POST['save_excel_data']))
{
    $fileName = $_FILES['import_file']['name'];
    $file_ext = pathinfo($fileName, PATHINFO_EXTENSION);
    $allowed_ext = ['xls','csv','xlsx'];
    if(in_array($file_ext, $allowed_ext))
    {
        $inputFileNamePath = $_FILES['import_file']['tmp_name'];
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePath);
        $data = $spreadsheet->getActiveSheet()->toArray();
        $count = "0";
        $no = 1; //black
        $no2 = 1;
        $no3 = 1;
        $no4 = 1; //green
        $no5 = 1; //orange
        $no6 = 1; //pink


        $chosenYearForecast = "";
        $inputMonth = "";
        $inputLine = "";
        $inputModel = "";
        $inputProjQnty = "";
        $inputActualTime = "";
        $inputdaysOfWork = "";
        $inputActualManpower = "";
        $inputJpnSTU = "";
        $inputGpiSTU = "";
        $inputActualTime = "";
        $inputTotGpiTarget = "";
        $inputTotActual ="";
        $inputForAct = "";
        $inputMFGT ="";
        $inputFinalForecast = "";
      


        foreach($data as $row)
        {
            if($count > 0)
            {
              $modelName = $row['0'];
              $modelSuBCode = $row['2'];
              $lot = $row['1'];
              $date = $row['4'];
              $planqty = $row['5'];

             
              $year = substr($date, 0, 4);
              $month = mb_substr($date, 4, 2);
              $day = mb_substr($date, 6, 2);
              $dueDate = $year.'-'.$month.'-'.$day;
              $dateDue = new DateTime($dueDate); 
              $Month  = $dateDue->format('F'); 
              
              $selectYear= "SELECT `$year` FROM `workingdays` WHERE `month` = '$Month';";
              $resultDays = mysqli_query($con, $selectYear);
              while($userRow = mysqli_fetch_assoc($resultDays)){
              $noOfDays = $userRow[$year];
              }



              
    $selectModel= "SELECT * FROM `model` WHERE `model_name` LIKE '%$modelName%'";
    $resultModel = mysqli_query($con, $selectModel);
    $numrows = mysqli_num_rows($resultModel);
    while($userRow = mysqli_fetch_assoc($resultModel)){

      $japan_stu = $userRow['japan_stu'];
      $gpi_stu = $userRow['gpi_stu'];
      $actual_time = $userRow['actual_time'];
      $type = $userRow['type'];
      $model_line = $userRow['model_line'];
      $model_name = $userRow['model_name'];
      $actual_time = $userRow['actual_time'];
      $Department = $userRow['Department'];






  }
if($numrows==1){
  $selectEmployee = "SELECT * FROM `employees` WHERE `assign` = '$model_name'";
  $result = mysqli_query($con, $selectEmployee);

  $numOfPresentManpower = mysqli_num_rows($result);


  $totgpitarget = (float)$gpi_stu * (float)$planqty;
  $totactual = (float)$actual_time * (float)$planqty;

  $foract = (round($totactual,2) / 435) / (float)$noOfDays;
  $mfgt = (round($totgpitarget,2) / 435) / (float)$noOfDays;
$finalforecast = (float)$numOfPresentManpower - (float)$foract ;
   
  

  $chosenYearForecast = $year;
  $inputMonth = $Month;
  $inputLine = $model_line;
  $inputModel = $model_name;
  $inputProjQnty = $planqty;
  $inputActualTime = $actual_time;
  $inputdaysOfWork =  $noOfDays;
  $inputActualManpower = $numOfPresentManpower;
  $inputJpnSTU = $japan_stu;
  $inputGpiSTU = $gpi_stu;
  $inputTotGpiTarget = round($totgpitarget,2);
  $inputTotActual =round($totactual,2);
  $inputForAct = round($foract,2);
  $inputMFGT = round($mfgt,2);
  $inputFinalForecast =  round($finalforecast,2);

  if($type !='mente'){
    $sqlinsertForecast= "INSERT INTO `forecast`(`year`, `month`,`Department`, `line`, `model`, `projection_Qty`, `gpiSTU`, `japanSTU`,`actual_time`, `total_gpi_target`, `total_actual`, `forecast_actual`,`actual_manpower`, `mp_forecast_gpi_target`, `total_manpower_needed`,`noOfworkingDays`, `type`) VALUES ('$chosenYearForecast','$inputMonth','$Department','$inputLine','$inputModel','$inputProjQnty','$inputGpiSTU','$inputJpnSTU','$inputActualTime','$inputTotGpiTarget','$inputTotActual','$inputForAct','$inputActualManpower','$inputMFGT', '$inputFinalForecast','$inputdaysOfWork','machine')";
    mysqli_query($con, $sqlinsertForecast);
  }
  else{
    $sqlinsertForecast= "INSERT INTO `forecast`(`year`, `month`,`Department`, `line`, `model`, `projection_Qty`, `gpiSTU`, `japanSTU`,`actual_time`, `total_gpi_target`, `total_actual`, `forecast_actual`,`actual_manpower`, `mp_forecast_gpi_target`, `total_manpower_needed`,`noOfworkingDays`, `type`) VALUES ('$chosenYearForecast','$inputMonth','$Department','$inputLine','$inputModel','$inputProjQnty','$inputGpiSTU','$inputJpnSTU','$inputActualTime','$inputTotGpiTarget','$inputTotActual','$inputForAct','$inputActualManpower','$inputMFGT', '$inputFinalForecast','$inputdaysOfWork','mente')";
    mysqli_query($con, $sqlinsertForecast);
  }
  
  ?>
  <tr>
<td><?php echo $no++;?></td>

<td><?php echo $chosenYearForecast;?></td>
<td><?php echo $inputMonth;?></td>
<td><?php echo $Department ;?></td>
<td><?php echo $inputLine;?></td>
<td><?php echo $inputModel;?></td>
<td><?php echo $inputProjQnty;?></td>
<td><?php echo $inputGpiSTU;?></td>
<td><?php echo $inputJpnSTU;?></td>
<td><?php echo $inputActualTime;?></td>
<td><?php echo $inputTotGpiTarget;?></td>
<td><?php echo $inputTotActual;?></td>
<td><?php echo $inputForAct;?></td>
<td><?php echo $inputActualManpower;?></td>
<td><?php echo $inputMFGT;?></td>
<td><?php echo $inputFinalForecast;?></td>
<td><?php echo $noOfDays;?></td>





</tr>

  <?php
}
else if ($numrows>1){
  $selectModel1= "SELECT * FROM `model` WHERE `model_name` LIKE '%$modelName%' AND `subcode` = '$modelSuBCode'";
  $resultModel1 = mysqli_query($con, $selectModel1);
  while($userRow = mysqli_fetch_assoc($resultModel1)){

    $japan_stu = $userRow['japan_stu'];
    $gpi_stu = $userRow['gpi_stu'];
    $actual_time = $userRow['actual_time'];
    $type = $userRow['type'];
    $model_line = $userRow['model_line'];
    $model_name = $userRow['model_name'];
    $actual_time = $userRow['actual_time'];
    $Department = $userRow['Department'];






}
  $numrows1 = mysqli_num_rows($resultModel1);
  if($numrows1==1){
    $selectEmployee = "SELECT * FROM `employees` WHERE `assign` = '$model_name'";
    $result = mysqli_query($con, $selectEmployee);
    $numOfPresentManpower = mysqli_num_rows($result);
  
  
    $totgpitarget = (float)$gpi_stu * (float)$planqty;
    $totactual = (float)$actual_time * (float)$planqty;
  
    $foract = (round($totactual,2) / 435) / (float)$noOfDays;
    $mfgt = (round($totgpitarget,2) / 435) / (float)$noOfDays;
  $finalforecast = (float)$numOfPresentManpower - (float)$foract ;
     
    
  
    $chosenYearForecast = $year;
    $inputMonth = $Month;
    $inputLine = $model_line;
    $inputModel = $model_name;
    $inputProjQnty = $planqty;
    $inputActualTime = $actual_time;
    $inputdaysOfWork =  $noOfDays;
    $inputActualManpower = $numOfPresentManpower;
    $inputJpnSTU = $japan_stu;
    $inputGpiSTU = $gpi_stu;
    $inputTotGpiTarget = round($totgpitarget,2);
    $inputTotActual =round($totactual,2);
    $inputForAct = round($foract,2);
    $inputMFGT = round($mfgt,2);
    $inputFinalForecast =  round($finalforecast,2);
    
    if($type != "mente"){
      $sqlinsertForecast= "INSERT INTO `forecast`(`year`, `month`,`Department`, `line`, `model`, `projection_Qty`, `gpiSTU`, `japanSTU`,`actual_time`, `total_gpi_target`, `total_actual`, `forecast_actual`,`actual_manpower`, `mp_forecast_gpi_target`, `total_manpower_needed`,`noOfworkingDays`, `type`) VALUES ('$chosenYearForecast','$inputMonth','$Department','$inputLine','$inputModel','$inputProjQnty','$inputGpiSTU','$inputJpnSTU','$inputActualTime','$inputTotGpiTarget','$inputTotActual','$inputForAct','$inputActualManpower','$inputMFGT', '$inputFinalForecast','$inputdaysOfWork','machine')";
      mysqli_query($con, $sqlinsertForecast);
    }
    else{
      $sqlinsertForecast= "INSERT INTO `forecast`(`year`, `month`,`Department`, `line`, `model`, `projection_Qty`, `gpiSTU`, `japanSTU`,`actual_time`, `total_gpi_target`, `total_actual`, `forecast_actual`,`actual_manpower`, `mp_forecast_gpi_target`, `total_manpower_needed`,`noOfworkingDays`,`type`) VALUES ('$chosenYearForecast','$inputMonth','$Department','$inputLine','$inputModel','$inputProjQnty','$inputGpiSTU','$inputJpnSTU','$inputActualTime','$inputTotGpiTarget','$inputTotActual','$inputForAct','$inputActualManpower','$inputMFGT', '$inputFinalForecast','$inputdaysOfWork','mente')";
      mysqli_query($con, $sqlinsertForecast);
    }

    ?>
    <tr style="color: green">
  <td><?php echo $no++;?></td>
  
  <td><?php echo $chosenYearForecast;?></td>
  <td><?php echo $inputMonth;?></td>
  <td><?php echo $Department ;?></td>
  <td><?php echo $inputLine;?></td>
  <td><?php echo $inputModel;?></td>
  <td><?php echo $inputProjQnty;?></td>
  <td><?php echo $inputGpiSTU;?></td>
  <td><?php echo $inputJpnSTU;?></td>
  <td><?php echo $inputActualTime;?></td>
  <td><?php echo $inputTotGpiTarget;?></td>
  <td><?php echo $inputTotActual;?></td>
  <td><?php echo $inputForAct;?></td>
  <td><?php echo $inputActualManpower;?></td>
  <td><?php echo $inputMFGT;?></td>
  <td><?php echo $inputFinalForecast;?></td>
  <td><?php echo $noOfDays;?></td>

  </tr>
  
    <?php
  }
  else if($numrows1>1){

    if (strpos($lot , "BC")==""){
      $selectEmployee = "SELECT * FROM `employees` WHERE `assign` = '$model_name'";
      $result = mysqli_query($con, $selectEmployee);
      $numOfPresentManpower = mysqli_num_rows($result);
    
    
      $totgpitarget = (float)$gpi_stu * (float)$planqty;
      $totactual = (float)$actual_time * (float)$planqty;
    
      $foract = (round($totactual,2) / 435) / (float)$noOfDays;
      $mfgt = (round($totgpitarget,2) / 435) / (float)$noOfDays;
    $finalforecast = (float)$numOfPresentManpower - (float)$foract ;
       
      
    
      $chosenYearForecast = $year;
      $inputMonth = $Month;
      $inputLine = $model_line;
      $inputModel = $model_name;
      $inputProjQnty = $planqty;
      $inputActualTime = $actual_time;
      $inputdaysOfWork =  $noOfDays;
      $inputActualManpower = $numOfPresentManpower;
      $inputJpnSTU = $japan_stu;
      $inputGpiSTU = $gpi_stu;
      $inputTotGpiTarget = round($totgpitarget,2);
      $inputTotActual =round($totactual,2);
      $inputForAct = round($foract,2);
      $inputMFGT = round($mfgt,2);
      $inputFinalForecast =  round($finalforecast,2);

      
  $sqlinsertForecast= "INSERT INTO `forecast`(`year`, `month`,`Department`, `line`, `model`, `projection_Qty`, `gpiSTU`, `japanSTU`,`actual_time`, `total_gpi_target`, `total_actual`, `forecast_actual`,`actual_manpower`, `mp_forecast_gpi_target`, `total_manpower_needed`,`noOfworkingDays`, `type`) VALUES ('$chosenYearForecast','$inputMonth','$Department','$inputLine','$inputModel','$inputProjQnty','$inputGpiSTU','$inputJpnSTU','$inputActualTime','$inputTotGpiTarget','$inputTotActual','$inputForAct','$inputActualManpower','$inputMFGT', '$inputFinalForecast','$inputdaysOfWork','machine')";
  mysqli_query($con, $sqlinsertForecast);
      ?>
      <tr style="color: pink">
    <td><?php echo $no++;?></td>
    
    <td><?php echo $chosenYearForecast;?></td>
    <td><?php echo $inputMonth;?></td>
    <td><?php echo $Department ;?></td>
    <td><?php echo $inputLine;?></td>
    <td><?php echo $inputModel;?></td>
    <td><?php echo $inputProjQnty;?></td>
    <td><?php echo $inputGpiSTU;?></td>
    <td><?php echo $inputJpnSTU;?></td>
    <td><?php echo $inputActualTime;?></td>
    <td><?php echo $inputTotGpiTarget;?></td>
    <td><?php echo $inputTotActual;?></td>
    <td><?php echo $inputForAct;?></td>
    <td><?php echo $inputActualManpower;?></td>
    <td><?php echo $inputMFGT;?></td>
    <td><?php echo $inputFinalForecast;?></td>
    <td><?php echo $noOfDays;?></td>
  
    </tr>
    
      <?php
    }
    else if(strpos($lot , "BC")==0){
      $selectEmployee = "SELECT * FROM `employees` WHERE `assign` = '$model_name'";
      $result = mysqli_query($con, $selectEmployee);
      $numOfPresentManpower = mysqli_num_rows($result);
    
    
      $totgpitarget = (float)$gpi_stu * (float)$planqty;
      $totactual = (float)$actual_time * (float)$planqty;
    
      $foract = (round($totactual,2) / 435) / (float)$noOfDays;
      $mfgt = (round($totgpitarget,2) / 435) / (float)$noOfDays;
    $finalforecast = (float)$numOfPresentManpower - (float)$foract ;
       
      
    
      $chosenYearForecast = $year;
      $inputMonth = $Month;
      $inputLine = $model_line;
      $inputModel = $model_name;
      $inputProjQnty = $planqty;
      $inputActualTime = $actual_time;
      $inputdaysOfWork =  $noOfDays;
      $inputActualManpower = $numOfPresentManpower;
      $inputJpnSTU = $japan_stu;
      $inputGpiSTU = $gpi_stu;
      $inputTotGpiTarget = round($totgpitarget,2);
      $inputTotActual =round($totactual,2);
      $inputForAct = round($foract,2);
      $inputMFGT = round($mfgt,2);
      $inputFinalForecast =  round($finalforecast,2);

      
  $sqlinsertForecast= "INSERT INTO `forecast`(`year`, `month`,`Department`, `line`, `model`, `projection_Qty`, `gpiSTU`, `japanSTU`,`actual_time`, `total_gpi_target`, `total_actual`, `forecast_actual`,`actual_manpower`, `mp_forecast_gpi_target`, `total_manpower_needed`,`noOfworkingDays`,`type`) VALUES ('$chosenYearForecast','$inputMonth','$Department','$inputLine','$inputModel','$inputProjQnty','$inputGpiSTU','$inputJpnSTU','$inputActualTime','$inputTotGpiTarget','$inputTotActual','$inputForAct','$inputActualManpower','$inputMFGT', '$inputFinalForecast','$inputdaysOfWork', 'mente')";
  mysqli_query($con, $sqlinsertForecast);
      ?>
      <tr style="color: orange">
    <td><?php echo $no++;?></td>
    
    <td><?php echo $chosenYearForecast;?></td>
    <td><?php echo $inputMonth;?></td>
    <td><?php echo $Department ;?></td>
    <td><?php echo $inputLine;?></td>
    <td><?php echo $inputModel;?></td>
    <td><?php echo $inputProjQnty;?></td>
    <td><?php echo $inputGpiSTU;?></td>
    <td><?php echo $inputJpnSTU;?></td>
    <td><?php echo $inputActualTime;?></td>
    <td><?php echo $inputTotGpiTarget;?></td>
    <td><?php echo $inputTotActual;?></td>
    <td><?php echo $inputForAct;?></td>
    <td><?php echo $inputActualManpower;?></td>
    <td><?php echo $inputMFGT;?></td>
    <td><?php echo $inputFinalForecast;?></td>
    <td><?php echo $noOfDays;?></td>
  
    </tr>
    
      <?php
    }

   
  }
  else if($numrows1==0){
    ?>
    <tr style="color: red">
  <td><?php echo $no2++;?></td>
  
  <td><?php echo $modelName;?></td>
  <td><?php echo $modelSuBCode;?></td>
  <td><?php echo $japan_stu ;?></td>
  
  </tr>
  
    <?php
  }
  
 
}
else if($numrows==0){
  ?>
  <tr style="color: blue">
<td><?php echo $no3++;?></td>

<td><?php echo $modelName;?></td>
<td><?php echo $modelSuBCode;?></td>
<td><?php echo $japan_stu ;?></td>

</tr>

  <?php
}




                $msg = true;
            }
            else
            {
                $count = "1";
            }
        }

    }
    else
    {
        $_SESSION['message'] = "Invalid File";
        // header('Location: index.php');
        // exit(0);
    }
}
?>
</table>

</body>
</html>

 <form action="import.php" method="POST" enctype="multipart/form-data">

<input type="file" name="import_file" class="form-control" />
<button type="submit" name="save_excel_data" class="btn btn-primary mt-3">Import</button>

</form>