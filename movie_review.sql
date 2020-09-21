-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2020 at 08:31 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `akaar-it`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicant`
--

CREATE TABLE `applicant` (
  `applicant_id` int(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `profile_pic` varchar(50) DEFAULT NULL,
  `resume` varchar(50) DEFAULT NULL,
  `skills` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applicant`
--

INSERT INTO `applicant` (`applicant_id`, `first_name`, `last_name`, `email`, `password`, `profile_pic`, `resume`, `skills`) VALUES
(2, 'Sharif', 'Ahmed ', 's@gmail.com', '1', 'user.png', NULL, NULL),
(4, 'Kazi Hasan Sharif', 'Ahmed', 'sharif7761@gmail.com', '1', 'user.png', 'Sharif Ahmed__AIUB_CSE.pdf', 'c++,java');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` int(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `business_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `first_name`, `last_name`, `business_name`, `email`, `password`) VALUES
(1, 'GP', 'Tel', 'GP', 'gp@gmail.com', '1'),
(2, 'Robi', 'Axieta', 'Robi', 'robi@gmail.com', '1'),
(3, 'Kazi Hasan Sharif', 'sad', 'Robi', 'sharif7761@gmail.com', '1'),
(4, 'Kazi Hasan Sharif', 'sad', 'Robi', 'sharif77621@gmail.com', '1'),
(5, 'B', 'Link', 'bl', 'b@gmail.com', '1');

-- --------------------------------------------------------

--
-- Table structure for table `food_order`
--

CREATE TABLE `food_order` (
  `id` int(50) NOT NULL,
  `food_name` varchar(50) NOT NULL,
  `unit_price` varchar(50) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food_order`
--

INSERT INTO `food_order` (`id`, `food_name`, `unit_price`, `quantity`, `date`, `status`) VALUES
(1, 'a', '1', '1', '2020-09-13', '0'),
(2, 'b', '12', '10', '2020-09-13', '1'),
(3, 'c', '10', '11', '2020-09-13', '1');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `job_id` int(50) NOT NULL,
  `company_id` int(50) NOT NULL,
  `job_title` varchar(50) NOT NULL,
  `job_description` text NOT NULL,
  `salary` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `company_id`, `job_title`, `job_description`, `salary`, `location`, `country`) VALUES
(1, 1, 'se', 'laravel', '20000', 'dhaka', 'bangladesh'),
(2, 1, 'sq', 'php', '20000', 'rampura', 'bangladesh');

-- --------------------------------------------------------

--
-- Table structure for table `job_application`
--

CREATE TABLE `job_application` (
  `job_application_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_application`
--

INSERT INTO `job_application` (`job_application_id`, `job_id`, `applicant_id`) VALUES
(1, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `id` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `genre` varchar(50) NOT NULL,
  `rating` varchar(50) NOT NULL,
  `release_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`id`, `name`, `genre`, `rating`, `release_date`) VALUES
(1, 'Home Alone', 'Comedy', 'PG', '01-04-1996'),
(2, 'The Godfather', 'Crime', 'R', '01-04-1972'),
(3, 'Avengers: Endgame', 'Action', 'PG', '01-04-2019');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `movie_id` int(50) NOT NULL,
  `rating` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `user_id`, `movie_id`, `rating`) VALUES
(1, 1, 1, '5.0'),
(2, 1, 2, '4.0'),
(3, 1, 3, '3.3'),
(4, 2, 1, '5.0'),
(5, 2, 3, '4.5'),
(6, 3, 1, '1.6'),
(7, 3, 2, '0.0'),
(8, 3, 3, '3.4'),
(9, 4, 2, '4.5');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `phone`, `password`, `email`) VALUES
(1, 'John Doe', '11111111111', 'pass1', 'john_doe@gmail.com'),
(2, 'Jane Doe', '22222222222', 'pass2', 'jane_doe@gmail.com'),
(3, 'Mark Doe', '3333333333', 'pass3', 'mark_doe@gmail.com'),
(4, 'Macy Doe', '4444444444', 'pass4', 'macy_doe@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicant`
--
ALTER TABLE `applicant`
  ADD PRIMARY KEY (`applicant_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `food_order`
--
ALTER TABLE `food_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `job_application`
--
ALTER TABLE `job_application`
  ADD PRIMARY KEY (`job_application_id`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
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
-- AUTO_INCREMENT for table `applicant`
--
ALTER TABLE `applicant`
  MODIFY `applicant_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `food_order`
--
ALTER TABLE `food_order`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `job_application`
--
ALTER TABLE `job_application`
  MODIFY `job_application_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
