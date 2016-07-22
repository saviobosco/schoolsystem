-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1build0.15.04.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 21, 2016 at 12:21 AM
-- Server version: 5.6.28-0ubuntu0.15.04.1
-- PHP Version: 5.6.4-4ubuntu6.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `schoolsystem2`
--


-- --------------------------------------------------------

--
-- Table structure for table `applicants_entrance_results`
--

CREATE TABLE IF NOT EXISTS `applicants_entrance_results` (
`id` int(11) NOT NULL,
  `applicant_id` varchar(15) NOT NULL,
  `total` int(11) NOT NULL,
  `grade` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `applicants_interview_results`
--

CREATE TABLE IF NOT EXISTS `applicants_interview_results` (
`id` int(11) NOT NULL,
  `applicant_id` int(15) NOT NULL,
  `total` int(11) NOT NULL,
  `grade` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `applicants_pins`
--

CREATE TABLE IF NOT EXISTS `applicants_pins` (
`id` int(11) NOT NULL,
  `serial_number` varchar(15) NOT NULL,
  `pin` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `applications_submitted`
--

CREATE TABLE IF NOT EXISTS `applications_submitted` (
  `id` varchar(15) NOT NULL,
  `fullname` varchar(150) NOT NULL,
  `maiden_name` varchar(150) NOT NULL,
  `sex` enum('male','female') CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `marital_status` enum('yes','no') NOT NULL,
  `religion` varchar(50) NOT NULL,
  `place_of_birth` varchar(150) NOT NULL,
  `state_of_origin` varchar(150) NOT NULL,
  `l_g_a` varchar(100) NOT NULL,
  `nationality` varchar(150) NOT NULL,
  `postal_address` varchar(150) NOT NULL,
  `permanent_home_address` varchar(150) NOT NULL,
  `next_of_kin` varchar(150) NOT NULL,
  `address_of_next_of_kin` varchar(150) NOT NULL,
  `relationship_to_next_of_kin` varchar(50) NOT NULL,
  `phone_number` varchar(30) NOT NULL,
  `school_id` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `file_upload_1` varchar(255) DEFAULT NULL,
  `file_upload_2` varchar(255) DEFAULT NULL,
  `file_upload_3` varchar(255) DEFAULT NULL,
  `file_upload_4` varchar(255) DEFAULT NULL,
  `sponsor` enum('individual','corporate body') CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `occupation_of_sponsor` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `name_of_sponsor` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

-- --------------------------------------------------------

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE IF NOT EXISTS `schools` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `name`, `created`, `modified`) VALUES
(1, 'schools of Nursing', '2016-06-10 15:30:18', '2016-06-10 15:30:18'),
(2, 'schools of MidWifrey', '2016-06-10 15:30:41', '2016-06-10 15:30:41');


-- --------------------------------------------------------

--
-- Table structure for table `social_accounts`
--

CREATE TABLE IF NOT EXISTS `social_accounts` (
  `id` char(36) NOT NULL,
  `user_id` char(36) NOT NULL,
  `provider` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `reference` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `description` text,
  `link` varchar(255) NOT NULL,
  `token` varchar(500) NOT NULL,
  `token_secret` varchar(500) DEFAULT NULL,
  `token_expires` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `data` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` char(36) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `school_id` tinyint(4) NOT NULL,
  `session_id` tinyint(4) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `token_expires` datetime DEFAULT NULL,
  `api_token` varchar(255) DEFAULT NULL,
  `activation_date` datetime DEFAULT NULL,
  `tos_date` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `is_superuser` tinyint(1) NOT NULL DEFAULT '0',
  `role` varchar(255) DEFAULT 'user',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `first_name`, `last_name`, `school_id`, `session_id`, `token`, `token_expires`, `api_token`, `activation_date`, `tos_date`, `active`, `is_superuser`, `role`, `created`, `modified`) VALUES
('f3de5f31-861b-434c-83fe-c84468e0adc8', 'admin', 'admin@admin.com', '$2y$10$3unD3snyq04Sg4QE7CAYw.gbwAps0278KIT3iFRlLNGkz9oF3tNFu', 'admin', 'admin', 0, 0, NULL, NULL, NULL, '2016-06-15 09:40:32', '2016-06-15 09:40:32', 1, 1, 'admin', '2016-06-15 09:40:32', '2016-06-19 17:37:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicants_entrance_results`
--
ALTER TABLE `applicants_entrance_results`
 ADD PRIMARY KEY (`id`,`applicant_id`);

--
-- Indexes for table `applicants_interview_results`
--
ALTER TABLE `applicants_interview_results`
 ADD PRIMARY KEY (`id`), ADD KEY `BY_TOTAL` (`total`);

--
-- Indexes for table `applicants_pins`
--
ALTER TABLE `applicants_pins`
 ADD PRIMARY KEY (`id`,`serial_number`), ADD KEY `pins` (`serial_number`);

--
-- Indexes for table `applications_submitted`
--
ALTER TABLE `applications_submitted`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `UNIQUE_ID` (`id`);


--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_accounts`
--
ALTER TABLE `social_accounts`
 ADD PRIMARY KEY (`id`), ADD KEY `user_id` (`user_id`);


--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicants_entrance_results`
--
ALTER TABLE `applicants_entrance_results`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `applicants_interview_results`
--
ALTER TABLE `applicants_interview_results`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `applicants_pins`
--
ALTER TABLE `applicants_pins`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `sessions`
--

--
-- Constraints for table `social_accounts`
--
ALTER TABLE `social_accounts`
ADD CONSTRAINT `social_accounts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
