-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2019 at 08:43 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simsurat`
--

-- --------------------------------------------------------

--
-- Table structure for table `arsip_keluar`
--

CREATE TABLE `arsip_keluar` (
  `ID` int(11) NOT NULL,
  `NIP` varchar(20) DEFAULT NULL,
  `ID_SURAT` int(11) DEFAULT NULL,
  `TANGGAL` date DEFAULT NULL,
  `KETERANGAN` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `arsip_masuk`
--

CREATE TABLE `arsip_masuk` (
  `ID` int(11) NOT NULL,
  `NIP` varchar(20) DEFAULT NULL,
  `ID_SURAT` int(11) DEFAULT NULL,
  `TANGGAL` date DEFAULT NULL,
  `KETERANGAN` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `disposisi`
--

CREATE TABLE `disposisi` (
  `ID` int(11) NOT NULL,
  `NIP` varchar(20) DEFAULT NULL,
  `ID_SURAT` int(11) DEFAULT NULL,
  `KEPADA` varchar(255) DEFAULT NULL,
  `TANGGAL` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inaktif`
--

CREATE TABLE `inaktif` (
  `ID_INAKTIF` int(11) NOT NULL,
  `ID_JENIS` int(11) DEFAULT NULL,
  `MASA_AKTIF` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inaktif`
--

INSERT INTO `inaktif` (`ID_INAKTIF`, `ID_JENIS`, `MASA_AKTIF`) VALUES
(1, 1, 2),
(2, 2, 1),
(3, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `ID_JABATAN` int(11) NOT NULL,
  `NAMA` varchar(100) DEFAULT NULL,
  `ID_KEPALA` int(11) DEFAULT NULL,
  `STATUS_DISPOSISI` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`ID_JABATAN`, `NAMA`, `ID_KEPALA`, `STATUS_DISPOSISI`) VALUES
(1, 'Administrator', 2, 0),
(2, 'Kepala Kantor', NULL, 1),
(4, 'Kepala Seksi Administrasi', 2, 1),
(5, 'Seksi Administrasi', 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_retensi`
--

CREATE TABLE `jadwal_retensi` (
  `ID_JADWAL` int(11) NOT NULL,
  `ID_JENIS` int(11) DEFAULT NULL,
  `MASA_RETENSI` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_retensi`
--

INSERT INTO `jadwal_retensi` (`ID_JADWAL`, `ID_JENIS`, `MASA_RETENSI`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_surat`
--

CREATE TABLE `jenis_surat` (
  `ID_JENIS` int(11) NOT NULL,
  `NAMA` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_surat`
--

INSERT INTO `jenis_surat` (`ID_JENIS`, `NAMA`) VALUES
(1, 'Penting'),
(2, 'Tidak Penting'),
(3, 'Rahasia');

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `ID_LOKASI` int(11) NOT NULL,
  `NAMA` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`ID_LOKASI`, `NAMA`) VALUES
(1, 'Resepsionis');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `ID_MEDIA` int(11) NOT NULL,
  `NAMA` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`ID_MEDIA`, `NAMA`) VALUES
(1, 'Hardcopy'),
(2, 'Softcopy');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `NIP` varchar(20) NOT NULL,
  `ID_UNIT` int(11) DEFAULT NULL,
  `ID_JABATAN` int(11) DEFAULT NULL,
  `NAMA` varchar(100) DEFAULT NULL,
  `TANGGAL_LAHIR` date DEFAULT NULL,
  `JENIS_KELAMIN` char(1) DEFAULT NULL,
  `ALAMAT` varchar(255) DEFAULT NULL,
  `TANGGAL_PENGANGKATAN` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`NIP`, `ID_UNIT`, `ID_JABATAN`, `NAMA`, `TANGGAL_LAHIR`, `JENIS_KELAMIN`, `ALAMAT`, `TANGGAL_PENGANGKATAN`) VALUES
('199209012015041001', 1, 1, 'Admin', '1992-09-01', 'L', 'Jalan Santawi', '2015-04-01'),
('199304012015111001', 1, 5, 'Ahmad', '1993-04-01', 'L', 'Jalan Sekarputih', '2015-11-29'),
('199306122019061001', 2, 5, 'Aji Mukti Rizkio', '1993-06-12', 'L', 'Jalan Ki Ronggo', '2019-06-10'),
('199306142015111001', 2, 4, 'Bapuk', '1993-06-14', 'L', 'Jalan A Yani', '2015-11-29'),
('199308312014061001', 1, 2, 'Eri', '1993-08-31', 'P', 'Jalan Tamansari', '2014-06-17'),
('199406052018061001', 1, 1, 'Rizky Vadilla', '1994-06-05', 'L', 'Jalan Semput', '2018-06-20'),
('199406122019061001', 3, 5, 'Maratus ', '1994-06-12', 'L', 'Jalan Wongsorejo', '2019-06-04');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `ID` int(11) NOT NULL,
  `NIP` varchar(20) DEFAULT NULL,
  `ID_SURAT` int(11) DEFAULT NULL,
  `KEPERLUAN` varchar(255) DEFAULT NULL,
  `TANGGAL_PINJAM` date DEFAULT NULL,
  `LAMA_PINJAM` int(11) DEFAULT NULL,
  `TANGGAL_KEMBALI` date DEFAULT NULL,
  `STATUS_PINJAM` enum('telat','kembali','menunggu','pinjam') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`ID`, `NIP`, `ID_SURAT`, `KEPERLUAN`, `TANGGAL_PINJAM`, `LAMA_PINJAM`, `TANGGAL_KEMBALI`, `STATUS_PINJAM`) VALUES
(1, '199209012015041001', 1, 'Nyoba nyeleh, oleh gak seh...???', '2015-11-17', 4, '2015-11-21', 'menunggu'),
(2, '199308312014061001', 3, 'Nyoba', '2015-11-16', 4, '2015-11-20', 'telat'),
(3, '199308312014061001', 2, 'gdfgdfgdfhyujytu', '2015-11-24', 4, '2015-11-28', 'menunggu'),
(4, '199308312014061001', 4, 'gdfgdfgdfhyujytu', '2015-11-19', 4, '2015-11-23', 'kembali'),
(5, '199308312014061001', 1, 'gdfgdfgdfhyujytu', '2015-11-24', 4, '2015-11-28', 'menunggu');

-- --------------------------------------------------------

--
-- Table structure for table `penggandaan`
--

CREATE TABLE `penggandaan` (
  `ID` int(11) NOT NULL,
  `NIP` varchar(20) DEFAULT NULL,
  `ID_SURAT` int(11) DEFAULT NULL,
  `TUJUAN` varchar(255) DEFAULT NULL,
  `TANGGAL` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `ID_PENGGUNA` int(11) NOT NULL,
  `NIP` varchar(20) DEFAULT NULL,
  `EMAIL` varchar(100) DEFAULT NULL,
  `PASSWORD` varchar(50) DEFAULT NULL,
  `PREVILAGE` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`ID_PENGGUNA`, `NIP`, `EMAIL`, `PASSWORD`, `PREVILAGE`) VALUES
(0, '199306142015111001', 'user2@gmail.com', '202cb962ac59075b964b07152d234b70', 0),
(1, '199304012015111001', 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', 1),
(2, '199308312014061001', 'user@gmail.com', '202cb962ac59075b964b07152d234b70', 0);

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_inaktif`
--

CREATE TABLE `riwayat_inaktif` (
  `ID` int(11) NOT NULL,
  `ID_SURAT` int(11) DEFAULT NULL,
  `ID_INAKTIF` int(11) DEFAULT NULL,
  `TANGGAL_INAKTIF` date DEFAULT NULL,
  `TANGGAL_AKTIF_KEMBALI` date DEFAULT NULL,
  `STATUS` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_retensi`
--

CREATE TABLE `riwayat_retensi` (
  `ID` int(11) NOT NULL,
  `ID_SURAT` int(11) DEFAULT NULL,
  `ID_JADWAL` int(11) DEFAULT NULL,
  `TANGGAL_RETENSI` date DEFAULT NULL,
  `STATUS` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `surat`
--

CREATE TABLE `surat` (
  `ID_SURAT` int(11) NOT NULL,
  `ID_LOKASI` int(11) DEFAULT NULL,
  `ID_JENIS` int(11) DEFAULT NULL,
  `ID_MEDIA` int(11) DEFAULT NULL,
  `JUDUL_KOP` varchar(255) DEFAULT NULL,
  `NOMOR` varchar(50) DEFAULT NULL,
  `TANGGAL` date DEFAULT NULL,
  `PERIHAL` varchar(255) DEFAULT NULL,
  `DARI` varchar(100) DEFAULT NULL,
  `KEPADA` varchar(100) DEFAULT NULL,
  `ASAL_INSTANSI` varchar(100) DEFAULT NULL,
  `TANGGAL_MASUK` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat`
--

INSERT INTO `surat` (`ID_SURAT`, `ID_LOKASI`, `ID_JENIS`, `ID_MEDIA`, `JUDUL_KOP`, `NOMOR`, `TANGGAL`, `PERIHAL`, `DARI`, `KEPADA`, `ASAL_INSTANSI`, `TANGGAL_MASUK`) VALUES
(0, NULL, 1, NULL, 'Testing', '121212', '2019-06-19', 'ASDasd', 'asdas', 'asdas', 'asdasds', '2019-06-20'),
(1, 1, 2, 2, 'Nyoba Ubah Surat', 'KPKNL-XII/23/2015', '2015-11-15', 'Nyoba Ngubah Surat', 'Septyan', 'Oby Hermawan', 'Kupucorp', '2015-11-16'),
(2, 1, 1, 1, 'serserdyrtwer', 'eew32323', '2015-11-16', 'sdsadefreterter', 'ghftytdrgdfgfrg', 'dsfsrtwerwedsf', 'dfrtsdfgsderewr', '2015-11-17'),
(3, 1, 1, 1, 'surat talak tilu', 'sl-1234', '2015-11-18', 'sangat rahasia', 'panitera', 'kasi PBB', 'Pengadilan agama', '2015-11-19'),
(4, 1, 2, 1, 'keluar 1', 'KPKNL-1/11/2015', '2015-11-19', 'keluar', 'dalam', 'keluar', 'kpknl', '1970-01-01'),
(5, 1, 1, 1, 'Nyoba', '323-KJAS-2015', '2015-11-23', 'Emboh', 'Septyan', 'Oby', 'Kupucorp', '2015-11-23'),
(6, NULL, 2, NULL, '098098908', '11212', '2019-06-20', 'aas', 'asda', 'asasd', 'sadas', '2019-06-20'),
(7, NULL, 1, NULL, 'asdaad', 'asdasd', '2019-06-19', 'aadsad', 'akjdaskdjhaksdj', 'akjhdkasjdkajhs', 'kajsdjahdkajhd', '2019-06-20'),
(8, NULL, 1, NULL, 'adasasd', 'asdasd', '2019-06-05', 'adsad', 'asdad', 'asdad', 'asdadadd', '2019-06-20'),
(9, NULL, 2, NULL, 'asdasdad', '1281281218', '2019-06-19', 'Pera', 'Hasb', 'ASDn', 'Lokal', '2019-06-19'),
(10, NULL, 3, NULL, 'Testing', '123333', '2019-06-20', 'Nyoba', 'Oby', 'Sayaya', 'Lokal', '2019-06-21'),
(11, NULL, 1, NULL, 'Testing', 'Testing Lagi', '2019-06-19', 'Test 2', 'Test 3 ', 'Test 4', 'Resepsionis', '2019-06-20'),
(12, NULL, 1, NULL, 'Testing', 'Testing Lagi', '2019-06-19', 'aadsad', 'r', 'as', 'Asd', '2019-06-20'),
(13, NULL, 1, NULL, 'Balikin', 'Balikin', '2019-06-19', 'DDlk', 'ASDasd', 'asdasdlkajsklj', 'ALSkdjalkdjsdja', '2019-06-20'),
(14, NULL, 2, NULL, 'Taek', 'Taek2', '2019-06-19', 'Taek3', 'Taek4', 'Taek5', 'Taek6', '2019-06-20'),
(15, NULL, 3, NULL, 'ASKdaskd', 'akdjsakjhsd', '2019-06-27', 'asdsdas', 'asdasdasd', 'asdadsd', 'asdsadadads', '2019-06-28'),
(16, NULL, 2, NULL, 'asdsadad', 'adasasdda', '2019-06-19', 'fasdasd', 'zxzxczcxasdsd', 'asdAd', 'qwqwqw', '2019-06-19'),
(17, NULL, 2, NULL, 'coba', 'coba', '2019-06-20', 'coba', 'coba', 'coba', 'coba', '2019-06-20');

-- --------------------------------------------------------

--
-- Table structure for table `unit_kerja`
--

CREATE TABLE `unit_kerja` (
  `ID_UNIT` int(11) NOT NULL,
  `NAMA` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit_kerja`
--

INSERT INTO `unit_kerja` (`ID_UNIT`, `NAMA`) VALUES
(1, 'Unit Kerja 1'),
(2, 'Unit Kerja 2'),
(3, 'Unit Kerja 3');

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE `upload` (
  `ID_UPLOAD` int(11) NOT NULL,
  `ID_SURAT` int(11) DEFAULT NULL,
  `NAMA_DOKUMEN` varchar(255) DEFAULT NULL,
  `DOKUMEN_ID` varchar(80) DEFAULT NULL,
  `NAMA_ENKRIP` varchar(80) DEFAULT NULL,
  `TANGGAL` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upload`
--

INSERT INTO `upload` (`ID_UPLOAD`, `ID_SURAT`, `NAMA_DOKUMEN`, `DOKUMEN_ID`, `NAMA_ENKRIP`, `TANGGAL`) VALUES
(1, 1, 'http://localhost/simsurat/uploads/surat/SyntaxJScript.pdf', NULL, NULL, '2019-06-19 13:38:04'),
(2, 1, 'http://localhost/simsurat/uploads/surat/Berita_Acara.docx', NULL, NULL, '2019-06-19 13:38:04'),
(3, 1, 'http://localhost/simsurat/uploads/surat/berita_acara_sidang_proposal.png', NULL, NULL, '2019-06-19 13:38:04'),
(5, 2, 'http://localhost/simsurat/uploads/surat/Surat_Permohonan_Dispensasi.docx', NULL, NULL, '2019-06-19 13:38:04'),
(7, 3, 'http://localhost/simsurat/uploads/surat/Curiculum_Vitae_(CV)_-_NEW.pdf', NULL, NULL, '2019-06-19 13:38:04'),
(8, 5, 'http://localhost/simsurat/uploads/surat/Curiculum_Vitae_(CV)_-_NEW1.pdf', NULL, NULL, '2019-06-19 13:38:04'),
(9, 9, 'http://localhost/simap/uploads/surat/Surat_Permohonan_Dispensasi2.docx', NULL, NULL, '2019-06-19 13:38:04'),
(10, 17, 'Cara Membuat Matriks Perbandingan Berpasangan AHP - Script Source Code – Contoh Program Aplikasi PHP(1).html', '46825', '46825_Cara Membuat Matriks Perbandingan Berpasangan AHP - Script Source Code – C', '2019-06-19 23:47:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arsip_keluar`
--
ALTER TABLE `arsip_keluar`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_REFERENCE_13` (`ID_SURAT`),
  ADD KEY `FK_REFERENCE_26` (`NIP`);

--
-- Indexes for table `arsip_masuk`
--
ALTER TABLE `arsip_masuk`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_REFERENCE_11` (`ID_SURAT`),
  ADD KEY `FK_REFERENCE_25` (`NIP`);

--
-- Indexes for table `disposisi`
--
ALTER TABLE `disposisi`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_REFERENCE_15` (`ID_SURAT`),
  ADD KEY `FK_REFERENCE_27` (`NIP`);

--
-- Indexes for table `inaktif`
--
ALTER TABLE `inaktif`
  ADD PRIMARY KEY (`ID_INAKTIF`),
  ADD KEY `FK_REFERENCE_8` (`ID_JENIS`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`ID_JABATAN`),
  ADD KEY `FK_JABATAN1` (`ID_KEPALA`);

--
-- Indexes for table `jadwal_retensi`
--
ALTER TABLE `jadwal_retensi`
  ADD PRIMARY KEY (`ID_JADWAL`),
  ADD KEY `FK_REFERENCE_9` (`ID_JENIS`);

--
-- Indexes for table `jenis_surat`
--
ALTER TABLE `jenis_surat`
  ADD PRIMARY KEY (`ID_JENIS`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`ID_LOKASI`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`ID_MEDIA`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`NIP`),
  ADD KEY `FK_REFERENCE_3` (`ID_JABATAN`),
  ADD KEY `FK_REFERENCE_2` (`ID_UNIT`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_REFERENCE_17` (`ID_SURAT`),
  ADD KEY `FK_REFERENCE_28` (`NIP`);

--
-- Indexes for table `penggandaan`
--
ALTER TABLE `penggandaan`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_REFERENCE_22` (`ID_SURAT`),
  ADD KEY `FK_REFERENCE_24` (`NIP`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`ID_PENGGUNA`),
  ADD KEY `FK_REFERENCE_23` (`NIP`);

--
-- Indexes for table `riwayat_inaktif`
--
ALTER TABLE `riwayat_inaktif`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_REFERENCE_18` (`ID_SURAT`),
  ADD KEY `FK_REFERENCE_19` (`ID_INAKTIF`);

--
-- Indexes for table `riwayat_retensi`
--
ALTER TABLE `riwayat_retensi`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_REFERENCE_20` (`ID_SURAT`),
  ADD KEY `FK_REFERENCE_21` (`ID_JADWAL`);

--
-- Indexes for table `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`ID_SURAT`),
  ADD KEY `FK_REFERENCE_5` (`ID_LOKASI`),
  ADD KEY `FK_REFERENCE_7` (`ID_JENIS`),
  ADD KEY `FK_REFERENCE_51` (`ID_MEDIA`) USING BTREE;

--
-- Indexes for table `unit_kerja`
--
ALTER TABLE `unit_kerja`
  ADD PRIMARY KEY (`ID_UNIT`);

--
-- Indexes for table `upload`
--
ALTER TABLE `upload`
  ADD PRIMARY KEY (`ID_UPLOAD`),
  ADD KEY `FK_REFERENCE_4` (`ID_SURAT`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `arsip_keluar`
--
ALTER TABLE `arsip_keluar`
  ADD CONSTRAINT `FK_REFERENCE_13` FOREIGN KEY (`ID_SURAT`) REFERENCES `surat` (`ID_SURAT`),
  ADD CONSTRAINT `FK_REFERENCE_26` FOREIGN KEY (`NIP`) REFERENCES `pegawai` (`NIP`);

--
-- Constraints for table `arsip_masuk`
--
ALTER TABLE `arsip_masuk`
  ADD CONSTRAINT `FK_REFERENCE_11` FOREIGN KEY (`ID_SURAT`) REFERENCES `surat` (`ID_SURAT`),
  ADD CONSTRAINT `FK_REFERENCE_25` FOREIGN KEY (`NIP`) REFERENCES `pegawai` (`NIP`);

--
-- Constraints for table `disposisi`
--
ALTER TABLE `disposisi`
  ADD CONSTRAINT `FK_REFERENCE_15` FOREIGN KEY (`ID_SURAT`) REFERENCES `surat` (`ID_SURAT`),
  ADD CONSTRAINT `FK_REFERENCE_27` FOREIGN KEY (`NIP`) REFERENCES `pegawai` (`NIP`);

--
-- Constraints for table `inaktif`
--
ALTER TABLE `inaktif`
  ADD CONSTRAINT `FK_REFERENCE_8` FOREIGN KEY (`ID_JENIS`) REFERENCES `jenis_surat` (`ID_JENIS`);

--
-- Constraints for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD CONSTRAINT `FK_JABATAN1` FOREIGN KEY (`ID_KEPALA`) REFERENCES `jabatan` (`ID_JABATAN`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `jadwal_retensi`
--
ALTER TABLE `jadwal_retensi`
  ADD CONSTRAINT `FK_REFERENCE_9` FOREIGN KEY (`ID_JENIS`) REFERENCES `jenis_surat` (`ID_JENIS`);

--
-- Constraints for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `FK_REFERENCE_2` FOREIGN KEY (`ID_UNIT`) REFERENCES `unit_kerja` (`ID_UNIT`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `FK_REFERENCE_3` FOREIGN KEY (`ID_JABATAN`) REFERENCES `jabatan` (`ID_JABATAN`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `FK_REFERENCE_17` FOREIGN KEY (`ID_SURAT`) REFERENCES `surat` (`ID_SURAT`),
  ADD CONSTRAINT `FK_REFERENCE_28` FOREIGN KEY (`NIP`) REFERENCES `pegawai` (`NIP`);

--
-- Constraints for table `penggandaan`
--
ALTER TABLE `penggandaan`
  ADD CONSTRAINT `FK_REFERENCE_22` FOREIGN KEY (`ID_SURAT`) REFERENCES `surat` (`ID_SURAT`),
  ADD CONSTRAINT `FK_REFERENCE_24` FOREIGN KEY (`NIP`) REFERENCES `pegawai` (`NIP`);

--
-- Constraints for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD CONSTRAINT `FK_REFERENCE_23` FOREIGN KEY (`NIP`) REFERENCES `pegawai` (`NIP`) ON DELETE CASCADE;

--
-- Constraints for table `riwayat_inaktif`
--
ALTER TABLE `riwayat_inaktif`
  ADD CONSTRAINT `FK_REFERENCE_18` FOREIGN KEY (`ID_SURAT`) REFERENCES `surat` (`ID_SURAT`),
  ADD CONSTRAINT `FK_REFERENCE_19` FOREIGN KEY (`ID_INAKTIF`) REFERENCES `inaktif` (`ID_INAKTIF`);

--
-- Constraints for table `riwayat_retensi`
--
ALTER TABLE `riwayat_retensi`
  ADD CONSTRAINT `FK_REFERENCE_20` FOREIGN KEY (`ID_SURAT`) REFERENCES `surat` (`ID_SURAT`),
  ADD CONSTRAINT `FK_REFERENCE_21` FOREIGN KEY (`ID_JADWAL`) REFERENCES `jadwal_retensi` (`ID_JADWAL`);

--
-- Constraints for table `surat`
--
ALTER TABLE `surat`
  ADD CONSTRAINT `FK_REFERENCE_5` FOREIGN KEY (`ID_LOKASI`) REFERENCES `lokasi` (`ID_LOKASI`),
  ADD CONSTRAINT `FK_REFERENCE_51` FOREIGN KEY (`ID_MEDIA`) REFERENCES `media` (`ID_MEDIA`),
  ADD CONSTRAINT `FK_REFERENCE_7` FOREIGN KEY (`ID_JENIS`) REFERENCES `jenis_surat` (`ID_JENIS`);

--
-- Constraints for table `upload`
--
ALTER TABLE `upload`
  ADD CONSTRAINT `FK_REFERENCE_4` FOREIGN KEY (`ID_SURAT`) REFERENCES `surat` (`ID_SURAT`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
