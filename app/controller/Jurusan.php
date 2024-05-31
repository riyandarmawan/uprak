<?php

require_once 'app/core/Controller.php';
require_once 'app/core/Database.php';

if (!isset($_SESSION['login'])) {
    header('Location: /auth/login');
    exit;
}

class Jurusan extends Controller
{
    public function index()
    {
        $database = new Database();

        $query = "SELECT * FROM jurusan";

        $jurusan = $database->ambil_data($query);

        $data = [
            'title' => 'Jurusan',
            'jurusan' => $jurusan
        ];

        $this->view('template/dashboard/header', $data);
        $this->view('dashboard/jurusan/index', $data);
        $this->view('template/dashboard/footer');
    }

    public function tambah()
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

            if ($database->modifikasi($query)) {
                Flasher::setFlashAlert('jurusan', 'Jurusan berhasil ditambah', true);
            } else {
                Flasher::setFlashAlert('jurusan', 'Jurusan gagal ditambah', false);
            }

            header('Location: /dashboard/jurusan');
            die;
        }

        $data = [
            'title' => 'Tambah Jurusan',
        ];

        $this->view('template/dashboard/header', $data);
        $this->view('dashboard/jurusan/tambah');
        $this->view('template/dashboard/footer');
    }

    public function ubah($id)
    {
        $database = new Database();

        if (isset($_POST['submit'])) {
            $kodeJurusan = $_POST['kodeJurusan'];
            $deskripsi = $_POST['deskripsi'];

            if (empty($kodeJurusan) || empty($deskripsi)) {
                Flasher::setFlashMessage('kodeJurusan', 'Kode jurusan wajib diisi');
                Flasher::setFlashMessage('deskripsi', 'deskripsi wajib diisi');
                header('Location: /dashboard/ubah-jurusan');
                die;
            }

            $query = "UPDATE jurusan SET kode_jurusan = '$kodeJurusan', deskripsi = '$deskripsi' WHERE id = $id";

            if ($database->modifikasi($query)) {
                Flasher::setFlashAlert('jurusan', 'Jurusan berhasil diubah', true);
            } else {
                Flasher::setFlashAlert('jurusan', 'Jurusan gagal diubah', false);
            }

            header('Location: /dashboard/jurusan');
            die;
        }

        $query = "SELECT * FROM jurusan WHERE id = $id";

        $jurusan = $database->ambil_data($query);

        $data = [
            'title' => 'Ubah Jurusan',
            'jurusan' => $jurusan
        ];

        $this->view('template/dashboard/header', $data);
        $this->view('dashboard/jurusan/ubah', $data);
        $this->view('template/dashboard/footer');
    }

    public function hapus($id)
    {
        $database = new Database();

        $query = "DELETE FROM jurusan WHERE id = $id";

        if ($database->modifikasi($query)) {
            Flasher::setFlashAlert('jurusan', 'Jurusan berhasil dihapus', true);
        } else {
            Flasher::setFlashAlert('jurusan', 'Jurusan gagal dihapus', false);
        }

        header('Location: /dashboard/jurusan');
        die;
    }
}