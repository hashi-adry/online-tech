-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 20, 2021 at 12:19 AM
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
-- Database: `Online-technician`
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
  `job_status` tinyint(1) NOT NULL,
  `comments` text DEFAULT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`J_Id`, `job_name`, `job_description`, `skill_needed`, `assigned_by`, `assigned_to`, `payment_method`, `job_status`, `comments`, `datetime`) VALUES
(1, 'Sink Blocked', 'Sink does not pass water', 'Plumbing', '', '', 'mpesa', 0, NULL, '2021-09-19 20:21:15'),
(6, 'Broken Table', 'What the fuck', 'plumbing', '', '', 'Mpesa', 0, NULL, '2021-09-19 20:21:15'),
(7, 'Broken Table', 'What the fuck.', 'Carpentry', '', '', 'Cash', 0, NULL, '2021-09-19 20:21:15'),
(8, 'Sink Blocked', 'Yeah Baby', 'plumbing', '', '', 'Mpesa', 0, NULL, '2021-09-19 20:21:15'),
(9, 'Sink Blocked', 'Yeah Baby', 'plumbing', '', '', 'Mpesa', 0, NULL, '2021-09-19 20:21:15'),
(10, 'Tap Replacement', 'Tap replacement service required immediately.', 'Carpentry', '', '', 'Paypal', 0, NULL, '2021-09-19 20:21:15'),
(11, 'Gate Repair', 'Gate fixing required ASAP.', 'welding', 'Millicent  Waweru', '0', 'Cash', 2, NULL, '2021-09-19 20:21:15'),
(12, 'Gate Repair', 'Gate fixing required ASAP.', 'welding', 'Millicent  Waweru', ' ', 'Cash', 2, NULL, '2021-09-19 20:21:15'),
(13, 'Broken Table', 'Bhjklsdaikvfdsv', 'Carpentry', 'Millicent  Waweru', ' ', 'Paypal', 0, NULL, '2021-09-19 20:21:15'),
(14, 'broken chairs', 'some chairs are broken', 'Carpentry', 'liz mutuku', '', 'Cash', 0, NULL, '2021-09-19 20:21:15'),
(15, 'sink blocked', 'plumbing', 'plumbing', 'liz mutuku', 'Adry Hashy', 'Cash', 1, NULL, '2021-09-19 20:21:15'),
(16, 'broken chairs', '', 'Carpentry', 'Liz mutuku', 'Adry Hashy', 'Cash', 1, NULL, '2021-09-19 20:21:15'),
(17, 'broken chairs', '', 'welding', 'Liz mutuku', 'Adry Hashy', 'Cash', 2, NULL, '2021-09-19 20:21:15'),
(18, 'broken chairs', '', 'welding', 'Liz mutuku', 'Adry Hashy', 'Cash', 2, NULL, '2021-09-19 20:21:15'),
(19, 'broken chairs', '', 'Carpentry', 'Liz mutuku', 'Adry Hashy', 'Cash', 2, NULL, '2021-09-19 20:21:15'),
(20, 'gate repair', '', 'welding', 'Liz mutuku', 'Adry Hashy', 'Cash', 2, NULL, '2021-09-19 20:21:15'),
(21, 'wimdow repair', '', 'welding', 'Liz mutuku', 'Adry Hashy', 'Cash', 2, NULL, '2021-09-19 20:21:15'),
(22, 'broken chairs', '', 'plumbing', 'meme meme', 'Adry Hashy', 'Cash', 2, 'Satisfactory work done', '2021-09-19 20:21:15'),
(23, 'Window Repair', '', 'Manual Labour', 'meme meme', 'Adry Hashy', 'Cash', 2, 'Poor and unsatisfactory work', '2021-09-19 20:21:15'),
(24, 'broken chairs', '', 'Carpentry', 'Liz mutuku', 'Adry Hashy', 'Cash', 2, NULL, '2021-09-19 22:00:41');

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
  `C_id` int(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `second_name` varchar(255) NOT NULL,
  `national_id` int(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`C_id`, `first_name`, `second_name`, `national_id`, `email`, `password`, `role`) VALUES
(1, 'Abdirizak', 'Hashy', 765432, 'hashiadry19@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Technician'),
(2, 'Abdirizak', 'Hashy', 765432, 'hashiadry19@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Technician'),
(3, 'Adry', 'Hashy', 456789, 'hashiadry19@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Admin'),
(4, 'Liz', 'mutuku', 456789, 'lizmutuku91@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Client'),
(5, 'hassan', 'hussein', 67890, 'hh@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', 'Technician'),
(6, 'meme', 'meme', 1234567, 'me@me.com', '9c2f924fb2f7004e7979ab2027ca1d65', 'Client');

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
  ADD PRIMARY KEY (`C_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `J_Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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
  MODIFY `C_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
