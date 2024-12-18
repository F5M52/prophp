-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 18 ديسمبر 2024 الساعة 19:30
-- إصدار الخادم: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- بنية الجدول `brands`
--

CREATE TABLE `brands` (
  `bno` int(11) NOT NULL,
  `bname` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `brands`
--

INSERT INTO `brands` (`bno`, `bname`) VALUES
(1, 'wq'),
(2, 'ffd'),
(3, 'ffd'),
(4, 'ffd'),
(5, 'xx'),
(6, 'LG'),
(7, 'Samsung'),
(8, 'Apple');

-- --------------------------------------------------------

--
-- بنية الجدول `home`
--

CREATE TABLE `home` (
  `no` int(11) NOT NULL,
  `size` varchar(25) NOT NULL,
  `hz` int(11) NOT NULL,
  `qc` varchar(255) NOT NULL,
  `note` varchar(25) NOT NULL,
  `image` blob NOT NULL,
  `bno` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `home`
--

INSERT INTO `home` (`no`, `size`, `hz`, `qc`, `note`, `image`, `bno`) VALUES
(11, '24', 220, '2k', 'شاشه مكتبيه', 0x696d672f313733303735333030392dd8aad986d8b2d98ad984202831292e6a7067, 8),
(12, '27', 60, 'Full HD', 'شاشه منحنيه', 0x696d672f313733333137333332362d696d616765732e6a7067, 7);

-- --------------------------------------------------------

--
-- بنية الجدول `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `uname` varchar(25) NOT NULL,
  `pass` varchar(250) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `users`
--

INSERT INTO `users` (`id`, `uname`, `pass`, `name`, `email`, `level`) VALUES
(6, 'aa', '$2y$10$8yczmqmcuCQqIFebCHze5ujnJy4QU0xvybqT/xO17PbL5nZWg9MS2', '', 's@gmail.com', 1),
(7, 'ss', '$2y$10$sZM/CXOYFoZCP5JTVPxor.C/RnG01PmR8T61i/qiYBmIRBcc8CsxO', '', 'ss@gmail.com', 0),
(8, 'qq', '$2y$10$2JC.kVmxkxQCxHk7rQLZDukRnbP71jWgUsehdsjVNZ6rz.243VP8K', '', 'qq@gmail.com', 0),
(9, 'ali', '$2y$10$PMxZjsMH6TUA2MgaAMxqA.N4XPpiffPMKgQJLxBaV.2OMRaoBRddO', '', 'ali@gmail.com', 1),
(10, 'omar', '$2y$10$xbKpDGvl.kmJpi/DHQnMSOWo.mZGpv.J5DVII1cHLxuwaEFBS6L/2', '', 'aa@gmail.com', 0),
(11, 'omar', '$2y$10$3Pq9/8O00ZSTCcajR5eBY.BUNvO/NfIbBn6AdjwOeMfT2zCpJE6sG', '', 'aa@gmail.com', 0),
(12, 'xx', '$2y$10$oftkkNvd3pau4KyKDcs5Aexb8oV4RZICZZ6Bt5O5lnSmjSO9qY9vi', '', 'xx@gmail.com', 0),
(13, 'nawaf', '$2y$10$5yHm5lElqLolNXwhYHRS9.EbQIbRAq8lY8ss2t.c6l/XJZ5ts0kNm', '', 'nawaf@gmail.com', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`bno`);

--
-- Indexes for table `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `bno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `home`
--
ALTER TABLE `home`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
