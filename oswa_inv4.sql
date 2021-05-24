-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2021 at 12:17 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oswa_inv4`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Áo'),
(2, 'Quần'),
(3, 'Váy');

-- --------------------------------------------------------

--
-- Table structure for table `kho`
--

CREATE TABLE `kho` (
  `id` int(11) NOT NULL,
  `idSP` int(11) NOT NULL,
  `inventory` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kho`
--

INSERT INTO `kho` (`id`, `idSP`, `inventory`) VALUES
(1, 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `kho_groups`
--

CREATE TABLE `kho_groups` (
  `id` int(11) NOT NULL,
  `group_kho` varchar(120) NOT NULL,
  `group_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kho_groups`
--

INSERT INTO `kho_groups` (`id`, `group_kho`, `group_level`) VALUES
(1, 'vay', 1);

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(11) UNSIGNED NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `plansupply`
--

CREATE TABLE `plansupply` (
  `id` int(11) NOT NULL,
  `total_number` int(11) NOT NULL,
  `total_chi` int(11) NOT NULL,
  `total_vai` int(11) NOT NULL,
  `total_cuc` int(11) NOT NULL,
  `finished_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `idLoai` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `chi` int(11) NOT NULL,
  `vai` int(11) NOT NULL,
  `cuc` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `idLoai`, `name`, `chi`, `vai`, `cuc`, `status`) VALUES
(1, 1, 'Áo sơ mi', 10, 10, 5, 1),
(2, 1, 'Áo thun', 5, 5, 0, 1),
(3, 2, 'Quần vải', 5, 5, 2, 1),
(4, 2, 'Quần kaki', 5, 5, 2, 1),
(5, 3, 'Váy hoa', 10, 7, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `requestproduct`
--

CREATE TABLE `requestproduct` (
  `id` int(11) NOT NULL,
  `idPro` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `number_finished` int(11) NOT NULL,
  `total_chi` int(11) NOT NULL,
  `total_vai` int(11) NOT NULL,
  `total_cuc` int(11) NOT NULL,
  `dateStart` date NOT NULL,
  `dateEnd` date NOT NULL,
  `status` int(11) NOT NULL,
  `note` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requestproduct`
--

INSERT INTO `requestproduct` (`id`, `idPro`, `number`, `number_finished`, `total_chi`, `total_vai`, `total_cuc`, `dateStart`, `dateEnd`, `status`, `note`) VALUES
(1, 1, 100, 100, 1000, 1000, 500, '2021-05-23', '2021-05-31', 1, 'làm nhanh'),
(2, 4, 10, 0, 50, 50, 20, '2021-05-01', '2021-05-31', 0, ''),
(3, 2, 120, 120, 600, 600, 0, '2021-05-01', '2021-05-21', 1, 'oke'),
(4, 3, 39, 0, 195, 195, 78, '2021-05-01', '2021-05-22', 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) UNSIGNED NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `price` decimal(25,2) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_level` int(11) NOT NULL,
  `image` varchar(255) DEFAULT 'no_image.jpg',
  `status` int(1) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `so_cmt` int(150) NOT NULL,
  `que_quan` varchar(100) NOT NULL,
  `salary` int(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `user_level`, `image`, `status`, `last_login`, `so_cmt`, `que_quan`, `salary`) VALUES
(1, 'Hieu', 'Admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, 'no_image.jpg', 1, '2021-05-24 06:12:31', 123456789, 'Nghe An', 8000000),
(2, 'Bích', 'Special', 'ba36b97a41e7faf742ab09bf88405ac04f99599a', 2, 'no_image.jpg', 1, '2021-05-23 16:21:11', 987654258, 'Thái Bình', 7000000),
(7, 'Bình', 'quangbinh', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 'no_image.jpg', 1, '2021-05-24 06:06:48', 1445635845, 'Thanh hóa', 6500000);

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

CREATE TABLE `user_groups` (
  `id` int(11) NOT NULL,
  `group_name` varchar(150) NOT NULL,
  `group_level` int(11) NOT NULL,
  `group_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_groups`
--

INSERT INTO `user_groups` (`id`, `group_name`, `group_level`, `group_status`) VALUES
(1, 'Quan ly', 1, 0),
(2, 'Nhan vien', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `vattu`
--

CREATE TABLE `vattu` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vattu`
--

INSERT INTO `vattu` (`id`, `name`) VALUES
(1, 'Vải hoa'),
(2, 'Chỉ trắng'),
(3, 'chỉ đỏ'),
(4, 'cúc tròn'),
(5, 'vải trơn'),
(6, 'Cúc vuông to'),
(7, 'Chỉ đen');

-- --------------------------------------------------------

--
-- Table structure for table `vattu_groups`
--

CREATE TABLE `vattu_groups` (
  `id` int(11) NOT NULL,
  `group_vattu` varchar(150) NOT NULL,
  `group_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vattu_groups`
--

INSERT INTO `vattu_groups` (`id`, `group_vattu`, `group_level`) VALUES
(1, 'm', 1),
(2, 'dm', 2),
(3, 'cm', 3);

-- --------------------------------------------------------

--
-- Table structure for table `vattu_product`
--

CREATE TABLE `vattu_product` (
  `idVattu` int(11) NOT NULL,
  `idProduct` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vattu_product`
--

INSERT INTO `vattu_product` (`idVattu`, `idProduct`) VALUES
(4, 1),
(4, 1),
(2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kho`
--
ALTER TABLE `kho`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idSP` (`idSP`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `plansupply`
--
ALTER TABLE `plansupply`
  ADD KEY `id` (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idLoai` (`idLoai`);

--
-- Indexes for table `requestproduct`
--
ALTER TABLE `requestproduct`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idPro` (`idPro`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_level` (`user_level`);

--
-- Indexes for table `user_groups`
--
ALTER TABLE `user_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `group_level` (`group_level`);

--
-- Indexes for table `vattu`
--
ALTER TABLE `vattu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vattu_product`
--
ALTER TABLE `vattu_product`
  ADD KEY `idVattu` (`idVattu`),
  ADD KEY `idProduct` (`idProduct`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kho`
--
ALTER TABLE `kho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `requestproduct`
--
ALTER TABLE `requestproduct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_groups`
--
ALTER TABLE `user_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vattu`
--
ALTER TABLE `vattu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kho`
--
ALTER TABLE `kho`
  ADD CONSTRAINT `idSP` FOREIGN KEY (`idSP`) REFERENCES `product` (`id`);

--
-- Constraints for table `plansupply`
--
ALTER TABLE `plansupply`
  ADD CONSTRAINT `id` FOREIGN KEY (`id`) REFERENCES `requestproduct` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `idLoai` FOREIGN KEY (`idLoai`) REFERENCES `categories` (`id`);

--
-- Constraints for table `requestproduct`
--
ALTER TABLE `requestproduct`
  ADD CONSTRAINT `idPro` FOREIGN KEY (`idPro`) REFERENCES `product` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_user` FOREIGN KEY (`user_level`) REFERENCES `user_groups` (`group_level`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
