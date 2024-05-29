<?php

require_once 'app/core/Controller.php';
require_once 'app/core/Database.php';

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

        $this->view('template/dashboard/header', $data);
        $this->view('dashboard/index');
        $this->view('template/dashboard/footer');
    }

    public function spp() {
        $database = new Database();

        $query = "SELECT * FROM spp";

        $spp = $database->ambil_data($query);

        $data = [
            'title' => 'SPP',
            'spp' => $spp
        ];

        $this->view('template/dashboard/header', $data);
        $this->view('dashboard/spp', $data);
        $this->view('template/dashboard/footer');
    }

    public function jurusan() {
        $database = new Database();

        $query = "SELECT * FROM jurusan";

        $jurusan = $database->ambil_data($query);

        $data = [
            'title' => 'Jurusan',
            'jurusan' => $jurusan
        ];

        $this->view('template/dashboard/header', $data);
        $this->view('dashboard/jurusan', $data);
        $this->view('template/dashboard/footer');
    }

    public function kelas() {
        $database = new Database();

        $query = "SELECT kelas.*, jurusan.deskripsi FROM kelas LEFT JOIN jurusan ON jurusan.id = kelas.jurusan_id";

        $kelas = $database->ambil_data($query);

        $data = [
            'title' => 'Kelas',
            'kelas' => $kelas
        ];

        $this->view('template/dashboard/header', $data);
        $this->view('dashboard/kelas', $data);
        $this->view('template/dashboard/footer');
    }

    public function ubahPassword()
    {
        $data = [
            'title' => 'Ubah password'
        ];

        $this->view('template/dashboard/header', $data);
        $this->view('dashboard/index');
        $this->view('template/dashboard/footer');
    }
}
