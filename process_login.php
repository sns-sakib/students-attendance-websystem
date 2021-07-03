<?php
require_once("includes/session.php") ;
require_once("includes/dbconnect.php");
require_once("includes/functions.php") ;

//checking captcha
/*$url = "https://www.google.com/recaptcha/api/siteverify";
$private_key = "6LegaYwUAAAAAPp7-YTBierObXogOWtkxdqWPRZK";
$captcha_response = $_POST['captcha'];
$response = file_get_contents($url."?secret=".$private_key."&response=".$captcha_response);
$data = json_decode($response);
if(!$data->success){
    echo 'Captcha verification failed!';
    exit;
}
*/


$type = $_POST['option'];
$username = $_POST['username'];
$username = mysqli_prep($username);
$password = $_POST['password'];
$password = mysqli_prep($password);
// checking remember me
$checked = $_POST["checked"];
if($checked === "true"){
    setcookie("username",$username,time());
    setcookie("password",$password,time());
}
else{
    setcookie("username","");
    setcookie("password","");
}
$check = 0;   //to check admin or teacher


if($type == "teacher") {
    $query = " SELECT id,  `name`, username, password from teacher where username = '$username'  ";
    //$query = mysqli_prep($query);
    $check = 1;
}
else{
    $query = " SELECT id, `name`, username, password from admin where username = '$username'   ";
   // $query = mysqli_prep($query);


    $check = 2;
}
    $result = mysqli_query($conn,$query);
    if (!$result) {
         echo'Could not run query: ' . mysqli_error($conn);
         exit;
        }
    if(mysqli_num_rows($result) == 0){
        echo 'Username/Password Doesn\'t Match!';
        exit;
    }
    else if(mysqli_num_rows($result) == 1){
        $show = mysqli_fetch_assoc($result);
        //test
       // $string = "rakib";
       // $string = encrypted_password($string);

        //$hash = crypt($password,$show['password']);
       // echo "<br>".$hash."<br>".$password."<br>".$string;
        //exit;
        if(!password_match($password, $show['password'])){
            echo 'Username/Password Doesn\'t Match!';
            exit;
        }
        if($check == 1){

           $_SESSION['teacher_id'] = $show['id'];
            $_SESSION['teacher_name'] = $show['name'];
           echo "teacher";
          // redirect_to("teacher.php");
        }
        else{
            $_SESSION['admin_id'] = $show['id'];
           // redirect_to("admin.php");
            echo "admin";
        }

    }
    else{
        echo "Unsuccessful Login";
    }


?>