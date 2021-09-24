/*
 Navicat Premium Data Transfer

 Source Server         : Lokal Ajahhh
 Source Server Type    : MySQL
 Source Server Version : 50733
 Source Host           : localhost:3306
 Source Schema         : dbs_sifo_sikambing

 Target Server Type    : MySQL
 Target Server Version : 50733
 File Encoding         : 65001

 Date: 24/09/2021 11:07:10
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tbl_bahan
-- ----------------------------
DROP TABLE IF EXISTS `tbl_bahan`;
CREATE TABLE `tbl_bahan`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kd_kategori` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `deks` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `satuan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `aktif` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 46 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_bahan
-- ----------------------------
INSERT INTO `tbl_bahan` VALUES (1, 'SAYUR', 'Bayam', NULL, 'Kg', 'y');
INSERT INTO `tbl_bahan` VALUES (2, 'SAYUR', 'Bawang Merah', NULL, 'Kg', 'y');
INSERT INTO `tbl_bahan` VALUES (3, 'DAGING', 'Daging Ayam Potong', NULL, 'Kg', 'y');
INSERT INTO `tbl_bahan` VALUES (4, 'BUMBU', 'Bumbu Rendang', NULL, 'Pcs', 'y');
INSERT INTO `tbl_bahan` VALUES (5, 'TEPUNG', 'Tepung Terigu', NULL, 'Liter', 'y');
INSERT INTO `tbl_bahan` VALUES (6, 'SAYUR', 'Kol', NULL, 'Kg', 'y');
INSERT INTO `tbl_bahan` VALUES (7, 'SAYUR', 'Buncis', NULL, 'Kg', 'y');
INSERT INTO `tbl_bahan` VALUES (8, 'SAYUR', 'Wortel', NULL, 'Kg', 'y');
INSERT INTO `tbl_bahan` VALUES (9, 'SAYUR', 'Prei', NULL, 'Kg', 'y');
INSERT INTO `tbl_bahan` VALUES (10, 'SAYUR', 'Kacang Merah', NULL, 'Kg', 'y');
INSERT INTO `tbl_bahan` VALUES (11, 'SAYUR', 'Kacang Panjang', NULL, 'Kg', 'y');
INSERT INTO `tbl_bahan` VALUES (12, 'SAYUR', 'Kacang Kedelai', NULL, 'Kg', 'y');
INSERT INTO `tbl_bahan` VALUES (13, 'SAYUR', 'Tomat Merah', NULL, 'Kg', 'y');
INSERT INTO `tbl_bahan` VALUES (14, 'SAYUR', 'Tomat Hijau', NULL, 'Kg', 'y');
INSERT INTO `tbl_bahan` VALUES (15, 'SAYUR', 'Cabai Merah', NULL, 'Kg', 'y');
INSERT INTO `tbl_bahan` VALUES (16, 'SAYUR', 'Cabai Hijau', NULL, 'Kg', 'y');
INSERT INTO `tbl_bahan` VALUES (17, 'SAYUR', 'Brokoli', NULL, 'Kg', 'y');
INSERT INTO `tbl_bahan` VALUES (18, 'SAYUR', 'Paprika', NULL, 'Kg', 'y');
INSERT INTO `tbl_bahan` VALUES (19, 'DAGING', 'Daging Sapi', NULL, 'Kg', 'y');
INSERT INTO `tbl_bahan` VALUES (20, 'DAGING', 'Cincang Sapi', NULL, 'Kg', 'y');
INSERT INTO `tbl_bahan` VALUES (21, 'BUMBU', 'Bumbu Gulai Ayam', NULL, 'Pcs', 'y');
INSERT INTO `tbl_bahan` VALUES (22, 'BUAH', 'Jeruk', NULL, 'Kg', 'y');
INSERT INTO `tbl_bahan` VALUES (23, 'BUAH', 'Apel', NULL, 'Kg', 'y');
INSERT INTO `tbl_bahan` VALUES (24, 'BUAH', 'Markisa', NULL, 'Kg', 'y');
INSERT INTO `tbl_bahan` VALUES (25, 'BUAH', 'Alpukat', NULL, 'Kg', 'y');
INSERT INTO `tbl_bahan` VALUES (26, 'BUAH', 'Pir', NULL, 'Kg', 'y');
INSERT INTO `tbl_bahan` VALUES (27, 'BUMBU', 'Gula Merah', NULL, 'Liter', 'y');
INSERT INTO `tbl_bahan` VALUES (28, 'BUMBU', 'Gula Pasir', NULL, 'Liter', 'y');
INSERT INTO `tbl_bahan` VALUES (29, 'SAYUR', 'Bawang Bombai', NULL, 'Kg', 'y');
INSERT INTO `tbl_bahan` VALUES (30, 'SAYUR', 'Selada Hijau', NULL, 'Kg', 'y');
INSERT INTO `tbl_bahan` VALUES (31, 'BUAH', 'Anggur', NULL, 'Kg', 'y');
INSERT INTO `tbl_bahan` VALUES (32, 'BUAH', 'Naga', NULL, 'Kg', 'y');
INSERT INTO `tbl_bahan` VALUES (33, 'TEPUNG', 'Tepung Jagung', NULL, 'Liter', 'y');
INSERT INTO `tbl_bahan` VALUES (34, 'MINYAK', 'Minyak Goreng Curah', NULL, 'Liter', 'y');
INSERT INTO `tbl_bahan` VALUES (35, 'IKAN', 'Ikan Bandeng', NULL, 'Kg', 'y');
INSERT INTO `tbl_bahan` VALUES (36, 'IKAN', 'Ikan Tongkol', NULL, 'Kg', 'y');
INSERT INTO `tbl_bahan` VALUES (37, 'IKAN', 'Ikan Kembung', NULL, 'Kg', 'y');
INSERT INTO `tbl_bahan` VALUES (38, 'IKAN', 'Ikan Tuna', NULL, 'Kg', 'y');
INSERT INTO `tbl_bahan` VALUES (39, 'IKAN', 'Udang', NULL, 'Kg', 'y');
INSERT INTO `tbl_bahan` VALUES (40, 'IKAN', 'Kepiting', NULL, 'Kg', 'y');
INSERT INTO `tbl_bahan` VALUES (41, 'IKAN', 'Kerang', NULL, 'Kg', 'y');
INSERT INTO `tbl_bahan` VALUES (42, 'TELUR', 'Telur Ayam Australia', NULL, 'Pcs', 'y');
INSERT INTO `tbl_bahan` VALUES (43, 'TELUR', 'Telur Ayam Kampung', NULL, 'Pcs', 'y');
INSERT INTO `tbl_bahan` VALUES (44, 'TELUR', 'Telur Burung Puyuh', NULL, 'Pcs', 'y');
INSERT INTO `tbl_bahan` VALUES (45, 'TELUR', 'Telur Bebek', NULL, 'Pcs', 'y');

-- ----------------------------
-- Table structure for tbl_kategori
-- ----------------------------
DROP TABLE IF EXISTS `tbl_kategori`;
CREATE TABLE `tbl_kategori`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kd` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `deks` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `aktif` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_kategori
-- ----------------------------
INSERT INTO `tbl_kategori` VALUES (1, 'SAYUR', 'Sayur', NULL, 'y');
INSERT INTO `tbl_kategori` VALUES (2, 'BUAH', 'Buah', NULL, 'y');
INSERT INTO `tbl_kategori` VALUES (3, 'BUMBU', 'Bumbu', NULL, 'y');
INSERT INTO `tbl_kategori` VALUES (4, 'DAGING', 'Daging', NULL, 'y');
INSERT INTO `tbl_kategori` VALUES (5, 'TEPUNG', 'Tepung', NULL, 'y');
INSERT INTO `tbl_kategori` VALUES (6, 'IKAN', 'Ikan', NULL, 'y');
INSERT INTO `tbl_kategori` VALUES (7, 'MINYAK', 'Minyak', NULL, 'y');
INSERT INTO `tbl_kategori` VALUES (8, 'TELUR', 'Telur', NULL, 'y');

-- ----------------------------
-- Table structure for tbl_produk
-- ----------------------------
DROP TABLE IF EXISTS `tbl_produk`;
CREATE TABLE `tbl_produk`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kd` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kd_bahan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `deks` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `harga` int(255) NULL DEFAULT NULL,
  `stok` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `username_penjual` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status_diskon` varchar(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `total_diskon` int(255) NULL DEFAULT NULL,
  `dilihat` int(255) NULL DEFAULT NULL,
  `aktif` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_produk
-- ----------------------------
INSERT INTO `tbl_produk` VALUES (12, '8zxhf5tkjm', '1', 'Bayam segar kita', 'Bayam', 5000, '12', 'aditia', 'n', 0, 49, 'y');
INSERT INTO `tbl_produk` VALUES (13, '78gzcxd6uv', '15', 'Cabai Merah Biasa', 'Cabai merah', 12000, '12', 'aditia', 'n', 0, 16, 'y');
INSERT INTO `tbl_produk` VALUES (15, 'n6o7br91z2', '19', 'Daging Sapi', 'Daging sapi biasa', 70000, '12', 'alfian', 'n', 0, 1, 'y');
INSERT INTO `tbl_produk` VALUES (16, 'jbh36q2o0e', '6', 'Kol', 'Kol', 30000, '10', 'alfian', 'n', 0, 1, 'y');
INSERT INTO `tbl_produk` VALUES (17, 'wdz9qja3uh', '8', 'Wortel ', 'Wortel Biasa', 12000, '12', 'alfian', 'n', 0, 2, 'y');
INSERT INTO `tbl_produk` VALUES (18, '2duck60nbm', '7', 'Buncis segar', 'Buncis dari kebun', 11000, '15', 'irma', 'y', 5, 5, 'y');
INSERT INTO `tbl_produk` VALUES (19, 'igshtk842j', '23', 'Apel China', 'Apel china segar', 24000, '20', 'irma', 'n', 0, 4, 'y');
INSERT INTO `tbl_produk` VALUES (20, 'fpz0uhwack', '22', 'Jeruk Madu Spesial 2', 'jeruk spesial 2', 70000, '12', 'irma', 'y', 9, 6, 'y');

-- ----------------------------
-- Table structure for tbl_profil_seller
-- ----------------------------
DROP TABLE IF EXISTS `tbl_profil_seller`;
CREATE TABLE `tbl_profil_seller`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_lengkap` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_toko` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nomor_hp` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_profil_seller
-- ----------------------------
INSERT INTO `tbl_profil_seller` VALUES (1, 'aditia', 'Aditia Darma', 'Toko Adit', 'Medan', '0989999312');
INSERT INTO `tbl_profil_seller` VALUES (2, 'alfian', 'Alfiansyah', 'Toko Alfian', 'Medan', '08789922');
INSERT INTO `tbl_profil_seller` VALUES (3, 'irma', 'Irma Ismaliani Nst', 'Kedai Irma', 'Perbaungan', '087890223312');

-- ----------------------------
-- Table structure for tbl_user
-- ----------------------------
DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE `tbl_user`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tipe` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `aktif` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_user
-- ----------------------------
INSERT INTO `tbl_user` VALUES (5, 'aditia', 'admin', 'seller', 'y');
INSERT INTO `tbl_user` VALUES (6, 'alfian', 'admin', 'seller', 'y');
INSERT INTO `tbl_user` VALUES (7, 'irma', 'admin', 'seller', 'y');

SET FOREIGN_KEY_CHECKS = 1;
