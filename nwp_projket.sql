-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2023 at 06:19 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nwp_projket`
--

-- --------------------------------------------------------

--
-- Table structure for table `agencies`
--

CREATE TABLE `agencies` (
  `agency_id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `city_name` varchar(64) NOT NULL,
  `status` enum('enabled','disabled') NOT NULL DEFAULT 'enabled',
  `logo` varchar(100) NOT NULL,
  `password` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agencies`
--

INSERT INTO `agencies` (`agency_id`, `name`, `city_name`, `status`, `logo`, `password`) VALUES
(5, 'ToursUnited', 'Szabadka', 'enabled', 'IMG_20190322_102832.jpg', ''),
(7, 'mosomasaV2', 'budapest', 'enabled', 'IMG_20190322_102832.jpg', ''),
(11, 'Piano', 'Topolya', 'enabled', '', '$2y$10$fFZipa8/hDPKYb6LTQ6PLuVpeesvqCQ1Bi5LNvVz91FNk5uMQJtGW');

-- --------------------------------------------------------

--
-- Table structure for table `attractions`
--

CREATE TABLE `attractions` (
  `attraction_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `details` varchar(64) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `address` varchar(64) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `active` enum('enable','disable') NOT NULL DEFAULT 'enable',
  `agency_id` int(11) NOT NULL,
  `viewCount` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attractions`
--

INSERT INTO `attractions` (`attraction_id`, `city_id`, `name`, `details`, `image`, `address`, `latitude`, `longitude`, `active`, `agency_id`, `viewCount`) VALUES
(7, 5, 'Uj SzokoKut', 'Padok meg stb nagyon szep hely', 'Screenshot_20191229_201336.jpg', 'ohtid 52', 45.81463, 19.630385, 'enable', 7, 0),
(12, 5, 'Test1', 'asdasdd', '4a Logo.png', 'Glavna 1', 45.813103, 19.631152, 'enable', 11, 3),
(13, 1, 'Test2', 'asdasd', '4a Logo.png', 'adsasd', 45.813103, 19.631152, 'enable', 11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`city_id`, `city_name`) VALUES
(1, 'budapest'),
(2, 'Szabadka'),
(5, 'Topolya');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `attraction_id` int(11) NOT NULL,
  `text` varchar(256) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` enum('disabled','public','hidden') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `attraction_id`, `text`, `user_id`, `status`) VALUES
(10, 7, 'Yarr harr me mateys it be me captain tarres', 1, 'public'),
(12, 7, 'another one', 1, 'public'),
(13, 7, 'Hey guys want some skooma?', 15, 'public');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` varchar(124) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `user_id` int(11) NOT NULL,
  `attraction_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `image_id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `attraction_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`image_id`, `image`, `attraction_id`) VALUES
(5, 'default.jpg', 0),
(66, 'IMG_20190322_102832.jpg', 12),
(67, '4a Logo.png', 12),
(68, 'capcom.png', 12),
(69, 'Untitled-1.png', 12);

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `user_id` int(11) NOT NULL,
  `browser` varchar(256) NOT NULL,
  `ip_address` varchar(64) NOT NULL,
  `LastLoginDate` date NOT NULL DEFAULT current_timestamp(),
  `device_type` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`user_id`, `browser`, `ip_address`, `LastLoginDate`, `device_type`) VALUES
