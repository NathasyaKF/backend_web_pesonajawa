-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2023 at 01:07 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pesonajawa`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `bukuKODE` char(4) NOT NULL,
  `bukuJUDUL` varchar(100) NOT NULL,
  `bukuHARGA` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`bukuKODE`, `bukuJUDUL`, `bukuHARGA`) VALUES
('QRD2', 'Sunset 2', '215.000'),
('SC13', 'Bobo', '30.000');

-- --------------------------------------------------------

--
-- Table structure for table `destinasi`
--

CREATE TABLE `destinasi` (
  `destinasiKODE` char(4) NOT NULL,
  `destinasiNAMA` varchar(120) NOT NULL,
  `destinasiKET` text NOT NULL,
  `destinasiFILE` char(120) NOT NULL,
  `kategoriKODE` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `destinasi`
--

INSERT INTO `destinasi` (`destinasiKODE`, `destinasiNAMA`, `destinasiKET`, `destinasiFILE`, `kategoriKODE`) VALUES
('C001', 'Prambanan', 'Candi Prambanan adalah bangunan candi bercorak agama Hindu terbesar di Indonesia yang dibangun pada abad ke-9 Masehi. Candi yang juga disebut sebagai Rara Jonggrang ini dipersembahkan untuk Trimurti, tiga dewa utama Hindu yaitu dewa Brahma sebagai dewa pencipta, dewa Wisnu sebagai dewa pemelihara, dan dewa Siwa sebagai dewa pemusnah.', 'prambanan.jpg', 'B001'),
('S001', 'Sungai Welo', 'Sungai Welo yang mengalir di kompleks wisata Welo Asri tersebut memiliki beberapa titik lokasi yang berbeda level ketinggiannya. Sehingga bisa menyesuaikan dan memilih spot mana yang akan Sobat Turisian nikmati. Pada undakan daerah atas dengan kedalaman yang cukup dangkal bisa kalian gunakan untuk berenang atau sekadar ciblon. Area ini cocok pula untuk pengunjung yang belum pandai berenang.', 'sungaiwelo.jpg', 'B002');

-- --------------------------------------------------------

--
-- Table structure for table `fotodestinasi`
--

CREATE TABLE `fotodestinasi` (
  `fotodestinasiKODE` char(4) NOT NULL,
  `fotodestinasiNAMA` char(120) NOT NULL,
  `fotodestinasiFILE` char(120) NOT NULL,
  `destinasiKODE` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fotodestinasi`
--

INSERT INTO `fotodestinasi` (`fotodestinasiKODE`, `fotodestinasiNAMA`, `fotodestinasiFILE`, `destinasiKODE`) VALUES
('B001', '1', 'candisari1.jpg', ''),
('B002', 'd', 'candisari1.jpg', ''),
('B003', 'Candi', 'candisari1.jpg', ''),
('RTSW', 'SDF', 'candisari1.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `hotelKODE` char(4) NOT NULL,
  `hotelNAMA` char(160) NOT NULL,
  `hotelALAMAT` varchar(250) NOT NULL,
  `hotelFILE` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`hotelKODE`, `hotelNAMA`, `hotelALAMAT`, `hotelFILE`) VALUES
