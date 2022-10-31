
-- phpMyAdmin SQL Dump
-- version 2.8.1
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: July 20, 2009 at 04:41 PM
-- Server version: 5.0.22
-- PHP Version: 5.1.4
-- 
-- Database: `managetime`
-- 

-- --------------------------------------------------------
--
-- Create DataBase 
--

CREATE DATABASE managetime;

USE managetime;

-- --------------------------------------------------------
--
-- Grant Privillege on Database
--

GRANT ALL PRIVILEGES ON managetime.* 
            TO TMS@localhost
            IDENTIFIED by "TMS";

-- ---------------------------------------------------------

-- 
-- Table structure for table `acaddegree`
-- 

CREATE TABLE `acaddegree` (
  `AcadDegreeId` int(11) NOT NULL,
  `AcadDegreeName` text NOT NULL,
  `NoOfSemester` int(11) default NULL,
  `AcadProgType` int(3) NOT NULL default '1',
  PRIMARY KEY  (`AcadDegreeId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `acaddegree`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `acadyear`
-- 

CREATE TABLE `acadyear` (
  `AcadYNo` varchar(10) NOT NULL,
  UNIQUE KEY `AcadYNo` (`AcadYNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `acadyear`
-- 

INSERT INTO `acadyear` (`AcadYNo`) VALUES ('2009/2008');

-- --------------------------------------------------------

-- 
-- Table structure for table `buildingseminar`
-- 

CREATE TABLE `buildingseminar` (
  `BId` int(11) NOT NULL,
  `BName` varchar(60) NOT NULL,
  PRIMARY KEY  (`BId`),
  UNIQUE KEY `BName` (`BName`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `buildingseminar`
-- 

INSERT INTO `buildingseminar` (`BId`, `BName`) VALUES (2, 'Labaratory');
INSERT INTO `buildingseminar` (`BId`, `BName`) VALUES (1, 'Lecture Room');

-- --------------------------------------------------------

-- 
-- Table structure for table `classyear`
-- 

CREATE TABLE `classyear` (
  `ClassNo` int(11) NOT NULL,
  `ClassName` varchar(100) default NULL,
  PRIMARY KEY  (`ClassNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `classyear`
-- 

INSERT INTO `classyear` (`ClassNo`, `ClassName`) VALUES (1, '&#1575;&#1604;&#1587;&#1606;&#1577; &#1575;&#1604;&#1575;&#1608;&#1604;&#1609;');
INSERT INTO `classyear` (`ClassNo`, `ClassName`) VALUES (2, '&#1575;&#1604;&#1587;&#1606;&#1577; &#1575;&#1604;&#1579;&#1575;&#1606;&#1610;&#1577;');
INSERT INTO `classyear` (`ClassNo`, `ClassName`) VALUES (3, '&#1575;&#1604;&#1587;&#1606;&#1577; &#1575;&#1604;&#1579;&#1575;&#1604;&#1579;&#1577;');
INSERT INTO `classyear` (`ClassNo`, `ClassName`) VALUES (4, '&#1575;&#1604;&#1587;&#1606;&#1577; &#1575;&#1604;&#1585;&#1575;&#1576;&#1593;&#1577;');
INSERT INTO `classyear` (`ClassNo`, `ClassName`) VALUES (5, '&#1575;&#1604;&#1587;&#1606;&#1577; &#1575;&#1604;&#1582;&#1575;&#1605;&#1587;&#1577;');
INSERT INTO `classyear` (`ClassNo`, `ClassName`) VALUES (6, '&#1575;&#1604;&#1587;&#1606;&#1577; &#1575;&#1604;&#1587;&#1575;&#1583;&#1587;&#1577;');

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
  `UnLoc` varchar(800) NOT NULL,
  PRIMARY KEY  (`CollegeCode`,`UniversityCode`),
  UNIQUE KEY `UserName` (`UserName`),
  KEY `UniversityCode` (`UniversityCode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- RELATIONS FOR TABLE `colleges`:
--   `UniversityCode`
--       `universities` -> `UniversityCode`
-- 

-- 
-- Dumping data for table `colleges`
-- 

INSERT INTO `colleges` (`CollegeCode`, `UniversityCode`, `CollegeName`, `UserName`, `Passwd`, `UnLoc`) VALUES (1, 111, '&#1603;&#1604;&#1610;&#1577; &#1593;&#1604;&#1608;&#1605; &#1575;&#1604;&#1581;&#1575;&#1587;&#1608;&#1576;', 'cs', 'cscs', '&#1575;&#1604;&#1580;&#1606;&#1575;&#1581; &#1575;&#1604;&#1594;&#1585;&#1576;&#1609;');
INSERT INTO `colleges` (`CollegeCode`, `UniversityCode`, `CollegeName`, `UserName`, `Passwd`, `UnLoc`) VALUES (2, 111, '&#1603;&#1604;&#1610;&#1577; &#1575;&#1604;&#1607;&#1606;&#1583;&#1587;&#1577;', 'eng', 'engeng', '&#1575;&#1604;&#1580;&#1606;&#1575;&#1581; &#1575;&#1604;&#1580;&#1606;&#1608;&#1576;&#1609;');

-- --------------------------------------------------------

-- 
-- Table structure for table `collegestarttime`
-- 

CREATE TABLE `collegestarttime` (
  `AcadYNo` varchar(10) NOT NULL,
  `CollegeCode` int(11) NOT NULL,
  `UniversityCode` int(11) NOT NULL,
  `SemNo` int(11) NOT NULL,
  `TSID` int(1) NOT NULL,
  PRIMARY KEY  (`AcadYNo`,`CollegeCode`,`UniversityCode`,`SemNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- RELATIONS FOR TABLE `collegestarttime`:
--   `AcadYNo`
--       `acadyear` -> `AcadYNo`
-- 

-- 
-- Dumping data for table `collegestarttime`
-- 


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
  `SubType` int(11) NOT NULL,
  PRIMARY KEY  (`AcadYNo`,`DeptNo`,`CollegeCode`,`UniversityCode`,`AcadDegreeId`,`ClassNo`,`SemNo`,`SubCode`,`SecID`),
  KEY `AcadDegreeId` (`AcadDegreeId`),
  KEY `DeptNo` (`DeptNo`),
  KEY `CollegeCode` (`CollegeCode`),
  KEY `UniversityCode` (`UniversityCode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `collegesubject`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `departments`
-- 

CREATE TABLE `departments` (
  `DeptNo` int(11) NOT NULL,
  `CollegeCode` int(11) NOT NULL,
  `UniversityCode` int(11) NOT NULL,
  `AcadDegreeId` int(11) NOT NULL,
  `DeptName` text NOT NULL,
  PRIMARY KEY  (`DeptNo`,`CollegeCode`,`UniversityCode`,`AcadDegreeId`),
  KEY `CollegeCode` (`CollegeCode`),
  KEY `UniversityCode` (`UniversityCode`),
  KEY `AcadDegreeId` (`AcadDegreeId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- RELATIONS FOR TABLE `departments`:
--   `CollegeCode`
--       `colleges` -> `CollegeCode`
-- 

-- 
-- Dumping data for table `departments`
-- 


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
  `SecID` int(2) NOT NULL,
  PRIMARY KEY  (`UniversityCode`,`CollegeCode`,`DeptNo`,`AcadDegreeId`,`SemNo`,`ClassNo`,`SecID`),
  KEY `AcadDegreeId` (`AcadDegreeId`),
  KEY `DeptNo` (`DeptNo`),
  KEY `CollegeCode` (`CollegeCode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- RELATIONS FOR TABLE `deptandsem`:
--   `DeptNo`
--       `departments` -> `DeptNo`
-- 

-- 
-- Dumping data for table `deptandsem`
-- 


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
  `SecName` text NOT NULL,
  PRIMARY KEY  (`UniversityCode`,`CollegeCode`,`DeptNo`,`AcadDegreeId`,`SecID`,`ClassNo`),
  KEY `DeptNo` (`DeptNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- RELATIONS FOR TABLE `deptsection`:
--   `DeptNo`
--       `departments` -> `DeptNo`
-- 

-- 
-- Dumping data for table `deptsection`
-- 


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
  `GName` varchar(200) NOT NULL,
  PRIMARY KEY  (`AcadYNo`,`UniversityCode`,`CollegeCode`,`DeptNo`,`AcadDegreeId`,`SemNo`,`ClassNo`,`GId`,`SecID`),
  KEY `CollegeCode` (`CollegeCode`),
  KEY `DeptNo` (`DeptNo`),
  KEY `AcadDegreeId` (`AcadDegreeId`),
  KEY `UniversityCode` (`UniversityCode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `grouppersem`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `loginadmin`
-- 

CREATE TABLE `loginadmin` (
  `UserName` varchar(16) NOT NULL,
  `Passwd` varchar(40) default NULL,
  PRIMARY KEY  (`UserName`),
  UNIQUE KEY `UserName` (`UserName`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `loginadmin`
-- 

INSERT INTO `loginadmin` (`UserName`, `Passwd`) VALUES ('manager', 'manager');

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
  `TeacherId` int(11) NOT NULL,
  KEY `AcadYNo` (`AcadYNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- RELATIONS FOR TABLE `managinglec`:
--   `AcadYNo`
--       `acadyear` -> `AcadYNo`
-- 

-- 
-- Dumping data for table `managinglec`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `semester`
-- 

CREATE TABLE `semester` (
  `SemNo` int(11) NOT NULL,
  `ClassNo` int(11) NOT NULL,
  `SemName` varchar(400) NOT NULL,
  PRIMARY KEY  (`SemNo`,`ClassNo`),
  KEY `ClassNo` (`ClassNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- RELATIONS FOR TABLE `semester`:
--   `ClassNo`
--       `classyear` -> `ClassNo`
-- 

-- 
-- Dumping data for table `semester`
-- 

INSERT INTO `semester` (`SemNo`, `ClassNo`, `SemName`) VALUES (1, 1, '&#1575;&#1604;&#1601;&#1589;&#1604; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609; &#1575;&#1604;&#1575;&#1608;&#1604;');
INSERT INTO `semester` (`SemNo`, `ClassNo`, `SemName`) VALUES (1, 2, '&#1575;&#1604;&#1601;&#1589;&#1604; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609; &#1575;&#1604;&#1575;&#1608;&#1604;');
INSERT INTO `semester` (`SemNo`, `ClassNo`, `SemName`) VALUES (1, 3, '&#1575;&#1604;&#1601;&#1589;&#1604; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609; &#1575;&#1604;&#1575;&#1608;&#1604;');
INSERT INTO `semester` (`SemNo`, `ClassNo`, `SemName`) VALUES (1, 4, '&#1575;&#1604;&#1601;&#1589;&#1604; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609; &#1575;&#1604;&#1575;&#1608;&#1604;');
INSERT INTO `semester` (`SemNo`, `ClassNo`, `SemName`) VALUES (1, 5, '&#1575;&#1604;&#1601;&#1589;&#1604; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609; &#1575;&#1604;&#1575;&#1608;&#1604;');
INSERT INTO `semester` (`SemNo`, `ClassNo`, `SemName`) VALUES (1, 6, '&#1575;&#1604;&#1601;&#1589;&#1604; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609; &#1575;&#1604;&#1575;&#1608;&#1604;');
INSERT INTO `semester` (`SemNo`, `ClassNo`, `SemName`) VALUES (2, 1, '&#1575;&#1604;&#1601;&#1589;&#1604; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609; &#1575;&#1604;&#1579;&#1575;&#1606;&#1609;');
INSERT INTO `semester` (`SemNo`, `ClassNo`, `SemName`) VALUES (2, 2, '&#1575;&#1604;&#1601;&#1589;&#1604; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609; &#1575;&#1604;&#1579;&#1575;&#1606;&#1609;');
INSERT INTO `semester` (`SemNo`, `ClassNo`, `SemName`) VALUES (2, 3, '&#1575;&#1604;&#1601;&#1589;&#1604; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609; &#1575;&#1604;&#1579;&#1575;&#1606;&#1609;');
INSERT INTO `semester` (`SemNo`, `ClassNo`, `SemName`) VALUES (2, 4, '&#1575;&#1604;&#1601;&#1589;&#1604; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609; &#1575;&#1604;&#1579;&#1575;&#1606;&#1609;');
INSERT INTO `semester` (`SemNo`, `ClassNo`, `SemName`) VALUES (2, 5, '&#1575;&#1604;&#1601;&#1589;&#1604; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609; &#1575;&#1604;&#1579;&#1575;&#1606;&#1609;');
INSERT INTO `semester` (`SemNo`, `ClassNo`, `SemName`) VALUES (2, 6, '&#1575;&#1604;&#1601;&#1589;&#1604; &#1575;&#1604;&#1583;&#1585;&#1575;&#1587;&#1609; &#1575;&#1604;&#1579;&#1575;&#1606;&#1609;');

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
  `NoOfGroup` int(11) NOT NULL,
  PRIMARY KEY  (`AcadYNo`,`UniversityCode`,`CollegeCode`,`DeptNo`,`AcadDegreeId`,`SemNo`,`ClassNo`,`SecID`),
  KEY `DeptNo` (`DeptNo`),
  KEY `CollegeCode` (`CollegeCode`),
  KEY `AcadDegreeId` (`AcadDegreeId`),
  KEY `UniversityCode` (`UniversityCode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- RELATIONS FOR TABLE `studypersem`:
--   `AcadYNo`
--       `acadyear` -> `AcadYNo`
--   `DeptNo`
--       `departments` -> `DeptNo`
-- 

-- 
-- Dumping data for table `studypersem`
-- 


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
  `UnLoc` varchar(800) NOT NULL,
  PRIMARY KEY  (`UniversityCode`,`BId`,`SubBId`),
  KEY `UniversityCode` (`UniversityCode`),
  KEY `BId` (`BId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- RELATIONS FOR TABLE `subbuildingseminar`:
--   `UniversityCode`
--       `universities` -> `UniversityCode`
-- 

-- 
-- Dumping data for table `subbuildingseminar`
-- 

INSERT INTO `subbuildingseminar` (`UniversityCode`, `BId`, `SubBId`, `SubBName`, `Capacity`, `UnLoc`) VALUES (111, 1, 1, '&#1575;&#1604;&#1602;&#1575;&#1593;&#1577;1', 500, '&#1575;&#1604;&#1580;&#1606;&#1575;&#1581; &#1575;&#1604;&#1594;&#1585;&#1576;&#1609;');
INSERT INTO `subbuildingseminar` (`UniversityCode`, `BId`, `SubBId`, `SubBName`, `Capacity`, `UnLoc`) VALUES (111, 1, 2, '&#1575;&#1604;&#1602;&#1575;&#1593;&#1577;4', 1000, '&#1575;&#1604;&#1580;&#1606;&#1575;&#1581; &#1575;&#1604;&#1580;&#1606;&#1608;&#1576;&#1609;');
INSERT INTO `subbuildingseminar` (`UniversityCode`, `BId`, `SubBId`, `SubBName`, `Capacity`, `UnLoc`) VALUES (111, 2, 1, '&#1605;&#1593;&#1605;&#1604;1', 50, '&#1575;&#1604;&#1580;&#1606;&#1575;&#1581; &#1575;&#1604;&#1594;&#1585;&#1576;&#1609;');
INSERT INTO `subbuildingseminar` (`UniversityCode`, `BId`, `SubBId`, `SubBName`, `Capacity`, `UnLoc`) VALUES (111, 2, 2, '&#1605;&#1593;&#1605;&#1604;2', 50, '&#1575;&#1604;&#1580;&#1606;&#1575;&#1581; &#1575;&#1604;&#1580;&#1606;&#1608;&#1576;&#1609;');

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
  `Status` int(1) NOT NULL,
  PRIMARY KEY  (`AcadYNo`,`TeacherNo`,`UniversityCode`,`CollegeCode`),
  KEY `AcadYNo` (`AcadYNo`),
  KEY `UniversityCode` (`UniversityCode`),
  KEY `CollegeCode` (`CollegeCode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- RELATIONS FOR TABLE `teachers`:
--   `AcadYNo`
--       `acadyear` -> `AcadYNo`
--   `CollegeCode`
--       `colleges` -> `CollegeCode`
--   `UniversityCode`
--       `universities` -> `UniversityCode`
-- 

-- 
-- Dumping data for table `teachers`
-- 


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
  `Slot14` varchar(5) NOT NULL default '0',
  `Slot15` varchar(5) NOT NULL default '0',
  `Slot16` varchar(5) NOT NULL default '0',
  `Slot17` varchar(5) NOT NULL default '0',
  `Slot18` varchar(5) NOT NULL default '0',
  `Slot19` varchar(5) NOT NULL default '0',
  `Slot20` varchar(5) NOT NULL default '0',
  `Slot21` varchar(5) NOT NULL default '0',
  `Slot22` varchar(5) NOT NULL default '0',
  `Slot23` varchar(5) NOT NULL default '0',
  `Slot24` varchar(5) NOT NULL default '0',
  `Slot25` varchar(5) NOT NULL default '0',
  PRIMARY KEY  (`TSID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `timeslots`
-- 

INSERT INTO `timeslots` (`TSID`, `Slot1`, `Slot2`, `Slot3`, `Slot4`, `Slot5`, `Slot6`, `Slot7`, `Slot8`, `Slot9`, `Slot10`, `Slot11`, `Slot12`, `Slot13`, `Slot14`, `Slot15`, `Slot16`, `Slot17`, `Slot18`, `Slot19`, `Slot20`, `Slot21`, `Slot22`, `Slot23`, `Slot24`, `Slot25`) VALUES (4, '7:30', '8', '8:30', '9', '9:30', '10', '10:30', '11', '11:30', '12', '12:30', '1', '1:30', '2', '2:30', '3', '3:30', '4', '4:30', '5', '5:30', '6', '6:30', '7', '7:30');

-- --------------------------------------------------------

-- 
-- Table structure for table `universities`
-- 

CREATE TABLE `universities` (
  `UniversityCode` int(11) NOT NULL,
  `UniversityName` text NOT NULL,
  `Logo` varchar(80) NOT NULL,
  PRIMARY KEY  (`UniversityCode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `universities`
-- 

INSERT INTO `universities` (`UniversityCode`, `UniversityName`, `Logo`) VALUES (111, '&#1580;&#1575;&#1605;&#1593;&#1577; &#1575;&#1604;&#1587;&#1608;&#1583;&#1575;&#1606; &#1604;&#1604;&#1593;&#1604;&#1608;&#1605; &#1608;&#1575;&#1604;&#1578;&#1603;&#1606;&#1608;&#1604;&#1608;&#1580;&#1610;&#1575;', 'logo/un111.jpg');

-- --------------------------------------------------------

-- 
-- Table structure for table `univloc`
-- 

CREATE TABLE `univloc` (
  `LocId` int(11) NOT NULL,
  `UniversityCode` int(11) NOT NULL,
  `UnLoc` varchar(800) NOT NULL,
  KEY `UniversityCode` (`UniversityCode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- RELATIONS FOR TABLE `univloc`:
--   `UniversityCode`
--       `universities` -> `UniversityCode`
-- 

-- 
-- Dumping data for table `univloc`
-- 

INSERT INTO `univloc` (`LocId`, `UniversityCode`, `UnLoc`) VALUES (1, 111, '&#1575;&#1604;&#1580;&#1606;&#1575;&#1581; &#1575;&#1604;&#1594;&#1585;&#1576;&#1609;');
INSERT INTO `univloc` (`LocId`, `UniversityCode`, `UnLoc`) VALUES (2, 111, '&#1575;&#1604;&#1580;&#1606;&#1575;&#1581; &#1575;&#1604;&#1580;&#1606;&#1608;&#1576;&#1609;');

-- --------------------------------------------------------

-- 
-- Table structure for table `usedby`
-- 

CREATE TABLE `usedby` (
  `AcadYNo` varchar(200) NOT NULL,
  `UniversityCode` int(11) NOT NULL,
  `CollegeCode` int(11) NOT NULL,
  `BId` int(11) NOT NULL,
  `SubBId` int(11) NOT NULL,
  PRIMARY KEY  (`AcadYNo`,`UniversityCode`,`CollegeCode`,`BId`,`SubBId`),
  KEY `CollegeCode` (`CollegeCode`),
  KEY `UniversityCode` (`UniversityCode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- RELATIONS FOR TABLE `usedby`:
--   `AcadYNo`
--       `acadyear` -> `AcadYNo`
--   `CollegeCode`
--       `colleges` -> `CollegeCode`
--   `UniversityCode`
--       `universities` -> `UniversityCode`
-- 

-- 
-- Dumping data for table `usedby`
-- 


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
