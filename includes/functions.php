<?php

function redirect_to($new_location){
    header("Location: {$new_location}");
    exit;
}

function admin_confirm_logged_in(){
    if(!isset($_SESSION["admin_id"])  ){
        redirect_to("../student_page.php");
    }
}

function teacher_confirm_logged_in(){
    if(!isset($_SESSION["teacher_id"])){
        redirect_to("student_page.php");
    }
}

//not working
function mysqli_prep($string){
    global $conn;
    $escaped_string = mysqli_real_escape_string($conn,$string);
    $escaped_string = htmlentities($escaped_string);
    return $escaped_string;
}

function encrypted_password($password){
    $hash_format = "$2y$10$";
    $salt_length = 22;
    $salt = generate_salt($salt_length);
    $format_and_salt = $hash_format.$salt;
    $hash = crypt($password, $format_and_salt);
    return $hash;
}

function generate_salt($length){
    $unique_random_string = md5(uniqid(mt_rand(),true));
    $base64_string = base64_encode($unique_random_string);
    $modified_base64_string = str_replace('+', '.', $base64_string);

    $salt = substr($modified_base64_string, 0, $length);
    return $salt;
}

function password_match($password,$existing_hash){
    $hash = crypt($password, $existing_hash);
    if($hash === $existing_hash){
        return true;
    }
    else{
        return false;
    }

}
function existing_student($roll,$course_id){
    global $conn;
    $query = "SELECT * from `student` where roll = '$roll' AND course_id = '$course_id'";
    $result = mysqli_query($conn,$query);
    if(mysqli_num_rows($result) >0){
        return true;
    }
    else
        return false;
}

function total_class($course_id){
    global $conn;

    $query = " SELECT DISTINCT `date` FROM attendance WHERE course_id = '$course_id' ";
    $query = $query;
    $result = mysqli_query($conn,$query);
    if (!$result) {
        return false;


    }
    $class_number = mysqli_num_rows($result);
    if ($class_number <= 0) {
        return 0;

    }

    return $class_number;
}
function status_report( $roll,$course_id){
 global $conn;

$query = " SELECT DISTINCT `date` FROM attendance WHERE course_id = '$course_id' ";

$result = mysqli_query($conn,$query);
if (!$result) {
    return 'Could not run query: ' . mysqli_error($conn);


}
$class_number = total_class($course_id);
if ($class_number == 0 ) {

   return false;

}
$query = " SELECT DISTINCT `date` FROM attendance WHERE course_id = '$course_id' AND student_roll = '$roll' AND attendance_value = 'Present' ";
$result = mysqli_query($conn,$query);

if (!$result) {
   return 'Could not run query: ' . mysqli_error($conn).$query;
}
$present_number = mysqli_num_rows($result);
$show = array();
$absent = $class_number - $present_number;
$percentage = ($present_number * 100.00)/$class_number;
$string_percentage = (string)$percentage."%";

$show[0] = $present_number;
$show[1]  = $absent;
$show[2] = $string_percentage;

return $show;
}
?>