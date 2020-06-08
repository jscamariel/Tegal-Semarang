<div class="container-content">
    <h2>Games</h2>

    <?php if ($this->session->flashdata('flash')) : ?>
        <div class="">
            <div class="">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data <strong>Berhasil</strong> <?= $this->session->flashdata('flash'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if ($this->session->userdata('logged_in')) : ?>
        <div class="">
            <div class="">
                <a href="<?= base_url(); ?>game/tambah" class="btn btn-primary">Buat Thread Baru</a>
            </div>
        </div>
    <?php endif; ?>


    <?php foreach ($game as $gm) : ?>
        <div class="card">

            <div class="card-body">
                <img class="img-profile rounded-circle float-left mr-2" src="<?= base_url('assets/img/profile/') . $user['gambar']; ?>">
                <h5><?= $gm['username'] ?></h5>
                <h6 class="card-subtitle mb-2 text-muted"><?= $gm['timestamp'] ?></h6>

                <?php if ($this->session->userdata('username') !=  $gm['username']) : ?>
                <?php else : ?>
                    <a href="<?= base_url(); ?>game/hapus/<?= $gm['id_thread']; ?>" class="badge badge-danger float-right" onclick="return confirm('Yakin?');">Hapus</a>
                    <a href="<?= base_url(); ?>game/ubah/<?= $gm['id_thread']; ?>" class="badge badge-warning float-right">Ubah</a>
                <?php endif; ?>
                <a href="<?= base_url(); ?>game/detail/<?= $gm['id_thread']; ?>" class="card-link"><strong><?= $gm['nama_thread']; ?></strong></a>
                <?php if ($gm['gambar']) : ?>
                    <a href="<?= base_url(); ?>game/detail/<?= $gm['id_thread']; ?>"><img src="<?= base_url('assets/img/thread/game/') . $gm['gambar']; ?>" class="card-img-top"></a>
                <? else : ?>

                <?php endif; ?>

            </div>
        </div>
    <?php endforeach; ?>
</div>