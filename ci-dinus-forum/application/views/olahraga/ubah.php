<div class="container-content">

    <div class="mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Form Ubah Thread
                </div>
                <div class="card-body">

                    <form action="" method="post">
                        <input type="hidden" name="id_thread" value="<?= $olahraga['id_thread']; ?>">
                        <div class="form-group">
                            <label for="nama_thread">Nama Thread</label>
                            <input type="text" name="nama_thread" class="form-control" id="nama_thread" value="<?= $olahraga['nama_thread']; ?>">
                            <small class="form-text text-danger"><?= form_error('nama_thread'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="isi">Isi</label>
                            <input type="text" name="isi" class="form-control" id="isi" value="<?= $olahraga['isi']; ?>">
                            <small class="form-text text-danger"><?= form_error('isi'); ?></small>
                        </div>

                        <button type="submit" name="ubah" class="btn btn-primary float-right">Perbarui Thread</button>
                        <a href="<?= base_url('olahraga') ?>" class="btn btn-danger float-right">Cancel</a>
                    </form>
                </div>
            </div>


        </div>
    </div>

</div>