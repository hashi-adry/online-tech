-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2020 at 12:43 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gft`
--

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `J_Id` int(100) NOT NULL,
  `job_name` varchar(20) NOT NULL,
  `job_description` varchar(255) NOT NULL,
  `skill_needed` varchar(50) NOT NULL,
  `assigned_by` varchar(100) NOT NULL,
  `assigned_to` varchar(100) NOT NULL,
  `payment_method` varchar(20) NOT NULL,
  `job_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`J_Id`, `job_name`, `job_description`, `skill_needed`, `assigned_by`, `assigned_to`, `payment_method`, `job_status`) VALUES
(1, 'Sink Blocked', 'Sink does not pass water', 'Plumbing', '', '', 'mpesa', 0),
(6, 'Broken Table', 'What the fuck', 'plumbing', '', '', 'Mpesa', 0),
(7, 'Broken Table', 'What the fuck.', 'Carpentry', '', '', 'Cash', 0),
(8, 'Sink Blocked', 'Yeah Baby', 'plumbing', '', '', 'Mpesa', 0),
(9, 'Sink Blocked', 'Yeah Baby', 'plumbing', '', '', 'Mpesa', 0),
(10, 'Tap Replacement', 'Tap replacement service required immediately.', 'Carpentry', '', '', 'Paypal', 0),
(11, 'Gate Repair', 'Gate fixing required ASAP.', 'welding', 'Millicent  Waweru', '0', 'Cash', 1),
(12, 'Gate Repair', 'Gate fixing required ASAP.', 'welding', 'Millicent  Waweru', ' ', 'Cash', 2),
(13, 'Broken Table', 'Bhjklsdaikvfdsv', 'Carpentry', 'Millicent  Waweru', ' ', 'Paypal', 0);

-- --------------------------------------------------------

--
-- Table structure for table `job_category`
--

CREATE TABLE `job_category` (
  `JC_Id` int(100) NOT NULL,
  `JC_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_category`
--

INSERT INTO `job_category` (`JC_Id`, `JC_name`) VALUES
(1, 'plumbing'),
(2, 'Carpentry'),
(3, 'welding'),
(4, 'Manual Labour');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `user` varchar(30) NOT NULL,
  `role` varchar(10) NOT NULL,
  `activity` varchar(100) NOT NULL,
  `time` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `R_Id` int(100) NOT NULL,
  `rating` varchar(30) NOT NULL,
  `review_desc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `c_Id` int(10) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `other_names` varchar(20) NOT NULL,
  `national_id` int(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `role` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `county` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `estate` varchar(20) NOT NULL,
  `postal_code` varchar(20) NOT NULL,
  `Profession` varchar(50) NOT NULL,
  `brief_desc` varchar(100) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`c_Id`, `first_name`, `other_names`, `national_id`, `email`, `password`, `role`, `dob`, `county`, `city`, `estate`, `postal_code`, `Profession`, `brief_desc`, `image`) VALUES
(2, 'Dennis ', 'Koome', 33125489, 'koome@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Admin', '0000-00-00', '', '', '', '', 'plumber', 'ghjkl;fa', '../Images/1568133167_IMG_0129.JPG'),
(5, 'Millicent ', 'Chelagat', 33804040, 'milli@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Technician', '0000-00-00', '', '', '', '', 'carpenter', 'vbnm', '../Images/1568110249_IMG_0129.JPG'),
(8, 'Obadiah ', 'Chelagat', 33804040, 'mchela@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Technician', '0000-00-00', '', '', '', '', 'electrician', 'fghjm,', '1568109990_IMG_1152.JPG'),
(9, 'Millicent ', 'Waweru', 33804040, 'rose@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Client', '0000-00-00', '', '', '', '', 'welder', 'Straight Forward', '../Images/1568124373_IMG_2413.JPG'),
(10, 'monna ', 'owano', 34353789, 'monnaowano94@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'Client', '0000-00-00', '', '', '', '', '', 'fghjm,', '1568109990_IMG_1152.JPG'),
(11, 'laura ', 'akinyi', 34256789, 'lauraakinyi@gmail.com', '6ebe76c9fb411be97b3b0d48b791a7c9', 'Client', '0000-00-00', '', '', '', '', '', 'Ambitioni dedisse scripsisse iudicaretur. Cras mattis iudicium purus sit amet fermentum. Donec s', '1568109990_IMG_1152.JPG'),
(12, 'Maxwell ', 'Maragia', 333333333, 'maxmaragia@gmail.com', '68ab3a20b51cf480cf800e544b67761e', 'Client', '0000-00-00', '', '', '', '', '', 'fghjm,', '1568109990_IMG_1152.JPG'),
(13, 'Punky ', 'Adelle', 36622654, 'punki@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Technician', '0000-00-00', '', '', '', '', '', 'fghjm,', '1568109990_IMG_1152.JPG'),
(19, 'obadiah', 'Waweru', 112233, 'obadiahwaweru@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Admin', '0000-00-00', '', '', '', '', '', '', ''),
(31, 'martha', 'atieno', 22336655, 'ati@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Admin', '0000-00-00', '', '', '', '', '', '', ''),
(32, 'Victor', 'Mutuku', 14458796, 'vic@gmail.com', 'fc4f3b64bedd0882dc8b34922e61f423', 'Admin', '0000-00-00', '', '', '', '', '', '', ''),
(33, 'Harry', 'bruce', 33225577, 'harry@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Admin', '0000-00-00', '', '', '', '', '', '', ''),
(34, 'ahmed', 'dahir', 1234667, 'heykal@gmail.com', 'db5e0a61d4734b50da3e4e08917486f9', 'Client', '0000-00-00', '', '', '', '', '', '', ''),
(35, 'ahmed', 'dahir', 1234667, 'heykal@gmail.com', 'db5e0a61d4734b50da3e4e08917486f9', 'Client', '0000-00-00', '', '', '', '', '', '', ''),
(36, 'jonas', 'wanyela', 123456, 'jonas@gmail.com', 'b3258e8bf998591e0bf0e824caa0c9dc', 'Client', '0000-00-00', '', '', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`J_Id`);

--
-- Indexes for table `job_category`
--
ALTER TABLE `job_category`
  ADD PRIMARY KEY (`JC_Id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`R_Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`c_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `J_Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `job_category`
--
ALTER TABLE `job_category`
  MODIFY `JC_Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `R_Id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `c_Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
