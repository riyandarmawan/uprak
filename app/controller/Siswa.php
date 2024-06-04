<?php 

require_once 'app/core/Controller.php';
require_once 'app/core/Database.php';

if (!isset($_SESSION['login'])) {
    header('Location: /auth/login');
    exit;
}

class Siswa extends Controller {
    public function index()
    {
        $database = new Database();

        $query =    "SELECT siswa.*, kelas.kode_kelas, spp.nominal 
                    FROM siswa
                    LEFT JOIN kelas ON kelas.id = siswa.kelas_id 
                    LEFT JOIN spp ON spp.id = siswa.spp_id";

        $siswa = $database->ambil_data($query);

        $data = [
            'title' => 'Siswa',
            'siswa' => $siswa
        ];

        $this->view('template/dashboard/header', $data);
        $this->view('dashboard/siswa/index', $data);
        $this->view('template/dashboard/footer');
    }

    public function tambah()
    {
        $database = new Database();

        if (isset($_POST['submit'])) {
            $nis = $_POST['nis'];
            $namaLengkap = $_POST['namaLengkap'];
            $tanggalLahir = $_POST['tanggalLahir'];
            $jenisKelamin = $_POST['jenisKelamin'];
            $alamat = $_POST['alamat'];
            $noHp = $_POST['noHp'];
            $kelas = $_POST['kelas'];
            $spp = $_POST['spp'];

            if (empty($nis) || empty($namaLengkap) ||empty($alamat) || empty($noHp)) {
                Flasher::setFlashMessage('nis', 'NIS wajib diisi');
                Flasher::setFlashMessage('namaLengkap', 'Nama Lengkap wajib diisi');
                Flasher::setFlashMessage('alamat', 'Alamat wajib diisi');
                Flasher::setFlashMessage('noHp', 'No HP wajib diisi');
                header('Location: /siswa/tambah');
                die;
            }

            $query = "SELECT nis FROM siswa WHERE nis = $nis";

            if($database->ambil_data($query)) {
                Flasher::setOld('namaLengkap', $namaLengkap);
                Flasher::setOld('alamat', $alamat);
                Flasher::setOld('noHp', $noHp);
                Flasher::setFlashMessage('nis', 'NIS ini sudah terdaftar');
                header('Location: /siswa/tambah');
                die;
            }

            $query = "INSERT INTO siswa(nis, nama_lengkap, tanggal_lahir, jenis_kelamin, alamat, no_hp, kelas_id, spp_id) VALUES('$nis', '$namaLengkap', '$tanggalLahir', '$jenisKelamin', '$alamat', '$noHp', '$kelas', '$spp')";

            if ($database->modifikasi($query)) {
                Flasher::setFlashAlert('siswa', 'Siswa berhasil ditambah', true);
            } else {
                Flasher::setFlashAlert('siswa', 'Siswa gagal ditambah', false);
            }

            header('Location: /siswa');
            die;
        }

        $query = "SELECT * FROM spp ORDER BY tahun DESC";

        $spp = array_slice($database->ambil_data($query), 0, 3);

        $query = "SELECT * FROM kelas";

        $kelas = $database->ambil_data($query);

        $data = [
            'title' => 'Tambah Siswa',
            'spp' => $spp,
            'kelas' => $kelas
        ];

        $this->view('template/dashboard/header', $data);
        $this->view('dashboard/siswa/tambah', $data);
        $this->view('template/dashboard/footer');
    }

    public function ubah($nis)
    {
        $database = new Database();

        if (isset($_POST['submit'])) {
            $nisInput = $_POST['nis'];
            $namaLengkap = $_POST['namaLengkap'];
            $tanggalLahir = $_POST['tanggalLahir'];
            $jenisKelamin = $_POST['jenisKelamin'];
            $alamat = $_POST['alamat'];
            $noHp = $_POST['noHp'];
            $kelas = $_POST['kelas'];
            $spp = $_POST['spp'];

            if (empty($nisInput) || empty($namaLengkap) || empty($alamat) || empty($noHp)) {
                Flasher::setFlashMessage('nis', 'NIS wajib diisi');
                Flasher::setFlashMessage('namaLengkap', 'Nama Lengkap wajib diisi');
                Flasher::setFlashMessage('alamat', 'Alamat wajib diisi');
                Flasher::setFlashMessage('noHp', 'No HP wajib diisi');
                header("Location: /siswa/ubah/$nis");
                die;
            }

            $query = "UPDATE siswa SET nis = '$nisInput', nama_lengkap = '$namaLengkap', tanggal_lahir = '$tanggalLahir', jenis_kelamin = '$jenisKelamin', alamat = '$alamat', no_hp =  '$noHp', kelas_id = '$kelas', spp_id = '$spp' WHERE nis = $nis";

            if ($database->modifikasi($query)) {
                Flasher::setFlashAlert('siswa', 'Siswa berhasil diubah', true);
            } else {
                Flasher::setFlashAlert('siswa', 'Siswa gagal diubah', false);
            }

            header('Location: /siswa');
            die;
        }

        $query = "SELECT * FROM spp ORDER BY tahun DESC";

        $spp = array_slice($database->ambil_data($query), 0, 3);

        $query = "SELECT * FROM kelas";

        $kelas = $database->ambil_data($query);

        $query = "SELECT * FROM siswa WHERE nis = $nis";

        $siswa = $database->ambil_data($query);

        $data = [
            'title' => 'Ubah Siswa',
            'spp' => $spp,
            'kelas' => $kelas,
            'siswa' => $siswa
        ];

        $this->view('template/dashboard/header', $data);
        $this->view('dashboard/siswa/ubah', $data);
        $this->view('template/dashboard/footer');
    }

    public function hapus($nis)
    {
        $database = new Database();

        $query = "DELETE FROM siswa WHERE nis = $nis";

        if ($database->modifikasi($query)) {
            Flasher::setFlashAlert('siswa', 'Siswa berhasil dihapus', true);
        } else {
            Flasher::setFlashAlert('siswa', 'Siswa gagal dihapus', false);
        }

        header('Location: /siswa');
        die;
    }
}