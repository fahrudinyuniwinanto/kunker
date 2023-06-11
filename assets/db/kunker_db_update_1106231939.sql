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
/*Table structure for table `fraksi` */

CREATE TABLE `fraksi` (
  `id_fraksi` int(11) NOT NULL AUTO_INCREMENT,
  `nama_fraksi` varchar(75) DEFAULT NULL,
  PRIMARY KEY (`id_fraksi`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `fraksi` */

insert  into `fraksi`(`id_fraksi`,`nama_fraksi`) values (1,'FRAKSI 1');
insert  into `fraksi`(`id_fraksi`,`nama_fraksi`) values (2,'FRAKSI 2');
insert  into `fraksi`(`id_fraksi`,`nama_fraksi`) values (3,'FRAKSI 3');

/*Table structure for table `jenis_kunjungan` */

CREATE TABLE `jenis_kunjungan` (
  `id_jenis_kunjungan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kunker` varchar(100) DEFAULT NULL,
  `maksimal_kunjungan` int(11) DEFAULT NULL,
  `jumlah_hari` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_jenis_kunjungan`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `jenis_kunjungan` */

insert  into `jenis_kunjungan`(`id_jenis_kunjungan`,`nama_kunker`,`maksimal_kunjungan`,`jumlah_hari`) values (1,'wqwq',11,2);
insert  into `jenis_kunjungan`(`id_jenis_kunjungan`,`nama_kunker`,`maksimal_kunjungan`,`jumlah_hari`) values (2,'KUNJUNGAN 1',12,3);
insert  into `jenis_kunjungan`(`id_jenis_kunjungan`,`nama_kunker`,`maksimal_kunjungan`,`jumlah_hari`) values (3,'KUNJUNGAN 2',6,5);

/*Table structure for table `kategori` */

CREATE TABLE `kategori` (
  `id_kat` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) DEFAULT NULL,
  `note` text,
  `for_modul` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_kat`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

/*Data for the table `kategori` */

/*Table structure for table `kunker` */

CREATE TABLE `kunker` (
  `id_kunker` int(11) NOT NULL AUTO_INCREMENT,
  `id_jenis_kunjungan` int(11) DEFAULT NULL,
  `jumlah_hari` int(11) DEFAULT NULL,
  `nomor_surat` varchar(50) DEFAULT NULL,
  `tanggal_surat` date DEFAULT NULL,
  `tgl_berangkat` date DEFAULT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `perihal_surat` varchar(200) DEFAULT NULL,
  `lampiran_surat` varchar(25) DEFAULT NULL,
  `tingkat_keamanan` varchar(25) DEFAULT NULL,
  `id_fraksi` int(11) DEFAULT NULL,
  `id_anggota_fraksi` int(11) DEFAULT NULL,
  `id_kunker_ta` int(11) DEFAULT NULL,
  `nama_daerah_tujuan` varchar(100) DEFAULT NULL,
  `file_surat` varchar(50) DEFAULT NULL,
  `file_nodin` varchar(50) DEFAULT NULL,
  `pemberi_disposisi` varchar(50) DEFAULT NULL,
  `isi_disposisi` varchar(100) DEFAULT NULL,
  `tujuan_disposisi` varchar(50) DEFAULT NULL,
  `status_disposisi` int(11) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `disposisi_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `disposisi_by` int(11) DEFAULT NULL,
  `diposisi_note` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_kunker`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `kunker` */

insert  into `kunker`(`id_kunker`,`id_jenis_kunjungan`,`jumlah_hari`,`nomor_surat`,`tanggal_surat`,`tgl_berangkat`,`tgl_kembali`,`perihal_surat`,`lampiran_surat`,`tingkat_keamanan`,`id_fraksi`,`id_anggota_fraksi`,`id_kunker_ta`,`nama_daerah_tujuan`,`file_surat`,`file_nodin`,`pemberi_disposisi`,`isi_disposisi`,`tujuan_disposisi`,`status_disposisi`,`created_at`,`disposisi_at`,`created_by`,`disposisi_by`,`diposisi_note`) values (1,2,NULL,'1321321','2023-06-06','2023-06-11','2023-06-13','dsadadsa','3','Biasa',1,11,NULL,'dasdsda','',NULL,NULL,NULL,NULL,NULL,'2023-06-11 11:06:47',NULL,NULL,NULL,NULL);
insert  into `kunker`(`id_kunker`,`id_jenis_kunjungan`,`jumlah_hari`,`nomor_surat`,`tanggal_surat`,`tgl_berangkat`,`tgl_kembali`,`perihal_surat`,`lampiran_surat`,`tingkat_keamanan`,`id_fraksi`,`id_anggota_fraksi`,`id_kunker_ta`,`nama_daerah_tujuan`,`file_surat`,`file_nodin`,`pemberi_disposisi`,`isi_disposisi`,`tujuan_disposisi`,`status_disposisi`,`created_at`,`disposisi_at`,`created_by`,`disposisi_by`,`diposisi_note`) values (2,2,NULL,'1321321','2023-06-08','2023-06-16','2023-06-13','dasdsad','3','Biasa',1,11,NULL,'dasdsda','alur_layanan.pdf',NULL,NULL,NULL,NULL,NULL,'2023-06-11 11:09:44',NULL,NULL,NULL,NULL);
insert  into `kunker`(`id_kunker`,`id_jenis_kunjungan`,`jumlah_hari`,`nomor_surat`,`tanggal_surat`,`tgl_berangkat`,`tgl_kembali`,`perihal_surat`,`lampiran_surat`,`tingkat_keamanan`,`id_fraksi`,`id_anggota_fraksi`,`id_kunker_ta`,`nama_daerah_tujuan`,`file_surat`,`file_nodin`,`pemberi_disposisi`,`isi_disposisi`,`tujuan_disposisi`,`status_disposisi`,`created_at`,`disposisi_at`,`created_by`,`disposisi_by`,`diposisi_note`) values (3,2,NULL,'1321321','2023-06-01','2023-06-13','2023-06-09','dsadsadsa','3','Biasa',1,11,NULL,'dasdsda','dok_permohonan_1686457140',NULL,NULL,NULL,NULL,0,'2023-06-11 11:19:00',NULL,NULL,NULL,NULL);

/*Table structure for table `kunker_ta` */

CREATE TABLE `kunker_ta` (
  `id_kunker_ta` int(11) NOT NULL AUTO_INCREMENT,
  `id_kunker` int(11) DEFAULT NULL,
  `id_ta` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_kunker_ta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `kunker_ta` */

/*Table structure for table `master_access` */

CREATE TABLE `master_access` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nm_access` varchar(255) DEFAULT NULL,
  `note` text,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `id_menu` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

/*Data for the table `master_access` */

insert  into `master_access`(`id`,`nm_access`,`note`,`created_at`,`created_by`,`id_menu`) values (22,'Pengaturan Aplikasi','Akses ke menu Parameter System','2022-05-23 08:39:26',8,13);
insert  into `master_access`(`id`,`nm_access`,`note`,`created_at`,`created_by`,`id_menu`) values (23,'Management User','Akses ke menu Management User','2022-05-23 08:39:53',8,18);
insert  into `master_access`(`id`,`nm_access`,`note`,`created_at`,`created_by`,`id_menu`) values (24,'Menu Config','Akses ke menu Config','2022-05-23 08:40:20',8,5);
insert  into `master_access`(`id`,`nm_access`,`note`,`created_at`,`created_by`,`id_menu`) values (30,'User','Akses ke menu User','2022-05-23 09:50:22',6,14);
insert  into `master_access`(`id`,`nm_access`,`note`,`created_at`,`created_by`,`id_menu`) values (31,'Group User','Akses ke menu Group User','2022-05-23 09:50:52',6,15);
insert  into `master_access`(`id`,`nm_access`,`note`,`created_at`,`created_by`,`id_menu`) values (32,'Master Akses','Akses ke menu master Akses','2022-05-23 09:51:10',6,17);
insert  into `master_access`(`id`,`nm_access`,`note`,`created_at`,`created_by`,`id_menu`) values (33,'User Akses','akses ke menu User Akses','2022-05-23 09:51:36',6,16);
insert  into `master_access`(`id`,`nm_access`,`note`,`created_at`,`created_by`,`id_menu`) values (40,'Dashboard','Akses ke menu Dashboard','2023-02-03 17:49:17',6,6);
insert  into `master_access`(`id`,`nm_access`,`note`,`created_at`,`created_by`,`id_menu`) values (41,'Permohonan','Akses Ke menu Permohonan','2023-06-10 18:47:31',6,22);
insert  into `master_access`(`id`,`nm_access`,`note`,`created_at`,`created_by`,`id_menu`) values (42,'Master','Akses ke menu master','2023-06-10 18:47:51',6,19);

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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

/*Data for the table `sy_menu` */

insert  into `sy_menu`(`id_menu`,`label`,`redirect`,`url`,`parent`,`icon`,`note`,`order_no`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (5,'Pengatuan Menu',0,'sy_menu',0,'fa-wrench','',10,'','0000-00-00 00:00:00','','0000-00-00 00:00:00');
insert  into `sy_menu`(`id_menu`,`label`,`redirect`,`url`,`parent`,`icon`,`note`,`order_no`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (6,'Dashboard',0,'backend',0,'fa-home','',0,'','0000-00-00 00:00:00','','0000-00-00 00:00:00');
insert  into `sy_menu`(`id_menu`,`label`,`redirect`,`url`,`parent`,`icon`,`note`,`order_no`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (13,'Pengaturan Sistem',0,'sy_config',0,'fa-wrench','',10,'','0000-00-00 00:00:00','','0000-00-00 00:00:00');
insert  into `sy_menu`(`id_menu`,`label`,`redirect`,`url`,`parent`,`icon`,`note`,`order_no`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (14,'Pengguna',0,'users',18,'fa-users','',8,'','0000-00-00 00:00:00','','0000-00-00 00:00:00');
insert  into `sy_menu`(`id_menu`,`label`,`redirect`,`url`,`parent`,`icon`,`note`,`order_no`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (15,'Group Pengguna',0,'user_group',18,'fa-users','',9,'','0000-00-00 00:00:00','','0000-00-00 00:00:00');
insert  into `sy_menu`(`id_menu`,`label`,`redirect`,`url`,`parent`,`icon`,`note`,`order_no`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (16,'Hak Akses',0,'user_access',18,'fa fa-user','',8,'','0000-00-00 00:00:00','','0000-00-00 00:00:00');
insert  into `sy_menu`(`id_menu`,`label`,`redirect`,`url`,`parent`,`icon`,`note`,`order_no`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (17,'Master Akses',0,'master_access',18,'fa fa-key','',9,'','0000-00-00 00:00:00','','0000-00-00 00:00:00');
insert  into `sy_menu`(`id_menu`,`label`,`redirect`,`url`,`parent`,`icon`,`note`,`order_no`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (18,'Management Pengguna',0,'users',0,'fa fa-users','',9,'','0000-00-00 00:00:00','','0000-00-00 00:00:00');
insert  into `sy_menu`(`id_menu`,`label`,`redirect`,`url`,`parent`,`icon`,`note`,`order_no`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (19,'Master',0,'master',0,'fa-database','',2,'','0000-00-00 00:00:00','','0000-00-00 00:00:00');
insert  into `sy_menu`(`id_menu`,`label`,`redirect`,`url`,`parent`,`icon`,`note`,`order_no`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (20,'Anggota Dewan',0,'Anggota_fraksi',19,'fa-user','1',1,'','0000-00-00 00:00:00','','0000-00-00 00:00:00');
insert  into `sy_menu`(`id_menu`,`label`,`redirect`,`url`,`parent`,`icon`,`note`,`order_no`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (21,'Tenaga Ahli',0,'Ta',19,'fa-users','1',2,'','0000-00-00 00:00:00','','0000-00-00 00:00:00');
insert  into `sy_menu`(`id_menu`,`label`,`redirect`,`url`,`parent`,`icon`,`note`,`order_no`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (22,'Permohonan',0,'kunker',0,'fa-file','1',3,'','0000-00-00 00:00:00','','0000-00-00 00:00:00');
insert  into `sy_menu`(`id_menu`,`label`,`redirect`,`url`,`parent`,`icon`,`note`,`order_no`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (23,'Fraksi',0,'Fraksi',19,'fa-gear','1',3,'','0000-00-00 00:00:00','','0000-00-00 00:00:00');
insert  into `sy_menu`(`id_menu`,`label`,`redirect`,`url`,`parent`,`icon`,`note`,`order_no`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (24,'Jenis Kunjungan',0,'Jenis_kunjungan',19,'fa-gear','1',4,'','0000-00-00 00:00:00','','0000-00-00 00:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

/*Data for the table `user_access` */

insert  into `user_access`(`id`,`id_group`,`kd_access`,`nm_access`,`is_allow`,`note`,`id_menu`) values (1,3,'23',NULL,1,NULL,18);
insert  into `user_access`(`id`,`id_group`,`kd_access`,`nm_access`,`is_allow`,`note`,`id_menu`) values (2,3,'30',NULL,1,NULL,14);
insert  into `user_access`(`id`,`id_group`,`kd_access`,`nm_access`,`is_allow`,`note`,`id_menu`) values (3,3,'40',NULL,1,NULL,6);
insert  into `user_access`(`id`,`id_group`,`kd_access`,`nm_access`,`is_allow`,`note`,`id_menu`) values (4,3,'41',NULL,1,NULL,22);
insert  into `user_access`(`id`,`id_group`,`kd_access`,`nm_access`,`is_allow`,`note`,`id_menu`) values (5,2,'22',NULL,1,NULL,13);
insert  into `user_access`(`id`,`id_group`,`kd_access`,`nm_access`,`is_allow`,`note`,`id_menu`) values (6,2,'23',NULL,1,NULL,18);
insert  into `user_access`(`id`,`id_group`,`kd_access`,`nm_access`,`is_allow`,`note`,`id_menu`) values (7,2,'30',NULL,1,NULL,14);
insert  into `user_access`(`id`,`id_group`,`kd_access`,`nm_access`,`is_allow`,`note`,`id_menu`) values (8,2,'40',NULL,1,NULL,6);
insert  into `user_access`(`id`,`id_group`,`kd_access`,`nm_access`,`is_allow`,`note`,`id_menu`) values (9,2,'41',NULL,1,NULL,22);
insert  into `user_access`(`id`,`id_group`,`kd_access`,`nm_access`,`is_allow`,`note`,`id_menu`) values (10,2,'42',NULL,1,NULL,19);

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
insert  into `user_group`(`id`,`group_name`,`note`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (2,'Admin TU','Admin TU Deputi Bidang Administrasi',0,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00');
insert  into `user_group`(`id`,`group_name`,`note`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (3,'Admin TA','Admin Anggota Fraksi',0,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00');

/*Table structure for table `users` */

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `no_anggota` varchar(25) DEFAULT NULL,
  `fullname` varchar(250) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT 'email@email.com',
  `id_group` int(11) DEFAULT NULL COMMENT 'fk dari tabel user_group',
  `foto` varchar(250) DEFAULT NULL,
  `telp` varchar(250) DEFAULT NULL,
  `note` text,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `note_1` text,
  `id_fraksi` int(11) DEFAULT '0',
  `id_parent` int(11) DEFAULT '0',
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

/*Data for the table `users` */

insert  into `users`(`id_user`,`no_anggota`,`fullname`,`username`,`password`,`email`,`id_group`,`foto`,`telp`,`note`,`created_by`,`updated_by`,`created_at`,`updated_at`,`note_1`,`id_fraksi`,`id_parent`) values (6,NULL,'dev','dev','227edf7c86c02a44d17eec9aa5b30cd1','dev@gmail.com',1,'','8989','Full Akses',3,6,'2022-04-25 08:09:00','2022-04-25 10:32:31','',NULL,NULL);
insert  into `users`(`id_user`,`no_anggota`,`fullname`,`username`,`password`,`email`,`id_group`,`foto`,`telp`,`note`,`created_by`,`updated_by`,`created_at`,`updated_at`,`note_1`,`id_fraksi`,`id_parent`) values (7,NULL,'Admin','admin','0192023a7bbd73250516f069df18b500','admin@gmail.com',3,NULL,NULL,'Admin Korpri Kabupaten',NULL,6,NULL,'2023-02-03 09:18:55',NULL,NULL,NULL);
insert  into `users`(`id_user`,`no_anggota`,`fullname`,`username`,`password`,`email`,`id_group`,`foto`,`telp`,`note`,`created_by`,`updated_by`,`created_at`,`updated_at`,`note_1`,`id_fraksi`,`id_parent`) values (26,'0010101011','Ahmad Wandi','0010101011','8652696a462cc4e316eb4ec8f06aa2dd','email@email.com',3,NULL,NULL,NULL,6,NULL,'2023-06-11 19:13:03',NULL,NULL,1,0);
insert  into `users`(`id_user`,`no_anggota`,`fullname`,`username`,`password`,`email`,`id_group`,`foto`,`telp`,`note`,`created_by`,`updated_by`,`created_at`,`updated_at`,`note_1`,`id_fraksi`,`id_parent`) values (27,NULL,'PLAI',NULL,NULL,'email@email.com',0,NULL,NULL,NULL,6,6,'2023-06-11 19:16:00','2023-06-11 19:16:32',NULL,1,26);
insert  into `users`(`id_user`,`no_anggota`,`fullname`,`username`,`password`,`email`,`id_group`,`foto`,`telp`,`note`,`created_by`,`updated_by`,`created_at`,`updated_at`,`note_1`,`id_fraksi`,`id_parent`) values (28,NULL,'ruri',NULL,NULL,'email@email.com',0,NULL,NULL,NULL,6,NULL,'2023-06-11 19:16:09',NULL,NULL,1,26);
insert  into `users`(`id_user`,`no_anggota`,`fullname`,`username`,`password`,`email`,`id_group`,`foto`,`telp`,`note`,`created_by`,`updated_by`,`created_at`,`updated_at`,`note_1`,`id_fraksi`,`id_parent`) values (29,NULL,'Admin TU','admintu','0efd409d3c0dd99bf8fed092839b60b3','admintu@email.com',2,NULL,NULL,'Akses Admin TU',6,NULL,'2023-06-11 19:27:49',NULL,NULL,0,0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
