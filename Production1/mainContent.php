
<?php
include "./fetch_data.php";
include "../phpSubmit/deleteForecast.php";


$chooseType = $_SESSION['type'];
$chooseYear = $_SESSION['year'];
$chooseMonth = $_SESSION['month']; 



?>
<div class="main-content px-5" id="mainContent">
  <div id="forecastTable" class="<?php $show = $_SESSION['showTable']; if($show=="d-none"){echo "d-none";} else{ echo "";} ?>">
    <h2 class="fw-bolder text-dark ">Forecast <?php echo  $_SESSION['showTable']; ?></h2>
<!-- <input type="date" id="birthdaytime" onchange="tex" name="birthdaytime"> -->

  <form action="userHomePage.php" method="POST">
    <table id="forecastTableList" class="table table-striped display nowrap" cellspacing="0" style="width:100%">
      <thead  class="thead-primary table-light" style="p1osition: sticky;top: -1px;">
        <tr id="topLeft" class=" table-bordered text-center" >
          <th style="min-width:15px;">No.</th>
          <th style="min-width:15px;">ID</th>

          <th>Line</th>
          <th>Type</th>
          <th>Model</th>
          <th>Projection</th>
          <th>Japan<br> STU</th>
          <th>GPI<br> STU</th>
          <th>Actual<br> Time</th>
          <th>Total<br> GPI<br>  Target</th>
          <th>Total <br>Actual</th>
          <th>GPI <br> Target <br> Forecast</th>
          <th>Actual<br>  Forecast</th>
          <th>Manpower<br>  Needed</th>
          <th>No.<br> of days</th>
          <th>Month</th>
          <th>Year</th>
          <th>Action</th>




        </tr>
      </thead>
      <tbody class="" id="manpowerBody">
        <?php           
          if(is_array($fetchDataForecast)){      
            $sn=1;
            foreach($fetchDataForecast as $data){
              $forecast_Id = $data['forecast_Id'];
              $line = $data['line'];
              $model = $data['model'];
              $year = $data['year'];
              $month = $data['month'];
              $line = $data['line'];
              $model = $data['model'];
              $projection_Qty = $data['projection_Qty'];
              $gpiSTU = $data['gpiSTU'];
              $japanSTU = $data['japanSTU'];

              $actual_time = $data['actual_time'];
              $total_gpi_target = $data['total_gpi_target'];
              $total_actual = $data['total_actual'];
              $forecast_actual = $data['forecast_actual'];
              $mp_forecast_gpi_target = $data['mp_forecast_gpi_target'];
              $total_manpower_needed = $data['total_manpower_needed'];
              $inputdaysOfWork = $data['noOfworkingDays'];
              $type = $data['type'];


              
        ?>
        <tr>
          <td><?php echo $sn; ?></td>
          <td><?php echo $forecast_Id; ?></td>
          <td><?php echo $line; ?></td>
          <td><?php echo $type; ?></td>

          <td><?php echo $model; ?></td>
          <td><?php echo $projection_Qty;?></td>
          <td><?php echo $gpiSTU;?></td>
          <td><?php echo $japanSTU ;?></td>
          <td><?php echo $actual_time; ?></td>
          <td><?php echo $total_gpi_target; ?></td>
          <td><?php echo $total_actual; ?></td>
          <td><?php echo $mp_forecast_gpi_target; ?></td>
          <td><?php echo $forecast_actual; ?></td>
          <td><?php echo $total_manpower_needed; ?></td>
          <td><?php echo $inputdaysOfWork; ?></td>
          <td><?php echo $month; ?></td>
          <td><?php echo $year; ?></td>
          <td><button class="btn btn-link" type="button"  data-bs-toggle="modal" data-bs-target="#deleteForecast" data-bs-ForecastId="<?php echo $forecast_Id;?>" ><i  class="fa-solid fa-trash-can"></i></button><button class="btn btn-link" type="button" data-bs-toggle="modal" data-bs-target="#editForecast" onclick="passForecastDataToEdit('<?php echo $forecast_Id;?>','<?php echo $line;?>','<?php echo $model;?>','<?php echo $projection_Qty;?>','<?php echo $gpiSTU;?>','<?php echo $japanSTU ;?>','<?php echo $actual_time; ?>','<?php echo $total_gpi_target;?>','<?php echo  $total_actual;?>','<?php echo $mp_forecast_gpi_target;?>','<?php echo $forecast_actual; ?>','<?php echo $total_manpower_needed; ?>','<?php echo $inputdaysOfWork;?>','<?php echo  $month; ?>','<?php echo $year;  ?>',)"><i class="ps-2 fa-solid fa-pen-to-square"></i></button> </td>
        </tr>
        <?php 
          $sn++;  }}else{
              echo $fetchDataForecast;
            }
            ?>
      </tbody>
    </table>
  </form>
    <form action="userHomePage.php" method="POST">
      <div class="d-grid gap-2">
        <button class="btn btn-outline-success" name="addForecastBtn" id="addForecastBtn" type="submit" >Add a Forecast</button>
      </div>
      <div class="d-grid gap-2 mt-1">
        <button class="btn btn-success" name="addForecastBtn" id="" type="button" data-bs-toggle="modal" data-bs-target="#importModal" >Import</button>
      </div>
    </form>
  </div>
  <div id="cardholder" class="<?php $show = $_SESSION['showTable']; if($show=="d-none"){echo "";} else{ echo "d-none";} ?>">
  <div class="col goback ms-2">
          <!-- <input type="text" class="form-control" placeholder="First name" aria-label="First name"> -->
          <a type="button" href="./userHomePage.php" onclick="hideForcast();" class="form-control btn btn-outline-primary text-start"
            id="goBack">
            <span><i class="fa-solid fa-arrow-left"></i></span>
            Go back</a>

        </div>
          <div class="row h-100 text-dark"><div class="col-3">
          </div>
          <div class="col-9">
            <div  class="row g-3">
               <div class="col">
                  <form action="userHomePage.php" method="POST">
                      <div class="input-group mb-3">
                      <select class="form-select"  name="type" placeholder="Choose Type"  id="modelType">
                      <option selected>Select Type</option>
                      <option value="machine">Machine</option>
                      <option value="mente">Mente</option>
                      </select>
                      <?php echo "<script>  const selecttype = document.querySelector('#modelType'); selecttype.value = '$chooseType' </script>"; ?>
                          <select  class="form-select" name="month" placeholder="Choose Month"  id="chosenMonth">
                          <option selected disabled>Choose...</option>
                          <option value="January">January</option>
                          <option value="February">February</option>
                          <option value="March">March</option>
                          <option value="April">April</option>
                          <option value="May">May</option>
                          <option value="June">June</option>
                          <option value="July">July</option>
                          <option value="August">August</option>
                          <option value="September">September</option>
                          <option value="October">October</option>
                          <option value="November">November</option>
                          <option value="December">December</option>
                            </select>       
                            <?php echo "<script>  const selectyear = document.querySelector('#chosenMonth'); selectyear.value = '$chooseMonth' </script>"; ?>
                                  <input type="number" name="year" id="fsyear2" value="<?php echo $chooseYear; ?>" class="form-control" placeholder="Choose Year" aria-label="Server">
                                        <button type="submit" name="sbtChoose" class="btn btn-warning">Submit</button>
                      </div>
                    </form>
                </div>
              </div>
          </div>
        </div>
        
    <h2 class="fw-bolder text-dark ps-4">Choose a Line </h2>
      <div class="row row-cols-1 row-cols-md-4 g-4 " >
        <?php           
          if(is_array($fetchDataLine)){                            
            foreach($fetchDataLine as $data){
              $machineName = $data['line_name'];
              $machineDesc = $data['line_desc'];
              $machineLoc = $data['line_location'];
              $machineTimeAdded = $data['last_time_updated'];
              $machinePhoto = $data['line_photo'];
              $machineId = $data['line_id'];

            ?>
        <form action="userHomePage.php" method="POST">
          <input type="submit" name="card" id="<?php echo $machineId; ?>" style="display: none">
          <input type="text" name="lineID" value="<?php echo $machineId ?>" style="display:none">
            <div class="col">
              <!-- onclick="showTableForModel('<?php //echo $machineId;?>', '<?php //echo $machineName;?>')" -->
              <a class="card"   onclick="clickCard('<?php echo $machineId; ?>')" >
                <img src="<?php echo $machinePhoto;?>" class="card-img-top" alt="..">
                  <div class="card-body">
                    <h5 class="card-title"><?php echo $machineName;?></h5>
                  </div>
                  <ul class="list-group list-group-flush">
                  <li class="list-group-item">TOTAL (GPI TARGET): <span class="text-muted"><?php
                        $selectTotalGPITArget= "SELECT SUM( `gpiSTU` * `projection_Qty`) AS 'Product' FROM `forecast` WHERE `line`='$machineName' AND `month` = '$chooseMonth' AND `year` = '$chooseYear' AND `type` = '$chooseType';";
                        $resultGPITARGET = mysqli_query($con, $selectTotalGPITArget);
                        while($userRow = mysqli_fetch_assoc($resultGPITARGET)){
                        $gpitargetTotalPerLine = $userRow['Product'];
                        }
                        $roundgpitargetTotalPerLine =round($gpitargetTotalPerLine,2);
                        $finalroundgpitargetTotalPerLine = number_format($roundgpitargetTotalPerLine, 2);echo $finalroundgpitargetTotalPerLine;
                        
                        ?></span></li>
                     <li class="list-group-item">TOTAL (ACTUAL): <span class="text-muted"><?php
                        $selectTotalGPITArget= "SELECT SUM( `actual_time` * `projection_Qty`) AS 'Product' FROM `forecast` WHERE `line`='$machineName' AND`month` = '$chooseMonth' AND `year` = '$chooseYear' AND `type` = '$chooseType';";
                        $resultGPITARGET = mysqli_query($con, $selectTotalGPITArget);
                        while($userRow = mysqli_fetch_assoc($resultGPITARGET)){
                        $actualtargetTotalPerLine = $userRow['Product'];
                        }
                        $roundactualtargetTotalPerLine =round($actualtargetTotalPerLine,2);
                        $finalroundactualtargetTotalPerLine = number_format($roundactualtargetTotalPerLine, 2);echo $finalroundactualtargetTotalPerLine;
                        
                        ?></span></li>
                    <li class="list-group-item">FORECAST (GPI TARGET): <span class="text-muted"><?php

                      $selectYear= "SELECT `$chooseYear` FROM `workingdays` WHERE `month` = '$chooseMonth';";
                      $resultDays = mysqli_query($con, $selectYear);
                        while($userRow = mysqli_fetch_assoc($resultDays)){
                            $noOfDays = $userRow[$chooseYear];
                            }
                            if($roundgpitargetTotalPerLine ==0){
                              echo 0;
                            }else{
                              $quotient = (float)$roundgpitargetTotalPerLine /  (float)435 /  (float)$noOfDays;
                              $roundforecastgpitarget =round($quotient,2);
                              $finalroundforecastgpitarget = number_format($roundforecastgpitarget, 2);echo $finalroundforecastgpitarget;

                            }
// echo $roundgpitargetTotalPerLine;
                           
                        ?></span></li>
                         <li class="list-group-item">FORECAST (ACTUAL): <span class="text-muted"><?php
                          $selectYear= "SELECT `$chooseYear` FROM `workingdays` WHERE `month` = '$chooseMonth';";
                          $resultDays = mysqli_query($con, $selectYear);
                          $roundforecastactual = 0;
                            while($userRow = mysqli_fetch_assoc($resultDays)){
                                $noOfDays = $userRow[$chooseYear];
                                }
                            if($roundactualtargetTotalPerLine ==0){
                              echo 0;
                            }else{
                              $quotient = (float)$roundactualtargetTotalPerLine /  (float)435 /  (float)$noOfDays;
                              $roundforecastactual=round($quotient,2);
                              $finalroundforecastgpitarget = number_format($roundforecastactual, 2);echo $finalroundforecastgpitarget;
                            
                            }
                        ?></span></li>
                         <li class="list-group-item">PRESENT: <span class="text-muted"><?php
                        $selectemployees= "SELECT * FROM `employees` WHERE `assign_line` = '$machineName'";
                        $resultEmployees = mysqli_query($con, $selectemployees);
                        $countEmployees = mysqli_num_rows($resultEmployees);
                       echo $countEmployees;
                        ?></span></li>
                         <li class="list-group-item">AMOUNT:  <span class="text-muted"><?php
                       echo $countEmployees - $roundforecastactual;
                        ?></span></li>

                  </ul>
                  <!-- <div class="card-footer">
                    <small class="text-muted">Last updated 3 mins ago</small>
                  </div> -->
              </a>
            </div>
          </form>
            <?php 
            }}else{
              echo $fetchDataLine;
            }
            
            ?>
      </div>
      </div>




    <!-- <div class="tab-pane " id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab" tabindex="0">
      <div class="row p-3 h-lg-25 bg-success balance-container ">
        this is a nice div

      </div>
    </div> -->
  <!-- <?php //include "./list_of_manpower.php"; ?> -->

