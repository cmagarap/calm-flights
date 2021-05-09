-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2017 at 04:07 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flight`
--

-- --------------------------------------------------------

--
-- Table structure for table `depart`
--

CREATE TABLE `depart` (
  `Flight_ID` int(11) NOT NULL,
  `D_Date` date NOT NULL,
  `D_Time` time NOT NULL,
  `A_Time` time NOT NULL,
  `Location` varchar(15) NOT NULL,
  `Destination` varchar(15) NOT NULL,
  `Fly_Price` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `depart`
--

INSERT INTO `depart` (`Flight_ID`, `D_Date`, `D_Time`, `A_Time`, `Location`, `Destination`, `Fly_Price`) VALUES
(16, '2017-06-23', '05:30:00', '07:00:00', 'Bacolod', 'Cotabato', 2000),
(18, '2017-06-23', '08:00:00', '10:00:00', 'Bacolod', 'Cotabato', 3000),
(19, '2017-06-23', '11:00:00', '13:30:00', 'Bacolod', 'Cotabato', 4000),
(20, '2017-06-23', '05:00:00', '07:00:00', 'Boracay', 'Davao', 3110);

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `Hotel_ID` int(14) NOT NULL,
  `H_Loc` varchar(15) NOT NULL,
  `H_Name` varchar(50) NOT NULL,
  `H_Price` int(11) NOT NULL,
  `H_Image` tinyblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`Hotel_ID`, `H_Loc`, `H_Name`, `H_Price`, `H_Image`) VALUES
(1, 'Cotabato', 'Royal Garden Hotel', 200, 0x696d616765732f32312d30362d323031372d313439383034303332392e6a7067),
(2, 'Cotabato', 'Amandari Cove', 300, 0x696d616765732f32312d30362d323031372d313439383034333734382e6a7067),
(3, 'Davao', 'Waterfront Insular Hotel', 500, 0x696d616765732f32332d30362d323031372d313439383137393232362e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `ret`
--

CREATE TABLE `ret` (
  `Flight_ID` int(11) NOT NULL,
  `R_Date` date NOT NULL,
  `D_Time` time NOT NULL,
  `A_Time` time NOT NULL,
  `Location` varchar(15) NOT NULL,
  `Destination` varchar(15) NOT NULL,
  `Fly_Price` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `ret`
--

INSERT INTO `ret` (`Flight_ID`, `R_Date`, `D_Time`, `A_Time`, `Location`, `Destination`, `Fly_Price`) VALUES
(6, '2017-06-26', '19:00:00', '21:00:00', 'Cotabato', 'Bacolod', 3000),
(7, '2017-06-26', '10:00:00', '12:30:00', 'Cotabato', 'Bacolod', 3000),
(9, '2017-06-26', '15:00:00', '17:00:00', 'Cotabato', 'Bacolod', 3000),
(11, '2017-06-26', '17:00:00', '19:00:00', 'Davao', 'Boracay', 3210);

-- --------------------------------------------------------

--
-- Table structure for table `trans_table`
--

CREATE TABLE `trans_table` (
  `Trans_ID` int(15) NOT NULL,
  `Customer_ID` int(15) NOT NULL,
  `D_Loc` varchar(50) NOT NULL,
  `D_Dest` varchar(50) NOT NULL,
  `D_LT` time NOT NULL,
  `D_AT` time NOT NULL,
  `D_Date` date NOT NULL,
  `D_Price` int(15) NOT NULL,
  `R_Loc` varchar(50) NOT NULL,
  `R_Dest` varchar(50) NOT NULL,
  `R_LT` time NOT NULL,
  `R_AT` time NOT NULL,
  `R_Date` date NOT NULL,
  `R_Price` int(15) NOT NULL,
  `Adult_Count` int(15) NOT NULL,
  `Child_Count` int(15) NOT NULL,
  `Total_Person_Price` int(15) NOT NULL,
  `H_Name` varchar(50) NOT NULL,
  `Days_Booked` int(15) NOT NULL,
  `Total_Hotel_Price` int(15) NOT NULL,
  `Transpo_Type` varchar(50) NOT NULL,
  `Transpo_Price` int(15) NOT NULL,
  `Food_Pckg` varchar(50) NOT NULL,
  `Food_Price` int(15) NOT NULL,
  `Total_Price` int(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trans_table`
