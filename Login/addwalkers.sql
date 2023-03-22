-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2021 at 03:11 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `userdetail`
--

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE `walkers` (
  `walkerid` int(11) NOT NULL AUTO_INCREMENT,
  `walker_name` varchar(255) NOT NULL,
  `walker_email` varchar(255) NOT NULL,
  `walker_phone`bigint(100) NOT NULL,
  `walker_address`varchar(255) NOT NULL,
  `walker_area`varchar(100) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
PRIMARY KEY (walkerid)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- `address`varchar(255) NOT NULL,
-- Indexes for dumped tables
--

--
-- Indexes for table `usertable`
--
-- ALTER TABLE `petusers`
--   ADD PRIMARY KEY (`userid`);

--
-- `image` longblob NOT NULL,AUTO_INCREMENT for dumped tables
--
ALTER TABLE walkers AUTO_INCREMENT = 1001;

--
-- AUTO_INCREMENT for table `usertable`
--
-- ALTER TABLE `petusers`
--   MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT;
-- COMMIT;

-- ALTER TABLE table_name
-- DROP COLUMN column_name;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
