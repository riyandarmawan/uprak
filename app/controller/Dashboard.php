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

    public function tambahSpp() {
        $database = new Database();
        
        if(isset($_POST['submit'])) {
            $tahun = $_POST['tahun'];
            $nominal = $_POST['nominal'];

            if(empty($tahun) || empty($nominal)) {
                Flasher::setFlashMessage('tahun', 'Tahun wajib diisi');
                Flasher::setFlashMessage('nominal', 'Nominal wajib diisi');
                header('Location: /dashboard/tambah-spp');
                die;
            }

            $query = "INSERT INTO spp(tahun, nominal) VALUES($tahun, $nominal)";

            $database->modifikasi($query);

            header('Location: /dashboard/spp');
            die;
        }

        $data = [
            'title' => 'Tambah SPP',
        ];

        $this->view('template/dashboard/header', $data);
        $this->view('dashboard/tambah-spp');
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

    public function tambahJurusan()
    {
        $database = new Database();

        if (isset($_POST['submit'])) {
            $kodeJurusan = $_POST['kodeJurusan'];
            $deskripsi = $_POST['deskripsi'];

            if (empty($kodeJurusan) || empty($deskripsi)) {
                Flasher::setFlashMessage('kodeJurusan', 'Kode jurusan wajib diisi');
                Flasher::setFlashMessage('deskripsi', 'Deskripsi wajib diisi');
                header('Location: /dashboard/tambah-jurusan');
                die;
            }

            $query = "INSERT INTO jurusan(kode_jurusan, deskripsi) VALUES('$kodeJurusan', '$deskripsi')";

            $database->modifikasi($query);

            header('Location: /dashboard/jurusan');
            die;
        }

        $data = [
            'title' => 'Tambah Jurusan',
        ];

        $this->view('template/dashboard/header', $data);
        $this->view('dashboard/tambah-jurusan');
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

    public function tambahKelas()
    {
        $database = new Database();

        if (isset($_POST['submit'])) {
            $kodeKelas = $_POST['kodeKelas'];
            $tingkat = $_POST['tingkat'];
            $jurursanId = $_POST['jurusanId'];

            if (empty($kodeKelas) || empty($tingkat)) {
                Flasher::setFlashMessage('kodeKelas', 'Kode kelas wajib diisi');
                Flasher::setFlashMessage('tingkat', 'Tingkat wajib diisi');
                header('Location: /dashboard/tambah-kelas');
                die;
            }

            $query = "INSERT INTO kelas(kode_kelas, tingkat,jurusan_id) VALUES('$kodeKelas', '$tingkat', '$jurursanId')";

            $database->modifikasi($query);

            header('Location: /dashboard/kelas');
            die;
        }

        $query = "SELECT * FROM jurusan";
        
        $jurusan = $database->ambil_data($query);

        $data = [
            'title' => 'Tambah Kelas',
            'jurusan' => $jurusan
        ];

        $this->view('template/dashboard/header', $data);
        $this->view('dashboard/tambah-kelas', $data);
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
