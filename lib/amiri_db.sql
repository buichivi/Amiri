-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2023 at 07:48 PM
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
  `quantity` int(11) NOT NULL,
  `size` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
(7, 'Áo Nữ', 2),
(8, 'Quần Nữ', 2),
(9, 'Phụ kiện Nữ', 2),
(10, 'Bé Trai', 3),
(11, 'Bé Gái', 3),
(12, 'Áo bé trai', 10),
(13, 'Quần bé trai', 10),
(14, 'Áo bé gái', 11),
(15, 'Quần bé gái', 11),
(16, 'Áo thun', 4),
(17, 'Áo sơ mi', 4),
(18, 'Áo polo', 4),
(19, 'Quần Jeans', 5),
(20, 'Quần khaki', 5),
(21, 'Quần tây', 5),
(22, 'Phụ kiện', 6),
(23, 'Áo sơ mi', 7),
(24, 'Áo thun', 7),
(25, 'Áo croptop', 7),
(26, 'Quần Jeans', 8),
(27, 'Quần dài', 8),
(28, 'Jumpsuit', 8),
(29, 'Túi/Ví', 9);

-- --------------------------------------------------------

--
-- Table structure for table `tb_customer`
--

CREATE TABLE `tb_customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phonenumber` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_customer`
--

INSERT INTO `tb_customer` (`id`, `name`, `phonenumber`, `email`, `password`, `gender`, `address`) VALUES
(4, 'Chí Vĩ', '0826127626', 'buichivi04062002@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '0', 'Tỉnh Thái Bình'),
(5, 'Trang', '0987654321', 'admin@admin.com', '827ccb0eea8a706c4c34a16891f84e7b', '1', 'Tình Thái Bình ');

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `id` int(11) NOT NULL,
  `customerId` int(11) NOT NULL,
  `orderDate` datetime NOT NULL,
  `shippedDate` datetime DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_order`
--

