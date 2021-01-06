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
-- Table structure for table `Kelurahan`
-- pk k_id

CREATE TABLE `kelurahan` (
  `k_id` int(11) NOT NULL,
  `k_nama` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `kelurahan`
  ADD PRIMARY KEY (`k_id`);
-- --------------------------------------------------------

--
-- Table structure for table `Cabang_bank`
-- fk k_id pk b_id

CREATE TABLE `cabang_bank` (
  `b_id` int(11) NOT NULL,
  `k_id` int(11) NOT NULL,
  `b_nama` varchar(50) NOT NULL,
  `b_alamat` varchar(100) NOT NULL,
  `b_telepon` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `cabang_bank`
  ADD PRIMARY KEY (`b_id`);
-- --------------------------------------------------------

--
-- Table structure for table `staff`
-- fk b_id pk s_id

CREATE TABLE `staff` (
  `s_id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL,
  `s_nama` varchar(50) NOT NULL,
  `s_password` varchar(50) DEFAULT NULL,
  `s_alamat` varchar(50) NOT NULL,
  `s_telepon` varchar(15) DEFAULT NULL
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`s_id`);

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT;

-- --------------------------------------------------------

--
-- Table structure for table `users`
-- pk u_id

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `u_username` varchar(20) DEFAULT NULL,
  `u_password` varchar(50) DEFAULT NULL,
  `u_alamat` varchar(100) DEFAULT NULL,
  `u_telp` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- --------------------------------------------------------

--
-- Table structure for table `pengepul`
-- pk p_id

CREATE TABLE `pengepul` (
  `p_id` int(11) NOT NULL,
  `p_username` varchar(20) DEFAULT NULL,
  `p_password` varchar(50) DEFAULT NULL,
  `p_alamat` varchar(100) DEFAULT NULL,
  `p_telp` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
--
-- Indexes for table `pengepul`
--
ALTER TABLE `pengepul`
  ADD PRIMARY KEY (`p_id`);

ALTER TABLE `pengepul`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT;
-- --------------------------------------------------------

--
-- Table structure for table `transaksi_user`
-- fk u_id b_id s_id pk tu_id

CREATE TABLE `transaksi_user` (
  `tu_id` int(11) DEFAULT NULL,
  `u_id` int(11) DEFAULT NULL,
  `b_id` int(11) NOT NULL,
  `s_id` int(11) DEFAULT NULL,
  `tu_tanggal` date DEFAULT NULL,
  `tu_setor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for table `transaksi_users`
--
ALTER TABLE `transaksi_user`
  ADD PRIMARY KEY (`tu_id`);

-- AUTO_INCREMENT for table `transaksi_user`
--
ALTER TABLE `transaksi_user`
  MODIFY `tu_id` int(11) NOT NULL AUTO_INCREMENT;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_pengepul`
-- fk u_id  s_id pk tp_id

CREATE TABLE `transaksi_pengepul` (
  `tp_id` int(11) DEFAULT NULL,
  `u_id` int(11) DEFAULT NULL,
  `s_id` int(11) DEFAULT NULL,
  `tp_tanggal` date DEFAULT NULL,
  `tp_ambil` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `transaksi_pengepul`
  ADD PRIMARY KEY (`tp_id`);

ALTER TABLE `transaksi_pengepul`
  MODIFY `tp_id` int(11) NOT NULL AUTO_INCREMENT;

-- --------------------------------------------------------

--
-- Table structure for table `sampah`
-- pk sam_id

CREATE TABLE `sampah` (
  `sam_id` int(11) DEFAULT NULL,
  `sam_nama` varchar(50) DEFAULT NULL,
  `sam_satuan` varchar(20) DEFAULT NULL,
  `sam_hrg_jual` int(11) DEFAULT NULL,
  `sam_hrg_beli` int(11) DEFAULT NULL,
  `sam_stok` int(11) DEFAULT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `sampah`
  ADD PRIMARY KEY (`sam_id`);

ALTER TABLE `sampah`
  MODIFY `sam_id` int(11) NOT NULL AUTO_INCREMENT;

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi_user`
-- fk tu_id sam_id

CREATE TABLE `detail_transaksi_user` (
  `tu_id` int(11) DEFAULT NULL,
  `sam_id` int(11) DEFAULT NULL,
  `dtu_subtotal_setor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi_pengepul`
-- fk tp_id sam_id

CREATE TABLE `detail_transaksi_pengepul` (
  `tp_id` int(11) DEFAULT NULL,
  `sam_id` int(11) DEFAULT NULL,
  `dtp_subtotal_ambil` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
