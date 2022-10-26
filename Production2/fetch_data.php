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
  $query = "SELECT * FROM `line` WHERE `Department` ='Production2'";
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



  $tableNameModelAll="model";
  $columnsModelAll= ['model_id', 'model_name','model_line','id_model_line','japan_stu','gpi_stu', 'actual_time'];
  $fetchDataModelAll = fetch_data_model_All($db, $tableNameModelAll, $columnsModelAll);
  
  
  function fetch_data_model_All($db, $tableNameModelAll, $columnsModelAll){
   if(empty($db)){
    $msg= "Database connection error";
   }elseif (empty($columnsModelAll) || !is_array($columnsModelAll)) {
    $msg="columns Name must be defined in an indexed array";
   }elseif(empty($tableNameModelAll)){
     $msg= "Table Name is empty";
  }else{
  $columnName = implode(", ", $columnsModelAll);
  // $query = "SELECT * FROM `model`;";
//   $idModelLine= $_SESSION['lineId'];
  $query = "SELECT * FROM `model`  WHERE `Department` ='Production2';";
  
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




  
$tableNameModel="model";
$columnsModel= ['model_id', 'model_name','model_line','id_model_line','japan_stu','gpi_stu', 'actual_time'];
$fetchDataModel = fetch_data_model($db, $tableNameModel, $columnsModel);


function fetch_data_model($db, $tableNameModel, $columnsModel){
 if(empty($db)){
  $msg= "Database connection error";
 }elseif (empty($columnsModel) || !is_array($columnsModel)) {
  $msg="columns Name must be defined in an indexed array";
 }elseif(empty($tableNameModel)){
   $msg= "Table Name is empty";
}else{
$columnName = implode(", ", $columnsModel);
// $query = "SELECT * FROM `model`;";
if($_SESSION['lineId']==""){
   $idModelLine="";
}
else{
   $idModelLine= $_SESSION['lineId'];

}
$query = "SELECT * FROM `model` WHERE `id_model_line` = '$idModelLine';";

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





$tableEmployees="employees";
$columnEmployees= ['id', 'emp_id','name','surname','phone','email', 'gender', 'address', 'address', 'municipality', 'dept', 'section', 'company', 'assign','status'];
$fetchDataEmployees = fetch_data_employees($db, $tableNameModel, $columnEmployees);


function fetch_data_employees($db, $tableEmployees, $columnEmployees){
 if(empty($db)){
  $msg= "Database connection error";
 }elseif (empty($columnEmployees) || !is_array($columnEmployees)) {
  $msg="columns Name must be defined in an indexed array";
 }elseif(empty($tableEmployees)){
   $msg= "Table Name is empty";
}else{
$columnName = implode(", ", $columnEmployees);
// $query = "SELECT * FROM `model`;";
// $idModelLine= $_SESSION['lineId'];
$query = "SELECT * FROM `employees`  WHERE `dept` ='Production2';";

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






$tableForecast="forecast";
$columnForecast= ['forecast_Id', 'year', 'month', 'line', 'model', 'projection_Qty', 'actual_time', 'total_gpi_target', 'total_actual', 'forecast_actual', 'mp_forecast_gpi_target', 'total_manpower_needed'];
$fetchDataForecast = fetch_data_Forecast($db, $tableNameModel, $columnForecast);


function fetch_data_forecast($db, $tableForecast, $columnForecast){
 if(empty($db)){
  $msg= "Database connection error";
 }elseif (empty($columnForecast) || !is_array($columnForecast)) {
  $msg="columns Name must be defined in an indexed array";
 }elseif(empty($tableForecast)){
   $msg= "Table Name is empty";
}else{
$columnName = implode(", ", $columnForecast);
// $query = "SELECT * FROM `model`;";
// $idModelLine= $_SESSION['lineId'];
$query = "SELECT * FROM `forecast` WHERE `Department` = 'Production2';";

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




