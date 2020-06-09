<div class="container-admin">
    <h3>Kelola Akun Forum</h3>
    <div class="card" id="card-admin">
        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Profile Picture</th>
                    <th scope="col">Username</th>
                    <th scope="col">NIM</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <?php foreach ($admin as $ad) : ?>
                <tbody>
                    <tr>
                        <th scope="row"><?= $ad['id']; ?></th>
                        <td>
                            <img src="<?= base_url('assets/img/profile/') . $ad['gambar']; ?>" class="img" height="100" width="100">
                        </td>
                        <td><?= $ad['username']; ?></td>
                        <td><?= $ad['nim']; ?></td>
                        <td><?= $ad['email']; ?></td>
                        <!-- <td><a href = "<?= base_url(); ?>admin/admin/hapusElektro/<?= $ad['id']; ?>" class = "badge badge-danger" onclick="return confirm('Yakin?');">Hapus</a></td> -->
                    </tr>
                </tbody>
            <?php endforeach; ?>
        </table>
    </div>
</div>