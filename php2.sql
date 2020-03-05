-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Mar 04, 2020 at 06:24 PM
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
  `hinhanhbv` varchar(100) COLLATE utf8_bin NOT NULL,
  `noidungbv` text COLLATE utf8_bin NOT NULL,
  `luotxem` int(11) NOT NULL DEFAULT 0,
  `ngaydang` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `matk` int(11) NOT NULL,
  `malbv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `baiviet`
--

INSERT INTO `baiviet` (`mabv`, `tenbv`, `motabv`, `hinhanhbv`, `noidungbv`, `luotxem`, `ngaydang`, `matk`, `malbv`) VALUES
(29, 'Kim Bảo', 'đẹp trai vô đối', 'single_blog_1.png\r\n', 'đẹp trai vô đối không có gì để nói', 100008, '2020-02-27 18:01:04', 77, 1),
(30, 'trúc Đào', 'đẹp trai vô đối', 'single_blog_1.png\r\n', 'đẹp trai vô đối không có gì để nói', 100025, '2020-02-27 18:04:48', 77, 1),
(31, 'Hồng nhật', 'đẹp trai vô đối', 'single_blog_1.png\r\n', 'đẹp trai vô đối không có gì để nói', 100058, '2020-02-27 18:05:04', 77, 1);

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `mabn` int(11) NOT NULL,
  `tieude` varchar(100) COLLATE utf8_bin NOT NULL,
  `noidung` text COLLATE utf8_bin NOT NULL,
  `hinhanhbn` varchar(100) COLLATE utf8_bin NOT NULL,
  `link` varchar(100) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`mabn`, `tieude`, `noidung`, `hinhanhbn`, `link`) VALUES
(1, 'Sự Tinh Tế', 'Khởi nguồn từ 1999 với ý tưởng tạo ra sự khác biệt và gu thẩm mỹ Tinh Tế, Sweet Home đã trở thành và giữ vững vị trí thương hiệu nội thất hàng đầu Việt Nam.', '5a01961f7ca233f48ba6273d.png', NULL),
(2, 'Sự Hoàn Hảo', 'Suốt cả quá trình hình thành và phát triển Sweet Home luôn lấy sự Hoàn Hảo của những sản phẩm là tiêu chí đánh giá hàng đầu.', '5a0196567ca233f48ba6273e.png', NULL),
(3, 'Sự Chân Thành', 'Bằng tất cả sự Chân Thành - đội ngũ Sweet Home sẽ luôn đem đến sự thoải mái như chính những người thân gia đình.', '58f3736ea4fa116215a92403.png', NULL);

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

--
-- Dumping data for table `binhluanbv`
--

INSERT INTO `binhluanbv` (`stt`, `noidung`, `sao`, `ngaydang`, `matk`, `mabv`) VALUES
(66, 'Good', '5', '2020-02-23 14:36:47', 77, 31),
(67, 'Tốt', '5', '2020-02-27 18:01:10', 77, 29);

-- --------------------------------------------------------

--
-- Table structure for table `binhluansp`
--

CREATE TABLE `binhluansp` (
  `stt` int(11) NOT NULL,
  `noidung` varchar(255) COLLATE utf8_bin NOT NULL,
  `sao` tinyint(1) NOT NULL DEFAULT 5,
  `ngaydang` timestamp NOT NULL DEFAULT current_timestamp(),
  `matk` int(11) NOT NULL,
  `masp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `binhluansp`
--

INSERT INTO `binhluansp` (`stt`, `noidung`, `sao`, `ngaydang`, `matk`, `masp`) VALUES
(361, 'Tạm ', 4, '2020-02-23 05:29:12', 77, 16),
(362, 'Tệ', 1, '2020-02-23 05:29:17', 77, 16),
(363, 'Tệ', 2, '2020-02-23 05:29:23', 77, 16),
(364, 'Tệ', 2, '2020-02-23 05:29:26', 77, 16),
(365, 'Tệ', 2, '2020-02-23 05:29:32', 77, 16),
(366, 'Tệ', 2, '2020-02-23 05:29:34', 77, 16),
(367, 'Tệ', 2, '2020-02-23 05:29:35', 77, 16),
(368, 'Tệ', 2, '2020-02-23 05:29:37', 77, 16),
(369, 'Tốt', 5, '2020-02-23 05:29:40', 77, 16),
(370, 'Tốt', 5, '2020-02-23 05:29:43', 77, 16),
(371, 'Tốt', 5, '2020-02-23 05:29:46', 77, 16);

