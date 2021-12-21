-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 19, 2021 lúc 08:46 AM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `cnpm`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `card`
--

CREATE TABLE `card` (
  `id` int(255) NOT NULL,
  `seri` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `price` int(255) NOT NULL,
  `network` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `card`
--

INSERT INTO `card` (`id`, `seri`, `number`, `price`, `network`, `status`) VALUES
(1, 947832693, 621225988, 10000, 'Viettel', 1),
(2, 177788302, 168802290, 10000, 'Viettel', 0),
(8, 228335323, 440680663, 50000, 'MobiFone', 0),
(9, 538318684, 295565270, 500000, 'Vietnamobile', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` int(255) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `activate` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id`, `username`, `password`, `fullname`, `phone`, `activate`) VALUES
(1, 'levanly', '6f5246685c22313f40b520f53644ec6b', 'Lê Vạn Lý', 982731453, 1),
(2, 'tranthihoadao', 'd9b39d441e3c8c7cac5d2fd831758953', 'Trần Thị Hoa Đào', 2147483647, 1),
(4, 'nguyenthilieu', '017a66440c1cb6e62e469d25f2ce13ec', 'Nguyễn Thị Liễu', 1827362843, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `salary` int(255) NOT NULL,
  `role` int(1) NOT NULL,
  `activate` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `staff`
--

INSERT INTO `staff` (`id`, `username`, `password`, `fullname`, `email`, `phone`, `address`, `salary`, `role`, `activate`) VALUES
(5, 'nguyenthithaonhu', '276be985b1d3a3c2363eb71cd79f4a48', 'Nguyễn Thị Thảo Như', 'nguyenthithaonhu@gmail.com', 123456789, '', 0, 1, 1),
(8, 'letriduc', '525c45d316d13b9a7f000c6ee805d98f', 'Lê Trí Đức', 'letriduc@gmail.com', 377025449, '', 0, 2, 1),
(10, 'nguyentranminhhoa', '8769d024ebb61017c6001bd1570545cc', 'Nguyễn Trần Minh Hoa', 'nguyentranminhhoa@gmail.com', 129210101, '', 0, 2, 1),
(11, 'nguyenmyanh', 'fe37bb4e47f0c5f88b1dc3987acea7ad', 'Nguyễn Mỹ Anh', 'nguyenmyanh@gmail.com', 129210101, '', 0, 1, 1),
(12, 'nguyenquocdat', '727ae7fec3a92eaeb2ab45e178cc58a6', 'Nguyễn Quốc Đạt', NULL, NULL, NULL, 0, 1, 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `card`
--
ALTER TABLE `card`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
