<?php
session_start();
date_default_timezone_set("Asia/Singapore");
include ("../connection.php");
$message = ''; 
if (isset($_POST['uploadBtn']) && $_POST['uploadBtn'] == 'Upload')
{
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
    $allowedfileExtensions = array('jpg', 'gif', 'png', 'zip', 'txt', 'xls', 'doc');

    if (in_array($fileExtension, $allowedfileExtensions))
    {
      // directory in which the uploaded file will be moved
      $uploadFileDir = '../uploaded_files/';
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

  $dateandTime = new DateTime();
  $dateandTime  = $dateandTime->format('r');
  $line_name=$_POST["machine_name"];
  $machine_desc=$_POST["machine_description"];
  $machine_loc=$_POST["machine_location"];
  $LTUpdated=$dateandTime;
  $destinationPath=$dest_path;


  $sqlinsertLine = "INSERT INTO `line`(`line_name`, `line_desc`, `line_location`,`Department`, `last_time_updated`, `line_photo`,) VALUES ('$line_name','$machine_desc','$machine_loc','Production1','$LTUpdated','$destinationPath');";
  mysqli_query($con, $sqlinsertLine);
  
}
$_SESSION['message'] = $message;
header("Location: ../Production1/userHomePage.php");

?>