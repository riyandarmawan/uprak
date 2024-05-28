<?php

require_once "../core/Controller.php";

class LoginController extends Controller
{
    public function index() {
        $this->view('auth/login.php');
    }
}

$loginController = new LoginController();

$loginController->index();
