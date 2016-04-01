/*
SQLyog v10.2 
MySQL - 5.5.20-log : Database - shisui
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`shisui` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `shisui`;

/*Table structure for table `attend` */

DROP TABLE IF EXISTS `attend`;

CREATE TABLE `attend` (
  `id` int(11) NOT NULL,
  `attend_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `attend` */

insert  into `attend`(`id`,`attend_id`) values (1,4),(1,3),(1,1),(1,0),(1,2),(18,17),(18,18),(18,19),(17,19),(17,20),(19,17),(19,18),(19,19),(19,20),(20,17),(20,18),(18,21),(19,21),(17,21),(20,21),(18,20),(21,17),(21,21),(21,18),(17,18),(22,17),(22,18);

/*Table structure for table `categories` */

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT '',
  `description` text CHARACTER SET utf8,
  `classification` enum('最爱','风景','人物','动物','游记','卡通','生活','其他') CHARACTER SET utf8 NOT NULL DEFAULT '其他',
  `status` enum('public','friend','private') CHARACTER SET utf8 NOT NULL DEFAULT 'public',
  `update_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `cover` varchar(255) CHARACTER SET utf8 NOT NULL,
  `cat_id` smallint(5) NOT NULL,
  `pic_count` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

/*Data for the table `categories` */

insert  into `categories`(`id`,`name`,`description`,`classification`,`status`,`update_time`,`cover`,`cat_id`,`pic_count`) values (2,'bigbang','test','最爱','public','2016-03-12 22:08:51','\"http://localhost/shisui/view/images/uploads/1457313848.jpg\"',2,10),(3,'bigbang','bigbang','最爱','public','2016-03-14 00:00:00','http://localhost/shisui/view/photo/1.jpg',3,4),(10,'男明星','我喜欢','人物','public','2016-03-07 09:25:03','http://localhost/shisui/view/images/uploads/1457313902.jpg',2,8),(11,'自拍照','我最爱自拍','人物','private','2016-03-07 09:24:40','http://localhost/shisui/view/images/uploads/1457313879.jpg',2,0),(12,'桂林旅游','12计机1','最爱','friend','2016-03-07 10:37:25','http://localhost/shisui/view/images/uploads/1457313891.jpg',2,0),(13,'我喜欢的人','我其实最套样','人物','public','2016-03-07 09:24:25','http://localhost/shisui/view/images/uploads/1457313864.jpg',2,0),(18,'改一下名字','这次可以了吧','最爱','public','2016-03-07 09:29:33','http://localhost/shisui/view/images/uploads/1457314172.jpg',6,6),(19,'这是第二个','看排序的','最爱','public','2016-03-07 09:29:13','http://localhost/shisui/view/images/uploads/1457314152.jpg',6,5),(20,'hello','hellohellohellohello','最爱','public','2016-03-12 18:55:13','\"http://localhost/shisui/view/images/uploads/1457780110.jpg\"',9,5),(21,'dog','dogdogdog','人物','public','2016-03-13 16:08:14','\"http://localhost/shisui/view/images/uploads/1457856482.jpg\"',7,1),(22,'qqq','qqqqqqqqqqqq','最爱','public','2016-03-13 16:19:04','\"http://localhost/shisui/view/images/uploads/1457857143.jpg\"',7,1),(34,'212','2121','最爱','public','2016-03-26 18:58:41','\"http://localhost/shisui/view/images/uploads/1458989910.jpg\"',9,1),(35,'fsfsd','fsdf','最爱','public','2016-03-24 16:27:45','\"http://localhost/shisui/view/images/uploads/1458808064.jpg\"',9,2),(36,'test','testtest','最爱','public','2016-03-27 12:11:50','\"http://localhost/shisui/view/images/uploads/1459051909.JPG\"',10,2);

/*Table structure for table `collect_image` */

DROP TABLE IF EXISTS `collect_image`;

CREATE TABLE `collect_image` (
  `user_id` smallint(5) NOT NULL DEFAULT '0',
  `author_id` smallint(5) NOT NULL,
  `categories_id` smallint(5) NOT NULL,
  `image_id` smallint(5) NOT NULL,
  `collect_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `collect_image` */

/*Table structure for table `comments` */

DROP TABLE IF EXISTS `comments`;

CREATE TABLE `comments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `image_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `author` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `author_id` smallint(5) DEFAULT NULL,
  `anonymous_id` varchar(45) CHARACTER SET utf8 NOT NULL,
  `comment` longtext CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

/*Data for the table `comments` */

insert  into `comments`(`id`,`image_id`,`date`,`author`,`email`,`author_id`,`anonymous_id`,`comment`) values (17,40,'2016-02-24 17:06:14','huilin','123',17,'','发送到房顶上'),(18,64,'2016-03-07 09:46:49','huilin','123',17,'','222222222222'),(19,64,'2016-03-07 09:46:52','huilin','123',17,'','1'),(20,71,'2016-03-07 10:36:30','huilin','123',17,'','更过分过分郭德纲的观点'),(21,78,'2016-03-07 10:36:34','huilin','123',17,'','个电饭锅电饭锅'),(22,82,'2016-03-12 18:56:00','wori','3',21,'','111111'),(23,83,'2016-03-12 18:56:14','wori','3',21,'','222'),(24,82,'2016-03-12 19:02:52','骨灰','jiumogaoao@163.com',20,'','2222'),(25,56,'2016-03-20 10:50:08','郭总','1',18,'','我爱你'),(26,100,'2016-03-27 12:11:04','帷顺','4',22,'','666666');

/*Table structure for table `config` */

DROP TABLE IF EXISTS `config`;

CREATE TABLE `config` (
  `param` varchar(40) CHARACTER SET utf8mb4 NOT NULL,
  `value` text CHARACTER SET utf8,
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `config` */

/*Table structure for table `favorites` */

DROP TABLE IF EXISTS `favorites`;

CREATE TABLE `favorites` (
  `user_id` smallint(5) NOT NULL DEFAULT '0',
  `image_id` mediumint(8) unsigned DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `favorites` */

/*Table structure for table `friend` */

DROP TABLE IF EXISTS `friend`;

CREATE TABLE `friend` (
  `user_id` smallint(5) NOT NULL DEFAULT '0',
  `friend_id` smallint(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `friend` */

insert  into `friend`(`user_id`,`friend_id`) values (17,1),(1,2),(1,3),(18,18),(18,19),(17,19),(17,20),(19,17),(19,18),(19,19),(19,20),(20,17),(20,18),(18,21),(19,21),(17,21),(20,21),(18,20),(21,17),(18,17),(21,21),(21,18),(17,18),(22,17),(22,18);

/*Table structure for table `image_category` */

DROP TABLE IF EXISTS `image_category`;

CREATE TABLE `image_category` (
  `image_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `category_id` smallint(5) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`image_id`),
  UNIQUE KEY `image_id` (`image_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `image_category` */

insert  into `image_category`(`image_id`,`category_id`) values (0,2),(1,3),(2,3),(3,2),(4,2),(5,2);

/*Table structure for table `images` */

DROP TABLE IF EXISTS `images`;

CREATE TABLE `images` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `file` varchar(255) NOT NULL,
  `date_available` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `author` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `hit` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '点赞',
  `date_metadata_update` date DEFAULT NULL,
  `path` varchar(255) CHARACTER SET utf8 NOT NULL,
  `storage_category_id` smallint(5) NOT NULL COMMENT '存放此张照片的相册',
  `status` int(11) NOT NULL,
  `collected_num` smallint(5) NOT NULL DEFAULT '0',
  `tab_id` smallint(5) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=latin1;

/*Data for the table `images` */

insert  into `images`(`id`,`file`,`date_available`,`name`,`author`,`hit`,`date_metadata_update`,`path`,`storage_category_id`,`status`,`collected_num`,`tab_id`) values (7,'http://localhost/shisui/view/images/temp/blog_small_img_1.jpg 	','2016-03-20 00:00:00','权志龙','huilin',3,NULL,'http://localhost/shisui/view/images/temp/blog_small_img_1.jpg 	',3,0,0,0),(14,'http://localhost/shisui/view/images/temp/blog_small_img_1.jpg','2016-03-19 00:00:00','权志龙','test',1,'2016-02-19','http://localhost/shisui/view/images/temp/blog_small_img_1.jpg',1,0,0,0),(15,'http://localhost/shisui/view/images/temp/blog_small_img_1.jpg','2016-03-19 00:00:00','test','test',0,'2016-02-19','http://localhost/shisui/view/images/temp/blog_small_img_1.jpg',1,0,0,0),(20,'http://localhost/shisui/uploadpic/uploads/1397947521.jpg','2016-03-20 06:45:26','test','test',1,'2016-02-20','http://localhost/shisui/uploadpic/uploads/1397947521.jpg',0,0,0,0),(49,'http://localhost/shisui/uploadpic/uploads/1398343541.jpg','2016-03-24 20:45:49','test','郭总',0,'2016-02-24','http://localhost/shisui/uploadpic/uploads/1398343541.jpg',19,0,0,0),(50,'http://localhost/shisui/uploadpic/uploads/1398343544.jpg','2016-03-24 20:45:49','test','郭总',0,'2016-02-24','http://localhost/shisui/uploadpic/uploads/1398343544.jpg',19,0,0,0),(51,'http://localhost/shisui/uploadpic/uploads/1398343547.jpg','2016-03-24 20:45:49','test','郭总',0,'2016-02-24','http://localhost/shisui/uploadpic/uploads/1398343547.jpg',19,0,0,0),(52,'http://localhost/shisui/uploadpic/uploads/1398343559.jpg','2016-03-24 20:46:08','test','郭总',1,'2016-02-24','http://localhost/shisui/uploadpic/uploads/1398343559.jpg',19,0,0,0),(54,'http://localhost/shisui/uploadpic/uploads/1398343565.jpg','2016-03-24 20:46:08','test','郭总',0,'2016-02-24','http://localhost/shisui/uploadpic/uploads/1398343565.jpg',19,0,0,0),(59,'http://localhost/shisui/uploadpic/uploads/1457283390.jpg','2016-03-07 00:56:35','test','huilin',0,'2016-03-07','http://localhost/shisui/uploadpic/uploads/1457283390.jpg',2,0,0,0),(60,'http://localhost/shisui/uploadpic/uploads/1457313530.jpg','2016-03-07 09:18:55','test','huilin',0,'2016-03-07','http://localhost/shisui/uploadpic/uploads/1457313530.jpg',2,0,0,0),(61,'http://localhost/shisui/uploadpic/uploads/1457313534.jpg','2016-03-07 09:18:55','test','huilin',0,'2016-03-07','http://localhost/shisui/uploadpic/uploads/1457313534.jpg',2,0,0,0),(64,'http://localhost/shisui/uploadpic/uploads/1457313676.jpg','2016-03-07 09:21:37','test','huilin',14,'2016-03-07','http://localhost/shisui/uploadpic/uploads/1457313676.jpg',2,0,0,10),(65,'http://localhost/shisui/uploadpic/uploads/1457313678.jpg','2016-03-07 09:21:37','test','huilin',1,'2016-03-07','http://localhost/shisui/uploadpic/uploads/1457313678.jpg',2,0,0,0),(66,'http://localhost/shisui/uploadpic/uploads/1457313680.jpg','2016-03-07 09:21:37','test','huilin',0,'2016-03-07','http://localhost/shisui/uploadpic/uploads/1457313680.jpg',2,0,0,0),(67,'http://localhost/shisui/uploadpic/uploads/1457313681.jpg','2016-03-07 09:21:37','test','huilin',0,'2016-03-07','http://localhost/shisui/uploadpic/uploads/1457313681.jpg',2,0,0,0),(68,'http://localhost/shisui/uploadpic/uploads/1457313683.jpg','2016-03-07 09:21:37','test','huilin',0,'2016-03-07','http://localhost/shisui/uploadpic/uploads/1457313683.jpg',2,0,0,0),(69,'http://localhost/shisui/uploadpic/uploads/1457313686.jpg','2016-03-07 09:21:37','test','huilin',0,'2016-03-07','http://localhost/shisui/uploadpic/uploads/1457313686.jpg',2,0,0,0),(70,'http://localhost/shisui/uploadpic/uploads/1457313692.jpg','2016-03-07 09:21:37','test','huilin',0,'2016-03-07','http://localhost/shisui/uploadpic/uploads/1457313692.jpg',2,0,0,0),(71,'http://localhost/shisui/uploadpic/uploads/1457313730.jpg','2016-03-07 09:22:24','test','huilin',0,'2016-03-07','http://localhost/shisui/uploadpic/uploads/1457313730.jpg',10,0,0,0),(72,'http://localhost/shisui/uploadpic/uploads/1457313732.jpg','2016-03-07 09:22:24','test','huilin',0,'2016-03-07','http://localhost/shisui/uploadpic/uploads/1457313732.jpg',10,0,0,0),(73,'http://localhost/shisui/uploadpic/uploads/1457313734.jpg','2016-03-07 09:22:24','test','huilin',0,'2016-03-07','http://localhost/shisui/uploadpic/uploads/1457313734.jpg',10,0,0,0),(74,'http://localhost/shisui/uploadpic/uploads/1457313737.jpg','2016-03-07 09:22:24','test','huilin',0,'2016-03-07','http://localhost/shisui/uploadpic/uploads/1457313737.jpg',10,0,0,0),(75,'http://localhost/shisui/uploadpic/uploads/1457313739.jpg','2016-03-07 09:22:24','test','huilin',0,'2016-03-07','http://localhost/shisui/uploadpic/uploads/1457313739.jpg',10,0,0,0),(76,'http://localhost/shisui/uploadpic/uploads/1457313740.jpg','2016-03-07 09:22:24','test','huilin',0,'2016-03-07','http://localhost/shisui/uploadpic/uploads/1457313740.jpg',10,0,0,0),(77,'http://localhost/shisui/uploadpic/uploads/1457313743.jpg','2016-03-07 09:22:24','test','huilin',0,'2016-03-07','http://localhost/shisui/uploadpic/uploads/1457313743.jpg',10,0,0,0),(78,'http://localhost/shisui/uploadpic/uploads/1457313764.jpg','2016-03-07 09:22:49','test','huilin',0,'2016-03-07','http://localhost/shisui/uploadpic/uploads/1457313764.jpg',10,0,0,0),(79,'http://localhost/shisui/uploadpic/uploads/1457780121.jpg','2016-03-12 18:55:36','test','wori',2,'2016-03-12','http://localhost/shisui/uploadpic/uploads/1457780121.jpg',20,0,0,0),(80,'http://localhost/shisui/uploadpic/uploads/1457780124.jpg','2016-03-12 18:55:38','test','wori',7,'2016-03-12','http://localhost/shisui/uploadpic/uploads/1457780124.jpg',20,0,0,0),(81,'http://localhost/shisui/uploadpic/uploads/1457780130.jpg','2016-03-12 18:55:40','test','wori',0,'2016-03-12','http://localhost/shisui/uploadpic/uploads/1457780130.jpg',20,0,0,0),(82,'http://localhost/shisui/uploadpic/uploads/1457780132.jpg','2016-03-12 18:55:46','test','wori',1,'2016-03-12','http://localhost/shisui/uploadpic/uploads/1457780132.jpg',20,0,0,0),(83,'http://localhost/shisui/uploadpic/uploads/1457780135.jpg','2016-03-12 18:55:56','test','wori',2,'2016-03-12','http://localhost/shisui/uploadpic/uploads/1457780135.jpg',20,0,0,0),(85,'http://localhost/shisui/uploadpic/uploads/1457856452.jpg','2016-03-13 16:07:47','test','二狗',0,'2016-03-13','http://localhost/shisui/uploadpic/uploads/1457856452.jpg',21,0,0,0),(88,'http://localhost/shisui/uploadpic/uploads/1457857163.png','2016-03-13 16:19:24','test','二狗',0,'2016-03-13','http://localhost/shisui/uploadpic/uploads/1457857163.png',22,0,0,0),(89,'http://localhost/shisui/uploadpic/uploads/1458805453.png','2016-03-24 15:44:15','test','郭总',0,'2016-03-24','http://localhost/shisui/uploadpic/uploads/1458805453.png',18,0,0,0),(90,'http://localhost/shisui/uploadpic/uploads/1458805500.jpg','2016-03-24 15:45:09','test','郭总',0,'2016-03-24','http://localhost/shisui/uploadpic/uploads/1458805500.jpg',18,0,0,0),(91,'http://localhost/shisui/uploadpic/uploads/1458805504.jpg','2016-03-24 15:45:09','test','郭总',0,'2016-03-24','http://localhost/shisui/uploadpic/uploads/1458805504.jpg',18,0,0,0),(92,'http://localhost/shisui/uploadpic/uploads/1458805506.jpg','2016-03-24 15:45:09','test','郭总',0,'2016-03-24','http://localhost/shisui/uploadpic/uploads/1458805506.jpg',18,0,0,0),(93,'http://localhost/shisui/uploadpic/uploads/1458805508.jpg','2016-03-24 15:45:09','test','郭总',0,'2016-03-24','http://localhost/shisui/uploadpic/uploads/1458805508.jpg',18,0,0,0),(94,'http://localhost/shisui/uploadpic/uploads/1458805698.jpg','2016-03-24 15:48:20','test','郭总',0,'2016-03-24','http://localhost/shisui/uploadpic/uploads/1458805698.jpg',18,0,0,0),(95,'http://localhost/shisui/uploadpic/uploads/1458807814.jpg','2016-03-24 16:23:39','test','wori',0,'2016-03-24','http://localhost/shisui/uploadpic/uploads/1458807814.jpg',35,0,0,0),(96,'http://localhost/shisui/uploadpic/uploads/1458808324.jpg','2016-03-24 16:32:06','test','wori',0,'2016-03-24','http://localhost/shisui/uploadpic/uploads/1458808324.jpg',35,0,0,0),(98,'http://localhost/shisui/uploadpic/uploads/1458837286.png','2016-03-25 00:34:50','test','wori',0,'2016-03-25','http://localhost/shisui/uploadpic/uploads/1458837286.png',35,0,0,0),(99,'http://localhost/shisui/uploadpic/uploads/1459004740.jpg','2016-03-26 23:05:46','test','wori',0,'2016-03-26','http://localhost/shisui/uploadpic/uploads/1459004740.jpg',34,0,0,0),(101,'http://localhost/shisui/uploadpic/uploads/1459051842.JPG','2016-03-27 12:10:52','test','帷顺',0,'2016-03-27','http://localhost/shisui/uploadpic/uploads/1459051842.JPG',36,0,0,0),(102,'http://localhost/shisui/uploadpic/uploads/1459051845.JPG','2016-03-27 12:10:52','test','帷顺',0,'2016-03-27','http://localhost/shisui/uploadpic/uploads/1459051845.JPG',36,0,0,0);

/*Table structure for table `share_wall` */

DROP TABLE IF EXISTS `share_wall`;

CREATE TABLE `share_wall` (
  `user_id` smallint(5) NOT NULL,
  `categories_id` smallint(5) NOT NULL,
  `image_id` smallint(5) NOT NULL,
  `share_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `mood_color` smallint(5) unsigned NOT NULL DEFAULT '0',
  `mood_content` text CHARACTER SET utf8 NOT NULL,
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `share_wall` */

insert  into `share_wall`(`user_id`,`categories_id`,`image_id`,`share_time`,`mood_color`,`mood_content`) values (1,0,0,'2016-02-16 00:00:00',1,'通了就看到'),(0,0,1,'2016-02-24 00:00:00',3,'通了就看'),(0,0,0,'2016-02-21 00:00:00',4,'通了就看');

/*Table structure for table `sharewall` */

DROP TABLE IF EXISTS `sharewall`;

CREATE TABLE `sharewall` (
  `id` smallint(5) NOT NULL AUTO_INCREMENT,
  `authorName` varchar(255) CHARACTER SET utf8 NOT NULL,
  `authorAvater` varchar(255) CHARACTER SET utf8 NOT NULL,
  `share_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `mood_color` smallint(5) NOT NULL,
  `mood_content` text CHARACTER SET utf8 NOT NULL,
  `path` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

/*Data for the table `sharewall` */

insert  into `sharewall`(`id`,`authorName`,`authorAvater`,`share_time`,`mood_color`,`mood_content`,`path`) values (10,'222','http://localhost/shisui/uploadpic/uploads/1398343586.jpg','2016-03-20 20:14:49',4,'我爱你','http://localhost/shisui/uploadpic/uploads/1398343547.jpg'),(16,'222','http://localhost/shisui/uploadpic/uploads/1398343586.jpg','2016-03-20 23:03:49',1,'111','http://localhost/shisui/uploadpic/uploads/1398343547.jpg'),(17,'222','http://localhost/shisui/uploadpic/uploads/1398343586.jpg','2016-03-21 00:01:33',1,'1222','http://localhost/shisui/uploadpic/uploads/1398343586.jpg'),(18,'','','2016-03-28 07:11:38',4,'11111111111',''),(19,'','','2016-03-28 07:28:02',4,'11111111111',''),(20,'','','2016-03-28 07:41:03',1,'1111111111','');

/*Table structure for table `tab` */

DROP TABLE IF EXISTS `tab`;

CREATE TABLE `tab` (
  `id` smallint(5) NOT NULL AUTO_INCREMENT,
  `tab_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `tab` */

insert  into `tab`(`id`,`tab_name`) values (0,'喜欢'),(1,'不喜欢'),(8,'这个加进去的'),(9,'放到'),(10,'11111');

/*Table structure for table `user_cache` */

DROP TABLE IF EXISTS `user_cache`;

CREATE TABLE `user_cache` (
  `user_id` smallint(5) unsigned NOT NULL,
  `cache_update_time` int(10) unsigned NOT NULL,
  `forbidden_categories` mediumtext CHARACTER SET utf8 NOT NULL,
  `nb_total_images` mediumint(8) unsigned NOT NULL,
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`cat_id`),
  UNIQUE KEY `cat_id` (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `user_cache` */

insert  into `user_cache`(`user_id`,`cache_update_time`,`forbidden_categories`,`nb_total_images`,`cat_id`) values (17,2016,'2',0,2),(17,2016,'3',0,3),(18,0,'0',0,6),(19,0,'0',0,7),(20,0,'0',0,8),(21,0,'0',0,9),(22,0,'0',0,10);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` smallint(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `sex` enum('female','male') CHARACTER SET utf8 NOT NULL DEFAULT 'female',
  `mail_address` varchar(255) CHARACTER SET utf8 NOT NULL,
  `permission` enum('admin','normal') CHARACTER SET utf8 NOT NULL DEFAULT 'normal',
  `registration_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `avater` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT 'http://localhost/shisui/view/images/wand.png',
  `nb_friend` mediumint(8) NOT NULL DEFAULT '0',
  `attention` int(11) NOT NULL,
  `content` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`password`,`sex`,`mail_address`,`permission`,`registration_date`,`avater`,`nb_friend`,`attention`,`content`) values (17,'huilin','123','male','123','admin','2016-02-24 15:14:32','\"http://localhost/shisui/view/images/uploads/1457791884.jpg\"',1,6,'fsdfsdfsdfsdfsdfsdfsd'),(18,'郭总','1','female','1','normal','2016-02-24 16:05:47','http://localhost/shisui/view/images/uploads/1457314140.jpg',0,7,'55555555555555555'),(19,'二狗','2','male','2','normal','2016-02-24 16:06:35','\"http://localhost/shisui/view/images/uploads/1457804108.jpg\"',0,3,''),(20,'骨灰','321','female','321','normal','2016-02-24 09:32:16','http://localhost/shisui/view/images/wand.png',0,3,'2222233333333333'),(21,'woriwori','3','female','3','normal','2016-03-12 18:52:28','\"http://localhost/shisui/view/images/uploads/1457795820.png\"',0,5,'11111111'),(22,'帷顺','4','male','4','normal','2016-03-27 12:07:45','http://localhost/shisui/view/images/gravatar.png',0,0,'6666666666666666666');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
