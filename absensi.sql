/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 80029
 Source Host           : localhost:55000
 Source Schema         : absensi

 Target Server Type    : MySQL
 Target Server Version : 80029
 File Encoding         : 65001

 Date: 05/10/2022 19:46:33
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for anggota
-- ----------------------------
DROP TABLE IF EXISTS `anggota`;
CREATE TABLE `anggota` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `uid` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3;

-- ----------------------------
-- Records of anggota
-- ----------------------------
BEGIN;
INSERT INTO `anggota` VALUES (2, 'Andi Fajar', 'fajar', '2022-10-05 11:26:51', '2022-10-05 11:26:51');
COMMIT;

-- ----------------------------
-- Table structure for kehadiran
-- ----------------------------
DROP TABLE IF EXISTS `kehadiran`;
CREATE TABLE `kehadiran` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `anggota_id` bigint DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `anggota_id` (`anggota_id`),
  CONSTRAINT `kehadiran_ibfk_1` FOREIGN KEY (`anggota_id`) REFERENCES `anggota` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB;

-- ----------------------------
-- Records of kehadiran
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for pelacakan
-- ----------------------------
DROP TABLE IF EXISTS `pelacakan`;
CREATE TABLE `pelacakan` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `anggota_id` bigint DEFAULT NULL,
  `long` varchar(255) DEFAULT NULL,
  `lat` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `anggota_id` (`anggota_id`),
  CONSTRAINT `pelacakan_ibfk_1` FOREIGN KEY (`anggota_id`) REFERENCES `anggota` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2;

-- ----------------------------
-- Records of pelacakan
-- ----------------------------
BEGIN;
INSERT INTO `pelacakan` VALUES (1, 2, '123', '321', '2022-10-05 11:43:59', '2022-10-05 11:43:59');
COMMIT;

-- ----------------------------
-- Table structure for pengguna
-- ----------------------------
DROP TABLE IF EXISTS `pengguna`;
CREATE TABLE `pengguna` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `nama` varchar(255)  DEFAULT NULL,
  `uid` varchar(255)  DEFAULT NULL,
  `kata_sandi` varchar(255)  DEFAULT NULL,
  `level` tinyint DEFAULT NULL,
  `remember_token` varchar(255)  DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of pengguna
-- ----------------------------
BEGIN;
INSERT INTO `pengguna` VALUES (1, 'Administrator', 'admin', '$2y$10$xgzwJnE4jr9jhPzVw7SCBeCEUv413nGud2CyQyTShZBuzbivUN.Cm', 1, NULL, '2022-10-05 00:44:39', '2022-10-05 09:39:57');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
