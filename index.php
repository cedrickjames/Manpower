<?php
session_start();
include ("./connection.php");
$username = $_SESSION['name'];

$sqlGetTotalBalance= "SELECT * FROM `totalbalance` WHERE `userName` = '$username'";
$resultTotalBalance = mysqli_query($con, $sqlGetTotalBalance);

$totalBalance = 0;
while($userRow = mysqli_fetch_assoc($resultTotalBalance)){
    $totalBalance = $userRow['totalBalance'];
}

if(isset($_POST['submitInvite'])){
    $inviteName = $_POST['inviteName'];

    $sqlinsertInvite = "INSERT INTO `invites`(`name`, `invitee`) VALUES ('$inviteName','$username')";
    mysqli_query($con, $sqlinsertInvite);

    $sqlGetTotalBalance= "SELECT * FROM `totalbalance` WHERE `userName` = '$username'";
    $resultTotalBalance = mysqli_query($con, $sqlGetTotalBalance);
    
    $totalBalance = 0;
    while($userRow = mysqli_fetch_assoc($resultTotalBalance)){
        $totalBalance = $userRow['totalBalance'];
    }
    $updatedBalance = $totalBalance + 500;
    $sqlAddBalance= "UPDATE `totalbalance` SET `totalBalance`='$updatedBalance' WHERE `userName` = '$username'";
    mysqli_query($con, $sqlAddBalance);

    $sqlinsertTransact= "INSERT INTO `transaction`(`userName`, `inviteName`, `addedAmount`, `TotalBalance`) VALUES ('$username','$inviteName','500','$updatedBalance')";
    mysqli_query($con, $sqlinsertTransact);

    $sqlInsertUserInitialBalance= "INSERT INTO `totalbalance`( `userName`, `totalBalance`) VALUES ('$inviteName','0');";
    mysqli_query($con, $sqlInsertUserInitialBalance);

    $sqlInsertUserAccount= "INSERT INTO `users`( `userName`, `password`) VALUES ('$inviteName','123456');";
    mysqli_query($con, $sqlInsertUserAccount);

    
    $_SESSION['updatedBalance'] = $updatedBalance;

    $upline=$username;
    for ($i = 1; $i<=10; $i++){

        $sqlGetInvitee= "SELECT `invitee` FROM `invites` WHERE `name` = '$upline'";
        $resultInvitee = mysqli_query($con, $sqlGetInvitee);
        
        $invitee = '';
        while($userRow = mysqli_fetch_assoc($resultInvitee)){
            $invitee = $userRow['invitee'];
        }
    
        $sqlGetTotalBalance= "SELECT * FROM `totalbalance` WHERE `userName` = '$invitee'";
        $resultTotalBalance = mysqli_query($con, $sqlGetTotalBalance);
        $totalBalance = 0;
    
        while($userRow = mysqli_fetch_assoc($resultTotalBalance)){
        $totalBalance = $userRow['totalBalance'];
        }
        $updatedBalance = $totalBalance + 10;
    
        $sqlAddBalance= "UPDATE `totalbalance` SET `totalBalance`='$updatedBalance' WHERE `userName` = '$invitee'";
        mysqli_query($con, $sqlAddBalance);

        $upline = $invitee;
    }
    header("location: index.php");
}

$tableName="invites";
$columns= ['name', 'invitee'];
$fetchData = fetch_data($con, $tableName, $columns, $username);

function fetch_data($db, $tableName, $columns, $username){
  if(empty($db)){
   $msg= "Database connection error";
  }elseif (empty($columns) || !is_array($columns)) {
   $msg="columns Name must be defined in an indexed array";
  }elseif(empty($tableName)){
    $msg= "Table Name is empty";
 }else{
 $columnName = implode(", ", $columns);
 $query = "SELECT * FROM `invites` WHERE `invitee` = '$username';";
//  SELECT * FROM `usertask` ORDER BY taskCategory ASC;
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

<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" contant="width=device-width, initial-scale=1.0">

    <title>Main Page</title>
</head>
<body>
    <h1>Welcome <?php echo $username; ?></h1>

    <form action="index.php" method = "POST">
    <input type="text" name="inviteName">
    <input type="submit" name="submitInvite">
    </form>

    <h2>Your Balance</h2>

    <h3><?php echo $totalBalance; ?></h3>

    <h2>Your Invites</h2>
    <?php

            if(is_array($fetchData)){      

            foreach($fetchData as $data){
                $invitesName = $data['name'];

                ?>
            <h3><?php echo $invitesName; ?></h3>
    <?php

            }
            }
    ?>


   
</body>

</html>