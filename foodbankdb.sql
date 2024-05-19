-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 16, 2023 at 03:04 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `foodbankdb`
--
CREATE DATABASE `foodbankdb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `foodbankdb`;

-- --------------------------------------------------------

--
-- Table structure for table `admininfo`
--

CREATE TABLE IF NOT EXISTS `admininfo` (
  `AdminID` int(10) NOT NULL AUTO_INCREMENT,
  `AdminEmail` varchar(255) NOT NULL,
  `AdminPassword` varchar(255) NOT NULL,
  `AdminName` varchar(255) NOT NULL,
  `AdminGender` varchar(6) NOT NULL,
  `AdminPhoneNum` varchar(12) NOT NULL,
  PRIMARY KEY (`AdminID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admininfo`
--

INSERT INTO `admininfo` (`AdminID`, `AdminEmail`, `AdminPassword`, `AdminName`, `AdminGender`, `AdminPhoneNum`) VALUES
(1, 'suah@admin.com', 'suah', 'SuahSwag24212', 'male', '01111604717'),
(2, 'fbh_admin@gmail.com', 'fbh_admin', 'Howard', 'male', '0135388633');

-- --------------------------------------------------------

--
-- Table structure for table `cashdonationtable`
--

CREATE TABLE IF NOT EXISTS `cashdonationtable` (
  `DonationID` int(11) NOT NULL AUTO_INCREMENT,
  `UserEmail` varchar(255) NOT NULL,
  `FoodbankName` varchar(255) NOT NULL,
  `CashDonated` varchar(255) NOT NULL,
  `Date` date NOT NULL,
  PRIMARY KEY (`DonationID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `cashdonationtable`
--

INSERT INTO `cashdonationtable` (`DonationID`, `UserEmail`, `FoodbankName`, `CashDonated`, `Date`) VALUES
(19, 'howardwhw04@yahoo.com', 'Kechara Food Bank', '36.9', '2023-08-16'),
(18, 'pangzhiyuan@gmail.com', 'Yayasan Food Bank Malaysia', '50.5', '2023-08-16'),
(20, 'Hutao0714@gmail.com', 'Kechara Food Bank', '145', '2023-08-16'),
(22, 'Hutao0714@gmail.com', 'The Lost Food Project', '26', '2023-08-16');

-- --------------------------------------------------------

--
-- Table structure for table `donationinfo`
--

CREATE TABLE IF NOT EXISTS `donationinfo` (
  `RequestID` int(11) NOT NULL AUTO_INCREMENT,
  `UserEmail` varchar(255) NOT NULL,
  `Address` mediumtext NOT NULL,
  `FoodbankName` varchar(255) NOT NULL,
  `ItemType` varchar(255) NOT NULL,
  `PreferredDate` date NOT NULL,
  `PreferredTime` time NOT NULL,
  `Status` varchar(15) NOT NULL,
  PRIMARY KEY (`RequestID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `donationinfo`
--

INSERT INTO `donationinfo` (`RequestID`, `UserEmail`, `Address`, `FoodbankName`, `ItemType`, `PreferredDate`, `PreferredTime`, `Status`) VALUES
(6, 'Hutao0714@gmail.com', '7/15, Liyue Harbour, Silk Flower Road', 'PEMURAH Food Bank', 'cannedfood,fruit,vegetable,rice,oil,drink', '2023-08-17', '19:15:00', 'Rejected');

-- --------------------------------------------------------

--
-- Table structure for table `foodbankinfo`
--

CREATE TABLE IF NOT EXISTS `foodbankinfo` (
  `FoodbankID` int(10) NOT NULL AUTO_INCREMENT,
  `FoodbankName` varchar(255) NOT NULL,
  `FoodbankLocation` varchar(255) NOT NULL,
  `Description` longtext NOT NULL,
  `ManagerName` varchar(255) NOT NULL,
  `ContactNumber` varchar(15) NOT NULL,
  `PictureName` varchar(255) NOT NULL,
  PRIMARY KEY (`FoodbankID`),
  FULLTEXT KEY `FoodbankName` (`FoodbankName`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `foodbankinfo`
--

INSERT INTO `foodbankinfo` (`FoodbankID`, `FoodbankName`, `FoodbankLocation`, `Description`, `ManagerName`, `ContactNumber`, `PictureName`) VALUES
(23, 'Yayasan Food Bank Malaysia', 'No.15 Jalan BA 2/1 Kawasan Perindustrian, Bukit Angkat, 43000 Kajang, Selangor', 'Hello', 'Ali Baba', '0387360117', 'uploads/bc0fe7c51e7028c75d264c0afbaf8a0b.jpg'),
(24, 'Kechara Food Bank', '10, Jln Seri Rejang 3, Setapak Jaya, 53300 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur', 'Hello', 'Zhong Li', '0123456789', 'uploads/dc1e68b29f8b2f1c0ed4deda570c5017.jpg'),
(25, 'Food Bank Siswa UiTM', '40450 Shah Alam, Selangor', 'Hello', 'Muhammad Zakri', '0138337799', 'uploads/8e28f300b0397d6b52284e1f350c5b7b.jpg'),
(26, 'The Lost Food Project', ' 47-1, Jalan Tiga, Chan Sow Lin, 55200 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur', 'Hello', 'Ah Keong', '0174447777', 'uploads/417efc4666f59f68755cf77b5a0a26cd.jpg'),
(27, 'PEMURAH Food Bank', 'Lot 475, Batu 13½, Kampung Sg. Balak, Jalan Cheras, 43000 Cheras, Selangor', 'Hello', 'Sathsih Vishal', '0196677123', 'uploads/50bd3424bdb97be07d933383b2eaea17.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE IF NOT EXISTS `userinfo` (
  `UserID` int(10) NOT NULL AUTO_INCREMENT,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `UserName` varchar(255) DEFAULT NULL,
  `Gender` varchar(6) DEFAULT NULL,
  `PhoneNumber` varchar(15) NOT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`UserID`, `Email`, `Password`, `UserName`, `Gender`, `PhoneNumber`) VALUES
(2, 'suahswag24@gmail.com', 's', 'Suah', 'male', '0111111111'),
(7, 'jeff@gmail.com', 'j', NULL, NULL, ''),
(10, 'howardwhw04@yahoo.com', 'hw12345678', 'Howard', 'male', '0135388633'),
(9, 'abc@gmail.com', 'abcabc', NULL, NULL, ''),
(11, 'pangzhiyuan@gmail.com', 'pzy123', 'Zhi Yuan ', 'female', '0123455432'),
(12, 'Hutao0714@gmail.com', 'hutao123', 'Hutao', 'female', '0171571517');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
