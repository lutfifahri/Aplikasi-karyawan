-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2022 at 12:09 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_webagil`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_akun`
--

CREATE TABLE `tbl_akun` (
  `id` char(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_akun`
--

INSERT INTO `tbl_akun` (`id`, `nama`, `email`, `password`, `level`) VALUES
('P01', 'Admin', 'Admin@gmail.com', '12345', 'Admin'),
('P02', 'Pimpinan', 'Pimpinan@gmail.com', '12345', 'Pimpinan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kriteria`
--

CREATE TABLE `tbl_kriteria` (
  `kode_kriteria` int(11) NOT NULL,
  `nama_kriteria` varchar(100) DEFAULT NULL,
  `bobot_kriteria` int(3) NOT NULL,
  `tipe_kriteria` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kriteria`
--

INSERT INTO `tbl_kriteria` (`kode_kriteria`, `nama_kriteria`, `bobot_kriteria`, `tipe_kriteria`) VALUES
(1, 'Nilai IPK/Ijazah', 20, 'Benefit'),
(2, 'Hasil Ujian', 25, 'Benefit'),
(3, 'Hasil Wawancara', 25, 'Benefit'),
(4, 'Pengalaman Kerja ', 10, 'Benefit'),
(5, 'Pendidikan ', 20, 'Benefit');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lowongan`
--

CREATE TABLE `tbl_lowongan` (
  `kode_lowongan` char(20) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `tanggal` varchar(50) NOT NULL,
  `lowongan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_lowongan`
--

INSERT INTO `tbl_lowongan` (`kode_lowongan`, `judul`, `tanggal`, `lowongan`) VALUES
('L01', 'Lowongan Kerja Corporate Affair Officer 1', '06/07/2021', '<p>PT Musim Mas sedang membuka kesempatan berkarir untuk mengisi posisi Lowongan Corporate Affair Officer yang akan ditempatkan di Medan. Berikut ini info lengkapnya</p>\r\n\r\n<p>Lowongan Corporate Affair Officer</p>\r\n\r\n<p>&bull; Candidate must possess at least a Bachelors Degree of Law</p>\r\n\r\n<p>&bull; Having knowledge about Indonesian Law</p>\r\n\r\n<p>&bull; Having experience in handling legal aspects</p>\r\n\r\n<p>&bull; Preferably having experiences as corporate affair in palm oil company</p>\r\n\r\n<p>&bull; Possess good communication skill and interpersonal skill</p>\r\n\r\n<p>&bull; Full-Time position(s) available</p>\r\n\r\n<p>&bull; Fresh graduates are welcomed to apply</p>\r\n\r\n<p>&bull; Willing to be placed at all operational area across Indonesia.</p>\r\n'),
('L02', 'Lowongan Kerja Corporate Affair Officer 2', '06/07/2021', '<p>PT Musim Mas sedang membuka kesempatan berkarir untuk mengisi posisi Lowongan Corporate Affair Officer yang akan ditempatkan di Medan. Berikut ini info lengkapnya</p>\r\n\r\n<p>Lowongan Corporate Affair Officer</p>\r\n\r\n<p>&bull; Candidate must possess at least a Bachelors Degree of Law</p>\r\n\r\n<p>&bull; Having knowledge about Indonesian Law</p>\r\n\r\n<p>&bull; Having experience in handling legal aspects</p>\r\n\r\n<p>&bull; Preferably having experiences as corporate affair in palm oil company</p>\r\n\r\n<p>&bull; Possess good communication skill and interpersonal skill</p>\r\n\r\n<p>&bull; Full-Time position(s) available</p>\r\n\r\n<p>&bull; Fresh graduates are welcomed to apply</p>\r\n\r\n<p>&bull; Willing to be placed at all operational area across Indonesia.</p>\r\n'),
('L03', 'Lowongan Kerja Corporate Affair Officer 3', '06/07/2021', '<p>PT Musim Mas sedang membuka kesempatan berkarir untuk mengisi posisi Lowongan Corporate Affair Officer yang akan ditempatkan di Medan. Berikut ini info lengkapnya</p>\r\n\r\n<p>Lowongan Corporate Affair Officer</p>\r\n\r\n<p>&bull; Candidate must possess at least a Bachelors Degree of Law</p>\r\n\r\n<p>&bull; Having knowledge about Indonesian Law</p>\r\n\r\n<p>&bull; Having experience in handling legal aspects</p>\r\n\r\n<p>&bull; Preferably having experiences as corporate affair in palm oil company</p>\r\n\r\n<p>&bull; Possess good communication skill and interpersonal skill</p>\r\n\r\n<p>&bull; Full-Time position(s) available</p>\r\n\r\n<p>&bull; Fresh graduates are welcomed to apply</p>\r\n\r\n<p>&bull; Willing to be placed at all operational area across Indonesia.</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pelamar`
--

CREATE TABLE `tbl_pelamar` (
  `kode_pelamar` char(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `jenis_kelamin` varchar(30) NOT NULL,
  `no_telp` char(20) NOT NULL,
  `document` text NOT NULL,
  `kode_lowongan` varchar(20) NOT NULL,
  `nilai_saw` double NOT NULL,
  `rangking_saw` int(10) NOT NULL,
  `nilai_moora` double NOT NULL,
  `rangking_moora` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pelamar`
--

INSERT INTO `tbl_pelamar` (`kode_pelamar`, `nama`, `alamat`, `jenis_kelamin`, `no_telp`, `document`, `kode_lowongan`, `nilai_saw`, `rangking_saw`, `nilai_moora`, `rangking_moora`) VALUES
('P0001', 'Andri', 'Medan', 'Pria', '11', 'Ade Hendini (2016) UML.pdf', 'L01', 0.717, 4, 0.39766611847054, 4),
('P0002', 'Nurjannah', 'Medan', 'Wanita', '22', 'Ade Hendini (2016) UML.pdf', 'L02', 0.8, 1, 0.43992383120696, 1),
('P0003', 'Dedi', 'Medan', 'Pria', '33', 'Ade Hendini (2016) UML.pdf', 'L03', 0.775, 2, 0.43341078964441, 3),
('P0004', 'Aisyah', 'Medan', 'Wanita', '44', 'Ade Hendini (2016) UML.pdf', 'L01', 0.8, 1, 0.43992383120696, 1),
('P0005', 'Ridwan', 'Medan', 'Pria', '55', 'Ade Hendini (2016) UML.pdf', 'L02', 0.742, 3, 0.43761019252301, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penilaian`
--

CREATE TABLE `tbl_penilaian` (
  `kode_nilai` int(11) NOT NULL,
  `kode_pelamar` char(20) NOT NULL,
  `kode_kriteria` int(11) NOT NULL,
  `kode_subkriteria` int(11) NOT NULL,
  `bobot_penilaian` double(3,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_penilaian`
--

INSERT INTO `tbl_penilaian` (`kode_nilai`, `kode_pelamar`, `kode_kriteria`, `kode_subkriteria`, `bobot_penilaian`) VALUES
(1, 'P0001', 1, 3, 1.00),
(2, 'P0001', 2, 5, 2.00),
(3, 'P0001', 3, 8, 2.00),
(4, 'P0001', 4, 11, 2.00),
(5, 'P0001', 5, 15, 1.00),
(6, 'P0002', 1, 3, 1.00),
(7, 'P0002', 2, 5, 2.00),
(8, 'P0002', 3, 7, 3.00),
(9, 'P0002', 4, 11, 2.00),
(10, 'P0002', 5, 15, 1.00),
(11, 'P0003', 1, 2, 2.00),
(12, 'P0003', 2, 6, 1.00),
(13, 'P0003', 3, 7, 3.00),
(14, 'P0003', 4, 11, 2.00),
(15, 'P0003', 5, 15, 1.00),
(16, 'P0004', 1, 3, 1.00),
(17, 'P0004', 2, 5, 2.00),
(18, 'P0004', 3, 7, 3.00),
(19, 'P0004', 4, 11, 2.00),
(20, 'P0004', 5, 15, 1.00),
(21, 'P0005', 1, 2, 2.00),
(22, 'P0005', 2, 6, 1.00),
(23, 'P0005', 3, 8, 2.00),
(24, 'P0005', 4, 12, 1.00),
(25, 'P0005', 5, 14, 2.00);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subkriteria`
--

CREATE TABLE `tbl_subkriteria` (
  `kode_subkriteria` int(11) NOT NULL,
  `nama_subkriteria` varchar(100) DEFAULT NULL,
  `kode_kriteria` int(11) DEFAULT NULL,
  `bobot_nilai` double(3,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_subkriteria`
--

INSERT INTO `tbl_subkriteria` (`kode_subkriteria`, `nama_subkriteria`, `kode_kriteria`, `bobot_nilai`) VALUES
(1, 'Sangat Baik', 1, 3.00),
(2, 'Baik', 1, 2.00),
(3, 'Kurang', 1, 1.00),
(4, '> 84', 2, 3.00),
(5, '65 - 84', 2, 2.00),
(6, '< 65', 2, 1.00),
(7, 'Sangat Baik', 3, 3.00),
(8, 'Baik', 3, 2.00),
(9, 'Kurang', 3, 1.00),
(10, '> 3 Tahun', 4, 3.00),
(11, '2  -  3 Tahun', 4, 2.00),
(12, '< 1 Tahun', 4, 1.00),
(13, 'S1', 5, 3.00),
(14, 'D3', 5, 2.00),
(15, 'SMA', 5, 1.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_akun`
--
ALTER TABLE `tbl_akun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_kriteria`
--
ALTER TABLE `tbl_kriteria`
  ADD PRIMARY KEY (`kode_kriteria`);

--
-- Indexes for table `tbl_lowongan`
--
ALTER TABLE `tbl_lowongan`
  ADD PRIMARY KEY (`kode_lowongan`);

--
-- Indexes for table `tbl_pelamar`
--
ALTER TABLE `tbl_pelamar`
  ADD PRIMARY KEY (`kode_pelamar`);

--
-- Indexes for table `tbl_penilaian`
--
ALTER TABLE `tbl_penilaian`
  ADD PRIMARY KEY (`kode_nilai`);

--
-- Indexes for table `tbl_subkriteria`
--
ALTER TABLE `tbl_subkriteria`
  ADD PRIMARY KEY (`kode_subkriteria`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_kriteria`
--
ALTER TABLE `tbl_kriteria`
  MODIFY `kode_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_penilaian`
--
ALTER TABLE `tbl_penilaian`
  MODIFY `kode_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_subkriteria`
--
ALTER TABLE `tbl_subkriteria`
  MODIFY `kode_subkriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
