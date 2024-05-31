<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Jurusan</h1>

<a href="/spp/tambah" class="btn btn-primary mb-4">Tambah Jurusan</a>

<?= isset($_SESSION['flash']['jurusan']) ? Flasher::getFlashAlert("jurusan") : '' ?>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Kode Jurusan</th>
            <th scope="col">Deskripsi</th>
            <th scope="col">&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 1;
        foreach ($data['jurusan'] as $jurusan) :
        ?>
            <tr>
                <th scope="row"><?= $i ?></th>
                <td><?= $jurusan['kode_jurusan'] ?></td>
                <td><?= $jurusan['deskripsi'] ?></td>
                <td>
                    <a href="/spp/ubah/<?= $jurusan['id'] ?>" class="btn btn-warning">Ubah</a>
                    <a href="/spp/hapus/<?= $jurusan['id'] ?>" class="btn btn-danger">Hapus</a>
                </td>
            </tr>
        <?php
            $i++;
        endforeach;
        ?>
    </tbody>
</table>