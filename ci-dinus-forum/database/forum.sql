-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2020 at 07:50 PM
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
(10, 'download1.png', 'Python', 'ular', '2020-06-08 12:59:59'),
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
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_elektro`
--

INSERT INTO `forum_elektro` (`id_thread`, `username`, `nama_thread`, `isi`, `gambar`, `isi_komentar`, `status_komentar`, `timestamp`) VALUES
(26, 'lala', 'Arduino project', 'bikin robot keren tapi susah tapi keren sih', '515b4656ce395f8a380000001.png', '', '', '2020-06-08 10:59:13'),
(27, 'lala', 'Mikrotik', 'main main sama kabel mikrotik', 'original.jpg', '', '', '2020-06-08 17:05:20');

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
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_feb`
--

INSERT INTO `forum_feb` (`id_thread`, `username`, `nama_thread`, `isi`, `gambar`, `timestamp`) VALUES
(4, 'banjaran', 'Mata Uang', 'uang punya mata?', 'mata-uang-tertinggi-Foto-Utama.jpg', '2020-06-07 17:54:17');

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
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_fik`
--

INSERT INTO `forum_fik` (`id_thread`, `username`, `nama_thread`, `isi`, `gambar`, `timestamp`) VALUES
(8, 'lala', 'Framework', 'Codeigniter v3', 'codeigniter.png', '2020-06-07 17:50:24');

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
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_olahraga`
--

INSERT INTO `forum_olahraga` (`id_thread`, `username`, `nama_thread`, `isi`, `gambar`, `like`, `dislike`, `timestamp`) VALUES
(10, 'banjaran', 'Badminton ', 'Dimana yA?', 'jadwal-turnamen-badminton-internasional-di-bulan-maret-2020.jpg', 0, 0, '2020-06-07 18:03:52');

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
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
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
  `username` varchar(100) NOT NULL,
  `nama_thread` varchar(255) NOT NULL,
  `isi_komentar` text NOT NULL,
  `status_komentar` varchar(2) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
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
(35, 'banjaran', 'a11', 'a11@gmail.com', 'banjaran', '$2y$10$oCdcp2z3IS9I0gQsQ76/z.3yqqJkV7g7734oRlKGd0I/Lk2pXx4sW', 0, 2, '6pRO4wZ.jpg', '2020-06-07 16:08:29');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `forum_elektro`
--
ALTER TABLE `forum_elektro`
  MODIFY `id_thread` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `forum_feb`
--
ALTER TABLE `forum_feb`
  MODIFY `id_thread` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `forum_fib`
--
ALTER TABLE `forum_fib`
  MODIFY `id_thread` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `forum_fik`
--
ALTER TABLE `forum_fik`
  MODIFY `id_thread` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  MODIFY `id_thread` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `forum_otomotif`
--
ALTER TABLE `forum_otomotif`
  MODIFY `id_thread` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
