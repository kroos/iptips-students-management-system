/*
Navicat MySQL Data Transfer

Source Server         : radius
Source Server Version : 50523
Source Host           : 202.185.6.131:3306
Source Database       : iptip

Target Server Type    : MYSQL
Target Server Version : 50523
File Encoding         : 65001

Date: 2012-11-16 01:21:12
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
-- Table structure for `dept_func`
-- ----------------------------
DROP TABLE IF EXISTS `dept_func`;
CREATE TABLE `dept_func` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user_department` int(11) NOT NULL,
  `id_user_function` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of dept_func
-- ----------------------------
INSERT INTO `dept_func` VALUES ('1', '1', '2');
INSERT INTO `dept_func` VALUES ('2', '2', '1');
INSERT INTO `dept_func` VALUES ('3', '3', '1');
INSERT INTO `dept_func` VALUES ('4', '4', '1');
INSERT INTO `dept_func` VALUES ('5', '5', '1');
INSERT INTO `dept_func` VALUES ('6', '6', '1');

-- ----------------------------
-- Table structure for `dept_jaw`
-- ----------------------------
DROP TABLE IF EXISTS `dept_jaw`;
CREATE TABLE `dept_jaw` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user_department` int(11) NOT NULL,
  `id_jawatan` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of dept_jaw
-- ----------------------------
INSERT INTO `dept_jaw` VALUES ('1', '2', '1');
INSERT INTO `dept_jaw` VALUES ('2', '2', '2');
INSERT INTO `dept_jaw` VALUES ('3', '2', '3');
INSERT INTO `dept_jaw` VALUES ('4', '2', '4');
INSERT INTO `dept_jaw` VALUES ('5', '2', '5');
INSERT INTO `dept_jaw` VALUES ('6', '2', '6');
INSERT INTO `dept_jaw` VALUES ('7', '2', '7');
INSERT INTO `dept_jaw` VALUES ('8', '3', '1');
INSERT INTO `dept_jaw` VALUES ('9', '3', '3');
INSERT INTO `dept_jaw` VALUES ('10', '3', '6');
INSERT INTO `dept_jaw` VALUES ('11', '3', '7');
INSERT INTO `dept_jaw` VALUES ('12', '3', '12');
INSERT INTO `dept_jaw` VALUES ('13', '4', '6');
INSERT INTO `dept_jaw` VALUES ('14', '4', '7');
INSERT INTO `dept_jaw` VALUES ('15', '4', '8');
INSERT INTO `dept_jaw` VALUES ('16', '4', '10');
INSERT INTO `dept_jaw` VALUES ('17', '5', '6');
INSERT INTO `dept_jaw` VALUES ('18', '5', '7');
INSERT INTO `dept_jaw` VALUES ('19', '5', '9');
INSERT INTO `dept_jaw` VALUES ('20', '5', '11');
INSERT INTO `dept_jaw` VALUES ('21', '6', '6');
INSERT INTO `dept_jaw` VALUES ('22', '6', '7');
INSERT INTO `dept_jaw` VALUES ('23', '6', '13');
INSERT INTO `dept_jaw` VALUES ('24', '6', '14');
INSERT INTO `dept_jaw` VALUES ('25', '6', '15');

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
-- Table structure for `jawatan`
-- ----------------------------
DROP TABLE IF EXISTS `jawatan`;
CREATE TABLE `jawatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jawatan` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of jawatan
-- ----------------------------
INSERT INTO `jawatan` VALUES ('1', 'Ketua Jabatan', 'Ketua Jabatan');
INSERT INTO `jawatan` VALUES ('2', 'Pensyarah', 'Pensyarah');
INSERT INTO `jawatan` VALUES ('3', 'Timbalan Ketua Jabatan', 'Timbalan Ketua Jabatan');
INSERT INTO `jawatan` VALUES ('4', 'Dekan', 'Dekan');
INSERT INTO `jawatan` VALUES ('5', 'Timbalan Dekan', 'Timbalan Dekan');
INSERT INTO `jawatan` VALUES ('6', 'Kerani', 'Kerani');
INSERT INTO `jawatan` VALUES ('7', 'PAR', 'PAR');
INSERT INTO `jawatan` VALUES ('8', 'Bendahari', 'Bendahari');
INSERT INTO `jawatan` VALUES ('9', 'Pendaftar', 'Pendaftar');
INSERT INTO `jawatan` VALUES ('10', 'Timbalan Bendahari', 'Timbalan Bendahari');
INSERT INTO `jawatan` VALUES ('11', 'Timbalan Pendaftar', 'Timbalan Pendaftar');
INSERT INTO `jawatan` VALUES ('12', 'Warden', 'Warden');
INSERT INTO `jawatan` VALUES ('13', 'Ketua Pustakawan', 'Ketua Pustakawan');
INSERT INTO `jawatan` VALUES ('14', 'Penolong Ketua Pustakawan', 'Penolong Ketua Pustakawan');
INSERT INTO `jawatan` VALUES ('15', 'Pustakawan', 'Pustakawan');

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
  `gred` varchar(10) DEFAULT NULL,
  `nilai_gred` decimal(10,0) DEFAULT NULL,
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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) CHARACTER SET latin1 NOT NULL,
  `ic` varchar(20) NOT NULL,
  `dept` varchar(20) DEFAULT NULL,
  `name` tinytext CHARACTER SET latin1 NOT NULL,
  `address` tinytext CHARACTER SET latin1,
  `city` tinytext CHARACTER SET latin1,
  `state` tinytext CHARACTER SET latin1,
  `zip` tinytext CHARACTER SET latin1,
  `cellphone` tinytext CHARACTER SET latin1,
  `telephone` tinytext CHARACTER SET latin1,
  `email` tinytext CHARACTER SET latin1 NOT NULL,
  `dateAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `Username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_data
-- ----------------------------
INSERT INTO `user_data` VALUES ('1', 'admin', '123123', '123456789012', 'ADMIN', 'Admin', '1, Taman Mutiara', 'Sungai Petani', 'Kedah', '08000', '0162172420', null, 'dhiauddin@gmail.com', '2012-11-13 09:16:19');

-- ----------------------------
-- Table structure for `user_department`
-- ----------------------------
DROP TABLE IF EXISTS `user_department`;
CREATE TABLE `user_department` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dept_ctrlr` varchar(255) NOT NULL,
  `dept` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_department
-- ----------------------------
INSERT INTO `user_department` VALUES ('1', 'isms', 'Umum');
INSERT INTO `user_department` VALUES ('2', 'hea', 'Hal Ehwal Akademik');
INSERT INTO `user_department` VALUES ('3', 'hep', 'Hal Ehwal Pelajar');
INSERT INTO `user_department` VALUES ('4', 'kewangan', 'Kewangan');
INSERT INTO `user_department` VALUES ('5', 'pendaftar', 'Pendaftar');
INSERT INTO `user_department` VALUES ('6', 'perpustakaan', 'Perpustakaan');

-- ----------------------------
-- Table structure for `user_dept`
-- ----------------------------
DROP TABLE IF EXISTS `user_dept`;
CREATE TABLE `user_dept` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user_data` int(11) NOT NULL,
  `id_user_department` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_dept
-- ----------------------------
INSERT INTO `user_dept` VALUES ('1', '1', '1');
INSERT INTO `user_dept` VALUES ('2', '1', '2');
INSERT INTO `user_dept` VALUES ('3', '1', '3');
INSERT INTO `user_dept` VALUES ('4', '1', '4');
INSERT INTO `user_dept` VALUES ('5', '1', '5');
INSERT INTO `user_dept` VALUES ('6', '1', '6');

-- ----------------------------
-- Table structure for `user_dept_func`
-- ----------------------------
DROP TABLE IF EXISTS `user_dept_func`;
CREATE TABLE `user_dept_func` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user_data` int(11) NOT NULL,
  `id_user_department` int(11) NOT NULL,
  `id_user_function` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'weather its active for the user or not',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_dept_func
-- ----------------------------
INSERT INTO `user_dept_func` VALUES ('1', '1', '1', '2', '0');
INSERT INTO `user_dept_func` VALUES ('2', '1', '2', '1', '0');
INSERT INTO `user_dept_func` VALUES ('3', '1', '3', '1', '0');
INSERT INTO `user_dept_func` VALUES ('4', '1', '4', '1', '0');
INSERT INTO `user_dept_func` VALUES ('5', '1', '5', '1', '0');
INSERT INTO `user_dept_func` VALUES ('6', '1', '6', '1', '0');

-- ----------------------------
-- Table structure for `user_dept_jaw`
-- ----------------------------
DROP TABLE IF EXISTS `user_dept_jaw`;
CREATE TABLE `user_dept_jaw` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user_department` int(11) NOT NULL,
  `id_jawatan` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_dept_jaw
-- ----------------------------

-- ----------------------------
-- Table structure for `user_function`
-- ----------------------------
DROP TABLE IF EXISTS `user_function`;
CREATE TABLE `user_function` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `function` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Function` (`function`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_function
-- ----------------------------
INSERT INTO `user_function` VALUES ('1', 'index', 'index page');
INSERT INTO `user_function` VALUES ('2', 'home', 'home page');

-- ----------------------------
-- Table structure for `user_group`
-- ----------------------------
DROP TABLE IF EXISTS `user_group`;
CREATE TABLE `user_group` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `group` varchar(20) NOT NULL,
  `aktif` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=aktif; 0=tak aktif',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_group
-- ----------------------------

-- ----------------------------
-- Table structure for `waris`
-- ----------------------------
DROP TABLE IF EXISTS `waris`;
CREATE TABLE `waris` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `pelajar_id` bigint(20) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `hubungan` varchar(50) DEFAULT NULL,
  `alamat1` longtext,
  `alamat2` longtext,
  `poskod` varchar(20) DEFAULT NULL,
  `no_telefon` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of waris
-- ----------------------------

-- ----------------------------
-- View structure for `view_department_function`
-- ----------------------------
DROP VIEW IF EXISTS `view_department_function`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `view_department_function` AS select `dept_func`.`id_user_department` AS `id_user_department`,`user_department`.`dept_ctrlr` AS `dept_ctrlr`,`user_department`.`dept` AS `dept`,`dept_func`.`id_user_function` AS `id_user_function`,`user_function`.`function` AS `function`,`user_function`.`remarks` AS `remarks` from ((`dept_func` join `user_department` on((`dept_func`.`id_user_department` = `user_department`.`id`))) join `user_function` on((`dept_func`.`id_user_function` = `user_function`.`id`))) group by `dept_func`.`id_user_department` ;

-- ----------------------------
-- View structure for `view_department_jawatan`
-- ----------------------------
DROP VIEW IF EXISTS `view_department_jawatan`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `view_department_jawatan` AS select `dept_jaw`.`id_user_department` AS `id_user_department`,`user_department`.`dept_ctrlr` AS `dept_ctrlr`,`user_department`.`dept` AS `dept`,`dept_jaw`.`id_jawatan` AS `id_jawatan`,`jawatan`.`jawatan` AS `jawatan`,`jawatan`.`remarks` AS `remarks` from ((`dept_jaw` join `jawatan` on((`dept_jaw`.`id_jawatan` = `jawatan`.`id`))) join `user_department` on((`dept_jaw`.`id_user_department` = `user_department`.`id`))) order by `dept_jaw`.`id_user_department`,`dept_jaw`.`id_jawatan` ;

-- ----------------------------
-- View structure for `view_user_access_level`
-- ----------------------------
DROP VIEW IF EXISTS `view_user_access_level`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `view_user_access_level` AS select `user_dept_func`.`id_user_data` AS `id_user_data`,`user_data`.`username` AS `username`,`user_dept_func`.`id_user_department` AS `id_user_department`,`user_department`.`dept_ctrlr` AS `dept_ctrlr`,`user_department`.`dept` AS `dept`,`user_dept_func`.`id_user_function` AS `id_user_function`,`user_function`.`function` AS `function`,`user_function`.`remarks` AS `remarks` from (((`user_data` join `user_department`) join `user_dept_func` on(((`user_dept_func`.`id_user_data` = `user_data`.`id`) and (`user_dept_func`.`id_user_department` = `user_department`.`id`)))) join `user_function` on((`user_dept_func`.`id_user_function` = `user_function`.`id`))) ;

-- ----------------------------
-- View structure for `view_user_department`
-- ----------------------------
DROP VIEW IF EXISTS `view_user_department`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `view_user_department` AS select `user_dept`.`id_user_data` AS `id_user_data`,`user_data`.`username` AS `username`,`user_data`.`password` AS `password`,`user_data`.`name` AS `name`,`user_dept`.`id_user_department` AS `id_user_department`,`user_department`.`dept_ctrlr` AS `dept_ctrlr`,`user_department`.`dept` AS `dept` from ((`user_data` join `user_dept` on((`user_dept`.`id_user_data` = `user_data`.`id`))) join `user_department` on((`user_dept`.`id_user_department` = `user_department`.`id`))) ;
