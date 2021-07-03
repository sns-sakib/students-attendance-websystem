<?php
 require_once("includes/session.php") ;
require_once("includes/dbconnect.php");
 require_once("includes/functions.php") ;


 $course_code = mysqli_prep($_POST['get_course_code']);
 $roll = mysqli_prep($_POST['get_roll']);
 $session = mysqli_prep($_POST['get_session']);


$query = " SELECT `name` from student where roll = '$roll' and course_code = '$course_code'";
$result = mysqli_query($conn,$query);
if (!$result) {
    echo'Could not run query: ' . mysqli_error();
    exit;
}
$show = mysqli_fetch_row($result);
$show[1] = $roll;
$show[2] = $session;
$show[3] = $course_code;

$query = " SELECT DISTINCT `date` FROM attendance WHERE course_code = '$course_code' AND student_roll = '$roll'";
$query = $query;
$result = mysqli_query($conn,$query);
if (!$result) {
    echo 'Could not run query: ' . mysqli_error();

    exit;
}
$class_number = mysqli_num_rows($result);
if ($class_number <= 0) {
   echo 'No Result Found!';
    exit;
}
$query = " SELECT DISTINCT `date` FROM attendance WHERE course_code = '$course_code' AND student_roll = '$roll' AND attendance_value = 'Present' ";
$result = mysqli_query($conn,$query);

if (!$result) {
   echo 'Could not run query: ' . mysqli_error().$query;
    exit;
}
$present_number = mysqli_num_rows($result);


$percentage = ($present_number * 100.00)/$class_number;
$string_percentage = (string)$percentage."%";
$show[4] = $class_number;
$show[5] = $present_number;
$show[6] = $string_percentage;

$output = "<div class=\"card-header \">
        <h1 style=\"text-align: center;\">Attendance Record</h1>
    </div>
    <div class=\"card-body  \" >
        <ul class=\"list-group list-group-flush\">
            <li class=\"list-group-item\">Name : ".$show[0]." </li>
            <li class=\"list-group-item\">Roll : ".$show[1]." </li>
            <li class=\"list-group-item\">Session : ".$show[2]." </li>

        </ul>

    </div>


    <div class=\"card-footer\">
        <ul class=\"list-group list-group-flush\">
            <li class=\"list-group-item\">Course_Code : ".$show[3]." </li>
            <li class=\"list-group-item\">Total Classes : ".$show[4]." </li>
            <li class=\"list-group-item\">Attendance : ".$show[5]."</li>
            <li class=\"list-group-item\">Percentage : ".$show[6]."</li>

        </ul>
        
    </div>";

echo $output;
exit;


?>