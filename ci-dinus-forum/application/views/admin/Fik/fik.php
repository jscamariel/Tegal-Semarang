<div class="container-admin">
    <h3>Forum Kategori Fakultas Teknik Informatika</h3>
    <div class="card" id="card-admin">
        <div class="card-body" id="card-admin">
            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Username</th>
                        <th scope="col">Nama Thread</th>
                        <th scope="col">TimeStamp</th>
                        <th scope="col" id="th-style">Aksi</th>
                    </tr>
                </thead>
                <?php foreach ($admin as $ad) : ?>
                    <tbody>
                        <tr>
                            <th scope="row"><?= $ad['id_thread']; ?></th>
                            <td>
                                <img src="<?= base_url('assets/img/thread/fik/') . $ad['gambar']; ?>" class="img" height="100" width="100">
                            </td>
                            <td><?= $ad['username']; ?></td>
                            <td><?= $ad['nama_thread']; ?></td>
                            <td><?= $ad['timestamp']; ?></td>
                            <td>
                                <a href="<?= base_url(); ?>admin/admin/hapusFik/<?= $ad['id_thread']; ?>" class="icofont-trash btn btn-danger" onclick="return confirm('Yakin?');" title="Hapus">
                                </a>
                                <a href="<?= base_url(); ?>admin/admin/detailFik/<?= $ad['id_thread']; ?>" class="icofont-trash btn btn-warning icofont-info-circle" title="Detail"></a>
                            </td>
                        </tr>
                    </tbody>
                <?php endforeach; ?>
            </table>
            <?= $this->pagination->create_links(); ?>
        </div>
    </div>
</div>