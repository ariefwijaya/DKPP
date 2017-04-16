-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2017 at 09:30 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dkpp`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggotalumbung`
--

CREATE TABLE IF NOT EXISTS `anggotalumbung` (
`nip` int(5) NOT NULL,
  `id_lumbung` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bagian_lumbung`
--

CREATE TABLE IF NOT EXISTS `bagian_lumbung` (
  `id_bagian` varchar(5) NOT NULL,
  `nama_bagian` varchar(30) NOT NULL,
  `urut` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bagian_lumbung`
--

INSERT INTO `bagian_lumbung` (`id_bagian`, `nama_bagian`, `urut`) VALUES
('B001', 'Bangunan Lumbung', 1),
('B002', 'Lantai Jemur', 2),
('B003', 'Mesin RMU', 3),
('B004', 'Gabah dan Beras', 4);

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE IF NOT EXISTS `gejala` (
  `id_gejala` varchar(5) NOT NULL,
  `nama_gejala` varchar(100) NOT NULL,
  `bobot_gejala` int(5) NOT NULL,
  `urut` int(5) NOT NULL,
  `id_bagian` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`id_gejala`, `nama_gejala`, `bobot_gejala`, `urut`, `id_bagian`) VALUES
('G001', 'Beras menghitam', 2, 1, 'B004'),
('G002', 'Air hujan masuk ke tempat penyimpanan gabah dan beras', 2, 2, 'B001'),
('G003', 'Impeller tidak bekerja', 5, 3, 'B001'),
('G004', 'Tidak ada sinar matahari yang masuk ke dalam ruangan bangunan lumbung', 1, 4, 'B001'),
('G005', 'Dinding berlubang', 1, 5, 'B001'),
('G006', 'Plastik/karung beras bertebaran dan kotor', 5, 6, 'B001'),
('G007', 'lantai jemur berlubang', 3, 7, 'B002'),
('G008', 'Ris pinggiran lantai jemur rusak/hancur', 5, 8, 'B002'),
('G009', 'Kerusakan anyaman lantai jemur', 3, 9, 'B002'),
('G010', 'Saringan/ayakan bergetar tidak normal', 1, 10, 'B003'),
('G011', 'Kerusakan daun kipas', 5, 11, 'B003'),
('G012', 'Silinder besi pada alay penyosoh tidak berfungsi', 3, 12, 'B003'),
('G013', 'Terdapat kulit ari yang tidak terpisah dari gabah beras yang sudah dibersihkan', 3, 13, 'B004'),
('G016', 'Beras/gabah berbau tidak sedap', 5, 16, 'B004'),
('G017', 'Gesekan yang kuat dari RMU', 3, 17, 'B003'),
('G018', 'Silinder besi pada alat penyosoh tidak berfungsi', 1, 18, 'B003'),
('G019', 'Waktu penyosohan yang lama hingga melebihi batas prosedur', 5, 19, 'B003'),
('G020', 'Kemasukan benda asing pada RMU', 1, 20, 'B003'),
('G021', 'Kuantitas beras menurun', 5, 21, 'B001'),
('G022', 'Kadar air pada beras tidak merata', 3, 22, 'B001'),
('G023', 'Beras berlubang', 5, 23, 'B004');

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE IF NOT EXISTS `hasil` (
`id_hasil` int(11) NOT NULL,
  `id_solusi` varchar(5) NOT NULL,
  `nilai` varchar(5) NOT NULL,
  `jumlah_gejala` int(11) NOT NULL,
  `jumlah_fitur` int(11) NOT NULL,
  `selisih` int(11) NOT NULL,
  `id_pengguna` int(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=896 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hasil`
--

INSERT INTO `hasil` (`id_hasil`, `id_solusi`, `nilai`, `jumlah_gejala`, `jumlah_fitur`, `selisih`, `id_pengguna`) VALUES
(652, 'S001', '0', 1, 4, 3, 1),
(653, 'S002', '0', 1, 4, 3, 1),
(654, 'S003', '0', 1, 4, 3, 1),
(655, 'S004', '0', 1, 4, 3, 1),
(656, 'S005', '0', 1, 4, 3, 1),
(657, 'S006', '0', 6, 4, 2, 1),
(658, 'S007', '0', 4, 4, 0, 1),
(659, 'S008', '0.375', 6, 4, 2, 1),
(660, 'S009', '0', 4, 4, 0, 1),
(661, 'S010', '0', 4, 4, 0, 1),
(662, 'S011', '0.75', 4, 4, 0, 1),
(663, 'S012', '0', 5, 4, 1, 1),
(664, 'S013', '1', 5, 4, 1, 1),
(665, 'S014', '1', 9, 4, 5, 1),
(666, 'S015', '0', 4, 4, 0, 1),
(667, 'S016', '0', 1, 4, 3, 1),
(668, 'S017', '0', 1, 4, 3, 1),
(669, 'S019', '0', 1, 4, 3, 1),
(670, 'S021', '0.75', 3, 4, 1, 1),
(671, 'S022', '0.125', 2, 4, 2, 1),
(672, 'S023', '0.125', 3, 4, 1, 1),
(717, 'S001', '0', 1, 3, 2, 12),
(718, 'S002', '0', 1, 3, 2, 12),
(719, 'S003', '0', 1, 3, 2, 12),
(720, 'S004', '0', 1, 3, 2, 12),
(721, 'S005', '0', 1, 3, 2, 12),
(722, 'S006', '0', 1, 3, 2, 12),
(723, 'S007', '0', 1, 3, 2, 12),
(724, 'S008', '0.545', 6, 3, 3, 12),
(725, 'S009', '0', 1, 3, 2, 12),
(726, 'S010', '0', 3, 3, 0, 12),
(727, 'S011', '0.454', 4, 3, 1, 12),
(728, 'S012', '0', 2, 3, 1, 12),
(729, 'S013', '0.545', 5, 3, 2, 12),
(730, 'S014', '1', 6, 3, 3, 12),
(731, 'S015', '0', 1, 3, 2, 12),
(732, 'S016', '0', 1, 3, 2, 12),
(733, 'S017', '0', 1, 3, 2, 12),
(734, 'S019', '0', 1, 3, 2, 12),
(735, 'S021', '0.545', 3, 3, 0, 12),
(736, 'S022', '0.090', 2, 3, 1, 12),
(737, 'S023', '0.090', 3, 3, 0, 12),
(738, 'S024', '0.545', 4, 3, 1, 12),
(881, 'S001', '0.166', 7, 4, 3, 9),
(882, 'S002', '0', 7, 4, 3, 9),
(883, 'S003', '0.166', 3, 4, 1, 9),
(884, 'S004', '0', 5, 4, 1, 9),
(885, 'S005', '0', 3, 4, 1, 9),
(886, 'S006', '0', 2, 4, 2, 9),
(887, 'S007', '0', 2, 4, 2, 9),
(888, 'S008', '0', 3, 4, 1, 9),
(889, 'S009', '0', 3, 4, 1, 9),
(890, 'S010', '0', 4, 4, 0, 9),
(891, 'S011', '0.277', 3, 4, 1, 9),
(892, 'S012', '0.722', 6, 4, 2, 9),
(893, 'S013', '0.277', 3, 4, 1, 9),
(894, 'S014', '0', 4, 4, 0, 9),
(895, 'S015', '0', 4, 4, 0, 9);

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE IF NOT EXISTS `jabatan` (
`id_jabatan` int(5) NOT NULL,
  `nama_jabatan` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(1, 'Anggota Lumbung'),
(2, 'Kasubbid'),
(3, 'Admin'),
(4, 'Pakar');

-- --------------------------------------------------------

--
-- Table structure for table `kasus`
--

CREATE TABLE IF NOT EXISTS `kasus` (
`id_kasus` int(11) NOT NULL,
  `id_gejala` varchar(5) NOT NULL,
  `id_solusi` varchar(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=191 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kasus`
--

INSERT INTO `kasus` (`id_kasus`, `id_gejala`, `id_solusi`) VALUES
(1, 'G004', 'S001'),
(2, 'G001', 'S001'),
(3, 'G002', 'S001'),
(4, 'G007', 'S001'),
(5, 'G005', 'S001'),
(6, 'G005', 'S001'),
(7, 'G016', 'S001'),
(8, 'G002', 'S003'),
(9, 'G005', 'S003'),
(10, 'G007', 'S003'),
(11, 'G016', 'S004'),
(12, 'G017', 'S004'),
(13, 'G018', 'S004'),
(14, 'G019', 'S004'),
(15, 'G020', 'S004'),
(16, 'G017', 'S005'),
(17, 'G019', 'S005'),
(18, 'G020', 'S005'),
(19, 'G021', 'S006'),
(20, 'G022', 'S006'),
(21, 'G013', 'S008'),
(22, 'G021', 'S008'),
(23, 'G022', 'S008'),
(160, 'G012', 'S009'),
(161, 'G013', 'S009'),
(162, 'G017', 'S009'),
(163, 'G012', 'S010'),
(164, 'G013', 'S010'),
(165, 'G021', 'S010'),
(166, 'G022', 'S010'),
(167, 'G005', 'S011'),
(168, 'G008', 'S011'),
(169, 'G009', 'S011'),
(170, 'G004', 'S012'),
(171, 'G005', 'S012'),
(172, 'G006', 'S012'),
(173, 'G007', 'S012'),
(174, 'G008', 'S012'),
(175, 'G009', 'S012'),
(176, 'G010', 'S013'),
(177, 'G011', 'S013'),
(178, 'G012', 'S013'),
(179, 'G001', 'S014'),
(180, 'G003', 'S014'),
(181, 'G004', 'S014'),
(182, 'G005', 'S014'),
(183, 'G016', 'S015'),
(184, 'G017', 'S015'),
(185, 'G018', 'S015'),
(186, 'G021', 'S015'),
(187, 'G006', 'S016'),
(188, 'G007', 'S016'),
(189, 'G008', 'S016'),
(190, 'G011', 'S016');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
`id_kategori` int(5) NOT NULL,
  `nama_kategori` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Gabah'),
(2, 'Anyaman Kawat'),
(3, 'Ventilasi'),
(4, 'Papan Galangan'),
(5, 'Dinding'),
(6, 'Lantai'),
(7, 'Saringan'),
(8, 'Mesin Pemecah Kulit'),
(9, 'Alat Penyosoh'),
(10, 'Motor Mesin'),
(11, 'Huller'),
(12, 'Blower'),
(13, 'Milling'),
(14, 'Husker'),
(15, 'Separator'),
(16, 'Polisher'),
(17, 'Beras Pecah Kulit'),
(18, 'Beras Coklat'),
(19, 'Beras'),
(20, 'Keseluruhan Bagian');

-- --------------------------------------------------------

--
-- Table structure for table `komentar_explicit`
--

CREATE TABLE IF NOT EXISTS `komentar_explicit` (
`id_komentar_explicit` int(5) NOT NULL,
  `id_explicit` int(5) NOT NULL,
  `id_pengguna` int(5) NOT NULL,
  `isi_komentar_explicit` text NOT NULL,
  `tgl_komentar` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komentar_explicit`
--

INSERT INTO `komentar_explicit` (`id_komentar_explicit`, `id_explicit`, `id_pengguna`, `isi_komentar_explicit`, `tgl_komentar`) VALUES
(11, 7, 1, 'kdkdd', '2016-06-01 1:44:08');

-- --------------------------------------------------------

--
-- Table structure for table `komentar_tacit`
--

CREATE TABLE IF NOT EXISTS `komentar_tacit` (
`id_komentar_tacit` int(5) NOT NULL,
  `id_tacit` int(5) NOT NULL,
  `id_pengguna` int(5) NOT NULL,
  `isi_komentar_tacit` text NOT NULL,
  `tgl_komentar` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komentar_tacit`
--

INSERT INTO `komentar_tacit` (`id_komentar_tacit`, `id_tacit`, `id_pengguna`, `isi_komentar_tacit`, `tgl_komentar`) VALUES
(22, 2, 1, 'postingan yang bagus', '2016-05-26 2:41:03'),
(24, 10, 1, 'khdkfkdhkfd', '2016-08-20 21:27:00'),
(25, 12, 1, 'jfkdjfkjdkf', '2016-09-02 20:16:41'),
(26, 12, 1, 'new', '2016-09-02 20:16:56'),
(28, 12, 9, 'waaahh', '2017-04-09 13:19:47');

-- --------------------------------------------------------

--
-- Table structure for table `like_explicit`
--

CREATE TABLE IF NOT EXISTS `like_explicit` (
`id_like_e` int(5) NOT NULL,
  `id_explicit` int(5) NOT NULL,
  `id_pengguna` int(5) NOT NULL,
  `tgl_like` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `like_explicit`
--

INSERT INTO `like_explicit` (`id_like_e`, `id_explicit`, `id_pengguna`, `tgl_like`) VALUES
(2, 7, 10, '2016-05-27 0:05:18'),
(3, 9, 1, '2016-06-09 23:39:01'),
(4, 11, 9, '2017-04-06 16:21:19');

-- --------------------------------------------------------

--
-- Table structure for table `like_tacit`
--

CREATE TABLE IF NOT EXISTS `like_tacit` (
`id_like` int(5) NOT NULL,
  `id_tacit` int(5) NOT NULL,
  `id_pengguna` int(5) NOT NULL,
  `tgl_like` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=126 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `like_tacit`
--

INSERT INTO `like_tacit` (`id_like`, `id_tacit`, `id_pengguna`, `tgl_like`) VALUES
(118, 5, 1, '2016-06-01 22:15:03'),
(119, 5, 10, '2016-06-03 22:22:44'),
(123, 12, 1, '2016-09-04 12:40:15'),
(125, 12, 9, '2017-04-06 16:21:11');

-- --------------------------------------------------------

--
-- Table structure for table `lumbung`
--

CREATE TABLE IF NOT EXISTS `lumbung` (
`id_lumbung` int(5) NOT NULL,
  `nama_lumbung` varchar(30) NOT NULL,
  `desa` varchar(30) NOT NULL,
  `kecamatan` varchar(30) NOT NULL,
  `kabupaten` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE IF NOT EXISTS `notifikasi` (
`id_notifikasi` int(11) NOT NULL,
  `id_pengguna` int(5) NOT NULL,
  `id_penerima` int(5) NOT NULL,
  `id_posting` int(5) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `tgl_notif` varchar(30) NOT NULL,
  `status` varchar(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifikasi`
--

INSERT INTO `notifikasi` (`id_notifikasi`, `id_pengguna`, `id_penerima`, `id_posting`, `kategori`, `tgl_notif`, `status`) VALUES
(1, 1, 1, 14, 'v_explicit', '2017-04-09 13:00:18', 'Y'),
(2, 1, 1, 11, 'v_explicit', '2017-04-09 13:00:45', 'Y'),
(3, 0, 1, 15, 'v_explicit', '2017-04-09 13:03:40', 'N'),
(4, 9, 9, 27, 'tacit', '2017-04-09 13:19:23', 'N'),
(5, 9, 1, 12, 'tacit', '2017-04-09 13:19:47', 'N'),
(6, 0, 9, 69, 'v_tacit', '2017-04-10 20:03:17', 'Y'),
(7, 0, 9, 68, 'v_tacit', '2017-04-11 1:57:27', 'Y'),
(8, 0, 9, 63, 'v_tacit', '2017-04-11 14:50:14', 'Y'),
(9, 0, 9, 63, 'v_tacit', '2017-04-11 14:50:17', 'Y'),
(10, 0, 9, 64, 'v_tacit', '2017-04-11 14:51:44', 'Y'),
(12, 0, 10, 70, 'v_tacit', '2017-04-11 16:02:50', 'Y'),
(23, 0, 10, 67, 'r_tacit', '2017-04-11 21:36:28', 'Y'),
(24, 9, 9, 69, 'tacit', '2017-04-12 18:10:11', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `pengetahuan_explicit`
--

CREATE TABLE IF NOT EXISTS `pengetahuan_explicit` (
`id_explicit` int(5) NOT NULL,
  `id_pengguna` int(5) NOT NULL,
  `id_kategori` int(5) NOT NULL,
  `judul_explicit` text NOT NULL,
  `keterangan` text NOT NULL,
  `userfile` text NOT NULL,
  `tgl_post` varchar(30) NOT NULL,
  `validasi_explicit` int(1) NOT NULL DEFAULT '0',
  `like` int(5) NOT NULL,
  `bulan` varchar(2) NOT NULL,
  `tahun` int(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengetahuan_explicit`
--

INSERT INTO `pengetahuan_explicit` (`id_explicit`, `id_pengguna`, `id_kategori`, `judul_explicit`, `keterangan`, `userfile`, `tgl_post`, `validasi_explicit`, `like`, `bulan`, `tahun`) VALUES
(7, 1, 1, 'Membuat Benih Padi Sendiri', '<p>berisi data cara pembuatan benih padi sendiri</p>\r\n', 'CARA MEMBUAT BENIH PADI SENDIRI.pdf', '2017-02-23 2:37:49', 1, 1, '02', 2017),
(8, 1, 1, 'Padi dan Beras', '<p>Tentang Padi dan Beras</p>\r\n', 'Padi dan Beras.pdf', '2017-03-02 10:17:57', 1, 0, '03', 2017),
(9, 8, 7, 'Pedoman Lumbung Pangan', '<p>Pedoman Lumbung Pangan Desa</p>\r\n', 'Pedoman Lumbung Pangan.pdf', '2017-03-05 22:11:42', 1, 1, '03', 2017),
(11, 1, 1, 'Gambar Teknik LPM', '<p>Gambar Teknik LPM</p>\r\n', 'GAMBAR-TEKNIK-LPM.pdf', '2017-03-16 23:49:40', 1, 1, '03', 2017),
(12, 9, 2, 'Metode Fumigasi pada Flonder', '<p>Cara metode fumigasi</p>\r\n', 'Metode-fumigasi-pada-flonder.pdf', '2017-04-01 0:00:20', 1, 0, '04', 2017),
(13, 9, 12, 'Penggilangan Padi', '<p>tes</p>\r\n', 'Penggilingan Padi.pdf', '2017-04-09 12:35:00', 1, 0, '04', 2017),
(14, 1, 5, 'hidu', '<p>huduigdui</p>\r\n', '256-475-1-SM.pdf', '2017-04-09 12:54:50', 1, 0, '04', 2017),
(15, 1, 3, 'hsh', '<p>hjhjkdshs</p>\r\n', 'Cara Penyimpanan Gabah dan Benih secara Aman.pdf', '2017-04-09 13:02:51', 1, 0, '04', 2017);

-- --------------------------------------------------------

--
-- Table structure for table `pengetahuan_tacit`
--

CREATE TABLE IF NOT EXISTS `pengetahuan_tacit` (
`id_tacit` int(5) NOT NULL,
  `id_pengguna` int(5) NOT NULL,
  `id_kategori` int(5) NOT NULL,
  `judul_tacit` text NOT NULL,
  `masalah` text NOT NULL,
  `solusi` text NOT NULL,
  `tgl_post` varchar(30) NOT NULL,
  `validasi_tacit` int(1) NOT NULL DEFAULT '0' COMMENT '0 : tidak valid 1: valid 2: revisi',
  `like` int(5) NOT NULL,
  `bulan` varchar(2) NOT NULL,
  `tahun` int(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengetahuan_tacit`
--

INSERT INTO `pengetahuan_tacit` (`id_tacit`, `id_pengguna`, `id_kategori`, `judul_tacit`, `masalah`, `solusi`, `tgl_post`, `validasi_tacit`, `like`, `bulan`, `tahun`) VALUES
(1, 8, 1, 'Penyebab Gabah Menghitam', '<p>Penyebab utama yang membuat gabah menghitam adalah terserang hama</p>\r\n', '<p>Hal itu berkaitan dengan kebersihan di sekitar lingkungan lumbung serta peralatan yang ada. Periksa RMU dan keadaan lumbung serta tempat penyimpanan, kontrol suhu ruangan lumbung, apabila kelembapan udara serta uap air tidak sesuai prosedur, perbaiki kontrol kelembapan udara  dan uap air  tersebut. </p>\r\n', '2017-02-25 2:30:21', 1, 0, '02', 2017),
(2, 9, 17, 'Beras Pecah Kulit Bermasalah', '<p>Kulit Ari Masih Banyak Setelah Perontokan</p>\r\n', '<p>Pisahkan beras yang masih tercampur dengan kulit ari secara manual atau dapat juga menggunakan mesin penyosoh. Jika terdapat kesalah dalam mesin penyosoh segera perbaiki Rice Milling Unit.</p>\r\n', '2017-02-26 4:33:18', 1, 0, '02', 2017),
(4, 8, 4, 'Beras yang disimpan basah/lumbung', '<p>Kerusakan papan galangan yang terbuat dari kayu</p>\r\n', '<p>Sebelum membenarkan papa gilingan, pisahkan terlebih dahulu beras yang basah/lembab, kemudian jemur kembali di lantai jemur. Selanjutnya, perbaiki/ganti papan galangan yg rusak</p>\r\n', '2017-03-01 21:10:47', 1, 0, '03', 2017),
(5, 1, 12, 'Mesin Blower Tidak Hidup', '<p>Memperbaiki blower yang tidak mau hidup</p>\r\n', '<p>Coba cek arus listrik di bangunan lumbung. Jika tidak ada masalah dalam hal arus listrik, perbaiki atau ganti blower dengan yang baru</p>\r\n', '2017-03-03 22:05:51', 1, 2, '03', 2017),
(10, 1, 19, 'Menghindari Serangan Hama', '<p>Cara dan tips menghindari serangan hama pada beras/gabah</p>\r\n', '<p>Selalu periksa tempat penyimpanan dan lantai jemur. Atur kelembapan udara dan tekanan udara di tempat penyimpanan sesuai dengan prosedur yang dianjurkan. Beras yang sudah terkontaminasi kutu dijemur di bawah terik sinar matahari. Bersihkan tempat penyimpanan secara rutin. Pisahkan beras yang berlubang dengan beras yang masih baik. Pastikan tempat penyimpanan kedap air. Periksa kadar air pada beras menyesuaikan berapa lama beras akan disimpan.</p>\r\n', '2017-03-04 22:08:00', 1, 0, '04', 2017),
(12, 1, 5, 'Menjaga standar jumlah menir', '<p>jumlah menir yang tinggi</p>\r\n', '<p>Selalu cek silender besi secara rutin. Apabila silder telah berkarat, ganti silender besi dengan yang baru. Kontrol waktu penyosohan sesuai standar.</p>\r\n', '2017-04-03 6:38:47', 1, 2, '04', 2017),
(22, 12, 1, 'Yuyuiugs', '<p>yuayuagugs</p>\r\n', '<p>dgugdufduyd</p>\r\n', '2017-04-06 15:00:09', 1, 0, '04', 2017),
(25, 9, 1, 'Gabah Beras', '<p>gugxugugxgx</p>\r\n', '<p>ahuiaiusib</p>\r\n', '2017-04-08 7:13:29', 1, 0, '04', 2017),
(27, 9, 9, 'SFSF', '<p>EQERWSRS</p>\r\n', '<p>GDGY</p>\r\n', '2017-04-09 0:28:35', 1, 0, '04', 2017),
(62, 9, 4, 'tes', '<p>iauagu</p>\r\n', '<p>ugugua</p>\r\n', '2017-04-09 20:12:27', 0, 0, '04', 2017),
(63, 9, 4, 'tes', '<p>iauagu</p>\r\n', '<p>ugugua</p>\r\n', '2017-04-09 20:12:27', 1, 0, '04', 2017),
(64, 9, 4, 'tes', '<p>iauagu</p>\r\n', '<p>ugugua</p>\r\n', '2017-04-09 20:12:27', 1, 0, '04', 2017),
(65, 9, 3, 'tes2', '<p>guggj</p>\r\n', '<p>guyguyfy</p>\r\n', '2017-04-09 20:16:00', 0, 0, '04', 2017),
(66, 9, 3, 'tes2', '<p>guggj</p>\r\n', '<p>guyguyfy</p>\r\n', '2017-04-09 20:16:00', 2, 0, '04', 2017),
(67, 9, 3, 'tes2', '<p>guggj</p>\r\n', '<p>guyguyfy</p>\r\n', '2017-04-09 20:16:00', 2, 0, '04', 2017),
(68, 9, 1, 'nyubo1', '<p>cubo cubo cubo</p>\r\n', '<p>123</p>\r\n', '2017-04-09 22:26:12', 1, 0, '04', 2017),
(69, 9, 13, 'nyubo2', '<p>nyubo2<br />\r\n&nbsp;</p>\r\n', '<p>nyubo2</p>\r\n', '2017-04-10 19:45:06', 1, 0, '04', 2017),
(70, 10, 4, 'nyubo3', '<p>nyubo bae</p>\r\n', '<p>nyubo nian</p>\r\n', '2017-04-11 1:45:01', 1, 0, '04', 2017);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE IF NOT EXISTS `pengguna` (
`id_pengguna` int(5) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` varchar(30) NOT NULL,
  `id_jabatan` int(5) NOT NULL,
  `hak_akses` int(5) NOT NULL DEFAULT '1',
  `userfile` varchar(100) NOT NULL DEFAULT 'no_photo.jpg',
  `password` varchar(50) NOT NULL,
  `poin` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nip`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `id_jabatan`, `hak_akses`, `userfile`, `password`, `poin`) VALUES
(1, '040668', 'Fakhri Fajrulfalah', 'Laki-laki', 'Palembang', '1994-06-05', 2, 2, 'fakhri.jpg', 'a0bae51a854b72338f3dc0fac5324934', 130),
(8, '931164', 'Suryono', 'Laki-laki', 'Bandung', '1989-06-09', 3, 3, 'no_photo.jpg', 'fc43884b70bec84572527b64c85993b0', 40),
(9, '080408', 'Luthfi Hardianto', 'Laki-laki', 'Palembang', '1980-05-07', 1, 1, 'no_photo.jpg', 'e2be1a765190b65b15e2054be34c0db8', 110),
(10, '130451', 'Kurniawan', 'Laki-laki', 'Palembang', '1977-05-09', 4, 4, 'no_photo.jpg', 'cf463c9033e2a7c8513084cc565dc137', 10),
(11, '90828', 'Choirunnisa Qonitah', 'Perempuan', 'Palembang', '2017-04-01', 4, 4, 'no_photo.jpg', 'c1cb86799840c59165637f847c17cc32', 0),
(12, '011095', 'Choirunnisa Muthi''ah', 'Perempuan', 'Palembang', '2017-04-01', 2, 2, 'no_photo.jpg', 'f24713a1dc64ecc5505b49e6b7b91f15', 10);

-- --------------------------------------------------------

--
-- Table structure for table `request_gejala`
--

CREATE TABLE IF NOT EXISTS `request_gejala` (
`id_request` int(5) NOT NULL,
  `id_bagian` varchar(5) NOT NULL,
  `nama_gejala` varchar(100) NOT NULL,
  `id_pengguna` int(5) NOT NULL,
  `tgl_request` varchar(30) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request_gejala`
--

INSERT INTO `request_gejala` (`id_request`, `id_bagian`, `nama_gejala`, `id_pengguna`, `tgl_request`, `status`) VALUES
(2, 'B003', 'Mesin RMU tidak mau hidup', 10, '2017-04-15 13:52:05', 0);

-- --------------------------------------------------------

--
-- Table structure for table `revise`
--

CREATE TABLE IF NOT EXISTS `revise` (
`id_revise` int(5) NOT NULL,
  `id_solusi` varchar(5) NOT NULL,
  `revisi` text NOT NULL,
  `id_pengguna` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `revise_explicit`
--

CREATE TABLE IF NOT EXISTS `revise_explicit` (
`id_revise` int(5) NOT NULL,
  `id_explicit` int(5) NOT NULL,
  `note` text NOT NULL,
  `id_pengguna` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `revise_tacit`
--

CREATE TABLE IF NOT EXISTS `revise_tacit` (
`id_revise` int(5) NOT NULL,
  `id_tacit` int(5) NOT NULL,
  `note` text NOT NULL,
  `id_pengguna` int(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `revise_tacit`
--

INSERT INTO `revise_tacit` (`id_revise`, `id_tacit`, `note`, `id_pengguna`) VALUES
(3, 70, 'inilah dia', 10),
(10, 66, 'sabar', 10),
(13, 67, '4321', 10);

-- --------------------------------------------------------

--
-- Table structure for table `reward`
--

CREATE TABLE IF NOT EXISTS `reward` (
`id_reward` int(5) NOT NULL,
  `id_pengguna` int(5) NOT NULL,
  `reward` varchar(100) NOT NULL,
  `keterangan_reward` text NOT NULL,
  `tgl_reward` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reward`
--

INSERT INTO `reward` (`id_reward`, `id_pengguna`, `reward`, `keterangan_reward`, `tgl_reward`) VALUES
(1, 1, 'Tabungan Senilai 2.000.000', 'Tabungan BRI senilai 2juta', '2017-04-06 2:56:20');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat`
--

CREATE TABLE IF NOT EXISTS `riwayat` (
`id_riwayat` int(11) NOT NULL,
  `id_solusi` varchar(5) NOT NULL,
  `nama_solusi` text NOT NULL,
  `solusi_masalah` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `riwayat`
--

INSERT INTO `riwayat` (`id_riwayat`, `id_solusi`, `nama_solusi`, `solusi_masalah`) VALUES
(1, 'S010', 'Menghindari Penyusutan Kuantitas Beras', '<ul>\r\n<li>Sebelum beras dimasukkan kedalam kemasan plastik, cek atau periksa kadar air beras</li>\r\n<li>Beras dikemas ditakaran tertentu, misalnya 5 kg</li>\r\n<li>Beras yang sudah dimasukkan kedalam kemasan ditumpuk diatas papan tempat penyimpanan maksimal 15 tumpukan.</li>\r\n<li>Setiap jenis berat dalam tumpukan disusun dalam blok-blok yang terpisah.</li>\r\n</ul>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `solusi`
--

CREATE TABLE IF NOT EXISTS `solusi` (
  `id_solusi` varchar(5) NOT NULL,
  `nama_solusi` text NOT NULL,
  `solusi_masalah` text NOT NULL,
  `validasi` int(1) NOT NULL DEFAULT '0',
  `urut` int(5) NOT NULL,
  `dilihat` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `solusi`
--

INSERT INTO `solusi` (`id_solusi`, `nama_solusi`, `solusi_masalah`, `validasi`, `urut`, `dilihat`) VALUES
('S001', 'Menanggulangi Hama', '<ul>\r\n	<li>periksa kebersihan lumbung</li>\r\n	<li>periksa kadar air dan ruangan tempat penyimpanan</li>\r\n	<li>periksa lantai dan dinding bangunan lumbung</li>\r\n	<li>periksa kondisi gabah/beras</li>\r\n	<li>periksa lantai jemur</li>\r\n	<li>ganti lantai jemur apabila sudah berjamur</li>\r\n	<li>ganti bagian RMU yang berkarat</li>\r\n</ul>\r\n', 0, 1, 3),
('S002', 'Menanggulangi jumlah menir yang tinggi', '<ul>\r\n<li>Cek silender besi</li>\r\n<li>Ganti silender besi dengan yang baru</li>\r\n<li>Kontrol waktu penyosohan sesuai standar</li>\r\n</ul>\r\n', 1, 2, 1),
('S003', 'Menanggulangi Hama', '<ul>\r\n	<li>periksa kebersihan lumbung</li>\r\n	<li>periksa kadar air dan ruangan tempat penyimpanan</li>\r\n	<li>periksa lantai dan dinding bangunan lumbung</li>\r\n	<li>periksa kondisi gabah/beras</li>\r\n	<li>periksa lantai jemur</li>\r\n	<li>ganti lantai jemur apabila sudah berjamur</li>\r\n	<li>ganti bagian RMU yang berkarat</li>\r\n</ul>\r\n', 1, 3, 1),
('S004', 'Menanggulangi Tingginya Jumlah Menir', '<ul>\r\n<li>Cek silender besi</li>\r\n<li>Ganti silender besi dengan yang baru</li>\r\n<li>Kontrol waktu penyosohan sesuai standar</li>\r\n</ul>', 1, 4, 1),
('S005', 'Menanggulangi Tingginya Jumlah Menir', '<ul>\r\n<li>Cek silender besi</li>\r\n<li>Ganti silender besi dengan yang baru</li>\r\n<li>Kontrol waktu penyosohan sesuai standar</li>\r\n</ul>', 1, 5, 3),
('S006', 'Menghindari Penyusutan Kuantitas Beras', '<ul>\r\n<li>Sebelum beras dimasukkan kedalam kemasan plastik, cek atau periksa kadar air beras</li>\r\n<li>Beras dikemas ditakaran tertentu, misalnya 5 kg</li>\r\n<li>Beras yang sudah dimasukkan kedalam kemasan ditumpuk diatas papan tempat penyimpanan maksimal 15 tumpukan.</li>\r\n<li>Setiap jenis berat dalam tumpukan disusun dalam blok-blok yang terpisah.</li>\r\n</ul>\r\n', 1, 6, 3),
('S007', 'Kasus belum ada di database', 'Rekomendasi solusi belum tersedia', 1, 7, 1),
('S008', 'Menghindari Penyusutan Kuantitas Beras', '<ul>\r\n<li>Sebelum beras dimasukkan kedalam kemasan plastik, cek atau periksa kadar air beras</li>\r\n<li>Beras dikemas ditakaran tertentu, misalnya 5 kg</li>\r\n<li>Beras yang sudah dimasukkan kedalam kemasan ditumpuk diatas papan tempat penyimpanan maksimal 15 tumpukan.</li>\r\n<li>Setiap jenis berat dalam tumpukan disusun dalam blok-blok yang terpisah.</li>\r\n</ul>\r\n', 1, 8, 1),
('S009', 'Kasus belum ada di database', 'Rekomendasi solusi belum tersedia', 1, 9, 1),
('S010', 'Menghindari Penyusutan Kuantitas Beras', '<ul>\r\n	<li>Sebelum beras dimasukkan kedalam kemasan plastik, cek atau periksa kadar air beras</li>\r\n	<li>Beras dikemas ditakaran tertentu, misalnya 5 kg</li>\r\n	<li>Beras yang sudah dimasukkan kedalam kemasan ditumpuk diatas papan tempat penyimpanan maksimal 15 tumpukan.</li>\r\n	<li>Setiap jenis berat dalam tumpukan disusun dalam blok-blok yang terpisah.</li>\r\n	<li>Jika ada beras yang tumpah, segera bersihkan dan kembali dijemur</li>\r\n</ul>\r\n', 0, 10, 2),
('S011', 'Kasus belum ada di database', 'Rekomendasi solusi belum tersedia', 1, 11, 1),
('S012', 'Kasus belum ada di database', 'Rekomendasi solusi belum tersedia', 1, 12, 1),
('S013', 'Kasus belum ada di database', 'Rekomendasi solusi belum tersedia', 1, 13, 1),
('S014', 'Kasus belum ada di database', 'Rekomendasi solusi belum tersedia', 1, 14, 1),
('S015', 'Kasus belum ada di database', 'Rekomendasi solusi belum tersedia', 1, 15, 1),
('S016', 'Kasus belum ada di database', 'Rekomendasi solusi belum tersedia', 1, 16, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tag_explicit`
--

CREATE TABLE IF NOT EXISTS `tag_explicit` (
`id_tag` int(5) NOT NULL,
  `id_explicit` int(5) NOT NULL,
  `id_pengguna` int(5) NOT NULL,
  `tgl_tag` varchar(30) NOT NULL,
  `status` int(5) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tag_explicit`
--

INSERT INTO `tag_explicit` (`id_tag`, `id_explicit`, `id_pengguna`, `tgl_tag`, `status`) VALUES
(1, 12, 1, '2017-04-13', NULL),
(2, 12, 10, '2017-04-13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tag_tacit`
--

CREATE TABLE IF NOT EXISTS `tag_tacit` (
`id_tag` int(5) NOT NULL,
  `id_tacit` int(5) NOT NULL,
  `id_pengguna` int(5) NOT NULL,
  `tgl_tag` varchar(30) NOT NULL,
  `status` int(5) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tag_tacit`
--

INSERT INTO `tag_tacit` (`id_tag`, `id_tacit`, `id_pengguna`, `tgl_tag`, `status`) VALUES
(4, 69, 10, '2017-04-10', NULL),
(5, 69, 11, '2017-04-10', NULL),
(11, 70, 9, '2017-04-10', NULL),
(14, 70, 11, '2017-04-10', NULL),
(15, 68, 11, '2017-04-13', NULL),
(16, 68, 12, '2017-04-13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tmp_gejala`
--

CREATE TABLE IF NOT EXISTS `tmp_gejala` (
`id_tmp_gejala` int(11) NOT NULL,
  `id_gejala` varchar(5) NOT NULL,
  `id_pengguna` int(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=282 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tmp_gejala`
--

INSERT INTO `tmp_gejala` (`id_tmp_gejala`, `id_gejala`, `id_pengguna`) VALUES
(278, 'G006', 9),
(279, 'G007', 9),
(280, 'G008', 9),
(281, 'G011', 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggotalumbung`
--
ALTER TABLE `anggotalumbung`
 ADD PRIMARY KEY (`nip`), ADD KEY `id_pengguna` (`id_lumbung`);

--
-- Indexes for table `bagian_lumbung`
--
ALTER TABLE `bagian_lumbung`
 ADD PRIMARY KEY (`id_bagian`);

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
 ADD PRIMARY KEY (`id_gejala`), ADD KEY `id_bagian` (`id_bagian`);

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
 ADD PRIMARY KEY (`id_hasil`), ADD KEY `id_solusi` (`id_solusi`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
 ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `kasus`
--
ALTER TABLE `kasus`
 ADD PRIMARY KEY (`id_kasus`), ADD KEY `id_gejala` (`id_gejala`), ADD KEY `id_solusi` (`id_solusi`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
 ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `komentar_explicit`
--
ALTER TABLE `komentar_explicit`
 ADD PRIMARY KEY (`id_komentar_explicit`), ADD KEY `id_explicit` (`id_explicit`), ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `komentar_tacit`
--
ALTER TABLE `komentar_tacit`
 ADD PRIMARY KEY (`id_komentar_tacit`), ADD KEY `id_tacit` (`id_tacit`), ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `like_explicit`
--
ALTER TABLE `like_explicit`
 ADD PRIMARY KEY (`id_like_e`), ADD KEY `id_explicit` (`id_explicit`), ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `like_tacit`
--
ALTER TABLE `like_tacit`
 ADD PRIMARY KEY (`id_like`), ADD KEY `id_tacit` (`id_tacit`), ADD KEY `id_pengguna` (`id_pengguna`), ADD KEY `id_tacit_2` (`id_tacit`), ADD KEY `id_pengguna_2` (`id_pengguna`);

--
-- Indexes for table `lumbung`
--
ALTER TABLE `lumbung`
 ADD PRIMARY KEY (`id_lumbung`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
 ADD PRIMARY KEY (`id_notifikasi`), ADD KEY `id_penerima` (`id_penerima`);

--
-- Indexes for table `pengetahuan_explicit`
--
ALTER TABLE `pengetahuan_explicit`
 ADD PRIMARY KEY (`id_explicit`), ADD KEY `id_pengguna` (`id_pengguna`), ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `pengetahuan_tacit`
--
ALTER TABLE `pengetahuan_tacit`
 ADD PRIMARY KEY (`id_tacit`), ADD KEY `id_pengguna` (`id_pengguna`), ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
 ADD PRIMARY KEY (`id_pengguna`), ADD KEY `id_jabatan` (`id_jabatan`);

--
-- Indexes for table `request_gejala`
--
ALTER TABLE `request_gejala`
 ADD PRIMARY KEY (`id_request`), ADD KEY `id_bagian` (`id_bagian`), ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `revise`
--
ALTER TABLE `revise`
 ADD PRIMARY KEY (`id_revise`), ADD KEY `id_solusi` (`id_solusi`);

--
-- Indexes for table `revise_explicit`
--
ALTER TABLE `revise_explicit`
 ADD PRIMARY KEY (`id_revise`), ADD KEY `id_tacit` (`id_explicit`,`id_pengguna`);

--
-- Indexes for table `revise_tacit`
--
ALTER TABLE `revise_tacit`
 ADD PRIMARY KEY (`id_revise`), ADD KEY `id_tacit` (`id_tacit`,`id_pengguna`);

--
-- Indexes for table `reward`
--
ALTER TABLE `reward`
 ADD PRIMARY KEY (`id_reward`), ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `riwayat`
--
ALTER TABLE `riwayat`
 ADD PRIMARY KEY (`id_riwayat`), ADD KEY `id_solusi` (`id_solusi`);

--
-- Indexes for table `solusi`
--
ALTER TABLE `solusi`
 ADD PRIMARY KEY (`id_solusi`);

--
-- Indexes for table `tag_explicit`
--
ALTER TABLE `tag_explicit`
 ADD PRIMARY KEY (`id_tag`), ADD KEY `id_tacit` (`id_explicit`), ADD KEY `id_user` (`id_pengguna`);

--
-- Indexes for table `tag_tacit`
--
ALTER TABLE `tag_tacit`
 ADD PRIMARY KEY (`id_tag`), ADD KEY `id_tacit` (`id_tacit`), ADD KEY `id_user` (`id_pengguna`);

--
-- Indexes for table `tmp_gejala`
--
ALTER TABLE `tmp_gejala`
 ADD PRIMARY KEY (`id_tmp_gejala`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggotalumbung`
--
ALTER TABLE `anggotalumbung`
MODIFY `nip` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hasil`
--
ALTER TABLE `hasil`
MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=896;
--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
MODIFY `id_jabatan` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `kasus`
--
ALTER TABLE `kasus`
MODIFY `id_kasus` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=191;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
MODIFY `id_kategori` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `komentar_explicit`
--
ALTER TABLE `komentar_explicit`
MODIFY `id_komentar_explicit` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `komentar_tacit`
--
ALTER TABLE `komentar_tacit`
MODIFY `id_komentar_tacit` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `like_explicit`
--
ALTER TABLE `like_explicit`
MODIFY `id_like_e` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `like_tacit`
--
ALTER TABLE `like_tacit`
MODIFY `id_like` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=126;
--
-- AUTO_INCREMENT for table `lumbung`
--
ALTER TABLE `lumbung`
MODIFY `id_lumbung` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
MODIFY `id_notifikasi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `pengetahuan_explicit`
--
ALTER TABLE `pengetahuan_explicit`
MODIFY `id_explicit` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `pengetahuan_tacit`
--
ALTER TABLE `pengetahuan_tacit`
MODIFY `id_tacit` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
MODIFY `id_pengguna` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `request_gejala`
--
ALTER TABLE `request_gejala`
MODIFY `id_request` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `revise`
--
ALTER TABLE `revise`
MODIFY `id_revise` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `revise_explicit`
--
ALTER TABLE `revise_explicit`
MODIFY `id_revise` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `revise_tacit`
--
ALTER TABLE `revise_tacit`
MODIFY `id_revise` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `reward`
--
ALTER TABLE `reward`
MODIFY `id_reward` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `riwayat`
--
ALTER TABLE `riwayat`
MODIFY `id_riwayat` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tag_explicit`
--
ALTER TABLE `tag_explicit`
MODIFY `id_tag` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tag_tacit`
--
ALTER TABLE `tag_tacit`
MODIFY `id_tag` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tmp_gejala`
--
ALTER TABLE `tmp_gejala`
MODIFY `id_tmp_gejala` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=282;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `gejala`
--
ALTER TABLE `gejala`
ADD CONSTRAINT `gejala_ibfk_1` FOREIGN KEY (`id_bagian`) REFERENCES `bagian_lumbung` (`id_bagian`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kasus`
--
ALTER TABLE `kasus`
ADD CONSTRAINT `kasus_ibfk_1` FOREIGN KEY (`id_solusi`) REFERENCES `solusi` (`id_solusi`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `kasus_ibfk_2` FOREIGN KEY (`id_gejala`) REFERENCES `gejala` (`id_gejala`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `komentar_explicit`
--
ALTER TABLE `komentar_explicit`
ADD CONSTRAINT `komentar_explicit_ibfk_1` FOREIGN KEY (`id_explicit`) REFERENCES `pengetahuan_explicit` (`id_explicit`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `komentar_explicit_ibfk_2` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `komentar_tacit`
--
ALTER TABLE `komentar_tacit`
ADD CONSTRAINT `komentar_tacit_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `komentar_tacit_ibfk_2` FOREIGN KEY (`id_tacit`) REFERENCES `pengetahuan_tacit` (`id_tacit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `like_explicit`
--
ALTER TABLE `like_explicit`
ADD CONSTRAINT `like_explicit_ibfk_1` FOREIGN KEY (`id_explicit`) REFERENCES `pengetahuan_explicit` (`id_explicit`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `like_explicit_ibfk_2` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `like_tacit`
--
ALTER TABLE `like_tacit`
ADD CONSTRAINT `like_tacit_ibfk_1` FOREIGN KEY (`id_tacit`) REFERENCES `pengetahuan_tacit` (`id_tacit`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `like_tacit_ibfk_2` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notifikasi`
--
ALTER TABLE `notifikasi`
ADD CONSTRAINT `notifikasi_ibfk_1` FOREIGN KEY (`id_penerima`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengetahuan_explicit`
--
ALTER TABLE `pengetahuan_explicit`
ADD CONSTRAINT `pengetahuan_explicit_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `pengetahuan_explicit_ibfk_2` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengetahuan_tacit`
--
ALTER TABLE `pengetahuan_tacit`
ADD CONSTRAINT `pengetahuan_tacit_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `pengetahuan_tacit_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengguna`
--
ALTER TABLE `pengguna`
ADD CONSTRAINT `pengguna_ibfk_1` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `revise`
--
ALTER TABLE `revise`
ADD CONSTRAINT `revise_ibfk_1` FOREIGN KEY (`id_solusi`) REFERENCES `solusi` (`id_solusi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reward`
--
ALTER TABLE `reward`
ADD CONSTRAINT `reward_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `riwayat`
--
ALTER TABLE `riwayat`
ADD CONSTRAINT `riwayat_ibfk_1` FOREIGN KEY (`id_solusi`) REFERENCES `solusi` (`id_solusi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tag_tacit`
--
ALTER TABLE `tag_tacit`
ADD CONSTRAINT `tag_tacit_ibfk_1` FOREIGN KEY (`id_tacit`) REFERENCES `pengetahuan_tacit` (`id_tacit`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `tag_tacit_ibfk_2` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
