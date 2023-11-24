-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 23, 2023 at 04:35 PM
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
(1, '23112023111107_Inventory Desa.png', 'Peminjaman Barang', 'Inventory Desa', 'Desa Bojongsoang', '1.0.0', 'Kenji Matsuya', 'https://www.instagram.com/rhie.kenji', NULL, '2023-11-23 14:41:10');

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
(1, '3203012001000005', 1, 1, 'Hendra Ahmadillah-23112023110101.jpg', 'Jakarta', '2000-01-20', 'Laki-Laki', '081521941914', 'BRIS Residence A7, Kec. Cilaku, Kab. Cianjur, Jawa Barat', '2023-11-23 04:01:01', '2023-11-23 04:01:47'),
(2, '3203010910990003', 2, 1, 'Sabi Ardana-23112023112821.png', 'Tasikmalaya', '1999-11-23', 'Laki-Laki', '0987654321', 'Kec. Kalapanunggal, Kab. Tasikmalaya, Jawa Barat', '2023-11-23 04:28:21', '2023-11-23 13:21:35'),
(3, '3273262207000003', 3, 1, 'Nabhan Riqzulloh-23112023213639.jpg', NULL, NULL, 'Laki-Laki', '089696983465', NULL, '2023-11-23 14:36:39', '2023-11-23 14:36:46'),
(4, '3203041212010001', 4, 1, 'Vega Tiara Intena-23112023232019.png', NULL, NULL, 'Perempuan', '09876567832', NULL, '2023-11-23 16:20:19', '2023-11-23 16:20:29');

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
(2, 'A02', 'Mobil Ambulance', 'Unit', '3', NULL, NULL),
(3, 'A03', 'Mobil Maskara', 'Unit', '4', NULL, '2023-11-23 12:04:56'),
(4, 'B01', 'Kursi', 'Buah', '55', NULL, '2023-11-23 15:01:22'),
(5, 'A05', 'Mobil Sport', 'Unit', '2', '2023-11-23 06:42:44', '2023-11-23 12:05:17'),
(6, 'A01', 'Proyektor', 'Unit', '15', '2023-11-23 15:26:50', '2023-11-23 15:26:50');

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
(1, 'A01', 'Aula Abdjan Soelaeman', 'Ruangan', '1', NULL, NULL),
(2, 'A02', 'GOR Badminton', 'Ruangan', '0', NULL, '2023-11-23 13:07:23'),
(3, 'A03', 'Aula Student Center', 'Ruangan', '2', NULL, NULL),
(4, 'C01', 'Kelas', 'Ruangan', '5', '2023-11-23 12:19:50', '2023-11-23 15:00:56');

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

--
-- Dumping data for table `data_peminjaman_barangs`
--

INSERT INTO `data_peminjaman_barangs` (`id`, `status_pinjaman`, `user_id`, `data_barang_id`, `jumlah_pinjaman`, `tanggal_pinjam`, `tanggal_kembali`, `keterangan`, `created_at`, `updated_at`) VALUES
(9, 'Disetujui', 2, 4, '40', '2023-11-19', '2023-11-22', 'Kegiatan Jurusan', '2023-11-23 10:28:02', '2023-11-23 10:28:06'),
(10, 'Ditolak', 2, 4, '20', '2023-11-26', '2023-11-28', 'Muskom Teknik Informatika', '2023-11-23 10:28:33', '2023-11-23 11:58:23'),
(12, 'Disetujui', 2, 3, '1', '2023-11-22', '2023-11-25', 'Mengantar Barang', '2023-11-23 11:43:32', '2023-11-23 12:04:56'),
(13, 'Disetujui', 2, 4, '5', '2023-11-19', '2023-11-22', 'Workshop Desa', '2023-11-23 12:06:11', '2023-11-23 12:06:21'),
(14, 'Ditolak', 3, 4, '30', '2023-11-25', '2023-11-26', 'Pelatihan Kader HMI', '2023-11-23 14:57:44', '2023-11-23 15:01:22'),
(15, 'Menunggu Persetujuan', 3, 5, '1', '2023-11-26', '2023-11-28', 'Mengawal Rektor UIN Bandung', '2023-11-23 15:31:24', '2023-11-23 15:31:24');

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

