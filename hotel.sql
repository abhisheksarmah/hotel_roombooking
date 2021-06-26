/*
Navicat MySQL Data Transfer

Source Server         : con
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : hotel

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2021-01-30 13:49:48
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `admin`
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('admin', 'admin123');

-- ----------------------------
-- Table structure for `booked`
-- ----------------------------
DROP TABLE IF EXISTS `booked`;
CREATE TABLE `booked` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bid` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  `hotelid` int(11) NOT NULL,
  `roomid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of booked
-- ----------------------------
INSERT INTO `booked` VALUES ('15', '1004', '2019-06-26', '1', '3');
INSERT INTO `booked` VALUES ('16', '1004', '2019-06-26', '1', '3');
INSERT INTO `booked` VALUES ('17', '1004', '2019-06-27', '1', '3');
INSERT INTO `booked` VALUES ('18', '1004', '2019-06-27', '1', '3');
INSERT INTO `booked` VALUES ('19', '1004', '2019-06-28', '1', '3');
INSERT INTO `booked` VALUES ('20', '1004', '2019-06-28', '1', '3');
INSERT INTO `booked` VALUES ('21', '1005', '2019-06-27', '1', '5');
INSERT INTO `booked` VALUES ('22', '1005', '2019-06-28', '1', '5');
INSERT INTO `booked` VALUES ('23', '1005', '2019-06-29', '1', '5');

-- ----------------------------
-- Table structure for `booking`
-- ----------------------------
DROP TABLE IF EXISTS `booking`;
CREATE TABLE `booking` (
  `bid` int(11) NOT NULL AUTO_INCREMENT,
  `hid` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `contact` bigint(20) DEFAULT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `roomtype` varchar(30) NOT NULL,
  `noroom` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `bookdate` date NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`bid`)
) ENGINE=InnoDB AUTO_INCREMENT=1006 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of booking
-- ----------------------------
INSERT INTO `booking` VALUES ('1000', '2', 'Jintu Dutta', 'jintu@gmail.com', '7002159096', '2019-06-20', '2019-06-21', 'Deluxe Room', '1', '2150', '2019-06-19', 'Paid');
INSERT INTO `booking` VALUES ('1004', '1', 'Kakul Bora', 'kakul@gmail.com', '8876577667', '2019-06-26', '2019-06-28', 'Deluxe Room', '2', '3600', '2019-06-25', 'Pending');
INSERT INTO `booking` VALUES ('1005', '1', 'Rahul Bora', 'myname@gmail.com', '9954478963', '2019-06-27', '2019-06-29', 'Saver Single', '1', '3000', '2019-06-26', 'Pending');

-- ----------------------------
-- Table structure for `customer`
-- ----------------------------
DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `email` varchar(40) NOT NULL,
  `password` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact` bigint(20) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of customer
-- ----------------------------
INSERT INTO `customer` VALUES ('jintu@gmail.com', '12345', 'Jintu Dutta', 'Jorhat', '7002159890');
INSERT INTO `customer` VALUES ('kakul@gmail.com', '12345', 'Kakul Bora', 'Sivasagar', '8876577667');
INSERT INTO `customer` VALUES ('myname@gmail.com', '12345', 'Rahul Bora', 'Jrt', '9954478963');

-- ----------------------------
-- Table structure for `hotels`
-- ----------------------------
DROP TABLE IF EXISTS `hotels`;
CREATE TABLE `hotels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `star` varchar(10) NOT NULL,
  `city` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact` bigint(20) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `rating` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of hotels
-- ----------------------------
INSERT INTO `hotels` VALUES ('1', 'GK Palace', '3', 'Jorhat', 'Near Railway Station', '9435023235', 'gkpalace@gmail.com', '0');
INSERT INTO `hotels` VALUES ('2', 'The Manor-A Boutique Hotel', '3', 'Jorhat', 'AT Road, Tarajan', '8876720305', 'themanorjrt@gmail.com', '0');
INSERT INTO `hotels` VALUES ('3', 'Hotel Gulmohar Grand', '2', 'Jorhat', 'Choladhara Jorhat', '9954425253', 'gul@gmail.com', '0');
INSERT INTO `hotels` VALUES ('4', 'Homestay by the tea garden', '2', 'Dibrugarh', 'Seujpur,Dibrugarh', '9854794435', 'home@gmail.com', '0');
INSERT INTO `hotels` VALUES ('5', 'zoonskaya', '2', 'Sivasagar', 'Bhatiapar,NH-37', '9876579021', 'zoon@gmail.com', '0');
INSERT INTO `hotels` VALUES ('6', 'Rainbow Regis', '3', 'Dibrugarh', 'T.R. Phukan Road, West Chowkidinghee', '9954792237', 'rr@gmail.com', '0');
INSERT INTO `hotels` VALUES ('7', 'Hotel Ballerina', '1', 'Tinsukia', 'A.T. Road Near Prakash Bazar', '9854673217', 'ballerina@gmail.com', '0');
INSERT INTO `hotels` VALUES ('9', 'Hotel Piyush Regency', '2', 'Nagaon', 'A.T. Road, Near HBN police station', '9768054320', 'hpr@gmail.com', '0');

-- ----------------------------
-- Table structure for `photos`
-- ----------------------------
DROP TABLE IF EXISTS `photos`;
CREATE TABLE `photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hid` int(11) NOT NULL,
  `photo` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of photos
-- ----------------------------
INSERT INTO `photos` VALUES ('2', '1', 'Hotels/5cd28a3974d1a.jpg');
INSERT INTO `photos` VALUES ('3', '1', 'Hotels/5cd28a398b4df.jpg');
INSERT INTO `photos` VALUES ('4', '1', 'Hotels/5cd28a3996533.jpeg');
INSERT INTO `photos` VALUES ('5', '1', 'Hotels/5cd28a39a82f1.jpeg');
INSERT INTO `photos` VALUES ('6', '1', 'Hotels/5cd28a39c1d33.jpeg');
INSERT INTO `photos` VALUES ('7', '1', 'Hotels/5cd28a39d209c.jpeg');
INSERT INTO `photos` VALUES ('8', '2', 'Hotels/5cd28b1ef15f7.jfif');
INSERT INTO `photos` VALUES ('9', '2', 'Hotels/5cd28b1f092f3.jfif');
INSERT INTO `photos` VALUES ('10', '2', 'Hotels/5cd28b1f13b4e.jfif');
INSERT INTO `photos` VALUES ('11', '2', 'Hotels/5cd28b1f23ffd.jfif');
INSERT INTO `photos` VALUES ('12', '2', 'Hotels/5cd28b1f34483.jpg');
INSERT INTO `photos` VALUES ('13', '2', 'Hotels/5cd28b1f4483b.jfif');
INSERT INTO `photos` VALUES ('14', '2', 'Hotels/5cd28b1f54b31.jfif');
INSERT INTO `photos` VALUES ('15', '3', 'Hotels/5cff9c632eb32.jpg');
INSERT INTO `photos` VALUES ('16', '3', 'Hotels/5cff9dba65ed2.jfif');
INSERT INTO `photos` VALUES ('17', '3', 'Hotels/5cff9dba701c9.jpg');
INSERT INTO `photos` VALUES ('18', '4', 'Hotels/5cffd62e5218f.jpg');
INSERT INTO `photos` VALUES ('19', '4', 'Hotels/5cffd62e8855e.jpg');
INSERT INTO `photos` VALUES ('20', '4', 'Hotels/5cffd62e92f95.jpg');
INSERT INTO `photos` VALUES ('21', '4', 'Hotels/5cffd62e9df7a.jpg');
INSERT INTO `photos` VALUES ('22', '5', 'Hotels/5d00c4efd4f05.jpeg');
INSERT INTO `photos` VALUES ('23', '5', 'Hotels/5d00c4f01d49e.jpg');
INSERT INTO `photos` VALUES ('24', '5', 'Hotels/5d00c4f03f6c4.jpg');
INSERT INTO `photos` VALUES ('25', '6', 'Hotels/5d00c9c974f41.jpg');
INSERT INTO `photos` VALUES ('26', '6', 'Hotels/5d00c9c99d709.jpg');
INSERT INTO `photos` VALUES ('27', '6', 'Hotels/5d00c9c9efafe.jpg');
INSERT INTO `photos` VALUES ('28', '6', 'Hotels/5d00c9ca0bbf9.jpg');
INSERT INTO `photos` VALUES ('29', '7', 'Hotels/5d00e665dc16d.jpg');
INSERT INTO `photos` VALUES ('30', '7', 'Hotels/5d00e6666a4fd.jpg');
INSERT INTO `photos` VALUES ('31', '7', 'Hotels/5d00e66688968.jpg');
INSERT INTO `photos` VALUES ('32', '9', 'Hotels/5d00ec494aedb.jpg');
INSERT INTO `photos` VALUES ('33', '9', 'Hotels/5d00ec4966e51.webp');
INSERT INTO `photos` VALUES ('34', '9', 'Hotels/5d00ec4987623.jpg');

-- ----------------------------
-- Table structure for `rooms`
-- ----------------------------
DROP TABLE IF EXISTS `rooms`;
CREATE TABLE `rooms` (
  `roomid` int(11) NOT NULL AUTO_INCREMENT,
  `hotelid` int(11) NOT NULL,
  `roomtype` varchar(100) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `roomsize` varchar(30) NOT NULL,
  `bedtype` varchar(30) NOT NULL,
  `guests` int(11) DEFAULT NULL,
  `rate` int(11) NOT NULL,
  `nor` int(11) DEFAULT NULL,
  PRIMARY KEY (`roomid`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of rooms
-- ----------------------------
INSERT INTO `rooms` VALUES ('3', '1', 'Deluxe Room', 'Rooms/5cd47c33227fe.jpg', '4x4 sqm', 'King Sized Bed', '2', '1800', '6');
INSERT INTO `rooms` VALUES ('4', '1', 'Super Deluxe Room', 'Rooms/5cd47cf622ef3.jpg', '12x12', 'King Sized Bed', '3', '2930', '5');
INSERT INTO `rooms` VALUES ('5', '1', 'Saver Single', 'Rooms/5cd47e21ba689.jpg', '10x10', 'Single Bed', '1', '1500', '8');
INSERT INTO `rooms` VALUES ('6', '2', 'Corporate Room', 'Rooms/5cfdf91abdd73.jpg', '4.88X4.27 Sq m', 'King Sized Bed', '2', '2940', '3');
INSERT INTO `rooms` VALUES ('7', '2', 'Deluxe Room', 'Rooms/5cfdf94c2bbeb.jpg', '3.5X3.5 sqm', 'King Sized Bed', '2', '2150', '5');
INSERT INTO `rooms` VALUES ('8', '3', 'Deluxe Room', 'Rooms/5cff98fae0a69.jpg', '3.5X3.5 sqm', 'King Sized Bed', '2', '1850', '5');
INSERT INTO `rooms` VALUES ('9', '4', 'Deluxe Room', 'Rooms/5cffd6e3b84f6.jpg', '5*5', 'single', '1', '1250', '12');
INSERT INTO `rooms` VALUES ('10', '6', 'Presidential Suite', 'Rooms/5d00d90c96d48.webp', '5*5', 'single', '1', '1800', '10');
INSERT INTO `rooms` VALUES ('11', '5', 'Classic Room', 'Rooms/5d00da81dd4f7.jpg', '4*4', 'single', '1', '1500', '8');
INSERT INTO `rooms` VALUES ('12', '7', 'Deluxe Twin Bed', 'Rooms/5d00e69ba1b13.jpg', '5*5', 'double', '2', '2000', '12');
INSERT INTO `rooms` VALUES ('13', '9', 'Saver Double', 'Rooms/5d00ecd04f68b.webp', '4*4', 'double', '2', '1500', '14');
