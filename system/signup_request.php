<?php
session_start();
include ("../connection.php");

include "./fetch_data.php";



if(!isset( $_SESSION['connected'])){
  header("location:../signin.php");
}
$db= $con;
date_default_timezone_set("Asia/Singapore");


if(isset($_POST['approveRequest'])){
 $requestorID = $_POST['requestorID'];

 $sqlupdateStatus = "UPDATE `users` SET`approved`=TRUE WHERE `account_ID` = '$requestorID';";
 mysqli_query($con, $sqlupdateStatus);
 header("location:signup_request.php");
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Signup Request</title>
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

    
       ?>
  <?php include "../nav.php";?>

 <div class="footer d-flex d-sm-none">this is a footer</div>
<?php include "../modals.php" ?>

<!-- sidebar  -->
<?php include "../sidebar.php" ?>
<?php include "../footer.php"?>
<div class="main-content p-5" id="mainContent">
  <div>
    <h2 class="fw-bolder text-dark ">Signup Request <?php echo  $_SESSION['showTable']; ?></h2>
<!-- <input type="date" id="birthdaytime" onchange="tex" name="birthdaytime"> -->

  <form action="sigup_request.php" method="POST">
    <table id="usersTable" class="table table-striped display nowrap" cellspacing="0" style="width:100%">
      <thead  class="thead-primary table-light" style="p1osition: sticky;top: -1px;">
        <tr id="topLeft" class=" table-bordered text-center" >
         
          <th>No.</th>
          <th>Full Name</th>
          <th>Department</th>
          <th>Status</th>
          <th>Action</th>

         


        </tr>
      </thead>
      <tbody class="" >
        <?php           
          if(is_array($fetchDataUsers)){      
            $sn=1;
            foreach($fetchDataUsers as $data){
              $account_ID = $data['account_ID'];

              $full_name = $data['full_name'];
              $department = $data['department'];
              $approved = $data['approved'];


              
        ?>
        <tr>
          <td><?php echo $sn; ?></td>
          <td><?php echo $full_name; ?></td>
          <td><?php echo $department; ?></td>
          <td><?php if($approved){echo "Approved";}else { echo "Pending";}  ?></td>
          <td>
          <?php if($approved){
            ?><button type="button" name="approveRequest" class="btn btn-outline-secondary btn-sm" disabled>Approve</button> <?php
          }else {
            ?> <button type="button" onclick="passRequest('<?php echo $account_ID; ?>', '<?php echo $full_name; ?>')"class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#confirmRequest">Approve</button> <?php
          }  ?></td>
        </tr>
        <?php 
          $sn++;  }}else{
              echo $fetchDataUsers;
            }
            ?>
      </tbody>
    </table>
  </form>
    
  </div>
        </div>
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
  forecastopt.classList.remove("active");
  var dashopt = document.getElementById("dashboardOpt");
  dashopt.classList.remove("active");
  var manpowerOpt = document.getElementById("manpowerOpt");
  manpowerOpt.classList.remove("active");

  var requestOpt = document.getElementById("requestOpt");
  requestOpt.classList.add("active");
  
  var forecastopt = document.getElementById("forecastButton2");
  forecastopt.classList.remove("active");
  var dashopt = document.getElementById("dashboardOpt2");
  dashopt.classList.remove("active");
  var manpowerOpt = document.getElementById("manpowerOpt2");
  manpowerOpt.classList.remove("active");

  var requestOpt = document.getElementById("requestOpt2");
  requestOpt.classList.add("active");

  
  var forecastopt3 = document.getElementById("footerForecast");
  forecastopt3.classList.remove("footerActive");
  var dashopt3 = document.getElementById("footerDashboard");
  dashopt3.classList.remove("footerActive");
  var manpowerOpt3 = document.getElementById("footerManpower");
  manpowerOpt3.classList.remove("footerActive");
  var requestOpt3 = document.getElementById("footerSignup");
  requestOpt3.classList.add("footerActive");
  document.getElementById("footerSignup").href = "#";

  document.getElementById("requestOpt").href = "#";
  document.getElementById("requestOpt2").href = "#";

</script>

<script>


  </script>

</body>
</html>