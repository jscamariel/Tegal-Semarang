<div class="container-content">
    <h2>Change Password</h2>
    <?= $this->session->flashdata('message'); ?>

    <div class="row mt-5">
        <div class="col lg-8">

            <form action="<?= base_url('user/changepassword'); ?>" method="post">
                <div class="form-group">
                    <label for="current_password">Current Password</label>
                    <input type="password" class="form-control" id="current_password" name="current_password">
                    <small class="text-danger"><?= form_error('current_password'); ?></small>
                </div>

                <div class="form-group">
                    <label for="new_password1">New Password</label>
                    <input type="password" class="form-control" id="new_password1" name="new_password1">
                    <small class="text-danger"><?= form_error('new_password1'); ?></small>
                </div>

                <div class="form-group">
                    <label for="new_password2">Repeat Password</label>
                    <input type="password" class="form-control" id="new_password2" name="new_password2">
                    <small class="text-danger"><?= form_error('new_password2'); ?></small>
                </div>

                <button type="submit" class="btn btn-primary">Change Password</button>
            </form>



        </div>
    </div>
</div>