
<?php
include "./fetch_data.php";
include "../phpSubmit/deleteForecast.php";

?>
<div class="main-content p-5" id="mainContent">
  <div id="forecastTable" class="<?php $show = $_SESSION['showTable']; if($show=="d-none"){echo "d-none";} else{ echo "";} ?>">
    <h2 class="fw-bolder text-dark ">Forecast <?php echo  $_SESSION['showTable']; ?></h2>
  <form action="userHomePage.php" method="POST">
    <table id="forecastTableList" class="table table-striped display nowrap" cellspacing="0" style="width:100%">
      <thead  class="thead-primary table-light" style="p1osition: sticky;top: -1px;">
        <tr id="topLeft" class=" table-bordered text-center" >
          <th style="min-width:15px;">No.</th>
          <th style="min-width:15px;">ID</th>

          <th>Line</th>
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

              
        ?>
        <tr>
          <td><?php echo $sn; ?></td>
          <td><?php echo $forecast_Id; ?></td>
          <td><?php echo $line; ?></td>
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
                <img src="<?php echo $machinePhoto;?>" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title"><?php echo $machineName;?></h5>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item"><?php echo $machineDesc;?></li>
                    <li class="list-group-item"><?php echo $machineLoc;?></li>
                  </ul>
                  <div class="card-footer">
                    <small class="text-muted">Last updated 3 mins ago</small>
                  </div>
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

</script>
  <?php

}
?>