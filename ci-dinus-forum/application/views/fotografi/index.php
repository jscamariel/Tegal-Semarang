<div class="container-content">
    <h2>Fotografi</h2>

<?php if( $this->session->flashdata('flash')) : ?>
        <div class = "">
            <div class = "">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data  <strong>Berhasil</strong> <?= $this->session->flashdata('flash'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </div>
            </div>
        </div>
    <?php endif; ?>
   
    <?php if($this->session->userdata('logged_in')) : ?>
    <div class = "">
        <div class = "">
            <a href = "<?= base_url(); ?>fotografi/tambah" class="btn btn-primary">Buat Thread Baru</a>
        </div>
    </div>
    <?php endif; ?>


    <?php foreach($fotografi as $foto) : ?>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><?= $foto['username']; ?></h5>
            <!-- <a class="icofont-rounded-down float-right" href=""></a> -->
            <?php if($this->session->userdata('username') !=  $foto['username']) : ?>
                
            <?php else : ?>
                <a href = "<?= base_url(); ?>fotografi/hapus/<?= $foto['id_thread']; ?>" class = "badge badge-danger float-right" onclick="return confirm('Yakin?');">Hapus</a>
                <a href = "<?= base_url(); ?>fotografi/ubah/<?= $foto['id_thread']; ?>" class = "badge badge-warning float-right">Ubah</a>       
            <?php endif ;?>
            
            <h6 class="card-subtitle mb-2 text-muted"><?= $foto['timestamp']?></h6>
            
            <a href="<?= base_url(); ?>fotografi/detail/<?= $foto['id_thread']; ?>" class="card-link"><?= $foto['nama_thread']; ?></a>
        </div>
    </div>
    <?php endforeach; ?>
</div>