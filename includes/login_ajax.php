<script>
    $(document).ready(function () {
//login
        $("#login").click(function () {
// alert("worked");
            var option = $("#select_login_type").val();
            var username = $("#username").val();
            var password = $("#password").val();
           var captcha = grecaptcha.getResponse();

            if (option == "" || username == "" || password == "") {
                $('#messageLogin').show();
                $("#messageLogin").html('Please Fill Up All The Fields!');
                return;
            }
            if ($("#remember_me").is(":checked")) {

                var checked = "true";
//  alert("checked");

            } else {
                var checked = "false";
//alert("not checked");
            }
//  $("#error").html('filled up');
// return;
            $.ajax({
                url: "process_login.php",
                method: "post",
                data: {option: option, username: username, password: password, checked: checked , captcha: captcha},  //, captcha: captcha
                success: function (data) {
                    grecaptcha.reset();
                    if (data == "teacher") {
                        window.location.replace("teacher.php");

                        return;
                    } else if (data == "admin") {
                        window.location.replace("admin_area/admin.php");
                        return;
                    } else {
                        $('#messageLogin').show()
                        $('#messageLogin').html(data);
                        return;
                    }


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
                    $('#message_login').show();
                    $('#message_login').html(msg);
                }

            });
        });
    });
</script>