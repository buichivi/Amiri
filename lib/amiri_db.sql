-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2023 at 05:41 AM
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
-- Database: `amiri_db`
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
(1, 'Quản trị viên', 'admin@gmail.com', 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 0);

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
(25, 'Áo vest/blazor', 7),
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
(4, 'Bùi Chí Vĩ', '0826127626', 'buichivi04062002@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '0', 'Tỉnh Thái Bình'),
(5, 'Trang', '0987654321', 'admin@admin.com', '827ccb0eea8a706c4c34a16891f84e7b', '1', 'Tình Thái Bình '),
(6, 'Nguyễn Văn A', '0826127626', 'nguyenvana@email.com', '827ccb0eea8a706c4c34a16891f84e7b', '0', 'Đh Thăng Long');

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `id` int(11) NOT NULL,
  `customerId` int(11) NOT NULL,
  `cusName` varchar(255) NOT NULL,
  `cusPhoneNumber` varchar(255) NOT NULL,
  `cusAddress` varchar(255) NOT NULL,
  `finalPrice` varchar(255) NOT NULL,
  `orderDate` datetime NOT NULL,
  `shippedDate` datetime DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0: Mới, \r\n1: Chờ xử lý, \r\n2: Đã xác nhận,\r\n3: Đang đóng gói,\r\n4: Đang vận chuyển,\r\n5: Thành công,\r\n6: Khách hủy',
  `display` int(11) NOT NULL DEFAULT 1 COMMENT '1: Hiển thị\r\n0: Ẩn'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_order`
--

INSERT INTO `tb_order` (`id`, `customerId`, `cusName`, `cusPhoneNumber`, `cusAddress`, `finalPrice`, `orderDate`, `shippedDate`, `status`, `display`) VALUES
(28, 6, 'Nguyễn Văn A', '01234567', 'Đh Thăng Long', '257000', '2023-07-11 09:28:50', '2023-07-12 09:58:17', 5, 0),
(29, 6, 'ABCD', '0826127626', 'Tỉnh Thái Bình', '3309000', '2023-07-11 09:30:20', '2023-07-12 10:11:08', 5, 0),
(30, 6, 'Bùi Chí Vĩ', '0826127626', 'Tỉnh Thái Bình', '6320000', '2023-07-11 16:16:31', '2023-07-11 22:49:31', 5, 0),
(31, 4, 'Phan Duy Thành ', '0987654321', 'TP Hà Nội', '1430000', '2023-07-12 10:13:34', '2023-07-12 10:16:55', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_order_details`
--

CREATE TABLE `tb_order_details` (
  `id` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `productImg` varchar(255) NOT NULL,
  `productColor` varchar(255) NOT NULL,
  `productDiscount` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `size` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_order_details`
--

INSERT INTO `tb_order_details` (`id`, `orderId`, `productId`, `productName`, `productImg`, `productColor`, `productDiscount`, `price`, `quantity`, `size`) VALUES
(42, 28, 21, 'Áo polo cổ tàu trụ', 'bd02b1f3ac.jpg', 'Kẻ Xanh Tím Than', 70, '690000', 1, 'xxl'),
(43, 29, 23, 'Áo sơ mi cổ phối màu', '26be26aaa2.jpg', 'Đen', 70, '1090000', 1, 'xxl'),
(44, 29, 27, 'Áo Vest Cách Điệu Tay Bồng', '5c3494b6fc.jpg', 'Be', 30, '1290000', 1, 'xxl'),
(45, 29, 26, 'Jessi Set - Áo Blazer Ngắn Tay Phối Quần Short', '5036d86ebf.jpg', 'Trắng', 30, '2970000', 1, 'l'),
(46, 30, 20, 'Áo polo thun viền cổ', 'c011890ba6.jpg', 'Xanh Oliu', 0, '790000', 8, 'l'),
(47, 31, 21, 'Áo polo cổ tàu trụ', 'bd02b1f3ac.jpg', 'Kẻ Xanh Tím Than', 70, '690000', 5, 'xxl'),
(48, 31, 19, 'Áo thun phối túi hộp', '7752126a7a.jpg', 'Xanh Dương', 50, '690000', 1, 'm');

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
(1, 'Áo thun in hình', 16, '<p>&Aacute;o thun tay ngắn độ d&agrave;i vừa phải mang phong c&aacute;ch trẻ trung năng động.</p>\r\n\r\n<p>Họa tiết được in tr&ecirc;n &aacute;o sẽ gi&uacute;p ch&agrave;ng nổi bật giữa đ&aacute;m đ&ocirc;ng. L&agrave; sản phẩm ph&ugrave; hợp cho những buổi đi chơi hay hoạt động thể thao.</p>\r\n', '650000', '81bff8aa9b.jpg', 1, 70, 'Màu Xanh Lá'),
(15, 'Muse set - Áo croptop chun eo phối chân váy chữ A', 23, '<p>Muse set l&agrave; sản phẩm&nbsp;thời trang s&agrave;nh điệu v&agrave; nổi bật được phối hợp giữa &aacute;o croptop v&agrave; ch&acirc;n v&aacute;y ngắn chữ A. Chất liệu vải linen đồng bộ&nbsp;tạo cảm gi&aacute;c mềm mại v&agrave; rất dễ chịu khi mặc.</p>\r\n\r\n<p>&Aacute;o croptop của Muse set&nbsp;với thiết kế&nbsp;cổ đức c&ugrave;ng điểm nhấn nổi bật&nbsp;l&agrave; phần chun eo gi&uacute;p t&ocirc;n l&ecirc;n v&ograve;ng eo thon gọn của người mặc, tạo sự quyến rũ v&agrave; thu h&uacute;t.</p>\r\n\r\n<p>Ch&acirc;n v&aacute;y được may theo d&aacute;ng chữ A, c&oacute; độ d&agrave;i tr&ecirc;n gối mang đến&nbsp;sự trẻ trung v&agrave; năng động. Ph&iacute;a sau ch&acirc;n v&aacute;y được trang bị kho&aacute; k&eacute;o tiện dụng, c&ugrave;ng đường may d&acirc;y đan xen ở cạp tạo điểm nhấn, gi&uacute;p bộ đồ trở n&ecirc;n ph&aacute; c&aacute;ch v&agrave; c&aacute; t&iacute;nh hơn.</p>\r\n\r\n<p>Muse set l&agrave; sự kết hợp ho&agrave;n hảo giữa sự tinh tế v&agrave; phong c&aacute;ch thời trang hiện đại, ph&ugrave; hợp với nhiều dịp kh&aacute;c nhau như đi chơi, dạo phố, hẹn h&ograve; hay dự tiệc.</p>\r\n', '2240000', '5e15817acc.jpg', 1, 30, 'Vàng Hoa Cúc'),
(16, 'Áo Sơ Mi Dây Rút Eo', 23, '<p>Với&nbsp; thiết kế&nbsp;cổ đức d&agrave;i tay c&ugrave;ng d&aacute;ng su&ocirc;ng v&agrave; chất liệu th&ocirc; mềm, gi&uacute;p&nbsp;mang lại cho người diện cảm gi&aacute;c thoải m&aacute;i v&agrave; ph&oacute;ng kho&aacute;ng. Đặc biệt,&nbsp;điểm nhấn của chiếc &aacute;o nằm ở&nbsp;dải d&acirc;y r&uacute;t c&aacute;ch điệu hai b&ecirc;n h&ocirc;ng&nbsp;gi&uacute;p t&ocirc;n l&ecirc;n v&ograve;ng eo thon gọn&nbsp;v&agrave; tạo điểm nổi bật cho trang phục.</p>\r\n\r\n<p>&Aacute;o sơ mi n&agrave;y c&oacute; thể dễ d&agrave;ng kết hợp với nhiều trang phục&nbsp;kh&aacute;c nhau. Khi kết hợp c&ugrave;ng quần jean v&agrave; gi&agrave;y sneakers, bạn sẽ c&oacute; một trang phục đơn giản, trẻ trung v&agrave; năng động. Nếu&nbsp;muốn tạo n&ecirc;n phong c&aacute;ch thanh lịch hơn, h&atilde;y kết hợp &aacute;o với ch&acirc;n v&aacute;y &ocirc;m hoặc quần t&acirc;y đen v&agrave; gi&agrave;y cao g&oacute;t.</p>\r\n\r\n<p>Ngo&agrave;i ra, bạn cũng c&oacute; thể tận dụng t&iacute;nh linh hoạt của &aacute;o sơ mi cổ đức để kết hợp với c&aacute;c phụ kiện kh&aacute;c như khăn cho&agrave;ng, t&uacute;i x&aacute;ch hay trang sức để tạo n&ecirc;n nhiều phong c&aacute;ch thời trang kh&aacute;c nhau t&ugrave;y theo sở th&iacute;ch v&agrave; cảm hứng của m&igrave;nh.</p>\r\n', '1190000', '06e393c7b6.jpg', 1, 30, 'Trắng'),
(19, 'Áo thun phối túi hộp', 16, '<p>&Aacute;o thun trơn cổ tr&ograve;n basic sẽ l&agrave; item kh&ocirc;ng thể thiếu trong những ng&agrave;y h&egrave; sắp tới cho mọi ch&agrave;ng trai.</p>\r\n\r\n<p>D&aacute;ng &aacute;o trẻ trung dễ mặc c&ugrave;ng&nbsp;t&uacute;i &aacute;o&nbsp;trước ngực lạ mắt mang cảm gi&aacute;c hiện đại. Chất &aacute;o thun tho&aacute;ng m&aacute;t cho c&aacute;c ch&agrave;ng trai vận động thoải m&aacute;i kh&ocirc;ng lo trong thời tiết m&ugrave;a h&egrave; sắp tới.</p>\r\n', '690000', '7752126a7a.jpg', 1, 50, 'Xanh Dương'),
(20, 'Áo polo thun viền cổ', 18, '<p>- &Aacute;o Polo d&aacute;ng regular fit. Phần tay &aacute;o được bo viền</p>\r\n\r\n<p>- Thiết kế&nbsp;cổ &aacute;o phối viền kh&aacute;c m&agrave;u c&ugrave;ng h&agrave;ng 3 khuy c&agrave;i</p>\r\n\r\n<p>- Chất vải thun thoải m&aacute;i, m&aacute;t mẻ</p>\r\n\r\n<p>- Sản xuất năm 2022 tại Việt Nam</p>\r\n\r\n<p>Lưu &yacute;: M&agrave;u sắc sản phẩm thực tế sẽ c&oacute; sự ch&ecirc;nh lệch nhỏ so với ảnh&nbsp;do điều kiện &aacute;nh s&aacute;ng khi chụp v&agrave; m&agrave;u sắc hiển thị&nbsp;qua mản h&igrave;nh m&aacute;y t&iacute;nh/ điện&nbsp;thoại.</p>\r\n', '790000', 'c011890ba6.jpg', 1, 0, 'Xanh Oliu'),
(21, 'Áo polo cổ tàu trụ', 18, '<p>&Aacute;o polo, tay ngắn, độ d&agrave;i vừa phải, cổ t&agrave;u trụ trẻ trung mới lạ.</p>\r\n\r\n<p>Với chất liệu tho&aacute;ng m&aacute;t v&agrave; thấm mồ h&ocirc;i gi&uacute;p người mặc c&oacute; thể thoải m&aacute;i vận động m&agrave; kh&ocirc;ng lo n&oacute;ng. Họa tiết kẻ ngang trẻ trung c&ugrave;ng cổ t&agrave;u trụ sẽ l&agrave; điểm nhấn thu h&uacute;t &aacute;nh nh&igrave;n của mọi người. C&oacute; thể mặc đi l&agrave;m, đi học hay đi chơi đều rất ph&ugrave; hợp.</p>\r\n', '690000', 'bd02b1f3ac.jpg', 1, 70, 'Kẻ Xanh Tím Than'),
(22, 'Áo sơ mi trơn cơ bản', 17, '<p>&Aacute;o sơ mi trơn d&aacute;ng slim fit. Độ d&agrave;i thường, cổ đức, độ &ocirc;m vừa phải. Cổ &aacute;o v&agrave; cổ tay đứng form. Khuy tr&ugrave;ng m&agrave;u với nền &aacute;o.</p>\r\n\r\n<p>Mẫu &aacute;o sơ mi cơ bản cho những outfit c&ocirc;ng sở lịch sự. Độ &ocirc;m slim fit t&ocirc;n d&aacute;ng nhưng vẫn thoải m&aacute;i. &Aacute;o trơn với khuy đồng m&agrave;u. Cổ &aacute;o v&agrave; cổ tay đứng d&aacute;ng, giữ form tốt, ph&ugrave; hợp để bạn phối c&ugrave;ng c&agrave; vạt. Với chiếc sơ mi n&agrave;y, bạn c&oacute; thể diện hằng ng&agrave;y đến nơi l&agrave;m việc hoặc những sự kiện quan trọng.</p>\r\n', '1390000', 'e4fa11c622.jpg', 1, 70, 'Xanh Ghi Đá'),
(23, 'Áo sơ mi cổ phối màu', 17, '<p>&Aacute;o sơ mi cổ đức phối m&agrave;u h&igrave;nh tam gi&aacute;c.&nbsp;Tay d&agrave;i bo gấu v&agrave; 2 khuy c&agrave;i đ&iacute;nh k&egrave;m. Vạt &aacute;o h&igrave;nh ph&iacute;a trước. C&agrave;i bằng h&agrave;ng khuy ẩn t&agrave; ph&iacute;a trước.</p>\r\n\r\n<p>Kiểu d&aacute;ng Slim fit thiết kế form &ocirc;m nhẹ, t&ocirc;n đường n&eacute;t của cơ thể.&nbsp;T&ocirc;ng m&agrave;u lịch l&atilde;m, dễ phối nhiều trang phục như quần jean, short, quần t&acirc;y...&nbsp;&Aacute;o c&oacute; thể sơ vin hoặc thả su&ocirc;ng nhờ t&agrave; lượn thời trang.</p>\r\n', '1090000', '26be26aaa2.jpg', 1, 70, 'Đen'),
(24, 'Sunset Top - Croptop Phối Màu Ombre', 24, '<p>&Aacute;o d&aacute;ng croptop. Tay &aacute;o d&agrave;i lửng, gập gấu. Ph&iacute;a trước l&agrave; h&igrave;nh in nổi sử dụng phối m&agrave;u Ombre độc quyền.</p>\r\n\r\n<p>Thiết kế &aacute;o basic nhưng vẫn nổi bật nhờ c&aacute;ch phối m&agrave;u Ombre độc đ&aacute;o. Kỹ thuật in nổi&nbsp;gi&uacute;p cho h&igrave;nh ảnh c&agrave;ng sắc n&eacute;t v&agrave; sinh động hơn. Thiết kế croptop nhưng kh&ocirc;ng hề k&eacute;n d&aacute;ng nhờ độ d&agrave;i lửng. N&agrave;ng c&oacute; thể phối chiếc &aacute;o n&agrave;y với quần &ocirc;m hay rộng đều ph&ugrave; hợp.</p>\r\n', '590000', 'd926c09536.jpg', 1, 50, 'Đen'),
(25, 'Áo Thun In Họa Tiết', 24, '<p>&Aacute;o thun in họa tiết hoa với thiết kế &aacute;o basic, đơn giản ph&ugrave; hợp với c&aacute;c c&ocirc; n&agrave;ng s&agrave;nh điệu. Thiết kế &aacute;o tay lỡ phổ biến kết hợp c&ugrave;ng gam m&agrave;u đen tạo cảm gi&aacute;c huyền b&iacute; hơn đồng thời dễ d&agrave;ng mix &amp; match theo nhiều phong c&aacute;ch kh&aacute;c nhau.&nbsp;</p>\r\n\r\n<p>Kiểu &aacute;o thun đơn giản nhưng kh&ocirc;ng hề đơn điệu gi&uacute;p n&agrave;ng c&acirc;n mọi phong c&aacute;ch thời trang từ trẻ trung đến s&agrave;nh điệu, ph&aacute; c&aacute;ch nhất.</p>\r\n', '690000', '80785a1b37.jpg', 1, 50, 'Đen'),
(26, 'Jessi Set - Áo Blazer Ngắn Tay Phối Quần Short', 25, '<p>Set đồ&nbsp;bao gồm một chiếc &aacute;o blazer ngắn tay, &aacute;o hai d&acirc;y đi k&egrave;m v&agrave; quần short phong c&aacute;ch. Chất liệu được sử dụng l&agrave; vải linen, tạo cảm gi&aacute;c m&aacute;t mẻ v&agrave; thoải m&aacute;i khi mặc trong những ng&agrave;y h&egrave; n&oacute;ng bức.</p>\r\n\r\n<p>&Aacute;o blazer c&oacute; thiết kế cộc tay, tạo n&ecirc;n phong c&aacute;ch trẻ trung v&agrave; năng động. &Aacute;o hai d&acirc;y đi k&egrave;m với những đường may&nbsp;tinh tế, gi&uacute;p t&ocirc;n l&ecirc;n vẻ đẹp của người diện. Quần short với chiều d&agrave;i vừa phải, gi&uacute;p bạn thoải m&aacute;i di chuyển m&agrave; vẫn giữ được vẻ lịch sự c&ugrave;ng&nbsp;phong c&aacute;ch thời trang.</p>\r\n\r\n<p>Cổ &aacute;o được trang tr&iacute; bởi khuy kim loại đ&iacute;nh k&egrave;m, tạo n&ecirc;n điểm nhấn độc đ&aacute;o v&agrave; sang trọng. Với phong c&aacute;ch trẻ trung v&agrave; hiện đại, set đồ n&agrave;y sẽ l&agrave; sự lựa chọn ho&agrave;n hảo cho thời trang c&ocirc;ng sở hay&nbsp;những buổi hẹn h&ograve;, dạo phố c&ugrave;ng bạn b&egrave;.</p>\r\n', '2970000', '5036d86ebf.jpg', 1, 30, 'Trắng'),
(27, 'Áo Vest Cách Điệu Tay Bồng', 25, '<p>Sản phẩm &aacute;o vest c&aacute;ch điệu tay bồng của Ivy Moda l&agrave; một sự kết hợp tuyệt vời giữa phong c&aacute;ch c&ocirc;ng sở v&agrave; sự sang trọng hiện đại. Với kiểu d&aacute;ng croptop tay ngắn, sản phẩm t&ocirc;n l&ecirc;n vẻ ngo&agrave;i tươi trẻ v&agrave; c&aacute; t&iacute;nh của người mặc.</p>\r\n\r\n<p>Chất liệu tuytsi cao cấp được sử dụng cho&nbsp;mang lại sự mềm mại, thoải m&aacute;i v&agrave; độ bền cao. Thiết kế c&aacute;ch điệu tay bồng tạo n&ecirc;n sự nhẹ nh&agrave;ng, bay bổng cho người mặc, gi&uacute;p bạn tự tin hơn khi diện sản phẩm n&agrave;y.</p>\r\n\r\n<p>&Aacute;o vest c&aacute;ch điệu tay bồng c&oacute; thể dễ d&agrave;ng kết hợp với nhiều trang phục kh&aacute;c nhau, từ ch&acirc;n v&aacute;y đến quần jean, gi&uacute;p bạn tạo ra nhiều phong c&aacute;ch thời trang kh&aacute;c nhau. Với sự kết hợp độc đ&aacute;o giữa phong c&aacute;ch cổ điển v&agrave; hiện đại, sản phẩm n&agrave;y sẽ l&agrave; một lựa chọn ho&agrave;n hảo cho c&aacute;c buổi gặp gỡ bạn b&egrave;, tiệc t&ugrave;ng hoặc những ng&agrave;y l&agrave;m việc tại văn ph&ograve;ng.</p>\r\n', '1290000', '5c3494b6fc.jpg', 1, 30, 'Be'),
(29, 'Set Đồ Thun GROWTH', 24, '<p>&Aacute;o thun d&aacute;ng su&ocirc;ng với&nbsp;độ d&agrave;i vừa phải, tay ngắn, cổ tr&ograve;n. Ph&iacute;a trước l&agrave; d&ograve;ng chữ Growth&nbsp;tr&ecirc;n nền in m&agrave;u hồng san h&ocirc;. Phần tay &aacute;o gập nếp theo phong c&aacute;ch độc đ&aacute;o v&agrave; mới lạ hiện nay.&nbsp;&Aacute;o c&oacute; độ &ocirc;m vừa phải, gọn g&agrave;ng v&agrave; chỉn chu dễ d&agrave;ng để&nbsp;phối hợp c&ugrave;ng nhiều item kh&aacute;c nhau.</p>\r\n\r\n<p>Quần đ&ugrave;i eo chun co gi&atilde;n thoải m&aacute;i.</p>\r\n\r\n<p>Một set đồ&nbsp;năng động nhưng kh&ocirc;ng k&eacute;m phần nữ t&iacute;nh d&agrave;nh cho mọi c&ocirc; n&agrave;ng.&nbsp;</p>\r\n', '1180000', '357d46b5e5.jpg', 1, 50, 'Vàng hoa cúc');

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
(8, 1, '3b3233f856.jpg'),
(9, 15, '43c13652d2.jpg'),
(10, 15, '57a3a7db67.jpg'),
(11, 15, '2c096d47e7.jpg'),
(12, 15, '64e5ee21fa.jpg'),
(13, 16, 'df793b36ca.jpg'),
(14, 16, '4f7cc9047f.jpg'),
(15, 16, '92244130bd.jpg'),
(16, 16, 'c13992578d.jpg'),
(17, 19, 'ad17859b19.jpg'),
(18, 19, '6637415f3f.jpg'),
(19, 19, 'e5d7e39b44.jpg'),
(20, 19, '8c79dbfdc4.jpg'),
(21, 20, '666a88f0dd.jpg'),
(22, 20, '1a3f49dc42.jpg'),
(23, 20, 'a7b3ed4567.jpg'),
(24, 20, 'fd082403f4.jpg'),
(25, 21, '6ef35ab879.jpg'),
(26, 21, '2211678120.jpg'),
(27, 21, 'e3c94b2c2d.jpg'),
(28, 21, '5d8c5bf7fc.jpg'),
(29, 22, 'd41d4426be.jpg'),
(30, 22, '867dd78a9b.jpg'),
(31, 22, 'd685513fc4.jpg'),
(32, 22, '1b9d37af05.jpg'),
(33, 23, '7403bf223a.jpg'),
(34, 23, '13153f6022.jpg'),
(35, 23, '88cd5c2946.jpg'),
(36, 23, '00f1cf431d.jpg'),
(37, 24, '533faada4c.jpg'),
(38, 24, '7f6dadc416.jpg'),
(39, 24, '379bbf2764.jpg'),
(40, 24, 'c893994972.jpg'),
(41, 25, '5d7b797de3.jpg'),
(42, 25, '154d82be26.jpg'),
(43, 25, '1da28ed6ad.jpg'),
(44, 26, '10f2d794c1.jpg'),
(45, 26, '6c4796cca6.jpg'),
(46, 26, 'f5fa1267d6.jpg'),
(47, 26, '070ed4ab4d.jpg'),
(48, 27, '13cf219c04.jpg'),
(49, 27, '9f41e43c52.jpg'),
(50, 27, 'dc09743b29.jpg'),
(51, 27, '1b96891adf.jpg'),
(52, 28, '19db37b920.jpg'),
(53, 28, '6bc2cf6115.jpg'),
(54, 28, 'addfe0b36f.jpg'),
(55, 28, 'd014ce1140.jpg'),
(56, 29, '141e957752.jpg'),
(57, 29, '1ade4c07dd.jpg'),
(58, 29, '1a580faacc.jpg'),
(59, 29, '02718232dd.jpg');

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
(8, 'Slider 1', '489cf9dfe2.jpg', 0),
(9, 'Slider 2', '6115c942c1.jpg', 1),
(10, 'Slider 3', 'f6187d10df.jpg', 1),
(11, 'Slider 4', 'deea8a3655.jpg', 0),
(12, 'Slider 5', '8ae399df3e.jpg', 1),
(13, 'Slider 6', '0d0f7659d3.jpg', 1),
(14, 'Slider 7', '8455301e51.jpg', 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=224;

--
-- AUTO_INCREMENT for table `tb_category`
--
ALTER TABLE `tb_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tb_customer`
--
ALTER TABLE `tb_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tb_order_details`
--
ALTER TABLE `tb_order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tb_product_gallery`
--
ALTER TABLE `tb_product_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `tb_slider`
--
ALTER TABLE `tb_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
