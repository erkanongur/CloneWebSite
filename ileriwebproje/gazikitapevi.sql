-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 22 Mar 2019, 08:56:36
-- Sunucu sürümü: 10.1.38-MariaDB
-- PHP Sürümü: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `gazikitapevi`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kitaplar`
--

CREATE TABLE `kitaplar` (
  `kitapid` int(8) NOT NULL,
  `kitapadi` varchar(50) NOT NULL,
  `kitapfiyat` double NOT NULL DEFAULT '0',
  `yayinevi` varchar(50) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `kitapresim` varchar(255) NOT NULL,
  `basim_yili` date NOT NULL,
  `yazar` varchar(50) NOT NULL,
  `sayfa_sayi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `kitaplar`
--

INSERT INTO `kitaplar` (`kitapid`, `kitapadi`, `kitapfiyat`, `yayinevi`, `kategori`, `kitapresim`, `basim_yili`, `yazar`, `sayfa_sayi`) VALUES
(1, 'İçmeden Sarhoş', 20.5, 'Babam Yayıncılık', 'ROMAN', '0001742607001-1.jpg', '2019-03-06', 'Yasin EVİŞMEK', 250);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uyeler`
--

CREATE TABLE `uyeler` (
  `uye_id` int(11) NOT NULL,
  `uye_ad` varchar(50) NOT NULL,
  `uye_soyad` varchar(50) NOT NULL,
  `uye_sifre` int(8) NOT NULL,
  `e_mail` varchar(50) NOT NULL,
  `dogum_tarihi` date NOT NULL,
  `cinsiyet` varchar(50) NOT NULL,
  `cep_telefonu` int(50) NOT NULL,
  `mail_liste` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `uyeler`
--

INSERT INTO `uyeler` (`uye_id`, `uye_ad`, `uye_soyad`, `uye_sifre`, `e_mail`, `dogum_tarihi`, `cinsiyet`, `cep_telefonu`, `mail_liste`) VALUES
(1, 'erkan', 'Ongur', 111, 'erkn@mail.com', '1998-08-03', 'Erkek', 2147483647, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yorumlar`
--

CREATE TABLE `yorumlar` (
  `yorum_id` int(11) NOT NULL,
  `yorum_ad` varchar(50) NOT NULL,
  `yorum_soyad` varchar(50) NOT NULL,
  `yorum_tarih` date NOT NULL,
  `yorum` varchar(255) NOT NULL,
  `yorum_saat` varchar(255) NOT NULL,
  `yorum_kitapid` int(8) NOT NULL,
  `yorum_baslik` varchar(50) NOT NULL,
  `yorum_anonimlik` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `yorumlar`
--

INSERT INTO `yorumlar` (`yorum_id`, `yorum_ad`, `yorum_soyad`, `yorum_tarih`, `yorum`, `yorum_saat`, `yorum_kitapid`, `yorum_baslik`, `yorum_anonimlik`) VALUES
(1, 'Erkan', 'ONĞUR', '2019-03-20', 'Çok tavsiye ederim..', '00:40:59', 1, 'Çok Beğendim', 0);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `kitaplar`
--
ALTER TABLE `kitaplar`
  ADD PRIMARY KEY (`kitapid`);

--
-- Tablo için indeksler `uyeler`
--
ALTER TABLE `uyeler`
  ADD PRIMARY KEY (`uye_id`);

--
-- Tablo için indeksler `yorumlar`
--
ALTER TABLE `yorumlar`
  ADD PRIMARY KEY (`yorum_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `kitaplar`
--
ALTER TABLE `kitaplar`
  MODIFY `kitapid` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `uyeler`
--
ALTER TABLE `uyeler`
  MODIFY `uye_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `yorumlar`
--
ALTER TABLE `yorumlar`
  MODIFY `yorum_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
