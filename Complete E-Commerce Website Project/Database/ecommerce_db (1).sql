-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2024 at 08:46 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `name` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`name`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_price` varchar(100) NOT NULL,
  `p_description` varchar(255) NOT NULL,
  `p_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `p_name`, `p_price`, `p_description`, `p_img`) VALUES
(9, 'Silver Bracelet', '555', 'Black Nail Polish good Condition', 'HTB1AVBhbA9E3KVjSZFGq6A19XXaG.webp'),
(10, ' Tassel Rhinestone Necklace ', '250', ' Tassel Rhinestone Necklace Imported from America', 'S4da97bcdc2824c1b8a95b6ff94060f27k.webp'),
(11, 'Bridal Tiara', '599', 'Swarovski Crystal Something Blue Opal Floral Leaves Tiara ', '3.webp'),
(12, ' Tassel Rhinestone Necklace', '180', 'Stonefans Luxury Indian Bridal Jewelry  Imported from America', 'S5cb439d44b104365bb1a238d3b302fbbO.webp'),
(13, 'Gold Plated Punk Necklace ', '1200', 'Gold Plated Punk Necklace Men and Women', 'S7e98527d688c4329999568b27deeb43bt.webp'),
(14, 'cute lady bead women necklace', '800', 'Sterling silver new cute lady bead women necklace jewelry', 'He30f83c0f4d047fd995af347ab35371fI.webp'),
(15, 'Long Tassel Necklace ', '899', 'Tassel Necklace Rhinestone Chain ', 'H951d7049adb14e3cb7a506835973c2f2B.jpg'),
(16, ' Sterling silver women Neckles', '679', 'Sterling silver new cute lady bead women necklace ', 'HTB1JLJpbqSs3KVjSZPiq6AsiVXa7.webp'),
(17, 'Sterling Silver Bracelet', '750', 'Sterling Silver Bracelet For Women Doudou Knot Bracelet Design Sense', 'S079ef06dc6814d02ad0399e0c0cfe259l.webp'),
(18, 'Silver Bracelet', '460', 'Silver Bracelet Charms bead', 'H0ae32658331e4925bd92d0241517d6f73.webp'),
(19, 'Rhinestone Necklace Earrings', '460', 'Luxury Indian Bridal Jewelry Sets Women Accessories Fashion Tassel Rhinestone Necklace Earrings ', 'Sacb91222ec7f482d91b1aff35267bd6dZ.webp'),
(20, 'Teardrop Dangle Earrings', '100', 'StoneFans Clip On Rhinestone Crystals Teardrop Dangle Earrings ', 'Hbda466b056d3418eadb5b915b8ebd777M.webp'),
(21, 'Borealis Opal Necklace', '4500', 'This stunning necklace showcases a large, iridescent opal pendant that shifts colors in the light', '6364303b238db42b5930bb63-romantic-eternal-love-knot-figure-eight.jpg'),
(22, 'Silver Bracelet', '889', 'Dangle Earrings Long Statement Chandelier Drop Earrings no pierced for Women', 'H3b85903bc59a4efc86a78f080a5a0c28j.webp'),
(23, 'Rhinestone Crystal Bridal Jewelry', '400', 'Earrings Necklace Wedding Geometric Elegant Romantic Bridesmaid Jewelry Set', 'H279fb521391d4c83ad683ffa409fd31dI.webp'),
(24, 'Diamond Bracelet', '5000', 'Imported Diamond BraceletRhinestone Crystal Bridal Jewelry', 'S4a84b54600854a54b54d293f9bfc647cO.webp');

-- --------------------------------------------------------

--
-- Table structure for table `recommend_products`
--

CREATE TABLE `recommend_products` (
  `id` int(11) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_price` varchar(100) NOT NULL,
  `p_description` varchar(255) NOT NULL,
  `p_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recommend_products`
--

INSERT INTO `recommend_products` (`id`, `p_name`, `p_price`, `p_description`, `p_img`) VALUES
(6, 'Halo Diamond Ring', '5000', 'A captivating piece featuring a central round diamond encircled by a halo of smaller diamonds', '1921352ecc6cb8dea0d7ffd1077917c9.jpg'),
(7, 'Love Infinity Bracelet', '20000', 'Crafted in sterling silver, this bracelet symbolizes everlasting love', '102633304_1024x1024.webp'),
(8, 'Drop Earrings', '577', 'Elegant drop earrings featuring deep blue sapphires set in yellow gold', 'd50568dfbc7847abb125f23700efebfc.webp'),
(9, 'Glamour Pearl Choker', '999', 'A classic pearl choker necklace with a twist, featuring lustrous freshwater pearls strung on a silk ', 'image_2d800d45-c63b-4334-b02a-a22fef79d9e4_1024x1024.webp'),
(10, 'Garden Floral Brooch', '650', 'A whimsical brooch shaped like a blooming flower', 'Rainbow-moonstone-teardrop-pendant-Wildwood-Cornwall--scaled.jpg'),
(11, 'Starlit Night Diamond Cuff', '550', 'A bold statement cuff bracelet encrusted with a constellation of variously sized diamonds ', 'mo-celestial-double-halo-cu-20-f-wg.jpg'),
(12, 'Dream Turquoise Ring', '370', 'A striking ring featuring a large, oval turquoise stone surrounded by intricate silver filigree work', 'Vintage-Pearl-Bridal-Choker5_2048x.jpg'),
(13, 'Elegance Tennis Bracelet', '999', 'A classic tennis bracelet featuring a continuous line of perfectly matched round brilliant diamonds', '2.webp');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'Hafiz Arham', 'hafizarham2006@gmail.com', 'arham123'),
(3, 'Hafiz Arham', 'hafizarham2006@gmail.com', 'arham123'),
(4, 'Muhammad Asif', 'asif1999@gmail.com', 'asif123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recommend_products`
--
ALTER TABLE `recommend_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `recommend_products`
--
ALTER TABLE `recommend_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
