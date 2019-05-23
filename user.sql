-- phpMyAdmin SQL Dump
-- version 4.0.10.17
-- https://www.phpmyadmin.net
--
-- Host: myeusql.dur.ac.uk
-- Generation Time: May 23, 2019 at 11:49 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `Xdqrs89_SE2_DUS`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `pic` text NOT NULL,
  `is_manager` int(11) NOT NULL,
  `is_uni_member` int(11) NOT NULL,
  `security_question` varchar(255) NOT NULL,
  `security_answer` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `tel` varchar(50) NOT NULL,
  `address` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `gender`, `pic`, `is_manager`, `is_uni_member`, `security_question`, `security_answer`, `date_of_birth`, `tel`, `address`) VALUES
(1, 'alison1234888', '$2y$10$caGiOUvBZm3Ikk3rliWJdO63fSO0UjgBatHJIP1mry675WEyaFmWS', 'alison@gmail.com', 'Better not to say', '../uploads/12da1ebb0a2a74c51fce390556b0e928.png', 0, 1, '', '', '2019-05-04', '', 'Trevelyan College fafafafafafafa'),
(2, 'joycetest123', '$2y$10$Lcboh1Fn/.MsAzw9/3zvkubmRkXnYsIPYrbd6FlGVx9tt1CGyvGMG', '750787689@qq.com', 'Female', '../uploads/bd62acbc67bc0276b0f76c3d7eb9af84.jpg', 1, 0, '', '', '2019-05-03', '02367097987', 'Trevelyan College'),
(3, 'hahaha123', '$2y$10$DQfZ/PKVK3MmN/2QaEA1Weuu.sQUkE71hXUxn4hOhoGQPszU7FzrG', 'hahaha@yahoo.com', '', '', 0, 1, 'who am i', 'hahaha', '0000-00-00', '', ''),
(6, 'alonglonglongname123', '$2y$10$u39NEKG7ffT538WR9bDff.R307W2.lyirGX6hr6P81QqjuTFTe8Tu', '123@hotmail.com', '', '', 0, 1, 'jkl', 'jkl', '0000-00-00', '', ''),
(7, 'alison', 'SoEpNFtBzwvdU', 'oheyheyheywang@gmail.com', '', '', 0, 1, '123', '123', '0000-00-00', '', ''),
(8, 'team2', 'HGo61LqxPuvbc', 'oheyheyhey@hotmail.com', '', '', 0, 1, '123', '123', '0000-00-00', '', ''),
(12, 'test123', '1', 'abcde@hotmail.com', '', '', 1, 1, '123', '123', '0000-00-00', '', ''),
(13, 'chang', 'gdSlrylUiLegw', 'tcjsmw@live.com', '', '', 0, 1, 'qq', 'qq', '0000-00-00', '', ''),
(14, 'Faith', 'udBXXvxzMpcRc', 'faithnyarie@gmail.com', '', '', 0, 1, 'What is my pet''s name?', 'Yash', '0000-00-00', '', ''),
(16, 'Zoe', 'YDY2fRFtiJ806', 'zoe@gmail.com', 'Female', '../uploads/0b2c2c82b0521c030f249b593ccb6347.jpg', 0, 1, 'who am I?', 'zoe', '2019-05-02', '02367097987', 'Trevelyan College'),
(18, '123', '$2y$10$NFwq9hXAusSVmce8msXofOv4h2dt3klVP.hmT76mpeHAKgDTdQBRu', 'abcd@gmail.com', '', '', 0, 1, '123', '123', '0000-00-00', '', ''),
(19, 'test1234', 'p3TQwjclNd1CY', 'systemdev12013@gmail.com', 'Female', '', 0, 0, 'WHO AM I', 'FAITH', '2019-05-24', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
