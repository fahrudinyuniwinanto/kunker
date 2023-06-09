/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.7.33 : Database - kunker
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `kategori` */

CREATE TABLE `kategori` (
  `id_kat` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) DEFAULT NULL,
  `note` text,
  `for_modul` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_kat`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

/*Data for the table `kategori` */

/*Table structure for table `master_access` */

CREATE TABLE `master_access` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nm_access` varchar(255) DEFAULT NULL,
  `note` text,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `id_menu` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

/*Data for the table `master_access` */

insert  into `master_access`(`id`,`nm_access`,`note`,`created_at`,`created_by`,`id_menu`) values (22,'Pengaturan Aplikasi','Akses ke menu Parameter System','2022-05-23 08:39:26',8,13);
insert  into `master_access`(`id`,`nm_access`,`note`,`created_at`,`created_by`,`id_menu`) values (23,'Management User','Akses ke menu Management User','2022-05-23 08:39:53',8,18);
insert  into `master_access`(`id`,`nm_access`,`note`,`created_at`,`created_by`,`id_menu`) values (24,'Menu Config','Akses ke menu Config','2022-05-23 08:40:20',8,5);
insert  into `master_access`(`id`,`nm_access`,`note`,`created_at`,`created_by`,`id_menu`) values (30,'User','Akses ke menu User','2022-05-23 09:50:22',6,14);
insert  into `master_access`(`id`,`nm_access`,`note`,`created_at`,`created_by`,`id_menu`) values (31,'Group User','Akses ke menu Group User','2022-05-23 09:50:52',6,15);
insert  into `master_access`(`id`,`nm_access`,`note`,`created_at`,`created_by`,`id_menu`) values (32,'Master Akses','Akses ke menu master Akses','2022-05-23 09:51:10',6,17);
insert  into `master_access`(`id`,`nm_access`,`note`,`created_at`,`created_by`,`id_menu`) values (33,'User Akses','akses ke menu User Akses','2022-05-23 09:51:36',6,16);
insert  into `master_access`(`id`,`nm_access`,`note`,`created_at`,`created_by`,`id_menu`) values (40,'Dashboard','Akses ke menu Dashboard','2023-02-03 17:49:17',6,6);

/*Table structure for table `sy_config` */

CREATE TABLE `sy_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `conf_name` varchar(50) NOT NULL,
  `conf_val` text NOT NULL,
  `note` text NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

/*Data for the table `sy_config` */

insert  into `sy_config`(`id`,`conf_name`,`conf_val`,`note`) values (3,'APP_NAME','SI-P2KK','');
insert  into `sy_config`(`id`,`conf_name`,`conf_val`,`note`) values (8,'OPD_NAME','DPR RI','');
insert  into `sy_config`(`id`,`conf_name`,`conf_val`,`note`) values (9,'LEFT_FOOTER','<strong>Copyright</strong> DPR RI','');
insert  into `sy_config`(`id`,`conf_name`,`conf_val`,`note`) values (10,'RIGHT_FOOTER','DPR RI','');
insert  into `sy_config`(`id`,`conf_name`,`conf_val`,`note`) values (11,'VISI_MISI','Dilengkapi dengan tambahan helper PHP dan JS','');
insert  into `sy_config`(`id`,`conf_name`,`conf_val`,`note`) values (12,'OPD_ADDR','<a href=\"\">DPR RI</a>','');
insert  into `sy_config`(`id`,`conf_name`,`conf_val`,`note`) values (13,'APP_TELP','088808880888','');
insert  into `sy_config`(`id`,`conf_name`,`conf_val`,`note`) values (14,'APP_INSTANSI','DPR RI','');

/*Table structure for table `sy_menu` */

CREATE TABLE `sy_menu` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(30) DEFAULT '',
  `redirect` int(1) DEFAULT NULL,
  `url` varchar(100) DEFAULT '',
  `parent` int(11) DEFAULT '0',
  `icon` varchar(30) DEFAULT NULL,
  `note` varchar(100) DEFAULT NULL,
  `order_no` int(5) DEFAULT NULL,
  `created_by` varchar(20) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` varchar(20) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_menu`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

/*Data for the table `sy_menu` */

insert  into `sy_menu`(`id_menu`,`label`,`redirect`,`url`,`parent`,`icon`,`note`,`order_no`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (5,'Menu Config',0,'sy_menu',0,'fa-wrench','',10,'','0000-00-00 00:00:00','','0000-00-00 00:00:00');
insert  into `sy_menu`(`id_menu`,`label`,`redirect`,`url`,`parent`,`icon`,`note`,`order_no`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (6,'Dashboard',0,'backend',0,'fa-home','',0,'','0000-00-00 00:00:00','','0000-00-00 00:00:00');
insert  into `sy_menu`(`id_menu`,`label`,`redirect`,`url`,`parent`,`icon`,`note`,`order_no`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (13,'Parameter System',0,'sy_config',0,'fa-wrench','',9,'','0000-00-00 00:00:00','','0000-00-00 00:00:00');
insert  into `sy_menu`(`id_menu`,`label`,`redirect`,`url`,`parent`,`icon`,`note`,`order_no`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (14,'Users',0,'users',18,'fa-users','',9,'','0000-00-00 00:00:00','','0000-00-00 00:00:00');
insert  into `sy_menu`(`id_menu`,`label`,`redirect`,`url`,`parent`,`icon`,`note`,`order_no`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (15,'Group Users',0,'user_group',18,'fa-users','',9,'','0000-00-00 00:00:00','','0000-00-00 00:00:00');
insert  into `sy_menu`(`id_menu`,`label`,`redirect`,`url`,`parent`,`icon`,`note`,`order_no`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (16,'User Access',0,'user_access',18,'fa fa-user','',8,'','0000-00-00 00:00:00','','0000-00-00 00:00:00');
insert  into `sy_menu`(`id_menu`,`label`,`redirect`,`url`,`parent`,`icon`,`note`,`order_no`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (17,'Master Access',0,'master_access',18,'fa fa-key','',9,'','0000-00-00 00:00:00','','0000-00-00 00:00:00');
insert  into `sy_menu`(`id_menu`,`label`,`redirect`,`url`,`parent`,`icon`,`note`,`order_no`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (18,'Management Users',0,'users',0,'fa fa-users','',9,'','0000-00-00 00:00:00','','0000-00-00 00:00:00');

/*Table structure for table `user_access` */

CREATE TABLE `user_access` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_group` int(11) DEFAULT NULL,
  `kd_access` varchar(12) DEFAULT NULL,
  `nm_access` varbinary(100) DEFAULT NULL,
  `is_allow` int(1) DEFAULT NULL COMMENT '0=false,1=true',
  `note` text,
  `id_menu` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

