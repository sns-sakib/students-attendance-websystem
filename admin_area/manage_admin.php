<?php require_once("../includes/session.php") ?>
<?php require_once("../includes/functions.php") ?>
<?php require_once("../includes/dbconnect.php") ?>
<?php require_once("../includes/head_admin.php") ?>
<?php require_once("../includes/navbar_admin.php") ?>
<?php
//session set
admin_confirm_logged_in();
?>

    <div class="card card-primary container">
        <div class="card-header ">
            <h1 style="text-align: center;">Manage Admin</h1>
        </div>
        <div class="card-body  " >
            <div class="d-flex ">
                <a href="create_admin.php" class="btn btn-primary mr-auto">Create Admin</a>
                <a href="admin.php" class="btn btn-primary flex-end">Back</a>
            </div>

            <div class="d-flex flex-column-reverse">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Serial No.</th>
                        <th>Admin Name</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                        <tbody>
                        <?php
                        $query = "select * from ama.admin ";
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
                                    <td>
                                        <div class="dropdown dropright">
                                            <a type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" style="color: white;">
                                                Actions
                                            </a>
                                            <div class="dropdown-menu bg-warning">
                                                <a  href="delete_admin.php?admin_id=<?php echo $show['id'];   ?>" class=" dropdown-item
                                                    <?php
                                                    if($show['id'] == $_SESSION['admin_id']){
                                                        echo " btn disabled\" onclick=\"return false;\"" ;
                                                         }
                                                    else{
                                                        echo " \" ";
                                                    }
                                                    ?> >Delete</a>
                                                <a class=" dropdown-item" href="update_admin.php?admin_id=<?php echo $show['id'];   ?>">Update</a>

                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php }
                        }
                        else{
                            echo "<div class = 'alert alert-warning' >No Students Found! Add students First! </div>";
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