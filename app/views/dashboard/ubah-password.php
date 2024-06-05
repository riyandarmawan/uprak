<div class="flex min-h-full flex-col justify-center px-6 py-10 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Ubah Password</h2>
    </div>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <form class="space-y-6" action="" method="POST">
            <div>
                <label for="passwordLama" class="block text-sm font-medium leading-6 text-gray-900">Password Lama</label>
                <div class="mt-2">
                    <input id="passwordLama" name="passwordLama" type="password" required autocomplete="passwordLama" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset placeholder:text-gray-400 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6 <?= isset($_SESSION['flash']['passwordLama']) ? 'invalid' : 'valid' ?>">
                    <p class="text-red-500 ml-2 mt-2 text-sm"><?= Flasher::getFlashMessage('passwordLama') ?></p>
                </div>
            </div>

            <div>
                <label for="passwordBaru" class="block text-sm font-medium leading-6 text-gray-900">Password Baru</label>
                <div class="mt-2">
                    <input id="passwordBaru" name="passwordBaru" type="password" required autocomplete="passwordBaru" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset placeholder:text-gray-400 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6 <?= isset($_SESSION['flash']['passwordBaru']) ? 'invalid' : 'valid' ?>">
                    <p class="text-red-500 ml-2 mt-2 text-sm"><?= Flasher::getFlashMessage('passwordBaru') ?></p>
                </div>
            </div>

            <div>
                <label for="konfirmasiPasswordBaru" class="block text-sm font-medium leading-6 text-gray-900">Konfirmasi Password Baru</label>
                <div class="mt-2">
                    <input id="konfirmasiPasswordBaru" name="konfirmasiPasswordBaru" type="password" required autocomplete="konfirmasiPasswordBaru" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset placeholder:text-gray-400 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6 <?= isset($_SESSION['flash']['konfirmasiPasswordBaru']) ? 'invalid' : 'valid' ?>">
                    <p class="text-red-500 ml-2 mt-2 text-sm"><?= Flasher::getFlashMessage('konfirmasiPasswordBaru') ?></p>
                </div>
            </div>

            <div>
                <button type="submit" name="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Ubah</button>
            </div>
        </form>
    </div>
</div>