<?php

class Database
{
    private $koneksi;

    private function koneksi()
    {
        $host = 'localhost';
        $user = 'root';
        $password = '';
        $database = 'uprak_riyan_darmawan';

        $this->koneksi = mysqli_connect($host, $user, $password, $database);
    }

    public function ambil_data($query)
    {
        $this->koneksi();

        $result = $this->koneksi->query($query);

        return $result->fetch_assoc();
    }

    public function ambil_semua_data($query)
    {
        $this->koneksi();

        $result = $this->koneksi->query($query);

        $rows = [];

        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }

        if($rows == null) {
            return null;
        }

        return $rows;
    }

    public function modifikasi($query)
    {
        $this->koneksi();

        $this->koneksi->query($query);

        return true;
    }
}