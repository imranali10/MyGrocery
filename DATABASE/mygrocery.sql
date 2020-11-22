-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2020 at 07:25 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mygrocery`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `email`, `password`, `question`, `answer`, `mobile`, `address`, `Date`) VALUES
(1, '', 'yashkarekar23@gmail.com', '$2y$12$ROnJlofHwn4aQGY6PlN6Jeq5QP9wUSG417fT6Lj.inymmPvAngCbK', 'What was your first car?', 'Wagnor', '', '', '2020-08-24 05:11:10'),
(4, 'shriyash', 'shriyash22@gmail.com', '$2y$12$LVNkSwBHmINt0SfL738cOuwklOkQDyA2INr7aPDRDdAMU61iORaC2', 'What is the name of the town where you were born?', 'cnkwj', '23233333232', 'wkjdncjdk', '2020-11-15 10:00:47');

-- --------------------------------------------------------

--
-- Table structure for table `accounts_admin`
--

CREATE TABLE `accounts_admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts_admin`
--

INSERT INTO `accounts_admin` (`id`, `name`, `email`, `password`, `Date`) VALUES
(5, 'SHRIYASH', 'admin@gmail.com', '$2y$12$TfifcFooY05KZuTQICKrjO4/OjzKkXXieBC1dVp89.BBbhxoM/1rK', '2020-11-22 16:15:38');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `login_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `login_id`, `product_id`, `total`, `Date`) VALUES
(1, 3, 3, 0, '2020-11-15 09:03:03'),
(2, 3, 11, 0, '2020-11-15 09:03:24'),
(3, 3, 7, 0, '2020-11-15 09:07:44'),
(4, 3, 7, 0, '2020-11-15 09:08:39'),
(5, 3, 7, 0, '2020-11-15 09:11:18'),
(6, 3, 7, 0, '2020-11-15 09:11:37'),
(7, 3, 7, 0, '2020-11-15 09:12:29'),
(8, 3, 3, 0, '2020-11-15 09:15:13'),
(9, 3, 3, 0, '2020-11-15 09:45:30'),
(20, 4, 7, 0, '2020-11-22 10:20:05'),
(31, 4, 6, 0, '2020-11-22 12:52:30'),
(32, 1, 14, 0, '2020-11-22 14:49:35'),
(33, 1, 10, 0, '2020-11-22 14:50:16'),
(34, 1, 13, 0, '2020-11-22 14:50:31');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` text NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_des` text NOT NULL,
  `product_category` varchar(255) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_image`, `product_price`, `product_des`, `product_category`, `Date`) VALUES
(15, 'Maggie', 'maggie.jpg', '10', 'Discover exciting MAGGI Noodle Recipes with Egg, Cheese, Paneer & Chicken and a wide variety of Quick & Easy Lunch, Dinner, Breakfast and Snack Recipes', 'Grocery &amp; Staples', '2020-11-22 13:33:58'),
(16, 'Dates', 'Dates.jpg', '140/500 gm', 'Lion deseeded dates are rich in calcium, sulphur, iron , manganese, magnesium, fiber, amino acids etc.', 'Grocery &amp; Staples', '2020-11-22 17:23:25'),
(17, 'Black Pepper', 'Kali mirchi.jpg', '35', 'Black Pepper is one of the most commonly used seasoning ingredients, and good for your health in many ways Spices are the secret ingredients that can make up any taste or ruin it. Spices can give any meal, the taste you desire and no one will ever know what magic you did with your dishes. Black pepper known for its salty and tangy taste, is found on the counter of every kitchen, be it a home or a restaurant. These spices add a tangy and spicy taste to the meal, making your dish relishing and more appetizing', 'Grocery &amp; Staples', '2020-11-22 17:26:10'),
(18, 'Akha Urad', '70011701022883.jpg', '71/kg', 'Urad also rich in fibre which it easy to digest. Consuming urad help to reduce cholesterol and improve cardiovascular health. Urad whole which is very popular in north India as black/kali dal and in south india it is an important ingredient in most of their staple foods like idaly, dossa, vada etc.', 'Grocery &amp; Staples', '2020-11-22 17:27:05'),
(19, 'Catch Sprinkler Salt', '60011701010080.jpg', '22', 'Catch Table Iodized Salt has get the premium quality and superior stuffs. The cleanliness and hygienic iodized salt has developed into the greatest choice of all kitchens at present. The easily and smooth dissolved salt has been pioneered by the well-known brand Catch. The very well crystal cube structured of Catch salt proves the cleanliness of it', 'Grocery &amp; Staples', '2020-11-22 17:29:01'),
(20, 'Nivea Deep Moisture Serum Body', 'nivea.jpg', '349/kg', 'Not actual image. While we get more information for you, please contact retailer in meantime for any product related information', 'Personal Care', '2020-11-22 17:31:29'),
(21, 'Fair &amp; Lovely Sun Protect SPF3', 'fair.jpg', '72', 'Not actual image. While we get more information for you, please contact retailer in meantime for any product related information', 'Personal Care', '2020-11-22 17:33:16'),
(22, 'Vaseline Cocoa Butter Skin Pro', 'vas.jpg', '66', 'EEvery summer, we worry about the sun robbing us of our fairness. Not Anymore! Now get unbeatable fairness for up to 5 hours in the sun with Fair and Lovely Advanced Multi vitamins SPF 15. Its revolutionary multi-vitamin formula gives your treatment-like fairness and SPF 15 protects it for up to 5 hours in the sun.Fair and Lovely Advanced Multi Vitamin cream works like a face polish treatment, which often used to treat sun tanning. The SPF 15 Fair and Lovely Advanced Multi Vitamin product targets suntan both by preventing the skin from tanning and reducing the excess pigmentation. For the best results, apply it two to three times a day, especiall', 'Personal Care', '2020-11-22 17:33:56'),
(23, 'Gillette Series 3x Protection', '3x.jpg', '285', 'Shaving Foam with rich lather that helps protect the skin while shaving\r\n', 'Personal Care', '2020-11-22 17:35:00'),
(24, 'Javari', '70011701022638_1.jpg', '60/kg', 'Not actual image. While we get more information for you, please contact retailer in meantime for any product related information\r\n\r\n', 'Grocery &amp; Staples', '2020-11-22 17:40:07'),
(25, 'India Gate Basmati Rice', 'bas.jpg', '150/kg', 'India gate basmati rice which gives you the traditional taste of India it embodies all the characteristics of a true basmati rice grain.', 'Grocery &amp; Staples', '2020-11-22 17:45:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `accounts_admin`
--
ALTER TABLE `accounts_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `accounts_admin`
--
ALTER TABLE `accounts_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
