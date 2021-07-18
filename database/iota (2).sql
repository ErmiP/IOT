-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Jul 2021 pada 19.34
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iota`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_admin`
--

CREATE TABLE `tabel_admin` (
  `id_admin` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `foto` text NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `waktu_tambah` datetime NOT NULL,
  `waktu_edit` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_admin`
--

INSERT INTO `tabel_admin` (`id_admin`, `id_user`, `nama`, `foto`, `jenis_kelamin`, `waktu_tambah`, `waktu_edit`) VALUES
(2, 3, 'Peternak', '4d8f3e88246c3421e9afb4d2a08f55e7.jpg', 'Laki-Laki', '0000-00-00 00:00:00', '2021-06-04 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_input`
--

CREATE TABLE `tabel_input` (
  `id_ayam` int(11) NOT NULL,
  `sample_ayam` varchar(200) NOT NULL,
  `jenis_kandang` varchar(100) NOT NULL,
  `umur_ayam_awal` int(100) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tabel_input`
--

INSERT INTO `tabel_input` (`id_ayam`, `sample_ayam`, `jenis_kandang`, `umur_ayam_awal`, `tanggal_mulai`, `tanggal_selesai`, `status`) VALUES
(121, '1', 'Kandang 1', 1, '2021-07-16', '2021-07-16', 'Selesai'),
(125, '1', 'Kandang 2', 1, '2021-07-17', '2021-07-18', 'Selesai'),
(160, '3', 'Kandang 1', 15, '2021-07-18', NULL, 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_sensor`
--

CREATE TABLE `tabel_sensor` (
  `id` int(100) NOT NULL,
  `umur` int(10) NOT NULL,
  `suhu` float NOT NULL,
  `kelembapan` float NOT NULL,
  `kipas` float NOT NULL,
  `pompa` varchar(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tabel_sensor`
--

INSERT INTO `tabel_sensor` (`id`, `umur`, `suhu`, `kelembapan`, `kipas`, `pompa`, `tanggal`) VALUES
(1, 59, 22, 35, 96, 'mati', '2021-07-09 16:22:01'),
(2, 60, 22, 35, 96, 'mati', '2021-07-09 16:22:27'),
(3, 0, 0, 0, 0, '', '2021-07-09 16:22:34'),
(4, 61, 22, 35, 96, 'mati', '2021-07-09 16:22:53'),
(5, 62, 22, 35, 96, 'mati', '2021-07-09 16:23:20'),
(6, 63, 22, 35, 96, 'mati', '2021-07-09 16:23:46'),
(7, 64, 22, 35, 96, 'mati', '2021-07-09 16:24:12'),
(8, 65, 22, 35, 96, 'mati', '2021-07-09 16:24:38'),
(9, 66, 22, 35, 96, 'mati', '2021-07-09 16:25:05'),
(10, 67, 22, 35, 96, 'mati', '2021-07-09 16:25:31'),
(11, 68, 22, 35, 96, 'mati', '2021-07-09 16:25:57'),
(12, 69, 22, 35, 96, 'mati', '2021-07-09 16:26:24'),
(13, 70, 22, 35, 96, 'mati', '2021-07-09 16:26:50'),
(14, 71, 22, 35, 96, 'mati', '2021-07-09 16:27:16'),
(15, 72, 22, 35, 96, 'mati', '2021-07-09 16:27:42'),
(16, 73, 22, 35, 96, 'mati', '2021-07-09 16:28:09'),
(17, 74, 22, 35, 96, 'mati', '2021-07-09 16:28:35'),
(18, 75, 22, 35, 96, 'mati', '2021-07-09 16:29:01'),
(19, 76, 22, 35, 96, 'mati', '2021-07-09 16:29:27'),
(20, 77, 22, 35, 96, 'mati', '2021-07-09 16:29:54'),
(21, 78, 22, 35, 96, 'mati', '2021-07-09 16:30:20'),
(22, 79, 22, 35, 96, 'mati', '2021-07-09 16:30:46'),
(23, 80, 22, 35, 96, 'mati', '2021-07-09 16:31:13'),
(24, 81, 22, 35, 96, 'mati', '2021-07-09 16:31:39'),
(25, 82, 22, 35, 96, 'mati', '2021-07-09 16:32:05'),
(26, 83, 22, 35, 96, 'mati', '2021-07-09 16:32:32'),
(27, 84, 22, 35, 96, 'mati', '2021-07-09 16:32:58'),
(28, 85, 22, 35, 96, 'mati', '2021-07-09 16:33:24'),
(29, 86, 22, 35, 96, 'mati', '2021-07-09 16:33:51'),
(30, 87, 22, 35, 96, 'mati', '2021-07-09 16:34:17'),
(31, 88, 22, 35, 96, 'mati', '2021-07-09 16:34:43'),
(32, 89, 22, 35, 96, 'mati', '2021-07-09 16:35:10'),
(33, 90, 22, 35, 96, 'mati', '2021-07-09 16:35:36'),
(34, 91, 22, 35, 96, 'mati', '2021-07-09 16:36:02'),
(35, 92, 22, 35, 96, 'mati', '2021-07-09 16:36:29'),
(36, 93, 22, 35, 96, 'mati', '2021-07-09 16:36:55'),
(37, 94, 22, 35, 96, 'mati', '2021-07-09 16:37:21'),
(38, 95, 22, 35, 96, 'mati', '2021-07-09 16:37:47'),
(39, 96, 22, 35, 96, 'mati', '2021-07-09 16:38:14'),
(40, 97, 22, 35, 96, 'mati', '2021-07-09 16:38:40'),
(41, 98, 22, 35, 96, 'mati', '2021-07-09 16:39:06'),
(42, 99, 22, 35, 96, 'mati', '2021-07-09 16:39:33'),
(43, 100, 22, 35, 96, 'mati', '2021-07-09 16:39:59'),
(44, 101, 22, 35, 96, 'mati', '2021-07-09 16:40:25'),
(45, 102, 22, 35, 96, 'mati', '2021-07-09 16:40:51'),
(46, 103, 22, 35, 96, 'mati', '2021-07-09 16:41:18'),
(47, 104, 22, 35, 96, 'mati', '2021-07-09 16:41:44'),
(48, 105, 22, 35, 96, 'mati', '2021-07-09 16:42:10'),
(49, 106, 22, 35, 96, 'mati', '2021-07-09 16:42:37'),
(50, 107, 22, 35, 96, 'mati', '2021-07-09 16:43:03'),
(51, 108, 22, 35, 96, 'mati', '2021-07-09 16:43:30'),
(52, 109, 22, 35, 96, 'mati', '2021-07-09 16:43:56'),
(53, 110, 22, 35, 96, 'mati', '2021-07-09 16:44:22'),
(54, 111, 22, 35, 96, 'mati', '2021-07-09 16:44:49'),
(55, 112, 22, 35, 96, 'mati', '2021-07-09 16:45:15'),
(56, 113, 22, 35, 96, 'mati', '2021-07-09 16:45:41'),
(57, 114, 22, 35, 96, 'mati', '2021-07-09 16:46:07'),
(58, 115, 22, 35, 96, 'mati', '2021-07-09 16:46:34'),
(59, 116, 22, 35, 96, 'mati', '2021-07-09 16:47:00'),
(60, 117, 22, 35, 96, 'mati', '2021-07-09 16:47:26'),
(61, 118, 22, 35, 96, 'mati', '2021-07-09 16:47:53'),
(62, 119, 22, 35, 96, 'mati', '2021-07-09 16:48:19'),
(63, 120, 22, 35, 96, 'mati', '2021-07-09 16:48:46'),
(64, 121, 22, 35, 96, 'mati', '2021-07-09 16:49:12'),
(65, 122, 22, 35, 96, 'mati', '2021-07-09 16:49:38'),
(66, 123, 22, 35, 96, 'mati', '2021-07-09 16:50:05'),
(67, 124, 22, 35, 96, 'mati', '2021-07-09 16:50:31'),
(68, 125, 22, 35, 96, 'mati', '2021-07-09 16:50:57'),
(69, 126, 22, 35, 96, 'mati', '2021-07-09 16:51:23'),
(70, 127, 22, 35, 96, 'mati', '2021-07-09 16:51:50'),
(71, 128, 22, 35, 96, 'mati', '2021-07-09 16:52:16'),
(72, 129, 22, 35, 96, 'mati', '2021-07-09 16:52:43'),
(73, 130, 22, 35, 96, 'mati', '2021-07-09 16:53:09'),
(74, 131, 22, 35, 96, 'mati', '2021-07-09 16:53:35'),
(75, 132, 22, 35, 96, 'mati', '2021-07-09 16:54:02'),
(76, 133, 22, 35, 96, 'mati', '2021-07-09 16:54:28'),
(77, 134, 22, 35, 96, 'mati', '2021-07-09 16:54:54'),
(78, 135, 22, 35, 96, 'mati', '2021-07-09 16:55:20'),
(79, 136, 22, 35, 96, 'mati', '2021-07-09 16:55:47'),
(80, 137, 22, 35, 96, 'mati', '2021-07-09 16:56:13'),
(81, 138, 22, 35, 96, 'mati', '2021-07-09 16:56:40'),
(82, 139, 22, 35, 96, 'mati', '2021-07-09 16:57:06'),
(83, 140, 22, 35, 96, 'mati', '2021-07-09 16:57:33'),
(84, 89, 5, 6, 6, 'ON', '2021-07-10 17:29:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_user`
--

CREATE TABLE `tabel_user` (
  `id_user` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `level` enum('admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tabel_user`
--

INSERT INTO `tabel_user` (`id_user`, `username`, `password`, `level`) VALUES
(3, 'user', 'user', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `umur`
--

CREATE TABLE `umur` (
  `id` int(11) NOT NULL,
  `umur_sekarang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `umur`
--

INSERT INTO `umur` (`id`, `umur_sekarang`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tabel_admin`
--
ALTER TABLE `tabel_admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tabel_input`
--
ALTER TABLE `tabel_input`
  ADD PRIMARY KEY (`id_ayam`);

--
-- Indeks untuk tabel `tabel_sensor`
--
ALTER TABLE `tabel_sensor`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tabel_user`
--
ALTER TABLE `tabel_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `umur`
--
ALTER TABLE `umur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tabel_admin`
--
ALTER TABLE `tabel_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tabel_input`
--
ALTER TABLE `tabel_input`
  MODIFY `id_ayam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT untuk tabel `tabel_sensor`
--
ALTER TABLE `tabel_sensor`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT untuk tabel `tabel_user`
--
ALTER TABLE `tabel_user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `umur`
--
ALTER TABLE `umur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tabel_admin`
--
ALTER TABLE `tabel_admin`
  ADD CONSTRAINT `tabel_admin_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tabel_user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
