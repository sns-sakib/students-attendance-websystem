<?php require_once("includes/session.php") ?>
<?php require_once("includes/dbconnect.php") ?>
<?php require_once("includes/functions.php") ?>


 <?php

    if(isset($_POST['action'])){
        // echo $_POST['courseCode']." semester : ".$_POST['semester'] ;
        $name = mysqli_prep($_POST['name']);
        $roll =mysqli_prep( $_POST['roll']);
        $session = mysqli_prep($_POST['session']);
        $student_id = mysqli_prep($_POST['student_id']);
        $course_code =  $_POST['course_code'];

        if(existing_student($roll,$course_code)){
            echo "<div class = 'alert alert-danger' >Student Exists! </div>".mysqli_error($conn);
            exit;
        }
            $query = "UPDATE `student` SET `name`='$name',`roll`='$roll',`session`='$session' WHERE `id` = '$student_id ' ; UPDATE `attendance` SET `student_roll`='$roll' WHERE `student_id` = '$student_id ' ";
            // echo $query;
            $resultUpdate = mysqli_multi_query($conn,$query);
            if ($resultUpdate) {
                echo "<div class = 'alert alert-success' >Student Updated Successfully! </div>";
                exit;
               // redirect_to("attendance_page.php?course_id=".$course_id."&course_code=".$course_code);
            }
            else {
                echo "<div class = 'alert alert-danger' >Data Insertion Failed! </div>".mysqli_error($conn);
                exit;
            }


    }
    ?>

<?php require_once("includes/head2.php") ?>

<?php require_once("includes/navbar.php") ?>
<?php
//session check
teacher_confirm_logged_in();
?>
<?php
if(isset($_GET['course_code'])) {
    $course_code = $_GET['course_code'];  // for button back and redirection and other queries
    $course_id = $_GET['course_id'];
    $student_id = $_GET['student_id'];
}
?>
<input type="text" style="display: none" id="course_id" value="<?php echo $course_id; ?>" >
<input type="text" style="display: none" id="course_code" value="<?php echo $course_code; ?>" >
<input type="text" style="display: none" id="student_id" value="<?php echo $student_id; ?>" >


<script>

    /* $(document).ready(function () {
         alert("before worked");
     });*/
    $(function () {

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


        // update
        $("#submit").click(function () {

            var course_code = $("#course_code").val();
            var student_id = $("#student_id").val();
            var session = $("#session").val();
            var course_id =  $("#course_id").val();
            var name =  $("#name").val();
            var roll =  $("#roll").val();
           // alert(student_id);
            //  alert(semester);
            if (student_id == "" || roll == "" || name == "" || session == "" || course_code == "" || course_id ==""){
                $('.result').show();
                $(".result").html('Please Fill Up All The Fields!');
                return;
            }
            //  $("#error").html('filled up');
            // return;
            $.ajax({
               // url:"update_class.php",
                method:"post",
                data: {course_code:course_code, student_id:student_id, session:session, course_id:course_id , roll:roll,name:name, action: "update_student"},
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
        <h2 class="mr-auto text-light">Update Student</h2>
        <a href="attendance_page.php?course_id=<?php echo $course_id; ?>&course_code=<?php echo $course_code; ?>" class="btn btn-primary " ><span><img class="my_icon" src="images/icons/left-arrow.png" data-toggle="tooltip" title="Back"></span>&nbsp;Back</a>
    </div>

   <?php

    $query = "SELECT  `name`, `roll`, `session`  FROM `student` WHERE `id` = '$student_id' ";
    // echo $query;
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
            <input type="text" class="form-control" id="name" placeholder="Enter Name  " name="name" value="<?php echo $check['name']  ?>">
            <div class="error" id="error_name"></div>
        </div>
        <div class="form-group">
            <label class="text-light" for="roll">Roll</label>
            <input type="text" class="form-control" id="roll" placeholder="Enter Roll No. i.e. 1602022" name="roll" value="<?php echo $check['roll']  ?>">
            <div class="error" id="error_roll"></div>
        </div>

        <div class="form-group">
            <label class="text-light" for="session">Session</label>
            <input type="text" class="form-control" id="session" placeholder="Enter Session i.e. 2013-14" name="session" value="<?php echo $check['session']  ?>">
            <div class="error" id="error_session"></div>
        </div>
        <button type="button" class="btn btn-primary" name="submit" id="submit">Update</button>
            <div class="result"></div>
            <?php
        }   //while loop
        } //if condition
        else{
            // no result
        }

        mysqli_free_result($result);
        ?>

</div>




<?php require_once("includes/footer.php") ?>
*/