-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 06 Jun 2019 pada 10.43
-- Versi Server: 5.7.24
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokokomputer`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` varchar(64) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `id_type` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama`, `id_type`, `harga`, `gambar`, `deskripsi`) VALUES
('5cc08fbfc32e8', 'ASUSsss', '', 9000000, '5cc08fbfc32e8.jpg', 'ini laptop asus terbaru'),
('5cc12553d5a04', 'Dell', '', 9000000, '5cc12553d5a04.jpg', 'laptop dell'),
('5cc9c3a490591', 'Toshiba', '', 6000000, '5cc9c3a490591.jpg', 'spek nya tinggi lho'),
('5cd3154f94df3', 'Acer P', '', 12000000, '5cd3154f94df3.jpg', 'ayo..ayoo dibeli'),
('5cd450e88fa1a', 'ASUS', '', 5000000, '5cd450e88fa1a.jpg', 'asus'),
('5cd4535aea07b', 'dell', '5', 1100000, '5cd4535aea07b.png', 'assdas'),
('5ce61af407dc4', 'acer', '6', 5000000, '5ce61af407dc4.png', 'notebook acer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `type_product`
--

CREATE TABLE `type_product` (
  `id_type` int(11) NOT NULL,
  `name_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `type_product`
--

INSERT INTO `type_product` (`id_type`, `name_type`) VALUES
(5, 'Macbook'),
(6, 'Notebook'),
(7, 'Notebook');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(3, 'user', 'ee11cbb19052e40b07aac0ca060c23ee'),
(4, 'mukhlis', '34cefd67a188a767177bad81e72bc2b2'),
(5, 'satriaJr610', ''),
(6, 'fauzi', '0bd9897bf12294ce35fdc0e21065c8a7');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `type_product`
--
ALTER TABLE `type_product`
  ADD PRIMARY KEY (`id_type`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `type_product`
--
ALTER TABLE `type_product`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
