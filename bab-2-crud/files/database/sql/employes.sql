-- Import lewat phpMyAdmin / mysql CLI sebelum mencoba CRUD (Bab CRUD).
-- Catatan: setelah Bab Migration dikerjakan, tabel ini akan dibuat ulang
-- oleh `php artisan migrate:fresh --seed`.
CREATE DATABASE IF NOT EXISTS `company` CHARACTER SET utf8mb4;
USE `company`;

CREATE TABLE IF NOT EXISTS `employes` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `gender` enum('L','P') DEFAULT NULL,
  `gaji` int(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `employes` (`nama`, `alamat`, `gender`, `gaji`, `created_at`, `updated_at`) VALUES
('Anton', 'Surabaya', 'L', 100000, NOW(), NOW()),
('Ani',   'Malang',   'P', 250000, NOW(), NOW());
