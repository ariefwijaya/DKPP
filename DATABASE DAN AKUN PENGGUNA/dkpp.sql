-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 06. September 2016 jam 18:25
-- Versi Server: 5.5.8
-- Versi PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dkpp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bagian_mesin`
--

CREATE TABLE IF NOT EXISTS `bagian_mesin` (
  `id_bagian` varchar(5) NOT NULL,
  `nama_bagian` varchar(30) NOT NULL,
  `urut` int(5) NOT NULL,
  PRIMARY KEY (`id_bagian`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bagian_mesin`
--

INSERT INTO `bagian_mesin` (`id_bagian`, `nama_bagian`, `urut`) VALUES
('M001', 'Impeller', 1),
('M002', 'Shaft', 2),
('M003', 'Bearing', 3),
('M004', 'Kopling', 4),
('M005', 'Packing', 5),
('M006', 'Bagian Pendukung', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `gejala`
--

CREATE TABLE IF NOT EXISTS `gejala` (
  `id_gejala` varchar(5) NOT NULL,
  `nama_gejala` varchar(100) NOT NULL,
  `bobot_gejala` int(5) NOT NULL,
  `urut` int(5) NOT NULL,
  `id_bagian` varchar(5) NOT NULL,
  PRIMARY KEY (`id_gejala`),
  KEY `id_bagian` (`id_bagian`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gejala`
--

INSERT INTO `gejala` (`id_gejala`, `nama_gejala`, `bobot_gejala`, `urut`, `id_bagian`) VALUES
('G001', 'Ketidakseimbangan Rotor', 1, 1, 'M001'),
('G002', 'elemen rotasi bersentuhan dengan elemen stasioner', 3, 2, 'M001'),
('G003', 'Impeller tidak bekerja', 5, 3, 'M001'),
('G004', 'tidak lurus', 1, 4, 'M002'),
('G005', 'deformasi poros', 1, 5, 'M002'),
('G006', 'Kerusakan deflector o-ring', 5, 6, 'M003'),
('G007', 'ketebalan bearing metal meningkat', 3, 7, 'M003'),
('G008', 'kerusakan gasket', 5, 8, 'M003'),
('G009', 'kerusakan penutup o-ring', 3, 9, 'M003'),
('G010', 'Bearing tidak berfungsi', 5, 10, 'M003'),
('G011', 'Bearing kelebihan panas', 3, 11, 'M003'),
('G012', 'kerusakan kopling gigi', 5, 12, 'M004'),
('G013', 'Kopling tidak berfungsi', 5, 13, 'M004'),
('G014', 'Kerusakan pada sleeve metal', 5, 14, 'M005'),
('G015', 'salah pengaturan mechanical seal', 3, 15, 'M005'),
('G016', 'mechanical seal aus', 3, 16, 'M004'),
('G017', 'Pasokan minyak berlebihan', 3, 17, 'M006'),
('G018', 'Tekanan minyak berlebihan', 3, 18, 'M006'),
('G019', ' Suhu minyak berlebihan', 3, 19, 'M006'),
('G020', ' Keluaran uap minyak kurang', 1, 20, 'M006'),
('G021', 'suplai minyak tidak mencukupi', 3, 21, 'M006'),
('G022', 'deteriorasi minyak', 1, 22, 'M006'),
('G023', 'kemasukan benda asing', 3, 23, 'M006'),
('G024', 'erosi pompa dalam', 3, 24, 'M006'),
('G025', 'aliran air tersumbat', 3, 25, 'M006'),
('G026', 'tekanan hisap turun', 3, 26, 'M006'),
('G027', 'air tidak tersedot', 3, 27, 'M006'),
('G028', 'Tidak ada air pada head', 3, 28, 'M006'),
('G029', 'Motor kelebihan beban', 3, 29, 'M006'),
('G030', 'Motor kepanasan', 3, 30, 'M006'),
('G031', 'Motor tidak bekerja maksimal', 3, 31, 'M006'),
('G032', 'Pondasi pompa bergetar', 1, 32, 'M006'),
('G033', 'Kapasitas dan tekanan yang ditentukan tidak tercapai', 3, 33, 'M006'),
('G034', 'Mengeluarkan minyak kemudian minyak berhenti', 5, 34, 'M006');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil`
--

CREATE TABLE IF NOT EXISTS `hasil` (
  `id_hasil` int(11) NOT NULL AUTO_INCREMENT,
  `id_solusi` varchar(5) NOT NULL,
  `nilai` varchar(5) NOT NULL,
  `jumlah_gejala` int(11) NOT NULL,
  `jumlah_fitur` int(11) NOT NULL,
  `selisih` int(11) NOT NULL,
  `id_pengguna` int(5) NOT NULL,
  PRIMARY KEY (`id_hasil`),
  KEY `id_solusi` (`id_solusi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=717 ;

--
-- Dumping data untuk tabel `hasil`
--

INSERT INTO `hasil` (`id_hasil`, `id_solusi`, `nilai`, `jumlah_gejala`, `jumlah_fitur`, `selisih`, `id_pengguna`) VALUES
(496, 'S001', '0', 1, 3, 2, 9),
(497, 'S002', '0', 1, 3, 2, 9),
(498, 'S003', '0', 1, 3, 2, 9),
(499, 'S004', '0', 1, 3, 2, 9),
(500, 'S005', '0', 1, 3, 2, 9),
(501, 'S006', '0', 6, 3, 3, 9),
(502, 'S007', '0', 4, 3, 1, 9),
(503, 'S008', '0.444', 6, 3, 3, 9),
(504, 'S009', '0', 4, 3, 1, 9),
(505, 'S010', '0', 4, 3, 1, 9),
(506, 'S011', '0.555', 4, 3, 1, 9),
(507, 'S012', '0', 5, 3, 2, 9),
(508, 'S013', '1', 5, 3, 2, 9),
(509, 'S014', '1', 9, 3, 6, 9),
(510, 'S015', '0', 4, 3, 1, 9),
(511, 'S016', '0', 1, 3, 2, 9),
(512, 'S017', '0', 1, 3, 2, 9),
(513, 'S018', '0', 1, 3, 2, 9),
(514, 'S019', '0', 1, 3, 2, 9),
(515, 'S020', '0', 3, 3, 0, 9),
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
(695, 'S001', '0', 1, 2, 1, 10),
(696, 'S002', '0', 1, 2, 1, 10),
(697, 'S003', '0', 1, 2, 1, 10),
(698, 'S004', '0', 1, 2, 1, 10),
(699, 'S005', '0', 1, 2, 1, 10),
(700, 'S006', '0', 6, 2, 4, 10),
(701, 'S007', '0', 4, 2, 2, 10),
(702, 'S008', '1', 6, 2, 4, 10),
(703, 'S009', '0', 4, 2, 2, 10),
(704, 'S010', '0', 4, 2, 2, 10),
(705, 'S011', '0', 4, 2, 2, 10),
(706, 'S012', '0', 5, 2, 3, 10),
(707, 'S013', '1', 5, 2, 3, 10),
(708, 'S014', '1', 9, 2, 7, 10),
(709, 'S015', '0', 4, 2, 2, 10),
(710, 'S016', '0', 1, 2, 1, 10),
(711, 'S017', '0', 1, 2, 1, 10),
(712, 'S019', '0', 1, 2, 1, 10),
(713, 'S021', '1', 3, 2, 1, 10),
(714, 'S022', '1', 2, 2, 0, 10),
(715, 'S023', '1', 3, 2, 1, 10),
(716, 'S024', '0.25', 4, 2, 2, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE IF NOT EXISTS `jabatan` (
  `id_jabatan` int(5) NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(30) NOT NULL,
  PRIMARY KEY (`id_jabatan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(1, 'Manager'),
(2, 'Staff manager'),
(3, 'Lead Foreman'),
(4, 'Foreman');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kamus_istilah`
--

CREATE TABLE IF NOT EXISTS `kamus_istilah` (
  `id_istilah` int(5) NOT NULL AUTO_INCREMENT,
  `nama_istilah` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_istilah`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data untuk tabel `kamus_istilah`
--

INSERT INTO `kamus_istilah` (`id_istilah`, `nama_istilah`, `keterangan`) VALUES
(1, 'Ammonia Condensor', '<p>berfungsi untuk mengkondensasikan larutan amonia</p>\r\n'),
(2, 'Ammonia Prehater II', '<p>berfungsi memanaskan amonia dengan <em>steam condensate </em>sebagai media pemanasannya</p>\r\n'),
(3, 'Ammonia Recovery Absorber', '<p>Berfungsi untuk menyerap ammonia dari <em>recycle</em> larutan, lalu mengirimkannya ke ammonia <em>reservoir</em></p>\r\n'),
(4, 'Ammonia Reservoir', '<p>berfungsi untuk menampung ammonia&nbsp; cair <em>make up</em> dari <em>ammonia plant</em></p>\r\n'),
(5, 'Aqua Ammonia Pump', '<p>Berfungsi untuk memompa amonia dan <em>ammonia recovery</em><em> absorber </em>ke <em>high pressure absorber</em></p>\r\n'),
(6, 'Back Plate Back ', '<p>plate yang terbuat dari logam dimana dengan kasing pompa membentuk kamar cairan untuk fluida untuk dijadikan tekanan</p>\r\n'),
(7, 'Base plate', '<p>tempat dudukan seluruh komponen pompa. Diffuser dilekatkan pada pipa dengan cara dibaut. Alat ini berfungsi mengarahkan aliran pada stage berikutnya dan merubah energi kinetik pada fluida menjadi energi tekanan</p>\r\n'),
(8, 'Bearing', '<p>alat yang berfungsi untuk menahan (<em>constrain</em>) posisi rotor relatif terhadap stator sesuai dengan jenis bearing yang digunakan. Bearing yang digunakan pada pompa yaitu berupa <em>journal bearing</em> yang berfungsi untuk menahan gaya berat dan gaya-gaya yang searah dengan gaya berat tersebut, serta <em>thrust bearing</em> yang berfungsi untuk menahan gaya aksial yang timbul pada poros pompa relatif terhadap stator pompa</p>\r\n'),
(9, 'Casing (rumah pompa)', '<p>bagian terluar pompa sebagai pelindung elemen yang berada di dalamnya, tempat kedudukan difuser, intlet nozle, outlet nozle dan juga sebagai pengarah aliran dari impeller yang mengubah energi kecepatan menjadi energi tekan</p>\r\n'),
(10, 'CO2 booster Compressor', '<p>berfungsi untuk menaikkan tekanan gas CO2</p>\r\n'),
(11, 'CO2 Compressor', '<p>Compressor berfungsi untuk menaikkan tekanan gas CO2</p>\r\n'),
(12, 'Discharge nozzle', '<p>tempat keluarnya cairan yang bertekanan dari dalam pompa</p>\r\n'),
(13, 'Gas Separator', '<p>Berfungsi untuk memisahkan sisa NH3 dan CO2 yang masih terlarut dalam larutan urea</p>\r\n'),
(14, 'Heat Eschanger for Law Pressure Decomposer', '<p>Berfungsi untuk mendinginkan larutan dari <em>High Pressure Decomposer </em>menuju ke <em>Law Pressure Decomposer</em></p>\r\n'),
(15, 'High Pressure Absorber Cooler', '<p>Berfungsi untuk mengembalikan lagi larutan karbonat ke reaktor</p>\r\n'),
(16, 'High Pressure Absorber Pump', '<p>Berfungsi memompa larutan dari <em>Law Pressure Absorber </em>ke <em>High Pressure Absorber</em></p>\r\n'),
(17, 'High Pressure Decomposer', '<p>Berfungsi untuk memisahkan kelebihan NH3 dari campuran reaksi dan mendekomposisi ammonium karbonat menjadi NH3 dan CO2</p>\r\n'),
(18, 'Impeller', '<p>bagian yang berputar dari pompa sentrifugal, yang berfungsi untuk mentransfer energi dari putaran motor menuju fluida yang dipompa dengan jalan mengakselerasinya dari tengah <em>impeller</em> ke luar sisi <em>impeller</em></p>\r\n'),
(19, 'Knock Out Drum', '<p>berfungsi untuk menghilangkan partikel-partikel padat dan tetesan cairan yang mungkin terdapat dalam gas CO2</p>\r\n'),
(20, 'Kopling', '<p>berfungsi untuk menghubungkan dua <em>shaft</em>, dimana yang satu adalah poros penggerak dan yang lainnya adalah poros yang digerakkan. Kopling yang digunakan pada pompa, bergantung dari desain sistem dan pompa itu sendiri. Macam-macam kopling yang digunakan pada pompa dapat berupa kopling rigid, kopling fleksibel, <em>grid coupling</em>, <em>gear coupling</em>, <em>elastrometic coupling</em>, dan <em>disc coupling</em></p>\r\n'),
(21, 'Law Pressure Absorber', '<p>Berfungsi menyerap sempurna gas-gas dari <em>Law Pressure Decomposer</em>.</p>\r\n'),
(22, 'Law Pressure Decomposer', '<p>Berfungsi untuk menyempurnakan&nbsp; dekomposisi setelah keluar <em>High Pressure Decomposer</em></p>\r\n'),
(23, 'Mechanical Seal ', '<p>Koneksi antara batang motor shaft/pompa dan selubung pompadilindungi oleh suatu segel mekanik</p>\r\n'),
(24, 'Off Gas Absorber', '<p>Berfungsi untuk menyerap gas NH3 dan CO2 dari gas separator kemudian dikondensasikan dalam <em>packed bad</em> bagian bawah oleh larutan <em>recycle</em> yang didinginkan dalam <em>off gas absorben cooler</em></p>\r\n'),
(25, 'Off Gas Condensor', '<p>Berfungsi untuk mendinginkan gas yang keluar dari <em>gas separator</em></p>\r\n'),
(26, 'Off Gas Absorber Recycle Pump', '<p>Berfungsi untuk memompa larutn dari <em>off gas absorber </em>dan dikembalikan lagi ke bagian tengah <em>off gas absorber</em></p>\r\n'),
(27, 'Pompa', '<p>salah satu jenis mesin fluida yang berfungsi untuk memindahkan zat cair dari suatu tempat ke tempat yang diinginkan</p>\r\n'),
(28, 'Pompa sentrifugal', '<p>pompa yang memiliki elemen utama berupa motor penggerak dengan sudu impeller yang berbutar dengan kecepatan tinggi</p>\r\n'),
(29, 'Reactor For High Pressure Decomposer', '<p>Berfungsi untuk memanaskan larutan dari <em>Law Pressure Decomposer</em></p>\r\n'),
(30, 'Reaktor Sintesa', '<p>Reaktor intesa berfungsi sebagai tempat reaksi antara NH3 dan CO2</p>\r\n'),
(31, 'Shaft (Poros)', '<p>bagian yang dalam kondisi beroperasi berfungsi meneruskan momen putar dari penggerak selama pompa, komponen juga berungsi sebagai dudukan impeler dan bagian yang bergerak lain juga</p>\r\n'),
(32, 'Shaft sleeve ', '<p>berfungsi untuk melindungi shaft dari erosi, korosi dan keausan pada stuffing box. komponen ini bisa juga sebagai internal bearing, distance sleever dan leakage joint</p>\r\n'),
(33, 'Sistem lubrikasi', '<p>berfungsi untuk mengurangi koefisien gesek antara dua permukaan yang bertemu sehingga mengurangi resiko keausan. Lubrikasi pada pompa terutama digunakan pada bearing. Sistemnya dapat berupa <em>lub oil</em> atau juga tipe <em>greas</em> tergantung dari desain pompa itu sendiri</p>\r\n'),
(34, 'Sistem packing', '<p>mengontrol kebocoran fluida yang mungkin terjadi pada sisi perbatasan antara bagian pompa yang berputar (poros) dengan stator. Sistem <em>sealing</em> yang banyak digunakan pada pompa sentrifugal adalah <em>mechanical seal</em> dan <em>gland packing</em></p>\r\n'),
(35, 'Stuffing box', '<p>tempat kedudukan beberapa mechanical packing yang mengelilingi shaft sleeve. Fungsinya mencegah kebocoran pada daerah yang dimana pompa menembus casing seperti udara yang dapat masuk ke dalam pompa dan juga cairan yang keluar dari dalam pompa</p>\r\n'),
(36, 'Wearing ring', '<p>komponen yang dipasang pada casing (wearing ring casing) dan impeller (wearing ring impeller). Fungsi utama dari wearing ring adalah untuk meminimalisir kebocoran yang terjadi akibat adanya celah antara impeller dan casing</p>\r\n'),
(37, 'Wearing ring casing', '<p>alat yang dipasang pada casing untuk mencegah adanya kebocoran yang terjadi akibat ada celah pada impeller dan casing</p>\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kasus`
--

CREATE TABLE IF NOT EXISTS `kasus` (
  `id_kasus` int(11) NOT NULL AUTO_INCREMENT,
  `id_gejala` varchar(5) NOT NULL,
  `id_solusi` varchar(5) NOT NULL,
  PRIMARY KEY (`id_kasus`),
  KEY `id_gejala` (`id_gejala`),
  KEY `id_solusi` (`id_solusi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=140 ;

--
-- Dumping data untuk tabel `kasus`
--

INSERT INTO `kasus` (`id_kasus`, `id_gejala`, `id_solusi`) VALUES
(65, 'G006', 'S001'),
(66, 'G014', 'S002'),
(67, 'G017', 'S003'),
(68, 'G018', 'S004'),
(69, 'G020', 'S005'),
(70, 'G006', 'S006'),
(71, 'G017', 'S006'),
(72, 'G018', 'S006'),
(73, 'G019', 'S006'),
(74, 'G020', 'S006'),
(75, 'G014', 'S006'),
(76, 'G021', 'S007'),
(77, 'G019', 'S007'),
(78, 'G022', 'S007'),
(79, 'G023', 'S007'),
(80, 'G004', 'S008'),
(81, 'G001', 'S008'),
(82, 'G012', 'S008'),
(83, 'G002', 'S008'),
(84, 'G007', 'S008'),
(85, 'G005', 'S008'),
(86, 'G024', 'S009'),
(87, 'G008', 'S009'),
(88, 'G025', 'S009'),
(89, 'G026', 'S009'),
(90, 'G015', 'S010'),
(91, 'G016', 'S010'),
(92, 'G006', 'S010'),
(93, 'G009', 'S010'),
(94, 'G003', 'S011'),
(95, 'G005', 'S011'),
(96, 'G007', 'S011'),
(97, 'G009', 'S011'),
(98, 'G006', 'S012'),
(99, 'G013', 'S012'),
(100, 'G017', 'S012'),
(101, 'G018', 'S012'),
(102, 'G019', 'S012'),
(103, 'G001', 'S013'),
(104, 'G002', 'S013'),
(105, 'G003', 'S013'),
(106, 'G004', 'S013'),
(107, 'G005', 'S013'),
(108, 'G001', 'S014'),
(109, 'G002', 'S014'),
(110, 'G003', 'S014'),
(111, 'G004', 'S014'),
(112, 'G005', 'S014'),
(113, 'G012', 'S014'),
(114, 'G017', 'S014'),
(115, 'G018', 'S014'),
(116, 'G019', 'S014'),
(117, 'G010', 'S015'),
(118, 'G017', 'S015'),
(119, 'G018', 'S015'),
(120, 'G019', 'S015'),
(121, 'G034', 'S016'),
(122, 'G027', 'S017'),
(124, 'G008', 'S019'),
(128, 'G001', 'S021'),
(129, 'G002', 'S021'),
(130, 'G003', 'S021'),
(131, 'G001', 'S022'),
(132, 'G002', 'S022'),
(133, 'G001', 'S023'),
(134, 'G002', 'S023'),
(135, 'G006', 'S023'),
(136, 'G001', 'S024'),
(137, 'G003', 'S024'),
(138, 'G004', 'S024'),
(139, 'G005', 'S024');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` int(5) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(20) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Impeller'),
(2, 'Shaft'),
(3, 'Bearing'),
(4, 'Kopling'),
(5, 'Packing'),
(6, 'Bahan Pendukung'),
(7, 'Keseluruhan Bagian');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar_explicit`
--

CREATE TABLE IF NOT EXISTS `komentar_explicit` (
  `id_komentar_explicit` int(5) NOT NULL AUTO_INCREMENT,
  `id_explicit` int(5) NOT NULL,
  `id_pengguna` int(5) NOT NULL,
  `isi_komentar_explicit` text NOT NULL,
  `tgl_komentar` varchar(30) NOT NULL,
  PRIMARY KEY (`id_komentar_explicit`),
  KEY `id_explicit` (`id_explicit`),
  KEY `id_pengguna` (`id_pengguna`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data untuk tabel `komentar_explicit`
--

INSERT INTO `komentar_explicit` (`id_komentar_explicit`, `id_explicit`, `id_pengguna`, `isi_komentar_explicit`, `tgl_komentar`) VALUES
(11, 7, 1, 'kdkdd', '2016-06-01 1:44:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar_tacit`
--

CREATE TABLE IF NOT EXISTS `komentar_tacit` (
  `id_komentar_tacit` int(5) NOT NULL AUTO_INCREMENT,
  `id_tacit` int(5) NOT NULL,
  `id_pengguna` int(5) NOT NULL,
  `isi_komentar_tacit` text NOT NULL,
  `tgl_komentar` varchar(30) NOT NULL,
  PRIMARY KEY (`id_komentar_tacit`),
  KEY `id_tacit` (`id_tacit`),
  KEY `id_pengguna` (`id_pengguna`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data untuk tabel `komentar_tacit`
--

INSERT INTO `komentar_tacit` (`id_komentar_tacit`, `id_tacit`, `id_pengguna`, `isi_komentar_tacit`, `tgl_komentar`) VALUES
(22, 26, 1, 'postingan yang bagus', '2016-05-26 2:41:03'),
(23, 42, 1, 'lihat pinggiran ring', '2016-06-09 13:58:20'),
(24, 38, 1, 'khdkfkdhkfd', '2016-08-20 21:27:00'),
(25, 44, 1, 'jfkdjfkjdkf', '2016-09-02 20:16:41'),
(26, 44, 1, 'new', '2016-09-02 20:16:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `like_explicit`
--

CREATE TABLE IF NOT EXISTS `like_explicit` (
  `id_like_e` int(5) NOT NULL AUTO_INCREMENT,
  `id_explicit` int(5) NOT NULL,
  `id_pengguna` int(5) NOT NULL,
  `tgl_like` varchar(30) NOT NULL,
  PRIMARY KEY (`id_like_e`),
  KEY `id_explicit` (`id_explicit`),
  KEY `id_pengguna` (`id_pengguna`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `like_explicit`
--

INSERT INTO `like_explicit` (`id_like_e`, `id_explicit`, `id_pengguna`, `tgl_like`) VALUES
(2, 7, 10, '2016-05-27 0:05:18'),
(3, 9, 1, '2016-06-09 23:39:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `like_tacit`
--

CREATE TABLE IF NOT EXISTS `like_tacit` (
  `id_like` int(5) NOT NULL AUTO_INCREMENT,
  `id_tacit` int(5) NOT NULL,
  `id_pengguna` int(5) NOT NULL,
  `tgl_like` varchar(30) NOT NULL,
  PRIMARY KEY (`id_like`),
  KEY `id_tacit` (`id_tacit`),
  KEY `id_pengguna` (`id_pengguna`),
  KEY `id_tacit_2` (`id_tacit`),
  KEY `id_pengguna_2` (`id_pengguna`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=124 ;

--
-- Dumping data untuk tabel `like_tacit`
--

INSERT INTO `like_tacit` (`id_like`, `id_tacit`, `id_pengguna`, `tgl_like`) VALUES
(116, 28, 8, '2016-06-01 10:22:51'),
(118, 37, 1, '2016-06-01 22:15:03'),
(119, 37, 10, '2016-06-03 22:22:44'),
(120, 42, 1, '2016-06-09 13:58:40'),
(121, 42, 10, '2016-06-23 23:39:44'),
(123, 44, 1, '2016-09-04 12:40:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifikasi`
--

CREATE TABLE IF NOT EXISTS `notifikasi` (
  `id_notifikasi` int(11) NOT NULL AUTO_INCREMENT,
  `id_pengguna` int(5) NOT NULL,
  `id_penerima` int(5) NOT NULL,
  `id_posting` int(5) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `tgl_notif` varchar(30) NOT NULL,
  `status` varchar(5) NOT NULL,
  PRIMARY KEY (`id_notifikasi`),
  KEY `id_penerima` (`id_penerima`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=96 ;

--
-- Dumping data untuk tabel `notifikasi`
--

INSERT INTO `notifikasi` (`id_notifikasi`, `id_pengguna`, `id_penerima`, `id_posting`, `kategori`, `tgl_notif`, `status`) VALUES
(1, 0, 9, 26, 'v_tacit', '2016-05-26 2:36:31', 'Y'),
(2, 0, 1, 7, 'v_explicit', '2016-05-26 2:38:07', 'Y'),
(4, 1, 1, 7, 'explicit', '2016-05-26 2:39:36', 'N'),
(5, 1, 9, 26, 'tacit', '2016-05-26 2:41:03', 'Y'),
(7, 1, 1, 7, 'explicit', '2016-05-26 2:42:32', 'N'),
(8, 1, 9, 26, 'tacit', '2016-05-26 2:42:49', 'Y'),
(9, 1, 1, 7, 'explicit', '2016-05-26 2:45:44', 'N'),
(10, 0, 1, 0, 'reward', '2016-05-26 2:56:20', 'Y'),
(11, 0, 8, 29, 'v_tacit', '2016-05-26 23:43:17', 'Y'),
(12, 0, 8, 28, 'v_tacit', '2016-05-26 23:43:26', 'Y'),
(13, 10, 1, 7, 'like_e', '2016-05-27 0:05:18', 'Y'),
(14, 0, 1, 30, 'v_tacit', '2016-05-27 3:37:15', 'Y'),
(15, 0, 1, 31, 'v_tacit', '2016-05-27 3:39:22', 'Y'),
(16, 0, 1, 33, 'v_tacit', '2016-05-28 13:33:33', 'Y'),
(17, 0, 8, 34, 'v_tacit', '2016-05-28 14:52:02', 'Y'),
(43, 1, 1, 7, 'explicit', '2016-06-01 1:44:08', 'N'),
(44, 0, 1, 36, 'v_tacit', '2016-06-01 1:47:49', 'Y'),
(48, 10, 1, 36, 'like_t', '2016-06-01 4:28:31', 'Y'),
(50, 0, 1, 8, 'v_explicit', '2016-06-01 10:18:22', 'Y'),
(51, 0, 8, 0, 'reward', '2016-06-01 10:21:47', 'Y'),
(52, 8, 8, 28, 'like_t', '2016-06-01 10:22:51', 'N'),
(53, 8, 1, 36, 'like_t', '2016-06-01 10:24:21', 'Y'),
(54, 0, 8, 9, 'v_explicit', '2016-06-01 22:12:12', 'Y'),
(55, 0, 8, 25, 'v_tacit', '2016-06-01 22:12:21', 'Y'),
(57, 0, 9, 27, 'v_tacit', '2016-06-01 22:12:31', 'Y'),
(59, 1, 1, 37, 'like_t', '2016-06-01 22:15:03', 'N'),
(60, 10, 1, 37, 'like_t', '2016-06-03 22:22:44', 'Y'),
(61, 0, 1, 39, 'v_tacit', '2016-06-03 22:27:11', 'Y'),
(62, 0, 10, 40, 'v_tacit', '2016-06-06 1:25:01', 'Y'),
(63, 0, 1, 10, 'v_explicit', '2016-06-06 1:28:47', 'Y'),
(64, 0, 9, 42, 'v_tacit', '2016-06-09 13:56:57', 'Y'),
(65, 1, 9, 42, 'tacit', '2016-06-09 13:58:20', 'Y'),
(66, 1, 9, 42, 'like_t', '2016-06-09 13:58:40', 'Y'),
(67, 1, 8, 9, 'like_e', '2016-06-09 23:39:01', 'Y'),
(68, 10, 9, 42, 'like_t', '2016-06-23 23:39:44', 'N'),
(69, 10, 9, 42, 'tacit', '2016-06-23 23:43:18', 'N'),
(70, 0, 1, 38, 'v_tacit', '2016-06-23 23:50:41', 'Y'),
(71, 0, 1, 38, 'v_tacit', '2016-06-24 0:00:20', 'Y'),
(72, 0, 1, 38, 'v_tacit', '2016-06-24 0:00:34', 'Y'),
(74, 0, 1, 38, 'v_tacit', '2016-06-24 0:00:55', 'Y'),
(75, 0, 9, 42, 'v_tacit', '2016-06-24 0:29:04', 'N'),
(77, 0, 1, 38, 'v_tacit', '2016-06-24 0:46:55', 'Y'),
(83, 0, 9, 12, 'v_explicit', '2016-06-24 1:06:49', 'N'),
(86, 0, 1, 38, 'v_tacit', '2016-06-24 1:15:11', 'Y'),
(87, 0, 1, 11, 'v_explicit', '2016-06-24 1:16:19', 'Y'),
(88, 1, 1, 38, 'tacit', '2016-08-20 21:27:01', 'N'),
(90, 1, 1, 44, 'tacit', '2016-09-02 20:16:41', 'N'),
(91, 1, 1, 44, 'tacit', '2016-09-02 20:16:56', 'N'),
(93, 1, 1, 44, 'like_t', '2016-09-04 12:40:15', 'N'),
(94, 0, 1, 44, 'v_tacit', '2016-09-06 23:22:25', 'N');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengetahuan_explicit`
--

CREATE TABLE IF NOT EXISTS `pengetahuan_explicit` (
  `id_explicit` int(5) NOT NULL AUTO_INCREMENT,
  `id_pengguna` int(5) NOT NULL,
  `id_kategori` int(5) NOT NULL,
  `judul_explicit` text NOT NULL,
  `keterangan` text NOT NULL,
  `userfile` text NOT NULL,
  `tgl_post` varchar(30) NOT NULL,
  `validasi_explicit` int(1) NOT NULL DEFAULT '0',
  `like` int(5) NOT NULL,
  `bulan` varchar(2) NOT NULL,
  `tahun` int(4) NOT NULL,
  PRIMARY KEY (`id_explicit`),
  KEY `id_pengguna` (`id_pengguna`),
  KEY `id_kategori` (`id_kategori`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data untuk tabel `pengetahuan_explicit`
--

INSERT INTO `pengetahuan_explicit` (`id_explicit`, `id_pengguna`, `id_kategori`, `judul_explicit`, `keterangan`, `userfile`, `tgl_post`, `validasi_explicit`, `like`, `bulan`, `tahun`) VALUES
(7, 1, 1, 'Bagian-bagian pompa sentrifugal', '<p>berisi data bagian pompa sentrifugal</p>\r\n', 'Bagian pompa sentrifugal.docx', '2016-05-26 2:37:49', 1, 1, '05', 2016),
(8, 1, 1, 'SOP Pompa Sentrifugal', '<p>SOP Pompa Sentrifugal</p>\r\n', 'ANALISA PERFORMA POMPA SENTRIFUGAL.docx', '2016-06-01 10:17:57', 1, 0, '06', 2016),
(9, 8, 7, 'Analisa Pompa', '<p>SOP Pompa Sentrifugal</p>\r\n', '18. Deepwell-pump, Indonesian.pdf', '2016-06-01 22:11:42', 1, 1, '06', 2016),
(11, 1, 1, 'Tipe Kerusakan Impeller', '<p>Tipe dan Cara memperbaiki kerusakan bagian impeller</p>\r\n', 'mechanical_seal.pdf', '2016-06-13 23:49:40', 1, 0, '06', 2016),
(12, 9, 2, 'Memperbaiki Shaft Bengkok', '<p>Cara memperbaiki shaft yang bengkok</p>\r\n', 'mechanical_seal.pdf', '2016-06-14 0:00:20', 1, 0, '06', 2016);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengetahuan_tacit`
--

CREATE TABLE IF NOT EXISTS `pengetahuan_tacit` (
  `id_tacit` int(5) NOT NULL AUTO_INCREMENT,
  `id_pengguna` int(5) NOT NULL,
  `id_kategori` int(5) NOT NULL,
  `judul_tacit` text NOT NULL,
  `masalah` text NOT NULL,
  `solusi` text NOT NULL,
  `tgl_post` varchar(30) NOT NULL,
  `validasi_tacit` int(1) NOT NULL DEFAULT '0',
  `like` int(5) NOT NULL,
  `bulan` varchar(2) NOT NULL,
  `tahun` int(4) NOT NULL,
  PRIMARY KEY (`id_tacit`),
  KEY `id_pengguna` (`id_pengguna`),
  KEY `id_kategori` (`id_kategori`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data untuk tabel `pengetahuan_tacit`
--

INSERT INTO `pengetahuan_tacit` (`id_tacit`, `id_pengguna`, `id_kategori`, `judul_tacit`, `masalah`, `solusi`, `tgl_post`, `validasi_tacit`, `like`, `bulan`, `tahun`) VALUES
(25, 8, 7, 'Penyebab vacum pump MCB trip', '<p>Penyebab utama vakum pump tiba-tiba trip</p>\r\n', '<p>Hal tersebut disebabkan karena tiba-tiba arus yang digunakan untuk vacum pump bertambah secara tiba-tiba juga. Sebagai arahan, buka valve secara perlahan atau bertahap, mudah2an dengan cara ini MCB tidak akan trip. Jika pada posisi tertentu MCB trip, maka sudah dapat dipastikan ada perubahan kondisi sistem.</p>\r\n', '2016-05-26 2:30:21', 1, 0, '05', 2016),
(26, 9, 7, 'Balancing untuk impeller dan shaft', '<p>cara untuk balancing impeller dan shaft pada mesin pompa sentrifugal</p>\r\n', '<p>Mengembalikan seperti kondisi baru, yang paling penting clearence ring dengan wearing ring kelurusan poros, bearing, keutuhan impeller, balance rotor (impeller komplit) dan alignment. akan tak coba tulis agak mendetail.</p>\r\n', '2016-05-26 2:33:18', 1, 0, '05', 2016),
(27, 9, 7, 'Tahap sebelum membongkar pompa', '<p>Tahap-tahap yang dilakukan sebelum membongkar pompa</p>\r\n', '<p>1. Buka data kondisi atau pengukuran terakhir dan histori kebelakang.</p>\r\n\r\n<p>2. Ketahui gejala/penyebab dan hal-hal yang berkaitan dengan kerusakan pompa tersebut.</p>\r\n\r\n<p>3. Investigasi saat jalan atau minta dijalankan (jika memungkinkan) agar bisa men diagnosa kerusakan tersebut dengan cara:</p>\r\n\r\n<ol>\r\n	<li>Amati jika ada yang aneh,: bocor, getar, panas dll</li>\r\n	<li>Dengarkan : tidak normal, bunyi, dll</li>\r\n	<li>Feeling : rasakan panas sekali dll</li>\r\n	<li>Bau : ada bau aneh, minyak terbakar, bau dari cairan dalam pompa</li>\r\n	<li>Ukur : temperature bearing, vibrasi dll</li>\r\n	<li>Ukur input power /listrik mesin penggerak.</li>\r\n	<li>Analisa vibrasi ; misal gejala mislaignment, bearing rusak dll</li>\r\n</ol>\r\n\r\n<p>4. Ukur flow dan pressure<br />\r\nCatatan: jika telah menemukan dan menetukan penyakitnya, &nbsp;tentunya tidak harus melakukan semua tahap tersebut.</p>\r\n', '2016-05-26 23:37:56', 1, 0, '05', 2016),
(28, 8, 7, 'Urutan yang dilakukan saat membongkar pompa', '<p>Urutan dalam membongkar pompa sentrifugal</p>\r\n', '<ol>\r\n	<li>Check alignment coupling, apakah ada keausan, atau kekurangan / kesalahan grease</li>\r\n	<li>Visual check lub oil dan lub oil level</li>\r\n	<li>Bongkar pompa, check body gasket, dan seats</li>\r\n	<li>Visual check impeller dan casing wear rings. Juga check impeller dengan casing wear ring<br />\r\n	clearence, check impeller, volutes dan balance hole apakah buntu.</li>\r\n	<li>Check flush lines dan quench lines apakah ada internal corrosion atau buntu</li>\r\n	<li>Visual check kondisi dari gauge.</li>\r\n	<li>Check radial clearence dan end float di pompa/motor</li>\r\n	<li>Jalankan motor dan check untuk abnormal noise dan vibration</li>\r\n	<li>Jika motor tidak baik ,angkat motor dan repair.</li>\r\n</ol>\r\n', '2016-05-26 23:40:33', 1, 1, '05', 2016),
(29, 8, 5, 'Mendiagnosa Pompa dan Masalah Seal', '<p>Cara diagnosa pompa dan masalah seal pada kerusakan pompa sentrifugal</p>\r\n', '<p>Selama pompa sedang dalam perbaikan sangat disarankan secara seksama menganalisa/menguji setiap komponent. Recommended procedure/check list perlu disiapkan yang sesuai dengan pompa dan part-part sebelum pembongkaran di mulai. Sehingga dalam pembongkaran pengecekan komponen dapat langsung dilakukan dan dapat menentukan tindakan lanjutan.</p>\r\n', '2016-05-26 23:41:47', 1, 0, '05', 2016),
(37, 1, 1, 'Cara Alignment Pompa Jika Kopling Terjadi Floating', '<p>Memperbaiki alignment pompa jika kopling floating</p>\r\n', '<p>Coba alignment dengan metode reverse, buat alat bantu agar titik tunjuk dial jarum di shaft.</p>\r\n', '2016-06-01 22:05:51', 0, 2, '06', 2016),
(38, 1, 1, 'Material untuk Gland Packing pompa yang cocok', '<p>Material untuk Gland Packing pompa sentrifugal yang cocok</p>\r\n', '<p>bronze cukup baik. bahan shaft sleeve biasanya di buat dari bahan cukup keras dan licin agar tahan lama. memang pasti mengalami keausan oleh packing dan ini dikorbankan untuk melindungi shaft.</p>\r\n', '2016-06-01 22:08:00', 1, 0, '06', 2016),
(42, 9, 1, 'kerusakan turbo', '<p>turbin berjalan lambat</p>\r\n', '<p>perbaiki ring, cek ring</p>\r\n', '2016-06-09 13:56:02', 0, 2, '06', 2016),
(43, 9, 4, 'Tes123', '<p>kdjkjfkdkf</p>\r\n\r\n<p>&nbsp;</p>\r\n', '<p>vjkjkgfkjg</p>\r\n', '2016-07-19 20:56:16', 0, 0, '07', 2016),
(44, 1, 5, 'Packing sering bocor', '<p>bagian packing rod sering bocor<br />\r\n&nbsp;</p>\r\n', '<p>packing rod diganti dengan bahan PTFE teflon</p>\r\n', '2016-07-21 6:38:47', 1, 1, '07', 2016);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE IF NOT EXISTS `pengguna` (
  `id_pengguna` int(5) NOT NULL AUTO_INCREMENT,
  `no_badge` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` varchar(30) NOT NULL,
  `id_jabatan` int(5) NOT NULL,
  `hak_akses` int(5) NOT NULL DEFAULT '1',
  `userfile` varchar(100) NOT NULL DEFAULT 'no_photo.jpg',
  `password` varchar(50) NOT NULL,
  `poin` int(10) NOT NULL,
  PRIMARY KEY (`id_pengguna`),
  KEY `id_jabatan` (`id_jabatan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `no_badge`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `id_jabatan`, `hak_akses`, `userfile`, `password`, `poin`) VALUES
(1, '040668', 'Lantip Catur Kadiyanto', 'Laki-laki', 'Palembang', '1994-06-05', 2, 3, 'lantip.jpg', 'a0bae51a854b72338f3dc0fac5324934', 100),
(8, '931164', 'Kemal', 'Laki-laki', 'Bandung', '1989-06-09', 1, 2, 'no_photo.jpg', 'fc43884b70bec84572527b64c85993b0', 40),
(9, '080408', 'Ismit Rizal', 'Laki-laki', 'Palembang', '1980-05-07', 4, 1, 'no_photo.jpg', 'e2be1a765190b65b15e2054be34c0db8', 30),
(10, '130451', 'Tri Prabowo', 'Laki-laki', 'Palembang', '1977-05-09', 3, 4, 'no_photo.jpg', 'cf463c9033e2a7c8513084cc565dc137', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `revise`
--

CREATE TABLE IF NOT EXISTS `revise` (
  `id_revise` int(5) NOT NULL AUTO_INCREMENT,
  `id_solusi` varchar(5) NOT NULL,
  `revisi` text NOT NULL,
  `id_pengguna` int(5) NOT NULL,
  PRIMARY KEY (`id_revise`),
  KEY `id_solusi` (`id_solusi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `revise`
--

INSERT INTO `revise` (`id_revise`, `id_solusi`, `revisi`, `id_pengguna`) VALUES
(1, 'S022', 'ini baru', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `reward`
--

CREATE TABLE IF NOT EXISTS `reward` (
  `id_reward` int(5) NOT NULL AUTO_INCREMENT,
  `id_pengguna` int(5) NOT NULL,
  `reward` varchar(100) NOT NULL,
  `keterangan_reward` text NOT NULL,
  `tgl_reward` varchar(30) NOT NULL,
  PRIMARY KEY (`id_reward`),
  KEY `id_pengguna` (`id_pengguna`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `reward`
--

INSERT INTO `reward` (`id_reward`, `id_pengguna`, `reward`, `keterangan_reward`, `tgl_reward`) VALUES
(1, 1, 'Pena Mont Blanc', 'Pena Mont Blanc 1 item warna hitam', '2016-05-26 2:56:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat`
--

CREATE TABLE IF NOT EXISTS `riwayat` (
  `id_riwayat` int(11) NOT NULL AUTO_INCREMENT,
  `id_solusi` varchar(5) NOT NULL,
  `nama_solusi` text NOT NULL,
  `solusi_masalah` text NOT NULL,
  PRIMARY KEY (`id_riwayat`),
  KEY `id_solusi` (`id_solusi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `riwayat`
--

INSERT INTO `riwayat` (`id_riwayat`, `id_solusi`, `nama_solusi`, `solusi_masalah`) VALUES
(1, 'S022', 'Getaran yang tidak normal', '<ul>\r\n	<li>perikas kelurusan</li>\r\n	<li>periksa keseimbangan rotor</li>\r\n	<li>periksa roda gear</li>\r\n	<li>periksa kondisi pelumas roda gear</li>\r\n	<li>periksa dan ukur kebersihan rotor</li>\r\n	<li>ganti dengan bearing metal yang baru</li>\r\n	<li>perbaiki poros</li>\r\n</ul>\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `solusi`
--

CREATE TABLE IF NOT EXISTS `solusi` (
  `id_solusi` varchar(5) NOT NULL,
  `nama_solusi` text NOT NULL,
  `solusi_masalah` text NOT NULL,
  `validasi` int(1) NOT NULL DEFAULT '0',
  `urut` int(5) NOT NULL,
  `dilihat` int(5) NOT NULL,
  PRIMARY KEY (`id_solusi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `solusi`
--

INSERT INTO `solusi` (`id_solusi`, `nama_solusi`, `solusi_masalah`, `validasi`, `urut`, `dilihat`) VALUES
('S001', 'Deflektor bearing rusak', '<p>Ganti deflektor o-ring dengan yang baru</p>\r\n', 0, 1, 0),
('S002', 'Metal sleeve rusak', '<p>Ganti dengan metal sleeve yang baru</p>\r\n', 0, 2, 0),
('S003', 'Kontrol pasokan minyak tidak sesuai', '<p>Periksa pasokan minyak dari lubang bearing, kontrol pasokan minyak yang dialirkan, apabila pengontrol rusak, perbaiki kontrol pasokan tersebut.</p>\r\n', 0, 3, 1),
('S004', 'Kontrol tekanan tidak sesuai', '<p>Kontrol tekanan minyak, sesuaikan tekanan dengan sesuai standar.</p>\r\n', 0, 4, 0),
('S005', 'Masalah pada aliran minyak bearing', '<ul>\r\n	<li>Periksa ventilasi lubang uap pada bearing, apabila tersumbat bersihkan</li>\r\n	<li>Cek kondisi tekanan dan pasokan minyak, sesuaikan tekanan dan pasokan sesuai standar</li>\r\n</ul>\r\n', 0, 5, 1),
('S006', 'Bearing minyak bocor', '<ul>\r\n	<li>Ganti dektektor o-ring dengan yang baru</li>\r\n	<li>kontrol pasokan minyak dari lubang</li>\r\n	<li>kontrol tekanan minyak</li>\r\n	<li>periksa kuantitas dan suhu air pendingin</li>\r\n	<li>bersihkan pendingin</li>\r\n	<li>periksa ventilasi pada bantalan</li>\r\n	<li>ganti dengan sleeve metal yang baru</li>\r\n</ul>\r\n', 0, 6, 0),
('S007', 'Suhu bearing tinggi', '<ul>\r\n	<li>beri pasokan minyak</li>\r\n	<li>control tekanan minyak</li>\r\n	<li>periksa kualitas dan suhu air pendingin</li>\r\n	<li>ganti dengan minyak baru</li>\r\n	<li>periksa filter minyak</li>\r\n</ul>\r\n', 0, 7, 0),
('S008', 'Getaran yang tidak normal', '<ul>\r\n	<li>perikas kelurusan</li>\r\n	<li>periksa keseimbangan rotor</li>\r\n	<li>periksa roda gear</li>\r\n	<li>periksa kondisi pelumas roda gear</li>\r\n	<li>periksa dan ukur kebersihan rotor</li>\r\n	<li>ganti dengan bearing metal yang baru</li>\r\n	<li>perbaiki poros</li>\r\n</ul>\r\n', 0, 8, 0),
('S009', 'Kinerja pompa menurun', '<ul>\r\n	<li>tukar bagian pompa dalam dengan yang baru</li>\r\n	<li>ganti gasket yang baru</li>\r\n	<li>bongkar dan cek aliran air</li>\r\n	<li>bersihkan saringan hisap</li>\r\n</ul>\r\n', 0, 9, 0),
('S010', 'Kebocoran gland pada mechanical seal', '<ul>\r\n<li>bongkar mechanical seal dan cek pengaturan</li>\r\n<li>ganti deflector o-ring</li>\r\n</ul>\r\n', 0, 10, 10),
('S011', 'Kasus belum ada di database', 'Rekomendasi solusi belum tersedia', 1, 11, 1),
('S012', 'Bearing minyak bocor', '<ul>\r\n	<li>Ganti dektektor o-ring dengan yang baru</li>\r\n	<li>kontrol pasokan minyak dari lubang</li>\r\n	<li>kontrol tekanan minyak</li>\r\n	<li>periksa kuantitas dan suhu air pendingin</li>\r\n	<li>bersihkan pendingin</li>\r\n	<li>periksa ventilasi pada bantalan</li>\r\n	<li>ganti dengan sleeve metal yang baru</li>\r\n</ul>\r\n', 1, 12, 1),
('S013', 'Kasus belum ada di database', 'Rekomendasi solusi belum tersedia', 1, 13, 2),
('S014', 'Kasus belum ada di database', 'Rekomendasi solusi belum tersedia', 1, 14, 1),
('S015', 'Kasus belum ada di database', 'Rekomendasi solusi belum tersedia', 1, 15, 1),
('S016', 'Kasus belum ada di database', 'Rekomendasi solusi belum tersedia', 1, 16, 1),
('S017', 'Kasus belum ada di database', 'Rekomendasi solusi belum tersedia', 1, 17, 1),
('S019', 'Kinerja pompa menurun', '<ul>\r\n	<li>tukar bagian pompa dalam dengan yang baru</li>\r\n	<li>ganti gasket yang baru</li>\r\n	<li>bongkar dan cek aliran air</li>\r\n	<li>bersihkan saringan hisap</li>\r\n</ul>\r\n', 1, 19, 1),
('S021', 'Kasus belum ada di database', 'Rekomendasi solusi belum tersedia', 1, 21, 1),
('S022', 'Getaran yang tidak normal', '<p>solusiiii<br />\r\n&nbsp;</p>\r\n', 3, 22, 3),
('S023', 'Kasus belum ada di database', 'Rekomendasi solusi belum tersedia', 1, 23, 1),
('S024', 'Kasus belum ada di database', 'Rekomendasi solusi belum tersedia', 1, 24, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tmp_gejala`
--

CREATE TABLE IF NOT EXISTS `tmp_gejala` (
  `id_tmp_gejala` int(11) NOT NULL AUTO_INCREMENT,
  `id_gejala` varchar(5) NOT NULL,
  `id_pengguna` int(5) NOT NULL,
  PRIMARY KEY (`id_tmp_gejala`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=232 ;

--
-- Dumping data untuk tabel `tmp_gejala`
--

INSERT INTO `tmp_gejala` (`id_tmp_gejala`, `id_gejala`, `id_pengguna`) VALUES
(61, 'G001', 8),
(62, 'G002', 8),
(63, 'G003', 8),
(64, 'G004', 8),
(65, 'G005', 8),
(191, 'G001', 9),
(192, 'G002', 9),
(193, 'G003', 9),
(221, 'G001', 1),
(222, 'G003', 1),
(223, 'G004', 1),
(224, 'G005', 1),
(230, 'G001', 10),
(231, 'G002', 10);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `gejala`
--
ALTER TABLE `gejala`
  ADD CONSTRAINT `gejala_ibfk_1` FOREIGN KEY (`id_bagian`) REFERENCES `bagian_mesin` (`id_bagian`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kasus`
--
ALTER TABLE `kasus`
  ADD CONSTRAINT `kasus_ibfk_1` FOREIGN KEY (`id_solusi`) REFERENCES `solusi` (`id_solusi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kasus_ibfk_2` FOREIGN KEY (`id_gejala`) REFERENCES `gejala` (`id_gejala`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `komentar_explicit`
--
ALTER TABLE `komentar_explicit`
  ADD CONSTRAINT `komentar_explicit_ibfk_1` FOREIGN KEY (`id_explicit`) REFERENCES `pengetahuan_explicit` (`id_explicit`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `komentar_explicit_ibfk_2` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `komentar_tacit`
--
ALTER TABLE `komentar_tacit`
  ADD CONSTRAINT `komentar_tacit_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `komentar_tacit_ibfk_2` FOREIGN KEY (`id_tacit`) REFERENCES `pengetahuan_tacit` (`id_tacit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `like_explicit`
--
ALTER TABLE `like_explicit`
  ADD CONSTRAINT `like_explicit_ibfk_1` FOREIGN KEY (`id_explicit`) REFERENCES `pengetahuan_explicit` (`id_explicit`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `like_explicit_ibfk_2` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `like_tacit`
--
ALTER TABLE `like_tacit`
  ADD CONSTRAINT `like_tacit_ibfk_1` FOREIGN KEY (`id_tacit`) REFERENCES `pengetahuan_tacit` (`id_tacit`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `like_tacit_ibfk_2` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD CONSTRAINT `notifikasi_ibfk_1` FOREIGN KEY (`id_penerima`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengetahuan_explicit`
--
ALTER TABLE `pengetahuan_explicit`
  ADD CONSTRAINT `pengetahuan_explicit_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengetahuan_tacit`
--
ALTER TABLE `pengetahuan_tacit`
  ADD CONSTRAINT `pengetahuan_tacit_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pengetahuan_tacit_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD CONSTRAINT `pengguna_ibfk_1` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `revise`
--
ALTER TABLE `revise`
  ADD CONSTRAINT `revise_ibfk_1` FOREIGN KEY (`id_solusi`) REFERENCES `solusi` (`id_solusi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `reward`
--
ALTER TABLE `reward`
  ADD CONSTRAINT `reward_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `riwayat`
--
ALTER TABLE `riwayat`
  ADD CONSTRAINT `riwayat_ibfk_1` FOREIGN KEY (`id_solusi`) REFERENCES `solusi` (`id_solusi`) ON DELETE CASCADE ON UPDATE CASCADE;
