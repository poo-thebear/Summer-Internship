-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2023 at 02:11 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db-user`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_reset`
--

CREATE TABLE `tb_reset` (
  `sno` int(11) NOT NULL,
  `fname` text NOT NULL,
  `email` varchar(80) NOT NULL,
  `verify_token` varchar(100) DEFAULT NULL,
  `verify_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_reset`
--

INSERT INTO `tb_reset` (`sno`, `fname`, `email`, `verify_token`, `verify_status`) VALUES
(1, 'Roshni', 'imroshni3@gmail.com', '25daa5fa81be97bba58adfd67e469d70renewed', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_reset`
--
ALTER TABLE `tb_reset`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_reset`
--
ALTER TABLE `tb_reset`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
