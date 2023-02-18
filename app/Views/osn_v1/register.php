<?= view(OSN_VIEWPATH . '/components/head') ?>

<div class="login-form">
    <div class="form-div">
        <form class="user-register-form">
            <div class="row main-section">
                <div class="col-sm-12 col-md-6 left">
                    <img width="200" src="<?= base_url("/assets/images/avatar-img.png") ?>" alt="img" />
                </div>
                <div class="col-sm-12 col-md-6 right row">
                    <div class="login-form-title"></div>
                    <div class="row form-group">
                        <div class="col-sm-6 mb-2">
                            <label for="inputFirstname">First Name</label>
                            <input id="inputFirstname" class="form-control" type="text" name="first_name" />
                        </div>
                        <div class="col-sm-6 mb-2">
                            <label for="inputLastname">Last Name</label>
                            <input id="inputLastname" class="form-control" type="text" name="last_name" />
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="inputUsername">Username</label>
                        <input id="inputUsername" class="form-control" type="text" name="username" />
                    </div>
                    <div class="form-group mb-2">
                        <label for="inputPassword">Password</label>
                        <input id="inputPassword" class="form-control" type="password" name="password" />
                    </div>
                    <input type="hidden" name="form_type" value="User_Register_Form" />
                    <div>
                        <button type="submit" id="user-register-form-success" class="btn btn-primary user-register-form-btn">Register</button>
                    </div>
                    <div>
                        <a href="javascript:void(0)" class="user-login-btn" id="user-login-btn">LogIn</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<?= view(OSN_VIEWPATH . '/components/footer') ?>