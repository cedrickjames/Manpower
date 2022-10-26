
<?php

session_start();
  include ("./connection.php");
  if(isset( $_SESSION['connected'])){
    

    header("location: signup.php");

    // 
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
if(isset($_POST['sbtregister'])){
        
  $fullName = $_POST['fullName'];
  $Department = $_POST['Department'];
  $UserID = $_POST['UserID']; 
  $password = $_POST['Password'];      
  $confirmPass = $_POST['confirmPass'];      
  
  $sql1 = "Select * FROM users WHERE user_id='$UserID'";
  $result = mysqli_query($con, $sql1);
  $numrows = mysqli_num_rows($result);
// if(mysqli_fetch_assoc($result)){
//     $_SESSION[]
// }
  if ($numrows == 0){
      if($password==$confirmPass){
          $sqlinsert = "INSERT INTO `users`(`user_id`, `full_name`, `user_password`, `department`) VALUES ('$UserID','$fullName','$password', '$Department')";
          mysqli_query($con, $sqlinsert);
          ?><script>
          Swal.fire({
        icon: 'success',
        title: 'Registered',
        text: 'You have successfully registered a user.',
      //   footer: '<a href="">Why do I have this issue?</a>'
      }).then(function() {
window.location = "signin.php";
});
       </script><?php 
          // header("location: signup.php");
      
      }
      else{
        ?><script>
        Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'Password does not match',
    //   footer: '<a href="">Why do I have this issue?</a>'
    })
     </script><?php 
      }
    
      

  }
  else{
      ?><script>
      Swal.fire({
    icon: 'error',
    title: 'Oops...',
    text: 'This user is already exist!',
  //   footer: '<a href="">Why do I have this issue?</a>'
  })
   </script><?php 
  }
}
 ?>
<nav class="d-none d-sm-flex navbar navbar-dark navbar-expand-sm shadow px-0 px-sm-3 sticky-top" style="background-color: #061362;">
    <div class="container-fluid px-3">

      <span class="navbar-brand  mb-0 h1">Manpower</span>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      
    </div>
  </nav>
<div class=" d-flex align-items-start align-items-sm-center" style="height: 100vh;">
    <div class="mx-auto card mt-0 border-sm-0 sign-card" id="cardSignup"style="width: 40rem;">
        <!-- <img src="./samplePictures/GPI Machine/login.png" class="card-img-top" alt="..."> -->
        <div class="card-img-top signup-img"> </div>
        <div class="card-body">
            <form action="signup.php" method="POST">
                <div class="d-flex">
                    <div class="w-100">
                        <h3 class="mb-4">Sign up</h3>
                    </div>
</div>
<div class="mb-3-signup">
  <div class="col-12">
    <input type="text" class="form-control" name="fullName" id="floatingInput" placeholder="Full Name">
    <!-- <label for="floatingInput" class=form-label>Full Name</label> -->
  </div>

</div>
<div class="mb-3-signup">
  <div class="col-12">
    <!-- <label for="floatingInput" class=form-label>Department</label> -->
    <select class="form-select " name="Department" id="floatingInput" id="floatingInput" placeholder="Department">
    <option selected>Choose Department</option>
    <option value="Production1">Production 1</option>
    <option value="Production2">Production 2</option>
    <option value="Quality Control">Quality Control</option>

</select>
  </div>
    
  </div>
  <div class="mb-3-signup">
  <div class="col-12">
  <input type="text" class="form-control" name="UserID" id="floatingInput" placeholder="User Id">
  <!-- <label for="floatingInput" class=form-label>User Id</label> -->
</div>
    
  </div>
  <div class="mb-3-signup">
  <div class="col-12">
  <input type="password" class="form-control" name="Password" id="passwordSignin" placeholder="Password">
  <!-- <label for="floatingInput" class=form-label>Password</label> -->

</div>
</div>
<div class="mb-3-signup">
  <div class="col-12">
  <input type="password" class="form-control" name="confirmPass" id="passwordSignin1" placeholder="Confirm Password">
  <!-- <label for="floatingInput" class=form-label>Password</label> -->

</div>
</div>
  <div class="mb-3-signup form-check">
    <input type="checkbox" id="seepassword" onclick="seePassword()" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label"  for="exampleCheck1" >See password</label>
  </div>
  <div class="d-grid gap-2">
    <button class="btn btn-outline-success" name="sbtregister" id="addmodel" type="submit">Register</button>
</div>
<h4 class="line"><span>or</span></h4>
<div class="d-grid gap-2">
    <a class="btn btn-outline-success mt-4" href="./signin.php"name="addmodelBtn" id="signupbtn" type="button" >I already have an account</a>
</div>
</form>
  </div>
</div>
</div>

<script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js" ></script>

<script src="./js/userHomePage.js"></script> 
</body>

</html>