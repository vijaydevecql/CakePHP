-- MySQL dump 10.13  Distrib 5.5.54, for Linux (x86_64)
--
-- Host: localhost    Database: BeamApp
-- ------------------------------------------------------
-- Server version	5.5.54

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'gurjant','123',0);
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (1,'gure','123',0),(2,'gure','123',0),(3,'fsdfsd','',1499428741),(4,'test','123',1499428813),(5,'retetret','tertret',1499432656),(6,'retetret','tertret',1499432699),(7,'hjhjh','jghjghjhjh',1499432801),(8,'','',1499432803),(9,'lkl','lklljkl',1499432818),(10,'t5hythh','thtrh',1499435135);
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `block_users`
--

DROP TABLE IF EXISTS `block_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `block_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from` int(11) NOT NULL,
  `to` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `block_users`
--

LOCK TABLES `block_users` WRITE;
/*!40000 ALTER TABLE `block_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `block_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `broadcast_messages`
--

DROP TABLE IF EXISTS `broadcast_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `broadcast_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gender` int(11) NOT NULL COMMENT '1=male,,0=female',
  `age` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `media` text NOT NULL,
  `mediatype` text NOT NULL COMMENT 'by default= 0,0=text ,1=image,2=video,3=audio,4=pdf',
  `expectedAudience` text NOT NULL,
  `read` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `broadcast_messages`
--

