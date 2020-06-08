<div class="container-content">
    <h2>Berita</h2>

    <?php foreach ($berita as $brt) : ?>
        <div class="card">

            <div class="card-body">

                <h5 class="card-title"><?= $brt['judul']; ?></h5>
                <h6 class="card-subtitle mb-2 text-muted"><?= $brt['timestamp'] ?></h6>

                <a href="<?= base_url(); ?>berita/detail/<?= $brt['id']; ?>" class="card-link"><?= $brt['isi']; ?></a>
                <?php if ($brt['gambar']) : ?>
                    <a href="<?= base_url(); ?>berita/detail/<?= $brt['id']; ?>"><img src="<?= base_url('assets/img/berita/') . $brt['gambar']; ?>" class="card-img-top"></a>

                <? else : ?>

                <?php endif; ?>

            </div>
        </div>
    <?php endforeach; ?>
</div>