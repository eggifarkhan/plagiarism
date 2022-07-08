-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220706.f68e2cb82f
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Jul 2022 pada 15.49
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_plagiat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_Adm` varchar(10) NOT NULL,
  `Nama_Adm` varchar(100) NOT NULL,
  `Pass_Adm` varchar(100) NOT NULL,
  `Jabatan` varchar(30) NOT NULL,
  `Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil`
--

CREATE TABLE `hasil` (
  `Presentasi` int(11) NOT NULL,
  `Status` varchar(20) NOT NULL,
  `Nim_Hasil` varchar(20) DEFAULT NULL,
  `Id_Skripsi_Hasil` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `Nim` varchar(10) NOT NULL,
  `Nama` varchar(100) DEFAULT NULL,
  `Pass_Mahasiswa` varchar(100) NOT NULL,
  `Jurusan` varchar(30) NOT NULL,
  `Alamat` text NOT NULL,
  `No_tlp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `skripsi`
--

CREATE TABLE `skripsi` (
  `id_Skripsi` varchar(15) NOT NULL,
  `Penulis` varchar(100) NOT NULL,
  `File` varchar(100) NOT NULL,
  `Tahun` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_Adm`);

--
-- Indeks untuk tabel `hasil`
--
ALTER TABLE `hasil`
  ADD KEY `Nim_Hasil` (`Nim_Hasil`),
  ADD KEY `Id_Skripsi_Hasil` (`Id_Skripsi_Hasil`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`Nim`);

--
-- Indeks untuk tabel `skripsi`
--
ALTER TABLE `skripsi`
  ADD PRIMARY KEY (`id_Skripsi`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `hasil`
--
ALTER TABLE `hasil`
  ADD CONSTRAINT `hasil_ibfk_1` FOREIGN KEY (`Nim_Hasil`) REFERENCES `mahasiswa` (`Nim`),
  ADD CONSTRAINT `hasil_ibfk_2` FOREIGN KEY (`Id_Skripsi_Hasil`) REFERENCES `skripsi` (`id_Skripsi`);

--
-- Ketidakleluasaan untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`Nim`) REFERENCES `admin` (`id_Adm`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