/*Data for the table `user_access` */

/*Table structure for table `user_group` */

CREATE TABLE `user_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(255) DEFAULT NULL,
  `note` text,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

/*Data for the table `user_group` */

insert  into `user_group`(`id`,`group_name`,`note`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,'Developer','full akses',NULL,NULL,NULL,NULL);
insert  into `user_group`(`id`,`group_name`,`note`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (3,'Admin TA','Admin Tenaga Ahli (TA)',0,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00');
insert  into `user_group`(`id`,`group_name`,`note`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (4,'Admin TU','Admin TU Deputi Bidang Administrasi',0,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00');

/*Table structure for table `users` */

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(250) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `id_group` int(11) DEFAULT NULL COMMENT 'fk dari tabel user_group',
  `foto` varchar(250) DEFAULT NULL,
  `telp` varchar(250) DEFAULT NULL,
  `note` text,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `note_1` text,
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

/*Data for the table `users` */

insert  into `users`(`id_user`,`fullname`,`username`,`password`,`email`,`id_group`,`foto`,`telp`,`note`,`created_by`,`updated_by`,`created_at`,`updated_at`,`note_1`) values (6,'dev','dev','227edf7c86c02a44d17eec9aa5b30cd1','dev@gmail.com',1,'','8989','Full Akses',3,6,'2022-04-25 08:09:00','2022-04-25 10:32:31','');
insert  into `users`(`id_user`,`fullname`,`username`,`password`,`email`,`id_group`,`foto`,`telp`,`note`,`created_by`,`updated_by`,`created_at`,`updated_at`,`note_1`) values (7,'Admin','admin','0192023a7bbd73250516f069df18b500','admin@gmail.com',3,NULL,NULL,'Admin Korpri Kabupaten',NULL,6,NULL,'2023-02-03 09:18:55',NULL);
insert  into `users`(`id_user`,`fullname`,`username`,`password`,`email`,`id_group`,`foto`,`telp`,`note`,`created_by`,`updated_by`,`created_at`,`updated_at`,`note_1`) values (8,'Ahmad Wandi','wawan','c68acc0ee0f89ca360c6566a72b45dc3','masruriakhmad@gmail.com',0,NULL,NULL,'ssadas',6,NULL,'2023-03-22 19:56:52',NULL,NULL);
insert  into `users`(`id_user`,`fullname`,`username`,`password`,`email`,`id_group`,`foto`,`telp`,`note`,`created_by`,`updated_by`,`created_at`,`updated_at`,`note_1`) values (9,'Ahmad Wandi','wawan','c68acc0ee0f89ca360c6566a72b45dc3','masruriakhmad@gmail.com',0,NULL,NULL,'sASa',6,NULL,'2023-03-22 20:00:32',NULL,NULL);
insert  into `users`(`id_user`,`fullname`,`username`,`password`,`email`,`id_group`,`foto`,`telp`,`note`,`created_by`,`updated_by`,`created_at`,`updated_at`,`note_1`) values (10,'Ahmad Wandi','wawan','c68acc0ee0f89ca360c6566a72b45dc3','masruriakhmad@gmail.com',0,NULL,NULL,'SsSa',6,NULL,'2023-03-22 20:00:53',NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
