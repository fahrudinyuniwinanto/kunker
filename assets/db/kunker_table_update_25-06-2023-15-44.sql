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
/*Table structure for table `kunker` */

CREATE TABLE `kunker` (
  `id_kunker` int(11) NOT NULL AUTO_INCREMENT,
  `id_jenis_kunjungan` int(11) DEFAULT NULL,
  `kunjungan_ke` int(11) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `kunker` */

insert  into `kunker`(`id_kunker`,`id_jenis_kunjungan`,`kunjungan_ke`,`jumlah_hari`,`nomor_surat`,`tanggal_surat`,`tgl_berangkat`,`tgl_kembali`,`perihal_surat`,`lampiran_surat`,`tingkat_keamanan`,`id_fraksi`,`id_anggota_fraksi`,`id_kunker_ta`,`nama_daerah_tujuan`,`file_surat`,`file_nodin`,`pemberi_disposisi`,`isi_disposisi`,`tujuan_disposisi`,`status_disposisi`,`created_at`,`disposisi_at`,`created_by`,`disposisi_by`,`diposisi_note`) values (1,1,NULL,3,'1321321','2023-06-25','2023-06-25','2023-06-27','dsadsadsa','3','Biasa',6,545,NULL,'Banyumas','dok_permohonan_1687673310.pdf',NULL,NULL,NULL,NULL,0,'2023-06-25 13:08:30',NULL,NULL,NULL,NULL);
insert  into `kunker`(`id_kunker`,`id_jenis_kunjungan`,`kunjungan_ke`,`jumlah_hari`,`nomor_surat`,`tanggal_surat`,`tgl_berangkat`,`tgl_kembali`,`perihal_surat`,`lampiran_surat`,`tingkat_keamanan`,`id_fraksi`,`id_anggota_fraksi`,`id_kunker_ta`,`nama_daerah_tujuan`,`file_surat`,`file_nodin`,`pemberi_disposisi`,`isi_disposisi`,`tujuan_disposisi`,`status_disposisi`,`created_at`,`disposisi_at`,`created_by`,`disposisi_by`,`diposisi_note`) values (2,1,2,3,'1321321','2023-06-25','2023-06-26','2023-06-28','sdsads','3','Biasa',6,545,NULL,'dasdsda','dok_permohonan_1687682572.pdf',NULL,NULL,NULL,NULL,0,'2023-06-25 15:42:52',NULL,NULL,NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
