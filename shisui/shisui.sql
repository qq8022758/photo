-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2016 年 02 月 24 日 14:17
-- 服务器版本: 5.6.12-log
-- PHP 版本: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `shisui`
--
CREATE DATABASE IF NOT EXISTS `shisui` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `shisui`;

-- --------------------------------------------------------

--
-- 表的结构 `attend`
--

CREATE TABLE IF NOT EXISTS `attend` (
  `id` INT(11) NOT NULL,
  `attend_id` INT(11) NOT NULL
) ENGINE=INNODB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `attend`
--

INSERT INTO `attend` (`id`, `attend_id`) VALUES
(1, 4),
(1, 3),
(1, 1),
(1, 0),
(1, 2),
(17, 17),
(17, 18),
(18, 17),
(18, 18),
(18, 19);

-- --------------------------------------------------------

--
-- 表的结构 `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` SMALLINT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) CHARACTER SET utf8 DEFAULT '',
  `description` TEXT CHARACTER SET utf8,
  `classification` ENUM('最爱','风景','人物','动物','游记','卡通','生活','其他') CHARACTER SET utf8 NOT NULL DEFAULT '其他',
  `status` ENUM('public','friend','private') CHARACTER SET utf8 NOT NULL DEFAULT 'public',
  `update_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
  `cover` VARCHAR(255) CHARACTER SET utf8 NOT NULL,
  `cat_id` SMALLINT(5) NOT NULL,
  `pic_count` INT(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=INNODB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- 转存表中的数据 `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `classification`, `status`, `update_time`, `cover`, `cat_id`, `pic_count`) VALUES
(2, 'bigbang', 'test', '最爱', 'public', '2014-04-24 17:00:38', 'http://localhost/shisui/view/images/uploads/1398330036.jpg', 2, 3),
(3, 'bigbang', 'bigbang', '最爱', 'public', '2014-04-14 00:00:00', 'http://localhost/shisui/view/photo/1.jpg', 3, 4),
(10, '男明星', '我喜欢', '人物', 'public', '2014-04-24 16:50:28', 'http://localhost/shisui/view/images/uploads/1398329365.jpg', 2, 8),
(11, '自拍照', '我最爱自拍', '人物', 'private', '2014-04-24 16:59:55', 'http://localhost/shisui/view/images/uploads/1398329994.jpg', 2, 0),
(12, '桂林旅游', '10计机1', '最爱', 'friend', '2014-04-24 16:59:40', 'http://localhost/shisui/view/images/uploads/1398329975.jpg', 2, 0),
(13, '我喜欢的人', '我其实最套样', '人物', 'public', '2014-04-24 17:00:13', 'http://localhost/shisui/view/images/uploads/1398329948.jpg', 2, 0),
(18, '改一下名字', '这次可以了吧', '最爱', 'public', '2014-04-24 20:44:25', 'http://localhost/shisui/view/images/bgAlbum.png', 6, 3),
(19, '这是第二个', '看排序的', '最爱', 'public', '2014-04-24 20:44:47', 'http://localhost/shisui/view/images/bgAlbum.png', 6, 6);

-- --------------------------------------------------------

--
-- 表的结构 `collect_image`
--

