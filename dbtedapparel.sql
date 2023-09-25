-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2022 at 02:00 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbtedapparel`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl31`
--

CREATE TABLE `tbl31` (
  `Product_ID` varchar(50) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Price` int(11) DEFAULT NULL,
  `Color` varchar(255) DEFAULT NULL,
  `Sizes` varchar(255) DEFAULT NULL,
  `Type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl31`
--

INSERT INTO `tbl31` (`Product_ID`, `Name`, `Description`, `Price`, `Color`, `Sizes`, `Type`) VALUES
('310001', 'monomaniac1', 'monomaniac', 1000, ' gray, white, green,', 'Extra Small,Small,Medium,', 'Shirt'),
('310002', 'monomaniac2', 'monomaniac', 1000, ' gray, white, green,', 'Extra Small,Small,Medium,', 'Shirt'),
('310003', 'monomaniac3', 'monomaniac', 1000, ' gray, white, green,', 'Extra Small,Small,Medium,', 'Shirt');

-- --------------------------------------------------------

--
-- Table structure for table `tbl32`
--

CREATE TABLE `tbl32` (
  `Product_ID` varchar(50) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Price` int(11) DEFAULT NULL,
  `Color` varchar(255) DEFAULT NULL,
  `Sizes` varchar(255) DEFAULT NULL,
  `Type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl32`
--

INSERT INTO `tbl32` (`Product_ID`, `Name`, `Description`, `Price`, `Color`, `Sizes`, `Type`) VALUES
('320001', 'nike1', 'nike', 1000, ' red, black, gray,', 'Extra Small,Small,Medium,', 'Shirt'),
('320002', 'nike2', 'nike', 1000, ' red, black, gray,', 'Extra Small,Small,Medium,', 'Shirt'),
('320003', 'nike3', 'nike', 1000, ' red, black, gray,', 'Extra Small,Small,Medium,', 'Shirt');

-- --------------------------------------------------------

--
-- Table structure for table `tbl33`
--

CREATE TABLE `tbl33` (
  `Product_ID` varchar(50) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Price` int(11) DEFAULT NULL,
  `Color` varchar(255) DEFAULT NULL,
  `Sizes` varchar(255) DEFAULT NULL,
  `Type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl33`
--

INSERT INTO `tbl33` (`Product_ID`, `Name`, `Description`, `Price`, `Color`, `Sizes`, `Type`) VALUES
('330001', 'kush1', 'kush', 1000, ' green, blue, gray,', 'Extra Small,Small,Medium,', 'Shirt'),
('330002', 'kush2', 'kush', 1000, ' green, blue, gray,', 'Extra Small,Small,Medium,', 'Shirt'),
('330003', 'kush3', 'kush', 1000, ' green,blue,gray,', 'Extra Small,Small,Medium,', 'Shirt');

-- --------------------------------------------------------

--
-- Table structure for table `tbl34`
--

CREATE TABLE `tbl34` (
  `Product_ID` varchar(50) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Price` int(11) DEFAULT NULL,
  `Color` varchar(255) DEFAULT NULL,
  `Sizes` varchar(255) DEFAULT NULL,
  `Type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl34`
--

INSERT INTO `tbl34` (`Product_ID`, `Name`, `Description`, `Price`, `Color`, `Sizes`, `Type`) VALUES
('340001', 'hminds1', 'hminds', 1000, ' blue, green, gray,', 'Extra Small,Small,Medium,', 'Shirt'),
('340002', 'hminds2', 'hminds', 1000, ' gray, green, blue,', 'Extra Small,Small,Medium,', 'Shirt'),
('340003', 'hminds3', 'hminds', 1000, ' gray, green, blue,', 'Extra Small,Small,', 'Shirt');

-- --------------------------------------------------------

--
-- Table structure for table `tbl35`
--

CREATE TABLE `tbl35` (
  `Product_ID` varchar(50) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Price` int(11) DEFAULT NULL,
  `Color` varchar(255) DEFAULT NULL,
  `Sizes` varchar(255) DEFAULT NULL,
  `Type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl35`
--

INSERT INTO `tbl35` (`Product_ID`, `Name`, `Description`, `Price`, `Color`, `Sizes`, `Type`) VALUES
('350001', 'addidas1', 'addidas', 1000, ' blue, white, gray,', 'Extra Small,Small,Medium,', 'Shirt'),
('350002', 'addidas2', 'addidas', 1000, ' gray, blue, white,', 'Extra Small,Small,Medium,', 'Shirt'),
('350003', 'addidas3', 'addidas', 1000, ' gray, blue, white,', 'Extra Small,Small,Medium,', 'Shirt');

-- --------------------------------------------------------

--
-- Table structure for table `tbl36`
--

CREATE TABLE `tbl36` (
  `Product_ID` varchar(50) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Price` int(11) DEFAULT NULL,
  `Color` varchar(255) DEFAULT NULL,
  `Sizes` varchar(255) DEFAULT NULL,
  `Type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl36`
--

INSERT INTO `tbl36` (`Product_ID`, `Name`, `Description`, `Price`, `Color`, `Sizes`, `Type`) VALUES
('360001', 'dbtk1', 'dbtk', 1000, ' blue, violet, orange,', 'Extra Small,Small,Medium,', 'Shirt'),
('360002', 'dbtk2', 'dbtk', 1000, ' blue, orange, violet,', 'Extra Small,Small,Medium,', 'Shirt'),
('360003', 'dbtk3', 'dbtk', 1000, ' blue, violet, orange,', 'Extra Small,Small,Medium,', 'Shirt');

-- --------------------------------------------------------

--
-- Table structure for table `tbl37`
--

CREATE TABLE `tbl37` (
  `Product_ID` varchar(50) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Price` int(11) DEFAULT NULL,
  `Color` varchar(255) DEFAULT NULL,
  `Sizes` varchar(255) DEFAULT NULL,
  `Type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl37`
--

INSERT INTO `tbl37` (`Product_ID`, `Name`, `Description`, `Price`, `Color`, `Sizes`, `Type`) VALUES
('370001', 'tibay1', 'tibay', 1000, ' gray, red, green,', 'Extra Small,Small,Medium,', 'Shirt'),
('370002', 'tibay2', 'tibay', 1000, ' gray,red,green,', 'Extra Small,Small,Medium,', 'Shirt'),
('370003', 'tibay3', 'tibay', 1000, ' gray,red,green,', 'Extra Small,Small,Medium,', 'Shirt');

-- --------------------------------------------------------

--
-- Table structure for table `tbl38`
--

CREATE TABLE `tbl38` (
  `Product_ID` varchar(50) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Price` int(11) DEFAULT NULL,
  `Color` varchar(255) DEFAULT NULL,
  `Sizes` varchar(255) DEFAULT NULL,
  `Type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl38`
--

INSERT INTO `tbl38` (`Product_ID`, `Name`, `Description`, `Price`, `Color`, `Sizes`, `Type`) VALUES
('380001', 'jordan1', 'jordan', 1000, ' green.red.gray,', 'Extra Small,Small,Medium,', 'Shirt'),
('380002', 'jordan2', 'jordan', 1000, ' red,green,gray,', 'Extra Small,Small,Medium,', 'Shirt'),
('380003', 'jordan3', 'jordan', 1000, ' red,green,gray,', 'Extra Small,Small,Medium,', 'Shirt');

-- --------------------------------------------------------

--
-- Table structure for table `tbl39`
--

CREATE TABLE `tbl39` (
  `Product_ID` varchar(50) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Price` int(11) DEFAULT NULL,
  `Color` varchar(255) DEFAULT NULL,
  `Sizes` varchar(255) DEFAULT NULL,
  `Type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl39`
--

INSERT INTO `tbl39` (`Product_ID`, `Name`, `Description`, `Price`, `Color`, `Sizes`, `Type`) VALUES
('390001', 'tribal1', 'tribal', 1000, ' orange,green,blue,', 'Extra Small,Small,Medium,', 'Shirt'),
('390002', 'tribal2', 'tribal', 1000, ' orange,green.red,', 'Extra Small,Small,Medium,', 'Shirt'),
('390003', 'tribal3', 'tribal', 1000, ' orange, green, blue,', 'Extra Small,Small,Medium,', 'Shirt');

-- --------------------------------------------------------

--
-- Table structure for table `tbl40`
--

CREATE TABLE `tbl40` (
  `Product_ID` varchar(50) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Price` int(11) DEFAULT NULL,
  `Color` varchar(255) DEFAULT NULL,
  `Sizes` varchar(255) DEFAULT NULL,
  `Type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl40`
--

INSERT INTO `tbl40` (`Product_ID`, `Name`, `Description`, `Price`, `Color`, `Sizes`, `Type`) VALUES
('400001', 'for1', 'forever 21', 1000, ' green,blue,yelow,', 'Extra Small,Small,Medium,', 'Shirt'),
('400002', 'for2', 'forever 21', 1000, ' blue,yellow,green,', 'Extra Small,Small,Medium,', 'Shirt'),
('400003', 'for3', 'forever21', 1000, ' blue,yellow,green,', 'Extra Small,Small,Medium,', 'Shirt');

-- --------------------------------------------------------

--
-- Table structure for table `tblfollow`
--

CREATE TABLE `tblfollow` (
  `Store_ID` int(10) NOT NULL,
  `UserID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblimages`
--

CREATE TABLE `tblimages` (
  `sID` int(50) NOT NULL,
  `file_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblimages`
--

INSERT INTO `tblimages` (`sID`, `file_name`, `status`) VALUES
(310001, 'mm1.jpg,mm2.jpg,mm3.jpg', 0),
(310002, 'mm1.jpg,mm2.jpg,mm3.jpg', 0),
(310003, 'mm1.jpg,mm2.jpg,mm3.jpg', 0),
(320001, 'nike1.jpg,nike2.jpg,nike3.jpg', 0),
(320002, 'nike1.jpg,nike2.jpg,nike3.jpg', 0),
(320003, 'nike1.jpg,nike2.jpg,nike3.jpg', 0),
(330001, 'kush1.jpg,kush2.jpg,kush3.jpg', 0),
(330002, 'kush1.jpg,kush2.jpg,kush3.jpg', 0),
(330003, 'kush1.jpg,kush2.jpg,kush3.jpg', 0),
(340001, 'hm1.jpg,hm2.jpg,hm3.jpg', 0),
(340002, 'hm1.jpg,hm2.jpg,hm3.jpg', 0),
(340003, 'hm1.jpg,hm2.jpg,hm3.jpg', 0),
(350001, 'add1.jpg,add2.jpg,add3.jpg', 0),
(350002, 'add1.jpg,add2.jpg,add3.jpg', 0),
(350003, 'add1.jpg,add2.jpg,add3.jpg', 0),
(360001, 'db1.jpg,db2.jpg,db3.jpg', 0),
(360002, 'db1.jpg,db2.jpg,db3.jpg', 0),
(360003, 'db1.jpg,db2.jpg,db3.jpg', 0),
(370001, 'brgy1.jpg,brgy2.jpg,brgy3.jpg', 0),
(370002, 'brgy1.jpg,brgy2.jpg,brgy3.jpg', 0),
(370003, 'brgy1.jpg,brgy2.jpg,brgy3.jpg', 0),
(380001, 'jor1.jpg,jor2.jpg,jor3.jpg', 0),
(380002, 'jor1.jpg,jor2.jpg,jor3.jpg', 0),
(380003, 'jor1.jpg,jor2.jpg,jor3.jpg', 0),
(390001, 'trib1.jpg,trib2.jpg,trib3.jpg', 0),
(390002, 'trib1.jpg,trib2.jpg,trib3.jpg', 0),
(390003, 'trib1.jpg,trib2.jpg,trib3.jpg', 0),
(400001, 'for1.jpg,for2.jpg,for3.jpg', 0),
(400002, 'for1.jpg,for2.jpg,for3.jpg', 0),
(400003, 'for1.jpg,for2.jpg,for3.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblnotif`
--

CREATE TABLE `tblnotif` (
  `User_ID` int(50) NOT NULL,
  `Store_ID` int(50) NOT NULL,
  `PurchaseOrder` int(50) NOT NULL,
  `Status` int(50) NOT NULL,
  `Date` varchar(255) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblpurchases`
--

CREATE TABLE `tblpurchases` (
  `Store_ID` int(50) NOT NULL,
  `Product_ID` int(50) NOT NULL,
  `User_ID` int(50) NOT NULL,
  `PurchaseOrder` int(50) NOT NULL,
  `Quantity` int(50) NOT NULL,
  `Size` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Color` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Total` int(50) NOT NULL,
  `Date` varchar(255) NOT NULL DEFAULT current_timestamp(),
  `Status` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblreview`
--

CREATE TABLE `tblreview` (
  `Comment_ID` int(50) NOT NULL,
  `Product_ID` int(50) NOT NULL,
  `User_ID` int(50) NOT NULL,
  `Name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Review` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Status` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblstores`
--

CREATE TABLE `tblstores` (
  `Store_ID` int(50) NOT NULL,
  `Name` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Description` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Contact` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Payment_Method` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Logo` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Samples` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Status` int(1) NOT NULL,
  `Sales` int(50) NOT NULL,
  `Date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblstores`
--

INSERT INTO `tblstores` (`Store_ID`, `Name`, `Description`, `Contact`, `Payment_Method`, `Logo`, `Samples`, `Status`, `Sales`, `Date`) VALUES
(31, 'MONOMANIAC', 'MONOMANIAC', '09060552763', '3', 'IMG-620cfa050fed92.19152321.jpg', 'mm1.jpg,mm2.jpg,mm3.jpg', 2, 0, '2022-02-16'),
(32, 'NIKE', 'NIKE', '09060552761', '3', 'IMG-620cfab5ba3439.04681636.jpg', 'nike1.jpg,nike2.jpg,nike3.jpg', 2, 0, '2022-02-16'),
(33, 'KUSH', 'KUSH', '09060552762', '3', 'IMG-620cfb25d7acb9.66034905.jpg', 'kush1.jpg,kush2.jpg,kush3.jpg', 2, 0, '2022-02-16'),
(34, 'HIGHMINDS', 'HIGHMINDS', '09060552764', '3', 'IMG-620cfbbe4fada0.45182602.jpg', 'hm1.jpg,hm2.jpg,hm3.jpg', 2, 0, '2022-02-16'),
(35, 'ADDIDAS', 'ADDIDAS', '09060552765', '3', 'IMG-620cfc52c555c4.49352208.jpg', 'add1.jpg,add2.jpg,add3.jpg', 2, 0, '2022-02-16'),
(36, 'DBTK', 'DBTK', '09060552761', '3', 'IMG-620d018330bd72.76771997.jpg', 'db1.jpg,db2.jpg,db3.jpg', 2, 0, '2022-02-16'),
(37, 'BRGY TIBAY', 'BRGY TIBAY', '09060552761', '3', 'IMG-620d02189fee11.21762640.jpg', 'brgy1.jpg,brgy2.jpg,brgy3.jpg', 2, 0, '2022-02-16'),
(38, 'JORDAN', 'JORDAN', '09060552761', '3', 'IMG-620d028f333264.44421002.jpg', 'jor1.jpg,jor2.jpg,jor3.jpg', 2, 0, '2022-02-16'),
(39, 'TRIBAL', 'TRIBAL', '09060552761', '3', 'IMG-620d02f4df4269.23961647.jpg', 'trib1.jpg,trib2.jpg,trib3.jpg', 2, 0, '2022-02-16'),
(40, 'FOREVER ', 'FOREVER ', '09060552761', '3', 'IMG-620d036a20ac31.86924674.jpg', 'for1.jpg,for2.jpg,for3.jpg', 2, 0, '2022-02-16'),
(41, 'SHEIN', 'SHEIN', '09060552761', '3', 'IMG-620d07010a92e7.52410593.jpg', 'add3.jpg,brgy1.jpg,hm1.jpg', 1, 0, '2022-02-16'),
(42, 'EVIL GENIUS', 'EVIL GENIUS', '09060552761', '3', 'IMG-620d07478b0405.69846177.jpg', 'add2.jpg,add3.jpg,hm1.jpg', 1, 0, '2022-02-16');

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `ID` int(11) NOT NULL,
  `Username` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Password` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Name` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `ContactNumber` varchar(11) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Address` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `AccLvl` int(1) NOT NULL,
  `Pic` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`ID`, `Username`, `Password`, `Name`, `ContactNumber`, `Address`, `AccLvl`, `Pic`) VALUES
(1, 'superadmin@domain.com', 'd4e05b2c7f7c9c508d09a81b7f32f5f9', 'Admin', '09123451234', 'Manila, Philippines', 0, ''),
(31, 'dummyone@gmail.com', '23b726b3f876bb29f8ef11f18a1c8ef3', 'user', '09060552763', 'Manila, Manila', 1, 'IMG-620cf9cddf0712.59393086.jpg'),
(32, 'dummytwo@gmail.com', '23b726b3f876bb29f8ef11f18a1c8ef3', 'usertwo', '09060552761', 'Manila, Manila', 1, 'IMG-620cfa92144c64.40718352.jpg'),
(33, 'dummythree@gmail.com', '23b726b3f876bb29f8ef11f18a1c8ef3', 'userthree', '09060552762', 'Manila, Manila', 1, 'IMG-620cfb0b99caf4.41902965.jpg'),
(34, 'dummyfour@gmail.com', '23b726b3f876bb29f8ef11f18a1c8ef3', 'userfour', '09060552764', 'Manila, Manila', 1, 'IMG-620cfb8f2d6f02.39924703.jpg'),
(35, 'dummyfive@gmail.com', '23b726b3f876bb29f8ef11f18a1c8ef3', 'userfive', '09060552765', 'Manila, Manila', 1, 'IMG-620cfc1bb561c8.29559544.jpg'),
(36, 'dummysix@gmail.com', '23b726b3f876bb29f8ef11f18a1c8ef3', 'usersix', '09060552761', 'Manila, Manila', 1, 'IMG-620d0165ae8293.95344331.jpg'),
(37, 'dummyseven@gmail.com', '23b726b3f876bb29f8ef11f18a1c8ef3', 'userseven', '09060552761', 'Manila, Manila', 1, 'IMG-620d01c56de766.89372747.jpg'),
(38, 'dummyeight@gmail.com', '23b726b3f876bb29f8ef11f18a1c8ef3', 'usereight', '09060552761', 'Manila, Manila', 1, 'IMG-620d0275bd2c23.23937399.jpg'),
(39, 'dummynine@gmail.com', '23b726b3f876bb29f8ef11f18a1c8ef3', 'usernine', '09060552761', 'Manila, Manila', 1, 'IMG-620d02d6446da9.30337064.jpg'),
(40, 'dummyten@gmail.com', '23b726b3f876bb29f8ef11f18a1c8ef3', 'userten', '09060552761', 'Manila, Manila', 1, 'IMG-620d033ae7d6d4.12205746.jpg'),
(41, 'dummyeleven@gmail.com', '23b726b3f876bb29f8ef11f18a1c8ef3', 'usereleven', '09060552761', 'Manila, Manila', 2, ''),
(42, 'dummytwelve@gmail.com', '23b726b3f876bb29f8ef11f18a1c8ef3', 'usertwelve', '09060552761', 'Manila, Manila', 2, ''),
(43, 'dummyuser1@gmail.com', '23b726b3f876bb29f8ef11f18a1c8ef3', 'dummyuserone', '123164679', 'suki market muntinlupa', 2, ''),
(44, 'dummyuser2@gmail.com', '23b726b3f876bb29f8ef11f18a1c8ef3', 'dummyusertwo', '222222222', 'suki market muntinlupa', 2, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
