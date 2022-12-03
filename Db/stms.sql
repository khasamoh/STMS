-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2021 at 11:17 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stms`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_class`
--

CREATE TABLE `tbl_class` (
  `ClassID` int(11) NOT NULL,
  `ClassName` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_class`
--

INSERT INTO `tbl_class` (`ClassID`, `ClassName`) VALUES
(1, 'FI'),
(2, 'FII'),
(3, 'FIII'),
(4, 'FIV'),
(5, 'STD I'),
(6, 'STD II'),
(7, 'STD III'),
(8, 'STD IV'),
(9, 'STD V'),
(10, 'STD VI');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_school`
--

CREATE TABLE `tbl_school` (
  `SchlID` int(11) NOT NULL,
  `SchlCode` varchar(50) DEFAULT NULL,
  `SchlName` varchar(100) NOT NULL,
  `Region` varchar(50) NOT NULL,
  `District` varchar(50) NOT NULL,
  `CtgName` varchar(20) NOT NULL,
  `CtgState` varchar(20) DEFAULT NULL,
  `SchlUserID` int(11) DEFAULT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_school`
--

INSERT INTO `tbl_school` (`SchlID`, `SchlCode`, `SchlName`, `Region`, `District`, `CtgName`, `CtgState`, `SchlUserID`, `UserID`) VALUES
(3, 'S0034/707', 'KIANGA SEC. SCHOOL', 'Urbun-West Unguja', 'Jangombe', 'Government', 'Secondary', 2, 1),
(4, 'S304/56', 'REGEZAMWENDO SEC SCHOOL', 'Urbun-West Unguja', 'Mwera', 'Government', 'Secondary', 3, 1),
(5, 'S0094/0056', 'KIBWENI PRI. SCHOOL', 'South Unguja', 'Magomeni', 'Private', 'Primary', 5, 1),
(7, 'S0034/7077', 'AMANI SEC. SCHOOL', 'Urbun-West Unguja', 'Amani', 'Government', 'Secondary', 4, 1),
(8, 'PRV78/098', 'TRIFONIA ACADEMY', 'South Unguja', 'Chake', 'Private', 'Both', 6, 1),
(12, 'S066/9', 'JADIDA SEC. SCHOOL', 'North Pemba', 'Wete', 'Government', 'Secondary', 0, 1),
(13, 'S009/67', 'SOS', 'Urbun-West Unguja', 'Magomeni', 'Private', 'Both', 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sch_tch`
--

CREATE TABLE `tbl_sch_tch` (
  `SchTchID` int(11) NOT NULL,
  `TchID` int(11) NOT NULL,
  `SchlID` int(11) NOT NULL,
  `ReportDate` date DEFAULT NULL,
  `Status` varchar(20) DEFAULT NULL,
  `Coment` varchar(100) DEFAULT NULL,
  `SubjectID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_sch_tch`
--

INSERT INTO `tbl_sch_tch` (`SchTchID`, `TchID`, `SchlID`, `ReportDate`, `Status`, `Coment`, `SubjectID`) VALUES
(2, 2, 3, '2021-06-30', 'Approved', 'jk', 4),
(4, 1, 3, '2021-06-22', 'Null', 'Null', 1),
(5, 8, 13, '2021-06-16', 'Approved', 'Null', 1),
(6, 9, 13, '2021-06-16', 'Approved', 'Null', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sch_year`
--

CREATE TABLE `tbl_sch_year` (
  `SchYrID` int(11) NOT NULL,
  `SchYear` int(7) NOT NULL,
  `Coment` varchar(100) DEFAULT NULL,
  `SchlID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_sch_year`
--

INSERT INTO `tbl_sch_year` (`SchYrID`, `SchYear`, `Coment`, `SchlID`) VALUES
(4, 2021, 'No Coments', 8),
(5, 2021, 'No Coments', 3),
(6, 2021, 'No Coments', 13);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subject`
--

CREATE TABLE `tbl_subject` (
  `SubjectID` int(11) NOT NULL,
  `SubjectCode` varchar(30) NOT NULL,
  `SubjectName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_subject`
--

INSERT INTO `tbl_subject` (`SubjectID`, `SubjectCode`, `SubjectName`) VALUES
(1, 'None', 'None'),
(2, 'GEO', 'GEOGRAPH'),
(3, 'ENG', 'ENGLISH'),
(4, 'HST', 'HISTORY'),
(5, 'CHEM', 'CHEMISTRY'),
(6, 'CVC', 'CIVICS'),
(7, 'SSDY', 'SOCIAL STUDY');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tch_education`
--

CREATE TABLE `tbl_tch_education` (
  `EduID` int(11) NOT NULL,
  `EduLevel` varchar(20) NOT NULL,
  `EduTitle` varchar(100) NOT NULL,
  `EduYear` int(7) DEFAULT NULL,
  `Certificate` varchar(100) DEFAULT NULL,
  `EduCategory` varchar(15) DEFAULT NULL,
  `TchID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_tch_education`
--

INSERT INTO `tbl_tch_education` (`EduID`, `EduLevel`, `EduTitle`, `EduYear`, `Certificate`, `EduCategory`, `TchID`) VALUES
(1, 'Degree', 'Mathematic in Computing', 1989, 'Certificate_name', 'SCIENCE', 1),
(2, 'Master', 'Computer Science', 2005, 'Images/1623259754_', 'SCIENCE', 2),
(3, 'Master', 'Kiswahili And English', 2003, 'CertificateName', 'ART', 3),
(4, 'Master', 'Networking', 1999, 'CertificateName', 'SCIENCE', 4),
(5, 'Master', 'Chemistry in Computing', 2000, 'CertificateName', 'SCIENCE', 5),
(6, 'Master', 'Computer Science', 2000, 'CertificateName', 'SCIENCE', 6),
(8, 'Diploma', 'Computer Science', 1999, 'CertificateName', 'SCIENCE', 9);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_teacher`
--

CREATE TABLE `tbl_teacher` (
  `TchID` int(11) NOT NULL,
  `EmpNo` varchar(50) NOT NULL,
  `FName` varchar(50) NOT NULL,
  `LName` varchar(100) DEFAULT NULL,
  `Gender` varchar(7) DEFAULT NULL,
  `Address` varchar(50) DEFAULT NULL,
  `Dob` date DEFAULT NULL,
  `Image` varchar(100) DEFAULT NULL,
  `Phone` varchar(50) NOT NULL,
  `Email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_teacher`
--

INSERT INTO `tbl_teacher` (`TchID`, `EmpNo`, `FName`, `LName`, `Gender`, `Address`, `Dob`, `Image`, `Phone`, `Email`) VALUES
(1, 'TEH9/007', 'Omar', 'Haji', 'Male', 'Fuoni', '1982-06-02', 'image_name', '0778656567', 'omar.4@gmail.com'),
(2, 'TEH9/984', 'Akram', 'Mohd', 'Male', 'Amani', '1983-01-10', 'Images/1623259754_', '0779878765', 'akram.12@gmail.com'),
(3, 'TEH9/98488', 'Habil', 'Juma', 'Male', 'Kimara', '1990-06-13', 'ImageName', '0779878765', 'Habil.12@gmail.com'),
(4, 'TEH978/17', 'Raya', 'Idrissa', 'Female', 'Chukwani', '1986-05-21', 'ImageName', '0778656567', 'raya.4@gmail.com'),
(5, 'TEH978/1790', 'Backari', 'Hamad', 'Male', 'Mwera', '2021-06-20', 'ImageName', '0778656567', 'raya.4@gmail.com'),
(6, 'TEH9/984k', 'Haruon', 'Juma', 'Male', 'Mwera', '2011-06-07', 'ImageName', '0779878765', 'haroun.12@gmail.com'),
(8, 'TEH9h/984', 'HaItham', 'Juma', 'Male', 'Kimara', '2013-05-21', 'ImageName', '0779878765', 'Habil.12@gmail.com'),
(9, 'TEH92/9847', 'Masoud', 'Ali', 'Male', 'amani', '2020-01-13', 'ImageName', '0779878765', 'masoud.12@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `UserID` int(11) NOT NULL,
  `FName` varchar(50) NOT NULL,
  `LName` varchar(100) DEFAULT NULL,
  `Gender` varchar(100) DEFAULT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Phone` varchar(50) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Privilage` varchar(50) NOT NULL,
  `Status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`UserID`, `FName`, `LName`, `Gender`, `Address`, `Email`, `Phone`, `UserName`, `Password`, `Privilage`, `Status`) VALUES
(1, 'Khamis', 'Mohd', 'Male', 'Mwera', 'khasamoh.12@gmail.com', '0773274743', 'Admin', '202cb962ac59075b964b07152d234b70', 'Administrator', 'Active'),
(2, 'Haroun', 'Manzi', 'Male', 'Mwera', 'Haroun.10@gmail.com', '0773274743', 'sadmin', '202cb962ac59075b964b07152d234b70', 'School', 'Active'),
(3, 'Habil', 'Juma', 'Male', 'Kimara', 'Habil.12@gmail.com', '0779878765', 'Dhabil', '202cb962ac59075b964b07152d234b70', 'School', 'Deactive'),
(4, 'Othman', 'Juma', 'Male', 'Kimara', 'Habil.12@gmail.com', '0779878765', 'd', '202cb962ac59075b964b07152d234b70', 'School', 'Active'),
(5, 'Hamad', 'Juma', 'Male', 'Jumbi', 'Habil.12@gmail.com', '0779878765', 'tr', '202cb962ac59075b964b07152d234b70', 'School', 'Active'),
(7, 'Akram', 'Mohd', 'Male', 'Amani', 'akram.12@gmail.com', '0779878765', 'Ak', '202cb962ac59075b964b07152d234b70', 'Administrator', 'Active'),
(8, 'SOS User', '...', 'Male', '....', 'ali.4@gmail.com', '...', 'SOS', '81dc9bdb52d04dc20036dbd8313ed055', 'School', 'Active'),
(9, 'AbuuBakar', 'Juma', 'Male', 'Kimara', 'Habil.12@gmail.com', '0779878765', 'ab', '202cb962ac59075b964b07152d234b70', 'Director', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_yearclass`
--

CREATE TABLE `tbl_yearclass` (
  `YryClassID` int(11) NOT NULL,
  `TotalStudent` int(7) NOT NULL,
  `SchYrID` int(11) NOT NULL,
  `ClassID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_yearclass`
--

INSERT INTO `tbl_yearclass` (`YryClassID`, `TotalStudent`, `SchYrID`, `ClassID`) VALUES
(4, 78, 4, 5),
(5, 90, 4, 6),
(6, 123, 4, 3),
(7, 97, 5, 1),
(8, 105, 5, 3),
(9, 56, 6, 6),
(10, 78, 6, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_class`
--
ALTER TABLE `tbl_class`
  ADD PRIMARY KEY (`ClassID`);

--
-- Indexes for table `tbl_school`
--
ALTER TABLE `tbl_school`
  ADD PRIMARY KEY (`SchlID`),
  ADD UNIQUE KEY `SchlCode` (`SchlCode`),
  ADD KEY `fk2` (`UserID`);

--
-- Indexes for table `tbl_sch_tch`
--
ALTER TABLE `tbl_sch_tch`
  ADD PRIMARY KEY (`SchTchID`),
  ADD KEY `fk9` (`SubjectID`),
  ADD KEY `fk4` (`TchID`),
  ADD KEY `fk5` (`SchlID`);

--
-- Indexes for table `tbl_sch_year`
--
ALTER TABLE `tbl_sch_year`
  ADD PRIMARY KEY (`SchYrID`),
  ADD KEY `fk6` (`SchlID`);

--
-- Indexes for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  ADD PRIMARY KEY (`SubjectID`);

--
-- Indexes for table `tbl_tch_education`
--
ALTER TABLE `tbl_tch_education`
  ADD PRIMARY KEY (`EduID`),
  ADD KEY `fk3` (`TchID`);

--
-- Indexes for table `tbl_teacher`
--
ALTER TABLE `tbl_teacher`
  ADD PRIMARY KEY (`TchID`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `tbl_yearclass`
--
ALTER TABLE `tbl_yearclass`
  ADD PRIMARY KEY (`YryClassID`),
  ADD KEY `fk7` (`SchYrID`),
  ADD KEY `fk8` (`ClassID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_class`
--
ALTER TABLE `tbl_class`
  MODIFY `ClassID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_school`
--
ALTER TABLE `tbl_school`
  MODIFY `SchlID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_sch_tch`
--
ALTER TABLE `tbl_sch_tch`
  MODIFY `SchTchID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_sch_year`
--
ALTER TABLE `tbl_sch_year`
  MODIFY `SchYrID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  MODIFY `SubjectID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_tch_education`
--
ALTER TABLE `tbl_tch_education`
  MODIFY `EduID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_teacher`
--
ALTER TABLE `tbl_teacher`
  MODIFY `TchID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_yearclass`
--
ALTER TABLE `tbl_yearclass`
  MODIFY `YryClassID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_school`
--
ALTER TABLE `tbl_school`
  ADD CONSTRAINT `fk2` FOREIGN KEY (`UserID`) REFERENCES `tbl_user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_sch_tch`
--
ALTER TABLE `tbl_sch_tch`
  ADD CONSTRAINT `fk4` FOREIGN KEY (`TchID`) REFERENCES `tbl_teacher` (`TchID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk5` FOREIGN KEY (`SchlID`) REFERENCES `tbl_school` (`SchlID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk9` FOREIGN KEY (`SubjectID`) REFERENCES `tbl_subject` (`SubjectID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_sch_year`
--
ALTER TABLE `tbl_sch_year`
  ADD CONSTRAINT `fk6` FOREIGN KEY (`SchlID`) REFERENCES `tbl_school` (`SchlID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_tch_education`
--
ALTER TABLE `tbl_tch_education`
  ADD CONSTRAINT `fk3` FOREIGN KEY (`TchID`) REFERENCES `tbl_teacher` (`TchID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_yearclass`
--
ALTER TABLE `tbl_yearclass`
  ADD CONSTRAINT `fk7` FOREIGN KEY (`SchYrID`) REFERENCES `tbl_sch_year` (`SchYrID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk8` FOREIGN KEY (`ClassID`) REFERENCES `tbl_class` (`ClassID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
