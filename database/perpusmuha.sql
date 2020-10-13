-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Jul 2019 pada 05.35
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpusmuha`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `nis` varchar(15) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `kelas` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`nis`, `nama`, `alamat`, `kelas`) VALUES
('1313', '[p', 'hfh', 'X MIA'),
('99560058', 'TAUFIK RAMADHAN', 'WIJAYA KUSUMA', '1'),
('99729007', 'DILLAH NUR FATMAH', 'BANARAN', '1'),
('99849221', 'YASMIN OKTAVIA ANJANI', 'BENDO', '1'),
('99910022', 'FATHAN FIQHI FIRDAUS', 'AL - IKHLAS NO. 30 MENDUNGAN', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id_buku` varchar(15) NOT NULL,
  `kode_buku` varchar(255) NOT NULL,
  `jml_buku` int(10) NOT NULL,
  `rak` varchar(5) NOT NULL,
  `abjad` varchar(1) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `pengarang` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `terbit` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id_buku`, `kode_buku`, `jml_buku`, `rak`, `abjad`, `judul`, `pengarang`, `penerbit`, `date`, `terbit`) VALUES
('B0000001', '978-602-250-235-7', 2, '1', 'A', 'Kisah 7 Bayi Bisa Bicara', 'Uwais Ramadhan, Lc ', ' Gema Insani', '2019-05-11', '2015'),
('B0000002', '978-602-250-301-9', 3, '1', 'A', 'Jombloâ€™s Diary', 'O. Solihin', 'Gema Insani ', '2019-05-11', '2016'),
('B0000003', '978-602-250-303-3', 3, '1', 'B', 'Lo Gue Butuh Tau LGBT', 'Sinyo', 'Gema Insani', '2019-05-11', '2016'),
('B0000004', '12345', 5, '1', 'S', 'Kamus Kimia', 'A. Amirudin', 'Langeng Makmur', '1995-07-02', '1993');

-- --------------------------------------------------------

--
-- Struktur dari tabel `det_peminjaman`
--

CREATE TABLE `det_peminjaman` (
  `det_id_peminjaman` int(15) NOT NULL,
  `id_buku` varchar(15) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `jml` int(10) NOT NULL,
  `id_transaksi` varchar(30) NOT NULL,
  `status` varchar(10) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `kembali_tgl` date NOT NULL,
  `denda` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `det_peminjaman`
--

INSERT INTO `det_peminjaman` (`det_id_peminjaman`, `id_buku`, `judul`, `jml`, `id_transaksi`, `status`, `tgl_pinjam`, `tgl_kembali`, `kembali_tgl`, `denda`) VALUES
(49, 'B0000004', '', 1, '20170804/21:29:19', 'kembali', '2017-08-04', '2017-08-11', '2019-04-06', '60300'),
(50, 'B0000005', '', 1, '20170804/21:29:19', 'dipinjam', '2017-08-04', '2017-08-11', '0000-00-00', ''),
(51, 'B0000008', '', 1, '20170804/21:29:54', 'dipinjam', '2017-08-04', '2017-08-11', '0000-00-00', ''),
(52, 'B0000003', '', 1, '20170804/21:29:54', 'kembali', '2017-08-04', '2017-08-11', '2019-04-06', '60300'),
(53, 'B0000010', '', 1, '20170804/21:29:54', 'kembali', '2017-08-04', '2017-08-11', '2017-08-04', '0'),
(54, 'B0000002', '', 1, '20170807/14:16:10', 'kembali', '2017-08-07', '2017-08-14', '2019-03-30', '59300'),
(55, 'B0000336', '', 1, '20170807/14:16:10', 'dipinjam', '2017-08-07', '2017-08-14', '0000-00-00', ''),
(56, 'B0000343', '', 1, '20170807/14:16:10', 'dipinjam', '2017-08-07', '2017-08-14', '0000-00-00', ''),
(59, 'B0000008', 'Kendi Kuno Berleher Panjang', 1, '20170816/13:52:57', 'dipinjam', '2017-08-16', '2017-08-23', '0000-00-00', ''),
(60, 'B0000515', 'Rahasia Jarak Pagar', 1, '20170816/14:14:06', 'dipinjam', '2017-08-16', '2017-08-23', '0000-00-00', ''),
(61, 'B0000039', 'Budidaya Mentimun Secara Hidroponik', 1, '20170816/14:27:02', 'dipinjam', '2017-08-16', '2017-08-23', '0000-00-00', ''),
(62, 'B0000032', 'Budidaya Bawang', 1, '20170818/16:25:39', 'kembali', '2017-08-18', '2017-08-25', '2017-08-18', '0'),
(63, 'B0000044', 'Budidaya Kacang Panjang', 1, '20170818/16:25:39', 'dipinjam', '2017-08-18', '2017-08-25', '0000-00-00', ''),
(64, 'B0000004', 'Pencuri Semah Kenduri', 1, '20170818/16:55:22', 'kembali', '2017-08-18', '2017-08-25', '2017-08-18', '0'),
(65, 'B0000020', 'Membuat Hiasan Jamur', 1, '20170818/17:34:13', 'kembali', '2017-08-18', '2017-09-01', '2017-08-18', '0'),
(68, 'B0000006', 'Nadia & Dukun Geger Kalong', 1, '20170906/06:55:17', 'dipinjam', '2017-09-06', '2017-09-13', '0000-00-00', ''),
(69, 'B0000031', 'Bercocok Tanam Ubi Jalar', 1, '20170906/06:55:17', 'kembali', '2017-09-06', '2017-09-13', '2017-09-06', '0'),
(70, 'B0000019', 'Mengenal Tanaman Yang Berkhasiat Obat', 1, '20170906/06:55:17', 'dipinjam', '2017-09-06', '2017-09-13', '0000-00-00', ''),
(71, 'B0000010', 'Indahnya Pulau Dewata', 1, '20170906/07:04:39', 'dipinjam', '2017-09-06', '2017-09-13', '0000-00-00', ''),
(72, 'B0000045', 'Bertanam Anggur dalam Pot', 1, '20170906/07:04:39', 'dipinjam', '2017-09-06', '2017-09-13', '0000-00-00', ''),
(73, 'B0000001', 'ya', 1, '20190306/15:55:24', 'kembali', '2019-03-06', '2019-05-05', '2019-03-06', '0'),
(74, 'B0000001', 'ya', 0, '', 'kembali', '2019-03-06', '2019-05-05', '2019-03-12', '0'),
(75, 'B0000001', 'ya', 0, '20190312/07:58:52', 'kembali', '2019-03-12', '2019-05-11', '2019-03-12', '0'),
(76, 'B0000001', 'ya', 0, '20190318/02:03:12', 'kembali', '2019-03-18', '2019-09-14', '2019-04-06', '0'),
(77, 'B0000001', 'ya', 0, '20190327/19:14:16', 'kembali', '2019-03-27', '2019-05-26', '2019-04-06', '0'),
(78, 'B0000002', 'fgfgf', 0, '20190330/13:26:06', 'kembali', '2019-03-30', '2019-05-29', '2019-03-30', '0'),
(79, 'B0000001', 'ya', 0, '20190330/13:27:41', 'kembali', '2019-03-30', '2019-05-29', '2019-04-06', '0'),
(81, 'B0000003', 'q', 0, '20190405/17:28:24', 'kembali', '2019-04-05', '2019-06-04', '2019-04-06', '0'),
(82, 'B0000003', 'q', 0, '20190405/17:30:39', 'kembali', '2019-04-05', '2019-06-04', '2019-04-06', '0'),
(83, 'B0000001', 'ya', 0, '20190405/21:04:25', 'kembali', '2019-04-05', '2019-06-04', '2019-04-06', '0'),
(84, 'B0000001', 'ya', 0, '20190406/01:31:17', 'kembali', '2019-04-06', '2019-06-05', '2019-04-06', '0'),
(91, 'B0000001', 'ya', 0, '20190406/02:10:55', 'kembali', '2019-04-06', '2019-06-05', '2019-04-06', '0'),
(94, 'B0000001', 'ya', 0, '20190406/02:18:42', 'kembali', '2019-04-06', '2019-06-05', '2019-04-06', '0'),
(95, 'B0000003', 'q', 0, '20190411/10:22:08', 'dipinjam', '2019-04-11', '2019-06-10', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `home`
--

CREATE TABLE `home` (
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_transaksi` varchar(30) NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `nama_user` varchar(20) NOT NULL,
  `nis` varchar(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `kelas` varchar(2) NOT NULL,
  `sub_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id_transaksi`, `id_user`, `nama_user`, `nis`, `nama`, `kelas`, `sub_kelas`) VALUES
