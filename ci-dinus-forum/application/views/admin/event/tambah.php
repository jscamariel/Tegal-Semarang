<div class="container-content">

    <div class="row-mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Tambah Event Baru
                </div>
                <div class="card-body">

                    <?= form_open_multipart('admin/admin/tambahEvent'); ?>
                    <div class="form-group">
                        <label for="nama_thread">Judul Event</label>
                        <input type="text" name="judul" class="form-control" id="judul">
                        <small class="form-text text-danger"><?= form_error('judul'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="isi">Isi</label>
                        <input type="text" name="isi" class="form-control" id="isi">
                        <small class="form-text text-danger"><?= form_error('isi'); ?></small>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="date">Tanggal</label>
                                <input type="date" name="date" class="form-control" id="date">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="time">Waktu</label>
                                <input type="time" name="time" class="form-control" id="time">
                            </div>
                        </div>
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

                    <button type="submit" name="tambahEvent" class="btn btn-primary float-right">Tambah Event</button>
                    </form>
                </div>
            </div>


        </div>
    </div>

</div>


<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
</script>