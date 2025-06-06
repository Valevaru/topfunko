-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 06, 2025 at 08:04 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `funkopop`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `total_price` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_name`, `email`, `address`, `phone`, `notes`, `total_price`, `created_at`) VALUES
(1, 'charis michas', 'charis@michas.gr', 'micha 5', '6984534057', '', 19.15, '2025-06-06 02:53:38'),
(2, 'paris paris', 'paris@paris.gr', 'paris 5', '1234567890', '', 54.95, '2025-06-06 17:53:08'),
(3, 'paris paris', 'paris@paris.gr', 'paris 5', '1234567890', '', 15.19, '2025-06-06 17:53:45');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `price`) VALUES
(1, 1, 8, 1, 19.15),
(2, 2, 7, 1, 18.36),
(3, 2, 8, 1, 19.15),
(4, 2, 9, 1, 17.44),
(5, 3, 10, 1, 15.19);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `price`, `image`, `category`) VALUES
(7, 'Joker', 'Συλλεκτικό FunkoPop: Joker από τη σειρά Dc.', 18.36, 'dc/joker.png', 'Dc'),
(8, 'Quinn', 'Συλλεκτικό FunkoPop: Quinn από τη σειρά Dc.', 19.15, 'dc/quinn.png', 'Dc'),
(9, 'Twoface', 'Συλλεκτικό FunkoPop: Twoface από τη σειρά Dc.', 17.44, 'dc/twoface.png', 'Dc'),
(10, 'Frieza', 'Συλλεκτικό FunkoPop: Frieza από τη σειρά Dragonballz.', 15.19, 'dragonballz/frieza.png', 'Dragonballz'),
(11, 'Goku', 'Συλλεκτικό FunkoPop: Goku από τη σειρά Dragonballz.', 17.65, 'dragonballz/goku.png', 'Dragonballz'),
(12, 'Vegeta', 'Συλλεκτικό FunkoPop: Vegeta από τη σειρά Dragonballz.', 16.85, 'dragonballz/vegeta.png', 'Dragonballz'),
(13, 'Irulan', 'Συλλεκτικό FunkoPop: Irulan από τη σειρά Dune.', 10.29, 'dune/irulan.png', 'Dune'),
(14, 'Paul', 'Συλλεκτικό FunkoPop: Paul από τη σειρά Dune.', 17.70, 'dune/paul.png', 'Dune'),
(15, 'Stilgar', 'Συλλεκτικό FunkoPop: Stilgar από τη σειρά Dune.', 13.31, 'dune/stilgar.png', 'Dune'),
(16, 'Bugs', 'Συλλεκτικό FunkoPop: Bugs από τη σειρά Looney.', 18.32, 'looney/bugs.png', 'Looney'),
(17, 'Marvin', 'Συλλεκτικό FunkoPop: Marvin από τη σειρά Looney.', 13.48, 'looney/marvin.png', 'Looney'),
(18, 'Sylvester', 'Συλλεκτικό FunkoPop: Sylvester από τη σειρά Looney.', 15.90, 'looney/sylvester.png', 'Looney'),
(19, 'Captainamerica', 'Συλλεκτικό FunkoPop: Captainamerica από τη σειρά Marvel.', 16.00, 'marvel/captainamerica.png', 'Marvel'),
(20, 'Daredevil', 'Συλλεκτικό FunkoPop: Daredevil από τη σειρά Marvel.', 15.05, 'marvel/daredevil.png', 'Marvel'),
(21, 'Deadpool', 'Συλλεκτικό FunkoPop: Deadpool από τη σειρά Marvel.', 11.18, 'marvel/deadpool.png', 'Marvel'),
(22, 'Ace', 'Συλλεκτικό FunkoPop: Ace από τη σειρά Onepiece.', 17.13, 'onepiece/ace.png', 'Onepiece'),
(23, 'Luffy', 'Συλλεκτικό FunkoPop: Luffy από τη σειρά Onepiece.', 14.57, 'onepiece/luffy.png', 'Onepiece'),
(24, 'Zoro', 'Συλλεκτικό FunkoPop: Zoro από τη σειρά Onepiece.', 19.43, 'onepiece/zoro.png', 'Onepiece'),
(25, 'Carl', 'Συλλεκτικό FunkoPop: Carl από τη σειρά Pixar.', 19.86, 'pixar/carl.png', 'Pixar'),
(26, 'Russell', 'Συλλεκτικό FunkoPop: Russell από τη σειρά Pixar.', 17.78, 'pixar/russell.png', 'Pixar'),
(27, 'Walle', 'Συλλεκτικό FunkoPop: Walle από τη σειρά Pixar.', 11.58, 'pixar/walle.png', 'Pixar'),
(28, 'Homer', 'Συλλεκτικό FunkoPop: Homer από τη σειρά Simpsons.', 16.36, 'simpsons/homer.png', 'Simpsons'),
(29, 'Hugo', 'Συλλεκτικό FunkoPop: Hugo από τη σειρά Simpsons.', 18.33, 'simpsons/hugo.png', 'Simpsons'),
(30, 'Marge', 'Συλλεκτικό FunkoPop: Marge από τη σειρά Simpsons.', 10.86, 'simpsons/marge.png', 'Simpsons'),
(31, 'Anubis', 'Συλλεκτικό FunkoPop: Anubis από τη σειρά Stargate.', 18.25, 'stargate/anubis.png', 'Stargate'),
(32, 'Daniel', 'Συλλεκτικό FunkoPop: Daniel από τη σειρά Stargate.', 14.22, 'stargate/daniel.png', 'Stargate'),
(33, 'Jack', 'Συλλεκτικό FunkoPop: Jack από τη σειρά Stargate.', 12.39, 'stargate/jack.png', 'Stargate'),
(34, 'Ahsoka', 'Συλλεκτικό FunkoPop: Ahsoka από τη σειρά Starwars.', 12.69, 'starwars/ahsoka.png', 'Starwars'),
(35, 'Armorer', 'Συλλεκτικό FunkoPop: Armorer από τη σειρά Starwars.', 16.72, 'starwars/armorer.png', 'Starwars'),
(36, 'Bokatan', 'Συλλεκτικό FunkoPop: Bokatan από τη σειρά Starwars.', 18.91, 'starwars/bokatan.png', 'Starwars'),
(37, 'Bumble', 'Συλλεκτικό FunkoPop: Bumble από τη σειρά Transformers.', 13.63, 'transformers/bumble.png', 'Transformers'),
(38, 'Megatron', 'Συλλεκτικό FunkoPop: Megatron από τη σειρά Transformers.', 14.48, 'transformers/megatron.png', 'Transformers'),
(39, 'Optimus', 'Συλλεκτικό FunkoPop: Optimus από τη σειρά Transformers.', 13.94, 'transformers/optimus.png', 'Transformers'),
(40, 'Casey', 'Συλλεκτικό FunkoPop: Casey από τη σειρά Turtles.', 15.35, 'turtles/casey.png', 'Turtles'),
(41, 'Oneil', 'Συλλεκτικό FunkoPop: Oneil από τη σειρά Turtles.', 14.08, 'turtles/oneil.png', 'Turtles'),
(42, 'Shredder', 'Συλλεκτικό FunkoPop: Shredder από τη σειρά Turtles.', 17.61, 'turtles/shredder.png', 'Turtles');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `surname` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `password`) VALUES
(1, 'John Doe', NULL, 'john@example.com', 'pass123'),
(2, 'Maria Papadopoulou', NULL, 'maria@example.com', 'securepass1'),
(7, 'charis', 'michas', 'charis@michas.com', '$2y$10$hkKd3F20wYa0D3KOmjWn5.DZKlPkpO73Xhj5k3fKWD4Otwd0LdCSW'),
(8, 'nikos', 'nikou', 'nikos@nikou.gr', '$2y$10$ISCoP0y1znZP93gIgf.l2.mb/gfE/eSP32TdZtAJLpAbhXE6NUVji'),
(9, 'paris', 'paris', 'paris@paris.gr', '$2y$10$UgUxeN.s6WGOKtzLBlSHl.SPx2iQ1t34sp1pBibeF7pv6OuGwjRgO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
