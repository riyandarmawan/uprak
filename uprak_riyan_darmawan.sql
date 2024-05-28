-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2024 at 03:10 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uprak_riyan_darmawan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(50) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `no_hp` varchar(13) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama_lengkap`, `alamat`, `no_hp`, `username`, `password`) VALUES
(1, 'Ahmad Saefudin', 'Cilegong', '081212342781', 'ahmadsaefudin', 'ahma1234'),
(2, 'Winarti', 'Cibatu', '081212342774', 'winarti', 'wina1234'),
(3, 'Setiawati', 'Citalang', '081212342796', 'setiawati', 'seti1234'),
(4, 'Hana Sinta', 'Cimaung', '081212342796', 'hanasinta', 'hana1234');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id` int(11) NOT NULL,
  `kode_jurusan` varchar(10) DEFAULT NULL,
  `deskripsi` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id`, `kode_jurusan`, `deskripsi`) VALUES
(1, 'RPL', 'Rekayasa Perangkat Lunak'),
(2, 'TKRO', 'Teknik Kendaraan Ringan Otomotif'),
(3, 'TP', 'Teknik Permesinan');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `kode_kelas` varchar(10) DEFAULT NULL,
  `tingkat` enum('10','11','12') DEFAULT NULL,
  `jurusan_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `kode_kelas`, `tingkat`, `jurusan_id`) VALUES
(1, 'X-RPL', '10', 1),
(2, 'XI-RPL', '11', 1),
(3, 'XII-RPL', '12', 1),
(4, 'X-TKRO-1', '10', 2),
(5, 'X-TKRO-2', '10', 2),
(6, 'XI-TKRO-1', '11', 2),
(7, 'XI-TKRO-2', '11', 2),
(8, 'XII-TKRO-1', '12', 2),
(9, 'XII-TKRO-2', '12', 2),
(10, 'X-TP', '10', 3),
(11, 'XI-TP', '11', 3),
(12, 'XII-TP', '12', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `no_transaksi` varchar(20) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `nis` bigint(20) DEFAULT NULL,
  `bulan_tagihan` int(11) DEFAULT NULL,
  `tahun_tagihan` year(4) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nis` bigint(20) NOT NULL,
  `nama_lengkap` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('l','p') DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `no_hp` varchar(13) DEFAULT NULL,
  `kelas_id` int(11) DEFAULT NULL,
  `spp_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `nama_lengkap`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `no_hp`, `kelas_id`, `spp_id`) VALUES
(22001001, 'Santi Rima', '2000-06-18', 'l', 'Ciwangi', '08121234495', 12, 3),
(22001002, 'Satria Melati', '2000-07-04', 'p', 'Cimanuk', '08121234404', 3, 3),
(22001003, 'Santi Hana', '2000-05-04', 'l', 'Citalang', '08121234471', 11, 4),
(22001004, 'Satria Melati', '2000-08-14', 'p', 'Cimanuk', '08121234417', 10, 5),
(22001005, 'Raden Sinta', '2000-01-12', 'l', 'Ciseureuh', '08121234472', 1, 5),
(22001006, 'Santi Lasmin', '2000-01-11', 'p', 'Cimaung', '08121234450', 4, 5),
(22001007, 'Mumun Melati', '2000-11-23', 'p', 'Cimaung', '08121234486', 1, 5),
(22001008, 'Santi Kenzo', '2000-01-19', 'p', 'Ciseureuh', '08121234406', 8, 3),
(22001009, 'Mumun Lasmi', '2000-11-06', 'p', 'Ciseureuh', '08121234457', 11, 4),
(22001010, 'Mala Lasmi', '2000-11-24', 'p', 'Citalang', '08121234499', 11, 4);

-- --------------------------------------------------------

--
-- Table structure for table `spp`
--

CREATE TABLE `spp` (
  `id` int(11) NOT NULL,
  `tahun` year(4) DEFAULT NULL,
  `nominal` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `spp`
--

INSERT INTO `spp` (`id`, `tahun`, `nominal`) VALUES
(1, '2020', 150000),
(2, '2021', 175000),
(3, '2022', 200000),
(4, '2023', 225000),
(5, '2024', 250000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jurusan_id` (`jurusan_id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`no_transaksi`),
  ADD KEY `nis` (`nis`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `kelas_id` (`kelas_id`),
  ADD KEY `spp_id` (`spp_id`);

--
-- Indexes for table `spp`
--
ALTER TABLE `spp`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `spp`
--
ALTER TABLE `spp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`jurusan_id`) REFERENCES `jurusan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `siswa_ibfk_2` FOREIGN KEY (`spp_id`) REFERENCES `spp` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
