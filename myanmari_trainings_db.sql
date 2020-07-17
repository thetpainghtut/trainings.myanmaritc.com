-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 05, 2020 at 12:55 AM
-- Server version: 10.2.26-MariaDB-cll-lve
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myanmari_trainings_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `batches`
--

CREATE TABLE `batches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `time` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `batches`
--

INSERT INTO `batches` (`id`, `title`, `startdate`, `enddate`, `time`, `course_id`, `created_at`, `updated_at`) VALUES
(2, 'Batch 2', '2020-01-20', '2020-02-28', '9-5', 2, '2020-01-15 07:44:49', '2020-01-15 07:44:49'),
(14, 'Batch 14', '2020-01-20', '2020-03-10', '9-5', 1, '2020-01-15 07:44:49', '2020-01-15 07:44:49');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `outline` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fees` int(11) NOT NULL,
  `during` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `logo`, `outline`, `fees`, `during`, `duration`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'PHP Bootcamp', '/storage/images/1579235803.png', '-slkjfksdf\r\n-skjfhjksdhfkj', 280000, 'monday-friday', '2 months', NULL, '2020-01-16 22:06:43', '2020-01-18 07:43:40'),
(2, 'Android Bootcamp', '/storage/images/1579238923.jpg', '-lskjhfjksdf\r\n-lkshjfjkshf', 300000, 'monday-friday', '2 months', NULL, '2020-01-16 22:58:43', '2020-01-16 22:58:43');

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
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `batch_id`, `created_at`, `updated_at`) VALUES
(1, 'Future Innoviation', 14, '2020-01-19 22:59:34', '2020-01-19 22:59:34'),
(2, 'Century', 14, '2020-01-19 23:00:54', '2020-01-19 23:00:54'),
(3, 'Perfect', 14, '2020-01-19 23:02:25', '2020-01-19 23:02:25'),
(4, 'ITLG ( IT Lord Group )', 14, '2020-01-19 23:03:21', '2020-01-19 23:03:21'),
(5, 'Infinity', 14, '2020-01-21 01:36:50', '2020-01-21 01:36:50'),
(6, 'Union', 14, '2020-01-21 01:47:47', '2020-01-21 01:47:47'),
(7, 'Focus', 14, '2020-01-21 19:01:54', '2020-01-21 19:01:54');

-- --------------------------------------------------------

--
-- Table structure for table `group_student`
--

CREATE TABLE `group_student` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `group_student`
--

INSERT INTO `group_student` (`id`, `group_id`, `student_id`, `created_at`, `updated_at`) VALUES
(1, 1, 3, '2020-01-19 22:59:35', '2020-01-19 22:59:35'),
(2, 1, 9, '2020-01-19 22:59:35', '2020-01-19 22:59:35'),
(3, 1, 8, '2020-01-19 22:59:35', '2020-01-19 22:59:35'),
(4, 1, 17, '2020-01-19 22:59:35', '2020-01-19 22:59:35'),
(5, 1, 18, '2020-01-19 22:59:35', '2020-01-19 22:59:35'),
(6, 1, 21, '2020-01-19 22:59:35', '2020-01-19 22:59:35'),
(7, 1, 34, '2020-01-19 22:59:35', '2020-01-19 22:59:35'),
(8, 2, 12, '2020-01-19 23:00:54', '2020-01-19 23:00:54'),
(9, 2, 13, '2020-01-19 23:00:54', '2020-01-19 23:00:54'),
(10, 2, 15, '2020-01-19 23:00:54', '2020-01-19 23:00:54'),
(11, 2, 24, '2020-01-19 23:00:54', '2020-01-19 23:00:54'),
(12, 2, 25, '2020-01-19 23:00:54', '2020-01-19 23:00:54'),
(13, 2, 36, '2020-01-19 23:00:54', '2020-01-19 23:00:54'),
(14, 2, 37, '2020-01-19 23:00:54', '2020-01-19 23:00:54'),
(15, 3, 2, '2020-01-19 23:02:25', '2020-01-19 23:02:25'),
(16, 3, 7, '2020-01-19 23:02:25', '2020-01-19 23:02:25'),
(17, 3, 23, '2020-01-19 23:02:25', '2020-01-19 23:02:25'),
(18, 3, 29, '2020-01-19 23:02:25', '2020-01-19 23:02:25'),
(19, 3, 30, '2020-01-19 23:02:25', '2020-01-19 23:02:25'),
(20, 3, 32, '2020-01-19 23:02:25', '2020-01-19 23:02:25'),
(21, 3, 38, '2020-01-19 23:02:25', '2020-01-19 23:02:25'),
(22, 4, 10, '2020-01-19 23:03:21', '2020-01-19 23:03:21'),
(23, 4, 16, '2020-01-19 23:03:21', '2020-01-19 23:03:21'),
(24, 4, 20, '2020-01-19 23:03:21', '2020-01-19 23:03:21'),
(25, 4, 22, '2020-01-19 23:03:21', '2020-01-19 23:03:21'),
(26, 4, 27, '2020-01-19 23:03:21', '2020-01-19 23:03:21'),
(27, 4, 28, '2020-01-19 23:03:21', '2020-01-19 23:03:21'),
(28, 4, 40, '2020-01-19 23:03:21', '2020-01-19 23:03:21'),
(29, 5, 31, '2020-01-21 01:36:50', '2020-01-21 01:36:50'),
(30, 5, 35, '2020-01-21 01:36:50', '2020-01-21 01:36:50'),
(31, 5, 41, '2020-01-21 01:36:50', '2020-01-21 01:36:50'),
(32, 5, 42, '2020-01-21 01:36:50', '2020-01-21 01:36:50'),
(33, 5, 43, '2020-01-21 01:36:50', '2020-01-21 01:36:50'),
(34, 5, 45, '2020-01-21 01:36:50', '2020-01-21 01:36:50'),
(35, 6, 1, '2020-01-21 01:47:47', '2020-01-21 01:47:47'),
(36, 6, 5, '2020-01-21 01:47:47', '2020-01-21 01:47:47'),
(37, 6, 6, '2020-01-21 01:47:47', '2020-01-21 01:47:47'),
(38, 6, 14, '2020-01-21 01:47:47', '2020-01-21 01:47:47'),
(39, 6, 39, '2020-01-21 01:47:47', '2020-01-21 01:47:47'),
(40, 6, 46, '2020-01-21 01:47:47', '2020-01-21 01:47:47'),
(41, 7, 4, '2020-01-21 19:01:54', '2020-01-21 19:01:54'),
(42, 7, 11, '2020-01-21 19:01:54', '2020-01-21 19:01:54'),
(43, 7, 19, '2020-01-21 19:01:54', '2020-01-21 19:01:54'),
(44, 7, 26, '2020-01-21 19:01:54', '2020-01-21 19:01:54'),
(45, 7, 33, '2020-01-21 19:01:54', '2020-01-21 19:01:54'),
(46, 7, 44, '2020-01-21 19:01:54', '2020-01-21 19:01:54');

