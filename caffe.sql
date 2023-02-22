-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Feb 2023 pada 18.07
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `caffe`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailtransaksi`
--

CREATE TABLE `detailtransaksi` (
  `kode_relasi` bigint(20) UNSIGNED NOT NULL,
  `kode_transaksi` bigint(20) UNSIGNED NOT NULL,
  `kode_menu` bigint(20) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `detailtransaksi`
--

INSERT INTO `detailtransaksi` (`kode_relasi`, `kode_transaksi`, `kode_menu`, `jumlah`, `subtotal`, `created_at`, `updated_at`) VALUES
(1, 25, 1, 2, 10000, '2023-02-15 01:48:12', '2023-02-15 01:48:12'),
(2, 25, 3, 2, 14000, '2023-02-15 01:48:17', '2023-02-15 01:48:17'),
(3, 26, 1, 2, 10000, '2023-02-15 01:49:43', '2023-02-15 01:49:43'),
(8, 31, 1, 2, 10000, '2023-02-16 00:40:14', '2023-02-16 00:40:14'),
(9, 31, 3, 3, 21000, '2023-02-16 00:40:27', '2023-02-16 00:40:27'),
(10, 32, 3, 2, 14000, '2023-02-16 01:52:52', '2023-02-16 01:52:52'),
(11, 32, 4, 2, 10000, '2023-02-16 01:52:58', '2023-02-16 01:52:58'),
(12, 33, 1, 2, 10000, '2023-02-16 01:53:53', '2023-02-16 01:53:53'),
(13, 33, 3, 2, 14000, '2023-02-16 01:53:59', '2023-02-16 01:53:59'),
(14, 34, 1, 2, 10000, '2023-02-16 02:00:06', '2023-02-16 02:00:06'),
(15, 34, 3, 2, 14000, '2023-02-16 02:00:12', '2023-02-16 02:00:12'),
(22, 41, 1, 2, 10000, '2023-02-16 07:37:20', '2023-02-16 07:37:20'),
(23, 41, 3, 2, 14000, '2023-02-16 07:37:27', '2023-02-16 07:37:27'),
(24, 42, 1, 2, 10000, '2023-02-18 23:52:30', '2023-02-18 23:52:30'),
(25, 43, 1, 2, 10000, '2023-02-19 00:30:42', '2023-02-19 00:30:42'),
(26, 43, 3, 2, 14000, '2023-02-19 00:30:45', '2023-02-19 00:30:45'),
(27, 44, 1, 2, 10000, '2023-02-19 00:35:47', '2023-02-19 00:35:47'),
(28, 45, 1, 2, 10000, '2023-02-19 00:36:17', '2023-02-19 00:36:17'),
(29, 46, 3, 2, 14000, '2023-02-19 00:36:53', '2023-02-19 00:36:53'),
(30, 46, 1, 2, 10000, '2023-02-19 00:36:57', '2023-02-19 00:36:57'),
(31, 47, 1, 2, 10000, '2023-02-19 01:15:17', '2023-02-19 01:15:17'),
(32, 47, 3, 2, 14000, '2023-02-19 01:15:20', '2023-02-19 01:15:20'),
(33, 48, 1, 2, 10000, '2023-02-19 01:16:55', '2023-02-19 01:16:55'),
(34, 49, 3, 2, 14000, '2023-02-19 01:18:40', '2023-02-19 01:18:40'),
(35, 50, 1, 2, 10000, '2023-02-19 01:20:08', '2023-02-19 01:20:08'),
(36, 51, 1, 2, 10000, '2023-02-19 01:21:46', '2023-02-19 01:21:46'),
(37, 52, 3, 2, 14000, '2023-02-19 01:23:51', '2023-02-19 01:23:51'),
(38, 53, 1, 2, 10000, '2023-02-19 01:24:47', '2023-02-19 01:24:47'),
(39, 54, 1, 2, 10000, '2023-02-19 01:25:44', '2023-02-19 01:25:44'),
(40, 55, 1, 2, 10000, '2023-02-19 01:27:02', '2023-02-19 01:27:02'),
(41, 56, 1, 2, 10000, '2023-02-19 01:32:20', '2023-02-19 01:32:20'),
(43, 58, 1, 2, 10000, '2023-02-19 01:44:17', '2023-02-19 01:44:17'),
(44, 59, 1, 2, 10000, '2023-02-19 01:45:29', '2023-02-19 01:45:29'),
(45, 59, 1, 2, 10000, '2023-02-19 01:46:03', '2023-02-19 01:46:03'),
(46, 60, 1, 2, 10000, '2023-02-19 01:47:00', '2023-02-19 01:47:00'),
(47, 61, 1, 2, 10000, '2023-02-19 01:48:22', '2023-02-19 01:48:22'),
(48, 61, 1, 1, 5000, '2023-02-19 01:48:47', '2023-02-19 01:48:47'),
(49, 62, 1, 2, 10000, '2023-02-19 01:49:35', '2023-02-19 01:49:35'),
(50, 62, 1, 1, 5000, '2023-02-19 01:49:52', '2023-02-19 01:49:52'),
(51, 63, 1, 2, 10000, '2023-02-19 01:50:52', '2023-02-19 01:50:52'),
(52, 64, 1, 2, 10000, '2023-02-19 01:54:00', '2023-02-19 01:54:00'),
(53, 64, 1, 1, 5000, '2023-02-19 01:54:06', '2023-02-19 01:54:06'),
(54, 65, 1, 2, 10000, '2023-02-19 09:14:22', '2023-02-19 09:14:22'),
(55, 65, 5, 2, 30000, '2023-02-19 09:14:30', '2023-02-19 09:14:30'),
(56, 66, 1, 2, 10000, '2023-02-19 09:15:31', '2023-02-19 09:15:31'),
(57, 67, 1, 3, 15000, '2023-02-19 09:15:50', '2023-02-19 09:15:50'),
(58, 68, 1, 2, 10000, '2023-02-19 09:17:08', '2023-02-19 09:17:08'),
(59, 69, 1, 1, 5000, '2023-02-19 09:18:43', '2023-02-19 09:18:43'),
(60, 70, 1, 1, 5000, '2023-02-19 09:18:58', '2023-02-19 09:18:58'),
(61, 71, 1, 1, 5000, '2023-02-19 09:20:38', '2023-02-19 09:20:38'),
(62, 72, 5, 2, 30000, '2023-02-19 09:25:41', '2023-02-19 09:25:41'),
(63, 73, 5, 1, 15000, '2023-02-19 09:27:44', '2023-02-19 09:27:44'),
(64, 74, 1, 2, 10000, '2023-02-19 09:29:32', '2023-02-19 09:29:32'),
(65, 75, 1, 2, 10000, '2023-02-19 09:29:33', '2023-02-19 09:29:33'),
(66, 75, 4, 2, 10000, '2023-02-19 09:29:51', '2023-02-19 09:29:51'),
(67, 76, 1, 2, 10000, '2023-02-19 09:30:30', '2023-02-19 09:30:30'),
(68, 77, 1, 2, 10000, '2023-02-19 09:33:08', '2023-02-19 09:33:08'),
(69, 78, 1, 2, 10000, '2023-02-19 09:33:19', '2023-02-19 09:33:19'),
(70, 79, 1, 2, 10000, '2023-02-21 21:13:25', '2023-02-21 21:13:25'),
(71, 79, 3, 2, 14000, '2023-02-21 21:13:29', '2023-02-21 21:13:29'),
(72, 80, 1, 2, 10000, '2023-02-21 21:15:18', '2023-02-21 21:15:18'),
(73, 80, 3, 2, 14000, '2023-02-21 21:15:21', '2023-02-21 21:15:21'),
(74, 81, 1, 2, 10000, '2023-02-22 08:48:53', '2023-02-22 08:48:53'),
(78, 85, 1, 2, 10000, '2023-02-22 10:02:53', '2023-02-22 10:02:53'),
(79, 86, 1, 1, 5000, '2023-02-22 10:03:52', '2023-02-22 10:03:52');

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
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_menu` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id`, `nama_menu`, `harga_satuan`, `created_at`, `updated_at`) VALUES
(1, 'Es Dawet', 5000, '2023-02-04 23:37:12', '2023-02-05 00:06:51'),
(3, 'Roti Bakar', 7000, '2023-02-04 23:40:18', '2023-02-04 23:40:18'),
(5, 'Nasi Padang', 15000, '2023-02-18 23:33:37', '2023-02-21 23:48:51'),
(6, 'Sempol', 8000, '2023-02-21 23:49:49', '2023-02-22 08:08:16'),
(7, 'Gorengan', 1000, '2023-02-22 02:34:57', '2023-02-22 02:34:57'),
(8, 'Es Taro', 7000, '2023-02-22 02:36:19', '2023-02-22 02:36:19'),
(9, 'Es Tebu', 7000, '2023-02-22 08:03:55', '2023-02-22 08:03:55');

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_01_31_050645_create_pelanggan_table', 1),
(6, '2023_02_04_090520_users_table', 2),
(7, '2023_02_04_091553_users_table', 3),
(8, '2023_02_05_055621_create_menu_table', 4),
(9, '2023_02_05_072924_create_transaksi_table', 5),
(10, '2023_02_05_074212_create_detailtransaksi_table', 6);

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
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `kode_pelanggan` bigint(20) UNSIGNED NOT NULL,
  `tanggal_daftar` date NOT NULL DEFAULT current_timestamp(),
  `nama_pelanggan` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_wa` char(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`kode_pelanggan`, `tanggal_daftar`, `nama_pelanggan`, `no_wa`, `alamat`, `created_at`, `updated_at`) VALUES
