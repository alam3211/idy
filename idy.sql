-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Des 2019 pada 18.27
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
-- Database: `kpl_ipd`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `id` int(10) UNSIGNED NOT NULL,
  `nik` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`id`, `nik`, `nama`) VALUES
(1, '198701032014041001', 'Rizky Januar Akbar, S.Kom., M.Eng.'),
(2, '196810021994032001', 'Dr. Ir. Siti Rochimah, M.T.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `frs`
--

CREATE TABLE `frs` (
  `id_frs` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `frs`
--

INSERT INTO `frs` (`id_frs`, `id_kelas`, `id_mahasiswa`) VALUES
(1, 1, 1),
(2, 2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jawaban_kuisioner`
--

CREATE TABLE `jawaban_kuisioner` (
  `id` varchar(192) NOT NULL,
  `pertanyaan_id` varchar(192) NOT NULL,
  `jawaban` text NOT NULL,
  `jawaban_inggris` text NOT NULL,
  `bobot` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jawaban_kuisioner`
--

INSERT INTO `jawaban_kuisioner` (`id`, `pertanyaan_id`, `jawaban`, `jawaban_inggris`, `bobot`) VALUES
('00b738a1-57d1-4bd1-863a-8c04080513dc', 'd2ef7c3b-e7d8-46bc-93c6-9a5b5272231c', 'Jawaban2', 'answer2', 2),
('3ade8bae-666b-48c1-85d2-859ec758f655', '0782d7dc-ad75-4667-97d7-125b762f0c1c', 'Sangat  Ya', 'Absolutely Yes', 4),
('6ebe669d-96ab-4668-8ed1-b10902f3b180', 'db1c1e17-c6db-438d-9c3b-fb005527a308', 'jawaban1', 'answer1', 1),
('6ebe669d-96ab-4668-8ed1-b10902f3b181', 'db1c1e17-c6db-438d-9c3b-fb005527a308', 'jawaban2', 'answer2', 1),
('71331671-2c07-4869-94e1-9364e12fca68', 'd2ef7c3b-e7d8-46bc-93c6-9a5b5272231c', 'Jawaban1', 'answer1', 1),
('a5a43118-b292-4288-bf10-4d726b5893e9', '0782d7dc-ad75-4667-97d7-125b762f0c1c', 'Ya', 'Yes', 3),
('b4efa6ed-2497-438e-b4a0-ed3c1407716c', 'd2ef7c3b-e7d8-46bc-93c6-9a5b5272231c', 'jawaban4', 'answer4', 4),
('b6c04749-888e-44a4-bd22-e4b8dbd6c362', '0782d7dc-ad75-4667-97d7-125b762f0c1c', 'Sepertinya', 'Maybe', 2),
('c827f43e-403b-4755-b1a0-f130db67fce9', '0782d7dc-ad75-4667-97d7-125b762f0c1c', 'Tidak', 'No', 1),
('fe752877-cfb2-4c4c-be56-f940cca34ff3', 'd2ef7c3b-e7d8-46bc-93c6-9a5b5272231c', 'jawaban3', 'answer3', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_kuisioner`
--

CREATE TABLE `jenis_kuisioner` (
  `id` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `nama_inggris` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_kuisioner`
--

INSERT INTO `jenis_kuisioner` (`id`, `nama`, `nama_inggris`) VALUES
(1, 'Dosen', 'Lecturers'),
(2, 'Mata Kuliah', 'Courses');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `mata_kuliah_id` int(10) UNSIGNED NOT NULL,
  `dosen_id` int(10) UNSIGNED NOT NULL,
  `daya_tampung` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id`, `nama`, `mata_kuliah_id`, `dosen_id`, `daya_tampung`) VALUES
(1, 'A', 5, 1, 40),
(2, 'B', 4, 1, 35);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kuisoner`
--

CREATE TABLE `kuisoner` (
  `id_kuisoner` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `jenis_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `nrp` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `nrp`) VALUES
(1, 'Vincent Marcello Dwi Tanujaya', '05111640000089');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mata_kuliah`
--

CREATE TABLE `mata_kuliah` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `sks` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mata_kuliah`
--

INSERT INTO `mata_kuliah` (`id`, `nama`, `kode`, `sks`) VALUES
(1, 'Realitas Virtual dan Augmentasi	', 'IF184932', 3),
(2, 'Komputasi Awan', 'IF184942', 3),
(3, 'Rekayasa Pengetahuan', 'IF184962', 3),
(4, 'Evolusi Perangkat Lunak', 'IF184973', 3),
(5, 'Konstruksi Perangkat Lunak', 'IF184974', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pertanyaan_kuisioner`
--

CREATE TABLE `pertanyaan_kuisioner` (
  `id` varchar(192) NOT NULL,
  `jenis_id` int(11) NOT NULL,
  `isi` text NOT NULL,
  `isi_inggris` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pertanyaan_kuisioner`
--

INSERT INTO `pertanyaan_kuisioner` (`id`, `jenis_id`, `isi`, `isi_inggris`) VALUES
('0782d7dc-ad75-4667-97d7-125b762f0c1c', 1, 'Dosen telah mengajar dengan baik', 'Lecturers has been teaching very well'),
('d2ef7c3b-e7d8-46bc-93c6-9a5b5272231c', 1, 'Testing2', 'Testing2'),
('db1c1e17-c6db-438d-9c3b-fb005527a308', 2, 'Percobaan', 'Testing');

-- --------------------------------------------------------

--
-- Struktur dari tabel `response_kuisoner`
--

CREATE TABLE `response_kuisoner` (
  `id_respon` int(11) NOT NULL,
  `kuisoner_id` int(11) NOT NULL,
  `pertanyaan_id` int(11) NOT NULL,
  `jawaban_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `frs`
--
ALTER TABLE `frs`
  ADD PRIMARY KEY (`id_frs`);

--
-- Indeks untuk tabel `jawaban_kuisioner`
--
ALTER TABLE `jawaban_kuisioner`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foreign_key` (`pertanyaan_id`);

--
-- Indeks untuk tabel `jenis_kuisioner`
--
ALTER TABLE `jenis_kuisioner`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mata_kuliah_id` (`mata_kuliah_id`),
  ADD KEY `dosen_id` (`dosen_id`);

--
-- Indeks untuk tabel `kuisoner`
--
ALTER TABLE `kuisoner`
  ADD PRIMARY KEY (`id_kuisoner`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pertanyaan_kuisioner`
--
ALTER TABLE `pertanyaan_kuisioner`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foreign_key` (`jenis_id`);

--
-- Indeks untuk tabel `response_kuisoner`
--
ALTER TABLE `response_kuisoner`
  ADD PRIMARY KEY (`id_respon`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `frs`
--
ALTER TABLE `frs`
  MODIFY `id_frs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kuisoner`
--
ALTER TABLE `kuisoner`
  MODIFY `id_kuisoner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `response_kuisoner`
--
ALTER TABLE `response_kuisoner`
  MODIFY `id_respon` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `dosen_id_fk` FOREIGN KEY (`dosen_id`) REFERENCES `dosen` (`id`),
  ADD CONSTRAINT `mata_kuliah_id_fk` FOREIGN KEY (`mata_kuliah_id`) REFERENCES `mata_kuliah` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
