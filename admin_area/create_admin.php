<?php require_once("../includes/session.php") ?>
<?php require_once("../includes/dbconnect.php") ?>
<?php require_once("../includes/functions.php") ?>

<?php require_once("../includes/head_admin.php") ?>
<?php require_once("../includes/navbar_admin.php") ?>
<?php
//session set
admin_confirm_logged_in()
?>

<script>
    $(document).ready(function () {
        //name validation
        $("#name").keyup(function () {
            var name_current = $("#name").val();
            //  alert("hi");
            $.ajax({
                url:"../includes/validation.php",
                method:"post",
                data: {name_current:name_current,action:"name"},
                success:function (data) {
                    // alert("hi");
                    if (data === "invalid name") {
                        //alert("invalid");
                        $("#submit").prop('disabled',true);
                        $('#error_name').show();
                        $('#error_name').html(data);
                        return;
                    }
                    else {
                        // alert(data);
                        $('#error_name').hide();
                        $("#submit").prop('disabled',false);
                    }
                }
            });
        });

        //username
        $("#username").keyup(function () {
            var username_current = $("#username").val();
            //  alert("hi");
            $.ajax({
                url:"../includes/validation.php",
                method:"post",
                data: {username_current:username_current,action:"username"},
                success:function (data) {
                    // alert("hi");
                    if (data === "invalid username") {
                        //   alert("invalid");
                        $("#submit").prop('disabled',true);
                        $('#error_username').show();
                        $('#error_username').html("Invalid Username!");
                        return;
                    }
                    else {
                        //  alert(data);
                        $('#error_username').hide();
                        $("#submit").prop('disabled',false);
                    }
                }
            });
        });

        //password length
        $("#password").keyup(function (){

            var pass_data = $("#password").val();
            if (pass_data.length <= 5){
                $("#submit").prop('disabled',true);
                $('#error_pass_length').show();
                $('#error_pass_length').html("Password must contain at least 6 characters<br><br><br>");
            }
            else{
                $("#submit").prop('disabled',false);
                $('#error_pass_length').hide();
            }

        });
        //password validation
        $("#password2").keyup(function () {

            var pass1 = $("#password").val();
            var pass2 = $("#password2").val();
            if(pass1 !== pass2){
                $('#error_pass').show();

                $('#error_pass').html("Passwords do not match!");
                $("#submit").prop('disabled',true);
            }
            else{
                $("#submit").prop('disabled',false);
                $('#error_pass').hide();

            }

        });

    });


</script>


<div class="container">
<div class="d-flex">
    <h2 class="mr-auto text-light">Create Admin </h2>
    <a href="manage_admin.php" class="btn btn-primary " >Back</a>
</div>

<?php

if(isset($_POST['submit'])){
    // echo $_POST['courseCode']." semester : ".$_POST['semester'] ;
    $name = mysqli_prep($_POST['name']);
    $username =mysqli_prep( $_POST['username']);
    $password = mysqli_prep($_POST['password']);

    if($name =="" || $username == "" || $password == ""){
        echo "<div class = 'alert alert-warning' >Fields must not be empty! </div>";
    }

    else {
        $query = "SELECT username FROM admin WHERE username = '$username' ";
            // echo $query;
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) != 0) {
                echo "<div class = 'alert alert-warning' >Username Exists! </div>";
                //redirect_to("classes.php");
            }
            else {
                $hashed_password = encrypted_password($password); //hashing
                //echo "<br>$password<br>$hashed_password<br>";
                //echo crypt($password,$hashed_password);
                //exit;
                $query = "INSERT INTO `admin`( `name`, `username`, `password`) VALUES ('$name','$username','$hashed_password')";
                // echo $query;
                $result = mysqli_query($conn, $query);
                if ($result) {
                    echo "<div class = 'alert alert-success' >Admin Created Successfully! </div>";
                    //redirect_to("classes.php");
                } else {
                    echo "<div class = 'alert alert-danger' >Data Insertion Failed! </div>" . mysqli_error($conn);
                }
            }
    }

}
else{
    // problem
}
?>


<form method="post" >
    <div class="form-group">
        <label class="text-light" for="name">Name</label>
        <input type="text" class="form-control" id="name" placeholder="Enter Name  " name="name">
        <div class="error" id="error_name"></div>
    </div>
    <div class="form-group">
        <label class="text-light" for="username">Username</label>
        <input type="text" class="form-control" id="username" placeholder="Enter username i.e. khaled1969" name="username">
        <div class="error" id="error_username"></div>
    </div>

    <div class="form-group">
        <label class="text-light" for="password">Password</label>
        <input type="password" class="form-control" id="password" placeholder="Enter Password " name="password">
        <div class="error" id="error_pass_length"></div>
    </div>

    <div class="form-group">
        <label  class="text-light" for="password2">Re Enter Password</label>
        <input type="password" class="form-control" id="password2" placeholder="Enter Password " name="password2">
        <div class="error" id="error_pass"></div>
    </div>

    <button type="submit" class="btn btn-primary" name="submit" id="submit">Submit</button>
</form>
</div>


<?php require_once("../includes/footer.php") ?>