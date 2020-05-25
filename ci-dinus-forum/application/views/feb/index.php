<div class="container-content">
    <h2>Fakultas Ekonomi dan Bisnis</h2>

<?php if( $this->session->flashdata('flash')) : ?>
        <div class = "">
            <div class = "">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data olahraga <strong>Berhasil</strong> <?= $this->session->flashdata('flash'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </div>
            </div>
        </div>
    <?php endif; ?>
   
    <?php if($this->session->userdata('logged_in')) : ?>
   <div class = "">
        <div class = "">
            <a href = "<?= base_url(); ?>feb/tambah" class="btn btn-primary">Buat Thread Baru</a>
        </div>
    </div>
    <?php endif; ?>

<?php foreach($feb as $fe) : ?>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><?= $fe['username'];?></h5>
            <?php if($this->session->userdata('username') !=  $fe['username']) : ?>
                
            <?php else : ?>
                <a href = "<?= base_url(); ?>feb/hapus/<?= $fe['id_thread']; ?>" class = "badge badge-danger float-right" onclick="return confirm('Yakin?');">Hapus</a>
                <a href = "<?= base_url(); ?>feb/ubah/<?= $fe['id_thread']; ?>" class = "badge badge-warning float-right">Ubah</a>       

            <?php endif; ?>
            <h6 class="card-subtitle mb-2 text-muted"><?= $fe['timestamp'];?></h6>
            
            <a href="<?= base_url(); ?>feb/detail/<?= $fe['id_thread']; ?>" class="card-link"><?= $fe['nama_thread']; ?></a>
        </div>
    </div>
    <?php endforeach; ?>
</div>