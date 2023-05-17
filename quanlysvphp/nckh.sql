-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2023 at 04:45 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nckh`
--

-- --------------------------------------------------------

--
-- Table structure for table `diemdanh`
--

CREATE TABLE `diemdanh` (
  `MSSV` char(20) CHARACTER SET utf8 NOT NULL,
  `MONHOC` char(20) CHARACTER SET utf8 NOT NULL,
  `THU` char(1) CHARACTER SET utf8 DEFAULT NULL,
  `TIET` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `PHONG` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `TRANGTHAI` varchar(50) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `giangvien`
--

CREATE TABLE `giangvien` (
  `MAGV` char(20) CHARACTER SET utf8 NOT NULL,
  `TENGV` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `MAKH` char(20) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `giangvien_lop`
--

CREATE TABLE `giangvien_lop` (
  `MAGV` char(20) CHARACTER SET utf8 NOT NULL,
  `MALOP` char(20) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `giaovienchunhiem`
--

CREATE TABLE `giaovienchunhiem` (
  `ID` char(20) CHARACTER SET utf8 NOT NULL,
  `MAGV` char(20) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hocphan`
--

CREATE TABLE `hocphan` (
  `MAHP` char(20) CHARACTER SET utf8 NOT NULL,
  `TENHP` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `SOTC` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hocphi`
--

CREATE TABLE `hocphi` (
  `MAKH` char(20) CHARACTER SET utf8 NOT NULL,
  `MSSV` char(20) CHARACTER SET utf8 NOT NULL,
  `TRANGTHAI` varchar(50) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ketqua`
--

CREATE TABLE `ketqua` (
  `MSSV` char(20) CHARACTER SET utf8 NOT NULL,
  `MAHP` char(20) CHARACTER SET utf8 NOT NULL,
  `CC` float DEFAULT NULL,
  `GK` float DEFAULT NULL,
  `CK` float DEFAULT NULL,
  `DTB` float DEFAULT NULL,
  `DIEMHE4` float DEFAULT NULL,
  `DIEMQUYDOI` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `khoa`
--

CREATE TABLE `khoa` (
  `MAKH` char(20) CHARACTER SET utf8 NOT NULL,
  `TENKH` varchar(50) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `khoa`
--

INSERT INTO `khoa` (`MAKH`, `TENKH`) VALUES
('CNTT', 'Công Nghệ Thông Tin'),
('DL', 'Du Lịch'),
('KT', 'Kế Toán');

-- --------------------------------------------------------

--
-- Table structure for table `khoahoc`
--

CREATE TABLE `khoahoc` (
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `khoahoc`
--

INSERT INTO `khoahoc` (`ID`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11),
(12),
(13),
(14);

-- --------------------------------------------------------

--
-- Table structure for table `lop`
--

CREATE TABLE `lop` (
  `MALOP` char(20) CHARACTER SET utf8 NOT NULL,
  `TENLOP` varchar(50) CHARACTER SET utf8 NOT NULL,
  `MAKH` char(20) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `nguoidung`
--

CREATE TABLE `nguoidung` (
  `ID` char(20) CHARACTER SET utf8 NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `user_type` text NOT NULL DEFAULT 'nguoidung',
  `status` varchar(50) DEFAULT NULL,
  `MSSV` char(20) CHARACTER SET utf8 DEFAULT NULL,
  `MAGV` char(20) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sinhvien`
--

CREATE TABLE `sinhvien` (
  `MSSV` char(20) CHARACTER SET utf8 NOT NULL,
  `TENSV` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `GIOITINH` bit(1) DEFAULT NULL,
  `NGAYSINH` date DEFAULT NULL,
  `DIACHI` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `KHOAS` int(11) DEFAULT NULL,
  `MALOP` char(20) CHARACTER SET utf8 DEFAULT NULL,
  `MAKH` char(20) CHARACTER SET utf8 DEFAULT NULL,
  `GVCN` char(20) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `thoikhoabieu`
--

CREATE TABLE `thoikhoabieu` (
  `ID` int(11) NOT NULL,
  `BUOI1_THU` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `BUOI1_TIET` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `BUOI1_PHONG` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `BUOI2_THU` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `BUOI2_TIET` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `BUOI2_PHONG` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `NGAYBATDAU` date DEFAULT NULL,
  `NGAYKETTHUC` date DEFAULT NULL,
  `GHICHU` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `LOP` char(20) CHARACTER SET utf8 DEFAULT NULL,
  `MONHOC` char(20) CHARACTER SET utf8 DEFAULT NULL,
  `GIANGVIEN` char(20) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `diemdanh`
--
ALTER TABLE `diemdanh`
  ADD PRIMARY KEY (`MSSV`,`MONHOC`),
  ADD KEY `MONHOC` (`MONHOC`);

--
-- Indexes for table `giangvien`
--
ALTER TABLE `giangvien`
  ADD PRIMARY KEY (`MAGV`),
  ADD KEY `MAKH` (`MAKH`);

--
-- Indexes for table `giangvien_lop`
--
ALTER TABLE `giangvien_lop`
  ADD PRIMARY KEY (`MAGV`,`MALOP`),
  ADD KEY `MALOP` (`MALOP`);

--
-- Indexes for table `giaovienchunhiem`
--
ALTER TABLE `giaovienchunhiem`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `MAGV` (`MAGV`);

--
-- Indexes for table `hocphan`
--
ALTER TABLE `hocphan`
  ADD PRIMARY KEY (`MAHP`);

--
-- Indexes for table `hocphi`
--
ALTER TABLE `hocphi`
  ADD PRIMARY KEY (`MAKH`,`MSSV`),
  ADD KEY `MSSV` (`MSSV`);

--
-- Indexes for table `ketqua`
--
ALTER TABLE `ketqua`
  ADD PRIMARY KEY (`MSSV`,`MAHP`),
  ADD KEY `MAHP` (`MAHP`);

--
-- Indexes for table `khoa`
--
ALTER TABLE `khoa`
  ADD PRIMARY KEY (`MAKH`);

--
-- Indexes for table `khoahoc`
--
ALTER TABLE `khoahoc`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `lop`
--
ALTER TABLE `lop`
  ADD PRIMARY KEY (`MALOP`),
  ADD KEY `MAKH` (`MAKH`);

--
-- Indexes for table `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `MSSV` (`MSSV`),
  ADD KEY `MAGV` (`MAGV`);

--
-- Indexes for table `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD PRIMARY KEY (`MSSV`),
  ADD KEY `KHOAS` (`KHOAS`),
  ADD KEY `MALOP` (`MALOP`),
  ADD KEY `MAKH` (`MAKH`),
  ADD KEY `GVCN` (`GVCN`);

--
-- Indexes for table `thoikhoabieu`
--
ALTER TABLE `thoikhoabieu`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `LOP` (`LOP`),
  ADD KEY `MONHOC` (`MONHOC`),
  ADD KEY `GIANGVIEN` (`GIANGVIEN`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `diemdanh`
--
ALTER TABLE `diemdanh`
  ADD CONSTRAINT `diemdanh_ibfk_1` FOREIGN KEY (`MSSV`) REFERENCES `sinhvien` (`MSSV`),
  ADD CONSTRAINT `diemdanh_ibfk_2` FOREIGN KEY (`MONHOC`) REFERENCES `hocphan` (`MAHP`);

--
-- Constraints for table `giangvien`
--
ALTER TABLE `giangvien`
  ADD CONSTRAINT `giangvien_ibfk_1` FOREIGN KEY (`MAKH`) REFERENCES `khoa` (`MAKH`);

--
-- Constraints for table `giangvien_lop`
--
ALTER TABLE `giangvien_lop`
  ADD CONSTRAINT `giangvien_lop_ibfk_1` FOREIGN KEY (`MAGV`) REFERENCES `giangvien` (`MAGV`),
  ADD CONSTRAINT `giangvien_lop_ibfk_2` FOREIGN KEY (`MALOP`) REFERENCES `lop` (`MALOP`);

--
-- Constraints for table `giaovienchunhiem`
--
ALTER TABLE `giaovienchunhiem`
  ADD CONSTRAINT `giaovienchunhiem_ibfk_1` FOREIGN KEY (`MAGV`) REFERENCES `giangvien` (`MAGV`);

--
-- Constraints for table `hocphi`
--
ALTER TABLE `hocphi`
  ADD CONSTRAINT `hocphi_ibfk_1` FOREIGN KEY (`MAKH`) REFERENCES `khoa` (`MAKH`),
  ADD CONSTRAINT `hocphi_ibfk_2` FOREIGN KEY (`MSSV`) REFERENCES `sinhvien` (`MSSV`);

--
-- Constraints for table `ketqua`
--
ALTER TABLE `ketqua`
  ADD CONSTRAINT `ketqua_ibfk_1` FOREIGN KEY (`MSSV`) REFERENCES `sinhvien` (`MSSV`),
  ADD CONSTRAINT `ketqua_ibfk_2` FOREIGN KEY (`MAHP`) REFERENCES `hocphan` (`MAHP`);

--
-- Constraints for table `lop`
--
ALTER TABLE `lop`
  ADD CONSTRAINT `lop_ibfk_1` FOREIGN KEY (`MAKH`) REFERENCES `khoa` (`MAKH`);

--
-- Constraints for table `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD CONSTRAINT `nguoidung_ibfk_1` FOREIGN KEY (`MSSV`) REFERENCES `sinhvien` (`MSSV`),
  ADD CONSTRAINT `nguoidung_ibfk_2` FOREIGN KEY (`MAGV`) REFERENCES `giangvien` (`MAGV`);

--
-- Constraints for table `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD CONSTRAINT `sinhvien_ibfk_1` FOREIGN KEY (`KHOAS`) REFERENCES `khoahoc` (`ID`),
  ADD CONSTRAINT `sinhvien_ibfk_2` FOREIGN KEY (`MALOP`) REFERENCES `lop` (`MALOP`),
  ADD CONSTRAINT `sinhvien_ibfk_3` FOREIGN KEY (`MAKH`) REFERENCES `khoa` (`MAKH`),
  ADD CONSTRAINT `sinhvien_ibfk_4` FOREIGN KEY (`GVCN`) REFERENCES `giaovienchunhiem` (`ID`);

--
-- Constraints for table `thoikhoabieu`
--
ALTER TABLE `thoikhoabieu`
  ADD CONSTRAINT `thoikhoabieu_ibfk_1` FOREIGN KEY (`LOP`) REFERENCES `lop` (`MALOP`),
  ADD CONSTRAINT `thoikhoabieu_ibfk_2` FOREIGN KEY (`MONHOC`) REFERENCES `hocphan` (`MAHP`),
  ADD CONSTRAINT `thoikhoabieu_ibfk_3` FOREIGN KEY (`GIANGVIEN`) REFERENCES `giangvien` (`MAGV`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
