<div class="container-content">
    <h2>Fakultas Ilmu Budaya</h2>

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
                <a href="<?= base_url(); ?>fib/tambah" class="btn btn-primary">Buat Thread Baru</a>
            </div>
        </div>
    <?php endif; ?>

    <?php foreach ($fib as $fi) : ?>
        <div class="card">

            <div class="card-body">
                <img class="img-profile rounded-circle float-left mr-2" src="<?= base_url('assets/img/profile/') . $user['gambar_profile']; ?>">
                <h5 class="card-title"><?= $fi['username']; ?></h5>
                <h6 class="card-subtitle mb-2 text-muted"><?= $fi['timestamp'] ?></h6>


                <?php if ($this->session->userdata('username') !=  $fi['username']) : ?>
                <?php else : ?>
                    <a href="<?= base_url(); ?>fib/hapus/<?= $fi['id_thread']; ?>" class="badge badge-danger float-right" onclick="return confirm('Yakin?');">Hapus</a>
                    <a href="<?= base_url(); ?>fib/ubah/<?= $fi['id_thread']; ?>" class="badge badge-warning float-right">Ubah</a>
                <?php endif; ?>
                <a href="<?= base_url(); ?>fib/detail/<?= $fi['id_thread']; ?>" class="card-link"><strong><?= $fi['nama_thread']; ?></strong></a>
                <?php if ($fi['gambar']) : ?>
                    <a href="<?= base_url(); ?>fib/detail/<?= $fi['id_thread']; ?>"><img src="<?= base_url('assets/img/thread/fib/') . $fi['gambar']; ?>" class="card-img-top"></a>
                <? else : ?>

                <?php endif; ?>

            </div>
        </div>
    <?php endforeach; ?>
</div>