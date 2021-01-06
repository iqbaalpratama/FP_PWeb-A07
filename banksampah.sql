-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2021 at 05:26 PM
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
-- Table structure for table `cabang_bank`
--

CREATE TABLE `cabang_bank` (
  `b_id` int(11) NOT NULL,
  `k_id` int(11) NOT NULL,
  `b_nama` varchar(50) NOT NULL,
  `b_alamat` varchar(100) NOT NULL,
  `b_telepon` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi_pengepul`
--

CREATE TABLE `detail_transaksi_pengepul` (
  `tp_id` int(11) DEFAULT NULL,
  `sam_id` int(11) DEFAULT NULL,
  `dtp_subtotal_ambil` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi_user`
--

CREATE TABLE `detail_transaksi_user` (
  `tu_id` int(11) DEFAULT NULL,
  `sam_id` int(11) DEFAULT NULL,
  `dtu_subtotal_setor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kelurahan`
--

CREATE TABLE `kelurahan` (
  `k_id` int(11) NOT NULL,
  `k_nama` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pengepul`
--

CREATE TABLE `pengepul` (
  `p_id` int(11) NOT NULL,
  `p_username` varchar(20) DEFAULT NULL,
  `p_password` varchar(50) DEFAULT NULL,
  `p_alamat` varchar(100) DEFAULT NULL,
  `p_telp` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sampah`
--

CREATE TABLE `sampah` (
  `sam_id` int(11) NOT NULL,
  `sam_nama` varchar(50) DEFAULT NULL,
  `sam_satuan` varchar(20) DEFAULT NULL,
  `sam_hrg_jual` int(11) DEFAULT NULL,
  `sam_hrg_beli` int(11) DEFAULT NULL,
  `sam_stok` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `s_id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL,
  `s_nama` varchar(50) NOT NULL,
  `s_password` varchar(50) DEFAULT NULL,
  `s_alamat` varchar(50) NOT NULL,
  `s_telepon` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_pengepul`
--

CREATE TABLE `transaksi_pengepul` (
  `tp_id` int(11) NOT NULL,
  `p_id` int(11) DEFAULT NULL,
  `s_id` int(11) DEFAULT NULL,
  `tp_tanggal` date DEFAULT NULL,
  `tp_ambil` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_user`
--

CREATE TABLE `transaksi_user` (
  `tu_id` int(11) NOT NULL,
  `u_id` int(11) DEFAULT NULL,
  `b_id` int(11) NOT NULL,
  `s_id` int(11) DEFAULT NULL,
  `tu_tanggal` date DEFAULT NULL,
  `tu_setor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `u_username` varchar(20) DEFAULT NULL,
  `u_password` varchar(50) DEFAULT NULL,
  `u_alamat` varchar(100) DEFAULT NULL,
  `u_telp` varchar(15) DEFAULT NULL,
  `u_foto` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cabang_bank`
--
ALTER TABLE `cabang_bank`
  ADD PRIMARY KEY (`b_id`),
  ADD KEY `k_id` (`k_id`);

--
-- Indexes for table `detail_transaksi_pengepul`
--
ALTER TABLE `detail_transaksi_pengepul`
  ADD KEY `tp_id` (`tp_id`),
  ADD KEY `sam_id` (`sam_id`);

--
-- Indexes for table `detail_transaksi_user`
--
ALTER TABLE `detail_transaksi_user`
  ADD KEY `tu_id` (`tu_id`),
  ADD KEY `sam_id` (`sam_id`);

--
-- Indexes for table `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD PRIMARY KEY (`k_id`);

--
-- Indexes for table `pengepul`
--
ALTER TABLE `pengepul`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `sampah`
--
ALTER TABLE `sampah`
  ADD PRIMARY KEY (`sam_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`s_id`),
  ADD KEY `b_id` (`b_id`);

--
-- Indexes for table `transaksi_pengepul`
--
ALTER TABLE `transaksi_pengepul`
  ADD PRIMARY KEY (`tp_id`),
  ADD KEY `p_id` (`p_id`),
  ADD KEY `s_id` (`s_id`);

--
-- Indexes for table `transaksi_user`
--
ALTER TABLE `transaksi_user`
  ADD PRIMARY KEY (`tu_id`),
  ADD KEY `b_id` (`b_id`),
  ADD KEY `transaksi_user_ibfk_2` (`s_id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pengepul`
--
ALTER TABLE `pengepul`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sampah`
--
ALTER TABLE `sampah`
  MODIFY `sam_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi_pengepul`
--
ALTER TABLE `transaksi_pengepul`
  MODIFY `tp_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi_user`
--
ALTER TABLE `transaksi_user`
  MODIFY `tu_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `kelurahan`
  MODIFY `k_id` int(11) NOT NULL AUTO_INCREMENT;

  ALTER TABLE `cabang_bank`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cabang_bank`
--
ALTER TABLE `cabang_bank`
  ADD CONSTRAINT `cabang_bank_ibfk_1` FOREIGN KEY (`k_id`) REFERENCES `kelurahan` (`k_id`);

--
-- Constraints for table `detail_transaksi_pengepul`
--
ALTER TABLE `detail_transaksi_pengepul`
  ADD CONSTRAINT `detail_transaksi_pengepul_ibfk_1` FOREIGN KEY (`tp_id`) REFERENCES `transaksi_pengepul` (`tp_id`),
  ADD CONSTRAINT `detail_transaksi_pengepul_ibfk_2` FOREIGN KEY (`sam_id`) REFERENCES `sampah` (`sam_id`);

--
-- Constraints for table `detail_transaksi_user`
--
ALTER TABLE `detail_transaksi_user`
  ADD CONSTRAINT `detail_transaksi_user_ibfk_1` FOREIGN KEY (`tu_id`) REFERENCES `transaksi_user` (`tu_id`),
  ADD CONSTRAINT `detail_transaksi_user_ibfk_2` FOREIGN KEY (`sam_id`) REFERENCES `sampah` (`sam_id`);

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`b_id`) REFERENCES `cabang_bank` (`b_id`);

--
-- Constraints for table `transaksi_pengepul`
--
ALTER TABLE `transaksi_pengepul`
  ADD CONSTRAINT `transaksi_pengepul_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `pengepul` (`p_id`),
  ADD CONSTRAINT `transaksi_pengepul_ibfk_2` FOREIGN KEY (`s_id`) REFERENCES `staff` (`s_id`);

--
-- Constraints for table `transaksi_user`
--
ALTER TABLE `transaksi_user`
  ADD CONSTRAINT `transaksi_user_ibfk_1` FOREIGN KEY (`b_id`) REFERENCES `cabang_bank` (`b_id`),
  ADD CONSTRAINT `transaksi_user_ibfk_2` FOREIGN KEY (`s_id`) REFERENCES `staff` (`s_id`),
  ADD CONSTRAINT `transaksi_user_ibfk_3` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
