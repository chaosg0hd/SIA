-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2021 at 05:17 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cocolime_db-1`
--

-- --------------------------------------------------------

--
-- Table structure for table `invoice_tb`
--

CREATE TABLE `invoice_tb` (
  `invoice_no` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `invoice_date` datetime NOT NULL,
  `invoice_amount` double NOT NULL,
  `invoice_deduction` double NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice_tb`
--

INSERT INTO `invoice_tb` (`invoice_no`, `invoice_id`, `order_id`, `invoice_date`, `invoice_amount`, `invoice_deduction`, `total`) VALUES
(1, 123234, 1, '2021-04-22 04:47:20', 10000, 1000, 9000),
(2, 124567, 2, '2021-04-22 04:47:20', 2000, 200, 1800);

-- --------------------------------------------------------

--
-- Table structure for table `orders_tb`
--

CREATE TABLE `orders_tb` (
  `order_id` int(11) NOT NULL,
  `table_no` int(11) NOT NULL,
  `order_dt` datetime NOT NULL,
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders_tb`
--

INSERT INTO `orders_tb` (`order_id`, `table_no`, `order_dt`, `order_status`) VALUES
(1, 6, '2021-04-21 23:31:09', 'Ongoing'),
(2, 7, '2021-04-21 23:31:09', 'Served'),
(3, 5, '2021-04-21 23:31:09', 'Cancelled');

-- --------------------------------------------------------

--
-- Table structure for table `products_tb`
--

CREATE TABLE `products_tb` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_status` varchar(255) NOT NULL,
  `product_price` double NOT NULL,
  `product_content` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products_tb`
--

INSERT INTO `products_tb` (`product_id`, `product_name`, `product_status`, `product_price`, `product_content`) VALUES
(1, 'Fried Rice', 'Available', 100, '{Rice}'),
(2, 'Bagoong Rice', 'Available', 120, '{Rice Portion}{Bagoong Portion}'),
(3, 'Pork Sinigang', 'Available', 200, '{Sinigang Stock}{Pork Portion}{Veggie Package}'),
(4, 'Goat\'s Tongue Soup', 'Available', 700, '{Goats Tongue}{Veggie Package}'),
(5, 'Pinoy Exotic Bundle', 'Available', 1500, '{Bagoong Rice}{Goat\'s Tongue}{Pork Sinigang}'),
(6, 'Coke', 'Available', 100, '{Coke}'),
(7, 'Bulalo', 'Available', 700, '{Bulalo Stock}{Beef Portion}');

-- --------------------------------------------------------

--
-- Table structure for table `reservations_tb`
--

CREATE TABLE `reservations_tb` (
  `reservation_no` int(11) NOT NULL,
  `table_no` int(11) NOT NULL,
  `reservation_issuer` varchar(255) NOT NULL,
  `reservation_dt_issued` datetime NOT NULL,
  `reservation_dt` datetime NOT NULL,
  `reservation_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservations_tb`
--

INSERT INTO `reservations_tb` (`reservation_no`, `table_no`, `reservation_issuer`, `reservation_dt_issued`, `reservation_dt`, `reservation_status`) VALUES
(1, 6, 'Kirk, Adal. Jr', '2021-04-21 23:06:42', '2021-04-30 05:07:10', 'Ongoing'),
(2, 7, 'Kirk, Adal. Jr', '2021-04-21 23:06:42', '2021-04-26 05:07:10', 'Cancelled'),
(3, 3, 'S̵̛͔͖̪̤̏͗̾̆̋̋͆̽̎̎́̒̊͜͝ļ̵̝̦̙̟̲̤̣̑̀͊̆̏͛͌̍̕̚ḁ̴̧̧̱̗̺̳͔̱̮̾̂͂̆͒͌̆̎̊͌̕͝ͅḁ̷͓̱̰̜̬̫̞̘̻̈̈́̃̄̇͌̽́́́͐̎̎͝͝n̶͔̰̻̈̇̾̊͐e̶̢̨̬̱̲̦͚̣̪̗̯̺̙͋́̄̈̀̔́̊͜è̶̡̡̨̛͕̺̰̟̘̘̘͔̼̿̀͂͛̃͊͜͠s̴̫̻̫͌͗͑͂̅̄̈͂̏̇͂̃̚͝h̷̢̛̹͕̘͇̣̅͊́̓͝', '2021-04-21 23:06:42', '2021-04-25 05:07:10', 'Ongoing'),
(4, 8, 'Mark, Eldersomething', '2021-04-21 23:06:42', '2021-04-25 05:07:10', 'Ongoing');

-- --------------------------------------------------------

--
-- Table structure for table `tables_tb`
--

CREATE TABLE `tables_tb` (
  `table_no` int(11) NOT NULL,
  `table_status` varchar(255) NOT NULL,
  `table_no_of_seats` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tables_tb`
--

INSERT INTO `tables_tb` (`table_no`, `table_status`, `table_no_of_seats`) VALUES
(1, 'Occupied', 4),
(2, 'Occupied', 4),
(3, 'Occupied', 6),
(4, 'Reserved', 6),
(5, 'Reserved', 4),
(6, 'Available', 4),
(7, 'Occupied', 8),
(8, 'Reserved', 8),
(9, 'Available', 4),
(10, 'Reserved', 2),
(11, 'Occupied', 2),
(12, 'Reserved', 4),
(13, 'Reserved', 4),
(14, 'Occupied', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_privilege` int(2) NOT NULL,
  `user_date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password`, `user_image`, `user_privilege`, `user_date_created`) VALUES
(0, 'Administrator', '0000000', 'admin.png', 0, '2021-04-17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invoice_tb`
--
ALTER TABLE `invoice_tb`
  ADD PRIMARY KEY (`invoice_no`);

--
-- Indexes for table `orders_tb`
--
ALTER TABLE `orders_tb`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products_tb`
--
ALTER TABLE `products_tb`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `reservations_tb`
--
ALTER TABLE `reservations_tb`
  ADD PRIMARY KEY (`reservation_no`);

--
-- Indexes for table `tables_tb`
--
ALTER TABLE `tables_tb`
  ADD PRIMARY KEY (`table_no`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invoice_tb`
--
ALTER TABLE `invoice_tb`
  MODIFY `invoice_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders_tb`
--
ALTER TABLE `orders_tb`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products_tb`
--
ALTER TABLE `products_tb`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `reservations_tb`
--
ALTER TABLE `reservations_tb`
  MODIFY `reservation_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tables_tb`
--
ALTER TABLE `tables_tb`
  MODIFY `table_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
