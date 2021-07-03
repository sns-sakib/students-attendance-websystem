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

<script>
    $(document).ready(function () {

        //name validation
        $("#name").keyup(function () {
            var name_current = $("#name").val();
            //  alert("hi");
            $.ajax({
                url:"includes/validation.php",
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




        //department.
        $("#designation").keyup(function () {
            var des_current = $("#designation").val();
            //  alert("hi");
            $.ajax({
                url:"includes/validation.php",
                method:"post",
                data: {name_current:des_current,action:"name"},
                success:function (data) {
                    // alert("hi");
                    if (data === "invalid name") {
                        //   alert("invalid");
                        $("#submit").prop('disabled',true);
                        $('#error_designation').show();
                        $('#error_designation').html("Invalid Designation!");
                        return;
                    }
                    else {
                        //  alert(data);
                        $('#error_designation').hide();
                        $("#submit").prop('disabled',false);
                    }
                }
            });
        });

        //phone validation
        $("#phone").keyup(function () {
            var phone_current = $("#phone").val();
            //  alert("hi");
            $.ajax({
                url:"includes/validation.php",
                method:"post",
                data: {phone_current:phone_current,action:"phone"},
                success:function (data) {
                    // alert("hi");
                    if (data === "invalid phone") {
                        //   alert("invalid");
                        $("#submit").prop('disabled',true);
                        $('#error_phone').show();
                        $('#error_phone').html("Invalid Phone Number!");
                        return;
                    }
                    else {
                        //  alert(data);
                        $('#error_phone').hide();
                        $("#submit").prop('disabled',false);
                    }
                }
            });
        });
        //email validation
        $("#email").keyup(function () {
            var email_current = $("#email").val();
            //  alert("hi");
            $.ajax({
                url:"includes/validation.php",
                method:"post",
                data: {email_current:email_current,action:"email"},
                success:function (data) {
                    // alert("hi");
                    if (data === "invalid email") {
                        //   alert("invalid");
                        $("#submit").prop('disabled',true);
                        $('#error_email').show();
                        $('#error_email').html("Invalid Email!");
                        return;
                    }
                    else {
                        //  alert(data);
                        $('#error_email').hide();
                        $("#submit").prop('disabled',false);
                    }
                }
            });
        });


        //update
        $("#submit").click(function () {
            // alert("worked");
            var name = $("#name").val();
            var phone = $("#phone").val();
            var messageBox = $("#messageBox").val();
            var designation = $("#designation").val();
            var email = $("#email").val();
                if (phone == "" || name == "" || messageBox == "" ||   email == ""  ){
                    $('#result').show();
                    $("#result").html('Please Fill Up Required  Fields!');
                    return;
                }


            $.ajax({
                url:"process_contact.php",
                method:"post",
                data: {name:name, phone:phone, messageBox:messageBox,designation:designation,email:email},
                success:function (data) {
                    $('#result').show();
                    $('#result').html(data);
                    return;
                },
                error: function (jqXHR, exception) {
                    var msg = '';
                    if (jqXHR.status === 0) {
                        msg = 'Not connect.\n Verify Network.';
                    } else if (jqXHR.status == 404) {
                        msg = 'Requested page not found. [404]';
                    } else if (jqXHR.status == 500) {
                        msg = 'Internal Server Error [500].';
                    } else if (exception === 'parsererror') {
                        msg = 'Requested JSON parse failed.';
                    } else if (exception === 'timeout') {
                        msg = 'Time out error.';
                    } else if (exception === 'abort') {
                        msg = 'Ajax request aborted.';
                    } else {
                        msg = 'Uncaught Error.\n' + jqXHR.responseText;
                    }
                    $('#result').show();
                    $('#result').html(msg);
                }

            });
        });
    });
</script>


<div class="card card-primary container  contact">


    <div class="card-header ">
        <h2 class="text-bold border-bottom-0" style="color: rgb(52,58,64);">Contact Us</h2>
    </div>

    <div class="card-body " >
                    <div class="form-group">
                        <label for="name">Name<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" >
                        <div class="error text-dark" id="error_name"></div>
                    </div>
                     <div class="form-group">
                        <label for="email">Email<span class="text-danger">*</span></label>
                          <input type="text" class="form-control" id="email" placeholder="Enter Email " name="email" >
                         <div class="error text-dark" id="error_email"></div>
                     </div>
                     <div class="form-group">
                         <label for="phone">Mobile Number<span class="text-danger">*</span></label>
                         <input type="text" class="form-control" id="phone" placeholder="Enter phone number" name="phone">
                         <div class="error text-dark" id="error_phone"></div>
                     </div>
                    <div class="form-group">
                        <label for="designation">Designation(optional)</label>
                        <input type="text" class="form-control" id="designation" placeholder="Enter Designation" name="designation" >
                        <div class="error text-dark" id="error_designation"></div>
                    </div>
                          <div class="form-group">
                      <label for="messageBox">Message<span class="text-danger">*</span></label>
                      <textarea  class="span6 form-control" rows="3" placeholder="Enter Your Message" id="messageBox" name="messageBox" ></textarea>
                      <div class="error text-dark" id="error_messageBox"></div>
                  </div>

                    <button  class="btn btn-success" name="submit" id="submit">Submit</button>
                    <div  id="result"></div>
    </div>




    <div class="card-footer mapfooter">
        <h2 class="text-bold border-bottom-0" >Location</h2>
       <p> Location : Dumki-8602, Dumki, Patuakhali<br>
        Google Map Latitude : 22.4641788<br>
        Google Map Langitude : 90.3825297<br>
       </p>
        <div class="mymap" style="width: 100%">
            <iframe width="100%" height="600" src="https://maps.google.com/maps?width=100%&amp;height=600&amp;hl=en&amp;coord= 22.4641788,90.3825297&amp;q=patuakhali%20science%20and%20technology%20university+(pstu)&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0">

            </iframe></div><br />

    </div>
</div>

<?php require_once("includes/footer.php") ?>
<?php require_once("includes/modal_login.php") ?>
