-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 02, 2022 at 04:07 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `name`, `image`, `price`) VALUES
(1, 'ข้าวผัดกระเพรา', 'https://img.wongnai.com/p/1920x0/2020/09/01/67ba09fcb72845bc81fd413036e3f4eb.jpg', '40'),
(2, 'ข้าวผัด', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQZ_oYrpgKy1zCJN3F88D2cmA_ULheSW_S4C7ivbdesdwUZjIknfazc8kMXcDY94YWDO1U&usqp=CAU', '40'),
(3, 'ต้มยำ', 'https://food.mthai.com/app/uploads/2016/10/Tomyum.jpg', '35'),
(4, 'ข้าวสวย', 'https://inwfile.com/s-de/wmeigv.jpg', '10'),
(5, 'น้ำเปล่า', 'https://www.brighttv.co.th/wp-content/uploads/2018/10/CT.jpg', '15'),
(6, 'น้ำเเข็ง', 'https://image.makewebeasy.net/makeweb/0/Ol7yM39VO/DefaultData/ice_1__1.jpg', '5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
