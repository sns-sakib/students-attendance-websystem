<?php require_once("includes/session.php") ?>
<?php require_once("includes/dbconnect.php") ?>
<?php require_once("includes/functions.php") ?>


<?php require_once("includes/head2.php") ?>
<?php
//session check
teacher_confirm_logged_in();
?>
<?php require_once("includes/navbar.php") ?>
<?php
$course_code = $_GET['course_code']; // for button back and redirection
$course_id = $_GET['course_id'];
?>

<input id="hidden_id" class="hidden_input" value="<?php echo $course_id;  ?>" style="display: none"></input>
<input id="hidden_code" class="hidden_input" value="<?php echo $course_code;  ?>" style="display: none"></input>

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

        // roll validation
        $("#roll").keyup(function () {
            var roll_current = $("#roll").val();
            //  alert("hi");
            $.ajax({
                url:"includes/validation.php",
                method:"post",
                data: {roll_current:roll_current,action:"roll"},
                success:function (data) {
                    // alert("hi");
                    if (data === "invalid roll") {
                        //alert("invalid");
                        $("#submit").prop('disabled',true);
                        $('#error_roll').show();
                        $('#error_roll').html(data);
                        return;
                    }
                    else {
                        // alert(data);
                        $('#error_roll').hide();
                        $("#submit").prop('disabled',false);
                    }
                }
            });
        });

        //session
        $("#session").keyup(function () {
            var session_current = $("#session").val();
            //  alert("hi");
            $.ajax({
                url:"includes/validation.php",
                method:"post",
                data: {session_current:session_current,action:"session"},
                success:function (data) {
                    // alert("hi");
                    if (data === "invalid session") {
                        //alert("invalid");
                        $("#submit").prop('disabled',true);
                        $('#error_session').show();
                        $('#error_session').html(data);
                        return;
                    }
                    else {
                        // alert(data);
                        $('#error_session').hide();
                        $("#submit").prop('disabled',false);
                    }
                }
            });
        });



        //add student
        $("#submit").click(function () {
            //alert("worked");
            var roll = $("#roll").val();
            var name = $("#name").val();
            var session = $("#session").val();
            //alert(roll);
            var course_code = $("#hidden_code").val();
            var course_id = $("#hidden_id").val();



            if (roll == "" || name == "" || session == "" ){
           
                $('.result').show();
                $(".result").html('Please Fill Up All The Fields!');
                return;
            }

            //  $("#error").html('filled up');
            // return;


            $.ajax({
                url:"process_add_student.php",
                method:"post",
                data: {roll:roll, course_code:course_code, session:session, course_id:course_id, name:name, set_action: "add_student"},
                success:function (data) {
                    $('.result').show();
                    $('.result').html(data);



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
                    $('.result').show();
                    $('.result').html(msg);
                }

            });
        });
    });


</script>






<div class="container">
    <div class="d-flex">
        <h2 class="mr-auto text-light">Add Student</h2>
        <a href="attendance_page.php?course_id=<?php echo $course_id; ?>&course_code=<?php echo $course_code; ?>" class="btn btn-primary " ><span><img class="my_icon" src="images/icons/left-arrow.png" data-toggle="tooltip" title="Back"></span>&nbsp;Back</a>
    </div>

        <div class="form-group">
            <label class="text-light" for="name">Name</label>
            <input type="text" class="form-control" id="name" placeholder="Enter Name  " name="name">
            <div class="error" id="error_name"></div>
        </div>
        <div class="form-group">
            <label class="text-light" for="roll">Roll</label>
            <input type="text" class="form-control" id="roll" placeholder="Enter Roll No. i.e. 1602022" name="roll">
            <div class="error" id="error_roll"></div>
        </div>

        <div class="form-group">
            <label class="text-light" for="session">Session</label>
            <input type="text" class="form-control" id="session" placeholder="Enter Session i.e. 2013-14" name="session">
            <div class="error" id="error_session"></div>
        </div>
        <button  class="btn btn-primary" name="submit" id="submit">Submit</button>
    <div class="result" ></div>

</div>




<?php require_once("includes/footer.php") ?>
