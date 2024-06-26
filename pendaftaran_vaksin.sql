-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Nov 2022 pada 09.07
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pendaftaran_vaksin`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosis`
--

CREATE TABLE `dosis` (
  `id_dosis` int(4) NOT NULL,
  `dosis` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dosis`
--

INSERT INTO `dosis` (`id_dosis`, `dosis`) VALUES
(1, 'Dosis 1'),
(2, 'Dosis 2'),
(3, 'Booster 1'),
(4, 'Booster 2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` int(4) NOT NULL,
  `jenis_vaksin` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `jenis_vaksin`) VALUES
(1, 'Sinovac '),
(2, 'Astra Zeneca'),
(3, 'Moderna'),
(4, 'Sinopharm'),
(5, 'Pfizer'),
(6, 'Novavax'),
(7, 'Sputnik-V'),
(8, 'Janssen'),
(9, 'Convidencia'),
(10, 'Zifivax');

-- --------------------------------------------------------

--
-- Struktur dari tabel `klinik`
--

CREATE TABLE `klinik` (
  `id_klinik` int(4) NOT NULL,
  `klinik` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `klinik`
--

INSERT INTO `klinik` (`id_klinik`, `klinik`) VALUES
(1, 'DIY - Pelita Husada'),
(2, 'DKI Jakarta - Restu Bunda'),
(3, 'Jawa Barat - Mitra Sehat'),
(4, 'Banten - RS Umum Harapan Sehat'),
(5, 'Jawa Tengah - Metro Medical Center'),
(6, 'Jawa Timur - RSU Bala Keselamatan'),
(7, 'Bali - RS Umum Semara Ratih'),
(8, 'NTB - RSU Dr R Sudjono'),
(9, 'NTT - RSUD Waibakul'),
(10, 'Sulawesi Utara - RS Umum Daerah Anugerah'),
(11, 'Sulawesi Barat - RS Umum Mitra Mankarra'),
(12, 'Sulawesi Tengah - RS Claire Medika'),
(13, 'Sulawesi Tenggara - RS Mitra Sakinah Idaman'),
(14, 'Sulawesi Selatan - RSU Tenriawaru Bone'),
(15, 'Gorontalo - RS Umum Daerah dr. Zainal Umar Sidiki'),
(16, 'Aceh - RS Umum Nurul Hasanah'),
(17, 'Sumatra Utara - RS Metta Medika II'),
(18, 'Sumatera Barat - RS. Universitas Andalas'),
(19, 'Riau - RS Umum  Eka Hospital Pekanbaru'),
(20, 'Kepulauan Riau - RS Medika Insani'),
(21, 'Jambi - RS Umum Daerah H. Hanafie'),
(22, 'Sumatra Selatan - RS Bunda Medika Jakabaring'),
(23, 'Bangka Belitung - RS Umum Gladish Medical Center'),
(24, 'Bengkulu - RS Hana Charitas Arga Makmur'),
(25, 'Lampung - RS Candimas Medical Center'),
(26, 'Kalimantan Utara - 	RS Umum Daerah Tarakan'),
(27, 'Kalimantan Barat - RS Pratama Serawaik'),
(28, 'Kalimantan Tengah - RS Permata Hati Palangkaraya'),
(29, 'Kalimantan Selatan - RS Umum Pelita Insani'),
(30, 'Kalimantan Timur - 	RS Hermina Samarinda'),
(31, 'Maluku - 	RS Umum Pusat Dr. J. Leimena'),
(32, 'Maluku Utara - RS Bethesda GMIH Tobelo'),
(33, 'Papua Barat - 	RS Pratama Warmare'),
(34, 'Papua - RS Provita Jayapura'),
(35, 'Papua Selatan - RS Kasih Herlina'),
(36, 'Papua Tengah - RS Umum Bunda pengharapan'),
(37, 'Papua Pegunungan - RS Dian Harapan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id_pendaftaran` int(4) NOT NULL,
  `id_user` int(4) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `umur` varchar(3) NOT NULL,
  `id_klinik` int(4) NOT NULL,
  `kelurahan` varchar(30) NOT NULL,
  `kecamatan` varchar(30) NOT NULL,
  `kabupaten` varchar(30) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_ponsel` varchar(15) NOT NULL,
  `tanggal_vaksin` date NOT NULL,
  `id_waktu` int(4) NOT NULL,
  `id_jenis` int(4) NOT NULL,
  `id_dosis` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pendaftaran`
--

INSERT INTO `pendaftaran` (`id_pendaftaran`, `id_user`, `nik`, `nama_lengkap`, `jenis_kelamin`, `tanggal_lahir`, `umur`, `id_klinik`, `kelurahan`, `kecamatan`, `kabupaten`, `alamat`, `no_ponsel`, `tanggal_vaksin`, `id_waktu`, `id_jenis`, `id_dosis`) VALUES
(9, 1, '34021709060007', 'Prima Maulana Hanan', 'laki - laki', '2003-03-04', '16', 3, 'foyooo', 'hagooo', 'Kab. Bantul', 'PAA No.64, RT:009, Plawonan, Argomulyo, Sedayu, Bantul, D.I.Yogyakarta', '081227362306', '2022-11-27', 2, 8, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(4) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `email` varchar(30) NOT NULL,
  `no_ponsel` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama_lengkap`, `nik`, `tanggal_lahir`, `email`, `no_ponsel`) VALUES
(1, 'navajo', '123', 'Prima Maulana Hanan', '34021709060007', '2003-03-04', 'primamaulanahanan15@gmail.com', '081227362306'),
(2, 'public', '222', 'Maulana', '34021709060004', '1999-02-03', '123210073@student.upnyk.ac.id', '089866789904');

-- --------------------------------------------------------

--
-- Struktur dari tabel `waktu`
--

CREATE TABLE `waktu` (
  `id_waktu` int(4) NOT NULL,
  `waktu_mulai` time NOT NULL,
  `waktu_selesai` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `waktu`
--

INSERT INTO `waktu` (`id_waktu`, `waktu_mulai`, `waktu_selesai`) VALUES
(1, '08:00:00', '10:00:00'),
(2, '10:30:00', '12:30:00'),
(3, '13:00:00', '15:00:00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dosis`
--
ALTER TABLE `dosis`
  ADD PRIMARY KEY (`id_dosis`);

--
-- Indeks untuk tabel `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `klinik`
--
ALTER TABLE `klinik`
  ADD PRIMARY KEY (`id_klinik`);

--
-- Indeks untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`),
  ADD KEY `id_klinik` (`id_klinik`),
  ADD KEY `id_waktu` (`id_waktu`),
  ADD KEY `id_jenis` (`id_jenis`),
  ADD KEY `id_dosis` (`id_dosis`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `waktu`
--
ALTER TABLE `waktu`
  ADD PRIMARY KEY (`id_waktu`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dosis`
--
ALTER TABLE `dosis`
  MODIFY `id_dosis` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id_jenis` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `klinik`
--
ALTER TABLE `klinik`
  MODIFY `id_klinik` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id_pendaftaran` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `waktu`
--
ALTER TABLE `waktu`
  MODIFY `id_waktu` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD CONSTRAINT `fk_dosis` FOREIGN KEY (`id_dosis`) REFERENCES `dosis` (`id_dosis`),
  ADD CONSTRAINT `fk_jenis` FOREIGN KEY (`id_jenis`) REFERENCES `jenis` (`id_jenis`),
  ADD CONSTRAINT `fk_klinik` FOREIGN KEY (`id_klinik`) REFERENCES `klinik` (`id_klinik`),
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `fk_waktu` FOREIGN KEY (`id_waktu`) REFERENCES `waktu` (`id_waktu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
