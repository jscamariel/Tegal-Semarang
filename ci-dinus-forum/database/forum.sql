-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2020 at 04:39 PM
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
  `gambar` varchar(50) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `gambar`, `judul`, `isi`, `timestamp`) VALUES
(1, '', 'COVID-19', 'Virus Berbahaya, mudah menular dan sebagainya', '2020-05-17 13:39:52');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `gambar` text NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `date` datetime NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `gambar`, `judul`, `isi`, `date`, `timestamp`) VALUES
(1, '', 'Seminar Python', 'Seminar mendapatkan sertifikat \r\nhtm 50k', '2020-05-20 08:00:00', '2020-05-17 15:34:39');

-- --------------------------------------------------------

--
-- Table structure for table `forum_elektro`
--

CREATE TABLE `forum_elektro` (
  `id_thread` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama_thread` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `isi_komentar` text NOT NULL,
  `status_komentar` varchar(2) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_elektro`
--

INSERT INTO `forum_elektro` (`id_thread`, `username`, `nama_thread`, `isi`, `isi_komentar`, `status_komentar`, `timestamp`) VALUES
(16, 'daniel', 'Arduino project', 'bikin robot keren tapi susah tapi keren sih', '', '', '2020-05-25 10:59:37'),
(17, 'daniel', 'Wireless and Mobile Computing', 'Lari pagi', '', '', '2020-05-25 10:59:47'),
(18, 'hehe', 'Jaringan Komputer', 'dasdsadas', '', '', '2020-05-25 11:00:28'),
(20, 'Ujang', 'Main main sama teknik Elektro', 'Teknik elektro ', '', '', '2020-05-25 11:09:08'),
(21, 'daniel', 'coba', 'dasdsadas', '', '', '2020-05-25 17:06:27'),
(22, 'hehe', 'Wireless vs Wired', 'Perbedaan', '', '', '2020-05-25 17:08:49'),
(23, 'Geraldo', 'Mikrotik', 'Kabel Mikrotik  Kabel Mikrotik  Kabel Mikrotik Kabel Mikrotik Kabel Mikrotik Kabel Mikrotik Kabel Mikrotik Kabel Mikrotik Kabel Mikrotik Kabel Mikrotik ', '', '', '2020-05-25 17:36:58');

-- --------------------------------------------------------

--
-- Table structure for table `forum_feb`
--

CREATE TABLE `forum_feb` (
  `id_thread` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama_thread` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_feb`
--

INSERT INTO `forum_feb` (`id_thread`, `username`, `nama_thread`, `isi`, `timestamp`) VALUES
(3, 'daniel', 'Investasi Sejak dini', 'coba dulu aja', '2020-05-25 12:51:04');

-- --------------------------------------------------------

--
-- Table structure for table `forum_fib`
--

CREATE TABLE `forum_fib` (
  `id_thread` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama_thread` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_fib`
--

INSERT INTO `forum_fib` (`id_thread`, `username`, `nama_thread`, `isi`, `timestamp`) VALUES
(4, 'daniel', 'Kebudayaan apa yang menarik menurut kalian?', 'Lari pagi', '2020-05-25 13:05:56');

-- --------------------------------------------------------

--
-- Table structure for table `forum_fik`
--

CREATE TABLE `forum_fik` (
  `id_thread` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama_thread` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_fik`
--

INSERT INTO `forum_fik` (`id_thread`, `username`, `nama_thread`, `isi`, `timestamp`) VALUES
(6, 'daniel', 'Koding php', 'PHP', '2020-05-25 12:47:43'),
(7, 'Ujang', 'REST api', 'REST (REpresentational State Transfer) merupakan standar arsitektur komunikasi berbasis web yang sering diterapkan dalam pengembangan layanan berbasis web. Umumnya menggunakan HTTP (Hypertext Transfer Protocol) sebagai protocol untuk komunikasi data. REST pertama kali diperkenalkan oleh Roy Fielding pada tahun 2000. Pada arsitektur REST, REST server menyediakan resources (sumber daya/data) dan REST client mengakses dan menampilkan resource tersebut untuk penggunaan selanjutnya. Setiap resource diidentifikasi oleh URIs (Universal Resource Identifiers) atau global ID. Resource tersebut direpresentasikan dalam bentuk format teks, JSON atau XML. Pada umumnya formatnya menggunakan JSON dan XML.', '2020-05-26 06:00:14');

-- --------------------------------------------------------

--
-- Table structure for table `forum_fkes`
--

CREATE TABLE `forum_fkes` (
  `id_thread` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama_thread` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_fkes`
--

INSERT INTO `forum_fkes` (`id_thread`, `username`, `nama_thread`, `isi`, `timestamp`) VALUES
(4, 'daniel', 'Covid-19', 'Virus berbahaya,mudah menular , berhati-hatilah', '2020-05-25 13:16:41'),
(5, 'hehe', 'Diet Simple Bkin kenyang', 'Ga usah diet, makan yang banyak biar kenyang', '2020-05-26 03:24:07');

-- --------------------------------------------------------

--
-- Table structure for table `forum_fotografi`
--

CREATE TABLE `forum_fotografi` (
  `id_thread` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama_thread` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_fotografi`
--

INSERT INTO `forum_fotografi` (`id_thread`, `username`, `nama_thread`, `isi`, `timestamp`) VALUES
(2, 'Ujang', 'Jenis Kamera Yang Bagus ', 'HP', '2020-05-25 14:13:37');

-- --------------------------------------------------------

--
-- Table structure for table `forum_game`
--

CREATE TABLE `forum_game` (
  `id_thread` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama_thread` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_game`
--

INSERT INTO `forum_game` (`id_thread`, `username`, `nama_thread`, `isi`, `timestamp`) VALUES
(3, 'Ujang', 'Dota 2', 'MMR Naik turun terus bos', '2020-05-25 14:17:38'),
(4, 'osvaldo', 'PUBG', 'Player Perang Tembak-tembakan', '2020-05-26 04:02:52');

-- --------------------------------------------------------

--
-- Table structure for table `forum_olahraga`
--

CREATE TABLE `forum_olahraga` (
  `id_thread` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama_thread` varchar(300) NOT NULL,
  `isi` text NOT NULL,
  `like` int(11) NOT NULL,
  `dislike` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_olahraga`
--

INSERT INTO `forum_olahraga` (`id_thread`, `username`, `nama_thread`, `isi`, `like`, `dislike`, `timestamp`) VALUES
(8, 'daniel', 'Olahraga ', 'Basket', 0, 0, '2020-05-25 13:21:56'),
(9, 'Ujang', 'Raket Badminton', 'Recomended', 0, 0, '2020-05-25 13:51:20');

-- --------------------------------------------------------

--
-- Table structure for table `forum_otomotif`
--

CREATE TABLE `forum_otomotif` (
  `id_thread` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama_thread` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_otomotif`
--

INSERT INTO `forum_otomotif` (`id_thread`, `username`, `nama_thread`, `isi`, `timestamp`) VALUES
(2, 'Ujang', 'Onderdil motor', 'Biar enak dipakai', '2020-05-25 13:52:39');

-- --------------------------------------------------------

--
-- Table structure for table `forum_pecintaalam`
--

CREATE TABLE `forum_pecintaalam` (
  `id_thread` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama_thread` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_pecintaalam`
--

INSERT INTO `forum_pecintaalam` (`id_thread`, `username`, `nama_thread`, `isi`, `timestamp`) VALUES
(2, 'Ujang', 'After Covid19', 'Liburan kuy ', '2020-05-25 13:59:41');

-- --------------------------------------------------------

--
-- Table structure for table `forum_pecintahewan`
--

CREATE TABLE `forum_pecintahewan` (
  `id_thread` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama_thread` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_pecintahewan`
--

INSERT INTO `forum_pecintahewan` (`id_thread`, `username`, `nama_thread`, `isi`, `timestamp`) VALUES
(2, 'Ujang', 'Anjing jenis apa Yang lucu', 'Kamu', '2020-05-25 14:03:43');

-- --------------------------------------------------------

--
-- Table structure for table `home`
--

CREATE TABLE `home` (
  `id_thread` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama_thread` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `home`
--

INSERT INTO `home` (`id_thread`, `username`, `nama_thread`, `isi`, `timestamp`) VALUES
(4, 'Ujang', 'Lagu apa yang asik', 'share dong', '2020-05-25 14:27:21'),
(5, 'daniel', 'Film apa yang asik ditonton', 'Share reviewnya dong, #WFH', '2020-05-25 14:27:53'),
(6, 'hehe', 'Curhat kuy', 'Ayo sini yang lagi patah hati, kita sedih bersama', '2020-05-25 14:38:37'),
(7, 'Geraldo', 'sharing is caring', 'share pengalaman kalian disini', '2020-05-25 17:35:04'),
(8, 'lala', 'aaa', 'aaa', '2020-06-06 07:02:33'),
(9, 'kauu', 'akhirnyaaa', 'akhirnyaaaa', '2020-06-06 13:19:26'),
(10, 'lala', 'LALALALALALALALAL', 'aku bukan boneka yang bisa kau suruh\" seenak hatimu', '2020-06-06 14:14:39');

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
  `gambar` varchar(128) NOT NULL DEFAULT 'default.jpg',
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `nim`, `email`, `slug`, `password`, `password_version`, `role_id`, `gambar`, `date_created`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', 'admin', '$2y$10$pTOSdWimwa0dUZZFQ.Np4uCX/P26MYEgLaUOLjctnWZeH7MZLDxv2', 0, 1, 'default.jpg', '2020-06-06 14:33:42'),
(2, 'daniel', '', 'daniell3119977@gmail.com', 'daniel', 'c2d7fbb56dc1fc54a735a83943b8bf6a7d0620154eaa6bf6848109f3e94afb92', 1, 0, '', '2020-06-05 13:54:40'),
(3, 'hehe', '', 'hehe@gmail.com', 'hehe', '6780950305b6dae90b4768292fb05b6cd86962e8cd9363635b0007645d5b76f2', 1, 0, '', '2020-06-05 13:54:40'),
(4, 'Ujang', '', 'ehujanggerimisaje@gmail.com', 'ujang', '987a925a6df8964df705d919ac35737dee62183373ab529515a35f35f2ee1b89', 1, 0, '', '2020-06-05 13:54:40'),
(5, 'Geraldo', '', 'geraldo@gmail.com', 'geraldo', 'e03e031e80238a1e389aec85e296d93654d67e982eda5b5e045f7dcd2c7e35f6', 1, 0, '', '2020-06-05 13:54:40'),
(6, 'hays', '', 'hays@gmail.com', 'hays', 'c0c33a0536e98ecc3ad7d8dd1544ee2406f0e3354d7c7c6918612c48daf15522', 1, 0, '', '2020-06-05 13:54:40'),
(7, 'osvaldo', '', 'osvaldo@gmail.com', 'osvaldo', 'f3f73a39bced74080849abc25f285af6383a2ad17cfe28fd55bc50d4666cab77', 1, 0, '', '2020-06-05 13:54:40'),
(29, 'lala', 'lala', 'lala@gmail.com', 'lala', '$2y$10$SURndWSRm1FDwUrHlcIpJOATQoRgR7QN/xC1a63vTyg0i2gZrACHS', 0, 2, 'default.jpg', '2020-06-06 13:21:11'),
(30, 'Kevin', 'A11.2017.10111', 'kevin@gmail.com', 'kevin', '$2y$10$bhgBOed4NL2GI5CrPPSKC.Z84D1AgbnhHqFCsqV8/0JTqwjqihFyO', 0, 2, 'default.jpg', '2020-06-06 14:30:06'),
(31, 'mariel', '', 'jessicaml866@gmail.com', 'mariel', 'a4153d012632dd2eab3207a24a1f9a450c9a67b429d954afabbc89e0570e6c04', 1, 0, '', '2020-06-05 13:54:40');

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
-- AUTO_INCREMENT for dumped tables
--

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
-- AUTO_INCREMENT for table `forum_elektro`
--
ALTER TABLE `forum_elektro`
  MODIFY `id_thread` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `forum_feb`
--
ALTER TABLE `forum_feb`
  MODIFY `id_thread` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `forum_fib`
--
ALTER TABLE `forum_fib`
  MODIFY `id_thread` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `forum_fik`
--
ALTER TABLE `forum_fik`
  MODIFY `id_thread` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `forum_fkes`
--
ALTER TABLE `forum_fkes`
  MODIFY `id_thread` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `forum_fotografi`
--
ALTER TABLE `forum_fotografi`
  MODIFY `id_thread` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `forum_game`
--
ALTER TABLE `forum_game`
  MODIFY `id_thread` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `forum_olahraga`
--
ALTER TABLE `forum_olahraga`
  MODIFY `id_thread` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `forum_otomotif`
--
ALTER TABLE `forum_otomotif`
  MODIFY `id_thread` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `forum_pecintaalam`
--
ALTER TABLE `forum_pecintaalam`
  MODIFY `id_thread` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `forum_pecintahewan`
--
ALTER TABLE `forum_pecintahewan`
  MODIFY `id_thread` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `home`
--
ALTER TABLE `home`
  MODIFY `id_thread` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `user_meta`
--
ALTER TABLE `user_meta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
