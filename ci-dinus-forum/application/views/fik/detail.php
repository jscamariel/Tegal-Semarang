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

            <form method="POST" action="<?= base_url('fik/kirimKomen/') . $fik['id_thread']; ?>">
                <div class="input-group mt-1 align-justify-content-end">

                    <?php if ($this->session->userdata('logged_in')) : ?>
                        <input type="text" class="form-control" placeholder="Leave a reply..." name="isi_komentar">
                        <div class="input-group-append">
                            <button class="btn btn-secondary icofont-reply" type="submit" name="kirimKomen"></button>
                        </div>
                    <?php else : ?>
                        <input type="text" class="form-control" placeholder="Silahkan Login terlebih dahulu" name="isi_komentar" readonly>
                        <div class="input-group-append">
                            <a href="<?= base_url('auth'); ?>" class="btn btn-secondary icofont-reply" type="submit" name="kirimKomen"></a>
                        </div>
                    <?php endif; ?>
                </div>
            </form>

            <div class="card mt-1">
                <div class="card-body">

                    <h6 class="card-subtitle mb-2 text-muted"> Komentar </h6>
                    <?php foreach ($komentar as $komen) : ?>

                        <?php if ($komen['id_kategori'] != $fik['id_kategori']) : ?>
                        <?php else : ?>
                            <?php if ($komen['id_thread'] == $fik['id_thread']) : ?>
                                <img class="img-profile rounded-circle float-left" src="<?= base_url('assets/img/profile/') . $user['gambar_profile']; ?>">

                                <h5><?= $komen['username']; ?></h5>
                                <h6 class="card-subtitle mb-2 text-muted"><?= $komen['timestamp'] ?></h6>

                                <?php if ($this->session->userdata('username') !=  $komen['username']) : ?>
                                <?php else : ?>
                                    <a href="<?= base_url(); ?>fik/hapusKomen/<?= $komen['id_komentar']; ?>" class="badge badge-danger float-right" onclick="return confirm('Yakin?');">Hapus</a>

                                    <a href="<?= base_url(); ?>fik/ubah/<?= $komen['id_komentar']; ?>" class="badge badge-warning float-right">Ubah</a>
                                <?php endif; ?>
                                <p class="card-text"><?= $komen['isi_komentar']; ?></p>
                                <div class="divider"></div>
                                <hr>
                            <?php else : ?>


                            <?php endif; ?>
                        <?php endif; ?>


                    <?php endforeach; ?>

                </div>
            </div>

            <a href="<?= base_url(); ?>fik" class="btn btn-primary mt-5">Kembali</a>

        </div>
    </row>
</div>