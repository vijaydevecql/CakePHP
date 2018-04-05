-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 28, 2017 at 08:41 PM
-- Server version: 5.5.54-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mmbooking`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `remember_me_hash` varchar(255) NOT NULL,
  `forgot_password_hash` varchar(255) NOT NULL,
  `role` varchar(100) NOT NULL,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email`, `name`, `password`, `status`, `remember_me_hash`, `forgot_password_hash`, `role`, `created`, `modified`) VALUES
(1, 'test978056@gmail.com', 'Admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, '', '3b5dbe2e5dab5d6028c52f62685ee375', 'admin', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `admin_settings`
--

CREATE TABLE IF NOT EXISTS `admin_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `status` int(2) NOT NULL,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE IF NOT EXISTS `ads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `image` varchar(64) NOT NULL,
  `type` int(3) NOT NULL COMMENT '1=> top ads, 3 => bottom-ads',
  `status` int(3) NOT NULL,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `title`, `image`, `type`, `status`, `created`, `modified`) VALUES
(17, 'testing', '002d6654ba069ef54242fe98131942f2648b00e7.png', 1, 1, 1503819466, 1503819466),
(18, 'banner1', '002d6654ba069ef54242fe98131942f2648b00e7.png', 1, 1, 1503822054, 1503822054),
(19, 'banner2', '002d6654ba069ef54242fe98131942f2648b00e7.png', 1, 1, 1503822072, 1503822072),
(20, 'side', '7eba6bc5a0a180fd7309eb42e21af63bab87e671.png', 2, 1, 1503822110, 1503822110),
(21, 'bottom1', '05594024e0aa5eb085e0caf0f1c2c8735bea59dc.png', 3, 1, 1503822175, 1503822175),
(22, 'bottom2', 'ceb48f779d32e118580d474ab23c5d79fad5b250.png', 3, 1, 1503822194, 1503822194);

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `photo` varchar(64) NOT NULL,
  `status` int(2) NOT NULL,
  `added` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `status` (`status`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `description`, `photo`, `status`, `added`, `created`, `modified`) VALUES
