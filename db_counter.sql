# Host: localhost  (Version: 5.5.53)
# Date: 2017-10-24 08:53:50
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "tb_count"
#

DROP TABLE IF EXISTS `tb_count`;
CREATE TABLE `tb_count` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `counts` varchar(255) CHARACTER SET gbk DEFAULT NULL,
  `data1` varchar(255) CHARACTER SET gbk DEFAULT NULL,
  `data2` varchar(255) CHARACTER SET gbk DEFAULT NULL,
  `ip` varchar(255) CHARACTER SET gbk DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

#
# Data for table "tb_count"
#

/*!40000 ALTER TABLE `tb_count` DISABLE KEYS */;
INSERT INTO `tb_count` VALUES (1,'6','2017-10-10 09:10:40','2017-10-10','::1');
/*!40000 ALTER TABLE `tb_count` ENABLE KEYS */;
