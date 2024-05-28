<?php

require_once "app/core/Controller.php";
require_once "app/core/Database.php";

class Login extends Controller
{
    public function index() {
        $this->view('auth/login.php');
    }

    public function auth() {
        $database = new Database();

        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = "SELECT * FROM admin WHERE username = '$username'";

        $admin = $database->ambil_data($query);

        if($admin !== null) {
            if($admin['password'] == $password) {

            }
            Flasher::setFlashMessage('Password tidak sesuai');
            header('Location: /login');
            die;
        } else {
            Flasher::setFlashMessage('Username tidak terdaftar');
            header('Location: /login');
            die;
        }
    }
}