(2, 'Blog 1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'eeffc419b184c4e5756334fb427d7f026be4456e.png', 1, 1502275843, 1502275843, 1502275843),
(3, 'Blog 2', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '6a35636d1bdcb122874a6fdd85dc2ef92b1384b1.png', 1, 1502275888, 1502275888, 1502275888);

-- --------------------------------------------------------

--
-- Table structure for table `article_comments`
--

CREATE TABLE IF NOT EXISTS `article_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `status` int(2) NOT NULL,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `article_comments`
--

INSERT INTO `article_comments` (`id`, `comment`, `user_id`, `article_id`, `status`, `created`, `modified`) VALUES
(3, 'testing comments.', 253, 2, 1, 1502280116, 1502280116),
(4, 'testing comments.', 253, 2, 1, 1502280168, 1502280168),
(5, 'test comments again', 253, 2, 1, 1502281816, 1502281816),
(6, 'test comments.', 253, 3, 1, 1502282067, 1502282067),
(7, 'dgfdg', 253, 3, 1, 1502288919, 1502288919);

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE IF NOT EXISTS `bookings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ticket_category_id` int(11) NOT NULL,
  `number_of_tickets` int(3) NOT NULL,
  `coupon_id` int(11) NOT NULL,
  `price` float NOT NULL,
  `qrcode` varchar(255) NOT NULL,
  `status` int(2) NOT NULL,
  `card_holder_name` varchar(255) NOT NULL,
  `card_expiry_year` int(4) NOT NULL,
  `card_expiry_month` int(2) NOT NULL,
  `card_number` varchar(32) NOT NULL,
  `card_cvv` varchar(8) NOT NULL,
  `card_type` varchar(16) NOT NULL,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=57 ;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `event_id`, `user_id`, `ticket_category_id`, `number_of_tickets`, `coupon_id`, `price`, `qrcode`, `status`, `card_holder_name`, `card_expiry_year`, `card_expiry_month`, `card_number`, `card_cvv`, `card_type`, `created`, `modified`) VALUES
(1, 88, 86, 7, 5, 0, 0, '362649', 0, 'JD singh', 2017, 10, '123456780', '123', 'VISA', 1503054222, 1503054222),
(2, 88, 86, 7, 5, 0, 0, '405891', 0, 'JD singh', 2018, 10, '123456780', '123', 'VISA', 1503054409, 1503054409),
(3, 88, 86, 7, 5, 0, 0, '849085', 0, 'JD singh', 2018, 10, '123456780', '123', 'VISA', 1503054820, 1503054820),
(4, 88, 86, 7, 5, 0, 0, '357177', 0, 'JD singh', 2018, 10, '123456780', '123', 'VISA', 1503056053, 1503056053),
(5, 88, 86, 7, 5, 0, 0, '716752', 0, 'JD singh', 2018, 10, '123456780', '123', 'VISA', 1503056089, 1503056089),
(6, 88, 86, 7, 5, 0, 0, '172503', 0, 'JD singh', 2018, 10, '123456780', '123', 'VISA', 1503058648, 1503058648),
(7, 88, 86, 7, 5, 0, 0, '580329', 0, 'JD singh', 2018, 10, '123456780', '123', 'VISA', 1503060540, 1503060540),
(8, 88, 86, 7, 5, 0, 0, '782910', 0, 'JD singh', 2018, 10, '123456780', '123', 'VISA', 1503065601, 1503065601),
(9, 88, 90, 7, 11, 0, 0, '790735', 0, 'vinay', 22, 6, '66666666666', '123', 'VISA', 1503380721, 1503380721),
(10, 88, 90, 7, 11, 0, 0, '969051', 0, 'vinay', 22, 6, '66666666666', '123', 'visa', 1503380748, 1503380748),
(11, 1, 90, 5, 4, 0, 0, '194406', 0, 'ddd', 2024, 4, '123456', '123', 'VISA', 1503381560, 1503381560),
(12, 1, 90, 5, 1, 0, 0, '138188', 0, 'tutuy', 2023, 3, '454yuy688778', '1112', 'VISA', 1503381957, 1503381957),
(13, 1, 90, 5, 1, 0, 0, '421630', 0, 'tutuy', 2023, 3, '454yuy688778', '1112', 'VISA', 1503381967, 1503381967),
(14, 1, 90, 5, 1, 0, 0, '867716', 0, 'drr', 2023, 3, 'rrr', '1155', 'VISA', 1503392588, 1503392588),
(15, 1, 90, 16, 1, 0, 0, '393294', 0, 'gg', 2022, 3, 'gyy', '123', 'VISA', 1503392988, 1503392988),
(16, 88, 98, 7, 1, 0, 0, '796189', 0, '"the Haj"', 21, 9, '4242424424242442', '206', 'VISA', 1503396151, 1503396151),
(17, 88, 86, 7, 5, 0, 0, '712687', 0, 'JD singh', 2018, 10, '123456780', '123', 'VISA', 1503397780, 1503397780),
(18, 88, 86, 7, 5, 0, 0, '312879', 0, 'JD singh', 2018, 10, '123456780', '123', 'VISA', 1503398220, 1503398220),
(19, 88, 86, 7, 5, 0, 0, '741330', 0, 'JD singh', 18, 10, '123456780', '123', 'VISA', 1503398232, 1503398232),
(20, 88, 98, 7, 1, 0, 0, '623627', 0, '"the Haj"', 21, 9, '4242424424242442', '206', 'VISA', 1503403605, 1503403605),
(21, 88, 98, 7, 1, 0, 0, '297853', 0, '"the Haj"', 21, 9, '4242424424242442', '206', 'VISA', 1503403663, 1503403663),
(22, 88, 98, 7, 1, 0, 0, '744147', 0, '"the Haj"', 21, 9, '4242424424242442', '206', 'VISA', 1503403709, 1503403709),
(23, 1, 90, 14, 3, 0, 0, '716137', 0, 'ggy', 2021, 5, '124666788889', '1522', 'VISA', 1503465780, 1503465780),
(24, 1, 90, 5, 1, 0, 0, '178425', 0, 'hehrhr', 2020, 4, 'hehdh', '123', 'VISA', 1503465874, 1503465874),
(25, 1, 90, 14, 1, 0, 0, '485852', 0, 'uuuu', 2020, 5, 'hhh', '899', 'VISA', 1503468012, 1503468012),
(26, 1, 33, 5, 2, 0, 0, '121697', 0, 'fdhfdh', 2017, 1, '6546-5465-4654-6546', '654', 'VISA', 1503573655, 1503573655),
(27, 1, 33, 5, 2, 0, 0, '964877', 0, 'fdhfdh', 2017, 1, '6546-5465-4654-6546', '654', 'VISA', 1503573795, 1503573795),
(28, 1, 33, 5, 2, 0, 0, '608019', 0, 'fdhfdh', 2017, 1, '6546-5465-4654-6546', '654', 'VISA', 1503573992, 1503573992),
(29, 1, 33, 5, 2, 0, 0, '563222', 0, 'fdhfdh', 2017, 1, '6546-5465-4654-6546', '654', 'VISA', 1503574046, 1503574046),
(30, 1, 33, 5, 2, 0, 0, '229987', 0, 'fdhfdh', 2017, 1, '6546-5465-4654-6546', '654', 'VISA', 1503574121, 1503574121),
(31, 1, 33, 5, 2, 0, 0, '437402', 0, 'fdhfdh', 2017, 1, '6546-5465-4654-6546', '654', 'VISA', 1503574163, 1503574163),
(32, 1, 33, 5, 1, 0, 0, '129491', 0, 'fdgd', 2023, 5, '5464-6546-5465-4646', '123', 'AMERCIAN EXPRESS', 1503574877, 1503574877),
(33, 1, 33, 5, 1, 0, 0, '836367', 0, 'fdgd', 2023, 5, '5464-6546-5465-4646', '123', 'AMERCIAN EXPRESS', 1503574894, 1503574894),
(34, 1, 33, 5, 1, 0, 0, '332067', 0, 'fdgd', 2023, 5, '5464-6546-5465-4646', '123', 'AMERCIAN EXPRESS', 1503575042, 1503575042),
(35, 1, 33, 5, 1, 0, 0, '987269', 0, 'fdgd', 2023, 5, '5464-6546-5465-4646', '123', 'AMERCIAN EXPRESS', 1503575183, 1503575183),
(36, 1, 33, 5, 1, 0, 0, '186496', 0, 'fdgd', 2023, 5, '5464-6546-5465-4646', '123', 'AMERCIAN EXPRESS', 1503575246, 1503575246),
(37, 1, 33, 5, 1, 0, 0, '750729', 0, 'fdgd', 2023, 5, '5464-6546-5465-4646', '123', 'AMERCIAN EXPRESS', 1503575381, 1503575381),
(38, 1, 33, 5, 1, 0, 0, '891169', 0, 'fdgd', 2023, 5, '5464-6546-5465-4646', '123', 'AMERCIAN EXPRESS', 1503575756, 1503575756),
(39, 1, 33, 5, 1, 0, 0, '518559', 0, 'fdgd', 2023, 5, '5464-6546-5465-4646', '123', 'AMERCIAN EXPRESS', 1503575836, 1503575836),
(40, 1, 33, 5, 1, 0, 0, '295186', 1, 'fhfdhfd', 2020, 2, '4242-4242-4242-4242', '321', 'VISA', 1503576642, 1503576642),
(41, 1, 33, 5, 1, 0, 0, '686933', 0, 'fhfdhfd', 2020, 2, '4242-4242-4242-4242', '321', 'VISA', 1503576768, 1503576768),
(42, 1, 33, 5, 1, 0, 0, '527068', 1, 'fhfdhfd', 2020, 2, '4242-4242-4242-4242', '321', 'VISA', 1503577535, 1503577535),
(43, 1, 33, 5, 1, 0, 0, '748872', 1, 'fhfdhfd', 2020, 2, '4242-4242-4242-4242', '321', 'VISA', 1503577581, 1503577581),
(44, 1, 33, 5, 1, 0, 0, '180976', 0, 'hfhfgh', 2017, 1, '4242-4242-4242-4242', '321', 'VISA', 1503578702, 1503578702),
(45, 1, 33, 5, 1, 0, 0, '282496', 1, 'hfhfgh', 2017, 8, '4242-4242-4242-4242', '321', 'VISA', 1503578736, 1503578736),
(46, 1, 33, 5, 1, 0, 0, '354483', 1, 'hfhfgh', 2017, 8, '4242-4242-4242-4242', '321', 'VISA', 1503578797, 1503578797),
(47, 1, 33, 5, 1, 0, 0, '318674', 1, 'hfhfgh', 2017, 8, '4242-4242-4242-4242', '321', 'VISA', 1503578869, 1503578869),
(48, 1, 33, 5, 1, 0, 0, '668434', 1, 'hfhfgh', 2017, 8, '4242-4242-4242-4242', '321', 'VISA', 1503578943, 1503578943),
(49, 1, 33, 5, 1, 0, 0, '397143', 0, 'fgfdgh', 2017, 7, '4242-4242-4242-4242', '321', 'VISA', 1503578984, 1503578984),
(50, 1, 33, 5, 1, 0, 0, '331277', 1, 'fgfdgh', 2017, 10, '4242-4242-4242-4242', '321', 'VISA', 1503578999, 1503578999),
(51, 1, 33, 5, 1, 0, 0, '431375', 1, 'fgfdgh', 2017, 10, '4242-4242-4242-4242', '321', 'VISA', 1503579058, 1503579058),
(52, 1, 33, 5, 1, 0, 0, '541825', 1, 'fgfdgh', 2017, 10, '4242-4242-4242-4242', '321', 'VISA', 1503579110, 1503579110),
(53, 1, 33, 5, 12, 0, 0, '708901', 1, 'hghgf', 2020, 6, '4242-4242-4242-4242', '123', 'VISA', 1503579209, 1503579209),
(54, 1, 33, 5, 12, 0, 0, '228671', 0, 'ddsfsd', 2018, 10, '6565-6565-6565-6565', '262', 'MASTERCARD', 1503579300, 1503579300),
(55, 1, 33, 5, 12, 0, 0, '419127', 1, 'ddsfsd', 2018, 10, '4242-4242-4242-4242', '262', 'MASTERCARD', 1503579312, 1503579312),
(56, 1, 33, 5, 12, 0, 0, '431868', 0, 'gfdhfdhfd', 2017, 12, '4564-6546-5465-4654', '132', 'VISA', 1503579360, 1503579360);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`, `created`, `modified`) VALUES
(3, 'Live Bands', 1, 1502371718, 1503062242),
(4, 'Night life', 1, 1502371718, 1502371718),
(5, 'Fashion', 1, 1502371718, 1502371718),
(6, 'Concerts', 1, 1502371718, 1502371718),
(7, 'Outdoors', 1, 1502371718, 1502371718),
(12, 'Amrit', 0, 1502521704, 1502521704);

