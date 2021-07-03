<?php require_once("includes/session.php") ?>
<?php require_once("includes/functions.php") ?>
<?php require_once("includes/head2.php") ?>
<?php require_once("includes/navbar.php") ?>

<?php
    //session check
     teacher_confirm_logged_in();
?>


<div class="card card-primary container">


    <div class="card-header ">
        <h1 style="text-align: center;">PSTU Attendance Management System</h1>
    </div>

    <div class="card-body  " >

        <div >
            <p class="text-center">Welcome to dashboard, <?php echo $_SESSION['teacher_name']; ?>
            </p>
        </div>
    </div>




    <div class="card-footer">

    </div>
</div>
    <div class="content container" id="carousel_content">

                <div class="carousel slide" data-ride="carousel" id="carouselid">
                    <div class="carousel-indicators">
                        <li data-target="#carouselid" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselid" data-slide-to="1"></li>
                        <li data-target="#carouselid" data-slide-to="2"></li>

                    </div>
                    <div class="carousel-inner img-thumbnail" >
                        <div class="carousel-item active">
                            <img src="images/pstu%20(1).jpg" alt="Lifestyle Photo">

                        </div>
                        <div class="carousel-item">
                            <img src="images/pstu%20(2).jpg" alt="Mission">

                        </div>
                        <div class="carousel-item">
                            <img src="images/pstu%20(3).jpg" alt="Vaccinations">

                        </div>


                    </div>
                    <a class="carousel-control-prev" href="#carouselid" role="button" data-slide="prev"><span class="carousel-control-prev-icon"></span> </a>
                    <a class="carousel-control-next" href="#carouselid" role="button" data-slide="next"><span class="carousel-control-next-icon"></span> </a>
                </div>


    </div><!-- content container -->

<?php require_once("includes/footer.php") ?>