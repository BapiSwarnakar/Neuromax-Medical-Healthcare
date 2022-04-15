-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2021 at 03:45 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `neuromax_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `table_department_master`
--

CREATE TABLE `table_department_master` (
  `Dept_Id` int(11) NOT NULL,
  `Dept_Name` varchar(100) NOT NULL,
  `Dept_Date` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_department_master`
--

INSERT INTO `table_department_master` (`Dept_Id`, `Dept_Name`, `Dept_Date`) VALUES
(4, 'PSYCHIATRY', '2021-03-08 16:12:57.084851'),
(5, 'Clinical PSYCHOLOGISTS/Counselling PSYCHOLOGIST', '2021-03-08 16:13:06.377498'),
(6, 'NEUROLOGY', '2021-03-08 16:13:25.839464'),
(7, 'PAIN CLINIC', '2021-03-08 16:13:34.595533'),
(8, 'DIETETICS', '2021-03-08 16:13:44.689845'),
(9, 'DIABETES and METABOLIC Clinic', '2021-03-08 16:14:23.352821'),
(10, 'SPEECH THERAPY', '2021-03-08 16:14:35.330932'),
(11, 'SPECIAL EDUCATOR', '2021-03-08 16:14:47.856377');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `Admin_Id` int(11) NOT NULL,
  `Admin_Username` varchar(50) NOT NULL,
  `Admin_Password` varchar(50) NOT NULL,
  `Admin_Created` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`Admin_Id`, `Admin_Username`, `Admin_Password`, `Admin_Created`) VALUES
(1, 'Admin', '123', '09/02/2021');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_doctor_appointment`
--

CREATE TABLE `tbl_doctor_appointment` (
  `App_Id` int(11) NOT NULL,
  `Doc_Id` int(11) NOT NULL,
  `Cham_Id` int(11) NOT NULL,
  `App_Day` varchar(50) NOT NULL,
  `App_Day_Shift` varchar(50) NOT NULL,
  `App_Fees` double NOT NULL,
  `App_Start_Time` varchar(20) NOT NULL,
  `App_End_Time` varchar(20) NOT NULL,
  `App_Created` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_doctor_appointment`
--

