
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
                                    $model_id = $data['model_id'];
                                   $modelName = $data['model_name'];
                                   $model_line = $data['model_line'];

                                   $JapanSTU = $data['japan_stu'];
                                   $gpiSTU = $data['gpi_stu'];
                                   $actualTime = $data['actual_time'];
                                    
                                   $selectEmployee = "SELECT * FROM `employees` WHERE `assign_line` = '$model_line'";
                                   $result = mysqli_query($con, $selectEmployee);
                                   $numrowspass = mysqli_num_rows($result);

                                 ?>
    <tr onclick="showFormAddForecast('<?php echo $model_id;?>', '<?php echo $modelName;?>','<?php echo $JapanSTU;?>','<?php echo $gpiSTU;?>','<?php echo $actualTime;?>','<?php echo $numrowspass;?>');">
        <td><?php echo $sn; ?></td>
        <td><?php echo $modelName; ?></td>
        <td><?php echo $JapanSTU; ?></td>
        <td><?php echo $gpiSTU; ?></td>
        <td><?php echo $actualTime; ?></td>
    </tr>
    <?php 
            $sn++; }}else{
                ?>
                 <tr>
        <td><?php echo $fetchDataModel; ?></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
   </tr> <?php
              
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
  
   