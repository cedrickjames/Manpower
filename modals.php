
<?php
  $tableNameline="line";
  $columnsLine= ['line_id', 'line_name','line_desc','line_location','last_time_updated','line_photo'];
  $fetchDataLine2 = fetch_data_line2($db, $tableNameline, $columnsLine, $username);
 
 
  function fetch_data_line2($db, $tableNameline, $columnsLine){
    if(empty($db)){
     $msg= "Database connection error";
    }elseif (empty($columnsLine) || !is_array($columnsLine)) {
     $msg="columns Name must be defined in an indexed array";
    }elseif(empty($tableNameline)){
      $msg= "Table Name is empty";
   }else{
   $columnName = implode(", ", $columnsLine);
   $query = "SELECT * FROM `line`";
  //  SELECT * FROM `usertask` WHERE `username` = 'cjorozo';
   $result = $db->query($query);
   if($result== true){ 
    if ($result->num_rows > 0) {
       $row= mysqli_fetch_all($result, MYSQLI_ASSOC);
       $msg= $row;
    } else {
       $msg= "No Data Found"; 
    }
   }else{
     $msg= mysqli_error($db);
   }
   }
   return $msg;
   }





   $tableNameModelAll2="model";
   $columnsModelAll2= ['model_id', 'model_name','model_line','id_model_line','japan_stu','gpi_stu', 'actual_time'];
   $fetchDataModelAll2 = fetch_data_model_All2($db, $tableNameModelAll2, $columnsModelAll2);
   
   
   function fetch_data_model_All2($db, $tableNameModelAll2, $columnsModelAll2){
    if(empty($db)){
     $msg= "Database connection error";
    }elseif (empty($columnsModelAll2) || !is_array($columnsModelAll2)) {
     $msg="columns Name must be defined in an indexed array";
    }elseif(empty($tableNameModelAll2)){
      $msg= "Table Name is empty";
   }else{
   $columnName = implode(", ", $columnsModelAll2);
   // $query = "SELECT * FROM `model`;";
 //   $idModelLine= $_SESSION['lineId'];
   $query = "SELECT * FROM `model`;";
   
   //  SELECT * FROM `usertask` WHERE `username` = 'cjorozo';
   $result = $db->query($query);
   if($result== true){ 
    if ($result->num_rows > 0) {
       $row= mysqli_fetch_all($result, MYSQLI_ASSOC);
       $msg= $row;
    } else {
       $msg= "No Data Found"; 
    }
   }else{
     $msg= mysqli_error($db);
   }
   }
   return $msg;
   }
 
?>


<!-- Modal -->
<form action="../phpSubmit/deleteForecast.php" method="POST">
  <div class="modal fade" id="deleteForecast" tabindex="-1" aria-labelledby="deleteForecast" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Delete this forecast with ID <span class="text-primary" id="forecastIDTitle"></span> ? </h5>
          <input name="forecastID" id="forecastID" class="d-none"> 
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-footer d-flex justify-content-center">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" name="DeleteForecast" class="btn btn-danger">Delete</button>
        </div>
      </div>
    </div>
  </div>
</form>
<div class="modal fade" id="editForecast" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Forecast</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="w-5" id="editforecastForm">
      <form class="row g-3 computer" action="../phpSubmit/editForecast.php" method="POST">
        <input type="text" class="d-none" name="EditForecastIdContainer" id="EditForecastIdContainer">
  <div class="form-floating col-md-6">
    
    <div class="form-floating">
  <input type="number" class="form-control" onkeyup="chooseWorkingDays()" value="<?php $year = new DateTime(); $year  = $year->format('Y'); echo $year; ?>"placeholder="Enter year" name="editchosenYearForecast" id="editchosenYearForecast"></input>
  <label for="floatingTextarea">Year</label>
