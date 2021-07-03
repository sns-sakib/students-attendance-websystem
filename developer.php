<?php require_once("includes/session.php") ?>
<?php require_once("includes/dbconnect.php") ?>
<?php require_once("includes/functions.php") ?>
<?php require_once("includes/head2.php") ?>
<?php
if(isset($_SESSION["admin_id"])  ){
    require_once("includes/navbar_admin_2.php");

}
elseif (isset($_SESSION["teacher_id"])){
    require_once("includes/navbar.php") ;

}
else {
    require_once("includes/navbar_student.php");
    require_once("includes/login_ajax.php");
}
?>



<div class="card card-primary container developer">


    <div class="card-header ">
        <h2 class="text-bold border-bottom-0" style="color: rgb(52,58,64);">Developers</h2>
    </div>


    <div id="mainContentAll">

        <div class="page">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6 wow slideInLeft ">
                                <div class="single-profile-full single-profile pb-4 mt-5"  style="min-height: 330px">
                                    <a href="#"><img class="img img-fluid rounded-circle" src="images/sayed_sir.jpg" alt=""></a>
                                    <div class="card-body ">
                                        <h2 class="card-title text-center">
                                            <a href="#"> Moinul Islam Sayed </a>
                                        </h2>
                                        <p class="card-text text-center">
                                            Head Instructor
                                        </p>
                                        <p class="card-text text-center" >
                                            Lecturer<br>
                                            Department of Computer Science and Information Technology<br><br>
                                            Email Address : smoinul@pstu.ac.bd<br>

                                            Phone No : 01741646519 <br>

                                            Address : Barishal
                                        </p>
                                        <p class="card-text text-center" >
                                            <a href="https://www.facebook.com/blue.inf?__tn__=lC-R&eid=ARBvdAfRjZjnG7g4kqUPW1J81TGgbO7oJHfl2UEiNESenkk4k7cuasYPpRq6yFUwc0WqaDcz8qg0F1DG&hc_ref=ARRlGFyCEAFp-pGXf7G_m4Bw6DjzpsNCfpRqhwZhkBIngmSPAEtPwsTTOgmJppEZoPU&__xts__[0]=68.ARAG8MdXcLn3UfWMTIq7DYjT__tSPLADYsbnL2qKlipi1_Z687i2aK8DhIjAvcnzTZUZ88YGujkO8IAXCszSeQRrTSrE77W-Wx04tUA23S0Av5Y16eWR19QThLjpSQiCWR8Xg4uUY0BVOUeUXEq6LFX5LDo69FtlpkzbBohh0Mb38_MC1vGnBvGawP-tGsOaKM4g9hN4lhQadQ127vGZoVUvTKT6NtGuVbbNkC2F0IUq7xG93uEdbxhiAKkAHbjtihKYX10n6fA91n2IbhG0SUCl7pz0a-_3sOTexe03ZHebdTeMgHPJTHbw_2hX9DBTES6t7UJpTlpFi8kp3K6TgNVXu_D51xCWxeoxl6g"><span><img style="height: 20px;width: 20px;" src="images/facebook.png">Visit Facebook Profile</span></a>
                                        </p>
                                    </div>
                                </div>

                            </div><!-- End .col-md-6 -->
                            <div class="col-md-6 wow
                            slideInDown
                            ">
                                <div class="single-profile-full single-profile pb-4 mt-5"  style="min-height: 330px">
                                    <a href="#"><img class="img img-fluid rounded-circle" src="images/1602022.JPG" alt="sakib"></a>
                                    <div class="card-body ">
                                        <h2 class="card-title text-center">
                                            <a href="#"> Syed Nazmus Sakib </a>
                                        </h2>
                                        <p class="card-text text-center" >
                                            Designer and Developer
                                        </p>
                                        <p class="card-text text-center" >
                                            Student<br>
                                            Email Address : nazmusakib.01@gmail.com<br>

                                            Phone No : 01951233084 <br>

                                            Address : Dashani, Bagerhat
                                        </p>
                                        <p class="card-text text-center" >
                                            <a href="https://www.facebook.com/sns.sakib"><span><img style="height: 20px;width: 20px;" src="images/facebook.png">Visit Facebook Profile</span></a>
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

<?php require_once("includes/footer.php") ?>
<?php require_once("includes/modal_login.php") ?>
