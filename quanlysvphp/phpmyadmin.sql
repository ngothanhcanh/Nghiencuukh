-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2023 at 12:25 PM
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
-- Table structure for table `diem`
--

CREATE TABLE `diem` (
  `ID` int(11) NOT NULL,
  `CC` float DEFAULT NULL,
  `GK` float DEFAULT NULL,
  `CK` float DEFAULT NULL,
  `DTB_HE10` float DEFAULT NULL,
  `DTL_HE4` float DEFAULT NULL,
  `DIEMQUYDOI` int(11) DEFAULT NULL,
  `XEPLOAI` varchar(50) CHARACTER SET utf8 DEFAULT NULL
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
-- Table structure for table `hocphan`
--

CREATE TABLE `hocphan` (
  `MAHP` char(20) CHARACTER SET utf8 NOT NULL,
  `TENHP` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `SOTC` int(11) DEFAULT NULL,
  `GVPT` char(20) CHARACTER SET utf8 DEFAULT NULL
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
  `MAGV` char(20) CHARACTER SET utf8 NOT NULL,
  `MSSV` char(20) CHARACTER SET utf8 DEFAULT NULL,
  `MALOP` char(20) CHARACTER SET utf8 DEFAULT NULL,
  `MAHP` char(20) CHARACTER SET utf8 DEFAULT NULL,
  `MADIEM` int(11) DEFAULT NULL,
  `HOCKY` int(11) DEFAULT NULL,
  `NAMHOC` varchar(50) CHARACTER SET utf8 DEFAULT NULL
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
('CNTT', 'Công Nghệ Thông Tin');

-- --------------------------------------------------------

--
-- Table structure for table `khoas`
--

CREATE TABLE `khoas` (
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `khoas`
--

INSERT INTO `khoas` (`ID`) VALUES
(12);

-- --------------------------------------------------------

--
-- Table structure for table `lop`
--

CREATE TABLE `lop` (
  `MALOP` char(20) CHARACTER SET utf8 NOT NULL,
  `TENLOP` varchar(50) CHARACTER SET utf8 NOT NULL,
  `MAKH` char(20) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lop`
--

INSERT INTO `lop` (`MALOP`, `TENLOP`, `MAKH`) VALUES
('K12THO1', 'TIN HỌC 1', 'CNTT');

-- --------------------------------------------------------

--
-- Table structure for table `nguoidung`
--

CREATE TABLE `nguoidung` (
  `ID` char(20) CHARACTER SET utf8 NOT NULL,
  `Name` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `Pass` varchar(50) DEFAULT NULL,
  `User_type` text NOT NULL DEFAULT 'NguoiDung',
  `TrangThai` varchar(50) DEFAULT NULL,
  `SV` char(20) CHARACTER SET utf8 DEFAULT NULL,
  `GV` char(20) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `phuhuynh`
--

CREATE TABLE `phuhuynh` (
  `CCCD` char(20) CHARACTER SET utf8 NOT NULL,
  `MK` varchar(50) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `phuhuynh`
--

INSERT INTO `phuhuynh` (`CCCD`, `MK`) VALUES
('1', '1');

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
  `SDT` char(20) CHARACTER SET utf8 DEFAULT NULL,
  `IDKHOAS` int(11) DEFAULT NULL,
  `MALOP` char(20) CHARACTER SET utf8 DEFAULT NULL,
  `MAKH` char(20) CHARACTER SET utf8 DEFAULT NULL,
  `MAPH` char(20) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sinhvien`
--

INSERT INTO `sinhvien` (`MSSV`, `TENSV`, `GIOITINH`, `NGAYSINH`, `DIACHI`, `SDT`, `IDKHOAS`, `MALOP`, `MAKH`, `MAPH`) VALUES
('K12THO0047', 'Nguyễn Minh Tấn', b'1', '2002-06-09', 'PHAN THIẾT - BÌNH THUẬN', '0947199126', 12, 'K12THO1', 'CNTT', '1'),
('K12THO0059', 'Hồ Anh Tú', b'1', '2002-01-22', 'Bình Thuận', NULL, 12, 'K12THO1', 'CNTT', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `thoikhoabieu`
--

CREATE TABLE `thoikhoabieu` (
  `ID` int(11) NOT NULL,
  `BUOI1_THU` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `BUOI1_TIET` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `BUOI1_PHONG` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `BUOI2_THU` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `BUOI2_TIET` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `BUOI2_PHONG` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
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
-- Indexes for table `diem`
--
ALTER TABLE `diem`
  ADD PRIMARY KEY (`ID`);

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
-- Indexes for table `hocphan`
--
ALTER TABLE `hocphan`
  ADD PRIMARY KEY (`MAHP`),
  ADD KEY `GVPT` (`GVPT`);

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
  ADD PRIMARY KEY (`MAGV`),
  ADD KEY `MSSV` (`MSSV`),
  ADD KEY `MALOP` (`MALOP`),
  ADD KEY `MAHP` (`MAHP`),
  ADD KEY `MADIEM` (`MADIEM`);

--
-- Indexes for table `khoa`
--
ALTER TABLE `khoa`
  ADD PRIMARY KEY (`MAKH`);

--
-- Indexes for table `khoas`
--
ALTER TABLE `khoas`
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
  ADD KEY `SV` (`SV`),
  ADD KEY `GV` (`GV`);

--
-- Indexes for table `phuhuynh`
--
ALTER TABLE `phuhuynh`
  ADD PRIMARY KEY (`CCCD`);

--
-- Indexes for table `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD PRIMARY KEY (`MSSV`),
  ADD KEY `IDKHOAS` (`IDKHOAS`),
  ADD KEY `MALOP` (`MALOP`),
  ADD KEY `MAKH` (`MAKH`),
  ADD KEY `MAPH` (`MAPH`);

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
-- Constraints for table `hocphan`
--
ALTER TABLE `hocphan`
  ADD CONSTRAINT `hocphan_ibfk_1` FOREIGN KEY (`GVPT`) REFERENCES `giangvien` (`MAGV`);

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
  ADD CONSTRAINT `ketqua_ibfk_1` FOREIGN KEY (`MAGV`) REFERENCES `giangvien` (`MAGV`),
  ADD CONSTRAINT `ketqua_ibfk_2` FOREIGN KEY (`MSSV`) REFERENCES `sinhvien` (`MSSV`),
  ADD CONSTRAINT `ketqua_ibfk_3` FOREIGN KEY (`MALOP`) REFERENCES `lop` (`MALOP`),
  ADD CONSTRAINT `ketqua_ibfk_4` FOREIGN KEY (`MAHP`) REFERENCES `hocphan` (`MAHP`),
  ADD CONSTRAINT `ketqua_ibfk_5` FOREIGN KEY (`MADIEM`) REFERENCES `diem` (`ID`);

--
-- Constraints for table `lop`
--
ALTER TABLE `lop`
  ADD CONSTRAINT `lop_ibfk_1` FOREIGN KEY (`MAKH`) REFERENCES `khoa` (`MAKH`);

--
-- Constraints for table `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD CONSTRAINT `nguoidung_ibfk_1` FOREIGN KEY (`SV`) REFERENCES `sinhvien` (`MSSV`),
  ADD CONSTRAINT `nguoidung_ibfk_2` FOREIGN KEY (`GV`) REFERENCES `giangvien` (`MAGV`);

--
-- Constraints for table `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD CONSTRAINT `sinhvien_ibfk_1` FOREIGN KEY (`IDKHOAS`) REFERENCES `khoas` (`ID`),
  ADD CONSTRAINT `sinhvien_ibfk_2` FOREIGN KEY (`MALOP`) REFERENCES `lop` (`MALOP`),
  ADD CONSTRAINT `sinhvien_ibfk_3` FOREIGN KEY (`MAKH`) REFERENCES `khoa` (`MAKH`),
  ADD CONSTRAINT `sinhvien_ibfk_4` FOREIGN KEY (`MAPH`) REFERENCES `phuhuynh` (`CCCD`);

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
