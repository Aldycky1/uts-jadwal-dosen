-- Adminer 4.8.1 MySQL 5.7.24 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `dosen`;
CREATE TABLE `dosen` (
  `dosen_id` int(12) NOT NULL AUTO_INCREMENT,
  `nama_dosen` varchar(55) NOT NULL,
  `alamat_dosen` varchar(80) NOT NULL,
  `tlp_dosen` varchar(15) NOT NULL,
  `pen_id` int(12) NOT NULL,
  PRIMARY KEY (`dosen_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `dosen` (`dosen_id`, `nama_dosen`, `alamat_dosen`, `tlp_dosen`, `pen_id`) VALUES
(1,	'Chandra Wirawan',	'Depok, Jawa Barat',	'081200000000',	4);

DROP TABLE IF EXISTS `jadwal`;
CREATE TABLE `jadwal` (
  `jadwal_id` int(12) NOT NULL AUTO_INCREMENT,
  `hari` varchar(10) NOT NULL,
  `jam_id` int(12) NOT NULL,
  `dosen_id` int(12) NOT NULL,
  `kelas_id` int(12) NOT NULL,
  `matakuliah_id` int(12) NOT NULL,
  `ruangan_id` int(12) NOT NULL,
  PRIMARY KEY (`jadwal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `jadwal` (`jadwal_id`, `hari`, `jam_id`, `dosen_id`, `kelas_id`, `matakuliah_id`, `ruangan_id`) VALUES
(2,	'Senin',	3,	1,	1,	1,	1);

DROP TABLE IF EXISTS `jam_kuliah`;
CREATE TABLE `jam_kuliah` (
  `jam_id` int(12) NOT NULL AUTO_INCREMENT,
  `jam_mulai` varchar(55) NOT NULL,
  `jam_selesai` varchar(55) NOT NULL,
  PRIMARY KEY (`jam_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `jam_kuliah` (`jam_id`, `jam_mulai`, `jam_selesai`) VALUES
(1,	'11:28 AM',	'12:55 PM'),
(2,	'9:35 AM',	'10:10 AM'),
(3,	'8:00 AM',	'8:40 AM'),
(4,	'10:25 AM',	'11:05 AM'),
(5,	'1:05 PM',	'1:45 PM'),
(6,	'1:45 PM',	'2:25 PM');

DROP TABLE IF EXISTS `kelas`;
CREATE TABLE `kelas` (
  `kelas_id` int(12) NOT NULL AUTO_INCREMENT,
  `nama_kelas` varchar(40) NOT NULL,
  `prodi_id` int(12) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `tahun_akademik` varchar(20) NOT NULL,
  PRIMARY KEY (`kelas_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `kelas` (`kelas_id`, `nama_kelas`, `prodi_id`, `semester`, `tahun_akademik`) VALUES
(1,	'MICE - A',	8,	'II',	'2021 - 2022'),
(2,	'ABT - B',	2,	'II',	'2021 - 2022');

DROP TABLE IF EXISTS `matakuliah`;
CREATE TABLE `matakuliah` (
  `matakuliah_id` int(12) NOT NULL AUTO_INCREMENT,
  `nama_matakuliah` varchar(40) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `sks` varchar(10) NOT NULL,
  PRIMARY KEY (`matakuliah_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `matakuliah` (`matakuliah_id`, `nama_matakuliah`, `semester`, `sks`) VALUES
(1,	'Pengantar Teknologi Informasi',	'II',	'2'),
(3,	'Object Oriented Analysis and Design',	'II',	'2');

DROP TABLE IF EXISTS `pendidikan`;
CREATE TABLE `pendidikan` (
  `pen_id` int(12) NOT NULL AUTO_INCREMENT,
  `nama_pen` varchar(35) NOT NULL,
  PRIMARY KEY (`pen_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `pendidikan` (`pen_id`, `nama_pen`) VALUES
(1,	'S1 Teknik Informatika'),
(2,	'S2 Ilmu Komputer'),
(3,	'S1 Teknik Elektro'),
(4,	'S1 Sistem Informasi');

DROP TABLE IF EXISTS `prodi`;
CREATE TABLE `prodi` (
  `prodi_id` int(12) NOT NULL AUTO_INCREMENT,
  `nama_prodi` varchar(35) NOT NULL,
  PRIMARY KEY (`prodi_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `prodi` (`prodi_id`, `nama_prodi`) VALUES
(1,	'Teknik Multimedia dan Jaringan'),
(2,	'Teknik Informatika'),
(4,	'Teknik Elektro'),
(5,	'Teknik Komputer dan Jaringan'),
(6,	'Teknik Multimedia dan Digital'),
(7,	'Teknik Mesin'),
(8,	'MICE');

DROP TABLE IF EXISTS `ruangan`;
CREATE TABLE `ruangan` (
  `ruangan_id` int(12) NOT NULL AUTO_INCREMENT,
  `ruangan_nama` varchar(55) NOT NULL,
  PRIMARY KEY (`ruangan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `ruangan` (`ruangan_id`, `ruangan_nama`) VALUES
(1,	'115'),
(2,	'GSG 1'),
(3,	'109'),
(4,	'306');

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `user` (`id`, `nama`, `username`, `password`) VALUES
(1,	'Aldy',	'admin',	'21232f297a57a5a743894a0e4a801fc3');

-- 2021-12-06 15:30:08
