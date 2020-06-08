<div class="container-content">
    <row class="mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    <img class="img-profile rounded-circle" src="<?= base_url('assets/img/profile/') . $user['gambar']; ?>">
                    <strong><?= $feb['username'] ?></strong>
                </div>
                <div class="card-body">
                    <h5> <?= $feb['nama_thread'] ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= $feb['timestamp'] ?></h6>
                    <img src="<?= base_url('assets/img/thread/feb/') . $feb['gambar']; ?>" class="card-img-top">
                    <p class="card-text"><?= $feb['isi'] ?></p>
                    <a href="<?= base_url(); ?>feb" class="btn btn-primary">Kembali</a>
                </div>
            </div>

        </div>
    </row>
</div>