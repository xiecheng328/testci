/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100113
 Source Host           : localhost
 Source Database       : test

 Target Server Type    : MySQL
 Target Server Version : 100113
 File Encoding         : utf-8

 Date: 12/19/2016 15:19:17 PM
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `password` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
--  Records of `user`
-- ----------------------------
BEGIN;
INSERT INTO `user` VALUES ('1', 'abc', 'abc'), ('2', '等等', 'bb'), ('3', '大大滴', 'ddd'), ('4', '啊啊', '111'), ('5', '啊啊啊', '111'), ('6', '不不', 'bbb'), ('7', '不不不', 'bbb'), ('9', 'a1', 'dd'), ('10', 'a2', 'z'), ('11', 'a3', 'z'), ('14', 'aabb', 'd'), ('15', 'aaccc', 'vvd'), ('16', '你', 'm'), ('17', 'cc', 'cc'), ('18', 'vvv', 'vv');
COMMIT;

-- ----------------------------
--  Procedure structure for `AddGeometryColumn`
-- ----------------------------
DROP PROCEDURE IF EXISTS `AddGeometryColumn`;
delimiter ;;
CREATE DEFINER=`` PROCEDURE `AddGeometryColumn`(catalog varchar(64), t_schema varchar(64),
   t_name varchar(64), geometry_column varchar(64), t_srid int)
begin
  set @qwe= concat('ALTER TABLE ', t_schema, '.', t_name, ' ADD ', geometry_column,' GEOMETRY REF_SYSTEM_ID=', t_srid); PREPARE ls from @qwe; execute ls; deallocate prepare ls; end
 ;;
delimiter ;

-- ----------------------------
--  Procedure structure for `DropGeometryColumn`
-- ----------------------------
DROP PROCEDURE IF EXISTS `DropGeometryColumn`;
delimiter ;;
CREATE DEFINER=`` PROCEDURE `DropGeometryColumn`(catalog varchar(64), t_schema varchar(64),
   t_name varchar(64), geometry_column varchar(64))
begin
  set @qwe= concat('ALTER TABLE ', t_schema, '.', t_name, ' DROP ', geometry_column); PREPARE ls from @qwe; execute ls; deallocate prepare ls; end
 ;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;
