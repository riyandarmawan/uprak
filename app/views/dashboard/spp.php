<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">SPP</h1>

<a href="/dashboard/tambah-spp" class="btn btn-primary mb-4">Tambah SPP</a>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Tahun</th>
            <th scope="col">Nominal</th>
            <th scope="col">&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 1;
        foreach ($data['spp'] as $spp) :
        ?>
            <tr>
                <th scope="row"><?= $i ?></th>
                <td><?= $spp['tahun'] ?></td>
                <td><?= $spp['nominal'] ?></td>
                <td>
                    <a href="/dashboard/ubah-spp/<?= $spp['id'] ?>" class="btn btn-warning">Ubah</a>
                    <a href="/dashboard/hapus-spp/<?= $jurusan['id'] ?>" class="btn btn-danger">Hapus</a>
                </td>
            </tr>
        <?php
            $i++;
        endforeach;
        ?>
    </tbody>
</table>