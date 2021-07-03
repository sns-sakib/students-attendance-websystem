<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "ama";
$conn = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
if(mysqli_connect_errno()){
    die("Database connection failed"." ".mysqli_connect_error()." ".mysqli_connect_errno());
}
?>
