<?php require_once("../includes/session.php") ?>
<?php require_once("../includes/functions.php") ?>
<?php require_once("../includes/head_admin.php") ?>
<?php require_once("../includes/navbar_admin.php") ?>


<?php
//session set
admin_confirm_logged_in()
 //$_SESSION['admin_id'] = 1;
?>


    <div class="card card-primary container">


        <div class="card-header ">
            <h1 style="text-align: center;">PSTU Attendance Management System</h1>
        </div>
        <div id="mainContentAll">

            <div class="page">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4 wow slideInLeft ">
                                    <div class="single-profile-full single-profile pb-4 mt-5"  style="min-height: 330px">
                                        <a href="manage_admin.php"><img class="img img-fluid img-thumbnail" src="../images/icons/admin.png" alt="admin"></a>
                                        <div class="card-body ">
                                            <h2 class="card-title text-center">
                                                <a href="manage_teacher.php">Manage Admin </a>
                                            </h2>
                                            <p class="card-text text-center" >
                                                You can add , update or delete administrative accounts here
                                            </p>
                                        </div>
                                    </div>

                                </div><!-- End .col-md-6 -->
                                <div class="col-md-4 wow slideInLeft ">
                                    <div class="single-profile-full single-profile pb-4 mt-5"  style="min-height: 330px">
                                        <a href="message.php"><img class="img img-fluid img-thumbnail " src="../images/icons/envelope.png" alt="message"></a>
                                        <div class="card-body ">
                                            <h2 class="card-title text-center">
                                                <a href="message.php">Messages </a>
                                            </h2>
                                            <p class="card-text text-center" >
                                                View messages from users
                                            </p>
                                        </div>
                                    </div>

                                </div><!-- End .col-md-6 -->
                                <div class="col-md-4 wow slideInLeft ">
                                    <div class="single-profile-full single-profile pb-4 mt-5"  style="min-height: 330px">
                                        <a href="manage_teacher.php"><img class="img img-fluid img-thumbnail " src="../images/icons/teacher.png" alt="teacher"></a>
                                        <div class="card-body ">
                                            <h2 class="card-title text-center">
                                                <a href="manage_teacher.php">Manage Teacher </a>
                                            </h2>
                                            <p class="card-text text-center" >
                                                You can add  or delete Teacher accounts here
                                            </p>
                                        </div>
                                    </div>

                                </div><!-- End .col-md-6 -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>


<?php require_once("../includes/footer.php") ?>