-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 04 Ağu 2020, 00:52:56
-- Sunucu sürümü: 10.1.37-MariaDB
-- PHP Sürümü: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `blog`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `blog_content`
--

CREATE TABLE `blog_content` (
  `bc_id` int(11) NOT NULL,
  `bc_banner` varchar(150) NOT NULL COMMENT 'Ana Sayfa Resmi',
  `bc_title` varchar(39) NOT NULL,
  `bc_slug` varchar(255) NOT NULL,
  `bc_text` text NOT NULL,
  `bc_displayed` smallint(10) NOT NULL DEFAULT '0' COMMENT 'Görüntülenme Sayısı',
  `bc_sliderStatu` tinyint(1) NOT NULL COMMENT 'Slider Görünüm Durumu',
  `bc_ofav` tinyint(1) NOT NULL COMMENT 'Bizim Seçtiklerimiz Görüntülenme Durumu',
  `bc_statu` tinyint(1) NOT NULL COMMENT '0: Taslak || 1: Yayında',
  `SeoSettings_title` varchar(39) NOT NULL,
  `SeoSettings_desc` varchar(300) NOT NULL,
  `SeoSettings_keyword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `blog_content`
--

INSERT INTO `blog_content` (`bc_id`, `bc_banner`, `bc_title`, `bc_slug`, `bc_text`, `bc_displayed`, `bc_sliderStatu`, `bc_ofav`, `bc_statu`, `SeoSettings_title`, `SeoSettings_desc`, `SeoSettings_keyword`) VALUES
(1, 'assets/front/img/uploads/09bdcbbddf9c1c392939804e8a7e4a1d.jpg', 'asdasdasdsadasd', 'asdasdasdsadasd', 'adasdasdasdas', 0, 1, 1, 1, 'asdasdasdsadasd', 'adasdasdasdas', 'dasdasdsadasdsdad'),
(2, 'assets/front/img/uploads/5c0626a83f362ee868cb5d774f5a74e9.jpg', 'asdasdasdsadasd1', 'asdasdasdsadasd1', 'adasdasdasdas', 0, 0, 0, 0, 'asdasdasdsadasd1', 'adasdasdasdas', 'dasdasdsadasdsdad');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `categories`
--

CREATE TABLE `categories` (
  `categorie_id` int(11) NOT NULL,
  `categorie_title` varchar(20) NOT NULL COMMENT 'İçerik Başlık',
  `categorie_slug` int(11) NOT NULL COMMENT 'URL Başlık',
  `categorie_navStatu` tinyint(1) NOT NULL COMMENT 'Menüde Kategori İsmi Gözüksün mü '
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_nickName` varchar(50) NOT NULL,
  `user_email` varchar(150) NOT NULL,
  `user_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `blog_content`
--
ALTER TABLE `blog_content`
  ADD PRIMARY KEY (`bc_id`);

--
-- Tablo için indeksler `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categorie_id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `blog_content`
--
ALTER TABLE `blog_content`
  MODIFY `bc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `categories`
--
ALTER TABLE `categories`
  MODIFY `categorie_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
