<?php
//Ha Van Linh
//1521050206
//database web ban hang

$con = mysqli_connect('localhost', 'root', '');
//print_r($con);die();
// Thực thi câu truy vấn
if (mysqli_query($con, "CREATE DATABASE `webbanhangg` CHARACTER SET utf8 COLLATE utf8_general_ci"))
{
    echo 'Tạo csdl thành công!';
    // Chọn database
    mysqli_select_db($con, 'webbanhangg');
////////////////////////////////////////////////////Câu lệnh Tạo table SQL
    $sql0 = mysqli_query($con,"CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `level` int(4) NOT NULL,
  `idgroup` int(4) NOT NULL
)");
    $sql1 = mysqli_query($con,"CREATE TABLE `banner` (
  `id_banner` int(11) NOT NULL,
  `name_banner` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link_banner` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
)");
    $sql2 = mysqli_query($con,"CREATE TABLE `banner` (
  `id_banner` int(11) NOT NULL,
  `name_banner` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link_banner` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
)");
    $sql3 = mysqli_query($con,"CREATE TABLE `donhang` (
  `transaction_id` int(255) NOT NULL,
  `id` int(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `slspdh` int(11) NOT NULL DEFAULT '0',
  `amount` decimal(15,4) NOT NULL DEFAULT '0.0000',
  `status` tinyint(4) NOT NULL DEFAULT '0'
)");
    $sql4 = mysqli_query($con,"CREATE TABLE `giaodich` (
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
)" );
    $sql5 = mysqli_query($con,"CREATE TABLE `logo` (
  `id_logo` int(11) NOT NULL,
  `name_logo` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_logo` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
)");
    $sql6 = mysqli_query($con,"CREATE TABLE `menu` (
  `id_catalog` int(11) NOT NULL,
  `name_menu` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `invalid_menu` varchar(30) COLLATE utf8_bin NOT NULL
)");
    $sql7 = mysqli_query($con,"CREATE TABLE `sanpham` (
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
)");
    $sql8 = mysqli_query($con,"CREATE TABLE `sub_menu` (
  `id_sub` int(11) NOT NULL,
  `name_sub` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ivalid_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `id_catalog` int(11) NOT NULL
)");
    $sql9 = mysqli_query($con,"CREATE TABLE `user` (
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
)");
    ///////////////////////////////////////////////////////KẾT THÚC TẠO TABLE
    ///////////////////////////////////////////////////////INSERT GIA TRI
$insert = mysqli_query($con,"INSERT INTO `admin` (`id`, `username`, `password`, `email`, `fullname`, `level`, `idgroup`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'halinh011096@gmail.com', 'ha van linh', 1, 1),
(2, 'administrator', '200ceb26807d6bf99fd6f4f0d1ca54d4', 'tea4rum@gmail.com', 'Lkkk', 1, 1)");
$insert1 = mysqli_query($con,"INSERT INTO `banner` (`id_banner`, `name_banner`, `link_banner`) VALUES
(1, 'giảm giá các sản phẩm 50%', 'slideshow.jpg'),
(2, 'túi xách thời trang', 'slideshow_1.jpg'),
(3, 'túi xinh quà đẹp', 'slideshow_2.jpg')");
$insert2 = mysqli_query($con,"INSERT INTO `logo` (`id_logo`, `name_logo`, `image_logo`) VALUES
(1, 'logo web bán hàng', '/images/logo.png')");
$insert3 = mysqli_query($con,"INSERT INTO `menu` (`id_catalog`, `name_menu`, `invalid_menu`) VALUES
(25, 'Túi xách', 'tui-xach'),
(26, 'Balo', 'balo'),
(27, 'Ví Bóp', 'vi-bop')");
$insert4 = mysqli_query($con,"INSERT INTO `sanpham` (`id_sanpham`, `id_catalog`, `id_sub`, `tensp`, `code_product`, `price`, `description`, `content`, `discount`, `image_sp`, `created`, `view`, `xuatxu`, `sizess`, `mausac`, `parent_name_menu`, `parent_name_sub`) VALUES
(16, 25, 2, 'Túi Đeo Chéo SHO - Màu Hồng', '0101', '575000.0000', '', NULL, 0, 'tui-deo-cheo-1.jpg', '2018-05-22', 0, 'Mỹ', 'L', 'Hồng', 'túi xách', ''),
(17, 25, 3, 'Balo BAC - Màu Xanh Rêu', '0075', '795000.0000', 'Những thiết kế nhỏ xinh này hiện đang làm mưa làm gió bởi sức hút khó cưỡng và đặc biệt rất hợp với xu hướng thời trang hiện nay.', 'Balo BAC 0075 - Màu Xanh Rêu Phụ kiện túi xách có rất nhiều chủng loại, kiểu dáng và màu sắc...Trước đây đã có thời điểm những mẫu túi bigsize được ưa chuộng bởi tính tiện dụng giúp các nàng mang cả thế giới phụ nữ theo mình ra ngoài. Rồi đến thời điểm những mẫu túi size vừa với dây kéo trẻ trung hay tay cầm quý phái lại lên nắm giữ quyền lực thay cho những thiết kế bigsize. Tuy nhiên dòng chảy thời trang liên tục biến đổi và các thiết kế túi xách cũng không ngừng di chuyển theo, bên cạnh sự chuyển mình về chất liệu, màu sắc, kiểu dáng thì lúc này những chiếc túi mini lại chiếm được vị trí cực kỳ đắt giá trong lòng các tín đồ thời trang.', NULL, 'tui-xach-0.jpg', NULL, 0, 'Mỹ', 'M', 'Xanh Rêu', 'túi xách', ''),
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
(28, 25, 3, 'Túi Xách Da Thật SAT - Màu Be', '0155', '1999000.0000', NULL, NULL, NULL, 'tui-xach-6.jpg', NULL, 0, NULL, NULL, NULL, 'balo -ví', '')");
$insert5 = mysqli_query($con,"INSERT INTO `sub_menu` (`id_sub`, `name_sub`, `ivalid_name`, `id_catalog`) VALUES
(1, 'Túi xách tay', 'tui-xach-tay', 25),
(2, 'Túi đeo chéo', 'tui-deo-cheo', 25),
(3, 'Túi xách da thật', 'tui-xach-da-that', 25),
(4, 'Ví cầm tay', '#', 27),
(5, 'Ví dự tiệc', '#', 27)");
$insert6 = mysqli_query($con,"INSERT INTO `user` (`id`, `username`, `password`, `fullname`, `email`, `phone`, `address`, `created`, `level`, `idgroup`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Hà Văn Linh', 'halinh9x6@gmail.com', '0964986096', 'Hà Nội', 0, 1, 1),
(22, 'duc', 'f1a3fb2d6b5976af47a5113ce2e03fdb', 'Linh', 'odvnoi#dsn@oiehfnio.com', '156195165189', 'sácc ', 0, 3, 1),
(23, 'tuan1997xx', '3b52d152c4b921d1c5e7c9b4e3fa29a7', 'Trần Mạnh Tuấn', 'tranmanhtuan.299@gmail.com', '0966970573', 'Hà nội', 0, 3, 1),
(24, 'linkerpt', '25d55ad283aa400af464c76d713c07ad', 'Hà Văn Linh', 'halinh011096@gmail.com', '0964876096', 'hn', 0, 3, 0),
(25, 'test', '25d55ad283aa400af464c76d713c07ad', 'test', 'test@gmail.com', '0964876096', 'Hà Nội', 0, 3, 0)");
$alttab = mysqli_query($con,"ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`)");
$alttab1 = mysqli_query($con,"ALTER TABLE `banner`
  ADD PRIMARY KEY (`id_banner`)");
$alttab2 = mysqli_query($con,"ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id`)");
$alttab3 = mysqli_query($con,"ALTER TABLE `giaodich`
  ADD PRIMARY KEY (`id`)");
$alttab4 = mysqli_query($con,"ALTER TABLE `logo`
  ADD PRIMARY KEY (`id_logo`)");
$alttab5 = mysqli_query($con,"ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_catalog`)");
$alttab6 = mysqli_query($con,"ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id_sanpham`),
  ADD KEY `id_catalog` (`id_catalog`),
  ADD KEY `id_catalog_2` (`id_catalog`);
ALTER TABLE `sanpham` ADD FULLTEXT KEY `name` (`tensp`)");
$alttab7 = mysqli_query($con,"ALTER TABLE `sub_menu`
  ADD PRIMARY KEY (`id_sub`)");
$alttab8 = mysqli_query($con,"ALTER TABLE `user`
  ADD PRIMARY KEY (`id`)");
$alttab9 = mysqli_query($con,"ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3");
$alttab10 = mysqli_query($con,"ALTER TABLE `banner`
  MODIFY `id_banner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4");
$alttab11 = mysqli_query($con,"ALTER TABLE `donhang`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6");
$alttab12 = mysqli_query($con,"ALTER TABLE `giaodich`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7");
$alttab13 = mysqli_query($con,"ALTER TABLE `logo`
  MODIFY `id_logo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2");
$alttab14 = mysqli_query($con,"ALTER TABLE `menu`
  MODIFY `id_catalog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29");
$alttab15 = mysqli_query($con,"ALTER TABLE `sanpham`
  MODIFY `id_sanpham` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34");
$alttab16 = mysqli_query($con,"ALTER TABLE `sub_menu`
  MODIFY `id_sub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6");
$alttab17 = mysqli_query($con,"ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26");
}
else {
    echo "Tạo database thất bại " . mysqli_error($conn);
}
if (!$con) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}
// Tạo xong thì ngắt kết nối
?>

