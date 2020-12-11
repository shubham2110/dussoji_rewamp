-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 11, 2020 at 04:07 PM
-- Server version: 5.7.32-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dussoji_rewamp`
--

-- --------------------------------------------------------

--
-- Table structure for table `a_plans`
--

CREATE TABLE `a_plans` (
  `pno` int(5) NOT NULL COMMENT 'plan number',
  `pheading` varchar(99) NOT NULL COMMENT 'Heading of the plan such as (Individual,Org,team)',
  `pprice` varchar(50) NOT NULL COMMENT 'Price of the plan',
  `pfeatures` longtext NOT NULL COMMENT 'Features of the plan separated by ;'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `a_plans`
--

INSERT INTO `a_plans` (`pno`, `pheading`, `pprice`, `pfeatures`) VALUES
(1, 'Individual', '$9/Month', '1 user account;Remove ads;Premium assets;Saved projects'),
(2, 'Team', '$39/Month', 'Up to 5 user accounts; Remove ads; Premium assets; Saved projects; Team collaboration tools');

-- --------------------------------------------------------

--
-- Table structure for table `d_registration`
--

CREATE TABLE `d_registration` (
  `uno` int(4) NOT NULL COMMENT 'Auto_increment of unique ID',
  `fname` varchar(30) NOT NULL COMMENT 'First name of user',
  `lname` varchar(30) NOT NULL COMMENT 'Last name of user',
  `uemail` varchar(50) NOT NULL COMMENT 'Email ID of user',
  `upassword` varchar(200) NOT NULL COMMENT 'Contains password ',
  `urole` varchar(10) NOT NULL COMMENT 'This is the role of user like (ADMIN, SUB, USER, DEMO)',
  `avatar` varchar(200) DEFAULT NULL COMMENT 'Profile picture of the user',
  `orgname` varchar(70) DEFAULT NULL COMMENT 'organisation name of the user',
  `geoloc` varchar(100) DEFAULT NULL COMMENT 'Location of user',
  `phone` varchar(20) DEFAULT NULL COMMENT 'Mobile number',
  `birthdate` varchar(50) DEFAULT NULL COMMENT 'Birthday of user'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `d_registration`
--

INSERT INTO `d_registration` (`uno`, `fname`, `lname`, `uemail`, `upassword`, `urole`, `avatar`, `orgname`, `geoloc`, `phone`, `birthdate`) VALUES
(6, 'Vishal', 'Holla', 'abc@gmail.com', '$2y$10$s6Dlqfms8cFC0b1whKfAu.AeMqPG.4q98iCwF12HwrjGiJ7qUJXIC', 'ADMIN', 'upload/training_registration_flow.png', 'Wipro', 'Mangalore India', '9591296512', '08/27/1998'),
(7, 'Vishal', 'Holla', 'test@gmail.com', '$2y$10$0KoTgdNfjsPLeECgCuIDC.C.KaUhYt4fFr28Sv6HYuo30kkzvmCZa', 'USER', NULL, NULL, NULL, NULL, NULL),
(8, 'Vishal', 'Holla', 'test1@gmail.com', '$2y$10$Wk5H5F6tql526Hgpb4sUeOQ75SdRhs5fW8BG4KZqO.5qGtrPcmUEa', 'USER', NULL, NULL, NULL, '+919591296512', NULL),
(9, 'Vishal', 'Holla', 'test2@gmail.com', '$2y$10$EpRljeAz0Mc4pfUA/G4Z.Of..wIOHmdr4Aa/kV3jWYDPRVX4h6Lp6', 'USER', NULL, NULL, NULL, '+919591296512', NULL),
(10, 'Shyam', 'Shanbhag', 'shyam@ditsolutions.net', '$2y$10$zOe/q1mv.E28sju5wddmROgeD7M25d/cQuvAhyNzXXMPxXn5Kd3nC', 'ADMIN', 'upload/Shyam-profile-600x600.jpg', NULL, NULL, '+919964674919', NULL),
(11, 'SACHIN', 'CHATTERJEE', 'sachinchatterjee31796@gmail.com', '$2y$10$lZ3G515UXRliX6WmCn1FJeSuHq23bI11HbSvKf2ncHNq.Vloog8nu', 'ADMIN', 'upload/IMG_20161103_220759.jpg', 'D IT', 'lko', '+917897115019', '07/31/1997'),
(12, 'Sudhir', 'Gandotra', 'sudhirgandotra@gmail.com', '$2y$10$P1okkVWbk2v5l15svwD4mOwYGUi/DIubIBdZlKacXbYaQRNaXS6/S', 'ADMIN', 'upload/Sudhir_Gandotra.jpg', NULL, NULL, '+919810120918', NULL),
(16, 'SACHIN', 'CHATTERJEE', 'xyz@gmail.com', '$2y$10$Gt0cvZEvzVFaYsJPit2Bguzix0uo3KQZbdBaysi5WuP.bOn6a9ATO', 'USER', NULL, NULL, NULL, '+917897115019', NULL),
(17, 'SACHIN', 'CHATTERJEE', 'testing@gmail.com', '$2y$10$yK/UM8ThRcFsFftYBAFjBeSmWs4X4o/vyTtSihvNP7F4381j79mti', 'SUB', NULL, NULL, NULL, '+917897115019', NULL),
(18, 'Sudhir', 'Gandotra', 'sudhir@bestbookbuddies.com', '$2y$10$Agc8JvPyZd0ZzPHiwByfN.L90K5RxCJE3JWmLs0YP3PRY0ny4jxCG', 'USER', 'upload/Sudhir_Gandotra.jpg', NULL, NULL, '+919810120918', NULL),
(19, 'Shubham', 'Saxena', 'saxena.shubham.2110@gmail.com', '$2y$10$qsFQ6.8LWmsuLA5somvtjufUxe/hNqMaguEd3l7m7qzQwA1M5OuoC', 'USER', NULL, NULL, NULL, '+919599239456', NULL),
(20, 'Darshin', 'Vyas', 'darshin.vyas@gmail.com', '$2y$10$ZMWRQtDKDaTfUpE4KxZkEOIfA0Dy3hok0yT0STZ.wzSICDmgpooL2', 'USER', NULL, NULL, NULL, '+918999715529', NULL),
(21, 'Demo', 'Demo', 'hr@ditsolutions.net', 'demo', 'ADMIN', NULL, NULL, NULL, NULL, NULL),
(22, 'JITENDER', 'GUPTA', 'test@test.com', '$2y$10$TRlls0Ei5zZgrOoHeNOHPOddJar6BMrws2Pq19JziGK6fLiVp9/E6', 'USER', NULL, NULL, NULL, '+919650440446', NULL),
(23, 'Shyam', 'Shanbhag', 'sachin@ditsolutions.net', '$2y$10$AwgsfruVb/87mY423rfvWuAfzpA7j.NsVFkbeKtb3attmabXrwZ5i', 'USER', NULL, NULL, NULL, '+917975325049', NULL),
(24, 'SACHIN', 'CHATTERJEE', 'sachin@gmail.com', '$2y$10$LDL8bEazt7R9cu6sJSamdOcZGDDouQEwvOl27KUZqYZ1S1o.zXvjm', 'USER', 'upload/18354578.jpg', NULL, NULL, '+917897115019', NULL),
(25, 'Shyam', 'Shanbhag', 'sachin1@ditsolutions.net', '$2y$10$7pC/gYgtKLR9trXwB6Rxj.jIsIAaSZKLBIjfDsUfTA80R2sMP0b9a', 'USER', 'upload/18354578.jpg', NULL, NULL, '+917975325049', NULL),
(26, 'dHi', 'df', 'xyddz@gmail.com', '$2y$10$YRJvbs6tjBeqynCYLe6IS.6y.wJDCDHeNtK9rLpHE91C5fpoYCwWC', 'USER', 'upload/18354578.jpg', NULL, NULL, '+913434343432', NULL),
(27, 'dfd', 'fd', 'xyddzd@gmail.com', '$2y$10$JUhNDH3TNqTX.pCTYEV5V.Dh7B.NSvaUpUlk73nb1ISglIF5MFnWS', 'USER', 'upload/18354578.jpg', NULL, NULL, '+61412546678', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_temp`
--

