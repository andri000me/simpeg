-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for db_simpeg
CREATE DATABASE IF NOT EXISTS `db_simpeg` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `db_simpeg`;

-- Dumping structure for table db_simpeg.tb_departemen
CREATE TABLE IF NOT EXISTS `tb_departemen` (
  `id_departemen` int(11) NOT NULL AUTO_INCREMENT,
  `departemen_name` varchar(100) DEFAULT NULL,
  `create_at` timestamp NOT NULL,
  `update_at` timestamp NOT NULL,
  PRIMARY KEY (`id_departemen`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- Dumping data for table db_simpeg.tb_departemen: ~6 rows (approximately)
/*!40000 ALTER TABLE `tb_departemen` DISABLE KEYS */;
INSERT INTO `tb_departemen` (`id_departemen`, `departemen_name`, `create_at`, `update_at`) VALUES
	(1, 'Pemerintahan', '2020-05-20 00:00:00', '2020-05-30 13:36:00'),
	(9, 'Kesejahteraan', '2020-05-31 02:08:54', '0000-00-00 00:00:00'),
	(10, 'Pelayanan', '2020-05-31 02:09:01', '0000-00-00 00:00:00'),
	(11, 'Keuangan', '2020-05-31 02:14:03', '0000-00-00 00:00:00'),
	(12, 'Tata Usaha dan Umum', '2020-05-31 02:14:42', '0000-00-00 00:00:00'),
	(14, 'Perencanaan', '2020-05-31 02:18:27', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `tb_departemen` ENABLE KEYS */;

-- Dumping structure for table db_simpeg.tb_jabatan
CREATE TABLE IF NOT EXISTS `tb_jabatan` (
  `id_jabatan` int(5) NOT NULL AUTO_INCREMENT,
  `jabatan_name` varchar(50) NOT NULL,
  `id_departemen` int(11) DEFAULT NULL,
  `create_at` timestamp NOT NULL,
  `update_at` timestamp NOT NULL,
  PRIMARY KEY (`id_jabatan`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- Dumping data for table db_simpeg.tb_jabatan: ~12 rows (approximately)
/*!40000 ALTER TABLE `tb_jabatan` DISABLE KEYS */;
INSERT INTO `tb_jabatan` (`id_jabatan`, `jabatan_name`, `id_departemen`, `create_at`, `update_at`) VALUES
	(5, 'Staff', 14, '2020-05-31 02:41:28', '0000-00-00 00:00:00'),
	(6, 'Staff', 12, '2020-05-31 02:41:38', '0000-00-00 00:00:00'),
	(7, 'Staff', 11, '2020-05-31 02:41:44', '0000-00-00 00:00:00'),
	(8, 'Staff', 10, '2020-05-31 02:41:51', '0000-00-00 00:00:00'),
	(9, 'Staff', 9, '2020-05-31 02:41:59', '0000-00-00 00:00:00'),
	(10, 'Staff', 1, '2020-05-31 02:42:04', '0000-00-00 00:00:00'),
	(11, 'Ka. Sie', 14, '2020-05-31 02:42:21', '0000-00-00 00:00:00'),
	(12, 'Ka. Sie', 12, '2020-05-31 02:42:25', '0000-00-00 00:00:00'),
	(13, 'Ka. Sie', 11, '2020-05-31 02:42:31', '0000-00-00 00:00:00'),
	(14, 'Ka. Sie', 10, '2020-05-31 02:42:33', '0000-00-00 00:00:00'),
	(15, 'Ka. Sie', 9, '2020-05-31 02:42:36', '0000-00-00 00:00:00'),
	(16, 'Ka. Sie', 1, '2020-05-31 02:42:39', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `tb_jabatan` ENABLE KEYS */;

-- Dumping structure for table db_simpeg.tb_konfigurasi
CREATE TABLE IF NOT EXISTS `tb_konfigurasi` (
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

-- Dumping data for table db_simpeg.tb_konfigurasi: ~1 rows (approximately)
/*!40000 ALTER TABLE `tb_konfigurasi` DISABLE KEYS */;
INSERT INTO `tb_konfigurasi` (`id_konfigurasi`, `name_app`, `logo`, `phone`, `alamat`, `email`, `keywords`, `metatext`, `instansi`, `pimpinan`, `sekretaris`, `about`, `update_at`) VALUES
	(1, 'SIMPEG', 'logo-instansi.png', '0811-2651-333', 'Plebengan, Sidomulyo, Bambanglipuro, Bantul', 'desa.sidomulyo@bantulkab.go.id', NULL, NULL, 'Kantor Kelurahan Desa Sidomulyo', 'Lurah', 'Sekretaris', 'Sistem Pendukung Keputusan Penerima Tunjangan                                                                                                                                                                                                                                                                                                                                                                                                                                          ', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `tb_konfigurasi` ENABLE KEYS */;

-- Dumping structure for table db_simpeg.tb_menu
CREATE TABLE IF NOT EXISTS `tb_menu` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `url` varchar(200) NOT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `is_main_menu` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `create_at` timestamp NOT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- Dumping data for table db_simpeg.tb_menu: ~13 rows (approximately)
/*!40000 ALTER TABLE `tb_menu` DISABLE KEYS */;
INSERT INTO `tb_menu` (`menu_id`, `title`, `url`, `icon`, `is_main_menu`, `is_active`, `create_at`) VALUES
	(1, 'Dashboard', 'dashboard', NULL, 0, 0, '2020-05-29 21:16:59'),
	(2, 'Kelola Pengguna', '', 'fe fe-users', 0, 1, '2020-05-27 20:30:00'),
	(3, 'User Level', 'userlevel', '', 2, 1, '2020-05-29 16:28:15'),
	(4, 'User Management', 'users', '', 2, 1, '2020-05-29 16:30:45'),
	(5, 'Kelola Menu', 'menu', 'fe fe-menu', 0, 1, '2020-05-29 19:57:44'),
	(6, 'Master Data', '', 'fa fa-suitcase', 0, 1, '2020-05-30 09:27:04'),
	(7, 'Data Jabatan', 'jabatan', '', 6, 1, '2020-05-30 09:31:01'),
	(8, 'Departemen', 'departemen', '', 6, 1, '2020-05-30 10:32:40'),
	(9, 'Profil', 'profile', '', 0, 0, '2020-05-31 07:26:05'),
	(10, 'Settings', 'settings', '', 0, 0, '2020-06-01 17:36:41'),
	(11, 'Data Master', '', 'fa fa-cubes', 0, 1, '2020-06-03 07:49:20'),
	(12, 'Data Pegawai', 'pegawai', '', 11, 1, '2020-06-03 07:57:45'),
	(13, 'SKP', 'skp', 'fa fa-area-chart', 0, 1, '2020-06-03 09:15:49'),
	(14, 'Tugas', 'tugas', 'fa fa-file-text', 0, 1, '2020-06-03 11:41:40');
/*!40000 ALTER TABLE `tb_menu` ENABLE KEYS */;

-- Dumping structure for table db_simpeg.tb_roles
CREATE TABLE IF NOT EXISTS `tb_roles` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `create_at` timestamp NOT NULL,
  `update_at` timestamp NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table db_simpeg.tb_roles: ~3 rows (approximately)
/*!40000 ALTER TABLE `tb_roles` DISABLE KEYS */;
INSERT INTO `tb_roles` (`role_id`, `role_name`, `description`, `create_at`, `update_at`) VALUES
	(1, 'Administrator', 'administrator', '2020-05-30 12:30:00', '2020-05-30 12:30:00'),
	(2, 'Operator', 'Operator', '2020-05-30 12:40:00', '2020-05-30 12:43:00'),
	(3, 'Pegawai', 'Pegawai', '2020-05-30 12:49:00', '2020-05-30 12:50:00');
/*!40000 ALTER TABLE `tb_roles` ENABLE KEYS */;

-- Dumping structure for table db_simpeg.tb_role_permission
CREATE TABLE IF NOT EXISTS `tb_role_permission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

-- Dumping data for table db_simpeg.tb_role_permission: ~23 rows (approximately)
/*!40000 ALTER TABLE `tb_role_permission` DISABLE KEYS */;
INSERT INTO `tb_role_permission` (`id`, `role_id`, `menu_id`) VALUES
	(2, 1, 2),
	(4, 1, 3),
	(5, 1, 4),
	(14, 1, 5),
	(15, 1, 1),
	(21, 1, 6),
	(22, 1, 7),
	(24, 1, 9),
	(25, 1, 8),
	(26, 1, 10),
	(27, 2, 1),
	(30, 2, 9),
	(31, 2, 10),
	(33, 2, 5),
	(35, 2, 3),
	(36, 2, 2),
	(37, 2, 11),
	(38, 3, 1),
	(39, 3, 9),
	(40, 3, 3),
	(41, 3, 2),
	(42, 3, 5),
	(43, 3, 13),
	(44, 3, 14);
/*!40000 ALTER TABLE `tb_role_permission` ENABLE KEYS */;

-- Dumping structure for table db_simpeg.tb_setting
CREATE TABLE IF NOT EXISTS `tb_setting` (
  `setting_id` int(11) NOT NULL,
  `setting_name` varchar(50) NOT NULL,
  `value` tinyint(1) NOT NULL,
  PRIMARY KEY (`setting_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_simpeg.tb_setting: ~0 rows (approximately)
/*!40000 ALTER TABLE `tb_setting` DISABLE KEYS */;
INSERT INTO `tb_setting` (`setting_id`, `setting_name`, `value`) VALUES
	(1, 'Tampil Menu', 1);
/*!40000 ALTER TABLE `tb_setting` ENABLE KEYS */;

-- Dumping structure for table db_simpeg.tb_skp
CREATE TABLE IF NOT EXISTS `tb_skp` (
  `skp_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `kegiatan` text,
  `kuantitas` varchar(50) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `kualitas` int(3) NOT NULL DEFAULT '0',
  `waktu` int(5) DEFAULT '0',
  `create_at` timestamp NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `month` char(50) DEFAULT NULL,
  PRIMARY KEY (`skp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table db_simpeg.tb_skp: ~3 rows (approximately)
/*!40000 ALTER TABLE `tb_skp` DISABLE KEYS */;
INSERT INTO `tb_skp` (`skp_id`, `user_id`, `kegiatan`, `kuantitas`, `satuan`, `kualitas`, `waktu`, `create_at`, `status`, `month`) VALUES
	(1, 3, 'test1', '4', 'dokumen', 100, 30, '2020-05-03 16:07:59', 0, 'Juni'),
	(2, 3, 'test 2', '4', 'lembar', 100, 14, '2020-06-03 11:30:15', 0, 'Juni');
/*!40000 ALTER TABLE `tb_skp` ENABLE KEYS */;

-- Dumping structure for table db_simpeg.tb_tugas_skp
CREATE TABLE IF NOT EXISTS `tb_tugas_skp` (
  `id_tugas_skp` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `skp_id` int(11) NOT NULL,
  `tgl_pengerjaan` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `output` varchar(100) DEFAULT NULL,
  `dokumen` varchar(200) DEFAULT '',
  `create_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_tugas_skp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_simpeg.tb_tugas_skp: ~0 rows (approximately)
/*!40000 ALTER TABLE `tb_tugas_skp` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_tugas_skp` ENABLE KEYS */;

-- Dumping structure for table db_simpeg.tb_users
CREATE TABLE IF NOT EXISTS `tb_users` (
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

-- Dumping data for table db_simpeg.tb_users: ~2 rows (approximately)
/*!40000 ALTER TABLE `tb_users` DISABLE KEYS */;
INSERT INTO `tb_users` (`user_id`, `role_id`, `email`, `password`, `nip`, `nik`, `last_login`, `create_at`, `update_at`, `banned`, `display_name`, `active`, `phone`, `full_name`, `born_date`, `images`, `id_jabatan`, `deleted`, `gender`, `address`) VALUES
	(1, 1, 'admin@admin.com', '$2y$04$bs8yZWigc.fKFBm1sXwJWO2Y1JOhwBtDttXWpzRl67ZpeTc3cbMXS', '1300016056', '2143213213123213', '2020-06-03 16:13:21', '2020-05-06 18:02:21', '2020-05-09 10:00:56', 0, 'admin', 1, '085727651561', 'admin admininstrator', '2020-05-04', 'profile_admin.jpg', 0, 0, 'L', 'Bantul, Yogyakarta'),
	(2, 2, 'op@simpeg.com', '$2y$04$aZ8ewfpDTKzZFegB.JybSeWcCsFfbj3qALJRkZgnS1x.bPiOZcSe6', '1300016058', '12345678', '2020-06-03 14:56:55', '2020-05-09 09:42:48', '2020-06-01 07:14:18', 0, 'Operator', 1, '087665566111', 'Operator', '1975-05-07', 'profile_operator.png', 0, 0, 'L', 'Jogjakarta'),
	(3, 3, 'files.yadi@gmail.com', '$2y$04$et6tyWaZgWE1.fikcruuoehVix2x5g7wSiL7KC6Lxd0kFllOypw6i', '1300016058', NULL, '2020-06-04 19:07:56', '2020-06-03 08:00:35', NULL, 0, 'Dwi', 1, NULL, 'Dwi Nurhadi', '1996-06-03', 'user.png', 10, 0, NULL, NULL);
/*!40000 ALTER TABLE `tb_users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
