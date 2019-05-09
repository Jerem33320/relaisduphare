-- phpMyAdmin SQL Dump
-- version 5.0.0-dev
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 09, 2019 at 09:43 AM
-- Server version: 10.3.11-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `relais-du-phare`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(45) NOT NULL,
  `arrival` date NOT NULL,
  `departure` date NOT NULL,
  `customer_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `adults_count` int(11) NOT NULL,
  `children_count` int(11) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contact_message`
--

CREATE TABLE `contact_message` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `message` text NOT NULL,
  `sent_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(45) NOT NULL,
  `lastName` varchar(60) NOT NULL,
  `firstName` varchar(60) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `id` int(11) NOT NULL,
  `type` int(11) DEFAULT NULL,
  `description` text NOT NULL,
  `bed` varchar(30) NOT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`name`, `slug`, `id`, `type`, `description`, `bed`, `cover`, `price`, `createdAt`, `updatedAt`) VALUES
('Ecume', 'ecume', 1, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam quos quisquam a amet? Explicabo consequuntur temporibus nihil in, fuga labore incidunt totam voluptatem laboriosam. Blanditiis laborum dolorum cupiditate odio possimus.', 'queen-size', 'img_1.jpg', 98, '2019-04-08 00:15:15', NULL),
('Marée haute', 'maree-haute', 2, 1, 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptate porro temporibus itaque vel obcaecati unde reprehenderit laborum quas, ipsam delectus eos fugiat, eaque neque, at voluptatem voluptatibus iure maxime pariatur praesentium consectetur et harum. Quas maxime saepe doloribus recusandae inventore repellat cupiditate deserunt nostrum fugiat reiciendis id molestias, temporibus rerum provident corrupti aliquid neque fuga accusamus ex doloremque aspernatur ipsa.', 'queen-size', 'img_2.jpg', 120, '2019-04-08 00:15:15', NULL),
('Cabine', 'cabine', 3, 1, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. At esse dolorem saepe earum quae? Est, exercitationem doloribus porro harum voluptatum quae reprehenderit fuga itaque laudantium odio soluta facere minima in, fugit perspiciatis illum! Quisquam ipsa maxime iure. Excepturi, tempora possimus?', 'queen-size', 'img_3.jpg', 130, '2019-04-08 00:15:15', NULL),
('Sable', 'sable', 4, 2, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi corporis dolorum at nobis facilis adipisci id corrupti veniam, suscipit natus debitis minus velit aliquid, sunt nam temporibus reprehenderit voluptate officiis!', 'king-size', 'slider-5.jpg', 150, '2019-04-08 00:15:15', NULL),
('Vigie', 'vigie', 5, 2, 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Fugiat animi eius harum impedit nesciunt perferendis rerum, nemo tenetur sint voluptas odit aut dolor nam saepe, praesentium totam provident excepturi velit!', 'king-size', 'slider-7.jpg', 170, '2019-04-08 00:15:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `room_type`
--

CREATE TABLE `room_type` (
  `id` int(11) NOT NULL,
  `label` varchar(45) NOT NULL,
  `description` text NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_type`
--

INSERT INTO `room_type` (`id`, `label`, `description`, `createdAt`, `updatedAt`) VALUES
(1, 'standard', 'Nos chambres standard sont spacieuses et lumineuses. \r\n\r\n', '2019-04-09 11:12:29', NULL),
(2, 'premium', 'Un séjour luxueux dans nos chambres premium vous garantira un moment inoubliable...', '2019-04-09 11:12:29', NULL),
(4, 'dortoir', '', '2019-04-10 09:43:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `temoignages`
--

CREATE TABLE `temoignages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mark` tinyint(4) NOT NULL DEFAULT 5,
  `content` text NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `temoignages`
--

INSERT INTO `temoignages` (`id`, `name`, `email`, `mark`, `content`, `createdAt`, `updatedAt`) VALUES
(1, 'Jeanine', 'pierre123123123@mail.com', 1, 'Séjour moyen, personnel désagrable au possible, et en plus il y avait un cheveu dans mon croissant... Sympa...\r\n\r\nEnfin, la vue est belle en tout cas...', '2019-04-07 23:59:34', '2019-04-16 21:52:07'),
(3, 'Paul', 'pierre12312sdf123@mail.com', 4, 'Très bon séjour, nous avons apprécié notre chambre et les conseils du personnel aux petits soins pour nous. La région est magnifique, et on reviendra surement !\r\n\r\nMerci Relais du Pahre', '2019-04-07 23:59:34', '2019-04-16 21:52:21'),
(4, 'Pierre', 'pierre1231sdfv23123@mail.com', 5, 'C\'etait vraiment génial !!!!\r\nSuper hôtel, super ptit dèj, au top!', '2019-04-07 23:59:34', '2019-04-16 21:53:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `contact_message`
--
ALTER TABLE `contact_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `fk_room_type_id` (`type`);

--
-- Indexes for table `room_type`
--
ALTER TABLE `room_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temoignages`
--
ALTER TABLE `temoignages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `testimony_email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(45) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_message`
--
ALTER TABLE `contact_message`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `room_type`
--
ALTER TABLE `room_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `temoignages`
--
ALTER TABLE `temoignages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `room_id` FOREIGN KEY (`room_id`) REFERENCES `room` (`id`);

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `fk_room_type_id` FOREIGN KEY (`type`) REFERENCES `room_type` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
