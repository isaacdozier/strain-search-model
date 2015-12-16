-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2015 at 09:30 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `strain_reviews`
--

-- --------------------------------------------------------

--
-- Table structure for table `##reviews`
--

CREATE TABLE IF NOT EXISTS `##reviews` (
  `id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `review_text` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `#spc_users`
--

CREATE TABLE IF NOT EXISTS `#spc_users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `retail_loc_id` int(11) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `#user_creds`
--

CREATE TABLE IF NOT EXISTS `#user_creds` (
  `user_id` int(11) NOT NULL,
  `email` varchar(400) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `farm_list`
--

CREATE TABLE IF NOT EXISTS `farm_list` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `img` varchar(1000) NOT NULL DEFAULT 'no-image-available.gif'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Table structure for table `lots`
--

CREATE TABLE IF NOT EXISTS `lots` (
  `id` int(11) NOT NULL,
  `farm_id` int(11) NOT NULL,
  `lot_number` varchar(16) NOT NULL,
  `strain_id` int(11) NOT NULL,
  `harvest_date` date NOT NULL,
  `img` varchar(1000) NOT NULL DEFAULT 'no_available_image.gif'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Table structure for table `retail_loc_list`
--

CREATE TABLE IF NOT EXISTS `retail_loc_list` (
  `id` int(11) NOT NULL,
  `name` varchar(120) NOT NULL,
  `website` varchar(200) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Table structure for table `strain_list`
--

CREATE TABLE IF NOT EXISTS `strain_list` (
  `id` int(11) NOT NULL,
  `SHI_type` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
  `id` int(11) NOT NULL,
  `strain_id` int(11) NOT NULL,
  `lot_id` int(11) NOT NULL,
  `retail_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;


--
-- Indexes for dumped tables
--

--
-- Indexes for table `##reviews`
--
ALTER TABLE `##reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `#spc_users`
--
ALTER TABLE `#spc_users`
  ADD UNIQUE KEY `user_id` (`id`);

--
-- Indexes for table `farm_list`
--
ALTER TABLE `farm_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lots`
--
ALTER TABLE `lots`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `retail_loc_list`
--
ALTER TABLE `retail_loc_list`
  ADD UNIQUE KEY `retail_id` (`id`);

--
-- Indexes for table `strain_list`
--
ALTER TABLE `strain_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `##reviews`
--
ALTER TABLE `##reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `#spc_users`
--
ALTER TABLE `#spc_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `farm_list`
--
ALTER TABLE `farm_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `lots`
--
ALTER TABLE `lots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `retail_loc_list`
--
ALTER TABLE `retail_loc_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `strain_list`
--
ALTER TABLE `strain_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