CREATE TABLE IF NOT EXISTS `collect_image` (
  `user_id` SMALLINT(5) NOT NULL DEFAULT '0',
  `author_id` SMALLINT(5) NOT NULL,
  `categories_id` SMALLINT(5) NOT NULL,
  `image_id` SMALLINT(5) NOT NULL,
  `collect_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=INNODB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 表的结构 `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `image_id` MEDIUMINT(8) UNSIGNED NOT NULL DEFAULT '0',
  `date` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
  `author` VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL,
  `email` VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL,
  `author_id` SMALLINT(5) DEFAULT NULL,
  `anonymous_id` VARCHAR(45) CHARACTER SET utf8 NOT NULL,
  `comment` LONGTEXT CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=INNODB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- 转存表中的数据 `comments`
--

INSERT INTO `comments` (`id`, `image_id`, `date`, `author`, `email`, `author_id`, `anonymous_id`, `comment`) VALUES
(17, 40, '2014-04-24 17:06:14', 'huilin', '1342385875@qq.com', 17, '', '发送到房顶上');

-- --------------------------------------------------------

--
-- 表的结构 `config`
--

CREATE TABLE IF NOT EXISTS `config` (
  `param` VARCHAR(40) CHARACTER SET utf8mb4 NOT NULL,
  `value` TEXT CHARACTER SET utf8,
  `comment` VARCHAR(255) CHARACTER SET utf8 NOT NULL
) ENGINE=INNODB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 表的结构 `favorites`
--

CREATE TABLE IF NOT EXISTS `favorites` (
  `user_id` SMALLINT(5) NOT NULL DEFAULT '0',
  `image_id` MEDIUMINT(8) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=INNODB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 表的结构 `friend`
--

CREATE TABLE IF NOT EXISTS `friend` (
  `user_id` SMALLINT(5) NOT NULL DEFAULT '0',
  `friend_id` SMALLINT(5) NOT NULL DEFAULT '0'
) ENGINE=INNODB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `friend`
--

INSERT INTO `friend` (`user_id`, `friend_id`) VALUES
(17, 1),
(1, 2),
(1, 3),
(18, 17),
(18, 17),
(18, 18),
(18, 19);

-- --------------------------------------------------------

--
-- 表的结构 `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` MEDIUMINT(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `file` VARCHAR(255) NOT NULL,
  `date_available` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
  `name` VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL,
  `author` VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL,
  `hit` INT(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '点赞',
  `date_metadata_update` DATE DEFAULT NULL,
  `path` VARCHAR(255) CHARACTER SET utf8 NOT NULL,
  `storage_category_id` SMALLINT(5) NOT NULL COMMENT '存放此张照片的相册',
  `status` INT(11) NOT NULL,
  `collected_num` SMALLINT(5) NOT NULL DEFAULT '0',
  `tab_id` SMALLINT(5) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=INNODB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=58 ;

--
-- 转存表中的数据 `images`
--

INSERT INTO `images` (`id`, `file`, `date_available`, `name`, `author`, `hit`, `date_metadata_update`, `path`, `storage_category_id`, `status`, `collected_num`, `tab_id`) VALUES
(7, 'http://localhost/shisui/view/images/temp/blog_small_img_1.jpg 	', '0000-00-00 00:00:00', '权志龙', 'huilin', 3, NULL, 'http://localhost/shisui/view/images/temp/blog_small_img_1.jpg 	', 3, 0, 0, 0),
(14, 'http://localhost/shisui/view/images/temp/blog_small_img_1.jpg', '2014-04-19 00:00:00', '权志龙', 'test', 1, '2014-04-19', 'http://localhost/shisui/view/images/temp/blog_small_img_1.jpg', 1, 0, 0, 0),
(15, 'http://localhost/shisui/view/images/temp/blog_small_img_1.jpg', '2014-04-19 00:00:00', 'test', 'test', 0, '2014-04-19', 'http://localhost/shisui/view/images/temp/blog_small_img_1.jpg', 1, 0, 0, 0),
(20, 'http://localhost/shisui/uploadpic/uploads/1397947521.jpg', '2014-04-20 06:45:26', 'test', 'test', 1, '2014-04-20', 'http://localhost/shisui/uploadpic/uploads/1397947521.jpg', 0, 0, 0, 0),
(33, 'http://localhost/shisui/uploadpic/uploads/1398179682.jpg', '2014-04-22 23:14:44', 'test', 'huilin', 1, '2014-04-22', 'http://localhost/shisui/uploadpic/uploads/1398179682.jpg', 2, 0, 0, 1),
(34, 'http://localhost/shisui/uploadpic/uploads/1398180133.jpg', '2014-04-22 23:22:15', 'test', 'huilin', 1, '2014-04-22', 'http://localhost/shisui/uploadpic/uploads/1398180133.jpg', 2, 0, 0, 0),
(35, 'http://localhost/shisui/uploadpic/uploads/1398187763.jpg', '2014-04-23 01:29:25', 'test', 'huilin', 0, '2014-04-23', 'http://localhost/shisui/uploadpic/uploads/1398187763.jpg', 2, 0, 0, 0),
(36, 'http://localhost/shisui/uploadpic/uploads/1398328895.jpg', '2014-04-24 16:42:09', 'test', 'huanghuilin', 0, '2014-04-24', 'http://localhost/shisui/uploadpic/uploads/1398328895.jpg', 10, 0, 0, 0),
(37, 'http://localhost/shisui/uploadpic/uploads/1398328902.jpg', '2014-04-24 16:42:09', 'test', 'huanghuilin', 0, '2014-04-24', 'http://localhost/shisui/uploadpic/uploads/1398328902.jpg', 10, 0, 0, 0),
(38, 'http://localhost/shisui/uploadpic/uploads/1398328910.jpg', '2014-04-24 16:42:09', 'test', 'huanghuilin', 0, '2014-04-24', 'http://localhost/shisui/uploadpic/uploads/1398328910.jpg', 10, 0, 0, 0),
(39, 'http://localhost/shisui/uploadpic/uploads/1398328927.jpg', '2014-04-24 16:42:09', 'test', 'huanghuilin', 0, '2014-04-24', 'http://localhost/shisui/uploadpic/uploads/1398328927.jpg', 10, 0, 0, 0),
(40, 'http://localhost/shisui/uploadpic/uploads/1398329021.jpg', '2014-04-24 16:43:43', 'test', 'huanghuilin', 0, '2014-04-24', 'http://localhost/shisui/uploadpic/uploads/1398329021.jpg', 10, 0, 0, 0),
(41, 'http://localhost/shisui/uploadpic/uploads/1398330262.jpg', '2014-04-24 17:04:24', 'test', 'huilin', 0, '2014-04-24', 'http://localhost/shisui/uploadpic/uploads/1398330262.jpg', 10, 0, 0, 0),
(42, 'http://localhost/shisui/uploadpic/uploads/1398330348.jpg', '2014-04-24 17:06:00', 'test', 'huilin', 0, '2014-04-24', 'http://localhost/shisui/uploadpic/uploads/1398330348.jpg', 10, 0, 0, 0),
(43, 'http://localhost/shisui/uploadpic/uploads/1398330358.jpg', '2014-04-24 17:06:00', 'test', 'huilin', 0, '2014-04-24', 'http://localhost/shisui/uploadpic/uploads/1398330358.jpg', 10, 0, 0, 0),
(49, 'http://localhost/shisui/uploadpic/uploads/1398343541.jpg', '2014-04-24 20:45:49', 'test', '黄惠林', 0, '2014-04-24', 'http://localhost/shisui/uploadpic/uploads/1398343541.jpg', 19, 0, 0, 0),
(50, 'http://localhost/shisui/uploadpic/uploads/1398343544.jpg', '2014-04-24 20:45:49', 'test', '黄惠林', 0, '2014-04-24', 'http://localhost/shisui/uploadpic/uploads/1398343544.jpg', 19, 0, 0, 0),
(51, 'http://localhost/shisui/uploadpic/uploads/1398343547.jpg', '2014-04-24 20:45:49', 'test', '黄惠林', 0, '2014-04-24', 'http://localhost/shisui/uploadpic/uploads/1398343547.jpg', 19, 0, 0, 0),
(52, 'http://localhost/shisui/uploadpic/uploads/1398343559.jpg', '2014-04-24 20:46:08', 'test', '黄惠林', 0, '2014-04-24', 'http://localhost/shisui/uploadpic/uploads/1398343559.jpg', 19, 0, 0, 0),
(53, 'http://localhost/shisui/uploadpic/uploads/1398343562.jpg', '2014-04-24 20:46:08', 'test', '黄惠林', 0, '2014-04-24', 'http://localhost/shisui/uploadpic/uploads/1398343562.jpg', 19, 0, 0, 0),
(54, 'http://localhost/shisui/uploadpic/uploads/1398343565.jpg', '2014-04-24 20:46:08', 'test', '黄惠林', 0, '2014-04-24', 'http://localhost/shisui/uploadpic/uploads/1398343565.jpg', 19, 0, 0, 0),
(55, 'http://localhost/shisui/uploadpic/uploads/1398343580.jpg', '2014-04-24 20:46:28', 'test', '黄惠林', 0, '2014-04-24', 'http://localhost/shisui/uploadpic/uploads/1398343580.jpg', 18, 0, 0, 0),
(56, 'http://localhost/shisui/uploadpic/uploads/1398343583.jpg', '2014-04-24 20:46:28', 'test', '黄惠林', 0, '2014-04-24', 'http://localhost/shisui/uploadpic/uploads/1398343583.jpg', 18, 0, 0, 0),
(57, 'http://localhost/shisui/uploadpic/uploads/1398343586.jpg', '2014-04-24 20:46:28', 'test', '黄惠林', 0, '2014-04-24', 'http://localhost/shisui/uploadpic/uploads/1398343586.jpg', 18, 0, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `image_category`
--

CREATE TABLE IF NOT EXISTS `image_category` (
  `image_id` MEDIUMINT(8) UNSIGNED NOT NULL DEFAULT '0',
  `category_id` SMALLINT(5) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`image_id`),
  UNIQUE KEY `image_id` (`image_id`)
) ENGINE=INNODB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `image_category`
--

INSERT INTO `image_category` (`image_id`, `category_id`) VALUES
(0, 2),
(1, 3),
(2, 3),
(3, 2),
(4, 2),
(5, 2);

-- --------------------------------------------------------

--
-- 表的结构 `sharewall`
--

CREATE TABLE IF NOT EXISTS `sharewall` (
  `id` SMALLINT(5) NOT NULL AUTO_INCREMENT,
  `authorName` VARCHAR(255) CHARACTER SET utf8 NOT NULL,
  `authorAvater` VARCHAR(255) CHARACTER SET utf8 NOT NULL,
  `share_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
  `mood_color` SMALLINT(5) NOT NULL,
  `mood_content` TEXT CHARACTER SET utf8 NOT NULL,
  `path` VARCHAR(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=INNODB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

-- --------------------------------------------------------

--
-- 表的结构 `share_wall`
--

CREATE TABLE IF NOT EXISTS `share_wall` (
  `user_id` SMALLINT(5) NOT NULL,
  `categories_id` SMALLINT(5) NOT NULL,
  `image_id` SMALLINT(5) NOT NULL,
  `share_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
  `mood_color` SMALLINT(5) UNSIGNED NOT NULL DEFAULT '0',
  `mood_content` TEXT CHARACTER SET utf8 NOT NULL,
  KEY `user_id` (`user_id`)
) ENGINE=INNODB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `share_wall`
--

INSERT INTO `share_wall` (`user_id`, `categories_id`, `image_id`, `share_time`, `mood_color`, `mood_content`) VALUES
(1, 0, 0, '2014-04-16 00:00:00', 1, '通了就看到'),
(0, 0, 1, '2014-04-24 00:00:00', 3, '通了就看'),
(0, 0, 0, '2014-04-21 00:00:00', 4, '通了就看');

-- --------------------------------------------------------

--
-- 表的结构 `tab`
--

CREATE TABLE IF NOT EXISTS `tab` (
  `id` SMALLINT(5) NOT NULL AUTO_INCREMENT,
  `tab_name` VARCHAR(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=INNODB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `tab`
--

INSERT INTO `tab` (`id`, `tab_name`) VALUES
(0, '喜欢'),
(1, '不喜欢'),
(8, '这个加进去的'),
(9, '放到');

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` SMALLINT(5) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` VARCHAR(255) CHARACTER SET utf8 NOT NULL,
  `sex` ENUM('female','male') CHARACTER SET utf8 NOT NULL DEFAULT 'female',
  `mail_address` VARCHAR(255) CHARACTER SET utf8 NOT NULL,
  `permission` ENUM('admin','normal') CHARACTER SET utf8 NOT NULL DEFAULT 'normal',
  `registration_date` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
  `avater` VARCHAR(255) CHARACTER SET utf8 NOT NULL DEFAULT 'http://localhost/shisui/view/images/wand.png',
  `nb_friend` MEDIUMINT(8) NOT NULL DEFAULT '0',
  `attention` INT(11) NOT NULL,
  `content` LONGTEXT NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=INNODB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `sex`, `mail_address`, `permission`, `registration_date`, `avater`, `nb_friend`, `attention`, `content`) VALUES
(17, 'huilin', '123456', 'male', '1342385875@qq.com', 'normal', '2014-04-24 15:14:32', 'http://localhost/shisui/view/images/uploads/1398323714.jpeg', 1, 2, '??????'),
(18, '黄惠林', '1', 'female', '1', 'normal', '2014-04-24 16:05:47', 'http://localhost/shisui/view/images/uploads/1398326770.jpg', 0, 2, ''),
(19, '李明浩', '2', 'male', '2', 'normal', '2014-04-24 16:06:35', 'http://localhost/shisui/view/images/uploads/1398326828.png', 0, 1, ''),
(20, '酒魔高骜', '861106', 'female', 'jiumogaoao@163.com', 'admin', '2014-04-24 09:32:16', 'http://localhost/shisui/view/images/wand.png', 0, 0, '');

-- --------------------------------------------------------

--
-- 表的结构 `user_cache`
--

CREATE TABLE IF NOT EXISTS `user_cache` (
  `user_id` SMALLINT(5) UNSIGNED NOT NULL,
  `cache_update_time` INT(10) UNSIGNED NOT NULL,
  `forbidden_categories` MEDIUMTEXT CHARACTER SET utf8 NOT NULL,
  `nb_total_images` MEDIUMINT(8) UNSIGNED NOT NULL,
  `cat_id` INT(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`cat_id`),
  UNIQUE KEY `cat_id` (`cat_id`)
) ENGINE=INNODB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `user_cache`
--

INSERT INTO `user_cache` (`user_id`, `cache_update_time`, `forbidden_categories`, `nb_total_images`, `cat_id`) VALUES
(17, 2014, '2', 0, 2),
(17, 2014, '3', 0, 3),
(18, 0, '0', 0, 6);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
