-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 07, 2024 at 01:24 PM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uni10marathon`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrators`
--

DROP TABLE IF EXISTS `administrators`;
CREATE TABLE IF NOT EXISTS `administrators` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `administrators`
--

INSERT INTO `administrators` (`id`, `username`, `email`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category_name` varchar(50) NOT NULL,
  `distance` float NOT NULL,
  `type` varchar(50) NOT NULL,
  `fo_time` varchar(10) NOT NULL,
  `co_time` varchar(10) NOT NULL,
  `description` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `min_age` int DEFAULT NULL,
  `price` int NOT NULL,
  `quota` int DEFAULT NULL,
  `current_participants` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `distance`, `type`, `fo_time`, `co_time`, `description`, `min_age`, `price`, `quota`, `current_participants`) VALUES
(1, 'Full Marathon', 42.2, 'Competitive', '04:30am', '7 hours 15', '', 18, 220, 150, 0),
(2, 'Half Marathon', 21.1, 'Competitive', '04.30am', '4 hours', 'Experience the pulse of Kuala Lumpur in our Half Marathon. Navigate 21.1 kilometers of the city\'s dynamic terrain, offering a mix of urban challenges and scenic delights. Your journey unfolds amidst the vibrant energy of Kuala Lumpur\'s heart.', 18, 150, 150, 0),
(3, '5KM Fun Run', 5, 'Fun Run', '07:00am', '1 hour 30 ', '', 16, 50, 200, 0),
(4, 'Family Charity Run', 3, 'Fun Run', '07:30am', 'None', 'Share the joy of movement in our Family Charity Run, tailor-made for families and elderlies alike. A shorter course filled with laughter and camaraderie, it\'s a family-friendly experience weaving through the heartwarming tapestry of Kuala Lumpur\'s diverse streets.', 1, 10, 1000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `participants`
--

DROP TABLE IF EXISTS `participants`;
CREATE TABLE IF NOT EXISTS `participants` (
  `id` int NOT NULL AUTO_INCREMENT,
  `full_name` varchar(100) NOT NULL,
  `ic` varchar(12) NOT NULL,
  `password` varchar(20) NOT NULL,
  `age` int NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(300) NOT NULL,
  `phone` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ic` (`ic`,`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `participants`
--

INSERT INTO `participants` (`id`, `full_name`, `ic`, `password`, `age`, `email`, `address`, `phone`) VALUES
(4, 'Musab Salihin Bin Mustaffa', '010905040277', '123456', 22, 'musabsalihin242@gmail.com', '3, Jalan Desa Duyong 2B, Taman Desa Duyong, 75460 Melaka', '01137540201');

-- --------------------------------------------------------

--
-- Table structure for table `registered_participants`
--

DROP TABLE IF EXISTS `registered_participants`;
CREATE TABLE IF NOT EXISTS `registered_participants` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category_id` int NOT NULL,
  `participant_ic` varchar(12) NOT NULL,
  `paid` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `rp_FK_1` (`category_id`),
  KEY `rp_FK_2` (`participant_ic`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `registered_participants`
--
ALTER TABLE `registered_participants`
  ADD CONSTRAINT `rp_FK_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rp_FK_2` FOREIGN KEY (`participant_ic`) REFERENCES `participants` (`ic`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