('', '', '', '', 'RAHMAT SYUKUR RADIFAN', '', 0),
('20170804/21:29:19', 'U02', 'Ricky Darmawan', '0041006116', '', '', 0),
('20170804/21:29:54', 'U02', 'Ricky Darmawan', '0046197778', '', '', 0),
('20170807/14:16:10', 'U02', 'Ricky Darmawan', '0046197781', '', '', 0),
('20170816/13:52:57', 'U02', 'Ricky Darmawan', '0052242967', '', '', 0),
('20170816/14:14:06', 'U02', 'Ricky Darmawan', '0161005006', '', '', 0),
('20170816/14:27:02', 'U02', 'Ricky Darmawan', '0046197781', '', '', 0),
('20170818/16:25:39', 'U02', 'Ricky Darmawan', '0109860493', '', '', 0),
('20170818/16:55:22', 'U02', 'Ricky Darmawan', '0046197786', 'Ihsan Nawawi', '6', 2),
('20170818/17:34:13', 'U02', 'Ricky Darmawan', '0046197786', 'Ihsan Nawawi', '6', 2),
('20170906/06:55:17', 'U02', 'Ricky Darmawan', '0046197780', 'MUHAMMAD SULTON NAUFALDIEN', '6', 1),
('20170906/07:04:39', 'U02', 'Ricky Darmawan', '0051566936', 'Lu\'lu\' Layla Zahirah', '5', 1),
('20190306/15:52:10', 'U01', 'admin', '41006116', 'RAHMAT SYUKUR RADIFAN', '6', 1),
('20190306/15:55:24', 'U01', 'admin', '46197771', 'ARIEL PUTRA NUR ROKHIM', '6', 3),
('20190306/15:57:20', 'U01', 'admin', '46197772', 'HANAFI RIDHO WICAKSONO', '5', 2),
('20190306/16:26:45', 'U01', 'admin', '43344426', 'KHEIRINAFA PUSPANINGRUM HADIDY', '6', 1),
('20190306/16:28:54', 'U01', 'admin', '41006116', 'RAHMAT SYUKUR RADIFAN', '6', 1),
('20190306/16:30:11', 'U01', 'admin', '41006116', 'RAHMAT SYUKUR RADIFAN', '6', 1),
('20190306/16:31:39', 'U01', 'admin', '41006116', 'RAHMAT SYUKUR RADIFAN', '6', 1),
('20190306/16:32:25', 'U01', 'admin', '41006116', 'RAHMAT SYUKUR RADIFAN', '6', 1),
('20190306/17:15:23', 'U01', 'admin', '41006116', 'RAHMAT SYUKUR RADIFAN', '6', 1),
('20190306/17:15:53', 'U01', 'admin', '43344426', 'KHEIRINAFA PUSPANINGRUM HADIDY', '6', 1),
('20190312/07:58:52', 'U01', 'admin', '41006116', 'RAHMAT SYUKUR RADIFAN', '6', 1),
('20190312/08:16:30', 'U01', 'admin', '43344426', 'KHEIRINAFA PUSPANINGRUM HADIDY', '6', 1),
('20190317/18:39:35', 'U01', 'admin', '41006116', 'RAHMAT SYUKUR RADIFAN', '6', 1),
('20190318/02:03:12', 'U01', 'admin', '1', 'ASA', '8', 0),
('20190327/19:14:16', 'U01', 'admin', '1', 'ASA', '8', 0),
('20190330/13:26:06', 'U01', 'admin', '1', 'ASA', '8', 0),
('20190330/13:27:41', 'U01', 'admin', '1', 'ASA', '8', 0),
('20190405/17:17:13', 'U01', 'admin', '1', 'ASA', '8', 0),
('20190405/17:28:24', 'U01', 'admin', '1', 'ASA', '8', 0),
('20190405/17:30:39', 'U01', 'admin', '1', 'ASA', '8', 0),
('20190405/21:04:25', 'U01', 'admin', '1', 'ASA', '8', 0),
('20190406/01:31:17', 'U01', 'admin', '1', 'ASA', '8', 0),
('20190406/01:47:10', 'U01', 'admin', '1', 'ASA', '8', 0),
('20190406/02:06:52', 'U01', 'admin', '1', 'ASA', '8', 0),
('20190406/02:08:06', 'U01', 'admin', '1', 'ASA', '8', 0),
('20190406/02:10:55', 'U01', 'admin', '1', 'ASA', '8', 0),
('20190406/02:14:13', 'U01', 'admin', '1', 'ASA', '8', 0),
('20190406/02:16:00', 'U01', 'admin', '1', 'ASA', '8', 0),
('20190406/02:18:42', 'U01', 'admin', '1', 'ASA', '8', 0),
('20190411/10:22:08', 'U01', 'admin', '1', 'ASA', '8', 0),
('20190411/11:08:11', 'U01', 'admin', '1', 'ASA', '8', 0),
('20190423/18:56:47', 'U01', 'admin', '1', 'ASA', '8', 0),
('20190424/16:46:07', 'U01', 'admin', '1', 'ASA', '8', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `id_anggota` varchar(15) NOT NULL,
  `id_buku` varchar(15) NOT NULL,
  `tgl_pinjam` varchar(100) NOT NULL,
  `tgl_kembali` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `id_anggota`, `id_buku`, `tgl_pinjam`, `tgl_kembali`, `status`) VALUES
