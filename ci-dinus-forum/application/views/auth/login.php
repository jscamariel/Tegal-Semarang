<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100 p-l-40 p-r-40 p-t-55 p-b-40">
            <form class="login100-form validate-form" action="<?= base_url('auth') ?>" method="post">
                <span class="login100-form-title p-b-33">
                    Account Login
                </span>

                <?= $this->session->flashdata('flash'); ?>
                <?= $this->session->flashdata('error'); ?>

                <div class="wrap-input100">
                    <input class="input100" type="text" name="username" placeholder="Username">
                    <span class="focus-input100-1"></span>
                    <span class="focus-input100-2"></span>
                </div>
                <small class="text-danger"><?= form_error('username'); ?></small>
                <br>

                <div class="wrap-input100">
                    <input class="input100" type="password" name="password" placeholder="Password">
                    <span class="focus-input100-1"></span>
                    <span class="focus-input100-2"></span>
                </div>
                <small class="text-danger"><?= form_error('password'); ?></small>
                <br>

                <div class="container-login100-form-btn m-t-20">
                    <button class="login100-form-btn" type="Submit" value="submit">
                        Sign in
                    </button>
                </div>



                <div class="text-center mt-3">
                    <span class="txt1">
                        Create an account?
                    </span>

                    <a href="<?= base_url('auth/registrasi'); ?>" class="txt2 hov1">
                        Sign up
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>