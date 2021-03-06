-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2022 at 10:30 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.0

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
(31, 0, 12, 800000, 1),
(0, 0, NULL, 250000, 0),
(0, 0, 116, 500000, 1),
(0, 0, 126, 500000, 1),
(0, 0, 127, 600000, 1),
(0, 0, 129, 500000, 1),
(0, 0, NULL, 250000, 0),
(0, 0, NULL, 250000, 0),
(0, 0, NULL, 250000, 0),
(0, 0, 132, 500000, 1),
(0, 0, 133, 500000, 1),
(0, 0, 134, 500000, 1),
(0, 0, NULL, 300000, 0),
(0, 0, 136, 500000, 1),
(0, 0, NULL, 250000, 0),
(0, 0, 138, 900000, 1),
(0, 0, 140, 500000, 1),
(0, 0, 142, 900000, 1),
(0, 13, 143, 500000, 1);

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
(2, 177788302, 168802290, 10000, 'Viettel', 1),
(8, 228335323, 440680663, 50000, 'MobiFone', 1),
(9, 538318684, 295565270, 500000, 'Vietnamobile', 1),
(10, 582278936, 359133685, 100000, 'MobiFone', 0),
(11, 195110676, 876906563, 100000, 'MobiFone', 0),
(12, 103135093, 622756217, 200000, 'Vinaphone', 1),
(13, 961999766, 213347098, 200000, 'Vinaphone', 1);

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
  `activate` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `username`, `password`, `fullname`, `phone`, `price`, `activate`) VALUES
(6, 'longnh00', '123456789', 'NGUY???N HO??NG LONG', 908395568, 94860000, 1),
(7, 'lamnh00', '123456', 'NGUY???N HO??NG L??M', 908395566, 2250000, 1),
(10, 'triduc', 'triduc', 'L?? Tr?? ?????c', 564321244, 200000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(255) NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_order` date NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sport` int(255) NOT NULL,
  `time` int(255) NOT NULL,
  `deposit` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activate` int(1) NOT NULL DEFAULT 1,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `fullname`, `phone`, `date_order`, `email`, `sport`, `time`, `deposit`, `description`, `activate`, `username`, `status`) VALUES
(126, 'NGUY???N HO??NG LONG', '908395568', '2022-01-08', NULL, 9, 7, '250000', NULL, 0, 'longnh00', 0),
(127, 'Nguy???n Th??? Th???o Nh??', '0907208722', '2022-01-08', 'nguyennhu4150@gmail.com', 10, 4, '300000', '', 0, '', 0),
(128, 'Nh???t B??ng', '0377025445', '2022-01-09', 'email@domain.com', 9, 2, '250000', '', 0, '', 0),
(129, 'NGUY???N HO??NG LONG', '908395568', '2022-01-09', NULL, 9, 6, '250000', NULL, 0, 'longnh00', 0),
(130, 'Tr???n Th??? Ki???u', '0907208755', '2022-01-09', 'nguyennhu4150@gmail.com', 9, 1, '250000', '', 0, '', 0),
(131, 'Ph???m B??ng B??ng', '0377025445', '2022-01-10', 'nguyennhu4150@gmail.com', 9, 1, '250000', '', 0, '', 0),
(132, 'D????ng M???ch', '0907208722', '2022-01-08', 'email@domain.com', 9, 1, '250000', '', 0, '', 0),
(133, 'Song Hye Kyo', '0907208722', '2022-01-08', 'email@domain.com', 9, 11, '250000', '', 0, '', 0),
(134, 'Nguy???n Th??? Th???o Nhi', '0377025445', '2022-01-09', 'email@domain.com', 9, 2, '250000', '', 0, '', 0),
(135, 'Nguy???n Th??? Th???o Nh??', '0377025445', '2022-01-09', 'nguyen@gmail.com', 10, 1, '300000', '', 0, '', 0),
(136, 'NGUY???N HO??NG LONG', '908395568', '2022-01-09', NULL, 9, 4, '250000', NULL, 0, 'longnh00', 0),
(137, 'Ph???m Long Tony', '0377025445', '2022-01-11', 'phamlongtony@gmail.com', 9, 5, '250000', 'S??? l?????ng ng?????i tham gia: 10', 0, '', 0),
(138, 'Nguy???n Th??? Hoa', '0377025445', '2022-01-12', 'email@domain.com', 12, 3, '450000', '', 0, '', 0),
(140, 'NGUY???N HO??NG LONG', '908395568', '2022-01-13', NULL, 9, 2, '250000', NULL, 0, 'longnh00', 0),
(141, 'NGUY???N HO??NG LONG', '908395568', '2022-01-14', NULL, 11, 1, '450000', NULL, 1, 'longnh00', 1),
(142, 'Nguy???n Th??? Th???o Nh??', '0907208755', '2022-01-11', 'email@domain.com', 12, 4, '450000', '', 0, '', 0),
(143, 'Ph???m B??ng B??ng', '0123566548', '2022-01-11', 'email@domain.com', 9, 2, '250000', '', 0, '', 0);

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
(9, 'S??n b??ng 5:5', 500000, 250000),
(12, 'S??n b??ng 7:7', 900000, 450000);

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
  `activate` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `username`, `password`, `fullname`, `email`, `phone`, `address`, `salary`, `role`, `activate`) VALUES
(5, 'nguyenthithaonhu', '276be985b1d3a3c2363eb71cd79f4a48', 'Nguy???n Th??? Th???o Nh??', 'nguyenthithaonhu@gmail.com', 123456789, '', 0, 1, 1),
(8, 'letriduc', '525c45d316d13b9a7f000c6ee805d98f', 'L?? Tr?? ?????c', 'letriduc@gmail.com', 377025449, '', 7500000, 1, 1),
(10, 'nguyentranminhhoa', '8769d024ebb61017c6001bd1570545cc', 'Nguy???n Tr???n Minh Hoa', 'nguyentranminhhoa@gmail.com', 129210101, '', 0, 2, 0),
(12, 'hoanglong', '7c5884bc1eff2d89aca0db9885164dda', 'Nguy???n Ho??ng Long', 'longnh00@gmail.com', 905123485, 'Th??nh ph??? H??? Ch?? Minh', 10000000, 2, 1),
(13, 'tranthikieu', '123456', 'Tr???n Th??? Ki???u', 'thikieu0123@gmail.com', 14725693, 'Qu???ng tr???', 10000000, 2, 1);

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
(12, '19:00:00', '20:00:00');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `card`
--
ALTER TABLE `card`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `sport`
--
ALTER TABLE `sport`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `time`
--
ALTER TABLE `time`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
