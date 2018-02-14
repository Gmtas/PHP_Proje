/*
Navicat MySQL Data Transfer

Source Server         : Gokhan
Source Server Version : 50717
Source Host           : localhost:3306
Source Database       : proje

Target Server Type    : MYSQL
Target Server Version : 50717
File Encoding         : 65001

Date: 2018-02-12 14:34:25
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for t_cities
-- ----------------------------
DROP TABLE IF EXISTS `t_cities`;
CREATE TABLE `t_cities` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `city_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `t_cities_id` (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_cities
-- ----------------------------
INSERT INTO `t_cities` VALUES ('1', 'Lefkoşa');
INSERT INTO `t_cities` VALUES ('2', 'Girne');
INSERT INTO `t_cities` VALUES ('3', 'Lefke');
INSERT INTO `t_cities` VALUES ('4', 'GüzelYurt');
INSERT INTO `t_cities` VALUES ('5', 'Mağusa');

-- ----------------------------
-- Table structure for t_customers
-- ----------------------------
DROP TABLE IF EXISTS `t_customers`;
CREATE TABLE `t_customers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `isim` varchar(255) DEFAULT NULL,
  `soyisim` varchar(255) DEFAULT NULL,
  `telefon` varchar(255) DEFAULT NULL,
  `adres` varchar(255) DEFAULT NULL,
  `city_id` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `t_cus_city_id` (`city_id`) USING BTREE,
  CONSTRAINT `t_cus_city_id` FOREIGN KEY (`city_id`) REFERENCES `t_cities` (`id`) ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_customers
-- ----------------------------
INSERT INTO `t_customers` VALUES ('1', 'Gökhan', 'Mortaş', '0533 843 11 92', 'x sokak no:2 Zeytinlik', '1');
INSERT INTO `t_customers` VALUES ('2', 'Mustafa', 'Ak', '0533 844 33 68', 'y sokak no:19 Çatalköy', '2');
INSERT INTO `t_customers` VALUES ('3', 'Ayşe', 'Soytürk', '0542 798 13 79', 'z sokak no:13 Kalkanlı', '3');
INSERT INTO `t_customers` VALUES ('8', 'Ahmet ', 'Zengin', '0533 641 02 35', 'abc sokak no:23 Salamis', '3');
INSERT INTO `t_customers` VALUES ('14', 'Ahmethh', '', '', '', '1');

-- ----------------------------
-- Table structure for t_groups
-- ----------------------------
DROP TABLE IF EXISTS `t_groups`;
CREATE TABLE `t_groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `aciklama` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_groups
-- ----------------------------
INSERT INTO `t_groups` VALUES ('1', 'Administor');
INSERT INTO `t_groups` VALUES ('2', 'Supplier');

-- ----------------------------
-- Table structure for t_permissions
-- ----------------------------
DROP TABLE IF EXISTS `t_permissions`;
CREATE TABLE `t_permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `permission` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`,`group_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_permissions
-- ----------------------------
INSERT INTO `t_permissions` VALUES ('1', '1', 'view_add_edit_delete');
INSERT INTO `t_permissions` VALUES ('2', '2', 'view');

-- ----------------------------
-- Table structure for t_users
-- ----------------------------
DROP TABLE IF EXISTS `t_users`;
CREATE TABLE `t_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `group_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_group_id` (`group_id`),
  CONSTRAINT `FK_group_id` FOREIGN KEY (`group_id`) REFERENCES `t_groups` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_users
-- ----------------------------
INSERT INTO `t_users` VALUES ('1', 'admin1', '1111', '1');
INSERT INTO `t_users` VALUES ('2', 'supp1', '2222', '2');
