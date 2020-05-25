<div class="container-content">
    <h2>Beranda</h2>

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
   
    <?php if($this->session->userdata('logged_in')) : ?>
   <div class = "">
        <div class = "">
            <a href = "<?= base_url(); ?>home/tambah" class="btn btn-primary" id="buat">Buat Thread Baru</a>
        </div>
    </div>
<?php endif; ?>

<?php foreach($home as $hm) : ?>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><?= $hm['username']; ?></h5>
            <!-- <a class="icofont-rounded-down float-right" href=""></a> -->
            <?php if($this->session->userdata('username') !=  $hm['username']) : ?>
                
            <?php else : ?>
                <a href = "<?= base_url(); ?>home/hapus/<?= $hm['id_thread']; ?>" class = "badge badge-danger float-right" onclick="return confirm('Yakin?');">Hapus</a>
                <a href = "<?= base_url(); ?>home/ubah/<?= $hm['id_thread']; ?>" class = "badge badge-warning float-right">Ubah</a>       
            <?php endif ;?>
            
            <h6 class="card-subtitle mb-2 text-muted"><?= $hm['timestamp']?></h6>
            
            <a href="<?= base_url(); ?>home/detail/<?= $hm['id_thread']; ?>" class="card-link"><?= $hm['nama_thread']; ?></a>
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