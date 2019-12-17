-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2019 at 04:43 AM
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
CREATE DATABASE IF NOT EXISTS `kpl_ipd` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `kpl_ipd`;

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

DROP TABLE IF EXISTS `dosen`;
CREATE TABLE IF NOT EXISTS `dosen` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nik` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id`, `nik`, `nama`) VALUES
(1, '198701032014041001', 'Rizky Januar Akbar, S.Kom., M.Eng.'),
(2, '196810021994032001', 'Dr. Ir. Siti Rochimah, M.T.');

-- --------------------------------------------------------

--
-- Table structure for table `frs`
--

DROP TABLE IF EXISTS `frs`;
CREATE TABLE IF NOT EXISTS `frs` (
  `id_frs` int(11) NOT NULL AUTO_INCREMENT,
  `id_kelas` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  PRIMARY KEY (`id_frs`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `frs`
--

INSERT INTO `frs` (`id_frs`, `id_kelas`, `id_mahasiswa`) VALUES
(1, 1, 1),
(2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `jawaban_kuisioner`
--

DROP TABLE IF EXISTS `jawaban_kuisioner`;
CREATE TABLE IF NOT EXISTS `jawaban_kuisioner` (
  `id` varchar(192) NOT NULL,
  `pertanyaan_id` varchar(192) NOT NULL,
  `jawaban` text NOT NULL,
  `jawaban_inggris` text NOT NULL,
  `bobot` smallint(6) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `foreign_key` (`pertanyaan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jawaban_kuisioner`
--

INSERT INTO `jawaban_kuisioner` (`id`, `pertanyaan_id`, `jawaban`, `jawaban_inggris`, `bobot`) VALUES
('00b738a1-57d1-4bd1-863a-8c04080513dc', 'd2ef7c3b-e7d8-46bc-93c6-9a5b5272231c', 'Tidak Setuju', 'No', 2),
('018a1fac-d130-4678-8f73-093f00d729db', '2d5a45da-2d54-47ee-9943-8ec41a65ba9d', 'Sangat Setuju', 'Absolutely Yes', 4),
('04a5174e-0d1f-4eac-b02f-d5cb465ce44b', '2d5a45da-2d54-47ee-9943-8ec41a65ba9d', 'Tidak Setuju', 'No', 2),
('07d26180-a443-41b0-ad12-9a0b46abd858', 'd527e21a-84dd-4975-8be9-a2227e17179a', 'Sangat Tidak Setuju', 'Absolutely No', 1),
('0e34ccb4-542c-42ec-9992-b7b254a44f63', '9f7a231b-ff78-4477-abaf-92a911d3a28e', 'Sangat Tidak Setuju', 'Absolutely No', 1),
('0ee80676-f7d1-4553-bfbf-cc9930b957ba', '924c3ee3-1969-4e9b-900f-84e4b25bc247', 'Tidak Setuju', 'No', 2),
('13b7068d-f63c-4d6f-bc84-47d3f26ae64f', 'e9e81ea7-d26b-43ec-a6cd-01dc38268a50', 'Sangat  Setuju', 'Absolutely Yes', 4),
('15cf2100-e79d-44f9-a684-95556d02b79d', '18c41cf8-3a59-45ff-a690-72b033784144', 'Sangat Setuju', 'Absolutely Yes', 4),
('180f1ba7-a046-418d-8371-9fa1e5e323d1', 'db1c1e17-c6db-438d-9c3b-fb005527a308', 'Sangat Setuju', 'Absolutely Yes', 4),
('2bca194a-a067-4979-b22e-9a343fb6a6b8', 'd527e21a-84dd-4975-8be9-a2227e17179a', 'Sangat Setuju', 'Absolutely Yes', 4),
('3ade8bae-666b-48c1-85d2-859ec758f655', '0782d7dc-ad75-4667-97d7-125b762f0c1c', 'Sangat  Ya', 'Absolutely Yes', 4),
('401b69e4-28c9-4858-88b7-d89e0e629544', '18c41cf8-3a59-45ff-a690-72b033784144', 'Setuju', 'Yes', 3),
('52340e4c-3342-4efc-a95e-5e60bcd26c53', '428f16f5-a45d-4194-bc5e-ecaed1280721', 'Setuju', 'Yes', 3),
('5c28e48c-e1be-4d66-9977-c2bf63e3d3d8', '9f7a231b-ff78-4477-abaf-92a911d3a28e', 'Tidak Setuju', 'No', 2),
('5de60be9-14dd-415a-8b36-00ba0611b6e1', 'd527e21a-84dd-4975-8be9-a2227e17179a', 'Tidak Setuju', 'No', 2),
('6dbad4c7-c51a-41f8-890d-b453b4c8f162', 'e9e81ea7-d26b-43ec-a6cd-01dc38268a50', 'Sangat Tidak Setuju', 'Absolutely No', 1),
('6ebe669d-96ab-4668-8ed1-b10902f3b180', 'db1c1e17-c6db-438d-9c3b-fb005527a308', 'Sangat Tidak Setuju', 'Absolutely No', 1),
('6ebe669d-96ab-4668-8ed1-b10902f3b181', 'db1c1e17-c6db-438d-9c3b-fb005527a308', 'Tidak Setuju', 'No', 2),
('71331671-2c07-4869-94e1-9364e12fca68', 'd2ef7c3b-e7d8-46bc-93c6-9a5b5272231c', 'Sangat Tidak Setuju', 'Absolutely No', 1),
('7fe8dc39-f4d6-4081-b249-4ef3a47cb020', '428f16f5-a45d-4194-bc5e-ecaed1280721', 'Sangat Tidak Setuju', 'Absolutely No', 1),
('80026783-c836-4705-9c9d-9cfe0ac43f61', '18c41cf8-3a59-45ff-a690-72b033784144', 'Sangat Tidak Setuju', 'Absolutely No', 1),
('85b2a60c-5ddb-4d69-a2c1-66aad189b667', '924c3ee3-1969-4e9b-900f-84e4b25bc247', 'Setuju', 'Yes', 3),
('8a8b9167-5609-47ad-879c-62490f63f0f1', 'e9e81ea7-d26b-43ec-a6cd-01dc38268a50', 'Setuju', 'Yes', 3),
('8ec0be6b-3331-4053-b130-58dc2739a151', '9f7a231b-ff78-4477-abaf-92a911d3a28e', 'Sangat Setuju', 'Absolutely Yes', 4),
('a5a43118-b292-4288-bf10-4d726b5893e9', '0782d7dc-ad75-4667-97d7-125b762f0c1c', 'Ya', 'Yes', 3),
('a5cc9e88-aa4e-47bc-be11-e2d36ff61221', '9f7a231b-ff78-4477-abaf-92a911d3a28e', 'Setuju', 'Yes', 3),
('ab3f0f78-1157-4b9e-bf79-788db72639ec', '924c3ee3-1969-4e9b-900f-84e4b25bc247', 'Sangat  Setuju', 'Absolutely Yes', 4),
('af50bb96-ad73-45a0-92f4-ff008adca7e9', 'd527e21a-84dd-4975-8be9-a2227e17179a', 'Setuju', 'Yes', 3),
('b4efa6ed-2497-438e-b4a0-ed3c1407716c', 'd2ef7c3b-e7d8-46bc-93c6-9a5b5272231c', 'Sangat  Setuju', 'Absolutely Yes', 4),
('b6c04749-888e-44a4-bd22-e4b8dbd6c362', '0782d7dc-ad75-4667-97d7-125b762f0c1c', 'Sepertinya', 'Maybe', 2),
('bb1d7a2e-2bb8-4984-a3e7-60ddf75a31a6', '2d5a45da-2d54-47ee-9943-8ec41a65ba9d', 'Sangat Tidak Setuju', 'Absolutely No', 1),
('bd04ef79-1250-4a6a-b4e0-8ac04a0d7652', '2d5a45da-2d54-47ee-9943-8ec41a65ba9d', 'Setuju', 'Yes', 3),
('bd9ad459-dca8-4236-b7f5-d37d1d683053', '924c3ee3-1969-4e9b-900f-84e4b25bc247', 'Sangat Tidak Setuju', 'Absolutely No', 1),
('c827f43e-403b-4755-b1a0-f130db67fce9', '0782d7dc-ad75-4667-97d7-125b762f0c1c', 'Tidak', 'No', 1),
('d401e9ba-a62b-4324-a85c-c80364077c0a', '18c41cf8-3a59-45ff-a690-72b033784144', 'Tidak Setuju', 'No', 2),
('d655c6c5-7f2f-4b87-9403-a768bfcfb69d', 'db1c1e17-c6db-438d-9c3b-fb005527a308', 'Setuju', 'Yes', 3),
('dd5cb57e-d429-45ca-8bdf-47bd3e5305ec', 'e9e81ea7-d26b-43ec-a6cd-01dc38268a50', 'Tidak Setuju', 'No', 2),
('e4a93e50-c9f9-4259-bf6d-0def7504be3d', '428f16f5-a45d-4194-bc5e-ecaed1280721', 'Tidak Setuju', 'No', 2),
('ebab9baf-1e70-4909-a840-51cb766534b9', '428f16f5-a45d-4194-bc5e-ecaed1280721', 'Sangat  Setuju', 'Absolutely Yes', 4),
('fe752877-cfb2-4c4c-be56-f940cca34ff3', 'd2ef7c3b-e7d8-46bc-93c6-9a5b5272231c', 'Setuju', 'Yes', 3);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kuisioner`
--

DROP TABLE IF EXISTS `jenis_kuisioner`;
CREATE TABLE IF NOT EXISTS `jenis_kuisioner` (
  `id` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `nama_inggris` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_kuisioner`
--

INSERT INTO `jenis_kuisioner` (`id`, `nama`, `nama_inggris`) VALUES
(1, 'Dosen', 'Lecturers'),
(2, 'Mata Kuliah', 'Courses');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

DROP TABLE IF EXISTS `kelas`;
CREATE TABLE IF NOT EXISTS `kelas` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `mata_kuliah_id` int(10) UNSIGNED NOT NULL,
  `dosen_id` int(10) UNSIGNED NOT NULL,
  `daya_tampung` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `mata_kuliah_id` (`mata_kuliah_id`),
  KEY `dosen_id` (`dosen_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `nama`, `mata_kuliah_id`, `dosen_id`, `daya_tampung`) VALUES
(1, 'A', 5, 1, 40),
(2, 'B', 4, 1, 35);

-- --------------------------------------------------------

--
-- Table structure for table `kuisoner`
--

DROP TABLE IF EXISTS `kuisoner`;
CREATE TABLE IF NOT EXISTS `kuisoner` (
  `id_kuisoner` int(11) NOT NULL AUTO_INCREMENT,
  `id_mahasiswa` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `jenis_id` int(11) NOT NULL,
  `catatan` text NOT NULL,
  PRIMARY KEY (`id_kuisoner`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kuisoner`
--

INSERT INTO `kuisoner` (`id_kuisoner`, `id_mahasiswa`, `id_kelas`, `jenis_id`, `catatan`) VALUES
(20, 1, 1, 1, 'Mantap!');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

DROP TABLE IF EXISTS `mahasiswa`;
CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(256) NOT NULL,
  `nrp` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `nrp`) VALUES
(1, 'Vincent Marcello Dwi Tanujaya', '05111640000089');

-- --------------------------------------------------------

--
-- Table structure for table `mata_kuliah`
--

DROP TABLE IF EXISTS `mata_kuliah`;
CREATE TABLE IF NOT EXISTS `mata_kuliah` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `sks` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

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

DROP TABLE IF EXISTS `pertanyaan_kuisioner`;
CREATE TABLE IF NOT EXISTS `pertanyaan_kuisioner` (
  `id` varchar(192) NOT NULL,
  `jenis_id` int(11) NOT NULL,
  `isi` text NOT NULL,
  `isi_inggris` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `foreign_key` (`jenis_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pertanyaan_kuisioner`
--

INSERT INTO `pertanyaan_kuisioner` (`id`, `jenis_id`, `isi`, `isi_inggris`) VALUES
('0782d7dc-ad75-4667-97d7-125b762f0c1c', 1, 'Dosen telah mengajar dengan baik', 'Lecturers has been teaching very well'),
('18c41cf8-3a59-45ff-a690-72b033784144', 1, 'Dosen paham atas materi yang disampaikan', '\r\nThe lecturer understands the material that is presented'),
('2d5a45da-2d54-47ee-9943-8ec41a65ba9d', 1, 'Dosen tidak pernah terlambat', 'Lecturers are never late'),
('428f16f5-a45d-4194-bc5e-ecaed1280721', 1, 'Dosen mengajar dengan interaktif', 'Lecturers teach interactively'),
('924c3ee3-1969-4e9b-900f-84e4b25bc247', 2, 'Mata Kuliah sudah tidak relevan terhadap kebutuhan luar', 'The subject is no longer relevant to external needs'),
('9f7a231b-ff78-4477-abaf-92a911d3a28e', 2, 'Mata Kuliah terlalu susah', 'The subject is too difficult'),
('d2ef7c3b-e7d8-46bc-93c6-9a5b5272231c', 1, 'Dosen jarang memberikan tugas', 'Lecturers rarely give assignments'),
('d527e21a-84dd-4975-8be9-a2227e17179a', 2, 'Mata Kuliah tidak berhubungan dengan teknologi', 'Subjects are not related to technology'),
('db1c1e17-c6db-438d-9c3b-fb005527a308', 2, 'Mata Kuliah memberikan dampat positif pada mahasiswa', 'The course has a positive impact on students'),
('e9e81ea7-d26b-43ec-a6cd-01dc38268a50', 2, 'Mata Kuliah melatih mahasiswa untuk mandiri', 'The course trains students to be independent');

-- --------------------------------------------------------

--
-- Table structure for table `response_kuisoner`
--

DROP TABLE IF EXISTS `response_kuisoner`;
CREATE TABLE IF NOT EXISTS `response_kuisoner` (
  `id_respon` int(11) NOT NULL AUTO_INCREMENT,
  `kuisoner_id` int(11) NOT NULL,
  `pertanyaan_id` varchar(256) NOT NULL,
  `jawaban_id` varchar(256) NOT NULL,
  `bobot` smallint(6) NOT NULL,
  PRIMARY KEY (`id_respon`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `response_kuisoner`
--

INSERT INTO `response_kuisoner` (`id_respon`, `kuisoner_id`, `pertanyaan_id`, `jawaban_id`, `bobot`) VALUES
(30, 20, '0782d7dc-ad75-4667-97d7-125b762f0c1c', '3ade8bae-666b-48c1-85d2-859ec758f655', 4),
(31, 20, '18c41cf8-3a59-45ff-a690-72b033784144', '15cf2100-e79d-44f9-a684-95556d02b79d', 4),
(32, 20, '2d5a45da-2d54-47ee-9943-8ec41a65ba9d', '018a1fac-d130-4678-8f73-093f00d729db', 4),
(33, 20, '428f16f5-a45d-4194-bc5e-ecaed1280721', 'ebab9baf-1e70-4909-a840-51cb766534b9', 4),
(34, 20, 'd2ef7c3b-e7d8-46bc-93c6-9a5b5272231c', 'b4efa6ed-2497-438e-b4a0-ed3c1407716c', 4);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `dosen_id_fk` FOREIGN KEY (`dosen_id`) REFERENCES `dosen` (`id`),
  ADD CONSTRAINT `mata_kuliah_id_fk` FOREIGN KEY (`mata_kuliah_id`) REFERENCES `mata_kuliah` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