-- --------------------------------------------------------

--
-- Table structure for table `dangky-baiviet`
--

CREATE TABLE `dangky-baiviet` (
  `stt` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `dangky-baiviet`
--

INSERT INTO `dangky-baiviet` (`stt`, `email`) VALUES
(33, 'kimbao756g@gmail.com'),
(34, 'kimbao756g@gmail.com'),
(35, 'kimbao756g@gmail.com'),
(36, 'kimbao756g@gmail.com'),
(37, 'kimbao756g@gmail.com'),
(38, 'kimbao756g@gmail.com'),
(39, 'kimbao7562@yahoo.com');

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
  `tenkh` varchar(254) COLLATE utf8_bin NOT NULL,
  `sdt` varchar(20) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `diachi` varchar(254) COLLATE utf8_bin NOT NULL,
  `ngaymua` timestamp NOT NULL DEFAULT current_timestamp(),
  `tongtien` double(10,0) NOT NULL,
  `ghichu` varchar(254) COLLATE utf8_bin DEFAULT NULL,
  `matk` int(11) DEFAULT NULL,
  `trangthai` int(11) NOT NULL DEFAULT 0 COMMENT '0: Chờ Xác Nhận; 1: Đã Xác Nhận; 2: Đã Lấy Hàng; 3: Đã Giao Hàng; 4: Khách Hủy; 5: Hệ Thống Hủy'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`mahd`, `tenkh`, `sdt`, `email`, `diachi`, `ngaymua`, `tongtien`, `ghichu`, `matk`, `trangthai`) VALUES
(1, 'Kim bảo ', '0974721752', 'kimbao756g@gmail.com', '', '2020-03-03 15:48:11', 25800000, '', 136, 3),
(2, 'Hồng nhật', '0909123123', NULL, '103 lê sao, phú thạnh, tân phú', '2020-03-04 05:22:41', 51400000, '', NULL, 3),
(3, 'Kim bảo ', '0974721752', 'kimbao756g@gmail.com', '103 lê sao, phú thạnh, tân phú', '2020-03-04 17:23:33', 13035000, '', 136, 0);

-- --------------------------------------------------------

--
-- Table structure for table `hoadonchitiet`
--

