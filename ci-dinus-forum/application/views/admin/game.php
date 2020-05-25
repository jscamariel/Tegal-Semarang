<div class="container-admin">
    <h3>Forum Kategori Hobi Game</h3>
    <div class="card" id="card-admin">
        <table class="table">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Username</th>
            <th scope="col">Nama Thread</th>
            <th scope="col">Isi Thread</th>
            <th scope="col">TimeStamp</th>
            <th scope="col" id="th-style">Aksi</th>
            </tr>
        </thead>
        <?php foreach($admin as $ad): ?>
            <tbody>
                <tr>
                <th scope="row"><?= $ad['id_thread'];?></th>
                <td><?= $ad['username'];?></td>
                <td><?= $ad['nama_thread'];?></td>
                <td><?= $ad['isi'];?></td>
                <td><?= $ad['timestamp'];?></td>
                <td><a href = "<?= base_url(); ?>admin/admin/hapusGame/<?= $ad['id_thread']; ?>" class = "badge badge-danger" onclick="return confirm('Yakin?');">Hapus</a></td>
                </tr>
            </tbody>
        <?php endforeach; ?>
        </table>
    </div>
</div>