-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 26, 2021 lúc 03:48 PM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `oswa_inv3`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Áo'),
(2, 'Quần'),
(3, 'Váy');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kho`
--

CREATE TABLE `kho` (
  `id` int(11) NOT NULL,
  `idSP` int(11) NOT NULL,
  `inventory` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `kho`
--

INSERT INTO `kho` (`id`, `idSP`, `inventory`) VALUES
(1, 1, 6),
(2, 4, 20),
(3, 5, 30),
(4, 2, 60);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieunhap`
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
-- Đang đổ dữ liệu cho bảng `phieunhap`
--

INSERT INTO `phieunhap` (`id`, `idSupplier`, `total_cuc`, `total_chi`, `total_vai`, `gia_vai`, `gia_chi`, `gia_cuc`, `note`, `date`) VALUES
(1, 2, 12, 12, 12, 12, 12, 12, '', '2021-05-25'),
(2, 1, 120, 110, 100, 5000, 1200, 500, '', '2021-05-25'),
(3, 1, 1223, 45, 100, 500, 334, 10, '', '2021-05-23'),
(4, 2, 100, 76, 123, 5000, 2000, 100, '', '2021-05-20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `plansupply`
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
-- Cấu trúc bảng cho bảng `product`
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
-- Đang đổ dữ liệu cho bảng `product`
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
-- Cấu trúc bảng cho bảng `requestproduct`
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
-- Đang đổ dữ liệu cho bảng `requestproduct`
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
-- Cấu trúc bảng cho bảng `supplier`
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
-- Đang đổ dữ liệu cho bảng `supplier`
--

INSERT INTO `supplier` (`id`, `name`, `address`, `phone`, `email`, `status`) VALUES
(1, 'Công ty TNHH May Việt Nam', 'Phúc La, Hà Đông', '397652901', 'mayvn@gmail.com', 0),
(2, 'Công ty CP SX Phụ liệu may Hà Nội', 'Nhân Chính, Thanh Xuân, Hà Nội', '0329714640', 'mayhn@gmail.com', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_level` int(11) NOT NULL,
  `image` varchar(255) DEFAULT 'no_image.jpg',
  `status` int(1) NOT NULL,
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `user_level`, `image`, `status`, `last_login`) VALUES
(1, ' Admin User', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, 'no_image.jpg', 1, '2021-05-26 13:36:27'),
(2, 'Special User', 'special', 'ba36b97a41e7faf742ab09bf88405ac04f99599a', 2, 'no_image.jpg', 1, '2015-09-27 21:59:59'),
(3, 'Default User', 'user', '12dea96fec20593566ab75692c9949596833adc9', 3, 'no_image.jpg', 1, '2021-05-23 16:20:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_groups`
--

CREATE TABLE `user_groups` (
  `id` int(11) NOT NULL,
  `group_name` varchar(150) NOT NULL,
  `group_level` int(11) NOT NULL,
  `group_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `user_groups`
--

INSERT INTO `user_groups` (`id`, `group_name`, `group_level`, `group_status`) VALUES
(1, 'Admin', 1, 0),
(2, 'special', 2, 1),
(3, 'User', 3, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vatlieu`
--

CREATE TABLE `vatlieu` (
  `total_vai` int(11) NOT NULL,
  `total_chi` int(11) NOT NULL,
  `total_cuc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `vatlieu`
--

INSERT INTO `vatlieu` (`total_vai`, `total_chi`, `total_cuc`) VALUES
(223, 121, 1323);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `kho`
--
ALTER TABLE `kho`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idSP` (`idSP`);

--
-- Chỉ mục cho bảng `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idSupplier` (`idSupplier`);

--
-- Chỉ mục cho bảng `plansupply`
--
ALTER TABLE `plansupply`
  ADD KEY `id` (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idLoai` (`idLoai`);

--
-- Chỉ mục cho bảng `requestproduct`
--
ALTER TABLE `requestproduct`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idPro` (`idPro`);

--
-- Chỉ mục cho bảng `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_level` (`user_level`);

--
-- Chỉ mục cho bảng `user_groups`
--
ALTER TABLE `user_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `group_level` (`group_level`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `kho`
--
ALTER TABLE `kho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `phieunhap`
--
ALTER TABLE `phieunhap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `requestproduct`
--
ALTER TABLE `requestproduct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `user_groups`
--
ALTER TABLE `user_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `kho`
--
ALTER TABLE `kho`
  ADD CONSTRAINT `idSP` FOREIGN KEY (`idSP`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD CONSTRAINT `idSupplier` FOREIGN KEY (`idSupplier`) REFERENCES `supplier` (`id`);

--
-- Các ràng buộc cho bảng `plansupply`
--
ALTER TABLE `plansupply`
  ADD CONSTRAINT `id` FOREIGN KEY (`id`) REFERENCES `requestproduct` (`id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `idLoai` FOREIGN KEY (`idLoai`) REFERENCES `categories` (`id`);

--
-- Các ràng buộc cho bảng `requestproduct`
--
ALTER TABLE `requestproduct`
  ADD CONSTRAINT `idPro` FOREIGN KEY (`idPro`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_user` FOREIGN KEY (`user_level`) REFERENCES `user_groups` (`group_level`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
