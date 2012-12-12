/*
Navicat MySQL Data Transfer

Source Server         : Radius
Source Server Version : 50523
Source Host           : 202.185.6.131:3306
Source Database       : iptip

Target Server Type    : MYSQL
Target Server Version : 50523
File Encoding         : 65001

Date: 2012-12-13 06:56:36
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `akaun`
-- ----------------------------
DROP TABLE IF EXISTS `akaun`;
CREATE TABLE `akaun` (
  `id` bigint(10) NOT NULL AUTO_INCREMENT,
  `kod_jenis` varchar(2) DEFAULT NULL,
  `kod_akaun` varchar(10) DEFAULT NULL,
  `keterangan_MY` varchar(50) DEFAULT NULL,
  `keterangan_EN` varchar(50) DEFAULT NULL,
  `keterangan_AR` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of akaun
-- ----------------------------
INSERT INTO `akaun` VALUES ('1', '4', '40001', 'PENDAFTARAN', 'REGISTRATION', null);
INSERT INTO `akaun` VALUES ('2', '4', '40002', 'PERKHIDMATAN', 'SERCIVE', null);
INSERT INTO `akaun` VALUES ('3', '4', '40003', 'PERPUSTAKAAN & KOMPUTER', 'LIBRARY & COMPUTER', null);
INSERT INTO `akaun` VALUES ('4', '4', '40004', 'TAKAFUL', 'INSURANCE', null);
INSERT INTO `akaun` VALUES ('5', '4', '40005', 'KAD PELAJAR', 'STUDENT CARD', null);
INSERT INTO `akaun` VALUES ('6', '4', '40006', 'KO-KURIKULUM', 'CO-CURRICULUM', null);
INSERT INTO `akaun` VALUES ('7', '4', '40007', 'SUAIKENAL', 'ORIENTATION', null);
INSERT INTO `akaun` VALUES ('8', '4', '40008', 'PERMAI', 'PERMAI', null);
INSERT INTO `akaun` VALUES ('9', '4', '40009', 'PAKAIAN RASMI', 'OFFICIAL CLOTHES', null);
INSERT INTO `akaun` VALUES ('10', '4', '40010', 'PENGANGKUTAN', 'TRANSPORTATION', null);
INSERT INTO `akaun` VALUES ('11', '4', '40011', 'ASRAMA', 'HOSTEL', null);
INSERT INTO `akaun` VALUES ('12', '4', '40012', 'PENGAJIAN', 'TUITION', null);
INSERT INTO `akaun` VALUES ('13', '2', '20001', 'CAGARAN ASRAMA', 'HOSTEL DEPOSIT', null);
INSERT INTO `akaun` VALUES ('14', '4', '40013', 'YURAN PEPERIKSAAN STAM', 'STAM EXAMINATION FEE', null);

-- ----------------------------
-- Table structure for `app_akademik`
-- ----------------------------
DROP TABLE IF EXISTS `app_akademik`;
CREATE TABLE `app_akademik` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `id_mohon` varchar(20) DEFAULT NULL,
  `level` varchar(20) DEFAULT NULL,
  `institusi` varchar(100) DEFAULT NULL,
  `tahun` year(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of app_akademik
-- ----------------------------
INSERT INTO `app_akademik` VALUES ('1', '2', 'SPM', 'Maahad Mahmud', '1995');
INSERT INTO `app_akademik` VALUES ('2', '2', 'MATRIK', 'Universiti Malaya, Kuala Lumpur', '1998');
INSERT INTO `app_akademik` VALUES ('3', '3', 'SPM', 'Sek Men Agamakat Tepi Tu', '1998');
INSERT INTO `app_akademik` VALUES ('4', '3', 'MATRIK', 'Sek Men Agama Kat Tepi Tu 1', '2000');
INSERT INTO `app_akademik` VALUES ('5', '1', 'SPM', 'Smk Bapak Ku', '2006');
INSERT INTO `app_akademik` VALUES ('6', '5', 'SPM', 'Smk Ntah', '1995');
INSERT INTO `app_akademik` VALUES ('7', '5', 'MATRIK', 'Universiti Islam Antarabangsa', '2000');
INSERT INTO `app_akademik` VALUES ('8', '6', 'MATRIK', 'Universiti Islam Antarabangsa', '2000');
INSERT INTO `app_akademik` VALUES ('9', '7', 'SPM', 'Sek Men Agama Kat Tepi Tu 2', '1995');
INSERT INTO `app_akademik` VALUES ('10', '12', 'SPM', 'Smk Bapak Aku', '1998');
INSERT INTO `app_akademik` VALUES ('11', '12', 'STAM', 'Universiti Islam Antarabangsa', '2003');

-- ----------------------------
-- Table structure for `app_pelajar`
-- ----------------------------
DROP TABLE IF EXISTS `app_pelajar`;
CREATE TABLE `app_pelajar` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `siri_mohon` varchar(20) DEFAULT NULL,
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
  `notel` varchar(20) DEFAULT NULL,
  `nohp` varchar(20) DEFAULT NULL,
  `emel` varchar(50) DEFAULT NULL,
  `id_add` varchar(20) DEFAULT NULL,
  `dt_add` date DEFAULT NULL,
  `id_edit` varchar(20) DEFAULT NULL,
  `dt_edit` date DEFAULT NULL,
  `dt_transfer` datetime DEFAULT NULL,
  `id_transfer` varchar(20) DEFAULT NULL,
  `sesi_mohon` varchar(20) DEFAULT NULL,
  `status_mohon` varchar(10) DEFAULT 'DIP',
  `progTawar` varchar(20) DEFAULT NULL,
  `aktif` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `siri_mohon` (`siri_mohon`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of app_pelajar
-- ----------------------------
INSERT INTO `app_pelajar` VALUES ('1', 'P1310002', 'Ahmad', '900101025556', '1113', '2012-12-03', 'M010701', '1', 'A12', '2022', '2', '1', 'Tmn Peruda', '', '05300', 'M010101', '01', 'M01', '0', '0', '0', '1', '2012-12-03', '1', '2012-12-09', null, null, '2013_1', 'TW', 'PST', '1');
INSERT INTO `app_pelajar` VALUES ('2', 'P1310003', 'Student 1', '800101025555', '111234', '2012-12-03', 'M010701', '2', 'A09', '2043', '1', '1', 'Tmn Peruda', '', '05300', 'M010217', '02', 'M01', '0', '0', 'stud1@mail.com', '1', '2012-12-04', '1', '2012-12-13', null, null, '2013_1', 'TW', 'DQH', '1');
INSERT INTO `app_pelajar` VALUES ('3', 'P1310004', 'Student 4 Bin Bapak Dia', '3232323232', '323232', '2012-12-03', 'M010701', '2', 'B03', '1103', '1', '1', 'Tmn Peruda', '', '05300', 'M010101', '01', 'M01', '0', '0', 'asd@asd.com', '1', '2012-12-05', '1', '2012-12-12', null, null, '2013_1', 'TW', 'DSY', '1');
INSERT INTO `app_pelajar` VALUES ('4', 'P1310005', 'Student 3', '900101025555', '1112', '2012-12-03', 'M010701', '1', 'A12', '2022', '1', '1', 'Tmn Peruda', '', '05300', 'M010101', '01', 'M01', '0', '0', '0', '1', '2012-12-05', '1', '2012-12-09', null, null, '2013_1', 'INC', null, '1');
INSERT INTO `app_pelajar` VALUES ('5', 'P1310006', 'Student 2', '123456789014', '123456789014', '2012-12-06', 'M010701', '1', 'A01', '100', '1', '1', '72, Taman Keranji', '', '05400', 'M010201', '02', 'M01', '', '0162052420', 'email@email.com', '1', '2012-12-06', '1', '2012-12-07', null, null, '2013_1', 'DIP', null, '1');
INSERT INTO `app_pelajar` VALUES ('6', 'P1310007', 'Student 4', '123456789015', '123456789015', '2012-12-06', 'M010502', '1', 'A04', '2039', '2', '1', '2, Taman Mutiara', '', '08000', 'M010202', '02', 'M01', '', '0162052420', 'email1@email.com', '1', '2012-12-06', '1', '2012-12-09', null, null, '2013_1', 'GL', '', '0');
INSERT INTO `app_pelajar` VALUES ('7', 'P1310008', 'Student 5', '123456789016', '123456789016', '2012-12-06', 'M010701', '1', 'A12', '2022', '2', '1', '2, Taman Mutiara', '', '08000', 'M010218', '02', 'M01', '', '0162052420', 'email5@email.com', '1', '2012-12-06', null, null, null, null, '2013_1', 'DIP', null, '1');
INSERT INTO `app_pelajar` VALUES ('8', 'P1310001', 'Student 2', '123456789017', '123456789017', '2012-12-06', 'M010701', '1', 'A01', '100', '1', '1', '72, Taman Keranji', '', '05400', 'M010201', '02', 'M01', '', '0162052420', 'email@email.com', '1', '2012-12-08', null, null, null, null, '2013_1', 'DIP', null, '1');
INSERT INTO `app_pelajar` VALUES ('12', 'P1310009', 'Student 6', '123456789020', '-', '2012-12-09', 'M010232', '1', 'M01', '100', '1', '1', '7, Taman Mutiara', '', '08000', 'M010232', '02', 'M01', '', '0162052420', 'email6@email.com', '1', '2012-12-09', '1', '2012-12-09', null, null, '2013_1', 'DIP', null, '1');

-- ----------------------------
-- Table structure for `app_progmohon`
-- ----------------------------
DROP TABLE IF EXISTS `app_progmohon`;
CREATE TABLE `app_progmohon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_mohon` bigint(20) DEFAULT NULL,
  `siri_mohon` varchar(30) DEFAULT NULL,
  `kod_prog` varchar(20) DEFAULT NULL,
  `pilihan` int(1) DEFAULT NULL,
  `status_mohon` varchar(20) DEFAULT 'DIP',
  `user_edit` varchar(20) DEFAULT NULL,
  `dt_edit` datetime DEFAULT NULL,
  `catatan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of app_progmohon
-- ----------------------------
INSERT INTO `app_progmohon` VALUES ('1', '1', 'P1310002', 'DQH', '1', 'TW', '1', '2012-12-09 03:04:58', 'Penawaran Program PST Ditawarkan Program Yang Lain Sbb Xdak Basic');
INSERT INTO `app_progmohon` VALUES ('2', '2', 'P1310003', 'ST', '1', 'GL', '1', '2012-12-13 05:14:35', 'Penawaran Program Yang Lain');
INSERT INTO `app_progmohon` VALUES ('3', '2', 'P1310003', 'PST', '2', 'GL', '1', '2012-12-13 05:14:35', 'Penawaran Program Yang Lain');
INSERT INTO `app_progmohon` VALUES ('4', '3', 'P1310004', 'DSY', '1', 'TW', '1', '2012-12-12 14:04:02', 'Penawaran Program DSY Catatan : Permohonan Gagal');
INSERT INTO `app_progmohon` VALUES ('5', '3', 'P1310004', 'DQH', '2', 'GL', '1', '2012-12-12 14:04:02', 'Penawaran Program Yang Lain');
INSERT INTO `app_progmohon` VALUES ('6', '3', 'P1310004', 'DUS', '3', 'GL', '1', '2012-12-12 14:04:02', 'Penawaran Program Yang Lain');
INSERT INTO `app_progmohon` VALUES ('7', '4', 'P1310002', 'DSY', '1', 'INC', '1', '2012-12-09 03:05:21', 'Maklumat Tidak Lengkap');
INSERT INTO `app_progmohon` VALUES ('8', '2', 'P1310003', 'DQH', '1', 'TW', '1', '2012-12-13 05:14:35', 'Penawaran Program DQH Dapat Yang Ni');
INSERT INTO `app_progmohon` VALUES ('9', '5', 'P1310006', 'DSY', '1', 'GL', '1', '2012-12-07 09:04:43', 'Permohonan Gagal');
INSERT INTO `app_progmohon` VALUES ('10', '5', 'P1310006', 'DUS', '2', 'GL', '1', '2012-12-07 09:04:43', 'Permohonan Gagal');
INSERT INTO `app_progmohon` VALUES ('11', '5', 'P1310006', 'ST', '3', 'GL', '1', '2012-12-07 09:04:43', 'Permohonan Gagal');
INSERT INTO `app_progmohon` VALUES ('12', '5', 'P1310006', 'PST', '4', 'GL', '1', '2012-12-07 09:04:43', 'Permohonan Gagal');
INSERT INTO `app_progmohon` VALUES ('13', '6', 'P1310007', 'DUS', '1', 'GL', '1', '2012-12-09 03:05:53', 'Permohonan Gagal');
INSERT INTO `app_progmohon` VALUES ('14', '7', 'P1310008', 'DSY', '1', 'DIP', '1', '2012-12-06 14:36:59', 'Qwe');
INSERT INTO `app_progmohon` VALUES ('15', '7', 'P1310008', 'DUS', '2', 'DIP', '1', '2012-12-06 14:37:00', 'Qwe');
INSERT INTO `app_progmohon` VALUES ('16', '7', 'P1310008', 'ST', '3', 'DIP', '1', '2012-12-06 14:37:00', 'Qwe');
INSERT INTO `app_progmohon` VALUES ('17', '12', 'P1310009', 'ST', '1', 'DIP', '1', '2012-12-09 15:57:06', 'Stam');
INSERT INTO `app_progmohon` VALUES ('18', '12', 'P1310009', 'PST', '2', 'DIP', '1', '2012-12-09 15:57:06', 'Pra Stam');
INSERT INTO `app_progmohon` VALUES ('19', '12', 'P1310009', 'ST', '1', 'DIP', '1', '2012-12-09 16:31:47', 'Stam');
INSERT INTO `app_progmohon` VALUES ('20', '12', 'P1310009', 'PST', '2', 'DIP', '1', '2012-12-09 16:31:48', 'Pra Stam');

-- ----------------------------
-- Table structure for `app_subjek_akademik`
-- ----------------------------
DROP TABLE IF EXISTS `app_subjek_akademik`;
CREATE TABLE `app_subjek_akademik` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `akademik_id` bigint(20) DEFAULT NULL,
  `subjek` varchar(50) DEFAULT NULL,
  `gred` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of app_subjek_akademik
-- ----------------------------
INSERT INTO `app_subjek_akademik` VALUES ('1', '1', 'Sub38', '7');
INSERT INTO `app_subjek_akademik` VALUES ('2', '1', 'Sub42', '6');
INSERT INTO `app_subjek_akademik` VALUES ('3', '1', 'Sub41', '1');
INSERT INTO `app_subjek_akademik` VALUES ('4', '1', 'Sub54', '1');
INSERT INTO `app_subjek_akademik` VALUES ('5', '1', 'Sub83', '2');
INSERT INTO `app_subjek_akademik` VALUES ('6', '1', 'Sub50', '1');
INSERT INTO `app_subjek_akademik` VALUES ('7', '1', 'Sub102', '1');
INSERT INTO `app_subjek_akademik` VALUES ('8', '1', 'Sub101', '1');
INSERT INTO `app_subjek_akademik` VALUES ('9', '1', 'Sub175', '6');
INSERT INTO `app_subjek_akademik` VALUES ('10', '2', 'Sub258', 'Lulus');
INSERT INTO `app_subjek_akademik` VALUES ('11', '2', 'Sub259', 'Lulus');
INSERT INTO `app_subjek_akademik` VALUES ('12', '2', 'Sub260', 'Lulus');
INSERT INTO `app_subjek_akademik` VALUES ('13', '2', 'Sub261', 'Lulus');
INSERT INTO `app_subjek_akademik` VALUES ('14', '3', 'Sub38', '1');
INSERT INTO `app_subjek_akademik` VALUES ('15', '3', 'Sub37', '1');
INSERT INTO `app_subjek_akademik` VALUES ('16', '4', 'Sub258', '1');
INSERT INTO `app_subjek_akademik` VALUES ('17', '4', 'Sub260', '1');
INSERT INTO `app_subjek_akademik` VALUES ('18', '4', 'Sub259', '1');
INSERT INTO `app_subjek_akademik` VALUES ('19', '5', 'Sub45', '9.00');
INSERT INTO `app_subjek_akademik` VALUES ('20', '5', 'Sub194', '5.00');
INSERT INTO `app_subjek_akademik` VALUES ('21', '5', 'Sub56', '8.00');
INSERT INTO `app_subjek_akademik` VALUES ('22', '6', 'Sub30', '9.00');
INSERT INTO `app_subjek_akademik` VALUES ('23', '6', 'Sub44', '9.00');
INSERT INTO `app_subjek_akademik` VALUES ('24', '6', 'Sub40', '9.00');
INSERT INTO `app_subjek_akademik` VALUES ('25', '6', 'Sub36', '9.00');
INSERT INTO `app_subjek_akademik` VALUES ('26', '6', 'Sub37', '9.00');
INSERT INTO `app_subjek_akademik` VALUES ('27', '7', 'Sub261', '4.00');
INSERT INTO `app_subjek_akademik` VALUES ('28', '7', 'Sub260', '4.00');
INSERT INTO `app_subjek_akademik` VALUES ('29', '7', 'Sub259', '4.00');
INSERT INTO `app_subjek_akademik` VALUES ('30', '7', 'Sub258', '4.00');
INSERT INTO `app_subjek_akademik` VALUES ('31', '8', 'Sub261', '4.00');
INSERT INTO `app_subjek_akademik` VALUES ('32', '8', 'Sub260', '4.00');
INSERT INTO `app_subjek_akademik` VALUES ('33', '8', 'Sub259', '0.00');
INSERT INTO `app_subjek_akademik` VALUES ('34', '8', 'Sub258', '4.00');
INSERT INTO `app_subjek_akademik` VALUES ('35', '9', 'Sub37', '9.00');
INSERT INTO `app_subjek_akademik` VALUES ('36', '9', 'Sub30', '9.00');
INSERT INTO `app_subjek_akademik` VALUES ('37', '10', 'Sub31', '9.00');
INSERT INTO `app_subjek_akademik` VALUES ('38', '10', 'Sub194', '7.00');
INSERT INTO `app_subjek_akademik` VALUES ('39', '10', 'Sub78', '2.00');
INSERT INTO `app_subjek_akademik` VALUES ('40', '10', 'Sub58', '9.00');
INSERT INTO `app_subjek_akademik` VALUES ('41', '10', 'Sub79', '9.00');
INSERT INTO `app_subjek_akademik` VALUES ('42', '11', 'Sub207', '8.00');
INSERT INTO `app_subjek_akademik` VALUES ('43', '11', 'Sub198', '8.00');
INSERT INTO `app_subjek_akademik` VALUES ('44', '11', 'Sub197', '8.00');
INSERT INTO `app_subjek_akademik` VALUES ('45', '11', 'Sub203', '8.00');
INSERT INTO `app_subjek_akademik` VALUES ('46', '11', 'Sub205', '8.00');
INSERT INTO `app_subjek_akademik` VALUES ('47', '11', 'Sub208', '8.00');
INSERT INTO `app_subjek_akademik` VALUES ('48', '11', 'Sub212', '8.00');
INSERT INTO `app_subjek_akademik` VALUES ('49', '11', 'Sub219', '8.00');
INSERT INTO `app_subjek_akademik` VALUES ('50', '11', 'Sub223', '8.00');
INSERT INTO `app_subjek_akademik` VALUES ('51', '11', 'Sub227', '8.00');

-- ----------------------------
-- Table structure for `app_waris`
-- ----------------------------
DROP TABLE IF EXISTS `app_waris`;
CREATE TABLE `app_waris` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_mohon` varchar(20) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `hubungan` varchar(50) DEFAULT NULL,
  `alamat1` longtext,
  `alamat2` longtext,
  `poskod` varchar(10) DEFAULT NULL,
  `notel_rumah` varchar(11) DEFAULT NULL,
  `notel_pej` varchar(20) DEFAULT NULL,
  `nohp` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of app_waris
-- ----------------------------
INSERT INTO `app_waris` VALUES ('1', '2', 'Parent 1', 'H04', '1, Taman Mutiara', '', '08000', '', '', '0162052420', 'email@email.com');
INSERT INTO `app_waris` VALUES ('2', '3', 'Parent 2', 'H04', '2, Taman Mutiara', '', '08000', '', '', '0162052420', 'email1@email.com');
INSERT INTO `app_waris` VALUES ('3', '8', 'Parent 2', 'H04', '1, Tamana Mutiara', '', '08000', '', '', '0162052420', 'parent2@email.com');
INSERT INTO `app_waris` VALUES ('4', '6', 'Parent 4', 'H04', '2, Taman Mutiara', '', '05400', '', '', '0162052420', 'parent4@email.com');
INSERT INTO `app_waris` VALUES ('5', '7', 'Parent 5', 'H07', '1, Taman Mutiara', '', '05400', '', '', '0162052420', 'parent5@email.com');
INSERT INTO `app_waris` VALUES ('6', '1', 'Parent 3', 'H04', 'ntah la haih', null, '00000', null, null, '0162172420', 'parent3@email.com');
INSERT INTO `app_waris` VALUES ('7', '4', 'Parent 6', 'H04', 'aku pun ta tau', null, '00000', null, null, '1234567890', 'parent6@email.com');
INSERT INTO `app_waris` VALUES ('8', '5', 'Parent 7', 'H04', 'huwaicchhhh', null, '00000', null, null, '1234567891', 'parent7@email.com');
INSERT INTO `app_waris` VALUES ('9', '12', 'Spouse 6', 'H02', '72, Jalan Keranji 11,\r\nTaman Keranji,\r\nJalan Alor Mengkudu,', '', '05400', '', '', '0162052420', 'parent6@email.com');
INSERT INTO `app_waris` VALUES ('10', '12', 'Spouse 6', 'H02', '72, Jalan Keranji 11,\r\nTaman Keranji,\r\nJalan Alor Mengkudu,', '', '05400', '', '', '0162052420', 'parent6@email.com');

-- ----------------------------
-- Table structure for `ci_sessions`
-- ----------------------------
DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ci_sessions
-- ----------------------------
INSERT INTO `ci_sessions` VALUES ('749515a09eb830a7fdb65e417a97cac8', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:17.0) Gecko/20100101 Firefox/17.0', '1355347448', 'a:4:{s:7:\"id_user\";s:1:\"1\";s:8:\"username\";s:6:\"admin1\";s:8:\"password\";s:6:\"123123\";s:9:\"logged_in\";b:1;}');
INSERT INTO `ci_sessions` VALUES ('ab4cde1782eb6f1e1c5ddc55ac8c5ed5', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:17.0) Gecko/20100101 Firefox/17.0', '1355351328', 'a:5:{s:9:\"user_data\";s:0:\"\";s:7:\"id_user\";s:1:\"1\";s:8:\"username\";s:6:\"admin1\";s:8:\"password\";s:6:\"123123\";s:9:\"logged_in\";b:1;}');
INSERT INTO `ci_sessions` VALUES ('ae64f33c4bf56b46ac83566e1fd0b9a7', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:17.0) Gecko/20100101 Firefox/17.0', '1355352613', 'a:1:{s:9:\"user_data\";s:0:\"\";}');
INSERT INTO `ci_sessions` VALUES ('b087196227fa943aa888325c9cd6ae75', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:17.0) Gecko/20100101 Firefox/17.0', '1355349512', 'a:5:{s:9:\"user_data\";s:0:\"\";s:7:\"id_user\";s:1:\"1\";s:8:\"username\";s:6:\"admin1\";s:8:\"password\";s:6:\"123123\";s:9:\"logged_in\";b:1;}');
INSERT INTO `ci_sessions` VALUES ('b56181a95babccb776465e5b0d36e750', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:17.0) Gecko/20100101 Firefox/17.0', '1481359334', 'a:1:{s:9:\"user_data\";s:0:\"\";}');
INSERT INTO `ci_sessions` VALUES ('f3127d9c7780643083c789e797e999d0', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:17.0) Gecko/20100101 Firefox/17.0', '1355352453', 'a:5:{s:9:\"user_data\";s:0:\"\";s:7:\"id_user\";s:1:\"1\";s:8:\"username\";s:6:\"admin1\";s:8:\"password\";s:6:\"123123\";s:9:\"logged_in\";b:1;}');

-- ----------------------------
-- Table structure for `dept_func`
-- ----------------------------
DROP TABLE IF EXISTS `dept_func`;
CREATE TABLE `dept_func` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user_department` int(11) NOT NULL,
  `id_user_function` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of dept_func
-- ----------------------------
INSERT INTO `dept_func` VALUES ('2', '2', '1');
INSERT INTO `dept_func` VALUES ('3', '3', '1');
INSERT INTO `dept_func` VALUES ('4', '4', '1');
INSERT INTO `dept_func` VALUES ('5', '5', '1');
INSERT INTO `dept_func` VALUES ('6', '6', '1');
INSERT INTO `dept_func` VALUES ('7', '1', '4');
INSERT INTO `dept_func` VALUES ('8', '1', '5');
INSERT INTO `dept_func` VALUES ('9', '1', '6');
INSERT INTO `dept_func` VALUES ('10', '1', '7');
INSERT INTO `dept_func` VALUES ('11', '1', '8');
INSERT INTO `dept_func` VALUES ('12', '5', '9');
INSERT INTO `dept_func` VALUES ('13', '1', '10');
INSERT INTO `dept_func` VALUES ('14', '5', '11');
INSERT INTO `dept_func` VALUES ('15', '2', '12');
INSERT INTO `dept_func` VALUES ('16', '5', '13');
INSERT INTO `dept_func` VALUES ('17', '5', '14');
INSERT INTO `dept_func` VALUES ('18', '5', '15');
INSERT INTO `dept_func` VALUES ('19', '5', '16');
INSERT INTO `dept_func` VALUES ('20', '4', '17');
INSERT INTO `dept_func` VALUES ('21', '4', '18');
INSERT INTO `dept_func` VALUES ('22', '5', '19');
INSERT INTO `dept_func` VALUES ('23', '5', '20');
INSERT INTO `dept_func` VALUES ('24', '5', '21');
INSERT INTO `dept_func` VALUES ('25', '1', '22');
INSERT INTO `dept_func` VALUES ('26', '5', '23');
INSERT INTO `dept_func` VALUES ('27', '5', '24');

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
-- Table structure for `dept_jaw_func`
-- ----------------------------
DROP TABLE IF EXISTS `dept_jaw_func`;
CREATE TABLE `dept_jaw_func` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_department` int(11) NOT NULL,
  `user_jawatan` int(11) DEFAULT NULL,
  `user_function` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dept_jaw_func
-- ----------------------------
INSERT INTO `dept_jaw_func` VALUES ('1', '0', '0', '0');

-- ----------------------------
-- Table structure for `host_bilik`
-- ----------------------------
DROP TABLE IF EXISTS `host_bilik`;
CREATE TABLE `host_bilik` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `kodhostel` varchar(20) DEFAULT NULL,
  `nobilik` varchar(20) DEFAULT NULL,
  `harga_hari` double(8,2) DEFAULT NULL,
  `harga_bulan` double(8,2) DEFAULT NULL,
  `max_capacity` int(3) DEFAULT NULL,
  `aktif` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx1` (`nobilik`,`kodhostel`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of host_bilik
-- ----------------------------

-- ----------------------------
-- Table structure for `hostel`
-- ----------------------------
DROP TABLE IF EXISTS `hostel`;
CREATE TABLE `hostel` (
  `kodhostel` varchar(20) NOT NULL,
  `namahostel` varchar(50) DEFAULT NULL,
  `alamat1` varchar(100) DEFAULT NULL,
  `alamat2` varchar(100) DEFAULT NULL,
  `bandar` varchar(20) DEFAULT NULL,
  `negeri` varchar(20) DEFAULT NULL,
  `negara` varchar(20) DEFAULT NULL,
  `kat_jantina` tinyint(1) DEFAULT NULL COMMENT '1=lelaki; 2=perempuan',
  `aktif` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`kodhostel`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of hostel
-- ----------------------------

-- ----------------------------
-- Table structure for `item_taqwim`
-- ----------------------------
DROP TABLE IF EXISTS `item_taqwim`;
CREATE TABLE `item_taqwim` (
  `kod_item` varchar(20) NOT NULL,
  `item_MY` varchar(50) DEFAULT NULL,
  `item_EN` varchar(50) DEFAULT NULL,
  `item_AR` varchar(50) DEFAULT NULL,
  `posisi` tinyint(3) DEFAULT NULL,
  PRIMARY KEY (`kod_item`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of item_taqwim
-- ----------------------------
INSERT INTO `item_taqwim` VALUES ('AKT', 'MINGGU AKTIVITI PELAJAR', null, null, '4');
INSERT INTO `item_taqwim` VALUES ('CUTI_AKHIR', 'CUTI AKHIR SEMESTER', null, null, '9');
INSERT INTO `item_taqwim` VALUES ('CUTI_MID', 'CUTI PERTENGAHAN SEMESTER', null, null, '5');
INSERT INTO `item_taqwim` VALUES ('DAF', 'PENDAFTARAN PELAJAR', null, null, '1');
INSERT INTO `item_taqwim` VALUES ('EXAM', 'PEPERIKSAAN AKHIR SEMESTER', null, null, '8');
INSERT INTO `item_taqwim` VALUES ('KUL1', 'KULIAH', null, null, '3');
INSERT INTO `item_taqwim` VALUES ('KUL2', 'KULIAH', null, null, '6');
INSERT INTO `item_taqwim` VALUES ('STUDY', 'MINGGU ULANGKAJI', null, null, '7');
INSERT INTO `item_taqwim` VALUES ('UKH', 'MINGGU UKHUWWAH', null, null, '2');

-- ----------------------------
-- Table structure for `jabatan`
-- ----------------------------
DROP TABLE IF EXISTS `jabatan`;
CREATE TABLE `jabatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kod_matrik` int(11) NOT NULL,
  `kod_jabatan` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `catitan` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jabatan
-- ----------------------------
INSERT INTO `jabatan` VALUES ('1', '11', 'THF', 'Tahfiz', 'Tahfiz');
INSERT INTO `jabatan` VALUES ('2', '12', 'ULD', 'Usuluddin', 'Usuluddin');
INSERT INTO `jabatan` VALUES ('3', '13', 'QRN', 'Quran', 'Quran');
INSERT INTO `jabatan` VALUES ('5', '14', 'STAM', 'STAM', 'STAM');
INSERT INTO `jabatan` VALUES ('6', '15', 'PSTAM', 'PSTAM', 'PSTAM');

-- ----------------------------
-- Table structure for `jenis_akaun`
-- ----------------------------
DROP TABLE IF EXISTS `jenis_akaun`;
CREATE TABLE `jenis_akaun` (
  `id_jenis` varchar(10) NOT NULL,
  `nama_jenis` varchar(20) DEFAULT NULL,
  `kod_jenis` int(2) DEFAULT NULL,
  PRIMARY KEY (`id_jenis`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jenis_akaun
-- ----------------------------
INSERT INTO `jenis_akaun` VALUES ('JENIS1', 'ASSET', '1');
INSERT INTO `jenis_akaun` VALUES ('JENIS2', 'LIABILITY', '2');
INSERT INTO `jenis_akaun` VALUES ('JENIS3', 'EQUITY', '3');
INSERT INTO `jenis_akaun` VALUES ('JENIS4', 'REVENUE', '4');
INSERT INTO `jenis_akaun` VALUES ('JENIS5', 'EXPENSE', '6');

-- ----------------------------
-- Table structure for `lect_ajar`
-- ----------------------------
DROP TABLE IF EXISTS `lect_ajar`;
CREATE TABLE `lect_ajar` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `nostaf` varchar(20) DEFAULT NULL,
  `kodsubjek` varchar(20) DEFAULT NULL,
  `sesi` varchar(20) DEFAULT NULL,
  `aktif` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lect_ajar
-- ----------------------------

-- ----------------------------
-- Table structure for `pel_akademik`
-- ----------------------------
DROP TABLE IF EXISTS `pel_akademik`;
CREATE TABLE `pel_akademik` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `matrik` varchar(20) DEFAULT NULL,
  `level` varchar(20) DEFAULT NULL,
  `institusi` varchar(100) DEFAULT NULL,
  `tahun` year(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pel_akademik
-- ----------------------------

-- ----------------------------
-- Table structure for `pel_dafhostel`
-- ----------------------------
DROP TABLE IF EXISTS `pel_dafhostel`;
CREATE TABLE `pel_dafhostel` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `matrik` varchar(20) DEFAULT NULL,
  `idbilik` varchar(20) DEFAULT NULL,
  `tarikh_masuk` date DEFAULT NULL,
  `tarikh_keluar` date DEFAULT NULL,
  `sesi` varchar(20) DEFAULT NULL,
  `id_add` varchar(20) DEFAULT NULL,
  `dt_add` date DEFAULT NULL,
  `id_edit` varchar(20) DEFAULT NULL,
  `dt_edit` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pel_dafhostel
-- ----------------------------

-- ----------------------------
-- Table structure for `pel_daftarsubjek`
-- ----------------------------
DROP TABLE IF EXISTS `pel_daftarsubjek`;
CREATE TABLE `pel_daftarsubjek` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `matrik` varchar(20) DEFAULT NULL,
  `kodsubjek` varchar(20) DEFAULT NULL,
  `sesi` varchar(20) DEFAULT NULL,
  `sem` double(2,1) DEFAULT NULL,
  `kredit` int(1) DEFAULT NULL,
  `id_add` varchar(20) DEFAULT NULL,
  `dt_add` datetime DEFAULT NULL,
  `id_edit` varchar(20) DEFAULT NULL,
  `dt_edit` datetime DEFAULT NULL,
  `id_drop` varchar(20) DEFAULT NULL,
  `dt_drop` datetime DEFAULT NULL,
  `sbb_batal` varchar(10) DEFAULT NULL,
  `aktif` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pel_daftarsubjek
-- ----------------------------

-- ----------------------------
-- Table structure for `pel_invois`
-- ----------------------------
DROP TABLE IF EXISTS `pel_invois`;
CREATE TABLE `pel_invois` (
  `no_inv` varchar(10) DEFAULT NULL,
  `tarikh_inv` date DEFAULT NULL,
  `matrik` varchar(10) DEFAULT NULL,
  `ktr_invois` varchar(100) DEFAULT NULL,
  `jumlah` double(8,2) DEFAULT NULL,
  `id_add` varchar(20) DEFAULT NULL,
  `dt_add` datetime DEFAULT NULL,
  `id_edit` varchar(20) DEFAULT NULL,
  `dt_edit` datetime DEFAULT NULL,
  `aktif` tinyint(1) DEFAULT '1',
  UNIQUE KEY `no_inv` (`no_inv`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pel_invois
-- ----------------------------

-- ----------------------------
-- Table structure for `pel_item_invois`
-- ----------------------------
DROP TABLE IF EXISTS `pel_item_invois`;
CREATE TABLE `pel_item_invois` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `no_inv` varchar(10) DEFAULT NULL,
  `kod_akaun` varchar(10) DEFAULT NULL,
  `jumlah` double(8,2) DEFAULT NULL,
  `aktif` tinyint(1) DEFAULT '1',
  `id_add` varchar(20) DEFAULT NULL,
  `dt_add` datetime DEFAULT NULL,
  `id_edit` varchar(20) DEFAULT NULL,
  `dt_edit` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pel_item_invois
-- ----------------------------

-- ----------------------------
-- Table structure for `pel_lib`
-- ----------------------------
DROP TABLE IF EXISTS `pel_lib`;
CREATE TABLE `pel_lib` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `matrik` varchar(20) DEFAULT NULL,
  `sesi` varchar(20) DEFAULT NULL,
  `aktif` tinyint(1) DEFAULT NULL,
  `tarikh_clear` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pel_lib
-- ----------------------------

-- ----------------------------
-- Table structure for `pel_resit`
-- ----------------------------
DROP TABLE IF EXISTS `pel_resit`;
CREATE TABLE `pel_resit` (
  `id` bigint(10) NOT NULL AUTO_INCREMENT,
  `noresit` varchar(20) DEFAULT NULL,
  `matrik` varchar(20) DEFAULT NULL,
  `ktr_bayaran` varchar(100) DEFAULT NULL,
  `tarikhmasa_resit` datetime DEFAULT NULL,
  `jumlah` decimal(8,2) DEFAULT NULL,
  `id_add` varchar(20) DEFAULT NULL,
  `dt_add` datetime DEFAULT NULL,
  `id_edit` varchar(20) DEFAULT NULL,
  `dt_edit` datetime DEFAULT NULL,
  `aktif` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `idx1` (`noresit`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pel_resit
-- ----------------------------
INSERT INTO `pel_resit` VALUES ('3', 'Test 1', 'P1310004', 'Bayar Pendaftaran', '2012-12-12 14:18:55', '400.35', '1', '2012-12-12 14:18:55', null, null, '1');
INSERT INTO `pel_resit` VALUES ('4', 'Tembakdulu001', 'P1310003', 'Tembak', '2012-12-13 05:16:00', '700.00', '1', '2012-12-13 05:16:00', null, null, '1');
INSERT INTO `pel_resit` VALUES ('5', 'Tembakdulu002', 'P1310003', 'Tembak2', '2012-12-13 05:16:19', '0.01', '1', '2012-12-13 05:16:19', null, null, '1');

-- ----------------------------
-- Table structure for `pel_sem`
-- ----------------------------
DROP TABLE IF EXISTS `pel_sem`;
CREATE TABLE `pel_sem` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `matrik` varchar(20) DEFAULT NULL,
  `sesi` varchar(20) DEFAULT NULL,
  `sem` double(2,1) DEFAULT NULL,
  `status_pel` varchar(10) DEFAULT NULL,
  `kod_prog` varchar(10) DEFAULT NULL,
  `aktif` tinyint(1) DEFAULT NULL,
  `terkini` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pel_sem
-- ----------------------------

-- ----------------------------
-- Table structure for `pel_subjek_akademik`
-- ----------------------------
DROP TABLE IF EXISTS `pel_subjek_akademik`;
CREATE TABLE `pel_subjek_akademik` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `akademik_id` bigint(20) DEFAULT NULL,
  `subjek` varchar(50) DEFAULT NULL,
  `gred` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pel_subjek_akademik
-- ----------------------------

-- ----------------------------
-- Table structure for `pel_waris`
-- ----------------------------
DROP TABLE IF EXISTS `pel_waris`;
CREATE TABLE `pel_waris` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `matrik` varchar(20) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `hubungan` varchar(50) DEFAULT NULL,
  `alamat1` longtext,
  `alamat2` longtext,
  `poskod` varchar(10) DEFAULT NULL,
  `no_telefon` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pel_waris
-- ----------------------------

-- ----------------------------
-- Table structure for `pelajar`
-- ----------------------------
DROP TABLE IF EXISTS `pelajar`;
CREATE TABLE `pelajar` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
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
  `notel` varchar(20) DEFAULT NULL,
  `nohp` varchar(20) DEFAULT NULL,
  `emel` varchar(50) DEFAULT NULL,
  `dt_daftar` date DEFAULT NULL,
  `sesi_daftar` varchar(20) DEFAULT NULL,
  `id_add` varchar(20) DEFAULT NULL,
  `dt_add` date DEFAULT NULL,
  `id_edit` varchar(20) DEFAULT NULL,
  `dt_edit` date DEFAULT NULL,
  PRIMARY KEY (`id`,`matrik`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pelajar
-- ----------------------------

-- ----------------------------
-- Table structure for `prog_subjek`
-- ----------------------------
DROP TABLE IF EXISTS `prog_subjek`;
CREATE TABLE `prog_subjek` (
  `ID` int(20) NOT NULL AUTO_INCREMENT,
  `kod_prog` varchar(10) DEFAULT NULL,
  `kodsubjek` varchar(10) DEFAULT NULL,
  `sem` double(2,1) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `idx1` (`kod_prog`,`kodsubjek`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of prog_subjek
-- ----------------------------
INSERT INTO `prog_subjek` VALUES ('1', 'DSY', 'MPW 1113', '1.0');
INSERT INTO `prog_subjek` VALUES ('2', 'DSY', 'MPW 1123', '1.0');
INSERT INTO `prog_subjek` VALUES ('3', 'DSY', 'WI 1101', '1.0');
INSERT INTO `prog_subjek` VALUES ('4', 'DSY', 'WI 1104', '1.0');

-- ----------------------------
-- Table structure for `program`
-- ----------------------------
DROP TABLE IF EXISTS `program`;
CREATE TABLE `program` (
  `kod_prog` varchar(10) NOT NULL,
  `namaprog_MY` varchar(50) NOT NULL,
  `id_jabatan` int(11) DEFAULT NULL,
  `kod_tahap` int(11) NOT NULL,
  `tempoh` int(2) DEFAULT NULL,
  PRIMARY KEY (`kod_prog`),
  UNIQUE KEY `IDX1` (`kod_prog`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of program
-- ----------------------------
INSERT INTO `program` VALUES ('DQH', 'DIPLOMA AL-QURAN & HADIS', '3', '3', '6');
INSERT INTO `program` VALUES ('DSY', 'DIPLOMA SYARIAH', '2', '3', '6');
INSERT INTO `program` VALUES ('DUS', 'DIPLOMA USULUDDIN', '2', '3', '6');
INSERT INTO `program` VALUES ('PST', 'PRA-STAM', '6', '1', '2');
INSERT INTO `program` VALUES ('ST', 'STAM', '5', '2', '2');

-- ----------------------------
-- Table structure for `ruj_intake`
-- ----------------------------
DROP TABLE IF EXISTS `ruj_intake`;
CREATE TABLE `ruj_intake` (
  `id` bigint(10) NOT NULL AUTO_INCREMENT,
  `id_intake` varchar(20) NOT NULL,
  `no_ruj` varchar(50) DEFAULT NULL,
  `no_intake` varchar(5) DEFAULT NULL,
  `kod_tahap` varchar(5) DEFAULT NULL,
  `siri_ruj` bigint(5) unsigned zerofill DEFAULT NULL,
  `id_surat` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx1` (`id_intake`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ruj_intake
-- ----------------------------
INSERT INTO `ruj_intake` VALUES ('1', '2013_1', 'IPTIP 12/90 Jld.4', '91', '1', '00010', '1');
INSERT INTO `ruj_intake` VALUES ('2', '2014_1', 'IPTIP 12/90 Jld.4', '91', '1', '00001', '1');
INSERT INTO `ruj_intake` VALUES ('15', '2013_1', 'IPTIP 12/90 Jld. 4', '1', '2', '00001', '1');
INSERT INTO `ruj_intake` VALUES ('16', '2013_1', 'IPTIP 12/90 Jld. 4', '1', '3', '00001', '1');
INSERT INTO `ruj_intake` VALUES ('17', '2013_1', 'IPTIP 12/90 Jld. 4', '1', '4', '00001', '1');
INSERT INTO `ruj_intake` VALUES ('18', '2013_1', 'IPTIP 12/90 Jld. 4', '1', '5', '00001', '1');

-- ----------------------------
-- Table structure for `sel_bandar`
-- ----------------------------
DROP TABLE IF EXISTS `sel_bandar`;
CREATE TABLE `sel_bandar` (
  `kodnegara` varchar(5) DEFAULT NULL,
  `kodnegeri` varchar(5) DEFAULT NULL,
  `kodbandar` varchar(10) NOT NULL DEFAULT '',
  `namabandar` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kodbandar`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sel_bandar
-- ----------------------------
INSERT INTO `sel_bandar` VALUES ('A01', 'A0101', 'A010101', 'JALALABAD');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010101', 'AIR PAPAN');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010102', 'AYER BEMBAN');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010103', 'AYER HITAM');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010104', 'BAKRI');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010105', 'BANDAR DATO\' ONN');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010106', 'BANDAR PENAWAR');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010107', 'BANDAR TENGGARA');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010108', 'BATU ENAM');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010109', 'BATU PAHAT');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010110', 'BEKOK');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M0101100', 'TAMPOI');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M0101101', 'TANJUNG BALAU');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M0101102', 'TANJUNG KUPANG');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M0101103', 'TANJUNG LANGSAT');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M0101104', 'TANJUNG LEMAN');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M0101105', 'TANJUNG PELEPAS');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M0101106', 'TEBRAU');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M0101107', 'TELUK MAHKOTA');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M0101108', 'TELUK RAMUNIA');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M0101109', 'TELUK SENGAT');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010111', 'BENUT');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M0101110', 'TENGGAROH');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M0101111', 'TONGKANG PECHAH');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M0101112', 'ULU CHOH');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M0101113', 'ULU TIRAM');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M0101114', 'YONG PENG');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M0101115', 'TANGKAK');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M0101116', 'PONTIAN');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M0101117', 'TANJUNG PENGELIH');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010112', 'BUKIT BATU');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010113', 'BUKIT GAMBIR');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010114', 'BUKIT KANGKAR');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010115', 'BUKIT KEPONG');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010116', 'BUKIT NANING');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010117', 'BUKIT PASIR');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010118', 'BULOH KASAP');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010119', 'CHAAH');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010120', 'DESARU');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010121', 'ENDAU');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010122', 'GELANG PATAH');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010123', 'GEMAS BAHARU');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010124', 'GENUANG');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010125', 'JEMALUANG');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010126', 'JEMENTAH');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010127', 'JOHOR BAHRU');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010128', 'JOHOR LAMA');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010129', 'KAHANG');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010130', 'KAMPUNG TENGAH');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010131', 'KANGKAR PULAI');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010132', 'KELAPA SAWIT');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010133', 'KEMPAS');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010134', 'KLUANG');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010135', 'KONG KONG');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010136', 'KOTA ISKANDAR');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010137', 'KOTA TINGGI');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010138', 'KUKUP');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010139', 'KULAI');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010140', 'LABIS');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010141', 'LAYANG-LAYANG');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010142', 'LENGA');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010143', 'LIMA KEDAI');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010144', 'LOK HENG');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010145', 'LOMBONG');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010146', 'MACHAP');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010147', 'MASAI');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010148', 'MENGKIBOL');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010149', 'MERSING');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010150', 'MIDDLE ROCKS');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010151', 'MUAR');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010152', 'NUSAJAYA');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010153', 'PAGOH');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010154', 'PALOH');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010155', 'PANCHOR');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010156', 'PARIT BAKAR');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010157', 'PARIT JAWA');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010158', 'PARIT RAJA');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010159', 'PARIT SULONG');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010160', 'PARIT YAANI');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010161', 'PASIR GUDANG');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010162', 'PASIR PELANGI');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010163', 'PEKAN AIR PANAS');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010164', 'PEKAN NANAS');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010165', 'PENDAS');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010166', 'PENGERANG');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010167', 'PERMAS JAYA');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010168', 'PLENTONG');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010169', 'PONTIAN KECHIL');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010170', 'PULAU AUR');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010171', 'PULAU BESAR');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010172', 'PULAU KUKUP');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010173', 'PULAU MERAMBONG');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010174', 'PULAU PEMANGGIL');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010175', 'PULAU PISANG');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010176', 'PULAU RAWA');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010177', 'PULAU SIBU');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010178', 'PULAU TENGAH');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010179', 'PULAU TINGGI');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010180', 'RENGGAM');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010181', 'RENGIT');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010182', 'SAGIL');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010183', 'SALENG');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010184', 'SEDENAK');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010185', 'SEDILI');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010186', 'SEELONG');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010187', 'SEGAMAT');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010188', 'SEMERAH');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010189', 'SENAI');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010190', 'SENGGARANG');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010191', 'SEROM');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010192', 'SIMPANG RENGGAM');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010193', 'SKUDAI');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010194', 'SRI GADING');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010195', 'SRI MEDAN');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010196', 'STULANG');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010197', 'SUNGAI BALANG');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010198', 'SUNGAI MATI');
INSERT INTO `sel_bandar` VALUES ('M01', '01', 'M010199', 'SUNGAI RENGIT');
INSERT INTO `sel_bandar` VALUES ('M01', '02', 'M010201', 'ALOR SETAR');
INSERT INTO `sel_bandar` VALUES ('M01', '02', 'M010202', 'ANAK BUKIT');
INSERT INTO `sel_bandar` VALUES ('M01', '02', 'M010203', 'BALING');
INSERT INTO `sel_bandar` VALUES ('M01', '02', 'M010204', 'BANDAR BAHARU');
INSERT INTO `sel_bandar` VALUES ('M01', '02', 'M010205', 'BEDONG');
INSERT INTO `sel_bandar` VALUES ('M01', '02', 'M010206', 'BUKIT KAYU HITAM');
INSERT INTO `sel_bandar` VALUES ('M01', '02', 'M010207', 'BUKIT SELAMBAU');
INSERT INTO `sel_bandar` VALUES ('M01', '02', 'M010208', 'CHANGLUN');
INSERT INTO `sel_bandar` VALUES ('M01', '02', 'M010209', 'GUAR CHEMPEDAK');
INSERT INTO `sel_bandar` VALUES ('M01', '02', 'M010210', 'GURUN');
INSERT INTO `sel_bandar` VALUES ('M01', '02', 'M010211', 'JENIANG');
INSERT INTO `sel_bandar` VALUES ('M01', '02', 'M010212', 'JITRA');
INSERT INTO `sel_bandar` VALUES ('M01', '02', 'M010213', 'KEPALA BATAS');
INSERT INTO `sel_bandar` VALUES ('M01', '02', 'M010214', 'KODIANG');
INSERT INTO `sel_bandar` VALUES ('M01', '02', 'M010215', 'KOTA SARANG SEMUT');
INSERT INTO `sel_bandar` VALUES ('M01', '02', 'M010216', 'KUAH, LANGKAWI');
INSERT INTO `sel_bandar` VALUES ('M01', '02', 'M010217', 'KUALA KEDAH');
INSERT INTO `sel_bandar` VALUES ('M01', '02', 'M010218', 'KUALA KETIL');
INSERT INTO `sel_bandar` VALUES ('M01', '02', 'M010219', 'KUALA NERANG');
INSERT INTO `sel_bandar` VALUES ('M01', '02', 'M010220', 'KULIM');
INSERT INTO `sel_bandar` VALUES ('M01', '02', 'M010221', 'LANGGAR');
INSERT INTO `sel_bandar` VALUES ('M01', '02', 'M010222', 'LUNAS');
INSERT INTO `sel_bandar` VALUES ('M01', '02', 'M010223', 'MERBOK');
INSERT INTO `sel_bandar` VALUES ('M01', '02', 'M010224', 'PADANG MATSIRAT, LANGKAWI');
INSERT INTO `sel_bandar` VALUES ('M01', '02', 'M010225', 'PADANG SERAI');
INSERT INTO `sel_bandar` VALUES ('M01', '02', 'M010226', 'PENDANG');
INSERT INTO `sel_bandar` VALUES ('M01', '02', 'M010227', 'POKOK SENA');
INSERT INTO `sel_bandar` VALUES ('M01', '02', 'M010228', 'LANGKAWI');
INSERT INTO `sel_bandar` VALUES ('M01', '02', 'M010229', 'PULAU PAYAR');
INSERT INTO `sel_bandar` VALUES ('M01', '02', 'M010230', 'SIK');
INSERT INTO `sel_bandar` VALUES ('M01', '02', 'M010231', 'SINTOK');
INSERT INTO `sel_bandar` VALUES ('M01', '02', 'M010232', 'SUNGAI PETANI');
INSERT INTO `sel_bandar` VALUES ('M01', '02', 'M010233', 'TOKAI');
INSERT INTO `sel_bandar` VALUES ('M01', '02', 'M010234', 'YAN');
INSERT INTO `sel_bandar` VALUES ('M01', '02', 'M010235', 'SERDANG');
INSERT INTO `sel_bandar` VALUES ('M01', '02', 'M010236', 'TIKAM BATU');
INSERT INTO `sel_bandar` VALUES ('M01', '02', 'M010237', 'NAKA');
INSERT INTO `sel_bandar` VALUES ('M01', '02', 'M010238', 'KUPANG');
INSERT INTO `sel_bandar` VALUES ('M01', '02', 'M010239', 'KOTA KUALA MUDA');
INSERT INTO `sel_bandar` VALUES ('M01', '02', 'M010240', 'AYER HITAM');
INSERT INTO `sel_bandar` VALUES ('M01', '02', 'M010241', 'KUBUR PANJANG');
INSERT INTO `sel_bandar` VALUES ('M01', '02', 'M010242', 'TITI GAJAH');
INSERT INTO `sel_bandar` VALUES ('M01', '03', 'M010301', 'BACHOK');
INSERT INTO `sel_bandar` VALUES ('M01', '03', 'M010302', 'BUKIT BUNGA');
INSERT INTO `sel_bandar` VALUES ('M01', '03', 'M010303', 'DABONG');
INSERT INTO `sel_bandar` VALUES ('M01', '03', 'M010304', 'GUA MUSANG');
INSERT INTO `sel_bandar` VALUES ('M01', '03', 'M010305', 'JELI');
INSERT INTO `sel_bandar` VALUES ('M01', '03', 'M010306', 'KOTA BHARU');
INSERT INTO `sel_bandar` VALUES ('M01', '03', 'M010307', 'KUALA KRAI');
INSERT INTO `sel_bandar` VALUES ('M01', '03', 'M010308', 'KUBANG KERIAN');
INSERT INTO `sel_bandar` VALUES ('M01', '03', 'M010309', 'MACHANG');
INSERT INTO `sel_bandar` VALUES ('M01', '03', 'M010310', 'MANEK URAI');
INSERT INTO `sel_bandar` VALUES ('M01', '03', 'M010311', 'PASIR MAS');
INSERT INTO `sel_bandar` VALUES ('M01', '03', 'M010312', 'PASIR PUTEH');
INSERT INTO `sel_bandar` VALUES ('M01', '03', 'M010313', 'PENGKALAN CHEPA');
INSERT INTO `sel_bandar` VALUES ('M01', '03', 'M010314', 'PENGKALAN KUBUR');
INSERT INTO `sel_bandar` VALUES ('M01', '03', 'M010315', 'PENGKALAN PASIR');
INSERT INTO `sel_bandar` VALUES ('M01', '03', 'M010316', 'PERUPOK');
INSERT INTO `sel_bandar` VALUES ('M01', '03', 'M010317', 'RANTAU PANJANG');
INSERT INTO `sel_bandar` VALUES ('M01', '03', 'M010318', 'TANAH MERAH');
INSERT INTO `sel_bandar` VALUES ('M01', '03', 'M010319', 'TUMPAT');
INSERT INTO `sel_bandar` VALUES ('M01', '03', 'M010320', 'WAKAF BHARU');
INSERT INTO `sel_bandar` VALUES ('M01', '03', 'M010321', 'WAKAF CHE YEH');
INSERT INTO `sel_bandar` VALUES ('M01', '03', 'M010322', 'PASIR TUMBUH');
INSERT INTO `sel_bandar` VALUES ('M01', '03', 'M010323', 'PULAI CHONDONG');
INSERT INTO `sel_bandar` VALUES ('M01', '03', 'M010324', 'KETEREH');
INSERT INTO `sel_bandar` VALUES ('M01', '03', 'M010325', 'AYER LANAS');
INSERT INTO `sel_bandar` VALUES ('M01', '04', 'M010401', 'ALOR GAJAH');
INSERT INTO `sel_bandar` VALUES ('M01', '04', 'M010402', 'ASAHAN');
INSERT INTO `sel_bandar` VALUES ('M01', '04', 'M010403', 'AYER KEROH');
INSERT INTO `sel_bandar` VALUES ('M01', '04', 'M010404', 'AYER PAABAS');
INSERT INTO `sel_bandar` VALUES ('M01', '04', 'M010405', 'BATANG MELAKA');
INSERT INTO `sel_bandar` VALUES ('M01', '04', 'M010406', 'BATU BERENDAM');
INSERT INTO `sel_bandar` VALUES ('M01', '04', 'M010407', 'BEMBAN');
INSERT INTO `sel_bandar` VALUES ('M01', '04', 'M010408', 'BUKIT KATIL');
INSERT INTO `sel_bandar` VALUES ('M01', '04', 'M010409', 'CHENG');
INSERT INTO `sel_bandar` VALUES ('M01', '04', 'M010410', 'DURIAN TUNGGAL');
INSERT INTO `sel_bandar` VALUES ('M01', '04', 'M010411', 'HANG TUAH JAYA');
INSERT INTO `sel_bandar` VALUES ('M01', '04', 'M010412', 'JASIN');
INSERT INTO `sel_bandar` VALUES ('M01', '04', 'M010413', 'KLEBANG');
INSERT INTO `sel_bandar` VALUES ('M01', '04', 'M010414', 'KUALA SUNGAI BARU');
INSERT INTO `sel_bandar` VALUES ('M01', '04', 'M010415', 'LENDU');
INSERT INTO `sel_bandar` VALUES ('M01', '04', 'M010416', 'LUBUK CHINA');
INSERT INTO `sel_bandar` VALUES ('M01', '04', 'M010417', 'MACHAP BARU');
INSERT INTO `sel_bandar` VALUES ('M01', '04', 'M010418', 'MASJID TANAH');
INSERT INTO `sel_bandar` VALUES ('M01', '04', 'M010419', 'BANDARAYA MELAKA');
INSERT INTO `sel_bandar` VALUES ('M01', '04', 'M010420', 'MELAKA PINDAH');
INSERT INTO `sel_bandar` VALUES ('M01', '04', 'M010421', 'MERLIMAU');
INSERT INTO `sel_bandar` VALUES ('M01', '04', 'M010422', 'NYALAS');
INSERT INTO `sel_bandar` VALUES ('M01', '04', 'M010423', 'PULAU BESAR');
INSERT INTO `sel_bandar` VALUES ('M01', '04', 'M010424', 'PULAU MELAKA');
INSERT INTO `sel_bandar` VALUES ('M01', '04', 'M010425', 'PULAU SEBANG');
INSERT INTO `sel_bandar` VALUES ('M01', '04', 'M010426', 'RAMUAN CHINA');
INSERT INTO `sel_bandar` VALUES ('M01', '04', 'M010427', 'SELANDAR');
INSERT INTO `sel_bandar` VALUES ('M01', '04', 'M010428', 'SERKAM');
INSERT INTO `sel_bandar` VALUES ('M01', '04', 'M010429', 'SIMPANG AMPAT');
INSERT INTO `sel_bandar` VALUES ('M01', '04', 'M010430', 'SUNGAI RAMBAI');
INSERT INTO `sel_bandar` VALUES ('M01', '04', 'M010431', 'SUNGAI UDANG');
INSERT INTO `sel_bandar` VALUES ('M01', '04', 'M010432', 'TAMPIN');
INSERT INTO `sel_bandar` VALUES ('M01', '04', 'M010433', 'TANJUNG BIDARA');
INSERT INTO `sel_bandar` VALUES ('M01', '04', 'M010434', 'TANJUNG KLING');
INSERT INTO `sel_bandar` VALUES ('M01', '04', 'M010435', 'TANJUNG TUAN');
INSERT INTO `sel_bandar` VALUES ('M01', '04', 'M010436', 'UMBAI');
INSERT INTO `sel_bandar` VALUES ('M01', '05', 'M010501', 'AYER KUNING');
INSERT INTO `sel_bandar` VALUES ('M01', '05', 'M010502', 'AIR KUNING SELATAN');
INSERT INTO `sel_bandar` VALUES ('M01', '05', 'M010503', 'AMPANGAN');
INSERT INTO `sel_bandar` VALUES ('M01', '05', 'M010504', 'BAHAU');
INSERT INTO `sel_bandar` VALUES ('M01', '05', 'M010505', 'BANDAR SERI JEMPOL');
INSERT INTO `sel_bandar` VALUES ('M01', '05', 'M010506', 'BATANG BENAR');
INSERT INTO `sel_bandar` VALUES ('M01', '05', 'M010507', 'BATU KIKIR');
INSERT INTO `sel_bandar` VALUES ('M01', '05', 'M010508', 'CHEMBONG');
INSERT INTO `sel_bandar` VALUES ('M01', '05', 'M010509', 'DANGI');
INSERT INTO `sel_bandar` VALUES ('M01', '05', 'M010510', 'GEMAS');
INSERT INTO `sel_bandar` VALUES ('M01', '05', 'M010511', 'GEMENCHEH');
INSERT INTO `sel_bandar` VALUES ('M01', '05', 'M010512', 'JOHOL');
INSERT INTO `sel_bandar` VALUES ('M01', '05', 'M010513', 'JUASSEH');
INSERT INTO `sel_bandar` VALUES ('M01', '05', 'M010514', 'KOTA');
INSERT INTO `sel_bandar` VALUES ('M01', '05', 'M010515', 'KUALA KLAWANG');
INSERT INTO `sel_bandar` VALUES ('M01', '05', 'M010516', 'KUALA PILAH');
INSERT INTO `sel_bandar` VALUES ('M01', '05', 'M010517', 'LABU');
INSERT INTO `sel_bandar` VALUES ('M01', '05', 'M010518', 'LENGGENG');
INSERT INTO `sel_bandar` VALUES ('M01', '05', 'M010519', 'LINGGI');
INSERT INTO `sel_bandar` VALUES ('M01', '05', 'M010520', 'LUKUT');
INSERT INTO `sel_bandar` VALUES ('M01', '05', 'M010521', 'MANTIN');
INSERT INTO `sel_bandar` VALUES ('M01', '05', 'M010522', 'MAMBAU');
INSERT INTO `sel_bandar` VALUES ('M01', '05', 'M010523', 'NILAI');
INSERT INTO `sel_bandar` VALUES ('M01', '05', 'M010524', 'PAJAM');
INSERT INTO `sel_bandar` VALUES ('M01', '05', 'M010525', 'PAROI');
INSERT INTO `sel_bandar` VALUES ('M01', '05', 'M010526', 'PANTAI');
INSERT INTO `sel_bandar` VALUES ('M01', '05', 'M010527', 'PASIR PANJANG');
INSERT INTO `sel_bandar` VALUES ('M01', '05', 'M010528', 'PEDAS');
INSERT INTO `sel_bandar` VALUES ('M01', '05', 'M010529', 'PENGKALAN KEMPAS');
INSERT INTO `sel_bandar` VALUES ('M01', '05', 'M010530', 'PERTANG');
INSERT INTO `sel_bandar` VALUES ('M01', '05', 'M010531', 'PORT DICKSON');
INSERT INTO `sel_bandar` VALUES ('M01', '05', 'M010532', 'RANTAU');
INSERT INTO `sel_bandar` VALUES ('M01', '05', 'M010533', 'RASAH');
INSERT INTO `sel_bandar` VALUES ('M01', '05', 'M010534', 'REMBAU');
INSERT INTO `sel_bandar` VALUES ('M01', '05', 'M010535', 'ROMPIN');
INSERT INTO `sel_bandar` VALUES ('M01', '05', 'M010536', 'SENAWANG');
INSERT INTO `sel_bandar` VALUES ('M01', '05', 'M010537', 'SEPANG ROAD');
INSERT INTO `sel_bandar` VALUES ('M01', '05', 'M010538', 'SEREMBAN');
INSERT INTO `sel_bandar` VALUES ('M01', '05', 'M010539', 'SERI MENANTI');
INSERT INTO `sel_bandar` VALUES ('M01', '05', 'M010540', 'SERTING');
INSERT INTO `sel_bandar` VALUES ('M01', '05', 'M010541', 'SIKAMAT');
INSERT INTO `sel_bandar` VALUES ('M01', '05', 'M010542', 'SILIAU');
INSERT INTO `sel_bandar` VALUES ('M01', '05', 'M010543', 'SUNGAI GADUT');
INSERT INTO `sel_bandar` VALUES ('M01', '05', 'M010544', 'SUNGAI MUNTOH');
INSERT INTO `sel_bandar` VALUES ('M01', '05', 'M010545', 'TAMPIN');
INSERT INTO `sel_bandar` VALUES ('M01', '05', 'M010546', 'TANJUNG IPOH');
INSERT INTO `sel_bandar` VALUES ('M01', '05', 'M010547', 'TELUK KEMANG');
INSERT INTO `sel_bandar` VALUES ('M01', '05', 'M010548', 'TIROI');
INSERT INTO `sel_bandar` VALUES ('M01', '05', 'M010549', 'JELEBU');
INSERT INTO `sel_bandar` VALUES ('M01', '06', 'M010601', 'BANDAR BERA');
INSERT INTO `sel_bandar` VALUES ('M01', '06', 'M010602', 'BANDAR MUADZAM SHAH');
INSERT INTO `sel_bandar` VALUES ('M01', '06', 'M010603', 'BANDAR PUSAT JENGKA');
INSERT INTO `sel_bandar` VALUES ('M01', '06', 'M010604', 'BANDAR TUN ABDUL RAZAK');
INSERT INTO `sel_bandar` VALUES ('M01', '06', 'M010605', 'BATU HITAM');
INSERT INTO `sel_bandar` VALUES ('M01', '06', 'M010606', 'BATU TALAM');
INSERT INTO `sel_bandar` VALUES ('M01', '06', 'M010607', 'BELIMBING');
INSERT INTO `sel_bandar` VALUES ('M01', '06', 'M010608', 'BENTA');
INSERT INTO `sel_bandar` VALUES ('M01', '06', 'M010609', 'BENTONG');
INSERT INTO `sel_bandar` VALUES ('M01', '06', 'M010610', 'BESERAH');
INSERT INTO `sel_bandar` VALUES ('M01', '06', 'M010611', 'BRINCHANG');
INSERT INTO `sel_bandar` VALUES ('M01', '06', 'M010612', 'BUKIT FRASER');
INSERT INTO `sel_bandar` VALUES ('M01', '06', 'M010613', 'BUKIT TINGGI');
INSERT INTO `sel_bandar` VALUES ('M01', '06', 'M010614', 'CERUK PALUH');
INSERT INTO `sel_bandar` VALUES ('M01', '06', 'M010615', 'CHENDOR');
INSERT INTO `sel_bandar` VALUES ('M01', '06', 'M010616', 'CHENOR');
INSERT INTO `sel_bandar` VALUES ('M01', '06', 'M010617', 'CHEROH');
INSERT INTO `sel_bandar` VALUES ('M01', '06', 'M010618', 'TASIK CHINI');
INSERT INTO `sel_bandar` VALUES ('M01', '06', 'M010619', 'GAMBANG');
INSERT INTO `sel_bandar` VALUES ('M01', '06', 'M010620', 'GEBENG');
INSERT INTO `sel_bandar` VALUES ('M01', '06', 'M010621', 'GENTING HIGHLANDS');
INSERT INTO `sel_bandar` VALUES ('M01', '06', 'M010622', 'GENTING SEMPAH');
INSERT INTO `sel_bandar` VALUES ('M01', '06', 'M010623', 'JERANTUT');
INSERT INTO `sel_bandar` VALUES ('M01', '06', 'M010624', 'KAMPUNG AWAH');
INSERT INTO `sel_bandar` VALUES ('M01', '06', 'M010625', 'KARAK');
INSERT INTO `sel_bandar` VALUES ('M01', '06', 'M010626', 'KEMAYAN');
INSERT INTO `sel_bandar` VALUES ('M01', '06', 'M010627', 'KETARI');
INSERT INTO `sel_bandar` VALUES ('M01', '06', 'M010628', 'KOTA ISKANDAR');
INSERT INTO `sel_bandar` VALUES ('M01', '06', 'M010629', 'KOTA SHAHBANDAR');
INSERT INTO `sel_bandar` VALUES ('M01', '06', 'M010630', 'KUALA LIPIS');
INSERT INTO `sel_bandar` VALUES ('M01', '06', 'M010631', 'KUALA PAHANG');
INSERT INTO `sel_bandar` VALUES ('M01', '06', 'M010632', 'KUALA ROMPIN');
INSERT INTO `sel_bandar` VALUES ('M01', '06', 'M010633', 'KUALA TEMBELING');
INSERT INTO `sel_bandar` VALUES ('M01', '06', 'M010634', 'KUANTAN');
INSERT INTO `sel_bandar` VALUES ('M01', '06', 'M010635', 'LANCHANG');
INSERT INTO `sel_bandar` VALUES ('M01', '06', 'M010636', 'LENTANG');
INSERT INTO `sel_bandar` VALUES ('M01', '06', 'M010637', 'LUBUK PAKU');
INSERT INTO `sel_bandar` VALUES ('M01', '06', 'M010638', 'LURAH BILUT');
INSERT INTO `sel_bandar` VALUES ('M01', '06', 'M010639', 'MARAN');
INSERT INTO `sel_bandar` VALUES ('M01', '06', 'M010640', 'MENGKARAK');
INSERT INTO `sel_bandar` VALUES ('M01', '06', 'M010641', 'MENGKUANG');
INSERT INTO `sel_bandar` VALUES ('M01', '06', 'M010642', 'MENTAKAB');
INSERT INTO `sel_bandar` VALUES ('M01', '06', 'M010643', 'MERAPOH');
INSERT INTO `sel_bandar` VALUES ('M01', '06', 'M010644', 'NENASI');
INSERT INTO `sel_bandar` VALUES ('M01', '06', 'M010645', 'PALUH HINAI');
INSERT INTO `sel_bandar` VALUES ('M01', '06', 'M010646', 'PEKAN');
INSERT INTO `sel_bandar` VALUES ('M01', '06', 'M010647', 'PENOR');
INSERT INTO `sel_bandar` VALUES ('M01', '06', 'M010648', 'PULAU TIOMAN');
INSERT INTO `sel_bandar` VALUES ('M01', '06', 'M010649', 'RAUB');
INSERT INTO `sel_bandar` VALUES ('M01', '06', 'M010650', 'ROMPIN');
INSERT INTO `sel_bandar` VALUES ('M01', '06', 'M010651', 'SEBERTAK');
INSERT INTO `sel_bandar` VALUES ('M01', '06', 'M010652', 'SEMPALIT');
INSERT INTO `sel_bandar` VALUES ('M01', '06', 'M010653', 'SUNGAI LEMBING');
INSERT INTO `sel_bandar` VALUES ('M01', '06', 'M010654', 'SUNGAI RUAN');
INSERT INTO `sel_bandar` VALUES ('M01', '06', 'M010655', 'TANAH RATA');
INSERT INTO `sel_bandar` VALUES ('M01', '06', 'M010656', 'TANJUNG LUMPUR');
INSERT INTO `sel_bandar` VALUES ('M01', '06', 'M010657', 'TANJUNG SEPAT');
INSERT INTO `sel_bandar` VALUES ('M01', '06', 'M010658', 'TELUK CEMPEDAK');
INSERT INTO `sel_bandar` VALUES ('M01', '06', 'M010659', 'TEMERLOH');
INSERT INTO `sel_bandar` VALUES ('M01', '06', 'M010660', 'TERIANG');
INSERT INTO `sel_bandar` VALUES ('M01', '06', 'M010661', 'TRINGKAP');
INSERT INTO `sel_bandar` VALUES ('M01', '06', 'M010662', 'KUALA KRAU');
INSERT INTO `sel_bandar` VALUES ('M01', '06', 'M010663', 'TRIANG');
INSERT INTO `sel_bandar` VALUES ('M01', '07', 'M010701', 'AIR ITAM');
INSERT INTO `sel_bandar` VALUES ('M01', '07', 'M010702', 'ATU MAUNG');
INSERT INTO `sel_bandar` VALUES ('M01', '07', 'M010703', 'BAGAN AJAM');
INSERT INTO `sel_bandar` VALUES ('M01', '07', 'M010704', 'BALIK PULAU');
INSERT INTO `sel_bandar` VALUES ('M01', '07', 'M010705', 'BATU FERRINGHI');
INSERT INTO `sel_bandar` VALUES ('M01', '07', 'M010706', 'BATU KAWAN');
INSERT INTO `sel_bandar` VALUES ('M01', '07', 'M010707', 'BATU UBAN');
INSERT INTO `sel_bandar` VALUES ('M01', '07', 'M010708', 'BAYAN LEPAS');
INSERT INTO `sel_bandar` VALUES ('M01', '07', 'M010709', 'BUKIT JAMBUL');
INSERT INTO `sel_bandar` VALUES ('M01', '07', 'M010710', 'BUKIT MERTAJAM');
INSERT INTO `sel_bandar` VALUES ('M01', '07', 'M010711', 'BUTTERWORTH');
INSERT INTO `sel_bandar` VALUES ('M01', '07', 'M010712', 'CERUK TOK KUN');
INSERT INTO `sel_bandar` VALUES ('M01', '07', 'M010713', 'GELUGOR');
INSERT INTO `sel_bandar` VALUES ('M01', '07', 'M010714', 'GEORGE TOWN');
INSERT INTO `sel_bandar` VALUES ('M01', '07', 'M010715', 'JAWI');
INSERT INTO `sel_bandar` VALUES ('M01', '07', 'M010716', 'JELUTONG');
INSERT INTO `sel_bandar` VALUES ('M01', '07', 'M010717', 'JURU');
INSERT INTO `sel_bandar` VALUES ('M01', '07', 'M010718', 'KEPALA BATAS');
INSERT INTO `sel_bandar` VALUES ('M01', '07', 'M010719', 'MAK MANDIN');
INSERT INTO `sel_bandar` VALUES ('M01', '07', 'M010720', 'NIBONG TEBAL');
INSERT INTO `sel_bandar` VALUES ('M01', '07', 'M010721', 'PANTAI ACEH');
INSERT INTO `sel_bandar` VALUES ('M01', '07', 'M010722', 'PAYA TERUBONG');
INSERT INTO `sel_bandar` VALUES ('M01', '07', 'M010723', 'PENANTI');
INSERT INTO `sel_bandar` VALUES ('M01', '07', 'M010724', 'PERAI');
INSERT INTO `sel_bandar` VALUES ('M01', '07', 'M010725', 'PERMATANG PAUH');
INSERT INTO `sel_bandar` VALUES ('M01', '07', 'M010726', 'PINANG TUNGGAL');
INSERT INTO `sel_bandar` VALUES ('M01', '07', 'M010727', 'PULAU AMAN');
INSERT INTO `sel_bandar` VALUES ('M01', '07', 'M010728', 'PULAU BETONG');
INSERT INTO `sel_bandar` VALUES ('M01', '07', 'M010729', 'PULAU GEDUNG');
INSERT INTO `sel_bandar` VALUES ('M01', '07', 'M010730', 'PULAU JEREJAK');
INSERT INTO `sel_bandar` VALUES ('M01', '07', 'M010731', 'PULAU KENDI');
INSERT INTO `sel_bandar` VALUES ('M01', '07', 'M010732', 'PULAU PINANG');
INSERT INTO `sel_bandar` VALUES ('M01', '07', 'M010733', 'PULAU RIMAU');
INSERT INTO `sel_bandar` VALUES ('M01', '07', 'M010734', 'PULAU TIKUS');
INSERT INTO `sel_bandar` VALUES ('M01', '07', 'M010735', 'SEBERANG JAYA');
INSERT INTO `sel_bandar` VALUES ('M01', '07', 'M010736', 'SUNGAI ARA');
INSERT INTO `sel_bandar` VALUES ('M01', '07', 'M010737', 'SUNGAI BAKAP');
INSERT INTO `sel_bandar` VALUES ('M01', '07', 'M010738', 'SUNGAI DUA');
INSERT INTO `sel_bandar` VALUES ('M01', '07', 'M010739', 'SUNGAI JAWI');
INSERT INTO `sel_bandar` VALUES ('M01', '07', 'M010740', 'SUNGAI NIBONG');
INSERT INTO `sel_bandar` VALUES ('M01', '07', 'M010741', 'TANJUNG BUNGAH');
INSERT INTO `sel_bandar` VALUES ('M01', '07', 'M010742', 'TANJUNG TOKONG');
INSERT INTO `sel_bandar` VALUES ('M01', '07', 'M010743', 'TASEK GELUGOR');
INSERT INTO `sel_bandar` VALUES ('M01', '07', 'M010744', 'TELUK BAHANG');
INSERT INTO `sel_bandar` VALUES ('M01', '07', 'M010745', 'BAYAN BARU');
INSERT INTO `sel_bandar` VALUES ('M01', '07', 'M010746', 'PENAGA');
INSERT INTO `sel_bandar` VALUES ('M01', '07', 'M010747', 'SEBERANG PERAI');
INSERT INTO `sel_bandar` VALUES ('M01', '07', 'M010748', 'SEBERANG PERAI UTARA');
INSERT INTO `sel_bandar` VALUES ('M01', '07', 'M010749', 'SIMPANG AMPAT');
INSERT INTO `sel_bandar` VALUES ('M01', '07', 'M010750', 'SEBERANG PERAI SELATAN');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010801', 'AYER TAWAR');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010802', 'BAGAN DATOH');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010803', 'BAGAN SERAI');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010804', 'BAGAN SUNGAI BURONG');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010805', 'BANIR');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010806', 'BATAK RABIT');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010807', 'BATU GAJAH');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010808', 'BEHRANG');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010809', 'BERCHAM');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010810', 'BERUAS');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010811', 'BIDOR');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010812', 'BIKAM');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010813', 'BOTA');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010814', 'BUKIT GANTANG');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010815', 'BUKIT MERAH');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010816', 'CHANGKAT JERING');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010817', 'CHANGKAT KERUING');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010818', 'CHEMOR');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010819', 'CHENDERIANG');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010820', 'CHIKUS');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010821', 'DAMAR LAUT');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010822', 'EMANGGOL');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010823', 'ENDERATA');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010824', 'GERIK');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010825', 'GOPENG');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010826', 'GUA TEMPURUNG');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010827', 'HUTAN MELINTANG');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010828', 'IPOH');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010829', 'JELAPANG');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010830', 'JERLUN');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010831', 'KAMPAR');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010832', 'KAMPUNG GAJAH');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010833', 'KAMUNTING');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010834', 'KARAI');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010835', 'KOTA BAHARU');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010836', 'KOTA SETIA');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010837', 'KUALA KANGSAR');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010838', 'KUALA KURAU');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010839', 'KUALA SEPETANG');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010840', 'LANGKAP');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010841', 'LEKIR');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010842', 'LENGGONG');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010843', 'LUMUT');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010844', 'MALIM NAWAR');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010845', 'MAMBANG DI AWAN');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010846', 'MANJOI');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010847', 'MANONG');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010848', 'MENGLEMBU');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010849', 'PADANG RENGAS');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010850', 'PANTAI REMIS');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010851', 'PARIT');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010852', 'PARIT BUNTAR');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010853', 'PASIR SALAK');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010854', 'PEKAN GURNEY');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010855', 'PENGKALAN HULU');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010856', 'PROTON CITY');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010857', 'PULAU PANGKOR');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010858', 'SELAMA');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010859', 'SERI ISKANDAR');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010860', 'SERI MANJUNG');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010861', 'SIMPANG TIGA');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010862', 'SITIAWAN');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010863', 'SLIM RIVER');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010864', 'SUNGAI SIPUT');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010865', 'SUNGKAI');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010866', 'TAIPING');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010867', 'TAMBUN');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010868', 'TANJUNG MALIM');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010869', 'TANJUNG PIANDANG');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010870', 'TANJUNG RAMBUTAN');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010871', 'TANJUNG TUALANG');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010872', 'TAPAH');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010873', 'TAPAH ROAD');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010874', 'TELUK BATIK');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010875', 'TELUK INTAN');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010876', 'TELUK RUBIAH');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010877', 'TEMOH');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010878', 'TEMOH STATION');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010879', 'TERONG');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010880', 'TERONOH');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010881', 'TROLAK');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010882', 'LAMBOR KANAN');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010883', 'BOTA KANAN');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010884', 'BOTA KIRI');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010885', 'KINTA');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010886', 'SEMANGGOL');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010887', 'TRONG');
INSERT INTO `sel_bandar` VALUES ('M01', '08', 'M010888', 'SIMPANG EMPAT');
INSERT INTO `sel_bandar` VALUES ('M01', '09', 'M010901', 'ARAU');
INSERT INTO `sel_bandar` VALUES ('M01', '09', 'M010902', 'CHUPING');
INSERT INTO `sel_bandar` VALUES ('M01', '09', 'M010903', 'KAKI BUKIT');
INSERT INTO `sel_bandar` VALUES ('M01', '09', 'M010904', 'KANGAR');
INSERT INTO `sel_bandar` VALUES ('M01', '09', 'M010905', 'KUALA PERLIS');
INSERT INTO `sel_bandar` VALUES ('M01', '09', 'M010906', 'PADANG BESAR');
INSERT INTO `sel_bandar` VALUES ('M01', '09', 'M010907', 'SANGLANG');
INSERT INTO `sel_bandar` VALUES ('M01', '09', 'M010908', 'WANG KELIAN');
INSERT INTO `sel_bandar` VALUES ('M01', '09', 'M010909', 'BESERI');
INSERT INTO `sel_bandar` VALUES ('M01', '09', 'M010910', 'MATA AYER');
INSERT INTO `sel_bandar` VALUES ('M01', '09', 'M010911', 'SIMPANG EMPAT');
INSERT INTO `sel_bandar` VALUES ('M01', '09', 'M010912', 'BUKIT KETERI');
INSERT INTO `sel_bandar` VALUES ('M01', '10', 'M011001', 'AMPANG');
INSERT INTO `sel_bandar` VALUES ('M01', '10', 'M011002', 'ASSAM JAWA');
INSERT INTO `sel_bandar` VALUES ('M01', '10', 'M011003', 'BAGAN LALANG');
INSERT INTO `sel_bandar` VALUES ('M01', '10', 'M011004', 'BAGAN NAKHODA OMAR');
INSERT INTO `sel_bandar` VALUES ('M01', '10', 'M011005', 'BALAKONG');
INSERT INTO `sel_bandar` VALUES ('M01', '10', 'M011006', 'BANDAR BARU BANGI');
INSERT INTO `sel_bandar` VALUES ('M01', '10', 'M011007', 'BANDAR BARU SELAYANG');
INSERT INTO `sel_bandar` VALUES ('M01', '10', 'M011008', 'BANDAR SUNWAY');
INSERT INTO `sel_bandar` VALUES ('M01', '10', 'M011009', 'BANGI');
INSERT INTO `sel_bandar` VALUES ('M01', '10', 'M011010', 'BANTING');
INSERT INTO `sel_bandar` VALUES ('M01', '10', 'M011011', 'BATANG KALI');
INSERT INTO `sel_bandar` VALUES ('M01', '10', 'M011012', 'BATU ARANG');
INSERT INTO `sel_bandar` VALUES ('M01', '10', 'M011013', 'BATU CAVES');
INSERT INTO `sel_bandar` VALUES ('M01', '10', 'M011014', 'BERANANG');
INSERT INTO `sel_bandar` VALUES ('M01', '10', 'M011015', 'BESTARI JAYA (BATANG BERJUNTAI)');
INSERT INTO `sel_bandar` VALUES ('M01', '10', 'M011016', 'BROGA');
INSERT INTO `sel_bandar` VALUES ('M01', '10', 'M011017', 'BUKIT LANJAN');
INSERT INTO `sel_bandar` VALUES ('M01', '10', 'M011018', 'BUKIT RAJA');
INSERT INTO `sel_bandar` VALUES ('M01', '10', 'M011019', 'BUKIT ROTAN');
INSERT INTO `sel_bandar` VALUES ('M01', '10', 'M011020', 'BUKIT TAGAR');
INSERT INTO `sel_bandar` VALUES ('M01', '10', 'M011021', 'CHERAS');
INSERT INTO `sel_bandar` VALUES ('M01', '10', 'M011022', 'CYBERJAYA');
INSERT INTO `sel_bandar` VALUES ('M01', '10', 'M011023', 'DAMANSARA');
INSERT INTO `sel_bandar` VALUES ('M01', '10', 'M011024', 'DENGKIL');
INSERT INTO `sel_bandar` VALUES ('M01', '10', 'M011025', 'IJOK');
INSERT INTO `sel_bandar` VALUES ('M01', '10', 'M011026', 'JENJAROM');
INSERT INTO `sel_bandar` VALUES ('M01', '10', 'M011027', 'JERAM');
INSERT INTO `sel_bandar` VALUES ('M01', '10', 'M011028', 'JUGRA');
INSERT INTO `sel_bandar` VALUES ('M01', '10', 'M011029', 'KAJANG');
INSERT INTO `sel_bandar` VALUES ('M01', '10', 'M011030', 'KALUMPANG');
INSERT INTO `sel_bandar` VALUES ('M01', '10', 'M011031', 'KAPAR');
INSERT INTO `sel_bandar` VALUES ('M01', '10', 'M011032', 'KELANA JAYA');
INSERT INTO `sel_bandar` VALUES ('M01', '10', 'M011033', 'KERLING');
INSERT INTO `sel_bandar` VALUES ('M01', '10', 'M011034', 'KUALA KUBU BHARU');
INSERT INTO `sel_bandar` VALUES ('M01', '10', 'M011035', 'KUALA SELANGOR');
INSERT INTO `sel_bandar` VALUES ('M01', '10', 'M011036', 'KUALA SUNGAI BULOH');
INSERT INTO `sel_bandar` VALUES ('M01', '10', 'M011037', 'KUANG');
INSERT INTO `sel_bandar` VALUES ('M01', '10', 'M011038', 'MERU');
INSERT INTO `sel_bandar` VALUES ('M01', '10', 'M011039', 'MORIB');
INSERT INTO `sel_bandar` VALUES ('M01', '10', 'M011040', 'PADANG JAWA');
INSERT INTO `sel_bandar` VALUES ('M01', '10', 'M011041', 'PANDAMARAN');
INSERT INTO `sel_bandar` VALUES ('M01', '10', 'M011042', 'PAYA JARAS');
INSERT INTO `sel_bandar` VALUES ('M01', '10', 'M011043', 'PORT KLANG');
INSERT INTO `sel_bandar` VALUES ('M01', '10', 'M011044', 'PUCHONG');
INSERT INTO `sel_bandar` VALUES ('M01', '10', 'M011045', 'RASA');
INSERT INTO `sel_bandar` VALUES ('M01', '10', 'M011046', 'RAWANG');
INSERT INTO `sel_bandar` VALUES ('M01', '10', 'M011047', 'SABAK BERNAM');
INSERT INTO `sel_bandar` VALUES ('M01', '10', 'M011048', 'SALAK TINGGI');
INSERT INTO `sel_bandar` VALUES ('M01', '10', 'M011049', 'SEKINCHAN');
INSERT INTO `sel_bandar` VALUES ('M01', '10', 'M011050', 'SEMENYIH');
INSERT INTO `sel_bandar` VALUES ('M01', '10', 'M011051', 'SEPANG');
INSERT INTO `sel_bandar` VALUES ('M01', '10', 'M011052', 'SERENDAH');
INSERT INTO `sel_bandar` VALUES ('M01', '10', 'M011053', 'SHAH ALAM');
INSERT INTO `sel_bandar` VALUES ('M01', '10', 'M011054', 'SIJANGKANG');
INSERT INTO `sel_bandar` VALUES ('M01', '10', 'M011055', 'SUBANG');
INSERT INTO `sel_bandar` VALUES ('M01', '10', 'M011056', 'SUBANG JAYA');
INSERT INTO `sel_bandar` VALUES ('M01', '10', 'M011057', 'SUNGAI AYER TAWAR');
INSERT INTO `sel_bandar` VALUES ('M01', '10', 'M011058', 'SUNGAI BESAR');
INSERT INTO `sel_bandar` VALUES ('M01', '10', 'M011059', 'SUNGAI BULOH');
INSERT INTO `sel_bandar` VALUES ('M01', '10', 'M011060', 'SUNGAI BURONG');
INSERT INTO `sel_bandar` VALUES ('M01', '10', 'M011061', 'SUNGAI CHOH');
INSERT INTO `sel_bandar` VALUES ('M01', '10', 'M011062', 'SUNGAI PANJANG');
INSERT INTO `sel_bandar` VALUES ('M01', '10', 'M011063', 'SUNGAI PELEK');
INSERT INTO `sel_bandar` VALUES ('M01', '10', 'M011064', 'SUNGAI PELONG');
INSERT INTO `sel_bandar` VALUES ('M01', '10', 'M011065', 'SUNGAI TENGI');
INSERT INTO `sel_bandar` VALUES ('M01', '10', 'M011066', 'TANJUNG HARAPAN');
INSERT INTO `sel_bandar` VALUES ('M01', '10', 'M011067', 'TANJUNG KARANG');
INSERT INTO `sel_bandar` VALUES ('M01', '10', 'M011068', 'TANJUNG SEPAT');
INSERT INTO `sel_bandar` VALUES ('M01', '10', 'M011069', 'TELUK DATOK');
INSERT INTO `sel_bandar` VALUES ('M01', '10', 'M011070', 'TELUK PANGLIMA GARANG');
INSERT INTO `sel_bandar` VALUES ('M01', '10', 'M011071', 'ULU KLANG');
INSERT INTO `sel_bandar` VALUES ('M01', '10', 'M011072', 'ULU YAM');
INSERT INTO `sel_bandar` VALUES ('M01', '10', 'M011073', 'GOMBAK');
INSERT INTO `sel_bandar` VALUES ('M01', '10', 'M011074', 'KLANG');
INSERT INTO `sel_bandar` VALUES ('M01', '10', 'M011075', 'SERI KEMBANGAN');
INSERT INTO `sel_bandar` VALUES ('M01', '10', 'M011076', 'PETALING JAYA');
INSERT INTO `sel_bandar` VALUES ('M01', '10', 'M011077', 'HULU LANGAT');
INSERT INTO `sel_bandar` VALUES ('M01', '10', 'M011078', 'SELAYANG');
INSERT INTO `sel_bandar` VALUES ('M01', '11', 'M011101', 'AJIL');
INSERT INTO `sel_bandar` VALUES ('M01', '11', 'M011102', 'BANDAR AL-MUKTAFI BILLAH SHAH');
INSERT INTO `sel_bandar` VALUES ('M01', '11', 'M011103', 'BANDAR KETENGAH JAYA');
INSERT INTO `sel_bandar` VALUES ('M01', '11', 'M011104', 'BANDAR PERMAISURI');
INSERT INTO `sel_bandar` VALUES ('M01', '11', 'M011105', 'BANDAR SERI BANDI');
INSERT INTO `sel_bandar` VALUES ('M01', '11', 'M011106', 'BATU RAKIT');
INSERT INTO `sel_bandar` VALUES ('M01', '11', 'M011107', 'BUKIT BESI');
INSERT INTO `sel_bandar` VALUES ('M01', '11', 'M011108', 'CHUKAI');
INSERT INTO `sel_bandar` VALUES ('M01', '11', 'M011109', 'GONG KEDAK');
INSERT INTO `sel_bandar` VALUES ('M01', '11', 'M011110', 'JABUR');
INSERT INTO `sel_bandar` VALUES ('M01', '11', 'M011111', 'JERANGAU');
INSERT INTO `sel_bandar` VALUES ('M01', '11', 'M011112', 'JERTEH');
INSERT INTO `sel_bandar` VALUES ('M01', '11', 'M011113', 'KEMASIK');
INSERT INTO `sel_bandar` VALUES ('M01', '11', 'M011114', 'KERTEH');
INSERT INTO `sel_bandar` VALUES ('M01', '11', 'M011115', 'KIJAL');
INSERT INTO `sel_bandar` VALUES ('M01', '11', 'M011116', 'KUALA BERANG');
INSERT INTO `sel_bandar` VALUES ('M01', '11', 'M011117', 'KUALA BESUT');
INSERT INTO `sel_bandar` VALUES ('M01', '11', 'M011118', 'KUALA DUNGUN');
INSERT INTO `sel_bandar` VALUES ('M01', '11', 'M011119', 'KUALA TERENGGANU');
INSERT INTO `sel_bandar` VALUES ('M01', '11', 'M011120', 'MARANG');
INSERT INTO `sel_bandar` VALUES ('M01', '11', 'M011121', 'MERCHANG');
INSERT INTO `sel_bandar` VALUES ('M01', '11', 'M011122', 'PAKA');
INSERT INTO `sel_bandar` VALUES ('M01', '11', 'M011123', 'PASIR RAJA');
INSERT INTO `sel_bandar` VALUES ('M01', '11', 'M011124', 'RANTAU ABANG');
INSERT INTO `sel_bandar` VALUES ('M01', '11', 'M011125', 'RASAU KERTEH');
INSERT INTO `sel_bandar` VALUES ('M01', '11', 'M011126', 'SEBERANG TAKIR');
INSERT INTO `sel_bandar` VALUES ('M01', '11', 'M011127', 'TELUK KALUNG');
INSERT INTO `sel_bandar` VALUES ('M01', '11', 'M011128', 'WAKAF TAPAI');
INSERT INTO `sel_bandar` VALUES ('M01', '11', 'M011129', 'DUNGUN');
INSERT INTO `sel_bandar` VALUES ('M01', '11', 'M011130', 'BESUT');
INSERT INTO `sel_bandar` VALUES ('M01', '11', 'M011131', 'KEMAMAN');
INSERT INTO `sel_bandar` VALUES ('M01', '11', 'M011132', 'SETIU');
INSERT INTO `sel_bandar` VALUES ('M01', '11', 'M011133', 'BUKIT PAYONG');
INSERT INTO `sel_bandar` VALUES ('M01', '12', 'M011201', 'BALAMBANGAN ISLAND');
INSERT INTO `sel_bandar` VALUES ('M01', '12', 'M011202', 'BANGGI ISLAND');
INSERT INTO `sel_bandar` VALUES ('M01', '12', 'M011203', 'BEAUFORT');
INSERT INTO `sel_bandar` VALUES ('M01', '12', 'M011204', 'BELURAN');
INSERT INTO `sel_bandar` VALUES ('M01', '12', 'M011205', 'BERHALA ISLAND');
INSERT INTO `sel_bandar` VALUES ('M01', '12', 'M011206', 'BINGKOR');
INSERT INTO `sel_bandar` VALUES ('M01', '12', 'M011207', 'BONGAWAN');
INSERT INTO `sel_bandar` VALUES ('M01', '12', 'M011208', 'DONGGONGON');
INSERT INTO `sel_bandar` VALUES ('M01', '12', 'M011209', 'GAYA ISLAND');
INSERT INTO `sel_bandar` VALUES ('M01', '12', 'M011210', 'INANAM');
INSERT INTO `sel_bandar` VALUES ('M01', '12', 'M011211', 'ISLANDS');
INSERT INTO `sel_bandar` VALUES ('M01', '12', 'M011212', 'JAMBONGAN ISLAND');
INSERT INTO `sel_bandar` VALUES ('M01', '12', 'M011213', 'KALABAKAN');
INSERT INTO `sel_bandar` VALUES ('M01', '12', 'M011214', 'KAPALAI ISLAND');
INSERT INTO `sel_bandar` VALUES ('M01', '12', 'M011215', 'KENINGAU');
INSERT INTO `sel_bandar` VALUES ('M01', '12', 'M011216', 'KIMANIS');
INSERT INTO `sel_bandar` VALUES ('M01', '12', 'M011217', 'KINABATANGAN');
INSERT INTO `sel_bandar` VALUES ('M01', '12', 'M011218', 'KINARUT');
INSERT INTO `sel_bandar` VALUES ('M01', '12', 'M011219', 'KOTA BELUD');
INSERT INTO `sel_bandar` VALUES ('M01', '12', 'M011220', 'KOTA KINABALU');
INSERT INTO `sel_bandar` VALUES ('M01', '12', 'M011221', 'KOTA MARUDU');
INSERT INTO `sel_bandar` VALUES ('M01', '12', 'M011222', 'KUALA PENYU');
INSERT INTO `sel_bandar` VALUES ('M01', '12', 'M011223', 'KUDAT');
INSERT INTO `sel_bandar` VALUES ('M01', '12', 'M011224', 'KUNAK');
INSERT INTO `sel_bandar` VALUES ('M01', '12', 'M011225', 'KUNDASANG');
INSERT INTO `sel_bandar` VALUES ('M01', '12', 'M011226', 'LAHAD DATU');
INSERT INTO `sel_bandar` VALUES ('M01', '12', 'M011227', 'LANKAYAN ISLAND');
INSERT INTO `sel_bandar` VALUES ('M01', '12', 'M011228', 'LAYANG LAYANG ISLAND');
INSERT INTO `sel_bandar` VALUES ('M01', '12', 'M011229', 'LIBARAN ISLAND');
INSERT INTO `sel_bandar` VALUES ('M01', '12', 'M011230', 'LIGITAN ISLAND');
INSERT INTO `sel_bandar` VALUES ('M01', '12', 'M011231', 'MABUL ISLAND');
INSERT INTO `sel_bandar` VALUES ('M01', '12', 'M011232', 'MALAWALI ISLAND');
INSERT INTO `sel_bandar` VALUES ('M01', '12', 'M011233', 'MEMBAKUT');
INSERT INTO `sel_bandar` VALUES ('M01', '12', 'M011234', 'MENGGATAL');
INSERT INTO `sel_bandar` VALUES ('M01', '12', 'M011235', 'NABAWAN');
INSERT INTO `sel_bandar` VALUES ('M01', '12', 'M011236', 'PAPAR');
INSERT INTO `sel_bandar` VALUES ('M01', '12', 'M011237', 'PENSIANGAN');
INSERT INTO `sel_bandar` VALUES ('M01', '12', 'M011238', 'PITAS');
INSERT INTO `sel_bandar` VALUES ('M01', '12', 'M011239', 'PUTATAN');
INSERT INTO `sel_bandar` VALUES ('M01', '12', 'M011240', 'RANAU');
INSERT INTO `sel_bandar` VALUES ('M01', '12', 'M011241', 'SANDAKAN');
INSERT INTO `sel_bandar` VALUES ('M01', '12', 'M011242', 'SAPULUT');
INSERT INTO `sel_bandar` VALUES ('M01', '12', 'M011243', 'SEBATIK ISLAND');
INSERT INTO `sel_bandar` VALUES ('M01', '12', 'M011244', 'SELINGAN ISLAND');
INSERT INTO `sel_bandar` VALUES ('M01', '12', 'M011245', 'SEMPORNA');
INSERT INTO `sel_bandar` VALUES ('M01', '12', 'M011246', 'SEPANGGAR');
INSERT INTO `sel_bandar` VALUES ('M01', '12', 'M011247', 'SINDUMIN');
INSERT INTO `sel_bandar` VALUES ('M01', '12', 'M011248', 'SIPADAN ISLAND');
INSERT INTO `sel_bandar` VALUES ('M01', '12', 'M011249', 'SIPITANG');
INSERT INTO `sel_bandar` VALUES ('M01', '12', 'M011250', 'TABAWAN ISLAND');
INSERT INTO `sel_bandar` VALUES ('M01', '12', 'M011251', 'TAMBUNAN');
INSERT INTO `sel_bandar` VALUES ('M01', '12', 'M011252', 'TAMPARULI');
INSERT INTO `sel_bandar` VALUES ('M01', '12', 'M011253', 'TAWAU');
INSERT INTO `sel_bandar` VALUES ('M01', '12', 'M011254', 'TELIPOK');
INSERT INTO `sel_bandar` VALUES ('M01', '12', 'M011255', 'TELUPID');
INSERT INTO `sel_bandar` VALUES ('M01', '12', 'M011256', 'TENOM');
INSERT INTO `sel_bandar` VALUES ('M01', '12', 'M011257', 'TIGA ISLAND');
INSERT INTO `sel_bandar` VALUES ('M01', '12', 'M011258', 'TIMBUN MATA ISLAND');
INSERT INTO `sel_bandar` VALUES ('M01', '12', 'M011259', 'TUARAN');
INSERT INTO `sel_bandar` VALUES ('M01', '12', 'M011260', 'WESTON');
INSERT INTO `sel_bandar` VALUES ('M01', '13', 'M011301', 'KUCHING');
INSERT INTO `sel_bandar` VALUES ('M01', '13', 'M011302', 'MIRI');
INSERT INTO `sel_bandar` VALUES ('M01', '13', 'M011303', 'TOWNS');
INSERT INTO `sel_bandar` VALUES ('M01', '13', 'M011304', 'ASAJAYA');
INSERT INTO `sel_bandar` VALUES ('M01', '13', 'M011305', 'BA\'KELALAN');
INSERT INTO `sel_bandar` VALUES ('M01', '13', 'M011306', 'BAU');
INSERT INTO `sel_bandar` VALUES ('M01', '13', 'M011307', 'BELADIN');
INSERT INTO `sel_bandar` VALUES ('M01', '13', 'M011308', 'BETONG');
INSERT INTO `sel_bandar` VALUES ('M01', '13', 'M011309', 'BINTANGOR');
INSERT INTO `sel_bandar` VALUES ('M01', '13', 'M011310', 'BINTULU');
INSERT INTO `sel_bandar` VALUES ('M01', '13', 'M011311', 'DALAT');
INSERT INTO `sel_bandar` VALUES ('M01', '13', 'M011312', 'DARO');
INSERT INTO `sel_bandar` VALUES ('M01', '13', 'M011313', 'DEBAK');
INSERT INTO `sel_bandar` VALUES ('M01', '13', 'M011314', 'ENGKILILI');
INSERT INTO `sel_bandar` VALUES ('M01', '13', 'M011315', 'JULAU');
INSERT INTO `sel_bandar` VALUES ('M01', '13', 'M011316', 'KANOWIT');
INSERT INTO `sel_bandar` VALUES ('M01', '13', 'M011317', 'KAPIT');
INSERT INTO `sel_bandar` VALUES ('M01', '13', 'M011318', 'KOTA SAMARAHAN');
INSERT INTO `sel_bandar` VALUES ('M01', '13', 'M011319', 'LAWAS');
INSERT INTO `sel_bandar` VALUES ('M01', '13', 'M011320', 'LIMBANG');
INSERT INTO `sel_bandar` VALUES ('M01', '13', 'M011321', 'LINGGA');
INSERT INTO `sel_bandar` VALUES ('M01', '13', 'M011322', 'LUBOK ANTU');
INSERT INTO `sel_bandar` VALUES ('M01', '13', 'M011323', 'LUNDU');
INSERT INTO `sel_bandar` VALUES ('M01', '13', 'M011324', 'MALUDAM');
INSERT INTO `sel_bandar` VALUES ('M01', '13', 'M011325', 'MATU');
INSERT INTO `sel_bandar` VALUES ('M01', '13', 'M011326', 'MUKAH');
INSERT INTO `sel_bandar` VALUES ('M01', '13', 'M011327', 'MARUDI');
INSERT INTO `sel_bandar` VALUES ('M01', '13', 'M011328', 'OYA');
INSERT INTO `sel_bandar` VALUES ('M01', '13', 'M011329', 'PAKAN');
INSERT INTO `sel_bandar` VALUES ('M01', '13', 'M011330', 'PUSA');
INSERT INTO `sel_bandar` VALUES ('M01', '13', 'M011331', 'SARATOK');
INSERT INTO `sel_bandar` VALUES ('M01', '13', 'M011332', 'SEBUYAU');
INSERT INTO `sel_bandar` VALUES ('M01', '13', 'M011333', 'SERIAN');
INSERT INTO `sel_bandar` VALUES ('M01', '13', 'M011334', 'SERIKIN');
INSERT INTO `sel_bandar` VALUES ('M01', '13', 'M011335', 'SELANGAU');
INSERT INTO `sel_bandar` VALUES ('M01', '13', 'M011336', 'SIBU');
INSERT INTO `sel_bandar` VALUES ('M01', '13', 'M011337', 'SIBURAN');
INSERT INTO `sel_bandar` VALUES ('M01', '13', 'M011338', 'SIMUNJAN');
INSERT INTO `sel_bandar` VALUES ('M01', '13', 'M011339', 'SPAOH');
INSERT INTO `sel_bandar` VALUES ('M01', '13', 'M011340', 'SUNGAI TUJUH');
INSERT INTO `sel_bandar` VALUES ('M01', '13', 'M011341', 'TANJUNG KIDURONG');
INSERT INTO `sel_bandar` VALUES ('M01', '13', 'M011342', 'TATAU');
INSERT INTO `sel_bandar` VALUES ('M01', '13', 'M011343', 'TEBEDU');
INSERT INTO `sel_bandar` VALUES ('M01', '14', 'M011401', 'DAMANSARA');
INSERT INTO `sel_bandar` VALUES ('M01', '14', 'M011402', 'SEPUTEH');
INSERT INTO `sel_bandar` VALUES ('M01', '14', 'M011403', 'SEGAMBUT');
INSERT INTO `sel_bandar` VALUES ('M01', '14', 'M011404', 'KEPONG');
INSERT INTO `sel_bandar` VALUES ('M01', '14', 'M011405', 'WANGSA MAJU');
INSERT INTO `sel_bandar` VALUES ('M01', '14', 'M011406', 'KUALA LUMPUR');
INSERT INTO `sel_bandar` VALUES ('M01', '14', 'M011407', 'SETIAWANGSA');
INSERT INTO `sel_bandar` VALUES ('M01', '14', 'M011408', 'BANDAR TUN RAZAK');
INSERT INTO `sel_bandar` VALUES ('M01', '14', 'M011409', 'SUNGAI BESI');
INSERT INTO `sel_bandar` VALUES ('M01', '14', 'M011410', 'BATU');
INSERT INTO `sel_bandar` VALUES ('M01', '14', 'M011411', 'BUKIT BINTANG');
INSERT INTO `sel_bandar` VALUES ('M01', '14', 'M011412', 'CHERAS');
INSERT INTO `sel_bandar` VALUES ('M01', '14', 'M011413', 'KEPONG');
INSERT INTO `sel_bandar` VALUES ('M01', '14', 'M011414', 'LEMBAH PANTAI');
INSERT INTO `sel_bandar` VALUES ('M01', '14', 'M011415', 'TITIWANGSA');
INSERT INTO `sel_bandar` VALUES ('M01', '14', 'M011416', 'SENTUL');
INSERT INTO `sel_bandar` VALUES ('M01', '14', 'M011417', 'KERAMAT');
INSERT INTO `sel_bandar` VALUES ('M01', '15', 'M011501', 'LABUAN');
INSERT INTO `sel_bandar` VALUES ('M01', '16', 'M011601', 'PUTRAJAYA');
INSERT INTO `sel_bandar` VALUES ('MALI', 'MALI0', 'MALU1', 'BANDAR SERI MALU');
INSERT INTO `sel_bandar` VALUES ('S18', 'S1801', 'S180101', 'GALCAOI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0301', 'T030101', 'PHRA NAKHON');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0301', 'T030102', 'DUSIT');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0301', 'T030103', 'NONG CHOK');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0301', 'T030104', 'BANG RAK');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0301', 'T030105', 'BANG KHEN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0301', 'T030106', 'BANG KAPI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0301', 'T030107', 'PATHUM WAN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0301', 'T030108', 'POM PRAP SATTRU PHAI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0301', 'T030109', 'PHRA KHANONG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0301', 'T030110', 'MIN BURI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0301', 'T030111', 'LAT KRABANG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0301', 'T030112', 'YAN NAWA');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0301', 'T030113', 'SAMPHANTHAWONG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0301', 'T030114', 'PHAYA THAI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0301', 'T030115', 'THON BURI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0301', 'T030116', 'BANGKOK YAI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0301', 'T030117', 'HUAI KHWANG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0301', 'T030118', 'KHLONG SAN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0301', 'T030119', 'TALING CHAN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0301', 'T030120', 'BANGKOK NOI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0301', 'T030121', 'BANG KHUN THIAN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0301', 'T030122', 'PHASI CHAROEN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0301', 'T030123', 'NONG KHAEM');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0301', 'T030124', 'RAT BURANA');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0301', 'T030125', 'BANG PHLAT');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0301', 'T030126', 'DIN DAENG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0301', 'T030127', 'BUENG KUM');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0301', 'T030128', 'SATHON');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0301', 'T030129', 'BANG SUE');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0301', 'T030130', 'CHATUCHAK');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0301', 'T030131', 'BANG KHO LAEM');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0301', 'T030132', 'PRAWET');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0301', 'T030133', 'KHLONG TOEI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0301', 'T030134', 'SUAN LUANG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0301', 'T030135', 'CHOM THOM');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0301', 'T030136', 'DON MUEANG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0301', 'T030137', 'RATCHATHEWI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0301', 'T030138', 'LAT PHRAO');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0301', 'T030139', 'WATTHANA');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0301', 'T030140', 'BANG KHAE');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0301', 'T030141', 'LAK SI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0301', 'T030142', 'SAI MAI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0301', 'T030143', 'KHAN NA YAO');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0301', 'T030144', 'SAPHAN SUNG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0301', 'T030145', 'WANG THONGLANG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0301', 'T030146', 'KHLONG SAM WA');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0301', 'T030147', 'BANG NA');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0301', 'T030148', 'THAWI WATTHANA');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0301', 'T030149', 'THUNG KHRU');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0301', 'T030150', 'BANG BON');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0301', 'T030151', 'THUNG_KHRU');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0301', 'T030152', 'BANG BON');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0302', 'T030201', 'MUEANG CHIANG MAI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0302', 'T030202', 'CHOM THONG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0302', 'T030203', 'MAE CHAEM');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0302', 'T030204', 'CHIANG DAO');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0302', 'T030205', 'DOI SAKET');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0302', 'T030206', 'MAE TAENG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0302', 'T030207', 'MAE RIM');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0302', 'T030208', 'SAMOENG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0302', 'T030209', 'FANG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0302', 'T030210', 'MAE AI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0302', 'T030211', 'PHRAO');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0302', 'T030212', 'SAN PA TONG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0302', 'T030213', 'SAN KAMPHAENG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0302', 'T030214', 'SAN SAI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0302', 'T030215', 'HANG DONG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0302', 'T030216', 'HOT');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0302', 'T030217', 'DOI TAO');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0302', 'T030218', 'OMKOI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0302', 'T030219', 'SARAPHI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0302', 'T030220', 'WIANG HAENG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0302', 'T030221', 'CHAI PRAKAN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0302', 'T030222', 'MAE WANG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0302', 'T030223', 'MAE ON');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0302', 'T030224', 'DOI LO');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0303', 'T030301', 'MUEANG CHIANG RAI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0303', 'T030302', 'WIANG CHAI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0303', 'T030303', 'CHIANG KHONG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0303', 'T030304', 'THOENG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0303', 'T030305', 'PHAN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0303', 'T030306', 'PA DAET');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0303', 'T030307', 'MAE CHAN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0303', 'T030308', 'CHIANG SAEN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0303', 'T030309', 'MAE SAI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0303', 'T030310', 'MAE SUAI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0303', 'T030311', 'WIANG PA PAO');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0303', 'T030312', 'PHAYA MENGRAI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0303', 'T030313', 'WIANG KAEN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0303', 'T030314', 'KHUN TAN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0303', 'T030315', 'MAE FA LUANG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0303', 'T030316', 'MAE LAO');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0303', 'T030317', 'WIANG CHIANG RUNG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0303', 'T030318', 'DOI LUANG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0304', 'T030401', 'MUEANG CHONBURI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0304', 'T030402', 'BAN BUENG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0304', 'T030403', 'NONG YAI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0304', 'T030404', 'BANG LAMUNG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0304', 'T030405', 'PHAN THONG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0304', 'T030406', 'PHANAT NIKHOM');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0304', 'T030407', 'SI RACHA');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0304', 'T030408', 'KO SICHANG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0304', 'T030409', 'SATTAHIP');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0304', 'T030410', 'BO THONG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0304', 'T030411', 'KO CHAN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0305', 'T030501', 'MUEANG KANCHANABURI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0305', 'T030502', 'SAI YOK');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0305', 'T030503', 'BO PHLOI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0305', 'T030504', 'SI SAWAT');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0305', 'T030505', 'THA MAKA');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0305', 'T030506', 'THA MUANG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0305', 'T030507', 'THONG PHA PHUM');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0305', 'T030508', 'SANGKHLA BURI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0305', 'T030509', 'PHANOM THUAN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0305', 'T030510', 'LAO KHWAN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0305', 'T030511', 'DAN MAKHAM TIA');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0305', 'T030512', 'NONG PRUE');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0305', 'T030513', 'HUAI KRACHAO');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0306', 'T030601', 'PUEAI NOI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0306', 'T030602', 'PHON');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0306', 'T030603', 'WAENG YAI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0306', 'T030604', 'WAENG NOI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0306', 'T030605', 'NONG SONG HONG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0306', 'T030606', 'PHU WIANG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0306', 'T030607', 'MANCHA KHIRI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0306', 'T030608', 'CHONNABOT');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0306', 'T030609', 'KHAO SUAN KWANG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0306', 'T030610', 'PHU PHA MAN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0306', 'T030611', 'SAM SUNG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0306', 'T030612', 'KHOK PHO CHAI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0306', 'T030613', 'NONG NA KHAM');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0306', 'T030614', 'BAN HAET');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0306', 'T030615', 'NON SILA');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0306', 'T030616', 'WIANG KAO');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0307', 'T030701', 'MUEANG NAKHON RATCHASIMA');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0307', 'T030702', 'KHON BURI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0307', 'T030703', 'SOENG SANG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0307', 'T030704', 'KHONG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0307', 'T030705', 'BAN LUEAM');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0307', 'T030706', 'CHAKKARAT');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0307', 'T030707', 'CHOK CHAI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0307', 'T030708', 'DAN KHUN THOT');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0307', 'T030709', 'NON THAI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0307', 'T030710', 'NON SUNG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0307', 'T030711', 'KHAM SAKAESAENG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0307', 'T030712', 'BUA YAI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0307', 'T030713', 'PRATHAI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0307', 'T030714', 'PAK THONG CHAI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0307', 'T030715', 'PHIMAI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0307', 'T030716', 'HUAI THALAENG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0307', 'T030717', 'CHUM PHUANG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0307', 'T030718', 'SUNG NOEN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0307', 'T030719', 'KHAM THALE SO');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0307', 'T030720', 'SIKHIO');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0307', 'T030721', 'PAK CHONG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0307', 'T030722', 'NONG BUN MAK');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0307', 'T030723', 'KAENG SANAM NANG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0307', 'T030724', 'NON DAENG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0307', 'T030725', 'WANG NAM KHIAO');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0307', 'T030726', 'THEPHARAK');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0307', 'T030727', 'MUEANG YANG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0307', 'T030728', 'PHRA THONG KHAM');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0307', 'T030729', 'LAM THAMENCHAI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0307', 'T030730', 'BUA LAI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0307', 'T030731', 'SIDA');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0307', 'T030732', 'CHALOEM PHRA KIAT');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0308', 'T030801', 'MUEANG NAKHON SI THAMMARAT');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0308', 'T030802', 'PHROM KHIRI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0308', 'T030803', 'LAN SAKA');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0308', 'T030804', 'CHAWANG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0308', 'T030805', 'PHIPUN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0308', 'T030806', 'CHIAN YAI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0308', 'T030807', 'CHA-UAT');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0308', 'T030808', 'THA SALA');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0308', 'T030809', 'THUNG SONG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0308', 'T030810', 'NA BON');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0308', 'T030811', 'THUNG YAI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0308', 'T030812', 'PAK PHANANG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0308', 'T030813', 'RON PHIBUN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0308', 'T030814', 'SICHON');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0308', 'T030815', 'KHANOM');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0308', 'T030816', 'HUA SAI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0308', 'T030817', 'BANG KHAN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0308', 'T030818', 'THAM PHANNARA');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0308', 'T030819', 'CHULABHORN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0308', 'T030820', 'PHRA PHROM');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0308', 'T030821', 'NOPPHITAM');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0308', 'T030822', 'CHANG KLANG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0308', 'T030823', 'CHALOEM PHRA KIAT');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0309', 'T030901', 'MUEANG NARATHIWAT');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0309', 'T030902', 'TAK BAI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0309', 'T030903', 'BACHO');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0309', 'T030904', 'YI-NGO');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0309', 'T030905', 'RA-NGAE');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0309', 'T030906', 'RUESO (MALAY: RUSA)');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0309', 'T030907', 'SI SAKHON');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0309', 'T030908', 'WAENG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0309', 'T030909', 'SUKHIRIN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0309', 'T030910', 'SU-NGAI KOLOK (MALAY: SUNGAI GOLOK)');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0309', 'T030911', 'SU-NGAI PADI (MALAY: SUNGAI PADI)');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0309', 'T030912', 'CHANAE');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0309', 'T030913', 'CHO-AIRONG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0310', 'T031001', 'MUEANG PATTANI (MALAY: PATANI)');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0310', 'T031002', 'KHOK PHO');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0310', 'T031003', 'NONG CHIK');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0310', 'T031004', 'PANARE');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0310', 'T031005', 'MAYO');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0310', 'T031006', 'THUNG YANG DAENG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0310', 'T031007', 'SAI BURI (MALAY: TELUBAN OR SELINDUNG BAYU)');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0310', 'T031008', 'MAI KAEN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0310', 'T031009', 'YARING (MALAY: JARING)');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0310', 'T031010', 'YARANG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0310', 'T031011', 'MAE LAN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0310', 'T031012', 'KAPHO');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0311', 'T031101', 'MUEANG FUKET');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0311', 'T031102', 'KATHU');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0311', 'T031103', 'THALANG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0312', 'T031201', 'MUEANG SONGKHLA (MALAY: SINGGORA)');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0312', 'T031202', 'SATHING PHRA');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0312', 'T031203', 'CHANA (MALAY: CHENOK)');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0312', 'T031204', 'NA THAWI (MALAY: NAWI)');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0312', 'T031205', 'THEPHA (MALAY: TIBA)');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0312', 'T031206', 'SABA YOI (MALAY: SEBAYU)');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0312', 'T031207', 'RANOT (MALAY: RENUT)');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0312', 'T031208', 'KRASAE SIN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0312', 'T031209', 'RATTAPHUM');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0312', 'T031210', 'SADAO (MALAY: SENDAWA)');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0312', 'T031211', 'HAT YAI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0312', 'T031212', 'NA MOM');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0312', 'T031213', 'KHUAN NIANG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0312', 'T031214', 'BANG KLAM');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0312', 'T031215', 'SINGHANAKHON');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0312', 'T031216', 'KHLONG HOI KHONG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0313', 'T031301', 'MUEANG UBON RATCHATHANI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0313', 'T031302', 'SI MUEANG MAI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0313', 'T031303', 'KHONG CHIAM');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0313', 'T031304', 'KHUEANG NAI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0313', 'T031305', 'KHEMARAT');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0313', 'T031306', 'DET UDOM');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0313', 'T031307', 'NA CHALUAI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0313', 'T031308', 'NAM YUEN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0313', 'T031309', 'BUNTHARIK');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0313', 'T031310', 'TRAKAN PHUET PHON');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0313', 'T031311', 'KUT KHAOPUN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0313', 'T031312', 'MUANG SAM SIP');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0313', 'T031313', 'WARIN CHAMRAP');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0313', 'T031314', 'PHIBUN MANGSAHAN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0313', 'T031315', 'TAN SUM');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0313', 'T031316', 'PHO SAI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0313', 'T031317', 'SAMRONG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0313', 'T031318', 'DON MOT DAENG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0313', 'T031319', 'SIRINDHORN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0313', 'T031320', 'THUNG SI UDOM');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0313', 'T031321', 'NA YIA');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0313', 'T031322', 'NA TAN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0313', 'T031323', 'LAO SUEA KOK');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0313', 'T031324', 'SAWANG WIRAWONG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0313', 'T031325', 'NAM KHUN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0314', 'T031401', 'MUEANG UDON THANI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0314', 'T031402', 'KUT CHAP');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0314', 'T031403', 'NONG WUA SO');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0314', 'T031404', 'KUMPHAWAPI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0314', 'T031405', 'NON SA-AT');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0314', 'T031406', 'NONG HAN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0314', 'T031407', 'THUNG FON');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0314', 'T031408', 'CHAI WAN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0314', 'T031409', 'SI THAT');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0314', 'T031410', 'WANG SAM MO');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0314', 'T031411', 'BAN DUNG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0314', 'T031412', 'BAN PHUE');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0314', 'T031413', 'NAM SOM');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0314', 'T031414', 'PHEN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0314', 'T031415', 'SANG KHOM');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0314', 'T031416', 'NONG SAENG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0314', 'T031417', 'NA YUNG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0314', 'T031418', 'PHIBUN RAK');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0314', 'T031419', 'KU KAEO');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0314', 'T031420', 'PRACHAKSINLAPAKHOM');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0315', 'T031501', 'MUEANG YALA');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0315', 'T031502', 'BETONG (MALAY: BETUNG)');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0315', 'T031503', 'BANNANG SATA (MALAY: BENANG SETAR)');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0315', 'T031504', 'THAN TO');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0315', 'T031505', 'YAHA');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0315', 'T031506', 'RAMAN (MALAY: REMAN)');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0315', 'T031507', 'KABANG (MALAY: KABAE OR KABE)');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0315', 'T031508', 'KRONG PINANG (MALAY: KAMPUNG PINANG)');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0316', 'T031601', 'MUEANG ANG THONG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0316', 'T031602', 'CHAIYO');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0316', 'T031603', 'PA MOK');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0316', 'T031604', 'PHO THONG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0316', 'T031605', 'SAWAENG HA');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0316', 'T031606', 'WISET CHAI CHAN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0316', 'T031607', 'SAMKO');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0317', 'T031701', 'MUEANG CHAINAT');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0317', 'T031702', 'MANOROM');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0317', 'T031703', 'WAT SING');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0317', 'T031704', 'SAPPHAYA');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0317', 'T031705', 'SANKHABURI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0317', 'T031706', 'HANKHA');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0317', 'T031707', 'NONG MAMONG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0317', 'T031708', 'NOEN KHAM');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0318', 'T031801', 'MUEANG LOP BURI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0318', 'T031802', 'PHATTHANA NIKHOM');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0318', 'T031803', 'KHOK SAMRONG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0318', 'T031804', 'CHAI BADAN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0318', 'T031805', 'THA WUNG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0318', 'T031806', 'BAN MI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0318', 'T031807', 'THA LUANG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0318', 'T031808', 'SA BOT');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0318', 'T031809', 'KHOK CHAROEN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0318', 'T031810', 'LAM SONTHI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0318', 'T031811', 'NONG MUANG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0319', 'T031901', 'MUEANG NAKHON NAYOK');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0319', 'T031902', 'PAK PHLI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0319', 'T031903', 'BAN NA');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0319', 'T031904', 'ONGKHARAK');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0320', 'T032001', 'MUEANG NAKHON PATHOM');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0320', 'T032002', 'KAMPHAENG SAEN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0320', 'T032003', 'NAKHON CHAI SI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0320', 'T032004', 'DON TUM');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0320', 'T032005', 'BANG LEN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0320', 'T032006', 'SAM PHRAN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0320', 'T032007', 'PHUTTHAMONTHON');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0321', 'T032101', 'MUEANG NONTHABURI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0321', 'T032102', 'BANG KRUAI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0321', 'T032103', 'BANG YAI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0321', 'T032104', 'BANG BUA THONG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0321', 'T032105', 'SAI NOI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0321', 'T032106', 'PAK KRET');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0322', 'T032201', 'MUEANG PATHUM THANI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0322', 'T032202', 'KHLONG LUANG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0322', 'T032203', 'THANYABURI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0322', 'T032204', 'NONG SUEA');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0322', 'T032205', 'LAT LUM KAEO');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0322', 'T032206', 'LAM LUK KA');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0322', 'T032207', 'SAM KHOK');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0323', 'T032301', 'MUEANG PHETCHABURI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0323', 'T032302', 'KHAO YOI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0323', 'T032303', 'NONG YA PLONG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0323', 'T032304', 'CHA-AM');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0323', 'T032305', 'THA YANG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0323', 'T032306', 'BAN LAT');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0323', 'T032307', 'BAN LAEM');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0323', 'T032308', 'KAENG KRACHAN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0324', 'T032401', 'PHRA NAKHON SI AYUTTHAYA');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0324', 'T032402', 'THA RUEA');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0324', 'T032403', 'NAKHON LUANG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0324', 'T032404', 'BANG SAI (บางไทร)');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0324', 'T032405', 'BANG BAN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0324', 'T032406', 'BANG PA-IN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0324', 'T032407', 'BANG PAHAN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0324', 'T032408', 'PHAK HAI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0324', 'T032409', 'PHACHI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0324', 'T032410', 'LAT BUA LUANG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0324', 'T032411', 'WANG NOI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0324', 'T032412', 'SENA');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0324', 'T032413', 'UTHAI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0324', 'T032414', 'MAHA RAT');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0324', 'T032415', 'BAN PHRAEK');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0325', 'T032501', 'MUEANG PRACHUAP KHIRI KHAN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0325', 'T032502', 'KUI BURI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0325', 'T032503', 'THAP SAKAE');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0325', 'T032504', 'BANG SAPHAN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0325', 'T032505', 'BANG SAPHAN NOI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0325', 'T032506', 'PRAN BURI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0325', 'T032507', 'HUA HIN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0325', 'T032508', 'SAM ROI YOT');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0326', 'T032601', 'MUEANG RATCHABURI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0326', 'T032602', 'CHOM BUENG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0326', 'T032603', 'SUAN PHUENG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0326', 'T032604', 'DAMNOEN SADUAK');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0326', 'T032605', 'BAN PONG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0326', 'T032606', 'BANG PHAE');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0326', 'T032607', 'PHOTHARAM');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0326', 'T032608', 'PAK THO');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0326', 'T032609', 'WAT PHLENG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0326', 'T032610', 'BAN KHA');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0327', 'T032701', 'MUEANG SAMUT PRAKAN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0327', 'T032702', 'BANG BO');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0327', 'T032703', 'BANG PHLI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0327', 'T032704', 'PHRA PRADAENG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0327', 'T032705', 'PHRA SAMUT CHEDI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0327', 'T032706', 'BANG SAO THONG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0328', 'T032801', 'MUEANG SAMUT SAKHON');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0328', 'T032802', 'KRATHUM BAEN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0328', 'T032803', 'BAN PHAEO');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0329', 'T032901', 'MUEANG SAMUT SONGKHRAM');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0329', 'T032902', 'BANG KHONTHI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0329', 'T032903', 'AMPHAWA');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0330', 'T033001', 'MUEANG SARABURI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0330', 'T033002', 'KAENG KHOI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0330', 'T033003', 'NONG KHAE');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0330', 'T033004', 'WIHAN DAENG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0330', 'T033005', 'NONG SAENG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0330', 'T033006', 'BAN MO');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0330', 'T033007', 'DON PHUT');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0330', 'T033008', 'NONG DON');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0330', 'T033009', 'PHRA PHUTTHABAT');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0330', 'T033010', 'SAO HAI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0330', 'T033011', 'MUAK LEK');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0330', 'T033012', 'WANG MUANG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0330', 'T033013', 'CHALOEM PHRA KIAT');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0331', 'T033101', 'MUEANG SING BURI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0331', 'T033102', 'BANG RACHAN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0331', 'T033103', 'KHAI BANG RACHAN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0331', 'T033104', 'PHROM BURI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0331', 'T033105', 'THA CHANG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0331', 'T033106', 'IN BURI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0332', 'T033201', 'MUEANG SUPHAN BURI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0332', 'T033202', 'DOEM BANG NANG BUAT');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0332', 'T033203', 'DAN CHANG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0332', 'T033204', 'BANG PLA MA');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0332', 'T033205', 'SI PRACHAN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0332', 'T033206', 'DON CHEDI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0332', 'T033207', 'SONG PHI NONG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0332', 'T033208', 'SAM CHUK');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0332', 'T033209', 'U THONG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0332', 'T033210', 'NONG YA SAI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0333', 'T033301', 'MUEANG CHACHOENGSAO');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0333', 'T033302', 'BANG KHLA');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0333', 'T033303', 'BANG NAM PRIAO');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0333', 'T033304', 'BANG PAKONG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0333', 'T033305', 'BAN PHO');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0333', 'T033306', 'PHANOM SARAKHAM');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0333', 'T033307', 'RATCHASAN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0333', 'T033308', 'SANAM CHAI KHET');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0333', 'T033309', 'PLAENG YAO');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0333', 'T033310', 'THA TAKIAP');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0333', 'T033311', 'KHLONG KHUEAN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0334', 'T033401', 'MUEANG CHANTHABURI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0334', 'T033402', 'KHLUNG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0334', 'T033403', 'THA MAI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0334', 'T033404', 'PONG NAM RON');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0334', 'T033405', 'MAKHAM');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0334', 'T033406', 'LAEM SING');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0334', 'T033407', 'SOI DAO');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0334', 'T033408', 'KAENG HANG MAEO');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0334', 'T033409', 'NA YAI AM');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0334', 'T033410', 'KHAO KHITCHAKUT');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0335', 'T033501', 'MUEANG PRACHINBURI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0335', 'T033502', 'KABIN BURI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0335', 'T033503', 'NA DI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0335', 'T033504', 'BAN SANG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0335', 'T033505', 'PRACHANTAKHAM');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0335', 'T033506', 'SI MAHA PHOT');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0335', 'T033507', 'SI MAHOSOT');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0336', 'T033601', 'MUEANG RAYONG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0336', 'T033602', 'BAN CHANG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0336', 'T033603', 'KLAENG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0336', 'T033604', 'WANG CHAN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0336', 'T033605', 'BAN KHAI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0336', 'T033606', 'PLUAK DAENG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0336', 'T033607', 'KHAO CHAMAO');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0336', 'T033608', 'NIKHOM PHATTHANA');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0337', 'T033701', 'MUEANG SA KAEO');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0337', 'T033702', 'KHLONG HAT');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0337', 'T033703', 'TA PHRAYA');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0337', 'T033704', 'WANG NAM YEN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0337', 'T033705', 'WATTHANA NAKHON');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0337', 'T033706', 'ARANYAPRATHET');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0337', 'T033707', 'KHAO CHAKAN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0337', 'T033708', 'KHOK SUNG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0337', 'T033709', 'WANG SOMBUN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0338', 'T033801', 'MUEANG TRAT');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0338', 'T033802', 'KHLONG YAI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0338', 'T033803', 'KHAO SAMING');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0338', 'T033804', 'BO RAI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0338', 'T033805', 'LAEM NGOP');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0338', 'T033806', 'KO KUT');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0338', 'T033807', 'KO CHANG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0339', 'T033901', 'MUEANG KAMPHAENG PHET');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0339', 'T033902', 'SAI NGAM');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0339', 'T033903', 'KHLONG LAN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0339', 'T033904', 'KHANU WORALAKSABURI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0339', 'T033905', 'KHLONG KHLUNG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0339', 'T033906', 'PHRAN KRATAI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0339', 'T033907', 'LAN KRABUE');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0339', 'T033908', 'SAI THONG WATTHANA');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0339', 'T033909', 'PANG SILA THONG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0339', 'T033910', 'BUENG SAMAKKHI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0339', 'T033911', 'KOSAMPHI NAKHON');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0340', 'T034001', 'MUEANG LAMPANG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0340', 'T034002', 'MAE MO');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0340', 'T034003', 'KO KHA');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0340', 'T034004', 'SOEM NGAM');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0340', 'T034005', 'NGAO');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0340', 'T034006', 'CHAE HOM');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0340', 'T034007', 'WANG NUEA');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0340', 'T034008', 'THOEN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0340', 'T034009', 'MAE PHRIK');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0340', 'T034010', 'MAE THA');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0340', 'T034011', 'SOP PRAP');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0340', 'T034012', 'HANG CHAT');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0340', 'T034013', 'MUEANG PAN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0341', 'T034101', 'MUEANG LAMPHUN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0341', 'T034102', 'MAE THA');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0341', 'T034103', 'BAN HONG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0341', 'T034104', 'LI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0341', 'T034105', 'THUNG HUA CHANG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0341', 'T034106', 'PA SANG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0341', 'T034107', 'BAN THI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0341', 'T034108', 'WIANG NONG LONG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0342', 'T034201', 'MAE HONG SON');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0342', 'T034202', 'KHUN YUAM');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0342', 'T034203', 'PAI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0342', 'T034204', 'MAE SARIANG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0342', 'T034205', 'MAE LA NOI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0342', 'T034206', 'SOP MOEI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0342', 'T034207', 'PANGMAPHA');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0343', 'T034301', 'MUEANG NAKHON SAWAN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0343', 'T034302', 'KROK PHRA');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0343', 'T034303', 'CHUM SAENG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0343', 'T034304', 'NONG BUA');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0343', 'T034305', 'BANPHOT PHISAI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0343', 'T034306', 'KAO LIAO');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0343', 'T034307', 'TAKHLI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0343', 'T034308', 'THA TAKO');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0343', 'T034309', 'PHAISALI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0343', 'T034310', 'PHAYUHA KHIRI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0343', 'T034311', 'LAT YAO');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0343', 'T034312', 'TAK FA');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0343', 'T034313', 'MAE WONG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0343', 'T034314', 'MAE POEN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0343', 'T034315', 'CHUM TA BONG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0344', 'T034401', 'MUEANG NAN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0344', 'T034402', 'MAE CHARIM');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0344', 'T034403', 'BAN LUANG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0344', 'T034404', 'NA NOI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0344', 'T034405', 'PUA');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0344', 'T034406', 'THA WANG PHA');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0344', 'T034407', 'WIANG SA');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0344', 'T034408', 'THUNG CHANG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0344', 'T034409', 'CHIANG KLANG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0344', 'T034410', 'NA MUEN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0344', 'T034411', 'SANTI SUK');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0344', 'T034412', 'BO KLUEA');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0344', 'T034413', 'SONG KHWAE');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0344', 'T034414', 'PHU PHIANG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0344', 'T034415', 'CHALOEM PHRA KIAT');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0345', 'T034501', 'MUEANG PHAYAO');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0345', 'T034502', 'CHUN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0345', 'T034503', 'CHIANG KHAM');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0345', 'T034504', 'CHIANG MUAN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0345', 'T034505', 'DOK KHAMTAI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0345', 'T034506', 'PONG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0345', 'T034507', 'MAE CHAI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0345', 'T034508', 'PHU SANG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0345', 'T034509', 'PHU KAMYAO');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0346', 'T034601', 'MUEANG PHETCHABUN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0346', 'T034602', 'CHON DAEN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0346', 'T034603', 'LOM SAK');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0346', 'T034604', 'LOM KAO');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0346', 'T034605', 'WICHIAN BURI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0346', 'T034606', 'SI THEP');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0346', 'T034607', 'NONG PHAI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0346', 'T034608', 'BUENG SAM PHAN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0346', 'T034609', 'NAM NAO');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0346', 'T034610', 'WANG PONG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0346', 'T034611', 'KHAO KHO');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0347', 'T034701', 'MUEANG PHICHIT');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0347', 'T034702', 'WANG SAI PHUN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0347', 'T034703', 'PHO PRATHAP CHANG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0347', 'T034704', 'TAPHAN HIN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0347', 'T034705', 'BANG MUN NAK');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0347', 'T034706', 'PHO THALE');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0347', 'T034707', 'SAM NGAM');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0347', 'T034708', 'TAP KHLO');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0347', 'T034709', 'SAK LEK');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0347', 'T034710', 'BUENG NA RANG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0347', 'T034711', 'DONG CHAROEN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0347', 'T034712', 'WACHIRABARAMI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0348', 'T034801', 'MUEANG PHITSANULOK');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0348', 'T034802', 'NAKHON THAI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0348', 'T034803', 'CHAT TRAKAN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0348', 'T034804', 'BANG RAKAM');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0348', 'T034805', 'BANG KRATHUM');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0348', 'T034806', 'PHROM PHIRAM');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0348', 'T034807', 'WAT BOT');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0348', 'T034808', 'WANG THONG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0348', 'T034809', 'NOEN MAPRANG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0349', 'T034901', 'MUEANG PHRAE');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0349', 'T034902', 'RONG KWANG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0349', 'T034903', 'LONG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0349', 'T034904', 'SUNG MEN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0349', 'T034905', 'DEN CHAI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0349', 'T034906', 'SONG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0349', 'T034907', 'WANG CHIN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0349', 'T034908', 'NONG MUANG KHAI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0350', 'T035001', 'MUEANG SUKHOTHAI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0350', 'T035002', 'BAN DAN LAN HOI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0350', 'T035003', 'KHIRI MAT');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0350', 'T035004', 'KONG KRAILAT');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0350', 'T035005', 'SI SATCHANALAI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0350', 'T035006', 'SI SAMRONG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0350', 'T035007', 'SAWANKHALOK');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0350', 'T035008', 'SI NAKHON');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0350', 'T035009', 'THUNG SALIAM');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0351', 'T035101', 'MUEANG TAK');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0351', 'T035102', 'BAN TAK');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0351', 'T035103', 'SAM NGAO');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0351', 'T035104', 'MAE RAMAT');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0351', 'T035105', 'THA SONG YANG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0351', 'T035106', 'MAE SOT');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0351', 'T035107', 'PHOP PHRA');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0351', 'T035108', 'UMPHANG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0351', 'T035109', 'WANG CHAO');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0352', 'T035201', 'MUEANG UTHAI THANI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0352', 'T035202', 'THAP THAN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0352', 'T035203', 'SAWANG AROM');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0352', 'T035204', 'NONG CHANG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0352', 'T035205', 'NONG KHAYANG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0352', 'T035206', 'BAN RAI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0352', 'T035207', 'LAN SAK');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0352', 'T035208', 'HUAI KHOT');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0353', 'T035301', 'MUEANG UTTARADIT');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0353', 'T035302', 'TRON');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0353', 'T035303', 'THA PLA');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0353', 'T035304', 'NAM PAT');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0353', 'T035305', 'FAK THA');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0353', 'T035306', 'BAN KHOK');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0353', 'T035307', 'PHICHAI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0353', 'T035308', 'LAPLAE');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0353', 'T035309', 'THONG SAEN KHAN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0354', 'T035401', 'MUEANG AMNAT CHAROEN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0354', 'T035402', 'CHANUMAN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0354', 'T035403', 'PATHUM RATCHAWONGSA');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0354', 'T035404', 'PHANA');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0354', 'T035405', 'SENANGKHANIKHOM');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0354', 'T035406', 'HUA TAPHAN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0354', 'T035407', 'LUE AMNAT');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0355', 'T035501', 'MUEANG BURIRAM');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0355', 'T035502', 'KHU MUEANG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0355', 'T035503', 'KRASANG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0355', 'T035504', 'NANG RONG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0355', 'T035505', 'NONG KI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0355', 'T035506', 'LAHAN SAI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0355', 'T035507', 'PRAKHON CHAI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0355', 'T035508', 'BAN KRUAT');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0355', 'T035509', 'PHUTTHAISONG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0355', 'T035510', 'LAM PLAI MAT');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0355', 'T035511', 'SATUEK');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0355', 'T035512', 'PAKHAM');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0355', 'T035513', 'NA PHO');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0355', 'T035514', 'NONG HONG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0355', 'T035515', 'PHLAPPHLA CHAI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0355', 'T035516', 'HUAI RAT');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0355', 'T035517', 'NON SUWAN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0355', 'T035518', 'CHAMNI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0355', 'T035519', 'BAN MAI CHAIYAPHOT');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0355', 'T035520', 'NON DIN DAENG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0355', 'T035521', 'BAN DAN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0355', 'T035522', 'KHAEN DONG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0355', 'T035523', 'CHALOEM PHRA KIAT');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0356', 'T035601', 'MUEANG CHAIYAPHUM');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0356', 'T035602', 'BAN KHWAO');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0356', 'T035603', 'KHON SAWAN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0356', 'T035604', 'KASET SOMBUN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0356', 'T035605', 'NONG BUA DAENG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0356', 'T035606', 'CHATTURAT');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0356', 'T035607', 'BAMNET NARONG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0356', 'T035608', 'NONG BUA RAWE');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0356', 'T035609', 'THEP SATHIT');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0356', 'T035610', 'PHU KHIAO');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0356', 'T035611', 'BAN THAEN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0356', 'T035612', 'KAENG KHRO');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0356', 'T035613', 'KHON SAN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0356', 'T035614', 'PHAKDI CHUMPHON');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0356', 'T035615', 'NOEN SA-NGA');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0356', 'T035616', 'SAP YAI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0357', 'T035701', 'MUEANG KALASIN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0357', 'T035702', 'NA MON');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0357', 'T035703', 'KAMALASAI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0357', 'T035704', 'RONG KHAM');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0357', 'T035705', 'KUCHINARAI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0357', 'T035706', 'KHAO WONG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0357', 'T035707', 'YANG TALAT');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0357', 'T035708', 'HUAI MEK');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0357', 'T035709', 'SAHATSAKHAN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0357', 'T035710', 'KHAM MUANG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0357', 'T035711', 'THA KHANTHO');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0357', 'T035712', 'NONG KUNG SI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0357', 'T035713', 'SOMDET');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0357', 'T035714', 'HUAI PHUENG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0357', 'T035715', 'SAM CHAI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0357', 'T035716', 'NA KHU');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0357', 'T035717', 'DON CHAN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0357', 'T035718', 'KHONG CHAI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0358', 'T035801', 'MUEANG LOEI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0358', 'T035802', 'NA DUANG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0358', 'T035803', 'CHIANG KHAN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0358', 'T035804', 'PAK CHOM');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0358', 'T035805', 'DAN SAI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0358', 'T035806', 'NA HAEO');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0358', 'T035807', 'PHU RUEA');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0358', 'T035808', 'THA LI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0358', 'T035809', 'WANG SAPHUNG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0358', 'T035810', 'PHU KRADUENG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0358', 'T035811', 'PHU LUANG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0358', 'T035812', 'PHA KHAO');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0358', 'T035813', 'ERAWAN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0358', 'T035814', 'NONG HIN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0359', 'T035901', 'MUEANG MAHA SARAKHAM');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0359', 'T035902', 'KAE DAM');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0359', 'T035903', 'KOSUM PHISAI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0359', 'T035904', 'KANTHARAWICHAI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0359', 'T035905', 'CHIANG YUEN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0359', 'T035906', 'BORABUE');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0359', 'T035907', 'NA CHUEAK');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0359', 'T035908', 'PHAYAKKHAPHUM PHISAI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0359', 'T035909', 'WAPI PATHUM');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0359', 'T035910', 'NA DUN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0359', 'T035911', 'YANG SISURAT');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0359', 'T035912', 'KUT RANG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0359', 'T035913', 'CHUEN CHOM');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0360', 'T036001', 'MUEANG MUKDAHAN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0360', 'T036002', 'NIKHOM KHAM SOI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0360', 'T036003', 'DON TAN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0360', 'T036004', 'DONG LUANG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0360', 'T036005', 'KHAMCHA-I');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0360', 'T036006', 'WAN YAI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0360', 'T036007', 'NONG SUNG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0361', 'T036101', 'MUEANG NAKHON PHANOM');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0361', 'T036102', 'PLA PAK');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0361', 'T036103', 'THA UTHEN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0361', 'T036104', 'BAN PHAENG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0361', 'T036105', 'THAT PHANOM');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0361', 'T036106', 'RENU NAKHON');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0361', 'T036107', 'NA KAE');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0361', 'T036108', 'SI SONGKHRAM');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0361', 'T036109', 'NA WA');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0361', 'T036110', 'PHON SAWAN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0361', 'T036111', 'NA THOM');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0361', 'T036112', 'WANG YANG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0362', 'T036201', 'MUEANG NONGBUA LAMPHU');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0362', 'T036202', 'NA KLANG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0362', 'T036203', 'NON SANG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0362', 'T036204', 'SI BUN RUEANG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0362', 'T036205', 'SUWANNAKHUHA');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0362', 'T036206', 'NA WANG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0363', 'T036301', 'MUEANG NONG KHAI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0363', 'T036302', 'THA BO');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0363', 'T036303', 'BUENG KAN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0363', 'T036304', 'PHON CHAROEN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0363', 'T036305', 'PHON PHISAI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0363', 'T036306', 'SO PHISAI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0363', 'T036307', 'SI CHIANG MAI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0363', 'T036308', 'SANGKHOM');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0363', 'T036309', 'SEKA');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0363', 'T036310', 'PAK KHAT');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0363', 'T036311', 'BUENG KHONG LONG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0363', 'T036312', 'SI WILAI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0363', 'T036313', 'BUNG KHLA');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0363', 'T036314', 'SAKHRAI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0363', 'T036315', 'FAO RAI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0363', 'T036316', 'RATTANAWAPI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0363', 'T036317', 'PHO TAK');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0364', 'T036401', 'MUEANG ROI ET');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0364', 'T036402', 'KASET WISAI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0364', 'T036403', 'PATHUM RAT');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0364', 'T036404', 'CHATURAPHAK PHIMAN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0364', 'T036405', 'THAWAT BURI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0364', 'T036406', 'PHANOM PHRAI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0364', 'T036407', 'PHON THONG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0364', 'T036408', 'PHO CHAI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0364', 'T036409', 'NONG PHOK');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0364', 'T036410', 'SELAPHUM');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0364', 'T036411', 'SUWANNAPHUM');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0364', 'T036412', 'MUEANG SUANG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0364', 'T036413', 'PHON SAI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0364', 'T036414', 'AT SAMAT');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0364', 'T036415', 'MOEI WADI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0364', 'T036416', 'SI SOMDET');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0364', 'T036417', 'CHANGHAN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0364', 'T036418', 'CHIANG KHWAN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0364', 'T036419', 'NONG HI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0364', 'T036420', 'THUNG KHAO LUANG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0365', 'T036501', 'MUEANG SAKON NAKHON');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0365', 'T036502', 'KUSUMAN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0365', 'T036503', 'KUT BAK');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0365', 'T036504', 'PHANNA NIKHOM');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0365', 'T036505', 'PHANG KHON');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0365', 'T036506', 'WARITCHAPHUM');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0365', 'T036507', 'NIKHOM NAM UN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0365', 'T036508', 'WANON NIWAT');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0365', 'T036509', 'KHAM TA KLA');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0365', 'T036510', 'BAN MUANG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0365', 'T036511', 'AKAT AMNUAI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0365', 'T036512', 'SAWANG DAEN DIN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0365', 'T036513', 'SONG DAO');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0365', 'T036514', 'TAO NGOI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0365', 'T036515', 'KHOK SI SUPHAN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0365', 'T036516', 'CHAROEN SIN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0365', 'T036517', 'PHON NA KAEO');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0365', 'T036518', 'PHU PHAN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0366', 'T036601', 'MUEANG SISAKET');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0366', 'T036602', 'YANG CHUM NOI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0366', 'T036603', 'KANTHARAROM');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0366', 'T036604', 'KANTHARALAK');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0366', 'T036605', 'KHUKHAN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0366', 'T036606', 'PHRAI BUENG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0366', 'T036607', 'PRANG KU');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0366', 'T036608', 'KHUN HAN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0366', 'T036609', 'RASI SALAI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0366', 'T036610', 'UTHUMPHON PHISAI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0366', 'T036611', 'BUENG BUN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0366', 'T036612', 'HUAI THAP THAN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0366', 'T036613', 'NON KHUN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0366', 'T036614', 'SI RATTANA');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0366', 'T036615', 'NAM KLIANG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0366', 'T036616', 'WANG HIN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0366', 'T036617', 'PHU SING');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0366', 'T036618', 'MUEANG CHAN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0366', 'T036619', 'BENCHALAK');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0366', 'T036620', 'PHAYU');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0366', 'T036621', 'PHO SI SUWAN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0366', 'T036622', 'SILA LAT');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0367', 'T036701', 'MUEANG SURIN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0367', 'T036702', 'CHUMPHON BURI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0367', 'T036703', 'THA TUM');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0367', 'T036704', 'CHOM PHRA');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0367', 'T036705', 'PRASAT');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0367', 'T036706', 'KAP CHOENG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0367', 'T036707', 'RATTANABURI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0367', 'T036708', 'SANOM');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0367', 'T036709', 'SIKHORAPHUM');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0367', 'T036710', 'SANGKHA');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0367', 'T036711', 'LAMDUAN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0367', 'T036712', 'SAMRONG THAP');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0367', 'T036713', 'BUACHET');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0367', 'T036714', 'PHANOM DONG RAK');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0367', 'T036715', 'SI NARONG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0367', 'T036716', 'KHWAO SINARIN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0367', 'T036717', 'NON NARAI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0368', 'T036801', 'MUEANG YASOTHON');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0368', 'T036802', 'SAI MUN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0368', 'T036803', 'KUT CHUM');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0368', 'T036804', 'KHAM KHUEAN KAEO');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0368', 'T036805', 'PA TIO');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0368', 'T036806', 'MAHA CHANA CHAI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0368', 'T036807', 'KHO WANG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0368', 'T036808', 'LOENG NOK THA');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0368', 'T036809', 'THAI CHAROEN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0369', 'T036901', 'MUEANG CHUMPHON');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0369', 'T036902', 'THA SAE');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0369', 'T036903', 'PATHIO');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0369', 'T036904', 'LANG SUAN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0369', 'T036905', 'LAMAE');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0369', 'T036906', 'PHATO');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0369', 'T036907', 'SAWI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0369', 'T036908', 'THUNG TAKO');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0370', 'T037001', 'MUEANG KRABI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0370', 'T037002', 'KHAO PHANOM');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0370', 'T037003', 'KO LANTA');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0370', 'T037004', 'KHLONG THOM');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0370', 'T037005', 'AO LUEK');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0370', 'T037006', 'PLAI PHRAYA');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0370', 'T037007', 'LAM THAP');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0370', 'T037008', 'NUEA KHLONG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0371', 'T037101', 'MUEANG PHANGNGA');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0371', 'T037102', 'KO YAO');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0371', 'T037103', 'KAPONG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0371', 'T037104', 'TAKUA THUNG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0371', 'T037105', 'TAKUA PA');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0371', 'T037106', 'KHURA BURI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0371', 'T037107', 'THAP PUT');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0371', 'T037108', 'THAI MUEANG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0372', 'T037201', 'MUEANG PHATTHALUNG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0372', 'T037202', 'KONG RA');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0372', 'T037203', 'KHAO CHAISON');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0372', 'T037204', 'TAMOT');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0372', 'T037205', 'KHUAN KHANUN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0372', 'T037206', 'PAK PHAYUN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0372', 'T037207', 'SI BANPHOT');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0372', 'T037208', 'PA BON');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0372', 'T037209', 'BANG KAEO');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0372', 'T037210', 'PA PHAYOM');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0372', 'T037211', 'SRINAGARINDRA');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0373', 'T037301', 'MUEANG RANONG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0373', 'T037302', 'LA-UN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0373', 'T037303', 'KAPOE');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0373', 'T037304', 'KRA BURI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0373', 'T037305', 'SUK SAMRAN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0374', 'T037401', 'MUEANG SATUN (MALAY: MAMBANG)');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0374', 'T037402', 'KHUAN DON (MALAY: DUSUN)');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0374', 'T037403', 'KHUAN KALONG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0374', 'T037404', 'THA PHAE');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0374', 'T037405', 'LA-NGU');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0374', 'T037406', 'THUNG WA');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0374', 'T037407', 'MANANG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0375', 'T037501', 'MUEANG SURAT THANI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0375', 'T037502', 'KANCHANADIT');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0375', 'T037503', 'DON SAK');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0375', 'T037504', 'KO SAMUI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0375', 'T037505', 'KO PHA-NGAN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0375', 'T037506', 'CHAIYA');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0375', 'T037507', 'THA CHANA');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0375', 'T037508', 'KHIRI RAT NIKHOM');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0375', 'T037509', 'BAN TA KHUN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0375', 'T037510', 'PHANOM');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0375', 'T037511', 'THA CHANG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0375', 'T037512', 'BAN NA SAN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0375', 'T037513', 'BAN NA DOEM');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0375', 'T037514', 'KHIAN SA');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0375', 'T037515', 'WIANG SA');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0375', 'T037516', 'PHRASAENG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0375', 'T037517', 'PHUNPHIN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0375', 'T037518', 'CHAI BURI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0375', 'T037519', 'VIBHAVADI');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0376', 'T037601', 'MUEANG TRANG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0376', 'T037602', 'KANTANG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0376', 'T037603', 'YAN TA KHAO');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0376', 'T037604', 'PALIAN');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0376', 'T037605', 'SIKAO');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0376', 'T037606', 'HUAI YOT');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0376', 'T037607', 'WANG WISET');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0376', 'T037608', 'NA YONG');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0376', 'T037609', 'RATSADA');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0376', 'T037610', 'HAT SAMRAN');
INSERT INTO `sel_bandar` VALUES ('999', '999', '999', 'OTHERS');
INSERT INTO `sel_bandar` VALUES ('A01', '991', '991', 'OTHERS');
INSERT INTO `sel_bandar` VALUES ('M01', '99', '992', 'OTHERS');
INSERT INTO `sel_bandar` VALUES ('M01', '01', '993', 'OTHERS');
INSERT INTO `sel_bandar` VALUES ('M01', '02', '994', 'OTHERS');
INSERT INTO `sel_bandar` VALUES ('M01', '03', '995', 'OTHERS');
INSERT INTO `sel_bandar` VALUES ('M01', '04', '996', 'OTHERS');
INSERT INTO `sel_bandar` VALUES ('M01', '05', '997', 'OTHERS');
INSERT INTO `sel_bandar` VALUES ('M01', '06', '998', 'OTHERS');
INSERT INTO `sel_bandar` VALUES ('M01', '07', '1000', 'OTHERS');
INSERT INTO `sel_bandar` VALUES ('M01', '08', '1001', 'OTHERS');
INSERT INTO `sel_bandar` VALUES ('M01', '09', '1002', 'OTHERS');
INSERT INTO `sel_bandar` VALUES ('M01', '10', '1003', 'OTHERS');
INSERT INTO `sel_bandar` VALUES ('M01', '11', '1004', 'OTHERS');
INSERT INTO `sel_bandar` VALUES ('M01', '12', '1005', 'OTHERS');
INSERT INTO `sel_bandar` VALUES ('M01', '13', '1006', 'OTHERS');
INSERT INTO `sel_bandar` VALUES ('M01', '14', '1007', 'OTHERS');
INSERT INTO `sel_bandar` VALUES ('MALI', 'MALI0', '1008', 'OTHERS');
INSERT INTO `sel_bandar` VALUES ('S18', 'S1801', '1009', 'OTHERS');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0301', '1010', 'OTHERS');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0302', '1011', 'OTHERS');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0303', '1012', 'OTHERS');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0304', '1013', 'OTHERS');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0305', '1014', 'OTHERS');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0306', '1015', 'OTHERS');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0307', '1016', 'OTHERS');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0308', '1017', 'OTHERS');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0309', '1018', 'OTHERS');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0310', '1019', 'OTHERS');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0311', '1020', 'OTHERS');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0312', '1021', 'OTHERS');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0313', '1022', 'OTHERS');
INSERT INTO `sel_bandar` VALUES ('T03', 'T0314', '1023', 'OTHERS');
INSERT INTO `sel_bandar` VALUES ('TO3', 'TO315', '1024', 'OTHERS');

-- ----------------------------
-- Table structure for `sel_gender`
-- ----------------------------
DROP TABLE IF EXISTS `sel_gender`;
CREATE TABLE `sel_gender` (
  `kodgender` varchar(5) CHARACTER SET utf8 DEFAULT NULL,
  `gender_MY` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `gender_EN` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `gender_AR` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `initial` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of sel_gender
-- ----------------------------
INSERT INTO `sel_gender` VALUES ('1', 'LELAKI', 'MALE', 'الرجال', 'L');
INSERT INTO `sel_gender` VALUES ('2', 'PEREMPUAN', 'FEMALE', 'نساء', 'P');

-- ----------------------------
-- Table structure for `sel_gred`
-- ----------------------------
DROP TABLE IF EXISTS `sel_gred`;
CREATE TABLE `sel_gred` (
  `kodgred` varchar(10) NOT NULL,
  `gred` varchar(20) DEFAULT NULL,
  `nilaigred` decimal(4,2) DEFAULT NULL,
  `aktif` tinyint(1) DEFAULT '1' COMMENT '1=aktif; 0=tidak aktfi',
  `status_lulus` varchar(10) DEFAULT NULL,
  `level` varchar(20) DEFAULT NULL,
  `y_gred` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`kodgred`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sel_gred
-- ----------------------------
INSERT INTO `sel_gred` VALUES ('G1', 'A+', '10.00', '1', 'C', 'SPM', 'S3');
INSERT INTO `sel_gred` VALUES ('G2', 'A', '9.00', '1', 'C', 'SPM', 'S3');
INSERT INTO `sel_gred` VALUES ('G3', '1A', '9.00', '1', 'C', 'SPM', 'S2');
INSERT INTO `sel_gred` VALUES ('G4', 'A-', '8.00', '1', 'C', 'SPM', 'S3');
INSERT INTO `sel_gred` VALUES ('G5', '2A', '8.00', '1', 'C', 'SPM', 'S2');
INSERT INTO `sel_gred` VALUES ('G6', 'B+', '7.00', '1', 'K', 'SPM', 'S3');
INSERT INTO `sel_gred` VALUES ('G7', '3B', '7.00', '1', 'K', 'SPM', 'S2');
INSERT INTO `sel_gred` VALUES ('G8', 'B', '6.00', '1', 'K', 'SPM', 'S3');
INSERT INTO `sel_gred` VALUES ('G9', '4B', '6.00', '1', 'K', 'SPM', 'S2');
INSERT INTO `sel_gred` VALUES ('G10', 'C+', '5.00', '1', 'K', 'SPM', 'S3');
INSERT INTO `sel_gred` VALUES ('G11', '5C', '5.00', '1', 'K', 'SPM', 'S2');
INSERT INTO `sel_gred` VALUES ('G12', 'C', '4.00', '1', 'K', 'SPM', 'S3');
INSERT INTO `sel_gred` VALUES ('G13', '6C', '4.00', '1', 'K', 'SPM', 'S2');
INSERT INTO `sel_gred` VALUES ('G14', 'D', '3.00', '1', 'L', 'SPM', 'S3');
INSERT INTO `sel_gred` VALUES ('G15', '7D', '3.00', '1', 'L', 'SPM', 'S2');
INSERT INTO `sel_gred` VALUES ('G16', 'E', '2.00', '1', 'L', 'SPM', 'S3');
INSERT INTO `sel_gred` VALUES ('G17', '8E', '2.00', '1', 'L', 'SPM', 'S2');
INSERT INTO `sel_gred` VALUES ('G18', 'G', '1.00', '1', 'G', 'SPM', 'S3');
INSERT INTO `sel_gred` VALUES ('G19', '9G', '1.00', '1', 'G', 'SPM', 'S2');
INSERT INTO `sel_gred` VALUES ('G20', 'MUMTAZ', '8.00', '1', 'L', 'STAM', null);
INSERT INTO `sel_gred` VALUES ('G21', 'JAYYID JIDDAN', '7.00', '1', 'L', 'STAM', null);
INSERT INTO `sel_gred` VALUES ('G22', 'JAYYID', '6.00', '1', 'L', 'STAM', null);
INSERT INTO `sel_gred` VALUES ('G23', 'MAQBUL', '5.00', '1', 'G', 'STAM', null);
INSERT INTO `sel_gred` VALUES ('G24', 'RASIB 1', '4.00', '1', 'G', 'STAM', null);
INSERT INTO `sel_gred` VALUES ('G25', 'RASIB 2', '3.00', '1', 'G', 'STAM', null);
INSERT INTO `sel_gred` VALUES ('G26', 'RASIB 3 DAN KE ATAS', '2.00', '1', 'G', 'STAM', null);
INSERT INTO `sel_gred` VALUES ('G27', 'DHAIF', '1.00', '1', 'G', 'STAM', null);
INSERT INTO `sel_gred` VALUES ('G28', 'A', '4.00', '1', 'LP', 'STPM', null);
INSERT INTO `sel_gred` VALUES ('G29', 'A-', '3.67', '1', 'LP', 'STPM', null);
INSERT INTO `sel_gred` VALUES ('G30', 'B+', '3.33', '1', 'LP', 'STPM', null);
INSERT INTO `sel_gred` VALUES ('G31', 'B', '3.00', '1', 'LP', 'STPM', null);
INSERT INTO `sel_gred` VALUES ('G32', 'B-', '2.67', '1', 'LP', 'STPM', null);
INSERT INTO `sel_gred` VALUES ('G33', 'C+', '2.33', '1', 'LP', 'STPM', null);
INSERT INTO `sel_gred` VALUES ('G34', 'C', '2.00', '1', 'LP', 'STPM', null);
INSERT INTO `sel_gred` VALUES ('G35', 'C-', '1.67', '1', 'LS', 'STPM', null);
INSERT INTO `sel_gred` VALUES ('G36', 'D+', '1.33', '1', 'LS', 'STPM', null);
INSERT INTO `sel_gred` VALUES ('G37', 'D', '1.00', '1', 'LS', 'STPM', null);
INSERT INTO `sel_gred` VALUES ('G38', 'F', '0.00', '1', 'G', 'STPM', null);
INSERT INTO `sel_gred` VALUES ('G39', 'A', '4.00', '1', 'L', 'MATRIK', null);
INSERT INTO `sel_gred` VALUES ('G40', 'A-', '3.67', '1', 'L', 'MATRIK', null);
INSERT INTO `sel_gred` VALUES ('G41', 'B+', '3.33', '1', 'L', 'MATRIK', null);
INSERT INTO `sel_gred` VALUES ('G42', 'B', '3.00', '1', 'L', 'MATRIK', null);
INSERT INTO `sel_gred` VALUES ('G43', 'B-', '2.67', '1', 'L', 'MATRIK', null);
INSERT INTO `sel_gred` VALUES ('G44', 'C+', '2.33', '1', 'L', 'MATRIK', null);
INSERT INTO `sel_gred` VALUES ('G45', 'C', '2.00', '1', 'L', 'MATRIK', null);
INSERT INTO `sel_gred` VALUES ('G46', 'C-', '1.67', '1', 'LB', 'MATRIK', null);
INSERT INTO `sel_gred` VALUES ('G47', 'D+', '1.33', '1', 'G', 'MATRIK', null);
INSERT INTO `sel_gred` VALUES ('G48', 'D', '1.00', '1', 'G', 'MATRIK', null);
INSERT INTO `sel_gred` VALUES ('G49', 'F', '0.00', '1', 'G', 'MATRIK', null);
INSERT INTO `sel_gred` VALUES ('G50', 'A', '4.00', '1', 'L', 'AP', null);
INSERT INTO `sel_gred` VALUES ('G51', 'A-', '3.67', '1', 'L', 'AP', null);
INSERT INTO `sel_gred` VALUES ('G52', 'B+', '3.33', '1', 'L', 'AP', null);
INSERT INTO `sel_gred` VALUES ('G53', 'B', '3.00', '1', 'L', 'AP', null);
INSERT INTO `sel_gred` VALUES ('G54', 'B-', '2.67', '1', 'L', 'AP', null);
INSERT INTO `sel_gred` VALUES ('G55', 'C+', '2.33', '1', 'L', 'AP', null);
INSERT INTO `sel_gred` VALUES ('G56', 'C', '2.00', '1', 'L', 'AP', null);
INSERT INTO `sel_gred` VALUES ('G57', 'C-', '1.67', '1', 'LB', 'AP', null);
INSERT INTO `sel_gred` VALUES ('G58', 'D+', '1.33', '1', 'G', 'AP', null);
INSERT INTO `sel_gred` VALUES ('G59', 'D', '1.00', '1', 'G', 'AP', null);
INSERT INTO `sel_gred` VALUES ('G60', 'F', '0.00', '1', 'G', 'AP', null);
INSERT INTO `sel_gred` VALUES ('G61', 'A', '4.00', '1', 'L', 'ALEVEL', null);
INSERT INTO `sel_gred` VALUES ('G62', 'A-', '3.67', '1', 'L', 'ALEVEL', null);
INSERT INTO `sel_gred` VALUES ('G63', 'B+', '3.33', '1', 'L', 'ALEVEL', null);
INSERT INTO `sel_gred` VALUES ('G64', 'B', '3.00', '1', 'L', 'ALEVEL', null);
INSERT INTO `sel_gred` VALUES ('G65', 'B-', '2.67', '1', 'L', 'ALEVEL', null);
INSERT INTO `sel_gred` VALUES ('G66', 'C+', '2.33', '1', 'L', 'ALEVEL', null);
INSERT INTO `sel_gred` VALUES ('G67', 'C', '2.00', '1', 'L', 'ALEVEL', null);
INSERT INTO `sel_gred` VALUES ('G68', 'C-', '1.67', '1', 'LB', 'ALEVEL', null);
INSERT INTO `sel_gred` VALUES ('G69', 'D+', '1.33', '1', 'G', 'ALEVEL', null);
INSERT INTO `sel_gred` VALUES ('G70', 'D', '1.00', '1', 'G', 'ALEVEL', null);
INSERT INTO `sel_gred` VALUES ('G71', 'F', '0.00', '1', 'G', 'ALEVEL', null);
INSERT INTO `sel_gred` VALUES ('G72', 'A', '4.00', '1', 'L', 'OLEVEL', null);
INSERT INTO `sel_gred` VALUES ('G73', 'A-', '3.67', '1', 'L', 'OLEVEL', null);
INSERT INTO `sel_gred` VALUES ('G74', 'B+', '3.33', '1', 'L', 'OLEVEL', null);
INSERT INTO `sel_gred` VALUES ('G75', 'B', '3.00', '1', 'L', 'OLEVEL', null);
INSERT INTO `sel_gred` VALUES ('G76', 'B-', '2.67', '1', 'L', 'OLEVEL', null);
INSERT INTO `sel_gred` VALUES ('G77', 'C+', '2.33', '1', 'L', 'OLEVEL', null);
INSERT INTO `sel_gred` VALUES ('G78', 'C', '2.00', '1', 'L', 'OLEVEL', null);
INSERT INTO `sel_gred` VALUES ('G79', 'C-', '1.67', '1', 'LB', 'OLEVEL', null);
INSERT INTO `sel_gred` VALUES ('G80', 'D+', '1.33', '1', 'G', 'OLEVEL', null);
INSERT INTO `sel_gred` VALUES ('G81', 'D', '1.00', '1', 'G', 'OLEVEL', null);
INSERT INTO `sel_gred` VALUES ('G82', 'F', '0.00', '1', 'G', 'OLEVEL', null);
INSERT INTO `sel_gred` VALUES ('G83', 'A', '4.00', '1', 'L', 'UEC', null);
INSERT INTO `sel_gred` VALUES ('G84', 'A-', '3.67', '1', 'L', 'UEC', null);
INSERT INTO `sel_gred` VALUES ('G85', 'B+', '3.33', '1', 'L', 'UEC', null);
INSERT INTO `sel_gred` VALUES ('G86', 'B', '3.00', '1', 'L', 'UEC', null);
INSERT INTO `sel_gred` VALUES ('G87', 'B-', '2.67', '1', 'L', 'UEC', null);
INSERT INTO `sel_gred` VALUES ('G88', 'C+', '2.33', '1', 'L', 'UEC', null);
INSERT INTO `sel_gred` VALUES ('G89', 'C', '2.00', '1', 'L', 'UEC', null);
INSERT INTO `sel_gred` VALUES ('G90', 'C-', '1.67', '1', 'LB', 'UEC', null);
INSERT INTO `sel_gred` VALUES ('G91', 'D+', '1.33', '1', 'G', 'UEC', null);
INSERT INTO `sel_gred` VALUES ('G92', 'D', '1.00', '1', 'G', 'UEC', null);
INSERT INTO `sel_gred` VALUES ('G93', 'F', '0.00', '1', 'G', 'UEC', null);
INSERT INTO `sel_gred` VALUES ('G94', 'A', '4.00', '1', 'L', 'UECHIGH', null);
INSERT INTO `sel_gred` VALUES ('G95', 'A-', '3.67', '1', 'L', 'UECHIGH', null);
INSERT INTO `sel_gred` VALUES ('G96', 'B+', '3.33', '1', 'L', 'UECHIGH', null);
INSERT INTO `sel_gred` VALUES ('G97', 'B', '3.00', '1', 'L', 'UECHIGH', null);
INSERT INTO `sel_gred` VALUES ('G98', 'B-', '2.67', '1', 'L', 'UECHIGH', null);
INSERT INTO `sel_gred` VALUES ('G99', 'C+', '2.33', '1', 'L', 'UECHIGH', null);
INSERT INTO `sel_gred` VALUES ('G100', 'C', '2.00', '1', 'L', 'UECHIGH', null);
INSERT INTO `sel_gred` VALUES ('G101', 'C-', '1.67', '1', 'LB', 'UECHIGH', null);
INSERT INTO `sel_gred` VALUES ('G102', 'D+', '1.33', '1', 'G', 'UECHIGH', null);
INSERT INTO `sel_gred` VALUES ('G103', 'D', '1.00', '1', 'G', 'UECHIGH', null);
INSERT INTO `sel_gred` VALUES ('G104', 'F', '0.00', '1', 'G', 'UECHIGH', null);
INSERT INTO `sel_gred` VALUES ('G105', 'A1', '9.00', '1', 'K', 'SPM', 'S1');
INSERT INTO `sel_gred` VALUES ('G106', 'A2', '8.00', '1', 'K', 'SPM', 'S1');
INSERT INTO `sel_gred` VALUES ('G107', 'C3', '7.00', '1', 'C', 'SPM', 'S1');
INSERT INTO `sel_gred` VALUES ('G108', 'C4', '6.00', '1', 'C', 'SPM', 'S1');
INSERT INTO `sel_gred` VALUES ('G109', 'C5', '5.00', '1', 'C', 'SPM', 'S1');
INSERT INTO `sel_gred` VALUES ('G110', 'C6', '4.00', '1', 'C', 'SPM', 'S1');
INSERT INTO `sel_gred` VALUES ('G111', 'P7', '3.00', '1', 'L', 'SPM', 'S1');
INSERT INTO `sel_gred` VALUES ('G112', 'P8', '2.00', '1', 'L', 'SPM', 'S1');
INSERT INTO `sel_gred` VALUES ('G113', 'F9', '1.00', '1', 'G', 'SPM', 'S1');

-- ----------------------------
-- Table structure for `sel_hubungan`
-- ----------------------------
DROP TABLE IF EXISTS `sel_hubungan`;
CREATE TABLE `sel_hubungan` (
  `kodhubungan` varchar(5) NOT NULL DEFAULT '',
  `hubungan_MY` varchar(50) DEFAULT NULL,
  `hubungan_EN` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kodhubungan`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sel_hubungan
-- ----------------------------
INSERT INTO `sel_hubungan` VALUES ('H01', 'SUAMI', 'HUSBAND');
INSERT INTO `sel_hubungan` VALUES ('H02', 'ISTERI', 'WIFE');
INSERT INTO `sel_hubungan` VALUES ('H03', 'ANAK', 'SON / DAUGHTER');
INSERT INTO `sel_hubungan` VALUES ('H04', 'BAPA', 'FATHER');
INSERT INTO `sel_hubungan` VALUES ('H05', 'IBU', 'MOTHER');
INSERT INTO `sel_hubungan` VALUES ('H06', 'DATUK', 'GRANDFATHER');
INSERT INTO `sel_hubungan` VALUES ('H07', 'NENEK', 'FRANDMOTHER');
INSERT INTO `sel_hubungan` VALUES ('H08', 'ABANG', 'OLDER BROTHER');
INSERT INTO `sel_hubungan` VALUES ('H09', 'KAKAK', 'OLDER SISTER');
INSERT INTO `sel_hubungan` VALUES ('H10', 'ADIK', 'YOUNGER SIBLING');
INSERT INTO `sel_hubungan` VALUES ('H11', 'BAPA SAUDARA', 'UNCLE');
INSERT INTO `sel_hubungan` VALUES ('H12', 'IBU SAUDARA', 'AUNT');
INSERT INTO `sel_hubungan` VALUES ('H13', 'DATUK SAUDARA', 'GRAND UNCLE');
INSERT INTO `sel_hubungan` VALUES ('H14', 'NENEK SAUDARA', 'GRAND AUNT');
INSERT INTO `sel_hubungan` VALUES ('H15', 'ANAK SAUDARA', 'NEPHEW / NIECE');
INSERT INTO `sel_hubungan` VALUES ('H16', 'ANAK TIRI', 'SON / DAUGHTER');

-- ----------------------------
-- Table structure for `sel_level`
-- ----------------------------
DROP TABLE IF EXISTS `sel_level`;
CREATE TABLE `sel_level` (
  `kodtahap` varchar(10) NOT NULL,
  `tahap_MY` varchar(100) DEFAULT NULL,
  `tahap_EN` varchar(100) DEFAULT NULL,
  `aktif` tinyint(1) DEFAULT '1' COMMENT '1=aktif;0=tak aktif === kegunaan di paparan iform'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sel_level
-- ----------------------------
INSERT INTO `sel_level` VALUES ('CERT', 'SIJIL', 'CERTIFICATE', '0');
INSERT INTO `sel_level` VALUES ('PMR', 'PMR / SRP', 'PMR / SRP', '0');
INSERT INTO `sel_level` VALUES ('SPM', 'SPM / SPMV', 'SPM / SPMV', '1');
INSERT INTO `sel_level` VALUES ('STPM', 'STPM', 'STPM', '1');
INSERT INTO `sel_level` VALUES ('STAM', 'STAM', 'STAM', '1');
INSERT INTO `sel_level` VALUES ('MATRIK', 'MATRIKULASI', 'MATRICULATION', '1');
INSERT INTO `sel_level` VALUES ('DIP', 'DIPLOMA', 'DIPLOMA', '1');
INSERT INTO `sel_level` VALUES ('PDIP', 'PRA- DIPLOMA', 'PRE- DIPLOMA', '0');
INSERT INTO `sel_level` VALUES ('DIPL', 'DIPLOMA LANJUTAN', 'ADVANCE DIPLOMA', '0');
INSERT INTO `sel_level` VALUES ('BACH', 'IJAZAH PERTAMA / SARJANA MUDA', 'BACHELOR DEGREE', '1');
INSERT INTO `sel_level` VALUES ('MASTER', 'SARJANA', 'MASTER', '0');
INSERT INTO `sel_level` VALUES ('ALVL', 'A LEVEL', 'A LEVEL', '1');
INSERT INTO `sel_level` VALUES ('OLVL', 'O LEVEL', 'O LEVEL', '1');
INSERT INTO `sel_level` VALUES ('PHD', 'PHD', 'PHD', '0');

-- ----------------------------
-- Table structure for `sel_marital`
-- ----------------------------
DROP TABLE IF EXISTS `sel_marital`;
CREATE TABLE `sel_marital` (
  `kod` varchar(5) CHARACTER SET utf8 DEFAULT NULL,
  `marital_MY` varchar(15) CHARACTER SET utf8 DEFAULT NULL,
  `marital_EN` varchar(15) CHARACTER SET utf8 DEFAULT NULL,
  `marital_AR` varchar(15) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of sel_marital
-- ----------------------------
INSERT INTO `sel_marital` VALUES ('1', 'BUJANG', 'SINGLE', null);
INSERT INTO `sel_marital` VALUES ('2', 'BERKAHWIN', 'MARRIED', null);
INSERT INTO `sel_marital` VALUES ('3', 'JANDA/DUDA', 'DIVORCED', null);

-- ----------------------------
-- Table structure for `sel_negara`
-- ----------------------------
DROP TABLE IF EXISTS `sel_negara`;
CREATE TABLE `sel_negara` (
  `kodnegara` varchar(255) DEFAULT NULL,
  `namanegara` varchar(255) DEFAULT NULL,
  `prefix` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sel_negara
-- ----------------------------
INSERT INTO `sel_negara` VALUES ('A01', 'AFGHANISTAN ', '+93');
INSERT INTO `sel_negara` VALUES ('A02', 'ALBANIA', '+355');
INSERT INTO `sel_negara` VALUES ('A03', 'ALGERIA', '+213');
INSERT INTO `sel_negara` VALUES ('A04', 'ANDORRA', '+376');
INSERT INTO `sel_negara` VALUES ('A05', 'ANGOLA,ANTIGUA, AND BARBUDA', '+244');
INSERT INTO `sel_negara` VALUES ('A06', 'ARGENTINA', '+54');
INSERT INTO `sel_negara` VALUES ('A07', 'ARMENIA', '+374');
INSERT INTO `sel_negara` VALUES ('A08', 'AUSTRALIA', '+61');
INSERT INTO `sel_negara` VALUES ('A09', 'AUSTRIA', '+43');
INSERT INTO `sel_negara` VALUES ('A11', 'AZERBAIJAN', '+994');
INSERT INTO `sel_negara` VALUES ('A12', 'AALAND ISLANDS', '+358');
INSERT INTO `sel_negara` VALUES ('A13', 'ANGUILLA', '+1 264');
INSERT INTO `sel_negara` VALUES ('A14', 'ANTARTICA', '+672');
INSERT INTO `sel_negara` VALUES ('A15', 'ARUBA', '+297');
INSERT INTO `sel_negara` VALUES ('B01', 'BAHAMAS', '+1 242  ');
INSERT INTO `sel_negara` VALUES ('B02', 'BAHRAIN', '+973');
INSERT INTO `sel_negara` VALUES ('B03', 'BANGLADESH', '+880');
INSERT INTO `sel_negara` VALUES ('B04', 'BARBADOS', '+1 246  ');
INSERT INTO `sel_negara` VALUES ('B05', 'BELARUS', '+375');
INSERT INTO `sel_negara` VALUES ('B06', 'BELGIUM', '+32');
INSERT INTO `sel_negara` VALUES ('B07', 'BELIZE', '+501');
INSERT INTO `sel_negara` VALUES ('B08', 'BENIN', '+229');
INSERT INTO `sel_negara` VALUES ('B09', 'BERMUDA', '+1 441  ');
INSERT INTO `sel_negara` VALUES ('B10', 'BHUTAN', '+975');
INSERT INTO `sel_negara` VALUES ('B11', 'BOLIVIA', '+591');
INSERT INTO `sel_negara` VALUES ('B12', 'BOSNIA AND HERZEGOVINA', '+387');
INSERT INTO `sel_negara` VALUES ('B13', 'BOTSWANA', '+267');
INSERT INTO `sel_negara` VALUES ('B14', 'BRAZIL', '+55');
INSERT INTO `sel_negara` VALUES ('B15', 'BRUNEI DARUSSALAM', '+673');
INSERT INTO `sel_negara` VALUES ('B16', 'BULGARAI', '+359');
INSERT INTO `sel_negara` VALUES ('B17', 'BURKINA FASO', '+226');
INSERT INTO `sel_negara` VALUES ('B18', 'BURUNDI', '+257');
INSERT INTO `sel_negara` VALUES ('B19', 'BOUVET ISLAND ', null);
INSERT INTO `sel_negara` VALUES ('B20', 'BRITISH INDIAN OCEAN TERRITORY', null);
INSERT INTO `sel_negara` VALUES ('C01', 'CAMBODIA', '+855');
INSERT INTO `sel_negara` VALUES ('C02', 'CANADA', '+1');
INSERT INTO `sel_negara` VALUES ('C03', 'CAMEROON', '+237');
INSERT INTO `sel_negara` VALUES ('C04', 'CAPE VERDE', '+238');
INSERT INTO `sel_negara` VALUES ('C05', 'CENTRAL AFRICAN REPUBLIC', '+236');
INSERT INTO `sel_negara` VALUES ('C06', 'CHAD', '+235');
INSERT INTO `sel_negara` VALUES ('C07', 'CHILE', '+56');
INSERT INTO `sel_negara` VALUES ('C08', 'CHINA', '+86');
INSERT INTO `sel_negara` VALUES ('C09', 'COLOMBIA', '+57');
INSERT INTO `sel_negara` VALUES ('C10', 'COMOROS', '+269');
INSERT INTO `sel_negara` VALUES ('C11', 'CONGO', '+243');
INSERT INTO `sel_negara` VALUES ('C12', 'COSTARICA', '+506');
INSERT INTO `sel_negara` VALUES ('C13', 'CROATIA', '+385');
INSERT INTO `sel_negara` VALUES ('C14', 'CUBA', '+53');
INSERT INTO `sel_negara` VALUES ('C15', 'CYPRUS', '+357');
INSERT INTO `sel_negara` VALUES ('C16', 'CZECH REPULIC', '+420');
INSERT INTO `sel_negara` VALUES ('C18', 'CHECHNYA', null);
INSERT INTO `sel_negara` VALUES ('C19', 'CAYMAN ISLANDS', '+1345');
INSERT INTO `sel_negara` VALUES ('C20', 'CHRISTMAS ISLAND ', '+61891006');
INSERT INTO `sel_negara` VALUES ('C21', 'COCOS (KEELING) ISLAND ', '+61');
INSERT INTO `sel_negara` VALUES ('C22', 'COOK ISLAND ', '+682');
INSERT INTO `sel_negara` VALUES ('C23', 'COTE D\'IVOIRE ', '+225');
INSERT INTO `sel_negara` VALUES ('D01', 'DENMARK ', '+45');
INSERT INTO `sel_negara` VALUES ('D02', 'DJIBOUTI ', '+253');
INSERT INTO `sel_negara` VALUES ('D03', 'DIGHESTAN ', null);
INSERT INTO `sel_negara` VALUES ('D04', 'DOMINICAN REPUBLIC ', '+1 809  ');
INSERT INTO `sel_negara` VALUES ('D05', 'DOMINICA', '+1 767  ');
INSERT INTO `sel_negara` VALUES ('E01', 'ECUADOR', '+593');
INSERT INTO `sel_negara` VALUES ('E02', 'EGYPT', '+20');
INSERT INTO `sel_negara` VALUES ('E03', 'EL SALVADOR ', '+503');
INSERT INTO `sel_negara` VALUES ('E04', 'ENGLAND ', '+44');
INSERT INTO `sel_negara` VALUES ('E05', 'EQUATIRIAL GUINEA', '+240');
INSERT INTO `sel_negara` VALUES ('E06', 'ESTONIA', '+372');
INSERT INTO `sel_negara` VALUES ('E07', 'ETHIOPIA ', '+251');
INSERT INTO `sel_negara` VALUES ('E08', 'ERITREA', '+291');
INSERT INTO `sel_negara` VALUES ('F01', 'FIJI', '+679');
INSERT INTO `sel_negara` VALUES ('F02', 'FINLAND ', '+358');
INSERT INTO `sel_negara` VALUES ('F04', 'FRANCE', '+33');
INSERT INTO `sel_negara` VALUES ('F05', 'FALKLAND ISLANDS (MALVINAS)', '+500');
INSERT INTO `sel_negara` VALUES ('F06', 'FAROE ISLAND ', '+298');
INSERT INTO `sel_negara` VALUES ('F07', 'FRENCH GUIANA ', '+594');
INSERT INTO `sel_negara` VALUES ('F08', 'FRENCH POLYNESIA ', '+689');
INSERT INTO `sel_negara` VALUES ('F09', 'FRENCH SOUTHERN TERRITORIES', null);
INSERT INTO `sel_negara` VALUES ('G01', 'GABON ', '+241');
INSERT INTO `sel_negara` VALUES ('G02', 'GAMBIA', '+220');
INSERT INTO `sel_negara` VALUES ('G03', 'GERMANY', '+49');
INSERT INTO `sel_negara` VALUES ('G04', 'GHANA', '+233');
INSERT INTO `sel_negara` VALUES ('G05', 'GREECE', '+30');
INSERT INTO `sel_negara` VALUES ('G06', 'GRENADA', '+1 473  ');
INSERT INTO `sel_negara` VALUES ('G07', 'GUATEMALA ', '+502');
INSERT INTO `sel_negara` VALUES ('G08', 'GUINEA', '+224');
INSERT INTO `sel_negara` VALUES ('G09', 'GUINEA-BISSAU', '+245');
INSERT INTO `sel_negara` VALUES ('G10', 'GUYANA', '+592');
INSERT INTO `sel_negara` VALUES ('G11', 'GREENLAND ', '+299');
INSERT INTO `sel_negara` VALUES ('G12', 'GUADELOUPE', '+590');
INSERT INTO `sel_negara` VALUES ('G13', 'GUAM ', '+1 671  ');
INSERT INTO `sel_negara` VALUES ('H01', 'HAITI ', '+509');
INSERT INTO `sel_negara` VALUES ('H02', 'HONDURAS ', '+504');
INSERT INTO `sel_negara` VALUES ('H03', 'HONG KONG', '+852');
INSERT INTO `sel_negara` VALUES ('H04', 'HUNGARY', '+36');
INSERT INTO `sel_negara` VALUES ('I01', 'INDIA ', '+91');
INSERT INTO `sel_negara` VALUES ('I02', 'INDONESIA ', '+62');
INSERT INTO `sel_negara` VALUES ('I03', 'IRAN (ISLAMIC REPUBLIC OF)', '+98');
INSERT INTO `sel_negara` VALUES ('I04', 'IRAQ', '+964');
INSERT INTO `sel_negara` VALUES ('I05', 'ISRAEL ', '+972');
INSERT INTO `sel_negara` VALUES ('I06', 'ITALY ', '+39');
INSERT INTO `sel_negara` VALUES ('I07', 'IVORY COAST ', '+225');
INSERT INTO `sel_negara` VALUES ('I08', 'ICELAND ', '+354');
INSERT INTO `sel_negara` VALUES ('I09', 'REPUBLIC OF IRELAND ', '+353');
INSERT INTO `sel_negara` VALUES ('J01', 'JAMAICA ', '+1 876  ');
INSERT INTO `sel_negara` VALUES ('J02', 'JAPAN ', '+81');
INSERT INTO `sel_negara` VALUES ('J03', 'JORDAN ', '+962');
INSERT INTO `sel_negara` VALUES ('K01', 'KAZAKSTAN ', '+7');
INSERT INTO `sel_negara` VALUES ('K02', 'KENYA ', '+254');
INSERT INTO `sel_negara` VALUES ('K03', 'KIRIBATI ', '+686');
INSERT INTO `sel_negara` VALUES ('K04', 'KUWIT ', '+965');
INSERT INTO `sel_negara` VALUES ('K05', 'KOSOVO ', '+381');
INSERT INTO `sel_negara` VALUES ('K06', 'KYRGHYZSTAN ', '+996');
INSERT INTO `sel_negara` VALUES ('K07', 'KOREA, DEMOCRATIC PEOPLE\'S REPULIC OF ', '+82');
INSERT INTO `sel_negara` VALUES ('K08', 'KOREA,REPUBLIC OF ', '+850');
INSERT INTO `sel_negara` VALUES ('L01', 'LAOS ', '+856');
INSERT INTO `sel_negara` VALUES ('L02', 'LEBANON ', '+961');
INSERT INTO `sel_negara` VALUES ('L03', 'LESOTHO', '+266');
INSERT INTO `sel_negara` VALUES ('L04', 'LIBERIA', '+231');
INSERT INTO `sel_negara` VALUES ('L05', 'LIBYAN ARAB JAMAHIRIYA ', '+218');
INSERT INTO `sel_negara` VALUES ('L06', 'LIECHTENSTEIN ', '+423');
INSERT INTO `sel_negara` VALUES ('L07', 'LUXEMBOURG ', '+352');
INSERT INTO `sel_negara` VALUES ('L08', 'LATVIA', '+371');
INSERT INTO `sel_negara` VALUES ('L09', 'LITHUANIA ', '+370');
INSERT INTO `sel_negara` VALUES ('L10', 'LATVIA', '+371');
INSERT INTO `sel_negara` VALUES ('M01', 'MALAYSIA', '+60');
INSERT INTO `sel_negara` VALUES ('M06', 'MALTA', '+356');
INSERT INTO `sel_negara` VALUES ('M07', 'MAURITIUS ', '+230');
INSERT INTO `sel_negara` VALUES ('M08', 'MEXICO', '+52');
INSERT INTO `sel_negara` VALUES ('M09', 'MONACO ', '+377');
INSERT INTO `sel_negara` VALUES ('M10', 'MONGOLIA ', '+976');
INSERT INTO `sel_negara` VALUES ('M11', 'MOROCCO ', '+212');
INSERT INTO `sel_negara` VALUES ('M12', 'MOZAMBIQUE', '+258');
INSERT INTO `sel_negara` VALUES ('M13', 'MYANMAR ', '+95');
INSERT INTO `sel_negara` VALUES ('M14', 'MACEDONIA,THE FORMER YUGOSLAV REPUBLIC OF', '+389');
INSERT INTO `sel_negara` VALUES ('M15', 'MOLDOVA,REPUBLIC OF ', '+373');
INSERT INTO `sel_negara` VALUES ('M16', 'MAURITANIA ', '+222');
INSERT INTO `sel_negara` VALUES ('M17', 'MACAU ', '+853');
INSERT INTO `sel_negara` VALUES ('M18', 'MARSHALL ISLANDS', '+692');
INSERT INTO `sel_negara` VALUES ('M19', 'MARTINIQUE ', '+596');
INSERT INTO `sel_negara` VALUES ('M20', 'MAYOTTE', '+262');
INSERT INTO `sel_negara` VALUES ('M22', 'MICRONESIA,FEDERATED STATES OF ', '+691');
INSERT INTO `sel_negara` VALUES ('N01', 'NAURU', '+674');
INSERT INTO `sel_negara` VALUES ('N02', 'NEPAL', '+977');
INSERT INTO `sel_negara` VALUES ('N03', 'NETHERLANDS ', '+31');
INSERT INTO `sel_negara` VALUES ('N04', 'NEW ZEALAND ', '+64');
INSERT INTO `sel_negara` VALUES ('N05', 'NICARAGUA ', '+505');
INSERT INTO `sel_negara` VALUES ('N07', 'NIGERIA ', '+234');
INSERT INTO `sel_negara` VALUES ('N09', 'NORTHERN YEMEN ', '+967');
INSERT INTO `sel_negara` VALUES ('N10', 'NORWAY ', '+47');
INSERT INTO `sel_negara` VALUES ('N11', 'NAMIBIA ', '+264');
INSERT INTO `sel_negara` VALUES ('N12', 'NIGER ', '+683');
INSERT INTO `sel_negara` VALUES ('N13', 'NETHRLANDS ANTILLES ', '+672');
INSERT INTO `sel_negara` VALUES ('N14', 'NEW CALEDONIA ', '+850');
INSERT INTO `sel_negara` VALUES ('N15', 'NIUE', '+1 670  ');
INSERT INTO `sel_negara` VALUES ('N16', 'NORFOLK ISLAND ', '+672');
INSERT INTO `sel_negara` VALUES ('N17', 'NORTHERN MARIANA ISLAND ', '+1670');
INSERT INTO `sel_negara` VALUES ('O01', 'OMAN ', '+968');
INSERT INTO `sel_negara` VALUES ('P01', 'PAKISTAN ', '+92');
INSERT INTO `sel_negara` VALUES ('P02', 'PANAMA ', '+507');
INSERT INTO `sel_negara` VALUES ('P03', 'PAPUA NEW GUINEA ', '+675');
INSERT INTO `sel_negara` VALUES ('P04', 'PARAGUAY ', '+595');
INSERT INTO `sel_negara` VALUES ('P05', 'PERU ', '+51');
INSERT INTO `sel_negara` VALUES ('P06', 'PHILIPPINES ', '+63');
INSERT INTO `sel_negara` VALUES ('P07', 'POLAND ', '+48');
INSERT INTO `sel_negara` VALUES ('P08', 'PORTUAL ', '+351');
INSERT INTO `sel_negara` VALUES ('P09', 'PALESTINIAN TERRITORY, Occupied ', '+970');
INSERT INTO `sel_negara` VALUES ('P10', 'PALAU ', '+680');
INSERT INTO `sel_negara` VALUES ('P11', 'PITCAIRN ', '+870');
INSERT INTO `sel_negara` VALUES ('P12', 'PUERTO RICO ', '+1');
INSERT INTO `sel_negara` VALUES ('Q01', 'QATAR ', '+974');
INSERT INTO `sel_negara` VALUES ('R01', 'ROMANIA ', '+40');
INSERT INTO `sel_negara` VALUES ('R02', 'RWANDA ', '+250');
INSERT INTO `sel_negara` VALUES ('R03', 'RUSSIAN FEDERATION ', '+7');
INSERT INTO `sel_negara` VALUES ('R04', 'REUNION ', null);
INSERT INTO `sel_negara` VALUES ('S01', 'SAUDI ARABIA ', '+966');
INSERT INTO `sel_negara` VALUES ('S02', 'SINGAPORE ', '+65');
INSERT INTO `sel_negara` VALUES ('S03', 'SALVADOR ', '+503');
INSERT INTO `sel_negara` VALUES ('S04', 'SAINT KITTS-NEVIS ', '+386');
INSERT INTO `sel_negara` VALUES ('S05', 'SAINT LUCIA ', '+1758');
INSERT INTO `sel_negara` VALUES ('S06', 'SAINT VINCENT AND THE GRENADINES ', '+1784');
INSERT INTO `sel_negara` VALUES ('S07', 'SAN MARINO ', '+378');
INSERT INTO `sel_negara` VALUES ('S08', 'SAO TOME AND PRINCIPE ', '+239');
INSERT INTO `sel_negara` VALUES ('S09', 'SENEGAL ', '+221');
INSERT INTO `sel_negara` VALUES ('S10', 'SEYCHELLES ', '+248');
INSERT INTO `sel_negara` VALUES ('S11', 'SIERRA LEONE ', '+232');
INSERT INTO `sel_negara` VALUES ('S12', 'SOLOMON ISLAND ', '+677');
INSERT INTO `sel_negara` VALUES ('S13', 'SOUTH KOREA ', '+82');
INSERT INTO `sel_negara` VALUES ('S14', 'SPAIN ', '+34');
INSERT INTO `sel_negara` VALUES ('S15', 'SRI LANKA ', '+94');
INSERT INTO `sel_negara` VALUES ('S16', 'SWEDEN ', '+46');
INSERT INTO `sel_negara` VALUES ('S17', 'SWITZERLAND ', '+41');
INSERT INTO `sel_negara` VALUES ('S18', 'SOMALIA ', '+252');
INSERT INTO `sel_negara` VALUES ('S19', 'SOUTH AFRICA', '+27');
INSERT INTO `sel_negara` VALUES ('S20', 'SOUTH YEMEN ', '+967');
INSERT INTO `sel_negara` VALUES ('S21', 'SUDAN ', '+249');
INSERT INTO `sel_negara` VALUES ('S22', 'SURINAM ', '+597');
INSERT INTO `sel_negara` VALUES ('S23', 'SWAZILAND ', '+268');
INSERT INTO `sel_negara` VALUES ('S24', 'SYRIAN ARAB REPUBLIC ', '+963');
INSERT INTO `sel_negara` VALUES ('S25', 'SERBIA & MONTENEGRO ', '+381');
INSERT INTO `sel_negara` VALUES ('S26', 'SLOVAKIA ', '+421');
INSERT INTO `sel_negara` VALUES ('S27', 'SLOVENIA ', '+386');
INSERT INTO `sel_negara` VALUES ('S28', 'SAINT HELENA ', '+290');
INSERT INTO `sel_negara` VALUES ('S29', 'SAINT PIERRE AND MIQUELON ', '+508');
INSERT INTO `sel_negara` VALUES ('S31', 'SAMOA', '+685');
INSERT INTO `sel_negara` VALUES ('S32', 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISANDS ', '+995');
INSERT INTO `sel_negara` VALUES ('T01', 'TAIWAN ', '+886');
INSERT INTO `sel_negara` VALUES ('T02', 'TANZANIA,UNITED REPUBLIC OF', '+255');
INSERT INTO `sel_negara` VALUES ('T03', 'THAILAND ', '+66');
INSERT INTO `sel_negara` VALUES ('T04', 'TIBET ', null);
INSERT INTO `sel_negara` VALUES ('T05', 'TOGO', '+228');
INSERT INTO `sel_negara` VALUES ('T06', 'TONGA ', '+676');
INSERT INTO `sel_negara` VALUES ('T07', 'TRINIDAD AND TOBAGO ', '+1 868  ');
INSERT INTO `sel_negara` VALUES ('T08', 'TUNISIA ', '+216');
INSERT INTO `sel_negara` VALUES ('T09', 'TURKEY ', '+90');
INSERT INTO `sel_negara` VALUES ('T10', 'TUVALU ', '+688');
INSERT INTO `sel_negara` VALUES ('T11', 'TAJIKISTAN ', '+992');
INSERT INTO `sel_negara` VALUES ('T12', 'TARTAR ', null);
INSERT INTO `sel_negara` VALUES ('T13', 'TIMUR LESTE ', '+670');
INSERT INTO `sel_negara` VALUES ('T14', 'TOKELAU ', '+690');
INSERT INTO `sel_negara` VALUES ('T15', 'TURKMENISTAN ', '+993');
INSERT INTO `sel_negara` VALUES ('T16', 'TURKS AND CAICOS ISLAND ', '+1 649  ');
INSERT INTO `sel_negara` VALUES ('U01', 'UNGANDA ', '+256');
INSERT INTO `sel_negara` VALUES ('U02', 'UKRAINE ', '+380');
INSERT INTO `sel_negara` VALUES ('U03', 'UNITED ARAB EMIRATES ', '+971');
INSERT INTO `sel_negara` VALUES ('U04', 'UNITED KINGDOM ', '+44');
INSERT INTO `sel_negara` VALUES ('U05', 'UNITED STATES OF AMERICA ', '+1');
INSERT INTO `sel_negara` VALUES ('U06', 'URUGUAY ', '+598');
INSERT INTO `sel_negara` VALUES ('U07', 'UZBEKISTAN ', '+998');
INSERT INTO `sel_negara` VALUES ('U08', 'UNITED STATES MINOR OUTLYING ISLAND ', '+808');
INSERT INTO `sel_negara` VALUES ('V01', 'VANUATU ', '+678');
INSERT INTO `sel_negara` VALUES ('V02', 'VATICAN CITY STATE (HOLY SEE)', '+379');
INSERT INTO `sel_negara` VALUES ('V03', 'VENEZUELA ', '+58');
INSERT INTO `sel_negara` VALUES ('V04', 'VIETNAM ', '+84');
INSERT INTO `sel_negara` VALUES ('V05', 'VIRGIN ISLANDS (U.S)', '+1 340  ');
INSERT INTO `sel_negara` VALUES ('V06', 'VIRGIN ISLANDS (BRITISH)', '+1284');
INSERT INTO `sel_negara` VALUES ('W01', 'WESTERN SAMOA ', '+685');
INSERT INTO `sel_negara` VALUES ('W02', 'WALLIS AND FUTUNA ISLAND ', '+681');
INSERT INTO `sel_negara` VALUES ('W03', 'WESTERN SAHARA ', '+212');
INSERT INTO `sel_negara` VALUES ('Y01', 'YEMEN', '+967');
INSERT INTO `sel_negara` VALUES ('Y02', 'YUGOSLAVIA ', '+381');
INSERT INTO `sel_negara` VALUES ('Z01', 'ZAIRE ', '+243');
INSERT INTO `sel_negara` VALUES ('Z02', 'ZAMBIA ', '+260');
INSERT INTO `sel_negara` VALUES ('Z03', 'ZIMBABWE ', '+263');
INSERT INTO `sel_negara` VALUES ('999', 'OTHERS', null);
INSERT INTO `sel_negara` VALUES ('MALI', 'REPUBLIC OF MALI', '+223');

-- ----------------------------
-- Table structure for `sel_negeri`
-- ----------------------------
DROP TABLE IF EXISTS `sel_negeri`;
CREATE TABLE `sel_negeri` (
  `kodnegara` varchar(5) DEFAULT NULL,
  `kodnegeri` varchar(5) NOT NULL DEFAULT '',
  `namanegeri` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kodnegeri`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sel_negeri
-- ----------------------------
INSERT INTO `sel_negeri` VALUES ('M01', '01', 'JOHOR');
INSERT INTO `sel_negeri` VALUES ('M01', '02', 'KEDAH DARUL AMAN');
INSERT INTO `sel_negeri` VALUES ('M01', '03', 'KELANTAN');
INSERT INTO `sel_negeri` VALUES ('M01', '04', 'MELAKA');
INSERT INTO `sel_negeri` VALUES ('M01', '05', 'NEGERI SEMBILAN');
INSERT INTO `sel_negeri` VALUES ('M01', '06', 'PAHANG');
INSERT INTO `sel_negeri` VALUES ('M01', '07', 'PULAU PINANG');
INSERT INTO `sel_negeri` VALUES ('M01', '08', 'PERAK');
INSERT INTO `sel_negeri` VALUES ('M01', '09', 'PERLIS');
INSERT INTO `sel_negeri` VALUES ('M01', '10', 'SELANGOR');
INSERT INTO `sel_negeri` VALUES ('M01', '11', 'TERENGGANU');
INSERT INTO `sel_negeri` VALUES ('M01', '12', 'SABAH');
INSERT INTO `sel_negeri` VALUES ('M01', '13', 'SARAWAK');
INSERT INTO `sel_negeri` VALUES ('M01', '14', 'W.P.(KL)');
INSERT INTO `sel_negeri` VALUES ('M01', '15', 'W.P.(LABUAN)');
INSERT INTO `sel_negeri` VALUES ('M01', '16', 'W.P.(PUTRAJAYA)');
INSERT INTO `sel_negeri` VALUES ('M01', '99', 'OTHERS');
INSERT INTO `sel_negeri` VALUES ('A01', 'A0101', 'NANGARHAR');
INSERT INTO `sel_negeri` VALUES ('MALI', 'MALI0', 'MALI MALU');
INSERT INTO `sel_negeri` VALUES ('S18', 'S1801', 'PUNTLAND');
INSERT INTO `sel_negeri` VALUES ('T03', 'T0301', 'BANGKOK');
INSERT INTO `sel_negeri` VALUES ('T03', 'T0302', 'CHIANG MAI');
INSERT INTO `sel_negeri` VALUES ('T03', 'T0303', 'CHIANG RAI');
INSERT INTO `sel_negeri` VALUES ('T03', 'T0304', 'CHONBURI');
INSERT INTO `sel_negeri` VALUES ('T03', 'T0305', 'KANCHANABURI');
INSERT INTO `sel_negeri` VALUES ('T03', 'T0306', 'KHON KAEN');
INSERT INTO `sel_negeri` VALUES ('T03', 'T0307', 'NAKHON RATCHASIMA');
INSERT INTO `sel_negeri` VALUES ('T03', 'T0308', 'NAKHON SI THAMMARAT');
INSERT INTO `sel_negeri` VALUES ('T03', 'T0309', 'NARATHIWAT');
INSERT INTO `sel_negeri` VALUES ('T03', 'T0310', 'PATTANI');
INSERT INTO `sel_negeri` VALUES ('T03', 'T0311', 'PHUKET');
INSERT INTO `sel_negeri` VALUES ('T03', 'T0312', 'SONGKHLA ');
INSERT INTO `sel_negeri` VALUES ('T03', 'T0313', 'UBON RATCHATHANI');
INSERT INTO `sel_negeri` VALUES ('T03', 'T0314', 'UDON THANI');
INSERT INTO `sel_negeri` VALUES ('T03', 'T0315', 'YALA ');
INSERT INTO `sel_negeri` VALUES ('T03', 'T0316', 'ANG THONG');
INSERT INTO `sel_negeri` VALUES ('T03', 'T0317', 'CHAI NAT');
INSERT INTO `sel_negeri` VALUES ('T03', 'T0318', 'LOPBURI');
INSERT INTO `sel_negeri` VALUES ('T03', 'T0319', 'NAKHON NAYOK');
INSERT INTO `sel_negeri` VALUES ('T03', 'T0320', 'NAKHON PATHOM');
INSERT INTO `sel_negeri` VALUES ('T03', 'T0321', 'NONTHABURI');
INSERT INTO `sel_negeri` VALUES ('T03', 'T0322', 'PATHUM THANI');
INSERT INTO `sel_negeri` VALUES ('T03', 'T0323', 'PHETCHABURI');
INSERT INTO `sel_negeri` VALUES ('T03', 'T0324', 'AYUTTHAYA');
INSERT INTO `sel_negeri` VALUES ('T03', 'T0325', 'PRACHUAP KHIRI KHAN');
INSERT INTO `sel_negeri` VALUES ('T03', 'T0326', 'RATCHABURI');
INSERT INTO `sel_negeri` VALUES ('T03', 'T0327', 'SAMUT PRAKAN');
INSERT INTO `sel_negeri` VALUES ('T03', 'T0328', 'SAMUT SAKHON');
INSERT INTO `sel_negeri` VALUES ('T03', 'T0329', 'SAMUT SONGKHRAM');
INSERT INTO `sel_negeri` VALUES ('T03', 'T0330', 'SARABURI');
INSERT INTO `sel_negeri` VALUES ('T03', 'T0331', 'SING BURI');
INSERT INTO `sel_negeri` VALUES ('T03', 'T0332', 'SUPHANBURI');
INSERT INTO `sel_negeri` VALUES ('T03', 'T0333', 'CHACHOENGSAO');
INSERT INTO `sel_negeri` VALUES ('T03', 'T0334', 'CHANTHABURI');
INSERT INTO `sel_negeri` VALUES ('T03', 'T0335', 'PRACHINBURI');
INSERT INTO `sel_negeri` VALUES ('T03', 'T0336', 'RAYONG');
INSERT INTO `sel_negeri` VALUES ('T03', 'T0337', 'SA KAEO');
INSERT INTO `sel_negeri` VALUES ('T03', 'T0338', 'TRAT');
INSERT INTO `sel_negeri` VALUES ('T03', 'T0339', 'KAMPHAENG PHET');
INSERT INTO `sel_negeri` VALUES ('T03', 'T0340', 'LAMPANG');
INSERT INTO `sel_negeri` VALUES ('T03', 'T0341', 'LAMPHUN');
INSERT INTO `sel_negeri` VALUES ('T03', 'T0342', 'MAE HONG SON');
INSERT INTO `sel_negeri` VALUES ('T03', 'T0343', 'NAKHON SAWAN');
INSERT INTO `sel_negeri` VALUES ('T03', 'T0344', 'NAN');
INSERT INTO `sel_negeri` VALUES ('T03', 'T0345', 'PHAYAO');
INSERT INTO `sel_negeri` VALUES ('T03', 'T0346', 'PHETCHABUN');
INSERT INTO `sel_negeri` VALUES ('T03', 'T0347', 'PHICHIT');
INSERT INTO `sel_negeri` VALUES ('T03', 'T0348', 'PHITSANULOK');
INSERT INTO `sel_negeri` VALUES ('T03', 'T0349', 'PHRAE');
INSERT INTO `sel_negeri` VALUES ('T03', 'T0350', 'SUKHOTHAI');
INSERT INTO `sel_negeri` VALUES ('T03', 'T0351', 'TAK');
INSERT INTO `sel_negeri` VALUES ('T03', 'T0352', 'UTHAI THANI');
INSERT INTO `sel_negeri` VALUES ('T03', 'T0353', 'UTTARADIT');
INSERT INTO `sel_negeri` VALUES ('T03', 'T0354', 'AMNAT CHAROEN');
INSERT INTO `sel_negeri` VALUES ('T03', 'T0355', 'BURI RAM');
INSERT INTO `sel_negeri` VALUES ('T03', 'T0356', 'CHAIYAPHUM');
INSERT INTO `sel_negeri` VALUES ('T03', 'T0357', 'KALASIN');
INSERT INTO `sel_negeri` VALUES ('T03', 'T0358', 'LOEI');
INSERT INTO `sel_negeri` VALUES ('T03', 'T0359', 'MAHA SARAKHAM');
INSERT INTO `sel_negeri` VALUES ('T03', 'T0360', 'MUKDAHAN');
INSERT INTO `sel_negeri` VALUES ('T03', 'T0361', 'NAKHON PHANOM');
INSERT INTO `sel_negeri` VALUES ('T03', 'T0362', 'NONG BUA LAMPHU');
INSERT INTO `sel_negeri` VALUES ('T03', 'T0363', 'NONG KHAI');
INSERT INTO `sel_negeri` VALUES ('T03', 'T0364', 'ROI ET');
INSERT INTO `sel_negeri` VALUES ('T03', 'T0365', 'SAKON NAKHON');
INSERT INTO `sel_negeri` VALUES ('T03', 'T0366', 'SISAKET');
INSERT INTO `sel_negeri` VALUES ('T03', 'T0367', 'SURIN');
INSERT INTO `sel_negeri` VALUES ('T03', 'T0368', 'YASOTHON');
INSERT INTO `sel_negeri` VALUES ('T03', 'T0369', 'CHUMPHON');
INSERT INTO `sel_negeri` VALUES ('T03', 'T0370', 'KRABI');
INSERT INTO `sel_negeri` VALUES ('T03', 'T0371', 'PHANG NGA');
INSERT INTO `sel_negeri` VALUES ('T03', 'T0372', 'PHATTHALUNG');
INSERT INTO `sel_negeri` VALUES ('T03', 'T0373', 'RANONG');
INSERT INTO `sel_negeri` VALUES ('T03', 'T0374', 'SATUN');
INSERT INTO `sel_negeri` VALUES ('T03', 'T0375', 'SURAT THANI');
INSERT INTO `sel_negeri` VALUES ('T03', 'T0376', 'TRANG');
INSERT INTO `sel_negeri` VALUES ('T03', 'T0399', 'OTHERS');
INSERT INTO `sel_negeri` VALUES ('999', '999', 'OTHERS');
INSERT INTO `sel_negeri` VALUES ('A01', 'A0199', 'OTHERS');
INSERT INTO `sel_negeri` VALUES ('S18', 'S1899', 'OTHERS');
INSERT INTO `sel_negeri` VALUES ('T03', 'T039', 'OTHERS');

-- ----------------------------
-- Table structure for `sel_race`
-- ----------------------------
DROP TABLE IF EXISTS `sel_race`;
CREATE TABLE `sel_race` (
  `kodbangsa` varchar(5) NOT NULL DEFAULT '0',
  `bangsa_MY` varchar(30) DEFAULT NULL,
  `bangsa_EN` varchar(30) DEFAULT NULL,
  `bangsa_AR` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`kodbangsa`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sel_race
-- ----------------------------
INSERT INTO `sel_race` VALUES ('-1', 'TIDAK DINYATAKAN', 'NOT AVAILABLE', '');
INSERT INTO `sel_race` VALUES ('100', 'MELAYU', 'MALAY', '');
INSERT INTO `sel_race` VALUES ('1000', 'BUMIPUTERA SARAWAK ', 'BUMIPUTERA SARAWAK ', '');
INSERT INTO `sel_race` VALUES ('1001', 'MELAYU SARAWAK ', 'MELAYU SARAWAK ', '');
INSERT INTO `sel_race` VALUES ('1002', 'MELANAU', 'MELANAU', '');
INSERT INTO `sel_race` VALUES ('1003', 'KEDAYAN', 'KEDAYAN', '');
INSERT INTO `sel_race` VALUES ('1004', 'IBAN/SEA DAYAK', 'IBAN/SEA DAYAK', '');
INSERT INTO `sel_race` VALUES ('1005', 'BIDAYUH/LAND DAYAK', 'BIDAYUH/LAND DAYAK', '');
INSERT INTO `sel_race` VALUES ('1006', 'KAYAN', 'KAYAN', '');
INSERT INTO `sel_race` VALUES ('1007', 'KENYAH', 'KENYAH', '');
INSERT INTO `sel_race` VALUES ('1008', 'MURUT/LUN BAWANG', 'MURUT/LUN BAWANG', '');
INSERT INTO `sel_race` VALUES ('1009', 'KELABIT', 'KELABIT', '');
INSERT INTO `sel_race` VALUES ('1010', 'PENAN/PUNAN ', 'PENAN/PUNAN ', '');
INSERT INTO `sel_race` VALUES ('1102', 'BERAWAN ', 'BERAWAN ', '');
INSERT INTO `sel_race` VALUES ('1103', 'BELOT', 'BELOT', '');
INSERT INTO `sel_race` VALUES ('1104', 'BUKIT', 'BUKIT', '');
INSERT INTO `sel_race` VALUES ('1105', 'BALAU', 'BALAU', '');
INSERT INTO `sel_race` VALUES ('1106', 'BATANG AI', 'BATANG AI', '');
INSERT INTO `sel_race` VALUES ('1107', 'BATU ELAH', 'BATU ELAH', '');
INSERT INTO `sel_race` VALUES ('1108', 'BUKITAN ', 'BUKITAN ', '');
INSERT INTO `sel_race` VALUES ('1109', 'BINTULU', 'BINTULU', '');
INSERT INTO `sel_race` VALUES ('1110', 'BADANG', 'BADANG', '');
INSERT INTO `sel_race` VALUES ('1111', 'JAGOI', 'JAGOI', '');
INSERT INTO `sel_race` VALUES ('1112', 'KIPUT', 'KIPUT', '');
INSERT INTO `sel_race` VALUES ('1113', 'KAJANG', 'KAJANG', '');
INSERT INTO `sel_race` VALUES ('1114', 'KAJAMAN', 'KAJAMAN', '');
INSERT INTO `sel_race` VALUES ('1115', 'KANOWIT', 'KANOWIT', '');
INSERT INTO `sel_race` VALUES ('1116', 'LIRONG', 'LIRONG', '');
INSERT INTO `sel_race` VALUES ('1117', 'LEMANAK', 'LEMANAK', '');
INSERT INTO `sel_race` VALUES ('1118', 'LAHANAN', 'LAHANAN', '');
INSERT INTO `sel_race` VALUES ('1119', 'LUSUM/LUGUM', 'LUSUM/LUGUM', '');
INSERT INTO `sel_race` VALUES ('1120', 'MATU', 'MATU', '');
INSERT INTO `sel_race` VALUES ('1121', 'MALOH', 'MALOH', '');
INSERT INTO `sel_race` VALUES ('1122', 'MELIKIN', 'MELIKIN', '');
INSERT INTO `sel_race` VALUES ('1123', 'MELAING', 'MELAING', '');
INSERT INTO `sel_race` VALUES ('1124', 'MURIK', 'MURIK', '');
INSERT INTO `sel_race` VALUES ('1125', 'MENONDO', 'MENONDO', '');
INSERT INTO `sel_race` VALUES ('1126', 'NYAMOK', 'NYAMOK', '');
INSERT INTO `sel_race` VALUES ('1127', 'SEBOB', 'SEBOB', '');
INSERT INTO `sel_race` VALUES ('1128', 'SEDUAN ', 'SEDUAN ', '');
INSERT INTO `sel_race` VALUES ('1129', 'SEKAPAN', 'SEKAPAN', '');
INSERT INTO `sel_race` VALUES ('1130', 'SEGALANG', 'SEGALANG', '');
INSERT INTO `sel_race` VALUES ('1131', 'SIAN', 'SIAN', '');
INSERT INTO `sel_race` VALUES ('1132', 'SIPENG', 'SIPENG', '');
INSERT INTO `sel_race` VALUES ('1133', 'SARIBAS', 'SARIBAS', '');
INSERT INTO `sel_race` VALUES ('1134', 'SEBUYAU', 'SEBUYAU', '');
INSERT INTO `sel_race` VALUES ('1135', 'SKRANG', 'SKRANG', '');
INSERT INTO `sel_race` VALUES ('1136', 'SABAH', 'SABAH', '');
INSERT INTO `sel_race` VALUES ('1137', 'SELAKAN', 'SELAKAN', '');
INSERT INTO `sel_race` VALUES ('1138', 'SELAKAU', 'SELAKAU', '');
INSERT INTO `sel_race` VALUES ('1139', 'TAGAL', 'TAGAL', '');
INSERT INTO `sel_race` VALUES ('1140', 'TABUN', 'TABUN', '');
INSERT INTO `sel_race` VALUES ('1141', 'TUTONG', 'TUTONG', '');
INSERT INTO `sel_race` VALUES ('1142', 'TANJONG', 'TANJONG', '');
INSERT INTO `sel_race` VALUES ('1143', 'TATAU', 'TATAU', '');
INSERT INTO `sel_race` VALUES ('1144', 'TAUP', 'TAUP', '');
INSERT INTO `sel_race` VALUES ('1145', 'UKIT', 'UKIT', '');
INSERT INTO `sel_race` VALUES ('1146', 'UNKOP', 'UNKOP', '');
INSERT INTO `sel_race` VALUES ('1147', 'ULU AI ', 'ULU AI ', '');
INSERT INTO `sel_race` VALUES ('1148', 'ORANG ASLI (SEMENANJUNG)', 'ORANG ASLI (SEMENANJUNG)', '');
INSERT INTO `sel_race` VALUES ('1149', 'NEGRITO', 'NEGRITO', '');
INSERT INTO `sel_race` VALUES ('1200', 'BATEQ', 'BATEQ', '');
INSERT INTO `sel_race` VALUES ('1201', 'JAHAI', 'JAHAI', '');
INSERT INTO `sel_race` VALUES ('1203', 'KENSIU', 'KENSIU', '');
INSERT INTO `sel_race` VALUES ('1204', 'KINTAK ', 'KINTAK ', '');
INSERT INTO `sel_race` VALUES ('1205', 'KANOH', 'KANOH', '');
INSERT INTO `sel_race` VALUES ('1206', 'MENDRIQ', 'MENDRIQ', '');
INSERT INTO `sel_race` VALUES ('1207', 'SENOI', 'SENOI', '');
INSERT INTO `sel_race` VALUES ('1220', 'CHE WONG', 'CHE WONG', '');
INSERT INTO `sel_race` VALUES ('1221', 'JAHUT', 'JAHUT', '');
INSERT INTO `sel_race` VALUES ('1222', 'MAHMERI', 'MAHMERI', '');
INSERT INTO `sel_race` VALUES ('1223', 'MELAING', 'MELAING', '');
INSERT INTO `sel_race` VALUES ('1224', 'MAMOQ BERI ', 'MAMOQ BERI ', '');
INSERT INTO `sel_race` VALUES ('1225', 'TEMIAR', 'TEMIAR', '');
INSERT INTO `sel_race` VALUES ('1226', 'ORANG ASLI LAIN', 'ORANG ASLI LAIN', '');
INSERT INTO `sel_race` VALUES ('1230', 'JAKUN', 'JAKUN', '');
INSERT INTO `sel_race` VALUES ('1231', 'ORANG KANAQ', 'ORANG KANAQ', '');
INSERT INTO `sel_race` VALUES ('1232', 'ORANG KUALA', 'ORANG KUALA', '');
INSERT INTO `sel_race` VALUES ('1234', 'ORANG SEKTAR', 'ORANG SEKTAR', '');
INSERT INTO `sel_race` VALUES ('1235', 'SEMALAI', 'SEMALAI', '');
INSERT INTO `sel_race` VALUES ('1236', 'TEMUAN', 'TEMUAN', '');
INSERT INTO `sel_race` VALUES ('200', 'CINA', 'CHINESE', '');
INSERT INTO `sel_race` VALUES ('2001', 'CHINESE', 'CHINESE', '');
INSERT INTO `sel_race` VALUES ('2002', 'INDIAN', 'INDIAN', '');
INSERT INTO `sel_race` VALUES ('2003', 'ARAB', 'ARAB', '');
INSERT INTO `sel_race` VALUES ('2004', 'ENGLISH', 'ENGLISH', '');
INSERT INTO `sel_race` VALUES ('2005', 'FRENCH', 'FRENCH', '');
INSERT INTO `sel_race` VALUES ('2006', 'GERMAN', 'GERMAN', '');
INSERT INTO `sel_race` VALUES ('2007', 'IRISH', 'IRISH', '');
INSERT INTO `sel_race` VALUES ('2008', 'ITALIAN', 'ITALIAN', '');
INSERT INTO `sel_race` VALUES ('2009', 'NEAR EASTERNER', 'NEAR EASTERNER', '');
INSERT INTO `sel_race` VALUES ('2010', 'POLISH', 'POLISH', '');
INSERT INTO `sel_race` VALUES ('2011', 'SCOTTISH', 'SCOTTISH', '');
INSERT INTO `sel_race` VALUES ('2012', 'ARMENIAN', 'ARMENIAN', '');
INSERT INTO `sel_race` VALUES ('2013', 'ASSYRIAN', 'ASSYRIAN', '');
INSERT INTO `sel_race` VALUES ('2014', 'EGYPTIAN', 'EGYPTIAN', '');
INSERT INTO `sel_race` VALUES ('2015', 'IRANIAN', 'IRANIAN', '');
INSERT INTO `sel_race` VALUES ('2016', 'IRAQI', 'IRAQI', '');
INSERT INTO `sel_race` VALUES ('2017', 'LEBANESE', 'LEBANESE', '');
INSERT INTO `sel_race` VALUES ('2018', 'MIDDLE EAST', 'MIDDLE EAST', '');
INSERT INTO `sel_race` VALUES ('2019', 'PALESTINIAN', 'PALESTINIAN', '');
INSERT INTO `sel_race` VALUES ('2020', 'SYRIAN', 'SYRIAN', '');
INSERT INTO `sel_race` VALUES ('2022', 'AFGHANISTANI', 'AFGHANISTANI', '');
INSERT INTO `sel_race` VALUES ('2023', 'ISRAELI', 'ISRAELI', '');
INSERT INTO `sel_race` VALUES ('2024', 'CALIFORNIO', 'CALIFORNIO', '');
INSERT INTO `sel_race` VALUES ('2025', 'CAJUN', 'CAJUN', '');
INSERT INTO `sel_race` VALUES ('2026', 'EUROPEAN', 'EUROPEAN', '');
INSERT INTO `sel_race` VALUES ('2027', 'PORTUGUESE', 'PORTUGUESE', '');
INSERT INTO `sel_race` VALUES ('2028', 'ALBANIAN', 'ALBANIAN', '');
INSERT INTO `sel_race` VALUES ('2029', 'CROATIAN', 'CROATIAN', '');
INSERT INTO `sel_race` VALUES ('2030', 'CZECH', 'CZECH', '');
INSERT INTO `sel_race` VALUES ('2031', 'RUSSIAN', 'RUSSIAN', '');
INSERT INTO `sel_race` VALUES ('2032', 'UKRANIAN', 'UKRANIAN', '');
INSERT INTO `sel_race` VALUES ('2033', 'CZECHOSLOVAKIAN', 'CZECHOSLOVAKIAN', '');
INSERT INTO `sel_race` VALUES ('2034', 'BOSNIAN', 'BOSNIAN', '');
INSERT INTO `sel_race` VALUES ('2035', 'KOSOVIAN', 'KOSOVIAN', '');
INSERT INTO `sel_race` VALUES ('2036', 'BLACK', 'BLACK', '');
INSERT INTO `sel_race` VALUES ('2037', 'AFRICAN', 'AFRICAN', '');
INSERT INTO `sel_race` VALUES ('2038', 'AFRICAN AMERICAN', 'AFRICAN AMERICAN', '');
INSERT INTO `sel_race` VALUES ('2039', 'AFROAMERICAN', 'AFROAMERICAN', '');
INSERT INTO `sel_race` VALUES ('2040', 'NIGRITIAN', 'NIGRITIAN', '');
INSERT INTO `sel_race` VALUES ('2041', 'NEGRO', 'NEGRO', '');
INSERT INTO `sel_race` VALUES ('2042', 'BAHAMIAN', 'BAHAMIAN', '');
INSERT INTO `sel_race` VALUES ('2043', 'BARBADIAN', 'BARBADIAN', '');
INSERT INTO `sel_race` VALUES ('2044', 'BOTSWANA', 'BOTSWANA', '');
INSERT INTO `sel_race` VALUES ('2045', 'ETHIOPIAN', 'ETHIOPIAN', '');
INSERT INTO `sel_race` VALUES ('2046', 'HAITIAN', 'HAITIAN', '');
INSERT INTO `sel_race` VALUES ('2047', 'JAMAICAN', 'JAMAICAN', '');
INSERT INTO `sel_race` VALUES ('2048', 'LIBERIAN', 'LIBERIAN', '');
INSERT INTO `sel_race` VALUES ('2049', 'NAMIBIAN', 'NAMIBIAN', '');
INSERT INTO `sel_race` VALUES ('2050', 'NIGERIAN', 'NIGERIAN', '');
INSERT INTO `sel_race` VALUES ('2051', 'OTHER AFRICAN', 'OTHER AFRICAN', '');
INSERT INTO `sel_race` VALUES ('2052', 'TOBAGO', 'TOBAGO', '');
INSERT INTO `sel_race` VALUES ('2053', 'TRINIDAD', 'TRINIDAD', '');
INSERT INTO `sel_race` VALUES ('2054', 'WEST INDIES', 'WEST INDIES', '');
INSERT INTO `sel_race` VALUES ('2055', 'ZAIRE', 'ZAIRE', '');
INSERT INTO `sel_race` VALUES ('2056', 'ERITREAN', 'ERITREAN', '');
INSERT INTO `sel_race` VALUES ('2057', 'TOGOLESE', 'TOGOLESE', '');
INSERT INTO `sel_race` VALUES ('2058', 'SOMALIAN', 'SOMALIAN', '');
INSERT INTO `sel_race` VALUES ('2059', 'BANGLADESHI', 'BANGLADESHI', '');
INSERT INTO `sel_race` VALUES ('2060', 'BHUTANESE', 'BHUTANESE', '');
INSERT INTO `sel_race` VALUES ('2061', 'BURMESE', 'BURMESE', '');
INSERT INTO `sel_race` VALUES ('2062', 'CAMBODIAN', 'CAMBODIAN', '');
INSERT INTO `sel_race` VALUES ('2063', 'TAIWANESE', 'TAIWANESE', '');
INSERT INTO `sel_race` VALUES ('2064', 'FILIPINO', 'FILIPINO', '');
INSERT INTO `sel_race` VALUES ('2065', 'HMONG', 'HMONG', '');
INSERT INTO `sel_race` VALUES ('2066', 'INDONESIAN', 'INDONESIAN', '');
INSERT INTO `sel_race` VALUES ('2067', 'JAPANESE', 'JAPANESE', '');
INSERT INTO `sel_race` VALUES ('2068', 'KOREAN', 'KOREAN', '');
INSERT INTO `sel_race` VALUES ('2069', 'LAOTIAN', 'LAOTIAN', '');
INSERT INTO `sel_race` VALUES ('2070', 'OKINAWAN', 'OKINAWAN', '');
INSERT INTO `sel_race` VALUES ('2071', 'PAKISTANI', 'PAKISTANI', '');
INSERT INTO `sel_race` VALUES ('2072', 'SRI LANKAN', 'SRI LANKAN', '');
INSERT INTO `sel_race` VALUES ('2073', 'THAI', 'THAI', '');
INSERT INTO `sel_race` VALUES ('2074', 'VIETNAMESE', 'VIETNAMESE', '');
INSERT INTO `sel_race` VALUES ('2075', 'AMERASIAN', 'AMERASIAN', '');
INSERT INTO `sel_race` VALUES ('2076', 'ASIATIC', 'ASIATIC', '');
INSERT INTO `sel_race` VALUES ('2077', 'EURASIAN', 'EURASIAN', '');
INSERT INTO `sel_race` VALUES ('2078', 'MONGOLIAN', 'MONGOLIAN', '');
INSERT INTO `sel_race` VALUES ('2079', 'ORIENTAL', 'ORIENTAL', '');
INSERT INTO `sel_race` VALUES ('2080', 'WHELLO', 'WHELLO', '');
INSERT INTO `sel_race` VALUES ('2081', 'YELLO', 'YELLO', '');
INSERT INTO `sel_race` VALUES ('2082', 'INDO CHINESE', 'INDO CHINESE', '');
INSERT INTO `sel_race` VALUES ('2083', 'IWO JIMAN', 'IWO JIMAN', '');
INSERT INTO `sel_race` VALUES ('2084', 'MALDIVIAN', 'MALDIVIAN', '');
INSERT INTO `sel_race` VALUES ('2085', 'NEPALESE', 'NEPALESE', '');
INSERT INTO `sel_race` VALUES ('2086', 'SINGAPOREAN', 'SINGAPOREAN', '');
INSERT INTO `sel_race` VALUES ('2087', 'MADAGASCAR', 'MADAGASCAR', '');
INSERT INTO `sel_race` VALUES ('2088', 'MIEN', 'MIEN', '');
INSERT INTO `sel_race` VALUES ('2089', 'TIBETAN', 'TIBETAN', '');
INSERT INTO `sel_race` VALUES ('2090', 'BRUNEI', 'BRUNEI', null);
INSERT INTO `sel_race` VALUES ('2091', 'SUDAN', 'SUDANESE', null);
INSERT INTO `sel_race` VALUES ('300', 'INDIA', 'INDIAN', '');
INSERT INTO `sel_race` VALUES ('333', 'LOTUD', 'LOTUD', '');
INSERT INTO `sel_race` VALUES ('800', 'BUMIPUTERA SABAH', 'BUMIPUTERA SABAH', '');
INSERT INTO `sel_race` VALUES ('801', 'BAJAU', 'BAJAU', '');
INSERT INTO `sel_race` VALUES ('802', 'DUSUN', 'DUSUN', '');
INSERT INTO `sel_race` VALUES ('803', 'KADAZAN', 'KADAZAN', '');
INSERT INTO `sel_race` VALUES ('804', 'MURUT', 'MURUT', '');
INSERT INTO `sel_race` VALUES ('805', 'SINO-NATIVE', 'SINO-NATIVE', '');
INSERT INTO `sel_race` VALUES ('806', 'SULUK', 'SULUK', '');
INSERT INTO `sel_race` VALUES ('901', 'BINADAN ', 'BINADAN ', '');
INSERT INTO `sel_race` VALUES ('902', 'BISAYA', 'BISAYA', '');
INSERT INTO `sel_race` VALUES ('903', 'BONGOL', 'BONGOL', '');
INSERT INTO `sel_race` VALUES ('904', 'BRUNIE', 'BRUNIE', '');
INSERT INTO `sel_race` VALUES ('905', 'DUMPAS', 'DUMPAS', '');
INSERT INTO `sel_race` VALUES ('906', 'IRRANUN', 'IRRANUN', '');
INSERT INTO `sel_race` VALUES ('907', 'IDAHAN', 'IDAHAN', '');
INSERT INTO `sel_race` VALUES ('908', 'KWIJAU', 'KWIJAU', '');
INSERT INTO `sel_race` VALUES ('909', 'KEDAYAN', 'KEDAYAN', '');
INSERT INTO `sel_race` VALUES ('910', 'LINGKABAU', 'LINGKABAU', '');
INSERT INTO `sel_race` VALUES ('911', 'LUNDAYEH', 'LUNDAYEH', '');
INSERT INTO `sel_race` VALUES ('912', 'LASAU', 'LASAU', '');
INSERT INTO `sel_race` VALUES ('913', 'MELANAU', 'MELANAU', '');
INSERT INTO `sel_race` VALUES ('914', 'MANGKAAK', 'MANGKAAK', '');
INSERT INTO `sel_race` VALUES ('915', 'MATAGANG', 'MATAGANG', '');
INSERT INTO `sel_race` VALUES ('916', 'MINOKOK', 'MINOKOK', '');
INSERT INTO `sel_race` VALUES ('917', 'MOMOGUN', 'MOMOGUN', '');
INSERT INTO `sel_race` VALUES ('918', 'PAITAN', 'PAITAN', '');
INSERT INTO `sel_race` VALUES ('919', 'RAMANAU', 'RAMANAU', '');
INSERT INTO `sel_race` VALUES ('920', 'RUNGUS', 'RUNGUS', '');
INSERT INTO `sel_race` VALUES ('921', 'SUNYAI', 'SUNYAI', '');
INSERT INTO `sel_race` VALUES ('923', 'SONSONGAN ', 'SONSONGAN ', '');
INSERT INTO `sel_race` VALUES ('924', 'SINULAHAN', 'SINULAHAN', '');
INSERT INTO `sel_race` VALUES ('925', 'TAMBANUO', 'TAMBANUO', '');
INSERT INTO `sel_race` VALUES ('926', 'TAGAL', 'TAGAL', '');
INSERT INTO `sel_race` VALUES ('927', 'TINAGAS', 'TINAGAS', '');
INSERT INTO `sel_race` VALUES ('928', 'COCOS', 'COCOS', '');
INSERT INTO `sel_race` VALUES ('929', 'KIMARAGANG', 'KIMARAGANG', '');
INSERT INTO `sel_race` VALUES ('930', 'BOLONGAN ', 'BOLONGAN ', '');
INSERT INTO `sel_race` VALUES ('931', 'BUTON', 'BUTON', '');
INSERT INTO `sel_race` VALUES ('932', 'TIDONG', 'TIDONG', '');
INSERT INTO `sel_race` VALUES ('999', 'LAIN-LAIN', 'OTHERS', '');

-- ----------------------------
-- Table structure for `sel_religion`
-- ----------------------------
DROP TABLE IF EXISTS `sel_religion`;
CREATE TABLE `sel_religion` (
  `kodagama` varchar(5) CHARACTER SET utf8 NOT NULL,
  `agama_MY` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `agama_EN` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `agama_AR` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`kodagama`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of sel_religion
-- ----------------------------
INSERT INTO `sel_religion` VALUES ('1', 'ISLAM', 'MUSLIM', null);
INSERT INTO `sel_religion` VALUES ('2', 'BUDHA', 'BUDDHIST', null);
INSERT INTO `sel_religion` VALUES ('3', 'HINDU', 'HINDU', null);
INSERT INTO `sel_religion` VALUES ('4', 'KRISTIAN', 'CHRISTIAN', null);
INSERT INTO `sel_religion` VALUES ('5', 'SIKH', 'SIKHISM', null);
INSERT INTO `sel_religion` VALUES ('6', 'LAIN-LAIN', 'OTHERS', null);

-- ----------------------------
-- Table structure for `sel_status`
-- ----------------------------
DROP TABLE IF EXISTS `sel_status`;
CREATE TABLE `sel_status` (
  `kodstatus` varchar(10) NOT NULL,
  `status_MY` varchar(50) DEFAULT NULL,
  `status_EN` varchar(50) DEFAULT NULL,
  `kod_sem` varchar(6) DEFAULT NULL,
  `stud` varchar(1) DEFAULT '0',
  `grad` varchar(1) DEFAULT '0' COMMENT 'untuk pelajar yang dah grad',
  PRIMARY KEY (`kodstatus`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sel_status
-- ----------------------------
INSERT INTO `sel_status` VALUES ('A', 'AKTIF', 'ACTIVE', '01', '1', '0');
INSERT INTO `sel_status` VALUES ('G', 'GRADUAT', 'GRADUATED', '07', '0', '1');
INSERT INTO `sel_status` VALUES ('GB', 'GAGAL DIBERHENTIKAN', 'GAGAL DIBERHENTIKAN', '05', '0', '0');
INSERT INTO `sel_status` VALUES ('P', 'PASIF', 'PASSIVE', '02', '1', '0');
INSERT INTO `sel_status` VALUES ('T', 'TANGGUH', 'POSTPONED', '03', '1', '0');
INSERT INTO `sel_status` VALUES ('X', 'GUGUR NAMA (BERHENTI)', 'WITHDRAWED', '06', '0', '0');
INSERT INTO `sel_status` VALUES ('US', 'ULANG SEMESTER', 'REPEAT SEMESTER', '04', '1', '0');

-- ----------------------------
-- Table structure for `sel_statusDtl`
-- ----------------------------
DROP TABLE IF EXISTS `sel_statusDtl`;
CREATE TABLE `sel_statusDtl` (
  `kod_sem` varchar(5) DEFAULT NULL,
  `kod_detail` varchar(5) NOT NULL DEFAULT '',
  `keterangan` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`kod_detail`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sel_statusDtl
-- ----------------------------
INSERT INTO `sel_statusDtl` VALUES ('-1', '-1', 'TIDAK DINYATAKAN');
INSERT INTO `sel_statusDtl` VALUES ('02', '02', 'PASIF');
INSERT INTO `sel_statusDtl` VALUES ('01', '01', 'AKTIF');
INSERT INTO `sel_statusDtl` VALUES ('06', '06', 'GUGUR NAMA (BERHENTI)');
INSERT INTO `sel_statusDtl` VALUES ('03', '0301', 'BERSALIN');
INSERT INTO `sel_statusDtl` VALUES ('03', '0302', 'MASALAH PERIBADI');
INSERT INTO `sel_statusDtl` VALUES ('03', '0303', 'GANTUNG (HUKUMAN TATATERTIB)');
INSERT INTO `sel_statusDtl` VALUES ('03', '0305', 'MASALAH KEWANGAN');
INSERT INTO `sel_statusDtl` VALUES ('04', '0401', 'MOHON BERHENTI');
INSERT INTO `sel_statusDtl` VALUES ('04', '0402', 'MENINGGAL DUNIA');
INSERT INTO `sel_statusDtl` VALUES ('05', '0501', 'GAGAL PEPERIKSAAN / AKADEMIK');
INSERT INTO `sel_statusDtl` VALUES ('05', '0502', 'HUKUMAN TATATERTIB');
INSERT INTO `sel_statusDtl` VALUES ('07', '0701', 'SIJIL (TAMAT)');
INSERT INTO `sel_statusDtl` VALUES ('07', '0702', 'DIPLOMA (TAMAT)');
INSERT INTO `sel_statusDtl` VALUES ('07', '0703', 'IJAZAH SARJANA MUDA (TAMAT)');
INSERT INTO `sel_statusDtl` VALUES ('07', '0704', 'MASTER/SARJANA (TAMAT)');
INSERT INTO `sel_statusDtl` VALUES ('07', '0705', 'PHD (TAMAT)');

-- ----------------------------
-- Table structure for `sel_statusmohon`
-- ----------------------------
DROP TABLE IF EXISTS `sel_statusmohon`;
CREATE TABLE `sel_statusmohon` (
  `kodstatus` varchar(10) NOT NULL,
  `status_MY` varchar(50) DEFAULT NULL,
  `status_EN` varchar(50) DEFAULT NULL,
  `status_AR` varchar(50) DEFAULT NULL,
  `tawar` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`kodstatus`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sel_statusmohon
-- ----------------------------
INSERT INTO `sel_statusmohon` VALUES ('DIP', 'DALAM PROSES', 'IN PROCESS', null, '0');
INSERT INTO `sel_statusmohon` VALUES ('GL', 'GAGAL', 'REJECTED', null, '0');
INSERT INTO `sel_statusmohon` VALUES ('INC', 'TIDAK LENGKAP', 'INCOMPLETE', null, '0');
INSERT INTO `sel_statusmohon` VALUES ('TW', 'TAWARAN', 'OFFERED', null, '1');

-- ----------------------------
-- Table structure for `sel_subjek`
-- ----------------------------
DROP TABLE IF EXISTS `sel_subjek`;
CREATE TABLE `sel_subjek` (
  `kodsubjek` varchar(10) NOT NULL,
  `subjek_MY` varchar(100) DEFAULT NULL,
  `subjek_EN` varchar(100) DEFAULT NULL,
  `subjek_AR` varchar(100) DEFAULT NULL,
  `level` varchar(10) DEFAULT NULL COMMENT 'subjek utk peringkat pengajian, spm, stpm, dll',
  `aktif` int(1) unsigned zerofill DEFAULT '1' COMMENT '1=aktif; 0=x aktif(paparan)',
  PRIMARY KEY (`kodsubjek`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sel_subjek
-- ----------------------------
INSERT INTO `sel_subjek` VALUES ('SUB1', 'BAHASA MELAYU', null, null, 'PMR', '1');
INSERT INTO `sel_subjek` VALUES ('SUB2', 'BAHASA INGGERIS', null, null, 'PMR', '1');
INSERT INTO `sel_subjek` VALUES ('SUB3', 'GEOGRAFI', null, null, 'PMR', '1');
INSERT INTO `sel_subjek` VALUES ('SUB4', 'ILMU HISAB/I.HISAB MODEN/MATEMATIK', null, null, 'PMR', '1');
INSERT INTO `sel_subjek` VALUES ('SUB5', 'PENDIDIKAN ISLAM/PENG. AGAMA ISLAM', null, null, 'PMR', '1');
INSERT INTO `sel_subjek` VALUES ('SUB6', 'SEJARAH', null, null, 'PMR', '1');
INSERT INTO `sel_subjek` VALUES ('SUB7', 'KH BERSEPADU- EKONOMI RUMAH TANGGA', null, null, 'PMR', '1');
INSERT INTO `sel_subjek` VALUES ('SUB8', 'K.HIDUP BERSEPADU PIL. 1/2/3/4', null, null, 'PMR', '1');
INSERT INTO `sel_subjek` VALUES ('SUB9', 'KEMAHIRAN HIDUP A/B/C/D', null, null, 'PMR', '1');
INSERT INTO `sel_subjek` VALUES ('SUB10', 'KH BERSEPADU- KEMAHIRAN TEKNIKAL', null, null, 'PMR', '1');
INSERT INTO `sel_subjek` VALUES ('SUB11', 'KH BERSEPADU- PERDAGANGAN KEUSAHAWANAN', null, null, 'PMR', '1');
INSERT INTO `sel_subjek` VALUES ('SUB12', 'KH BERSEPADU-PERTANIAN', null, null, 'PMR', '1');
INSERT INTO `sel_subjek` VALUES ('SUB13', 'LUKISAN/LUKISAN TEKNIKAL', null, null, 'PMR', '1');
INSERT INTO `sel_subjek` VALUES ('SUB14', 'MUSIK', null, null, 'PMR', '1');
INSERT INTO `sel_subjek` VALUES ('SUB15', 'PERDAGANGAN', null, null, 'PMR', '1');
INSERT INTO `sel_subjek` VALUES ('SUB16', 'SAINS/ILMU SAINS/SAINS PADUAN', null, null, 'PMR', '1');
INSERT INTO `sel_subjek` VALUES ('SUB17', 'SAINS PERTANIAN', null, null, 'PMR', '1');
INSERT INTO `sel_subjek` VALUES ('SUB18', 'SAINS RUMAH TANGGA', null, null, 'PMR', '1');
INSERT INTO `sel_subjek` VALUES ('SUB19', 'SENI PERUSAHAAN', null, null, 'PMR', '1');
INSERT INTO `sel_subjek` VALUES ('SUB20', 'BAHASA ARAB', null, null, 'PMR', '1');
INSERT INTO `sel_subjek` VALUES ('SUB21', 'BAHASA CINA', null, null, 'PMR', '1');
INSERT INTO `sel_subjek` VALUES ('SUB22', 'BAHASA IBAN', null, null, 'PMR', '1');
INSERT INTO `sel_subjek` VALUES ('SUB23', 'BAHASA PERANCIS', null, null, 'PMR', '1');
INSERT INTO `sel_subjek` VALUES ('SUB24', 'BAHASA TAMIL', null, null, 'PMR', '1');
INSERT INTO `sel_subjek` VALUES ('SUB25', 'BAHASA PUNJAB', null, null, 'PMR', '1');
INSERT INTO `sel_subjek` VALUES ('SUB26', 'BAHASA TELEGU', null, null, 'PMR', '1');
INSERT INTO `sel_subjek` VALUES ('SUB27', 'LAIN-LAIN', null, null, 'PMR', '1');
INSERT INTO `sel_subjek` VALUES ('SUB28', 'PENDIDIKAN SENI', null, null, 'PMR', '1');
INSERT INTO `sel_subjek` VALUES ('SUB29', 'AKUAKULTUR DAN HAIWAN REKREASI', 'AKUAKULTUR DAN HAIWAN REKREASI', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB30', 'AMALAN BENGKEL KEJURUTERAAN', 'AMALAN BENGKEL KEJURUTERAAN', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB31', 'APLIKASI KOMPUTER DALAM PERNIAGAAN', 'APLIKASI KOMPUTER DALAM PERNIAGAAN', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB32', 'ASAS PEMPROSESAN', 'ASAS PEMPROSESAN', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB33', 'ASAS PEMPROSESAN MAKLUMAT', 'ASAS PEMPROSESAN MAKLUMAT', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB34', 'ASAS PERAKAUNAN', 'ASAS PERAKAUNAN', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB35', 'ASUHAN DAN PENDIDIKAN AWAL KANAK-KANAK', 'ASUHAN DAN PENDIDIKAN AWAL KANAK-KANAK', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB36', 'ASUHAN KANAK-KANAK', 'ASUHAN KANAK-KANAK', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB37', 'BAHASA ARAB', 'ARABIC LANGUAGE', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB38', 'BAHASA ARAB (KOMUNIKASI)', 'BAHASA ARAB (KOMUNIKASI)', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB39', 'BAHASA ARAB TINGGI', 'BAHASA ARAB TINGGI', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB40', 'BAHASA CINA', 'BAHASA CINA', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB41', 'BAHASA INGGERIS KHAS', 'BAHASA INGGERIS KHAS', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB42', 'BAHASA MALAYSIA II', 'BAHASA MALAYSIA II', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB43', 'BAHASA MELAYU (JULAI)', 'BAHASA MELAYU (JULAI)', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB44', 'BAHASA PERANCIS', 'BAHASA PERANCIS', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB45', 'BAHASA PUNJABI', 'BAHASA PUNJABI', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB46', 'BAHASA TAMIL', 'BAHASA TAMIL', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB47', 'BIBLE KNOWLEDGE', 'BIBLE KNOWLEDGE', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB48', 'BINAAN BANGUNAN', 'BINAAN BANGUNAN', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB49', 'BIOLOGI KEMANUSIAAN & KEMASYARAKATAN', 'BIOLOGI KEMANUSIAAN & KEMASYARAKATAN', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB50', 'BIOLOGI/ KAJIHAYAT', 'BIOLOGY', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB51', 'EKONOMI ASAS', 'EKONOMI ASAS', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB52', 'EKONOMI RUMAH TANGGA', 'EKONOMI RUMAH TANGGA', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB53', 'ENGLISH FOR SCIENCE AND TECHNOLOGY', 'ENGLISH FOR SCIENCE AND TECHNOLOGY', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB54', 'FIZIK', 'PHYSICS', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB55', 'GCEO', 'GCEO', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB56', 'GENERAL HOUSECRAFT', 'GENERAL HOUSECRAFT', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB57', 'GEOGRAFI', 'GEOGRAPHY', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB58', 'GERONTOLOGI ASAS DAN PERKHIDMATAN GERIATRIK', 'GERONTOLOGI ASAS DAN PERKHIDMATAN GERIATRIK', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB59', 'GRAFIK KOMPUTER', 'GRAFIK KOMPUTER', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB60', 'HIASAN DALAMAN ASAS', 'HIASAN DALAMAN ASAS', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB61', 'HORTIKULTUR HIASAN & LANDSKAP', 'HORTIKULTUR HIASAN & LANDSKAP', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB62', 'ILMU HISAB', 'ILMU HISAB', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB63', 'ILMU HISAB (SUKATAN B)', 'ILMU HISAB (SUKATAN B)', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB64', 'ILMU UKUR', 'ILMU UKUR', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB65', 'INFORMATION AND COMMUNICATION TECHNOLOGY', 'INFORMATION AND COMMUNICATION TECHNOLOGY', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB66', 'JAHITAN DAN MEMBUAT PAKAIAN', 'JAHITAN DAN MEMBUAT PAKAIAN', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB67', 'KAJIHAYAT MANUSIA DAN KEMASYARAKATAN', 'KAJIHAYAT MANUSIA DAN KEMASYARAKATAN', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB68', 'KAJISAWAT MOTOR (PETROL & DIESEL)', 'KAJISAWAT MOTOR (PETROL & DIESEL)', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB69', 'KATERING & PENYAJIAN', 'KATERING & PENYAJIAN', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB70', 'KEJENTERAAN LADANG', 'KEJENTERAAN LADANG', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB71', 'KEMAHIRAN PEJABAT DAN MENAIP', 'KEMAHIRAN PEJABAT DAN MENAIP', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB72', 'KERJA KAYU DAN BATA', 'KERJA KAYU DAN BATA', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB73', 'KERJA KAYU DAN BINAAN BANGUNAN/ TEKNOLOGI BINAAN BANGUNAN', 'KERJA KAYU DAN BINAAN BANGUNAN/ TEKNOLOGI BINAAN BANGUNAN', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB74', 'KERJA KEPINGAN LOGOM & KIMPAL/ TEKNOLOGI KIMPALAN & FABRIKASI LOGAM', 'KERJA KEPINGAN LOGOM & KIMPAL/ TEKNOLOGI KIMPALAN & FABRIKASI LOGAM', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB75', 'KERJA KIMPALAN', 'KERJA KIMPALAN', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB76', 'KERJA MENGGEGAS DAN MEMESIN', 'KERJA MENGGEGAS DAN MEMESIN', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB77', 'KERJA PAIP DOMESTIK', 'KERJA PAIP DOMESTIK', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB78', 'KERJA PENYEJUKAN & PENYAMAN UDARA', 'KERJA PENYEJUKAN & PENYAMAN UDARA', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB79', 'KESUSASTERAAN CINA', 'KESUSASTERAAN CINA', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB80', 'KESUSASTERAAN INGGERIS', 'KESUSASTERAAN INGGERIS', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB81', 'KESUSASTERAAN MELAYU', 'KESUSASTERAAN MELAYU', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB82', 'KESUSASTERAAN TAMIL', 'KESUSASTERAAN TAMIL', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB83', 'KIMIA', 'CHEMISTRY', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB84', 'KIMPALAN ARKA DAN GAS', 'KIMPALAN ARKA DAN GAS', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB85', 'LANDSKAP DAN NURSERI', 'LANDSKAP DAN NURSERI', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB86', 'LITERATURE IN ENGLISH', 'LITERATURE IN ENGLISH', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB87', 'LUKISAN', 'LUKISAN', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB88', 'LUKISAN GEOMETRI DAN AUTOMOTIF', 'LUKISAN GEOMETRI DAN AUTOMOTIF', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB89', 'LUKISAN GEOMETRI DAN BANGUNAN', 'LUKISAN GEOMETRI DAN BANGUNAN', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB90', 'LUKISAN GEOMETRI DAN BINAAN BANGUNAN', 'LUKISAN GEOMETRI DAN BINAAN BANGUNAN', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB91', 'LUKISAN GEOMETRI DAN ELEKTRIK', 'LUKISAN GEOMETRI DAN ELEKTRIK', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB92', 'LUKISAN GEOMETRI DAN ELEKTRONIK', 'LUKISAN GEOMETRI DAN ELEKTRONIK', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB93', 'LUKISAN GEOMETRI DAN FABRIKASI LOGAM', 'LUKISAN GEOMETRI DAN FABRIKASI LOGAM', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB94', 'LUKISAN GEOMETRI DAN KEJENTERAAN', 'LUKISAN GEOMETRI DAN KEJENTERAAN', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB95', 'LUKISAN GEOMETRI DAN MEMESIN', 'LUKISAN GEOMETRI DAN MEMESIN', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB96', 'LUKISAN GEOMETRI DAN MESIN', 'LUKISAN GEOMETRI DAN MESIN', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB97', 'LUKISAN GEOMETRI DAN PENYAMANAN UDARA', 'LUKISAN GEOMETRI DAN PENYAMANAN UDARA', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB98', 'LUKISAN GEOMETRI/ KEJURUTERAAN', 'LUKISAN GEOMETRI/ KEJURUTERAAN', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB99', 'LUKISAN KEJURUTERAAN MATEMATIK', 'LUKISAN KEJURUTERAAN MATEMATIK', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB100', 'MATEMATIK (JULAI)', 'MATEMATIK (JULAI)', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB101', 'MATEMATIK TAMBAHAN', 'ADDITIONAL MATHEMATICS', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB102', 'MATEMATIK/ MATEMATIK PILIHAN C', 'MATEMATIK/ MATEMATIK PILIHAN C', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB103', 'MEMBUAT PERABOT', 'MEMBUAT PERABOT', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB104', 'MEMBUAT ROTI DAN PASTRI', 'MEMBUAT ROTI DAN PASTRI', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB105', 'MENGASUH & MEMBIMBING KANAK-KANAK', 'MENGASUH & MEMBIMBING KANAK-KANAK', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB106', 'MENGGEGAS DAN MEMESIN', 'MENGGEGAS DAN MEMESIN', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB107', 'MENSERVIS & MEMBAIKI KENDERAAN', 'MENSERVIS & MEMBAIKI KENDERAAN', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB108', 'MENSERVIS AUTOMOBIL', 'MENSERVIS AUTOMOBIL', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB109', 'MENSERVIS MOTOSIKAL', 'MENSERVIS MOTOSIKAL', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB110', 'MENSERVIS PERALATAN ELEKTRIK DOMESTIK', 'MENSERVIS PERALATAN ELEKTRIK DOMESTIK', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB111', 'MENSERVIS PERALATAN PENYEJUKAN DAN PENYAMANAN UDARA', 'MENSERVIS PERALATAN PENYEJUKAN DAN PENYAMANAN UDARA', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB112', 'MENSERVIS RADIO DAN TV', 'MENSERVIS RADIO DAN TV', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB113', 'MEREKACIPTA', 'MEREKACIPTA', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB114', 'MUZIK/ PENDIDIKAN MUZIK', 'MUZIK/ PENDIDIKAN MUZIK', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB115', 'OTHER APPROVED LANGUAGE', 'OTHER APPROVED LANGUAGE', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB116', 'PEMASANGAN & KAWALAN ELEKTRIK', 'PEMASANGAN & KAWALAN ELEKTRIK', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB117', 'PEMASANGAN DAN PENYELENGGARAAN ELEKTRIK', 'PEMASANGAN DAN PENYELENGGARAAN ELEKTRIK', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB118', 'PEMBINAAN DOMESTIK', 'PEMBINAAN DOMESTIK', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB119', 'PEMPROSESAN MAKANAN', 'PEMPROSESAN MAKANAN', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB120', 'PEMPROSESAN MAKLUMAT', 'PEMPROSESAN MAKLUMAT', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB121', 'PENDAWAIAN DOMESTIK', 'PENDAWAIAN DOMESTIK', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB122', 'PENDIDIKAN AL-QURAN & AL-SUNNAH', 'PENDIDIKAN AL-QURAN & AL-SUNNAH', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB123', 'PENDIDIKAN ISLAM', 'PENDIDIKAN ISLAM', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB124', 'PENDIDIKAN SENI', 'PENDIDIKAN SENI', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB125', 'PENDIDIKAN SENI VISUAL', 'PENDIDIKAN SENI VISUAL', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB126', 'PENDIDIKAN SYARIAH ISLAMIAH', 'PENDIDIKAN SYARIAH ISLAMIAH', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB127', 'PENGAJIAN AGROTEKNOLOGI', 'PENGAJIAN AGROTEKNOLOGI', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB128', 'PENGAJIAN HAL EHWAL MALAYSIA', 'PENGAJIAN HAL EHWAL MALAYSIA', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB129', 'PENGAJIAN KEJURUTERAAN', 'PENGAJIAN KEJURUTERAAN', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB130', 'PENGAJIAN KEJURUTERAAN AWAM', 'PENGAJIAN KEJURUTERAAN AWAM', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB131', 'PENGAJIAN KEJURUTERAAN ELEKTRIK/ ELEKTRONIK', 'PENGAJIAN KEJURUTERAAN ELEKTRIK/ ELEKTRONIK', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB132', 'PENGAJIAN KEJURUTERAAN JENTERA', 'PENGAJIAN KEJURUTERAAN JENTERA', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB133', 'PENGAJIAN KEJURUTERAAN MEKANIKAL', 'PENGAJIAN KEJURUTERAAN MEKANIKAL', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB134', 'PENGAJIAN KEMASYARAKATAN', 'PENGAJIAN KEMASYARAKATAN', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB135', 'PENGAJIAN KEUSAHAWANAN', 'PENGAJIAN KEUSAHAWANAN', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB136', 'PENGAJIAN PAKAIAN', 'PENGAJIAN PAKAIAN', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB137', 'PENGAJIAN PERDAGANGAN', 'PENGAJIAN PERDAGANGAN', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB138', 'PENGAJIAN PERKEMBANGAN KANAK-KANAK', 'PENGAJIAN PERKEMBANGAN KANAK-KANAK', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB139', 'PENGELUARAN TANAMAN', 'PENGELUARAN TANAMAN', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB140', 'PENGELUARAN TERNAKAN', 'PENGELUARAN TERNAKAN', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB141', 'PENGETAHUAN AGAMA ISLAM', 'PENGETAHUAN AGAMA ISLAM', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB142', 'PENGETAHUAN AGAMA ISLAM TINGGI', 'PENGETAHUAN AGAMA ISLAM TINGGI', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB143', 'PENGETAHUAN MORAL', 'PENGETAHUAN MORAL', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB144', 'PENGETAHUAN SAINS SUKAN', 'PENGETAHUAN SAINS SUKAN', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB145', 'PENGURUSAN LADANG', 'PENGURUSAN LADANG', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB146', 'PENGURUSAN MAKANAN', 'PENGURUSAN MAKANAN', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB147', 'PENJAGAAN MUKA DAN DANDANAN RAMBUT', 'PENJAGAAN MUKA DAN DANDANAN RAMBUT', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB148', 'PENYAMAN UDARA & PENYEJUKAN / TEKNOLOGI PENYEJUKAN DAN PENYAMAN UDARA', 'PENYAMAN UDARA & PENYEJUKAN / TEKNOLOGI PENYEJUKAN DAN PENYAMAN UDARA', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB149', 'PENYEDIAAN & PERKHIDMATAN MAKANAN', 'PENYEDIAAN & PERKHIDMATAN MAKANAN', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB150', 'PERAKAUNAN PERNIAGAAN', 'PERAKAUNAN PERNIAGAAN', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB151', 'PERDAGANGAN', 'PERDAGANGAN', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB152', 'PERKHIDMATAN AWAL KANAK-KANAK', 'PERKHIDMATAN AWAL KANAK-KANAK', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB153', 'PERNIAGAAN DAN KEUSAHAWANAN', 'PERNIAGAAN DAN KEUSAHAWANAN', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB154', 'PERSOLEKAN & MENDANDAN RAMBUT/ TEKNOLOGI SENI KECANTIKAN', 'PERSOLEKAN & MENDANDAN RAMBUT/ TEKNOLOGI SENI KECANTIKAN', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB155', 'PERTANIAN/ PENGURUSAN LADANGAN/ SAINS PERTANIAN', 'PERTANIAN/ PENGURUSAN LADANGAN/ SAINS PERTANIAN', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB156', 'PERTUKANGAN KAYU', 'PERTUKANGAN KAYU', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB157', 'PERTUKANGAN LOGAM/ PERTUKANGAN LOGAM (KEJURUTERAAN)', 'PERTUKANGAN LOGAM/ PERTUKANGAN LOGAM (KEJURUTERAAN)', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB158', 'PRINSIP AKAUN/ ASAS PERAKAUNAN', 'PRINSIP AKAUN/ ASAS PERAKAUNAN', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB159', 'PRINSIP PERNIAGAAN', 'PRINSIP PERNIAGAAN', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB160', 'PRODUKSI MULTIMEDIA', 'PRODUKSI MULTIMEDIA', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB161', 'PROGRAMMING AND DEVELOPMENT TOOLS', 'PROGRAMMING AND DEVELOPMENT TOOLS', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB162', 'RADIO, TV DAN ELEKTRONIK', 'RADIO, TV DAN ELEKTRONIK', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB163', 'RAMPAIAN SAINS', 'RAMPAIAN SAINS', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB164', 'RAMPAIAN SAINS TAMBAHAN', 'RAMPAIAN SAINS TAMBAHAN', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB165', 'REKA CIPTA', 'REKA CIPTA', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB166', 'REKAAN DAN JAHITAN PAKAIAN', 'REKAAN DAN JAHITAN PAKAIAN', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB167', 'REKAAN FESYEN & MEMBUAT PAKAIAN', 'REKAAN FESYEN & MEMBUAT PAKAIAN', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB168', 'SAINS', 'SCIENCE', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB169', 'SAINS FIZIKAL', 'SAINS FIZIKAL', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB170', 'SAINS KEJURUTERAAN', 'SAINS KEJURUTERAAN', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB171', 'SAINS KESIHATAN', 'SAINS KESIHATAN', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB172', 'SAINS PERTANIAN', 'SAINS PERTANIAN', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB173', 'SAINS RUMAHTANGGA', 'SAINS RUMAHTANGGA', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB174', 'SAINS TAMBAHAN', 'SAINS TAMBAHAN', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB175', 'SEJARAH', 'HISTORY', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB176', 'SENI REKA TANDA', 'SENI REKA TANDA', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB177', 'TANAMAN MAKANAN', 'TANAMAN MAKANAN', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB178', 'TASAWWUR ISLAM', 'TASAWWUR ISLAM', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB179', 'TEKNOLOGI AUTOMOTIF', 'TEKNOLOGI AUTOMOTIF', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB180', 'TEKNOLOGI BAKERI & KONFEKSIONERI', 'TEKNOLOGI BAKERI & KONFEKSIONERI', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB181', 'TEKNOLOGI BENGKEL MESIN', 'TEKNOLOGI BENGKEL MESIN', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB182', 'TEKNOLOGI BINAAN BANGUNAN', 'TEKNOLOGI BINAAN BANGUNAN', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB183', 'TEKNOLOGI ELEKTRIK', 'TEKNOLOGI ELEKTRIK', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB184', 'TEKNOLOGI ELEKTRONIK', 'TEKNOLOGI ELEKTRONIK', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB185', 'TEKNOLOGI KATERING', 'TEKNOLOGI KATERING', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB186', 'TEKNOLOGI KEJURUTERAAN', 'TEKNOLOGI KEJURUTERAAN', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB187', 'TEKNOLOGI KIMPALAN DAN FABRIKASI LOGAM', 'TEKNOLOGI KIMPALAN DAN FABRIKASI LOGAM', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB188', 'TEKNOLOGI MAKLUMAT', 'TEKNOLOGI MAKLUMAT', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB189', 'TEKNOLOGI PENYEJUKAN DAN PENYAMANAN UDARA', 'TEKNOLOGI PENYEJUKAN DAN PENYAMANAN UDARA', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB190', 'TEKNOLOGI REKAAN FESYEN DAN MEMBUAT PAKAIAN', 'TEKNOLOGI REKAAN FESYEN DAN MEMBUAT PAKAIAN', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB191', 'TEKNOLOGI SENI KECANTIKAN', 'TEKNOLOGI SENI KECANTIKAN', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB192', 'TRENGKAS', 'TRENGKAS', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB193', 'MATEMATIK', 'MATHEMATICS', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB194', 'BAHASA MELAYU', 'BAHASA MELAYU', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB195', 'BAHASA INGGERIS', 'ENGLISH', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB196', 'BAHASA INGGERIS KOMUNIKASI', 'ENGLISH (COMMUNICATION)', null, 'SPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB197', 'ARUDH DAN QAFIYAH', null, null, 'STAM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB198', 'ADAB DAN NUSUS', null, null, 'STAM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB199', 'AL-QURANUL KARIM', null, null, 'STAM', '0');
INSERT INTO `sel_subjek` VALUES ('SUB200', 'AYAT AHKAM & HADITH AHKAM', null, null, 'STAM', '0');
INSERT INTO `sel_subjek` VALUES ('SUB201', 'BAHASA INGGERIS', null, null, 'STAM', '0');
INSERT INTO `sel_subjek` VALUES ('SUB202', 'BAHASA MELAYU', null, null, 'STAM', '0');
INSERT INTO `sel_subjek` VALUES ('SUB203', 'BALAGHAH', null, null, 'STAM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB204', 'FEQAH & FARAID', null, null, 'STAM', '0');
INSERT INTO `sel_subjek` VALUES ('SUB205', 'FIQH', null, null, 'STAM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB206', 'FIQH & USUL FIQH', null, null, 'STAM', '0');
INSERT INTO `sel_subjek` VALUES ('SUB207', 'HADITH DAN MUSTOLAH', null, null, 'STAM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB208', 'HIFZ AL-QURAN DAN TAJWID', null, null, 'STAM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB209', 'ILMU LOGIKA', null, null, 'STAM', '0');
INSERT INTO `sel_subjek` VALUES ('SUB210', 'ILMU RETORIKA', null, null, 'STAM', '0');
INSERT INTO `sel_subjek` VALUES ('SUB211', 'INSYA', null, null, 'STAM', '0');
INSERT INTO `sel_subjek` VALUES ('SUB212', 'INSYA MUTALAAH', null, null, 'STAM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB213', 'KARANGAN DAN TERJEMAHAN', null, null, 'STAM', '0');
INSERT INTO `sel_subjek` VALUES ('SUB214', 'KESUSASTERAAN ARAB', null, null, 'STAM', '0');
INSERT INTO `sel_subjek` VALUES ('SUB215', 'MANTIQ', null, null, 'STAM', '0');
INSERT INTO `sel_subjek` VALUES ('SUB216', '$MUTALA AH', null, null, 'STAM', '0');
INSERT INTO `sel_subjek` VALUES ('SUB217', 'MUTALAAH', null, null, 'STAM', '0');
INSERT INTO `sel_subjek` VALUES ('SUB218', 'NAHU', null, null, 'STAM', '0');
INSERT INTO `sel_subjek` VALUES ('SUB219', 'NAHU & SARF', null, null, 'STAM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB220', 'NAHU SORROF', null, null, 'STAM', '0');
INSERT INTO `sel_subjek` VALUES ('SUB221', 'SARF', null, null, 'STAM', '0');
INSERT INTO `sel_subjek` VALUES ('SUB222', 'SEJARAH ISLAM', null, null, 'STAM', '0');
INSERT INTO `sel_subjek` VALUES ('SUB223', 'TAFSIR DAN ULUMUHU', null, null, 'STAM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB224', 'TAMADUN ISLAM', null, null, 'STAM', '0');
INSERT INTO `sel_subjek` VALUES ('SUB225', 'TARIKH ADAB & NUSUS', null, null, 'STAM', '0');
INSERT INTO `sel_subjek` VALUES ('SUB226', 'TATABAHASA ARAB', null, null, 'STAM', '0');
INSERT INTO `sel_subjek` VALUES ('SUB227', 'TAUHID DAN MANTIQ', null, null, 'STAM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB228', 'UJIAN LISAN', null, null, 'STAM', '0');
INSERT INTO `sel_subjek` VALUES ('SUB229', 'USUL FEQAH & QAWAID FIQHIAH', null, null, 'STAM', '0');
INSERT INTO `sel_subjek` VALUES ('SUB230', 'BAHASA ARAB', 'ARABIC LANGUAGE', null, 'STPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB231', 'BAHASA CINA', 'CHINES LANGUAGE', null, 'STPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB232', 'BAHASA MELAYU', 'BAHASA MELAYU', null, 'STPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB233', 'BAHASA TAMIL', 'TAMIL LANGUAGE', null, 'STPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB234', 'BIOLOGI', 'BIOLOGY', null, 'STPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB235', 'EKONOMI', 'ECONOMY', null, 'STPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB236', 'ENGLISH', 'ENGLISH', null, 'STPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB237', 'FIZIK', 'PHYSICS', null, 'STPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB238', 'GEOGRAFI', 'GEOGRAPHY', null, 'STPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB239', 'KERTAS AM', 'KERTAS AM', null, 'STPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB240', 'KESUSASTERAAN MELAYU', 'KESUSASTERAAN MELAYU', null, 'STPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB241', 'KESUSATERAAN INGGERIS', 'KESUSATERAAN INGGERIS', null, 'STPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB242', 'KIMIA', 'CHEMISTRY', null, 'STPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB243', 'LITERATURE IN ENGLISH', 'LITERATURE IN ENGLISH', null, 'STPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB244', 'LUKISAN', 'LUKISAN', null, 'STPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB245', 'MATEMATIK LANJUTAN', 'MATEMATIK LANJUTAN', null, 'STPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB246', 'MATEMATIK LANJUTAN T', 'MATEMATIK LANJUTAN T', null, 'STPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB247', 'MATEMATIK S', 'MATHEMATICS S', null, 'STPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB248', 'MATEMATIK T', 'MATHEMATICS T', null, 'STPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB249', 'PENGAJIAN AM', 'PENGAJIAN AM', null, 'STPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB250', 'PENGAJIAN ISLAM', 'ISLAMIC STUDY', null, 'STPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB251', 'PENGAJIAN PERNIAGAAN', 'BUSINESS STUDY', null, 'STPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB252', 'PENGKOMPUTERAN', 'COMPUTING', null, 'STPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB253', 'PERAKAUNAN', 'ACCOUNTING', null, 'STPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB254', 'SEJARAH', 'HISTORY', null, 'STPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB255', 'SENI VISUAL', 'SENI VISUAL', null, 'STPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB256', 'SYARIAH', 'SYARIAH', null, 'STPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB257', 'USULUDDIN', 'USULUDDIN', null, 'STPM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB258', 'MATEMATIK', 'MATHEMATICS', null, 'MATRIK', '1');
INSERT INTO `sel_subjek` VALUES ('SUB259', 'KIMIA', 'CHEMISTRY', null, 'MATRIK', '1');
INSERT INTO `sel_subjek` VALUES ('SUB260', 'FIZIK', 'PHYSICS ', null, 'MATRIK', '1');
INSERT INTO `sel_subjek` VALUES ('SUB261', 'BIOLOGI', 'BIOLOGY', null, 'MATRIK', '1');
INSERT INTO `sel_subjek` VALUES ('SUB262', 'SAINS KOMPUTER', 'COMPUTER SCIENCE', null, 'MATRIK', '0');
INSERT INTO `sel_subjek` VALUES ('SUB263', 'BIOLOGI', 'BIOLOGY', '', 'MUFY', '1');
INSERT INTO `sel_subjek` VALUES ('SUB264', 'KIMIA', 'CHEMISTRY', '', 'MUFY', '1');
INSERT INTO `sel_subjek` VALUES ('SUB265', 'FIZIK', 'PHYSICS ', '', 'MUFY', '1');
INSERT INTO `sel_subjek` VALUES ('SUB266', 'MATEMATIK', 'MATHEMATICS', '', 'MUFY', '1');
INSERT INTO `sel_subjek` VALUES ('SUB267', 'BIOLOGI', 'BIOLOGY', '', 'AP', '1');
INSERT INTO `sel_subjek` VALUES ('SUB268', 'KIMIA', 'CHEMISTRY', '', 'AP', '1');
INSERT INTO `sel_subjek` VALUES ('SUB269', 'FIZIK', 'PHYSICS ', '', 'AP', '1');
INSERT INTO `sel_subjek` VALUES ('SUB270', 'MATEMATIK', 'MATHEMATICS', '', 'AP', '1');
INSERT INTO `sel_subjek` VALUES ('SUB271', 'BIOLOGI', 'BIOLOGY', '', 'ALEVEL', '1');
INSERT INTO `sel_subjek` VALUES ('SUB272', 'KIMIA', 'CHEMISTRY', '', 'ALEVEL', '1');
INSERT INTO `sel_subjek` VALUES ('SUB273', 'FIZIK', 'PHYSICS ', '', 'ALEVEL', '1');
INSERT INTO `sel_subjek` VALUES ('SUB274', 'MATEMATIK', 'MATHEMATICS', '', 'ALEVEL', '1');
INSERT INTO `sel_subjek` VALUES ('SUB275', 'BIOLOGI', 'BIOLOGY', '', 'CIMP', '1');
INSERT INTO `sel_subjek` VALUES ('SUB276', 'KIMIA', 'CHEMISTRY', '', 'CIMP', '1');
INSERT INTO `sel_subjek` VALUES ('SUB277', 'FIZIK', 'PHYSICS ', '', 'CIMP', '1');
INSERT INTO `sel_subjek` VALUES ('SUB278', 'MATEMATIK', 'MATHEMATICS', '', 'CIMP', '1');
INSERT INTO `sel_subjek` VALUES ('SUB279', 'BIOLOGI', 'BIOLOGY', '', 'CPU', '1');
INSERT INTO `sel_subjek` VALUES ('SUB280', 'KIMIA', 'CHEMISTRY', '', 'CPU', '1');
INSERT INTO `sel_subjek` VALUES ('SUB281', 'FIZIK', 'PHYSICS ', '', 'CPU', '1');
INSERT INTO `sel_subjek` VALUES ('SUB282', 'MATEMATIK', 'MATHEMATICS', '', 'CPU', '1');
INSERT INTO `sel_subjek` VALUES ('SUB283', 'BIOLOGI', 'BIOLOGY', '', 'HSCSA', '1');
INSERT INTO `sel_subjek` VALUES ('SUB284', 'KIMIA', 'CHEMISTRY', '', 'HSCSA', '1');
INSERT INTO `sel_subjek` VALUES ('SUB285', 'FIZIK', 'PHYSICS ', '', 'HSCSA', '1');
INSERT INTO `sel_subjek` VALUES ('SUB286', 'MATEMATIK', 'MATHEMATICS', '', 'HSCSA', '1');
INSERT INTO `sel_subjek` VALUES ('SUB287', 'BIOLOGI', 'BIOLOGY', '', 'IPU', '1');
INSERT INTO `sel_subjek` VALUES ('SUB288', 'KIMIA', 'CHEMISTRY', '', 'IPU', '1');
INSERT INTO `sel_subjek` VALUES ('SUB289', 'FIZIK', 'PHYSICS ', '', 'IPU', '1');
INSERT INTO `sel_subjek` VALUES ('SUB290', 'MATEMATIK', 'MATHEMATICS', '', 'IPU', '1');
INSERT INTO `sel_subjek` VALUES ('SUB291', 'BIOLOGI', 'BIOLOGY', '', 'IB', '1');
INSERT INTO `sel_subjek` VALUES ('SUB292', 'KIMIA', 'CHEMISTRY', '', 'IB', '1');
INSERT INTO `sel_subjek` VALUES ('SUB293', 'FIZIK', 'PHYSICS ', '', 'IB', '1');
INSERT INTO `sel_subjek` VALUES ('SUB294', 'MATEMATIK', 'MATHEMATICS', '', 'IB', '1');
INSERT INTO `sel_subjek` VALUES ('SUB295', 'BIOLOGI', 'BIOLOGY', '', 'NZB', '1');
INSERT INTO `sel_subjek` VALUES ('SUB296', 'KIMIA', 'CHEMISTRY', '', 'NZB', '1');
INSERT INTO `sel_subjek` VALUES ('SUB297', 'FIZIK', 'PHYSICS ', '', 'NZB', '1');
INSERT INTO `sel_subjek` VALUES ('SUB298', 'MATEMATIK', 'MATHEMATICS', '', 'NZB', '1');
INSERT INTO `sel_subjek` VALUES ('SUB299', 'BIOLOGI', 'BIOLOGY', '', 'OLEVEL', '1');
INSERT INTO `sel_subjek` VALUES ('SUB300', 'KIMIA', 'CHEMISTRY', '', 'OLEVEL', '1');
INSERT INTO `sel_subjek` VALUES ('SUB301', 'FIZIK', 'PHYSICS ', '', 'OLEVEL', '1');
INSERT INTO `sel_subjek` VALUES ('SUB302', 'MATEMATIK', 'MATHEMATICS', '', 'OLEVEL', '1');
INSERT INTO `sel_subjek` VALUES ('SUB303', 'MATEMATIK TAMBAHAN', 'ADDITIONAL MATHEMATICS', null, 'OLEVEL', '1');
INSERT INTO `sel_subjek` VALUES ('SUB304', 'BIOLOGI', 'BIOLOGY', '', 'SAM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB305', 'KIMIA', 'CHEMISTRY', '', 'SAM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB306', 'FIZIK', 'PHYSICS ', '', 'SAM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB307', 'MATEMATIK', 'MATHEMATICS', '', 'SAM', '1');
INSERT INTO `sel_subjek` VALUES ('SUB308', 'BIOLOGI', 'BIOLOGY', '', 'AUFP', '1');
INSERT INTO `sel_subjek` VALUES ('SUB309', 'KIMIA', 'CHEMISTRY', '', 'AUFP', '1');
INSERT INTO `sel_subjek` VALUES ('SUB310', 'FIZIK', 'PHYSICS ', '', 'AUFP', '1');
INSERT INTO `sel_subjek` VALUES ('SUB311', 'MATEMATIK', 'MATHEMATICS', '', 'AUFP', '1');
INSERT INTO `sel_subjek` VALUES ('SUB312', 'BIOLOGI', 'BIOLOGY', '', 'FOUND', '1');
INSERT INTO `sel_subjek` VALUES ('SUB313', 'KIMIA', 'CHEMISTRY', '', 'FOUND', '1');
INSERT INTO `sel_subjek` VALUES ('SUB314', 'FIZIK', 'PHYSICS ', '', 'FOUND', '1');
INSERT INTO `sel_subjek` VALUES ('SUB315', 'MATEMATIK', 'MATHEMATICS', '', 'FOUND', '1');
INSERT INTO `sel_subjek` VALUES ('SUB316', 'BIOLOGI', 'BIOLOGY', '', 'NCEA', '1');
INSERT INTO `sel_subjek` VALUES ('SUB317', 'KIMIA', 'CHEMISTRY', '', 'NCEA', '1');
INSERT INTO `sel_subjek` VALUES ('SUB318', 'FIZIK', 'PHYSICS ', '', 'NCEA', '1');
INSERT INTO `sel_subjek` VALUES ('SUB319', 'MATEMATIK', 'MATHEMATICS', '', 'NCEA', '1');
INSERT INTO `sel_subjek` VALUES ('SUB320', 'BIOLOGI', 'BIOLOGY', '', 'PREMEDIC', '1');
INSERT INTO `sel_subjek` VALUES ('SUB321', 'KIMIA', 'CHEMISTRY', '', 'PREMEDIC', '1');
INSERT INTO `sel_subjek` VALUES ('SUB322', 'FIZIK', 'PHYSICS ', '', 'PREMEDIC', '1');
INSERT INTO `sel_subjek` VALUES ('SUB323', 'MATEMATIK', 'MATHEMATICS', '', 'PREMEDIC', '1');
INSERT INTO `sel_subjek` VALUES ('SUB324', 'BIOLOGI', 'BIOLOGY', '', 'UEC', '1');
INSERT INTO `sel_subjek` VALUES ('SUB325', 'KIMIA', 'CHEMISTRY', '', 'UEC', '1');
INSERT INTO `sel_subjek` VALUES ('SUB326', 'FIZIK', 'PHYSICS ', '', 'UEC', '1');
INSERT INTO `sel_subjek` VALUES ('SUB327', 'MATEMATIK', 'MATHEMATICS', '', 'UEC', '1');
INSERT INTO `sel_subjek` VALUES ('SUB328', 'MATEMATIK TAMBAHAN', 'ADDITIONAL MATHEMATICS', '', 'UEC', '1');
INSERT INTO `sel_subjek` VALUES ('SUB329', 'BIOLOGI', 'BIOLOGY', '', 'WACC', '1');
INSERT INTO `sel_subjek` VALUES ('SUB330', 'KIMIA', 'CHEMISTRY', '', 'WACC', '1');
INSERT INTO `sel_subjek` VALUES ('SUB331', 'FIZIK', 'PHYSICS ', '', 'WACC', '1');
INSERT INTO `sel_subjek` VALUES ('SUB332', 'MATEMATIK', 'MATHEMATICS', '', 'WACC', '1');
INSERT INTO `sel_subjek` VALUES ('SUB333', 'BIOLOGI', 'BIOLOGY', '', 'VCE', '1');
INSERT INTO `sel_subjek` VALUES ('SUB334', 'KIMIA', 'CHEMISTRY', '', 'VCE', '1');
INSERT INTO `sel_subjek` VALUES ('SUB335', 'FIZIK', 'PHYSICS ', '', 'VCE', '1');
INSERT INTO `sel_subjek` VALUES ('SUB336', 'MATEMATIK', 'MATHEMATICS', '', 'VCE', '1');
INSERT INTO `sel_subjek` VALUES ('SUB337', 'BIOLOGI', 'BIOLOGY', '', 'UNSW', '1');
INSERT INTO `sel_subjek` VALUES ('SUB338', 'KIMIA', 'CHEMISTRY', '', 'UNSW', '1');
INSERT INTO `sel_subjek` VALUES ('SUB339', 'FIZIK', 'PHYSICS ', '', 'UNSW', '1');
INSERT INTO `sel_subjek` VALUES ('SUB340', 'MATEMATIK', 'MATHEMATICS', '', 'UNSW', '1');
INSERT INTO `sel_subjek` VALUES ('SUB341', 'BIOLOGI', 'BIOLOGY', '', 'UECHIGH', '1');
INSERT INTO `sel_subjek` VALUES ('SUB342', 'KIMIA', 'CHEMISTRY', '', 'UECHIGH', '1');
INSERT INTO `sel_subjek` VALUES ('SUB343', 'FIZIK', 'PHYSICS ', '', 'UECHIGH', '1');
INSERT INTO `sel_subjek` VALUES ('SUB344', 'MATEMATIK', 'MATHEMATICS', '', 'UECHIGH', '1');
INSERT INTO `sel_subjek` VALUES ('SUB345', 'MATEMATIK TAMBAHAN', 'ADDITIONAL MATHEMATICS', '', 'UECHIGH', '1');
INSERT INTO `sel_subjek` VALUES ('SUB346', 'BIOLOGI', 'BIOLOGY', '', 'TCFS', '1');
INSERT INTO `sel_subjek` VALUES ('SUB347', 'KIMIA', 'CHEMISTRY', '', 'TCFS', '1');
INSERT INTO `sel_subjek` VALUES ('SUB348', 'FIZIK', 'PHYSICS ', '', 'TCFS', '1');
INSERT INTO `sel_subjek` VALUES ('SUB349', 'MATEMATIK', 'MATHEMATICS', '', 'TCFS', '1');

-- ----------------------------
-- Table structure for `sel_warga`
-- ----------------------------
DROP TABLE IF EXISTS `sel_warga`;
CREATE TABLE `sel_warga` (
  `kodwarga` int(11) DEFAULT NULL,
  `warga_MY` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `warga_EN` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `warga_AR` varchar(20) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of sel_warga
-- ----------------------------
INSERT INTO `sel_warga` VALUES ('1', 'MALAYSIAN', 'WARGANEGARA', null);
INSERT INTO `sel_warga` VALUES ('2', 'NON MALAYSIAN', 'BUKAN WARGANEGARA', null);
INSERT INTO `sel_warga` VALUES ('3', 'PERMANENT RESIDENT', 'PENDUDUK TETAP (PR)', null);
INSERT INTO `sel_warga` VALUES ('4', 'TEMPORARY', 'SEMENTARA', null);

-- ----------------------------
-- Table structure for `sesi_akademik`
-- ----------------------------
DROP TABLE IF EXISTS `sesi_akademik`;
CREATE TABLE `sesi_akademik` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `kodsesi` varchar(20) DEFAULT NULL,
  `namasesi_MY` varchar(50) DEFAULT NULL,
  `tahun` year(4) DEFAULT NULL,
  `tarikh_mula` date DEFAULT NULL,
  `tarikh_tamat` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sesi_akademik
-- ----------------------------
INSERT INTO `sesi_akademik` VALUES ('1', '2012_1', 'JANUARI-JUN 2012', '2012', '2011-12-31', '2012-06-29');
INSERT INTO `sesi_akademik` VALUES ('2', '2012_2', 'JULAI-DISEMBER 2012', '2012', '2012-06-30', '2013-01-04');
INSERT INTO `sesi_akademik` VALUES ('3', '2013_1', 'JANUARI-JUN 2013', '2013', '2013-01-06', '2013-06-30');
INSERT INTO `sesi_akademik` VALUES ('4', '2013_2', 'JULAI-DISEMBER 2013', '2013', '2012-06-30', '2013-01-04');

-- ----------------------------
-- Table structure for `sesi_intake`
-- ----------------------------
DROP TABLE IF EXISTS `sesi_intake`;
CREATE TABLE `sesi_intake` (
  `kodsesi` varchar(10) NOT NULL,
  `kodmula` varchar(10) DEFAULT NULL,
  `siri` int(4) unsigned zerofill DEFAULT NULL,
  `tarikh_mula` date DEFAULT NULL,
  `tarikh_tamat` date DEFAULT NULL,
  `tarikh_daftar` date DEFAULT NULL,
  `aktif` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`kodsesi`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sesi_intake
-- ----------------------------
INSERT INTO `sesi_intake` VALUES ('2013_1', 'P131', '0010', '2012-06-01', '2012-12-31', '2012-12-31', '1');
INSERT INTO `sesi_intake` VALUES ('2014_1', 'P141', '0001', '2013-06-01', '2013-12-31', '2013-12-31', '0');
INSERT INTO `sesi_intake` VALUES ('2015_1', 'P151', '0001', '2014-06-01', '2014-12-31', '2015-01-05', '0');

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
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

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

-- ----------------------------
-- Table structure for `siri_invois`
-- ----------------------------
DROP TABLE IF EXISTS `siri_invois`;
CREATE TABLE `siri_invois` (
  `kod_mula` varchar(4) NOT NULL DEFAULT '',
  `siri` int(4) unsigned zerofill DEFAULT NULL,
  `aktif` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`kod_mula`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of siri_invois
-- ----------------------------
INSERT INTO `siri_invois` VALUES ('2012', '0001', '0');
INSERT INTO `siri_invois` VALUES ('2013', '0001', '1');

-- ----------------------------
-- Table structure for `siri_matrik`
-- ----------------------------
DROP TABLE IF EXISTS `siri_matrik`;
CREATE TABLE `siri_matrik` (
  `kod_mula` varchar(5) DEFAULT NULL,
  `siri` int(5) DEFAULT NULL,
  `aktif` tinyint(1) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of siri_matrik
-- ----------------------------
INSERT INTO `siri_matrik` VALUES ('2012', '1', '1');

-- ----------------------------
-- Table structure for `spm_gred_year`
-- ----------------------------
DROP TABLE IF EXISTS `spm_gred_year`;
CREATE TABLE `spm_gred_year` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `kod_gred` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `thn_mula` int(10) DEFAULT NULL,
  `thn_akhir` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of spm_gred_year
-- ----------------------------
INSERT INTO `spm_gred_year` VALUES ('1', 'S1', '0', '1999');
INSERT INTO `spm_gred_year` VALUES ('2', 'S2', '2000', '2008');
INSERT INTO `spm_gred_year` VALUES ('3', 'S3', '2009', '99999');

-- ----------------------------
-- Table structure for `subjek`
-- ----------------------------
DROP TABLE IF EXISTS `subjek`;
CREATE TABLE `subjek` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `kodsubjek` varchar(10) NOT NULL,
  `namasubjek_MY` varchar(100) DEFAULT NULL,
  `namasubjek_EN` varchar(100) DEFAULT NULL,
  `namasubjek_AR` varchar(100) DEFAULT NULL,
  `kredit` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=68 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of subjek
-- ----------------------------
INSERT INTO `subjek` VALUES ('1', 'MPW 1113', 'BAHASA KEBANGSAAN A', null, null, '3');
INSERT INTO `subjek` VALUES ('2', 'MPW 1123', 'BAHASA KEBANGSAAN B', null, null, '3');
INSERT INTO `subjek` VALUES ('3', 'MPW 1133', 'PENGAJIAN MALAYSIA', null, null, '3');
INSERT INTO `subjek` VALUES ('4', 'MPW 1143', 'PENGAJIAN ISLAM', null, null, '3');
INSERT INTO `subjek` VALUES ('5', 'WI 1101', 'BAHASA INGGERIS 1', null, null, '2');
INSERT INTO `subjek` VALUES ('6', 'WI 1102', 'BAHASA INGGERIS 2', null, null, '2');
INSERT INTO `subjek` VALUES ('7', 'WI 1103', 'BAHASA INGGERIS 3', null, null, '2');
INSERT INTO `subjek` VALUES ('8', 'WI 1104', 'BAHASA ARAB (PENGENALAN BAHASA ARAB)', null, null, '2');
INSERT INTO `subjek` VALUES ('9', 'WI 1105', 'BAHASA ARAB 2 (ASAS BAHASA ARAB)', null, null, '2');
INSERT INTO `subjek` VALUES ('10', 'WI 1106', 'TEKNOLOGI MAKLUMAT', null, null, '2');
INSERT INTO `subjek` VALUES ('11', 'WI 1107', 'TEKNOLOGI MAKLUMAT', null, null, '2');
INSERT INTO `subjek` VALUES ('12', 'WI 1108', 'KERJA KURSUS & METODOLOGINYA', null, null, '4');
INSERT INTO `subjek` VALUES ('13', 'US 1201', 'AL-QURAN & AYAT ALAM 1', null, null, '3');
INSERT INTO `subjek` VALUES ('14', 'US 1202', 'PENGANTAR PEMIKIRAN ISLAM', null, null, '3');
INSERT INTO `subjek` VALUES ('15', 'US 1203', 'TASAWWUF', null, null, '3');
INSERT INTO `subjek` VALUES ('16', 'US 1204', 'MANTIQ', null, null, '3');
INSERT INTO `subjek` VALUES ('17', 'US 1205', 'DAKWAH & PENDAKWAH', null, null, '3');
INSERT INTO `subjek` VALUES ('18', 'US 1206', 'SENI PIDATO', null, null, '3');
INSERT INTO `subjek` VALUES ('19', 'US 1207', 'FALSAFAH & ALIRAN PEMIKIRAN', null, null, '3');
INSERT INTO `subjek` VALUES ('20', 'US 1208', 'PERBANDINGAN AGAMA', null, null, '3');
INSERT INTO `subjek` VALUES ('21', 'US 1209', 'INSTITUSI KEKELUARGAAN ISLAM', null, null, '3');
INSERT INTO `subjek` VALUES ('22', 'US 1210', 'FIRAQ DALAM ISLAM', null, null, '3');
INSERT INTO `subjek` VALUES ('23', 'US 1211', 'AQIDAH ISLAMIAH 1 (ILAHIYAT)', null, null, '3');
INSERT INTO `subjek` VALUES ('24', 'US 1212', 'AQIDAH ISLAMIYAH 2', null, null, '3');
INSERT INTO `subjek` VALUES ('25', 'US 1213', 'AQIDAH ISLAMIYAH 3', null, null, '3');
INSERT INTO `subjek` VALUES ('26', 'US 1301', 'DUNIA ISLAM MASA KINI', null, null, '3');
INSERT INTO `subjek` VALUES ('27', 'US 1302', 'PSIKOLOGI', null, null, '3');
INSERT INTO `subjek` VALUES ('28', 'US 1303', 'FALSAFAH ISLAM', null, null, '3');
INSERT INTO `subjek` VALUES ('29', 'US 1304', 'SOSIOLOGI', null, null, '3');
INSERT INTO `subjek` VALUES ('30', 'SY 1202', 'AL-QURAN & AYAT HUKUM 2', null, null, '3');
INSERT INTO `subjek` VALUES ('31', 'SY 1203', 'AL-QURAN & AYAT HUKUM 3', null, null, '3');
INSERT INTO `subjek` VALUES ('32', 'SY 1204', 'HADIS HUKUM 1', null, null, '3');
INSERT INTO `subjek` VALUES ('33', 'SY 1205', 'HADIS HUKUM 2', null, null, '3');
INSERT INTO `subjek` VALUES ('34', 'SY 1206', 'FIQH 1 (IBADAT &MUAMALAT)', null, null, '3');
INSERT INTO `subjek` VALUES ('35', 'SY 1207', 'FIQH 2 (MUNAKAHAT & JINAYAT)', null, null, '3');
INSERT INTO `subjek` VALUES ('36', 'SY 1208', 'USUL FIQH (PENGANTAR)', null, null, '3');
INSERT INTO `subjek` VALUES ('37', 'SY 1209', 'USUL FIQH 2', null, null, '3');
INSERT INTO `subjek` VALUES ('38', 'SY 1210', 'SEJARAH PERUNDANGAN ISLAM', null, null, '3');
INSERT INTO `subjek` VALUES ('39', 'SY 1211', 'KAEDAH-KAEDAH FIQH', null, null, '3');
INSERT INTO `subjek` VALUES ('40', 'SY 1212', 'FIQH PERBANDINGAN', null, null, '3');
INSERT INTO `subjek` VALUES ('41', 'SY 1213', 'FARAID', null, null, '3');
INSERT INTO `subjek` VALUES ('42', 'SY 1214', 'SIASAH SYAR\'IYYAH', null, null, '3');
INSERT INTO `subjek` VALUES ('43', 'SY 1215', 'FIQH SEMASA', null, null, '3');
INSERT INTO `subjek` VALUES ('44', 'SY 1216', 'EKONOMI ISLAM', null, null, '3');
INSERT INTO `subjek` VALUES ('45', 'SY 1217', 'UNDANG-UNDANG KEKELUARGAAN ISLAM', null, null, '3');
INSERT INTO `subjek` VALUES ('46', 'SY 1218', 'FIQH KEUTAMAAN', null, null, '3');
INSERT INTO `subjek` VALUES ('47', 'PS 1501', 'AL-QURAN BACAAN & HAFALAN 1', null, null, '0');
INSERT INTO `subjek` VALUES ('48', 'PS 1502', 'AL-QURAN BACAAN & HAFALAN 2', null, null, '0');
INSERT INTO `subjek` VALUES ('49', 'PS 1503', 'AL-QURAN BACAAN & HAFALAN 3', null, null, '0');
INSERT INTO `subjek` VALUES ('50', 'PS 1504', 'AL-QURAN BACAAN & HAFALAN 4', null, null, '0');
INSERT INTO `subjek` VALUES ('51', 'PS 1506', 'AL-QURAN BACAAN & HAFALAN 6', null, null, '0');
INSERT INTO `subjek` VALUES ('52', 'PS 1801', 'BAHASA INGGERIS 4', null, null, '0');
INSERT INTO `subjek` VALUES ('53', 'PS 1802', 'BAHASA INGGERIS 5', null, null, '0');
INSERT INTO `subjek` VALUES ('54', 'EL 1401', 'KEFAHAMAN SEJARAH NABI', null, null, '2');
INSERT INTO `subjek` VALUES ('55', 'EL 1402', 'AKHLAK', null, null, '2');
INSERT INTO `subjek` VALUES ('56', 'EL 1403', 'PENDIDIKAN ANAK-ANAK', null, null, '2');
INSERT INTO `subjek` VALUES ('57', 'EL 1404', 'KAEDAH PENGAJARAN', null, null, '2');
INSERT INTO `subjek` VALUES ('58', 'QH 1201', 'TAFSIR AL-QURAN 1', null, null, '3');
INSERT INTO `subjek` VALUES ('59', 'QH 1202', 'TAFSIR AL-QURAN 2', null, null, '3');
INSERT INTO `subjek` VALUES ('60', 'QH 1203', 'AL-QURAN DAN ILMUNYA', null, null, '3');
INSERT INTO `subjek` VALUES ('61', 'QH 1204', 'AS-SUNNAH & ILMUNYA', null, null, '3');
INSERT INTO `subjek` VALUES ('62', 'QH 1205', 'AS-SUNNAH KAJIAN & HAFALAN 1', null, null, '3');
INSERT INTO `subjek` VALUES ('63', 'QH 1206', 'AS-SUNNAH KAJIAN & HAFALAN 2', null, null, '3');
INSERT INTO `subjek` VALUES ('64', 'QH 1301', 'TAFSIR MAUDHU\'I', null, null, '3');
INSERT INTO `subjek` VALUES ('65', 'QH 1302', 'METODOLOGI AHLI TAFSIR', null, null, '3');
INSERT INTO `subjek` VALUES ('66', 'QH 1303', 'TAKHRIJ AL-HADIS', null, null, null);
INSERT INTO `subjek` VALUES ('67', 'QH 1304', 'KRITIKAN PERAWI', null, null, null);

-- ----------------------------
-- Table structure for `surat_cetak`
-- ----------------------------
DROP TABLE IF EXISTS `surat_cetak`;
CREATE TABLE `surat_cetak` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `siri_mohon` varchar(50) DEFAULT NULL,
  `id_surat` varchar(20) DEFAULT NULL,
  `ruj_cetak` varchar(100) DEFAULT NULL,
  `dt_cetak` datetime DEFAULT NULL,
  `id_cetak` varchar(50) DEFAULT NULL,
  `status_mohon` varchar(20) DEFAULT NULL,
  `admin_cetak` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=153 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of surat_cetak
-- ----------------------------

-- ----------------------------
-- Table structure for `tahap_akademik`
-- ----------------------------
DROP TABLE IF EXISTS `tahap_akademik`;
CREATE TABLE `tahap_akademik` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `namatahap_MY` varchar(30) DEFAULT NULL,
  `namatahap_EN` varchar(30) DEFAULT NULL,
  `catatan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tahap_akademik
-- ----------------------------
INSERT INTO `tahap_akademik` VALUES ('1', 'PRA', 'PRA', null);
INSERT INTO `tahap_akademik` VALUES ('2', 'STAM', 'STAM', null);
INSERT INTO `tahap_akademik` VALUES ('3', 'DIPLOMA', 'DIPLOMA', null);

-- ----------------------------
-- Table structure for `template_surat`
-- ----------------------------
DROP TABLE IF EXISTS `template_surat`;
CREATE TABLE `template_surat` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nama_template` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `lang` varchar(4) DEFAULT 'MY' COMMENT 'MY=MALAY; ENG=ENGLISH',
  `header` longtext,
  `address` longtext,
  `title` longtext,
  `content1` longtext,
  `content2` longtext,
  `content3` longtext,
  `signiture` longtext,
  `footer` longtext,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx1` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of template_surat
-- ----------------------------
INSERT INTO `template_surat` VALUES ('1', 'DEFAULT_MY', 'MY', '<h3 align=\"center\">Institusi Pengajian Tinggi Perlis\"</h3>\r\n<h2 align=\"center\">\"Ke Arah Insan Rabbani Yang Khamil Dan Syamil\"</h2>\r\n\r\n  <table>\r\n  <tbody><tr>\r\n    <td>Rujukan<br></td>\r\n    <td>:</td>\r\n    <td>\'.$auto_generate_siri.\'</td></tr>\r\n  <tr>\r\n    <td>Tarikh</td>\r\n    <td>:</td>\r\n    <td>\'.$today.\' (\'.$tarikh_hijri.\')<br></td>\r\n  </tr>\r\n<tr><td>&nbsp;</td><td></td><td><br></td></tr>\r\n<tr><td colspan=\"3\">&nbsp;</td></tr></tbody></table>', '<table><tbody><tr><td>السلام عليكم و رحمة الله و بركاته</td></tr>\r\n<tr><td>\'.$siri_mohon.\'</td></tr>\r\n<tr><td>\'.$nama_pemohon.\' (\'.$ic_pemohon.\')</td></tr>\r\n<tr><td>\'.$alamat1_pemohon.\'</td></tr>\r\n<tr><td>\'.$alamat2_pemohon.\'</td></tr>\r\n<tr><td>\'.$poskod.\' \'.$bandar.\'</td></tr><tr><td>\'.$negeri.\', \'.$negara.\'</td></tr>\r\n<tr><td>&nbsp;</td></tr></tbody></table>', '<table><tbody><tr><td><strong>TAWARAN KEMASUKAN KE INSTITUSI PENGAJIAN TINGGI ISLAM PERLIS (IPTIP) SESI PENGAJIAN AKADEMIK \'.$sesi_intake.\'</strong></td></tr>\r\n<tr><td>&nbsp;</td></tr></tbody></table>', '<table><tbody><tr><td>Sekalung tahniah diucapkan kepada saudara/saudari kerana terpilih mengikuti program pengajian di Institusi Pengajian Tinggi Islam Perlis, Perlis Indera Kayangan, Malaysia. Maklumat program pengajian adalah seperti berikut:<br></td>\r\n  </tr>\r\n<tr><td>&nbsp;</td></tr></tbody></table>\r\n', '<table id=\"jadual\" border=\"1\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n  <tbody><tr>\r\n    <td><strong>Program ditawarkan</strong></td>\r\n    <td colspan=\"3\">\'.$progTawar.\'</td>\r\n  </tr>\r\n   <tr>\r\n    <td><strong>Kulliyah</strong></td> <td colspan=\"3\">\'.$kulliyah.\'</td></tr>\r\n<tr>\r\n<td width=\"25%\"><strong>Tahun Pengajian<br></strong></td><td width=\"25%\">\'.$tahun.\'</td><td><strong>Tempoh Pengajian</strong></td><td>\'.$tempoh_ngaji.\'</td>\r\n  </tr>\r\n  <tr>\r\n    <td><strong>Tarikh Pendaftaran</strong></td><td>\'.$tarikh_daftar.\'</td>\r\n<td><strong>Masa</strong></td><td>\'.$masa_daftar.\'</td>\r\n  </tr>\r\n  <tr>\r\n    <td valign=\"top\"><strong>Tempat Pendaftaran</strong></td>\r\n    <td colspan=\"3\">\'.$tempat_daftar.\'</td>\r\n  </tr>\r\n  <tr>\r\n    <td><strong>Maklumat lanjut sila hubungi</strong></td>\r\n    <td colspan=\"3\">\'.$no_telefon.\'</td>\r\n  </tr>\r\n</tbody></table>', '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n  <tbody><tr><td>&nbsp;</td></tr><tr>\r\n    <td><strong><u>Bayaran</u></strong></td>\r\n  </tr>\r\n  <tr>\r\n    <td>Anda hendaklah membuat bayaran sebanyak <strong>RM 2,755</strong> di kaunter kewangan semasa pendaftaran. Sila bawa bersama Surat Tawaran semasa membuat bayaran.</td>\r\n  </tr>\r\n<tr><td>&nbsp;</td></tr>\r\n<tr>\r\n    <td><strong>Kemudahan Asrama</strong> : Diwajibkan</td>\r\n  </tr>\r\n  <tr><td>&nbsp;</td></tr>\r\n<tr>\r\n    <td><strong>PENTING</strong>:</td>\r\n  </tr>\r\n  <tr>\r\n    <td>Anda dikehendaki mematuhi syarat-syarat tawaran seperti berikut:-</td>\r\n  </tr>\r\n</tbody></table>\r\n<table id=\"info\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n  <tbody><tr>\r\n    <td width=\"2%\">&nbsp;</td>\r\n    <td align=\"center\" width=\"4%\">1.</td>\r\n    <td width=\"94%\">Anda perlu menjawab tawaran ini melalui (http://ecampus.insaniah.my/frm/semak.php) selewat-lewatnya 10 hari sebelum hari pendaftaran. Jika tidak, pihak kami menganggap anda tidak berminat ke program yang ditawarkan dan surat tawaran ini akan terbatal.</td>\r\n  </tr>\r\n  <tr>\r\n    <td>&nbsp;</td>\r\n    <td align=\"center\">2.</td>\r\n    <td>Anda diwajibkan mencetak <strong>PANDUAN KEMASUKAN</strong> dari (http://ecampus.insaniah.my/frm/semak.php) yang menjadi sebahagian daripada Surat Tawaran ini, sila baca dengan teliti dan isikan borang-borang yang berkaitan.</td>\r\n  </tr>\r\n  <tr>\r\n    <td>&nbsp;</td>\r\n    <td align=\"center\">3.</td>\r\n    <td>Tawaran ini akan terbatal sekiranya jumlah pelajar yang mendaftar bagi program ini tidak mencukupi jumlah yang ditetapkan dan anda boleh memohon untuk mengikuti program lain yang anda layak.</td>\r\n  </tr>\r\n  <tr>\r\n    <td colspan=\"3\">Pihak universiti mengucapkan selamat datang dan mengalu-alukan kedatangan saudara/saudari ke KUIN.</td>\r\n  </tr>\r\n  <tr>\r\n    <td colspan=\"3\">Sekian, terima kasih</td>\r\n  </tr>\r\n</tbody></table>', '<table>\r\n  <tbody><tr><td><strong>\"PENEROKAAN KE ARAH KEBIJAKSANAAN\"</strong></td></tr>\r\n   <tr><td>&nbsp;</td></tr>\r\n  <tr><td><strong>PROF. MADYA DR. AHMAD FAUZI BIN IDRIS</strong></td></tr>\r\n  <tr><td>DEKAN KEMASUKAN DAN REKOD</td></tr>\r\n  <tr><td>JABATAN HAL EHWAL AKADEMIK</td></tr>\r\n</tbody></table>', '<table align=\"center\"><tbody><tr><td>Cetakan Komputer Tidak Memerlukan Tandatangan</td></tr></tbody></table>');
INSERT INTO `template_surat` VALUES ('2', 'DEFAULT_ENG', 'ENG', '\r\n<h3 align=\"center\">\"KEDAH SEJAHTERA\"</h3>\r\n\r\n  <table>\r\n  <tbody><tr>\r\n    <td>Reference<br></td>\r\n    <td>:</td>\r\n    <td>\'.$auto_generate_siri .\'</td></tr>\r\n  <tr>\r\n    <td>Date</td>\r\n    <td>:</td>\r\n    <td>\'.$today.\' (\'.$tarikh_hijri.\')<br></td>\r\n  </tr>\r\n<tr><td>&nbsp;</td><td></td><td><br></td></tr>\r\n<tr><td colspan=\"3\">&nbsp;</td></tr></tbody></table>', '\r\n<table><tbody><tr><td>السلام عليكم و رحمة الله و بركاته</td></tr>\r\n<tr><td>\'.$siri_mohon.\'</td></tr>\r\n<tr><td>\'.$nama_pemohon.\' (\'.$ic_pemohon.\')</td></tr>\r\n<tr><td>\'.$alamat1_pemohon.\'</td></tr>\r\n<tr><td>\'.$alamat2_pemohon.\'</td></tr>\r\n<tr><td>\'.$poskod.\' \'.$bandar.\'</td></tr><tr><td>\'.$negeri.\', \'.$negara.\'</td></tr>\r\n<tr><td>&nbsp;</td></tr></tbody></table>', '<table><tbody><tr><td><strong>OFFER OF ADMISSION INTO INSANIAH UNIVERSITY COLLEGE (IUC) </strong><strong>\'.$sesi_intake.\'</strong><strong> IN THE FIRST ACADEMIC SESSION <br></strong></td></tr>\r\n<tr><td>&nbsp;</td></tr></tbody></table>', '<table><tbody><tr><td>Congratulations! You have been accepted to further your study at INSANIAH University College (IUC), Alor&nbsp; Setar, Kedah Darul Aman, Malaysia. You are accepted to undertake the following study programme:<br></td>\r\n  </tr>\r\n<tr><td>&nbsp;</td></tr></tbody></table>\r\n', '<table id=\"jadual\" border=\"1\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n  <tbody><tr>\r\n    <td><strong>Programme\r\n    </strong></td><td colspan=\"3\">\'.$progTawar.\'</td>\r\n  </tr>\r\n   <tr>\r\n    <td><strong>Kulliyah</strong></td> <td colspan=\"3\">\'.$kulliyah.\'</td></tr>\r\n<tr>\r\n<td width=\"25%\"><strong>Year</strong></td><td width=\"25%\">\'.$tahun.\'</td><td><strong>Duration</strong></td><td>\'.$tempoh_ngaji.\'</td>\r\n  </tr>\r\n  <tr>\r\n    <td><strong>Date of Registration<br></strong></td><td>\'.$tarikh_daftar.\'</td>\r\n<td><strong>Time of Registration<br></strong></td><td>\'.$masa_daftar.\'</td>\r\n  </tr>\r\n  <tr>\r\n    <td><strong>Venue of Registration</strong></td>\r\n    <td colspan=\"3\">\'.$tempat_daftar.\'</td>\r\n  </tr>\r\n  <tr>\r\n    <td><strong>For further enquiries, please&nbsp; contact</strong></td>\r\n    <td colspan=\"3\">\'.$no_telefon.\'</td>\r\n  </tr>\r\n</tbody></table>', '<table id=\"pay\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n  <tbody><tr>\r\n    <td><strong><u>PAYMENT</u></strong></td>\r\n  </tr>\r\n  <tr>\r\n    <td>a) You are required to make the full  payment for the first semester tuition fees including the registration fees  before the date of registration. <em>(Please refer Fees Structure Schedule and  Payment Guideline)</em></td>\r\n  </tr>\r\n  <tr>\r\n    <td>b) Please <strong>make ready a Personal Bond</strong> in USD or in RM (Ringgit Malaysia) (<em>Please  refer attachment for Personal Bond</em>) and to be paid to our officer immediately upon arrival at the Kuala  Lumpur International Airport (KLIA).</td>\r\n  </tr>\r\n  <tr>\r\n    <td>c) Failing to do so, we will not be able to release  you from the custody of the Malaysian Immigration authority.</td>\r\n  </tr>\r\n  <tr>\r\n    <td><strong>Facilities :&nbsp;</strong> Hostel will be provided</td>\r\n  </tr>\r\n  <tr>\r\n    <td><strong>IMPORTANT</strong>:</td>\r\n  </tr>\r\n  <tr>\r\n    <td>You are to abide to the following condition(s):</td>\r\n  </tr>\r\n</tbody></table>\r\n<table id=\"info\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n  <tbody><tr>\r\n    <td width=\"2%\">&nbsp;</td>\r\n    <td align=\"center\" width=\"4%\">1.</td>\r\n    <td width=\"94%\">Candidates must reply to the offer letter by accepting or rejecting the offer at least 10 days before the date of registration via website. (http://ecampus.insaniah.my/frm/semak.php)</td>\r\n  </tr>\r\n  <tr>\r\n    <td>&nbsp;</td>\r\n    <td align=\"center\">2.</td>\r\n    <td>This offer will be automatically null and void if you fail to register on the stipulated date or within 14 days after the registration date.</td>\r\n  </tr>\r\n  <tr>\r\n    <td>&nbsp;</td>\r\n    <td align=\"center\">3.</td>\r\n    <td>Please arrange your travel to arrive in Malaysia on any of the dates i.e. on the 17 June 2012 until 23 June 2012) and inform the University (7) days prior to your arrival via email (daftar@insaniah.edu.my).</td>\r\n  </tr>\r\n  <tr>\r\n    <td>&nbsp;</td>\r\n    <td align=\"center\">4.</td>\r\n    <td>If you fail to arrive on any of the specified dates, our officer will not be able to assist your release from the airport. </td>\r\n  </tr>\r\n  <tr>\r\n    <td>&nbsp;</td>\r\n    <td align=\"center\">5.</td>\r\n    <td>It is compulsory for you to print the ADMISSION GUIDELINES as part of the Letter Offer of Admission and you are also required to read carefully and fill in the relevant forms.</td>\r\n  </tr>\r\n  <tr>\r\n    <td>&nbsp;</td>\r\n    <td align=\"center\">6.</td>\r\n    <td>If the programme offered does not achieve the minimum number of students, the University has the right to withhold the programme for this semester without prior notice.</td>\r\n  </tr>\r\n  <tr>\r\n    <td>&nbsp;</td>\r\n    <td align=\"center\">&nbsp;</td>\r\n    <td>On behalf of the University, we would like to take this opportunity to congratulate and welcome you to INSANIAH University College (IUC).<br></td>\r\n  </tr>\r\n  <tr>\r\n    <td>&nbsp;</td>\r\n    <td align=\"center\">&nbsp;</td>\r\n    <td>Thank you.</td>\r\n  </tr>\r\n</tbody></table>', '<table>\r\n  <tbody><tr><td><strong>\"PAVING THE WAY TO WISDOM\"<strong></strong></strong></td></tr>\r\n  \r\n  <tr><td style=\"vertical-align: top;\">والسلام<br></td></tr>\r\n <tr><td>&nbsp;</td></tr>\r\n <tr><td><strong>PROF. MADYA DR. AHMAD FAUZI BIN IDRIS</strong></td></tr>\r\n  <tr><td>DEAN OF ADMISSIONS AND RECORDS</td></tr>\r\n  <tr><td>DEPARTMENT OF ACADEMIC AFFAIRS</td></tr>\r\n</tbody></table>', '<table align=\"center\"><tbody><tr><td>Computer Generated. No Signature Required</td></tr></tbody></table>');
INSERT INTO `template_surat` VALUES ('3', 'test_MY', 'MY', '<h3 align=\"center\">Institusi Pengajian Tinggi Perlis\"</h3>\r\n<h2 align=\"center\">\"Ke Arah Insan Rabbani Yang Khamil Dan Syamil\"</h2>\r\n\r\n  <table>\r\n  <tbody><tr>\r\n    <td>Rujukan<br></td>\r\n    <td>:</td>\r\n    <td>\'.$auto_generate_siri.\'</td></tr>\r\n  <tr>\r\n    <td>Tarikh</td>\r\n    <td>:</td>\r\n    <td>\'.$today.\' (\'.$tarikh_hijri.\')<br></td>\r\n  </tr>\r\n<tr><td>&nbsp;</td><td></td><td><br></td></tr>\r\n<tr><td colspan=\"3\">&nbsp;</td></tr></tbody></table><table><tbody><tr><td>السلام عليكم و رحمة الله و بركاته</td></tr>\r\n<tr><td>\'.$siri_mohon.\'</td></tr>\r\n<tr><td>\'.$nama_pemohon.\' (\'.$ic_pemohon.\')</td></tr>\r\n<tr><td>\'.$alamat1_pemohon.\'</td></tr>\r\n<tr><td>\'.$alamat2_pemohon.\'</td></tr>\r\n<tr><td>\'.$poskod.\' \'.$bandar.\'</td></tr><tr><td>\'.$negeri.\', \'.$negara.\'</td></tr>\r\n<tr><td>&nbsp;</td></tr></tbody></table><table><tbody><tr><td><strong>TAWARAN KEMASUKAN KE INSTITUSI PENGAJIAN TINGGI ISLAM PERLIS (IPTIP) SESI PENGAJIAN AKADEMIK \'.$sesi_intake.\'</strong></td></tr>\r\n<tr><td>&nbsp;</td></tr></tbody></table><table><tbody><tr><td><strong>TAWARAN KEMASUKAN KE INSTITUSI PENGAJIAN TINGGI ISLAM PERLIS (IPTIP) SESI PENGAJIAN AKADEMIK \'.$sesi_intake.\'</strong></td></tr>\r\n<tr><td>&nbsp;</td></tr></tbody></table><table><tbody><tr><td>Sekalung tahniah diucapkan kepada saudara/saudari kerana terpilih mengikuti program pengajian di Institusi Pengajian Tinggi Islam Perlis, Perlis Indera Kayangan, Malaysia. Maklumat program pengajian adalah seperti berikut:<br></td>\r\n  </tr>\r\n<tr><td>&nbsp;</td></tr></tbody></table>\r\n<table id=\"jadual\" border=\"1\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n  <tbody><tr>\r\n    <td><strong>Program ditawarkan</strong></td>\r\n    <td colspan=\"3\">\'.$progTawar.\'</td>\r\n  </tr>\r\n   <tr>\r\n    <td><strong>Kulliyah</strong></td> <td colspan=\"3\">\'.$kulliyah.\'</td></tr>\r\n<tr>\r\n<td width=\"25%\"><strong>Tahun Pengajian<br></strong></td><td width=\"25%\">\'.$tahun.\'</td><td><strong>Tempoh Pengajian</strong></td><td>\'.$tempoh_ngaji.\'</td>\r\n  </tr>\r\n  <tr>\r\n    <td><strong>Tarikh Pendaftaran</strong></td><td>\'.$tarikh_daftar.\'</td>\r\n<td><strong>Masa</strong></td><td>\'.$masa_daftar.\'</td>\r\n  </tr>\r\n  <tr>\r\n    <td valign=\"top\"><strong>Tempat Pendaftaran</strong></td>\r\n    <td colspan=\"3\">\'.$tempat_daftar.\'</td>\r\n  </tr>\r\n  <tr>\r\n    <td><strong>Maklumat lanjut sila hubungi</strong></td>\r\n    <td colspan=\"3\">\'.$no_telefon.\'</td>\r\n  </tr>\r\n</tbody></table><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n  <tbody><tr><td>&nbsp;</td></tr><tr>\r\n    <td><strong><u>Bayaran</u></strong></td>\r\n  </tr>\r\n  <tr>\r\n    <td>Anda hendaklah membuat bayaran sebanyak <strong>RM 2,755</strong> di kaunter kewangan semasa pendaftaran. Sila bawa bersama Surat Tawaran semasa membuat bayaran.</td>\r\n  </tr>\r\n<tr><td>&nbsp;</td></tr>\r\n<tr>\r\n    <td><strong>Kemudahan Asrama</strong> : Diwajibkan</td>\r\n  </tr>\r\n  <tr><td>&nbsp;</td></tr>\r\n<tr>\r\n    <td><strong>PENTING</strong>:</td>\r\n  </tr>\r\n  <tr>\r\n    <td>Anda dikehendaki mematuhi syarat-syarat tawaran seperti berikut:-</td>\r\n  </tr>\r\n</tbody></table>\r\n<table id=\"info\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n  <tbody><tr>\r\n    <td width=\"2%\">&nbsp;</td>\r\n    <td align=\"center\" width=\"4%\">1.</td>\r\n    <td width=\"94%\">Anda perlu menjawab tawaran ini melalui (http://ecampus.insaniah.my/frm/semak.php) selewat-lewatnya 10 hari sebelum hari pendaftaran. Jika tidak, pihak kami menganggap anda tidak berminat ke program yang ditawarkan dan surat tawaran ini akan terbatal.</td>\r\n  </tr>\r\n  <tr>\r\n    <td>&nbsp;</td>\r\n    <td align=\"center\">2.</td>\r\n    <td>Anda diwajibkan mencetak <strong>PANDUAN KEMASUKAN</strong> dari (http://ecampus.insaniah.my/frm/semak.php) yang menjadi sebahagian daripada Surat Tawaran ini, sila baca dengan teliti dan isikan borang-borang yang berkaitan.</td>\r\n  </tr>\r\n  <tr>\r\n    <td>&nbsp;</td>\r\n    <td align=\"center\">3.</td>\r\n    <td>Tawaran ini akan terbatal sekiranya jumlah pelajar yang mendaftar bagi program ini tidak mencukupi jumlah yang ditetapkan dan anda boleh memohon untuk mengikuti program lain yang anda layak.</td>\r\n  </tr>\r\n  <tr>\r\n    <td colspan=\"3\">Pihak universiti mengucapkan selamat datang dan mengalu-alukan kedatangan saudara/saudari ke KUIN.</td>\r\n  </tr>\r\n  <tr>\r\n    <td colspan=\"3\">Sekian, terima kasih</td>\r\n  </tr>\r\n</tbody></table><table>\r\n  <tbody><tr><td><strong>\"PENEROKAAN KE ARAH KEBIJAKSANAAN\"</strong></td></tr>\r\n   <tr><td>&nbsp;</td></tr>\r\n  <tr><td><strong>PROF. MADYA DR. AHMAD FAUZI BIN IDRIS</strong></td></tr>\r\n  <tr><td>DEKAN KEMASUKAN DAN REKOD</td></tr>\r\n  <tr><td>JABATAN HAL EHWAL AKADEMIK</td></tr>\r\n</tbody></table><table align=\"center\"><tbody><tr><td>Cetakan Komputer Tidak Memerlukan Tandatangan</td></tr></tbody></table>', null, null, null, null, null, null, null);

-- ----------------------------
-- Table structure for `user_data`
-- ----------------------------
DROP TABLE IF EXISTS `user_data`;
CREATE TABLE `user_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) CHARACTER SET latin1 NOT NULL,
  `ic` varchar(20) NOT NULL,
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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_data
-- ----------------------------
INSERT INTO `user_data` VALUES ('1', 'admin1', '123123', '760505026479', 'Admin', '1, Taman Mutiara', 'Sungai Petani', 'Kedah', '08000', '0162172420', '', 'dhiauddin@gmail.com', '2012-11-13 09:16:19');
INSERT INTO `user_data` VALUES ('2', 'azaliha', '123123', '123456789012', 'Azaliha Abdullah', '1, Taman Mutiara', 'Sungai Petani', 'Kedah', '05400', '0162052420', '', 'azaliha@gmail.com', '2012-11-24 00:52:22');

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
INSERT INTO `user_department` VALUES ('1', 'isms', 'ISMS');
INSERT INTO `user_department` VALUES ('2', 'hea', 'Hal Ehwal Akademik');
INSERT INTO `user_department` VALUES ('3', 'hep', 'Hal Ehwal Pelajar');
INSERT INTO `user_department` VALUES ('4', 'kewangan', 'Kewangan');
INSERT INTO `user_department` VALUES ('5', 'kemasukan', 'Kemasukan');
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_dept
-- ----------------------------
INSERT INTO `user_dept` VALUES ('1', '1', '1');
INSERT INTO `user_dept` VALUES ('2', '1', '2');
INSERT INTO `user_dept` VALUES ('3', '1', '3');
INSERT INTO `user_dept` VALUES ('4', '1', '4');
INSERT INTO `user_dept` VALUES ('5', '1', '5');
INSERT INTO `user_dept` VALUES ('6', '1', '6');
INSERT INTO `user_dept` VALUES ('8', '2', '2');
INSERT INTO `user_dept` VALUES ('9', '2', '3');
INSERT INTO `user_dept` VALUES ('10', '2', '4');

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
  PRIMARY KEY (`id`),
  KEY `unique` (`id_user_function`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_dept_func
-- ----------------------------
INSERT INTO `user_dept_func` VALUES ('2', '1', '2', '1', '1');
INSERT INTO `user_dept_func` VALUES ('3', '1', '3', '1', '1');
INSERT INTO `user_dept_func` VALUES ('4', '1', '4', '1', '1');
INSERT INTO `user_dept_func` VALUES ('5', '1', '5', '1', '1');
INSERT INTO `user_dept_func` VALUES ('6', '1', '6', '1', '1');
INSERT INTO `user_dept_func` VALUES ('7', '1', '1', '4', '1');
INSERT INTO `user_dept_func` VALUES ('8', '1', '1', '5', '1');
INSERT INTO `user_dept_func` VALUES ('10', '1', '1', '6', '1');
INSERT INTO `user_dept_func` VALUES ('11', '1', '1', '7', '1');
INSERT INTO `user_dept_func` VALUES ('12', '1', '1', '8', '1');
INSERT INTO `user_dept_func` VALUES ('16', '1', '5', '9', '1');
INSERT INTO `user_dept_func` VALUES ('17', '1', '1', '10', '1');
INSERT INTO `user_dept_func` VALUES ('18', '1', '5', '11', '1');
INSERT INTO `user_dept_func` VALUES ('19', '1', '2', '12', '1');
INSERT INTO `user_dept_func` VALUES ('20', '1', '2', '13', '1');
INSERT INTO `user_dept_func` VALUES ('21', '1', '2', '14', '1');
INSERT INTO `user_dept_func` VALUES ('22', '1', '2', '15', '1');
INSERT INTO `user_dept_func` VALUES ('23', '1', '2', '16', '1');
INSERT INTO `user_dept_func` VALUES ('24', '1', '4', '17', '1');
INSERT INTO `user_dept_func` VALUES ('25', '1', '4', '18', '1');
INSERT INTO `user_dept_func` VALUES ('26', '1', '2', '19', '1');
INSERT INTO `user_dept_func` VALUES ('27', '1', '5', '20', '1');
INSERT INTO `user_dept_func` VALUES ('28', '1', '5', '21', '1');
INSERT INTO `user_dept_func` VALUES ('29', '1', '1', '22', '1');
INSERT INTO `user_dept_func` VALUES ('30', '1', '5', '23', '1');
INSERT INTO `user_dept_func` VALUES ('31', '1', '5', '24', '1');

-- ----------------------------
-- Table structure for `user_dept_jaw`
-- ----------------------------
DROP TABLE IF EXISTS `user_dept_jaw`;
CREATE TABLE `user_dept_jaw` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user_data` int(11) NOT NULL,
  `id_user_department` int(11) NOT NULL,
  `id_user_jawatan` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_dept_jaw
-- ----------------------------
INSERT INTO `user_dept_jaw` VALUES ('2', '2', '2', '2');
INSERT INTO `user_dept_jaw` VALUES ('3', '2', '3', '1');
INSERT INTO `user_dept_jaw` VALUES ('4', '2', '4', '8');

-- ----------------------------
-- Table structure for `user_function`
-- ----------------------------
DROP TABLE IF EXISTS `user_function`;
CREATE TABLE `user_function` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `function` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `menu` varchar(255) NOT NULL,
  `menu_display` tinyint(1) NOT NULL,
  `posisi` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Function` (`function`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_function
-- ----------------------------
INSERT INTO `user_function` VALUES ('1', 'index', 'Index page', 'Home', '1', '0');
INSERT INTO `user_function` VALUES ('4', 'add_user', 'Penambahan pengguna system', 'Tambah Pengguna', '1', '0');
INSERT INTO `user_function` VALUES ('5', 'devel', 'Penambahan function', 'Developer', '1', '5');
INSERT INTO `user_function` VALUES ('6', 'set_privillege', 'Memaparkan user dan function', '', '0', '3');
INSERT INTO `user_function` VALUES ('7', 'update_privillege', 'Kemaskini kebenaran function utk pengguna', '', '0', '4');
INSERT INTO `user_function` VALUES ('8', 'user_cat', 'Tambah jabatan untuk user', 'Tambah Jabatan Kepada Pengguna', '1', '1');
INSERT INTO `user_function` VALUES ('9', 'senarai_pemohon', 'Memaparkan senarai pemohon kemasukan ke pusat pengajian', 'Senarai Pemohon', '1', '3');
INSERT INTO `user_function` VALUES ('10', 'user_perm_edit', 'Digunakan untuk mengedit capaian pengguna kepada fungsi page mengikut jabatan/controller/modul', 'Kemaskini Capaian Pengguna', '1', '2');
INSERT INTO `user_function` VALUES ('11', 'permohonan_baru', 'Masukkan data permohonan pelajar yang ingin melanjutkan pelajaran di sini.', 'Permohonan Baru', '0', '2');
INSERT INTO `user_function` VALUES ('12', 'subj_mgmt', 'Menguruskan subjek-subjek', 'Pengurusan Subjek', '1', '20');
INSERT INTO `user_function` VALUES ('13', 'mohon_pelajar', 'Page ni digunakan untuk memilih pelajar diterima masuk kedalam institusi pengajian', 'Proses Permohonan', '1', '4');
INSERT INTO `user_function` VALUES ('14', 'pmhn_tdk_lgkp', 'Update status permohonan pelajar dari \"Dalam Proses\" kepada \"Tidak Lengkap\"', 'Permohonan Tidak Lengkap', '0', '5');
INSERT INTO `user_function` VALUES ('15', 'pmhn_gagal', 'Update status permohonan pelajar dari \"Dalam Proses\" kepada \"Gagal\"', 'Permohonan Gagal', '0', '6');
INSERT INTO `user_function` VALUES ('16', 'pendaftaran', 'Pendaftaran Bakal Pelajar Yang Permohonannya Diluluskan', 'Pendaftaran', '1', '9');
INSERT INTO `user_function` VALUES ('17', 'pmbyrn_penawarn', 'Carian Pembayaran Perlu Dibuat Sebelum Proses Pendaftaran Dapat Dilakukan Kepada Bakal Pelajar.', 'Pembayaran Pendaftaran', '1', '1');
INSERT INTO `user_function` VALUES ('18', 'bayar_prmhnn', 'Pembayaran Sebelum Pendaftaran Bakal Pelajar', 'Bayar Pendaftaran', '0', '2');
INSERT INTO `user_function` VALUES ('19', 'pmhn_berjaya', 'Mencetak Surat Tawaran Bg Pemohon Yg Ditawarkan Melanjutkan Pelajara Di Iptip.', 'Tawaran', '1', '8');
INSERT INTO `user_function` VALUES ('20', 'permohonan', 'Fungsi Ini Adalah Untuk Menentukan Samada Pelajar Baru Atau Bekas Pelajar Memasuki Semula Pusat Pengajian', 'Permohonan', '1', '1');
INSERT INTO `user_function` VALUES ('21', 'rayuan_permohonan', 'Fungsi Ini Digunakan Sekiranya Terdapat Pelajar Yang Tidak Berjaya Dalam Permohonan Ditimbangkan Semula Untuk Kemasukan Dalam Sesi Kemasukan', 'Rayuan Permohonan', '1', '7');
INSERT INTO `user_function` VALUES ('22', 'truncate', 'Reset System', 'Truncate System', '1', '6');
INSERT INTO `user_function` VALUES ('23', 'sesi_intake', 'Fungsi Ini Digunakan Untuk Menetapkan Sesi Permohonan Kemasukan Pelajar', 'Penetapan Sesi Kemasukan', '1', '10');
INSERT INTO `user_function` VALUES ('24', 'template_surat', 'Untuk Tetapan Format Surat Tawaran.', 'Penetapan Format Surat', '1', '11');

-- ----------------------------
-- Table structure for `user_jawatan`
-- ----------------------------
DROP TABLE IF EXISTS `user_jawatan`;
CREATE TABLE `user_jawatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jawatan` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_jawatan
-- ----------------------------
INSERT INTO `user_jawatan` VALUES ('1', 'Ketua Jabatan', 'Ketua Jabatan');
INSERT INTO `user_jawatan` VALUES ('2', 'Pensyarah', 'Pensyarah');
INSERT INTO `user_jawatan` VALUES ('3', 'Timbalan Ketua Jabatan', 'Timbalan Ketua Jabatan');
INSERT INTO `user_jawatan` VALUES ('4', 'Dekan', 'Dekan');
INSERT INTO `user_jawatan` VALUES ('5', 'Timbalan Dekan', 'Timbalan Dekan');
INSERT INTO `user_jawatan` VALUES ('6', 'Kerani', 'Kerani');
INSERT INTO `user_jawatan` VALUES ('7', 'PAR', 'PAR');
INSERT INTO `user_jawatan` VALUES ('8', 'Bendahari', 'Bendahari');
INSERT INTO `user_jawatan` VALUES ('9', 'Pendaftar', 'Pendaftar');
INSERT INTO `user_jawatan` VALUES ('10', 'Timbalan Bendahari', 'Timbalan Bendahari');
INSERT INTO `user_jawatan` VALUES ('11', 'Timbalan Pendaftar', 'Timbalan Pendaftar');
INSERT INTO `user_jawatan` VALUES ('12', 'Warden', 'Warden');
INSERT INTO `user_jawatan` VALUES ('13', 'Ketua Pustakawan', 'Ketua Pustakawan');
INSERT INTO `user_jawatan` VALUES ('14', 'Penolong Ketua Pustakawan', 'Penolong Ketua Pustakawan');
INSERT INTO `user_jawatan` VALUES ('15', 'Pustakawan', 'Pustakawan');

-- ----------------------------
-- Table structure for `yuran_jadual`
-- ----------------------------
DROP TABLE IF EXISTS `yuran_jadual`;
CREATE TABLE `yuran_jadual` (
  `id` bigint(10) NOT NULL AUTO_INCREMENT,
  `kod_prog` varchar(20) DEFAULT NULL,
  `bulan` int(2) DEFAULT NULL,
  `jum_ansuran` double(8,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yuran_jadual
-- ----------------------------
INSERT INTO `yuran_jadual` VALUES ('1', 'DQH', '1', '700.00');
INSERT INTO `yuran_jadual` VALUES ('2', 'DQH', '2', '200.00');
INSERT INTO `yuran_jadual` VALUES ('3', 'DQH', '3', '200.00');
INSERT INTO `yuran_jadual` VALUES ('4', 'DQH', '4', '200.00');
INSERT INTO `yuran_jadual` VALUES ('5', 'DQH', '5', '150.00');
INSERT INTO `yuran_jadual` VALUES ('6', 'DSY', '1', '700.00');
INSERT INTO `yuran_jadual` VALUES ('7', 'DSY', '2', '200.00');
INSERT INTO `yuran_jadual` VALUES ('8', 'DSY', '3', '200.00');
INSERT INTO `yuran_jadual` VALUES ('9', 'DSY', '4', '200.00');
INSERT INTO `yuran_jadual` VALUES ('10', 'DSY', '5', '200.00');
INSERT INTO `yuran_jadual` VALUES ('11', 'DUS', '1', '700.00');
INSERT INTO `yuran_jadual` VALUES ('12', 'DUS', '2', '200.00');
INSERT INTO `yuran_jadual` VALUES ('13', 'DUS', '3', '200.00');
INSERT INTO `yuran_jadual` VALUES ('14', 'DUS', '4', '200.00');
INSERT INTO `yuran_jadual` VALUES ('15', 'DUS', '5', '150.00');
INSERT INTO `yuran_jadual` VALUES ('16', 'PST', '1', '700.00');
INSERT INTO `yuran_jadual` VALUES ('17', 'PST', '2', '200.00');
INSERT INTO `yuran_jadual` VALUES ('18', 'PST', '3', '200.00');
INSERT INTO `yuran_jadual` VALUES ('19', 'PST', '4', '200.00');
INSERT INTO `yuran_jadual` VALUES ('20', 'PST', '5', '150.00');
INSERT INTO `yuran_jadual` VALUES ('21', 'ST', '1', '740.00');
INSERT INTO `yuran_jadual` VALUES ('22', 'ST', '2', '230.00');
INSERT INTO `yuran_jadual` VALUES ('23', 'ST', '3', '230.00');
INSERT INTO `yuran_jadual` VALUES ('24', 'ST', '4', '230.00');
INSERT INTO `yuran_jadual` VALUES ('25', 'ST', '5', '230.00');
INSERT INTO `yuran_jadual` VALUES ('26', 'ST', '6', '230.00');
INSERT INTO `yuran_jadual` VALUES ('27', 'ST', '7', '230.00');
INSERT INTO `yuran_jadual` VALUES ('28', 'ST', '8', '230.00');
INSERT INTO `yuran_jadual` VALUES ('29', 'ST', '9', '190.00');

-- ----------------------------
-- Table structure for `yuran_prog`
-- ----------------------------
DROP TABLE IF EXISTS `yuran_prog`;
CREATE TABLE `yuran_prog` (
  `id` bigint(10) NOT NULL AUTO_INCREMENT,
  `kod_akaun` varchar(10) DEFAULT NULL,
  `kategori` varchar(10) DEFAULT NULL,
  `kod_prog` varchar(10) DEFAULT NULL,
  `jumlah` double(8,2) DEFAULT NULL,
  `aktif` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yuran_prog
-- ----------------------------
INSERT INTO `yuran_prog` VALUES ('1', '40001', 'TETAP', 'DQH', '30.00', '1');
INSERT INTO `yuran_prog` VALUES ('2', '40002', 'TETAP', 'DQH', '30.00', '1');
INSERT INTO `yuran_prog` VALUES ('3', '40003', 'TETAP', 'DQH', '50.00', '1');
INSERT INTO `yuran_prog` VALUES ('4', '40004', 'TETAP', 'DQH', '20.00', '1');
INSERT INTO `yuran_prog` VALUES ('5', '40005', 'DAFTAR', 'DQH', '15.00', '1');
INSERT INTO `yuran_prog` VALUES ('6', '40006', 'TETAP', 'DQH', '30.00', '1');
INSERT INTO `yuran_prog` VALUES ('7', '40007', 'DAFTAR', 'DQH', '15.00', '1');
INSERT INTO `yuran_prog` VALUES ('8', '40008', 'TETAP', 'DQH', '10.00', '1');
INSERT INTO `yuran_prog` VALUES ('9', '40009', 'DAFTAR', 'DQH', '50.00', '1');
INSERT INTO `yuran_prog` VALUES ('10', '40010', 'TETAP', 'DQH', '150.00', '1');
INSERT INTO `yuran_prog` VALUES ('11', '40011', 'TETAP', 'DQH', '250.00', '1');
INSERT INTO `yuran_prog` VALUES ('12', '40012', 'TETAP', 'DQH', '750.00', '1');
INSERT INTO `yuran_prog` VALUES ('13', '20001', 'DAFTAR', 'DQH', '50.00', '1');
INSERT INTO `yuran_prog` VALUES ('14', '40001', 'TETAP', 'DSY', '30.00', '1');
INSERT INTO `yuran_prog` VALUES ('15', '40002', 'TETAP', 'DSY', '30.00', '1');
INSERT INTO `yuran_prog` VALUES ('16', '40003', 'TETAP', 'DSY', '50.00', '1');
INSERT INTO `yuran_prog` VALUES ('17', '40004', 'TETAP', 'DSY', '20.00', '1');
INSERT INTO `yuran_prog` VALUES ('18', '40005', 'DAFTAR', 'DSY', '15.00', '1');
INSERT INTO `yuran_prog` VALUES ('19', '40006', 'TETAP', 'DSY', '30.00', '1');
INSERT INTO `yuran_prog` VALUES ('20', '40007', 'DAFTAR', 'DSY', '15.00', '1');
INSERT INTO `yuran_prog` VALUES ('21', '40008', 'TETAP', 'DSY', '10.00', '1');
INSERT INTO `yuran_prog` VALUES ('22', '40009', 'DAFTAR', 'DSY', '50.00', '1');
INSERT INTO `yuran_prog` VALUES ('23', '40010', 'TETAP', 'DSY', '150.00', '1');
INSERT INTO `yuran_prog` VALUES ('24', '40011', 'TETAP', 'DSY', '250.00', '1');
INSERT INTO `yuran_prog` VALUES ('25', '40012', 'TETAP', 'DSY', '750.00', '1');
INSERT INTO `yuran_prog` VALUES ('26', '20001', 'DAFTAR', 'DSY', '50.00', '1');
INSERT INTO `yuran_prog` VALUES ('27', '40001', 'TETAP', 'DUS', '30.00', '1');
INSERT INTO `yuran_prog` VALUES ('28', '40002', 'TETAP', 'DUS', '30.00', '1');
INSERT INTO `yuran_prog` VALUES ('29', '40003', 'TETAP', 'DUS', '50.00', '1');
INSERT INTO `yuran_prog` VALUES ('30', '40004', 'TETAP', 'DUS', '20.00', '1');
INSERT INTO `yuran_prog` VALUES ('31', '40005', 'DAFTAR', 'DUS', '15.00', '1');
INSERT INTO `yuran_prog` VALUES ('32', '40006', 'TETAP', 'DUS', '30.00', '1');
INSERT INTO `yuran_prog` VALUES ('33', '40007', 'DAFTAR', 'DUS', '15.00', '1');
INSERT INTO `yuran_prog` VALUES ('34', '40008', 'TETAP', 'DUS', '10.00', '1');
INSERT INTO `yuran_prog` VALUES ('35', '40009', 'DAFTAR', 'DUS', '50.00', '1');
INSERT INTO `yuran_prog` VALUES ('36', '40010', 'TETAP', 'DUS', '150.00', '1');
INSERT INTO `yuran_prog` VALUES ('37', '40011', 'TETAP', 'DUS', '250.00', '1');
INSERT INTO `yuran_prog` VALUES ('38', '40012', 'TETAP', 'DUS', '750.00', '1');
INSERT INTO `yuran_prog` VALUES ('39', '20001', 'DAFTAR', 'DUS', '50.00', '1');
INSERT INTO `yuran_prog` VALUES ('40', '40001', 'TETAP', 'PST', '30.00', '1');
INSERT INTO `yuran_prog` VALUES ('41', '40002', 'TETAP', 'PST', '30.00', '1');
INSERT INTO `yuran_prog` VALUES ('42', '40003', 'TETAP', 'PST', '50.00', '1');
INSERT INTO `yuran_prog` VALUES ('43', '40004', 'TETAP', 'PST', '20.00', '1');
INSERT INTO `yuran_prog` VALUES ('44', '40005', 'DAFTAR', 'PST', '15.00', '1');
INSERT INTO `yuran_prog` VALUES ('45', '40006', 'TETAP', 'PST', '30.00', '1');
INSERT INTO `yuran_prog` VALUES ('46', '40007', 'DAFTAR', 'PST', '15.00', '1');
INSERT INTO `yuran_prog` VALUES ('47', '40008', 'TETAP', 'PST', '10.00', '1');
INSERT INTO `yuran_prog` VALUES ('48', '40009', 'DAFTAR', 'PST', '50.00', '1');
INSERT INTO `yuran_prog` VALUES ('49', '40010', 'TETAP', 'PST', '150.00', '1');
INSERT INTO `yuran_prog` VALUES ('50', '40011', 'TETAP', 'PST', '250.00', '1');
INSERT INTO `yuran_prog` VALUES ('51', '40012', 'TETAP', 'PST', '750.00', '1');
INSERT INTO `yuran_prog` VALUES ('52', '20001', 'DAFTAR', 'PST', '50.00', '1');
INSERT INTO `yuran_prog` VALUES ('53', '40001', 'TETAP', 'ST', '30.00', '1');
INSERT INTO `yuran_prog` VALUES ('54', '40002', 'TETAP', 'ST', '60.00', '1');
INSERT INTO `yuran_prog` VALUES ('55', '40003', 'TETAP', 'ST', '100.00', '1');
INSERT INTO `yuran_prog` VALUES ('56', '40004', 'TETAP', 'ST', '40.00', '1');
INSERT INTO `yuran_prog` VALUES ('57', '40005', 'DAFTAR', 'ST', '15.00', '1');
INSERT INTO `yuran_prog` VALUES ('58', '40006', 'TETAP', 'ST', '60.00', '1');
INSERT INTO `yuran_prog` VALUES ('59', '40007', 'DAFTAR', 'ST', '15.00', '1');
INSERT INTO `yuran_prog` VALUES ('60', '40008', 'TETAP', 'ST', '20.00', '1');
INSERT INTO `yuran_prog` VALUES ('61', '40009', 'DAFTAR', 'ST', '50.00', '1');
INSERT INTO `yuran_prog` VALUES ('62', '40010', 'TETAP', 'ST', '300.00', '1');
INSERT INTO `yuran_prog` VALUES ('63', '40011', 'TETAP', 'ST', '500.00', '1');
INSERT INTO `yuran_prog` VALUES ('64', '40012', 'TETAP', 'ST', '1000.00', '1');
INSERT INTO `yuran_prog` VALUES ('65', '40013', 'TETAP', 'ST', '300.00', '1');
INSERT INTO `yuran_prog` VALUES ('66', '20001', 'DAFTAR', 'ST', '50.00', '1');

-- ----------------------------
-- View structure for `view_app_pelajar`
-- ----------------------------
DROP VIEW IF EXISTS `view_app_pelajar`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `view_app_pelajar` AS select `app_pelajar`.`id` AS `id`,`app_pelajar`.`nama` AS `nama`,`sel_negara`.`namanegara` AS `namanegara`,`app_akademik`.`institusi` AS `institusi`,`app_akademik`.`tahun` AS `tahun`,`sel_level`.`tahap_MY` AS `tahap_MY`,`sel_subjek`.`subjek_MY` AS `subjek_MY`,`app_subjek_akademik`.`gred` AS `gred`,`program`.`namaprog_MY` AS `namaprog_MY`,`app_progmohon`.`pilihan` AS `pilihan`,`app_progmohon`.`catatan` AS `catatan`,`sel_statusmohon`.`status_MY` AS `status_MY` from ((((((((`app_pelajar` left join `app_akademik` on((`app_pelajar`.`id` = `app_akademik`.`id_mohon`))) left join `app_progmohon` on((`app_pelajar`.`id` = `app_progmohon`.`id_mohon`))) left join `app_subjek_akademik` on((`app_subjek_akademik`.`akademik_id` = `app_akademik`.`id`))) left join `sel_level` on((`sel_level`.`kodtahap` = `app_akademik`.`level`))) left join `sel_subjek` on((`sel_subjek`.`kodsubjek` = `app_subjek_akademik`.`subjek`))) left join `program` on(((`program`.`kod_prog` = `app_progmohon`.`kod_prog`) and (`app_pelajar`.`progTawar` = `program`.`kod_prog`)))) left join `sel_statusmohon` on(((`sel_statusmohon`.`kodstatus` = `app_progmohon`.`status_mohon`) and (`app_pelajar`.`status_mohon` = `sel_statusmohon`.`kodstatus`)))) join `sel_negara` on((`sel_negara`.`kodnegara` = `app_pelajar`.`warganegara`))) where (`app_progmohon`.`status_mohon` = 'DIP') ;

-- ----------------------------
-- View structure for `view_apppelajar_pelresit`
-- ----------------------------
DROP VIEW IF EXISTS `view_apppelajar_pelresit`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `view_apppelajar_pelresit` AS select `app_pelajar`.`nama` AS `nama`,`pel_resit`.`matrik` AS `matrik`,`pel_resit`.`jumlah` AS `jumlah` from (`pel_resit` join `app_pelajar` on((`app_pelajar`.`siri_mohon` = `pel_resit`.`matrik`))) ;

-- ----------------------------
-- View structure for `view_department_function`
-- ----------------------------
DROP VIEW IF EXISTS `view_department_function`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `view_department_function` AS select `dept_func`.`id_user_department` AS `id_user_department`,`user_department`.`dept_ctrlr` AS `dept_ctrlr`,`user_department`.`dept` AS `dept`,`dept_func`.`id_user_function` AS `id_user_function`,`user_function`.`function` AS `function`,`user_function`.`remarks` AS `remarks`,`user_function`.`menu` AS `menu`,`user_function`.`menu_display` AS `menu_display`,`user_function`.`posisi` AS `posisi` from ((`dept_func` join `user_department` on((`dept_func`.`id_user_department` = `user_department`.`id`))) join `user_function` on((`dept_func`.`id_user_function` = `user_function`.`id`))) order by `dept_func`.`id_user_department`,`user_function`.`posisi` ;

-- ----------------------------
-- View structure for `view_department_jawatan`
-- ----------------------------
DROP VIEW IF EXISTS `view_department_jawatan`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `view_department_jawatan` AS select `dept_jaw`.`id_user_department` AS `id_user_department`,`user_department`.`dept_ctrlr` AS `dept_ctrlr`,`user_department`.`dept` AS `dept`,`dept_jaw`.`id_jawatan` AS `id_jawatan`,`user_jawatan`.`jawatan` AS `jawatan` from ((`dept_jaw` join `user_jawatan` on((`dept_jaw`.`id_jawatan` = `user_jawatan`.`id`))) join `user_department` on((`user_department`.`id` = `dept_jaw`.`id_user_department`))) order by `dept_jaw`.`id_user_department`,`dept_jaw`.`id_jawatan` ;

-- ----------------------------
-- View structure for `view_sel_negara_negeri_bandar`
-- ----------------------------
DROP VIEW IF EXISTS `view_sel_negara_negeri_bandar`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `view_sel_negara_negeri_bandar` AS select `sel_negeri`.`kodnegara` AS `kodnegara`,`sel_negara`.`namanegara` AS `namanegara`,`sel_negara`.`prefix` AS `prefix`,`sel_negeri`.`kodnegeri` AS `kodnegeri`,`sel_negeri`.`namanegeri` AS `namanegeri`,`sel_bandar`.`kodbandar` AS `kodbandar`,`sel_bandar`.`namabandar` AS `namabandar` from ((`sel_negara` join `sel_negeri` on((`sel_negara`.`kodnegara` = `sel_negeri`.`kodnegara`))) join `sel_bandar` on(((`sel_negeri`.`kodnegeri` = `sel_bandar`.`kodnegeri`) and (`sel_negara`.`kodnegara` = `sel_bandar`.`kodnegara`)))) ;

-- ----------------------------
-- View structure for `view_sesi_taqwim`
-- ----------------------------
DROP VIEW IF EXISTS `view_sesi_taqwim`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `view_sesi_taqwim` AS select `item_taqwim`.`kod_item` AS `kod_item`,`item_taqwim`.`item_MY` AS `item_MY`,`sesi_taqwim`.`sesi` AS `sesi`,`sesi_taqwim`.`tarikh_mula` AS `tarikh_mula`,`sesi_taqwim`.`tarikh_tamat` AS `tarikh_tamat`,`item_taqwim`.`posisi` AS `posisi` from (`item_taqwim` join `sesi_taqwim` on((`item_taqwim`.`kod_item` = `sesi_taqwim`.`kod_item`))) order by `item_taqwim`.`posisi`,`sesi_taqwim`.`sesi` ;

-- ----------------------------
-- View structure for `view_taqwim`
-- ----------------------------
DROP VIEW IF EXISTS `view_taqwim`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `view_taqwim` AS select ((to_days(`sesi_taqwim`.`tarikh_tamat`) - to_days(`sesi_taqwim`.`tarikh_mula`)) + 1) AS `tempoh`,`item_taqwim`.`item_MY` AS `item_MY`,`sesi_taqwim`.`tarikh_mula` AS `t_mula`,`sesi_taqwim`.`tarikh_tamat` AS `t_tamat`,`sesi_taqwim`.`sesi` AS `sesi`,`sesi_akademik`.`namasesi_MY` AS `namasesi_MY`,`sesi_akademik`.`tahun` AS `tahun`,`sesi_akademik`.`tarikh_mula` AS `tarikh_mula`,`sesi_akademik`.`tarikh_tamat` AS `tarikh_tamat` from ((`sesi_akademik` join `sesi_taqwim` on((`sesi_taqwim`.`sesi` = `sesi_akademik`.`kodsesi`))) join `item_taqwim` on((`sesi_taqwim`.`kod_item` = `item_taqwim`.`kod_item`))) order by `sesi_taqwim`.`tarikh_mula`,`item_taqwim`.`posisi` ;

-- ----------------------------
-- View structure for `view_user_department`
-- ----------------------------
DROP VIEW IF EXISTS `view_user_department`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `view_user_department` AS select `user_dept`.`id_user_data` AS `id_user_data`,`user_data`.`username` AS `username`,`user_data`.`password` AS `password`,`user_data`.`name` AS `name`,`user_dept`.`id_user_department` AS `id_user_department`,`user_department`.`dept_ctrlr` AS `dept_ctrlr`,`user_department`.`dept` AS `dept` from ((`user_data` join `user_dept` on((`user_dept`.`id_user_data` = `user_data`.`id`))) join `user_department` on((`user_dept`.`id_user_department` = `user_department`.`id`))) ;

-- ----------------------------
-- View structure for `view_user_dept_func_level`
-- ----------------------------
DROP VIEW IF EXISTS `view_user_dept_func_level`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `view_user_dept_func_level` AS select `user_dept_func`.`id` AS `id`,`user_dept_func`.`id_user_data` AS `id_user_data`,`user_data`.`name` AS `name`,`user_dept_func`.`id_user_department` AS `id_user_department`,`user_department`.`dept_ctrlr` AS `dept_ctrlr`,`user_department`.`dept` AS `dept`,`user_dept_func`.`id_user_function` AS `id_user_function`,`user_function`.`function` AS `function`,`user_function`.`remarks` AS `remarks`,`user_dept_func`.`active` AS `active` from (((`user_data` join `user_department`) join `user_dept_func` on(((`user_dept_func`.`id_user_data` = `user_data`.`id`) and (`user_dept_func`.`id_user_department` = `user_department`.`id`)))) join `user_function` on((`user_dept_func`.`id_user_function` = `user_function`.`id`))) ;

-- ----------------------------
-- View structure for `view_user_dept_jaw`
-- ----------------------------
DROP VIEW IF EXISTS `view_user_dept_jaw`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `view_user_dept_jaw` AS select `user_dept_jaw`.`id` AS `id`,`user_dept_jaw`.`id_user_data` AS `id_user_data`,`user_data`.`name` AS `name`,`user_dept_jaw`.`id_user_department` AS `id_user_department`,`user_department`.`dept_ctrlr` AS `dept_ctrlr`,`user_department`.`dept` AS `dept`,`user_dept_jaw`.`id_user_jawatan` AS `id_user_jawatan`,`user_jawatan`.`jawatan` AS `jawatan`,`user_jawatan`.`remarks` AS `remarks` from (((`user_dept_jaw` join `user_data` on((`user_dept_jaw`.`id_user_data` = `user_data`.`id`))) join `user_department` on((`user_dept_jaw`.`id_user_department` = `user_department`.`id`))) join `user_jawatan` on((`user_dept_jaw`.`id_user_jawatan` = `user_jawatan`.`id`))) order by `user_data`.`name`,`user_dept_jaw`.`id_user_department`,`user_dept_jaw`.`id_user_jawatan` ;

-- ----------------------------
-- View structure for `view_yuran_program`
-- ----------------------------
DROP VIEW IF EXISTS `view_yuran_program`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY INVOKER VIEW `view_yuran_program` AS select `program`.`namaprog_MY` AS `namaprog_MY`,`akaun`.`keterangan_MY` AS `keterangan_MY`,`yuran_prog`.`jumlah` AS `jumlah`,`yuran_prog`.`kategori` AS `kategori`,`akaun`.`kod_akaun` AS `kod_akaun`,`yuran_prog`.`kod_prog` AS `kod_prog` from ((`akaun` join `yuran_prog` on((`akaun`.`kod_akaun` = `yuran_prog`.`kod_akaun`))) join `program` on((`yuran_prog`.`kod_prog` = `program`.`kod_prog`))) ;
