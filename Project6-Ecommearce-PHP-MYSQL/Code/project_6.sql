-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2021 at 10:14 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_6`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(10) NOT NULL,
  `admin_username` text NOT NULL,
  `admin_password` text NOT NULL,
  `admin_image` text DEFAULT 'images/admin.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_username`, `admin_password`, `admin_image`) VALUES
(1, 'Waed Dawaghreh', '12345', 'images/admin.png'),
(2, 'ahmad', '123456', 'images/admin.png'),
(3, 'Mohammad', '1234', 'images/admin.png');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(10) NOT NULL,
  `category_name` text NOT NULL,
  `category_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_image`) VALUES
(13, 'Electronics', 'photo-1498049794561-7780e7231661.jpg'),
(14, 'Ferneture', 'pexels-photo-1571460.jpeg'),
(15, 'Accessories', 'pexels-photo-1460838.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(10) NOT NULL,
  `customer_name` text NOT NULL,
  `customer_email` text NOT NULL,
  `customer_password` text NOT NULL,
  `customer_address` text NOT NULL,
  `customer_phone` text NOT NULL,
  `customr_gender` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `customer_image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_password`, `customer_address`, `customer_phone`, `customr_gender`, `created_at`, `customer_image`) VALUES
(59, 'agi4real', 'agi4real@gmail.com', '123456', 'ammannn', '07777777777', 'male', '2021-02-05 17:52:58', 'images/user.png'),
(60, 'khadejeh', 'khadejeh@gmail.com', '123456', 'amman', '07999991230', 'male', '2021-02-06 02:24:07', 'images/user.png'),
(61, 'leen and cut', 'leen@gmail.coj', '123', 'amman', '077778522', 'female', '2021-02-06 14:47:58', 'images/user.png');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `order_total` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `order_total`, `created_at`) VALUES
(8, 59, 100, '2021-02-05 21:25:26'),
(9, 59, 10, '2021-02-05 21:53:00'),
(10, 59, 400, '2022-02-05 22:32:36'),
(11, 59, 12, '2022-02-05 22:32:47'),
(12, 59, 110, '2021-02-05 23:48:58'),
(14, 59, 2000, '2021-02-06 01:37:37'),
(15, 59, 1275, '2021-02-06 01:44:41'),
(16, 59, 60, '2021-02-06 01:46:23'),
(17, 59, 108, '2021-02-06 02:30:53'),
(18, 59, 1866, '2021-02-06 04:28:19'),
(19, 59, 12, '2021-02-06 05:01:03'),
(20, 59, 22, '2021-02-06 05:06:39'),
(21, 59, 216, '2021-02-06 05:07:42'),
(23, 60, 12, '2021-02-06 11:17:00'),
(24, 59, 216, '2021-02-06 17:24:27'),
(25, 59, 30, '2021-02-06 17:51:50'),
(26, 59, 200, '2021-02-06 21:12:47'),
(27, 59, 10, '2021-02-06 21:25:40');

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `ord_pro_id` int(10) NOT NULL,
  `order_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`ord_pro_id`, `order_id`, `product_id`) VALUES
(17, 8, 9),
(18, 9, 6),
(20, 11, 4),
(21, 12, 9),
(22, 12, 5),
(23, 14, 9),
(24, 14, 11),
(25, 15, 10),
(26, 15, 14),
(27, 16, 13),
(28, 17, 4),
(29, 18, 10),
(30, 18, 9),
(31, 18, 12),
(32, 18, 11),
(33, 19, 4),
(34, 20, 4),
(35, 20, 6),
(36, 21, 10),
(38, 23, 7),
(39, 24, 5),
(40, 24, 10),
(41, 25, 12),
(42, 25, 7),
(43, 26, 9),
(44, 27, 6);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `product_name` text NOT NULL,
  `product_image` text NOT NULL,
  `product_price` double NOT NULL,
  `product_qty` int(10) NOT NULL DEFAULT 1,
  `product_desc` text NOT NULL,
  `is_hot` tinyint(1) DEFAULT 0,
  `is_featured` tinyint(1) DEFAULT 0,
  `vendor_id` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `discount` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_image`, `product_price`, `product_qty`, `product_desc`, `is_hot`, `is_featured`, `vendor_id`, `created_at`, `discount`) VALUES