--

INSERT INTO `trans_table` (`Trans_ID`, `Customer_ID`, `D_Loc`, `D_Dest`, `D_LT`, `D_AT`, `D_Date`, `D_Price`, `R_Loc`, `R_Dest`, `R_LT`, `R_AT`, `R_Date`, `R_Price`, `Adult_Count`, `Child_Count`, `Total_Person_Price`, `H_Name`, `Days_Booked`, `Total_Hotel_Price`, `Transpo_Type`, `Transpo_Price`, `Food_Pckg`, `Food_Price`, `Total_Price`) VALUES
(3, 37818, 'Bacolod', 'Cotabato', '05:30:00', '07:00:00', '2017-06-23', 2000, 'Cotabato', 'Bacolod', '10:00:00', '12:30:00', '2017-06-26', 2000, 1, 0, 200, '', 0, 0, 'None', 0, 'None', 0, 0),
(4, 37818, 'Bacolod', 'Cotabato', '05:30:00', '07:00:00', '2017-06-23', 2000, 'Cotabato', 'Bacolod', '10:00:00', '12:30:00', '2017-06-26', 2000, 1, 0, 200, '', 0, 0, 'None', 0, 'None', 0, 0),
(5, 37818, 'Bacolod', 'Cotabato', '05:30:00', '07:00:00', '2017-06-23', 2000, 'Cotabato', 'Bacolod', '19:00:00', '21:00:00', '2017-06-26', 2000, 1, 0, 200, 'Royal', 1, 200, 'Taxi', 1500, 'Dinner', 400, 0),
(6, 37818, 'Bacolod', 'Cotabato', '05:30:00', '07:00:00', '2017-06-23', 2000, 'Cotabato', 'Bacolod', '19:00:00', '21:00:00', '2017-06-26', 2000, 1, 0, 200, 'Royal', 1, 200, 'Taxi', 1500, 'Dinner', 400, 0),
(7, 37818, 'Bacolod', 'Cotabato', '05:30:00', '07:00:00', '2017-06-23', 2000, 'Cotabato', 'Bacolod', '19:00:00', '21:00:00', '2017-06-26', 2000, 1, 0, 200, 'Royal', 1, 200, 'Taxi', 1500, 'Dinner', 400, 0),
(8, 37818, 'Bacolod', 'Cotabato', '05:30:00', '07:00:00', '2017-06-23', 2000, 'Cotabato', 'Bacolod', '19:00:00', '21:00:00', '2017-06-26', 2000, 1, 0, 200, 'Royal', 1, 200, 'Taxi', 1500, 'Dinner', 400, 0),
(9, 37818, 'Bacolod', 'Cotabato', '08:00:00', '10:00:00', '2017-06-23', 3000, 'Cotabato', 'Bacolod', '19:00:00', '21:00:00', '2017-06-26', 3000, 1, 0, 200, '', 0, 0, 'None', 0, 'None', 0, 0),
(10, 37818, 'Bacolod', 'Cotabato', '08:00:00', '10:00:00', '2017-06-23', 3000, 'Cotabato', 'Bacolod', '19:00:00', '21:00:00', '2017-06-26', 3000, 1, 0, 200, '', 0, 0, 'None', 0, 'None', 0, 0),
(11, 37818, 'Bacolod', 'Cotabato', '08:00:00', '10:00:00', '2017-06-23', 3000, 'Cotabato', 'Bacolod', '15:00:00', '17:00:00', '2017-06-26', 3000, 1, 0, 200, '', 0, 0, 'None', 0, 'None', 0, 0),
(12, 37818, 'Bacolod', 'Cotabato', '08:00:00', '10:00:00', '2017-06-23', 3000, 'Cotabato', 'Bacolod', '15:00:00', '17:00:00', '2017-06-26', 3000, 1, 0, 200, '', 0, 0, 'None', 0, 'None', 0, 0),
(13, 37818, 'Bacolod', 'Cotabato', '08:00:00', '10:00:00', '2017-06-23', 3000, 'Cotabato', 'Bacolod', '15:00:00', '17:00:00', '2017-06-26', 3000, 1, 0, 200, '', 0, 0, 'None', 0, 'None', 0, 0),
(14, 37818, 'Bacolod', 'Cotabato', '08:00:00', '10:00:00', '2017-06-23', 3000, 'Cotabato', 'Bacolod', '15:00:00', '17:00:00', '2017-06-26', 3000, 1, 0, 200, '', 0, 0, 'None', 0, 'None', 0, 0),
(15, 37818, 'Bacolod', 'Cotabato', '08:00:00', '10:00:00', '2017-06-23', 3000, 'Cotabato', 'Bacolod', '15:00:00', '17:00:00', '2017-06-26', 3000, 1, 0, 200, '', 0, 0, 'None', 0, 'None', 0, 0),
(16, 37818, 'Bacolod', 'Cotabato', '08:00:00', '10:00:00', '2017-06-23', 3000, 'Cotabato', 'Bacolod', '15:00:00', '17:00:00', '2017-06-26', 3000, 1, 0, 200, '', 0, 0, 'None', 0, 'None', 0, 0),
(17, 37818, 'Bacolod', 'Cotabato', '08:00:00', '10:00:00', '2017-06-23', 3000, 'Cotabato', 'Bacolod', '15:00:00', '17:00:00', '2017-06-26', 3000, 1, 0, 200, '', 0, 0, 'None', 0, 'None', 0, 0),
(18, 37818, 'Bacolod', 'Cotabato', '08:00:00', '10:00:00', '2017-06-23', 3000, 'Cotabato', 'Bacolod', '19:00:00', '21:00:00', '2017-06-26', 3000, 1, 0, 200, '', 0, 0, 'None', 0, 'None', 0, 0),
(19, 37818, 'Bacolod', 'Cotabato', '08:00:00', '10:00:00', '2017-06-23', 3000, 'Cotabato', 'Bacolod', '19:00:00', '21:00:00', '2017-06-26', 3000, 1, 0, 200, '', 0, 0, 'None', 0, 'None', 0, 6200),
(20, 37818, 'Bacolod', 'Cotabato', '08:00:00', '10:00:00', '2017-06-23', 3000, 'Cotabato', 'Bacolod', '19:00:00', '21:00:00', '2017-06-26', 3000, 1, 0, 200, '', 0, 0, 'None', 0, 'None', 0, 6200),
(21, 0, 'Bacolod', 'Cotabato', '08:00:00', '10:00:00', '2017-06-23', 3000, 'Cotabato', 'Bacolod', '19:00:00', '21:00:00', '2017-06-26', 3000, 1, 0, 200, '', 0, 0, 'None', 0, 'None', 0, 6200),
(22, 0, 'Bacolod', 'Cotabato', '05:30:00', '07:00:00', '2017-06-23', 2000, 'Cotabato', 'Bacolod', '19:00:00', '21:00:00', '2017-06-26', 2000, 1, 0, 200, 'Royal', 1, 200, 'Taxi', 1500, 'Dinner', 400, 7300),
(23, 34, 'Bacolod', 'Cotabato', '05:30:00', '07:00:00', '2017-06-23', 2000, 'Cotabato', 'Bacolod', '19:00:00', '21:00:00', '2017-06-26', 2000, 1, 0, 200, 'Royal', 1, 200, 'Taxi', 1500, 'Dinner', 400, 7300),
(24, 34, 'Bacolod', 'Cotabato', '05:30:00', '07:00:00', '2017-06-23', 2000, 'Cotabato', 'Bacolod', '19:00:00', '21:00:00', '2017-06-26', 2000, 1, 0, 200, 'Royal', 1, 200, 'Taxi', 1500, 'Dinner', 400, 7300),
(25, 34, 'Bacolod', 'Cotabato', '05:30:00', '07:00:00', '2017-06-23', 2000, 'Cotabato', 'Bacolod', '19:00:00', '21:00:00', '2017-06-26', 2000, 1, 0, 200, 'Royal', 1, 200, 'Taxi', 1500, 'Dinner', 400, 7300),
(26, 34, 'Bacolod', 'Cotabato', '05:30:00', '07:00:00', '2017-06-23', 2000, 'Cotabato', 'Bacolod', '19:00:00', '21:00:00', '2017-06-26', 2000, 1, 0, 200, 'Royal', 1, 200, 'Taxi', 1500, 'Dinner', 400, 7300),
(27, 34, 'Bacolod', 'Cotabato', '05:30:00', '07:00:00', '2017-06-23', 2000, '', '', '00:00:00', '00:00:00', '0000-00-00', 2000, 1, 0, 200, '', 0, 0, 'None', 0, 'None', 0, 2200),
(28, 34, 'Bacolod', 'Cotabato', '11:00:00', '13:30:00', '2017-06-23', 4000, '', '', '00:00:00', '00:00:00', '0000-00-00', 4000, 1, 0, 200, '', 0, 0, 'None', 0, 'None', 0, 4200),
(29, 34, 'Bacolod', 'Cotabato', '05:30:00', '07:00:00', '2017-06-23', 2000, '', '', '00:00:00', '00:00:00', '0000-00-00', 2000, 1, 0, 200, '', 0, 0, 'None', 0, 'None', 0, 2200),
(30, 34, 'Bacolod', 'Cotabato', '08:00:00', '10:00:00', '2017-06-23', 3000, '', '', '00:00:00', '00:00:00', '0000-00-00', 3000, 1, 0, 200, '', 0, 0, 'None', 0, 'None', 0, 3200),
(31, 34, 'Bacolod', 'Cotabato', '05:30:00', '07:00:00', '2017-06-23', 2000, '', '', '00:00:00', '00:00:00', '0000-00-00', 2000, 1, 0, 200, '', 0, 0, 'None', 0, 'None', 0, 2200),
(32, 34, 'Bacolod', 'Cotabato', '11:00:00', '13:30:00', '2017-06-23', 4000, '', '', '00:00:00', '00:00:00', '0000-00-00', 4000, 1, 0, 200, '', 0, 0, 'None', 0, 'None', 0, 4200),
(33, 34, 'Boracay', 'Davao', '05:00:00', '07:00:00', '2017-06-23', 3110, 'Davao', 'Boracay', '17:00:00', '19:00:00', '2017-06-26', 3110, 1, 0, 200, 'Waterfront', 6, 3000, 'Bus', 1000, 'Dinner', 400, 10920);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `code` varchar(100) NOT NULL,
  `status` enum('admin','user') NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `password`, `code`, `status`, `active`) VALUES
