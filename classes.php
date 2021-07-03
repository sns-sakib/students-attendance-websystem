<?php require_once("includes/session.php") ?>
<?php require_once("includes/dbconnect.php") ?>
<?php require_once("includes/functions.php") ?>

<?php require_once("includes/head2.php") ?>

<?php require_once("includes/navbar.php") ?>
<?php
//session check
teacher_confirm_logged_in();
?>
<?php
$course_id_current = 0;

?>

    <div class="card card-primary container">

        <div class="card-header ">
            <h1 style="text-align: center;">Classes</h1>
        </div>

        <div class="card-body  " >
            <div class="d-flex ">

                <a href="add_class.php" class="btn btn-outline-success flex-end"  ><span><img class="my_icon" src="images/icons/plus.png" data-toggle="tooltip" title="Add Class"></span>&nbsp;Add Class</a>
            </div>
            <?php
            if(isset($_GET['course_id_delete'])){
                $course_id = $_GET['course_id_delete'];
                //  echo $teacher_id;
                $query = "DELETE FROM `course` WHERE  id = '$course_id'  ; DELETE FROM `student` WHERE  course_id = '$course_id'; DELETE FROM `attendance` WHERE  course_id= '$course_id';";
               // echo $query;
                $result = mysqli_multi_query($conn,$query);
                if($result === FALSE){
                    echo "<div class = 'alert alert-warning' >Unsuccessful </div>".mysqli_error($conn);
                }
                else{
                    echo "<div class = 'alert alert-success' >Deleted </div>";
                    redirect_to("classes.php");
                }
            }

            ?>

            <div class="d-flex flex-column-reverse">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Serial No</th>
                        <th>Course</th>
                        <th>Action</th>

                    </tr>
                    </thead>
                    <?php

                    $teacher_id = $_SESSION['teacher_id'];
                  //  echo $teacher_id;
                    $query = "select `course_code`, `id`  from ama.course WHERE teacher_id = '$teacher_id' ";
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
                                    <a href="attendance_list.php?course_id=<?php echo $val['id']; ?>&course_code=<?php echo $val['course_code']; ?>" class="btn btn-success">
                                    <?php echo $val['course_code'];  ?>
                                    </a>

                                </td>

                                <td>




                                    <div class="dropdown dropright">
                                        <a type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" style="color: white;">
                                            Actions
                                        </a>
                                        <div class="dropdown-menu bg-info">
                                            <a class=" dropdown-item" id="delete_link" href="#" <?php  $course_id_current = $val['id'];  ?> data-toggle="modal" data-target="#delete" ><span><img class="my_icon" src="images/icons/rubbish-bin.png" data-toggle="tooltip" title="Delete Student"></span>&nbsp;Delete</a>
                                            <a class=" dropdown-item" href="update_class.php?course_id=<?php echo $val['id']; ?>"><span><img class="my_icon" src="images/icons/update.png" data-toggle="tooltip" title="Update Student"></span>&nbsp;Update</a>

                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    else{
                        echo "<div class = 'alert alert-warning' >No Courses Found! </div>";
                    }
                    ?>
                </table>
            </div>
        </div>

        <div class="card-footer">

        </div>
    </div>



<?php require_once("includes/footer.php") ?>

<div class="modal fade delete_modal" id="delete" role="dialog">
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
                            <a type="button" href="classes.php?course_id_delete=<?php echo $course_id_current;   ?>" class="btn btn-outline-danger" id="btndelete">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once("includes/footer.php") ?>
