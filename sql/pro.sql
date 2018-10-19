-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2018 at 02:22 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pro`
--

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `upload_id` bigint(10) NOT NULL,
  `user_id` bigint(10) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `upload_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `approved_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`upload_id`, `user_id`, `image`, `upload_date`, `approved_date`) VALUES
(1, 1, 'user_data/uploads/img1.jpg', '2018-10-05 01:29:53', NULL),
(2, 1, 'user_data/uploads/img2.jpg', '2018-10-05 01:30:52', NULL),
(3, 1, 'user_data/uploads/img3.jpg', '2018-10-05 01:30:52', NULL),
(4, 1, 'user_data/uploads/img4.jpg', '2018-10-05 01:30:52', NULL),
(11, 1, 'user_data/uploads/img5.jpg', '2018-10-05 09:26:12', NULL),
(12, 1, 'user_data/uploads/img1.jpg', '2018-10-05 11:12:21', NULL),
(13, 1, 'user_data/uploads/img2.jpg', '2018-10-05 11:12:22', NULL),
(14, 1, 'user_data/uploads/img1.jpg', '2018-10-05 11:35:03', NULL),
(15, 1, 'user_data/uploads/img2.jpg', '2018-10-05 11:44:18', NULL),
(16, 1, 'user_data/uploads/img5.jpg', '2018-10-05 11:44:18', NULL),
(17, 1, 'user_data/uploads/img3.jpg', '2018-10-05 11:44:18', NULL),
(18, 1, 'user_data/uploads/img4.jpg', '2018-10-05 11:44:19', NULL),
(19, 1, 'user_data/uploads/img2.jpg', '2018-10-05 11:44:19', NULL),
(20, 1, 'user_data/uploads/img1.jpg', '2018-10-05 11:44:19', NULL),
(21, 1, 'user_data/uploads/img5.jpg', '2018-10-05 11:44:19', NULL),
(22, 1, 'user_data/uploads/girl1.jpg', '2018-10-07 12:09:46', NULL),
(23, 1, 'user_data/uploads/img1.jpg', '2018-10-07 12:11:08', NULL),
(24, 1, 'user_data/uploads/img2.jpg', '2018-10-07 12:11:08', NULL),
(25, 1, 'user_data/uploads/img3.jpg', '2018-10-07 12:11:08', NULL),
(26, 1, 'user_data/uploads/img4.jpg', '2018-10-07 12:11:08', NULL),
(27, 1, 'user_data/uploads/img5.jpg', '2018-10-07 12:11:08', NULL),
(28, 20, 'user_data/uploads/girl1.jpg', '2018-10-07 12:13:15', NULL),
(29, 20, 'user_data/uploads/girl2.jpg', '2018-10-07 12:13:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `user_id` bigint(10) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `user_email` varchar(50) DEFAULT NULL,
  `user_password` varchar(50) DEFAULT NULL,
  `user_mobile` bigint(15) DEFAULT NULL,
  `user_shots` bigint(10) DEFAULT '0',
  `user_like` bigint(10) DEFAULT '0',
  `user_comment` bigint(10) DEFAULT '0',
  `user_image` varchar(100) DEFAULT NULL,
  `user_verificatiion` tinyint(1) DEFAULT '0',
  `verified_user` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`user_id`, `username`, `user_name`, `user_email`, `user_password`, `user_mobile`, `user_shots`, `user_like`, `user_comment`, `user_image`, `user_verificatiion`, `verified_user`) VALUES
(1, 'debasish', 'Debasish Bhol', 'deb4uon@gmail.com', '12345', 9056558975, 100, 0, 0, 'user_data/user_image/pp.jpeg', 0, 0),
(20, 'deb', 'Debasish Bhol', 'deb@gmail.com', '12345', 905655875, 0, 0, 0, 'user_data/user_image/11.jpg', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`upload_id`);

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `upload_id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `user_id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
