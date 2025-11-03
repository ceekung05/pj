-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2025 at 10:34 AM
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
-- Database: `stroke_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_congenital disease`
--

CREATE TABLE `tbl_congenital disease` (
  `id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `is_ht` tinyint(1) NOT NULL,
  `is_dm` tinyint(1) NOT NULL,
  `is_dlp` tinyint(1) NOT NULL,
  `is_mi` tinyint(1) NOT NULL,
  `is_af` tinyint(1) NOT NULL,
  `other_detail` varchar(255) NOT NULL,
  `is_smoking` tinyint(1) NOT NULL,
  `is_alcohol` tinyint(1) NOT NULL,
  `is_addictive_substance` tinyint(1) NOT NULL,
  `is_oldcva` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_drug`
--

CREATE TABLE `tbl_drug` (
  `id` int(11) NOT NULL,
  `cid` varchar(255) NOT NULL,
  `is_anti_platelct` tinyint(1) NOT NULL,
  `is_anti_coylont` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_patient`
--

CREATE TABLE `tbl_patient` (
  `id` int(11) NOT NULL,
  `cid` bigint(20) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `hn` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` varchar(255) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `updated_by` varchar(255) NOT NULL,
  `mrs` int(11) NOT NULL,
  `visit_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `hr_fname` varchar(255) NOT NULL COMMENT 'ชื่อ-นามสกุล ของบุคลากร',
  `hr_cid` varchar(13) NOT NULL COMMENT 'เลขประจำตัวประชาชน',
  `password` varchar(255) DEFAULT NULL,
  `position_in_work` varchar(255) NOT NULL COMMENT 'ตำแหน่งงาน',
  `department_name` varchar(255) NOT NULL COMMENT 'ชื่อหน่วยงานหลัก (ระดับภารกิจ/ฝ่าย)',
  `hr_department_sub_name` varchar(255) NOT NULL COMMENT 'ชื่อหน่วยงานย่อย (ระดับกลุ่มงาน)',
  `hr_department_sub_sub_name` varchar(255) NOT NULL COMMENT 'ชื่อหน่วยงานย่อยที่สุด (ระดับงาน)',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'เวลาที่สร้าง',
  `created_by` varchar(255) DEFAULT NULL COMMENT 'สร้างโดย',
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp() COMMENT 'เวลาอัพเดท',
  `updated_by` varchar(255) DEFAULT NULL COMMENT 'อัพเดทโดย',
  `last_login` timestamp NULL DEFAULT NULL COMMENT 'เวลาที่ใช้งานล่าสุด'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `hr_fname`, `hr_cid`, `password`, `position_in_work`, `department_name`, `hr_department_sub_name`, `hr_department_sub_sub_name`, `created_at`, `created_by`, `updated_at`, `updated_by`, `last_login`) VALUES
(1, 'พิชัย จินดาประเสริฐ', '3333333333332', NULL, 'นักศึกษาฝึกงาน', 'ภารกิจสุขภาพดิจิทัล', 'กลุ่มงานเทคโนโลยีสารสนเทศ', 'งานเทคโนโลยีสารสนเทศ', '2025-10-28 04:49:08', 'admin', '2025-10-28 04:49:08', '[value-11]', NULL),
(2, 'สุขใจ (ทดสอบ) ซ่อมไว', '2222222222223', NULL, 'นักวิชาการคอมพิวเตอร์', 'ภารกิจสุขภาพดิจิทัล', 'กลุ่มงานเทคโนโลยีสารสนเทศ', 'งานเทคโนโลยีสารสนเทศ', '2025-10-28 06:59:18', '2222222222223', '2025-11-03 07:12:18', '2222222222223', '2025-11-03 07:12:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_congenital disease`
--
ALTER TABLE `tbl_congenital disease`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_patient`
--
ALTER TABLE `tbl_patient`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `index` (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hr_cid` (`hr_cid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_congenital disease`
--
ALTER TABLE `tbl_congenital disease`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_patient`
--
ALTER TABLE `tbl_patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
