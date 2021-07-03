<?php require_once("includes/session.php") ?>
<?php require_once("includes/functions.php") ?>
<?php require_once("includes/dbconnect.php") ?>
<?php require_once("includes/head2.php") ?>
<?php require_once("includes/navbar.php") ?>
<?php //require_once("Classes/PHPExcel/IOFactory.php") ?>
<?php
//session check
teacher_confirm_logged_in();
?>
<?php
$course_code = $_GET['course_code']; //course code of current course. saved in variable because these GET indexes will be null after deletion
$course_id = $_GET['course_id'];
$student_id_current = 0;
?>
<script>
    $(document).ready(function () {
        //print
        $("#print_record").click(function (){
            //   alert("print");

            $("#back_button").hide();
            $("#print_record").hide();
            window.print();
            $("#back_button").show();
            $("#print_record").show();

        });
    });

</script>
<?php

/*  if (isset($_POST['excel_submit']))
{
   try {
       //Import uploaded file to Database
       $handle = fopen($_FILES['filename']['tmp_name'], "r");
       while (($data = fgetcsv($handle)) !== FALSE) {
         //  $query = "INSERT INTO `student`( `name`, `roll`, `course_code`,`course_id`, `session`) VALUES ('$name','$roll','$course_code','$course_id','$session')";

           $sql = "INSERT into `student` (`name`, `roll`, `course_code`,`course_id`, `session`)
 values('" . $data[2] . "', '" . $data[1] . "', '" . $course_code . "', '" . $course_id . "', '" . $data[3] . "')";

           $result =  mysqli_query($conn, $sql);
           if ($result){
               echo "<div> File Uploaded Successfully</div>";
           }
           else{
               echo "<div> File Upload Failed</div>";
           }
       }
   }
   catch (Exception $e){
       echo "<div> File Upload Failed</div>";
   }
}
*/

?>
<div class="card card-primary container">
    <div class="card-header ">
        <h1 style="text-align: center;">Status Report</h1>
        <p>Course Code : <?php echo $course_code; ?> </p>
        <p>Number Of Classes : <?php $total = total_class($course_id); echo $total;  ?></p>
    </div>


    <div class="card-body  " >
        <?php if($total > 0) {

            ?>
            <div class="d-flex ">
                <a href="attendance_list.php?course_id=<?php echo $course_id; ?>&course_code=<?php echo $course_code; ?>"
                   class="btn btn-outline-success f" id="back_button"><span><img class="my_icon" src="images/icons/left-arrow.png"
                                                                data-toggle="tooltip" title="Back" ></span>&nbsp;Back</a>
            </div>
            <?php
            ?>
            <div class="d-flex flex-column-reverse">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Serial No.</th>
                        <th>Roll No.</th>
                        <th>Name</th>
                        <th>Present</th>
                        <th>Absent</th>
                        <th>Percentage</th>
                    </tr>
                    </thead>
                    <form method="post">
                        <tbody>
                        <?php
                        $roll = array();  //to store roll
                        $list = true;

                        $query = "select * from ama.student where `course_id` = '$course_id' order by roll";
                        $result = mysqli_query($conn, $query);
                        if ($result === FALSE) {
                            echo "<div class = 'alert alert-warning' >Unsuccessful </div>" . mysqli_error($conn);
                        }
                        if (mysqli_num_rows($result) > 0) {
                            $i = 0;
                            $j = 0;  // to iterate roll
                            while ($show = $result->fetch_assoc()) {
                                $i++;

                                //$roll[$j] = $show['roll'];
                                //  $j++;
                                $roll[$show['id']] = $show['roll'];
                                $data = status_report($show['roll'], $course_id);
                                ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $show['roll'] ?></td>
                                    <td> <?php echo $show['name'] ?></td>
                                    <td> <?php echo $data[0] ?></td>
                                    <td> <?php echo $data[1] ?></td>
                                    <td> <?php echo $data[2] ?></td>

                                </tr>
                            <?php }
                        } else {
                            echo "<div class = 'alert alert-warning' >No Students Found! Add students First! </div>";

                        }
                        ?>

                        <button   class="btn btn-outline-success mr-auto " id="print_record"  >Print</button>
                        </tbody>
                    </form>

                </table>
            </div>
            <?php
        }
        ?>
    </div>


    <div class="card-footer">

    </div>
</div>


<?php require_once("includes/footer.php") ?>



<div class="modal fade content_modal" id="delete_student" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title align-center" >Are you sure?</h4>
                <button type="button" class="close" data-dismiss="modal" >&times;</button>

            </div>

            <div class="modal-footer">

                <div class="container">
                    <div class="row d-flex justify-content-between">
                        <div class="p-2">
                            <button type="button " class="btn btn-outline-dark " data-dismiss="modal">Cancel</button>
                        </div>

                        <div class="p-2">
                            <a type="button" href="attendance_page.php?course_id=<?php echo $course_id;   ?>&course_code=<?php echo $course_code;   ?>&student_id_delete=<?php echo $student_id_current;   ?>" class="btn btn-outline-danger" id="btndelete">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once("includes/footer.php") ?>

