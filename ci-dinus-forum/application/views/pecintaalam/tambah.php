<div class="container-content">

    <div class="row-mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Form Buat Thread Baru
                </div>
                <div class="card-body">

                    <?= form_open_multipart('pecintaalam/tambah'); ?>
                    <div class="form-group">
                        <label for="nama_thread">Nama Thread</label>
                        <input type="text" name="nama_thread" class="form-control" id="nama_thread" placeholder="Isikan nama judul thread anda..">
                        <small class="form-text text-danger"><?= form_error('nama_thread'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="isi">Isi</label>
                        <input type="text" name="isi" class="form-control" id="isi" placeholder="Ceritakan thread anda..">
                        <small class="form-text text-danger"><?= form_error('isi'); ?></small>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-2">Gambar</div>
                        <div class="col-sm-10">
                            <div class="row">

                                <div class="col-sm-9">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="gambar" name="gambar">
                                        <label class="custom-file-label" for="gambar">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" name="tambah" class="btn btn-primary float-right">Buat Thread</button>
                    </form>
                </div>
            </div>


        </div>
    </div>

</div>