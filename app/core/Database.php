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

        if ($result->num_rows < 1) {
            return null;
        }

        if ($result->num_rows > 1) {
            $rows = [];

            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }

            return $rows;
        }

        return $result->fetch_assoc();
    }

    public function modifikasi($query)
    {
        $this->koneksi();

        $result = $this->koneksi->query($query);

        if($this->koneksi->affected_rows === 0) {
            return false;
        }

        return true;
    }
}
