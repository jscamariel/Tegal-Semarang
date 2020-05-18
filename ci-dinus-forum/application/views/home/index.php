<div class="container-content">
    <h2>Beranda</h2>

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
            <a href = "<?= base_url(); ?>fik/tambah" class="btn btn-primary">Buat Thread Baru</a>
        </div>
    </div>

<?php foreach($home as $hm) : ?>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Nama MHS</h5>
            <a class="icofont-rounded-down float-right" href="#"></a>
            <h6 class="card-subtitle mb-2 text-muted"><?= $hm['timestamp']?></h6>
            
            <a href="<?= base_url(); ?>home/detail/<?= $hm['id_thread']; ?>" class="card-link"><?= $hm['nama_thread']; ?></a>
        </div>
    </div>
    <?php endforeach; ?>
</div>