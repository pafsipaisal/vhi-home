-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Mar 2020 pada 02.36
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bootcamp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `usernm` varchar(20) NOT NULL,
  `passwd` varchar(100) NOT NULL,
  `nm_lengkap` varchar(30) NOT NULL,
  `jns_kelamin` enum('L','P') NOT NULL DEFAULT 'L',
  `alamat_pengguna` varchar(100) NOT NULL,
  `email_pengguna` varchar(30) NOT NULL,
  `hp_pengguna` varchar(15) NOT NULL,
  `img_pengguna` varchar(100) NOT NULL,
  `status_pengguna` enum('Admin','Atasan') NOT NULL DEFAULT 'Admin',
  `blokir` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`usernm`, `passwd`, `nm_lengkap`, `jns_kelamin`, `alamat_pengguna`, `email_pengguna`, `hp_pengguna`, `img_pengguna`, `status_pengguna`, `blokir`) VALUES
('a', 'a', 'a', 'L', 'a', 'a', 'a', 'a', 'Admin', 'N'),
('admin', 'admin\r\n', 'Admin S.I.P FT Unma', 'L', 'Jln. Universitas Majalengka  No. 01  Majalengka', 'sipftunma@gmail.com', '081222333444', '610535admin.png', 'Admin', 'N');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `penulis` varchar(50) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `isi_berita` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id_berita`, `tanggal`, `penulis`, `gambar`, `isi_berita`) VALUES
(1, '2020-01-02', 'Reyna Indra Maulana', '', 'Ada Sesuatu Ada Sesuatu Sarjana Sarjana Sarjana Sarjana Sarjana');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ref_agama`
--

CREATE TABLE `ref_agama` (
  `id_agama` int(11) NOT NULL,
  `nama_agama` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ref_agama`
--

INSERT INTO `ref_agama` (`id_agama`, `nama_agama`) VALUES
(1, 'Islam'),
(2, 'Budha'),
(3, 'Hindu'),
(4, 'Katholik'),
(5, 'Protestan'),
(6, 'Konhutchu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tempat_wisata`
--

CREATE TABLE `tempat_wisata` (
  `id_wisata` int(11) NOT NULL,
  `nama_wisata` varchar(50) NOT NULL,
  `kategori` enum('Alam','Alam dan Buatan') NOT NULL,
  `penginapan` enum('Ada','Tidak Ada') NOT NULL,
  `oleh_oleh` enum('Ada','Tidak Ada') NOT NULL,
  `transportasi` enum('Ada','Tidak Ada') NOT NULL,
  `deskripsi_wisata` text NOT NULL,
  `tiket_masuk` int(11) NOT NULL,
  `kontak_wisata` varchar(12) NOT NULL,
  `alamat_wisata` varchar(100) NOT NULL,
  `latitude_wisata` varchar(25) NOT NULL,
  `langitude_wisata` varchar(25) NOT NULL,
  `gambar_wisata` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tempat_wisata`
--

INSERT INTO `tempat_wisata` (`id_wisata`, `nama_wisata`, `kategori`, `penginapan`, `oleh_oleh`, `transportasi`, `deskripsi_wisata`, `tiket_masuk`, `kontak_wisata`, `alamat_wisata`, `latitude_wisata`, `langitude_wisata`, `gambar_wisata`) VALUES
(1, 'mercury', 'Alam', 'Tidak Ada', 'Tidak Ada', 'Ada', 'Wisata alam yang menampilkan keindahan alam terasering', 10000, '085720903314', 'Blok Argapura', '-6.895062', '108.291115', 'Artboard 1-80.jpg'),
(8, 'Panyaweyan', 'Alam', 'Ada', 'Ada', 'Ada', 'Indanya Terasering Panyaweyan', 50000, '085720903314', 'Blok Argapura', '-6.886686', '108.303429', ''),
(9, 'a', 'Alam', 'Ada', 'Ada', 'Ada', 'a', 9, '9', 'a', '9', '9', ''),
(10, 'ba', 'Alam', 'Ada', 'Ada', 'Ada', 'ba', 90, '90', 'ba', '90', '90', '3.PNG'),
(11, 'hj', 'Alam', 'Ada', 'Ada', 'Ada', 'hj', 89, '89', 'hj', '89', '89', '_20191112_213701-rem');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `agama` int(11) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `level_user` enum('admin','client') NOT NULL,
  `status_user` enum('A','NA') NOT NULL,
  `gambar` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `nama`, `jk`, `agama`, `alamat`, `level_user`, `status_user`, `gambar`) VALUES
(1, 'admin', 'd41d8cd98f00b204e9800998ecf8427e', 'Adie', 'L', 1, 'Maja, Majalengka', 'admin', 'A', 'Artboard 1-80.jpg'),
(2, 'adie', 'd41d8cd98f00b204e9800998ecf8427e', 'Adie Iman Nurzaman', 'L', 1, 'Desa Anggrawati', 'admin', 'A', 'Capture.PNG'),
(11, 'leder', 'd41d8cd98f00b204e9800998ecf8427e', 'leder', 'L', 1, 'Maja', 'admin', 'A', ''),
(12, 'leder2', 'd41d8cd98f00b204e9800998ecf8427e', 'leder', 'L', 1, 'Maja', 'admin', 'A', 'american-express.png'),
(13, 'tes', '28b662d883b6d76fd96e4ddc5e9ba780', 'tes', 'L', 1, 'tes', 'admin', 'A', '1.PNG');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`usernm`);

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indeks untuk tabel `ref_agama`
--
ALTER TABLE `ref_agama`
  ADD PRIMARY KEY (`id_agama`);

--
-- Indeks untuk tabel `tempat_wisata`
--
ALTER TABLE `tempat_wisata`
  ADD PRIMARY KEY (`id_wisata`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `ref_agama`
--
ALTER TABLE `ref_agama`
  MODIFY `id_agama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tempat_wisata`
--
ALTER TABLE `tempat_wisata`
  MODIFY `id_wisata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
