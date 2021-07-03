<?php require_once("../includes/session.php") ?>
<?php require_once("../includes/functions.php") ?>
<?php require_once("../includes/dbconnect.php") ?>
<?php require_once("../includes/head_admin.php") ?>
<?php require_once("../includes/navbar_admin.php") ?>
<?php
//session set
admin_confirm_logged_in()
?>

    <script>
        $(document).ready(function () {
            //name validation
            $("#name").keyup(function () {
                var name_current = $("#name").val();
                //  alert("hi");
                $.ajax({
                    url:"../includes/validation.php",
                    method:"post",
                    data: {name_current:name_current,action:"name"},
                    success:function (data) {
                        // alert("hi");
                        if (data === "invalid name") {
                            //alert("invalid");
                            $("#submit").prop('disabled',true);
                            $('#error_name').show();
                            $('#error_name').html(data);
                            return;
                        }
                        else {
                            // alert(data);
                            $('#error_name').hide();
                            $("#submit").prop('disabled',false);
                        }
                    }
                });
            });


            //password length
            $("#password_new").keyup(function (){

                var pass_data = $("#password_new").val();
                if (pass_data.length <= 5){
                    $("#submit").prop('disabled',true);
                    $('#error_pass_length').show();
                    $('#error_pass_length').html("Password must contain at least 6 characters<br><br>");
                }
                else{
                    $("#submit").prop('disabled',false);
                    $('#error_pass_length').hide();
                }

            });

        });


    </script>



    <div class="container">
        <div class="d-flex">
            <h2 class="mr-auto text-light">Update Admin </h2>
            <a href="manage_admin.php" class="btn btn-primary " >Back</a>
        </div>

        <?php
        $admin_id = $_GET['admin_id'];
        if(isset($_POST['submit'])){
            // echo $_POST['courseCode']." semester : ".$_POST['semester'] ;
            $name = mysqli_prep($_POST['name']);
           $username = mysqli_prep($_POST['username']);
            $password_current = mysqli_prep($_POST['password_current']);
            $password_new = mysqli_prep($_POST['password_new']);

            if($name ==""  || $password_current == "" || $password_new == ""){
                echo "<div class = 'alert alert-warning' >Fields must not be empty! </div>";
            }

            $query = "SELECT * FROM admin WHERE username = '$username' ";
            // echo $query;
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) != 1) {
                echo "<div class = 'alert alert-warning' >Invalid  Username! </div>";
                //redirect_to("classes.php");
            } else {
                $show = mysqli_fetch_assoc($result);
                if(!password_match($password_current,$show['password'])){
                    echo "<div class = 'alert alert-warning' >Invalid  Password! </div>";
                }
                else{
                    $password_new = encrypted_password($password_new);
                $query = "UPDATE admin SET  `name` = '$name' , password = '$password_new' where  id = '$admin_id' ";
                // echo $query;
                $result = mysqli_query($conn, $query);
                if ($result) {
                    echo "<div class = 'alert alert-success' >Admin Updated Successfully! </div>";
                    //redirect_to("classes.php");
                } else {
                    echo "<div class = 'alert alert-danger' >Update Failed! </div>" . mysqli_error($conn);
                }
                }
            }



        }
        else{
            // problem
        }
        ?>
        <?php

        //search previous data

        $query = "SELECT  * FROM `admin` WHERE `id` = '$admin_id' ";
        // echo $query;
        $result = mysqli_query($conn, $query);
        if($result === FALSE){
            echo "<div class = 'alert alert-warning' >Unsuccessful </div>".mysqli_error($conn);
        }

        ?>


        <form method="post" >
            <?php
                if(mysqli_num_rows($result) > 0) {
                      while ($check = $result->fetch_assoc()) {

            ?>
            <div class="form-group">
                <label class="text-light" for="name">Name</label>
                <input type="text" class="form-control" id="name"  name="name" value="<?php echo $check['name'];   ?>">
                <div class="error" id="error_name"></div>
            </div>
            <div class="form-group">
                <label class="text-light" for="username">Username</label>
                <input type="text" class="form-control" id="username"  name="username" value="<?php echo $check['username'];   ?>" readonly >
            </div>

            <div class="form-group">
                <label class="text-light" for="password_current">Current Password</label>
                <input type="password" class="form-control" id="password_current" placeholder="Enter Current password" name="password_current">
            </div>
            <div class="form-group">
             <label class="text-light" for="password_new">New Password</label>
               <input type="password" class="form-control" id="password_new" placeholder="Enter New password" name="password_new">
                <div class="error" id="error_pass_length"></div>
             </div>
            <button type="submit" class="btn btn-primary" name="submit" id="submit">Submit</button>
                          <?php
                      }   //while loop
                } //if condition
                else{
                    // no result
                }
            ?>
        </form>
    </div>


<?php require_once("../includes/footer.php") ?>