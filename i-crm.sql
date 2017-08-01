-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2017 at 11:42 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `i-crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `atasan`
--

CREATE TABLE `atasan` (
  `id_atasan` int(3) NOT NULL,
  `id_departement` int(3) NOT NULL,
  `nama_atasan` char(25) NOT NULL,
  `nama_jabatan` char(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `atasan`
--

INSERT INTO `atasan` (`id_atasan`, `id_departement`, `nama_atasan`, `nama_jabatan`) VALUES
(1, 1, 'Atasan 1', 'Jabatan Atasan 1'),
(2, 2, 'Atasan 2', 'Jabatan Atasan 2');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id_chat` int(5) NOT NULL,
  `from_id_user` int(3) NOT NULL,
  `to_id_user` int(3) NOT NULL,
  `message` text NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id_chat`, `from_id_user`, `to_id_user`, `message`, `create_at`) VALUES
(1, 5, 6, 'selamat pagi bapak', '2017-06-19 01:54:59');

-- --------------------------------------------------------

--
-- Table structure for table `departement`
--

CREATE TABLE `departement` (
  `id_departement` int(3) NOT NULL,
  `nama_departement` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `karyawan` (
  `id_karyawan` int(3) NOT NULL,
  `id_user` int(3) NOT NULL,
  `id_atasan` int(3) NOT NULL,
  `id_departement` int(3) NOT NULL,
  `nama` char(50) NOT NULL,
  `alamat` varchar(80) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `jabatan` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `level` (
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
(4, 'Pelanggan'),
(0, 'sales'),
(5, 'sales'),
(1, 'Admin'),
(2, 'Marketing'),
(3, 'Manajer'),
(4, 'Pelanggan'),
(0, 'sales'),
(5, 'sales'),
(1, 'Admin'),
(2, 'Marketing'),
(3, 'Manajer'),
(4, 'Pelanggan'),
(0, 'sales'),
(5, 'sales');

-- --------------------------------------------------------

--
-- Table structure for table `paket_wisata`
--

CREATE TABLE `paket_wisata` (
  `id_paket_wisata` int(3) NOT NULL,
  `nama_wisata` char(40) NOT NULL,
  `lokasi` char(30) NOT NULL,
  `harga` int(10) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar_wisata` varchar(50) NOT NULL,
  `rundown_acara` varchar(50) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_akhir` date NOT NULL,
  `norek_perusahaan` varchar(25) NOT NULL,
  `lokal_agen` varchar(50) NOT NULL,
  `no_telp_lokal_agen` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paket_wisata`
--

