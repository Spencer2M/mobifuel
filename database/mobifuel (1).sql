-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2020 at 07:27 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mobifuel`
--

-- --------------------------------------------------------

--
-- Table structure for table `fueltypes`
--

CREATE TABLE `fueltypes` (
  `fueltype` varchar(100) NOT NULL,
  `price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fueltypes`
--

INSERT INTO `fueltypes` (`fueltype`, `price`) VALUES
('Petrol', 4500),
('Diesel', 4000);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(15) NOT NULL,
  `fueltype` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `numberplate` varchar(100) NOT NULL,
  `cartype` varchar(100) NOT NULL,
  `carcolor` varchar(30) NOT NULL,
  `litres` int(10) NOT NULL,
  `latitude` varchar(30) NOT NULL,
  `longitude` varchar(30) NOT NULL,
  `ordercode` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `totalcost` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `fueltype`, `phone`, `numberplate`, `cartype`, `carcolor`, `litres`, `latitude`, `longitude`, `ordercode`, `status`, `totalcost`) VALUES
(11, 'diesel', '34343434', 'gggfg', 'mazda lagoon', 'white', 7, '0.3276818', '32.6129364', '890122', 'Delivered', 0),
(12, 'Diesel', '34343434', 'gggfg', 'sienta', 'white', 10, '0.3283904', '32.6123893', '351379', 'New', 35000),
(13, 'Diesel', '34343434', 'gggfg', 'mercedes benz gl', 'blue', 19, '0.3291636', '32.6091157', '710994', 'New', 66500),
(14, 'Diesel', '34343434', 'gggfg', 'mercedes benz gl', 'blue', 19, '0.3291636', '32.6091157', '303333', 'New', 66500),
(15, 'Petrol', '0775295324', 'ugg545r', 'mazda lagoon', 'white', 18, '0.3291636', '32.6091157', '333571', 'New', 72000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `userrole` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `userrole`) VALUES
(1, 'nasser@gmail.com', 'nasser', 'admin'),
(2, 'user@gmail.com', 'user', 'user'),
(7, '123@hmao.com', 'password', 'admin'),
(8, 'admin@gg.com', '12345', 'admin'),
(9, 'test@gmail.com', 'test', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
