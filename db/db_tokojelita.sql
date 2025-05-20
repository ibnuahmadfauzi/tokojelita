-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2025 at 05:27 PM
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
-- Database: `db_tokojelita`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `icon` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`, `icon`) VALUES
(1, 'Celana Panjang & Legging', '1.png'),
(2, 'Celana Pendek', '2.png'),
(3, 'Ikat Pinggang', '3.png'),
(4, 'Dress', '4.png'),
(5, 'Jumpsuit, Playsuit & Overall', '5.png'),
(6, 'Set', '6.png');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `toko_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `terjual` int(11) NOT NULL,
  `gambar` varchar(256) NOT NULL,
  `link` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama`, `toko_id`, `kategori_id`, `harga`, `diskon`, `terjual`, `gambar`, `link`) VALUES
(1, 'GFS SR ZENA HIGHWAIST KULOT', 1, 1, 15000, 0, 20000, 'https://down-id.img.susercontent.com/file/sg-11134201-22120-vq0gvsjpnwkvc1_tn.webp', 'https://shopee.co.id/GFS-SR-ZENA-HIGHWAIST-KULOT-i.5825746.23210081967'),
(2, 'GFS SR CERISTA HORNET KNIT HIGHWAIST PANTS', 1, 1, 23500, 0, 15000, 'https://down-id.img.susercontent.com/file/id-11134207-7r98y-llk09l970dpl03_tn.webp', 'https://shopee.co.id/GFS-SR-CERISTA-HORNET-KNIT-HIGHWAIST-PANTS-i.5825746.12699170567'),
(3, 'GFS LUXY PANTS CELANA ANTI KUSUT PREMIUM', 1, 1, 58000, 0, 2600, 'https://down-id.img.susercontent.com/file/id-11134207-7rasb-m3fwx5jw5tjw67_tn.webp', 'https://shopee.co.id/GFS-LUXY-PANTS-CELANA-ANTI-KUSUT-PREMIUM-i.5825746.26906483419'),
(4, 'GFS KEY KNIT PANTS', 1, 1, 28500, 0, 30000, 'https://down-id.img.susercontent.com/file/5aa257a728cd1915bd76a26064afbcd8_tn.webp', 'https://shopee.co.id/GFS-KEY-KNIT-PANTS-i.5825746.15258485781'),
(5, 'GFS SR JENIA FLEECE HOTPANTS CELANA PENDEK', 1, 2, 19500, 0, 50000, 'https://down-id.img.susercontent.com/file/sg-11134201-22100-y0qu0qt3xfiv78_tn.webp', 'https://shopee.co.id/GFS-SR-JENIA-FLEECE-HOTPANTS-CELANA-PENDEK-i.5825746.20853150929'),
(6, 'GFS SR KYO CREPE SHORT HOMEY PANTS', 1, 2, 15000, 0, 40000, 'https://down-id.img.susercontent.com/file/dfbb4c62f3453b5757cb4aacf15e5452_tn.webp', 'https://shopee.co.id/GFS-SR-KYO-CREPE-SHORT-HOMEY-PANTS-i.5825746.16064069007'),
(7, 'GFS MIMON PANTS', 1, 2, 24000, 0, 498, 'https://down-id.img.susercontent.com/file/id-11134207-7rasd-m1miud3m5jdodd_tn.webp', 'https://shopee.co.id/GFS-MIMON-PANTS-i.5825746.28314742146'),
(8, 'GFS SR MUNI MUNIKO HOTPANTS', 1, 2, 7500, 0, 30000, 'https://down-id.img.susercontent.com/file/5726bfe352c5957ff315897155d7ceb0_tn.webp', 'https://shopee.co.id/GFS-SR-MUNI-MUNIKO-HOTPANTS-i.5825746.4413856612'),
(9, 'GFS AT CASSIDY BELT', 1, 3, 20500, 0, 2000, 'https://down-id.img.susercontent.com/file/e987958b733180ba14bce080505b3384_tn.webp', 'https://shopee.co.id/GFS-AT-CASSIDY-BELT-i.5825746.11954508451'),
(10, 'GFS SR SMOCKED DRESS', 1, 4, 29999, 0, 15000, 'https://down-id.img.susercontent.com/file/id-11134207-7r98o-lm2lyt3hz89tc6_tn.webp', 'https://shopee.co.id/GFS-SR-SMOCKED-DRESS-i.5825746.22255868922'),
(11, 'GFS SR MARTHA DRESS RIB', 1, 4, 25000, 0, 50000, 'https://down-id.img.susercontent.com/file/id-11134207-7r98u-llq1z10xwxbf58_tn.webp', 'https://shopee.co.id/GFS-SR-MARTHA-DRESS-RIB-i.5825746.20784210578'),
(12, 'GFS NAPOLY DRESS', 1, 4, 25000, 0, 1400, 'https://down-id.img.susercontent.com/file/id-11134207-7rase-m0jmbxg420bk91_tn.webp', 'https://shopee.co.id/GFS-NAPOLY-DRESS-i.5825746.29962203001'),
(13, 'GFS SR FINELY APRIL KNIT INNER SPAN DRESS', 1, 4, 23000, 0, 60000, 'https://down-id.img.susercontent.com/file/b6efa34595fa8c9b1fc13254f8306233_tn.webp', 'https://shopee.co.id/GFS-SR-FINELY-APRIL-KNIT-INNER-SPAN-DRESS-i.5825746.19837785806'),
(14, 'GFS MOLI OVERALL', 1, 5, 41500, 0, 5200, 'https://down-id.img.susercontent.com/file/id-11134207-7r98y-lnjrny864jnr36_tn.webp', 'https://shopee.co.id/GFS-MOLI-OVERALL-i.5825746.16699417683'),
(15, 'GFS MORNING BUBBLE SET', 1, 6, 30000, 0, 1500, 'https://down-id.img.susercontent.com/file/id-11134207-7r98p-lu78w3yd17ys4d_tn.webp', 'https://shopee.co.id/GFS-MORNING-BUBBLE-SET-i.5825746.25474628634'),
(16, 'GFS X MEGA.WD BONRY SET DRESS PLISKET', 1, 6, 50500, 0, 503, 'https://down-id.img.susercontent.com/file/id-11134207-7rbk9-m8vk7twp4izh37_tn.webp', 'https://shopee.co.id/GFS-X-MEGA.WD-BONRY-SET-DRESS-PLISKET-i.5825746.27184416058'),
(17, 'GFS SR LOREN SET', 1, 6, 39999, 0, 35000, 'https://down-id.img.susercontent.com/file/id-11134207-7r990-lmzlvayc1u9i8d_tn.webp', 'https://shopee.co.id/GFS-SR-LOREN-SET-i.5825746.22183715614'),
(18, 'GFS SR GIA ONESET SERUT TALI KNIT SETELAN WANITA', 1, 6, 39500, 0, 14000, 'https://down-id.img.susercontent.com/file/id-11134207-7r990-lym048f0b3jh8b_tn.webp', 'https://shopee.co.id/GFS-SR-GIA-ONESET-SERUT-TALI-KNIT-SETELAN-WANITA-i.5825746.28057081429');

-- --------------------------------------------------------

--
-- Table structure for table `toko`
--

CREATE TABLE `toko` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `toko`
--

INSERT INTO `toko` (`id`, `nama`) VALUES
(1, 'Girlfashionstory Official Shop');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`) VALUES
(1, 'Joseph Walker', 'josephwalker', '12345678'),
(2, 'Alice Smith', 'alicesmith', '12345678'),
(3, 'Samuel Johnson', 'samueljohnson', '12345678'),
(4, 'Emily Davis', 'emilydavis', '12345678'),
(5, 'James Lopez', 'jameslopez', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `user_admin`
--

CREATE TABLE `user_admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_admin`
--

INSERT INTO `user_admin` (`id`, `nama`, `username`, `password`) VALUES
(1, 'Administrator', 'admin', 'admin123'),
(2, 'SuperAdmin', 'sadmin', 'sadmin123');

-- --------------------------------------------------------

--
-- Table structure for table `user_produk_rating`
--

CREATE TABLE `user_produk_rating` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `produk_id` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_produk_rating`
--

INSERT INTO `user_produk_rating` (`id`, `user_id`, `produk_id`, `rating`) VALUES
(1, 1, 1, 5),
(2, 1, 2, 4),
(3, 2, 1, 4),
(4, 2, 2, 5),
(5, 2, 3, 3),
(6, 3, 3, 5),
(7, 3, 4, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_admin`
--
ALTER TABLE `user_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_produk_rating`
--
ALTER TABLE `user_produk_rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `produk_id` (`produk_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `toko`
--
ALTER TABLE `toko`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_admin`
--
ALTER TABLE `user_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_produk_rating`
--
ALTER TABLE `user_produk_rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_produk_rating`
--
ALTER TABLE `user_produk_rating`
  ADD CONSTRAINT `user_produk_rating_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `user_produk_rating_ibfk_2` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
