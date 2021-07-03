<?php require_once("includes/session.php") ?>
<?php require_once("includes/functions.php") ?>
<?php require_once("includes/dbconnect.php") ?>
<?php require_once("includes/head2.php") ?>
<?php require_once("includes/navbar.php") ?>
<?php //require_once("Classes/PHPExcel/IOFactory.php") ?>
<?php require_once('phpexcel/php-excel-reader/excel_reader2.php'); ?>
<?php require_once('phpexcel/SpreadsheetReader.php'); ?>
<?php
//session check
teacher_confirm_logged_in();
?>
<?php
$course_code = $_GET['course_code']; //course code of current course. saved in variable because these GET indexes will be null after deletion
$course_id = $_GET['course_id'];
$student_id_current = 0;
?>
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

 //another
if (isset($_POST["import"]))
{

    $allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];

    if(in_array($_FILES["file"]["type"],$allowedFileType)){

        $targetPath = 'uploads/'.$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);

        $Reader = new SpreadsheetReader($targetPath);

        $sheetCount = count($Reader->sheets());
        $check_success = 0;

        for($i=0;$i<$sheetCount;$i++)
        {
            $Reader->ChangeSheet($i);

            foreach ($Reader as $Row)
            {
                $roll = "";
                if(isset($Row[0])) {
                    $roll = $Row[0];
                    if(existing_student($roll,$course_id)){
                      //  echo "<div class = 'alert alert-danger' >Student Exists! </div>".mysqli_error($conn);
                        continue;
                    }
                    $roll = mysqli_real_escape_string($conn,$roll);
                }

                $name = "";
                if(isset($Row[1])) {
                    $name = mysqli_real_escape_string($conn,$Row[1]);
                }

                $session = "";
                if(isset($Row[2])) {

                    $session = mysqli_real_escape_string($conn,$Row[2]);
                }


                if (!empty($name) || !empty($roll) || !empty($session)) {
                    $query = "INSERT INTO `student`( `name`, `roll`, `course_code`,`course_id`, `session`) VALUES ('$name','$roll','$course_code','$course_id','$session')";
                    $result = mysqli_query($conn, $query);

                    if (! empty($result)) {
                        $type = "success";
                        $check_success = 1;
                        $message = "Excel Data Imported into the Database";
                     //   echo "<div>Uploading Successfull!</div>";
                    } else {
                        $type = "error";
                        $message = "Problem in Importing Excel Data";
                        $check_success = 0;
                       // echo "<div>Uploading Failed!</div>";
                    }
                }
            }
            if($check_success == 1){
                $message = "Excel Data Imported into the Database";
            }
            else{
                $message = "Problem in Importing Excel Data";
            }

        }
    }
    else
    {
        $type = "error";
        $message = "Invalid File Type. Upload Excel File.";
    }
}
?>




   <div class="card card-primary container">
     <div class="card-header ">
          <h1 style="text-align: center;">Take Attendance</h1><br>
         <p>
         <?php if(isset($message)){
             echo $message;
         } ?>
         </p>
      </div>
     <div class="card-body  " >
         <div class="d-flex ">
         <a href="add_student.php?course_id=<?php echo $_GET['course_id']; ?>&course_code=<?php echo $_GET['course_code']; ?>" class="btn btn-outline-success mr-auto"><span><img class="my_icon" src="images/icons/plus.png" data-toggle="tooltip" title="Add Student"></span>&nbsp;&nbsp;Add Student</a>
             <div  class=" mr-auto">

                     <form action="" method="post"
                           name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
                         <div>
                             <label>Choose Excel
                                 File</label> <input type="file" name="file"
                                                     id="file" accept=".xls,.xlsx">
                             <button type="submit" id="submit" name="import"
                                     class="btn-submit">Import</button>

                         </div>

                     </form>


                </div>
             <a href="attendance_list.php?course_id=<?php echo $course_id; ?>&course_code=<?php echo $course_code; ?>" class="btn btn-outline-success f"><span><img class="my_icon" src="images/icons/left-arrow.png" data-toggle="tooltip" title="Back"></span>&nbsp;Back</a>

         </div>
         <?php


         // deleting from student and attendance
         if(isset($_GET['student_id_delete'])){
             $course_code = $_GET['course_code'];  //again course code assigned for redirection  from new GET
             $course_id = $_GET['course_id'];
             $student_id = $_GET['student_id_delete'];
             $query = "DELETE FROM `student` WHERE  id = '$student_id'  ; DELETE FROM `attendance` WHERE  student_id = '$student_id';";
             // echo $query;
             $result = mysqli_multi_query($conn,$query);
             if($result === FALSE){
                 echo "<div class = 'alert alert-warning' >Unsuccessful </div>".mysqli_error($conn);
             }
             else{
                 echo "<div class = 'alert alert-success' >Deleted </div>";
                 redirect_to("attendance_page.php?course_id=".$course_id."&course_code=".$course_code);
             }
         }

         ?>
         <div class="d-flex flex-column-reverse">
              <table class="table">
                  <thead>
                  <tr>
                      <th>Serial No.</th>
                      <th>Roll No.</th>
                      <th>Name</th>
                      <th>Attendance</th>
                      <th>Actions</th>
                  </tr>
                 </thead>
                  <form method="post" >
                      <tbody>
                      <?php
                      $roll = array();  //to store roll
                      $list = true;

                      $query = "select * from ama.student where `course_id` = '$course_id' order by roll";
                      $result = mysqli_query($conn, $query);
                      if($result === FALSE){
                          echo "<div class = 'alert alert-warning' >Unsuccessful </div>".mysqli_error($conn);
                      }
                      if(mysqli_num_rows($result) > 0) {
                          $i = 0;
                          $j = 0;  // to iterate roll
                          while ($show = $result->fetch_assoc()) {
                              $i++;

                              //$roll[$j] = $show['roll'];
                            //  $j++;
                              $roll[$show['id']] = $show['roll'];
                              ?>
                              <tr>
                                  <td><?php echo $i; ?></td>
                                  <td><?php echo $show['roll'] ?></td>
                                  <td> <?php echo $show['name'] ?></td>
                                  <td>
                                      Present<input type="radio" name="attendance[<?php echo $show['id'] ?>]"
                                                    value="Present">Absent<input type="radio"
                                                                                 name="attendance[<?php echo $show['id'] ?>]"
                                                                                 value="Absent" checked>
                                  </td>
                                  <td>
                                      <div class="dropdown dropright">
                                          <a type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" style="color: white;">
                                              Actions
                                          </a>
                                          <div class="dropdown-menu bg-info">
                                              <a class=" dropdown-item" href="#" <?php $student_id_current= $show['id'];   ?> data-toggle="modal" data-target="#delete_student" ><span><img class="my_icon" src="images/icons/rubbish-bin.png" data-toggle="tooltip" title="Delete Student"></span>&nbsp;Delete</a>
                                              <a class=" dropdown-item" href="update_student.php?course_id=<?php echo $course_id;   ?>&course_code=<?php echo $course_code;   ?>&student_id=<?php echo $show['id'];   ?>"><span><img class="my_icon" src="images/icons/update.png" data-toggle="tooltip" title="Update Student"></span>&nbsp;Update</a>

                                          </div>
                                      </div>
                                  </td>
                              </tr>
                          <?php }
                      }
                      else{
                          echo "<div class = 'alert alert-warning' >No Students Found! Add students First! </div>";
                          $list = false;
                      }
                      ?>
                      <?php
                      if($list) {

                          echo "<input type=\"submit\" name=\"submit\" class=\"btn btn-primary mr-auto \" value=\"Submit\" > ";
                      }
                      else
                          echo "";

                      ?>
                     </tbody>
                  </form>
                  <?php
                  if(isset($_POST['submit'])){
                      $att = $_POST['attendance'];
                      $date = date('d-m-y');
                      // echo "<div class = 'alert alert-warning' >".$date."</div>";
                     $query = "select distinct `date` from ama.attendance where  course_id = '$course_id'  ";
                      $result = mysqli_query($conn,$query);
                     $b = false;
                      if($result === FALSE){
                          echo "<div class = 'alert alert-warning' >Unsuccessful 1 </div>".mysqli_error($conn);
                      }
                      if(mysqli_num_rows($result) > 0) {
                          while ($check = $result->fetch_assoc()) {
                             // echo "current date: ".$date." db date : ".$check['date'];
                              if ($date == $check['date']){
                                  $b = true;
                                  echo "<div class = 'alert alert-warning' >Attendance already taken today! </div>";
                                  break;
                             }
                          }
                      }
                      if(!$b){
                       //   $j = 0;
                          foreach ($att  as $key=>$value) {
                           //echo  "<div class = 'alert alert-warning' >Roll number: ".$roll[$key]."  </div>";
                         //  $j++;
                              if($value == "Present"){
                                  $query = "insert into ama.attendance(student_id, student_roll, course_code, course_id,`attendance_value`, `date`) values ('$key', '$roll[$key]' ,'$course_code','$course_id','Present','$date')";
                                //  echo $query;
                                  $insertResult = mysqli_query($conn,$query);
                              }
                              else{
                                  $query = "insert into ama.attendance(student_id, student_roll, course_code,course_id,`attendance_value`, `date`) values ('$key', '$roll[$key]' ,'$course_code','$course_id','Absent','$date')";
                                  $insertResult = mysqli_query($conn,$query);
                              }
                          }
                          if($insertResult){
                              echo "<div class = 'alert alert-success' >Record Saved! </div>";
                         }
                          else{
                              echo "<div class = 'alert alert-warning' >Unsuccessful 2 </div>".mysqli_error($conn);
                          }
                      }
                 }
                  ?>
             </table>
          </div>
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

