-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2019 at 02:45 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sistempakar`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(4) NOT NULL,
  `nama_admin` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `nama_admin`, `username`, `password`) VALUES
(1, 'Aswar Kasim', 'aswarkasim', '5f4dcc3b5aa765d61d8327deb882cf99'),
(2, 'Fatmawati', 'fate', '5f4dcc3b5aa765d61d8327deb882cf99'),
(3, 'ima', 'ima', '5f4dcc3b5aa765d61d8327deb882cf99');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gejala`
--

CREATE TABLE `tbl_gejala` (
  `kode_gejala` varchar(4) NOT NULL,
  `nama_gejala` varchar(200) NOT NULL,
  `tgl_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_gejala`
--

INSERT INTO `tbl_gejala` (`kode_gejala`, `nama_gejala`, `tgl_update`) VALUES
('G001', 'Demam', '2019-05-14 07:07:26'),
('G002', 'Keringat dingin dan menggigil', '2019-05-14 07:08:13'),
('G003', 'Sakit kepala', '2019-05-14 07:08:52'),
('G004', 'Mual dan muntah muntah', '2019-05-14 07:09:31'),
('G005', 'Gangguan Pernapasan', '2019-05-14 12:14:52'),
('G006', 'Anemia', '2019-05-14 12:16:38'),
('G007', 'Kehilangan Kesadaran', '2019-05-14 12:17:14'),
('G008', 'Nyeri pada persendian', '2019-05-14 12:17:54'),
('G009', 'Kejang', '2019-05-14 12:18:40'),
('G010', 'Kadar gula darah rendah', '2019-05-14 14:44:57'),
('G011', 'Diare terus menerus', '2019-05-14 12:19:39'),
('G012', 'Mengalami kegelisahan', '2019-05-14 13:33:01'),
('G013', 'Muntah-muntah', '2019-05-22 17:28:58'),
('G014', 'Gangguan Pernapasan', '2019-05-22 17:29:47'),
('G015', 'Anemia', '2019-05-22 17:30:07'),
('G016', 'Kehilangan Kesadaran', '2019-05-22 17:31:05'),
('G017', 'Nyeri pada persendian', '2019-05-22 17:31:18'),
('G018', 'Nyeri pada persendian', '2019-05-22 17:45:34'),
('G019', 'Kejang', '2019-05-22 17:45:56'),
('G020', 'Gangguan Pernapasan', '2019-05-22 17:51:46'),
('G021', 'Kehilangan Kesadaran', '2019-05-22 17:54:25'),
('G022', 'Kejang', '2019-05-22 17:54:52'),
('G023', 'Pendarahan', '2019-05-22 17:56:44'),
('G024', 'Anemia', '2019-05-22 17:57:31'),
('G025', 'Kehilangan Kesadaran', '2019-05-22 17:57:47'),
('G026', 'Kejang', '2019-05-22 17:58:02'),
('G027', 'Kadar gula darah rendah', '2019-05-22 17:58:26');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_knowledge`
--

CREATE TABLE `tbl_knowledge` (
  `id_know` int(5) NOT NULL,
  `gejala` varchar(4) NOT NULL,
  `pertanyaan` text NOT NULL,
  `is_yes` text NOT NULL,
  `is_no` text NOT NULL,
  `to_yes` varchar(6) NOT NULL,
  `to_no` varchar(6) NOT NULL,
  `tgl_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_knowledge`
--

INSERT INTO `tbl_knowledge` (`id_know`, `gejala`, `pertanyaan`, `is_yes`, `is_no`, `to_yes`, `to_no`, `tgl_update`) VALUES
(55, 'G001', 'Apakah suhu badan anda sering berada diatas rata dalam waktu tertentu?', 'Ya', 'Tidak', 'G002', 'Tidak ', '2019-05-14 13:34:43'),
(56, 'G002', 'Apakah tubuh anda terkadang merasakan dingin disertai dengan keringat', 'Ya', 'Tidak', 'G003', 'G013', '2019-05-22 17:36:09'),
(57, 'G003', 'Apakah anda merasakan nyeri dibagian kepala yang berlangsung dalam kurun waktu lama?', 'Ya', 'Tidak', 'G004', 'G020', '2019-05-22 18:15:50'),
(58, 'G004', 'Apa anda mengalami masalah pencernaan seperti mual dan muntah-muntah?', 'Ya', 'Tidak', 'G005', 'Tidak ', '2019-05-22 17:20:17'),
(59, 'G005', 'Apakah anda terkadang batuk saat menghirup udara sehingga aktifitas bernafas anda terganggu?', 'Ya', 'Tidak', 'G006', 'Tidak ', '2019-05-22 18:24:48'),
(60, 'G006', 'Apakah anda mudah kelelahan dan detak jantung anda cepat dikarenakan darah rendah?', 'Ya', 'Tidak', 'G007', 'Tidak ', '2019-05-22 18:25:24'),
(61, 'G007', 'Apakah terkadang penglihatan anda menjadi tidak jelas yang mengakibatkan kesadaran anda hilang (pingsan)?', 'Ya', 'Tidak', 'G008', 'Tidak ', '2019-05-22 18:25:43'),
(62, 'G008', 'Apaka anda merasakan sakit pada bagian tubuh yang menghubungkan tulang dengan tulang (persendian) saat anda bergerak', 'Ya', 'Tidak', 'G009', 'P05', '2019-05-22 18:37:28'),
(63, 'G009', 'Apakah anda seringkali merasakan gerakan tubuh yang tidak terkendali, bergetar, dan disertai hilangnya kesadaran (kejang)?', 'Ya', 'Tidak', 'G010', 'P05', '2019-05-22 18:37:46'),
(66, 'G010', 'Apakah anda merasa lemas dan mudah merasa lapar dikarenakan kadar gula darah yang rendah?', 'Ya', 'Tidak', 'G011', 'P05', '2019-05-22 18:38:04'),
(67, 'G011', 'Ketika anda buang air besar apakah dengan frekuensi yang tinggi, sulit ditahan, dan disertai tinja yang lembek dan berair?', 'Ya', 'Tidak', 'G012', 'P05', '2019-05-22 18:27:25'),
(68, 'G012', 'Apa anda merasakan rasa takut yang intens,berlebihan, terus-menerus yang membuat anda ingin melakukan sesuatu diluar batas nalar anda?', 'Ya', 'Tidak', 'P05', 'P05', '2019-05-14 14:42:34'),
(69, 'G013', 'Apa anda mengalami masalah pencernaan seperti mual dan muntah-muntah?	', 'Ya', 'Tidak', 'G014', 'Tidak ', '2019-05-22 17:34:10'),
(70, 'G014', 'Apakah anda terkadang batuk saat menghirup udara sehingga aktifitas bernafas anda terganggu?', 'Ya', 'Tidak', 'G015', 'Tidak ', '2019-05-22 17:38:12'),
(71, 'G015', 'Apakah anda mudah kelelahan dan detak jantung anda cepat dikarenakan darah rendah?', 'Ya', 'Tidak', 'G016', 'Tidak ', '2019-05-22 17:39:36'),
(72, 'G016', 'Apakah terkadang penglihatan anda menjadi tidak jelas yang mengakibatkan kesadaran anda hilang (pingsan)?', 'Ya', 'Tidak', 'G017', 'Tidak ', '2019-05-22 17:40:26'),
(73, 'G017', 'Apaka anda merasakan sakit pada bagian tubuh yang menghubungkan tulang dengan tulang (persendian) saat anda bergerak?', 'Ya', 'Tidak', 'P03', 'P03', '2019-05-22 17:42:08'),
(74, 'G018', 'Apaka anda merasakan sakit pada bagian tubuh yang menghubungkan tulang dengan tulang (persendian) saat anda bergerak?', 'Ya', 'Tidak', 'G019', 'Tidak ', '2019-05-22 17:48:19'),
(75, 'G019', 'Apakah anda seringkali merasakan gerakan tubuh yang tidak terkendali, bergetar, dan disertai hilangnya kesadaran (kejang)?', 'Ya', 'Tidak', 'P02', 'P02', '2019-05-22 17:49:34'),
(76, 'G021', 'Apakah terkadang penglihatan anda menjadi tidak jelas yang mengakibatkan kesadaran anda hilang (pingsan)?', 'Ya', 'Tidak', 'G022', 'Tidak ', '2019-05-22 18:43:30'),
(77, 'G022', 'Apakah anda seringkali merasakan gerakan tubuh yang tidak terkendali, bergetar, dan disertai hilangnya kesadaran (kejang)?', 'Ya', 'Tidak', 'G023', 'Tidak ', '2019-05-22 18:34:30'),
(78, 'G023', 'Apakah anda pernah mengalami pendarahan di area hidung?', 'Ya', 'Tidak', 'P01', 'G024', '2019-05-22 18:34:59'),
(79, 'G026', 'Apakah anda seringkali merasakan gerakan tubuh yang tidak terkendali, bergetar, dan disertai hilangnya kesadaran (kejang)?', 'Ya', 'Tidak', 'G027', 'P04', '2019-05-22 18:12:22'),
(80, 'G027', 'Apakah anda merasa lemas dan mudah merasa lapar dikarenakan kadar gula darah yang rendah?', 'Ya', 'Tidak', 'P04', 'P04', '2019-05-22 18:13:07'),
(81, 'G020', 'Apakah anda terkadang batuk saat menghirup udara sehingga aktifitas bernafas anda terganggu?', 'Ya', 'Tidak', 'G021', 'Tidak ', '2019-05-22 18:17:58'),
(82, 'G024', 'Apakah anda mudah kelelahan dan detak jantung anda cepat dikarenakan darah rendah?', 'Ya', 'Tidak', 'G027', 'Tidak ', '2019-05-22 18:31:46');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pasien`
--

CREATE TABLE `tbl_pasien` (
  `id_pasien` int(5) NOT NULL,
  `nama_pasien` varchar(200) NOT NULL,
  `username` varchar(50) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `hp` varchar(14) NOT NULL,
  `password` varchar(20) NOT NULL,
  `tgl_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penyakit`
--

CREATE TABLE `tbl_penyakit` (
  `kode_penyakit` varchar(4) NOT NULL,
  `nama_penyakit` varchar(200) NOT NULL,
  `deskripsi` text NOT NULL,
  `penyebab` text NOT NULL,
  `akibat` text NOT NULL,
  `penanganan` text NOT NULL,
  `link_video` text NOT NULL,
  `tgl_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_penyakit`
--

INSERT INTO `tbl_penyakit` (`kode_penyakit`, `nama_penyakit`, `deskripsi`, `penyebab`, `akibat`, `penanganan`, `link_video`, `tgl_update`) VALUES
('P01', 'MALARIA QUARTANA', '<p>Malaria quartana merupakan salah satu jenis malaria yang disebabkan oleh adanya plasmodium malariae. Jenis malara kuartana menjadi salah satu jenis malaria yang tingkat keparahannya bisa lebih besar dibandingkan dengan jenis malaria yang lain jika penanganannya tidak baik. Masa inkubasi yang terjadi pada malaria jneis quartana ini juga lebih lama dibandingkan dengan jenis malaria yang lain. Sebagai pengetahuan saja bahwa penyakit malaria ini sudah ada sejak zaman Yunani. Dahulu infeksi yang terjad pada malaria ini sangat mudah untuk diidap oleh seseorang&nbsp; namun seiring dengan peralanan jaman dan waktu lamakelamaan penyakit malaria sedikit menurun tingkat penyerangannya, walaupun pada saat ini malaria masih menjadi penyakit yang bisa menyumbangkan kematian pada seseorang dengan jumlah yang cukup besar.<br />\r\n&nbsp;</p>\r\n', '<p>disebabkan oleh adanya plasmodium malariae (jenis parasit)</p>\r\n', '<p>jika kondisi yang dialami sudah sangat parah, pasien atau penderita tersbeut bisa saja mengalami koma atau bisa saja mengalami kematian.<br />\r\n&nbsp;</p>\r\n', '<ol>\r\n	<li>Cara medis, Jika anda akan menggunakan cara medis berarti anda harus melakukan pengobatan oleh dokter, biasanya dalam pemberian obat dokter akan memberikan obat yang memiliki funsii untuk membunuh semua parasit yang ada kemudian akan memberikan obat yang bisa menyembuhka infeksi yang ada. Obat-bat yang biasanya dianjurkan oleh dokter untuk pengobatan malaria khususnya malaria quartana ialah seperti&nbsp; vaksin, Primakuin dll.</li>\r\n	<li>Cara Tradisional, Beberapa bahan tradisional tersebut ialah :Brotowali, temulawak dan kulit batang pala &ndash; Ketiga bahan ini jika dicampurkan akan menjadi ramuan yang sangat berkhasiat bagi tubuh khususnya untuk menyembuhan penyakit malaria ini. Cara pemanfaatnya sangat mudah yaitu hanya dengan merebus ketiga bahan ini secara bersamaan kemudian tunggu sampai mendidih setelah itu minum air rebusan ketiga bahan iini secara teratur</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n', 'https://www.youtube.com/watch?v=t-bQcsiDn1Y&t=271s  ', '2019-05-22 15:02:53'),
('P02', 'MALARIA TERSIANA RINGAN', '<p>Malaria tertiana adalah salah satu dari jenis-jenis malaria yang ada hubungannya dengan parasit bernama Plasmodium vivax. Parasit inilah yang pada umumnya menyebabkan adanya infeksi pada eritrosit muda di mana diameternya juga memang lebih besar ketimbang yang normal. Plasmodium vivax adalah protozoa parasit dan patogen manusia. P. vivax adalah salah satu dari empat spesies parasit malaria yang umumnya menyerang manusia. P. vivax dibawa oleh nyamuk Anopheles betina. Parasit Plasmodium vivax yang menyebabkan malaria vivax ini dapat bertahan dalam keadaan tidak aktif pada organ hati selama beberapa bulan atau tahun. Sehingga, malaria jenis ini dapat kambuh ketika parasit aktif kembali.</p>\r\n\r\n<p>malaria jenis ini dibedakan menjadi golongan yang ringan dan berat berdasarkan gejala dan cara penanganannya</p>\r\n', '<p>Malaria tertiana disebakan oleh Parasit Plasmodium vivax yang menyebabkan malaria ini dapat bertahan dalam keadaan tidak aktif pada organ hati selama beberapa bulan atau tahun. Sehingga, malaria jenis ini dapat kambuh ketika parasit aktif kembali.</p>\r\n\r\n<ol>\r\n	<li>Memiliki distribusi geografis terluas,mulai dari wilayah beriklim dingin, subtropik hingga daerah tropik.</li>\r\n	<li>Demam terjadi setiap 48 jam atau setiap hari ketiga, pada siang ataupun sore hari.&nbsp;</li>\r\n	<li>Masa inkubasi plasmodium vivax antara 12 sampai 17 haridan salah satu gejala adalah pembengkakan limpa atau splenomegali.</li>\r\n</ol>\r\n', '<ol>\r\n	<li>kesadaran menurun</li>\r\n	<li>kelemahan yang signifikan sehingga orang sulit berjalan</li>\r\n	<li>ketidakmampuan untuk makan</li>\r\n</ol>\r\n', '<p>Penanganan</p>\r\n\r\n<ol>\r\n	<li>Ringan : Pengobatan tahapan parasit dalam darah (dengan klorokuin atau ACT)&nbsp;</li>\r\n</ol>\r\n', 'https://youtu.be/-QFJWqVut-I ', '2019-05-22 15:53:17'),
('P03', 'MALARIA OVALE', '<p>Malaria ovale adalah jenis malaria paling ringan, disebabkan oleh parasit Plasmodium ovale. Masa inkubasinya sekitar 11-16 hari. Gejala<br />\r\nyang muncul hampir serupa dengan malaria tertiana dan kuartana, namun jauh lebih ringan. Selain itu, puncak demam juga lebih rendah. Bahkan, malaria ini bisa sembuh spontan tanpa pengobatan. pada malaria ovale disebabkan oleh gigitan nyamuk Anopheles betina.</p>\r\n', '<p>disebabkan oleh parasit Plasmodium ovale</p>\r\n', '<p>Dalam malaria ovale ini plasmodiumnya hanya menginfeksi sel darah merah yang masih muda atau yang bisa dikatakan masih belum matang, dalam malaria ovale ini juga tingkat parasit yang jumplahnya cukup sedikit dimana tingkat parasit ini terdapat dalam darah. Walaupun di dalam malasria ovale ini memiliki kondisi yang demikian namun jika dibandingkan dengan jenis malaria yang lain jneis malaria ovale ini masih termasuk dalam jenis malaria yang tidak berbahaya dibandingkan dengan yang lain.</p>\r\n', '<ol>\r\n	<li>pertama pengobatan malaria jenis ini adalah dengan kombinasi obat klorokuin dan primakuin. Sama seperti malaria falsiparum, jika setelah 3 hari mengonsumsi obat lini pertama tidak efektif maka akan dilanjutkan pengobatan ini kedua.</li>\r\n	<li>Pengobatan lini kedua dilanjutkan dengan peningkatan dosis primakuin</li>\r\n</ol>\r\n', 'https://youtu.be/t-bQcsiDn1Y ', '2019-05-22 15:07:00'),
('P04', 'MALARIA TERSIANA BERAT', '<p>Malaria tertiana adalah salah satu dari jenis-jenis malaria yang ada hubungannya dengan parasit bernama Plasmodium vivax. Parasit inilah yang pada umumnya menyebabkan adanya infeksi pada eritrosit muda di mana diameternya juga memang lebih besar ketimbang yang normal. Plasmodium vivax adalah protozoa parasit dan patogen manusia. P. vivax adalah salah satu dari empat spesies parasit malaria yang umumnya menyerang manusia. P. vivax dibawa oleh nyamuk Anopheles betina. Parasit Plasmodium vivax yang menyebabkan malaria vivax ini dapat bertahan dalam keadaan tidak aktif pada organ hati selama beberapa bulan atau tahun. Sehingga, malaria jenis ini dapat kambuh ketika parasit aktif kembali.</p>\r\n\r\n<p>malaria jenis ini dibedakan menjadi golongan yang ringan dan berat berdasarkan gejala dan cara penanganannya</p>\r\n', '<p>Malaria tertiana diakibatkan oleh Parasit Plasmodium vivax yang menyebabkan malaria ini dapat bertahan dalam keadaan tidak aktif pada organ hati selama beberapa bulan atau tahun. Sehingga, malaria jenis ini dapat kambuh ketika parasit aktif kembali.</p>\r\n\r\n<ol>\r\n	<li>Memiliki distribusi geografis terluas,mulai dari wilayah beriklim dingin, subtropik hingga daerah tropik.</li>\r\n	<li>Demam terjadi setiap 48 jam atau setiap hari ketiga, pada siang ataupun sore hari.&nbsp;</li>\r\n	<li>Masa inkubasi plasmodium vivax antara 12 sampai 17 haridan salah satu gejala adalah pembengkakan limpa atau splenomegali.</li>\r\n</ol>\r\n', '<ol>\r\n	<li>kejang yang terjadi terus menerus</li>\r\n	<li>gagal ginjal atau hemoglobin</li>\r\n	<li>adema paru</li>\r\n	<li>kejutan sirkulasi</li>\r\n</ol>\r\n', '<p>&nbsp;Penanganan</p>\r\n\r\n<ol>\r\n	<li>Berat : Pembersihan bentuk parasit dalam hati dengan primakuin. Primakuian adalah obat anti malaria yang paling terkenal didunia.</li>\r\n</ol>\r\n', 'https://youtu.be/-QFJWqVut-I    ', '2019-05-22 16:55:08'),
('P05', 'MALARIA TROPIKA', '<p>malaria tropika adalah 1 dari 4 jenis yang memang dianggap paling ganas dan mengerikan ketika bicara soal dampak, gejala dan komplikasinya. Malaria jenis tropika ini juga dinamakan dengan istilah malaria falciparum dan dikenal sebagai bentuk malaria paling berat sehingga memang cukup menakutkan. Apabila sedikit saja terlambat pengobatannya, penderita bakal mengalami risiko besar.</p>\r\n', '<p>penyebab utama dari malaria jenis tropika adalah parasit yang bernama Plasmodium falciparum di mana jenis malaria inilah yang paling sering terjadi komplikasi. Seluruh bentuk eritrosit juga diketahui diserang oleh malaria tropika berbeda dari jenis malaria tertiana yang hanya menyerang eritrosit muda.</p>\r\n\r\n<p>Plasmodium falciparum sendiri merupakan sebuah jenis parasit yang berbentuk cincin berukuran kecil yang diameternya saja hanya 1/3 diameter eritrosit pada umumnya. Namun plasmodium ini adalah yang satu-satunya mempunyai double chromatin atau 2 kromatin inti. Dalam siklus hidupnya, penularan malaria adalah lewat gigitan manusia dari manusia yang sudah terkena infeksi ke manusia yang sehat.</p>\r\n', '<ol>\r\n	<li>Malaria Tropika sifatnya akut, hanya tidak memiliki sifat kambuhan.</li>\r\n	<li>penyumbatan pada pembuluh darah Kapiler</li>\r\n	<li>Jika menyerang ke otak maka suplai darah ke otak akan terganggu, dan akibatnya bisa disebut Malaria Otak.</li>\r\n	<li>gagal ginjal</li>\r\n	<li>Meninggal dunia.</li>\r\n</ol>\r\n', '<ol>\r\n	<li>Pemberian obat Piperakuin hanya sekali saja disesuaikan dengan berat badan pasien.</li>\r\n	<li>Selain itu uji darah setiap minggunya agar tidak terserang malaria yang akut</li>\r\n	<li>Minum obat anti malaria sebagai obat pencegahan. Tersedia beberapa jenis obat anti malaria yang memiliki efektivitas dan mekanisme yang berbeda-beda untuk mencegah terjangkit Malaria. Terdapat jenis obat yang membutuhkan waktu cukup lama agar dapat berefek. Lakukanlah konsultasi ke dokter Anda beberapa minggu sebelum melakukan perjalanan ke daerah endemis Malaria.</li>\r\n	<li>Hindari tergigit nyamuk. Sebaiknya hindari bepergian pada senja dan malam hari untuk mencegah tergigit oleh nyamuk yang terinfeksi. Hal ini dikarenakan nyamuk anopheles lebih aktif pada malam hari.</li>\r\n	<li>Tidur dengan dilindungi kelambu.</li>\r\n	<li>Menggunakan celana dan pakaian yang berlengan panjang agar dapat dapat melindungi Anda.</li>\r\n	<li>Jangan lupakan lotion untuk mencegah gigitan nyamuk.</li>\r\n	<li>Gunakan Jaring-Jaring Pelapis Pintu dan Jendela</li>\r\n	<li>Gunakan AC karena nyamuk malaria tidak suka dengan ruangan yang terlalu dingin.</li>\r\n	<li>Bersihkan Semua Genangan Air</li>\r\n	<li>Perhatikan Kebersihan Lingkungan</li>\r\n	<li>Jangan Menggantung Baju di Tempat Terbuka</li>\r\n	<li>Pilih Baju Tidur Warna Cerah</li>\r\n	<li>Pertahankan Kondisi Tubuh Anda</li>\r\n	<li>Gunakan Tabir Surya Anti Nyamuk</li>\r\n	<li>Penuhi Kebutuhan Karbohidrat</li>\r\n	<li>&nbsp;Konsumsi Sumber Makanan Mengandung Protein Tinggi</li>\r\n	<li>Minum Air Jahe,Perasan Daun Pepaya, Madu</li>\r\n	<li>Makan Sumber Lemak Omega 3</li>\r\n</ol>\r\n', 'https://www.youtube.com/watch?v=KqECj8X141E  ', '2019-05-22 15:16:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tbl_gejala`
--
ALTER TABLE `tbl_gejala`
  ADD PRIMARY KEY (`kode_gejala`);

--
-- Indexes for table `tbl_knowledge`
--
ALTER TABLE `tbl_knowledge`
  ADD PRIMARY KEY (`id_know`);

--
-- Indexes for table `tbl_pasien`
--
ALTER TABLE `tbl_pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `tbl_penyakit`
--
ALTER TABLE `tbl_penyakit`
  ADD PRIMARY KEY (`kode_penyakit`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_knowledge`
--
ALTER TABLE `tbl_knowledge`
  MODIFY `id_know` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `tbl_pasien`
--
ALTER TABLE `tbl_pasien`
  MODIFY `id_pasien` int(5) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