</div>
  </div>
  <div class="form-floating col-md-6">
  <select id="editinputMonth" name="editinputMonth" onchange="chooseWorkingDays()" class="form-select">
      <option selected disabled>Choose...</option>
      <option>January</option>
      <option>February</option>
      <option>March</option>
      <option>April</option>
      <option>May</option>
      <option>June</option>
      <option>July</option>
      <option>August</option>
      <option>September</option>
      <option>October</option>
      <option>November</option>
      <option>December</option>



    </select>
    <label for="inputMonth">Month</label>

  </div>
  <div class="form-floating col-md-6">
    <input type="text" class="form-control" name="editinputLine" id="editinputLine" placeholder="Line name">
    <label for="inputLine">Line</label>

  </div>
  <div class="form-floating col-md-6">
    <input type="text" class="form-control" name="editinputModel" id="editinputModel"placeholder="Model name">
    <label for="inputModel" >Model</label>

  </div>
  <div class="form-floating col-md-12">
    <input type="number" class="form-control" onkeyup="editcompute()"name="editinputProjQnty" id="editinputProjQnty"placeholder="Projection quantity">
    <label for="inputQuantity" >Projection Quantity</label>
  </div>
  <div class="form-floating col-md-2  ">
    <input type="number" class="form-control" name="editinputdaysOfWork" id="editinputdaysOfWork"placeholder="Projection quantity">
    <label for="inputdaysOfWork" >Days of work</label>
  </div>
  <div class="form-floating col-md-2">
    <input type="number" class="form-control" name="editinputActualManpower"id="editinputActualManpower"placeholder="Projection quantity">
    <label for="inputActualManpower" >Actual Manpower</label>
  </div>
  <div class="form-floating col-md-3">
    <input type="number" class="form-control" id="editinputJpnSTU" name="editinputJpnSTU" placeholder="Projection quantity">
    <label for="inputJpnSTU" >Japan STU</label>
  </div>
  <div class="form-floating col-md-3">
    <input type="number" class="form-control" id="editinputGpiSTU" name="editinputGpiSTU" placeholder="Projection quantity">
    <label for="inputGpiSTU" >GPI STU</label>
  </div>
  <div class="form-floating col-md-2">
    <input type="number" class="form-control" id="editinputActualTime" name="editinputActualTime" placeholder="Projection quantity">
    <label for="inputActualTime" >Actual Time</label>
  </div>
  <div class="form-floating col-md-6">
    <input type="number" class="form-control" id="editinputTotGpiTarget" name="editinputTotGpiTarget" placeholder="Projection quantity">
    <label for="inputTotGpiTarget" >Total GPI Target</label>
  </div>
  <div class="form-floating col-md-6">
    <input type="number" class="form-control" id="editinputTotActual" name="editinputTotActual" placeholder="Projection quantity">
    <label for="inputTotActual" >Total (Actual)</label>
  </div>
  <div class="form-floating col-md-6">
    <input type="number" class="form-control" step="0.01" id="editinputForAct" name="editinputForAct" placeholder="Projection quantity">
    <label for="inputForAct" >Forecast Actual</label>
  </div>
  <div class="form-floating col-md-6">
    <input type="number" class="form-control" id="editinputMFGT" step="0.01" name="editinputMFGT" placeholder="Projection quantity">
    <label for="inputMFGT" >MP Forecast GPI Target</label>
  </div>
  <div class="form-floating col-md-12">
    <input type="number" class="form-control" id="editinputFinalForecast"step="0.01" name="editinputFinalForecast"  placeholder="Projection quantity">
    <label for="inputMFGT" >Final Forecast</label>
  </div>




      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn gsuccess" name="editForecast">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