--
-- Dumping data for table `data_peminjaman_fasilitases`
--

INSERT INTO `data_peminjaman_fasilitases` (`id`, `status_pinjaman`, `user_id`, `data_fasilitas_id`, `jumlah_pinjaman`, `tanggal_pinjam`, `tanggal_kembali`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Ditolak', 2, 2, '1', '2023-11-26', '2023-11-28', 'Latihan Dasar Kepemimpinan', '2023-11-23 12:25:33', '2023-11-23 13:07:23'),
(3, 'Disetujui', 2, 4, '13', '2023-11-25', '2023-11-26', 'Muskom Teknik Informatika', '2023-11-23 12:38:49', '2023-11-23 14:53:30'),
(4, 'Disetujui', 2, 2, '2', '2023-11-29', '2023-11-30', 'Tournament MLBB', '2023-11-23 12:58:14', '2023-11-23 12:58:21'),
(5, 'Disetujui', 2, 4, '2', '2023-11-25', '2023-11-26', 'MUSTI & MUSMA DEMA FST', '2023-11-23 13:02:48', '2023-11-23 13:02:56'),
(6, 'Menunggu Persetujuan', 3, 4, '5', '2023-12-03', '2023-12-05', 'Pelatihan Kader', '2023-11-23 14:52:35', '2023-11-23 15:06:23');

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
(73, '2014_10_11_165726_create_roles_table', 1),
(74, '2014_10_12_000000_create_users_table', 1),
(75, '2014_10_12_100000_create_password_resets_table', 1),
(76, '2019_08_19_000000_create_failed_jobs_table', 1),
(77, '2023_03_16_045726_create_application_names_table', 1),
(78, '2023_11_22_120006_create_data_barangs_table', 1),
(79, '2023_11_22_203522_create_data_fasilitases_table', 1),
(80, '2023_11_22_212007_create_biodatas_table', 1),
(81, '2023_10_31_124258_create_narahubungs_table', 2),
(86, '2023_11_23_120718_create_data_peminjaman_barangs_table', 3),
(87, '2023_11_23_121826_create_data_peminjaman_fasilitases_table', 3);

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
(1, 'Hendra Ahmadillah', 1, 'hendrayna55@gmail.com', NULL, '$2y$10$XPShOrdHgOTStmiAnAvPPuB9aI/kWe8TiXoGBBw3AdIF0na8UDPkm', NULL, '2023-11-23 04:01:01', '2023-11-23 04:17:27'),
(2, 'Sabi Ardana', 2, 'sabiardana@gmail.com', NULL, '$2y$10$j8/RIa2Lx5PZdfjgmUeoL.N.TxpFmXBAKiMglbMycWsta3Ok8IIAe', NULL, '2023-11-23 04:28:21', '2023-11-23 04:28:21'),
(3, 'Nabhan Riqzulloh', 2, 'nabhanrizqu@gmail.com', NULL, '$2y$10$uFpLIp4r5wOypwtTJMGI.OKmBKY22bbT2nW4u1JCZOqf40WNsFJF.', NULL, '2023-11-23 14:36:39', '2023-11-23 14:36:39'),
(4, 'Vega Tiara Intena', 2, 'vegatiara@gmail.com', NULL, '$2y$10$uZAbfkqyIR2fsFRwlp6Xs.NP7djdsqtzrdE.ozeG8jM/zPAKcMYt2', NULL, '2023-11-23 16:20:19', '2023-11-23 16:20:19');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `data_barangs`
--
ALTER TABLE `data_barangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `data_fasilitases`
--
ALTER TABLE `data_fasilitases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `data_peminjaman_barangs`
--
ALTER TABLE `data_peminjaman_barangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `data_peminjaman_fasilitases`
--
ALTER TABLE `data_peminjaman_fasilitases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
