<div class="container-admin">
    <h3>Kelola Akun Forum</h3>
    <div class="card" id="card-admin">
        <table class="table">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Avatar</th>
            <th scope="col">Username</th>
            <th scope="col">E-mail</th>
            </tr>
        </thead>
        <?php foreach($admin as $ad): ?>
            <tbody>
                <tr>
                <th scope="row"><?= $ad['id'];?></th>
                <td>-</td>
                <td><?= $ad['username'];?></td>
                <td><?= $ad['email'];?></td>
                <!-- <td><a href = "<?= base_url(); ?>admin/admin/hapusElektro/<?= $ad['id']; ?>" class = "badge badge-danger" onclick="return confirm('Yakin?');">Hapus</a></td> -->
                </tr>
            </tbody>
        <?php endforeach; ?>
        </table>
    </div>
</div>