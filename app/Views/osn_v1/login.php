<?= view(OSN_VIEWPATH . '/components/head') ?>

<div class="login-form">
    <form class="user-login-form">
        <div class="row main-section">
            <div class="col-sm-12 col-md-6 left">
                <img width="200" src="<?= base_url("/assets/images/avatar-img.png") ?>" alt="img" />
            </div>
            <div class="col-sm-12 col-md-6 right row">
                <div class="login-form-title">
                    This is title of Form
                </div>
                <div class="form-group">
                    <label for="inputUsername">Username</label>
                    <input id="inputUsername" class="form-control" type="text" name="username" />
                </div>
                <div class="form-group">
                    <label for="inputPassword">Password</label>
                    <input id="inputPassword" class="form-control" type="password" name="password" />
                </div>
                <input type="hidden" name="form_type" value="User_Login_Form"/>
                <div>
                    <button type="submit" id="user-login-form-success" class="btn btn-primary user-login-form-btn">Login</button>
                </div>
            </div>
        </div>
    </form>
</div>

<?= view(OSN_VIEWPATH . '/components/footer') ?>