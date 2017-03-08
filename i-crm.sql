-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2017 at 01:20 PM
-- Server version: 5.5.39
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `i-crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `atasan`
--

CREATE TABLE IF NOT EXISTS `atasan` (
`id_atasan` int(3) NOT NULL,
  `id_departement` int(3) NOT NULL,
  `nama_atasan` char(25) NOT NULL,
  `nama_jabatan` char(25) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `atasan`
--

INSERT INTO `atasan` (`id_atasan`, `id_departement`, `nama_atasan`, `nama_jabatan`) VALUES
(1, 1, 'Atasan 1', 'Jabatan Atasan 1'),
(2, 2, 'Atasan 2', 'Jabatan Atasan 2');

-- --------------------------------------------------------

--
-- Table structure for table `departement`
--

CREATE TABLE IF NOT EXISTS `departement` (
`id_departement` int(3) NOT NULL,
  `nama_departement` varchar(25) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `departement`
--

INSERT INTO `departement` (`id_departement`, `nama_departement`) VALUES
(1, 'Departement 1'),
(2, 'Departement 2');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE IF NOT EXISTS `karyawan` (
`id_karyawan` int(3) NOT NULL,
  `id_user` int(3) NOT NULL,
  `id_atasan` int(3) NOT NULL,
  `id_departement` int(3) NOT NULL,
  `nama` char(50) NOT NULL,
  `alamat` varchar(80) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `jabatan` char(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `id_user`, `id_atasan`, `id_departement`, `nama`, `alamat`, `no_telp`, `email`, `jabatan`) VALUES
(1, 4, 1, 1, 'Sri Wahyuningsih', 'Kampung Pulo, Bekasi', '988800012', 'marketing@marketing.com', 'Marketing'),
(2, 7, 1, 1, 'George Monkey', 'Bogor, Parung', '8999775', 'manajer@gmail.com', 'Manajer');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE IF NOT EXISTS `level` (
  `id_level` int(3) NOT NULL,
  `nama_level` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `nama_level`) VALUES
(1, 'Admin'),
(2, 'Marketing'),
(3, 'Manajer'),
(4, 'Pelanggan');

-- --------------------------------------------------------

--
-- Table structure for table `paket_wisata`
--

CREATE TABLE IF NOT EXISTS `paket_wisata` (
`id_paket_wisata` int(3) NOT NULL,
  `nama_wisata` char(30) NOT NULL,
  `lokasi` char(30) NOT NULL,
  `harga` int(10) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar_wisata` varchar(50) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_akhir` date NOT NULL,
  `norek_perusahaan` varchar(25) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `paket_wisata`
--

INSERT INTO `paket_wisata` (`id_paket_wisata`, `nama_wisata`, `lokasi`, `harga`, `deskripsi`, `gambar_wisata`, `tgl_mulai`, `tgl_akhir`, `norek_perusahaan`, `created_at`) VALUES
(1, 'Wisata Desert Sahara', 'Gurun Sahara', 1000000, 'Gurun Sahara Indah Sekali', 'Desert.jpg', '2017-02-25', '2017-03-25', '198999890', '0000-00-00 00:00:00'),
(2, 'Taman Bunga', 'Belanda', 900000, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Tulips1.jpg', '2017-02-19', '2017-03-02', '98888123', '2017-03-03 10:30:29'),
(3, 'Wisata 3', 'Lokasi 3', 850000, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Koala.jpg', '2017-03-06', '2017-04-06', '89889777', '2017-03-06 06:42:34'),
(4, 'Wisata 4', 'Lokasi 4', 750000, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lighthouse.jpg', '2017-03-06', '2017-04-06', '865868786', '2017-03-06 06:43:22'),
(5, 'Wisata 5', 'Lokasi 5', 700000, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Hydrangeas.jpg', '2017-03-31', '2017-04-30', '8797986', '2017-03-06 07:30:13');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE IF NOT EXISTS `pelanggan` (
`id_pelanggan` int(3) NOT NULL,
  `id_user` int(3) NOT NULL,
  `nama` char(50) NOT NULL,
  `alamat` text NOT NULL,
  `tempat_lahir` char(25) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki - Laki','Perempuan') NOT NULL,
  `no_telp` char(12) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `id_user`, `nama`, `alamat`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `no_telp`, `email`) VALUES
(1, 2, 'Sri Wahyuningsih', 'Jaksel, Indonesia', 'pemalang', '1990-09-02', 'Perempuan', '8988812', 'samsudingoceng@gmail.com'),
(2, 5, 'Ahmad Djunaedi', 'Jalan Haji Gemin, Bekasi update', 'bekasi', '1992-04-17', 'Laki - Laki', '089693401875', 'ahmad_ia3@yahoo.com'),
(3, 6, 'Irvan Prasetya', 'Jakarta', 'Jakarta', '1992-10-31', 'Laki - Laki', '8788898', 'mamahkiki74@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE IF NOT EXISTS `pembayaran` (
`id_pembayaran` int(3) NOT NULL,
  `id_pelanggan` int(3) NOT NULL,
  `id_pemesanan` int(3) NOT NULL,
  `jml_transfer` int(10) NOT NULL,
  `tgl_transfer` date NOT NULL,
  `jam` char(5) NOT NULL,
  `nama_pemilik` char(30) NOT NULL,
  `norek_pemilik` varchar(25) NOT NULL,
  `valid_pembayaran` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pelanggan`, `id_pemesanan`, `jml_transfer`, `tgl_transfer`, `jam`, `nama_pemilik`, `norek_pemilik`, `valid_pembayaran`, `created_at`) VALUES
