-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2020 at 08:58 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adm_id` int(222) NOT NULL,
  `username` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `code` varchar(222) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adm_id`, `username`, `password`, `email`, `code`, `date`) VALUES
(6, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', '', '2018-04-09 07:36:18'),
(8, 'abc123', 'e10adc3949ba59abbe56e057f20f883e', 'abc@gmail.com', 'QX5ZMN', '2020-04-12 08:33:25'),
(9, 'sameera', 'e10adc3949ba59abbe56e057f20f883e', 'sameera@gmail.com', 'QPGIOV', '2020-04-12 14:58:03');

-- --------------------------------------------------------

--
-- Table structure for table `admin_codes`
--

CREATE TABLE `admin_codes` (
  `id` int(222) NOT NULL,
  `codes` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_codes`
--

INSERT INTO `admin_codes` (`id`, `codes`) VALUES
(1, 'QX5ZMN'),
(2, 'QFE6ZM'),
(3, 'QMZR92'),
(4, 'QPGIOV'),
(5, 'QSTE52'),
(6, 'QMTZ2J');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(250) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `qty` int(10) NOT NULL,
  `t_price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(100) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(12, 'Gym'),
(13, 'Hand Bags'),
(14, 'Lap Bags'),
(15, 'Ofz'),
(16, 'School Bags'),
(17, 'Travelling'),
(18, 'old fashion');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `trx_id` varchar(255) NOT NULL,
  `p_status` varchar(20) NOT NULL,
  `price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `product_id`, `qty`, `trx_id`, `p_status`, `price`) VALUES
(64, 5, 58, 3, '', '', 7200),
(65, 5, 62, 5, '', '', 16500),
(66, 5, 61, 4, '', '', 12800),
(67, 5, 60, 6, '', '', 18600),
(68, 5, 58, 1, '', '', 2400),
(69, 5, 58, 1, '', '', 2400),
(70, 5, 58, 3, '', '', 7200),
(71, 5, 58, 5, '', '', 12000),
(72, 5, 57, 5, '', '', 11500),
(73, 5, 57, 6, '', '', 13800);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `product_cat` int(100) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` varchar(222) NOT NULL,
  `product_keywords` text NOT NULL,
  `p_qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_keywords`, `p_qty`) VALUES
(54, 12, 'orange gym', 2000, 'best bag for gym', '5e961bc89bd4b.jpg', 'gym bag', 20),
(55, 12, 'pink gym', 2100, 'best bag for gym', '5e961bf183714.jpg', 'gym bag', 55),
(56, 12, 'gray gym', 2200, 'best bag for gym', '5e961c152be17.jpg', 'gym bag', 30),
(57, 12, 'blue gym', 2300, 'best bag for gym', '5e961c2ba2b1d.jpg', 'gym bag', 30),
(58, 12, 'black bag', 2400, 'best bag for gym', '5ea09b98aebda.jpg', 'gym bag', 90),
(59, 13, 'Brown hand', 3000, 'best bag for hand', '5e961dc600fbf.jpg', 'hand bag', 0),
(60, 13, 'black hand', 3100, 'best bag for hand', '5e961df24e6e7.jpg', 'hand bag', 0),
(61, 13, 'blue hand', 3200, 'best bag for hand', '5e961e14743df.jpg', 'hand bag', 0),
(62, 13, 'gray hand', 3300, 'best bag for hand', '5e961e5b30ff6.jpg', 'hand bag', 0),
(63, 13, 'Red hand', 3400, 'best bag for hand', '5e961e7a2c7dc.jpg', 'hand bag', 0),
(64, 14, 'black laptop', 2500, 'best bag for laptop', '5e961fe698617.jpg', 'lap bags', 0),
(65, 14, 'black 2 laptop', 2600, 'best bag for laptop', '5e96200f70406.jpg', 'lap bags', 0),
(66, 14, 'black 3 laptop', 3200, 'best bag for laptop', '5e9620287d35e.jpg', 'lap bags', 0),
(67, 14, 'red laptop', 2400, 'best bag for laptop', '5e96204628d00.jpg', 'lap bags', 0),
(68, 14, 'black 4 laptop', 2500, 'best bag for laptop', '5e9620649bef8.jpg', 'lap bags', 0),
(69, 15, 'black leather ofz', 5000, 'best ofz', '5e962199a71c7.jpg', 'ofz bags', 0),
(70, 15, 'black ofz', 4900, 'best ofz', '5e9621bb07a28.jpg', 'ofz bags', 0),
(71, 15, 'brown ofz', 4800, 'best ofz', '5e9621da1b2d9.jpg', 'ofz bags', 0),
(72, 15, 'charcoal black ofz', 5200, 'best ofz', '5e9621fd1129a.jpg', 'ofz bags', 0),
(73, 16, 'black blue school', 3000, 'best school bag', '5e96223b924da.jpg', 'school bags', 0),
(74, 16, 'gray black school bag', 3850, 'best school bag', '5e96227500c03.jpg', 'school bags', 0),
(75, 16, 'gray school bag', 2685, 'best school bag', '5e96229b09fd6.jpg', 'school bags', 0),
(76, 16, 'sea blue school', 3200, 'best school bag', '5e9622b38897c.jpg', 'school bags', 0),
(77, 16, 'black school', 2560, 'best school bag', '5e9622d73367d.jpg', 'school bags', 0),
(78, 16, 'primary bag', 2200, 'best school bag', '5e9622f175319.jpg', 'school bags', 0),
(79, 16, 'red school', 3500, 'best school bag', '5e96230d83f48.jpg', 'school bags', 0),
(80, 17, 'black supreme', 5000, 'best traveling bag', '5e96236f3ecd5.jpg', 'travelling bags', 0),
(81, 17, 'blue travel', 5220, 'best traveling bag', '5e96239cc750c.jpg', 'travelling bags', 0),
(82, 17, 'black adidas', 5500, 'best traveling bag', '5e9623d51b071.jpg', 'travelling bags', 0),
(83, 17, 'red supreme', 5800, 'best traveling bag', '5e96240a938a0.jpg', 'travelling bags', 0),
(84, 17, 'green black travel', 5750, 'best traveling bag', '5e9624331515b.jpg', 'travelling bags', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(10) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `address` varchar(300) NOT NULL,
  `username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `address`, `username`) VALUES
(2, 'saman', 'kumara', 'saman@gmail.com', '25f9e794323b453885f5181f1b624d0b', '0712685736', 'sdflkvhorsihgv usdhgvuhseuh ushgvf9ehs9pu', 'saman'),
(4, 'saman', 'kumara', 'kasun741852@gmail.com', '25f9e794323b453885f5181f1b624d0b', '0712685735', 'dfslvnifnsdvinvs ndsvbhws0 nfvuionin', 'samanssd'),
(5, 'kamal', 'perera', 'kamal@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0712685738', '122/1,maradana,colombo', 'kamal'),
(6, 'sunil', 'sdafSGVs', 'sunil@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0712555265', 'fdioherahndfi bvbgubvu dfgvbuer', 'sunil');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adm_id`);

--
-- Indexes for table `admin_codes`
--
ALTER TABLE `admin_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adm_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `admin_codes`
--
ALTER TABLE `admin_codes`
  MODIFY `id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