INSERT INTO `tbl_doctor_appointment` (`App_Id`, `Doc_Id`, `Cham_Id`, `App_Day`, `App_Day_Shift`, `App_Fees`, `App_Start_Time`, `App_End_Time`, `App_Created`) VALUES
(15, 39, 1, 'Thu', 'Evening', 250, '4:30 PM', '6:30 PM', '26-Feb-2021 11:56'),
(16, 37, 1, 'Sat', 'Evening', 250, '3:00 PM', '5:00 PM', '26-Feb-2021 11:57'),
(17, 36, 1, 'Fri', 'Morning', 250, '11:00 AM', '2:00 PM', '26-Feb-2021 11:58'),
(18, 34, 1, 'Thu', 'Morning', 250, '11:00 AM', '5:00 PM', '26-Feb-2021 11:59'),
(19, 33, 1, 'Tue', 'Morning', 250, '11:00 AM', '5:00 PM', '27-Feb-2021 12:00'),
(20, 33, 1, 'Sat', 'Morning', 250, '11:00 AM', '5:00 PM', '27-Feb-2021 12:00'),
(21, 32, 1, 'Mon', 'Evening', 250, '4:30 PM', '6:30 PM', '27-Feb-2021 12:01'),
(22, 32, 1, 'Thu', 'Evening', 250, '4:30 PM', '6:30 PM', '27-Feb-2021 12:02'),
(23, 31, 1, 'Wed', 'Morning', 250, '11:00 AM', '8:00 PM', '27-Feb-2021 12:02'),
(24, 28, 1, 'Mon', 'Morning', 250, '9:00 AM', '10:00 PM', '27-Feb-2021 12:03'),
(25, 28, 1, 'Wed', 'Morning', 250, '9:00 AM', '10:00 AM', '27-Feb-2021 12:04'),
(26, 28, 1, 'Fri', 'Morning', 250, '9:00 AM', '10:00 AM', '27-Feb-2021 12:04'),
(27, 26, 1, 'Tue', 'Evening', 250, '5:00 PM', '6:00 PM', '27-Feb-2021 12:05'),
(28, 25, 1, 'Sat', 'Evening', 250, '3:00 PM', '6:00 PM', '27-Feb-2021 12:05'),
(29, 24, 1, 'Mon', 'Morning', 250, '10:00 AM', '2:00 PM', '27-Feb-2021 12:07'),
(30, 24, 1, 'Thu', 'Morning', 250, '10:00 AM', '2:00 PM', '27-Feb-2021 12:07'),
(31, 24, 1, 'Tue', 'Evening', 250, '3:00 PM', '7:00 PM', '27-Feb-2021 12:08'),
(32, 24, 1, 'Wed', 'Evening', 250, '3:00 PM', '7:00 PM', '27-Feb-2021 12:08'),
(33, 40, 1, 'Sat', 'Morning', 250, '11:00 AM', '3:00 PM', '27-Feb-2021 12:12'),
(34, 23, 1, 'Mon', 'Morning', 250, '10:00 AM', '12:00 PM', '27-Feb-2021 12:13'),
(35, 23, 1, 'Tue', 'Morning', 250, '10:00 AM', '12:00 PM', '27-Feb-2021 12:13'),
(36, 23, 1, 'Wed', 'Morning', 250, '10:00 AM', '12:00 PM', '27-Feb-2021 12:14'),
(37, 23, 1, 'Sat', 'Morning', 250, '10:00 AM', '12:00 PM', '27-Feb-2021 12:14'),
(38, 23, 1, 'Mon', 'Evening', 250, '6:00 PM', '8:00 PM', '27-Feb-2021 12:15'),
(39, 23, 1, 'Tue', 'Evening', 250, '6:00 PM', '8:00 PM', '27-Feb-2021 12:15'),
(40, 23, 1, 'Wed', 'Evening', 250, '6:00 PM', '8:00 PM', '27-Feb-2021 12:15'),
(41, 23, 1, 'Sat', 'Evening', 250, '6:00 PM', '8:00 PM', '27-Feb-2021 12:16');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_doctor_education`
--

CREATE TABLE `tbl_doctor_education` (
  `Edu_Id` int(11) NOT NULL,
  `Doc_Id` int(11) NOT NULL,
  `Edu_Degree` varchar(200) NOT NULL,
  `Edu_Year` varchar(50) NOT NULL,
  `Edu_University` varchar(150) NOT NULL,
  `Edu_Added_Date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_doctor_education`
--

INSERT INTO `tbl_doctor_education` (`Edu_Id`, `Doc_Id`, `Edu_Degree`, `Edu_Year`, `Edu_University`, `Edu_Added_Date`) VALUES
(58, 23, 'MD', '2000', 'ABC', '26-Feb-2021 10:36'),
(59, 24, 'MBBS', '2000', 'ABC', '26-Feb-2021 10:38'),
(60, 24, 'DNB', '2000', 'ABC', '26-Feb-2021 10:39'),
(61, 24, 'MNAMS', '2000', 'ABC', '26-Feb-2021 10:40'),
(62, 25, 'MBBS', '2000', 'ABC', '26-Feb-2021 10:41'),
(63, 25, 'MD', '2000', 'ABC', '26-Feb-2021 10:41'),
(64, 26, 'MD', '2000', 'ABC', '26-Feb-2021 10:42'),
(65, 26, 'DM', '2000', 'ABC', '26-Feb-2021 10:42'),
(66, 27, 'MBBS', '2000', 'ABC', '26-Feb-2021 10:45'),
(67, 27, 'MBA', '2000', 'ABC', '26-Feb-2021 10:45'),
(69, 28, 'MBBS', '2000', 'ABC', '26-Feb-2021 10:47'),
(70, 28, 'PG Diploma', '2000', 'ABC', '26-Feb-2021 10:48'),
(71, 29, 'MD', '2000', 'ABC', '26-Feb-2021 10:49'),
(72, 29, 'FIPM', '2000', 'ABC', '26-Feb-2021 10:49'),
(74, 30, 'M.Sc(Food & Nutrition)', '2000', 'ABC', '26-Feb-2021 10:51'),
(75, 30, 'B.Sc(Hons) Physiology', '2000', 'ABC', '26-Feb-2021 10:51'),
(76, 31, 'M.Sc(Applied Psychology)', '2000', 'ABC', '26-Feb-2021 10:53'),
(77, 31, 'Diploma Career guidance & Counselling', '2000', 'ABC', '26-Feb-2021 10:54'),
(78, 32, 'MA', '2000', 'ABC', '26-Feb-2021 10:55'),
(79, 32, 'M.Phil(Clinical Psychology)', '2000', 'ABC', '26-Feb-2021 10:56'),
(80, 33, 'M.A', '2000', 'ABC', '26-Feb-2021 10:57'),
(81, 33, 'M.Phil(Clinical Psychology)', '2000', 'ABC', '26-Feb-2021 10:58'),
(82, 34, 'M.A', '2000', 'ABC', '26-Feb-2021 10:58'),
(83, 34, 'M.Phil', '2000', 'ABC', '26-Feb-2021 10:59'),
(85, 35, 'MA(CU)', '2000', 'ABC', '26-Feb-2021 11:01'),
(86, 35, 'M.Phil(Clinical Psychology)', '2000', 'ABC', '26-Feb-2021 11:02'),
(87, 36, 'MA(CU)', '2000', 'ABC', '26-Feb-2021 11:03'),
(88, 37, 'MA(CU)', '2000', 'ABC', '26-Feb-2021 11:04'),
(89, 38, 'B.A.S.L.P(WBUHS)', '2000', 'ABC', '26-Feb-2021 11:05'),
(90, 38, 'M.Sc(Applied Psychology)', '2000', 'ABC', '26-Feb-2021 11:05'),
(91, 39, 'None', '2000', 'ABC', '26-Feb-2021 11:08'),
(92, 40, 'MBBS', '2000', 'ABC', '27-Feb-2021 12:10'),
(93, 40, 'DPM(call)', '2000', 'ABC', '27-Feb-2021 12:11'),
(94, 40, 'MPC(New Delhi)', '2000', 'ABC', '27-Feb-2021 12:11'),
(95, 41, 'MBBS', '2020', 'Raiganj University', '08-Mar-2021 04:23'),
(96, 42, 'MBBS', '2013', 'Raiganj University', '08-Mar-2021 04:34');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_doctor_master`
--