CREATE TABLE `hoadonchitiet` (
  `stt` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `dongia` double(10,0) NOT NULL,
  `mahd` int(11) NOT NULL,
  `masp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `hoadonchitiet`
--

INSERT INTO `hoadonchitiet` (`stt`, `soluong`, `dongia`, `mahd`, `masp`) VALUES
(236, 2, 12900000, 1, 12),
(237, 2, 25700000, 2, 11),
(238, 1, 9900000, 3, 6),
(239, 1, 3135000, 3, 7);

-- --------------------------------------------------------

--
-- Table structure for table `lienhe`
--

CREATE TABLE `lienhe` (
  `stt` int(11) NOT NULL,
  `tieude` text COLLATE utf8_bin NOT NULL,
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
(4, 'Nội Thất Phòng Làm Việc', 'PLV.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `mathang`
--

CREATE TABLE `mathang` (
  `mamh` int(11) NOT NULL,
  `tenmh` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `mathang`
--

INSERT INTO `mathang` (`mamh`, `tenmh`) VALUES
(1, 'Bàn'),
(2, 'Ghế'),
(3, 'Giường'),
(4, 'Kệ Treo Tường'),
(5, 'Tủ'),
(6, 'Nệm'),
(7, 'Bàn Trang Điểm'),
(8, 'Sofa'),
(9, 'Xe Đẩy'),
(10, 'Kệ Sách');

-- --------------------------------------------------------

--
-- Table structure for table `mausac`
--

CREATE TABLE `mausac` (
  `mams` int(11) NOT NULL,
  `tenmau` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `mausac`
--

INSERT INTO `mausac` (`mams`, `tenmau`) VALUES
(1, 'Đen'),
(2, 'Nâu'),
(3, 'Xám'),
(4, 'Xanh'),
(5, 'Bọc Da'),
(6, 'Cam'),
(7, 'Trắng'),
(8, 'Kem'),
(9, 'Không Xác Định');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `masp` int(11) NOT NULL,
  `tensp` varchar(100) COLLATE utf8_bin NOT NULL,
  `gia` double(10,0) NOT NULL,
  `soluong` int(11) NOT NULL DEFAULT 0,
  `luotxem` int(11) NOT NULL DEFAULT 0,
  `mota` text COLLATE utf8_bin DEFAULT NULL,
  `mams` int(11) NOT NULL DEFAULT 9,
  `mamh` int(11) NOT NULL,
  `khuyenmai` int(3) NOT NULL DEFAULT 0,
  `dacbiet` int(1) NOT NULL DEFAULT 0,
  `ngaynhap` timestamp NOT NULL DEFAULT current_timestamp(),
  `hinhanhsp` varchar(100) COLLATE utf8_bin NOT NULL,
  `trangthai` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `malh` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`masp`, `tensp`, `gia`, `soluong`, `luotxem`, `mota`, `mams`, `mamh`, `khuyenmai`, `dacbiet`, `ngaynhap`, `hinhanhsp`, `trangthai`, `malh`) VALUES
(1, 'Ghế Màu Xanh Lá', 3300000, 994, 13, 'Nhựa cao cấp - Chân kim loại', 2, 2, 0, 1, '2020-02-13 17:19:32', 'product_1.png', NULL, 3),
(2, 'Ghế Màu Cam', 3000000, 995, 2, 'Nhựa cao cấp - Chân kim loại', 6, 2, 0, 0, '2020-02-13 17:20:11', 'product_2.png', NULL, 3),
(3, 'Bàn Nước Monocle', 10900000, 1000, 3, 'Khung kim loại, Đá hoa cương', 1, 1, 0, 1, '2020-02-14 10:28:11', 'ban-nuoc-monocle.jpg', NULL, 3),
(4, 'Bàn Nước Oval', 15900000, 999, 1, 'Chân kim loại màu đồng- MDF giả da', 2, 1, 0, 0, '2020-02-14 10:29:01', 'ban-nuoc-oval.jpg', NULL, 3),
(5, 'Bàn Ăn Delta 01', 95000000, 999, 528, 'Khung kim loại sơn tĩnh điện- Mặt đá', 7, 1, 10, 0, '2020-02-14 10:30:48', 'ban-an-delta-1.jpg', NULL, 1),
(6, 'Bàn Ăn Roma', 9900000, 994, 18, 'Gỗ tần bì (Ash)- MDF sơn trắng', 7, 1, 0, 1, '2020-02-14 10:31:35', 'ban-an-roma.jpg', NULL, 1),
(7, 'Ghế Ăn HC', 3300000, 999, 29, 'Chân kim loại - da công nghiệp', 8, 2, 5, 0, '2020-02-14 10:32:35', 'ghe_an_hc.jpg', NULL, 1),
(8, 'Ghế Tuscany', 3600000, 1000, 1, 'Da công nghiệp - Kim loại', 5, 2, 3, 1, '2020-02-14 10:33:23', 'ghe-tuscany.gif', NULL, 1),
(9, 'Bàn Làm Việc Biblio', 11900000, 993, 1, 'Chân kim loại+ MDF+ Da', 2, 1, 0, 1, '2020-02-14 10:36:30', 'ban-lam-viec-biblio.jpg', NULL, 4),
(10, 'Kệ Treo Tường Natura Gautier', 11900000, 998, 1, 'Gỗ sồi (Oak)', 1, 4, 0, 0, '2020-02-14 10:38:33', 'ke-treo-natura-gautier.jpg', NULL, 4),
(11, 'Kệ sách Glamour màu Walnut', 25700000, 994, 1, 'Gỗ xà cừ (Mahogany), gỗ ép, gỗ lạng', 2, 10, 0, 1, '2020-02-14 10:39:53', 'ke_sach_glamour_mau_walnut_l.jpg', NULL, 4),
(12, 'Bàn Làm Việc Leo', 12900000, 948, 6, 'Chân kim loại+ Gỗ', 9, 1, 0, 0, '2020-02-14 10:37:35', 'line-pio_desk.jpg', NULL, 4),
(13, 'Giường Hộc Kéo Iris', 14900000, 1000, 3, 'Khung gỗ bọc vải', 3, 3, 20, 0, '2020-02-14 10:43:44', '500-iris-grey.jpg', NULL, 2),
(14, 'Giường Bụi', 16900000, 1000, 20, 'Gỗ Thông + MDF Veneer Thông + Kim loại sơn tinh điện+ Vải', 7, 3, 29, 0, '2020-02-14 10:44:22', 'bui_bed-front.jpg', NULL, 2),
(15, 'Giường Ngủ Lạc Viên', 31900000, 956, 36, 'Gỗ xà cừ - Da công nghiệp', 4, 3, 0, 1, '2020-02-14 10:45:38', 'giuong-ngu-lac-vien.jpg', NULL, 2),
(16, 'Giường Dixie', 62000000, 998, 6, 'Khung gỗ tần bì', 3, 3, 0, 0, '2020-02-14 10:46:43', 'giuong-ngu-dixie2.jpg', NULL, 2);

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
  `gioithieu` text COLLATE utf8_bin DEFAULT NULL,
  `hinhanhkh` varchar(100) COLLATE utf8_bin DEFAULT 'user.jpg',
  `phanquyen` int(1) NOT NULL DEFAULT 0,
  `token` longtext COLLATE utf8_bin DEFAULT NULL,
  `hieuluc` text COLLATE utf8_bin DEFAULT NULL,
  `kichhoat` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`matk`, `tenkh`, `sdt`, `matkhau`, `diachi`, `email`, `gioithieu`, `hinhanhkh`, `phanquyen`, `token`, `hieuluc`, `kichhoat`) VALUES
(77, 'Kim bảo', '0974721751', '$2y$10$bVFDNbSdQVFQ6aEdwRzp4OSAwCgcItqFWi9r5ZILVt6skkMwzxT/O', '103 lê sao, phú thạnh, tân phú', 'kimbao756@gmail.com', '\"Hãy cứ khát khao, hãy cứ dại khờ.\" <i>Steve Jobs</i>', 'hongnhat.jpg', 1, '', '', 1),
(136, 'Kim bảo ', '0974721752', '$2y$10$4AY.XCDYupfS/2wxZ969e.QFH.zVodv8A.BnkWf81S.rr32Cjb6GS', '103 lê sao, phú thạnh, tân phú', 'kimbao756g@gmail.com', '', 'user.jpg', 0, NULL, NULL, 1),
(137, 'Hồng nhật', '0909123123', '$2y$10$Dzw/6.N2AikODTU.uMZbnOMx6iZrGtI6aCvUL/df2TVl52M2DjgQW', NULL, 'crisnhat97@gmail.com', NULL, 'user.jpg', 0, NULL, NULL, 0);

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
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`mabn`);

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
-- Indexes for table `dangky-baiviet`
--
ALTER TABLE `dangky-baiviet`
  ADD PRIMARY KEY (`stt`);

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
  ADD KEY `masp` (`masp`),
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
-- Indexes for table `mathang`
--
ALTER TABLE `mathang`
  ADD PRIMARY KEY (`mamh`);

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
  ADD KEY `malh` (`malh`),
  ADD KEY `mams` (`mams`),
  ADD KEY `sanpham_ibfk_3` (`mamh`);

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
  MODIFY `mabv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `mabn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `binhluanbv`
--
ALTER TABLE `binhluanbv`
  MODIFY `stt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `binhluansp`
--
ALTER TABLE `binhluansp`
  MODIFY `stt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=375;

--
-- AUTO_INCREMENT for table `dangky-baiviet`
--
ALTER TABLE `dangky-baiviet`
  MODIFY `stt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `doitac`
--
ALTER TABLE `doitac`
  MODIFY `madt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `mahd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `hoadonchitiet`
--
ALTER TABLE `hoadonchitiet`
  MODIFY `stt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

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
  MODIFY `malh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `mathang`
--
ALTER TABLE `mathang`
  MODIFY `mamh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `mausac`
--
ALTER TABLE `mausac`
  MODIFY `mams` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `masp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `matk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

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
  ADD CONSTRAINT `hoadonchitiet_ibfk_1` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`) ON UPDATE CASCADE,
  ADD CONSTRAINT `hoadonchitiet_ibfk_2` FOREIGN KEY (`mahd`) REFERENCES `hoadon` (`mahd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`malh`) REFERENCES `loaihang` (`malh`) ON UPDATE CASCADE,
  ADD CONSTRAINT `sanpham_ibfk_2` FOREIGN KEY (`mams`) REFERENCES `mausac` (`mams`) ON UPDATE CASCADE,
  ADD CONSTRAINT `sanpham_ibfk_3` FOREIGN KEY (`mamh`) REFERENCES `mathang` (`mamh`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
