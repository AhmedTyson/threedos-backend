-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2026 at 01:59 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `airline_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `aircraft`
--

CREATE TABLE `aircraft` (
  `AircraftID` int(11) NOT NULL,
  `AirlineID` int(11) NOT NULL,
  `Model` varchar(100) NOT NULL,
  `Capacity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aircraft`
--

INSERT INTO `aircraft` (`AircraftID`, `AirlineID`, `Model`, `Capacity`) VALUES
(1, 1, 'Boeing 777-300ER', 340),
(2, 1, 'Airbus A320neo', 160),
(3, 1, 'Boeing 777-300ER', 340),
(4, 1, 'Airbus A320neo', 160),
(5, 1, 'Boeing 747', 416),
(6, 1, 'Boeing 747', 416);

-- --------------------------------------------------------

--
-- Table structure for table `airline`
--

CREATE TABLE `airline` (
  `AirlineID` int(11) NOT NULL,
  `Name` varchar(150) NOT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `ContactPerson` varchar(100) DEFAULT NULL,
  `PhoneNumber` varchar(50) DEFAULT NULL,
  `CurrentBalance` decimal(15,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `airline`
--

INSERT INTO `airline` (`AirlineID`, `Name`, `Address`, `ContactPerson`, `PhoneNumber`, `CurrentBalance`) VALUES
(1, 'EgyptAir', 'Cairo International Airport, Terminal 3', 'Ahmed Hassan', '+201001234567', 15000000.00),
(2, 'Emirates', 'Dubai, UAE', 'Sarah Collins', '+971501234567', 85000000.00),
(3, 'EgyptAir', 'Cairo International Airport, Terminal 3', 'Ahmed Hassan', '+201001234567', 15000000.00),
(4, 'Emirates', 'Dubai, UAE', 'Sarah Collins', '+971501234567', 85000000.00),
(5, 'Egypt Air', 'Cairo Airport', 'Ahmed Hassan', '+20123456789', 5000000.00);

-- --------------------------------------------------------

--
-- Table structure for table `crew`
--

CREATE TABLE `crew` (
  `CrewID` int(11) NOT NULL,
  `AircraftID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `crew`
--