<div class="modal fade" id="addLineModal" tabindex="-1" aria-labelledby="addLineLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Line</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row row-cols-1 row-cols-md-2 g-2 ">

          <div class="col">

            <div class="card" href="#" onclick="showTableForModel()">

              <img src="../samplePictures/GPI Machine/BRM 10.png" id="cardImage" class="card-img-top"
                style="display: none" alt="...">
              <svg class="bd-placeholder-img card-img-top" style="display: block" id="alternativeImage" width="100%"
                height="180" role="img" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice"
                focusable="false">
                <title>Placeholder</title>
                <rect width="100%" height="100%" fill="#868e96"></rect><text x="50%" y="50%" fill="#dee2e6"
                  dy=".3em">Image</text>
              </svg>
              <div class="card-body">
                <h5 class="card-title" id="machineName">Name</h5>
              </div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item" id="machineDescription">Description</li>
                <li class="list-group-item" id="machineLocation">Location</li>
              </ul>
              <div class="card-footer">
                <small class="text-muted"> &nbsp</small>
              </div>
            </div>
          </div>
          <div class="col col-form">

            <form method="POST" action="../phpSubmit/upload.php" enctype="multipart/form-data" class="mt-3">

              <label>Image of Machine</label>

              <div class=" form mb-3 input-group">
                <input type="file" name="uploadedFile" class="form-control" id="inputImage">
                <!-- <input type="file" name="uploadedFile" id="uploadedFile" class="form-control" style="width: 180px; height: 30px; font-size: 10px; padding-top:0px" title=" Select "> -->

              </div>
              <div class="form-floating mb-3">
                <input type="text" name="machine_name" class="form-control" id="floatingInputName"
                  placeholder="Machine Name">
                <label for="floatingInputName">Name of Machine</label>
              </div>
              <div class="form-floating mb-3">
                <textarea class="form-control" name="machine_description" placeholder="Leave a description here"
                  id="floatingDescription" style="height: 141px;"></textarea>
                <label for="floatingTextarea">Description</label>
              </div>
              <div class="form-floating mb-3">
                <select class="form-select" name="machine_location" id="floatingLocation"
                  aria-label="Floating label select example">
                  <option selected>Open this select location</option>
                  <option value="GPI 1">GPI 1</option>
                  <option value="GPI 2">GPI 2</option>
                  <option value="GPI 3">GPI 3</option>
                  <option value="GPI 4">GPI 4</option>
                  <option value="GPI 5">GPI 5</option>
                  <option value="GPI 6">GPI 6</option>
                  <option value="GPI 7">GPI 7</option>
                  <option value="GPI 8">GPI 8</option>
                  <option value="GPI 9">GPI 9</option>


                </select>
                <label for="floatingSelect">Location</label>
              </div>




          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button ype="submit" name="uploadBtn" class="btn btn-primary" value="Upload">Add</button>
      </div>
      </form>

    </div>
  </div>
</div>

<div class="modal fade" id="addModelModal" tabindex="-1" aria-labelledby="addModelModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Model</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row row-cols-1 row-cols-md-1 g-1 ">

          <div class="col col-form">

            <form method="POST" action="../phpSubmit/addModel.php" enctype="multipart/form-data" class="m-3">
              <input type="text" id="containerOfLineId" name="containerOfLineId" style="display: none"
                value="<?php echo $_SESSION['lineId']?>">
              <div class="form-floating mb-3">
                <input type="text" name="modal_line_name" class="form-control" id="InputLineName"
                  placeholder="Line Name" value="<?php echo $_SESSION['lineName']?>">
                <label for="InputLineName">Name of Line</label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" name="modal_name" class="form-control" id="InputModelName" placeholder="Model Name">
                <label for="InputModelName">Name of Model</label>
              </div>
              <div class="form-floating mb-3">
                <input type="number" name="jpn_stu" onkeyup="computeGpiStu()" step="0.01" class="form-control"
                  id="InputJPNSTU" placeholder="Japan STU">
                <label for="InputJPNSTU">Japan STU</label>
              </div>
              <div class="form-floating mb-3">
                <input type="number" name="gpi_stu" step="0.01" class="form-control" id="InputGPISTU"
                  placeholder="GPI STU">
                <label for="InputJPNSTU">GPI STU</label>
              </div>
              <div class="form-floating mb-3">
                <input type="number" name="actual_time" step="0.01" class="form-control" id="InputActualTime"
                  placeholder="Actual Time">
                <label for="InputActualTime">Actual Time</label>
              </div>



          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button ype="submit" name="addModelBtn" class="btn btn-primary" value="Upload">Add</button>
      </div>
      </form>

    </div>
  </div>
