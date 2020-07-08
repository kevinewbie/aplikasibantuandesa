-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2018 at 09:08 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bdesa`
--

-- --------------------------------------------------------

--
-- Table structure for table `keputusan_admin`
--

CREATE TABLE `keputusan_admin` (
  `id_keputusan` int(11) NOT NULL,
  `id_survey` int(11) NOT NULL,
  `keputusan` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keputusan_admin`
--

INSERT INTO `keputusan_admin` (`id_keputusan`, `id_survey`, `keputusan`) VALUES
(9, 9, 'BERHAK MENERIMA BANTUAN'),
(10, 10, 'BERHAK MENERIMA BANTUAN'),
(11, 12, 'BERHAK MENERIMA BANTUAN'),
(12, 13, 'TIDAK BERHAK ATAS BANTUAN'),
(13, 14, 'TIDAK BERHAK ATAS BANTUAN'),
(14, 15, 'BERHAK MENERIMA BANTUAN');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_gaji`
--

CREATE TABLE `riwayat_gaji` (
  `id_riwayat` int(11) NOT NULL,
  `id_survey` int(11) NOT NULL,
  `gaji` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `riwayat_gaji`
--

INSERT INTO `riwayat_gaji` (`id_riwayat`, `id_survey`, `gaji`) VALUES
(8, 6, '1.000.000-2.000.000'),
(9, 7, '>3.000.000'),
(10, 8, '1.000.000-2.000.000'),
(11, 9, '1.000.000-2.000.000'),
(12, 10, '1.000.000-2.000.000'),
(13, 11, '2.000.000-3.000.000'),
(14, 12, '2.000.000-3.000.000'),
(15, 13, '>3.000.000'),
(16, 14, '>3.000.000'),
(17, 15, '1.000.000-2.000.000');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_listrik`
--

