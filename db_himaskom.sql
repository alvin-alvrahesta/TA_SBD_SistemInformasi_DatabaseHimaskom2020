-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Des 2020 pada 10.51
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_himaskom`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin1', '0192023a7bbd73250516f069df18b500'),
(2, 'admin2', '78e0d5058803a3d6481b946b5e7a2510');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bidang`
--

CREATE TABLE `tb_bidang` (
  `id_bidang` int(11) NOT NULL,
  `nama_bidang` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_bidang`
--

INSERT INTO `tb_bidang` (`id_bidang`, `nama_bidang`) VALUES
(1, 'PH'),
(2, 'Ekobis'),
(3, 'Kesma'),
(4, 'PSDM'),
(5, 'Infokom'),
(6, 'Sosial'),
(7, 'Ristek'),
(8, 'Mikatan'),
(21, 'PMO');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jabatan`
--

CREATE TABLE `tb_jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jabatan`
--

INSERT INTO `tb_jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(1, 'Ketua Bidang'),
(2, 'Wakil Ketua Bidang'),
(3, 'Sekretaris Bidang'),
(4, 'Bendahara Bidang'),
(5, 'Kepala Divisi'),
(6, 'Fungsionaris'),
(7, 'Staff');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mahasiswa`
--

CREATE TABLE `tb_mahasiswa` (
  `id_anggota` int(11) NOT NULL,
  `nama_anggota` varchar(25) NOT NULL,
  `nim` varchar(15) NOT NULL,
  `id_bidang` int(11) DEFAULT NULL,
  `id_jabatan` int(11) DEFAULT NULL,
  `no_hp` varchar(14) NOT NULL,
  `hobi` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_mahasiswa`
--

INSERT INTO `tb_mahasiswa` (`id_anggota`, `nama_anggota`, `nim`, `id_bidang`, `id_jabatan`, `no_hp`, `hobi`, `jenis_kelamin`) VALUES
(1, 'Alvin Arrazy', '21120118130055', 1, 1, '0987654321', 'Main, Menulis', 'Laki-laki'),
(2, 'Alvin Alvrahesta', '21120118120025', 1, 3, '0895360242060', 'Desain Grafis', 'Laki-laki'),
(3, 'Dewina Putri Firmani', '21120118120040', 1, 4, '085226235943', 'Masak', 'Perempuan'),
(4, 'Dzakwan Diego Pienthara', '21120118130104', 1, 2, '081327358401', 'Catur', 'Laki-laki'),
(5, 'Laksana Iqbal Utama', '21120118130068', 3, 1, '082241003442', 'Motoran', 'Laki-laki'),
(6, 'Azzah Afifah Veronica', '21120118130049', 3, 3, '085591229193', 'Makan', 'Perempuan'),
(7, 'Ichsan Arsyi Putra', '21120118120029', 2, 1, '085643413814', 'Desain', 'Laki-laki'),
(8, 'Kanzu Khairon Adli', '21120118130063', 2, 2, '081236157200', 'Main', 'Laki-laki'),
(9, 'Muhamad Taopik Gibran', '21120118130067', 3, 5, '089609068894', 'Hobi Baru', 'Laki-laki'),
(10, 'Zolan Devi Khoirunnisa', '21120118130048', 6, 1, '085876442038', 'Mantap', 'Laki-laki'),
(31, 'ASD ASD', '123', 3, 3, '321', 'ADS', 'Laki-laki'),
(32, 'AGG', '122', 2, 4, '122', 'AAAG', 'Laki-laki'),
(33, 'Ayunda Mita Aprilia', '21120118120027', 5, 3, '082220099116', 'Nyanyi', 'Perempuan'),
(38, 'BARU2', '123999', 8, 6, '321999', 'Hobi Baru', 'Laki-laki'),
(39, 'Daffa Shidqi H', '21120117130041', 21, 6, '081294146841', 'Acc Dong HEHE', 'Laki-laki'),
(41, 'Baru2', '2000', 4, 4, '0002', 'Acc Dong HEHE', 'Laki-laki'),
(42, 'Baru3', '3000', 7, 2, '0003', 'Mantap', 'Laki-laki'),
(43, 'Baru6', '2112066', 4, 3, '02112066', 'Gak Punya 2', 'Laki-laki'),
(46, 'ZZZZ GGGGG', '55566666', 7, 4, '08866666', 'Lari Lari', 'Laki-laki');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_proker`
--

CREATE TABLE `tb_proker` (
  `id_proker` int(11) NOT NULL,
  `nama_proker` varchar(50) NOT NULL,
  `tanggal_proker` date DEFAULT NULL,
  `id_bidang` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_proker`
--

INSERT INTO `tb_proker` (`id_proker`, `nama_proker`, `tanggal_proker`, `id_bidang`) VALUES
(1, 'Rapat Kerja', '2020-12-16', 1),
(2, 'Forum Lingkar Sekbend', '2020-06-16', 1),
(3, 'Seminar Karir', '2020-10-22', 3),
(4, 'The ACE', '2020-09-26', 7),
(5, 'Pengenalan Tekkom', '2020-10-10', 4),
(6, 'Training Rohis 1', '2020-12-22', 3),
(7, 'Training Rohis 2', '2020-12-26', 6),
(8, 'SPACE', '2020-12-27', 7),
(10, 'ECEG', '2020-11-14', 2),
(11, 'Leadership Training', '2020-11-05', 4),
(13, 'Sekolah', '2020-12-13', 1),
(15, 'Fund Raising', '2020-12-19', 5),
(16, 'The ACE Spesial', '2020-12-06', 8),
(18, 'Kunpan', '2020-12-06', 6),
(22, 'Lari 2', '2020-12-27', 21),
(23, 'Lari 3', '2020-12-27', 21),
(24, 'POR', '2020-12-16', 8),
(25, 'SOR', '2020-12-03', 7);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_bidang`
--
ALTER TABLE `tb_bidang`
  ADD PRIMARY KEY (`id_bidang`);

--
-- Indeks untuk tabel `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  ADD PRIMARY KEY (`id_anggota`),
  ADD KEY `id_bidang` (`id_bidang`),
  ADD KEY `id_jabatan` (`id_jabatan`);

--
-- Indeks untuk tabel `tb_proker`
--
ALTER TABLE `tb_proker`
  ADD PRIMARY KEY (`id_proker`),
  ADD KEY `id_bidang` (`id_bidang`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_bidang`
--
ALTER TABLE `tb_bidang`
  MODIFY `id_bidang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT untuk tabel `tb_proker`
--
ALTER TABLE `tb_proker`
  MODIFY `id_proker` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  ADD CONSTRAINT `tb_mahasiswa_ibfk_1` FOREIGN KEY (`id_jabatan`) REFERENCES `tb_jabatan` (`id_jabatan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_mahasiswa_ibfk_2` FOREIGN KEY (`id_bidang`) REFERENCES `tb_bidang` (`id_bidang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_proker`
--
ALTER TABLE `tb_proker`
  ADD CONSTRAINT `tb_proker_ibfk_1` FOREIGN KEY (`id_bidang`) REFERENCES `tb_bidang` (`id_bidang`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
