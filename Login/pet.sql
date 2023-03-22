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

CREATE TABLE `petscust` (
  `ownerid` int(11) NOT NULL,
  `petid` int(11) NOT NULL AUTO_INCREMENT,
  `petname` varchar(255) NOT NULL,
  `pettype` varchar(255) NOT NULL,
  `petbreed`varchar(100) NULL,
  `gender` varchar(50) NOT NULL,
  PRIMARY KEY (petid),
  FOREIGN KEY (ownerid) REFERENCES petusers(userid)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- `address`varchar(255) NOT NULL,
-- Indexes for dumped tables
--
-- $userid = "";
-- $petid = "";
-- $petname="";
-- $pettype="";
-- $petbreed="";
-- $gender="";
-- CREATE TABLE Orders (
-- OrderID int NOT NULL,
-- OrderNumber int NOT NULL,
-- PersonID int,
-- PRIMARY KEY (OrderID),
-- FOREIGN KEY (PersonID) REFERENCES Persons(PersonID)
-- );
--
-- Indexes for table `usertable`
--
-- ALTER TABLE `pets`
--   ADD PRIMARY KEY (`petid`);

--
-- AUTO_INCREMENT for dumped tables
--
ALTER TABLE petscust AUTO_INCREMENT = 100;
--
-- AUTO_INCREMENT for table `usertable`
--
-- ALTER TABLE `pets`
--   MODIFY `petid` int(11) NOT NULL AUTO_INCREMENT = 100;
-- COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