CREATE TABLE `riwayat_listrik` (
  `id_riwayat` int(11) NOT NULL,
  `id_survey` int(11) NOT NULL,
  `listrik` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `riwayat_listrik`
--

INSERT INTO `riwayat_listrik` (`id_riwayat`, `id_survey`, `listrik`) VALUES
(3, 5, '900 watt'),
(4, 6, '900 watt'),
(5, 7, '1300watt'),
(6, 8, '900 watt'),
(7, 9, '900 watt'),
(8, 10, '900 watt'),
(9, 11, '1300watt'),
(10, 12, '900 watt'),
(11, 13, '2200watt'),
(12, 14, '1300watt'),
(13, 15, '900 watt');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_rumah`
--

CREATE TABLE `riwayat_rumah` (
  `id_riwayat` int(11) NOT NULL,
  `id_survey` int(11) NOT NULL,
  `luas_rumah` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `riwayat_rumah`
--

INSERT INTO `riwayat_rumah` (`id_riwayat`, `id_survey`, `luas_rumah`) VALUES
(1, 3, 'lebih 10m2/orang'),
(2, 4, '8m2-10m2/orang'),
(3, 5, 'kurang 8m2 / orang'),
(4, 6, '8m2-10m2/orang'),
(5, 7, 'lebih 10m2/orang'),
(6, 8, '8m2-10m2/orang'),
(7, 8, 'lebih 10m2/orang'),
(8, 9, 'kurang 8m2 / orang'),
(9, 10, 'kurang 8m2 / orang'),
(10, 11, 'lebih 10m2/orang'),
(11, 12, 'kurang 8m2 / orang'),
(12, 13, '8m2-10m2/orang'),
(13, 14, 'lebih 10m2/orang'),
(14, 15, '8m2-10m2/orang');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_tanggungan`
--

CREATE TABLE `riwayat_tanggungan` (
  `id_riwayat` int(11) NOT NULL,
  `id_survey` int(11) NOT NULL,
  `jumlah_tanggungan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `riwayat_tanggungan`
--

INSERT INTO `riwayat_tanggungan` (`id_riwayat`, `id_survey`, `jumlah_tanggungan`) VALUES
(7, 2, '5 atau lebih'),
(8, 3, '3'),
(9, 4, '4'),
(10, 5, '4'),
(11, 5, '4'),
(12, 6, '4'),
(13, 7, '2'),
(14, 8, '3'),
(15, 9, '3'),
(16, 10, '3'),
(17, 11, '2'),
(18, 12, '3'),
(19, 13, '2'),
(20, 14, '2'),
(21, 15, '5 atau lebih'),
(22, 15, '5 atau lebih'),
(23, 15, '5 atau lebih');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_air`
--

CREATE TABLE `tbl_air` (
  `id_air` int(4) NOT NULL,
  `air` varchar(30) NOT NULL,
  `bobot` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_air`
--

INSERT INTO `tbl_air` (`id_air`, `air`, `bobot`) VALUES
(1, 'Sendiri', 5),
(2, 'Numpang / Bersama Tetangga', 20);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gaji`
--

CREATE TABLE `tbl_gaji` (
  `id_gaji` int(11) NOT NULL,
  `gaji` varchar(20) NOT NULL,
  `bobot` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_gaji`
--

INSERT INTO `tbl_gaji` (`id_gaji`, `gaji`, `bobot`) VALUES
(1, '500.000-1.000.000', 20),
(2, '1.000.000-2.000.000', 15),
(3, '2.000.000-3.000.000', 10),
(4, '>3.000.000', 5),
(5, '&lt;500.000', 30);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hak_akses`
--

CREATE TABLE `tbl_hak_akses` (
  `id` int(11) NOT NULL,
  `id_user_level` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_hak_akses`
--

INSERT INTO `tbl_hak_akses` (`id`, `id_user_level`, `id_menu`) VALUES
(31, 1, 1),
(32, 1, 2),
(33, 1, 3),
(34, 1, 9),
(35, 1, 10),
(36, 1, 11),
(37, 1, 12),
(38, 1, 13),
(39, 1, 14),
(40, 1, 15),
(41, 1, 16),
(42, 1, 17),
(43, 1, 18),
(44, 1, 19),
(45, 1, 20),
(46, 1, 21),
(47, 2, 21),
(48, 2, 20);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_keputusan`
--

CREATE TABLE `tbl_keputusan` (
  `id_keputusan` int(11) NOT NULL,
  `keputusan` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_keputusan`
--

INSERT INTO `tbl_keputusan` (`id_keputusan`, `keputusan`) VALUES
(2, 'BERHAK MENERIMA BANTUAN'),
(3, 'TIDAK BERHAK ATAS BANTUAN');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_listrik`
--

CREATE TABLE `tbl_listrik` (
  `id_listrik` int(3) NOT NULL,
  `listrik` varchar(25) NOT NULL,
  `bobot` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_listrik`
--

INSERT INTO `tbl_listrik` (`id_listrik`, `listrik`, `bobot`) VALUES
(1, '900 watt', 20),
(2, '1300watt', 5),
(3, '2200watt', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id_menu` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `url` varchar(30) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `is_main_menu` int(11) NOT NULL,
  `is_aktif` enum('y','n') NOT NULL COMMENT 'y=yes,n=no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`id_menu`, `title`, `url`, `icon`, `is_main_menu`, `is_aktif`) VALUES
(1, 'KELOLA MENU', 'kelolamenu', 'fa fa-server', 0, 'n'),
(2, 'KELOLA PENGGUNA', 'user', 'fa fa-user-o', 0, 'n'),
(3, 'level PENGGUNA', 'userlevel', 'fa fa-users', 0, 'n'),
(9, 'Contoh Form', 'welcome/form', 'fa fa-id-card', 0, 'n'),
(10, 'WARGA', 'warga', 'fa fa-users', 19, 'y'),
(12, 'PETUGAS', 'petugas', 'fa fa-briefcase', 19, 'y'),
(13, 'DATA HITUNG', '#', 'fa fa-laptop', 0, 'y'),
(14, 'AIR', 'air', 'fa fa-tint', 13, 'y'),
(15, 'GAJI', 'gaji', 'fa fa-money', 13, 'y'),
(16, 'LISTRIK', 'listrik', 'fa fa-bolt', 13, 'y'),
(17, 'RUMAH', 'rumah', 'fa fa-home', 13, 'y'),
(18, 'TANGGUNGAN', 'tanggungan', 'fa fa-users', 13, 'y'),
(19, 'DATA MASTER', '#', 'fa fa-database', 0, 'y'),
(20, 'PERHITUNGAN SURVEY', 'survey', 'fa fa-align-justify', 0, 'y'),
(21, 'CETAK LAPORAN WARGA', 'survey/cetak_daftar', 'fa fa-print', 0, 'y');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_petugas`
--

CREATE TABLE `tbl_petugas` (
  `id_petugas` int(10) NOT NULL,
  `nama_petugas` varchar(35) NOT NULL,
  `jabatan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_petugas`
--

INSERT INTO `tbl_petugas` (`id_petugas`, `nama_petugas`, `jabatan`) VALUES
(1, 'Ahmad Musyadi', 'PENCATAT SENSUS'),
(3, 'Budiman', 'PENCATAT SENSUS'),
(4, 'Sunaryo', 'PENCATAT SENSUS');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rumah`
--

CREATE TABLE `tbl_rumah` (
  `id_rumah` int(4) NOT NULL,
  `luas_rumah` varchar(30) NOT NULL,
  `bobot` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_rumah`
--

INSERT INTO `tbl_rumah` (`id_rumah`, `luas_rumah`, `bobot`) VALUES
(1, 'kurang 8m2 / orang', 20),
(2, '8m2-10m2/orang', 10),
(3, 'lebih 10m2/orang', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_setting`
--

CREATE TABLE `tbl_setting` (
  `id_setting` int(11) NOT NULL,
  `nama_setting` varchar(50) NOT NULL,
  `value` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_setting`
--

INSERT INTO `tbl_setting` (`id_setting`, `nama_setting`, `value`) VALUES
(1, 'Tampil Menu', 'ya');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_survey`
--

CREATE TABLE `tbl_survey` (
  `id_survey` int(10) NOT NULL,
  `nama_kk` varchar(35) NOT NULL,
  `no_kk` varchar(20) NOT NULL,
  `tanggal_survey` date NOT NULL,
  `nama_petugas` varchar(35) NOT NULL,
  `jumlah_tanggungan` int(5) NOT NULL,
  `penghasilan` varchar(30) NOT NULL,
  `luas_rumah` varchar(25) NOT NULL,
  `listrik` varchar(30) NOT NULL,
  `sumber_air` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_survey`
--

INSERT INTO `tbl_survey` (`id_survey`, `nama_kk`, `no_kk`, `tanggal_survey`, `nama_petugas`, `jumlah_tanggungan`, `penghasilan`, `luas_rumah`, `listrik`, `sumber_air`) VALUES
(14, 'Budi Jatmiko', '28545670982345', '2018-07-12', 'Sunaryo', 2, '3.500.000', '23m2', '1300watt', 'sudah dihitung'),
(15, 'Santoso', '98620912764126', '2018-07-12', 'Sunaryo', 5, '1.750.000', '10m2', '900watt', 'Belum Dihitung');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tanggungan`
--

CREATE TABLE `tbl_tanggungan` (
  `id_tanggungan` int(4) NOT NULL,
  `jumlah_tanggungan` varchar(20) NOT NULL,
  `bobot` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tanggungan`
--

INSERT INTO `tbl_tanggungan` (`id_tanggungan`, `jumlah_tanggungan`, `bobot`) VALUES
(1, '5 atau lebih', 30),
(2, '4', 20),
(3, '3', 15),
(4, '2', 10),
(5, '1', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_users` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `images` text NOT NULL,
  `id_user_level` int(11) NOT NULL,
  `is_aktif` enum('y','n') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_users`, `full_name`, `email`, `password`, `images`, `id_user_level`, `is_aktif`) VALUES
(1, 'Administrator', 'admin@go.id', '$2y$04$Wbyfv4xwihb..POfhxY5Y.jHOJqEFIG3dLfBYwAmnOACpH0EWCCdq', 'atomix_user31.png', 1, 'y'),
(3, 'PIMPINAN', 'pimpinan@go.id', '$2y$04$Wbyfv4xwihb..POfhxY5Y.jHOJqEFIG3dLfBYwAmnOACpH0EWCCdq', '7.png', 2, 'y');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_level`
--

CREATE TABLE `tbl_user_level` (
  `id_user_level` int(11) NOT NULL,
  `nama_level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_level`
--

INSERT INTO `tbl_user_level` (`id_user_level`, `nama_level`) VALUES
(1, 'Super Admin'),
(2, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_warga`
--

CREATE TABLE `tbl_warga` (
  `id_warga` int(3) NOT NULL,
  `no_kk` varchar(20) NOT NULL,
  `nik_warga` varchar(20) NOT NULL,
  `nama_kk` varchar(35) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan','','') NOT NULL,
  `alamat` text NOT NULL,
  `agama` enum('islam','kristen','budha','hindu') NOT NULL,
  `pekerjaan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_warga`
--

INSERT INTO `tbl_warga` (`id_warga`, `no_kk`, `nik_warga`, `nama_kk`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `agama`, `pekerjaan`) VALUES
(11, '98620912764126', '412356912008812256', 'Santoso', 'Sragen', '1972-12-05', 'Laki-laki', 'Jl. Kejaksaan', 'islam', 'Buruh'),
(12, '28545670982345', '116531000891223', 'Budi Jatmiko', 'DURI', '1972-12-06', 'Laki-laki', 'Jl.Sudirman', 'islam', 'Buruh MANDOR');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `keputusan_admin`
--
ALTER TABLE `keputusan_admin`
  ADD PRIMARY KEY (`id_keputusan`);

--
-- Indexes for table `riwayat_gaji`
--
ALTER TABLE `riwayat_gaji`
  ADD PRIMARY KEY (`id_riwayat`);

--
-- Indexes for table `riwayat_listrik`
--
ALTER TABLE `riwayat_listrik`
  ADD PRIMARY KEY (`id_riwayat`);

--
-- Indexes for table `riwayat_rumah`
--
ALTER TABLE `riwayat_rumah`
  ADD PRIMARY KEY (`id_riwayat`);

--
-- Indexes for table `riwayat_tanggungan`
--
ALTER TABLE `riwayat_tanggungan`
  ADD PRIMARY KEY (`id_riwayat`);

--
-- Indexes for table `tbl_air`
--
ALTER TABLE `tbl_air`
  ADD PRIMARY KEY (`id_air`);

--
-- Indexes for table `tbl_gaji`
--
ALTER TABLE `tbl_gaji`
  ADD PRIMARY KEY (`id_gaji`);

--
-- Indexes for table `tbl_hak_akses`
--
ALTER TABLE `tbl_hak_akses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_keputusan`
--
ALTER TABLE `tbl_keputusan`
  ADD PRIMARY KEY (`id_keputusan`);

--
-- Indexes for table `tbl_listrik`
--
ALTER TABLE `tbl_listrik`
  ADD PRIMARY KEY (`id_listrik`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `tbl_petugas`
--
ALTER TABLE `tbl_petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `tbl_rumah`
--
ALTER TABLE `tbl_rumah`
  ADD PRIMARY KEY (`id_rumah`);

--
-- Indexes for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indexes for table `tbl_survey`
--
ALTER TABLE `tbl_survey`
  ADD PRIMARY KEY (`id_survey`);

--
-- Indexes for table `tbl_tanggungan`
--
ALTER TABLE `tbl_tanggungan`
  ADD PRIMARY KEY (`id_tanggungan`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_users`);

--
-- Indexes for table `tbl_user_level`
--
ALTER TABLE `tbl_user_level`
  ADD PRIMARY KEY (`id_user_level`);

--
-- Indexes for table `tbl_warga`
--
ALTER TABLE `tbl_warga`
  ADD PRIMARY KEY (`id_warga`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `keputusan_admin`
--
ALTER TABLE `keputusan_admin`
  MODIFY `id_keputusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `riwayat_gaji`
--
ALTER TABLE `riwayat_gaji`
  MODIFY `id_riwayat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `riwayat_listrik`
--
ALTER TABLE `riwayat_listrik`
  MODIFY `id_riwayat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `riwayat_rumah`
--
ALTER TABLE `riwayat_rumah`
  MODIFY `id_riwayat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `riwayat_tanggungan`
--
ALTER TABLE `riwayat_tanggungan`
  MODIFY `id_riwayat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_air`
--
ALTER TABLE `tbl_air`
  MODIFY `id_air` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_gaji`
--
ALTER TABLE `tbl_gaji`
  MODIFY `id_gaji` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_hak_akses`
--
ALTER TABLE `tbl_hak_akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `tbl_keputusan`
--
ALTER TABLE `tbl_keputusan`
  MODIFY `id_keputusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_listrik`
--
ALTER TABLE `tbl_listrik`
  MODIFY `id_listrik` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_petugas`
--
ALTER TABLE `tbl_petugas`
  MODIFY `id_petugas` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_rumah`
--
ALTER TABLE `tbl_rumah`
  MODIFY `id_rumah` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_survey`
--
ALTER TABLE `tbl_survey`
  MODIFY `id_survey` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_tanggungan`
--
ALTER TABLE `tbl_tanggungan`
  MODIFY `id_tanggungan` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_user_level`
--
ALTER TABLE `tbl_user_level`
  MODIFY `id_user_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_warga`
--
ALTER TABLE `tbl_warga`
  MODIFY `id_warga` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
