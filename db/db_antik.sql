-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Jun 2020 pada 12.03
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_antik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_akses`
--

CREATE TABLE `tb_akses` (
  `id_akses` int(11) NOT NULL,
  `ket_akses` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_akses`
--

INSERT INTO `tb_akses` (`id_akses`, `ket_akses`) VALUES
(1, 'Admin'),
(2, 'Pasien'),
(3, 'Dokter Umum'),
(4, 'Dokter Gigi'),
(5, 'Apoteker');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_periksa`
--

CREATE TABLE `tb_periksa` (
  `id_periksa` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_poli` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `no_antrian` int(11) NOT NULL,
  `tensi_darah` varchar(11) NOT NULL,
  `riwayat_penyakit` varchar(255) NOT NULL,
  `gejala` varchar(255) NOT NULL,
  `diagnosa` varchar(255) NOT NULL,
  `tindakan` varchar(255) NOT NULL,
  `resep_obat` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `id_status_periksa` int(11) NOT NULL,
  `id_status_obat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_periksa`
--

INSERT INTO `tb_periksa` (`id_periksa`, `id_user`, `id_poli`, `tanggal`, `no_antrian`, `tensi_darah`, `riwayat_penyakit`, `gejala`, `diagnosa`, `tindakan`, `resep_obat`, `keterangan`, `id_status_periksa`, `id_status_obat`) VALUES
(1, 2, 1, '2020-06-04', 1, '120/100', 'DIABETES', 'PUSING, MUAL', 'DARA TINGGI', '-', 'DIABETASOL', '2X1 SETELAH MAKAN', 2, 1),
(2, 2, 1, '2020-06-05', 1, '120/60', 'DEMAM BERDARAH', 'DEMAM TINGGI, BATUK, MENGGIGIL', 'GEJALA TIFES', 'SUNTIK', 'BEATASOL', '3X1 SETELAH MAKAN', 2, 1),
(3, 2, 1, '2020-06-11', 1, '120/100', 'TUMOR LESTE', 'PANAS DINGIN, DEMAM, BATUK, PILEK, FLU', 'COVID-19', 'RAPID TEST', 'BELUM ADA VAKSIN', 'SEMOGA CEPAT ADA VAKSIN YA.. AMIN', 2, 2),
(4, 6, 1, '2020-06-11', 2, '120/90', 'GAGAL SBMPTN', 'MUAL-MUAL, STRESS, TERIAK-TERIAK SENDIRI', 'BUTUH LIBURAN', 'SUNTIK', 'PARASETAMOL, BODREX', '4X1 SETELAH MAKAN', 2, 1),
(5, 7, 2, '2020-06-11', 1, '120/100', 'PANAS DALAM', 'GIGI BERDARAH, NYERI PADA GIGI DEPAN', 'BANYAK KARANG DISELA-SELA GIGI', 'BERSIHKAN KARANG GIGI', '-', '-', 2, 1),
(6, 2, 1, '2020-06-12', 1, '120/110', 'FLU BULUNG', 'PANAS, DEMAM, BATUK', 'COVID-19', 'RAPID TEST', 'DOAKAN SEMOGA SEGERA ADA VAKSIN', 'AMIN', 2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_poli`
--

CREATE TABLE `tb_poli` (
  `id_poli` int(11) NOT NULL,
  `ket_poli` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_poli`
--

INSERT INTO `tb_poli` (`id_poli`, `ket_poli`) VALUES
(1, 'UMUM'),
(2, 'GIGI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_status`
--

CREATE TABLE `tb_status` (
  `id_status` int(11) NOT NULL,
  `ket_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_status`
--

INSERT INTO `tb_status` (`id_status`, `ket_status`) VALUES
(1, 'BELUM'),
(2, 'SUDAH'),
(3, 'PROSES');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `id_akses` int(11) NOT NULL,
  `no_identitas` varchar(20) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `pekerjaan` varchar(30) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(55) NOT NULL,
  `foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `id_akses`, `no_identitas`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `pekerjaan`, `no_hp`, `email`, `username`, `password`, `foto`) VALUES
(1, 1, '503/A.0/0066.ADM/35', 'Amry Zulfa Al Husna', 'L', 'Kediri', '1999-08-17', 'Dsn. Bulurejo Plosoklaten Kediri', 'Swasta', '082234121604', 'amryzoelfa@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', '3dfefb20bafdad8667e05ff0c31cff97.jpg'),
(2, 2, 'E31181295', 'An Nissa Safitri', 'P', 'Lumajang', '1999-12-23', 'Tempeh, Lumajang', 'Mahasiswa', '085895014535', 'annisa@gmail.com', 'E31181295', '202cb962ac59075b964b07152d234b70', '0ad248db6661d63a485ec6172fb7f237.jpg'),
(3, 3, '503/A.1/0066.DU/35', 'dr. Anindita Pramadyasiwi', 'P', 'Jember', '1989-05-10', 'Jl. Mastrip, Jember', 'PNS', '085111333555', '', 'drumum', '202cb962ac59075b964b07152d234b70', '7f06502c4a6b49998af85d24efc5e0a6.jpg'),
(4, 4, '504/B.2/0076.DRG/35', 'drg. Fariz Gustafianto', 'L', 'Jember', '1995-06-06', 'Jl. Kalimantan, Jember', 'PNS', '085522663311', '', 'drgigi', '202cb962ac59075b964b07152d234b70', '5561f012f2b20f2d854879b0f37d9101.jpg'),
(5, 5, '501/P.1/0066.TK/35/1', 'Wulan Cahya Wandani', 'P', 'Situbondo', '1999-08-22', 'Jl. Masing - masing, Situbondo', 'PNS', '085708514574', '', 'apoteker', '202cb962ac59075b964b07152d234b70', '00794627fa22d188c1b1db212fa94064.jpg'),
(6, 2, 'E31181373', 'Ratna Dewi Safitri', 'P', 'Lumajang', '1999-12-07', 'Jl. in Aja, Lumajang', 'Mahasiswa', '085607936355', '', 'E31181373', '202cb962ac59075b964b07152d234b70', '00ec8f8d9934eb527f48aa2b4de7c47d.jpg'),
(7, 2, 'E31180980', 'Afif Faris Hudaifi', 'L', 'Ponorogo', '1999-06-04', 'Jl. Khianat, Ponorogo', 'Mahasiswa', '089697020078', 'afif@gmail.com', 'E31180908', '202cb962ac59075b964b07152d234b70', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_akses`
--
ALTER TABLE `tb_akses`
  ADD PRIMARY KEY (`id_akses`);

--
-- Indeks untuk tabel `tb_periksa`
--
ALTER TABLE `tb_periksa`
  ADD PRIMARY KEY (`id_periksa`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_poli` (`id_poli`),
  ADD KEY `id_status_periksa` (`id_status_periksa`),
  ADD KEY `id_status_obat` (`id_status_obat`);

--
-- Indeks untuk tabel `tb_poli`
--
ALTER TABLE `tb_poli`
  ADD PRIMARY KEY (`id_poli`);

--
-- Indeks untuk tabel `tb_status`
--
ALTER TABLE `tb_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_akses` (`id_akses`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_akses`
--
ALTER TABLE `tb_akses`
  MODIFY `id_akses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_periksa`
--
ALTER TABLE `tb_periksa`
  MODIFY `id_periksa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_poli`
--
ALTER TABLE `tb_poli`
  MODIFY `id_poli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_status`
--
ALTER TABLE `tb_status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_periksa`
--
ALTER TABLE `tb_periksa`
  ADD CONSTRAINT `tb_periksa_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_periksa_ibfk_2` FOREIGN KEY (`id_poli`) REFERENCES `tb_poli` (`id_poli`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_periksa_ibfk_3` FOREIGN KEY (`id_status_periksa`) REFERENCES `tb_status` (`id_status`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_periksa_ibfk_4` FOREIGN KEY (`id_status_obat`) REFERENCES `tb_status` (`id_status`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`id_akses`) REFERENCES `tb_akses` (`id_akses`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
