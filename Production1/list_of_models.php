<?php
session_start();
include ("../connection.php");
$db= $con;
//  echo $_SESSION['show'] . "asdse";




$monthArray = array();
    $yearArray = array();
    $daysArray = array();
    $January = array();
    $February = array();
    $March = array();
    $April = array();
    $May = array();
    $June = array();
    $July = array();
    $August = array();
    $September = array();
    $October = array();
    $November = array();
    $December = array();

    $queryWorkingDays = "SHOW COLUMNS FROM `workingdays` where FIELD != 'id' AND FIELD !='month'AND FIELD !='year'AND FIELD !='working_days';";
    $resultWorkingDays = mysqli_query($con, $queryWorkingDays);
    while($rowDays = mysqli_fetch_assoc($resultWorkingDays)){
        // array_push($monthArray, $rowDays['month']);
        array_push($yearArray, $rowDays['Field']);
        // array_push($daysArray, $rowDays['no_days']);
    }
    $arrlength = count($yearArray);

    
    $queryAllWorkingDays = "SELECT * FROM `workingdays`";
    $resultWorkingDaysAll = mysqli_query($con, $queryAllWorkingDays);
    while($rowDaysAll = mysqli_fetch_assoc($resultWorkingDaysAll)){
      $month = $rowDaysAll['month'];
if($month =="January"){
  for($i=0; $i<$arrlength; $i++){
    // echo $yearArray[$i];
     array_push($January, $rowDaysAll[''.$yearArray[$i].'']);
  }
}
else if($month =="February"){
  for($i=0; $i<$arrlength; $i++){
    // echo $yearArray[$i];
     array_push($February, $rowDaysAll[''.$yearArray[$i].'']);
  }
}
else if($month =="March"){
  for($i=0; $i<$arrlength; $i++){
    // echo $yearArray[$i];
     array_push($March, $rowDaysAll[''.$yearArray[$i].'']);
  }
}
else if($month =="April"){
  for($i=0; $i<$arrlength; $i++){
    // echo $yearArray[$i];
     array_push($April, $rowDaysAll[''.$yearArray[$i].'']);
  }
}
else if($month =="May"){
  for($i=0; $i<$arrlength; $i++){
    // echo $yearArray[$i];
     array_push($May, $rowDaysAll[''.$yearArray[$i].'']);
  }
}
else if($month =="June"){
  for($i=0; $i<$arrlength; $i++){
    // echo $yearArray[$i];
     array_push($June, $rowDaysAll[''.$yearArray[$i].'']);
  }
}
else if($month =="July"){
  for($i=0; $i<$arrlength; $i++){
    // echo $yearArray[$i];
     array_push($July, $rowDaysAll[''.$yearArray[$i].'']);
  }
}
else if($month =="August"){
  for($i=0; $i<$arrlength; $i++){
    // echo $yearArray[$i];
     array_push($August, $rowDaysAll[''.$yearArray[$i].'']);
  }
}
else if($month =="September"){
  for($i=0; $i<$arrlength; $i++){
    // echo $yearArray[$i];
     array_push($September, $rowDaysAll[''.$yearArray[$i].'']);
  }
}
else if($month =="October"){
  for($i=0; $i<$arrlength; $i++){
    // echo $yearArray[$i];
     array_push($October, $rowDaysAll[''.$yearArray[$i].'']);
  }
}
else if($month =="November"){
  for($i=0; $i<$arrlength; $i++){
    // echo $yearArray[$i];
     array_push($November, $rowDaysAll[''.$yearArray[$i].'']);
  }
}
else if($month =="December"){
  for($i=0; $i<$arrlength; $i++){
    // echo $yearArray[$i];
     array_push($December, $rowDaysAll[''.$yearArray[$i].'']);
  }
}
    }

  




?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home Page</title>
    <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="../node_modules/fontawesome-free-6.2.0-web/css/all.min.css">
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <!-- <link rel="stylesheet" href="./node_modules/font-awesome/css/font-awesome.min.css"> -->

    
    <link rel="stylesheet" href="../css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" type="text/css" href="../node_modules/DataTables/datatables.min.css"/>
<link rel="stylesheet" type="text/css" href="../node_modules/DataTables/Responsive-2.3.0/css/responsive.dataTables.min.css"/>

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
  
    
      }
    </style>
      <link href="./sidebars.css" rel="stylesheet">
