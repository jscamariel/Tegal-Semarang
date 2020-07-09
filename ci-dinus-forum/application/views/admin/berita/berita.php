<div class="container-admin">
    <h3>Forum Kategori Berita</h3>
    <div class="card" id="card-admin">

        <div class="card-header">
            <a href="<?= base_url(); ?>admin/admin/tambahBerita" class="btn btn-primary icofont-plus-circle" id="buat">Tambah Berita Baru</a>
        </div>

        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Judul Berita</th>
                    <th scope="col">Isi Berita</th>
                    <th scope="col">Tanggal Terbit</th>
                    <th scope="col" id="th-style">Aksi</th>
                </tr>
            </thead>
            <?php foreach ($admin as $ad) : ?>
                <tbody>
                    <tr>
                        <th scope="row"><?= $ad['id']; ?></th>
                        <td>
                            <img src="<?= base_url('assets/img/berita/') . $ad['gambar']; ?>" class="img" height="100" width="100">
                        </td>

                        <td><?= $ad['judul']; ?></td>
                        <td><?= $ad['isi']; ?></td>
                        <td><?= $ad['timestamp']; ?></td>
                        <td><a href="<?= base_url(); ?>admin/admin/hapusBerita/<?= $ad['id']; ?>" class="icofont-trash btn btn-danger" onclick="return confirm('Yakin?');" title="Hapus"></a></td>
                    </tr>
                </tbody>
            <?php endforeach; ?>

        </table>
        <?= $this->pagination->create_links(); ?>
    </div>
</div>