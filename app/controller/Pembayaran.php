<?php

require_once 'app/core/Controller.php';
require_once 'app/core/Database.php';

if (!isset($_SESSION['login'])) {
    header('Location: /auth/login');
    exit;
}

class Pembayaran extends Controller
{
    public function index()
    {
        $database = new Database();

        $siswa = [];
        $bulan = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
        $bulan_dibayar = [];

        if (isset($_POST['submit'])) {
            $nis = $_POST['nis'];
            $tahun = $_POST['tahun'];

            $query =    "SELECT siswa.nis, siswa.nama_lengkap, pembayaran.bulan_tagihan, pembayaran.tahun_tagihan 
                         FROM siswa
                         LEFT JOIN spp ON spp.id = siswa.spp_id
                         LEFT JOIN pembayaran ON pembayaran.nis = siswa.nis
                         WHERE siswa.nis = '$nis' AND pembayaran.tahun_tagihan = '$tahun'";

            $siswa = $database->ambil_data($query);

            if (!empty($siswa)) {
                foreach ($siswa as $ssw) {
                    foreach ($bulan as $bln) {
                        if (in_array($bln, $ssw)) {
                            array_push($bulan_dibayar, $bln);
                        }
                    }
                }
            } else {
                Flasher::setFlashAlert('pembayaran', 'Laporan pembayaran tidak ditemukan', false);
                header('Location: /laporan-pembayaran');
                exit;
            }
        }

        $data = [
            'title' => 'Laporan Pembayaran',
            'siswa' => $siswa,
            'bulan' => $bulan,
            'bulan_dibayar' => $bulan_dibayar
        ];

        $this->view('template/dashboard/header', $data);
        $this->view('dashboard/pembayaran/index', $data);
        $this->view('template/dashboard/footer');
    }
}