CREATE TABLE `password_reset_temp` (
  `email` varchar(250) NOT NULL,
  `key` varchar(250) NOT NULL,
  `expDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subs_payment`
--

CREATE TABLE `subs_payment` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `subscriber_id` text NOT NULL,
  `payment_id` text NOT NULL,
  `payment_signature` text NOT NULL,
  `payment_time` text NOT NULL,
  `plan_name` text NOT NULL,
  `plan_type` text NOT NULL,
  `plan_amount` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subs_payment`
--

INSERT INTO `subs_payment` (`id`, `email`, `subscriber_id`, `payment_id`, `payment_signature`, `payment_time`, `plan_name`, `plan_type`, `plan_amount`) VALUES
(1, 'testing@gmail.com', 'sub_Fg5OLgrsavlKrl', 'pay_Fg5PZc10ElsHl8', 'b7b17a240d52d0cb6882387024619a0258c1166a60cc23f97e7b9da6640b7b2b', 'September 22, 2020, 6:36 pm', 'Individual plan', 'monthly', '700');

-- --------------------------------------------------------

--
-- Table structure for table `u_feedback`
--

CREATE TABLE `u_feedback` (
  `fno` int(5) NOT NULL,
  `uemail` varchar(50) DEFAULT NULL,
  `feedstar` int(5) DEFAULT NULL COMMENT 'Rate our Video / Audio Quality',
  `feedanswer` longtext COMMENT 'Any Specific Problems you faced? If yes Kindly Explain',
  `feedexep` varchar(20) DEFAULT NULL COMMENT 'How was your overall experience?',
  `feedsugg` longtext COMMENT 'Any Suggestions'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `u_feedback`
--

INSERT INTO `u_feedback` (`fno`, `uemail`, `feedstar`, `feedanswer`, `feedexep`, `feedsugg`) VALUES
(2, 'abc@gmail.com', 5, 'very good session', 'best', 'Awesome'),
(3, 'sudhirgandotra@gmail.com', 5, 'Its the right direction', 'best', 'Carry on Doc!');

-- --------------------------------------------------------

--
-- Table structure for table `u_meetings`
--

CREATE TABLE `u_meetings` (
  `mno` int(5) NOT NULL COMMENT 'This is the auto increment of meeting number',
  `uemail` varchar(50) DEFAULT NULL COMMENT 'This is the host email ID',
  `mname` varchar(100) DEFAULT NULL COMMENT 'Meeting name',
  `mtopic` varchar(200) DEFAULT NULL COMMENT 'Meeting topic',
  `mpass` varchar(50) DEFAULT NULL COMMENT 'Meeting password',
  `mdatetime` datetime DEFAULT NULL COMMENT 'Date and Time of the meeting',
  `mexpdatetime` datetime NOT NULL COMMENT 'expire date and time',
  `mduration` varchar(50) DEFAULT NULL COMMENT 'duration of the meeting',
  `mattend` longtext COMMENT 'Attendees of the meeting. Separated by coma',
  `smsinvite` text NOT NULL,
  `muniq` varchar(30) DEFAULT NULL COMMENT 'Uniqueue id for the meeting'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `u_meetings`
--

INSERT INTO `u_meetings` (`mno`, `uemail`, `mname`, `mtopic`, `mpass`, `mdatetime`, `mexpdatetime`, `mduration`, `mattend`, `smsinvite`, `muniq`) VALUES
(25, 'senthil@covide.in', 'Demo meet', 'Climate ', '1111', '2020-08-24 11:57:00', '2020-08-24 12:59:00', '62', 'Shyam@ditsolutions.net', '', 'dus5f435e41ba7ed'),
(22, 'abc@gmail.com', 'Testing Meeting', 'lets discuss about ', 'Pass@123', '2020-08-24 20:27:00', '2020-08-24 21:29:00', '62', 'test@gamil.com', '', 'dus5f42841cb6c7d'),
(14, 'abc@gmail.com', 'testing for multiple meeting', 'Holla', 'Pass@123', '1970-01-01 00:00:00', '1970-01-01 01:00:00', '60', 'test@gmail.com,abc@gmail.com', '', 'dus5f42642dd2c0c'),
(16, 'abc@gmail.com', 'Hello new meeting', 'lets discuss about todays situation on India', 'Pass@123', '1970-01-01 00:00:00', '1970-01-01 01:30:00', '90', 'abc@gmail.com,test@gmail.com', '', 'dus5f42803b9695e'),
(23, 'sachinchatterjee31796@gmail.com', 'Dussoji', 'testing', 'kkkk', '2020-08-24 04:51:00', '2020-08-24 08:57:00', '246', 'shyam@ditsoulutions.net', '', 'dus5f42a5b9cfeac'),
(18, 'abc@gmail.com', 'Vishl', 'Holla', 'Pass@123', '2020-08-23 21:16:00', '2020-08-23 22:16:00', '60', 'test@gmail.com', '', 'dus5f42818440653'),
(26, 'demo@mail.com', 'Demomeet2', 'Environment', '1111', '2020-08-24 12:13:00', '2020-08-24 13:15:00', '62', 'shyam@ditsolutions.net', '', 'dus5f4361d0c3660'),
(27, 'shyam@ditsolutions.net', 'Shyam Shanbhag', 'haha', 'nopass', '2020-08-24 20:17:00', '2020-08-24 21:17:00', '60', 'vishal@ditsolutions.net', '', 'dus5f43d2eb1a558'),
(28, 'sachinchatterjee31796@gmail.com', 'SACHIN ', 'testing', 'kkkkk', '2020-08-26 23:46:00', '2020-08-27 01:49:00', '123', 'shyam@ditsolutions.net,sachin@ditsolutions.net', '', 'dus5f43d92b52861'),
(29, 'sachinchatterjee31796@gmail.com', 'Dussoji', 'testing', 'kkkk', '2020-08-24 02:49:00', '2020-08-24 05:51:00', '182', 'sachin@ditsolutions.net', '', 'dus5f43da3f16a4a'),
(30, 'sachinchatterjee31796@gmail.com', 'Dussoji2', 'testing', 'kkkk', '2020-08-29 23:55:00', '2020-08-30 01:55:00', '120', 'sachin@ditsolutins.net', '', 'dus5f43db81426ef'),
(32, 'shyam@ditsolutions.net', 'Shyam Shanbhag', 'demo', 'nopass', '2020-08-30 23:39:00', '2020-08-31 00:40:00', '61', 'sachin@ditsolutions.net', '', 'dus5f4beb5d5df0b'),
(33, 'vikramkumarmgr1@gmail.com', 'test', 'test', 'test', '2020-09-21 13:08:00', '2020-09-21 14:09:00', '61', 'vikramkumarmgr1@gmail.com', '', 'dus5f6858a349eb5'),
(34, 'shyam@ditsolutions.net', 'demovikram', 'test', 'nopass', '2020-09-21 13:14:00', '2020-09-21 13:19:00', '5', 'vikramkumarmgr1@gmail.com,', '', 'dus5f6859cd8798f'),
(35, 'sachinchatterjee31796@gmail.com', 'Dussoji', 'testing', 'kkkk', '2020-10-16 19:31:00', '2020-10-16 22:31:00', '180', 'shyam@ditsolutions.net', '', 'dus5f86da97c8fe4'),
(36, 'shyam@ditsolutions.net', 'ssasas', 'sasas', '1111', '2020-11-12 12:43:00', '2020-11-12 12:45:00', '2', 'saxena.shubham.2110@gmail.com', '', 'dus5face06e9c19d'),
(49, 'sachinchatterjee31796@gmail.com', 'Dussoji2', 'testing', 'kkkk', '2020-11-25 03:07:00', '2020-11-25 18:07:00', '900', 'vv', '+917897115019', 'dus5fbd1dea75014'),
(38, 'shyam@ditsolutions.net', 'Shyam Shanbhag', 'haha', 'nopass', '2020-11-19 16:28:00', '2020-11-19 17:28:00', '60', 'srshegdekar@gmail.com', '+919964674919', 'dus5fb64ff0ce0cd'),
(52, 'sachinchatterjee31796@gmail.com', 'support', 'testing', 'kkkk', '2020-12-08 15:57:00', '2020-12-08 17:57:00', '120', 'sachin@delbo.co.in', '+917897115019', 'dus5fc3697a4bdb1'),
(51, 'sachinchatterjee31796@gmail.com', 'Dussoji', 'testing', 'kkkk', '2020-11-26 20:29:00', '2020-11-26 22:29:00', '120', 'kkkkkkkkkk', '+917897115019', 'dus5fbf7cb6558a6'),
(48, 'shyam@ditsolutions.net', 'Shyam Shanbhag', 'haha', 'nopass', '2020-11-24 18:51:00', '2020-11-24 19:51:00', '60', 'srshegdekar@gmail.com', '+919964674919', 'dus5fbd08fa90975'),
(53, 'sachinchatterjee31796@gmail.com', 'support1', 'testing', 'kkkk', '2020-12-02 18:13:00', '2020-12-02 21:13:00', '180', 'sachin@delbo.co.in', '+917897115019', 'dus5fc36d4fca2a7'),
(54, 'sachinchatterjee31796@gmail.com', 'support2', 'testing', 'kkkk', '2020-12-03 17:17:00', '2020-12-03 23:17:00', '360', 'sachinchatterjee31796@gmail.com', '+917897115019', 'dus5fc36e563b064'),
(55, 'sachinchatterjee31796@gmail.com', 'SACHIN CHATTERJEE', 'testing', 'kkkk', '2020-12-05 18:24:00', '2020-12-05 18:27:00', '3', 'sachinchatterjee31796@gmail.com', '+917897115019', 'dus5fc36fd2ac62b'),
(56, 'sachinchatterjee31796@gmail.com', 'shyam', 'testing', 'kkkk', '2020-12-10 22:50:00', '2020-12-11 05:52:00', '422', 'hello@impactcart.in', '+917975325049', 'dus5fc3bc5238377'),
(59, 'shyam@ditsolutions.net', 'Shyam Shanbhag', 'haha', 'nopass', '2020-12-01 13:39:00', '2020-12-01 14:39:00', '60', 'info@ditsolutions.net', '+917975325049', 'hos5fc4a8b98b136'),
(58, 'shyam@ditsolutions.net', 'Shyam Shanbhag', 'haha', 'nopass', '2020-11-30 13:36:00', '2020-11-30 14:36:00', '60', 'info@ditsolutions.net', '+917975325049', 'hos5fc4a81e46c1c'),
(60, 'shyam@ditsolutions.net', 'Shyam Shanbhag', 'haha', 'nopass', '2020-12-02 01:41:00', '2020-12-02 01:44:00', '3', 'info@ditsolutions.net', '+917975325049', 'hos5fc4a8f316bf2'),
(61, '', 'Shyam Shanbhag', 'haha', 'nopass', '2020-11-30 15:30:00', '2020-11-30 15:31:00', '1', 'info@ditsolutions.net', '+917975325049', 'hos5fc4c2eddda65'),
(62, 'sachinchatterjee31796@gmail.com', 'SACHIN CHATTERJEE', 'testing', 'kkkk', '2020-12-25 16:44:00', '2020-12-25 18:45:00', '121', 'sachinchatterjee31796@gmail.com,sachin@ditsolutions.net,hello@impactcart.in', '+917897115019', 'hos5fcb4f18ef89e'),
(63, 'sachinchatterjee31796@gmail.com', 'SACHIN CHATTERJEE', 'testing', 'kkkk', '2020-12-24 22:38:00', '2020-12-24 23:38:00', '60', 'sachinchatterjee31796@gmail.com', '+917897115019', 'hos5fd38b8fc9614'),
(64, 'sachinchatterjee31796@gmail.com', 'SACHIN CHATTERJEE', 'testing', 'kkkk', '2020-12-31 21:37:00', '2020-12-31 23:38:00', '121', 'sachinchatterjee31796@gmail.com', '+917897115019', 'hos5fd39891888cc');

-- --------------------------------------------------------

--
-- Table structure for table `u_support`
--

CREATE TABLE `u_support` (
  `supno` int(5) NOT NULL,
  `uemail` varchar(50) DEFAULT NULL,
  `stopic` varchar(95) DEFAULT NULL,
  `sfeedback` longtext
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `u_support`
--

INSERT INTO `u_support` (`supno`, `uemail`, `stopic`, `sfeedback`) VALUES
(1, 'abc@gmail.com', 'Video', 'Not working properly'),
(2, 'abc@gmail.com', 'Audio', 'There are several types in Mysql that allows you to store text in a field. See the complete list in 11.8 Data Type Storage Requirements of the MySQL manual.\n\nTINYBLOB, TINYTEXT [math]2^8 bytes[/math]\n\nBLOB, TEXT [math]2^16 bytes[/math]\n\nMEDIUMBLOB, MEDIUMTEXT [math]2^24 bytes[/math]\n\nLONGBLOB, LONGTEXT [math]2^36 bytes[/math]\n\nThe *BLOB types are intended for general data (binary), and the *TEXT types are best suited for text storage (useful when you need to store and search into this text). The type selected depends on your needs of space.\n\nTYNYTEXT stores text data up to 256 bytes.\nTEXT could be enough to store text data up to 64K.\nMEDIUMTEXT can store text data up to 16Mb.\nLONGTEXT is big enough to store any size of text (up to 64Gb aprox)\nIf you donâ€™t know how to use PHP to connect to a SQL database you can follow a tutorial like this PHP Insert Data Into MySQ'),
(3, 'abc@gmail.com', 'Audio', 'verb (used with object), hurt, hurtÂ·ing.\nto cause bodily injury to; injure:\nHe was badly hurt in the accident.\nto cause bodily pain to or in:\nThe wound still hurts him.\nSEE MORE\nverb (used without object), hurt, hurtÂ·ing.\nto feel or suffer bodily or mental pain or distress:\nMy back still hurts.\nto cause bodily or mental pain or distress:\nThe blow to his pride hurt most.\nSEE MORE\nnoun\na blow that inflicts a wound; bodily injury or the cause of such injury.\ninjury, damage, or harm.\nSEE MORE\nSEE MORE DEFINITIONS\nî˜“\n\nQUIZZES\nTEACH YOURSELF THESE 2ND-3RD GRADE WORDS!\nGet a little extra practice with this fun quiz featuring words from Common Core books!\nQUESTION 1 OF 10\ncrew\ncontinuous dull pain\nsuch a blow\ngroup of persons working together, as on a ship\nTAKE THE QUIZ TO FIND OUT\nORIGIN OF HURT\nFirst recorded in 1150â€“1200; (verb) Middle English hurten, hirten, herten â€œto injure, damage, stumble, knock together,â€ apparently from Old French hurter â€œto knock (against), opposeâ€ (compare French heurter, originally dialectal), probably a verbal derivative of Frankish unattested hÃ»rt â€œram,â€ cognate with Old Norse hrÅ«tr; (noun) Middle English, from Old French, derivative of the verb\nSYNONYMS FOR HURT\n3mar, impair.\n5afflict, wound.\n6ache.\n12cut, slight.\nSEE SYNONYMS FOR hurt ON THESAURUS.COM\nSYNONYM STUDY FOR HURT\n10. See injury.\nOTHER WORDS FROM HURT\nhurtÂ·aÂ·ble, adjective\nhurter, noun\nunÂ·hurt, adjective\nunÂ·hurtÂ·ing, adjective\nWORDS NEARBY HURT\nhursinghar, Hurst, Hurstmonceux, Hurston, Hurston, Zora Neale, hurt, hurter, hurtful, HÃ¼rthle cell, HÃ¼rthle cell carcinoma, HÃ¼rthle cell tumor\nDICTIONARY.COM UNABRIDGED\nBASED ON THE RANDOM HOUSE UNABRIDGED DICTIONARY, Â© RANDOM HOUSE, INC. 2020\nWORDS RELATED TO HURT\npain, bruise, suffering, discomfort, outrage, ache, harm, mar, injure, wound, damage, sting, impair, punish, trouble, annoy, sadden, upset, constrain, shot\nEXAMPLE SENTENCES FROM THE WEB FOR HURT\nThe offices were firebombed in 2011; no one was hurt but a permanent police car was subsequently stationed outside.\n\nFRANCE MOURNSâ€”AND HUNTS|NICO HINES, CHRISTOPHER DICKEY|JANUARY 8, 2015|DAILY BEAST\nIn 2012, as a 10th grader, Lean says he recorded his first legitimate song, â€œHurt.â€\n\nTHE CULT OF YUNG LEAN: â€˜Iâ€™M BUILDING AN ANARCHISTIC SOCIETY FROM THE GROUND UPâ€™|MARLOW STERN|JANUARY 4, 2015|DAILY BEAST\nThe â€œcryingâ€ incident is thought to have hurt Muskie in the primary--which he won handily, but with under 50 percent of the vote.\n\nTHE WORLDâ€™S TOUGHEST POLITICAL QUIZ|JEFF GREENFIELD|DECEMBER 31, 2014|DAILY BEAST\nEven the best of us can hurt the people who come to us for care when we forget that our foremost obligation is to them.\n\nWHY SO MANY SURGEONS ARE PSYCHOS|RUSSELL SAUNDERS|DECEMBER 17, 2014|DAILY BEAST\nSEE MORE EXAMPLES\nî˜“\nEXPLORE DICTIONARY.COM\nAll Of These Words Are Offensive (But Only Sometimes)\nAll Of These Words Are Offensive (But Only Sometimes)\n\nâ€œKarenâ€ vs. â€œBeckyâ€ vs. â€œStacyâ€: How Different Are These Slang Terms?\nâ€œKarenâ€ vs. â€œBeckyâ€ vs. â€œStacyâ€: How Different Are These Slang Terms?\n\nâ€œEpidemicâ€ vs. â€œPandemicâ€ vs. â€œEndemicâ€: What Do These Terms Mean?\nâ€œEpidemicâ€ vs. â€œPandemicâ€ vs. â€œEndemicâ€: What Do These Terms Mean?\n\nWhen To Use â€œHaveâ€ vs. â€œHasâ€\nWhen To Use â€œHaveâ€ vs. â€œHasâ€\n\nWhat Is The Difference Between â€œItâ€™sâ€ And â€œItsâ€?\nWhat Is The Difference Between â€œItâ€™sâ€ And â€œItsâ€?\n\nWhat Do â€œa.m.â€ And â€œp.m.â€ Stand For?\nWhat Do â€œa.m.â€ And â€œp.m.â€ Stand For?\n\nBRITISH DICTIONARY DEFINITIONS FOR HURT (1 OF 2)\nhurt1/ (hÉœËt) /\nverb hurts, hurting or hurt\nto cause physical pain to (someone or something)\nto cause emotional pain or distress to (someone)\nto produce a painful sensation in (someone)the bruise hurts\nSEE MORE\nnoun\nphysical, moral, or mental pain or suffering\na wound, cut, or sore\nSEE MORE\nadjective\ninjured or pained physically or emotionallya hurt knee; a hurt look\nDERIVED FORMS OF HURT\nhurter, noun\nWORD ORIGIN FOR HURT\nC12 hurten to hit, from Old French hurter to knock against, probably of Germanic origin; compare Old Norse hrÅ«tr ram, Middle High German hurt a collision\nBRITISH DICTIONARY DEFINITIONS FOR HURT (2 OF 2)\nhurt2whort (hwÉœËt)/ (hÉœËt) /\nnoun\nSouthern English dialect another name for whortleberry\nCOLLINS ENGLISH DICTIONARY - COMPLETE & UNABRIDGED 2012 DIGITAL EDITION\nÂ© WILLIAM COLLINS SONS & CO. LTD. 1979, 1986 Â© HARPERCOLLINS\nPUBLISHERS 1998, 2000, 2003, 2005, 2006, 2007, 2009, 2012\nIDIOMS AND PHRASES WITH HURT\nhurt\nsee not hurt a fly.'),
(4, 'abc@gmail.com', 'Audio', 'hheh'),
(5, 'abc@gmail.com', 'Video', 'uhguijn');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `a_plans`
--
ALTER TABLE `a_plans`
  ADD PRIMARY KEY (`pno`);

--
-- Indexes for table `d_registration`
--
ALTER TABLE `d_registration`
  ADD PRIMARY KEY (`uno`,`uemail`);

--
-- Indexes for table `subs_payment`
--
ALTER TABLE `subs_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `u_feedback`
--
ALTER TABLE `u_feedback`
  ADD PRIMARY KEY (`fno`),
  ADD KEY `uemail` (`uemail`);

--
-- Indexes for table `u_meetings`
--
ALTER TABLE `u_meetings`
  ADD PRIMARY KEY (`mno`),
  ADD KEY `uemail` (`uemail`);

--
-- Indexes for table `u_support`
--
ALTER TABLE `u_support`
  ADD PRIMARY KEY (`supno`),
  ADD KEY `uemail` (`uemail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `a_plans`
--
ALTER TABLE `a_plans`
  MODIFY `pno` int(5) NOT NULL AUTO_INCREMENT COMMENT 'plan number', AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `d_registration`
--
ALTER TABLE `d_registration`
  MODIFY `uno` int(4) NOT NULL AUTO_INCREMENT COMMENT 'Auto_increment of unique ID', AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `subs_payment`
--
ALTER TABLE `subs_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `u_feedback`
--
ALTER TABLE `u_feedback`
  MODIFY `fno` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `u_meetings`
--
ALTER TABLE `u_meetings`
  MODIFY `mno` int(5) NOT NULL AUTO_INCREMENT COMMENT 'This is the auto increment of meeting number', AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `u_support`
--
ALTER TABLE `u_support`
  MODIFY `supno` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
