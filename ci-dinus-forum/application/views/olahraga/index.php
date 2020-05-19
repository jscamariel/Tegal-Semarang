<div class="container-content">
    
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
            <a href = "<?= base_url(); ?>olahraga/tambah" class="btn btn-primary">Buat Thread Baru</a>
        </div>
    </div>

    <div class ="">
        <div class = "">
            <form action="" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari Thread disini.." name="keyword">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Cari</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

    <div class="">
        <div class="">
            <h3>Topik dalam Olahraga</h3>
                <?php if(empty($olahraga)): ?>
                    <div class="alert alert-danger" role="alert">
                        Data tidak ditemukan!
                    </div>
                <?php endif; ?>
        </div>
    </div>

    <?php foreach($olahraga as $or) : ?>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Nama MHS</h5>
            
            <a href = "<?= base_url(); ?>olahraga/hapus/<?= $or['id_thread']; ?>" class = "badge badge-danger float-right" onclick="return confirm('Yakin?');">Hapus</a>
            <a href = "<?= base_url(); ?>olahraga/ubah/<?= $or['id_thread']; ?>" class = "badge badge-warning float-right">Ubah</a>
            <h6 class="card-subtitle mb-2 text-muted"><?= $or['timestamp']?></h6>
            
            <a href="<?= base_url(); ?>olahraga/detail/<?= $or['id_thread']; ?>" class="card-link"><?= $or['nama_thread']; ?></a>
        </div>
    </div>
    <?php endforeach; ?>
</div>