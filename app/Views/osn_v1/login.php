<?= view(OSN_VIEWPATH . '/components/head') ?>

<div class="login-form">
    <div class="form-div">
        <form class="user-login-form">
            <div class="row main-section">
                <div class="col-sm-12 col-md-6 left">
                    <img width="200" src="<?= base_url("/assets/images/avatar-img.png") ?>" alt="img" />
                </div>
                <div class="col-sm-12 col-md-6 right row">
                    <div class="login-form-title"></div>
                    <div class="form-group mb-2">
                        <label for="inputUsername">Username</label>
                        <input id="inputUsername" class="form-control" type="text" name="username" />
                    </div>
                    <div class="form-group mb-2">
                        <label for="inputPassword">Password</label>
                        <input id="inputPassword" class="form-control" type="password" name="password" />
                    </div>
                    <input type="hidden" name="form_type" value="User_Login_Form" />
                    <div>
                        <button type="submit" id="user-login-form-success" class="btn btn-primary user-login-form-btn">Login</button>
                    </div>
                    <div>
                        <a href="javascript:void(0)" class="user-register-btn" id="user-register-btn">Register</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<?= view(OSN_VIEWPATH . '/components/footer') ?>