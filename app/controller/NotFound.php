<?php

require_once 'app/core/Controller.php';

class NotFound extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Halaman Tidak Ditemukan'
        ];

        $this->view('/template/header.php', $data);
        $this->view('/page/not-found.php');
        $this->view('/template/footer.php');
    }
}
