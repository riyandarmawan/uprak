<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800 w-full">Laporan Pembayaran</h1>

<form action="" method="post" class="flex gap-8 items-center mb-8">
    <label for="nis" class="col-sm-2 col-form-label">NIS</label>
    <div class="w-[15rem]">
        <input type="num" id="nis" name="nis" required placeholder="Masukkan NIS" value="<?= empty($data['siswa']) ? '' : $data['siswa'][0]['nis'] ?>" class="form-control">
    </div>
    <div class="w-[12rem]">
        <input type="number" id="tahun" name="tahun" required min="2000" max="2099" placeholder="Masukkan Tahun" value="<?= empty($data['siswa']) ? '' : $data['siswa'][0]['tahun_tagihan'] ?>" class="form-control">
    </div>
    <button type="submit" name="submit" class="btn btn-primary w-[10rem]">Kirim</button>
</form>

<?= isset($_SESSION['flash']['pembayaran']) ? Flasher::getFlashAlert("pembayaran") : '' ?>

<div class="<?= empty($data['siswa']) ? 'hidden' : '' ?>">
    <div class="mt-8 ml-2.5">
        <table>
            <tbody>
                <tr>
                    <td class="w-48">NIS</td>
                    <td class="w-4">:</td>
                    <td><?= $data['siswa'][0]['nis'] ?></td>
                </tr>
                <tr>
                    <td class="w-48">Nama Lengkap</td>
                    <td class="w-4">:</td>
                    <td><?= $data['siswa'][0]['nama_lengkap'] ?></td>
                </tr>
            </tbody>
        </table>
    </div>

    <table class="table table-bordered table-striped mt-8">
        <thead>
            <th>Bulan</th>
            <th>Status</th>
        </thead>
        <tbody>
            <?php foreach ($data['bulan'] as $bulan) : ?>
                <tr>
                    <td><?= $bulan ?></td>
                    <td><?= in_array($bulan, $data['bulan_dibayar']) ? 'Lunas' : 'Belum Lunas'  ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>