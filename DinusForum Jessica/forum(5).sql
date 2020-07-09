-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2020 at 08:47 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

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
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `gambar`, `judul`, `isi`, `timestamp`) VALUES
(8, 'http://192.168.100.6/ci-dinus-forum/assets/img/berita/Aplikasi_Terbaik_Untuk_Mencari_Suku_Cadang_mobil4.jpg', 'Maraknya Onderdil KW', 'bikin robot keren tapi susah tapi keren sih', '2020-06-08 07:30:07'),
(10, 'http://192.168.100.6/ci-dinus-forum/assets/img/berita/download1.png', 'Python', 'ular', '2020-06-08 12:59:59'),
(13, 'http://192.168.100.6/ci-dinus-forum/assets/img/berita/udinus.jpg', 'Dinus Inside', 'Dinus Inside', '2020-06-08 13:29:18');

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
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `gambar`, `judul`, `isi`, `date`, `time`, `timestamp`) VALUES
(7, 'download4.png', 'Seminar Pemrograman Python', 'Belajar Data Scients Menggunakan bahasa python', '2020-07-11', '12:30:00', '2020-06-08 10:15:50'),
(8, 'dslr-dpa-ae5662bbba7e5c58f34f8988b8d6850b_600x400.jpg', 'Seminar Fotografi ', 'Fotografi', '2020-07-09', '13:30:00', '2020-06-08 13:16:57'),
(9, 'udinus.jpg', 'Wisuda angkatan 2019/2020', 'wisuda bulan oktober', '2020-10-08', '09:33:00', '2020-06-08 15:33:21');

-- --------------------------------------------------------

--
-- Table structure for table `forum_elektro`
--

