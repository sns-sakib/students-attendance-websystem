<?php
require_once("includes/session.php") ;
require_once("includes/dbconnect.php");
require_once("includes/functions.php") ;

if($_POST['action'] == "add_class"){
    // echo $_POST['courseCode']." semester : ".$_POST['semester'] ;
    $teacher_id = $_SESSION['teacher_id'];
    $course_code = $_POST['course_code'];
    $course_code = mysqli_prep($course_code);
    $course_title = $_POST['course_title'];
    $course_title = mysqli_prep($course_title);
    $semester = $_POST['semester'];
    $semester= mysqli_prep($semester);

        $query = "INSERT INTO `course`( `teacher_id`, `course_code`, `course_title`, `semester`) VALUES ('$teacher_id','$course_code','$course_title','$semester')";
        // echo $query;
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo "<div class = 'alert alert-success' >Class Added Successfully! </div>";
           // redirect_to("classes.php");
        }
        else {
            echo "<div class = 'alert alert-danger' >Data Insertion Failed! </div>".mysqli_error($conn);
        }


}






?>