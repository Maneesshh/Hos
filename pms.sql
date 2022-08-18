-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2021 at 08:49 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` int(11) NOT NULL,
  `aname` varchar(25) NOT NULL,
  `aemail` varchar(35) NOT NULL,
  `apassword` varchar(35) NOT NULL,
  `aphone` varchar(10) NOT NULL,
  `aaddress` varchar(40) NOT NULL,
  `aimage` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `aname`, `aemail`, `apassword`, `aphone`, `aaddress`, `aimage`) VALUES
(1, 'Dipesh gupta', 'dipesh@admin.com', '5e8667a439c68f5145dd2fcbecf02209', '9862775533', 'MechiNagar 15', 'images/staff/dipesh@admin.com.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `app-ID` int(11) NOT NULL,
  `did` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `problem` varchar(1024) NOT NULL,
  `report` varchar(300) DEFAULT NULL,
  `date` varchar(10) NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL DEFAULT 0 COMMENT '0->default\r\n1->checked\r\n2->cancelled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`app-ID`, `did`, `pid`, `problem`, `report`, `date`, `status`) VALUES
(2, 1, 90, '', NULL, '2021-05-17', 2),
(5, 4, 89, '', NULL, '2021-05-17', 0),
(6, 5, 89, '', NULL, '2021-05-17', 0),
(7, 6, 89, '', NULL, '2021-05-17', 0),
(8, 4, 90, 'random attack', 'images/report/prashantbhandari@gmail.com/prashantbhandari@gmail.com_20210517Mon0410PM.png', '2021-05-17', 1),
(9, 5, 90, '', NULL, '2021-05-17', 0),
(10, 6, 90, '', NULL, '2021-05-11', 0),
(14, 2, 89, 'fever', 'images/report/kabish@gmail.com/kabish@gmail.com_20210517Mon0408PM.jpeg', '2021-05-17', 1),
(15, 3, 91, 'Mild headache with slight abdominal pain.', 'images/report/dianasingha@gmail.com/dianasingha@gmail.com_20210826Thu0655PM.jpeg', '2021-05-17', 1),
(17, 1, 92, 'test', 'images/report/rabinadhikari@gmail.com/rabinadhikari@gmail.com_20210825Wed1150AM.png', '2021-05-17', 1),
(18, 3, 90, 'salfkjl', 'images/report/prashantbhandari@gmail.com/prashantbhandari@gmail.com_20210826Thu0655PM.jpeg', '2021-05-17', 1),
(19, 1, 89, '', NULL, '2021-05-17', 0),
(20, 3, 89, 'This is a test', 'images/report/kabish@gmail.com/kabish@gmail.com_20210826Thu0657PM.jpeg', '2021-05-17', 1),
(21, 1, 74, 'tonsil', 'images/report/kuberacharya@gmail.com/kuberacharya@gmail.com_20210517Mon0408PM.png', '2021-05-17', 1),
(22, 4, 74, 'testdata', 'images/report/kuberacharya@gmail.com/kuberacharya@gmail.com_20210517Mon0410PM.jpeg', '2021-05-18', 1),
(23, 5, 74, '', NULL, '2021-05-17', 2),
(24, 3, 74, '', NULL, '2021-05-17', 0),
(25, 6, 93, 'Mild health issue', 'images/report/sauravadhikari@gmail.com/sauravadhikari@gmail.com_20210819Thu0916AM.png', '2021-08-19', 1),
(26, 2, 89, '', NULL, '2021-08-26', 0);

-- --------------------------------------------------------

--
-- Table structure for table `contactquery`
--

CREATE TABLE `contactquery` (
  `cid` int(11) NOT NULL,
  `cname` varchar(20) NOT NULL,
  `cemail` varchar(20) NOT NULL,
  `cmessage` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `did` int(11) NOT NULL,
  `dname` varchar(25) NOT NULL,
  `demail` varchar(35) NOT NULL,
  `dpassword` varchar(35) NOT NULL,
  `dphone` varchar(10) NOT NULL,
  `dspeciality` varchar(20) NOT NULL,
  `ddescription` varchar(1024) NOT NULL,
  `daddress` varchar(40) NOT NULL,
  `dimage` varchar(1024) NOT NULL,
  `dstatus` int(1) NOT NULL DEFAULT 1 COMMENT '0->Unavailable & 1->Available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`did`, `dname`, `demail`, `dpassword`, `dphone`, `dspeciality`, `ddescription`, `daddress`, `dimage`, `dstatus`) VALUES
(1, 'Manish Bhattarai', 'manishbhattarai@doctor.com', '25d55ad283aa400af464c76d713c07ad', '1234567890', 'Cardiologist', 'Doctor Manish is a very well known cardiologist. He has done is graduation from AIMS college.', 'Bhadrapur', 'images/staff/manishbhattarai@doctor.com.jpeg', 1),
(2, 'Sushant Ghimire', 'sushantghimire@doctor.com', '25d55ad283aa400af464c76d713c07ad', '1234567890', 'Psychologist ', 'Dr Sushant is an excellent psychological therapist. He has treated several people without any damage done', 'Kakarvitta', 'images/staff/sushantghimire@doctor.com.jpeg', 1),
(3, 'Rohit Raut', 'rohitraut@doctor.com', '25d55ad283aa400af464c76d713c07ad', '1234567890', 'Neurologist', 'Dr Rohit is the one and only Neurologist of jhapa. ', 'Damak', 'images/staff/rohitraut@doctor.com.jpeg', 1),
(4, 'Manoj Sitoula', 'manojsitoula@doctor.com', '25d55ad283aa400af464c76d713c07ad', '1234567890', 'Optician ', 'Dr Manoj 20 year of experience in the field of eyes and Optics.', 'Birtamod', 'images/staff/manojsitoula@doctor.com.jpeg', 1),
(5, 'Nischal Adhkari', 'nischaladhikari@doctor.com', '25d55ad283aa400af464c76d713c07ad', '1234567890', 'Gynaecologist ', 'There is nothing much to say about him. An evergreen \r\nfrustrated nibba.', 'Bhadrapur', 'images/staff/nischaladhikari@doctor.com.jpeg', 1),
(6, 'Pawan Dhamala', 'pawandhamala@doctor.com', '25d55ad283aa400af464c76d713c07ad', '1234567890', 'Surgeon ', 'Dr Dhamala is the most respected and senior doctor of our hospital. He is the pride of our hospital.', 'Bhadrapur', 'images/staff/pawandhamala@doctor.com.jpeg', 1),
(17, 'ABC', 'testdoctor@doctor.com', '25d55ad283aa400af464c76d713c07ad', '0987654321', 'Testing ', 'This is a doctor for testing purpose.', 'TestTing', 'images/staff/testdoctor@doctor.com.jpeg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `lid` int(11) NOT NULL,
  `aid` int(11) DEFAULT NULL,
  `did` int(11) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `loginTime` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`lid`, `aid`, `did`, `pid`, `loginTime`) VALUES
(239, 1, NULL, NULL, '2021/08/28 Sat 09:48 AM'),
(240, NULL, 1, NULL, '2021/08/28 Sat 10:59 AM'),
(241, NULL, NULL, 92, '2021/08/28 Sat 11:01 AM'),
(242, 1, NULL, NULL, '2021/09/02 Thu 11:08 AM'),
(243, NULL, NULL, 92, '2021/09/04 Sat 10:35 AM'),
(244, 1, NULL, NULL, '2021/09/04 Sat 10:37 AM'),
(245, 1, NULL, NULL, '2021/09/05 Sun 12:07 PM'),
(246, NULL, 1, NULL, '2021/09/05 Sun 12:07 PM'),
(247, NULL, 1, NULL, '2021/09/05 Sun 12:08 PM'),
(248, NULL, 1, NULL, '2021/09/05 Sun 12:08 PM'),
(249, 1, NULL, NULL, '2021/09/05 Sun 12:08 PM'),
(250, NULL, 1, NULL, '2021/09/05 Sun 12:09 PM'),
(251, 1, NULL, NULL, '2021/09/05 Sun 12:09 PM'),
(252, 1, NULL, NULL, '2021/09/05 Sun 12:10 PM'),
(253, 1, NULL, NULL, '2021/09/05 Sun 04:25 PM'),
(254, NULL, 1, NULL, '2021/09/06 Mon 11:38 AM'),
(255, 1, NULL, NULL, '2021/09/06 Mon 12:38 PM'),
(256, 1, NULL, NULL, '2021/09/07 Tue 12:26 PM');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `pid` int(11) NOT NULL,
  `pname` varchar(25) NOT NULL,
  `pemail` varchar(35) NOT NULL,
  `ppassword` varchar(35) NOT NULL,
  `pphone` varchar(10) NOT NULL,
  `pgender` char(1) NOT NULL,
  `page` int(3) NOT NULL,
  `paddress` varchar(40) NOT NULL,
  `pimage` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`pid`, `pname`, `pemail`, `ppassword`, `pphone`, `pgender`, `page`, `paddress`, `pimage`) VALUES
(74, 'kuber Acharya', 'kuberacharya@gmail.com', '25d55ad283aa400af464c76d713c07ad', '1234567891', 'M', 20, 'Dhulabari', 'images/users/kabish@gmail.com.jpeg'),
(76, 'Random kapoor', 'randomPerson@gmail.com', '25d55ad283aa400af464c76d713c07ad', '1234567890', 'O', 25, 'Dhulabari', 'images/users/kabish@gmail.com.jpeg'),
(89, 'Kabish Thapa', 'kabish@gmail.com', '25d55ad283aa400af464c76d713c07ad', '1234567890', 'M', 25, 'Dhulabari', 'images/users/kabish@gmail.com.jpeg'),
(90, 'Prashant bhandari', 'prashantbhandari@gmail.com', '2eb41868e0dc877d598838466303d370', '1234567890', 'M', 20, 'Dhulabari', 'images/users/kabish@gmail.com.jpeg'),
(91, 'Diana Singh', 'dianasingha@gmail.com', '25d55ad283aa400af464c76d713c07ad', '1234567890', 'F', 35, 'Dhulabari Jhapa Nepal', 'images/users/dineshgupta@gmail.com.jpeg'),
(92, 'Rabin Adhikari', 'rabinadhikari@gmail.com', '545f0fd97a449436766e6d738d311e42', '9807989825', 'M', 20, 'Bicharni', 'images/users/rabinadhikari@gmail.com.jpeg'),
(93, 'Saurav Adhikari', 'sauravadhikari@gmail.com', '25d55ad283aa400af464c76d713c07ad', '1234567890', 'M', 20, 'Bhadrapur', 'images/users/sauravadhikari@gmail.com.jpeg'),
(94, 'Dipesh Gupta', 'dipesh023561516@gmail.com', '6c58d7e16c82aedba6e25995f17d2b78', '9862775533', 'M', 20, 'Mechinagar', 'images/users/dipesh023561516@gmail.com.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`),
  ADD UNIQUE KEY `aemail` (`aemail`),
  ADD KEY `aid_2` (`aid`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`app-ID`),
  ADD KEY `did` (`did`),
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `contactquery`
--
ALTER TABLE `contactquery`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`did`),
  ADD UNIQUE KEY `demail` (`demail`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`lid`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`pid`),
  ADD UNIQUE KEY `pemail` (`pemail`),
  ADD KEY `pid` (`pid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `app-ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `contactquery`
--
ALTER TABLE `contactquery`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `lid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=257;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `patient` (`pid`),
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`did`) REFERENCES `doctor` (`did`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
