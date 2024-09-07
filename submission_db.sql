-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2024 at 07:52 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `submission_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `submissions`
--

CREATE TABLE `submissions` (
  `id` bigint(20) NOT NULL,
  `amount` int(10) NOT NULL,
  `buyer` varchar(255) NOT NULL,
  `receipt_id` varchar(20) NOT NULL,
  `items` varchar(255) NOT NULL,
  `buyer_email` varchar(50) NOT NULL,
  `buyer_ip` varchar(20) DEFAULT NULL,
  `note` text NOT NULL,
  `city` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `entry_at` date DEFAULT NULL,
  `entry_by` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `submissions`
--

INSERT INTO `submissions` (`id`, `amount`, `buyer`, `receipt_id`, `items`, `buyer_email`, `buyer_ip`, `note`, `city`, `phone`, `entry_at`, `entry_by`) VALUES
(1, 1500, 'john', 'RCPT1234567890', 'Laptop', 'john.doe@example.com', '127.0.0.1', 'Urgent delivery required, please.', 'Dhaka', '01764828891', '2024-09-03', 1001),
(2, 1500, 'john', 'RCPT1234567890', 'Laptop', '121sksabbir@gmail.com', '127.0.0.1', 'Uergently', 'Dhaka', '01764828891', '2024-09-04', 1001),
(3, 1500, 'john', 'RCPT1234567890', 'Laptop', '121sksabbir@gmail.com', '127.0.0.1', 'Uergently', 'Dhaka', '01764828891', '2024-09-04', 1001),
(4, 15000, 'john', 'RCPT1234567890', 'Laptop', '121sksabbir@gmail.com', '127.0.0.1', 'Uergently', 'Dhaka', '01764828891', '2024-09-04', 1001),
(5, 15000, 'hollo', 'RCPT1234567890', 'Laptop', '121sksabbir@gmail.com', '127.0.0.1', 'Uergently', 'Dhaka', '01764828891', '2024-09-04', 1001),
(6, 150005, 'hollo', 'RCPT1234567890', 'Laptop', '121sksabbir@gmail.com', '127.0.0.1', 'Uergently', 'Dhaka', '01764828891', '2024-09-04', 1001),
(7, 150005, 'hollo', 'RCPT1234567890', 'Laptop', '121sksabbir@gmail.com', '127.0.0.1', 'Uergently', 'Dhaka', '01764828891', '2024-09-04', 1001),
(8, 150005, 'hollo', 'RCPT1234567890', 'Laptop', '121sksabbir@gmail.com', '127.0.0.1', 'Uergently', 'Dhaka', '01764828891', '2024-09-04', 1001),
(9, 150005, 'hollo', 'RCPT1234567890', 'Laptop', '121sksabbir@gmail.com', '127.0.0.1', 'Uergently', 'Dhaka', '01764828891', '2024-09-04', 1001),
(10, 150005, 'hollo', 'RCPT1234567890', 'Laptop', '121sksabbir@gmail.com', '127.0.0.1', 'Uergently', 'Dhaka', '01764828891', '2024-09-04', 1001),
(17, 3478, 'asif', 'RCPT1234567890', 'Laptop', '121sksabbir@gmail.com', '127.0.0.1', 'Urgently', 'Dhaka', '01764828891', '2024-09-05', 1009),
(18, 150005, 'jack', 'RCPT1234567890', 'Laptop', '121sksabbir@gmail.com', '127.0.0.1', 'ugr', 'Dhaka', '01764828891', '2024-09-06', 1001),
(19, 150005, 'jack', 'RCPT1234567890', 'Laptop', '121sksabbir@gmail.com', '127.0.0.1', 'fdet', 'Dhaka', '01764828891', '2024-09-06', 1009),
(20, 150005, 'hollo', 'RCPT1234567890', 'Laptop', '121sksabbir@gmail.com', '127.0.0.1', 'dfgdg', 'Dhaka', '01764828891', '2024-09-06', 1009),
(35, 1500, 'hollo', 'RCPT1234567890', 'Laptop', '121sksabbir@gmail.com', '127.0.0.1', 'asdffg', 'Dhaka', '01764828891', '2024-09-07', 1003),
(36, 15000, 'jack', 'RCPT1234567890', '123345645445', '121sksabbir@gmail.com', '127.0.0.1', 'wewe', 'Dhaka', '01764828891', '2024-09-07', 2005),
(37, 1500, 'jack', 'RCPT1234567890', '132311312312', '121sksabbir@gmail.com', '127.0.0.1', 'vxvbb', 'Dhaka', '01764828891', '2024-09-07', 1009),
(41, 1500, 'hollo', 'RCPT1234567890', 'Laptop', '121sksabbir@gmail.com', '127.0.0.1', 'vby', 'Dhaka', '01764828891', '2024-09-07', 1009);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `submissions`
--
ALTER TABLE `submissions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `submissions`
--
ALTER TABLE `submissions`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
