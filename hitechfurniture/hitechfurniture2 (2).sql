-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2023 at 02:31 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hitechfurniture2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ad_id` int(11) NOT NULL,
  `ad_name` varchar(100) NOT NULL,
  `ad_email` varchar(200) NOT NULL,
  `ad_password` varchar(250) NOT NULL,
  `ad_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ad_id`, `ad_name`, `ad_email`, `ad_password`, `ad_date`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$.RuiZxkmGPnoU4hBSjOok.L6v96sKNHteglsiDJiUbmcYMj9wHhaK', '2023-05-27');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `pd_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `cart_qty` int(11) NOT NULL,
  `cart_total` float NOT NULL,
  `cart_status` varchar(40) NOT NULL,
  `cart_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `pd_id`, `cust_id`, `cart_qty`, `cart_total`, `cart_status`, `cart_date`) VALUES
(31, 2, 0, 4, 0, '', '2023-05-26'),
(38, 2, 4, 1, 0, '', '2023-05-26'),
(39, 4, 4, 1, 0, '', '2023-05-26'),
(47, 2, 5, 1, 0, '', '2023-05-26'),
(55, 2, 8, 2, 0, '', '2023-05-27');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(100) NOT NULL,
  `cat_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_date`) VALUES
(1, 'bedroom', '2023-04-24'),
(2, 'Living Room', '2023-04-24'),
(3, 'Dining', '2023-05-27');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(11) NOT NULL,
  `cust_name` varchar(100) NOT NULL,
  `cust_email` varchar(200) NOT NULL,
  `cust_phone` bigint(12) NOT NULL,
  `cust_password` varchar(250) NOT NULL,
  `cust_img` varchar(350) NOT NULL,
  `cust_status` varchar(40) NOT NULL,
  `cust_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `cust_name`, `cust_email`, `cust_phone`, `cust_password`, `cust_img`, `cust_status`, `cust_date`) VALUES
(2, 'Mohammed Mehrooz', 'mr@gmail.com', 1111111111, '$2y$10$E1RBt4CMcX3A8OgY2ZIgfe.4NQVWCbcXcGc2E/XftDXLJuCBbagcS', '', '', '2023-05-25'),
(4, 'fouzan', 'fouzan@gmail.com', 1111111111, '$2y$10$e5EtitfZMoqY2hgGYGpwLeGoQuixS/BVzN1OAZQ/9gJUEEStg1xEK', '', '', '2023-05-26'),
(5, 'gowri aaa hhhh', 'gowri00@gmail.com', 6789564534, '$2y$10$UEYztZbp0BDsx1WkIx65VeGqOoPgnKgvoh4rTv9Yi.pdPOGKuFp/e', 'upload/background1.jpg', '', '2023-05-26'),
(6, 'user1', 'user1@gmail.com', 2345671234, '$2y$10$4d5FMBasIWaMSJaU3L2OEO.dXjTpIqrVC5DxyHTUmv2QKu7WpPeg2', '', '', '2023-05-27'),
(7, 'mehrooz', 'ad@gmail.com', 907220222, '$2y$10$.RuiZxkmGPnoU4hBSjOok.L6v96sKNHteglsiDJiUbmcYMj9wHhaK', '', '', '2023-05-27'),
(8, 'nisham', 'nisham@gmail.com', 1111111111, '$2y$10$xLQ.4cvAO8aA8PXtyA36sehviPXAlsiXg9XmXzMKAURRjPCW.eHS2', 'upload/bgpot2.jpg', '', '2023-05-27'),
(9, 'mehrooz', 'mmrz@gmail.com', 1111111111, '$2y$10$zr4qR3XrHNUHQkdzF8gg4.Ut1fTINzxnEotXqmBMGVpnQqxJrZLJS', 'upload/background2.jpg', '', '2023-05-29'),
(10, 'Mohammed Mehrooz', 'mehroozmmrz@gmail.com', 1234567890, '$2y$10$FECdhIj1zup0g4EM2XgNj.3jYc0hKNhWMxwNNArKzFfSOjV/yd/oq', 'upload/background2.jpg', '', '2023-05-30');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feed_id` int(11) NOT NULL,
  `pd_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `message` varchar(2000) NOT NULL,
  `type` varchar(30) NOT NULL,
  `feed_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feed_id`, `pd_id`, `cust_id`, `message`, `type`, `feed_date`) VALUES
