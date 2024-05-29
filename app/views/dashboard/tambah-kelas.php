<div class="flex min-h-full flex-col justify-center px-6 py-10 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Tambah Kelas</h2>
    </div>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <form class="space-y-6" action="/dashboard/tambah-kelas" method="POST">
            <div>
                <label for="kodeKelas" class="block text-sm font-medium leading-6 text-gray-900">Kode Kelas</label>
                <div class="mt-2">
                    <input id="kodeKelas" name="kodeKelas" type="text" required autocomplete="kodeKelas" placeholder="Ex. X-RPL" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset placeholder:text-gray-400 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6 <?= isset($_SESSION['flash']['kodeKelas']) ? 'invalid' : 'valid' ?>">
                    <p class="text-red-500 ml-2 mt-2 text-sm"><?= Flasher::getFlashMessage('kodeKelas') ?></p>
                </div>
            </div>

            <div>
                <div class="flex items-center justify-between">
                    <label for="tingkat" class="block text-sm font-medium leading-6 text-gray-900">Tingkat</label>
                </div>
                <div class="mt-2">
                    <input id="tingkat" name="tingkat" type="number" required autocomplete="tingkat" placeholder="Ex. 10" min="10" max="12" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset placeholder:text-gray-400 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6 <?= isset($_SESSION['flash']['tingkat']) ? 'invalid' : 'valid' ?>">
                    <p class="text-red-500 ml-2 mt-2 text-sm"><?= Flasher::getFlashMessage('deskripsi') ?></p>
                </div>
            </div>

            <div>
                <div class="flex items-center justify-between">
                    <label for="jurusanId" class="block text-sm font-medium leading-6 text-gray-900">Jurusan</label>
                </div>
                <div class="mt-2">
                    <select id="jurusanId" name="jurusanId" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset placeholder:text-gray-400 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6 valid">
                        <?php foreach ($data['jurusan'] as $jurusan) : ?>
                            <option value="<?= $jurusan['id'] ?>"><?= $jurusan['deskripsi'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div>
                <button type="submit" name="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Tambah</button>
            </div>
        </form>
    </div>
</div>