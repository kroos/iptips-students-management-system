/*
Navicat MySQL Data Transfer

Source Server         : a3ncabal.dyndns.info
Source Server Version : 50522
Source Host           : a3ncabal.dyndns.info:3306
Source Database       : iptip

Target Server Type    : MYSQL
Target Server Version : 50522
File Encoding         : 65001

Date: 2012-11-13 03:38:57
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `akademik`
-- ----------------------------
DROP TABLE IF EXISTS `akademik`;
CREATE TABLE `akademik` (
  `ID` int(20) NOT NULL AUTO_INCREMENT,
  `matrik` varchar(20) DEFAULT NULL,
  `tahap` varchar(20) DEFAULT NULL,
  `institusi` varchar(100) DEFAULT NULL,
  `tahun` year(4) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of akademik
-- ----------------------------

-- ----------------------------
-- Table structure for `group`
-- ----------------------------
DROP TABLE IF EXISTS `group`;
CREATE TABLE `group` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_group` varchar(20) DEFAULT NULL,
  `nama_group` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of group
-- ----------------------------

-- ----------------------------
-- Table structure for `group_access`
-- ----------------------------
DROP TABLE IF EXISTS `group_access`;
CREATE TABLE `group_access` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `group` varchar(20) DEFAULT NULL,
  `id_skrip` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of group_access
-- ----------------------------

-- ----------------------------
-- Table structure for `modul_skrip`
-- ----------------------------
DROP TABLE IF EXISTS `modul_skrip`;
CREATE TABLE `modul_skrip` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `modul` varchar(20) DEFAULT NULL,
  `controller` varchar(100) DEFAULT NULL,
  `function` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of modul_skrip
-- ----------------------------

-- ----------------------------
-- Table structure for `pelajar`
-- ----------------------------
DROP TABLE IF EXISTS `pelajar`;
CREATE TABLE `pelajar` (
  `matrik` varchar(20) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `ic` varchar(50) DEFAULT NULL,
  `passport` varchar(50) DEFAULT NULL,
  `status_pljr` varchar(10) DEFAULT NULL,
  `dt_lahir` date DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `status_warga` tinyint(1) DEFAULT NULL,
  `warganegara` varchar(20) DEFAULT NULL,
  `bangsa` varchar(5) DEFAULT NULL,
  `jantina` varchar(1) DEFAULT NULL,
  `status_kahwin` varchar(5) DEFAULT NULL,
  `alamat1` varchar(100) DEFAULT NULL,
  `alamat2` varchar(100) DEFAULT NULL,
  `poskod` varchar(10) DEFAULT NULL,
  `bandar` varchar(10) DEFAULT NULL,
  `negeri` varchar(10) DEFAULT NULL,
  `negara` varchar(10) DEFAULT NULL,
  `dt_daftar` date DEFAULT NULL,
  `id_add` varchar(20) DEFAULT NULL,
  `dt_add` date DEFAULT NULL,
  `id_edit` varchar(20) DEFAULT NULL,
  `dt_edit` date DEFAULT NULL,
  PRIMARY KEY (`matrik`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pelajar
-- ----------------------------

-- ----------------------------
-- Table structure for `pelajar_mohon`
-- ----------------------------
DROP TABLE IF EXISTS `pelajar_mohon`;
CREATE TABLE `pelajar_mohon` (
  `matrik` varchar(20) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `ic` varchar(50) DEFAULT NULL,
  `passport` varchar(50) DEFAULT NULL,
  `dt_lahir` date DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `status_warga` tinyint(1) DEFAULT NULL,
  `warganegara` varchar(20) DEFAULT NULL,
  `bangsa` varchar(5) DEFAULT NULL,
  `jantina` varchar(1) DEFAULT NULL,
  `status_kahwin` varchar(5) DEFAULT NULL,
  `alamat1` varchar(100) DEFAULT NULL,
  `alamat2` varchar(100) DEFAULT NULL,
  `poskod` varchar(10) DEFAULT NULL,
  `bandar` varchar(10) DEFAULT NULL,
  `negeri` varchar(10) DEFAULT NULL,
  `negara` varchar(10) DEFAULT NULL,
  `id_add` varchar(20) DEFAULT NULL,
  `dt_add` date DEFAULT NULL,
  `id_edit` varchar(20) DEFAULT NULL,
  `dt_edit` date DEFAULT NULL,
  `layak` tinyint(1) DEFAULT NULL,
  `dt_transfer` datetime DEFAULT NULL,
  `id_transfer` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`matrik`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pelajar_mohon
-- ----------------------------

-- ----------------------------
-- Table structure for `subjek_akademik`
-- ----------------------------
DROP TABLE IF EXISTS `subjek_akademik`;
CREATE TABLE `subjek_akademik` (
  `ID` bigint(20) NOT NULL DEFAULT '0',
  `akademik_id` bigint(20) DEFAULT NULL,
  `subjek` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of subjek_akademik
-- ----------------------------

-- ----------------------------
-- Table structure for `user_data`
-- ----------------------------
DROP TABLE IF EXISTS `user_data`;
CREATE TABLE `user_data` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) CHARACTER SET latin1 NOT NULL,
  `ic` varchar(20) DEFAULT NULL,
  `dept` varchar(20) DEFAULT NULL,
  `name` tinytext CHARACTER SET latin1 NOT NULL,
  `address` tinytext CHARACTER SET latin1,
  `address2` tinytext CHARACTER SET latin1,
  `city` tinytext CHARACTER SET latin1,
  `state` tinytext CHARACTER SET latin1,
  `zip` tinytext CHARACTER SET latin1,
  `cellphone` tinytext CHARACTER SET latin1,
  `telephone` tinytext CHARACTER SET latin1,
  `email` tinytext CHARACTER SET latin1,
  `aim` tinytext CHARACTER SET latin1,
  `yahoo` tinytext CHARACTER SET latin1,
  `icq` tinytext CHARACTER SET latin1,
  `other` tinytext CHARACTER SET latin1,
  `dateAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`),
  KEY `Username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_data
-- ----------------------------

-- ----------------------------
-- Table structure for `user_group`
-- ----------------------------
DROP TABLE IF EXISTS `user_group`;
CREATE TABLE `user_group` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `group` varchar(20) DEFAULT NULL,
  `aktif` tinyint(1) DEFAULT '1' COMMENT '1=aktif; 0=tak aktif',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_group
-- ----------------------------
