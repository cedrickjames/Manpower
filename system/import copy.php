<?php
session_start();
include ("../connection.php");
date_default_timezone_set("Asia/Singapore");

require '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


if(isset($_POST['save_excel_data']))
{

    $rows = array();
    array_push($rows, ['="Model"','="Lot No."','="Sub Code"','="Model Name"','="Due Date"','="Plan Qty"','="Sub Code Qty"','="Top Serial Number"','="Approval Status"', '="Approval Date"']);

    $fileName = $_FILES['import_file']['name'];
    $file_ext = pathinfo($fileName, PATHINFO_EXTENSION);
    $allowed_ext = ['xls','csv','xlsx'];
    if(in_array($file_ext, $allowed_ext))
      {
        $inputFileNamePath = $_FILES['import_file']['tmp_name'];
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePath);
        $data = $spreadsheet->getActiveSheet()->toArray();
        $highestRow =$spreadsheet->getActiveSheet()->getHighestRow();
        echo "<script> console.log('$highestRow') </script>";

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
              $ModelRealName = $row['3'];
              $subCodeQty = $row['6'];
              $toSerialNo = $row['7'];
              $approvalstatus = $row['8'];
              $approvalDate = $row['9'];



             
              $year = substr($date, 0, 4);
              $month = mb_substr($date, 4, 2);
              $day = mb_substr($date, 6, 2);
              $dueDate = $year.'-'.$month.'-'.$day;
              $dateDue = new DateTime($dueDate); 
              $DATE = new DateTime(); 

              $Month  = $dateDue->format('F'); 
              $YEAR =  $DATE->format('Y');

              if($year>=$YEAR){

              
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
                    $selectEmployee = "SELECT * FROM `employees` WHERE `assign_line` = '$model_line'";
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
                            $selectForecast1= "SELECT * FROM `forecast` WHERE `year`='$chosenYearForecast' AND `month`='$inputMonth' AND`Department`='$Department' AND `line`='$inputLine' AND `model`='$inputModel' AND `Lot_No`='$lot' AND `Sub_Code`='$modelSuBCode' AND `projection_Qty`='$inputProjQnty' AND `type`='machine'";
                            $resultForecast1 = mysqli_query($con, $selectForecast1);
                            $numrowsForecast1 = mysqli_num_rows($resultForecast1);
                            if($numrowsForecast1==0){
                                $sqlinsertForecast= "INSERT INTO `forecast`(`year`, `month`,`Department`, `line`, `model`,`Lot_No`,`Sub_Code`, `projection_Qty`, `gpiSTU`, `japanSTU`,`actual_time`, `total_gpi_target`, `total_actual`, `forecast_actual`,`actual_manpower`, `mp_forecast_gpi_target`, `total_manpower_needed`,`noOfworkingDays`, `type`) VALUES ('$chosenYearForecast','$inputMonth','$Department','$inputLine','$inputModel','$lot','$modelSuBCode','$inputProjQnty','$inputGpiSTU','$inputJpnSTU','$inputActualTime','$inputTotGpiTarget','$inputTotActual','$inputForAct','$inputActualManpower','$inputMFGT', '$inputFinalForecast','$inputdaysOfWork','machine')";
                                mysqli_query($con, $sqlinsertForecast);
                            }
                            else{
                        array_push($rows, ['="'.$modelName.'"','="'.$lot.'"','="'.$modelSuBCode.'"','="'.$ModelRealName.'"','="'.$date.'"','="'.$planqty.'"','="'.$subCodeQty.'"','="'.$toSerialNo.'"','="'.$approvalstatus.'"', '="'.$approvalDate.'"']);

                            }
                            
                        }
                        else{
                            $selectForecast2= "SELECT * FROM `forecast` WHERE `year`='$chosenYearForecast' AND `month`='$inputMonth' AND `Department`='$Department' AND `line`='$inputLine' AND `model`='$inputModel' AND `Lot_No`='$lot' AND `Sub_Code`='$modelSuBCode'  AND `projection_Qty`='$inputProjQnty'  AND `type`='mente'";
                            $resultForecast2 = mysqli_query($con, $selectForecast2);
                            $numrowsForecast2 = mysqli_num_rows($resultForecast2);
                            if($numrowsForecast2==0){
                            $sqlinsertForecast= "INSERT INTO `forecast`(`year`, `month`,`Department`, `line`, `model`,`Lot_No`,`Sub_Code`,  `projection_Qty`, `gpiSTU`, `japanSTU`,`actual_time`, `total_gpi_target`, `total_actual`, `forecast_actual`,`actual_manpower`, `mp_forecast_gpi_target`, `total_manpower_needed`,`noOfworkingDays`, `type`) VALUES ('$chosenYearForecast','$inputMonth','$Department','$inputLine','$inputModel','$lot','$modelSuBCode','$inputProjQnty','$inputGpiSTU','$inputJpnSTU','$inputActualTime','$inputTotGpiTarget','$inputTotActual','$inputForAct','$inputActualManpower','$inputMFGT', '$inputFinalForecast','$inputdaysOfWork','mente')";
                            mysqli_query($con, $sqlinsertForecast);
                            }
                            else{
                                array_push($rows, ['="'.$modelName.'"','="'.$lot.'"','="'.$modelSuBCode.'"','="'.$ModelRealName.'"','="'.$date.'"','="'.$planqty.'"','="'.$subCodeQty.'"','="'.$toSerialNo.'"','="'.$approvalstatus.'"', '="'.$approvalDate.'"']);
        
                                    }
                        }
  

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
                            $selectEmployee = "SELECT * FROM `employees` WHERE `assign_line` = '$model_line'";
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
                                $selectForecast3= "SELECT * FROM `forecast` WHERE `year`='$chosenYearForecast' AND `month`='$inputMonth' AND `Department`='$Department' AND `line`='$inputLine' AND `model`='$inputModel' AND `Lot_No`='$lot' AND `Sub_Code`='$modelSuBCode'   AND `projection_Qty`='$inputProjQnty'  AND `type`='machine'";
                                $resultForecast3 = mysqli_query($con, $selectForecast3);
                                $numrowsForecast3 = mysqli_num_rows($resultForecast3);
                                if($numrowsForecast3 ==0){
                                    $sqlinsertForecast= "INSERT INTO `forecast`(`year`, `month`,`Department`, `line`, `model`, `Lot_No`,`Sub_Code`, `projection_Qty`, `gpiSTU`, `japanSTU`,`actual_time`, `total_gpi_target`, `total_actual`, `forecast_actual`,`actual_manpower`, `mp_forecast_gpi_target`, `total_manpower_needed`,`noOfworkingDays`, `type`) VALUES ('$chosenYearForecast','$inputMonth','$Department','$inputLine','$inputModel','$lot','$modelSuBCode','$inputProjQnty','$inputGpiSTU','$inputJpnSTU','$inputActualTime','$inputTotGpiTarget','$inputTotActual','$inputForAct','$inputActualManpower','$inputMFGT', '$inputFinalForecast','$inputdaysOfWork','machine')";
                                    mysqli_query($con, $sqlinsertForecast);
                                }
                                else{
                                    array_push($rows, ['="'.$modelName.'"','="'.$lot.'"','="'.$modelSuBCode.'"','="'.$ModelRealName.'"','="'.$date.'"','="'.$planqty.'"','="'.$subCodeQty.'"','="'.$toSerialNo.'"','="'.$approvalstatus.'"', '="'.$approvalDate.'"']);
            
                                        }
                      
                            }
                            else{
                                $selectForecast4= "SELECT * FROM `forecast` WHERE `year`='$chosenYearForecast' AND `month`='$inputMonth' AND `Department`='$Department' AND `line`='$inputLine' AND `model`='$inputModel' AND `Lot_No`='$lot' AND `Sub_Code`='$modelSuBCode'  AND `projection_Qty`='$inputProjQnty'  AND `type`='mente'";
                                $resultForecast4 = mysqli_query($con, $selectForecast4);
                                $numrowsForecast4 = mysqli_num_rows($resultForecast4);

                                if($numrowsForecast4==0){
                                    $sqlinsertForecast= "INSERT INTO `forecast`(`year`, `month`,`Department`, `line`, `model`, `Lot_No`,`Sub_Code`, `projection_Qty`, `gpiSTU`, `japanSTU`,`actual_time`, `total_gpi_target`, `total_actual`, `forecast_actual`,`actual_manpower`, `mp_forecast_gpi_target`, `total_manpower_needed`,`noOfworkingDays`,`type`) VALUES ('$chosenYearForecast','$inputMonth','$Department','$inputLine','$inputModel','$lot','$modelSuBCode','$inputProjQnty','$inputGpiSTU','$inputJpnSTU','$inputActualTime','$inputTotGpiTarget','$inputTotActual','$inputForAct','$inputActualManpower','$inputMFGT', '$inputFinalForecast','$inputdaysOfWork','mente')";
                                    mysqli_query($con, $sqlinsertForecast);
                                }
                                else{
                                    array_push($rows, ['="'.$modelName.'"','="'.$lot.'"','="'.$modelSuBCode.'"','="'.$ModelRealName.'"','="'.$date.'"','="'.$planqty.'"','="'.$subCodeQty.'"','="'.$toSerialNo.'"','="'.$approvalstatus.'"', '="'.$approvalDate.'"']);
            
                                        }
                           
                            }

    
                        }
                        else if($numrows1>1){

                         if (strpos($lot , "BC")==""){
                            $selectEmployee = "SELECT * FROM `employees` WHERE `assign_line` = '$model_line'";
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

                            $selectForecast5= "SELECT * FROM `forecast` WHERE `year`='$chosenYearForecast' AND `month`='$inputMonth' AND `Department`='$Department' AND `line`='$inputLine' AND `model`='$inputModel'AND `Lot_No`='$lot' AND `Sub_Code`='$modelSuBCode'  AND `projection_Qty`='$inputProjQnty'  AND `type`='machine'";
                            $resultForecast5 = mysqli_query($con, $selectForecast5);
                            $numrowsForecast5 = mysqli_num_rows($resultForecast5);
                            if($numrowsForecast5==0){
                                $sqlinsertForecast= "INSERT INTO `forecast`(`year`, `month`,`Department`, `line`, `model`,`Lot_No`,`Sub_Code`, `projection_Qty`, `gpiSTU`, `japanSTU`,`actual_time`, `total_gpi_target`, `total_actual`, `forecast_actual`,`actual_manpower`, `mp_forecast_gpi_target`, `total_manpower_needed`,`noOfworkingDays`, `type`) VALUES ('$chosenYearForecast','$inputMonth','$Department','$inputLine','$inputModel','$lot','$modelSuBCode','$inputProjQnty','$inputGpiSTU','$inputJpnSTU','$inputActualTime','$inputTotGpiTarget','$inputTotActual','$inputForAct','$inputActualManpower','$inputMFGT', '$inputFinalForecast','$inputdaysOfWork','machine')";
                            mysqli_query($con, $sqlinsertForecast);
                            }
                            else{
                                array_push($rows, ['="'.$modelName.'"','="'.$lot.'"','="'.$modelSuBCode.'"','="'.$ModelRealName.'"','="'.$date.'"','="'.$planqty.'"','="'.$subCodeQty.'"','="'.$toSerialNo.'"','="'.$approvalstatus.'"', '="'.$approvalDate.'"']);
        
                                    }
                            
                                
                        }
                        else if(strpos($lot , "BC")==0){
                        $selectEmployee = "SELECT * FROM `employees` WHERE `assign_line` = '$model_line'";
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

                        $selectForecast6= "SELECT * FROM `forecast` WHERE `year`='$chosenYearForecast' AND `month`='$inputMonth' AND `Department`='$Department' AND `line`='$inputLine' AND `model`='$inputModel' AND `Lot_No`='$lot' AND `Sub_Code`='$modelSuBCode'  AND `projection_Qty`='$inputProjQnty'  AND `type`='mente'";
                        $resultForecast6 = mysqli_query($con, $selectForecast6);
                        $numrowsForecast6 = mysqli_num_rows($resultForecast6);
                            if($numrowsForecast6 == 0){
                                $sqlinsertForecast= "INSERT INTO `forecast`(`year`, `month`,`Department`, `line`, `model`,`Lot_No`,`Sub_Code`,  `projection_Qty`, `gpiSTU`, `japanSTU`,`actual_time`, `total_gpi_target`, `total_actual`, `forecast_actual`,`actual_manpower`, `mp_forecast_gpi_target`, `total_manpower_needed`,`noOfworkingDays`,`type`) VALUES ('$chosenYearForecast','$inputMonth','$Department','$inputLine','$inputModel','$lot','$modelSuBCode','$inputProjQnty','$inputGpiSTU','$inputJpnSTU','$inputActualTime','$inputTotGpiTarget','$inputTotActual','$inputForAct','$inputActualManpower','$inputMFGT', '$inputFinalForecast','$inputdaysOfWork', 'mente')";
                                mysqli_query($con, $sqlinsertForecast);
                            }
                            else{
                                array_push($rows, ['="'.$modelName.'"','="'.$lot.'"','="'.$modelSuBCode.'"','="'.$ModelRealName.'"','="'.$date.'"','="'.$planqty.'"','="'.$subCodeQty.'"','="'.$toSerialNo.'"','="'.$approvalstatus.'"', '="'.$approvalDate.'"']);
        
                                    }
                     }

   
                    }
                    
                     else if($numrows1==0){
                        array_push($rows, ['="'.$modelName.'"','="'.$lot.'"','="'.$modelSuBCode.'"','="'.$ModelRealName.'"','="'.$date.'"','="'.$planqty.'"','="'.$subCodeQty.'"','="'.$toSerialNo.'"','="'.$approvalstatus.'"', '="'.$approvalDate.'"']);
        
                    }
  
 
                    }
                    else if($numrows==0){
                        array_push($rows, ['="'.$modelName.'"','="'.$lot.'"','="'.$modelSuBCode.'"','="'.$ModelRealName.'"','="'.$date.'"','="'.$planqty.'"','="'.$subCodeQty.'"','="'.$toSerialNo.'"','="'.$approvalstatus.'"', '="'.$approvalDate.'"']);




                      
          
                    }
                        $msg = true;

                }
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
                 
                        // exit(0);
                    }
                    ?>
                
                    </script><?php
                    
                    
                    //  header('Location: system/userHomePage.php');
                }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>




<script>
       var rows = <?php echo json_encode($rows); ?>;
    csvContent = "data:text/csv;charset=utf-8,";
                    /* add the column delimiter as comma(,) and each row splitted by new line character (\n) */
                   rows.forEach(function(rowArray){
                       row = rowArray.join(",");
                       csvContent += row + "\r\n";
                   });
             
                   /* create a hidden <a> DOM node and set its download attribute */
                   var encodedUri = encodeURI(csvContent);
                   var link = document.createElement("a");
                   link.setAttribute("href", encodedUri);
                   link.setAttribute("download", "Failed EUC.csv");
                   document.body.appendChild(link);
                    /* download the data file named 'Stock_Price_Report.csv' */
                   link.click();
                   window.location = "userHomePage.php";
</script>