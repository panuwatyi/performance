-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 14, 2023 at 09:11 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_cpewallet`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_accout_type`
--

CREATE TABLE `tb_accout_type` (
  `i_atype_accouttype_id` int(11) NOT NULL,
  `c_atype_accouttype_desp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_banks`
--

CREATE TABLE `tb_banks` (
  `i_banks_bank_id` int(11) NOT NULL,
  `c_banks_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_statement_type`
--

CREATE TABLE `tb_statement_type` (
  `i_stype_statetype_id` int(11) NOT NULL,
  `c_stype_statetype_desp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_users_info`
--

CREATE TABLE `tb_users_info` (
  `c_user_phone` varchar(100) NOT NULL,
  `c_user_pwd` varchar(100) NOT NULL,
  `c_user_email` varchar(100) NOT NULL,
  `c_user_name` varchar(100) NOT NULL,
  `c_user_sname` varchar(100) NOT NULL,
  `i_user_idcard` int(13) NOT NULL,
  `c_user_address` varchar(100) NOT NULL,
  `f_user_balance` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_users_statement`
--

CREATE TABLE `tb_users_statement` (
  `i_ustate_stateid` int(100) NOT NULL,
  `d_ustate_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `i_stype_statetype_id` int(100) NOT NULL,
  `i_atype_accouttype_id` int(100) NOT NULL,
  `i_ustate_accout_no` int(100) NOT NULL,
  `f_ustate_money` float NOT NULL,
  `c_user_phone` varchar(100) NOT NULL,
  `c_ustate_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_accout_type`
--
ALTER TABLE `tb_accout_type`
  ADD PRIMARY KEY (`i_atype_accouttype_id`);

--
-- Indexes for table `tb_banks`
--
ALTER TABLE `tb_banks`
  ADD PRIMARY KEY (`i_banks_bank_id`);

--
-- Indexes for table `tb_statement_type`
--
ALTER TABLE `tb_statement_type`
  ADD PRIMARY KEY (`i_stype_statetype_id`);

--
-- Indexes for table `tb_users_info`
--
ALTER TABLE `tb_users_info`
  ADD PRIMARY KEY (`c_user_phone`);

--
-- Indexes for table `tb_users_statement`
--
ALTER TABLE `tb_users_statement`
  ADD PRIMARY KEY (`i_ustate_stateid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_accout_type`
--
ALTER TABLE `tb_accout_type`
  MODIFY `i_atype_accouttype_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_banks`
--
ALTER TABLE `tb_banks`
  MODIFY `i_banks_bank_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_statement_type`
--
ALTER TABLE `tb_statement_type`
  MODIFY `i_stype_statetype_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_users_statement`
--
ALTER TABLE `tb_users_statement`
  MODIFY `i_ustate_stateid` int(100) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
