-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Jun 2022 pada 15.16
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `faktek`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_wisuda`
--

CREATE TABLE `data_wisuda` (
  `id_wisuda` int(11) NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `noreg` int(11) NOT NULL,
  `kode_pt` varchar(50) NOT NULL DEFAULT '081018',
  `jenjang` varchar(5) NOT NULL DEFAULT 'S1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `fakultas`
--

CREATE TABLE `fakultas` (
  `id_fakultas` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `fakultas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `fakultas`
--

INSERT INTO `fakultas` (`id_fakultas`, `id_user`, `fakultas`) VALUES
(3, 0, 'FAKULTAS TEKNIK');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa_baru`
--

CREATE TABLE `mahasiswa_baru` (
  `id_mhs` int(11) NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `noreg` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jk` varchar(12) NOT NULL DEFAULT 'None',
  `ttl` varchar(45) NOT NULL,
  `tgl_masuk` varchar(35) NOT NULL,
  `asal_sklh` varchar(125) NOT NULL,
  `nilai_tes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa_wisuda`
--

CREATE TABLE `mahasiswa_wisuda` (
  `id_mhs` int(11) NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `noreg` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jk` varchar(12) NOT NULL DEFAULT 'None',
  `ttl` varchar(50) NOT NULL,
  `tgl_masuk` varchar(35) NOT NULL,
  `tgl_lulus` varchar(35) NOT NULL,
  `ipk` varchar(10) NOT NULL,
  `predikat_lulus` varchar(50) NOT NULL,
  `tahun_wisuda` varchar(35) NOT NULL,
  `wisuda_ke` int(11) NOT NULL,
  `lama_studi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nip` int(30) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `jk` varchar(15) NOT NULL,
  `jabatan` varchar(250) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `ttl` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama`, `nip`, `alamat`, `jk`, `jabatan`, `no_hp`, `ttl`) VALUES
(7, 'Pak Bento', 12345678, 'Jln. Adisucipto', 'L', 'TU', '08111111111', 'Kupang 05 Jun 2022'),
(8, 'Pak Tejo', 12345679, 'liliba', 'L', 'TU', '081111111111', 'Kupang 05 Jun 2022');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prodi`
--

CREATE TABLE `prodi` (
  `id_prodi` int(11) NOT NULL,
  `id_fakultas` int(11) NOT NULL,
  `prodi` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `id_fakultas`, `prodi`) VALUES
(11, 3, 'Teknik Sipil'),
(12, 3, 'Arsitektur'),
(13, 3, 'Ilmu Komputer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL DEFAULT 'example@gmail.com',
  `password` varchar(75) NOT NULL,
  `id_active` int(2) NOT NULL DEFAULT 2,
  `id_role` int(2) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `id_pegawai`, `nama`, `email`, `password`, `id_active`, `id_role`) VALUES
(27, 0, 'admin', 'admin@gmail.com', '$2y$10$nSMfroFiZk4q6uBqpvWLAOgEOyPxb70WJEJX4BN3jg/pdXRJdjhRe', 1, 1),
(30, 0, 'Itha Lay Kudji', 'arlanitha2704@gmail.com', '$2y$10$a4CJmhUdCM3O8247LLA/r.8PE1qspG6hDP5J1CIufqn90Sb0eo33K', 1, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_active`
--

CREATE TABLE `users_active` (
  `id_active` int(11) NOT NULL,
  `status` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users_active`
--

INSERT INTO `users_active` (`id_active`, `status`) VALUES
(1, 'Aktif'),
(2, 'Tidak Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_role`
--

CREATE TABLE `users_role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users_role`
--

INSERT INTO `users_role` (`id_role`, `role`) VALUES
(1, 'Admin'),
(2, 'Pegawai');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_wisuda`
--
ALTER TABLE `data_wisuda`
  ADD PRIMARY KEY (`id_wisuda`),
  ADD KEY `id_prodi` (`id_prodi`),
  ADD KEY `noreg` (`noreg`);

--
-- Indeks untuk tabel `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id_fakultas`),
  ADD UNIQUE KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `mahasiswa_baru`
--
ALTER TABLE `mahasiswa_baru`
  ADD PRIMARY KEY (`id_mhs`),
  ADD KEY `id_prodi` (`id_prodi`);

--
-- Indeks untuk tabel `mahasiswa_wisuda`
--
ALTER TABLE `mahasiswa_wisuda`
  ADD PRIMARY KEY (`id_mhs`),
  ADD KEY `id_prodi` (`id_prodi`),
  ADD KEY `noreg` (`noreg`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indeks untuk tabel `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_prodi`),
  ADD KEY `id_fakultas` (`id_fakultas`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_active` (`id_active`),
  ADD KEY `id_role` (`id_role`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indeks untuk tabel `users_active`
--
ALTER TABLE `users_active`
  ADD PRIMARY KEY (`id_active`);

--
-- Indeks untuk tabel `users_role`
--
ALTER TABLE `users_role`
  ADD PRIMARY KEY (`id_role`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_wisuda`
--
ALTER TABLE `data_wisuda`
  MODIFY `id_wisuda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id_fakultas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa_baru`
--
ALTER TABLE `mahasiswa_baru`
  MODIFY `id_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa_wisuda`
--
ALTER TABLE `mahasiswa_wisuda`
  MODIFY `id_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id_prodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `users_active`
--
ALTER TABLE `users_active`
  MODIFY `id_active` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users_role`
--
ALTER TABLE `users_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `data_wisuda`
--
ALTER TABLE `data_wisuda`
  ADD CONSTRAINT `data_wisuda_ibfk_1` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `mahasiswa_wisuda`
--
ALTER TABLE `mahasiswa_wisuda`
  ADD CONSTRAINT `mahasiswa_wisuda_ibfk_1` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `prodi`
--
ALTER TABLE `prodi`
  ADD CONSTRAINT `prodi_ibfk_1` FOREIGN KEY (`id_fakultas`) REFERENCES `fakultas` (`id_fakultas`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
