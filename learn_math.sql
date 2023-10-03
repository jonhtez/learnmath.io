-- Adminer 4.8.1 MySQL 8.0.26 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8;

CREATE DATABASE `learn_maths` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `learn_maths`;

CREATE TABLE `activities` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pupil_id` int DEFAULT NULL,
  `lecture_id` int DEFAULT NULL,
  `category` varchar(30) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `week` int DEFAULT NULL,
  `result` varchar(30) DEFAULT NULL,
  `date` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `activities` (`id`, `pupil_id`, `lecture_id`, `category`, `status`, `week`, `result`, `date`) VALUES
(12,	12,	6,	'Class 1',	'Pass',	1,	'3',	'11-Apr-2022');

CREATE TABLE `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `token` varchar(70) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `admin` (`id`, `email`, `password`, `token`) VALUES
(1,	'admin@gmail.com',	'12345',	'123456789');

CREATE TABLE `lecture_upload` (
  `id` int NOT NULL AUTO_INCREMENT,
  `lecture_id` int DEFAULT NULL,
  `name` varchar(120) DEFAULT NULL,
  `upload` varchar(250) DEFAULT NULL,
  `date` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `lecture_upload` (`id`, `lecture_id`, `name`, `upload`, `date`) VALUES
(33,	6,	'Slide1',	'upload/11-Apr-2022-124547-713479410.jpg',	'11-Apr-2022'),
(34,	6,	'Slide2',	'upload/11-Apr-2022-124602-502547622.jpg',	'11-Apr-2022'),
(35,	6,	'Slide3',	'upload/11-Apr-2022-124614-333009290.jpg',	'11-Apr-2022'),
(36,	6,	'Slide4',	'upload/11-Apr-2022-124627-940543485.jpg',	'11-Apr-2022'),
(37,	7,	'Slide 1',	'upload/14-Apr-2022-075418-17978120.jpg',	'14-Apr-2022'),
(38,	7,	'Slide 2',	'upload/14-Apr-2022-075431-107165089.jpg',	'14-Apr-2022'),
(39,	8,	'Slide 1',	'upload/14-Apr-2022-075924-330429034.jpg',	'14-Apr-2022'),
(40,	8,	'Slide 2',	'upload/14-Apr-2022-075957-853020135.jpg',	'14-Apr-2022'),
(41,	9,	'Slide 1',	'upload/14-Apr-2022-080850-27691926.jpg',	'14-Apr-2022'),
(42,	9,	'Slide 2',	'upload/14-Apr-2022-080905-258414868.jpg',	'14-Apr-2022');

CREATE TABLE `lectures` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category` varchar(20) DEFAULT NULL,
  `note` varchar(800) DEFAULT NULL,
  `topic` varchar(250) DEFAULT NULL,
  `week` varchar(2) DEFAULT NULL,
  `date` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `lectures` (`id`, `category`, `note`, `topic`, `week`, `date`) VALUES
(6,	'Class 1',	'This lesson will help the pupil to understand how to write and recognise numbers from 1-100',	'Recognising and writing numbers',	'1',	'11-Apr-2022'),
(7,	'Class 2',	'This lesson is to introduce pupils to the fundamentals and concepts of addition and subtraction.',	'Basic Addition and Subtraction by One',	'1',	'14-Apr-2022'),
(8,	'Class 3',	'This lesson will introduce the pupils to the basics of fraction and division',	'Basics of Fraction',	'1',	'14-Apr-2022'),
(9,	'Class 4',	'This is to introduce the application of addition and subtraction in our day to day activities. Pupils will learn to appreciate the advantages of learning mathematics',	'Applied Addition and Subtraction',	'1',	'14-Apr-2022');

CREATE TABLE `pupils` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fullname` varchar(40) DEFAULT NULL,
  `category` varchar(15) DEFAULT NULL,
  `email` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `picture` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `token` varchar(80) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `pupils` (`id`, `fullname`, `category`, `email`, `picture`, `password`, `token`) VALUES
(12,	'Benjamin Dotun',	'Class 1',	'benjamin@gmail.com',	'upload/profile/10-Apr-2022-123340-457442957.png',	'5d9f71b71b207b9e665820c0dce67bdb',	'ben341444995544');

CREATE TABLE `quiz` (
  `id` int NOT NULL AUTO_INCREMENT,
  `lecture_id` int DEFAULT NULL,
  `question` varchar(700) DEFAULT NULL,
  `answer` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `quiz` (`id`, `lecture_id`, `question`, `answer`) VALUES
(19,	6,	'upload/quiz/11-Apr-2022-124726-804726320.jpg',	'35'),
(20,	6,	'upload/quiz/11-Apr-2022-124753-991400846.jpg',	'99'),
(21,	6,	'upload/quiz/11-Apr-2022-124810-89883723.jpg',	'3'),
(22,	6,	'upload/quiz/11-Apr-2022-124824-534941421.jpg',	'12'),
(23,	6,	'upload/quiz/11-Apr-2022-124838-344627176.jpg',	'3'),
(24,	6,	'upload/quiz/11-Apr-2022-124856-377562674.jpg',	'59'),
(25,	6,	'upload/quiz/11-Apr-2022-124914-328385293.jpg',	'52'),
(26,	6,	'upload/quiz/11-Apr-2022-124929-876773539.jpg',	'1'),
(27,	7,	'upload/quiz/14-Apr-2022-075514-641331707.jpg',	'3'),
(28,	7,	'upload/quiz/14-Apr-2022-075531-410230247.jpg',	'13'),
(29,	7,	'upload/quiz/14-Apr-2022-075548-979087886.jpg',	'100'),
(30,	7,	'upload/quiz/14-Apr-2022-075605-573846564.jpg',	'48'),
(31,	7,	'upload/quiz/14-Apr-2022-075626-699927789.jpg',	'46'),
(32,	7,	'upload/quiz/14-Apr-2022-075643-274445503.jpg',	'50'),
(33,	7,	'upload/quiz/14-Apr-2022-075706-828255304.jpg',	'11'),
(34,	7,	'upload/quiz/14-Apr-2022-075725-58750251.jpg',	'4'),
(35,	8,	'upload/quiz/14-Apr-2022-080041-30280024.jpg',	'10'),
(36,	8,	'upload/quiz/14-Apr-2022-080106-91266237.jpg',	'2'),
(37,	8,	'upload/quiz/14-Apr-2022-080155-859856862.jpg',	'2'),
(38,	8,	'upload/quiz/14-Apr-2022-080232-553209807.jpg',	'6'),
(39,	8,	'upload/quiz/14-Apr-2022-080255-869170654.jpg',	'6'),
(40,	8,	'upload/quiz/14-Apr-2022-080431-299489519.jpg',	'1'),
(41,	8,	'upload/quiz/14-Apr-2022-080512-483437727.jpg',	'2'),
(42,	9,	'upload/quiz/14-Apr-2022-080959-926157624.jpg',	'3'),
(43,	9,	'upload/quiz/14-Apr-2022-081035-794422395.jpg',	'5'),
(44,	9,	'upload/quiz/14-Apr-2022-081134-937260270.jpg',	'4'),
(45,	9,	'upload/quiz/14-Apr-2022-081224-929571.jpg',	'12'),
(46,	9,	'upload/quiz/14-Apr-2022-081319-271253486.jpg',	'5'),
(47,	9,	'upload/quiz/14-Apr-2022-081349-816899390.jpg',	'10'),
(48,	9,	'upload/quiz/14-Apr-2022-081425-30456795.jpg',	'2');

CREATE TABLE `settings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `item` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `rate` varchar(400) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `date` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `settings` (`id`, `item`, `rate`, `date`) VALUES
(2,	'week',	'1',	'07-Apr-2022');

-- 2022-04-14 15:09:20
