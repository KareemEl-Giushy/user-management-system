-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2020 at 05:19 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_user_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `token` varchar(100) NOT NULL,
  `token_expire` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `verify` tinyint(1) NOT NULL DEFAULT 0,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `phone`, `gender`, `dob`, `photo`, `token`, `token_expire`, `created_at`, `verify`, `deleted`) VALUES
(1, 'kareem', 'kareem', 'kemoo.640123@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', '', '', '', '', '', '2020-10-01 15:39:44', '2020-10-01 15:39:44', 0, 0),
(2, 'kareem', 'kareem', 'kemoo.64123@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', '', '', '', '', '', '2020-10-01 15:39:48', '2020-10-01 15:39:48', 0, 0),
(3, 'kareem', 'kareem', 'ahmedsalem.64123@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', '', '', '', '', '', '2020-10-01 15:39:52', '2020-10-01 15:39:52', 0, 0),
(4, 'kareem', 'console.log(&#39;hacked&#39;)', 'ahmedsalem.640123@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', '', '', '', '', '', '2020-10-01 15:40:54', '2020-10-01 15:40:54', 0, 0),
(5, 'kareem', 'console.log(&#39;hacked&#39;)', 'ahmedsalem.6400123@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', '', '', '', '', '', '2020-10-01 15:41:07', '2020-10-01 15:41:07', 0, 0),
(6, 'kareem', 'console.log(&#39;hacked&#39;)', 'ahmedsalema.64123@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', '', '', '', '', '', '2020-10-01 15:42:21', '2020-10-01 15:42:21', 0, 0),
(7, 'kareem', 'adsf', 'kareem.64123@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', '', '', '', '', '', '2020-10-01 15:53:02', '2020-10-01 15:53:02', 0, 0),
(8, 'kareem', 'adsf', 'kwm.64123@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', '', '', '', '', '', '2020-10-01 15:53:47', '2020-10-01 15:53:47', 0, 0),
(9, 'kareem', 'console.log(&#39;hacked&#39;)', 's.64123@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', '', '', '', '', '', '2020-10-01 15:54:16', '2020-10-01 15:54:16', 0, 0);

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
