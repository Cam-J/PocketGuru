-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2023 at 12:02 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pocket-guru`
--
CREATE DATABASE IF NOT EXISTS `pocket-guru` DEFAULT CHARACTER SET latin1 COLLATE latin1_general_ci;
USE `pocket-guru`;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

DROP TABLE IF EXISTS `files`;
CREATE TABLE `files` (
  `fileId` int(11) NOT NULL,
  `fileName` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `filePath` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `fileType` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `title` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `description` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `userId` int(11) NOT NULL COMMENT 'uploaded by'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`fileId`, `fileName`, `filePath`, `fileType`, `title`, `description`, `userId`) VALUES
(1, 'small-fuffy-dog-breeds-1623362663.jpg', './images/small-fuffy-dog-breeds-1623362663.jpg', 'image/jpeg', 'testdoggo', 'testtesttest', 3),
(2, 'small-fuffy-dog-breeds-1623362663.jpg', './images/small-fuffy-dog-breeds-1623362663.jpg', 'image/jpeg', 'testdoggo', 'testtesttest', 3),
(3, 'Theatre2.jpg', './images/Theatre2.jpg', 'image/jpeg', 'Heeeee', 'ewewwewewwewewwewewewe', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

DROP TABLE IF EXISTS `orderdetails`;
CREATE TABLE `orderdetails` (
  `ID` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `productId` int(11) UNSIGNED NOT NULL,
  `productName` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `quantity` int(100) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`ID`, `orderId`, `productId`, `productName`, `quantity`, `price`) VALUES
(1, 4, 1, 'Tiger Balm (white)', 1, '9.99'),
(2, 4, 5, 'Turmeric Gummies', 2, '39.98'),
(3, 4, 3, 'Kastoori Incense Sticks', 1, '15.99'),
(4, 5, 1, 'Tiger Balm (white)', 1, '9.99'),
(5, 5, 5, 'Turmeric Gummies', 2, '39.98'),
(6, 5, 3, 'Kastoori Incense Sticks', 1, '15.99'),
(7, 5, 3, 'Kastoori Incense Sticks', 1, '15.99'),
(8, 7, 2, 'Tiger Balm (red)', 1, '2.99'),
(9, 7, 3, 'Kastoori Incense Sticks', 1, '15.99'),
(10, 7, 3, 'Kastoori Incense Sticks', 1, '15.99'),
(11, 8, 1, 'Tiger Balm (white)', 1, '9.99'),
(12, 8, 4, 'Sandalwood Incense', 1, '29.99'),
(13, 8, 2, 'Tiger Balm (red)', 1, '2.99'),
(14, 8, 2, 'Tiger Balm (red)', 1, '2.99'),
(15, 9, 1, 'Tiger Balm (white)', 1, '9.99'),
(16, 9, 3, 'Kastoori Incense Sticks', 1, '15.99'),
(17, 9, 2, 'Tiger Balm (red)', 3, '8.97'),
(18, 9, 2, 'Tiger Balm (red)', 3, '8.97'),
(19, 10, 1, 'Tiger Balm (white)', 1, '9.99'),
(20, 10, 2, 'Tiger Balm (red)', 2, '5.98'),
(21, 10, 5, 'Turmeric Gummies', 1, '19.99'),
(22, 10, 5, 'Turmeric Gummies', 1, '19.99'),
(23, 11, 1, 'Tiger Balm (white)', 1, '9.99'),
(24, 11, 3, 'Kastoori Incense Sticks', 1, '15.99'),
(25, 11, 3, 'Kastoori Incense Sticks', 1, '15.99'),
(26, 12, 1, 'Tiger Balm (white)', 1, '9.99'),
(27, 12, 1, 'Tiger Balm (white)', 1, '9.99'),
(28, 13, 1, 'Tiger Balm (white)', 1, '9.99'),
(29, 13, 2, 'Tiger Balm (red)', 1, '2.99'),
(30, 13, 2, 'Tiger Balm (red)', 1, '2.99'),
(31, 14, 2, 'Tiger Balm (red)', 1, '2.99'),
(32, 14, 4, 'Sandalwood Incense', 1, '29.99'),
(33, 14, 3, 'Kastoori Incense Sticks', 1, '15.99'),
(34, 14, 3, 'Kastoori Incense Sticks', 1, '15.99'),
(35, 15, 1, 'Tiger Balm (white)', 1, '9.99'),
(36, 15, 2, 'Tiger Balm (red)', 2, '5.98'),
(37, 15, 2, 'Tiger Balm (red)', 2, '5.98');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `orderId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `email` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `date_of_order` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderId`, `userId`, `email`, `date_of_order`) VALUES
(3, 3, 'testadmin@email.com', '2023-04-09 10:44:03'),
(4, 3, 'testadmin@email.com', '2023-04-09 10:48:00'),
(5, 3, 'testadmin@email.com', '2023-04-09 10:53:20'),
(6, 3, 'testadmin@email.com', '2023-04-09 10:56:04'),
(7, 3, 'testadmin@email.com', '2023-04-09 10:56:24'),
(8, 3, 'testadmin@email.com', '2023-04-09 10:56:48'),
(9, 3, 'testadmin@email.com', '2023-04-19 10:36:28'),
(10, 3, 'testadmin@email.com', '2023-04-19 10:38:11'),
(11, 3, 'testadmin@email.com', '2023-04-19 10:38:43'),
(12, 3, 'testadmin@email.com', '2023-04-19 10:38:54'),
(13, 3, 'testadmin@email.com', '2023-04-19 10:39:14'),
(14, 6, 'freeuser@free.com', '2023-04-19 10:55:11'),
(15, 3, 'testadmin@email.com', '2023-04-20 09:59:56');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `postId` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `content` text COLLATE latin1_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userId` int(11) NOT NULL,
  `fileId` int(11) NOT NULL,
  `memberView` enum('free','bronze','silver','gold') COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`postId`, `title`, `content`, `created_at`, `userId`, `fileId`, `memberView`) VALUES