INSERT INTO `paket_wisata` (`id_paket_wisata`, `nama_wisata`, `lokasi`, `harga`, `deskripsi`, `gambar_wisata`, `rundown_acara`, `tgl_mulai`, `tgl_akhir`, `norek_perusahaan`, `lokal_agen`, `no_telp_lokal_agen`, `created_at`) VALUES
(1, 'Bromo - 3H2M', 'Malang', 600000, 'Gunung Bromo (dari bahasa Sanskerta: Brahma, salah seorang Dewa Utama dalam agama Hindu), adalah sebuah gunung berapi aktif di Jawa Timur, Indonesia. Gunung ini memiliki ketinggian 2.329 meter di atas permukaan laut dan berada dalam empat wilayah kabupaten, yakni Kabupaten Probolinggo, Kabupaten Pasuruan, Kabupaten Lumajang, dan Kabupaten Malang. Gunung Bromo terkenal sebagai objek wisata utama di Jawa Timur. Sebagai sebuah obyek wisata, Bromo menjadi menarik karena statusnya sebagai gunung berapi yang masih aktif. Gunung Bromo termasuk dalam kawasan Taman Nasional Bromo Tengger Semeru.', 'Bromo.png', 'itinerary fix.jpg', '2017-06-28', '2017-06-30', '2191355092', 'Agen A', '', '2017-07-07 10:11:04'),
(2, 'Gunung Rinjani - 4H3M', 'Lombok', 2000000, 'Gunung Rinjani adalah gunung yang berlokasi di Pulau Lombok, Nusa Tenggara Barat. Gunung yang merupakan gunung berapi kedua tertinggi di Indonesia dengan ketinggian 3.726 m dpl serta terletak pada lintang 8º25\' LS dan 116º28\' BT ini merupakan gunung favorit bagi pendaki Indonesia karena keindahan pemandangannya. Gunung ini merupakan bagian dari Taman Nasional Gunung Rinjani yang memiliki luas sekitar 41.330 ha dan ini akan diusulkan penambahannya sehingga menjadi 76.000 ha ke arah barat dan timur.', 'RINJANIxx.jpg', 'itinerary fix.jpg', '2017-08-10', '2017-08-14', '2191355092', 'Agen C', '02199933', '2017-07-07 10:31:27'),
(3, 'Kepulauan Karimun Jawa - 3H2M', 'Jepara', 1000000, 'Karimunjawa adalah kepulauan di Laut Jawa yang termasuk dalam Kabupaten Jepara, Jawa Tengah. Dengan luas daratan ±1.500 hektare dan perairan ±110.000 hektare, Karimunjawa kini dikembangkan menjadi pesona wisata Taman Laut yang mulai banyak digemari wisatawan lokal maupun mancanegara', 'karimun Jawa.png', 'itinerary fix.jpg', '2017-08-20', '2017-08-23', '2191355092', '', '', '2017-06-13 04:19:27'),
(4, 'Kesenian Tari Kecak - 2H1M', 'Bali', 1000000, 'Kecak adalah pertunjukan tarian seni khas Bali yang lebih utama menceritakan mengenai Ramayana dan dimainkan terutama oleh laki-laki. Tarian ini dipertunjukkan oleh banyak (puluhan atau lebih) penari laki-laki yang duduk berbaris melingkar dan dengan irama tertentu menyerukan \"cak\" dan mengangkat kedua lengan, menggambarkan kisah Ramayana saat barisan kera membantu Rama melawan Rahwana. Namun, Kecak berasal dari ritual sanghyang, yaitu tradisi tarian yang penarinya akan berada pada kondisi tidak sadar, melakukan komunikasi dengan Tuhan atau roh para leluhur dan kemudian menyampaikan harapan-harapannya kepada masyarakat.', 'tari kecak.png', 'itinerary fix.jpg', '2017-09-20', '2017-09-23', '2191355092', '', '', '2017-06-13 04:19:48'),
(5, 'Malioboro - 3H2M', 'Yogyakarta', 700000, 'Malioboro adalah nama salah satu kawasan jalan dari tiga jalan di Kota Yogyakarta yang membentang dari Tugu Yogyakarta hingga ke perempatan Kantor Pos Yogyakarta. Secara keseluruhan terdiri dari Jalan Margo Utomo, Jalan Malioboro, dan Jalan Margo Mulyo. Jalan ini merupakan poros Garis Imajiner Kraton Yogyakarta.', 'malioboro.png', 'itinerary fix.jpg', '2017-02-18', '2017-02-20', '2191355092', 'Agen Dua', '0888999', '2017-07-07 10:31:01'),
(6, 'Green Canyon - 3H2M', 'Pangandaran', 750000, 'Green Canyon adalah salah satu objek wisata di Jawa Barat yang terletak di Desa Kertayasa Kecamatan Cijulang, Kabupaten Ciamis ± 31 km dari Pangandaran. Ngarai ini terbentuk dari erosi tanah akibat aliran sungai Cijulang selama jutaan tahun yang menembus gua dengan stalaktit dan stalakmit yang mempesona serta diapit oleh dua bukit dengan bebatuan dan rimbunnya pepohonan menyajikan atraksi alam yang khas dan menantang. Untuk mencapai tempat ini, kita harus menyewa sebuah perahu kayuh dari dermaga Ciseureuh. Perjalanannya memakan waktu kurang lebih 30-45 menit dengan jarak sekitar 3 km untuk sampai ke Green Canyon', 'green canyon.jpg', 'itinerary fix.jpg', '2017-07-02', '2017-07-05', '2191355092', '', '', '2017-06-13 04:20:37'),
(7, 'Pulau Komodo - 3H2M', 'Nusa Tenggara Timur', 450000, 'Pulau Komodo adalah sebuah pulau yang terletak di Kepulauan Nusa Tenggara. Pulau Komodo dikenal sebagai habitat asli hewan komodo. Pulau ini juga merupakan kawasan Taman Nasional Komodo yang dikelola oleh Pemerintah Pusat. Pulau Komodo berada di sebelah timur Pulau Sumbawa, yang dipisahkan oleh Selat Sape. Secara administratif, pulau ini termasuk wilayah Kecamatan Komodo, Kabupaten Manggarai Barat, Provinsi Nusa Tenggara Timur, Indonesia. Pulau Komodo merupakan ujung paling barat Provinsi Nusa Tenggara Timur, berbatasan dengan Provinsi Nusa Tenggara Barat.', 'komodo.jpg', 'itinerary fix.jpg', '2017-07-01', '2017-07-05', '2191355092', '', '', '2017-04-06 06:11:10'),
(8, 'Mesjid Agung Jawa Tengah - 3H2M', 'Semarang', 500000, 'Masjid Agung Jawa Tengah adalah masjid yang terletak di Semarang, provinsi Jawa Tengah, Indonesia.\r\n\r\nMasjid ini mulai dibangun sejak tahun 2001 hingga selesai secara keseluruhan pada tahun 2006. Masjid ini berdiri di atas lahan 10 hektare. Masjid Agung diresmikan oleh Presiden Indonesia Susilo Bambang Yudhoyono pada tanggal 14 November 2006. Masjid Agung Jawa Tengah (MAJT) merupakan masjid provinsi bagi provinsi Jawa Tengah', 'mesjid agung.png', 'itinerary fix.jpg', '2017-08-20', '2017-08-23', '2191355092', '', '', '2017-06-13 04:20:53'),
(9, 'Pulau Derawan', 'Kalimantan', 2000000, 'pulau derawan merupakan pulau yang berada di pulau kalimantan, merupakan suatu pulau yang memiliki pantai pasir putih alami', 'derawan-1024x768.jpg', 'itinerary pulau harapan.jpg', '2017-05-14', '2017-05-18', '2191355092', 'Agen 1', '0929988', '2017-07-07 10:30:34'),
(10, 'Danau Toba', 'Sumatera Utara', 3000000, 'Danau Toba adalah sebuah danau tekto-vulkanik dengan ukuran panjang 100 kilometer dan lebar 30 kilometer yang terletak di Provinsi Sumatera Utara, Indonesia. Danau ini merupakan danau terbesar di Indonesia dan Asia Tenggara. Di tengah danau ini terdapat sebuah pulau vulkanik bernama Pulau Samosir.', 'danau toba.jpg', 'itinerary fix.jpg', '2017-06-28', '2017-06-30', '2191355092', '', '', '2017-06-13 04:21:22'),
(11, 'Bangka Belitung - 3H2M', 'Bangka Belitung', 2000000, 'Bangka Belitung adalah sebuah provinsi di Indonesia yang terdiri dari dua pulau utama yaitu Pulau Bangka dan Pulau Belitung serta pulau-pulau kecil seperti P. Lepar, P. Pongok, P. Mendanau dan P. Selat Nasik, total pulau yang telah bernama berjumlah 470 buah dan yang berpenghuni hanya 50 pulau. Bangka Belitung terletak di bagian timur Pulau Sumatera, dekat dengan Provinsi Sumatera Selatan. Bangka Belitung dikenal sebagai daerah penghasil timah, memiliki pantai yang indah dan kerukunan antar etnis. Ibu kota provinsi ini ialah Pangkalpinang.', 'bangka belitung.jpg', 'itinerary fix.jpg', '2017-07-28', '2017-07-03', '2191355092', '', '', '2017-06-13 04:21:39'),
(12, 'Tana Toraja - 3H2M', 'Sulawesi Selatan', 4000000, 'toraja adalah suku yang menetap di pegunungan bagian utara Sulawesi Selatan, Indonesia. Populasinya diperkirakan sekitar 1 juta jiwa, dengan sekitar 500.000 di antaranya masih tinggal di Kabupaten Tana Toraja, Kabupaten Toraja Utara, dan Kabupaten Mamasa. Mayoritas suku Toraja memeluk agama Kristen, sementara sebagian menganut Islam dan kepercayaan animisme yang dikenal sebagai Aluk To Dolo. Pemerintah Indonesia telah mengakui kepercayaan ini sebagai bagian dari Agama Hindu Dharma', 'toraja.jpg', 'itinerary fix.jpg', '2017-06-27', '2017-06-29', '2191355092', 'Agen B', '0988833', '2017-07-07 10:26:33'),
(13, 'Wisata Dummy', 'Uin Jakarta', 5000000, 'Deskripsi', 'CachedImage_1366_768_POS4.jpg', 'CachedImage_1366_768_POS4.jpg', '2017-07-07', '2017-07-12', '6777666', 'Agen A', '081238833', '2017-07-07 10:23:40');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(3) NOT NULL,
  `id_user` int(3) NOT NULL,
  `nama` char(50) NOT NULL,
  `alamat` text NOT NULL,
  `tempat_lahir` char(25) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki - Laki','Perempuan') NOT NULL,
  `no_telp` char(12) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `id_user`, `nama`, `alamat`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `no_telp`, `email`) VALUES
