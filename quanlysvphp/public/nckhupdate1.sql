-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 14, 2023 lúc 01:47 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `nckhupdate1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bangdiem`
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
-- Đang đổ dữ liệu cho bảng `bangdiem`
--

INSERT INTO `bangdiem` (`MSSV`, `MAHP`, `CC`, `GK`, `CK`, `DIEMHE10`, `DIEMHE4`, `DIEMQUYDOI`, `HOCKY`, `NAMHOC`) VALUES
('K12THO0004', 'LTGV', 3.5, 0, 2, 1.55, 0, 'F', 2, '2003');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giangvien`
--

CREATE TABLE `giangvien` (
  `MAGV` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `TENGV` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `MAKH` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `giangvien`
--

INSERT INTO `giangvien` (`MAGV`, `TENGV`, `MAKH`) VALUES
('GV01', 'Lê Thanh', 'CNTT'),
('GV2', 'CCC', 'DL');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giangvien_lop`
--

CREATE TABLE `giangvien_lop` (
  `MAGV` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `MALOP` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hocphan`
--

CREATE TABLE `hocphan` (
  `MAHP` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `TENHP` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `SOTC` int(11) DEFAULT NULL,
  `GVPT` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hocphan`
--

INSERT INTO `hocphan` (`MAHP`, `TENHP`, `SOTC`, `GVPT`) VALUES
('LTGV', 'JAVA', 3, 'GV01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hocphi`
--

CREATE TABLE `hocphi` (
  `MAKH` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `MSSV` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `TRANGTHAI` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hocphi`
--

INSERT INTO `hocphi` (`MAKH`, `MSSV`, `TRANGTHAI`) VALUES
('CNTT', 'K12THO0047', 'chua');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khoa`
--

CREATE TABLE `khoa` (
  `MAKH` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `TENKH` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khoa`
--

INSERT INTO `khoa` (`MAKH`, `TENKH`) VALUES
('CNTT', 'cong nghe thong tin'),
('DL', 'du lich'),
('OTO', 'o to');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khoas`
--

CREATE TABLE `khoas` (
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khoas`
--

INSERT INTO `khoas` (`ID`) VALUES
(12);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lop`
--

CREATE TABLE `lop` (
  `MALOP` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `TENLOP` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `MAKH` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `lop`
--

INSERT INTO `lop` (`MALOP`, `TENLOP`, `MAKH`) VALUES
('K12THO1', 'CNTT', 'CNTT');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
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
-- Đang đổ dữ liệu cho bảng `nguoidung`
--

INSERT INTO `nguoidung` (`ID`, `Name`, `Pass`, `User_type`, `TrangThai`, `SV`, `GV`) VALUES
('12', 'canh1', '123', 'giangvien', 'enable', NULL, 'GV01'),
('123', 'canh2', '123', 'admin', 'enable', 'K12THO0004', NULL),
('2', 'canh', '123', 'giangvien', 'enable', NULL, 'GV2');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phuhuynh`
--

CREATE TABLE `phuhuynh` (
  `CCCD` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `MK` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phuhuynh`
--

INSERT INTO `phuhuynh` (`CCCD`, `MK`) VALUES
('1', '1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sinhvien`
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
-- Đang đổ dữ liệu cho bảng `sinhvien`
--

INSERT INTO `sinhvien` (`MSSV`, `TENSV`, `GIOITINH`, `NGAYSINH`, `DIACHI`, `SDT`, `IDKHOAS`, `MALOP`, `MAKH`, `MAPH`) VALUES
('K12THO0004', 'Ngô Thanh Cảnh', b'1', '2002-01-01', 'Bình Thuận', NULL, 12, 'K12THO1', 'CNTT', '1'),
('K12THO0047', 'Nguyễn Minh Tấn', b'1', '2002-06-09', 'PHAN THIẾT - BÌNH THUẬN', NULL, 12, 'K12THO1', 'CNTT', '1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thoikhoabieu`
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
  `GIANGVIEN` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `thoikhoabieu`
--

INSERT INTO `thoikhoabieu` (`ID`, `BUOI1_THU`, `BUOI1_TIET`, `BUOI1_PHONG`, `BUOI2_THU`, `BUOI2_TIET`, `BUOI2_PHONG`, `NGAYBATDAU`, `NGAYKETTHUC`, `GHICHU`, `LOP`, `MONHOC`, `GIANGVIEN`) VALUES
(1, '2', '2', '205', '3', '2', '203', '2023-06-05', '2023-06-26', 'aaa', 'K12THO1', 'LTGV', 'GV01');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bangdiem`
--
ALTER TABLE `bangdiem`
  ADD PRIMARY KEY (`MSSV`,`MAHP`),
  ADD KEY `MAHP` (`MAHP`);

--
-- Chỉ mục cho bảng `giangvien`
--
ALTER TABLE `giangvien`
  ADD PRIMARY KEY (`MAGV`),
  ADD KEY `MAKH` (`MAKH`);

--
-- Chỉ mục cho bảng `giangvien_lop`
--
ALTER TABLE `giangvien_lop`
  ADD PRIMARY KEY (`MAGV`,`MALOP`),
  ADD KEY `MALOP` (`MALOP`);

--
-- Chỉ mục cho bảng `hocphan`
--
ALTER TABLE `hocphan`
  ADD PRIMARY KEY (`MAHP`),
  ADD KEY `GVPT` (`GVPT`);

--
-- Chỉ mục cho bảng `hocphi`
--
ALTER TABLE `hocphi`
  ADD PRIMARY KEY (`MAKH`,`MSSV`),
  ADD KEY `MSSV` (`MSSV`);

--
-- Chỉ mục cho bảng `khoa`
--
ALTER TABLE `khoa`
  ADD PRIMARY KEY (`MAKH`);

--
-- Chỉ mục cho bảng `khoas`
--
ALTER TABLE `khoas`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `lop`
--
ALTER TABLE `lop`
  ADD PRIMARY KEY (`MALOP`),
  ADD KEY `MAKH` (`MAKH`);

--
-- Chỉ mục cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `SV` (`SV`),
  ADD KEY `GV` (`GV`);

--
-- Chỉ mục cho bảng `phuhuynh`
--
ALTER TABLE `phuhuynh`
  ADD PRIMARY KEY (`CCCD`);

--
-- Chỉ mục cho bảng `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD PRIMARY KEY (`MSSV`),
  ADD KEY `IDKHOAS` (`IDKHOAS`),
  ADD KEY `MALOP` (`MALOP`),
  ADD KEY `MAKH` (`MAKH`),
  ADD KEY `MAPH` (`MAPH`);

--
-- Chỉ mục cho bảng `thoikhoabieu`
--
ALTER TABLE `thoikhoabieu`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `LOP` (`LOP`),
  ADD KEY `MONHOC` (`MONHOC`),
  ADD KEY `GIANGVIEN` (`GIANGVIEN`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bangdiem`
--
ALTER TABLE `bangdiem`
  ADD CONSTRAINT `bangdiem_ibfk_1` FOREIGN KEY (`MSSV`) REFERENCES `sinhvien` (`MSSV`) ON DELETE CASCADE,
  ADD CONSTRAINT `bangdiem_ibfk_2` FOREIGN KEY (`MAHP`) REFERENCES `hocphan` (`MAHP`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `giangvien`
--
ALTER TABLE `giangvien`
  ADD CONSTRAINT `giangvien_ibfk_1` FOREIGN KEY (`MAKH`) REFERENCES `khoa` (`MAKH`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `giangvien_lop`
--
ALTER TABLE `giangvien_lop`
  ADD CONSTRAINT `giangvien_lop_ibfk_1` FOREIGN KEY (`MAGV`) REFERENCES `giangvien` (`MAGV`) ON DELETE CASCADE,
  ADD CONSTRAINT `giangvien_lop_ibfk_2` FOREIGN KEY (`MALOP`) REFERENCES `lop` (`MALOP`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `hocphan`
--
ALTER TABLE `hocphan`
  ADD CONSTRAINT `hocphan_ibfk_1` FOREIGN KEY (`GVPT`) REFERENCES `giangvien` (`MAGV`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `hocphi`
--
ALTER TABLE `hocphi`
  ADD CONSTRAINT `hocphi_ibfk_1` FOREIGN KEY (`MAKH`) REFERENCES `khoa` (`MAKH`) ON DELETE CASCADE,
  ADD CONSTRAINT `hocphi_ibfk_2` FOREIGN KEY (`MSSV`) REFERENCES `sinhvien` (`MSSV`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `lop`
--
ALTER TABLE `lop`
  ADD CONSTRAINT `lop_ibfk_1` FOREIGN KEY (`MAKH`) REFERENCES `khoa` (`MAKH`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD CONSTRAINT `nguoidung_ibfk_1` FOREIGN KEY (`SV`) REFERENCES `sinhvien` (`MSSV`) ON DELETE CASCADE,
  ADD CONSTRAINT `nguoidung_ibfk_2` FOREIGN KEY (`GV`) REFERENCES `giangvien` (`MAGV`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD CONSTRAINT `sinhvien_ibfk_1` FOREIGN KEY (`IDKHOAS`) REFERENCES `khoas` (`ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `sinhvien_ibfk_2` FOREIGN KEY (`MALOP`) REFERENCES `lop` (`MALOP`) ON DELETE CASCADE,
  ADD CONSTRAINT `sinhvien_ibfk_3` FOREIGN KEY (`MAKH`) REFERENCES `khoa` (`MAKH`) ON DELETE CASCADE,
  ADD CONSTRAINT `sinhvien_ibfk_4` FOREIGN KEY (`MAPH`) REFERENCES `phuhuynh` (`CCCD`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `thoikhoabieu`
--
ALTER TABLE `thoikhoabieu`
  ADD CONSTRAINT `thoikhoabieu_ibfk_1` FOREIGN KEY (`LOP`) REFERENCES `lop` (`MALOP`) ON DELETE CASCADE,
  ADD CONSTRAINT `thoikhoabieu_ibfk_2` FOREIGN KEY (`MONHOC`) REFERENCES `hocphan` (`MAHP`) ON DELETE CASCADE,
  ADD CONSTRAINT `thoikhoabieu_ibfk_3` FOREIGN KEY (`GIANGVIEN`) REFERENCES `giangvien` (`MAGV`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
