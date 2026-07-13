-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Jul 2026 pada 10.40
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`id`, `user_id`, `group`, `created_at`) VALUES
(1, 1, 'user', '2026-07-13 07:02:10');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `auth_identities`
--

INSERT INTO `auth_identities` (`id`, `user_id`, `type`, `name`, `secret`, `secret2`, `expires`, `extra`, `force_reset`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'email_password', NULL, 'admin@admin.com', '$2y$12$Vvz7VeQCLHJRKwzWY97mRunZWjnn3qFUjWbrOkWUjw96Sev/YEfaO', NULL, NULL, 0, NULL, '2026-07-13 07:02:10', '2026-07-13 07:02:10');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_permissions_users`
--

CREATE TABLE `auth_permissions_users` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `permission` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `judul_berita` varchar(255) DEFAULT NULL,
  `isi_berita` text DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `kontributor` varchar(100) DEFAULT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_tematik` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id`, `judul_berita`, `isi_berita`, `foto`, `kontributor`, `id_kategori`, `id_tematik`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'In eleifend quam a odio. In hac habitasse platea dictumst. Maecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem. Quisque ut erat. Curabitur gravida nisi at nibh.', 'Curabitur gravida nisi at nibh. In hac habitasse platea dictumst. Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem.\n\nInteger tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat.\n\nPraesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede.\n\nMorbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem.', 'http://dummyimage.com/146x100.png/cc0000/ffffff', 'Lydon Powland ', 2, 0, '2026-07-01 07:51:26', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Vestibulum quam sapien, varius ut, blandit non, interdum in, ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis faucibus accumsan odio. Curabitur convallis. Duis consequat dui nec nisi volutpat eleifend. Don', 'In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo.\n\nAliquam quis turpis eget elit sodales scelerisque. Mauris sit amet eros. Suspendisse accumsan tortor quis turpis.\n\nSed ante. Vivamus tortor. Duis mattis egestas metus.\n\nAenean fermentum. Donec ut mauris eget massa tempor convallis. Nulla neque libero, convallis eget, eleifend luctus, ultricies eu, nibh.', 'http://dummyimage.com/105x100.png/cc0000/ffffff', 'Raffaello Poveleye', 1, 0, '2026-07-01 08:34:27', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Phasellus in felis. Donec semper sapien a libero. Nam dui. Proin leo odio, porttitor id, consequat in, consequat ut, nulla. Sed accumsan felis. Ut at dolor quis odio consequat varius.', 'Etiam vel augue. Vestibulum rutrum rutrum neque. Aenean auctor gravida sem.\n\nPraesent id massa id nisl venenatis lacinia. Aenean sit amet justo. Morbi ut odio.\n\nCras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.\n\nProin interdum mauris non ligula pellentesque ultrices. Phasellus id sapien in sapien iaculis congue. Vivamus metus arcu, adipiscing molestie, hendrerit at, vulputate vitae, nisl.\n\nAenean lectus. Pellentesque eget nunc. Donec quis orci eget orci vehicula condimentum.', 'http://dummyimage.com/219x100.png/ff4444/ffffff', 'Remy McCarron', 2, 0, '2026-07-01 08:34:37', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Integer a nibh. In quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet. Maecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pellentesque viverra pede ac diam.', 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus vestibulum sagittis sapien. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.\n\nEtiam vel augue. Vestibulum rutrum rutrum neque. Aenean auctor gravida sem.\n\nPraesent id massa id nisl venenatis lacinia. Aenean sit amet justo. Morbi ut odio.\n\nCras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.\n\nProin interdum mauris non ligula pellentesque ultrices. Phasellus id sapien in sapien iaculis congue. Vivamus metus arcu, adipiscing molestie, hendrerit at, vulputate vitae, nisl.', 'http://dummyimage.com/168x100.png/ff4444/ffffff', 'Darryl Mugridge', 3, 0, '2026-07-01 08:34:41', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est. Phasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum.', 'Proin eu mi. Nulla ac enim. In tempor, turpis nec euismod scelerisque, quam turpis adipiscing lorem, vitae mattis nibh ligula nec sem.\n\nDuis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit.\n\nDonec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi. Integer ac neque.\n\nDuis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus.\n\nIn sagittis dui vel nisl. Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus.\n\nSuspendisse potenti. In eleifend quam a odio. In hac habitasse platea dictumst.', 'http://dummyimage.com/198x100.png/cc0000/ffffff', 'Ericha Thomann', 3, 0, '2026-07-01 08:34:46', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Duis at velit eu est congue elementum. In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo. Aliquam quis turpis eget elit sodales scelerisque. Mau', 'Duis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa. Donec dapibus. Duis at velit eu est congue elementum.\n\nIn hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo.\n\nAliquam quis turpis eget elit sodales scelerisque. Mauris sit amet eros. Suspendisse accumsan tortor quis turpis.\n\nSed ante. Vivamus tortor. Duis mattis egestas metus.\n\nAenean fermentum. Donec ut mauris eget massa tempor convallis. Nulla neque libero, convallis eget, eleifend luctus, ultricies eu, nibh.', 'http://dummyimage.com/209x100.png/5fa2dd/ffffff', 'Sanford Whardley', 1, 0, '2026-07-01 08:34:50', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Duis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa. Donec dapibus. Duis at velit eu est congue elementum. In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum ', 'Nullam sit amet turpis elementum ligula vehicula consequat. Morbi a ipsum. Integer a nibh.\n\nIn quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet.\n\nMaecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui.\n\nMaecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam. Suspendisse potenti.', 'http://dummyimage.com/184x100.png/5fa2dd/ffffff', 'Loree Craggs', 3, 0, '2026-07-01 08:34:54', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin interdum mauris non ligula pellentesque ultrices. Phasellus id sapien in sapien iaculis congue. V', 'Suspendisse potenti. In eleifend quam a odio. In hac habitasse platea dictumst.\n\nMaecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem. Quisque ut erat.\n\nCurabitur gravida nisi at nibh. In hac habitasse platea dictumst. Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem.\n\nInteger tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat.', 'http://dummyimage.com/228x100.png/5fa2dd/ffffff', 'Deane Vogeler', 2, 0, '2026-07-01 08:34:58', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet. Maecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui. Maecenas tristique, est et tempus semper, e', 'Morbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem.\n\nFusce consequat. Nulla nisl. Nunc nisl.\n\nDuis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa. Donec dapibus. Duis at velit eu est congue elementum.\n\nIn hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo.\n\nAliquam quis turpis eget elit sodales scelerisque. Mauris sit amet eros. Suspendisse accumsan tortor quis turpis.', 'http://dummyimage.com/100x100.png/cc0000/ffffff', 'Faustina Kitchiner', 1, 0, '2026-06-30 08:35:39', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque. Quisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus. Phasellus in felis. Donec semper sapien a libero.', 'Quisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus.\n\nPhasellus in felis. Donec semper sapien a libero. Nam dui.\n\nProin leo odio, porttitor id, consequat in, consequat ut, nulla. Sed accumsan felis. Ut at dolor quis odio consequat varius.\n\nInteger ac leo. Pellentesque ultrices mattis odio. Donec vitae nisi.\n\nNam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus.\n\nCurabitur at ipsum ac tellus semper interdum. Mauris ullamcorper purus sit amet nulla. Quisque arcu libero, rutrum ac, lobortis vel, dapibus at, diam.', 'http://dummyimage.com/115x100.png/dddddd/000000', 'Roslyn Owen', 1, 0, '2026-07-05 13:04:54', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'Duis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit. Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pha', 'Proin eu mi. Nulla ac enim. In tempor, turpis nec euismod scelerisque, quam turpis adipiscing lorem, vitae mattis nibh ligula nec sem.\n\nDuis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit.\n\nDonec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi. Integer ac neque.\n\nDuis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus.\n\nIn sagittis dui vel nisl. Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus.\n\nSuspendisse potenti. In eleifend quam a odio. In hac habitasse platea dictumst.', 'http://dummyimage.com/108x100.png/cc0000/ffffff', 'Johna Thames', 1, 0, '2026-06-16 13:39:09', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'Nullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris. Morbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis.', 'Praesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede.\n\nMorbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem.\n\nFusce consequat. Nulla nisl. Nunc nisl.\n\nDuis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa. Donec dapibus. Duis at velit eu est congue elementum.\n\nIn hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo.\n\nAliquam quis turpis eget elit sodales scelerisque. Mauris sit amet eros. Suspendisse accumsan tortor quis turpis.', 'http://dummyimage.com/126x100.png/5fa2dd/ffffff', 'Odele Gourlay', 2, 0, '2026-07-05 13:47:08', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'Morbi a ipsum. Integer a nibh. In quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet. Maecenas leo odio, condimentum id, luctus nec, molestie sed, justo.', 'Phasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum.\n\nProin eu mi. Nulla ac enim. In tempor, turpis nec euismod scelerisque, quam turpis adipiscing lorem, vitae mattis nibh ligula nec sem.\n\nDuis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit.\n\nDonec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi. Integer ac neque.', 'http://dummyimage.com/202x100.png/5fa2dd/ffffff', 'Travers Hurley', 3, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'Phasellus id sapien in sapien iaculis congue. Vivamus metus arcu, adipiscing molestie, hendrerit at, vulputate vitae, nisl. Aenean lectus. Pellentesque eget nunc. Donec quis orci eget orci vehicula condimentum. Curabitur in libero ut massa volutpat conval', 'Aenean fermentum. Donec ut mauris eget massa tempor convallis. Nulla neque libero, convallis eget, eleifend luctus, ultricies eu, nibh.\n\nQuisque id justo sit amet sapien dignissim vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla dapibus dolor vel est. Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros.\n\nVestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue. Aliquam erat volutpat.\n\nIn congue. Etiam justo. Etiam pretium iaculis justo.\n\nIn hac habitasse platea dictumst. Etiam faucibus cursus urna. Ut tellus.\n\nNulla ut erat id mauris vulputate elementum. Nullam varius. Nulla facilisi.', 'http://dummyimage.com/204x100.png/cc0000/ffffff', 'Orazio Doggerell', 3, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'Nulla nisl. Nunc nisl. Duis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa. Donec dapibus. Duis at velit eu est congue elementum. In hac habitasse platea dictumst.', 'In congue. Etiam justo. Etiam pretium iaculis justo.\n\nIn hac habitasse platea dictumst. Etiam faucibus cursus urna. Ut tellus.\n\nNulla ut erat id mauris vulputate elementum. Nullam varius. Nulla facilisi.\n\nCras non velit nec nisi vulputate nonummy. Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque.', 'http://dummyimage.com/179x100.png/cc0000/ffffff', 'Chrotoem Battany', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque. Quisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus. Phasellus in felis.', 'Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam. Suspendisse potenti.\n\nNullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris.\n\nMorbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis.\n\nFusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem.\n\nSed sagittis. Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci. Nullam molestie nibh in lectus.\n\nPellentesque at nulla. Suspendisse potenti. Cras in purus eu magna vulputate luctus.', 'http://dummyimage.com/107x100.png/dddddd/000000', 'Moe Vel', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'Vivamus vestibulum sagittis sapien. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam vel augue. Vestibulum rutrum rutrum neque. Aenean auctor gravida sem. Praesent id massa id nisl venenatis lacinia. Aenean sit a', 'Aenean lectus. Pellentesque eget nunc. Donec quis orci eget orci vehicula condimentum.\n\nCurabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est.\n\nPhasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum.\n\nProin eu mi. Nulla ac enim. In tempor, turpis nec euismod scelerisque, quam turpis adipiscing lorem, vitae mattis nibh ligula nec sem.\n\nDuis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit.', 'http://dummyimage.com/140x100.png/ff4444/ffffff', 'Ronnie Deeman', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'Praesent id massa id nisl venenatis lacinia. Aenean sit amet justo. Morbi ut odio. Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', 'Morbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem.\n\nFusce consequat. Nulla nisl. Nunc nisl.\n\nDuis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa. Donec dapibus. Duis at velit eu est congue elementum.\n\nIn hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo.', 'http://dummyimage.com/151x100.png/cc0000/ffffff', 'Alethea Hanlin', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'Donec vitae nisi. Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus. Curabitur at ipsum ac tellus semper interdum. Mauris ulla', 'Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi. Integer ac neque.\n\nDuis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus.\n\nIn sagittis dui vel nisl. Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus.\n\nSuspendisse potenti. In eleifend quam a odio. In hac habitasse platea dictumst.', 'http://dummyimage.com/244x100.png/cc0000/ffffff', 'Mikaela Jager', 3, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 'Ut at dolor quis odio consequat varius. Integer ac leo. Pellentesque ultrices mattis odio. Donec vitae nisi. Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus', 'Nullam sit amet turpis elementum ligula vehicula consequat. Morbi a ipsum. Integer a nibh.\n\nIn quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet.\n\nMaecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui.\n\nMaecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam. Suspendisse potenti.\n\nNullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris.\n\nMorbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis.', 'http://dummyimage.com/158x100.png/dddddd/000000', 'Collette Swiffan', 4, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 'Duis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit. Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pha', 'Vestibulum quam sapien, varius ut, blandit non, interdum in, ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis faucibus accumsan odio. Curabitur convallis.\n\nDuis consequat dui nec nisi volutpat eleifend. Donec ut dolor. Morbi vel lectus in quam fringilla rhoncus.\n\nMauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sapien quis libero.\n\nNullam sit amet turpis elementum ligula vehicula consequat. Morbi a ipsum. Integer a nibh.\n\nIn quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet.', 'http://dummyimage.com/159x100.png/dddddd/000000', 'Oliy Rainsbury', 4, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 'Aenean fermentum. Donec ut mauris eget massa tempor convallis. Nulla neque libero, convallis eget, eleifend luctus, ultricies eu, nibh. Quisque id justo sit amet sapien dignissim vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices', 'Sed ante. Vivamus tortor. Duis mattis egestas metus.\n\nAenean fermentum. Donec ut mauris eget massa tempor convallis. Nulla neque libero, convallis eget, eleifend luctus, ultricies eu, nibh.\n\nQuisque id justo sit amet sapien dignissim vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla dapibus dolor vel est. Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros.\n\nVestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue. Aliquam erat volutpat.\n\nIn congue. Etiam justo. Etiam pretium iaculis justo.', 'http://dummyimage.com/182x100.png/cc0000/ffffff', 'Minny Byrom', 3, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 'Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis. Fusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem. Sed sagittis. Nam congue, risus semper porta volutpat, quam pede', 'Aenean lectus. Pellentesque eget nunc. Donec quis orci eget orci vehicula condimentum.\n\nCurabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est.\n\nPhasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum.\n\nProin eu mi. Nulla ac enim. In tempor, turpis nec euismod scelerisque, quam turpis adipiscing lorem, vitae mattis nibh ligula nec sem.\n\nDuis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit.', 'http://dummyimage.com/188x100.png/cc0000/ffffff', 'Letti Flintiff', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 'Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est. Phasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum. Proin eu mi. Nulla ac enim.', 'Maecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui.\n\nMaecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam. Suspendisse potenti.\n\nNullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris.\n\nMorbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis.\n\nFusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem.', 'http://dummyimage.com/191x100.png/5fa2dd/ffffff', 'Benoite Rafe', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 'Vivamus metus arcu, adipiscing molestie, hendrerit at, vulputate vitae, nisl. Aenean lectus. Pellentesque eget nunc. Donec quis orci eget orci vehicula condimentum. Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum e', 'In quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet.\n\nMaecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui.\n\nMaecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam. Suspendisse potenti.\n\nNullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris.\n\nMorbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis.\n\nFusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem.', 'http://dummyimage.com/202x100.png/5fa2dd/ffffff', 'Catlee Buttery', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 'Integer ac leo. Pellentesque ultrices mattis odio. Donec vitae nisi. Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus.', 'Integer tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat.\n\nPraesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede.\n\nMorbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem.\n\nFusce consequat. Nulla nisl. Nunc nisl.\n\nDuis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa. Donec dapibus. Duis at velit eu est congue elementum.', 'http://dummyimage.com/126x100.png/dddddd/000000', 'Pernell Tucknott', 4, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin risus. Praesent lectus. Vestibulum quam sapien, varius ut, blandit non, interdum in, ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis faucibu', 'Duis consequat dui nec nisi volutpat eleifend. Donec ut dolor. Morbi vel lectus in quam fringilla rhoncus.\n\nMauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sapien quis libero.\n\nNullam sit amet turpis elementum ligula vehicula consequat. Morbi a ipsum. Integer a nibh.\n\nIn quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet.\n\nMaecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui.\n\nMaecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam. Suspendisse potenti.', 'http://dummyimage.com/133x100.png/5fa2dd/ffffff', 'Evangelin Croyser', 3, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 'Donec ut dolor. Morbi vel lectus in quam fringilla rhoncus. Mauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sa', 'Aenean lectus. Pellentesque eget nunc. Donec quis orci eget orci vehicula condimentum.\n\nCurabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est.\n\nPhasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum.\n\nProin eu mi. Nulla ac enim. In tempor, turpis nec euismod scelerisque, quam turpis adipiscing lorem, vitae mattis nibh ligula nec sem.\n\nDuis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit.\n\nDonec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi. Integer ac neque.', 'http://dummyimage.com/153x100.png/dddddd/000000', 'Eugene Morrieson', 3, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 'Integer non velit. Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi', 'In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo.\n\nAliquam quis turpis eget elit sodales scelerisque. Mauris sit amet eros. Suspendisse accumsan tortor quis turpis.\n\nSed ante. Vivamus tortor. Duis mattis egestas metus.\n\nAenean fermentum. Donec ut mauris eget massa tempor convallis. Nulla neque libero, convallis eget, eleifend luctus, ultricies eu, nibh.\n\nQuisque id justo sit amet sapien dignissim vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla dapibus dolor vel est. Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros.\n\nVestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue. Aliquam erat volutpat.', 'http://dummyimage.com/162x100.png/ff4444/ffffff', 'Beale Heikkinen', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 'Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sapien quis libero. Nullam sit amet turpis elementum ligula vehicula consequat. Morbi a ipsum. Integer a nibh. In quis justo. Maecen', 'Duis consequat dui nec nisi volutpat eleifend. Donec ut dolor. Morbi vel lectus in quam fringilla rhoncus.\n\nMauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sapien quis libero.\n\nNullam sit amet turpis elementum ligula vehicula consequat. Morbi a ipsum. Integer a nibh.\n\nIn quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet.\n\nMaecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui.', 'http://dummyimage.com/149x100.png/ff4444/ffffff', 'Jenni Duker', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita_galeri`
--

