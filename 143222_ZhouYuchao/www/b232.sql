/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50156
Source Host           : localhost:3306
Source Database       : b232

Target Server Type    : MYSQL
Target Server Version : 50156
File Encoding         : 65001

Date: 2012-05-08 22:23:46
*/


create database b232;
use b232;

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `comment`
-- ----------------------------
DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `picID` text,
  `author` text,
  `content` text,
  `time` text
) ENGINE=InnoDB DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of comment
-- ----------------------------
INSERT INTO `comment` VALUES ('3', '200919100232', 'WOW,It is SH!', '2012-05-08');
INSERT INTO `comment` VALUES ('3', '200919100232', 'wow', '2012-05-08');
INSERT INTO `comment` VALUES ('3', '200919100232', 'good, man.', '2012-05-08');
INSERT INTO `comment` VALUES ('3', '200919100232', 'i love him.', '2012-05-08');
INSERT INTO `comment` VALUES ('3', '200919100232', 'i love him, too.', '2012-05-08');
INSERT INTO `comment` VALUES ('2', '200919100232', 'wow, it is beautiful~', '2012-05-08');
INSERT INTO `comment` VALUES ('2', '200919100232', 'he is cute~', '2012-05-08');
INSERT INTO `comment` VALUES ('3', '200919100232', 'study!', '2012-05-08');
INSERT INTO `comment` VALUES ('3', '200919100232', 'go to study!', '2012-05-08');
INSERT INTO `comment` VALUES ('3', '200919100232', 'go to study!', '2012-05-08');
INSERT INTO `comment` VALUES ('3', '200919100232', 'what a fuck day!', '2012-05-08');
INSERT INTO `comment` VALUES ('3', '200919100232', 'what a fucking day!', '2012-05-08');
INSERT INTO `comment` VALUES ('3', '200919100232', 'txtHint', '2012-05-08');
INSERT INTO `comment` VALUES ('2', '200919100232', 'good boy~', '2012-05-08');
INSERT INTO `comment` VALUES ('2', '200919100232', 'good good boy~', '2012-05-08');
INSERT INTO `comment` VALUES ('1', '200919100232', 'how to the pic is!', '2012-05-08');
INSERT INTO `comment` VALUES ('1', '200919100232', 'geiliable~', '2012-05-08');
INSERT INTO `comment` VALUES ('1', '200919100232', 'good good study, day day up.', '2012-05-08');
INSERT INTO `comment` VALUES ('3', '200919100232', 'wow cool', '2012-05-08');
INSERT INTO `comment` VALUES ('4', '200919100232', 'it is beautiful~', '2012-05-08');
INSERT INTO `comment` VALUES ('6', '15068877307', 'it is cute', '2012-05-08');
INSERT INTO `comment` VALUES ('6', '200919100232', 'asdasd', '2012-05-08');

-- ----------------------------
-- Table structure for `list`
-- ----------------------------
DROP TABLE IF EXISTS `list`;
CREATE TABLE `list` (
  `picname` text,
  `picID` text,
  `picauthor` text,
  `time` text
) ENGINE=InnoDB DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of list
-- ----------------------------
INSERT INTO `list` VALUES ('original_mqzp_49db00000f4c118e.jpg', '0', '200919100232', '2012-05-08');
INSERT INTO `list` VALUES ('p_large_TRft_68b6000191775c42.jpg', '1', '200919100232', '2012-05-08');
INSERT INTO `list` VALUES ('IMG_0060.JPG', '2', '200919100232', '2012-05-08');
INSERT INTO `list` VALUES ('original_mqzp_49db00000f4c118e.jpg', '3', '200919100232', '2012-05-08');
INSERT INTO `list` VALUES ('2011080712300585.jpg', '4', '200919100232', '2012-05-08');
INSERT INTO `list` VALUES ('89645f9egw1dr0w7qfq7lj.jpg', '5', '200919100232', '2012-05-08');
INSERT INTO `list` VALUES ('p_large_7ebI_14ee0000d2941210.jpg', '6', '15068877307', '2012-05-08');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `username` text,
  `password` text,
  `email` text,
  `age` text,
  `sex` text,
  `time` text,
  `ways` text
) ENGINE=InnoDB DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('200919100232', '123', '513629287@qq.com', '22', 'Male', 'One', '2');
INSERT INTO `users` VALUES ('15068877307', '123321', '4262485789@qq.com', '22', 'Male', 'One', '3');
