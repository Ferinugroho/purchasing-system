-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 05, 2015 at 05:20 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `semen`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang_keluar`
--

CREATE TABLE IF NOT EXISTS `barang_keluar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_barang` varchar(4) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `jumlah_barang` varchar(30) NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `keterangan` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `barang_keluar`
--

INSERT INTO `barang_keluar` (`id`, `id_barang`, `nama_barang`, `jumlah_barang`, `tanggal_keluar`, `keterangan`) VALUES
(15, 'B001', 'Batubara', '100', '2015-03-21', 'Ton'),
(16, 'B001', 'Batubara', '1', '2015-03-13', 'Kilo Liter');

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE IF NOT EXISTS `barang_masuk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_barang` varchar(4) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `jumlah_barang` int(30) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `keterangan` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `barang_masuk`
--

INSERT INTO `barang_masuk` (`id`, `id_barang`, `nama_barang`, `jumlah_barang`, `tanggal_masuk`, `keterangan`) VALUES
(42, 'FA01', 'Fly Ash', 100, '2015-03-02', 'Ton'),
(43, 'B001', 'Batubara', 10000, '2015-03-09', 'Ton');

-- --------------------------------------------------------

--
-- Table structure for table `order_barang`
--

CREATE TABLE IF NOT EXISTS `order_barang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `jumlah_barang` varchar(30) NOT NULL,
  `tanggal_pemesanan` date NOT NULL,
  `status` enum('belum diproses','sedang diproses') NOT NULL,
  `keterangan` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `order_barang`
--

INSERT INTO `order_barang` (`id`, `id_barang`, `nama_barang`, `jumlah_barang`, `tanggal_pemesanan`, `status`, `keterangan`) VALUES
(28, 'BB01', 'Biji Besi', '100', '0000-00-00', 'sedang diproses', 'Kilo Liter'),
(29, 'BB01', 'Biji Besi', '100', '0000-00-00', 'belum diproses', 'Kilo Liter'),
(30, 'PS01', 'Pasir Silika', '10', '0000-00-00', 'belum diproses', 'Ton');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE IF NOT EXISTS `pengguna` (
  `id_pengguna` int(50) NOT NULL AUTO_INCREMENT,
  `nama_pengguna` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` enum('admin','kepala','pengadaan','pabrik') NOT NULL,
  PRIMARY KEY (`id_pengguna`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama_pengguna`, `username`, `password`, `level`) VALUES
(1, 'Feri Nugroho', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(2, 'dwi', 'kepala', '870f669e4bbbfa8a6fde65549826d1c4', 'kepala'),
(3, 'ria syafitri', 'pengadaan', '847f55e913a1327b5519168555e22595', 'pengadaan'),
(4, 'Indah Hidayah Santi', 'pabrik', 'd716783ecdb3f7bff754c5c275260c1d', 'pabrik'),
(5, 'Anjas', 'anjas', '827ccb0eea8a706c4c34a16891f84e7b', 'pengadaan');

-- --------------------------------------------------------

--
-- Table structure for table `permintaan`
--

CREATE TABLE IF NOT EXISTS `permintaan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_barang` varchar(30) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `jumlah_barang` varchar(30) NOT NULL,
  `keterangan` varchar(30) NOT NULL,
  `tgl_permintaan` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `permintaan`
--

INSERT INTO `permintaan` (`id`, `id_barang`, `nama_barang`, `jumlah_barang`, `keterangan`, `tgl_permintaan`) VALUES
(3, 'B001', 'Batubara', '100', 'Ton', '2015-03-21');

-- --------------------------------------------------------

--
-- Table structure for table `stok_barang`
--

CREATE TABLE IF NOT EXISTS `stok_barang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_barang` varchar(4) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `jumlah_barang` int(50) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `ket` varchar(20) NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `stok_awal` int(11) NOT NULL,
  `stok_masuk` int(11) NOT NULL,
  `stok_keluar` int(11) NOT NULL,
  `stok_akhir` int(11) NOT NULL,
  `stok_min` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `stok_barang`
--

INSERT INTO `stok_barang` (`id`, `id_barang`, `nama_barang`, `jumlah_barang`, `tanggal_masuk`, `ket`, `tanggal_keluar`, `stok_awal`, `stok_masuk`, `stok_keluar`, `stok_akhir`, `stok_min`) VALUES
(1, 'BB01', 'Biji Besi', 111, '2015-03-10', 'Ton', '0000-00-00', 0, 0, 0, 0, '1500'),
(2, 'SL01', 'Solar', 314202, '0000-00-00', 'Liter', '2015-03-14', 0, 0, 0, 0, '5000'),
(3, 'PS01', 'Pasir Silika', 1000, '2015-03-14', 'Ton', '0000-00-00', 0, 0, 0, 0, '500'),
(4, 'PB01', 'Pasir Besi', 54, '0000-00-00', 'Ton', '0000-00-00', 0, 0, 0, 0, '1500'),
(5, 'SK01', 'Solar Kiln', 20018, '0000-00-00', 'Kilo Liter', '0000-00-00', 0, 0, 0, 0, '50'),
(6, 'B001', 'Batubara', 9475, '2015-03-09', 'Ton', '2015-03-13', 0, 0, 0, 0, '5000'),
(7, 'FA01', 'Fly Ash', 100, '2015-03-02', 'Ton', '0000-00-00', 0, 0, 0, 0, '150'),
(8, 'GP01', 'Gypsum', 8793, '2015-03-02', 'Ton', '0000-00-00', 0, 0, 0, 0, '800'),
(9, 'PZ01', 'Pozzolan', 10, '0000-00-00', 'Ton', '0000-00-00', 0, 0, 0, 0, '1000');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
