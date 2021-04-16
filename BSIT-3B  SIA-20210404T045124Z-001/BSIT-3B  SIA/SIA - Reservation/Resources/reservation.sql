-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2021 at 08:37 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reservation`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblarrival`
--

CREATE TABLE `tblarrival` (
  `id` int(11) NOT NULL,
  `reservationID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblbilling`
--

CREATE TABLE `tblbilling` (
  `id` int(11) NOT NULL,
  `reservationID` int(11) NOT NULL,
  `roomrate` varchar(100) NOT NULL,
  `others` varchar(100) NOT NULL,
  `num_night` int(11) NOT NULL,
  `num_pax` varchar(100) NOT NULL,
  `discount` varchar(100) NOT NULL,
  `total` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblcustomer`
--

CREATE TABLE `tblcustomer` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `address` varchar(300) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `company` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblgallery`
--

CREATE TABLE `tblgallery` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `desc` varchar(100) NOT NULL,
  `path` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblothers`
--

CREATE TABLE `tblothers` (
  `id` int(11) NOT NULL,
  `billingID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `rate` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblpolicy`
--

CREATE TABLE `tblpolicy` (
  `id` int(11) NOT NULL DEFAULT 0,
  `name` varchar(300) NOT NULL,
  `desc` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblprofile`
--

CREATE TABLE `tblprofile` (
  `id` int(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `latitude` varchar(100) NOT NULL,
  `longitude` varchar(100) NOT NULL,
  `profile` text NOT NULL,
  `policy` text NOT NULL,
  `service` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblprofile`
--

INSERT INTO `tblprofile` (`id`, `address`, `contact`, `latitude`, `longitude`, `profile`, `policy`, `service`) VALUES
(1, 'af', 'asdf', '', '', 'Sweet Cactel is a churvaness', 'Dont churvaokdoki', 'the heckomgbrb'),
(2, 'af', 'asdf', '', '', '<p><strong>Sweet Cactel</strong> is a churvaness</p>', '<p>Dont churva ok doki</p>', '<p>the heck omg brb</p>'),
(3, 'af', 'asdf', '', '', '<p><strong>Sweet Cactel</strong> is a churvaness</p>', '<p>Dont churva ok doki</p>', '<ol><li>the heck</li><li>omg</li><li>brb</li></ol>'),
(4, 'af', 'asdf', '', '', '<p><strong>Sweet Cactel</strong> is a churvaness</p><br />', '<p>Dont churva ok doki</p><br />', '<ol><br /><li>the heck</li><br /><li>omg</li><br /><li>brb</li><br /></ol><br />'),
(5, 'af', 'asdf', '', '', '<p><strong>Sweet Cactel</strong> is a churvaness</p><br /><br /><p>&nbsp;</p><br />', '<p>Dont churva ok doki</p><br /><br /><p>&nbsp;</p><br />', '<ol><br /><li>the hec</li><br /><li>omg</li><br /><li>brb</li><br /><br /><br /><br /><br />&nbsp;<br /></ol><br /><br /><p>&nbsp;</p><br />'),
(6, 'af', 'asdf', '', '', '<p><strong>Sweet Cactel</strong> is a churvaness</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br />', '<p>Dont churva ok doki</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br />', '<ul><br /><li>the heck</li><br /><li>the fuck</li><br /><li>the hell</li><br /></ul><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br />'),
(7, 'af', 'asdf', '', '', '<p><strong>Sweet Cactel</strong> is a churvaness</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br />', '<p>Dont churva ok doki</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br />', '<ul><br /><br /><li>the heck</li><br /><li>the fuc</li><br /><li>the hell</li><br /><br /><br /><br /><br />&nbsp;<br /></ul><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br />'),
(8, 'af', 'asdf', '', '', '<p><strong>Sweet Cactel</strong> is a churvaness</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br />', '<p>Dont churva ok doki</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br />', '<ul><br /><li>the heck</li><br /><li>the fuc</li><br /><li>the hell</li><br /></ul>'),
(9, 'af', 'asdf', '', '', '<p><strong><img alt=\"\" src=\"http://localhost/hotel/assets/img/hotel.jpg\" style=\"float:left; height:435px; width:800px\" />Sweet Cactel</strong> is a churvaness</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br />', '<p>Dont churva ok doki</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br /><br /><p>&nbsp;</p><br />', '<ul><br /><br /><li>the heck</li><br /><br /><br /><li>the fuc</li><br /><br /><br /><li>the hell</li><br /><br /><br /><br /><br />&nbsp;<br /></ul><br />'),
(10, 'af', 'asdf', '', '', '<p><strong>This is a heck</strong></p><p>&nbsp;</p><p>&nbsp;</p>', '<ol><li>Fuck this section</li></ol><p>&nbsp;</p><p>&nbsp;</p>', '<ol><li>sdfsdsd</li><li>sdf</li><li>sadf</li><li>sdf</li><li>sd</li><li>fs</li><li>df</li></ol>'),
(11, 'af', 'asdf', '', '', '<p><strong>This is a heck</strong></p><p>&nbsp;</p><p>&nbsp;</p>', '<ol><li>Fuck this section</li></ol><p>&nbsp;</p><p>&nbsp;</p>', '<ol><li>Massage</li><li>Hilot</li><li>Liggam</li><li>Sex</li></ol>'),
(12, 'af', 'asdf', '', '', '<p>A commercial establishment providing lodging, meals, and other guest services.</p><p>In general, to be called a hotel, an establishment must have a minimum of six letting bedrooms, at least three of which must have attached (ensuite) private bathroom facilities. Although hotels are classified into &#39;Star&#39; categories (1-Star to 5-Star), there is no standard method of assigning these ratings, and compliance with customary requirements is voluntary. A US hotel with a certain rating, for example, is may look very different from a European or Asian hotel with the same rating, and would provide a different level of amenities, range of facilities, and quality of service. Whereas hotel chains assure uniform standards throughout, non-chain hotels (even within the same country) may not agree on the same standards. In Germany, for example, only about 30 percent of the hotels choose to comply with the provisions of the rules established by the German Hotels &amp; Restaurants association. Although both WTO and ISO have been trying to persuade hotels to agree on some minimum requirements as world-wide norms, the entire membership of the Paris-based International Hotel &amp; Restaurant (IH&amp;RA) opposes any such move.</p>', '<p>A commercial establishment providing lodging, meals, and other guest services.</p><p>In general, to be called a hotel, an establishment must have a minimum of six letting bedrooms, at least three of which must have attached (ensuite) private bathroom facilities. Although hotels are classified into &#39;Star&#39; categories (1-Star to 5-Star), there is no standard method of assigning these ratings, and compliance with customary requirements is voluntary. A US hotel with a certain rating, for example, is may look very different from a European or Asian hotel with the same rating, and would provide a different level of amenities, range of facilities, and quality of service. Whereas hotel chains assure uniform standards throughout, non-chain hotels (even within the same country) may not agree on the same standards. In Germany, for example, only about 30 percent of the hotels choose to comply with the provisions of the rules established by the German Hotels &amp; Restaurants association. Although both WTO and ISO have been trying to persuade hotels to agree on some minimum requirements as world-wide norms, the entire membership of the Paris-based International Hotel &amp; Restaurant (IH&amp;RA) opposes any such move.</p>', '<ol><li>Massage</li><li>Hilot</li><li>Liggam</li><li>Sex</li></ol>'),
(13, 'af', 'asdf', '', '', '<p>A commercial establishment providing lodging, meals, and other guest services.</p><p>In general, to be called a hotel, an establishment must have a minimum of six letting bedrooms, at least three of which must have attached (ensuite) private bathroom facilities. Although hotels are classified into &#39;Star&#39; categories (1-Star to 5-Star), there is no standard method of assigning these ratings, and compliance with customary requirements is voluntary. A US hotel with a certain rating, for example, is may look very different from a European or Asian hotel with the same rating, and would provide a different level of amenities, range of facilities, and quality of service. Whereas hotel chains assure uniform standards throughout, non-chain hotels (even within the same country) may not agree on the same standards. In Germany, for example, only about 30 percent of the hotels choose to comply with the provisions of the rules established by the German Hotels &amp; Restaurants association. Although both WTO and ISO have been trying to persuade hotels to agree on some minimum requirements as world-wide norms, the entire membership of the Paris-based International Hotel &amp; Restaurant (IH&amp;RA) opposes any such move.</p>', '<p>A commercial establishment providing lodging, meals, and other guest services.</p><p>In general, to be called a hotel, an establishment must have a minimum of six letting bedrooms, at least three of which must have attached (ensuite) private bathroom facilities. Although hotels are classified into &#39;Star&#39; categories (1-Star to 5-Star), there is no standard method of assigning these ratings, and compliance with customary requirements is voluntary. A US hotel with a certain rating, for example, is may look very different from a European or Asian hotel with the same rating, and would provide a different level of amenities, range of facilities, and quality of service. Whereas hotel chains assure uniform standards throughout, non-chain hotels (even within the same country) may not agree on the same standards. In Germany, for example, only about 30 percent of the hotels choose to comply with the provisions of the rules established by the German Hotels &amp; Restaurants association. Although both WTO and ISO have been trying to persuade hotels to agree on some minimum requirements as world-wide norms, the entire membership of the Paris-based International Hotel &amp; Restaurant (IH&amp;RA) opposes any such move.</p>', '<ol><li>Massage</li><li>Hilot</li><li>Liggam</li><li>Web Designing</li></ol>'),
(14, 'Brgy. Washington, Escalante City', '(034) 254 - 0321', '', '', '<p>A commercial establishment providing lodging, meals, and other guest services.</p><p>In general, to be called a hotel, an establishment must have a minimum of six letting bedrooms, at least three of which must have attached (ensuite) private bathroom facilities. Although hotels are classified into &#39;Star&#39; categories (1-Star to 5-Star), there is no standard method of assigning these ratings, and compliance with customary requirements is voluntary. A US hotel with a certain rating, for example, is may look very different from a European or Asian hotel with the same rating, and would provide a different level of amenities, range of facilities, and quality of service. Whereas hotel chains assure uniform standards throughout, non-chain hotels (even within the same country) may not agree on the same standards. In Germany, for example, only about 30 percent of the hotels choose to comply with the provisions of the rules established by the German Hotels &amp; Restaurants association. Although both WTO and ISO have been trying to persuade hotels to agree on some minimum requirements as world-wide norms, the entire membership of the Paris-based International Hotel &amp; Restaurant (IH&amp;RA) opposes any such move.</p>', '<p>A commercial establishment providing lodging, meals, and other guest services.</p><p>In general, to be called a hotel, an establishment must have a minimum of six letting bedrooms, at least three of which must have attached (ensuite) private bathroom facilities. Although hotels are classified into &#39;Star&#39; categories (1-Star to 5-Star), there is no standard method of assigning these ratings, and compliance with customary requirements is voluntary. A US hotel with a certain rating, for example, is may look very different from a European or Asian hotel with the same rating, and would provide a different level of amenities, range of facilities, and quality of service. Whereas hotel chains assure uniform standards throughout, non-chain hotels (even within the same country) may not agree on the same standards. In Germany, for example, only about 30 percent of the hotels choose to comply with the provisions of the rules established by the German Hotels &amp; Restaurants association. Although both WTO and ISO have been trying to persuade hotels to agree on some minimum requirements as world-wide norms, the entire membership of the Paris-based International Hotel &amp; Restaurant (IH&amp;RA) opposes any such move.</p>', '<ol><li>Massage</li><li>Hilot</li><li>Liggam</li><li>Web Designing</li></ol>');
INSERT INTO `tblprofile` (`id`, `address`, `contact`, `latitude`, `longitude`, `profile`, `policy`, `service`) VALUES
(15, 'Brgy. Washington, Escalante City', '(034) 254 - 0321', '10.3146663', '123.8918635', '<p>A commercial establishment providing lodging, meals, and other guest services.</p><p>In general, to be called a hotel, an establishment must have a minimum of six letting bedrooms, at least three of which must have attached (ensuite) private bathroom facilities. Although hotels are classified into &#39;Star&#39; categories (1-Star to 5-Star), there is no standard method of assigning these ratings, and compliance with customary requirements is voluntary. A US hotel with a certain rating, for example, is may look very different from a European or Asian hotel with the same rating, and would provide a different level of amenities, range of facilities, and quality of service. Whereas hotel chains assure uniform standards throughout, non-chain hotels (even within the same country) may not agree on the same standards. In Germany, for example, only about 30 percent of the hotels choose to comply with the provisions of the rules established by the German Hotels &amp; Restaurants association. Although both WTO and ISO have been trying to persuade hotels to agree on some minimum requirements as world-wide norms, the entire membership of the Paris-based International Hotel &amp; Restaurant (IH&amp;RA) opposes any such move.</p>', '<p>A commercial establishment providing lodging, meals, and other guest services.</p><p>In general, to be called a hotel, an establishment must have a minimum of six letting bedrooms, at least three of which must have attached (ensuite) private bathroom facilities. Although hotels are classified into &#39;Star&#39; categories (1-Star to 5-Star), there is no standard method of assigning these ratings, and compliance with customary requirements is voluntary. A US hotel with a certain rating, for example, is may look very different from a European or Asian hotel with the same rating, and would provide a different level of amenities, range of facilities, and quality of service. Whereas hotel chains assure uniform standards throughout, non-chain hotels (even within the same country) may not agree on the same standards. In Germany, for example, only about 30 percent of the hotels choose to comply with the provisions of the rules established by the German Hotels &amp; Restaurants association. Although both WTO and ISO have been trying to persuade hotels to agree on some minimum requirements as world-wide norms, the entire membership of the Paris-based International Hotel &amp; Restaurant (IH&amp;RA) opposes any such move.</p>', '<ol><li>Massage</li><li>Hilot</li><li>Liggam</li><li>Web Designing</li></ol>'),
(16, 'Gatuslao Street, Bacolod City, Negros Occidental', 'Contact person/s: Ms. Grema o. Nene 09493496202 		    Ms. Mae Ann P. Boko 09073669925', '10.3146663', '123.8918635', '<p>A commercial establishment providing lodging, meals, and other guest services.</p><p>In general, to be called a hotel, an establishment must have a minimum of six letting bedrooms, at least three of which must have attached (ensuite) private bathroom facilities. Although hotels are classified into &#39;Star&#39; categories (1-Star to 5-Star), there is no standard method of assigning these ratings, and compliance with customary requirements is voluntary. A US hotel with a certain rating, for example, is may look very different from a European or Asian hotel with the same rating, and would provide a different level of amenities, range of facilities, and quality of service. Whereas hotel chains assure uniform standards throughout, non-chain hotels (even within the same country) may not agree on the same standards. In Germany, for example, only about 30 percent of the hotels choose to comply with the provisions of the rules established by the German Hotels &amp; Restaurants association. Although both WTO and ISO have been trying to persuade hotels to agree on some minimum requirements as world-wide norms, the entire membership of the Paris-based International Hotel &amp; Restaurant (IH&amp;RA) opposes any such move.</p>', '<p>Policies:</p><p><!--[if !supportLists]-->&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--[endif]-->No Smoking</p><p><!--[if !supportLists]-->&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--[endif]-->No pets allowed</p><p><!--[if !supportLists]-->&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--[endif]-->A day before of reservation the customer must inform the receptionist if they want to extend</p><p><!--[if !supportLists]-->&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--[endif]-->Senior citizen, Person with Disabilities (PWD) and government employees must present identification card (ID) enable to avail discount.</p><p><!--[if !supportLists]-->&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--[endif]-->Each room is limited to the number of guest registered in the room at the time of check-in</p><p><!--[if !supportLists]-->&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--[endif]-->If housekeeping find any room damage in any way the hotel will charge the amount responsible for the room for all damages are clean up fees.</p><p><!--[if !supportLists]-->&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--[endif]-->No force check-in</p><p>Facilities:</p><p><!--[if !supportLists]-->&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--[endif]-->24-hour concierge</p><p><!--[if !supportLists]-->&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--[endif]-->Round-the-clock security</p><p><!--[if !supportLists]-->&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--[endif]-->Housekeeping</p><p><!--[if !supportLists]-->&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--[endif]-->Facilities for persons with disability</p>', '<ol><li>Massage</li><li>Hilot</li><li>Liggam</li><li>Web Designing</li></ol>'),
(17, 'Gatuslao Street, Bacolod City, Negros Occidental', 'Contact person/s: Ms. Grema o. Nene 09493496202 		    Ms. Mae Ann P. Boko 09073669925', '10.3146663', '123.8918635', '<p>A commercial establishment providing lodging, meals, and other guest services.</p><p>In general, to be called a hotel, an establishment must have a minimum of six letting bedrooms, at least three of which must have attached (ensuite) private bathroom facilities. Although hotels are classified into &#39;Star&#39; categories (1-Star to 5-Star), there is no standard method of assigning these ratings, and compliance with customary requirements is voluntary. A US hotel with a certain rating, for example, is may look very different from a European or Asian hotel with the same rating, and would provide a different level of amenities, range of facilities, and quality of service. Whereas hotel chains assure uniform standards throughout, non-chain hotels (even within the same country) may not agree on the same standards. In Germany, for example, only about 30 percent of the hotels choose to comply with the provisions of the rules established by the German Hotels &amp; Restaurants association. Although both WTO and ISO have been trying to persuade hotels to agree on some minimum requirements as world-wide norms, the entire membership of the Paris-based International Hotel &amp; Restaurant (IH&amp;RA) opposes any such move.</p>', '<p><strong>Policies:</strong></p><p><!--[if !supportLists]-->&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--[endif]-->No Smoking</p><p><!--[if !supportLists]-->&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--[endif]-->No pets allowed</p><p><!--[if !supportLists]-->&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--[endif]-->A day before of reservation the customer must inform the receptionist if they want to extend</p><p><!--[if !supportLists]-->&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--[endif]-->Senior citizen, Person with Disabilities (PWD) and government employees must present &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;identification card (ID) enable to avail discount.</p><p><!--[if !supportLists]-->&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--[endif]-->Each room is limited to the number of guest registered in the room at the time of check-in</p><p><!--[if !supportLists]-->&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--[endif]-->If housekeeping find any room damage in any way the hotel will charge the amount responsible &nbsp; &nbsp;for the room for all damages are clean up fees.</p><p><!--[if !supportLists]-->&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--[endif]-->No force check-in</p><p><strong>Facilities:</strong></p><p><!--[if !supportLists]-->&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--[endif]-->24-hour concierge</p><p><!--[if !supportLists]-->&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--[endif]-->Round-the-clock security</p><p><!--[if !supportLists]-->&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--[endif]-->Housekeeping</p><p><!--[if !supportLists]-->&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--[endif]-->Facilities for persons with disability</p>', '<ol><li>Massage</li><li>Hilot</li><li>Liggam</li><li>Web Designing</li></ol>'),
(18, 'Gatuslao Street, Bacolod City, Negros Occidental', 'Contact person/s: Ms. Grema o. Nene 09493496202 		    Ms. Mae Ann P. Boko 09073669925', '10.3146663', '123.8918635', '<p>Sweet City Captel is a budget traveler&rsquo;s haven right at the heart of Bacolod City. It&rsquo;s strategic location makes it accessible to public transportation and major business establishments in&nbsp; Bacolod City.&nbsp;Dorm-type accommodations are available in aircon and nonaircon.&nbsp;Currently, 2 and 4-bed standard rooms are being remodeled. Captel also provides discounts for government employees,&nbsp;senior citizens and PWD&#39;s.&nbsp;Sweet City Captel is a clean and cheap hostel. They&#39;re are just a few walks away from food houses, shopping malls, park and government offices</p>', '<p><strong>Policies:</strong></p><p><!--[if !supportLists]-->&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--[endif]-->No Smoking</p><p><!--[if !supportLists]-->&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--[endif]-->No pets allowed</p><p><!--[if !supportLists]-->&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--[endif]-->A day before of reservation the customer must inform the receptionist if they want to extend</p><p><!--[if !supportLists]-->&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--[endif]-->Senior citizen, Person with Disabilities (PWD) and government employees must present &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;identification card (ID) enable to avail discount.</p><p><!--[if !supportLists]-->&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--[endif]-->Each room is limited to the number of guest registered in the room at the time of check-in</p><p><!--[if !supportLists]-->&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--[endif]-->If housekeeping find any room damage in any way the hotel will charge the amount responsible &nbsp; &nbsp;for the room for all damages are clean up fees.</p><p><!--[if !supportLists]-->&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--[endif]-->No force check-in</p><p><strong>Facilities:</strong></p><p><!--[if !supportLists]-->&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--[endif]-->24-hour concierge</p><p><!--[if !supportLists]-->&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--[endif]-->Round-the-clock security</p><p><!--[if !supportLists]-->&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--[endif]-->Housekeeping</p><p><!--[if !supportLists]-->&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--[endif]-->Facilities for persons with disability</p>', '<ol><li>Massage</li><li>Hilot</li><li>Liggam</li><li>Web Designing</li></ol>'),
(19, 'Gatuslao Street, Bacolod City, Negros Occidental', 'Contact person/s: Ms. Grema o. Nene 09493496202 		    Ms. Mae Ann P. Boko 09073669925', '10.6407389', '122.9689565', '<p>Sweet City Captel is a budget traveler&rsquo;s haven right at the heart of Bacolod City. It&rsquo;s strategic location makes it accessible to public transportation and major business establishments in&nbsp; Bacolod City.&nbsp;Dorm-type accommodations are available in aircon and nonaircon.&nbsp;Currently, 2 and 4-bed standard rooms are being remodeled. Captel also provides discounts for government employees,&nbsp;senior citizens and PWD&#39;s.&nbsp;Sweet City Captel is a clean and cheap hostel. They&#39;re are just a few walks away from food houses, shopping malls, park and government offices</p>', '<p><strong>Policies:</strong></p><p><!--[if !supportLists]-->&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--[endif]-->No Smoking</p><p><!--[if !supportLists]-->&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--[endif]-->No pets allowed</p><p><!--[if !supportLists]-->&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--[endif]-->A day before of reservation the customer must inform the receptionist if they want to extend</p><p><!--[if !supportLists]-->&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--[endif]-->Senior citizen, Person with Disabilities (PWD) and government employees must present &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;identification card (ID) enable to avail discount.</p><p><!--[if !supportLists]-->&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--[endif]-->Each room is limited to the number of guest registered in the room at the time of check-in</p><p><!--[if !supportLists]-->&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--[endif]-->If housekeeping find any room damage in any way the hotel will charge the amount responsible &nbsp; &nbsp;for the room for all damages are clean up fees.</p><p><!--[if !supportLists]-->&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--[endif]-->No force check-in</p><p><strong>Facilities:</strong></p><p><!--[if !supportLists]-->&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--[endif]-->24-hour concierge</p><p><!--[if !supportLists]-->&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--[endif]-->Round-the-clock security</p><p><!--[if !supportLists]-->&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--[endif]-->Housekeeping</p><p><!--[if !supportLists]-->&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--[endif]-->Facilities for persons with disability</p>', '<ol><li>Massage</li><li>Hilot</li><li>Liggam</li><li>Web Designing</li></ol>'),
(20, 'Gatuslao Street, Bacolod City, Negros Occidental', 'Contact person/s: Ms. Grema o. Nene 09493496202 		    Ms. Mae Ann P. Boko 09073669925', '10.6407389', '122.9689565', '<p>Sweet City Captel is a budget traveler&rsquo;s haven right at the heart of Bacolod City. It&rsquo;s strategic location makes it accessible to public transportation and major business establishments in&nbsp; Bacolod City.&nbsp;Dorm-type accommodations are available in aircon and nonaircon.&nbsp;Currently, 2 and 4-bed standard rooms are being remodeled. Captel also provides discounts for government employees,&nbsp;senior citizens and PWD&#39;s.&nbsp;Sweet City Captel is a clean and cheap hostel. They&#39;re are just a few walks away from food houses, shopping malls, park and government offices</p>', '<p><strong>Policies:</strong></p><p><!--[if !supportLists]-->&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--[endif]-->No Smoking</p><p><!--[if !supportLists]-->&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--[endif]-->No pets allowed</p><p><!--[if !supportLists]-->&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--[endif]-->A day before of reservation the customer must inform the receptionist if they want to extend</p><p><!--[if !supportLists]-->&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--[endif]-->Senior citizen, Person with Disabilities (PWD) and government employees must present &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;identification card (ID) enable to avail discount.</p><p><!--[if !supportLists]-->&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--[endif]-->Each room is limited to the number of guest registered in the room at the time of check-in</p><p><!--[if !supportLists]-->&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--[endif]-->If housekeeping find any room damage in any way the hotel will charge the amount responsible &nbsp; &nbsp;for the room for all damages are clean up fees.</p><p><!--[if !supportLists]-->&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--[endif]-->No force check-in</p><p><strong>Facilities:</strong></p><p><!--[if !supportLists]-->&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--[endif]-->24-hour concierge</p><p><!--[if !supportLists]-->&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--[endif]-->Round-the-clock security</p><p><!--[if !supportLists]-->&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--[endif]-->Housekeeping</p><p><!--[if !supportLists]-->&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--[endif]-->Facilities for persons with disability</p>', '<ol><li>Massage</li><li>Hilot</li><li>Liggam</li><li>Web Designing</li></ol>'),
(21, 'Gatuslao Street, Bacolod City, Negros Occidental', 'Pick the best of the Bacolod inns! For more information, feel free to contact The Inns Bacolod by Th', '10.6407389', '122.9689565', '<p><strong>Your Stay, Your Rules</strong></p><p>Wouldn&rsquo;t it be nice to stay at a place that really understands the modern traveler? Enter&nbsp;<strong>Sweet City Captel</strong>. A fresh and hip hotel in Bacolod City that hands you the freedom to customize your stay experience through the flexible rates and optional room amenities.</p><p>&nbsp;</p><p>&nbsp;</p><p>Sweet City Captel is a budget traveler&rsquo;s haven right at the heart of Bacolod City. It&rsquo;s strategic location makes it accessible to public transportation and major business establishments in&nbsp; Bacolod City.&nbsp;Dorm-type accommodations are available in aircon and nonaircon.&nbsp;Currently, 2 and 4-bed standard rooms are being remodeled. Captel also provides discounts for government employees,&nbsp;senior citizens and PWD&#39;s.&nbsp;Sweet City Captel is a clean and cheap hostel. They&#39;re are just a few walks away from food houses, shopping malls, park and government offices</p>', '<p><strong>Policies:</strong></p><p><!--[if !supportLists]-->&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--[endif]-->No Smoking</p><p><!--[if !supportLists]-->&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--[endif]-->No pets allowed</p><p><!--[if !supportLists]-->&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--[endif]-->A day before of reservation the customer must inform the receptionist if they want to extend</p><p><!--[if !supportLists]-->&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--[endif]-->Senior citizen, Person with Disabilities (PWD) and government employees must present &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;identification card (ID) enable to avail discount.</p><p><!--[if !supportLists]-->&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--[endif]-->Each room is limited to the number of guest registered in the room at the time of check-in</p><p><!--[if !supportLists]-->&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--[endif]-->If housekeeping find any room damage in any way the hotel will charge the amount responsible &nbsp; &nbsp;for the room for all damages are clean up fees.</p><p><!--[if !supportLists]-->&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--[endif]-->No force check-in</p><p><strong>Facilities:</strong></p><p><!--[if !supportLists]-->&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--[endif]-->24-hour concierge</p><p><!--[if !supportLists]-->&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--[endif]-->Round-the-clock security</p><p><!--[if !supportLists]-->&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--[endif]-->Housekeeping</p><p><!--[if !supportLists]-->&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--[endif]-->Facilities for persons with disability</p>', '<ol><li>Massage</li><li>Hilot</li><li>Liggam</li><li>Web Designing</li></ol>'),
(22, 'Gatuslao Street, Bacolod City, Negros Occidental', 'Contact person/s: Ms. Grema o. Nene 09493496202 		    Ms. Mae Ann P. Boko 09073669925', '10.6407389', '122.9689565', '<p><strong>Your Stay, Your Rules</strong></p><p>Wouldn&rsquo;t it be nice to stay at a place that really understands the modern traveler? Enter&nbsp;<strong>Sweet City Captel</strong>. A fresh and hip hotel in Bacolod City that hands you the freedom to customize your stay experience through the flexible rates and optional room amenities.</p><p>&nbsp;</p><p>&nbsp;</p><p>Sweet City Captel is a budget traveler&rsquo;s haven right at the heart of Bacolod City. It&rsquo;s strategic location makes it accessible to public transportation and major business establishments in&nbsp; Bacolod City.&nbsp;Dorm-type accommodations are available in aircon and nonaircon.&nbsp;Currently, 2 and 4-bed standard rooms are being remodeled. Captel also provides discounts for government employees,&nbsp;senior citizens and PWD&#39;s.&nbsp;Sweet City Captel is a clean and cheap hostel. They&#39;re are just a few walks away from food houses, shopping malls, park and government offices</p>', '<p><strong>Policies:</strong></p><p><!--[if !supportLists]-->&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--[endif]-->No Smoking</p><p><!--[if !supportLists]-->&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--[endif]-->No pets allowed</p><p><!--[if !supportLists]-->&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--[endif]-->A day before of reservation the customer must inform the receptionist if they want to extend</p><p><!--[if !supportLists]-->&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--[endif]-->Senior citizen, Person with Disabilities (PWD) and government employees must present &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;identification card (ID) enable to avail discount.</p><p><!--[if !supportLists]-->&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--[endif]-->Each room is limited to the number of guest registered in the room at the time of check-in</p><p><!--[if !supportLists]-->&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--[endif]-->If housekeeping find any room damage in any way the hotel will charge the amount responsible &nbsp; &nbsp;for the room for all damages are clean up fees.</p><p><!--[if !supportLists]-->&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--[endif]-->No force check-in</p><p><strong>Facilities:</strong></p><p><!--[if !supportLists]-->&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--[endif]-->24-hour concierge</p><p><!--[if !supportLists]-->&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--[endif]-->Round-the-clock security</p><p><!--[if !supportLists]-->&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--[endif]-->Housekeeping</p><p><!--[if !supportLists]-->&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--[endif]-->Facilities for persons with disability</p>', '<ol><li>Massage</li><li>Hilot</li><li>Liggam</li><li>Web Designing</li></ol>'),
(23, 'Gatuslao Street, Bacolod City, Negros Occidental', 'Contact person/s: Ms. Grema o. Nene 09493496202 		    Ms. Mae Ann P. Boko 09073669925', '10.6407389', '122.9689565', '<p><strong>Your Stay, Your Rules</strong></p><p>Wouldn&rsquo;t it be nice to stay at a place that really understands the modern traveler? Enter&nbsp;<strong>Sweet City Captel</strong>. A fresh and hip hotel in Bacolod City that hands you the freedom to customize your stay experience through the flexible rates and optional room amenities.</p><p>&nbsp;</p><p>&nbsp;</p><p>Sweet City Captel is a budget traveler&rsquo;s haven right at the heart of Bacolod City. It&rsquo;s strategic location makes it accessible to public transportation and major business establishments in&nbsp; Bacolod City.&nbsp;Dorm-type accommodations are available in aircon and nonaircon.&nbsp;Currently, 2 and 4-bed standard rooms are being remodeled. Captel also provides discounts for government employees,&nbsp;senior citizens and PWD&#39;s.&nbsp;Sweet City Captel is a clean and cheap hostel. They&#39;re are just a few walks away from food houses, shopping malls, park and government offices</p>', '<p><strong>Policies:</strong></p><p><!--[if !supportLists]-->&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--[endif]-->No Smoking</p><p><!--[if !supportLists]-->&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--[endif]-->No pets allowed</p><p><!--[if !supportLists]-->&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--[endif]-->A day before of reservation the customer must inform the receptionist if they want to extend</p><p><!--[if !supportLists]-->&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--[endif]-->Senior citizen, Person with Disabilities (PWD) and government employees must present &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;identification card (ID) enable to avail discount.</p><p><!--[if !supportLists]-->&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--[endif]-->Each room is limited to the number of guest registered in the room at the time of check-in</p><p><!--[if !supportLists]-->&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--[endif]-->If housekeeping find any room damage in any way the hotel will charge the amount responsible &nbsp; &nbsp;for the room for all damages are clean up fees.</p><p><!--[if !supportLists]-->&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <!--[endif]-->No force check-in</p><p>&nbsp;</p>', '<p>&nbsp;</p><p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;24-hour concierge</p><p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Round-the-clock security</p><p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Housekeeping</p><p>&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Facilities for persons with disability</p>');

-- --------------------------------------------------------

--
-- Table structure for table `tblreservation`
--

CREATE TABLE `tblreservation` (
  `id` int(11) NOT NULL,
  `roomID` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `dateFrom` date NOT NULL,
  `dateTo` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblroom`
--

CREATE TABLE `tblroom` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `type` varchar(100) NOT NULL,
  `capacity` int(11) NOT NULL,
  `rate` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblroom`
--

INSERT INTO `tblroom` (`id`, `name`, `description`, `type`, `capacity`, `rate`, `status`) VALUES
(23, 'Gratitude', 'Non-Aircon and TV', '1', 2, '400', 1),
(19, 'Teamwork', 'Aircon', '2', 6, '200', 1),
(20, 'Integration', 'Good for 2 persons, with TV and aircon', '1', 2, '600', 1),
(21, 'Integrity', 'Can accommodate 4 person(s), with TV and aircon', '1', 4, '800', 1),
(22, 'Cooperation', 'Non-airon', '2', 7, '100', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblroompicture`
--

CREATE TABLE `tblroompicture` (
  `id` int(11) NOT NULL,
  `roomID` int(11) NOT NULL,
  `path` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblroompicture`
--

INSERT INTO `tblroompicture` (`id`, `roomID`, `path`) VALUES
(8, 16, 'Tulips.jpg'),
(9, 17, 'Tulips.jpg'),
(10, 18, 'Jellyfish.jpg'),
(11, 19, '12033681_1132846253411091_1062476102_n.jpg'),
(12, 19, '12041995_1132846260077757_1023709249_n.jpg'),
(13, 20, '2pax.jpg'),
(14, 21, '4pax.jpg'),
(15, 22, 'non-aircon.jpg'),
(16, 23, 'received_1021964371176576.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tblroomtype`
--

CREATE TABLE `tblroomtype` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblroomtype`
--

INSERT INTO `tblroomtype` (`id`, `name`, `type`) VALUES
(1, 'Deluxe', 'Standard'),
(2, 'Luxury', 'Dorm');

-- --------------------------------------------------------

--
-- Table structure for table `tblservice`
--

CREATE TABLE `tblservice` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `desc` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `stype` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`id`, `username`, `password`, `stype`) VALUES
(1, 'admin', 'admin', 'admin'),
(2, 'clerk', 'clerk', 'clerk');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblarrival`
--
ALTER TABLE `tblarrival`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblbilling`
--
ALTER TABLE `tblbilling`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcustomer`
--
ALTER TABLE `tblcustomer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblgallery`
--
ALTER TABLE `tblgallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblothers`
--
ALTER TABLE `tblothers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpolicy`
--
ALTER TABLE `tblpolicy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblprofile`
--
ALTER TABLE `tblprofile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblreservation`
--
ALTER TABLE `tblreservation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblroom`
--
ALTER TABLE `tblroom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblroompicture`
--
ALTER TABLE `tblroompicture`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblroomtype`
--
ALTER TABLE `tblroomtype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblservice`
--
ALTER TABLE `tblservice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblarrival`
--
ALTER TABLE `tblarrival`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tblbilling`
--
ALTER TABLE `tblbilling`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tblcustomer`
--
ALTER TABLE `tblcustomer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tblgallery`
--
ALTER TABLE `tblgallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblothers`
--
ALTER TABLE `tblothers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tblprofile`
--
ALTER TABLE `tblprofile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tblreservation`
--
ALTER TABLE `tblreservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tblroom`
--
ALTER TABLE `tblroom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tblroompicture`
--
ALTER TABLE `tblroompicture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tblroomtype`
--
ALTER TABLE `tblroomtype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblservice`
--
ALTER TABLE `tblservice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
