<div class="flex min-h-full flex-col justify-center px-6 lg:px-8 mb-10">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Ubah Siswa</h2>
    </div>

    <div class="mt-4 sm:mx-auto sm:w-full sm:max-w-sm">
        <form class="space-y-6" action="/siswa/ubah/<?= $data['siswa']['nis'] ?>" method="POST">
            <div>
                <label for="nis" class="block text-sm font-medium leading-6 text-gray-900">NIS</label>
                <div class="mt-2">
                    <input id="nis" name="nis" type="number" required placeholder="22001001" autocomplete="nis" value="<?= $data['siswa']['nis'] ?>" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset placeholder:text-gray-400 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6 <?= isset($_SESSION['flash']['nis']) ? 'invalid' : 'valid' ?>">
                    <p class="text-red-500 ml-2 mt-2 text-sm"><?= Flasher::getFlashMessage('nis') ?></p>
                </div>
            </div>

            <div>
                <label for="namaLengkap" class="block text-sm font-medium leading-6 text-gray-900">Nama Lengkap</label>
                <div class="mt-2">
                    <input id="namaLengkap" name="namaLengkap" type="text" required placeholder="Riyan Darmawan" autocomplete="namaLengkap" value="<?= $data['siswa']['nama_lengkap'] ?>" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset placeholder:text-gray-400 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6 <?= isset($_SESSION['flash']['namaLengkap']) ? 'invalid' : 'valid' ?>">
                    <p class="text-red-500 ml-2 mt-2 text-sm"><?= Flasher::getFlashMessage('namaLengkap') ?></p>
                </div>
            </div>

            <div>
                <label for="tanggalLahir" class="block text-sm font-medium leading-6 text-gray-900">Tanggal Lahir</label>
                <div class="mt-2">
                    <input id="tanggalLahir" name="tanggalLahir" type="date" required autocomplete="tanggalLahir" value="<?= $data['siswa']['tanggal_lahir'] ?>" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset placeholder:text-gray-400 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6 <?= isset($_SESSION['flash']['tanggalLahir']) ? 'invalid' : 'valid' ?>">
                    <p class="text-red-500 ml-2 mt-2 text-sm"><?= Flasher::getFlashMessage('tanggalLahir') ?></p>
                </div>
            </div>

            <div class="mt-2">
                <label for="jenisKelamin" class="block text-sm font-medium leading-6 text-gray-900">Jenis Kelamin</label>
                <select id="jenisKelamin" name="jenisKelamin" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset placeholder:text-gray-400 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6 valid">
                    <option value="l">Laki-laki</option>
                    <option value="p">Perempuan</option>
                </select>
            </div>

            <div>
                <label for="alamat" class="block text-sm font-medium leading-6 text-gray-900">Alamat</label>
                <div class="mt-2">
                    <textarea id="alamat" name="alamat" type="text" required placeholder="Alamat" autocomplete="alamat" class="resize-none block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset placeholder:text-gray-400 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6 <?= isset($_SESSION['flash']['alamat']) ? 'invalid' : 'valid' ?>"><?= $data['siswa']['alamat'] ?></textarea>
                    <p class="text-red-500 ml-2 mt-2 text-sm"><?= Flasher::getFlashMessage('alamat') ?></p>
                </div>
            </div>


            <div>
                <label for="noHp" class="block text-sm font-medium leading-6 text-gray-900">No HP</label>
                <div class="mt-2">
                    <input id="noHp" name="noHp" type="number" required placeholder="0898291829" autocomplete="noHp" value="<?= $data['siswa']['no_hp'] ?>" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset placeholder:text-gray-400 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6 <?= isset($_SESSION['flash']['noHp']) ? 'invalid' : 'valid' ?>">
                    <p class="text-red-500 ml-2 mt-2 text-sm"><?= Flasher::getFlashMessage('noHp') ?></p>
                </div>
            </div>

            <div class="mt-2">
                <label for="spp" class="block text-sm font-medium leading-6 text-gray-900">SPP</label>
                <select id="spp" name="spp" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset placeholder:text-gray-400 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6 valid">
                    <?php foreach ($data['spp'] as $spp) : ?>
                        <option value="<?= $spp['id'] ?>"><?= $spp['tahun'] . '-' . $spp['nominal'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mt-2">
                <label for="kelas" class="block text-sm font-medium leading-6 text-gray-900">Kelas</label>
                <select id="kelas" name="kelas" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset placeholder:text-gray-400 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6 valid">
                    <?php foreach ($data['kelas'] as $kelas) : ?>
                        <option value="<?= $kelas['id'] ?>"><?= $kelas['kode_kelas'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div>
                <button type="submit" name="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Tambah</button>
            </div>
        </form>
    </div>
</div>