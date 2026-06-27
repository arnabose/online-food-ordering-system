-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 31, 2022 at 07:40 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodians`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(20) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` bigint(13) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `fname`, `lname`, `email`, `phone`, `password`) VALUES
(1, 'Admin', 'A.f.r.r.', 'admin@gmail.com', 987654321, '$2y$10$qoRJcZWxlQReY5AAEAJRk.5PwqU/QDdi8hQrzDLhaFeexKgFSKlRi');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `user_id` int(20) NOT NULL,
  `item_id` int(20) NOT NULL,
  `quantity` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(10) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `category_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `description`, `category_image`) VALUES
(1, 'Burger', 'Explore the varities of burger', '../image/uploads/category/burger-category.jpg'),
(2, 'Pizza', 'Explore the varieties of pizzas', '../image/uploads/category/pizza_category.jpg'),
(3, 'Rolls', 'Explore varieties of rolls', '../image/uploads/category/roll_category.jpg'),
(4, 'Biryani', 'Check out the varieties of biryani', '../image/uploads/category/biryani.jpg'),
(6, 'Noodles', 'Explore the varieties of noodles', '../image/uploads/category/noodle_category.jpg'),
(7, 'Soup', 'Explore the varieties of soups', '../image/uploads/category/soup_category.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` int(20) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `category_id` int(20) NOT NULL,
  `item_description` longtext NOT NULL,
  `price` varchar(20) NOT NULL,
  `item_type` varchar(20) NOT NULL,
  `item_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `item_name`, `category_id`, `item_description`, `price`, `item_type`, `item_image`) VALUES
(1, 'Tandoori Chicken Tikki Burger', 1, 'Made with tandoor chicken tikki, cheese, capsicum, tomato, onion, cabbages, tandoor sauce & herbs.', '159', 'non-veg', '../image/uploads/items/Burger_Tandoori_Chicken_Tikki.jpg'),
(2, 'Veg Cheese Crispy Burger', 1, ' Made with veg patty, vegetables, sauce dressing, cheese & herbs', '149', 'veg', '../image/uploads/items/Burger_Veg_Cheese_Crispy.jpg'),
(3, 'Cheese Bbq Chicken Pizza', 2, 'Bbq chicken pizza made with bbq chicken, onion, pizza cheese & herbs, served with french fries', '220', 'non-veg', '../image/uploads/items/pizza_Cheese_Bbq_Chicken.jpg'),
(4, 'Paneer Special Pizza', 2, 'Paneer, capsicum, tomato, corn, cheese, herbs.', '199', 'veg', '../image/uploads/items/pizza_Paneer_Special.jpg'),
(5, 'Paneer Roll', 3, 'paneer roll with capsicum, onion', '60', 'veg', '../image/uploads/items/Roll_paneer_roll.jpg'),
(6, 'Chicken Roll', 3, 'Lachha chichen roll flavoured with sauces and salad.', '50', 'non-veg', '../image/uploads/items/roll_category.jpg'),
(7, 'Chicken Egg Biryani', 4, 'Biryani Rice+(2 pieces)Chicken+(1 pieces)Egg+Potato', '100', 'non-veg', '../image/uploads/items/Biryani_Chicken_Egg.jpg'),
(10, 'chicken noodles', 6, 'Carrot ,cabbage , sliced chicken sautéed and wok mixed with steam Noodle', '120', 'non-veg', '../image/uploads/items/Szechwan_chicken_noodles.jpg'),
(11, 'Chicken Sweetcorn Soup', 7, 'Silky Smooth Broth Of Chicken Mixed With Sweetcorn And Spices.', '130', 'non-veg', '../image/uploads/items/chicken_sweet_corn_soup.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(255) NOT NULL,
  `user_id` int(25) NOT NULL,
  `item_id` int(25) NOT NULL,
  `quantity` varchar(20) NOT NULL,
  `payment_method` varchar(40) NOT NULL,
  `status` varchar(30) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `item_id`, `quantity`, `payment_method`, `status`, `time`) VALUES
(1, 1, 6, '1', 'Pay on delivery', 'success', '2022-05-30 21:53:49'),
(2, 2, 3, '5', 'Pay on delivery', 'success', '2022-05-31 17:36:13'),
(3, 2, 7, '1', 'Pay on delivery', 'success', '2022-05-31 17:36:13');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `item_id` int(20) NOT NULL,
  `review` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `user_id`, `item_id`, `review`) VALUES
(1, 1, 6, 'Chicken Roll was really delicious.'),
(2, 2, 7, 'very tasty');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `fname`, `lname`, `email`, `mobile`, `address`, `password`) VALUES
(1, 'Arnab', 'Bose', 'arnab@gmail.com', '0987654321', 'durgapur', '$2y$10$U97WGQh7/436d0CyUZlLzOJkSKP/1xxXYBgGdZ39h9D1no4GhPJZq'),
(2, 'ranabir', 'goswami', 'ranabir@gmail.com', '9876543219', 'bankura', '$2y$10$.Ky0rAdOAtz.LZu7HBMSt.xSV5hTU5drOqttLVoMFh/x7m.Q1fIku');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
