-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Jun 2020 pada 05.09
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kjbkeuangan`
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
  `is_update` enum('0','1','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `belanja`
--

INSERT INTO `belanja` (`id_belanja`, `id_user`, `tgl_pengeluaran`, `jumlah`, `id_sumber`, `keterangan`, `is_update`) VALUES
(2, 6, '2020-04-29', 100000, 1, 'Kegiatan Jalan Bersama', '0'),
(24, 6, '2020-06-02', 500000, 1, 'Beli Canting', '0'),
(25, 6, '2020-06-04', 3000000, 1, 'Beli Kain', '1'),
(26, 6, '2020-06-04', 3000000, 1, 'Beli Kain', '0'),
(27, 6, '2020-06-16', 500000, 1, '-', '0'),
(28, 6, '2020-06-16', 500000, 1, '500000', '0');

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
  `is_update` enum('0','1','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail`
--

INSERT INTO `detail` (`id_detail`, `kd_detail`, `tanggal`, `nama`, `pengeluaran`, `keterangan`, `id_user`, `is_update`) VALUES
(39, 1, '2020-06-06', 'Lantai Toilet', 600000, 'Ganti Kramik', 6, '1'),
(40, 1, '2020-06-06', 'Kipas Angin', 50000, 'Kipas Mati', 6, '0'),
(41, 2, '2020-06-06', 'Anisa', 1500000, 'Full', 6, '0'),
(42, 2, '2020-06-06', 'Rahma', 1500000, 'full', 6, '0'),
(43, 3, '2020-06-06', 'Tiang Sangga Baju LT2', 500000, 'Tiang menguning', 6, '0'),
(44, 4, '2020-06-06', 'pph pasal 21', 500000, 'djp', 6, '0'),
(45, 1, '2020-06-06', 'Lantai Toilet', 600000, 'Ganti Kramik', 6, '0');

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
(37, 0, 0, 0, '0000-00-00', '', '', 'Dibayar', ''),
(45, 5000, 10000, 7000, '2020-06-24', 'Bangun kmpus', 'BRI', 'Dalam Cicilan', '0'),
(46, 4000, 6000, 0, '2020-06-24', 'SA', 'BCA', 'Dalam Cicilan', '0');

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
(20, 18, 2, 'Jalan Sehat', '2020-05-09', 'Kusuma Jaya Batik', '1'),
(25, 6, 26, 'Jalan Sehat', '2020-05-09', 'Kusuma Jaya Batik', '0');

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
(30, 6, 500000, 650000, 3000000, 500000, '2020-06-01', '2020-06-30', 0, 'ok', '1'),
(31, 6, 500000, 650000, 3000000, 500000, '2020-06-01', '2020-06-30', 0, 'ok', '0');

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
  `is_kdhutang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemasukan`
--

