<?php require_once("includes/session.php") ?>
<?php require_once("includes/dbconnect.php") ?>
<?php require_once("includes/functions.php") ?>
<?php require_once("includes/head2.php") ?>
<?php require_once("includes/navbar_student.php") ?>
<?php
 if(isset($_SESSION['admin_id']) ){
     redirect_to("admin_area/admin.php");
 }
 elseif ( isset($_SESSION['teacher_id'])){
     redirect_to("teacher.php");
 }
?>
<script>

    $(document).ready(function () {
        //username validation
        $("#username").keyup(function () {
            var username_current = $("#username").val();
            //  alert("hi");
            $.ajax({
                url:"includes/validation.php",
                method:"post",
                data: {username_current:username_current,action:"username"},
                success:function (data) {
                    // alert("hi");
                    if (data === "invalid username") {
                        //alert("invalid");
                        $("#login").prop('disabled',true);
                        $('#error_username').show();
                        $('#error_username').html(data);
                        return;
                    }
                    else {
                        // alert(data);
                        $('#error_username').hide();
                        $("#login").prop('disabled',false);
                    }
                }
            });
        });

        //login
        $("#login").click(function () {
            // alert("worked");
            var option = $("#select_login_type").val();
            var username = $("#username").val();
            var password = $("#password").val();
           // var captcha =  grecaptcha.getResponse();

            if (option == "" || username == "" || password == "" ){
                $('#messageLogin').show();
                $("#messageLogin").html('Please Fill Up All The Fields!');
                return;
            }
            if($("#remember_me").is(":checked")){

                var checked = "true";
              //  alert("checked");

            }
            else {
                var checked = "false";
                //alert("not checked");
            }
            //  $("#error").html('filled up');
            // return;
            $.ajax({
                url:"process_login.php",
                method:"post",
                data: {option:option, username:username, password:password, checked:checked},   // captcha:captcha
                success:function (data) {
                   // grecaptcha.reset();
                    if(data == "teacher"){
                        window.location.replace("teacher.php");

                        return;
                    }
                    else if(data == "admin"){
                        window.location.replace("admin_area/admin.php");
                        return;
                    }
                    else {
                        $('#messageLogin').show()
                        $('#messageLogin').html(data);
                        return;
                    }



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
                    $('#message_login').show();
                    $('#message_login').html(msg);
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




        //student attendance inquiry
        $("#submit").click(function () {
           // alert("worked");

            var roll = $("#roll").val();
           var course_code = $("#course_code").val();
            var session = $("#session").val();

            if (roll == "" || course_code == "" || session == "" ){
                $('#content').hide();
                $('#error').show();
                $("#error").html('Please Fill Up All The Fields!');
                return;
            }

          //  $("#error").html('filled up');
               // return;


            $.ajax({
                url:"process_student_record_search.php",
                method:"post",
                data: {get_roll:roll, get_course_code:course_code, get_session:session},
                success:function (data) {
                    $("#outer_content").show();
                    $("#print_me").show();
                    $('#error').hide();
                    $('#content').show();
                    $('#content').html(data);



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
                    $('#error').show();
                    $('#error').html(msg);
                }

            });
        });

        if(!$.trim($("#content").html())){
           //alert("yes");
            $("#outer_content").hide();
            $("#print_me").hide();
        }


        //print
        $("#print_me").click(function (){
         //   alert("print");
            $("#outer_content").show();
            $("#query_content").hide();
            $("#heading").hide();
            $("#print_me").hide();
            window.print();
            $("#query_content").show();
            $("#heading").show();
            $("#print_me").show();
        });


        //print
  //    $("#printme").click(function () {
     //     var mode = 'iframe';
      //    var close = mode == "popup";
         // var options = (mode : mode , popClose : close);
       //   $("div.content").printArea(options());
     // });
        //print
       //    $("#printme").click(function () {
        //     var mode = 'iframe';
        //    var close = mode == "popup";
        // var options = (mode : mode , popClose : close);
      //     $("#content").printThis();
      //   });


    });


</script>
    <center><h1 id="heading" style="color: white;background-color: rgb(10,69,70); width: 50%;  box-shadow: 5px 5px 8px 5px white;">Student Dashboard</h1></center>
<div class="container" id="query_content">
<div class="d-flex">
    <h2 class="mr-auto text-light">Attendance Inquiry</h2>

</div>


    <div class="form-group">
        <label class="text-light" for="roll">Roll</label>
        <input type="text" class="form-control" id="roll" placeholder="Enter Roll No. i.e. 1602022" name="roll">
        <div class="error text-light" id="error_roll"></div>
    </div>
    <div class="form-group">
        <label class="text-light" for="course_code">Course Code</label>
        <input type="text" class="form-control" id="course_code" placeholder="Enter Course Code i.e. CIT-121" name="course_code">
        <div class="error text-light" id="error_course_code"></div>
    </div>

    <div class="form-group">
        <label class="text-light" for="session">Session</label>
        <input type="text" class="form-control" id="session" placeholder="Enter Session i.e. 2013-14" name="session">
        <div class="error text-light" id="error_session"></div>
    </div>
    <button  class="btn btn-primary" name="submit" id="submit">Submit</button>

    <div class="alert alert-warning "  id="error" style="display: none;"></div>
</div>
<div>
    <div class="card card-primary container outer_container "  id="outer_content" >


<div class="card card-primary container " id="content" >
    </div>
    <div class="card-footer">
    <button type='button' class='btn btn-outline-success' id='print_me' >Print</button>
    </div>
    </div>




<?php require_once("includes/footer.php") ?>
<div class="modal fade content_modal" id="loginModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content" id="loginModal_content">
            <div class="modal-header">

                <h4 class="modal-title align-center text-light" >Log In</h4>
                <button type="button" class="close" data-dismiss="modal" >&times;</button>

            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="text-light" for="select_login_type">Log In As </label>
                    <select class="form-control" id="select_login_type" name="loginoption" >
                        <option selected="true" disabled>Choose..</option>
                        <option value="teacher">Teacher</option>
                        <option value="admin">Admin</option>
                    </select>

                </div>

                <div class="form-group">
                    <label class="text-light" for="username">Username</label>
                    <input type="text" class="form-control" id="username" placeholder="Enter Username" name="username" ">
                    <div class="error text-light" id="error_username"></div>
                </div>
                <div class="form-group">
                    <label class="text-light" for="password">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Enter Password " name="password">
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="remember_me" name="remember_me">
                    <label class="form-check-label text-light" for="remember_me">Remember Me</label>
                </div>

                <div class="form-group" >
                <div class="g-recaptcha" data-sitekey="6LegaYwUAAAAALKkJnJQeQKU3_l5UbLRpDSnEB8w"></div>
                </div>

                <button  class="btn btn-success" name="submit" id="login">Log In</button>
                <div  id="messageLogin" class="text-light"  ></div>
            </div>
        </div>
    </div>
</div>
<?php require_once("includes/footer.php") ?>