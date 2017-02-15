-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2017 at 02:26 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `limas_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id_admin` int(1) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `kategori` enum('admin','manajer','adm') NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `kategori`) VALUES
(1, 'Admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(4, 'novita', '017d9516a0a8b44db462c39ba8a4184a', 'manajer'),
(5, 'novita 2', '017d9516a0a8b44db462c39ba8a4184a', 'adm'),
(6, 'novita', '017d9516a0a8b44db462c39ba8a4184a', 'adm'),
(7, 'saya', '827ccb0eea8a706c4c34a16891f84e7b', 'adm'),
(8, 'budi', '827ccb0eea8a706c4c34a16891f84e7b', 'manajer'),
(9, 'nia', '827ccb0eea8a706c4c34a16891f84e7b', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `award`
--

CREATE TABLE IF NOT EXISTS `award` (
  `nama` varchar(40) NOT NULL,
  `room_number` int(11) NOT NULL,
  `phone` int(11) NOT NULL,
  `sarapan_pagi` varchar(400) NOT NULL,
  `makan_siang` varchar(400) NOT NULL,
  `makan_malam` varchar(400) NOT NULL,
  `dessert` varchar(200) NOT NULL,
  `komentar` varchar(700) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `award`
--

INSERT INTO `award` (`nama`, `room_number`, `phone`, `sarapan_pagi`, `makan_siang`, `makan_malam`, `dessert`, `komentar`) VALUES
('Aidina', 20, 857292932, 'PAKET D (Mie Goreng + Teh Hangat) Rp 30.000,00 per porsi', 'PAKET A (Nasi + Es Teh + Air Mineral + Ikan Gurame Bakar/Goreng + Sayur Kemangi) Rp 80.000,00 per porsi', 'PAKET C (Nasi + Steak) Rp 45.000,00 per porsi', 'Macarone + Ice Cream (Rp 65.000,00/porsi)', 'Enak banget loh hehe'),
('Eben', 21, 823738, 'PAKET A (Nasi Goreng Spesial + Susu) Rp 45.000,00 per porsi', 'PAKET B (Nasi + Jus Alpukat + Ayam Goreng + Ikan Bandeng + Sayur Lalap + Pindang Tulang) Rp 125.000,00 per porsi', 'PAKET C (Nasi + Steak) Rp 45.000,00 per porsi', 'Pudding (Rp 25.000,00/porsi)', 'hehe'),
('Sekar', 22, 2147483647, 'PAKET A (Nasi Goreng Spesial + Susu) Rp 45.000,00 per porsi', 'PAKET B (Nasi + Jus Alpukat + Ayam Goreng + Ikan Bandeng + Sayur Lalap + Pindang Tulang) Rp 125.000,00 per porsi', 'PAKET B (Nasi + Pecel Lele) Rp 50.000,00 per porsi', 'Chocolate (Rp 50.000,00/porsi)', 'Nyaman sekali menginap di hotel Novotel :)'),
('Yulika', 25, 8364859, 'PAKET A (Nasi Goreng Spesial + Susu) Rp 45.000,00 per porsi', 'PAKET C (Nasi + Ikan Goreng + Rendang + Pindang Daging + Sayur Asem + Jus Mangga) Rp 150.000,00 per porsi', 'PAKET B (Nasi + Pecel Lele) Rp 50.000,00 per porsi', 'Chocolate (Rp 50.000,00/porsi)', 'bagus'),
('ebenhezer', 76, 2147483647, 'PAKET A (Nasi Goreng Spesial + Susu) Rp 45.000,00 per porsi,PAKET C (Nasi Uduk + Kopi Hangat) Rp 25.000,00 per porsi', 'PAKET A (Nasi + Es Teh + Air Mineral + Ikan Gurame Bakar/Goreng + Sayur Kemangi) Rp 80.000,00 per porsi,PAKET D (Nasi Goreng + Ayam Bakar + Ikan Tuna Sambal + Gule Kambing + Air Mineral + Jus Jambu) Rp 175.000,00 per porsi', 'PAKET A (Nasi + Sate) Rp 45.000,00 per porsi,PAKET D (Nasi + Mie Tumis) Rp 30.000,00 per porsi', 'Pudding (Rp 25.000,00/porsi),Chocolate (Rp 50.000,00/porsi)', 'laperr....'),
('hukul', 760, 98768475, 'PAKET A (Nasi Goreng Spesial + Susu) Rp 45.000,00 per porsi,PAKET C (Nasi Uduk + Kopi Hangat) Rp 25.000,00 per porsi', 'PAKET B (Nasi + Jus Alpukat + Ayam Goreng + Ikan Bandeng + Sayur Lalap + Pindang Tulang) Rp 125.000,00 per porsi,PAKET D (Nasi Goreng + Ayam Bakar + Ikan Tuna Sambal + Gule Kambing + Air Mineral + Jus Jambu) Rp 175.000,00 per porsi', 'PAKET B (Nasi + Pecel Lele) Rp 50.000,00 per porsi,PAKET D (Nasi + Mie Tumis) Rp 30.000,00 per porsi', 'Pudding (Rp 25.000,00/porsi),Yoghurt (Rp 45.000,00/porsi)', 'matap deh');

-- --------------------------------------------------------

--
-- Table structure for table `customer_level`
--

CREATE TABLE IF NOT EXISTS `customer_level` (
`id_cl` int(2) NOT NULL,
  `nama_cl` varchar(30) NOT NULL,
  `poin` int(6) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `customer_level`
--

INSERT INTO `customer_level` (`id_cl`, `nama_cl`, `poin`) VALUES
(2, 'Gold', 1000),
(3, 'Premium', 70),
(4, 'Pemula', 50),
(6, 'ultra', 2000);

-- --------------------------------------------------------

--
-- Table structure for table `detail_pemakaian`
--

CREATE TABLE IF NOT EXISTS `detail_pemakaian` (
`id_ps` int(4) NOT NULL,
  `id_pemakaian` int(5) NOT NULL,
  `id_servis` int(2) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `detail_pemakaian`
--

INSERT INTO `detail_pemakaian` (`id_ps`, `id_pemakaian`, `id_servis`, `total`) VALUES
(24, 21, 6, 75000),
(25, 21, 3, 500000),
(26, 21, 5, 32000),
(27, 21, 7, 400000),
(28, 22, 5, 53000),
(29, 23, 7, 400000),
(30, 23, 6, 200000),
(31, 23, 6, 250000);

-- --------------------------------------------------------

--
-- Table structure for table `detail_pemesanan`
--

CREATE TABLE IF NOT EXISTS `detail_pemesanan` (
`Id_detail` int(5) NOT NULL,
  `id_pemesanan` int(5) NOT NULL,
  `id_kamar` int(2) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `detail_pemesanan`
--

INSERT INTO `detail_pemesanan` (`Id_detail`, `id_pemesanan`, `id_kamar`) VALUES
(18, 36, 10),
(19, 36, 11),
(20, 37, 1),
(21, 37, 3),
(22, 38, 9),
(23, 39, 1),
(24, 40, 8),
(25, 41, 8);

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE IF NOT EXISTS `faq` (
`id_faq` int(2) NOT NULL,
  `isi_faq` varchar(200) NOT NULL,
  `solusi` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id_faq`, `isi_faq`, `solusi`) VALUES
(1, '<p>ini pertanyaan</p>', '<p>ini jawaban</p>'),
(3, '<p>Bagaimana cara mendaftar menjadi&nbsp;<em><strong>member Hotel</strong></em><strong> Novotel</strong>?</p>', '<p>Caranya mudah, cukup klik link daftar di bagian kanan atas dari website ini kemudian Anda akan dibawa ke sebuah laman. Pada laman tersebut terdapat beberapa kolom-kolom isian data yang harus Anda isi. Ketika Anda telah mengisi semua data, Anda hanya perlu menekan tombol Daftar.</p>'),
(4, '<p>Keuntungan apa yang didapat jika mendaftar menjadi&nbsp;<strong>member Hotel Novotel?</strong></p>', '<p>Anda akan menerima keuntungan yang banyak sekali jika anda menjadi&nbsp;<strong>member Hotel Novotel.</strong>&nbsp;</p>');

-- --------------------------------------------------------

--
-- Table structure for table `guestbook`
--

CREATE TABLE IF NOT EXISTS `guestbook` (
`id_guestbook` int(4) unsigned zerofill NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `pekerjaan` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `no_telp` char(15) NOT NULL,
  `komentar` varchar(200) NOT NULL,
  `status` enum('hide','show') NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `guestbook`
--

INSERT INTO `guestbook` (`id_guestbook`, `nama`, `alamat`, `pekerjaan`, `email`, `no_telp`, `komentar`, `status`) VALUES
(0001, 'emtejet', 'emtejet juga', 'emtejet lagi', 'emtejet@jet.jet', '', 'apola yeee... nak tau bae.. kepo nian', 'hide'),
(0002, 'sekar', 'kenten', 'gadis kampus', 'daktau@huh', '0808316783', 'Pelayanan hotel Novotel sangat menyenangkan', 'show'),
(0003, 'hila', 'lalala', 'lilili', 'loli@loa.com', '08985631589', 'haloooooooooooooooooooooooooooo', 'hide'),
(0004, 'sekar', 'komplek pinang mas', 'PNS', 'sekarsari@gmail.com', '08973555591', 'Pelayanan Hotel Novotel sangat nyaman dan ramah :) ', 'show'),
(0005, 'Vivin', 'komplek pakjo', '', 'viviny@yahoo.com', '0289374', 'wahhh bagus', 'hide');

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE IF NOT EXISTS `kamar` (
`id_kamar` int(2) NOT NULL,
  `nama_kamar` varchar(20) NOT NULL,
  `kelas_kamar` enum('a','b','c') NOT NULL,
  `Harga_kamar` int(11) NOT NULL,
  `deskripsi_kamar` varchar(200) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`id_kamar`, `nama_kamar`, `kelas_kamar`, `Harga_kamar`, `deskripsi_kamar`) VALUES
(1, 'MELATI 1', 'c', 200000, '<p>Sebuah kamar yang berdesain minimalis namun dengan kelengkapan maksimal.</p>'),
(3, 'cfad', 'c', 200000, '<p>dadadccdcsdcsdvsd qwedqwd dw</p>'),
(8, 'Mawar 101', 'b', 200000, '<p>jlas skj as soaska doaik osi</p>'),
(9, 'Mawar 102', 'b', 250000, '<p>asak ada dask aslak sla as</p>'),
(10, 'Mawar 103', 'a', 450000, '<p>kamar terbaik</p>'),
(11, 'Melati 3', 'b', 590000, '<p>kla &nbsp;fjpaskjdp oikosda osidoas</p>');

-- --------------------------------------------------------

--
-- Table structure for table `laundry`
--

CREATE TABLE IF NOT EXISTS `laundry` (
  `name` varchar(10) NOT NULL,
  `room` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `pilih` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laundry`
--

INSERT INTO `laundry` (`name`, `room`, `phone`, `pilih`) VALUES
('Aidina', '20', '8527364829', ''),
('amel', '12', '839474', ''),
('eben lagi', '15', '81017081', ''),
('josusa', '78', '9864567890', ''),
('Sekar', '22', '8973555591', ''),
('wira', '123', '19394', ''),
('Yulika', '25', '3274972', '');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE IF NOT EXISTS `pelanggan` (
`id_pelanggan` int(5) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` char(15) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `no_hp` char(15) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(200) NOT NULL,
  `poin` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama`, `username`, `tgl_lahir`, `jenis_kelamin`, `alamat`, `no_hp`, `email`, `password`, `poin`) VALUES
(18, 'Vivin Yulika', 'coba_lagi_lagi', '1995-07-18', 'perempuan', 'Pakjo Palembang', '09031181320055', 'vivinyulika@gmail.co', 'vivin18', 10),
(22, 'Sekar Sari Wiradarma', 'sekar', '1996-02-14', 'perempuan', 'Komplek Pinang Mas Sako Baru, Palembang																																																					kgcakhbcas lkjdlaskd ljfasl ksf,asm kfa  32 9742m dhaj																																																						', '09031281320004', 'sekarsariwiradarma@g', 'f5a01e8f0b2739cc9ec0285d6cf157ca', 80),
(23, 'Aidina Syafaroh Ramadini', 'ori', '1990-02-02', 'perempuan', 'Komplek Pusri Sako', '09031181320023', 'aidina.syafaroh@gmai', '4d302c0845aee47943f0fdc314cffb49', 10),
(24, 'Adi Firmansyah', 'adifirmansyah', '1983-03-20', 'laki-laki', 'Lr. Aman', '09031281320024', 'adifrsyh@yahoo.co.id', 'adifirmansyah20', 10),
(26, 'Eben', 'ebens', '1998-02-10', 'laki-laki', 'Prabumulih', '0928', 'ebensss@gmail.com', '14e1b600b1fd579f47433b88e8d85291', 50),
(27, 'Yulika', 'yulika', '1998-03-13', 'perempuan', 'jl. aman pakjo', '0897564455', 'vivinyulika@gmail.co', '14e1b600b1fd579f47433b88e8d85291', 50);

-- --------------------------------------------------------

--
-- Table structure for table `pemakaian_servis`
--

CREATE TABLE IF NOT EXISTS `pemakaian_servis` (
`id_pemakaian` int(5) NOT NULL,
  `id_pelanggan` int(5) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `tgl_bayar` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `pemakaian_servis`
--

INSERT INTO `pemakaian_servis` (`id_pemakaian`, `id_pelanggan`, `total_bayar`, `tgl_bayar`) VALUES
(21, 22, 1007000, '2014-05-06'),
(22, 22, 53000, '2014-05-06'),
(23, 18, 850000, '2014-05-06');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE IF NOT EXISTS `pemesanan` (
`id_pemesanan` int(5) NOT NULL,
  `id_pelanggan` int(5) NOT NULL,
  `tgl_check_in` date NOT NULL,
  `tgl_check_out` date NOT NULL,
  `status_pembayaran` enum('lunas','belum lunas','batal') NOT NULL,
  `Status_konfirmasi` enum('belum dikonfirmasi','dikonfirmasi pelanggan','dikonfirmasi admin','batal') NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `tgl_pembayaran` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `id_pelanggan`, `tgl_check_in`, `tgl_check_out`, `status_pembayaran`, `Status_konfirmasi`, `total_bayar`, `tgl_pembayaran`) VALUES
(36, 22, '2014-05-12', '2014-05-14', 'lunas', 'dikonfirmasi admin', 2080000, '2014-05-12'),
(37, 22, '2014-05-19', '2014-05-20', 'batal', 'batal', 400000, '2014-05-12'),
(38, 22, '2014-05-12', '2014-05-14', 'belum lunas', 'dikonfirmasi pelanggan', 500000, '2014-05-13'),
(39, 22, '2014-05-14', '2014-05-16', 'belum lunas', 'dikonfirmasi pelanggan', 400000, '2014-05-13'),
(40, 22, '2014-05-26', '2014-05-27', 'lunas', 'dikonfirmasi admin', 200000, '2014-05-14'),
(41, 27, '2016-04-20', '2016-04-27', 'belum lunas', 'belum dikonfirmasi', 1400000, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `promosi`
--

CREATE TABLE IF NOT EXISTS `promosi` (
`id_promosi` int(11) NOT NULL,
  `isi_promosi` varchar(200) NOT NULL,
  `keterangan` varchar(200) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `promosi`
--

INSERT INTO `promosi` (`id_promosi`, `isi_promosi`, `keterangan`) VALUES
(1, '<p>Voucher Makan Malam berdua ugutguhghgh</p>', '<p>Dapatkan voucher makan malam gratis untuk 2 orang hanya dengan menunjukkan bukti pembayaran.</p>'),
(2, '<p>Promo</p>', '<p>dapatkan promo malam mingguan di hotel LIMAS hanya 100.000</p>');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE IF NOT EXISTS `service` (
`id_servis` int(2) NOT NULL,
  `deskripsi` varchar(225) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id_servis`, `deskripsi`) VALUES
(3, '<p>Restoran</p>'),
(5, '<p>Laundry</p>'),
(6, '<p>Minibar</p>'),
(7, '<p>Extrabed</p>');

-- --------------------------------------------------------

--
-- Table structure for table `servis`
--

CREATE TABLE IF NOT EXISTS `servis` (
`id_servis` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `laundry` int(11) NOT NULL,
  `resto` int(11) NOT NULL,
  `minibar` int(11) NOT NULL,
  `extrabed` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE IF NOT EXISTS `testimonial` (
`Id_testimoni` int(4) NOT NULL,
  `Id_Rep` int(4) NOT NULL,
  `Tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Judul` varchar(50) NOT NULL,
  `Isi` varchar(300) NOT NULL,
  `id_pelanggan` int(5) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`Id_testimoni`, `Id_Rep`, `Tanggal`, `Judul`, `Isi`, `id_pelanggan`) VALUES
(1, 0, '2014-04-26 02:25:29', 'Pertanyaan', 'Gimana cara refund?', 22),
(3, 1, '2014-04-26 02:25:29', 'Admin Re: Pertanyaan', '<p>duh gimana ya</p>', 22),
(5, 0, '2014-04-26 04:11:40', 'Pertanyaan', 'kok admin-nya gitu sih', 22),
(6, 5, '2014-04-26 04:12:10', 'Admin Re: Pertanyaan', '<p>Gapapa kok, Admin cuma lupa aja</p>', 22),
(7, 0, '2014-04-26 04:13:25', 'Pertanyaan', 'ihh admin-nya rese banget', 22),
(8, 7, '2014-04-30 08:46:51', 'Admin Re: Pertanyaan', '<p>kok kamu ngomongnya gitu sih?</p>', 22),
(9, 0, '2014-04-30 08:55:34', 'pertanyaan', 'gimana cara transaksi?', 23),
(10, 9, '2014-04-30 08:56:10', 'Admin Re: pertanyaan', '<p>caranya pilih dulu kamar yang mau dipesan.</p>', 23),
(11, 0, '2014-05-11 04:45:04', 'Konfirmasi Pembayaran', 'id 28 sudah di transfer', 22),
(12, 0, '2014-05-14 08:08:09', 'sa', 'cakmano', 22);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `award`
--
ALTER TABLE `award`
 ADD PRIMARY KEY (`room_number`);

--
-- Indexes for table `customer_level`
--
ALTER TABLE `customer_level`
 ADD PRIMARY KEY (`id_cl`);

--
-- Indexes for table `detail_pemakaian`
--
ALTER TABLE `detail_pemakaian`
 ADD PRIMARY KEY (`id_ps`), ADD KEY `id_servis` (`id_servis`), ADD KEY `id_pemakaian` (`id_pemakaian`);

--
-- Indexes for table `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
 ADD PRIMARY KEY (`Id_detail`), ADD KEY `id_pemesanan` (`id_pemesanan`), ADD KEY `id_kamar` (`id_kamar`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
 ADD PRIMARY KEY (`id_faq`);

--
-- Indexes for table `guestbook`
--
ALTER TABLE `guestbook`
 ADD PRIMARY KEY (`id_guestbook`);

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
 ADD PRIMARY KEY (`id_kamar`);

--
-- Indexes for table `laundry`
--
ALTER TABLE `laundry`
 ADD PRIMARY KEY (`name`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
 ADD PRIMARY KEY (`id_pelanggan`), ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `pemakaian_servis`
--
ALTER TABLE `pemakaian_servis`
 ADD PRIMARY KEY (`id_pemakaian`), ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
 ADD PRIMARY KEY (`id_pemesanan`), ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indexes for table `promosi`
--
ALTER TABLE `promosi`
 ADD PRIMARY KEY (`id_promosi`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
 ADD PRIMARY KEY (`id_servis`);

--
-- Indexes for table `servis`
--
ALTER TABLE `servis`
 ADD PRIMARY KEY (`id_servis`), ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
 ADD PRIMARY KEY (`Id_testimoni`), ADD KEY `Id_Rep` (`Id_Rep`), ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `id_admin` int(1) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `customer_level`
--
ALTER TABLE `customer_level`
MODIFY `id_cl` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `detail_pemakaian`
--
ALTER TABLE `detail_pemakaian`
MODIFY `id_ps` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
MODIFY `Id_detail` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
MODIFY `id_faq` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `guestbook`
--
ALTER TABLE `guestbook`
MODIFY `id_guestbook` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `kamar`
--
ALTER TABLE `kamar`
MODIFY `id_kamar` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
MODIFY `id_pelanggan` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `pemakaian_servis`
--
ALTER TABLE `pemakaian_servis`
MODIFY `id_pemakaian` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
MODIFY `id_pemesanan` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `promosi`
--
ALTER TABLE `promosi`
MODIFY `id_promosi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
MODIFY `id_servis` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `servis`
--
ALTER TABLE `servis`
MODIFY `id_servis` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
MODIFY `Id_testimoni` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pemakaian`
--
ALTER TABLE `detail_pemakaian`
ADD CONSTRAINT `detail_pemakaian_ibfk_1` FOREIGN KEY (`id_servis`) REFERENCES `service` (`id_servis`) ON DELETE NO ACTION ON UPDATE CASCADE,
ADD CONSTRAINT `detail_pemakaian_ibfk_2` FOREIGN KEY (`id_pemakaian`) REFERENCES `pemakaian_servis` (`id_pemakaian`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
ADD CONSTRAINT `detail_pemesanan_ibfk_1` FOREIGN KEY (`id_pemesanan`) REFERENCES `pemesanan` (`id_pemesanan`) ON DELETE NO ACTION ON UPDATE CASCADE,
ADD CONSTRAINT `detail_pemesanan_ibfk_2` FOREIGN KEY (`id_kamar`) REFERENCES `kamar` (`id_kamar`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `pemakaian_servis`
--
ALTER TABLE `pemakaian_servis`
ADD CONSTRAINT `pemakaian_servis_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `servis`
--
ALTER TABLE `servis`
ADD CONSTRAINT `servis_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `testimonial`
--
ALTER TABLE `testimonial`
ADD CONSTRAINT `testimonial_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
