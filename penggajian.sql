-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2022 at 04:27 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penggajian`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_bpjs`
--

CREATE TABLE `tb_bpjs` (
  `npp` varchar(10) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `total_tagihan` varchar(50) NOT NULL,
  `iuran_perusahaan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_bpjs`
--

INSERT INTO `tb_bpjs` (`npp`, `kelas`, `total_tagihan`, `iuran_perusahaan`) VALUES
('800015', 'K0', '0', '0'),
('850003', 'K1', '125000', '100000'),
('920101', 'K2', '140000', '105000');

-- --------------------------------------------------------

--
-- Table structure for table `tb_gaji`
--

CREATE TABLE `tb_gaji` (
  `id_gaji` int(11) NOT NULL,
  `bulan` varchar(15) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `id_jabatan` varchar(10) NOT NULL,
  `id_kehadiran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tb_gaji`
--

INSERT INTO `tb_gaji` (`id_gaji`, `bulan`, `id_karyawan`, `id_jabatan`, `id_kehadiran`) VALUES
(11, '122022', 1, 'BM', 11),
(12, '122022', 2, 'OF2', 12),
(13, '122022', 7, 'SC1', 16),
(14, '122022', 6, 'SF1', 15),
(15, '122022', 3, 'SPV1', 13),
(16, '122022', 5, 'STAF2', 14);

-- --------------------------------------------------------

--
-- Table structure for table `tb_hak_akses`
--

CREATE TABLE `tb_hak_akses` (
  `id_hak_akses` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `hak_akses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_hak_akses`
--

INSERT INTO `tb_hak_akses` (`id_hak_akses`, `keterangan`, `hak_akses`) VALUES
(1, 'Admin', 1),
(2, 'Manager', 2),
(3, 'Karyawan', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_jabatan`
--

CREATE TABLE `tb_jabatan` (
  `id_jabatan` varchar(10) NOT NULL,
  `nama_jabatan` varchar(120) NOT NULL,
  `gaji_dasar` varchar(50) DEFAULT NULL,
  `tj_dasar` varchar(50) DEFAULT NULL,
  `tj_jabatan` varchar(50) DEFAULT NULL,
  `tj_operasional` varchar(50) DEFAULT NULL,
  `tj_biaya_perumahan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jabatan`
--

INSERT INTO `tb_jabatan` (`id_jabatan`, `nama_jabatan`, `gaji_dasar`, `tj_dasar`, `tj_jabatan`, `tj_operasional`, `tj_biaya_perumahan`) VALUES
('BM', 'Branch Manager', '177605 ', '1553015 ', ' 3611000 ', '0', ' 460000 '),
('OF2', 'Officer 2', '810338 ', '745511 ', '1265000 ', '0', '0'),
('SC1', 'Sales Community 1', '2585223', '0', '0', '0', '0'),
('SF1', 'Sales Force 1', '2585223', '0', '0', '0', '0'),
('SPV1', 'Supervisor 1', ' 1041863 ', '929758', '1656000', '0', '0'),
('STAF2', 'Staff 2', '1022018', '940256', '874000', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tb_karyawan`
--

CREATE TABLE `tb_karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `id_jabatan` varchar(10) DEFAULT NULL,
  `nama_karyawan` varchar(100) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `masa_kerja` varchar(50) DEFAULT NULL,
  `id_hak_akses` int(11) NOT NULL,
  `npp` varchar(10) NOT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`id_karyawan`, `nik`, `id_jabatan`, `nama_karyawan`, `username`, `password`, `masa_kerja`, `id_hak_akses`, `npp`, `photo`, `email`) VALUES
(1, '930073', 'BM', 'Wiji Setyo', 'wiji', '202cb962ac59075b964b07152d234b70', '10 Tahun 7 Bulan ', 2, '850003', 'wiji.jpg', ''),
(2, '32523', 'OF2', 'Siti Romdhonah', 'siti', '202cb962ac59075b964b07152d234b70', '8 Tahun 2 Bulan ', 1, '920101', 'siti.jpg', ''),
(3, '04814014', 'SPV1', 'Mohammad Zaki', 'zaki', '202cb962ac59075b964b07152d234b70', '5 Tahun 9 Bulan ', 3, '850003', 'alvia.jpg', ''),
(5, '940101', 'STAF2', 'Fina Inayatul Maula', 'fina', '81dc9bdb52d04dc20036dbd8313ed055', '4 Tahun 8 Bulan ', 3, '850003', 'ika.jpg', ''),
(6, '980011', 'SF1', 'Muhammad Baihaqi Rozaq', 'muhammad', '81dc9bdb52d04dc20036dbd8313ed055', '4 Tahun 11 Bulan ', 3, '920101', 'syukri.jpg', ''),
(7, '12345678', 'SC1', 'Amir', 'amir', '202cb962ac59075b964b07152d234b70', '1 tahun', 3, '800015', 'syukri.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kehadiran`
--

CREATE TABLE `tb_kehadiran` (
  `id_kehadiran` int(11) NOT NULL,
  `bulan` varchar(15) NOT NULL,
  `id_karyawan` int(11) DEFAULT NULL,
  `id_jabatan` varchar(10) DEFAULT NULL,
  `hadir` int(11) NOT NULL,
  `sakit` int(11) NOT NULL,
  `alpha` int(11) NOT NULL,
  `telat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tb_kehadiran`
--

INSERT INTO `tb_kehadiran` (`id_kehadiran`, `bulan`, `id_karyawan`, `id_jabatan`, `hadir`, `sakit`, `alpha`, `telat`) VALUES
(5, '102022', 1, 'BM', 25, 0, 0, 1),
(6, '102022', 2, 'OF2', 24, 0, 1, 1),
(7, '102022', 3, 'SPV1', 23, 0, 2, 1),
(11, '122022', 1, 'BM', 0, 0, 0, 0),
(12, '122022', 2, 'OF2', 0, 0, 0, 0),
(13, '122022', 3, 'SPV1', 0, 0, 0, 0),
(14, '122022', 5, 'STAF2', 0, 0, 0, 0),
(15, '122022', 6, 'SF1', 0, 0, 0, 0),
(16, '122022', 7, 'SC1', 24, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_potongan_gaji`
--

CREATE TABLE `tb_potongan_gaji` (
  `id_potongan` int(11) NOT NULL,
  `potongan` varchar(100) DEFAULT NULL,
  `jumlah_potongan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_potongan_gaji`
--

INSERT INTO `tb_potongan_gaji` (`id_potongan`, `potongan`, `jumlah_potongan`) VALUES
(1, 'telat', 10000),
(2, 'alpha', 25000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_bpjs`
--
ALTER TABLE `tb_bpjs`
  ADD PRIMARY KEY (`npp`);

--
-- Indexes for table `tb_gaji`
--
ALTER TABLE `tb_gaji`
  ADD PRIMARY KEY (`id_gaji`),
  ADD KEY `id_karyawan` (`id_karyawan`,`id_jabatan`,`id_kehadiran`),
  ADD KEY `id_jabatan` (`id_jabatan`),
  ADD KEY `id_kehadiran` (`id_kehadiran`);

--
-- Indexes for table `tb_hak_akses`
--
ALTER TABLE `tb_hak_akses`
  ADD PRIMARY KEY (`id_hak_akses`);

--
-- Indexes for table `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD PRIMARY KEY (`id_karyawan`),
  ADD KEY `id_jabatan` (`id_jabatan`),
  ADD KEY `id_hak_akses` (`id_hak_akses`),
  ADD KEY `npp` (`npp`);

--
-- Indexes for table `tb_kehadiran`
--
ALTER TABLE `tb_kehadiran`
  ADD PRIMARY KEY (`id_kehadiran`),
  ADD KEY `id_jabatan` (`id_jabatan`),
  ADD KEY `id_karyawan` (`id_karyawan`);

--
-- Indexes for table `tb_potongan_gaji`
--
ALTER TABLE `tb_potongan_gaji`
  ADD PRIMARY KEY (`id_potongan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_gaji`
--
ALTER TABLE `tb_gaji`
  MODIFY `id_gaji` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_hak_akses`
--
ALTER TABLE `tb_hak_akses`
  MODIFY `id_hak_akses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_kehadiran`
--
ALTER TABLE `tb_kehadiran`
  MODIFY `id_kehadiran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_potongan_gaji`
--
ALTER TABLE `tb_potongan_gaji`
  MODIFY `id_potongan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_gaji`
--
ALTER TABLE `tb_gaji`
  ADD CONSTRAINT `tb_gaji_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `tb_karyawan` (`id_karyawan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_gaji_ibfk_2` FOREIGN KEY (`id_jabatan`) REFERENCES `tb_jabatan` (`id_jabatan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_gaji_ibfk_3` FOREIGN KEY (`id_kehadiran`) REFERENCES `tb_kehadiran` (`id_kehadiran`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD CONSTRAINT `tb_karyawan_ibfk_1` FOREIGN KEY (`id_jabatan`) REFERENCES `tb_jabatan` (`id_jabatan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_karyawan_ibfk_2` FOREIGN KEY (`id_hak_akses`) REFERENCES `tb_hak_akses` (`id_hak_akses`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_karyawan_ibfk_3` FOREIGN KEY (`npp`) REFERENCES `tb_bpjs` (`npp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_kehadiran`
--
ALTER TABLE `tb_kehadiran`
  ADD CONSTRAINT `tb_kehadiran_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `tb_karyawan` (`id_karyawan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_kehadiran_ibfk_2` FOREIGN KEY (`id_jabatan`) REFERENCES `tb_jabatan` (`id_jabatan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
