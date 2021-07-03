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


<div class="card card-primary container">


    <div class="card-header ">
        <h2 class="text-bold border-bottom-0" style="color: rgb(52,58,64);">About Us - Overview</h2>
    </div>

    <div class="card-body " >

        <div class="image_about">
           <img class="img-fluid mx-auto d-block img-thumbnail" src="images/pstu5.jpg" alt="pstu image">
        </div>
    </div>




    <div class="card-footer about_us">
    <p>
        Welcome to the Patuakhali Science and Technology University. It is one of the fast growing new public universities in Bangladesh. The university was inaugurated on 08 July 2000 by the then Honorable Prime Minister, Government of the Peoples Republic of Bangladesh, Her Excellency Sheikh Hasina and started its academic activities on 26 February 2002. The main campus of the PSTU is located at about 20 km north from the district town of Patuakhali and about 38 km south from the divisional city of Barishal. The outer campus is situated at Babuganj under Barishal district. Being the lone university in the southern region of the country, the PSTU was established primarily to facilitate easy access to quality higher education to a populace who had been deprived of this prime right for a very long time since the independence of our beloved country. Although situated in a remote area, the PSTU campus is surrounded by the traditional artistic radiant and vibrant green texture of Bangladesh. The interior of the campus is beautifully decorated with different types of natural wild plants, medicinal plants and fruit bearing trees including rows of coconut and mehegoni trees. There are number of lakes and ponds inside the campus which have enhanced its beauty many folds. Despite having comparatively small campus, along with the academic activities, the students of the university have ample opportunities to perform different sports and cultural activities. Although the development activities of the PSTU have been grossly overlooked for many years since its inception, however, we are gradually advancing towards our goal to attain the status of premier institution in teaching and research.The challenges to our higher education system, particularly for a university are to curve out a path and a strategy to become an effective instrument in the process of progressive transformation of this country. In addition to producing graduates who are highly regarded in the job market, our focus is, therefore, also directed towards creating new knowledge and innovative minds. All the necessary steps are being made available at present to ensure appropriate environment for performing academic and research activities in a very harmonic situation. We are striving to instill the sense of right, interest, attitude, morale and intellect in our students so that they are equipped with the best knowledge, skills, competence and attitude that they can utilize for their individual betterment and the prosperity of the society in general.The PSTU has been offering undergraduate and postgraduate programmes in Agriculture, Computer Science & Engineering, Business Administration & Management, Animal Science, Veterinary Medicine, Fisheries, Disaster Management and Nutrition & Food Science. In order to fulfill the mission of the university, we are including the brightest students through a highly competitive admission test. The up-to-date and well-conformed syllabi have been tailored to the market needs and are designed to equip the students with latest development in their fields of specialization. Moreover, the academic programmes are adopted with commitment to provide and mentoring our students a global career by the updated curricula. Our challenge for the future is to build on this strong base to establish ourselves firmly among the leading universities.
    </p>
    </div>
</div>

<?php require_once("includes/footer.php") ?>
<?php require_once("includes/modal_login.php") ?>
