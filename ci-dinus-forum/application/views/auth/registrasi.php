<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100 p-l-40 p-r-40 p-t-55 p-b-40">
            <form class="login100-form validate-form" action="<?= base_url('auth/registrasi'); ?>" method="post">
                <span class="login100-form-title p-b-33">
                    Create Account
                </span>

                <div class="wrap-input100 validate-input" data-validate="Username required">
                    <input class="input100" type="text" name="username" placeholder="Username" autocomplete="off" autocapitalize="on">
                    <span class="focus-input100-1"></span>
                    <span class="focus-input100-2"></span>
                </div>
                <small class="text-danger"><?= form_error('username'); ?></small>
                <br>

                <div class="wrap-input100 validate-input" data-validate="NIM required ex: A11.2017.10116">
                    <input class="input100" type="text" name="nim" placeholder="NIM" autocomplete="off">
                    <span class="focus-input100-1"></span>
                    <span class="focus-input100-2"></span>
                </div>
                <small class="text-danger"><?= form_error('nim'); ?></small>
                <br>

                <div class="wrap-input100  validate-input" data-validate="Valid email required ex:zxc@gmail.com">
                    <input class="input100" type="email" name="email" placeholder="Email" autocomplete="off">
                    <span class="focus-input100-1"></span>
                    <span class="focus-input100-2"></span>
                </div>
                <small class="text-danger"><?= form_error('email'); ?></small>
                <br>

                <div class="wrap-input100  validate-input" data-validate="Password is required">
                    <input class="input100" type="password" name="password1" placeholder="Password">
                    <span class="focus-input100-1"></span>
                    <span class="focus-input100-2"></span>
                </div>
                <small class="text-danger"><?= form_error('password1'); ?></small>
                <br>

                <div class="wrap-input100  validate-input" data-validate="Confirm Password is required">
                    <input class="input100" type="password" name="password2" placeholder="Confirm Password">
                    <span class="focus-input100-1"></span>
                    <span class="focus-input100-2"></span>
                </div>
                <small class="text-danger"><?= form_error('password2'); ?></small>
                <br>

                <div class="container-login100-form-btn m-t-20">
                    <button class="login100-form-btn" type="submit" name="registrasi">
                        Create Account
                    </button>
                </div>

                <div class="text-center p-t-45 p-b-4">
                    <span class="txt1">
                        Already have account?
                    </span>

                    <a href="<?= base_url('auth/index'); ?>" class="txt2 hov1">
                        Sign in
                    </a>
                </div>

                <div class="text-center">


                    <a href="#" class="txt2 hov1">
                        Forgot Password?
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>