-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2020 at 08:23 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `nim` int(11) NOT NULL,
  `nama_lengkap` varchar(500) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_telp` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `gender` enum('Laki-Laki','Perempuan') NOT NULL,
  `prodi` varchar(255) NOT NULL,
  `tgl_input` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_buku`
--

CREATE TABLE `tb_buku` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `pengarang` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `tahun_terbit` varchar(5) NOT NULL,
  `isbn` varchar(255) NOT NULL,
  `jumlah_buku` int(11) NOT NULL,
  `lokasi` enum('Rak 1','Rak 2','Rak 3') NOT NULL,
  `tgl_input` datetime NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `nim` int(11) NOT NULL,
  `nama` varchar(500) NOT NULL,
  `tgl_pinjam` varchar(50) NOT NULL,
  `tgl_kembali` varchar(50) NOT NULL,
  `status` varchar(255) NOT NULL,
  `tgl_input` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(300) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `img_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama_lengkap`, `email`, `password`, `role`, `img_user`) VALUES
(2, 'Dimas Pramudya Pangestu', 'dimaspp@gmail.com', '$2y$10$r91wzi92xl/avFim6xvErOgkIIc5jUB0ASwWzd1Qau3UjxvGSlKoa', 'admin', 'iconuser.png'),
(3, 'Welly Pangestu Setiawan', 'wps@gmail.com', '$2y$10$W5w8GgwquPOKq3PAf8GE3Om.z8.OduMtOev2USkEP3bgQbFMLSoF6', 'admin', 'iconuser.png'),
(4, 'Gibran Hamas Annidal', 'gha@gmail.com', '$2y$10$5pRXtfo029Z5e5IF2o/cTeOo/yjc5vMdxNtkk1jWUUdACb8T1DlcC', 'admin', 'iconuser.png'),
(5, 'Tria Pratiwi', 'triapratiwi@gmail.com', '$2y$10$clAQK6BrC12O1zCpn6p1DujHdNnShror.u8s36GPazus3fKSs8eLK', 'admin', 'iconuser.png'),
(7, 'Fajar Adi Setyawan ', 'fajaras465@gmail.com', '$2y$10$fPuqH26bcI9Vr/xgZ6YcK.KIvbqU2oYHnzuWEyePk1hwaW9tol7sm', 'admin', 'iconuser.png'),
(8, 'INI AKUN USER', 'user@gmail.com', '$2y$10$NMonYQwSxEIvmPYgKJjckucpqciF5soN1hy55qpQgpf4viDA0Cajq', 'user', 'iconuser.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_buku`
--
ALTER TABLE `tb_buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
