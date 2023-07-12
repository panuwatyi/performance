-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Feb 05, 2020 at 08:31 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `project`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `tb_order`
-- 

CREATE TABLE `tb_order` (
  `order_id` int(10) NOT NULL auto_increment,
  `user_name` varchar(100) NOT NULL,
  `order_first_last_name` varchar(200) NOT NULL,
  `order_email` varchar(100) NOT NULL,
  `order_phone` varchar(20) NOT NULL,
  `order_address` varchar(100) NOT NULL,
  `order_city` varchar(100) NOT NULL,
  `order_state` varchar(100) NOT NULL,
  `order_postal_code` varchar(20) NOT NULL,
  `order_date` datetime NOT NULL,
  PRIMARY KEY  (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `tb_order`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `tb_order_detail`
-- 

CREATE TABLE `tb_order_detail` (
  `d_id` int(10) NOT NULL auto_increment,
  `user_name` varchar(100) NOT NULL,
  `order_id` int(20) NOT NULL,
  `p_id` int(20) NOT NULL,
  `p_qty` int(20) NOT NULL,
  `d_total` float NOT NULL,
  PRIMARY KEY  (`d_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `tb_order_detail`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `tb_product`
-- 

CREATE TABLE `tb_product` (
  `p_id` int(10) NOT NULL auto_increment,
  `type_name` varchar(100) NOT NULL,
  `p_name` varchar(100) NOT NULL,
  `p_detail` text NOT NULL,
  `p_price` decimal(9,2) NOT NULL default '0.00',
  `p_qty` smallint(10) NOT NULL default '0',
  `p_image` varchar(100) NOT NULL,
  PRIMARY KEY  (`p_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `tb_product`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `tb_type`
-- 

CREATE TABLE `tb_type` (
  `type_id` int(10) NOT NULL auto_increment,
  `type_name` varchar(100) NOT NULL,
  PRIMARY KEY  (`type_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `tb_type`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `tb_user`
-- 

CREATE TABLE `tb_user` (
  `user_id` int(10) NOT NULL auto_increment,
  `user_name` varchar(100) NOT NULL,
  `user_pass` varchar(100) NOT NULL,
  `user_role` enum('user','admin') NOT NULL default 'user',
  `user_first_last_name` varchar(200) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_phone` varchar(20) NOT NULL,
  `user_address` varchar(100) NOT NULL,
  `user_city` varchar(100) NOT NULL,
  `user_state` varchar(100) NOT NULL,
  `user_postal_code` varchar(10) NOT NULL,
  PRIMARY KEY  (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `tb_user`
-- 

INSERT INTO `tb_user` VALUES (1, 'admin', 'admin', 'admin', 'admin', 'admin', 'admin', 'admin', 'admin', 'admin', 'admin');
INSERT INTO `tb_user` VALUES (2, 'user', 'user', 'user', 'user', 'user', 'user', 'user', 'user', 'user', 'user');
