-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 30, 2018 lúc 04:12 CH
-- Phiên bản máy phục vụ: 10.1.21-MariaDB
-- Phiên bản PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `webbanhang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `level` int(4) NOT NULL,
  `idgroup` int(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`, `fullname`, `level`, `idgroup`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'halinh011096@gmail.com', 'ha van linh', 1, 1),
(2, 'administrator', '200ceb26807d6bf99fd6f4f0d1ca54d4', 'tea4rum@gmail.com', 'Lkkk', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banner`
--

CREATE TABLE `banner` (
  `id_banner` int(11) NOT NULL,
  `name_banner` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link_banner` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `banner`
--

INSERT INTO `banner` (`id_banner`, `name_banner`, `link_banner`) VALUES
(1, 'giảm giá các sản phẩm 50%', 'slideshow.jpg'),
(2, 'túi xách thời trang', 'slideshow_1.jpg'),
(3, 'túi xinh quà đẹp', 'slideshow_2.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `transaction_id` int(255) NOT NULL,
  `id` int(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `slspdh` int(11) NOT NULL DEFAULT '0',
  `amount` decimal(15,4) NOT NULL DEFAULT '0.0000',
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giaodich`
--

CREATE TABLE `giaodich` (
  `id` bigint(20) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `user_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(50) COLLATE utf8_bin NOT NULL,
  `user_phone` varchar(20) COLLATE utf8_bin NOT NULL,
  `amount` decimal(15,4) NOT NULL DEFAULT '0.0000',
  `payment` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `payment_info` text COLLATE utf8_bin NOT NULL,
  `message` varchar(255) COLLATE utf8_bin NOT NULL,
  `created` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `logo`
--

CREATE TABLE `logo` (
  `id_logo` int(11) NOT NULL,
  `name_logo` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_logo` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `logo`
--

INSERT INTO `logo` (`id_logo`, `name_logo`, `image_logo`) VALUES
(1, 'logo web bán hàng', '/images/logo.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menu`
--

CREATE TABLE `menu` (
  `id_catalog` int(11) NOT NULL,
  `name_menu` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `invalid_menu` varchar(30) COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Đang đổ dữ liệu cho bảng `menu`
--

INSERT INTO `menu` (`id_catalog`, `name_menu`, `invalid_menu`) VALUES
(25, 'Túi xách', 'tui-xach'),
(26, 'Balo', 'balo'),
(27, 'Ví Bóp', 'vi-bop');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id_sanpham` int(255) NOT NULL,
  `id_catalog` int(11) NOT NULL,
  `id_sub` int(11) NOT NULL,
  `tensp` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `code_product` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` decimal(15,4) NOT NULL DEFAULT '0.0000',
  `description` text COLLATE utf8_unicode_ci,
  `content` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `image_sp` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `created` date DEFAULT NULL,
  `view` int(11) DEFAULT '0',
  `xuatxu` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sizess` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mausac` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_name_menu` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_name_sub` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id_sanpham`, `id_catalog`, `id_sub`, `tensp`, `code_product`, `price`, `description`, `content`, `discount`, `image_sp`, `created`, `view`, `xuatxu`, `sizess`, `mausac`, `parent_name_menu`, `parent_name_sub`) VALUES
(16, 25, 2, 'Túi Đeo Chéo SHO - Màu Hồng', '0101', '575000.0000', '', NULL, 0, 'tui-deo-cheo-1.jpg', '2018-05-22', 0, 'Mỹ', 'L', 'Hồng', 'túi xách', ''),
(17, 25, 3, 'Balo BAC - Màu Xanh Rêu', '0075', '795000.0000', 'Những thiết kế nhỏ xinh này hiện đang \" làm mưa làm gió\" bởi sức hút khó cưỡng và đặc biệt rất hợp với xu hướng thời trang hiện nay.', 'Balo BAC 0075 - Màu Xanh Rêu\r\n\r\nPhụ kiện túi xách có rất nhiều chủng loại, kiểu dáng và màu sắc...Trước đây đã có thời điểm những mẫu túi bigsize được ưa chuộng bởi tính tiện dụng giúp các nàng mang cả \" thế giới phụ nữ\" theo mình ra ngoài. Rồi đến thời điểm những mẫu túi size vừa với dây kéo trẻ trung hay tay cầm quý phái lại lên nắm giữ quyền lực thay cho những thiết kế bigsize. Tuy nhiên dòng chảy thời trang liên tục biến đổi và các thiết kế túi xách cũng không ngừng di chuyển theo, bên cạnh sự chuyển mình về chất liệu, màu sắc, kiểu dáng thì lúc này những chiếc túi mini lại chiếm được vị trí cực kỳ \" đắt giá\" trong lòng các tín đồ thời trang.', NULL, 'tui-xach-0.jpg', NULL, 0, 'Mỹ', 'M', 'Xanh Rêu', 'túi xách', ''),
(18, 25, 3, 'Túi Xách Da Thật SAT - Màu Đen', '0176', '2199000.0000', NULL, NULL, NULL, 'tui-xach-1.jpg', NULL, 0, 'Mỹ', 'M', 'Đen', 'túi xách', ''),
(19, 25, 3, 'Balo BAC - Màu Đen', '0075', '795000.0000', NULL, NULL, NULL, 'tui-xach-2.jpg', NULL, 0, 'Việt Nam', 'M,L', 'Đen', 'túi xách', ''),
(20, 25, 1, 'Túi Xách Tay SAT - Màu Vàng', '0185', '2199000.0000', NULL, NULL, NULL, 'tui-xach-3.jpg', NULL, 0, 'Việt Nam', 'S', 'Vàng', 'túi xách', ''),
(21, 25, 3, 'Balo Mini BAC - Màu Vàng', '0081', '675000.0000', NULL, NULL, NULL, 'tui-xach-4.jpg', NULL, 0, 'Hàn Quốc', 'L,XL', 'Vàng', 'túi xách', ''),
(22, 27, 4, 'Ví Cầm Tay WAL - Màu Vàng', '0145', '395000.0000', NULL, NULL, NULL, 'vi1.jpg', NULL, 0, 'Mỹ', 'M', 'Vàng', 'túi xách', ''),
(23, 27, 5, 'Ví Dự Tiệc CLU - Màu Đen', '0035', '625000.0000', NULL, NULL, NULL, 'vi2.jpg', NULL, 0, 'Lào', 'S,M', 'Đen', 'balo -ví', ''),
(24, 27, 4, 'Ví Cầm Tay WAL - Màu Hồng Nhạt', '0145', '395000.0000', NULL, NULL, NULL, 'vi3.jpg', NULL, 0, 'Trung Quốc', 'S,M,L', '', 'balo -ví', ''),
(25, 27, 4, 'Ví Cầm Tay WAL - Màu Xanh Bạc Hà', '0145', '395000.0000', NULL, NULL, NULL, 'vi4.jpg', NULL, 0, 'Mỹ', 'M', 'Xanh Bạc Hà', 'balo -ví', ''),
(26, 27, 5, 'Ví Dự Tiệc CLU - Màu Bạc', '0028', '1199000.0000', NULL, NULL, NULL, 'vi5.jpg', NULL, 0, NULL, NULL, NULL, 'balo -ví', ''),
(27, 25, 0, 'Túi Xách Da Thật SAT - Màu Đỏ', '0154', '2199000.0000', NULL, NULL, NULL, 'tui-xach-5.jpg', NULL, 0, NULL, NULL, NULL, 'balo -ví', ''),
(28, 25, 3, 'Túi Xách Da Thật SAT - Màu Be', '0155', '1999000.0000', NULL, NULL, NULL, 'tui-xach-6.jpg', NULL, 0, NULL, NULL, NULL, 'balo -ví', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sub_menu`
--

CREATE TABLE `sub_menu` (
  `id_sub` int(11) NOT NULL,
  `name_sub` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ivalid_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `id_catalog` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sub_menu`
--

INSERT INTO `sub_menu` (`id_sub`, `name_sub`, `ivalid_name`, `id_catalog`) VALUES
(1, 'Túi xách tay', 'tui-xach-tay', 25),
(2, 'Túi đeo chéo', 'tui-deo-cheo', 25),
(3, 'Túi xách da thật', 'tui-xach-da-that', 25),
(4, 'Ví cầm tay', '#', 27),
(5, 'Ví dự tiệc', '#', 27);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `created` int(11) NOT NULL,
  `level` int(4) DEFAULT NULL,
  `idgroup` int(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `fullname`, `email`, `phone`, `address`, `created`, `level`, `idgroup`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Hà Văn Linh', 'halinh9x6@gmail.com', '0964986096', 'Hà Nội', 0, 1, 1),
(22, 'duc', 'f1a3fb2d6b5976af47a5113ce2e03fdb', 'Linh', 'odvnoi#dsn@oiehfnio.com', '156195165189', 'sácc ', 0, 3, 1),
(23, 'tuan1997xx', '3b52d152c4b921d1c5e7c9b4e3fa29a7', 'Trần Mạnh Tuấn', 'tranmanhtuan.299@gmail.com', '0966970573', 'Hà nội', 0, 3, 1),
(24, 'linkerpt', '25d55ad283aa400af464c76d713c07ad', 'Hà Văn Linh', 'halinh011096@gmail.com', '0964876096', 'hn', 0, 3, 0),
(25, 'test', '25d55ad283aa400af464c76d713c07ad', 'test', 'test@gmail.com', '0964876096', 'Hà Nội', 0, 3, 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id_banner`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `giaodich`
--
ALTER TABLE `giaodich`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`id_logo`);

--
-- Chỉ mục cho bảng `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_catalog`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id_sanpham`),
  ADD KEY `id_catalog` (`id_catalog`),
  ADD KEY `id_catalog_2` (`id_catalog`);
ALTER TABLE `sanpham` ADD FULLTEXT KEY `name` (`tensp`);

--
-- Chỉ mục cho bảng `sub_menu`
--
ALTER TABLE `sub_menu`
  ADD PRIMARY KEY (`id_sub`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT cho bảng `banner`
--
ALTER TABLE `banner`
  MODIFY `id_banner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT cho bảng `giaodich`
--
ALTER TABLE `giaodich`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT cho bảng `logo`
--
ALTER TABLE `logo`
  MODIFY `id_logo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT cho bảng `menu`
--
ALTER TABLE `menu`
  MODIFY `id_catalog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id_sanpham` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT cho bảng `sub_menu`
--
ALTER TABLE `sub_menu`
  MODIFY `id_sub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
