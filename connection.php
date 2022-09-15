<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "networking";
// Create connection
$con = mysqli_connect($servername, $username, $password, $dbname);

if(!$con = mysqli_connect($servername, $username, $password, $dbname)){
    die("Failed to Connect to Database!");
}
?>