CREATE TABLE `forum_elektro` (
  `id_thread` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama_thread` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `isi_komentar` text NOT NULL,
  `status_komentar` varchar(2) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_elektro`
--

INSERT INTO `forum_elektro` (`id_thread`, `username`, `nama_thread`, `isi`, `gambar`, `isi_komentar`, `status_komentar`, `timestamp`) VALUES
(26, 'lala', 'Arduino project', 'bikin robot keren tapi susah tapi keren sih', 'http://192.168.100.6/ci-dinus-forum/assets/img/thread/elektro/515b4656ce395f8a380000001.png', '', '', '2020-06-08 10:59:13'),
(27, 'lala', 'Mikrotik', 'main main sama kabel mikrotik', 'http://192.168.100.6/ci-dinus-forum/assets/img/thread/elektro/original.jpg', '', '', '2020-06-08 17:05:20'),
(28, 'mariel', 'elektrik dirumah', 'elektrik penting bangetttt', 'http://192.168.100.6/ci-dinus-forum/assets/img/thread/elektro/Screenshot_(3).png', '', '', '2020-06-17 18:20:56'),
(36, 'mariel3', 'ini Ada percobaan yang ak sangat benci', 'kenapa ini susah ya Tuhan', 'http://192.168.100.6/ci-dinus-forum/assets/img/thread/home/5225z8y.jpg', '', '', '2020-07-04 14:21:59'),
(37, 'mariel4', 'Kali ini begitu adinda', 'Kali ini beda', 'http://192.168.100.6/ci-dinus-forum/assets/img/berita/download1.png', '', '', '2020-07-09 14:50:36');

-- --------------------------------------------------------

--
-- Table structure for table `forum_feb`
--

CREATE TABLE `forum_feb` (
  `id_thread` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama_thread` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_feb`
--

INSERT INTO `forum_feb` (`id_thread`, `username`, `nama_thread`, `isi`, `gambar`, `timestamp`) VALUES
(4, 'mariel4', 'Yamaha supra', 'dijual nih yg mau nego aja', 'android.graphics.drawable.BitmapDrawable@388cba1', '2020-07-09 10:18:01'),
(5, 'mariel4', 'lowongan akuntan', 'dicari perempuan pintar akutansi untuk membantu di toko Sukamaju', 'android.graphics.drawable.BitmapDrawable@7b8f0c4', '2020-07-09 08:19:28');

-- --------------------------------------------------------

--
-- Table structure for table `forum_fib`
--

CREATE TABLE `forum_fib` (
  `id_thread` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama_thread` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_fib`
--

INSERT INTO `forum_fib` (`id_thread`, `username`, `nama_thread`, `isi`, `gambar`, `timestamp`) VALUES
(6, 'banjaran', 'Wujud Budaya', 'Budaya Indonesia', 'Wujud-Budaya.jpg', '2020-06-07 17:59:25');

-- --------------------------------------------------------

--
-- Table structure for table `forum_fik`
--

CREATE TABLE `forum_fik` (
  `id_thread` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama_thread` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_fik`
--

INSERT INTO `forum_fik` (`id_thread`, `username`, `nama_thread`, `isi`, `gambar`, `timestamp`) VALUES
(8, 'lala', 'Framework', 'Codeigniter v3', 'codeigniter.png', '2020-06-07 17:50:24'),
(9, 'mariel4', 'stackoverflow', 'how to send activity to fragment', 'android.graphics.drawable.BitmapDrawable@6bea53f', '2020-07-09 09:55:49');

-- --------------------------------------------------------

--
-- Table structure for table `forum_fkes`
--

CREATE TABLE `forum_fkes` (
  `id_thread` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama_thread` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_fkes`
--

INSERT INTO `forum_fkes` (`id_thread`, `username`, `nama_thread`, `isi`, `gambar`, `timestamp`) VALUES
(6, 'banjaran', 'Sehat ', 'Mahal bro', 'images-1-5dba5e79097f36131f36a853.jpeg', '2020-06-07 18:01:39');

-- --------------------------------------------------------

--
-- Table structure for table `forum_fotografi`
--

CREATE TABLE `forum_fotografi` (
  `id_thread` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama_thread` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_fotografi`
--

INSERT INTO `forum_fotografi` (`id_thread`, `username`, `nama_thread`, `isi`, `gambar`, `timestamp`) VALUES
(3, 'banjaran', 'Kamera Yang 360', 'ya 360', 'dslr-dpa-ae5662bbba7e5c58f34f8988b8d6850b_600x400.jpg', '2020-06-07 18:15:24');

-- --------------------------------------------------------

--
-- Table structure for table `forum_game`
--

CREATE TABLE `forum_game` (
  `id_thread` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama_thread` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_game`
--

INSERT INTO `forum_game` (`id_thread`, `username`, `nama_thread`, `isi`, `gambar`, `timestamp`) VALUES
(5, 'banjaran', 'Arcana Ogre', 'kurang', 'original.jpg', '2020-06-07 18:14:17');

-- --------------------------------------------------------

--
-- Table structure for table `forum_olahraga`
--

CREATE TABLE `forum_olahraga` (
  `id_thread` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama_thread` varchar(300) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `like` int(11) NOT NULL,
  `dislike` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_olahraga`
--

INSERT INTO `forum_olahraga` (`id_thread`, `username`, `nama_thread`, `isi`, `gambar`, `like`, `dislike`, `timestamp`) VALUES
(10, 'banjaran', 'Badminton ', 'Dimana yA?', 'jadwal-turnamen-badminton-internasional-di-bulan-maret-2020.jpg', 0, 0, '2020-06-07 18:03:52'),
(11, 'mariel3', 'tenis banteng', 'blsblavvvd', '', 0, 0, '2020-06-30 08:13:52');

-- --------------------------------------------------------

--
-- Table structure for table `forum_otomotif`
--

CREATE TABLE `forum_otomotif` (
  `id_thread` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama_thread` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_otomotif`
--

INSERT INTO `forum_otomotif` (`id_thread`, `username`, `nama_thread`, `isi`, `gambar`, `timestamp`) VALUES
(3, 'banjaran', 'Onderdil motor', 'yang bagus apa', 'Aplikasi_Terbaik_Untuk_Mencari_Suku_Cadang_mobil.jpg', '2020-06-07 18:06:47');

-- --------------------------------------------------------

--
-- Table structure for table `forum_pecintaalam`
--

CREATE TABLE `forum_pecintaalam` (
  `id_thread` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama_thread` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_pecintaalam`
--

INSERT INTO `forum_pecintaalam` (`id_thread`, `username`, `nama_thread`, `isi`, `gambar`, `timestamp`) VALUES
(3, 'banjaran', 'Pantai Alam Indah', 'tegal punya', 'img_20180524045811_5b05e3f3427ca.jpg', '2020-06-07 18:12:02');

-- --------------------------------------------------------

--
-- Table structure for table `forum_pecintahewan`
--

CREATE TABLE `forum_pecintahewan` (
  `id_thread` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama_thread` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_pecintahewan`
--

INSERT INTO `forum_pecintahewan` (`id_thread`, `username`, `nama_thread`, `isi`, `gambar`, `timestamp`) VALUES
(3, 'banjaran', 'Anjing jenis apa Yang lucu', 'corgi', '29305PhoGal004.jpg', '2020-06-07 18:12:53');

-- --------------------------------------------------------

--
-- Table structure for table `home`
--

CREATE TABLE `home` (
  `id_thread` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama_thread` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(128) DEFAULT NULL,
  `gambar_profile` varchar(128) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `home`
--

INSERT INTO `home` (`id_thread`, `username`, `nama_thread`, `isi`, `gambar`, `gambar_profile`, `timestamp`) VALUES
(13, 'banjaran', 'Jaringan Komputer', 'coba coba coba coba terus', '5225z8y.jpg', '', '2020-06-07 16:44:37'),
(14, 'banjaran', 'Main-main sama arduino', 'asdas', 'futuristic-hd-wallpapers-For-Full-Resolution-Wallpaper.jpg', '', '2020-06-07 16:48:01'),
(15, 'lala', 'Ular', 'python', 'download.png', '', '2020-06-08 17:02:16');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(11) NOT NULL,
  `id_thread` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama_thread` varchar(255) NOT NULL,
  `isi_komentar` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `id_thread`, `user_id`, `username`, `nama_thread`, `isi_komentar`, `timestamp`) VALUES
(17, 26, 0, 'Haku', 'Arduino project', '321', '2020-06-16 07:09:15'),
(18, 27, 0, 'Haku', 'Mikrotik', '1123', '2020-06-16 07:09:31'),
(19, 28, 0, 'Haku', 'banjarn', 'sabenjaran', '2020-06-16 07:09:40'),
(20, 28, 0, 'Haku', 'banjarn', 'hiahahahaha', '2020-06-16 07:19:43'),
(21, 27, 0, 'lala', 'Mikrotik', 'kurang', '2020-06-16 07:24:45'),
(22, 26, 0, 'lala', 'Arduino project', '333', '2020-06-16 07:28:32'),
(23, 26, 0, 'lala', 'Arduino project', '32131', '2020-06-16 07:36:27'),
(24, 26, 0, 'Daniel', 'Arduino project', 'sing semangat lur', '2020-06-16 07:51:58'),
(40, 39, 0, 'lala', '312', '321', '2020-06-18 09:28:55'),
(41, 39, 0, 'Daniel', '312', '33', '2020-06-18 09:36:35'),
(42, 36, 0, 'mariel3', 'coba terus same lelah', 'ini percobaanku yang kesatu', '2020-07-04 14:21:25'),
(43, 35, 0, 'mariel3', 'coba terus same lelah', 'ini percobaan kedua bos', '2020-06-29 19:45:17'),
(44, 36, 0, 'username', 'thread', 'hai', '2020-07-04 14:24:13'),
(45, 37, 0, 'mariel4', 'haiii ban', 'haiiii', '2020-07-07 01:56:19'),
(46, 27, 0, 'mariel5', 'Mikrotik', 'buwung puyuh', '2020-07-07 05:56:05'),
(47, 37, 0, 'mariel4', 'Kali ini begitu', 'tes', '2020-07-07 06:15:22'),
(48, 26, 0, 'lala', 'Arduino project', 'namaku lala lala', '2020-07-08 17:13:32'),
(49, 26, 0, 'mariel4', 'Arduino project', 'aku mau link nya', '2020-07-08 17:38:34'),
(50, 37, 0, 'mariel4', 'Kali ini begitu', 'ini pie jal', '2020-07-08 19:05:12'),
(51, 8, 0, 'mariel4', 'Framework', 'CI susah bos', '2020-07-09 05:33:37'),
(52, 3, 0, 'mariel4', 'Onderdil motor', 'mau gan brp??', '2020-07-09 10:20:10'),
(53, 41, 0, 'mariel4', 'kabel UTP', '30 cm', '2020-07-09 14:52:14');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `nim` varchar(128) NOT NULL,
  `email` varchar(225) NOT NULL,
  `slug` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `password_version` tinyint(4) NOT NULL,
  `role_id` int(11) NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `nim`, `email`, `slug`, `password`, `password_version`, `role_id`, `gambar`, `date_created`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', 'admin', '$2y$10$pTOSdWimwa0dUZZFQ.Np4uCX/P26MYEgLaUOLjctnWZeH7MZLDxv2', 0, 1, 'default.jpg', '2020-06-06 14:33:42'),
(29, 'lala', 'lala', 'lala@gmail.com', 'lala', '$2y$10$SURndWSRm1FDwUrHlcIpJOATQoRgR7QN/xC1a63vTyg0i2gZrACHS', 0, 2, 'default.jpg', '2020-06-06 13:21:11'),
(30, 'Kevin', 'A11.2017.10111', 'kevin@gmail.com', 'kevin', '$2y$10$bhgBOed4NL2GI5CrPPSKC.Z84D1AgbnhHqFCsqV8/0JTqwjqihFyO', 0, 2, 'default.jpg', '2020-06-06 14:30:06'),
(33, 'aww', 'aww', 'aww@gmail.com', 'aww', '$2y$10$MPft7lrK4pTb8MzHfNMzrOV5vP6WnYxPa0bKSL.DzJSKqb9R36Rai', 0, 2, 'maxresdefault.jpg', '2020-06-07 11:11:08'),
(34, 'Haku', 'A11.2017.11111', 'haku@gmail.com', 'haku', '$2y$10$LVNSSZFDkLTrmXy3aXPgP.YbL1eD/eG8XpIz.XF28OFwoMlakxAxm', 0, 2, '3237149_01.jpg', '2020-06-07 13:31:57'),
(35, 'banjaran', 'a11', 'a11@gmail.com', 'banjaran', '$2y$10$oCdcp2z3IS9I0gQsQ76/z.3yqqJkV7g7734oRlKGd0I/Lk2pXx4sW', 0, 2, '6pRO4wZ.jpg', '2020-06-07 16:08:29'),
(36, 'mariel', 'A11.2017.10088', 'mariel@gmail.com', 'mariel', '$2y$10$PixWPXb3IMTPxWufnHwTjut/0.348R4e.1Jr7Pv/Vg1PEdy5Iau0O', 0, 2, 'Anthony.png', '2020-06-09 06:20:09'),
(37, 'mariel2', 'A11.2017.10082', 'mariel2@gmail.com', '', '$2y$10$DhOf.aQgGRjA4lpgU65Kn.Ugs3sYGGSjqkMHcT/QOzR16u6BrRdxy', 0, 0, '', '2020-06-17 02:48:18'),
(39, 'mariel3', 'Aaa', 'mariel3@gmail.com', '', '$2y$10$jlLsZhy5jpm3TYvxFRw7l.kAskdKWU1c4lrvfCojjbVwAQYayQPF6', 0, 0, '', '2020-06-17 18:18:26'),
(40, 'mariel4', 'A122222', 'mariel4@yahoo.com', '', '$2y$10$ctSOlTDJdyqtrNgj.mBj8.bEnPvC3eKAtHBQml9U3UhYteUDfy1hi', 0, 0, '', '2020-07-04 16:46:23'),
(41, 'mariel5', 'A1112585', 'mariel55@gmail.com', '', '$2y$10$qBXw0IUYis0UZWz6vLd/2epJFgX0L68zFQ6AHUfQ/2Ga7B4rIBoay', 0, 0, '', '2020-07-07 05:53:21'),
(42, 'laseduw', 'A11.2017.10093', 'laseduw@yahoo.com', '', '$2y$10$v7ug4SW8oUkwcWe7dl5huODnWYkFRw6qHysukzkoxWDeTDsamqImq', 0, 0, '', '2020-07-09 10:35:10'),
(43, 'laseduw2', 'A11.2017.10094', 'laseduw2@gmail.com', '', '$2y$10$47ivu5RNFbgN/ob4/LNHUOxEh7NDuRNv85nnRGc2eNc97LGXqPPQi', 0, 0, '', '2020-07-09 10:55:44'),
(44, 'laseduww', 'A11.2017.10099', 'laseduww@yahoo.com', '', '$2y$10$BNp4Vag69lPf4ihv.C00oOq/A294P2bJmHSjFbjAk.TYncLtQlQMO', 0, 0, '', '2020-07-09 11:11:26'),
(52, 'laseduwww', 'A11.2017.1234567', 'laseduwww@yahoo.com', '', '$2y$10$RSKhvE1TDsPTNW1OZhJYb.T8q1xRZui1bzzojPefaKFJ0KKE9WPJK', 0, 0, '', '2020-07-09 11:23:04'),
(55, 'laseduwa', 'A11.2017.12322551', 'laseduwa@gmail.com', '', '$2y$10$hygyfWyJKAJyHBHh/KetXuPb7JgyBZhvhE3Go0uMOsmm.FDmiuKjG', 0, 0, '', '2020-07-09 11:34:49'),
(56, 'laseduwb', 'A11.2017.10031', 'laseduwb@gmail.com', '', '$2y$10$0ALPR2vjFN81FEP4gE22veRU.Oo5oXduh23VKqIe0QJPb5BQMQXXO', 0, 0, '', '2020-07-09 11:38:46'),
(57, 'laseduwc', 'A11.2017.10032', 'laseduwc@gmail.com', '', '$2y$10$PkDGnvLJm8JlzKWfDCUQsuEWbP/uMLrybnxUojFMHMljonFNWh2m6', 0, 0, '', '2020-07-09 11:48:15'),
(58, 'laseduwd', 'A11.2017.100D', 'laseduwd@gmail.com', '', '$2y$10$6MxL6.sAl0cN1FiVVyE.dONLnJTPhFHS/68r0SrUpyiLsDZHJcAte', 0, 0, '', '2020-07-09 11:55:14');

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
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
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
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
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
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `forum_elektro`
--
ALTER TABLE `forum_elektro`
  MODIFY `id_thread` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `forum_feb`
--
ALTER TABLE `forum_feb`
  MODIFY `id_thread` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `forum_fib`
--
ALTER TABLE `forum_fib`
  MODIFY `id_thread` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `forum_fik`
--
ALTER TABLE `forum_fik`
  MODIFY `id_thread` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `forum_fkes`
--
ALTER TABLE `forum_fkes`
  MODIFY `id_thread` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `forum_fotografi`
--
ALTER TABLE `forum_fotografi`
  MODIFY `id_thread` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `forum_game`
--
ALTER TABLE `forum_game`
  MODIFY `id_thread` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `forum_olahraga`
--
ALTER TABLE `forum_olahraga`
  MODIFY `id_thread` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `forum_otomotif`
--
ALTER TABLE `forum_otomotif`
  MODIFY `id_thread` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `forum_pecintaalam`
--
ALTER TABLE `forum_pecintaalam`
  MODIFY `id_thread` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `forum_pecintahewan`
--
ALTER TABLE `forum_pecintahewan`
  MODIFY `id_thread` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `home`
--
ALTER TABLE `home`
  MODIFY `id_thread` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
