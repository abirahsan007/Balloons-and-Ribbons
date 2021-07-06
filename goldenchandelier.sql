-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2021 at 06:52 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `goldenchandelier`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `contact` char(10) DEFAULT NULL,
  `ad_username` varchar(10) NOT NULL,
  `ad_password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `name`, `address`, `email`, `contact`, `ad_username`, `ad_password`) VALUES
(101, 'shafat', 'gulshan', 'shafat@gmail.com', '011667788', 'shafat', 'abcd');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `contact` char(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `cus_username` varchar(10) DEFAULT NULL,
  `cus_password` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `name`, `address`, `contact`, `email`, `cus_username`, `cus_password`) VALUES
(712, 'nuha', '42-alamin road', '02962075', 'nuha.ruaida@gmail.com', 'nuha', '1111'),
(713, 'redoy', 'rayerbag', '01685457076', 'redoy@gmail.com', 'redoy', '14279'),
(714, 'anika', '41 alamin road', '01908888888', 'anika@gmail.com', 'anika', '9090'),
(716, 'amma', '42-alamin road', '02962075', 'amma@gmail.com', 'amma', '0000'),
(722, 'amma', 'uttora', '01199499557', 'amma2@gmail.com', 'amma2', '9999'),
(723, 'Shuhala', '42-alamin road', '01715008790', 'azeen433@gmail.com', 'Shuhala', 'SHuhala143');

-- --------------------------------------------------------

--
-- Table structure for table `cus_bank`
--

CREATE TABLE `cus_bank` (
  `bank_id` int(11) NOT NULL,
  `cus_name` text NOT NULL,
  `cus_id` int(11) NOT NULL,
  `balance` int(11) NOT NULL,
  `card_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cus_bank`
--

INSERT INTO `cus_bank` (`bank_id`, `cus_name`, `cus_id`, `balance`, `card_no`) VALUES
(1, 'nuha', 712, 991759000, 444),
(5, 'redoy', 713, 10000000, 222),
(7, 'anika', 714, 10000000, 123),
(8, 'amma', 716, 9850000, 898),
(9, 'amma2', 722, 200000000, 777);

-- --------------------------------------------------------

--
-- Table structure for table `payment_history`
--

CREATE TABLE `payment_history` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `venue_id` int(11) DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_history`
--

INSERT INTO `payment_history` (`id`, `customer_id`, `venue_id`, `vendor_id`, `amount`) VALUES
(13, 712, 904, NULL, 10000),
(14, 716, 902, NULL, 20000),
(15, 716, 902, NULL, 30000),
(16, 716, 904, NULL, 20000),
(17, 716, 904, NULL, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `vendor_id` int(10) NOT NULL,
  `type` text NOT NULL,
  `brand_name` text NOT NULL,
  `experience` text DEFAULT NULL,
  `specialty` text DEFAULT NULL,
  `hire_cost` int(100) NOT NULL,
  `location` text NOT NULL,
  `availability` text NOT NULL,
  `contact` text NOT NULL,
  `email` text NOT NULL,
  `vendor_schedule` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`vendor_id`, `type`, `brand_name`, `experience`, `specialty`, `hire_cost`, `location`, `availability`, `contact`, `email`, `vendor_schedule`) VALUES
(601, 'photographer', 'wedding dreams', '6 years', 'Excellent video maker and editor.', 45000, 'Uttara', 'After 28.03.20', '01723456782', 'weddingdreamsbd@gmail.com', 'Day and Night'),
(602, 'decorator ', 'biye bazar', '5 years', 'Traditional decoration ', 100000, 'Mirpur', 'available', '019825433', 'biye.bazar@gmail.com', 'afternoon '),
(606, 'decorator', 'The Enchanted ', '10 years', NULL, 100000, 'Gulshan', 'after 9am', '01971663800', 'info@enchantedbd.com', 'night'),
(608, 'catering', 'Alpha Catering', '3 years', NULL, 8000, 'Dhanmondi', 'before 10pm', '0175566445', 'eatwell@alphacateringservices.', 'all day'),
(610, 'makeup artist', 'Style Lounge', '5 years', NULL, 30000, 'Dhanmondi', 'before 8.30pm', '01758183325', 'style@gmail.com', 'day'),
(612, 'catering', 'Laila Catering ', '6 years', 'serves amazing Chinese food ', 20000, 'Uttara', 'after 8am', '01675002891', 'laila_cater@gmail.com', 'afternoon');

