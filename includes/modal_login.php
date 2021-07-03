<div class="modal fade content_modal" id="loginModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content" id="loginModal_content">
            <div class="modal-header">

                <h4 class="modal-title align-center text-light" >Log In</h4>
                <button type="button" class="close" data-dismiss="modal" >&times;</button>

            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="text-light" for="select_login_type">Log In As </label>
                    <select class="form-control" id="select_login_type" name="loginoption" >
                        <option selected="true" disabled>Choose..</option>
                        <option value="teacher">Teacher</option>
                        <option value="admin">Admin</option>
                    </select>

                </div>

                <div class="form-group">
                    <label class="text-light" for="username">Username</label>
                    <input type="text" class="form-control" id="username" placeholder="Enter Username" name="username" ">
                    <div class="error text-light" id="error_username"></div>
                </div>
                <div class="form-group">
                    <label class="text-light" for="password">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Enter Password " name="password">
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="remember_me" name="remember_me">
                    <label class="form-check-label text-light" for="remember_me">Remember Me</label>
                </div>

                <div class="form-group" >
                    <div class="g-recaptcha" data-sitekey="6LegaYwUAAAAALKkJnJQeQKU3_l5UbLRpDSnEB8w"></div>
                </div>

                <button  class="btn btn-success" name="submit" id="login">Log In</button>
                <div  id="messageLogin" class="text-light"  ></div>
            </div>
        </div>
    </div>
</div>
