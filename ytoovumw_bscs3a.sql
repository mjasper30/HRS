-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 29, 2023 at 08:47 AM
-- Server version: 8.0.33
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ytoovumw_bscs3a`
--

-- --------------------------------------------------------

--
-- Table structure for table `hrs_tbladmin`
--

CREATE TABLE `hrs_tbladmin` (
  `ID` int NOT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `UserName` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `hrs_tbladmin`
--

INSERT INTO `hrs_tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'Jasper Macaraeg', 'admin', 9213279723, 'rastatel.hotel@gmail.com', '0192023a7bbd73250516f069df18b500', '2022-11-28 11:33:14');

-- --------------------------------------------------------

--
-- Table structure for table `hrs_tblbooking`
--

CREATE TABLE `hrs_tblbooking` (
  `ID` int NOT NULL,
  `RoomId` int DEFAULT NULL,
  `BookingNumber` varchar(120) DEFAULT NULL,
  `RoomNumber` varchar(255) DEFAULT NULL,
  `UserID` int NOT NULL,
  `IDType` varchar(120) DEFAULT NULL,
  `Gender` varchar(50) DEFAULT NULL,
  `CheckinDate` varchar(200) DEFAULT NULL,
  `CheckoutDate` varchar(200) DEFAULT NULL,
  `ArrivalTime` varchar(255) DEFAULT NULL,
  `BookingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Remark` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Status` varchar(50) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `hrs_tblbooking`
--

INSERT INTO `hrs_tblbooking` (`ID`, `RoomId`, `BookingNumber`, `RoomNumber`, `UserID`, `IDType`, `Gender`, `CheckinDate`, `CheckoutDate`, `ArrivalTime`, `BookingDate`, `Remark`, `Status`, `UpdationDate`) VALUES
(1, 1, '824827327', '101', 1, 'National ID', 'Male', '2023-05-24', '2023-05-27', '22:58', '2023-05-24 02:58:03', 'Thank you come again', 'Check out', '2023-05-24 03:09:54'),
(2, 5, '260533800', '503', 1, 'National ID', 'Male', '2023-05-24', '2023-05-27', '23:10', '2023-05-24 03:10:55', '123', 'Check out', '2023-05-24 03:12:47'),
(3, 5, '819611676', '501', 1, 'National ID', 'Male', '2023-05-24', '2023-05-27', '23:15', '2023-05-24 03:15:04', '123', 'Check out', '2023-05-24 03:16:11'),
(4, 4, '963248537', '401', 9, 'National ID', 'Female', '2023-05-26', '2023-05-29', '11:23', '2023-05-26 01:21:30', 'Check Out', 'Check out', '2023-05-26 01:24:04'),
(5, 5, '907876607', '501', 10, 'Voters ID', 'Female', '2023-05-26', '2023-06-09', '08:00', '2023-05-26 01:32:51', '123', 'Check out', '2023-05-26 01:37:18'),
(6, 5, '538435224', '501', 7, 'Driving License Card', 'Male', '2023-05-26', '2023-06-09', '10:00', '2023-05-26 01:42:09', 'Approved', 'Check out', '2023-05-26 01:44:16'),
(7, 2, '370627423', '201', 11, 'Senior Citizen ID', 'Female', '2023-05-26', '2023-05-31', '01:00', '2023-05-26 01:49:21', 'ok', 'Check out', '2023-05-26 01:52:12'),
(8, 4, '741621255', '401', 12, 'National ID', 'Male', '2023-05-26', '2023-05-31', '10:00', '2023-05-26 01:57:18', 'ok', 'Check out', '2023-05-26 02:01:10'),
(9, 5, '496105600', '501', 13, 'Senior Citizen ID', 'Male', '2023-05-27', '2023-05-30', '10:08', '2023-05-26 02:05:42', 'CHECK OUT', 'Check out', '2023-05-26 02:12:14'),
(10, 5, '576700528', '501', 14, 'National ID', 'Male', '2023-05-26', '2023-05-29', '17:46', '2023-05-26 03:38:33', 'ok', 'Check out', '2023-05-26 03:43:07'),
(11, 5, '755219265', '501', 15, 'National ID', 'Male', '2023-05-26', '2023-05-31', '15:12', '2023-05-26 04:09:45', 'okay', 'Check out', '2023-05-26 04:12:54'),
(12, 4, '668507537', '401', 16, 'National ID', 'Female', '2023-05-31', '2023-05-30', '15:49', '2023-05-26 04:44:43', 'CHECK OUT', 'Check out', '2023-05-26 04:47:05'),
(13, 5, '692119572', '501', 17, 'Philhealth ID', 'Male', '2023-05-27', '2023-05-29', '15:58', '2023-05-26 04:55:58', 'CHECK OUT', 'Check out', '2023-05-26 04:59:14'),
(14, 3, '547821214', '301', 18, 'Voters ID', 'Female', '2023-07-01', '2023-07-03', '15:12', '2023-05-26 05:09:57', 'check out', 'Check out', '2023-05-26 05:13:11'),
(15, 1, '214933664', NULL, 18, 'Voters ID', 'Female', '2023-05-26', '2023-05-28', '06:28', '2023-05-26 05:22:02', NULL, NULL, NULL),
(16, 1, '957864987', '101', 19, 'National ID', 'Female', '2023-05-27', '2023-05-30', '05:17', '2023-05-26 06:15:33', 'SHEESH', 'Check out', '2023-05-26 06:21:29'),
(17, 4, '156742772', '401', 1, 'National ID', 'Male', '2023-05-27', '2023-06-01', '16:30', '2023-05-26 06:27:48', 'check out', 'Check out', '2023-05-26 06:32:23'),
(18, 3, '853055591', '301', 1, 'National ID', 'Male', '2023-05-27', '2023-05-30', '16:30', '2023-05-26 06:43:32', 'check out', 'Check out', '2023-05-26 06:47:14'),
(19, 1, '715544847', '102', 1, 'National ID', 'Male', '2023-05-27', '2023-05-30', '18:20', '2023-05-26 07:17:59', 'check out', 'Check out', '2023-05-26 07:22:07'),
(20, 3, '896596930', '301', 1, 'Philhealth ID', 'Male', '2023-05-27', '2023-05-30', '16:31', '2023-05-26 07:41:48', 'check out', 'Check out', '2023-05-26 07:46:24'),
(21, 2, '654828525', '203', 20, 'National ID', 'Female', '2023-05-27', '2023-05-30', '07:15', '2023-05-26 07:59:58', 'check out', 'Check out', '2023-05-26 08:04:04'),
(22, 4, '916280558', '401', 21, 'National ID', 'Male', '2023-05-26', '2023-05-31', '17:08', '2023-05-26 09:06:15', 'check out', 'Check out', '2023-05-26 09:11:21');

-- --------------------------------------------------------

--
-- Table structure for table `hrs_tblcategory`
--

CREATE TABLE `hrs_tblcategory` (
  `ID` int NOT NULL,
  `CategoryName` varchar(120) DEFAULT NULL,
  `Description` mediumtext,
  `Price` int NOT NULL,
  `Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `hrs_tblcategory`
--

INSERT INTO `hrs_tblcategory` (`ID`, `CategoryName`, `Description`, `Price`, `Date`) VALUES
(1, 'Single Room', 'A single hotel room is designed to accommodate a single person or couple. Our single rooms have a dimension of 40 sq. meters and is equipped with a single bed, a small bedside table, a bathroom, television and air-conditioning, and a small wardrobe.', 4000, '2023-05-23 10:36:58'),
(2, 'Double Room', 'A double room in a hotel is a room designed to accommodate the needs of guests that wish to share a bed. There are a few differences between hotels and motels, but for most of them, a standard double room contains one king-size bed that can accommodate two or more people.', 5000, '2023-05-23 10:37:20'),
(3, 'Executive Suite', 'An executive suite in its most general definition is a collection of offices or rooms—or suite—used by top managers of a business—or executives. Over the years, this general term has taken on a variety of specific meanings.', 5500, '2023-05-23 10:37:42'),
(4, 'Deluxe Room', 'Deluxe rooms, are modern decorated, can accommodate up to 2 persons, totally soundproofed and equipped with high tech comforts such as high speed internet access, USB ports , smart TV, room cleaning touch system and private hydromassage bathtub.', 6000, '2023-05-23 10:38:02'),
(5, 'Presidential Suite', 'The Presidential Suite perfectly accommodates the celebrity, diplomat or a high-profile business meeting, delivering impeccable elegance, luxury and personal service. The suite offers 312 sqm / 3,358 sqf of luxury. Luxury two-bedroom suite with separate sitting room, kitchenette and dining area.', 8000, '2023-05-23 10:38:18');

-- --------------------------------------------------------

--
-- Table structure for table `hrs_tblcontact`
--

CREATE TABLE `hrs_tblcontact` (
  `ID` int NOT NULL,
  `Name` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Message` mediumtext,
  `EnquiryDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `IsRead` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `hrs_tblcontact`
--

INSERT INTO `hrs_tblcontact` (`ID`, `Name`, `MobileNumber`, `Email`, `Message`, `EnquiryDate`, `IsRead`) VALUES
(1, 'John Kenneth Adriano', 916438177, 'jkadriano2002@gmail.com', 'Lorem ipsum dolor sit amet', '2022-12-14 15:11:56', 1),
(2, 'John Kenneth Adriano', 9164381772, '20200227m.adriano.kenneth.bscs@gmail.com', 'this is a test message\r\n', '2022-12-16 09:52:13', 1),
(3, 'FRANCIS MIGUEL VILLANUEVA SILGUERA', 9755087969, '20200115.silguera.francis.bscs@gmail.com', 'Hello', '2022-12-19 07:04:24', 1),
(4, 'LUCKY T. TEH', 9673099802, '123@gmail.com', ' ganda po ng place at solid yung kama di \r\numaatungal pag binabayo ko gf ko naka 16 rounds kami sa hotel nato! highly recommended!!!', '2023-03-09 04:09:23', 1),
(5, 'Jasper Macaraeg', 9213279723, 'jasper.macaraeg41@gmail.com', 'hello', '2023-03-17 11:15:27', 1),
(6, 'test', 912345678, 'jasper.macaraeg42@gmail.com', 'testing', '2023-04-20 03:09:25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `hrs_tblfacility`
--

CREATE TABLE `hrs_tblfacility` (
  `ID` int NOT NULL,
  `FacilityTitle` varchar(200) DEFAULT NULL,
  `Description` mediumtext,
  `Image` varchar(200) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `hrs_tblfacility`
--

INSERT INTO `hrs_tblfacility` (`ID`, `FacilityTitle`, `Description`, `Image`, `CreationDate`) VALUES
(1, 'Gym', 'A gym is a large room, usually containing special equipment, where people go to do physical exercise and get fit. The gym has exercise bikes and running machines. While some guests play golf, others work out in the hotel gym. The large gym offers a variety of exercise equipment and weights going up to 100 pounds.', '286d66b228742c7472fd97ef0d534e991670553459.jpg', '2022-12-08 07:32:55'),
(2, 'Spa', 'A spa is a location where mineral-rich spring water (and sometimes seawater) is used to give medicinal baths. Spa towns or spa resorts (including hot springs resorts) typically offer various health treatments, which are also known as balneotherapy.', '517dcc35f07ca8e52cfdd588ac861dc51670484801.jpg', '2022-12-08 07:33:21'),
(3, 'Swimming Pool', '\r\nA swimming pool is a large hole in the ground that has been made and filled with water so that people can swim in it. Synonyms: swimming baths, pool, baths, lido More Synonyms of swimming pool.', 'e2dacc0cae9b86f5174b13cb28d6a9ab1670484870.jpg', '2022-12-08 07:34:30'),
(4, 'Car Parking', 'Parking is the act of stopping and disengaging a vehicle and leaving it unoccupied. Parking on one or both sides of a road is often permitted, though sometimes with restrictions.', '57ad846a2065d7eaaba4b4cfc46579181670484916.jpg', '2022-12-08 07:35:16');

-- --------------------------------------------------------

--
-- Table structure for table `hrs_tblpage`
--

CREATE TABLE `hrs_tblpage` (
  `ID` int NOT NULL,
  `PageType` varchar(120) DEFAULT NULL,
  `PageTitle` varchar(200) DEFAULT NULL,
  `PageDescription` mediumtext,
  `Email` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `hrs_tblpage`
--

INSERT INTO `hrs_tblpage` (`ID`, `PageType`, `PageTitle`, `PageDescription`, `Email`, `MobileNumber`, `UpdationDate`) VALUES
(1, 'aboutus', 'Rastatel', 'Located near Tiantan Park, just a 10-minute walk from the National Center for the Performing Arts and Tiananmen Square. Built in 1956 it has old school charm and many rooms still feature high, crown-molded ceilings. A 2012 renovation brought all rooms and services up to modern day scratch and guestrooms come equipped with free Wi-Fi and all the usual amenities required for a comfortable stay.\r\n\r\nOur hotel offers ultimate comfort and luxury. This 4-storied hotel is a beautiful combination of traditional grandeur and modern facilities. The 255 exclusive guest rooms are furnished with a range of modern amenities such as television and internet access. International direct-dial phone and safe are also available in any of these rooms. Wake-up call facility is also available in these rooms. ', NULL, NULL, '2023-05-11 13:28:17'),
(2, 'contactus', 'Contact Us', '130 J. Ramos St. Caloocan City', 'rastatel.hotel@gmail.com', 9213279723, '2022-12-17 05:23:53');

-- --------------------------------------------------------

--
-- Table structure for table `hrs_tblrfid`
--

CREATE TABLE `hrs_tblrfid` (
  `id` int NOT NULL,
  `rfid_number` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hrs_tblroom`
--

CREATE TABLE `hrs_tblroom` (
  `ID` int NOT NULL,
  `RoomType` int DEFAULT NULL,
  `RoomName` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Availability` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `RoomQuantity` int DEFAULT NULL,
  `Price` int DEFAULT NULL,
  `MaxAdult` int DEFAULT NULL,
  `MaxChild` int DEFAULT NULL,
  `RoomDesc` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `NoofBed` int DEFAULT NULL,
  `Image` varchar(200) DEFAULT NULL,
  `RoomFacility` varchar(200) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `hrs_tblroom`
--

INSERT INTO `hrs_tblroom` (`ID`, `RoomType`, `RoomName`, `Availability`, `RoomQuantity`, `Price`, `MaxAdult`, `MaxChild`, `RoomDesc`, `NoofBed`, `Image`, `RoomFacility`, `CreationDate`) VALUES
(1, 1, 'Deluxe Suite Single', 'Available', 2, 4000, 1, 1, 'Deluxe rooms, are modern decorated, can accommodate up to 2 persons, totally soundproofed and equipped with high tech comforts such as high speed internet access, USB ports , smart TV, room cleaning touch system and private hydromassage bathtub.', 1, '156005c5baf40ff51a327f1c34f2975b1684842858.jpg', '', '2023-05-23 11:54:18'),
(2, 2, 'Rastatel Double Room', 'Available', 2, 5000, 2, 3, 'A double room in a hotel is a room designed to accommodate the needs of guests that wish to share a bed. There are a few differences between hotels and motels, but for most of them, a standard double room contains one king-size bed that can accommodate two or more people', 2, '156005c5baf40ff51a327f1c34f2975b1684842941.jpg', '', '2023-05-23 11:55:41'),
(3, 3, 'Executive Suite', 'Available', 2, 5500, 2, 2, 'The Executive Suite is a stylish one-bedroom suite with king sized bed decorated in neutral tones, 46 square meters in size and with a separate living and dining area. Additional amenities for the suites include a washing machine & dryer.', 2, 'b935e787d009215c79b1ba11f5dd547c1684843011.jpg', '', '2023-05-23 11:56:51'),
(4, 4, 'Rastatel Deluxe Room', 'Available', 2, 6000, 2, 2, 'Deluxe rooms, are modern decorated, can accommodate up to 2 persons, totally soundproofed and equipped with high tech comforts such as high speed internet access, USB ports , smart TV, room cleaning touch system and private hydromassage bathtub.', 2, 'a3c130e848f2943770ebad11a6d880831684843139jpeg', '', '2023-05-23 11:58:59'),
(5, 5, 'Presidential Suite Room', 'Available', 2, 8000, 4, 3, 'The Presidential Suite perfectly accommodates the celebrity, diplomat or a high-profile business meeting, delivering impeccable elegance, luxury and personal service. The suite offers 312 sqm / 3,358 sqf of luxury. Luxury two-bedroom suite with separate sitting room, kitchenette and dining area.', 3, '261fb8d9e89972546ea2536ebc74b7bb1684843228.jpg', '', '2023-05-23 12:00:28');

-- --------------------------------------------------------

--
-- Table structure for table `hrs_tblroomnumber`
--

CREATE TABLE `hrs_tblroomnumber` (
  `ID` int NOT NULL,
  `RoomName` varchar(255) DEFAULT NULL,
  `RoomNumber` int DEFAULT NULL,
  `RFIDNumber` varchar(255) DEFAULT NULL,
  `Electricity` varchar(255) DEFAULT NULL,
  `Status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `hrs_tblroomnumber`
--

INSERT INTO `hrs_tblroomnumber` (`ID`, `RoomName`, `RoomNumber`, `RFIDNumber`, `Electricity`, `Status`) VALUES
(1, 'Deluxe Suite Single', 101, '8319EEBE', 'ON', 'Available'),
(2, 'Deluxe Suite Single', 102, '4384E6BE', 'ON', 'Available'),
(3, 'Deluxe Suite Single', 103, NULL, 'ON', 'Available'),
(4, 'Rastatel Double Room', 201, NULL, 'ON', 'Available'),
(5, 'Rastatel Double Room', 202, NULL, 'ON', 'Available'),
(6, 'Rastatel Double Room', 203, NULL, 'ON', 'Available'),
(7, 'Executive Suite', 301, NULL, 'ON', 'Available'),
(8, 'Executive Suite', 302, NULL, 'ON', 'Available'),
(9, 'Executive Suite', 303, NULL, 'ON', 'Available'),
(10, 'Rastatel Deluxe Room', 401, NULL, 'ON', 'Available'),
(11, 'Rastatel Deluxe Room', 402, NULL, 'ON', 'Available'),
(12, 'Rastatel Deluxe Room', 403, NULL, 'ON', 'Available'),
(16, 'Presidential Suite Room', 501, NULL, 'ON', 'Available'),
(17, 'Presidential Suite Room', 502, NULL, 'ON', 'Available'),
(18, 'Presidential Suite Room', 503, NULL, 'ON', 'Available'),
(19, 'Presidential Suite Room', 504, '9305E8BE', 'ON', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `hrs_tblstaff`
--

CREATE TABLE `hrs_tblstaff` (
  `ID` int NOT NULL,
  `StaffName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `UserName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `MobileNumber` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `StaffRegDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `hrs_tblstaff`
--

INSERT INTO `hrs_tblstaff` (`ID`, `StaffName`, `UserName`, `MobileNumber`, `Email`, `Password`, `StaffRegDate`) VALUES
(1, 'John Kenneth Adriano', 'staffadriano', '09123456789', 'staffadriano@gmail.com', 'de9bf5643eabf80f4a56fda3bbb84483', '2022-12-14 14:57:24'),
(2, 'Francis Silguera', 'staff_francis', '09856789621', 'francisstaff@gmail.com', 'de9bf5643eabf80f4a56fda3bbb84483', '2022-12-18 03:06:55'),
(3, 'Francis Silguera', 'francis', '09212023063', 'ragequitv3@gmail.com', '202cb962ac59075b964b07152d234b70', '2023-04-29 01:42:40');

-- --------------------------------------------------------

--
-- Table structure for table `hrs_tbluser`
--

CREATE TABLE `hrs_tbluser` (
  `ID` int NOT NULL,
  `FullName` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `Gender` varchar(255) DEFAULT NULL,
  `ProfileImage` varchar(255) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `IsVerified` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `hrs_tbluser`
--

INSERT INTO `hrs_tbluser` (`ID`, `FullName`, `MobileNumber`, `Email`, `Gender`, `ProfileImage`, `Password`, `IsVerified`, `RegDate`) VALUES
(1, 'Jasper David Macaraeg', 921327972, 'jasper.macaraeg42@gmail.com', 'Male', '4865a036408f788cce8e3fabcbc6b5a61684896241.jpg', '202cb962ac59075b964b07152d234b70', 'Yes', '2023-05-23 06:31:58'),
(2, 'Soyux', 9, 'soyuzdayag@gmail.com', 'Male', NULL, '25d55ad283aa400af464c76d713c07ad', 'Yes', '2023-05-23 06:35:37'),
(3, 'Carl Bryan Dy', 9297611245, 'carldy04@gmail.com', 'Male', NULL, '202cb962ac59075b964b07152d234b70', 'Yes', '2023-05-23 06:40:42'),
(4, 'Danny O. Brenio', 9664657357, 'dannybrenio060@gmail.com', 'Male', NULL, '81dc9bdb52d04dc20036dbd8313ed055', 'Yes', '2023-05-23 06:44:56'),
(5, 'maribeth barros', 9451852608, 'maribethbarros0@gmail.com', 'Female', NULL, 'fab108b3e3e497b9501988d6c8de1b1a', 'Yes', '2023-05-23 06:50:43'),
(6, 'Francis', 0, 'ragequitv3@gmail.com', 'Male', NULL, 'c4ca4238a0b923820dcc509a6f75849b', 'Yes', '2023-05-23 07:02:30'),
(7, 'Mark Danny Dayag', 1235441231, 'ricksiv0107@gmail.com', 'Male', NULL, '25f9e794323b453885f5181f1b624d0b', 'Yes', '2023-05-23 07:08:11'),
(8, 'Francis Miguel V. Silguera', 0, 'francismiguel.silguera@gmail.com', 'Male', NULL, 'cfcd208495d565ef66e7dff9f98764da', 'Yes', '2023-05-24 00:50:51'),
(9, 'ryujin', 9212023063, 'tabuzo.leandris.bscs2022@gmail.com', 'Female', '261f958ef073187d151a454ff1b4a12d1685063902.png', '863ca5673aeafd920ef6558c260d3230', 'Yes', '2023-05-26 01:17:25'),
(10, 'Camille Soliman', 9050795313, 'soliman.camille.bscs2022@gmail.com', 'Female', NULL, 'a48a7f4d1cf8f07ec16454b17438872d', 'Yes', '2023-05-26 01:31:39'),
(11, 'Shinichi Kudo', 9123456789, 'faith17baile@gmail.com', 'Female', NULL, 'eb633d0d9a524624a35378c8402c0dc2', 'Yes', '2023-05-26 01:47:15'),
(12, 'lance patrick deleon p.', 9458738852, 'lancepatrickdeleon2004@gmail.com', 'Male', NULL, 'c6f057b86584942e415435ffb1fa93d4', 'Yes', '2023-05-26 01:55:19'),
(13, 'Justine James D. Balasabas', 9761980392, 'jstnjms8@gmail.com', 'Male', NULL, '81dc9bdb52d04dc20036dbd8313ed055', 'Yes', '2023-05-26 02:04:33'),
(14, 'Jan Vincent Alegria', 934732482, 'janvincentalegria27@gmail.com', 'Male', NULL, 'e168a28b7ffeb7b3ceabab90458877cd', 'Yes', '2023-05-26 03:36:09'),
(15, 'Keanu Ferrer Marquez', 909090909, 'keanumarquez70@gmail.com', 'Male', NULL, '4a6bd33bbcff4857ffc5655f0cb659fa', 'Yes', '2023-05-26 04:07:18'),
(16, 'sarah', 9212023063, 'sarahjoypastro333@gmail.com', 'Female', NULL, 'c53707e1e19e09c557f8164925559f81', 'Yes', '2023-05-26 04:42:01'),
(17, 'Jiro Mendador', 1233456789, 'jiromendador@gmail.com', 'Male', NULL, '25f9e794323b453885f5181f1b624d0b', 'Yes', '2023-05-26 04:53:46'),
(18, 'Juliana Mae Ilom', 92, 'julianamae.ilom01@gmail.com', 'Female', NULL, '25f9e794323b453885f5181f1b624d0b', 'Yes', '2023-05-26 05:07:51'),
(19, 'ma.cristine joy p. marcos', 9307001940, '20210541m.marcos.cristine.bscs@gmail.com', 'Female', NULL, '827ccb0eea8a706c4c34a16891f84e7b', 'Yes', '2023-05-26 06:12:24'),
(20, 'chelo', 9674536521, 'chelodelossantosbermas@gmail.com', 'Female', NULL, '1cc522434bd81270ec62410bec0917be', 'Yes', '2023-05-26 07:58:10'),
(21, 'Jerwin L. Candaza', 9774647140, 'jerwin.candaza2003@gmail.com', 'Male', NULL, '202cb962ac59075b964b07152d234b70', 'Yes', '2023-05-26 09:05:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hrs_tbladmin`
--
ALTER TABLE `hrs_tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `hrs_tblbooking`
--
ALTER TABLE `hrs_tblbooking`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `hrs_tblcategory`
--
ALTER TABLE `hrs_tblcategory`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID` (`ID`);

--
-- Indexes for table `hrs_tblcontact`
--
ALTER TABLE `hrs_tblcontact`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `hrs_tblfacility`
--
ALTER TABLE `hrs_tblfacility`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `hrs_tblpage`
--
ALTER TABLE `hrs_tblpage`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `hrs_tblrfid`
--
ALTER TABLE `hrs_tblrfid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hrs_tblroom`
--
ALTER TABLE `hrs_tblroom`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `RoomType` (`RoomType`);

--
-- Indexes for table `hrs_tblroomnumber`
--
ALTER TABLE `hrs_tblroomnumber`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `hrs_tblstaff`
--
ALTER TABLE `hrs_tblstaff`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `hrs_tbluser`
--
ALTER TABLE `hrs_tbluser`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID` (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hrs_tbladmin`
--
ALTER TABLE `hrs_tbladmin`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `hrs_tblbooking`
--
ALTER TABLE `hrs_tblbooking`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `hrs_tblcategory`
--
ALTER TABLE `hrs_tblcategory`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hrs_tblcontact`
--
ALTER TABLE `hrs_tblcontact`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hrs_tblfacility`
--
ALTER TABLE `hrs_tblfacility`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `hrs_tblpage`
--
ALTER TABLE `hrs_tblpage`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hrs_tblrfid`
--
ALTER TABLE `hrs_tblrfid`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hrs_tblroom`
--
ALTER TABLE `hrs_tblroom`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hrs_tblroomnumber`
--
ALTER TABLE `hrs_tblroomnumber`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `hrs_tblstaff`
--
ALTER TABLE `hrs_tblstaff`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hrs_tbluser`
--
ALTER TABLE `hrs_tbluser`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
