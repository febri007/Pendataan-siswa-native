-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2021 at 05:14 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk-h`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kriteria`
--

CREATE TABLE `tbl_kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama_kriteria` varchar(100) NOT NULL,
  `tipe_kriteria` varchar(10) NOT NULL,
  `bobot_kriteria` double NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kriteria`
--

INSERT INTO `tbl_kriteria` (`id_kriteria`, `nama_kriteria`, `tipe_kriteria`, `bobot_kriteria`, `id_user`, `tanggal_update`) VALUES
(8, 'Penghasilan Orang Tua', 'Cost', 25, 1, '2021-04-13 20:16:24'),
(9, 'Semester', 'Benefit', 20, 1, '2021-04-13 20:16:43'),
(10, 'Tanggungan Orang Tua', 'Benefit', 15, 1, '2021-04-13 20:17:04'),
(13, 'Saudara Kandung', 'Benefit', 10, 1, '2021-04-13 20:17:35'),
(14, 'Nilai', 'Benefit', 30, 1, '2021-04-13 20:17:50');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ortu`
--

CREATE TABLE `tbl_ortu` (
  `id_ortu` int(11) NOT NULL,
  `nm_ortu` varchar(50) NOT NULL,
  `alamat_ortu` text NOT NULL,
  `telp_ortu` varchar(15) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `agama_ortu` varchar(25) NOT NULL,
  `gaji_ortu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_ortu`
--

INSERT INTO `tbl_ortu` (`id_ortu`, `nm_ortu`, `alamat_ortu`, `telp_ortu`, `pekerjaan`, `agama_ortu`, `gaji_ortu`) VALUES
(1, 'MIKAIL', 'Jl. Baru Raden', '0123456789', 'Freelance', 'ISLAM', 1500000),
(2, 'Coba', 'Coba', '08981189598', 'Swasta', 'ISLAM', 0),
(3, 'Coba', 'Coba', '08981189598', 'Mahasiswa', 'ISLAM', 0),
(4, 'Coba', 'Coba', '08981189598', 'Mahasiswa', 'ISLAM', 0),
(5, 'Coba', 'Coba', '08981189598', 'Mahasiswa', 'ISLAM', 0),
(6, 'Coba', 'Coba', '08981189598', 'Mahasiswa', 'ISLAM', 0),
(7, 'Coba', 'Coba', '08981189598', 'Mahasiswa', 'ISLAM', 0),
(8, 'Coba', 'Coba', '08981189598', 'Mahasiswa', 'ISLAM', 0),
(9, 'Coba', 'Coba', '08981189598', 'Mahasiswa', 'ISLAM', 0),
(10, 'Coba', 'Coba', '08981189598', 'Mahasiswa', 'ISLAM', 0),
(11, 'Coba', 'Coba', '08981189598', 'Mahasiswa', 'ISLAM', 0),
(12, 'Coba', 'Coba', '0821546738', 'Mahasiswa', 'ISLAM', 0),
(13, 'Coba', 'Coba', '08981189598', 'Mahasiswa', 'ISLAM', 0),
(14, 'Coba', 'Coba', '08981189598', 'Mahasiswa', 'ISLAM', 0),
(15, 'Coba', 'Coba', '0821123456', 'Coba', 'ISLAM', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rangking`
--

CREATE TABLE `tbl_rangking` (
  `id_rangking` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nilai_rangking` double NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `id_siswa` int(11) NOT NULL,
  `nis` varchar(40) NOT NULL,
  `password` varchar(60) NOT NULL,
  `nm_siswa` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `tmp_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` enum('Laki-Laki','Perempuan','','') NOT NULL,
  `agama` varchar(25) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `id_ortu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`id_siswa`, `nis`, `password`, `nm_siswa`, `alamat`, `tmp_lahir`, `tgl_lahir`, `jk`, `agama`, `kelas`, `id_ortu`) VALUES
(1, '5150411283', '40d16c844696e77fb3490574688d4cfc519ecb5e', 'Davolio', 'Jl. Sekumpul', 'Bandung', '2021-04-12', 'Laki-Laki', 'ISLAM', '6A', 1),
(2, '5150411284', '4d5874aaf11a73a2bf904e13bee9cd2c548bce6e', 'Fuller', 'Jl. Ukrim, Kadirojo I, Purwomartani, Kec. Kalasan, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55571', 'Kulon Progo', '2021-04-14', 'Perempuan', 'ISLAM', '6B', 11),
(3, '5150411285', '9616de796847efdc5ea580788bc15515a394dd4f', 'Leverling', 'Banjarbaru', 'Kulon Progo', '2021-04-13', 'Laki-Laki', 'ISLAM', '6B', 12),
(4, '5150411286', 'c0a4d4b86483d0f421431efa261f02a7635fd963', 'Peacock', 'Martapura', 'Banjarbaru', '2021-04-13', 'Laki-Laki', 'ISLAM', '6B', 13),
(6, '5150411287', 'ac379f5341bec396ab838e298ce308b6a39eee29', 'Aris', 'Sekumpul', 'Bandung', '2021-04-13', 'Laki-Laki', 'ISLAM', 'E', 15);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sub_kriteria`
--

CREATE TABLE `tbl_sub_kriteria` (
  `id_sub_kriteria` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `range_n` varchar(30) NOT NULL,
  `kategori` varchar(30) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_sub_kriteria`
--

INSERT INTO `tbl_sub_kriteria` (`id_sub_kriteria`, `id_kriteria`, `range_n`, `kategori`, `nilai`) VALUES
(1, 1, '1000000 - 1499000', '1000000 - 1499000', 1),
(2, 1, '1500000 - 1999000', '1500000 - 1999000', 2),
(3, 1, '2000000 - 2499000', '2000000 - 2499000', 3),
(4, 1, '2500000 - 2999000', '2500000 - 2999000', 4),
(5, 1, '3000000 - 3499000', '3000000 - 3499000', 5),
(6, 1, '3500000 - 3999000', '3500000 - 3999000', 6),
(7, 1, '4000000 - 4499000', '4000000 - 4499000', 7),
(8, 1, '4500000 - 4999000', '4500000 - 4999000', 8),
(9, 1, '5000000 - 5499000', '5000000 - 5499000', 9),
(10, 1, '5500000 - 5999000', '5500000 - 5999000', 10),
(11, 2, '5,12MB - 999MB', '5,12MB - 999MB', 1),
(12, 2, '1GB - 1,9GB', '1GB - 1,9GB', 2),
(13, 2, '2GB - 2,9GB', '2GB - 2,9GB', 3),
(14, 2, '3GB - 3,9GB', '3GB - 3,9GB', 4),
(15, 2, '4GB - 4,9GB', '4GB - 4,9GB', 5),
(23, 4, '1,3 MP - 1,9 MP', '1,3 MP - 1,9 MP', 1),
(24, 4, '2 MP - 2,9 MP', '2 MP - 2,9 MP', 2),
(26, 4, '3 MP - 4,9 MP', '3 MP - 4,9 MP', 3),
(27, 4, '5 MP - 7,9 MP', '5 MP - 7,9 MP', 4),
(28, 4, '8 MP - 12,9 MP', '8 MP - 12,9 MP', 5),
(29, 4, '13 MP - 20 MP', '13 MP - 20 MP', 6),
(30, 5, '3 Inchi - 3,9 Inchi', '3 Inchi - 3,9 Inchi', 1),
(31, 5, '4 Inchi - 4,9 Inchi', '4 Inchi - 4,9 Inchi', 2),
(32, 5, '5 Inchi - 5,9 Inchi', '5 Inchi - 5,9 Inchi', 3),
(33, 5, '6 Inchi - 7 Inchi', '6 Inchi - 7 Inchi', 4),
(35, 3, '2GB - 3,9GB', '2GB - 3,9GB', 1),
(36, 3, '4GB - 7,9GB', '4GB - 7,9GB', 2),
(38, 3, '8GB - 159GB', '8GB - 159GB', 3),
(39, 3, '16GB - 31,9GB', '16GB - 31,9GB', 4),
(40, 3, '32GB - 64GB', '32GB - 64GB', 6),
(58, 11, 'Tidak Berprestasi ', 'Tidak Berprestasi ', 0.2),
(59, 11, 'Tingkat Kecamatan', 'Tingkat Kecamatan', 0.4),
(60, 11, 'Tingkat Kabupaten', 'Tingkat Kabupaten', 0.6),
(61, 11, 'Tingkat Provinsi ', 'Tingkat Provinsi ', 0.8),
(62, 11, 'Tingkat Nasional', 'Tingkat Nasional', 1),
(64, 12, '1 - 3 km', '1 - 3 km', 0.2),
(65, 12, '4 – 7 km', '4 – 7 km', 0.4),
(66, 12, ' 8 - 10 km', ' 8 - 10 km', 0.6),
(67, 12, '11 - 14 km', '11 - 14 km', 0.8),
(68, 12, '>= 15 km', '>= 15 km', 1),
(126, 8, '<= Rp 1.000.000', '<= Rp 1.000.000', 20),
(127, 8, '<= Rp 1.500.000', '<= Rp 1.500.000', 40),
(128, 8, '<= Rp 3.000.000', '<= Rp 3.000.000', 60),
(129, 8, '<= Rp 4.500.000', '<= Rp 4.500.000', 80),
(130, 8, '> Rp 4.500.000', '> Rp 4.500.000', 100),
(131, 9, 'Semester 4', 'Semester 4', 20),
(132, 9, 'Semester 5', 'Semester 5', 40),
(133, 9, 'Semester 6', 'Semester 6', 60),
(134, 9, 'Semester 7', 'Semester 7', 80),
(135, 9, 'Semester 8', 'Semester 8', 100),
(137, 10, '1 Orang', '1 Orang', 20),
(138, 10, '2 Orang', '2 Orang', 40),
(139, 10, '3 Orang', '3 Orang', 60),
(140, 10, '4 Orang', '4 Orang', 80),
(141, 10, '5 Orang', '5 Orang', 100),
(142, 13, '1 Orang', '1 Orang', 20),
(143, 13, '2 Orang', '2 Orang', 40),
(144, 13, '3 Orang', '3 Orang', 60),
(145, 13, '4 Orang', '4 Orang', 80),
(146, 13, '5 Orang', '5 Orang', 100),
(147, 14, '< 2,75', '< 2,75', 20),
(148, 14, '< 3', '< 3', 40),
(149, 14, '< 3,25', '< 3,25', 60),
(150, 14, '< 3,5', '< 3,5', 80),
(151, 14, '>= 3,5', '>= 3,5', 100);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(60) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan','','') NOT NULL,
  `foto` text NOT NULL,
  `alamat` text NOT NULL,
  `level` enum('Tata Usaha','Kepala Sekolah','','') NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama`, `username`, `password`, `telepon`, `jenis_kelamin`, `foto`, `alamat`, `level`, `tanggal_update`) VALUES
(1, 'Aris Abdul Ajis', 'admin', '356a192b7913b04c54574d18c28d46e6395428ab', '08981189598', 'Laki-Laki', '', 'Jl. Sekumpul Gg. Purnama No. 49 Kec. Martapura Kab. Banjar Kalimantan Selatan', 'Tata Usaha', '2021-04-14 03:01:16'),
(3, 'Imam Munandar', 'kepsek', '356a192b7913b04c54574d18c28d46e6395428ab', '08981889598', 'Laki-Laki', '', 'Jogja', 'Kepala Sekolah', '2021-04-14 03:01:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_kriteria`
--
ALTER TABLE `tbl_kriteria`
  ADD PRIMARY KEY (`id_kriteria`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tbl_ortu`
--
ALTER TABLE `tbl_ortu`
  ADD PRIMARY KEY (`id_ortu`);

--
-- Indexes for table `tbl_rangking`
--
ALTER TABLE `tbl_rangking`
  ADD PRIMARY KEY (`id_rangking`),
  ADD KEY `id_karyawan` (`id_siswa`),
  ADD KEY `id_kriteria` (`id_kriteria`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `tbl_sub_kriteria`
--
ALTER TABLE `tbl_sub_kriteria`
  ADD PRIMARY KEY (`id_sub_kriteria`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_kriteria`
--
ALTER TABLE `tbl_kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_ortu`
--
ALTER TABLE `tbl_ortu`
  MODIFY `id_ortu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_rangking`
--
ALTER TABLE `tbl_rangking`
  MODIFY `id_rangking` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_sub_kriteria`
--
ALTER TABLE `tbl_sub_kriteria`
  MODIFY `id_sub_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