(4, 'Round Frame Anti-blue Light Eyeglasses', 'images/Screenshot 2021-02-04 115624.png', 12, 50, 'This product is not a medical device or personal protective equipment (PPE) and we can not authenticate any claims of medical or protective benefits of its use.', 1, 1, 32, '2021-02-04 21:49:27', 0),
(5, 'Eyelet Decor Clear Belt', 'images/Screenshot 2021-02-04 115359.png', 10, 30, 'Color:	Clear\r\nStyle:	Casual\r\nType:	Transparent Belts\r\nMaterial: Plastic', 1, 0, 32, '2021-02-04 21:51:18', 0),
(6, 'Double O-ring Buckle Plus Size Belt', 'images/Screenshot 2021-02-04 115412.png', 10, 40, 'Color:	Black\r\nStyle:	Casual\r\nType:	Plus Size\r\nMaterial: PU Leather', 0, 1, 33, '2021-02-04 22:19:18', 0),
(7, '3pcs Faux Pearl Decor Hair Hoop', 'images/Screenshot 2021-02-04 115922.png', 5, 100, 'Color:	Multicolor\r\nDetails:	Pearls\r\nStyle:	Glamorous\r\nType:	Gorgeous Headband\r\nMaterial: Pearls\r\nComposition: 30% Metal, 60% Pearls, 10% Rhinestone', 1, 0, 32, '2021-02-04 22:22:40', 1),
(9, 'iPad 8th G10.2 inch', 'images/Screenshot 2021-02-04 121334.png', 100, 50, 'GRAY ,1 Year Warrantyy, Memory 32 GB,IPS LCD capacitive touchscreen', 0, 0, 37, '2021-02-05 20:37:39', 0),
(10, 'PHILIPS Air Purifier 49m2', 'images/DQA0627ST0001.jpg', 240, 50, 'Removes 99.5% particles at 3nm', 0, 1, 37, '2021-02-05 20:44:37', 10),
(11, 'VIMLE', 'images/Screenshot 2021-02-04 120651.png', 900, 10, 'The sofa sections can be combined in different ways to get a size and shape that suits you. If you ever need a larger sofa, you can always add a section or two.', 0, 1, 38, '2021-02-05 20:48:10', 15),
(12, 'KLEPPSTAD', 'images/Screenshot 2021-02-04 120524.png', 150, 5, 'Maximise your storage and create a coordinated look by building your own KLEPPSTAD wardrobe combination.', 0, 0, 38, '2021-02-05 20:50:39', 0),
(13, 'Blueberry-Sunglasses', 'images/u-gunes-gozlugu--siyah--blueberry-455174-455174-1.jpg', 20, 100, 'Cool and beautiful Sunglasses ', 1, 0, 33, '2021-02-05 20:53:53', 0),
(14, 'Console table', 'images/pexels-photo-279618.jpeg', 60, 60, 'Console tables make room for those things you like to have close by.', 0, 0, 38, '2021-02-05 21:00:27', 0),
(16, 'Printed wide-brimmed hat', 'images/image_gallery_large.jpg', 30, 100, 'Cotton canvas, Twill lining, Perfect sun protection hat, Soft trim, Grosgrain braid for a good hold,', 1, 0, 32, '2021-02-06 20:28:24', 0),
(17, 'SALE HM5 STUDIO MONITOR HEADPHONES', 'images/BWAVZ_HM5_HEADPHONES_07_2000x.jpg', 99, 50, 'The HM5 are high performance Studio Monitors that will not color your music but reproduce it honestly just the way it sounded in the studio.', 1, 0, 37, '2021-02-06 20:48:45', 30);

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `vendor_id` int(10) NOT NULL,
  `vendor_name` text NOT NULL,
  `vendor_image` text NOT NULL,
  `vendor_desc` text NOT NULL,
  `cat_id` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`vendor_id`, `vendor_name`, `vendor_image`, `vendor_desc`, `cat_id`, `created_at`) VALUES
(32, 'Shein', 'images/images.png', 'SHEIN is an international B2C fast fashion brand. ', 15, '2021-02-04 21:45:07'),
(33, 'Modanisa ', 'images/b3korwOM_400x400.png', 'Modanisa is one of the first (if not the first) multibrand online retailers in the world for this segment.', 15, '2021-02-04 22:16:45'),
(37, 'SmartBuy', 'images/_4fe834c2db6ad4.14715116_ScreenShot2012-06-25at12.51.40PM.png', 'SmartBuy is Jordan\'s first and largest electronics mega store ', 13, '2021-02-05 20:30:10'),
(38, 'Ikea', 'images/ikea-logo-new-sq-1.jpg', 'IKEA is a home furnishings company founded in Sweden, in 1943, by Ingvar Kamprad, who began by peddling useful items to neighbours on his bicycle.', 14, '2021-02-05 20:41:37'),
(39, 'Samsung', 'images/Samsung-logo-square.png', ' Samsung specializes in the production of a wide variety of consumer and industry electronics, including appliances.', 13, '2021-02-06 21:55:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_username` (`admin_username`) USING HASH;

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customers_id` (`customer_id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`ord_pro_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `vendor_id` (`vendor_id`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`vendor_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `ord_pro_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `vendor_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `customers_id` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_id` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`vendor_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vendors`
--
ALTER TABLE `vendors`
  ADD CONSTRAINT `cat_id` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
