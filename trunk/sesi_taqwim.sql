/*
Navicat MySQL Data Transfer

Source Server         : Radius
Source Server Version : 50523
Source Host           : 202.185.6.131:3306
Source Database       : iptip

Target Server Type    : MYSQL
Target Server Version : 50523
File Encoding         : 65001

Date: 2012-12-06 15:00:48
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `sesi_taqwim`
-- ----------------------------
DROP TABLE IF EXISTS `sesi_taqwim`;
CREATE TABLE `sesi_taqwim` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `kod_item` varchar(20) DEFAULT NULL,
  `tarikh_mula` date DEFAULT NULL,
  `tarikh_tamat` date DEFAULT NULL,
  `sesi` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sesi_taqwim
-- ----------------------------
INSERT INTO `sesi_taqwim` VALUES ('1', 'DAF', '2011-12-31', '2011-12-31', '2012_1');
INSERT INTO `sesi_taqwim` VALUES ('2', 'UKH', '2011-12-31', '2012-01-08', '2012_1');
INSERT INTO `sesi_taqwim` VALUES ('3', 'KUL1', '2012-01-09', '2012-03-02', '2012_1');
INSERT INTO `sesi_taqwim` VALUES ('4', 'AKT', '2012-03-03', '2012-03-09', '2012_1');
INSERT INTO `sesi_taqwim` VALUES ('5', 'CUTI_MID', '2012-03-10', '2012-03-18', '2012_1');
INSERT INTO `sesi_taqwim` VALUES ('6', 'KUL2', '2012-03-19', '2012-04-27', '2012_1');
INSERT INTO `sesi_taqwim` VALUES ('7', 'STUDY', '2012-04-28', '2012-05-06', '2012_1');
INSERT INTO `sesi_taqwim` VALUES ('8', 'EXAM', '2012-05-07', '2012-05-22', '2012_1');
INSERT INTO `sesi_taqwim` VALUES ('9', 'CUTI_AKHIR', '2012-05-23', '2012-06-29', '2012_1');
INSERT INTO `sesi_taqwim` VALUES ('10', 'DAF', '2012-06-30', '2012-06-30', '2012_2');
INSERT INTO `sesi_taqwim` VALUES ('11', 'UKH', '2012-06-30', '2012-07-06', '2012_2');
INSERT INTO `sesi_taqwim` VALUES ('12', 'KUL1', '2012-07-09', '2012-08-17', '2012_2');
INSERT INTO `sesi_taqwim` VALUES ('13', 'AKT', '2012-08-18', '2012-08-26', '2012_2');
INSERT INTO `sesi_taqwim` VALUES ('14', 'CUTI_MID', '2012-08-27', '2012-10-19', '2012_2');
INSERT INTO `sesi_taqwim` VALUES ('15', 'KUL2', '2012-10-20', '2012-10-28', '2012_2');
INSERT INTO `sesi_taqwim` VALUES ('16', 'STUDY', '2012-10-29', '2012-11-04', '2012_2');
INSERT INTO `sesi_taqwim` VALUES ('17', 'EXAM', '2012-11-05', '2012-11-23', '2012_2');
INSERT INTO `sesi_taqwim` VALUES ('18', 'CUTI_AKHIR', '2012-11-24', '2013-01-04', '2012_2');

INSERT INTO `sesi_taqwim` VALUES ('19', 'DAF', '2012-12-31', '2012-12-31', '2013_1');
INSERT INTO `sesi_taqwim` VALUES ('20', 'UKH', '2012-12-31', '2013-01-08', '2013_1');
INSERT INTO `sesi_taqwim` VALUES ('21', 'KUL1', '2013-01-09', '2013-03-02', '2013_1');
INSERT INTO `sesi_taqwim` VALUES ('22', 'AKT', '2013-03-03', '2013-03-09', '2013_1');
INSERT INTO `sesi_taqwim` VALUES ('23', 'CUTI_MID', '2013-03-10', '2013-03-18', '2013_1');
INSERT INTO `sesi_taqwim` VALUES ('24', 'KUL2', '2013-03-19', '2013-04-27', '2013_1');
INSERT INTO `sesi_taqwim` VALUES ('25', 'STUDY', '2013-04-28', '2013-05-06', '2013_1');
INSERT INTO `sesi_taqwim` VALUES ('26', 'EXAM', '2013-05-07', '2013-05-22', '2013_1');
INSERT INTO `sesi_taqwim` VALUES ('27', 'CUTI_AKHIR', '2013-05-23', '2013-06-29', '2013_1');
INSERT INTO `sesi_taqwim` VALUES ('28', 'DAF', '2013-06-30', '2013-06-30', '2013_2');
INSERT INTO `sesi_taqwim` VALUES ('29', 'UKH', '2013-06-30', '2013-07-06', '2013_2');
INSERT INTO `sesi_taqwim` VALUES ('30', 'KUL1', '2013-07-09', '2013-08-17', '2013_2');
INSERT INTO `sesi_taqwim` VALUES ('31', 'AKT', '2013-08-18', '2013-08-26', '2013_2');
INSERT INTO `sesi_taqwim` VALUES ('32', 'CUTI_MID', '2013-08-27', '2013-10-19', '2013_2');
INSERT INTO `sesi_taqwim` VALUES ('33', 'KUL2', '2013-10-20', '2013-10-28', '2013_2');
INSERT INTO `sesi_taqwim` VALUES ('34', 'STUDY', '2013-10-29', '2013-11-04', '2013_2');
INSERT INTO `sesi_taqwim` VALUES ('35', 'EXAM', '2013-11-05', '2013-11-23', '2013_2');
INSERT INTO `sesi_taqwim` VALUES ('36', 'CUTI_AKHIR', '2013-11-24', '2014-01-04', '2013_2');

