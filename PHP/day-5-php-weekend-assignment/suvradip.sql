/*
SQLyog Ultimate v11.33 (64 bit)
MySQL - 5.1.52-community : Database - suvradip
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`suvradip` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `suvradip`;

/*Table structure for table `subscriber_details` */

DROP TABLE IF EXISTS `subscriber_details`;

CREATE TABLE `subscriber_details` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `SUBSCRIBER_NAME` varchar(100) DEFAULT NULL,
  `SUBSCRIBER_MAIL_ID` varchar(50) DEFAULT NULL,
  `SUBSCRIBER_PHONE` bigint(20) DEFAULT NULL,
  `SUBSCRIBER_SEX` varchar(6) DEFAULT NULL,
  `SUBSCRIBER_COUNTRY` varbinary(30) DEFAULT NULL,
  `SUBSCRIBER_STATE` varbinary(30) DEFAULT NULL,
  `SUBSCRIBER_FEEDBACK` text,
  `INTEREST_GAME` varchar(20) DEFAULT NULL,
  `INTEREST_MOVIE` varchar(20) DEFAULT NULL,
  `INTEREST_READING` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

/*Data for the table `subscriber_details` */

insert  into `subscriber_details`(`ID`,`SUBSCRIBER_NAME`,`SUBSCRIBER_MAIL_ID`,`SUBSCRIBER_PHONE`,`SUBSCRIBER_SEX`,`SUBSCRIBER_COUNTRY`,`SUBSCRIBER_STATE`,`SUBSCRIBER_FEEDBACK`,`INTEREST_GAME`,`INTEREST_MOVIE`,`INTEREST_READING`) values (30,'Suvradip saha','Suvradip@fusioncharts.com',8981390509,'Male','IN','West Bengal','NICE to see you','Football','Movie','undefined');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