-- --------------------------------------------------------

--
-- Table structure for table `content_magements`
--

CREATE TABLE IF NOT EXISTS `content_magements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(120) NOT NULL,
  `value` text NOT NULL,
  `status` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `content_magements`
--

INSERT INTO `content_magements` (`id`, `key`, `value`, `status`, `created`, `modified`) VALUES
(8, 'about us', '<p>Cooming Soon....</p>', 1, 1503836983, 1503836983),
(9, 'Contact Us', '<p>Cooming Soon....</p>', 1, 1503837002, 1503837002),
(10, 'Term And Condition', '<p>Cooming Soon...</p>', 1, 1503837038, 1503837038);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `start_date` int(11) NOT NULL,
  `end_date` int(11) NOT NULL,
  `start_time` int(11) NOT NULL,
  `end_time` int(11) NOT NULL,
  `description` text NOT NULL,
  `location` varchar(255) NOT NULL,
  `lat` double NOT NULL,
  `long` double NOT NULL,
  `main_photo` text,
  `status` int(2) NOT NULL,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=116 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `user_id`, `name`, `start_date`, `end_date`, `start_time`, `end_time`, `description`, `location`, `lat`, `long`, `main_photo`, `status`, `created`, `modified`) VALUES
(1, 86, 'fashion_first_hlohfghfghf', 1506722400, 1503525600, 1503022800, 1503018900, 'Description on first eventcdfc', 'S.a.s.nagar (mohali)', 30.7046486, 76.7178726, '1503408933.png', 1, 1502371718, 1503066362),
(2, 38, 'fashion_second', 1503486000, 1503460800, 1503486000, 1503460800, 'Description on second event', 'Panchkula', 30.6942091, 76.860565, '1503829963.png', 1, 1502371718, 1502371718),
(3, 33, 'live_bands_first', 1503460800, 1503478800, 1503460800, 1503478800, 'live_bands_first_desc', 'Faridabad', 28.4089123, 77.3177894, '1503408933.png', 1, 1502373140, 1502373140),
(4, 33, 'live_bands_second', 1514023200, 1514032200, 1514023200, 1514032200, 'live_bands_second_desc', 'Panchkula', 30.6942091, 76.860565, '1503829982.png', 1, 1502373533, 1502373533),
(5, 33, 'outdoors_first', 1514023200, 1514032200, 1514023200, 1514032200, 'outdoors_first_desc', 'Panchkula', 30.6942091, 76.860565, '1503829963.png', 1, 1502373533, 1502373533),
(6, 33, 'outdoors_sec', 1514023200, 1514032200, 1514023200, 1514032200, 'outdoors_sec_desc', 'Panchkula', 30.6942091, 76.860565, '1503408933.png', 1, 1502373533, 1502373533),
(7, 33, 'outdoors_first', 1503460800, 1503478800, 1503460800, 1503478800, 'outdoors_first_desc', 'Faridabad', 28.4089123, 77.3177894, '1503829982.png', 1, 1502373140, 1502373140),
(78, 51, 'rdsad', 1502316000, 1502402400, 1502885460, 1502888700, 'dsadsa', 'Mohali, Punjab, India', 30.7046486, 76.71787259999996, '1503829982.png', 1, 1502868161, 1502868161),
(85, 80, 'CFSDFD', 1501711200, 1501711200, 1502892900, 1502885700, 'FDGFD', 'Maharashtra, India', 19.7514798, 75.71388839999997, '1503829982.png', 1, 1502882237, 1502882237),
(86, 80, 'HFGH', 1502402400, 1503612000, 1502846100, 1502885700, 'HFGHFG', 'Massachusetts, United States', 42.40721070000001, -71.38243740000001, '1503829982.png', 1, 1502882311, 1502882311),
(87, 86, 'gfgfdh', 1503525600, 1503612000, 1502932200, 1502928600, 'hfhfdh', 'Maharashtra, India', 19.7514798, 75.71388839999997, '1503408933.png', 1, 1502950387, 1502950387),
(88, 86, 'rdsf', 1502920800, 1503698400, 1502975400, 1502972100, 'dsafsaf', 'D Bothell Everett Highway, Bothell, WA, United States', 47.8110921, -122.20877860000002, '1503829963.png', 1, 1502950879, 1502950879),
(89, 86, 'fashion_first', 1504994400, 1505080800, 1502949600, 1502924400, 'Description on first event', 'S.a.s.nagar (mohali)', 30.7046486, 76.7178726, '1503829982.png', 1, 1502967354, 1502967354),
(90, 86, 'fashion_first_hlo', 1504994400, 1505080800, 1502949600, 1502924400, 'Description on first event', 'S.a.s.nagar (mohali)', 30.7046486, 76.7178726, '1503829982.png', 1, 1502967477, 1502967477),
(91, 86, 'erfwwer', 1502834400, 1503525600, 1503051300, 1503050880, ' efwe f e f wee we  r ', 'Mohali, Punjab, India', 30.7046486, 76.71787259999996, '1503829982.png', 1, 1503036902, 1503068319),
(92, 86, 'ammm', 1503093600, 1403130400, 1503051300, 1402048000, 'ddwq', 'Mohali, Punjab, India', 30.7046486, 76.71787259999996, '1503829982.png', 1, 1503041077, 1503041077),
(93, 86, 'fdhfdh', 1503612000, 1503698400, 1503011100, 1503011100, 'hfghfd', 'Prater M, Vienna, Austria', 48.21479189999999, 16.40596030000006, '1503829982.png', 1, 1503063153, 1503069190),
(98, 86, 'dfsd', 1503612000, 1503698400, 1503411300, 1503368100, 'fdgd', 'MO, United States', 37.9642529, -91.8318334, '1503829963.png', 1, 1503396029, 1503396029),
(99, 86, 'dsd', 1503612000, 1503612000, 1503364500, 1503403800, 'dsd', 'Maharashtra, India', 19.7514798, 75.71388839999997, '1503829963.png', 1, 1503399539, 1503399539),
(100, 86, 'dsd', 1503612000, 1503612000, 1503364500, 1503403800, 'dsd', 'Maharashtra, India', 19.7514798, 75.71388839999997, '1503829963.png', 1, 1503399726, 1503399726),
(101, 86, 'dsd', 1503612000, 1503612000, 1503364500, 1503403800, 'dsd', 'Maharashtra, India', 19.7514798, 75.71388839999997, '1503829963.png', 1, 1503399820, 1503399820),
(102, 86, 'fdgd', 1503612000, 1503698400, 1503364500, 1503407700, 'fdgfd', 'Massachusetts, United States', 42.40721070000001, -71.38243740000001, '1503400284.png', 1, 1503400284, 1503400284),
(103, 86, 'fgfdg', 1503698400, 1503698400, 1503407700, 1503407700, 'gfdgfdh', 'Maharashtra, India', 19.7514798, 75.71388839999997, '1503403669.png', 1, 1503403669, 1503403669),
(104, 86, 'yrtut', 1503612000, 1503612000, 1503407400, 1503403800, 'tretre', 'Maharashtra, India', 0, 0, '1503407599.png', 1, 1503405778, 1503405778),
(111, 86, 'ytryrt', 1503698400, 1503698400, 1503399900, 1503407700, 'yrtyrt', 'Prater M, Vienna, Austria', 48.21479189999999, 16.40596030000006, '1503407599.png', 1, 1503407599, 1503407599),
(112, 86, 'thrtyut', 1503698400, 1503698400, 1503407700, 1503407700, 'jhjgh', 'Massachusetts, United States', 42.40721070000001, -71.38243740000001, '1503407644.png', 1, 1503407644, 1503407644),
(115, 86, 'iuiyu', 1503698400, 1503698400, 1503364500, 1503364500, 'uytiyti', 'Maharashtra, India', 19.7514798, 75.71388839999997, '1503408933.png', 1, 1503407846, 1503408933);

-- --------------------------------------------------------

--
-- Table structure for table `event_categories`
--

CREATE TABLE IF NOT EXISTS `event_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1',
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=172 ;