</div>
<?php 

if(isset($_GET['carda'])){
  // session_destroy();
  $_SESSION['lineId']="";
  $machineID = $_GET['card'];
  echo $machineID;
  $lineName = "";
  $selectLine = "SELECT * FROM `line` WHERE `line_id` = '$machineID'";
  $result = mysqli_query($con, $selectLine);
  
  while($userRow = mysqli_fetch_assoc($result)){
    $lineName = $userRow['line_name'];
    $_SESSION['lineId'] = $userRow['line_name'];
    $_SESSION['lineName'] = $userRow['line_name'];
    
    
  }


  ?>
  <style type="text/css">
  #cardholder{
     display:none;
    }
   #tableForModel{
display: inline;
}
#bcModel{
display: flex;
}
#forecastForm{
display: none;
}
</style>

<script>
  document.getElementById("containerOfLineId").value=<?php echo $machineID?>;
// document.getElementById("nameOfLine").innerHTML = "<?php echo $lineName;?>";
document.getElementById("idOfLine").value="<?php echo $machineID?>";
 document.getElementById("InputLineName").value="<?php echo $lineName?>";


function testdate(){
  
const x = new Date('2022-11-09');
const y = new Date('2021-11-08');

// less than, greater than is fine:
console.log('x < y', x < y); // false
console.log('x > y', x > y); // false
console.log('x <= y', x <= y); // true
console.log('x >= y', x >= y); // true

  console.log(aasd>basd)
}
</script>
  <?php

}
?>