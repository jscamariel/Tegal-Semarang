<div class="container-admin">
    <h3>Forum Kategori Event</h3>
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