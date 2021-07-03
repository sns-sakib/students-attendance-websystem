<?php
require_once("session.php") ;
require_once("dbconnect.php");
if($_POST['action'] === "name") {
    $name = $_POST['name_current'];
        $pattern = "/^[a-z ,.'-]+$/i";
        if (preg_match($pattern, $name)) {
            echo "valid";
            exit;
        } else {
            echo "invalid name";
            exit;
        }

    //exit;
}

//email validation

if ($_POST['action'] === "email"){
    $email = $_POST['email_current'];
    if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
        echo "invalid email";
    }
    else{
        echo "valid";
    }
}

if ($_POST['action'] === "username"){
    $username = $_POST['username_current'];
    $pattern = "/^[a-zA-Z]+[0-9_.-]*[a-zA-Z]*$/";
    if (preg_match($pattern,$username)){
        echo "valid";
        exit;
    }
    else{
        echo "invalid username";
        exit;
    }
}

if ($_POST['action'] === "roll"){
    $roll = $_POST['roll_current'];
    $pattern = "/^[0-9]{7}+$/";
    if (preg_match($pattern,$roll)){
        echo "valid";
        exit;
    }
    else{
        echo "invalid roll";
        exit;
    }
}
if ($_POST['action'] === "session"){
    $session = $_POST['session_current'];
    $pattern = "/^[0-9]{4}+\-{1}+[0-9]{2}$/";
    if (preg_match($pattern,$session)){
        echo "valid";
        exit;
    }
    else{
        echo "invalid session";
        exit;
    }
}

if ($_POST['action'] === "course_code"){
    $course_code = $_POST['course_code_current'];
    $pattern = "/^[A-Z]{3}+\-{1}+[0-9]{3}$/";
    if (preg_match($pattern,$course_code)){
        echo "valid";
        exit;
    }
    else{
        echo "invalid course code";
        exit;
    }
}
if ($_POST['action'] === "phone"){
$username = $_POST['phone_current'];
$pattern = "/^0{1}+1{1}+[0-9]{9}$/";
if (preg_match($pattern,$username)){
    echo "valid";
    exit;
}
else{
    echo "invalid phone";
    exit;
}
}