(1, 2, 5, 900000, '2017-02-24', '20.0', 'Ahmad Djunaedi', '87777888', 'Valid', '2017-02-24 10:01:20'),
(2, 2, 3, 1000000, '2017-03-01', '18.00', 'Ahmad Djunaedi', '090989897', 'Valid', '2017-03-03 10:40:42');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE IF NOT EXISTS `pemesanan` (
`id_pemesanan` int(3) NOT NULL,
  `id_pelanggan` int(3) NOT NULL,
  `id_paket_wisata` int(3) NOT NULL,
  `kode_pemesanan` varchar(12) NOT NULL,
  `tgl_pemesanan` date NOT NULL,
  `harga_pemesanan` int(10) NOT NULL,
  `status` varchar(25) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `id_pelanggan`, `id_paket_wisata`, `kode_pemesanan`, `tgl_pemesanan`, `harga_pemesanan`, `status`, `created_at`) VALUES
(3, 2, 1, '2102201773', '2017-02-21', 1000000, 'Disetujui', '2017-03-03 10:40:54'),
(4, 3, 2, '220220177G', '2017-02-22', 0, 'Dibatalkan', '2017-02-23 08:41:32'),
(5, 2, 2, '23022017qA', '2017-02-23', 900000, 'Segera Dibayar', '2017-03-06 15:26:37');

-- --------------------------------------------------------

--
-- Table structure for table `personalisasi`
--

CREATE TABLE IF NOT EXISTS `personalisasi` (
`id_personalisasi` int(3) NOT NULL,
  `id_pelanggan` int(3) NOT NULL,
  `nama` char(25) NOT NULL,
  `tgl_personal` date NOT NULL,
  `isi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `promosi`
--

CREATE TABLE IF NOT EXISTS `promosi` (
`id_promosi` int(3) NOT NULL,
  `id_paket_wisata` int(3) NOT NULL,
  `nama` char(30) NOT NULL,
  `isi` text NOT NULL,
  `tgl_promosi` date NOT NULL,
  `potongan_harga` decimal(5,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `promosi`
--

INSERT INTO `promosi` (`id_promosi`, `id_paket_wisata`, `nama`, `isi`, `tgl_promosi`, `potongan_harga`, `created_at`) VALUES
(1, 1, 'Gurun Sahara Promosi', 'Gurun Shara', '2017-02-28', '10.00', '2017-02-19 07:47:30'),
(2, 2, 'Promosi Taman Bunga', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse', '2017-03-06', '50.00', '2017-03-06 11:13:55');

-- --------------------------------------------------------

--
-- Table structure for table `ulasan`
--

CREATE TABLE IF NOT EXISTS `ulasan` (
`id_ulasan` int(3) NOT NULL,
  `id_pelanggan` int(3) NOT NULL,
  `id_paket_wisata` int(3) NOT NULL,
  `id_pemesanan` int(3) NOT NULL,
  `isi_kritik` text NOT NULL,
  `isi_testimoni` text NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ulasan`
--

INSERT INTO `ulasan` (`id_ulasan`, `id_pelanggan`, `id_paket_wisata`, `id_pemesanan`, `isi_kritik`, `isi_testimoni`, `create_at`) VALUES
(1, 2, 2, 5, 'Sudah bagus sih, tapi masih kurang respon dalam menjawab pertanyaan pelanggan', 'Bagus, sangat memuaskan sesuai dengan apa yang diharapkan', '2017-02-27 17:00:36'),
(2, 1, 2, 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2017-03-04 08:51:55');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id_user` int(3) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(64) NOT NULL,
  `level` int(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`, `created_at`) VALUES
(1, 'admin', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, '2017-02-14 15:34:48'),
(2, 'pelanggan01', '7c4a8d09ca3762af61e59520943dc26494f8941b', 4, '2017-02-14 17:19:51'),
(4, 'marketing', '7c4a8d09ca3762af61e59520943dc26494f8941b', 2, '2017-02-15 11:31:12'),
(5, 'junjunned92', '7c4a8d09ca3762af61e59520943dc26494f8941b', 4, '2017-02-25 06:57:39'),
(6, 'toing22', '7c4a8d09ca3762af61e59520943dc26494f8941b', 4, '2017-02-21 14:24:31'),
(7, 'manajer', '7c4a8d09ca3762af61e59520943dc26494f8941b', 3, '2017-02-25 16:44:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `atasan`
--
ALTER TABLE `atasan`
 ADD PRIMARY KEY (`id_atasan`);

--
-- Indexes for table `departement`
--
ALTER TABLE `departement`
 ADD PRIMARY KEY (`id_departement`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
 ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `paket_wisata`
--
ALTER TABLE `paket_wisata`
 ADD PRIMARY KEY (`id_paket_wisata`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
 ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
 ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
 ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indexes for table `personalisasi`
--
ALTER TABLE `personalisasi`
 ADD PRIMARY KEY (`id_personalisasi`);

--
-- Indexes for table `promosi`
--
ALTER TABLE `promosi`
 ADD PRIMARY KEY (`id_promosi`);

--
-- Indexes for table `ulasan`
--
ALTER TABLE `ulasan`
 ADD PRIMARY KEY (`id_ulasan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `atasan`
--
ALTER TABLE `atasan`
MODIFY `id_atasan` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `departement`
--
ALTER TABLE `departement`
MODIFY `id_departement` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
MODIFY `id_karyawan` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `paket_wisata`
--
ALTER TABLE `paket_wisata`
MODIFY `id_paket_wisata` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
MODIFY `id_pelanggan` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
MODIFY `id_pembayaran` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
MODIFY `id_pemesanan` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `personalisasi`
--
ALTER TABLE `personalisasi`
MODIFY `id_personalisasi` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `promosi`
--
ALTER TABLE `promosi`
MODIFY `id_promosi` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ulasan`
--
ALTER TABLE `ulasan`
MODIFY `id_ulasan` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
