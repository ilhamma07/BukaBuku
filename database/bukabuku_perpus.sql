-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 27 Jun 2019 pada 17.20
-- Versi Server: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bukabuku_perpus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(15) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
('adm1', 'Admin', '12345');

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` varchar(10) NOT NULL,
  `nama_anggota` varchar(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenkel` varchar(1) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nama_anggota`, `tgl_lahir`, `jenkel`, `alamat`, `no_hp`, `foto`) VALUES
('AGT-0001', 'Ilham Maulana', '1998-12-07', 'L', 'Majalengka', '08123456789', 'AGT-0001-ilham maulana.jpg'),
('AGT-0002', 'Fatahudin Azziz', '1996-12-09', 'L', 'Majalengka', '01234567889', 'AGT-0002-fatahudin aziz.JPG'),
('AGT-0003', 'Eka Firdayanti', '1998-01-17', 'L', 'Majalengka', '0123456789', 'AGT-0003-eka firdayanti.JPG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `kd_buku` varchar(15) NOT NULL,
  `judul_buku` varchar(150) NOT NULL,
  `pengarang` varchar(30) NOT NULL,
  `penerbit` varchar(30) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `stok` int(3) NOT NULL,
  `tersedia` int(3) NOT NULL,
  `foto` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`kd_buku`, `judul_buku`, `pengarang`, `penerbit`, `tahun`, `stok`, `tersedia`, `foto`) VALUES
('BK-0001', 'Mengenal Lebih Dekat Penataan Ruang Bagi Generasi Muda', 'Agus M.', 'Republika', '2015', 2, 2, 'BK-0001-1-buku-mengenal-lebih-dekat-penataan-ruang-bagi-generasi-muda-1-638.jpg'),
('BK-0002', 'Mengubah Asa Menjadi Nyata Bersama Singasari', 'Fauzun Jamal', 'Republika', '2016', 4, 3, 'BK-0002-20170130588f47c83d31e.jpg'),
('BK-0003', 'Api Tauhid', 'Habibburahman El Shirazy', 'Republika', '2007', 3, 3, 'BK-0003-Api-Tauhid.jpg'),
('BK-0004', 'Pengesahan Kawin Kontrak', 'Siti Musdah Mulia', 'PHMI', '2012', 1, 1, 'BK-0004-book.png'),
('BK-0005', 'Surga di Negri Liu Liu', 'Tim KKN PPM UMG', 'UMG', '2015', 3, 3, 'BK-0005-Buku Seliu.jpg'),
('BK-0006', 'Saya Mau Jadi Guru GoBlog', 'Namin AB Ibnu Solihin', 'Guruberahlak', '2016', 5, 5, 'BK-0006-buku-goblog-hitam-depan-belakang-3.png'),
('BK-0007', 'Menghirup Dunia', 'Fahri Akbari', 'Grassindo', '2012', 6, 6, 'BK-0007-BUKU-MENGHIRUP-DUNIA-COVER-1-e1429812362773.png'),
('BK-0008', 'Diambang Kematian', 'Eko Hartono', 'Gramediana', '2014', 3, 3, 'BK-0008-Cover Di Ambang Kematian.jpg'),
('BK-0009', 'Menentukan Tuhan Dalam Etika Einstein', 'Max Jammer', 'Eduka', '2011', 4, 3, 'BK-0009-COVER EINSTEIN SAJA FIX.jpg'),
('BK-0010', 'Dahsyatnya Zikir', 'Dewi Yana', 'Zikrul Hakim', '2012', 6, 6, 'BK-0010-cover-buku-ke-empat-dasyatnya-zikir.jpg'),
('BK-0011', 'Metode Penelitian Pendidikan', 'Ahmad Nizar Rangkuti', 'Gramedia', '2010', 9, 9, 'BK-0011-cover_buku___metode_penelitian_pendidikan_by_vianmaster_dawnp1o-fullview.jpg'),
('BK-0012', 'Effective Trading', 'Budi Harsono', 'PT. Global Perfekta Sinergitam', '2015', 3, 3, 'BK-0012-desain-cover-buku-trading-online.jpg'),
('BK-0013', 'Hoe To Start Good Business', 'Lorenzo Carlh', 'Gramedia', '2013', 4, 4, 'BK-0013-Designs_Cover_01.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `manajemen`
--

CREATE TABLE `manajemen` (
  `id_manajemen` varchar(15) NOT NULL,
  `nama_manajemen` varchar(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenkel` varchar(1) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `manajemen`
--

INSERT INTO `manajemen` (`id_manajemen`, `nama_manajemen`, `tgl_lahir`, `jenkel`, `alamat`, `no_hp`, `username`, `password`, `foto`) VALUES
('MNJ-001', 'Ilham Maulana', '1998-12-07', 'L', 'Majalengka', '081398181261', 'ilham.ma0712@gmail.com', 'ilhamtib', 'MNJ-001-ilham maulana.jpg'),
('MNJ-002', 'Nurazizah', '2000-05-11', 'P', 'Majalengka', '0123456789', 'azizahnur@gmail.com', 'nurazizah', 'MNJ-002-nzaaaah.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `kd_peminjaman` varchar(15) NOT NULL,
  `kd_buku` varchar(15) NOT NULL,
  `id_anggota` varchar(15) NOT NULL,
  `tgl_pinjam` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`kd_peminjaman`, `kd_buku`, `id_anggota`, `tgl_pinjam`) VALUES
('PMJ-0001', 'BK-0002', 'AGT-0002', '2019-06-27'),
('PMJ-0002', 'BK-0005', 'AGT-0001', '2019-06-27'),
('PMJ-0003', 'BK-0009', 'AGT-0001', '2019-06-27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengembalian`
--

CREATE TABLE `pengembalian` (
  `kd_pengembalian` varchar(15) NOT NULL,
  `kd_peminjaman` varchar(15) NOT NULL,
  `tgl_kembali` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengembalian`
--

INSERT INTO `pengembalian` (`kd_pengembalian`, `kd_peminjaman`, `tgl_kembali`) VALUES
('KBL-0001', 'PMJ-0002', '2019-06-27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`kd_buku`);

--
-- Indexes for table `manajemen`
--
ALTER TABLE `manajemen`
  ADD PRIMARY KEY (`id_manajemen`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`kd_peminjaman`),
  ADD KEY `kd_buku` (`kd_buku`),
  ADD KEY `id_anggota` (`id_anggota`),
  ADD KEY `kd_buku_2` (`kd_buku`),
  ADD KEY `id_anggota_2` (`id_anggota`);

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`kd_pengembalian`),
  ADD KEY `kd_peminjaman` (`kd_peminjaman`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
