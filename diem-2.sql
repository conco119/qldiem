-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 25, 2017 at 06:05 PM
-- Server version: 5.7.18
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `diem`
--

-- --------------------------------------------------------

--
-- Table structure for table `ctbangdiem`
--

CREATE TABLE `ctbangdiem` (
  `masv` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `mahp` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `magv` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `mahocky` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `malanhoc` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `diemcc` float DEFAULT NULL,
  `diemgk` float DEFAULT NULL,
  `diemth` float DEFAULT NULL,
  `diemkt` float DEFAULT NULL,
  `tongket` float DEFAULT NULL,
  `diemchu` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diemso` float DEFAULT NULL,
  `diemthilai` float DEFAULT NULL,
  `diemct` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ctbangdiem`
--

INSERT INTO `ctbangdiem` (`masv`, `mahp`, `magv`, `mahocky`, `malanhoc`, `diemcc`, `diemgk`, `diemth`, `diemkt`, `tongket`, `diemchu`, `diemso`, `diemthilai`, `diemct`) VALUES
('65DCHT2342', 'DC1CB11', 'GV1', '2016_2017_1', '1', 2, 3, 4, 5, 4.4, 'D', 1, NULL, NULL);

--
-- Triggers `ctbangdiem`
--
DELIMITER $$
CREATE TRIGGER `insert_diem` BEFORE INSERT ON `ctbangdiem` FOR EACH ROW BEGIN
	if (new.diemth is null) THEN
    	set new.tongket = (new.diemcc/10) + (new.diemgk)/5 + 					(new.diemkt*7)/10;
        ELSE
        set new.tongket = (new.diemcc/10) + ((new.diemgk + 						new.diemth)/2)/5 + (new.diemkt*7)/10;
    end if;
    
    
    if(truncate(new.tongket,1) < 4) then
    
    begin
    	set new.diemchu = "F";
        set new.diemso = 0;
     end;
     
 	ELSEIF (truncate(new.tongket,1) >=4 and truncate(new.tongket,1)<=4.9) then
    
    begin
    	set new.diemchu ='D';
        set new.diemso =1;
    end;
    
    ELSEIF (truncate(new.tongket,1) >=5.0 and truncate(new.tongket,1) <= 5.4) then
    
    begin
    	set new.diemchu = 'D+';
        set new.diemso = 1.5;
    end;    
    
    ELSEIF (truncate(new.tongket,1) >=5.5 and truncate(new.tongket,1) <= 5.9) then
    begin
    	set new.diemchu = 'C';
        set new.diemso =2;
    end;    
    ELSEIF (truncate(new.tongket,1) >=6.0 and truncate(new.tongket,1) <= 6.9) then
    begin
    	set new.diemchu = 'C+';
        set new.diemso = 2.5;
    end;    
    ELSEIF (truncate(new.tongket,1) >=7.0 and truncate(new.tongket,1) <= 7.9) then
    
    begin
    	set new.diemchu = 'B';
        set new.diemso = 3;
    end;    
    
    ELSEIF (truncate(new.tongket,1) >=8.0 and truncate(new.tongket,1) <= 8.4) then
    
    begin
    	set new.diemchu = 'B+';
        set new.diemso = 3.5;
    end;    
    
    ELSEIF (truncate(new.tongket,1) >=8.5 and truncate(new.tongket,1) <= 10) then
    
    begin
    	set new.diemchu = 'A';    
        set new.diemso = 4;
    end;    
    
 end if;
    
    
    	
    
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `giangvien`
--

CREATE TABLE `giangvien` (
  `magv` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `tengv` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `ngaysinh` date NOT NULL,
  `gioitinh` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `manganh` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(128) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `giangvien`
--

INSERT INTO `giangvien` (`magv`, `tengv`, `ngaysinh`, `gioitinh`, `email`, `password`, `manganh`, `role`) VALUES
('AD0', 'Cao Trung Kiên', '2017-05-09', 'Nam', 'trungkien@gmail.com', 'AD0', 'HTTT', '2'),
('GV1', 'Đỗ Bảo Sơn', '2017-05-03', 'Nam', 'sonnt@gmail.com', 'GV1', 'HTTT', '1');

-- --------------------------------------------------------

--
-- Table structure for table `hocky`
--

CREATE TABLE `hocky` (
  `mahocky` varchar(128) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hocky`
--

INSERT INTO `hocky` (`mahocky`) VALUES
('2016_2017_1'),
('2016_2017_2'),
('2017_2018_22');

-- --------------------------------------------------------

--
-- Table structure for table `hocphan`
--

CREATE TABLE `hocphan` (
  `mahp` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `tenhp` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `sotc` int(128) NOT NULL,
  `sotietly` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `so_tiet_th` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hocphan`
--

INSERT INTO `hocphan` (`mahp`, `tenhp`, `sotc`, `sotietly`, `so_tiet_th`) VALUES
('DC1CB11', 'Toán 1', 4, '60', NULL),
('DC1TT43', 'Tin học đại cương', 3, '15', '45'),
('DC3HT33', 'Tiếng Anh 3', 3, '45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `khoa`
--

CREATE TABLE `khoa` (
  `makhoa` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `tenkhoa` varchar(128) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khoa`
--

INSERT INTO `khoa` (`makhoa`, `tenkhoa`) VALUES
('CD', 'Cầu đường'),
('CNTT', 'Công nghệ thông tin'),
('DT', 'Điện tử');

-- --------------------------------------------------------

--
-- Table structure for table `lanhoc`
--

CREATE TABLE `lanhoc` (
  `malanhoc` varchar(128) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lanhoc`
--

INSERT INTO `lanhoc` (`malanhoc`) VALUES
('1'),
('2'),
('CT');

-- --------------------------------------------------------

--
-- Table structure for table `lop`
--

CREATE TABLE `lop` (
  `malop` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `tenlop` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `manganh` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `namnhaphoc` varchar(128) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lop`
--

INSERT INTO `lop` (`malop`, `tenlop`, `manganh`, `namnhaphoc`) VALUES
('65DCHT21', '65DCHT21', 'HTTT', '2014'),
('65DCHT22', '65DCHT22', 'HTTT', '2014');

-- --------------------------------------------------------

--
-- Table structure for table `nganh`
--

CREATE TABLE `nganh` (
  `manganh` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `tennganh` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `sonamdt` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `makhoa` varchar(128) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nganh`
--

INSERT INTO `nganh` (`manganh`, `tennganh`, `sonamdt`, `makhoa`) VALUES
('HTTT', 'Hệ thống thông tin', '4', 'CNTT'),
('OT', 'Ô tô', '4.5', 'DT'),
('TTM', 'Truyền thông mạng', '4', 'CNTT');

-- --------------------------------------------------------

--
-- Table structure for table `sinhvien`
--

CREATE TABLE `sinhvien` (
  `masv` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `tensv` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `malop` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `ngaysinh` date NOT NULL,
  `gioitinh` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `diachi` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sinhvien`
--

INSERT INTO `sinhvien` (`masv`, `tensv`, `malop`, `ngaysinh`, `gioitinh`, `diachi`, `email`, `sdt`, `password`) VALUES
('65DCHT2342', 'Nguyễn Hải Duy', '65DCHT22', '2017-05-03', 'Nam', 'Cầu diễn - Hà Nội', 'caudien@gmail.com', '325612345', '1234'),
('65DCHT666', 'Phạm Văn Toàn', '65DCHT21', '2017-03-21', 'Nữ', 'Thường tìn', 'dsad', '123456', '65DCHT666'),
('65DCHT777', 'Trần Anh Tú', '65DCHT22', '1996-05-29', 'Nữ', 'Thanh Trì', 'anhtu@gmail.com', '1234567', '65DCHT777');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ctbangdiem`
--
ALTER TABLE `ctbangdiem`
  ADD KEY `ctbangdiem_fk0` (`masv`),
  ADD KEY `ctbangdiem_fk1` (`mahp`),
  ADD KEY `ctbangdiem_fk2` (`mahocky`),
  ADD KEY `ctbangdiem_fk3` (`magv`),
  ADD KEY `ctbangdiem_fk4` (`malanhoc`);

--
-- Indexes for table `giangvien`
--
ALTER TABLE `giangvien`
  ADD PRIMARY KEY (`magv`),
  ADD KEY `giangvien_fk0` (`manganh`);

--
-- Indexes for table `hocky`
--
ALTER TABLE `hocky`
  ADD PRIMARY KEY (`mahocky`);

--
-- Indexes for table `hocphan`
--
ALTER TABLE `hocphan`
  ADD PRIMARY KEY (`mahp`);

--
-- Indexes for table `khoa`
--
ALTER TABLE `khoa`
  ADD PRIMARY KEY (`makhoa`);

--
-- Indexes for table `lanhoc`
--
ALTER TABLE `lanhoc`
  ADD PRIMARY KEY (`malanhoc`);

--
-- Indexes for table `lop`
--
ALTER TABLE `lop`
  ADD PRIMARY KEY (`malop`),
  ADD KEY `lop_fk1` (`manganh`);

--
-- Indexes for table `nganh`
--
ALTER TABLE `nganh`
  ADD PRIMARY KEY (`manganh`),
  ADD KEY `nganh_fk0` (`makhoa`);

--
-- Indexes for table `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD PRIMARY KEY (`masv`),
  ADD KEY `sinhvien_fk0` (`malop`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ctbangdiem`
--
ALTER TABLE `ctbangdiem`
  ADD CONSTRAINT `ctbangdiem_fk1` FOREIGN KEY (`mahp`) REFERENCES `hocphan` (`mahp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ctbangdiem_fk2` FOREIGN KEY (`mahocky`) REFERENCES `hocky` (`mahocky`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ctbangdiem_fk3` FOREIGN KEY (`magv`) REFERENCES `giangvien` (`magv`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ctbangdiem_fk4` FOREIGN KEY (`malanhoc`) REFERENCES `lanhoc` (`malanhoc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `giangvien`
--
ALTER TABLE `giangvien`
  ADD CONSTRAINT `giangvien_fk0` FOREIGN KEY (`manganh`) REFERENCES `nganh` (`manganh`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lop`
--
ALTER TABLE `lop`
  ADD CONSTRAINT `lop_fk1` FOREIGN KEY (`manganh`) REFERENCES `nganh` (`manganh`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nganh`
--
ALTER TABLE `nganh`
  ADD CONSTRAINT `nganh_fk0` FOREIGN KEY (`makhoa`) REFERENCES `khoa` (`makhoa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD CONSTRAINT `sinhvien_fk0` FOREIGN KEY (`malop`) REFERENCES `lop` (`malop`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
