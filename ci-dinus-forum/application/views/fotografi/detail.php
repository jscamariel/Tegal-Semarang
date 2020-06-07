<div class="container-content">
    <row class="mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    <img class="img-profile rounded-circle" src="<?= base_url('assets/img/profile/'); ?>default.jpg">
                    <strong><?= $fotografi['username'] ?></strong>
                </div>
                <div class="card-body">
                    <h5> <?= $fotografi['nama_thread'] ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= $fotografi['timestamp'] ?></h6>
                    <p class="card-text"><?= $fotografi['isi'] ?></p>
                    <a href="<?= base_url(); ?>fotografi" class="btn btn-primary">Kembali</a>
                </div>
            </div>

        </div>
    </row>
</div>