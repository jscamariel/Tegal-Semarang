<div class="container-content">
    <h2>Edit Profile</h2>

    <div class="row">
        <div class="col lg-8">
            <?= form_open_multipart('user/edit'); ?>
            <div class="form-group row mt-5">
                <label for="email" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                    <input type="username" class="form-control" id="username" name="username" value="<?= $user['username']; ?>" readonly>
                    <small class="text-danger"><?= form_error('username'); ?></small>
                </div>
            </div>
            <div class="form-group row">
                <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                <div class="col-sm-10">
                    <input type="nim" class="form-control" id="nim" name="nim" value="<?= $user['nim']; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" name="email" value="<?= $user['email']; ?>">
                    <small class="text-danger"><?= form_error('email'); ?></small>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-2">Gambar</div>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="<?= base_url('assets/img/profile/') . $user['gambar_profile']; ?>" class="img-thumbnail">
                        </div>
                        <div class="col-sm-9">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="gambar" name="gambar">
                                <label class="custom-file-label" for="gambar">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row justify-content-end">
                <div class="col-sm-10">
                    <button type="Submit" class="btn btn-primary">Edit Profile</button>
                </div>
            </div>
        </div>

    </div>
</div>
</div>

<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
</script>