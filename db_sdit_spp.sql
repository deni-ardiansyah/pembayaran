-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2019 at 02:57 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sdit_spp`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `kelas_id` int(11) NOT NULL,
  `nama_kelas` varchar(10) NOT NULL,
  `tingkat` enum('1','2','3','4','5','6') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`kelas_id`, `nama_kelas`, `tingkat`) VALUES
(5, 'I - A', '1'),
(6, 'VI - A', '6'),
(7, 'II - B', '2'),
(8, 'V - A', '5'),
(9, 'II - A', '2'),
(10, 'I - B', '1'),
(11, 'I - C', '1'),
(13, 'II - C', '2'),
(14, 'III - A', '3'),
(15, 'III - B', '3'),
(16, 'III - C', '3'),
(17, 'IV - A', '4'),
(18, 'IV - B', '4'),
(19, 'IV - C', '4'),
(20, 'V - B', '5'),
(21, 'V - C', '5'),
(22, 'VI - B', '6'),
(25, 'VI - C', '6');

-- --------------------------------------------------------

--
-- Table structure for table `tb_periode`
--

CREATE TABLE `tb_periode` (
  `periode_id` int(11) NOT NULL,
  `tahun_ajaran` varchar(20) NOT NULL,
  `nom_tingkat1` int(11) NOT NULL,
  `nom_tingkat2` int(11) NOT NULL,
  `nom_tingkat3` int(11) NOT NULL,
  `nom_tingkat4` int(11) NOT NULL,
  `nom_tingkat5` int(11) NOT NULL,
  `nom_tingkat6` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_periode`
--

INSERT INTO `tb_periode` (`periode_id`, `tahun_ajaran`, `nom_tingkat1`, `nom_tingkat2`, `nom_tingkat3`, `nom_tingkat4`, `nom_tingkat5`, `nom_tingkat6`) VALUES
(3, '2016/2017', 100000, 200000, 300000, 400000, 500000, 600000),
(4, '2017/2018', 110000, 120000, 130000, 140000, 150000, 160000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `nis` int(11) NOT NULL,
  `nama_siswa` varchar(30) NOT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `kelas_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`nis`, `nama_siswa`, `alamat`, `kelas_id`) VALUES
(121, 'deni ardiansyah', 'aas', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `transaksi_id` int(11) NOT NULL,
  `nis` int(11) NOT NULL,
  `jatuh_tempo` date NOT NULL,
  `bulan` varchar(20) NOT NULL,
  `no_bayar` varchar(20) DEFAULT NULL,
  `tgl_bayar` date DEFAULT NULL,
  `ket` varchar(20) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `periode_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `level` enum('admin','superadmin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `username`, `password`, `nama`, `level`) VALUES
(1, 'admin', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'renaldyyasdsd', 'admin'),
(2, 'deni', '889a3a791b3875cfae413574b53da4bb8a90d53e', 'Deni Ardiansyah', 'superadmin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`kelas_id`);

--
-- Indexes for table `tb_periode`
--
ALTER TABLE `tb_periode`
  ADD PRIMARY KEY (`periode_id`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `kelas_id` (`kelas_id`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`transaksi_id`),
  ADD KEY `nis` (`nis`),
  ADD KEY `periode_id` (`periode_id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `kelas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tb_periode`
--
ALTER TABLE `tb_periode`
  MODIFY `periode_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `transaksi_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD CONSTRAINT `tb_siswa_ibfk_1` FOREIGN KEY (`kelas_id`) REFERENCES `tb_kelas` (`kelas_id`);

--
-- Constraints for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `tb_transaksi_ibfk_1` FOREIGN KEY (`periode_id`) REFERENCES `tb_periode` (`periode_id`),
  ADD CONSTRAINT `tb_transaksi_ibfk_2` FOREIGN KEY (`nis`) REFERENCES `tb_siswa` (`nis`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
