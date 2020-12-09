-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: fdb28.awardspace.net
-- Generation Time: Dec 09, 2020 at 10:12 AM
-- Server version: 5.7.20-log
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `3508586_scooterrent`
--

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `idKecamatan` int(11) NOT NULL,
  `NamaKec` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`idKecamatan`, `NamaKec`) VALUES
(1, 'Sukajadi'),
(2, 'Cicendo'),
(3, 'Coblong'),
(4, 'Cidadap'),
(5, 'Sukasari');

-- --------------------------------------------------------

--
-- Table structure for table `kelurahan`
--

CREATE TABLE `kelurahan` (
  `idKelurahan` int(11) NOT NULL,
  `NamaKel` varchar(100) NOT NULL,
  `idKecamatan_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelurahan`
--

INSERT INTO `kelurahan` (`idKelurahan`, `NamaKel`, `idKecamatan_fk`) VALUES
(1, 'Pasteur', 1),
(2, 'Cipedes', 1),
(3, 'Sukarasa', 5),
(4, 'Gegerkalong', 5),
(5, 'Pasir Kaliki', 2),
(6, 'Pajajaran', 2),
(7, 'Ciumbuleuit', 4),
(8, 'Hegarmanah', 4),
(9, 'Dago', 3),
(10, 'Cipaganti', 3);

-- --------------------------------------------------------

--
-- Table structure for table `penyewa`
--

CREATE TABLE `penyewa` (
  `NoKTP` int(11) NOT NULL,
  `Nama` varchar(100) NOT NULL,
  `idKelurahan_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penyewa`
--

INSERT INTO `penyewa` (`NoKTP`, `Nama`, `idKelurahan_fk`) VALUES
(12345, 'ABC', 1),
(12435, 'CDE', 3),
(13245, 'BCD', 2),
(21345, 'EFG', 5),
(23415, 'DEF', 4),
(24315, 'FGH', 6),
(31254, 'IJK', 9),
(32145, 'GHI', 7),
(34125, 'HIJ', 8),
(42135, 'JKL', 10),
(43215, 'KLM', 1),
(53421, 'LMN', 2);

-- --------------------------------------------------------

--
-- Table structure for table `recent`
--

CREATE TABLE `recent` (
  `RecentID` int(11) UNSIGNED NOT NULL,
  `Berita` varchar(100) NOT NULL,
  `BeritaID` int(11) NOT NULL,
  `Time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recent`
--

INSERT INTO `recent` (`RecentID`, `Berita`, `BeritaID`, `Time`) VALUES
(6, 'Delete User', 111, '2020-05-05 06:45:05'),
(7, 'Add New User', 111, '2020-05-05 06:45:22'),
(8, 'Add New Scooter', 11, '2020-05-05 06:45:35'),
(9, 'Delete User', 111, '2020-05-06 11:15:29'),
(10, 'Add New Scooter', 12, '2020-05-07 09:12:46'),
(11, 'Add New Scooter', 11, '2020-05-07 10:12:13'),
(12, 'Add New Scooter', 12, '2020-05-08 07:48:22'),
(13, 'Add New User', 111, '2020-05-11 06:33:50'),
(14, 'Delete User', 111, '2020-05-11 06:34:10'),
(15, 'Delete Scooter', 12, '2020-05-11 09:44:52'),
(16, 'Add New User', 111, '2020-05-11 09:48:30'),
(17, 'Delete User', 111, '2020-05-11 09:48:42'),
(18, 'Add New Scooter', 12, '2020-05-11 12:41:28'),
(19, 'Add New Scooter', 13, '2020-05-11 12:42:06'),
(20, 'Add New Scooter', 14, '2020-05-11 12:42:32'),
(21, 'Add New Scooter', 15, '2020-05-11 12:43:18'),
(22, 'Add New Scooter', 16, '2020-05-11 12:44:23'),
(23, 'Add New Scooter', 17, '2020-05-11 12:46:10'),
(24, 'Add New Scooter', 18, '2020-05-11 12:48:53'),
(25, 'Add New Scooter', 19, '2020-05-11 12:49:43'),
(26, 'Add New Scooter', 20, '2020-05-11 12:50:28'),
(27, 'Add New User', 111, '2020-05-12 02:51:06'),
(28, 'Delete User', 111, '2020-05-12 02:51:32'),
(29, 'Add New User', 111, '2020-05-12 03:01:41'),
(30, 'Delete User', 111, '2020-05-12 03:02:10'),
(31, 'Add New Scooter', 21, '2020-05-12 04:35:00'),
(32, 'Add New User', 111, '2020-05-12 04:35:32');

-- --------------------------------------------------------

--
-- Table structure for table `scooter`
--

CREATE TABLE `scooter` (
  `ScooterID` int(11) NOT NULL,
  `Warna` varchar(20) NOT NULL,
  `Harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `scooter`
--

INSERT INTO `scooter` (`ScooterID`, `Warna`, `Harga`) VALUES
(1, 'Merah', 10000),
(2, 'Merah', 15000),
(3, 'Hitam', 12000),
(4, 'Merah', 12000),
(5, 'Hijau', 11000),
(6, 'Hitam', 15000),
(7, 'Biru', 11000),
(8, 'Doomride', 100000),
(9, 'Merah', 9000),
(10, 'Hitam', 11000),
(11, 'Biru', 10000),
(12, 'Hijau', 8000),
(13, 'Biru', 14000),
(14, 'Hitam', 16000),
(15, 'Hijau', 13000),
(16, 'Merah', 9000),
(17, 'Hijau', 10000),
(18, 'Hitam', 15000),
(19, 'Biru', 13000),
(20, 'Hijau', 16000),
(21, 'Hitam', 11000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `TransactionID` int(11) UNSIGNED NOT NULL,
  `UserID_fk` int(11) NOT NULL,
  `ScooterID_fk` int(11) NOT NULL,
  `NoKTP_fk` int(11) NOT NULL,
  `RentTime` datetime DEFAULT NULL,
  `InitialPrice` int(11) NOT NULL,
  `ReturnTime` datetime DEFAULT NULL,
  `AdditionalPrice` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`TransactionID`, `UserID_fk`, `ScooterID_fk`, `NoKTP_fk`, `RentTime`, `InitialPrice`, `ReturnTime`, `AdditionalPrice`) VALUES
(1583953420, 100, 1, 12345, '2020-03-11 20:03:40', 10000, '2020-03-11 21:04:09', 10000),
(1589213214, 100, 3, 13245, '2020-04-12 17:54:00', 12000, '2020-04-12 19:55:00', 24000),
(1589214214, 100, 18, 13245, '2020-04-12 12:00:00', 15000, '2020-04-12 12:30:00', 0),
(1589216051, 100, 14, 12435, '2020-03-14 18:54:00', 15000, '2020-03-14 19:55:00', 15000),
(1589216067, 100, 11, 12345, '2020-05-11 18:54:27', 10000, '2020-05-11 18:54:45', 0),
(1589216068, 100, 15, 12435, '2020-01-12 09:54:27', 15000, '2020-01-12 11:00:45', 15000),
(1589216069, 100, 12, 13245, '2020-02-13 14:54:27', 12000, '2020-02-13 14:54:45', 0),
(1589216070, 100, 13, 21345, '2020-02-14 12:54:27', 12000, '2020-02-14 14:54:45', 24000),
(1589216071, 100, 5, 23415, '2020-05-15 13:54:27', 11000, '2020-05-15 16:54:45', 33000),
(1589216072, 100, 6, 24315, '2020-05-16 14:00:27', 15000, '2020-05-16 14:54:45', 0),
(1589216073, 100, 7, 31254, '2020-06-11 15:11:27', 11000, '2020-06-11 15:54:45', 0),
(1589216074, 100, 8, 32145, '2020-06-14 16:20:27', 15000, '2020-06-14 18:54:45', 30000),
(1589216075, 100, 9, 13245, '2020-07-15 17:11:27', 9000, '2020-07-15 17:54:45', 0),
(1589216076, 100, 10, 12345, '2020-07-25 08:54:27', 11000, '2020-07-25 12:59:00', 33000),
(1589216077, 100, 16, 12345, '2020-01-11 18:54:27', 10000, '2020-01-11 18:54:45', 0),
(1589216122, 100, 3, 12345, '2020-11-15 14:55:27', 12000, '2020-11-15 14:55:45', 0),
(1589216124, 100, 1, 34125, '2020-09-03 18:43:27', 10000, '2020-09-03 18:43:45', 0),
(1589216125, 100, 4, 43215, '2020-12-08 12:01:23', 12000, '2020-12-08 14:11:45', 24000),
(1589216432, 100, 2, 42135, '2020-10-13 09:22:27', 15000, '2020-10-13 10:44:45', 15000),
(1589218965, 100, 4, 21345, '2020-04-07 14:00:00', 12000, '2020-03-14 15:00:00', 0),
(1589226201, 100, 8, 34125, '2020-05-11 21:43:21', 15000, '2020-05-11 21:43:45', 0),
(1589226620, 100, 6, 24315, '2020-05-11 21:50:20', 15000, '2020-05-11 21:50:24', 0),
(1589256531, 100, 1, 21345, '2020-05-12 06:08:51', 10000, '2020-05-12 09:09:10', 20000),
(1589262043, 100, 2, 13245, '2020-05-12 07:40:43', 15000, '2020-05-12 09:41:02', 15000),
(1589264554, 100, 1, 23415, '2020-05-12 08:22:34', 10000, '2020-05-12 08:23:02', 0),
(1589265446, 100, 20, 53421, '2020-05-12 08:37:26', 16000, '2020-05-12 08:37:40', 0),
(1589266782, 100, 1, 13245, '2020-05-12 08:59:42', 10000, '2020-05-12 09:00:10', 0),
(1589269014, 100, 1, 12345, '2020-05-12 09:36:54', 10000, '2020-09-17 16:47:17', 60000),
(1589269047, 100, 2, 12435, '2020-05-12 09:37:27', 15000, '2020-05-12 09:37:45', 0),
(1594850495, 100, 2, 23415, '2020-07-15 22:01:35', 15000, '2020-07-15 22:02:49', 0),
(1596151584, 100, 2, 42135, '2020-07-30 23:26:24', 15000, '2020-07-30 23:26:48', 0),
(1600361729, 100, 3, 12345, '2020-09-17 16:55:29', 12000, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Type` enum('Admin','Manager','Operator') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `Password`, `Type`) VALUES
(100, 'qwe', 'Operator'),
(101, 'asd', 'Admin'),
(110, 'zxc', 'Manager'),
(111, 'rty', 'Operator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`idKecamatan`);

--
-- Indexes for table `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD PRIMARY KEY (`idKelurahan`),
  ADD KEY `idKecamatan` (`idKecamatan_fk`);

--
-- Indexes for table `penyewa`
--
ALTER TABLE `penyewa`
  ADD PRIMARY KEY (`NoKTP`),
  ADD KEY `idKelurahan` (`idKelurahan_fk`);

--
-- Indexes for table `recent`
--
ALTER TABLE `recent`
  ADD PRIMARY KEY (`RecentID`);

--
-- Indexes for table `scooter`
--
ALTER TABLE `scooter`
  ADD PRIMARY KEY (`ScooterID`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`TransactionID`),
  ADD KEY `UserID` (`UserID_fk`),
  ADD KEY `ScooterID` (`ScooterID_fk`),
  ADD KEY `NoKTP` (`NoKTP_fk`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `recent`
--
ALTER TABLE `recent`
  MODIFY `RecentID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `TransactionID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1600361730;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD CONSTRAINT `kelurahan_ibfk_1` FOREIGN KEY (`idKecamatan_fk`) REFERENCES `kecamatan` (`idKecamatan`);

--
-- Constraints for table `penyewa`
--
ALTER TABLE `penyewa`
  ADD CONSTRAINT `penyewa_ibfk_1` FOREIGN KEY (`idKelurahan_fk`) REFERENCES `kelurahan` (`idKelurahan`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`UserID_fk`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`ScooterID_fk`) REFERENCES `scooter` (`ScooterID`),
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`NoKTP_fk`) REFERENCES `penyewa` (`NoKTP`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
