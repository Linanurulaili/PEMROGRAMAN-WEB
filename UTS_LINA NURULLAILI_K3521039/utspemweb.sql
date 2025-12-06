-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Okt 2022 pada 17.49
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `utspemweb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `ulangPassword` varchar(255) NOT NULL,
  `namaUsaha` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `golongan` enum('mikro','kecil','menengah') NOT NULL,
  `modal` text NOT NULL,
  `namaPemilik` varchar(255) NOT NULL,
  `tempatLahir` varchar(255) NOT NULL,
  `tanggalLahir` date NOT NULL,
  `nomorTelepon` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `scanKTP` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `scanNPWP` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `ulangPassword`, `namaUsaha`, `alamat`, `golongan`, `modal`, `namaPemilik`, `tempatLahir`, `tanggalLahir`, `nomorTelepon`, `email`, `scanKTP`, `scanNPWP`) VALUES
(4, 'admin', '$2y$10$XzCS3v1Qowzm7.2ZNnDwEuPEtMqtzjEvAUoIbNn90aR4rUJxtiFNa', '$2y$10$w973iElie0t9BMaaNSrKyuFMzR3qoIcwlUX.uZZl0DfRk0uSkotSq', 'kantor', 'widodaren ngawi', 'kecil', 'koperasi', 'Lina nurullaili', 'ngawi', '2022-10-30', '085755184900', 'linanurullaili@gmail.com', 'lina resmi.jpg', 'photo_2022-07-03_22-42-23.jpg'),
(5, 'linanrlly_', '$2y$10$qXVhLF0pxXiiLnmq0gWKo.ME7OK9g.fR.f0W4FNbfm/..BktLEcHW', '$2y$10$hQwZVzV1v1t2A4QTXE58Be3eFVob6gQfL7fU6HsZ1ezW4OcUAWAfG', 'kliinik', 'widodaren ngawi', 'kecil', 'bank', 'Lina nurullaili', 'ngawi', '2022-10-04', '085755184900', 'linanurullaili@student.uns.ac.id', '1.jpg', 'photo_2022-07-03_22-42-23.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
