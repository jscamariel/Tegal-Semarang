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
   
   <div class = "">
        <div class = "">
            <a href = "<?= base_url(); ?>feb/tambah" class="btn btn-primary">Buat Thread Baru</a>
        </div>
    </div>

<?php foreach($feb as $fe) : ?>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Nama MHS</h5>
            <a class="icofont-rounded-down float-right" href="#"></a>
            <h6 class="card-subtitle mb-2 text-muted"><?= $fe['timestamp']?></h6>
            
            <a href="<?= base_url(); ?>feb/detail/<?= $fe['id_thread']; ?>" class="card-link"><?= $fe['nama_thread']; ?></a>
        </div>
    </div>
    <?php endforeach; ?>
</div>