--
-- Dumping data for table `event_categories`
--

INSERT INTO `event_categories` (`id`, `event_id`, `category_id`, `status`, `created`, `modified`) VALUES
(1, 1, 3, 1, 1502371718, 1502371718),
(2, 2, 6, 1, 1502371718, 1502371718),
(3, 2, 3, 1, 1502371718, 1502371718),
(4, 28, 4, 1, 1502534520, 1502534520),
(5, 28, 7, 1, 1502534520, 1502534520),
(7, 29, 6, 1, 1502534565, 1502534565),
(8, 29, 7, 1, 1502534565, 1502534565),
(9, 30, 4, 1, 1502534644, 1502534644),
(10, 30, 6, 1, 1502534645, 1502534645),
(11, 31, 4, 1, 1502535142, 1502535142),
(12, 31, 6, 1, 1502535142, 1502535142),
(13, 34, 5, 1, 1502708946, 1502708946),
(14, 34, 6, 1, 1502708946, 1502708946),
(15, 35, 5, 1, 1502708976, 1502708976),
(16, 35, 6, 1, 1502708976, 1502708976),
(17, 36, 5, 1, 1502709056, 1502709056),
(18, 36, 6, 1, 1502709056, 1502709056),
(19, 37, 5, 1, 1502709085, 1502709085),
(20, 37, 6, 1, 1502709085, 1502709085),
(21, 38, 5, 1, 1502709222, 1502709222),
(22, 38, 6, 1, 1502709222, 1502709222),
(23, 39, 5, 1, 1502709238, 1502709238),
(24, 39, 6, 1, 1502709238, 1502709238),
(25, 40, 5, 1, 1502709298, 1502709298),
(26, 40, 6, 1, 1502709298, 1502709298),
(27, 41, 5, 1, 1502709309, 1502709309),
(28, 41, 6, 1, 1502709309, 1502709309),
(29, 42, 5, 1, 1502709394, 1502709394),
(30, 42, 6, 1, 1502709394, 1502709394),
(31, 43, 5, 1, 1502709408, 1502709408),
(32, 43, 6, 1, 1502709409, 1502709409),
(33, 44, 5, 1, 1502709859, 1502709859),
(34, 44, 6, 1, 1502709859, 1502709859),
(35, 45, 5, 1, 1502710022, 1502710022),
(36, 45, 6, 1, 1502710023, 1502710023),
(37, 46, 5, 1, 1502710038, 1502710038),
(38, 46, 6, 1, 1502710038, 1502710038),
(39, 47, 5, 1, 1502710397, 1502710397),
(40, 47, 6, 1, 1502710397, 1502710397),
(41, 48, 5, 1, 1502710411, 1502710411),
(42, 48, 6, 1, 1502710411, 1502710411),
(43, 49, 5, 1, 1502710485, 1502710485),
(44, 49, 6, 1, 1502710485, 1502710485),
(45, 50, 5, 1, 1502710501, 1502710501),
(46, 50, 6, 1, 1502710501, 1502710501),
(47, 51, 5, 1, 1502711201, 1502711201),
(48, 51, 6, 1, 1502711201, 1502711201),
(49, 52, 5, 1, 1502711245, 1502711245),
(50, 52, 6, 1, 1502711245, 1502711245),
(51, 53, 5, 1, 1502711394, 1502711394),
(52, 53, 6, 1, 1502711394, 1502711394),
(53, 54, 5, 1, 1502711432, 1502711432),
(54, 54, 6, 1, 1502711432, 1502711432),
(55, 55, 5, 1, 1502711467, 1502711467),
(56, 55, 6, 1, 1502711467, 1502711467),
(57, 56, 5, 1, 1502711894, 1502711894),
(58, 56, 6, 1, 1502711894, 1502711894),
(59, 57, 4, 1, 1502711962, 1502711962),
(60, 57, 7, 1, 1502711962, 1502711962),
(61, 58, 5, 1, 1502712402, 1502712402),
(62, 58, 6, 1, 1502712402, 1502712402),
(63, 59, 5, 1, 1502712423, 1502712423),
(64, 59, 6, 1, 1502712423, 1502712423),
(65, 60, 5, 1, 1502713222, 1502713222),
(66, 60, 7, 1, 1502713222, 1502713222),
(67, 61, 5, 1, 1502714238, 1502714238),
(68, 61, 7, 1, 1502714238, 1502714238),
(69, 62, 6, 1, 1502721705, 1502721705),
(70, 62, 7, 1, 1502721705, 1502721705),
(72, 63, 5, 1, 1502721846, 1502721846),
(74, 64, 5, 1, 1502721956, 1502721956),
(76, 65, 5, 1, 1502721984, 1502721984),
(78, 66, 5, 1, 1502722000, 1502722000),
(80, 67, 5, 1, 1502722449, 1502722449),
(82, 68, 5, 1, 1502722679, 1502722679),
(83, 69, 4, 1, 1502723185, 1502723185),
(84, 69, 5, 1, 1502723185, 1502723185),
(87, 71, 4, 1, 1502723374, 1502723374),
(88, 71, 5, 1, 1502723374, 1502723374),
(89, 71, 6, 1, 1502723374, 1502723374),
(90, 71, 12, 1, 1502723374, 1502723374),
(91, 72, 4, 1, 1502723479, 1502723479),
(92, 73, 4, 1, 1502723646, 1502723646),
(97, 76, 5, 1, 1502724422, 1502724422),
(98, 76, 6, 1, 1502724422, 1502724422),
(99, 77, 5, 1, 1502865444, 1502865444),
(100, 77, 6, 1, 1502865444, 1502865444),
(101, 78, 3, 1, 1502868161, 1502868161),
(102, 78, 4, 1, 1502868161, 1502868161),
(103, 85, 3, 1, 1502882237, 1502882237),
(104, 85, 5, 1, 1502882237, 1502882237),
(105, 86, 4, 1, 1502882311, 1502882311),
(106, 86, 5, 1, 1502882311, 1502882311),
(107, 87, 4, 1, 1502950387, 1502950387),
(108, 87, 6, 1, 1502950387, 1502950387),
(109, 88, 3, 1, 1502950879, 1502950879),
(110, 88, 6, 1, 1502950879, 1502950879),
(111, 1, 3, 1, 1502967763, 1502967763),
(112, 1, 7, 1, 1502967763, 1502967763),
(114, 1, 7, 1, 1502967789, 1502967789),
(116, 1, 7, 1, 1502967879, 1502967879),
(117, 91, 12, 1, 1503036902, 1503036902),
(118, 92, 15, 1, 1503041077, 1503041077),
(119, 93, 3, 1, 1503063153, 1503063153),
(122, 1, 7, 1, 1503064451, 1503064451),
(123, 95, 16, 1, 1503064514, 1503064514),
(125, 97, 4, 1, 1503065161, 1503065161),
(128, 1, 7, 1, 1503065415, 1503065415),
(131, 97, 4, 1, 1503065707, 1503065707),
(133, 1, 7, 1, 1503065729, 1503065729),
(135, 1, 7, 1, 1503065760, 1503065760),
(137, 1, 7, 1, 1503065852, 1503065852),
(139, 1, 7, 1, 1503065981, 1503065981),
(140, 97, 4, 1, 1503065997, 1503065997),
(143, 1, 7, 1, 1503066331, 1503066331),
(145, 1, 7, 1, 1503066362, 1503066362),
(146, 93, 3, 1, 1503068162, 1503068162),
(147, 91, 12, 1, 1503068319, 1503068319),
(148, 93, 3, 1, 1503068364, 1503068364),
(149, 93, 3, 1, 1503068385, 1503068385),
(150, 93, 3, 1, 1503068414, 1503068414),
(151, 93, 3, 1, 1503068820, 1503068820),
(152, 93, 3, 1, 1503068981, 1503068981),
(153, 93, 3, 1, 1503069055, 1503069055),
(154, 93, 3, 1, 1503069190, 1503069190),
(155, 98, 4, 1, 1503396029, 1503396029),
(156, 99, 4, 1, 1503399539, 1503399539),
(157, 100, 4, 1, 1503399726, 1503399726),
(158, 101, 4, 1, 1503399820, 1503399820),
(159, 102, 6, 1, 1503400284, 1503400284),
(160, 103, 3, 1, 1503403669, 1503403669),
(161, 104, 4, 1, 1503405778, 1503405778),
(164, 111, 3, 1, 1503407599, 1503407599),
(165, 111, 5, 1, 1503407599, 1503407599),
(166, 112, 5, 1, 1503407644, 1503407644),
(167, 115, 6, 1, 1503407846, 1503407846),
(168, 115, 6, 1, 1503408735, 1503408735),
(169, 115, 6, 1, 1503408869, 1503408869),
(170, 115, 6, 1, 1503408910, 1503408910),
(171, 115, 6, 1, 1503408933, 1503408933);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `status`) VALUES
(1, 'admin', 1),
(2, 'user', 1),
(3, 'event organizer', 1);

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE IF NOT EXISTS `media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(2) NOT NULL,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=77 ;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `event_id`, `image`, `status`, `created`, `modified`) VALUES
(1, 85, 'd0a5a52c4c03264e006f4958291741d1f0c3ac2b.png', 1, 1502882237, 1502882237),
(2, 86, '49323a094100f0e1d881efea07ef09c85f392a46.png', 1, 1502882311, 1502882311),
(3, 86, '4485986fc9b4c9bb0536d298c287724e99fc9070.png', 1, 1502882311, 1502882311),
(4, 86, 'c3653b5b28bc7541cc9083a341e6bd9a2ad3a2c7.png', 1, 1502882311, 1502882311),
(12, 1, '0b418f63b10c4d267a4781bbcd02be4487f5660f.png', 1, 1502973375, 1502973375),
(13, 1, '69bede0d3d7b93b563b5f6a32359d97dd33c9363.png', 1, 1502973422, 1502973422),
(14, 1, 'ef31b5aeed552c2fdf045f58c88604f3ccab9a4b.png', 1, 1502977685, 1502977685),
(15, 1, 'ef96cc57c1faf3d81f7710351d76294a8e22efe3.jpg', 1, 1502977950, 1502977950),
(16, 1, '314dca8a3fcf99d4c472729f8b11dbdf30e8d40f.png', 1, 1503033684, 1503033684),
(17, 1, '4b71bcdee0ee7f2f0fe817cee4b30ac1b99a60e9.png', 1, 1503033860, 1503033860),
(18, 1, '11f0040f743955a21b7604d4b8461894b0f3db4c.png', 1, 1503034017, 1503034017),
(19, 1, 'd28afa11baa65b8b719160d865e00ca7485b4209.png', 1, 1503034209, 1503034209),
(20, 1, 'a10a03958d762a24803e4a6039e44e86ec09bd95.png', 1, 1503034293, 1503034293),
(22, 2, '417a0df80bbeca6c4e3373d31da7463e85794438.png', 1, 1503038145, 1503038145),
(23, 2, 'b172f19757daffa84a584ea320c73b1bdfdfaad3.png', 1, 1503038146, 1503038146),
(24, 1, '5bab9086d1cda3d0e34e7c65e22d2cf2cd7754d2.jpg', 1, 1503043079, 1503043079),
(27, 1, '0f902b6646702e8e3c4ef5f705a09f4cbe6ab588.png', 1, 1503048385, 1503048385),
(28, 1, 'c28c059c7c7e5cfe65043aa22bf374b0f232dd23.png', 1, 1503048429, 1503048429),
(29, 1, '1a8b4d259012498d1941e9903ac6ff9da97f1a28.png', 1, 1503049007, 1503049007),
(30, 1, '29485c3749bffd81ec4eb89740a729b340bd6b8b.jpg', 1, 1503049533, 1503049533),
(31, 1, 'e1e5243df75b8c68568d655a26c3847a404b0694.jpg', 1, 1503049576, 1503049576),
(32, 1, '3ceb22b8e0f8b0a3102ab1f92e5281b5573cc83f.jpg', 1, 1503049611, 1503049611),
(33, 1, '957e314cbbdfc309289ac747494ae935dba3751b.jpg', 1, 1503049701, 1503049701),
(34, 1, '4295d7a9d02f1e7b7229f4ab43c5537854d17548.jpg', 1, 1503049975, 1503049975),
(35, 1, 'c700bffcd807017f0b4c62760816de4b6ad5649a.jpg', 1, 1503050262, 1503050262),
(36, 1, '10c90bbc956f67699bafdd08826f06d31142cf72.jpg', 1, 1503050324, 1503050324),
(37, 1, 'cb99a72b47636f625603b3b138fb9844a562c507.jpg', 1, 1503050523, 1503050523),
(38, 1, 'e71d2cc9f1b000b0ef8d266e31293f0cb79892ce.png', 1, 1503050696, 1503050696),
(39, 1, 'd3bc0ffb635ccb9fdf5cf82d324320670aa08072.jpg', 1, 1503050717, 1503050717),
(40, 1, '3a2ec35c35376ef70e59293b97d8ec172baf949f.png', 1, 1503050719, 1503050719),
(41, 1, 'c3ece6785d3105a324cfaf0058fc4dae2280bc14.png', 1, 1503050720, 1503050720),
(42, 1, '7a40206fae6d93a0f0a2fa6a0383edcb40daeb4e.jpg', 1, 1503050774, 1503050774),
(43, 1, '3771277ca657fac7830ae3b47624f6659ac1a033.png', 1, 1503050777, 1503050777),
(44, 1, 'e4cc5e4919e80a5478afee9bd668355bc17d7a2d.png', 1, 1503050778, 1503050778),
(45, 1, 'cc4a636f6cbb3ecd0f7cc8a7ddd1b7c0a6c5adfa.png', 1, 1503051161, 1503051161),
(46, 1, '9b0f5fc327ef4b3743c9ba864b2ca94c0e59d874.jpg', 1, 1503051173, 1503051173),
(47, 1, '027fb0c96876f1e5f0b3aaf0eee88b3448da3776.jpg', 1, 1503051556, 1503051556),
(48, 1, 'd0f0976f6f1912a2f5680452003991002ae58929.png', 1, 1503051635, 1503051635),
(49, 1, 'b6c755096a5aac6bcbc95584d630f9930dc2ee99.jpg', 1, 1503051666, 1503051666),
(50, 1, '53add523764bd602cf0d3e540984408aba96711a.png', 1, 1503051759, 1503051759),
(51, 1, 'e080f46e2ebac3ab728bb1bae3d4e0e5e01ed5b1.png', 1, 1503051859, 1503051859),
(52, 1, '42c364ffb075f5bf156e85dc3c772e62bb38b284.png', 1, 1503051888, 1503051888),
(53, 1, '98111d572ab5de744d61facfc3e5a3c355f8ea6e.png', 1, 1503051926, 1503051926),
(54, 1, '64045890ac0d848e4fa745994b61d03c063a6d0d.jpg', 1, 1503051948, 1503051948),
(55, 1, 'b55e6d46dedde242009e684d36944f16e95f6965.png', 1, 1503051967, 1503051967),
(56, 1, 'fa7365ecd05405515c90f8649e4c5f2c4815084c.png', 1, 1503052223, 1503052223),
(57, 1, 'ab2cf36e2c1babc51dd0ad24550854ddf2d29c67.png', 1, 1503052238, 1503052238),
(58, 1, 'e6f7136c8aca576a4d87c7c226d673b27e4e4960.jpg', 1, 1503052258, 1503052258),
(59, 1, '84bac8ca3ad445ca64065193f17c2624e2084d89.jpg', 1, 1503052298, 1503052298),
(60, 1, '727765c4ff05800679cfbe43eb1d336f8a1a2e71.png', 1, 1503052329, 1503052329),
(61, 1, '48d14eeaa80a225269d09031f0c9e8fa5e9fe627.png', 1, 1503052420, 1503052420),
(62, 1, '4f948e344f2fee4b3a71f7711a23e7c7c6bf69ff.png', 1, 1503052460, 1503052460),
(63, 1, 'b4f3e2f9644a540556d1692536d84dffc98ab296.jpg', 1, 1503052565, 1503052565),
(64, 1, '0351bbfc0bef66f1941a4a48a885c1345efeeb69.png', 1, 1503052613, 1503052613),
(65, 1, 'fcca31e332a4fdeb7a5f06f89ec800b7c2cba524.jpg', 1, 1503052632, 1503052632),
(66, 1, '742920906454ff8e4bd03a7a34659eccbcc2dffb.png', 1, 1503052726, 1503052726),
(67, 1, 'b1a7710a74033b17aecbffb5f45f8e3af2fa5f33.png', 1, 1503052856, 1503052856),
(68, 1, '80ebcebcbff01a085003ce1620f819d123d6d0e9.jpg', 1, 1503053516, 1503053516),
(69, 1, '64167d48f62e4244de90c528cb73be891faf6518.jpg', 1, 1503053556, 1503053556),
(70, 1, '2dcc4f31bbf3d63f5a74a1f85508e0aa2bd722ae.png', 1, 1503053663, 1503053663),
(71, 1, 'c69454974a7af8df3a40e4a2f9369474e606c2b1.png', 1, 1503053746, 1503053746),
(72, 1, 'c3a2082cc28eb5a015218d40e49d6623a0cd8088.png', 1, 1503053830, 1503053830),
(73, 1, 'fdf593e6e9b398eb5f5fc94e5c1cf4785cd3156b.jpg', 1, 1503053885, 1503053885),
(74, 1, 'eeba781d3e66b28a445b2fba3b05f722f76b5193.png', 1, 1503053926, 1503053926),
(75, 1, '0633e0d21a706925886e78af2177de13a93015ee.png', 1, 1503054016, 1503054016),
(76, 1, '6a03f0b63a619cdcd2f952e59628b679b60775cc.jpg', 1, 1503054352, 1503054352);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `user2id` int(11) NOT NULL,
  `is_read` int(1) NOT NULL,
  `status` int(2) NOT NULL,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `user_id_2` (`user_id`),
  KEY `user2id` (`user2id`),
  KEY `is_read` (`is_read`),
  KEY `status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `type` int(4) NOT NULL,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `status`, `type`, `created`, `modified`) VALUES
