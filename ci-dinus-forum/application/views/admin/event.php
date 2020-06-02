<div class="container-admin">
    <h3>Forum Kategori Event</h3>

    <div class="row-mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Form Buat Event Baru
                </div>
                <div class="card-body">
                
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="judul">Nama Event</label>
                            <input type = "text" name="judul" class="form-control" id="judul" placeholder="Isikan nama judul Event anda..">
                            <small class="form-text text-danger"><?= form_error('judul'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="isi">Isi</label>
                            <input type = "text" name="isi" class="form-control" id="isi" placeholder="Ceritakan Event anda..">
                            <small class="form-text text-danger"><?= form_error('isi'); ?></small>
                        </div>

                        <button type="submit" name="tambah" class="btn btn-primary float-right">Buat Event</button>
                    </form>
                </div>
            </div>
        </div>

    <div class="card" id="card-admin">
        <table class="table">
        <thead>
            <tr>
            <th scope="col">ID</th>          
            <th scope="col">Gambar</th>
            <th scope="col">Judul Event</th>
            <th scope="col">Isi Event</th>
            <th scope="col">Tanggal Event</th>
            <th scope="col">TimeStamp</th>
            <th scope="col" id="th-style">Aksi</th>
            </tr>
        </thead>
        <?php foreach($admin as $ad): ?>
            <tbody>
                <tr>
                <th scope="row"><?= $ad['id'];?></th>
                <td>-</td>
                <td><?= $ad['judul'];?></td>
                <td><?= $ad['isi'];?></td>
                <td><?= $ad['date'];?></td>
                <td><?= $ad['timestamp'];?></td>
                <!-- <td><a href = "<?= base_url(); ?>admin/admin/hapusElektro/<?= $ad['id_thread']; ?>" class = "badge badge-danger" onclick="return confirm('Yakin?');">Hapus</a></td> -->
                </tr>
            </tbody>
        <?php endforeach; ?>
        </table>
    </div>
</div>