(12, '99560058', 'B0000002', '11-05-2019', '18-05-2019', 'kembali'),
(13, '99560058', 'B0000002', '21-06-2019', '28-06-2019', 'kembali'),
(14, '99849221', 'B0000001', '27-06-2019', '04-07-2019', 'kembali'),
(15, '99560058', 'B0000001', '09-07-2019', '16-07-2019', 'kembali'),
(16, '99729007', 'B0000001', '10-07-2019', '24-07-2019', 'kembali');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` varchar(20) NOT NULL,
  `status` varchar(15) NOT NULL,
  `jadwal` varchar(100) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama_user` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `status`, `jadwal`, `username`, `password`, `nama_user`) VALUES
('U01', 'admin', 'Selasa', 'admin', 'admin1', 'admin'),
('U02', 'nonadm', 'Kamis', 'ira', 'ira', 'ira'),
('U03', 'admin', 'Selasa', 'ani', 'ani', 'gj');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`nis`);

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indeks untuk tabel `det_peminjaman`
--
ALTER TABLE `det_peminjaman`
  ADD PRIMARY KEY (`det_id_peminjaman`),
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `nis` (`nis`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `det_peminjaman`
--
ALTER TABLE `det_peminjaman`
  MODIFY `det_id_peminjaman` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `det_peminjaman`
--
ALTER TABLE `det_peminjaman`
  ADD CONSTRAINT `det_peminjaman_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `peminjaman` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
