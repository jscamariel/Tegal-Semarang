<div class="container-admin">
    <h3>Forum Kategori Hobi Otomotif</h3>
    <div class="card" id="card-admin">
        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Username</th>
                    <th scope="col">Nama Thread</th>
                    <th scope="col">Isi Thread</th>
                    <th scope="col">TimeStamp</th>
                    <th scope="col" id="th-style">Aksi</th>
                </tr>
            </thead>
            <?php foreach ($admin as $ad) : ?>
                <tbody>
                    <tr>
                        <th scope="row"><?= $ad['id_thread']; ?></th>
                        <td>
                            <img src="<?= base_url('assets/img/thread/otomotif/') . $ad['gambar']; ?>" class="img" height="100" width="100">
                        </td>
                        <td><?= $ad['username']; ?></td>
                        <td><?= $ad['nama_thread']; ?></td>
                        <td><?= $ad['isi']; ?></td>
                        <td><?= $ad['timestamp']; ?></td>
                        <td><a href="<?= base_url(); ?>admin/admin/hapusOtomotif/<?= $ad['id_thread']; ?>" class="badge badge-danger" onclick="return confirm('Yakin?');">Hapus</a></td>
                    </tr>
                </tbody>
            <?php endforeach; ?>
        </table>
    </div>
</div>