-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2023 at 04:16 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ivymoda_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminEmail` varchar(100) NOT NULL,
  `adminUserName` varchar(255) NOT NULL,
  `adminPass` varchar(255) NOT NULL,
  `level` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `adminName`, `adminEmail`, `adminUserName`, `adminPass`, `level`) VALUES
(1, 'Chí Vĩ', 'buichivi@gmail.com', 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_cart`
--

CREATE TABLE `tb_cart` (
  `id` int(11) NOT NULL,
  `sessionId` varchar(255) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_cart`
--

INSERT INTO `tb_cart` (`id`, `sessionId`, `productId`, `productName`, `quantity`, `price`, `image`) VALUES
(1, 'khqckbshjhdu5rfm5okiom2oo8', 7, 'Quần Jeans', 1, '10000000', '3105af963b.jpg'),
(2, 'khqckbshjhdu5rfm5okiom2oo8', 7, 'Quần Jeans', 1, '10000000', '3105af963b.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_category`
--

CREATE TABLE `tb_category` (
  `id` int(11) NOT NULL,
  `categoryName` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_category`
--

INSERT INTO `tb_category` (`id`, `categoryName`, `parent_id`) VALUES
(1, 'Nam', 0),
(2, 'Nữ', 0),
(3, 'Trẻ Em', 0),
(4, 'Áo Nam', 1),
(5, 'Quần Nam', 1),
(6, 'Phụ kiện Nam', 1),
(21, 'Quần Short', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tb_product`
--

CREATE TABLE `tb_product` (
  `id` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `productDesc` text NOT NULL,
  `price` varchar(255) NOT NULL,
  `productImg` varchar(255) NOT NULL,
  `type` int(11) NOT NULL,
  `productDiscount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_product`
--

INSERT INTO `tb_product` (`id`, `productName`, `categoryId`, `productDesc`, `price`, `productImg`, `type`, `productDiscount`) VALUES
(1, 'Áo thun in hình', 4, '<p>- <strong>&Aacute;o thun</strong> tay ngắn độ d&agrave;i vừa phải mang phong c&aacute;ch trẻ trung năng động.</p>\r\n\r\n<p>- <em>Họa tiết được in tr&ecirc;n &aacute;o sẽ gi&uacute;p ch&agrave;ng nổi bật giữa đ&aacute;m đ&ocirc;ng. </em>L&agrave; sản phẩm ph&ugrave; hợp cho những buổi đi chơi hay hoạt động thể thao.</p>\r\n\r\n<p>- <strong><s>&Aacute;o thun tay ngắn độ d&agrave;i vừa phải mang phong c&aacute;ch trẻ trung năng động.</s></strong></p>\r\n\r\n<p>- Họa tiết được in tr&ecirc;n &aacute;o sẽ gi&uacute;p ch&agrave;ng nổi bật giữa đ&aacute;m đ&ocirc;ng. L&agrave; sản phẩm ph&ugrave; hợp cho những buổi đi chơi hay hoạt động thể thao.</p>\r\n\r\n<p>- &Aacute;o thun tay ngắn độ d&agrave;i vừa phải mang phong c&aacute;ch trẻ trung năng động.</p>\r\n\r\n<p>- Họa tiết được in tr&ecirc;n &aacute;o sẽ gi&uacute;p ch&agrave;ng nổi bật giữa đ&aacute;m đ&ocirc;ng. L&agrave; sản phẩm ph&ugrave; hợp cho những buổi đi chơi hay hoạt động thể thao.</p>\r\n\r\n<p>- &Aacute;o thun tay ngắn độ d&agrave;i vừa phải mang phong c&aacute;ch trẻ trung năng động.</p>\r\n\r\n<p>- Họa tiết được in tr&ecirc;n &aacute;o sẽ gi&uacute;p ch&agrave;ng nổi bật giữa đ&aacute;m đ&ocirc;ng. L&agrave; sản phẩm ph&ugrave; hợp cho những buổi đi chơi hay hoạt động thể thao.</p>\r\n\r\n<div class=\"ddict_btn\" style=\"top: 98px; left: 447.172px;\"><img src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/logo/48.png\" /></div>\r\n', '10000000', '32e3511f35.jpg', 1, 20),
(2, 'Váy 2 dây', 2, '<p>- Đầm dạ hội cổ yếm phối ren mang đến vẻ ngo&agrave;i thanh lịch, kết hợp c&ugrave;ng thiết kế d&agrave;i qua gối l&agrave;m tăng th&ecirc;m độ sang trọng khi tham gia những buổi tiệc.</p>\r\n\r\n<p>- Chất liệu Tuysi tạo n&ecirc;n sự mềm mại v&agrave; thanh tho&aacute;t khi mặc. V&agrave;o m&ugrave;a H&egrave;, đ&acirc;y l&agrave; sự lựa chọn tối ưu bởi khả năng tạo sự m&aacute;t mẻ v&agrave; co gi&atilde;n tốt.</p>\r\n\r\n<p>- Đầm dễ d&agrave;ng kết hợp c&ugrave;ng &nbsp;đ&ocirc;i gi&agrave;y sandal v&agrave; t&uacute;i x&aacute;ch &nbsp;gi&uacute;p tổng thể outfit trở n&ecirc;n ho&agrave;n hảo v&agrave; nổi bật hơn.</p>\r\n\r\n<p>- Đầm dạ hội cổ yếm phối ren mang đến vẻ ngo&agrave;i thanh lịch, kết hợp c&ugrave;ng thiết kế d&agrave;i qua gối l&agrave;m tăng th&ecirc;m độ sang trọng khi tham gia những buổi tiệc.</p>\r\n\r\n<p>- Chất liệu Tuysi tạo n&ecirc;n sự mềm mại v&agrave; thanh tho&aacute;t khi mặc. V&agrave;o m&ugrave;a H&egrave;, đ&acirc;y l&agrave; sự lựa chọn tối ưu bởi khả năng tạo sự m&aacute;t mẻ v&agrave; co gi&atilde;n tốt.</p>\r\n\r\n<p>- Đầm dễ d&agrave;ng kết hợp c&ugrave;ng &nbsp;đ&ocirc;i gi&agrave;y sandal v&agrave; t&uacute;i x&aacute;ch &nbsp;gi&uacute;p tổng thể outfit trở n&ecirc;n ho&agrave;n hảo v&agrave; nổi bật hơn.</p>\r\n\r\n<p>- Đầm dạ hội cổ yếm phối ren mang đến vẻ ngo&agrave;i thanh lịch, kết hợp c&ugrave;ng thiết kế d&agrave;i qua gối l&agrave;m tăng th&ecirc;m độ sang trọng khi tham gia những buổi tiệc.</p>\r\n\r\n<p>- Chất liệu Tuysi tạo n&ecirc;n sự mềm mại v&agrave; thanh tho&aacute;t khi mặc. V&agrave;o m&ugrave;a H&egrave;, đ&acirc;y l&agrave; sự lựa chọn tối ưu bởi khả năng tạo sự m&aacute;t mẻ v&agrave; co gi&atilde;n tốt.</p>\r\n\r\n<p>- Đầm dễ d&agrave;ng kết hợp c&ugrave;ng &nbsp;đ&ocirc;i gi&agrave;y sandal v&agrave; t&uacute;i x&aacute;ch &nbsp;gi&uacute;p tổng thể outfit trở n&ecirc;n ho&agrave;n hảo v&agrave; nổi bật hơn.</p>\r\n', '400000', 'dc87652224.jpg', 1, 50),
(3, 'Quần Jeans', 5, '<p>- Đầm dạ hội cổ yếm phối ren mang đến vẻ ngo&agrave;i thanh lịch, kết hợp c&ugrave;ng thiết kế d&agrave;i qua gối l&agrave;m tăng th&ecirc;m độ sang trọng khi tham gia những buổi tiệc.</p>\r\n\r\n<p>- Chất liệu Tuysi tạo n&ecirc;n sự mềm mại v&agrave; thanh tho&aacute;t khi mặc. V&agrave;o m&ugrave;a H&egrave;, đ&acirc;y l&agrave; sự lựa chọn tối ưu bởi khả năng tạo sự m&aacute;t mẻ v&agrave; co gi&atilde;n tốt.</p>\r\n\r\n<p>- Đầm dễ d&agrave;ng kết hợp c&ugrave;ng &nbsp;đ&ocirc;i gi&agrave;y sandal v&agrave; t&uacute;i x&aacute;ch &nbsp;gi&uacute;p tổng thể outfit trở n&ecirc;n ho&agrave;n hảo v&agrave; nổi bật hơn.</p>\r\n\r\n<p>- Đầm dạ hội cổ yếm phối ren mang đến vẻ ngo&agrave;i thanh lịch, kết hợp c&ugrave;ng thiết kế d&agrave;i qua gối l&agrave;m tăng th&ecirc;m độ sang trọng khi tham gia những buổi tiệc.</p>\r\n\r\n<p>- Chất liệu Tuysi tạo n&ecirc;n sự mềm mại v&agrave; thanh tho&aacute;t khi mặc. V&agrave;o m&ugrave;a H&egrave;, đ&acirc;y l&agrave; sự lựa chọn tối ưu bởi khả năng tạo sự m&aacute;t mẻ v&agrave; co gi&atilde;n tốt.</p>\r\n\r\n<p>- Đầm dễ d&agrave;ng kết hợp c&ugrave;ng &nbsp;đ&ocirc;i gi&agrave;y sandal v&agrave; t&uacute;i x&aacute;ch &nbsp;gi&uacute;p tổng thể outfit trở n&ecirc;n ho&agrave;n hảo v&agrave; nổi bật hơn.</p>\r\n\r\n<div class=\"ddict_btn\" style=\"top: 49px; left: 98.0469px;\"><img src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/logo/48.png\" /></div>\r\n', '1200000', '793e22caca.jpg', 1, 45),
(4, 'Quần Jeans', 5, '<p>- Đầm dạ hội cổ yếm phối ren mang đến vẻ ngo&agrave;i thanh lịch, kết hợp c&ugrave;ng thiết kế d&agrave;i qua gối l&agrave;m tăng th&ecirc;m độ sang trọng khi tham gia những buổi tiệc.</p>\r\n\r\n<p>- Chất liệu Tuysi tạo n&ecirc;n sự mềm mại v&agrave; thanh tho&aacute;t khi mặc. V&agrave;o m&ugrave;a H&egrave;, đ&acirc;y l&agrave; sự lựa chọn tối ưu bởi khả năng tạo sự m&aacute;t mẻ v&agrave; co gi&atilde;n tốt.</p>\r\n\r\n<p>- Đầm dễ d&agrave;ng kết hợp c&ugrave;ng &nbsp;đ&ocirc;i gi&agrave;y sandal v&agrave; t&uacute;i x&aacute;ch &nbsp;gi&uacute;p tổng thể outfit trở n&ecirc;n ho&agrave;n hảo v&agrave; nổi bật hơn.</p>\r\n\r\n<p>- Đầm dạ hội cổ yếm phối ren mang đến vẻ ngo&agrave;i thanh lịch, kết hợp c&ugrave;ng thiết kế d&agrave;i qua gối l&agrave;m tăng th&ecirc;m độ sang trọng khi tham gia những buổi tiệc.</p>\r\n\r\n<p>- Chất liệu Tuysi tạo n&ecirc;n sự mềm mại v&agrave; thanh tho&aacute;t khi mặc. V&agrave;o m&ugrave;a H&egrave;, đ&acirc;y l&agrave; sự lựa chọn tối ưu bởi khả năng tạo sự m&aacute;t mẻ v&agrave; co gi&atilde;n tốt.</p>\r\n\r\n<p>- Đầm dễ d&agrave;ng kết hợp c&ugrave;ng &nbsp;đ&ocirc;i gi&agrave;y sandal v&agrave; t&uacute;i x&aacute;ch &nbsp;gi&uacute;p tổng thể outfit trở n&ecirc;n ho&agrave;n hảo v&agrave; nổi bật hơn.</p>\r\n\r\n<div class=\"ddict_btn\" style=\"top: 38px; left: 152.984px;\"><img src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/logo/48.png\" /></div>\r\n', '10000000', '09eb4c2583.jpg', 1, 20),
(5, 'Áo thun in hình', 1, '<p>&Aacute;o thun in h&igrave;nh</p>\r\n', '10000000', '20cbad1c45.jpg', 1, 20),
(6, 'Áo thun', 4, '<p>&Aacute;o thun</p>\r\n', '10000000', '62c5d69c30.jpg', 1, 20),
(7, 'Quần Jeans', 5, '<p>Quần Jeans</p>\r\n', '10000000', '3105af963b.jpg', 1, 50),
(8, 'AGNES DRESS - ĐẦM SENORA CỔ YẾM', 2, '<p>- Đầm dạ hội cổ yếm phối ren mang đến vẻ ngo&agrave;i thanh lịch, kết hợp c&ugrave;ng thiết kế d&agrave;i qua gối l&agrave;m tăng th&ecirc;m độ sang trọng khi tham gia những buổi tiệc.</p>\r\n\r\n<p>- Chất liệu Tuysi tạo n&ecirc;n sự mềm mại v&agrave; thanh tho&aacute;t khi mặc. V&agrave;o m&ugrave;a H&egrave;, đ&acirc;y l&agrave; sự lựa chọn tối ưu bởi khả năng tạo sự m&aacute;t mẻ v&agrave; co gi&atilde;n tốt.</p>\r\n\r\n<p>- Đầm dễ d&agrave;ng kết hợp c&ugrave;ng &nbsp;đ&ocirc;i gi&agrave;y sandal v&agrave; t&uacute;i x&aacute;ch &nbsp;gi&uacute;p tổng thể outfit trở n&ecirc;n ho&agrave;n hảo v&agrave; nổi bật hơn.</p>\r\n\r\n<p>- Đầm dạ hội cổ yếm phối ren mang đến vẻ ngo&agrave;i thanh lịch, kết hợp c&ugrave;ng thiết kế d&agrave;i qua gối l&agrave;m tăng th&ecirc;m độ sang trọng khi tham gia những buổi tiệc.</p>\r\n\r\n<p>- Chất liệu Tuysi tạo n&ecirc;n sự mềm mại v&agrave; thanh tho&aacute;t khi mặc. V&agrave;o m&ugrave;a H&egrave;, đ&acirc;y l&agrave; sự lựa chọn tối ưu bởi khả năng tạo sự m&aacute;t mẻ v&agrave; co gi&atilde;n tốt.</p>\r\n\r\n<p>- Đầm dễ d&agrave;ng kết hợp c&ugrave;ng &nbsp;đ&ocirc;i gi&agrave;y sandal v&agrave; t&uacute;i x&aacute;ch &nbsp;gi&uacute;p tổng thể outfit trở n&ecirc;n ho&agrave;n hảo v&agrave; nổi bật hơn.</p>\r\n', '2990000', '5562e0acfe.jpg', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_cart`
--
ALTER TABLE `tb_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_category`
--
ALTER TABLE `tb_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_cart`
--
ALTER TABLE `tb_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_category`
--
ALTER TABLE `tb_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