</div>



<div class="modal fade" id="updateWorkingDaysModal" tabindex="-1" aria-labelledby="updateWorkingDaysModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Working Days</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row row-cols-1 row-cols-md-1 g-1 ">
          <div class="col col-form">


            <form action="<?php 
              $location = $_SESSION['location'];
if($location == "list_of_models"){
    echo "list_of_models.php";
}
else{
  echo "userHomePage.php";


}

 ?>" method="POST">
              <div class="input-group mb-3" id="year1">

                <input type="number" name="modal_year" class="form-control" id="InputYear" placeholder="Year " value="<?php
                  if($_SESSION['chosenYearinWorkingDays']==""){
                    $year = new DateTime(); $year  = $year->format('Y'); echo $year; 
                  }
                  else{
                    echo $_SESSION['chosenYearinWorkingDays'];
                  }
                  ?>">
                <button class="btn btn-outline-success" type="submit" name="changeYear"
                  id="button-addon2">Submit</button>

              </div>
            </form>
            <form method="POST" action="../phpSubmit/addWorkingDays.php" name="workingDays"
              enctype="multipart/form-data" class="m-3">
              <div class="form-floating mb-3" id="year2" style="display: none">
                <input type="number" name="modal_year2" class="form-control" id="InputYear" placeholder="Line Name"
                  value="<?php
                  if($_SESSION['chosenYearinWorkingDays']==""){
                    $year = new DateTime(); $year  = $year->format('Y'); echo $year; 
                  }
                  else{
                    echo $_SESSION['chosenYearinWorkingDays'];
                  }
                  ?>">
                <label for="InputYearName">Year</label>
              </div>
              <table class="table table-striped table-hover" style="width:  100%" id="listOfModels"
                class="table datacust-datatable Table ">
                <thead class="thead-primary table-light" style="position: sticky;top: -1px;">


                  <tr class=" table-bordered text-center">
                    <th style="">Month</th>
                    <th class="w-10">Working days</th>
                  </tr>
                </thead>
                <tbody class="text-center" id="modelsBody">
                  <?php           if(is_array($fetchDataWD)){      
                         $idNumber = 1;
                                 foreach($fetchDataWD as $data){
                                    $days = $data[$chosenYear];
                                    $month = $data['month'];
                                 

                                 ?>

                  <tr class=" table-bordered text-center">
                    <th style=""><?php echo $month ?></th>
                    <th style=""><input type="number" name="day<?php echo $idNumber; ?>" value="<?php echo $days;?>"
                        disabled class="h-100 w-10 border border-primary border-opacity-25"></th>

                  </tr>
                  <?php 
         $idNumber++; }}else{
            }
                ?>

                </tbody>
              </table>


          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success" onclick="enableWorkingDaysEdit('border');">Edit</button>
        <button type="submit" name="addworkingDays" class="btn btn-primary" value="Upload">Add</button>
      </div>
      </form>

    </div>
  </div>
</div>




