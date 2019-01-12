-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2018 at 06:19 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nicemain`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `landmark` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `phone2` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `name`, `email`, `password`) VALUES
(1, 'nice', 'emma', 'nice@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `colour` varchar(20) NOT NULL,
  `size` int(3) NOT NULL,
  `currency_sign` varchar(5) NOT NULL,
  `price` int(100) NOT NULL,
  `count` varchar(1000) NOT NULL,
  `total_price` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shoppics`
--

CREATE TABLE `shoppics` (
  `id` int(11) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `currency_sign` varchar(5) NOT NULL,
  `price` varchar(255) NOT NULL,
  `items_left` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shoppics`
--

INSERT INTO `shoppics` (`id`, `pic`, `name`, `details`, `gender`, `currency_sign`, `price`, `items_left`, `description`) VALUES
(1, 'shop/sandals_pics/ILO3dvg7p0jhmUX/sand1.jpg', 'Yellow Sandal', 'Yellow Sandals for Men', 'male', 'â‚¦', '2500', '10', 'ghRWHRVQRYNAY5EYHERMAYAWYNRWYMTUS'),
(2, 'shop/sandals_pics/ILO3dvg7p0jhmUX/sand1.jpg', 'Yellow Sandal', 'Yellow Sandals for Men', 'male', 'â‚¦', '2500', '10', 'ghRWHRVQRYNAY5EYHERMAYAWYNRWYMTUS'),
(3, 'shop/sandals_pics/ILO3dvg7p0jhmUX/sand1.jpg', 'Yellow Sandal', 'Yellow Sandals for Men', 'male', 'â‚¦', '2500', '10', 'ghRWHRVQRYNAY5EYHERMAYAWYNRWYMTUS'),
(4, 'shop/sandals_pics/ILO3dvg7p0jhmUX/sand1.jpg', 'Yellow Sandal', 'Yellow Sandals for Men', 'male', 'â‚¦', '2500', '10', 'ghRWHRVQRYNAY5EYHERMAYAWYNRWYMTUS'),
(5, 'shop/sandals_pics/ILO3dvg7p0jhmUX/sand1.jpg', 'Yellow Sandal', 'Yellow Sandals for Men', 'male', 'â‚¦', '2500', '10', 'ghRWHRVQRYNAY5EYHERMAYAWYNRWYMTUS'),
(6, 'shop/sandals_pics/ILO3dvg7p0jhmUX/sand1.jpg', 'Yellow Sandal', 'Yellow Sandals for Men', 'male', 'â‚¦', '2500', '10', 'ghRWHRVQRYNAY5EYHERMAYAWYNRWYMTUS'),
(7, 'shop/sandals_pics/ILO3dvg7p0jhmUX/sand1.jpg', 'Yellow Sandal', 'Yellow Sandals for Men', 'male', 'â‚¦', '2500', '10', 'ghRWHRVQRYNAY5EYHERMAYAWYNRWYMTUS'),
(8, 'shop/sandals_pics/ILO3dvg7p0jhmUX/sand1.jpg', 'Yellow Sandal', 'Yellow Sandals for Men', 'male', 'â‚¦', '2500', '10', 'ghRWHRVQRYNAY5EYHERMAYAWYNRWYMTUS');

-- --------------------------------------------------------

--
-- Table structure for table `userprofile`
--

CREATE TABLE `userprofile` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `dial_code` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `bday` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userprofile`
--

INSERT INTO `userprofile` (`id`, `uid`, `first_name`, `last_name`, `email`, `gender`, `dial_code`, `phone`, `bday`) VALUES
(1, 1, 'Moses', 'Bien', 'biennwinate@gmail.com', 'male', '+234', '8124079283', '1999-01-29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `title` varchar(6) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dial_code` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `sign_up_date` date NOT NULL,
  `activated` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `title`, `first_name`, `last_name`, `gender`, `email`, `dial_code`, `phone`, `password`, `sign_up_date`, `activated`) VALUES
(1, 'Mr.', 'Nwinate', 'Bien', 'Male', 'biennwinate@gmail.com', '+234', '8124079283', '5f4dcc3b5aa765d61d8327deb882cf99', '2018-05-04', '0'),
(2, 'Mr.', 'Moses', 'Bien', 'Male', 'bienmoses@gmail.com', '+234', '8124079283', '5f4dcc3b5aa765d61d8327deb882cf99', '2018-05-04', '0');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL,
  `currency_sign` varchar(5) NOT NULL,
  `price` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `shoppics`
--
ALTER TABLE `shoppics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userprofile`
--
ALTER TABLE `userprofile`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uid` (`uid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shoppics`
--
ALTER TABLE `shoppics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `userprofile`
--
ALTER TABLE `userprofile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `shoppics` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
