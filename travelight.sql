-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2023 at 11:47 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travelight`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `idAdministrator` int(30) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`idAdministrator`, `username`, `password`) VALUES
(1, 'admin', 'adm');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `idCustomer` int(30) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `urlFotoProfil` varchar(255) DEFAULT NULL,
  `namaCustomer` varchar(255) NOT NULL,
  `noHpCustomer` varchar(50) NOT NULL,
  `emailCustomer` varchar(255) NOT NULL,
  `alamatCustomer` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`idCustomer`, `username`, `password`, `urlFotoProfil`, `namaCustomer`, `noHpCustomer`, `emailCustomer`, `alamatCustomer`) VALUES
(1, 'gisell', '123', NULL, 'gisela vania', '082240878880', 'gisel@gmail.com', 'Jl. Manggis No. 4');

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `idHotel` int(30) NOT NULL,
  `idPemilikHotel` int(30) NOT NULL,
  `namaHotel` varchar(255) NOT NULL,
  `lokasiHotel` varchar(500) NOT NULL,
  `deskripsiHotel` varchar(500) NOT NULL,
  `urlGambarHotel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`idHotel`, `idPemilikHotel`, `namaHotel`, `lokasiHotel`, `deskripsiHotel`, `urlGambarHotel`) VALUES
(1, 1, 'Oyo Muara Jati', 'Kotakaler, Sumedang', 'tempat penginapan sementara yang cocok ketika berpergian dan ingin beristirahat', 'hotel.jpg'),
(2, 2, 'Amaris Hotel Cirebon', 'Cirebon', 'Dikabarkan Kota Cirebon kini akan menjadi kota dengan banyak destinasi liburan. Hotel ini merupakan hotel yang cocok untuk menjadi tempat tinggal sementara', 'hotel3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `idKamar` int(30) NOT NULL,
  `idHotel` int(30) NOT NULL,
  `jenisKamar` varchar(30) NOT NULL,
  `harga` int(30) NOT NULL,
  `stok` int(30) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`idKamar`, `idHotel`, `jenisKamar`, `harga`, `stok`, `status`) VALUES
(1, 1, 'Kamar Keluarga', 400000, 0, 'not available'),
(2, 1, 'Kamar Pribadi', 300000, 1, 'available'),
(3, 2, 'Kamar Pribadi', 400000, 1, 'available');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `idPembayaran` int(30) NOT NULL,
  `idPesanan` int(30) NOT NULL,
  `urlGambarPembayaran` varchar(255) NOT NULL,
  `statusPembayaran` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`idPembayaran`, `idPesanan`, `urlGambarPembayaran`, `statusPembayaran`) VALUES
(1, 1, 'bayar1_3.jpg', 'verified');

-- --------------------------------------------------------

--
-- Table structure for table `pemilik_hotel`
--

CREATE TABLE `pemilik_hotel` (
  `idPemilikHotel` int(30) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `urlFotoProfil` varchar(255) DEFAULT NULL,
  `namaPemilikHotel` varchar(255) NOT NULL,
  `noHpPemilikHotel` varchar(50) NOT NULL,
  `emailPemilikHotel` varchar(255) NOT NULL,
  `alamatPemilikHotel` varchar(500) NOT NULL,
  `noRekPemilikHotel` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemilik_hotel`
--

INSERT INTO `pemilik_hotel` (`idPemilikHotel`, `username`, `password`, `urlFotoProfil`, `namaPemilikHotel`, `noHpPemilikHotel`, `emailPemilikHotel`, `alamatPemilikHotel`, `noRekPemilikHotel`) VALUES
(1, 'gisellavd', 'sel', NULL, 'Gisella', '081239146578', 'gisellavd17@gmail.com', 'Jl Mangga No. 2', '1231234'),
(2, 'caca', 'caca', NULL, 'Salsabila', '08123456789', 'caca@gmail.com', 'Jl. Manggis No. 3', '12312355'),
(3, 'vania', 'van', NULL, 'Vania', '082240878881', 'vania@gmail.com', 'Bandung', '09562834');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `idPesanan` int(30) NOT NULL,
  `idKamar` int(30) NOT NULL,
  `idCustomer` int(30) NOT NULL,
  `statusPesanan` varchar(30) NOT NULL,
  `totalHargaPesanan` int(30) NOT NULL,
  `waktuCheckIn` timestamp(6) NULL DEFAULT current_timestamp(6),
  `waktuCheckOut` timestamp(6) NULL DEFAULT current_timestamp(6),
  `waktuPesanan` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `tenggatWaktuPesanan` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`idPesanan`, `idKamar`, `idCustomer`, `statusPesanan`, `totalHargaPesanan`, `waktuCheckIn`, `waktuCheckOut`, `waktuPesanan`, `tenggatWaktuPesanan`) VALUES
(1, 1, 1, 'verified', 800000, '2023-01-14 17:00:00.000000', '2023-01-15 17:00:00.000000', '2023-01-14 21:39:53.000000', '2023-01-15 21:39:53.000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`idAdministrator`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`idCustomer`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`idHotel`),
  ADD KEY `idPemilikHotel` (`idPemilikHotel`);

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`idKamar`),
  ADD KEY `idHotel` (`idHotel`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`idPembayaran`),
  ADD KEY `idPesanan` (`idPesanan`);

--
-- Indexes for table `pemilik_hotel`
--
ALTER TABLE `pemilik_hotel`
  ADD PRIMARY KEY (`idPemilikHotel`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`idPesanan`),
  ADD KEY `idKamar` (`idKamar`),
  ADD KEY `idCustomer` (`idCustomer`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `idAdministrator` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `idCustomer` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `idHotel` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kamar`
--
ALTER TABLE `kamar`
  MODIFY `idKamar` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `idPembayaran` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pemilik_hotel`
--
ALTER TABLE `pemilik_hotel`
  MODIFY `idPemilikHotel` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `idPesanan` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hotel`
--
ALTER TABLE `hotel`
  ADD CONSTRAINT `hotel_ibfk_1` FOREIGN KEY (`idPemilikHotel`) REFERENCES `pemilik_hotel` (`idPemilikHotel`);

--
-- Constraints for table `kamar`
--
ALTER TABLE `kamar`
  ADD CONSTRAINT `kamar_ibfk_1` FOREIGN KEY (`idHotel`) REFERENCES `hotel` (`idHotel`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`idPesanan`) REFERENCES `pesanan` (`idPesanan`);

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`idKamar`) REFERENCES `kamar` (`idKamar`),
  ADD CONSTRAINT `pesanan_ibfk_2` FOREIGN KEY (`idCustomer`) REFERENCES `customer` (`idCustomer`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
