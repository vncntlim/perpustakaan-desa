-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2019 at 07:59 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan-desa`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `no_anggota` varchar(8) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tempat` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `alamat` text NOT NULL,
  `agama` varchar(20) NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nama_organisasi` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `alamat_org` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_anggota`
--

INSERT INTO `tb_anggota` (`no_anggota`, `nama`, `tempat`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `agama`, `no_telp`, `email`, `nama_organisasi`, `jabatan`, `alamat_org`) VALUES
('PDCA0002', 'Vincent', 'Bandung', '1997-01-12', 'L', 'Bandung', 'Islam', '0899123124', 'vincent.limountha.27@gmail.com', 'UNIKOM', 'Mahasiswa', 'Bandung');

-- --------------------------------------------------------

--
-- Table structure for table `tb_buku`
--

CREATE TABLE `tb_buku` (
  `no_buku` varchar(8) NOT NULL,
  `tanggal` date NOT NULL,
  `nama` varchar(100) NOT NULL,
  `edisi` varchar(10) NOT NULL,
  `nama_pengarang` varchar(50) NOT NULL,
  `nama_penerbit` varchar(50) NOT NULL,
  `tempat_terbit` varchar(50) NOT NULL,
  `tahun_terbit` varchar(4) NOT NULL,
  `asal_buku` enum('Beli','Hibah','T') NOT NULL,
  `no_klas` varchar(8) NOT NULL,
  `bahasa` varchar(20) NOT NULL,
  `stok` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_buku`
--

INSERT INTO `tb_buku` (`no_buku`, `tanggal`, `nama`, `edisi`, `nama_pengarang`, `nama_penerbit`, `tempat_terbit`, `tahun_terbit`, `asal_buku`, `no_klas`, `bahasa`, `stok`) VALUES
('PDCB0001', '2019-01-12', 'Bahasa Indonesia Sekolah Dasar', '1', 'Farhan', 'Erlangga', 'Bandung', '2017', 'Beli', 'PDCK0002', 'Indonesia', 3),
('PDCB0002', '2019-01-12', 'Bahasa Inggris Sekolah Dasar', '1', 'Mulyanto', 'Erlangga', 'Jakarta', '2014', 'Beli', 'PDCK0002', 'Inggris', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail`
--

CREATE TABLE `tb_detail` (
  `no_detail` varchar(9) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `no_buku` varchar(8) NOT NULL,
  `banyaknya` int(2) NOT NULL,
  `status` enum('Dipinjam','Dikembalikan','','') NOT NULL DEFAULT 'Dipinjam',
  `no_peminjaman` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_detail`
--

INSERT INTO `tb_detail` (`no_detail`, `tanggal_pinjam`, `tanggal_kembali`, `no_buku`, `banyaknya`, `status`, `no_peminjaman`) VALUES
('PDCTD0001', '2019-01-24', '2019-01-31', 'PDCB0001', 1, 'Dipinjam', 'PDCTP0001');

-- --------------------------------------------------------

--
-- Table structure for table `tb_klas`
--

CREATE TABLE `tb_klas` (
  `no_klas` varchar(8) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_klas`
--

INSERT INTO `tb_klas` (`no_klas`, `nama`) VALUES
('PDCK0001', 'Sosial'),
('PDCK0002', 'Bahasa'),
('PDCK0003', 'Komputer');

-- --------------------------------------------------------

--
-- Table structure for table `tb_peminjaman`
--

CREATE TABLE `tb_peminjaman` (
  `no_peminjaman` varchar(9) NOT NULL,
  `no_anggota` varchar(8) NOT NULL,
  `no_pustakawan` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_peminjaman`
--

INSERT INTO `tb_peminjaman` (`no_peminjaman`, `no_anggota`, `no_pustakawan`) VALUES
('PDCTP0001', 'PDCA0002', 'PDCP0001');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengembalian`
--

CREATE TABLE `tb_pengembalian` (
  `no_peminjaman` varchar(9) NOT NULL,
  `no_detail` varchar(9) NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `no_pustakawan` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pustakawan`
--

CREATE TABLE `tb_pustakawan` (
  `no_pustakawan` varchar(8) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_pustakawan`
--

INSERT INTO `tb_pustakawan` (`no_pustakawan`, `password`, `nama`, `alamat`, `no_telp`) VALUES
('PDCP0001', '21232f297a57a5a743894a0e4a801fc3', 'Nufail', 'Dago', '088229089183');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tmp`
--

CREATE TABLE `tb_tmp` (
  `no_buku` varchar(8) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `banyaknya` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`no_anggota`);

--
-- Indexes for table `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`no_buku`),
  ADD KEY `no_klas` (`no_klas`);

--
-- Indexes for table `tb_detail`
--
ALTER TABLE `tb_detail`
  ADD PRIMARY KEY (`no_detail`),
  ADD KEY `no_buku` (`no_buku`),
  ADD KEY `no_peminjaman` (`no_peminjaman`);

--
-- Indexes for table `tb_klas`
--
ALTER TABLE `tb_klas`
  ADD PRIMARY KEY (`no_klas`);

--
-- Indexes for table `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  ADD PRIMARY KEY (`no_peminjaman`),
  ADD KEY `no_anggota` (`no_anggota`),
  ADD KEY `no_pustakawan` (`no_pustakawan`);

--
-- Indexes for table `tb_pengembalian`
--
ALTER TABLE `tb_pengembalian`
  ADD KEY `no_pustakawan` (`no_pustakawan`),
  ADD KEY `no_detail` (`no_detail`),
  ADD KEY `no_peminjaman` (`no_peminjaman`);

--
-- Indexes for table `tb_pustakawan`
--
ALTER TABLE `tb_pustakawan`
  ADD PRIMARY KEY (`no_pustakawan`);

--
-- Indexes for table `tb_tmp`
--
ALTER TABLE `tb_tmp`
  ADD KEY `no_buku` (`no_buku`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD CONSTRAINT `tb_buku_ibfk_1` FOREIGN KEY (`no_klas`) REFERENCES `tb_klas` (`no_klas`);

--
-- Constraints for table `tb_detail`
--
ALTER TABLE `tb_detail`
  ADD CONSTRAINT `tb_detail_ibfk_1` FOREIGN KEY (`no_buku`) REFERENCES `tb_buku` (`no_buku`),
  ADD CONSTRAINT `tb_detail_ibfk_2` FOREIGN KEY (`no_peminjaman`) REFERENCES `tb_peminjaman` (`no_peminjaman`),
  ADD CONSTRAINT `tb_detail_ibfk_3` FOREIGN KEY (`no_peminjaman`) REFERENCES `tb_peminjaman` (`no_peminjaman`);

--
-- Constraints for table `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  ADD CONSTRAINT `tb_peminjaman_ibfk_1` FOREIGN KEY (`no_anggota`) REFERENCES `tb_anggota` (`no_anggota`),
  ADD CONSTRAINT `tb_peminjaman_ibfk_2` FOREIGN KEY (`no_anggota`) REFERENCES `tb_anggota` (`no_anggota`),
  ADD CONSTRAINT `tb_peminjaman_ibfk_3` FOREIGN KEY (`no_pustakawan`) REFERENCES `tb_pustakawan` (`no_pustakawan`);

--
-- Constraints for table `tb_pengembalian`
--
ALTER TABLE `tb_pengembalian`
  ADD CONSTRAINT `tb_pengembalian_ibfk_1` FOREIGN KEY (`no_pustakawan`) REFERENCES `tb_pustakawan` (`no_pustakawan`),
  ADD CONSTRAINT `tb_pengembalian_ibfk_2` FOREIGN KEY (`no_detail`) REFERENCES `tb_detail` (`no_detail`),
  ADD CONSTRAINT `tb_pengembalian_ibfk_3` FOREIGN KEY (`no_peminjaman`) REFERENCES `tb_peminjaman` (`no_peminjaman`);

--
-- Constraints for table `tb_tmp`
--
ALTER TABLE `tb_tmp`
  ADD CONSTRAINT `tb_tmp_ibfk_1` FOREIGN KEY (`no_buku`) REFERENCES `tb_buku` (`no_buku`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
