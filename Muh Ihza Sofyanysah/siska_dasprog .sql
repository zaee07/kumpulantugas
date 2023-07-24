-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Jul 2023 pada 15.04
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siska_dasprog`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `nidn` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_dosen` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_telp` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jab_fung` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`nidn`, `nama_dosen`, `no_telp`, `jab_fung`) VALUES
('0613127804', 'Yusuf Yudhistira', '08112607462', 'Asisten Ahli'),
('0676342765', 'Mukrodin', '0845365452', 'Lektor'),
('0676453687', 'Fuaida Nabyla', '08645342567', 'Asisten Ahli'),
('0687253452', 'Ashwar Anis', '085746354635', 'Lektor'),
('0687345656', 'Fathulloh', '087623456534', 'Asisten Ahli'),
('0687463528', 'Pudjono', '084653427654', 'Lektor Kepala'),
('0687465465', 'Mega Saraswati', '084763476364', 'Asisten Ahli'),
('0687574635', 'Danar Suprayogi', '086543526453', 'Asisten Ahli');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fakultas`
--

CREATE TABLE `fakultas` (
  `id_fakultas` int(11) NOT NULL,
  `nama_fak` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dekan_nidn` char(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `fakultas`
--

INSERT INTO `fakultas` (`id_fakultas`, `nama_fak`, `no_telp`, `alamat`, `dekan_nidn`) VALUES
(3, 'Sains dan Teknologi', '(0289)1234567', 'Bumiayu', '0687463528'),
(4, 'Keguruan dan Ilmu Pendidikan', '(0289)1234567', 'Bumiayu', '0676453687'),
(5, 'Ekonomi dan Bisnis', '(0289)1234567', 'Bumiayu', '0687345656'),
(6, 'Ilmu Sosial dan Ilmu Politik', '(0289)1234567', 'Bumiayu', '0687574635');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_lengkap` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_telp` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_lahir` datetime NOT NULL,
  `prodi_id` int(11) DEFAULT NULL,
  `dosen_pa_nidn` char(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama_lengkap`, `alamat`, `no_telp`, `tgl_lahir`, `prodi_id`, `dosen_pa_nidn`) VALUES
('42321001', 'DANITA HAYU SYIFA', 'Bumiayu', '081323456476', '2004-12-13 00:00:00', 1, '0613127804'),
('42321002', 'MARLEN ADAM', 'Bumiayu', '081323456477', '2004-12-14 00:00:00', 2, '0676342765'),
('42321003', 'MOCH ZAKY WIDODO', 'Bumiayu', '081323456476', '2004-12-15 00:00:00', 3, '0676453687'),
('42321004', 'AGUNG SETIAWAN', 'Bumiayu', '081323456477', '2004-12-16 00:00:00', 4, '0687253452'),
('42321005', 'ARYA AGUSTIAN', 'Bumiayu', '081323456476', '2004-12-17 00:00:00', 5, '0687345656'),
('42321006', 'AZMIA MUALIFAH', 'Bumiayu', '081323456477', '2004-12-18 00:00:00', 6, '0613127804'),
('42321007', 'CANDRA WIJAYA', 'Tonjong', '081323456476', '2004-12-19 00:00:00', 1, '0676342765'),
('42321008', 'FAJAR IRVAN DIANTORO', 'Tonjong', '081323456477', '2004-12-20 00:00:00', 2, '0676453687'),
('42321009', 'HALIZHA INTAN SAFITRI', 'Tonjong', '081323456476', '2004-12-21 00:00:00', 3, '0687253452'),
('42321010', 'HARITS AL HAFI', 'Tonjong', '081323456477', '2004-12-22 00:00:00', 4, '0687345656'),
('42321011', 'KHAERUL UMAM', 'Tonjong', '081323456476', '2004-12-23 00:00:00', 5, '0613127804'),
('42321012', 'LARAS SETIA', 'Tonjong', '081323456477', '2004-12-24 00:00:00', 6, '0676342765'),
('42321013', 'M. NUR ISKANDAR', 'Tonjong', '081323456476', '2004-12-25 00:00:00', 1, '0676453687'),
('42321014', 'M. ZIDNI ILMAN', 'Tonjong', '081323456477', '2004-12-26 00:00:00', 2, '0687253452'),
('42321015', 'M. ADE NUR ALFARISI', 'Paguyangan', '081323456476', '2004-12-27 00:00:00', 3, '0687345656'),
('42321016', 'MUHAMMAD SALIM MAMDUH', 'Paguyangan', '081323456477', '2004-12-28 00:00:00', 4, '0613127804'),
('42321017', 'NADIYA NURUL LAELI', 'Paguyangan', '081323456476', '2004-12-29 00:00:00', 5, '0676342765'),
('42321018', 'NAYLU SYIFA', 'Paguyangan', '081323456477', '2004-12-30 00:00:00', 6, '0676453687'),
('42321020', 'ROHMAT ROMADONI', 'Paguyangan', '081323456476', '2004-12-13 00:00:00', 1, '0687253452'),
('42321022', 'TYO HENDRIANTORO', 'Paguyangan', '081323456477', '2004-12-14 00:00:00', 2, '0687345656'),
('42321023', 'ZANDITYA ALDI PRADANA', 'Paguyangan', '081323456476', '2004-12-15 00:00:00', 3, '0613127804'),
('42321026', 'DELA ANTIKA', 'Bantarkawung', '081323456477', '2004-12-16 00:00:00', 4, '0676342765'),
('42321027', 'DIAH AYU LESTARI ADE NINGSIH', 'Bantarkawung', '081323456476', '2004-12-17 00:00:00', 5, '0676453687'),
('42321028', 'ELGA ADIETYA LISTI PUTRI', 'Bantarkawung', '081323456477', '2004-12-18 00:00:00', 6, '0687253452'),
('42321029', 'FAJAR RISKI PRATAMA', 'Bantarkawung', '081323456476', '2004-12-19 00:00:00', 1, '0687345656'),
('42321030', 'FRENGKY ALDITIYA APRIANSAH', 'Bantarkawung', '081323456477', '2004-12-20 00:00:00', 2, '0613127804'),
('42321031', 'M. ALI ZULFAN', 'Bantarkawung', '081323456476', '2004-12-21 00:00:00', 3, '0676342765'),
('42321032', 'MUHAMMAD GHALDA RASENDRIYA ARVELAVAYA', 'Bantarkawung', '081323456477', '2004-12-22 00:00:00', 4, '0676453687'),
('42321033', 'MUHAMMAD ROBBI PRADANA', 'Salem', '081323456476', '2004-12-23 00:00:00', 5, '0687253452'),
('42321035', 'SENDI FIRMANSAH', 'Salem', '081323456477', '2004-12-24 00:00:00', 6, '0687345656'),
('42321036', 'SHELLA ADITYA PRAMUDITA', 'Salem', '081323456476', '2004-12-25 00:00:00', 1, '0613127804'),
('42321037', 'SITI SOPIATUN NISWAH', 'Salem', '081323456477', '2004-12-26 00:00:00', 2, '0676342765'),
('42321038', 'SRI MAYLANI PUTRISARI', 'Salem', '081323456476', '2004-12-27 00:00:00', 3, '0676453687'),
('42321040', 'TOYIB IZIANA', 'Salem', '081323456477', '2004-12-28 00:00:00', 4, '0687253452'),
('42321041', 'ADAM MUHAMMAD IQBAL FAHRIZAL', 'Salem', '081323456476', '2004-12-29 00:00:00', 5, '0687345656');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prodi`
--

CREATE TABLE `prodi` (
  `id_prodi` int(11) NOT NULL,
  `nama_prodi` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kaprodi_nidn` char(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fakultas_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `nama_prodi`, `no_telp`, `alamat`, `kaprodi_nidn`, `fakultas_id`) VALUES
