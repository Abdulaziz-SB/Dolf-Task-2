-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2021 at 01:25 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cliparo`
--

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `register` int(11) NOT NULL DEFAULT '0',
  `available` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `about` varchar(511) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `user_id`, `name`, `type_id`, `price`, `register`, `available`, `date`, `about`, `img`) VALUES
(1, 7, 'Football', 1, 22, 10, 1, '2021-08-19 20:00:00', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', '/Dolf-Task-2/public/res/img/Football/ba.jpg'),
(2, 7, 'Swimming', 5, 50, 0, 23, '2021-08-30 16:01:00', 'This is a swimming session', '/Dolf-Task-2/public/res/img/Swimming/6125f9204568f4.29313940.jpg'),
(3, 7, 'Baseball', 1, 44, 0, 22, '2021-08-27 15:02:00', 'Baseball training', '/Dolf-Task-2/public/res/img/Baseball/6125f953c329f7.70222648.jpg'),
(4, 7, 'Volleyball', 4, 33, 0, 22, '2021-08-27 03:09:00', 'Volleyball event', '/Dolf-Task-2/public/res/img/Volleyball/6125faca68dbc8.61851639.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `dates` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `event_id`, `user_id`, `price`, `payment_method`, `dates`) VALUES
(2, 2, 6, 50, 'paypal', '2021-08-25 10:14:21'),
(3, 3, 6, 44, 'credit', '2021-08-25 11:51:45');

-- --------------------------------------------------------

--
-- Table structure for table `sport`
--

CREATE TABLE `sport` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sport`
--

INSERT INTO `sport` (`id`, `name`) VALUES
(1, 'Football'),
(2, 'Basketball'),
(3, 'Baseball'),
(4, 'Volleyball'),
(5, 'Swimming'),
(6, 'Tennis');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `type` varchar(63) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `type`, `password`) VALUES
(6, 'Aziiz', 'Aziiz@gmail.com', '0', '$2y$10$TjQcaEEzN7hgw5lLH5dQ3.V07i9JLQIpU9wQ2.5frRJWRe3Ae17ly'),
(7, 'Azoz', 'Azoz@gmail.com', '1', '$2y$10$hZHNkzDUlLCOI0MynuG6kuQLeZKhPlJIhdy0fh3AT1vu7ZTDT3X9G'),
(8, 'wily', 'wily@gmail.com', '1', '$2y$10$okgKqybFGKPpvtW2/IzqfOsHYJoDSbMgerhNeOkwUqV5r7aTvy5.u'),
(9, 'khaled', 'kh@gmail.com', '0', '$2y$10$KlQtZXAHzKMqTapvdshyLuufQQ2zqH9leWpU1LcnoDVyb0F8NQQW6'),
(10, 'ahmed', 'ahmed@gmail.com', '1', '$2y$10$Lpa0L4SoMTpZeLAO2js/zexpyZsVaDFV8iiuFJXT3Eo/7l1grADbq');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `type_id` (`type_id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_id` (`event_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `sport`
--
ALTER TABLE `sport`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sport`
--
ALTER TABLE `sport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `event_ibfk_2` FOREIGN KEY (`type_id`) REFERENCES `sport` (`id`);

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
