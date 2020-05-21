-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2020 at 09:27 PM
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
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `password2` varchar(30) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `thn_angkatan` int(10) NOT NULL,
  `jurusan` varchar(70) NOT NULL,
  `username` varchar(70) NOT NULL,
  `is_user` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `is_confirmed` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `is_deleted` tinyint(1) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `date` datetime NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `judul`, `isi`, `date`, `gambar`, `timestamp`) VALUES
(1, 'COVID-19', 'Virus Berbahaya, mudah menular dan sebagainya', '0000-00-00 00:00:00', '', '2020-05-17 06:39:52');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `date` datetime NOT NULL,
  `gambar` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `judul`, `isi`, `date`, `gambar`, `timestamp`) VALUES
(1, 'Seminar Python', 'Seminar mendapatkan sertifikat \r\nhtm 50k', '2020-05-20 08:00:00', '', '2020-05-17 08:34:39');

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

CREATE TABLE `follow` (
  `id` bigint(11) NOT NULL,
  `source_id` int(11) NOT NULL,
  `target_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `forum_elektro`
--

CREATE TABLE `forum_elektro` (
  `id_thread` int(11) NOT NULL,
  `nama_thread` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_elektro`
--

INSERT INTO `forum_elektro` (`id_thread`, `nama_thread`, `isi`, `timestamp`) VALUES
(1, 'Pembelajaran Teknik Elektro', 'Arduino projek', '2020-05-17 03:04:22'),
(6, 'Jaringan Komputer', 'hari ini kita belajar jarkom...', '2020-05-21 19:20:25');

-- --------------------------------------------------------

--
-- Table structure for table `forum_feb`
--

CREATE TABLE `forum_feb` (
  `id_thread` int(11) NOT NULL,
  `nama_thread` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_feb`
--

INSERT INTO `forum_feb` (`id_thread`, `nama_thread`, `isi`, `timestamp`) VALUES
(1, 'Ekonomi melonjak', 'bisnis kuy hwhwhwhw', '2020-05-18 02:49:00');

-- --------------------------------------------------------

--
-- Table structure for table `forum_fib`
--

CREATE TABLE `forum_fib` (
  `id_thread` int(11) NOT NULL,
  `nama_thread` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_fib`
--

INSERT INTO `forum_fib` (`id_thread`, `nama_thread`, `isi`, `timestamp`) VALUES
(1, 'Adat budaya bali', 'Tari-tarian', '2020-05-18 03:02:52');

-- --------------------------------------------------------

--
-- Table structure for table `forum_fik`
--

CREATE TABLE `forum_fik` (
  `id_thread` int(11) NOT NULL,
  `nama_thread` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_fik`
--

INSERT INTO `forum_fik` (`id_thread`, `nama_thread`, `isi`, `timestamp`) VALUES
(1, 'Teknik Informatika', 'program apa', '2020-05-18 16:19:48');

-- --------------------------------------------------------

--
-- Table structure for table `forum_fkes`
--

CREATE TABLE `forum_fkes` (
  `id_thread` int(11) NOT NULL,
  `nama_thread` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_fkes`
--

INSERT INTO `forum_fkes` (`id_thread`, `nama_thread`, `isi`, `timestamp`) VALUES
(1, 'Covid-19', 'lagi musim corona bos, dirumah aja yang anteng jangan kemana-mana', '2020-05-18 03:02:29');

-- --------------------------------------------------------

--
-- Table structure for table `forum_fotografi`
--

CREATE TABLE `forum_fotografi` (
  `id_thread` int(11) NOT NULL,
  `nama_thread` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_fotografi`
--

INSERT INTO `forum_fotografi` (`id_thread`, `nama_thread`, `isi`, `timestamp`) VALUES
(1, 'Kameran buat foto ', 'Kamera apa yang bagus buat fotografi? HP?', '2020-05-18 03:36:41');

-- --------------------------------------------------------

--
-- Table structure for table `forum_game`
--

CREATE TABLE `forum_game` (
  `id_thread` int(11) NOT NULL,
  `nama_thread` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_game`
--

INSERT INTO `forum_game` (`id_thread`, `nama_thread`, `isi`, `timestamp`) VALUES
(1, 'Dota 2', 'The International 10 postponed', '2020-05-18 03:34:36');

-- --------------------------------------------------------

--
-- Table structure for table `forum_olahraga`
--

CREATE TABLE `forum_olahraga` (
  `id_thread` int(11) NOT NULL,
  `nama_thread` varchar(300) NOT NULL,
  `isi` text NOT NULL,
  `like` int(11) NOT NULL,
  `dislike` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_olahraga`
--

INSERT INTO `forum_olahraga` (`id_thread`, `nama_thread`, `isi`, `like`, `dislike`, `date`) VALUES
(2, '32asss', 'dsadada', 0, 0, '0000-00-00'),
(3, 'zzzzz', 'xxxx', 0, 0, '0000-00-00'),
(9, 'ini cadalah coba', 'aaaa', 0, 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `forum_otomotif`
--

CREATE TABLE `forum_otomotif` (
  `id_thread` int(11) NOT NULL,
  `nama_thread` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_otomotif`
--

INSERT INTO `forum_otomotif` (`id_thread`, `nama_thread`, `isi`, `timestamp`) VALUES
(1, 'Bengkel trusted', 'bengkel trusted ada di mana hayo', '2020-05-18 03:34:59');

-- --------------------------------------------------------

--
-- Table structure for table `forum_pecintaalam`
--

CREATE TABLE `forum_pecintaalam` (
  `id_thread` int(11) NOT NULL,
  `nama_thread` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_pecintaalam`
--

INSERT INTO `forum_pecintaalam` (`id_thread`, `nama_thread`, `isi`, `timestamp`) VALUES
(1, 'After Covid-19', 'pergilah ke alam liar biar happy', '2020-05-18 03:35:23');

-- --------------------------------------------------------

--
-- Table structure for table `forum_pecintahewan`
--

CREATE TABLE `forum_pecintahewan` (
  `id_thread` int(11) NOT NULL,
  `nama_thread` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_pecintahewan`
--

INSERT INTO `forum_pecintahewan` (`id_thread`, `nama_thread`, `isi`, `timestamp`) VALUES
(1, 'Pecinta anjing', 'anjing anjing apa yang lucu', '2020-05-18 03:36:05');

-- --------------------------------------------------------

--
-- Table structure for table `home`
--

CREATE TABLE `home` (
  `id_thread` int(11) NOT NULL,
  `nama_thread` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `home`
--

INSERT INTO `home` (`id_thread`, `nama_thread`, `isi`, `timestamp`) VALUES
(1, 'JUDUL', 'ISIISIISIISIISIISIISIISIISIISIISIISIISIISIISIISIISIISIISIISIISIISIISIISIISIISIISIISIISIISIISIISIISIISIISIISIISIISI', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tweet`
--

CREATE TABLE `tweet` (
  `id` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tweet` text CHARACTER SET utf8 NOT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `slug` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `password_version` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `slug`, `password`, `password_version`) VALUES
(1, 'mariel', 'jessicaml866@gmail.com', 'mariel', 'a4153d012632dd2eab3207a24a1f9a450c9a67b429d954afabbc89e0570e6c04', 1),
(2, 'devina', 'devina@gmail.com', 'devina', '8df19013e762eddad5267a5d671f0f3bc7327815ce0cb3744f3815ba5942b1a4', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_meta`
--

CREATE TABLE `user_meta` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `website` varchar(225) NOT NULL,
  `about` text CHARACTER SET utf8 NOT NULL,
  `avatar` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_meta`
--

INSERT INTO `user_meta` (`id`, `user_id`, `website`, `about`, `avatar`) VALUES
(1, 1, '', 'halo aku orang', 'default1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `follow`
--
ALTER TABLE `follow`
  ADD PRIMARY KEY (`id`),
  ADD KEY `source_id` (`source_id`),
  ADD KEY `target_id` (`target_id`);

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
-- Indexes for table `tweet`
--
ALTER TABLE `tweet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `follow`
--
ALTER TABLE `follow`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `forum_elektro`
--
ALTER TABLE `forum_elektro`
  MODIFY `id_thread` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `forum_feb`
--
ALTER TABLE `forum_feb`
  MODIFY `id_thread` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `forum_fib`
--
ALTER TABLE `forum_fib`
  MODIFY `id_thread` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `forum_fik`
--
ALTER TABLE `forum_fik`
  MODIFY `id_thread` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `forum_fkes`
--
ALTER TABLE `forum_fkes`
  MODIFY `id_thread` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `forum_fotografi`
--
ALTER TABLE `forum_fotografi`
  MODIFY `id_thread` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `forum_game`
--
ALTER TABLE `forum_game`
  MODIFY `id_thread` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `forum_olahraga`
--
ALTER TABLE `forum_olahraga`
  MODIFY `id_thread` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `forum_otomotif`
--
ALTER TABLE `forum_otomotif`
  MODIFY `id_thread` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `forum_pecintaalam`
--
ALTER TABLE `forum_pecintaalam`
  MODIFY `id_thread` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `forum_pecintahewan`
--
ALTER TABLE `forum_pecintahewan`
  MODIFY `id_thread` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `home`
--
ALTER TABLE `home`
  MODIFY `id_thread` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tweet`
--
ALTER TABLE `tweet`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_meta`
--
ALTER TABLE `user_meta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `follow`
--
ALTER TABLE `follow`
  ADD CONSTRAINT `follow_ibfk_1` FOREIGN KEY (`source_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `follow_ibfk_2` FOREIGN KEY (`target_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tweet`
--
ALTER TABLE `tweet`
  ADD CONSTRAINT `tweet_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_meta`
--
ALTER TABLE `user_meta`
  ADD CONSTRAINT `user_meta_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
