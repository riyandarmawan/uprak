<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Kelas</h1>

<a href="/dashboard/tambah-kelas" class="btn btn-primary mb-4">Tambah Kelas</a>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Kode Kelas</th>
            <th scope="col">Tingkat</th>
            <th scope="col">Jurusan</th>
            <th scope="col">&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 1;
        foreach ($data['kelas'] as $kelas) :
        ?>
            <tr>
                <th scope="row"><?= $i ?></th>
                <td><?= $kelas['kode_kelas'] ?></td>
                <td><?= $kelas['tingkat'] ?></td>
                <td><?= $kelas['deskripsi'] ?></td>
                <td>
                    <a href="#" class="btn btn-warning">Ubah</a>
                    <a href="#" class="btn btn-danger">Hapus</a>
                </td>
            </tr>
        <?php
            $i++;
        endforeach;
        ?>
    </tbody>
</table>