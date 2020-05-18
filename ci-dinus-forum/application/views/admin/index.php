<div class="container">

    <div class="row mt-3">
        <div class="col-md-6">
            <h3>Daftar Thread Forum Elektro</h3>
            <ul class="list-group">
                <?php foreach($admin as $adm) :?>
                    <li class="list-group-item"><?= $adm['nama_thread']; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

</div>