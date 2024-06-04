<?php

require_once "app/core/Controller.php";
require_once "app/core/Database.php";

class Auth extends Controller
{
    public function login()
    {
        $database = new Database();

        if (isset($_POST['submit'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            if (empty($username) || empty($password)) {
                Flasher::setFlashMessage('username', 'Username wajib diisi');
                Flasher::setFlashMessage('password', 'Password wajib diisi');
                header('Location: /auth/login');
                die;
            }

            $query = "SELECT * FROM admin WHERE username = '$username'";

            $admin = $database->ambil_data($query);

            if ($admin !== null) {
                if ($admin['password'] == $password) {
                    $_SESSION['login'] = $admin['username'];
                    header('Location: /');
                    die;
                } else {
                    Flasher::setOld('username', $username);
                    Flasher::setFlashMessage('password', 'Password tidak sesuai');
                    header('Location: /auth/login');
                    die;
                }
            } else {
                Flasher::setFlashMessage('username', 'Username tidak terdaftar');
                header('Location: /auth/login');
                die;
            }
        }

        $data = [
            'title' => 'Login'
        ];

        $this->view('template/header', $data);
        $this->view('auth/login');
        $this->view('template/footer');
    }

    public function logout() {
        if (!isset($_SESSION['login'])) {
            header('Location: /auth/login');
            exit;
        }

        unset($_SESSION['login']);

        header('Location: /auth/login');
        die;
    }

    public function ubahPassword()
    {
        if (!isset($_SESSION['login'])) {
            header('Location: /auth/login');
            exit;
        }

        $database = new Database();

        if (isset($_POST['submit'])) {
            $passwordLama = $_POST['passwordLama'];
            $passwordBaru = $_POST['passwordBaru'];
            $konfirmasiPasswordBaru = $_POST['konfirmasiPasswordBaru'];

            if (empty($passwordLama) || empty($passwordBaru) || empty($konfirmasiPasswordBaru)) {
                Flasher::setFlashMessage('passwordLama', 'Password lama wajib diisi');
                Flasher::setFlashMessage('passwordBaru', 'Password baru wajib diisi');
                Flasher::setFlashMessage('konfirmasiPasswordBaru', 'Konfirmasi password lama wajib diisi');
                header('Location: /dashboard/ubah-password');
                die;
            }

            $query = "SELECT * FROM admin WHERE username = '" . $_SESSION['login'] . "'";

            $admin = $database->ambil_data($query);

            if ($admin['password'] != $passwordLama) {
                Flasher::setFlashMessage('passwordLama', 'Password lama tidak sesuai');
                header('Location: /dashboard/ubah-password');
                die;
            }

            if ($passwordBaru != $konfirmasiPasswordBaru) {
                Flasher::setFlashMessage('passwordBaru', 'Password baru tidak sesuai dengan konfirmasi password');
                Flasher::setFlashMessage('konfirmasiPasswordBaru', 'Konfirmasi password tidak sesuai dengan password baru');
                header('Location: /dashboard/ubah-password');
                die;
            }

            $query = "UPDATE admin SET password = '$passwordBaru' WHERE id = " . $admin['id'];

            if ($database->modifikasi($query)) {
                Flasher::setFlashAlert('ubahPassword', 'Password berhasil diubah', true);
            } else {
                Flasher::setFlashAlert('ubahPassword', 'Password gagal diubah', false);
            }

            unset($_SESSION['login']);

            header('Location: /auth/login');
            die;
        }

        $data = [
            'title' => 'Ubah password'
        ];

        $this->view('template/dashboard/header', $data);
        $this->view('dashboard/ubah-password');
        $this->view('template/dashboard/footer');
    }
}
