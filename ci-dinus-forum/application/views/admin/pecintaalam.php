<div class="container-admin">
    <h3>Forum Kategori Hobi Pecinta Alam</h3>
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
                            <img src="<?= base_url('assets/img/thread/pecintaalam/') . $ad['gambar']; ?>" class="img" height="100" width="100">
                        </td>
                        <td><?= $ad['username']; ?></td>
                        <td><a href="<?= base_url(); ?>pecintaalam/detail/<?= $ad['id_thread']; ?>"><?= $ad['nama_thread']; ?></a></td>
                        <td><?= $ad['isi']; ?></td>
                        <td><?= $ad['timestamp']; ?></td>
                        <td><a href="<?= base_url(); ?>admin/admin/hapusPecintaalam/<?= $ad['id_thread']; ?>" class="badge badge-danger" onclick="return confirm('Yakin?');">Hapus</a></td>
                    </tr>
                </tbody>
            <?php endforeach; ?>
        </table>
    </div>
</div>