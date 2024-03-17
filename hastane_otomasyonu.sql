-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 17 Mar 2024, 13:31:36
-- Sunucu sürümü: 10.4.24-MariaDB
-- PHP Sürümü: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `hastane_otomasyonu`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `doktorlar`
--

CREATE TABLE `doktorlar` (
  `doktor_id` bigint(20) NOT NULL,
  `doktor_adi` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `doktor_yas` bigint(3) NOT NULL,
  `doktor_boy` bigint(3) NOT NULL,
  `doktor_kilo` bigint(3) NOT NULL,
  `doktor_klinik_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `doktorlar`
--

INSERT INTO `doktorlar` (`doktor_id`, `doktor_adi`, `doktor_yas`, `doktor_boy`, `doktor_kilo`, `doktor_klinik_id`) VALUES
(1, 'Hasan Fehmi Eryiğit', 0, 0, 0, 1),
(2, 'Melih GürSaç', 0, 0, 0, 1),
(3, 'Poyraz Kerim', 0, 0, 0, 1),
(4, 'Can Barlı', 0, 0, 0, 2),
(5, 'Hasan Keram', 0, 0, 0, 2),
(6, 'İlkan Uluöz', 0, 0, 0, 2),
(7, 'Ogün Yöntem', 0, 0, 0, 3),
(8, 'Berka Yıldırım', 0, 0, 0, 3),
(9, 'Tunahan Toydemir', 0, 0, 0, 3),
(10, 'İsmirar Gökemir', 0, 0, 0, 4),
(11, 'Rakide Pekalın', 0, 0, 0, 4),
(12, 'Havsa Bağdaş', 0, 0, 0, 4),
(13, 'Mazlum Jeyn', 0, 0, 0, 5),
(14, 'Cenk Oğuralp', 0, 0, 0, 5),
(15, 'Sontaç Tunay', 0, 0, 0, 5),
(16, 'Saba Daldal', 0, 0, 0, 6),
(17, 'Reşat Cantürk', 0, 0, 0, 6),
(18, 'Cenker Gözlem', 0, 0, 0, 6),
(19, 'Sözen Kuşeyr', 0, 0, 0, 7),
(20, 'Nebiye Özbaş', 0, 0, 0, 7),
(21, 'Saniye Nafiz', 0, 0, 0, 7),
(22, 'Nejat Yalaza', 0, 0, 0, 8),
(23, 'Haktan Bilay', 0, 0, 0, 8),
(24, 'Velaya Nakibe', 0, 0, 0, 8),
(25, 'Tunçer Barlas', 0, 0, 0, 9),
(26, 'Mirseyit Mustafa', 0, 0, 0, 9),
(27, 'Aylin Vahib', 0, 0, 0, 9),
(28, 'Abşar Ceylinay', 0, 0, 0, 10),
(29, 'Özinal Sellem', 0, 0, 0, 10),
(30, 'Alphan Nevşah', 0, 0, 0, 10),
(31, 'Demircan Birun', 0, 0, 0, 11),
(32, 'Üçel Batır', 0, 0, 0, 11),
(33, 'Bahar Keyhan', 0, 0, 0, 11),
(34, 'İzel Desen', 0, 0, 0, 12),
(35, 'Aliye İnare', 0, 0, 0, 12),
(36, 'Rojin Okyalaz', 0, 0, 0, 12),
(37, 'Nafih Songur', 0, 0, 0, 13),
(38, 'Nurefşan Olcay', 0, 0, 0, 13),
(39, 'Kevser Turab', 0, 0, 0, 13),
(40, 'Hayim Mahinur', 0, 0, 0, 14),
(41, 'Numan Tuğlu', 0, 0, 0, 14),
(42, 'Tayfun Yetik', 0, 0, 0, 14),
(43, 'Berzan Nafiye', 0, 0, 0, 15),
(44, 'Kahya Seven', 0, 0, 0, 15),
(45, 'Nur Açan', 0, 0, 0, 15),
(46, 'Alperen Barış', 0, 0, 0, 16),
(47, 'Alpkan Barış', 0, 0, 0, 16),
(48, 'Berkin Şahmelek', 0, 0, 0, 16),
(49, 'Sebat Rasiha', 0, 0, 0, 17),
(50, 'Bedii Nur', 0, 0, 0, 17),
(51, 'Fahrettin Yadigar', 0, 0, 0, 17),
(52, 'Mazlum Nimettulah', 0, 0, 0, 18),
(53, 'Ünsel İlsavun', 0, 0, 0, 18),
(54, 'Biricik Tansu', 0, 0, 0, 18),
(55, 'Adil Tamay', 0, 0, 0, 19),
(56, 'Adem İklim', 0, 0, 0, 19),
(57, 'Havva Elma', 0, 0, 0, 19),
(58, 'Önder Eftalya', 0, 0, 0, 20),
(59, 'Eftalya Çiçek', 0, 0, 0, 20),
(60, 'Efsun Nimet', 0, 0, 0, 20),
(61, 'Ömür Kutlutekin', 0, 0, 0, 21),
(62, 'Ilgaz Abdülveli', 0, 0, 0, 21),
(63, 'Kaptan Titiz', 0, 0, 0, 21),
(64, 'Şide Nusrettin', 0, 0, 0, 22),
(65, 'Avşar Servinaz', 0, 0, 0, 22),
(66, 'Asude Salman', 0, 0, 0, 22),
(67, 'Ömer Duman', 20, 170, 68, 23),
(68, 'Deryanur Feyha', 0, 0, 0, 23),
(69, 'Salkım Onuralp', 0, 0, 0, 23),
(70, 'Başkurt Efsane', 0, 0, 0, 24),
(71, 'Elif İsmet', 0, 0, 0, 24),
(72, 'Faruk İsmail', 0, 0, 0, 24),
(73, 'Kudret Özöz', 0, 0, 0, 25),
(74, 'Anıl Uzuner', 0, 0, 0, 25),
(75, 'Ilgaz Dağ', 0, 0, 0, 25),
(76, 'Fatih Polat', 0, 0, 0, 26),
(77, 'Tunçsoy İlksoy', 0, 0, 0, 26),
(78, 'Rukiye Özden', 0, 0, 0, 26),
(79, 'Tolunay Özen', 0, 0, 0, 27),
(80, 'Raika Özdemir', 0, 0, 0, 27),
(81, 'Nefer Türkcan', 0, 0, 0, 27),
(82, 'Feyza Muhib', 0, 0, 0, 28),
(83, 'Feyyaz İlknur', 0, 0, 0, 28),
(84, 'Gazanfer Şeyh', 0, 0, 0, 28),
(85, 'Berat Özerdim', 0, 0, 0, 29),
(86, 'Beste Özerek', 0, 0, 0, 29),
(87, 'Anıl Piyancı', 0, 0, 0, 29),
(88, 'Serhat Duran', 0, 0, 0, 30),
(89, 'Ferhat Durmuş', 0, 0, 0, 30),
(90, 'Sergen Keçi', 0, 0, 0, 30),
(91, 'Eyşan Halenur', 0, 0, 0, 31),
(92, 'Ertunç Hale', 0, 0, 0, 31),
(93, 'Ateş Toprak', 0, 0, 0, 31),
(94, 'Asiye Canbek', 0, 0, 0, 32),
(95, 'Buket Canbey', 0, 0, 0, 32),
(96, 'Bulut İrem', 0, 0, 0, 32),
(97, 'Nazlı Can', 0, 0, 0, 33),
(98, 'Bünyamin Atçı', 0, 0, 0, 33),
(99, 'Emre Osman', 0, 0, 0, 33),
(100, 'Osman Petek', 0, 0, 0, 34),
(101, 'Zehra Aybüke', 0, 0, 0, 34),
(102, 'Şermin Hıdır', 0, 0, 0, 34),
(103, 'Aybüke Aber', 0, 0, 0, 35),
(104, 'Asgar Taşkınay', 0, 0, 0, 35),
(105, 'Rojin Yenbu', 0, 0, 0, 35),
(106, 'Ronay Yener', 0, 0, 0, 36),
(107, 'Pehlivan Semire', 0, 0, 0, 36),
(108, 'Ertaç Onurcan', 0, 0, 0, 36),
(109, 'Ertan Felek', 0, 0, 0, 37),
(110, 'Burak Taşan', 0, 0, 0, 37),
(111, 'Hiram Samani', 0, 0, 0, 37),
(112, 'Samet Bal', 0, 0, 0, 38),
(113, 'Serhat Durgun', 0, 0, 0, 38),
(114, 'Tokuz Balahan', 0, 0, 0, 38),
(115, 'Ervin Tulca', 0, 0, 0, 39),
(116, 'Ercan Büfe', 0, 0, 0, 39),
(117, 'Mikail İrade', 0, 0, 0, 39),
(118, 'Yavuz Er', 0, 0, 0, 40),
(119, 'Bülent Yalaz', 0, 0, 0, 40),
(120, 'Tanyeri Yalavaç', 0, 0, 0, 40);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hasta`
--

CREATE TABLE `hasta` (
  `hasta_id` bigint(11) UNSIGNED NOT NULL,
  `hasta_ad` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `hasta_soyad` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `hasta_Tc` bigint(11) NOT NULL,
  `hasta_Tel` char(14) COLLATE utf8mb4_turkish_ci NOT NULL,
  `hasta_Adres` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `hasta_yas` bigint(3) NOT NULL,
  `hasta_boy` bigint(3) NOT NULL,
  `hasta_kilo` bigint(3) NOT NULL,
  `hasta_sifre` varchar(25) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `hasta`
--

INSERT INTO `hasta` (`hasta_id`, `hasta_ad`, `hasta_soyad`, `hasta_Tc`, `hasta_Tel`, `hasta_Adres`, `hasta_yas`, `hasta_boy`, `hasta_kilo`, `hasta_sifre`) VALUES
(1, 'Anıl', 'Uzuner', 22850141092, '', '', 0, 0, 0, '123');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `klinikler`
--

CREATE TABLE `klinikler` (
  `klinik_id` bigint(20) NOT NULL,
  `klinik_adi` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `klinikler`
--

INSERT INTO `klinikler` (`klinik_id`, `klinik_adi`) VALUES
(1, 'ALGOLOJİ'),
(2, 'BESLENME VE DİYET'),
(3, 'BEYİN VE SİNİR CERRAHİSİ'),
(4, 'ÇOCUK ALERJİSİ'),
(5, 'ÇOCUK CERRAHİSİ'),
(6, 'ÇOCUK ENDOKRİNOLOJİSİ'),
(7, 'ÇOCUK ENFEKSİYON'),
(8, 'ÇOCUK GÖĞÜS HASTALIKLARI'),
(9, 'ÇOCUK HEMATOLOJİSİ'),
(10, 'ÇOCUK KARDİYOLOJİSİ'),
(11, 'ÇOCUK METABOLİZMA'),
(12, 'ÇOCUK NEFROLOJİSİ'),
(13, 'ÇOCUK NÖROLOJİSİ'),
(14, 'DERMATOLOJİ (CİLDİYE)'),
(15, 'ENDOKRİNOLOJİ VE METABOLİZMA'),
(16, 'ENFEKSİYON HASTALIKLARI'),
(17, 'FİZİKSEL TIP VE REHABİLİTASYON'),
(18, 'GASTROENTEROLOJİ'),
(19, 'GELENEKSEL VE TAMAMLAYICI TIP('),
(20, 'GENEL CERRAHİ'),
(21, 'GERİATRİ'),
(22, 'GÖĞÜS CERRAHİSİ'),
(23, 'GÖĞÜS HASTALIKLARI'),
(24, 'GÖZ HASTALIKLARI'),
(25, 'HEMATOLOJİ'),
(26, 'İÇ HASTALIKLARI'),
(27, 'KADIN HASTALIKLARI VE DOĞUM'),
(28, 'KALP VE DAMAR CERRAHİSİ'),
(29, 'KARDİYOLOJİ'),
(30, 'KEMİK YOĞUNLUĞU ÖLÇÜMÜ'),
(31, 'KULAK-BURUN-BOĞAZ HASTALIKLARI'),
(32, 'NEFROLOJİ'),
(33, 'NÖROLOJİ'),
(34, 'ORTOPEDİ VE TRAVMATOLOJİ'),
(35, 'PLASTİK REKONSTRÜKTİF VE ESTET'),
(36, 'PSİKİYATRİ'),
(37, 'RADYASYON ONKOLOJİSİ'),
(38, 'TIBBİ GENETİK'),
(39, 'TIBBİ PATOLOJİ'),
(40, 'ÜROLOJİ');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `muayene`
--

CREATE TABLE `muayene` (
  `muayene_id` bigint(20) UNSIGNED NOT NULL,
  `muayene_doktor` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `muayene_tarih` date NOT NULL,
  `muayene_klinik` varchar(20) COLLATE utf8mb4_turkish_ci NOT NULL,
  `mua_hs_id` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `recete`
--

CREATE TABLE `recete` (
  `recete_id` bigint(20) UNSIGNED NOT NULL,
  `recete_hasta` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `recete_ilac` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `recete_aciklama` varchar(1000) COLLATE utf8mb4_turkish_ci NOT NULL,
  `recete_hs_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `doktorlar`
--
ALTER TABLE `doktorlar`
  ADD PRIMARY KEY (`doktor_id`);

--
-- Tablo için indeksler `hasta`
--
ALTER TABLE `hasta`
  ADD PRIMARY KEY (`hasta_id`);

--
-- Tablo için indeksler `klinikler`
--
ALTER TABLE `klinikler`
  ADD PRIMARY KEY (`klinik_id`);

--
-- Tablo için indeksler `muayene`
--
ALTER TABLE `muayene`
  ADD PRIMARY KEY (`muayene_id`);

--
-- Tablo için indeksler `recete`
--
ALTER TABLE `recete`
  ADD PRIMARY KEY (`recete_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `doktorlar`
--
ALTER TABLE `doktorlar`
  MODIFY `doktor_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- Tablo için AUTO_INCREMENT değeri `hasta`
--
ALTER TABLE `hasta`
  MODIFY `hasta_id` bigint(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `klinikler`
--
ALTER TABLE `klinikler`
  MODIFY `klinik_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Tablo için AUTO_INCREMENT değeri `muayene`
--
ALTER TABLE `muayene`
  MODIFY `muayene_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Tablo için AUTO_INCREMENT değeri `recete`
--
ALTER TABLE `recete`
  MODIFY `recete_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
