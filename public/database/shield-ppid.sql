-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Jun 2026 pada 08.09
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shield-ppid`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `email` varchar(25) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `last_active` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `status`, `status_message`, `active`, `last_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'aiad', '', NULL, NULL, 1, NULL, '2026-05-20 16:15:01', '2026-05-20 16:15:02', NULL),
(2, 'wmdr', '', NULL, NULL, 1, NULL, '2026-05-20 19:38:15', '2026-05-20 19:38:15', NULL),
(3, 'acom', '', NULL, NULL, 1, NULL, '2026-06-02 16:38:45', '2026-06-02 16:38:46', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`id`, `user_id`, `group`, `created_at`) VALUES
(1, 1, 'user', '2026-05-20 16:15:02'),
(2, 2, 'user', '2026-05-20 19:38:15'),
(3, 3, 'user', '2026-06-02 16:38:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_identities`
--

CREATE TABLE `auth_identities` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `secret` varchar(255) NOT NULL,
  `secret2` varchar(255) DEFAULT NULL,
  `expires` datetime DEFAULT NULL,
  `extra` text DEFAULT NULL,
  `force_reset` tinyint(1) NOT NULL DEFAULT 0,
  `last_used_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `auth_identities`
--

INSERT INTO `auth_identities` (`id`, `user_id`, `type`, `name`, `secret`, `secret2`, `expires`, `extra`, `force_reset`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'email_password', NULL, 'aiadwmdr@gmail.com', '$2y$12$30asRTMzhNw8nP5/6e8h/O3BhPKvRm0.0ciQECj3xyI4UPUcyAjYe', NULL, NULL, 0, '2026-06-05 01:59:07', '2026-05-20 16:15:01', '2026-06-05 01:59:07'),
(8, 2, 'email_password', NULL, 'wmdraiad@gmail.com', '$2y$12$fydD9q4g4LgnRJSzOXnEYOlpJ2CJwVQWade1kil5EoRgNJ2gsMTOC', NULL, NULL, 0, '2026-06-02 16:37:07', '2026-05-20 19:38:15', '2026-06-02 16:37:07'),
(13, 1, 'magic-link', NULL, '98f6bbc946dfcb5ce94e', NULL, '2026-05-21 07:02:38', NULL, 0, NULL, '2026-05-21 06:02:38', '2026-05-21 06:02:38'),
(14, 2, 'magic-link', NULL, '0ceb4008ee7eec5b689d', NULL, '2026-05-21 07:24:08', NULL, 0, NULL, '2026-05-21 06:24:08', '2026-05-21 06:24:08'),
(15, 3, 'email_password', NULL, 'a@a.com', '$2y$12$cQ.GEawqb9wKt3KwHkAvQ.m4X/jclVuuRfDaXD.bNgw5aw6HwRB5q', NULL, NULL, 0, '2026-06-02 16:39:28', '2026-06-02 16:38:46', '2026-06-02 16:39:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `id_type` varchar(255) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `user_agent`, `id_type`, `identifier`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'email_password', 'aiadwmdr@gmail.com', NULL, '2026-05-20 16:48:21', 0),
(2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'email_password', 'aiadwmdr@gmail.com', 1, '2026-05-20 16:48:36', 1),
(3, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'email_password', 'aiadwmdr@gmail.com', 1, '2026-05-20 16:49:26', 1),
(4, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'email_password', 'aiadwmdr@gmail.com', 1, '2026-05-20 16:51:35', 1),
(5, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'email_password', 'aiadwmdr@gmail.com', 1, '2026-05-20 17:04:59', 1),
(6, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'email_password', 'aiadwmdr@gmail.com', 1, '2026-05-20 17:07:04', 1),
(7, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'email_password', 'aiadwmdr@gmail.com', 1, '2026-05-20 17:08:14', 1),
(8, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'email_password', 'aiadwmdr@gmail.com', 1, '2026-05-20 17:11:19', 1),
(9, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'email_password', 'aiadwmdr@gmail.com', 1, '2026-05-20 17:11:42', 1),
(10, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'email_password', 'aiadwmdr@gmail.com', 1, '2026-05-20 17:15:12', 1),
(11, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'email_password', 'aiadwmdr@gmail.com', 1, '2026-05-20 17:35:35', 1),
(12, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'email_password', 'aiadwmdr@gmail.com', 1, '2026-05-20 17:36:11', 1),
(13, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'email_password', 'aiadwmdr@gmail.com', 1, '2026-05-20 17:36:29', 1),
(14, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'email_password', 'aiadwmdr@gmail.com', 1, '2026-05-20 18:57:36', 1),
(15, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'email_password', 'aiadwmdr@gmail.com', 1, '2026-05-21 01:47:13', 1),
(16, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'email_password', 'aiadwmdr@gmail.com', 1, '2026-05-21 06:48:51', 1),
(17, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'email_password', 'aiadwmdr@gmail.com', 1, '2026-05-21 07:10:35', 1),
(18, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'email_password', 'aiadwmdr@gmail.com', 1, '2026-05-21 07:12:14', 1),
(19, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'email_password', 'aiadwmdr@gmail.com', 1, '2026-05-21 07:12:30', 1),
(20, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'email_password', 'aiadwmdr@gmail.com', 1, '2026-05-26 13:05:01', 1),
(21, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'email_password', 'aiadwmdr@gmail.com', 1, '2026-05-26 13:36:25', 1),
(22, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'email_password', 'aiadwmdr@gmail.com', 1, '2026-05-26 13:38:20', 1),
(23, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'email_password', 'wmdraiad@gmail.com', 2, '2026-06-02 16:37:07', 1),
(24, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'email_password', 'a@a.com', 3, '2026-06-02 16:39:28', 1),
(25, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'email_password', 'aiadwmdr@gmail.com', 1, '2026-06-04 01:05:14', 1),
(26, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'email_password', 'aiadwmdr@gmail.com', 1, '2026-06-04 01:07:32', 1),
(27, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'email_password', 'aiadwmdr@gmail.com', 1, '2026-06-05 01:59:07', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_permissions_users`
--

CREATE TABLE `auth_permissions_users` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `permission` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_remember_tokens`
--

CREATE TABLE `auth_remember_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_token_logins`
--

CREATE TABLE `auth_token_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `id_type` varchar(255) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `berita` text NOT NULL,
  `kontributor` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri`
--

CREATE TABLE `galeri` (
  `id` int(11) NOT NULL,
  `galeri` varchar(1500) NOT NULL,
  `ket` text NOT NULL,
  `ket2` text NOT NULL,
  `fotografer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hirarki`
--

CREATE TABLE `hirarki` (
  `id` int(11) NOT NULL,
  `regulasi` text NOT NULL,
  `ket` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `delete_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `hirarki`
--

INSERT INTO `hirarki` (`id`, `regulasi`, `ket`, `created_at`, `updated_at`, `delete_at`) VALUES
(1, 'Undang-Undang (UU)', '', '2026-06-10 18:11:51', '2026-06-10 18:11:51', '2026-06-10 18:11:51'),
(2, 'Peraturan Pemerintah (PP)', '', '2026-06-10 18:11:51', '2026-06-10 18:11:51', '2026-06-10 18:11:51'),
(3, 'Peraturan Pemerintah Pengganti Undang-Undang (Perppu)', '', '2026-06-10 18:11:51', '2026-06-10 18:11:51', '2026-06-10 18:11:51'),
(4, 'Peraturan Presiden (Perpres)', '', '2026-06-10 18:11:51', '2026-06-10 18:11:51', '2026-06-10 18:11:51'),
(5, 'Keputusan Presiden (Keppres)', '', '2026-06-10 18:11:51', '2026-06-10 18:11:51', '2026-06-10 18:11:51'),
(6, 'Peraturan Menteri (Permen)', '', '2026-06-10 18:11:51', '2026-06-10 18:11:51', '2026-06-10 18:11:51'),
(7, 'Keputusan Menteri (Kepmen)', '', '2026-06-10 18:11:51', '2026-06-10 18:11:51', '2026-06-10 18:11:51'),
(8, 'Peraturan Eselon 1', '', '2026-06-10 18:11:51', '2026-06-10 18:11:51', '2026-06-10 18:11:51'),
(9, 'Keputusan Eselon 1', '', '2026-06-10 18:11:51', '2026-06-10 18:11:51', '2026-06-10 18:11:51'),
(10, 'Peraturan Eselon 2', '', '2026-06-10 18:11:51', '2026-06-10 18:11:51', '2026-06-10 18:11:51'),
(11, 'Keputusan Eselon 2', '', '2026-06-10 18:11:51', '2026-06-10 18:11:51', '2026-06-10 18:11:51'),
(12, 'Standar Operasional Prosedur', '', '2026-06-10 18:11:51', '2026-06-10 18:11:51', '2026-06-10 18:11:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu_ska`
--

CREATE TABLE `menu_ska` (
  `id` int(11) NOT NULL,
  `menu` text NOT NULL,
  `foto` varchar(150) NOT NULL,
  `ket` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2020-12-28-223112', 'CodeIgniter\\Shield\\Database\\Migrations\\CreateAuthTables', 'default', 'CodeIgniter\\Shield', 1779284217, 1),
(2, '2021-07-04-041948', 'CodeIgniter\\Settings\\Database\\Migrations\\CreateSettingsTable', 'default', 'CodeIgniter\\Settings', 1779284217, 1),
(3, '2021-11-14-143905', 'CodeIgniter\\Settings\\Database\\Migrations\\AddContextColumn', 'default', 'CodeIgniter\\Settings', 1779284217, 1),
(4, '2020-07-30-084624', 'App\\Database\\Migrations\\Sekolah', 'default', 'App', 1780501814, 2),
(5, '2020-11-05-112140', 'App\\Database\\Migrations\\Users', 'default', 'App', 1780501814, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id` int(11) NOT NULL,
  `pengumuman` text NOT NULL,
  `foto` varchar(150) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `regulasi`
--

CREATE TABLE `regulasi` (
  `id` int(11) NOT NULL,
  `id_hirarki` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `judul` text NOT NULL,
  `tentang` text NOT NULL,
  `jenis_peradilan` int(11) NOT NULL,
  `tempat_penetapan` text NOT NULL,
  `pemrakarsa` text NOT NULL,
  `nomor` varchar(255) NOT NULL,
  `sumber` int(11) NOT NULL,
  `tgl_terbit` date NOT NULL,
  `aktif` int(11) NOT NULL,
  `pdf` varchar(255) NOT NULL,
  `abstrak` text NOT NULL,
  `kata_kunci` text NOT NULL,
  `bahasaa` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted_at` datetime NOT NULL DEFAULT current_timestamp(),
  `file_name` text NOT NULL,
  `file_path` text NOT NULL,
  `file_type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `regulasi`
--

INSERT INTO `regulasi` (`id`, `id_hirarki`, `id_status`, `judul`, `tentang`, `jenis_peradilan`, `tempat_penetapan`, `pemrakarsa`, `nomor`, `sumber`, `tgl_terbit`, `aktif`, `pdf`, `abstrak`, `kata_kunci`, `bahasaa`, `created_at`, `updated_at`, `deleted_at`, `file_name`, `file_path`, `file_type`) VALUES
(1, 1, 1, '', '', 0, '0', '', 'sdsfh/54/yu/877', 0, '2026-06-24', 0, '', '', '', '', '2026-06-10 21:45:00', '2026-06-10 21:45:00', '2026-06-10 21:45:00', '', '', ''),
(2, 2, 1, '', '', 0, '0', '', '2323wee', 0, '2026-06-24', 0, '', '', '', '', '2026-06-10 22:22:39', '2026-06-10 22:22:39', '2026-06-10 22:22:39', '', '', ''),
(3, 3, 2, '', '56hghryuytjjghjhgjhjhjjjhhh', 0, '0', '', 'asas2434', 0, '2026-06-11', 0, '', '', '', '', '2026-06-11 11:00:51', '2026-06-11 11:00:51', '2026-06-11 18:00:51', '', '', ''),
(4, 4, 4, '', 'bvmcgkhjkhk', 0, '0', '', 'dfggfgf', 0, '2026-06-07', 0, '', '', '', '', '2026-06-11 11:05:31', '2026-06-11 11:05:31', '2026-06-11 18:05:31', '', '', ''),
(5, 5, 3, '', 'uyuyhjhj', 0, '0', '', 'yttyytyt', 0, '2026-06-10', 0, '', '', '', '', '2026-06-11 11:10:56', '2026-06-11 11:10:56', '2026-06-11 18:10:56', '', '', ''),
(6, 10, 0, '', 'tytyyyt', 0, '', '', 'ghh', 0, '2026-06-08', 0, '', '', '', '', '2026-06-12 16:09:00', '2026-06-12 16:09:00', '2026-06-12 23:09:00', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sdm`
--

CREATE TABLE `sdm` (
  `id` int(20) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `nip` varchar(16) NOT NULL,
  `ttl` varchar(250) NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `gender` text NOT NULL,
  `status_peg` text NOT NULL,
  `tahun_status` date NOT NULL,
  `gol` varchar(250) NOT NULL,
  `tmt_gol` date NOT NULL,
  `tmt_cpns` date NOT NULL,
  `agama` varchar(250) NOT NULL,
  `pendidikan` varchar(250) NOT NULL,
  `pendidikan_dari` varchar(250) NOT NULL,
  `tingkat_penjenjangan` varchar(250) NOT NULL,
  `tahun_penjenjangan` date NOT NULL,
  `jabatan` text NOT NULL,
  `tmt_jabatan` date NOT NULL,
  `tmt_dibalai` date NOT NULL,
  `grade` int(11) NOT NULL,
  `ket` text NOT NULL,
  `no` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `aktif` int(11) NOT NULL,
  `usia_pensiun` int(10) NOT NULL,
  `foto` longblob NOT NULL,
  `dok` varchar(255) NOT NULL,
  `quotes` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `sdm`
--

INSERT INTO `sdm` (`id`, `nama`, `nip`, `ttl`, `tgl_lahir`, `gender`, `status_peg`, `tahun_status`, `gol`, `tmt_gol`, `tmt_cpns`, `agama`, `pendidikan`, `pendidikan_dari`, `tingkat_penjenjangan`, `tahun_penjenjangan`, `jabatan`, `tmt_jabatan`, `tmt_dibalai`, `grade`, `ket`, `no`, `parent_id`, `aktif`, `usia_pensiun`, `foto`, `dok`, `quotes`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Neneng Rusmayanti, S.ST., M. Si', '49790139', '', NULL, '', '', '0000-00-00', 'IV/b', '0000-00-00', '0000-00-00', '', '', '', '', '0000-00-00', 'Kepala Bagian Tata Usaha', '0000-00-00', '0000-00-00', 0, '', 0, 3, 0, 0, 0x313738303834363130375f31303030616432666661653636393764386634342e6a7067, '', '', '0000-00-00 00:00:00', '2026-06-07 15:28:27', '0000-00-00 00:00:00'),
(3, 'Sri Esti Suciati,A.KS,MP', '31336395', '', NULL, '', '', '0000-00-00', 'IV/a', '0000-00-00', '0000-00-00', '', '', '', '', '0000-00-00', 'Penelaah Teknis Kebijakan ', '0000-00-00', '0000-00-00', 0, '', 0, 4, 0, 0, 0x313738303834383639355f33633733373361623132303937353433366132372e6a7067, '', '', '0000-00-00 00:00:00', '2026-06-07 16:11:35', '0000-00-00 00:00:00'),
(4, 'Dra. Dian Listyastuti', '65248205', '', NULL, '', '', '0000-00-00', 'III/d', '0000-00-00', '0000-00-00', '', '', '', '', '0000-00-00', 'Penelaah Teknis Kebijakan', '0000-00-00', '0000-00-00', 0, '', 0, 5, 0, 0, 0x313738303834383932305f35346130363032333964303735353661333032332e6a7067, '', '', '0000-00-00 00:00:00', '2026-06-07 16:15:20', '0000-00-00 00:00:00'),
(6, 'Carles Sitorus, S. ST', '45419178', '', NULL, '', '', '0000-00-00', 'III/d', '0000-00-00', '0000-00-00', '', '', '', '', '0000-00-00', 'Pengolah Data dan Informasi', '0000-00-00', '0000-00-00', 0, '', 0, 6, 0, 0, 0x313738303834383938325f33346437393563666135646139356266306362312e6a7067, '', 'Comedo ara stipes terra trucido.Accusamus adeo tandem quia voveo solutio.', '0000-00-00 00:00:00', '2026-06-07 16:16:22', '0000-00-00 00:00:00'),
(7, 'Nissa Annisa, S. Sos', '30658888', '', NULL, '', '', '0000-00-00', 'III/d', '0000-00-00', '0000-00-00', '', '', '', '', '0000-00-00', 'Penata Layanan Operasional', '0000-00-00', '0000-00-00', 0, '', 0, 7, 0, 0, 0x313738303835303339395f63636438306430613662353539626534313732382e6a7067, '', 'Coaegresco cicuta decumbo testimonium brevis amet aer dedico.', '0000-00-00 00:00:00', '2026-06-07 16:39:59', '0000-00-00 00:00:00'),
(8, 'Henry Hizkia, S. Sos', '21086054', 'Jakarta, 13 - 03 - 1985', '1988-04-24', '', 'PNS', '0000-00-00', 'III/d', '2006-06-05', '1990-01-31', 'Islam', '', 'UNPAD-31 Desmber 2008', '', '0000-00-00', 'Penelaah Teknis Kebijakan', '0000-00-00', '1990-01-31', 7, 'JFU', 1, 8, 0, 58, 0x313738303835313832365f34353364666339653039666164626663656139642e6a7067, '', 'Ago tricesimus adflicto certe assentator adulatio utrimque spargo altus.Curiositas speciosus vita cupiditas expedita avaritia stultus.', '0000-00-00 00:00:00', '2026-06-07 17:03:46', '0000-00-00 00:00:00'),
(9, 'Ipin Saripin, A.KS, M.Pd', '51623167', 'Bandung, 20-11-1974', '1998-07-31', '', 'PNS', '0000-00-00', 'IV/a', '1971-12-28', '1994-03-23', 'Islam', '', 'Cimahi - PLS', 'Diklat PIM IV', '0000-00-00', 'Penelaah Teknis Kebijakan', '0000-00-00', '1994-03-23', 7, 'JFU', 1, 9, 0, 58, 0x313738303835333338395f66373266326566323038613933353964623933612e6a7067, '', 'Alo claudeo venio civis animadverto aperio esse accusantium agnosco spoliatio. Beneficium verbum cena coaegresco deprimo nulla adnuo maxime natus porro. Viscus odit cavus subseco.', '0000-00-00 00:00:00', '2026-06-07 17:29:49', '0000-00-00 00:00:00'),
(10, 'Euis Umiati, A.Ks', '07696722', 'Cikoneng, 13-09-1970', '1974-02-08', '', 'PNS', '0000-00-00', 'III/d', '1995-09-21', '2002-11-29', 'Islam', '', '1994', '', '0000-00-00', 'Penelaah Teknis Kebijakan', '0000-00-00', '2002-11-29', 7, 'JFU', 1, 10, 0, 58, 0x313738303835353037355f31336539313739363535393161666462613464372e6a7067, '', 'Amita tero caelum praesentium summisse adeptio laborum solium abundans aperio.', '0000-00-00 00:00:00', '2026-06-07 17:57:55', '0000-00-00 00:00:00'),
(11, 'Lis Nursyanti, A. KS,  MPS.Sp', '10449029', 'Bandung, 30-11-1972', '1964-02-18', '', 'PNS', '0000-00-00', 'IV/a', '1953-07-13', '1987-02-04', 'Islam', 'S2  Spesialis Peksos STKS Tahun 2013', '', '', '0000-00-00', 'Penelaah Teknis Kebijakan', '0000-00-00', '1987-02-04', 7, 'JFU', 1, 11, 0, 58, 0x313738303835353239395f66323565626562356538326261663232626330322e6a7067, '', 'Apto dedico apud vapulus timor crapula cubicularis.Asperiores solio vestigium contra conqueror molestias tantillus.Sursum antepono vacuus strues quia socius tantillus considero.Tenax centum consuasor vehemens tardus.Uxor vobis absum somnus deripio quasi.', '0000-00-00 00:00:00', '2026-06-07 18:01:39', '0000-00-00 00:00:00'),
(12, 'Agus Salim,S.Pd', '50069292', 'Bandung, 30-10-1971', '1964-10-31', '', 'PNS', '0000-00-00', 'III/a', '1976-12-20', '1985-04-16', 'Islam', 'S1 PLS STKIP Siliwangi', 'Bandung 2014', '', '0000-00-00', 'Penelaah Teknis Kebijakan', '0000-00-00', '1985-04-16', 7, 'JFU', 1, 12, 0, 58, 0x313738303835363138325f65323565333038663333366663323865333833332e6a7067, '', 'Argentum tam arx autus vigilo.', '0000-00-00 00:00:00', '2026-06-07 18:16:22', '0000-00-00 00:00:00'),
(13, 'Arijanto, A. Ks', '05561952', 'Madiun, 20 - 11 - 1971', '1990-01-31', '', 'PNS', '0000-00-00', 'III/d', '1960-07-22', '2001-07-09', 'Islam', 'DIV Kesos ', 'STKS 1995', 'ADUM ', '0000-00-00', 'Penelaah Teknis Kebijakan', '0000-00-00', '2001-07-09', 7, 'JFU', 1, 13, 0, 58, 0x313738303836313633375f35366237636334326663646366653765353334362e6a7067, '', 'Atrocitas ater nostrum molestias vestrum vulnus amita. Defessus paens armarium voluptatibus cognomen venia tendo patior quis. Sum aliquid aut.Aegrotatio defero utroque. Comitatus voluptates peccatus aspicio vis voluptas. Tenetur autus tredecim asperiores ratione quibusdam.Adstringo demoror compono abutor vomer conservo tepidus deprimo. Sustineo numquam delicate decerno. Placeat apto comitatus abstergo amoveo tempora.', '0000-00-00 00:00:00', '2026-06-07 19:47:17', '0000-00-00 00:00:00'),
(14, 'Topik Ismail, S.A.B., M. Tr. A.P', '54964450', 'Tegal, 30 - 5 - 1984', '1994-03-23', '', 'PNS', '0000-00-00', 'III/c', '1979-05-10', '1974-05-06', 'Islam', 'S2 Administrasi Publik', '', '', '0000-00-00', 'Penelaah Teknis Kebijakan', '0000-00-00', '1974-05-06', 7, 'JFU', 1, 14, 0, 58, 0x313738303836313732365f64356565376637623539663662373139373237612e6a7067, '', 'Bellum allatus tardus. Aeger consuasor cavus allatus. Arbitro aut vicinus repudiandae neque esse tumultus vesper qui.Communis aedificium suscipit tabesco eos. Tabula venustas asperiores vicissitudo stips abutor curso canonicus suscipit. Temperantia vir cubicularis virga vespillo iusto barba.Absens saepe vester cribro claustrum depereo aspernatur peccatus acidus inflammatio. Vester titulus versus corporis crur peior. Adeo atavus conspergo antepono aeternus appono suadeo dicta abundans acer.', '0000-00-00 00:00:00', '2026-06-07 19:48:46', '0000-00-00 00:00:00'),
(15, 'Iskandar', '61579058', 'Wanti Agung, 03-08-1972', '2002-11-29', '', 'PNS', '0000-00-00', 'III/b', '1980-01-26', '1964-12-26', 'Islam', 'SMA PGRI', 'Bengkulu (1991)', '', '0000-00-00', 'Pengadministrasi Perkantoran', '0000-00-00', '1964-12-26', 5, '', 1, 15, 0, 58, 0x313738303836313830355f34376164333432366339363032373231666530662e6a7067, '', 'Cenaculum defessus utrum quisquam deripio clam concido absque. Neque bardus color totus ea tum veritatis eos curso arx. Vir correptius adulatio vicinus.', '0000-00-00 00:00:00', '2026-06-07 19:50:05', '0000-00-00 00:00:00'),
(16, 'Dra. Rini Darmini', '41883351', 'Bandung, 15 -01-1969', '1987-02-04', '', 'PNS', '0000-00-00', 'III/d', '2004-06-06', '1988-03-28', 'Islam', 'S1 Pekerja Sosial STKS', '1992', '', '0000-00-00', 'Penelaah Teknis Kebijakan', '0000-00-00', '1988-03-28', 7, 'JFU', 1, 16, 0, 58, 0x313738303836313937325f64616136653865376338636530393838366231652e6a7067, '', 'Cometes exercitationem voveo amo nisi arbustum. Dolor ipsa bibo tamdiu veritatis sortitus. Celo apparatus aeger tendo corpus benevolentia.', '0000-00-00 00:00:00', '2026-06-07 19:52:52', '0000-00-00 00:00:00'),
(17, 'M. Syafei', '35767186', 'Pulau Panggung, 18-08-1969', '1985-04-16', '', 'PNS', '0000-00-00', 'III/a', '1986-10-22', '1991-02-08', 'Islam', 'SMA Muaraenim', 'Palembang 1988', '', '0000-00-00', 'Pengadministrasi Perkantoran', '0000-00-00', '1991-02-08', 5, 'JFU', 1, 17, 0, 58, 0x313738303836323038335f32653462386166346630646261316333343762322e6a7067, '', 'Comminor decens vindico.', '0000-00-00 00:00:00', '2026-06-07 19:54:43', '0000-00-00 00:00:00'),
(18, 'Dewi Mustika Rahayu, S.Sos, MPS.Sp', '33723874', 'Bandung, 03-01-1969', '2001-07-09', '', 'PNS', '0000-00-00', 'IV/a', '2006-10-13', '1951-05-12', 'Islam', 'S2  Spesialis Peksos STKS Tahun 2013', '', '', '0000-00-00', 'Penelaah Teknis Kebijakan', '0000-00-00', '1951-05-12', 7, 'JFU', 1, 18, 0, 58, 0x313738303836323136375f65376666313736393364383237656335663734612e6a7067, '', 'Cuius cetera subiungo aduro abduco sufficio terga. Vel supra capto et animi. Bos consuasor cogito.Vacuus atrox illo aurum cito baiulus aptus annus clam quod. Virga commodo adhaero defluo delectus decor aegrus. Paens cursim patrocinor coniuratio consequatur spero cedo brevis combibo.Ventosus comburo cultellus quis suffoco utpote. Dedico defaeco terreo delectatio defluo amet sollicito. Apostolus antea damnatio apostolus verbera arto pecco usus tenetur votum.', '0000-00-00 00:00:00', '2026-06-07 19:56:07', '0000-00-00 00:00:00'),
(19, 'Enung Ema Rochmatiah, S. AP', '64601790', 'Bandung, 11 Oktober 1982', '1974-05-06', '', 'PNS', '0000-00-00', 'III/c', '1968-05-20', '1973-12-17', 'Islam', 'D III Adm Kepegawaian', 'S1 Administrasi Publik STIA LAN', '', '0000-00-00', 'Penelaah Teknis Kebijakan', '0000-00-00', '1973-12-17', 7, 'JFU', 1, 0, 0, 58, 0x313738303836323332395f32393436313034656238376432383162613639622e6a7067, '', 'Culpa sodalitas tempora bellicus sunt tam votum voluptatum. Cupressus abduco aliqua victoria cedo. Calco suspendo tripudio ea et suffragium adduco termes temptatio. Curo tepesco atqui tandem substantia.', '0000-00-00 00:00:00', '2026-06-07 19:58:49', '0000-00-00 00:00:00'),
(20, 'Dr. Endah Triati, MSW', '94327975', 'Bandung, 13-12-1970', '1964-12-26', '', 'PNS', '0000-00-00', 'IV/e', '1946-09-03', '1969-10-23', 'Islam', 'S3 Pendidikan Sosiologi UNPAD Tahun 2014', '', 'ADUM', '0000-00-00', 'Widyaiswara Ahli Utama', '0000-00-00', '1969-10-23', 14, 'JFT', 1, 2, 0, 58, 0x313738303836323436385f36396435323535376632623931663838326432342e6a7067, '', 'Cunctatio acervus cuius exercitationem. Aperte quasi laudantium curtus aspicio. Curiositas spiritus stillicidium avarus certus curso absque coniecto bonus thema.', '0000-00-00 00:00:00', '2026-06-07 20:01:08', '0000-00-00 00:00:00'),
(21, 'Dr. Dewi Wahyuni, MP', '61355087', 'Garut, 22-10-1968', '1968-07-05', '', 'PNS', '0000-00-00', 'IV/c', '1975-08-26', '1950-11-08', 'Islam', 'S3 Pendidikan Sosiologi UNPAD Bdg', '2013', 'ADUM', '0000-00-00', 'Widyaiswara Ahli Madya', '0000-00-00', '1950-11-08', 12, 'JFT', 1, 3, 0, 58, 0x313738303836323534355f34623833316431336435386435383639333631362e6a7067, '', 'Cupio vir suasoria depromo cupio hic admiratio. Facilis adipisci sonitus apud dolorum textor vinco adamo occaecati.', '0000-00-00 00:00:00', '2026-06-07 20:02:25', '0000-00-00 00:00:00'),
(22, 'Deden Djuanda, M. Si', '76402986', 'Sukabumi, 02-12-1968', '1980-09-24', '', 'PNS', '0000-00-00', 'IV/c', '2008-10-29', '1960-06-03', 'Islam', 'S2 Sosiologi', 'Universitas Indonesia', 'ADUM', '0000-00-00', 'Widyaiswara Madya', '0000-00-00', '1960-06-03', 12, 'JFT', 1, 44, 0, 58, 0x313738303836323634385f61396562306363663061323837326538376630302e6a7067, '', 'Decumbo possimus tero adipisci vulariter decumbo coepi. Aranea contigo venia iste id cunctatio voluptatem voco repellat balbus. Vulgivagus in soluta est tolero appositus defungo constans valens acquiro.Arto neque tamdiu vero adaugeo combibo cornu. Unus tibi stultus denego studio depopulo audio turba. ', '0000-00-00 00:00:00', '2026-06-07 20:04:08', '0000-00-00 00:00:00'),
(23, 'Eni Supriyatin, S.Sos, MP', '14179164', 'Karawang, 23-03-1968', '1950-02-28', '', 'PNS', '0000-00-00', 'IV/a', '1960-07-07', '1959-12-10', 'Islam', 'S2. IPB', 'Peksos', 'ADUM ', '0000-00-00', 'Widyaiswara Ahli Madya', '0000-00-00', '1959-12-10', 12, 'JFT', 1, 5, 0, 58, 0x313738303836323736385f61396130346465396135666236303532386537392e6a7067, '', 'Defero vomito defaeco numquam demulceo speciosus demitto aiunt thymbra. Cuius tergum ventito vulgus adfero solium teres adfero antea super. Sto abstergo peior fugit amissio abduco cicuta. Tergeo ventosus validus theca dolorem veritas sumo arbustum aetas ars. Audeo tui quasi subito ventosus itaque vox.', '0000-00-00 00:00:00', '2026-06-07 20:06:08', '0000-00-00 00:00:00'),
(24, 'Drs. Asep Saeful R. M.Pd', '57290751', 'Garut, 06-01-1968', '1956-11-08', '', 'PNS', '0000-00-00', 'IV/b', '1947-04-04', '1961-08-17', 'Islam', 'S2. UPI', 'PLS. Kons. Pelat 2003', 'ADUM', '0000-00-00', 'Widyaiswara Ahli Madya', '0000-00-00', '1961-08-17', 12, 'JFT', 1, 6, 0, 58, 0x313738303836323930395f35373063623764396261303039666162313563382e6a7067, '', 'Deleniti crur agnitio coepi. Aggero aestus ventito vapulus. Supplanto excepturi dedico depulso nemo.Baiulus beatae suppellex aestus. Distinctio minus cedo pecto consuasor velut amita varietas tersus. Amissio terreo voro tertius atqui vomer mollitia.Adinventitias verumtamen tersus aegrus auditor excepturi eum nulla. Crepusculum architecto cavus ipsa deduco bis infit tempore. Supra tot atqui cedo unus vomito accusantium vestrum undique.', '0000-00-00 00:00:00', '2026-06-07 20:08:29', '0000-00-00 00:00:00'),
(25, 'Rosi Hernawati, M. Psi', '01052182', 'Bandung, 27-03-1974', '1979-12-12', '', 'PNS', '0000-00-00', 'III/c', '1960-08-08', '2002-06-02', 'Islam', 'S2 Psikologi UNPAD', '2014', '', '0000-00-00', 'Widyaiswara Ahli Muda', '0000-00-00', '2002-06-02', 10, 'JFT', 1, 35, 0, 58, 0x313738303836323938315f33636139306463363963363566666432643331612e6a7067, '', 'Deleo accendo censura vetus tripudio studio ipsa. Aeneus at demergo approbo talus vicissitudo aureus subiungo delectus aedificium. Temeritas distinctio tego bellicus.Admiratio sum earum ante at accusantium crustulum acquiro amita ad. Cariosus ambulo undique civitas fugit campana ipsum. Turbo cibo ante canis cibo aliqua occaecati molestiae volubilis cura.Corona accusamus torqueo thesaurus clam candidus sunt. Placeat cresco curso urbanus tantum tametsi cursus iure cursus. Conturbo adulatio arguo animus.', '0000-00-00 00:00:00', '2026-06-07 20:09:41', '0000-00-00 00:00:00'),
(26, 'Siti Rohimah, S.Sos, MPS. Sp', '98212205', 'Jakarta, 16-04-1968', '1981-11-30', '', 'PNS', '0000-00-00', 'III/d', '2007-01-30', '1987-03-18', 'Islam', 'S2. STKS', 'Peksos Spesialis 2008', 'ADUM ', '0000-00-00', 'Widyaiswara Ahli Madya', '0000-00-00', '1987-03-18', 10, 'JFT', 1, 8, 0, 58, 0x313738303836333034395f35333466633566303263663736316466636666322e6a7067, '', 'Deripio creber turpis dens aegre spargo nam tonsor vilitas versus. Alias autem aperiam ubi tabesco caste vivo. Minima harum vinitor vinum umquam quia succedo tum.', '0000-00-00 00:00:00', '2026-06-07 20:10:49', '0000-00-00 00:00:00'),
(27, 'Wina Marlina, A.KS., MBA', '53088227', 'Purwakarta, 06-03-1972', '1996-11-04', '', 'PNS', '0000-00-00', 'III/d', '1984-12-08', '2006-12-30', 'Islam', 'S2 Administrasi Bisnis', '', '', '0000-00-00', 'Widyaiswara Ahli Muda', '0000-00-00', '2006-12-30', 10, 'JFT', 1, 9, 0, 58, 0x313738303836333131375f61313463383637376635373566633465313962312e6a7067, '', 'Desolo tandem tersus dolorem venio hic.', '0000-00-00 00:00:00', '2026-06-07 20:11:57', '0000-00-00 00:00:00'),
(28, 'Nandang Sofyan, M. Pd', '48774541', 'Subang, 11 April 1984', '1968-10-19', '', 'PNS', '0000-00-00', 'III/c', '1949-11-10', '1998-06-04', 'Islam', 'S2 Magister Pendidikan IPS', '2016', '', '0000-00-00', 'Widyaiswara Ahli Muda', '0000-00-00', '1998-06-04', 10, 'JFT', 1, 10, 0, 58, 0x313738303836333230345f36373335313431616435623439663463656361662e6a7067, '', 'Doloremque calco vigilo. Adaugeo cohaero sunt denuo vallum sol acsi arbitro enim. Comparo valens unde valde labore.', '0000-00-00 00:00:00', '2026-06-07 20:13:24', '0000-00-00 00:00:00'),
(29, 'Hendriyanto, S. Kom., M.M, M.CIO', '19091726', 'Palembang, 19 April 1984', '1990-12-01', '', 'PNS', '0000-00-00', 'III/d', '1948-09-04', '2006-06-05', 'Islam', 'S2 Magister Chief Information Officer', '28-Mei-16', '', '0000-00-00', 'Widyaiswara Ahli Muda', '0000-00-00', '2006-06-05', 10, 'JFT', 1, 11, 0, 58, 0x313738303836333238365f35653330333433656539326561333361316335632e6a7067, '', 'Nesciunt vilis cumque crastinus capillus. Venio tepidus natus cogito abbas ter provident argumentum compello. Et absorbeo valde sui consuasor deludo ver.', '0000-00-00 00:00:00', '2026-06-07 20:14:46', '0000-00-00 00:00:00'),
(30, 'Budi Nurdiansyah, M. Pd., Gr', '60102935', 'Garut, 12 Januari 1988', '1963-04-22', '', 'PNS', '0000-00-00', 'III/c', '1958-10-23', '1971-12-28', 'Islam', 'S2 Pendidikan Matematika', ' ', '', '0000-00-00', 'Pegawai Tugas Belajar', '0000-00-00', '1971-12-28', 7, 'JFU (Sedang TB)', 1, 12, 0, 58, 0x313738303836333336355f31323764373337336264396237613362316463632e6a7067, '', 'Ocer cattus unde thorax porro demulceo. Appono tubineus vestigium tam vel complectus deprimo. Umerus solium curatio peior.', '0000-00-00 00:00:00', '2026-06-07 20:16:05', '0000-00-00 00:00:00'),
(31, 'Eka Novarina, M. Pd', '21711953', 'Purworejo, 14-07-1989', '2007-02-09', '', 'PNS', '0000-00-00', 'III/c', '1949-02-25', '1995-09-21', 'Islam', 'S2 Pendidikan Matematika', 'Tahun 2013', '', '0000-00-00', 'Widyaiswara Ahli Pertama', '0000-00-00', '1995-09-21', 8, 'JFT', 1, 13, 0, 58, 0x313738303836333435395f39386534616563613434323034623432306338372e6a7067, '', 'Quaerat vox labore.', '0000-00-00 00:00:00', '2026-06-07 20:17:39', '0000-00-00 00:00:00'),
(32, 'Dr. Dra. Sunarti, M. Si', '72242698', 'Pangkal Pinang, 05-03-1968', '2002-04-04', '', 'PNS', '0000-00-00', 'IV/c', '1955-11-18', '1953-07-13', 'Islam', 'S3 Sosiologi', '25-Mei-25', 'Diklatpim III', '0000-00-00', 'Pekerja Sosial Ahli Madya', '0000-00-00', '1953-07-13', 12, 'JFT', 1, 14, 0, 58, 0x313738303836333534395f30373738373935306438366637656633386631322e6a7067, '', 'Spargo vergo cur defluo laboriosam curvo aqua.', '0000-00-00 00:00:00', '2026-06-07 20:19:09', '0000-00-00 00:00:00'),
(33, 'Dra. Laelasari', '06004867', 'Bandung, 18-09-1967', '1981-11-02', '', 'PNS', '0000-00-00', 'IV/c', '1974-07-09', '1960-06-03', 'Islam', 'S1 STKS', '1992', '', '0000-00-00', 'Pekerja Sosial Ahli Madya', '0000-00-00', '1960-06-03', 12, 'JFT', 1, 15, 0, 58, 0x313738303835373730315f36356263313936316565663836633631366164642e6a7067, '', 'Suppellex vicissitudo a antiquus cognatus xiphias arca canto aliquam crux. Cresco coniuratio spargo crux. Fugit tyrannus curatio coma stillicidium esse bardus decor utrimque calculus.', '0000-00-00 00:00:00', '2026-06-07 18:41:41', '0000-00-00 00:00:00'),
(34, 'Drs. Tb. Dody M Faisal', '59151355', 'Tasikmalaya, 19-09-1966', '1959-08-03', '', 'PNS', '0000-00-00', 'IV/c', '1992-12-14', '1959-12-10', 'Islam', 'S1. STKS', 'Peksos Tahun 1991', 'ADUM', '0000-00-00', 'Pekerja Sosial Ahli Madya', '0000-00-00', '1959-12-10', 12, 'JFT', 1, 16, 0, 58, 0x313738303835373134305f35373730303065646261376361623765653134312e6a7067, '', 'Synagoga celo verbera xiphias cui natus carus repudiandae.Depraedor animadverto valetudo tonsor.Arca uberrime celo socius totus numquam colo cilicium vomito.Cenaculum thermae explicabo desipio comburo ter verbum ante cornu verus.', '0000-00-00 00:00:00', '2026-06-07 18:32:20', '0000-00-00 00:00:00'),
(35, 'Drs. Dudi Juhana', '64210732', 'Bandung, 13-02-1967', '1985-09-02', '', 'PNS', '0000-00-00', 'IV/c', '1950-06-09', '1961-08-17', 'Islam', 'S1. STKS', 'Peksos Tahun 1993', 'ADUM', '0000-00-00', 'Pekerja Sosial Ahli Madya', '0000-00-00', '1961-08-17', 12, 'JFT', 1, 17, 0, 58, 0x313738303835373232315f30363831323661366361653032363235353437662e6a7067, '', 'Tam ascisco brevis.Benigne hic avarus certe.Depromo cotidie tabernus acquiro.Amor verumtamen sperno solutio.', '0000-00-00 00:00:00', '2026-06-07 18:33:41', '0000-00-00 00:00:00'),
(36, 'Dra. Eti Ratisah, M Si', '07103208', 'Bandung, 03-10-1966', '1955-01-11', '', 'PNS', '0000-00-00', 'IV/c', '1958-10-03', '2002-06-02', 'Islam', 'S2. UI', 'Sosiologi Tahun 1999', 'ADUM', '0000-00-00', 'Pekerja Sosial Ahli Madya', '0000-00-00', '2002-06-02', 12, 'JFT', 1, 18, 0, 58, 0x313738303835373237355f30643335656466663466653738376230663434372e6a7067, '', 'Tersus vir advoco.', '0000-00-00 00:00:00', '2026-06-07 18:34:35', '0000-00-00 00:00:00'),
(37, 'Heru Cahyono, A.KS.,M.Si', '65589623', 'Cimahi, 15-07-1973', '1950-02-27', '', 'PNS', '0000-00-00', 'IV/b', '1991-12-11', '1987-03-18', 'Islam', 'S2 Ilmu Administrasi', '2012', 'Diklatpim III', '0000-00-00', 'Pekerja Sosial Ahli Madya', '0000-00-00', '1987-03-18', 12, 'Penyetaraan', 1, 19, 0, 58, 0x313738303835373334365f31313762363937636530353766663237333435372e6a7067, '', 'Thesaurus sumptus volo thorax combibo aliquam stultus eaque utor.', '0000-00-00 00:00:00', '2026-06-07 18:35:46', '0000-00-00 00:00:00'),
(38, 'Iyus Rusmana, A. KS, MPSSp', '57791960', 'Subang, 16-07-1974', '1972-11-21', '', 'PNS', '0000-00-00', 'III/d', '1960-07-10', '1978-09-12', 'Islam', 'S2 Kesos', '2013', '', '0000-00-00', 'Pekerja Sosial Ahli Muda', '0000-00-00', '1978-09-12', 10, 'JFT\'', 1, 20, 0, 58, 0x313738303835373434365f32653239613962646162303165383866383464612e6a7067, '', 'Thymum causa adduco magni sui apparatus delego corrigo. Agnitio brevis dicta cenaculum suasoria aggredior defluo curto contra amitto. Reiciendis adipisci thymbra cresco subiungo degenero tener tabesco conicio. Tyrannus chirographum curto totidem tredecim sollicito quidem absum arbitro tabesco. Pax accusamus sponte. Nulla degenero nam.', '0000-00-00 00:00:00', '2026-06-07 18:37:26', '0000-00-00 00:00:00'),
(39, 'Cucu Suhendar, S. ST, MPSSp', '67939952', 'Cisaga/Ciamis, 14-08-1984', '2003-09-06', '', 'PNS', '0000-00-00', 'III/d', '1946-05-07', '1994-09-08', 'Islam', 'S2 Spesialis Peksos', '21-Jul-16', '', '0000-00-00', 'Pekerja Sosial Ahli Muda', '0000-00-00', '1994-09-08', 8, 'JFT', 1, 21, 0, 58, 0x313738303835373533345f34326165353732623166393036313535643339622e6a7067, '', 'Tibi spectaculum infit conservo carmen umbra abstergo. Caritas tametsi carus clam. Teres cedo cursus error timor crastinus considero.', '0000-00-00 00:00:00', '2026-06-07 18:38:54', '0000-00-00 00:00:00'),
(40, 'Dani Apandi, S. Tr. Sos', '93241605', 'Lembang, 23-09-1976', '1974-06-23', '', 'PNS', '0000-00-00', 'III/b', '2004-06-05', '2001-02-13', 'Islam', 'SMA Lembang 1995', 'D IV Peksos', '', '0000-00-00', 'Pekerja Sosial Ahli Pertama', '0000-00-00', '2001-02-13', 8, 'JFT', 1, 36, 0, 58, 0x313738303835373631355f35326435623565663964663731643032356662632e6a7067, '', 'Tollo defendo abundans voluptates spectaculum sublime stips tardus deduco nesciunt. Appono sequi timor abscido amicitia denuo condico unde magni triduana. Sodalitas defungo sperno torqueo nesciunt carpo certus.', '0000-00-00 00:00:00', '2026-06-07 18:40:15', '0000-00-00 00:00:00'),
(41, 'Ricky Hilmansyah, S. ST, MPSSp', '93369013', '', NULL, '', '', '0000-00-00', 'III/c', '0000-00-00', '0000-00-00', '', '', '', '', '0000-00-00', 'Pekerja Sosial Ahli Muda', '0000-00-00', '0000-00-00', 0, '', 0, 37, 0, 0, 0x313738303834383633335f39306533643064643835656364313564653966642e6a7067, '', 'Itaque nobis centum vox depono barba.Carmen caelum cedo sit tandem. Defluo averto adstringo utroque dolor deleniti beneficium surgo theologus cognatus. Deporto acsi barba optio alienus.', '0000-00-00 00:00:00', '2026-06-07 16:10:33', '0000-00-00 00:00:00'),
(42, 'Arie Maria Puspita, S. ST', '65004998', '', NULL, '', '', '0000-00-00', 'III/b', '0000-00-00', '0000-00-00', '', '', '', '', '0000-00-00', 'Pekerja Sosial Ahli Pertama', '0000-00-00', '0000-00-00', 0, '', 0, 38, 0, 0, 0x313738303834383530355f38613866386234643763653561306665353632312e6a7067, '', '', '0000-00-00 00:00:00', '2026-06-07 16:08:25', '0000-00-00 00:00:00'),
(43, 'Amalia Rahma, MH', '11351885', 'Yogyakarta, 13-12-1976', '1967-09-20', '', 'PNS', '0000-00-00', 'III/d', '1963-09-26', '1977-11-04', 'Islam', 'S1 UNISBA Hukum Perdata', 'Tahun 2001', '', '0000-00-00', 'Penyuluh Sosial Ahli Muda', '0000-00-00', '1977-11-04', 10, 'JFT', 1, 39, 0, 58, 0x313738303835383031315f38616165653031303939393161616139656465382e6a7067, '', 'Turpis tenetur defaeco colligo.', '0000-00-00 00:00:00', '2026-06-07 18:46:51', '0000-00-00 00:00:00'),
(44, 'Asti Mustika, M.Tr.Sos', '35882809', 'Purwakarta, 20-09-1985', '2006-11-02', '', 'PNS', '0000-00-00', 'III/b', '1974-12-21', '1952-06-05', 'Islam', 'S2 Magister Terapan Peksos', 'Tahun 2024', '', '0000-00-00', 'Penyuluh Sosial Ahli Pertama', '0000-00-00', '1952-06-05', 8, 'JFT', 1, 26, 0, 58, 0x313738303836303133335f31333830393237336133626432616334363139622e6a7067, '', 'Tutamen cras verumtamen saepe calcar antiquus alias.Calcar consuasor comburo argentum ater umerus.Ambitus cupio viriliter totam aspernatur audacia decens.Arto caput utroque natus demulceo conscendo cubitum adstringo.Calco admoneo sonitus aptus derideo.', '0000-00-00 00:00:00', '2026-06-07 19:22:13', '0000-00-00 00:00:00'),
(45, 'Wawan Setiawan Priha S, Aks. MP', '53752149', 'Sumedang, 08-04-1969', '1983-09-29', '', 'PNS', '0000-00-00', 'IV/a', '1965-04-10', '1955-11-05', 'Islam', 'S2 IPB', 'Bogor 2007', 'Diklat PIM IV', '0000-00-00', 'Perencana Ahli Muda', '0000-00-00', '1955-11-05', 10, 'Penyetaraan', 1, 27, 0, 58, 0x313738303836303334355f61393264366437616432313937333338366333342e6a7067, '', 'Undique thorax audacia mollitia agnosco tabella adinventitias. Decor tepidus accusantium modi aeger deleniti tondeo. Repellat aegrotatio terebro crapula sufficio.', '0000-00-00 00:00:00', '2026-06-07 19:25:45', '0000-00-00 00:00:00'),
(46, 'Putri Pratiwi, A. Md', '95242883', 'Bandung, 26-08-1991', '1960-10-28', '', 'PNS', '0000-00-00', 'II/d', '2002-01-04', '2006-12-30', 'Islam', 'D3 Akuntansi', '2012', '', '0000-00-00', 'Pranata Keuangan APBN Terampil', '0000-00-00', '2006-12-30', 7, 'JFT', 1, 28, 0, 58, 0x313738303836303530305f32373330633838363937306533643366643239312e6a7067, '', 'Victus venio tero somnus eaque centum acceptus casus coaegresco umbra.', '0000-00-00 00:00:00', '2026-06-07 19:28:20', '0000-00-00 00:00:00'),
(47, 'Dayat Sutisna, A.KS, MPS. Sp', '55117560', 'Bandung, 25-05-1972', '1949-05-26', '', 'PNS', '0000-00-00', 'IV/c', '1947-02-01', '1998-06-04', 'Islam', 'S2 Spesialis Peksos', '2008', 'Diklatpim IV', '0000-00-00', 'Analis Kebijakan Ahli Madya', '0000-00-00', '1998-06-04', 12, 'Penyetaraan', 1, 40, 0, 58, 0x313738303836303539365f33653134636365346561623330313634343137322e6a7067, '', 'Virga patruus combibo accendo viridis optio. Damno carpo timor urbanus.', '0000-00-00 00:00:00', '2026-06-07 19:29:56', '0000-00-00 00:00:00'),
(48, 'Adi Irwanro, A. KS', '06395089', 'Petarukan, 29-07-1970', '1995-07-12', '', 'PNS', '0000-00-00', 'IV/b', '1969-09-22', '2006-06-05', 'Islam', 'S1 Peksos', '', 'Diklatpim III', '0000-00-00', 'Analis SDM Aparatur Ahli Madya', '0000-00-00', '2006-06-05', 12, 'Penyetaraan', 1, 41, 0, 58, 0x313738303836303739365f61313464373466666630346431343465616533652e6a7067, '', 'Vito tres concido accendo demens atqui amiculum conatus desolo aperte. Tolero explicabo conitor cilicium vilicus conspergo non vel utrimque carbo. Acervus ventosus vociferor degero curtus in coniuratio theologus neque.', '0000-00-00 00:00:00', '2026-06-07 19:33:16', '0000-00-00 00:00:00'),
(49, 'Maya Ratnasari, A. Md', '90618254', 'Sukabumi, 16-04-1977', '1985-07-26', '', 'PNS', '0000-00-00', 'III/b', '1967-11-27', '1971-12-28', 'Islam', 'D III UNPAD', 'Administrasi Kepegawaian', '', '0000-00-00', 'Pranata SDM Aparatur Mahir', '0000-00-00', '1971-12-28', 7, 'JFT', 1, 42, 0, 58, 0x313738303836303933395f37653433636131356563643537386464633730612e6a7067, '', 'Volaticus contra minus cervus barba.', '0000-00-00 00:00:00', '2026-06-07 19:35:39', '0000-00-00 00:00:00'),
(50, 'Muhammad Ghazali Hamzah, S.I. Pus', '65670807', 'Bandung, 6-09-1994', '1995-09-24', '', 'PNS', '0000-00-00', 'III/b', '1989-12-22', '1995-09-21', 'Islam', 'S1 Sarjana Ilmu Perpustakaan', '2016', '', '0000-00-00', 'Pustakawan Ahli Pertama', '0000-00-00', '1995-09-21', 8, 'JFT', 1, 43, 0, 58, 0x313738303836313035365f66653863306134623562656638646539306239612e6a7067, '', 'Voluntarius admiratio tyrannus talio capto. Depulso bardus quam vomica tricesimus. Aro tempore accusamus soleo aegrus adflicto depereo torrens pecto tempus.', '0000-00-00 00:00:00', '2026-06-07 19:37:36', '0000-00-00 00:00:00'),
(51, 'dr. Nina Agustina', '80326443', 'Kab. Bireun, 30 Agustus 1990', '1970-01-27', '', 'CPNS', '0000-00-00', 'III/b', '1961-02-18', '1953-07-13', 'Islam', 'Profesi Dokter ', '2015', '', '0000-00-00', 'Dokter Ahli Pertama', '0000-00-00', '1953-07-13', 9, 'JFT', 1, 33, 0, 58, 0x313738303836313135305f30643737616239663764373462313263343363362e6a7067, '', 'Vomito adinventitias attonbitus cicuta.', '0000-00-00 00:00:00', '2026-06-07 19:39:10', '0000-00-00 00:00:00'),
(52, 'Rid Ridha Nur Iman, A. Md., Kep', '4531654', 'Kab. Cianjur, 15 Oktober 1995', '1956-07-29', '', 'CPNS', '0000-00-00', 'II/c', '2007-07-05', '1983-09-29', 'Islam', 'D-III Keperawatan', '2016', '', '0000-00-00', 'Perawat Terampil', '0000-00-00', '1983-09-29', 6, 'JFT', 1, 34, 0, 58, 0x313738303836333635375f30393366303862313238386662656264333462642e6a7067, '', 'Vorax asperiores bos delectatio confido rem error adfero temeritas catena. Usus ante apud coma accusamus despecto. Sperno ut tepesco constans aperte crux acerbitas urbanus.', '0000-00-00 00:00:00', '2026-06-07 20:20:57', '0000-00-00 00:00:00'),
(53, 'Yogi Anggara, A. Md., Kep', '66124032', 'Kab. Sumedang, 4 Juli 1997', '1996-04-01', '', 'CPNS', '0000-00-00', 'II/c', '1948-07-01', '1960-10-28', 'Islam', 'D-III Keperawatan', '2018', '', '0000-00-00', 'Perawat  Terampil', '0000-00-00', '1960-10-28', 6, 'JFT', 1, 1, 0, 0, 0x313738303835393935395f66663239623335623632373933383938383330652e6a7067, '', 'Turpis tenetur defaeco colligo.', '0000-00-00 00:00:00', '2026-06-07 19:19:19', '0000-00-00 00:00:00'),
(54, 'Drs. Tb. Dody M Faisal', '99765202', 'Tasikmalaya, 19-09-1966', '1964-10-28', '', 'PNS', '0000-00-00', 'IV/c', '1999-09-11', '0000-00-00', 'Islam', 'S1. STKS', 'Peksos Tahun 1991', 'ADUM', '0000-00-00', 'Pekerja Sosial Ahli Madya', '0000-00-00', '0000-00-00', 12, 'JFT', 34, 16, 0, 0, 0x313738303836313231385f35333236353365373664316336656361656435622e6a7067, '', 'Tutamen cras verumtamen saepe calcar antiquus alias.Calcar consuasor comburo argentum ater umerus.Ambitus cupio viriliter totam aspernatur audacia decens.Arto caput utroque natus demulceo conscendo cubitum adstringo.Calco admoneo sonitus aptus derideo.', '0000-00-00 00:00:00', '2026-06-07 19:40:18', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sdman`
--

CREATE TABLE `sdman` (
  `id` int(20) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `nip` varchar(16) NOT NULL,
  `ttl` varchar(250) NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `gender` text NOT NULL,
  `status_peg` text NOT NULL,
  `tahun_status` date NOT NULL,
  `gol` varchar(250) NOT NULL,
  `tmt_gol` date NOT NULL,
  `tmt_cpns` date NOT NULL,
  `agama` varchar(250) NOT NULL,
  `pendidikan` varchar(250) NOT NULL,
  `pendidikan_dari` varchar(250) NOT NULL,
  `tingkat_penjenjangan` varchar(250) NOT NULL,
  `tahun_penjenjangan` date NOT NULL,
  `jabatan` text NOT NULL,
  `tmt_jabatan` date NOT NULL,
  `tmt_dibalai` date NOT NULL,
  `grade` int(11) NOT NULL,
  `ket` text NOT NULL,
  `no` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `aktif` int(11) NOT NULL,
  `usia_pensiun` int(10) NOT NULL,
  `foto` longblob NOT NULL,
  `dok` varchar(255) NOT NULL,
  `quotes` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `sdman`
--

INSERT INTO `sdman` (`id`, `nama`, `nip`, `ttl`, `tgl_lahir`, `gender`, `status_peg`, `tahun_status`, `gol`, `tmt_gol`, `tmt_cpns`, `agama`, `pendidikan`, `pendidikan_dari`, `tingkat_penjenjangan`, `tahun_penjenjangan`, `jabatan`, `tmt_jabatan`, `tmt_dibalai`, `grade`, `ket`, `no`, `parent_id`, `aktif`, `usia_pensiun`, `foto`, `dok`, `quotes`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Neneng Rusmayanti, S.ST., M. Si', '49790139', '', NULL, '', '', '0000-00-00', 'IV/b', '0000-00-00', '0000-00-00', '', '', '', '', '0000-00-00', 'Kepala Bagian Tata Usaha', '0000-00-00', '0000-00-00', 0, '', 0, 0, 0, 0, 0x313738303834363130375f31303030616432666661653636393764386634342e6a7067, '', '', '0000-00-00 00:00:00', '2026-06-07 15:28:27', '0000-00-00 00:00:00'),
(3, 'Sri Esti Suciati,A.KS,MP', '31336395', '', NULL, '', '', '0000-00-00', 'IV/a', '0000-00-00', '0000-00-00', '', '', '', '', '0000-00-00', 'Penelaah Teknis Kebijakan ', '0000-00-00', '0000-00-00', 0, '', 0, 1, 0, 0, 0x313738303834383639355f33633733373361623132303937353433366132372e6a7067, '', '', '0000-00-00 00:00:00', '2026-06-07 16:11:35', '0000-00-00 00:00:00'),
(4, 'Dra. Dian Listyastuti', '65248205', '', NULL, '', '', '0000-00-00', 'III/d', '0000-00-00', '0000-00-00', '', '', '', '', '0000-00-00', 'Penelaah Teknis Kebijakan', '0000-00-00', '0000-00-00', 0, '', 0, 2, 0, 0, 0x313738303834383932305f35346130363032333964303735353661333032332e6a7067, '', '', '0000-00-00 00:00:00', '2026-06-07 16:15:20', '0000-00-00 00:00:00'),
(6, 'Carles Sitorus, S. ST', '45419178', '', NULL, '', '', '0000-00-00', 'III/d', '0000-00-00', '0000-00-00', '', '', '', '', '0000-00-00', 'Pengolah Data dan Informasi', '0000-00-00', '0000-00-00', 0, '', 0, 3, 0, 0, 0x313738303834383938325f33346437393563666135646139356266306362312e6a7067, '', 'Comedo ara stipes terra trucido.Accusamus adeo tandem quia voveo solutio.', '0000-00-00 00:00:00', '2026-06-07 16:16:22', '0000-00-00 00:00:00'),
(7, 'Nissa Annisa, S. Sos', '30658888', '', NULL, '', '', '0000-00-00', 'III/d', '0000-00-00', '0000-00-00', '', '', '', '', '0000-00-00', 'Penata Layanan Operasional', '0000-00-00', '0000-00-00', 0, '', 0, 4, 0, 0, 0x313738303835303339395f63636438306430613662353539626534313732382e6a7067, '', 'Coaegresco cicuta decumbo testimonium brevis amet aer dedico.', '0000-00-00 00:00:00', '2026-06-07 16:39:59', '0000-00-00 00:00:00'),
(8, 'Henry Hizkia, S. Sos', '21086054', 'Jakarta, 13 - 03 - 1985', '1988-04-24', '', 'PNS', '0000-00-00', 'III/d', '2006-06-05', '1990-01-31', 'Islam', '', 'UNPAD-31 Desmber 2008', '', '0000-00-00', 'Penelaah Teknis Kebijakan', '0000-00-00', '1990-01-31', 7, 'JFU', 1, 5, 0, 58, 0x313738303835313832365f34353364666339653039666164626663656139642e6a7067, '', 'Ago tricesimus adflicto certe assentator adulatio utrimque spargo altus.Curiositas speciosus vita cupiditas expedita avaritia stultus.', '0000-00-00 00:00:00', '2026-06-07 17:03:46', '0000-00-00 00:00:00'),
(9, 'Ipin Saripin, A.KS, M.Pd', '51623167', 'Bandung, 20-11-1974', '1998-07-31', '', 'PNS', '0000-00-00', 'IV/a', '1971-12-28', '1994-03-23', 'Islam', '', 'Cimahi - PLS', 'Diklat PIM IV', '0000-00-00', 'Penelaah Teknis Kebijakan', '0000-00-00', '1994-03-23', 7, 'JFU', 1, 6, 0, 58, 0x313738303835333338395f66373266326566323038613933353964623933612e6a7067, '', 'Alo claudeo venio civis animadverto aperio esse accusantium agnosco spoliatio. Beneficium verbum cena coaegresco deprimo nulla adnuo maxime natus porro. Viscus odit cavus subseco.', '0000-00-00 00:00:00', '2026-06-07 17:29:49', '0000-00-00 00:00:00'),
(10, 'Euis Umiati, A.Ks', '07696722', 'Cikoneng, 13-09-1970', '1974-02-08', '', 'PNS', '0000-00-00', 'III/d', '1995-09-21', '2002-11-29', 'Islam', '', '1994', '', '0000-00-00', 'Penelaah Teknis Kebijakan', '0000-00-00', '2002-11-29', 7, 'JFU', 1, 7, 0, 58, 0x313738303835353037355f31336539313739363535393161666462613464372e6a7067, '', 'Amita tero caelum praesentium summisse adeptio laborum solium abundans aperio.', '0000-00-00 00:00:00', '2026-06-07 17:57:55', '0000-00-00 00:00:00'),
(54, 'Drs. Tb. Dody M Faisal', '99765202', 'Tasikmalaya, 19-09-1966', '1964-10-28', '', 'PNS', '0000-00-00', 'IV/c', '1999-09-11', '0000-00-00', 'Islam', 'S1. STKS', 'Peksos Tahun 1991', 'ADUM', '0000-00-00', 'Pekerja Sosial Ahli Madya', '0000-00-00', '0000-00-00', 12, 'JFT', 34, 8, 0, 0, 0x313738303836313231385f35333236353365373664316336656361656435622e6a7067, '', 'Tutamen cras verumtamen saepe calcar antiquus alias.Calcar consuasor comburo argentum ater umerus.Ambitus cupio viriliter totam aspernatur audacia decens.Arto caput utroque natus demulceo conscendo cubitum adstringo.Calco admoneo sonitus aptus derideo.', '0000-00-00 00:00:00', '2026-06-07 19:40:18', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `settings`
--

CREATE TABLE `settings` (
  `id` int(9) NOT NULL,
  `class` varchar(255) NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text DEFAULT NULL,
  `type` varchar(31) NOT NULL DEFAULT 'string',
  `context` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_peraturan`
--

CREATE TABLE `status_peraturan` (
  `id` int(11) NOT NULL,
  `status` text NOT NULL,
  `ket` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `status_peraturan`
--

INSERT INTO `status_peraturan` (`id`, `status`, `ket`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Berlaku', '0', '2026-06-12 00:19:40', '2026-06-12 00:19:40', '2026-06-12 00:19:40'),
(2, 'Dicabut', '0', '2026-06-12 00:19:40', '2026-06-12 00:19:40', '2026-06-12 00:19:40'),
(3, 'Diubah', '0', '2026-06-12 00:19:40', '2026-06-12 00:19:40', '2026-06-12 00:19:40'),
(4, 'Mencabut Peraturan Sebelumnya', '0', '2026-06-12 00:19:40', '2026-06-12 00:19:40', '2026-06-12 00:19:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_sekolah`
--

CREATE TABLE `tbl_sekolah` (
  `id` int(15) NOT NULL,
  `nama_sekolah` varchar(70) NOT NULL,
  `slug` varchar(70) NOT NULL,
  `jenjang` enum('SD','SMP','SMA','SMK') NOT NULL,
  `kepala_sekolah` varchar(70) NOT NULL,
  `foto_sekolah` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `status` enum('Negeri','Swasta') NOT NULL,
  `akreditas` enum('A','B','C','Belum Terakreditas') NOT NULL,
  `website` varchar(30) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(15) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `term`
--

CREATE TABLE `term` (
  `id` int(11) NOT NULL,
  `kelas` text NOT NULL,
  `title` text NOT NULL,
  `term` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `term`
--

INSERT INTO `term` (`id`, `kelas`, `title`, `term`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'term', 'SYARAT DAN KETENTUAN PENGGUNAAN', 'Fitur Aduan Publik dan Permintaan Informasi [Nama Website/Instansi]\r\nSelamat datang di portal pelayanan digital resmi [Nama Instansi/Kementerian/Dinas]. Fitur Aduan Publik dan Permintaan Informasi disediakan untuk menjamin hak masyarakat dalam mendapatkan informasi publik dan menyampaikan aspirasi sesuai dengan UU No. 14 Tahun 2008 tentang Keterbukaan Informasi Publik.\r\nDengan menggunakan fitur ini, Anda menyatakan setuju dan terikat pada ketentuan di bawah ini:\r\nPenggunaan website ini diatur oleh Syarat dan Ketentuan di bawah ini. Dengan mengakses, mendaftar, atau menggunakan layanan kami, Anda menyatakan telah membaca, memahami, dan menyetujui seluruh ketentuan ini serta tunduk pada hukum yang berlaku di Republik Indonesia.\r\n1. Tujuan Pengumpulan Data Pribadi dan Dokumen\r\nKami mengumpulkan data pribadi dan dokumen pendukung (seperti KTP, Kartu Keluarga, atau dokumen legalitas lainnya) secara sah semata-mata untuk:\r\nMelakukan verifikasi validitas identitas Pemohon/Pengadu guna mencegah laporan fiktif atau anonim yang tidak bertanggung jawab.\r\nMemenuhi syarat administratif dalam proses tindak lanjut aduan atau pemberian informasi publik.\r\nMenghubungi Pemohon/Pengadu terkait perkembangan status penanganan laporan.\r\nLayanan ini diselenggarakan dalam rangka pelaksanaan fungsi pelayanan publik dan pemerintahan digital (E-Government).\r\n1. Dasar Hukum\r\nPenyelenggaraan website ini patuh pada: \r\nUU No. 11 Tahun 2008 tentang Informasi dan Transaksi Elektronik (UU ITE) sebagaimana telah diubah, \r\nUU No. 27 Tahun 2022 tentang Perlindungan Data Pribadi (UU PDP).\r\naturan tentang survey IKM\r\n2. Ketentuan Unggah Dokumen dan Berkas\r\nPengguna wajib memberikan data pribadi yang akurat, sah, benar, dan mutakhir sesuai dengan identitas resmi (KTP/Paspor/Kartu Keluarga).\r\nPemalsuan data pribadi, penggunaan identitas orang lain tanpa hak, atau manipulasi informasi merupakan pelanggaran hukum berat yang dapat diproses secara pidana berdasarkan pasal-pasal UU ITE dan UU PDP.\r\nKeaslian Berkas: Dokumen yang diunggah harus merupakan dokumen asli, sah, jelas terbaca, dan tidak direkayasa secara ilegal.\r\nPelanggaran Hak Cipta: Dokumen yang diunggah tidak boleh melanggar hak kekayaan intelektual atau hak privasi pihak ketiga tanpa izin sah.\r\nLarangan Konten Berbahaya: Pengguna dilarang keras mengunggah file yang mengandung virus, malware, spyware, atau skrip berbahaya yang dapat mengancam keamanan infrastruktur siber pemerintah.\r\n3. Keamanan dan Penggunaan Akun\r\nPengguna bertanggung jawab penuh untuk menjaga kerahasiaan kredensial akun (username, password, atau kode OTP).\r\nSetiap aktivitas yang dilakukan melalui akun Pengguna dianggap sebagai tindakan sah dari Pengguna yang bersangkutan.\r\nInstansi tidak bertanggung jawab atas kerugian akibat kelalaian Pengguna dalam menjaga keamanan akun miliknya.\r\n3. Tanggung Jawab atas Isi Aduan dan Informasi\r\nKebenaran Materi: Pengguna bertanggung jawab penuh atas kebenaran substansi aduan, kronologi kejadian, atau latar belakang permintaan informasi yang disampaikan.\r\nLarangan Fitnah & SARA: Isi aduan atau permintaan informasi tidak boleh mengandung unsur ujaran kebencian, SARA, pornografi, pencemaran nama baik, fitnah, atau informasi palsu (hoax).\r\nKonsekuensi Hukum: Penyampaian laporan palsu yang merugikan pihak lain atau instansi dapat dituntut secara hukum berdasarkan Kitab Undang-Undang Hukum Pidana (KUHP) dan UU ITE.\r\n4. Batasan Penggunaan yang Diperbolehkan\r\nPengguna dilarang keras untuk:\r\nMelakukan tindakan yang dapat merusak, mengganggu, atau membebani infrastruktur server dan sistem website.\r\nMenggunakan data atau informasi yang diperoleh dari website ini untuk aktivitas komersial ilegal, penipuan, atau tindakan melawan hukum lainnya.\r\nMengunggah dokumen atau konten yang mengandung virus, malware, atau kode berbahaya lainnya.\r\n4. Kerahasiaan Identitas Pengadu (Whistleblowing)\r\nInstansi berkomitmen untuk menjaga kerahasiaan identitas Pengadu dalam fitur Aduan Publik sesuai dengan standar operasional prosedur yang berlaku, kecuali jika diwajibkan oleh perintah pengadilan atau ketentuan undang-undang untuk dibuka kepada aparat penegak hukum.\r\n5. Keadaan Memaksa (Force Majeure)\r\nInstansi tidak bertanggung jawab atas gangguan layanan, kegagalan sistem, atau keterlambatan proses yang disebabkan oleh keadaan di luar kendali wajar (seperti bencana alam, gangguan massal jaringan internet, pemadaman listrik nasional, serangan siber skala masif, atau perubahan kebijakan regulasi negara).\r\n5. Validasi dan Penolakan Layanan\r\nInstansi berhak penuh untuk menolak, mengarsipkan, atau tidak memproses aduan atau permintaan informasi apabila:\r\nDokumen identitas yang diunggah tidak valid, buram, atau diduga palsu.\r\nSubstansi laporan tidak masuk dalam wewenang instansi kami.\r\nPengguna menggunakan kata-kata yang tidak patut, kasar, atau mengancam di dalam sistem.\r\n6. Perubahan Ketentuan\r\nInstansi berhak untuk mengubah, menambah, atau memperbarui Syarat dan Ketentuan ini sewaktu-waktu demi menyesuaikan dengan perubahan hukum atau peningkatan sistem pelayanan. Perubahan akan diumumkan melalui halaman ini.\r\n', '2026-06-05 08:49:31', '2026-06-05 08:49:31', '2026-06-05 08:49:31'),
(2, 'privacy', 'KEBIJAKAN PRIVASI (PRIVACY POLICY)', 'Selamat datang di [Nama Aplikasi Anda]. Kami berkomitmen untuk melindungi dan menghormati privasi data pribadi Anda selaku pengguna. Kebijakan Privasi ini disusun berdasarkan Undang-Undang No. 27 Tahun 2022 tentang Perlindungan Data Pribadi (UU PDP) di Indonesia.\r\n1. Data Pribadi yang Kami Kumpulkan\r\nKami mengumpulkan data yang Anda berikan secara langsung maupun otomatis saat menggunakan aplikasi:\r\nData Identitas: Nama lengkap, alamat email, nomor telepon, dan [tambahkan jika ada, misal: alamat pengiriman].\r\nData Teknis: Alamat IP, jenis perangkat, sistem operasi, dan aktivitas penggunaan aplikasi melalui cookies.\r\n2. Tujuan Penggunaan Data\r\nKami menggunakan data pribadi Anda untuk keperluan berikut:\r\nMenyediakan, mengoperasikan, dan menjaga layanan aplikasi.\r\nMemproses transaksi atau permintaan yang Anda lakukan.\r\nMengirimkan notifikasi pembaruan sistem atau informasi layanan.\r\nMemenuhi kewajiban hukum dan regulasi yang berlaku di Indonesia.\r\n3. Pengungkapan Data kepada Pihak Ketiga\r\nKami tidak akan menjual atau menyewakan data pribadi Anda. Kami hanya membagikan data Anda kepada pihak ketiga tepercaya dalam kondisi:\r\nDiperlukan oleh mitra penyedia layanan (misal: payment gateway atau kurir pengiriman).\r\nDiwajibkan oleh hukum, perintah pengadilan, atau otoritas pemerintah yang sah di Indonesia.\r\n4. Keamanan dan Penyimpanan Data\r\nKami menerapkan standar keamanan teknis dan organisasional untuk melindungi data Anda dari akses tanpa izin. Data Anda akan disimpan selama akun Anda aktif atau sejauh yang diperlukan untuk menyediakan layanan hukum.\r\n5. Hak Anda sebagai Subjek Data \r\nAnda memiliki hak untuk:\r\nMengakses dan meminta salinan data pribadi Anda.\r\nMemperbarui atau memperbaiki data yang tidak akurat.\r\nMeminta penghapusan atau pemusnahan data pribadi Anda dari sistem kami.\r\nMenarik kembali persetujuan pemrosesan data.\r\n6. Kontak Kami\r\nJika Anda memiliki pertanyaan mengenai Kebijakan Privasi ini atau ingin mengajukan permohonan hak data Anda, silakan hubungi kami di:\r\nEmail: [email@aplikasivanda.com]\r\nAlamat: [Alamat Kantor/Perusahaan jika ada]\r\n', '2026-06-05 08:49:31', '2026-06-05 08:49:31', '2026-06-05 08:49:31'),
(3, 'press', 'PUSAT MEDIA / MEDIA CENTER', '[Nama Instansi/Kementerian/Dinas]Halaman ini disediakan khusus bagi jurnalis, awak media, dan masyarakat umum untuk mendapatkan informasi, rilis berita resmi, dan aset publikasi resmi dari [Nama Instansi].1. Siaran Pers Resmi (Press Release)Semua informasi yang diterbitkan dalam halaman ini merupakan pernyataan resmi dari [Nama Instansi].Rekan media diperbolehkan mengutip, menyebarluaskan, atau mempublikasikan ulang isi Siaran Pers ini dengan wajib mencantumkan sumber resmi (misal: “...ujar Humas [Nama Instansi] dalam siaran pers resminya, [Tanggal]”).Dilarang keras mengubah konteks, memotong kalimat secara sepihak yang dapat mengubah makna asli informasi, atau menyalahgunakan siaran pers untuk menyebarkan disinformasi.2. Kit Media dan Aset Resmi (Media Kit)Untuk menjaga integritas visual instansi negara, kami menyediakan aset resmi yang dapat diunduh oleh media untuk keperluan pemberitaan:Logo Resmi: Unduh logo instansi dalam format resolusi tinggi (.png transparan atau .vector). penggunaan logo harus sesuai dengan panduan warna (brand guidelines) resmi negara dan tidak boleh diubah warnanya atau dideformasi.Foto Pejabat Resmi: Foto resmi Kepala Instansi/Menteri/Gubernur/Bupati untuk kebutuhan ilustrasi berita.Dokumentasi Kegiatan: Foto dan video rangkaian kegiatan dinas yang bebas royalti untuk kebutuhan jurnalisme.3. Kontak Hubungan Masyarakat (Humas / PR)Untuk permohonan wawancara khusus, konfirmasi berita, atau undangan peliputan acara dinas, rekan media dapat menghubungi tim Humas resmi kami melalui saluran di bawah ini:Penanggung Jawab: Biro Hubungan Masyarakat / Protokol [Nama Instansi]Email Resmi Humas: [press@instansi.go.id] (Catatan: Pastikan menggunakan email domain .go.id resmi)Nomor Telepon/Hotline Media: [021-xxxxxx / WhatsApp Media Center]Jam Operasional Pelayanan Media: Senin - Jumat (08.00 - 16.00 WIB).4. Aturan Pengambilan Berita (Disclaimer Media)[Nama Instansi] tidak bertanggung jawab atas segala bentuk kutipan atau berita yang mencantumkan nama instansi kami, namun sumbernya diambil dari luar halaman resmi ini atau di luar juru bicara (juru bicara) resmi yang ditunjuk.Segala bentuk wawancara pencegatan (doorstop) di luar agenda resmi harus mendapatkan konfirmasi ulang kepada Biro Humas sebelum dipublikasikan demi akurasi data pemerintah.', '2026-06-05 09:01:55', '2026-06-05 09:01:55', '2026-06-05 09:01:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `last_active` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `status`, `status_message`, `active`, `last_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'aiad', NULL, NULL, 1, NULL, '2026-05-20 16:15:01', '2026-05-20 16:15:02', NULL),
(2, 'wmdr', NULL, NULL, 1, NULL, '2026-05-20 19:38:15', '2026-05-20 19:38:15', NULL),
(3, 'acom', NULL, NULL, 1, NULL, '2026-06-02 16:38:45', '2026-06-02 16:38:46', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `userss`
--

CREATE TABLE `userss` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password_hash` varchar(255) DEFAULT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `ga_secret` varchar(255) DEFAULT NULL,
  `2fa_enabled` tinyint(1) DEFAULT 0,
  `force_pass_reset` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `fullname` varchar(250) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `userss`
--

INSERT INTO `userss` (`id`, `email`, `username`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `ga_secret`, `2fa_enabled`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`, `fullname`, `user_id`) VALUES
(1, 'rogers63@g.com', 'davidjohn', 'e6a33eee180b07e563d74fee8c2c66b8', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, NULL, NULL, NULL, '', 0),
(2, 'mike28@g.com', 'rogerspaul', '2e7dc6b8a1598f4f75c3eaa47958ee2f', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, NULL, NULL, NULL, '', 0),
(3, 'rivera92@g.com', 'davidjohn', '1c3a8e03f448d211904161a6f5849b68', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, NULL, NULL, NULL, '', 0),
(4, 'ross95@g.com', 'mariasanders', '62f0a68a4179c5cdd997189760cbcf18', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, NULL, NULL, NULL, '', 0),
(5, 'paul85@g.com', 'morrismiller', '61bd060b07bddfecccea56a82b850ecf', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, NULL, NULL, NULL, '', 0),
(6, 'smith34@g.com', 'danielmichael', '7055b3d9f5cb2829c26cd7e0e601cde5', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, NULL, NULL, NULL, '', 0),
(7, 'james84@g.com', 'sanderspaul', 'b7f72d6eb92b45458020748c8d1a3573', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, NULL, NULL, NULL, '', 0),
(8, 'daniel53@g.com', 'markmike', '299cbf7171ad1b2967408ed200b4e26c', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, NULL, NULL, NULL, '', 0),
(9, 'brooks80@g.com', 'morganmaria', 'aa736a35dc15934d67c0a999dccff8f6', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, NULL, NULL, NULL, '', 0),
(10, 'morgan65@g.com', 'paulmiller', 'a28dca31f5aa5792e1cefd1dfd098569', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, NULL, NULL, NULL, '', 0),
(11, 'wright68@g.com', 'smithmichael', 'b6d7044f51097af805a29408ab2aa895', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, NULL, NULL, NULL, '', 0),
(12, 'brooks1@g.com', 'bellrivera', '87037e26aacc077d41d83f8d6c91a95c', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, NULL, NULL, NULL, '', 0),
(13, 'bell2@g.com', 'riveradavid', '0479c8271fb4dbe47106570c92abbb74', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, NULL, NULL, NULL, '', 0),
(14, 'miller100@g.com', 'brookswright', '39e5cddf9d6fe5c39d348b5e2d45c07d', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, NULL, NULL, NULL, '', 0),
(15, 'rogers53@g.com', 'chrishaydonbrown', '0377bf6ebd9bacfbe96a492c532f0e3b', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, NULL, NULL, NULL, '', 0),
(16, 'mike1@g.com', 'michaelsanders', 'b9ff9aa4450707644faf5cf872a57f41', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, NULL, NULL, NULL, '', 0),
(17, 'cooper57@g.com', 'danielmark', 'adab67243e70ed8d0938696ba1dfdabe', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, NULL, NULL, NULL, '', 0),
(18, 'daniel38@g.com', 'bellmichael', '753bd83042af00c1af6af82ae4236726', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, NULL, NULL, NULL, '', 0),
(19, 'mark2@g.com', 'brownbell', '5160c711eb1a1fb416cb296cfa30d3c6', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, NULL, NULL, NULL, '', 0),
(20, 'daniel79@g.com', 'rogersjohn', '97dbce061c4488e48613a6d66e57c1e1', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, NULL, NULL, NULL, '', 0),
(21, 'wright4@g.com', 'paulsmith', 'be2fb6743dd0c143427d6fdbb61d82ab', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, NULL, NULL, NULL, '', 0),
(22, 'brown84@g.com', 'johnross', '738cb4da81a2790a9a845f902a811ea2', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, NULL, NULL, NULL, '', 0),
(23, 'paul41@g.com', 'wrightbrooks', '3ce24a34ab204d82e12e60e205ff5ede', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, NULL, NULL, NULL, '', 0),
(24, 'mark5@g.com', 'brooksbrown', '751933d2077ded39b30aac68060b71c5', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, NULL, NULL, NULL, '', 0),
(25, 'jenny0994@g.com', 'brownmorgan', '59bb0aea62b70ddc63832302636c713c', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, 0, NULL, NULL, NULL, NULL, '', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `auth_identities`
--
ALTER TABLE `auth_identities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `type_secret` (`type`,`secret`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_type_identifier` (`id_type`,`identifier`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `auth_permissions_users`
--
ALTER TABLE `auth_permissions_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_permissions_users_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `auth_remember_tokens`
--
ALTER TABLE `auth_remember_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `selector` (`selector`),
  ADD KEY `auth_remember_tokens_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `auth_token_logins`
--
ALTER TABLE `auth_token_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_type_identifier` (`id_type`,`identifier`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `hirarki`
--
ALTER TABLE `hirarki`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `menu_ska`
--
ALTER TABLE `menu_ska`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `regulasi`
--
ALTER TABLE `regulasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sdm`
--
ALTER TABLE `sdm`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `status_peraturan`
--
ALTER TABLE `status_peraturan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_sekolah`
--
ALTER TABLE `tbl_sekolah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `term`
--
ALTER TABLE `term`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `userss`
--
ALTER TABLE `userss`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `auth_identities`
--
ALTER TABLE `auth_identities`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `auth_permissions_users`
--
ALTER TABLE `auth_permissions_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_remember_tokens`
--
ALTER TABLE `auth_remember_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `auth_token_logins`
--
ALTER TABLE `auth_token_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `hirarki`
--
ALTER TABLE `hirarki`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `menu_ska`
--
ALTER TABLE `menu_ska`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `regulasi`
--
ALTER TABLE `regulasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `status_peraturan`
--
ALTER TABLE `status_peraturan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_sekolah`
--
ALTER TABLE `tbl_sekolah`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `term`
--
ALTER TABLE `term`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `userss`
--
ALTER TABLE `userss`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_identities`
--
ALTER TABLE `auth_identities`
  ADD CONSTRAINT `auth_identities_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_permissions_users`
--
ALTER TABLE `auth_permissions_users`
  ADD CONSTRAINT `auth_permissions_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_remember_tokens`
--
ALTER TABLE `auth_remember_tokens`
  ADD CONSTRAINT `auth_remember_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
