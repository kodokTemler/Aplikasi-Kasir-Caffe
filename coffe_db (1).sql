-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 09, 2025 at 04:32 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coffe_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `username`, `password`) VALUES
(10, 'calu', 'calu'),
(11, 'janet', 'janet'),
(12, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` int NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `foto_produk` varchar(255) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `harga_produk` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `nama_produk`, `foto_produk`, `deskripsi_produk`, `harga_produk`) VALUES
(14, 'Coffe Latte', 'latte.jpg', 'sasa', 10000),
(15, 'Roti Bakar', 'rotibakar.jpg', 'sasasas', 15000),
(18, 'Mie Goreng', 'miegoreng.jpg', 'asasas', 20000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_superadmin`
--

CREATE TABLE `tb_superadmin` (
  `id_superadmin` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_superadmin`
--

INSERT INTO `tb_superadmin` (`id_superadmin`, `username`, `password`) VALUES
(1, 'super', 'super');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int NOT NULL,
  `id_produk` int NOT NULL,
  `meja` int DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `id_nota` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `id_produk`, `meja`, `status`, `id_nota`) VALUES
(47, 15, 7, 'sudah bayar', '66a70b631c023'),
(48, 15, 7, 'sudah bayar', '66a70b631c023'),
(51, 14, 2, 'sudah bayar', '66a70be15a843'),
(52, 15, 2, 'sudah bayar', '66a70be15a843'),
(53, 14, 1, 'sudah bayar', '66a70c24d4d8a'),
(54, 15, 1, 'sudah bayar', '66a70c24d4d8a'),
(56, 14, 8, 'sudah bayar', '66a70c71aa79a'),
(57, 14, 8, 'sudah bayar', '66a70cb030713'),
(58, 15, 7, 'sudah bayar', '66a70cd69805c'),
(59, 14, 1, 'sudah bayar', '66a87591580fa'),
(60, 15, 1, 'sudah bayar', '66a87591580fa'),
(65, 14, 1, 'sudah bayar', '66a882e3331ff'),
(66, 14, 1, 'sudah bayar', '66a882e3331ff'),
(67, 15, 1, 'sudah bayar', '66a882e3331ff'),
(68, 14, 1, 'sudah bayar', '66a8a62b899f3'),
(69, 15, 1, 'sudah bayar', '66a8a62b899f3'),
(73, 14, 2, 'sudah bayar', '66aa47aa97cf8'),
(74, 15, 2, 'sudah bayar', '66aa47aa97cf8'),
(75, 14, 2, 'sudah bayar', '66abb0ba657ac'),
(76, 14, 2, 'sudah bayar', '66abb0ba657ac'),
(77, 14, 2, 'sudah bayar', '66abb0ba657ac'),
(78, 15, 2, 'sudah bayar', '66abb0ba657ac'),
(84, 14, 6, 'sudah bayar', '66abf00231928'),
(92, 14, 8, 'sudah bayar', '66ad2ec34f260'),
(93, 14, 8, 'sudah bayar', '66ad2ec34f260'),
(94, 18, 8, 'sudah bayar', '66ad2ec34f260'),
(95, 15, 2, 'sudah bayar', '66ad3e187de4f'),
(96, 14, NULL, 'belum bayar', NULL),
(101, 15, NULL, 'belum bayar', NULL),
(102, 14, NULL, 'belum bayar', NULL),
(104, 15, NULL, 'belum bayar', NULL),
(105, 15, NULL, 'belum bayar', NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_keranjang`
-- (See below for the actual view)
--
CREATE TABLE `view_keranjang` (
`id_transaksi` int
,`status` varchar(255)
,`nama_produk` varchar(255)
,`harga_produk` int
,`foto_produk` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_transaksi`
-- (See below for the actual view)
--
CREATE TABLE `view_transaksi` (
`meja` int
,`status` varchar(255)
,`id_nota` text
,`nama_produk` varchar(255)
,`deskripsi_produk` text
,`harga_produk` int
);

-- --------------------------------------------------------

--
-- Structure for view `view_keranjang`
--
DROP TABLE IF EXISTS `view_keranjang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_keranjang`  AS SELECT `tb_transaksi`.`id_transaksi` AS `id_transaksi`, `tb_transaksi`.`status` AS `status`, `tb_produk`.`nama_produk` AS `nama_produk`, `tb_produk`.`harga_produk` AS `harga_produk`, `tb_produk`.`foto_produk` AS `foto_produk` FROM (`tb_transaksi` join `tb_produk` on((`tb_produk`.`id_produk` = `tb_transaksi`.`id_produk`)))  ;

-- --------------------------------------------------------

--
-- Structure for view `view_transaksi`
--
DROP TABLE IF EXISTS `view_transaksi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_transaksi`  AS SELECT `tb_transaksi`.`meja` AS `meja`, `tb_transaksi`.`status` AS `status`, `tb_transaksi`.`id_nota` AS `id_nota`, `tb_produk`.`nama_produk` AS `nama_produk`, `tb_produk`.`deskripsi_produk` AS `deskripsi_produk`, `tb_produk`.`harga_produk` AS `harga_produk` FROM (`tb_transaksi` join `tb_produk` on((`tb_transaksi`.`id_produk` = `tb_produk`.`id_produk`)))  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `tb_superadmin`
--
ALTER TABLE `tb_superadmin`
  ADD PRIMARY KEY (`id_superadmin`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `id_produk_2` (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_superadmin`
--
ALTER TABLE `tb_superadmin`
  MODIFY `id_superadmin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `tb_transaksi_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `tb_produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
