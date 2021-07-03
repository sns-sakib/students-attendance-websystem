<?php require_once("includes/session.php") ?>
<?php require_once("includes/dbconnect.php") ?>
<?php require_once("includes/functions.php") ?>
<?php require_once("includes/head2.php") ?>
<?php require_once("includes/navbar.php") ?>
<?php
//session check
teacher_confirm_logged_in();
?>

    <div class="card card-primary container">
        <div class="card-header ">
            <h1 style="text-align: center;"><?php echo "Date: ".$_GET['date']; ?></h1> <!-- Date -->
        </div>
        <div class="card-body  " >
            <?php

            $course_code = $_GET['course_code'];
            $course_id = $_GET['course_id'];
            $date = $_GET['date'];
            //after submit, updating the valus
            if(isset($_POST['submit'])){
                $att = $_POST['attendance'];
                // echo "<div class = 'alert alert-warning' >".$date."</div>";

                $b = false;
                foreach ($att  as $key=>$value) {
                    if($value == "Present") {
                        $query = "UPDATE attendance SET `attendance_value`='Present' WHERE `course_id` = '$course_id' AND `date` = '$date' AND `student_id` = '$key' ";                                 //  echo $query;
                        $updateResult = mysqli_query($conn, $query);
                    }
                    if($value == "Absent") {
                        $query = "UPDATE attendance SET `attendance_value`='Absent' WHERE `course_id` = '$course_id' AND `date` = '$date' AND `student_id` = '$key'  ";                                 //  echo $query;
                        $updateResult = mysqli_query($conn, $query);
                    }


                }
                if($updateResult){
                    echo "<div class = 'alert alert-success' >Record Saved! </div>";
                    redirect_to("attendance_list.php?course_id= ".$course_id."&course_code=".$course_code);
                }
                else{
                    echo "<div class = 'alert alert-warning' >Unsuccessful 2 </div>".mysqli_error($conn);
                }

            }
            ?>
            <div class="col-sm-12 ">

                <a href="attendance_list.php?course_id=<?php echo $course_id; ?>&course_code=<?php echo $course_code; ?>" class="btn btn-outline-success float-right" ><span><img class="my_icon" src="images/icons/left-arrow.png" data-toggle="tooltip" title="Back"></span>&nbsp;Back</a>
            </div>
            <div class="d-flex flex-column-reverse">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Serial No.</th>
                        <th>Roll No.</th>
                        <th>Name</th>
                        <th>Attendance</th>

                    </tr>
                    </thead>
                    <form method="post" >
                        <tbody>
                        <?php

                        $query = "select std.id, std.roll, std.name, std.course_id, att.student_id, att.attendance_value,att.date from student std inner join attendance att on std.course_id = att.course_id  and att.course_id = '$course_id' and att.date = '$date' and std.id = att.student_id order by std.roll";
                        //echo $query;
                        $result = mysqli_query($conn, $query);
                        if($result === FALSE){
                            echo "<div class = 'alert alert-warning' >Unsuccessful </div>".mysqli_error($conn);
                        }
                        if(mysqli_num_rows($result) > 0) {
                            $i = 0; // for serial
                            while ($show = $result->fetch_assoc()) { // $show is associative array from query
                                $i++;
                                ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $show['roll'] ?></td>
                                    <td> <?php echo $show['name'] ?></td>
                                    <td>
                                        <!-- naming them with attendance array in which index is student id for updating purpose -->
                                        Present<input type="radio" name="attendance[<?php echo $show['id'] ?>]" value="Present"
                                            <?php
                                            //checked if present
                                            if($show['attendance_value'] == "Present")
                                                echo "checked";
                                            ?>>

                                        Absent<input type="radio" name="attendance[<?php echo $show['id'] ?>]" value="Absent"
                                            <?php
                                                 if($show['attendance_value'] == "Absent")
                                                    echo "checked";
                                        ?>>
                                    </td>
                                </tr>
                            <?php }

                        }
                        else{
                            echo "<div class = 'alert alert-warning' >No data Found! </div>";
                        }
                        ?>
                        <!-- Submit -->
                        <input type="submit" name="submit" class="btn btn-primary mr-auto " value="Update" >
                        </tbody>
                    </form>

                </table>
            </div>
        </div>


        <div class="card-footer">

        </div>
    </div>


<?php require_once("includes/footer.php") ?>