(2, '2023-01-31', 'Yulli', '081234567890', 'Pasung', '2023-01-30 23:48:16', '2023-02-04 12:27:02'),
(5, '2023-01-31', 'Prof. Declan Feest', '1', '528 Lori Meadow\nWest Hilton, TX 23108-8284', '2023-01-31 05:36:32', '2023-01-31 05:36:32'),
(9, '2023-01-31', 'Chase Glover IV', '0804095890', '3799 Klocko RapidsSouth Beverlyborough, SD 05983', '2023-01-31 05:55:09', '2023-02-03 23:39:26'),
(23, '2023-02-04', 'Yanto', '081234567890', 'Klaten', '2023-02-03 22:49:35', '2023-02-03 22:49:35'),
(36, '2023-02-05', 'Adelle Sawayn', '0804172653', 'Haleychester', '2023-02-04 10:53:20', '2023-02-04 10:53:20');

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `kode_transaksi` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `total` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `kembali` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`kode_transaksi`, `user_id`, `tanggal_transaksi`, `total`, `bayar`, `kembali`, `created_at`, `updated_at`) VALUES
(25, 1, '2023-01-15', 24000, 0, 0, '2023-02-15 01:48:12', '2023-02-15 01:48:45'),
(26, 1, '2023-01-15', 10000, 0, 0, '2023-02-15 01:49:43', '2023-02-15 01:49:59'),
(31, 1, '2023-02-16', 31000, 0, 0, '2023-02-16 00:40:14', '2023-02-16 00:40:58'),
(32, 1, '2023-02-16', 24000, 0, 0, '2023-02-16 01:52:52', '2023-02-16 01:53:36'),
(33, 1, '2023-02-16', 24000, 0, 0, '2023-02-16 01:53:53', '2023-02-16 01:55:00'),
(34, 1, '2023-02-16', 24000, 0, 0, '2023-02-16 02:00:06', '2023-02-16 02:00:22'),
(41, 1, '2023-02-16', 24000, 0, 0, '2023-02-16 07:37:20', '2023-02-16 07:37:43'),
(42, 1, '2023-02-19', 10000, 0, 0, '2023-02-18 23:52:30', '2023-02-18 23:52:45'),
(43, 1, '2023-02-19', 2, 0, 0, '2023-02-19 00:30:42', '2023-02-19 00:31:04'),
(44, 1, '2023-02-19', 0, 0, 0, '2023-02-19 00:35:47', '2023-02-19 00:35:47'),
(45, 1, '2023-02-19', 10000, 0, 0, '2023-02-19 00:36:17', '2023-02-19 00:36:30'),
(46, 1, '2023-02-19', 24000, 0, 0, '2023-02-19 00:36:53', '2023-02-19 00:37:09'),
(47, 1, '2023-02-19', 0, 0, 0, '2023-02-19 01:15:17', '2023-02-19 01:15:17'),
(48, 1, '2023-02-19', 10000, 0, 0, '2023-02-19 01:16:55', '2023-02-19 01:17:05'),
(49, 1, '2023-02-19', 14000, 0, 0, '2023-02-19 01:18:40', '2023-02-19 01:18:49'),
(50, 1, '2023-02-19', 10000, 0, 0, '2023-02-19 01:20:08', '2023-02-19 01:20:30'),
(51, 1, '2023-02-19', 10000, 0, 0, '2023-02-19 01:21:46', '2023-02-19 01:21:53'),
(52, 1, '2023-02-19', 14000, 0, 0, '2023-02-19 01:23:51', '2023-02-19 01:24:01'),
(53, 1, '2023-02-19', 10000, 0, 0, '2023-02-19 01:24:47', '2023-02-19 01:24:54'),
(54, 1, '2023-02-19', 10000, 20000, 0, '2023-02-19 01:25:44', '2023-02-19 01:25:52'),
(55, 1, '2023-02-19', 10000, 20000, 10000, '2023-02-19 01:27:02', '2023-02-19 01:27:33'),
(56, 1, '2023-02-19', 10000, 20000, 10000, '2023-02-19 01:32:20', '2023-02-19 01:32:29'),
(58, 1, '2023-02-19', 0, 0, 0, '2023-02-19 01:44:17', '2023-02-19 01:44:17'),
(59, 1, '2023-02-19', 0, 0, 0, '2023-02-19 01:45:29', '2023-02-19 01:45:29'),
(60, 1, '2023-02-19', 0, 0, 0, '2023-02-19 01:47:00', '2023-02-19 01:47:00'),
(61, 1, '2023-02-19', 0, 0, 0, '2023-02-19 01:48:22', '2023-02-19 01:48:22'),
(62, 1, '2023-02-19', 15000, 15000, 0, '2023-02-19 01:49:35', '2023-02-19 01:50:04'),
(63, 1, '2023-02-19', 10000, 10000, 0, '2023-02-19 01:50:52', '2023-02-19 01:53:35'),
(64, 1, '2023-02-19', 15000, 20000, 5000, '2023-02-19 01:54:00', '2023-02-19 01:54:16'),
(65, 1, '2023-02-19', 40000, 40000, 0, '2023-02-19 09:14:22', '2023-02-19 09:14:50'),
(66, 1, '2023-02-19', 10000, 10000, 0, '2023-02-19 09:15:31', '2023-02-19 09:15:44'),
(67, 1, '2023-02-19', 25000, 25000, 0, '2023-02-19 09:15:50', '2023-02-19 09:16:50'),
(68, 1, '2023-02-19', 0, 0, 0, '2023-02-19 09:17:08', '2023-02-19 09:17:08'),
(69, 1, '2023-02-19', 5000, 50000, 45000, '2023-02-19 09:18:43', '2023-02-19 09:18:48'),
(70, 1, '2023-02-19', 5000, 5000, 0, '2023-02-19 09:18:58', '2023-02-19 09:19:17'),
(71, 1, '2023-02-19', 5000, 5000, 0, '2023-02-19 09:20:38', '2023-02-19 09:20:45'),
(72, 1, '2023-02-19', 30000, 2000, -28000, '2023-02-19 09:25:41', '2023-02-19 09:25:54'),
(73, 1, '2023-02-19', 15000, 20000, 5000, '2023-02-19 09:27:44', '2023-02-19 09:28:05'),
(74, 1, '2023-02-19', 0, 0, 0, '2023-02-19 09:29:32', '2023-02-19 09:29:32'),
(75, 1, '2023-02-19', 30000, 35000, 5000, '2023-02-19 09:29:33', '2023-02-19 09:30:05'),
(76, 1, '2023-02-19', 10000, 10000, 0, '2023-02-19 09:30:30', '2023-02-19 09:30:42'),
(77, 1, '2023-02-19', 0, 0, 0, '2023-02-19 09:33:08', '2023-02-19 09:33:08'),
(78, 1, '2023-02-19', 10000, 10000, 0, '2023-02-19 09:33:19', '2023-02-19 09:33:25'),
(79, 1, '2023-02-22', 24000, 0, 0, '2023-02-21 21:13:25', '2023-02-21 21:14:36'),
(80, 1, '2023-02-22', 24000, 30000, 6000, '2023-02-21 21:15:18', '2023-02-21 21:15:27'),
(81, 1, '2023-02-22', 10000, 20000, 10000, '2023-02-22 08:48:53', '2023-02-22 08:49:09'),
(85, 1, '2023-02-22', 10000, 0, 10000, '2023-02-22 10:02:53', '2023-02-22 10:03:06'),
(86, 1, '2023-02-22', 5000, 5000, 0, '2023-02-22 10:03:52', '2023-02-22 10:04:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_wa` char(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `users` (`id`, `username`, `no_wa`, `nama`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Yagami', '081234567890', 'Yagami Suntoro', 'yagami@gmail.com', NULL, '$2y$10$QsrVwgtltsrxuciz0mvr3eGDUUPc/8pKbSMauJplwKhIUY5fqLnx.', NULL, '2023-02-04 11:18:44', '2023-02-21 10:25:52'),
(6, 'Ana', '081234567890', 'Ana Rihana', 'ngikas45u@gmail.com', NULL, '$2y$10$cVC6MRfMXKxUaGS3E/9L3.pRS4kpN3UE/bf97SpW4sM1dZit0vZ/6', NULL, '2023-02-22 02:40:30', '2023-02-22 02:40:30'),
(7, 'Untung', '081234567890', 'Untung Suropati', 'untung@gmail.com', NULL, '$2y$10$Mzfpz5rft59at1pAVXHXGeVpOTcJHyDhhQVqQD9WehE3tnvlA624W', NULL, '2023-02-22 08:00:09', '2023-02-22 08:00:09');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detailtransaksi`
--
ALTER TABLE `detailtransaksi`
  ADD PRIMARY KEY (`kode_relasi`),
  ADD KEY `detailtransaksi_kode_transaksi_foreign` (`kode_transaksi`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`kode_pelanggan`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`kode_transaksi`);

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
-- AUTO_INCREMENT untuk tabel `detailtransaksi`
--
ALTER TABLE `detailtransaksi`
  MODIFY `kode_relasi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `kode_pelanggan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `kode_transaksi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detailtransaksi`
--
ALTER TABLE `detailtransaksi`
  ADD CONSTRAINT `detailtransaksi_kode_transaksi_foreign` FOREIGN KEY (`kode_transaksi`) REFERENCES `transaksi` (`kode_transaksi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