(1, 'facebook', 'www.facebook.com', 1, 0, 0, 1503904171),
(2, 'twitter', 'www.twitter.con', 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ticket_categories`
--

CREATE TABLE IF NOT EXISTS `ticket_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `number_of_tickets` int(11) NOT NULL,
  `price_per_person` float NOT NULL,
  `status` int(2) NOT NULL,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `ticket_categories`
--

INSERT INTO `ticket_categories` (`id`, `event_id`, `name`, `number_of_tickets`, `price_per_person`, `status`, `created`, `modified`) VALUES
(5, 1, 'hfh', 23, 55, 1, 1502724422, 1502724422),
(6, 76, 'hfh', 25, 55, 1, 1502724422, 1502724422),
(7, 86, 'rvca', 12, 13, 1, 1502956601, 1502956601),
(8, 86, 'ravk', 21, 23, 1, 1502957273, 1502957273),
(9, 88, 'rs', 12, 38, 1, 1502957727, 1502957727),
(10, 88, 'sad', 465, 465, 1, 1502957783, 1502957783),
(11, 88, 'fdf', 12, 323, 1, 1502957931, 1502957931),
(12, 88, 'fdf', 12, 323, 1, 1502957945, 1502957945),
(13, 88, 'fdf', 12, 323, 1, 1502957958, 1502957958),
(16, 1, 'Silver', 100, 123, 1, 1502962209, 1502962209),
(17, 28, 'qwe', 12, 89, 1, 1503038009, 1503038009),
(18, 28, 'qwe', 12, 89, 1, 1503038037, 1503038037),
(19, 28, 'as', 111, 22, 1, 1503038038, 1503038038),
(20, 2, 'ssss', 12, 12, 1, 1503038106, 1503038106),
(21, 95, 'q', 0, 0, 1, 1503064759, 1503064759);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `status` varchar(100) NOT NULL,
  `transactions_id` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `event_id`, `amount`, `status`, `transactions_id`, `details`, `created`, `modified`) VALUES
