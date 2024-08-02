-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2022 at 06:15 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.3.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `monetizeskill`
--

-- --------------------------------------------------------

--
-- Table structure for table `current_details`
--

CREATE TABLE `current_details` (
  `curr_id` int(3) NOT NULL,
  `user_id` int(3) NOT NULL,
  `title` varchar(40) NOT NULL,
  `employee_type` varchar(30) NOT NULL,
  `company` varchar(40) NOT NULL,
  `state` varchar(40) NOT NULL,
  `city` varchar(30) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `current_details`
--

INSERT INTO `current_details` (`curr_id`, `user_id`, `title`, `employee_type`, `company`, `state`, `city`, `description`) VALUES
(1, 1, 'Retail Manager', 'freelancer', 'IBM', 'Maharashtra', 'Nashik', 'Pleasent environment to work within'),
(2, 2, 'HR', 'self employeed', 'IBM', 'Maharashtra', 'Pune', 'Greate place to work in');

-- --------------------------------------------------------

--
-- Table structure for table `educational`
--

CREATE TABLE `educational` (
  `edu_id` int(3) NOT NULL,
  `user_id` int(11) NOT NULL,
  `university` varchar(50) NOT NULL,
  `degree` varchar(40) NOT NULL,
  `field_of_study` varchar(40) NOT NULL,
  `start` varchar(30) NOT NULL,
  `end` varchar(30) NOT NULL,
  `activities` varchar(300) NOT NULL,
  `description` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `educational`
--

INSERT INTO `educational` (`edu_id`, `user_id`, `university`, `degree`, `field_of_study`, `start`, `end`, `activities`, `description`) VALUES
(1, 1, 'KK wagh', 'BCA  ', 'Commerce', '2019-02', '2022-11', 'Participated in emarge', 'Greate collage'),
(2, 2, 'KK Wagh', 'BSc', 'Science', '2019-05', '2022-07', 'Emerge', 'Fun');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(3) NOT NULL,
  `uinfo_id` int(3) NOT NULL,
  `username` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(10) NOT NULL,
  `profile_image` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `uinfo_id`, `username`, `email`, `pass`, `profile_image`) VALUES
(1, 1, 'ankit', 'ankitseth@gmail.com', '123', 'iron_man2.jpg'),
(2, 2, 'raj', 'raj@gmail.com', '456', 'car3.jpg'),
(3, 3, 'rajat', 'rajat@gmail.com', 'rajat', 'bike1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `uinfo_id` int(11) NOT NULL,
  `user_id` int(3) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `age` int(1) NOT NULL,
  `dob` date NOT NULL,
  `phone` bigint(11) NOT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `headline` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`uinfo_id`, `user_id`, `firstname`, `lastname`, `age`, `dob`, `phone`, `city`, `state`, `headline`) VALUES
(1, 1, 'Ankit', 'Seth', 20, '2001-12-31', 9834847744, 'nashik', 'maharashtra', 'hard working person'),
(2, 2, 'Raj', 'seth', 20, '2001-05-18', 9870345545, 'nashik', 'maharashtra', 'Enthusiastic person'),
(3, 3, 'Rajat', 'sharma', 20, '2002-09-12', 9845556789, 'Mumbai', 'Maharshtra', 'Team leader and focused');

-- --------------------------------------------------------

--
-- Table structure for table `work_images`
--

CREATE TABLE `work_images` (
  `wimg_id` int(3) NOT NULL,
  `user_id` int(3) NOT NULL,
  `img_name` varchar(30) NOT NULL,
  `img_desc` varchar(500) NOT NULL,
  `link` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `work_images`
--

INSERT INTO `work_images` (`wimg_id`, `user_id`, `img_name`, `img_desc`, `link`) VALUES
(1, 2, 'portfolio-3.jpg', 'picture taken of an artificial plant', ''),
(2, 3, 'iron_man1.jpg', 'Graphically designed picture of the famous character ironman  ', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `current_details`
--
ALTER TABLE `current_details`
  ADD PRIMARY KEY (`curr_id`);

--
-- Indexes for table `educational`
--
ALTER TABLE `educational`
  ADD PRIMARY KEY (`edu_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`uinfo_id`);

--
-- Indexes for table `work_images`
--
ALTER TABLE `work_images`
  ADD PRIMARY KEY (`wimg_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `current_details`
--
ALTER TABLE `current_details`
  MODIFY `curr_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `educational`
--
ALTER TABLE `educational`
  MODIFY `edu_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `uinfo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `work_images`
--
ALTER TABLE `work_images`
  MODIFY `wimg_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