-- --------------------------------------------------------

--
-- Table structure for table `vendors_booking`
--

CREATE TABLE `vendors_booking` (
  `venbook_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `cus_name` text NOT NULL,
  `vendor_name` text NOT NULL,
  `vendor_type` text NOT NULL,
  `vendor_loc` text NOT NULL,
  `hire_cost` int(11) NOT NULL,
  `vd_email` text NOT NULL,
  `vendor_id` int(10) NOT NULL,
  `booking_date` date NOT NULL,
  `event_date` date NOT NULL,
  `event_type` varchar(255) NOT NULL,
  `event_loc` varchar(50) NOT NULL,
  `duration` int(30) NOT NULL,
  `total_payment` int(20) DEFAULT NULL,
  `vdb_schedule` varchar(200) DEFAULT NULL,
  `Payment_status` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendors_booking`
--

INSERT INTO `vendors_booking` (`venbook_id`, `customer_id`, `cus_name`, `vendor_name`, `vendor_type`, `vendor_loc`, `hire_cost`, `vd_email`, `vendor_id`, `booking_date`, `event_date`, `event_type`, `event_loc`, `duration`, `total_payment`, `vdb_schedule`, `Payment_status`) VALUES
(406, 712, 'nuha', 'Style Lounge', 'makeup artist', 'Dhanmondi', 30000, 'style@gmail.com', 610, '2021-01-12', '2021-01-12', 'Birthday', 'gulshan', 3, 30000, 'evening', 'not paid');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_bank`
--

CREATE TABLE `vendor_bank` (
  `vdb_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `vendor_request`
--

CREATE TABLE `vendor_request` (
  `request_id` int(10) NOT NULL,
  `customer_id` int(10) DEFAULT NULL,
  `vendor_id` int(10) DEFAULT NULL,
  `booking_date` date NOT NULL,
  `event_date` date NOT NULL,
  `event_type` varchar(255) NOT NULL,
  `Event_Location` varchar(100) NOT NULL,
  `duration` int(30) NOT NULL,
  `event_schedule` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `venues`
--

CREATE TABLE `venues` (
  `venue_id` int(10) NOT NULL,
  `name` text NOT NULL,
  `type` text NOT NULL,
  `location` text NOT NULL,
  `hourly_cost` int(100) NOT NULL,
  `dimensions` varchar(30) DEFAULT NULL,
  `availability` text DEFAULT NULL,
  `contact` text NOT NULL,
  `max_capacity` int(10) NOT NULL,
  `venue_schedule` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `venues`
--

INSERT INTO `venues` (`venue_id`, `name`, `type`, `location`, `hourly_cost`, `dimensions`, `availability`, `contact`, `max_capacity`, `venue_schedule`) VALUES
(901, 'Emmanuelles Convention Hall', 'Convention Hall', 'Dhanmondi', 24000, '6500 sqft', 'after december 2020', '01725643982', 700, 'day and night'),
(902, 'Xinxian Restaurant ', 'Restaurant', 'Dhanmondi', 50000, '3000 sqft', 'after 10 am', '0156893465', 400, 'night'),
(904, 'Event 71', 'Convention Hall', 'Uttara', 10000, '4500 sqft', 'everyday', '01777771875', 400, 'day - night'),
(905, 'Sena malancha', 'Convention Hall', 'Mirpur', 50000, '8000 sqft', 'everyday', '01828881769', 1000, 'day, afternoon, night'),
(906, 'White Hall Convention Center', 'Community Center', 'Gulshan', 9000, '3000sqft', 'everyday', '01511777791', 300, 'day and night'),
(907, 'Six Seasons Banquet', 'Resort', 'Gulshan', 80000, '9000sqft', 'sun-wed ', '01987009810', 1600, 'night and evening'),
(908, 'Panshi', 'Restaurant', 'Dhanmondi', 10500, '2000 sqft', 'everyday', '01888899992', 130, 'evening'),
(909, 'jol kabbo', 'Resort', 'Mirpur', 20000, '9500sqft', 'after 8am', '83758479469', 1000, 'day and evening');

-- --------------------------------------------------------

--
-- Table structure for table `venue_bank`
--

CREATE TABLE `venue_bank` (
  `vnb_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `venue_id` int(11) NOT NULL,
  `balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `venue_bank`
--

INSERT INTO `venue_bank` (`vnb_id`, `customer_id`, `venue_id`, `balance`) VALUES
(20, 712, 904, 10000),
(21, 716, 902, 20000),
(22, 716, 902, 30000),
(23, 716, 904, 20000),
(24, 716, 904, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `venue_booking`
--

CREATE TABLE `venue_booking` (
  `booking_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `cus_name` varchar(100) NOT NULL,
  `vn_name` varchar(100) NOT NULL,
  `vn_type` text NOT NULL,
  `location` text NOT NULL,
  `cost_per_hr` int(11) NOT NULL,
  `venue_id` int(10) NOT NULL,
  `booking_date` date NOT NULL,
  `event_date` date NOT NULL,
  `event_type` varchar(255) NOT NULL,
  `guest_capacity` int(20) NOT NULL,
  `duration` int(30) NOT NULL,
  `total_payment` int(20) DEFAULT NULL,
  `vn_schedule` varchar(200) NOT NULL,
  `Payment_status` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `venue_booking`
--

INSERT INTO `venue_booking` (`booking_id`, `customer_id`, `cus_name`, `vn_name`, `vn_type`, `location`, `cost_per_hr`, `venue_id`, `booking_date`, `event_date`, `event_type`, `guest_capacity`, `duration`, `total_payment`, `vn_schedule`, `Payment_status`) VALUES
(344, 716, 'amma', 'Event 71', 'Convention Hall', 'Uttara', 10000, 904, '2021-01-20', '2021-01-28', 'wedding', 200, 3, 0, 'afternoon', 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `venue_request`
--

CREATE TABLE `venue_request` (
  `request_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `venue_id` int(10) NOT NULL,
  `booking_date` date NOT NULL,
  `event_date` date NOT NULL,
  `event_type` varchar(255) NOT NULL,
  `guest_capacity` int(20) NOT NULL,
  `duration` varchar(30) NOT NULL,
  `event_schedule` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `venue_request`
--

INSERT INTO `venue_request` (`request_id`, `customer_id`, `venue_id`, `booking_date`, `event_date`, `event_type`, `guest_capacity`, `duration`, `event_schedule`) VALUES
(263, 712, 909, '2021-01-20', '2021-01-21', 'engagement', 200, '4', 'day'),
(264, 713, 902, '2021-01-20', '2021-01-21', 'wedding', 200, '2', 'night'),
(265, 716, 902, '2021-01-20', '2021-01-28', 'wedding', 400, '4', 'afternoon'),
(266, 712, 904, '2021-01-06', '2021-01-18', 'Birthday', 400, '4', 'afternoon'),
(267, 723, 908, '2021-03-25', '2021-03-30', 'engagement', 100, '4', 'evening');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `email` (`email`,`ad_username`,`ad_password`),
  ADD UNIQUE KEY `ad_username` (`ad_username`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `cus_username` (`cus_username`),
  ADD UNIQUE KEY `cus_password` (`cus_password`),
  ADD UNIQUE KEY `cus_username_2` (`cus_username`);

--
-- Indexes for table `cus_bank`
--
ALTER TABLE `cus_bank`
  ADD PRIMARY KEY (`bank_id`),
  ADD UNIQUE KEY `bank_id` (`bank_id`),
  ADD UNIQUE KEY `cus_id` (`cus_id`),
  ADD UNIQUE KEY `card_no` (`card_no`);

--
-- Indexes for table `payment_history`
--
ALTER TABLE `payment_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `vendor_id` (`vendor_id`),
  ADD KEY `venue_id` (`venue_id`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`vendor_id`),
  ADD UNIQUE KEY `brand_name` (`brand_name`) USING HASH;

--
-- Indexes for table `vendors_booking`
--
ALTER TABLE `vendors_booking`
  ADD PRIMARY KEY (`venbook_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `vendor_id` (`vendor_id`);

--
-- Indexes for table `vendor_bank`
--
ALTER TABLE `vendor_bank`
  ADD PRIMARY KEY (`vdb_id`),
  ADD UNIQUE KEY `vdb_id` (`vdb_id`),
  ADD KEY `vendor_id` (`vendor_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `vendor_request`
--
ALTER TABLE `vendor_request`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `vendor_id` (`vendor_id`);

--
-- Indexes for table `venues`
--
ALTER TABLE `venues`
  ADD PRIMARY KEY (`venue_id`),
  ADD UNIQUE KEY `name` (`name`) USING HASH;

--
-- Indexes for table `venue_bank`
--
ALTER TABLE `venue_bank`
  ADD PRIMARY KEY (`vnb_id`),
  ADD UNIQUE KEY `vnb_id` (`vnb_id`),
  ADD KEY `venue_id` (`venue_id`),
  ADD KEY `customer_id` (`customer_id`) USING BTREE;

--
-- Indexes for table `venue_booking`
--
ALTER TABLE `venue_booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `venue_id` (`venue_id`);

--
-- Indexes for table `venue_request`
--
ALTER TABLE `venue_request`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `venue_id` (`venue_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=724;

--
-- AUTO_INCREMENT for table `cus_bank`
--
ALTER TABLE `cus_bank`
  MODIFY `bank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `payment_history`
--
ALTER TABLE `payment_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `vendor_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=613;

--
-- AUTO_INCREMENT for table `vendors_booking`
--
ALTER TABLE `vendors_booking`
  MODIFY `venbook_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=407;

--
-- AUTO_INCREMENT for table `vendor_bank`
--
ALTER TABLE `vendor_bank`
  MODIFY `vdb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vendor_request`
--
ALTER TABLE `vendor_request`
  MODIFY `request_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=809;

--
-- AUTO_INCREMENT for table `venues`
--
ALTER TABLE `venues`
  MODIFY `venue_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=911;

--
-- AUTO_INCREMENT for table `venue_bank`
--
ALTER TABLE `venue_bank`
  MODIFY `vnb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `venue_booking`
--
ALTER TABLE `venue_booking`
  MODIFY `booking_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=345;

--
-- AUTO_INCREMENT for table `venue_request`
--
ALTER TABLE `venue_request`
  MODIFY `request_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=268;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cus_bank`
--
ALTER TABLE `cus_bank`
  ADD CONSTRAINT `cus_bank_ibfk_1` FOREIGN KEY (`cus_id`) REFERENCES `customers` (`customer_id`);

--
-- Constraints for table `payment_history`
--
ALTER TABLE `payment_history`
  ADD CONSTRAINT `payment_history_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`),
  ADD CONSTRAINT `payment_history_ibfk_2` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`vendor_id`),
  ADD CONSTRAINT `payment_history_ibfk_3` FOREIGN KEY (`venue_id`) REFERENCES `venues` (`venue_id`);

--
-- Constraints for table `vendors_booking`
--
ALTER TABLE `vendors_booking`
  ADD CONSTRAINT `vendors_booking_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`),
  ADD CONSTRAINT `vendors_booking_ibfk_2` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`vendor_id`);

--
-- Constraints for table `vendor_bank`
--
ALTER TABLE `vendor_bank`
  ADD CONSTRAINT `vendor_bank_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`);

--
-- Constraints for table `vendor_request`
--
ALTER TABLE `vendor_request`
  ADD CONSTRAINT `vendor_request_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`),
  ADD CONSTRAINT `vendor_request_ibfk_2` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`vendor_id`);

--
-- Constraints for table `venue_bank`
--
ALTER TABLE `venue_bank`
  ADD CONSTRAINT `venue_bank_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`);

--
-- Constraints for table `venue_booking`
--
ALTER TABLE `venue_booking`
  ADD CONSTRAINT `venue_booking_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`),
  ADD CONSTRAINT `venue_booking_ibfk_2` FOREIGN KEY (`venue_id`) REFERENCES `venues` (`venue_id`);

--
-- Constraints for table `venue_request`
--
ALTER TABLE `venue_request`
  ADD CONSTRAINT `venue_request_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`),
  ADD CONSTRAINT `venue_request_ibfk_2` FOREIGN KEY (`venue_id`) REFERENCES `venues` (`venue_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
