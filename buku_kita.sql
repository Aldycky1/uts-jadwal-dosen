-- Adminer 4.8.1 MySQL 5.7.24 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `buku`;
CREATE TABLE `buku` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) NOT NULL,
  `penerbit` varchar(50) DEFAULT NULL,
  `pengarang` varchar(50) DEFAULT NULL,
  `tahun` varchar(4) DEFAULT NULL,
  `kategori_id` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kategori_id` (`kategori_id`),
  CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `buku` (`id`, `judul`, `penerbit`, `pengarang`, `tahun`, `kategori_id`, `harga`) VALUES
(2,	'Buku Agama',	'Gramedia',	'Roy Suryo',	'2001',	NULL,	9999),
(3,	'Buku Belajar Memahami Wanita',	'Gramedia',	'Herzi',	'2020',	53,	99000);

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `divisi`;
CREATE TABLE `divisi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_divisi` varchar(75) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `divisi` (`id`, `nama_divisi`) VALUES
(2,	'HRD'),
(3,	'Marketing'),
(4,	'Personalia'),
(5,	'Pembelanjaan');

DROP TABLE IF EXISTS `kategori`;
CREATE TABLE `kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `kategori` (`id`, `nama_kategori`) VALUES
(6,	'Rhome irama'),
(7,	'lucuu2'),
(8,	'asiap1'),
(10,	'12'),
(11,	'12'),
(12,	'12'),
(13,	'12'),
(14,	'12'),
(15,	'qw'),
(16,	'qw'),
(17,	'qw'),
(18,	'qw'),
(19,	'qw'),
(20,	'123'),
(21,	'44'),
(22,	'qd'),
(23,	'ef'),
(24,	'24'),
(25,	'qwd'),
(26,	'qwd'),
(27,	'qwd'),
(28,	'qwd'),
(29,	'qwd'),
(31,	'123'),
(32,	'qwd'),
(33,	'asd'),
(34,	'asd'),
(35,	'asd'),
(36,	'123'),
(37,	'qwd'),
(38,	'asd'),
(39,	'asd'),
(40,	'asd'),
(41,	'asc'),
(42,	'123'),
(43,	'asd'),
(44,	'asd'),
(48,	'bb'),
(49,	'5000'),
(50,	'Anime'),
(52,	'123'),
(53,	'Love Story'),
(54,	'2342'),
(55,	'2342'),
(56,	'2342'),
(57,	'123'),
(58,	'tambah');

DROP TABLE IF EXISTS `pegawai`;
CREATE TABLE `pegawai` (
  `divisi_id` int(11) NOT NULL,
  `nip` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(75) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  PRIMARY KEY (`nip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `pegawai` (`divisi_id`, `nip`, `nama`, `alamat`, `tanggal_lahir`, `no_hp`) VALUES
(5,	2,	'Aldycky Bagus Oke',	'Bekasi, Jawa Barat',	'2021-10-10',	'081244359880');

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `user` (`id`, `nama`, `username`, `password`) VALUES
(1,	'Herzi',	'admin',	'21232f297a57a5a743894a0e4a801fc3');

-- 2021-10-12 08:30:17
