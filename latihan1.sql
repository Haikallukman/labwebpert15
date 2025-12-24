-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 22, 2025 at 05:53 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `latihan1`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_barang`
--

CREATE TABLE `data_barang` (
  `id_barang` int(10) NOT NULL,
  `kategori` varchar(30) DEFAULT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `harga_beli` decimal(10,0) DEFAULT NULL,
  `harga_jual` decimal(10,0) DEFAULT NULL,
  `stok` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_barang`
--

INSERT INTO `data_barang` (`id_barang`, `kategori`, `nama`, `gambar`, `harga_beli`, `harga_jual`, `stok`) VALUES
(1, 'Hand Phone', 'HP Samsung Android', 'gambar/hp_samsung.jpg', 2000000, 2400000, 5),
(2, 'Hand Phone', 'HP Xiaomi Android', 'gambar/hp_xiaomi.jpg', 1000000, 1400000, 5),
(3, 'Hand Phone', 'HP OPPO Android', 'gambar/hp_oppo.jpg', 1800000, 2300000, 5),
(6, 'Hand Phone', 'HP Poco Android', 'gambar/hp_poco.jpg', 5000000, 3400000, 5),
(7, 'Hand Phone', 'HP Vivo Android', 'gambar/3b66c5c261b5abd5f1727dbfa964ce39.png', 5000000, 6000000, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_barang`
--
ALTER TABLE `data_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_barang`
--
ALTER TABLE `data_barang`
  MODIFY `id_barang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
