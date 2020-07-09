<div class="container-content">
    <h2><a href="<?= base_url('event'); ?>">Event</a></h2>

    <?php foreach ($event as $ev) : ?>
        <div class="card">

            <div class="card-body">

                <a href="<?= base_url(); ?>event/detail/<?= $ev['id']; ?>">
                    <h5 class="card-title"><?= $ev['judul']; ?></h5>
                </a>
                <h6 class="card-subtitle mb-2 text-muted"><?= $ev['timestamp'] ?></h6>

                <a href="<?= base_url(); ?>event/detail/<?= $ev['id']; ?>" class="card-link"><?= $ev['isi']; ?></a>

                <?php if ($ev['gambar']) : ?>
                    <a href="<?= base_url(); ?>event/detail/<?= $ev['id']; ?>"><img src="<?= base_url('assets/img/event/') . $ev['gambar']; ?>" class="card-img-top"></a>
                <? else : ?>

                <?php endif; ?>

            </div>
        </div>
    <?php endforeach; ?>
    <br>
    <?= $this->pagination->create_links(); ?>
</div>