<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Siswa</h1>

<a href="/siswa/tambah" class="btn btn-primary mb-4">Tambah Siswa</a>

<?= isset($_SESSION['flash']['siswa']) ? Flasher::getFlashAlert("siswa") : '' ?>

<table class="table">
    <thead>
        <tr>
            <th scope="col">NIS</th>
            <th scope="col">Nama Lengkap</th>
            <th scope="col">Alamat</th>
            <th scope="col">Kelas</th>
            <th scope="col">SPP</th>
            <th scope="col">&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data['siswa'] as $siswa) : ?>
            <tr>
                <th scope="row"><?= $siswa['nis'] ?></th>
                <td><?= $siswa['nama_lengkap'] ?></td>
                <td><?= $siswa['alamat'] ?></td>
                <td><?= $siswa['kode_kelas'] ?></td>
                <td><?= $siswa['nominal'] ?></td>
                <td>
                    <a href="/siswa/ubah/<?= $siswa['nis'] ?>" class="btn btn-warning">Ubah</a>
                    <a href="/siswa/hapus/<?= $siswa['nis'] ?>" class="btn btn-danger">Hapus</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>