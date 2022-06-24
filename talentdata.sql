-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2021 at 05:01 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `talentdata`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(6) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`) VALUES
(1, 'admin', '123'),
(2, 'admin2', '123');

-- --------------------------------------------------------

--
-- Table structure for table `talent_booking`
--

CREATE TABLE `talent_booking` (
  `booking_id` int(6) NOT NULL,
  `category` varchar(100) NOT NULL,
  `length` varchar(100) NOT NULL,
  `audition_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `talent_booking`
--

INSERT INTO `talent_booking` (`booking_id`, `category`, `length`, `audition_date`) VALUES
(1, 'Comedy', '15 minutes', '2021-07-22'),
(3, 'Musical Show', '10 minutes', '2021-07-01');

-- --------------------------------------------------------

--
-- Table structure for table `talent_candidate`
--

CREATE TABLE `talent_candidate` (
  `candidate_id` int(6) NOT NULL,
  `f_name` varchar(100) NOT NULL,
  `l_name` varchar(100) NOT NULL,
  `mobilehp` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `talent_candidate`
--

INSERT INTO `talent_candidate` (`candidate_id`, `f_name`, `l_name`, `mobilehp`, `username`, `password`) VALUES
(1, 'Muhd Hisyamuddin', 'Aminuddin', '0137603196', 'icam', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(3, 'asdasdad', 'Aminasdasdasdasduddin', '019999999', 'gmisyam', '40bd001563085fc35165329ea1ff5c5ecbdbbeef');

-- --------------------------------------------------------

--
-- Table structure for table `talent_complete_info`
--

CREATE TABLE `talent_complete_info` (
  `talent_complete_id` int(20) NOT NULL,
  `candi_id` int(20) NOT NULL,
  `book_id` int(20) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `talent_complete_info`
--

INSERT INTO `talent_complete_info` (`talent_complete_id`, `candi_id`, `book_id`, `address`) VALUES
(1, 1, 1, 'NO 30, LORONG BAHAGIA,'),
(3, 3, 3, 'NO 30, LORONG BAHAGIA,');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `talent_booking`
--
ALTER TABLE `talent_booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `talent_candidate`
--
ALTER TABLE `talent_candidate`
  ADD PRIMARY KEY (`candidate_id`);

--
-- Indexes for table `talent_complete_info`
--
ALTER TABLE `talent_complete_info`
  ADD PRIMARY KEY (`talent_complete_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `talent_booking`
--
ALTER TABLE `talent_booking`
  MODIFY `booking_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `talent_candidate`
--
ALTER TABLE `talent_candidate`
  MODIFY `candidate_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `talent_complete_info`
--
ALTER TABLE `talent_complete_info`
  MODIFY `talent_complete_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