INSERT INTO `pemasukan` (`id_pemasukan`, `id_user`, `tgl_pemasukan`, `jumlah`, `id_sumber`, `is_update`, `is_kdhutang`) VALUES
(83, 6, '2019-12-01', 645000, 1, '0', ''),
(84, 6, '2019-12-02', 360000, 1, '0', ''),
(85, 6, '2019-12-03', 620000, 1, '0', ''),
(86, 6, '2019-12-04', 1200000, 1, '0', ''),
(87, 6, '2019-12-05', 665000, 1, '0', ''),
(89, 6, '2019-12-06', 423000, 1, '0', ''),
(91, 6, '2019-12-07', 2488000, 1, '0', ''),
(92, 6, '2019-12-08', 780000, 1, '0', ''),
(93, 6, '2019-12-09', 320000, 1, '0', ''),
(94, 6, '2019-12-10', 450000, 1, '0', ''),
(95, 6, '2019-12-11', 756000, 1, '0', ''),
(96, 6, '2019-12-12', 333000, 1, '0', ''),
(97, 6, '2019-12-13', 545000, 1, '0', ''),
(98, 6, '2019-12-13', 3433000, 1, '0', ''),
(99, 6, '2019-12-13', 2656000, 1, '0', ''),
(100, 6, '2019-12-13', 4322000, 1, '0', ''),
(101, 6, '2019-12-14', 1232000, 1, '0', ''),
(102, 6, '2019-12-15', 3344000, 1, '0', ''),
(103, 6, '2019-12-16', 2300000, 1, '0', ''),
(104, 6, '2019-12-17', 300000, 1, '0', ''),
(105, 6, '2020-05-18', 650000, 1, '1', ''),
(106, 6, '2019-12-18', 650000, 1, '0', ''),
(107, 6, '2019-12-19', 400000, 1, '0', ''),
(108, 6, '2019-12-20', 2400000, 1, '0', ''),
(109, 6, '2019-12-21', 2110000, 1, '0', ''),
(110, 6, '2019-12-22', 1640000, 1, '0', ''),
(111, 6, '2019-12-23', 3240000, 1, '0', ''),
(112, 6, '2019-12-24', 4440000, 1, '0', ''),
(113, 6, '2019-12-25', 1140000, 1, '0', ''),
(114, 6, '2019-12-26', 2210000, 1, '0', ''),
(115, 6, '2019-12-27', 5660000, 1, '0', ''),
(116, 6, '2019-12-28', 4530000, 1, '0', ''),
(117, 6, '2019-12-29', 5110000, 1, '0', ''),
(118, 6, '2019-12-30', 4340000, 1, '0', ''),
(119, 6, '2019-12-31', 3870000, 1, '0', ''),
(120, 6, '2020-01-01', 660000, 1, '0', ''),
(121, 6, '2020-01-02', 1620000, 1, '0', ''),
(122, 6, '2020-01-03', 1220000, 1, '0', ''),
(123, 6, '2020-01-04', 2650000, 1, '0', ''),
(124, 6, '2020-01-05', 1210000, 1, '0', ''),
(125, 6, '2020-01-06', 760000, 1, '0', ''),
(126, 6, '2020-01-07', 1360000, 1, '0', ''),
(127, 6, '2020-01-08', 4360000, 1, '0', ''),
(128, 6, '2020-01-09', 1970000, 1, '0', ''),
(129, 6, '2020-01-10', 2110000, 1, '1', ''),
(130, 6, '2020-01-10', 2110000, 1, '0', ''),
(131, 6, '2020-03-19', 200000000, 2, '1', 'HTG-SYS-200000000Modal Bangun Gedung BelakangBank BRI2020-03-19'),
(132, 6, '2020-06-16', 500000, 1, '0', ''),
(133, 6, '2020-06-16', 500000, 1, '0', ''),
(134, 6, '2020-06-16', 1000000, 2, '0', 'HTG-SYS-1000000TaplusBNI2020-06-16'),
(135, 6, '2020-06-16', 1000000, 2, '0', 'HTG-SYS-1000000jetiBNI2020-06-16'),
(136, 6, '2020-06-16', 500000, 2, '0', 'HTG-SYS-500000randedetjokowi2020-06-16'),
(137, 6, '2020-06-16', 500000, 2, '0', 'HTG-SYS-500000-sby2020-06-16'),
(138, 6, '2020-06-16', 500000, 2, '0', 'HTG-SYS-500000-suharto2020-06-16'),
(139, 6, '2020-06-24', 500000, 2, '1', 'HTG-SYS-750000TDk adaSIBED2020-06-24'),
(140, 6, '2020-06-24', 1500000, 2, '1', 'HTG-SYS-1750000TDk adaSIBED2020-06-24'),
(141, 6, '2020-06-24', 1400000, 2, '1', 'HTG-SYS-1750000TDk adaSIBED2020-06-24'),
(142, 6, '2020-06-24', 1400000, 2, '0', 'HTG-SYS-1700000TDk adaSIBED2020-06-24'),
(143, 6, '2020-06-24', 5000, 2, '0', 'HTG-SYS-10000Bangun kmpusBRI2020-06-24'),
(144, 6, '2020-06-24', 4000, 2, '0', 'HTG-SYS-6000SABCA2020-06-24');

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
(43, 22, 0, '0000-00-00', '', 37, ''),
(50, 6, 1000, '2020-06-24', 'CIcil 1', 45, '0'),
(51, 6, 5000, '2020-06-24', 'SpER', 45, '0'),
(52, 6, 1000, '2020-06-24', '1k', 45, '0');

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
(3, 'Dana Hibah'),
(4, 'Bantuan'),
(5, 'Lain-Lain'),
(13, '500000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `no_tlp` int(11) NOT NULL,
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
(6, 'Edi Tiawan', 'edi', '5660d9466e66440bfee5c63382980026', 0, 'febrinugroho063@gmail.com', 'pemimpin', 'Seyegan Sleman', '0', '0', 894522),
(15, 'Nur Afifah', 'nur', '0c5d3c1e26e00f79356db63c97b7e4ae', 2147483647, 'bisnisfebri063@gmail.com', 'Bagian Keuangan', 'Sleman', '0', '0', 0),
(16, 'Maryati', 'maryati', 'maryati', 866565557, '', 'Bagian Keuangan', 'Klepu Sleman', '1', '1', 0),
(17, 'Sefi Masithoh', 'sefi', 'sefi', 87665464, '', 'Bag. Keuangan', 'Seyegan Sleman', '1', '1', 0),
(18, 'Dani Edola', 'dani', 'dani', 843245745, '', 'Bag. Keuangan', 'Merpati 441A Jakpus', '1', '1', 0),
(19, 'via Rokhaeni', 'via', 'via', 8786768, '', 'Bag.Keuangan', 'Cilacap Jateng', '1', '1', 0),
(22, 'bisnis', 'bisnis', '2e4d5d0711261485abe3b1c4e4bbd05d', 7878788, 'mail@mail.con', 'Bagian Keuangan', 'Jogokaryan', '1', '0', 0);

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
  MODIFY `id_belanja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `detail`
--
ALTER TABLE `detail`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `hutang`
--
ALTER TABLE `hutang`
  MODIFY `id_hutang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `operasional`
--
ALTER TABLE `operasional`
  MODIFY `id_operasional` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `pemasukan`
--
ALTER TABLE `pemasukan`
  MODIFY `id_pemasukan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT untuk tabel `pembayaran_hutang`
--
ALTER TABLE `pembayaran_hutang`
  MODIFY `id_pembayaranhutang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT untuk tabel `sumber`
--
ALTER TABLE `sumber`
  MODIFY `id_sumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
