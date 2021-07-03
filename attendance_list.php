<?php require_once("includes/session.php") ?>
<?php require_once("includes/functions.php") ?>
<?php require_once("includes/dbconnect.php") ?>
<?php require_once("includes/head2.php") ?>

<?php require_once("includes/navbar.php") ?>
<?php
//session check
teacher_confirm_logged_in();
?>
<?php
$course_id_current = 0;
$course_code_current = "";
$date_current = "";


?>
<div class="card card-primary container">

    <div class="card-header ">
        <h1 style="text-align: center;"><?php echo $_GET['course_code'];  ?></h1>
    </div>

    <div class="card-body" >
            <div class="d-flex ">
                <a href="attendance_page.php?course_id=<?php echo $_GET['course_id']; ?>&course_code=<?php echo $_GET['course_code']; ?>" class="btn btn-success mr-auto" >Take Attendance</a>
                <a href="status_report.php?course_id=<?php echo $_GET['course_id']; ?>&course_code=<?php echo $_GET['course_code']; ?>" class="btn btn-success mr-auto" >Status Report</a>

                <a href="classes.php" class="btn btn-success"><span><img class="my_icon" src="images/icons/left-arrow.png" data-toggle="tooltip" title="Back0"></span>&nbsp;Back</a>
            </div>
        <?php
        if(isset($_GET['date_delete'])){
            $course_id = $_GET['course_id'];
            $course_code = $_GET['course_code'];
            $date = $_GET['date_delete'];
            //  echo $teacher_id;
            $query = "DELETE FROM `attendance` WHERE  course_id = '$course_id' AND `date` = '$date' "  ;
//              echo $query;
            $result = mysqli_query($conn,$query);
            if($result === FALSE){
                echo "<div class = 'alert alert-warning' >Unsuccessful </div>".mysqli_error($conn);
            }
            else{
                echo "<div class = 'alert alert-success' >Deleted </div>";
                redirect_to("attendance_list.php?course_id= ".$course_id."&course_code=".$course_code);
            }
        }

        ?>
            <div class="d-flex flex-column-reverse">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Serial No</th>
                        <th>Date</th>
                        <th>Action</th>

                    </tr>
                    </thead>
                    <?php
                    $course_code = $_GET['course_code'];
                    $course_id = $_GET['course_id'];
                    $query = "select distinct `date` from ama.attendance where `course_id` = '$course_id'";
                    $result = mysqli_query($conn,$query);
                    if($result === FALSE){
                        echo "<div class = 'alert alert-warning' >Unsuccessful </div>".mysqli_error($conn);
                    }

                    if(mysqli_num_rows($result) > 0){
                        $i = 0;
                        while($val = $result->fetch_assoc()){
                            $i++;
                            ?>
                            <tr>
                                <td>
                                    <?php echo $i;  ?>
                                </td>

                                <td>
                                    <?php echo $val['date'];  ?>
                                </td>

                                <td>
                                    <div class="dropdown dropright">
                                        <a type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" style="color: white;">
                                            Actions
                                        </a>
                                        <div class="dropdown-menu bg-info">
                                            <a class=" dropdown-item" href="#" <?php $course_id_current = $course_id;    $date_current= $val['date'];  $course_code_current= $course_code;  ?> data-toggle="modal" data-target="#delete_list"><span><img class="my_icon" src="images/icons/rubbish-bin.png" data-toggle="tooltip" title="Delete Student"></span>&nbsp;Delete</a>
                                            <a class=" dropdown-item" href="view_record.php?course_id=<?php echo $course_id; ?>&date=<?php echo $val['date'];  ?>&course_code=<?php echo $course_code;  ?>"><span><img class="my_icon" src="images/icons/led-display.png" data-toggle="tooltip" title="Delete Student"></span>&nbsp;View</a>

                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </table>
            </div>
        </div>




        <div class="card-footer">

        </div>
    </div>



    <?php require_once("includes/footer.php") ?>
<div class="modal fade content_modal" id="delete_list" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title align-center" >Are you sure?</h4>
                <button type="button" class="close" data-dismiss="modal" >&times;</button>

            </div>

            <div class="modal-footer">

                <div class="container">
                    <div class="row d-flex justify-content-between">
                        <div class="p-2">
                            <button type="button " class="btn btn-outline-dark " data-dismiss="modal">Cancel</button>
                        </div>

                        <div class="p-2">
                            <a type="button" href="attendance_list.php?course_id=<?php echo $course_id_current;   ?>&date_delete=<?php echo $date_current;  ?>&course_code=<?php echo $course_code_current;  ?>" class="btn btn-outline-danger" id="btndelete">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once("includes/footer.php") ?>