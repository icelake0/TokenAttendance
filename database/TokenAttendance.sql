-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 05, 2019 at 08:41 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `TokenAttendance`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `token_id` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `student_id`, `token_id`, `updated_at`, `created_at`) VALUES
(1, 2, 1, '2018-10-30 09:00:54', '2018-10-30 09:00:54'),
(2, 2, 111, '2018-11-08 08:25:33', '2018-10-30 09:01:04'),
(3, 2, 160, '2018-11-08 12:51:08', '2018-10-30 09:01:09'),
(4, 3, 40, '2018-11-01 16:01:18', '2018-11-01 16:01:18');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `course_id`, `date`, `time`, `created_by`, `updated_at`, `created_at`) VALUES
(1, 2, '2018-10-17', '23:11:00', 4, '2018-10-28 19:52:20', '2018-10-28 19:52:20'),
(4, 1, '2018-10-11', '16:00:00', 4, '2018-10-28 20:57:36', '2018-10-28 20:57:36'),
(5, 3, '2018-11-02', '14:02:00', 5, '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(6, 2, '2018-11-07', '00:22:00', 4, '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(7, 2, '2018-11-18', '14:32:00', 4, '2018-11-08 15:01:18', '2018-11-08 15:01:18');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `code` varchar(8) NOT NULL,
  `unit` int(2) NOT NULL,
  `section` varchar(16) NOT NULL,
  `semester` int(2) NOT NULL,
  `reg_key` varchar(16) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `title`, `code`, `unit`, `section`, `semester`, `reg_key`, `updated_by`, `created_by`, `updated_at`, `created_at`) VALUES
(1, 'Digital Computer I', 'CPE203', 2, '2014/2015', 2, 'DSFSTD101', 4, 4, '2018-11-09 10:55:15', '2018-10-26 20:34:26'),
(2, 'Digital Computer II', 'CPE204', 2, '2014/2015', 2, 'DSFSTD102', 4, 4, '2018-11-09 10:55:27', '2018-10-26 20:35:09'),
(3, 'Introduction to computer networking', 'csc517', 3, '2014/2015', 1, '517', 5, 5, '2019-02-05 06:21:01', '2018-11-01 15:50:52'),
(4, 'computer graphics', 'cpe514', 2, '2014/2015', 1, '11111', 6, 6, '2019-01-23 10:01:17', '2019-01-23 10:01:17');

-- --------------------------------------------------------

--
-- Table structure for table `course_lecturer`
--

