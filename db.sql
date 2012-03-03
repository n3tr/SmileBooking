-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 04, 2012 at 06:11 AM
-- Server version: 5.5.9
-- PHP Version: 5.3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `smilebooking`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

DROP TABLE IF EXISTS `booking`;
CREATE TABLE `booking` (
  `booking_id` int(6) NOT NULL AUTO_INCREMENT,
  `cus_id` int(6) NOT NULL,
  `tableland_id` int(6) NOT NULL,
  `booking_date` datetime NOT NULL,
  `booking_status` int(11) NOT NULL,
  PRIMARY KEY (`booking_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=139 ;

--
-- Dumping data for table `booking`
--


-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `cus_id` int(6) NOT NULL AUTO_INCREMENT,
  `username` varchar(16) NOT NULL,
  `password` varchar(80) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `telephone` varchar(12) NOT NULL,
  `e-mail` varchar(80) NOT NULL,
  PRIMARY KEY (`cus_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` VALUES(1, 'n3tr', '1234', 'Jirat', 'K', '0821113310', 'saakyz@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE `employee` (
  `emp_id` int(6) NOT NULL AUTO_INCREMENT,
  `username` varchar(16) NOT NULL,
  `password` varchar(80) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `telephone` varchar(12) NOT NULL,
  `e-mail` varchar(80) NOT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` VALUES(1, 'admin', 'admin', 'Admin', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

DROP TABLE IF EXISTS `food`;
CREATE TABLE `food` (
  `food_id` int(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `desc` varchar(150) NOT NULL,
  `pic_url` varchar(100) NOT NULL,
  `type_id` int(3) NOT NULL,
  PRIMARY KEY (`food_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `food`
--

INSERT INTO `food` VALUES(1, 'Tum Tum', 100, 'ต้มยำแซ่บ', '', 1);
INSERT INTO `food` VALUES(2, 'Toom Toom', 200, '', '', 1);
INSERT INTO `food` VALUES(3, 'Toom Tam', 50, '', '', 2);
INSERT INTO `food` VALUES(4, 'Yum Yum', 5, '', '', 1);
INSERT INTO `food` VALUES(5, 'Ice Screem', 10, 'Saa', '', 1);
INSERT INTO `food` VALUES(6, 'Wow', 2000, '', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `food_type`
--

DROP TABLE IF EXISTS `food_type`;
CREATE TABLE `food_type` (
  `type_id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `food_type`
--

INSERT INTO `food_type` VALUES(1, 'อาหารไทย');
INSERT INTO `food_type` VALUES(2, 'อาหารอีสาน');
INSERT INTO `food_type` VALUES(3, 'Desert');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE `order` (
  `order_id` int(6) NOT NULL AUTO_INCREMENT,
  `booking_id` int(6) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `order`
--


-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

DROP TABLE IF EXISTS `order_detail`;
CREATE TABLE `order_detail` (
  `detail_id` int(6) NOT NULL AUTO_INCREMENT,
  `food_id` int(6) NOT NULL,
  `order_id` int(6) NOT NULL,
  `quantity` int(6) NOT NULL,
  PRIMARY KEY (`detail_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `order_detail`
--


-- --------------------------------------------------------

--
-- Table structure for table `tableland`
--

DROP TABLE IF EXISTS `tableland`;
CREATE TABLE `tableland` (
  `tableland_id` int(6) NOT NULL AUTO_INCREMENT,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`tableland_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `tableland`
--

INSERT INTO `tableland` VALUES(1, 1);
INSERT INTO `tableland` VALUES(2, 1);
INSERT INTO `tableland` VALUES(3, 1);
INSERT INTO `tableland` VALUES(4, 1);
INSERT INTO `tableland` VALUES(5, 1);
INSERT INTO `tableland` VALUES(6, 1);
INSERT INTO `tableland` VALUES(7, 1);
INSERT INTO `tableland` VALUES(8, 1);
INSERT INTO `tableland` VALUES(9, 1);
INSERT INTO `tableland` VALUES(10, 1);
INSERT INTO `tableland` VALUES(11, 1);
INSERT INTO `tableland` VALUES(12, 1);
INSERT INTO `tableland` VALUES(13, 1);
INSERT INTO `tableland` VALUES(14, 1);
INSERT INTO `tableland` VALUES(15, 1);
INSERT INTO `tableland` VALUES(16, 0);
INSERT INTO `tableland` VALUES(17, 1);
INSERT INTO `tableland` VALUES(18, 1);
INSERT INTO `tableland` VALUES(19, 1);
INSERT INTO `tableland` VALUES(20, 1);
INSERT INTO `tableland` VALUES(21, 0);
INSERT INTO `tableland` VALUES(22, 0);
INSERT INTO `tableland` VALUES(23, 0);
INSERT INTO `tableland` VALUES(24, 1);
INSERT INTO `tableland` VALUES(25, 1);
