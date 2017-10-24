# Host: localhost  (Version: 5.5.53)
# Date: 2017-10-24 08:52:28
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "tb_audio"
#

DROP TABLE IF EXISTS `tb_audio`;
CREATE TABLE `tb_audio` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `audio` text,
  `audioname` text,
  `audiopath` text,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

#
# Data for table "tb_audio"
#

/*!40000 ALTER TABLE `tb_audio` DISABLE KEYS */;
INSERT INTO `tb_audio` VALUES (2,'<video ishivideo=\'true\' autoplay=\'true\'>\r\n\t<source src=\'audio/1.MP4\' type=\'video/mp4\'></video>','1.MP4','audio/1.MP4','wwwwww'),(3,'<video ishivideo=\'true\' autoplay=\'true\'>\r\n\t<source src=\'audio/1.MP4\' type=\'video/mp4\'></video>','1.MP4','audio/1.MP4','qqqqqq'),(4,'<video ishivideo=\'true\' autoplay=\'true\'>\r\n\t<source src=\'audio/1.MP4\' type=\'video/mp4\'></video>','1.MP4','audio/1.MP4','');
/*!40000 ALTER TABLE `tb_audio` ENABLE KEYS */;

#
# Structure for table "tb_member"
#

DROP TABLE IF EXISTS `tb_member`;
CREATE TABLE `tb_member` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `answer` varchar(100) DEFAULT NULL,
  `question` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `count` int(1) DEFAULT '0',
  `active` int(1) DEFAULT '0',
  `blogname` varchar(255) DEFAULT NULL,
  `friend` text,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

#
# Data for table "tb_member"
#

/*!40000 ALTER TABLE `tb_member` DISABLE KEYS */;
INSERT INTO `tb_member` VALUES (1,'qqqqqq','343b1c4a3ea721b2d640fc8700db0f36','1','1','574114947@qq.com',0,1,'A',NULL),(5,'wwwwww','d785c99d298a4e9e6e13fe99e602ef42','12','12','595655811@qq.com',0,1,'BBB',NULL),(6,'eeeeee','cd87cd5ef753a06ee79fc75dc7cfe66c','1','1','574114947@qq.com',0,1,'C',NULL);
/*!40000 ALTER TABLE `tb_member` ENABLE KEYS */;

#
# Structure for table "tb_paper"
#

DROP TABLE IF EXISTS `tb_paper`;
CREATE TABLE `tb_paper` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `paper` text,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

#
# Data for table "tb_paper"
#

/*!40000 ALTER TABLE `tb_paper` DISABLE KEYS */;
INSERT INTO `tb_paper` VALUES (1,'1','wwwwww'),(2,'1','wwwwww'),(3,'1','wwwwww'),(4,'1','wwwwww'),(5,'1','wwwwww'),(6,'1','wwwwww'),(8,'1','wwwwww'),(9,'1','wwwwww'),(12,'1','wwwwww'),(13,'1','wwwwww'),(14,'1','wwwwww'),(15,'1','wwwwww'),(16,'1','wwwwww'),(17,'1','wwwwww'),(18,'1','wwwwww'),(20,'1','wwwwww'),(22,'1','wwwwww'),(23,'1','wwwwww'),(24,'123','qqqqqq'),(27,'123','qqqqqq'),(28,'13','qqqqqq'),(30,'1','qqqqqq'),(31,'1','qqqqqq'),(32,'123','qqqqqq'),(33,'123','qqqqqq'),(34,'23','qqqqqq'),(35,'13','qqqqqq'),(36,'asd','qqqqqq'),(37,'asd','qqqqqq'),(38,'123','qqqqqq'),(39,'12','qqqqqq'),(40,'13','qqqqqq'),(41,'13','qqqqqq'),(42,'13','qqqqqq'),(43,'21','qqqqqq'),(44,'12','qqqqqq'),(45,'23','qqqqqq'),(46,'12','qqqqqq'),(47,'13','qqqqqq');
/*!40000 ALTER TABLE `tb_paper` ENABLE KEYS */;

#
# Structure for table "tb_photo"
#

DROP TABLE IF EXISTS `tb_photo`;
CREATE TABLE `tb_photo` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `photo` text,
  `photoname` text,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

#
# Data for table "tb_photo"
#

/*!40000 ALTER TABLE `tb_photo` DISABLE KEYS */;
INSERT INTO `tb_photo` VALUES (5,'<img class=\'img-responsive\' src=\'photo/timg.jpg\'>','timg.jpg','wwwwww'),(6,'<img class=\'img-responsive\' src=\'photo/timg.jpg\'>','timg.jpg','qqqqqq');
/*!40000 ALTER TABLE `tb_photo` ENABLE KEYS */;