(1, 3, 1, 'hihihi', '', '2023-05-25'),
(2, 1, 1, 'ghfdhgasgfdhg', '', '2023-05-25'),
(3, 1, 1, 'savdh', '', '2023-05-25'),
(5, 2, 4, '', '', '2023-05-26'),
(6, 3, 6, 'its an amazing product. love it', '', '2023-05-27'),
(22, 2, 10, 'liked', '', '2023-06-05'),
(34, 3, 10, '', 'liked', '2023-06-05');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `od_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `pd_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `od_qty` int(11) NOT NULL,
  `total` float NOT NULL,
  `unid` varchar(100) NOT NULL,
  `od_status` varchar(40) NOT NULL,
  `od_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`od_id`, `cat_id`, `pd_id`, `cust_id`, `od_qty`, `total`, `unid`, `od_status`, `od_date`) VALUES
(1, 1, 2, 10, 1, 30000, '647881b52af1e', 'ordered', '2023-06-01'),
(2, 1, 3, 10, 1, 300000, '647886222ed89', 'ordered', '2023-06-01'),
(3, 1, 2, 10, 1, 30000, '6478874567b82', 'ordered', '2023-06-01');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pay_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `od_id` int(11) NOT NULL,
  `pay_method` varchar(50) NOT NULL,
  `trans_id` varchar(20) NOT NULL,
  `pay_amt` float NOT NULL,
  `pay_status` varchar(50) NOT NULL,
  `pay_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`pay_id`, `cust_id`, `od_id`, `pay_method`, `trans_id`, `pay_amt`, `pay_status`, `pay_date`) VALUES
(1, 0, 1, 'upi', '1111111111111111', 30000, 'paid', '2023-06-01'),
(2, 0, 2, 'cash', '', 300000, 'pending', '2023-06-01'),
(3, 0, 3, 'upi', '1111111111111111', 30000, 'paid', '2023-06-01');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pd_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `pd_name` varchar(200) NOT NULL,
  `pd_image` varchar(350) NOT NULL,
  `pd_about` varchar(2000) NOT NULL,
  `pd_price` float NOT NULL,
  `pd_gst` float NOT NULL,
  `pd_qty` int(11) NOT NULL,
  `pd_status` varchar(40) NOT NULL,
  `pd_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pd_id`, `cat_id`, `pd_name`, `pd_image`, `pd_about`, `pd_price`, `pd_gst`, `pd_qty`, `pd_status`, `pd_date`) VALUES
(2, 1, 'Artic Sofas', 'upload/pexels-pixabay-276583.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 30000, 2, 13, '', '2023-04-24'),
(3, 1, 'Dinining', 'upload/pexels-eric-mufasa-1350789.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 300000, 3, -2, '', '2023-04-24'),
(6, 0, '', 'upload/', '', 0, 0, 0, '', '2023-04-24');

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `shp_id` int(11) NOT NULL,
  `od_id` int(11) NOT NULL,
  `pd_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `fname` varchar(70) NOT NULL,
  `lname` varchar(70) NOT NULL,
  `email` varchar(200) NOT NULL,
  `address` varchar(300) NOT NULL,
  `country` varchar(100) NOT NULL,
  `state` varchar(80) NOT NULL,
  `zip` int(10) NOT NULL,
  `unid` varchar(100) NOT NULL,
  `shp_status` varchar(40) NOT NULL,
  `shp_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`shp_id`, `od_id`, `pd_id`, `cust_id`, `fname`, `lname`, `email`, `address`, `country`, `state`, `zip`, `unid`, `shp_status`, `shp_date`) VALUES
(1, 1, 0, 10, 'aaaa', 'vgvg', 'mehroozmmrz@gmail.com', 'Uppala', 'bvcnbdv', 'Kerala', 671324, '647881b52af1e', '', '2023-06-01'),
(2, 2, 0, 10, 'mohammed mehrooz', 'asdasd', 'fabricadmin@gmail.com', 'bandiyod', 'India', 'Kerala', 671324, '647886222ed89', '', '2023-06-01'),
(3, 3, 0, 10, 'mohammed mehrooz', 'asdasd', 'mrz@gmail.com', 'Kerala, bandiyod , adka', 'India', 'Kerala', 111, '6478874567b82', '', '2023-06-01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feed_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`od_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pd_id`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`shp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feed_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `od_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `shp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
