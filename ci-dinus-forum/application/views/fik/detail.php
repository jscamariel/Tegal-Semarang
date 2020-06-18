<div class="container-content">
    <row class="mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    <img class="img-profile rounded-circle" src="<?= base_url('assets/img/profile/') . $user['gambar_profile']; ?>">
                    <strong><?= $fik['username'] ?></strong>
                </div>
                <div class="card-body">
                    <h5> <?= $fik['nama_thread'] ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= $fik['timestamp'] ?></h6>
                    <img src="<?= base_url('assets/img/thread/fik/') . $fik['gambar']; ?>" class="card-img-top">

                    <p class="card-text"><?= $fik['isi'] ?></p>
                    <a href="<?= base_url(); ?>fik" class="btn btn-primary">Kembali</a>
                </div>
            </div>

        </div>
    </row>
</div>