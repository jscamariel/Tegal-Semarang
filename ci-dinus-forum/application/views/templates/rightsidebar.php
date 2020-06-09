<!-- Sidebar -->
<div class="rightsidebar" id="">

    <div class="card" style="width: 20rem; height:18rem;">
        <div class="card-header p-2">
            <strong><a class="card-title" href="<?= base_url('berita') ?>">Berita</a></strong>
        </div>

        <div class="card-body">
            <div class="slideshow-container" data-cycle="2500">
                <?php foreach ($berita as $br) :  ?>
                    <div class="mySlides fade">

                        <a href="<?= base_url(); ?>berita/detail/<?= $br['id']; ?>"><strong class="card-title"><?= $br['judul']; ?></strong></a>
                        <h6><?= $br['timestamp']; ?></h6>
                        <?php if ($br['gambar']) : ?>
                            <a href="<?= base_url(); ?>berita/detail/<?= $br['id']; ?>"><img src="<?= base_url('assets/img/berita/') . $br['gambar']; ?>" class="img-thumbnail"></a>
                        <? else : ?>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>

    </div>

    <div class="card" style="width: 20rem;">
        <div class="card-header p-2">
            <strong><a class="card-title" href="<?= base_url('event') ?>">Event Yang Akan Datang</a></strong>
        </div>

        <div class="card-body">
            <div class="slideshow-container" data-cycle="2600">
                <?php foreach ($event as $ev) : ?>
                    <div class="mySlides fade">
                        <a href="<?= base_url(); ?>event/detail/<?= $ev['id']; ?>"><strong class="card-title"><?= $ev['judul']; ?></strong></a>
                        <h6><?= $ev['timestamp']; ?></h6>

                        <?php if ($ev['gambar']) : ?>
                            <a href="<?= base_url(); ?>event/detail/<?= $ev['id']; ?>"><img src="<?= base_url('assets/img/event/') . $ev['gambar']; ?>" class="img-thumbnail"></a>
                        <? else : ?>

                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
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

        /* Find all slideshow containers */
        var slideshowContainers = document.getElementsByClassName("slideshow-container");
        /* For each container get starting variables */
        for (let s = 0; s < slideshowContainers.length; s++) {
            /* Read the new data attribute */
            var cycle = slideshowContainers[s].dataset.cycle;
            /* Find all the child nodes with class mySlides */
            var slides = slideshowContainers[s].querySelectorAll('.mySlides');
            var slideIndex = 0;
            /* Now we can cycle slides, but this recursive function must have parameters */
            /* slides and cycle never change, those are unique for each slide container */
            /* slideIndex will increase during each iteration */
            showSlides(slides, slideIndex, cycle);
        };

        /* Function is alsmost same, but now it uses 3 new parameters */
        function showSlides(slides, slideIndex, cycle) {
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            };
            slideIndex++;
            if (slideIndex > slides.length) {
                slideIndex = 1
            };
            slides[slideIndex - 1].style.display = "block";
            /* Calling same function, but with new parameters and cycle time */
            setTimeout(function() {
                showSlides(slides, slideIndex, cycle)
            }, cycle);
        };
    </script>


    </body>

    </html>