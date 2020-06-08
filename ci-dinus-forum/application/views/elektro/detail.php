<div class="container-content">
    <row class="mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    <img class="img-profile rounded-circle" src="<?= base_url('assets/img/profile/') . $user['gambar']; ?>">
                    <strong><?= $elektro['username'] ?></strong>
                </div>
                <div class="card-body">
                    <h5><?= $elektro['nama_thread'] ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= $elektro['timestamp'] ?></h6>
                    <img src="<?= base_url('assets/img/thread/elektro/') . $elektro['gambar']; ?>" class="card-img-top">

                    <p class="card-text"><?= $elektro['isi'] ?></p>
                </div>
            </div>


            <div class="input-group mt-1">
                <input type="hidden" value="<?= $this->session->userdata('username'); ?>">
                <input type="text" class="form-control" placeholder="Tambahkan Komentar..." name="isi_komentar">
                <div class="input-group-append">
                    <button class="btn btn-primary " type="submit" name="kirimKomen">Kirim</button>
                </div>
            </div>

            <div class="card mt-1">
                <div class="card-body">
                    <h6 class="card-subtitle mb-2 text-muted">Komentar</h6>

                    <?php foreach ($elektro as $el) : ?>
                        <strong><?= $el['username']; ?></strong>
                        <p class="card-text"><?= $el['isi_komentar']; ?></p>
                    <?php endforeach; ?>

                </div>
            </div>

            <a href="<?= base_url(); ?>elektro" class="btn btn-primary mt-5">Kembali</a>

        </div>
    </row>
</div>