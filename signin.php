<?php
session_start();
include ("./connection.php");

if(isset($_POST['btnLogin'])){
    $username = $_POST['userName'];
    $password = $_POST['password'];

    $selectUser = "Select * FROM users WHERE userName='$username'";

    $result = mysqli_query($con, $selectUser);
    $numrows = mysqli_num_rows($result);

    if ($numrows == 0 ){
       echo "User does not exist.";
    }
    else{
        $sqlpass = "Select * FROM users WHERE userName = '$username' AND `password` = '$password';";
        $resultpass = mysqli_query($con, $sqlpass);
        $numrowspass = mysqli_num_rows($resultpass);
            if($numrowspass == 0){
                echo "Wrong password";
            }
            else{
                while($userRow = mysqli_fetch_assoc($result)){
                    $_SESSION['name'] = $userRow['userName'];
                    header("location: index.php");
                }

    }

}
}

?>

<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" contant="width=device-width, initial-scale=1.0">

    <title>Main Page</title>
</head>
<body>
    <form action="signin.php" method = "POST">
    <input type="text" name="userName">
    <input type="password" name="password">
    <input id="btn-login"  name="btnLogin" type="submit" value="Login" style="margin: auto;">
     
    </form>
    
</body>

</html>