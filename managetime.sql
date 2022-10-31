-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2022 at 10:07 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `managetime`
--

-- --------------------------------------------------------

--
-- Table structure for table `acaddegree`
--

CREATE TABLE `acaddegree` (
  `AcadDegreeId` int(11) NOT NULL,
  `AcadDegreeName` text NOT NULL,
  `NoOfSemester` int(11) DEFAULT NULL,
  `AcadProgType` int(3) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `acadyear`
--

CREATE TABLE `acadyear` (
  `AcadYNo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acadyear`
--

INSERT INTO `acadyear` (`AcadYNo`) VALUES
('2009/2008');

-- --------------------------------------------------------

--
-- Table structure for table `buildingseminar`
--

CREATE TABLE `buildingseminar` (
  `BId` int(11) NOT NULL,
  `BName` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buildingseminar`
--

INSERT INTO `buildingseminar` (`BId`, `BName`) VALUES
(2, 'Labaratory'),
(1, 'Lecture Room');

-- --------------------------------------------------------

--
-- Table structure for table `classyear`
--

CREATE TABLE `classyear` (
  `ClassNo` int(11) NOT NULL,
  `ClassName` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classyear`
--

INSERT INTO `classyear` (`ClassNo`, `ClassName`) VALUES
(1, '&#1575;&#1604;&#1587;&#1606;&#1577; &#1575;&#1604;&#1575;&#1608;&#1604;&#1609;'),
(2, '&#1575;&#1604;&#1587;&#1606;&#1577; &#1575;&#1604;&#1579;&#1575;&#1606;&#1610;&#1577;'),
(3, '&#1575;&#1604;&#1587;&#1606;&#1577; &#1575;&#1604;&#1579;&#1575;&#1604;&#1579;&#1577;'),
(4, '&#1575;&#1604;&#1587;&#1606;&#1577; &#1575;&#1604;&#1585;&#1575;&#1576;&#1593;&#1577;'),
(5, '&#1575;&#1604;&#1587;&#1606;&#1577; &#1575;&#1604;&#1582;&#1575;&#1605;&#1587;&#1577;'),
(6, '&#1575;&#1604;&#1587;&#1606;&#1577; &#1575;&#1604;&#1587;&#1575;&#1583;&#1587;&#1577;');

-- --------------------------------------------------------

--
-- Table structure for table `colleges`
--

CREATE TABLE `colleges` (
  `CollegeCode` int(11) NOT NULL,
  `UniversityCode` int(11) NOT NULL,
  `CollegeName` text NOT NULL,
  `UserName` varchar(16) NOT NULL,
  `Passwd` varchar(40) NOT NULL,
  `UnLoc` varchar(800) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `colleges`
--

INSERT INTO `colleges` (`CollegeCode`, `UniversityCode`, `CollegeName`, `UserName`, `Passwd`, `UnLoc`) VALUES
(1, 111, '&#1603;&#1604;&#1610;&#1577; &#1593;&#1604;&#1608;&#1605; &#1575;&#1604;&#1581;&#1575;&#1587;&#1608;&#1576;', 'cs', 'cscs', '&#1575;&#1604;&#1580;&#1606;&#1575;&#1581; &#1575;&#1604;&#1594;&#1585;&#1576;&#1609;'),
(2, 111, '&#1603;&#1604;&#1610;&#1577; &#1575;&#1604;&#1607;&#1606;&#1583;&#1587;&#1577;', 'eng', 'engeng', '&#1575;&#1604;&#1580;&#1606;&#1575;&#1581; &#1575;&#1604;&#1580;&#1606;&#1608;&#1576;&#1609;');

-- --------------------------------------------------------

--
-- Table structure for table `collegestarttime`
--

CREATE TABLE `collegestarttime` (
  `AcadYNo` varchar(10) NOT NULL,
  `CollegeCode` int(11) NOT NULL,
  `UniversityCode` int(11) NOT NULL,
  `SemNo` int(11) NOT NULL,
  `TSID` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `collegesubject`
--

CREATE TABLE `collegesubject` (
  `AcadYNo` varchar(200) NOT NULL,
  `DeptNo` int(11) NOT NULL,
  `CollegeCode` int(11) NOT NULL,
  `UniversityCode` int(11) NOT NULL,
  `AcadDegreeId` int(11) NOT NULL,
  `ClassNo` int(11) NOT NULL,
  `SecID` int(2) NOT NULL,
  `SemNo` int(11) NOT NULL,
  `SubCode` varchar(400) NOT NULL,
  `SubName` text NOT NULL,
  `SubHour` int(11) NOT NULL,
  `SubTHour` int(11) NOT NULL,
  `SubType` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `DeptNo` int(11) NOT NULL,
  `CollegeCode` int(11) NOT NULL,
  `UniversityCode` int(11) NOT NULL,
  `AcadDegreeId` int(11) NOT NULL,
  `DeptName` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `deptandsem`
--

CREATE TABLE `deptandsem` (
  `UniversityCode` int(11) NOT NULL,
  `CollegeCode` int(11) NOT NULL,
  `DeptNo` int(11) NOT NULL,
  `AcadDegreeId` int(11) NOT NULL,
  `SemNo` int(11) NOT NULL,
  `ClassNo` int(11) NOT NULL,
  `SecID` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `deptsection`
--

CREATE TABLE `deptsection` (
  `UniversityCode` int(11) NOT NULL,
  `CollegeCode` int(11) NOT NULL,
  `DeptNo` int(11) NOT NULL,
  `AcadDegreeId` int(11) NOT NULL,
  `ClassNo` int(11) NOT NULL,
  `SecID` int(11) NOT NULL,
  `SecName` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `grouppersem`
--

CREATE TABLE `grouppersem` (
  `AcadYNo` varchar(200) NOT NULL,
  `UniversityCode` int(4) NOT NULL,
  `CollegeCode` int(4) NOT NULL,
  `DeptNo` int(4) NOT NULL,
  `AcadDegreeId` int(3) NOT NULL,
  `SemNo` int(2) NOT NULL,
  `ClassNo` int(2) NOT NULL,
  `SecID` int(2) NOT NULL,
  `GId` int(2) NOT NULL,
  `GName` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `loginadmin`
--

CREATE TABLE `loginadmin` (
  `UserName` varchar(16) NOT NULL,
  `Passwd` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loginadmin`
--

INSERT INTO `loginadmin` (`UserName`, `Passwd`) VALUES
('manager', 'manager');

-- --------------------------------------------------------

--
-- Table structure for table `managinglec`
--

CREATE TABLE `managinglec` (
  `AcadYNo` varchar(200) NOT NULL,
  `MDays` int(11) NOT NULL,
  `MTimes` varchar(15) NOT NULL,
  `BId` int(11) NOT NULL,
  `SubBId` int(11) NOT NULL,
  `UniversityCode` int(11) NOT NULL,
  `CollegeCode` int(11) NOT NULL,
  `DeptNo` int(11) NOT NULL,
  `AcadDegreeId` int(11) NOT NULL,
  `SemNo` int(11) NOT NULL,
  `ClassNo` int(11) NOT NULL,
  `SecID` int(11) NOT NULL,
  `SubCode` varchar(400) NOT NULL,
  `SubType` int(2) NOT NULL,
  `GId` int(2) NOT NULL,
  `TeacherId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `SemNo` int(11) NOT NULL,
  `ClassNo` int(11) NOT NULL,
  `SemName` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`SemNo`, `ClassNo`, `SemName`) VALUES
(1, 1, '&#1575;&#1604;&#1601;&#1589;&#1604; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609; &#1575;&#1604;&#1575;&#1608;&#1604;'),
(1, 2, '&#1575;&#1604;&#1601;&#1589;&#1604; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609; &#1575;&#1604;&#1575;&#1608;&#1604;'),
(1, 3, '&#1575;&#1604;&#1601;&#1589;&#1604; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609; &#1575;&#1604;&#1575;&#1608;&#1604;'),
(1, 4, '&#1575;&#1604;&#1601;&#1589;&#1604; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609; &#1575;&#1604;&#1575;&#1608;&#1604;'),
(1, 5, '&#1575;&#1604;&#1601;&#1589;&#1604; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609; &#1575;&#1604;&#1575;&#1608;&#1604;'),
(1, 6, '&#1575;&#1604;&#1601;&#1589;&#1604; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609; &#1575;&#1604;&#1575;&#1608;&#1604;'),
(2, 1, '&#1575;&#1604;&#1601;&#1589;&#1604; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609; &#1575;&#1604;&#1579;&#1575;&#1606;&#1609;'),
(2, 2, '&#1575;&#1604;&#1601;&#1589;&#1604; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609; &#1575;&#1604;&#1579;&#1575;&#1606;&#1609;'),
(2, 3, '&#1575;&#1604;&#1601;&#1589;&#1604; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609; &#1575;&#1604;&#1579;&#1575;&#1606;&#1609;'),
(2, 4, '&#1575;&#1604;&#1601;&#1589;&#1604; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609; &#1575;&#1604;&#1579;&#1575;&#1606;&#1609;'),
(2, 5, '&#1575;&#1604;&#1601;&#1589;&#1604; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609; &#1575;&#1604;&#1579;&#1575;&#1606;&#1609;'),
(2, 6, '&#1575;&#1604;&#1601;&#1589;&#1604; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609; &#1575;&#1604;&#1579;&#1575;&#1606;&#1609;');

-- --------------------------------------------------------

--
-- Table structure for table `studypersem`
--

CREATE TABLE `studypersem` (
  `AcadYNo` varchar(200) NOT NULL,
  `UniversityCode` int(4) NOT NULL,
  `CollegeCode` int(4) NOT NULL,
  `DeptNo` int(4) NOT NULL,
  `AcadDegreeId` int(3) NOT NULL,
  `SemNo` int(2) NOT NULL,
  `ClassNo` int(2) NOT NULL,
  `SecID` int(11) NOT NULL,
  `NoOfStud` int(11) NOT NULL,
  `NoOfGroup` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subbuildingseminar`
--

CREATE TABLE `subbuildingseminar` (
  `UniversityCode` int(11) NOT NULL,
  `BId` int(11) NOT NULL,
  `SubBId` int(11) NOT NULL,
  `SubBName` varchar(800) NOT NULL,
  `Capacity` int(11) NOT NULL,
  `UnLoc` varchar(800) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subbuildingseminar`
--

INSERT INTO `subbuildingseminar` (`UniversityCode`, `BId`, `SubBId`, `SubBName`, `Capacity`, `UnLoc`) VALUES
(111, 1, 1, '&#1575;&#1604;&#1602;&#1575;&#1593;&#1577;1', 500, '&#1575;&#1604;&#1580;&#1606;&#1575;&#1581; &#1575;&#1604;&#1594;&#1585;&#1576;&#1609;'),
(111, 1, 2, '&#1575;&#1604;&#1602;&#1575;&#1593;&#1577;4', 1000, '&#1575;&#1604;&#1580;&#1606;&#1575;&#1581; &#1575;&#1604;&#1580;&#1606;&#1608;&#1576;&#1609;'),
(111, 2, 1, '&#1605;&#1593;&#1605;&#1604;1', 50, '&#1575;&#1604;&#1580;&#1606;&#1575;&#1581; &#1575;&#1604;&#1594;&#1585;&#1576;&#1609;'),
(111, 2, 2, '&#1605;&#1593;&#1605;&#1604;2', 50, '&#1575;&#1604;&#1580;&#1606;&#1575;&#1581; &#1575;&#1604;&#1580;&#1606;&#1608;&#1576;&#1609;');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `AcadYNo` varchar(200) NOT NULL,
  `TeacherNo` int(4) NOT NULL,
  `UniversityCode` int(3) NOT NULL,
  `CollegeCode` int(2) NOT NULL,
  `TeacherName` text NOT NULL,
  `Qualif` int(2) NOT NULL,
  `Status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `timeslots`
--

CREATE TABLE `timeslots` (
  `TSID` int(1) NOT NULL,
  `Slot1` varchar(5) NOT NULL,
  `Slot2` varchar(5) NOT NULL,
  `Slot3` varchar(5) NOT NULL,
  `Slot4` varchar(5) NOT NULL,
  `Slot5` varchar(5) NOT NULL,
  `Slot6` varchar(5) NOT NULL,
  `Slot7` varchar(5) NOT NULL,
  `Slot8` varchar(5) NOT NULL,
  `Slot9` varchar(5) NOT NULL,
  `Slot10` varchar(5) NOT NULL,
  `Slot11` varchar(5) NOT NULL,
  `Slot12` varchar(5) NOT NULL,
  `Slot13` varchar(5) NOT NULL,
  `Slot14` varchar(5) NOT NULL DEFAULT '0',
  `Slot15` varchar(5) NOT NULL DEFAULT '0',
  `Slot16` varchar(5) NOT NULL DEFAULT '0',
  `Slot17` varchar(5) NOT NULL DEFAULT '0',
  `Slot18` varchar(5) NOT NULL DEFAULT '0',
  `Slot19` varchar(5) NOT NULL DEFAULT '0',
  `Slot20` varchar(5) NOT NULL DEFAULT '0',
  `Slot21` varchar(5) NOT NULL DEFAULT '0',
  `Slot22` varchar(5) NOT NULL DEFAULT '0',
  `Slot23` varchar(5) NOT NULL DEFAULT '0',
  `Slot24` varchar(5) NOT NULL DEFAULT '0',
  `Slot25` varchar(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timeslots`
--

INSERT INTO `timeslots` (`TSID`, `Slot1`, `Slot2`, `Slot3`, `Slot4`, `Slot5`, `Slot6`, `Slot7`, `Slot8`, `Slot9`, `Slot10`, `Slot11`, `Slot12`, `Slot13`, `Slot14`, `Slot15`, `Slot16`, `Slot17`, `Slot18`, `Slot19`, `Slot20`, `Slot21`, `Slot22`, `Slot23`, `Slot24`, `Slot25`) VALUES
(4, '7:30', '8', '8:30', '9', '9:30', '10', '10:30', '11', '11:30', '12', '12:30', '1', '1:30', '2', '2:30', '3', '3:30', '4', '4:30', '5', '5:30', '6', '6:30', '7', '7:30');

-- --------------------------------------------------------

--
-- Table structure for table `universities`
--

CREATE TABLE `universities` (
  `UniversityCode` int(11) NOT NULL,
  `UniversityName` text NOT NULL,
  `Logo` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `universities`
--

INSERT INTO `universities` (`UniversityCode`, `UniversityName`, `Logo`) VALUES
(111, '&#1580;&#1575;&#1605;&#1593;&#1577; &#1575;&#1604;&#1587;&#1608;&#1583;&#1575;&#1606; &#1604;&#1604;&#1593;&#1604;&#1608;&#1605; &#1608;&#1575;&#1604;&#1578;&#1603;&#1606;&#1608;&#1604;&#1608;&#1580;&#1610;&#1575;', 'logo/un111.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `univloc`
--

CREATE TABLE `univloc` (
  `LocId` int(11) NOT NULL,
  `UniversityCode` int(11) NOT NULL,
  `UnLoc` varchar(800) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `univloc`
--

INSERT INTO `univloc` (`LocId`, `UniversityCode`, `UnLoc`) VALUES
(1, 111, '&#1575;&#1604;&#1580;&#1606;&#1575;&#1581; &#1575;&#1604;&#1594;&#1585;&#1576;&#1609;'),
(2, 111, '&#1575;&#1604;&#1580;&#1606;&#1575;&#1581; &#1575;&#1604;&#1580;&#1606;&#1608;&#1576;&#1609;');

-- --------------------------------------------------------

--
-- Table structure for table `usedby`
--

CREATE TABLE `usedby` (
  `AcadYNo` varchar(200) NOT NULL,
  `UniversityCode` int(11) NOT NULL,
  `CollegeCode` int(11) NOT NULL,
  `BId` int(11) NOT NULL,
  `SubBId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acaddegree`
--
ALTER TABLE `acaddegree`
  ADD PRIMARY KEY (`AcadDegreeId`);

--
-- Indexes for table `acadyear`
--
ALTER TABLE `acadyear`
  ADD UNIQUE KEY `AcadYNo` (`AcadYNo`);

--
-- Indexes for table `buildingseminar`
--
ALTER TABLE `buildingseminar`
  ADD PRIMARY KEY (`BId`),
  ADD UNIQUE KEY `BName` (`BName`);

--
-- Indexes for table `classyear`
--
ALTER TABLE `classyear`
  ADD PRIMARY KEY (`ClassNo`);

--
-- Indexes for table `colleges`
--
ALTER TABLE `colleges`
  ADD PRIMARY KEY (`CollegeCode`,`UniversityCode`),
  ADD UNIQUE KEY `UserName` (`UserName`),
  ADD KEY `UniversityCode` (`UniversityCode`);

--
-- Indexes for table `collegestarttime`
--
ALTER TABLE `collegestarttime`
  ADD PRIMARY KEY (`AcadYNo`,`CollegeCode`,`UniversityCode`,`SemNo`);

--
-- Indexes for table `collegesubject`
--
ALTER TABLE `collegesubject`
  ADD PRIMARY KEY (`AcadYNo`,`DeptNo`,`CollegeCode`,`UniversityCode`,`AcadDegreeId`,`ClassNo`,`SemNo`,`SubCode`,`SecID`),
  ADD KEY `AcadDegreeId` (`AcadDegreeId`),
  ADD KEY `DeptNo` (`DeptNo`),
  ADD KEY `CollegeCode` (`CollegeCode`),
  ADD KEY `UniversityCode` (`UniversityCode`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`DeptNo`,`CollegeCode`,`UniversityCode`,`AcadDegreeId`),
  ADD KEY `CollegeCode` (`CollegeCode`),
  ADD KEY `UniversityCode` (`UniversityCode`),
  ADD KEY `AcadDegreeId` (`AcadDegreeId`);

--
-- Indexes for table `deptandsem`
--
ALTER TABLE `deptandsem`
  ADD PRIMARY KEY (`UniversityCode`,`CollegeCode`,`DeptNo`,`AcadDegreeId`,`SemNo`,`ClassNo`,`SecID`),
  ADD KEY `AcadDegreeId` (`AcadDegreeId`),
  ADD KEY `DeptNo` (`DeptNo`),
  ADD KEY `CollegeCode` (`CollegeCode`);

--
-- Indexes for table `deptsection`
--
ALTER TABLE `deptsection`
  ADD PRIMARY KEY (`UniversityCode`,`CollegeCode`,`DeptNo`,`AcadDegreeId`,`SecID`,`ClassNo`),
  ADD KEY `DeptNo` (`DeptNo`);

--
-- Indexes for table `grouppersem`
--
ALTER TABLE `grouppersem`
  ADD PRIMARY KEY (`AcadYNo`,`UniversityCode`,`CollegeCode`,`DeptNo`,`AcadDegreeId`,`SemNo`,`ClassNo`,`GId`,`SecID`),
  ADD KEY `CollegeCode` (`CollegeCode`),
  ADD KEY `DeptNo` (`DeptNo`),
  ADD KEY `AcadDegreeId` (`AcadDegreeId`),
  ADD KEY `UniversityCode` (`UniversityCode`);

--
-- Indexes for table `loginadmin`
--
ALTER TABLE `loginadmin`
  ADD PRIMARY KEY (`UserName`),
  ADD UNIQUE KEY `UserName` (`UserName`);

--
-- Indexes for table `managinglec`
--
ALTER TABLE `managinglec`
  ADD KEY `AcadYNo` (`AcadYNo`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`SemNo`,`ClassNo`),
  ADD KEY `ClassNo` (`ClassNo`);

--
-- Indexes for table `studypersem`
--
ALTER TABLE `studypersem`
  ADD PRIMARY KEY (`AcadYNo`,`UniversityCode`,`CollegeCode`,`DeptNo`,`AcadDegreeId`,`SemNo`,`ClassNo`,`SecID`),
  ADD KEY `DeptNo` (`DeptNo`),
  ADD KEY `CollegeCode` (`CollegeCode`),
  ADD KEY `AcadDegreeId` (`AcadDegreeId`),
  ADD KEY `UniversityCode` (`UniversityCode`);

--
-- Indexes for table `subbuildingseminar`
--
ALTER TABLE `subbuildingseminar`
  ADD PRIMARY KEY (`UniversityCode`,`BId`,`SubBId`),
  ADD KEY `UniversityCode` (`UniversityCode`),
  ADD KEY `BId` (`BId`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`AcadYNo`,`TeacherNo`,`UniversityCode`,`CollegeCode`),
  ADD KEY `AcadYNo` (`AcadYNo`),
  ADD KEY `UniversityCode` (`UniversityCode`),
  ADD KEY `CollegeCode` (`CollegeCode`);

--
-- Indexes for table `timeslots`
--
ALTER TABLE `timeslots`
  ADD PRIMARY KEY (`TSID`);

--
-- Indexes for table `universities`
--
ALTER TABLE `universities`
  ADD PRIMARY KEY (`UniversityCode`);

--
-- Indexes for table `univloc`
--
ALTER TABLE `univloc`
  ADD KEY `UniversityCode` (`UniversityCode`);

--
-- Indexes for table `usedby`
--
ALTER TABLE `usedby`
  ADD PRIMARY KEY (`AcadYNo`,`UniversityCode`,`CollegeCode`,`BId`,`SubBId`),
  ADD KEY `CollegeCode` (`CollegeCode`),
  ADD KEY `UniversityCode` (`UniversityCode`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `colleges`
--
ALTER TABLE `colleges`
  ADD CONSTRAINT `colleges_ibfk_1` FOREIGN KEY (`UniversityCode`) REFERENCES `universities` (`UniversityCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `collegestarttime`
--
ALTER TABLE `collegestarttime`
  ADD CONSTRAINT `collegestarttime_ibfk_1` FOREIGN KEY (`AcadYNo`) REFERENCES `acadyear` (`AcadYNo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `departments_ibfk_2` FOREIGN KEY (`CollegeCode`) REFERENCES `colleges` (`CollegeCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `deptandsem`
--
ALTER TABLE `deptandsem`
  ADD CONSTRAINT `deptandsem_ibfk_2` FOREIGN KEY (`DeptNo`) REFERENCES `departments` (`DeptNo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `deptsection`
--
ALTER TABLE `deptsection`
  ADD CONSTRAINT `deptsection_ibfk_1` FOREIGN KEY (`DeptNo`) REFERENCES `departments` (`DeptNo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `managinglec`
--
ALTER TABLE `managinglec`
  ADD CONSTRAINT `managinglec_ibfk_1` FOREIGN KEY (`AcadYNo`) REFERENCES `acadyear` (`AcadYNo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `semester`
--
ALTER TABLE `semester`
  ADD CONSTRAINT `semester_ibfk_1` FOREIGN KEY (`ClassNo`) REFERENCES `classyear` (`ClassNo`) ON UPDATE CASCADE;

--
-- Constraints for table `studypersem`
--
ALTER TABLE `studypersem`
  ADD CONSTRAINT `studypersem_ibfk_1` FOREIGN KEY (`AcadYNo`) REFERENCES `acadyear` (`AcadYNo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `studypersem_ibfk_4` FOREIGN KEY (`DeptNo`) REFERENCES `departments` (`DeptNo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subbuildingseminar`
--
ALTER TABLE `subbuildingseminar`
  ADD CONSTRAINT `subbuildingseminar_ibfk_3` FOREIGN KEY (`UniversityCode`) REFERENCES `universities` (`UniversityCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teachers_ibfk_7` FOREIGN KEY (`AcadYNo`) REFERENCES `acadyear` (`AcadYNo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teachers_ibfk_8` FOREIGN KEY (`CollegeCode`) REFERENCES `colleges` (`CollegeCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teachers_ibfk_9` FOREIGN KEY (`UniversityCode`) REFERENCES `universities` (`UniversityCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `univloc`
--
ALTER TABLE `univloc`
  ADD CONSTRAINT `univloc_ibfk_1` FOREIGN KEY (`UniversityCode`) REFERENCES `universities` (`UniversityCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `usedby`
--
ALTER TABLE `usedby`
  ADD CONSTRAINT `usedby_ibfk_1` FOREIGN KEY (`AcadYNo`) REFERENCES `acadyear` (`AcadYNo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usedby_ibfk_2` FOREIGN KEY (`CollegeCode`) REFERENCES `colleges` (`CollegeCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usedby_ibfk_3` FOREIGN KEY (`UniversityCode`) REFERENCES `universities` (`UniversityCode`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
