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

    public function spp()
    {
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

    public function tambahSpp()
    {
        $database = new Database();

        if (isset($_POST['submit'])) {
            $tahun = $_POST['tahun'];
            $nominal = $_POST['nominal'];

            if (empty($tahun) || empty($nominal)) {
                Flasher::setFlashMessage('tahun', 'Tahun wajib diisi');
                Flasher::setFlashMessage('nominal', 'Nominal wajib diisi');
                header('Location: /dashboard/tambah-spp');
                die;
            }

            $query = "INSERT INTO spp(tahun, nominal) VALUES($tahun, $nominal)";

            if($database->modifikasi($query)) {
                Flasher::setFlashAlert('spp', 'SPP berhasil ditambah', true);
            } else {
                Flasher::setFlashAlert('spp', 'SPP gagal ditambah', false);
            }
            
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

    public function ubahSpp($id)
    {
        $database = new Database();

        if (isset($_POST['submit'])) {
            $tahun = $_POST['tahun'];
            $nominal = $_POST['nominal'];

            if (empty($tahun) || empty($nominal)) {
                Flasher::setFlashMessage('tahun', 'Tahun wajib diisi');
                Flasher::setFlashMessage('nominal', 'Nominal wajib diisi');
                header('Location: /dashboard/ubah-spp');
                die;
            }

            $query = "UPDATE spp SET tahun = '$tahun', nominal = '$nominal' WHERE id = $id";

            if ($database->modifikasi($query)) {
                Flasher::setFlashAlert('spp', 'SPP berhasil diubah', true);
            } else {
                Flasher::setFlashAlert('spp', 'SPP gagal diubah', false);
            }

            header('Location: /dashboard/spp');
            die;
        }

        $query = "SELECT * FROM spp WHERE id = $id";

        $spp = $database->ambil_data($query);

        $data = [
            'title' => 'Ubah SPP',
            'spp' => $spp
        ];

        $this->view('template/dashboard/header', $data);
        $this->view('dashboard/ubah-spp', $data);
        $this->view('template/dashboard/footer');
    }

    public function hapusSpp($id)
    {
        $database = new Database();

        $query = "DELETE FROM spp WHERE id = $id";

        if ($database->modifikasi($query)) {
            Flasher::setFlashAlert('spp', 'SPP berhasil dihapus', true);
        } else {
            Flasher::setFlashAlert('spp', 'SPP gagal dihapus', false);
        }

        header('Location: /dashboard/spp');
        die;
    }

    public function jurusan()
    {
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
        $this->view('dashboard/tambah-jurusan');
        $this->view('template/dashboard/footer');
    }

    public function ubahJurusan($id)
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
            'title' => 'Ubah SPP',
            'jurusan' => $jurusan
        ];

        $this->view('template/dashboard/header', $data);
        $this->view('dashboard/ubah-jurusan', $data);
        $this->view('template/dashboard/footer');
    }

    public function hapusJurusan($id)
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

    public function kelas()
    {
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
            $jurusanId = $_POST['jurusanId'];

            if (empty($kodeKelas) || empty($tingkat)) {
                Flasher::setFlashMessage('kodeKelas', 'Kode kelas wajib diisi');
                Flasher::setFlashMessage('tingkat', 'Tingkat wajib diisi');
                header('Location: /dashboard/tambah-kelas');
                die;
            }

            $query = "INSERT INTO kelas(kode_kelas, tingkat,jurusan_id) VALUES('$kodeKelas', '$tingkat', '$jurusanId')";

            if ($database->modifikasi($query)) {
                Flasher::setFlashAlert('kelas', 'Kelas berhasil ditambah', true);
            } else {
                Flasher::setFlashAlert('kelas', 'Kelas gagal ditambah', false);
            }

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

    public function ubahKelas($id)
    {
        $database = new Database();

        if (isset($_POST['submit'])) {
            $kodeKelas = $_POST['kodeKelas'];
            $tingkat = $_POST['tingkat'];
            $jurusanId = $_POST['jurusanId'];

            if (empty($kodeKelas) || empty($tingkat)) {
                Flasher::setFlashMessage('kodeKelas', 'Kode kelas wajib diisi');
                Flasher::setFlashMessage('tingkat', 'Tingkat wajib diisi');
                header('Location: /dashboard/ubah-kelas');
                die;
            }

            $query = "UPDATE kelas SET kode_kelas = '$kodeKelas', tingkat = '$tingkat', jurusan_id = '$jurusanId' WHERE id = $id";

            if ($database->modifikasi($query)) {
                Flasher::setFlashAlert('kelas', 'Kelas berhasil diubah', true);
            } else {
                Flasher::setFlashAlert('kelas', 'Kelas gagal diubah', false);
            }

            header('Location: /dashboard/kelas');
            die;
        }

        $query = "SELECT * FROM jurusan";

        $jurusan = $database->ambil_data($query);

        $query = "SELECT * FROM kelas WHERE id = '$id'";

        $kelas = $database->ambil_data($query);

        $data = [
            'title' => 'Tambah Kelas',
            'jurusan' => $jurusan,
            'kelas' => $kelas
        ];

        $this->view('template/dashboard/header', $data);
        $this->view('dashboard/ubah-kelas', $data);
        $this->view('template/dashboard/footer');
    }

    public function hapusKelas($id)
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

    public function ubahPassword()
    {
        $database = new Database();

        if (isset($_POST['submit'])) {
            $passwordLama = $_POST['passwordLama'];
            $passwordBaru = $_POST['passwordBaru'];
            $konfirmasiPasswordBaru = $_POST['konfirmasiPasswordBaru'];

            if (empty($passwordLama) || empty($passwordBaru) || empty($konfirmasiPasswordBaru)) {
                Flasher::setFlashMessage('passwordLama', 'Password lama wajib diisi');
                Flasher::setFlashMessage('passwordBaru', 'Password baru wajib diisi');
                Flasher::setFlashMessage('konfirmasiPasswordBaru', 'Konfirmasi password lama wajib diisi');
                header('Location: /dashboard/ubah-password');
                die;
            }

            $query = "SELECT * FROM admin WHERE username = '" . $_SESSION['login'] . "'";

            $admin = $database->ambil_data($query);

            if($admin['password'] != $passwordLama) {
                Flasher::setFlashMessage('passwordLama', 'Password lama tidak sesuai');
                header('Location: /dashboard/ubah-password');
                die;
            }

            if($passwordBaru != $konfirmasiPasswordBaru) {
                Flasher::setFlashMessage('passwordBaru', 'Password baru tidak sesuai dengan konfirmasi password');
                Flasher::setFlashMessage('konfirmasiPasswordBaru', 'Konfirmasi password tidak sesuai dengan password baru');
                header('Location: /dashboard/ubah-password');
                die;
            }

            $query = "UPDATE admin SET password = '$passwordBaru' WHERE id = " . $admin['id'];

            if ($database->modifikasi($query)) {
                Flasher::setFlashAlert('ubahPassword', 'Password berhasil diubah', true);
            } else {
                Flasher::setFlashAlert('ubahPassword', 'Password gagal diubah', false);
            }

            unset($_SESSION['login']);

            header('Location: /login');
            die;
        }

        $data = [
            'title' => 'Ubah password'
        ];

        $this->view('template/dashboard/header', $data);
        $this->view('dashboard/ubah-password');
        $this->view('template/dashboard/footer');
    }
}
