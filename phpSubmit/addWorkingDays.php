<?php 
include ("../connection.php");
date_default_timezone_set("Asia/Singapore");

if (isset($_POST['addworkingDays'])){
    
$modal_year = $_POST['modal_year2'];

// $sqlinsertModel= "ALTER TABLE workingdays ADD `$modal_year` int(20);";
// mysqli_query($con, $sqlinsertModel);
$selectColumn = "SHOW COLUMNS FROM `workingdays` LIKE '$modal_year'";
$resultColumn = mysqli_query($con, $selectColumn);
$exists = (mysqli_num_rows($resultColumn))?TRUE:FALSE;
if(!$exists) {
$sqlinsertModel= "ALTER TABLE workingdays ADD `$modal_year` int(20);";
 mysqli_query($con, $sqlinsertModel);
}

for($i=1; $i<=12; $i++){
    $workingDaysValue = $_POST['day'.$i];
if($i==1){
    $sqlinsertModel= "UPDATE `workingdays` SET `$modal_year`='$workingDaysValue' WHERE `month` = 'January'";
    mysqli_query($con, $sqlinsertModel);
}
else if($i==2){
    $sqlinsertModel= "UPDATE `workingdays` SET `$modal_year`='$workingDaysValue' WHERE `month` = 'February'";
    mysqli_query($con, $sqlinsertModel);
}
else if($i==3){
    $sqlinsertModel= "UPDATE `workingdays` SET `$modal_year`='$workingDaysValue' WHERE `month` = 'March'";
    mysqli_query($con, $sqlinsertModel);
}

else if($i==4){
    $sqlinsertModel= "UPDATE `workingdays` SET `$modal_year`='$workingDaysValue' WHERE `month` = 'April'";
mysqli_query($con, $sqlinsertModel);

}    
else if($i==5){
    $sqlinsertModel= "UPDATE `workingdays` SET `$modal_year`='$workingDaysValue' WHERE `month` = 'May'";
    mysqli_query($con, $sqlinsertModel);
}
else if($i==6){
    $sqlinsertModel= "UPDATE `workingdays` SET `$modal_year`='$workingDaysValue' WHERE `month` = 'June'";
    mysqli_query($con, $sqlinsertModel);
}
else if($i==7){
    $sqlinsertModel= "UPDATE `workingdays` SET `$modal_year`='$workingDaysValue' WHERE `month` = 'July'";
    mysqli_query($con, $sqlinsertModel);
}
else if($i==8){
    $sqlinsertModel= "UPDATE `workingdays` SET `$modal_year`='$workingDaysValue' WHERE `month` = 'August'";
    mysqli_query($con, $sqlinsertModel);
}
else if($i==9){
    $sqlinsertModel= "UPDATE `workingdays` SET `$modal_year`='$workingDaysValue' WHERE `month` = 'September'";
    mysqli_query($con, $sqlinsertModel);
}
else if($i==10){
    $sqlinsertModel= "UPDATE `workingdays` SET `$modal_year`='$workingDaysValue' WHERE `month` = 'October'";
    mysqli_query($con, $sqlinsertModel);
}
else if($i==11){
    $sqlinsertModel= "UPDATE `workingdays` SET `$modal_year`='$workingDaysValue' WHERE `month` = 'November'";
    mysqli_query($con, $sqlinsertModel);
}
else if($i==12){
    $sqlinsertModel= "UPDATE `workingdays` SET `$modal_year`='$workingDaysValue' WHERE `month` = 'December'";
    mysqli_query($con, $sqlinsertModel);
}

 

    // echo 'day'.$i;
}
// header("Location: ../system/list_of_models.php");
$location = $_SESSION['location'];
if($location == "list_of_models"){
    header("Location: ../system/list_of_models.php");
}
else{
    header("Location: ../system/userHomePage.php");

}


}

?>