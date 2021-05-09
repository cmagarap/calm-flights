-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2017 at 12:10 AM
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
  `Food_Price` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trans_table`
--

INSERT INTO `trans_table` (`Trans_ID`, `Customer_ID`, `D_Loc`, `D_Dest`, `D_LT`, `D_AT`, `D_Date`, `D_Price`, `R_Loc`, `R_Dest`, `R_LT`, `R_AT`, `R_Date`, `R_Price`, `Adult_Count`, `Child_Count`, `Total_Person_Price`, `H_Name`, `Days_Booked`, `Total_Hotel_Price`, `Transpo_Type`, `Transpo_Price`, `Food_Pckg`, `Food_Price`) VALUES
(3, 37818, 'Bacolod', 'Cotabato', '05:30:00', '07:00:00', '2017-06-23', 2000, 'Cotabato', 'Bacolod', '10:00:00', '12:30:00', '2017-06-26', 2000, 1, 0, 200, '', 0, 0, 'None', 0, 'None', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `trans_table`
--
ALTER TABLE `trans_table`
  ADD PRIMARY KEY (`Trans_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `trans_table`
--
ALTER TABLE `trans_table`
  MODIFY `Trans_ID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
