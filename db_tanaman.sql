-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2024 at 09:58 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tanaman`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_alternatif`
--

CREATE TABLE `tbl_alternatif` (
  `kode_alternatif` char(6) NOT NULL,
  `keterangan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_alternatif`
--

INSERT INTO `tbl_alternatif` (`kode_alternatif`, `keterangan`) VALUES
('A1', 'Anggrek Jamrud'),
('A10', 'Anggrek kerlip'),
('A2', 'Anggrek Bulan'),
('A3', 'Anggrek Callus Vanda'),
('A4', 'Anggrek Kantung Kolopaking'),
('A5', 'Anggrek Pandan'),
('A6', 'Anggrek Kebutan'),
('A7', 'Anggrek Bulan Bintang'),
('A8', 'Anggrek Sendok'),
('A9', 'Anggrek Larat');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hasil_penilaian`
--

CREATE TABLE `tbl_hasil_penilaian` (
  `id_data` int(11) NOT NULL,
  `kode_kriteria` char(6) NOT NULL,
  `kode_alternatif` char(6) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nilai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_hasil_penilaian`
--

INSERT INTO `tbl_hasil_penilaian` (`id_data`, `kode_kriteria`, `kode_alternatif`, `id_user`, `nilai`) VALUES
(1, 'C1', 'A1', 1, 2),
(2, 'C2', 'A1', 1, 3),
(3, 'C3', 'A1', 1, 1),
(4, 'C4', 'A1', 1, 2),
(5, 'C5', 'A1', 1, 2),
(6, 'C1', 'A2', 1, 3),
(7, 'C2', 'A2', 1, 3),
(8, 'C3', 'A2', 1, 2),
(9, 'C4', 'A2', 1, 2),
(10, 'C5', 'A2', 1, 3),
(11, 'C1', 'A3', 1, 2),
(12, 'C2', 'A3', 1, 2),
(13, 'C3', 'A3', 1, 1),
(14, 'C4', 'A3', 1, 2),
(15, 'C5', 'A3', 1, 1),
(16, 'C1', 'A4', 1, 3),
(17, 'C2', 'A4', 1, 3),
(18, 'C3', 'A4', 1, 2),
(19, 'C4', 'A4', 1, 3),
(20, 'C5', 'A4', 1, 2),
(21, 'C1', 'A5', 1, 2),
(22, 'C2', 'A5', 1, 3),
(23, 'C3', 'A5', 1, 3),
(24, 'C4', 'A5', 1, 2),
(25, 'C5', 'A5', 1, 2),
(26, 'C1', 'A6', 1, 1),
(27, 'C2', 'A6', 1, 3),
(28, 'C3', 'A6', 1, 2),
(29, 'C4', 'A6', 1, 2),
(30, 'C5', 'A6', 1, 1),
(31, 'C1', 'A7', 1, 2),
(32, 'C2', 'A7', 1, 3),
(33, 'C3', 'A7', 1, 3),
(34, 'C4', 'A7', 1, 3),
(35, 'C5', 'A7', 1, 2),
(36, 'C1', 'A8', 1, 2),
(37, 'C2', 'A8', 1, 3),
(38, 'C3', 'A8', 1, 2),
(39, 'C4', 'A8', 1, 2),
(40, 'C5', 'A8', 1, 2),
(41, 'C1', 'A9', 1, 3),
(42, 'C2', 'A9', 1, 3),
(43, 'C3', 'A9', 1, 2),
(44, 'C4', 'A9', 1, 3),
(45, 'C5', 'A9', 1, 1),
(46, 'C1', 'A10', 1, 1),
(47, 'C2', 'A10', 1, 2),
(48, 'C3', 'A10', 1, 2),
(49, 'C4', 'A10', 1, 2),
(50, 'C5', 'A10', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jenis`
--

CREATE TABLE `tbl_jenis` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_jenis`
--

INSERT INTO `tbl_jenis` (`id_jenis`, `nama_jenis`) VALUES
(1, 'benefit'),
(2, 'cost');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kriteria`
--

CREATE TABLE `tbl_kriteria` (
  `kode_kriteria` char(6) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `keterangan` varchar(30) DEFAULT NULL,
  `catatan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_kriteria`
--

INSERT INTO `tbl_kriteria` (`kode_kriteria`, `id_jenis`, `keterangan`, `catatan`) VALUES
('C1', 1, 'Kondisi Tanaman', NULL),
('C2', 1, 'Warna Hijau Daun', NULL),
('C3', 1, 'Ketebalan Batang', NULL),
('C4', 1, 'Ukuran Akar', NULL),
('C5', 1, 'Jumlah Bunga', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(15) DEFAULT NULL,
  `password` varchar(300) DEFAULT NULL,
  `role` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `role`) VALUES
(1, 'admin', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_alternatif`
--
ALTER TABLE `tbl_alternatif`
  ADD PRIMARY KEY (`kode_alternatif`),
  ADD UNIQUE KEY `kode_alternatif` (`kode_alternatif`);

--
-- Indexes for table `tbl_hasil_penilaian`
--
ALTER TABLE `tbl_hasil_penilaian`
  ADD PRIMARY KEY (`id_data`),
  ADD KEY `kode_kriteria` (`kode_kriteria`),
  ADD KEY `kode_alternatif` (`kode_alternatif`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tbl_jenis`
--
ALTER TABLE `tbl_jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `tbl_kriteria`
--
ALTER TABLE `tbl_kriteria`
  ADD PRIMARY KEY (`kode_kriteria`),
  ADD UNIQUE KEY `kode_kriteria` (`kode_kriteria`),
  ADD KEY `id_jenis` (`id_jenis`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_hasil_penilaian`
--
ALTER TABLE `tbl_hasil_penilaian`
  MODIFY `id_data` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `tbl_jenis`
--
ALTER TABLE `tbl_jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_hasil_penilaian`
--
ALTER TABLE `tbl_hasil_penilaian`
  ADD CONSTRAINT `tbl_hasil_penilaian_ibfk_1` FOREIGN KEY (`kode_kriteria`) REFERENCES `tbl_kriteria` (`kode_kriteria`),
  ADD CONSTRAINT `tbl_hasil_penilaian_ibfk_2` FOREIGN KEY (`kode_alternatif`) REFERENCES `tbl_alternatif` (`kode_alternatif`),
  ADD CONSTRAINT `tbl_hasil_penilaian_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`);

--
-- Constraints for table `tbl_kriteria`
--
ALTER TABLE `tbl_kriteria`
  ADD CONSTRAINT `tbl_kriteria_ibfk_1` FOREIGN KEY (`id_jenis`) REFERENCES `tbl_jenis` (`id_jenis`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