(3, 33, 1, 660, 'succeeded', 'txn_1AuKrhDGLWnQvwylq1OeJZ8g', 'Stripe\\Charge JSON: {\n    "id": "ch_1AuKrgDGLWnQvwylWpSTEMhX",\n    "object": "charge",\n    "amount": 660,\n    "amount_refunded": 0,\n    "application": null,\n    "application_fee": null,\n    "balance_transaction": "txn_1AuKrhDGLWnQvwylq1OeJZ8g",\n    "captured": true,\n    "created": 1503579316,\n    "currency": "usd",\n    "customer": "cus_BGscEpt1SAvuj7",\n    "description": null,\n    "destination": null,\n    "dispute": null,\n    "failure_code": null,\n    "failure_message": null,\n    "fraud_details": [\n\n    ],\n    "invoice": null,\n    "livemode": false,\n    "metadata": [\n\n    ],\n    "on_behalf_of": null,\n    "order": null,\n    "outcome": {\n        "network_status": "approved_by_network",\n        "reason": null,\n        "risk_level": "normal",\n        "seller_message": "Payment complete.",\n        "type": "authorized"\n    },\n    "paid": true,\n    "receipt_email": null,\n    "receipt_number": null,\n    "refunded": false,\n    "refunds": {\n        "object": "list",\n        "data": [\n\n        ],\n        "has_more": false,\n        "total_count": 0,\n        "url": "\\/v1\\/charges\\/ch_1AuKrgDGLWnQvwylWpSTEMhX\\/refunds"\n    },\n    "review": null,\n    "shipping": null,\n    "source": {\n        "id": "card_1AuKrdDGLWnQvwyl54AZEnUN",\n        "object": "card",\n        "address_city": null,\n        "address_country": null,\n        "address_line1": null,\n        "address_line1_check": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": null,\n        "brand": "Visa",\n        "country": "US",\n        "customer": "cus_BGscEpt1SAvuj7",\n        "cvc_check": "pass",\n        "dynamic_last4": null,\n        "exp_month": 10,\n        "exp_year": 2018,\n        "fingerprint": "KOQwjRwNhz53PA6s",\n        "funding": "credit",\n        "last4": "4242",\n        "metadata": [\n\n        ],\n        "name": null,\n        "tokenization_method": null\n    },\n    "source_transfer": null,\n    "statement_descriptor": null,\n    "status": "succeeded",\n    "transfer_group": null\n}', 1503579317, 1503579317);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL DEFAULT ' ',
  `last_name` varchar(200) CHARACTER SET latin1 NOT NULL,
  `dob` int(11) NOT NULL,
  `mobile` varchar(30) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL,
  `password` varchar(200) CHARACTER SET latin1 NOT NULL,
  `gender` enum('male','female') CHARACTER SET latin1 NOT NULL,
  `city` varchar(200) CHARACTER SET latin1 NOT NULL,
  `country` varchar(100) CHARACTER SET latin1 NOT NULL,
  `type` int(2) NOT NULL COMMENT '1 => user, 2 => Event_organizer',
  `photo` varchar(64) NOT NULL,
  `group_id` int(11) NOT NULL,
  `get_alerts` int(2) NOT NULL DEFAULT '1',
  `email_verified` int(11) NOT NULL,
  `phone_verified` int(11) NOT NULL,
  `device_type` int(11) NOT NULL,
  `device_token` varchar(255) CHARACTER SET latin1 NOT NULL,
  `authorization_key` varchar(255) CHARACTER SET latin1 NOT NULL,
  `unique_id` varchar(255) CHARACTER SET latin1 NOT NULL,
  `otp` int(11) NOT NULL,
  `password_reset_token` varchar(100) CHARACTER SET latin1 NOT NULL,
  `id_facebook` int(11) NOT NULL,
  `token_facebook` varchar(255) CHARACTER SET latin1 NOT NULL,
  `status_facebook` int(2) NOT NULL,
  `photo_facebook` varchar(255) CHARACTER SET latin1 NOT NULL,
  `id_instagram` int(11) NOT NULL,
  `token_instagram` varchar(255) CHARACTER SET latin1 NOT NULL,
  `status_instagram` int(2) NOT NULL,
  `photo_instagram` int(255) NOT NULL,
  `nationality` varchar(255) CHARACTER SET latin1 NOT NULL,
  `id_twitter` int(11) NOT NULL,
  `token_twitter` varchar(255) CHARACTER SET latin1 NOT NULL,
  `status_twitter` int(2) NOT NULL,
  `photo_twitter` varchar(255) CHARACTER SET latin1 NOT NULL,
  `status` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=107 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `dob`, `mobile`, `email`, `password`, `gender`, `city`, `country`, `type`, `photo`, `group_id`, `get_alerts`, `email_verified`, `phone_verified`, `device_type`, `device_token`, `authorization_key`, `unique_id`, `otp`, `password_reset_token`, `id_facebook`, `token_facebook`, `status_facebook`, `photo_facebook`, `id_instagram`, `token_instagram`, `status_instagram`, `photo_instagram`, `nationality`, `id_twitter`, `token_twitter`, `status_twitter`, `photo_twitter`, `status`, `created`, `modified`) VALUES
