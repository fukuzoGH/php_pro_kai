/*
p051

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : shop

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001


*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `mst_staff`
-- ----------------------------
DROP TABLE IF EXISTS `mst_staff`;
CREATE TABLE `mst_staff` (
  `code` int(11) NOT NULL AUTO_INCREMENT COMMENT 'スタッフコード',
  `name` varchar(15) NOT NULL DEFAULT '' COMMENT 'スタッフ名',
  `password` varchar(32) NOT NULL DEFAULT '' COMMENT 'パスワード',
  PRIMARY KEY (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='スタッフ\r\n';

-- ----------------------------
-- Records of mst_staff
-- ----------------------------
INSERT INTO `mst_staff` VALUES ('1', 'ろくまる', '12345678901234567890123456789012');