(1, 2, 'Sri Wahyuningsih', 'Jaksel, Indonesia', 'pemalang', '1990-03-20', 'Perempuan', '081387978808', 'samsudingoceng@gmail.com'),
(3, 6, 'Irvan Prasetya', 'Jakarta', 'Jakarta', '1992-06-15', 'Laki - Laki', '085697809707', 'irvan.prastya22@gmail.com'),
(4, 8, 'farhan aunurofiq', 'parung', 'bogor', '2017-04-20', 'Laki - Laki', '08977654545', 'farhanclimbers@gmail.com'),
(5, 9, 'Yoga Ardian', 'Jalan Tanah Kusir Ii No.51 Rt/rw : 007/011 Kebayoran Lama Selatan', 'jakarta', '1990-06-19', 'Laki - Laki', '08126449950', 'irvan_prastya22@yahoo.com'),
(6, 10, 'Fathir Rahman', 'Jalan Martimbang', 'Bekasi', '1994-02-27', 'Laki - Laki', '08123441414', 'agfgfkgf@gmail.com'),
(7, 11, 'Muhammad Hidzam', 'Jalan Sumatera', 'Padang', '1994-02-23', 'Laki - Laki', '081318339102', 'abfamav@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pelanggan`, `id_pemesanan`, `jml_transfer`, `tgl_transfer`, `jam`, `nama_pemilik`, `norek_pemilik`, `valid_pembayaran`, `created_at`) VALUES
(1, 2, 5, 900000, '2017-02-24', '20.0', 'Ahmad Djunaedi', '87777888', 'Tidak Valid', '2017-03-08 10:42:03'),
(2, 2, 3, 1000000, '2017-03-01', '18.00', 'Ahmad Djunaedi', '090989897', 'Valid', '2017-03-03 10:40:42'),
(3, 3, 7, 50000, '2017-03-31', '23:00', 'Irvan Prastya', '2191355093', 'Valid', '2017-03-19 10:45:16'),
(4, 3, 9, 400000, '2017-03-25', '16:00', 'Irvan Prastya', '2191355093', 'Valid', '2017-03-19 10:58:10'),
(5, 3, 10, 600000, '2017-03-01', '20:00', 'Irvan Prastya', '2191355093', 'Valid', '2017-03-19 16:15:41'),
(6, 3, 11, 500000, '2017-03-21', '16.00', 'Irvan Prastya', '2191355093', 'Valid', '2017-03-19 17:17:19'),
(7, 3, 15, 1000000, '0000-00-00', '15.00', 'irvan prastya', '21913555093', 'Valid', '2017-04-05 08:26:23'),
(8, 3, 20, 2000000, '2017-04-13', '22.00', 'Irvan Prastya', '2191355093', 'Valid', '2017-04-13 03:39:55'),
(9, 3, 21, 450000, '2017-04-13', '22.50', 'Irvan Prastya', '2191355093', 'Valid', '2017-04-13 03:56:14'),
(10, 3, 23, 600000, '2017-04-13', '16.00', 'Irvan Prastya', '2191355093', 'Tidak Valid', '2017-04-21 03:01:40'),
(11, 4, 26, 2000000, '2017-04-20', '23.00', 'Farhan Aunurofiq', '21913550489', 'Valid', '2017-04-19 18:12:35'),
(12, 3, 27, 700000, '2017-04-19', '10.00', 'bu nida', '2191355093', 'Valid', '2017-04-21 03:01:14'),
(13, 5, 40, 3000000, '2017-04-25', '16.00', 'yoga ardian', '2191355093', 'Valid', '2017-04-25 00:50:14'),
(14, 5, 36, 1000000, '2017-04-25', '15.00', 'yoga ardian', '2191355093', 'Valid', '2017-04-25 00:49:57'),
(15, 5, 29, 2000000, '2017-04-28', '18.00', 'yoga ardian', '2191355093', 'Valid', '2017-04-25 00:48:30'),
(16, 7, 38, 700000, '2017-04-27', '13.00', '700000', '2191355093', 'Valid', '2017-04-25 00:48:21'),
(17, 7, 32, 1000000, '2017-04-27', '18.00', 'muhammad hidzam', '2191355093', 'Valid', '2017-04-25 00:48:11'),
(18, 7, 31, 2000000, '2017-04-24', '12.00', 'muhammad hidzam', '21913550489', 'Valid', '2017-04-25 00:47:47'),
(19, 6, 34, 1000000, '2017-04-26', '17.00', 'fathir', '2191355093', 'Valid', '2017-04-25 00:47:32'),
(20, 6, 35, 1000000, '2017-04-26', '17.00', 'fathir', '2191355093', 'Valid', '2017-04-25 00:47:17'),
(21, 3, 41, 4000000, '2017-04-25', '11.00', 'Irvan Prastya', '2191355093', 'Valid', '2017-04-25 04:51:57'),
(22, 7, 45, 4000000, '2017-06-13', '15.00', 'M.Hidzam', '2191355091', 'Valid', '2017-06-13 17:36:30'),
(23, 3, 46, 500000, '2017-06-14', '22.00', 'Irvan Prastya', '2191355093', 'NULL', '2017-06-13 17:57:20'),
(24, 3, 51, 500000, '2017-06-14', '15.00', 'Irvan Prastya', '2191355091', 'Valid', '2017-06-13 18:08:30'),
(25, 3, 52, 2000000, '2017-06-19', '09.00', 'Irvan Prastya', '2191355091', 'Valid', '2017-06-19 01:52:48');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(3) NOT NULL,
  `id_pelanggan` int(3) NOT NULL,
  `id_paket_wisata` int(3) NOT NULL,
  `kode_pemesanan` varchar(12) NOT NULL,
  `tgl_pemesanan` date NOT NULL,
  `harga_pemesanan` int(10) NOT NULL,
  `status` varchar(25) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `id_pelanggan`, `id_paket_wisata`, `kode_pemesanan`, `tgl_pemesanan`, `harga_pemesanan`, `status`, `created_at`) VALUES
