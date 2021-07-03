<?php require_once("../includes/session.php") ?>
<?php require_once("../includes/functions.php") ?>
<?php require_once("../includes/dbconnect.php") ?>
<?php require_once("../includes/head_admin.php") ?>
<?php require_once("../includes/navbar_admin.php") ?>
<?php
//session set
admin_confirm_logged_in()
?>

    <div class="card card-primary container">
        <div class="card-header ">
            <h1 style="text-align: center;">Manage Teacher</h1>
        </div>
        <div class="card-body  " >
            <div class="d-flex ">
                <a href="add_teacher.php" class="btn btn-primary mr-auto">Add Teacher</a>
                <a href="admin.php" class="btn btn-primary flex-end">Back</a>
            </div>
            <?php
                if(isset($_GET['teacher_id'])){
                     $teacher_id = $_GET['teacher_id'];
                //  echo $teacher_id;
                $query = "DELETE FROM `teacher` WHERE  id = '$teacher_id' "  ; // delete only teacher. so courses, attendance records  will be in database.
                $result = mysqli_multi_query($conn,$query);
                if($result === FALSE){
                    echo "<div class = 'alert alert-warning' >Unsuccessful </div>".mysqli_error($conn);
                }
                else{
                    echo "<div class = 'alert alert-success' >Deleted !</div>";
                    redirect_to("manage_teacher.php");
                }
            }

            ?>


            <div class="d-flex flex-column-reverse">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Serial No.</th>
                        <th>Teachers' Name</th>
                        <th>Rank</th>
                        <th>Faculty.</th>
                        <th>Department</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $query = "select * from ama.teacher order by faculty, department, rank ";
                    $result = mysqli_query($conn, $query);
                    if($result === FALSE){
                        echo "<div class = 'alert alert-warning' >Unsuccessful </div>".mysqli_error($conn);
                    }
                    if(mysqli_num_rows($result) > 0) {
                        $i = 0;
                        while ($show = $result->fetch_assoc()) {
                            $i++;
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $show['name'] ?></td>
                                <td><?php echo $show['rank'] ?></td>
                                <td><?php echo $show['faculty'] ?></td>
                                <td><?php echo $show['department'] ?></td>
                                <td>
                                    <a href="manage_teacher.php?teacher_id=<?php echo $show['id'];  ?>" class="btn btn-danger" onclick = "return confirm('Are you sure?');" >Delete</a>
                                </td>
                            </tr>
                        <?php }
                    }
                    else{
                        echo "<div class = 'alert alert-warning' >No Teachers Found! Add Teacher First! </div>";
                    }
                    ?>

                    </tbody>


                </table>
            </div>
        </div>


        <div class="card-footer">

        </div>
    </div>


<?php require_once("../includes/footer.php") ?>