<div class="container-content">
    <row class="mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    <img class="img-profile rounded-circle" src="<?= base_url('assets/img/profile/') . $user['gambar_profile']; ?>">
                    <strong><?= $pecintahewan['username'] ?></strong>
                </div>
                <div class="card-body">
                    <h5> <?= $pecintahewan['nama_thread'] ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= $pecintahewan['timestamp'] ?></h6>
                    <img src="<?= base_url('assets/img/thread/pecintahewan/') . $pecintahewan['gambar']; ?>" class="card-img-top">
                    <p class="card-text"><?= $pecintahewan['isi'] ?></p>
                    <a href="<?= base_url(); ?>pecintahewan" class="btn btn-primary">Kembali</a>
                </div>
            </div>

        </div>
    </row>
</div>