CREATE TABLE `tbl_doctor_master` (
  `Doc_Id` int(11) NOT NULL,
  `Doc_Name` varchar(100) NOT NULL,
  `Doc_Lic` varchar(100) NOT NULL,
  `Doc_Mobile` varchar(20) NOT NULL,
  `Doc_Email` varchar(100) NOT NULL,
  `Doc_Flag` int(5) NOT NULL,
  `Doc_Added_Date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_doctor_master`
--

INSERT INTO `tbl_doctor_master` (`Doc_Id`, `Doc_Name`, `Doc_Lic`, `Doc_Mobile`, `Doc_Email`, `Doc_Flag`, `Doc_Added_Date`) VALUES
(23, 'Dr. Bhaskar Mukherjee', '123456', '9609304072', 'abc@gmail.com', 0, '26-Feb-2021 10:36'),
(24, 'Dr. Abhiruchi Chatterjee', '12345', '9609304072', 'abc@gmail.com', 0, '26-Feb-2021 10:38'),
(25, 'Dr. Subhendu Sekhar Dhar', '123456', '9609304072', 'test@test.com', 0, '26-Feb-2021 10:41'),
(26, 'Dr. Sadanand Dey', '123456', '9609304072', 'test@test.com', 0, '26-Feb-2021 10:42'),
(27, 'Dr. Avijit Chakravorty', '123456', '9609304072', 'test@test.com', 0, '26-Feb-2021 10:45'),
(28, 'Dr. Sumana Bagchi Bhattacharya', '123456', '9609304072', 'test@test.com', 0, '26-Feb-2021 10:47'),
(29, 'Dr. Arghya Mukherjee', '123456', '9609304072', 'test@test.com', 0, '26-Feb-2021 10:48'),
(30, 'Ms. Suchanda Chatterjee', '123', '9609304072', 'test@test.com', 0, '26-Feb-2021 10:50'),
(31, 'Mr. Samir Khan', '123456', '9609304072', 'test@test.com', 0, '26-Feb-2021 10:52'),
(32, 'Ms. Soumi Chakraborty', '123456', '9609304072', 'test@test.com', 0, '26-Feb-2021 10:55'),
(33, 'Ms. Usri Sengupta', '123456', '9609304072', 'test@test.com', 0, '26-Feb-2021 10:57'),
(34, 'Ms. Tania Saha', '123456', '9609304072', 'test@test.com', 0, '26-Feb-2021 10:58'),
(35, 'Ms. Arpita Ghosh', '123456', '9609304072', 'test@test.com', 0, '26-Feb-2021 11:01'),
(36, 'Ms. Madhuboni Sengupta', '123456', '9609304072', 'test@test.com', 0, '26-Feb-2021 11:03'),
(37, 'Ms. Sreeparna Chowdhury', '123456', '9609304072', 'test@test.com', 0, '26-Feb-2021 11:04'),
(38, 'Mr. Santanu Mukherjee', '123456', '9609304072', 'test@test.com', 0, '26-Feb-2021 11:04'),
(39, 'Mrs. Jhuma RoyChowdhury', '123456', '9609304072', 'test@test.com', 0, '26-Feb-2021 11:08'),
(40, 'Dr. Suddhendu Chakraborty', '123', '9609304072', 'test@test.com', 0, '27-Feb-2021 12:10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_doctor_membership`
--

CREATE TABLE `tbl_doctor_membership` (
  `Mem_Id` int(11) NOT NULL,
  `Doc_Id` int(11) NOT NULL,
  `Mem_Name` varchar(200) NOT NULL,
  `Mem_Date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_doctor_membership`
--

INSERT INTO `tbl_doctor_membership` (`Mem_Id`, `Doc_Id`, `Mem_Name`, `Mem_Date`) VALUES
(21, 23, 'Not Know', '26-Feb-2021 10:37'),
(22, 24, 'Not Know', '26-Feb-2021 10:40'),
(23, 25, 'Not Know', '26-Feb-2021 10:41'),
(24, 26, 'Not Know', '26-Feb-2021 10:43'),
(25, 27, 'Not Know', '26-Feb-2021 10:46'),
(26, 28, 'Not Know', '26-Feb-2021 10:48'),
(27, 29, 'Not Know', '26-Feb-2021 10:49'),
(28, 30, 'Not Know', '26-Feb-2021 10:51'),
(29, 31, 'Not Know', '26-Feb-2021 10:54'),
(30, 32, 'Not Know', '26-Feb-2021 10:56'),
(31, 33, 'Not Know', '26-Feb-2021 10:58'),
(32, 34, 'Not Know', '26-Feb-2021 10:59'),
(33, 35, 'Not Know', '26-Feb-2021 11:02'),
(34, 36, 'Not Know', '26-Feb-2021 11:03'),
(35, 37, 'Not Know', '26-Feb-2021 11:04'),
(36, 38, 'Not Know', '26-Feb-2021 11:06'),
(37, 39, 'Not Know', '26-Feb-2021 11:08'),
(39, 40, 'Not Known', '27-Feb-2021 12:50'),
(40, 41, 'Not Known', '08-Mar-2021 04:28');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_doctor_profile_image`
--

CREATE TABLE `tbl_doctor_profile_image` (
  `Pro_Id` int(11) NOT NULL,
  `Doc_Id` int(11) NOT NULL,
  `Pro_Image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_doctor_profile_image`
--

INSERT INTO `tbl_doctor_profile_image` (`Pro_Id`, `Doc_Id`, `Pro_Image`) VALUES
(4, 39, '1614361412_male.png'),
(5, 38, '1614361422_male.png'),
(6, 37, '1614361431_male.png'),
(7, 36, '1614361440_male.png'),
(8, 35, '1614361447_male.png'),
(9, 34, '1614361455_male.png'),
(10, 33, '1614361462_male.png'),
(11, 32, '1614361471_male.png'),
(12, 31, '1614361480_male.png'),
(13, 30, '1614361487_male.png'),
(14, 29, '1614361496_male.png'),
(15, 28, '1614361503_male.png'),
(16, 27, '1614361512_male.png'),
(17, 26, '1614361520_male.png'),
(18, 25, '1614361529_male.png'),
(19, 24, '1614361535_male.png'),
(20, 23, '1614361544_profile.jpg'),
(21, 40, '1614365336_male.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_doctor_specialization`
--

CREATE TABLE `tbl_doctor_specialization` (
  `Spl_Id` int(11) NOT NULL,
  `Doc_Id` int(11) NOT NULL,
  `Dept_Id` int(11) NOT NULL,
  `Spl_Name` varchar(150) NOT NULL,
  `Spl_Date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_doctor_specialization`
--

INSERT INTO `tbl_doctor_specialization` (`Spl_Id`, `Doc_Id`, `Dept_Id`, `Spl_Name`, `Spl_Date`) VALUES
(72, 23, 4, 'Psychiatry', '08-Mar-2021 05:52'),
(73, 24, 4, 'Psychiatry', '08-Mar-2021 05:53'),
(74, 40, 4, 'Psychiatry', '08-Mar-2021 05:53'),
(78, 29, 7, 'Pain Clinic', '08-Mar-2021 05:55'),
(79, 30, 8, 'Dietetics', '08-Mar-2021 05:56'),
(87, 38, 10, 'Speech Therapy', '08-Mar-2021 05:59'),
(88, 39, 11, 'Special Educator', '08-Mar-2021 05:59'),
(89, 26, 6, 'Neurology', '09-Mar-2021 03:31'),
(90, 27, 9, 'Diabetes and Metabolic Clinic', '09-Mar-2021 03:32'),
(91, 28, 9, 'Diabetes and Metabolic Clinic', '09-Mar-2021 03:32'),
(92, 25, 4, 'Psychiatry', '09-Mar-2021 03:34'),
(93, 37, 5, 'Clinical Psychologist/ Counselling Psychologist', '09-Mar-2021 03:36'),
(94, 36, 5, 'Clinical Psychologist/ Counselling Psychologist', '09-Mar-2021 03:37'),
(95, 35, 5, 'Clinical Psychologist/ Counselling Psychologist', '09-Mar-2021 03:37'),
(96, 34, 5, 'Clinical Psychologist/ Counselling Psychologist', '09-Mar-2021 03:37'),
(97, 33, 5, 'Clinical Psychologist/ Counselling Psychologist', '09-Mar-2021 03:38'),
(98, 32, 5, 'Clinical Psychologist/ Counselling Psychologist', '09-Mar-2021 03:38'),
(99, 31, 5, 'Clinical Psychologist/ Counselling Psychologist', '09-Mar-2021 03:38');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback_master`
--

CREATE TABLE `tbl_feedback_master` (
  `Feed_Id` int(11) NOT NULL,
  `Feed_Name` varchar(100) NOT NULL,
  `Feed_Gender` varchar(20) NOT NULL,
  `Feed_Mobile` varchar(20) NOT NULL,
  `Feed_Comment` varchar(250) NOT NULL,
  `Feed_Rating` int(6) NOT NULL DEFAULT current_timestamp(),
  `Feed_Date` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_feedback_master`
--

INSERT INTO `tbl_feedback_master` (`Feed_Id`, `Feed_Name`, `Feed_Gender`, `Feed_Mobile`, `Feed_Comment`, `Feed_Rating`, `Feed_Date`) VALUES
(10, 'Anirban Paul', 'Male', '9609304072', 'Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore.', 5, '2021-03-09 16:02:43.373180'),
(12, 'Riya Das', 'Female', '6295283474', 'Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore.', 4, '2021-03-09 16:03:26.387499'),
(13, 'Bapi swarnakar', 'Male', '6295283474', 'Very Good Services', 5, '2021-04-16 17:21:30.519429');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_need_help`
--

CREATE TABLE `tbl_need_help` (
  `Help_Id` int(11) NOT NULL,
  `Help_Email` varchar(100) NOT NULL,
  `Help_Desc` varchar(200) NOT NULL,
  `Help_Date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_need_help`
--

INSERT INTO `tbl_need_help` (`Help_Id`, `Help_Email`, `Help_Desc`, `Help_Date`) VALUES
(3, 'swarnakarr34@gmail.com', 'hello sir ', '16-04-2021 05:13');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news`
--

CREATE TABLE `tbl_news` (
  `Blog_Id` int(11) NOT NULL,
  `Blog_Header` varchar(255) NOT NULL,
  `Blog_Desc` text NOT NULL,
  `Blog_Publish_Id` int(5) NOT NULL,
  `Blog_Date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_news`
--

INSERT INTO `tbl_news` (`Blog_Id`, `Blog_Header`, `Blog_Desc`, `Blog_Publish_Id`, `Blog_Date`) VALUES
(14, 'Strandja Memorial Boxing: Indias Deepak Kumar stuns Olympic champion Zoirov to enter final', '<p><span style=\"font-family: OpenSans-Regular, Arial, sans-serif, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; font-size: 17px;\">Indias Deepak Kumar pulled off one of the most memorable victories of his career on Friday as he stunned reigning Olympic and world champion Shakhobiddin Zoirov of Uzbekistan to make it to the final of 52kg final at the Strandja Memorial Boxing Tournament in Sofia, Bulgaria.</span><br></p>', 40, '2021-02-27 00:36:47'),
(15, 'ISL 2020-21: NorthEast United beat Kerala Blasters 2-0, reach play-offs with best-ever league finish', '<p><span style=\"font-family: OpenSans-Regular, Arial, sans-serif, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; font-size: 17px;\">NorthEast United sealed their playoff berth following their 2-0 win over Kerala Blasters FC in the Indian Super League at the Tilak Maidan on Friday. Having extended their unbeaten run to nine games, coach Khalid Jamil also created history by becoming the first Indian manager to have managed three or more league games and still steered his team to the playoffs.</span><br></p>', 39, '2021-01-27 00:37:20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_online_appointment`
--

CREATE TABLE `tbl_online_appointment` (
  `Order_Id` int(11) NOT NULL,
  `Doc_Id` int(11) NOT NULL,
  `Cust_Id` int(11) NOT NULL,
  `App_Day` varchar(20) NOT NULL,
  `App_Shift` varchar(20) NOT NULL,
  `App_Time` varchar(50) NOT NULL,
  `Order_Status` varchar(50) NOT NULL,
  `pay_status` int(2) NOT NULL,
  `App_date` varchar(50) NOT NULL,
  `Order_Created_Date` datetime(6) DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_online_appointment`
--

INSERT INTO `tbl_online_appointment` (`Order_Id`, `Doc_Id`, `Cust_Id`, `App_Day`, `App_Shift`, `App_Time`, `Order_Status`, `pay_status`, `App_date`, `Order_Created_Date`) VALUES
(51, 23, 42, 'Wed', 'Morning', '10:00 AM-12:00 PM', 'Confirm', 1, '2021-06-02', '2021-05-27 11:00:31.262103'),
(52, 31, 42, 'Wed', 'Morning', '11:00 AM - 8:00 PM', 'Pending', 0, '2021-06-23', '2021-06-18 20:24:42.932250'),
(53, 31, 42, 'Wed', 'Morning', '11:00 AM - 8:00 PM', 'Pending', 0, '2021-06-23', '2021-06-18 20:30:30.031543');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_opening_time`
--

CREATE TABLE `tbl_opening_time` (
  `Opn_Id` int(11) NOT NULL,
  `Opn_Day` varchar(50) NOT NULL,
  `Opn_Time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_opening_time`
--

INSERT INTO `tbl_opening_time` (`Opn_Id`, `Opn_Day`, `Opn_Time`) VALUES
(7, 'Monday', '10:00 AM - 8:00 PM'),
(8, 'Tuesday', '10:00 AM - 8:00 PM'),
(9, 'Wednesday', '10:00 AM - 8:00 PM'),
(10, 'Thusday', '10:00 AM - 8:00 PM'),
(11, 'Friday', '10:00 AM - 8:00 PM'),
(12, 'Saturday', '10:00 AM - 8:00 PM'),
(13, 'Sunday', 'Close');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `Pay_Id` int(11) NOT NULL,
  `Pay_Order_Id` varchar(100) NOT NULL,
  `Order_Id` int(11) NOT NULL,
  `Pay_Mode` varchar(50) NOT NULL,
  `Pay_Type` varchar(50) NOT NULL,
  `Pay_Amount` double NOT NULL,
  `Pay_Bank` varchar(50) NOT NULL,
  `Pay_Date` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`Pay_Id`, `Pay_Order_Id`, `Order_Id`, `Pay_Mode`, `Pay_Type`, `Pay_Amount`, `Pay_Bank`, `Pay_Date`) VALUES
(55, 'pay_HFhfs3IHRuvdRW', 51, 'Online', 'Online', 250, 'SBIN', '2021-05-27 11:06:26.494015');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment_status`
--

CREATE TABLE `tbl_payment_status` (
  `pay_Id` int(11) NOT NULL,
  `Pay_Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_payment_status`
--

INSERT INTO `tbl_payment_status` (`pay_Id`, `Pay_Name`) VALUES
(0, 'Not Payment'),
(1, 'Payment Success');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sub_gallery_master`
--

CREATE TABLE `tbl_sub_gallery_master` (
  `Gall_Sub_Id` int(11) NOT NULL,
  `Gall_Id` int(11) NOT NULL,
  `Gall_Sub_Image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_sub_gallery_master`
--

INSERT INTO `tbl_sub_gallery_master` (`Gall_Sub_Id`, `Gall_Id`, `Gall_Sub_Image`) VALUES
(1, 1, '1614411991_Bapi.jpg.jpg'),
(2, 1, '1614411991_cmputr.png'),
(3, 1, '1614411991_PicsArt_10-16-10.35.16.jpg'),
(24, 8, '1614601697_Screenshot (1).png'),
(25, 8, '1614601697_Screenshot (2).png'),
(26, 8, '1614601697_Screenshot (3).png'),
(27, 8, '1614601697_Screenshot (4).png'),
(28, 9, '1618573793_artsfon.com-15086-1200x675.jpg'),
(29, 9, '1618573806_sd3-1630x850.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `User_Id` int(11) NOT NULL,
  `User_Name` varchar(100) NOT NULL,
  `User_Gender` varchar(20) NOT NULL,
  `User_Dob` varchar(20) NOT NULL,
  `User_Email` varchar(100) NOT NULL,
  `User_Mobile` varchar(20) NOT NULL,
  `User_Address` varchar(200) NOT NULL,
  `User_Password` varchar(50) NOT NULL,
  `User_Email_Verify` varchar(100) NOT NULL,
  `User_Verify_Status` varchar(10) NOT NULL,
  `User_Added_Date` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`User_Id`, `User_Name`, `User_Gender`, `User_Dob`, `User_Email`, `User_Mobile`, `User_Address`, `User_Password`, `User_Email_Verify`, `User_Verify_Status`, `User_Added_Date`) VALUES
(42, 'Baki Dis', 'Male', '2021-05-27', 'swarnakarr34@gmail.com', '9609304072', 'VILL-KUSHGRAM,PO-TAM CHARI MATH BARI', 'b63e87', 'b63e871bb02023addc34ec819285a588', 'Yes', '2021-05-27 11:00:17.181496');

-- --------------------------------------------------------

--
-- Table structure for table `tb_galllery_master`
--

CREATE TABLE `tb_galllery_master` (
  `Gall_Id` int(11) NOT NULL,
  `Gall_Title` varchar(250) NOT NULL,
  `Gall_Image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_galllery_master`
--

INSERT INTO `tb_galllery_master` (`Gall_Id`, `Gall_Title`, `Gall_Image`) VALUES
(8, 'Test', '1614601292_logo.jpg'),
(9, 'Kolkata Hospital', '1618573780_telecom-2-1200x675.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `table_department_master`
--
ALTER TABLE `table_department_master`
  ADD PRIMARY KEY (`Dept_Id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`Admin_Id`);

--
-- Indexes for table `tbl_doctor_appointment`
--
ALTER TABLE `tbl_doctor_appointment`
  ADD PRIMARY KEY (`App_Id`);

--
-- Indexes for table `tbl_doctor_education`
--
ALTER TABLE `tbl_doctor_education`
  ADD PRIMARY KEY (`Edu_Id`);

--
-- Indexes for table `tbl_doctor_master`
--
ALTER TABLE `tbl_doctor_master`
  ADD PRIMARY KEY (`Doc_Id`);

--
-- Indexes for table `tbl_doctor_membership`
--
ALTER TABLE `tbl_doctor_membership`
  ADD PRIMARY KEY (`Mem_Id`);

--
-- Indexes for table `tbl_doctor_profile_image`
--
ALTER TABLE `tbl_doctor_profile_image`
  ADD PRIMARY KEY (`Pro_Id`);

--
-- Indexes for table `tbl_doctor_specialization`
--
ALTER TABLE `tbl_doctor_specialization`
  ADD PRIMARY KEY (`Spl_Id`);

--
-- Indexes for table `tbl_feedback_master`
--
ALTER TABLE `tbl_feedback_master`
  ADD PRIMARY KEY (`Feed_Id`);

--
-- Indexes for table `tbl_need_help`
--
ALTER TABLE `tbl_need_help`
  ADD PRIMARY KEY (`Help_Id`);

--
-- Indexes for table `tbl_news`
--
ALTER TABLE `tbl_news`
  ADD PRIMARY KEY (`Blog_Id`);

--
-- Indexes for table `tbl_online_appointment`
--
ALTER TABLE `tbl_online_appointment`
  ADD PRIMARY KEY (`Order_Id`);

--
-- Indexes for table `tbl_opening_time`
--
ALTER TABLE `tbl_opening_time`
  ADD PRIMARY KEY (`Opn_Id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`Pay_Id`);

--
-- Indexes for table `tbl_payment_status`
--
ALTER TABLE `tbl_payment_status`
  ADD PRIMARY KEY (`pay_Id`);

--
-- Indexes for table `tbl_sub_gallery_master`
--
ALTER TABLE `tbl_sub_gallery_master`
  ADD PRIMARY KEY (`Gall_Sub_Id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`User_Id`);

--
-- Indexes for table `tb_galllery_master`
--
ALTER TABLE `tb_galllery_master`
  ADD PRIMARY KEY (`Gall_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `table_department_master`
--
ALTER TABLE `table_department_master`
  MODIFY `Dept_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `Admin_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_doctor_appointment`
--
ALTER TABLE `tbl_doctor_appointment`
  MODIFY `App_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tbl_doctor_education`
--
ALTER TABLE `tbl_doctor_education`
  MODIFY `Edu_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `tbl_doctor_master`
--
ALTER TABLE `tbl_doctor_master`
  MODIFY `Doc_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tbl_doctor_membership`
--
ALTER TABLE `tbl_doctor_membership`
  MODIFY `Mem_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tbl_doctor_profile_image`
--
ALTER TABLE `tbl_doctor_profile_image`
  MODIFY `Pro_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_doctor_specialization`
--
ALTER TABLE `tbl_doctor_specialization`
  MODIFY `Spl_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `tbl_feedback_master`
--
ALTER TABLE `tbl_feedback_master`
  MODIFY `Feed_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_need_help`
--
ALTER TABLE `tbl_need_help`
  MODIFY `Help_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_news`
--
ALTER TABLE `tbl_news`
  MODIFY `Blog_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_online_appointment`
--
ALTER TABLE `tbl_online_appointment`
  MODIFY `Order_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `tbl_opening_time`
--
ALTER TABLE `tbl_opening_time`
  MODIFY `Opn_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `Pay_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `tbl_sub_gallery_master`
--
ALTER TABLE `tbl_sub_gallery_master`
  MODIFY `Gall_Sub_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `User_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tb_galllery_master`
--
ALTER TABLE `tb_galllery_master`
  MODIFY `Gall_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
