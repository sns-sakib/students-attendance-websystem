<?php require_once("includes/session.php") ?>
<?php require_once("includes/functions.php") ?>
<?php require_once("includes/dbconnect.php") ?>

<?php require_once("includes/head2.php") ?>

<?php require_once("includes/navbar.php") ?>
<?php
//session check
teacher_confirm_logged_in();
?>

<script>
    $(document).ready(function () {
        //course title validation

        $("#course_title").keyup(function () {
            var course_title_current = $("#course_title").val();
            //  alert("hi");
            $.ajax({
                url:"includes/validation.php",
                method:"post",
                data: {name_current:course_title_current,action:"name"}, //course title has same pattern as name
                success:function (data) {
                    // alert("hi");
                    if (data === "invalid name") {
                        //alert("invalid");
                        $("#submit").prop('disabled',true);
                        $('#error_course_title').show();
                        $('#error_course_title').html("Invalid Course Title !");
                        return;
                    }
                    else {
                        // alert(data);
                        $('#error_course_title').hide();
                        $("#submit").prop('disabled',false);
                    }
                }
            });
        });

        //course code validation

        $("#course_code").keyup(function () {
            var course_code_current = $("#course_code").val();
            //  alert("hi");
            $.ajax({
                url:"includes/validation.php",
                method:"post",
                data: {course_code_current:course_code_current,action:"course_code"},
                success:function (data) {
                    // alert("hi");
                    if (data === "invalid course code") {
                        //alert("invalid");
                        $("#submit").prop('disabled',true);
                        $('#error_course_code').show();
                        $('#error_course_code').html(data);
                        return;
                    }
                    else {
                        // alert(data);
                        $('#error_course_code').hide();
                        $("#submit").prop('disabled',false);
                    }
                }
            });
        });


        //add class
        $("#submit").click(function () {
            // alert("worked");

            var course_code = $("#course_code").val();
            var course_title = $("#course_title").val();
            var semester = $("#selectSemester").val();

            if (course_title == "" || course_code == "" || semester == null ){
                $('.result').show();
                $(".result").html('Please Fill Up All The Fields!');
                return;
            }

            //  $("#error").html('filled up');
            // return;


            $.ajax({
                url:"process_add_class.php",
                method:"post",
                data: {course_code:course_code, course_title:course_title, semester:semester , action: "add_class"},
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
    <h2 class="mr-auto text-light">Add Class</h2>
    <a href="classes.php" class="btn btn-primary " ><span><img class="my_icon" src="images/icons/left-arrow.png" data-toggle="tooltip" title="Back"></span>&nbsp;Back</a>
    </div>

        <div class="form-group">
            <label class="text-light" for="course_code">Course Code</label>
            <input type="text" class="form-control" id="course_code" placeholder="Enter Course Code i.e. DLD-221 " name="courseCode">
            <div class="error" id="error_course_code"></div>
        </div>
        <div class="form-group">
            <label class="text-light" for="course_title">Course Title</label>
            <input type="text" class="form-control" id="course_title" placeholder="Enter Course Title i.e. Digital Logic Design" name="courseTitle">
            <div class="error" id="error_course_title"></div>
        </div>
        <div class="form-group">
            <label class="text-light"  for="selectSemester">Semester</label>

                <select class="form-control" id="selectSemester" name="semester">
                    <option selected="true" disabled>Choose...</option>
                    <option value="1">1st</option>
                    <option value="2">2nd</option>
                    <option value="3">3rd</option>
                    <option value="4">4th</option>
                    <option value="5">5th</option>
                    <option value="6">6th</option>
                    <option value="7">7th</option>
                    <option value="8">8th</option>
                </select>

        </div>
        <button  class="btn btn-primary" name="submit" id="submit">Submit</button>
    <div class="result" ></div>

</div>




<?php require_once("includes/footer.php") ?>
