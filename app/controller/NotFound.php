<?php

require_once 'app/core/Controller.php';

class NotFound extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Halaman Tidak Ditemukan'
        ];

        $this->view('/template/header', $data);
        $this->view('/page/not-found');
        $this->view('/template/footer');
    }
}
