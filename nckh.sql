-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2023 at 04:26 AM
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
-- Database: `nckh`
--

-- --------------------------------------------------------

--
-- Table structure for table `bangdiem`
--

CREATE TABLE `bangdiem` (
  `MSSV` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `MAHP` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `CC` float DEFAULT NULL,
  `GK` float DEFAULT NULL,
  `CK` float DEFAULT NULL,
  `DIEMHE10` float DEFAULT NULL,
  `DIEMHE4` float DEFAULT NULL,
  `DIEMQUYDOI` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `HOCKY` int(11) DEFAULT NULL,
  `NAMHOC` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bangdiem`
--

INSERT INTO `bangdiem` (`MSSV`, `MAHP`, `CC`, `GK`, `CK`, `DIEMHE10`, `DIEMHE4`, `DIEMQUYDOI`, `HOCKY`, `NAMHOC`) VALUES
('K12THO0047', 'CNPMNC', 10, 10, 9, 9.4, 4, 'A', 2, '2022-2023'),
('K12THO0047', 'CTDL-GT', 10, 9, 9, 9.1, 4, 'A', 2, '2020-2021'),
('K12THO0047', 'DSTT', 10, 10, 10, 10, 4, 'A', 2, '2020-2021'),
('K12THO0047', 'HN', NULL, NULL, 9.3, 9.3, 4, 'A', 1, '2020-2021'),
('K12THO0047', 'KTLT', 10, 9, 9, 9.1, 4, 'A', 1, '2020-2021'),
('K12THO0047', 'LINUX', 10, 10, 8.4, 9.04, 4, 'A', 2, '2022-2023'),
('K12THO0047', 'LTCB', 10, 6, 7.5, 7.3, 3, 'B', 1, '2020-2021'),
('K12THO0047', 'TGT', 10, 10, 9, 9.4, 4, 'A', 3, '2020-2021'),
('K12THO0047', 'THCB', 10, 7.6, 6.5, 7.2, 3, 'B', 1, '2020-2021'),
('K12THO0047', 'TKW', 9, 8.5, 7, 7.7, 3, 'B', 2, '2020-2021'),
('K12THO0047', 'TRR', 10, 9.5, 8, 8.7, 4, 'A', 1, '2020-2021'),
('K12THO0047', 'XML', 10, 10, 9.5, 9.7, 4, 'A', 2, '2022-2023');

-- --------------------------------------------------------

--
-- Table structure for table `diemdanh`
--

CREATE TABLE `diemdanh` (
  `MSSV` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `MAHP` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `BUOIHOC` int(11) NOT NULL,
  `NGAYHOC` date DEFAULT NULL,
  `STATUS` bit(1) DEFAULT NULL,
  `GHICHU` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `diemdanh`
--

INSERT INTO `diemdanh` (`MSSV`, `MAHP`, `BUOIHOC`, `NGAYHOC`, `STATUS`, `GHICHU`) VALUES
('K12THO0047', 'ANM', 1, '2023-05-18', b'1', 'đã điểm danh'),
('K12THO0047', 'ANM', 2, '2023-05-25', b'1', 'đã điểm danh'),
('K12THO0047', 'ANM', 3, '2023-06-01', b'1', 'đã điểm danh'),
('K12THO0047', 'QTM', 1, '2023-05-15', b'1', 'đã điểm danh'),
('K12THO0047', 'QTM', 2, '2023-05-16', b'1', 'đã điểm danh'),
('K12THO0047', 'QTM', 3, '2023-05-22', b'1', 'đã điểm danh');

-- --------------------------------------------------------

--
-- Table structure for table `giangvien`
--

CREATE TABLE `giangvien` (
  `MAGV` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `TENGV` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `MAKH` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `giangvien`
--

INSERT INTO `giangvien` (`MAGV`, `TENGV`, `MAKH`) VALUES
('GV001', 'Lê Thanh', 'CNTT'),
('GV002', 'Nguyễn Hữu Tiến', 'CNTT'),
('GV003', 'Lê Duy An', 'CNTT'),
('GV004', 'Đỗ Thị Kim Dung', 'CNTT'),
('GV005', 'Lê Đinh Phú Cường', 'CNTT'),
('GV006', 'Từ Lãng Phiêu', 'CNTT'),
('GV007', 'Trần Ngọc Đông', NULL),
('GV008', 'Nguyễn Quang Tấn', 'CNTT'),
('GV009', 'Mai Hoàng Dung', 'CB'),
('GV010', 'Đào Duy Tùng', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `giangvien_lop`
--

CREATE TABLE `giangvien_lop` (
  `MAGV` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `MALOP` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `giangvien_lop`
--

INSERT INTO `giangvien_lop` (`MAGV`, `MALOP`) VALUES
('GV001', 'K12THO1');

-- --------------------------------------------------------

--
-- Table structure for table `hocphan`
--

CREATE TABLE `hocphan` (
  `MAHP` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `TENHP` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `SOTC` int(11) DEFAULT NULL,
  `GVPT` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hocphan`
--

INSERT INTO `hocphan` (`MAHP`, `TENHP`, `SOTC`, `GVPT`) VALUES
('', '', NULL, NULL),
('ANM', 'An ninh mạng', 3, 'GV003'),
('BMTT', 'Bảo Mật Thông Tin', 3, 'GV003'),
('CNPMNC', 'Công Nghệ Phần Mềm (nâng cao)', 3, 'GV005'),
('CSDLNC', 'Cơ sở dữ liệu (nâng cao)', 3, 'GV006'),
('CTDL-GT', 'Cấu trúc dữ liệu và giải thuật', 3, 'GV004'),
('DSTT', 'Đại số tuyến tính', 3, 'GV009'),
('HN', 'Hướng Nghiệp', 1, 'GV001'),
('KTLT', 'Kỹ Thuật Lập Trình', 3, 'GV008'),
('LINUX', 'Hệ điều hành Linux ', 3, 'GV005'),
('LSDCSVN', 'Lịch sử Đảng Cộng Sàn Việt Nam', 3, 'GV010'),
('LTCB', 'Lập trình căn bản', 3, 'GV004'),
('LTJV', 'Lập trình Java', 3, 'GV001'),
('LTMB', 'Lập trình trên thiết bị di động', 3, 'GV001'),
('MTCCPM', 'Môi trường và công cụ phát triển phần mềm', 3, 'GV006'),
('QTM', 'Quản trị mạng', 3, 'GV001'),
('TGT', 'Toán Giải tích', 3, 'GV009'),
('THCB', 'Nhập môn Công Nghệ Thông Tin', 3, 'GV002'),
('TKW', 'Thiết kế Web', 3, 'GV008'),
('TRR', 'Toán rời rạc', 3, 'GV007'),
('XML', 'XML và ứng dụng', 3, 'GV002');

-- --------------------------------------------------------

--
-- Table structure for table `hocphi`
--

CREATE TABLE `hocphi` (
  `MSSV` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `NAMHOC` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `HOCKY` int(11) NOT NULL,
  `STATUS` bit(1) DEFAULT NULL,
  `GHICHU` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hocphi`
--

INSERT INTO `hocphi` (`MSSV`, `NAMHOC`, `HOCKY`, `STATUS`, `GHICHU`) VALUES
('K12THO0047', '2020-2021', 1, b'1', 'đã đóng học phí HK1 năm học 2020-2021'),
('K12THO0047', '2020-2021', 2, b'1', 'đã đóng học phí HK2 năm học 2020-2021'),
('K12THO0047', '2020-2021', 3, b'1', 'đã đóng học phí HK3 năm học 2020-2021');

-- --------------------------------------------------------

--
-- Table structure for table `khoa`
--

CREATE TABLE `khoa` (
  `MAKH` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `TENKH` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `khoa`
--

INSERT INTO `khoa` (`MAKH`, `TENKH`) VALUES
('CB', 'Cơ Bản'),
('CNTT', 'Công Nghệ Thông Tin'),
('DL', 'Du Lịch'),
('KT', 'Kế Toán'),
('OTO', 'Kỹ Thuật Ô Tô');

-- --------------------------------------------------------

--
-- Table structure for table `khoas`
--

CREATE TABLE `khoas` (
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `khoas`
--

INSERT INTO `khoas` (`ID`) VALUES
(12),
(13),
(14);

-- --------------------------------------------------------

--
-- Table structure for table `lop`
--

CREATE TABLE `lop` (
  `MALOP` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `TENLOP` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `MAKH` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lop`
--

INSERT INTO `lop` (`MALOP`, `TENLOP`, `MAKH`) VALUES
('K12THO1', 'TIN HỌC 1 - KHÓA 12', 'CNTT'),
('K13THO1', 'TIN HỌC 1 - KHÓA 13', 'CNTT'),
('K14THO1', 'TIN HỌC 1 - KHÓA 14', 'CNTT');

-- --------------------------------------------------------

--
-- Table structure for table `nguoidung`
--

CREATE TABLE `nguoidung` (
  `ID` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `Pass` varchar(50) DEFAULT NULL,
  `User_type` text NOT NULL DEFAULT 'NguoiDung',
  `TrangThai` varchar(50) DEFAULT NULL,
  `SV` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `GV` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nguoidung`
--

INSERT INTO `nguoidung` (`ID`, `Name`, `Pass`, `User_type`, `TrangThai`, `SV`, `GV`) VALUES
('1', 'tan', '1', 'NguoiDung', 'enable', 'K12THO0047', NULL),
('123', 'canh2', '123', 'admin', 'enable', 'K12THO0004', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `phuhuynh`
--

CREATE TABLE `phuhuynh` (
  `CCCD` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `MK` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `MSSV` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `TENSV` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `GIOITINH` bit(1) DEFAULT NULL,
  `NGAYSINH` date DEFAULT NULL,
  `DIACHI` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `SDT` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `IDKHOAS` int(11) DEFAULT NULL,
  `MALOP` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `MAKH` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `MAPH` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sinhvien`
--

INSERT INTO `sinhvien` (`MSSV`, `TENSV`, `GIOITINH`, `NGAYSINH`, `DIACHI`, `SDT`, `IDKHOAS`, `MALOP`, `MAKH`, `MAPH`) VALUES
('K12THO0004', 'Ngô Thanh Cảnh', b'1', '2002-01-01', 'Bình Thuận', NULL, 12, 'K12THO1', 'CNTT', '1'),
('K12THO0047', 'Nguyễn Minh Tấn', b'1', '2002-06-09', 'PHAN THIẾT - BÌNH THUẬN', NULL, 12, 'K12THO1', 'CNTT', '1');

-- --------------------------------------------------------

--
-- Table structure for table `thoikhoabieu`
--

CREATE TABLE `thoikhoabieu` (
  `ID` int(11) NOT NULL,
  `BUOI1_THU` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `BUOI1_TIET` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `BUOI1_PHONG` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `BUOI2_THU` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `BUOI2_TIET` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `BUOI2_PHONG` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `NGAYBATDAU` date DEFAULT NULL,
  `NGAYKETTHUC` date DEFAULT NULL,
  `GHICHU` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `LOP` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `MONHOC` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `GIANGVIEN` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `HOCKY` int(11) NOT NULL,
  `NAMHOC` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `thoikhoabieu`
--

INSERT INTO `thoikhoabieu` (`ID`, `BUOI1_THU`, `BUOI1_TIET`, `BUOI1_PHONG`, `BUOI2_THU`, `BUOI2_TIET`, `BUOI2_PHONG`, `NGAYBATDAU`, `NGAYKETTHUC`, `GHICHU`, `LOP`, `MONHOC`, `GIANGVIEN`, `HOCKY`, `NAMHOC`) VALUES
(1, 'Sáng thứ 3', '2 - 5', 'P.204', 'Chiều thứ 3', '8 - 11', 'P.204', '2023-05-15', '2023-07-09', NULL, 'K12THO1', 'QTM', 'GV001', 3, '2022-2023'),
(2, 'Sáng thứ 5', '2 - 5', 'P.204', 'Chiều thứ 5', '8 - 11', 'P.204', '2023-05-15', '2023-07-09', NULL, 'K12THO1', 'ANM', 'GV003', 3, '2022-2023'),
(3, 'Sáng thứ 2', '2 - 5', 'P.101', 'Chiều thứ 2', '8 - 11', 'P.101', '2023-06-19', '2023-08-13', NULL, 'K12THO1', 'MTCCPM', 'GV006', 3, '2022-2023'),
(4, 'Sáng thứ 7', '2 - 5', 'P.204', 'Chiều thứ 7', '8 - 11', 'P.204', '2023-06-19', '2023-08-13', NULL, 'K12THO1', 'CSDLNC', 'GV006', 3, '2022-2023'),
(5, NULL, NULL, NULL, 'Chiều thứ 6', '8 - 11', 'P.Hội trường', '2023-06-16', '2023-08-13', NULL, 'K12THO1', 'LSDCSVN', 'GV010', 3, '2022-2023');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bangdiem`
--
ALTER TABLE `bangdiem`
  ADD PRIMARY KEY (`MSSV`,`MAHP`),
  ADD KEY `MAHP` (`MAHP`);

--
-- Indexes for table `diemdanh`
--
ALTER TABLE `diemdanh`
  ADD PRIMARY KEY (`MSSV`,`MAHP`,`BUOIHOC`),
  ADD KEY `MAHP` (`MAHP`);

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
  ADD PRIMARY KEY (`MSSV`,`NAMHOC`,`HOCKY`);

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
-- Constraints for table `bangdiem`
--
ALTER TABLE `bangdiem`
  ADD CONSTRAINT `bangdiem_ibfk_1` FOREIGN KEY (`MSSV`) REFERENCES `sinhvien` (`MSSV`) ON DELETE CASCADE,
  ADD CONSTRAINT `bangdiem_ibfk_2` FOREIGN KEY (`MAHP`) REFERENCES `hocphan` (`MAHP`) ON DELETE CASCADE;

--
-- Constraints for table `diemdanh`
--
ALTER TABLE `diemdanh`
  ADD CONSTRAINT `diemdanh_ibfk_1` FOREIGN KEY (`MSSV`) REFERENCES `sinhvien` (`MSSV`)  ON DELETE CASCADE,
  ADD CONSTRAINT `diemdanh_ibfk_2` FOREIGN KEY (`MAHP`) REFERENCES `hocphan` (`MAHP`)  ON DELETE CASCADE;

--
-- Constraints for table `giangvien`
--
ALTER TABLE `giangvien`
  ADD CONSTRAINT `giangvien_ibfk_1` FOREIGN KEY (`MAKH`) REFERENCES `khoa` (`MAKH`) ON DELETE CASCADE;

--
-- Constraints for table `giangvien_lop`
--
ALTER TABLE `giangvien_lop`
  ADD CONSTRAINT `giangvien_lop_ibfk_1` FOREIGN KEY (`MAGV`) REFERENCES `giangvien` (`MAGV`) ON DELETE CASCADE,
  ADD CONSTRAINT `giangvien_lop_ibfk_2` FOREIGN KEY (`MALOP`) REFERENCES `lop` (`MALOP`) ON DELETE CASCADE;

--
-- Constraints for table `hocphan`
--
ALTER TABLE `hocphan`
  ADD CONSTRAINT `hocphan_ibfk_1` FOREIGN KEY (`GVPT`) REFERENCES `giangvien` (`MAGV`) ON DELETE CASCADE;

--
-- Constraints for table `hocphi`
--
ALTER TABLE `hocphi`
  ADD CONSTRAINT `hocphi_ibfk_1` FOREIGN KEY (`MSSV`) REFERENCES `sinhvien` (`MSSV`)  ON DELETE CASCADE;

--
-- Constraints for table `lop`
--
ALTER TABLE `lop`
  ADD CONSTRAINT `lop_ibfk_1` FOREIGN KEY (`MAKH`) REFERENCES `khoa` (`MAKH`) ON DELETE CASCADE;

--
-- Constraints for table `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD CONSTRAINT `nguoidung_ibfk_1` FOREIGN KEY (`SV`) REFERENCES `sinhvien` (`MSSV`) ON DELETE CASCADE,
  ADD CONSTRAINT `nguoidung_ibfk_2` FOREIGN KEY (`GV`) REFERENCES `giangvien` (`MAGV`) ON DELETE CASCADE;

--
-- Constraints for table `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD CONSTRAINT `sinhvien_ibfk_1` FOREIGN KEY (`IDKHOAS`) REFERENCES `khoas` (`ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `sinhvien_ibfk_2` FOREIGN KEY (`MALOP`) REFERENCES `lop` (`MALOP`) ON DELETE CASCADE,
  ADD CONSTRAINT `sinhvien_ibfk_3` FOREIGN KEY (`MAKH`) REFERENCES `khoa` (`MAKH`) ON DELETE CASCADE,
  ADD CONSTRAINT `sinhvien_ibfk_4` FOREIGN KEY (`MAPH`) REFERENCES `phuhuynh` (`CCCD`) ON DELETE CASCADE;

--
-- Constraints for table `thoikhoabieu`
--
ALTER TABLE `thoikhoabieu`
  ADD CONSTRAINT `thoikhoabieu_ibfk_1` FOREIGN KEY (`LOP`) REFERENCES `lop` (`MALOP`) ON DELETE CASCADE,
  ADD CONSTRAINT `thoikhoabieu_ibfk_2` FOREIGN KEY (`MONHOC`) REFERENCES `hocphan` (`MAHP`) ON DELETE CASCADE,
  ADD CONSTRAINT `thoikhoabieu_ibfk_3` FOREIGN KEY (`GIANGVIEN`) REFERENCES `giangvien` (`MAGV`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
