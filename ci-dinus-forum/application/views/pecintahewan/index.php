<div class="container-content">
    <h2>Pecinta Hewan</h2>

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
                <a href="<?= base_url(); ?>pecintahewan/tambah" class="btn btn-primary">Buat Thread Baru</a>
            </div>
        </div>
    <?php endif; ?>


    <?php foreach ($pecintahewan as $ph) : ?>
        <div class="card">

            <div class="card-body">
                <img class="img-profile rounded-circle float-left mr-2" src="<?= base_url('assets/img/profile/') . $user['gambar_profile']; ?>">
                <h5 class="card-title"><?= $ph['username']; ?></h5>
                <h6 class="card-subtitle mb-2 text-muted"><?= $ph['timestamp'] ?></h6>

                <?php if ($this->session->userdata('username') !=  $ph['username']) : ?>

                <?php else : ?>
                    <a href="<?= base_url(); ?>pecintahewan/hapus/<?= $ph['id_thread']; ?>" class="badge badge-danger float-right" onclick="return confirm('Yakin?');">Hapus</a>
                    <a href="<?= base_url(); ?>pecintahewan/ubah/<?= $ph['id_thread']; ?>" class="badge badge-warning float-right">Ubah</a>
                <?php endif; ?>

                <a href="<?= base_url(); ?>pecintahewan/detail/<?= $ph['id_thread']; ?>" class="card-link"><strong><?= $ph['nama_thread']; ?></strong></a>
                <?php if ($ph['gambar']) : ?>
                    <a href="<?= base_url(); ?>pecintahewan/detail/<?= $ph['id_thread']; ?>"><img src="<?= base_url('assets/img/thread/pecintahewan/') . $ph['gambar']; ?>" class="card-img-top"></a>
                <? else : ?>

                <?php endif; ?>

            </div>
        </div>
    <?php endforeach; ?>
</div>