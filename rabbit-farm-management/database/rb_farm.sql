-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2023 at 01:48 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+07:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rb_farm`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_description`
--

CREATE TABLE `tbl_description` (
  `desc_id` int(10) NOT NULL,
  `desc_header` varchar(255) DEFAULT NULL,
  `desc_content` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_description`
--

INSERT INTO `tbl_description` (`desc_id`, `desc_header`, `desc_content`) VALUES
(1, 'ฟาร์มกระต่าย', 'จังหวัดศรีสะเกษ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_health`
--

CREATE TABLE `tbl_health` (
  `id` int(10) NOT NULL,
  `fk_id` int(10) DEFAULT NULL,
  `number` int(10) DEFAULT NULL,
  `vaccine` varchar(50) DEFAULT NULL,
  `poop` varchar(255) DEFAULT NULL,
  `behavior` varchar(255) DEFAULT NULL,
  `eat_grass` varchar(50) DEFAULT NULL,
  `eat_pellets` varchar(50) DEFAULT NULL,
  `date_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_health`
--

INSERT INTO `tbl_health` (`id`, `fk_id`, `number`, `vaccine`, `poop`, `behavior`, `eat_grass`, `eat_pellets`, `date_time`) VALUES
(36, 10, 1, 'หญ้าบด', 'เป็นของเหลว', 'ปกติ', 'ไม่กินหญ้า', 'ปกติ', '2023-03-16 19:22:12'),
(37, 11, 1, 'หญ้าบด', 'เป็นของเหลว', 'ปกติ', 'ไม่กินหญ้า', 'ปกติ', '2023-03-16 19:28:05');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_members`
--

CREATE TABLE `tbl_members` (
  `id` int(10) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_members`
--

INSERT INTO `tbl_members` (`id`, `img`, `username`, `password`, `phone`, `email`, `role`) VALUES
(1, '211858624.jpg', 'admin1', '123456', '0123456789', 'admin@gmail.com', 'แอดมิน'),
(2, '1411208772.jpg', 'emp1', '123456', '0123456789', 'emp@gmail.com', 'พนักงาน');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notification`
--

CREATE TABLE `tbl_notification` (
  `notify_id` int(10) NOT NULL,
  `notify_content` varchar(255) DEFAULT NULL,
  `notify_date_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rabbit`
--

CREATE TABLE `tbl_rabbit` (
  `id` int(10) NOT NULL,
  `rb_cage` varchar(50) DEFAULT NULL,
  `rb_id` varchar(50) DEFAULT NULL,
  `rb_gender` varchar(50) DEFAULT NULL,
  `rb_birthday` date DEFAULT NULL,
  `rb_status` varchar(50) DEFAULT NULL,
  `rb_type` varchar(50) DEFAULT NULL,
  `rb_hb` varchar(100) DEFAULT NULL,
  `rb_fid` varchar(50) DEFAULT NULL,
  `rb_mid` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_rabbit`
--

INSERT INTO `tbl_rabbit` (`id`, `rb_cage`, `rb_id`, `rb_gender`, `rb_birthday`, `rb_status`, `rb_type`, `rb_hb`, `rb_fid`, `rb_mid`) VALUES
(7, 'G01', 'A01', 'เพศเมีย', '2023-03-16', 'แม่พันธุ์', 'กระต่ายเนื้อ', '---', 'ไม่ทราบพ่อพันธุ์ฺ', 'ไม่ทราบแม่พันธุ์'),
(8, 'G02', 'A02', 'เพศเมีย', '2022-11-16', 'แม่พันธุ์', 'กระต่ายเนื้อ', '---', 'ไม่ทราบพ่อพันธุ์ฺ', 'ไม่ทราบแม่พันธุ์'),
(9, 'G03', 'B01', 'เพศผู้', '2023-01-16', 'พ่อพันธุ์', 'กระต่ายเนื้อ', '---', 'ไม่ทราบพ่อพันธุ์ฺ', 'ไม่ทราบแม่พันธุ์'),
(10, 'G04', 'A04', 'เพศผู้', '2023-03-16', 'พ่อพันธุ์', 'กระต่ายเนื้อ', 'กระต่ายพื้นเมือง', 'B01', 'G01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rabbit_hb`
--

CREATE TABLE `tbl_rabbit_hb` (
  `id` int(10) NOT NULL,
  `hb_cage` varchar(50) DEFAULT NULL,
  `hb_rb_fid` varchar(50) DEFAULT NULL,
  `hb_rb_mid` varchar(50) DEFAULT NULL,
  `hb_date` date DEFAULT NULL,
  `hb_schedule` date DEFAULT NULL,
  `hb_day` int(100) DEFAULT NULL,
  `hb_status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_rabbit_hb`
--

INSERT INTO `tbl_rabbit_hb` (`id`, `hb_cage`, `hb_rb_fid`, `hb_rb_mid`, `hb_date`, `hb_schedule`, `hb_day`, `hb_status`) VALUES
(14, 'G01', 'B01', 'A01', '2023-03-16', '2023-04-15', 30, 'กำลังตั้งท้อง'),
(15, 'G02', 'B01', 'A02', '2023-02-15', '2023-03-17', 1, 'คลอดแล้ว'),
(16, 'G01', 'B01', 'A03', '2023-03-16', '2023-04-15', 30, 'คลอดแล้ว');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rabbit_heal`
--

CREATE TABLE `tbl_rabbit_heal` (
  `id` int(10) NOT NULL,
  `heal_cage` varchar(50) DEFAULT NULL,
  `heal_id` varchar(50) DEFAULT NULL,
  `heal_date` date DEFAULT NULL,
  `heal_status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_rabbit_heal`
--

INSERT INTO `tbl_rabbit_heal` (`id`, `heal_cage`, `heal_id`, `heal_date`, `heal_status`) VALUES
(10, 'G01', 'A01', '2023-03-16', 'กำลังรักษา'),
(11, 'G01', 'A01', '2023-03-16', 'กำลังรักษา');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vaccine`
--

CREATE TABLE `tbl_vaccine` (
  `id` int(10) NOT NULL,
  `name_vaccine` varchar(255) DEFAULT NULL,
  `method` text DEFAULT NULL,
  `detail` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_vaccine`
--

INSERT INTO `tbl_vaccine` (`id`, `name_vaccine`, `method`, `detail`) VALUES
(9, 'หญ้าบด', 'ใช้ไซริ้งป้อนยา', 'สำหรับกระต่ายที่ไม่กินหญ้า'),
(10, 'แรบบิท แคร์', 'ผสมน้ำสะอาด', 'ช่วยบำรุงสุขภาพกระต่าย');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_description`
--
ALTER TABLE `tbl_description`
  ADD PRIMARY KEY (`desc_id`);

--
-- Indexes for table `tbl_health`
--
ALTER TABLE `tbl_health`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_members`
--
ALTER TABLE `tbl_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  ADD PRIMARY KEY (`notify_id`);

--
-- Indexes for table `tbl_rabbit`
--
ALTER TABLE `tbl_rabbit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_rabbit_hb`
--
ALTER TABLE `tbl_rabbit_hb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_rabbit_heal`
--
ALTER TABLE `tbl_rabbit_heal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_vaccine`
--
ALTER TABLE `tbl_vaccine`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_description`
--
ALTER TABLE `tbl_description`
  MODIFY `desc_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_health`
--
ALTER TABLE `tbl_health`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tbl_members`
--
ALTER TABLE `tbl_members`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  MODIFY `notify_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_rabbit`
--
ALTER TABLE `tbl_rabbit`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_rabbit_hb`
--
ALTER TABLE `tbl_rabbit_hb`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_rabbit_heal`
--
ALTER TABLE `tbl_rabbit_heal`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_vaccine`
--
ALTER TABLE `tbl_vaccine`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
