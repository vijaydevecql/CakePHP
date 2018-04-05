-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 23, 2017 at 11:53 AM
-- Server version: 5.5.54-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.21

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `title`, `image`, `type`, `status`, `created`, `modified`) VALUES
(1, 'Top Ad 1', 'eventmanagement1.jpg', 1, 1, 0, 0),
(2, 'Top Ad 1', 'em2.jpg', 3, 1, 0, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

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
(25, 1, 90, 14, 1, 0, 0, '485852', 0, 'uuuu', 2020, 5, 'hhh', '899', 'VISA', 1503468012, 1503468012);

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
(12, 'Amrit', 1, 1502521704, 1502521704);

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
(1, 86, 'fashion_first_hlohfghfghf', 1506722400, 1503525600, 1503022800, 1503018900, 'Description on first eventcdfc', 'S.a.s.nagar (mohali)', 30.7046486, 76.7178726, 'data:image/png;base64,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', 1, 1502371718, 1503066362),
(2, 38, 'fashion_second', 1503486000, 1503460800, 1503486000, 1503460800, 'Description on second event', 'Panchkula', 30.6942091, 76.860565, 'http://202.164.42.226/staging/mmbooking/app/webroot/files/events/rock_event.jpg', 1, 1502371718, 1502371718),
(3, 33, 'live_bands_first', 1503460800, 1503478800, 1503460800, 1503478800, 'live_bands_first_desc', 'Faridabad', 28.4089123, 77.3177894, 'http://202.164.42.226/staging/mmbooking/app/webroot/files/events/rock_event.jpg', 1, 1502373140, 1502373140),
(4, 33, 'live_bands_second', 1514023200, 1514032200, 1514023200, 1514032200, 'live_bands_second_desc', 'Panchkula', 30.6942091, 76.860565, 'http://202.164.42.226/staging/mmbooking/app/webroot/files/events/rock_event.jpg', 1, 1502373533, 1502373533),
(5, 33, 'outdoors_first', 1514023200, 1514032200, 1514023200, 1514032200, 'outdoors_first_desc', 'Panchkula', 30.6942091, 76.860565, 'http://202.164.42.226/staging/mmbooking/app/webroot/files/events/rock_event.jpg', 1, 1502373533, 1502373533),
(6, 33, 'outdoors_sec', 1514023200, 1514032200, 1514023200, 1514032200, 'outdoors_sec_desc', 'Panchkula', 30.6942091, 76.860565, 'http://202.164.42.226/staging/mmbooking/app/webroot/files/events/rock_event.jpg', 1, 1502373533, 1502373533),
(7, 33, 'outdoors_first', 1503460800, 1503478800, 1503460800, 1503478800, 'outdoors_first_desc', 'Faridabad', 28.4089123, 77.3177894, 'http://202.164.42.226/staging/mmbooking/app/webroot/files/events/rock_event.jpg', 1, 1502373140, 1502373140),
(78, 51, 'rdsad', 1502316000, 1502402400, 1502885460, 1502888700, 'dsadsa', 'Mohali, Punjab, India', 30.7046486, 76.71787259999996, 'http://202.164.42.226/staging/mmbooking/app/webroot/files/events/rock_event.jpg', 1, 1502868161, 1502868161),
(85, 80, 'CFSDFD', 1501711200, 1501711200, 1502892900, 1502885700, 'FDGFD', 'Maharashtra, India', 19.7514798, 75.71388839999997, 'http://202.164.42.226/staging/mmbooking/app/webroot/files/events/rock_event.jpg', 1, 1502882237, 1502882237),
(86, 80, 'HFGH', 1502402400, 1503612000, 1502846100, 1502885700, 'HFGHFG', 'Massachusetts, United States', 42.40721070000001, -71.38243740000001, 'http://202.164.42.226/staging/mmbooking/app/webroot/files/events/rock_event.jpg', 1, 1502882311, 1502882311),
(87, 86, 'gfgfdh', 1503525600, 1503612000, 1502932200, 1502928600, 'hfhfdh', 'Maharashtra, India', 19.7514798, 75.71388839999997, 'http://202.164.42.226/staging/mmbooking/app/webroot/files/events/rock_event.jpg', 1, 1502950387, 1502950387),
(88, 86, 'rdsf', 1502920800, 1503698400, 1502975400, 1502972100, 'dsafsaf', 'D Bothell Everett Highway, Bothell, WA, United States', 47.8110921, -122.20877860000002, 'http://202.164.42.226/staging/mmbooking/app/webroot/files/events/rock_event.jpg', 1, 1502950879, 1502950879),
(89, 86, 'fashion_first', 1504994400, 1505080800, 1502949600, 1502924400, 'Description on first event', 'S.a.s.nagar (mohali)', 30.7046486, 76.7178726, 'http://202.164.42.226/staging/mmbooking/app/webroot/files/events/rock_event.jpg', 1, 1502967354, 1502967354),
(90, 86, 'fashion_first_hlo', 1504994400, 1505080800, 1502949600, 1502924400, 'Description on first event', 'S.a.s.nagar (mohali)', 30.7046486, 76.7178726, 'http://202.164.42.226/staging/mmbooking/app/webroot/files/events/rock_event.jpg', 1, 1502967477, 1502967477),
(91, 86, 'erfwwer', 1502834400, 1503525600, 1503051300, 1503050880, ' efwe f e f wee we  r ', 'Mohali, Punjab, India', 30.7046486, 76.71787259999996, 'data:image/png;base64,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', 1, 1503036902, 1503068319);
INSERT INTO `events` (`id`, `user_id`, `name`, `start_date`, `end_date`, `start_time`, `end_time`, `description`, `location`, `lat`, `long`, `main_photo`, `status`, `created`, `modified`) VALUES
(92, 86, 'ammm', 1503093600, 1403130400, 1503051300, 1402048000, 'ddwq', 'Mohali, Punjab, India', 30.7046486, 76.71787259999996, 'data:image/png;base64,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', 1, 1503041077, 1503041077),
(93, 86, 'fdhfdh', 1503612000, 1503698400, 1503011100, 1503011100, 'hfghfd', 'Prater M, Vienna, Austria', 48.21479189999999, 16.40596030000006, 'data:image/png;base64,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', 1, 1503063153, 1503069190),
(98, 86, 'dfsd', 1503612000, 1503698400, 1503411300, 1503368100, 'fdgd', 'MO, United States', 37.9642529, -91.8318334, '1503396029', 1, 1503396029, 1503396029);
INSERT INTO `events` (`id`, `user_id`, `name`, `start_date`, `end_date`, `start_time`, `end_time`, `description`, `location`, `lat`, `long`, `main_photo`, `status`, `created`, `modified`) VALUES
(99, 86, 'dsd', 1503612000, 1503612000, 1503364500, 1503403800, 'dsd', 'Maharashtra, India', 19.7514798, 75.71388839999997, '1503399539', 1, 1503399539, 1503399539),
(100, 86, 'dsd', 1503612000, 1503612000, 1503364500, 1503403800, 'dsd', 'Maharashtra, India', 19.7514798, 75.71388839999997, '1503399726', 1, 1503399726, 1503399726),
(101, 86, 'dsd', 1503612000, 1503612000, 1503364500, 1503403800, 'dsd', 'Maharashtra, India', 19.7514798, 75.71388839999997, '1503399820', 1, 1503399820, 1503399820),
(102, 86, 'fdgd', 1503612000, 1503698400, 1503364500, 1503407700, 'fdgfd', 'Massachusetts, United States', 42.40721070000001, -71.38243740000001, '1503400284png', 1, 1503400284, 1503400284),
(103, 86, 'fgfdg', 1503698400, 1503698400, 1503407700, 1503407700, 'gfdgfdh', 'Maharashtra, India', 19.7514798, 75.71388839999997, '1503403669.png', 1, 1503403669, 1503403669),
(104, 86, 'yrtut', 1503612000, 1503612000, 1503407400, 1503403800, 'tretre', 'Maharashtra, India', 0, 0, '', 1, 1503405778, 1503405778),
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
(6, 29, 3, 1, 1502534565, 1502534565),
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
(71, 63, 3, 1, 1502721846, 1502721846),
(72, 63, 5, 1, 1502721846, 1502721846),
(73, 64, 3, 1, 1502721956, 1502721956),
(74, 64, 5, 1, 1502721956, 1502721956),
(75, 65, 3, 1, 1502721984, 1502721984),
(76, 65, 5, 1, 1502721984, 1502721984),
(77, 66, 3, 1, 1502722000, 1502722000),
(78, 66, 5, 1, 1502722000, 1502722000),
(79, 67, 3, 1, 1502722449, 1502722449),
(80, 67, 5, 1, 1502722449, 1502722449),
(81, 68, 3, 1, 1502722679, 1502722679),
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
(7, 88, 'rvca', 12, 13, 1, 1502956601, 1502956601),
(8, 88, 'ravk', 21, 23, 1, 1502957273, 1502957273),
(9, 88, 'rs', 12, 38, 1, 1502957727, 1502957727),
(10, 88, 'sad', 465, 465, 1, 1502957783, 1502957783),
(11, 88, 'fdf', 12, 323, 1, 1502957931, 1502957931),
(12, 88, 'fdf', 12, 323, 1, 1502957945, 1502957945),
(13, 88, 'fdf', 12, 323, 1, 1502957958, 1502957958),
(14, 1, 'Silver', 100, 123, 1, 1502961181, 1502961181),
(15, 1, 'hfh', 23, 55, 1, 1502962209, 1502962209),
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
  `transactions_id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `status` varchar(100) NOT NULL,
  `details` text NOT NULL,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
