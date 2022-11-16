<?php
session_start();
include ("../connection.php");




$samplearray = array();
array_push($samplearray, ['a','b','c','d','e','f','g','h','i','j']);
array_push($samplearray, ['a','b','c','d','e','f','g','h','i','j']);
array_push($samplearray, ['a','b','c','d','e','f','g','h','i','j']);


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
    
    
$account_ID = $_SESSION['account_ID'];
if (isset($_POST['editProfile']) && $_POST['editProfile'] == 'Upload'){
  if (isset($_FILES['changeprofile']) && $_FILES['changeprofile']['error'] === UPLOAD_ERR_OK)
  {
    // get details of the uploaded file
    $fileTmpPath = $_FILES['changeprofile']['tmp_name'];
    $fileName = $_FILES['changeprofile']['name'];
    $fileSize = $_FILES['changeprofile']['size'];
    $fileType = $_FILES['changeprofile']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));

    // sanitize file-name
    $newFileName = md5(time() . $fileName) . '.' . $fileExtension;

    // check if file has one of the following extensions
    $allowedfileExtensions = array('jpg', 'gif', 'png', 'JPEG', 'img');

    if (in_array($fileExtension, $allowedfileExtensions))
    {
      // directory in which the uploaded file will be moved
      $uploadFileDir = '../uploaded_files/profile_pictures';
      $dest_path = $uploadFileDir . $newFileName;

      if(move_uploaded_file($fileTmpPath, $dest_path)) 
      {
        $message ='File is successfully uploaded.';
      }
      else 
      {
        $message = 'There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.';
      }
    }
    else
    {
      $message = 'Upload failed. Allowed file types: ' . implode(',', $allowedfileExtensions);
    }
  }
  else
  {
    $message = 'There is some error in the file upload. Please check the following error.<br>';
    $message .= 'Error:' . $_FILES['uploadedFile']['error'];
  }

    
    $destinationPath=$dest_path;


          $sqlupdateDP = "UPDATE `users` SET `profile_picture`='$destinationPath' WHERE `account_ID` = '$account_ID'";
          $updateDPSql = mysqli_query($con, $sqlupdateDP);
      if($updateDPSql){
        ?><script>
        Swal.fire({
      icon: 'success',
      title: 'Success',
      text: 'You have successfully update your profile picture.',
    //   footer: '<a href="">Why do I have this issue?</a>'
    }).then(function() {
  window.location = "userHomePage.php";
  });
     </script><?php 
     $_SESSION['profile_picture'] = $destinationPath;
      }
      else{
        ?><script>
        Swal.fire({
      icon: 'error',
      title: 'Unsuccessful',
      text: 'Update Failed.',
    //   footer: '<a href="">Why do I have this issue?</a>'
    }).then(function() {
  window.location = "userHomePage.php";
  });
     </script><?php 
       }
}

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

 <div class="footer d-flex d-sm-none">this is a footer</div>
<?php include "../modals.php" ?>

<!-- sidebar  -->
<?php include "../sidebar.php" ?>

<?php include "./mainContent.php" ?>


<!-- <script src="../node_modules/jquery/dist/jquery.slim.min.js"></script> -->
<!-- <script src="../node_modules/jquery/dist/jquery.min.js"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
  var requestOpt = document.getElementById("requestOpt");
  requestOpt.classList.remove("active");

  var forecastopt = document.getElementById("forecastButton2");
  forecastopt.classList.add("active");
  var dashopt = document.getElementById("dashboardOpt2");
  dashopt.classList.remove("active");
  var manpowerOpt = document.getElementById("manpowerOpt2");
  manpowerOpt.classList.remove("active");
  var requestOpt = document.getElementById("requestOpt2");
  requestOpt.classList.remove("active");

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

<script>
    //  var samplearray = <?php echo json_encode($samplearray); ?>;
  

    // csvContent = "data:text/csv;charset=utf-8,";
    //                 /* add the column delimiter as comma(,) and each row splitted by new line character (\n) */
    //                 samplearray.forEach(function(rowArray){
    //                    row = rowArray.join(",");
    //                    csvContent += row + "\r\n";
    //                });
             
    //                /* create a hidden <a> DOM node and set its download attribute */
    //                var encodedUri = encodeURI(csvContent);
    //                var link = document.createElement("a");
    //                link.setAttribute("href", encodedUri);
    //                link.setAttribute("download", "Failed EUC.csv");
    //                document.body.appendChild(link);
    //                 /* download the data file named 'Stock_Price_Report.csv' */
    //                link.click();
 
</script>
</body>
</html>