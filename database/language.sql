-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Jan 2025 pada 04.15
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `language`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_kuis`
--

CREATE TABLE `hasil_kuis` (
  `ID_Hasil` int(11) NOT NULL,
  `ID_Pengguna` int(11) NOT NULL,
  `Skor` int(11) NOT NULL,
  `Tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kosakata`
--

CREATE TABLE `kosakata` (
  `ID_KosaKata` int(11) NOT NULL,
  `indonesia` varchar(255) NOT NULL,
  `arab` varchar(255) NOT NULL,
  `inggris` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kosakata`
--

INSERT INTO `kosakata` (`ID_KosaKata`, `indonesia`, `arab`, `inggris`) VALUES
(4, 'Saya', 'اَنَا', 'I'),
(5, 'Kamu (laki-laki)', 'اَنْتَ', 'you'),
(6, 'Kamu (perempuan)', 'اَنْتِ', 'you'),
(7, 'Dia', 'هُوَ', 'He');

-- --------------------------------------------------------

--
-- Struktur dari tabel `latihan`
--

CREATE TABLE `latihan` (
  `ID_Latihan` int(11) NOT NULL,
  `ID_KosaKata` int(11) NOT NULL,
  `Pertanyaan` varchar(255) NOT NULL,
  `Jawaban` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `ID_Pengguna` int(11) NOT NULL,
  `Nama` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`ID_Pengguna`, `Nama`, `Email`, `Password`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$08$200Z6ZZbp3RAEXoaWcMA6uJOFicwNZaqk4oDhqTUiFXFe63MG.Daa'),
(3, 'user', 'user@gmail.com', '$2y$08$200Z6ZZbp3RAEXoaWcMA6uJOFicwNZaqk4oDhqTUiFXFe63MG.Daa');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `hasil_kuis`
--
ALTER TABLE `hasil_kuis`
  ADD PRIMARY KEY (`ID_Hasil`),
  ADD KEY `ID_Pengguna` (`ID_Pengguna`);

--
-- Indeks untuk tabel `kosakata`
--
ALTER TABLE `kosakata`
  ADD PRIMARY KEY (`ID_KosaKata`);

--
-- Indeks untuk tabel `latihan`
--
ALTER TABLE `latihan`
  ADD PRIMARY KEY (`ID_Latihan`),
  ADD KEY `ID_KosaKata` (`ID_KosaKata`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`ID_Pengguna`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `hasil_kuis`
--
ALTER TABLE `hasil_kuis`
  MODIFY `ID_Hasil` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kosakata`
--
ALTER TABLE `kosakata`
  MODIFY `ID_KosaKata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `latihan`
--
ALTER TABLE `latihan`
  MODIFY `ID_Latihan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `ID_Pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `hasil_kuis`
--
ALTER TABLE `hasil_kuis`
  ADD CONSTRAINT `hasil_kuis_ibfk_1` FOREIGN KEY (`ID_Pengguna`) REFERENCES `pengguna` (`ID_Pengguna`);

--
-- Ketidakleluasaan untuk tabel `latihan`
--
ALTER TABLE `latihan`
  ADD CONSTRAINT `latihan_ibfk_1` FOREIGN KEY (`ID_KosaKata`) REFERENCES `kosakata` (`ID_KosaKata`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
