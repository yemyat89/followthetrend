-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Mar 27, 2010 at 04:18 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `talking`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `chat`
-- 

CREATE TABLE `chat` (
  `chat_id` int(8) unsigned NOT NULL auto_increment,
  `chtime` datetime NOT NULL,
  `words` varchar(140) NOT NULL,
  `trend_name` varchar(30) NOT NULL,
  PRIMARY KEY  (`chat_id`),
  KEY `trend_id` (`trend_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=38 ;

-- 
-- Dumping data for table `chat`
-- 

INSERT INTO `chat` VALUES (37, '2010-03-26 07:27:35', 'hello @jack', '#nowplaying');
INSERT INTO `chat` VALUES (36, '2010-03-26 07:24:20', 'hi', '#nowplaying');
INSERT INTO `chat` VALUES (34, '2010-03-26 07:19:24', '@daniel what''s up and who are you?', '#nowplaying');
INSERT INTO `chat` VALUES (35, '2010-03-26 07:21:45', 'aa', '#nowplaying');
INSERT INTO `chat` VALUES (31, '2010-03-26 07:18:26', '#nowplaying!', '#nowplaying');
INSERT INTO `chat` VALUES (32, '2010-03-26 07:18:37', 'what are u doing', '#nowplaying');
INSERT INTO `chat` VALUES (33, '2010-03-26 07:18:45', 'I am a superman', '#nowplaying');

-- --------------------------------------------------------

-- 
-- Table structure for table `favourite`
-- 

CREATE TABLE `favourite` (
  `favourite_id` int(8) unsigned NOT NULL auto_increment,
  `user` varchar(30) NOT NULL,
  `data` varchar(140) NOT NULL,
  `time` varchar(80) NOT NULL,
  `image` varchar(200) NOT NULL,
  `trend_name` varchar(30) NOT NULL,
  PRIMARY KEY  (`favourite_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

-- 
-- Dumping data for table `favourite`
-- 

INSERT INTO `favourite` VALUES (31, 'yyyyyutaka', '#nowplaying Don''t Be A Jerk, Johnny by The Drums, via @Osfoora', 'Sat, 27 Mar 2010 08:09:01 +0000', 'http://a1.twimg.com/profile_images/772282938/p4247_L_normal.jpg', '#nowplaying');

-- --------------------------------------------------------

-- 
-- Table structure for table `feedback`
-- 

CREATE TABLE `feedback` (
  `name` varchar(25) NOT NULL,
  `email` varchar(80) NOT NULL,
  `data` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `feedback`
-- 

INSERT INTO `feedback` VALUES ('Ye  ', 'yemyatthein@gmail.com', 'Nice one!');

-- --------------------------------------------------------

-- 
-- Table structure for table `latest_shown`
-- 

CREATE TABLE `latest_shown` (
  `user_id` int(8) unsigned NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY  (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `latest_shown`
-- 

INSERT INTO `latest_shown` VALUES (57, '2010-03-26 21:32:43');
INSERT INTO `latest_shown` VALUES (56, '2010-03-26 16:26:08');
INSERT INTO `latest_shown` VALUES (64, '2010-03-21 05:00:20');
INSERT INTO `latest_shown` VALUES (78, '2010-03-26 07:30:37');
INSERT INTO `latest_shown` VALUES (7, '2010-03-26 21:46:50');

-- --------------------------------------------------------

-- 
-- Table structure for table `link`
-- 

CREATE TABLE `link` (
  `link_id` int(8) unsigned NOT NULL auto_increment,
  `title` varchar(80) NOT NULL,
  `url` varchar(140) NOT NULL,
  `trend_name` varchar(30) NOT NULL,
  PRIMARY KEY  (`link_id`),
  UNIQUE KEY `url` (`url`,`trend_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

-- 
-- Dumping data for table `link`
-- 

INSERT INTO `link` VALUES (20, 'Google', 'http://www.google.com', '#nowplaying');
INSERT INTO `link` VALUES (21, '\r\n	MySpace\r\n', 'http://www.myspace.com/', 'ipad');
INSERT INTO `link` VALUES (18, '???????????”?????•??????????????????????????? Facebook', 'http://www.facebook.com', '#nowplaying');

-- --------------------------------------------------------

-- 
-- Table structure for table `trend`
-- 

CREATE TABLE `trend` (
  `trend_id` int(8) unsigned NOT NULL auto_increment,
  `name` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY  (`trend_id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

-- 
-- Dumping data for table `trend`
-- 

INSERT INTO `trend` VALUES (7, '#nowplaying', '2010-03-26 21:20:03');
INSERT INTO `trend` VALUES (12, 'ipad', '2010-03-26 22:04:56');

-- --------------------------------------------------------

-- 
-- Table structure for table `trend_user`
-- 

CREATE TABLE `trend_user` (
  `trend_id` int(8) unsigned NOT NULL,
  `user_id` int(8) unsigned NOT NULL,
  `latest` datetime NOT NULL,
  `flag` int(1) unsigned NOT NULL,
  PRIMARY KEY  (`trend_id`,`user_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `trend_user`
-- 

INSERT INTO `trend_user` VALUES (7, 78, '2010-03-26 07:25:07', 0);
INSERT INTO `trend_user` VALUES (12, 57, '2010-03-26 22:05:10', 0);
INSERT INTO `trend_user` VALUES (7, 56, '2010-03-26 16:26:08', 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `user`
-- 

CREATE TABLE `user` (
  `user_id` int(8) unsigned NOT NULL auto_increment,
  `name` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(60) NOT NULL,
  `photo` varchar(255) default NULL,
  `about` varchar(255) default NULL,
  `active` int(1) NOT NULL,
  PRIMARY KEY  (`user_id`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=82 ;

-- 
-- Dumping data for table `user`
-- 

INSERT INTO `user` VALUES (57, 'jack', '4ff9fc6e4e5d5f590c4f2134a8cc96d1', 'blazing_throne@hotmail.com', 'user_photo/default.gif', 'My name is Jacky Brill. I love to spend my time exploring new things and knowledge......', 1);
INSERT INTO `user` VALUES (56, 'yemyat', 'dee5deea9834e55d471d139dff0e98d3', 'yemyatthein@gmail.com', 'user_photo/default.gif', 'I am friendly and outgoing!', 1);
INSERT INTO `user` VALUES (78, 'daniel', '81dc9bdb52d04dc20036dbd8313ed055', 'blazing_throne@yahoo.com', 'user_photo/(daniel) Valentine_small.png', 'I am Daniel Alvez...Footballer Barcelona..Believe it or not.', 1);
INSERT INTO `user` VALUES (80, 'Test-1', '445', 'add@uahh.com', 'user_photo/default.gif', 'Testing the system is testing the system.', 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `user_chat`
-- 

CREATE TABLE `user_chat` (
  `user_id` int(8) unsigned NOT NULL,
  `chat_id` int(8) unsigned NOT NULL,
  PRIMARY KEY  (`user_id`,`chat_id`),
  KEY `chat_id` (`chat_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `user_chat`
-- 

INSERT INTO `user_chat` VALUES (56, 34);
INSERT INTO `user_chat` VALUES (56, 36);
INSERT INTO `user_chat` VALUES (78, 31);
INSERT INTO `user_chat` VALUES (78, 32);
INSERT INTO `user_chat` VALUES (78, 33);
INSERT INTO `user_chat` VALUES (78, 35);
INSERT INTO `user_chat` VALUES (78, 37);

-- --------------------------------------------------------

-- 
-- Table structure for table `user_link`
-- 

CREATE TABLE `user_link` (
  `user_id` int(8) unsigned NOT NULL,
  `link_id` int(8) unsigned NOT NULL,
  PRIMARY KEY  (`user_id`,`link_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `user_link`
-- 

INSERT INTO `user_link` VALUES (57, 20);
INSERT INTO `user_link` VALUES (57, 21);
INSERT INTO `user_link` VALUES (78, 18);
