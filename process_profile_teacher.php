<?php require_once("includes/session.php") ;
 require_once("includes/dbconnect.php") ;
 require_once("includes/functions.php") ;




    $teacher_id = $_SESSION['teacher_id'];

    $name = mysqli_prep($_POST['name']);
    $rank = mysqli_prep( $_POST['rank']);
    $faculty = mysqli_prep( $_POST['faculty']);
    $department = mysqli_prep($_POST['department']);
    $email = mysqli_prep( $_POST['email']);
    $password = mysqli_prep( $_POST['password']);
    $password = encrypted_password($password); // hashing
    if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
        echo "<div class = 'alert alert-warning' >Invalid email format! </div>";
        exit;
    }
    if($password == "")
    {
        $query = "UPDATE `teacher` SET `name`='$name',`rank`='$rank', `faculty` = '$faculty' ,`department`='$department',`email`='$email' WHERE `id` = '$teacher_id'";
    }
    else{
        $query = "UPDATE `teacher` SET `name`='$name',`rank`='$rank', `faculty` = '$faculty' ,`department`='$department',`email`='$email',`password`='$password' WHERE `id` = '$teacher_id'";

    }
              // echo $query;
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo "<div class = 'alert alert-success' >Profile Updated Successfully! </div>";
        }
        else {
            echo "<div class = 'alert alert-danger' >Data Insertion Failed! </div>".mysqli_error($conn);
        }




?>