CREATE TABLE `course_lecturer` (
  `id` int(11) NOT NULL,
  `lecturer_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_lecturer`
--

INSERT INTO `course_lecturer` (`id`, `lecturer_id`, `course_id`) VALUES
(1, 4, 1),
(4, 4, 2),
(5, 5, 3),
(6, 4, 3),
(7, 5, 1),
(8, 6, 4),
(9, 5, 4);

-- --------------------------------------------------------

--
-- Table structure for table `course_student`
--

CREATE TABLE `course_student` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_student`
--

INSERT INTO `course_student` (`id`, `course_id`, `student_id`) VALUES
(7, 2, 2),
(8, 3, 3),
(9, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `lecturers`
--

CREATE TABLE `lecturers` (
  `id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `aos` varchar(255) DEFAULT NULL,
  `office_address` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lecturers`
--

INSERT INTO `lecturers` (`id`, `user_id`, `title`, `aos`, `office_address`, `updated_at`, `created_at`) VALUES
(4, 3, 'prof', 'Internet Of Things', 'Room 4 Department of computer science and engineering OAU ie-ife osun state nigeria', '2018-10-26 19:39:47', '2018-10-26 19:39:47'),
(5, 5, 'mr', 'software development', 'room209', '2018-11-01 15:48:31', '2018-11-01 15:48:31'),
(6, 7, 'prof.', 'Internet Of Things', 'hghghfdg', '2019-01-23 09:59:31', '2019-01-23 09:59:31');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_03_10_194343_entrust_setup_tables', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'SuperAdmin', 'The System SuperAdmin', '2018-03-10 00:00:00', '2018-03-10 00:00:00'),
(2, 'admin', 'Admin', 'An Admin in The System', '2018-03-10 00:00:00', '2018-03-10 00:00:00'),
(3, 'parent', 'Parent', 'A parent that can have students', '2018-03-10 00:00:00', '2018-03-10 00:00:00'),
(4, 'student', 'Student', 'A Student ', '2018-03-10 00:00:00', '2018-03-10 00:00:00'),
(5, 'lecturer', 'Lecturer', 'A Lecturer', '2018-03-10 00:00:00', '2018-03-10 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 4),
(2, 3),
(3, 5),
(5, 5),
(6, 4),
(7, 5);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `reg_number` varchar(32) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `user_id`, `reg_number`, `updated_at`, `created_at`) VALUES
(2, 1, 'CSC/2014/095', '2018-10-27 20:46:50', '2018-10-27 20:46:50'),
(3, 6, 'CSC/2014/123', '2018-11-08 16:10:59', '2018-11-01 15:54:27');

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `token` varchar(16) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`id`, `class_id`, `token`, `updated_at`, `created_at`) VALUES
(1, 4, 'k25QuDI1t7WyRIQ3', '2018-10-28 20:57:36', '2018-10-28 20:57:36'),
(2, 4, 'YH6W2RbQ2ZfhxMgB', '2018-10-28 20:57:36', '2018-10-28 20:57:36'),
(3, 4, '47jvZlY7zWAdzsHK', '2018-10-28 20:57:36', '2018-10-28 20:57:36'),
(4, 4, 'mR4FHKjW5cNYfVCx', '2018-10-28 20:57:36', '2018-10-28 20:57:36'),
(5, 4, '3BLgtGY86OG8NLHR', '2018-10-28 20:57:36', '2018-10-28 20:57:36'),
(6, 4, 'gbei2zsmyaKJWgIj', '2018-10-28 20:57:36', '2018-10-28 20:57:36'),
(7, 4, 'lKBUYoVzjxYvrjyN', '2018-10-28 20:57:36', '2018-10-28 20:57:36'),
(8, 4, 'OLTIPYDrwYUFmqIH', '2018-10-28 20:57:36', '2018-10-28 20:57:36'),
(9, 4, 'lo2AokVvpnXlgpV4', '2018-10-28 20:57:36', '2018-10-28 20:57:36'),
(10, 4, 'iZaUd6UJmEgHaOYP', '2018-10-28 20:57:36', '2018-10-28 20:57:36'),
(11, 5, 'SQAul6k9LlJDEVCf', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(12, 5, 'GY9AiqqA32stRtgG', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(13, 5, 'RZYWhbMGRQZZ1akW', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(14, 5, 'J349iMn74ByeqsiI', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(15, 5, 'OwUa6FcKHyRo094Y', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(16, 5, '1fQiaEg0qzDwWnpy', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(17, 5, '0c3OSVRIhtOfMoe7', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(18, 5, 'blwxbzchX7H0hJOj', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(19, 5, 'qLejhycEDTE6D2Bb', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(20, 5, 'n5jXUb4CdSH2Fk2b', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(21, 5, 'jBsLl5TmOSPrx7c2', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(22, 5, '9WdbUxTPlPmjBUK3', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(23, 5, '1VxkfTJB2vK0yhL1', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(24, 5, 'pMOqK71mwmuH1VB9', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(25, 5, 'sfplLXVgBSy0SmHR', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(26, 5, '6mUrgNaeXk6TgARX', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(27, 5, 'qQ89jnezCw1X7r7J', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(28, 5, 'Yi9SRRBXmjOfNjbx', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(29, 5, 'rHTLfa1BV8Ju95H8', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(30, 5, 'M8ueQ27LL2Wcinv1', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(31, 5, 'Qhz7HnmKoUOHYTZa', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(32, 5, 'QKcJ2DCO3FIaqyez', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(33, 5, 'AYbgBKgOvyGo3FGR', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(34, 5, 'LZNThS2sR12ipdHH', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(35, 5, 'b5F4EDGES9pMAv3O', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(36, 5, 'MM2q0Mm5Le20BvfJ', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(37, 5, 'UsvgiNay2va3ZuNw', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(38, 5, '7vpShkp0QVI56Q7Z', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(39, 5, 'gs6bANCKNNFAmY2s', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(40, 5, '5PzqPJtB03tiOT2E', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(41, 5, 'jMpi6f55j1yAiBni', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(42, 5, '8rnKnYZFKL247ntP', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(43, 5, 'dyzjYChBuk1zlkFc', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(44, 5, 'SSyo7gdCoHxmPjOd', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(45, 5, 'NUxtmoHttronhwvy', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(46, 5, 'svYEmS3mWMi09o4z', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(47, 5, 'Uw3EIg1Fmg8gVx12', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(48, 5, 'dPkS4My35d9bfKxb', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(49, 5, 'Jn0BuUoJUsojvZAL', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(50, 5, 'hdyUCSDPINvvFJMS', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(51, 5, 'mPiLIVIQHFrOCdao', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(52, 5, 'yuUSPXuuwSJuwvnn', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(53, 5, 'qq1TshY3Q7lQJyoZ', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(54, 5, 'OF8HgF541mVyyeCU', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(55, 5, 'H9FKn4FZI92lOYtN', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(56, 5, 'fbbDQwGYpAoqjBa3', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(57, 5, 'vO54vMxQ352LybVU', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(58, 5, 'YY1esZtktqPLPKq3', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(59, 5, '00bbHaMqRutQa6BE', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(60, 5, '2QXvcdSqCzoZv6KI', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(61, 5, 'YAcgPaMJVVgIz8CR', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(62, 5, 'Ncw7Rrk8DGcjs6qY', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(63, 5, '9tbn0brHGhjYWObp', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(64, 5, '0Eu9aUBg0qs6GGXB', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(65, 5, 'Xu8EIBCnx8MDYuHs', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(66, 5, 'ReWVvos90mz7g5x7', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(67, 5, 'HXDoHwN4CDFt0Ozi', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(68, 5, 'tkRkncxUo4dP2i5w', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(69, 5, 'urToVsIEeqZWx9kx', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(70, 5, '972zH9QGZtKDF3Rz', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(71, 5, 'y4pzYW7BRbZSPAPO', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(72, 5, 'pqKv61dBCkVEOB95', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(73, 5, 'Y4iK5z73FADGOXqB', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(74, 5, 'UxhohcEv6rEdtOKp', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(75, 5, 'EEksLIykyT6Mk1Yz', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(76, 5, '4AFhuRk0Fyi6fyAx', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(77, 5, 'KOxWuIxqmkA0kubd', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(78, 5, 'ya5V1zSvrotgvkbi', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(79, 5, 'r7b7oiTWSonnql18', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(80, 5, 'PcO3pjtD6ghMQrBf', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(81, 5, '2OZ55wor7FZU4kjz', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(82, 5, 'bgqssRo0ePeUCMAu', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(83, 5, 'GMFyk5t3Izkd9PQ0', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(84, 5, 'U7hzaL8LXutxI64T', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(85, 5, 'BLNQkhRpDN7MS5Dm', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(86, 5, 'zAiQhxl9C9P7deU1', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(87, 5, '5BGlIHL2yJXvEXxo', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(88, 5, '5wl1241g9pI8sOMg', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(89, 5, 'aZCjbd6zQnefv4Nz', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(90, 5, '2PO6AcdaXnEVqW2I', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(91, 5, 'IcwLlHXg8YYeKUIK', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(92, 5, 'z7cocO4NWHYoBKp0', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(93, 5, 'AlzKtq3vsyDYhXMV', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(94, 5, 'k0D6f5PCWrdlFE2U', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(95, 5, 'dOJ27A7bmeIKzB7L', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(96, 5, 'TVUcRWoZQgnjers4', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(97, 5, 'KH2epMWRinmxXPO6', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(98, 5, '1ChNGii81pMzkMXV', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(99, 5, '1kYy9bfI1ONm3dax', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(100, 5, 'kTOLGQPNLSHTZw9X', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(101, 5, '8dwHc0lExamHQEqq', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(102, 5, 'hla9iO67euhbujw3', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(103, 5, '61HpeYnrXeGaBBpi', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(104, 5, 'zwqD2vTmn69wb1eA', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(105, 5, 'xs7cPgTW8vjWIfHc', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(106, 5, 'XrTCoEL8Daa9WAjw', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(107, 5, 'KPBJBLW2rE6crW30', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(108, 5, 'BSeqj26CWDi1uhzu', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(109, 5, 'ltKiyVHBLeXLh3KY', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(110, 5, 'iBzl4J1Rl76mLvnJ', '2018-11-01 15:57:18', '2018-11-01 15:57:18'),
(111, 1, 'rjydF7FmHffXN3KC', '2018-11-08 15:46:36', '2018-11-08 06:59:50'),
(112, 6, 'gH3LN0NAaBlyuoOM', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(113, 6, 'oU3Y1zBYT7oXaqIv', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(114, 6, '6Wd5WAvLD1tDIWcF', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(115, 6, 'ARbKHNjALHAYvr12', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(116, 6, '7RgzfBFNTUzrxcnK', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(117, 6, 'wDi1d99cL4AKfxod', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(118, 6, 'whCY6CQ96aTKRbdx', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(119, 6, 'lrtjZSF5E15iscDT', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(120, 6, 'cKym5un252KnldhA', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(121, 6, 'lglcEjQfkSnVGtgE', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(122, 6, 'xbEdRInhxJA4Iy1I', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(123, 6, 'wxbaHdjucXEQbfwC', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(124, 6, 'IeQ1fUNrhuFAS6QT', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(125, 6, 'oq1eGUpQgspQTEly', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(126, 6, '9ATAuSnoDAPxqjb3', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(127, 6, '98QkfuoVKLNYg4JF', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(128, 6, '8pjT3aHg5PGO6Ndh', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(129, 6, 'UEexsZoXl2vB7vYY', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(130, 6, 'x93TpFhsWrqOSfH8', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(131, 6, '8By1SUnJa5MzxyZ0', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(132, 6, 'iEvydYJGsRZ20QLU', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(133, 6, 'eN8itizmwRHiCtbx', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(134, 6, 'lF6n1gwyM7EBov2b', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(135, 6, 'rxk9ynQC8AmCaVjf', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(136, 6, '2G9X0qA7qfS4Rxep', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(137, 6, 'I1aNus2dXiEkOwaG', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(138, 6, 'LCC6mReaiCn2Gk0d', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(139, 6, '1kk0WkZG0Ub1orhU', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(140, 6, 'lzw4p7JKwHeNYnqa', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(141, 6, '25dgn8KB5yssR3Yh', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(142, 6, 'Do0dy8X3fmRmtUVN', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(143, 6, 'JzTSvSRR4vtXFNzd', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(144, 6, '1OBOnUngG9W85amE', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(145, 6, 'l2DBYMJMw7tTH7Vu', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(146, 6, 'X01ZJ7LmepRkHAtK', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(147, 6, 'Fb19nl2tDtTiEHUV', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(148, 6, 'LD0PMKoSvK52kGJw', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(149, 6, '1OkMeMTY0CsbFnfw', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(150, 6, 'PWIX2BiM46ojDn3V', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(151, 6, 'hsT8S8OVSP1gRU1e', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(152, 6, 'GNbCkhOIZlmoseJG', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(153, 6, 'vHSpWFlUrvt0bHT6', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(154, 6, 'Sc6D59JQjCNCFaqX', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(155, 6, 'c1k8iorgcqt6gf07', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(156, 6, 'LEQLhQvs54WQBo9f', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(157, 6, 'X63scnTrabuKPE7W', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(158, 6, 'qCAxGVEnWpip9Lv6', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(159, 6, 'NEog2uJPkY0aNNEI', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(160, 6, 'glctk0Qkh8HsfJdN', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(161, 6, 'hqYM8AsBdQYay0Oo', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(162, 6, '3siVOZBAcTKn2ZXq', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(163, 6, 'PYEPRs5QiEAyWWDA', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(164, 6, 'LzIh8yVdej23w46v', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(165, 6, 'NxJvBoKlChu5R8kV', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(166, 6, 'UMm5AhXyf8AYWXaA', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(167, 6, 'cctfka6xpQkrnITa', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(168, 6, 'LLJmXUrIIMlyZzmS', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(169, 6, '7uoHBnLw0vmSLoIY', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(170, 6, 'i5pUvD9gRidI5SHM', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(171, 6, '3DqoWEmhLVjmuX04', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(172, 6, 'zFyIWMOVFqhI1fPo', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(173, 6, 'T34eM7epSwXRDw9t', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(174, 6, 'lZHyVK3CSl3fxjvP', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(175, 6, 'QGA7htXbOh6FvWiL', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(176, 6, 'X0lUc5DjMMc4eEov', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(177, 6, 'sEJdjUMG7Xl7IikV', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(178, 6, 'MAjHujARkSZJqoSd', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(179, 6, 'Kj8anScjiZDLhXWO', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(180, 6, 'Z8IGjbSOLJfy1bfM', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(181, 6, 'Pojj96AEU2xjTVGP', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(182, 6, 'gReoZOIvOVHDYd8a', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(183, 6, 'QY7t8vYjExJy3bp6', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(184, 6, 'FnOZXpXfE6pqeCJw', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(185, 6, '38F3zl7aLV0FYK5Y', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(186, 6, 'lqfJv5YBOZDub1U0', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(187, 6, 'qPqMCoDpZJdMuOv1', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(188, 6, 'BMfXxM332Rh12QGL', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(189, 6, 'kQQCTCTiwGf19ZRN', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(190, 6, '5yzmZ410ItVHE1aB', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(191, 6, '1n3OduKGYH0WPEG2', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(192, 6, 'MIGDyPsXN5FcBl9c', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(193, 6, 'wEIxRNQUOg64yvu6', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(194, 6, 'CqIYtBQbtYTOwTuG', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(195, 6, 'Xgb6T8ecIQV5JvFc', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(196, 6, 'IZELsYtFHCTYtEHn', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(197, 6, 'h9woHsWeupkuxTY2', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(198, 6, '2sNh8XBV4JaSusP1', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(199, 6, '4nXJKhShER9Ney3c', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(200, 6, 'b7Ir3ZhUcitaXO1Y', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(201, 6, 'BGCBxSJPUuBW5KHA', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(202, 6, 'w36LSMbrq6Zs8BKC', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(203, 6, 'HxQChBtvTCWnQHBa', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(204, 6, 'wIqmmCqYRXcgoF5U', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(205, 6, 'lJIyoBaMptmFSAeq', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(206, 6, 'RJFamMM9AMm7AUUu', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(207, 6, '3CFE7F5D8cn2ARMz', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(208, 6, 'GVwuWcjFv1OYgZNl', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(209, 6, 'f1JXs8YkD1DKMDOP', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(210, 6, 'daSaExisQ9kInmt0', '2018-11-08 06:59:50', '2018-11-08 06:59:50'),
(211, 7, 'jf5uZjg94nDfKihK', '2018-11-08 15:01:18', '2018-11-08 15:01:18'),
(212, 7, 'iC85IChn3IpN15mQ', '2018-11-08 15:01:18', '2018-11-08 15:01:18'),
(213, 7, 'uaBecEtrqE3SptZm', '2018-11-08 15:01:18', '2018-11-08 15:01:18'),
(214, 7, 'xCEm7YUA7geZqYM0', '2018-11-08 15:01:18', '2018-11-08 15:01:18'),
(215, 7, 'EsfOqIsxWHipWBOQ', '2018-11-08 15:01:18', '2018-11-08 15:01:18'),
(216, 7, '3Ev4slTxVWKK52Ei', '2018-11-08 15:01:18', '2018-11-08 15:01:18'),
(217, 7, 'NRsyVahBFmvu21mz', '2018-11-08 15:01:18', '2018-11-08 15:01:18'),
(218, 7, 'mYmPV3DX29f2DJhg', '2018-11-08 15:01:18', '2018-11-08 15:01:18'),
(219, 7, 'kNBVcX2ztKsoVbZd', '2018-11-08 15:01:18', '2018-11-08 15:01:18'),
(220, 7, 'ICLlVZ0FaoNOuiYW', '2018-11-08 15:01:18', '2018-11-08 15:01:18'),
(221, 7, 'Ua7M7BWSpoFKxvND', '2018-11-08 15:01:18', '2018-11-08 15:01:18'),
(222, 7, 'uVknhjuYwbthopnG', '2018-11-08 15:01:18', '2018-11-08 15:01:18'),
(223, 7, 'nRhACwVdFlCtflk4', '2018-11-08 15:01:18', '2018-11-08 15:01:18'),
(224, 7, 'VUwX8114ganSXsED', '2018-11-08 15:01:18', '2018-11-08 15:01:18'),
(225, 7, 'K0WLtZEMWhZ1nHr4', '2018-11-08 15:01:18', '2018-11-08 15:01:18'),
(226, 7, 'ufFJidmikc6wYsDj', '2018-11-08 15:01:18', '2018-11-08 15:01:18'),
(227, 7, 'irubJwhbGhkGJtxO', '2018-11-08 15:01:18', '2018-11-08 15:01:18'),
(228, 7, '7a6tLOWlXbGG6YfB', '2018-11-08 15:01:18', '2018-11-08 15:01:18'),
(229, 7, 'B95ETgFj9KQd10QS', '2018-11-08 15:01:18', '2018-11-08 15:01:18'),
(230, 7, 'bn7Bw6ojJAzaOLMT', '2018-11-08 15:01:18', '2018-11-08 15:01:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '/avatars/default.png',
  `phone` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nearest_busstop` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_me` longtext COLLATE utf8mb4_unicode_ci,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `avatar`, `phone`, `address`, `nearest_busstop`, `city`, `state`, `about_me`, `password`, `provider`, `provider_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ajiboye Gbemileke', 'ajiboyeag@gmail.com', '/avatars/1541788403pEpa6sEwFQ.jpg', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$b8me267ixZTd7x9QpUtovuJvNlHLRgidpDRLlpIB9dK7lUrpxiAeO', 'facebook', '1653802854673038', 'YA2HTsglUWgO6KlNDnNP1qn6dezF03hQbu2J4EVVvz0xj8KAvw7zPayPCbG4', '2018-03-11 07:18:01', '2018-11-09 17:33:23'),
