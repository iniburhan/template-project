-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Jan 2024 pada 07.50
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `template_project`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `history_log`
--

CREATE TABLE `history_log` (
  `id` int(11) NOT NULL,
  `information` varchar(64) DEFAULT NULL,
  `apps` varchar(64) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `history_log`
--

INSERT INTO `history_log` (`id`, `information`, `apps`, `created_at`, `created_by`) VALUES
(1, 'Insert Data Kategori', 'Blog', '2024-01-25 07:12:12', 3),
(2, 'Delete Data Kategori', 'Blog', '2024-01-25 07:14:25', 3),
(3, 'Delete Data Kategori', 'Blog', '2024-01-25 07:15:05', 3),
(4, 'Restore Data Kategori', 'Blog', '2024-01-25 07:15:57', 2),
(5, 'Restore Data Kategori', 'Blog', '2024-01-25 07:16:08', 2),
(6, 'Insert Data Artikel', 'Blog', '2024-01-25 07:20:50', 2),
(7, 'Update Data Artikel', 'Blog', '2024-01-25 07:21:39', 2),
(8, 'Delete Data Artikel', 'Blog', '2024-01-25 07:21:59', 2),
(9, 'Restore Data Artikel', 'Blog', '2024-01-25 07:22:22', 2),
(10, 'Insert Data Income', 'Personal Finance App', '2024-01-25 07:28:32', 2),
(11, 'Update Data Income', 'Personal Finance App', '2024-01-25 07:29:08', 2),
(12, 'Delete Data Income', 'Personal Finance App', '2024-01-25 07:29:58', 3),
(13, 'Insert Data Income', 'Personal Finance App', '2024-01-25 07:46:16', 3),
(14, 'Insert Data Income', 'Personal Finance App', '2024-01-25 07:57:38', 3),
(15, 'Update Data Income', 'Personal Finance App', '2024-01-25 07:58:04', 3),
(16, 'Delete Data Income', 'Personal Finance App', '2024-01-25 07:58:13', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_blog_artikel`
--

CREATE TABLE `ms_blog_artikel` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_penulis` int(11) DEFAULT NULL,
  `publikasi_date` date DEFAULT NULL,
  `flag` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ms_blog_artikel`
--

INSERT INTO `ms_blog_artikel` (`id`, `judul`, `isi`, `id_kategori`, `id_penulis`, `publikasi_date`, `flag`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'test', '<p><span style=\"font-family: &quot;Times New Roman&quot;;\">﻿INI <b>isi <u>Artikel</u></b></span><br></p>', 0, 2, '2024-01-22', 1, '2024-01-22 04:11:50', 2, NULL, NULL),
(2, 'test2', '<p>ini ISI Artikel!</p>', 0, 2, '2024-01-22', 1, '2024-01-22 04:13:07', 2, NULL, NULL),
(3, 'New Honda Vario 160 Fi!', '<p>Honda</p>', 1, 2, '2024-01-22', 1, '2024-01-22 07:59:28', 2, NULL, NULL),
(4, 'Gethuk Goreng! makanan khas dari Sokaraja', '<p>Gethuk goreng</p>', 2, 2, '2024-01-22', 1, '2024-01-22 08:07:26', 2, '2024-01-23 19:52:00', 2),
(5, 'Yamaha New Lexy 155!!!!!', '<p>New Yamaha Lexy 155, keren!</p>', 1, 2, '2024-01-01', 1, '2024-01-22 08:46:56', 2, '2024-01-23 19:51:34', 2),
(6, 'Breaking !! Mega Gallery New Ducati Motogp 2024 Factory…Pecco makin angker !!', '<p style=\"margin-bottom: 26px; overflow-wrap: break-word; color: rgb(40, 40, 40); font-family: Montserrat; font-size: 15px; text-align: justify;\">Cakkk….seharian penuh IWB wira-wiri di jalanan menikmati pemandangan di kampung halaman. Alhasil artikel sedikit telat namun tidak masalah karena kita akan bongkar cak…seperti apa dan bagaimana Launching New Ducati Motogp 2024 Factory ? …yang jelas Pecco makin angker !! simak livery-nya berikut ini…<span id=\"more-235019\"></span></p><p style=\"margin-bottom: 26px; overflow-wrap: break-word; color: rgb(40, 40, 40); font-family: Montserrat; font-size: 15px; text-align: justify;\">Akhirnya tim Ducati Lenovo resmi dirilis Pagi ini, di Palacampiglio di Madonna di Campiglio, skuad dari Borgo Panigale meluncurkan corak mesin Desmosedici GP yang akan mereka gunakan untuk berpartisipasi di Kejuaraan Dunia MotoGP 2024. Corak baru menampilkan beberapa warna merah neon yang mengingatkan pada lekukan logo Ducati dan highlight biru milik perusahaan telekomunikasi Italia TIM selain logo Shell Advance yang sudah ada sebelumnya. Di bagian depan motor, nomor 1 Bagnaia berganti dari merah menjadi hitam, woooww Pecco jadi makin angker cak. Sementara nomor 23 milik Bastianini berkelir putih dari yang sebelumnya pink. Yahhh…emang minimalis dan nyaris tidak banyak perbedaan cak…</p><p style=\"margin-bottom: 26px; overflow-wrap: break-word; color: rgb(40, 40, 40); font-family: Montserrat; font-size: 15px; text-align: justify;\">Luigi Dall’Igna (Manajer Umum Ducati Corse):</p><div class=\"td-a-rec td-a-rec-id-content_inline  tdi_26 td_block_template_13\" style=\"text-align: center; transform: translateZ(0px); color: rgb(40, 40, 40); font-family: Montserrat; font-size: 15px;\"><center><a href=\"https://www.kawasaki-motor.co.id/id-id/\" style=\"color: rgb(135, 135, 135); text-decoration: none;\"><img src=\"https://iwb.sgp1.cdn.digitaloceanspaces.com/wp-content/uploads/2023/04/KLX-IWB-460x110-1.jpg\" alt=\"iklan iwb\" style=\"border: 0px; max-width: 100%; height: auto; margin-bottom: 21px; display: block; width: 696px;\"></a><br></center></div><p style=\"margin-bottom: 26px; overflow-wrap: break-word; color: rgb(40, 40, 40); font-family: Montserrat; font-size: 15px; text-align: justify;\"><a href=\"https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-20241.jpg\" class=\"td-modal-image\" style=\"color: rgb(135, 135, 135); text-decoration: none;\"><img decoding=\"async\" class=\"alignnone size-full wp-image-235021\" src=\"https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-20241.jpg\" alt=\"\" width=\"1526\" height=\"872\" srcset=\"https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-20241.jpg 1526w, https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-20241-800x457.jpg 800w, https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-20241-1200x686.jpg 1200w, https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-20241-768x439.jpg 768w, https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-20241-696x398.jpg 696w, https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-20241-1068x610.jpg 1068w, https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-20241-735x420.jpg 735w\" sizes=\"(max-width: 1526px) 100vw, 1526px\" style=\"height: auto; max-width: 100%; border: 0px; margin: 0px 5px; display: inline-block;\"></a>“Aku senang bisa kembali ke Madonna di Campiglio untuk mempersembahkan tim MotoGP dan WorldSBK kami sebagai Juara Dunia. Tahun 2023 benar-benar merupakan tahun yang tak terlupakan, dan sekarang kami di sini untuk memulai musim baru dan menyambut tantangan yang ada di depan pada tahun 2024. Di MotoGP, Tim Ducati Lenovo akan kembali menampilkan Juara Dunia Pecco Bagnaia bersama Enea Bastianini. Sayangnya, Bastianini tidak dapat menampilkan potensi penuhnya tahun lalu karena banyak cedera, namun kami optimis dengan penampilannya musim ini.”</p><p style=\"margin-bottom: 26px; overflow-wrap: break-word; color: rgb(40, 40, 40); font-family: Montserrat; font-size: 15px; text-align: justify;\">Francesco Bagnaia (#1, Tim Ducati Lenovo):</p><p style=\"margin-bottom: 26px; overflow-wrap: break-word; color: rgb(40, 40, 40); font-family: Montserrat; font-size: 15px; text-align: justify;\"><a href=\"https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-20244.jpg\" class=\"td-modal-image\" style=\"color: rgb(135, 135, 135); text-decoration: none;\"><img decoding=\"async\" class=\"alignnone size-full wp-image-235024\" src=\"https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-20244.jpg\" alt=\"\" width=\"1490\" height=\"894\" srcset=\"https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-20244.jpg 1490w, https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-20244-800x480.jpg 800w, https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-20244-1200x720.jpg 1200w, https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-20244-768x461.jpg 768w, https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-20244-696x418.jpg 696w, https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-20244-1068x641.jpg 1068w, https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-20244-700x420.jpg 700w\" sizes=\"(max-width: 1490px) 100vw, 1490px\" style=\"height: auto; max-width: 100%; border: 0px; margin: 0px 5px; display: inline-block;\"></a>“ Aku sangat bersemangat untuk memulai musim keempatku bersama Tim Ducati Lenovo. Tes terakhir di Valencia memberikan hasil positif, memberi kami landasan yang kuat untuk pengembangan musim mendatang. Aku bersemangat untuk turun balap dan melanjutkan perjalanan. Ini pasti akan menjadi musim yang penuh tantangan, namun kami siap menghadapinya dengan determinasi seperti biasa. Sebagai tim yang kompak, kami akan memberikan yang terbaik untuk mengincar gelar Championship sekali lagi.”</p><p style=\"margin-bottom: 26px; overflow-wrap: break-word; color: rgb(40, 40, 40); font-family: Montserrat; font-size: 15px; text-align: justify;\">Enea Bastianini (#23, Tim Ducati Lenovo):</p><p style=\"margin-bottom: 26px; overflow-wrap: break-word; color: rgb(40, 40, 40); font-family: Montserrat; font-size: 15px; text-align: justify;\">“2023 adalah tahun yang penuh tantangan, dan aku berharap dapat bangkit di musim mendatang. Kita memiliki tahun 2024 yang menarik di depan. Meskipun hanya berpartisipasi dalam beberapa Grand Prix tahun lalu, aku telah mendapatkan pelajaran berharga. Aku memiliki kepercayaan diri yang besar pada Tim, dan aku tahu kami memiliki semua potensi untuk melakukannya dengan baik. Aku tidak sabar untuk segera memulai balapan danmusim baru….” tutup Enea…(iwb)</p><p style=\"margin-bottom: 26px; overflow-wrap: break-word; color: rgb(40, 40, 40); font-family: Montserrat; font-size: 15px; text-align: justify;\"><a href=\"https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-20245.jpg\" class=\"td-modal-image\" style=\"color: rgb(135, 135, 135); text-decoration: none;\"><img loading=\"lazy\" decoding=\"async\" class=\"alignnone size-full wp-image-235025\" src=\"https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-20245.jpg\" alt=\"\" width=\"1582\" height=\"872\" srcset=\"https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-20245.jpg 1582w, https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-20245-800x441.jpg 800w, https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-20245-1200x661.jpg 1200w, https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-20245-768x423.jpg 768w, https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-20245-1536x847.jpg 1536w, https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-20245-696x385.jpg 696w, https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-20245-1068x589.jpg 1068w, https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-20245-762x420.jpg 762w\" sizes=\"(max-width: 1582px) 100vw, 1582px\" style=\"height: auto; max-width: 100%; border: 0px; margin: 0px 5px; display: inline-block;\"></a><a href=\"https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-20242.jpg\" class=\"td-modal-image\" style=\"color: rgb(135, 135, 135); text-decoration: none;\"><img loading=\"lazy\" decoding=\"async\" class=\"alignnone size-full wp-image-235022\" src=\"https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-20242.jpg\" alt=\"\" width=\"1426\" height=\"864\" srcset=\"https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-20242.jpg 1426w, https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-20242-800x485.jpg 800w, https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-20242-1200x727.jpg 1200w, https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-20242-768x465.jpg 768w, https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-20242-696x422.jpg 696w, https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-20242-1068x647.jpg 1068w, https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-20242-693x420.jpg 693w\" sizes=\"(max-width: 1426px) 100vw, 1426px\" style=\"height: auto; max-width: 100%; border: 0px; margin: 0px 5px; display: inline-block;\"></a><a href=\"https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-20246.jpg\" class=\"td-modal-image\" style=\"color: rgb(135, 135, 135); text-decoration: none;\"><img loading=\"lazy\" decoding=\"async\" class=\"alignnone size-full wp-image-235026\" src=\"https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-20246.jpg\" alt=\"\" width=\"1520\" height=\"912\" srcset=\"https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-20246.jpg 1520w, https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-20246-800x480.jpg 800w, https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-20246-1200x720.jpg 1200w, https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-20246-768x461.jpg 768w, https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-20246-696x418.jpg 696w, https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-20246-1068x641.jpg 1068w, https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-20246-700x420.jpg 700w\" sizes=\"(max-width: 1520px) 100vw, 1520px\" style=\"height: auto; max-width: 100%; border: 0px; margin: 0px 5px; display: inline-block;\"></a>&nbsp;<a href=\"https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-20247.jpg\" class=\"td-modal-image\" style=\"color: rgb(135, 135, 135); text-decoration: none;\"><img loading=\"lazy\" decoding=\"async\" class=\"alignnone size-full wp-image-235027\" src=\"https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-20247.jpg\" alt=\"\" width=\"1508\" height=\"896\" srcset=\"https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-20247.jpg 1508w, https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-20247-800x475.jpg 800w, https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-20247-1200x713.jpg 1200w, https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-20247-768x456.jpg 768w, https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-20247-696x414.jpg 696w, https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-20247-1068x635.jpg 1068w, https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-20247-707x420.jpg 707w\" sizes=\"(max-width: 1508px) 100vw, 1508px\" style=\"height: auto; max-width: 100%; border: 0px; margin: 0px 5px; display: inline-block;\"></a>&nbsp;<a href=\"https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-20248.jpg\" class=\"td-modal-image\" style=\"color: rgb(135, 135, 135); text-decoration: none;\"><img loading=\"lazy\" decoding=\"async\" class=\"alignnone size-full wp-image-235028\" src=\"https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-20248.jpg\" alt=\"\" width=\"1486\" height=\"878\" srcset=\"https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-20248.jpg 1486w, https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-20248-800x473.jpg 800w, https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-20248-1200x709.jpg 1200w, https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-20248-768x454.jpg 768w, https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-20248-696x411.jpg 696w, https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-20248-1068x631.jpg 1068w, https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-20248-711x420.jpg 711w\" sizes=\"(max-width: 1486px) 100vw, 1486px\" style=\"height: auto; max-width: 100%; border: 0px; margin: 0px 5px; display: inline-block;\"></a>&nbsp;<a href=\"https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-20249.jpg\" class=\"td-modal-image\" style=\"color: rgb(135, 135, 135); text-decoration: none;\"><img loading=\"lazy\" decoding=\"async\" class=\"alignnone size-full wp-image-235029\" src=\"https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-20249.jpg\" alt=\"\" width=\"1466\" height=\"896\" srcset=\"https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-20249.jpg 1466w, https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-20249-800x489.jpg 800w, https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-20249-1200x733.jpg 1200w, https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-20249-768x469.jpg 768w, https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-20249-696x425.jpg 696w, https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-20249-1068x653.jpg 1068w, https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-20249-687x420.jpg 687w\" sizes=\"(max-width: 1466px) 100vw, 1466px\" style=\"height: auto; max-width: 100%; border: 0px; margin: 0px 5px; display: inline-block;\"></a>&nbsp;<a href=\"https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-202410.jpg\" class=\"td-modal-image\" style=\"color: rgb(135, 135, 135); text-decoration: none;\"><img loading=\"lazy\" decoding=\"async\" class=\"alignnone size-full wp-image-235030\" src=\"https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-202410.jpg\" alt=\"\" width=\"1408\" height=\"874\" srcset=\"https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-202410.jpg 1408w, https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-202410-800x497.jpg 800w, https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-202410-1200x745.jpg 1200w, https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-202410-768x477.jpg 768w, https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-202410-696x432.jpg 696w, https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-202410-1068x663.jpg 1068w, https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-202410-677x420.jpg 677w, https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-202410-356x220.jpg 356w\" sizes=\"(max-width: 1408px) 100vw, 1408px\" style=\"height: auto; max-width: 100%; border: 0px; margin: 0px 5px; display: inline-block;\"></a>&nbsp;<a href=\"https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-202411.jpg\" class=\"td-modal-image\" style=\"color: rgb(135, 135, 135); text-decoration: none;\"><img fetchpriority=\"high\" decoding=\"async\" class=\"alignnone size-full wp-image-235031\" src=\"https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-202411.jpg\" alt=\"\" width=\"1170\" height=\"776\" srcset=\"https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-202411.jpg 1170w, https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-202411-800x531.jpg 800w, https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-202411-768x509.jpg 768w, https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-202411-696x462.jpg 696w, https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-202411-1068x708.jpg 1068w, https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-202411-633x420.jpg 633w\" sizes=\"(max-width: 1170px) 100vw, 1170px\" style=\"height: auto; max-width: 100%; border: 0px; margin: 0px 5px; display: inline-block;\"></a>&nbsp;<a href=\"https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-202412.jpg\" class=\"td-modal-image\" style=\"color: rgb(135, 135, 135); text-decoration: none;\"><img loading=\"lazy\" decoding=\"async\" class=\"alignnone size-full wp-image-235032\" src=\"https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-202412.jpg\" alt=\"\" width=\"1586\" height=\"866\" srcset=\"https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-202412.jpg 1586w, https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-202412-800x437.jpg 800w, https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-202412-1200x655.jpg 1200w, https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-202412-768x419.jpg 768w, https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-202412-1536x839.jpg 1536w, https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-202412-696x380.jpg 696w, https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-202412-1068x583.jpg 1068w, https://cdn.iwanbanaran.com/wp-content/uploads/2024/01/pecco-ducati-202412-769x420.jpg 769w\" sizes=\"(max-width: 1586px) 100vw, 1586px\" style=\"height: auto; max-width: 100%; border: 0px; margin: 0px 5px; display: inline-block;\"></a></p>', 1, 2, '2024-01-24', 1, '2024-01-24 01:45:34', 2, '2024-01-23 18:48:14', 2),
(7, 'History Log!', '<p>History Log</p>', 5, 2, '2024-01-25', 1, '2024-01-25 07:20:50', 2, '2024-01-25 00:22:22', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_blog_kategori`
--

CREATE TABLE `ms_blog_kategori` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(255) DEFAULT NULL,
  `flag` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ms_blog_kategori`
--

INSERT INTO `ms_blog_kategori` (`id`, `nama_kategori`, `flag`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Otomotif', 1, '2024-01-22 02:11:20', 2, '2024-01-21 21:16:24', 2),
(2, 'Food Street', 1, '2024-01-22 02:23:47', 2, NULL, NULL),
(3, 'Smartphone', 1, '2024-01-23 02:52:25', 2, '2024-01-23 18:42:52', NULL),
(4, 'Elektronik', 1, '2024-01-25 07:09:16', 3, '2024-01-25 00:16:08', NULL),
(5, 'Gadget', 1, '2024-01-25 07:10:15', 3, NULL, NULL),
(6, 'Vacations', 1, '2024-01-25 07:12:12', 3, '2024-01-25 00:15:57', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_blog_penulis`
--

CREATE TABLE `ms_blog_penulis` (
  `id` int(11) NOT NULL,
  `nama_penulis` varchar(255) DEFAULT NULL,
  `flag` int(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_pfa_income`
--

CREATE TABLE `ms_pfa_income` (
  `id` int(11) NOT NULL,
  `information_name` varchar(64) DEFAULT NULL,
  `flag` int(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ms_pfa_income`
--

INSERT INTO `ms_pfa_income` (`id`, `information_name`, `flag`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Salary', 1, '2024-01-25 04:07:27', 3, '2024-01-24 21:16:44', 3),
(2, 'Gaji Perbulan', 1, '2024-01-25 07:28:32', 2, '2024-01-25 08:01:51', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_pfa_outcome`
--

CREATE TABLE `ms_pfa_outcome` (
  `id` int(11) NOT NULL,
  `information_name` varchar(64) DEFAULT NULL,
  `flag` int(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ms_pfa_outcome`
--

INSERT INTO `ms_pfa_outcome` (`id`, `information_name`, `flag`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Makan', 1, '2024-01-25 07:46:16', 3, NULL, NULL),
(2, 'Transportation', 1, '2024-01-25 07:57:38', 3, '2024-01-25 08:02:05', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `trx_pfa`
--

CREATE TABLE `trx_pfa` (
  `id` int(11) DEFAULT NULL,
  `id_income` int(11) DEFAULT NULL,
  `income` float DEFAULT NULL,
  `flag` int(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `trx_pfa_details`
--

CREATE TABLE `trx_pfa_details` (
  `id` int(11) DEFAULT NULL,
  `id_trx` int(11) DEFAULT NULL,
  `id_outcome` int(11) DEFAULT NULL,
  `outcome` float DEFAULT NULL,
  `flag` int(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'burhan', 'burhan@gmail.com', NULL, '$2y$10$YCK3uBJFsCSEApGwNF9souIvcWZQb7JpEbhwxE05iTp8eh4gVqtD2', NULL, '2024-01-18 18:56:41', '2024-01-18 18:56:41'),
(2, 'darsono', 'darsono@gmail.com', NULL, '$2y$10$S7y1ef14nT7DAeSzK4ayKuwLD2w6jW6LJbiAHDINLJX34mZHVJU4G', NULL, '2024-01-19 00:07:53', '2024-01-19 00:07:53'),
(3, 'Frinada', 'frinada@gmail.com', NULL, '$2y$10$/Cj7tDAE2JrsxQzqKuF46.Oszeo8bAAA5J1lDf6yrP7gQbPs3b9mG', NULL, '2024-01-24 00:47:20', '2024-01-24 00:47:20');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `history_log`
--
ALTER TABLE `history_log`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ms_blog_artikel`
--
ALTER TABLE `ms_blog_artikel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ms_blog_kategori`
--
ALTER TABLE `ms_blog_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ms_blog_penulis`
--
ALTER TABLE `ms_blog_penulis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ms_pfa_income`
--
ALTER TABLE `ms_pfa_income`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indeks untuk tabel `ms_pfa_outcome`
--
ALTER TABLE `ms_pfa_outcome`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `history_log`
--
ALTER TABLE `history_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `ms_blog_artikel`
--
ALTER TABLE `ms_blog_artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `ms_blog_kategori`
--
ALTER TABLE `ms_blog_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `ms_blog_penulis`
--
ALTER TABLE `ms_blog_penulis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ms_pfa_income`
--
ALTER TABLE `ms_pfa_income`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `ms_pfa_outcome`
--
ALTER TABLE `ms_pfa_outcome`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
