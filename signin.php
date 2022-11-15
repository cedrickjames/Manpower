
<?php

session_start();
  include ("./connection.php");
  if(isset( $_SESSION['connected'])){

header("location: system/userHomePage.php");

  }

  ?>
<!doctype html>
<html>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Sign in</title>
    <link href="./node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="./node_modules/fontawesome-free-6.2.0-web/css/all.min.css">
   
        
    <link rel="stylesheet" href="./css/style.css?v=<?php echo time(); ?>">
    <!-- <link rel="stylesheet" type="text/css" href="../node_modules/datatables.net-bs5/css/dataTables.bootstrap5.css"> -->
    <script src="./node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="./node_modules/sweetalert2/dist/sweetalert2.min.css">

    <script type='text/javascript' src=''></script>
    <!-- <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js'></script> -->
  

    </script>
</head>
<body style="height: 100vh;">
<?php 

if(isset($_POST['sbtlogin'])){
    
    $username = $_POST['userId'];
    $password = $_POST['password'];

    // $sql1 = "Select * FROM users WHERE username='$username' AND userpass='$password'";
    $sql1 = "Select * FROM `users` WHERE `user_id`='$username'";

    $result = mysqli_query($con, $sql1);
    $numrows = mysqli_num_rows($result);

    $selectUserDept= "SELECT * FROM `users` WHERE `user_id` = '$username' LIMIT 1";
    $resultDept = mysqli_query($con, $selectUserDept);
    
    while($userRow = mysqli_fetch_assoc($resultDept)){

      $userDept = $userRow['department'];
      $approved = $userRow['approved'];

$_SESSION['userDept'] =  $userDept; 

      
  }

    if ($numrows == 0 ){
        $_SESSION['loginError'] = true;
        $userName = $_POST['userId']
        ?><script>
            Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'This user does not exist!',
        //   footer: '<a href="">Why do I have this issue?</a>'
        })
         </script><?php 
    }
    else{

        $sqlpass = "Select * FROM users WHERE user_id = '$username' AND `user_password` = '$password';";
        $resultpass = mysqli_query($con, $sqlpass);
        $numrowspass = mysqli_num_rows($resultpass);
if($numrowspass == 0){
    ?><script>
    Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Wrong password',
//   footer: '<a href="">Why do I have this issue?</a>'
})
 </script><?php 
}
else{
  if($approved){
    $date = new DateTime();
    $year  = $date->format('Y'); 
    $month  = $date->format('F'); 
          $_SESSION['connected'] = 'TRUE';  
          $_SESSION['username'] = $username;
          $_SESSION['type'] = 'machine';
          $_SESSION['year'] = $year;
          $_SESSION['month'] = $month;
  
  
  
          // $userlevel = "SELECT userlevel FROM users WHERE username='$username'";
      // $userlevelresult = mysqli_query($con, $userlevel);
          // $_SESSION['userlevel'] = $userlevelresult;
          while($userRow = mysqli_fetch_assoc($result)){
              $_SESSION['full_name'] = $userRow['full_name'];
              $_SESSION['department'] = $userRow['department'];
              $_SESSION['profile_picture'] = $userRow['profile_picture'];
              $_SESSION['account_ID'] = $userRow['account_ID'];


            
          }
          header("location: ./system/userHomePage.php");
  }
  else{
    ?><script>
    Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Your registration is not yet approved.',
//   footer: '<a href="">Why do I have this issue?</a>'
})
 </script><?php 
  }
  

    }

    }

}?>
<nav class="d-none d-sm-flex navbar navbar-dark navbar-expand-sm shadow px-0 px-sm-3 sticky-top" style="background-color: #061362;">
    <div class="container-fluid px-3">

      <span class="navbar-brand  mb-0 h1">Manpower</span>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      
    </div>
  </nav>
<div class="d-flex align-items-start align-items-sm-center" style="height: 100vh;">
    <div class="mx-auto card mt-0 border-sm-0 " id="cardSignin" style="width: 40rem;">
        <!-- <img src="./samplePictures/GPI Machine/login.png" class="card-img-top" alt="..."> -->
        <div class="card-img-top login-img"> </div>
        <div class="card-body">
            <form action="signin.php" method="POST">
                <div class="d-flex">
                    <div class="w-100">
                        <h3 class="mb-4">Sign In</h3>
                    </div>

                </div>
  <div class="mb-3">
  <div class="form-floating mb-3">
  <input type="text" class="form-control" id="floatingInput" name="userId" placeholder="name@example.com">
  <label for="floatingInput">User Id</label>
</div>
    
  </div>
  <div class="mb-3">
  <div class="form-floating mb-3">
  <input type="password" class="form-control" id="passwordSignin" name="password"placeholder="name@example.com">
  <label for="floatingInput">Password</label>

</div>
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" id="seepassword" onclick="seePassword()" class="form-check-input">
    <label class="form-check-label"  for="exampleCheck1" >See password</label>
  </div>
  <div class="d-grid gap-2">
    <button class="btn btn-outline-success" name="sbtlogin" id="addmodel" type="submit">Sign in</button>
</div>
<h4 class="line"><span>or</span></h4>
<div class="d-grid gap-2">
    <a class="btn btn-outline-success mt-4" href="./signup.php" name="addmodelBtn" id="signupbtn" type="button" >Request new account</a>
</div>
</form>
  </div>
</div>
</div>

<script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js" ></script>

<script src="./js/userHomePage.js"></script> 
</body>

</html>