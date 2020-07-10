/*
SQLyog Ultimate v10.42 
MySQL - 5.7.24 : Database - db_simpeg
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_simpeg` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_simpeg`;

/*Table structure for table `tb_departemen` */

DROP TABLE IF EXISTS `tb_departemen`;

CREATE TABLE `tb_departemen` (
  `id_departemen` int(11) NOT NULL AUTO_INCREMENT,
  `departemen_name` varchar(100) DEFAULT NULL,
  `create_at` timestamp NOT NULL,
  `update_at` timestamp NOT NULL,
  PRIMARY KEY (`id_departemen`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `tb_departemen` */

LOCK TABLES `tb_departemen` WRITE;

insert  into `tb_departemen`(`id_departemen`,`departemen_name`,`create_at`,`update_at`) values (1,'Pemerintahan','2020-05-20 00:00:00','2020-05-30 13:36:00'),(9,'Kesejahteraan','2020-05-31 02:08:54','0000-00-00 00:00:00'),(10,'Pelayanan','2020-05-31 02:09:01','0000-00-00 00:00:00'),(11,'Keuangan','2020-05-31 02:14:03','0000-00-00 00:00:00'),(12,'Tata Usaha dan Umum','2020-05-31 02:14:42','0000-00-00 00:00:00'),(14,'Perencanaan','2020-05-31 02:18:27','0000-00-00 00:00:00');

UNLOCK TABLES;

/*Table structure for table `tb_jabatan` */

DROP TABLE IF EXISTS `tb_jabatan`;

CREATE TABLE `tb_jabatan` (
  `id_jabatan` int(5) NOT NULL AUTO_INCREMENT,
  `jabatan_name` varchar(50) NOT NULL,
  `id_departemen` int(11) DEFAULT NULL,
  `create_at` timestamp NOT NULL,
  `update_at` timestamp NOT NULL,
  PRIMARY KEY (`id_jabatan`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `tb_jabatan` */

LOCK TABLES `tb_jabatan` WRITE;

insert  into `tb_jabatan`(`id_jabatan`,`jabatan_name`,`id_departemen`,`create_at`,`update_at`) values (5,'Staff',14,'2020-05-31 02:41:28','0000-00-00 00:00:00'),(6,'Staff',12,'2020-05-31 02:41:38','0000-00-00 00:00:00'),(7,'Staff',11,'2020-05-31 02:41:44','0000-00-00 00:00:00'),(8,'Staff',10,'2020-05-31 02:41:51','0000-00-00 00:00:00'),(9,'Staff',9,'2020-05-31 02:41:59','0000-00-00 00:00:00'),(10,'Staff',1,'2020-05-31 02:42:04','0000-00-00 00:00:00'),(11,'Ka. Sie',14,'2020-05-31 02:42:21','0000-00-00 00:00:00'),(12,'Ka. Sie',12,'2020-05-31 02:42:25','0000-00-00 00:00:00'),(13,'Ka. Sie',11,'2020-05-31 02:42:31','0000-00-00 00:00:00'),(14,'Ka. Sie',10,'2020-05-31 02:42:33','0000-00-00 00:00:00'),(15,'Ka. Sie',9,'2020-05-31 02:42:36','0000-00-00 00:00:00'),(16,'Ka. Sie',1,'2020-05-31 02:42:39','0000-00-00 00:00:00');

UNLOCK TABLES;

/*Table structure for table `tb_konfigurasi` */

DROP TABLE IF EXISTS `tb_konfigurasi`;

CREATE TABLE `tb_konfigurasi` (
  `id_konfigurasi` int(1) NOT NULL AUTO_INCREMENT,
  `name_app` varchar(200) DEFAULT NULL,
  `logo` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `alamat` text,
  `email` varchar(100) DEFAULT NULL,
  `keywords` varchar(200) DEFAULT NULL,
  `metatext` varchar(200) DEFAULT NULL,
  `instansi` varchar(200) DEFAULT NULL,
  `pimpinan` varchar(200) DEFAULT NULL,
  `sekretaris` varchar(200) DEFAULT NULL,
  `about` text,
  `update_at` timestamp NOT NULL,
  PRIMARY KEY (`id_konfigurasi`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

/*Data for the table `tb_konfigurasi` */

LOCK TABLES `tb_konfigurasi` WRITE;

insert  into `tb_konfigurasi`(`id_konfigurasi`,`name_app`,`logo`,`phone`,`alamat`,`email`,`keywords`,`metatext`,`instansi`,`pimpinan`,`sekretaris`,`about`,`update_at`) values (1,'SIMPEG','logo-instansi.png','0811-2651-333','Plebengan, Sidomulyo, Bambanglipuro, Bantul','desa.sidomulyo@bantulkab.go.id',NULL,NULL,'Kantor Kelurahan Desa Sidomulyo','Lurah','Sekretaris','Sistem Pendukung Keputusan Penerima Tunjangan                                                                                                                                                                                                                                                                                                                                                                                                                                          ','0000-00-00 00:00:00');

UNLOCK TABLES;

/*Table structure for table `tb_menu` */

DROP TABLE IF EXISTS `tb_menu`;

CREATE TABLE `tb_menu` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `url` varchar(200) NOT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `is_main_menu` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `create_at` timestamp NOT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

/*Data for the table `tb_menu` */

LOCK TABLES `tb_menu` WRITE;

insert  into `tb_menu`(`menu_id`,`title`,`url`,`icon`,`is_main_menu`,`is_active`,`create_at`) values (1,'Dashboard','dashboard',NULL,0,0,'2020-05-29 21:16:59'),(2,'Kelola Pengguna','','fe fe-users',0,1,'2020-05-27 20:30:00'),(3,'User Level','userlevel','',2,1,'2020-05-29 16:28:15'),(4,'User Management','users','',2,1,'2020-05-29 16:30:45'),(5,'Kelola Menu','menu','fe fe-menu',0,1,'2020-05-29 19:57:44'),(6,'Master Data','','fa fa-suitcase',0,1,'2020-05-30 09:27:04'),(7,'Data Jabatan','jabatan','',6,1,'2020-05-30 09:31:01'),(8,'Departemen','departemen','',6,1,'2020-05-30 10:32:40'),(9,'Profil','profile','',0,0,'2020-05-31 07:26:05'),(10,'Settings','settings','',0,0,'2020-06-01 17:36:41'),(11,'Data Master','','fa fa-cubes',0,1,'2020-06-03 07:49:20'),(12,'Data Pegawai','pegawai','',11,1,'2020-06-03 07:57:45'),(13,'SKP','skp','fa fa-area-chart',0,1,'2020-06-03 09:15:49'),(14,'Kirim Tugas','send_task','fa fa-edit',0,1,'2020-06-03 11:41:40'),(15,'Tugas Masuk','','fe fe-file-text',0,1,'2020-06-18 12:59:27'),(16,'SKP Pegawai','skp_report','fe fe-users',0,1,'2020-06-19 11:46:26'),(17,'Tugas Harian','task_incoming_daily','',15,1,'2020-06-23 13:08:11'),(18,'Tugas Jabatan','task_incoming_skp','',15,1,'2020-06-23 13:08:43'),(19,'Laporan Tugas','','fa fa-archive',0,1,'2020-06-23 13:11:25'),(20,'Laporan Tugas Harian','dayli_task_report','',19,1,'2020-06-23 13:24:15'),(21,'Laporan Tugas Jabatan','skp_task_report','',19,1,'2020-06-23 13:24:35'),(22,'Input Tugas','tugas','fa fa-edit',0,1,'2020-06-26 11:05:27');

UNLOCK TABLES;

/*Table structure for table `tb_nilai_capaian` */

DROP TABLE IF EXISTS `tb_nilai_capaian`;

CREATE TABLE `tb_nilai_capaian` (
  `id_nilai_capaian` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `nilai_skp` float DEFAULT NULL,
  `nilai_tugas_tambahan` int(2) DEFAULT NULL,
  `nilai_capaian_kerja` float DEFAULT NULL,
  `bulan` varchar(20) DEFAULT NULL,
  `create_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_nilai_capaian`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_nilai_capaian` */

LOCK TABLES `tb_nilai_capaian` WRITE;

UNLOCK TABLES;

/*Table structure for table `tb_nilai_perilaku` */

DROP TABLE IF EXISTS `tb_nilai_perilaku`;

CREATE TABLE `tb_nilai_perilaku` (
  `id_nilai_perilaku` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `pelayanan` float NOT NULL,
  `integritas` float NOT NULL,
  `komitmen` float NOT NULL,
  `disiplin` float NOT NULL,
  `kerjasama` float NOT NULL,
  `kepemimpinan` float DEFAULT NULL,
  `jumlah` float NOT NULL,
  `nilai_perilaku` float NOT NULL,
  `bulan` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_nilai_perilaku`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_nilai_perilaku` */

LOCK TABLES `tb_nilai_perilaku` WRITE;

UNLOCK TABLES;

/*Table structure for table `tb_nilai_prestasi` */

DROP TABLE IF EXISTS `tb_nilai_prestasi`;

CREATE TABLE `tb_nilai_prestasi` (
  `id_nilai_prestasi` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `nilai_capaian` float DEFAULT NULL,
  `nilai_perilaku` float DEFAULT NULL,
  `nilai_prestasi_kerja` float DEFAULT NULL,
  `keterangan` varchar(20) DEFAULT NULL,
  `create_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_nilai_prestasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_nilai_prestasi` */

LOCK TABLES `tb_nilai_prestasi` WRITE;

UNLOCK TABLES;

/*Table structure for table `tb_role_permission` */

DROP TABLE IF EXISTS `tb_role_permission`;

CREATE TABLE `tb_role_permission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;

/*Data for the table `tb_role_permission` */

LOCK TABLES `tb_role_permission` WRITE;

insert  into `tb_role_permission`(`id`,`role_id`,`menu_id`) values (2,1,2),(4,1,3),(5,1,4),(14,1,5),(15,1,1),(21,1,6),(22,1,7),(24,1,9),(25,1,8),(26,1,10),(27,2,1),(30,2,9),(31,2,10),(33,2,5),(35,2,3),(36,2,2),(37,2,11),(38,3,1),(39,3,9),(43,3,13),(46,2,4),(47,2,16),(48,2,15),(49,2,18),(50,2,17),(51,2,19),(52,2,21),(53,2,20),(54,3,2),(55,3,3),(56,3,5),(58,3,22);

UNLOCK TABLES;

/*Table structure for table `tb_roles` */

DROP TABLE IF EXISTS `tb_roles`;

CREATE TABLE `tb_roles` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `create_at` timestamp NOT NULL,
  `update_at` timestamp NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tb_roles` */

LOCK TABLES `tb_roles` WRITE;

insert  into `tb_roles`(`role_id`,`role_name`,`description`,`create_at`,`update_at`) values (1,'Administrator','administrator','2020-05-30 12:30:00','2020-05-30 12:30:00'),(2,'Operator','Operator','2020-05-30 12:40:00','2020-05-30 12:43:00'),(3,'Pegawai','Pegawai','2020-05-30 12:49:00','2020-05-30 12:50:00');

UNLOCK TABLES;

/*Table structure for table `tb_setting` */

DROP TABLE IF EXISTS `tb_setting`;

CREATE TABLE `tb_setting` (
  `setting_id` int(11) NOT NULL,
  `setting_name` varchar(50) NOT NULL,
  `value` tinyint(1) NOT NULL,
  PRIMARY KEY (`setting_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_setting` */

LOCK TABLES `tb_setting` WRITE;

insert  into `tb_setting`(`setting_id`,`setting_name`,`value`) values (1,'Tampil Menu',1);

UNLOCK TABLES;

/*Table structure for table `tb_skp` */

DROP TABLE IF EXISTS `tb_skp`;

CREATE TABLE `tb_skp` (
  `skp_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `kegiatan` text,
  `kuantitas` varchar(50) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `kualitas` int(3) NOT NULL DEFAULT '0',
  `waktu` int(5) DEFAULT '0',
  `tanggal` date DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `realiasi` int(11) DEFAULT '0',
  `total_hitung` int(11) DEFAULT NULL,
  `nilai_capaian_skp` float DEFAULT NULL,
  `create_at` timestamp NOT NULL,
  PRIMARY KEY (`skp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

/*Data for the table `tb_skp` */

LOCK TABLES `tb_skp` WRITE;

insert  into `tb_skp`(`skp_id`,`user_id`,`kegiatan`,`kuantitas`,`satuan`,`kualitas`,`waktu`,`tanggal`,`status`,`realiasi`,`total_hitung`,`nilai_capaian_skp`,`create_at`) values (3,3,'Menyiapkan arsip bukti-bukti penerimaan dan pengeluaran.','12','Laporan',100,1,'2020-06-25',0,0,NULL,NULL,'2020-06-25 21:32:40');

UNLOCK TABLES;

/*Table structure for table `tb_skp_realisasi` */

DROP TABLE IF EXISTS `tb_skp_realisasi`;

CREATE TABLE `tb_skp_realisasi` (
  `id_skp_realisasi` int(11) NOT NULL AUTO_INCREMENT,
  `skp_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `output` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `file` varchar(200) DEFAULT NULL,
  `waktu_mulai` time DEFAULT NULL,
  `waktu_selesai` time DEFAULT NULL,
  `create_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_skp_realisasi`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tb_skp_realisasi` */

LOCK TABLES `tb_skp_realisasi` WRITE;

insert  into `tb_skp_realisasi`(`id_skp_realisasi`,`skp_id`,`user_id`,`output`,`tanggal`,`file`,`waktu_mulai`,`waktu_selesai`,`create_at`) values (1,3,3,5,'2020-06-26','Tugas_jabatan_file-Penyuluhan_KB_di_dusun_selo_541.docx','18:20:00','20:20:00','2020-06-26 18:21:00');

UNLOCK TABLES;

/*Table structure for table `tb_tugas_skp` */

DROP TABLE IF EXISTS `tb_tugas_skp`;

CREATE TABLE `tb_tugas_skp` (
  `id_tugas_skp` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `skp_id` int(11) NOT NULL,
  `tgl_pengerjaan` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `output` varchar(100) DEFAULT NULL,
  `satuan` varchar(200) DEFAULT '',
  `file` varchar(200) DEFAULT '',
  `create_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_tugas_skp`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

/*Data for the table `tb_tugas_skp` */

LOCK TABLES `tb_tugas_skp` WRITE;

insert  into `tb_tugas_skp`(`id_tugas_skp`,`user_id`,`skp_id`,`tgl_pengerjaan`,`start_time`,`end_time`,`output`,`satuan`,`file`,`create_at`) values (1,3,1,'2020-06-10','16:39:00','18:39:00','3','dokumen','','2020-06-09 16:39:47'),(2,3,2,'2020-06-09','17:00:00','19:59:00','4','lembar','none','2020-06-09 18:00:13'),(3,3,1,'2020-06-09','17:00:00','19:59:00','4','dokumen','ada','2020-06-09 18:00:34'),(4,3,1,'2020-06-09','18:14:00','20:14:00','1','dokumen','none','2020-06-09 18:15:01'),(5,3,2,'2020-06-09','18:16:00','20:16:00','1','lembar','none','2020-06-09 18:16:32'),(6,3,1,'2020-06-16','18:18:00','20:18:00','2','dokumen','no-file','2020-06-09 18:19:12'),(7,3,2,'2020-06-11','18:23:00','20:23:00','3','lembar','no-file','2020-06-09 18:23:58'),(8,3,2,'2020-06-08','18:24:00','19:24:00','3','lembar',NULL,'2020-06-09 18:24:39'),(9,3,2,'2020-06-08','18:24:00','19:24:00','3','lembar',NULL,'2020-06-09 18:25:15'),(10,3,2,'2020-06-16','18:25:00','20:25:00','3','lembar',NULL,'2020-06-09 18:25:45'),(11,3,1,'2020-06-11','18:39:00','22:37:00','5','dokumen','no-file','2020-06-09 18:38:02'),(12,3,1,'2020-06-18','19:54:00','20:54:00','4','dokumen','no-file','2020-06-18 19:54:51'),(13,3,2,'2020-06-19','19:55:00','20:55:00','3','lembar','dispensasi.docx','2020-06-18 19:55:25');

UNLOCK TABLES;

/*Table structure for table `tb_tugas_tambahan` */

DROP TABLE IF EXISTS `tb_tugas_tambahan`;

CREATE TABLE `tb_tugas_tambahan` (
  `id_tambahan` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `kegiatan` varchar(200) DEFAULT NULL,
  `waktu_mulai` time DEFAULT NULL,
  `waktu_selesai` time DEFAULT NULL,
  `output` varchar(50) DEFAULT NULL,
  `volume` varchar(100) DEFAULT NULL,
  `satuan` varchar(100) DEFAULT NULL,
  `pemberi_tugas` varchar(200) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `file` text,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `create_at` timestamp NOT NULL,
  PRIMARY KEY (`id_tambahan`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tb_tugas_tambahan` */

LOCK TABLES `tb_tugas_tambahan` WRITE;

insert  into `tb_tugas_tambahan`(`id_tambahan`,`user_id`,`kegiatan`,`waktu_mulai`,`waktu_selesai`,`output`,`volume`,`satuan`,`pemberi_tugas`,`tanggal`,`file`,`status`,`create_at`) values (1,3,'Test3','17:43:00','19:43:00','4','1','dokumen','Lurah','2020-06-19','Tugas_harian_file-Dokumen.docx',1,'2020-06-19 17:43:37'),(2,3,'test 4','17:50:17','18:50:19','3','1','lembar','Lurah','2020-06-23','no-file',0,'2020-06-23 17:50:53');

UNLOCK TABLES;

/*Table structure for table `tb_tugas_tambahan_staff` */

DROP TABLE IF EXISTS `tb_tugas_tambahan_staff`;

CREATE TABLE `tb_tugas_tambahan_staff` (
  `id_tambahan` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `kegiatan` varchar(250) DEFAULT NULL,
  `keterangan` text,
  `pemberi_tugas` varchar(200) DEFAULT NULL,
  `file` varchar(200) DEFAULT NULL,
  `waktu_mulai` time DEFAULT NULL,
  `waktu_selesai` time DEFAULT NULL,
  `output` int(11) DEFAULT NULL,
  `satuan` varchar(100) DEFAULT NULL,
  `create_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_tambahan`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tb_tugas_tambahan_staff` */

LOCK TABLES `tb_tugas_tambahan_staff` WRITE;

insert  into `tb_tugas_tambahan_staff`(`id_tambahan`,`user_id`,`tanggal`,`kegiatan`,`keterangan`,`pemberi_tugas`,`file`,`waktu_mulai`,`waktu_selesai`,`output`,`satuan`,`create_at`) values (1,3,'2020-06-26','Kunjungan desa',NULL,'Lurah','Tugas_tambahan-SOAL_UL_HARIAN.doc','18:46:00','20:46:00',1,'Kegiatan','2020-06-26 18:47:25');

UNLOCK TABLES;

/*Table structure for table `tb_users` */

DROP TABLE IF EXISTS `tb_users`;

CREATE TABLE `tb_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nip` varchar(100) NOT NULL,
  `nik` varchar(30) DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `create_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL,
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `display_name` varchar(50) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `phone` varchar(20) DEFAULT NULL,
  `full_name` varchar(200) NOT NULL,
  `born_date` date NOT NULL,
  `images` varchar(100) DEFAULT NULL,
  `id_jabatan` int(11) DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `gender` enum('L','P') DEFAULT NULL,
  `address` text,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tb_users` */

LOCK TABLES `tb_users` WRITE;

insert  into `tb_users`(`user_id`,`role_id`,`email`,`password`,`nip`,`nik`,`last_login`,`create_at`,`update_at`,`banned`,`display_name`,`active`,`phone`,`full_name`,`born_date`,`images`,`id_jabatan`,`deleted`,`gender`,`address`) values (1,1,'admin@admin.com','$2y$04$bs8yZWigc.fKFBm1sXwJWO2Y1JOhwBtDttXWpzRl67ZpeTc3cbMXS','1300016056','34083912839121','2020-06-25 17:35:23','2020-05-06 18:02:21','2020-05-09 10:00:56',0,'admin',1,'085727651561','admin admininstrator','2020-05-04','profile_admin.jpg',0,0,'L','Bantul, Yogyakarta'),(2,2,'op@simpeg.com','$2y$04$aZ8ewfpDTKzZFegB.JybSeWcCsFfbj3qALJRkZgnS1x.bPiOZcSe6','1300016058','12345678','2020-06-26 18:50:44','2020-05-09 09:42:48','2020-06-01 07:14:18',0,'Operator',1,'087665566111','Operator','1975-05-07','profile_operator.png',0,0,'L','Jogjakarta'),(3,3,'files.yadi@gmail.com','$2y$04$et6tyWaZgWE1.fikcruuoehVix2x5g7wSiL7KC6Lxd0kFllOypw6i','1300016058',NULL,'2020-06-26 18:00:42','2020-06-03 08:00:35',NULL,0,'Dwi',1,NULL,'Dwi Nurhadi','1996-06-03','user.png',10,0,NULL,NULL);

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
