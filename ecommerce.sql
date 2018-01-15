-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 15, 2018 at 12:18 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `ID` int(11) NOT NULL,
  `name` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `parent` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`ID`, `name`, `parent`) VALUES
(1, 'Televisi', ''),
(2, 'Smart TV', '1'),
(3, 'TV LED', '1'),
(4, 'Mesin Cuci', ''),
(5, 'Laptop Gaming', '4'),
(6, 'Laptop Umum', '4'),
(7, 'MacBook', '4'),
(8, 'Lemari Es', ''),
(9, 'Headphone & Headset', '8'),
(10, 'MP3/MP4', '8'),
(11, 'Hallo', '');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ID` int(11) NOT NULL,
  `name` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(800) COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(255) NOT NULL,
  `photo` varchar(900) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ID`, `name`, `description`, `category`, `price`, `photo`) VALUES
(1, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(3, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(4, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(5, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(6, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(7, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(8, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(9, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(10, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(11, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(12, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(13, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(14, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(15, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(16, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(17, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(18, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(19, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(20, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(21, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(22, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(23, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(24, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(25, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(26, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(27, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(28, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(29, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(30, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(31, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(32, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(33, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(34, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(35, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(36, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(37, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(38, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(39, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(40, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(41, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(42, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(43, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(44, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(45, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(46, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(47, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(48, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(49, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(50, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(51, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(52, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(53, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(54, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(55, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(56, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(57, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(58, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(59, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(60, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(61, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(62, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(63, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(64, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(65, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(66, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(67, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(68, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(69, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(70, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(71, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(72, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(73, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(74, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(75, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(76, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(77, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(78, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(79, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(80, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(81, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(82, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(83, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(84, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(85, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(86, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(87, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(88, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(89, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(90, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(91, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(92, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(93, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(94, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(95, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(96, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(97, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(98, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(99, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(100, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(101, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(102, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(103, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(104, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(105, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(106, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(107, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(108, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(109, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(110, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg'),
(111, 'Lukisan Pemandangan', 'Sebuah karya dari seseorang', '1', 1000000, '1515896214.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `ID` int(11) NOT NULL,
  `s_key` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `s_val` varchar(700) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`ID`, `s_key`, `s_val`) VALUES
(1, 'site_name', 'Pelangi Elektronik'),
(2, 'site_desc', 'Shop Anywhere'),
(3, 'site_admin', '1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `telp` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(300) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `username`, `fullname`, `password`, `email`, `telp`, `photo`) VALUES
(1, 'admin', 'Administrator', '$2y$10$bgP2FIzQ6rWOw6RtPAgTG.C6Ur1XtHw5DVvI992G4uT2isN7E7Zqi', 'admin@info.net', '0', 'assets/photo/profile/admin.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Main` (`s_key`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
