<?php require_once("includes/session.php") ;
require_once("includes/dbconnect.php") ;
require_once("includes/functions.php") ;



$name = mysqli_prep($_POST['name']);
$phone = mysqli_prep( $_POST['phone']);
$messageBox = mysqli_prep( $_POST['messageBox']);
$designation = mysqli_prep($_POST['designation']);
$email = mysqli_prep( $_POST['email']);
$date = date('d-m-y');

$query = "INSERT INTO `contact`( `name`, `email`, `phone`,`designation`, `message`,`sending_date`) VALUES ('$name','$email', '$phone', '$designation', '$messageBox','$date')";
// echo $query;
$result = mysqli_query($conn, $query);
if ($result) {
    echo "<div class = 'alert alert-success' >Message Sent Successfully! </div>";
}
else {
    echo "<div class = 'alert alert-danger' >Message Sending Failed! </div>".mysqli_error($conn);
}




?>