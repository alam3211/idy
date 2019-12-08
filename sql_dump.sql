-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2019 at 08:12 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

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
('db1c1e17-c6db-438d-9c3b-fb005527a308', 1, 'Percobaan', 'Testing');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `pertanyaan_kuisioner`
--
ALTER TABLE `pertanyaan_kuisioner`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foreign_key` (`jenis_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
