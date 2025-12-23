-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 23 Ara 2025, 16:18:28
-- Sunucu sürümü: 8.4.7
-- PHP Sürümü: 8.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `haber_sitesi`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `haberler`
--

DROP TABLE IF EXISTS `haberler`;
CREATE TABLE IF NOT EXISTS `haberler` (
  `id` int NOT NULL AUTO_INCREMENT,
  `baslik` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icerik` text COLLATE utf8mb4_unicode_ci,
  `resim` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tarih` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `haberler`
--

INSERT INTO `haberler` (`id`, `baslik`, `icerik`, `resim`, `tarih`) VALUES
(4, 'Asgari ücrette üçüncü toplantı', 'Asgari Ücret Tespit Komisyonu’nun üçüncü toplantısı, bugün saat 18.00\'de Çalışma ve Sosyal Güvenlik Bakanlığı ev sahipliğinde gerçekleştirilecek.\r\n\r\nDoğrudan 8,8 milyon çalışanı, dolaylı ise toplumun tamamını ilgilendiren yeni asgari ücretin belirlenmesine yönelik süreç devam ediyor.\r\n\r\nİlk toplantısını 12 Aralık\'ta, ikinci toplantısını ise 18 Aralık\'ta yapan Asgari Ücret Tespit Komisyonu, üçüncü ve son toplantısını bugün saat 18.00\'de yapacak.\r\n\r\nİkinci toplantısında ekonomik veri ve raporları masaya yatıran komisyonun, yeni asgari ücreti hükümet ve işveren kesimini temsil eden üyelerin oylarıyla bugünkü toplantıda belirlemesi bekleniyor.\r\n\r\nAsgari ücret, halen bir işçi için aylık brüt 26 bin 5 lira 50 kuruş, kesintiler düştüğünde net 22 bin 104 lira 67 kuruş.', '694ab8407513b_eko1.jpg', '2025-12-23 15:41:52'),
(5, 'Cumhurbaşkanı Erdoğan, Lübnan Cumhurbaşkanı Aoun ile telefonda görüştü', 'Cumhurbaşkanı Erdoğan, Lübnan Cumhurbaşkanı Aoun ile telefonda görüştü. Görüşmede, Türkiye-Lübnan ikili ilişkileri ve bölgesel konular değerlendirildi.\r\n\r\nCumhurbaşkanı Erdoğan, görüşmede Türkiye’nin Lübnan\'ın güvenliğini destekleyecek uluslararası mekanizmalarda görev almaya her daim hazır olduğunu belirtti.', '694abaf4d8f1c_e.jpg', '2025-12-23 15:53:24'),
(6, 'Cumhurbaşkanı Erdoğan, Lübnan Cumhurbaşkanı Aoun ile telefonda görüştü. Görüşmede, Türkiye-Lübnan ikili ilişkileri ve bölgesel konular değerlendirildi.  Cumhurbaşkanı Erdoğan, görüşmede Türkiye’nin Lübnan\'ın güvenliğini destekleyecek uluslararası mekanizm', 'Cumhurbaşkanı Erdoğan, Lübnan Cumhurbaşkanı Aoun ile telefonda görüştü. Görüşmede, Türkiye-Lübnan ikili ilişkileri ve bölgesel konular değerlendirildi.\r\n\r\nCumhurbaşkanı Erdoğan, görüşmede Türkiye’nin Lübnan\'ın güvenliğini destekleyecek uluslararası mekanizmalarda görev almaya her daim hazır olduğunu belirtti.', '694abb99c3cc1_chp.webp', '2025-12-23 15:56:09'),
(3, 'Galatasaray\'a çifte müjde: Geri dönüyorlar', 'Bir süredir sakatlık ve cezalarla başı dertte olan, üstüne bir de Afrika Kupası’nın eklenmesiyle zor günlerden geçen Galatasaray’a üst üste müjdeli haberler geliyor.\r\n\r\n2025 yılını Kasımpaşa galibiyetiyle Süper Lig’in lideri olarak kapatan Cim Bom, 2026’yı 5 Ocak’ta Trabzonspor’la oynanacak Süper Kupa maçıyla açacak.\r\n\r\nZorlu maç öncesi eksik oyunculardan gelen haberler ise yüzleri güldürmüş durumda. İlk olarak bahis soruşturması nedeniyle PFDK’dan 45 gün hak mahrumiyeti alan Eren Elmalı’nın cezası 25 Aralık itibarıyla sona eriyor. Yani Eren, Trabzonspor’a karşı forma giyebilecek. En azından kulübeye...\r\n\r\nSakatlığı nedeniyle bir süredir takımdan ayrı olan Uğurcan Çakır da eski takımı Trabzon’a karşı eldivenleri giymeye çok yakın. Ağrıları azalan tecrübeli eldivenin Süper Kupa’da kaleyi teslim alması bekleniyor.', '694ab7c68d8f8_gshaber.webp', '2025-12-23 15:39:50'),
(7, 'Dünyanın ilk 10 keşfi arasına Türkiye\'den bir yer girdi', 'Şanlıurfa’daki Taş Tepeler Projesi’nin önemli merkezlerinden Karahantepe, Archaeology Magazine tarafından 2025’in dünyanın en önemli 10 arkeolojik keşfi arasında gösterildi. Uluslararası listede yer alan Karahantepe, insanlık tarihine dair yerleşik kabulleri yeniden tartışmaya açıyor.\r\n\r\n\r\nKarahantepe, Türkiye’nin arkeoloji alanındaki küresel görünürlüğünü artıran çarpıcı bir başarıya imza attı. Şanlıurfa’da yürütülen bilimsel kazılar, dünya kamuoyunun dikkatini bölgeye çevirdi.', '694abc0f46a20_dünya.webp', '2025-12-23 15:58:07'),
(8, 'Komşu\'ya 450 milyon Euro kaçak elektrik faturası', 'Yunanistan’da kaçak elektrik kullanımı, dürüst tüketicilere ağır bir fatura çıkarıyor. Devletin elektrik dağıtım operatörüne göre ülkede 400 bine varan kaçak ya da müdahaleli bağlantı bulunuyor. Bunun yıllık maliyeti 450 milyon Euro\'ya ulaşıyor.\r\n\r\nYunanistan’ın kamuya ait elektrik dağıtım şirketi Hellenic Electricity Distribution Network Operator (HEDNO/DEDDIE), ülkedeki kaçak elektrik kullanımının boyutlarını ortaya koyan yeni veriler yayımladı. Buna göre her bir kaçak bağlantı, iki yıllık dönemde ortalama 13 MWh elektrik tüketiyor.\r\n\r\nKişi başı 60 Euro\r\nBu kayıp, toplamda 450 milyon Euro gelir kaybına karşılık geliyor. HEDNO hesaplamalarına göre bu tutar, yasal her bir elektrik abonesi için yıllık yaklaşık 60 Euro ek yük anlamına geliyor.', '694abc6f4e711_eko.webp', '2025-12-23 15:59:43');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
