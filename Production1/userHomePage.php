<?php
session_start();
include ("../connection.php");

if(!isset( $_SESSION['connected'])){
  header("location:../signin.php");
}
$db= $con;
date_default_timezone_set("Asia/Singapore");
$year = new DateTime(); $year  = $year->format('Y'); 
$_SESSION['chosenYearinWorkingDays'] = $year;
$_SESSION['location']="userHomePage";

$_SESSION['lineId'] = "";
$_SESSION['showTable'] = "";
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
  $_SESSION['location']="list_of_models";
  }
}
if(isset($_POST['addForecastBtn'])){
  $_SESSION['showTable'] = "d-none";
  // echo "<script> console.log('skdj') ;showAddForecast();</script>";
}
if(isset($_POST['goBack'])){

  $_SESSION['showTable'] = "d-none";
  // header("location: userHomePage.php");
  // echo "<script> console.log('skdj') ;showAddForecast();</script>";
}

if (isset($_POST['sbtChoose'])){
  $_SESSION['type'] = $_POST['type'] ; 
  $_SESSION['year'] = $_POST['year'] ;
  $_SESSION['month']  = $_POST['month']; 
  $_SESSION['showTable'] = "d-none";
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
    <!-- <link rel="stylesheet" type="text/css" href="../node_modules/datatables.net-bs5/css/dataTables.bootstrap5.css"> -->
    <link rel="stylesheet" type="text/css" href="../node_modules/DataTables/datatables.min.css"/>
    <link rel="stylesheet" type="text/css" href="../node_modules/DataTables/Responsive-2.3.0/css/responsive.dataTables.min.css"/>
    <script src="../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="../node_modules/sweetalert2/dist/sweetalert2.min.css">
<!-- <script type="text/javascript" charset="utf8" src="../node_modules/datatables.net-bs5/js/dataTables.bootstrap5.js"></script> -->




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
      <span class="navbar-brand me-4 	d-block d-lg-none " data-bs-toggle="offcanvas" href="#offcanvasExample2" role="button" aria-controls="offcanvasExample">
      <i class="fa-solid fa-bars fa-sm"></i>
</span>
      <span class="navbar-brand  mb-0 h1">Manpower</span>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ms-xl-5 ms-sm-0 mt-3 mt-sm-0 w-100">
          <li class="nav-item px-xl-2 ">
            <a class="nav-link active" aria-current="page" href="#">Production 1</a>
          </li>
          <li class="nav-item px-xl-2">
            <a class="nav-link " href="../Production2/userHomePage.php"> Production 2</a>
          </li>
          <li class="nav-item px-xl-2">
            <a class="nav-link " href="#"> Quality Control</a>
          </li>

        </ul>
        <ul class="nav justify-content-end ml-0" style="width: 100%">
          <!-- <li class="nav-item mx-2 d-grid gap-2 d-none d-lg-flex">
          <button type="button" class="btn btn-success  fs-5 h-100 rounded-pill px-5 me-5 ">Invite
            <i class="fa-regular fa-envelope ps-2"></i>
          </button>
    </li> -->
          <li class="flex-row-reverse" onclick="showSulok()">
          <div class="pictureBadge m-0"></div>
          </li>
        </ul>
        <div class="w-15 h-15 bg-success"> </div>
      </div>
    </div>
    
  </nav>


 <div class="sulok d-none" id="sulok">
 <div class="container text-center h-100 div-sulok">
  <div class="row row-cols-1 row-sulok p-3">
    <div class="col-5"> <div class="pictureBadgeSulok m-0"></div></div>
    <div class="col-7">
      <div class="row">
        <div class="col-12 p-0 fw-semibold fs-4"><h4 class="sulok-name"><?php echo $_SESSION['full_name']  ?></h4></div>
        <div class="col-12 p-0">mis.dev@glory.com.ph</div>

      </div>
    </div>

  </div>
  <div class="row row-cols-1 row-sulok signout ">
    <div class="col-12 "><a href="../logout.php" class="hrefsignout">Signout</a></div>
  </div> 

</div>
 </div>

 <div class="footer d-flex d-sm-none">this is a footer</div>
<?php include "../modals.php" ?>

<!-- sidebar  -->
<?php include "../sidebar.php" ?>

<?php include "./mainContent.php" ?>

<!-- <script src="../node_modules/jquery/dist/jquery.slim.min.js"></script> -->
<!-- <script src="../node_modules/jquery/dist/jquery.min.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" ></script> -->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" ></script> -->


    <script type="text/javascript" src="../node_modules/DataTables/datatables.min.js"></script>
    <script type="text/javascript" src="../node_modules/DataTables/Responsive-2.3.0/js/dataTables.responsive.min.js"></script>

    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js" ></script>
    <script src="../sidebars.js"></script> 
    <script src="../js/userHomePage.js"></script> 

<script>
  var forecastopt = document.getElementById("forecastButton");
  forecastopt.classList.add("active");
  var dashopt = document.getElementById("dashboardOpt");
  dashopt.classList.remove("active");
  var manpowerOpt = document.getElementById("manpowerOpt");
  manpowerOpt.classList.remove("active");
  var profileOpt = document.getElementById("profileOpt");
  profileOpt.classList.remove("active");

  var forecastopt = document.getElementById("forecastButton2");
  forecastopt.classList.add("active");
  var dashopt = document.getElementById("dashboardOpt2");
  dashopt.classList.remove("active");
  var manpowerOpt = document.getElementById("manpowerOpt2");
  manpowerOpt.classList.remove("active");
  var profileOpt = document.getElementById("profileOpt2");
  profileOpt.classList.remove("active");

  document.getElementById("forecastButton").href = "#";
  document.getElementById("forecastButton2").href = "#";

</script>

<script>



function testDate(){
 var chosendate =  document.getElementById("start").value;
 const asf = new Date(chosendate);
 asf.setDate(asf.getDate() + 3);
 var setdatea = asf.getFullYear()+"-"+monthNumber+"-"+asf.getDate();
 document.getElementById("end").value = setdatea;

 console.log("asdasd: "+asf)
//  console.log(chosendate)
const x = new Date();


const y = new Date(chosendate);

if(x<y){
console.log("Correct");
// console.log(x)
}
else{
  alert("false")
  const z = new Date();
var monthNumber = new Date().getMonth()+1
z.setDate(z.getDate() + 1);
  console.log(z);
  var setdate = z.getFullYear()+"-"+monthNumber+"-"+z.getDate();
 document.getElementById("birthdaytime").value = setdate;
 console.log(setdate)
}
}
  </script>
</body>
</html>