(19, 3, 7, '06042017dJyF', '2017-04-06', 450000, 'Dibatalkan', '2017-04-13 03:34:51'),
(20, 3, 9, '130420172oIv', '2017-04-13', 2000000, 'Disetujui', '2017-04-13 03:39:55'),
(21, 3, 7, '13042017K6ho', '2017-04-13', 450000, 'Disetujui', '2017-04-13 03:56:14'),
(26, 4, 9, '20042017Xfo1', '2017-04-20', 2000000, 'Disetujui', '2017-04-19 18:12:35'),
(27, 3, 5, '21042017iqu7', '2017-04-21', 700000, 'Disetujui', '2017-04-21 03:01:14'),
(29, 5, 9, '25042017tk3x', '2017-04-25', 2000000, 'Disetujui', '2017-04-25 00:48:30'),
(30, 6, 9, '25042017dQTE', '2017-04-25', 2000000, 'Segera Dibayar', '2017-04-25 00:37:24'),
(31, 7, 9, '25042017aUyA', '2017-04-25', 2000000, 'Disetujui', '2017-04-25 00:47:47'),
(32, 7, 3, '25042017gINS', '2017-04-25', 1000000, 'Disetujui', '2017-04-25 00:48:11'),
(33, 7, 7, '25042017GqZr', '2017-04-25', 450000, 'Segera Dibayar', '2017-04-25 00:38:19'),
(34, 6, 4, '25042017F0Wm', '2017-04-25', 1000000, 'Disetujui', '2017-04-25 00:47:32'),
(35, 6, 3, '25042017fgPr', '2017-04-25', 1000000, 'Disetujui', '2017-04-25 00:47:17'),
(36, 5, 3, '250420171Bs6', '2017-04-25', 1000000, 'Disetujui', '2017-04-25 00:49:57'),
(37, 4, 12, '25042017uNs6', '2017-04-25', 4000000, 'Segera Dibayar', '2017-04-25 00:39:28'),
(38, 7, 5, '25042017u1xw', '2017-04-25', 700000, 'Disetujui', '2017-04-25 00:48:21'),
(40, 5, 10, '250420175WnB', '2017-04-25', 3000000, 'Disetujui', '2017-04-25 00:50:14'),
(41, 3, 12, '25042017wOF0', '2017-04-25', 4000000, 'Disetujui', '2017-04-25 04:51:57'),
(45, 7, 12, '14062017Y8f0', '2017-06-14', 4000000, 'Disetujui', '2017-06-13 17:36:30'),
(51, 3, 8, '14062017b2N5', '2017-06-14', 500000, 'Disetujui', '2017-06-13 18:08:30'),
(52, 3, 11, '19062017nWtk', '2017-06-19', 2000000, 'Disetujui', '2017-06-19 01:52:47');

