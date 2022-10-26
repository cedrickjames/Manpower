
<div class="tab-pane p-2" id="v-pills-manpower" role="tabpanel" aria-labelledby="v-pills-manpower-tab" tabindex="0">

<div id="tableForManpower">
    
<h2 class="fw-bolder text-dark " >List of Manpower</h2> 
<div class="input-group mb-3">
  <label class="input-group-text" for="inputGroupSelect01">Filter Table</label>
  <select class="form-select" id="lineselect">
  <option selected disabled>Select a Line</option>

  <?php           if(is_array($fetchDataLine)){      
                                 
                                 foreach($fetchDataLine as $data){
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
              echo $fetchDataLine;
            }
            
            ?>
  </select>
  <select class="form-select form-select-lg " id="machineSelect" aria-label="Default select example" onchange="filterMachine()">
 
          <option data-val="one" selected disabled>Select a model</option>
  <?php           if(is_array($fetchDataModelAll)){      
                                 $sn=1;
                                 foreach($fetchDataModelAll as $data){
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
              echo $fetchDataModelAll;
            }
            
            ?>
</select>
<button class="btn btn-outline-glory" type="button" id="button-addon2" onclick="filterMachineAll()">All</button>
</div>
<div class="row row-cols-1 row-cols-md-4 g-1" >
 
<div class="row row-cols-1 w-100 row-cols-md-2 g-2" id="gbForecast" >
        <div class="col goback">


<!-- <div class="input-group">
  <span class="input-group-text">Filter table</span>
          <select class="form-select form-select-lg " id="lineselect" aria-label="Default select example">
  <option selected disabled>Select a line</option>
  <?php           if(is_array($fetchDataLine)){      
                                 
                                 foreach($fetchDataLine as $data){
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
              echo $fetchDataLine;
            }
            
            ?>
</select>
          <select class="form-select form-select-lg " id="machineSelect" aria-label="Default select example" onchange="filterMachine()">
 
          <option data-val="one" selected disabled>Select a machine</option>
  <?php           if(is_array($fetchDataModelAll)){      
                                 $sn=1;
                                 foreach($fetchDataModelAll as $data){
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
              echo $fetchDataModelAll;
            }
            
            ?>
</select>
<button class="btn btn-outline-glory" type="button" id="button-addon2" onchange="filterMachineAll()">All</button>
</div> -->
        </div>
        <!-- <div class=" searchInput col">
          <input type="search" class="form-control" id="filterbox" placeholder=" " onkeyup="getSelectValueDaily();">
        </div> -->
      </div>
<!-- <table class="table table-striped table-hover" style="width:  100%" id="listOfManpower" class="table datacust-datatable Table ">
                            <thead  class="thead-primary table-light" style="position: sticky;top: -1px;">
                               
                            
                            <tr id="topLeft" class=" table-bordered text-center" >
                                    <th style="min-width:15px;">No.</th>
                                    <th>Company</th>
                                    <th>Section</th>
                                    <th>Employee ID</th>
                                    <th>Name</th>
                                    <th>Gender</th>
                                    <th>Line</th>
                                    <th>Machine Asgmt.</th>
                                    <th>Department</th>
                                    <th>Status</th>
                                    <th>Action</th>




</tr>
</thead>
<tbody class="text-center" id="manpowerBody1">
<?php           if(is_array($fetchDataEmployees)){      
                                 $sn=1;
                                 foreach($fetchDataEmployees as $data){
                                    $name = $data['name'];
                                    $surname = $data['surname'];
                                    $emp_id = $data['emp_id'];
                                   $phone = $data['phone'];
                                   $company = $data['company'];
                                   $section = $data['section'];
                                   $gender = $data['gender'];
                                   $address = $data['address'];
                                   $machine_asgmt = $data['assign'];
                                   $line_asgmt = $data['assign_line'];

                                   $status = $data['status'];
                                   $email = $data['email'];
                                   $dept = $data['dept'];

                                 ?>
 <tr>
        <td><?php echo $sn; ?></td>
        <td><?php echo $company; ?></td>
        <td><?php echo $section; ?></td>
        <td><?php echo $emp_id; ?></td>
        <td><?php echo $surname.", ".$name; ?></td>
        <td><?php echo $gender; ?></td>
        <td><?php echo $line_asgmt; ?></td>
        <td><?php echo $machine_asgmt; ?></td>
        <td><?php echo $dept; ?></td>
        <td><?php echo $status; ?></td>
        <td>Action</td>


    </tr>

<?php 
          $sn++;  }}else{
              echo $fetchDataEmployees;
            }
            
            ?>


</tbody>
</table> -->

</div>

<table id="manpowerTable" class="table table-striped display nowrap" cellspacing="0" style="width:100%">
<thead  class="thead-primary table-light" style="position: sticky;top: -1px;">
                               
                            
                               <tr id="topLeft" class=" table-bordered text-center" >
                                       <th style="min-width:15px;">No.</th>
                                       <th>Name</th>
                                       <th>Employee ID</th>
                                       <th>Company</th>
                                       <th>Department</th>
                                       <th>Line</th>
                                       <th>Machine Asgmt.</th>
                                       <th>Status</th>
                                       <th>Action</th>
   
   
   
   
   </tr>
   </thead>
   <tbody class="" id="manpowerBody">
<?php           if(is_array($fetchDataEmployees)){      
                                 $sn=1;
                                 foreach($fetchDataEmployees as $data){
                                    $name = $data['name'];
                                    $surname = $data['surname'];
                                    $emp_id = $data['emp_id'];
                                   $phone = $data['phone'];
                                   $company = $data['company'];
                                   $section = $data['section'];
                                   $gender = $data['gender'];
                                   $address = $data['address'];
                                   $machine_asgmt = $data['assign'];
                                   $line_asgmt = $data['assign_line'];

                                   $status = $data['status'];
                                   $email = $data['email'];
                                   $dept = $data['dept'];

                                 ?>
 <tr>
        <td><?php echo $sn; ?></td>
        <td><?php echo $surname.", ".$name; ?></td>
        <td><?php echo $emp_id; ?></td>
        <td><?php echo $company; ?></td>
        <td><?php echo $dept; ?></td>
        <td><?php echo $line_asgmt; ?></td>
        <td><?php echo $machine_asgmt; ?></td>
        <td><?php echo $status; ?></td>
        <td>Action</td>


    </tr>

<?php 
          $sn++;  }}else{
              echo $fetchDataEmployees;
            }
            
            ?>


</tbody>
        <!-- <tfoot>
        <tr id="topLeft" class=" table-bordered text-center" >
                                       <th style="min-width:15px;">No.</th>
                                       <th>Company</th>
                                       <th>Section</th>
                                       <th>Employee ID</th>
                                       <th>Name</th>
                                       <th>Gender</th>
                                       <th>Line</th>
                                       <th>Machine Asgmt.</th>
                                       <th>Department</th>
                                       <th>Status</th>
                                       <th>Action</th>
   
   
   
   
   </tr>
        </tfoot> -->
    </table>

<form  clas="row g-3">

<div class="d-grid gap-2">
    <button class="btn btn-outline-success" name="addmodelBtn" id="addmodel" type="button" data-bs-toggle="modal" data-bs-target="#addEmployeeModal">Add an Employee</button>
</div>
</form>
</div>
  
</div>