CREATE TABLE `berita_galeri` (
  `id` int(11) NOT NULL,
  `berita_id` int(11) DEFAULT NULL,
  `cover_image` varchar(255) DEFAULT NULL,
  `pengupload` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `berita_galeri`
--

INSERT INTO `berita_galeri` (`id`, `berita_id`, `cover_image`, `pengupload`) VALUES
(1, 4, 'http://dummyimage.com/223x100.png/cc0000/ffffff', 'Kaitlin LeEstut'),
(2, 4, 'http://dummyimage.com/174x100.png/5fa2dd/ffffff', 'Alicia Hanson'),
(3, 3, 'http://dummyimage.com/241x100.png/5fa2dd/ffffff', 'Herbie McKenney'),
(4, 1, 'http://dummyimage.com/126x100.png/ff4444/ffffff', 'Kerry Fishburn'),
(5, 2, 'http://dummyimage.com/154x100.png/5fa2dd/ffffff', 'Dannie Amsden'),
(6, 1, 'http://dummyimage.com/243x100.png/dddddd/000000', 'Jules Beauman'),
(7, 4, 'http://dummyimage.com/236x100.png/dddddd/000000', 'Stanly Strothers'),
(8, 1, 'http://dummyimage.com/103x100.png/dddddd/000000', 'Carmon Quennell'),
(9, 1, 'http://dummyimage.com/147x100.png/5fa2dd/ffffff', 'Julie Adney'),
(10, 4, 'http://dummyimage.com/197x100.png/dddddd/000000', 'Arluene Blaszczynski'),
(11, 3, 'http://dummyimage.com/187x100.png/cc0000/ffffff', 'Hamlin Blaker'),
(12, 4, 'http://dummyimage.com/132x100.png/dddddd/000000', 'Siana Peploe'),
(13, 3, 'http://dummyimage.com/221x100.png/dddddd/000000', 'Corabelle McCarlich'),
(14, 2, 'http://dummyimage.com/195x100.png/cc0000/ffffff', 'Mandel Breitler'),
(15, 4, 'http://dummyimage.com/157x100.png/cc0000/ffffff', 'Lexi Nacci'),
(16, 3, 'http://dummyimage.com/107x100.png/5fa2dd/ffffff', 'Marisa Bower'),
(17, 3, 'http://dummyimage.com/150x100.png/dddddd/000000', 'Tasia Simunek'),
(18, 2, 'http://dummyimage.com/133x100.png/cc0000/ffffff', 'Gauthier Lambswood'),
(19, 3, 'http://dummyimage.com/184x100.png/cc0000/ffffff', 'Corey Lanfere'),
(20, 1, 'http://dummyimage.com/178x100.png/cc0000/ffffff', 'Baudoin Kolyagin'),
(21, 4, 'http://dummyimage.com/230x100.png/cc0000/ffffff', 'Aharon Hamblington'),
(22, 1, 'http://dummyimage.com/162x100.png/ff4444/ffffff', 'Lyle Stonbridge'),
(23, 3, 'http://dummyimage.com/167x100.png/5fa2dd/ffffff', 'Vincent Hardiker'),
(24, 1, 'http://dummyimage.com/131x100.png/5fa2dd/ffffff', 'Effie Henryson'),
(25, 4, 'http://dummyimage.com/180x100.png/ff4444/ffffff', 'Katharina Chad'),
(26, 1, 'http://dummyimage.com/234x100.png/dddddd/000000', 'Quintina Bullimore'),
(27, 1, 'http://dummyimage.com/221x100.png/ff4444/ffffff', 'Alford Mitcheson'),
(28, 2, 'http://dummyimage.com/171x100.png/5fa2dd/ffffff', 'Henrieta McRobb'),
(29, 4, 'http://dummyimage.com/183x100.png/ff4444/ffffff', 'Cinnamon Ferens'),
(30, 3, 'http://dummyimage.com/162x100.png/ff4444/ffffff', 'Mendie Matteoli'),
(31, 3, 'http://dummyimage.com/102x100.png/5fa2dd/ffffff', 'Edythe Juarez'),
(32, 2, 'http://dummyimage.com/131x100.png/cc0000/ffffff', 'Bordy Plunket'),
(33, 1, 'http://dummyimage.com/245x100.png/5fa2dd/ffffff', 'Pauletta Tofanelli'),
(34, 3, 'http://dummyimage.com/187x100.png/dddddd/000000', 'Meade Back'),
(35, 1, 'http://dummyimage.com/185x100.png/5fa2dd/ffffff', 'Shandy Qusklay'),
(36, 3, 'http://dummyimage.com/231x100.png/ff4444/ffffff', 'Bret Rotlauf'),
(37, 3, 'http://dummyimage.com/156x100.png/5fa2dd/ffffff', 'Donnajean Danson'),
(38, 4, 'http://dummyimage.com/237x100.png/dddddd/000000', 'Barny Clawsley'),
(39, 1, 'http://dummyimage.com/114x100.png/ff4444/ffffff', 'Michale Shearn'),
(40, 3, 'http://dummyimage.com/184x100.png/dddddd/000000', 'Eirena Pifford'),
(41, 1, 'http://dummyimage.com/163x100.png/dddddd/000000', 'Sonnie Tregaskis'),
(42, 4, 'http://dummyimage.com/178x100.png/dddddd/000000', 'Geri Eustice'),
(43, 4, 'http://dummyimage.com/181x100.png/cc0000/ffffff', 'Ludvig Restall'),
(44, 3, 'http://dummyimage.com/173x100.png/ff4444/ffffff', 'Glen Stoll'),
(45, 3, 'http://dummyimage.com/105x100.png/ff4444/ffffff', 'Nil Aleksankin'),
(46, 3, 'http://dummyimage.com/214x100.png/5fa2dd/ffffff', 'Joshua Blakeway'),
(47, 3, 'http://dummyimage.com/159x100.png/dddddd/000000', 'Eva Witul'),
(48, 4, 'http://dummyimage.com/141x100.png/5fa2dd/ffffff', 'Rosette Momery'),
(49, 3, 'http://dummyimage.com/155x100.png/5fa2dd/ffffff', 'Pavia Snarr'),
(50, 1, 'http://dummyimage.com/189x100.png/cc0000/ffffff', 'Esther Burgwyn');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_foto`
--

CREATE TABLE `detail_foto` (
  `id` int(11) NOT NULL,
  `tabel_foto_id` int(11) NOT NULL,
  `nama_foto` varchar(255) NOT NULL,
  `waktu_upload` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `detail_foto`
--

INSERT INTO `detail_foto` (`id`, `tabel_foto_id`, `nama_foto`, `waktu_upload`) VALUES
(1, 7, '1783068720_30c2183fc1607a1d69f4.png', '2026-07-03 01:52:00'),
(2, 7, '1783068720_9fba0bb8456ab4d8a7f6.png', '2026-07-03 01:52:00'),
(3, 7, '1783068720_6978852b07ed5a69a433.png', '2026-07-03 01:52:00'),
(4, 7, '1783068720_ca499ed3e7fc2e4abfcf.png', '2026-07-03 01:52:00'),
(5, 7, '1783068720_fed16d9fc34fc7fddfde.png', '2026-07-03 01:52:00'),
(6, 7, '1783068720_d7253a1a78c40aa350e7.png', '2026-07-03 01:52:00'),
(7, 8, '1783068972_c612d5c1d70465e2243a.png', '2026-07-03 01:56:12'),
(8, 8, '1783068972_fe98bc16c06b7052ada0.png', '2026-07-03 01:56:12'),
(9, 8, '1783068972_8e8d1993dee880ebb113.png', '2026-07-03 01:56:12'),
(10, 8, '1783068972_08939b03c9107acf8f54.png', '2026-07-03 01:56:12'),
(11, 8, '1783068972_747c8009ab5dab71eaf2.png', '2026-07-03 01:56:12'),
(12, 8, '1783068972_9a54bd56c58f8d18603c.png', '2026-07-03 01:56:12'),
(13, 9, '1783069049_99900dceeaa9e64e5673.png', '2026-07-03 01:57:29'),
(14, 9, '1783069049_312d9213e87ad2984d12.png', '2026-07-03 01:57:29'),
(15, 9, '1783069049_807ee67460ba1bd7cc09.png', '2026-07-03 01:57:29'),
(16, 9, '1783069049_1d40c073c38c4059d18f.png', '2026-07-03 01:57:29'),
(17, 9, '1783069049_cc5ac747e85a5a5f4e6b.png', '2026-07-03 01:57:29'),
(18, 9, '1783069049_6c9fcc8bec3a9c5ef8f7.png', '2026-07-03 01:57:29'),
(19, 10, '1783069230_920bc5c900fefda5a25f.png', '2026-07-03 02:00:30'),
(20, 10, '1783069230_a6162d736783edae5d94.png', '2026-07-03 02:00:30'),
(21, 10, '1783069230_1dfd645867f1131527c3.png', '2026-07-03 02:00:30'),
(22, 10, '1783069230_943ea0559c8690d22ff5.png', '2026-07-03 02:00:30'),
(23, 10, '1783069230_f70a99f9302def84581a.png', '2026-07-03 02:00:30'),
(24, 10, '1783069230_b251066fe5ec1ce1e333.png', '2026-07-03 02:00:30'),
(25, 11, '1783069260_b15fa81c10e83683b968.png', '2026-07-03 02:01:00'),
(26, 11, '1783069260_7da78352870fb21cd588.png', '2026-07-03 02:01:00'),
(27, 11, '1783069260_1aebe9bf11d179c78e53.png', '2026-07-03 02:01:00'),
(28, 11, '1783069260_e468690be134443e9cd1.png', '2026-07-03 02:01:00'),
(29, 11, '1783069260_5098174dcbb3f836e824.png', '2026-07-03 02:01:00'),
(30, 11, '1783069260_560c62a9b9217bd02d93.png', '2026-07-03 02:01:00'),
(31, 12, '1783069300_b8e4c6403e57922e1692.png', '2026-07-03 02:01:40'),
(32, 12, '1783069300_c69b81a1bb296fa6b8b2.png', '2026-07-03 02:01:40'),
(33, 12, '1783069300_a81d28a42468d88ed915.png', '2026-07-03 02:01:40'),
(34, 12, '1783069300_ff1c64ec12822ac62215.png', '2026-07-03 02:01:40'),
(35, 12, '1783069300_181181c690b26456190b.png', '2026-07-03 02:01:40'),
(36, 12, '1783069300_351f41b117b11fea7e7f.png', '2026-07-03 02:01:40'),
(37, 13, '1783069428_4c76ba240e842a77beff.png', '2026-07-03 02:03:48'),
(38, 13, '1783069428_4bab953f8b934b5e6e30.png', '2026-07-03 02:03:48'),
(39, 13, '1783069428_d3f8a5390e041fed6b4c.png', '2026-07-03 02:03:48'),
(40, 13, '1783069428_94ffec2ae5fb5b691441.png', '2026-07-03 02:03:48'),
(41, 13, '1783069428_1313b7fa1f9c15419ac2.png', '2026-07-03 02:03:48'),
(42, 13, '1783069428_158b02762eac1ed6f0a0.png', '2026-07-03 02:03:48'),
(43, 14, '1783069533_62785440239b70a72ecc.png', '2026-07-03 02:05:33'),
(44, 14, '1783069533_c64237b617b38bcc96d9.png', '2026-07-03 02:05:33'),
(45, 14, '1783069533_6bb58b06cc859d89d6a8.png', '2026-07-03 02:05:33'),
(46, 14, '1783069533_8e4202cdec814d0cc250.png', '2026-07-03 02:05:33'),
(47, 14, '1783069533_bee2864442f2547efbf2.png', '2026-07-03 02:05:33'),
(48, 14, '1783069533_548628f1fec1700286d1.png', '2026-07-03 02:05:33'),
(49, 15, '1783069639_4b60439635bd7926e3da.png', '2026-07-03 02:07:19'),
(50, 15, '1783069639_f42b68ab447bdd863db9.png', '2026-07-03 02:07:19'),
(51, 15, '1783069639_6e85b9d55c7807a91a3f.png', '2026-07-03 02:07:19'),
(52, 15, '1783069639_8aed171cedae7ba23692.png', '2026-07-03 02:07:19'),
(53, 15, '1783069639_9b1ba6986c8a048a1634.png', '2026-07-03 02:07:19'),
(54, 15, '1783069639_3d28c1425733cd72d592.png', '2026-07-03 02:07:19'),
(55, 16, '1783069736_e6d5160a7775261efb8b.png', '2026-07-03 02:08:56'),
(56, 16, '1783069736_4ebcc458437789b1343c.png', '2026-07-03 02:08:56'),
(57, 16, '1783069736_7b60ebc6fe71ab969ac2.png', '2026-07-03 02:08:56'),
(58, 16, '1783069736_a743230eb61ffadaaa8c.png', '2026-07-03 02:08:56'),
(59, 16, '1783069736_24dd87a3692d28ee9287.png', '2026-07-03 02:08:56'),
(60, 16, '1783069736_7033a2a49ba8bb3c51b7.png', '2026-07-03 02:08:56'),
(61, 18, '1783255442_aab3947b283a01978276.png', '2026-07-05 05:44:02'),
(62, 18, '1783255442_bec6101bc875b5d5f619.png', '2026-07-05 05:44:02'),
(63, 18, '1783255442_4aa19e91c05f2176e3fa.png', '2026-07-05 05:44:02'),
(64, 20, '1783261898_bf931cc7579fb17fafae.png', '2026-07-05 07:31:38'),
(65, 20, '1783261898_632dd4f4404bf16b3960.png', '2026-07-05 07:31:38'),
(66, 20, '1783261898_a72d0708210caf932950.png', '2026-07-05 07:31:38'),
(67, 20, '1783261898_db0ec8550e62ccfd4695.png', '2026-07-05 07:31:38'),
(68, 20, '1783261898_17d466b55dfc485f0325.png', '2026-07-05 07:31:38'),
(69, 20, '1783261898_9af4a0330cf80b6f9ec8.png', '2026-07-05 07:31:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `employee_id` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `foreign_id` varchar(50) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `employees`
--

INSERT INTO `employees` (`id`, `image`, `employee_id`, `name`, `unit`, `tgl_lahir`, `foreign_id`, `address`) VALUES
(1, 'https://example.com/profile/0120.jpg', 'EMP-2012-0120', 'Budi Anggraini', 'Sales', '1971-09-09', '4419996078023146', 'Jl. Pahlawan No. 123, Surabaya'),
(2, 'https://example.com/profile/0002.jpg', 'EMP-2018-0002', 'Agus Dewi', 'Marketing', '1977-10-02', '5794179008141990', 'Jl. Gajah Mada No. 53, Makassar'),
(3, 'https://example.com/profile/0003.jpg', 'EMP-2022-0003', 'Rio Indah', 'Sales', '1992-01-05', '4351009191049122', 'Jl. Sudirman No. 144, Malang'),
(4, 'https://example.com/profile/0004.jpg', 'EMP-2013-0004', 'Putri Setiawan', 'Finance', '1973-01-01', '5518720384281402', 'Jl. Merdeka No. 36, Malang'),
(5, 'https://example.com/profile/0005.jpg', 'EMP-2013-0005', 'Putri Fauzi', 'Legal', '1999-10-31', '9594711987477218', 'Jl. Thamrin No. 94, Yogyakarta'),
(6, 'https://example.com/profile/0006.jpg', 'EMP-2020-0006', 'Agus Utami', 'R&D', '1999-05-04', '6843114886931324', 'Jl. Diponegoro No. 25, Surabaya'),
(7, 'https://example.com/profile/0007.jpg', 'EMP-2017-0007', 'Eko Setiawan', 'R&D', '1973-10-12', '7788847424545826', 'Jl. Pahlawan No. 41, Jakarta'),
(8, 'https://example.com/profile/0008.jpg', 'EMP-2015-0008', 'Joko Utami', 'Marketing', '1974-04-14', '9518533434414551', 'Jl. Merdeka No. 31, Jakarta'),
(9, 'https://example.com/profile/0009.jpg', 'EMP-2021-0009', 'Sri Nugroho', 'Finance', '1974-06-13', '1546187092274314', 'Jl. Kartini No. 145, Medan'),
(10, 'https://example.com/profile/0010.jpg', 'EMP-2015-0010', 'Rio Putra', 'Marketing', '1991-04-25', '5173233741094164', 'Jl. Ahmad Yani No. 33, Medan'),
(11, 'https://example.com/profile/0011.jpg', 'EMP-2012-0011', 'Nur Fauzi', 'Production', '1983-07-12', '9683682736819399', 'Jl. Diponegoro No. 113, Denpasar'),
(12, 'https://example.com/profile/0012.jpg', 'EMP-2014-0012', 'Rina Lestari', 'Marketing', '1990-08-19', '4241396853822125', 'Jl. Asia Afrika No. 119, Bandung'),
(13, 'https://example.com/profile/0013.jpg', 'EMP-2021-0013', 'Rina Pratama', 'Operations', '1986-04-17', '5582667893625541', 'Jl. Gajah Mada No. 16, Surabaya'),
(14, 'https://example.com/profile/0014.jpg', 'EMP-2013-0014', 'Rudi Rahayu', 'HRD', '1993-09-07', '9610497127103677', 'Jl. Thamrin No. 17, Medan'),
(15, 'https://example.com/profile/0015.jpg', 'EMP-2017-0015', 'Citra Pratama', 'Marketing', '1994-04-16', '9048208689703981', 'Jl. Gatot Subroto No. 8, Surabaya'),
(16, 'https://example.com/profile/0016.jpg', 'EMP-2011-0016', 'Rina Wati', 'Production', '1976-11-27', '2370299711590180', 'Jl. Diponegoro No. 133, Malang'),
(17, 'https://example.com/profile/0017.jpg', 'EMP-2012-0017', 'Putri Fauzi', 'Production', '1972-03-05', '1041767812327570', 'Jl. Kartini No. 52, Bandung'),
(18, 'https://example.com/profile/0018.jpg', 'EMP-2020-0018', 'Ani Wati', 'Operations', '1981-02-13', '8628037192714047', 'Jl. Gajah Mada No. 58, Malang'),
(19, 'https://example.com/profile/0019.jpg', 'EMP-2013-0019', 'Andi Indah', 'Production', '1989-12-08', '4918676456211029', 'Jl. Pahlawan No. 146, Bandung'),
(20, 'https://example.com/profile/0020.jpg', 'EMP-2020-0020', 'Nur Wijaya', 'Legal', '1980-11-07', '6696264789001966', 'Jl. Ahmad Yani No. 46, Makassar'),
(21, 'https://example.com/profile/0021.jpg', 'EMP-2023-0021', 'Ani Permata', 'Finance', '1993-03-08', '3801141828988385', 'Jl. Asia Afrika No. 26, Yogyakarta'),
(22, 'https://example.com/profile/0022.jpg', 'EMP-2015-0022', 'Ani Wati', 'Production', '1982-06-03', '6811200638257183', 'Jl. Diponegoro No. 126, Jakarta'),
(23, 'https://example.com/profile/0023.jpg', 'EMP-2018-0023', 'Dian Setiawan', 'Sales', '1994-04-03', '3435114982298642', 'Jl. Gajah Mada No. 146, Medan'),
(24, 'https://example.com/profile/0024.jpg', 'EMP-2012-0024', 'Fajar Fauzi', 'Finance', '1987-01-11', '8609804352639488', 'Jl. Ahmad Yani No. 35, Palembang'),
(25, 'https://example.com/profile/0025.jpg', 'EMP-2022-0025', 'Lia Sari', 'Finance', '1990-02-12', '1887548847160224', 'Jl. Gajah Mada No. 135, Makassar'),
(26, 'https://example.com/profile/0026.jpg', 'EMP-2023-0026', 'Andi Pratama', 'Legal', '1982-06-26', '1769784867264372', 'Jl. Asia Afrika No. 26, Denpasar'),
(27, 'https://example.com/profile/0027.jpg', 'EMP-2013-0027', 'Dewi Dewi', 'Finance', '1970-07-20', '6217551612550977', 'Jl. Gatot Subroto No. 3, Jakarta'),
(28, 'https://example.com/profile/0028.jpg', 'EMP-2019-0028', 'Dewi Lestari', 'IT', '1994-11-12', '2152292955386153', 'Jl. Diponegoro No. 125, Semarang'),
(29, 'https://example.com/profile/0029.jpg', 'EMP-2020-0029', 'Eko Rahayu', 'Customer Service', '1988-03-05', '3449760826796268', 'Jl. Thamrin No. 64, Makassar'),
(30, 'https://example.com/profile/0030.jpg', 'EMP-2010-0030', 'Rina Anggraini', 'Customer Service', '1999-07-09', '5766769800135369', 'Jl. Ahmad Yani No. 72, Denpasar'),
(31, 'https://example.com/profile/0031.jpg', 'EMP-2022-0031', 'Lia Rahayu', 'Sales', '1982-06-29', '9785000146061332', 'Jl. Sudirman No. 35, Palembang'),
(32, 'https://example.com/profile/0032.jpg', 'EMP-2023-0032', 'Siti Pratama', 'Operations', '1974-08-09', '3964748941716774', 'Jl. Pahlawan No. 121, Surabaya'),
(33, 'https://example.com/profile/0033.jpg', 'EMP-2019-0033', 'Nur Wijaya', 'HRD', '1989-03-23', '9758188835186132', 'Jl. Kartini No. 115, Makassar'),
(34, 'https://example.com/profile/0034.jpg', 'EMP-2012-0034', 'Putri Kusuma', 'Production', '2000-10-19', '5508127737425340', 'Jl. Gajah Mada No. 127, Medan'),
(35, 'https://example.com/profile/0035.jpg', 'EMP-2016-0035', 'Dewi Sari', 'HRD', '1997-11-27', '1676491242444434', 'Jl. Gatot Subroto No. 17, Medan'),
(36, 'https://example.com/profile/0036.jpg', 'EMP-2023-0036', 'Sri Utami', 'Finance', '1991-03-13', '9942136752072158', 'Jl. Merdeka No. 90, Surabaya'),
(37, 'https://example.com/profile/0037.jpg', 'EMP-2016-0037', 'Nur Setiawan', 'IT', '1996-10-15', '6688704932310092', 'Jl. Kartini No. 131, Surabaya'),
(38, 'https://example.com/profile/0038.jpg', 'EMP-2017-0038', 'Joko Wati', 'Marketing', '1972-12-14', '1100089842411636', 'Jl. Ahmad Yani No. 37, Yogyakarta'),
(39, 'https://example.com/profile/0039.jpg', 'EMP-2019-0039', 'Andi Sari', 'R&D', '1978-02-19', '9390160196973599', 'Jl. Ahmad Yani No. 77, Semarang'),
(40, 'https://example.com/profile/0040.jpg', 'EMP-2022-0040', 'Budi Pratama', 'Finance', '1992-05-25', '9126825951656598', 'Jl. Sudirman No. 7, Denpasar'),
(41, 'https://example.com/profile/0041.jpg', 'EMP-2015-0041', 'Andi Pratama', 'R&D', '1995-08-09', '6940380612799794', 'Jl. Sudirman No. 46, Semarang'),
(42, 'https://example.com/profile/0042.jpg', 'EMP-2014-0042', 'Joko Permata', 'Finance', '1994-08-23', '8985581246342219', 'Jl. Gajah Mada No. 73, Medan'),
(43, 'https://example.com/profile/0043.jpg', 'EMP-2021-0043', 'Siti Kusuma', 'R&D', '1998-11-05', '6570165414554039', 'Jl. Thamrin No. 35, Palembang'),
(44, 'https://example.com/profile/0044.jpg', 'EMP-2019-0044', 'Nur Indah', 'Customer Service', '1982-09-04', '1769603194010932', 'Jl. Thamrin No. 39, Bandung'),
(45, 'https://example.com/profile/0045.jpg', 'EMP-2010-0045', 'Rina Saputra', 'HRD', '1987-11-07', '3591128834933631', 'Jl. Pahlawan No. 86, Denpasar'),
(46, 'https://example.com/profile/0046.jpg', 'EMP-2016-0046', 'Dewi Nugroho', 'Finance', '1994-10-04', '2933955627108728', 'Jl. Pahlawan No. 130, Makassar'),
(47, 'https://example.com/profile/0047.jpg', 'EMP-2010-0047', 'Hadi Susanto', 'Finance', '1977-04-21', '1360409810563873', 'Jl. Gajah Mada No. 9, Malang'),
(48, 'https://example.com/profile/0048.jpg', 'EMP-2022-0048', 'Rio Sari', 'HRD', '1978-10-06', '9724333018080088', 'Jl. Pahlawan No. 5, Palembang'),
(49, 'https://example.com/profile/0049.jpg', 'EMP-2019-0049', 'Sri Lestari', 'IT', '1978-05-07', '2883654489876672', 'Jl. Merdeka No. 92, Jakarta'),
(50, 'https://example.com/profile/0050.jpg', 'EMP-2010-0050', 'Dian Pratama', 'Sales', '1983-10-13', '2479852380297896', 'Jl. Gajah Mada No. 126, Medan'),
(51, 'https://example.com/profile/0051.jpg', 'EMP-2021-0051', 'Agus Permata', 'R&D', '1976-04-10', '5124136688968365', 'Jl. Diponegoro No. 2, Jakarta'),
(52, 'https://example.com/profile/0052.jpg', 'EMP-2010-0052', 'Sri Nugroho', 'Marketing', '1972-07-27', '1550543762155315', 'Jl. Sudirman No. 4, Palembang'),
(53, 'https://example.com/profile/0053.jpg', 'EMP-2013-0053', 'Hadi Lestari', 'Legal', '1991-08-19', '8788842842547797', 'Jl. Asia Afrika No. 142, Denpasar'),
(54, 'https://example.com/profile/0054.jpg', 'EMP-2010-0054', 'Budi Putra', 'HRD', '2000-07-02', '8069429170750508', 'Jl. Merdeka No. 120, Semarang'),
(55, 'https://example.com/profile/0055.jpg', 'EMP-2018-0055', 'Joko Fauzi', 'Finance', '1990-11-04', '3867545916996719', 'Jl. Ahmad Yani No. 140, Semarang'),
(56, 'https://example.com/profile/0056.jpg', 'EMP-2019-0056', 'Putri Fauzi', 'HRD', '1970-03-05', '5721231003387799', 'Jl. Kartini No. 70, Jakarta'),
(57, 'https://example.com/profile/0057.jpg', 'EMP-2023-0057', 'Agus Hidayat', 'Legal', '1978-06-16', '2305911010184714', 'Jl. Pahlawan No. 133, Bandung'),
(58, 'https://example.com/profile/0058.jpg', 'EMP-2011-0058', 'Agus Permata', 'IT', '1971-07-04', '8890927772168300', 'Jl. Ahmad Yani No. 100, Yogyakarta'),
(59, 'https://example.com/profile/0059.jpg', 'EMP-2018-0059', 'Maya Sari', 'Finance', '1989-07-31', '8537578039463989', 'Jl. Diponegoro No. 67, Yogyakarta'),
(60, 'https://example.com/profile/0060.jpg', 'EMP-2021-0060', 'Ani Hidayat', 'Marketing', '1991-07-16', '6208463568005612', 'Jl. Gajah Mada No. 93, Bandung'),
(61, 'https://example.com/profile/0061.jpg', 'EMP-2022-0061', 'Putri Pratama', 'Operations', '1972-05-13', '3943388471899484', 'Jl. Ahmad Yani No. 138, Bandung'),
(62, 'https://example.com/profile/0062.jpg', 'EMP-2015-0062', 'Agus Lestari', 'Sales', '1977-04-12', '7187682189963144', 'Jl. Ahmad Yani No. 97, Yogyakarta'),
(63, 'https://example.com/profile/0063.jpg', 'EMP-2023-0063', 'Ani Santoso', 'Customer Service', '1998-04-12', '4102641438974644', 'Jl. Kartini No. 49, Malang'),
(64, 'https://example.com/profile/0064.jpg', 'EMP-2022-0064', 'Siti Lestari', 'Marketing', '1989-04-29', '7887386030992030', 'Jl. Gajah Mada No. 30, Surabaya'),
(65, 'https://example.com/profile/0065.jpg', 'EMP-2020-0065', 'Nur Saputra', 'R&D', '1992-02-08', '8658907614767391', 'Jl. Gatot Subroto No. 106, Medan'),
(66, 'https://example.com/profile/0066.jpg', 'EMP-2017-0066', 'Maya Wijaya', 'Operations', '1972-11-03', '5975018354118818', 'Jl. Asia Afrika No. 8, Makassar'),
(67, 'https://example.com/profile/0067.jpg', 'EMP-2019-0067', 'Rudi Dewi', 'Customer Service', '1976-04-16', '3169795215925370', 'Jl. Thamrin No. 113, Surabaya'),
(68, 'https://example.com/profile/0068.jpg', 'EMP-2018-0068', 'Hadi Sari', 'R&D', '1980-05-08', '8954972525924386', 'Jl. Thamrin No. 95, Surabaya'),
(69, 'https://example.com/profile/0069.jpg', 'EMP-2012-0069', 'Putri Hidayat', 'R&D', '1999-08-12', '4637209199975927', 'Jl. Thamrin No. 101, Denpasar'),
(70, 'https://example.com/profile/0070.jpg', 'EMP-2013-0070', 'Dewi Hidayat', 'Marketing', '1976-08-12', '8452566192331177', 'Jl. Merdeka No. 74, Malang'),
(71, 'https://example.com/profile/0071.jpg', 'EMP-2012-0071', 'Agus Utami', 'Customer Service', '1999-03-25', '9790565514540542', 'Jl. Thamrin No. 147, Denpasar'),
(72, 'https://example.com/profile/0072.jpg', 'EMP-2010-0072', 'Joko Sari', 'Production', '1985-07-09', '6783526034424175', 'Jl. Ahmad Yani No. 54, Bandung'),
(73, 'https://example.com/profile/0073.jpg', 'EMP-2016-0073', 'Fajar Saputra', 'IT', '1981-04-04', '4113982948401860', 'Jl. Merdeka No. 19, Surabaya'),
(74, 'https://example.com/profile/0074.jpg', 'EMP-2013-0074', 'Andi Wati', 'Legal', '1974-05-21', '2269511828382477', 'Jl. Diponegoro No. 62, Jakarta'),
(75, 'https://example.com/profile/0075.jpg', 'EMP-2021-0075', 'Dewi Anggraini', 'Customer Service', '1970-05-06', '4238664090088119', 'Jl. Kartini No. 73, Surabaya'),
(76, 'https://example.com/profile/0076.jpg', 'EMP-2011-0076', 'Rio Fauzi', 'IT', '1977-12-14', '3451464682390220', 'Jl. Thamrin No. 31, Jakarta'),
(77, 'https://example.com/profile/0077.jpg', 'EMP-2016-0077', 'Nur Hidayat', 'Legal', '1996-04-13', '4770723264883937', 'Jl. Kartini No. 67, Palembang'),
(78, 'https://example.com/profile/0078.jpg', 'EMP-2013-0078', 'Budi Rahayu', 'Legal', '1999-12-13', '5483522883973323', 'Jl. Gajah Mada No. 142, Makassar'),
(79, 'https://example.com/profile/0079.jpg', 'EMP-2014-0079', 'Citra Permata', 'Sales', '1973-11-10', '2028304608541114', 'Jl. Pahlawan No. 68, Bandung'),
(80, 'https://example.com/profile/0080.jpg', 'EMP-2018-0080', 'Agus Setiawan', 'Production', '1975-04-26', '1688072546092105', 'Jl. Gajah Mada No. 95, Yogyakarta'),
(81, 'https://example.com/profile/0081.jpg', 'EMP-2016-0081', 'Lia Nugroho', 'Production', '1997-12-07', '5017582508116071', 'Jl. Sudirman No. 52, Palembang'),
(82, 'https://example.com/profile/0082.jpg', 'EMP-2012-0082', 'Ani Pratama', 'Finance', '1992-01-14', '3889806415058513', 'Jl. Pahlawan No. 48, Palembang'),
(83, 'https://example.com/profile/0083.jpg', 'EMP-2019-0083', 'Rio Rahayu', 'Marketing', '1981-09-02', '4534316171322132', 'Jl. Asia Afrika No. 116, Semarang'),
(84, 'https://example.com/profile/0084.jpg', 'EMP-2022-0084', 'Andi Rahayu', 'Legal', '1976-11-11', '2071747484699338', 'Jl. Diponegoro No. 115, Jakarta'),
(85, 'https://example.com/profile/0085.jpg', 'EMP-2021-0085', 'Lia Pratama', 'HRD', '1998-05-11', '4848371339484786', 'Jl. Diponegoro No. 119, Palembang'),
(86, 'https://example.com/profile/0086.jpg', 'EMP-2021-0086', 'Andi Susanto', 'R&D', '1993-09-04', '6715553174055684', 'Jl. Gajah Mada No. 35, Malang'),
(87, 'https://example.com/profile/0087.jpg', 'EMP-2014-0087', 'Citra Lestari', 'Customer Service', '1987-01-03', '6183742421863167', 'Jl. Merdeka No. 109, Bandung'),
(88, 'https://example.com/profile/0088.jpg', 'EMP-2018-0088', 'Budi Indah', 'Sales', '2000-01-04', '5121826418082041', 'Jl. Ahmad Yani No. 44, Malang'),
(89, 'https://example.com/profile/0089.jpg', 'EMP-2018-0089', 'Andi Saputra', 'Legal', '1973-03-15', '5978290662224485', 'Jl. Ahmad Yani No. 4, Yogyakarta'),
(90, 'https://example.com/profile/0090.jpg', 'EMP-2015-0090', 'Dewi Anggraini', 'Sales', '1993-09-07', '1095247473286524', 'Jl. Kartini No. 32, Denpasar'),
(91, 'https://example.com/profile/0091.jpg', 'EMP-2016-0091', 'Andi Sari', 'Sales', '1976-03-13', '9376542639827016', 'Jl. Pahlawan No. 67, Palembang'),
(92, 'https://example.com/profile/0092.jpg', 'EMP-2016-0092', 'Nur Sari', 'Operations', '1982-03-04', '2921310106285068', 'Jl. Merdeka No. 119, Palembang'),
(93, 'https://example.com/profile/0093.jpg', 'EMP-2010-0093', 'Lia Setiawan', 'IT', '1996-01-15', '2614875533221574', 'Jl. Gajah Mada No. 23, Denpasar'),
(94, 'https://example.com/profile/0094.jpg', 'EMP-2020-0094', 'Hadi Nugroho', 'Customer Service', '1972-05-21', '9383758255277207', 'Jl. Gatot Subroto No. 94, Surabaya'),
(95, 'https://example.com/profile/0095.jpg', 'EMP-2021-0095', 'Putri Putra', 'IT', '1979-02-21', '1845028410527375', 'Jl. Gatot Subroto No. 126, Jakarta'),
(96, 'https://example.com/profile/0096.jpg', 'EMP-2019-0096', 'Dewi Kusuma', 'Operations', '1977-10-27', '2750281212394931', 'Jl. Gatot Subroto No. 6, Makassar'),
(97, 'https://example.com/profile/0097.jpg', 'EMP-2014-0097', 'Citra Putra', 'Customer Service', '1995-09-03', '2618425858527192', 'Jl. Sudirman No. 39, Palembang'),
(98, 'https://example.com/profile/0098.jpg', 'EMP-2017-0098', 'Dewi Indah', 'Marketing', '1987-07-09', '8370291071822988', 'Jl. Asia Afrika No. 111, Semarang'),
(99, 'https://example.com/profile/0099.jpg', 'EMP-2020-0099', 'Citra Nugroho', 'Sales', '1972-02-04', '4408520467381048', 'Jl. Sudirman No. 101, Yogyakarta'),
(100, 'https://example.com/profile/0100.jpg', 'EMP-2010-0100', 'Rina Anggraini', 'R&D', '1977-01-20', '3697970207810408', 'Jl. Sudirman No. 82, Bandung'),
(101, 'https://example.com/profile/0101.jpg', 'EMP-2012-0101', 'Rio Indah', 'Finance', '1985-05-28', '7866050993077533', 'Jl. Gajah Mada No. 143, Semarang'),
(102, 'https://example.com/profile/0102.jpg', 'EMP-2015-0102', 'Nur Hidayat', 'Finance', '1996-11-10', '4635942148781752', 'Jl. Sudirman No. 57, Jakarta'),
(103, 'https://example.com/profile/0103.jpg', 'EMP-2018-0103', 'Andi Hidayat', 'Marketing', '1982-04-26', '6870525176513049', 'Jl. Thamrin No. 61, Makassar'),
(104, 'https://example.com/profile/0104.jpg', 'EMP-2022-0104', 'Maya Indah', 'Operations', '1993-09-29', '2419199503487463', 'Jl. Gajah Mada No. 142, Makassar'),
(105, 'https://example.com/profile/0105.jpg', 'EMP-2018-0105', 'Rina Utami', 'Marketing', '1991-09-26', '5425055433098448', 'Jl. Sudirman No. 62, Surabaya'),
(106, 'https://example.com/profile/0106.jpg', 'EMP-2016-0106', 'Budi Anggraini', 'Customer Service', '2000-03-20', '6104390595295833', 'Jl. Ahmad Yani No. 77, Malang'),
(107, 'https://example.com/profile/0107.jpg', 'EMP-2011-0107', 'Eko Lestari', 'Legal', '1983-08-09', '5296447542365722', 'Jl. Sudirman No. 113, Jakarta'),
(108, 'https://example.com/profile/0108.jpg', 'EMP-2011-0108', 'Dewi Nugroho', 'Marketing', '2000-06-30', '4164346799317346', 'Jl. Gajah Mada No. 142, Denpasar'),
(109, 'https://example.com/profile/0109.jpg', 'EMP-2012-0109', 'Rio Dewi', 'R&D', '1988-04-02', '2274666220334176', 'Jl. Thamrin No. 25, Yogyakarta'),
(110, 'https://example.com/profile/0110.jpg', 'EMP-2017-0110', 'Joko Saputra', 'Sales', '1996-11-28', '9696971336084675', 'Jl. Kartini No. 68, Bandung'),
(111, 'https://example.com/profile/0111.jpg', 'EMP-2019-0111', 'Nur Putra', 'Production', '1972-01-05', '9259982987136058', 'Jl. Gajah Mada No. 134, Yogyakarta'),
(112, 'https://example.com/profile/0112.jpg', 'EMP-2014-0112', 'Eko Putra', 'Legal', '1993-03-21', '3963008283947110', 'Jl. Diponegoro No. 10, Surabaya'),
(113, 'https://example.com/profile/0113.jpg', 'EMP-2020-0113', 'Rina Sari', 'Marketing', '1982-05-21', '7668054439435026', 'Jl. Sudirman No. 98, Palembang'),
(114, 'https://example.com/profile/0114.jpg', 'EMP-2023-0114', 'Rio Santoso', 'IT', '1988-01-10', '7834190471935779', 'Jl. Asia Afrika No. 112, Palembang'),
(115, 'https://example.com/profile/0115.jpg', 'EMP-2021-0115', 'Sri Utami', 'Customer Service', '1993-06-21', '5242837875732508', 'Jl. Gatot Subroto No. 16, Palembang'),
(116, 'https://example.com/profile/0116.jpg', 'EMP-2019-0116', 'Lia Utami', 'IT', '1993-05-15', '8939037840457421', 'Jl. Pahlawan No. 55, Jakarta'),
(117, 'https://example.com/profile/0117.jpg', 'EMP-2015-0117', 'Agus Setiawan', 'Legal', '1970-10-04', '7542224615689306', 'Jl. Diponegoro No. 109, Denpasar'),
(118, 'https://example.com/profile/0118.jpg', 'EMP-2021-0118', 'Lia Pratama', 'Operations', '1980-03-20', '2384206339287400', 'Jl. Thamrin No. 50, Malang'),
(119, 'https://example.com/profile/0119.jpg', 'EMP-2021-0119', 'Dewi Nugroho', 'Finance', '1999-04-21', '6862783757526606', 'Jl. Ahmad Yani No. 69, Yogyakarta');

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
-- Struktur dari tabel `gender`
--

CREATE TABLE `gender` (
  `id` int(11) NOT NULL,
  `gender` text NOT NULL,
  `ket` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `delete_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `gender`
--

INSERT INTO `gender` (`id`, `gender`, `ket`, `created_at`, `updated_at`, `delete_at`) VALUES
(1, 'Pria', '', '2026-06-10 18:11:51', '2026-06-10 18:11:51', '2026-06-10 18:11:51'),
(2, 'Wanita', '', '2026-06-10 18:11:51', '2026-06-10 18:11:51', '2026-06-10 18:11:51'),
(3, 'Non-Binner', '', '2026-06-10 18:11:51', '2026-06-10 18:11:51', '2026-06-10 18:11:51');

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
(12, 'Standar Operasional Prosedur', '', '2026-06-10 18:11:51', '2026-06-10 18:11:51', '2026-06-10 18:11:51'),
(13, 'Nota Kesepahaman', '', '2026-06-24 08:43:36', '2026-06-24 08:43:36', '2026-06-24 08:43:36'),
(14, 'Pedoman Umum', '', '2026-06-24 15:47:32', '2026-06-24 15:47:32', '2026-06-24 15:47:32'),
(15, 'Petunjuk Teknis', '', '2026-06-24 15:47:32', '2026-06-24 15:47:32', '2026-06-24 15:47:32'),
(16, 'Petunjuk Pelaksanaan', '', '2026-06-24 15:47:32', '2026-06-24 15:47:32', '2026-06-24 15:47:32'),
(17, 'Pengumuman', '', '2026-07-13 10:16:41', '2026-07-13 10:16:41', '2026-07-13 10:16:41'),
(18, 'Term & Condition', '', '2026-07-13 10:16:41', '2026-07-13 10:16:41', '2026-07-13 10:16:41'),
(19, 'Privacy', '', '2026-07-13 10:16:41', '2026-07-13 10:16:41', '2026-07-13 10:16:41'),
(20, 'Press', '', '2026-07-13 10:16:41', '2026-07-13 10:16:41', '2026-07-13 10:16:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `kategori` text NOT NULL,
  `ket` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `delete_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `kategori`, `ket`, `created_at`, `updated_at`, `delete_at`) VALUES
(1, 'Berita', '', '2026-06-10 18:11:51', '2026-06-10 18:11:51', '2026-06-10 18:11:51'),
(2, 'Menteri', '', '2026-06-10 18:11:51', '2026-06-10 18:11:51', '2026-06-10 18:11:51'),
(3, 'Wakil Menteri', '', '2026-06-10 18:11:51', '2026-06-10 18:11:51', '2026-06-10 18:11:51'),
(4, 'Hari Nasional', '', '2026-06-10 18:11:51', '2026-06-10 18:11:51', '2026-06-10 18:11:51'),
(5, 'Hari Internasional', '', '2026-06-10 18:11:51', '2026-06-10 18:11:51', '2026-06-10 18:11:51'),
(6, 'Hari Keagamaan', '', '2026-06-10 18:11:51', '2026-06-10 18:11:51', '2026-06-10 18:11:51'),
(7, 'Hari Lainnya', '', '2026-06-10 18:11:51', '2026-06-10 18:11:51', '2026-06-10 18:11:51'),
(8, 'Pengumuman', '', '2026-06-10 18:11:51', '2026-06-10 18:11:51', '2026-06-10 18:11:51'),
(9, 'Iklan', '', '2026-06-10 18:11:51', '2026-06-10 18:11:51', '2026-06-10 18:11:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keuangan`
--

CREATE TABLE `keuangan` (
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
  `image` varchar(250) NOT NULL,
  `tayang` int(5) NOT NULL,
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
-- Dumping data untuk tabel `keuangan`
--

INSERT INTO `keuangan` (`id`, `id_hirarki`, `id_status`, `judul`, `tentang`, `jenis_peradilan`, `tempat_penetapan`, `pemrakarsa`, `nomor`, `sumber`, `tgl_terbit`, `aktif`, `pdf`, `image`, `tayang`, `abstrak`, `kata_kunci`, `bahasaa`, `created_at`, `updated_at`, `deleted_at`, `file_name`, `file_path`, `file_type`) VALUES
(1, 1, 1, '', '', 0, '0', '', 'sdsfh/54/yu/877', 0, '2026-06-24', 0, '', '', 0, '', '', '', '2026-06-10 21:45:00', '2026-06-10 21:45:00', '2026-06-10 21:45:00', '', '', ''),
(2, 2, 1, '', '', 0, '0', '', '2323wee', 0, '2026-06-24', 0, '', '', 0, '', '', '', '2026-06-10 22:22:39', '2026-06-10 22:22:39', '2026-06-10 22:22:39', '', '', ''),
(3, 3, 2, '', '56hghryuytjjghjhgjhjhjjjhhh', 0, '0', '', 'asas2434', 0, '2026-06-11', 0, '', '', 0, '', '', '', '2026-06-11 11:00:51', '2026-06-11 11:00:51', '2026-06-11 18:00:51', '', '', ''),
(4, 4, 4, '', 'bvmcgkhjkhk', 0, '0', '', 'dfggfgf', 0, '2026-06-07', 0, '', '', 0, '', '', '', '2026-06-11 11:05:31', '2026-06-11 11:05:31', '2026-06-11 18:05:31', '', '', ''),
(5, 5, 3, '', 'uyuyhjhj', 0, '0', '', 'yttyytyt', 0, '2026-06-10', 0, '', '', 0, '', '', '', '2026-06-11 11:10:56', '2026-06-11 11:10:56', '2026-06-11 18:10:56', '', '', ''),
(6, 10, 0, '', 'tytyyyt', 0, '', '', 'ghh', 0, '2026-06-08', 0, '', '', 0, '', '', '', '2026-06-12 16:09:00', '2026-06-12 16:09:00', '2026-06-12 23:09:00', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu_ska`
--

CREATE TABLE `menu_ska` (
  `id` int(11) NOT NULL,
  `menu` text NOT NULL,
  `foto` varchar(150) NOT NULL,
  `harga` int(10) NOT NULL,
  `tayang` int(5) NOT NULL,
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
(1, '2020-12-28-223112', 'CodeIgniter\\Shield\\Database\\Migrations\\CreateAuthTables', 'default', 'CodeIgniter\\Shield', 1783925619, 1),
(2, '2021-07-04-041948', 'CodeIgniter\\Settings\\Database\\Migrations\\CreateSettingsTable', 'default', 'CodeIgniter\\Settings', 1783925619, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `multiimages`
--

CREATE TABLE `multiimages` (
  `id` int(11) NOT NULL,
  `foreigutama_id` int(11) NOT NULL,
  `foreignkategori_id` int(11) NOT NULL,
  `judul_images` varchar(100) NOT NULL,
  `tgl_images` date NOT NULL,
  `lokasi_images` varchar(255) NOT NULL,
  `multi_images` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `nikah`
--

CREATE TABLE `nikah` (
  `id` int(11) NOT NULL,
  `nikah` text NOT NULL,
  `ket` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `delete_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `nikah`
--

INSERT INTO `nikah` (`id`, `nikah`, `ket`, `created_at`, `updated_at`, `delete_at`) VALUES
(1, 'Menikah', '', '2026-06-10 18:11:51', '2026-06-10 18:11:51', '2026-06-10 18:11:51'),
(2, 'Belum Menikah', '', '2026-06-10 18:11:51', '2026-06-10 18:11:51', '2026-06-10 18:11:51'),
(3, 'Janda/Duda Cerai', '', '2026-06-10 18:11:51', '2026-06-10 18:11:51', '2026-06-10 18:11:51'),
(4, 'Janda/Duda Meninggal', '', '2026-07-02 12:31:05', '2026-07-02 12:31:05', '2026-07-02 12:31:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama` varchar(150) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nomor_telepon` varchar(20) NOT NULL,
  `desa` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `kabupaten_kota` varchar(100) NOT NULL,
  `provinsi` varchar(100) NOT NULL,
  `latitude` decimal(10,8) NOT NULL,
  `longitude` decimal(11,8) NOT NULL,
  `gender` enum('1','2','3') NOT NULL,
  `nikah` enum('1','2','3') NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Struktur dari tabel `peserta`
--

CREATE TABLE `peserta` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_asn` int(11) NOT NULL,
  `id_pelatihan` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `nik` char(16) NOT NULL,
  `email` varchar(200) NOT NULL,
  `latitude` decimal(10,8) NOT NULL,
  `longitude` decimal(11,8) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `desa` varchar(100) NOT NULL,
  `kecamatan` char(2) NOT NULL,
  `kabupaten_kota` char(2) NOT NULL,
  `provinsi` char(2) NOT NULL,
  `profesi` varchar(200) NOT NULL,
  `gender` enum('1','2','3') NOT NULL,
  `nikah` enum('1','2','3','4') NOT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `foto_url` varchar(250) NOT NULL,
  `tanggal_lahir` varchar(10) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `peserta`
--

INSERT INTO `peserta` (`id`, `id_asn`, `id_pelatihan`, `nama`, `nik`, `email`, `latitude`, `longitude`, `alamat`, `desa`, `kecamatan`, `kabupaten_kota`, `provinsi`, `profesi`, `gender`, `nikah`, `foto`, `foto_url`, `tanggal_lahir`, `created_at`, `updated_at`) VALUES
(1, 0, 0, 'Ahmad Subagja', '3204924603392971', '', 3.59111000, 98.66998000, '', 'Merdeka', 'Me', 'Ko', 'Su', 'Dokter', '1', '3', NULL, 'https://randomuser.me/api/portraits/men/11.jpg', '', NULL, NULL),
(2, 0, 0, 'Siti Aminah', '3204976599227394', '', -6.98891000, 110.41512000, '', 'Pleburan', 'Se', 'Ko', 'Ja', 'Pedagang', '2', '3', NULL, 'https://randomuser.me/api/portraits/women/3.jpg', '', NULL, NULL),
(3, 0, 0, 'Budi Santoso', '3204654772774153', '', -6.86969000, 107.67181000, '', 'Cimenyan', 'Ci', 'Ka', 'Ja', 'Perawat', '1', '3', NULL, 'https://randomuser.me/api/portraits/men/67.jpg', '', NULL, NULL),
(4, 0, 0, 'Dewi Lestari', '3204683569333643', '', -6.29079000, 106.80185000, '', 'Cilandak Barat', 'Ci', 'Ja', 'DK', 'Sopir', '3', '2', NULL, 'https://randomuser.me/api/portraits/lego/43.jpg', '', NULL, NULL),
(5, 0, 0, 'Eko Prasetyo', '3204297397429079', '', -6.87405000, 107.67745000, '', 'Cimenyan', 'Ci', 'Ka', 'Ja', 'Perawat', '2', '3', NULL, 'https://randomuser.me/api/portraits/women/25.jpg', '', NULL, NULL),
(6, 0, 0, 'Rina Wati', '3204558564030704', '', -5.14856000, 119.41870000, '', 'Maloku', 'Uj', 'Ko', 'Su', 'PNS', '1', '2', NULL, 'https://randomuser.me', '', NULL, NULL),
(7, 0, 0, 'Agus Setiawan', '3204551717316712', '', -7.27966000, 112.75549000, '', 'Airlangga', 'Gu', 'Ko', 'Ja', 'Wiraswasta', '1', '2', NULL, 'https://randomuser.me', '', NULL, NULL),
(8, 0, 0, 'Mega Utami', '3204935272635923', '', -7.26620000, 112.75167000, '', 'Airlangga', 'Gu', 'Ko', 'Ja', 'Dosen', '1', '3', NULL, 'https://randomuser.me', '', NULL, NULL),
(9, 0, 0, 'Dedi Heryanto', '3204489370845371', '', -7.77196000, 110.38459000, '', 'Caturtunggal', 'De', 'Sl', 'DI', 'Sopir', '1', '3', NULL, 'https://randomuser.me', '', NULL, NULL),
(10, 0, 0, 'Yani Suryani', '3204944474771216', '', -8.69176000, 115.17416000, '', 'Seminyak', 'Ku', 'Ba', 'Ba', 'Ibu Rumah Tangga', '3', '2', NULL, 'https://randomuser.me', '', NULL, NULL),
(11, 0, 0, 'Hendra Wijaya', '3204561026048128', '', -6.99462000, 110.42858000, '', 'Pleburan', 'Se', 'Ko', 'Ja', 'Buruh', '3', '4', NULL, 'https://randomuser.me', '', NULL, NULL),
(12, 0, 0, 'Fitriani', '3204961027173926', '', -8.69466000, 115.17414000, '', 'Seminyak', 'Ku', 'Ba', 'Ba', 'Ibu Rumah Tangga', '1', '1', NULL, 'https://randomuser.me', '', NULL, NULL),
(13, 0, 0, 'Cecep Rahman', '3204732174360341', '', -6.99464000, 110.42301000, '', 'Pleburan', 'Se', 'Ko', 'Ja', 'Wiraswasta', '1', '4', NULL, 'https://randomuser.me', '', NULL, NULL),
(14, 0, 0, 'Nenden Karlina', '3204965825319522', '', -6.28723000, 106.80482000, '', 'Cilandak Barat', 'Ci', 'Ja', 'DK', 'Buruh', '1', '3', NULL, 'https://randomuser.me/api/portraits/men/11.jpg', '', NULL, NULL),
(15, 0, 0, 'Asep Sunandar', '3204365773173929', '', -6.28913000, 106.80356000, '', 'Cilandak Barat', 'Ci', 'Ja', 'DK', 'Mahasiswa', '1', '1', NULL, 'https://randomuser.me', '', NULL, NULL),
(16, 0, 0, 'Ai Syarifah', '3204859345719392', '', -6.28628000, 106.80397000, '', 'Cilandak Barat', 'Ci', 'Ja', 'DK', 'Programmer', '3', '1', NULL, 'https://randomuser.me', '', NULL, NULL),
(17, 0, 0, 'Taufik Hidayat', '3204123531652781', '', -7.27962000, 112.75168000, '', 'Airlangga', 'Gu', 'Ko', 'Ja', 'Dosen', '1', '4', NULL, 'https://randomuser.me', '', NULL, NULL),
(18, 0, 0, 'Lilis Karlina', '3204561036048123', '', -7.77098000, 110.38541000, '', 'Caturtunggal', 'De', 'Sl', 'DI', 'Arsitek', '1', '3', NULL, 'https://randomuser.me', '', NULL, NULL),
(19, 0, 0, 'Dadang Suhendar', '3204961026048123', '', -7.27451000, 112.75641000, '', 'Airlangga', 'Gu', 'Ko', 'Ja', 'PNS', '1', '3', NULL, 'https://randomuser.me', '', NULL, NULL),
(20, 0, 0, 'Imas Masitoh', '3204456934271832', '', -6.99451000, 110.42841000, '', 'Pleburan', 'Se', 'Ko', 'Ja', 'Buruh', '1', '3', NULL, 'https://randomuser.me', '', NULL, NULL),
(21, 0, 0, 'Wawan Gunawan', '3204683510260481', '', -6.87451000, 107.67541000, '', 'Cimenyan', 'Ci', 'Ka', 'Ja', 'Programmer', '2', '1', NULL, 'https://randomuser.me', '', NULL, NULL),
(22, 0, 0, 'Siti Nurjanah', '3204961036048555', '', -6.28451000, 106.79541000, '', 'Cilandak Barat', 'Ci', 'Ja', 'DK', 'Dosen', '2', '4', NULL, 'https://randomuser.me', '', NULL, NULL),
(23, 0, 0, 'Ujang Komarudin', '3204961026048332', '', -6.99451000, 110.42841000, '', 'Pleburan', 'Se', 'Ko', 'Ja', 'Programmer', '3', '2', NULL, 'https://randomuser.me', '', NULL, NULL),
(24, 0, 0, 'Eni Rohaeni', '3204961036048111', '', -8.69451000, 115.16541000, '', 'Seminyak', 'Ku', 'Ba', 'Ba', 'Petani', '1', '1', NULL, 'https://randomuser.me', '', NULL, NULL),
(25, 0, 0, 'Iwan Setiawan', '3204561026048999', '', -7.77451000, 110.39541000, '', 'Caturtunggal', 'De', 'Sl', 'DI', 'Dosen', '2', '2', NULL, 'https://randomuser.me', '', NULL, NULL),
(26, 0, 0, 'Yayah Rokayah', '3204961026048777', '', -6.87451000, 107.67541000, '', 'Cimenyan', 'Ci', 'Ka', 'Ja', 'Pedagang', '1', '2', NULL, 'https://randomuser.me', '', NULL, NULL),
(27, 0, 0, 'Maman Abdurahman', '3204961026048551', '', -7.27451000, 112.75541000, '', 'Airlangga', 'Gu', 'Ko', 'Ja', 'Karyawan Swasta', '2', '1', NULL, 'https://randomuser.me', '', NULL, NULL),
(28, 0, 0, 'Rika Kartika', '3204961026048444', '', -5.14451000, 119.41541000, '', 'Maloku', 'Uj', 'Ko', 'Su', 'Sopir', '2', '4', NULL, 'https://randomuser.me', '', NULL, NULL),
(29, 0, 0, 'Dani Ramdani', '3204961026048222', '', -6.28451000, 106.79541000, '', 'Cilandak Barat', 'Ci', 'Ja', 'DK', 'Arsitek', '1', '2', NULL, 'https://randomuser.me', '', NULL, NULL),
(30, 0, 0, 'Cucu Sumiati', '3204961026048119', '', -7.77451000, 110.39541000, '', 'Caturtunggal', 'De', 'Sl', 'DI', 'Sopir', '3', '1', NULL, 'https://randomuser.me', '', NULL, NULL),
(31, 0, 0, 'Jajang Nurjaman', '3204961026048112', '', 3.58451000, 98.66541000, '', 'Merdeka', 'Me', 'Ko', 'Su', 'Wiraswasta', '1', '4', NULL, 'https://randomuser.me', '', NULL, NULL),
(32, 0, 0, 'Tuti Alawiyah', '3204961026048113', '', -6.99451000, 110.42841000, '', 'Pleburan', 'Se', 'Ko', 'Ja', 'Buruh', '1', '1', NULL, 'https://randomuser.me', '', NULL, NULL),
(33, 0, 0, 'Oman Rohman', '3204961026048114', '', -5.14451000, 119.41541000, '', 'Maloku', 'Uj', 'Ko', 'Su', 'PNS', '1', '3', NULL, 'https://randomuser.me', '', NULL, NULL),
(34, 0, 0, 'Euis Komariah', '3204961026048115', '', -8.69451000, 115.16541000, '', 'Seminyak', 'Ku', 'Ba', 'Ba', 'Perawat', '2', '2', NULL, 'https://randomuser.me', '', NULL, NULL),
(35, 0, 0, 'Aang Kunaefi', '3204961026048116', '', -6.28451000, 106.79541000, '', 'Cilandak Barat', 'Ci', 'Ja', 'DK', 'Wiraswasta', '1', '4', NULL, 'https://randomuser.me', '', NULL, NULL),
(36, 0, 0, 'Kokom Komalasari', '3204961026048117', '', -7.77451000, 110.39541000, '', 'Caturtunggal', 'De', 'Sl', 'DI', 'Dosen', '1', '1', NULL, 'https://randomuser.me', '', NULL, NULL),
(37, 0, 0, 'Toto Suharto', '3204961026048118', '', -6.99451000, 110.42841000, '', 'Pleburan', 'Se', 'Ko', 'Ja', 'Sopir', '3', '4', NULL, 'https://randomuser.me', '', NULL, NULL),
(38, 0, 0, 'Neng Siti', '3204961026048121', '', -6.87451000, 107.67541000, '', 'Cimenyan', 'Ci', 'Ka', 'Ja', 'Programmer', '2', '2', NULL, 'https://randomuser.me', '', NULL, NULL),
(39, 0, 0, 'Ade Lesmana', '3204961026048122', '', -6.87451000, 107.67541000, '', 'Cimenyan', 'Ci', 'Ka', 'Ja', 'Mahasiswa', '1', '2', NULL, 'https://randomuser.me', '', NULL, NULL),
(40, 0, 0, 'Yati Maryati', '3204961026048124', '', -7.77451000, 110.39541000, '', 'Caturtunggal', 'De', 'Sl', 'DI', 'PNS', '1', '1', NULL, 'https://randomuser.me', '', NULL, NULL),
(41, 0, 0, 'Endang Wijaya', '3204961026048125', '', 3.58451000, 98.66541000, '', 'Merdeka', 'Me', 'Ko', 'Su', 'Guru', '2', '4', NULL, 'https://randomuser.me', '', NULL, NULL),
(42, 0, 0, 'Ida Farida', '3204961026048126', '', -6.99451000, 110.42841000, '', 'Pleburan', 'Se', 'Ko', 'Ja', 'Perawat', '2', '3', NULL, 'https://randomuser.me', '', NULL, NULL),
(43, 0, 0, 'Yayan Sopian', '3204961026048127', '', -5.14451000, 119.41541000, '', 'Maloku', 'Uj', 'Ko', 'Su', 'Pedagang', '1', '4', NULL, 'https://randomuser.me', '', NULL, NULL),
(44, 0, 0, 'Sumiati', '3204961026048129', '', -7.27451000, 112.75541000, '', 'Airlangga', 'Gu', 'Ko', 'Ja', 'Mahasiswa', '1', '1', NULL, 'https://randomuser.me', '', NULL, NULL),
(45, 0, 0, 'Diki Permana', '3204961026048131', '', -8.69451000, 115.16541000, '', 'Seminyak', 'Ku', 'Ba', 'Ba', 'Buruh', '3', '2', NULL, 'https://randomuser.me', '', NULL, NULL),
(46, 0, 0, 'Cicih Mintarsih', '3204961026048132', '', -8.69451000, 115.16541000, '', 'Seminyak', 'Ku', 'Ba', 'Ba', 'Perawat', '1', '4', NULL, 'https://randomuser.me', '', NULL, NULL),
(47, 0, 0, 'Ginanjar', '3204961026048133', '', -6.87451000, 107.67541000, '', 'Cimenyan', 'Ci', 'Ka', 'Ja', 'Pedagang', '2', '3', NULL, 'https://randomuser.me', '', NULL, NULL),
(48, 0, 0, 'Mira Santika', '3204961026048134', '', -6.28451000, 106.79541000, '', 'Cilandak Barat', 'Ci', 'Ja', 'DK', 'Ibu Rumah Tangga', '2', '2', NULL, 'https://randomuser.me', '', NULL, NULL),
(49, 0, 0, 'Roni Setiawan', '3204961026048135', '', -7.77451000, 110.39541000, '', 'Caturtunggal', 'De', 'Sl', 'DI', 'Dokter', '2', '1', NULL, 'https://randomuser.me', '', NULL, NULL),
(50, 0, 0, 'Titin Supriatin', '3204961026048136', '', 3.58451000, 98.66541000, '', 'Merdeka', 'Me', 'Ko', 'Su', 'Wiraswasta', '1', '4', NULL, 'https://randomuser.me', '', NULL, NULL),
(51, 0, 0, 'Asep Saepudin', '3204961026048137', '', -6.99451000, 110.42841000, '', 'Pleburan', 'Se', 'Ko', 'Ja', 'Buruh', '2', '1', NULL, 'https://randomuser.me', '', NULL, NULL),
(52, 0, 0, 'Yeni Wahyuni', '3204961026048138', '', -6.28451000, 106.79541000, '', 'Cilandak Barat', 'Ci', 'Ja', 'DK', 'Karyawan Swasta', '2', '2', NULL, 'https://randomuser.me', '', NULL, NULL),
(53, 0, 0, 'Bambang Rusdi', '3204961026048139', '', -7.27451000, 112.75541000, '', 'Airlangga', 'Gu', 'Ko', 'Ja', 'PNS', '3', '2', NULL, 'randomuser.me', '', NULL, NULL),
(54, 0, 0, 'Nani Wijaya', '3204961026048141', '', 3.58451000, 98.66541000, '', 'Merdeka', 'Me', 'Ko', 'Su', 'Buruh', '1', '2', NULL, 'randomuser.me', '', NULL, NULL),
(55, 0, 0, 'Agung Nugraha', '3204961026048142', '', -7.77451000, 110.39541000, '', 'Caturtunggal', 'De', 'Sl', 'DI', 'Programmer', '2', '1', NULL, 'randomuser.me', '', NULL, NULL),
(56, 0, 0, 'Dewi Sartika', '3204961026048143', '', -6.28451000, 106.79541000, '', 'Cilandak Barat', 'Ci', 'Ja', 'DK', 'Perawat', '1', '3', NULL, 'randomuser.me', '', NULL, NULL),
(57, 0, 0, 'Anwar Sadat', '3204961026048144', '', -6.87451000, 107.67541000, '', 'Cimenyan', 'Ci', 'Ka', 'Ja', 'Programmer', '2', '4', NULL, 'randomuser.me', '', NULL, NULL),
(58, 0, 0, 'Eka Rosita', '3204961026048145', '', -7.77451000, 110.39541000, '', 'Caturtunggal', 'De', 'Sl', 'DI', 'Dosen', '1', '1', NULL, 'randomuser.me', '', NULL, NULL),
(59, 0, 0, 'Rudi Hermawan', '3204961026048146', '', -6.87451000, 107.67541000, '', 'Cimenyan', 'Ci', 'Ka', 'Ja', 'Wiraswasta', '1', '2', NULL, 'randomuser.me', '', NULL, NULL),
(60, 0, 0, 'Siti Badriah', '3204961026048147', '', -6.28451000, 106.79541000, '', 'Cilandak Barat', 'Ci', 'Ja', 'DK', 'Karyawan Swasta', '2', '2', NULL, 'randomuser.me', '', NULL, NULL),
(61, 0, 0, 'Irfan Hakim', '3204961026048148', '', -7.27451000, 112.75541000, '', 'Airlangga', 'Gu', 'Ko', 'Ja', 'Sopir', '3', '3', NULL, 'randomuser.me', '', NULL, NULL),
(62, 0, 0, 'Lina Marlina', '3204961026048149', '', -7.27451000, 112.75541000, '', 'Airlangga', 'Gu', 'Ko', 'Ja', 'PNS', '1', '1', NULL, 'randomuser.me', '', NULL, NULL),
(63, 0, 0, 'Tedi Kurnia', '3204961026048151', '', -6.87451000, 107.67541000, '', 'Cimenyan', 'Ci', 'Ka', 'Ja', 'Programmer', '2', '4', NULL, 'randomuser.me', '', NULL, NULL),
(64, 0, 0, 'Ayu Tingting', '3204961026048152', '', -7.27451000, 112.75541000, '', 'Airlangga', 'Gu', 'Ko', 'Ja', 'Petani', '1', '1', NULL, 'randomuser.me', '', NULL, NULL),
(65, 0, 0, 'Heri Kiswanto', '3204961026048153', '', -6.99451000, 110.42841000, '', 'Pleburan', 'Se', 'Ko', 'Ja', 'Buruh', '1', '4', NULL, 'randomuser.me', '', NULL, NULL),
(66, 0, 0, 'Oon Suwarman', '3204961026048154', '', -6.99451000, 110.42841000, '', 'Pleburan', 'Se', 'Ko', 'Ja', 'Sopir', '1', '4', NULL, 'randomuser.me', '', NULL, NULL),
(67, 0, 0, 'Yuyun Yuniar', '3204961026048155', '', -6.28451000, 106.79541000, '', 'Cilandak Barat', 'Ci', 'Ja', 'DK', 'Pedagang', '1', '1', NULL, 'randomuser.me', '', NULL, NULL),
(68, 0, 0, 'Boy Iman', '3204961026048156', '', -7.77451000, 110.39541000, '', 'Caturtunggal', 'De', 'Sl', 'DI', 'Buruh', '2', '3', NULL, 'randomuser.me', '', NULL, NULL),
(69, 0, 0, 'Rini Cesaria', '3204961026048157', '', -8.69451000, 115.16541000, '', 'Seminyak', 'Ku', 'Ba', 'Ba', 'Arsitek', '1', '1', NULL, 'randomuser.me', '', NULL, NULL),
(70, 0, 0, 'Yayan Jatnika', '3204961026048158', '', -5.14451000, 119.41541000, '', 'Maloku', 'Uj', 'Ko', 'Su', 'Sopir', '2', '1', NULL, 'randomuser.me', '', NULL, NULL),
(71, 0, 0, 'Doel Sumbang', '3204961026048159', '', -6.28451000, 106.79541000, '', 'Cilandak Barat', 'Ci', 'Ja', 'DK', 'Perawat', '3', '3', NULL, 'randomuser.me', '', NULL, NULL),
(72, 0, 0, 'Nining Meida', '3204961026048161', '', -6.87451000, 107.67541000, '', 'Cimenyan', 'Ci', 'Ka', 'Ja', 'Programmer', '1', '2', NULL, 'randomuser.me', '', NULL, NULL),
(73, 0, 0, 'Asep Balon', '3204961026048162', '', -7.27451000, 112.75541000, '', 'Airlangga', 'Gu', 'Ko', 'Ja', 'PNS', '2', '1', NULL, 'randomuser.me', '', NULL, NULL),
(74, 0, 0, 'Sari Sundari', '3204961026048163', '', -7.27451000, 112.75541000, '', 'Airlangga', 'Gu', 'Ko', 'Ja', 'Ibu Rumah Tangga', '1', '2', NULL, 'randomuser.me', '', NULL, NULL),
(75, 0, 0, 'Deden Darajat', '3204961026048164', '', -6.28451000, 106.79541000, '', 'Cilandak Barat', 'Ci', 'Ja', 'DK', 'Ibu Rumah Tangga', '2', '4', NULL, 'randomuser.me', '', NULL, NULL),
(76, 0, 0, 'Aceng Fikri', '3204961026048165', '', -6.28451000, 106.79541000, '', 'Cilandak Barat', 'Ci', 'Ja', 'DK', 'Programmer', '1', '1', NULL, 'randomuser.me', '', NULL, NULL),
(77, 0, 0, 'Cici Paramida', '3204961026048166', '', -6.99451000, 110.42841000, '', 'Pleburan', 'Se', 'Ko', 'Ja', 'Buruh', '1', '3', NULL, 'randomuser.me', '', NULL, NULL),
(78, 0, 0, 'Komarudin', '3204961026048167', '', -6.28451000, 106.79541000, '', 'Cilandak Barat', 'Ci', 'Ja', 'DK', 'Pedagang', '2', '1', NULL, 'randomuser.me', '', NULL, NULL),
(79, 0, 0, 'Popong Otje', '3204961026048168', '', -6.87451000, 107.67541000, '', 'Cimenyan', 'Ci', 'Ka', 'Ja', 'Arsitek', '1', '4', NULL, 'randomuser.me', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `peserta2`
--

CREATE TABLE `peserta2` (
  `id` int(11) NOT NULL,
  `nama` text NOT NULL,
  `nik` varchar(16) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nomor_telepon` varchar(20) NOT NULL,
  `desa` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `kabupaten_kota` varchar(100) NOT NULL,
  `provinsi` varchar(100) NOT NULL,
  `latitude` decimal(10,8) NOT NULL,
  `longitude` decimal(11,8) NOT NULL,
  `gender` enum('1','2','3') NOT NULL,
  `nikah` enum('1','2','3','4') NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `peserta2`
--

INSERT INTO `peserta2` (`id`, `nama`, `nik`, `email`, `nomor_telepon`, `desa`, `kecamatan`, `kabupaten_kota`, `provinsi`, `latitude`, `longitude`, `gender`, `nikah`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Hendra Wijaya Saputra', '3273852111708199', 'hendrawijayasaputra42@outlook.com', '08158614161', 'Dago', 'Mampang Prapatan', 'Bantul', 'DI Yogyakarta', -7.07921000, 113.88351000, '1', '4', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(2, 'Mega Utami Puspita', '3273811310724416', 'megautamipuspita38@yahoo.com', '08178039443', 'Samaan', 'Serang Barat', 'Surabaya', 'Jawa Timur', -6.74891500, 113.94255300, '2', '2', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(3, 'Anisa Rahma Puspita', '3273552711951408', 'anisarahmapuspita17@outlook.com', '08169627842', 'Samaan', 'Mampang Prapatan', 'Banyumas', 'Jawa Tengah', -7.46880600, 113.53680100, '2', '4', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(4, 'Anisa Rahma', '3273981211952390', 'anisarahma80@yahoo.com', '08177158915', 'Lipur', 'Cibeunying Kaler', 'Banyumas', 'Jawa Tengah', -7.12061700, 106.09054200, '3', '3', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(5, 'Kartika Sari Puspita', '3273962411881545', 'kartikasaripuspita22@yahoo.com', '08146810673', 'Klitren', 'Mampang Prapatan', 'Sidoarjo', 'Jawa Timur', -6.62725400, 111.72863500, '2', '1', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(6, 'Mega Utami', '3273332411921106', 'megautami45@gmail.com', '08129323726', 'Cigadung', 'Sukajadi', 'Surabaya', 'Jawa Timur', -7.04142300, 109.44004000, '3', '2', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(7, 'Anisa Rahma', '3273452112837807', 'anisarahma85@outlook.com', '08181252789', 'Airlangga', 'Mampang Prapatan', 'Surabaya', 'Jawa Timur', -6.91554300, 107.85965500, '3', '4', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(8, 'Fitriani Puspita', '3273261412755955', 'fitrianipuspita46@yahoo.com', '08142429385', 'Airlangga', 'Cibeunying Kaler', 'Surakarta', 'Jawa Tengah', -7.91071100, 111.78724800, '2', '4', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(9, 'Andi Wijaya', '3273681012734221', 'andiwijaya35@outlook.com', '08177933379', 'Airlangga', 'Cibeunying Kaler', 'Yogyakarta', 'DI Yogyakarta', -6.37117600, 112.92554600, '3', '2', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(10, 'Hendra Wijaya', '3273371210734093', 'hendrawijaya74@gmail.com', '08189290969', 'Airlangga', 'Serang Barat', 'Semarang', 'Jawa Tengah', -6.82722300, 111.23917200, '3', '4', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(11, 'Sri Wahyuni Lestari', '3273251511785666', 'sriwahyunilestari45@gmail.com', '08181878747', 'Airlangga', 'Cibeunying Kaler', 'Bantul', 'DI Yogyakarta', -6.13521500, 108.42348000, '2', '1', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(12, 'Siti Aminah', '3273231011936384', 'sitiaminah36@yahoo.com', '08125313083', 'Samaan', 'Cibeunying Kaler', 'Kulon Progo', 'DI Yogyakarta', -6.62415500, 106.36623100, '3', '3', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(13, 'Dedi Suryadi', '3273982210757844', 'dedisuryadi23@gmail.com', '08144254560', 'Pela Mampang', 'Klojen', 'Tangerang', 'Banten', -7.27362700, 106.74786800, '3', '3', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(14, 'Andi Wijaya Santoso', '3273811712944706', 'andiwijayasantoso12@outlook.com', '08154043284', 'Klitren', 'Serang Barat', 'Jakarta Timur', 'DKI Jakarta', -7.28171800, 110.21238300, '1', '1', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(15, 'Siti Aminah Rahayu', '3273671312899848', 'sitiaminahrahayu48@outlook.com', '08146418101', 'Lipur', 'Sukajadi', 'Tangerang', 'Banten', -7.93200500, 106.96153000, '2', '2', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(16, 'Ahmad Fauzi Saputra', '3273541512941893', 'ahmadfauzisaputra22@outlook.com', '08116371316', 'Sukawarna', 'Tegalrejo', 'Semarang', 'Jawa Tengah', -7.11791700, 108.60556300, '1', '2', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(17, 'Hendra Wijaya Saputra', '3273212711862393', 'hendrawijayasaputra47@gmail.com', '08168004703', 'Airlangga', 'Serang Barat', 'Sleman', 'DI Yogyakarta', -7.05331700, 112.84807800, '1', '4', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(18, 'Ahmad Fauzi Prabowo', '3273211711931721', 'ahmadfauziprabowo17@yahoo.com', '08134481095', 'Pela Mampang', 'Coblong', 'Banyumas', 'Jawa Tengah', -6.66715800, 110.40497300, '1', '1', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(19, 'Slamet Rahardjo', '3273562812788635', 'slametrahardjo79@yahoo.com', '08126280827', 'Airlangga', 'Tegalrejo', 'Serang', 'Banten', -7.70347400, 108.40025600, '3', '2', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(20, 'Agus Setiawan Kurniawan', '3273871710734697', 'agussetiawankurniawan74@gmail.com', '08169622368', 'Airlangga', 'Tegalrejo', 'Surabaya', 'Jawa Timur', -6.15109500, 110.87028000, '1', '4', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(21, 'Budi Utomo Santoso', '3273110204850001', 'budi.utomo.s@gmail.com', '081234567890', 'Cigadung', 'Cibeunying Kaler', 'Bandung', 'Jawa Barat', -6.88350000, 107.62580000, '1', '2', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(22, 'Siti Nurhaliza', '3273124508920003', 'siti.nur92@yahoo.com', '081572113344', 'Dago', 'Coblong', 'Bandung', 'Jawa Barat', -6.87420000, 107.61890000, '2', '1', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(23, 'Eko Prasetyo', '3578011211880005', 'eko.prasetyo@outlook.com', '081398765432', 'Gubeng', 'Gubeng', 'Surabaya', 'Jawa Timur', -7.27540000, 112.75340000, '1', '3', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(24, 'Dewi Lestari', '3173055506900002', 'dewi.lestari@gmail.com', '081122334455', 'Menteng', 'Menteng', 'Jakarta Pusat', 'DKI Jakarta', -6.19560000, 106.83240000, '2', '2', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(25, 'Rian Hidayat', '3204112308950007', 'rian.hidayat@hotmail.com', '085712345678', 'Sayati', 'Margahayu', 'Bandung', 'Jawa Barat', -6.97440000, 107.57320000, '3', '4', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(26, 'Rina Wijayanti', '3374026110930004', 'rina.wijaya@gmail.com', '081901234567', 'Pleburan', 'Semarang Selatan', 'Semarang', 'Jawa Tengah', -7.00120000, 110.42310000, '2', '1', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(27, 'Agus Supriatna', '3273151708750009', 'agus.supri@yahoo.com', '082114556677', 'Sukagalih', 'Sukajadi', 'Bandung', 'Jawa Barat', -6.89120000, 107.58940000, '1', '2', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(28, 'Santi Susanti', '3175044403910001', 'santi.susanti@gmail.com', '081299887766', 'Kelapa Gading Timur', 'Kelapa Gading', 'Jakarta Utara', 'DKI Jakarta', -6.16230000, 106.90880000, '2', '3', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(29, 'Joko Widodo', '3311092106610002', 'joko.widodo@outlook.com', '081355443322', 'Manahan', 'Banjarsari', 'Surakarta', 'Jawa Tengah', -7.55320000, 110.81140000, '1', '2', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(30, 'Sri Mulyani', '3515024210620005', 'sri.mulyani@gmail.com', '081766554433', 'Krian', 'Krian', 'Sidoarjo', 'Jawa Timur', -7.40420000, 112.58560000, '2', '2', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(31, 'Hendra Kurniawan', '3273021405890008', 'hendra.kurnia@yahoo.com', '085222334455', 'Isola', 'Sukasari', 'Bandung', 'Jawa Barat', -6.86010000, 107.59320000, '1', '1', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(32, 'Megawati Soekarno', '3171034301470001', 'megawati.s@outlook.com', '081188990011', 'Kebagusan', 'Pasar Minggu', 'Jakarta Selatan', 'DKI Jakarta', -6.30250000, 106.82940000, '2', '4', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(33, 'Andi Wijaya', '7371101503900004', 'andi.wijaya@gmail.com', '081244556677', 'Malimongan', 'Wajo', 'Makassar', 'Sulawesi Selatan', -5.12340000, 119.41230000, '1', '2', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(34, 'Yanti Rahmawati', '3204356211870006', 'yanti.rahma@yahoo.com', '087811223344', 'Baleendah', 'Baleendah', 'Bandung', 'Jawa Barat', -7.01250000, 107.63210000, '2', '3', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(35, 'Taufik Hidayat', '3273221008810003', 'taufik.h@gmail.com', '081388776655', 'Sadang Serang', 'Coblong', 'Bandung', 'Jawa Barat', -6.88940000, 107.62120000, '3', '2', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(36, 'Lilis Suryani', '1271025112940002', 'lilis.suryani@gmail.com', '081260607070', 'Merdeka', 'Medan Baru', 'Medan', 'Sumatera Utara', 3.57890000, 98.66540000, '2', '1', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(37, 'Bambang Pamungkas', '3174061006800005', 'bambang.p10@yahoo.com', '081511223344', 'Lebak Bulus', 'Cilandak', 'Jakarta Selatan', 'DKI Jakarta', -6.30120000, 106.78120000, '1', '2', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(38, 'Ani Yudhoyono', '3204094607520001', 'ani.yudho@outlook.com', '081199887766', 'Cikeas', 'Gunung Putri', 'Bogor', 'Jawa Barat', -6.42340000, 106.91230000, '2', '4', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(39, 'Rudi Hartono', '3578051805490003', 'rudi.hartono@gmail.com', '081333445566', 'Gundih', 'Bubutan', 'Surabaya', 'Jawa Timur', -7.24320000, 112.72980000, '1', '2', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(40, 'Yuni Shara', '3573014306720008', 'yuni.shara@yahoo.com', '081722334455', 'Sisir', 'Batu', 'Batu', 'Jawa Timur', -7.87120000, 112.52340000, '2', '3', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(41, 'Dedi Mulyadi', '3214011104710002', 'dedi.mulyadi@gmail.com', '081288779900', 'Sawah Kulon', 'Pasawahan', 'Purwakarta', 'Jawa Barat', -6.53420000, 107.45230000, '1', '2', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(42, 'Iriana Jokowi', '3372014110630004', 'iriana.j@outlook.com', '081344332211', 'Sumber', 'Banjarsari', 'Surakarta', 'Jawa Tengah', -7.54210000, 110.80120000, '2', '2', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(43, 'Gibran Rakabuming', '3372010110870001', 'gibran.r@gmail.com', '081277665544', 'Manahan', 'Banjarsari', 'Surakarta', 'Jawa Tengah', -7.55110000, 110.81010000, '3', '2', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(44, 'Kahiyang Ayu', '3372016004910003', 'kahiyang.a@yahoo.com', '081566554433', 'Sumber', 'Banjarsari', 'Surakarta', 'Jawa Tengah', -7.54250000, 110.80180000, '2', '2', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(45, 'Kaesang Pangarep', '3372012512940005', 'kaesang.p@outlook.com', '081988776655', 'Purwosari', 'Laweyan', 'Surakarta', 'Jawa Tengah', -7.56120000, 110.79120000, '1', '2', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(46, 'Prabowo Subianto', '3171011710510002', 'prabowo.s@gmail.com', '081177665544', 'Senayan', 'Kebayoran Baru', 'Jakarta Selatan', 'DKI Jakarta', -6.22340000, 106.80120000, '1', '1', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(47, 'Ganjar Pranowo', '3328112810680003', 'ganjar.p@yahoo.com', '081266554433', 'Kutoarjo', 'Kutoarjo', 'Purworejo', 'Jawa Tengah', -7.71450000, 109.91230000, '1', '2', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(48, 'Anies Baswedan', '3171040705690001', 'anies.b@outlook.com', '081399887766', 'Lebak Bulus', 'Cilandak', 'Jakarta Selatan', 'DKI Jakarta', -6.30320000, 106.78230000, '1', '2', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(49, 'Puan Maharani', '3171034609730005', 'puan.m@gmail.com', '081155443322', 'Kebagusan', 'Pasar Minggu', 'Jakarta Selatan', 'DKI Jakarta', -6.30150000, 106.82840000, '2', '2', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(50, 'Muhaimin Iskandar', '3522102409660002', 'cak.imin@yahoo.com', '081244332211', 'Denanyar', 'Jombang', 'Jombang', 'Jawa Timur', -7.54320000, 112.22120000, '3', '2', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(51, 'Mahfud MD', '3529041305570001', 'mahfud.md@outlook.com', '081388776655', 'Omben', 'Omben', 'Sampang', 'Jawa Timur', -7.12340000, 113.31230000, '1', '2', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(52, 'Luhut Pandjaitan', '1209042809470003', 'luhut.p@gmail.com', '081122334455', 'Simargala', 'Silaen', 'Toba Samosir', 'Sumatera Utara', 2.41230000, 99.21230000, '1', '2', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(53, 'Erick Thohir', '3171023005700004', 'erick.t@yahoo.com', '081255667788', 'Menteng', 'Menteng', 'Jakarta Pusat', 'DKI Jakarta', -6.19450000, 106.83120000, '1', '2', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(54, 'Sandiaga Uno', '3171042806690002', 'sandi.uno@outlook.com', '081366778899', 'Selong', 'Kebayoran Baru', 'Jakarta Selatan', 'DKI Jakarta', -6.23450000, 106.81230000, '3', '2', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(55, 'Ridwan Kamil', '3273240410710006', 'ridwan.kamil@gmail.com', '081133445566', 'Cigadung', 'Cibeunying Kaler', 'Bandung', 'Jawa Barat', -6.88210000, 107.62450000, '1', '2', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(56, 'Khofifah Indar', '3578105905650001', 'khofifah.ip@yahoo.com', '081211223344', 'Jemur Wonosari', 'Wonocolo', 'Surabaya', 'Jawa Timur', -7.31450000, 112.74120000, '2', '4', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(57, 'Andika Perkasa', '3171012112640003', 'andika.p@outlook.com', '081144556677', 'Senayan', 'Kebayoran Baru', 'Jakarta Selatan', 'DKI Jakarta', -6.22120000, 106.80230000, '1', '2', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(58, 'Yudo Margono', '3522142611650002', 'yudo.m@gmail.com', '081377889900', 'Garon', 'Balerejo', 'Madiun', 'Jawa Timur', -7.53210000, 111.61230000, '1', '2', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(59, 'Listyo Sigit', '3302110505690004', 'listyo.s@yahoo.com', '081288990011', 'Purwokerto Lor', 'Purwokerto Timur', 'Banyumas', 'Jawa Tengah', -7.42120000, 109.24320000, '1', '2', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(60, 'Firli Bahuri', '1607040811630001', 'firli.b@outlook.com', '081399001122', 'Lontar', 'Muara Jaya', 'Ogan Komering Ulu', 'Sumatera Selatan', -4.12340000, 104.21230000, '3', '2', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(61, 'Anwar Usman', '5206013112560003', 'anwar.u@gmail.com', '081211335577', 'Sape', 'Sape', 'Bima', 'Nusa Tenggara Barat', -8.54320000, 119.01230000, '1', '2', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(62, 'Su Hartoyo', '3404051511530002', 'su.hartoyo@yahoo.com', '081322446688', 'Sinduharjo', 'Ngaglik', 'Sleman', 'DI Yogyakarta', -7.71230000, 110.39450000, '1', '2', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(63, 'Saldi Isra', '1306052008680004', 'saldi.isra@outlook.com', '081233557799', 'Paninggahan', 'Junjung Sirih', 'Solok', 'Sumatera Barat', -0.64320000, 100.51230000, '1', '2', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(64, 'Arief Hidayat', '3374030302560001', 'arief.h@gmail.com', '081344668800', 'Plombokan', 'Semarang Utara', 'Semarang', 'Jawa Tengah', -6.96450000, 110.41230000, '3', '2', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(65, 'Daniel Foekh', '5371021504750002', 'daniel.f@yahoo.com', '081255779911', 'Oebobo', 'Oebobo', 'Kupang', 'Nusa Tenggara Timur', -10.17450000, 123.61230000, '1', '1', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(66, 'Nadiem Makarim', '3171020407840006', 'nadiem.m@outlook.com', '081166880022', 'Selong', 'Kebayoran Baru', 'Jakarta Selatan', 'DKI Jakarta', -6.23120000, 106.81450000, '1', '2', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(67, 'Budi Gunadi', '3273120605640003', 'budi.g@gmail.com', '081177991133', 'Sadang Serang', 'Coblong', 'Bandung', 'Jawa Barat', -6.88780000, 107.62340000, '1', '2', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(68, 'Retno Marsudi', '3374016711620001', 'retno.m@yahoo.com', '081288002244', 'Randusari', 'Semarang Selatan', 'Semarang', 'Jawa Tengah', -6.99120000, 110.41450000, '2', '2', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(69, 'Sri Mulyani Indrawati', '3515024210620009', 'sri.mulyani.i@outlook.com', '081399113355', 'Krian', 'Krian', 'Sidoarjo', 'Jawa Timur', -7.40550000, 112.58440000, '2', '2', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(70, 'Basuki Hadimuljono', '3175020511540002', 'basuki.h@gmail.com', '081100224466', 'Pondok Kelapa', 'Duren Sawit', 'Jakarta Timur', 'DKI Jakarta', -6.23120000, 106.93450000, '1', '2', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(71, 'Yasonna Laoly', '1204053001530005', 'yasonna.l@yahoo.com', '081211224455', 'Soganidu', 'Gido', 'Nias', 'Sumatera Utara', 1.12340000, 97.61230000, '3', '2', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(72, 'Syahrul Yasin', '7306021603550001', 'syahrul.yp@outlook.com', '081322335566', 'Lette', 'Mariso', 'Makassar', 'Sulawesi Selatan', -5.15450000, 119.40120000, '1', '2', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(73, 'Agus Gumiwang', '3171031704690004', 'agus.g@gmail.com', '081133446677', 'Melawai', 'Kebayoran Baru', 'Jakarta Selatan', 'DKI Jakarta', -6.24120000, 106.80450000, '1', '2', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(74, 'Arifin Tasrif', '3171021906530002', 'arifin.t@yahoo.com', '081244557788', 'Menteng', 'Menteng', 'Jakarta Pusat', 'DKI Jakarta', -6.19120000, 106.83450000, '1', '2', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(75, 'Bahlil Lahadalia', '9201020708760003', 'bahlil.l@outlook.com', '081355668899', 'F确认', 'Banda', 'Maluku Tengah', 'Maluku', -4.52340000, 129.90120000, '1', '2', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(76, 'Zulkifli Hasan', '1801051705620001', 'zul.hasan@gmail.com', '081166779900', 'Pisang', 'Penengahan', 'Lampung Selatan', 'Lampung', -5.71230000, 105.71230000, '1', '2', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(77, 'Tito Karnavian', '1671042610640005', 'tito.k@yahoo.com', '081277880011', 'Palembang', 'Ilir Barat I', 'Palembang', 'Sumatera Selatan', -2.98780000, 104.75450000, '3', '2', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(78, 'Ida Fauziyah', '3515115607690002', 'ida.f@outlook.com', '081388991122', 'Geluran', 'Taman', 'Sidoarjo', 'Jawa Timur', -7.34560000, 112.68450000, '2', '2', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(79, 'Abdul Halim', '3522101905620004', 'abdul.halim@gmail.com', '081199002233', 'Denanyar', 'Jombang', 'Jombang', 'Jawa Timur', -7.54120000, 112.22340000, '1', '2', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(80, 'Siti Nurbaya', '3175014808560001', 'siti.nurbaya@yahoo.com', '081200113344', 'Kayu Putih', 'Pulo Gadung', 'Jakarta Timur', 'DKI Jakarta', -6.18450000, 106.88120000, '2', '2', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(81, 'Johnny Plate', '5310051009560003', 'johnny.p@outlook.com', '081311224455', 'Reo', 'Reok', 'Manggarai', 'Nusa Tenggara Timur', -8.31230000, 120.45450000, '1', '2', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(82, 'Suharso Monoarfa', '7571012603540002', 'suharso.m@gmail.com', '081122335566', 'Limba U Dua', 'Kota Selatan', 'Gorontalo', 'Gorontalo', 0.53420000, 123.06120000, '3', '3', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(83, 'Sofyan Djalil', '1106032309530005', 'sofyan.d@yahoo.com', '081233446677', 'Peureulak', 'Peureulak', 'Aceh Timur', 'Aceh', 4.84320000, 97.88120000, '1', '2', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(84, 'Tjahjo Kumolo', '3374020112570001', 'tjahjo.k@outlook.com', '081344557788', 'Mlatiharjo', 'Semarang Timur', 'Semarang', 'Jawa Tengah', -6.97890000, 110.43450000, '1', '4', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(85, 'Pramono Anung', '3517011106630004', 'pramono.a@gmail.com', '081155668899', 'Karangrejo', 'Ng asem', 'Kediri', 'Jawa Timur', -7.80120000, 112.02340000, '1', '2', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(86, 'Yainuddin Amin', '6471011508650002', 'zainuddin.a@yahoo.com', '081266779900', 'Klandasan Ilir', 'Balikpapan Kota', 'Balikpapan', 'Kalimantan Timur', -1.26450000, 116.83120000, '1', '2', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(87, 'Muhadjir Effendy', '3573022907560003', 'muhadjir.e@outlook.com', '081377880011', 'Lowokwaru', 'Lowokwaru', 'Malang', 'Jawa Timur', -7.94560000, 112.62340000, '3', '2', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(88, 'Airlangga Hartarto', '3171030110620005', 'airlangga.h@gmail.com', '081188991122', 'Melawai', 'Kebayoran Baru', 'Jakarta Selatan', 'DKI Jakarta', -6.24450000, 106.80120000, '1', '2', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(89, 'Moeldoko', '3506110807570002', 'moeldoko@yahoo.com', '081299002233', 'Pesing', 'Purwoasri', 'Kediri', 'Jawa Timur', -7.64320000, 112.10120000, '1', '2', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(90, 'Hasanuddin', '7371110508600004', 'hasanuddin@outlook.com', '081300113344', 'Tamamaung', 'Panakkukang', 'Makassar', 'Sulawesi Selatan', -5.14120000, 119.43450000, '1', '2', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(91, 'Suwardi', '3404061203550001', 'suwardi@gmail.com', '081111224455', 'Caturtunggal', 'Depok', 'Sleman', 'DI Yogyakarta', -7.77890000, 110.39120000, '1', '2', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(92, 'Fatmawati', '1771025405230002', 'fatmawati@yahoo.com', '081222335566', 'Penurunan', 'Ratu Samban', 'Bengkulu', 'Bengkulu', -3.80120000, 102.26120000, '2', '4', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(93, 'Sutan Sjahrir', '1371010503090003', 'sutan.s@outlook.com', '081333446677', 'Kampung Jao', 'Padang Barat', 'Padang', 'Sumatera Barat', -0.94120000, 100.36120000, '1', '4', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(94, 'Tan Malaka', '1302030206970005', 'tan.malaka@gmail.com', '081144557788', 'Pandam Gadang', 'Gunuang Omeh', 'Lima Puluh Kota', 'Sumatera Barat', 0.02340000, 100.39120000, '3', '1', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26'),
(95, 'Mohammad Hatta', '1375011208020001', 'bung.hatta@yahoo.com', '081255668899', 'Aur Kuning', 'Aur Birugo Tigo Baleh', 'Bukittinggi', 'Sumatera Barat', -0.31230000, 100.38120000, '1', '4', '2026-06-21 23:40:26', '2026-06-21 23:40:26', '2026-06-21 23:40:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `program`
--

CREATE TABLE `program` (
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
  `image` varchar(250) NOT NULL,
  `tayang` int(5) NOT NULL,
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
-- Dumping data untuk tabel `program`
--

INSERT INTO `program` (`id`, `id_hirarki`, `id_status`, `judul`, `tentang`, `jenis_peradilan`, `tempat_penetapan`, `pemrakarsa`, `nomor`, `sumber`, `tgl_terbit`, `aktif`, `pdf`, `image`, `tayang`, `abstrak`, `kata_kunci`, `bahasaa`, `created_at`, `updated_at`, `deleted_at`, `file_name`, `file_path`, `file_type`) VALUES
(1, 1, 1, '', '', 0, '0', '', 'sdsfh/54/yu/877', 0, '2026-06-24', 0, '', '', 0, '', '', '', '2026-06-10 21:45:00', '2026-06-10 21:45:00', '2026-06-10 21:45:00', '', '', ''),
(2, 2, 1, '', '', 0, '0', '', '2323wee', 0, '2026-06-24', 0, '', '', 0, '', '', '', '2026-06-10 22:22:39', '2026-06-10 22:22:39', '2026-06-10 22:22:39', '', '', ''),
(3, 3, 2, '', '56hghryuytjjghjhgjhjhjjjhhh', 0, '0', '', 'asas2434', 0, '2026-06-11', 0, '', '', 0, '', '', '', '2026-06-11 11:00:51', '2026-06-11 11:00:51', '2026-06-11 18:00:51', '', '', ''),
(4, 4, 4, '', 'bvmcgkhjkhk', 0, '0', '', 'dfggfgf', 0, '2026-06-07', 0, '', '', 0, '', '', '', '2026-06-11 11:05:31', '2026-06-11 11:05:31', '2026-06-11 18:05:31', '', '', ''),
(5, 5, 3, '', 'uyuyhjhj', 0, '0', '', 'yttyytyt', 0, '2026-06-10', 0, '', '', 0, '', '', '', '2026-06-11 11:10:56', '2026-06-11 11:10:56', '2026-06-11 18:10:56', '', '', ''),
(6, 10, 0, '', 'tytyyyt', 0, '', '', 'ghh', 0, '2026-06-08', 0, '', '', 0, '', '', '', '2026-06-12 16:09:00', '2026-06-12 16:09:00', '2026-06-12 23:09:00', '', '', '');

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
  `image` varchar(250) NOT NULL,
  `tayang` int(5) NOT NULL,
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

INSERT INTO `regulasi` (`id`, `id_hirarki`, `id_status`, `judul`, `tentang`, `jenis_peradilan`, `tempat_penetapan`, `pemrakarsa`, `nomor`, `sumber`, `tgl_terbit`, `aktif`, `pdf`, `image`, `tayang`, `abstrak`, `kata_kunci`, `bahasaa`, `created_at`, `updated_at`, `deleted_at`, `file_name`, `file_path`, `file_type`) VALUES
(1, 1, 1, '', '', 0, '0', '', 'sdsfh/54/yu/877', 0, '2026-06-24', 0, '', '', 0, '', '', '', '2026-06-10 21:45:00', '2026-06-10 21:45:00', '2026-06-10 21:45:00', '', '', ''),
(2, 2, 1, '', '', 0, '0', '', '2323wee', 0, '2026-06-24', 0, '', '', 0, '', '', '', '2026-06-10 22:22:39', '2026-06-10 22:22:39', '2026-06-10 22:22:39', '', '', ''),
(3, 3, 2, '', '56hghryuytjjghjhgjhjhjjjhhh', 0, '0', '', 'asas2434', 0, '2026-06-11', 0, '', '', 0, '', '', '', '2026-06-11 11:00:51', '2026-06-11 11:00:51', '2026-06-11 18:00:51', '', '', ''),
(4, 4, 4, '', 'bvmcgkhjkhk', 0, '0', '', 'dfggfgf', 0, '2026-06-07', 0, '', '', 0, '', '', '', '2026-06-11 11:05:31', '2026-06-11 11:05:31', '2026-06-11 18:05:31', '', '', ''),
(5, 5, 3, '', 'uyuyhjhj', 0, '0', '', 'yttyytyt', 0, '2026-06-10', 0, '', '', 0, '', '', '', '2026-06-11 11:10:56', '2026-06-11 11:10:56', '2026-06-11 18:10:56', '', '', ''),
(6, 10, 0, '', 'tytyyyt', 0, '', '', 'ghh', 0, '2026-06-08', 0, '', '', 0, '', '', '', '2026-06-12 16:09:00', '2026-06-12 16:09:00', '2026-06-12 23:09:00', '', '', '');

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
(1, 'Berlaku/Aktif', '0', '2026-06-12 00:19:40', '2026-06-12 00:19:40', '2026-06-12 00:19:40'),
(2, 'Dicabut/Dibatalkan', '0', '2026-06-12 00:19:40', '2026-06-12 00:19:40', '2026-06-12 00:19:40'),
(3, 'Diubah', '0', '2026-06-12 00:19:40', '2026-06-12 00:19:40', '2026-06-12 00:19:40'),
(4, 'Mencabut Peraturan Sebelumnya', '0', '2026-06-12 00:19:40', '2026-06-12 00:19:40', '2026-06-12 00:19:40'),
(5, 'Dikesampingkan', '', '2026-06-18 02:21:23', '2026-06-18 02:21:23', '2026-06-18 02:21:23'),
(6, 'Kedaluwarsa', '', '2026-06-18 02:23:16', '2026-06-18 02:23:16', '2026-06-18 02:23:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `synthetic_data_2026_07_01__4_`
--

CREATE TABLE `synthetic_data_2026_07_01__4_` (
  `COL 1` varchar(9) DEFAULT NULL,
  `COL 2` varchar(36) DEFAULT NULL,
  `COL 3` varchar(13) DEFAULT NULL,
  `COL 4` varchar(14) DEFAULT NULL,
  `COL 5` varchar(16) DEFAULT NULL,
  `COL 6` varchar(10) DEFAULT NULL,
  `COL 7` varchar(16) DEFAULT NULL,
  `COL 8` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `synthetic_data_2026_07_01__4_`
--

INSERT INTO `synthetic_data_2026_07_01__4_` (`COL 1`, `COL 2`, `COL 3`, `COL 4`, `COL 5`, `COL 6`, `COL 7`, `COL 8`) VALUES
('number_id', 'image_profile', 'employee_id', 'name', 'unit', 'tgl_lahir', 'foreign_id', 'address'),
('1', 'https://example.com/profile/0001.jpg', 'EMP-2012-0001', 'Putri Setiawan', 'Finance', '1997-06-05', '6873434634363435', 'Jl. Merdeka No. 124, Denpasar'),
('2', 'https://example.com/profile/0002.jpg', 'EMP-2018-0002', 'Agus Dewi', 'Marketing', '1977-10-02', '5794179008141990', 'Jl. Gajah Mada No. 53, Makassar'),
('3', 'https://example.com/profile/0003.jpg', 'EMP-2022-0003', 'Rio Indah', 'Sales', '1992-01-05', '4351009191049122', 'Jl. Sudirman No. 144, Malang'),
('4', 'https://example.com/profile/0004.jpg', 'EMP-2013-0004', 'Putri Setiawan', 'Finance', '1973-01-01', '5518720384281402', 'Jl. Merdeka No. 36, Malang'),
('5', 'https://example.com/profile/0005.jpg', 'EMP-2013-0005', 'Putri Fauzi', 'Legal', '1999-10-31', '9594711987477218', 'Jl. Thamrin No. 94, Yogyakarta'),
('6', 'https://example.com/profile/0006.jpg', 'EMP-2020-0006', 'Agus Utami', 'R&D', '1999-05-04', '6843114886931324', 'Jl. Diponegoro No. 25, Surabaya'),
('7', 'https://example.com/profile/0007.jpg', 'EMP-2017-0007', 'Eko Setiawan', 'R&D', '1973-10-12', '7788847424545826', 'Jl. Pahlawan No. 41, Jakarta'),
('8', 'https://example.com/profile/0008.jpg', 'EMP-2015-0008', 'Joko Utami', 'Marketing', '1974-04-14', '9518533434414551', 'Jl. Merdeka No. 31, Jakarta'),
('9', 'https://example.com/profile/0009.jpg', 'EMP-2021-0009', 'Sri Nugroho', 'Finance', '1974-06-13', '1546187092274314', 'Jl. Kartini No. 145, Medan'),
('10', 'https://example.com/profile/0010.jpg', 'EMP-2015-0010', 'Rio Putra', 'Marketing', '1991-04-25', '5173233741094164', 'Jl. Ahmad Yani No. 33, Medan'),
('11', 'https://example.com/profile/0011.jpg', 'EMP-2012-0011', 'Nur Fauzi', 'Production', '1983-07-12', '9683682736819399', 'Jl. Diponegoro No. 113, Denpasar'),
('12', 'https://example.com/profile/0012.jpg', 'EMP-2014-0012', 'Rina Lestari', 'Marketing', '1990-08-19', '4241396853822125', 'Jl. Asia Afrika No. 119, Bandung'),
('13', 'https://example.com/profile/0013.jpg', 'EMP-2021-0013', 'Rina Pratama', 'Operations', '1986-04-17', '5582667893625541', 'Jl. Gajah Mada No. 16, Surabaya'),
('14', 'https://example.com/profile/0014.jpg', 'EMP-2013-0014', 'Rudi Rahayu', 'HRD', '1993-09-07', '9610497127103677', 'Jl. Thamrin No. 17, Medan'),
('15', 'https://example.com/profile/0015.jpg', 'EMP-2017-0015', 'Citra Pratama', 'Marketing', '1994-04-16', '9048208689703981', 'Jl. Gatot Subroto No. 8, Surabaya'),
('16', 'https://example.com/profile/0016.jpg', 'EMP-2011-0016', 'Rina Wati', 'Production', '1976-11-27', '2370299711590180', 'Jl. Diponegoro No. 133, Malang'),
('17', 'https://example.com/profile/0017.jpg', 'EMP-2012-0017', 'Putri Fauzi', 'Production', '1972-03-05', '1041767812327570', 'Jl. Kartini No. 52, Bandung'),
('18', 'https://example.com/profile/0018.jpg', 'EMP-2020-0018', 'Ani Wati', 'Operations', '1981-02-13', '8628037192714047', 'Jl. Gajah Mada No. 58, Malang'),
('19', 'https://example.com/profile/0019.jpg', 'EMP-2013-0019', 'Andi Indah', 'Production', '1989-12-08', '4918676456211029', 'Jl. Pahlawan No. 146, Bandung'),
('20', 'https://example.com/profile/0020.jpg', 'EMP-2020-0020', 'Nur Wijaya', 'Legal', '1980-11-07', '6696264789001966', 'Jl. Ahmad Yani No. 46, Makassar'),
('21', 'https://example.com/profile/0021.jpg', 'EMP-2023-0021', 'Ani Permata', 'Finance', '1993-03-08', '3801141828988385', 'Jl. Asia Afrika No. 26, Yogyakarta'),
('22', 'https://example.com/profile/0022.jpg', 'EMP-2015-0022', 'Ani Wati', 'Production', '1982-06-03', '6811200638257183', 'Jl. Diponegoro No. 126, Jakarta'),
('23', 'https://example.com/profile/0023.jpg', 'EMP-2018-0023', 'Dian Setiawan', 'Sales', '1994-04-03', '3435114982298642', 'Jl. Gajah Mada No. 146, Medan'),
('24', 'https://example.com/profile/0024.jpg', 'EMP-2012-0024', 'Fajar Fauzi', 'Finance', '1987-01-11', '8609804352639488', 'Jl. Ahmad Yani No. 35, Palembang'),
('25', 'https://example.com/profile/0025.jpg', 'EMP-2022-0025', 'Lia Sari', 'Finance', '1990-02-12', '1887548847160224', 'Jl. Gajah Mada No. 135, Makassar'),
('26', 'https://example.com/profile/0026.jpg', 'EMP-2023-0026', 'Andi Pratama', 'Legal', '1982-06-26', '1769784867264372', 'Jl. Asia Afrika No. 26, Denpasar'),
('27', 'https://example.com/profile/0027.jpg', 'EMP-2013-0027', 'Dewi Dewi', 'Finance', '1970-07-20', '6217551612550977', 'Jl. Gatot Subroto No. 3, Jakarta'),
('28', 'https://example.com/profile/0028.jpg', 'EMP-2019-0028', 'Dewi Lestari', 'IT', '1994-11-12', '2152292955386153', 'Jl. Diponegoro No. 125, Semarang'),
('29', 'https://example.com/profile/0029.jpg', 'EMP-2020-0029', 'Eko Rahayu', 'Customer Service', '1988-03-05', '3449760826796268', 'Jl. Thamrin No. 64, Makassar'),
('30', 'https://example.com/profile/0030.jpg', 'EMP-2010-0030', 'Rina Anggraini', 'Customer Service', '1999-07-09', '5766769800135369', 'Jl. Ahmad Yani No. 72, Denpasar'),
('31', 'https://example.com/profile/0031.jpg', 'EMP-2022-0031', 'Lia Rahayu', 'Sales', '1982-06-29', '9785000146061332', 'Jl. Sudirman No. 35, Palembang'),
('32', 'https://example.com/profile/0032.jpg', 'EMP-2023-0032', 'Siti Pratama', 'Operations', '1974-08-09', '3964748941716774', 'Jl. Pahlawan No. 121, Surabaya'),
('33', 'https://example.com/profile/0033.jpg', 'EMP-2019-0033', 'Nur Wijaya', 'HRD', '1989-03-23', '9758188835186132', 'Jl. Kartini No. 115, Makassar'),
('34', 'https://example.com/profile/0034.jpg', 'EMP-2012-0034', 'Putri Kusuma', 'Production', '2000-10-19', '5508127737425340', 'Jl. Gajah Mada No. 127, Medan'),
('35', 'https://example.com/profile/0035.jpg', 'EMP-2016-0035', 'Dewi Sari', 'HRD', '1997-11-27', '1676491242444434', 'Jl. Gatot Subroto No. 17, Medan'),
('36', 'https://example.com/profile/0036.jpg', 'EMP-2023-0036', 'Sri Utami', 'Finance', '1991-03-13', '9942136752072158', 'Jl. Merdeka No. 90, Surabaya'),
('37', 'https://example.com/profile/0037.jpg', 'EMP-2016-0037', 'Nur Setiawan', 'IT', '1996-10-15', '6688704932310092', 'Jl. Kartini No. 131, Surabaya'),
('38', 'https://example.com/profile/0038.jpg', 'EMP-2017-0038', 'Joko Wati', 'Marketing', '1972-12-14', '1100089842411636', 'Jl. Ahmad Yani No. 37, Yogyakarta'),
('39', 'https://example.com/profile/0039.jpg', 'EMP-2019-0039', 'Andi Sari', 'R&D', '1978-02-19', '9390160196973599', 'Jl. Ahmad Yani No. 77, Semarang'),
('40', 'https://example.com/profile/0040.jpg', 'EMP-2022-0040', 'Budi Pratama', 'Finance', '1992-05-25', '9126825951656598', 'Jl. Sudirman No. 7, Denpasar'),
('41', 'https://example.com/profile/0041.jpg', 'EMP-2015-0041', 'Andi Pratama', 'R&D', '1995-08-09', '6940380612799794', 'Jl. Sudirman No. 46, Semarang'),
('42', 'https://example.com/profile/0042.jpg', 'EMP-2014-0042', 'Joko Permata', 'Finance', '1994-08-23', '8985581246342219', 'Jl. Gajah Mada No. 73, Medan'),
('43', 'https://example.com/profile/0043.jpg', 'EMP-2021-0043', 'Siti Kusuma', 'R&D', '1998-11-05', '6570165414554039', 'Jl. Thamrin No. 35, Palembang'),
('44', 'https://example.com/profile/0044.jpg', 'EMP-2019-0044', 'Nur Indah', 'Customer Service', '1982-09-04', '1769603194010932', 'Jl. Thamrin No. 39, Bandung'),
('45', 'https://example.com/profile/0045.jpg', 'EMP-2010-0045', 'Rina Saputra', 'HRD', '1987-11-07', '3591128834933631', 'Jl. Pahlawan No. 86, Denpasar'),
('46', 'https://example.com/profile/0046.jpg', 'EMP-2016-0046', 'Dewi Nugroho', 'Finance', '1994-10-04', '2933955627108728', 'Jl. Pahlawan No. 130, Makassar'),
('47', 'https://example.com/profile/0047.jpg', 'EMP-2010-0047', 'Hadi Susanto', 'Finance', '1977-04-21', '1360409810563873', 'Jl. Gajah Mada No. 9, Malang'),
('48', 'https://example.com/profile/0048.jpg', 'EMP-2022-0048', 'Rio Sari', 'HRD', '1978-10-06', '9724333018080088', 'Jl. Pahlawan No. 5, Palembang'),
('49', 'https://example.com/profile/0049.jpg', 'EMP-2019-0049', 'Sri Lestari', 'IT', '1978-05-07', '2883654489876672', 'Jl. Merdeka No. 92, Jakarta'),
('50', 'https://example.com/profile/0050.jpg', 'EMP-2010-0050', 'Dian Pratama', 'Sales', '1983-10-13', '2479852380297896', 'Jl. Gajah Mada No. 126, Medan'),
('51', 'https://example.com/profile/0051.jpg', 'EMP-2021-0051', 'Agus Permata', 'R&D', '1976-04-10', '5124136688968365', 'Jl. Diponegoro No. 2, Jakarta'),
('52', 'https://example.com/profile/0052.jpg', 'EMP-2010-0052', 'Sri Nugroho', 'Marketing', '1972-07-27', '1550543762155315', 'Jl. Sudirman No. 4, Palembang'),
('53', 'https://example.com/profile/0053.jpg', 'EMP-2013-0053', 'Hadi Lestari', 'Legal', '1991-08-19', '8788842842547797', 'Jl. Asia Afrika No. 142, Denpasar'),
('54', 'https://example.com/profile/0054.jpg', 'EMP-2010-0054', 'Budi Putra', 'HRD', '2000-07-02', '8069429170750508', 'Jl. Merdeka No. 120, Semarang'),
('55', 'https://example.com/profile/0055.jpg', 'EMP-2018-0055', 'Joko Fauzi', 'Finance', '1990-11-04', '3867545916996719', 'Jl. Ahmad Yani No. 140, Semarang'),
('56', 'https://example.com/profile/0056.jpg', 'EMP-2019-0056', 'Putri Fauzi', 'HRD', '1970-03-05', '5721231003387799', 'Jl. Kartini No. 70, Jakarta'),
('57', 'https://example.com/profile/0057.jpg', 'EMP-2023-0057', 'Agus Hidayat', 'Legal', '1978-06-16', '2305911010184714', 'Jl. Pahlawan No. 133, Bandung'),
('58', 'https://example.com/profile/0058.jpg', 'EMP-2011-0058', 'Agus Permata', 'IT', '1971-07-04', '8890927772168300', 'Jl. Ahmad Yani No. 100, Yogyakarta'),
('59', 'https://example.com/profile/0059.jpg', 'EMP-2018-0059', 'Maya Sari', 'Finance', '1989-07-31', '8537578039463989', 'Jl. Diponegoro No. 67, Yogyakarta'),
('60', 'https://example.com/profile/0060.jpg', 'EMP-2021-0060', 'Ani Hidayat', 'Marketing', '1991-07-16', '6208463568005612', 'Jl. Gajah Mada No. 93, Bandung'),
('61', 'https://example.com/profile/0061.jpg', 'EMP-2022-0061', 'Putri Pratama', 'Operations', '1972-05-13', '3943388471899484', 'Jl. Ahmad Yani No. 138, Bandung'),
('62', 'https://example.com/profile/0062.jpg', 'EMP-2015-0062', 'Agus Lestari', 'Sales', '1977-04-12', '7187682189963144', 'Jl. Ahmad Yani No. 97, Yogyakarta'),
('63', 'https://example.com/profile/0063.jpg', 'EMP-2023-0063', 'Ani Santoso', 'Customer Service', '1998-04-12', '4102641438974644', 'Jl. Kartini No. 49, Malang'),
('64', 'https://example.com/profile/0064.jpg', 'EMP-2022-0064', 'Siti Lestari', 'Marketing', '1989-04-29', '7887386030992030', 'Jl. Gajah Mada No. 30, Surabaya'),
('65', 'https://example.com/profile/0065.jpg', 'EMP-2020-0065', 'Nur Saputra', 'R&D', '1992-02-08', '8658907614767391', 'Jl. Gatot Subroto No. 106, Medan'),
('66', 'https://example.com/profile/0066.jpg', 'EMP-2017-0066', 'Maya Wijaya', 'Operations', '1972-11-03', '5975018354118818', 'Jl. Asia Afrika No. 8, Makassar'),
('67', 'https://example.com/profile/0067.jpg', 'EMP-2019-0067', 'Rudi Dewi', 'Customer Service', '1976-04-16', '3169795215925370', 'Jl. Thamrin No. 113, Surabaya'),
('68', 'https://example.com/profile/0068.jpg', 'EMP-2018-0068', 'Hadi Sari', 'R&D', '1980-05-08', '8954972525924386', 'Jl. Thamrin No. 95, Surabaya'),
('69', 'https://example.com/profile/0069.jpg', 'EMP-2012-0069', 'Putri Hidayat', 'R&D', '1999-08-12', '4637209199975927', 'Jl. Thamrin No. 101, Denpasar'),
('70', 'https://example.com/profile/0070.jpg', 'EMP-2013-0070', 'Dewi Hidayat', 'Marketing', '1976-08-12', '8452566192331177', 'Jl. Merdeka No. 74, Malang'),
('71', 'https://example.com/profile/0071.jpg', 'EMP-2012-0071', 'Agus Utami', 'Customer Service', '1999-03-25', '9790565514540542', 'Jl. Thamrin No. 147, Denpasar'),
('72', 'https://example.com/profile/0072.jpg', 'EMP-2010-0072', 'Joko Sari', 'Production', '1985-07-09', '6783526034424175', 'Jl. Ahmad Yani No. 54, Bandung'),
('73', 'https://example.com/profile/0073.jpg', 'EMP-2016-0073', 'Fajar Saputra', 'IT', '1981-04-04', '4113982948401860', 'Jl. Merdeka No. 19, Surabaya'),
('74', 'https://example.com/profile/0074.jpg', 'EMP-2013-0074', 'Andi Wati', 'Legal', '1974-05-21', '2269511828382477', 'Jl. Diponegoro No. 62, Jakarta'),
('75', 'https://example.com/profile/0075.jpg', 'EMP-2021-0075', 'Dewi Anggraini', 'Customer Service', '1970-05-06', '4238664090088119', 'Jl. Kartini No. 73, Surabaya'),
('76', 'https://example.com/profile/0076.jpg', 'EMP-2011-0076', 'Rio Fauzi', 'IT', '1977-12-14', '3451464682390220', 'Jl. Thamrin No. 31, Jakarta'),
('77', 'https://example.com/profile/0077.jpg', 'EMP-2016-0077', 'Nur Hidayat', 'Legal', '1996-04-13', '4770723264883937', 'Jl. Kartini No. 67, Palembang'),
('78', 'https://example.com/profile/0078.jpg', 'EMP-2013-0078', 'Budi Rahayu', 'Legal', '1999-12-13', '5483522883973323', 'Jl. Gajah Mada No. 142, Makassar'),
('79', 'https://example.com/profile/0079.jpg', 'EMP-2014-0079', 'Citra Permata', 'Sales', '1973-11-10', '2028304608541114', 'Jl. Pahlawan No. 68, Bandung'),
('80', 'https://example.com/profile/0080.jpg', 'EMP-2018-0080', 'Agus Setiawan', 'Production', '1975-04-26', '1688072546092105', 'Jl. Gajah Mada No. 95, Yogyakarta'),
('81', 'https://example.com/profile/0081.jpg', 'EMP-2016-0081', 'Lia Nugroho', 'Production', '1997-12-07', '5017582508116071', 'Jl. Sudirman No. 52, Palembang'),
('82', 'https://example.com/profile/0082.jpg', 'EMP-2012-0082', 'Ani Pratama', 'Finance', '1992-01-14', '3889806415058513', 'Jl. Pahlawan No. 48, Palembang'),
('83', 'https://example.com/profile/0083.jpg', 'EMP-2019-0083', 'Rio Rahayu', 'Marketing', '1981-09-02', '4534316171322132', 'Jl. Asia Afrika No. 116, Semarang'),
('84', 'https://example.com/profile/0084.jpg', 'EMP-2022-0084', 'Andi Rahayu', 'Legal', '1976-11-11', '2071747484699338', 'Jl. Diponegoro No. 115, Jakarta'),
('85', 'https://example.com/profile/0085.jpg', 'EMP-2021-0085', 'Lia Pratama', 'HRD', '1998-05-11', '4848371339484786', 'Jl. Diponegoro No. 119, Palembang'),
('86', 'https://example.com/profile/0086.jpg', 'EMP-2021-0086', 'Andi Susanto', 'R&D', '1993-09-04', '6715553174055684', 'Jl. Gajah Mada No. 35, Malang'),
('87', 'https://example.com/profile/0087.jpg', 'EMP-2014-0087', 'Citra Lestari', 'Customer Service', '1987-01-03', '6183742421863167', 'Jl. Merdeka No. 109, Bandung'),
('88', 'https://example.com/profile/0088.jpg', 'EMP-2018-0088', 'Budi Indah', 'Sales', '2000-01-04', '5121826418082041', 'Jl. Ahmad Yani No. 44, Malang'),
('89', 'https://example.com/profile/0089.jpg', 'EMP-2018-0089', 'Andi Saputra', 'Legal', '1973-03-15', '5978290662224485', 'Jl. Ahmad Yani No. 4, Yogyakarta'),
('90', 'https://example.com/profile/0090.jpg', 'EMP-2015-0090', 'Dewi Anggraini', 'Sales', '1993-09-07', '1095247473286524', 'Jl. Kartini No. 32, Denpasar'),
('91', 'https://example.com/profile/0091.jpg', 'EMP-2016-0091', 'Andi Sari', 'Sales', '1976-03-13', '9376542639827016', 'Jl. Pahlawan No. 67, Palembang'),
('92', 'https://example.com/profile/0092.jpg', 'EMP-2016-0092', 'Nur Sari', 'Operations', '1982-03-04', '2921310106285068', 'Jl. Merdeka No. 119, Palembang'),
('93', 'https://example.com/profile/0093.jpg', 'EMP-2010-0093', 'Lia Setiawan', 'IT', '1996-01-15', '2614875533221574', 'Jl. Gajah Mada No. 23, Denpasar'),
('94', 'https://example.com/profile/0094.jpg', 'EMP-2020-0094', 'Hadi Nugroho', 'Customer Service', '1972-05-21', '9383758255277207', 'Jl. Gatot Subroto No. 94, Surabaya'),
('95', 'https://example.com/profile/0095.jpg', 'EMP-2021-0095', 'Putri Putra', 'IT', '1979-02-21', '1845028410527375', 'Jl. Gatot Subroto No. 126, Jakarta'),
('96', 'https://example.com/profile/0096.jpg', 'EMP-2019-0096', 'Dewi Kusuma', 'Operations', '1977-10-27', '2750281212394931', 'Jl. Gatot Subroto No. 6, Makassar'),
('97', 'https://example.com/profile/0097.jpg', 'EMP-2014-0097', 'Citra Putra', 'Customer Service', '1995-09-03', '2618425858527192', 'Jl. Sudirman No. 39, Palembang'),
('98', 'https://example.com/profile/0098.jpg', 'EMP-2017-0098', 'Dewi Indah', 'Marketing', '1987-07-09', '8370291071822988', 'Jl. Asia Afrika No. 111, Semarang'),
('99', 'https://example.com/profile/0099.jpg', 'EMP-2020-0099', 'Citra Nugroho', 'Sales', '1972-02-04', '4408520467381048', 'Jl. Sudirman No. 101, Yogyakarta'),
('100', 'https://example.com/profile/0100.jpg', 'EMP-2010-0100', 'Rina Anggraini', 'R&D', '1977-01-20', '3697970207810408', 'Jl. Sudirman No. 82, Bandung'),
('101', 'https://example.com/profile/0101.jpg', 'EMP-2012-0101', 'Rio Indah', 'Finance', '1985-05-28', '7866050993077533', 'Jl. Gajah Mada No. 143, Semarang'),
('102', 'https://example.com/profile/0102.jpg', 'EMP-2015-0102', 'Nur Hidayat', 'Finance', '1996-11-10', '4635942148781752', 'Jl. Sudirman No. 57, Jakarta'),
('103', 'https://example.com/profile/0103.jpg', 'EMP-2018-0103', 'Andi Hidayat', 'Marketing', '1982-04-26', '6870525176513049', 'Jl. Thamrin No. 61, Makassar'),
('104', 'https://example.com/profile/0104.jpg', 'EMP-2022-0104', 'Maya Indah', 'Operations', '1993-09-29', '2419199503487463', 'Jl. Gajah Mada No. 142, Makassar'),
('105', 'https://example.com/profile/0105.jpg', 'EMP-2018-0105', 'Rina Utami', 'Marketing', '1991-09-26', '5425055433098448', 'Jl. Sudirman No. 62, Surabaya'),
('106', 'https://example.com/profile/0106.jpg', 'EMP-2016-0106', 'Budi Anggraini', 'Customer Service', '2000-03-20', '6104390595295833', 'Jl. Ahmad Yani No. 77, Malang'),
('107', 'https://example.com/profile/0107.jpg', 'EMP-2011-0107', 'Eko Lestari', 'Legal', '1983-08-09', '5296447542365722', 'Jl. Sudirman No. 113, Jakarta'),
('108', 'https://example.com/profile/0108.jpg', 'EMP-2011-0108', 'Dewi Nugroho', 'Marketing', '2000-06-30', '4164346799317346', 'Jl. Gajah Mada No. 142, Denpasar'),
('109', 'https://example.com/profile/0109.jpg', 'EMP-2012-0109', 'Rio Dewi', 'R&D', '1988-04-02', '2274666220334176', 'Jl. Thamrin No. 25, Yogyakarta'),
('110', 'https://example.com/profile/0110.jpg', 'EMP-2017-0110', 'Joko Saputra', 'Sales', '1996-11-28', '9696971336084675', 'Jl. Kartini No. 68, Bandung'),
('111', 'https://example.com/profile/0111.jpg', 'EMP-2019-0111', 'Nur Putra', 'Production', '1972-01-05', '9259982987136058', 'Jl. Gajah Mada No. 134, Yogyakarta'),
('112', 'https://example.com/profile/0112.jpg', 'EMP-2014-0112', 'Eko Putra', 'Legal', '1993-03-21', '3963008283947110', 'Jl. Diponegoro No. 10, Surabaya'),
('113', 'https://example.com/profile/0113.jpg', 'EMP-2020-0113', 'Rina Sari', 'Marketing', '1982-05-21', '7668054439435026', 'Jl. Sudirman No. 98, Palembang'),
('114', 'https://example.com/profile/0114.jpg', 'EMP-2023-0114', 'Rio Santoso', 'IT', '1988-01-10', '7834190471935779', 'Jl. Asia Afrika No. 112, Palembang'),
('115', 'https://example.com/profile/0115.jpg', 'EMP-2021-0115', 'Sri Utami', 'Customer Service', '1993-06-21', '5242837875732508', 'Jl. Gatot Subroto No. 16, Palembang'),
('116', 'https://example.com/profile/0116.jpg', 'EMP-2019-0116', 'Lia Utami', 'IT', '1993-05-15', '8939037840457421', 'Jl. Pahlawan No. 55, Jakarta'),
('117', 'https://example.com/profile/0117.jpg', 'EMP-2015-0117', 'Agus Setiawan', 'Legal', '1970-10-04', '7542224615689306', 'Jl. Diponegoro No. 109, Denpasar'),
('118', 'https://example.com/profile/0118.jpg', 'EMP-2021-0118', 'Lia Pratama', 'Operations', '1980-03-20', '2384206339287400', 'Jl. Thamrin No. 50, Malang'),
('119', 'https://example.com/profile/0119.jpg', 'EMP-2021-0119', 'Dewi Nugroho', 'Finance', '1999-04-21', '6862783757526606', 'Jl. Ahmad Yani No. 69, Yogyakarta'),
('120', 'https://example.com/profile/0120.jpg', 'EMP-2012-0120', 'Budi Anggraini', 'Sales', '1971-09-09', '4419996078023146', 'Jl. Pahlawan No. 123, Surabaya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_foto`
--

CREATE TABLE `tabel_foto` (
  `id` int(11) NOT NULL,
  `judul_image` varchar(255) NOT NULL,
  `tema_image` varchar(255) NOT NULL,
  `deskripsi_foto` text NOT NULL,
  `waktu_upload` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tabel_foto`
--

INSERT INTO `tabel_foto` (`id`, `judul_image`, `tema_image`, `deskripsi_foto`, `waktu_upload`) VALUES
(1, 'weewe', 'rtrt', 'trtr', '2026-07-03 01:25:33'),
(2, 'weewe', 'fdfdff', 'ytytytyty', '2026-07-03 01:34:16'),
(7, 'RTRT', 'YTTUU', 'ytytUYUYytWEEEytPLLy', '2026-07-03 01:52:00'),
(8, 'RTRT', 'YTTUU', 'ytytUYUYytWEEEytPLLy', '2026-07-03 01:56:12'),
(9, 'RTRT', 'YTTUU', 'ytytUYUYytWEEEytPLLy', '2026-07-03 01:57:29'),
(10, 'RTRT', 'YTTUU', 'ytytUYUYytWEEEytPLLy', '2026-07-03 02:00:30'),
(11, 'RTRT', 'YTTUU', 'ytytUYUYytWEEEytPLLy', '2026-07-03 02:01:00'),
(12, 'RTRT', 'YTTUU', 'ytytUYUYytWEEEytPLLy', '2026-07-03 02:01:40'),
(13, 'RTRT', 'YTTUU', 'ytytUYUYytWEEEytPLLy', '2026-07-03 02:03:48'),
(14, 'RTRT', 'YTTUU', 'ytytUYUYytWEEEytPLLy', '2026-07-03 02:05:33'),
(15, 'RTRT', 'YTTUU', 'ytytUYUYytWEEEytPLLy', '2026-07-03 02:07:19'),
(16, 'RTRT', 'YTTUU', 'ytytUYUYytWEEEytPLLy', '2026-07-03 02:08:56'),
(18, 'dddddddddddd', 'eeeeeeeeeeeee', 'fffffffffff', '2026-07-05 05:44:02'),
(20, 'oooooooooooo', 'ppppppppppppppp', 'qqqqqqqqqqqqq', '2026-07-05 07:31:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_pdf`
--

CREATE TABLE `tabel_pdf` (
  `id` int(11) NOT NULL,
  `judul_pdf` varchar(255) NOT NULL,
  `tema_pdf` varchar(255) NOT NULL,
  `deskripsi_pdf` text NOT NULL,
  `nama_pdf` varchar(255) NOT NULL,
  `waktu_upload` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `id_termpenjelasan` int(11) NOT NULL,
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

INSERT INTO `term` (`id`, `id_termpenjelasan`, `kelas`, `title`, `term`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 0, 'term', 'SYARAT DAN KETENTUAN PENGGUNAAN', 'Fitur Aduan Publik dan Permintaan Informasi [Nama Website/Instansi]\nSelamat datang di portal pelayanan digital resmi [Nama Instansi/Kementerian/Dinas]. Fitur Aduan Publik dan Permintaan Informasi disediakan untuk menjamin hak masyarakat dalam mendapatkan informasi publik dan menyampaikan aspirasi sesuai dengan UU No. 14 Tahun 2008 tentang Keterbukaan Informasi Publik.\nDengan menggunakan fitur ini, Anda menyatakan setuju dan terikat pada ketentuan di bawah ini:\nPenggunaan website ini diatur oleh Syarat dan Ketentuan di bawah ini. Dengan mengakses, mendaftar, atau menggunakan layanan kami, Anda menyatakan telah membaca, memahami, dan menyetujui seluruh ketentuan ini serta tunduk pada hukum yang berlaku di Republik Indonesia.\n1. Tujuan Pengumpulan Data Pribadi dan Dokumen\nKami mengumpulkan data pribadi dan dokumen pendukung (seperti KTP, Kartu Keluarga, atau dokumen legalitas lainnya) secara sah semata-mata untuk:\nMelakukan verifikasi validitas identitas Pemohon/Pengadu guna mencegah laporan fiktif atau anonim yang tidak bertanggung jawab.\nMemenuhi syarat administratif dalam proses tindak lanjut aduan atau pemberian informasi publik.\nMenghubungi Pemohon/Pengadu terkait perkembangan status penanganan laporan.\nLayanan ini diselenggarakan dalam rangka pelaksanaan fungsi pelayanan publik dan pemerintahan digital (E-Government).\n1. Dasar Hukum\nPenyelenggaraan website ini patuh pada: \nUU No. 11 Tahun 2008 tentang Informasi dan Transaksi Elektronik (UU ITE) sebagaimana telah diubah, \nUU No. 27 Tahun 2022 tentang Perlindungan Data Pribadi (UU PDP).\naturan tentang survey IKM\n2. Ketentuan Unggah Dokumen dan Berkas\nPengguna wajib memberikan data pribadi yang akurat, sah, benar, dan mutakhir sesuai dengan identitas resmi (KTP/Paspor/Kartu Keluarga).\nPemalsuan data pribadi, penggunaan identitas orang lain tanpa hak, atau manipulasi informasi merupakan pelanggaran hukum berat yang dapat diproses secara pidana berdasarkan pasal-pasal UU ITE dan UU PDP.\nKeaslian Berkas: Dokumen yang diunggah harus merupakan dokumen asli, sah, jelas terbaca, dan tidak direkayasa secara ilegal.\nPelanggaran Hak Cipta: Dokumen yang diunggah tidak boleh melanggar hak kekayaan intelektual atau hak privasi pihak ketiga tanpa izin sah.\nLarangan Konten Berbahaya: Pengguna dilarang keras mengunggah file yang mengandung virus, malware, spyware, atau skrip berbahaya yang dapat mengancam keamanan infrastruktur siber pemerintah.\n3. Keamanan dan Penggunaan Akun\nPengguna bertanggung jawab penuh untuk menjaga kerahasiaan kredensial akun (username, password, atau kode OTP).\nSetiap aktivitas yang dilakukan melalui akun Pengguna dianggap sebagai tindakan sah dari Pengguna yang bersangkutan.\nInstansi tidak bertanggung jawab atas kerugian akibat kelalaian Pengguna dalam menjaga keamanan akun miliknya.\n3. Tanggung Jawab atas Isi Aduan dan Informasi\nKebenaran Materi: Pengguna bertanggung jawab penuh atas kebenaran substansi aduan, kronologi kejadian, atau latar belakang permintaan informasi yang disampaikan.\nLarangan Fitnah & SARA: Isi aduan atau permintaan informasi tidak boleh mengandung unsur ujaran kebencian, SARA, pornografi, pencemaran nama baik, fitnah, atau informasi palsu (hoax).\nKonsekuensi Hukum: Penyampaian laporan palsu yang merugikan pihak lain atau instansi dapat dituntut secara hukum berdasarkan Kitab Undang-Undang Hukum Pidana (KUHP) dan UU ITE.\n4. Batasan Penggunaan yang Diperbolehkan\nPengguna dilarang keras untuk:\nMelakukan tindakan yang dapat merusak, mengganggu, atau membebani infrastruktur server dan sistem website.\nMenggunakan data atau informasi yang diperoleh dari website ini untuk aktivitas komersial ilegal, penipuan, atau tindakan melawan hukum lainnya.\nMengunggah dokumen atau konten yang mengandung virus, malware, atau kode berbahaya lainnya.\n4. Kerahasiaan Identitas Pengadu (Whistleblowing)\nInstansi berkomitmen untuk menjaga kerahasiaan identitas Pengadu dalam fitur Aduan Publik sesuai dengan standar operasional prosedur yang berlaku, kecuali jika diwajibkan oleh perintah pengadilan atau ketentuan undang-undang untuk dibuka kepada aparat penegak hukum.\n5. Keadaan Memaksa (Force Majeure)\nInstansi tidak bertanggung jawab atas gangguan layanan, kegagalan sistem, atau keterlambatan proses yang disebabkan oleh keadaan di luar kendali wajar (seperti bencana alam, gangguan massal jaringan internet, pemadaman listrik nasional, serangan siber skala masif, atau perubahan kebijakan regulasi negara).\n5. Validasi dan Penolakan Layanan\nInstansi berhak penuh untuk menolak, mengarsipkan, atau tidak memproses aduan atau permintaan informasi apabila:\nDokumen identitas yang diunggah tidak valid, buram, atau diduga palsu.\nSubstansi laporan tidak masuk dalam wewenang instansi kami.\nPengguna menggunakan kata-kata yang tidak patut, kasar, atau mengancam di dalam sistem.\n6. Perubahan Ketentuan\nInstansi berhak untuk mengubah, menambah, atau memperbarui Syarat dan Ketentuan ini sewaktu-waktu demi menyesuaikan dengan perubahan hukum atau peningkatan sistem pelayanan. Perubahan akan diumumkan melalui halaman ini.\n', '2026-06-05 08:49:31', '2026-06-05 08:49:31', '2026-06-05 08:49:31'),
(2, 0, 'privacy', 'KEBIJAKAN PRIVASI (PRIVACY POLICY)', 'Selamat datang di Official Website BBPPKS Bandung. Kami berkomitmen untuk melindungi dan menghormati privasi data pribadi Anda selaku pengguna. Kebijakan Privasi ini disusun berdasarkan Undang-Undang No. 27 Tahun 2022 tentang Perlindungan Data Pribadi di Indonesia  (UU 24/2022 PDP).\n1. Data Pribadi yang Kami Kumpulkan\nKami mengumpulkan data yang Anda berikan secara langsung maupun otomatis saat menggunakan aplikasi:\nData Identitas: Nama lengkap, alamat email, nomor telepon, dan [tambahkan jika ada, misal: alamat pengiriman].\nData Teknis: Alamat IP, jenis perangkat, sistem operasi, dan aktivitas penggunaan aplikasi melalui cookies.\n2. Tujuan Penggunaan Data\nKami menggunakan data pribadi Anda untuk keperluan berikut:\nMenyediakan, mengoperasikan, dan menjaga layanan aplikasi.\nMemproses transaksi atau permintaan yang Anda lakukan.\nMengirimkan notifikasi pembaruan sistem atau informasi layanan.\nMemenuhi kewajiban hukum dan regulasi yang berlaku di Indonesia.\n3. Pengungkapan Data kepada Pihak Ketiga\nKami tidak akan menjual atau menyewakan data pribadi Anda. Kami hanya membagikan data Anda kepada pihak ketiga tepercaya karena diwajibkan oleh hukum, perintah pengadilan, atau otoritas pemerintah yang sah di Indonesia.\n4. Keamanan dan Penyimpanan Data\nKami menerapkan standar keamanan teknis dan organisasional untuk melindungi data Anda dari akses tanpa izin. Data Anda akan disimpan selama akun Anda aktif atau sejauh yang diperlukan untuk menyediakan layanan hukum.\n5. Hak Anda sebagai Subjek Data \nAnda memiliki hak untuk:\nMengakses dan meminta salinan data pribadi Anda.\nMemperbarui atau memperbaiki data yang tidak akurat.\nMeminta penghapusan atau pemusnahan data pribadi Anda dari sistem kami.\nMenarik kembali persetujuan pemrosesan data.\n6. Kontak Kami\nJika Anda memiliki pertanyaan mengenai Kebijakan Privasi ini atau ingin mengajukan permohonan hak data Anda, silakan hubungi kami di:\nEmail: humasbbppksbandung@kemensos.go.id\nAlamat: Jalan Panorama 1, Desa Jayagiri, Kecamatan Lembang -  Kabupaten Bandung Barat', '2026-06-05 08:49:31', '2026-06-05 08:49:31', '2026-06-05 08:49:31'),
(3, 0, 'press', 'PUSAT MEDIA / MEDIA CENTER', '[Nama Instansi/Kementerian/Dinas]Halaman ini disediakan khusus bagi jurnalis, awak media, dan masyarakat umum untuk mendapatkan informasi, rilis berita resmi, dan aset publikasi resmi dari [Nama Instansi].1. Siaran Pers Resmi (Press Release)Semua informasi yang diterbitkan dalam halaman ini merupakan pernyataan resmi dari [Nama Instansi].Rekan media diperbolehkan mengutip, menyebarluaskan, atau mempublikasikan ulang isi Siaran Pers ini dengan wajib mencantumkan sumber resmi (misal: “...ujar Humas [Nama Instansi] dalam siaran pers resminya, [Tanggal]”).Dilarang keras mengubah konteks, memotong kalimat secara sepihak yang dapat mengubah makna asli informasi, atau menyalahgunakan siaran pers untuk menyebarkan disinformasi.2. Kit Media dan Aset Resmi (Media Kit)Untuk menjaga integritas visual instansi negara, kami menyediakan aset resmi yang dapat diunduh oleh media untuk keperluan pemberitaan:Logo Resmi: Unduh logo instansi dalam format resolusi tinggi (.png transparan atau .vector). penggunaan logo harus sesuai dengan panduan warna (brand guidelines) resmi negara dan tidak boleh diubah warnanya atau dideformasi.Foto Pejabat Resmi: Foto resmi Kepala Instansi/Menteri/Gubernur/Bupati untuk kebutuhan ilustrasi berita.Dokumentasi Kegiatan: Foto dan video rangkaian kegiatan dinas yang bebas royalti untuk kebutuhan jurnalisme.3. Kontak Hubungan Masyarakat (Humas / PR)Untuk permohonan wawancara khusus, konfirmasi berita, atau undangan peliputan acara dinas, rekan media dapat menghubungi tim Humas resmi kami melalui saluran di bawah ini:Penanggung Jawab: Biro Hubungan Masyarakat / Protokol [Nama Instansi]Email Resmi Humas: [press@instansi.go.id] (Catatan: Pastikan menggunakan email domain .go.id resmi)Nomor Telepon/Hotline Media: [021-xxxxxx / WhatsApp Media Center]Jam Operasional Pelayanan Media: Senin - Jumat (08.00 - 16.00 WIB).4. Aturan Pengambilan Berita (Disclaimer Media)[Nama Instansi] tidak bertanggung jawab atas segala bentuk kutipan atau berita yang mencantumkan nama instansi kami, namun sumbernya diambil dari luar halaman resmi ini atau di luar juru bicara (juru bicara) resmi yang ditunjuk.Segala bentuk wawancara pencegatan (doorstop) di luar agenda resmi harus mendapatkan konfirmasi ulang kepada Biro Humas sebelum dipublikasikan demi akurasi data pemerintah.', '2026-06-05 09:01:55', '2026-06-05 09:01:55', '2026-06-05 09:01:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `termpenjelasan`
--

CREATE TABLE `termpenjelasan` (
  `id` int(11) NOT NULL,
  `kelas` text NOT NULL,
  `title` text NOT NULL,
  `term` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `termpenjelasan`
--

INSERT INTO `termpenjelasan` (`id`, `kelas`, `title`, `term`, `created_at`, `updated_at`, `deleted_at`) VALUES
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `status`, `status_message`, `active`, `last_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', NULL, NULL, 0, NULL, '2026-07-13 07:02:10', '2026-07-13 07:02:10', NULL);

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

-- --------------------------------------------------------

--
-- Struktur dari tabel `utama`
--

CREATE TABLE `utama` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `alamat` text NOT NULL,
  `desa` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `kabupaten` varchar(100) NOT NULL,
  `provinsi` varchar(100) NOT NULL,
  `foreigngender_id` int(11) NOT NULL,
  `foreignnikah_id` int(11) NOT NULL,
  `foreignkategori_id` int(11) NOT NULL,
  `pdf` varchar(255) DEFAULT NULL,
  `lokasi_pdf` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `judul_images` varchar(100) DEFAULT NULL,
  `tgl_images` date DEFAULT NULL,
  `lokasi_images` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_kategori_berita` (`id_kategori`),
  ADD KEY `fk_kategori_tematik` (`id_tematik`);

--
-- Indeks untuk tabel `berita_galeri`
--
ALTER TABLE `berita_galeri`
  ADD PRIMARY KEY (`id`),
  ADD KEY `berita_id` (`berita_id`);

--
-- Indeks untuk tabel `detail_foto`
--
ALTER TABLE `detail_foto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tabel_foto_id` (`tabel_foto_id`);

--
-- Indeks untuk tabel `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `hirarki`
--
ALTER TABLE `hirarki`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `keuangan`
--
ALTER TABLE `keuangan`
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
-- Indeks untuk tabel `multiimages`
--
ALTER TABLE `multiimages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_utama` (`foreigutama_id`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nik` (`nik`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indeks untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nik` (`nik`);

--
-- Indeks untuk tabel `peserta2`
--
ALTER TABLE `peserta2`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `nik` (`nik`);

--
-- Indeks untuk tabel `program`
--
ALTER TABLE `program`
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
-- Indeks untuk tabel `tabel_foto`
--
ALTER TABLE `tabel_foto`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tabel_pdf`
--
ALTER TABLE `tabel_pdf`
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
-- Indeks untuk tabel `termpenjelasan`
--
ALTER TABLE `termpenjelasan`
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
-- Indeks untuk tabel `utama`
--
ALTER TABLE `utama`
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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `auth_identities`
--
ALTER TABLE `auth_identities`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_permissions_users`
--
ALTER TABLE `auth_permissions_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_remember_tokens`
--
ALTER TABLE `auth_remember_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_token_logins`
--
ALTER TABLE `auth_token_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `berita_galeri`
--
ALTER TABLE `berita_galeri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `detail_foto`
--
ALTER TABLE `detail_foto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT untuk tabel `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT untuk tabel `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `gender`
--
ALTER TABLE `gender`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `hirarki`
--
ALTER TABLE `hirarki`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `keuangan`
--
ALTER TABLE `keuangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `menu_ska`
--
ALTER TABLE `menu_ska`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `multiimages`
--
ALTER TABLE `multiimages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT untuk tabel `peserta2`
--
ALTER TABLE `peserta2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT untuk tabel `program`
--
ALTER TABLE `program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tabel_foto`
--
ALTER TABLE `tabel_foto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `tabel_pdf`
--
ALTER TABLE `tabel_pdf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT untuk tabel `termpenjelasan`
--
ALTER TABLE `termpenjelasan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `userss`
--
ALTER TABLE `userss`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `utama`
--
ALTER TABLE `utama`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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

--
-- Ketidakleluasaan untuk tabel `berita_galeri`
--
ALTER TABLE `berita_galeri`
  ADD CONSTRAINT `berita_galeri_ibfk_1` FOREIGN KEY (`berita_id`) REFERENCES `berita` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_foto`
--
ALTER TABLE `detail_foto`
  ADD CONSTRAINT `detail_foto_ibfk_1` FOREIGN KEY (`tabel_foto_id`) REFERENCES `tabel_foto` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
