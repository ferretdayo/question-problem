-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016 年 4 朁E27 日 03:12
-- サーバのバージョン： 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `info_bbs`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `comment_detail`
--

CREATE TABLE IF NOT EXISTS `comment_detail` (
`id` int(20) unsigned NOT NULL,
  `parent_id` int(20) unsigned NOT NULL,
  `name` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `date` date DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

-- --------------------------------------------------------

--
-- テーブルの構造 `info_table`
--

CREATE TABLE IF NOT EXISTS `info_table` (
`id` int(20) unsigned NOT NULL,
  `grade` int(5) DEFAULT NULL,
  `subject` int(10) unsigned DEFAULT NULL,
  `category` int(5) unsigned DEFAULT NULL,
  `title` text COLLATE utf8_unicode_ci,
  `content` text COLLATE utf8_unicode_ci,
  `date` date DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=29 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment_detail`
--
ALTER TABLE `comment_detail`
 ADD PRIMARY KEY (`id`), ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `info_table`
--
ALTER TABLE `info_table`
 ADD PRIMARY KEY (`id`), ADD KEY `subject_id` (`subject`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment_detail`
--
ALTER TABLE `comment_detail`
MODIFY `id` int(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `info_table`
--
ALTER TABLE `info_table`
MODIFY `id` int(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- ダンプしたテーブルの制約
--

--
-- テーブルの制約 `comment_detail`
--
ALTER TABLE `comment_detail`
ADD CONSTRAINT `comment_detail_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `info_table` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