-- --------------------------------------------------------

--
-- Table structure for table `personalisasi`
--

CREATE TABLE `personalisasi` (
  `id_personalisasi` int(3) NOT NULL,
  `id_pelanggan` int(3) NOT NULL,
  `nama` char(25) NOT NULL,
  `tgl_personal` date NOT NULL,
  `isi` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personalisasi`
--

INSERT INTO `personalisasi` (`id_personalisasi`, `id_pelanggan`, `nama`, `tgl_personal`, `isi`, `created_at`) VALUES
(1, 3, 'Irvan Prasetya', '2017-03-25', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labor', '2017-03-18 07:51:58'),
(2, 3, 'Irvan Prasetya', '2017-03-25', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labor', '2017-03-18 07:52:59'),
(3, 3, 'Irvan Prasetya', '0000-00-00', 'haii selamat ulang tahun irvan prasetyaa...', '2017-03-19 16:06:58'),
(4, 3, 'Irvan Prasetya', '2017-04-03', 'dhsdsd', '2017-04-03 08:43:33'),
(5, 3, 'Irvan Prasetya', '2017-04-13', 'selamat ulang tahun, gubakan hari spesial untuk harga spesial hari ini', '2017-04-13 08:45:14'),
(6, 5, 'Yoga Ardian', '2017-04-25', 'selamat ulang tahun yoga, segera dapatkan diskon khusus di hari ulang tahun anda', '2017-04-25 04:55:42'),
(7, 3, 'Irvan Prasetya', '2017-06-15', 'selamat ulang tahun irvan, nikmati harga spesial dihari ulang tahun anda', '2017-06-15 09:19:54'),
(8, 5, 'Yoga Ardian', '2017-06-19', 'Selamat ulang tahun!! nikmati harga spesial di hari ulang tahun anda', '2017-06-18 18:16:24'),
(9, 5, 'Yoga Ardian', '2017-06-19', 'selamat ulang tahun, dapatkan harga spesial di hari ulang tahun anda..', '2017-06-19 01:56:46');

-- --------------------------------------------------------

--
-- Table structure for table `promosi`
--

CREATE TABLE `promosi` (
  `id_promosi` int(3) NOT NULL,
  `id_paket_wisata` int(3) NOT NULL,
  `nama` char(30) NOT NULL,
  `isi` text NOT NULL,
  `tgl_promosi` date NOT NULL,
  `potongan_harga` decimal(5,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promosi`
--

INSERT INTO `promosi` (`id_promosi`, `id_paket_wisata`, `nama`, `isi`, `tgl_promosi`, `potongan_harga`, `created_at`) VALUES
(1, 7, 'potongan harga trip pulau komo', 'haloo kami memiliki harga khusus loh untuk paket wisata ini, ayoo segera pesan sekarang jangan sampai tertinggal', '2017-06-14', '30.00', '2017-06-13 17:52:46'),
(2, 8, 'Promosi mesjid agung', 'Haii ini ada promosi paket wisata mesjid agung loh', '2017-06-19', '30.00', '2017-06-18 18:06:50'),
(3, 12, 'Promosi Tana Toraja', 'pagiii para traveler, kita memiliki promo loh untuk hari ini', '2017-06-19', '20.00', '2017-06-18 18:05:37');

-- --------------------------------------------------------

--
-- Table structure for table `ulasan`
--

CREATE TABLE `ulasan` (
  `id_ulasan` int(3) NOT NULL,
  `id_pelanggan` int(3) NOT NULL,
  `id_paket_wisata` int(3) NOT NULL,
  `id_pemesanan` int(3) NOT NULL,
  `isi_kritik` text NOT NULL,
  `isi_testimoni` text NOT NULL,
  `rating` float NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ulasan`
--

INSERT INTO `ulasan` (`id_ulasan`, `id_pelanggan`, `id_paket_wisata`, `id_pemesanan`, `isi_kritik`, `isi_testimoni`, `rating`, `create_at`) VALUES
(1, 5, 2, 5, 'Sudah bagus sih, tapi masih kurang respon dalam menjawab pertanyaan pelanggan', 'Bagus, sangat memuaskan sesuai dengan apa yang diharapkan', 3.5, '2017-07-09 20:28:57'),
(2, 3, 9, 20, 'ditingkatkan lagi dalam pelayanan nya ya!! saya harap ada perubahan dalam fasilitas yang lebih nyaman', 'Bagus, sangat memuaskan sesuai dengan apa yang diharapkan, salah satu paket tour yang menyenangkan!! saya akan coba Paket Tour yang lain!! #SalamBahagia :)', 5, '2017-07-07 10:32:44'),
(3, 4, 9, 26, 'untuk rundown yang sudah di buat, mohon untuk di tepati waktu nya secara sistematis, apabila ada kenungkinan yang buruk, saya siap untuk mendengarkan arahan dari pemandu.', 'Pengalaman saya setelah mengikuti paket Tour & Travel ini sangat memuaskan ya walaupun ada kendala di cuaca, tetapi semua berjalan baik, pemandu wisata nya juga sangat ramah-ramah, fasilitas yang di tawarkan lengkap!! itu yg penting menurut saya.\r\nanda yang ingin memesan tour melalui Persada Holiday tidak akan menyesal!! #SalamLiburan #Jalan2Trus', 5, '2017-07-07 10:32:26'),
(4, 5, 9, 29, 'untuk pelayanan nya dimohon agar mengikuti rundown acara yang sudah di tentukan.', 'lumayan memuaskan!!', 5, '2017-07-09 20:23:34'),
(5, 7, 9, 31, 'untuk paket wisata dengan harga seperti yang saya ikuti kemarin terbilang sangat mahal, perbanyak promo agar banyak peminat', 'pelayanan yang diberikan lumayan bagus, fasilitas dan transportasi sangat professional dalam pelaksanaan', 3, '2017-07-07 10:32:19'),
(6, 7, 5, 38, 'terlambat dalam berbagai rundown yang telah direncanakan.', 'seru!! sangat recomended buat yang ingin berwisata tanpa memikirkan ribetnya akomodasi, hotel dan transportasi!!', 3, '2017-07-07 10:32:40');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(3) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(64) NOT NULL,
  `level` int(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`, `created_at`) VALUES
(1, 'admin', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, '2017-02-14 15:34:48'),
(2, 'fathan', '7c4a8d09ca3762af61e59520943dc26494f8941b', 4, '2017-06-18 18:08:07'),
(4, 'marketing', '7c4a8d09ca3762af61e59520943dc26494f8941b', 2, '2017-02-15 11:31:12'),
(5, 'sales', '7c4a8d09ca3762af61e59520943dc26494f8941b', 5, '2017-05-01 09:37:38'),
(6, 'toing22', '7c4a8d09ca3762af61e59520943dc26494f8941b', 4, '2017-06-18 18:27:27'),
(7, 'manager', '7c4a8d09ca3762af61e59520943dc26494f8941b', 3, '2017-03-19 16:20:28'),
(8, 'farhan', '7c4a8d09ca3762af61e59520943dc26494f8941b', 4, '2017-04-19 18:09:49'),
(9, 'yoga15', '7c4a8d09ca3762af61e59520943dc26494f8941b', 4, '2017-04-24 23:54:29'),
(10, 'fathir', '7c4a8d09ca3762af61e59520943dc26494f8941b', 4, '2017-04-24 23:56:17'),
(11, 'hidzam', '7c4a8d09ca3762af61e59520943dc26494f8941b', 4, '2017-04-25 00:03:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `atasan`
--
ALTER TABLE `atasan`
  ADD PRIMARY KEY (`id_atasan`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id_chat`);

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
  MODIFY `id_atasan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id_chat` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `departement`
--
ALTER TABLE `departement`
  MODIFY `id_departement` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `paket_wisata`
--
ALTER TABLE `paket_wisata`
  MODIFY `id_paket_wisata` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `personalisasi`
--
ALTER TABLE `personalisasi`
  MODIFY `id_personalisasi` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `promosi`
--
ALTER TABLE `promosi`
  MODIFY `id_promosi` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ulasan`
--
ALTER TABLE `ulasan`
  MODIFY `id_ulasan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
