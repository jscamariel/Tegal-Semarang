<div class="container-content">
    <row class="mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    <img class="img-profile rounded-circle" src="<?= base_url('assets/img/profile/') . $user['gambar_profile']; ?>">

                    <strong><?= $elektro['username'] ?></strong>
                </div>
                <div class="card-body">
                    <h5><?= $elektro['nama_thread'] ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= $elektro['timestamp'] ?></h6>

                    <?php if ($elektro['gambar']) : ?>
                        <img src="<?= base_url('assets/img/thread/elektro/') . $elektro['gambar']; ?>" class="card-img-top">
                        </a><? else : ?>

                    <?php endif; ?>

                    <p class="card-text"><?= $elektro['isi'] ?></p>
                </div>
            </div>



            <div class="card mt-1">
                <div class="card-body">

                    <h6 class="card-subtitle mb-2 text-muted"> <?= $jumlah_komen ?>Komentar </h6>


                    <?php foreach ($komentar as $komen) : ?>

                        <?php if ($komen['id_kategori'] != $elektro['id_kategori']) : ?>
                        <?php else : ?>
                            <?php if ($komen['id_thread'] == $elektro['id_thread']) : ?>
                                <img class="img-profile rounded-circle float-left" src="<?= base_url('assets/img/profile/') . $user['gambar_profile']; ?>">

                                <h5><?= $komen['username']; ?></h5>
                                <h6 class="card-subtitle mb-2 text-muted"><?= $komen['timestamp'] ?></h6>

                                <?php if ($this->session->userdata('username') !=  $komen['username']) : ?>
                                <?php else : ?>
                                    <a href="<?= base_url(); ?>elektro/hapusKomen/<?= $komen['id_komentar']; ?>" class="badge badge-danger float-right" onclick="return confirm('Yakin?');">Hapus</a>

                                    <a href="<?= base_url(); ?>elektro/ubah/<?= $komen['id_komentar']; ?>" class="badge badge-warning float-right">Ubah</a>
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

            <a href="<?= base_url(); ?>admin/admin/elektro/elektro" class="btn btn-primary mt-5">Kembali</a>

        </div>
    </row>
</div>