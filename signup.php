
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
    <script src="./node_modules/jquery/dist/jquery.min.js"></script>
    <!-- <link rel="stylesheet" type="text/css" href="../node_modules/datatables.net-bs5/css/dataTables.bootstrap5.css"> -->
    <script src="./node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="./node_modules/sweetalert2/dist/sweetalert2.min.css">

    <script type='text/javascript' src=''></script>
    <!-- <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js'></script> -->
  

    </script>
</head>
<body style="height: 100vh;">

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
        <!-- <img id="signupImage" src="./samplePictures/GPI Machine/login.png" class="card-img-top" alt="..." style="border-radius: 50%"> -->
        <!-- <div class="card-img-top signup-img"> </div> -->
        <div class="card-img-top " id="signupImage" style="    height: 220px;
    width: 40%;
    background-color: #061362;
    background-image: url('samplePictures/GPI Machine/GFB 800.png');
    background-size: cover;
    border-radius: 50%;
    margin: 0 auto;
    margin-top: 10px;
    text-align: center;
    vertical-align: middle;
    color: white;
    font-size: 33px;
    padding: auto 0;
    font-weight: 500;"> </div>
        <div class="card-body">
            <form action="signup.php" method="POST" enctype="multipart/form-data">
                <div class="d-flex">
                    <div class="w-100">
                        <h3 class="mb-4">Sign up</h3>
                    </div>
</div>

<div class=" form mb-3 input-group">
                <input type="file"  name="uploadedFile" class="form-control" id="inputImageSignup">
                <!-- <input type="file" name="uploadedFile" id="uploadedFile" class="form-control" style="width: 180px; height: 30px; font-size: 10px; padding-top:0px" title=" Select "> -->

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
    <button class="btn btn-outline-success" name="uploadBtn" id="addmodel" type="submit" value="Upload">Register</button>
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
<script>
  var validImagetypes=["image/gif", "image/jpeg", "image/png"];
  function previewImageSignup(image_blog){
    // document.getElementById("signupImage").style.display="none";
    // document.getElementById("cardImage").display=null;
    $("#signupImage").fadeIn();
  
    
      if(image_blog.files && image_blog.files[0])
      {
       var reader=new FileReader();
       var pictureeme =  $("#inputImageSignup").prop("files")[0];
         reader.onload=function(e)
         {
          $("#signupImage").css("background-image", "url(" + e.target.result + ")");
          //  $("#signupImage").attr('src', e.target.result);
          //  $("#cardImage").fadeIn();
           if($.inArray(pictureeme["type"], validImagetypes)<0)
           {
            $("#inputImageSignup").addClass("is-invalid")
            return;
           }
           else{
             $("#inputImageSignup").removeClass("is-invalid");
           }
         }
         reader.readAsDataURL(image_blog.files[0]);
     
      }
     }
     $("#inputImageSignup").change(function(){
      previewImageSignup(this);
     });
</script>
<?php
if (isset($_POST['uploadBtn']) && $_POST['uploadBtn'] == 'Upload'){
  if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK)
  {
    // get details of the uploaded file
    $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
    $fileName = $_FILES['uploadedFile']['name'];
    $fileSize = $_FILES['uploadedFile']['size'];
    $fileType = $_FILES['uploadedFile']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));

    // sanitize file-name
    $newFileName = md5(time() . $fileName) . '.' . $fileExtension;

    // check if file has one of the following extensions
    $allowedfileExtensions = array('jpg', 'gif', 'png', 'JPEG', 'img');

    if (in_array($fileExtension, $allowedfileExtensions))
    {
      // directory in which the uploaded file will be moved
      $uploadFileDir = './uploaded_files/profile_pictures';
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


  $fullName = $_POST['fullName'];
  $Department = $_POST['Department'];
  $UserID = $_POST['UserID']; 
  $password = $_POST['Password'];      
  $confirmPass = $_POST['confirmPass'];      
    $destinationPath='.'.$dest_path;


  $sql1 = "Select * FROM users WHERE user_id='$UserID'";
  $result = mysqli_query($con, $sql1);
  $numrows = mysqli_num_rows($result);
// if(mysqli_fetch_assoc($result)){
//     $_SESSION[]
// }
  if ($numrows == 0){
      if($password==$confirmPass){

        if($destinationPath=='.'){
          $sqlinsert = "INSERT INTO `users`(`user_id`, `full_name`, `user_password`, `department`, `approved`) VALUES ('$UserID','$fullName','$password', '$Department',FALSE)";
          $registersql = mysqli_query($con, $sqlinsert);
        }
        else{
          $sqlinsert = "INSERT INTO `users`(`user_id`, `full_name`, `user_password`, `department`,`profile_picture`, `approved`) VALUES ('$UserID','$fullName','$password', '$Department', '$destinationPath',FALSE)";
          $registersql =  mysqli_query($con, $sqlinsert);
        }
     if($registersql){
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
     }
     else{
      ?><script>
      Swal.fire({
    icon: 'error',
    title: 'Unsuccessful',
    text: 'Registration Failed.',
  //   footer: '<a href="">Why do I have this issue?</a>'
  }).then(function() {
window.location = "signup.php";
});
   </script><?php 
     }

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
<script src="./js/userHomePage.js"></script> 
</body>

</html>