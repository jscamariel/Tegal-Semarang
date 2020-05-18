
<!-- Sidebar -->
    <div class="rightsidebar" id="sidebar-wrapper">
    <?php foreach($berita as $br) :  ?>
        <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h3 class="card-title">Berita</h3>
                    <img src="..." class="card-img-top" alt="...">
                    <h5 class="card-title"><?= $br['judul']; ?></h5>
                    <h6 class="card-title"><?= $br['timestamp']; ?></h6>
                    <p class="card-text"><?= $br['isi']; ?></p>
                    <a href="#" class="btn btn-primary">Baca Lebih Lanjut</a>
                </div>
        </div>  
    <?php endforeach; ?>

        <div class="card" style="width: 18rem;">
            <?php foreach($event as $ev) : ?>
                <div class="card-body">
                    <h5 class="card-title">Event Yang Akan Datang</h5>
                        <img src="..." class="card-img-top" alt="...">
                    <h5 class="card-title"><?= $ev['judul']; ?></h5>           
                    <h6 class="card-title"><?= $ev['timestamp']; ?></h6>
                    <p class="card-text"><?= $ev['isi']; ?></p>
                    <a href="#" class="btn btn-primary">Baca Lebih Lanjut</a>
                </div>
            <?php endforeach;?>
        </div>
    </div>
</div>

</body>
</html>