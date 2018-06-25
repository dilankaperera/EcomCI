-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2018 at 09:29 PM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gzone_technologiesdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `agent`
--

CREATE TABLE `agent` (
  `agent_id` int(11) NOT NULL,
  `agent_first_name` varchar(50) DEFAULT NULL,
  `agent_middle_name` varchar(50) DEFAULT NULL,
  `agent_last_name` varchar(50) DEFAULT NULL,
  `agent_email` varchar(50) DEFAULT NULL,
  `agent_address_id` int(11) DEFAULT NULL,
  `agent_phone_num` varchar(45) DEFAULT NULL,
  `agent_business_name` varchar(45) DEFAULT NULL,
  `agent_nic` varchar(45) DEFAULT NULL,
  `agent_license` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `user_username` varchar(45) NOT NULL,
  `admin_profile_image` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `agent`
--

INSERT INTO `agent` (`agent_id`, `agent_first_name`, `agent_middle_name`, `agent_last_name`, `agent_email`, `agent_address_id`, `agent_phone_num`, `agent_business_name`, `agent_nic`, `agent_license`, `status`, `user_username`, `admin_profile_image`) VALUES
(1, 'kl@gmail.com', NULL, 'kl@gmail.com', 'kl@gmail.com', NULL, 'kl@gmail.com', 'kl@gmail.com', 'kl@gmail.com', 'kl@gmail.com', NULL, 'kl', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `agent_address`
--

CREATE TABLE `agent_address` (
  `id` int(11) NOT NULL,
  `house_number` varchar(50) NOT NULL,
  `street_name` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `country` varchar(50) DEFAULT NULL,
  `postal_code` varchar(45) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `amout_to_be_deposit`
--

CREATE TABLE `amout_to_be_deposit` (
  `to_deposit_id` int(11) NOT NULL,
  `total_amount` int(20) DEFAULT NULL,
  `agent_agent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cash_on_delivery`
--

CREATE TABLE `cash_on_delivery` (
  `cash_on_delivery_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(1, 'Mobile & Tablets'),
(2, 'Computer & Laptops'),
(3, 'Electronics'),
(4, 'Other Products');

-- --------------------------------------------------------

--
-- Table structure for table `collection_point`
--

CREATE TABLE `collection_point` (
  `id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `courier`
--

CREATE TABLE `courier` (
  `courier_id` int(11) NOT NULL,
  `charge` decimal(10,0) NOT NULL,
  `phone_number_id` varchar(45) NOT NULL,
  `courier_serviceprovider_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `courier_serviceprovider`
--

CREATE TABLE `courier_serviceprovider` (
  `courier_serviceprovider_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone_number_id` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_first_name` varchar(50) DEFAULT NULL,
  `customer_middle_name` varchar(50) DEFAULT NULL,
  `customer_last_name` varchar(50) DEFAULT NULL,
  `customer_email` varchar(50) NOT NULL,
  `customer_phone_num` varchar(45) DEFAULT NULL,
  `customer_address_id` int(11) DEFAULT NULL,
  `user_username` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_first_name`, `customer_middle_name`, `customer_last_name`, `customer_email`, `customer_phone_num`, `customer_address_id`, `user_username`) VALUES
(1, NULL, NULL, NULL, 'blah@hotmail.com', NULL, NULL, 'blah'),
(2, NULL, NULL, NULL, 'gt@gmail.com', NULL, NULL, 'Duck'),
(3, NULL, NULL, NULL, 'df@gmail.com', NULL, NULL, 'jehan'),
(4, NULL, NULL, NULL, 'ae@gmail.com', NULL, NULL, 'funny'),
(5, NULL, NULL, NULL, 'gh@gmail.com', NULL, NULL, 'Gimhani'),
(6, NULL, NULL, NULL, 'ds@gmail.com', NULL, NULL, 'Danny'),
(7, NULL, NULL, NULL, 'lk@gmail.com', NULL, NULL, 'Larry');

-- --------------------------------------------------------

--
-- Table structure for table `customer_address`
--

CREATE TABLE `customer_address` (
  `id` int(11) NOT NULL,
  `house_number` int(11) DEFAULT NULL,
  `street_name` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `postal_code` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_method`
--

CREATE TABLE `delivery_method` (
  `delivery_method_id` int(11) NOT NULL,
  `type` enum('1','0') NOT NULL,
  `collection_point_id` int(11) NOT NULL,
  `courier_id` int(11) NOT NULL,
  `status` enum('1','0') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `online_payment`
--

CREATE TABLE `online_payment` (
  `online_payment_id` int(11) NOT NULL,
  `cardholder_name` varchar(50) DEFAULT NULL,
  `card_number` int(11) DEFAULT NULL,
  `cvv` int(11) DEFAULT NULL,
  `expiry_date` varchar(50) DEFAULT NULL,
  `paypal_id` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `order_date` date DEFAULT NULL,
  `order_quantity` int(11) DEFAULT NULL,
  `order_price` decimal(10,0) DEFAULT NULL,
  `delivery_method_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `order_discount` decimal(10,0) DEFAULT NULL,
  `user_username` varchar(45) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order_has_product`
--

CREATE TABLE `order_has_product` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `payment_method`
--

CREATE TABLE `payment_method` (
  `payment_method_id` int(11) NOT NULL,
  `type` enum('1','0') NOT NULL,
  `payment_amount` decimal(10,0) NOT NULL,
  `cash_on_delivery_id` int(11) NOT NULL,
  `online_payment_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_description` varchar(250) DEFAULT '0',
  `product_price` int(11) DEFAULT '0',
  `product_keywords` varchar(60) DEFAULT '0',
  `product_image` varchar(500) DEFAULT '0',
  `product_dicount` decimal(10,0) DEFAULT '0',
  `segment_id` int(11) DEFAULT '0',
  `product_quantity` int(11) DEFAULT '0',
  `category_id` int(11) DEFAULT '0',
  `status` enum('1','0') DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_description`, `product_price`, `product_keywords`, `product_image`, `product_dicount`, `segment_id`, `product_quantity`, `category_id`, `status`) VALUES
(1, 'Wireless Mouse', 'sdfkb sjdjksd skjbdas asdkfjjsba askdbas sfdkbs sfsakbf', 1200, 'computer , accessories, mouse', '1.jpeg', '0', 4, 20, 2, '1'),
(2, 'Beats EP Headphones', 'sdfskn djfksd dff dfld fdsfldfj fsdlfsd fdslfhds fdlfdsf dflxlf dsflfdjfl ', 19000, 'headphones , electronics', '2.jpg', '0', 11, 10, 3, '1'),
(3, 'Tracker Drone Phantom', 'vdjbn dfjdkjsfb dfkjsjfd sfdkf dfkbdj efdfkdsb fedfkdf', 7500, 'drone , camera , electronics', '3.jpg', '0', 8, 10, 3, '1'),
(4, ' Anti Theft Bag', 'dvs fdskfh sdlcjds sdsdflj dldsfj dfldk dffldfj dfdlfdfj flfdfk dlffdf', 5000, 'other products, bag , backpack', '4.jpg', '10', 13, 20, 4, '1'),
(5, 'iPhone X', 'fdh dkjsj efdks fks dksjf dfdlk dfldkh dfdflh dsfkjkdjh', 179950, 'mobile , iphone', '5.jpg', '0', 1, 30, 1, '1'),
(6, 'Samsung s6', 'dkghhgh dineineun fneunnij', 34000, 'mobile', '6.jpg', '0', 1, 4, 1, '1'),
(7, 'LED 24', 'fjjghbb fhbubgb ubrgubu', 50000, 'screen', '7.jpg', '0', 6, 2, 2, '1');

-- --------------------------------------------------------

--
-- Table structure for table `segment`
--

CREATE TABLE `segment` (
  `segment_id` int(11) NOT NULL,
  `segment_name` varchar(45) NOT NULL,
  `category_cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `segment`
--

INSERT INTO `segment` (`segment_id`, `segment_name`, `category_cat_id`) VALUES
(1, 'Mobile & Tablets', 1),
(2, 'Mobile & Tablets Accessories', 1),
(3, 'Other Smart Devices', 1),
(4, 'Computer Accessories', 2),
(5, 'Datacards & Routers', 2),
(6, 'Storage', 2),
(7, 'Gaming', 2),
(8, 'Camera', 3),
(9, 'Audio & Video Accessories', 3),
(10, 'Speakers', 3),
(11, 'Headphones', 3),
(12, 'Personal Care Applications', 3),
(13, 'Other Products', 4);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(45) NOT NULL,
  `password` varchar(128) NOT NULL,
  `user_role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `user_role_id`) VALUES
('blah', '202cb962ac59075b964b07152d234b70', 2),
('Danny', '81dc9bdb52d04dc20036dbd8313ed055', 2),
('Duck', 'f97ca8decb3a5f04d11d0e3c6ff3f0cd', 2),
('funny', '289dff07669d7a23de0ef88d2f7129e7', 2),
('Gimhani', '202cb962ac59075b964b07152d234b70', 2),
('jehan', '202cb962ac59075b964b07152d234b70', 2),
('kl', '202cb962ac59075b964b07152d234b70', 1),
('Larry', '202cb962ac59075b964b07152d234b70', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `type` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `type`) VALUES
(1, 'agent'),
(2, 'customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agent`
--
ALTER TABLE `agent`
  ADD PRIMARY KEY (`agent_id`),
  ADD KEY `fk_agent_agent_address1_idx` (`agent_address_id`),
  ADD KEY `fk_agent_user1_idx` (`user_username`);

--
-- Indexes for table `agent_address`
--
ALTER TABLE `agent_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `amout_to_be_deposit`
--
ALTER TABLE `amout_to_be_deposit`
  ADD PRIMARY KEY (`to_deposit_id`),
  ADD KEY `fk_amout_to_be_deposit_agent1_idx` (`agent_agent_id`);

--
-- Indexes for table `cash_on_delivery`
--
ALTER TABLE `cash_on_delivery`
  ADD PRIMARY KEY (`cash_on_delivery_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `collection_point`
--
ALTER TABLE `collection_point`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_collection_point_agent1_idx` (`agent_id`);

--
-- Indexes for table `courier`
--
ALTER TABLE `courier`
  ADD PRIMARY KEY (`courier_id`),
  ADD KEY `fk_courier_courier_serviceprovider1_idx` (`courier_serviceprovider_id`);

--
-- Indexes for table `courier_serviceprovider`
--
ALTER TABLE `courier_serviceprovider`
  ADD PRIMARY KEY (`courier_serviceprovider_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD KEY `fk_customer_address1_idx` (`customer_address_id`),
  ADD KEY `fk_customer_user1_idx` (`user_username`);

--
-- Indexes for table `customer_address`
--
ALTER TABLE `customer_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_method`
--
ALTER TABLE `delivery_method`
  ADD PRIMARY KEY (`delivery_method_id`),
  ADD KEY `fk_delivery_method_collection_point1_idx` (`collection_point_id`),
  ADD KEY `fk_delivery_method_courier1_idx` (`courier_id`);

--
-- Indexes for table `online_payment`
--
ALTER TABLE `online_payment`
  ADD PRIMARY KEY (`online_payment_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `fk_order_delivery_method1_idx` (`delivery_method_id`),
  ADD KEY `fk_order_payment1_idx` (`payment_id`),
  ADD KEY `fk_order_user1_idx` (`user_username`);

--
-- Indexes for table `order_has_product`
--
ALTER TABLE `order_has_product`
  ADD PRIMARY KEY (`order_id`,`product_id`),
  ADD KEY `fk_order_has_product_product1_idx` (`product_id`),
  ADD KEY `fk_order_has_product_order1_idx` (`order_id`);

--
-- Indexes for table `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`payment_method_id`),
  ADD UNIQUE KEY `id_UNIQUE` (`payment_method_id`),
  ADD KEY `fk_payment_cash_on_delivery1_idx` (`cash_on_delivery_id`),
  ADD KEY `fk_payment_online_payment1_idx` (`online_payment_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `fk_product_segment1_idx` (`segment_id`),
  ADD KEY `fk_product_category1_idx` (`category_id`);

--
-- Indexes for table `segment`
--
ALTER TABLE `segment`
  ADD PRIMARY KEY (`segment_id`),
  ADD KEY `fk_segment_category1_idx` (`category_cat_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`),
  ADD KEY `fk_user_user_role1_idx` (`user_role_id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `agent`
--
ALTER TABLE `agent`
  MODIFY `agent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `amout_to_be_deposit`
--
ALTER TABLE `amout_to_be_deposit`
  MODIFY `to_deposit_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cash_on_delivery`
--
ALTER TABLE `cash_on_delivery`
  MODIFY `cash_on_delivery_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `collection_point`
--
ALTER TABLE `collection_point`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `courier_serviceprovider`
--
ALTER TABLE `courier_serviceprovider`
  MODIFY `courier_serviceprovider_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `customer_address`
--
ALTER TABLE `customer_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `delivery_method`
--
ALTER TABLE `delivery_method`
  MODIFY `delivery_method_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `online_payment`
--
ALTER TABLE `online_payment`
  MODIFY `online_payment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `payment_method_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `segment`
--
ALTER TABLE `segment`
  MODIFY `segment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `agent`
--
ALTER TABLE `agent`
  ADD CONSTRAINT `fk_agent_agent_address1` FOREIGN KEY (`agent_address_id`) REFERENCES `agent_address` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_agent_user1` FOREIGN KEY (`user_username`) REFERENCES `user` (`username`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `amout_to_be_deposit`
--
ALTER TABLE `amout_to_be_deposit`
  ADD CONSTRAINT `fk_amout_to_be_deposit_agent1` FOREIGN KEY (`agent_agent_id`) REFERENCES `agent` (`agent_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `collection_point`
--
ALTER TABLE `collection_point`
  ADD CONSTRAINT `fk_collection_point_agent1` FOREIGN KEY (`agent_id`) REFERENCES `agent` (`agent_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `courier`
--
ALTER TABLE `courier`
  ADD CONSTRAINT `fk_courier_courier_serviceprovider1` FOREIGN KEY (`courier_serviceprovider_id`) REFERENCES `courier_serviceprovider` (`courier_serviceprovider_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `fk_customer_address1` FOREIGN KEY (`customer_address_id`) REFERENCES `customer_address` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_customer_user1` FOREIGN KEY (`user_username`) REFERENCES `user` (`username`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `delivery_method`
--
ALTER TABLE `delivery_method`
  ADD CONSTRAINT `fk_delivery_method_collection_point1` FOREIGN KEY (`collection_point_id`) REFERENCES `collection_point` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_delivery_method_courier1` FOREIGN KEY (`courier_id`) REFERENCES `courier` (`courier_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `fk_order_delivery_method1` FOREIGN KEY (`delivery_method_id`) REFERENCES `delivery_method` (`delivery_method_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_order_payment1` FOREIGN KEY (`payment_id`) REFERENCES `payment_method` (`payment_method_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_order_user1` FOREIGN KEY (`user_username`) REFERENCES `user` (`username`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `order_has_product`
--
ALTER TABLE `order_has_product`
  ADD CONSTRAINT `fk_order_has_product_order1` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_order_has_product_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `payment_method`
--
ALTER TABLE `payment_method`
  ADD CONSTRAINT `fk_payment_cash_on_delivery1` FOREIGN KEY (`cash_on_delivery_id`) REFERENCES `cash_on_delivery` (`cash_on_delivery_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_payment_online_payment1` FOREIGN KEY (`online_payment_id`) REFERENCES `online_payment` (`online_payment_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_product_category1` FOREIGN KEY (`category_id`) REFERENCES `category` (`cat_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_product_segment1` FOREIGN KEY (`segment_id`) REFERENCES `segment` (`segment_id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `segment`
--
ALTER TABLE `segment`
  ADD CONSTRAINT `fk_segment_category1` FOREIGN KEY (`category_cat_id`) REFERENCES `category` (`cat_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_user_role1` FOREIGN KEY (`user_role_id`) REFERENCES `user_role` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
