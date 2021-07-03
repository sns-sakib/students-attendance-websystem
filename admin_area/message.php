<?php require_once("../includes/session.php") ?>
<?php require_once("../includes/functions.php") ?>
<?php require_once("../includes/dbconnect.php") ?>
<?php require_once("../includes/head_admin.php") ?>
<?php require_once("../includes/navbar_admin.php") ?>
<?php
//session set
  admin_confirm_logged_in();
?>
<?php
if(isset($_GET['message_id'])){
    $message_id = $_GET['message_id'];
    //  echo $teacher_id;
    $query = "DELETE FROM `contact` WHERE  id = '$message_id' " ; ;
    // echo $query;
    $result = mysqli_multi_query($conn,$query);
    if($result === FALSE){
        echo "<div class = 'alert alert-warning' >Unsuccessful </div>".mysqli_error($conn);
    }
    else{
        echo "<div class = 'alert alert-success' >Deleted </div>";
        redirect_to("message.php");
    }
}

?>


    <div class="card card-primary container">
        <div class="card-header ">
            <h1 style="text-align: center;">Messages</h1>
        </div>
        <div class="card-body  " >
            <div class="d-flex ">
                <a href="admin.php" class="btn btn-primary flex-end">Back</a>
            </div>

            <div class="d-flex flex-column-reverse">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Serial No.</th>
                        <th>Name</th>
                        <th>Messages</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $query = "select * from ama.contact ";
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
                                <td><?php echo $show['message'] ?></td>
                                <td>
                                        <div>
                                            <a  href="message.php?message_id=<?php echo $show['id'];  ?>" >Delete</a>
                                        </div>
                                </td>
                            </tr>
                        <?php }
                    }
                    else{
                        echo "<div class = 'alert alert-warning' >No Messages Found!  </div>";
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