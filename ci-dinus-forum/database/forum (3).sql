-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2020 at 05:18 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `gambar`, `judul`, `isi`, `timestamp`) VALUES
(8, 'Aplikasi_Terbaik_Untuk_Mencari_Suku_Cadang_mobil4.jpg', 'Maraknya Onderdil KW', 'bikin robot keren tapi susah tapi keren sih', '2020-06-08 07:30:07'),
(13, 'udinus.jpg', 'Dinus Inside', 'Dinus Inside', '2020-06-08 13:29:18');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `gambar` text NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `gambar`, `judul`, `isi`, `date`, `time`, `timestamp`) VALUES
(7, 'download4.png', 'Seminar Pemrograman Python', 'Belajar Data Scients Menggunakan bahasa python', '2020-07-11', '12:30:00', '2020-06-08 10:15:50'),
(8, 'dslr-dpa-ae5662bbba7e5c58f34f8988b8d6850b_600x400.jpg', 'Seminar Fotografi ', 'Fotografi', '2020-07-09', '13:30:00', '2020-06-08 13:16:57');

-- --------------------------------------------------------

--
-- Table structure for table `forum_elektro`
--

CREATE TABLE `forum_elektro` (
  `id_thread` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama_thread` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `like` int(11) NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_elektro`
--

INSERT INTO `forum_elektro` (`id_thread`, `id_kategori`, `user_id`, `username`, `nama_thread`, `isi`, `like`, `gambar`, `timestamp`) VALUES
(51, 2, 36, 'Daniel', 'Mikrotik a', 'MikroTik is a Latvian network equipment manufacturer. The company develops and sells wired and wireless network routers, network switches, access points, as well as operating systems and auxiliary software.', 0, '321.jpg', '2020-07-07 04:31:23');

-- --------------------------------------------------------

--
-- Table structure for table `forum_feb`
--

CREATE TABLE `forum_feb` (
  `id_thread` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama_thread` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_feb`
--

INSERT INTO `forum_feb` (`id_thread`, `id_kategori`, `user_id`, `username`, `nama_thread`, `isi`, `gambar`, `timestamp`) VALUES
(7, 3, 36, 'Daniel', 'Mata Uang', 'uang punya mata? haaaa', 'mata-uang-tertinggi-Foto-Utama1.jpg', '2020-06-27 14:55:55');

-- --------------------------------------------------------

--
-- Table structure for table `forum_fib`
--

CREATE TABLE `forum_fib` (
  `id_thread` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama_thread` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_fib`
--

INSERT INTO `forum_fib` (`id_thread`, `id_kategori`, `user_id`, `username`, `nama_thread`, `isi`, `gambar`, `timestamp`) VALUES
(8, 4, 36, 'Daniel', 'Budaya Indonesia', 'beraneka ragam', 'Wujud-Budaya2.jpg', '2020-07-07 05:30:40');

-- --------------------------------------------------------

--
-- Table structure for table `forum_fik`
--

CREATE TABLE `forum_fik` (
  `id_thread` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama_thread` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_fik`
--

INSERT INTO `forum_fik` (`id_thread`, `id_kategori`, `user_id`, `username`, `nama_thread`, `isi`, `gambar`, `timestamp`) VALUES
(10, 5, 36, 'Daniel', 'Framework Web', 'Codeigniter v3', 'codeigniter2.png', '2020-06-27 14:46:23');

-- --------------------------------------------------------

--
-- Table structure for table `forum_fkes`
--

CREATE TABLE `forum_fkes` (
  `id_thread` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama_thread` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_fkes`
--

INSERT INTO `forum_fkes` (`id_thread`, `id_kategori`, `user_id`, `username`, `nama_thread`, `isi`, `gambar`, `timestamp`) VALUES
(9, 6, 36, 'Daniel', 'Covid-19', 'Berbahaya bukan konspirasi jerinx', 'images-1-5dba5e79097f36131f36a8533.jpeg', '2020-07-07 05:31:29');

-- --------------------------------------------------------

--
-- Table structure for table `forum_fotografi`
--

CREATE TABLE `forum_fotografi` (
  `id_thread` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama_thread` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_fotografi`
--

INSERT INTO `forum_fotografi` (`id_thread`, `id_kategori`, `user_id`, `username`, `nama_thread`, `isi`, `gambar`, `timestamp`) VALUES
(5, 11, 36, 'Daniel', 'Kamera ', 'Kamera yang bagus', 'dslr-dpa-ae5662bbba7e5c58f34f8988b8d6850b_600x4002.jpg', '2020-07-09 13:17:23');

-- --------------------------------------------------------

--
-- Table structure for table `forum_game`
--

CREATE TABLE `forum_game` (
  `id_thread` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama_thread` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_game`
--

INSERT INTO `forum_game` (`id_thread`, `id_kategori`, `user_id`, `username`, `nama_thread`, `isi`, `gambar`, `timestamp`) VALUES
(7, 12, 36, 'Daniel', 'Arcana Ogre Magi', 'Kurang menarik', 'original2.jpg', '2020-07-09 13:19:44');

-- --------------------------------------------------------

--
-- Table structure for table `forum_olahraga`
--

CREATE TABLE `forum_olahraga` (
  `id_thread` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama_thread` varchar(300) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `like` int(11) NOT NULL,
  `dislike` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_olahraga`
--

INSERT INTO `forum_olahraga` (`id_thread`, `id_kategori`, `user_id`, `username`, `nama_thread`, `isi`, `gambar`, `like`, `dislike`, `timestamp`) VALUES
(13, 7, 36, 'Daniel', 'Raket Badminton', 'yang bagus', 'jadwal-turnamen-badminton-internasional-di-bulan-maret-20203.jpg', 0, 0, '2020-07-09 13:00:52');

-- --------------------------------------------------------

--
-- Table structure for table `forum_otomotif`
--

CREATE TABLE `forum_otomotif` (
  `id_thread` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama_thread` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_otomotif`
--

INSERT INTO `forum_otomotif` (`id_thread`, `id_kategori`, `user_id`, `username`, `nama_thread`, `isi`, `gambar`, `timestamp`) VALUES
(5, 8, 36, 'Daniel', 'Sparepart motor', 'KW original', 'Aplikasi_Terbaik_Untuk_Mencari_Suku_Cadang_mobil2.jpg', '2020-07-09 13:06:24');

-- --------------------------------------------------------

--
-- Table structure for table `forum_pecintaalam`
--

CREATE TABLE `forum_pecintaalam` (
  `id_thread` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama_thread` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_pecintaalam`
--

INSERT INTO `forum_pecintaalam` (`id_thread`, `id_kategori`, `user_id`, `username`, `nama_thread`, `isi`, `gambar`, `timestamp`) VALUES
(5, 9, 36, 'Daniel', 'Pantai ', 'PAI tegal punya', 'img_20180524045811_5b05e3f3427ca2.jpg', '2020-07-09 13:12:29');

-- --------------------------------------------------------

--
-- Table structure for table `forum_pecintahewan`
--

CREATE TABLE `forum_pecintahewan` (
  `id_thread` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama_thread` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_pecintahewan`
--

INSERT INTO `forum_pecintahewan` (`id_thread`, `id_kategori`, `user_id`, `username`, `nama_thread`, `isi`, `gambar`, `timestamp`) VALUES
(5, 10, 36, 'Daniel', 'Anjing jenis apa Yang lucu', 'apa yah', '29305PhoGal0042.jpg', '2020-07-09 13:14:53');

-- --------------------------------------------------------

--
-- Table structure for table `home`
--

CREATE TABLE `home` (
  `id_thread` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama_thread` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(128) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `home`
--

INSERT INTO `home` (`id_thread`, `id_kategori`, `user_id`, `username`, `nama_thread`, `isi`, `gambar`, `timestamp`) VALUES
(22, 1, 36, 'Daniel', 'Anjing jenis apa Yang lucu', 'Corgi', '29305PhoGal0041.jpg', '2020-07-07 05:11:27'),
(25, 1, 36, 'Daniel', 'Share Modif motor', 'ayo a', 'Aplikasi_Terbaik_Untuk_Mencari_Suku_Cadang_mobil.jpg', '2020-07-09 13:51:57'),
(26, 1, 36, 'Daniel', 'Arduino project', 'coba coba coba coba terus', '515b4656ce395f8a380000001.png', '2020-07-09 13:52:15'),
(27, 1, 36, 'Daniel', 'Python', 'Bahasa pemrograman y bukan ular', 'download1.png', '2020-07-09 13:52:34'),
(28, 1, 36, 'Daniel', 'Pantai', 'PAI tegal punya ini ', 'img_20180524045811_5b05e3f3427ca.jpg', '2020-07-09 13:52:54'),
(29, 1, 36, 'Daniel', 'Covid-19', 'Berbahaya bukan konspirasi jerinx ea', 'images-1-5dba5e79097f36131f36a853.jpeg', '2020-07-09 13:53:12'),
(30, 1, 36, 'Daniel', 'Gambar animasi keren', 'Cakep', 'aeolian_shooting_by_wlop_d9ctyhy-fullview.jpg', '2020-07-09 13:53:52'),
(31, 1, 36, 'Daniel', 'Gambar', 'keren', 'jade_by_wlop_d9n5wvp-fullview.jpg', '2020-07-09 13:54:13'),
(32, 1, 36, 'Daniel', 'Wallpaper Desktop', 'Share wallpaper desktop kalian dong', 'wallhaven-q6g5zl.jpg', '2020-07-09 13:54:38'),
(33, 1, 36, 'Daniel', 'cakep juga nih buat wallpaper', 'mangtep', 'mumei-san.jpg', '2020-07-09 13:55:13'),
(34, 1, 36, 'Daniel', 'by WLOP', 'cakep dah artnya', 'ddtwqf5-4c734a7e-97b5-4895-8d94-113e821b805f.jpg', '2020-07-09 13:55:48');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(11) NOT NULL,
  `id_thread` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama_thread` varchar(255) NOT NULL,
  `isi_komentar` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `id_thread`, `id_kategori`, `user_id`, `username`, `nama_thread`, `isi_komentar`, `timestamp`) VALUES
(50, 48, 2, 35, 'banjaran', 'Arduino project', 'mantap a', '2020-06-27 12:02:01'),
(52, 20, 1, 36, 'Daniel', 'Mantap a', 'mantap a', '2020-06-27 14:37:39'),
(53, 10, 5, 36, 'Daniel', 'Framework Web', 'OOP', '2020-06-27 14:47:38'),
(55, 7, 3, 36, 'Daniel', 'Mata Uang', 'uang monopoli ', '2020-06-27 14:56:09'),
(58, 48, 2, 36, 'Daniel', 'Arduino project', '12312', '2020-06-30 07:54:43'),
(59, 49, 2, 36, 'Daniel', '321', 'Yihaaaa', '2020-07-06 15:33:37'),
(60, 48, 2, 36, 'Daniel', 'Arduino project', 'a', '2020-07-07 04:28:32'),
(61, 49, 2, 36, 'Daniel', '321', 'asd', '2020-07-07 04:28:45'),
(63, 51, 2, 36, 'Daniel', 'Mikrotik', 'Ntap', '2020-07-07 04:32:58'),
(64, 48, 2, 36, 'Daniel', 'Arduino project', '321', '2020-07-07 04:34:47'),
(65, 22, 1, 36, 'Daniel', 'Anjing jenis apa Yang lucu', 'lucu', '2020-07-07 05:12:54'),
(66, 51, 2, 36, 'Daniel', 'Mikrotik', 'oke', '2020-07-07 05:13:33'),
(67, 10, 5, 36, 'Daniel', 'Framework Web', 'PDO', '2020-07-07 05:22:44'),
(68, 7, 3, 36, 'Daniel', 'Mata Uang', 'A', '2020-07-07 05:29:25'),
(69, 8, 4, 36, 'Daniel', 'Budaya Indonesia', 'Tari jawa', '2020-07-07 05:35:22'),
(70, 9, 6, 36, 'Daniel', 'Covid-19', 'Bener tuh', '2020-07-07 05:38:41'),
(71, 51, 2, 36, 'Daniel', 'Mikrotik', 'coba', '2020-07-07 06:48:03'),
(72, 10, 7, 36, 'Daniel', 'Badminton ', 'fun', '2020-07-09 12:58:52'),
(73, 12, 7, 36, 'Daniel', 'Badminton', 'Fun', '2020-07-09 12:59:54'),
(74, 13, 7, 36, 'Daniel', 'Raket Badminton', 'Nais', '2020-07-09 13:01:01'),
(75, 5, 8, 36, 'Daniel', 'Sparepart motor', 'original', '2020-07-09 13:06:53'),
(76, 5, 9, 36, 'Daniel', 'Pantai ', 'cakep', '2020-07-09 13:22:04'),
(77, 5, 10, 36, 'Daniel', 'Anjing jenis apa Yang lucu', 'lucu yah', '2020-07-09 13:25:39'),
(78, 5, 11, 36, 'Daniel', 'Kamera ', 'Sony', '2020-07-09 13:27:51'),
(79, 7, 12, 36, 'Daniel', 'Arcana Ogre Magi', 'Iya nih bagusan invokernya', '2020-07-09 13:29:23');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'home'),
(2, 'forum_elektro'),
(3, 'forum_feb'),
(4, 'forum_fib'),
(5, 'forum_fik'),
(6, 'forum_fkes'),
(7, 'forum_olahraga'),
(8, 'forum_otomotif'),
(9, 'forum_pecintaalam'),
(10, 'forum_pecintahewan'),
(11, 'forum_fotografi'),
(12, 'forum_game');

-- --------------------------------------------------------

--
-- Table structure for table `tb_vote`
--

CREATE TABLE `tb_vote` (
  `id_vote` int(11) NOT NULL,
  `id_thread` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `nama_thread` varchar(255) NOT NULL,
  `liked` int(11) NOT NULL,
  `dislike` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_vote`
--

INSERT INTO `tb_vote` (`id_vote`, `id_thread`, `id_kategori`, `user_id`, `username`, `nama_thread`, `liked`, `dislike`, `timestamp`) VALUES
(67, 48, 2, 34, 'Haku', 'Arduino project', 1, 0, '2020-07-06 13:18:08'),
(68, 48, 2, 34, 'Haku', 'Arduino project', 1, 0, '2020-07-06 13:36:22'),
(148, 51, 2, 36, 'Daniel', 'Mikrotik', 1, 0, '2020-07-07 05:09:00'),
(149, 20, 1, 36, 'Daniel', 'Mantap a', 1, 0, '2020-07-07 05:09:13'),
(150, 10, 5, 36, 'Daniel', 'Framework Web', 1, 0, '2020-07-07 05:21:07'),
(151, 7, 3, 36, 'Daniel', 'Mata Uang', 1, 0, '2020-07-07 05:31:40'),
(152, 8, 4, 36, 'Daniel', 'Budaya Indonesia', 1, 0, '2020-07-07 05:34:59'),
(153, 9, 6, 36, 'Daniel', 'Covid-19', 1, 0, '2020-07-07 05:38:16'),
(154, 51, 2, 36, 'Daniel', 'Mikrotik', 1, 0, '2020-07-07 06:48:08'),
(155, 5, 8, 36, 'Daniel', 'Sparepart motor', 1, 0, '2020-07-09 13:07:41'),
(156, 5, 10, 36, 'Daniel', 'Anjing jenis apa Yang lucu', 1, 0, '2020-07-09 13:25:43'),
(157, 5, 11, 36, 'Daniel', 'Kamera ', 1, 0, '2020-07-09 13:27:53'),
(158, 7, 12, 36, 'Daniel', 'Arcana Ogre Magi', 1, 0, '2020-07-09 13:29:16');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `nim` varchar(128) NOT NULL,
  `email` varchar(225) NOT NULL,
  `slug` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `password_version` tinyint(4) NOT NULL,
  `role_id` int(11) NOT NULL,
  `gambar_profile` varchar(128) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `nim`, `email`, `slug`, `password`, `password_version`, `role_id`, `gambar_profile`, `date_created`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', 'admin', '$2y$10$pTOSdWimwa0dUZZFQ.Np4uCX/P26MYEgLaUOLjctnWZeH7MZLDxv2', 0, 1, 'default.jpg', '2020-06-06 14:33:42'),
(29, 'lala', 'lala', 'lala@gmail.com', 'lala', '$2y$10$SURndWSRm1FDwUrHlcIpJOATQoRgR7QN/xC1a63vTyg0i2gZrACHS', 0, 2, 'default.jpg', '2020-06-06 13:21:11'),
(34, 'Haku', 'A11.2017.11111', 'haku@gmail.com', 'haku', '$2y$10$LVNSSZFDkLTrmXy3aXPgP.YbL1eD/eG8XpIz.XF28OFwoMlakxAxm', 0, 2, '3237149_01.jpg', '2020-06-07 13:31:57'),
(35, 'banjaran', 'a11', 'a11@gmail.com', 'banjaran', '$2y$10$oCdcp2z3IS9I0gQsQ76/z.3yqqJkV7g7734oRlKGd0I/Lk2pXx4sW', 0, 2, '6pRO4wZ.jpg', '2020-06-07 16:08:29'),
(36, 'Daniel', 'A11.2017.10116', 'spacevt000@gmail.com', 'daniel', '$2y$10$Tfwu0hcc7GIZurgH2fFCJOfXM//SqozTWOZZA.lnkC198AUZnY/UK', 0, 2, 'download.png', '2020-06-16 14:51:26');

-- --------------------------------------------------------

--
-- Table structure for table `user_meta`
--

CREATE TABLE `user_meta` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `website` varchar(225) NOT NULL,
  `about` text CHARACTER SET utf8 NOT NULL,
  `avatar` varchar(128) NOT NULL DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_meta`
--

INSERT INTO `user_meta` (`id`, `user_id`, `website`, `about`, `avatar`) VALUES
(1, 1, '', 'halo aku orang', 'default1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `nim` varchar(30) NOT NULL,
  `email` varchar(128) NOT NULL,
  `about` text NOT NULL,
  `gambar` varchar(128) NOT NULL DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `role_id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`role_id`, `role`) VALUES
(1, 'administrator'),
(2, 'member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forum_elektro`
--
ALTER TABLE `forum_elektro`
  ADD PRIMARY KEY (`id_thread`);

--
-- Indexes for table `forum_feb`
--
ALTER TABLE `forum_feb`
  ADD PRIMARY KEY (`id_thread`);

--
-- Indexes for table `forum_fib`
--
ALTER TABLE `forum_fib`
  ADD PRIMARY KEY (`id_thread`);

--
-- Indexes for table `forum_fik`
--
ALTER TABLE `forum_fik`
  ADD PRIMARY KEY (`id_thread`);

--
-- Indexes for table `forum_fkes`
--
ALTER TABLE `forum_fkes`
  ADD PRIMARY KEY (`id_thread`);

--
-- Indexes for table `forum_fotografi`
--
ALTER TABLE `forum_fotografi`
  ADD PRIMARY KEY (`id_thread`);

--
-- Indexes for table `forum_game`
--
ALTER TABLE `forum_game`
  ADD PRIMARY KEY (`id_thread`);

--
-- Indexes for table `forum_olahraga`
--
ALTER TABLE `forum_olahraga`
  ADD PRIMARY KEY (`id_thread`);

--
-- Indexes for table `forum_otomotif`
--
ALTER TABLE `forum_otomotif`
  ADD PRIMARY KEY (`id_thread`);

--
-- Indexes for table `forum_pecintaalam`
--
ALTER TABLE `forum_pecintaalam`
  ADD PRIMARY KEY (`id_thread`);

--
-- Indexes for table `forum_pecintahewan`
--
ALTER TABLE `forum_pecintahewan`
  ADD PRIMARY KEY (`id_thread`);

--
-- Indexes for table `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`id_thread`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_vote`
--
ALTER TABLE `tb_vote`
  ADD PRIMARY KEY (`id_vote`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username_2` (`username`,`email`),
  ADD KEY `slug` (`slug`),
  ADD KEY `username` (`username`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `user_meta`
--
ALTER TABLE `user_meta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `forum_elektro`
--
ALTER TABLE `forum_elektro`
  MODIFY `id_thread` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `forum_feb`
--
ALTER TABLE `forum_feb`
  MODIFY `id_thread` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `forum_fib`
--
ALTER TABLE `forum_fib`
  MODIFY `id_thread` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `forum_fik`
--
ALTER TABLE `forum_fik`
  MODIFY `id_thread` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `forum_fkes`
--
ALTER TABLE `forum_fkes`
  MODIFY `id_thread` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `forum_fotografi`
--
ALTER TABLE `forum_fotografi`
  MODIFY `id_thread` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `forum_game`
--
ALTER TABLE `forum_game`
  MODIFY `id_thread` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `forum_olahraga`
--
ALTER TABLE `forum_olahraga`
  MODIFY `id_thread` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `forum_otomotif`
--
ALTER TABLE `forum_otomotif`
  MODIFY `id_thread` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `forum_pecintaalam`
--
ALTER TABLE `forum_pecintaalam`
  MODIFY `id_thread` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `forum_pecintahewan`
--
ALTER TABLE `forum_pecintahewan`
  MODIFY `id_thread` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `home`
--
ALTER TABLE `home`
  MODIFY `id_thread` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_vote`
--
ALTER TABLE `tb_vote`
  MODIFY `id_vote` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `user_meta`
--
ALTER TABLE `user_meta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
