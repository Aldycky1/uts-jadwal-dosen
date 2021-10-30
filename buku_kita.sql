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
(4,	'Mastering React JS',	'Gramedia',	'Aldycky Bagus ',	'2020',	61,	399000),
(5,	'Jago Bahasa Java Dalam Sebulan',	'Erlangga',	'Aldycky Bagus ',	'2019',	62,	699000),
(6,	'Bangun Website Sederhana dengan HTML & CSS',	'Yudhistira ',	'Aldycky Bagus ',	'2021',	64,	299000),
(7,	'Mahir Menggunakan Bahasa PHP ',	'Gramedia',	'Aldycky Bagus ',	'2020',	63,	499000);

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
(5,	'Pembelanjaan'),
(6,	'Divisi Baru');

DROP TABLE IF EXISTS `kategori`;
CREATE TABLE `kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `kategori` (`id`, `nama_kategori`) VALUES
(61,	'JavaScript'),
(62,	'Java'),
(63,	'PHP'),
(64,	'HTML & CSS');

DROP TABLE IF EXISTS `pegawai`;
CREATE TABLE `pegawai` (
  `nip` varchar(20) NOT NULL,
  `divisi_id` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(75) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `pegawai` (`nip`, `divisi_id`, `id`, `nama`, `alamat`, `tanggal_lahir`, `no_hp`) VALUES
('3248738298094',	3,	8,	'Aldycky Bagus',	'Bekasi, Jawa Barat',	'2000-10-20',	'082100000000'),
('83782192837',	2,	9,	'Elon Musk',	'Bandung, Jawa Barat',	'1971-06-28',	'+6281300000000'),
('2832837823781',	5,	10,	'Mark Zuckerberg',	'Solo, Jawa Tengah',	'1984-05-14',	'+627800000000'),
('3248738294324',	3,	11,	'Bill Gates',	'Surabaya, Jawa Timur',	'1955-10-28',	'+6283800000000'),
('3248723032238',	6,	12,	'Steve Jobs',	'Jaksel, DKI Jakarta',	'1955-02-24',	'+6289600000000');

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

-- 2021-10-30 03:01:58