(15, 'mozilla/5.0 (windows nt 10.0; win64; x64; rv:109.0) gecko/20100101 firefox/111.0', '127.0.0.1', '2023-04-10', 'computer'),
(15, 'mozilla/5.0 (windows nt 10.0; win64; x64; rv:109.0) gecko/20100101 firefox/112.0', '127.0.0.1', '2023-04-22', 'computer'),
(1, 'mozilla/5.0 (windows nt 10.0; win64; x64; rv:109.0) gecko/20100101 firefox/112.0', '127.0.0.1', '2023-04-22', 'computer'),
(15, 'mozilla/5.0 (windows nt 10.0; win64; x64; rv:109.0) gecko/20100101 firefox/112.0', '127.0.0.1', '2023-04-22', 'computer'),
(15, 'mozilla/5.0 (windows nt 10.0; win64; x64; rv:109.0) gecko/20100101 firefox/112.0', '127.0.0.1', '2023-04-22', 'computer'),
(15, 'mozilla/5.0 (windows nt 10.0; win64; x64; rv:109.0) gecko/20100101 firefox/112.0', '127.0.0.1', '2023-04-22', 'computer'),
(1, 'mozilla/5.0 (windows nt 10.0; win64; x64; rv:109.0) gecko/20100101 firefox/112.0', '127.0.0.1', '2023-04-22', 'computer'),
(1, 'mozilla/5.0 (windows nt 10.0; win64; x64; rv:109.0) gecko/20100101 firefox/112.0', '127.0.0.1', '2023-04-25', 'computer'),
(1, 'mozilla/5.0 (windows nt 10.0; win64; x64; rv:109.0) gecko/20100101 firefox/112.0', '127.0.0.1', '2023-04-28', 'computer'),
(1, 'mozilla/5.0 (windows nt 10.0; win64; x64; rv:109.0) gecko/20100101 firefox/112.0', '127.0.0.1', '2023-04-29', 'computer'),
(1, 'mozilla/5.0 (windows nt 10.0; win64; x64; rv:109.0) gecko/20100101 firefox/112.0', '127.0.0.1', '2023-05-09', 'computer'),
(1, 'mozilla/5.0 (windows nt 10.0; win64; x64; rv:109.0) gecko/20100101 firefox/112.0', '127.0.0.1', '2023-05-11', 'computer'),
(1, 'mozilla/5.0 (windows nt 10.0; win64; x64; rv:109.0) gecko/20100101 firefox/112.0', '127.0.0.1', '2023-05-12', 'computer'),
(1, 'mozilla/5.0 (windows nt 10.0; win64; x64; rv:109.0) gecko/20100101 firefox/112.0', '127.0.0.1', '2023-05-14', 'computer'),
(1, 'mozilla/5.0 (windows nt 10.0; win64; x64; rv:109.0) gecko/20100101 firefox/112.0', '127.0.0.1', '2023-05-14', 'computer'),
(1, 'mozilla/5.0 (windows nt 10.0; win64; x64; rv:109.0) gecko/20100101 firefox/113.0', '127.0.0.1', '2023-05-18', 'computer'),
(1, 'mozilla/5.0 (windows nt 10.0; win64; x64; rv:109.0) gecko/20100101 firefox/113.0', '127.0.0.1', '2023-05-19', 'computer'),
(1, 'mozilla/5.0 (windows nt 10.0; win64; x64; rv:109.0) gecko/20100101 firefox/113.0', '127.0.0.1', '2023-05-21', 'computer'),
(1, 'mozilla/5.0 (windows nt 10.0; win64; x64; rv:109.0) gecko/20100101 firefox/113.0', '127.0.0.1', '2023-05-21', 'computer'),
(1, 'mozilla/5.0 (windows nt 10.0; win64; x64; rv:109.0) gecko/20100101 firefox/113.0', '127.0.0.1', '2023-05-21', 'computer'),
(1, 'mozilla/5.0 (windows nt 10.0; win64; x64; rv:109.0) gecko/20100101 firefox/113.0', '127.0.0.1', '2023-05-22', 'computer'),
(1, 'mozilla/5.0 (windows nt 10.0; win64; x64; rv:109.0) gecko/20100101 firefox/113.0', '127.0.0.1', '2023-05-22', 'computer'),
(1, 'mozilla/5.0 (windows nt 10.0; win64; x64; rv:109.0) gecko/20100101 firefox/113.0', '127.0.0.1', '2023-05-23', 'computer'),
(1, 'mozilla/5.0 (windows nt 10.0; win64; x64; rv:109.0) gecko/20100101 firefox/113.0', '127.0.0.1', '2023-05-23', 'computer'),
(15, 'mozilla/5.0 (windows nt 10.0; win64; x64; rv:109.0) gecko/20100101 firefox/113.0', '127.0.0.1', '2023-05-23', 'computer'),
(1, 'mozilla/5.0 (windows nt 10.0; win64; x64; rv:109.0) gecko/20100101 firefox/113.0', '127.0.0.1', '2023-05-25', 'computer'),
(1, 'mozilla/5.0 (windows nt 10.0; win64; x64; rv:109.0) gecko/20100101 firefox/113.0', '127.0.0.1', '2023-05-25', 'computer'),
(1, 'mozilla/5.0 (windows nt 10.0; win64; x64; rv:109.0) gecko/20100101 firefox/113.0', '127.0.0.1', '2023-05-25', 'computer'),
(15, 'mozilla/5.0 (windows nt 10.0; win64; x64; rv:109.0) gecko/20100101 firefox/113.0', '127.0.0.1', '2023-05-25', 'computer'),
(1, 'mozilla/5.0 (windows nt 10.0; win64; x64; rv:109.0) gecko/20100101 firefox/113.0', '127.0.0.1', '2023-05-25', 'computer'),
(1, 'mozilla/5.0 (windows nt 10.0; win64; x64; rv:109.0) gecko/20100101 firefox/113.0', '127.0.0.1', '2023-05-25', 'computer'),
(1, 'mozilla/5.0 (windows nt 10.0; win64; x64; rv:109.0) gecko/20100101 firefox/113.0', '127.0.0.1', '2023-05-25', 'computer'),
(1, 'mozilla/5.0 (windows nt 10.0; win64; x64; rv:109.0) gecko/20100101 firefox/113.0', '127.0.0.1', '2023-05-25', 'computer'),
(1, 'mozilla/5.0 (windows nt 10.0; win64; x64; rv:109.0) gecko/20100101 firefox/113.0', '127.0.0.1', '2023-05-26', 'computer'),
(1, 'mozilla/5.0 (windows nt 10.0; win64; x64; rv:109.0) gecko/20100101 firefox/113.0', '127.0.0.1', '2023-05-26', 'computer'),
(1, 'mozilla/5.0 (windows nt 10.0; win64; x64; rv:109.0) gecko/20100101 firefox/113.0', '127.0.0.1', '2023-05-26', 'computer'),
(1, 'mozilla/5.0 (windows nt 10.0; win64; x64; rv:109.0) gecko/20100101 firefox/113.0', '127.0.0.1', '2023-05-26', 'computer'),
(1, 'mozilla/5.0 (windows nt 10.0; win64; x64; rv:109.0) gecko/20100101 firefox/113.0', '127.0.0.1', '2023-05-26', 'computer'),
(1, 'mozilla/5.0 (windows nt 10.0; win64; x64; rv:109.0) gecko/20100101 firefox/113.0', '127.0.0.1', '2023-05-31', 'computer'),
(1, 'mozilla/5.0 (windows nt 10.0; win64; x64; rv:109.0) gecko/20100101 firefox/113.0', '127.0.0.1', '2023-05-31', 'computer'),
(1, 'mozilla/5.0 (windows nt 10.0; win64; x64; rv:109.0) gecko/20100101 firefox/113.0', '127.0.0.1', '2023-06-08', 'computer'),
(1, 'mozilla/5.0 (windows nt 10.0; win64; x64; rv:109.0) gecko/20100101 firefox/113.0', '127.0.0.1', '2023-06-08', 'computer'),
(1, 'mozilla/5.0 (windows nt 10.0; win64; x64; rv:109.0) gecko/20100101 firefox/113.0', '127.0.0.1', '2023-06-10', 'computer'),
(1, 'mozilla/5.0 (windows nt 10.0; win64; x64; rv:109.0) gecko/20100101 firefox/113.0', '127.0.0.1', '2023-06-11', 'computer');

