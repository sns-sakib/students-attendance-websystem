<?php require_once("includes/session.php") ?>
<?php require_once("includes/dbconnect.php") ?>
<?php require_once("includes/functions.php") ?>
<?php require_once("includes/head2.php") ?>

<?php require_once("includes/navbar.php") ?>
<?php
//session check
teacher_confirm_logged_in();
?>

<script>
    $(document).ready(function () {

        //name validation
        $("#name").keyup(function () {
            var name_current = $("#name").val();
            //  alert("hi");
            $.ajax({
                url:"includes/validation.php",
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
                url:"includes/validation.php",
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
                url:"includes/validation.php",
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
                url:"includes/validation.php",
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
                url:"includes/validation.php",
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
        //password length
        $("#password").keyup(function (){
            if($("#passgroup").is(":visible")){
                var pass_data = $("#password").val();
                if (pass_data.length <= 5){
                    $('#error_pass_length').show();
                    $('#error_pass_length').html("Password must contain at least 6 characters<br><br><br>");
                }
                else{
                    $('#error_pass_length').hide();
                }
            }
        });
        //password validation
        $("#password2").keyup(function () {
            if($("#passgroup").is(":visible")){
                var pass1 = $("#password").val();
                var pass2 = $("#password2").val();
                if(pass1 !== pass2){
                    $('#error_pass').show();

                    $('#error_pass').html("Passwords do not match!");
                }
                else{
                    $('#error_pass').hide();

                }
            }
        });

        $("#change_pass").click(function () {
            $("#passgroup").toggle();
            if($("#passgroup").is(":visible")){
                $("#change_pass").text("Cancel");
                $('#error_pass').hide();
                $("#password").val("");
                $("#password2").val("");

            }
            else{
                $("#change_pass").text("Change Password");

            }
        });

        //update
        $("#submit").click(function () {
            // alert("worked");
            var name = $("#name").val();
            var rank = $("#rank").val();
            var faculty = $("#faculty").val();
            var department = $("#department").val();
            var email = $("#email").val();
            if($("#passgroup").is(":visible")){

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

            }
            else{
                var password = "";
                var password2 = "";
                if (rank == "" || name == "" || faculty == "" || department == "" || email == ""  ){
                    $('#result').show();
                    $("#result").html('Please Fill Up All The Fields!');
                    return;
                }
            }

            $.ajax({
                url:"process_profile_teacher.php",
                method:"post",
                data: {name:name, rank:rank, faculty:faculty,department:department,email:email, password:password},
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

<div class="container pro_teacher_content">
    <h2 class="text-light">Profile</h2>

   <?php
    //search previous data
   $teacher_id = $_SESSION['teacher_id'];
    $query = "SELECT  `name`, `rank`, `faculty`, `department`, `email`, `username` FROM `teacher` WHERE `id` = '$teacher_id'";
    $result = mysqli_query($conn, $query);
    if($result === FALSE){
        echo "<div class = 'alert alert-warning' >Unsuccessful </div>".mysqli_error($conn);
    }

    ?>

        <?php
        if(mysqli_num_rows($result) > 0) {
            while ($check = $result->fetch_assoc()) {


                ?>
                <div class="form-group">
                    <label class="text-light" for="name">Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" value="<?php echo $check['name'];   ?>">
                    <div class="error" id="error_name"></div>
                </div>
                <div class="form-group">
                    <label class="text-light" for="rank">Rank</label>
                    <input type="text" class="form-control" id="rank" placeholder="Enter Rank" name="rank" value="<?php echo $check['rank'];   ?>">
                    <div class="error" id="error_rank"></div>
                </div>
                <div class="form-group">
                    <label class="text-light" for="faculty">Faculty</label>
                    <input type="text" class="form-control" id="faculty" placeholder="Enter Faculty i.e. Computer Science and Engineering" name="faculty" value="<?php echo $check['faculty'];   ?>">
                    <div class="error" id="error_faculty"></div>
                </div>
                <div class="form-group">
                    <label class="text-light" for="department">Department</label>
                    <input type="text" class="form-control" id="department" placeholder="Enter Department" name="department" value="<?php echo $check['department'];   ?>">
                    <div class="error" id="error_department"></div>
                </div>
                <div class="form-group">
                    <label class="text-light" for="email">Email</label>
                    <input type="text" class="form-control" id="email" placeholder="Enter Email " name="email" value="<?php echo $check['email'];   ?>">
                    <div class="error" id="error_email"></div>
                </div>
                <button type="button" class="btn btn-info" id="change_pass">Change Password</button>
                <div class="jumbotron" id="passgroup">
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Enter New Password " name="password">
                </div>
                    <div class="error" id="error_pass_length"></div>
                <div class="form-group">
                    <label for="password2">Re Enter Password</label>
                    <input type="password" class="form-control" id="password2" placeholder="Re Enter New Password " name="password2">

                </div>
                    <div class="error" id="error_pass"></div>
                </div>

                <button  class="btn btn-primary" name="submit" id="submit">Submit</button>
                <div  id="result"></div>
                <?php
            }   //while loop
        } //if condition
        else{
            // no result
        }
        ?>
</div>




<?php require_once("includes/footer.php") ?>