(1, 'Sistem Informasi', '(0289)123456', 'Bumiayu', '0676342765', 3),
(2, 'Agribisnis', '(0289)123456', 'Bumiayu', '0687465465', 3),
(3, 'Pendidikan Guru SD', '(0289)123456', 'Bumiayu', NULL, 4),
(4, 'Akuntansi', '(0289)123456', 'Bumiayu', NULL, 5),
(5, 'Hubungan Internasional', '(0289)123456', 'Bumiayu', NULL, 6),
(6, 'Ilmu Komunikasi', '(0289)123456', 'Bumiayu', NULL, 6);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nidn`),
  ADD UNIQUE KEY `nidn_UNIQUE` (`nidn`);

--
-- Indeks untuk tabel `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id_fakultas`),
  ADD UNIQUE KEY `nama_fak_UNIQUE` (`nama_fak`),
  ADD UNIQUE KEY `id_fakultas_UNIQUE` (`id_fakultas`),
  ADD KEY `fk_fakultas_dosen_idx` (`dekan_nidn`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`),
  ADD UNIQUE KEY `nim_UNIQUE` (`nim`),
  ADD KEY `fk_mahasiswa_prodi1_idx` (`prodi_id`),
  ADD KEY `fk_mahasiswa_dosen1_idx` (`dosen_pa_nidn`);

--
-- Indeks untuk tabel `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_prodi`),
  ADD UNIQUE KEY `id_prodi_UNIQUE` (`id_prodi`),
  ADD KEY `fk_prodi_dosen1_idx` (`kaprodi_nidn`),
  ADD KEY `fk_prodi_fakultas1_idx` (`fakultas_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id_fakultas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id_prodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `fakultas`
--
ALTER TABLE `fakultas`
  ADD CONSTRAINT `fk_fakultas_dosen` FOREIGN KEY (`dekan_nidn`) REFERENCES `dosen` (`nidn`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `fk_mahasiswa_dosen1` FOREIGN KEY (`dosen_pa_nidn`) REFERENCES `dosen` (`nidn`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_mahasiswa_prodi1` FOREIGN KEY (`prodi_id`) REFERENCES `prodi` (`id_prodi`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `prodi`
--
ALTER TABLE `prodi`
  ADD CONSTRAINT `fk_prodi_dosen1` FOREIGN KEY (`kaprodi_nidn`) REFERENCES `dosen` (`nidn`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_prodi_fakultas1` FOREIGN KEY (`fakultas_id`) REFERENCES `fakultas` (`id_fakultas`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