-- --------------------------------------------------------

--
-- Table structure for table `qr_code`
--

CREATE TABLE `qr_code` (
  `id_qr_code` int(11) NOT NULL,
  `file_name` varchar(256) NOT NULL,
  `code` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tours`
--

CREATE TABLE `tours` (
  `attraction_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `first_name` varchar(32) NOT NULL,
  `last_name` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `new_password` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `token` varchar(64) NOT NULL,
  `permissions` enum('registered','agency','admin') NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `registry_expires` datetime(3) NOT NULL,
  `activationToken` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `first_name`, `last_name`, `password`, `new_password`, `email`, `token`, `permissions`, `active`, `registry_expires`, `activationToken`) VALUES
(1, 'Gabor', 'Torda', '$2y$10$XoRnMQGg3hJft.8ThLDl7eBZrdS6cGmnBc2Z2CB7IjCYXprTwJjwO', '', 'assblast@usa.com', 'asd', 'admin', 1, '2022-12-03 15:45:51.000', NULL),
(15, 'Crassus', 'with', '$2y$10$BtU6w/SWq4amBq9BS/oel.Doy7Hg1RXInEeBab0be.cFaik2nrkbC', 'ZzwIjgApkHyuWakQowUlgPofXydDdwHzlEiiLwxV', 'notblast@gmail.com', '', 'registered', 1, '2023-03-15 15:03:08.000', 'RezJuiVzoRjoMppBapNslAlcCplUvoQnxOefSlhU');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agencies`
--
ALTER TABLE `agencies`
  ADD PRIMARY KEY (`agency_id`),
  ADD KEY `city_name` (`city_name`);

--
-- Indexes for table `attractions`
--
ALTER TABLE `attractions`
  ADD PRIMARY KEY (`attraction_id`),
  ADD KEY `city_id` (`city_id`),
  ADD KEY `agency_id` (`agency_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`city_id`),
  ADD KEY `city_name` (`city_name`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD KEY `comment_id` (`comment_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `attraction_id` (`attraction_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `attraction_id` (`attraction_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `attraction_id` (`attraction_id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `qr_code`
--
ALTER TABLE `qr_code`
  ADD PRIMARY KEY (`id_qr_code`);

--
-- Indexes for table `tours`
--
ALTER TABLE `tours`
  ADD KEY `attraction_id` (`attraction_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agencies`
--
ALTER TABLE `agencies`
  MODIFY `agency_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `attractions`
--
ALTER TABLE `attractions`
  MODIFY `attraction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `qr_code`
--
ALTER TABLE `qr_code`
  MODIFY `id_qr_code` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `agencies`
--
ALTER TABLE `agencies`
  ADD CONSTRAINT `agencies_ibfk_1` FOREIGN KEY (`city_name`) REFERENCES `cities` (`city_name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `attractions`
--
ALTER TABLE `attractions`
  ADD CONSTRAINT `attractions_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `cities` (`city_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `attractions_ibfk_3` FOREIGN KEY (`agency_id`) REFERENCES `agencies` (`agency_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`attraction_id`) REFERENCES `attractions` (`attraction_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_4` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favorites_ibfk_2` FOREIGN KEY (`attraction_id`) REFERENCES `attractions` (`attraction_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `logs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tours`
--
ALTER TABLE `tours`
  ADD CONSTRAINT `tours_ibfk_1` FOREIGN KEY (`attraction_id`) REFERENCES `attractions` (`attraction_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tours_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `event_delete` ON SCHEDULE EVERY 1 DAY STARTS '2023-03-08 18:43:06' ON COMPLETION PRESERVE ENABLE DO DELETE FROM users WHERE registry_expires < now() AND active!=1$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
