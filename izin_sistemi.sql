-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 26 Ara 2025, 08:04:49
-- Sunucu sürümü: 10.4.27-MariaDB
-- PHP Sürümü: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `izin_sistemi`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `izinler`
--

CREATE TABLE `izinler` (
  `id` int(11) NOT NULL,
  `tc_no` varchar(11) NOT NULL,
  `ad_soyad` varchar(100) NOT NULL,
  `baslangic_tarihi` date NOT NULL,
  `bitis_tarihi` date NOT NULL,
  `gidecegi_sehir` varchar(100) DEFAULT NULL,
  `gidecegi_ilce` varchar(100) DEFAULT NULL,
  `sebep` text DEFAULT NULL,
  `durum` enum('Beklemede','Onaylandı','Reddedildi') DEFAULT 'Beklemede',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `izinler`
--

INSERT INTO `izinler` (`id`, `tc_no`, `ad_soyad`, `baslangic_tarihi`, `bitis_tarihi`, `gidecegi_sehir`, `gidecegi_ilce`, `sebep`, `durum`, `created_at`) VALUES
(1, '15698742222', 'Denise Marry', '2025-12-25', '2025-12-30', 'İzmir', 'köşk', 'aile evi', 'Onaylandı', '2025-12-24 06:17:41');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `izinler`
--
ALTER TABLE `izinler`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `izinler`
--
ALTER TABLE `izinler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
