<?php
require_once("../includes/session.php") ;
require_once("../includes/dbconnect.php") ;
require_once("../includes/functions.php") ;


    // echo $_POST['courseCode']." semester : ".$_POST['semester'] ;
    $name =mysqli_prep( $_POST['name'] );
    $rank = mysqli_prep( $_POST['rank'] );
    $faculty =mysqli_prep( $_POST['faculty']);
    $department = mysqli_prep($_POST['department']);
    $email =mysqli_prep( $_POST['email']);
    $username =mysqli_prep( $_POST['username']);
    $password = mysqli_prep($_POST['password']);





        $query = "SELECT username FROM teacher WHERE username = '$username' ";
        // echo $query;
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) != 0) {
            echo "<div class = 'alert alert-warning' >Username Exists! </div>";
            //redirect_to("classes.php");
        } else {
            $password = encrypted_password($password); // hashing
            $query = "INSERT INTO `teacher`( `name`, `rank`, `faculty`,`department`, `email`, `username`, `password`) VALUES ('$name','$rank','$faculty','$department','$email', '$username', '$password')";
            // echo $query;
            $result = mysqli_query($conn, $query);
            if ($result) {
                echo "<div class = 'alert alert-success' >Teacher Added Successfully! </div>";
                //redirect_to("classes.php");
            } else {
                echo "<div class = 'alert alert-danger' >Data Insertion Failed! </div>" . mysqli_error($conn);
            }
        }
?>