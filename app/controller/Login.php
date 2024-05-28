<?php

require_once "app/core/Controller.php";
require_once "app/core/Database.php";

class Login extends Controller
{
    public function index()
    {
        $this->view('auth/login.php');
    }

    public function auth()
    {
        $database = new Database();

        $username = $_POST['username'];
        $password = $_POST['password'];

        if (empty($username) || empty($password)) {
            Flasher::setFlashMessage('username', 'Username wajib diisi');
            Flasher::setFlashMessage('password', 'Password wajib diisi');
            header('Location: /login');
            die;
        }

        $query = "SELECT * FROM admin WHERE username = '$username'";

        $admin = $database->ambil_data($query);

        if ($admin !== null) {
            if ($admin['password'] == $password) {
                header('Location: /');
                die;
            } else {
                Flasher::setOld('username', $username);
                Flasher::setFlashMessage('password', 'Password tidak sesuai');
                header('Location: /login');
                die;
            }
        } else {
            Flasher::setFlashMessage('username', 'Username tidak terdaftar');
            header('Location: /login');
            die;
        }
    }
}
