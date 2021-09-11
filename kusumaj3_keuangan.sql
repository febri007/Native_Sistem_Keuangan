-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 16 Sep 2020 pada 06.49
-- Versi server: 5.7.31-log
-- Versi PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kusumaj3_keuangan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `belanja`
--

CREATE TABLE `belanja` (
  `id_belanja` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_pengeluaran` date NOT NULL,
  `jumlah` int(122) NOT NULL,
  `id_sumber` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `is_update` enum('0','1','','') NOT NULL,
  `kt_update` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `belanja`
--

INSERT INTO `belanja` (`id_belanja`, `id_user`, `tgl_pengeluaran`, `jumlah`, `id_sumber`, `keterangan`, `is_update`, `kt_update`) VALUES
(51, 6, '2020-08-01', 150000, 1, 'Makan Siang', '0', ''),
(54, 6, '2020-08-02', 144000, 1, 'Makan Siang', '0', ''),
(55, 6, '2020-08-03', 125000, 1, 'Makan Siang', '0', ''),
(57, 6, '2020-08-04', 135000, 1, 'Makan Siang', '0', ''),
(58, 6, '2020-08-04', 320000, 1, 'Membeli Cemilan', '0', ''),
(59, 6, '2020-08-05', 450000, 1, 'Membeli Handsanitizer, Masker dan Face Shield', '0', ''),
(60, 6, '2020-09-06', 143500, 1, 'Makan Siang', '0', ''),
(61, 6, '2020-09-07', 129400, 1, 'Makan Siang', '0', ''),
(62, 6, '2020-09-08', 145000, 1, 'Makan Siang', '0', ''),
(63, 6, '2020-09-09', 134000, 1, 'Makan Siang', '0', ''),
(64, 6, '2020-09-10', 150000, 1, 'Makan Siang', '0', ''),
(65, 6, '2020-09-11', 123500, 1, 'Makan Siang', '0', ''),
(66, 6, '2020-09-12', 140000, 1, 'Makan Siang', '0', ''),
(67, 6, '2020-09-13', 147000, 1, 'Makan Siang', '0', ''),
(69, 6, '2020-08-15', 150000, 1, 'Makan Siang', '0', ''),
(71, 6, '2020-09-14', 135000, 1, 'Makan Siang', '0', ''),
(72, 6, '2020-08-15', 143000, 1, 'Makan Siang', '0', ''),
(73, 6, '2020-09-15', 150000, 1, 'Makan Siang', '0', ''),
(74, 6, '2020-08-16', 120000, 1, 'Makan Siang', '0', ''),
(75, 6, '2020-09-16', 120000, 1, 'Makan Siang', '0', ''),
(77, 6, '2020-08-17', 145000, 1, 'Makan Siang', '0', ''),
(78, 6, '2020-08-15', 135000, 1, 'Makan Siang', '0', ''),
(79, 6, '2020-08-15', 143000, 1, 'Makan Siang', '0', ''),
(80, 6, '2020-08-18', 146000, 1, 'Makan Siang', '0', ''),
(81, 6, '2020-08-19', 123000, 1, 'Makan Siang', '0', ''),
(82, 6, '2020-08-20', 150000, 1, 'Makan Siang', '0', ''),
(83, 6, '2020-08-21', 135000, 1, 'Makan Siang', '0', ''),
(84, 6, '2020-08-22', 150000, 1, 'Makan Siang', '0', ''),
(85, 6, '2020-08-23', 130000, 1, 'Makan Siang', '0', ''),
(86, 6, '2020-08-24', 154000, 1, 'Makan Siang', '0', ''),
(88, 6, '2020-08-25', 150000, 1, 'Makan Siang', '0', ''),
(89, 6, '2020-08-26', 120000, 1, 'Makan Siang', '0', ''),
(90, 6, '2020-08-27', 145500, 1, 'Makan Siang', '0', ''),
(91, 6, '2020-08-28', 150000, 1, 'Makan Siang', '0', ''),
(92, 6, '2020-08-29', 130000, 1, 'Makan Siang', '0', ''),
(93, 6, '2020-08-30', 132500, 1, 'Makan Siang', '0', ''),
(94, 6, '2020-08-31', 150000, 1, 'Makan Siang', '0', ''),
(95, 6, '2020-09-06', 150000, 1, 'Biaya mengikuti kegiatan sosialisasi masker dengan bahan batik', '0', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail`
--

CREATE TABLE `detail` (
  `id_detail` int(11) NOT NULL,
  `kd_detail` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nama` varchar(255) NOT NULL,
  `pengeluaran` int(111) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `is_update` enum('0','1','','') NOT NULL,
  `kt_update` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail`
--

INSERT INTO `detail` (`id_detail`, `kd_detail`, `tanggal`, `nama`, `pengeluaran`, `keterangan`, `id_user`, `is_update`, `kt_update`) VALUES
(77, 1, '2020-08-12', 'Lampu LED LT2 Tengah ', 90000, 'Lampu Mati, Diganti dengan yang baru bermerk Phillips', 6, '0', ''),
(78, 1, '2020-08-26', 'Dinding Lt 1', 400000, 'Perbaikan dinding Retak', 6, '0', ''),
(79, 3, '2020-08-20', 'Anti Jamur', 120000, 'Membeli Anti Jamur yang ditaruh pada Rak setiap penyimpanan baju', 6, '0', ''),
(80, 4, '2020-08-04', 'pph pasal 21', 750000, 'DJP pph 21', 6, '0', ''),
(81, 5, '2020-08-15', 'Listrik', 800000, 'Listrik', 6, '0', ''),
(82, 5, '2020-08-12', 'Indihome', 280000, 'Membayar layanan internet dan Tv broadband', 6, '0', ''),
(83, 2, '2020-08-31', 'Nur Alifah', 1240000, 'Penuh', 6, '0', ''),
(84, 2, '2020-08-31', 'Ayu Nuraini', 1178000, 'Penuh', 6, '0', ''),
(85, 2, '2020-08-31', 'Ratnawati', 1178000, 'Penuh', 6, '0', ''),
(86, 2, '2020-08-31', 'Suci Handayani', 1178000, 'Penuh', 6, '0', ''),
(87, 2, '2020-08-31', 'Ervina Dewanty', 1178000, 'Penuh', 6, '0', ''),
(88, 2, '2020-08-31', 'Ni\'matul Fitriani', 1178000, 'Penuh', 6, '0', ''),
(89, 1, '2020-09-04', 'Isi freon AC Gree 1PK', 500000, 'Isi ulang freon, Dikarenakan AC sudah tidak dingin', 6, '0', ''),
(90, 3, '2020-09-02', 'Tiang Sangga Baju', 75000, 'Las tiangg sangga baju yang dikawathirkan putus', 6, '0', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hutang`
--

CREATE TABLE `hutang` (
  `id_hutang` int(11) NOT NULL,
  `terima` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `dibayar` int(111) NOT NULL,
  `tgl_hutang` date NOT NULL,
  `alasan` text NOT NULL,
  `penghutang` varchar(40) NOT NULL,
  `status` enum('Dalam Cicilan','Dibayar') DEFAULT NULL,
  `is_updateh` enum('0','1','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hutang`
--

INSERT INTO `hutang` (`id_hutang`, `terima`, `jumlah`, `dibayar`, `tgl_hutang`, `alasan`, `penghutang`, `status`, `is_updateh`) VALUES
(47, 150000000, 171690012, 66768338, '2019-08-15', 'Modal Pengembangan Usaha dan Perluasan Tempat usaha', 'Bank Rakyat Indonesia', 'Dalam Cicilan', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_belanja` int(11) NOT NULL,
  `nama_kegiatan` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `is_updatek` enum('0','1','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kegiatan`
--

INSERT INTO `kegiatan` (`id_kegiatan`, `id_user`, `id_belanja`, `nama_kegiatan`, `tanggal`, `lokasi`, `is_updatek`) VALUES
(32, 6, 95, 'Sosialisasi Masker Dengan Kain Batik untuk Melestarikan dan Memperkenalkan Batik ke Dunia Internasional', '2020-09-06', 'JEC ', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `operasional`
--

CREATE TABLE `operasional` (
  `id_operasional` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `pajak` int(111) NOT NULL,
  `biaya_perbaikan` int(11) NOT NULL,
  `gaji_karyawan` int(11) NOT NULL,
  `biaya_perawatan` int(11) NOT NULL,
  `tanggalawal` date NOT NULL,
  `tanggalakhir` date NOT NULL,
  `lainlain` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `is_update` enum('0','1','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `operasional`
--

INSERT INTO `operasional` (`id_operasional`, `id_user`, `pajak`, `biaya_perbaikan`, `gaji_karyawan`, `biaya_perawatan`, `tanggalawal`, `tanggalakhir`, `lainlain`, `keterangan`, `is_update`) VALUES
(43, 6, 750000, 490000, 7130000, 120000, '2020-08-01', '2020-08-31', 1080000, 'data ok', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemasukan`
--

CREATE TABLE `pemasukan` (
  `id_pemasukan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_pemasukan` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id_sumber` int(11) NOT NULL,
  `is_update` enum('0','1','','') NOT NULL,
  `is_kdhutang` varchar(255) NOT NULL,
  `kt_update` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemasukan`
--

INSERT INTO `pemasukan` (`id_pemasukan`, `id_user`, `tgl_pemasukan`, `jumlah`, `id_sumber`, `is_update`, `is_kdhutang`, `kt_update`) VALUES
(186, 6, '2020-06-01', 320000, 1, '0', '', ''),
(187, 6, '2020-06-02', 410000, 1, '0', '', ''),
(188, 6, '2020-06-03', 220000, 1, '0', '', ''),
(190, 6, '2020-06-05', 325000, 1, '0', '', ''),
(191, 6, '2020-06-06', 540000, 1, '0', '', ''),
(192, 6, '2020-06-04', 250000, 1, '0', '', ''),
(193, 6, '2020-06-07', 430000, 1, '0', '', ''),
(194, 6, '2020-06-08', 632000, 1, '0', '', ''),
(195, 6, '2020-06-09', 440000, 1, '0', '', ''),
(196, 6, '2020-06-10', 80000, 1, '0', '', ''),
(197, 6, '2020-06-11', 0, 1, '0', '', ''),
(198, 6, '2020-06-12', 0, 1, '0', '', ''),
(199, 6, '2020-06-13', 460000, 1, '0', '', ''),
(200, 6, '2020-06-14', 854000, 1, '0', '', ''),
(201, 6, '2020-06-25', 0, 1, '0', '', ''),
(202, 6, '2020-06-15', 0, 1, '0', '', ''),
(203, 6, '2020-06-16', 180000, 1, '0', '', ''),
(204, 6, '2020-06-17', 0, 1, '0', '', ''),
(205, 6, '2020-06-18', 543000, 1, '0', '', ''),
(206, 6, '2020-06-19', 0, 1, '0', '', ''),
(207, 6, '2020-06-20', 867000, 1, '0', '', ''),
(208, 6, '2020-06-21', 776000, 1, '0', '', ''),
(209, 6, '2020-06-22', 0, 1, '0', '', ''),
(210, 6, '2020-06-23', 97000, 1, '0', '', ''),
(211, 6, '2020-06-24', 0, 1, '0', '', ''),
(212, 6, '2020-06-26', 380000, 1, '0', '', ''),
(213, 6, '2020-06-27', 1443000, 1, '0', '', ''),
(215, 6, '2020-06-28', 598000, 1, '0', '', ''),
(216, 6, '2020-06-29', 0, 1, '0', '', ''),
(217, 6, '2020-06-30', 0, 1, '0', '', ''),
(218, 6, '2020-07-01', 345000, 1, '0', '', ''),
(219, 6, '2020-07-02', 430000, 1, '0', '', ''),
(220, 6, '2020-06-03', 0, 1, '0', '', ''),
(221, 6, '2020-07-04', 670000, 1, '0', '', ''),
(222, 6, '2020-07-04', 670000, 1, '1', '', ''),
(223, 6, '2020-07-05', 120000, 1, '0', '', ''),
(224, 6, '2020-07-06', 0, 1, '0', '', ''),
(225, 6, '2020-07-07', 89000, 1, '0', '', ''),
(226, 6, '2020-07-08', 0, 1, '1', '', ''),
(227, 6, '2020-08-08', 760000, 1, '1', '', ''),
(228, 6, '2020-07-08', 760000, 1, '0', '', ''),
(229, 6, '2020-07-09', 0, 1, '0', '', ''),
(230, 6, '2020-07-10', 670000, 1, '0', '', ''),
(231, 6, '2020-06-11', 78000, 1, '0', '', ''),
(232, 6, '2020-07-03', 0, 1, '0', '', ''),
(233, 6, '2020-07-11', 667000, 1, '0', '', ''),
(234, 6, '2020-07-12', 445000, 1, '0', '', ''),
(235, 6, '2020-07-13', 0, 1, '0', '', ''),
(236, 6, '2020-07-14', 0, 1, '0', '', ''),
(237, 6, '2020-07-15', 478000, 1, '0', '', ''),
(238, 6, '2020-07-16', 0, 1, '0', '', ''),
(239, 6, '2020-07-17', 0, 1, '0', '', ''),
(240, 6, '2020-07-18', 310000, 1, '0', '', ''),
(241, 6, '2020-07-19', 375000, 1, '0', '', ''),
(242, 6, '2020-07-20', 87000, 1, '0', '', ''),
(243, 6, '2020-07-21', 0, 1, '0', '', ''),
(244, 6, '2020-07-22', 0, 1, '0', '', ''),
(245, 6, '2020-07-23', 87000, 1, '0', '', ''),
(246, 6, '2020-07-24', 0, 1, '0', '', ''),
(247, 6, '2020-07-25', 134000, 1, '0', '', ''),
(248, 6, '2020-07-26', 577000, 1, '0', '', ''),
(249, 6, '2020-07-27', 311000, 1, '0', '', ''),
(250, 6, '2020-07-28', 433000, 1, '0', '', ''),
(251, 6, '2020-07-29', 120000, 1, '0', '', ''),
(252, 6, '2020-07-30', 167000, 1, '0', '', ''),
(253, 6, '2020-07-31', 110000, 1, '1', '', ''),
(254, 6, '2020-08-01', 340000, 1, '0', '', ''),
(255, 6, '2020-08-02', 0, 1, '0', '', ''),
(256, 6, '2020-07-31', 0, 1, '0', '', ''),
(257, 6, '2020-08-03', 277000, 1, '0', '', ''),
(258, 6, '2020-08-04', 90000, 1, '0', '', ''),
(259, 6, '2020-08-05', 67000, 1, '0', '', ''),
(260, 6, '2020-08-06', 75000, 1, '0', '', ''),
(261, 6, '2020-08-07', 576000, 1, '0', '', ''),
(262, 6, '2020-08-08', 650000, 1, '0', '', ''),
(263, 6, '2020-08-09', 233000, 1, '0', '', ''),
(264, 6, '2020-08-10', 344000, 1, '0', '', ''),
(265, 6, '2020-08-11', 542000, 1, '0', '', ''),
(266, 6, '2020-08-12', 210000, 1, '0', '', ''),
(267, 6, '2020-08-13', 175000, 1, '0', '', ''),
(268, 6, '2020-08-14', 310000, 1, '0', '', ''),
(269, 6, '2020-08-15', 770000, 1, '0', '', ''),
(270, 6, '2020-08-16', 890000, 1, '0', '', ''),
(271, 6, '2020-08-17', 650000, 1, '0', '', ''),
(272, 6, '2020-08-18', 112000, 1, '0', '', ''),
(273, 6, '2020-08-19', 90000, 1, '0', '', ''),
(274, 6, '2020-08-20', 333000, 1, '0', '', ''),
(275, 6, '2020-08-21', 266000, 1, '0', '', ''),
(276, 6, '2020-08-22', 860000, 1, '0', '', ''),
(277, 6, '2020-08-23', 756000, 1, '0', '', ''),
(278, 6, '2020-08-24', 270000, 1, '0', '', ''),
(279, 6, '2020-08-25', 76000, 1, '0', '', ''),
(280, 6, '2020-08-26', 180000, 1, '0', '', ''),
(281, 6, '2020-08-27', 187000, 1, '0', '', ''),
(282, 6, '2020-08-28', 768000, 1, '0', '', ''),
(283, 6, '2020-08-29', 821000, 1, '1', '', ''),
(284, 25, '2020-08-29', 0, 1, '1', '', ''),
(285, 25, '2020-08-29', 100, 1, '1', '', 'Data Diubah'),
(287, 25, '2020-08-29', 400, 1, '1', '', 'Data Diubah'),
(288, 25, '2020-08-30', 876000, 1, '0', '', ''),
(289, 25, '2020-08-29', 220000, 1, '0', '', 'Data Baru Pengganti'),
(290, 25, '2020-08-31', 330000, 1, '0', '', ''),
(297, 6, '2020-09-01', 503000, 1, '0', '', ''),
(298, 6, '2020-09-02', 320000, 1, '0', '', ''),
(299, 6, '2020-09-03', 423000, 1, '0', '', ''),
(300, 6, '2020-09-04', 233000, 1, '0', '', ''),
(301, 6, '2020-09-05', 843000, 1, '0', '', ''),
(302, 6, '2020-09-06', 1200000, 1, '0', '', ''),
(303, 6, '2020-09-07', 340000, 1, '0', '', ''),
(304, 6, '2020-09-08', 120000, 1, '0', '', ''),
(305, 6, '2020-09-09', 67000, 1, '0', '', ''),
(306, 6, '2020-09-10', 60000, 1, '0', '', ''),
(307, 6, '2020-09-11', 320000, 1, '0', '', ''),
(308, 6, '2020-09-12', 650000, 1, '0', '', ''),
(309, 6, '2020-09-13', 754000, 1, '0', '', ''),
(310, 6, '2020-09-14', 211000, 1, '0', '', ''),
(311, 6, '2020-09-15', 64000, 1, '0', '', ''),
(312, 6, '2019-08-15', 150000000, 2, '0', 'HTG-SYS-171690012Modal Pengembangan Usaha dan Perluasan Tempat usahaBank Rakyat Indonesia2019-08-15', ''),
(313, 6, '2020-06-10', 2100000, 16, '0', '', ''),
(314, 6, '2020-07-10', 2100000, 16, '0', '', ''),
(315, 6, '2020-08-10', 2100000, 16, '0', '', ''),
(316, 6, '2020-06-30', 5000000, 19, '0', '', ''),
(317, 6, '2020-07-15', 5000000, 19, '0', '', ''),
(318, 6, '2020-08-15', 5000000, 19, '0', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran_hutang`
--

CREATE TABLE `pembayaran_hutang` (
  `id_pembayaranhutang` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `dibayar_hutang` int(211) NOT NULL,
  `tanggal_byr` date NOT NULL,
  `keterangan_byrhutang` varchar(122) NOT NULL,
  `id_hutang` int(11) NOT NULL,
  `is_updatebh` enum('0','1','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran_hutang`
--

INSERT INTO `pembayaran_hutang` (`id_pembayaranhutang`, `id_user`, `dibayar_hutang`, `tanggal_byr`, `keterangan_byrhutang`, `id_hutang`, `is_updatebh`) VALUES
(47, 6, 4769167, '2019-09-08', 'Cicilan 1 dari 36', 47, '0'),
(48, 6, 4769167, '2019-10-08', 'Cicilan 2 dari 36', 47, '0'),
(49, 6, 4769167, '2019-11-07', 'Cicilan 3 dari 36', 47, '0'),
(50, 6, 4769167, '2019-12-09', 'Cicilan 4 dari 36', 47, '0'),
(51, 6, 4769167, '2020-01-08', 'Cicilan 5 dari 36', 47, '0'),
(52, 6, 4769167, '2020-02-08', 'Cicilan 6 dari 36', 47, '0'),
(53, 6, 4769167, '2020-03-08', 'Cicilan 7 dari 36', 47, '0'),
(54, 6, 4769167, '2020-04-08', 'Cicilan 8 dari 36', 47, '0'),
(55, 6, 4769167, '2020-04-08', 'Cicilan 9 dari 36', 47, '1'),
(56, 6, 4769167, '2020-05-08', 'Cicilan 9 dari 36', 47, '0'),
(57, 6, 4769167, '2020-06-09', 'cicilan 10 dari 36', 47, '0'),
(58, 6, 4769167, '2020-07-07', 'Cicilan 11 dari 36', 47, '0'),
(59, 6, 4769167, '2020-07-08', 'Cicilan 12 dari 36', 47, '0'),
(60, 6, 4769167, '2020-08-07', 'Cicilan 13 dari 36', 47, '0'),
(61, 6, 4769167, '2020-09-08', 'Cicilan 14 dari 36', 47, '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sumber`
--

CREATE TABLE `sumber` (
  `id_sumber` int(11) NOT NULL,
  `nama_sumber` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sumber`
--

INSERT INTO `sumber` (`id_sumber`, `nama_sumber`) VALUES
(1, 'Penjualan'),
(2, 'Hutang'),
(5, 'Lain-Lain'),
(15, 'Bantuan UMKM Kab Sleman'),
(16, 'Bantuan UMKM Terdampak Covid-19'),
(18, 'Bantuan UMKM Dana Desa Tlogoadi'),
(19, 'Bantuan Lainya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `no_tlp` char(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `is_active` enum('0','1','','') NOT NULL,
  `is_hidden` enum('0','1','','') NOT NULL,
  `kdreset` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `no_tlp`, `email`, `jabatan`, `alamat`, `is_active`, `is_hidden`, `kdreset`) VALUES
(6, 'Edi Tiawan', 'edi1', '5660d9466e66440bfee5c63382980026', '0816555334', 'editiawan47@gmail.com', 'pemimpin', 'Seyegan Sleman', '0', '0', 0),
(25, 'Febri Nugroho', 'febri', '2fd9c4fb157a0a6da7437fa3622d7f9f', '08994157133', 'bisnisfebri063@gmail.com', 'pemimpin', 'Nogotirto, Gamping, Sleman, Yogyakarta', '0', '0', 280324),
(26, 'Nur Alifah', 'nur', '8cdbaaeece079ecf0bb7e95a9684818e', '0878444562', 'alifah_muslimah@gmail.com', 'Bagian Keuangan', 'Getas, Godean, Sleman', '0', '0', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `belanja`
--
ALTER TABLE `belanja`
  ADD PRIMARY KEY (`id_belanja`),
  ADD KEY `id_sumber` (`id_sumber`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `detail`
--
ALTER TABLE `detail`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `hutang`
--
ALTER TABLE `hutang`
  ADD PRIMARY KEY (`id_hutang`);

--
-- Indeks untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_belanja` (`id_belanja`);

--
-- Indeks untuk tabel `operasional`
--
ALTER TABLE `operasional`
  ADD PRIMARY KEY (`id_operasional`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `pemasukan`
--
ALTER TABLE `pemasukan`
  ADD PRIMARY KEY (`id_pemasukan`),
  ADD KEY `id_sumber` (`id_sumber`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `pembayaran_hutang`
--
ALTER TABLE `pembayaran_hutang`
  ADD PRIMARY KEY (`id_pembayaranhutang`),
  ADD KEY `id_hutang` (`id_hutang`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `sumber`
--
ALTER TABLE `sumber`
  ADD PRIMARY KEY (`id_sumber`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `belanja`
--
ALTER TABLE `belanja`
  MODIFY `id_belanja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT untuk tabel `detail`
--
ALTER TABLE `detail`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT untuk tabel `hutang`
--
ALTER TABLE `hutang`
  MODIFY `id_hutang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `operasional`
--
ALTER TABLE `operasional`
  MODIFY `id_operasional` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `pemasukan`
--
ALTER TABLE `pemasukan`
  MODIFY `id_pemasukan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=319;

--
-- AUTO_INCREMENT untuk tabel `pembayaran_hutang`
--
ALTER TABLE `pembayaran_hutang`
  MODIFY `id_pembayaranhutang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT untuk tabel `sumber`
--
ALTER TABLE `sumber`
  MODIFY `id_sumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `belanja`
--
ALTER TABLE `belanja`
  ADD CONSTRAINT `belanja_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `belanja_ibfk_2` FOREIGN KEY (`id_sumber`) REFERENCES `sumber` (`id_sumber`);

--
-- Ketidakleluasaan untuk tabel `detail`
--
ALTER TABLE `detail`
  ADD CONSTRAINT `detail_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD CONSTRAINT `kegiatan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `kegiatan_ibfk_2` FOREIGN KEY (`id_belanja`) REFERENCES `belanja` (`id_belanja`);

--
-- Ketidakleluasaan untuk tabel `operasional`
--
ALTER TABLE `operasional`
  ADD CONSTRAINT `operasional_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `pemasukan`
--
ALTER TABLE `pemasukan`
  ADD CONSTRAINT `pemasukan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `pemasukan_ibfk_2` FOREIGN KEY (`id_sumber`) REFERENCES `sumber` (`id_sumber`);

--
-- Ketidakleluasaan untuk tabel `pembayaran_hutang`
--
ALTER TABLE `pembayaran_hutang`
  ADD CONSTRAINT `pembayaran_hutang_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `pembayaran_hutang_ibfk_2` FOREIGN KEY (`id_hutang`) REFERENCES `hutang` (`id_hutang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