-- --------------------------------------------------------

--
-- Table structure for table `mentors`
--

CREATE TABLE `mentors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `profile` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `portfolio` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mentors`
--

INSERT INTO `mentors` (`id`, `user_id`, `profile`, `portfolio`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(2, 4, NULL, 'www.heinminhtet.com', '0987654321', '-Hlaing', '2020-01-18 08:24:20', '2020-01-18 08:24:20');

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
(5, '2020_01_15_073925_create_batches_table', 2),
(6, '2020_01_15_090258_create_subjects_table', 3),
(7, '2020_01_15_084648_create_students_table', 4),
(8, '2020_01_15_154958_create_student_subject_table', 4),
(11, '2020_01_16_080303_create_mentors_table', 6),
(12, '2020_01_16_092250_create_permission_tables', 7),
(13, '2020_01_14_033248_create_courses_table', 8),
(14, '2020_01_18_163155_create_groups_table', 9),
(15, '2020_01_18_163439_create_group_student_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(2, 'App\\User', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2020-01-16 09:38:53', '2020-01-16 09:38:53'),
(2, 'Mentor', 'web', '2020-01-16 09:38:53', '2020-01-16 09:38:53');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `namee` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namem` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `education` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `accepted_year` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch_id` bigint(20) UNSIGNED NOT NULL,
  `p1` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p1_phone` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p1_relationship` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p2` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p2_phone` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p2_relationship` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `because` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `namee`, `namem`, `email`, `phone`, `address`, `education`, `city`, `accepted_year`, `dob`, `gender`, `batch_id`, `p1`, `p1_phone`, `p1_relationship`, `p2`, `p2_phone`, `p2_relationship`, `because`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Thet Paing Phyo', 'သက်ပိုင်ဖြိုး', 'thetpaingphyo.tpp@gmail.com', '09768874756', 'R/5, Shwe Myint Zu Street, Shwe Pone Nhyat Avenue, Bayint Naung Road', 'HND Level 5', 'Yangon', '2020', '1995-08-11', 'male', 14, 'U Ko Htay', '09261767271', 'Father', 'Daw Khin Shwe', '095127727', 'Mother', 'To get a job.', NULL, '2020-01-19 20:34:22', '2020-01-19 20:34:22'),
(2, 'Wai Yan Tun', 'Wai Yan Tun', 'waiyantun412578@gmail.com', '095182962', '60B, Strand Road, Ahlone Tsp,Yangon', 'Fourth Year ( E-major)', 'Yangin', '-', '1995-03-15', 'male', 14, 'Daw SandarWin', '098566062', 'Monther', 'U Min Thet Naing', '09962997000', 'Father', 'to get job.', NULL, '2020-01-19 20:35:25', '2020-01-19 20:35:25'),
(3, 'Hsu Yati Khin', 'ဆုရတီခင်', 'hsuyatikhin8820@gmail.com', '09421162929', '644(A), Than Thu Mar Road, 10 Quarter, South Okkalapa Township, Yangon.', 'HND at Info Myanmar University', 'Yangon', '2019', '2000-08-08', 'female', 14, 'U Khin Maw', '09250229567', 'Father', 'Daw Tin Tin Naing', '09251117853', 'Mother', 'To learn about Laravel.', NULL, '2020-01-19 20:36:19', '2020-01-19 20:36:19'),
(4, 'wai han phyo', 'ဝေဟန်ဖြိုး', 'waiphyo132018@gmail.com', '09785213094', 'No4A nar nat taw street- shwe kain na yee housing', 'L5-DC', 'Yangon', '2018', '1999-04-18', 'male', 14, 'Daw nan su', '095213094', 'Mother', 'U khin zaw', '092003866', 'Father', 'အလုပ်အာမခံချက်ကောင်း\r\nလုပ်ငန်းခွင်projectများအားလက်တွေ့ကျကျသင်ကြားပေးခြင်း', NULL, '2020-01-19 20:36:46', '2020-01-19 20:36:46'),
(5, 'Mg Htet Ko', 'မောင်ထက်ကို', 'htetko510217@gmail.com', '09975524545', 'U Thin Phay\' street ,No 21', 'BE-EC', 'Hlaing Township', '2019', '1995-11-25', 'male', 14, 'Daw Than Mya', '09446272023', 'Mother', 'Ko Chit San Ko', '09951996593', 'brother', 'I think Myanmar It Consulting can make to be a good web developer', NULL, '2020-01-19 20:36:47', '2020-01-19 20:36:47'),
(6, 'HKA SAN ING', 'HKA SAN ING', 'asandure06@gmail.com', '09956234865', '5/11  7 FLOOR TARMWE YANGON', 'B.SC (COMPUTER SCIENCE)', 'YANGON', '2020', '1996-11-02', 'female', 14, 'HKAWN MAI', '095021319', 'Sister', 'KAW TAWNG', '0943051165', 'MOTHER', 'this class would be better than other class', NULL, '2020-01-19 20:37:39', '2020-01-19 20:37:39'),
(7, 'Thar Htoo', 'သာထူး', 'iterdare.2977@gmail.com', '09450042974', 'No(662/A),Padauk Myaing St. Shwe Pyi Thar Township,Yangon', 'B.A(English)', 'Yangon', '2019', '1999-06-04', 'male', 14, 'U Htain Win', '09450042974', 'Father', 'Daw Tin Tin Htay', '09402373442', 'Mother', 'Facebook and Friends', NULL, '2020-01-19 20:38:01', '2020-01-19 20:38:01'),
(8, 'Thet Naing Htun', 'သက်နိုင်ထွန်း', 'thetnainghtun2077@gmail.com', '09966149996', 'Myittar Rd, South Okklapa, Yangon', 'B.E Aerospace(Avionics)', 'Meiktila', '2019', '1994-01-07', 'male', 14, 'U Kyaw Naing', '09402787570', 'Father', 'U Kaung Myat Htun', '09977792971', 'Brother', 'I think that I will be learnt necessary skill set about web development during one month.', NULL, '2020-01-19 20:38:37', '2020-01-19 20:38:37'),
(9, 'Htet Ko Oo', 'ထက်ကိုဉီး', 'htetko.2992@gmail.com', '09979426202', '163/A,Second Floor,Pinya 10 streets,5 Block,South Okkalap', 'Diploma in Web Development', 'Yangon', '2017', '1992-08-29', 'male', 14, 'U Thein Tun Oo', '09978996997', 'Father', 'U Thein Tun Oo', '09978996997', 'Father', 'Recommended from friend', NULL, '2020-01-19 20:39:27', '2020-01-19 20:39:27'),
(10, 'Mg Kaung Myat Thway', 'Kaung Myat Thway', 'kaungmyatthway1997@gmail.com', '09420702780', 'No(31/A).Laydaungkanroad,Thingangyun Township,Yangon', 'B.A(Psychology)', 'Yangon', '2018', '1997-01-05', 'male', 14, 'U Win Set', '09421001891', 'Father', 'Daw Ei Ei Than', '09420179558', 'Mother', 'have a great opportunities for getting a job.', NULL, '2020-01-19 20:39:47', '2020-01-19 20:39:47'),
(11, 'Ei Ei Phyo', 'အိအိဖြိုး', 'eiofficalphyo@gmail.com', '09975878484', 'No.1252,Tharaphi street,(65)quarter,South Dagon', 'BE(IT)', 'Thanlyin', '2019', '1995-01-15', 'female', 14, 'U Than Myint', '09260784554', 'Father', 'Daw Mar Mar Cho', '09972314328', 'Mother', 'အသိတစ်ယောက်က လမ်းညွှန်', NULL, '2020-01-19 20:39:52', '2020-01-19 20:39:52'),
(12, 'THURA THET KHAING', 'THURA THET KHAING', 'nevermore.haa@gmail.com', '09403333173', 'Yenkin', 'Finished MCC.i(level5)', 'NayPyiTaw', '2019', '1999-06-01', 'male', 14, 'Daw cho mar', '0943168557', 'mother', 'Daw cho mar', '0943168557', 'mother', 'interested for patient and careful to all students', NULL, '2020-01-19 20:40:03', '2020-01-19 20:40:03'),
(13, 'Mg Hein Zin Naing', 'Mg Hein Zin Naing', 'naingthunnkhant@gmail.com', '09673300337', 'BahoRd, Kamaryut, Yangon', 'B.E.(IT)', 'Baho Road, Yangon', '2019', '2019-04-15', 'male', 14, 'Daw Nyunt Nyunt Win', '09254986831', 'Mother', 'Daw Nyunt Nyunt Win', '09254986831', 'Mother', 'I like Myanmar IT Consulting.I think i will chance more able to work in web development company.I would like to work as a junior web developer.', NULL, '2020-01-19 20:40:14', '2020-01-19 20:40:14'),
(14, 'Cho Zin Oo', 'Cho Zin Oo', 'ooc6388@gmail.com', '09686489334', '266/4 Pyinmamyaing  Street,Thingangyun Township', 'Metro IT and Japanese Language Center,Fourth(History)', 'Yangon', '2020', '2000-07-18', 'female', 14, 'Daw Moe Mya Mya Yee', '09663874460', 'Mother', 'U Aung Myo O0', '0973180491', 'Father', 'I want to Junior Web developer.', NULL, '2020-01-19 20:40:26', '2020-01-19 20:40:26'),
(15, 'Ma Khaing Myint San Oo', 'Ma Khaing Myint San Oo', 'miss.oo.oo77@gmail.com', '09783196951', 'Sanchaung str, No 40, Yangon', 'M.CSc (Thesis)', 'Mandalay', '2017', '1995-12-04', 'female', 14, 'Daw Tin Tin San', '09799811737', 'Mother', 'U Myint Swe', '09427738364', 'Father', 'Job', NULL, '2020-01-19 20:40:51', '2020-01-19 20:40:51'),
(16, 'THURA HTOO', 'thura htoo', 'minfeither@gmail.com', '09761267601', 'Ma/26,Mingyi Road,Insein,Yangon', '3rd year botany(Distance)', 'Insein', '-', '2000-03-17', 'male', 14, 'U Thent Zin', '09770812245', 'Father', 'Lwin Chue Chue Htike', '09421065006', 'Elder sister', 'Have a great opportunities for good jobs', NULL, '2020-01-19 20:40:54', '2020-01-19 20:40:54'),
(17, 'Ma Htoo Sandar Ko', 'ထူးစန္ဒာကို', 'htuehtue.fl@gmail.com', '09 259128603', 'No.26B,Thein Phyu Street, Quarter (10), Botahtaung Tsp.', 'ME(IT)', 'Yangon', '2020', '1994-11-05', 'female', 14, 'U Maung Ko', '09 400434939', 'Father', 'Daw Naing Naing Win', '09 950186789', 'Aunt', 'Good Reviews, Short time, Can Prepare to get Job', NULL, '2020-01-19 20:41:04', '2020-01-19 20:41:04'),
(18, 'Thae Nu San', 'သဲနူစံ', 'thaenusantns95@gmial.com', '09690993100', 'No.599/A Tharlarwaddy(1) Street,Tharkayta', 'B.E(IT)', 'Yangon', '2020', '1995-12-04', 'female', 14, 'Daw Kyi Htay', '09894350691', 'Mother', 'U San Ye', '09894350691', 'Father', 'It\'s is famous for it\'s so good.', NULL, '2020-01-19 20:41:40', '2020-01-19 20:41:40'),
(19, 'Ye Mann Myoe', 'ရဲမာန္မ်ဳိး', 'yemannmyoe1876@gmail.com', '09789963569', 'no-763, 17-street, Tharkayta -1, HtuParYone, Yangon', 'level-5 DC', 'Yangon', '2018', '1975-11-30', 'male', 14, 'U Aung Kyi Tun', '09420120629', 'Father', 'Daw Than Than Sint', '09254064779', 'Mother', 'project for the real world\r\ngood ensures for work', NULL, '2020-01-19 20:42:05', '2020-01-19 20:42:05'),
(20, 'Khin May Thu', 'ခင္ေမသူ', 'www.khinthu2017@gmail.com', '09971957800', 'No(58),Nat Shin Naung Street, Mayan Gone Township', 'BE(IT)', 'Monywa', '2020', '1997-06-14', 'female', 14, 'U Bo Win', '0943069316', 'father', 'Daw Shwe Shi', '0943069316', 'mother', 'Job Opportunity', NULL, '2020-01-19 20:42:17', '2020-01-19 20:42:17'),
(21, 'Swe Hpone Naing', 'ဆွေဘုန်းနိုင်', 'swehponenaing97@gmail.com', '09778877598', 'No 3(B), 8th Street (South), East Kyokone, Insein, Yangon', 'Higher National Diploma', 'Yangon', '2019', '1997-11-09', 'male', 14, 'U Zin Lin', '09974194372', 'Uncle', 'U Zin Lin', '09974194372', 'Uncle', 'I\'m a little bit lazy to do self-study at home so I thought I could study and improve my skills by putting myself in intensive training like this. I\'m also looking for job and I heard Myanmar IT consulting offer to help finding jobs after the training.', NULL, '2020-01-19 20:42:23', '2020-01-19 20:42:23'),
(22, 'Ma Pann Ei Zon', 'Ma Pann Ei Zon', 'panneizun96@gmail.com', '09798504257', 'No58,Nat Shin Naung Street,Mayan Gone Township', 'BE IT', 'Monywa', '2020', '1996-04-02', 'female', 14, 'U Kyaw Oo', '09895298785', 'Father', 'Daw Thein Myaing', '09895298785', 'Mother', 'Job Opportunity', NULL, '2020-01-19 20:42:28', '2020-01-19 20:42:28'),
(23, 'Mg Kyaw Ze Ya', 'ေမာင္ေက်ာ္ေဇယ်', 'kyawzeya121015@gmail.com', '09975976912', 'No.(883),9 quarter,Yadanarbon (4)street,Tharkayta.', 'ၤfirst year', 'Yangon', '2019', '2001-03-05', 'male', 14, 'U Khin Shwe', '095188631', 'Father', 'Daw Mya Mya Kyaing', '09420016755', 'Mother', 'Father friend', NULL, '2020-01-19 20:43:12', '2020-01-19 20:43:12'),
(24, 'Ma Ei Phyu Soe', 'Ma Ei Phuy Soe', 'eiphyusoe777@gmail.com', '09960291882', '125 street, Mingalar Zay', 'Pathein Computer University', 'Yangon', '2019', '1996-08-05', 'female', 14, 'U Soe Myint', '09784213797', 'Father', 'Daw Than Than Aye', '09784213797', 'Mother', 'Job Opportunity', NULL, '2020-01-19 20:43:12', '2020-01-19 20:43:12'),
(25, 'Ma Khin Nyein Chan Lwin', 'Ma Khin Nyein Chan Lwin', 'khinnyeinchanlwin@gmail.com', '09-797333511', '(33*88) Chan Aye Thar San Township, Mandalay.', 'B.E (IT)', 'Mandalay', '2019', '1996-01-23', 'female', 14, 'Daw Khin Mar Tin', '09-402623311', 'Mother', 'U Myo Myint', '09-787733632', 'Father', 'Job Opportunity.', NULL, '2020-01-19 20:43:24', '2020-01-19 20:43:24'),
(26, 'Kyaw Nanda Paing', 'ကျော်နန္ဒပိုင်', 'nandasoe4109@gmail.com', '09422253487', 'No 12, Aung Chan Thar Street, Nwe Aye Quarter, Dawbon Township, Yangon', 'L5DC', 'Yangon', '2018', '1999-10-04', 'male', 14, 'U Hnin Wai', '09969789190', 'Father', 'Daw Nyo Nyo Khin', '09256117873', 'Mother', 'Good ensure for work', NULL, '2020-01-19 20:43:36', '2020-01-19 20:43:36'),
(27, 'Ma Zar Zar Hlaing', 'Ma Zar Zar Hlaing', 'zarzarhlaing8060@gmail.com', '09 779951182', 'No(58),Nat Shin Naung Street,Mayan gone Township', 'BE(IT)', 'Monywa', '2020', '1996-03-26', 'female', 14, 'Daw Yin Shwe', '09 977188955', 'Mother', 'Ko Yan Aung', '09 770108547', 'Brother', 'Job Opportunity', NULL, '2020-01-19 20:43:36', '2020-01-19 20:43:36'),
(28, 'Mg Naing Lin', 'Mg Naing Lin', 'www.nayyiake@gmail.com', '09777337223', 'No-46,5-B,Ahlone.', 'ႊThird Year Myanmar', 'Yangon', '-', '1995-05-20', 'male', 14, 'U Kyaw Swar Myint', '09698097536', 'Father', 'Daw Than Than Yu', '09795931260', 'Mother', 'Have a great opportunities for getting a job.', NULL, '2020-01-19 20:43:36', '2020-01-19 20:43:36'),
(29, 'Mg Htet Oo Linn', 'မောင်ထက်ဦးလင်း', 'htetoolinn83@gmail.com', '09964296634', 'No.124 / U Aung Thu Street /  Hlaing Thar Yar Township/Yangon', 'Bsc.(Math)', 'Yangon', '2019', '1996-09-10', 'male', 14, 'U Kyaw Kyaw Win', '09780481420', 'Father', 'Daw Lin Lin Aye', '09783581588', 'Mother', 'Facebook,Friends', NULL, '2020-01-19 20:43:57', '2020-01-19 20:43:57'),
(30, 'Ma Phu Myat Thwe', 'မမဖူးမြတ်သွယ်', 'thwephumyat4@gmail.com', '09-250700277', 'Hlaing Township, Yangon', 'BE(EC)', 'Toungoo', '2019', '1997-01-30', 'female', 14, 'U Win Tint', '09-420726026', 'Father', 'Daw Than Than', '09-788540563', 'Mother', 'Because of recommendation is good to join this training.', NULL, '2020-01-19 20:43:59', '2020-01-19 20:43:59'),
(31, 'Mg Thet Lwin Tun', 'မောင်သက်လွင်ထွန်း', 'LuckyTay1796@gmail.com', '09752639302', 'Hlegu - Taw Sone', 'BE.IT', 'Monywa', '2019', '1996-06-17', 'male', 14, 'U Myint Lwin', '09400514750', 'Father', 'Ma Hnin Oo', '09400514750', 'Sister', 'လုပ်ငန်းခွင်ဝင်ရန် / web developer ဖြစ်ရန်', NULL, '2020-01-19 20:44:43', '2020-01-19 20:44:43'),
(32, 'Ma Kay Zin Soe', 'ကေဇင်စိုး', 'kayzinsoe74@gmail.com', '09790837778', 'Near Oak Kyin  Bus Stop, Hlaing', 'B.E(EC)', 'Hlaing', '2020', '1997-04-07', 'female', 14, 'U Soe Tint', '09797731911', 'Father', 'Daw Soe Soe Nwe', '09797731922', 'Mother', 'I know from Facebook.', NULL, '2020-01-19 20:44:48', '2020-01-19 20:44:48'),
(33, 'Khin Zar Chi Aung', 'ခင်ဇာခြည်အောင်', 'zarchitk@gmail.com', '09799558769', 'No.1161, Zayar Thukha St., Myittar Nyunt Qtr., Tamwe.', 'BE-IT', 'Thanlyin', '2017', '1992-04-13', 'female', 14, 'U Than Htay', '09421005099', 'Father', 'Daw Myint Myint Win', '09250345422', 'Mother', 'Good Teaching.', NULL, '2020-01-19 20:46:07', '2020-01-19 20:46:07'),
(34, 'Mg Swan htet kyaw', 'ေမာင္စြမ္းထက္ေက်ာ္', 'swanhtetkyaw6@gmail.com', '09691232824', 'Htan Tapin St', 'BSc physics', 'Monywa', '2020', '1996-03-30', 'male', 14, 'U kyaw kyaw naing', '092132823', 'father', 'Daw thi thi moe', '09961160006', 'mother', 'No particular reason!', NULL, '2020-01-19 20:46:33', '2020-01-19 20:46:33'),
(35, 'Maw Kun Aung', 'မော်ကွန်းအောင်', 'mawkun522@gmail.com', '09447156128', 'SouthDagon Township, BOSAWNAUNG st', 'BE(IT)', 'SHWEBO', '2018', '1995-08-08', 'male', 14, 'U Zaw Myo Myint', '095022382', 'Uncle', 'Daw Ei Ei', '09421013380', 'Aunty', 'I wanna take a job as a Web Developer.For this reason, I choose MMIC.', NULL, '2020-01-19 20:48:52', '2020-01-19 20:48:52'),
(36, 'Mg Rahul', 'မောင်ရာဟူးလ်', 'rahul.tgi2011@gmail.com', '09794415418', 'KyiMyinDaing', 'BEIT', 'Taunggyi', '2019', '1995-02-07', 'male', 14, 'Daw Kamalays Kumari', '09770218920', 'Mother', 'Ko Deepak', '09428326493', 'Brother', 'Web Developmentနှင့်ဆိုင်သော language အားလုံးကိုလေ့လာသင်ယူရန်', NULL, '2020-01-19 20:51:09', '2020-01-19 20:51:09'),
(37, 'Ma Ahe Ahe Thant', 'မအဲအဲသန့်', 'aheahethant8450@gmail.com', '09792074099', 'Mandalay, Myittha', 'B. Sc(computer science)', 'Mandalay', '2019', '1998-06-27', 'female', 14, 'Daw Thin Thin Han', '09790188125', 'Mother', 'U Htay Aung Kyaw', '09797602017', 'Father', 'Job', NULL, '2020-01-19 20:52:06', '2020-01-19 20:52:06'),
(38, 'Mg Linn Nanda Aung', 'မောင်လင်းနန္ဒအောင်', 'linnandaaung.1234@gmail.com', '09796635158', '791(A).Nantaphyu st. Hlaing That\'s tsp.', 'Second year(Physics)', 'Yangon', '2019', '2002-08-17', 'male', 14, 'U Than Kyawel', '09421031714', 'Father', 'Saw Pa Pa', '09422541285', 'Mother', 'Facebook', NULL, '2020-01-19 20:53:16', '2020-01-19 20:53:16'),
(39, 'Mg Wai Yan Tun', 'ေမာင္ေ', 'waiyantun117@gmail.com', '09666965524', 'No(640),7th street, Mayangone Township Yangone', 'yangon', 'Yangone', '2019', '2002-10-04', 'male', 14, 'U Tun Aye', '09266626226', 'Father', 'KO Kaung Htet Htun', '09678346455', 'Brother', 'my facebook account and friend', NULL, '2020-01-19 20:54:10', '2020-01-19 20:54:10'),
(40, 'kyaw ye thu', 'kyaw ye thu', 'kyawyethu73@gmail.com', '09420329326', 'mingalar taung nyunt', 'B.tech(textile)', 'monywa', '2016', '1995-04-02', 'male', 14, 'u kyaw win', '09420329326', 'father', 'daw yin nwet', '09420429326', 'mother', 'good service', NULL, '2020-01-19 20:54:14', '2020-01-19 20:54:14'),
(41, 'Ma Win Thidar Moe', 'မဝင်းသီတာမိုး', 'moewinthidar@gmail.com', '09793383421', 'Myinmu', 'B.E (IT)', 'Myinmu', '2020', '1996-10-20', 'female', 14, 'U Moe Kyaw', '09777729934', 'Father', 'Daw Win Win San', '09444021746', 'Mother', 'အလုပ်အကိုသ်အခွင့်အလမ်း', NULL, '2020-01-19 20:54:58', '2020-01-19 20:54:58'),
(42, 'Ingin May', 'အင်ကြင်းမေ', 'inginmay2401@gmail.com', '09699298329', 'No(231/B) Shwe Yin Aye street Hlaing Thar Yar', 'Third Year(Distance)', 'Hlaing Thar Yar', '2021', '2001-01-24', 'female', 14, 'U Myint Oo', '09799525800', 'Father', 'Daw Myint Myint Nwe', '09421130242', 'Mother', 'အလုပ်အကိုင်အခွင့်လမ်းရဖို့', NULL, '2020-01-19 20:56:15', '2020-01-19 20:56:15'),
(43, 'Mg Myo Zaw Tun', 'ေမာင္မ်ိဳးေဇာ္ထြန္း', 'aungye.1996k@gmail.com', '09961410413', 'Hlegu', 'BE.IT', 'Monywa', '2019', '1996-03-27', 'male', 14, 'U Kyaw Win', '09259531689', 'Father', 'U KyawWin', '0925953968', 'Father', 'web developer အေနနဲ႕လုပ္ငန္းခြင္ဝင္ရန္', NULL, '2020-01-19 20:57:11', '2020-01-19 20:57:11'),
(44, 'Kaung Myat Min', 'မောင်ကောင်းမြတ်မင်း', 'kaungmyatminkmm1@gmail.com', '09970003077', 'No(4) Quarter, Mayangone.', 'B.Sc(Maths)', 'Yangon', '2020', '1996-04-30', 'male', 14, 'U Hla Myint', '09962116446', 'Father', 'Daw Mya Than', '09978662213', 'Mother', 'One of the best IT training school.', NULL, '2020-01-20 18:49:55', '2020-01-20 18:49:55'),
(45, 'Sai Htut Aung', 'စိုင်းထွဋ်အောင်', 'kosaihtutaung1996@gmail.com', '09267999217', 'Lanmadaw Township, Thayarktaw Kyaungtaik, Seinpan Kyaung', 'Graduated', 'Yangon', '2020', '1996-10-29', 'male', 14, 'U Khin Tun', '09267999217', 'Son', 'Daw Khin Htay', '09267999217', 'Son', 'လုပ်ငန်းထဲမှာ အသုံးပြုမဲ့အရာတွေကို လက်တွေ့ကျကျသင်ပေးတါရယ် အလုပ်နဲ့ချိတ်ဆက်ပေးတါရယ်ကြောင့်ပါ', NULL, '2020-01-20 19:05:34', '2020-01-20 19:05:34'),
(46, 'Shwe Zin Ei Ei Aung', 'ရွှေဇင်အိအိအောင်', 'shwezineieiaung2369@gmail.com', '09443390448', 'No 88. Okazana 10 street. K block. North Okkalapa Yangon', 'B.Sc (Hons)', 'North Okkalapa', '2014', '1993-06-23', 'female', 14, 'U Than Aung', '0943055195', 'Father', 'Thazin Aung', '09421042815', 'Sister', 'Good Teaching and searh new job', NULL, '2020-01-20 20:25:25', '2020-01-20 20:25:25'),
(47, 'Wyutyi Koko', '၊၀တ်ရည ်ကိုကို', 'nectaroppa1996@gmail.com', '၀၉၈၉၈၇၃၂၄၈၀', 'No 186 , Kyaikkasan Road, Tarmwe, Yangon', 'Bachelor of Engineering (Thanlyin Technological University)', 'ေကျာက်ေြမာင်း', '၂၀၁၃', '1996-10-09', 'female', 14, 'Daw Hla Hla Aye', '09420091195', 'Mother', 'U Thein Wyn', '09420091195', 'Father', 'I want to....', NULL, '2020-01-23 18:50:27', '2020-01-23 18:50:27'),
(48, 'Wyutyikoko', 'ဝတ္ရည္ကိုကို', 'nectar.dreamer@gmail.com', '09898732480', '186 Kyaikkasan Road , Tarmwe', 'Bachelor of Engineering (Thanlyin  Technological University)', 'Tarmwe', '2020', '1996-10-09', 'male', 14, 'Daw Hla Hla Aye', '09420091195', 'Mother', 'U Thein Wyn', '09420091195', 'Father', 'I want to....', NULL, '2020-01-23 19:06:22', '2020-01-24 07:33:18');

-- --------------------------------------------------------

--
-- Table structure for table `student_subject`
--

CREATE TABLE `student_subject` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_subject`
--

INSERT INTO `student_subject` (`id`, `student_id`, `subject_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2020-01-19 20:34:22', '2020-01-19 20:34:22'),
(2, 2, 1, '2020-01-19 20:35:25', '2020-01-19 20:35:25'),
(3, 2, 2, '2020-01-19 20:35:25', '2020-01-19 20:35:25'),
(4, 2, 3, '2020-01-19 20:35:25', '2020-01-19 20:35:25'),
(5, 3, 1, '2020-01-19 20:36:19', '2020-01-19 20:36:19'),
(6, 3, 2, '2020-01-19 20:36:19', '2020-01-19 20:36:19'),
(7, 3, 3, '2020-01-19 20:36:19', '2020-01-19 20:36:19'),
(8, 3, 4, '2020-01-19 20:36:19', '2020-01-19 20:36:19'),
(9, 3, 5, '2020-01-19 20:36:19', '2020-01-19 20:36:19'),
(10, 3, 9, '2020-01-19 20:36:19', '2020-01-19 20:36:19'),
(11, 3, 11, '2020-01-19 20:36:19', '2020-01-19 20:36:19'),
(12, 3, 12, '2020-01-19 20:36:19', '2020-01-19 20:36:19'),
(13, 4, 1, '2020-01-19 20:36:46', '2020-01-19 20:36:46'),
(14, 4, 2, '2020-01-19 20:36:46', '2020-01-19 20:36:46'),
(15, 4, 3, '2020-01-19 20:36:46', '2020-01-19 20:36:46'),
(16, 4, 4, '2020-01-19 20:36:46', '2020-01-19 20:36:46'),
(17, 4, 8, '2020-01-19 20:36:46', '2020-01-19 20:36:46'),
(18, 4, 9, '2020-01-19 20:36:46', '2020-01-19 20:36:46'),
(19, 5, 1, '2020-01-19 20:36:47', '2020-01-19 20:36:47'),
(20, 5, 2, '2020-01-19 20:36:47', '2020-01-19 20:36:47'),
(21, 6, 1, '2020-01-19 20:37:39', '2020-01-19 20:37:39'),
(22, 6, 2, '2020-01-19 20:37:39', '2020-01-19 20:37:39'),
(23, 7, 1, '2020-01-19 20:38:01', '2020-01-19 20:38:01'),
(24, 7, 2, '2020-01-19 20:38:01', '2020-01-19 20:38:01'),
(25, 7, 3, '2020-01-19 20:38:01', '2020-01-19 20:38:01'),
(26, 7, 4, '2020-01-19 20:38:01', '2020-01-19 20:38:01'),
(27, 8, 1, '2020-01-19 20:38:37', '2020-01-19 20:38:37'),
(28, 8, 2, '2020-01-19 20:38:37', '2020-01-19 20:38:37'),
(29, 8, 3, '2020-01-19 20:38:37', '2020-01-19 20:38:37'),
(30, 8, 4, '2020-01-19 20:38:37', '2020-01-19 20:38:37'),
(31, 8, 5, '2020-01-19 20:38:37', '2020-01-19 20:38:37'),
(32, 8, 6, '2020-01-19 20:38:37', '2020-01-19 20:38:37'),
(33, 9, 1, '2020-01-19 20:39:27', '2020-01-19 20:39:27'),
(34, 9, 2, '2020-01-19 20:39:27', '2020-01-19 20:39:27'),
(35, 9, 3, '2020-01-19 20:39:27', '2020-01-19 20:39:27'),
(36, 9, 4, '2020-01-19 20:39:27', '2020-01-19 20:39:27'),
(37, 9, 5, '2020-01-19 20:39:27', '2020-01-19 20:39:27'),
(38, 10, 1, '2020-01-19 20:39:47', '2020-01-19 20:39:47'),
(39, 10, 2, '2020-01-19 20:39:47', '2020-01-19 20:39:47'),
(40, 11, 1, '2020-01-19 20:39:52', '2020-01-19 20:39:52'),
(41, 11, 2, '2020-01-19 20:39:52', '2020-01-19 20:39:52'),
(42, 11, 3, '2020-01-19 20:39:52', '2020-01-19 20:39:52'),
(43, 11, 4, '2020-01-19 20:39:52', '2020-01-19 20:39:52'),
(44, 14, 1, '2020-01-19 20:40:26', '2020-01-19 20:40:26'),
(45, 14, 2, '2020-01-19 20:40:26', '2020-01-19 20:40:26'),
(46, 14, 4, '2020-01-19 20:40:26', '2020-01-19 20:40:26'),
(47, 14, 6, '2020-01-19 20:40:26', '2020-01-19 20:40:26'),
(48, 15, 1, '2020-01-19 20:40:51', '2020-01-19 20:40:51'),
(49, 15, 2, '2020-01-19 20:40:51', '2020-01-19 20:40:51'),
(50, 15, 4, '2020-01-19 20:40:51', '2020-01-19 20:40:51'),
(51, 15, 5, '2020-01-19 20:40:51', '2020-01-19 20:40:51'),
(52, 15, 12, '2020-01-19 20:40:51', '2020-01-19 20:40:51'),
(53, 16, 1, '2020-01-19 20:40:54', '2020-01-19 20:40:54'),
(54, 16, 2, '2020-01-19 20:40:54', '2020-01-19 20:40:54'),
(55, 16, 3, '2020-01-19 20:40:54', '2020-01-19 20:40:54'),
(56, 16, 5, '2020-01-19 20:40:54', '2020-01-19 20:40:54'),
(57, 17, 1, '2020-01-19 20:41:04', '2020-01-19 20:41:04'),
(58, 17, 2, '2020-01-19 20:41:04', '2020-01-19 20:41:04'),
(59, 17, 12, '2020-01-19 20:41:04', '2020-01-19 20:41:04'),
(60, 18, 1, '2020-01-19 20:41:40', '2020-01-19 20:41:40'),
(61, 18, 2, '2020-01-19 20:41:40', '2020-01-19 20:41:40'),
(62, 18, 4, '2020-01-19 20:41:40', '2020-01-19 20:41:40'),
(63, 19, 1, '2020-01-19 20:42:05', '2020-01-19 20:42:05'),
(64, 19, 3, '2020-01-19 20:42:05', '2020-01-19 20:42:05'),
(65, 19, 4, '2020-01-19 20:42:05', '2020-01-19 20:42:05'),
(66, 19, 9, '2020-01-19 20:42:05', '2020-01-19 20:42:05'),
(67, 20, 1, '2020-01-19 20:42:17', '2020-01-19 20:42:17'),
(68, 20, 2, '2020-01-19 20:42:17', '2020-01-19 20:42:17'),
(69, 20, 3, '2020-01-19 20:42:17', '2020-01-19 20:42:17'),
(70, 20, 5, '2020-01-19 20:42:17', '2020-01-19 20:42:17'),
(71, 20, 12, '2020-01-19 20:42:17', '2020-01-19 20:42:17'),
(72, 21, 1, '2020-01-19 20:42:23', '2020-01-19 20:42:23'),
(73, 21, 2, '2020-01-19 20:42:23', '2020-01-19 20:42:23'),
(74, 21, 3, '2020-01-19 20:42:23', '2020-01-19 20:42:23'),
(75, 21, 8, '2020-01-19 20:42:23', '2020-01-19 20:42:23'),
(76, 21, 12, '2020-01-19 20:42:23', '2020-01-19 20:42:23'),
(77, 22, 1, '2020-01-19 20:42:28', '2020-01-19 20:42:28'),
(78, 22, 2, '2020-01-19 20:42:28', '2020-01-19 20:42:28'),
(79, 22, 4, '2020-01-19 20:42:28', '2020-01-19 20:42:28'),
(80, 22, 5, '2020-01-19 20:42:28', '2020-01-19 20:42:28'),
(81, 22, 12, '2020-01-19 20:42:28', '2020-01-19 20:42:28'),
(82, 23, 1, '2020-01-19 20:43:12', '2020-01-19 20:43:12'),
(83, 23, 2, '2020-01-19 20:43:12', '2020-01-19 20:43:12'),
(84, 23, 3, '2020-01-19 20:43:12', '2020-01-19 20:43:12'),
(85, 24, 1, '2020-01-19 20:43:12', '2020-01-19 20:43:12'),
(86, 24, 3, '2020-01-19 20:43:12', '2020-01-19 20:43:12'),
(87, 24, 9, '2020-01-19 20:43:12', '2020-01-19 20:43:12'),
(88, 24, 11, '2020-01-19 20:43:12', '2020-01-19 20:43:12'),
(89, 25, 1, '2020-01-19 20:43:24', '2020-01-19 20:43:24'),
(90, 25, 2, '2020-01-19 20:43:24', '2020-01-19 20:43:24'),
(91, 25, 3, '2020-01-19 20:43:24', '2020-01-19 20:43:24'),
(92, 25, 4, '2020-01-19 20:43:24', '2020-01-19 20:43:24'),
(93, 25, 9, '2020-01-19 20:43:24', '2020-01-19 20:43:24'),
(94, 26, 1, '2020-01-19 20:43:36', '2020-01-19 20:43:36'),
(95, 26, 2, '2020-01-19 20:43:36', '2020-01-19 20:43:36'),
(96, 26, 3, '2020-01-19 20:43:36', '2020-01-19 20:43:36'),
(97, 26, 8, '2020-01-19 20:43:36', '2020-01-19 20:43:36'),
(98, 26, 9, '2020-01-19 20:43:36', '2020-01-19 20:43:36'),
(99, 27, 1, '2020-01-19 20:43:36', '2020-01-19 20:43:36'),
(100, 27, 2, '2020-01-19 20:43:36', '2020-01-19 20:43:36'),
(101, 27, 4, '2020-01-19 20:43:36', '2020-01-19 20:43:36'),
(102, 27, 5, '2020-01-19 20:43:36', '2020-01-19 20:43:36'),
(103, 27, 12, '2020-01-19 20:43:36', '2020-01-19 20:43:36'),
(104, 28, 1, '2020-01-19 20:43:36', '2020-01-19 20:43:36'),
(105, 28, 2, '2020-01-19 20:43:36', '2020-01-19 20:43:36'),
(106, 28, 3, '2020-01-19 20:43:36', '2020-01-19 20:43:36'),
(107, 28, 4, '2020-01-19 20:43:36', '2020-01-19 20:43:36'),
(108, 28, 5, '2020-01-19 20:43:36', '2020-01-19 20:43:36'),
(109, 28, 6, '2020-01-19 20:43:36', '2020-01-19 20:43:36'),
(110, 29, 1, '2020-01-19 20:43:57', '2020-01-19 20:43:57'),
(111, 29, 2, '2020-01-19 20:43:57', '2020-01-19 20:43:57'),
(112, 29, 3, '2020-01-19 20:43:57', '2020-01-19 20:43:57'),
(113, 30, 1, '2020-01-19 20:43:59', '2020-01-19 20:43:59'),
(114, 30, 2, '2020-01-19 20:43:59', '2020-01-19 20:43:59'),
(115, 30, 9, '2020-01-19 20:43:59', '2020-01-19 20:43:59'),
(116, 31, 1, '2020-01-19 20:44:43', '2020-01-19 20:44:43'),
(117, 31, 2, '2020-01-19 20:44:43', '2020-01-19 20:44:43'),
(118, 32, 1, '2020-01-19 20:44:48', '2020-01-19 20:44:48'),
(119, 32, 2, '2020-01-19 20:44:48', '2020-01-19 20:44:48'),
(120, 32, 9, '2020-01-19 20:44:48', '2020-01-19 20:44:48'),
(121, 33, 1, '2020-01-19 20:46:07', '2020-01-19 20:46:07'),
(122, 33, 2, '2020-01-19 20:46:07', '2020-01-19 20:46:07'),
(123, 33, 3, '2020-01-19 20:46:07', '2020-01-19 20:46:07'),
(124, 33, 4, '2020-01-19 20:46:07', '2020-01-19 20:46:07'),
(125, 33, 5, '2020-01-19 20:46:07', '2020-01-19 20:46:07'),
(126, 33, 6, '2020-01-19 20:46:07', '2020-01-19 20:46:07'),
(127, 33, 9, '2020-01-19 20:46:07', '2020-01-19 20:46:07'),
(128, 33, 12, '2020-01-19 20:46:07', '2020-01-19 20:46:07'),
(129, 34, 1, '2020-01-19 20:46:33', '2020-01-19 20:46:33'),
(130, 34, 2, '2020-01-19 20:46:33', '2020-01-19 20:46:33'),
(131, 34, 3, '2020-01-19 20:46:33', '2020-01-19 20:46:33'),
(132, 34, 4, '2020-01-19 20:46:33', '2020-01-19 20:46:33'),
(133, 34, 5, '2020-01-19 20:46:33', '2020-01-19 20:46:33'),
(134, 35, 1, '2020-01-19 20:48:52', '2020-01-19 20:48:52'),
(135, 35, 2, '2020-01-19 20:48:52', '2020-01-19 20:48:52'),
(136, 37, 1, '2020-01-19 20:52:06', '2020-01-19 20:52:06'),
(137, 37, 2, '2020-01-19 20:52:06', '2020-01-19 20:52:06'),
(138, 37, 4, '2020-01-19 20:52:06', '2020-01-19 20:52:06'),
(139, 37, 5, '2020-01-19 20:52:06', '2020-01-19 20:52:06'),
(140, 37, 9, '2020-01-19 20:52:06', '2020-01-19 20:52:06'),
(141, 37, 12, '2020-01-19 20:52:06', '2020-01-19 20:52:06'),
(142, 38, 1, '2020-01-19 20:53:16', '2020-01-19 20:53:16'),
(143, 38, 2, '2020-01-19 20:53:16', '2020-01-19 20:53:16'),
(144, 38, 3, '2020-01-19 20:53:16', '2020-01-19 20:53:16'),
(145, 38, 4, '2020-01-19 20:53:16', '2020-01-19 20:53:16'),
(146, 39, 1, '2020-01-19 20:54:10', '2020-01-19 20:54:10'),
(147, 39, 3, '2020-01-19 20:54:10', '2020-01-19 20:54:10'),
(148, 40, 1, '2020-01-19 20:54:14', '2020-01-19 20:54:14'),
(149, 40, 2, '2020-01-19 20:54:14', '2020-01-19 20:54:14'),
(150, 40, 3, '2020-01-19 20:54:14', '2020-01-19 20:54:14'),
(151, 41, 1, '2020-01-19 20:54:58', '2020-01-19 20:54:58'),
(152, 41, 2, '2020-01-19 20:54:58', '2020-01-19 20:54:58'),
(153, 41, 4, '2020-01-19 20:54:58', '2020-01-19 20:54:58'),
(154, 42, 1, '2020-01-19 20:56:15', '2020-01-19 20:56:15'),
(155, 42, 2, '2020-01-19 20:56:15', '2020-01-19 20:56:15'),
(156, 42, 4, '2020-01-19 20:56:15', '2020-01-19 20:56:15'),
(157, 42, 12, '2020-01-19 20:56:15', '2020-01-19 20:56:15'),
(158, 43, 1, '2020-01-19 20:57:11', '2020-01-19 20:57:11'),
(159, 43, 2, '2020-01-19 20:57:11', '2020-01-19 20:57:11'),
(160, 45, 1, '2020-01-20 19:05:34', '2020-01-20 19:05:34'),
(161, 45, 2, '2020-01-20 19:05:34', '2020-01-20 19:05:34'),
(162, 45, 3, '2020-01-20 19:05:34', '2020-01-20 19:05:34'),
(163, 45, 4, '2020-01-20 19:05:34', '2020-01-20 19:05:34'),
(164, 45, 5, '2020-01-20 19:05:34', '2020-01-20 19:05:34'),
(165, 46, 10, '2020-01-20 20:25:25', '2020-01-20 20:25:25'),
(166, 47, 1, '2020-01-23 18:50:27', '2020-01-23 18:50:27'),
(167, 48, 1, '2020-01-23 19:06:22', '2020-01-23 19:06:22');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'HTML', '2020-01-15 09:08:29', '2020-01-18 08:10:37'),
(2, 'CSS', '2020-01-15 09:08:29', '2020-01-15 09:08:29'),
(3, 'Bootstrap', '2020-01-19 15:40:37', '2020-01-19 15:40:37'),
(4, 'JavaScript', '2020-01-19 15:40:37', '2020-01-19 15:40:37'),
(5, 'JQuery', '2020-01-19 15:40:37', '2020-01-19 15:40:37'),
(6, 'Wordpress', '2020-01-19 15:40:37', '2020-01-19 15:40:37'),
(7, 'CodeIgniter', '2020-01-19 15:40:37', '2020-01-19 15:40:37'),
(8, 'Laravel', '2020-01-19 15:40:37', '2020-01-19 15:40:37'),
(9, 'C#', '2020-01-19 15:40:37', '2020-01-19 15:40:37'),
(10, '.NET', '2020-01-19 15:40:37', '2020-01-19 15:40:37'),
(11, 'VB', '2020-01-19 15:40:37', '2020-01-19 15:40:37'),
(12, 'Java', '2020-01-19 15:40:37', '2020-01-19 15:40:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Thet Paing Htut', 'thetpainghtut.bf@gmail.com', NULL, '$2y$10$d.zc0TfDAgucdUxCZblg8OnerJm2dQQCfZYspOPz8j03G.RddX1YW', NULL, '2020-01-14 21:28:48', '2020-01-14 21:28:48'),
(4, 'Hein Min Htet', 'heinminhtet@gmail.com', NULL, '$2y$10$FxvgQz01OmfrznODKdRqdOESxLHQjaf0vsRjMfGQXo64i630Bre12', NULL, '2020-01-18 08:24:20', '2020-01-18 08:24:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `batches`
--
ALTER TABLE `batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_student`
--
ALTER TABLE `group_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mentors`
--
ALTER TABLE `mentors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_email_unique` (`email`);

--
-- Indexes for table `student_subject`
--
ALTER TABLE `student_subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `batches`
--
ALTER TABLE `batches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `group_student`
--
ALTER TABLE `group_student`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `mentors`
--
ALTER TABLE `mentors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `student_subject`
--
ALTER TABLE `student_subject`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
