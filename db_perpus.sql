-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Feb 2022 pada 06.34
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `Id_Admin` int(11) NOT NULL,
  `Nama` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`Id_Admin`, `Nama`, `Email`, `Password`) VALUES
(1, 'Widianto', 'widilangit@gmail.com', 'widianto1404');

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `Id_Anggota` varchar(15) NOT NULL,
  `Nama` varchar(50) DEFAULT NULL,
  `Gender` enum('L','P') DEFAULT 'L',
  `NoHp` varchar(16) DEFAULT NULL,
  `Alamat` varchar(50) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `Password` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`Id_Anggota`, `Nama`, `Gender`, `NoHp`, `Alamat`, `Email`, `Password`) VALUES
('202201319954', 'Widi anto', 'L', '085718858795', 'Perum mandosi permai Jatiasih', 'widilangit@gmail.com', '12345'),
('202202259554', 'Bang Boy', 'L', '085694203781', 'Perum mandosi permai Jatiasih', 'widianto@gmail.com', 'widi1404');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `Id_Buku` int(11) NOT NULL,
  `Id_Kategori` int(11) DEFAULT NULL,
  `JudulBuku` varchar(50) DEFAULT NULL,
  `Pengarang` varchar(35) DEFAULT NULL,
  `Thn_Terbit` year(4) DEFAULT NULL,
  `penerbit` varchar(50) DEFAULT NULL,
  `Isbn` varchar(25) DEFAULT NULL,
  `Jumlah` int(11) DEFAULT NULL,
  `Lokasi` enum('Rak 1','Rak 2','Rak 3','Rak 4') DEFAULT NULL,
  `Gambar` varchar(255) DEFAULT NULL,
  `Tgl_Input` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`Id_Buku`, `Id_Kategori`, `JudulBuku`, `Pengarang`, `Thn_Terbit`, `penerbit`, `Isbn`, `Jumlah`, `Lokasi`, `Gambar`, `Tgl_Input`) VALUES
(3, 1, 'Pendidikan Agama Islam', 'Dede Rosyadi', 2008, 'Widianto', '43255366173', 3, 'Rak 2', 'foto1645840396.jpg', '2022-02-26'),
(4, 1, 'Dasar Fisika', 'Walker', 2019, 'Anto', '45637829002', 3, 'Rak 2', 'Gbr1642310263.jpg', '2022-01-16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `Id_Kategori` int(11) NOT NULL,
  `Kategori` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`Id_Kategori`, `Kategori`) VALUES
(1, 'Sains'),
(2, 'Hobby'),
(3, 'Komputer'),
(4, 'Komunikasi'),
(5, 'Hukum'),
(6, 'Agama'),
(7, 'Populer'),
(8, 'Bahasa'),
(9, 'Komik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `Id_Pijam` int(11) NOT NULL,
  `Id_Anggota` varchar(15) DEFAULT NULL,
  `Id_Buku` int(11) DEFAULT NULL,
  `Tgl_pinjam` date DEFAULT NULL,
  `Tgl_Kembali` date DEFAULT NULL,
  `Denda` int(11) DEFAULT NULL,
  `Total_Denda` int(11) DEFAULT NULL,
  `Status` enum('Y','N') DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `Id_pijam` int(5) NOT NULL,
  `Id_Anggota` varchar(15) DEFAULT NULL,
  `Id_Buku` int(11) DEFAULT NULL,
  `Tgl_Pinjam` date DEFAULT NULL,
  `Denda` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id_Admin`);

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`Id_Anggota`);

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`Id_Buku`),
  ADD KEY `Id_Kategori` (`Id_Kategori`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`Id_Kategori`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`Id_Pijam`),
  ADD KEY `Id_Anggota` (`Id_Anggota`),
  ADD KEY `Id_Buku` (`Id_Buku`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`Id_pijam`),
  ADD KEY `Id_Anggota` (`Id_Anggota`),
  ADD KEY `Id_Buku` (`Id_Buku`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `Id_Admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `Id_Buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `Id_Pijam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `Id_pijam` int(5) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `FK_buku_kategori` FOREIGN KEY (`Id_Kategori`) REFERENCES `kategori` (`Id_Kategori`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `FK_peminjaman_anggota` FOREIGN KEY (`Id_Anggota`) REFERENCES `anggota` (`Id_Anggota`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_peminjaman_buku` FOREIGN KEY (`Id_Buku`) REFERENCES `buku` (`Id_Buku`);

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `FK_transaksi_anggota` FOREIGN KEY (`Id_Anggota`) REFERENCES `anggota` (`Id_Anggota`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_transaksi_buku` FOREIGN KEY (`Id_Buku`) REFERENCES `buku` (`Id_Buku`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
