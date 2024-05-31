<?php

require_once 'app/core/Controller.php';
require_once 'app/core/Database.php';

if (!isset($_SESSION['login'])) {
    header('Location: /auth/login');
    exit;
}

class Dashboard extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard'
        ];

        $this->view('template/dashboard/header', $data);
        $this->view('dashboard/index');
        $this->view('template/dashboard/footer');
    }
}
