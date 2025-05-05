-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2025 at 02:13 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kepegawaian`
--

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` varchar(100) NOT NULL,
  `nik` int(11) NOT NULL,
  `nik_lama` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nm_pgl` varchar(100) DEFAULT NULL,
  `gelar1` varchar(100) NOT NULL,
  `gelar2` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `tpt_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `gol_dar` varchar(2) NOT NULL,
  `tinggi` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `agama` varchar(100) NOT NULL,
  `pend_terakhir` varchar(100) DEFAULT NULL,
  `no_ktp` varchar(50) NOT NULL,
  `no_kk` varchar(20) NOT NULL,
  `alamat_ktp` varchar(100) NOT NULL,
  `alamat_dom` varchar(100) NOT NULL,
  `telpon1` varchar(20) NOT NULL,
  `telpon2` varchar(20) NOT NULL,
  `no_telp_keluarga` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status_aktif` int(11) NOT NULL,
  `tgl_pengajuan` date DEFAULT NULL,
  `tgl_keluar` date DEFAULT NULL,
  `alasan_keluar` varchar(100) NOT NULL,
  `ket_keluar` text NOT NULL,
  `status_pegawai` varchar(100) NOT NULL,
  `no_SK` varchar(100) DEFAULT NULL,
  `no_dplk` varchar(100) DEFAULT NULL,
  `fungsi` varchar(100) NOT NULL,
  `status_kwn` varchar(100) NOT NULL,
  `no_bpjs_kes` varchar(100) NOT NULL,
  `no_bpjs_tkerja` varchar(100) NOT NULL,
  `tgl_kerja` date DEFAULT NULL,
  `tgl_diangkat_pwtt` date DEFAULT NULL,
  `tgl_cuti` date DEFAULT NULL,
  `id_medis` varchar(100) NOT NULL,
  `no_strsip` varchar(100) DEFAULT NULL COMMENT 'Nomor STR & SIP',
  `tgl_strsip` varchar(15) DEFAULT NULL COMMENT 'Berlaku Nomor STR & SIP',
  `gol` varchar(100) NOT NULL,
  `sgt` varchar(100) NOT NULL,
  `id_eselon` varchar(100) NOT NULL,
  `tmt_sgt` varchar(100) NOT NULL,
  `tmt_gol` varchar(100) NOT NULL,
  `tmt_eselon` varchar(100) NOT NULL,
  `stat_pajak` varchar(100) NOT NULL,
  `tk_pajak` varchar(100) NOT NULL,
  `pjk_mulai` varchar(100) NOT NULL,
  `pjk_akhir` varchar(100) NOT NULL,
  `npwp` varchar(100) NOT NULL,
  `tgl_npwp` date DEFAULT NULL,
  `id_bank` varchar(23) DEFAULT NULL,
  `no_rek` varchar(100) DEFAULT NULL,
  `atas_nm` varchar(100) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `jatah_cuti` varchar(10) DEFAULT NULL,
  `bar_code` varchar(100) NOT NULL,
  `qr_code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nik`, `nik_lama`, `nama`, `nm_pgl`, `gelar1`, `gelar2`, `jenis_kelamin`, `tpt_lahir`, `tgl_lahir`, `gol_dar`, `tinggi`, `berat`, `agama`, `pend_terakhir`, `no_ktp`, `no_kk`, `alamat_ktp`, `alamat_dom`, `telpon1`, `telpon2`, `no_telp_keluarga`, `email`, `status_aktif`, `tgl_pengajuan`, `tgl_keluar`, `alasan_keluar`, `ket_keluar`, `status_pegawai`, `no_SK`, `no_dplk`, `fungsi`, `status_kwn`, `no_bpjs_kes`, `no_bpjs_tkerja`, `tgl_kerja`, `tgl_diangkat_pwtt`, `tgl_cuti`, `id_medis`, `no_strsip`, `tgl_strsip`, `gol`, `sgt`, `id_eselon`, `tmt_sgt`, `tmt_gol`, `tmt_eselon`, `stat_pajak`, `tk_pajak`, `pjk_mulai`, `pjk_akhir`, `npwp`, `tgl_npwp`, `id_bank`, `no_rek`, `atas_nm`, `image`, `jatah_cuti`, `bar_code`, `qr_code`) VALUES
('PG_46', 20200007, 20189012, 'Yan Irawan', 'yan', '', '', 'Pria', 'Teluk Agung', '1992-09-10', 'O', 0, 0, 'Islam', 'S1', '1971051009920004', '0', 'perum pesona permata Blok C no.07 Kel. Selindung Baru', 'perum pesona permata Blok C no.07 Kel. Selindung Baru', '082126606841', '082126606841', '081373060901', 'yan.irawan1992@gmail.com', 1, '0000-00-00', '0000-00-00', '', '', 'PWTT', '131/PT.RSBT/SK-0000/20', '7777777777', 'Non Medis / Umum', 'Kawin', '0002670181301', '19010264539', '2018-12-12', '2020-07-01', '2020-07-01', 'NDS', '', '2023-03-18', '6', '4', 'STKL', '2020-03-11', '2023-03-18', '2022-04-01', 'PT', 'K1', '1', '12', '96.357.165.8.304-000', '0000-00-00', 'BK_7', '7149739585', 'Yan Irawan', NULL, '13', 'image/codeimage/barcodeimage/20200007.jpg', 'image/codeimage/qrcodeimage/20200007.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
