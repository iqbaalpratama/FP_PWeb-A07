-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2021 at 03:28 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banksampah`
--

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `s_id` int(11) NOT NULL,
  `s_nama` varchar(50) NOT NULL,
  `s_alamat` varchar(50) NOT NULL,
  `s_telepon` varchar(15) DEFAULT NULL,
  `s_password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_user`
--

CREATE TABLE `transaksi_user` (
  `u_id` int(11) DEFAULT NULL,
  `s_id` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `b_makanan` int(11) DEFAULT NULL,
  `b_detergen` int(11) DEFAULT NULL,
  `bot_plastik` int(11) DEFAULT NULL,
  `sam_org` int(11) DEFAULT NULL,
  `nominal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `u_username` varchar(20) DEFAULT NULL,
  `u_password` varchar(50) DEFAULT NULL,
  `u_role` varchar(10) DEFAULT NULL,
  `u_alamat` varchar(100) DEFAULT NULL,
  `u_telp` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `transaksi_user`
--
ALTER TABLE `transaksi_user`
  ADD KEY `u_id` (`u_id`),
  ADD KEY `s_id` (`s_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksi_user`
--
ALTER TABLE `transaksi_user`
  ADD CONSTRAINT `transaksi_user_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`),
  ADD CONSTRAINT `transaksi_user_ibfk_2` FOREIGN KEY (`s_id`) REFERENCES `staff` (`s_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
