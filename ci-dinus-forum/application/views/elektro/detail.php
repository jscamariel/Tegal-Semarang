<div class="container-content">
    <row class="mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    <img class="img-profile rounded-circle" src="<?= base_url('assets/img/profile/') . $pp['gambar_profile']; ?>">

                    <strong><?= $elektro['username'] ?></strong>
                </div>
                <div class="card-body">
                    <h5><?= $elektro['nama_thread'] ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= $elektro['timestamp'] ?></h6>

                    <?php if ($elektro['gambar']) : ?>
                        <img src="<?= base_url('assets/img/thread/elektro/') . $elektro['gambar']; ?>" class="card-img-top">
                        </a><? else : ?>

                    <?php endif; ?>

                    <p class="card-text"><?= $elektro['isi'] ?></p>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">

                            <button class="btn button liked likebtn" data="<?= $elektro['id_thread'] ?>" title="Like"> Like <?= $jumlah_like  ?></button>

                        </div>
                        <div class="col-sm-6">
                            <button class="btn button  disliked dislikebtn" data="<?= $elektro['id_thread'] ?>" title="Dislike">Dislike</button>
                        </div>
                    </div>
                </div>
            </div>

            <form method="POST" action="<?= base_url('elektro/kirimKomen/') . $elektro['id_thread']; ?>">
                <div class="input-group mt-1 align-justify-content-end">

                    <?php if ($this->session->userdata('logged_in')) : ?>
                        <input type="text" class="form-control" placeholder="Leave a reply..." name="isi_komentar">
                        <div class="input-group-append">
                            <button class="btn btn-secondary icofont-reply" type="submit" name="kirimKomen"></button>
                        </div>
                    <?php else : ?>
                        <input type="text" class="form-control" placeholder="Silahkan Login terlebih dahulu" name="isi_komentar" readonly>
                        <div class="input-group-append">
                            <a href="<?= base_url('auth'); ?>" class="btn btn-secondary icofont-reply" type="submit" name="kirimKomen"></a>
                        </div>
                    <?php endif; ?>
                </div>
            </form>

            <div class="card mt-1">
                <div class="card-body">

                    <h6 class="card-subtitle mb-2 text-muted"> <?= $jumlah_komen ?>Komentar </h6>


                    <?php foreach ($komentar as $komen) : ?>

                        <?php if ($komen['id_kategori'] != $elektro['id_kategori']) : ?>
                        <?php else : ?>
                            <?php if ($komen['id_thread'] == $elektro['id_thread']) : ?>
                                <img class="img-profile rounded-circle float-left" src="<?= base_url('assets/img/profile/') . $user['gambar_profile']; ?>">

                                <h5><?= $komen['username']; ?></h5>
                                <h6 class="card-subtitle mb-2 text-muted"><?= $komen['timestamp'] ?></h6>

                                <?php if ($this->session->userdata('username') !=  $komen['username']) : ?>
                                <?php else : ?>
                                    <a href="<?= base_url(); ?>elektro/hapusKomen/<?= $komen['id_komentar']; ?>" class="badge badge-danger float-right" onclick="return confirm('Yakin?');">Hapus</a>

                                    <a href="<?= base_url(); ?>elektro/ubah/<?= $komen['id_komentar']; ?>" class="badge badge-warning float-right">Ubah</a>
                                <?php endif; ?>
                                <p class="card-text"><?= $komen['isi_komentar']; ?></p>
                                <div class="divider"></div>
                                <hr>
                            <?php else : ?>


                            <?php endif; ?>
                        <?php endif; ?>


                    <?php endforeach; ?>

                </div>
            </div>

            <a href="<?= base_url(); ?>elektro" class="btn btn-primary mt-5">Kembali</a>

        </div>
    </row>
</div>

<script>
    $('.liked').click(function() {
        id_thread = $(this).attr('data');
        btn = $(this);


        if (btn.hasClass('unlikebtn')) {
            $.ajax({
                url: '<?= base_url('elektro/unlike/') ?>' + id_thread,
                success: function(result) {
                    btn.html('<i class="far fa-thumbs-up">Like</i>');
                    btn.removeClass('unlikebtn');
                    btn.addClass('likebtn');
                }
            });
        }

        if (btn.hasClass('likebtn')) {
            $.ajax({
                url: '<?= base_url('elektro/like/') ?>' + id_thread,
                success: function(result) {
                    btn.html('<i class="fas fa-thumbs-up">Unlike</i>');
                    btn.removeClass('likebtn');
                    btn.addClass('unlikebtn');
                }
            });
        }

    });

    $('.disliked').click(function() {
        id_thread = $(this).attr('data');
        btn = $(this);

        if (btn.hasClass('undislikebtn')) {
            $.ajax({
                url: '<?= base_url('elektro/undislike/') ?>' + id_thread,
                success: function(result) {
                    btn.html('<i class="far fa-thumbs-down">Dislike</i>');
                    btn.removeClass('undislikebtn');
                    btn.addClass('dislikebtn');
                }
            });
        }

        if (btn.hasClass('dislikebtn')) {
            $.ajax({
                url: '<?= base_url('elektro/dislike/') ?>' + id_thread,
                success: function(result) {
                    btn.html('<i class="fas fa-thumbs-down">Undislike</i>');
                    btn.removeClass('dislikebtn');
                    btn.addClass('undislikebtn');
                }
            });
        }

    });
</script>