/*
 Navicat Premium Data Transfer

 Source Server         : Connection MySQL
 Source Server Type    : MySQL
 Source Server Version : 50724
 Source Host           : localhost:3306
 Source Schema         : project_puskes_gambah

 Target Server Type    : MySQL
 Target Server Version : 50724
 File Encoding         : 65001

 Date: 07/07/2021 15:59:55
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for anak
-- ----------------------------
DROP TABLE IF EXISTS `anak`;
CREATE TABLE `anak`  (
  `id_anak` int(11) NOT NULL AUTO_INCREMENT,
  `nama_anak` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jk` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tempat_lahir` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl_lahir` date NULL DEFAULT NULL,
  `berat_badan` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tinggi_badan` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_ayah` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_ibu` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  PRIMARY KEY (`id_anak`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of anak
-- ----------------------------

-- ----------------------------
-- Table structure for ibu_hamil
-- ----------------------------
DROP TABLE IF EXISTS `ibu_hamil`;
CREATE TABLE `ibu_hamil`  (
  `id_ibu_hamil` int(11) NOT NULL AUTO_INCREMENT,
  `no_kia` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_ibu_hamil` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_suami` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `status_kehamilan` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `hpht` date NULL DEFAULT NULL,
  `usia_kehamilan` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `hpl` date NULL DEFAULT NULL,
  PRIMARY KEY (`id_ibu_hamil`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ibu_hamil
-- ----------------------------

-- ----------------------------
-- Table structure for ibu_hamil_melahirkan
-- ----------------------------
DROP TABLE IF EXISTS `ibu_hamil_melahirkan`;
CREATE TABLE `ibu_hamil_melahirkan`  (
  `id_kelahiran` int(11) NOT NULL AUTO_INCREMENT,
  `id_ibu_hamil` int(11) NULL DEFAULT NULL,
  `tgl_melahirkan` date NULL DEFAULT NULL,
  `usia_kehamilan` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tempat_persalinan` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `penolong_persalinan` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `keadaan_ibu` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `keadaan_anak` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_pegawai` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_kelahiran`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ibu_hamil_melahirkan
-- ----------------------------

-- ----------------------------
-- Table structure for jenis_imunisasi
-- ----------------------------
DROP TABLE IF EXISTS `jenis_imunisasi`;
CREATE TABLE `jenis_imunisasi`  (
  `id_imunisasi` int(11) NOT NULL AUTO_INCREMENT,
  `kode_imunisasi` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jenis_imunisasi` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `usia_wajib` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_imunisasi`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of jenis_imunisasi
-- ----------------------------

-- ----------------------------
-- Table structure for jenis_vitamin
-- ----------------------------
DROP TABLE IF EXISTS `jenis_vitamin`;
CREATE TABLE `jenis_vitamin`  (
  `id_vitamin` int(11) NOT NULL AUTO_INCREMENT,
  `kode_vitamin` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jenis_vitamin` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `usia_wajib` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_vitamin`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of jenis_vitamin
-- ----------------------------

-- ----------------------------
-- Table structure for kehadiran_anak
-- ----------------------------
DROP TABLE IF EXISTS `kehadiran_anak`;
CREATE TABLE `kehadiran_anak`  (
  `id_kehadiran_anak` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_kehadiran` date NULL DEFAULT NULL,
  `id_anak` int(11) NULL DEFAULT NULL,
  `bb_anak` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tb_anak` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `lingkar_kepala` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_pegawai` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_kehadiran_anak`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kehadiran_anak
-- ----------------------------

-- ----------------------------
-- Table structure for kehadiran_ibu_hamil
-- ----------------------------
DROP TABLE IF EXISTS `kehadiran_ibu_hamil`;
CREATE TABLE `kehadiran_ibu_hamil`  (
  `id_kehadiran_ibu` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_kehadiran` date NULL DEFAULT NULL,
  `id_ibu_hamil` int(11) NULL DEFAULT NULL,
  `hpl` date NULL DEFAULT NULL,
  `usia_kehamilan` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `berat_badan` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tinggi_badan` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tensi` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `keluhan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `saran` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `id_pegawai` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_kehadiran_ibu`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kehadiran_ibu_hamil
-- ----------------------------

-- ----------------------------
-- Table structure for kematian_anak
-- ----------------------------
DROP TABLE IF EXISTS `kematian_anak`;
CREATE TABLE `kematian_anak`  (
  `id_kematian_anak` int(11) NOT NULL AUTO_INCREMENT,
  `id_anak` int(11) NULL DEFAULT NULL,
  `tgl_kematian` date NULL DEFAULT NULL,
  `penyebab_kematian` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `tempat_kematian` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_pegawai` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_kematian_anak`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kematian_anak
-- ----------------------------

-- ----------------------------
-- Table structure for kematian_ibu_hamil
-- ----------------------------
DROP TABLE IF EXISTS `kematian_ibu_hamil`;
CREATE TABLE `kematian_ibu_hamil`  (
  `id_kematian_ibu` int(11) NOT NULL AUTO_INCREMENT,
  `id_ibu_hamil` int(11) NULL DEFAULT NULL,
  `tgl_kematian` date NULL DEFAULT NULL,
  `usia_kehamilan` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `penyebab` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `tempat_kematian` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `keadaan_janin` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_pegawai` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_kematian_ibu`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kematian_ibu_hamil
-- ----------------------------

-- ----------------------------
-- Table structure for pegawai
-- ----------------------------
DROP TABLE IF EXISTS `pegawai`;
CREATE TABLE `pegawai`  (
  `id_pegawai` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_pegawai` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jk` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `no_hp` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_user` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_pegawai`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pegawai
-- ----------------------------

-- ----------------------------
-- Table structure for pemberian_imunisasi
-- ----------------------------
DROP TABLE IF EXISTS `pemberian_imunisasi`;
CREATE TABLE `pemberian_imunisasi`  (
  `id_pemberian_imunisasi` int(11) NOT NULL AUTO_INCREMENT,
  `id_anak` int(11) NULL DEFAULT NULL,
  `usia_anak` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl_pemberian` date NULL DEFAULT NULL,
  `id_imunisasi` int(11) NULL DEFAULT NULL,
  `id_pegawai` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_pemberian_imunisasi`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pemberian_imunisasi
-- ----------------------------

-- ----------------------------
-- Table structure for pemberian_vitamin
-- ----------------------------
DROP TABLE IF EXISTS `pemberian_vitamin`;
CREATE TABLE `pemberian_vitamin`  (
  `id_pemberian_vitamin` int(11) NOT NULL AUTO_INCREMENT,
  `id_anak` int(11) NULL DEFAULT NULL,
  `usia_anak` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl_pemberian` date NULL DEFAULT NULL,
  `id_vitamin` int(11) NULL DEFAULT NULL,
  `id_pegawai` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_pemberian_vitamin`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pemberian_vitamin
-- ----------------------------

-- ----------------------------
-- Table structure for perkembangan_gizi_berat_badan
-- ----------------------------
DROP TABLE IF EXISTS `perkembangan_gizi_berat_badan`;
CREATE TABLE `perkembangan_gizi_berat_badan`  (
  `id_gizi_bb` int(11) NOT NULL AUTO_INCREMENT,
  `id_anak` int(11) NULL DEFAULT NULL,
  `tgl_cek` date NULL DEFAULT NULL,
  `bb_anak` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `usia_anak` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kategori_gizi` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_pegawai` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_gizi_bb`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of perkembangan_gizi_berat_badan
-- ----------------------------

-- ----------------------------
-- Table structure for perkembangan_gizi_tinggi_badan
-- ----------------------------
DROP TABLE IF EXISTS `perkembangan_gizi_tinggi_badan`;
CREATE TABLE `perkembangan_gizi_tinggi_badan`  (
  `id_gizi_tb` int(11) NOT NULL AUTO_INCREMENT,
  `id_anak` int(11) NULL DEFAULT NULL,
  `tgl_cek` date NULL DEFAULT NULL,
  `tb_anak` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `usia_anak` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kategori_gizi` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_pegawai` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_gizi_tb`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of perkembangan_gizi_tinggi_badan
-- ----------------------------

-- ----------------------------
-- Table structure for role
-- ----------------------------
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role`  (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_role`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of role
-- ----------------------------
INSERT INTO `role` VALUES (1, 'admin');
INSERT INTO `role` VALUES (2, 'pegawai');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama_user` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_role` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'Gusti MF', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1);

SET FOREIGN_KEY_CHECKS = 1;
