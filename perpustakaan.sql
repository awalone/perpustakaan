/*
SQLyog Ultimate v10.42 
MySQL - 5.6.17 : Database - persuratan
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`persuratan` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `persuratan`;

/*Table structure for table `perpustakaan_anggota` */

DROP TABLE IF EXISTS `perpustakaan_anggota`;

CREATE TABLE `perpustakaan_anggota` (
  `anggota_id` int(4) NOT NULL AUTO_INCREMENT,
  `anggota_nim` varchar(100) NOT NULL,
  `anggota_jkel` enum('L','P') NOT NULL DEFAULT 'L',
  `anggota_nama` varchar(100) NOT NULL,
  `anggota_tgl_daftar` date NOT NULL,
  `anggota_alamat` text NOT NULL,
  `anggota_foto` varchar(200) NOT NULL,
  `anggota_kode` varchar(100) NOT NULL,
  PRIMARY KEY (`anggota_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Table structure for table `perpustakaan_buku` */

DROP TABLE IF EXISTS `perpustakaan_buku`;

CREATE TABLE `perpustakaan_buku` (
  `buku_id` int(3) NOT NULL AUTO_INCREMENT,
  `buku_judul` varchar(70) NOT NULL,
  `buku_pengarang` varchar(70) NOT NULL,
  `buku_penerbit` varchar(70) NOT NULL,
  `buku_tahun_terbit` year(4) NOT NULL,
  `buku_jumlah_eksemplar` int(3) NOT NULL,
  `buku_stok` int(3) NOT NULL,
  `buku_download` varchar(100) NOT NULL,
  `buku_isbn` varchar(100) NOT NULL,
  `buku_sinopsis` text NOT NULL,
  `buku_lokasi_rak` varchar(40) NOT NULL,
  `buku_kode` varchar(100) NOT NULL,
  `buku_jenis` int(3) NOT NULL,
  PRIMARY KEY (`buku_id`),
  KEY `FK_kategori` (`buku_jenis`),
  CONSTRAINT `perpustakaan_buku_ibfk_1` FOREIGN KEY (`buku_jenis`) REFERENCES `perpustakaan_jenis_buku` (`jenis_buku_id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Table structure for table `perpustakaan_denda` */

DROP TABLE IF EXISTS `perpustakaan_denda`;

CREATE TABLE `perpustakaan_denda` (
  `denda_id` int(6) NOT NULL AUTO_INCREMENT,
  `denda_jumlah` smallint(6) NOT NULL,
  `denda_anggota` varchar(100) NOT NULL,
  `denda_buku` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`denda_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `perpustakaan_jenis_buku` */

DROP TABLE IF EXISTS `perpustakaan_jenis_buku`;

CREATE TABLE `perpustakaan_jenis_buku` (
  `jenis_buku_id` int(3) NOT NULL AUTO_INCREMENT,
  `jenis_buku_nama` varchar(200) NOT NULL,
  `jenis_buku_deskripsi` text NOT NULL,
  PRIMARY KEY (`jenis_buku_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Table structure for table `perpustakaan_log` */

DROP TABLE IF EXISTS `perpustakaan_log`;

CREATE TABLE `perpustakaan_log` (
  `log_user` varchar(100) NOT NULL,
  `log_action` varchar(100) NOT NULL,
  `log_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `perpustakaan_penerbit` */

DROP TABLE IF EXISTS `perpustakaan_penerbit`;

CREATE TABLE `perpustakaan_penerbit` (
  `penerbit_id` int(3) NOT NULL AUTO_INCREMENT,
  `penerbit_nama` varchar(200) NOT NULL,
  `penerbit_alamat` text NOT NULL,
  `penerbit_telepon` varchar(40) NOT NULL,
  `penerbit_email` varchar(40) NOT NULL,
  `penerbit_deskripsi` text NOT NULL,
  PRIMARY KEY (`penerbit_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `perpustakaan_penulis` */

DROP TABLE IF EXISTS `perpustakaan_penulis`;

CREATE TABLE `perpustakaan_penulis` (
  `penulis_id` int(3) NOT NULL AUTO_INCREMENT,
  `penulis_nama` varchar(200) NOT NULL,
  `penulis_alamat` text NOT NULL,
  `penulis_telepon` varchar(40) NOT NULL,
  `penulis_email` varchar(40) NOT NULL,
  `penulis_deskripsi` text NOT NULL,
  PRIMARY KEY (`penulis_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `perpustakaan_pinjaman` */

DROP TABLE IF EXISTS `perpustakaan_pinjaman`;

CREATE TABLE `perpustakaan_pinjaman` (
  `pinjaman_id_order` int(4) NOT NULL AUTO_INCREMENT,
  `pinjaman_konsumen` int(4) NOT NULL,
  `pinjaman_kode_unik` varchar(100) NOT NULL,
  `pinjaman_tanggal_pinjam` date NOT NULL,
  `pinjaman_tanggal_kembali` date NOT NULL,
  `pinjaman_jaminan` varchar(100) NOT NULL,
  PRIMARY KEY (`pinjaman_id_order`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

/*Table structure for table `perpustakaan_pinjaman_detail` */

DROP TABLE IF EXISTS `perpustakaan_pinjaman_detail`;

CREATE TABLE `perpustakaan_pinjaman_detail` (
  `pinjaman_detail_id` int(5) NOT NULL AUTO_INCREMENT,
  `pinjaman_detail_id_order` int(5) NOT NULL,
  `pinjaman_detail_buku` int(5) NOT NULL,
  `status_buku` enum('pinjam','kembali') DEFAULT 'pinjam',
  `pinjaman_tgl_kembali` date NOT NULL,
  PRIMARY KEY (`pinjaman_detail_id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

/*Table structure for table `perpustakaan_pinjaman_temp` */

DROP TABLE IF EXISTS `perpustakaan_pinjaman_temp`;

CREATE TABLE `perpustakaan_pinjaman_temp` (
  `temp_id` int(3) NOT NULL AUTO_INCREMENT,
  `temp_session` varchar(100) NOT NULL,
  `temp_id_buku` varchar(100) NOT NULL,
  PRIMARY KEY (`temp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=108 DEFAULT CHARSET=latin1;

/*Table structure for table `perpustakaan_user` */

DROP TABLE IF EXISTS `perpustakaan_user`;

CREATE TABLE `perpustakaan_user` (
  `user_name` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_fullname` varchar(200) NOT NULL,
  `user_level` varchar(20) NOT NULL,
  `user_active` enum('y','n') DEFAULT 'y',
  PRIMARY KEY (`user_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `pos_produk` */

DROP TABLE IF EXISTS `pos_produk`;

CREATE TABLE `pos_produk` (
  `id_produk` int(3) DEFAULT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `jumlah_produk` int(5) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `keterangan_produk` text NOT NULL,
  `gambar_produk` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `ref_klasifikasi` */

DROP TABLE IF EXISTS `ref_klasifikasi`;

CREATE TABLE `ref_klasifikasi` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `kode` varchar(50) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `uraian` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=176 DEFAULT CHARSET=latin1;

/*Table structure for table `referensi_agama` */

DROP TABLE IF EXISTS `referensi_agama`;

CREATE TABLE `referensi_agama` (
  `id_ref_agama` int(2) NOT NULL AUTO_INCREMENT,
  `nama_ref_agama` varchar(30) NOT NULL,
  PRIMARY KEY (`id_ref_agama`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Table structure for table `referensi_bank` */

DROP TABLE IF EXISTS `referensi_bank`;

CREATE TABLE `referensi_bank` (
  `id_ref_bank` int(2) NOT NULL AUTO_INCREMENT,
  `nama_ref_bank` varchar(30) NOT NULL,
  PRIMARY KEY (`id_ref_bank`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Table structure for table `referensi_fakultas` */

DROP TABLE IF EXISTS `referensi_fakultas`;

CREATE TABLE `referensi_fakultas` (
  `fakultas_id` int(2) NOT NULL AUTO_INCREMENT,
  `fakultas_nama` varchar(100) NOT NULL,
  PRIMARY KEY (`fakultas_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Table structure for table `referensi_jabatan` */

DROP TABLE IF EXISTS `referensi_jabatan`;

CREATE TABLE `referensi_jabatan` (
  `id_ref_jabatan` int(2) NOT NULL AUTO_INCREMENT,
  `nama_ref_jabatan` varchar(30) NOT NULL,
  PRIMARY KEY (`id_ref_jabatan`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Table structure for table `referensi_pendidikan` */

DROP TABLE IF EXISTS `referensi_pendidikan`;

CREATE TABLE `referensi_pendidikan` (
  `id_ref_pendidikan` int(2) NOT NULL AUTO_INCREMENT,
  `nama_ref_pendidikan` varchar(40) NOT NULL,
  `kode_ref_pendidikan` varchar(10) NOT NULL,
  PRIMARY KEY (`id_ref_pendidikan`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Table structure for table `tbl_login` */

DROP TABLE IF EXISTS `tbl_login`;

CREATE TABLE `tbl_login` (
  `id_login` varchar(75) DEFAULT NULL,
  `id_group` tinyint(4) DEFAULT NULL,
  `id_user` varchar(15) DEFAULT NULL,
  `passwd` varchar(96) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `tbl_user` */

DROP TABLE IF EXISTS `tbl_user`;

CREATE TABLE `tbl_user` (
  `id_user` varchar(15) DEFAULT NULL,
  `nm_user` varchar(150) DEFAULT NULL,
  `nip` varchar(63) DEFAULT NULL,
  `pangkat` varchar(90) DEFAULT NULL,
  `golongan` varchar(30) DEFAULT NULL,
  `jabatan` varchar(150) DEFAULT NULL,
  `tlp_user` varchar(90) DEFAULT NULL,
  `email_user` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `username` varchar(255) NOT NULL,
  `email` varchar(2555) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
