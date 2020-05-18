<div class="container-content">
    <h2>Fakultas Teknik Elektro</h2>

    <div class="row-mt-3">
        <div class="col-md-5">
            <div class="card" id="form">
                <div class="card-header">
                    Buat Thread Baru
                </div>
                <div class="card-body">
                
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="nama_thread">Nama Thread</label>
                            <input type = "text" name="nama_thread" class="form-control" id="nama_thread" placeholder="Judul Thread anda">
                            <small class="form-text text-danger"><?= form_error('nama_thread'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="isi">Isi</label>
                            <input type = "text" name="isi" class="form-control" id="isi" placeholder="Ceritakan thread anda..">
                            <small class="form-text text-danger"><?= form_error('isi'); ?></small>
                        </div>

                        <button type="submit" name="tambah" class="btn btn-primary float-right" id="submit">Buat Thread</button>
                        <button type="" name="tambah" class="btn btn-danger float-right" id="cancel">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



<?php if( $this->session->flashdata('flash')) : ?>
        <div class = "">
            <div class = "">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Thread <strong>Berhasil</strong> <?= $this->session->flashdata('flash'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </div>
            </div>
        </div>
    <?php endif; ?>
   
   <div class = "">
        <div class = "">
            <a class="btn btn-primary" id="buat">Buat Thread Baru</a>
        </div>
    </div>

<?php foreach($elektro as $el) : ?>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Nama MHS</h5>
            <a class="icofont-rounded-down float-right" href="#"></a>
            <h6 class="card-subtitle mb-2 text-muted"><?= $el['timestamp']?></h6>
            
            <a href="<?= base_url(); ?>elektro/detail/<?= $el['id_thread']; ?>" class="card-link"><?= $el['nama_thread']; ?></a>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<script !src="">
    $(document).ready(function ()
    {
        $('#form').hide();

        $('#buat').click(function()
        {
            $('#form').show();
            $('#buat').hide();
            

            $('#cancel').click(function()
            {
                $('#form').hide();
                $('#buat').show();
            })

        })
    });

</script>