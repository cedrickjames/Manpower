<!-- Modal -->
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
                <input type="number" name="jpn_stu" step="0.01" class="form-control" id="InputJPNSTU"
                  placeholder="Japan STU">
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
            
            
              <form action="userHomePage.php" method="POST">
              <div class="input-group mb-3"  id="year1">
              
              <input type="number" name="modal_year" class="form-control" id="InputYear" placeholder="Year "
                  value="<?php
                  if($_SESSION['chosenYearinWorkingDays']==""){
                    $year = new DateTime(); $year  = $year->format('Y'); echo $year; 
                  }
                  else{
                    echo $_SESSION['chosenYearinWorkingDays'];
                  }
                  ?>">    
      <button class="btn btn-outline-success" type="submit" name="changeYear" id="button-addon2">Submit</button>
     
    </div>
    </form>
    <form method="POST" action="../phpSubmit/addWorkingDays.php" name="workingDays" enctype="multipart/form-data" class="m-3">
        <div class="form-floating mb-3" id="year2" style="display: none">
                <input type="number" name="modal_year2" class="form-control" id="InputYear" placeholder="Line Name"
                  value="<?php// $year = new DateTime(); $year  = $year->format('Y'); echo $year; ?>">
                <label for="InputYearName">Year</label>
              </div>
              <table class="table table-striped table-hover" style="width:  100%" id="listOfModels"
                class="table datacust-datatable Table ">
                <thead class="thead-primary table-light" style="position: sticky;top: -1px;">

                
                  <tr  class=" table-bordered text-center">
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

                <tr  class=" table-bordered text-center">
                    <th style=""><?php echo $month ?></th>
                    <th style=""><input type="number" name="day<?php echo $idNumber; ?>" value="<?php echo $days;?>" disabled class="h-100 w-10 border border-primary border-opacity-25"></th>

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
        <button type="button"  class="btn btn-success" onclick="enableWorkingDaysEdit('border');">Edit</button>
        <button type="submit" name="addworkingDays" class="btn btn-primary" value="Upload">Add</button>
      </div>
      </form>

    </div>
  </div>
</div>
