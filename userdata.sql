-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017 年 6 朁E27 日 11:02
-- サーバのバージョン： 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `karori-keisan-system`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `userdata`
--

CREATE TABLE `userdata` (
  `name` varchar(20) CHARACTER SET utf8 NOT NULL,
  `password` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `height` varchar(10) NOT NULL,
  `weight` varchar(10) NOT NULL DEFAULT '60',
  `id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- テーブルのデータのダンプ `userdata`
--

INSERT INTO `userdata` (`name`, `password`, `gender`, `height`, `weight`, `id`) VALUES
('test', '$2y$10$71vZJo9wrAcfCwB8VSTcEOgxtaFTRgJ5Mca15Fufy64MF/MV9XHCq', '1', '170', '', 1),
('test2', '$2y$10$LKKramlrX0YWmfL48JGXOuCPuHjpbSvco5ziVasjCofcg7jS7bXLG', '2', '160', '50', 2),
('aaa', '$2y$10$i78ZMB72Lk/GMPW6C50mMOJ3VM50wHk1a9NTv697KdeXUErJlmsqC', '1', '170', '60', 3),
('aaaaaa', '$2y$10$x.FUVRTshNx1dphHhHpTM.zCWbUyLdqbiKuCNB3TqNWe9sGr8nc/O', '1', '180', '70', 4),
('kazushi', '$2y$10$v6Bq3kq9kkBHIyFRP4xlP.ne4At40haIuINtFuRm/aKuREO4LVWTK', '1', '200', '30', 5),
('???', '$2y$10$cpmzOR.SWG2oHSWLdhMtuO0IghkvSfmbkXQydTm1bXvtfwPirp3Z2', '1', '170', '60', 6),
('てすてす', '$2y$10$WaU2VlUUIkDo6SeEXFPXb.78SHpupqJMKGC857sBHyAretr9eq47K', '2', '160', '50', 7),
('テスト2', '$2y$10$Z18nLK.KcoI7wrdNuD4MUuZdVKFqYOToGErNOuAY4Xtw7SddSOyO.', '1', '170', '60', 8),
('tsts', '$2y$10$AqGKA21KZ24f1VH83SMbfOLaKz8bw9NEdEYdo.3pKtFquZSBoOFhC', '1', '170', '60', 9),
('yabuki', '$2y$10$NEKOuEVJd9fcPuBJnkqgZ.auv0hjPFOzDsItnFr7ZVq1R04VBkHoC', '1', '10', '10', 10),
('hu', '$2y$10$Tp.aojDbxA5dj1Uzz7S0Kux9/K19loIodwguh/xRkuus0DbYyX4cO', '1', '200', '80', 11),
('katu', '$2y$10$YF3Zfl1.2AB7hV2aiTzalenWmER8DH9Lm1ephDUwXnlAGsqcqvKSi', '1', '200', '80', 12),
('フォレスト', '$2y$10$poQk9EmMkRl/gtsfdLs0TOmRHNc/l8tmtWOs4zzB0DG1jeDIkcxfO', '1', '180', '60', 13),
('あああ', '$2y$10$lnf1bWYR39igRdUD30Y5DeOTvHIK/hPpOYLGQ/iJr/vtPIIIOn6Hq', '1', '180', '180', 14),
('aaa', '$2y$10$jj3hhl1Sef2Z2Goh7hk4r.dgPbKjTd2YCF6.yHbpDv74Q2g5PDNp.', '1', '100', '', 15),
('aaa', '$2y$10$.6kWeoxLxRpzU7vlrod4JuHr1BujAq9dU.fspc3iNTZmkYsim0suq', '1', '123', '123', 16),
('111', '$2y$10$2jGAUjUpCM5z3LJdT.45ZefCVqMSfR5MgP23ByEeycIDrCzjnn/Rm', '1', '10000', '100000', 17),
('あああ', '$2y$10$gYzFlGMYk7m/surXlfvOuOjyEglYf0LjTECUdRks.VGX/GMgOyYOe', '1', '1234', '1234', 18);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `userdata`
--
ALTER TABLE `userdata`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
