<div class="container-content">
    <row class="mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    <h5> <?= $berita['judul'] ?></h5>
                </div>
                <div class="card-body">
                    <h6 class="card-subtitle mb-2 text-muted"><?= $berita['timestamp'] ?></h6>
                    <img src="<?= base_url('assets/img/berita/') . $berita['gambar']; ?>" class="card-img-top">
                    <p class="card-text"><?= $berita['isi'] ?></p>
                    <a href="<?= base_url(); ?>berita" class="btn btn-primary">Kembali</a>
                </div>
            </div>

        </div>
    </row>
</div>