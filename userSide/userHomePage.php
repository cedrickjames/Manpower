<?php
session_start();
include ("../connection.php");
$db= $con;
date_default_timezone_set("Asia/Singapore");
$year = new DateTime(); $year  = $year->format('Y'); 
$_SESSION['chosenYearinWorkingDays'] = $year;

if(isset($_POST['card'])){
  $_SESSION['lineId'] = $_POST["lineID"];
  $_SESSION['show'] = "true";
  $machineID = $_POST["lineID"];
  $selectLine = "SELECT * FROM `line` WHERE `line_id` = '$machineID'";
  $result = mysqli_query($con, $selectLine);
  
  while($userRow = mysqli_fetch_assoc($result)){
    $lineName = $userRow['line_name'];
    $_SESSION['lineId'] = $userRow['line_id'];
    $_SESSION['lineName'] = $userRow['line_name'];
    
    

// echo  $_SESSION['lineName'];
  header("location: list_of_models.php");
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
    <!-- <link rel="stylesheet" href="../node_modules/font-awesome/css/font-awesome.min.css"> -->
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    
    <link rel="stylesheet" href="../css/style.css?v=<?php echo time(); ?>">
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
      <link href="../sidebars.css" rel="stylesheet">
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
    $idModelLine= $_SESSION['lineId'];
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
  <nav class="navbar navbar-dark navbar-expand-sm shadow px-0 px-sm-3 sticky-top" style="background-color: #061362;">
    <div class="container-fluid px-3">
      <span class="navbar-brand me-4 	d-none d-lg-block " data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample" onclick="slideMainContent()">
        <i class="fa-solid fa-bars fa-sm"></i>
      </span>
      <span class="navbar-brand  mb-0 h1">Manpower</span>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ms-xl-5 ms-sm-0 mt-3 mt-sm-0">
          <li class="nav-item px-xl-2 ">
            <a class="nav-link active" aria-current="page" href="#">Products</a>
          </li>
          <li class="nav-item px-xl-2">
            <a class="nav-link " href="#"> Packages</a>
          </li>
          <li class="nav-item px-xl-2">
            <a class="nav-link " href="#"> Contact</a>
          </li>
          <li class="nav-item px-xl-2 dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            About Us
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
        </ul>
        <ul class="nav justify-content-end ml-0" style="width: 100%">
          <!-- <li class="nav-item mx-2 d-grid gap-2 d-none d-lg-flex">
          <button type="button" class="btn btn-success  fs-5 h-100 rounded-pill px-5 me-5 ">Invite
            <i class="fa-regular fa-envelope ps-2"></i>
          </button>
    </li> -->
          <li class="flex-row-reverse">
          <div class="pictureBadge m-0"></div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
<?php include "../modals.php" ?>

<!-- sidebar  -->
<?php include "../sidebar.php" ?>

<?php include "./mainContent.php" ?>

<!-- <script src="../node_modules/jquery/dist/jquery.slim.min.js"></script> -->

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" ></script> -->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" ></script> -->

    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js" ></script>
    <script src="../sidebars.js"></script> 
    <script src="../js/userHomePage.js"></script> 

<script>

</script>
</body>
</html>