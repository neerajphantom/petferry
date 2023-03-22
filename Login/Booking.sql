-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2021 at 03:11 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

-- SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
-- START TRANSACTION;
-- SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `formuser1`
--

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE `bookings` (
  `bookingid` int(11) NOT NULL AUTO_INCREMENT,
  `ownid` int(11) NOT NULL,
  `petid` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pndaddress`varchar(255) NOT NULL,
  `addr_area`varchar(100) NOT NULL,
  `package` varchar(255) NOT NULL,
  `activities` varchar(255) NOT NULL,
  `price`varchar(100) NULL,
  `payment` varchar(100) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (bookingid),
  FOREIGN KEY (ownid) REFERENCES petusers(userid),
  FOREIGN KEY (petid) REFERENCES petscust(petid)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



ALTER TABLE bookings AUTO_INCREMENT = 200001;

-- ALTER TABLE bookings ADD COLUMN assign_walker_button VARCHAR(255) NULL;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

