-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2024 at 04:59 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `extensionsn`
--

-- --------------------------------------------------------

--
-- Table structure for table `extensionsn`
--

CREATE TABLE `extensionsn` (
  `id` int(11) NOT NULL,
  `ext_number` varchar(100) NOT NULL,
  `pabx_port` int(100) NOT NULL,
  `cable_location_a` int(100) NOT NULL,
  `cable_location_b` int(100) NOT NULL,
  `user_name` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `extensionsn`
--

INSERT INTO `extensionsn` (`id`, `ext_number`, `pabx_port`, `cable_location_a`, `cable_location_b`, `user_name`) VALUES
(1, '02', 2, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `extensionsn`
--
ALTER TABLE `extensionsn`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `extensionsn`
--
ALTER TABLE `extensionsn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
