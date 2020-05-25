
<div class="container-content">
    <row class="mt-3">
        <div class="col-md-6">
        
            <div class="card">
                <div class="card-header">
                     <?= $elektro['nama_thread'] ?>
                </div>
                    <div class="card-body">
                        <h6 class="card-subtitle mb-2 text-muted"><?= $elektro['timestamp']?></h6>
                        <p class="card-text"><?= $elektro['isi']?></p>
                    </div>
            </div>
                
            
            <div class="input-group mt-2">
                    <input type="text" class="form-control" placeholder="Tambahkan Komentar..." name="keyword">
                    <div class="input-group-append">
                        <button class="btn btn-primary " type="submit" name="komentar">Kirim</button>
                    </div>
                </div>
                    
                <div class="card mt-2">
                    <div class="card-body">
                        <h6 class="card-subtitle mb-2 text-muted"></h6>
                        <p class="card-text"></p>
                    </div>
            </div>
                
            
                        <a href="<?=base_url();?>elektro" class="btn btn-primary mt-5">Kembali</a>
        
        </div>
    </row>
</div>