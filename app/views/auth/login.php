<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
    <?= isset($_SESSION['flash']['ubahPassword']) ? Flasher::getFlashAlert("ubahPassword") : '' ?>

    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Masuk ke Akummu</h2>
    </div>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <form class="space-y-6" action="/login/auth" method="POST">
            <div>
                <label for="username" class="block text-sm font-medium leading-6 text-gray-900">Username</label>
                <div class="mt-2">
                    <input id="username" name="username" type="text" autocomplete="username" required value="<?= Flasher::getOld('username') ?>" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset placeholder:text-gray-400 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6 <?= isset($_SESSION['flash']['username']) ? 'invalid' : 'valid' ?>">
                    <p class="text-red-500 ml-2 mt-2 text-sm"><?= Flasher::getFlashMessage('username') ?></p>
                </div>
            </div>

            <div>
                <div class="flex items-center justify-between">
                    <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                </div>
                <div class="mt-2">
                    <input id="password" name="password" type="password" autocomplete="current-password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset placeholder:text-gray-400 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6 <?= isset($_SESSION['flash']['password']) ? 'invalid' : 'valid' ?>">
                    <p class="text-red-500 ml-2 mt-2 text-sm"><?= Flasher::getFlashMessage('password') ?></p>
                </div>
            </div>

            <div>
                <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Masuk</button>
            </div>
        </form>

        <p class="mt-10 text-center text-sm text-gray-500">
            Tidak mempunyai akun?
            <a href="#" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Daftar sekarang</a>
        </p>
    </div>
</div>