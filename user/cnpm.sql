-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jan 07, 2022 at 02:18 PM
-- Server version: 5.7.34
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cnpm`
--

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` int(255) NOT NULL,
  `staff` int(255) NOT NULL,
  `customer` int(255) DEFAULT NULL,
  `total_bill` int(255) NOT NULL,
  `activate` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `staff`, `customer`, `total_bill`, `activate`) VALUES
(25, 0, NULL, 500000, 0),
(26, 0, 16, 600000, 1),
(27, 0, 11, 500000, 1),
(28, 0, NULL, 500000, 0),
(29, 0, NULL, 300000, 0),
(30, 0, NULL, 300000, 0),
(31, 0, 12, 800000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `card`
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
-- Dumping data for table `card`
--

INSERT INTO `card` (`id`, `seri`, `number`, `price`, `network`, `status`) VALUES
(1, 947832693, 621225988, 10000, 'Viettel', 1),
(2, 177788302, 168802290, 10000, 'Viettel', 0),
(8, 228335323, 440680663, 50000, 'MobiFone', 0),
(9, 538318684, 295565270, 500000, 'Vietnamobile', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(255) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `price` int(255) DEFAULT NULL,
  `activate` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `username`, `password`, `fullname`, `phone`, `price`, `activate`) VALUES
(1, 'levanly', '6f5246685c22313f40b520f53644ec6b', 'Lê Vạn Lý', 982731453, 2900000, 1),
(2, 'tranthihoadao', 'd9b39d441e3c8c7cac5d2fd831758953', 'Trần Thị Hoa Đào', 2147483647, 300000, 1),
(4, 'nguyenthilieu', '017a66440c1cb6e62e469d25f2ce13ec', 'Nguyễn Thị Liễu', 1827362843, 1000000, 0),
(5, 'thikieu', '721c7b2860f443bd4f8eaf2681233608', 'Trần Thị Kiều', 564321244, NULL, 1),
(6, 'unhie11', '329b862923632b6d9a1cad64a98a3773', 'Nguyễn Trần Minh Hoa', 907208755, NULL, 1),
(7, 'longnh00', '123456', 'NGUYỄN HOÀNG LONG', 908395568, 4000000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(255) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_order` date NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sport` int(255) NOT NULL,
  `time` int(255) NOT NULL,
  `deposit` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activate` int(1) NOT NULL DEFAULT '1',
  `status` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `username`, `fullname`, `phone`, `date_order`, `email`, `sport`, `time`, `deposit`, `description`, `activate`, `status`) VALUES
(20, 'longnh00', 'NGUYỄN HOÀNG LONG', '908395568', '2022-01-08', NULL, 9, 1, '250000', NULL, 1, 1),
(21, 'longnh00', 'NGUYỄN HOÀNG LONG', '908395568', '2022-01-08', NULL, 9, 2, '250000', NULL, 1, 1),
(22, 'longnh00', 'NGUYỄN HOÀNG LONG', '908395568', '2022-01-08', NULL, 9, 3, '250000', NULL, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sport`
--

CREATE TABLE `sport` (
  `id` int(255) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(255) NOT NULL,
  `deposit` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sport`
--

INSERT INTO `sport` (`id`, `name`, `price`, `deposit`) VALUES
(9, 'Sân bóng 5:5', 500000, 250000),
(10, 'Sân bóng 10:10', 600000, 300000),
(11, 'Sân 7:7', 800000, 400000);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
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
  `activate` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `username`, `password`, `fullname`, `email`, `phone`, `address`, `salary`, `role`, `activate`) VALUES
(5, 'nguyenthithaonhu', '276be985b1d3a3c2363eb71cd79f4a48', 'Nguyễn Thị Thảo Như', 'nguyenthithaonhu@gmail.com', 123456789, '', 0, 1, 1),
(8, 'letriduc', '525c45d316d13b9a7f000c6ee805d98f', 'Lê Trí Đức', 'letriduc@gmail.com', 377025449, '', 7500000, 1, 0),
(10, 'nguyentranminhhoa', '8769d024ebb61017c6001bd1570545cc', 'Nguyễn Trần Minh Hoa', 'nguyentranminhhoa@gmail.com', 129210101, '', 0, 2, 0),
(11, 'nguyenmyanh', 'fe37bb4e47f0c5f88b1dc3987acea7ad', 'Nguyễn Mỹ Anh', 'nguyenmyanh@gmail.com', 129210101, '', 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `time`
--

CREATE TABLE `time` (
  `id` int(255) NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `time`
--

INSERT INTO `time` (`id`, `start`, `end`) VALUES
(1, '06:00:00', '07:00:00'),
(2, '07:00:00', '08:00:00'),
(3, '08:00:00', '09:00:00'),
(4, '09:00:00', '10:00:00'),
(5, '10:00:00', '11:00:00'),
(6, '14:00:00', '15:00:00'),
(7, '15:00:00', '16:00:00'),
(8, '16:00:00', '17:00:00'),
(9, '17:00:00', '18:00:00'),
(10, '18:00:00', '19:00:00'),
(11, '19:00:00', '20:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sport`
--
ALTER TABLE `sport`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `time`
--
ALTER TABLE `time`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `card`
--
ALTER TABLE `card`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `sport`
--
ALTER TABLE `sport`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `time`
--
ALTER TABLE `time`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
