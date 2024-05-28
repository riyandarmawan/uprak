<?php

require_once 'app/core/Controller.php';

if (!isset($_SESSION['login'])) {
    header('Location: /login');
    exit;
}

class Dashboard extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard'
        ];

        $this->view('template/header', $data);
        $this->view('dashboard/index');
        $this->view('template/footer');
    }
}
