-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Feb 13, 2020 at 06:45 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php2`
--

-- --------------------------------------------------------

--
-- Table structure for table `baiviet`
--

CREATE TABLE `baiviet` (
  `mabv` int(11) NOT NULL,
  `tenbv` varchar(100) COLLATE utf8_bin NOT NULL,
  `motabv` text COLLATE utf8_bin NOT NULL,
  `noidungbv` text COLLATE utf8_bin NOT NULL,
  `luotxem` int(11) NOT NULL DEFAULT 0,
  `hinhanhbv` varchar(100) COLLATE utf8_bin NOT NULL,
  `ngaydang` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `matk` int(11) NOT NULL,
  `malbv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `binhluanbv`
--

CREATE TABLE `binhluanbv` (
  `stt` int(11) NOT NULL,
  `noidung` varchar(100) COLLATE utf8_bin NOT NULL,
  `sao` varchar(100) COLLATE utf8_bin NOT NULL DEFAULT '5',
  `ngaydang` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `matk` int(11) NOT NULL,
  `mabv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `binhluansp`
--

CREATE TABLE `binhluansp` (
  `stt` int(11) NOT NULL,
  `noidung` varchar(255) COLLATE utf8_bin NOT NULL,
  `sao` varchar(100) COLLATE utf8_bin NOT NULL DEFAULT '5',
  `ngaydang` timestamp NOT NULL DEFAULT current_timestamp(),
  `matk` int(11) NOT NULL,
  `masp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `dichvu`
--

CREATE TABLE `dichvu` (
  `madv` int(11) NOT NULL,
  `tieude` varchar(100) COLLATE utf8_bin NOT NULL,
  `noidung` text COLLATE utf8_bin NOT NULL,
  `hinhanh` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `dichvu`
--

INSERT INTO `dichvu` (`madv`, `tieude`, `noidung`, `hinhanh`) VALUES
(1, 'Thiết kế thời trang', 'Thiết kế thời trang là nghệ thuật áp dụng thiết kế, thẩm mỹ và vẻ đẹp tự nhiên vào quần áo và các ph', '01.jpg'),
(2, 'Tiến triển', 'Phát triển là một phạm trù của triết học, là quá trình vận động tiến lên từ thấp đến cao, từ đơn giản đến phức tạp, từ kém hoàn thiện đến hoàn thiện hơn của một sự vật. Quá trình vận động đó diễn ra vừa dần dần, vừa nhảy vọt để đưa tới sự ra đời của cái mới thay thế cái cũ.', '02.jpg'),
(3, 'Jeans', 'Jeans là một loại quần xuất xứ từ các nước phương Tây, và là một trong những biểu tượng của xã hội phương tây vào thế kỷ XX. Cụ thể, nó đã từng là biểu tượng cho tuổi trẻ, sự phản kháng, tự do và cho chủ nghĩa cá nhân của mọi tầng lớp nhân dân ở phương tây.', '03.jpg'),
(4, 'Trang phục', 'Thời Trang Nữ Thiết Kế, Phong Cách Trẻ Trung, Hiện Đại. Lựa chọn của các cô nàng sành điệu, Freeship cho hóa đơn từ 300,000đ. Mua sắm ngay! Giao hàng toàn quốc. Miễn phí đổi 30 ngày. Update mẫu mới hàng tuần. Sản phẩm chất lượng.', '04.jpg'),
(5, 'Áo thun', 'Bạn muốn chọn áo thun trơn đơn giản hay áo thun nữ kiểu cá tính? GUMAC luôn mang đến sự đa dạng về mẫu mã cùng chất liệu áo thun cao cấp để chị em có sự lựa chọn dễ dàng nhất. Những mẫu áo thun nữ hàng hiệu hay áo thun nữ cao cấp của nhà Gu luôn có giá rẻ nhất cho mọi người, đặc biệt là áo thun nữ kiểu mới nhất trong bộ sưu tập thường nhận được nhiều sự quan tâm và chú ý. Chị em muốn tìm áo thun nữ rẻ đẹp thì hãy ghé thăm GUMAC ngay hôm nay.', '06.jpg'),
(6, 'Khăn trải giường', 'Ga trải giường, khăn trải giường là một tấm vải dùng để bao phủ lên bề mặt của một tấm đệm dùng để nằm ngủ. Khi nằm lên nệm giường thì người nằm thường tiếp xúc trực tiếp với tấm ga chứ ít khi tiếp xúc trực tiếp với đệm.', '05.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `doitac`
--

CREATE TABLE `doitac` (
  `madt` int(11) NOT NULL,
  `tendt` varchar(100) COLLATE utf8_bin NOT NULL,
  `sdt` varchar(100) COLLATE utf8_bin NOT NULL,
  `hinhanh` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `mahd` int(11) NOT NULL,
  `ngaymua` timestamp NOT NULL DEFAULT current_timestamp(),
  `tongtien` double(10,0) NOT NULL,
  `ghichu` varchar(254) COLLATE utf8_bin DEFAULT NULL,
  `matk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `hoadonchitiet`
--

CREATE TABLE `hoadonchitiet` (
  `stt` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `dongia` double(10,0) NOT NULL,
  `mahd` int(11) NOT NULL,
  `maspct` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `lienhe`
--

CREATE TABLE `lienhe` (
  `stt` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `sdt` varchar(100) COLLATE utf8_bin NOT NULL,
  `tenkh` varchar(100) COLLATE utf8_bin NOT NULL,
  `tinnhan` varchar(255) COLLATE utf8_bin NOT NULL,
  `trangthai` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `loaibaiviet`
--

CREATE TABLE `loaibaiviet` (
  `malbv` int(11) NOT NULL,
  `tenlbv` varchar(100) COLLATE utf8_bin NOT NULL,
  `hinhanh` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `loaibaiviet`
--

INSERT INTO `loaibaiviet` (`malbv`, `tenlbv`, `hinhanh`) VALUES
(1, 'Thời trang nam', 'slide02.jpg'),
(2, 'Thời trang nữ', 'slide01.jpg'),
(3, 'Thời trang trẻ em', 'slide03.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `loaihang`
--

CREATE TABLE `loaihang` (
  `malh` int(11) NOT NULL,
  `tenlh` varchar(100) COLLATE utf8_bin NOT NULL,
  `hinhanhlh` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `loaihang`
--

INSERT INTO `loaihang` (`malh`, `tenlh`, `hinhanhlh`) VALUES
(1, 'Nội Thất Phòng Ăn', 'PA3.jpg'),
(2, 'Nội Thất Phòng Ngủ', 'PN.jpg'),
(3, 'Nội Thất Phòng Khách', 'PK.jpg'),
(4, 'Nội Thất Phòng Làm Việc', 'PLV.jpg'),
(5, 'Nội Thất Trẻ Em', 'PTE2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `mausac`
--

CREATE TABLE `mausac` (
  `mams` int(11) NOT NULL,
  `tenmau` varchar(20) COLLATE utf8_bin NOT NULL,
  `hex` varchar(10) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `mausac`
--

INSERT INTO `mausac` (`mams`, `tenmau`, `hex`) VALUES
(1, 'Đen', '#000'),
(2, 'Trắng', '#fff'),
(3, 'Xám', '#a4a4a4');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `masp` int(11) NOT NULL,
  `tensp` varchar(100) COLLATE utf8_bin NOT NULL,
  `gia` double(10,0) NOT NULL,
  `luotxem` int(11) NOT NULL DEFAULT 0,
  `mota` text COLLATE utf8_bin DEFAULT NULL,
  `khuyenmai` int(3) NOT NULL DEFAULT 0,
  `dacbiet` int(1) NOT NULL DEFAULT 0,
  `ngaynhap` timestamp NOT NULL DEFAULT current_timestamp(),
  `hinhanhsp` varchar(100) COLLATE utf8_bin NOT NULL,
  `malh` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`masp`, `tensp`, `gia`, `luotxem`, `mota`, `khuyenmai`, `dacbiet`, `ngaynhap`, `hinhanhsp`, `malh`) VALUES
(1, 'Ghế Màu Xanh Lá', 3300000, 0, 'Nhựa cao cấp - Chân kim loại', 0, 0, '2020-02-13 17:19:32', 'product_1.png', 3),
(2, 'Ghế Màu Cam', 3000000, 0, 'Nhựa cao cấp - Chân kim loại', 0, 0, '2020-02-13 17:20:11', 'product_2.png', 3);

-- --------------------------------------------------------

--
-- Table structure for table `sanphamchitiet`
--

CREATE TABLE `sanphamchitiet` (
  `maspct` int(11) NOT NULL,
  `masz` int(11) NOT NULL,
  `mams` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `hinhanhspct` varchar(100) COLLATE utf8_bin NOT NULL,
  `masp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `masz` int(11) NOT NULL,
  `tensize` varchar(10) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`masz`, `tensize`) VALUES
(1, 'Xs'),
(2, 'S'),
(3, 'M'),
(4, 'L'),
(5, 'XL');

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `matk` int(11) NOT NULL,
  `tenkh` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `sdt` varchar(100) COLLATE utf8_bin NOT NULL,
  `matkhau` varchar(100) COLLATE utf8_bin NOT NULL,
  `diachi` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `gioitinh` varchar(100) COLLATE utf8_bin NOT NULL DEFAULT 'Nam',
  `phanquyen` int(1) NOT NULL DEFAULT 0,
  `token` longtext COLLATE utf8_bin DEFAULT NULL,
  `hieuluc` text COLLATE utf8_bin DEFAULT NULL,
  `kichhoat` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`matk`, `tenkh`, `sdt`, `matkhau`, `diachi`, `email`, `gioitinh`, `phanquyen`, `token`, `hieuluc`, `kichhoat`) VALUES
(77, 'Kim bảo', '0974721751', '$2y$10$vMlGN/fnybMaMNl9Fa5Nsu2u5BgsSCHAkHW6ckmVH9mELi.h6AWpK', '103 lê sao, phú thạnh, tân phú', 'kimbao756g@gmail.com', 'Nam', 1, '$2y$10$3xYFRBE6hO7e3SUZTOdFdeoVCteNsc7rc1vlOHyIp9z6BTpS1t1ga', '1576912077', 1),
(100, 'Nguyen Nhat', '0929429458', '$2y$10$JpN09YFwI1KlTZg7Buoc8.LDva1KbYxOcrpLncGOR7qbV5k8fPL2q', 'Lai thieu thuan an binh duong, nguyen van luong go vap tp hcm', 'hongnhat3333@gmail.com', 'Nam', 1, NULL, NULL, 1),
(101, 'Duy Trịnh', '0904047470', '$2y$10$BoMQ3Uf7SVgrA6T52XEXf.C9LrbFDqJ2hdh.mYdUEHM0px5iTTdmO', '666/40/27 nguyen van qua quan 12', 'duytrinh2508@gmail.com', 'Nam', 1, NULL, NULL, 1),
(104, 'Nguyen nguyenthi', '0362277635', '$2y$10$EXVl6B5Bllo/GOpSBY51pODJHrM11IqaSfkCVbvixyQWrCYsU3F5m', 'Xã thạnh mỹ,huyện thanh hóa , tỉnh nghệ an', 'nguyennttps08770@fpt.edu.vn', 'Nam', 0, '$2y$10$WvdjmKYlSxwss7.m3APWMe2eXJOjq/xQ6Z8TlntUZ9F4OWx/aDQvK', '1576907191', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `baiviet`
--
ALTER TABLE `baiviet`
  ADD PRIMARY KEY (`mabv`),
  ADD KEY `matk` (`matk`),
  ADD KEY `malbv` (`malbv`);

--
-- Indexes for table `binhluanbv`
--
ALTER TABLE `binhluanbv`
  ADD PRIMARY KEY (`stt`),
  ADD KEY `binhluanbv_ibfk_1` (`matk`),
  ADD KEY `mabv` (`mabv`);

--
-- Indexes for table `binhluansp`
--
ALTER TABLE `binhluansp`
  ADD PRIMARY KEY (`stt`),
  ADD KEY `matk` (`matk`),
  ADD KEY `masp` (`masp`);

--
-- Indexes for table `dichvu`
--
ALTER TABLE `dichvu`
  ADD PRIMARY KEY (`madv`);

--
-- Indexes for table `doitac`
--
ALTER TABLE `doitac`
  ADD PRIMARY KEY (`madt`);

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`mahd`),
  ADD KEY `matk` (`matk`);

--
-- Indexes for table `hoadonchitiet`
--
ALTER TABLE `hoadonchitiet`
  ADD PRIMARY KEY (`stt`),
  ADD KEY `masp` (`maspct`),
  ADD KEY `mahd` (`mahd`);

--
-- Indexes for table `lienhe`
--
ALTER TABLE `lienhe`
  ADD PRIMARY KEY (`stt`);

--
-- Indexes for table `loaibaiviet`
--
ALTER TABLE `loaibaiviet`
  ADD PRIMARY KEY (`malbv`);

--
-- Indexes for table `loaihang`
--
ALTER TABLE `loaihang`
  ADD PRIMARY KEY (`malh`);

--
-- Indexes for table `mausac`
--
ALTER TABLE `mausac`
  ADD PRIMARY KEY (`mams`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`masp`),
  ADD KEY `malh` (`malh`);

--
-- Indexes for table `sanphamchitiet`
--
ALTER TABLE `sanphamchitiet`
  ADD PRIMARY KEY (`maspct`),
  ADD KEY `masp` (`masp`),
  ADD KEY `mams` (`mams`),
  ADD KEY `sanphamchitiet_ibfk_3` (`masz`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`masz`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`matk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `baiviet`
--
ALTER TABLE `baiviet`
  MODIFY `mabv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `binhluanbv`
--
ALTER TABLE `binhluanbv`
  MODIFY `stt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `binhluansp`
--
ALTER TABLE `binhluansp`
  MODIFY `stt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=307;

--
-- AUTO_INCREMENT for table `dichvu`
--
ALTER TABLE `dichvu`
  MODIFY `madv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `doitac`
--
ALTER TABLE `doitac`
  MODIFY `madt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `mahd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `hoadonchitiet`
--
ALTER TABLE `hoadonchitiet`
  MODIFY `stt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `lienhe`
--
ALTER TABLE `lienhe`
  MODIFY `stt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `loaibaiviet`
--
ALTER TABLE `loaibaiviet`
  MODIFY `malbv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `loaihang`
--
ALTER TABLE `loaihang`
  MODIFY `malh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mausac`
--
ALTER TABLE `mausac`
  MODIFY `mams` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `masp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `sanphamchitiet`
--
ALTER TABLE `sanphamchitiet`
  MODIFY `maspct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `masz` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `matk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `baiviet`
--
ALTER TABLE `baiviet`
  ADD CONSTRAINT `baiviet_ibfk_1` FOREIGN KEY (`matk`) REFERENCES `taikhoan` (`matk`) ON UPDATE CASCADE,
  ADD CONSTRAINT `baiviet_ibfk_2` FOREIGN KEY (`malbv`) REFERENCES `loaibaiviet` (`malbv`) ON UPDATE CASCADE;

--
-- Constraints for table `binhluanbv`
--
ALTER TABLE `binhluanbv`
  ADD CONSTRAINT `binhluanbv_ibfk_1` FOREIGN KEY (`matk`) REFERENCES `taikhoan` (`matk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `binhluanbv_ibfk_2` FOREIGN KEY (`mabv`) REFERENCES `baiviet` (`mabv`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `binhluansp`
--
ALTER TABLE `binhluansp`
  ADD CONSTRAINT `binhluansp_ibfk_1` FOREIGN KEY (`matk`) REFERENCES `taikhoan` (`matk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `binhluansp_ibfk_2` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`matk`) REFERENCES `taikhoan` (`matk`) ON UPDATE CASCADE;

--
-- Constraints for table `hoadonchitiet`
--
ALTER TABLE `hoadonchitiet`
  ADD CONSTRAINT `hoadonchitiet_ibfk_1` FOREIGN KEY (`maspct`) REFERENCES `sanphamchitiet` (`maspct`) ON UPDATE CASCADE,
  ADD CONSTRAINT `hoadonchitiet_ibfk_2` FOREIGN KEY (`mahd`) REFERENCES `hoadon` (`mahd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`malh`) REFERENCES `loaihang` (`malh`) ON UPDATE CASCADE;

--
-- Constraints for table `sanphamchitiet`
--
ALTER TABLE `sanphamchitiet`
  ADD CONSTRAINT `sanphamchitiet_ibfk_1` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sanphamchitiet_ibfk_3` FOREIGN KEY (`masz`) REFERENCES `size` (`masz`) ON UPDATE CASCADE,
  ADD CONSTRAINT `sanphamchitiet_ibfk_4` FOREIGN KEY (`mams`) REFERENCES `mausac` (`mams`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
