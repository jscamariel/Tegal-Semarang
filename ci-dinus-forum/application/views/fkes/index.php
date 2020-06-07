<div class="container-content">
    <h2>Fakultas Kesehatan</h2>

    <?php if ($this->session->flashdata('flash')) : ?>
        <div class="">
            <div class="">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Thread <strong>Berhasil</strong> <?= $this->session->flashdata('flash'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if ($this->session->userdata('logged_in')) : ?>
        <div class="">
            <div class="">
                <a href="<?= base_url(); ?>fkes/tambah" class="btn btn-primary">Buat Thread Baru</a>
            </div>
        </div>
    <?php endif; ?>

    <?php foreach ($fkes as $fk) : ?>
        <div class="card">

            <div class="card-body">
                <img class="img-profile rounded-circle float-left mr-2" src="<?= base_url('assets/img/profile/'); ?>default.jpg">
                <h5 class="card-title"><?= $fk['username']; ?></h5>
                <h6 class="card-subtitle mb-2 text-muted"><?= $fk['timestamp'] ?></h6>

                <?php if ($this->session->userdata('username') !=  $fk['username']) : ?>
                <?php else : ?>
                    <a href="<?= base_url(); ?>fkes/hapus/<?= $fk['id_thread']; ?>" class="badge badge-danger float-right" onclick="return confirm('Yakin?');">Hapus</a>
                    <a href="<?= base_url(); ?>fkes/ubah/<?= $fk['id_thread']; ?>" class="badge badge-warning float-right">Ubah</a>

                <?php endif; ?>


                <a href="<?= base_url(); ?>fkes/detail/<?= $fk['id_thread']; ?>" class="card-link"><?= $fk['nama_thread']; ?></a>
            </div>
        </div>
    <?php endforeach; ?>
</div>