(5, 'Test member view', 'AH SOMETHING FOR GOLD', '2023-04-09 14:12:47', 3, 0, 'gold'),
(6, 'Silvers 1', 'ssssssssssssssssssssssss', '2023-04-09 14:48:25', 3, 0, 'silver'),
(7, 'bronzeeee 11111', 'aaaaaaa', '2023-04-09 14:48:36', 3, 0, 'bronze'),
(8, 'Free stuff', 'free free fre', '2023-04-19 10:35:03', 3, 0, 'free');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `productId` int(11) UNSIGNED NOT NULL,
  `productName` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `productDesc` text COLLATE latin1_general_ci NOT NULL,
  `quantity` int(100) NOT NULL,
  `productPrice` decimal(10,2) NOT NULL,
  `productImage` varchar(255) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productId`, `productName`, `productDesc`, `quantity`, `productPrice`, `productImage`) VALUES
(1, 'Tiger Balm (white)', 'Tiger Balm White is a proven, safe and effective herbal ointment indicated for the treatment of tensions headache that you may get when your head, neck and shoulder muscles become tense due to tiredness, overwork or emotional strain. Tiger Balm White can be used by adults only. Rubbing the balm on the forehead or temples to soothe headache.', 100, '9.99', '/PocketGuru/images/TigerBalmWhite.jpeg'),
(2, 'Tiger Balm (red)', 'Tiger Balm Red is a proven, safe and effective herbal ointment which helps soothe sore and aching muscles. Tiger Balm Red can be used by adults and children over 2 years. Rubbing the balm on the skin at the painful area stimulates the circulation and causes a warming sensation to provide relief from aches and pains.', 10, '2.99', '/PocketGuru/images/TigerBalmRed.jpeg'),
(3, 'Kastoori Incense Sticks', 'KastooriIncense is an inexpensive way of adding fragrance and ambience to your home and we have a huge collection to choose from. Goloka is the leading manufacturer and top selling brand in the world. They have the knowledge and the skill to create the most magical range of fragrances from the finest raw materials', 53, '15.99', '/PocketGuru/images/KastooriIncense.jpg'),
(4, 'Sandalwood Incense', 'The original and best Satya Sai Baba Nag Champa Incense from the Shrinivas Sugandhalaya factory. The Nag Champa Collection is the most famous brand of incense in the world by far. It is traditionally made from a sandalwood base to which are added a variety of flower oils. The brand is used everywhere in Buddhist temples as a wonderful aid to personal meditation in ritual or spell work as part of a cleansing or just to create a wonderful relaxed and pleasant ambience in the home', 87, '29.99', '/PocketGuru/images/SandalwoodIncense.jpeg'),
(5, 'Turmeric Gummies', 'Getting the nutrients you need for optimal well-being is serious business...but the form you get your nutrition in doesn''t have to be. Turmeric is a herb long used in Ayurveda, India’s traditional system of health support.', 64, '19.99', '/PocketGuru/images/TurmericGummies.jpeg'),
(6, 'Test Product 6', 'A test product', 88, '7.99', 'https://placehold.co/600x400?text=Hello+World'),
(7, 'Test Product 7', 'A test product', 2, '11.99', 'https://placehold.co/600x400?text=Hello+World'),
(8, 'Test Product 8', 'A test product', 18, '7.99', 'https://placehold.co/600x400?text=Hello+World'),
(9, 'Test Product 9', 'A test product', 18, '7.99', 'https://placehold.co/600x400?text=Hello+World'),
(10, 'Test Product 10', 'A test product', 5, '34.99', 'https://placehold.co/600x400?text=Hello+World'),
(11, 'Test Product 11', 'A test product', 6, '1.99', 'https://placehold.co/600x400?text=Hello+World'),
(12, 'Test Product 12', 'A test product', 4, '72.99', 'https://placehold.co/600x400?text=Hello+World');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `username` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `userRole` enum('user','admin','suspended') COLLATE latin1_general_ci NOT NULL,
  `firstName` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `lastName` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `address1` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `address2` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `postCode` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `membership` enum('free','bronze','silver','gold') COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `username`, `password`, `userRole`, `firstName`, `lastName`, `address1`, `address2`, `postCode`, `email`, `membership`) VALUES
(3, 'testadmin', 'b444ac06613fc8d63795be9ad0beaf55011936ac', 'admin', 'test', 'test', 'test', 'test', 'DG1 3AA', 'testadmin@email.com', 'gold'),
(4, 'Sally', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'user', 'sally', 'Bloggs', '1 New Street', 'Dumfries', 'DG1 1AA', '', 'gold'),
(5, 'Joe', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'user', 'Joe', 'Bloggs', '1 New Street', 'Dumfries', 'DG1 1AA', '', 'silver'),
(6, 'freeuser', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'user', 'fress', 'user', 'free street ', 'freeville', 'fre 3me', 'freeuser@free.com', 'free');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`fileId`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `productId` (`productId`),
  ADD KEY `fk_orderId` (`orderId`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderId`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`postId`),
  ADD KEY `userId` (`userId`),
  ADD KEY `fileId` (`fileId`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `fileId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `postId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `fk_orderId` FOREIGN KEY (`orderId`) REFERENCES `orders` (`orderId`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_productId` FOREIGN KEY (`productId`) REFERENCES `product` (`productId`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
