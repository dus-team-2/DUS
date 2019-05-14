-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2019-05-13 16:10:12
-- 服务器版本： 10.1.37-MariaDB
-- PHP 版本： 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `dus`
--

-- --------------------------------------------------------

--
-- 表的结构 `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `facility` varchar(255) NOT NULL,
  `week` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `booking`
--

INSERT INTO `booking` (`id`, `facility`, `week`, `time`, `price`, `user`) VALUES
(20, 'gym', 'Monday', 8, 100, 'a123'),
(21, 'gym', 'Monday', 8, 100, 'a123'),
(22, 'gym', 'Monday', 8, 100, 'a123'),
(23, 'gym', 'Monday', 8, 100, 'a123'),
(24, 'gym', 'Monday', 8, 100, 'a123'),
(25, 'gym', 'Monday', 8, 100, 'a123'),
(26, 'gym', 'Tuesday', 9, 100, 'a123'),
(27, ' football', 'Monday', 8, 300, 'a123'),
(28, 'gym', 'Monday', 11, 100, 'a123'),
(29, 'gym', 'Monday', 12, 100, 'a123'),
(30, 'gym', 'Tuesday', 8, 100, 'a123');

-- --------------------------------------------------------

--
-- 表的结构 `booking_facility`
--

CREATE TABLE `booking_facility` (
  `booking_id` int(11) NOT NULL,
  `facility_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `booking_facility`
--

INSERT INTO `booking_facility` (`booking_id`, `facility_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(3, 3);

-- --------------------------------------------------------

--
-- 表的结构 `booking_timeslot`
--

CREATE TABLE `booking_timeslot` (
  `booking_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `slot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `booking_timeslot`
--

INSERT INTO `booking_timeslot` (`booking_id`, `date`, `slot`) VALUES
(2, '0000-00-00', 8),
(2, '0000-00-00', 11),
(1, '0000-00-00', 8),
(2, '0000-00-00', 15),
(2, '0000-00-00', 16);

-- --------------------------------------------------------

--
-- 表的结构 `facility`
--

CREATE TABLE `facility` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `capacity` int(11) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `contact_tel` varchar(255) NOT NULL,
  `contact_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `facility`
--

INSERT INTO `facility` (`id`, `name`, `description`, `price`, `capacity`, `contact_email`, `contact_tel`, `contact_address`) VALUES
(1, 'gym', '', 100, 6, '', '', ''),
(2, ' football', '', 300, 12, '', '', ''),
(3, 'basketball', 'something not impotant something not impotantsomething not impotantsomething not impotantsomething not impotantsomething not impotantsomething not impotantsomething not impotantsomething not impotantsomething not impotantsomething not impotantsomething not impotantsomething not impotant', 0, 48, '', '', ''),
(4, 'badminton', 'joyce\"s facility yayyyy', 0, 120, '', '', '');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `id` int(50) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `student` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `pic` text NOT NULL,
  `is_manager` int(11) NOT NULL,
  `is_uni_member` int(11) NOT NULL,
  `security_question` varchar(255) NOT NULL,
  `security_answer` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `tel` varchar(50) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `student`, `email`, `gender`, `pic`, `is_manager`, `is_uni_member`, `security_question`, `security_answer`, `date_of_birth`, `tel`, `address`) VALUES
(1, 'alison111122', '1MvwBBHK6Cz9c', 0, 'alison@gmail.com', 'Better not to say', '../uploads/e0b4a07bccd49821230e91e17abfefdf.png', 0, 0, '', '', '2019-05-09', '02367097987', 'Trevelyan College fafafafafafafa'),
(2, 'joycetest123', '$2y$10$2u18pZzMR.31l4pEGvFlt.8Y20ffBSz528wdkShFa5/Wf/vM2dO3S', 0, 'joyce@hotmail.com', '', '', 1, 0, '', '', '0000-00-00', '', ''),
(3, 'hahaha123', '$2y$10$DQfZ/PKVK3MmN/2QaEA1Weuu.sQUkE71hXUxn4hOhoGQPszU7FzrG', 0, 'hahaha@yahoo.com', '', '', 0, 1, 'who am i', 'hahaha', '0000-00-00', '', ''),
(6, 'alonglonglongname123', '$2y$10$u39NEKG7ffT538WR9bDff.R307W2.lyirGX6hr6P81QqjuTFTe8Tu', 0, '123@hotmail.com', '', '', 0, 1, 'jkl', 'jkl', '0000-00-00', '', ''),
(7, 'a123', '123', 1, 'alison@gmail.com', 'Better not to say', '../uploads/e0b4a07bccd49821230e91e17abfefdf.png', 0, 0, '', '', '2019-05-09', '02367097987', 'Trevelyan College fafafafafafafa');

-- --------------------------------------------------------

--
-- 表的结构 `user_booking`
--

CREATE TABLE `user_booking` (
  `user_id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `user_booking`
--

INSERT INTO `user_booking` (`user_id`, `booking_id`) VALUES
(1, 1),
(1, 2);

--
-- 转储表的索引
--

--
-- 表的索引 `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `facility`
--
ALTER TABLE `facility`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
