-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2020 at 01:34 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_dating`
--

-- --------------------------------------------------------

--
-- Table structure for table `le_chat`
--

CREATE TABLE `le_chat` (
  `chat_id` int(20) NOT NULL,
  `chat_sender_id` int(11) NOT NULL,
  `chat_receiver_id` int(11) NOT NULL,
  `chat_msg` text NOT NULL,
  `chat_seen_status` tinyint(2) NOT NULL,
  `chat_status` tinyint(2) DEFAULT '1',
  `chat_message_createdon` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `le_chat`
--

INSERT INTO `le_chat` (`chat_id`, `chat_sender_id`, `chat_receiver_id`, `chat_msg`, `chat_seen_status`, `chat_status`, `chat_message_createdon`) VALUES
(41, 1, 2, 'Hello', 0, 1, '2020-08-15 01:10:04'),
(42, 1, 2, 'there?', 0, 1, '2020-08-26 06:27:40'),
(44, 1, 2, ':@', 0, 1, '2020-08-26 06:47:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `le_chat`
--
ALTER TABLE `le_chat`
  ADD PRIMARY KEY (`chat_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `le_chat`
--
ALTER TABLE `le_chat`
  MODIFY `chat_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
