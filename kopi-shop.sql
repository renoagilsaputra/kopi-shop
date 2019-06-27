-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Jun 2019 pada 08.52
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kopi-shop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoices`
--

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `du_date` datetime NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` enum('paid','unpaid') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
(1, 'biji'),
(2, 'bubuk');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `berat` int(100) NOT NULL,
  `harga` int(100) NOT NULL,
  `keterangan` text NOT NULL,
  `stok` int(100) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `kategori`, `berat`, `harga`, `keterangan`, `stok`, `gambar`) VALUES
(7, 'Arabika', 'biji', 20, 10000, 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iste \r\ntenetur reiciendis, modi vero quisquam rem autem necessitatibus laudantium debitis qui, ex quia explicabo sint? Ipsam dolores quisquam et cum impedit?', 199, '15-06-2019-img.jpg'),
(8, 'Robusta', 'bubuk', 100, 200000, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Earum accusamus dicta consectetur corporis totam dolore doloribus, ad ab accusantium nemo necessitatibus, nobis dolor maiores animi ipsum, odio a rerum voluptatum.', 0, '12-06-2019-img1.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `regional`
--

CREATE TABLE `regional` (
  `id_regional` int(11) NOT NULL,
  `regional` varchar(100) NOT NULL,
  `biaya` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `regional`
--

INSERT INTO `regional` (`id_regional`, `regional`, `biaya`) VALUES
(1, 'banyumas', 1000),
(2, 'purbalingga', 2000),
(3, 'cilacap', 2000),
(4, 'kebumen', 3000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_id`
--

CREATE TABLE `role_id` (
  `id` int(11) NOT NULL,
  `role_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `role_id`
--

INSERT INTO `role_id` (`id`, `role_id`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_invoices` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jml` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `gender` enum('l','p') NOT NULL,
  `email` varchar(100) NOT NULL,
  `telp` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role_id` int(1) NOT NULL,
  `id_regional` varchar(100) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `gender`, `email`, `telp`, `username`, `password`, `role_id`, `id_regional`, `alamat`) VALUES
(1, 'admin', 'l', 'admin@gmail.com', '081327566748', 'admin', '$2y$10$l.6p9pC07NdiHL1PT9XqTOrA3s7KIhA6yfVT/yLMiCEUK17Uq9tDq', 1, '1', 'kdsnlas'),
(2, 'user', 'l', 'user@gmail.com', '081327654673', 'user', '$2y$10$XlvxSMRhFyPS5Qp.oUW98.HFR8KkjnfsPl7DCWuJh9yDNdVa/rELq', 2, '2', 'dasmkasld'),
(11, 'bela', 'p', 'bela@gmail.com', '081327566748', 'bela', '$2y$10$4s5jtJYu.K4gmT4dlQjh8.mM/xao8FAowDzAdiT.wUmdnLHRGUAyu', 2, '3', 'fjdnks'),
(12, 'tyara', 'p', 'tyara@gmail.com', '081327566748', 'tyara', '$2y$10$5ws65iggk7RZGNpOQqP8v.OcTCXkewQUvIeS1mmf636z2axPd6HTG', 2, '1', 'njdsasda'),
(13, 'Ani', 'p', 'renoagilsaputra87@gmail.com', '081327566748', 'ani', '$2y$10$WtDmhR1whCrSmWMnZ0P/CeH.bMPqYoNA.moWnYGh/xY43IJSomU9G', 2, '4', 'sdnljasdadasda'),
(14, 'Fajri', 'l', 'admin@gmail.com', '08132765647', 'fajri', '$2y$10$IIfVCYM5WclbdZdEkODPvebP.rxzOPm4O/Nwvob0WoVHDtWrg1Zue', 1, '1', 'Purwokerto TImur'),
(15, 'dhina', 'p', 'dhina@gmail.com', '081333335555', 'dhina', '$2y$10$NoVECQbO3VmaMGjT6GtCCOpNSSEnI6oW/XkV7maEcw3oMR4DIEOEa', 2, '1', 'gggg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `regional`
--
ALTER TABLE `regional`
  ADD PRIMARY KEY (`id_regional`);

--
-- Indeks untuk tabel `role_id`
--
ALTER TABLE `role_id`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `regional`
--
ALTER TABLE `regional`
  MODIFY `id_regional` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `role_id`
--
ALTER TABLE `role_id`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
