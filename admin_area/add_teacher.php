<?php require_once("../includes/session.php") ?>
<?php require_once("../includes/dbconnect.php") ?>
<?php require_once("../includes/functions.php") ?>
<?php //require_once("../includes/validation.php") ?>
<?php require_once("../includes/head_admin.php") ?>
<?php require_once("../includes/navbar_admin.php") ?>
<?php
//session set
admin_confirm_logged_in()
?>
<script>
    $(document).ready(function () {
        //alert("hi");
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

        //rank validation ... rank and name have same regex pattern. hence same function
        $("#rank").keyup(function () {
            var rank_current = $("#rank").val();
            //  alert("hi");
            $.ajax({
                url:"../includes/validation.php",
                method:"post",
                data: {name_current:rank_current,action:"name"},
                success:function (data) {
                    // alert("hi");
                    if (data === "invalid name") {
                        //   alert("invalid");
                        $("#submit").prop('disabled',true);
                        $('#error_rank').show();
                        $('#error_rank').html("Invalid Rank!");
                        return;
                    }
                    else {
                        //  alert(data);
                        $('#error_rank').hide();
                        $("#submit").prop('disabled',false);
                    }
                }
            });
        });

        //faculty . same process
        $("#faculty").keyup(function () {
            var faculty_current = $("#faculty").val();
            //  alert("hi");
            $.ajax({
                url:"../includes/validation.php",
                method:"post",
                data: {name_current:faculty_current,action:"name"},
                success:function (data) {
                    // alert("hi");
                    if (data === "invalid name") {
                        //   alert("invalid");
                        $("#submit").prop('disabled',true);
                        $('#error_faculty').show();
                        $('#error_faculty').html("Invalid Faculty!");
                        return;
                    }
                    else {
                        //  alert(data);
                        $('#error_faculty').hide();
                        $("#submit").prop('disabled',false);
                    }
                }
            });
        });

        //department.
        $("#department").keyup(function () {
            var dept_current = $("#department").val();
            //  alert("hi");
            $.ajax({
                url:"../includes/validation.php",
                method:"post",
                data: {name_current:dept_current,action:"name"},
                success:function (data) {
                    // alert("hi");
                    if (data === "invalid name") {
                        //   alert("invalid");
                        $("#submit").prop('disabled',true);
                        $('#error_department').show();
                        $('#error_department').html("Invalid Department!");
                        return;
                    }
                    else {
                        //  alert(data);
                        $('#error_department').hide();
                        $("#submit").prop('disabled',false);
                    }
                }
            });
        });

        //email validation
        $("#email").keyup(function () {
            var email_current = $("#email").val();
            //  alert("hi");
            $.ajax({
                url:"../includes/validation.php",
                method:"post",
                data: {email_current:email_current,action:"email"},
                success:function (data) {
                    // alert("hi");
                    if (data === "invalid email") {
                        //   alert("invalid");
                        $("#submit").prop('disabled',true);
                        $('#error_email').show();
                        $('#error_email').html("Invalid Email!");
                        return;
                    }
                    else {
                        //  alert(data);
                        $('#error_email').hide();
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
        //insert
        $("#submit").click(function () {
            // alert("worked");
            var name = $("#name").val();
            var rank = $("#rank").val();
            var faculty = $("#faculty").val();
            var department = $("#department").val();
            var email = $("#email").val();
            var username = $("#username").val();
            var password = $("#password").val();
            var password2 = $("#password2").val();

                if (rank == "" || name == "" || faculty == "" || department == "" || email == "" || password == "" || password2 == "" ){
                    $('#result').show();
                    $("#result").html('Please Fill Up All The Fields!');
                    return;
                }
                if(password.length < 6){
                    $('#result').hide();
                    return;
                }
                if(password != password2){
                    $('#result').show();
                    $("#result").html('Passwords do not match!');
                    return;
                }

            $.ajax({
                url:"process_add_teacher.php",
                method:"post",
                data: {name:name, rank:rank, faculty:faculty,department:department,email:email, username:username, password:password},
                success:function (data) {
                    $('#result').show();
                    $('#result').html(data);
                    return;
                },
                error: function (jqXHR, exception) {
                    var msg = '';
                    if (jqXHR.status === 0) {
                        msg = 'Not connect.\n Verify Network.';
                    } else if (jqXHR.status == 404) {
                        msg = 'Requested page not found. [404]';
                    } else if (jqXHR.status == 500) {
                        msg = 'Internal Server Error [500].';
                    } else if (exception === 'parsererror') {
                        msg = 'Requested JSON parse failed.';
                    } else if (exception === 'timeout') {
                        msg = 'Time out error.';
                    } else if (exception === 'abort') {
                        msg = 'Ajax request aborted.';
                    } else {
                        msg = 'Uncaught Error.\n' + jqXHR.responseText;
                    }
                    $('#result').show();
                    $('#result').html(msg);
                }

            });
        });

    });

</script>


<div class="container">
    <div class="d-flex">
        <h2 class="mr-auto text-light">Add Teacher</h2>
        <a href="manage_teacher.php" class="btn btn-primary " >Back</a>
    </div>



        <div class="form-group">
            <label class="text-light" for="name">Name</label>
            <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" >
            <div class="error" id="error_name"></div>
        </div>
        <div class="form-group">
            <label class="text-light" for="rank">Rank</label>
            <input type="text" class="form-control" id="rank" placeholder="Enter Rank" name="rank" >
            <div class="error" id="error_rank"></div>
        </div>
        <div class="form-group">
            <label class="text-light" for="faculty">Faculty</label>
            <input type="text" class="form-control" id="faculty" placeholder="Enter Faculty i.e. Computer Science and Engineering" name="faculty" >
            <div class="error" id="error_faculty"></div>
        </div>
        <div class="form-group">
            <label class="text-light" for="department">Department</label>
            <input type="text" class="form-control" id="department" placeholder="Enter Department" name="department" >
            <div class="error" id="error_department"></div>
        </div>
        <div class="form-group">
            <label class="text-light" for="email">Email</label>
            <input type="text" class="form-control" id="email" placeholder="Enter Email" name="email" >
            <div class="error" id="error_email"></div>
        </div>
        <div class="form-group">
            <label class="text-light" for="username">Username</label>
            <input type="text" class="form-control" id="username" placeholder="Enter Username" name="username" >
            <div class="error" id="error_username"></div>
        </div>
        <div class="form-group">
            <label class="text-light" for="password">Password</label>
            <input type="password" class="form-control" id="password" placeholder="Enter Password " name="password">
            <div class="error" id="error_pass_length"></div>
        </div>

        <div class="form-group">
            <label class="text-light" for="password2">Re Enter Password</label>
            <input type="password" class="form-control" id="password2" placeholder="Enter Password " name="password2">
            <div class="error" id="error_pass"></div>
        </div>

        <button  class="btn btn-primary" name="submit" id="submit">Submit</button>
        <div id="result"></div>

</div>




<?php require_once("../includes/footer.php") ?>
