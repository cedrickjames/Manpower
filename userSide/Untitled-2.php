
<?php

include ("../connection.php");
  $db= $con;

$idModelLine= $_SESSION['lineId']
  $tableName="line";
 $columns= ['model_id', 'model_name','model_line','id_model_line','japan_stu','gpi_stu', 'actual_time'];
 $fetchDataModel = fetch_data_line($db, $tableName, $columns, $username);


 function fetch_data_model($db, $tableName, $columns){
   if(empty($db)){
    $msg= "Database connection error";
   }elseif (empty($columns) || !is_array($columns)) {
    $msg="columns Name must be defined in an indexed array";
   }elseif(empty($tableName)){
     $msg= "Table Name is empty";
  }else{
  $columnName = implode(", ", $columns);
  $query = "SELECT * FROM `model` WHERE `id_model_line` = $idModelLine";
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

<div id="tableForModel">
<div class="row row-cols-1 row-cols-md-4 g-1" >

<h2 class="fw-bolder text-dark ps-4" id="nameOfLine"><?php echo  $_SESSION['lineName']; ?></h2> 
<input type="text" id="idOfLine" name="idOfLine" class="d-none" >    

<table class="table table-striped table-hover" style="width:  100%" id="listOfModels" class="table datacust-datatable Table ">
                            <thead  class="thead-primary table-light" style="position: sticky;top: -1px;">
                               
                            
                            <tr id="topLeft" class=" table-bordered text-center" >
                                    <th style="min-width:15px;">No.</th>
                                    <th style="width:200px;">Name</th>
                                    <th style="width:200px;">Japan STU</th>
                                    <th style="min-width:40px;">GPI STU</th>
                                    <th style="min-width:50px;">Actual Time</th>
</tr>
</thead>
<tbody class="text-center" id="modelsBody">
<?php           if(is_array($fetchDataModel)){      
                                 $sn=1;
                                 foreach($fetchDataModel as $data){
                                   $modelName = $data['model_name'];
                                   $JapanSTU = $data['japan_stu'];
                                   $gpiSTU = $data['gpi_stu'];
                                   $actualTime = $data['actual_time'];
 

                                 ?>
    <tr onclick="showForecast();">
        <td><?php echo $sn ?></td>
        <td><?php echo $modelName ?></td>
        <td><?php echo $JapanSTU ?></td>
        <td><?php echo $gpiSTU ?></td>
        <td><?php echo $actualTime ?></td>
    </tr>
    <?php 
            $sn++; }}else{
              echo $fetchDataModel;
            }
            
            ?>
</tbody>
</table>

</div>
<form  clas="row g-3">

<div class="d-grid gap-2">
    <button class="btn btn-outline-success" name="addmodelBtn" id="addmodel" type="button" data-bs-toggle="modal" data-bs-target="#addModelModal">Add a model</button>
</div>
</form>
</div>
  
   