(33, 'test', 'abc', 0, '+9888598885', 'test5@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'male', '', '', 0, '', 2, 1, 0, 0, 1, '123456789', '28e18c30a79240b1e6f0eace9e4bf08391c4f9a3', '16b06bd9b738835e2d134fe8d596e9ab0086a985', 1111, '', 0, '', 0, '', 0, '', 0, 0, '', 0, '', 0, '', 1, 1502878718, 1502878718),
(40, 'ravi', 'kumar', 0, '9468054742', 'test978056@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'female', 'test', 'test', 0, '', 1, 1, 0, 0, 0, '', '', '', 0, '', 0, '', 0, '', 0, '', 0, 0, '', 0, '', 0, '', 1, 1502446317, 1502446317),
(41, 'Varun', 'Cqlsys', 0, '', 'varun@cqlsys.co.uk', '123456', 'male', 'abc', 'cba', 0, '', 2, 1, 0, 0, 0, '', '', '', 0, '', 0, '', 0, '', 0, '', 0, 0, 'admin@admin.com', 0, '', 0, '', 1, 1502519980, 1503062592),
(42, 'amrit', 'singh', 0, '988894115', 'amritpal424@gmail.com', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e', 'female', 'mohali', 'india', 0, '', 2, 1, 0, 0, 0, '', '387b38769096a8cbd15cbc83275acc216be67a1e', '', 0, '8084a145f9f8ea3fa69aaba230557949916162b5', 0, '', 0, '', 0, '', 0, 0, '', 0, '', 0, '', 1, 1502520081, 1502520081),
(45, 'bbbb', 'bbb', 0, '9888940115', 'amritpal525@gmail.ocm', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'female', 'qwqwqqq', 'sqqqdqd', 0, '', 2, 1, 0, 0, 0, '', '', '', 0, '', 0, '', 0, '', 0, '', 0, 0, '', 0, '', 0, '', 1, 1502522066, 1502522066),
(86, 'vinay', 'piplani', 0, '+917503067780', 'vinaypiplani1@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'male', '', '', 1, '', 3, 1, 0, 0, 1, '123456789', '277ba666f95a49608fa4fed34c4f5696a964ea88', '3c26dffc8a2e8804dfe2c8a1195cfaa5ef6d0014', 0, 'e41100937a1ae6911e4069f83712fb563ec551cd', 0, '', 0, '', 0, '', 0, 0, '', 0, '', 0, '', 1, 1502875582, 1502875582),
(90, 'Amit', 'Dang', 1502834400, '+919780601819', 'amit.dang77@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'male', '', '', 1, '', 2, 1, 0, 0, 0, 'c_s1cJpBQWU:APA91bFs3-JxQjPKSTuCHmWHzDntR8PA0eywRMqchAXfdDDjPjPdG0f5Q9MlJRtAB0z--YfcKsAwNcgdEV4ayfxnwOjgHEhj-6o3uQvVCTgHqmWM3-sAPDOexzuke1kkEWzHg2N9ICqP', '9770f514911bebbbd996e5bb715dd980e817ecef', '2d0c8af807ef45ac17cafb2973d866ba8f38caa9', 0, '886551b7c7b07d296e7b29b2331cd825833251ac', 0, '', 0, '', 0, '', 0, 0, '', 0, '', 0, '', 1, 1502890185, 1502890185),
(93, 'ravi', 'kumar', 0, '919468054742', 'test978056@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'male', 'sirsa', 'india', 0, '', 3, 1, 0, 0, 0, '', '', '', 0, '', 0, '', 0, '', 0, '', 0, 0, 'indian', 0, '', 0, '', 1, 1503040246, 1503040246),
(97, '', '', 0, '', 'jd3.cqlsys@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'male', '', '', 1, '', 2, 1, 0, 0, 0, '', '24811b8ec6e37ed751db751f6485c14a304b6653', '', 0, '', 0, '', 0, '', 0, '', 0, 0, '', 0, '', 0, '', 0, 1503048360, 1503048360),
(98, 'vinu', 'cqlsys', 0, '+919914770659', 'vinay.cqlsys@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'male', '', '', 1, '', 2, 1, 0, 0, 1, '123456789', 'a22f70c9543563bf61b2216b0331b4060565fb62', '31bd9b9f5f7b338e41b56183a2f3008b541d7c84', 0, '', 0, '', 0, '', 0, '', 0, 0, '', 0, '', 0, '', 1, 1503051619, 1503051619),
(99, 'Varun', 'Garg', 528156000, '+919354760798', 'varun27986@gmail.com', '5cec175b165e3d5e62c9e13ce848ef6feac81bff', 'male', '', '', 2, '', 2, 1, 0, 0, 0, 'cZtUhRdU_Wk:APA91bGNdaIp0IK4BhYvwRwq0geI3iiXFWlTLZpa3mSc0ECcx-AFM8pXY-Ge3MctkZHp96k4wszVg71vPy7KgvC0MsVpG1PD1Z8mJFcgl9OTJRyxn-WfnK9vgVicOB9m_narcT-r5Vt1', '6f9f30b6d205a316e557cba4bb5135c9c8db438c', '9a79be611e0267e1d943da0737c6c51be67865a0', 0, '', 0, '', 0, '', 0, '', 0, 0, '', 0, '', 0, '', 1, 1503059764, 1503059764),
(100, '', '', 0, '', 'abc@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'male', '', '', 1, '', 2, 1, 0, 0, 0, '', '5311b7603f6229657456bac64de5809ec7cf1fc0', '', 0, '', 0, '', 0, '', 0, '', 0, 0, '', 0, '', 0, '', 0, 1503060485, 1503060485),
(102, 'Jaspreet', 'Kaur', 0, '+917889090728', 'jaspreet@cqlsys.co.uk', '8cb2237d0679ca88db6464eac60da96345513964', 'male', '', '', 1, '', 2, 1, 0, 0, 1, '123456789', 'd2a460ee00d1afa86cd4850a2c5793c4ecef44cb', 'c8306ae139ac98f432932286151dc0ec55580eca', 1111, '', 0, '', 0, '', 0, '', 0, 0, '', 0, '', 0, '', 0, 1503061875, 1503061875),
(103, 'jas', 'Kaur', 0, '+917889090723', 'jaspreet981994@gmail.con', '8cb2237d0679ca88db6464eac60da96345513964', 'male', '', '', 1, '', 2, 1, 0, 0, 1, '123456789', '648ab74cb200acb59ff6e632aefd4bffa054cf21', '934385f53d1bd0c1b8493e44d0dfd4c8e88a04bb', 0, '', 0, '', 0, '', 0, '', 0, 0, '', 0, '', 0, '', 1, 1503062021, 1503062021),
(104, 'aaa', 'aaa', 0, 'aaa', 'aaa@gmail.com', '123456', 'male', 'aaa', 'aaaa', 0, '', 3, 1, 0, 0, 0, '', '', '', 0, '', 0, '', 0, '', 0, '', 0, 0, 'admin@admin.com', 0, '', 0, '', 1, 1503062616, 1503062758),
(105, 'Babbar', 'Singh', 1234567890, '+919888940115', 'babbarankit90@gmail.com', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e', 'male', '', '', 2, '', 2, 0, 0, 0, 0, 'ftQtpBygmWs:APA91bGOEnb3xg9XiuPJQFbjq19B8Q3GDwXDOZKqqBaBVczKkRDKMgxFJrYRT3j_RymcAvPwGvEexcUrYFGY297gkoZ39Y5aaWgAaVIJXIcGzpbNyduaeyGi08criW8vnaEYQtlTnga5', '3658bbd2e70616e509710125070824568459f70a', 'e114c448f4ab8554ad14eff3d66dfeb3965ce8fc', 1111, '', 0, '', 0, '', 0, '', 0, 0, '', 0, '', 0, '', 1, 1503383831, 1503383831),
(106, 'keshav', 'Kumar', 0, '+919803356120', 'keshav@cqlsys.co.uk', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e', 'male', '', '', 1, '', 0, 1, 0, 0, 1, '123456789', '303d479a5348274c9b0d5220658712a7c8d40e8a', '7224f997fc148baa0b7f81c1eda6fcc3fd003db0', 1111, '', 0, '', 0, '', 0, '', 0, 0, '', 0, '', 0, '', 0, 1503467798, 1503467798);

-- --------------------------------------------------------

--
-- Table structure for table `users_articles`
--

CREATE TABLE IF NOT EXISTS `users_articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `article_id` (`article_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
