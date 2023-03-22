-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2023 at 10:40 AM
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
-- Database: `formuser1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `username`, `password`) VALUES
(10101, 'admin', 'WhatsyourRole?');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `bookingid` int(11) NOT NULL,
  `ownid` int(11) NOT NULL,
  `petid` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pndaddress` varchar(255) NOT NULL,
  `addr_area` varchar(100) NOT NULL,
  `package` varchar(255) NOT NULL,
  `activities` varchar(255) NOT NULL,
  `price` varchar(100) DEFAULT NULL,
  `payment` varchar(100) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `assign_walker_button` varchar(255) DEFAULT NULL,
  `walker_id` int(11) DEFAULT NULL,
  `orderstatus` varchar(50) DEFAULT 'Pending',
  `paymentstatus` varchar(50) DEFAULT 'Unpaid',
  `paymentid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`bookingid`, `ownid`, `petid`, `email`, `pndaddress`, `addr_area`, `package`, `activities`, `price`, `payment`, `created`, `assign_walker_button`, `walker_id`, `orderstatus`, `paymentstatus`, `paymentid`) VALUES
(200001, 1, 101, 'phantomnareal@gmail.com', 'demons castle', 'Ghatkopar (east)', 'Primary', 'Walking', '₹200', 'Online', '2023-02-27 17:54:30', '<div id=\"assign-walker-modal200001\" class=\"modal\">\n                <div class=\"modal-content\">\n                    <span class=\"close\">&times;</span>\n                    <h3>Assign Walker</h3>\n                    <form method=\"post\" action=\"\">\n      ', 1001, 'Completed', 'Paid', NULL),
(200002, 1, 101, 'phantomnareal@gmail.com', 'gods home ', 'Ghatkopar (west)', 'Secondary', 'Walking, Dining', '₹350', 'Offline', '2023-02-27 17:55:01', '<div id=\"assign-walker-modal200002\" class=\"modal\">\r\n                <div class=\"modal-content\">\r\n                    <span class=\"close\">&times;</span>\r\n                    <h3>Assign Walker</h3>\r\n                    <form method=\"post\" action=\"\">\r\n      ', 1002, 'Ongoing', 'Unpaid', NULL),
(200003, 26, 102, 'nee27raj@gmail.com', 'ghar ke bahar', 'Sion (east)', 'Preferred', 'Walking, Dining, Dressing, Doctoring', '₹1000', 'Online', '2023-02-27 17:56:13', '<div id=\"assign-walker-modal200003\" class=\"modal\">\r\n                <div class=\"modal-content\">\r\n                    <span class=\"close\">&times;</span>\r\n                    <h3>Assign Walker</h3>\r\n                    <form method=\"post\" action=\"\">\r\n      ', 1003, 'Pending', 'Unpaid', NULL),
(200004, 26, 102, 'nee27raj@gmail.com', 'ghar ke anadr', 'Sion (west)', 'Standard', 'Walking, Dining, Dressing', '₹500', 'Online', '2023-02-27 17:56:40', '<div id=\"assign-walker-modal200004\" class=\"modal\">\r\n                <div class=\"modal-content\">\r\n                    <span class=\"close\">&times;</span>\r\n                    <h3>Assign Walker</h3>\r\n                    <form method=\"post\" action=\"\">\r\n      ', NULL, 'Pending', 'Unpaid', NULL),
(200005, 27, 103, 'neerajdreamon@gmail.com', 'ghar ke upar', 'Vidyavihar (east)', 'Habitude', 'Walking, Dining, Coaching', '₹650', 'Online', '2023-02-27 17:57:36', '<div id=\"assign-walker-modal200005\" class=\"modal\">\r\n                <div class=\"modal-content\">\r\n                    <span class=\"close\">&times;</span>\r\n                    <h3>Assign Walker</h3>\r\n                    <form method=\"post\" action=\"\">\r\n      ', 1006, 'Pending', 'Unpaid', NULL),
(200006, 27, 103, 'neerajdreamon@gmail.com', 'ghar ke neeche ', 'Vidyavihar (west)', 'Habitude', 'Walking, Dining, Coaching', '₹650', 'Offline', '2023-02-27 17:57:55', '<div id=\"assign-walker-modal200006\" class=\"modal\">\r\n                <div class=\"modal-content\">\r\n                    <span class=\"close\">&times;</span>\r\n                    <h3>Assign Walker</h3>\r\n                    <form method=\"post\" action=\"\">\r\n      ', NULL, 'Pending', 'Unpaid', NULL),
(200008, 1, 101, 'phantomnareal@gmail.com', 'high abov estart', 'Vidyavihar (east)', 'Habitude', 'Walking, Dining, Coaching', '₹650', 'Offline', '2023-02-28 00:21:14', '<div id=\"assign-walker-modal200008\" class=\"modal\">\r\n                <div class=\"modal-content\">\r\n                    <span class=\"close\">&times;</span>\r\n                    <h3>Assign Walker</h3>\r\n                    <form method=\"post\" action=\"\">\r\n      ', 1001, 'Ongoing', 'Unpaid', NULL),
(200009, 1, 101, 'phantomnareal@gmail.com', 'high school', 'Sion (east)', 'Habitude', 'Walking, Dining, Coaching', '₹650', 'Offline', '2023-02-28 00:21:34', '<div id=\"assign-walker-modal200009\" class=\"modal\">\r\n                <div class=\"modal-content\">\r\n                    <span class=\"close\">&times;</span>\r\n                    <h3>Assign Walker</h3>\r\n                    <form method=\"post\" action=\"\">\r\n      ', 1004, 'Completed', 'Paid', NULL),
(200010, 1, 101, 'phantomnareal@gmail.com', 'Amrutulya ', 'Vidyavihar (east)', 'Master Fitness', 'Walking, Dining, Workout', '₹800', 'Online', '2023-02-28 00:21:48', '<div id=\"assign-walker-modal200010\" class=\"modal\">\r\n                <div class=\"modal-content\">\r\n                    <span class=\"close\">&times;</span>\r\n                    <h3>Assign Walker</h3>\r\n                    <form method=\"post\" action=\"\">\r\n      ', 1005, 'Pickedup', 'Paid', NULL),
(200011, 1, 101, 'phantomnareal@gmail.com', 'pimpleshwar mandir', 'Sion (east)', 'Preferred', 'Walking, Dining, Dressing, Doctoring', '₹1000', 'Offline', '2023-02-28 18:21:27', NULL, 1004, 'Completed', 'Paid', NULL),
(200012, 1, 101, 'phantomnareal@gmail.com', 'Jogeshwari', 'Vidyavihar (east)', 'Master Fitness', 'Walking, Dining, Workout', '₹800', 'Offline', '2023-03-01 15:00:44', NULL, 1004, 'Pickedup', 'Unpaid', NULL),
(200013, 1, 101, 'phantomnareal@gmail.com', 'New city town', 'Sion (west)', 'Habitude', 'Walking, Dining, Coaching', '₹650', 'Online', '2023-03-01 20:15:07', NULL, 1006, 'Pending', 'Unpaid', NULL),
(200014, 1, 101, 'phantomnareal@gmail.com', 'ARUN VAIDYA', 'Ghatkopar (east)', 'Standard', 'Walking, Dining, Dressing', '₹500', 'Offline', '2023-03-04 21:04:48', NULL, 1001, 'Pickedup', 'Unpaid', NULL),
(200016, 1, 101, 'phantomnareal@gmail.com', 'New city town', 'Sion (east)', 'Habitude', 'Walking, Dining, Coaching', '₹650', 'Offline', '2023-03-06 21:15:34', NULL, NULL, 'Pending', 'Unpaid', NULL),
(200017, 1, 101, 'phantomnareal@gmail.com', 'Next to store', 'Vidyavihar (east)', 'Preferred', 'Walking, Dining, Dressing, Doctoring', '₹1000', 'Offline', '2023-03-06 21:28:04', NULL, NULL, 'Pending', 'Unpaid', NULL),
(200018, 1, 101, 'phantomnareal@gmail.com', 'pimpleshwar mandir', 'Vidyavihar (east)', 'Master Fitness', 'Walking, Dining, Workout', '₹800', 'Offline', '2023-03-06 21:38:50', NULL, 1005, 'Pending', 'Unpaid', NULL),
(200022, 1, 101, 'phantomnareal@gmail.com', 'Acharya Atre Maidan', 'Ghatkopar (east)', 'Primary', 'Walking', '₹200', 'Offline', '2023-03-08 11:44:11', NULL, 1002, 'Pending', 'Unpaid', NULL),
(200023, 1, 101, 'phantomnareal@gmail.com', 'Next to store', 'Sion (west)', 'Preferred', 'Walking, Dining, Dressing, Doctoring', '₹1000', 'Online', '2023-03-12 17:11:37', NULL, NULL, 'Pending', 'Unpaid', NULL),
(200024, 1, 101, 'phantomnareal@gmail.com', 'pimpleshwar mandir', 'Vidyavihar (east)', 'Master Fitness', 'Walking, Dining, Workout', '₹800', 'Online', '2023-03-12 17:12:55', NULL, NULL, 'Pending', 'Unpaid', NULL),
(200025, 1, 101, 'phantomnareal@gmail.com', 'pimpleshwar mandir1', 'Vidyavihar (west)', 'Standard', 'Walking, Dining, Dressing', '₹500', 'Offline', '2023-03-12 17:13:20', NULL, NULL, 'Pending', 'Unpaid', NULL),
(200026, 1, 101, 'phantomnareal@gmail.com', 'pimpleshwar mandir3', 'Sion (west)', 'Habitude', 'Walking, Dining, Coaching', '₹650', 'Online', '2023-03-12 17:16:41', NULL, 1008, 'Completed', 'Paid', NULL),
(200027, 1, 101, 'phantomnareal@gmail.com', 'New City ', 'Ghatkopar (east)', 'Secondary', 'Walking, Dining', '₹350', 'Online', '2023-03-22 10:53:16', NULL, NULL, 'Pending', 'Paid', 641),
(200028, 1, 101, 'phantomnareal@gmail.com', 'G wagon city', 'Sion (east)', 'Preferred', 'Walking, Dining, Dressing, Doctoring', '₹1000', 'Offline', '2023-03-22 10:55:29', NULL, NULL, 'Pending', '', 0),
(200029, 1, 101, 'phantomnareal@gmail.com', 'Satya sai store', 'Ghatkopar (east)', 'Preferred', 'Walking, Dining, Dressing, Doctoring', '₹1000', 'Online', '2023-03-22 11:13:28', NULL, NULL, 'Pending', 'Paid', 641),
(200030, 1, 101, 'phantomnareal@gmail.com', 'Satya sai store near 90ft road', 'Ghatkopar (west)', 'Master Health', 'Coaching, Dining, Workout, Doctoring', '₹1500', 'Offline', '2023-03-22 11:14:33', NULL, NULL, 'Pending', 'Unpaid', 0),
(200031, 1, 101, 'phantomnareal@gmail.com', 'Neru street', 'Ghatkopar (west)', 'Preferred', 'Walking, Dining, Dressing, Doctoring', '₹1000', 'Online', '2023-03-22 11:17:55', NULL, NULL, 'Pending', 'Paid', 641),
(200032, 1, 101, 'phantomnareal@gmail.com', 'Chaiwala', 'Sion (west)', 'Habitude', 'Walking, Dining, Coaching', '₹650', 'Online', '2023-03-22 11:19:14', NULL, NULL, 'Pending', 'Paid', 46032721),
(200033, 1, 101, 'phantomnareal@gmail.com', 'Gauri Shankar wadi', 'Ghatkopar (east)', 'Primary', 'Walking', '₹200', 'Online', '2023-03-22 11:19:49', NULL, 1003, 'Ongoing', 'Paid', 62388800),
(200034, 1, 101, 'phantomnareal@gmail.com', 'pimpleshwar mandir, opp', 'Sion (west)', 'Habitude', 'Walking, Dining, Coaching', '₹650', 'Online', '2023-03-22 11:27:52', NULL, NULL, 'Pending', 'Paid', 62135481),
(200035, 1, 101, 'phantomnareal@gmail.com', 'New city town, opp', 'Ghatkopar (east)', 'Master Fitness', 'Walking, Dining, Workout', '₹800', 'Offline', '2023-03-22 11:28:29', NULL, NULL, 'Pending', 'Unpaid', 0),
(200036, 1, 101, 'phantomnareal@gmail.com', 'New city town, badlapur', 'Vidyavihar (east)', 'Primary', 'Walking', '₹200', 'Online', '2023-03-22 12:16:50', NULL, NULL, 'Pending', 'Paid', 70581661);

-- --------------------------------------------------------

--
-- Table structure for table `petscust`
--

CREATE TABLE `petscust` (
  `ownerid` int(11) NOT NULL,
  `petid` int(11) NOT NULL,
  `petname` varchar(255) NOT NULL,
  `pettype` varchar(255) NOT NULL,
  `petbreed` varchar(100) DEFAULT 'others',
  `gender` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `petscust`
--

INSERT INTO `petscust` (`ownerid`, `petid`, `petname`, `pettype`, `petbreed`, `gender`) VALUES
(1, 101, 'Honey', 'Cat', 'others', 'Female'),
(26, 102, 'Jaddu', 'Dog', 'others', 'Female'),
(27, 103, 'Natru', 'Cat', 'others', 'Male'),
(29, 106, 'Raajo', 'Dog', 'others', 'Male'),
(30, 107, 'kasuro', 'Cat', 'others', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `petusers`
--

CREATE TABLE `petusers` (
  `userid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` bigint(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `code` mediumint(50) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `petusers`
--

INSERT INTO `petusers` (`userid`, `name`, `email`, `phone`, `password`, `code`, `status`) VALUES
(1, 'Mohit Pandey', 'phantomnareal@gmail.com', 7878787878, '$2y$10$USfUcQWNagKeiojnUtPz5eZSuXdbGSO8mxNDCbdTJgq1DDM12pyYK', 0, 'verified'),
(26, 'Neeraj Gupta', 'nee27raj@gmail.com', 7777877777, '$2y$10$Wn2xHSwh4BxrDrm0jyGpweWX9tIQWihiFEd537ls/zjoViNdACp/W', 0, 'verified'),
(27, 'Aditya Watekar', 'neerajdreamon@gmail.com', 8989898989, '$2y$10$f0jwVTfGpDzXZK39DxZd9ONCEO1px7rl80QANnoaiL7LZnCCySxT2', 0, 'verified'),
(29, 'Taimour Baig', 'tai@gmail.com', 9809809809, '$2y$10$TXCF0BfheN2KQw1PLhDt1OS5TzTabIz/LH8Xqat.6WV82Gc.VMJ0e', 0, 'verified'),
(30, 'Kalam Ink', 'kalam@gmail.com', 1111111111, '$2y$10$0pHwrpI3G6GxlmUmsJO5Mu.259fqbhPLw784sCGql5aTic5/eqH0y', 0, 'verified');

-- --------------------------------------------------------

--
-- Table structure for table `pet_clinics`
--

CREATE TABLE `pet_clinics` (
  `pcid` int(11) UNSIGNED NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `map_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pet_clinics`
--

INSERT INTO `pet_clinics` (`pcid`, `type`, `name`, `address`, `phone_number`, `map_link`) VALUES
(1, 'Clinic', 'Dr. Ravi Kotharis Clinic & Pet Shop', 'Bandra West', '+91 98200 40754', 'https://goo.gl/maps/xRM31uYUy4f9v6ac6'),
(2, 'Clinic', 'Shivam Pet Clinic', 'Borivali West ', '+91 22 2892 6892', 'https://goo.gl/maps/xdgR2mextNYdfZSG8'),
(3, 'Clinic', 'Dr. Ajay\'s Pets Clinic ', 'Andheri West', '+91 98210 05615', 'https://goo.gl/maps/y3nUrfLqrgSpZXdg9'),
(4, 'Clinic', 'Happy Tails Pet Clinic', 'Khar West', '+91 98193 03900', 'https://goo.gl/maps/yvAwKW3B5G5dDKaV8'),
(5, 'Clinic', 'Pawfect Care Pet Clinic', 'Malad West', '+91 22 2889 1999', 'https://goo.gl/maps/Me8xvM3F5rtVHeCc9'),
(6, 'Clinic', 'Dr. Joshi\'s Pet Clinic', 'Chembur', '+91 98207 04589', 'https://goo.gl/maps/CUeF4EthAdHkPGQEA'),
(7, 'Clinic', 'The Bombay Veterinary Clinic', 'Colaba', '+91 22 2202 2767', 'https://goo.gl/maps/aFn92K3U84t1C1Mr5'),
(8, 'Clinic', 'Royal Pet Care', 'Kurla', '+91 22 2651 0870', 'https://goo.gl/maps/zUntUKX1AXF1KBtG6'),
(9, 'NGO', 'Nargis Dutt Memorial Charitable Trust', 'Pali Hill, Bandra West', '+91 22 2640 0223', 'https://goo.gl/maps/iBVrCktMYkJFakxQA'),
(10, 'Clinic', 'Pet Vet Clinic', 'Juhu', '+91 22 2620 1488', 'https://goo.gl/maps/XdG8kdiYfVExbhvd7'),
(11, 'NGO', 'People for Animals Mumbai', 'Worli', '+91 22 2492 3081', 'https://www.google.com/maps/place/People+for+Animals/@19.0070221,72.8242912,15z/data=!4m5!3m4!1s0x0:0x3f3b791c1741e22a!8m2!3d19.0070221!4d72.8242912'),
(12, 'NGO', 'Bombay Society for Prevention of Cruelty to Animals (BSPCA)', 'Parel', '+91 22 2413 3330', 'https://goo.gl/maps/N55v29JSVzUSJvW38'),
(13, 'NGO', 'World For All Animal Care and Adoptions', 'Andheri West', '+91 98207 94440', 'https://goo.gl/maps/N55v29JSVzUSJvW38'),
(14, 'NGO', 'ResQ Charitable Trust', 'Kandivali West', '+91 80808 55555', 'https://www.google.com/maps/place/RESQ+Charitable+Trust/@18.5012892,73.7574921,17z/data=!3m1!4b1!4m6!3m5!1s0x3bc2be1388afeb53:0xb67ad55c0f9115cc!8m2!3d18.5012892!4d73.7574921!16s%2Fg%2F11bwfl_m29'),
(15, 'NGO', 'Animals Matter To Me', 'Malad West', '+91 98201 77470', 'https://goo.gl/maps/mAPme23CSjhoM2vS8'),
(16, 'NGO', 'Karuna Animal Welfare Association of Maharashtra', 'Parel', '+91 22 2413 1550', 'https://goo.gl/maps/4pttFE1YDF3tZu2K6'),
(17, 'NGO', 'Save Our Strays', 'Juhu', '+91 22 2625 2020', 'https://goo.gl/maps/jTRJViT4PBg91rXW9'),
(18, 'NGO', 'Welfare of Stray Dogs', 'Mahalaxmi', '+91 22 6422 2222', 'https://goo.gl/maps/B5UxoqqXmh8xhaRi8'),
(20, 'Clinic', 'Sai Vet Clinic, Dr. On call', 'Sandesh Nagar, Mumbai', '+91 9324624543', 'https://goo.gl/maps/oF6HQUtQw1m1fCaVA'),
(21, 'Clinic', 'Pet Pawly-Clinic', 'Shop No. 5, Swashray CHS, Hingwala Ln, near Popular Hotel, Extension, Ghatkopar East, Mumbai, Maharashtra 400077', '+91 93212 37566', 'https://www.google.com/search?tbm=lcl&sxsrf=AJOqlzXKLbXGhgK2-_ytJReVV-ZPhFpTLw:1678691761053&q=Pet+Pawly-Clinic,+Shop+No.+5,+Swashray+CHS,+Hingwala+Lane,+near+Popular+Hotel,+Extension,+Ghatkopar+East,+Mumbai,+Maharashtra+400077&spell=1&sa=X&ved=2ahUKEwib_');

-- --------------------------------------------------------

--
-- Table structure for table `walkers`
--

CREATE TABLE `walkers` (
  `walkerid` int(11) NOT NULL,
  `walker_name` varchar(255) NOT NULL,
  `walker_email` varchar(255) NOT NULL,
  `walker_phone` bigint(100) NOT NULL,
  `walker_address` varchar(255) NOT NULL,
  `walker_area` varchar(100) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `walkers`
--

INSERT INTO `walkers` (`walkerid`, `walker_name`, `walker_email`, `walker_phone`, `walker_address`, `walker_area`, `created`) VALUES
(1001, 'Shambhu ', 'shambu@gmail.com', 8888888888, 'near ghatkopar circle, flat no.24,11', 'Ghatkopar (east)', '2023-02-25 19:55:51'),
(1002, 'Nimru', 'nimeu@gmail.com', 3333344444, 'near Acharya Atre maidan, flat no.24,11', 'Ghatkopar (west)', '2023-02-25 19:59:57'),
(1003, 'Neeru', 'shimno@gmail.com', 3333355555, 'near sion west hospital, flat no.26', 'Sion (east)', '2023-02-25 20:05:16'),
(1004, 'Aditya Watekar', 'wati@gmail.com', 9999944444, 'Gauri Shankar Wadi, sion west', 'Sion (west)', '2023-02-25 20:08:30'),
(1005, 'jatin Gupta', 'jatin@gmail.com', 8888811111, 'near station road , flat no.243', 'Vidyavihar (east)', '2023-02-25 20:11:46'),
(1006, 'Neeraj Bora', 'nee@gmail.com', 8899889988, 'near shop no. 1, flat no.346', 'Vidyavihar (west)', '2023-02-25 20:15:11'),
(1007, 'Jaikumar Gaja', 'gajajai@gmail.com', 3333344444, 'near chembur circle, flat no.0', 'Vidyavihar (west)', '2023-02-26 21:23:00'),
(1008, 'Shera Jagtab', 'shera@gmail.com', 9090909090, 'Ghatkopar east near 90ft road', 'Vidyavihar (east)', '2023-03-12 15:20:02'),
(1009, 'Birju Sharma', 'birju@gmail.com', 7777788889, 'Opp to sai mandir ghatkopar west', 'Sion (west)', '2023-03-12 15:33:58'),
(1011, 'Vikrant Nagraj', 'vikraj@gmail.com', 7878787878, 'Ghatkopar east near 60ft road', 'Sion (west)', '2023-03-13 17:09:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`bookingid`),
  ADD KEY `ownid` (`ownid`),
  ADD KEY `petid` (`petid`);

--
-- Indexes for table `petscust`
--
ALTER TABLE `petscust`
  ADD PRIMARY KEY (`petid`),
  ADD KEY `ownerid` (`ownerid`);

--
-- Indexes for table `petusers`
--
ALTER TABLE `petusers`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `pet_clinics`
--
ALTER TABLE `pet_clinics`
  ADD PRIMARY KEY (`pcid`);

--
-- Indexes for table `walkers`
--
ALTER TABLE `walkers`
  ADD PRIMARY KEY (`walkerid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10102;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `bookingid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200037;

--
-- AUTO_INCREMENT for table `petscust`
--
ALTER TABLE `petscust`
  MODIFY `petid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `petusers`
--
ALTER TABLE `petusers`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `pet_clinics`
--
ALTER TABLE `pet_clinics`
  MODIFY `pcid` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `walkers`
--
ALTER TABLE `walkers`
  MODIFY `walkerid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1012;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`ownid`) REFERENCES `petusers` (`userid`),
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`petid`) REFERENCES `petscust` (`petid`);

--
-- Constraints for table `petscust`
--
ALTER TABLE `petscust`
  ADD CONSTRAINT `petscust_ibfk_1` FOREIGN KEY (`ownerid`) REFERENCES `petusers` (`userid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
