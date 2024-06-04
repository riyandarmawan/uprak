<?php

require_once 'app/core/Controller.php';
require_once 'app/core/Database.php';

if (!isset($_SESSION['login'])) {
    header('Location: /auth/login');
    exit;
}

class Kelas extends Controller
{
    public function index()
    {
        $database = new Database();

        $query = "SELECT kelas.*, jurusan.deskripsi FROM kelas LEFT JOIN jurusan ON jurusan.id = kelas.jurusan_id";

        $kelas = $database->ambil_data($query);

        $data = [
            'title' => 'Kelas',
            'kelas' => $kelas
        ];

        $this->view('template/dashboard/header', $data);
        $this->view('dashboard/kelas/index', $data);
        $this->view('template/dashboard/footer');
    }

    public function tambah()
    {
        $database = new Database();

        if (isset($_POST['submit'])) {
            $kodeKelas = $_POST['kodeKelas'];
            $tingkat = $_POST['tingkat'];
            $jurusanId = $_POST['jurusanId'];

            if (empty($kodeKelas) || empty($tingkat)) {
                Flasher::setFlashMessage('kodeKelas', 'Kode kelas wajib diisi');
                header('Location: /kelas/tambah');
                die;
            }

            $query = "INSERT INTO kelas(kode_kelas, tingkat,jurusan_id) VALUES('$kodeKelas', '$tingkat', '$jurusanId')";

            if ($database->modifikasi($query)) {
                Flasher::setFlashAlert('kelas', 'Kelas berhasil ditambah', true);
            } else {
                Flasher::setFlashAlert('kelas', 'Kelas gagal ditambah', false);
            }

            header('Location: /kelas');
            die;
        }

        $query = "SELECT * FROM jurusan";

        $jurusan = $database->ambil_data($query);

        $data = [
            'title' => 'Ubah Kelas',
            'jurusan' => $jurusan
        ];

        $this->view('template/dashboard/header', $data);
        $this->view('dashboard/kelas/tambah', $data);
        $this->view('template/dashboard/footer');
    }

    public function ubah($id)
    {
        $database = new Database();

        if (isset($_POST['submit'])) {
            $kodeKelas = $_POST['kodeKelas'];
            $tingkat = $_POST['tingkat'];
            $jurusanId = $_POST['jurusanId'];

            if (empty($kodeKelas) || empty($tingkat)) {
                Flasher::setFlashMessage('kodeKelas', 'Kode kelas wajib diisi');
                header("Location: /kelas/ubah/$id");
                die;
            }

            $query = "UPDATE kelas SET kode_kelas = '$kodeKelas', tingkat = '$tingkat', jurusan_id = '$jurusanId' WHERE id = $id";

            if ($database->modifikasi($query)) {
                Flasher::setFlashAlert('kelas', 'Kelas berhasil diubah', true);
            } else {
                Flasher::setFlashAlert('kelas', 'Kelas gagal diubah', false);
            }

            header('Location: /kelas');
            die;
        }

        $query = "SELECT * FROM jurusan";

        $jurusan = $database->ambil_data($query);

        $query = "SELECT * FROM kelas WHERE id = '$id'";

        $kelas = $database->ambil_data($query);

        $data = [
            'title' => 'Ubah Kelas',
            'jurusan' => $jurusan,
            'kelas' => $kelas
        ];

        $this->view('template/dashboard/header', $data);
        $this->view('dashboard/kelas/ubah', $data);
        $this->view('template/dashboard/footer');
    }

    public function hapus($id)
    {
        $database = new Database();

        $query = "DELETE FROM kelas WHERE id = $id";

        if ($database->modifikasi($query)) {
            Flasher::setFlashAlert('kelas', 'Kelas berhasil dihapus', true);
        } else {
            Flasher::setFlashAlert('kelas', 'Kelas gagal dihapus', false);
        }

        header('Location: /dashboard/kelas');
        die;
    }
}
