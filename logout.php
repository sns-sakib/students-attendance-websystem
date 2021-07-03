<?php
require_once("includes/session.php");
require_once("includes/functions.php");

if(isset($_SESSION['admin_id'])){
    session_destroy();
   // $_SESSION['admin_id'] = null;
    redirect_to("student_page.php");
}
elseif (isset($_SESSION['teacher_id'])){
    session_destroy();
    //$_SESSION['teacher_id'] = null;
    redirect_to("student_page.php");
}


?>