(2, 'tester1 tester1', 'tester1@tester.com', '/avatars/default.png', '08181909681', '1 testerhome, tester, tester', 'tester1 bustop', 'lagos', 'Lagos', 'all about tester1 and everything about tester1', '$2y$10$UZFlm3EYpHy8EdgjPht.TeNrNq512XD1SA7mErUx197uVy.q2dTMO', NULL, NULL, 'NT0vbn6syiSyA0pYEreNsl9a5GNXbZ3EJuDeRlD6kyVTxvqK13FzCvaeUZIm', '2018-04-19 13:21:52', '2018-05-01 16:27:26'),
(3, 'ICELAKE Zero', 'icelake0@gmail.com', '/avatars/1524988568OQ4asi7yJz.jpg', '08080069909', '14, ajose street, shomolu, lagos', 'onipan busstop', 'shomolu', 'Lagos', 'i love killing cat, i swe killing cat is my hubbt i love killing cat, i swe killing cat is my hubbt i love killing cat, i swe killing cat is my hubbt i love killing cat, i swe killing cat is my hubbt v i love killing cat, i swe killing cat is my hubbt i love killing cat, i swe killing cat is my hubbt i love killing cat, i swe killing cat is my hubbt i love killing cat, i swe killing cat is my hubbt i love killing cat, i swe killing cat is my hubbt i love killing cat, i swe killing cat is my hubbt i love killing cat, i swe killing cat is my hubbt i love killing cat, i swe killing cat is my hubbt', '$2y$10$b8me267ixZTd7x9QpUtovuJvNlHLRgidpDRLlpIB9dK7lUrpxiAeO', NULL, NULL, '2HpfnuVY0zGzw5wKpVAZzemHmriJY0iYKd0gwaYbLHdehpPf5Uc5YGcVAKib', '2018-04-21 15:39:06', '2018-05-01 03:48:43'),
(4, 'OLUBISI DAVID', 'oludavidconnect@gmail.com', '/avatars/default.png', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$KZmV/snBa8D9iKtfSIL8gO0FnRnAIh5rdX36iG76wwUSXUSL3V6Ky', NULL, NULL, NULL, '2018-05-17 09:33:46', '2018-05-17 09:33:46'),
(5, 'Folarin AdeOla olaseyi', 'lecturer1@gmail.com', '/avatars/default.png', 'lecturer1@gmail.com', 'may home address', NULL, NULL, NULL, NULL, '$2y$10$FnsN.E5NXv6b09vK60tzL.zf8qLpHu11hLd9cS45eNvt7HIyGTn4m', NULL, NULL, 'I3MHJjjs0B4hOJTiFWe0ehRvkiwNgOZ615xrKwEW3m4g1mQU2Gv00gPQEBlg', '2018-11-01 15:47:32', '2018-11-09 17:29:44'),
(6, 'student1', 'student1@gmail.com', '/avatars/default.png', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$FAmcFgPJ2iJ/Gu7fICFPPOBQtyqKyeUD9i5hzIkSSHwOzshDMqyEy', NULL, NULL, NULL, '2018-11-01 15:53:50', '2018-11-01 15:53:50'),
(7, 'lecturer10', 'lecturer10@gmail.com', '/avatars/default.png', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$fwqrPfCwlSYxsRGjQrK54.7SStcWEaReQS/uIZhloZn4iRtAXSL4a', NULL, NULL, NULL, '2019-01-23 09:58:54', '2019-01-23 09:58:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `token_id` (`token_id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_lecturer`
--
ALTER TABLE `course_lecturer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `lecturer_id` (`lecturer_id`);

--
-- Indexes for table `course_student`
--
ALTER TABLE `course_student`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `lecturers`
--
ALTER TABLE `lecturers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `students_ibfk_1` (`user_id`);

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_id` (`class_id`);

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
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `course_lecturer`
--
ALTER TABLE `course_lecturer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `course_student`
--
ALTER TABLE `course_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `lecturers`
--
ALTER TABLE `lecturers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=231;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendances`
--
ALTER TABLE `attendances`
  ADD CONSTRAINT `attendances_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `attendances_ibfk_2` FOREIGN KEY (`token_id`) REFERENCES `tokens` (`id`);

--
-- Constraints for table `classes`
--
ALTER TABLE `classes`
  ADD CONSTRAINT `classes_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`);

--
-- Constraints for table `course_lecturer`
--
ALTER TABLE `course_lecturer`
  ADD CONSTRAINT `course_lecturer_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `course_lecturer_ibfk_2` FOREIGN KEY (`lecturer_id`) REFERENCES `lecturers` (`id`);

--
-- Constraints for table `course_student`
--
ALTER TABLE `course_student`
  ADD CONSTRAINT `course_student_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `course_student_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);

--
-- Constraints for table `lecturers`
--
ALTER TABLE `lecturers`
  ADD CONSTRAINT `lecturers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `tokens`
--
ALTER TABLE `tokens`
  ADD CONSTRAINT `tokens_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
