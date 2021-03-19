-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2021 at 10:00 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dummy`
--

-- --------------------------------------------------------

--
-- Table structure for table `dummy_data`
--

CREATE TABLE `dummy_data` (
  `id` int(11) NOT NULL,
  `emp_id` varchar(255) NOT NULL,
  `date` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dummy_data`
--

INSERT INTO `dummy_data` (`id`, `emp_id`, `date`, `month`, `year`, `time`) VALUES
(1, 'C542', 14, 3, 2021, '07:00:32'),
(2, 'C406', 14, 3, 2021, '07:03:45'),
(3, 'C563', 14, 3, 2021, '07:16:57'),
(4, 'S994', 14, 3, 2021, '09:32:17'),
(5, 'P220', 14, 3, 2021, '09:33:34'),
(6, 'P139', 14, 3, 2021, '09:35:24'),
(7, 'S656', 14, 3, 2021, '09:36:00'),
(8, 'S130', 14, 3, 2021, '09:42:12'),
(9, 'C542', 14, 3, 2021, '02:30:13'),
(10, 'S656', 14, 3, 2021, '02:01:11'),
(11, 'C406', 14, 3, 2021, '02:03:35'),
(12, 'C563', 14, 3, 2021, '02:04:37'),
(13, 'S994', 14, 3, 2021, '14:05:11'),
(14, 'P220', 14, 3, 2021, '02:05:30'),
(15, 'P139', 14, 3, 2021, '02:18:12'),
(16, 'C359', 14, 3, 2021, '07:00:00'),
(17, 'C997', 14, 3, 2021, '07:01:21'),
(18, 'C119', 14, 3, 2021, '07:02:34'),
(19, 'C620', 14, 3, 2021, '07:34:12'),
(20, 'C359', 15, 3, 2021, '02:30:23'),
(21, 'C620', 15, 3, 2021, '02:32:11'),
(22, 'C119', 15, 3, 2021, '02:36:45'),
(23, 'C417', 15, 3, 2021, '07:03:34'),
(24, 'C542', 15, 3, 2021, '07:04:32'),
(25, 'C563', 15, 3, 2021, '07:05:43'),
(26, 'S994', 15, 3, 2021, '09:30:17'),
(27, 'C542', 14, 3, 2021, '01:30:11'),
(28, 'C406', 14, 3, 2021, '01:32:12'),
(29, 'C563', 14, 3, 2021, '01:00:11'),
(30, 'S994', 14, 3, 2021, '13:30:13'),
(31, 'P220', 14, 3, 2021, '01:32:11'),
(32, 'P139', 14, 3, 2021, '01:33:27'),
(33, 'S656', 14, 3, 2021, '01:45:12'),
(34, 'S130', 14, 3, 2021, '01:32:10'),
(35, 'C542', 14, 3, 2021, '07:01:13'),
(36, 'S656', 14, 3, 2021, '05:01:34'),
(37, 'C406', 14, 3, 2021, '07:02:56'),
(38, 'C563', 14, 3, 2021, '09:11:14'),
(39, 'S994', 14, 3, 2021, '17:45:14'),
(40, 'P220', 14, 3, 2021, '09:00:12'),
(41, 'P139', 14, 3, 2021, '09:30:14'),
(42, 'C359', 14, 3, 2021, '01:32:11'),
(43, 'C997', 14, 3, 2021, '07:02:12'),
(44, 'C119', 14, 3, 2021, '01:33:11'),
(45, 'C620', 14, 3, 2021, '01:35:34'),
(46, 'C359', 15, 3, 2021, '07:03:12'),
(47, 'C620', 15, 3, 2021, '07:04:22'),
(48, 'C119', 15, 3, 2021, '07:08:13'),
(49, 'C417', 15, 3, 2021, '01:32:17'),
(50, 'C542', 15, 3, 2021, '01:33:15'),
(51, 'C563', 15, 3, 2021, '01:34:11'),
(52, 'S994', 15, 3, 2021, '01:35:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dummy_data`
--
ALTER TABLE `dummy_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dummy_data`
--
ALTER TABLE `dummy_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
