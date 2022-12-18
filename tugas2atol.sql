-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2022 at 02:37 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugas2atol`
--

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE `paket` (
  `kdPaket` varchar(4) NOT NULL,
  `namaPaket` varchar(30) NOT NULL,
  `harga` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`kdPaket`, `namaPaket`, `harga`) VALUES
('PK01', 'Cuci + Setrika', '9000.00'),
('PK02', 'Setrika Saja', '8000.00'),
('PK03', 'Cuci Saja', '7000.00'),
('PK04', 'Cuci + Setrika Express', '13000.00'),
('PK05', 'Setrika Saja Express', '12000.00'),
('PK06', 'Cuci Saja Express', '11000.00');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `idPegawai` varchar(4) NOT NULL,
  `pass` varchar(10) NOT NULL,
  `namaPegawai` varchar(30) NOT NULL,
  `jk` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `notelp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`idPegawai`, `pass`, `namaPegawai`, `jk`, `alamat`, `notelp`) VALUES
('', '', 'Ucup Sutisna', 'Laki-laki', 'Sekeloa', '081283940572'),
('A001', '*FAE1661BF', 'Harry Styles', 'Laki-laki', 'Cipaganti', '081283927483'),
('A002', '*70F6CBCB3', 'Rina Sawayama', 'Perempuan', 'Dago', '081274938464'),
('A003', '*AA4CE2298', 'Gloria Tells', 'Perempuan', 'Lebak Gede', '081294638472'),
('A004', '*264C4D15F', 'Francis Karel', 'Laki-laki', 'Sekeloa', '081273638493'),
('A005', '*2BB7EB2D0', 'Alina Baraz', 'Perempuan', 'Dago', '081253647584');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `idPelanggan` varchar(4) NOT NULL,
  `namaPelanggan` varchar(30) NOT NULL,
  `jk` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `notelp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`idPelanggan`, `namaPelanggan`, `jk`, `alamat`, `notelp`) VALUES
('P001', 'Brendon Urie', 'Laki-laki', 'Sadang Serang', '081234567890'),
('P002', 'Calum Hood', 'Laki-laki', 'Lebak Gede', '081209876543'),
('P003', 'Niki Zefanya', 'Perempuan', 'Dago', '081213579135'),
('P004', 'Perrie Edwards', 'Perempuan', 'Lebang Siliwangi', '081224680246'),
('P005', 'Dominic Fike', 'Laki-laki', 'Coblong', '081297867564');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `noTransaksi` int(11) NOT NULL,
  `idPegawai` varchar(4) NOT NULL,
  `idPelanggan` varchar(4) NOT NULL,
  `kdPaket` varchar(4) NOT NULL,
  `tanggal` datetime NOT NULL,
  `berat` decimal(5,1) NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`noTransaksi`, `idPegawai`, `idPelanggan`, `kdPaket`, `tanggal`, `berat`, `total`) VALUES
(1, 'A002', 'P004', 'PK05', '2022-07-19 21:12:42', '1.5', '18000.00'),
(2, 'A002', 'P004', 'PK02', '2022-07-16 11:09:13', '1.5', '12000.00'),
(3, 'A003', 'P003', 'PK04', '2022-07-16 12:13:08', '3.0', '39000.00'),
(4, 'A004', 'P002', 'PK01', '2022-07-16 13:25:08', '2.2', '19800.00'),
(5, 'A005', 'P001', 'PK05', '2022-07-16 13:44:12', '1.0', '11000.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`kdPaket`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`idPegawai`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`idPelanggan`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`noTransaksi`) USING BTREE,
  ADD KEY `idAdmin` (`idPegawai`),
  ADD KEY `idPelanggan` (`idPelanggan`),
  ADD KEY `kdPaket` (`kdPaket`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `noTransaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`idPegawai`) REFERENCES `pegawai` (`idPegawai`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`idPelanggan`) REFERENCES `pelanggan` (`idPelanggan`),
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`kdPaket`) REFERENCES `paket` (`kdPaket`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
