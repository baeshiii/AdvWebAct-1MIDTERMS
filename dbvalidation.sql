-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2023 at 03:23 AM
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
-- Database: `dbvalidation`
--

-- --------------------------------------------------------

--
-- Table structure for table `validate`
--

CREATE TABLE `validate` (
  `id` int(30) NOT NULL,
  `name` varchar(100) NOT NULL,
  `middle` varchar(100) NOT NULL,
  `last` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` enum('Male','Female','Other','') NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `validate`
--

INSERT INTO `validate` (`id`, `name`, `middle`, `last`, `email`, `gender`, `address`, `phone`) VALUES
(2, 'asdasd', 'asaa', 'ddaaadada', 'asdasd@gmail.com', 'Male', 'asdasdasd 123 123 st asd city', '12332132123'),
(3, 'firstNameTest', 'middleNameTest', 'lastNameTest', 'emailtest@gmail.com', 'Male', 'address 123 test st. test city', '0987654321234'),
(4, 'black', 'nigga', 'nigger', 'nigganigger@gmail.com', 'Female', 'nigga st in nigger city', '09331123123'),
(5, 'qweqweaa', 'aasdasdasd', 'ddsaasd', 'asdasdddsa@gmail.com', 'Male', 'asdasdas asdasd asdasd aetaeta', '12312312312'),
(7, 'Jhon Andre', '123123', '123', 'kimdelacruz@gmail.com', 'Female', 'asdasdasdasdasd', '123123123123'),
(9, 'adsfghsdfh', 'asdasdasdf', 'sdfasdvfbvasdf', 'sdehgtsdhgfgbrasdf@gmail.com', 'Male', 'sdgbfh;ljsdfblkbjalsvadfh;ljk', '09876576556');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `validate`
--
ALTER TABLE `validate`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `validate`
--
ALTER TABLE `validate`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
