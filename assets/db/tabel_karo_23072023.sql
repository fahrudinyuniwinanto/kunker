/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 5.7.33 : Database - kunker
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`kunker` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `kunker`;

/*Table structure for table `karo` */

DROP TABLE IF EXISTS `karo`;

CREATE TABLE `karo` (
  `id_karo` int(11) NOT NULL AUTO_INCREMENT,
  `karo` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_karo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `karo` */

insert  into `karo`(`id_karo`,`karo`) values 
(1,'Karo Organisasi dan Perencanaan'),
(2,'Karo Sumber Daya Manusia Aparatur'),
(3,'Karo Keuangan'),
(4,'Karo Pengelolaan Bangunan dan Wisma	'),
(5,'Karo Umum');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