(6, 'Seeeej', 'Agarap', 'cmagarap@fit.edu.ph', 'blakegriffin', '', 'admin', 1),
(7, 'Veo Thadeus', 'Calimlim', 'veothadeus@hotmail.com', '11blades', 'c2f8ea40f6f9624a2f7860960fa09dcb51f9295a', 'admin', 1),
(34, 'Van Tristan', 'Calimlim', 'vtvc17@gmail.com', '123', '5a8f78264684a3ae81fe4db6e5c28cb476241bdb', 'user', 1),
(35, 'Veo', 'Calimlim', 'vvcalimlim@fit.edu.ph', '11blades', '265dff786b63dcdea22911fb5b47c4a3807a7104', 'user', 1),
(36, 'adasdsa', 'asdsadas', 'veothadeus@hotmail.com', 'dasdadas', '3c8696f99f1468e6e11063f423a804a94cc6d9e5', 'user', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `depart`
--
ALTER TABLE `depart`
  ADD PRIMARY KEY (`Flight_ID`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`Hotel_ID`);

--
-- Indexes for table `ret`
--
ALTER TABLE `ret`
  ADD PRIMARY KEY (`Flight_ID`);

--
-- Indexes for table `trans_table`
--
ALTER TABLE `trans_table`
  ADD PRIMARY KEY (`Trans_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `depart`
--
ALTER TABLE `depart`
  MODIFY `Flight_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `Hotel_ID` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ret`
--
ALTER TABLE `ret`
  MODIFY `Flight_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `trans_table`
--
ALTER TABLE `trans_table`
  MODIFY `Trans_ID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