</head>
  <body>
  <?php
    

    date_default_timezone_set("Asia/Singapore");
    
    if (isset($_POST['changeYear'])){
        $year =  $_POST['modal_year'];
        // echo "<script>console.log('$year'); </script>";
    $_SESSION['chosenYearinWorkingDays'] = $year;
    $years =  $_SESSION['chosenYearinWorkingDays'];
    
    // echo "<script>console.log('$years'); </script>";
    // echo $_SESSION['chosenYearinWorkingDays'];
    echo"<script> $(document).ready(function() {
      $('#updateWorkingDaysModal').modal('show');
    }); </script> " ;
    }
    
    
    $tableNameWD="workingdays";
    $chosenYear = $_SESSION['chosenYearinWorkingDays'];
    $columnsWD= ['id', 'month','workingdays',$chosenYear];
    $fetchDataWD = fetch_data_WD($db, $tableNameWD, $columnsWD);
    
    
    function fetch_data_WD($db, $tableNameWD, $columnsWD){
      // $chosenYear = $_SESSION['chosenYearinWorkingDays'];
      if($_SESSION['chosenYearinWorkingDays']==""){
        $year = new DateTime(); 
        $year  = $year->format('Y'); 
        $chosenYear = $year;
      }
      else{
        $chosenYear = $_SESSION['chosenYearinWorkingDays'];
      }
      
     if(empty($db)){
      $msg= "Database connection error";
     }elseif (empty($columnsWD) || !is_array($columnsWD)) {
      $msg="columns Name must be defined in an indexed array";
     }elseif(empty($tableNameWD)){
       $msg= "Table Name is empty";
    }else{
    $columnName = implode(", ", $columnsWD);
    // $query = "SELECT * FROM `model`;";
    $query = "SELECT `month`,`$chosenYear` FROM `workingdays`";
    
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
    <?php include "../nav.php";?>

<?php include "../modals.php" ?>

<!-- sidebar  -->
<?php include "../sidebar.php" ?>

<?php include "./listOfModelsContent.php" ?>

<!-- <script src="./node_modules/jquery/dist/jquery.slim.min.js"></script> -->
<script src="../node_modules/jquery/dist/jquery.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" ></script> -->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" ></script> -->

    <script type="text/javascript" src="./node_modules/DataTables/datatables.min.js"></script>
    <script type="text/javascript" src="./node_modules/DataTables/Responsive-2.3.0/js/dataTables.responsive.min.js"></script>

    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js" ></script>
    <script src="../sidebars.js"></script> 
    <script src="../js/userHomePage.js"></script> 
<script>
                var yearArray = <?php echo json_encode($yearArray); ?>;

                var January = <?php echo json_encode($January); ?>;
                var February = <?php echo json_encode($February); ?>;
                var March = <?php echo json_encode($March); ?>;
                var April = <?php echo json_encode($April); ?>;
                var May = <?php echo json_encode($May); ?>;
                var June = <?php echo json_encode($June); ?>;
                var July = <?php echo json_encode($July); ?>;
                var August = <?php echo json_encode($August); ?>;
                var September = <?php echo json_encode($September); ?>;
                var October = <?php echo json_encode($October); ?>;
                var November = <?php echo json_encode($November); ?>;
                var December = <?php echo json_encode($December); ?>;

                var arrayLengthYear = yearArray.length;

  function chooseWorkingDays(){
    var chosenMonth = document.getElementById("inputMonth").value;
    var chosenYear = document.getElementById("chosenYearForecast").value;

    for(var i = 0; i < arrayLengthYear; i++){
  // console.log(chosenMonth);
      if(chosenYear == yearArray[i]){
        console.log(i);
        console.log(chosenMonth);
        if(chosenMonth == "January"){
           theday = January[i];
          console.log(theday);
          document.getElementById("inputdaysOfWork").value=theday;
        }
        else if(chosenMonth == "February"){
           theday = February[i];
          console.log(theday);
          document.getElementById("inputdaysOfWork").value=theday;
        }
        else if(chosenMonth == "March"){
           theday = March[i];
          console.log(theday);
          document.getElementById("inputdaysOfWork").value=theday;
        }
        else if(chosenMonth == "April"){
           theday = April[i];
          console.log(theday);
          document.getElementById("inputdaysOfWork").value=theday;
        }
        else if(chosenMonth == "May"){
           theday = May[i];
          console.log(theday);
          document.getElementById("inputdaysOfWork").value=theday;
        }
        else if(chosenMonth == "June"){
           theday = June[i];
          console.log(theday);
          document.getElementById("inputdaysOfWork").value=theday;
        }
        else if(chosenMonth == "July"){
           theday = July[i];
          console.log(theday);
          document.getElementById("inputdaysOfWork").value=theday;
        }
        else if(chosenMonth == "August"){
           theday = August[i];
          console.log(theday);
          document.getElementById("inputdaysOfWork").value=theday;
        }
        else if(chosenMonth == "September"){
           theday = September[i];
          console.log(theday);
          document.getElementById("inputdaysOfWork").value=theday;
        }
        else if(chosenMonth == "October"){
           theday = October[i];
          console.log(theday);
          document.getElementById("inputdaysOfWork").value=theday;
        }
        else if(chosenMonth == "November"){
           theday = November[i];
          console.log(theday);
          document.getElementById("inputdaysOfWork").value=theday;
        }
        else if(chosenMonth == "December"){
           theday = December[i];
          console.log(theday);
          document.getElementById("inputdaysOfWork").value=theday;
        }
       

      }
        }


  }

</script>
</body>
</html>