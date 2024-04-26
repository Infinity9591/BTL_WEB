-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2024 at 03:52 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `baitaplonweb`
--
CREATE DATABASE IF NOT EXISTS `baitaplonweb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `baitaplonweb`;

-- --------------------------------------------------------

--
-- Table structure for table `bang_diem_tieng_anh`
--

CREATE TABLE IF NOT EXISTS `bang_diem_tieng_anh` (
  `ma_hoc_sinh` int(11) NOT NULL,
  `ma_giao_vien` int(11) NOT NULL,
  `diem_ky_2` int(11) DEFAULT NULL,
  `diem_ky_1` int(11) DEFAULT NULL,
  PRIMARY KEY (`ma_hoc_sinh`),
  KEY `ma_giao_vien` (`ma_giao_vien`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bang_diem_tieng_anh`
--

INSERT INTO `bang_diem_tieng_anh` (`ma_hoc_sinh`, `ma_giao_vien`, `diem_ky_2`, `diem_ky_1`) VALUES
(1, 3, 7, 7),
(2, 3, 6, 6),
(3, 3, 5, 8);

-- --------------------------------------------------------

--
-- Table structure for table `bang_diem_tieng_viet`
--

CREATE TABLE IF NOT EXISTS `bang_diem_tieng_viet` (
  `ma_hoc_sinh` int(11) NOT NULL,
  `ma_giao_vien` int(11) NOT NULL,
  `diem_giua_ky_1` int(11) DEFAULT NULL,
  `diem_cuoi_ky_1` int(11) DEFAULT NULL,
  `diem_giua_ky_2` int(11) DEFAULT NULL,
  `diem_cuoi_ky_2` int(11) DEFAULT NULL,
  PRIMARY KEY (`ma_hoc_sinh`),
  KEY `ma_giao_vien` (`ma_giao_vien`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bang_diem_tieng_viet`
--

INSERT INTO `bang_diem_tieng_viet` (`ma_hoc_sinh`, `ma_giao_vien`, `diem_giua_ky_1`, `diem_cuoi_ky_1`, `diem_giua_ky_2`, `diem_cuoi_ky_2`) VALUES
(1, 2, 7, 6, 8, 5),
(2, 2, 6, 7, 5, 10),
(3, 2, 10, 5, 6, 8);

-- --------------------------------------------------------

--
-- Table structure for table `bang_diem_toan`
--

CREATE TABLE IF NOT EXISTS `bang_diem_toan` (
  `ma_hoc_sinh` int(11) NOT NULL,
  `ma_giao_vien` int(11) NOT NULL,
  `diem_giua_ky_1` int(11) DEFAULT NULL,
  `diem_cuoi_ky_1` int(11) DEFAULT NULL,
  `diem_giua_ky_2` int(11) DEFAULT NULL,
  `diem_cuoi_ky_2` int(11) DEFAULT NULL,
  PRIMARY KEY (`ma_hoc_sinh`),
  KEY `ma_giao_vien` (`ma_giao_vien`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bang_diem_toan`
--

INSERT INTO `bang_diem_toan` (`ma_hoc_sinh`, `ma_giao_vien`, `diem_giua_ky_1`, `diem_cuoi_ky_1`, `diem_giua_ky_2`, `diem_cuoi_ky_2`) VALUES
(1, 1, 7, 10, 7, 10),
(2, 1, 6, 7, 8, 8),
(3, 1, 7, 6, 6, 5);

-- --------------------------------------------------------

--
-- Table structure for table `giao_vien`
--

CREATE TABLE IF NOT EXISTS `giao_vien` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ngay_sinh` date DEFAULT NULL,
  `dia_chi` text DEFAULT NULL,
  `sdt` varchar(15) DEFAULT NULL,
  `ma_mon` int(11) DEFAULT NULL,
  `ma_lop` int(11) DEFAULT NULL,
  `ma_account` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `giao_vien___fk` (`ma_account`),
  KEY `giao_vien___fk2` (`ma_mon`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `giao_vien`
--

INSERT INTO `giao_vien` (`id`, `ten`, `ngay_sinh`, `dia_chi`, `sdt`, `ma_mon`, `ma_lop`, `ma_account`) VALUES
(1, 'A', '2023-12-01', 'Quảng Ninh', '34532432', 1, 25, 2),
(2, 'B', '2023-12-01', 'Hà Nội', '3453425345', 2, 25, 3),
(3, 'C', '2023-12-30', 'Hải Dương', '3214325324', 3, 23, 4),
(4, 'E', '2023-12-13', 'TP. Hồ Chí Minh', '435324', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `hoc_sinh`
--

CREATE TABLE IF NOT EXISTS `hoc_sinh` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ma_lop` int(11) DEFAULT NULL,
  `ngay_sinh` date DEFAULT NULL,
  `dia_chi` text DEFAULT NULL,
  `sdt_bome` varchar(15) NOT NULL,
  `ghi_chu` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ma_lop` (`ma_lop`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hoc_sinh`
--

INSERT INTO `hoc_sinh` (`id`, `ten`, `ma_lop`, `ngay_sinh`, `dia_chi`, `sdt_bome`, `ghi_chu`) VALUES
(1, 'Sơn', 21, '2023-12-20', 'Hải Phòng', '324324', 'Học ngu'),
(2, 'Quỳ', 25, '2023-12-02', 'Thái Bình', '32423432', 'Học ngu'),
(3, 'Nam', 23, '2023-12-17', 'Nam Định', '0123456789', 'Học ngu');

-- --------------------------------------------------------

--
-- Table structure for table `lop`
--

CREATE TABLE IF NOT EXISTS `lop` (
  `id` int(11) NOT NULL,
  `ten_lop` varchar(5) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ten_lop` (`ten_lop`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lop`
--

INSERT INTO `lop` (`id`, `ten_lop`) VALUES
(1, '1A1'),
(2, '1A2'),
(3, '1A3'),
(4, '1A4'),
(5, '1A5'),
(6, '2A1'),
(7, '2A2'),
(8, '2A3'),
(9, '2A4'),
(10, '2A5'),
(11, '3A1'),
(12, '3A2'),
(13, '3A3'),
(14, '3A4'),
(15, '3A5'),
(16, '4A1'),
(17, '4A2'),
(18, '4A3'),
(19, '4A4'),
(20, '4A5'),
(21, '5A1'),
(22, '5A2'),
(23, '5A3'),
(24, '5A4'),
(25, '5A5');

-- --------------------------------------------------------

--
-- Table structure for table `mon_hoc`
--

CREATE TABLE IF NOT EXISTS `mon_hoc` (
  `id` int(11) NOT NULL,
  `ten_mon` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mon_hoc`
--

INSERT INTO `mon_hoc` (`id`, `ten_mon`) VALUES
(1, 'Toán'),
(2, 'Tiếng Việt'),
(3, 'Tiếng Anh');

-- --------------------------------------------------------

--
-- Stand-in structure for view `quan_ly_chi_tiet_diem_hoc_sinh`
-- (See below for the actual view)
--
CREATE TABLE IF NOT EXISTS `quan_ly_chi_tiet_diem_hoc_sinh` (
`id` int(11)
,`ten` varchar(255)
,`ten_lop` varchar(5)
,`diem_giua_ky_1_toan` int(11)
,`diem_cuoi_ky_1_toan` int(11)
,`diem_giua_ky_2_toan` int(11)
,`diem_cuoi_ky_2_toan` int(11)
,`toan` decimal(13,1)
,`diem_giua_ky_1_tv` int(11)
,`diem_cuoi_ky_1_tv` int(11)
,`diem_giua_ky_2_tv` int(11)
,`diem_cuoi_ky_2_tv` int(11)
,`tieng_viet` decimal(13,1)
,`diem_cuoi_ky_1_ta` int(11)
,`diem_cuoi_ky_2_ta` int(11)
,`tieng_anh` decimal(13,1)
,`xep_loai` varchar(10)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `quan_ly_diem_hoc_sinh`
-- (See below for the actual view)
--
CREATE TABLE IF NOT EXISTS `quan_ly_diem_hoc_sinh` (
`id` int(11)
,`ten` varchar(255)
,`ten_lop` varchar(5)
,`toan` decimal(13,1)
,`tieng_viet` decimal(13,1)
,`tieng_anh` decimal(13,1)
,`xep_loai` varchar(10)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `quan_ly_diem_tieng_anh`
-- (See below for the actual view)
--
CREATE TABLE IF NOT EXISTS `quan_ly_diem_tieng_anh` (
`ma_hoc_sinh` int(11)
,`ma_giao_vien` int(11)
,`diem_ky_1` int(11)
,`diem_ky_2` int(11)
,`diem_trung_binh_nam` decimal(13,1)
,`xep_loai` varchar(10)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `quan_ly_diem_tieng_viet`
-- (See below for the actual view)
--
CREATE TABLE IF NOT EXISTS `quan_ly_diem_tieng_viet` (
`ma_hoc_sinh` int(11)
,`ma_giao_vien` int(11)
,`diem_giua_ky_1` int(11)
,`diem_cuoi_ky_1` int(11)
,`diem_giua_ky_2` int(11)
,`diem_cuoi_ky_2` int(11)
,`diem_trung_binh_nam` decimal(13,1)
,`xep_loai` varchar(10)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `quan_ly_diem_toan`
-- (See below for the actual view)
--
CREATE TABLE IF NOT EXISTS `quan_ly_diem_toan` (
`ma_hoc_sinh` int(11)
,`ma_giao_vien` int(11)
,`diem_giua_ky_1` int(11)
,`diem_cuoi_ky_1` int(11)
,`diem_giua_ky_2` int(11)
,`diem_cuoi_ky_2` int(11)
,`diem_trung_binh_nam` decimal(13,1)
,`xep_loai` varchar(10)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `quan_ly_giao_vien`
-- (See below for the actual view)
--
CREATE TABLE IF NOT EXISTS `quan_ly_giao_vien` (
`id` int(11)
,`username` varchar(255)
,`ten` varchar(255)
,`ngay_sinh` date
,`ten_lop` varchar(5)
,`ten_mon` varchar(50)
,`dia_chi` text
,`sdt` varchar(15)
,`ten_role` varchar(20)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `quan_ly_hoc_sinh`
-- (See below for the actual view)
--
CREATE TABLE IF NOT EXISTS `quan_ly_hoc_sinh` (
`id` int(11)
,`ten` varchar(255)
,`ten_lop` varchar(5)
,`ngay_sinh` date
,`dia_chi` text
,`sdt_bome` varchar(15)
,`toan` decimal(13,1)
,`tieng_viet` decimal(13,1)
,`tieng_anh` decimal(13,1)
,`xep_loai` varchar(10)
,`ghi_chu` text
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `quan_ly_lop`
-- (See below for the actual view)
--
CREATE TABLE IF NOT EXISTS `quan_ly_lop` (
`id` int(11)
,`ten_lop` varchar(5)
,`so_hoc_sinh` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `quan_ly_user`
-- (See below for the actual view)
--
CREATE TABLE IF NOT EXISTS `quan_ly_user` (
`id` int(11)
,`username` varchar(255)
,`password_hash` varchar(255)
,`ten` varchar(255)
,`ten_role` varchar(20)
);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL,
  `ten_role` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `ten_role`) VALUES
(1, 'Ban giám hiệu'),
(2, 'Giáo viên chủ nhiệm'),
(3, 'Giáo viên bộ môn');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL INVISIBLE DEFAULT 'quanly',
  `password_hash` varchar(255) DEFAULT NULL,
  `auth_key` varchar(255) NOT NULL DEFAULT concat(`username`,'key'),
  `ma_role` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ma_role` (`ma_role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `password_hash`, `auth_key`, `ma_role`, `status`) VALUES
(1, 'admin', 'quanly', 'ElY7mYdikTWO9vfxtVgHuG82Y2V6dlhMNTRqTGhwNExhT24zNlE9PQ==', 'adminkey', 1, 1),
(2, 'toan', 'quanly', 'hMGlvVag/0HGhaCFs8XEQkRmK05EaHpmZVVkWUp2eGhLT3BJeWc9PQ==', 'toankey', 3, 1),
(3, 'tiengviet', 'quanly', 'Q7PRpgulwB4mktj7PhqE3zY3Yk0vdnJvU0FNVkZWYXhHWTJuR2c9PQ==', 'tiengvietkey', 2, 1),
(4, 'tienganh', 'quanly', '845oq+PXJ1J5jMPny4lEvXlSMjJoUmNGaDBENnFlRERyV0tEOHc9PQ==', 'tienganhkey', 3, 1),
(5, 'amen', 'quanly', 'KyIpRbmOBhYs95CigL0+vHZlazZNU2dIWDJoMThQNW9SM3BMZUE9PQ==', 'amenkey', 1, 1);

-- --------------------------------------------------------

--
-- Structure for view `quan_ly_chi_tiet_diem_hoc_sinh`
--
DROP TABLE IF EXISTS `quan_ly_chi_tiet_diem_hoc_sinh`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `quan_ly_chi_tiet_diem_hoc_sinh`  AS SELECT `hoc_sinh`.`id` AS `id`, `hoc_sinh`.`ten` AS `ten`, `lop`.`ten_lop` AS `ten_lop`, `quan_ly_diem_toan`.`diem_giua_ky_1` AS `diem_giua_ky_1_toan`, `quan_ly_diem_toan`.`diem_cuoi_ky_1` AS `diem_cuoi_ky_1_toan`, `quan_ly_diem_toan`.`diem_giua_ky_2` AS `diem_giua_ky_2_toan`, `quan_ly_diem_toan`.`diem_cuoi_ky_2` AS `diem_cuoi_ky_2_toan`, `quan_ly_diem_toan`.`diem_trung_binh_nam` AS `toan`, `quan_ly_diem_tieng_viet`.`diem_giua_ky_1` AS `diem_giua_ky_1_tv`, `quan_ly_diem_tieng_viet`.`diem_cuoi_ky_1` AS `diem_cuoi_ky_1_tv`, `quan_ly_diem_tieng_viet`.`diem_giua_ky_2` AS `diem_giua_ky_2_tv`, `quan_ly_diem_tieng_viet`.`diem_cuoi_ky_2` AS `diem_cuoi_ky_2_tv`, `quan_ly_diem_tieng_viet`.`diem_trung_binh_nam` AS `tieng_viet`, `quan_ly_diem_tieng_anh`.`diem_ky_1` AS `diem_cuoi_ky_1_ta`, `quan_ly_diem_tieng_anh`.`diem_ky_2` AS `diem_cuoi_ky_2_ta`, `quan_ly_diem_tieng_viet`.`diem_trung_binh_nam` AS `tieng_anh`, if((`quan_ly_diem_toan`.`diem_trung_binh_nam` + `quan_ly_diem_tieng_viet`.`diem_trung_binh_nam` + `quan_ly_diem_tieng_viet`.`diem_trung_binh_nam`) / 3 >= 8 and (`quan_ly_diem_toan`.`diem_trung_binh_nam` + `quan_ly_diem_tieng_viet`.`diem_trung_binh_nam` + `quan_ly_diem_tieng_viet`.`diem_trung_binh_nam`) / 3 <= 10,'Giỏi',if((`quan_ly_diem_toan`.`diem_trung_binh_nam` + `quan_ly_diem_tieng_viet`.`diem_trung_binh_nam` + `quan_ly_diem_tieng_viet`.`diem_trung_binh_nam`) / 3 < 8 and (`quan_ly_diem_toan`.`diem_trung_binh_nam` + `quan_ly_diem_tieng_viet`.`diem_trung_binh_nam` + `quan_ly_diem_tieng_viet`.`diem_trung_binh_nam`) / 3 >= 6.5,'Khá',if((`quan_ly_diem_toan`.`diem_trung_binh_nam` + `quan_ly_diem_tieng_viet`.`diem_trung_binh_nam` + `quan_ly_diem_tieng_viet`.`diem_trung_binh_nam`) / 3 < 6.5 and (`quan_ly_diem_toan`.`diem_trung_binh_nam` + `quan_ly_diem_tieng_viet`.`diem_trung_binh_nam` + `quan_ly_diem_tieng_viet`.`diem_trung_binh_nam`) / 3 >= 5,'Trung bình',if((`quan_ly_diem_toan`.`diem_trung_binh_nam` + `quan_ly_diem_tieng_viet`.`diem_trung_binh_nam` + `quan_ly_diem_tieng_viet`.`diem_trung_binh_nam`) / 3 < 5 and (`quan_ly_diem_toan`.`diem_trung_binh_nam` + `quan_ly_diem_tieng_viet`.`diem_trung_binh_nam` + `quan_ly_diem_tieng_viet`.`diem_trung_binh_nam`) / 3 >= 3,'Yếu',if((`quan_ly_diem_toan`.`diem_trung_binh_nam` + `quan_ly_diem_tieng_viet`.`diem_trung_binh_nam` + `quan_ly_diem_tieng_viet`.`diem_trung_binh_nam`) / 3 < 3 and (`quan_ly_diem_toan`.`diem_trung_binh_nam` + `quan_ly_diem_tieng_viet`.`diem_trung_binh_nam` + `quan_ly_diem_tieng_viet`.`diem_trung_binh_nam`) / 3 >= 0,'Kém',''))))) AS `xep_loai` FROM ((((`hoc_sinh` join `lop` on(`hoc_sinh`.`ma_lop` = `lop`.`id`)) left join `quan_ly_diem_tieng_anh` on(`hoc_sinh`.`id` = `quan_ly_diem_tieng_anh`.`ma_hoc_sinh`)) left join `quan_ly_diem_tieng_viet` on(`hoc_sinh`.`id` = `quan_ly_diem_tieng_viet`.`ma_hoc_sinh`)) left join `quan_ly_diem_toan` on(`hoc_sinh`.`id` = `quan_ly_diem_toan`.`ma_hoc_sinh`)) ;

-- --------------------------------------------------------

--
-- Structure for view `quan_ly_diem_hoc_sinh`
--
DROP TABLE IF EXISTS `quan_ly_diem_hoc_sinh`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `quan_ly_diem_hoc_sinh`  AS SELECT `hoc_sinh`.`id` AS `id`, `hoc_sinh`.`ten` AS `ten`, `lop`.`ten_lop` AS `ten_lop`, `quan_ly_diem_toan`.`diem_trung_binh_nam` AS `toan`, `quan_ly_diem_tieng_viet`.`diem_trung_binh_nam` AS `tieng_viet`, `quan_ly_diem_tieng_viet`.`diem_trung_binh_nam` AS `tieng_anh`, if((`quan_ly_diem_toan`.`diem_trung_binh_nam` + `quan_ly_diem_tieng_viet`.`diem_trung_binh_nam` + `quan_ly_diem_tieng_viet`.`diem_trung_binh_nam`) / 3 >= 8 and (`quan_ly_diem_toan`.`diem_trung_binh_nam` + `quan_ly_diem_tieng_viet`.`diem_trung_binh_nam` + `quan_ly_diem_tieng_viet`.`diem_trung_binh_nam`) / 3 <= 10,'Giỏi',if((`quan_ly_diem_toan`.`diem_trung_binh_nam` + `quan_ly_diem_tieng_viet`.`diem_trung_binh_nam` + `quan_ly_diem_tieng_viet`.`diem_trung_binh_nam`) / 3 < 8 and (`quan_ly_diem_toan`.`diem_trung_binh_nam` + `quan_ly_diem_tieng_viet`.`diem_trung_binh_nam` + `quan_ly_diem_tieng_viet`.`diem_trung_binh_nam`) / 3 >= 6.5,'Khá',if((`quan_ly_diem_toan`.`diem_trung_binh_nam` + `quan_ly_diem_tieng_viet`.`diem_trung_binh_nam` + `quan_ly_diem_tieng_viet`.`diem_trung_binh_nam`) / 3 < 6.5 and (`quan_ly_diem_toan`.`diem_trung_binh_nam` + `quan_ly_diem_tieng_viet`.`diem_trung_binh_nam` + `quan_ly_diem_tieng_viet`.`diem_trung_binh_nam`) / 3 >= 5,'Trung bình',if((`quan_ly_diem_toan`.`diem_trung_binh_nam` + `quan_ly_diem_tieng_viet`.`diem_trung_binh_nam` + `quan_ly_diem_tieng_viet`.`diem_trung_binh_nam`) / 3 < 5 and (`quan_ly_diem_toan`.`diem_trung_binh_nam` + `quan_ly_diem_tieng_viet`.`diem_trung_binh_nam` + `quan_ly_diem_tieng_viet`.`diem_trung_binh_nam`) / 3 >= 3,'Yếu',if((`quan_ly_diem_toan`.`diem_trung_binh_nam` + `quan_ly_diem_tieng_viet`.`diem_trung_binh_nam` + `quan_ly_diem_tieng_viet`.`diem_trung_binh_nam`) / 3 < 3 and (`quan_ly_diem_toan`.`diem_trung_binh_nam` + `quan_ly_diem_tieng_viet`.`diem_trung_binh_nam` + `quan_ly_diem_tieng_viet`.`diem_trung_binh_nam`) / 3 >= 0,'Kém',''))))) AS `xep_loai` FROM ((((`hoc_sinh` join `lop` on(`hoc_sinh`.`ma_lop` = `lop`.`id`)) left join `quan_ly_diem_tieng_anh` on(`hoc_sinh`.`id` = `quan_ly_diem_tieng_anh`.`ma_hoc_sinh`)) left join `quan_ly_diem_tieng_viet` on(`hoc_sinh`.`id` = `quan_ly_diem_tieng_viet`.`ma_hoc_sinh`)) left join `quan_ly_diem_toan` on(`hoc_sinh`.`id` = `quan_ly_diem_toan`.`ma_hoc_sinh`)) ;

-- --------------------------------------------------------

--
-- Structure for view `quan_ly_diem_tieng_anh`
--
DROP TABLE IF EXISTS `quan_ly_diem_tieng_anh`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `quan_ly_diem_tieng_anh`  AS SELECT `bang_diem_tieng_anh`.`ma_hoc_sinh` AS `ma_hoc_sinh`, `bang_diem_tieng_anh`.`ma_giao_vien` AS `ma_giao_vien`, `bang_diem_tieng_anh`.`diem_ky_1` AS `diem_ky_1`, `bang_diem_tieng_anh`.`diem_ky_2` AS `diem_ky_2`, round((`bang_diem_tieng_anh`.`diem_ky_2` + `bang_diem_tieng_anh`.`diem_ky_1`) / 2,1) AS `diem_trung_binh_nam`, if((`bang_diem_tieng_anh`.`diem_ky_2` + `bang_diem_tieng_anh`.`diem_ky_1`) / 2 >= 8 and (`bang_diem_tieng_anh`.`diem_ky_2` + `bang_diem_tieng_anh`.`diem_ky_1`) / 2 <= 10,'gioi',if((`bang_diem_tieng_anh`.`diem_ky_2` + `bang_diem_tieng_anh`.`diem_ky_1`) / 2 < 8 and (`bang_diem_tieng_anh`.`diem_ky_2` + `bang_diem_tieng_anh`.`diem_ky_1`) / 2 >= 6.5,'kha',if((`bang_diem_tieng_anh`.`diem_ky_2` + `bang_diem_tieng_anh`.`diem_ky_1`) / 2 < 6.5 and (`bang_diem_tieng_anh`.`diem_ky_2` + `bang_diem_tieng_anh`.`diem_ky_1`) / 2 >= 5,'trung_binh',if((`bang_diem_tieng_anh`.`diem_ky_2` + `bang_diem_tieng_anh`.`diem_ky_1`) / 2 < 5 and (`bang_diem_tieng_anh`.`diem_ky_2` + `bang_diem_tieng_anh`.`diem_ky_1`) / 2 >= 3,'yeu',if((`bang_diem_tieng_anh`.`diem_ky_2` + `bang_diem_tieng_anh`.`diem_ky_1`) / 2 < 3 and (`bang_diem_tieng_anh`.`diem_ky_2` + `bang_diem_tieng_anh`.`diem_ky_1`) / 2 >= 0,'kem',''))))) AS `xep_loai` FROM `bang_diem_tieng_anh` ;

-- --------------------------------------------------------

--
-- Structure for view `quan_ly_diem_tieng_viet`
--
DROP TABLE IF EXISTS `quan_ly_diem_tieng_viet`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `quan_ly_diem_tieng_viet`  AS SELECT `bang_diem_tieng_viet`.`ma_hoc_sinh` AS `ma_hoc_sinh`, `bang_diem_tieng_viet`.`ma_giao_vien` AS `ma_giao_vien`, `bang_diem_tieng_viet`.`diem_giua_ky_1` AS `diem_giua_ky_1`, `bang_diem_tieng_viet`.`diem_cuoi_ky_1` AS `diem_cuoi_ky_1`, `bang_diem_tieng_viet`.`diem_giua_ky_2` AS `diem_giua_ky_2`, `bang_diem_tieng_viet`.`diem_cuoi_ky_2` AS `diem_cuoi_ky_2`, round((`bang_diem_tieng_viet`.`diem_cuoi_ky_2` + `bang_diem_tieng_viet`.`diem_cuoi_ky_1`) / 2,1) AS `diem_trung_binh_nam`, if((`bang_diem_tieng_viet`.`diem_cuoi_ky_2` + `bang_diem_tieng_viet`.`diem_cuoi_ky_1`) / 2 >= 8 and (`bang_diem_tieng_viet`.`diem_cuoi_ky_2` + `bang_diem_tieng_viet`.`diem_cuoi_ky_1`) / 2 <= 10,'gioi',if((`bang_diem_tieng_viet`.`diem_cuoi_ky_2` + `bang_diem_tieng_viet`.`diem_cuoi_ky_1`) / 2 < 8 and (`bang_diem_tieng_viet`.`diem_cuoi_ky_2` + `bang_diem_tieng_viet`.`diem_cuoi_ky_1`) / 2 >= 6.5,'kha',if((`bang_diem_tieng_viet`.`diem_cuoi_ky_2` + `bang_diem_tieng_viet`.`diem_cuoi_ky_1`) / 2 < 6.5 and (`bang_diem_tieng_viet`.`diem_cuoi_ky_2` + `bang_diem_tieng_viet`.`diem_cuoi_ky_1`) / 2 >= 5,'trung_binh',if((`bang_diem_tieng_viet`.`diem_cuoi_ky_2` + `bang_diem_tieng_viet`.`diem_cuoi_ky_1`) / 2 < 5 and (`bang_diem_tieng_viet`.`diem_cuoi_ky_2` + `bang_diem_tieng_viet`.`diem_cuoi_ky_1`) / 2 >= 3,'yeu',if((`bang_diem_tieng_viet`.`diem_cuoi_ky_2` + `bang_diem_tieng_viet`.`diem_cuoi_ky_1`) / 2 < 3 and (`bang_diem_tieng_viet`.`diem_cuoi_ky_2` + `bang_diem_tieng_viet`.`diem_cuoi_ky_1`) / 2 >= 0,'kem',''))))) AS `xep_loai` FROM `bang_diem_tieng_viet` ;

-- --------------------------------------------------------

--
-- Structure for view `quan_ly_diem_toan`
--
DROP TABLE IF EXISTS `quan_ly_diem_toan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `quan_ly_diem_toan`  AS SELECT `bang_diem_toan`.`ma_hoc_sinh` AS `ma_hoc_sinh`, `bang_diem_toan`.`ma_giao_vien` AS `ma_giao_vien`, `bang_diem_toan`.`diem_giua_ky_1` AS `diem_giua_ky_1`, `bang_diem_toan`.`diem_cuoi_ky_1` AS `diem_cuoi_ky_1`, `bang_diem_toan`.`diem_giua_ky_2` AS `diem_giua_ky_2`, `bang_diem_toan`.`diem_cuoi_ky_2` AS `diem_cuoi_ky_2`, round((`bang_diem_toan`.`diem_cuoi_ky_2` + `bang_diem_toan`.`diem_cuoi_ky_1`) / 2,1) AS `diem_trung_binh_nam`, if((`bang_diem_toan`.`diem_cuoi_ky_2` + `bang_diem_toan`.`diem_cuoi_ky_1`) / 2 >= 8 and (`bang_diem_toan`.`diem_cuoi_ky_2` + `bang_diem_toan`.`diem_cuoi_ky_1`) / 2 <= 10,'gioi',if((`bang_diem_toan`.`diem_cuoi_ky_2` + `bang_diem_toan`.`diem_cuoi_ky_1`) / 2 < 8 and (`bang_diem_toan`.`diem_cuoi_ky_2` + `bang_diem_toan`.`diem_cuoi_ky_1`) / 2 >= 6.5,'kha',if((`bang_diem_toan`.`diem_cuoi_ky_2` + `bang_diem_toan`.`diem_cuoi_ky_1`) / 2 < 6.5 and (`bang_diem_toan`.`diem_cuoi_ky_2` + `bang_diem_toan`.`diem_cuoi_ky_1`) / 2 >= 5,'trung_binh',if((`bang_diem_toan`.`diem_cuoi_ky_2` + `bang_diem_toan`.`diem_cuoi_ky_1`) / 2 < 5 and (`bang_diem_toan`.`diem_cuoi_ky_2` + `bang_diem_toan`.`diem_cuoi_ky_1`) / 2 >= 3,'yeu',if((`bang_diem_toan`.`diem_cuoi_ky_2` + `bang_diem_toan`.`diem_cuoi_ky_1`) / 2 < 3 and (`bang_diem_toan`.`diem_cuoi_ky_2` + `bang_diem_toan`.`diem_cuoi_ky_1`) / 2 >= 0,'kem',''))))) AS `xep_loai` FROM `bang_diem_toan` ;

-- --------------------------------------------------------

--
-- Structure for view `quan_ly_giao_vien`
--
DROP TABLE IF EXISTS `quan_ly_giao_vien`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `quan_ly_giao_vien`  AS SELECT `giao_vien`.`id` AS `id`, `user`.`username` AS `username`, `giao_vien`.`ten` AS `ten`, `giao_vien`.`ngay_sinh` AS `ngay_sinh`, `lop`.`ten_lop` AS `ten_lop`, `mon_hoc`.`ten_mon` AS `ten_mon`, `giao_vien`.`dia_chi` AS `dia_chi`, `giao_vien`.`sdt` AS `sdt`, `role`.`ten_role` AS `ten_role` FROM ((((`giao_vien` join `lop` on(`giao_vien`.`ma_lop` = `lop`.`id`)) join `user` on(`giao_vien`.`ma_account` = `user`.`id`)) join `role` on(`user`.`ma_role` = `role`.`id`)) join `mon_hoc` on(`mon_hoc`.`id` = `giao_vien`.`ma_mon`)) ;

-- --------------------------------------------------------

--
-- Structure for view `quan_ly_hoc_sinh`
--
DROP TABLE IF EXISTS `quan_ly_hoc_sinh`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `quan_ly_hoc_sinh`  AS SELECT `hoc_sinh`.`id` AS `id`, `hoc_sinh`.`ten` AS `ten`, `quan_ly_diem_hoc_sinh`.`ten_lop` AS `ten_lop`, `hoc_sinh`.`ngay_sinh` AS `ngay_sinh`, `hoc_sinh`.`dia_chi` AS `dia_chi`, `hoc_sinh`.`sdt_bome` AS `sdt_bome`, `quan_ly_diem_hoc_sinh`.`toan` AS `toan`, `quan_ly_diem_hoc_sinh`.`tieng_viet` AS `tieng_viet`, `quan_ly_diem_hoc_sinh`.`tieng_anh` AS `tieng_anh`, `quan_ly_diem_hoc_sinh`.`xep_loai` AS `xep_loai`, `hoc_sinh`.`ghi_chu` AS `ghi_chu` FROM (`hoc_sinh` left join `quan_ly_diem_hoc_sinh` on(`hoc_sinh`.`id` = `quan_ly_diem_hoc_sinh`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `quan_ly_lop`
--
DROP TABLE IF EXISTS `quan_ly_lop`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `quan_ly_lop`  AS SELECT `lop`.`id` AS `id`, `lop`.`ten_lop` AS `ten_lop`, (select count(`hoc_sinh`.`id`) from `hoc_sinh` where `lop`.`id` = `hoc_sinh`.`ma_lop`) AS `so_hoc_sinh` FROM (`lop` left join `hoc_sinh` on(`lop`.`id` = `hoc_sinh`.`ma_lop`)) GROUP BY `lop`.`ten_lop` ;

-- --------------------------------------------------------

--
-- Structure for view `quan_ly_user`
--
DROP TABLE IF EXISTS `quan_ly_user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `quan_ly_user`  AS SELECT `user`.`id` AS `id`, `user`.`username` AS `username`, `user`.`password_hash` AS `password_hash`, `gv`.`ten` AS `ten`, `role`.`ten_role` AS `ten_role` FROM ((`user` left join `role` on(`user`.`ma_role` = `role`.`id`)) left join `giao_vien` `gv` on(`user`.`id` = `gv`.`ma_account`)) GROUP BY `user`.`id` ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bang_diem_tieng_anh`
--
ALTER TABLE `bang_diem_tieng_anh`
  ADD CONSTRAINT `bang_diem_tieng_anh_ibfk_1` FOREIGN KEY (`ma_hoc_sinh`) REFERENCES `hoc_sinh` (`id`),
  ADD CONSTRAINT `bang_diem_tieng_anh_ibfk_2` FOREIGN KEY (`ma_giao_vien`) REFERENCES `giao_vien` (`id`);

--
-- Constraints for table `bang_diem_tieng_viet`
--
ALTER TABLE `bang_diem_tieng_viet`
  ADD CONSTRAINT `bang_diem_tieng_viet_ibfk_1` FOREIGN KEY (`ma_hoc_sinh`) REFERENCES `hoc_sinh` (`id`),
  ADD CONSTRAINT `bang_diem_tieng_viet_ibfk_2` FOREIGN KEY (`ma_giao_vien`) REFERENCES `giao_vien` (`id`);

--
-- Constraints for table `bang_diem_toan`
--
ALTER TABLE `bang_diem_toan`
  ADD CONSTRAINT `bang_diem_toan_ibfk_1` FOREIGN KEY (`ma_giao_vien`) REFERENCES `giao_vien` (`id`),
  ADD CONSTRAINT `bang_diem_toan_ibfk_2` FOREIGN KEY (`ma_hoc_sinh`) REFERENCES `hoc_sinh` (`id`);

--
-- Constraints for table `giao_vien`
--
ALTER TABLE `giao_vien`
  ADD CONSTRAINT `giao_vien___fk` FOREIGN KEY (`ma_account`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `giao_vien___fk2` FOREIGN KEY (`ma_mon`) REFERENCES `mon_hoc` (`id`);

--
-- Constraints for table `hoc_sinh`
--
ALTER TABLE `hoc_sinh`
  ADD CONSTRAINT `hoc_sinh_ibfk_1` FOREIGN KEY (`ma_lop`) REFERENCES `lop` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`ma_role`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
