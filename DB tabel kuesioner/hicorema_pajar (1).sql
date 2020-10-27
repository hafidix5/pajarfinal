-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 27, 2020 at 02:45 PM
-- Server version: 10.3.24-MariaDB-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hicorema_pajar`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `puskesmas_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `anak`
--

CREATE TABLE `anak` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `usia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anak_ke` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pasien_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `anak`
--

INSERT INTO `anak` (`id`, `nama`, `tgl_lahir`, `usia`, `anak_ke`, `jenis_kelamin`, `pasien_id`, `created_at`, `updated_at`) VALUES
(1, 'putri', '2008-10-17', '12', '1', 'laki-laki', 2, NULL, NULL),
(2, 'Rendra', '2012-02-14', '8', '2', 'laki-laki', 2, NULL, NULL),
(3, 'A', '2020-10-02', '1', '1', 'perempuan', 3, NULL, NULL),
(4, 'reni', '2008-10-20', '12', '1', 'perempuan', 4, NULL, NULL),
(5, 'Putri', '2008-11-27', '12', '1', 'perempuan', 1, NULL, NULL),
(6, 'rewrewr', '2020-10-09', '3', '1', 'laki-laki', 5, NULL, NULL),
(7, 'Syahidan Ilmi', '2004-07-17', '16', '3', 'laki-laki', 7, NULL, NULL),
(8, 'Nurrahman Rizqi', '1998-10-21', '21', '2', 'laki-laki', 7, NULL, NULL),
(9, 'Atika Zahra Putri', '2008-11-27', '12', '1', 'perempuan', 9, NULL, NULL),
(10, 'Rafie', '2008-04-02', '12', '1', 'laki-laki', 10, NULL, NULL),
(12, 'rahma', '2014-02-05', '6', '2', 'laki-laki', 10, NULL, NULL),
(13, 'Najla', '2003-07-06', '17', '1', 'perempuan', 6, NULL, NULL),
(14, 'Najwa', '2007-05-02', '13', '2', 'perempuan', 6, NULL, NULL),
(15, 'Najra', '2012-02-01', '8', '3', 'perempuan', 6, NULL, NULL),
(16, 'Fanaya', '2013-12-09', '7', '4', 'perempuan', 6, NULL, NULL),
(17, 'Atika', '2008-02-11', '12', '1', 'perempuan', 11, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `detail_detekos`
--

CREATE TABLE `detail_detekos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `waktu` date NOT NULL,
  `jawaban` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pertanyaan_detekos_id` bigint(20) UNSIGNED NOT NULL,
  `anak_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_detekos`
--

INSERT INTO `detail_detekos` (`id`, `waktu`, `jawaban`, `pertanyaan_detekos_id`, `anak_id`, `created_at`, `updated_at`) VALUES
(1, '2020-10-15', '1', 1, 3, NULL, NULL),
(2, '2020-10-15', '0', 2, 3, NULL, NULL),
(3, '2020-10-15', '1', 3, 3, NULL, NULL),
(4, '2020-10-15', '0', 4, 3, NULL, NULL),
(5, '2020-10-15', '1', 5, 3, NULL, NULL),
(6, '2020-10-15', '0', 6, 3, NULL, NULL),
(7, '2020-10-15', '1', 7, 3, NULL, NULL),
(8, '2020-10-15', '1', 8, 3, NULL, NULL),
(9, '2020-10-15', '1', 9, 3, NULL, NULL),
(10, '2020-10-15', '0', 10, 3, NULL, NULL),
(11, '2020-10-21', '0', 1, 5, NULL, NULL),
(12, '2020-10-21', '0', 2, 5, NULL, NULL),
(13, '2020-10-21', '1', 3, 5, NULL, NULL),
(14, '2020-10-21', '1', 4, 5, NULL, NULL),
(15, '2020-10-21', '0', 5, 5, NULL, NULL),
(16, '2020-10-21', '0', 6, 5, NULL, NULL),
(17, '2020-10-21', '0', 7, 5, NULL, NULL),
(18, '2020-10-21', '0', 8, 5, NULL, NULL),
(19, '2020-10-21', '1', 9, 5, NULL, NULL),
(20, '2020-10-21', '0', 10, 5, NULL, NULL),
(21, '2020-10-22', '1', 1, 6, NULL, NULL),
(22, '2020-10-22', '1', 2, 6, NULL, NULL),
(23, '2020-10-22', '1', 3, 6, NULL, NULL),
(24, '2020-10-22', '1', 4, 6, NULL, NULL),
(25, '2020-10-22', '1', 5, 6, NULL, NULL),
(26, '2020-10-22', '1', 6, 6, NULL, NULL),
(27, '2020-10-22', '0', 7, 6, NULL, NULL),
(28, '2020-10-22', '1', 8, 6, NULL, NULL),
(29, '2020-10-22', '0', 9, 6, NULL, NULL),
(30, '2020-10-22', '1', 10, 6, NULL, NULL),
(31, '2020-10-26', '0', 1, 17, NULL, NULL),
(32, '2020-10-26', '0', 2, 17, NULL, NULL),
(33, '2020-10-26', '1', 3, 17, NULL, NULL),
(34, '2020-10-26', '1', 4, 17, NULL, NULL),
(35, '2020-10-26', '0', 5, 17, NULL, NULL),
(36, '2020-10-26', '0', 6, 17, NULL, NULL),
(37, '2020-10-26', '0', 7, 17, NULL, NULL),
(38, '2020-10-26', '0', 8, 17, NULL, NULL),
(39, '2020-10-26', '0', 9, 17, NULL, NULL),
(40, '2020-10-26', '0', 10, 17, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `detail_insting`
--

CREATE TABLE `detail_insting` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `waktu` date NOT NULL,
  `jawaban` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pertanyaan_insting_id` bigint(20) UNSIGNED NOT NULL,
  `anak_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_insting`
--

INSERT INTO `detail_insting` (`id`, `waktu`, `jawaban`, `pertanyaan_insting_id`, `anak_id`, `created_at`, `updated_at`) VALUES
(1, '2020-10-15', '1', 1, 3, NULL, NULL),
(2, '2020-10-15', '1', 2, 3, NULL, NULL),
(3, '2020-10-15', '1', 3, 3, NULL, NULL),
(4, '2020-10-15', '1', 4, 3, NULL, NULL),
(5, '2020-10-15', '0', 5, 3, NULL, NULL),
(6, '2020-10-15', '0', 6, 3, NULL, NULL),
(7, '2020-10-15', '0', 7, 3, NULL, NULL),
(8, '2020-10-15', '0', 8, 3, NULL, NULL),
(9, '2020-10-15', '0', 9, 3, NULL, NULL),
(10, '2020-10-20', '1', 1, 4, NULL, NULL),
(11, '2020-10-20', '0', 2, 4, NULL, NULL),
(12, '2020-10-20', '1', 3, 4, NULL, NULL),
(13, '2020-10-20', '1', 4, 4, NULL, NULL),
(14, '2020-10-20', '1', 5, 4, NULL, NULL),
(15, '2020-10-20', '1', 6, 4, NULL, NULL),
(16, '2020-10-20', '1', 7, 4, NULL, NULL),
(17, '2020-10-20', '0', 8, 4, NULL, NULL),
(18, '2020-10-20', '1', 9, 4, NULL, NULL),
(19, '2020-10-21', '1', 1, 5, NULL, NULL),
(20, '2020-10-21', '1', 2, 5, NULL, NULL),
(21, '2020-10-21', '0', 3, 5, NULL, NULL),
(22, '2020-10-21', '1', 4, 5, NULL, NULL),
(23, '2020-10-21', '1', 5, 5, NULL, NULL),
(24, '2020-10-21', '1', 6, 5, NULL, NULL),
(25, '2020-10-21', '1', 7, 5, NULL, NULL),
(26, '2020-10-21', '1', 8, 5, NULL, NULL),
(27, '2020-10-21', '1', 9, 5, NULL, NULL),
(28, '2020-10-21', '1', 10, 5, NULL, NULL),
(29, '2020-10-22', '1', 1, 4, NULL, NULL),
(30, '2020-10-22', '1', 2, 4, NULL, NULL),
(31, '2020-10-22', '1', 3, 4, NULL, NULL),
(32, '2020-10-22', '0', 4, 4, NULL, NULL),
(33, '2020-10-22', '1', 5, 4, NULL, NULL),
(34, '2020-10-22', '1', 6, 4, NULL, NULL),
(35, '2020-10-22', '1', 7, 4, NULL, NULL),
(36, '2020-10-22', '1', 8, 4, NULL, NULL),
(37, '2020-10-22', '1', 9, 4, NULL, NULL),
(38, '2020-10-22', '1', 10, 4, NULL, NULL),
(39, '2020-10-22', '1', 1, 6, NULL, NULL),
(40, '2020-10-22', '1', 2, 6, NULL, NULL),
(41, '2020-10-22', '1', 3, 6, NULL, NULL),
(42, '2020-10-22', '0', 4, 6, NULL, NULL),
(43, '2020-10-22', '1', 5, 6, NULL, NULL),
(44, '2020-10-22', '1', 6, 6, NULL, NULL),
(45, '2020-10-22', '0', 7, 6, NULL, NULL),
(46, '2020-10-22', '0', 8, 6, NULL, NULL),
(47, '2020-10-22', '0', 9, 6, NULL, NULL),
(48, '2020-10-22', '0', 10, 6, NULL, NULL),
(49, '2020-10-22', '1', 1, 5, NULL, NULL),
(50, '2020-10-22', '0', 2, 5, NULL, NULL),
(51, '2020-10-22', '1', 3, 5, NULL, NULL),
(52, '2020-10-22', '1', 4, 5, NULL, NULL),
(53, '2020-10-22', '1', 5, 5, NULL, NULL),
(54, '2020-10-22', '0', 6, 5, NULL, NULL),
(55, '2020-10-22', '1', 7, 5, NULL, NULL),
(56, '2020-10-22', '1', 8, 5, NULL, NULL),
(57, '2020-10-22', '1', 9, 5, NULL, NULL),
(58, '2020-10-22', '1', 10, 5, NULL, NULL),
(59, '2020-10-22', '0', 1, 7, NULL, NULL),
(60, '2020-10-22', '1', 2, 7, NULL, NULL),
(61, '2020-10-22', '0', 3, 7, NULL, NULL),
(62, '2020-10-22', '0', 4, 7, NULL, NULL),
(63, '2020-10-22', '0', 5, 7, NULL, NULL),
(64, '2020-10-22', '0', 6, 7, NULL, NULL),
(65, '2020-10-22', '0', 7, 7, NULL, NULL),
(66, '2020-10-22', '0', 8, 7, NULL, NULL),
(67, '2020-10-22', '0', 9, 7, NULL, NULL),
(68, '2020-10-22', '0', 10, 7, NULL, NULL),
(69, '2020-10-22', '0', 1, 7, NULL, NULL),
(70, '2020-10-22', '1', 2, 7, NULL, NULL),
(71, '2020-10-22', '0', 3, 7, NULL, NULL),
(72, '2020-10-22', '1', 4, 7, NULL, NULL),
(73, '2020-10-22', '1', 5, 7, NULL, NULL),
(74, '2020-10-22', '1', 6, 7, NULL, NULL),
(75, '2020-10-22', '0', 7, 7, NULL, NULL),
(76, '2020-10-22', '1', 8, 7, NULL, NULL),
(77, '2020-10-22', '0', 9, 7, NULL, NULL),
(78, '2020-10-22', '1', 10, 7, NULL, NULL),
(79, '2020-10-26', '0', 1, 10, NULL, NULL),
(80, '2020-10-26', '1', 2, 10, NULL, NULL),
(81, '2020-10-26', '0', 3, 10, NULL, NULL),
(82, '2020-10-26', '1', 4, 10, NULL, NULL),
(83, '2020-10-26', '1', 5, 10, NULL, NULL),
(84, '2020-10-26', '0', 6, 10, NULL, NULL),
(85, '2020-10-26', '1', 7, 10, NULL, NULL),
(86, '2020-10-26', '1', 8, 10, NULL, NULL),
(87, '2020-10-26', '1', 9, 10, NULL, NULL),
(88, '2020-10-26', '1', 10, 10, NULL, NULL),
(89, '2020-10-26', '0', 1, 13, NULL, NULL),
(90, '2020-10-26', '1', 2, 13, NULL, NULL),
(91, '2020-10-26', '0', 3, 13, NULL, NULL),
(92, '2020-10-26', '1', 4, 13, NULL, NULL),
(93, '2020-10-26', '1', 5, 13, NULL, NULL),
(94, '2020-10-26', '1', 6, 13, NULL, NULL),
(95, '2020-10-26', '0', 7, 13, NULL, NULL),
(96, '2020-10-26', '1', 8, 13, NULL, NULL),
(97, '2020-10-26', '0', 9, 13, NULL, NULL),
(98, '2020-10-26', '1', 10, 13, NULL, NULL),
(99, '2020-10-26', '1', 1, 17, NULL, NULL),
(100, '2020-10-26', '0', 2, 17, NULL, NULL),
(101, '2020-10-26', '0', 3, 17, NULL, NULL),
(102, '2020-10-26', '0', 4, 17, NULL, NULL),
(103, '2020-10-26', '1', 5, 17, NULL, NULL),
(104, '2020-10-26', '0', 6, 17, NULL, NULL),
(105, '2020-10-26', '1', 7, 17, NULL, NULL),
(106, '2020-10-26', '0', 8, 17, NULL, NULL),
(107, '2020-10-26', '0', 9, 17, NULL, NULL),
(108, '2020-10-26', '1', 10, 17, NULL, NULL),
(109, '2020-10-26', '0', 1, 7, NULL, NULL),
(110, '2020-10-26', '1', 2, 7, NULL, NULL),
(111, '2020-10-26', '0', 3, 7, NULL, NULL),
(112, '2020-10-26', '1', 4, 7, NULL, NULL),
(113, '2020-10-26', '1', 5, 7, NULL, NULL),
(114, '2020-10-26', '1', 6, 7, NULL, NULL),
(115, '2020-10-26', '1', 7, 7, NULL, NULL),
(116, '2020-10-26', '1', 8, 7, NULL, NULL),
(117, '2020-10-26', '1', 9, 7, NULL, NULL),
(118, '2020-10-26', '1', 10, 7, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `detail_ramodif`
--

CREATE TABLE `detail_ramodif` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `waktu` date NOT NULL,
  `jawaban` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pertanyaan_ramodif_id` bigint(20) UNSIGNED NOT NULL,
  `anak_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_ramodif`
--

INSERT INTO `detail_ramodif` (`id`, `waktu`, `jawaban`, `pertanyaan_ramodif_id`, `anak_id`, `created_at`, `updated_at`) VALUES
(1, '2020-10-15', '1', 1, 3, NULL, NULL),
(2, '2020-10-15', '0', 2, 3, NULL, NULL),
(3, '2020-10-15', '1', 3, 3, NULL, NULL),
(4, '2020-10-15', '0', 4, 3, NULL, NULL),
(5, '2020-10-15', '1', 5, 3, NULL, NULL),
(6, '2020-10-15', '1', 6, 3, NULL, NULL),
(7, '2020-10-15', '0', 7, 3, NULL, NULL),
(8, '2020-10-15', '1', 8, 3, NULL, NULL),
(9, '2020-10-15', '0', 9, 3, NULL, NULL),
(10, '2020-10-15', '1', 10, 3, NULL, NULL),
(11, '2020-10-15', '0', 11, 3, NULL, NULL),
(12, '2020-10-15', '1', 12, 3, NULL, NULL),
(13, '2020-10-15', '1', 13, 3, NULL, NULL),
(14, '2020-10-15', '0', 14, 3, NULL, NULL),
(15, '2020-10-15', '0', 15, 3, NULL, NULL),
(16, '2020-10-15', '1', 16, 3, NULL, NULL),
(17, '2020-10-15', '1', 17, 3, NULL, NULL),
(18, '2020-10-15', '1', 18, 3, NULL, NULL),
(19, '2020-10-15', '0', 19, 3, NULL, NULL),
(20, '2020-10-21', '1', 1, 5, NULL, NULL),
(21, '2020-10-21', '0', 2, 5, NULL, NULL),
(22, '2020-10-21', '1', 3, 5, NULL, NULL),
(23, '2020-10-21', '0', 4, 5, NULL, NULL),
(24, '2020-10-21', '0', 5, 5, NULL, NULL),
(25, '2020-10-21', '0', 6, 5, NULL, NULL),
(26, '2020-10-21', '0', 7, 5, NULL, NULL),
(27, '2020-10-21', '0', 8, 5, NULL, NULL),
(28, '2020-10-21', '0', 9, 5, NULL, NULL),
(29, '2020-10-21', '0', 10, 5, NULL, NULL),
(30, '2020-10-21', '0', 11, 5, NULL, NULL),
(31, '2020-10-21', '0', 12, 5, NULL, NULL),
(32, '2020-10-21', '0', 13, 5, NULL, NULL),
(33, '2020-10-21', '0', 14, 5, NULL, NULL),
(34, '2020-10-21', '0', 15, 5, NULL, NULL),
(35, '2020-10-21', '0', 16, 5, NULL, NULL),
(36, '2020-10-21', '0', 17, 5, NULL, NULL),
(37, '2020-10-21', '1', 18, 5, NULL, NULL),
(38, '2020-10-21', '0', 19, 5, NULL, NULL),
(39, '2020-10-22', '1', 1, 6, NULL, NULL),
(40, '2020-10-22', '1', 2, 6, NULL, NULL),
(41, '2020-10-22', '1', 3, 6, NULL, NULL),
(42, '2020-10-22', '1', 4, 6, NULL, NULL),
(43, '2020-10-22', '0', 5, 6, NULL, NULL),
(44, '2020-10-22', '1', 6, 6, NULL, NULL),
(45, '2020-10-22', '1', 7, 6, NULL, NULL),
(46, '2020-10-22', '1', 8, 6, NULL, NULL),
(47, '2020-10-22', '1', 9, 6, NULL, NULL),
(48, '2020-10-22', '0', 10, 6, NULL, NULL),
(49, '2020-10-22', '1', 11, 6, NULL, NULL),
(50, '2020-10-22', '1', 12, 6, NULL, NULL),
(51, '2020-10-22', '1', 13, 6, NULL, NULL),
(52, '2020-10-22', '1', 14, 6, NULL, NULL),
(53, '2020-10-22', '1', 15, 6, NULL, NULL),
(54, '2020-10-22', '1', 16, 6, NULL, NULL),
(55, '2020-10-22', '1', 17, 6, NULL, NULL),
(56, '2020-10-22', '1', 18, 6, NULL, NULL),
(57, '2020-10-22', '1', 19, 6, NULL, NULL),
(58, '2020-10-26', '0', 1, 17, NULL, NULL),
(59, '2020-10-26', '0', 2, 17, NULL, NULL),
(60, '2020-10-26', '0', 3, 17, NULL, NULL),
(61, '2020-10-26', '0', 4, 17, NULL, NULL),
(62, '2020-10-26', '0', 5, 17, NULL, NULL),
(63, '2020-10-26', '0', 6, 17, NULL, NULL),
(64, '2020-10-26', '0', 7, 17, NULL, NULL),
(65, '2020-10-26', '1', 8, 17, NULL, NULL),
(66, '2020-10-26', '1', 9, 17, NULL, NULL),
(67, '2020-10-26', '1', 10, 17, NULL, NULL),
(68, '2020-10-26', '1', 11, 17, NULL, NULL),
(69, '2020-10-26', '1', 12, 17, NULL, NULL),
(70, '2020-10-26', '1', 13, 17, NULL, NULL),
(71, '2020-10-26', '0', 14, 17, NULL, NULL),
(72, '2020-10-26', '0', 15, 17, NULL, NULL),
(73, '2020-10-26', '0', 16, 17, NULL, NULL),
(74, '2020-10-26', '0', 17, 17, NULL, NULL),
(75, '2020-10-26', '0', 18, 17, NULL, NULL),
(76, '2020-10-26', '0', 19, 17, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `detekos`
--

CREATE TABLE `detekos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_edukasi_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detekos`
--

INSERT INTO `detekos` (`id`, `nama`, `video`, `jenis_edukasi_id`, `created_at`, `updated_at`) VALUES
(1, 'Penyimpangan Seks', 'n0ypxFSmafs', 1, '2020-10-15 00:26:10', '2020-10-22 02:51:42');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `insting`
--

CREATE TABLE `insting` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_edukasi_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `insting`
--

INSERT INTO `insting` (`id`, `nama`, `video`, `jenis_edukasi_id`, `created_at`, `updated_at`) VALUES
(1, 'Mengenal Orientasi Seksual', 'MF7DLTKiNF4', 1, '2020-10-15 00:23:09', '2020-10-22 02:51:22');

-- --------------------------------------------------------

--
-- Table structure for table `jawaban_detekos`
--

CREATE TABLE `jawaban_detekos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `opsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bobot` bigint(20) NOT NULL,
  `pertanyaan_detekos_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jawaban_insting`
--

CREATE TABLE `jawaban_insting` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `opsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bobot` bigint(20) NOT NULL,
  `pertanyaan_insting_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jawaban_ramodif`
--

CREATE TABLE `jawaban_ramodif` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `opsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bobot` bigint(20) NOT NULL,
  `pertanyaan_ramodif_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_edukasi`
--

CREATE TABLE `jenis_edukasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `singkatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_wa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_edukasi`
--

INSERT INTO `jenis_edukasi` (`id`, `nama`, `singkatan`, `link_wa`, `created_at`, `updated_at`) VALUES
(1, 'Orientasi seksual', 'OS', 'https://chat.whatsapp.com/HtCPV1AF2MRDIPsthxfgNL', '2020-10-15 00:22:47', '2020-10-26 02:36:05');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_09_16_144731_create_pasien', 1),
(5, '2020_09_16_145557_create_puskesmas', 1),
(6, '2020_09_16_145634_create_anak', 1),
(7, '2020_09_16_145718_create_detail_insting', 1),
(8, '2020_09_16_145741_create_pertanyaan_insting', 1),
(9, '2020_09_16_145800_create_insting', 1),
(10, '2020_09_16_145819_detail_detekos', 1),
(11, '2020_09_16_145911_pertanyaan_detekos', 1),
(12, '2020_09_16_145927_detekos', 1),
(13, '2020_09_16_145957_detail_ramodif', 1),
(14, '2020_09_16_150021_pertanyaan_ramodif', 1),
(15, '2020_09_16_150035_ramodif', 1),
(16, '2020_09_16_150107_jawaban_insting', 1),
(17, '2020_09_16_150120_jawaban_detekos', 1),
(18, '2020_09_16_150133_jawaban_ramodif', 1),
(19, '2020_09_16_150337_jenis_edukasi', 1),
(20, '2020_09_18_112029_admin', 1),
(21, '2020_09_28_091056_create_testimoni', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendidikan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hp` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tinggal_dengan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_rumah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pasangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir_pasangan` date NOT NULL,
  `pekerjaan_pasangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendidikan_pasangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `puskesmas_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id`, `nama`, `tgl_lahir`, `jk`, `pendidikan`, `pekerjaan`, `hp`, `tinggal_dengan`, `alamat`, `status_rumah`, `nama_pasangan`, `tgl_lahir_pasangan`, `pekerjaan_pasangan`, `pendidikan_pasangan`, `puskesmas_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Lili', '1980-11-27', 'perempuan', 'SMP', 'Ibu rumah tangga', '082173858969', 'pasangan', 'tabing', 'sendiri', 'indra', '1975-08-21', 'Wiraswasta', 'SMA', 2, 2, NULL, NULL),
(2, 'Atika', '1981-08-21', 'perempuan', 'SMA', 'Ibu rumah tangga', '08126711585', 'pasangan', 'Tabing', 'sendiri', 'Robi', '1973-02-15', 'Wiraswasta', 'SMA', 2, 3, NULL, NULL),
(3, 'putra', '2020-10-02', 'laki-laki', 'Perguruan Tinggi', 'PNS', '085274503739', 'sendiri', 'padang', 'sendiri', '--', '2020-10-06', 'PNS', 'Perguruan Tinggi', 1, 4, NULL, NULL),
(4, 'zahra', '1996-10-20', 'perempuan', 'Tidak Sekolah', 'Ibu rumah tangga', '098765432109', 'pasangan', 'padang', 'pasangan', 'nurdin', '1982-10-20', 'Petani/Buruh', 'Tidak Sekolah', 1, 5, NULL, NULL),
(5, 'rina', '2020-10-05', 'laki-laki', 'Perguruan Tinggi', 'PNS', '085274503737', 'sendiri', 'padang', 'sendiri', 'ggdsfds', '2020-10-13', 'PNS', 'Perguruan Tinggi', 1, 6, NULL, NULL),
(6, 'Syofyan', '1971-11-23', 'laki-laki', 'Perguruan Tinggi', 'PNS', '081374406100', 'pasangan', 'Jl Cendrawasih no10 Air Tawar Barat Padang', 'anak', 'Misuziarti', '1976-03-24', 'Ibu rumah tangga', 'Perguruan Tinggi', 2, 7, NULL, NULL),
(7, 'Sukmayenti', '1975-05-24', 'perempuan', 'Perguruan Tinggi', 'Ibu rumah tangga', '082169093795', 'pasangan', 'Griya elok residence, blok C1 no.3', 'sendiri', 'Fajri usman', '1966-04-05', 'PNS', 'Perguruan Tinggi', 1, 8, NULL, NULL),
(8, 'Randy Refnandes', '1986-12-24', 'laki-laki', 'Perguruan Tinggi', 'PNS', '081374314721', 'pasangan', 'Komplek unand blok b', 'pasangan', 'Rizkika Ridho Illahi', '1989-03-05', 'Wiraswasta', 'Perguruan Tinggi', 1, 10, NULL, NULL),
(9, 'Indra', '1963-08-21', 'laki-laki', 'Perguruan Tinggi', 'PNS', '082283151066', 'pasangan', 'Berlindo tabing', 'sendiri', 'Lili Fajria', '1970-10-13', 'PNS', 'Perguruan Tinggi', 2, 13, NULL, NULL),
(10, 'Reni Prima Gusty', '1978-08-22', 'laki-laki', 'Perguruan Tinggi', 'PNS', '083187300018', 'sendiri', 'tabing', 'anak', 'sidik', '1974-12-10', 'PNS', 'Perguruan Tinggi', 2, 14, NULL, NULL),
(11, 'Elnita', '1968-10-09', 'perempuan', 'Perguruan Tinggi', 'PNS', '081363326109', 'pasangan', 'Lubuk gading IV', 'sendiri', 'Yasmon', '1965-07-10', 'Wiraswasta', 'Perguruan Tinggi', 2, 15, NULL, NULL);

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
-- Table structure for table `pertanyaan_detekos`
--

CREATE TABLE `pertanyaan_detekos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pertanyaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detekos_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pertanyaan_detekos`
--

INSERT INTO `pertanyaan_detekos` (`id`, `pertanyaan`, `detekos_id`, `created_at`, `updated_at`) VALUES
(1, 'Apakah anak ayah/ibu pernah mengungkapkan tertarik pada jenis kelamin yang sama', 1, '2020-10-15 00:26:32', '2020-10-15 00:26:32'),
(2, 'Apakah anak ayah/ibu menyukai permainan berlawanan dengan jenis kelaminnya', 1, '2020-10-15 00:26:48', '2020-10-15 00:26:48'),
(3, 'Apakah anak ayah /ibu mengidolakan seseorang yang sama jenis kelaminnya', 1, '2020-10-15 00:27:03', '2020-10-15 00:27:03'),
(4, 'Apakah anak ayah/ibu menyukai karakter film yang berbeda dengan jenis kelaminnya', 1, '2020-10-15 00:27:15', '2020-10-15 00:27:15'),
(5, 'Apakah penampilan anak ayah/ibu dalam berpakaian berbeda dengan jenis kelaminnya', 1, '2020-10-15 00:27:26', '2020-10-15 00:27:26'),
(6, 'Apakah Kesukaan/hobi anak ayah/ibu berbeda dengan jenis kelaminnya', 1, '2020-10-15 00:27:38', '2020-10-15 00:27:38'),
(7, 'Apakah anak ayah/ibu lebih suka berteman dengan lawan jenisnya', 1, '2020-10-15 00:27:52', '2020-10-15 00:27:52'),
(8, 'Apakah anak ayah/ibu bertingkahlaku berbeda dengan jenis kelaminnya', 1, '2020-10-15 00:28:05', '2020-10-15 00:28:05'),
(9, 'Apakah anak ayah/ibu mempunyai kebiasaan menonton/membaca  yang berbau pornografi', 1, '2020-10-15 00:28:17', '2020-10-15 00:28:17'),
(10, 'Apakah anak ayah/ibu pernah mengatakan tidak menyukai jenis kelaminnya', 1, '2020-10-15 00:28:28', '2020-10-15 00:28:28');

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaan_insting`
--

CREATE TABLE `pertanyaan_insting` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pertanyaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `insting_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pertanyaan_insting`
--

INSERT INTO `pertanyaan_insting` (`id`, `pertanyaan`, `insting_id`, `created_at`, `updated_at`) VALUES
(1, 'Tertarik pada lawan jenis dapat dikatakan orientasi seksual menyimpang', 1, '2020-10-15 00:23:42', '2020-10-15 00:23:42'),
(2, 'Pengasuhan orangtua dapat menentukan orientasi seksual pada anak', 1, '2020-10-15 00:23:54', '2020-10-15 00:23:54'),
(3, 'Orientasi seksual seseorang tidak bisa berubah', 1, '2020-10-15 00:24:08', '2020-10-15 00:24:08'),
(4, 'Pergaulan anak dengan sesama jenis pada usia <10 tahun dapat merubah orientasi seksual anak', 1, '2020-10-15 00:24:22', '2020-10-15 00:24:22'),
(5, 'Ketertarikan pada jenis permainan  berbeda dengan jenis kelaminnya saat usia 6 tahun bisa dikatakan orientasi seksual  berbeda', 1, '2020-10-15 00:24:37', '2020-10-15 00:24:37'),
(6, 'Anak yang sering dikelilingi orang-orang sekitar dengan jenis kelamin berbeda dengannya akan mempengaruhi  orientasi seksual anak', 1, '2020-10-15 00:24:50', '2020-10-21 05:44:44'),
(7, 'Keterlibatan tokoh ayah dalam pengasuhan akan mengubah orientasi seksual anak', 1, '2020-10-15 00:25:03', '2020-10-15 00:25:03'),
(8, 'Tontonan pornografi saat pubertas akan mempengaruhi orientasi seksual', 1, '2020-10-15 00:25:16', '2020-10-15 00:25:16'),
(9, 'Mengetahui tokoh idola anak dapat menggambarkan orientasi seksualnya', 1, '2020-10-15 00:25:36', '2020-10-15 00:25:36'),
(10, 'Pengalaman pernah mengalami pelecehan seksual akan mempengaruhi orientasi seksual anak', 1, '2020-10-21 05:42:43', '2020-10-21 05:42:43');

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaan_ramodif`
--

CREATE TABLE `pertanyaan_ramodif` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pertanyaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ramodif_id` bigint(20) UNSIGNED NOT NULL,
  `tahap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pertanyaan_ramodif`
--

INSERT INTO `pertanyaan_ramodif` (`id`, `pertanyaan`, `ramodif_id`, `tahap`, `created_at`, `updated_at`) VALUES
(1, 'ayah/ibu sudah mampu merespon/menjelaskan dengan tepat saat anak bertanya tentang : Seks', 1, '1.responding', '2020-10-15 00:29:27', '2020-10-15 00:29:27'),
(2, 'ayah/ibu sudah mampu merespon/menjelaskan dengan tepat saat anak bertanya tentang : Perkawinan', 1, '1.responding', '2020-10-15 00:29:51', '2020-10-15 00:29:51'),
(3, 'ayah/ibu sudah mampu merespon/menjelaskan dengan tepat saat anak bertanya tentang : Pacaran', 1, '1.responding', '2020-10-15 00:30:09', '2020-10-15 00:30:09'),
(4, 'ayah/ibu sudah mampu merespon/menjelaskan dengan tepat saat anak bertanya tentang : Kelahiran', 1, '1.responding', '2020-10-15 00:30:22', '2020-10-15 00:30:22'),
(5, 'ayah/ibu sudah mampu merespon/menjelaskan dengan tepat saat anak bertanya tentang : Banci/Bencong', 1, '1.responding', '2020-10-15 00:30:41', '2020-10-15 00:30:41'),
(6, 'ayah/ibu sudah mampu mencegah anak dalam hal : Permainan beresiko', 1, '2.preventing', '2020-10-15 00:31:06', '2020-10-15 00:31:06'),
(7, 'ayah/ibu sudah mampu mencegah anak dalam hal : Pergaulan Bebas', 1, '2.preventing', '2020-10-15 00:31:27', '2020-10-15 00:31:27'),
(8, 'ayah/ibu sudah mampu mencegah anak dalam hal : Penampilan yang berbeda dengan jenis kelaminnya', 1, '2.preventing', '2020-10-15 00:31:53', '2020-10-15 00:31:53'),
(9, 'ayah/ibu sudah mampu mengawasi/mengontrol tentang : Pertemanan yang tidak sehat', 1, '3.monitoring', '2020-10-15 00:32:26', '2020-10-15 00:32:26'),
(10, 'ayah/ibu sudah mampu mengawasi/mengontrol tentang : Penggunaan gadget ke arah yang positif', 1, '3.monitoring', '2020-10-15 00:33:00', '2020-10-15 00:33:00'),
(11, 'ayah/ibu sudah mampu mengawasi/mengontrol tentang : Aktifitas belajar anak', 1, '3.monitoring', '2020-10-15 00:33:30', '2020-10-15 00:33:30'),
(12, 'ayah/ibu sudah mampu mengawasi/mengontrol tentang : Aktifitas ibadah anak', 1, '3.monitoring', '2020-10-15 00:33:54', '2020-10-15 00:33:54'),
(13, 'ayah/ibu sudah mampu mengajarkan anak tentang : Pemanfaatan waktu yang baik', 1, '4.mentoring', '2020-10-15 00:34:18', '2020-10-15 00:34:18'),
(14, 'ayah/ibu sudah mampu mengajarkan anak tentang : Disiplin', 1, '4.mentoring', '2020-10-15 00:34:46', '2020-10-15 00:34:46'),
(15, 'ayah/ibu sudah mampu mengajarkan anak tentang : Menjalankan ibadah tepat waktu', 1, '4.mentoring', '2020-10-15 00:35:08', '2020-10-15 00:35:08'),
(16, 'ayah/ibu sudah mampu melakukan : Menghindari marah/percecokan didepan anak', 1, '5.modeling', '2020-10-15 00:35:34', '2020-10-15 00:35:34'),
(17, 'ayah/ibu sudah mampu melakukan : Menjalankan ibadah tepat waktu', 1, '5.modeling', '2020-10-15 00:35:57', '2020-10-15 00:35:57'),
(18, 'ayah/ibu sudah mampu melakukan : Berbicara dengan nada yang sesuai', 1, '5.modeling', '2020-10-15 00:36:19', '2020-10-15 00:36:19'),
(19, 'ayah/ibu sudah mampu melakukan : Bertanggungjawab dengan peran', 1, '5.modeling', '2020-10-15 00:36:43', '2020-10-15 00:36:43');

-- --------------------------------------------------------

--
-- Table structure for table `puskesmas`
--

CREATE TABLE `puskesmas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `puskesmas`
--

INSERT INTO `puskesmas` (`id`, `nama`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'Pauh', 'Kecamatan Pauh', '2020-10-15 00:22:11', '2020-10-15 00:22:11'),
(2, 'Lubuk Buaya', 'Lubuk Buaya, Padang', '2020-10-15 00:22:32', '2020-10-15 00:22:32'),
(3, 'Ulak Karang', 'Padang utara', '2020-10-22 06:24:03', '2020-10-22 06:24:03'),
(4, 'Kuranji', 'Kuranji', '2020-10-22 06:24:26', '2020-10-22 06:24:26'),
(5, 'Andalas', 'Andalas', '2020-10-22 06:25:08', '2020-10-22 06:25:08');

-- --------------------------------------------------------

--
-- Table structure for table `ramodif`
--

CREATE TABLE `ramodif` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_edukasi_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ramodif`
--

INSERT INTO `ramodif` (`id`, `nama`, `video`, `jenis_edukasi_id`, `created_at`, `updated_at`) VALUES
(1, 'Penyimpangan Seks', 'Qo7XqyLATiY', 1, '2020-10-15 00:28:47', '2020-10-22 02:52:00');

-- --------------------------------------------------------

--
-- Table structure for table `testimoni`
--

CREATE TABLE `testimoni` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detekos_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimoni`
--

INSERT INTO `testimoni` (`id`, `nama`, `video`, `detekos_id`, `created_at`, `updated_at`) VALUES
(1, 'Testimoni 1', 'FE1bes0LTJM', 1, '2020-10-15 00:41:13', '2020-10-15 00:41:13'),
(2, 'Testimoni 2', 'KFfxS_SKpiM', 1, '2020-10-15 00:41:30', '2020-10-15 00:41:30'),
(3, 'Testimoni 3', 'Ru0Lv6uKNiY', 1, '2020-10-15 00:41:44', '2020-10-15 00:41:44'),
(4, 'Testimoni 4', 'i5ok5ZQ_hXA', 1, '2020-10-15 00:42:00', '2020-10-15 00:42:00'),
(5, 'Testimoni 5', 'UGd05XnrO4E', 1, '2020-10-15 00:42:14', '2020-10-15 00:42:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '081363850449', NULL, '$2y$10$AA77QhqBALt3uqcJIoDPZOn1PrX2xQfEExYSVrNLBbuq2i/evGZui', '2', NULL, '2020-10-15 00:17:14', '2020-10-15 00:17:14'),
(2, 'Lili', '082173858969', NULL, '$2y$10$42xU8Yt8OxUPWIk2CW/wv.SXoQe6Y1L87NmLV7v02ZYMgBZEJr1h2', '1', NULL, '2020-10-15 02:58:27', '2020-10-15 02:58:27'),
(3, 'Atika', '08126711585', NULL, '$2y$10$DTdH8zg4gH6FwvDwI.QCWOtINRvWcw1/WR0goN8.HU/NpIzTLX/.S', '1', NULL, '2020-10-15 03:36:04', '2020-10-15 03:36:04'),
(4, 'putra', '085274503739', NULL, '$2y$10$faQMup6MdFyUcCY.1adc2OPCxTWLlbXSZ8wOi.gmpLNNpLuvM2NwS', '1', NULL, '2020-10-15 05:47:58', '2020-10-15 05:47:58'),
(5, 'zahra', '081363952463', NULL, '$2y$10$AA77QhqBALt3uqcJIoDPZOn1PrX2xQfEExYSVrNLBbuq2i/evGZui', '1', NULL, '2020-10-20 02:19:41', '2020-10-20 02:19:41'),
(6, 'rina', '085274503737', NULL, '$2y$10$9coQXx9PeHajL.BQTIkaoueUyutACdS7lGVgtZJZpO0e5cDBHhpe6', '1', NULL, '2020-10-21 21:26:26', '2020-10-21 21:26:26'),
(7, 'Syofyan', '081374406100', NULL, '$2y$10$.FKmGGcfiNplgJf9qhBwqOiNoikjMYx462HF8y9mGvoxoGNVzepOW', '1', NULL, '2020-10-22 03:35:06', '2020-10-22 03:35:06'),
(8, 'Sukmayenti', '082169093795', NULL, '$2y$10$rPrB6OS.ec0YjN7LOOLjpuLYuimpWw7lsBm75yf0hgGiA81//6.8i', '1', NULL, '2020-10-22 03:54:46', '2020-10-22 03:54:46'),
(9, 'Reni Prima Gusty', '085263681561', NULL, '$2y$10$ujLoxoQJUSEIR5dupie4sOfe3dr4c6KUYPjGXZrnmq.4UJ14RjvZ.', '1', NULL, '2020-10-22 15:44:57', '2020-10-22 15:44:57'),
(10, 'Randy Refnandes', '081374314721', NULL, '$2y$10$rX5sv8Vg6qezXSM2mTCGruf.kB7gahdRVsuXjHtPZHDzZWE9s6aEu', '1', NULL, '2020-10-23 09:40:45', '2020-10-23 09:40:45'),
(11, 'Nurprima Masido', '081371011907', NULL, '$2y$10$8Ht.Py1zoVgsifbvlLy8iu.TQzpzBjuwjtF6HDjRJfiXNwMXu3Pxm', '1', NULL, '2020-10-23 21:28:45', '2020-10-23 21:28:45'),
(12, 'tes', '085274505050', NULL, '$2y$10$DVkpThEKS5egETWmucCIIOc7nXHr5QOXJIy2FvD4x3W4x5O6TeiAG', '1', NULL, '2020-10-25 02:08:10', '2020-10-25 02:08:10'),
(13, 'Indra', '082283151066', NULL, '$2y$10$272tY9IHdBwKWyvKKb5hVuU8AuKXQTXyD.mS5hQJsLzlv.nzq/PFu', '1', NULL, '2020-10-25 04:51:03', '2020-10-25 04:51:03'),
(14, 'Reni Prima Gusty', '083187300018', NULL, '$2y$10$ZKNaQgT0g1YkCoWPfkiNTeIFcp4Ac2JODbmuJKoi1QnYagh3gcAZO', '1', NULL, '2020-10-25 21:06:37', '2020-10-25 21:06:37'),
(15, 'Elnita', '081363326109', NULL, '$2y$10$6YoS4vMKU./Tvb8MIvYyN.sSt9CdyGgi8fPMVhntyoQxzvLW3krEa', '1', NULL, '2020-10-26 01:12:22', '2020-10-26 01:12:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_hp_unique` (`hp`),
  ADD UNIQUE KEY `admin_user_id_unique` (`user_id`),
  ADD KEY `admin_puskesmas_id_foreign` (`puskesmas_id`);

--
-- Indexes for table `anak`
--
ALTER TABLE `anak`
  ADD PRIMARY KEY (`id`),
  ADD KEY `anak_pasien_id_foreign` (`pasien_id`);

--
-- Indexes for table `detail_detekos`
--
ALTER TABLE `detail_detekos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_detekos_anak_id_foreign` (`anak_id`),
  ADD KEY `detail_detekos_pertanyaan_detekos_id_foreign` (`pertanyaan_detekos_id`);

--
-- Indexes for table `detail_insting`
--
ALTER TABLE `detail_insting`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_insting_anak_id_foreign` (`anak_id`),
  ADD KEY `detail_insting_pertanyaan_insting_id_foreign` (`pertanyaan_insting_id`);

--
-- Indexes for table `detail_ramodif`
--
ALTER TABLE `detail_ramodif`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_ramodif_anak_id_foreign` (`anak_id`),
  ADD KEY `detail_ramodif_pertanyaan_ramodif_id_foreign` (`pertanyaan_ramodif_id`);

--
-- Indexes for table `detekos`
--
ALTER TABLE `detekos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detekos_jenis_edukasi_id_foreign` (`jenis_edukasi_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `insting`
--
ALTER TABLE `insting`
  ADD PRIMARY KEY (`id`),
  ADD KEY `insting_jenis_edukasi_id_foreign` (`jenis_edukasi_id`);

--
-- Indexes for table `jawaban_detekos`
--
ALTER TABLE `jawaban_detekos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jawaban_insting`
--
ALTER TABLE `jawaban_insting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jawaban_ramodif`
--
ALTER TABLE `jawaban_ramodif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_edukasi`
--
ALTER TABLE `jenis_edukasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pasien_user_id_unique` (`user_id`),
  ADD KEY `pasien_puskesmas_id_foreign` (`puskesmas_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pertanyaan_detekos`
--
ALTER TABLE `pertanyaan_detekos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pertanyaan_detekos_detekos_id_foreign` (`detekos_id`);

--
-- Indexes for table `pertanyaan_insting`
--
ALTER TABLE `pertanyaan_insting`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pertanyaan_insting_insting_id_foreign` (`insting_id`);

--
-- Indexes for table `pertanyaan_ramodif`
--
ALTER TABLE `pertanyaan_ramodif`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pertanyaan_ramodif_ramodif_id_foreign` (`ramodif_id`);

--
-- Indexes for table `puskesmas`
--
ALTER TABLE `puskesmas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ramodif`
--
ALTER TABLE `ramodif`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ramodif_jenis_edukasi_id_foreign` (`jenis_edukasi_id`);

--
-- Indexes for table `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`id`),
  ADD KEY `testimoni_detekos_id_foreign` (`detekos_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `anak`
--
ALTER TABLE `anak`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `detail_detekos`
--
ALTER TABLE `detail_detekos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `detail_insting`
--
ALTER TABLE `detail_insting`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `detail_ramodif`
--
ALTER TABLE `detail_ramodif`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `detekos`
--
ALTER TABLE `detekos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `insting`
--
ALTER TABLE `insting`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jawaban_detekos`
--
ALTER TABLE `jawaban_detekos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jawaban_insting`
--
ALTER TABLE `jawaban_insting`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jawaban_ramodif`
--
ALTER TABLE `jawaban_ramodif`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis_edukasi`
--
ALTER TABLE `jenis_edukasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pertanyaan_detekos`
--
ALTER TABLE `pertanyaan_detekos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pertanyaan_insting`
--
ALTER TABLE `pertanyaan_insting`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pertanyaan_ramodif`
--
ALTER TABLE `pertanyaan_ramodif`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `puskesmas`
--
ALTER TABLE `puskesmas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ramodif`
--
ALTER TABLE `ramodif`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_puskesmas_id_foreign` FOREIGN KEY (`puskesmas_id`) REFERENCES `puskesmas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `admin_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `anak`
--
ALTER TABLE `anak`
  ADD CONSTRAINT `anak_pasien_id_foreign` FOREIGN KEY (`pasien_id`) REFERENCES `pasien` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_detekos`
--
ALTER TABLE `detail_detekos`
  ADD CONSTRAINT `detail_detekos_anak_id_foreign` FOREIGN KEY (`anak_id`) REFERENCES `anak` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_detekos_pertanyaan_detekos_id_foreign` FOREIGN KEY (`pertanyaan_detekos_id`) REFERENCES `pertanyaan_detekos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_insting`
--
ALTER TABLE `detail_insting`
  ADD CONSTRAINT `detail_insting_anak_id_foreign` FOREIGN KEY (`anak_id`) REFERENCES `anak` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_insting_pertanyaan_insting_id_foreign` FOREIGN KEY (`pertanyaan_insting_id`) REFERENCES `pertanyaan_insting` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_ramodif`
--
ALTER TABLE `detail_ramodif`
  ADD CONSTRAINT `detail_ramodif_anak_id_foreign` FOREIGN KEY (`anak_id`) REFERENCES `anak` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_ramodif_pertanyaan_ramodif_id_foreign` FOREIGN KEY (`pertanyaan_ramodif_id`) REFERENCES `pertanyaan_ramodif` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detekos`
--
ALTER TABLE `detekos`
  ADD CONSTRAINT `detekos_jenis_edukasi_id_foreign` FOREIGN KEY (`jenis_edukasi_id`) REFERENCES `jenis_edukasi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `insting`
--
ALTER TABLE `insting`
  ADD CONSTRAINT `insting_jenis_edukasi_id_foreign` FOREIGN KEY (`jenis_edukasi_id`) REFERENCES `jenis_edukasi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pasien`
--
ALTER TABLE `pasien`
  ADD CONSTRAINT `pasien_puskesmas_id_foreign` FOREIGN KEY (`puskesmas_id`) REFERENCES `puskesmas` (`id`),
  ADD CONSTRAINT `pasien_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `pertanyaan_detekos`
--
ALTER TABLE `pertanyaan_detekos`
  ADD CONSTRAINT `pertanyaan_detekos_detekos_id_foreign` FOREIGN KEY (`detekos_id`) REFERENCES `detekos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pertanyaan_insting`
--
ALTER TABLE `pertanyaan_insting`
  ADD CONSTRAINT `pertanyaan_insting_insting_id_foreign` FOREIGN KEY (`insting_id`) REFERENCES `insting` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pertanyaan_ramodif`
--
ALTER TABLE `pertanyaan_ramodif`
  ADD CONSTRAINT `pertanyaan_ramodif_ramodif_id_foreign` FOREIGN KEY (`ramodif_id`) REFERENCES `ramodif` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ramodif`
--
ALTER TABLE `ramodif`
  ADD CONSTRAINT `ramodif_jenis_edukasi_id_foreign` FOREIGN KEY (`jenis_edukasi_id`) REFERENCES `jenis_edukasi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `testimoni`
--
ALTER TABLE `testimoni`
  ADD CONSTRAINT `testimoni_detekos_id_foreign` FOREIGN KEY (`detekos_id`) REFERENCES `detekos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
