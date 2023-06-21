-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2018 at 05:23 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `userdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(4) NOT NULL,
  `class` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `class`) VALUES
(1, 501),
(2, 502),
(3, 503),
(4, 504),
(5, 505),
(6, 506),
(7, 601),
(8, 602),
(9, 603),
(10, 604),
(11, 605),
(12, 606);

-- --------------------------------------------------------

--
-- Table structure for table `commenttbl`
--

CREATE TABLE `commenttbl` (
  `id` int(11) NOT NULL,
  `link_id` int(11) NOT NULL,
  `comment` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `commenttbl`
--

INSERT INTO `commenttbl` (`id`, `link_id`, `comment`, `name`) VALUES
(15, 69, 'vava', 'Harit504 Chawalitbenja'),
(16, 69, 'bbbb', 'Harit504 Chawalitbenja'),
(17, 69, 'oiupoij;oij', 'Harit504 Chawalitbenja'),
(18, 67, 'boasa', 'Harit504 Chawalitbenja'),
(19, 67, 'boascasc', 'Harit504 Chawalitbenja'),
(20, 69, 'sbsbsb', 'Harit504 Chawalitbenja'),
(21, 67, 'Bossasd', 'Harit504 Chawalitbenja'),
(22, 91, 'boss', 'Harit504 Chawalitbenja'),
(23, 102, 'bossasdasdasd', 'Harit504 Chawalitbenja'),
(24, 102, 'vhv\r\n', 'Harit5 Chawalitbenja');

-- --------------------------------------------------------

--
-- Table structure for table `usertbl`
--

CREATE TABLE `usertbl` (
  `id` int(4) NOT NULL,
  `user` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` int(40) NOT NULL,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `usertbl`
--

INSERT INTO `usertbl` (`id`, `user`, `password`, `name`, `status`, `class`) VALUES
(31, 'admin', 1234, 'admin', 'admin', 0),
(32, 'teacher6', 1234, 'Harit6 Chawalitbenja', 'teacher', 6),
(33, 'student504', 1234, 'Harit504 Chawalitbenja', 'student', 504),
(41, 'teacher5', 1234, 'Harit5 Chawalitbenja', 'teacher', 5);

-- --------------------------------------------------------

--
-- Table structure for table `worktbl`
--

CREATE TABLE `worktbl` (
  `id` int(4) NOT NULL,
  `title` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` int(3) NOT NULL,
  `date` date NOT NULL,
  `num_people` int(2) NOT NULL,
  `currentdatetime` datetime NOT NULL,
  `file` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `worktbl`
--

INSERT INTO `worktbl` (`id`, `title`, `detail`, `name`, `class`, `date`, `num_people`, `currentdatetime`, `file`) VALUES
(99, 'Boss', 'Jckdkhdksjf', 'Harit5 Chawalitbenja', 504, '2018-02-28', 0, '2018-01-31 17:41:03', ''),
(100, 'Uufueje', 'Igiejjfufr', 'Harit5 Chawalitbenja', 504, '2018-02-28', 0, '2018-01-31 17:43:07', '20180130_104215.jpg'),
(102, 'Boss', 'Uduufiw', 'Harit5 Chawalitbenja', 504, '2018-01-31', 0, '2018-01-31 17:47:22', '0'),
(103, 'ผลสอบ', 'ให้ไปทำการบ้านมา', 'Harit5 Chawalitbenja', 504, '2018-02-28', 0, '2018-01-31 17:49:02', '1516774220292.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commenttbl`
--
ALTER TABLE `commenttbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usertbl`
--
ALTER TABLE `usertbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `password` (`password`),
  ADD KEY `user` (`user`),
  ADD KEY `password_2` (`password`),
  ADD KEY `password_3` (`password`);

--
-- Indexes for table `worktbl`
--
ALTER TABLE `worktbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `commenttbl`
--
ALTER TABLE `commenttbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `usertbl`
--
ALTER TABLE `usertbl`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `worktbl`
--
ALTER TABLE `worktbl`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
