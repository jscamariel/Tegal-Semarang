<!-- Sidebar -->
<div class="rightsidebar" id="">
    <div class="card" style="width: 18rem; height:18rem;">
        <div class="card-header p-2">
            <strong><a class="card-title" href="<?= base_url('berita') ?>">Berita</a></strong>
        </div>
        <?php foreach ($berita as $br) :  ?>
            <div class="card-body">
                <a href="<?= base_url(); ?>berita/detail/<?= $br['id']; ?>"><strong class="card-title"><?= $br['judul']; ?></strong></a>
                <h6><?= $br['timestamp']; ?></h6>

                <?php if ($br['gambar']) : ?>
                    <a href="<?= base_url(); ?>berita/detail/<?= $br['id']; ?>"><img src="<?= base_url('assets/img/berita/') . $br['gambar']; ?>" class="img-thumbnail"></a>
                <? else : ?>
                <?php endif; ?>


            </div>
        <?php endforeach; ?>
    </div>

    <div class="card" style="width: 18rem;">
        <div class="card-header p-2">
            <strong><a class="card-title" href="<?= base_url('event') ?>">Event Yang Akan Datang</a></strong>
        </div>
        <div class="card-body">
            <?php if ($event) : ?>
                <?php foreach ($event as $ev) : ?>
                    <a href="<?= base_url(); ?>event/detail/<?= $ev['id']; ?>"><strong class="card-title"><?= $ev['judul']; ?></strong></a>
                    <h6><?= $ev['timestamp']; ?></h6>

                    <?php if ($ev['gambar']) : ?>
                        <a href="<?= base_url(); ?>event/detail/<?= $ev['id']; ?>"><img src="<?= base_url('assets/img/event/') . $ev['gambar']; ?>" class="img-thumbnail"></a>
                    <? else : ?>

                    <?php endif; ?>


                <?php endforeach; ?>
        </div>
    <?php else : ?>
        <h5>Tidak ada Event </h5>
    <?php endif; ?>
    </div>
</div>


<script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/php-email-form/validate.js"></script>
<script src="<?= base_url(); ?>assets/vendor/jquery-sticky/jquery.sticky.js"></script>
<script src="<?= base_url(); ?>assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/venobox/venobox.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/waypoints/jquery.waypoints.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/aos/aos.js"></script>

<!-- Template Main JS File -->
<script src="<?= base_url(); ?>assets/js/main.js"></script>

<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
</script>


</body>

</html>