<div class="modal fade" id="addEmployeeModal" tabindex="-1" aria-labelledby="addEmployeeModal" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add employee</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row row-cols-1 row-cols-md-1 g-1 ">

          <div class="col col-form">

            <form method="POST" action="../phpSubmit/addEmployee.php" enctype="multipart/form-data" class="m-3">
              <!-- <input type="text" id="containerOfLineId" name="containerOfLineId" style="display: none"> -->
              <div class="form-floating mb-3">
                <input type="text" name="InputEmployeeName" class="form-control" id="InputEmployeeName"
                  placeholder="Employee Name">
                <label for="InputEmployeeName">First Name</label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" name="InputEmployeeLName" class="form-control" id="InputEmployeeLName"
                  placeholder="Employee Name">
                <label for="InputEmployeeName">Last Name</label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" name="InputEmployeeId" class="form-control" id="InputEmployeeId"
                  placeholder="Employee Id">
                <label for="InputEmployeeId">Employee Id</label>
              </div>
              <div class="form-floating mb-3">
                <select class="form-select" name="companyName" id="companyName"
                  aria-label="Floating label select example">
                  <option selected>Choose Here...</option>
                  <option value="Glory">Glory</option>
                  <option value="Maxim">Maxim</option>
                  <option value="Nippi">Nippi</option>
                  <option value="Powerlane">Powerlane</option>

                </select>
                <label for="floatingSelect">Company</label>
              </div>
              <div class="form-floating mb-3">
                <select class="form-select" name="department" id="department"
                  aria-label="Floating label select example">
                  <option selected>Choose Here...</option>
                  <option value="Admin">Admin</option>
                  <option value="Accounting">Accounting</option>
                  <option value="Japanese">Japanese</option>
                  <option value="Parts Inspection">Parts Inspection</option>
                  <option value="Parts Production">Parts Production</option>
                  <option value="PPIC">PPIC</option>
                  <option value="PPIC-Warehouse">PPIC-Warehouse</option>
                  <option value="Production 1">Production 1</option>
                  <option value="Production 2">Production 2</option>
                  <option value="Production Support">Production Support</option>
                  <option value="Purchasing">Purchasing</option>
                  <option value="Quality Assurance">Quality Assurance</option>
                  <option value="Quality Control">Quality Control</option>
                  <option value="System Kaizen">System Kaizen</option>

                </select>
                <label for="floatingSelect">Department</label>
              </div>
              
              <div class="form-floating mb-3">
              <select class="form-select" name="lineselect2" id="lineselect2">
              <option data-val="one" selected disabled>Select a line</option>

  <?php           if(is_array($fetchDataLine2)){      
                                 
                                 foreach($fetchDataLine2 as $data){
                                   $machineName = $data['line_name'];
                                   $machineDesc = $data['line_desc'];
                                   $machineLoc = $data['line_location'];
                                   $machineTimeAdded = $data['last_time_updated'];
                                   $machinePhoto = $data['line_photo'];
                                   $machineId = $data['line_id'];

                                 ?>
  <option value="<?php echo $machineId ; ?>"><?php echo $machineName ; ?></option>

  <?php 
            }}else{
              echo $fetchDataLine2;
            }
            
            ?>
  </select>
                <label for="floatingSelect">Line</label>
              </div>
              <div class="form-floating mb-3">
              <select class="form-select"  name="modelSelect2" id="machineSelect2">
              <option data-val="one" selected disabled>Select a model</option>
  <?php           if(is_array($fetchDataModelAll2)){      
                                 $sn=1;
                                 foreach($fetchDataModelAll2 as $data){
                                    $model_id = $data['model_id'];
                                    $id_model_line = $data['id_model_line'];

                                   $modelName = $data['model_name'];
                                   $JapanSTU = $data['japan_stu'];
                                   $gpiSTU = $data['gpi_stu'];
                                   $actualTime = $data['actual_time'];
 

                                 ?>
  <option value="<?php echo $modelName ; ?>" data-val="<?php echo $id_model_line ; ?>"><?php echo $modelName ; ?></option>

  <?php 
            }}else{
              echo $fetchDataModelAll2;
            }
            
            ?>
  </select>
                <label for="floatingSelect">Model</label>
              </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button ype="submit" name="addemployeeBtn" class="btn btn-primary" value="Upload">Add</button>
      </div>
      </form>

    </div>
  </div>
</div>
