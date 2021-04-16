-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2019 at 12:09 PM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exercise2`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `cust_recno` int(200) NOT NULL,
  `cust_num` int(200) NOT NULL,
  `cust_fname` varchar(200) NOT NULL,
  `cust_mname` varchar(200) NOT NULL,
  `cust_lname` varchar(200) NOT NULL,
  `cust_housenum` varchar(200) NOT NULL,
  `cust_street` varchar(200) NOT NULL,
  `cust_brgy` varchar(200) NOT NULL,
  `cust_city` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`cust_recno`, `cust_num`, `cust_fname`, `cust_mname`, `cust_lname`, `cust_housenum`, `cust_street`, `cust_brgy`, `cust_city`) VALUES
(34, 0, 'Sese', '', 'Diestro', '', '', '', ''),
(35, 0, 'Lawrenz', '', 'Diestro', '', '', '', ''),
(36, 0, 'Juan', '', 'Tamad', '', '', '', ''),
(38, 0, 'Maria', '', 'Juana', '', '', '', ''),
(39, 0, 'Maria', '', 'Reyes', '', '', '', ''),
(40, 0, 'Try', '', 'Lang', '', '', '', ''),
(41, 0, '', '', '', '', '', '', ''),
(42, 0, '', '', '', '', '', '', ''),
(43, 0, '', '', '', '', '', '', ''),
(44, 0, '', '', '', '', '', '', ''),
(45, 0, '', '', '', '', '', '', ''),
(46, 0, '', '', '', '', '', '', ''),
(47, 0, '', '', '', '', '', '', ''),
(48, 0, '', '', '', '', '', '', ''),
(49, 0, '', '', '', '', '', '', ''),
(50, 0, '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_invoice`
--

CREATE TABLE `tbl_invoice` (
  `record_id` int(11) NOT NULL,
  `inv_num` varchar(10) NOT NULL,
  `inv_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `inv_custno` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_invoice`
--

INSERT INTO `tbl_invoice` (`record_id`, `inv_num`, `inv_date`, `inv_custno`) VALUES
(1001, '2002', '0000-00-00 00:00:00', '3003'),
(1002, '2002', '2019-11-19 02:54:36', '3003');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `usr_username` varchar(255) NOT NULL,
  `usr_password` varchar(255) NOT NULL,
  `usr_firstname` varchar(255) NOT NULL,
  `usr_lastname` varchar(255) NOT NULL,
  `usr_role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`usr_username`, `usr_password`, `usr_firstname`, `usr_lastname`, `usr_role`) VALUES
('Sese', '$2y$10$OTQwMTY3OTQ5ZDExNWE4ZeRrdSYFbdr95AF.sVSs2aQsFU.7I9Bfa', 'Lawrenz', 'Diestro', '1'),
('Charlie', '$2y$10$NzkzNDgzODBjMWI1NGRlO.fMYXR93P6zTHQ2i1pM/xofpporfU9aG', 'Charles', 'Umbina', '1'),
('eqweqe', '$2y$10$YWRkOGU1ZWY3MTQwYzg1Nu2yFKOqnCDyfsZNcE3ORiUi66cEcZcwe', 'qwewqe', 'ewqeqe', '1'),
('wew', '$2y$10$ZjFhY2MzYjZkMmIxMDlmM.1WCrnM7i7oj.4bvaEypsWRP950s1bY.', 'eqwe', 'ewqeq', '1'),
('Sese', '$2y$10$MDZkYzAwZGMyYjAyODJhZeGI3D9JkPTo5wny/C/HDaloU7SYh6chC', 'Lawrenz', 'Diestro', '1'),
('name', '$2y$10$NmIzODRkMzVhNjI1NDFlMOlR.mRvKbubBtu/YMqR4a4tScBqn8yQa', 'Char', 'name', '1'),
('wewe', '$2y$10$YmVkNDJlMDE2NWYyNTBkMeWe/v2EFw7RQ3ELqS91W9oiKBQF2XFW.', 'eqwe', 'eqweq', '1'),
('wee', '$2y$10$OGZiYjc2ZjAzZjFkZGQzN.ZUrEmM/PRbiPDE7T5RUPZZ8TEQeU/22', 'wewq', 'ewqewq', '1'),
('sa', '$2y$10$ODY4ZDBmNDAyYWI4ZjY2M.kBIdUbhVCxnHT5jQ5AT7Qxu4iLKCUB2', 'sa', 'sa', '1'),
('aw', '$2y$10$ZmVkYjI5ZmYwYjZiMWRiM.T.75YjLVn3TMhG4uFHt46cUJGIpvl6S', 'aw', 'aw', '1'),
('we', '$2y$10$YjdiYjEyMTAwMzM5OTNmZ.F/2kGxRMqsQs3HBtRdr.1vpchMjbVve', 'we', 'we', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`cust_recno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `cust_recno` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
