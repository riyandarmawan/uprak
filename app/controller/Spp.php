<?php 

require_once 'app/core/Controller.php';
require_once 'app/core/Database.php';

if (!isset($_SESSION['login'])) {
    header('Location: /auth/login');
    exit;
}

class Spp extends Controller {
    public function index()
    {
        $database = new Database();

        $query = "SELECT * FROM spp";

        $spp = $database->ambil_data($query);

        $data = [
            'title' => 'SPP',
            'spp' => $spp
        ];

        $this->view('template/dashboard/header', $data);
        $this->view('dashboard/spp/index', $data);
        $this->view('template/dashboard/footer');
    }

    public function tambah()
    {
        $database = new Database();

        if (isset($_POST['submit'])) {
            $tahun = $_POST['tahun'];
            $nominal = $_POST['nominal'];

            if (empty($tahun) || empty($nominal)) {
                Flasher::setFlashMessage('tahun', 'Tahun wajib diisi');
                Flasher::setFlashMessage('nominal', 'Nominal wajib diisi');
                header('Location: /spp/tambah');
                die;
            }

            $query = "INSERT INTO spp(tahun, nominal) VALUES($tahun, $nominal)";

            if ($database->modifikasi($query)) {
                Flasher::setFlashAlert('spp', 'SPP berhasil ditambah', true);
            } else {
                Flasher::setFlashAlert('spp', 'SPP gagal ditambah', false);
            }

            header('Location: /spp');
            die;
        }

        $data = [
            'title' => 'Tambah SPP',
        ];

        $this->view('template/dashboard/header', $data);
        $this->view('dashboard/spp/tambah');
        $this->view('template/dashboard/footer');
    }

    public function ubah($id)
    {
        $database = new Database();

        if (isset($_POST['submit'])) {
            $tahun = $_POST['tahun'];
            $nominal = $_POST['nominal'];

            if (empty($tahun) || empty($nominal)) {
                Flasher::setFlashMessage('tahun', 'Tahun wajib diisi');
                Flasher::setFlashMessage('nominal', 'Nominal wajib diisi');
                header("Location: /spp/ubah/$id");
                die;
            }

            $query = "UPDATE spp SET tahun = '$tahun', nominal = '$nominal' WHERE id = $id";

            if ($database->modifikasi($query)) {
                Flasher::setFlashAlert('spp', 'SPP berhasil diubah', true);
            } else {
                Flasher::setFlashAlert('spp', 'SPP gagal diubah', false);
            }

            header('Location: /spp');
            die;
        }

        $query = "SELECT * FROM spp WHERE id = $id";

        $spp = $database->ambil_data($query);

        $data = [
            'title' => 'Ubah SPP',
            'spp' => $spp
        ];

        $this->view('template/dashboard/header', $data);
        $this->view('dashboard/spp/ubah', $data);
        $this->view('template/dashboard/footer');
    }

    public function hapus($id)
    {
        $database = new Database();

        $query = "DELETE FROM spp WHERE id = $id";

        if ($database->modifikasi($query)) {
            Flasher::setFlashAlert('spp', 'SPP berhasil dihapus', true);
        } else {
            Flasher::setFlashAlert('spp', 'SPP gagal dihapus', false);
        }

        header('Location: /spp');
        die;
    }
}