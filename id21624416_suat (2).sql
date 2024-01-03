-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 03 Oca 2024, 12:28:29
-- Sunucu sürümü: 10.5.20-MariaDB
-- PHP Sürümü: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `id21624416_suat`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `celik_hasir`
--

CREATE TABLE `celik_hasir` (
  `id` int(11) NOT NULL,
  `dokum_no` int(11) NOT NULL,
  `barkod_no` varchar(255) NOT NULL,
  `parti_no` int(11) NOT NULL,
  `irsaliye_no` int(11) NOT NULL,
  `kamyon_plaka` int(11) NOT NULL,
  `cekme_no` int(11) NOT NULL,
  `kesme_no` int(11) NOT NULL,
  `kaynak_no` int(11) NOT NULL,
  `kaynak_yolu_no` int(11) NOT NULL,
  `filmasin_miktar` int(11) NOT NULL,
  `tedarikci_firma_id` int(11) NOT NULL COMMENT '"tedarikci_firmalar" tablosundan alınacak',
  `firma_id` int(11) NOT NULL COMMENT '"firmalar" tablosundan alınacak',
  `cap` int(11) NOT NULL,
  `kabul_tarihi` int(11) NOT NULL,
  `islenme_tarihi` int(11) NOT NULL,
  `islenme_miktari` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `celik_hasir`
--

INSERT INTO `celik_hasir` (`id`, `dokum_no`, `barkod_no`, `parti_no`, `irsaliye_no`, `kamyon_plaka`, `cekme_no`, `kesme_no`, `kaynak_no`, `kaynak_yolu_no`, `filmasin_miktar`, `tedarikci_firma_id`, `firma_id`, `cap`, `kabul_tarihi`, `islenme_tarihi`, `islenme_miktari`) VALUES
(2, 1, '7bbc53eea4f0fd1f95aacc972bead66b498a0c92559a6ab0285293c504cf8b79', 3, 4, 5, 6, 7, 8, 9, 10, 2, 2, 13, 14, 15, 16),
(3, 1, '7bbc53eea4f0fd1f95aacc972bead66b498a0c92559a6ab0285293c504cf8b79', 3, 4, 5, 6, 7, 8, 9, 10, 1, 1, 13, 14, 15, 16),
(4, 1, '20a935b850b4b82f221f6739eb9762c786d3fa8693a3d318f5fe1177b1d58fd8', 3, 4, 5, 6, 7, 8, 9, 10, 1, 1, 13, 14, 15, 16);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `firmalar`
--

CREATE TABLE `firmalar` (
  `id` int(11) NOT NULL,
  `firma_adi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `firmalar`
--

INSERT INTO `firmalar` (`id`, `firma_adi`) VALUES
(1, 'firma1'),
(2, 'firma2');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tedarikci_firmalar`
--

CREATE TABLE `tedarikci_firmalar` (
  `id` int(11) NOT NULL,
  `firma_adi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `tedarikci_firmalar`
--

INSERT INTO `tedarikci_firmalar` (`id`, `firma_adi`) VALUES
(1, 'habas'),
(2, 'kroman');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `celik_hasir`
--
ALTER TABLE `celik_hasir`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `firmalar`
--
ALTER TABLE `firmalar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `tedarikci_firmalar`
--
ALTER TABLE `tedarikci_firmalar`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `celik_hasir`
--
ALTER TABLE `celik_hasir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `firmalar`
--
ALTER TABLE `firmalar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `tedarikci_firmalar`
--
ALTER TABLE `tedarikci_firmalar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
