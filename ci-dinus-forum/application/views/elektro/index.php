<div class="container-content">
    <h2>Fakultas Teknik Elektro</h2>

    <?php if ($this->session->flashdata('flash')) : ?>
        <div class="">
            <div class="">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Thread <strong>Berhasil</strong> <?= $this->session->flashdata('flash'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if ($this->session->userdata('logged_in')) : ?>
        <div class="">
            <div class="">
                <a href="<?= base_url(); ?>elektro/tambah" class="btn btn-primary" id="buat">Buat Thread Baru</a>
            </div>
        </div>
    <?php endif; ?>

    <?php foreach ($elektro as $el) : ?>
        <div class="card">

            <div class="card-body">
                <img class="img-profile rounded-circle float-left mr-2" src="<?= base_url('assets/img/profile/'); ?>default.jpg">
                <h5 class="card-title"><?= $el['username']; ?></h5>
                <h6 class="card-subtitle mb-2 text-muted"><?= $el['timestamp'] ?></h6>


                <?php if ($this->session->userdata('username') !=  $el['username']) : ?>
                <?php else : ?>
                    <a href="<?= base_url(); ?>elektro/hapus/<?= $el['id_thread']; ?>" class="badge badge-danger float-right" onclick="return confirm('Yakin?');">Hapus</a>
                    <a href="<?= base_url(); ?>elektro/ubah/<?= $el['id_thread']; ?>" class="badge badge-warning float-right">Ubah</a>
                <?php endif; ?>


                <a href="<?= base_url(); ?>elektro/detail/<?= $el['id_thread']; ?>" class="card-link"><?= $el['nama_thread']; ?></a>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<script !src="">
    $(document).ready(function() {
        $('#form').hide();

        $('#buat').click(function() {
            $('#form').show();
            $('#buat').hide();


            $('#cancel').click(function() {
                $('#form').hide();
                $('#buat').show();
            })

        })
    });
</script>