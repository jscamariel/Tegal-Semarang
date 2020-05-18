
<div class="container-content">
    <row class="mt-3">
        <div class="col-md-6">
        
            <div class="card">
                <div class="card-header">
                     <?= $fotografi['nama_thread'] ?>
                </div>
                    <div class="card-body">
                        <h6 class="card-subtitle mb-2 text-muted"><?= $fotografi['timestamp']?></h6>
                        <p class="card-text"><?= $fotografi['isi']?></p>
                        <a href="<?=base_url();?>fotografi" class="btn btn-primary">Kembali</a>
                    </div>
            </div>
        
        </div>
    </row>
</div>