INSERT INTO `crew` (`CrewID`, `AircraftID`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `crewmember`
--

CREATE TABLE `crewmember` (
  `MemberID` int(11) NOT NULL,
  `CrewID` int(11) NOT NULL,
  `Name` varchar(150) NOT NULL,
  `Role` enum('Major Pilot','Assistant Pilot','Hostess') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `crewmember`
--

INSERT INTO `crewmember` (`MemberID`, `CrewID`, `Name`, `Role`) VALUES
(1, 1, 'Capt. Omar Sherif', 'Major Pilot'),
(2, 1, 'F.O. Ali Mahmoud', 'Assistant Pilot'),
(3, 1, 'Salma Radwan', 'Hostess'),
(4, 1, 'Huda Amin', 'Hostess');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `EmployeeID` int(11) NOT NULL,
  `AirlineID` int(11) NOT NULL,
  `Name` varchar(150) NOT NULL,
  `BirthDate` date NOT NULL,
  `Gender` enum('M','F') NOT NULL,
  `Position` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`EmployeeID`, `AirlineID`, `Name`, `BirthDate`, `Gender`, `Position`) VALUES
(1, 1, 'Tarek Youssef', '1985-05-14', 'M', 'HR Director'),
(2, 1, 'Nour El-Din', '1990-11-22', 'F', 'Ground Operations Manager'),
(3, 1, 'Tarek Youssef', '1985-05-14', 'M', 'HR Director'),
(4, 1, 'Nour El-Din', '1990-11-22', 'F', 'Ground Operations Manager'),
(5, 1, 'Ahmed Hassan', '1988-03-12', 'M', 'Senior Pilot'),
(6, 1, 'Mona Zaki', '1992-07-24', 'F', 'Flight Attendant'),
(7, 1, 'Karim Mostafa', '1985-11-05', 'M', 'Maintenance Engineer'),
(8, 1, 'Noha Riad', '1990-09-15', 'F', 'Customer Service Representative'),
(9, 1, 'Youssef Kamal', '1982-01-30', 'M', 'Ground Operations Manager'),
(10, 2, 'Sarah Jenkins', '1991-04-18', 'F', 'First Officer (Co-Pilot)'),
(11, 2, 'David Smith', '1987-08-22', 'M', 'Logistics Coordinator'),
(12, 2, 'Fatima Al-Fassi', '1995-12-10', 'F', 'Flight Attendant'),
(13, 2, 'Omar Saeed', '1989-06-05', 'M', 'Air Traffic Liaison'),
(14, 2, 'Layla Mansour', '1993-02-28', 'F', 'Cabin Crew Lead');

-- --------------------------------------------------------

--
-- Table structure for table `flightschedule`
--

CREATE TABLE `flightschedule` (
  `AircraftID` int(11) NOT NULL,
  `RouteID` int(11) NOT NULL,
  `DepartureDateTime` datetime NOT NULL,
  `ArrivalDateTime` datetime NOT NULL,
  `NumberOfPassengers` int(11) NOT NULL,
  `TicketPrice` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `flightschedule`
--

INSERT INTO `flightschedule` (`AircraftID`, `RouteID`, `DepartureDateTime`, `ArrivalDateTime`, `NumberOfPassengers`, `TicketPrice`) VALUES
(1, 1, '2024-05-10 09:30:00', '2024-05-10 14:00:00', 315, 650.00),
(1, 1, '2024-05-11 09:30:00', '2024-05-11 14:00:00', 320, 650.00);

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE `route` (
  `RouteID` int(11) NOT NULL,
  `Origin` varchar(100) NOT NULL,
  `Destination` varchar(100) NOT NULL,
  `Distance` decimal(10,2) NOT NULL,
  `Classification` enum('Domestic','International') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`RouteID`, `Origin`, `Destination`, `Distance`, `Classification`) VALUES
(1, 'Cairo', 'London', 3500.00, 'International'),
(2, 'CAI', 'LHR', 3510.50, 'International'),
(3, 'DXB', 'JFK', 11000.20, 'International'),
(4, 'CAI', 'HRG', 400.00, 'Domestic'),
(5, 'CAI', 'LHR', 3510.50, 'International'),
(6, 'DXB', 'JFK', 11000.20, 'International'),
(7, 'CAI', 'HRG', 400.00, 'Domestic');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `TransactionID` int(11) NOT NULL,
  `AirlineID` int(11) NOT NULL,
  `Type` enum('buy','sell') NOT NULL,
  `Amount` decimal(15,2) NOT NULL,
  `Description` text DEFAULT NULL,
  `TransactionDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`TransactionID`, `AirlineID`, `Type`, `Amount`, `Description`, `TransactionDate`) VALUES
(1, 1, 'sell', 125000.00, 'Bulk ticket sales for CAI-LHR Route (Nov 2023)', '2023-11-15'),
(2, 1, 'buy', 45000.00, 'Routine engine maintenance for Boeing 777', '2023-11-18'),
(3, 1, 'sell', 125000.00, 'Bulk ticket sales for CAI-LHR Route (Nov 2023)', '2023-11-15'),
(4, 1, 'buy', 45000.00, 'Routine engine maintenance for Boeing 777', '2023-11-18'),
(5, 1, 'sell', 5400.00, 'Ticket sales - Flight CAI-LHR (Economy Class)', '2024-05-01'),
(6, 1, 'sell', 12000.00, 'Ticket sales - Flight CAI-LHR (Business Class)', '2024-05-02'),
(7, 1, 'buy', 3500.50, 'Aviation Fuel purchase - Cairo International Airport', '2024-05-03'),
(8, 1, 'buy', 8200.00, 'Routine Maintenance Parts - Boeing 777', '2024-05-05'),
(9, 1, 'sell', 9800.00, 'Group booking - Red Sea Tourist Agency', '2024-05-06'),
(10, 2, 'buy', 45000.00, 'Engine turbine replacement parts - Airbus A320', '2024-05-01'),
(11, 2, 'sell', 25000.00, 'Ticket sales - Flight DXB-JFK (First Class)', '2024-05-02'),
(12, 2, 'sell', 18500.00, 'Ticket sales - Flight DXB-JFK (Economy Class)', '2024-05-03'),
(13, 2, 'buy', 1200.00, 'In-flight catering services monthly contract payment', '2024-05-04'),
(14, 2, 'sell', 7600.00, 'Last-minute counter ticket sales - Terminal 3', '2024-05-05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aircraft`
--
ALTER TABLE `aircraft`
  ADD PRIMARY KEY (`AircraftID`),
  ADD KEY `AirlineID` (`AirlineID`);

--
-- Indexes for table `airline`
--
ALTER TABLE `airline`
  ADD PRIMARY KEY (`AirlineID`);

--
-- Indexes for table `crew`
--
ALTER TABLE `crew`
  ADD PRIMARY KEY (`CrewID`),
  ADD UNIQUE KEY `AircraftID` (`AircraftID`);

--
-- Indexes for table `crewmember`
--
ALTER TABLE `crewmember`
  ADD PRIMARY KEY (`MemberID`),
  ADD KEY `CrewID` (`CrewID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`EmployeeID`),
  ADD KEY `AirlineID` (`AirlineID`);

--
-- Indexes for table `flightschedule`
--
ALTER TABLE `flightschedule`
  ADD PRIMARY KEY (`AircraftID`,`RouteID`,`DepartureDateTime`),
  ADD KEY `RouteID` (`RouteID`);

--
-- Indexes for table `route`
--
ALTER TABLE `route`
  ADD PRIMARY KEY (`RouteID`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`TransactionID`),
  ADD KEY `AirlineID` (`AirlineID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aircraft`
--
ALTER TABLE `aircraft`
  MODIFY `AircraftID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `airline`
--
ALTER TABLE `airline`
  MODIFY `AirlineID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `crew`
--
ALTER TABLE `crew`
  MODIFY `CrewID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `crewmember`
--
ALTER TABLE `crewmember`
  MODIFY `MemberID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `EmployeeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `route`
--
ALTER TABLE `route`
  MODIFY `RouteID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `TransactionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aircraft`
--
ALTER TABLE `aircraft`
  ADD CONSTRAINT `aircraft_ibfk_1` FOREIGN KEY (`AirlineID`) REFERENCES `airline` (`AirlineID`) ON DELETE CASCADE;

--
-- Constraints for table `crew`
--
ALTER TABLE `crew`
  ADD CONSTRAINT `crew_ibfk_1` FOREIGN KEY (`AircraftID`) REFERENCES `aircraft` (`AircraftID`) ON DELETE CASCADE;

--
-- Constraints for table `crewmember`
--
ALTER TABLE `crewmember`
  ADD CONSTRAINT `crewmember_ibfk_1` FOREIGN KEY (`CrewID`) REFERENCES `crew` (`CrewID`) ON DELETE CASCADE;

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`AirlineID`) REFERENCES `airline` (`AirlineID`) ON DELETE CASCADE;

--
-- Constraints for table `flightschedule`
--
ALTER TABLE `flightschedule`
  ADD CONSTRAINT `flightschedule_ibfk_1` FOREIGN KEY (`AircraftID`) REFERENCES `aircraft` (`AircraftID`) ON DELETE CASCADE,
  ADD CONSTRAINT `flightschedule_ibfk_2` FOREIGN KEY (`RouteID`) REFERENCES `route` (`RouteID`) ON DELETE CASCADE;

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`AirlineID`) REFERENCES `airline` (`AirlineID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
