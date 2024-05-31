<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Tambah Jurusan</h2>
    </div>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <form class="space-y-6" action="/jurusan/tambah" method="POST">
            <div>
                <label for="kodeJurusan" class="block text-sm font-medium leading-6 text-gray-900">Kode Jurusan</label>
                <div class="mt-2">
                    <input id="kodeJurusan" name="kodeJurusan" type="text" required autocomplete="kodeJurusan" placeholder="Ex. RPL" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset placeholder:text-gray-400 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6 <?= isset($_SESSION['flash']['kodeJurusan']) ? 'invalid' : 'valid' ?>">
                    <p class="text-red-500 ml-2 mt-2 text-sm"><?= Flasher::getFlashMessage('kodeJurusan') ?></p>
                </div>
            </div>

            <div>
                <div class="flex items-center justify-between">
                    <label for="deskripsi" class="block text-sm font-medium leading-6 text-gray-900">Deskripsi</label>
                </div>
                <div class="mt-2">
                    <input id="deskripsi" name="deskripsi" type="text" required autocomplete="deskripsi" placeholder="Ex. Rekayasa Perangkat Lunak" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset placeholder:text-gray-400 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6 <?= isset($_SESSION['flash']['deskripsi']) ? 'invalid' : 'valid' ?>">
                    <p class="text-red-500 ml-2 mt-2 text-sm"><?= Flasher::getFlashMessage('deskripsi') ?></p>
                </div>
            </div>

            <div>
                <button type="submit" name="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Tambah</button>
            </div>
        </form>
    </div>
</div>