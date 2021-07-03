<?php require_once("../includes/session.php") ?>
<?php require_once("../includes/functions.php") ?>
<?php require_once("../includes/dbconnect.php") ?>
<?php require_once("../includes/head_admin.php") ?>
<?php require_once("../includes/navbar_admin.php") ?>
<?php
//session set
admin_confirm_logged_in()
?>


<div class="container">
    <div class="d-flex">
        <h2 class="mr-auto text-light">Delete Admin</h2>
        <a href="manage_admin.php" class="btn btn-primary " >Back</a>
    </div>

    <?php
    $admin_id = $_GET['admin_id'];
    if(isset($_POST['submit'])) {
        // echo $_POST['courseCode']." semester : ".$_POST['semester'] ;
        $username = mysqli_prep($_POST['username']);
        $password = mysqli_prep($_POST['password']);
        $password2 = mysqli_prep($_POST['password2']);

        if ($username == "" || $password == "" || $password2 == "") {
            echo "<div class = 'alert alert-warning' >Fields must not be empty! </div>";
        } elseif ($_POST['password'] != $_POST['password2']) {
            echo "<div class=\"form-group\">Password Doesnt Match!</div>";
        } else {

            $query = "SELECT * FROM admin WHERE username = '$username' ";
            // echo $query;
            $result = mysqli_query($conn, $query);
            if(!$result){
                echo "Query failed";
            }
            $show = mysqli_fetch_assoc($result);
            if (mysqli_num_rows($result) != 1) {
                echo "<div class = 'alert alert-warning' >Invalid Username/ Password! </div>";
                //redirect_to("classes.php");
            } else {
                if(!password_match($password, $show['password'])){
                    echo "<div class=\"form-group\">Password Doesnt Match!</div>";
                }
                else{
                $query = "DELETE FROM `admin` WHERE id = '$admin_id'";
                // echo $query;
                $result = mysqli_query($conn, $query);
                if ($result) {
                    echo "<div class = 'alert alert-success' >Admin Deleted Successfully! </div>";
                    //redirect_to("classes.php");
                } else {
                    echo "<div class = 'alert alert-danger' >Deletion Failed! </div>" . mysqli_error($conn);
                }
                }
            }

        }
    }
    else{
        // problem
    }
    ?>


    <form method="post" >
        <div class="form-group">
            <label class="text-light" for="username">Username</label>
            <input type="text" class="form-control" id="username" placeholder="Enter Userame  " name="username">
        </div>
        <div class="form-group">
            <label class="text-light" for="password">Password</label>
            <input type="password" class="form-control" id="password" placeholder="Enter Password" name="password">
        </div>

        <div class="form-group">
            <label class="text-light" for="password2">Re Enter Password</label>
            <input type="password" class="form-control" id="password2" placeholder="Re-Enter password" name="password2">
        </div>
        <button type="submit" class="btn btn-danger" onclick = "return confirm('Are you sure?');" name="submit"  >Delete</button>
    </form>
</div>




<?php require_once("../includes/footer.php") ?>

