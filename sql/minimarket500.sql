-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Okt 2019 pada 10.08
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `minimarket500`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` varchar(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `harga_pokok` int(11) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `deskripsi`, `gambar`, `satuan`, `harga_pokok`, `stok`) VALUES
('BAR-0001', 'Indomie Original', '    Kehangatan yang nyaman di perut dan mewarnai seribu kesan di lidah.\r\n    Bumbu soto yang kaya menjadikan momen santai menjadi lebih meresap nikmatnya.\r\n    Jadikan momen santai lebih mengesankan.', 'indomie.jpg', 'PCS', 2000, 999999);

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` varchar(11) NOT NULL,
  `nama_karyawan` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama_karyawan`, `username`, `password`, `alamat`, `no_telp`, `level`) VALUES
('KAR-0001', '123', '123', '123', '123', '123', '2'),
('KAR-0002', '12345', '12345', '12345', '12345', '12345', '2'),
('KAR-0003', 'admin', 'admin', '12345', 'admin', 'admin', '3'),
('KAR-0004', '1234', '1234', '1234', '1234', '1234', '2'),
('KAR-0005', 'zzz', 'zzz', 'zzz', 'zzz', 'zzz', '2'),
('KAR-0006', '123444', '123444', '123444', '123444', '123444', '2'),
('KAR-0007', 'zzz', 'zzz', 'zzz', 'zzz', 'zzz', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasokan`
--

CREATE TABLE `pasokan` (
  `id_pasok` varchar(11) NOT NULL,
  `id_supplier` varchar(20) NOT NULL,
  `id_barang` varchar(20) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `jml_pasok` int(11) NOT NULL,
  `tanggal_pasok` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pasokan`
--

INSERT INTO `pasokan` (`id_pasok`, `id_supplier`, `id_barang`, `harga_beli`, `jml_pasok`, `tanggal_pasok`) VALUES
('SPL-0001', 'SP-0001', 'BAR-0001', 50000000, 500, 'Oct 20, 2019'),
('SPL-0002', 'SP-0002', 'BAR-0002', 600000, 50, 'Oct 07, 2019'),
('SPL-0003', 'SP-0001', 'BAR-0001', 30, 300, 'Oct 14, 2019'),
('SPL-0004', 'SP-0001', 'BAR-0003', 500000, 60, 'Oct 13, 2019'),
('SPL-0005', 'SP-0001', 'BAR-0003', 4545, 45454, 'Oct 13, 2019'),
('SPL-0006', 'SP-0006', 'BAR-0001', 99999, 999999, 'Oct 15, 2019'),
('SPL-0007', 'SP-0006', 'BAR-0001', 50000, 999999, 'Oct 20, 2019');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama`, `email`, `password`, `level`) VALUES
('PLG-0001', 'Andi', 'froyobred@gmail.com', '12345', '1'),
('PLG-0002', 'yy', 'yy@y', 'yy', '1'),
('PLG-0003', '333', '312@rr.com', '4323', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `no_penjualan` varchar(20) NOT NULL,
  `id_barang` varchar(20) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `tanggal_jual` varchar(50) NOT NULL,
  `jml_jual` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`no_penjualan`, `id_barang`, `nama_barang`, `total_harga`, `tanggal_jual`, `jml_jual`, `nama`) VALUES
('PB-0001', 'BAR-0001', 'Indomie Original', 2000, 'Oct 21, 2019', 1, '123'),
('PB-0002', 'BAR-0001', 'Indomie Original', 2000, 'Oct 21, 2019', 1, '123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` varchar(20) NOT NULL,
  `nama_supplier` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `alamat`, `no_telp`) VALUES
('SP-0001', 'Indo Grosir', 'A. Yani KM.3,5', '052-533-5556'),
('SP-0002', 'Unilever Indonesia', 'Jakarta', '0821-5788-9370'),
('SP-0003', 'Vintage International', 'Jakarta', '066-513-200'),
('SP-0004', 'Sarong Site ', 'Bali', '0878-5417-0179'),
('SP-0005', 'Tradur Company', 'Jepara, Indonesia', '0815-1634-7800'),
('SP-0006', 'Indofood Sukses Makmur', 'Bekasi', '1740-313-666');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `user`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `user` (
`id` varchar(100)
,`username` varchar(100)
,`password` varchar(100)
,`level` varchar(50)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `user`
--
DROP TABLE IF EXISTS `user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user`  AS  select `karyawan`.`id_karyawan` AS `id`,`karyawan`.`username` AS `username`,`karyawan`.`password` AS `password`,`karyawan`.`level` AS `level` from `karyawan` union select `pelanggan`.`id_pelanggan` AS `id`,`pelanggan`.`nama` AS `username`,`pelanggan`.`password` AS `password`,`pelanggan`.`level` AS `level` from `pelanggan` ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indeks untuk tabel `pasokan`
--
ALTER TABLE `pasokan`
  ADD PRIMARY KEY (`id_pasok`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`no_penjualan`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