LOCK TABLES `broadcast_messages` WRITE;
/*!40000 ALTER TABLE `broadcast_messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `broadcast_messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `business_subscribers`
--

DROP TABLE IF EXISTS `business_subscribers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `business_subscribers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `business_id` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `business_subscribers`
--

LOCK TABLES `business_subscribers` WRITE;
/*!40000 ALTER TABLE `business_subscribers` DISABLE KEYS */;
INSERT INTO `business_subscribers` VALUES (1,3,1,1499410211),(4,17,3,1499415137),(5,8,4,1499415137),(8,19,2,1499434738);
/*!40000 ALTER TABLE `business_subscribers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `businesses`
--

DROP TABLE IF EXISTS `businesses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `businesses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `logo` text NOT NULL,
  `status` int(11) NOT NULL COMMENT '0=not active,1=active',
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `businesses`
--

LOCK TABLES `businesses` WRITE;
/*!40000 ALTER TABLE `businesses` DISABLE KEYS */;
INSERT INTO `businesses` VALUES (1,'Test',1,'Testing','dfg dfg',1,1499405540,1499405540),(2,'Business 1',3,'Business 1','szxgfd',1,1499405562,1499405562),(3,'Cat 2',2,'fdln','j',1,1499405562,1499405562),(4,'business',2,'sdfgbb','sdfnhbj',1,1499405562,1499405562);
/*!40000 ALTER TABLE `businesses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `descriptoin` varchar(11) NOT NULL,
  `status` varchar(255) NOT NULL COMMENT '0=not active,1=active',
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Test','Testing','1',1499405468,1499405468),(2,'Cat 1','Category 1','1',1499405505,1499405505),(3,'cat 3','dsfksjgn','1',1499405505,1499405505);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chats`
--

DROP TABLE IF EXISTS `chats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chats`
--

LOCK TABLES `chats` WRITE;
/*!40000 ALTER TABLE `chats` DISABLE KEYS */;
INSERT INTO `chats` VALUES (1,12,18,0),(2,12,19,0);
/*!40000 ALTER TABLE `chats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clear_chat`
--

DROP TABLE IF EXISTS `clear_chat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clear_chat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `chat_id` int(11) NOT NULL,
  `clearby` int(11) NOT NULL,
  `last_message_id` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clear_chat`
--

LOCK TABLES `clear_chat` WRITE;
/*!40000 ALTER TABLE `clear_chat` DISABLE KEYS */;
/*!40000 ALTER TABLE `clear_chat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `content`
--

DROP TABLE IF EXISTS `content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `content`
--

LOCK TABLES `content` WRITE;
/*!40000 ALTER TABLE `content` DISABLE KEYS */;
/*!40000 ALTER TABLE `content` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invites`
--

DROP TABLE IF EXISTS `invites`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `countrycode` int(11) NOT NULL,
  `mobileno` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invites`
--

LOCK TABLES `invites` WRITE;
/*!40000 ALTER TABLE `invites` DISABLE KEYS */;
/*!40000 ALTER TABLE `invites` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender` int(11) NOT NULL,
  `receiver` int(11) NOT NULL,
  `message` text NOT NULL,
  `media` text NOT NULL,
  `mediatype` int(11) NOT NULL COMMENT 'by default= 0,0=text ,1=image,2=video,3=audio,4=pdf',
  `is_read` int(11) NOT NULL COMMENT 'by default=0,1=read,0=unread',
  `chat_id` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0 => deleted by both 1 => default (visible to both) 2 => deleted by user 3 => deleted by business',
  `broadcast_message_id` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `countrycode` varchar(8) NOT NULL,
  `mobileno` varchar(16) NOT NULL,
  `otp` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `gender` int(11) NOT NULL COMMENT '1=male,0=female',
  `dob` varchar(255) NOT NULL,
  `is_verified` int(11) NOT NULL COMMENT '0=unverified,1=verified',
  `numbertype` int(1) NOT NULL DEFAULT '0' COMMENT '0 => Normal, 1 => Company',
  `authorization_key` varchar(255) NOT NULL,
  `statusmessage` varchar(255) NOT NULL,
  `device_token` varchar(255) NOT NULL,
  `device_type` int(11) NOT NULL COMMENT '0=android,1=ios',
  `status` int(11) NOT NULL COMMENT '0=not active,1=active',
  `assigned_business` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `numbertype` (`numbertype`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'91','9876543210',0,'','',0,'',0,0,'33329f792feb79a5b725e65a0ea3aab9dc5a740d','','123456asbsadf',1,0,0,1499404010,1499404010),(2,'+91','123456789',11115,'','',0,'',1,0,'c3af1018272cb06ac661194427b734d951d4cc2d','','cxgdxgf43234sdfds32',0,1,0,1499419761,1499419761),(3,'+91','1234567895',1111,'','',0,'',0,0,'213f70d58a38130bb30b2c290cfcd2c6e52a1dee','','33329f792feb79a5b725e65a0ea3aab9dc5a740d',0,0,0,1499420993,1499420993),(4,'+91','123456789554',1111,'','',0,'',0,0,'54af872ce92876350283bc00aa228190a2004e9c','','33329f792feb79a5b725e65a0ea3aab9dc5a740d',0,1,0,1499421128,1499421128),(5,'+85','1234567895547',1111,'','',0,'',0,0,'33ff6e2b5de7a6f7de618fbab45900808dafa51a','','cxgdxgf43234sdfds32',0,1,0,1499423097,1499423097),(6,'+85','12345678955474',1111,'','',0,'',0,0,'176cc987b5d8932f2e9922566d360669c490ede8','','cxgdxgf43234sdfds32',0,1,0,1499423238,1499423238),(7,'+85','4354364564356344',1111,'','',0,'',1,0,'26a8ef27890f27cf020d26a6b17bd2d97098ac51','','cxgdxgf43234sdfds32bbb',0,1,0,1499423259,1499423259),(8,'+85','1234',1111,'','',0,'',1,0,'12fcc5340973bd6b0eb26a0d67306288b9e35467','','cxgdxgf43234sdfds32bbb',0,1,0,1499424029,1499424029),(12,'+85','12345',1111,'','',0,'',0,0,'e3f00220db0eaa7bbadee12fad9bcfe170ddca8f','','cxgdxgf43234sdfds32bbb',0,1,0,1499433260,1499433260),(13,'+85','12345k',1111,'','',0,'',0,0,'f0004c1172cae829c2852b537403b7f39078dd7e','','cxgdxgf43234sdfds32bbb',0,1,0,1499433313,1499433313),(14,'+85','123456',1111,'','',0,'',0,0,'67ae4d06aa7e513801d4860df8b3fd606f15f99f','','cxgdxgf43234sdfds32bbb',0,1,0,1499433319,1499433319),(15,'+85','1234567',1111,'','',0,'',0,0,'14f95f64d05c83304a41558430c4e2786b59128a','','cxgdxgf43234sdfds32bbb',0,1,0,1499433327,1499433327),(16,'+85','12345674',1111,'','',0,'',0,0,'23222b1abebeaef778b94202ece840c231fe285c','','',0,1,0,1499433360,1499433360),(17,'+85','123456743',1111,'','',0,'',1,0,'ff93d1869d66b08ae20fb0e532aef45e45f75717','','cxgdxgf43234sdfds32bbb',0,1,0,1499433367,1499433367),(18,'+85','77777777777777',1111,'','',0,'',0,0,'66d0c2f371b2aea8dd54c31efb70242250594950','','',0,1,0,1499434200,1499434200),(19,'+85','7777777777777709',1111,'','',0,'',1,0,'1fc9909dd34163a67b1cddcf81cf6bb41cacebfc','','cxgdxgf43234sdfds32bbb',0,1,0,1499434211,1499434211);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-07-09 20:32:34
