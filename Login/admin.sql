-- CREATE TABLE `admin` (
--   `adminid` int(11) NOT NULL AUTO_INCREMENT,
  
--   `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
--   `date_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
--   PRIMARY KEY (`adminid`)
  
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --
-- Dumping data for table `users`
--

-- INSERT INTO `users` (`id`, `username`, `password`, `avatar`, `last_login`, `type`, `date_added`, `date_updated`) VALUES
-- (1, 'Adminstrator', 'Liam', 'admin', 'd00f5d5217896fb7fd601412cb890830', 'uploads/1624000_adminicn.png', NULL, 1, '2022-01-19 14:02:37', '2022-03-27 21:51:35'),
-- (8, 'Martha', 'Heath', 'martha', '3003051F6D158F6687B8A820C46BFA80', 'uploads/avatar-8.png?v=1648396920', NULL, 2, '2022-03-01 16:14:00', '2022-03-27 21:47:00'),
-- (9, 'Andrew', 'Stokes', 'andrew', '5f4dcc3b5aa765d61d8327deb882cf99', 'uploads/avatar-9.png?v=1648396901', NULL, 2, '2022-03-27 21:46:41', '2022-03-27 21:46:41');
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

CREATE TABLE `admin` (
  `adminid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- `address`varchar(255) NOT NULL,
-- Indexes for dumped tables
--

--
-- Indexes for table `usertable`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `usertable`
--
ALTER TABLE `admin`
  MODIFY `adminid` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

-- ALTER TABLE table_name
-- DROP COLUMN column_name;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