('1021', 'Tok Dalang Homestay', 'Durian Runtuh ', 'homestay1.jpg'),
('1861', 'Neo Hotel', 'Bandung', 'hotel1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kategoriwisata`
--

CREATE TABLE `kategoriwisata` (
  `kategoriKODE` char(4) NOT NULL,
  `kategoriNAMA` char(25) NOT NULL,
  `kategoriKET` text NOT NULL,
  `kategoriREFERENCE` char(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategoriwisata`
--

INSERT INTO `kategoriwisata` (`kategoriKODE`, `kategoriNAMA`, `kategoriKET`, `kategoriREFERENCE`) VALUES
('B001', 'Candi', 'Candi adalah istilah dalam Bahasa Indonesia yang merujuk kepada sebuah bangunan keagamaan tempat ibadah peninggalan purbakala yang berasal dari peradaban Hindu-Buddha. Bangunan ini digunakan sebagai tempat ritual ibadah, pemujaan dewa-dewi, penghormatan leluhur ataupun memuliakan Sang Buddha. ', 'Wikipedia'),
('B002', 'Sungai', 'Sungai adalah aliran air di permukaan besar dan berbentuk memanjang yang mengalir secara terus-menerus dari hulu menuju hilir. Sungai merupakan tempat mengalirnya air secara gravitasi menuju ke tempat yang lebih rendah. Arah aliran sungai sesuai dengan sifat air mulai dari tempat yang tinggi ke tempat rendah', 'Wikipedia'),
('B003', 'Perbelanjaan', 'Wisata Belanja merupakan bagian dari kegiatan\r\npariwisata yang dilakukan sebagian orang dalam\r\nmelakukan perjalanan wisata. Kegiatan wisata identik\r\ndengan belanja dalam melakukan berwisata seseorang\r\ncenderung melakukan belanja.', 'Jurnal');

-- --------------------------------------------------------

--
-- Table structure for table `kategortiberita`
--

CREATE TABLE `kategortiberita` (
  `kategoriberitaKODE` varchar(4) NOT NULL,
  `kategoriberitaNAMA` varchar(100) NOT NULL,
  `kategoriberitaKET` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategortiberita`
--

INSERT INTO `kategortiberita` (`kategoriberitaKODE`, `kategoriberitaNAMA`, `kategoriberitaKET`) VALUES
('D012', 'Liburan', 'Persiapan Menyambut Lonjakan Pergerakan Libur Akhir Tahun Dimulai'),
('Q023', 'Diskon ', 'Sejumlah travel agent atau agen perjalanan memberi diskon besar bagi wisatawan lokal. Berbagai promo itu diberikan bagi mereka yang hendak berkunjung ke destinasi wisata super prioritas (DSP).  Baca artikel detikfinance, \"Pengusaha Sebar Diskon Paket Wisa');

-- --------------------------------------------------------

--
-- Table structure for table `kuliner`
--

CREATE TABLE `kuliner` (
  `kulinerKODE` varchar(4) NOT NULL,
  `kulinerNAMA` varchar(100) NOT NULL,
  `kulinerALAMAT` varchar(255) NOT NULL,
  `kulinerFILE` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kuliner`
--

INSERT INTO `kuliner` (`kulinerKODE`, `kulinerNAMA`, `kulinerALAMAT`, `kulinerFILE`) VALUES
('1236', 'Rendang ', 'Padang', 'candisari1.jpg'),
('2312', 'Ayam Rica-rica', 'jalan pegangsaan timur nomor 56', 'bg-05.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `namadepan` varchar(50) NOT NULL,
  `namabelakang` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`namadepan`, `namabelakang`, `username`, `password`) VALUES
('ten', 'ton', 'coba1', '123');

-- --------------------------------------------------------

--
-- Table structure for table `transportasi`
--

CREATE TABLE `transportasi` (
  `transportasiPLAT` varchar(10) NOT NULL,
  `transportasiJENIS` varchar(100) NOT NULL,
  `travelKODE` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transportasi`
--

INSERT INTO `transportasi` (`transportasiPLAT`, `transportasiJENIS`, `travelKODE`) VALUES
('B 1234 KF', 'Mini Bus', '1242'),
('B 1427 UN', 'Motor', '1242'),
('B 2180 RF', 'Mobil', '1242');

-- --------------------------------------------------------

--
-- Table structure for table `travel`
--

CREATE TABLE `travel` (
  `travelKODE` varchar(4) NOT NULL,
  `travelNAMA` varchar(100) NOT NULL,
  `travelALAMAT` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `travel`
--

INSERT INTO `travel` (`travelKODE`, `travelNAMA`, `travelALAMAT`) VALUES
('1140', 'Berkah Travel', 'Jogja'),
('1242', 'Uwuw Travel ', 'Jakarta'),
('1253', 'Yow Travel', 'Solo');

-- --------------------------------------------------------

--
-- Table structure for table `useradmin`
--

CREATE TABLE `useradmin` (
  `userKODE` char(4) NOT NULL,
  `userNAMA` char(30) NOT NULL,
  `userEMAIL` char(60) NOT NULL,
  `userPASS` char(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `useradmin`
--

INSERT INTO `useradmin` (`userKODE`, `userNAMA`, `userEMAIL`, `userPASS`) VALUES
('KF62', 'Nathasya', 'nathasyakf@gmail.com', 'thasya'),
('NK26', 'Syahwalina Jane', 'syahwalina13@gmail.com', 'a26a446de090b134cd8aca3c00eb1d10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`bukuKODE`);

--
-- Indexes for table `destinasi`
--
ALTER TABLE `destinasi`
  ADD PRIMARY KEY (`destinasiKODE`);

--
-- Indexes for table `fotodestinasi`
--
ALTER TABLE `fotodestinasi`
  ADD PRIMARY KEY (`fotodestinasiKODE`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`hotelKODE`);

--
-- Indexes for table `kategoriwisata`
--
ALTER TABLE `kategoriwisata`
  ADD PRIMARY KEY (`kategoriKODE`);

--
-- Indexes for table `kategortiberita`
--
ALTER TABLE `kategortiberita`
  ADD PRIMARY KEY (`kategoriberitaKODE`);

--
-- Indexes for table `kuliner`
--
ALTER TABLE `kuliner`
  ADD PRIMARY KEY (`kulinerKODE`);

--
-- Indexes for table `transportasi`
--
ALTER TABLE `transportasi`
  ADD PRIMARY KEY (`transportasiPLAT`);

--
-- Indexes for table `travel`
--
ALTER TABLE `travel`
  ADD PRIMARY KEY (`travelKODE`);

--
-- Indexes for table `useradmin`
--
ALTER TABLE `useradmin`
  ADD PRIMARY KEY (`userKODE`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
