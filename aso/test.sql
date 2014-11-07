-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2014 年 10 朁E08 日 03:44
-- サーバのバージョン： 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `group`
--

CREATE TABLE IF NOT EXISTS `group` (
  `g_id` int(4) NOT NULL AUTO_INCREMENT,
  `g_name` varchar(20) DEFAULT NULL,
  `votes` int(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`g_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- テーブルの構造 `group_date`
--

CREATE TABLE IF NOT EXISTS `group_date` (
  `g_id` int(4) NOT NULL,
  `m_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- テーブルの構造 `janru`
--

CREATE TABLE IF NOT EXISTS `janru` (
  `j_id` int(4) NOT NULL AUTO_INCREMENT,
  `j_name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`j_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- テーブルのデータのダンプ `janru`
--

INSERT INTO `janru` (`j_id`, `j_name`) VALUES
(5, 'ã‚«ãƒ©ã‚ªã‚±'),
(6, 'ãƒŸã‚¹ã‚³ãƒ³');

-- --------------------------------------------------------

--
-- テーブルの構造 `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `m_id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `school` varchar(30) NOT NULL,
  `janru` int(4) DEFAULT NULL,
  `free` varchar(300) NOT NULL,
  PRIMARY KEY (`m_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- テーブルのデータのダンプ `member`
--

INSERT INTO `member` (`m_id`, `name`, `school`, `janru`, `free`) VALUES
(13, 'è¥¿å±±', 'éº»ç”Ÿæƒ…å ±', 6, 'ãƒ‡ãƒ¼ã‚¿ãƒ™ãƒ¼ã‚¹æ‹…å½“'),
(14, 'çŸ³å·', 'éº»ç”Ÿæƒ…å ±', 5, 'ãƒ—ãƒ¬ã‚¼ãƒ³æ‹…å½“'),
(15, 'æž—', 'éº»ç”Ÿæƒ…å ±', 6, 'ãƒ‡ãƒ¼ã‚¿ãƒ™ãƒ¼ã‚¹è£œåŠ©ã¨ãƒ—ãƒ­ã‚°ãƒ©ãƒŸãƒ³ã‚°æ‹…å½“'),
(18, 'æ­£æœ¨', 'éº»ç”Ÿæƒ…å ±', 5, 'ç”»é¢ãƒ‡ã‚¶ã‚¤ãƒ³æ‹…å½“'),
(19, 'ç”°ä¸­ä¸¸', 'éº»ç”Ÿæƒ…å ±', 6, 'ã‚¹ãƒžãƒ›ç”»é¢æ‹…å½“'),
(20, 'é»’æœ¨', 'éº»ç”Ÿæƒ…å ±', 5, 'æŠ•ç¥¨ã‚·ã‚¹ãƒ†ãƒ ãƒªãƒ¼ãƒ€ãƒ¼'),
(21, 'è°æ–¹', 'éº»ç”Ÿæƒ…å ±', 6, 'ãƒ­ã‚°ã‚¤ãƒ³ç”»é¢æ‹…å½“');

-- --------------------------------------------------------

--
-- テーブルの構造 `mj_list`
--

CREATE TABLE IF NOT EXISTS `mj_list` (
  `mj_id` int(4) NOT NULL AUTO_INCREMENT,
  `m_id` int(4) DEFAULT NULL,
  `j_id` int(4) DEFAULT NULL,
  `mj_votes` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`mj_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
