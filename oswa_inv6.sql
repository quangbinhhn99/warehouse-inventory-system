-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2021 at 03:56 PM
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
-- Database: `oswa_inv6`
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
(1, 1, 6),
(2, 4, 20),
(3, 5, 30),
(4, 2, 60);

-- --------------------------------------------------------

--
-- Table structure for table `phieunhap`
--

CREATE TABLE `phieunhap` (
  `id` int(11) NOT NULL,
  `idSupplier` int(11) NOT NULL,
  `total_cuc` int(11) NOT NULL,
  `total_chi` int(11) NOT NULL,
  `total_vai` int(11) NOT NULL,
  `gia_vai` int(11) NOT NULL,
  `gia_chi` int(11) NOT NULL,
  `gia_cuc` int(11) NOT NULL,
  `note` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `phieunhap`
--

INSERT INTO `phieunhap` (`id`, `idSupplier`, `total_cuc`, `total_chi`, `total_vai`, `gia_vai`, `gia_chi`, `gia_cuc`, `note`, `date`) VALUES
(1, 2, 12, 12, 12, 12, 12, 12, '', '2021-05-25'),
(2, 1, 120, 110, 100, 5000, 1200, 500, '', '2021-05-25'),
(3, 1, 1223, 45, 100, 500, 334, 10, '', '2021-05-23'),
(4, 2, 100, 76, 123, 5000, 2000, 100, '', '2021-05-20');

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
(5, 3, 'Váy hoa', 10, 7, 5, 1),
(6, 2, ' Quần bò', 5, 4, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `requestproduct`
--

CREATE TABLE `requestproduct` (
  `id` int(11) NOT NULL,
  `sku` varchar(25) NOT NULL,
  `idPro` int(11) NOT NULL,
  `number_datHang` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `number_phanBo` int(11) NOT NULL,
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

INSERT INTO `requestproduct` (`id`, `sku`, `idPro`, `number_datHang`, `number`, `number_phanBo`, `number_finished`, `total_chi`, `total_vai`, `total_cuc`, `dateStart`, `dateEnd`, `status`, `note`) VALUES
(8, 'HB124', 1, 100, 100, 0, 0, 1000, 1000, 500, '2021-05-13', '2021-05-31', 0, ''),
(9, 'HJD723', 5, 36, 21, 0, 0, 210, 147, 105, '2021-05-13', '2021-05-25', 2, ''),
(10, 'NHG782', 2, 240, 240, 0, 0, 1200, 1200, 0, '2021-04-01', '2021-05-02', 2, 'áo lớp'),
(11, 'HYD332', 4, 12, 9, 0, 0, 60, 60, 24, '2021-05-24', '2021-05-31', 1, 'làm nhanh'),
(12, 'ABC723', 2, 100, 80, 0, 0, 400, 400, 0, '2021-05-13', '2021-06-01', 0, ''),
(13, 'HUJ871', 6, 40, 40, 0, 0, 200, 160, 80, '2021-05-07', '2021-06-05', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `name`, `address`, `phone`, `email`, `status`) VALUES
(1, 'Công ty TNHH May Việt Nam', 'Phúc La, Hà Đông', '397652901', 'mayvn@gmail.com', 0),
(2, 'Công ty CP SX Phụ liệu may Hà Nội', 'Nhân Chính, Thanh Xuân, Hà Nội', '0329714640', 'mayhn@gmail.com', 0);

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
(1, ' Admin User', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, 'no_image.jpg', 1, '2021-05-26 13:36:27', 0, '', 0),
(2, 'Special User', 'special', 'ba36b97a41e7faf742ab09bf88405ac04f99599a', 2, 'no_image.jpg', 1, '2015-09-27 21:59:59', 0, '', 0),
(3, 'Default User', 'user', '12dea96fec20593566ab75692c9949596833adc9', 3, 'no_image.jpg', 1, '2021-05-23 16:20:24', 0, '', 0);

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
(1, 'Admin', 1, 0),
(2, 'special', 2, 1),
(3, 'User', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `vatlieu`
--

CREATE TABLE `vatlieu` (
  `total_vai` int(11) NOT NULL,
  `total_chi` int(11) NOT NULL,
  `total_cuc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vatlieu`
--

INSERT INTO `vatlieu` (`total_vai`, `total_chi`, `total_cuc`) VALUES
(223, 121, 1323);

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
-- Indexes for table `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idSupplier` (`idSupplier`);

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
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `phieunhap`
--
ALTER TABLE `phieunhap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `requestproduct`
--
ALTER TABLE `requestproduct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_groups`
--
ALTER TABLE `user_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kho`
--
ALTER TABLE `kho`
  ADD CONSTRAINT `idSP` FOREIGN KEY (`idSP`) REFERENCES `product` (`id`);

--
-- Constraints for table `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD CONSTRAINT `idSupplier` FOREIGN KEY (`idSupplier`) REFERENCES `supplier` (`id`);

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
