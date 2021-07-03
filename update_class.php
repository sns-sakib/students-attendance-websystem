
<?php require_once("includes/session.php") ?>
<?php require_once("includes/dbconnect.php") ?>
<?php require_once("includes/functions.php") ?>

<?php
if(isset($_POST['action'])){
    $course_code = mysqli_prep($_POST['course_code']);
    $course_title = mysqli_prep($_POST['course_title']);
    $course_id = mysqli_prep($_POST['course_id']);
    $semester =mysqli_prep( $_POST['semester']);





    $query = "UPDATE `course` SET `course_code`='$course_code',`course_title`='$course_title',`semester`='$semester' WHERE `id` = '$course_id' ; UPDATE `student` SET `course_code`='$course_code' WHERE `course_id` = '$course_id'; UPDATE `attendance` SET `course_code`='$course_code' WHERE `course_id` = '$course_id'";
    //  echo $query;
    $result = mysqli_multi_query($conn, $query);
    if($result === FALSE){
        echo "Unsuccessful ".mysqli_error($conn);
        exit;
    }
    else{
        echo "Updated ";
        exit;
        // redirect_to("classes.php");
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
if(isset($_GET['course_id'])) {
    $course_id = $_GET['course_id'];
}
?>
<input type="text" style="display: none" id="course_id" value="<?php echo $course_id; ?>" >

<script>

   /* $(document).ready(function () {
        alert("before worked");
    });*/
   $(function () {
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





       // class
        $("#submit").click(function () {

            var course_code = $("#course_code").val();
            var course_title = $("#course_title").val();
            var semester = $("#selectSemester").val();
            var course_id =  $("#course_id").val();
          //  alert(semester);
            if (course_title == "" || course_code == "" || semester == null  || course_id ==""){
                $('.result').show();
                $(".result").html('Please Fill Up All The Fields!');
                return;
            }
            //  $("#error").html('filled up');
            // return;
            $.ajax({
                url:"update_class.php",
                method:"post",
                data: {course_code:course_code, course_title:course_title, semester:semester, course_id:course_id , action: "update_class"},
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
        <h2 class="mr-auto text-light">Update Class</h2>
        <a href="classes.php" class="btn btn-primary " ><span><img class="my_icon" src="images/icons/left-arrow.png" data-toggle="tooltip" title="Back"></span>&nbsp;Back</a>
    </div>

    <?php
    //$teacher_id = $_SESSION['teacher_id'];






        //search previous data

        $query = "SELECT  `course_code`, `course_title`, `semester`  FROM `course` WHERE `id` = '$course_id' ";
        // echo $query;
        $result = mysqli_query($conn, $query);
        if ($result === FALSE) {
            echo "<div class = 'alert alert-warning' >Unsuccessful </div>" . mysqli_error($conn);
        }

        ?>


        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($check = $result->fetch_assoc()) {

                ?>
                <div class="form-group">
                    <label class="text-light" for="course_code">Course Code</label>
                    <input type="text" class="form-control" id="course_code"
                           placeholder="Enter Course Code i.e. DLD-221 " name="course_code"
                           value="<?php echo $check['course_code']; ?>">
                    <div class="error" id="error_course_code"></div>
                </div>
                <div class="form-group">
                    <label class="text-light" for="course_title">Course Title</label>
                    <input type="text" class="form-control" id="course_title"
                           placeholder="Enter Course Title i.e. Digital Logic Design" name="course_title"
                           value="<?php echo $check['course_title']; ?>">
                    <div class="error" id="error_course_title"></div>
                </div>
                <div class="form-group">
                    <label class="text-light" for="selectSemester">Semester</label>

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

                <button class="btn btn-primary" name="submit" id="submit">Update</button>
                <div class="result"></div>
                <?php
            }   //while loop
        } //if condition
        else {
            // no result
        }

        ?>

</div>




<?php require_once("includes/footer.php") ?>
