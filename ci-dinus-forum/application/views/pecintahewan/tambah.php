<div class="container">

    <div class="row-mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Form Buat Thread Baru
                </div>
                <div class="card-body">
                
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="nama_thread">Nama Thread</label>
                            <input type = "text" name="nama_thread" class="form-control" id="nama_thread" placeholder="Isikan nama judul thread anda..">
                            <small class="form-text text-danger"><?= form_error('nama_thread'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="isi">Isi</label>
                            <input type = "text" name="isi" class="form-control" id="isi" placeholder="Ceritakan thread anda..">
                            <small class="form-text text-danger"><?= form_error('isi'); ?></small>
                        </div>

                        <button type="submit" name="tambah" class="btn btn-primary float-right">Buat Thread</button>
                    </form>
                </div>
            </div>

            
        </div>
    </div>

</div>