-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2022 at 07:30 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bellarosa`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Email` varchar(25) NOT NULL,
  `Password` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Email`, `Password`) VALUES
('Sarah@gmail.com', 123);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `name` varchar(30) NOT NULL,
  `price` int(4) NOT NULL,
  `description` text NOT NULL,
  `type` varchar(8) NOT NULL,
  `img1` varchar(50) NOT NULL,
  `img2` varchar(50) NOT NULL,
  `img3` varchar(50) NOT NULL,
  `img4` varchar(50) NOT NULL,
  `id` int NOT NULL PRIMARY KEY AUTO_INCREMENT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`name`, `price`, `description`, `type`, `img1`, `img2`, `img3`, `img4`) VALUES
('100 Baby Roses', 1395, 'Height: 60 Cmwidth: 60 Cm\r\nBursting With Colors, This Bouquet Of 100 Baby Roses Will Surely Leave An Admirable Impression On Someone For 100 Years. Disclaimer: Colors May Vary Depending On The Season.', 'bouquet ', 'bq4.jpeg', 'bq4.1.jpg', 'bq4.2.jpg', 'bq4.3.jpg'),
('35 Purple Roses Hand Bouquet', 399, 'Height: 50 Cmwidth: 25 Cm\r\nWhere Flowers Bloom, So Does Hope. Gift This Lovely Bouquet Of Roses To Your Loved Ones To Give Them Hope.', 'bouquet ', 'bq5.jpeg', 'bq5.1.jpg', 'bq5.2.jpg', 'bq5.3.jpg'),
('All White', 439, 'Height: 40 Cmwidth: 50 Cm\r\nThe Arrangement Contains Baby Breath And Alstroemeria.', 'bouquet ', 'bq3.jpeg', 'bq3.1.jpg', 'bq3.2.jpg', 'bq3.3.jpg'),
('Amazing Blue', 600, 'Height: 30 Cmwidth: 40 Cm\r\nA Bouquet Contains Rose And Steelgrass Green , Eucalyptus', 'bouquet ', 'bq2.jpeg', 'bq2.1.jpg', 'bq2.2.jpg', 'bq2.3.jpg'),
('Classic Peaches', 489, 'Height: 50 Cmwidth: 45 Cm\r\nDelicate Peach Baby Roses Bundled With Love To Fit Any Occasion. Bouquet Contains: 20 Peach Baby Roses 10 Dried Wheat', 'bouquet ', 'bq6.jpg', 'bq6.1.jpg', 'bq6.2.jpg', 'bq6.3.jpg'),
('Fabulous Mix Bouquet', 709, 'Height: 50 Cmwidth: 60 Cm\r\nDid You Know That Studies Show Both Men And Women Who Give Flowers Are Perceived To Be Happy, Achieving, And Courageous People? Not Only That, But You Are Also Making Your Loved One\'s Day More Memorable And Cherishable. With The Fabulous Mix Bouquet, You Could Surprise And Cheer Someone Up.', 'bouquet', 'bq1.jpeg', 'bq1.1.jpg', 'bq1.2.jpg', 'bq1.3.jpg'),
('Fresh', 700, 'Height: 80 Cm Width: 40 Cm\r\nThe Arrangement Contains Carnation, Anthurium And Eustoma.', 'vase', 'vase6.jfif', 'vase6.1.jpg', 'vase6.2.jpg', 'vase6.3.jpg'),
('Mango Bango', 654, 'Mango Bango From Musaed Includes Orange Roses, Orange Gerbera And Red Anthurium In A Ceramic Vase.', 'vase', 'vase4.jpg', 'vase4.1.jpg', 'vase4.2.jpg', 'vase4.3.jpg'),
('Medium Red Baby Roses', 725, 'Height: 45 Cm Width: 30 Cm\r\nFlowers Are The Way To The Heart. Gift This Lovely Arrangement Of Red Baby Roses To Your Loved One To Express Your Feelings.', 'vase', 'vase2.jfif', 'vase2.1.jpg', 'vase2.2.jpg', 'vase2.3.jpg'),
('Purple Dreams', 472, 'Height: 30 Cm Width: 30 Cm\r\nThe Arrangement Contains Chrysanths, Baby Rose And Rose.', 'vase', 'vase3.jfif', 'vase3.1.jpg', 'vase3.2.jpg', 'vase3.3.jpg'),
('Summer', 399, 'This Gorgeous Arrangement Contains White Roses, Yellow Baby Roses And Orange Baby Roses In A Beautiful Ceramic Vase.', 'vase', 'vase5.jfif', 'vase5.1.jpg', 'vase5.2.jpg', ''),
('White Innocence', 550, 'Height: 70 Cmwidth: 40 Cm\r\nArrangement Of Orchid And Tulip', 'vase', 'vase1.jpeg', 'vss1.1.jpeg', 'vss1.2.jpeg', 'vss1.3.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Email`);

--
-- Indexes for table `products`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
