<?php

require_once "app/core/Controller.php";

class Login extends Controller
{
    public function index() {
        $this->view('auth/login.php');
    }
}