-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2016 at 06:35 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE IF NOT EXISTS `carts` (
  `id` int(10) unsigned NOT NULL,
  `sessionid` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_id` int(11) unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `weight` decimal(6,2) DEFAULT NULL,
  `price` decimal(6,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `weight_total` decimal(6,2) DEFAULT NULL,
  `subtotal` decimal(6,2) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `sessionid`, `product_id`, `name`, `weight`, `price`, `quantity`, `weight_total`, `subtotal`, `created`, `modified`) VALUES
(26, 'vp5ifo66fo5hsibpnkuuf60n94', 33, 'iPhone 6 Plus 64 GB', '129.00', '9999.99', 1, '129.00', '9999.99', '2016-01-08 18:31:44', '2016-01-08 18:31:44');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(10) unsigned NOT NULL,
  `customer_id` int(11) NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billing_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billing_address2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billing_city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billing_zip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billing_state` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billing_country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipping_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipping_address2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipping_city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipping_zip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipping_state` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipping_country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `weight` decimal(8,2) unsigned DEFAULT '0.00',
  `order_item_count` int(11) DEFAULT NULL,
  `subtotal` decimal(8,2) DEFAULT NULL,
  `tax` decimal(8,2) DEFAULT NULL,
  `shipping` decimal(8,2) DEFAULT NULL,
  `total` decimal(8,2) unsigned DEFAULT NULL,
  `order_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `authorization` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `transaction` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ip_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE IF NOT EXISTS `order_items` (
  `id` int(10) unsigned NOT NULL,
  `order_id` int(10) unsigned DEFAULT NULL,
  `product_id` int(10) unsigned DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `weight` decimal(8,2) unsigned DEFAULT '0.00',
  `price` decimal(8,2) unsigned DEFAULT NULL,
  `subtotal` decimal(8,2) unsigned DEFAULT NULL,
  `productmod_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` decimal(8,2) DEFAULT NULL,
  `weight` decimal(8,2) DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `views` int(11) DEFAULT '0',
  `active` int(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `description`, `image`, `price`, `weight`, `tags`, `views`, `active`, `created`, `modified`) VALUES
(21, 'samsung-z3-8gb8mp1gb-ram5.0-white', 'samsungz', 'Operating System Version Name: Tizen OS, v2.3	\r\nModel:	Z3\r\nProcessor:Quad Core\r\nRAM:	1 GB	\r\nColour:	White\r\nScreen Size: 5 Inch - 5.9 Inch	\r\nType: Touch, Smartphone\r\nStorage Capacity (Internal):	8 GB', 'samsungz.jpg', '9189.00', '137.00', NULL, 8, 1, '2016-01-08 17:11:20', '2016-01-08 17:13:17'),
(22, 'samsung-tizen', 'samsung-tizen', '1 Year Manufacturer Warranty \r\n12.7 cm (5 1 GB RAM and 8 GB ROM 8 MP Rear & 5 MP Front Camera \r\nBrand	Samsung\r\nModel	Tizen Z3\r\nForm	Smartphone\r\nSIMs	Dual\r\nSIM Size	Micro SIM\r\nColour	Black/Silver/Gold\r\nOther Features	Tizen Store, Theme Store, My Galaxy, MixRadio\r\nCall Features	Call Barring,Call Forwarding,Call Holding,Call Waiting,Speaker Phone', 'samsung-tizen.jpg', '7999.00', '137.00', 'black', 9, 1, '2016-01-08 17:17:37', '2016-01-08 17:18:52'),
(23, 'samsung-galaxy-trend', 'samsung-galaxy-trend', 'Samsung Galaxy Trend S7392 4GB White', 'samsung-galaxy-trend.jpg', '7000.00', '137.00', NULL, 8, 1, '2016-01-08 17:20:51', '2016-01-08 17:21:22'),
(24, 'samsung-galaxy-core', 'samsung-galaxy-core', 'Samsung Galaxy Core GT I8262 8GB White\r\n1 year Warranty Expandable Memory up to 32 GB \r\n1GB RAM \r\nWi-Fi \r\nMusic Player\r\n Bluetooth \r\nGPS \r\n5MP Rear Camera & VGA Front Camera \r\nAndroid 4.1 Jelly Bean \r\n8GB Internal Memory \r\n3.5mm Audio Jack \r\nDual SIM 3G Video Player\r\nGPRS \r\nFM Radio', 'samsung-galaxy-core.jpg', '9999.00', '136.00', NULL, 8, 1, '2016-01-08 17:24:57', '2016-01-08 17:25:29'),
(25, 'xolo-black', 'xolo-black', 'XOLO Black 1X 32GB', 'xolo-black.jpg', '9999.00', '138.00', NULL, 8, 1, '2016-01-08 17:28:13', '2016-01-08 17:28:41'),
(26, 'xolo', 'xolo', 'Xolo 8x 1020 Black\r\n\r\nDual SIM\r\n\r\nXolo 8x-1020 Black \r\n\r\nMobile Phone is a dual SIM active smart phone. It supports (GSM + WCDMA) SIM combination. The smart phone adapts 3G support in one SIM. With the help of dual SIM support, the user can manage his personal and professional contacts in one smart phone. In the event of an emergency, when any one of the SIM stops working, the user can stay available using the second SIM.', 'xolo.jpg', '18000.00', '137.00', NULL, 8, 1, '2016-01-08 17:32:12', '2016-01-08 17:32:43'),
(27, 'xolo-win', 'xolo-win', 'Xolo WIN Q900s 8GB Black\r\nIn another winning streak, Indian OEM Xolo has launched worldâ€™s lightest phone at 100 grams in Xolo WIN Q900s. It runs on Windows 8.1 and packs in 1GB RAM as well as 1.2 GHz Qualcomm Snapdragon processor. With 7.2 mm thickness and fantastic features, this slim body phone from Xolo Q 900 reaffirms your belief in the fact that great things indeed come in small packages.', 'xolo-win.jpg', '15000.00', '137.00', NULL, 8, 1, '2016-01-08 17:34:47', '2016-01-08 17:35:29'),
(28, 'xolo-cube', 'xolo-cube', 'Xolo Cube 5.0 8GB Black', 'xolo-cube.jpg', '7999.00', '138.00', NULL, 8, 1, '2016-01-08 17:36:43', '2016-01-08 17:37:48'),
(29, 'meizu-m', 'meizu-m', 'Meizu m2 4G 16GB', 'meizu-m.jpg', '7999.00', '137.00', NULL, 8, 1, '2016-01-08 17:39:24', '2016-01-08 17:39:53'),
(30, 'matrixx-genius', 'matrixx-genius', 'Matrixx Genius G1 4GB Black\r\n\r\nScreen Size (in cm) : 13.97 cm (5.5) \r\nProcessor Speed : 1.3 GHz Processor \r\nCores : Quad Core \r\nRAM : 1 GB Internal \r\nMemory : 4GB \r\nRear Camera : 5 MP \r\nFront Camera : 2 MP \r\nWarranty Period : 12 Months Brand Warranty ', 'matrixx-genius.jpg', '5999.00', '137.00', NULL, 8, 1, '2016-01-08 17:42:31', '2016-01-08 17:44:15'),
(31, 'iphone', 'iphone', 'Apple iPhone 6 exudes elegance and excellence at its best. With iOS 8, the worldâ€™s most advanced mobile operating system, and a larger and superior 11.93 cm (4.7) high definition Retina display screen, this device surpasses any expectations you might have with a mobile phone. Apple iPhone 6 includes a revolutionary NFC Apply Pay Wallet which functions like a credit card. You can shop in the stores or buy stuff online in a secure, private and easy way with a single touch on your iPhone 6 using Apple Pay Wallet.', 'iphone.jpg', '51000.00', '129.00', NULL, 8, 1, '2016-01-08 17:45:42', '2016-01-08 17:46:08'),
(32, 'iPhone 6s Plus 16GB', 'iphone-plus', 'iPhone 6s Plus 16GB\r\n\r\nBrand	Apple\r\nModel	iPhone 6s Plus\r\nForm	Smartphones\r\nSIMs	Single\r\nSIM Size	Nano SIM\r\nColour	Space Grey/Silver/Gold/Rose Gold\r\nOther Features	Touch ID Fingerprint Sensor, 3D Touch, Live Photos\r\nCall Features	Call Forwarding', 'iphone-plus.jpg', '64980.00', '130.00', NULL, 8, 1, '2016-01-08 17:52:46', '2016-01-08 17:54:00'),
(33, 'iPhone 6 Plus 64 GB', 'iphone-six-plus', 'iPhone 6 Plus 64 GB\r\nBrand	Apple\r\nModel	iPhone 6 Plus\r\nForm	Smartphone\r\nSIMs	Single\r\nSIM Size	Nano\r\nLoudspeaker	Yes', 'iphone-six-plus.jpg', '81360.00', '129.00', NULL, 10, 1, '2016-01-08 17:59:22', '2016-01-08 17:59:44');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(11) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created`, `modified`) VALUES
(1, 'silver', '2013-11-03 15:18:13', '2016-01-08 15:07:49'),
(2, 'touch screen', '2013-11-03 15:18:33', '2016-01-08 15:10:03'),
(3, 'dual sim', '2013-11-03 15:18:36', '2016-01-08 15:08:48'),
(4, 'water proof', '2013-11-03 15:18:41', '2016-01-08 15:08:12'),
(5, 'black', '2013-11-03 15:39:35', '2013-11-03 15:39:35'),
(6, 'white', '2013-11-03 15:39:39', '2013-11-03 15:39:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` int(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `username`, `password`, `active`, `created`, `modified`) VALUES
(84, 'admin', 'loki', 'loki', 'f002f748a4b55af773640ed6592a9b1a23a1528c', 1, '2016-01-06 08:47:34', '2016-01-06 09:05:46'),
(96, 'customer', 'thor', 'thor', '79c9da136426a878db73b89aea19cd66dff5a2a0', 1, '2016-01-06 09:17:01', '2016-01-06 09:17:01'),
(103, 'customer', 'asgard', 'asgard', 'f255780cf99371c1299047c46d717474bfe558d3', 1, '2016-01-07 09:30:25', '2016-01-07 09:30:25'),
(104, 'customer', 'odin', 'odin', '42f5ada80520ac0c784f39e5548b2bccff1a4497', 1, '2016-01-07 09:32:52', '2016-01-07 09:32:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`),
  ADD KEY `modified` (`modified`),
  ADD KEY `name_slug` (`slug`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`),
  ADD KEY `modified` (`modified`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=105;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
