<div class="container-content">
    <row class="mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    <h5> <?= $event['judul'] ?></h5>
                </div>
                <div class="card-body">
                    <h6 class="card-subtitle mb-2 text-muted"><?= $event['timestamp'] ?></h6>
                    <img src="<?= base_url('assets/img/event/') . $event['gambar']; ?>" class="card-img-top">
                    <p class="card-text"><?= $event['isi'] ?></p>
                    <span>Event diadakan pada :</span>
                    <p class="card-text">Tanggal : <?= $event['date'] ?></p>
                    <p class="card-text">Waktu :<?= $event['time'] ?></p>
                </div>
            </div>

        </div>
        <a href="<?= base_url(); ?>event" class="btn btn-primary mt-3 mb-3 ml-3">Kembali</a>
    </row>
</div>