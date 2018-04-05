-- phpMyAdmin SQL Dump
-- version 4.2.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 10, 2017 at 07:09 PM
-- Server version: 5.5.54
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tarrago`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
`id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `photo` varchar(64) NOT NULL,
  `status` int(2) NOT NULL,
  `added` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL
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
`id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `status` int(2) NOT NULL,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL
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
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
`id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `status`) VALUES
(1, 'admin', 1),
(2, 'user', 1),
(3, 'pro', 1);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
`id` int(11) NOT NULL,
  `message` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `user2id` int(11) NOT NULL,
  `is_read` int(1) NOT NULL,
  `status` int(2) NOT NULL,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `photo` varchar(64) NOT NULL,
  `description` text NOT NULL,
  `status` int(2) NOT NULL,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `user_id`, `name`, `photo`, `description`, `status`, `created`, `modified`) VALUES
(1, 253, 'Test product', '426fdef8d5d85be39483b48fdb6761b9ca82ae69.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, 1502286154, 1502286154),
(2, 253, 'Test product 2', '6639d002b3090bdc58182fe6e4bafe30fd0dc46d.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, 1502286464, 1502286464),
(3, 253, 'Test product 3', '63aa8bdf50fdaae449e4bcb4958f2e52e53121d8.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, 1502287098, 1502287098),
(4, 253, 'gfhf', '556737002b34eddf1b41559b784004fefd7e6338.png', 'gfghf', 1, 1502288960, 1502288960);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `countrycode` varchar(8) NOT NULL,
  `mobileno` varchar(16) NOT NULL,
  `otp` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `dob` varchar(255) NOT NULL,
  `is_verified` int(11) NOT NULL COMMENT '0=unverified,1=verified',
  `status` int(11) NOT NULL COMMENT '0=not active,1=active',
  `sidebar_rollup` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(128) NOT NULL,
  `country` varchar(64) NOT NULL,
  `zip` varchar(16) NOT NULL,
  `website` varchar(256) NOT NULL,
  `business` varchar(256) NOT NULL,
  `business_description` text NOT NULL,
  `photo` varchar(64) NOT NULL,
  `id_facebook` bigint(16) NOT NULL,
  `token_facebook` varchar(256) NOT NULL,
  `status_facebook` int(2) NOT NULL,
  `photo_facebook` varchar(255) NOT NULL,
  `id_twitter` bigint(16) NOT NULL,
  `token_twitter` varchar(255) NOT NULL,
  `status_twitter` int(2) NOT NULL,
  `photo_twitter` varchar(255) NOT NULL,
  `latitude` decimal(10,8) NOT NULL,
  `longitude` decimal(11,8) NOT NULL,
  `rating` int(2) NOT NULL,
  `send_newsletter` int(1) DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=254 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `countrycode`, `mobileno`, `otp`, `name`, `gender`, `email`, `password`, `image`, `dob`, `is_verified`, `status`, `sidebar_rollup`, `group_id`, `created`, `modified`, `address`, `city`, `country`, `zip`, `website`, `business`, `business_description`, `photo`, `id_facebook`, `token_facebook`, `status_facebook`, `photo_facebook`, `id_twitter`, `token_twitter`, `status_twitter`, `photo_twitter`, `latitude`, `longitude`, `rating`, `send_newsletter`) VALUES
(1, '+91', '9632589632', 111, 'full', '', 'admin@admin.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'ff9065a099cae9041e09a1898c12f826d00bc0e4.png', '30-07-17', 1, 1, 0, 1, 1500379021, 1500379021, '', '', '', '', '', '', '', '', 0, '', 0, '', 0, '', 0, '', '0.00000000', '0.00000000', 0, 1),
(253, '', '', 0, 'Harpreet', '', 'test978056@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '6a3d199f3996568e109b8d52f9690386bd7224b7.png', '', 0, 1, 0, 2, 1502275510, 1502275510, '', '', '', '', '', '', '', '', 0, '', 0, '', 0, '', 0, '', '0.00000000', '0.00000000', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_articles`
--

CREATE TABLE IF NOT EXISTS `users_articles` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users_products`
--

CREATE TABLE IF NOT EXISTS `users_products` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
 ADD PRIMARY KEY (`id`), ADD KEY `status` (`status`);

--
-- Indexes for table `article_comments`
--
ALTER TABLE `article_comments`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
 ADD PRIMARY KEY (`id`), ADD KEY `user_id` (`user_id`), ADD KEY `user_id_2` (`user_id`), ADD KEY `user2id` (`user2id`), ADD KEY `is_read` (`is_read`), ADD KEY `status` (`status`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
 ADD PRIMARY KEY (`id`), ADD KEY `user_id` (`user_id`), ADD KEY `status` (`status`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_articles`
--
ALTER TABLE `users_articles`
 ADD PRIMARY KEY (`id`), ADD KEY `user_id` (`user_id`), ADD KEY `article_id` (`article_id`);

--
-- Indexes for table `users_products`
--
ALTER TABLE `users_products`
 ADD PRIMARY KEY (`id`), ADD KEY `user_id` (`user_id`), ADD KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `article_comments`
--
ALTER TABLE `article_comments`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=254;
--
-- AUTO_INCREMENT for table `users_articles`
--
ALTER TABLE `users_articles`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users_products`
--
ALTER TABLE `users_products`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
