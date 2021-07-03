<?php
require_once("includes/session.php") ;
require_once("includes/dbconnect.php");
require_once("includes/functions.php") ;


    // echo $_POST['courseCode']." semester : ".$_POST['semester'] ;
    $name = $_POST['name'];
    $name = mysqli_prep($name);
    $roll = $_POST['roll'];
    $roll = mysqli_prep($roll);
    $session = $_POST['session'];
    $session = mysqli_prep($session);
    $course_code = $_POST['course_code'];
    $course_id = $_POST['course_id'];


    if(existing_student($roll,$course_code)){
        echo "<div class = 'alert alert-danger' >Student Exists! </div>".mysqli_error($conn);
        exit;
    }
    $query = "INSERT INTO `student`( `name`, `roll`, `course_code`,`course_id`, `session`) VALUES ('$name','$roll','$course_code','$course_id','$session')";
    // echo $query;
    $result = mysqli_query($conn, $query);
    if ($result) {
        echo "<div class = 'alert alert-success' >Student Added Successfully! </div>";
        //redirect_to("classes.php");
    }
    else {
        echo "<div class = 'alert alert-danger' >Data Insertion Failed! </div>".mysqli_error($conn);
    }




?>