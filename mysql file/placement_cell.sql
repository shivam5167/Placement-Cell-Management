-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2023 at 07:56 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `placement_cell`
--

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `opportunity_id` int(20) NOT NULL,
  `stu_id` int(20) NOT NULL,
  `name` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `course` varchar(55) NOT NULL,
  `applied_post` varchar(55) NOT NULL,
  `skills` varchar(300) NOT NULL,
  `description` varchar(300) NOT NULL,
  `resume` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` int(20) NOT NULL,
  `company_name` varchar(55) NOT NULL,
  `logo_image` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `company_name`, `logo_image`) VALUES
(1234, 'Google', 'google.png'),
(1243, 'Samsung', 'samsung.png'),
(2341, 'Microsoft', 'microsoft.png');

-- --------------------------------------------------------

--
-- Table structure for table `opportunity`
--

CREATE TABLE `opportunity` (
  `opportunity_id` int(20) NOT NULL,
  `company_id` int(20) NOT NULL,
  `post` varchar(55) NOT NULL,
  `type` varchar(55) NOT NULL,
  `company` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `opportunity`
--

INSERT INTO `opportunity` (`opportunity_id`, `company_id`, `post`, `type`, `company`) VALUES
(1001, 1234, 'Data Analyst', 'Job', 'Google');

-- --------------------------------------------------------

--
-- Table structure for table `placement`
--

CREATE TABLE `placement` (
  `student_id` int(25) NOT NULL,
  `name` varchar(25) NOT NULL,
  `course` varchar(50) NOT NULL,
  `company_id` int(25) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `post` varchar(55) NOT NULL,
  `year` int(55) NOT NULL,
  `semester` int(20) NOT NULL,
  `placed_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `placement`
--

INSERT INTO `placement` (`student_id`, `name`, `course`, `company_id`, `company_name`, `post`, `year`, `semester`, `placed_date`) VALUES
(5, 'James', 'BSC CS', 1234, 'Google', 'Software Engineer', 2023, 4, '2023-10-11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cgpa` decimal(3,2) NOT NULL,
  `department` varchar(255) NOT NULL,
  `batch_year` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `cgpa`, `department`, `batch_year`, `username`, `password`) VALUES
(1, 'Shivam Yadav ', 'sy9005346@gmail.com', '9.99', 'Computer Science', 2021, 'abcd', '1234'),
(10, 'vandana', 'vandanatanwar408@gmail.com', '8.00', 'Computer Science', 2021, 'vandana', '12345678');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD KEY `stu_id` (`stu_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `placement`
--
ALTER TABLE `placement`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `application`
--
--
-- Constraints for table `opportunity`

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
