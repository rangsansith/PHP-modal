# Host: localhost  (Version: 5.5.53)
# Date: 2017-10-24 08:52:57
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "tb_upfile"
#

DROP TABLE IF EXISTS `tb_upfile`;
CREATE TABLE `tb_upfile` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) CHARACTER SET gbk DEFAULT NULL,
  `filepath` varchar(255) CHARACTER SET gbk DEFAULT NULL,
  `uptime` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

#
# Data for table "tb_upfile"
#

/*!40000 ALTER TABLE `tb_upfile` DISABLE KEYS */;
INSERT INTO `tb_upfile` VALUES (1,'1.jpg','upload/1.jpg',NULL),(2,'1.mp3','upload/1.mp3',NULL),(3,'1.MP4','upload/1.MP4',NULL),(4,'eula.1028.txt','upload/eula.1028.txt',NULL),(5,'eula.1031.txt','upload/eula.1031.txt',NULL),(6,'eula.1033.txt','upload/eula.1033.txt',NULL);
/*!40000 ALTER TABLE `tb_upfile` ENABLE KEYS */;
