-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2020 at 12:37 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `darajanpub`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_category` varchar(10) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_category`, `date_added`) VALUES
(2, 'castle lager', 2000, 'pub', '2020-09-17 00:00:00'),
(3, 'caste milk', 0, 'pub', '2020-09-17 09:13:06'),
(4, 'castle lite', 1500, 'pub', '2020-09-17 09:45:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `DOB` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `number` int(15) NOT NULL,
  `address` varchar(50) NOT NULL,
  `role` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `DOB`, `gender`, `number`, `address`, `role`, `password`) VALUES
(2, 'ABAMA BLACKPANTHER BIGMOUTH', 'Admin', 'abamaabrahma@gmail.com', '2020-09-04', 'Male', 762387997, 'asasa,Dodoma,UJAS', 'admin', '3482a7f8ec5b6e9d19fe48be6459c97a'),
(3, 'ABAMA BLACKPANTHER BIGMOUTH', 'Admin', 'abamaabrahma@gmail.com', '2020-09-04', 'Male', 762387997, 'asasa,Dodoma,UJAS', 'admin', '3482a7f8ec5b6e9d19fe48be6459c97a'),
(4, 'Abama Abrahama', 'Admin', 'abdulmahamudu997@gmail.com', '1996-12-26', 'Male', 762387997, 'Mwanza,Ilemela,Nyasaka', 'admin', '3482a7f8ec5b6e9d19fe48be6459c97a'),
(5, 'Sophia Kesi Mdeme', 'Sophia', 'sophia@gmail.com', '1995-12-16', 'Female', 754917983, 'Campala,Bujumbura,Kisenya', 'saler', '44f0a313cc1d4796964a7f51f8b7c5a3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
