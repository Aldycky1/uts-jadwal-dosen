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
(1,	'Chandra Wirawan',	'Depok, Jawa Barat',	'081200000000',	3),
(3,	'Aldy',	'Bekasi',	'081300000000',	3);

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
(2,	'Selasa',	4,	3,	4,	3,	6),
(3,	'Senin',	2,	1,	2,	2,	2);

DROP TABLE IF EXISTS `jam_kuliah`;
CREATE TABLE `jam_kuliah` (
  `jam_id` int(12) NOT NULL AUTO_INCREMENT,
  `jamkuliah` varchar(55) NOT NULL,
  PRIMARY KEY (`jam_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `jam_kuliah` (`jam_id`, `jamkuliah`) VALUES
(2,	'11.05 - 11.55'),
(4,	'12.45 - 13.35');

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
(2,	'MICE - A',	2,	'II',	'2020 - 2021'),
(4,	'ABT - B',	7,	'V',	'2021 - 2022');

DROP TABLE IF EXISTS `matakuliah`;
CREATE TABLE `matakuliah` (
  `matakuliah_id` int(12) NOT NULL AUTO_INCREMENT,
  `nama_matakuliah` varchar(40) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `sks` varchar(10) NOT NULL,
  PRIMARY KEY (`matakuliah_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `matakuliah` (`matakuliah_id`, `nama_matakuliah`, `semester`, `sks`) VALUES
(2,	'Pengantar Teknologi Informasi ',	'I',	'2'),
(3,	'Web Design',	'VI',	'3');

DROP TABLE IF EXISTS `pendidikan`;
CREATE TABLE `pendidikan` (
  `pen_id` int(12) NOT NULL AUTO_INCREMENT,
  `nama_pen` varchar(35) NOT NULL,
  PRIMARY KEY (`pen_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `pendidikan` (`pen_id`, `nama_pen`) VALUES
(2,	'S1 Teknik Informatika'),
(3,	'S1 Sistem Informasi'),
(4,	'S1 Ilmu Komputer');

DROP TABLE IF EXISTS `prodi`;
CREATE TABLE `prodi` (
  `prodi_id` int(12) NOT NULL AUTO_INCREMENT,
  `nama_prodi` varchar(35) NOT NULL,
  PRIMARY KEY (`prodi_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `prodi` (`prodi_id`, `nama_prodi`) VALUES
(2,	'Teknik Informatika'),
(3,	'Teknik Multimedia dan Jaringan'),
(4,	'Teknik Multimedia Digital'),
(5,	'Teknik Komputer dan Jaringan'),
(7,	'MICE');

DROP TABLE IF EXISTS `ruangan`;
CREATE TABLE `ruangan` (
  `ruangan_id` int(12) NOT NULL AUTO_INCREMENT,
  `ruangan_nama` varchar(55) NOT NULL,
  PRIMARY KEY (`ruangan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `ruangan` (`ruangan_id`, `ruangan_nama`) VALUES
(2,	'115'),
(3,	'109'),
(4,	'306'),
(6,	'GSG 1');

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `user` (`id`, `nama`, `username`, `password`) VALUES
(1,	'Aldycky Bagus Witjaksana',	'admin',	'21232f297a57a5a743894a0e4a801fc3');

-- 2021-11-08 15:33:04
