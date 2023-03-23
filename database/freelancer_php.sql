-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2023 at 09:40 AM
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
-- Database: `freelancer_php`
--

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `s_no` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` bigint(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `age` int(255) NOT NULL,
  `height` int(255) NOT NULL,
  `weight` int(255) NOT NULL,
  `looking_for` varchar(255) NOT NULL,
  `attended_dc` varchar(255) NOT NULL,
  `exp_date_dc` date NOT NULL,
  `attended_mhf` varchar(255) NOT NULL,
  `exp_date_mhf` date NOT NULL,
  `current_status` varchar(255) NOT NULL,
  `lead_date` date NOT NULL,
  `comments` varchar(1000) NOT NULL,
  `assigned_to` varchar(255) NOT NULL,
  `followup_date` date NOT NULL,
  `is_organic` varchar(255) NOT NULL,
  `adset_name` varchar(255) NOT NULL,
  `campaign` varchar(255) NOT NULL,
  `vehicle` varchar(255) NOT NULL,
  `partner` varchar(255) NOT NULL,
  `platform` varchar(255) NOT NULL,
  `lead_id` varchar(255) NOT NULL,
  `cusomer_disc` varchar(1000) NOT NULL,
  `home_listing` varchar(255) NOT NULL,
  `retailer_id` int(255) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`s_no`, `name`, `phone`, `email`, `state`, `gender`, `age`, `height`, `weight`, `looking_for`, `attended_dc`, `exp_date_dc`, `attended_mhf`, `exp_date_mhf`, `current_status`, `lead_date`, `comments`, `assigned_to`, `followup_date`, `is_organic`, `adset_name`, `campaign`, `vehicle`, `partner`, `platform`, `lead_id`, `cusomer_disc`, `home_listing`, `retailer_id`, `created_at`) VALUES
(2, 'Vinit', 589562, 'vhuyhjn8@gmail.com', 'on', 'male', 65, 5, 5, 'Healthy Weight Loss', 'no', '2023-03-03', 'no', '2023-03-23', 'Paid & Joined Club', '2023-03-10', 'bt', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, '2023-03-20'),
(5, 'TEst', 486512, 'jhuij8@gmail.com', 'Uttar Pradesh', 'on', 65, 25, 36, 'ntjnnk', 'yes', '2023-03-01', 'no', '2023-03-29', 'none', '2023-03-31', 'ok', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, '2023-03-20'),
(6, 'TEst DAta', 5995959552, 'ngtybjknik@gmail.com', 'Uttar Pradesh', 'female', 55, 162, 54, 'Healthy Weight Gain', 'yes', '2023-03-14', 'no', '2023-03-17', 'Paid & Joined Club', '2023-03-22', 'none ', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, '2023-03-20'),
(7, 'Vivek Lawaniy', 999765565, 'gvbh8@gmai.com', 'onbh', 'malenj', 655, 55, 56, 'Healthy Weight Losshbbj', 'no nhby', '2023-03-08', 'nogty', '2023-03-07', 'Paid & Joined Clubvfg', '2023-03-01', 'btb gvtyg', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 0, '2023-03-21');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `s_no` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `active` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`s_no`, `username`, `password`, `date`, `active`) VALUES
(1, 'test', 'test', '2023-03-20', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`s_no`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`s_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `s_no` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `s_no` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
