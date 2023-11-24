-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 24, 2023 at 04:43 AM
-- Server version: 5.7.24
-- PHP Version: 7.3.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory_desa`
--

-- --------------------------------------------------------

--
-- Table structure for table `application_names`
--

CREATE TABLE `application_names` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `application_logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `application_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `application_nickname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `application_owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `application_version` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `application_developer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_application_developer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `application_names`
--

INSERT INTO `application_names` (`id`, `application_logo`, `application_name`, `application_nickname`, `application_owner`, `application_version`, `application_developer`, `link_application_developer`, `created_at`, `updated_at`) VALUES
(1, 'pancasila.png', 'Peminjaman Barang Desa', 'Inventory Desa', 'Desa Bojongsoang', '1.0.0', 'Kenji Matsuya', 'https://www.instagram.com/rhie.kenji', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `biodatas`
--

CREATE TABLE `biodatas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status_verifikasi` tinyint(1) NOT NULL DEFAULT '0',
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `biodatas`
--

INSERT INTO `biodatas` (`id`, `nik`, `user_id`, `status_verifikasi`, `foto`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `no_hp`, `alamat`, `created_at`, `updated_at`) VALUES
(1, '1234567890', 1, 1, 'Admin Desa Bojongsoang-24112023113116.jpg', NULL, NULL, 'Laki-Laki', '081521941914', NULL, '2023-11-24 04:31:16', '2023-11-24 04:31:16'),
(2, '3209872003000007', 2, 1, 'Hendra Ahmadillah-24112023113702.jpg', NULL, NULL, 'Laki-Laki', '081521941915', NULL, '2023-11-24 04:37:02', '2023-11-24 04:37:19'),
(3, '3203081212010007', 3, 1, 'Vega Tiara Intena-24112023114008.png', NULL, NULL, 'Perempuan', '089696128766', NULL, '2023-11-24 04:40:08', '2023-11-24 04:40:20');

-- --------------------------------------------------------

--
-- Table structure for table `data_barangs`
--

CREATE TABLE `data_barangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satuan_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_barangs`
--

INSERT INTO `data_barangs` (`id`, `kode_barang`, `nama_barang`, `satuan_barang`, `jumlah_barang`, `created_at`, `updated_at`) VALUES
(1, 'A01', 'Mobil Operasional', 'Unit', '12', NULL, '2023-11-24 04:34:24'),
(2, 'A02', 'Mobil Ambulance', 'Unit', '5', NULL, '2023-11-24 04:34:32'),
(3, 'A03', 'Mobil Maskara', 'Unit', '4', NULL, '2023-11-24 04:34:45'),
(4, 'B01', 'Kursi', 'Buah', '120', NULL, '2023-11-24 04:34:38');

-- --------------------------------------------------------

--
-- Table structure for table `data_fasilitases`
--

CREATE TABLE `data_fasilitases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_fasilitas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_fasilitas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satuan_fasilitas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_fasilitas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_fasilitases`
--

INSERT INTO `data_fasilitases` (`id`, `kode_fasilitas`, `nama_fasilitas`, `satuan_fasilitas`, `jumlah_fasilitas`, `created_at`, `updated_at`) VALUES
(1, 'A01', 'Aula Desa', 'Ruangan', '2', NULL, '2023-11-24 04:35:03'),
(2, 'A02', 'GOR Badminton', 'Ruangan', '1', NULL, '2023-11-24 04:35:28'),
(3, 'A03', 'Ruang Rapat', 'Ruangan', '5', NULL, '2023-11-24 04:35:16');

-- --------------------------------------------------------

--
-- Table structure for table `data_peminjaman_barangs`
--

CREATE TABLE `data_peminjaman_barangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status_pinjaman` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Menunggu Persetujuan',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `data_barang_id` bigint(20) UNSIGNED NOT NULL,
  `jumlah_pinjaman` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_peminjaman_fasilitases`
--

CREATE TABLE `data_peminjaman_fasilitases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status_pinjaman` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Menunggu Persetujuan',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `data_fasilitas_id` bigint(20) UNSIGNED NOT NULL,
  `jumlah_pinjaman` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `informasi_dashboards`
--

CREATE TABLE `informasi_dashboards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `foto_informasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_informasi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `informasi_dashboards`
--

INSERT INTO `informasi_dashboards` (`id`, `foto_informasi`, `deskripsi_informasi`, `created_at`, `updated_at`) VALUES
(1, 'foto_informasi-24112023114148.png', '<p style=\"text-align: justify; \">Ini adalah dashboard dari Aplikasi <b>Peminjaman Barang Desa Bojongsoang</b>&nbsp;Kabupaten Bandung. Lengkapi data profile yang ada di aplikasi ini untuk memulai peminjaman barang. Terima kasih.</p>', NULL, '2023-11-24 04:42:36');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(89, '2014_10_11_165726_create_roles_table', 1),
(90, '2014_10_12_000000_create_users_table', 1),
(91, '2014_10_12_100000_create_password_resets_table', 1),
(92, '2019_08_19_000000_create_failed_jobs_table', 1),
(93, '2023_03_16_045726_create_application_names_table', 1),
(94, '2023_10_31_124258_create_narahubungs_table', 1),
(95, '2023_11_01_035456_create_informasi_dashboards_table', 1),
(96, '2023_11_22_120006_create_data_barangs_table', 1),
(97, '2023_11_22_203522_create_data_fasilitases_table', 1),
(98, '2023_11_22_212007_create_biodatas_table', 1),
(99, '2023_11_23_120718_create_data_peminjaman_barangs_table', 1),
(100, '2023_11_23_121826_create_data_peminjaman_fasilitases_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `narahubungs`
--

CREATE TABLE `narahubungs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kontak` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `narahubungs`
--

INSERT INTO `narahubungs` (`id`, `nama`, `kontak`, `link`, `created_at`, `updated_at`) VALUES
(1, 'Kenji Matsuya', '0815-2194-1914', 'https://wa.me/6281521941914', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `nama_role`, `created_at`, `updated_at`) VALUES
(1, 'Superadmin', NULL, NULL),
(2, 'User', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL DEFAULT '2',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama_lengkap`, `role_id`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Desa Bojongsoang', 1, 'admin@gmail.com', NULL, '$2y$10$iO/cL8pYsYKR9BwPNsHdBOT55TK5V7P6XjPcPHQOuCF0z8iVeCEWC', NULL, '2023-11-24 04:31:16', '2023-11-24 04:31:16'),
(2, 'Hendra Ahmadillah', 2, 'hendrayna55@gmail.com', NULL, '$2y$10$noDqkp4mA.lGnxCr21BljeL7kfPi142wMXVLyMzoYJXnj.Af31w72', NULL, '2023-11-24 04:37:02', '2023-11-24 04:37:02'),
(3, 'Vega Tiara Intena', 2, 'vegatiara@gmail.com', NULL, '$2y$10$kh52qO3buG/1sMdXNrUrUuQbLmohZN80RoR8R16idtEORBFAIdErC', NULL, '2023-11-24 04:40:08', '2023-11-24 04:40:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application_names`
--
ALTER TABLE `application_names`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `biodatas`
--
ALTER TABLE `biodatas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `biodatas_user_id_foreign` (`user_id`);

--
-- Indexes for table `data_barangs`
--
ALTER TABLE `data_barangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_fasilitases`
--
ALTER TABLE `data_fasilitases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_peminjaman_barangs`
--
ALTER TABLE `data_peminjaman_barangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_peminjaman_barangs_user_id_foreign` (`user_id`),
  ADD KEY `data_peminjaman_barangs_data_barang_id_foreign` (`data_barang_id`);

--
-- Indexes for table `data_peminjaman_fasilitases`
--
ALTER TABLE `data_peminjaman_fasilitases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_peminjaman_fasilitases_user_id_foreign` (`user_id`),
  ADD KEY `data_peminjaman_fasilitases_data_fasilitas_id_foreign` (`data_fasilitas_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `informasi_dashboards`
--
ALTER TABLE `informasi_dashboards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `narahubungs`
--
ALTER TABLE `narahubungs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `application_names`
--
ALTER TABLE `application_names`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `biodatas`
--
ALTER TABLE `biodatas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `data_barangs`
--
ALTER TABLE `data_barangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `data_fasilitases`
--
ALTER TABLE `data_fasilitases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `data_peminjaman_barangs`
--
ALTER TABLE `data_peminjaman_barangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_peminjaman_fasilitases`
--
ALTER TABLE `data_peminjaman_fasilitases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `informasi_dashboards`
--
ALTER TABLE `informasi_dashboards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `narahubungs`
--
ALTER TABLE `narahubungs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `biodatas`
--
ALTER TABLE `biodatas`
  ADD CONSTRAINT `biodatas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `data_peminjaman_barangs`
--
ALTER TABLE `data_peminjaman_barangs`
  ADD CONSTRAINT `data_peminjaman_barangs_data_barang_id_foreign` FOREIGN KEY (`data_barang_id`) REFERENCES `data_barangs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `data_peminjaman_barangs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `data_peminjaman_fasilitases`
--
ALTER TABLE `data_peminjaman_fasilitases`
  ADD CONSTRAINT `data_peminjaman_fasilitases_data_fasilitas_id_foreign` FOREIGN KEY (`data_fasilitas_id`) REFERENCES `data_fasilitases` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `data_peminjaman_fasilitases_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
