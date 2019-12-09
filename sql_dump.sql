-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2019 at 02:38 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.2.23

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
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id` int(10) UNSIGNED NOT NULL,
  `nik` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id`, `nik`, `nama`) VALUES
(1, '198701032014041001', 'Rizky Januar Akbar, S.Kom., M.Eng.'),
(2, '196810021994032001', 'Dr. Ir. Siti Rochimah, M.T.');

-- --------------------------------------------------------

--
-- Table structure for table `jawaban_kuisioner`
--

CREATE TABLE `jawaban_kuisioner` (
  `id` varchar(192) NOT NULL,
  `pertanyaan_id` varchar(192) NOT NULL,
  `jawaban` text NOT NULL,
  `jawaban_inggris` text NOT NULL,
  `bobot` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jawaban_kuisioner`
--

INSERT INTO `jawaban_kuisioner` (`id`, `pertanyaan_id`, `jawaban`, `jawaban_inggris`, `bobot`) VALUES
('00b738a1-57d1-4bd1-863a-8c04080513dc', 'd2ef7c3b-e7d8-46bc-93c6-9a5b5272231c', 'Jawaban2', 'answer2', 2),
('6ebe669d-96ab-4668-8ed1-b10902f3b180', 'db1c1e17-c6db-438d-9c3b-fb005527a308', 'jawaban1', 'answer1', 1),
('6ebe669d-96ab-4668-8ed1-b10902f3b181', 'db1c1e17-c6db-438d-9c3b-fb005527a308', 'jawaban2', 'answer2', 1),
('71331671-2c07-4869-94e1-9364e12fca68', 'd2ef7c3b-e7d8-46bc-93c6-9a5b5272231c', 'Jawaban1', 'answer1', 1),
('b4efa6ed-2497-438e-b4a0-ed3c1407716c', 'd2ef7c3b-e7d8-46bc-93c6-9a5b5272231c', 'jawaban4', 'answer4', 4),
('fe752877-cfb2-4c4c-be56-f940cca34ff3', 'd2ef7c3b-e7d8-46bc-93c6-9a5b5272231c', 'jawaban3', 'answer3', 3);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kuisioner`
--

CREATE TABLE `jenis_kuisioner` (
  `id` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `nama_inggris` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_kuisioner`
--

INSERT INTO `jenis_kuisioner` (`id`, `nama`, `nama_inggris`) VALUES
(1, 'Dosen', 'Lecturers'),
(2, 'Mata Kuliah', 'Courses');

-- --------------------------------------------------------

--
-- Table structure for table `mata_kuliah`
--

CREATE TABLE `mata_kuliah` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `sks` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mata_kuliah`
--

INSERT INTO `mata_kuliah` (`id`, `nama`, `kode`, `sks`) VALUES
(1, 'Realitas Virtual dan Augmentasi	', 'IF184932', 3),
(2, 'Komputasi Awan', 'IF184942', 3),
(3, 'Rekayasa Pengetahuan', 'IF184962', 3),
(4, 'Evolusi Perangkat Lunak', 'IF184973', 3),
(5, 'Konstruksi Perangkat Lunak', 'IF184974', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaan_kuisioner`
--

CREATE TABLE `pertanyaan_kuisioner` (
  `id` varchar(192) NOT NULL,
  `jenis_id` int(11) NOT NULL,
  `isi` text NOT NULL,
  `isi_inggris` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pertanyaan_kuisioner`
--

INSERT INTO `pertanyaan_kuisioner` (`id`, `jenis_id`, `isi`, `isi_inggris`) VALUES
('d2ef7c3b-e7d8-46bc-93c6-9a5b5272231c', 1, 'Testing2', 'Testing2'),
('db1c1e17-c6db-438d-9c3b-fb005527a308', 2, 'Percobaan', 'Testing');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jawaban_kuisioner`
--
ALTER TABLE `jawaban_kuisioner`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foreign_key` (`pertanyaan_id`);

--
-- Indexes for table `jenis_kuisioner`
--
ALTER TABLE `jenis_kuisioner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pertanyaan_kuisioner`
--
ALTER TABLE `pertanyaan_kuisioner`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foreign_key` (`jenis_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
