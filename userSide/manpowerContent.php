<?php
include ("../connection.php");
$db= $con;

include "./fetch_data.php";

?>
<div class="main-content " id="mainContent">
  <div class="tab-content " id="v-pills-tabContent">
    <div class="tab-pane fade show active " id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab"
      tabindex="0">

     

<?php 
  include "./list_of_manpower.php";

  include "./addforecast.php";

?>

    </div>
    <div class="tab-pane " id="table-for-models" role="tabpanel" aria-labelledby="table-for-models-tab" tabindex="0">
      table
    </div>
    <div class="tab-pane " id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab" tabindex="0">
      <div class="row p-3 h-lg-25 bg-success balance-container ">
        this is a nice div

      </div>
    </div>
    <?php include "./list_of_manpower.php" ;?>
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