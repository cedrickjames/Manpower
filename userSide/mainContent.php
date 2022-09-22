
<?php

include ("../connection.php");
  $db= $con;




  $tableName="line";
 $columns= ['line_id', 'line_name','line_desc','line_location','last_time_updated','line_photo'];
 $fetchDataLine = fetch_data_line($db, $tableName, $columns, $username);


 function fetch_data_line($db, $tableName, $columns){
   if(empty($db)){
    $msg= "Database connection error";
   }elseif (empty($columns) || !is_array($columns)) {
    $msg="columns Name must be defined in an indexed array";
   }elseif(empty($tableName)){
     $msg= "Table Name is empty";
  }else{
  $columnName = implode(", ", $columns);
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







?>
<div class="main-content " id="mainContent">
  <div class="tab-content " id="v-pills-tabContent">
    <div class="tab-pane fade show active " id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab"
      tabindex="0">


      <div id="cardholder">
      <h2 class="fw-bolder text-dark ps-4">Line </h2>

      <div class="row row-cols-1 row-cols-md-4 g-4 " >
     <?php           if(is_array($fetchDataLine)){      
                                 
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


    </div>
    <div class="tab-pane " id="table-for-models" role="tabpanel" aria-labelledby="table-for-models-tab" tabindex="0">
      table
    </div>
    <div class="tab-pane " id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab" tabindex="0">
      <div class="row p-3 h-lg-25 bg-success balance-container ">
        this is a nice div

      </div>
    </div>
    <div class="tab-pane " id="v-pills-disabled" role="tabpanel" aria-labelledby="v-pills-disabled-tab" tabindex="0">2
    </div>
    <div class="tab-pane " id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab" tabindex="0">3
    </div>
    <div class="tab-pane " id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab" tabindex="0">4
    </div>
  </div>
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