INSERT INTO `tb_order` (`id`, `customerId`, `orderDate`, `shippedDate`, `status`) VALUES
(1, 4, '2023-07-06 17:03:16', '2023-07-07 11:49:32', 1),
(2, 4, '2023-07-06 17:08:28', '2023-07-07 11:49:55', 1),
(3, 4, '2023-07-06 22:15:35', '2023-07-07 12:03:50', 1),
(4, 5, '2023-07-07 10:52:26', NULL, 0),
(5, 5, '2023-07-07 11:02:46', NULL, 0),
(6, 4, '2023-07-08 16:48:49', '2023-07-08 22:43:15', 1),
(7, 4, '2023-07-08 22:25:24', NULL, 0),
(8, 4, '2023-07-08 22:47:10', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_order_details`
--

CREATE TABLE `tb_order_details` (
  `id` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `size` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_order_details`
--

INSERT INTO `tb_order_details` (`id`, `orderId`, `productId`, `quantity`, `size`, `price`) VALUES
(1, 1, 13, 10, 'xxl', '50000000'),
(2, 1, 14, 5, 'm', '30000000'),
(3, 1, 9, 5, 'xl', '15000000'),
(4, 2, 13, 1, 'xxl', '5000000'),
(5, 3, 14, 11, 'xxl', '66000000'),
(6, 3, 8, 9, 'm', '26910000'),
(7, 4, 14, 2, 'xl', '12000000'),
(8, 4, 13, 1, 'xl', '5000000'),
(9, 5, 14, 1, 'l', '6000000'),
(10, 6, 15, 3, 'xxl', '600000'),
(11, 6, 16, 1, 'xxl', '1000000'),
(12, 7, 1, 1, 'xxl', '8000000'),
(13, 7, 5, 1, 'l', '8000000'),
(14, 8, 14, 10, 'xxl', '60000000');

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
  `productDiscount` int(11) NOT NULL,
  `productColor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_product`
--

INSERT INTO `tb_product` (`id`, `productName`, `categoryId`, `productDesc`, `price`, `productImg`, `type`, `productDiscount`, `productColor`) VALUES
(1, 'Áo thun in hình', 16, '<p>- <strong>&Aacute;o thun</strong> tay ngắn độ d&agrave;i vừa phải mang phong c&aacute;ch trẻ trung năng động.</p>\r\n\r\n<p>- <em>Họa tiết được in tr&ecirc;n &aacute;o sẽ gi&uacute;p ch&agrave;ng nổi bật giữa đ&aacute;m đ&ocirc;ng. </em>L&agrave; sản phẩm ph&ugrave; hợp cho những buổi đi chơi hay hoạt động thể thao.</p>\r\n\r\n<p>- <strong><s>&Aacute;o thun tay ngắn độ d&agrave;i vừa phải mang phong c&aacute;ch trẻ trung năng động.</s></strong></p>\r\n\r\n<p>- Họa tiết được in tr&ecirc;n &aacute;o sẽ gi&uacute;p ch&agrave;ng nổi bật giữa đ&aacute;m đ&ocirc;ng. L&agrave; sản phẩm ph&ugrave; hợp cho những buổi đi chơi hay hoạt động thể thao.</p>\r\n\r\n<p>- &Aacute;o thun tay ngắn độ d&agrave;i vừa phải mang phong c&aacute;ch trẻ trung năng động.</p>\r\n\r\n<p>- Họa tiết được in tr&ecirc;n &aacute;o sẽ gi&uacute;p ch&agrave;ng nổi bật giữa đ&aacute;m đ&ocirc;ng. L&agrave; sản phẩm ph&ugrave; hợp cho những buổi đi chơi hay hoạt động thể thao.</p>\r\n\r\n<p>- &Aacute;o thun tay ngắn độ d&agrave;i vừa phải mang phong c&aacute;ch trẻ trung năng động.</p>\r\n\r\n<p>- Họa tiết được in tr&ecirc;n &aacute;o sẽ gi&uacute;p ch&agrave;ng nổi bật giữa đ&aacute;m đ&ocirc;ng. L&agrave; sản phẩm ph&ugrave; hợp cho những buổi đi chơi hay hoạt động thể thao.</p>\r\n', '10000000', '81bff8aa9b.jpg', 1, 20, '123'),
(2, 'Váy 2 dây', 16, '<p>- Đầm dạ hội cổ yếm phối ren mang đến vẻ ngo&agrave;i thanh lịch, kết hợp c&ugrave;ng thiết kế d&agrave;i qua gối l&agrave;m tăng th&ecirc;m độ sang trọng khi tham gia những buổi tiệc.</p>\r\n\r\n<p>- Chất liệu Tuysi tạo n&ecirc;n sự mềm mại v&agrave; thanh tho&aacute;t khi mặc. V&agrave;o m&ugrave;a H&egrave;, đ&acirc;y l&agrave; sự lựa chọn tối ưu bởi khả năng tạo sự m&aacute;t mẻ v&agrave; co gi&atilde;n tốt.</p>\r\n\r\n<p>- Đầm dễ d&agrave;ng kết hợp c&ugrave;ng &nbsp;đ&ocirc;i gi&agrave;y sandal v&agrave; t&uacute;i x&aacute;ch &nbsp;gi&uacute;p tổng thể outfit trở n&ecirc;n ho&agrave;n hảo v&agrave; nổi bật hơn.</p>\r\n\r\n<p>- Đầm dạ hội cổ yếm phối ren mang đến vẻ ngo&agrave;i thanh lịch, kết hợp c&ugrave;ng thiết kế d&agrave;i qua gối l&agrave;m tăng th&ecirc;m độ sang trọng khi tham gia những buổi tiệc.</p>\r\n\r\n<p>- Chất liệu Tuysi tạo n&ecirc;n sự mềm mại v&agrave; thanh tho&aacute;t khi mặc. V&agrave;o m&ugrave;a H&egrave;, đ&acirc;y l&agrave; sự lựa chọn tối ưu bởi khả năng tạo sự m&aacute;t mẻ v&agrave; co gi&atilde;n tốt.</p>\r\n\r\n<p>- Đầm dễ d&agrave;ng kết hợp c&ugrave;ng &nbsp;đ&ocirc;i gi&agrave;y sandal v&agrave; t&uacute;i x&aacute;ch &nbsp;gi&uacute;p tổng thể outfit trở n&ecirc;n ho&agrave;n hảo v&agrave; nổi bật hơn.</p>\r\n\r\n<p>- Đầm dạ hội cổ yếm phối ren mang đến vẻ ngo&agrave;i thanh lịch, kết hợp c&ugrave;ng thiết kế d&agrave;i qua gối l&agrave;m tăng th&ecirc;m độ sang trọng khi tham gia những buổi tiệc.</p>\r\n\r\n<p>- Chất liệu Tuysi tạo n&ecirc;n sự mềm mại v&agrave; thanh tho&aacute;t khi mặc. V&agrave;o m&ugrave;a H&egrave;, đ&acirc;y l&agrave; sự lựa chọn tối ưu bởi khả năng tạo sự m&aacute;t mẻ v&agrave; co gi&atilde;n tốt.</p>\r\n\r\n<p>- Đầm dễ d&agrave;ng kết hợp c&ugrave;ng &nbsp;đ&ocirc;i gi&agrave;y sandal v&agrave; t&uacute;i x&aacute;ch &nbsp;gi&uacute;p tổng thể outfit trở n&ecirc;n ho&agrave;n hảo v&agrave; nổi bật hơn.</p>\r\n', '400000', '4cafbdf2db.jpg', 1, 50, 'abc'),
(3, 'Quần Jeans', 5, '<p>- Đầm dạ hội cổ yếm phối ren mang đến vẻ ngo&agrave;i thanh lịch, kết hợp c&ugrave;ng thiết kế d&agrave;i qua gối l&agrave;m tăng th&ecirc;m độ sang trọng khi tham gia những buổi tiệc.</p>\r\n\r\n<p>- Chất liệu Tuysi tạo n&ecirc;n sự mềm mại v&agrave; thanh tho&aacute;t khi mặc. V&agrave;o m&ugrave;a H&egrave;, đ&acirc;y l&agrave; sự lựa chọn tối ưu bởi khả năng tạo sự m&aacute;t mẻ v&agrave; co gi&atilde;n tốt.</p>\r\n\r\n<p>- Đầm dễ d&agrave;ng kết hợp c&ugrave;ng &nbsp;đ&ocirc;i gi&agrave;y sandal v&agrave; t&uacute;i x&aacute;ch &nbsp;gi&uacute;p tổng thể outfit trở n&ecirc;n ho&agrave;n hảo v&agrave; nổi bật hơn.</p>\r\n\r\n<p>- Đầm dạ hội cổ yếm phối ren mang đến vẻ ngo&agrave;i thanh lịch, kết hợp c&ugrave;ng thiết kế d&agrave;i qua gối l&agrave;m tăng th&ecirc;m độ sang trọng khi tham gia những buổi tiệc.</p>\r\n\r\n<p>- Chất liệu Tuysi tạo n&ecirc;n sự mềm mại v&agrave; thanh tho&aacute;t khi mặc. V&agrave;o m&ugrave;a H&egrave;, đ&acirc;y l&agrave; sự lựa chọn tối ưu bởi khả năng tạo sự m&aacute;t mẻ v&agrave; co gi&atilde;n tốt.</p>\r\n\r\n<p>- Đầm dễ d&agrave;ng kết hợp c&ugrave;ng &nbsp;đ&ocirc;i gi&agrave;y sandal v&agrave; t&uacute;i x&aacute;ch &nbsp;gi&uacute;p tổng thể outfit trở n&ecirc;n ho&agrave;n hảo v&agrave; nổi bật hơn.</p>\r\n', '1200000', 'fb381a604b.jpg', 1, 45, 'abc'),
(4, 'Quần Jeans', 5, '<p>- Đầm dạ hội cổ yếm phối ren mang đến vẻ ngo&agrave;i thanh lịch, kết hợp c&ugrave;ng thiết kế d&agrave;i qua gối l&agrave;m tăng th&ecirc;m độ sang trọng khi tham gia những buổi tiệc.</p>\r\n\r\n<p>- Chất liệu Tuysi tạo n&ecirc;n sự mềm mại v&agrave; thanh tho&aacute;t khi mặc. V&agrave;o m&ugrave;a H&egrave;, đ&acirc;y l&agrave; sự lựa chọn tối ưu bởi khả năng tạo sự m&aacute;t mẻ v&agrave; co gi&atilde;n tốt.</p>\r\n\r\n<p>- Đầm dễ d&agrave;ng kết hợp c&ugrave;ng &nbsp;đ&ocirc;i gi&agrave;y sandal v&agrave; t&uacute;i x&aacute;ch &nbsp;gi&uacute;p tổng thể outfit trở n&ecirc;n ho&agrave;n hảo v&agrave; nổi bật hơn.</p>\r\n\r\n<p>- Đầm dạ hội cổ yếm phối ren mang đến vẻ ngo&agrave;i thanh lịch, kết hợp c&ugrave;ng thiết kế d&agrave;i qua gối l&agrave;m tăng th&ecirc;m độ sang trọng khi tham gia những buổi tiệc.</p>\r\n\r\n<p>- Chất liệu Tuysi tạo n&ecirc;n sự mềm mại v&agrave; thanh tho&aacute;t khi mặc. V&agrave;o m&ugrave;a H&egrave;, đ&acirc;y l&agrave; sự lựa chọn tối ưu bởi khả năng tạo sự m&aacute;t mẻ v&agrave; co gi&atilde;n tốt.</p>\r\n\r\n<p>- Đầm dễ d&agrave;ng kết hợp c&ugrave;ng &nbsp;đ&ocirc;i gi&agrave;y sandal v&agrave; t&uacute;i x&aacute;ch &nbsp;gi&uacute;p tổng thể outfit trở n&ecirc;n ho&agrave;n hảo v&agrave; nổi bật hơn.</p>\r\n', '10000000', '0ab5690a6b.jpg', 1, 20, 'abc'),
(5, 'Áo thun in hình', 4, '<p>&Aacute;o thun in h&igrave;nh</p>\r\n', '10000000', '91d7839444.jpg', 1, 20, 'abc'),
(6, 'Áo thun', 4, '<p>&Aacute;o thun</p>\r\n', '10000000', '9cb9dbcffa.jpg', 1, 20, 'abc'),
(7, 'Quần Jeans', 5, '<p>Quần Jeans ống rộng</p>\r\n', '10000000', 'ae623c936c.jpg', 1, 25, 'abc'),
(8, 'AGNES DRESS - ĐẦM SENORA CỔ YẾM Đầm dạ hội cổ yếm phối ren', 4, '<p>- Đầm dạ hội cổ yếm phối ren mang đến vẻ ngo&agrave;i thanh lịch, kết hợp c&ugrave;ng thiết kế d&agrave;i qua gối l&agrave;m tăng th&ecirc;m độ sang trọng khi tham gia những buổi tiệc.</p>\r\n\r\n<p>- Chất liệu Tuysi tạo n&ecirc;n sự mềm mại v&agrave; thanh tho&aacute;t khi mặc. V&agrave;o m&ugrave;a H&egrave;, đ&acirc;y l&agrave; sự lựa chọn tối ưu bởi khả năng tạo sự m&aacute;t mẻ v&agrave; co gi&atilde;n tốt.</p>\r\n\r\n<p>- Đầm dễ d&agrave;ng kết hợp c&ugrave;ng &nbsp;đ&ocirc;i gi&agrave;y sandal v&agrave; t&uacute;i x&aacute;ch &nbsp;gi&uacute;p tổng thể outfit trở n&ecirc;n ho&agrave;n hảo v&agrave; nổi bật hơn.</p>\r\n\r\n<p>- Đầm dạ hội cổ yếm phối ren mang đến vẻ ngo&agrave;i thanh lịch, kết hợp c&ugrave;ng thiết kế d&agrave;i qua gối l&agrave;m tăng th&ecirc;m độ sang trọng khi tham gia những buổi tiệc.</p>\r\n\r\n<p>- Chất liệu Tuysi tạo n&ecirc;n sự mềm mại v&agrave; thanh tho&aacute;t khi mặc. V&agrave;o m&ugrave;a H&egrave;, đ&acirc;y l&agrave; sự lựa chọn tối ưu bởi khả năng tạo sự m&aacute;t mẻ v&agrave; co gi&atilde;n tốt.</p>\r\n\r\n<p>- Đầm dễ d&agrave;ng kết hợp c&ugrave;ng &nbsp;đ&ocirc;i gi&agrave;y sandal v&agrave; t&uacute;i x&aacute;ch &nbsp;gi&uacute;p tổng thể outfit trở n&ecirc;n ho&agrave;</p>\r\n', '2990000', '2707b3b3fe.jpg', 1, 0, 'abc'),
(9, 'Đầm dạ hội cổ yếm phối ren ', 4, '<p>- Đầm dạ hội cổ yếm phối ren mang đến vẻ ngo&agrave;i thanh lịch, kết hợp c&ugrave;ng thiết kế d&agrave;i qua gối l&agrave;m tăng th&ecirc;m độ sang trọng khi tham gia những buổi tiệc.</p>\r\n\r\n<p>- Chất liệu Tuysi tạo n&ecirc;n sự mềm mại v&agrave; thanh tho&aacute;t khi mặc. V&agrave;o m&ugrave;a H&egrave;, đ&acirc;y l&agrave; sự lựa chọn tối ưu bởi khả năng tạo sự m&aacute;t mẻ v&agrave; co gi&atilde;n tốt.</p>\r\n\r\n<p>- Đầm dễ d&agrave;ng kết hợp c&ugrave;ng &nbsp;đ&ocirc;i gi&agrave;y sandal v&agrave; t&uacute;i x&aacute;ch &nbsp;gi&uacute;p tổng thể outfit trở n&ecirc;n ho&agrave;n hảo v&agrave; nổi bật hơn.</p>\r\n\r\n<p>- Đầm dạ hội cổ yếm phối ren mang đến vẻ ngo&agrave;i thanh lịch, kết hợp c&ugrave;ng thiết kế d&agrave;i qua gối l&agrave;m tăng th&ecirc;m độ sang trọng khi tham gia những buổi tiệc.</p>\r\n\r\n<p>- Chất liệu Tuysi tạo n&ecirc;n sự mềm mại v&agrave; thanh tho&aacute;t khi mặc. V&agrave;o m&ugrave;a H&egrave;, đ&acirc;y l&agrave; sự lựa chọn tối ưu bởi khả năng tạo sự m&aacute;t mẻ v&agrave; co gi&atilde;n tốt.</p>\r\n\r\n<p>- Đầm dễ d&agrave;ng kết hợp c&ugrave;ng &nbsp;đ&ocirc;i gi&agrave;y sandal v&agrave; t&uacute;i x&aacute;ch &nbsp;gi&uacute;p tổng thể outfit trở n&ecirc;n ho&agrave;n hảo v&agrave; nổi bật hơn.</p>\r\n', '3000000', '318f8d1491.jpg', 0, 0, 'abc'),
(13, 'Áo thun in hình ', 4, '<p>adawdawdawdawdawdawdawd</p>\r\n', '10000000', 'ac3d81f9d1.jpg', 1, 50, 'Màu xanh lục'),
(14, 'Áo thun', 4, '<p>ădawdacascasc&acirc;cscascascasc</p>\r\n', '10000000', 'd782ecc7a7.jpg', 1, 40, 'Màu xanh'),
(15, 'Váy 2 dây', 23, '<p>M&agrave;u trắngM&agrave;u trắngM&agrave;u trắngM&agrave;u trắngM&agrave;u trắng</p>\r\n', '400000', '3a42fefb68.jpg', 1, 50, 'Màu trắng'),
(16, 'Đồ Nữ', 25, '<p>M&agrave;u trắngM&agrave;u trắngM&agrave;u trắngM&agrave;u trắngM&agrave;u trắngM&agrave;u trắngM&agrave;u trắng</p>\r\n', '1000000', 'f90fd6558f.jpg', 1, 0, 'Màu trắng');

-- --------------------------------------------------------

--
-- Table structure for table `tb_product_gallery`
--

CREATE TABLE `tb_product_gallery` (
  `id` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `imageDetail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_product_gallery`
--

INSERT INTO `tb_product_gallery` (`id`, `productId`, `imageDetail`) VALUES
(5, 1, '2beab2df77.jpg'),
(6, 1, 'e59ebcbe19.jpg'),
(7, 1, '3ecd04cd3b.jpg'),
(8, 1, '3b3233f856.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_slider`
--

CREATE TABLE `tb_slider` (
  `id` int(11) NOT NULL,
  `sliderName` varchar(255) NOT NULL,
  `sliderImg` varchar(255) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_slider`
--

INSERT INTO `tb_slider` (`id`, `sliderName`, `sliderImg`, `type`) VALUES
(8, 'Slider 1', '489cf9dfe2.jpg', 1),
(9, 'Slider 2', '6115c942c1.jpg', 1),
(10, 'Slider 3', 'f6187d10df.jpg', 1),
(11, 'Slider 4', 'deea8a3655.jpg', 1),
(12, 'Slider 5', '8ae399df3e.jpg', 1);

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
-- Indexes for table `tb_customer`
--
ALTER TABLE `tb_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_order_details`
--
ALTER TABLE `tb_order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_order_id` (`orderId`);

--
-- Indexes for table `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_product_gallery`
--
ALTER TABLE `tb_product_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_slider`
--
ALTER TABLE `tb_slider`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;

--
-- AUTO_INCREMENT for table `tb_category`
--
ALTER TABLE `tb_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tb_customer`
--
ALTER TABLE `tb_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_order_details`
--
ALTER TABLE `tb_order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_product_gallery`
--
ALTER TABLE `tb_product_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_slider`
--
ALTER TABLE `tb_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_order_details`
--
ALTER TABLE `tb_order_details`
  ADD CONSTRAINT `FK_order_id` FOREIGN KEY (`orderId`) REFERENCES `tb_order` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
