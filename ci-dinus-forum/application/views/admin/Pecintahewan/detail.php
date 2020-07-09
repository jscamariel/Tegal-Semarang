<div class="container-content">
    <row class="mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    <img class="img-profile rounded-circle" src="<?= base_url('assets/img/profile/') . $user['gambar_profile']; ?>">

                    <strong><?= $pecintahewan['username'] ?></strong>
                </div>
                <div class="card-body">
                    <h5><?= $pecintahewan['nama_thread'] ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= $pecintahewan['timestamp'] ?></h6>

                    <?php if ($pecintahewan['gambar']) : ?>
                        <img src="<?= base_url('assets/img/thread/pecintahewan/') . $pecintahewan['gambar']; ?>" class="card-img-top">
                        </a><? else : ?>

                    <?php endif; ?>

                    <p class="card-text"><?= $pecintahewan['isi'] ?></p>
                </div>
            </div>



            <div class="card mt-1">
                <div class="card-body">

                    <h6 class="card-subtitle mb-2 text-muted"> <?= $jumlah_komen ?>Komentar </h6>


                    <?php foreach ($komentar as $komen) : ?>

                        <?php if ($komen['id_kategori'] != $pecintahewan['id_kategori']) : ?>
                        <?php else : ?>
                            <?php if ($komen['id_thread'] == $pecintahewan['id_thread']) : ?>
                                <img class="img-profile rounded-circle float-left" src="<?= base_url('assets/img/profile/') . $user['gambar_profile']; ?>">

                                <h5><?= $komen['username']; ?></h5>
                                <h6 class="card-subtitle mb-2 text-muted"><?= $komen['timestamp'] ?></h6>

                                <?php if ($this->session->userdata('username') !=  $komen['username']) : ?>
                                <?php else : ?>
                                    <a href="<?= base_url(); ?>pecintahewan/hapusKomen/<?= $komen['id_komentar']; ?>" class="badge badge-danger float-right" onclick="return confirm('Yakin?');">Hapus</a>

                                    <a href="<?= base_url(); ?>pecintahewan/ubah/<?= $komen['id_komentar']; ?>" class="badge badge-warning float-right">Ubah</a>
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

            <a href="<?= base_url(); ?>admin/admin/pecintahewan" class="btn btn-primary mt-5">Kembali</a>

        </div>
    </row>
</div>