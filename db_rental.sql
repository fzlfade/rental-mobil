-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 11, 2022 at 10:41 AM
-- Server version: 10.3.29-MariaDB-0+deb10u1
-- PHP Version: 7.3.19-1+eagle

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `kd_customer` int(8) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`kd_customer`, `nama`, `alamat`, `no_hp`) VALUES
(1, 'Noni Ariesta', 'Banyumas', '08888222222'),
(2, 'Susi Susanti', 'Cilacap', '08888345666'),
(3, 'Rina Wirawan', 'Purbalingga', '08888202022'),
(4, 'Tomi Saputra', 'Banjarnegara', '08888910010'),
(5, 'vadhio ramdanu', 'jakarta', '085716199861');

-- --------------------------------------------------------

--
-- Table structure for table `mobil`
--

CREATE TABLE `mobil` (
  `kd_mobil` int(8) NOT NULL,
  `jenis_mobil` varchar(35) NOT NULL,
  `warna` varchar(35) NOT NULL,
  `stok` int(8) NOT NULL,
  `tarif_sewa` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mobil`
--

INSERT INTO `mobil` (`kd_mobil`, `jenis_mobil`, `warna`, `stok`, `tarif_sewa`) VALUES
(1, 'sedan', 'putih', 0, 150000),
(2, 'station wagon', 'hitam', 18, 250000),
(3, 'suv', 'biru', 6, 300000),
(4, 'hatchback', 'silver', 10, 250000),
(5, 'Ford', 'Merah', 1, 200000);

-- --------------------------------------------------------

--
-- Table structure for table `sewa`
--

CREATE TABLE `sewa` (
  `kd_sewa` int(8) NOT NULL,
  `kd_mobil` int(8) NOT NULL,
  `kd_customer` int(8) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `total_sewa` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sewa`
--

INSERT INTO `sewa` (`kd_sewa`, `kd_mobil`, `kd_customer`, `tgl_pinjam`, `tgl_kembali`, `total_sewa`) VALUES
(1, 1, 1, '2022-02-02', '2022-02-03', 300000),
(2, 1, 3, '2022-08-10', '2022-08-10', 150000),
(3, 1, 4, '2022-08-10', '2022-08-10', 150000),
(6, 5, 4, '2022-08-10', '2022-08-12', 600000),
(7, 5, 5, '2022-08-10', '2022-08-31', 4400000),
(11, 5, 3, '2022-08-11', '2022-08-24', 2800000),
(14, 5, 2, '2022-08-13', '2022-09-30', 9800000);

--
-- Triggers `sewa`
--
DELIMITER $$
CREATE TRIGGER `tr_pengembalian` AFTER DELETE ON `sewa` FOR EACH ROW begin
update mobil set stok = stok + 1 where kd_mobil=OLD.kd_mobil;
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_sewa` AFTER INSERT ON `sewa` FOR EACH ROW begin
update mobil set stok = stok - 1 where kd_mobil=NEW.kd_mobil;
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_update` AFTER UPDATE ON `sewa` FOR EACH ROW begin
update mobil set stok = stok - 1 where kd_mobil=NEW.kd_mobil;
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_update1` AFTER UPDATE ON `sewa` FOR EACH ROW begin
update mobil set stok = stok + 1 where kd_mobil=OLD.kd_mobil;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(8) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'root', '63a9f0ea7bb98050796b649e85481845'),
(3, 'vadhio', '10ec79de7d0a0d8fc90485269d3e55af');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`kd_customer`);

--
-- Indexes for table `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`kd_mobil`);

--
-- Indexes for table `sewa`
--
ALTER TABLE `sewa`
  ADD PRIMARY KEY (`kd_sewa`),
  ADD KEY `kd_mobil` (`kd_mobil`),
  ADD KEY `kd_customer` (`kd_customer`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `kd_customer` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mobil`
--
ALTER TABLE `mobil`
  MODIFY `kd_mobil` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sewa`
--
ALTER TABLE `sewa`
  MODIFY `kd_sewa` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sewa`
--
ALTER TABLE `sewa`
  ADD CONSTRAINT `sewa_ibfk_1` FOREIGN KEY (`kd_mobil`) REFERENCES `mobil` (`kd_mobil`),
  ADD CONSTRAINT `sewa_ibfk_2` FOREIGN KEY (`kd_customer`) REFERENCES `customer` (`kd_customer`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
