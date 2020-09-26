-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 25, 2020 at 03:21 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mictrainingdb_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `status` tinyint(1) NOT NULL,
  `remark` longtext COLLATE utf8mb4_unicode_ci,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `batches`
--

CREATE TABLE `batches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `time` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `location_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `batches`
--

INSERT INTO `batches` (`id`, `title`, `type`, `startdate`, `enddate`, `time`, `course_id`, `location_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Android Batch 3', 'Offline', '2020-07-01', '2020-09-11', '9:00 AM - 5:00 PM', 3, 1, NULL, '2020-09-22 07:24:01', '2020-09-22 07:24:01'),
(2, 'Android Batch 4', 'Online', '2020-09-14', '2020-11-06', '9:00 AM - 3:00 PM', 3, 1, NULL, '2020-09-22 07:24:33', '2020-09-22 07:24:33'),
(3, 'PHP Batch 18', 'Online', '2020-09-21', '2020-11-13', '9:00 AM - 3:00 PM', 2, 1, NULL, '2020-09-22 07:25:13', '2020-09-22 07:25:13'),
(4, 'PHP Batch 19', 'Online', '2020-10-19', '2020-11-27', '9:00 AM - 3:00 PM', 2, 1, NULL, '2020-09-25 05:19:45', '2020-09-25 05:19:54');

-- --------------------------------------------------------

--
-- Table structure for table `batch_mentor`
--

CREATE TABLE `batch_mentor` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `batch_id` bigint(20) UNSIGNED NOT NULL,
  `mentor_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `batch_mentor`
--

INSERT INTO `batch_mentor` (`id`, `batch_id`, `mentor_id`) VALUES
(1, 1, 8),
(2, 1, 9),
(3, 2, 8),
(4, 3, 1),
(5, 3, 2),
(6, 3, 3),
(7, 3, 4),
(8, 3, 5),
(9, 3, 6),
(13, 4, 1),
(14, 4, 2),
(15, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `batch_post`
--

CREATE TABLE `batch_post` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `batch_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `batch_projecttype`
--

CREATE TABLE `batch_projecttype` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `batch_id` bigint(20) UNSIGNED NOT NULL,
  `projecttype_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `batch_student`
--

CREATE TABLE `batch_student` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `receiveno` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `batch_student`
--

INSERT INTO `batch_student` (`id`, `receiveno`, `status`, `batch_id`, `student_id`, `created_at`, `updated_at`) VALUES
(1, '220920000311181001', 'Active', 1, 1, '2020-09-22 07:56:10', '2020-09-22 07:56:10'),
(2, '220920000211181001', 'Active', 2, 2, '2020-09-22 09:08:17', '2020-09-22 09:08:17'),
(3, '220920000211181003', 'Active', 3, 3, '2020-09-22 09:10:08', '2020-09-22 09:10:08'),
(5, '220920000211181002', 'Active', 3, 1, '2020-09-22 09:49:40', '2020-09-22 09:49:40'),
(6, '250920000211181001', 'Active', 4, 1, '2020-09-25 05:25:01', '2020-09-25 05:25:01');

-- --------------------------------------------------------

--
-- Table structure for table `batch_subject`
--

CREATE TABLE `batch_subject` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `batch_id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `batch_teacher`
--

CREATE TABLE `batch_teacher` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `batch_id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `batch_teacher`
--

INSERT INTO `batch_teacher` (`id`, `batch_id`, `teacher_id`) VALUES
(1, 1, 6),
(2, 2, 6),
(3, 3, 1),
(4, 3, 2),
(5, 3, 3),
(6, 3, 4),
(7, 3, 5),
(13, 4, 1),
(14, 4, 2),
(15, 4, 3),
(16, 4, 4),
(17, 4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zipcode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `zipcode`, `user_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Yangon', '11181', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(2, 'Mandalay', '05011', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code_no` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `outline` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `outline_photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `courses` (`id`, `code_no`, `name`, `logo`, `outline`, `outline_photo`, `fees`, `during`, `duration`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '0001', 'HR / Admin / Office Training', '/storage/images/courses/1600232001.png', '<div class=\"\\&quot;col-12\\&quot;\" style=\"\\&quot;width:\" 1140px;=\"\" padding-right:=\"\" 15px;=\"\" padding-left:=\"\" color:=\"\" rgb(33,=\"\" 37,=\"\" 41);\\\"=\"\"><h2 style=\"\\&quot;font-family:\" poppins_regular;=\"\" box-sizing:=\"\" border-box;=\"\" margin-top:=\"\" 0px;=\"\" margin-bottom:=\"\" 0.5rem;=\"\" font-weight:=\"\" 500;=\"\" line-height:=\"\" 1.2;=\"\" font-size:=\"\" 2rem;\\\"=\"\"></h2><h2><div class=\"\\&quot;col-12\\&quot;\" style=\"\\&quot;width:\" 1140px;=\"\" padding-right:=\"\" 15px;=\"\" padding-left:=\"\" font-size:=\"\" 16px;\\\"=\"\"><p class=\"\\&quot;mt-3\" mmfont\\\"=\"\"><span style=\"\\&quot;font-size:\" 36px;\\\"=\"\">﻿Objective</span></p></div></h2></div><hr><div class=\"\\&quot;col-12\\&quot;\" style=\"\\&quot;width:\" 1140px;=\"\" padding-right:=\"\" 15px;=\"\" padding-left:=\"\" color:=\"\" rgb(33,=\"\" 37,=\"\" 41);\\\"=\"\"><h2><div class=\"\\&quot;col-12\\&quot;\" style=\"\\&quot;width:\" 1140px;=\"\" padding-right:=\"\" 15px;=\"\" padding-left:=\"\" font-size:=\"\" 16px;\\\"=\"\"><p class=\"\\&quot;mt-3\" mmfont\\\"=\"\"><span style=\"font-size: 14px;\" unicode;\\\"=\"\">အလုပ်တွေပေါပေမယ့် ကိုယ်လိုချင်တဲ့နေရာကိုကျ အတွေ့အကြုံအပါပဲ သွားရတာ ခက်ခဲပါတယ်။ ဒါပေမယ့် အရည်အချင်းမရှိပဲ သွားရတာက ပိုပြီးခက်ခဲပါလိမ့်မယ်။ ဒီလိုမဖြစ်ရအောင် Myanmar IT မှာသင်တန်းတက်ပါ။ သင်တန်းတက်ပြီး လိုအပ်တဲ့အရည်အချင်းတွေကို ဖြည့်ဆည်းပါ။ ပြီးရင် ကိုယ်သွားချင်တဲ့နေရာကို ယုံကြည်မှုအပြည့်နဲ့ သွားနိုင်ဖို့ ကြိုးစားပါ။ Myanmar IT သည် အလုပ်လုပ်ချင်သော လူငယ်များကို သင်တန်းပြီးဆုံးသည်နှင့် လုပ်ငန်းခွင်ထဲအရောက်ပို့ပေးနေသော သင်တန်းဖြစ်ပါသည်။</span></p><p class=\"\\&quot;mt-3\" mmfont\\\"=\"\"><span style=\"\\&quot;font-family:\" unicode;\\\"=\"\"><br></span><span style=\"\\&quot;font-size:\" 36px;\\\"=\"\">Course Outlines</span></p></div></h2></div><hr><div class=\"\\&quot;col-12\\&quot;\" style=\"\\&quot;width:\" 1140px;=\"\" padding-right:=\"\" 15px;=\"\" padding-left:=\"\" color:=\"\" rgb(33,=\"\" 37,=\"\" 41);\\\"=\"\"><h2><div class=\"\\&quot;col-12\" mt-5\\\"=\"\" style=\"\\&quot;width:\" 1140px;=\"\" padding-right:=\"\" 15px;=\"\" padding-left:=\"\" font-size:=\"\" 16px;\\\"=\"\"><ol class=\"\\&quot;mt-2\" courseoutline\\\"=\"\" url(&quot;..=\"\" image=\"\" courseoutline.png&quot;);\\\"=\"\" style=\"font-size: 16px;\"><li><span style=\"font-size: 14px;\">Computer Basic ( MS Word , Power Point, Excel, Photoshop)</span></li><li><span style=\"font-size: 14px;\">Internet/Email</span></li><li><span style=\"font-size: 14px;\">HR Management ( Recruitment and Selection / Training and Development/ Performance Management / Payroll / Labour Law/SSB/Income Tax )</span></li><li><span style=\"font-size: 14px;\">Office Administration ( What is Administration/ Roles of Administration/ Administrative Management / Office Activities / Office Management / Attendance and out pass Control / Functions of Administrative office Manager/ Decision Making and Problem Solving)</span></li><li><span style=\"font-size: 14px;\">Job Interview</span></li></ol><p><span style=\"\\&quot;font-size:\" 36px;\\\"=\"\">﻿Facility</span></p></div></h2></div><hr><div class=\"\\&quot;col-12\\&quot;\" style=\"\\&quot;width:\" 1140px;=\"\" padding-right:=\"\" 15px;=\"\" padding-left:=\"\" color:=\"\" rgb(33,=\"\" 37,=\"\" 41);\\\"=\"\"><h2><div class=\"\\&quot;col-12\" mt-5\\\"=\"\" style=\"\\&quot;width:\" 1140px;=\"\" padding-right:=\"\" 15px;=\"\" padding-left:=\"\" font-size:=\"\" 16px;\\\"=\"\"><ul class=\"\\&quot;facility\\&quot;\" style=\"\\&quot;list-style-image:\" url(&quot;..=\"\" image=\"\" cool.png&quot;);\\\"=\"\"><li class=\"\\&quot;mmfont\" my-2\\\"=\"\"><span style=\"font-size: 14px;\">သင်တန်းပြီးတာနဲ့ အလုပ်တစ်ခါတည်းရှာပေးတာမို့ ပညာအရည်အချင်းက အနည်းဆုံး ၁၀ တန်းတော့ အောင်မြင်ပြီးသားဖြစ်ရပါမယ်နော်။</span></li></ul></div></h2></div>', '/storage/images/courses/1600232001.jpg', 140000, 'Weekday', '1 or 1.5 Months', NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(2, '0002', 'PHP Developer Bootcamp', '/storage/images/courses/1600232053.png', '<div class=\\\"col-12\\\" style=\\\"width: 1140px; padding-right: 15px; padding-left: 15px; color: rgb(33, 37, 41);\\\"><h2>Objective</h2><hr><p class=\\\"mt-3 mmfont\\\">PHP Web Developer Bootcamp @Yangon (တစ်နေ့ ၇နာရီ - ၆ပတ် ) သင်တန်း ဖြစ်ပါတယ်။ Project (၅)ခု ပြီးစီးအောင် သင်တန်းကာလတွင် ပြုလုပ် ပြီး ကိုယ်ပိုင် ဝက်ဆိုက်ပေါ် သို့ ကိုယ်တိုင်တင်ရမည် ဖြစ်သည့်အတွက် Junior Developer အဖြစ် အလုပ်ဝင်ရန် အဆင်သင့်ဖြစ်အောင် ပြင်ဆင်ပေးခြင်းဖြစ်ပါသည်။ Project ပြီးစီးအောင် ပြုလုပ်နိုင်မှ သာ Certificate ပေးမည်ဖြစ်ပါသည်။</p></div><div class=\\\"col-12 mt-5\\\" style=\\\"width: 1140px; padding-right: 15px; padding-left: 15px; color: rgb(33, 37, 41);\\\"><h2>What you\'ll learn</h2><hr><ul class=\\\"mt-2\\\"><li>Make a REAL web applications</li><li>Create static HTML and CSS portfolio sites.</li><li>Use Bootstrap to create good-looking responsive layouts.</li><li>Make a beautiful, responsive portfolio page</li><li>Think like a developer.</li><li>Write web apps with full authentication</li><li>Continue to learn and grow as a developer long after the course ends.</li></ul></div><div class=\\\"col-12 mt-5\\\" style=\\\"width: 1140px; padding-right: 15px; padding-left: 15px; color: rgb(33, 37, 41);\\\"><h2>Course Outline</h2><hr><ol class=\\\"mt-2 courseoutline\\\" style=\\\"list-style-image: url(&quot;../image/courseoutline.png&quot;);\\\"><li>Web Design ( HTML5, CSS3,JavaScript, JQuery, Bootstrap4) and Mini Project</li><li>Database Technology ( MySQL )</li><li>Vue JS and PHP MVC MySQL RESTFul API (CI / Laravel Framework) and Mini Project</li><li>PHP CMS ( Wordpress ) and Mini Project</li><li>Software Engineering Fundamental</li><li>Group Project Presentation</li></ol></div><div class=\\\"col-12 mt-5\\\" style=\\\"width: 1140px; padding-right: 15px; padding-left: 15px; color: rgb(33, 37, 41);\\\"><h2>Facility</h2><hr><ul class=\\\"facility\\\" style=\\\"list-style-image: url(&quot;../image/cool.png&quot;);\\\"><li class=\\\"mmfont my-2\\\">နယ်ကျောင်းသူများအတွက် Aircon/Internet အပါ အဆောင်စီစဉ်ပေးမည်</li><li class=\\\"mmfont my-2\\\">Certificate ပေးမယ့်အပြင် သင်တန်းသားများ အားလုံး ကိုယ်ပိုင် Domain / Hosting တစ်ခုစီ တစ်နှစ်စာ အခမဲ့ ရရှိမည်ဖြစ်ပါသည်</li><li class=\\\"mmfont my-2\\\">သင်တန်းပြီးဆုံးသည်နှင့် ရန်ကုန်မြို့ရှိ Web Development Company များတွင် Junior Web Developer အဖြစ် အလုပ်ဝင်နိုင်မည့် အခွင့်အရေး ရရှိမည်ဖြစ်ပါသည်</li></ul></div>', '/storage/images/courses/1600232053.jpg', 300000, 'Weekday', '2 Months', NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(3, '0003', 'Android Developer Bootcamp', '/storage/images/courses/1600232197.png', '<div class=\\\"container mb-5\\\" style=\\\"width: 1140px; padding-right: 15px; padding-left: 15px; color: rgb(33, 37, 41);\\\"><div class=\\\"row mt-5\\\" style=\\\"margin-right: -15px; margin-left: -15px;\\\"><div class=\\\"col-12\\\" style=\\\"width: 1140px; padding-right: 15px; padding-left: 15px;\\\"><h2>Objective</h2><hr><p class=\\\"mt-3 mmfont\\\">Mobile Development ပိုင်းကို စိတ်ဝင်စားပြီး Android Application ကို ကိုယ်ပိုင် Idea နဲ့ ကိုယ်တိုင်ဖန်တီးရေးသားချင်သူများ | ပြည်တွင်းပြည်ပအိုင်တီကုမ္ပဏီ များတွင် Android Developer အဖြစ် ဝင်ရောက်လုပ်ကိုင်လိုသူများ | Programming OOP Concept အခြေခံသိရှိနားလည်ထားသူတိုင်းတက်ရောက်နိုင်ပါတယ်။ Android Developer အဖြစ် အလုပ်စဝင်ဖို့ဆိုရင် မဖြစ်မနေ Java ကို သိရှိဖို့လိုပါတယ်။ Java မရလို့ Android Developer လုပ်လို့မရဘူးဆိုတာ မဟုတ်ပါဘူးနော် ... အခုနောက်ပိုင်း ခေတ်စားလာတဲ့ Kotlin တို့ Flutter တို့က Java ကို အခြေခံလောက်သိထားပြီး Android ပိုင်း စိတ်ဝင်စားတဲ့သူတိုင်း လေ့လာနိုင်ပါတယ်။ Android Application တစ်ခု ရေးနိုင်ဖို့အတွက် Low Level မှ High Level အထိ ရောက်အောင် သင်ကြားပေးမှာဖြစ်လို့ Programming OOP Concept အခြေခံသိရှိနားလည်ထားသူတိုင်း တက်ရောက်နိုင်ပါတယ်။</p></div><div class=\\\"col-12 mt-5\\\" style=\\\"width: 1140px; padding-right: 15px; padding-left: 15px;\\\"><h2>What you\'ll learn</h2><hr><ul class=\\\"mt-2\\\"><li>Make a REAL android applications</li><li>Create custom application with api.</li><li>Use Flutter or Kotlin to create good-looking android app.</li><li>Make a beautiful, application</li><li>Think like a developer.</li><li>Write android apps with full authentication</li><li>Continue to learn and grow as a developer long after the course ends.</li></ul></div><div class=\\\"col-12 mt-5\\\" style=\\\"width: 1140px; padding-right: 15px; padding-left: 15px;\\\"><h2>Course Outline</h2><hr><ol class=\\\"mt-2 courseoutline\\\" style=\\\"list-style-image: url(&quot;../image/courseoutline.png&quot;);\\\"><li>Introduction to Java for Android</li><li>Introduction to Kotlin Programming language</li><li>UI Layout Design</li><li>Android Lifecycle</li><li>Activity and Fragment</li><li>App Navigation</li><li>App Architecture</li><li>Communicate with API service</li><li>Build App with Firebase</li><li>Android Jetpack</li><li>Material Design</li><li>Using third party libraries</li><li>Publish the application to Play Store</li><li>Introduction to Flutter</li><li>Building Layouts</li><li>Navigation and Routing</li><li>State Management</li></ol></div><div class=\\\"col-12 mt-5\\\" style=\\\"width: 1140px; padding-right: 15px; padding-left: 15px;\\\"><h2>Facility</h2><hr><ul class=\\\"facility\\\" style=\\\"list-style-image: url(&quot;../image/cool.png&quot;);\\\"><li class=\\\"mmfont my-2\\\">Junior Android Developer အဖြစ် အလုပ်ဝင်နိုင်ဖို့ လုံလောက်တဲ့ Technical Skills တွေ အကုန်သင်ပေးပြီး ကိုယ်ရေးထားတဲ့ Apps ကို ကိုယ်တိုင် Google Play Store ပေါ်မှာတင်နိုင်ဖို့ $25 တန် Google Developer အကောင့် တစ်ခုစီကိုလည်း ပေးသွားဦးမှာပါ</li><li class=\\\"mmfont my-2\\\">သင်တန်းကာလ ၁လ ပြီးတာနဲ့ ရန်ကုန်မြို့ရှိ Android Development Company များတွင် Junior Android Developer အဖြစ် အလုပ်ဝင်နိုင်ရန် အလုပ်တစ်ခါတည်းရှာပေးမှာပါ</li></ul></div></div></div>', '/storage/images/courses/1600232197.jpg', 300000, 'Weekday', '2 Months', NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(4, '0004', 'iOS Application Development', '/storage/images/courses/1600242234.png', '<div class=\\\"col-12\\\" style=\\\"width: 1140px; padding-right: 15px; padding-left: 15px;\\\"><h2 style=\\\"color: rgb(33, 37, 41);\\\">Objective</h2><hr style=\\\"color: rgb(33, 37, 41);\\\"><p class=\\\"mt-3 mmfont\\\" style=\\\"\\\"><font color=\\\"#212529\\\">iOS Developer အဖြစ်လုပ်ငန်းခွင်ဝင်လိုသူများအတွက် iOS Application တစ်ခုကို ကိုယ်တိုင်ရေးသားနိုင်သည် အထိ သင်ကြားပေးမည့် iOS Application Development Training ဖြစ်ပါတယ်။&nbsp;</font><font color=\\\"#212529\\\" face=\\\"Unicode\\\">iOS Application Development ပိုင်း တွင် နိုင်ငံခြား လုပ်ငန်းခွင် Project အတွေ့အကြုံ နှင့် စာသင်ကြားရေးအပိုင်းတွင် ပါ အတွေ့အကြုံရှိသော&nbsp;</font><span style=\\\"color: rgb(33, 37, 41); font-size: 1rem;\\\">ဆရာ မှ သင်ကြားပေးမည်ဖြစ်ပါသည် ။&nbsp;</span><font color=\\\"#212529\\\">သင်ကြားမည့် ဆရာမှာ လက်ရှိမြန်မာပြည်တွင် Banking Mobile Application များရေးသား နေသူဖြစ်ပြီး နိုင်ငံခြား အတွေ့အကြုံရှိသူလည်းဖြစ်ပါသည် ။&nbsp;</font><span style=\\\"color: rgb(33, 37, 41); font-size: 1rem;\\\">တန်းခွဲတစ်ခုလျင်သင်တန်းသား (၆) ဦးသာ လက်ခံသင်ကြားပေးမည်ဖြစ်ပါသည် ။သင်တန်းတက်မည့်သူများသည် Programming အခြေခံသိရှိနားလည်ထား ရပါမည်။</span></p></div><div class=\\\"col-12 mt-5\\\" style=\\\"width: 1140px; padding-right: 15px; padding-left: 15px; color: rgb(33, 37, 41);\\\"><h2>Course Outline</h2><hr><ol class=\\\"mt-2 courseoutline\\\" style=\\\"list-style-image: url(&quot;../image/courseoutline.png&quot;);\\\"><li><span style=\\\"color: rgb(5, 5, 5); font-family: system-ui, -apple-system, system-ui, &quot;.SFNSText-Regular&quot;, sans-serif; font-size: 15px; white-space: pre-wrap;\\\">Learning Swift Language 5.0 and iOS 13 API ,</span><br></li><li>Logical Thinking Developments</li><li>Understanding iOS UI Elements and Effective usages</li><li>iOS App Lifecycle and view controller management</li><li>Handling Multimedia Contents, audio , video , camera etc</li><li>Using SQL Database in App for persistence</li><li>Using third party Framework and Tools</li><li>Concurrency and Networking</li><li>Practical Projects and Resource</li><li>AR Kit (iOS 11 New API)</li><li><div dir=\\\"auto\\\" style=\\\"font-family: system-ui, -apple-system, system-ui, &quot;.SFNSText-Regular&quot;, sans-serif; color: rgb(5, 5, 5); font-size: 15px; white-space: pre-wrap;\\\">Core ML (Machine Learning) for additional</div></li></ol></div><div class=\\\"col-12 mt-5\\\" style=\\\"width: 1140px; padding-right: 15px; padding-left: 15px; color: rgb(33, 37, 41);\\\"><h2>Facility</h2><hr><ul class=\\\"facility\\\" style=\\\"list-style-image: url(&quot;../image/cool.png&quot;);\\\"><li class=\\\"mmfont my-2\\\">သင်တန်းသားများအတွက် သင်တန်းတွင် Mac Mini များဖြင့် စီစဉ်ပေးထားပြီး စာတွေ့လက်တွေ့ကျွမ်းကျင်စေရန် သင်ကြားပေးပါသည်။<br></li></ul></div>', '/storage/images/courses/1600242234.jpg', 200000, 'Weekend', '2.5 Months', NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(5, '0005', 'Programming Fundamental', '/storage/images/courses/1600242874.png', '<div class=\\\"col-12\\\" style=\\\"width: 1140px; padding-right: 15px; padding-left: 15px; color: rgb(33, 37, 41);\\\"><h2>Objective</h2><hr><p class=\\\"mt-3 mmfont\\\"></p><div class=\\\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\\\" style=\\\"overflow-wrap: break-word; margin: 0.5em 0px 0px; white-space: pre-wrap; font-family: system-ui, -apple-system, system-ui, &quot;.SFNSText-Regular&quot;, sans-serif; color: rgb(5, 5, 5); font-size: 15px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\\\"></div><p></p><div class=\\\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\\\" style=\\\"overflow-wrap: break-word; margin: 0.5em 0px 0px; white-space: pre-wrap; font-family: system-ui, -apple-system, system-ui, &quot;.SFNSText-Regular&quot;, sans-serif; color: rgb(5, 5, 5); font-size: 15px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\\\"><div dir=\\\"auto\\\" style=\\\"font-family: inherit; text-align: start;\\\">အိုင်တီပိုင်းမှာ Developer တစ်ယောက်အနေနဲ့ ရပ်တည်နိုင်ဖို့ဆို Programmming Language ကို မဖြစ်မနေ သိရှိထားဖို့လိုအပ်ပါတယ်။</div><div dir=\\\"auto\\\" style=\\\"font-family: inherit; text-align: start;\\\">လေ့လာစရာ Programming Language တွေ အများကြီး ရှိတဲ့အပြင် Basic Programming Concept အနေနဲ့လည်း သိသင့်စရာတွေ အရမ်းများပါတယ်။ <span style=\\\"font-family: inherit;\\\">ဒါပေမဲ့ အခြေခံသဘောတရားကတော့ အတူတူပါဘဲ။ </span><span style=\\\"font-family: inherit;\\\">Programming ကို စိတ်ဝင်စားပေမယ့် ဘယ်ကနေ စလေ့လာရမှန်းမသိဖြစ်နေတယ်ဆိုရင်တော့ Program နောက်ကွယ်က အခြေခံအကျဆုံး Logic တွေရဲ့ အကြောင်း ကို စတင် လေ့လာထားသင့်ပါတယ်။ </span><span style=\\\"font-family: inherit;\\\">Computational Thinking ပိုင်းကောင်းမှသာ Program Coding ပိုင်းကို အကောင်းဆုံးရေးနိုင်မှာဖြစ်ပါတယ်။ </span><span style=\\\"font-family: inherit;\\\">သင်တန်းမှာဆိုရင် Programming ရဲ့ Concept များ၊ Program တစ်ပုဒ်ရေးသားရာမှာ ပါဝင်တဲ့ Thinking Concept များ၊ Logic များမှစပြီး OOP Feature &amp; Concept များကို စနစ်တကျ သင်ကြားပေးသွားမှာဖြစ်တဲ့အတွက် </span><span style=\\\"font-family: inherit;\\\">Programming Language ကိုအခြေခံကစလေ့လာလိုသူများ (အထူး) တက်ရောက်သင့်ပါတယ်။</span></div></div></div><div class=\\\"col-12 mt-5\\\" style=\\\"width: 1140px; padding-right: 15px; padding-left: 15px; color: rgb(33, 37, 41);\\\"><h2>Course Outline</h2><hr><ol class=\\\"mt-2 courseoutline\\\" style=\\\"list-style-image: url(&quot;../image/courseoutline.png&quot;);\\\"><li><span style=\\\"font-size: 1rem;\\\">What is Computer Programming?</span><br></li><li>Why the need of Programming?</li><li>Basic Programming Concepts</li><li>Introduction to C++ Programming</li><li>Basic Level of C++<br><div dir=\\\"auto\\\" style=\\\"font-family: system-ui, -apple-system, system-ui, &quot;.SFNSText-Regular&quot;, sans-serif; color: rgb(5, 5, 5); font-size: 15px; white-space: pre-wrap;\\\">- C++ Basics ( variable and data type, Expression, Operator)</div><div dir=\\\"auto\\\" style=\\\"font-family: system-ui, -apple-system, system-ui, &quot;.SFNSText-Regular&quot;, sans-serif; color: rgb(5, 5, 5); font-size: 15px; white-space: pre-wrap;\\\">- Conditional Statements ( if, if..else, if..else..if,switch case)</div><div dir=\\\"auto\\\" style=\\\"font-family: system-ui, -apple-system, system-ui, &quot;.SFNSText-Regular&quot;, sans-serif; color: rgb(5, 5, 5); font-size: 15px; white-space: pre-wrap;\\\">- Looping Statements ( for, while, do while, continue,break,goto)</div><div dir=\\\"auto\\\" style=\\\"font-family: system-ui, -apple-system, system-ui, &quot;.SFNSText-Regular&quot;, sans-serif; color: rgb(5, 5, 5); font-size: 15px; white-space: pre-wrap;\\\">- Functions</div><div dir=\\\"auto\\\" style=\\\"font-family: system-ui, -apple-system, system-ui, &quot;.SFNSText-Regular&quot;, sans-serif; color: rgb(5, 5, 5); font-size: 15px; white-space: pre-wrap;\\\">- Arrays</div></li><li>What is Object-Oriented Programming?<br><div dir=\\\"auto\\\" style=\\\"font-family: system-ui, -apple-system, system-ui, &quot;.SFNSText-Regular&quot;, sans-serif; color: rgb(5, 5, 5); font-size: 15px; white-space: pre-wrap;\\\">- OOP Concepts</div><div dir=\\\"auto\\\" style=\\\"font-family: system-ui, -apple-system, system-ui, &quot;.SFNSText-Regular&quot;, sans-serif; color: rgb(5, 5, 5); font-size: 15px; white-space: pre-wrap;\\\">- Encapsulation ( class, Object)</div><div dir=\\\"auto\\\" style=\\\"font-family: system-ui, -apple-system, system-ui, &quot;.SFNSText-Regular&quot;, sans-serif; color: rgb(5, 5, 5); font-size: 15px; white-space: pre-wrap;\\\">- Inheritance ( types of Inheritance)</div><div dir=\\\"auto\\\" style=\\\"font-family: system-ui, -apple-system, system-ui, &quot;.SFNSText-Regular&quot;, sans-serif; color: rgb(5, 5, 5); font-size: 15px; white-space: pre-wrap;\\\">- Polymorphism ( runtime polymorphism &amp; compiletime polymorphism)</div></li><li>Introduction to Java Programming</li><li>Java Basics</li><li>OOP with Java<br><div dir=\\\"auto\\\" style=\\\"font-family: system-ui, -apple-system, system-ui, &quot;.SFNSText-Regular&quot;, sans-serif; color: rgb(5, 5, 5); font-size: 15px; white-space: pre-wrap;\\\">-Encapsulation ( class, constructor, properties, methods, access-modifiers)</div><div dir=\\\"auto\\\" style=\\\"font-family: system-ui, -apple-system, system-ui, &quot;.SFNSText-Regular&quot;, sans-serif; color: rgb(5, 5, 5); font-size: 15px; white-space: pre-wrap;\\\">- Inheritance</div><div dir=\\\"auto\\\" style=\\\"font-family: system-ui, -apple-system, system-ui, &quot;.SFNSText-Regular&quot;, sans-serif; color: rgb(5, 5, 5); font-size: 15px; white-space: pre-wrap;\\\">- Polymorphism</div></li><li>Exception Handling</li><li>Java String Manipulation</li><li><div dir=\\\"auto\\\" style=\\\"font-family: system-ui, -apple-system, system-ui, &quot;.SFNSText-Regular&quot;, sans-serif; color: rgb(5, 5, 5); font-size: 15px; white-space: pre-wrap;\\\">Collection Framework</div></li></ol></div>', '/storage/images/courses/1600242874.jpg', 100000, 'Weekday', '1 Month', NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(6, '0006', 'Japanese & IT Bootcamp', '/storage/images/courses/1600243426.jpg', '<div class=\\\"col-12\\\" style=\\\"width: 1140px; padding-right: 15px; padding-left: 15px; color: rgb(33, 37, 41);\\\"><h2>Objective</h2><hr><p class=\\\"mt-3 mmfont\\\">PHP Web Developer Bootcamp @Yangon (တစ်နေ့ ၇နာရီ - ၆ပတ် ) သင်တန်း ဖြစ်ပါတယ်။ Project (၅)ခု ပြီးစီးအောင် သင်တန်းကာလတွင် ပြုလုပ် ပြီး ကိုယ်ပိုင် ဝက်ဆိုက်ပေါ် သို့ ကိုယ်တိုင်တင်ရမည် ဖြစ်သည့်အတွက် Junior Developer အဖြစ် အလုပ်ဝင်ရန် အဆင်သင့်ဖြစ်အောင် ပြင်ဆင်ပေးခြင်းဖြစ်ပါသည်။ Project ပြီးစီးအောင် ပြုလုပ်နိုင်မှ သာ Certificate ပေးမည်ဖြစ်ပါသည်။</p></div><div class=\\\"col-12 mt-5\\\" style=\\\"width: 1140px; padding-right: 15px; padding-left: 15px; color: rgb(33, 37, 41);\\\"><h2>What you\'ll learn</h2><hr><ul class=\\\"mt-2\\\"><li><span style=\\\"color: rgb(5, 5, 5); font-family: system-ui, -apple-system, system-ui, &quot;.SFNSText-Regular&quot;, sans-serif; font-size: 15px;\\\">ဂျပန်စာ ပိုင်းရော၊ Programming အပိုင်း နှစ်မျိုးလုံးကို လေ့ကျင့်သင်ကြားပေးမှာဖြစ်လို့ပါ။</span><br></li></ul></div><div class=\\\"col-12 mt-5\\\" style=\\\"width: 1140px; padding-right: 15px; padding-left: 15px; color: rgb(33, 37, 41);\\\"><h2>Course Outline</h2><hr><ol class=\\\"mt-2 courseoutline\\\" style=\\\"list-style-image: url(&quot;../image/courseoutline.png&quot;);\\\"><li>Web Design ( HTML5, CSS3,JavaScript, JQuery, Bootstrap4) and Mini Project</li><li>Database Technology ( MySQL )</li><li>Vue JS and PHP MVC MySQL RESTFul API (CI / Laravel Framework) and Mini Project</li><li>PHP CMS ( Wordpress ) and Mini Project</li><li>Software Engineering Fundamental</li><li>Group Project Presentation</li></ol></div><div class=\\\"col-12 mt-5\\\" style=\\\"width: 1140px; padding-right: 15px; padding-left: 15px; color: rgb(33, 37, 41);\\\"><h2>Facility</h2><hr><ul class=\\\"facility\\\" style=\\\"list-style-image: url(&quot;../image/cool.png&quot;);\\\"><li class=\\\"mmfont my-2\\\">နယ်ကျောင်းသူများအတွက် Aircon/Internet အပါ အဆောင်စီစဉ်ပေးမည်</li><li class=\\\"mmfont my-2\\\"><span style=\\\"color: rgb(5, 5, 5); font-family: system-ui, -apple-system, system-ui, &quot;.SFNSText-Regular&quot;, sans-serif; font-size: 15px;\\\">ဂျပန်မှာ အိုင်တီပညာရှင်အဖြစ်လက်ရှိအလုပ်ဝင်နေတဲ့ Senior များရဲ့ Knowledge Sharing အစီအစဉ်တွေ၊ ဂျပန်နဲ့ ပက်သတ်တဲ့ Activities တွေကိုလည်း တစ်ပတ်တစ်မျိုးမရိုးရအောင် စီစဉ်ပေးထားပါသေးတယ်။</span><br></li><li class=\\\"mmfont my-2\\\"><span style=\\\"color: rgb(5, 5, 5); font-family: system-ui, -apple-system, system-ui, &quot;.SFNSText-Regular&quot;, sans-serif; font-size: 15px;\\\">သင်တန်းပြီးတာနဲ့ ဂျပန်ကုမ္ပဏီတွေနဲ့ အင်တာဗျူးကိုတွေကိုလည်း ချိတ်ဆက်ပေးမှ</span>ဖြစ်ပါသည်</li></ul></div>', '/storage/images/courses/1600243375.jpg', 1450000, 'Weekday', '10 Months', NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(7, '0007', 'Python Programming', '/storage/images/courses/1600258656.png', '<div class=\"\\&quot;col-12\\&quot;\" style=\"\\&quot;width:\" 1140px;=\"\" padding-right:=\"\" 15px;=\"\" padding-left:=\"\" color:=\"\" rgb(33,=\"\" 37,=\"\" 41);\\\"=\"\"><h2><div class=\"\\&quot;col-12\\&quot;\" style=\"\\&quot;width:\" 1140px;=\"\" padding-right:=\"\" 15px;=\"\" padding-left:=\"\" font-size:=\"\" 16px;\\\"=\"\"><p class=\"\\&quot;mt-3\" mmfont\\\"=\"\"><span style=\"\\&quot;font-size:\" 36px;\\\"=\"\">﻿Objective</span></p></div></h2></div><hr><div class=\"\\&quot;col-12\\&quot;\" style=\"\\&quot;width:\" 1140px;=\"\" padding-right:=\"\" 15px;=\"\" padding-left:=\"\" 15px;\\\"=\"\"><h2 style=\"\\&quot;\\&quot;\"><div class=\"\\&quot;col-12\\&quot;\" style=\"\\&quot;width:\" 1140px;=\"\" padding-right:=\"\" 15px;=\"\" padding-left:=\"\" line-height:=\"\" 1;\\\"=\"\"><p class=\"\\&quot;mt-3\" mmfont\\\"=\"\" style=\"\\&quot;line-height:\" 1;\\\"=\"\"><font face=\"\\&quot;Unicode\\&quot;\"><span style=\"font-size: 14px;\" 16px;\\\"=\"\">Python ဆိုတာက အခုနောက်ပိုင်းလူသုံးများလာတဲ့ High Level Programming Language တစ်ခုဖြစ်တဲ့အပြင် စစ်တမ်းများအရလည်း ဒုတိယလူသုံးအများဆုံ း Language တစ်ခုဖြစ်လာပါတယ်။</span></font></p><p class=\"\\&quot;mt-3\" mmfont\\\"=\"\" style=\"\\&quot;line-height:\" 1;\\\"=\"\"><span style=\"font-size: 14px;\" 16px;=\"\" color:=\"\" rgb(33,=\"\" 37,=\"\" 41);\\\"=\"\">📌Python ဟာ Programming အပိုင်းကို အခုမှ စတင်ထိတွေ့မယ့် လူငယ်များအတွက် အသင့်တော်ဆုံး Language တစ်ခုဆိုရင်လည်း မမှားပါဘူး။</span></p><p class=\"\\&quot;mt-3\" mmfont\\\"=\"\" style=\"\\&quot;line-height:\" 1;\\\"=\"\"><font face=\"\\&quot;Unicode\\&quot;\"><span style=\"font-size: 14px;\" 16px;\\\"=\"\">✅ဘာ့ကြောင့်လည်းဆိုရင် လွယ်ကူရိုးရှင်းတဲ့ Coding တွေကို အသုံးပြုပြီးရေးသားရတာက&nbsp; သူ့ရဲ့ အားသာချက်တစ်ခုဖြစ်တဲ့ အတွက်ကြောင့်ပါ။</span></font></p><p class=\"\\&quot;mt-3\" mmfont\\\"=\"\" style=\"\\&quot;line-height:\" 1;\\\"=\"\"><font face=\"\\&quot;Unicode\\&quot;\"><span style=\"font-size: 14px;\" 16px;\\\"=\"\">💯ဒါ့အပြင် Desktop GUI Application တွေ၊ Website တွေနဲ့ Web Application တွေကို Develop လုပ်ရာမှာ အသင့်တော်ဆုံးဖြစ်တဲ့ အတွက်ကြောင့်လည်း အလုပ်အကိုင်အခွင့်အလမ်းတွေက ပိုပြီးများလာပါတယ်။</span></font></p><p class=\"\\&quot;mt-3\" mmfont\\\"=\"\" style=\"\\&quot;line-height:\" 1;\\\"=\"\"><span style=\"font-size: 14px;\" 16px;\\\"=\"\">📌ပုံမှန် python course တွေနဲ့မတူပဲ စိတ်ဝင်စားစရာကောင်းတဲ့ ဥပမာလေးတေ၊ Newton\'s Law equation တွေ၊ သင်္ချာ formula လေးတွေကို Python code နဲ့ပြောင်းရေးကြည့်ရင်း Language တခုလုံးကို သေချာစေ့စပ်စွာ လေ့လာပြီးသားဖြစ်သွားစေမယ့် သင်တန်းတစ်ခုဖြစ်ပါတယ်။</span><br></p><p class=\"\\&quot;mt-3\" mmfont\\\"=\"\" style=\"\\&quot;color:\" rgb(33,=\"\" 37,=\"\" 41);=\"\" font-size:=\"\" 16px;\\\"=\"\"><span style=\"\\&quot;font-family:\" unicode;\\\"=\"\"><br></span><span style=\"\\&quot;font-size:\" 36px;\\\"=\"\">Course Outlines</span></p></div></h2></div><hr><div class=\"\\&quot;col-12\\&quot;\" style=\"\\&quot;width:\" 1140px;=\"\" padding-right:=\"\" 15px;=\"\" padding-left:=\"\" 15px;\\\"=\"\"><h2 style=\"\\&quot;\\&quot;\"><div class=\"\\&quot;col-12\" mt-5\\\"=\"\" style=\"\\&quot;width:\" 1140px;=\"\" padding-right:=\"\" 15px;=\"\" padding-left:=\"\" 15px;\\\"=\"\"><ol class=\"\\&quot;mt-2\" courseoutline\\\"=\"\" url(&quot;..=\"\" image=\"\" courseoutline.png&quot;);\\\"=\"\" style=\"font-size: 16px;\"><li rgb(33,=\"\" 37,=\"\" 41);=\"\" font-size:=\"\" 16px;\\\"=\"\"><span style=\"font-size: 14px;\">Computing with formula</span></li><li rgb(33,=\"\" 37,=\"\" 41);=\"\" font-size:=\"\" 16px;\\\"=\"\"><span style=\"font-size: 14px;\">Loops and Lists</span></li><li rgb(33,=\"\" 37,=\"\" 41);=\"\" font-size:=\"\" 16px;\\\"=\"\"><span style=\"font-size: 14px;\">Functions and Branching</span></li><li rgb(33,=\"\" 37,=\"\" 41);=\"\" font-size:=\"\" 16px;\\\"=\"\"><span style=\"font-size: 14px;\">User Input and Error Handling</span></li><li rgb(33,=\"\" 37,=\"\" 41);=\"\" font-size:=\"\" 16px;\\\"=\"\"><span style=\"font-size: 14px;\">Array Computing and Curve Plotting</span></li><li rgb(33,=\"\" 37,=\"\" 41);=\"\" font-size:=\"\" 16px;\\\"=\"\"><span style=\"font-size: 14px;\">Dictionaries and Strings</span></li><li rgb(33,=\"\" 37,=\"\" 41);=\"\" font-size:=\"\" 16px;\\\"=\"\"><span style=\"font-size: 14px;\">Introduction to Classes</span></li><li rgb(33,=\"\" 37,=\"\" 41);=\"\" font-size:=\"\" 16px;\\\"=\"\"><span style=\"font-size: 14px;\">Random Numbers and Simple Games</span></li><li rgb(33,=\"\" 37,=\"\" 41);=\"\" font-size:=\"\" 16px;\\\"=\"\"><span style=\"font-size: 14px;\">Object Oriented Programming</span></li></ol></div></h2></div>', '/storage/images/courses/1600258656.jpg', 100000, 'Weekend', '1.5 Months', NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(8, '0008', 'Japanese N5 Class', '/storage/images/courses/1600258962.jpg', '<div class=\"\\&quot;col-12\\&quot;\" style=\"\\&quot;width:\" 1140px;=\"\" padding-right:=\"\" 15px;=\"\" padding-left:=\"\" color:=\"\" rgb(33,=\"\" 37,=\"\" 41);\\\"=\"\"><h2><div class=\"\\&quot;col-12\\&quot;\" style=\"\\&quot;width:\" 1140px;=\"\" padding-right:=\"\" 15px;=\"\" padding-left:=\"\" font-size:=\"\" 16px;\\\"=\"\"><p class=\"\\&quot;mt-3\" mmfont\\\"=\"\"><span style=\"\\&quot;font-size:\" 36px;\\\"=\"\">﻿Objective</span></p></div></h2></div><hr><div class=\"\\&quot;col-12\\&quot;\" style=\"\\&quot;width:\" 1140px;=\"\" padding-right:=\"\" 15px;=\"\" padding-left:=\"\" color:=\"\" rgb(33,=\"\" 37,=\"\" 41);\\\"=\"\"><h2><div class=\"\\&quot;col-12\\&quot;\" style=\"\\&quot;width:\" 1140px;=\"\" padding-right:=\"\" 15px;=\"\" padding-left:=\"\" font-size:=\"\" 16px;\\\"=\"\"><div class=\"\\&quot;o9v6fnle\" cxmmr5t8=\"\" oygrvhab=\"\" hcukyx3x=\"\" c1et5uql=\"\" ii04i59q\\\"=\"\" style=\"\\&quot;overflow-wrap:\" break-word;=\"\" margin:=\"\" 0.5em=\"\" 0px=\"\" 0px;=\"\" white-space:=\"\" pre-wrap;=\"\" font-family:=\"\" system-ui,=\"\" -apple-system,=\"\" &quot;.sfnstext-regular&quot;,=\"\" sans-serif;=\"\" color:=\"\" rgb(5,=\"\" 5,=\"\" 5);=\"\" font-size:=\"\" 15px;\\\"=\"\"><div dir=\"\\&quot;auto\\&quot;\" style=\"\\&quot;font-family:\" inherit;\\\"=\"\"><span style=\"font-size: 14px;\">ကောင်းမွန်တဲ့ သင်ကြားနည်းစနစ်တွေနဲ့ သင်ကြားပေးမဲ့ သင်တန်း။ </span><span style=\"font-size: 14px;\" inherit;\\\"=\"\">ဂျပန်စာကို အခြေခံကစ သင်ကြားချင်တဲ့သူများ တက်သင့်သောသင်တန်း။ </span><span style=\"font-size: 14px;\" inherit;\\\"=\"\">ဂျပန်ဘာသာစကားနဲ့ အနာဂတ်ကို အကောင်းဆုံးပုံဖော်ဖို့ ဆန္ဒရှိသူများ တက်သင့်သောသင်တန်း။ </span></div></div><div class=\"\\&quot;o9v6fnle\" cxmmr5t8=\"\" oygrvhab=\"\" hcukyx3x=\"\" c1et5uql=\"\" ii04i59q\\\"=\"\" style=\"\\&quot;overflow-wrap:\" break-word;=\"\" margin:=\"\" 0.5em=\"\" 0px=\"\" 0px;=\"\" white-space:=\"\" pre-wrap;=\"\" font-family:=\"\" system-ui,=\"\" -apple-system,=\"\" &quot;.sfnstext-regular&quot;,=\"\" sans-serif;=\"\" color:=\"\" rgb(5,=\"\" 5,=\"\" 5);=\"\" font-size:=\"\" 15px;\\\"=\"\"><div dir=\"\\&quot;auto\\&quot;\" style=\"\\&quot;font-family:\" inherit;\\\"=\"\"><span style=\"font-size: 14px;\">သင်ကြားရေးအတွေ့အကြုံရှိ ဆရာမတွေနဲ့ သင်ကြားရမှာမို့ </span><span style=\"font-size: 14px;\" inherit;\\\"=\"\">သင်ပြီး နားမလည်တဲ့ အဖြစ်တွေ။ </span><span style=\"font-size: 14px;\" inherit;\\\"=\"\">ဘာသင်လို့ သင်မှန်းမသိဖြစ်ရတဲ့ အခြေအနေတွေ။ </span><span style=\"font-size: 14px;\" inherit;\\\"=\"\">ပျင်းစရာကောင်းတဲ့ စာသင်နည်းစနစ်တွေ </span><span style=\"font-size: 14px;\" inherit;\\\"=\"\">ဒီလို အဖြစ်မျိုုးတွေ လုံးဝ (လုံးဝ) ရှိမှာ မဟုတ်ပါဘူး။</span></div></div></div></h2></div>', '/storage/images/courses/1600258943.jpg', 120000, 'Weekend', '3 Months', NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38');

-- --------------------------------------------------------

--
-- Table structure for table `course_projecttype`
--

CREATE TABLE `course_projecttype` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `projecttype_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_projecttype`
--

INSERT INTO `course_projecttype` (`id`, `course_id`, `projecttype_id`) VALUES
(1, 2, 1),
(2, 6, 1),
(3, 2, 2),
(4, 6, 2),
(5, 3, 3),
(6, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `course_subject`
--

CREATE TABLE `course_subject` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_subject`
--

INSERT INTO `course_subject` (`id`, `course_id`, `subject_id`) VALUES
(1, 2, 1),
(2, 6, 1),
(3, 2, 2),
(4, 6, 2),
(5, 2, 3),
(6, 6, 3),
(7, 2, 4),
(8, 6, 4),
(9, 2, 5),
(10, 6, 5),
(11, 2, 6),
(12, 6, 6),
(13, 2, 7),
(14, 6, 7),
(15, 2, 8),
(16, 6, 8),
(17, 2, 9),
(18, 6, 9),
(19, 2, 10),
(20, 6, 10),
(21, 2, 11),
(22, 6, 11),
(23, 2, 12),
(24, 6, 12),
(25, 2, 13),
(26, 3, 14),
(27, 3, 15),
(28, 3, 16),
(29, 5, 17),
(30, 5, 18),
(31, 5, 16),
(32, 6, 19),
(33, 6, 20),
(34, 6, 21),
(35, 6, 22),
(36, 1, 23),
(37, 1, 24),
(38, 1, 25),
(39, 1, 26),
(40, 1, 27),
(41, 2, 27),
(42, 4, 28),
(43, 7, 20),
(44, 8, 21),
(46, 2, 29),
(47, 3, 29);

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `name`, `type`, `user_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'CU (Hinthada)', 'CU', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(2, 'CU (Pathein)', 'CU', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(3, 'CU (Pyay)', 'CU', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(4, 'CU (Taungoo)', 'CU', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(5, 'CU (Bhamo)', 'CU', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(6, 'CU (Myitkyina)', 'CU', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(7, 'CU (Loikaw)', 'CU', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(8, 'CU (Hpa-An)', 'CU', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(9, 'CU (Mandalay)', 'CU', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(10, 'CU (Meiktila)', 'CU', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(11, 'CU (Thaton)', 'CU', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(12, 'CU (Sittwe)', 'CU', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(13, 'CU (Kalay)', 'CU', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(14, 'CU (Monywa)', 'CU', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(15, 'CU (Lashio)', 'CU', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(16, 'CU (Kyaingtong)', 'CU', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(17, 'CU (Panglong)', 'CU', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(18, 'CU (Taunggyi)', 'CU', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(19, 'CU (Dawei)', 'CU', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(20, 'CU (Myeik)', 'CU', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(21, 'CU (Yangon)', 'CU', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(22, 'CU (Magway)', 'CU', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(23, 'CU (Pakokku)', 'CU', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(24, 'CU (Maubin)', 'CU', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(25, 'TU (Hinthada)', 'TU', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(26, 'TU (Maubin)', 'TU', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(27, 'TU (Pathein)', 'TU', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(28, 'TU (Pyay)', 'TU', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(29, 'TU (Taungoo)', 'TU', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(30, 'TU (Bhamo)', 'TU', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(31, 'TU (Myitkyina)', 'TU', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(32, 'TU (Loikaw)', 'TU', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(33, 'TU (Hpa-An)', 'TU', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(34, 'TU (Magway)', 'TU', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(35, 'TU (Pakokku)', 'TU', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(36, 'TU (Mandalay)', 'TU', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(37, 'TU (Kyaukse)', 'TU', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(38, 'TU (Mandalay)', 'TU', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(39, 'TU (Meiktila)', 'TU', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(40, 'TU (Mawlamyine)', 'TU', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(41, 'TU (Sittwe)', 'TU', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(42, 'TU (Sagaing)', 'TU', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(43, 'TU (Monywa)', 'TU', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(44, 'TU (Kalay)', 'TU', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(45, 'TU (Kyaingtong)', 'TU', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(46, 'TU (Lashio)', 'TU', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(47, 'TU (Panglong)', 'TU', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(48, 'TU (Taunggyi)', 'TU', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(49, 'TU (Dawei)', 'TU', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(50, 'TU (Myeik)', 'TU', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(51, 'TU (Hmawbi)', 'TU', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(52, 'TU (Thanlyin)', 'TU', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(53, 'TU (West Yangon)', 'TU', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(54, 'TU (Yangon)', 'TU', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(55, 'KMD', 'Private', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(56, 'Gusto', 'Private', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(57, 'Info Myanmar', 'Private', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(58, 'MCC', 'Private', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(59, 'STI', 'Private', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(60, 'YIU', 'Private', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(61, 'Y-Max', 'Private', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(62, 'Strategy First', 'Private', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(63, 'MMC', 'Private', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(64, 'MIU', 'Private', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(65, 'Hinthada University', 'Government', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(66, 'Maubin University', 'Government', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(67, 'Pathein University', 'Government', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(68, 'Pyay University', 'Government', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(69, 'Taungoo University', 'Government', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(70, 'Bhamo University', 'Government', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(71, 'Myitkyina University', 'Government', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(72, 'Loikaw University', 'Government', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(73, 'Hpa-An University', 'Government', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(74, 'Magway University', 'Government', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(75, 'Pakokku University', 'Government', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(76, 'Yenangyaung University', 'Government', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(77, 'University of Mandalay', 'Government', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(78, 'Meiktila University', 'Government', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(79, 'Yadanabon University', 'Government', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(80, 'Mawlamyine University', 'Government', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(81, 'Sittwe University', 'Government', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(82, 'Monywa University', 'Government', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(83, 'Shwebo University', 'Government', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(84, 'University of Kalay', 'Government', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(85, 'Lashio University', 'Government', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(86, 'Kyaingtong University', 'Government', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(87, 'Taunggyi University', 'Government', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(88, 'Dawei University', 'Government', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(89, 'Myeik University', 'Government', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(90, 'Dagon University', 'Government', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(91, 'Yangon University of Distance Education', 'Government', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(92, 'Mandalay University of Distance Education', 'Government', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(93, 'University of East Yangon', 'Government', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(94, 'University of Foreign Languages, Yangon', 'Government', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(95, 'University of Information Technology, Yangon', 'Government', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(96, 'University of West Yangon', 'Government', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(97, 'Yangon University', 'Government', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(98, 'Under Graduate', 'Other', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(99, 'Post Graduate', 'Other', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `attachment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
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
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `trouble` longtext COLLATE utf8mb4_unicode_ci,
  `benefit` longtext COLLATE utf8mb4_unicode_ci,
  `teaching` longtext COLLATE utf8mb4_unicode_ci,
  `mentoring` longtext COLLATE utf8mb4_unicode_ci,
  `favourite` longtext COLLATE utf8mb4_unicode_ci,
  `speed` longtext COLLATE utf8mb4_unicode_ci,
  `maintain` longtext COLLATE utf8mb4_unicode_ci,
  `quote` longtext COLLATE utf8mb4_unicode_ci,
  `recommend` longtext COLLATE utf8mb4_unicode_ci,
  `stars` longtext COLLATE utf8mb4_unicode_ci,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `batch_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `group_student`
--

CREATE TABLE `group_student` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `incomes`
--

CREATE TABLE `incomes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `date` date NOT NULL,
  `location_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inquires`
--

CREATE TABLE `inquires` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `inquireno` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receiveno` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `installmentdate` date DEFAULT NULL,
  `installmentamount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `status` bigint(20) NOT NULL DEFAULT '0',
  `knowledge` longtext COLLATE utf8mb4_unicode_ci,
  `camp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `acceptedyear` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `education_id` bigint(20) UNSIGNED NOT NULL,
  `batch_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inquires`
--

INSERT INTO `inquires` (`id`, `inquireno`, `receiveno`, `name`, `gender`, `phone`, `installmentdate`, `installmentamount`, `status`, `knowledge`, `camp`, `acceptedyear`, `message`, `education_id`, `batch_id`, `user_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '22092020001', '220920000311181001', 'Stuent One', 'male', '0987654321', '2020-09-22', '300000', 2, 'HTML, CSS, Bootstrap, Javascript', 'no', '2020', NULL, 55, 1, 1, NULL, '2020-09-22 07:27:08', '2020-09-22 07:28:30'),
(2, '22092020002', '220920000211181001', 'Stuent Two', 'male', '0987654321', '2020-09-22', '300000', 2, 'HTML, CSS, Bootstrap, Javascript', 'no', '2020', NULL, 7, 3, 1, NULL, '2020-09-22 07:27:25', '2020-09-22 07:28:38'),
(3, '22092020003', '220920000211181002', 'Stuent One', 'male', '0987654321', '2020-09-22', '300000', 2, 'HTML, CSS, Bootstrap, Javascript', 'no', '2020', NULL, 55, 3, 1, NULL, '2020-09-22 07:27:42', '2020-09-22 07:28:44'),
(4, '22092020004', '220920000311181001', 'Student Three', 'female', '0987654321', '2020-09-22', '300000', 2, 'HTML, CSS, Bootstrap, Javascript', 'no', '2020', NULL, 41, 2, 1, NULL, '2020-09-22 07:29:14', '2020-09-22 07:29:31'),
(5, '22092020005', '220920000211181003', 'Student Four', 'female', '0987654321', '2020-09-22', '300000', 2, 'asfasdfasdfadfadf', 'no', '2020', NULL, 3, 3, 1, NULL, '2020-09-22 08:56:34', '2020-09-22 08:56:48'),
(6, '22092020006', '220920000211181004', 'Student Five', 'male', '0987654321', '2020-09-22', '300000', 2, 'asdfasdf', 'no', '2020', NULL, 2, 3, 1, NULL, '2020-09-22 08:57:53', '2020-09-22 08:58:17'),
(7, '22092020007', '220920000211181005', 'Student Seven', 'male', '0987654321', '2020-09-22', '300000', 2, 'asdfasdfasdfasdfasdf', 'no', '2020', NULL, 1, 3, 1, NULL, '2020-09-22 08:59:31', '2020-09-22 09:02:07'),
(8, '25092020001', '250920000211181001', 'Student One', 'male', '0987654321', '2020-09-25', '300000', 2, 'adfasdfasdfas', 'no', '2020', NULL, 55, 4, 1, NULL, '2020-09-25 05:20:38', '2020-09-25 05:23:24'),
(9, '25092020002', NULL, 'StudentTen', 'female', '098765432', NULL, '0', 0, 'afsdfasdfasdfasdf', 'no', '2020', NULL, 1, 4, 1, NULL, '2020-09-25 05:29:34', '2020-09-25 05:29:34');

-- --------------------------------------------------------

--
-- Table structure for table `journals`
--

CREATE TABLE `journals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` longtext COLLATE utf8mb4_unicode_ci,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `journals`
--

INSERT INTO `journals` (`id`, `title`, `content`, `file`, `type`, `user_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '🎉 Congratulations 🎉', '<div class=\"kvgmc6g5 cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\" style=\"overflow-wrap: break-word; margin: 0px; white-space: pre-wrap; font-family: system-ui, -apple-system, system-ui, &quot;.SFNSText-Regular&quot;, sans-serif; color: rgb(5, 5, 5); font-size: 15px;\"><div dir=\"auto\" style=\"font-family: inherit;\">Myanmar IT Consulting ရဲ့ PHP Web Development Bootcamp Training မှာ <span style=\"font-family: inherit;\">သင်ကြားခဲ့သည့် Mg Aung Myat Thu သည် </span><span style=\"font-family: inherit;\">Software Quality Assurance Position ဖြင့် အလုပ်ရရှိသွားသည့်အတွက် </span><span style=\"font-family: inherit;\">Myanmar IT မှ ဝမ်းသာဂုဏ်ယူမိပါတယ်ရှင်။ </span><span style=\"font-family: inherit;\">ရှေ့ဆက်လျှောက်မဲ့ ဘ၀ခရီးလမ်းမှာ အောင်မြင်ပါစေလို့ </span><span style=\"font-family: inherit;\">ဆုမွန်ကောင်းတောင်းပေးလိုက်ပါတယ်နော် </span></div><div dir=\"auto\" style=\"font-family: inherit;\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\" style=\"margin: 0px 1px; height: 16px; width: 16px; display: inline-flex; vertical-align: middle; font-family: inherit;\"><img height=\"16\" width=\"16\" alt=\"😊\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t1e/2/16/1f60a.png\" style=\"border: 0px;\"></span><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\" style=\"margin: 0px 1px; height: 16px; width: 16px; display: inline-flex; vertical-align: middle; font-family: inherit;\"><img height=\"16\" width=\"16\" alt=\"😊\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t1e/2/16/1f60a.png\" style=\"border: 0px;\"></span><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\" style=\"margin: 0px 1px; height: 16px; width: 16px; display: inline-flex; vertical-align: middle; font-family: inherit;\"><img height=\"16\" width=\"16\" alt=\"😊\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t1e/2/16/1f60a.png\" style=\"border: 0px;\"></span></div></div><div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\" style=\"overflow-wrap: break-word; margin: 0.5em 0px 0px; white-space: pre-wrap; font-family: system-ui, -apple-system, system-ui, &quot;.SFNSText-Regular&quot;, sans-serif; color: rgb(5, 5, 5); font-size: 15px;\"><div dir=\"auto\" style=\"font-family: inherit;\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\" style=\"margin: 0px 1px; height: 16px; width: 16px; display: inline-flex; vertical-align: middle; font-family: inherit;\"></span></div></div>', '/storage/images/journals/1600769543.jpg', 'Activity', 1, NULL, '2020-09-22 10:12:23', '2020-09-22 10:12:23'),
(2, '🎉 Congratulations Batch 17 🎉', '<p><span style=\"color: rgb(5, 5, 5); font-family: system-ui, -apple-system, system-ui, &quot;.SFNSText-Regular&quot;, sans-serif; font-size: 15px; white-space: pre-wrap;\">Batch 17 Graduation Day with Zoom</span><br></p>', '/storage/images/journals/1600769583.png', 'Activity', 1, NULL, '2020-09-22 10:13:03', '2020-09-22 10:13:03'),
(3, 'Welcome to Myanmar IT Online Bootcamp!', '<div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\" style=\"overflow-wrap: break-word; margin: 0.5em 0px 0px; white-space: pre-wrap; font-family: system-ui, -apple-system, system-ui, &quot;.SFNSText-Regular&quot;, sans-serif; color: rgb(5, 5, 5); font-size: 15px;\"><div dir=\"auto\" style=\"font-family: inherit;\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\" style=\"margin: 0px 1px; height: 16px; width: 16px; display: inline-flex; vertical-align: middle; font-family: inherit;\"><img height=\"16\" width=\"16\" alt=\"📣\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t59/2/16/1f4e3.png\" style=\"border: 0px;\"></span> အခုအချိန်မှာတော့ လတ်တလောဖြစ်ပွားနေသော ကျန်းမာရေးအခြေအနေများကြောင့်  Myanmar IT ကနေ Online Bootcamp အဖြစ်ပြောင်းလဲဖွင့်လှစ်တော့မှာဖြစ်ပါတယ်။</div></div><div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\" style=\"overflow-wrap: break-word; margin: 0.5em 0px 0px; white-space: pre-wrap; font-family: system-ui, -apple-system, system-ui, &quot;.SFNSText-Regular&quot;, sans-serif; color: rgb(5, 5, 5); font-size: 15px;\"><div dir=\"auto\" style=\"font-family: inherit;\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\" style=\"margin: 0px 1px; height: 16px; width: 16px; display: inline-flex; vertical-align: middle; font-family: inherit;\"><img height=\"16\" width=\"16\" alt=\"👉\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tf0/2/16/1f449.png\" style=\"border: 0px;\"></span> PHP Web Development Online Bootcamp နဲ့ Android Development Online Bootcamp တို့ကို စက်တင်ဘာလအတွင်း ဖွင့်လှစ်သွားမှာဖြစ်လို့ ကြိုတင်စာရင်းပေးလို့ရပါပြီ။</div><div dir=\"auto\" style=\"font-family: inherit;\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\" style=\"margin: 0px 1px; height: 16px; width: 16px; display: inline-flex; vertical-align: middle; font-family: inherit;\"><img height=\"16\" width=\"16\" alt=\"✅\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tb4/2/16/2705.png\" style=\"border: 0px;\"></span> Online Bootcamp ဆိုသော်ြငားလည်း သင်တန်းပြီးဆုံးတာနဲ့ ပြည်တွင်းအိုင်တီ Company တွေနဲ့ အင်တာဗျူးချိတ်ဆက်ပေးမှာဖြစ်ပါတယ်။</div></div><div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\" style=\"overflow-wrap: break-word; margin: 0.5em 0px 0px; white-space: pre-wrap; font-family: system-ui, -apple-system, system-ui, &quot;.SFNSText-Regular&quot;, sans-serif; color: rgb(5, 5, 5); font-size: 15px;\"><div dir=\"auto\" style=\"font-family: inherit;\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\" style=\"margin: 0px 1px; height: 16px; width: 16px; display: inline-flex; vertical-align: middle; font-family: inherit;\"><img height=\"16\" width=\"16\" alt=\"✳️\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t8f/2/16/2733.png\" style=\"border: 0px;\"></span> Myanmar IT Consulting ရဲ့ Online Bootcamp မှာဆိုရင် ​​Zoom Software ကို အသုံးပြုပြီး သင်တန်းသားတွေကို online ကနေ live သင်ကြားမှာဖြစ်ပါတယ်။ </div><div dir=\"auto\" style=\"font-family: inherit;\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\" style=\"margin: 0px 1px; height: 16px; width: 16px; display: inline-flex; vertical-align: middle; font-family: inherit;\"><img height=\"16\" width=\"16\" alt=\"✳️\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t8f/2/16/2733.png\" style=\"border: 0px;\"></span> နေ့စဥ် သင်ကြားပြီးတဲ့ အပိုင်းတွေကို Mentor တွေက အဖွဲ့လိုက်တာ၀န်ယူပြီး ဦးဆောင်ဆွေးနွေးပေးမယ့် အစီအစဥ်တွေလည်း ပါရှိပါတယ်။</div><div dir=\"auto\" style=\"font-family: inherit;\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\" style=\"margin: 0px 1px; height: 16px; width: 16px; display: inline-flex; vertical-align: middle; font-family: inherit;\"><img height=\"16\" width=\"16\" alt=\"✳️\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t8f/2/16/2733.png\" style=\"border: 0px;\"></span> သင်ထားတာတွေ လိုက်မမှီရင် ပြန်ကြည့်ဖို့လည်း ​Video File တွေပြန်တင်ပေးဦးမှာပါ ။</div><div dir=\"auto\" style=\"font-family: inherit;\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\" style=\"margin: 0px 1px; height: 16px; width: 16px; display: inline-flex; vertical-align: middle; font-family: inherit;\"><img height=\"16\" width=\"16\" alt=\"✳️\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t8f/2/16/2733.png\" style=\"border: 0px;\"></span> Mentor တွေနဲ့ အသေးစိတ်တိုင်ပင်ဆွေးနွေးလို့ရမယ့် အစီအစဥ်တွေ၊ အဖွဲ့လိုက် ဆွေးနွေးတဲ့ အစီအစဥ်တွေလည်း နေ့စဥ် ပါရှိပါတယ်။ </div></div><div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\" style=\"overflow-wrap: break-word; margin: 0.5em 0px 0px; white-space: pre-wrap; font-family: system-ui, -apple-system, system-ui, &quot;.SFNSText-Regular&quot;, sans-serif; color: rgb(5, 5, 5); font-size: 15px;\"><div dir=\"auto\" style=\"font-family: inherit;\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\" style=\"margin: 0px 1px; height: 16px; width: 16px; display: inline-flex; vertical-align: middle; font-family: inherit;\"><img height=\"16\" width=\"16\" alt=\"✳️\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t8f/2/16/2733.png\" style=\"border: 0px;\"></span> သင်တန်းက Online သင်တန်းဆိုပေမယ့် စာသင်ခန်းနဲ့ မခြားဘဲ ပုံမှန် Activities တွေပါရှိတာကြောင့် တစ်ရက် တစ်ရက်ကို ဘယ်လိုကုန်သွားမှန်းတောင် သိမှာမဟုတ်ပါဘူး။</div></div><div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\" style=\"overflow-wrap: break-word; margin: 0.5em 0px 0px; white-space: pre-wrap; font-family: system-ui, -apple-system, system-ui, &quot;.SFNSText-Regular&quot;, sans-serif; color: rgb(5, 5, 5); font-size: 15px;\"><div dir=\"auto\" style=\"font-family: inherit;\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\" style=\"margin: 0px 1px; height: 16px; width: 16px; display: inline-flex; vertical-align: middle; font-family: inherit;\"><img height=\"16\" width=\"16\" alt=\"✅\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tb4/2/16/2705.png\" style=\"border: 0px;\"></span><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\" style=\"margin: 0px 1px; height: 16px; width: 16px; display: inline-flex; vertical-align: middle; font-family: inherit;\"><img height=\"16\" width=\"16\" alt=\"✅\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tb4/2/16/2705.png\" style=\"border: 0px;\"></span> သင်တန်းအပြီး အလုပ်ရှာပေးမှာဖြစ်လို့ သင်ကြားရေးအပိုင်းကိုတော့ 100% အာမခံပြီး သင်ကြားပေးမှာဖြစ်ပါတယ်။</div></div>', '/storage/images/journals/1600769669.mp4', 'Activity', 1, NULL, '2020-09-22 10:14:29', '2020-09-22 10:14:29'),
(4, 'Android Development Bootcamp Batch-4 (Online Class)', '<div class=\"kvgmc6g5 cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\" style=\"overflow-wrap: break-word; margin: 0px; white-space: pre-wrap; font-family: system-ui, -apple-system, system-ui, &quot;.SFNSText-Regular&quot;, sans-serif; color: rgb(5, 5, 5); font-size: 15px;\"><div dir=\"auto\" style=\"font-family: inherit;\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\" style=\"margin: 0px 1px; height: 16px; width: 16px; display: inline-flex; vertical-align: middle; font-family: inherit;\"><img height=\"16\" width=\"16\" alt=\"🎀\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/ta2/2/16/1f380.png\" style=\"border: 0px;\"></span> Myanmar IT ရဲ့</div><div dir=\"auto\" style=\"font-family: inherit;\">Android Development Bootcamp Batch-4 (Online Class) လေးဟာဆိုရင်တော့ မနေ့ကစပြီး ဖွင့်လှစ်ခဲ့ပြီဖြစ်ပါတယ်။</div></div><div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\" style=\"overflow-wrap: break-word; margin: 0.5em 0px 0px; white-space: pre-wrap; font-family: system-ui, -apple-system, system-ui, &quot;.SFNSText-Regular&quot;, sans-serif; color: rgb(5, 5, 5); font-size: 15px;\"><div dir=\"auto\" style=\"font-family: inherit;\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\" style=\"margin: 0px 1px; height: 16px; width: 16px; display: inline-flex; vertical-align: middle; font-family: inherit;\"><img height=\"16\" width=\"16\" alt=\"🤗\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t56/2/16/1f917.png\" style=\"border: 0px;\"></span> Main Lecturer ရဲ့ ဦးဆောင်သင်ကြားပေးမှုအောက်မှာ ကျောင်းသားအားလုံး Coding တစ်ခါတည်းလိုက်ရေးရင်း </div><div dir=\"auto\" style=\"font-family: inherit;\">ဆရာနဲ့ တစ်ခါတည်း ဆွေးနွေးနိုင်တဲ့ Online Class ဆိုတော့ အဆင်ပြေတာပေါ့။</div></div><div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\" style=\"overflow-wrap: break-word; margin: 0.5em 0px 0px; white-space: pre-wrap; font-family: system-ui, -apple-system, system-ui, &quot;.SFNSText-Regular&quot;, sans-serif; color: rgb(5, 5, 5); font-size: 15px;\"><div dir=\"auto\" style=\"font-family: inherit;\">တစ်ခါတစ်လေ</div><div dir=\"auto\" style=\"font-family: inherit;\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\" style=\"margin: 0px 1px; height: 16px; width: 16px; display: inline-flex; vertical-align: middle; font-family: inherit;\"><img height=\"16\" width=\"16\" alt=\"👉\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tf0/2/16/1f449.png\" style=\"border: 0px;\"></span> Internet လိုင်းမကောင်းလို့၊ </div><div dir=\"auto\" style=\"font-family: inherit;\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\" style=\"margin: 0px 1px; height: 16px; width: 16px; display: inline-flex; vertical-align: middle; font-family: inherit;\"><img height=\"16\" width=\"16\" alt=\"👉\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tf0/2/16/1f449.png\" style=\"border: 0px;\"></span> အရေးကြီး ကိစ္စရှိလို့ Live Video နဲ့ မသင်လိုက်နိုင်ဘူး ဆိုတာများရှိလာခဲ့ရင်လည်း စိတ်ပူစရာမရှိပါဘူး။</div><div dir=\"auto\" style=\"font-family: inherit;\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\" style=\"margin: 0px 1px; height: 16px; width: 16px; display: inline-flex; vertical-align: middle; font-family: inherit;\"><img height=\"16\" width=\"16\" alt=\"🤗\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t56/2/16/1f917.png\" style=\"border: 0px;\"></span>  ဘာကြောင့်လဲဆိုရင် Recorded Video ကိုပြန်ပြီးတင်ထားပေးဦးမှာဖြစ်လို့ပါ။</div></div><div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\" style=\"overflow-wrap: break-word; margin: 0.5em 0px 0px; white-space: pre-wrap; font-family: system-ui, -apple-system, system-ui, &quot;.SFNSText-Regular&quot;, sans-serif; color: rgb(5, 5, 5); font-size: 15px;\"><div dir=\"auto\" style=\"font-family: inherit;\">ဒါတင်ပဲလား</div><div dir=\"auto\" style=\"font-family: inherit;\">နိုး ….. နိုး ….. နိုး… ။</div></div><div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\" style=\"overflow-wrap: break-word; margin: 0.5em 0px 0px; white-space: pre-wrap; font-family: system-ui, -apple-system, system-ui, &quot;.SFNSText-Regular&quot;, sans-serif; color: rgb(5, 5, 5); font-size: 15px;\"><div dir=\"auto\" style=\"font-family: inherit;\">မရှင်းမလင်းတာလေးများရှိခဲ့ရင်လည်း အားမနာတမ်းမေးလို့ရမယ့် Mentor လေးက အဆင်သင့်ရှိနေတာဆိုတော့ </div><div dir=\"auto\" style=\"font-family: inherit;\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\" style=\"margin: 0px 1px; height: 16px; width: 16px; display: inline-flex; vertical-align: middle; font-family: inherit;\"><img height=\"16\" width=\"16\" alt=\"😎\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t22/2/16/1f60e.png\" style=\"border: 0px;\"></span> ကဲ ……… ဘာအဆင်မပြေတာရှိလိမ့်မလဲ?????</div></div><div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\" style=\"overflow-wrap: break-word; margin: 0.5em 0px 0px; white-space: pre-wrap; font-family: system-ui, -apple-system, system-ui, &quot;.SFNSText-Regular&quot;, sans-serif; color: rgb(5, 5, 5); font-size: 15px;\"><div dir=\"auto\" style=\"font-family: inherit;\">တက်နေဆဲမှာလည်း ဂရုစိုက်သလို</div><div dir=\"auto\" style=\"font-family: inherit;\">သင်တန်းပြီးသွားရင်လည်း အလုပ်ရအောင်ရှာပေးဦးမှာဆိုတော့</div><div dir=\"auto\" style=\"font-family: inherit;\">ဒီလို Online Class မျိုးမှမတက်ရင် နောင်တရသွားလိမ့်မယ်နော်။</div></div>', '/storage/images/journals/1600769716.JPG', 'Activity', 1, NULL, '2020-09-22 10:15:16', '2020-09-22 10:15:16'),
(5, 'PHP Bootcamp Batch-18  ( Online Class )', '<div dir=\"auto\" style=\"font-family: inherit; color: rgb(5, 5, 5); font-size: 15px; white-space: pre-wrap;\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\" style=\"font-family: inherit; margin: 0px 1px; height: 16px; width: 16px; display: inline-flex; vertical-align: middle;\"><img height=\"16\" width=\"16\" alt=\"🎀\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/ta2/2/16/1f380.png\" class=\"img-responsive\" style=\"border: 0px; max-width: 100%;\"></span> Myanmar IT ရဲ့ <span style=\"font-family: inherit;\">PHP Development Bootcamp Batch-18 (Online Class) လေးဟာဆိုရင်တော့ မနေ့ကစပြီး ဖွင့်လှစ်ခဲ့ပြီဖြစ်ပါတယ်။</span></div>', '/storage/images/journals/1600769934.jpg', 'Activity', 1, NULL, '2020-09-22 10:18:54', '2020-09-22 17:31:57'),
(6, 'What is news in Laravel 8', '<h2 style=\"font-family: arial, sans-serif; line-height: 1.1; color: rgb(29, 33, 41); margin-top: 20px; margin-bottom: 10px; font-size: 26px; padding-bottom: 0px;\">New in Laravel 8</h2><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(101, 101, 101); font-family: arial, sans-serif;\">Laravel 8 has some new features like Job Batching, New model directory, Schema Dump, Laravel Jetstream and enhancement of the previous features like route caching, maintenance mode, rate limiting and more bug fixes. Let\'s have a look at what are new things and improvement in Laravel 8.</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(101, 101, 101); font-family: arial, sans-serif;\">&nbsp;</p><h3 style=\"font-family: arial, sans-serif; line-height: 1.1; color: rgb(29, 33, 41); margin-top: 20px; margin-bottom: 10px; font-size: 22px;\">Job Batching</h3><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(101, 101, 101); font-family: arial, sans-serif;\">Job batching is now easier with new&nbsp;<code style=\"font-family: Menlo, Monaco, Consolas, &quot;Courier New&quot;, monospace; font-size: 14.4px; padding: 2px 4px; color: rgb(199, 37, 78); background-color: rgb(249, 242, 244); border-radius: 4px;\">Bus::batch()</code>&nbsp;. It is one of the most exciting features of Laravel 8. Just pass your all jobs into a&nbsp;<code style=\"font-family: Menlo, Monaco, Consolas, &quot;Courier New&quot;, monospace; font-size: 14.4px; padding: 2px 4px; color: rgb(199, 37, 78); background-color: rgb(249, 242, 244); border-radius: 4px;\">Bus::batch()</code>&nbsp;and wait for the response. Here is an example.</p><pre class=\"language-php\" style=\"font-family: Menlo, Monaco, Consolas, &quot;Courier New&quot;, monospace; font-size: 13px; padding: 9.5px; margin-bottom: 10px; line-height: 1.42857; color: rgb(51, 51, 51); word-break: break-all; overflow-wrap: break-word; background-color: rgb(245, 245, 245); border: 1px solid rgb(204, 204, 204); border-radius: 4px; position: relative;\"><code style=\"font-family: Menlo, Monaco, Consolas, &quot;Courier New&quot;, monospace; padding: 0px; background-color: transparent; border-radius: 0px;\">Bus::batch([\r\n    new Job1(),\r\n    new Job2()\r\n])-&gt;then(function (Batch $batch) {\r\n    if ($batch-&gt;hasFailures()) {\r\n        // die\r\n    }\r\n})-&gt;success(function (Batch $batch){\r\n	//invoked when all job completed\r\n\r\n})-&gt;catch(function (Batch $batch,$e){\r\n	//invoked when first job failure\r\n\r\n})-&gt;allowFailures()-&gt;dispatch();</code><button class=\"btn_copy\" title=\"Copy\" style=\"color: rgb(255, 255, 255); font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; border-width: initial; border-style: none; border-color: initial; background-color: rgb(102, 102, 102); border-radius: 2px; position: absolute; top: 2px; right: 2px;\">Copy</button></pre><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(101, 101, 101); font-family: arial, sans-serif;\">The response will tell you the statistics of your dispatched job. Here is an example of a response.</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(101, 101, 101); font-family: arial, sans-serif;\"><img src=\"https://laravelarticle.com/filemanager/uploads/batch-job-response.png\" alt=\"batch-job-response.png\" width=\"478\" height=\"214\" data-src=\"https://laravelarticle.com/filemanager/uploads/batch-job-response.png\" class=\"img img-responsive lazy\" style=\"border: 0px; display: block; max-width: 100%; height: auto;\"></p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(101, 101, 101); font-family: arial, sans-serif;\">To find the batch job details you can use&nbsp;<code style=\"font-family: Menlo, Monaco, Consolas, &quot;Courier New&quot;, monospace; font-size: 14.4px; padding: 2px 4px; color: rgb(199, 37, 78); background-color: rgb(249, 242, 244); border-radius: 4px;\">Bus::findBatch($batchId)</code></p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(101, 101, 101); font-family: arial, sans-serif;\">&nbsp;</p><h3 style=\"font-family: arial, sans-serif; line-height: 1.1; color: rgb(29, 33, 41); margin-top: 20px; margin-bottom: 10px; font-size: 22px;\">New Model Directory</h3><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(101, 101, 101); font-family: arial, sans-serif;\">From Laravel 8, the default model directory in&nbsp;<code style=\"font-family: Menlo, Monaco, Consolas, &quot;Courier New&quot;, monospace; font-size: 14.4px; padding: 2px 4px; color: rgb(199, 37, 78); background-color: rgb(249, 242, 244); border-radius: 4px;\">app/Models</code>. Before Laravel 8, all the models were in-app directory which was really messy when lots of the model consists in our application. Now Laravel 8 default model directory make it more organized.</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(101, 101, 101); font-family: arial, sans-serif;\">&nbsp;</p><h3 style=\"font-family: arial, sans-serif; line-height: 1.1; color: rgb(29, 33, 41); margin-top: 20px; margin-bottom: 10px; font-size: 22px;\">Laravel Jetstream</h3><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(101, 101, 101); font-family: arial, sans-serif;\">Laravel Jetstream is a new&nbsp;<a href=\"https://laravelarticle.com/laravel-ecosystem\" style=\"color: rgb(34, 34, 34); border-bottom: 1px solid;\">Laravel ecosystem</a>. It gives you beautiful scaffolding for laravel application. It is completely free and open-source. It has in-build features like user profile management, Two-factor Authentication, API tokens, Team management, Multi-Session Management and a lot of cool stuff. Jetstream design with Tailwind CSS and you can choose scaffolding with Livewire or Inertia.</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(101, 101, 101); font-family: arial, sans-serif;\">&nbsp;</p><h3 style=\"font-family: arial, sans-serif; line-height: 1.1; color: rgb(29, 33, 41); margin-top: 20px; margin-bottom: 10px; font-size: 22px;\">Laravel Factory</h3><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(101, 101, 101); font-family: arial, sans-serif;\">Laravel 8 provides an easier way to seed model data with the new factory improvement. Let\'s have a look at how cool the factory is now.</p><pre class=\"language-php\" style=\"font-family: Menlo, Monaco, Consolas, &quot;Courier New&quot;, monospace; font-size: 13px; padding: 9.5px; margin-bottom: 10px; line-height: 1.42857; color: rgb(51, 51, 51); word-break: break-all; overflow-wrap: break-word; background-color: rgb(245, 245, 245); border: 1px solid rgb(204, 204, 204); border-radius: 4px; position: relative;\"><code style=\"font-family: Menlo, Monaco, Consolas, &quot;Courier New&quot;, monospace; padding: 0px; background-color: transparent; border-radius: 0px;\">Route::get(\'test-factory\',function(){\r\n   return User::factory()-&gt;create();\r\n});</code><button class=\"btn_copy\" title=\"Copy\" style=\"color: rgb(255, 255, 255); font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; border-width: initial; border-style: none; border-color: initial; background-color: rgb(102, 102, 102); border-radius: 2px; position: absolute; top: 2px; right: 2px;\">Copy</button></pre><pre class=\"language-php\" style=\"font-family: Menlo, Monaco, Consolas, &quot;Courier New&quot;, monospace; font-size: 13px; padding: 9.5px; margin-bottom: 10px; line-height: 1.42857; color: rgb(51, 51, 51); word-break: break-all; overflow-wrap: break-word; background-color: rgb(245, 245, 245); border: 1px solid rgb(204, 204, 204); border-radius: 4px; position: relative;\"><code style=\"font-family: Menlo, Monaco, Consolas, &quot;Courier New&quot;, monospace; padding: 0px; background-color: transparent; border-radius: 0px;\">Route::get(\'test-factory\',function(){\r\n   return User::factory()-&gt;times(10)-&gt;create();\r\n});</code><button class=\"btn_copy\" title=\"Copy\" style=\"color: rgb(255, 255, 255); font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; border-width: initial; border-style: none; border-color: initial; background-color: rgb(102, 102, 102); border-radius: 2px; position: absolute; top: 2px; right: 2px;\">Copy</button></pre><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(101, 101, 101); font-family: arial, sans-serif;\">&nbsp;</p><h3 style=\"font-family: arial, sans-serif; line-height: 1.1; color: rgb(29, 33, 41); margin-top: 20px; margin-bottom: 10px; font-size: 22px;\">Schema Dump</h3><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(101, 101, 101); font-family: arial, sans-serif;\">New artisan command added for schema dump&nbsp;<code style=\"font-family: Menlo, Monaco, Consolas, &quot;Courier New&quot;, monospace; font-size: 14.4px; padding: 2px 4px; color: rgb(199, 37, 78); background-color: rgb(249, 242, 244); border-radius: 4px;\">php artisan schema:dump</code>. It will help the developers from having a huge migrations directory full of files they no longer need and it\'s quicker (loading a single schema file) then running hundreds of migrations file. You need a file of your schema in&nbsp;<code style=\"font-family: Menlo, Monaco, Consolas, &quot;Courier New&quot;, monospace; font-size: 14.4px; padding: 2px 4px; color: rgb(199, 37, 78); background-color: rgb(249, 242, 244); border-radius: 4px;\">database/schema/{connection}-schema.mysql</code></p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(101, 101, 101); font-family: arial, sans-serif;\">&nbsp;</p><h3 style=\"font-family: arial, sans-serif; line-height: 1.1; color: rgb(29, 33, 41); margin-top: 20px; margin-bottom: 10px; font-size: 22px;\">Rate Limiting - Improved</h3><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(101, 101, 101); font-family: arial, sans-serif;\">In laravel 8, now you can rate limit in a new way, easily and more conveniently. Here is an example</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(101, 101, 101); font-family: arial, sans-serif;\"><span style=\"font-weight: 700;\">Define Rate Limit</span></p><pre class=\"language-php\" style=\"font-family: Menlo, Monaco, Consolas, &quot;Courier New&quot;, monospace; font-size: 13px; padding: 9.5px; margin-bottom: 10px; line-height: 1.42857; color: rgb(51, 51, 51); word-break: break-all; overflow-wrap: break-word; background-color: rgb(245, 245, 245); border: 1px solid rgb(204, 204, 204); border-radius: 4px; position: relative;\"><code style=\"font-family: Menlo, Monaco, Consolas, &quot;Courier New&quot;, monospace; padding: 0px; background-color: transparent; border-radius: 0px;\">RateLimiter::for(\'upload\', function (Request $request) {\r\n	Limit::perMinute(10)-&gt;by($request-&gt;ip()),\r\n});\r\n\r\nRateLimiter::for(\'download\', function (Request $request) {\r\n	if ($request-&gt;user()-&gt;isSubscribed()) {\r\n    	return Limit::none();\r\n	}\r\n	Limit::perMinute(10)-&gt;by($request-&gt;ip()),\r\n});</code><button class=\"btn_copy\" title=\"Copy\" style=\"color: rgb(255, 255, 255); font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; border-width: initial; border-style: none; border-color: initial; background-color: rgb(102, 102, 102); border-radius: 2px; position: absolute; top: 2px; right: 2px;\">Copy</button></pre><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(101, 101, 101); font-family: arial, sans-serif;\"><span style=\"font-weight: 700;\">Use rate limiter as regular middleware</span></p><pre class=\"language-php\" style=\"font-family: Menlo, Monaco, Consolas, &quot;Courier New&quot;, monospace; font-size: 13px; padding: 9.5px; margin-bottom: 10px; line-height: 1.42857; color: rgb(51, 51, 51); word-break: break-all; overflow-wrap: break-word; background-color: rgb(245, 245, 245); border: 1px solid rgb(204, 204, 204); border-radius: 4px; position: relative;\"><code style=\"font-family: Menlo, Monaco, Consolas, &quot;Courier New&quot;, monospace; padding: 0px; background-color: transparent; border-radius: 0px;\">Route::get(\'/upload\',\'UploadController@index\')-&gt;-&gt;middleware(\'throttle:upload\');\r\nRoute::get(\'/download\',\'DownloadController@index\')-&gt;-&gt;middleware(\'throttle:download\');\r\n\r\n// or use it no group\r\nRoute::middleware([\'throttle:upload\'])-&gt;group(function () {\r\n	\r\n});</code><button class=\"btn_copy\" title=\"Copy\" style=\"color: rgb(255, 255, 255); font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; border-width: initial; border-style: none; border-color: initial; background-color: rgb(102, 102, 102); border-radius: 2px; position: absolute; top: 2px; right: 2px;\">Copy</button></pre><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(101, 101, 101); font-family: arial, sans-serif;\">&nbsp;</p><h3 style=\"font-family: arial, sans-serif; line-height: 1.1; color: rgb(29, 33, 41); margin-top: 20px; margin-bottom: 10px; font-size: 22px;\">Maintenance Mode - Improved</h3><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(101, 101, 101); font-family: arial, sans-serif;\">Until Laravel 8, we used&nbsp;<code style=\"font-family: Menlo, Monaco, Consolas, &quot;Courier New&quot;, monospace; font-size: 14.4px; padding: 2px 4px; color: rgb(199, 37, 78); background-color: rgb(249, 242, 244); border-radius: 4px;\">php artisan down</code>&nbsp;for temporary down our website for maintenance but the previous implementation was the entire framework has to be booted in order to render the maintenance page. In Laravel 8, it has been done more efficiently.</p><pre class=\"language-markup\" style=\"font-family: Menlo, Monaco, Consolas, &quot;Courier New&quot;, monospace; font-size: 13px; padding: 9.5px; margin-bottom: 10px; line-height: 1.42857; color: rgb(51, 51, 51); word-break: break-all; overflow-wrap: break-word; background-color: rgb(245, 245, 245); border: 1px solid rgb(204, 204, 204); border-radius: 4px; position: relative;\"><code style=\"font-family: Menlo, Monaco, Consolas, &quot;Courier New&quot;, monospace; padding: 0px; background-color: transparent; border-radius: 0px;\">php artisan down --secret=myByPassSecret</code><button class=\"btn_copy\" title=\"Copy\" style=\"color: rgb(255, 255, 255); font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; border-width: initial; border-style: none; border-color: initial; background-color: rgb(102, 102, 102); border-radius: 2px; position: absolute; top: 2px; right: 2px;\">Copy</button></pre><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(101, 101, 101); font-family: arial, sans-serif;\">Once you down the website with secret bypass. Now you can use it to check your website something like this. The maintenance middleware will intercept this request and issue a maintenance mode bypass cookie to the user and redirect to&nbsp;<code style=\"font-family: Menlo, Monaco, Consolas, &quot;Courier New&quot;, monospace; font-size: 14.4px; padding: 2px 4px; color: rgb(199, 37, 78); background-color: rgb(249, 242, 244); border-radius: 4px;\">/</code>.</p><pre class=\"language-markup\" style=\"font-family: Menlo, Monaco, Consolas, &quot;Courier New&quot;, monospace; font-size: 13px; padding: 9.5px; margin-bottom: 10px; line-height: 1.42857; color: rgb(51, 51, 51); word-break: break-all; overflow-wrap: break-word; background-color: rgb(245, 245, 245); border: 1px solid rgb(204, 204, 204); border-radius: 4px; position: relative;\"><code style=\"font-family: Menlo, Monaco, Consolas, &quot;Courier New&quot;, monospace; padding: 0px; background-color: transparent; border-radius: 0px;\">http://example.com/myByPassSecret</code><button class=\"btn_copy\" title=\"Copy\" style=\"color: rgb(255, 255, 255); font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; border-width: initial; border-style: none; border-color: initial; background-color: rgb(102, 102, 102); border-radius: 2px; position: absolute; top: 2px; right: 2px;\">Copy</button></pre><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(101, 101, 101); font-family: arial, sans-serif;\">&nbsp;</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(101, 101, 101); font-family: arial, sans-serif;\">You can set more into maintenance mode options.</p><pre class=\"language-markup\" style=\"font-family: Menlo, Monaco, Consolas, &quot;Courier New&quot;, monospace; font-size: 13px; padding: 9.5px; margin-bottom: 10px; line-height: 1.42857; color: rgb(51, 51, 51); word-break: break-all; overflow-wrap: break-word; background-color: rgb(245, 245, 245); border: 1px solid rgb(204, 204, 204); border-radius: 4px; position: relative;\"><code style=\"font-family: Menlo, Monaco, Consolas, &quot;Courier New&quot;, monospace; padding: 0px; background-color: transparent; border-radius: 0px;\">php artisan down --redirect=/ --status=200 --secret=myByPassSecret --render=\"errors::503\"</code><button class=\"btn_copy\" title=\"Copy\" style=\"color: rgb(255, 255, 255); font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; border-width: initial; border-style: none; border-color: initial; background-color: rgb(102, 102, 102); border-radius: 2px; position: absolute; top: 2px; right: 2px;\">Copy</button></pre><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(101, 101, 101); font-family: arial, sans-serif;\"><span style=\"font-weight: 700;\">Explanation</span><br>Put the application offline<br>Redirect all routes to \"/\"<br>Set status code<br>Set a secret to bypass maintenance mode<br>Render a view file for the downtime</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(101, 101, 101); font-family: arial, sans-serif;\">&nbsp;</p><h3 style=\"font-family: arial, sans-serif; line-height: 1.1; color: rgb(29, 33, 41); margin-top: 20px; margin-bottom: 10px; font-size: 22px;\">Time Traveller</h3><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(101, 101, 101); font-family: arial, sans-serif;\">With laravel time traveller helper now you can more easily manipulate time. Laravel base features test class included these helpers. Here is some example.</p><pre class=\"language-php\" style=\"font-family: Menlo, Monaco, Consolas, &quot;Courier New&quot;, monospace; font-size: 13px; padding: 9.5px; margin-bottom: 10px; line-height: 1.42857; color: rgb(51, 51, 51); word-break: break-all; overflow-wrap: break-word; background-color: rgb(245, 245, 245); border: 1px solid rgb(204, 204, 204); border-radius: 4px; position: relative;\"><code style=\"font-family: Menlo, Monaco, Consolas, &quot;Courier New&quot;, monospace; padding: 0px; background-color: transparent; border-radius: 0px;\">//goto to future\r\n$this-&gt;travel(10)-&gt;seconds();\r\n$this-&gt;travel(10)-&gt;minutes();\r\n\r\n//back to past\r\n$this-&gt;travel(-8)-&gt;seconds();\r\n$this-&gt;travel(-8)-&gt;minutes();</code><button class=\"btn_copy\" title=\"Copy\" style=\"color: rgb(255, 255, 255); font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; border-width: initial; border-style: none; border-color: initial; background-color: rgb(102, 102, 102); border-radius: 2px; position: absolute; top: 2px; right: 2px;\">Copy</button></pre><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(101, 101, 101); font-family: arial, sans-serif;\">&nbsp;</p><h3 style=\"font-family: arial, sans-serif; line-height: 1.1; color: rgb(29, 33, 41); margin-top: 20px; margin-bottom: 10px; font-size: 22px;\">Dynamic Blade Component</h3><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(101, 101, 101); font-family: arial, sans-serif;\">From laravel 8 you can render dynamic blade component. So that you can choose at application run-time which component will be rendered.</p><pre class=\"language-markup\" style=\"font-family: Menlo, Monaco, Consolas, &quot;Courier New&quot;, monospace; font-size: 13px; padding: 9.5px; margin-bottom: 10px; line-height: 1.42857; color: rgb(51, 51, 51); word-break: break-all; overflow-wrap: break-word; background-color: rgb(245, 245, 245); border: 1px solid rgb(204, 204, 204); border-radius: 4px; position: relative;\"><code style=\"font-family: Menlo, Monaco, Consolas, &quot;Courier New&quot;, monospace; padding: 0px; background-color: transparent; border-radius: 0px;\">&lt;x-dynamic-component :component=\"$componentName\" /&gt;</code><button class=\"btn_copy\" title=\"Copy\" style=\"color: rgb(255, 255, 255); font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; border-width: initial; border-style: none; border-color: initial; background-color: rgb(102, 102, 102); border-radius: 2px; position: absolute; top: 2px; right: 2px;\">Copy</button></pre><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(101, 101, 101); font-family: arial, sans-serif;\">&nbsp;</p><h3 style=\"font-family: arial, sans-serif; line-height: 1.1; color: rgb(29, 33, 41); margin-top: 20px; margin-bottom: 10px; font-size: 22px;\">Default pagination</h3><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(101, 101, 101); font-family: arial, sans-serif;\">Laravel 8 pagination will use Tailwind CSS by default.</p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(101, 101, 101); font-family: arial, sans-serif;\">&nbsp;</p><h3 style=\"font-family: arial, sans-serif; line-height: 1.1; color: rgb(29, 33, 41); margin-top: 20px; margin-bottom: 10px; font-size: 22px;\">Route Caching - Improved</h3><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(101, 101, 101); font-family: arial, sans-serif;\">From Laravel 8, you can cache your routes even you use closure in route definition.</p><pre class=\"language-php\" style=\"font-family: Menlo, Monaco, Consolas, &quot;Courier New&quot;, monospace; font-size: 13px; padding: 9.5px; margin-bottom: 10px; line-height: 1.42857; color: rgb(51, 51, 51); word-break: break-all; overflow-wrap: break-word; background-color: rgb(245, 245, 245); border: 1px solid rgb(204, 204, 204); border-radius: 4px; position: relative;\"><code style=\"font-family: Menlo, Monaco, Consolas, &quot;Courier New&quot;, monospace; padding: 0px; background-color: transparent; border-radius: 0px;\">Route::get(\'/about\',function(){\r\n  return view(\'about\');\r\n});</code><button class=\"btn_copy\" title=\"Copy\" style=\"color: rgb(255, 255, 255); font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; border-width: initial; border-style: none; border-color: initial; background-color: rgb(102, 102, 102); border-radius: 2px; position: absolute; top: 2px; right: 2px;\">Copy</button></pre><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(101, 101, 101); font-family: arial, sans-serif;\">&nbsp;</p><h3 style=\"font-family: arial, sans-serif; line-height: 1.1; color: rgb(29, 33, 41); margin-top: 20px; margin-bottom: 10px; font-size: 22px;\">php artisan serve - improved</h3><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; color: rgb(101, 101, 101); font-family: arial, sans-serif;\">Until Laravel 8 we had to restart our laravel application by the&nbsp;<code style=\"font-family: Menlo, Monaco, Consolas, &quot;Courier New&quot;, monospace; font-size: 14.4px; padding: 2px 4px; color: rgb(199, 37, 78); background-color: rgb(249, 242, 244); border-radius: 4px;\">php artisan serve</code>&nbsp;command in every time when we made a change in the&nbsp;<code style=\"font-family: Menlo, Monaco, Consolas, &quot;Courier New&quot;, monospace; font-size: 14.4px; padding: 2px 4px; color: rgb(199, 37, 78); background-color: rgb(249, 242, 244); border-radius: 4px;\">.env</code>&nbsp;file. In laravel 8 you don\'t have to re-run the php artisan serve command even we change our&nbsp;<code style=\"font-family: Menlo, Monaco, Consolas, &quot;Courier New&quot;, monospace; font-size: 14.4px; padding: 2px 4px; color: rgb(199, 37, 78); background-color: rgb(249, 242, 244); border-radius: 4px;\">.env</code>&nbsp;file.</p>', '/storage/images/journals/1600770247.png', 'Sharing', 1, NULL, '2020-09-22 10:24:07', '2020-09-22 10:24:07');
INSERT INTO `journals` (`id`, `title`, `content`, `file`, `type`, `user_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(7, 'How to build a Laravel REST API with Test-Driven Development', '<h2 id=\"5b84\" class=\"lu lv hh at fz lw lx ke ly lz ki ma mb km mc md kq me mf ku mg cd\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 1.72em 0px -0.31em; font-family: medium-content-sans-serif-font, &quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, &quot;Lucida Sans&quot;, Geneva, Arial, sans-serif; color: rgb(41, 41, 41); font-weight: 600; line-height: 32px; letter-spacing: -0.022em; font-size: 26px;\">Setting up the project</h2><p id=\"7e77\" class=\"jz ka hh kb b kc mh ke kf kg mi ki kj kk mj km kn ko mk kq kr ks ml ku kv kw gz cd\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 0.86em 0px -0.46em; color: rgb(41, 41, 41); word-break: break-word; line-height: 32px; letter-spacing: -0.003em; font-family: medium-content-serif-font, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-size: 21px;\">Start by creating a new Laravel project with&nbsp;<code class=\"gh mm mn mo mp b\" style=\"box-sizing: inherit; background-color: rgb(242, 242, 242); padding: 2px 4px; font-size: 15.75px; font-family: Menlo, Monaco, &quot;Courier New&quot;, Courier, monospace;\">composer create-project --prefer-dist laravel/laravel tdd-journey</code>.</p><p id=\"dcd9\" class=\"jz ka hh kb b kc kd ke kf kg kh ki kj kk kl km kn ko kp kq kr ks kt ku kv kw gz cd\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 2em 0px -0.46em; color: rgb(41, 41, 41); word-break: break-word; line-height: 32px; letter-spacing: -0.003em; font-family: medium-content-serif-font, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-size: 21px;\">Next, we need to run the authentication scaffolder that we would use, go ahead and run&nbsp;<code class=\"gh mm mn mo mp b\" style=\"box-sizing: inherit; background-color: rgb(242, 242, 242); padding: 2px 4px; font-size: 15.75px; font-family: Menlo, Monaco, &quot;Courier New&quot;, Courier, monospace;\">php artisan make:auth</code>&nbsp;then&nbsp;<code class=\"gh mm mn mo mp b\" style=\"box-sizing: inherit; background-color: rgb(242, 242, 242); padding: 2px 4px; font-size: 15.75px; font-family: Menlo, Monaco, &quot;Courier New&quot;, Courier, monospace;\">php artisan migrate</code>.</p><p id=\"02ec\" class=\"jz ka hh kb b kc kd ke kf kg kh ki kj kk kl km kn ko kp kq kr ks kt ku kv kw gz cd\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 2em 0px -0.46em; color: rgb(41, 41, 41); word-break: break-word; line-height: 32px; letter-spacing: -0.003em; font-family: medium-content-serif-font, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-size: 21px;\">We will not actually be using the routes and views generated. For this project, we would be using&nbsp;<a href=\"https://github.com/tymondesigns/jwt-auth\" class=\"ci dj kx ky kz la\" rel=\"noopener nofollow\" style=\"box-sizing: inherit; color: inherit; -webkit-tap-highlight-color: transparent; background-repeat: repeat-x; background-image: url(&quot;data:image/svg+xml;utf8,<svg preserveAspectRatio=\\&quot;none\\&quot; viewBox=\\&quot;0 0 1 1\\&quot; xmlns=\\&quot;http://www.w3.org/2000/svg\\&quot;><line x1=\\&quot;0\\&quot; y1=\\&quot;0\\&quot; x2=\\&quot;1\\&quot; y2=\\&quot;1\\&quot; stroke=\\&quot;rgba(41, 41, 41, 1)\\&quot; /></svg>&quot;); background-size: 1px 1px; background-position: 0px calc(1em + 1px);\">jwt-auth</a>. So go ahead and&nbsp;<a href=\"https://github.com/tymondesigns/jwt-auth/wiki/Installation\" class=\"ci dj kx ky kz la\" rel=\"noopener nofollow\" style=\"box-sizing: inherit; color: inherit; -webkit-tap-highlight-color: transparent; background-repeat: repeat-x; background-image: url(&quot;data:image/svg+xml;utf8,<svg preserveAspectRatio=\\&quot;none\\&quot; viewBox=\\&quot;0 0 1 1\\&quot; xmlns=\\&quot;http://www.w3.org/2000/svg\\&quot;><line x1=\\&quot;0\\&quot; y1=\\&quot;0\\&quot; x2=\\&quot;1\\&quot; y2=\\&quot;1\\&quot; stroke=\\&quot;rgba(41, 41, 41, 1)\\&quot; /></svg>&quot;); background-size: 1px 1px; background-position: 0px calc(1em + 1px);\">set it up</a>&nbsp;in your application.</p><blockquote class=\"lp lq lr\" style=\"box-sizing: inherit; margin-bottom: 0px; margin-left: -20px; box-shadow: rgb(41, 41, 41) 3px 0px 0px 0px inset; padding-left: 23px; color: rgba(0, 0, 0, 0.8); font-family: medium-content-sans-serif-font, -apple-system, system-ui, &quot;Segoe UI&quot;, Roboto, Oxygen, Ubuntu, Cantarell, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, sans-serif; font-size: medium;\"><p id=\"e583\" class=\"jz ka ls kb b kc kd ke kf kg kh ki kj kk kl km kn ko kp kq kr ks kt ku kv kw gz cd\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 2em 0px -0.46em; color: rgb(41, 41, 41); word-break: break-word; line-height: 32px; letter-spacing: -0.003em; font-family: medium-content-serif-font, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-style: italic; font-size: 21px;\"><span class=\"kb lt\" style=\"box-sizing: inherit; font-family: medium-content-serif-font, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-weight: 700;\">Note:</span>&nbsp;If you’re having errors with JWT’s&nbsp;<code class=\"gh mm mn mo mp b\" style=\"box-sizing: inherit; background-color: rgb(242, 242, 242); padding: 2px 4px; font-size: 15.75px; font-family: Menlo, Monaco, &quot;Courier New&quot;, Courier, monospace;\">generate</code>&nbsp;command, you can follow&nbsp;<a href=\"https://github.com/tymondesigns/jwt-auth/issues/1298#issuecomment-330458018\" class=\"ci dj kx ky kz la\" rel=\"noopener nofollow\" style=\"box-sizing: inherit; color: inherit; -webkit-tap-highlight-color: transparent; background-repeat: repeat-x; background-image: url(&quot;data:image/svg+xml;utf8,<svg preserveAspectRatio=\\&quot;none\\&quot; viewBox=\\&quot;0 0 1 1\\&quot; xmlns=\\&quot;http://www.w3.org/2000/svg\\&quot;><line x1=\\&quot;0\\&quot; y1=\\&quot;0\\&quot; x2=\\&quot;1\\&quot; y2=\\&quot;1\\&quot; stroke=\\&quot;rgba(41, 41, 41, 1)\\&quot; /></svg>&quot;); background-size: 1px 1px; background-position: 0px calc(1em + 1px);\">this</a>&nbsp;fix till it’s been added to the stable release.</p></blockquote><p id=\"3848\" class=\"jz ka hh kb b kc kd ke kf kg kh ki kj kk kl km kn ko kp kq kr ks kt ku kv kw gz cd\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 2em 0px -0.46em; color: rgb(41, 41, 41); word-break: break-word; line-height: 32px; letter-spacing: -0.003em; font-family: medium-content-serif-font, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-size: 21px;\">Finally, you can delete&nbsp;<code class=\"gh mm mn mo mp b\" style=\"box-sizing: inherit; background-color: rgb(242, 242, 242); padding: 2px 4px; font-size: 15.75px; font-family: Menlo, Monaco, &quot;Courier New&quot;, Courier, monospace;\">ExampleTest</code>&nbsp;in both the&nbsp;<code class=\"gh mm mn mo mp b\" style=\"box-sizing: inherit; background-color: rgb(242, 242, 242); padding: 2px 4px; font-size: 15.75px; font-family: Menlo, Monaco, &quot;Courier New&quot;, Courier, monospace;\">tests/Unit</code>&nbsp;and&nbsp;<code class=\"gh mm mn mo mp b\" style=\"box-sizing: inherit; background-color: rgb(242, 242, 242); padding: 2px 4px; font-size: 15.75px; font-family: Menlo, Monaco, &quot;Courier New&quot;, Courier, monospace;\">tests/Feature</code>&nbsp;folders so that it doesn’t interfere with our test results and we’re good to go.</p><h2 id=\"e915\" class=\"lu lv hh at fz lw lx ke ly lz ki ma mb km mc md kq me mf ku mg cd\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 1.72em 0px -0.31em; font-family: medium-content-sans-serif-font, &quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, &quot;Lucida Sans&quot;, Geneva, Arial, sans-serif; color: rgb(41, 41, 41); font-weight: 600; line-height: 32px; letter-spacing: -0.022em; font-size: 26px;\"><span class=\"be\" style=\"box-sizing: inherit; font-weight: inherit;\">Writing the code</span></h2><ol class=\"\" style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; list-style: none none; color: rgba(0, 0, 0, 0.8); font-family: medium-content-sans-serif-font, -apple-system, system-ui, &quot;Segoe UI&quot;, Roboto, Oxygen, Ubuntu, Cantarell, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, sans-serif; font-size: medium;\"><li id=\"e936\" class=\"jz ka hh kb b kc mh ke kf kg mi ki kj kk mj km kn ko mk kq kr ks ml ku kv kw mq mr ms cd\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; color: rgb(41, 41, 41); line-height: 32px; letter-spacing: -0.003em; font-family: medium-content-serif-font, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; margin-bottom: -0.46em; list-style-type: decimal; margin-left: 30px; padding-left: 0px; font-size: 21px; margin-top: 0.86em;\">Begin by setting your&nbsp;<code class=\"gh mm mn mo mp b\" style=\"box-sizing: inherit; background-color: rgb(242, 242, 242); padding: 2px 4px; font-size: 15.75px; font-family: Menlo, Monaco, &quot;Courier New&quot;, Courier, monospace;\">auth</code>&nbsp;configuration to use the JWT driver as default:</li></ol><figure class=\"jh ji jj jk jl jg\" style=\"box-sizing: inherit; margin-top: 56px; margin-bottom: 0px; clear: both; color: rgba(0, 0, 0, 0.8); font-family: medium-content-sans-serif-font, -apple-system, system-ui, &quot;Segoe UI&quot;, Roboto, Oxygen, Ubuntu, Cantarell, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, sans-serif; font-size: medium;\"><div class=\"jp s cf\" style=\"box-sizing: inherit; position: relative; margin: auto;\"><div class=\"xc jr s\" style=\"box-sizing: inherit; height: 0px; padding-bottom: 351px;\"><iframe src=\"https://medium.com/media/80623c442eea497bb5de9e1de91e7158\" allowfullscreen=\"\" frameborder=\"0\" height=\"351\" width=\"680\" title=\"Tddjouney - Config file\" class=\"t u v ez aj\" scrolling=\"auto\" style=\"box-sizing: inherit; position: absolute; top: 0px; left: 0px; width: 680px; height: 351px;\"></iframe></div></div></figure><p id=\"fde9\" class=\"jz ka hh kb b kc kd ke kf kg kh ki kj kk kl km kn ko kp kq kr ks kt ku kv kw gz cd\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 2em 0px -0.46em; color: rgb(41, 41, 41); word-break: break-word; line-height: 32px; letter-spacing: -0.003em; font-family: medium-content-serif-font, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-size: 21px;\">Then add the following to your&nbsp;<code class=\"gh mm mn mo mp b\" style=\"box-sizing: inherit; background-color: rgb(242, 242, 242); padding: 2px 4px; font-size: 15.75px; font-family: Menlo, Monaco, &quot;Courier New&quot;, Courier, monospace;\">routes/api.php</code>&nbsp;file:</p><figure class=\"jh ji jj jk jl jg\" style=\"box-sizing: inherit; margin-top: 56px; margin-bottom: 0px; clear: both; color: rgba(0, 0, 0, 0.8); font-family: medium-content-sans-serif-font, -apple-system, system-ui, &quot;Segoe UI&quot;, Roboto, Oxygen, Ubuntu, Cantarell, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, sans-serif; font-size: medium;\"><div class=\"jp s cf\" style=\"box-sizing: inherit; position: relative; margin: auto;\"><div class=\"xd jr s\" style=\"box-sizing: inherit; height: 0px; padding-bottom: 175px;\"><iframe src=\"https://medium.com/media/a2deb500ca249ebe91f88aef7bd7654e\" allowfullscreen=\"\" frameborder=\"0\" height=\"175\" width=\"680\" title=\"Route file\" class=\"t u v ez aj\" scrolling=\"auto\" style=\"box-sizing: inherit; position: absolute; top: 0px; left: 0px; width: 680px; height: 175px;\"></iframe></div></div></figure><p id=\"2b1e\" class=\"jz ka hh kb b kc kd ke kf kg kh ki kj kk kl km kn ko kp kq kr ks kt ku kv kw gz cd\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 2em 0px -0.46em; color: rgb(41, 41, 41); word-break: break-word; line-height: 32px; letter-spacing: -0.003em; font-family: medium-content-serif-font, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-size: 21px;\">2. Now that we have our driver set up, set up your user model in the same way:</p><figure class=\"jh ji jj jk jl jg\" style=\"box-sizing: inherit; margin-top: 56px; margin-bottom: 0px; clear: both; color: rgba(0, 0, 0, 0.8); font-family: medium-content-sans-serif-font, -apple-system, system-ui, &quot;Segoe UI&quot;, Roboto, Oxygen, Ubuntu, Cantarell, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, sans-serif; font-size: medium;\"><div class=\"jp s cf\" style=\"box-sizing: inherit; position: relative; margin: auto;\"><div class=\"xe jr s\" style=\"box-sizing: inherit; height: 0px; padding-bottom: 395px;\"><iframe src=\"https://medium.com/media/f3ffd3f6ca06e6e2e7153ccb2cd0672c\" allowfullscreen=\"\" frameborder=\"0\" height=\"395\" width=\"680\" title=\"User1\" class=\"t u v ez aj\" scrolling=\"auto\" style=\"box-sizing: inherit; position: absolute; top: 0px; left: 0px; width: 680px; height: 395px;\"></iframe></div></div></figure><p id=\"bb53\" class=\"jz ka hh kb b kc kd ke kf kg kh ki kj kk kl km kn ko kp kq kr ks kt ku kv kw gz cd\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 2em 0px -0.46em; color: rgb(41, 41, 41); word-break: break-word; line-height: 32px; letter-spacing: -0.003em; font-family: medium-content-serif-font, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-size: 21px;\">What we did was that we just implemented the&nbsp;<code class=\"gh mm mn mo mp b\" style=\"box-sizing: inherit; background-color: rgb(242, 242, 242); padding: 2px 4px; font-size: 15.75px; font-family: Menlo, Monaco, &quot;Courier New&quot;, Courier, monospace;\">JWTSubject</code>&nbsp;and added the required methods.</p><p id=\"def3\" class=\"jz ka hh kb b kc kd ke kf kg kh ki kj kk kl km kn ko kp kq kr ks kt ku kv kw gz cd\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 2em 0px -0.46em; color: rgb(41, 41, 41); word-break: break-word; line-height: 32px; letter-spacing: -0.003em; font-family: medium-content-serif-font, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-size: 21px;\">3. Next, we need to add our authentication methods in the controller.</p><p id=\"598f\" class=\"jz ka hh kb b kc kd ke kf kg kh ki kj kk kl km kn ko kp kq kr ks kt ku kv kw gz cd\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 2em 0px -0.46em; color: rgb(41, 41, 41); word-break: break-word; line-height: 32px; letter-spacing: -0.003em; font-family: medium-content-serif-font, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-size: 21px;\">Run&nbsp;<code class=\"gh mm mn mo mp b\" style=\"box-sizing: inherit; background-color: rgb(242, 242, 242); padding: 2px 4px; font-size: 15.75px; font-family: Menlo, Monaco, &quot;Courier New&quot;, Courier, monospace;\">php artisan make:controller AuthController</code>&nbsp;and add the following methods:</p><figure class=\"jh ji jj jk jl jg\" style=\"box-sizing: inherit; margin-top: 56px; margin-bottom: 0px; clear: both; color: rgba(0, 0, 0, 0.8); font-family: medium-content-sans-serif-font, -apple-system, system-ui, &quot;Segoe UI&quot;, Roboto, Oxygen, Ubuntu, Cantarell, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, sans-serif; font-size: medium;\"><div class=\"jp s cf\" style=\"box-sizing: inherit; position: relative; margin: auto;\"><div class=\"xf jr s\" style=\"box-sizing: inherit; height: 0px; padding-bottom: 747px;\"><iframe src=\"https://medium.com/media/2e321bbf8a741482afda6c59cce920a5\" allowfullscreen=\"\" frameborder=\"0\" height=\"747\" width=\"680\" title=\"AuthController1\" class=\"t u v ez aj\" scrolling=\"auto\" style=\"box-sizing: inherit; position: absolute; top: 0px; left: 0px; width: 680px; height: 747px;\"></iframe></div></div></figure><p id=\"a409\" class=\"jz ka hh kb b kc kd ke kf kg kh ki kj kk kl km kn ko kp kq kr ks kt ku kv kw gz cd\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 2em 0px -0.46em; color: rgb(41, 41, 41); word-break: break-word; line-height: 32px; letter-spacing: -0.003em; font-family: medium-content-serif-font, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-size: 21px;\">This step is pretty straight forward, all we do is add the&nbsp;<code class=\"gh mm mn mo mp b\" style=\"box-sizing: inherit; background-color: rgb(242, 242, 242); padding: 2px 4px; font-size: 15.75px; font-family: Menlo, Monaco, &quot;Courier New&quot;, Courier, monospace;\">authenticate</code>&nbsp;and&nbsp;<code class=\"gh mm mn mo mp b\" style=\"box-sizing: inherit; background-color: rgb(242, 242, 242); padding: 2px 4px; font-size: 15.75px; font-family: Menlo, Monaco, &quot;Courier New&quot;, Courier, monospace;\">register</code>&nbsp;methods to our controller. In the&nbsp;<code class=\"gh mm mn mo mp b\" style=\"box-sizing: inherit; background-color: rgb(242, 242, 242); padding: 2px 4px; font-size: 15.75px; font-family: Menlo, Monaco, &quot;Courier New&quot;, Courier, monospace;\">authenticate</code>&nbsp;method, we validate the input, attempt a login and return the token if successful. In the register method, we validate the input, create a new user with the input and generate a token for the user based on that.</p><p id=\"3491\" class=\"jz ka hh kb b kc kd ke kf kg kh ki kj kk kl km kn ko kp kq kr ks kt ku kv kw gz cd\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 2em 0px -0.46em; color: rgb(41, 41, 41); word-break: break-word; line-height: 32px; letter-spacing: -0.003em; font-family: medium-content-serif-font, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-size: 21px;\">4. Next, onto the good part. Testing what we just wrote. Generate the test classes using&nbsp;<code class=\"gh mm mn mo mp b\" style=\"box-sizing: inherit; background-color: rgb(242, 242, 242); padding: 2px 4px; font-size: 15.75px; font-family: Menlo, Monaco, &quot;Courier New&quot;, Courier, monospace;\">php artisan make:test AuthTest</code>. In the new&nbsp;<code class=\"gh mm mn mo mp b\" style=\"box-sizing: inherit; background-color: rgb(242, 242, 242); padding: 2px 4px; font-size: 15.75px; font-family: Menlo, Monaco, &quot;Courier New&quot;, Courier, monospace;\">tests/Feature/AuthTest</code>&nbsp;add these methods:</p><figure class=\"jh ji jj jk jl jg\" style=\"box-sizing: inherit; margin-top: 56px; margin-bottom: 0px; clear: both; color: rgba(0, 0, 0, 0.8); font-family: medium-content-sans-serif-font, -apple-system, system-ui, &quot;Segoe UI&quot;, Roboto, Oxygen, Ubuntu, Cantarell, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, sans-serif; font-size: medium;\"><div class=\"jp s cf\" style=\"box-sizing: inherit; position: relative; margin: auto;\"><div class=\"xg jr s\" style=\"box-sizing: inherit; height: 0px; padding-bottom: 1032.98px;\"><iframe src=\"https://medium.com/media/6a859cfb6baaeae2c6bdd2c55cb5f6d1\" allowfullscreen=\"\" frameborder=\"0\" height=\"1033\" width=\"680\" title=\"AuthTest1.php\" class=\"t u v ez aj\" scrolling=\"auto\" style=\"box-sizing: inherit; position: absolute; top: 0px; left: 0px; width: 680px; height: 1032.98px;\"></iframe></div></div></figure><p id=\"7692\" class=\"jz ka hh kb b kc kd ke kf kg kh ki kj kk kl km kn ko kp kq kr ks kt ku kv kw gz cd\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 2em 0px -0.46em; color: rgb(41, 41, 41); word-break: break-word; line-height: 32px; letter-spacing: -0.003em; font-family: medium-content-serif-font, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-size: 21px;\">The comments in the code above pretty much describes the code. One thing you should note is how we create and delete the user in each test. The whole point of tests are that they should be independent of each other and the database state ideally.</p><p id=\"a24e\" class=\"jz ka hh kb b kc kd ke kf kg kh ki kj kk kl km kn ko kp kq kr ks kt ku kv kw gz cd\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 2em 0px -0.46em; color: rgb(41, 41, 41); word-break: break-word; line-height: 32px; letter-spacing: -0.003em; font-family: medium-content-serif-font, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-size: 21px;\">Now run&nbsp;<code class=\"gh mm mn mo mp b\" style=\"box-sizing: inherit; background-color: rgb(242, 242, 242); padding: 2px 4px; font-size: 15.75px; font-family: Menlo, Monaco, &quot;Courier New&quot;, Courier, monospace;\">$vendor/bin/phpunit</code>&nbsp;or&nbsp;<code class=\"gh mm mn mo mp b\" style=\"box-sizing: inherit; background-color: rgb(242, 242, 242); padding: 2px 4px; font-size: 15.75px; font-family: Menlo, Monaco, &quot;Courier New&quot;, Courier, monospace;\">$ phpunit</code>&nbsp;if you have it globally installed. Running that should give you successful assertions. If that was not the case, you can look through the logs, fix and retest. This is the beautiful cycle of TDD.</p><p id=\"ee68\" class=\"jz ka hh kb b kc kd ke kf kg kh ki kj kk kl km kn ko kp kq kr ks kt ku kv kw gz cd\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 2em 0px -0.46em; color: rgb(41, 41, 41); word-break: break-word; line-height: 32px; letter-spacing: -0.003em; font-family: medium-content-serif-font, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-size: 21px;\">5. Now that we have our authentication working, let’s add the item for the CRUD. For this tutorial, we’re going to use food recipes as our CRUD items, because, why not?</p><p id=\"52f7\" class=\"jz ka hh kb b kc kd ke kf kg kh ki kj kk kl km kn ko kp kq kr ks kt ku kv kw gz cd\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 2em 0px -0.46em; color: rgb(41, 41, 41); word-break: break-word; line-height: 32px; letter-spacing: -0.003em; font-family: medium-content-serif-font, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-size: 21px;\">Start by creating our migration&nbsp;<code class=\"gh mm mn mo mp b\" style=\"box-sizing: inherit; background-color: rgb(242, 242, 242); padding: 2px 4px; font-size: 15.75px; font-family: Menlo, Monaco, &quot;Courier New&quot;, Courier, monospace;\">php artisan make:migration create_recipes_table</code>&nbsp;and add the following:</p><figure class=\"jh ji jj jk jl jg\" style=\"box-sizing: inherit; margin-top: 56px; margin-bottom: 0px; clear: both; color: rgba(0, 0, 0, 0.8); font-family: medium-content-sans-serif-font, -apple-system, system-ui, &quot;Segoe UI&quot;, Roboto, Oxygen, Ubuntu, Cantarell, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, sans-serif; font-size: medium;\"><div class=\"jp s cf\" style=\"box-sizing: inherit; position: relative; margin: auto;\"><div class=\"xh jr s\" style=\"box-sizing: inherit; height: 0px; padding-bottom: 417px;\"><iframe src=\"https://medium.com/media/e252f51a64061ad5afcb757cacf8a747\" allowfullscreen=\"\" frameborder=\"0\" height=\"417\" width=\"680\" title=\"migration.php\" class=\"t u v ez aj\" scrolling=\"auto\" style=\"box-sizing: inherit; position: absolute; top: 0px; left: 0px; width: 680px; height: 417px;\"></iframe></div></div><figcaption class=\"jv jw gv gt gu jx jy at au av aw ax\" style=\"box-sizing: inherit; font-family: medium-content-sans-serif-font, &quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, &quot;Lucida Sans&quot;, Geneva, Arial, sans-serif; font-size: 16px; line-height: 20px; color: rgb(117, 117, 117); margin-left: auto; margin-right: auto; max-width: 728px; margin-top: 10px; text-align: center;\"><a href=\"https://gist.github.com/kofoworola/14fd5031f9e2733ebe4d3de5f1ae0490\" class=\"ci dj kx ky kz la\" rel=\"noopener nofollow\" style=\"box-sizing: inherit; color: inherit; -webkit-tap-highlight-color: transparent; background-repeat: repeat-x; background-image: url(&quot;data:image/svg+xml;utf8,<svg preserveAspectRatio=\\&quot;none\\&quot; viewBox=\\&quot;0 0 1 1\\&quot; xmlns=\\&quot;http://www.w3.org/2000/svg\\&quot;><line x1=\\&quot;0\\&quot; y1=\\&quot;0\\&quot; x2=\\&quot;1\\&quot; y2=\\&quot;1\\&quot; stroke=\\&quot;rgba(41, 41, 41, 1)\\&quot; /></svg>&quot;); background-size: 1px 1px; background-position: 0px calc(1em + 1px);\">https://gist.github.com/kofoworola/14fd5031f9e2733ebe4d3de5f1ae0490</a></figcaption></figure><p id=\"c232\" class=\"jz ka hh kb b kc kd ke kf kg kh ki kj kk kl km kn ko kp kq kr ks kt ku kv kw gz cd\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 2em 0px -0.46em; color: rgb(41, 41, 41); word-break: break-word; line-height: 32px; letter-spacing: -0.003em; font-family: medium-content-serif-font, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-size: 21px;\">Then run the migration. Now add the model using&nbsp;<code class=\"gh mm mn mo mp b\" style=\"box-sizing: inherit; background-color: rgb(242, 242, 242); padding: 2px 4px; font-size: 15.75px; font-family: Menlo, Monaco, &quot;Courier New&quot;, Courier, monospace;\">php artisan make:model Recipe</code>&nbsp;and add this to our model.</p><figure class=\"jh ji jj jk jl jg\" style=\"box-sizing: inherit; margin-top: 56px; margin-bottom: 0px; clear: both; color: rgba(0, 0, 0, 0.8); font-family: medium-content-sans-serif-font, -apple-system, system-ui, &quot;Segoe UI&quot;, Roboto, Oxygen, Ubuntu, Cantarell, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, sans-serif; font-size: medium;\"><div class=\"jp s cf\" style=\"box-sizing: inherit; position: relative; margin: auto;\"><div class=\"xk jr s\" style=\"box-sizing: inherit; height: 0px; padding-bottom: 285px;\"><iframe src=\"https://medium.com/media/a07d4739a17b8657e8e4f2bae15b9204\" allowfullscreen=\"\" frameborder=\"0\" height=\"285\" width=\"680\" title=\"recipe1.php\" class=\"t u v ez aj\" scrolling=\"auto\" style=\"box-sizing: inherit; position: absolute; top: 0px; left: 0px; width: 680px; height: 285px;\"></iframe></div></div></figure><p id=\"0cf4\" class=\"jz ka hh kb b kc kd ke kf kg kh ki kj kk kl km kn ko kp kq kr ks kt ku kv kw gz cd\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 2em 0px -0.46em; color: rgb(41, 41, 41); word-break: break-word; line-height: 32px; letter-spacing: -0.003em; font-family: medium-content-serif-font, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-size: 21px;\">Then add this method to the&nbsp;<code class=\"gh mm mn mo mp b\" style=\"box-sizing: inherit; background-color: rgb(242, 242, 242); padding: 2px 4px; font-size: 15.75px; font-family: Menlo, Monaco, &quot;Courier New&quot;, Courier, monospace;\">user</code>&nbsp;model.</p><figure class=\"jh ji jj jk jl jg\" style=\"box-sizing: inherit; margin-top: 56px; margin-bottom: 0px; clear: both; color: rgba(0, 0, 0, 0.8); font-family: medium-content-sans-serif-font, -apple-system, system-ui, &quot;Segoe UI&quot;, Roboto, Oxygen, Ubuntu, Cantarell, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, sans-serif; font-size: medium;\"><div class=\"jp s cf\" style=\"box-sizing: inherit; position: relative; margin: auto;\"><div class=\"xi jr s\" style=\"box-sizing: inherit; height: 0px; padding-bottom: 241px;\"><iframe src=\"https://medium.com/media/d34a44d3d6dde19a724f895025783c5a\" allowfullscreen=\"\" frameborder=\"0\" height=\"241\" width=\"680\" title=\"user2.php\" class=\"t u v ez aj\" scrolling=\"auto\" style=\"box-sizing: inherit; position: absolute; top: 0px; left: 0px; width: 680px; height: 241px;\"></iframe></div></div></figure><p id=\"555a\" class=\"jz ka hh kb b kc kd ke kf kg kh ki kj kk kl km kn ko kp kq kr ks kt ku kv kw gz cd\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 2em 0px -0.46em; color: rgb(41, 41, 41); word-break: break-word; line-height: 32px; letter-spacing: -0.003em; font-family: medium-content-serif-font, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-size: 21px;\">6. Now we need endpoints for managing our recipes. First, we’ll create the controller&nbsp;<code class=\"gh mm mn mo mp b\" style=\"box-sizing: inherit; background-color: rgb(242, 242, 242); padding: 2px 4px; font-size: 15.75px; font-family: Menlo, Monaco, &quot;Courier New&quot;, Courier, monospace;\">php artisan make:controller RecipeController</code>. Next, edit the&nbsp;<code class=\"gh mm mn mo mp b\" style=\"box-sizing: inherit; background-color: rgb(242, 242, 242); padding: 2px 4px; font-size: 15.75px; font-family: Menlo, Monaco, &quot;Courier New&quot;, Courier, monospace;\">routes/api.php</code>&nbsp;file and add the&nbsp;<code class=\"gh mm mn mo mp b\" style=\"box-sizing: inherit; background-color: rgb(242, 242, 242); padding: 2px 4px; font-size: 15.75px; font-family: Menlo, Monaco, &quot;Courier New&quot;, Courier, monospace;\">create</code>&nbsp;endpoint.</p><figure class=\"jh ji jj jk jl jg\" style=\"box-sizing: inherit; margin-top: 56px; margin-bottom: 0px; clear: both; color: rgba(0, 0, 0, 0.8); font-family: medium-content-sans-serif-font, -apple-system, system-ui, &quot;Segoe UI&quot;, Roboto, Oxygen, Ubuntu, Cantarell, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, sans-serif; font-size: medium;\"><div class=\"jp s cf\" style=\"box-sizing: inherit; position: relative; margin: auto;\"><div class=\"xj jr s\" style=\"box-sizing: inherit; height: 0px; padding-bottom: 153px;\"><iframe src=\"https://medium.com/media/291361c0dc9dd7e9c4b1c5894d60f91d\" allowfullscreen=\"\" frameborder=\"0\" height=\"153\" width=\"680\" title=\"routes2.php\" class=\"t u v ez aj\" scrolling=\"auto\" style=\"box-sizing: inherit; position: absolute; top: 0px; left: 0px; width: 680px; height: 153px;\"></iframe></div></div></figure><p id=\"1cd8\" class=\"jz ka hh kb b kc kd ke kf kg kh ki kj kk kl km kn ko kp kq kr ks kt ku kv kw gz cd\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 2em 0px -0.46em; color: rgb(41, 41, 41); word-break: break-word; line-height: 32px; letter-spacing: -0.003em; font-family: medium-content-serif-font, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-size: 21px;\">In the controller, add the create method as well</p><figure class=\"jh ji jj jk jl jg\" style=\"box-sizing: inherit; margin-top: 56px; margin-bottom: 0px; clear: both; color: rgba(0, 0, 0, 0.8); font-family: medium-content-sans-serif-font, -apple-system, system-ui, &quot;Segoe UI&quot;, Roboto, Oxygen, Ubuntu, Cantarell, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, sans-serif; font-size: medium;\"><div class=\"jp s cf\" style=\"box-sizing: inherit; position: relative; margin: auto;\"><div class=\"xc jr s\" style=\"box-sizing: inherit; height: 0px; padding-bottom: 351px;\"><iframe src=\"https://medium.com/media/b2074af1ee4c4cfef98801976c1eab12\" allowfullscreen=\"\" frameborder=\"0\" height=\"351\" width=\"680\" title=\"RecipeController.php\" class=\"t u v ez aj\" scrolling=\"auto\" style=\"box-sizing: inherit; position: absolute; top: 0px; left: 0px; width: 680px; height: 351px;\"></iframe></div></div></figure><p id=\"855f\" class=\"jz ka hh kb b kc kd ke kf kg kh ki kj kk kl km kn ko kp kq kr ks kt ku kv kw gz cd\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 2em 0px -0.46em; color: rgb(41, 41, 41); word-break: break-word; line-height: 32px; letter-spacing: -0.003em; font-family: medium-content-serif-font, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-size: 21px;\">Generate the feature test with&nbsp;<code class=\"gh mm mn mo mp b\" style=\"box-sizing: inherit; background-color: rgb(242, 242, 242); padding: 2px 4px; font-size: 15.75px; font-family: Menlo, Monaco, &quot;Courier New&quot;, Courier, monospace;\">php artisan make:test RecipeTest</code>&nbsp;and edit the contents as under:</p><figure class=\"jh ji jj jk jl jg\" style=\"box-sizing: inherit; margin-top: 56px; margin-bottom: 0px; clear: both; color: rgba(0, 0, 0, 0.8); font-family: medium-content-sans-serif-font, -apple-system, system-ui, &quot;Segoe UI&quot;, Roboto, Oxygen, Ubuntu, Cantarell, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, sans-serif; font-size: medium;\"><div class=\"jp s cf\" style=\"box-sizing: inherit; position: relative; margin: auto;\"><div class=\"xf jr s\" style=\"box-sizing: inherit; height: 0px; padding-bottom: 747px;\"><iframe src=\"https://medium.com/media/7c43015b477cd10997584de6f212e015\" allowfullscreen=\"\" frameborder=\"0\" height=\"747\" width=\"680\" title=\"RecipeTest.php\" class=\"t u v ez aj\" scrolling=\"auto\" style=\"box-sizing: inherit; position: absolute; top: 0px; left: 0px; width: 680px; height: 747px;\"></iframe></div></div></figure><p id=\"b2b9\" class=\"jz ka hh kb b kc kd ke kf kg kh ki kj kk kl km kn ko kp kq kr ks kt ku kv kw gz cd\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 2em 0px -0.46em; color: rgb(41, 41, 41); word-break: break-word; line-height: 32px; letter-spacing: -0.003em; font-family: medium-content-serif-font, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-size: 21px;\">The code is quite self-explanatory. All we do is create a method that handles the registering of a user and token generation, then we use that token in the&nbsp;<code class=\"gh mm mn mo mp b\" style=\"box-sizing: inherit; background-color: rgb(242, 242, 242); padding: 2px 4px; font-size: 15.75px; font-family: Menlo, Monaco, &quot;Courier New&quot;, Courier, monospace;\">testCreate()</code>&nbsp;method. Note the use of the&nbsp;<code class=\"gh mm mn mo mp b\" style=\"box-sizing: inherit; background-color: rgb(242, 242, 242); padding: 2px 4px; font-size: 15.75px; font-family: Menlo, Monaco, &quot;Courier New&quot;, Courier, monospace;\">RefreshDatabase</code>&nbsp;trait, the trait is Laravel’s convenient way of resetting your database after each test, which is perfect for our nifty little project.</p><p id=\"86c9\" class=\"jz ka hh kb b kc kd ke kf kg kh ki kj kk kl km kn ko kp kq kr ks kt ku kv kw gz cd\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 2em 0px -0.46em; color: rgb(41, 41, 41); word-break: break-word; line-height: 32px; letter-spacing: -0.003em; font-family: medium-content-serif-font, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-size: 21px;\">OK, so for now, all we want to assert is the status of the response, go ahead and run&nbsp;<code class=\"gh mm mn mo mp b\" style=\"box-sizing: inherit; background-color: rgb(242, 242, 242); padding: 2px 4px; font-size: 15.75px; font-family: Menlo, Monaco, &quot;Courier New&quot;, Courier, monospace;\">$ vendor/bin/phpunit</code>.</p><p id=\"6dd5\" class=\"jz ka hh kb b kc kd ke kf kg kh ki kj kk kl km kn ko kp kq kr ks kt ku kv kw gz cd\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 2em 0px -0.46em; color: rgb(41, 41, 41); word-break: break-word; line-height: 32px; letter-spacing: -0.003em; font-family: medium-content-serif-font, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-size: 21px;\">If all goes well, you should receive an error. 😆</p><pre class=\"jh ji jj jk jl mu mv dz\" style=\"box-sizing: inherit; margin-top: 56px; margin-bottom: 0px; padding: 20px; background: rgb(242, 242, 242); color: rgba(0, 0, 0, 0.8);\"><span id=\"a0e4\" class=\"cd lu lv hh mp b av mw mx s my\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; display: block; font-size: 16px; color: rgb(41, 41, 41); line-height: 1.18; letter-spacing: -0.022em; font-family: Menlo, Monaco, &quot;Courier New&quot;, Courier, monospace; margin-top: -0.09em; margin-bottom: -0.09em; white-space: pre-wrap;\">There was 1 failure:</span><span id=\"72fb\" class=\"cd lu lv hh mp b av mz na nb nc nd mx s my\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; display: block; font-size: 16px; color: rgb(41, 41, 41); line-height: 1.18; letter-spacing: -0.022em; font-family: Menlo, Monaco, &quot;Courier New&quot;, Courier, monospace; margin-bottom: -0.09em; white-space: pre-wrap; margin-top: 1.91em;\">1) Tests\\Feature\\RecipeTest::testCreate<br style=\"box-sizing: inherit;\">Expected status code 200 but received 500.<br style=\"box-sizing: inherit;\">Failed asserting that false is true.</span><span id=\"efd6\" class=\"cd lu lv hh mp b av mz na nb nc nd mx s my\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; display: block; font-size: 16px; color: rgb(41, 41, 41); line-height: 1.18; letter-spacing: -0.022em; font-family: Menlo, Monaco, &quot;Courier New&quot;, Courier, monospace; margin-bottom: -0.09em; white-space: pre-wrap; margin-top: 1.91em;\">/home/user/sites/tdd-journey/vendor/laravel/framework/src/Illuminate/Foundation/Testing/TestResponse.php:133<br style=\"box-sizing: inherit;\">/home/user/sites/tdd-journey/tests/Feature/RecipeTest.php:49</span><span id=\"5d2a\" class=\"cd lu lv hh mp b av mz na nb nc nd mx s my\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; display: block; font-size: 16px; color: rgb(41, 41, 41); line-height: 1.18; letter-spacing: -0.022em; font-family: Menlo, Monaco, &quot;Courier New&quot;, Courier, monospace; margin-bottom: -0.09em; white-space: pre-wrap; margin-top: 1.91em;\">FAILURES!<br style=\"box-sizing: inherit;\">Tests: 3, Assertions: 5, Failures: 1.</span></pre><p id=\"95d6\" class=\"jz ka hh kb b kc kd ke kf kg kh ki kj kk kl km kn ko kp kq kr ks kt ku kv kw gz cd\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 2em 0px -0.46em; color: rgb(41, 41, 41); word-break: break-word; line-height: 32px; letter-spacing: -0.003em; font-family: medium-content-serif-font, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-size: 21px;\">Looking at the log files, we can see the culprit is the&nbsp;<code class=\"gh mm mn mo mp b\" style=\"box-sizing: inherit; background-color: rgb(242, 242, 242); padding: 2px 4px; font-size: 15.75px; font-family: Menlo, Monaco, &quot;Courier New&quot;, Courier, monospace;\">publisher</code>&nbsp;and&nbsp;<code class=\"gh mm mn mo mp b\" style=\"box-sizing: inherit; background-color: rgb(242, 242, 242); padding: 2px 4px; font-size: 15.75px; font-family: Menlo, Monaco, &quot;Courier New&quot;, Courier, monospace;\">recipes</code>&nbsp;relationship in the&nbsp;<code class=\"gh mm mn mo mp b\" style=\"box-sizing: inherit; background-color: rgb(242, 242, 242); padding: 2px 4px; font-size: 15.75px; font-family: Menlo, Monaco, &quot;Courier New&quot;, Courier, monospace;\">Recipe</code>&nbsp;and&nbsp;<code class=\"gh mm mn mo mp b\" style=\"box-sizing: inherit; background-color: rgb(242, 242, 242); padding: 2px 4px; font-size: 15.75px; font-family: Menlo, Monaco, &quot;Courier New&quot;, Courier, monospace;\">User</code>&nbsp;classes. Laravel tries to find a&nbsp;<code class=\"gh mm mn mo mp b\" style=\"box-sizing: inherit; background-color: rgb(242, 242, 242); padding: 2px 4px; font-size: 15.75px; font-family: Menlo, Monaco, &quot;Courier New&quot;, Courier, monospace;\">user_id</code>&nbsp;column in the table and use that as the foreign key, but in our migration we set&nbsp;<code class=\"gh mm mn mo mp b\" style=\"box-sizing: inherit; background-color: rgb(242, 242, 242); padding: 2px 4px; font-size: 15.75px; font-family: Menlo, Monaco, &quot;Courier New&quot;, Courier, monospace;\">publisher_id</code>&nbsp;as the foreign key. Now, adjust the lines as under:</p><pre class=\"jh ji jj jk jl mu mv dz\" style=\"box-sizing: inherit; margin-top: 56px; margin-bottom: 0px; padding: 20px; background: rgb(242, 242, 242); color: rgba(0, 0, 0, 0.8);\"><span id=\"f37a\" class=\"cd lu lv hh mp b av mw mx s my\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; display: block; font-size: 16px; color: rgb(41, 41, 41); line-height: 1.18; letter-spacing: -0.022em; font-family: Menlo, Monaco, &quot;Courier New&quot;, Courier, monospace; margin-top: -0.09em; margin-bottom: -0.09em; white-space: pre-wrap;\"><span class=\"mp lt\" style=\"box-sizing: inherit; font-weight: 700; font-family: Menlo, Monaco, &quot;Courier New&quot;, Courier, monospace;\">//Recipe file<br style=\"box-sizing: inherit;\">public function </span>publisher(){<br style=\"box-sizing: inherit;\">    <span class=\"mp lt\" style=\"box-sizing: inherit; font-weight: 700; font-family: Menlo, Monaco, &quot;Courier New&quot;, Courier, monospace;\">return </span>$this-&gt;belongsTo(User::<span class=\"mp lt\" style=\"box-sizing: inherit; font-weight: 700; font-family: Menlo, Monaco, &quot;Courier New&quot;, Courier, monospace;\">class</span>,\'publisher_id\');<br style=\"box-sizing: inherit;\">}</span><span id=\"9e6d\" class=\"cd lu lv hh mp b av mz na nb nc nd mx s my\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; display: block; font-size: 16px; color: rgb(41, 41, 41); line-height: 1.18; letter-spacing: -0.022em; font-family: Menlo, Monaco, &quot;Courier New&quot;, Courier, monospace; margin-bottom: -0.09em; white-space: pre-wrap; margin-top: 1.91em;\">//User file<br style=\"box-sizing: inherit;\"><span class=\"mp lt\" style=\"box-sizing: inherit; font-weight: 700; font-family: Menlo, Monaco, &quot;Courier New&quot;, Courier, monospace;\">public function </span>recipes(){<br style=\"box-sizing: inherit;\">    <span class=\"mp lt\" style=\"box-sizing: inherit; font-weight: 700; font-family: Menlo, Monaco, &quot;Courier New&quot;, Courier, monospace;\">return </span>$this-&gt;hasMany(Recipe::<span class=\"mp lt\" style=\"box-sizing: inherit; font-weight: 700; font-family: Menlo, Monaco, &quot;Courier New&quot;, Courier, monospace;\">class</span>,\'publisher_id\');<br style=\"box-sizing: inherit;\">}</span></pre><p id=\"733c\" class=\"jz ka hh kb b kc kd ke kf kg kh ki kj kk kl km kn ko kp kq kr ks kt ku kv kw gz cd\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 2em 0px -0.46em; color: rgb(41, 41, 41); word-break: break-word; line-height: 32px; letter-spacing: -0.003em; font-family: medium-content-serif-font, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-size: 21px;\">And then re-run the test. If all goes well we get all green tests! 👍</p><pre class=\"jh ji jj jk jl mu mv dz\" style=\"box-sizing: inherit; margin-top: 56px; margin-bottom: 0px; padding: 20px; background: rgb(242, 242, 242); color: rgba(0, 0, 0, 0.8);\"><span id=\"c41d\" class=\"cd lu lv hh mp b av mw mx s my\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; display: block; font-size: 16px; color: rgb(41, 41, 41); line-height: 1.18; letter-spacing: -0.022em; font-family: Menlo, Monaco, &quot;Courier New&quot;, Courier, monospace; margin-top: -0.09em; margin-bottom: -0.09em; white-space: pre-wrap;\">...                                                                 3 / 3 (100%)</span><span id=\"07b0\" class=\"cd lu lv hh mp b av mz na nb nc nd mx s my\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; display: block; font-size: 16px; color: rgb(41, 41, 41); line-height: 1.18; letter-spacing: -0.022em; font-family: Menlo, Monaco, &quot;Courier New&quot;, Courier, monospace; margin-bottom: -0.09em; white-space: pre-wrap; margin-top: 1.91em;\">...</span><span id=\"bf9c\" class=\"cd lu lv hh mp b av mz na nb nc nd mx s my\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; display: block; font-size: 16px; color: rgb(41, 41, 41); line-height: 1.18; letter-spacing: -0.022em; font-family: Menlo, Monaco, &quot;Courier New&quot;, Courier, monospace; margin-bottom: -0.09em; white-space: pre-wrap; margin-top: 1.91em;\">OK (3 tests, 5 assertions)</span></pre><p id=\"91af\" class=\"jz ka hh kb b kc kd ke kf kg kh ki kj kk kl km kn ko kp kq kr ks kt ku kv kw gz cd\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 2em 0px -0.46em; color: rgb(41, 41, 41); word-break: break-word; line-height: 32px; letter-spacing: -0.003em; font-family: medium-content-serif-font, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-size: 21px;\">Now we still need to test the creation of the recipe. To do that we can assert the recipes count of the user. Update your&nbsp;<code class=\"gh mm mn mo mp b\" style=\"box-sizing: inherit; background-color: rgb(242, 242, 242); padding: 2px 4px; font-size: 15.75px; font-family: Menlo, Monaco, &quot;Courier New&quot;, Courier, monospace;\">testCreate</code>&nbsp;method as under:</p><figure class=\"jh ji jj jk jl jg\" style=\"box-sizing: inherit; margin-top: 56px; margin-bottom: 0px; clear: both; color: rgba(0, 0, 0, 0.8); font-family: medium-content-sans-serif-font, -apple-system, system-ui, &quot;Segoe UI&quot;, Roboto, Oxygen, Ubuntu, Cantarell, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, sans-serif; font-size: medium;\"><div class=\"jp s cf\" style=\"box-sizing: inherit; position: relative; margin: auto;\"><div class=\"zx jr s\" style=\"box-sizing: inherit; height: 0px; padding-bottom: 373px;\"><iframe src=\"https://medium.com/media/9f8e97cea1a13745280933cc7565d055\" allowfullscreen=\"\" frameborder=\"0\" height=\"373\" width=\"680\" title=\"RecipeTest.php\" class=\"t u v ez aj\" scrolling=\"auto\" style=\"box-sizing: inherit; position: absolute; top: 0px; left: 0px; width: 680px; height: 373px;\"></iframe></div></div></figure><p id=\"5d05\" class=\"jz ka hh kb b kc kd ke kf kg kh ki kj kk kl km kn ko kp kq kr ks kt ku kv kw gz cd\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 2em 0px -0.46em; color: rgb(41, 41, 41); word-break: break-word; line-height: 32px; letter-spacing: -0.003em; font-family: medium-content-serif-font, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-size: 21px;\">We can now go ahead and fill the rest of our methods. Time for some changes. First, our&nbsp;<code class=\"gh mm mn mo mp b\" style=\"box-sizing: inherit; background-color: rgb(242, 242, 242); padding: 2px 4px; font-size: 15.75px; font-family: Menlo, Monaco, &quot;Courier New&quot;, Courier, monospace;\">routes/api.php</code></p><figure class=\"jh ji jj jk jl jg\" style=\"box-sizing: inherit; margin-top: 56px; margin-bottom: 0px; clear: both; color: rgba(0, 0, 0, 0.8); font-family: medium-content-sans-serif-font, -apple-system, system-ui, &quot;Segoe UI&quot;, Roboto, Oxygen, Ubuntu, Cantarell, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, sans-serif; font-size: medium;\"><div class=\"jp s cf\" style=\"box-sizing: inherit; position: relative; margin: auto;\"><div class=\"xi jr s\" style=\"box-sizing: inherit; height: 0px; padding-bottom: 241px;\"><iframe src=\"https://medium.com/media/00c4c663eca1ca06e6c1f08e290927df\" allowfullscreen=\"\" frameborder=\"0\" height=\"241\" width=\"680\" title=\"api.php\" class=\"t u v ez aj\" scrolling=\"auto\" style=\"box-sizing: inherit; position: absolute; top: 0px; left: 0px; width: 680px; height: 241px;\"></iframe></div></div></figure><p id=\"5439\" class=\"jz ka hh kb b kc kd ke kf kg kh ki kj kk kl km kn ko kp kq kr ks kt ku kv kw gz cd\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 2em 0px -0.46em; color: rgb(41, 41, 41); word-break: break-word; line-height: 32px; letter-spacing: -0.003em; font-family: medium-content-serif-font, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-size: 21px;\">Next, we add the methods to the controller. Update your&nbsp;<code class=\"gh mm mn mo mp b\" style=\"box-sizing: inherit; background-color: rgb(242, 242, 242); padding: 2px 4px; font-size: 15.75px; font-family: Menlo, Monaco, &quot;Courier New&quot;, Courier, monospace;\">RecipeController</code>&nbsp;class this way.</p><figure class=\"jh ji jj jk jl jg\" style=\"box-sizing: inherit; margin-top: 56px; margin-bottom: 0px; clear: both; color: rgba(0, 0, 0, 0.8); font-family: medium-content-sans-serif-font, -apple-system, system-ui, &quot;Segoe UI&quot;, Roboto, Oxygen, Ubuntu, Cantarell, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, sans-serif; font-size: medium;\"><div class=\"jp s cf\" style=\"box-sizing: inherit; position: relative; margin: auto;\"><div class=\"zy jr s\" style=\"box-sizing: inherit; height: 0px; padding-bottom: 1077px;\"><iframe src=\"https://medium.com/media/2676625bc8584f53ace7c68472b11db6\" allowfullscreen=\"\" frameborder=\"0\" height=\"1077\" width=\"680\" title=\"RecipeController.php\" class=\"t u v ez aj\" scrolling=\"auto\" style=\"box-sizing: inherit; position: absolute; top: 0px; left: 0px; width: 680px; height: 1077px;\"></iframe></div></div></figure><p id=\"a655\" class=\"jz ka hh kb b kc kd ke kf kg kh ki kj kk kl km kn ko kp kq kr ks kt ku kv kw gz cd\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 2em 0px -0.46em; color: rgb(41, 41, 41); word-break: break-word; line-height: 32px; letter-spacing: -0.003em; font-family: medium-content-serif-font, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-size: 21px;\">The code and comments already explain the logic to a good degree.</p><p id=\"7296\" class=\"jz ka hh kb b kc kd ke kf kg kh ki kj kk kl km kn ko kp kq kr ks kt ku kv kw gz cd\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 2em 0px -0.46em; color: rgb(41, 41, 41); word-break: break-word; line-height: 32px; letter-spacing: -0.003em; font-family: medium-content-serif-font, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-size: 21px;\">Lastly our&nbsp;<code class=\"gh mm mn mo mp b\" style=\"box-sizing: inherit; background-color: rgb(242, 242, 242); padding: 2px 4px; font-size: 15.75px; font-family: Menlo, Monaco, &quot;Courier New&quot;, Courier, monospace;\">test/Feature/RecipeTest</code></p><figure class=\"jh ji jj jk jl jg\" style=\"box-sizing: inherit; margin-top: 56px; margin-bottom: 0px; clear: both; color: rgba(0, 0, 0, 0.8); font-family: medium-content-sans-serif-font, -apple-system, system-ui, &quot;Segoe UI&quot;, Roboto, Oxygen, Ubuntu, Cantarell, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, sans-serif; font-size: medium;\"><div class=\"jp s cf\" style=\"box-sizing: inherit; position: relative; margin: auto;\"><div class=\"zz jr s\" style=\"box-sizing: inherit; height: 0px; padding-bottom: 2397px;\"><iframe src=\"https://medium.com/media/0405585210060aa2541150c47137804e\" allowfullscreen=\"\" frameborder=\"0\" height=\"2397\" width=\"680\" title=\"RecipeTest.php\" class=\"t u v ez aj\" scrolling=\"auto\" style=\"box-sizing: inherit; position: absolute; top: 0px; left: 0px; width: 680px; height: 2397px;\"></iframe></div></div></figure><p id=\"2ad1\" class=\"jz ka hh kb b kc kd ke kf kg kh ki kj kk kl km kn ko kp kq kr ks kt ku kv kw gz cd\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 2em 0px -0.46em; color: rgb(41, 41, 41); word-break: break-word; line-height: 32px; letter-spacing: -0.003em; font-family: medium-content-serif-font, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-size: 21px;\">Other than the additional test, the only other difference was adding a class-wide user file. That way, the&nbsp;<code class=\"gh mm mn mo mp b\" style=\"box-sizing: inherit; background-color: rgb(242, 242, 242); padding: 2px 4px; font-size: 15.75px; font-family: Menlo, Monaco, &quot;Courier New&quot;, Courier, monospace;\">authenticate</code>&nbsp;method not only generates a token, but it sets the user file for subsequent operations.</p><p id=\"21d6\" class=\"jz ka hh kb b kc kd ke kf kg kh ki kj kk kl km kn ko kp kq kr ks kt ku kv kw gz cd\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 2em 0px -0.46em; color: rgb(41, 41, 41); word-break: break-word; line-height: 32px; letter-spacing: -0.003em; font-family: medium-content-serif-font, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-size: 21px;\">Now run&nbsp;<code class=\"gh mm mn mo mp b\" style=\"box-sizing: inherit; background-color: rgb(242, 242, 242); padding: 2px 4px; font-size: 15.75px; font-family: Menlo, Monaco, &quot;Courier New&quot;, Courier, monospace;\">$ vendor/bin/phpunit</code>&nbsp;and you should have all green tests if done correctly.</p><h2 id=\"5027\" class=\"lu lv hh at fz lw lx ke ly lz ki ma mb km mc md kq me mf ku mg cd\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 1.72em 0px -0.31em; font-family: medium-content-sans-serif-font, &quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, &quot;Lucida Sans&quot;, Geneva, Arial, sans-serif; color: rgb(41, 41, 41); font-weight: 600; line-height: 32px; letter-spacing: -0.022em; font-size: 26px;\">Conclusion</h2><p id=\"0170\" class=\"jz ka hh kb b kc mh ke kf kg mi ki kj kk mj km kn ko mk kq kr ks ml ku kv kw gz cd\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 0.86em 0px -0.46em; color: rgb(41, 41, 41); word-break: break-word; line-height: 32px; letter-spacing: -0.003em; font-family: medium-content-serif-font, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-size: 21px;\">Hopefully, this gave you an insight into how TDD works in Laravel. It is definitely a much wider concept than this, one that is not bound to a specific method.</p><p id=\"74da\" class=\"jz ka hh kb b kc kd ke kf kg kh ki kj kk kl km kn ko kp kq kr ks kt ku kv kw gz cd\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 2em 0px -0.46em; color: rgb(41, 41, 41); word-break: break-word; line-height: 32px; letter-spacing: -0.003em; font-family: medium-content-serif-font, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-size: 21px;\">Though this method of development may seem longer than the usual&nbsp;<span class=\"kb lt\" style=\"box-sizing: inherit; font-family: medium-content-serif-font, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-weight: 700;\">debug later</span><em class=\"ls\" style=\"box-sizing: inherit;\">&nbsp;</em>procedure, it’s perfect for catching errors early on in your code. Though there are cases where a non-TDD approach is more useful, it’s still a solid skill and habit to get used to.</p><div><br></div>', '/storage/images/journals/1600770558.jpeg', 'Sharing', 1, NULL, '2020-09-22 10:29:18', '2020-09-22 10:29:18');
INSERT INTO `journals` (`id`, `title`, `content`, `file`, `type`, `user_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(8, 'How to Build a Simple Restful API in PHP', '<p style=\"margin-right: 0px; margin-bottom: 20px; margin-left: 0px; color: rgb(93, 93, 93); font-family: proxima-nova, Helvetica, Arial, sans-serif;\">REST APIs are the backbone of modern web development. Most web applications these days are developed as single-page applications on the frontend, connected to backend APIs written in various languages. There are many great frameworks that can help you build REST APIs quickly. Laravel/Lumen and Symfony’s API platform are the most often used examples in the PHP ecosystem. They provide great tools to process requests and generate JSON responses with the correct HTTP status codes. They also make it easy to handle common issues like authentication/authorization, request validation, data transformation, pagination, filters, rate throttling, complex endpoints with sub-resources, and API documentation.</p><p style=\"margin: 20px 0px; color: rgb(93, 93, 93); font-family: proxima-nova, Helvetica, Arial, sans-serif;\">You certainly don’t need a complex framework to build a simple but secure API though. In this article, I’ll show you how to build a simple REST API in PHP from scratch. We’ll make the API secure by using Okta as our authorization provider and implementing the Client Credentials Flow.</p><p style=\"margin: 20px 0px; color: rgb(93, 93, 93); font-family: proxima-nova, Helvetica, Arial, sans-serif;\">Okta is an API service that allows you to create, edit, and securely store user accounts and user account data, and connect them with one or more applications.&nbsp;<a href=\"https://developer.okta.com/signup/\" style=\"color: rgb(0, 125, 193); transition: color 0.4s ease 0s;\">Register for a forever-free developer account</a>, and when you’re done, come back to learn more about building a simple REST API in PHP.</p><p style=\"margin: 20px 0px; color: rgb(93, 93, 93); font-family: proxima-nova, Helvetica, Arial, sans-serif;\">There are different authentication flows in OAuth 2.0, depending on if the client application is public or private and if there is a user involved or the communication is machine-to-machine only. The Client Credentials Flow is best suited for machine-to-machine communication where the client application is private (and can be trusted to hold a secret). At the end of the post, I’ll show you how to build a test client application as well.</p><h2 id=\"create-the-php-project-skeleton-for-your-rest-api\" style=\"margin: 60px 0px 10px; font-size: 38px; line-height: 54px; font-family: proxima-nova, Helvetica, sans-serif; color: rgb(93, 93, 93);\"><a href=\"https://developer.okta.com/blog/2019/03/08/simple-rest-api-php#create-the-php-project-skeleton-for-your-rest-api\" style=\"color: rgb(61, 61, 61); transition: color 0.4s ease 0s; position: relative;\">Create the PHP Project Skeleton for Your REST API</a></h2><p style=\"margin: 20px 0px; color: rgb(93, 93, 93); font-family: proxima-nova, Helvetica, Arial, sans-serif;\">We’ll start by creating a&nbsp;<code class=\"language-plaintext highlighter-rouge\" style=\"font-family: monospace, monospace; font-size: 1em; display: inline-block; white-space: pre; padding: 0px 5px; background: rgb(244, 244, 244); line-height: 24px;\">/src</code>&nbsp;directory and a simple&nbsp;<code class=\"language-plaintext highlighter-rouge\" style=\"font-family: monospace, monospace; font-size: 1em; display: inline-block; white-space: pre; padding: 0px 5px; background: rgb(244, 244, 244); line-height: 24px;\">composer.json</code>&nbsp;file in the top directory with just one dependency (for now): the DotEnv library which will allow us to keep our Okta authentication details in a&nbsp;<code class=\"language-plaintext highlighter-rouge\" style=\"font-family: monospace, monospace; font-size: 1em; display: inline-block; white-space: pre; padding: 0px 5px; background: rgb(244, 244, 244); line-height: 24px;\">.env</code>&nbsp;file outside our code repository:</p><p style=\"margin: 20px 0px; color: rgb(93, 93, 93); font-family: proxima-nova, Helvetica, Arial, sans-serif;\"><code class=\"language-plaintext highlighter-rouge\" style=\"font-family: monospace, monospace; font-size: 1em; display: inline-block; white-space: pre; padding: 0px 5px; background: rgb(244, 244, 244); line-height: 24px;\">composer.json</code></p><div class=\"language-json highlighter-rouge\" style=\"color: rgb(93, 93, 93); font-family: proxima-nova, Helvetica, Arial, sans-serif;\"><div class=\"highlight\"><pre class=\"highlight\" style=\"font-family: monospace, monospace; font-size: 1em; margin-top: 20px; margin-bottom: 20px; white-space: pre-wrap; padding: 15px; background: rgb(244, 244, 244); max-width: 900px; color: rgb(61, 61, 61);\"><code style=\"font-family: monospace, monospace; font-size: 1em; display: inline-block; white-space: pre; background: none; padding: 0px;\"><span class=\"p\">{</span><span class=\"w\">\r\n    </span><span class=\"nl\" style=\"color: rgb(17, 93, 139);\">\"require\"</span><span class=\"p\">:</span><span class=\"w\"> </span><span class=\"p\">{</span><span class=\"w\">\r\n        </span><span class=\"nl\" style=\"color: rgb(17, 93, 139);\">\"vlucas/phpdotenv\"</span><span class=\"p\">:</span><span class=\"w\"> </span><span class=\"s2\" style=\"color: rgb(226, 40, 102);\">\"^2.4\"</span><span class=\"w\">\r\n    </span><span class=\"p\">},</span><span class=\"w\">\r\n    </span><span class=\"nl\" style=\"color: rgb(17, 93, 139);\">\"autoload\"</span><span class=\"p\">:</span><span class=\"w\"> </span><span class=\"p\">{</span><span class=\"w\">\r\n        </span><span class=\"nl\" style=\"color: rgb(17, 93, 139);\">\"psr-4\"</span><span class=\"p\">:</span><span class=\"w\"> </span><span class=\"p\">{</span><span class=\"w\">\r\n            </span><span class=\"nl\" style=\"color: rgb(17, 93, 139);\">\"Src\\\\\"</span><span class=\"p\">:</span><span class=\"w\"> </span><span class=\"s2\" style=\"color: rgb(226, 40, 102);\">\"src/\"</span><span class=\"w\">\r\n        </span><span class=\"p\">}</span><span class=\"w\">\r\n    </span><span class=\"p\">}</span><span class=\"w\">\r\n</span><span class=\"p\">}</span><span class=\"w\">\r\n</span></code></pre></div></div><p style=\"margin: 20px 0px; color: rgb(93, 93, 93); font-family: proxima-nova, Helvetica, Arial, sans-serif;\">We’ve also configured a PSR-4 autoloader which will automatically look for PHP classes in the&nbsp;<code class=\"language-plaintext highlighter-rouge\" style=\"font-family: monospace, monospace; font-size: 1em; display: inline-block; white-space: pre; padding: 0px 5px; background: rgb(244, 244, 244); line-height: 24px;\">/src</code>&nbsp;directory.</p><p style=\"margin: 20px 0px; color: rgb(93, 93, 93); font-family: proxima-nova, Helvetica, Arial, sans-serif;\">We can install our dependencies now:</p><div class=\"language-bash highlighter-rouge\" style=\"color: rgb(93, 93, 93); font-family: proxima-nova, Helvetica, Arial, sans-serif;\"><div class=\"highlight\"><pre class=\"highlight\" style=\"font-family: monospace, monospace; font-size: 1em; margin-top: 20px; margin-bottom: 20px; white-space: pre-wrap; padding: 15px; background: rgb(244, 244, 244); max-width: 900px; color: rgb(61, 61, 61);\"><code style=\"font-family: monospace, monospace; font-size: 1em; display: inline-block; white-space: pre; background: none; padding: 0px;\">composer <span class=\"nb\" style=\"color: rgb(17, 93, 139);\">install</span>\r\n</code></pre></div></div><p style=\"margin: 20px 0px; color: rgb(93, 93, 93); font-family: proxima-nova, Helvetica, Arial, sans-serif;\">We now have a&nbsp;<code class=\"language-plaintext highlighter-rouge\" style=\"font-family: monospace, monospace; font-size: 1em; display: inline-block; white-space: pre; padding: 0px 5px; background: rgb(244, 244, 244); line-height: 24px;\">/vendor</code>&nbsp;directory, and the DotEnv dependency is installed (we can also use our autoloader to load our classes from&nbsp;<code class=\"language-plaintext highlighter-rouge\" style=\"font-family: monospace, monospace; font-size: 1em; display: inline-block; white-space: pre; padding: 0px 5px; background: rgb(244, 244, 244); line-height: 24px;\">/src</code>&nbsp;with no&nbsp;<code class=\"language-plaintext highlighter-rouge\" style=\"font-family: monospace, monospace; font-size: 1em; display: inline-block; white-space: pre; padding: 0px 5px; background: rgb(244, 244, 244); line-height: 24px;\">include()</code>&nbsp;calls).</p><p style=\"margin: 20px 0px; color: rgb(93, 93, 93); font-family: proxima-nova, Helvetica, Arial, sans-serif;\">Let’s create a&nbsp;<code class=\"language-plaintext highlighter-rouge\" style=\"font-family: monospace, monospace; font-size: 1em; display: inline-block; white-space: pre; padding: 0px 5px; background: rgb(244, 244, 244); line-height: 24px;\">.gitignore</code>&nbsp;file for our project with two lines in it, so the&nbsp;<code class=\"language-plaintext highlighter-rouge\" style=\"font-family: monospace, monospace; font-size: 1em; display: inline-block; white-space: pre; padding: 0px 5px; background: rgb(244, 244, 244); line-height: 24px;\">/vendor</code>&nbsp;directory and our local&nbsp;<code class=\"language-plaintext highlighter-rouge\" style=\"font-family: monospace, monospace; font-size: 1em; display: inline-block; white-space: pre; padding: 0px 5px; background: rgb(244, 244, 244); line-height: 24px;\">.env</code>&nbsp;file will be ignored:</p><div class=\"language-plaintext highlighter-rouge\" style=\"color: rgb(93, 93, 93); font-family: proxima-nova, Helvetica, Arial, sans-serif;\"><div class=\"highlight\"><pre class=\"highlight\" style=\"font-family: monospace, monospace; font-size: 1em; margin-top: 20px; margin-bottom: 20px; white-space: pre-wrap; padding: 15px; background: rgb(244, 244, 244); max-width: 900px; color: rgb(61, 61, 61);\"><code style=\"font-family: monospace, monospace; font-size: 1em; display: inline-block; white-space: pre; background: none; padding: 0px;\">vendor/\r\n.env\r\n</code></pre></div></div><p style=\"margin: 20px 0px; color: rgb(93, 93, 93); font-family: proxima-nova, Helvetica, Arial, sans-serif;\">Next we’ll create a&nbsp;<code class=\"language-plaintext highlighter-rouge\" style=\"font-family: monospace, monospace; font-size: 1em; display: inline-block; white-space: pre; padding: 0px 5px; background: rgb(244, 244, 244); line-height: 24px;\">.env.example</code>&nbsp;file for our Okta authentication variables:</p><p style=\"margin: 20px 0px; color: rgb(93, 93, 93); font-family: proxima-nova, Helvetica, Arial, sans-serif;\"><code class=\"language-plaintext highlighter-rouge\" style=\"font-family: monospace, monospace; font-size: 1em; display: inline-block; white-space: pre; padding: 0px 5px; background: rgb(244, 244, 244); line-height: 24px;\">.env.example</code></p><div class=\"language-bash highlighter-rouge\" style=\"color: rgb(93, 93, 93); font-family: proxima-nova, Helvetica, Arial, sans-serif;\"><div class=\"highlight\"><pre class=\"highlight\" style=\"font-family: monospace, monospace; font-size: 1em; margin-top: 20px; margin-bottom: 20px; white-space: pre-wrap; padding: 15px; background: rgb(244, 244, 244); max-width: 900px; color: rgb(61, 61, 61);\"><code style=\"font-family: monospace, monospace; font-size: 1em; display: inline-block; white-space: pre; background: none; padding: 0px;\"><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">OKTAAUDIENCE</span><span class=\"o\">=</span>api://default\r\n<span class=\"nv\" style=\"color: rgb(17, 93, 139);\">OKTAISSUER</span><span class=\"o\">=</span>\r\n<span class=\"nv\" style=\"color: rgb(17, 93, 139);\">SCOPE</span><span class=\"o\">=</span>\r\n<span class=\"nv\" style=\"color: rgb(17, 93, 139);\">OKTACLIENTID</span><span class=\"o\">=</span>\r\n<span class=\"nv\" style=\"color: rgb(17, 93, 139);\">OKTASECRET</span><span class=\"o\">=</span>\r\n</code></pre></div></div><p style=\"margin: 20px 0px; color: rgb(93, 93, 93); font-family: proxima-nova, Helvetica, Arial, sans-serif;\">and a&nbsp;<code class=\"language-plaintext highlighter-rouge\" style=\"font-family: monospace, monospace; font-size: 1em; display: inline-block; white-space: pre; padding: 0px 5px; background: rgb(244, 244, 244); line-height: 24px;\">.env</code>&nbsp;file where we’ll fill in our actual details from our Okta account later (it will be ignored by Git so it won’t end up in our repository).</p><p style=\"margin: 20px 0px; color: rgb(93, 93, 93); font-family: proxima-nova, Helvetica, Arial, sans-serif;\">We’ll need a&nbsp;<code class=\"language-plaintext highlighter-rouge\" style=\"font-family: monospace, monospace; font-size: 1em; display: inline-block; white-space: pre; padding: 0px 5px; background: rgb(244, 244, 244); line-height: 24px;\">bootstrap.php</code>&nbsp;file which loads our environment variables (later it will also do some additional bootstrapping for our project).</p><p style=\"margin: 20px 0px; color: rgb(93, 93, 93); font-family: proxima-nova, Helvetica, Arial, sans-serif;\"><code class=\"language-plaintext highlighter-rouge\" style=\"font-family: monospace, monospace; font-size: 1em; display: inline-block; white-space: pre; padding: 0px 5px; background: rgb(244, 244, 244); line-height: 24px;\">bootstrap.php</code></p><div class=\"language-php highlighter-rouge\" style=\"color: rgb(93, 93, 93); font-family: proxima-nova, Helvetica, Arial, sans-serif;\"><div class=\"highlight\"><pre class=\"highlight\" style=\"font-family: monospace, monospace; font-size: 1em; margin-top: 20px; margin-bottom: 20px; white-space: pre-wrap; padding: 15px; background: rgb(244, 244, 244); max-width: 900px; color: rgb(61, 61, 61);\"><code style=\"font-family: monospace, monospace; font-size: 1em; display: inline-block; white-space: pre; background: none; padding: 0px;\"><span class=\"cp\" style=\"color: rgb(154, 154, 154); font-style: italic;\">&lt;?php</span>\r\n<span class=\"k\" style=\"color: rgb(76, 191, 156);\">require</span> <span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'vendor/autoload.php\'</span><span class=\"p\">;</span>\r\n<span class=\"kn\" style=\"color: rgb(76, 191, 156);\">use</span> <span class=\"nc\" style=\"color: rgb(17, 93, 139);\">Dotenv\\Dotenv</span><span class=\"p\">;</span>\r\n\r\n<span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$dotenv</span> <span class=\"o\">=</span> <span class=\"k\" style=\"color: rgb(76, 191, 156);\">new</span> <span class=\"nc\" style=\"color: rgb(17, 93, 139);\">DotEnv</span><span class=\"p\">(</span><span class=\"k\" style=\"color: rgb(76, 191, 156);\">__DIR__</span><span class=\"p\">);</span>\r\n<span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$dotenv</span><span class=\"o\">-&gt;</span><span class=\"nf\" style=\"color: rgb(17, 93, 139);\">load</span><span class=\"p\">();</span>\r\n\r\n<span class=\"c1\" style=\"color: rgb(154, 154, 154); font-style: italic;\">// test code, should output:</span>\r\n<span class=\"c1\" style=\"color: rgb(154, 154, 154); font-style: italic;\">// api://default</span>\r\n<span class=\"c1\" style=\"color: rgb(154, 154, 154); font-style: italic;\">// when you run $ php bootstrap.php</span>\r\n<span class=\"k\" style=\"color: rgb(76, 191, 156);\">echo</span> <span class=\"nb\" style=\"color: rgb(17, 93, 139);\">getenv</span><span class=\"p\">(</span><span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'OKTAAUDIENCE\'</span><span class=\"p\">);</span>\r\n</code></pre></div></div><h2 id=\"configure-a-database-for-your-php-rest-api\" style=\"margin: 60px 0px 10px; font-size: 38px; line-height: 54px; font-family: proxima-nova, Helvetica, sans-serif; color: rgb(93, 93, 93);\"><a href=\"https://developer.okta.com/blog/2019/03/08/simple-rest-api-php#configure-a-database-for-your-php-rest-api\" style=\"color: rgb(61, 61, 61); transition: color 0.4s ease 0s; position: relative;\">Configure a Database for Your PHP REST API</a></h2><p style=\"margin: 20px 0px; color: rgb(93, 93, 93); font-family: proxima-nova, Helvetica, Arial, sans-serif;\">We will use MySQL to power our simple API. We’ll create a new database and user for our app:</p><div class=\"language-sql highlighter-rouge\" style=\"color: rgb(93, 93, 93); font-family: proxima-nova, Helvetica, Arial, sans-serif;\"><div class=\"highlight\"><pre class=\"highlight\" style=\"font-family: monospace, monospace; font-size: 1em; margin-top: 20px; margin-bottom: 20px; white-space: pre-wrap; padding: 15px; background: rgb(244, 244, 244); max-width: 900px; color: rgb(61, 61, 61);\"><code style=\"font-family: monospace, monospace; font-size: 1em; display: inline-block; white-space: pre; background: none; padding: 0px;\"><span class=\"n\" style=\"color: rgb(17, 93, 139);\">mysql</span> <span class=\"o\">-</span><span class=\"n\" style=\"color: rgb(17, 93, 139);\">uroot</span> <span class=\"o\">-</span><span class=\"n\" style=\"color: rgb(17, 93, 139);\">p</span>\r\n<span class=\"k\" style=\"color: rgb(76, 191, 156);\">CREATE</span> <span class=\"k\" style=\"color: rgb(76, 191, 156);\">DATABASE</span> <span class=\"n\" style=\"color: rgb(17, 93, 139);\">api_example</span> <span class=\"nb\" style=\"color: rgb(17, 93, 139);\">CHARACTER</span> <span class=\"k\" style=\"color: rgb(76, 191, 156);\">SET</span> <span class=\"n\" style=\"color: rgb(17, 93, 139);\">utf8mb4</span> <span class=\"k\" style=\"color: rgb(76, 191, 156);\">COLLATE</span> <span class=\"n\" style=\"color: rgb(17, 93, 139);\">utf8mb4_unicode_ci</span><span class=\"p\">;</span>\r\n<span class=\"k\" style=\"color: rgb(76, 191, 156);\">CREATE</span> <span class=\"k\" style=\"color: rgb(76, 191, 156);\">USER</span> <span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'api_user\'</span><span class=\"o\">@</span><span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'localhost\'</span> <span class=\"n\" style=\"color: rgb(17, 93, 139);\">identified</span> <span class=\"k\" style=\"color: rgb(76, 191, 156);\">by</span> <span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'api_password\'</span><span class=\"p\">;</span>\r\n<span class=\"k\" style=\"color: rgb(76, 191, 156);\">GRANT</span> <span class=\"k\" style=\"color: rgb(76, 191, 156);\">ALL</span> <span class=\"k\" style=\"color: rgb(76, 191, 156);\">on</span> <span class=\"n\" style=\"color: rgb(17, 93, 139);\">api_example</span><span class=\"p\">.</span><span class=\"o\">*</span> <span class=\"k\" style=\"color: rgb(76, 191, 156);\">to</span> <span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'api_user\'</span><span class=\"o\">@</span><span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'localhost\'</span><span class=\"p\">;</span>\r\n<span class=\"n\" style=\"color: rgb(17, 93, 139);\">quit</span>\r\n</code></pre></div></div><p style=\"margin: 20px 0px; color: rgb(93, 93, 93); font-family: proxima-nova, Helvetica, Arial, sans-serif;\">Our rest API will deal with just a single entity: Person, with the following fields:&nbsp;<code class=\"language-plaintext highlighter-rouge\" style=\"font-family: monospace, monospace; font-size: 1em; display: inline-block; white-space: pre; padding: 0px 5px; background: rgb(244, 244, 244); line-height: 24px;\">id</code>,&nbsp;<code class=\"language-plaintext highlighter-rouge\" style=\"font-family: monospace, monospace; font-size: 1em; display: inline-block; white-space: pre; padding: 0px 5px; background: rgb(244, 244, 244); line-height: 24px;\">firstname</code>,&nbsp;<code class=\"language-plaintext highlighter-rouge\" style=\"font-family: monospace, monospace; font-size: 1em; display: inline-block; white-space: pre; padding: 0px 5px; background: rgb(244, 244, 244); line-height: 24px;\">lastname</code>,&nbsp;<code class=\"language-plaintext highlighter-rouge\" style=\"font-family: monospace, monospace; font-size: 1em; display: inline-block; white-space: pre; padding: 0px 5px; background: rgb(244, 244, 244); line-height: 24px;\">firstparent_id</code>,&nbsp;<code class=\"language-plaintext highlighter-rouge\" style=\"font-family: monospace, monospace; font-size: 1em; display: inline-block; white-space: pre; padding: 0px 5px; background: rgb(244, 244, 244); line-height: 24px;\">secondparent_id</code>. It will allow us to define people and up to two parents for each person (linking to other records in our database). Let’s create the database table in MySQL:</p><div class=\"language-sql highlighter-rouge\" style=\"color: rgb(93, 93, 93); font-family: proxima-nova, Helvetica, Arial, sans-serif;\"><div class=\"highlight\"><pre class=\"highlight\" style=\"font-family: monospace, monospace; font-size: 1em; margin-top: 20px; margin-bottom: 20px; white-space: pre-wrap; padding: 15px; background: rgb(244, 244, 244); max-width: 900px; color: rgb(61, 61, 61);\"><code style=\"font-family: monospace, monospace; font-size: 1em; display: inline-block; white-space: pre; background: none; padding: 0px;\"><span class=\"n\" style=\"color: rgb(17, 93, 139);\">mysql</span> <span class=\"o\">-</span><span class=\"n\" style=\"color: rgb(17, 93, 139);\">uapi_user</span> <span class=\"o\">-</span><span class=\"n\" style=\"color: rgb(17, 93, 139);\">papi_password</span> <span class=\"n\" style=\"color: rgb(17, 93, 139);\">api_example</span>\r\n\r\n<span class=\"k\" style=\"color: rgb(76, 191, 156);\">CREATE</span> <span class=\"k\" style=\"color: rgb(76, 191, 156);\">TABLE</span> <span class=\"n\" style=\"color: rgb(17, 93, 139);\">person</span> <span class=\"p\">(</span>\r\n    <span class=\"n\" style=\"color: rgb(17, 93, 139);\">id</span> <span class=\"nb\" style=\"color: rgb(17, 93, 139);\">INT</span> <span class=\"k\" style=\"color: rgb(76, 191, 156);\">NOT</span> <span class=\"k\" style=\"color: rgb(76, 191, 156);\">NULL</span> <span class=\"n\" style=\"color: rgb(17, 93, 139);\">AUTO_INCREMENT</span><span class=\"p\">,</span>\r\n    <span class=\"n\" style=\"color: rgb(17, 93, 139);\">firstname</span> <span class=\"nb\" style=\"color: rgb(17, 93, 139);\">VARCHAR</span><span class=\"p\">(</span><span class=\"mi\" style=\"color: rgb(153, 15, 105);\">100</span><span class=\"p\">)</span> <span class=\"k\" style=\"color: rgb(76, 191, 156);\">NOT</span> <span class=\"k\" style=\"color: rgb(76, 191, 156);\">NULL</span><span class=\"p\">,</span>\r\n    <span class=\"n\" style=\"color: rgb(17, 93, 139);\">lastname</span> <span class=\"nb\" style=\"color: rgb(17, 93, 139);\">VARCHAR</span><span class=\"p\">(</span><span class=\"mi\" style=\"color: rgb(153, 15, 105);\">100</span><span class=\"p\">)</span> <span class=\"k\" style=\"color: rgb(76, 191, 156);\">NOT</span> <span class=\"k\" style=\"color: rgb(76, 191, 156);\">NULL</span><span class=\"p\">,</span>\r\n    <span class=\"n\" style=\"color: rgb(17, 93, 139);\">firstparent_id</span> <span class=\"nb\" style=\"color: rgb(17, 93, 139);\">INT</span> <span class=\"k\" style=\"color: rgb(76, 191, 156);\">DEFAULT</span> <span class=\"k\" style=\"color: rgb(76, 191, 156);\">NULL</span><span class=\"p\">,</span>\r\n    <span class=\"n\" style=\"color: rgb(17, 93, 139);\">secondparent_id</span> <span class=\"nb\" style=\"color: rgb(17, 93, 139);\">INT</span> <span class=\"k\" style=\"color: rgb(76, 191, 156);\">DEFAULT</span> <span class=\"k\" style=\"color: rgb(76, 191, 156);\">NULL</span><span class=\"p\">,</span>\r\n    <span class=\"k\" style=\"color: rgb(76, 191, 156);\">PRIMARY</span> <span class=\"k\" style=\"color: rgb(76, 191, 156);\">KEY</span> <span class=\"p\">(</span><span class=\"n\" style=\"color: rgb(17, 93, 139);\">id</span><span class=\"p\">),</span>\r\n    <span class=\"k\" style=\"color: rgb(76, 191, 156);\">FOREIGN</span> <span class=\"k\" style=\"color: rgb(76, 191, 156);\">KEY</span> <span class=\"p\">(</span><span class=\"n\" style=\"color: rgb(17, 93, 139);\">firstparent_id</span><span class=\"p\">)</span>\r\n        <span class=\"k\" style=\"color: rgb(76, 191, 156);\">REFERENCES</span> <span class=\"n\" style=\"color: rgb(17, 93, 139);\">person</span><span class=\"p\">(</span><span class=\"n\" style=\"color: rgb(17, 93, 139);\">id</span><span class=\"p\">)</span>\r\n        <span class=\"k\" style=\"color: rgb(76, 191, 156);\">ON</span> <span class=\"k\" style=\"color: rgb(76, 191, 156);\">DELETE</span> <span class=\"k\" style=\"color: rgb(76, 191, 156);\">SET</span> <span class=\"k\" style=\"color: rgb(76, 191, 156);\">NULL</span><span class=\"p\">,</span>\r\n    <span class=\"k\" style=\"color: rgb(76, 191, 156);\">FOREIGN</span> <span class=\"k\" style=\"color: rgb(76, 191, 156);\">KEY</span> <span class=\"p\">(</span><span class=\"n\" style=\"color: rgb(17, 93, 139);\">secondparent_id</span><span class=\"p\">)</span>\r\n        <span class=\"k\" style=\"color: rgb(76, 191, 156);\">REFERENCES</span> <span class=\"n\" style=\"color: rgb(17, 93, 139);\">person</span><span class=\"p\">(</span><span class=\"n\" style=\"color: rgb(17, 93, 139);\">id</span><span class=\"p\">)</span>\r\n        <span class=\"k\" style=\"color: rgb(76, 191, 156);\">ON</span> <span class=\"k\" style=\"color: rgb(76, 191, 156);\">DELETE</span> <span class=\"k\" style=\"color: rgb(76, 191, 156);\">SET</span> <span class=\"k\" style=\"color: rgb(76, 191, 156);\">NULL</span>\r\n<span class=\"p\">)</span> <span class=\"n\" style=\"color: rgb(17, 93, 139);\">ENGINE</span><span class=\"o\">=</span><span class=\"n\" style=\"color: rgb(17, 93, 139);\">INNODB</span><span class=\"p\">;</span>\r\n</code></pre></div></div><p style=\"margin: 20px 0px; color: rgb(93, 93, 93); font-family: proxima-nova, Helvetica, Arial, sans-serif;\">We’ll add the database connection variables to our&nbsp;<code class=\"language-plaintext highlighter-rouge\" style=\"font-family: monospace, monospace; font-size: 1em; display: inline-block; white-space: pre; padding: 0px 5px; background: rgb(244, 244, 244); line-height: 24px;\">.env.example</code>&nbsp;file:</p><p style=\"margin: 20px 0px; color: rgb(93, 93, 93); font-family: proxima-nova, Helvetica, Arial, sans-serif;\"><code class=\"language-plaintext highlighter-rouge\" style=\"font-family: monospace, monospace; font-size: 1em; display: inline-block; white-space: pre; padding: 0px 5px; background: rgb(244, 244, 244); line-height: 24px;\">.env.example</code></p><div class=\"language-bash highlighter-rouge\" style=\"color: rgb(93, 93, 93); font-family: proxima-nova, Helvetica, Arial, sans-serif;\"><div class=\"highlight\"><pre class=\"highlight\" style=\"font-family: monospace, monospace; font-size: 1em; margin-top: 20px; margin-bottom: 20px; white-space: pre-wrap; padding: 15px; background: rgb(244, 244, 244); max-width: 900px; color: rgb(61, 61, 61);\"><code style=\"font-family: monospace, monospace; font-size: 1em; display: inline-block; white-space: pre; background: none; padding: 0px;\"><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">DB_HOST</span><span class=\"o\">=</span>localhost\r\n<span class=\"nv\" style=\"color: rgb(17, 93, 139);\">DB_PORT</span><span class=\"o\">=</span>3306\r\n<span class=\"nv\" style=\"color: rgb(17, 93, 139);\">DB_DATABASE</span><span class=\"o\">=</span>\r\n<span class=\"nv\" style=\"color: rgb(17, 93, 139);\">DB_USERNAME</span><span class=\"o\">=</span>\r\n<span class=\"nv\" style=\"color: rgb(17, 93, 139);\">DB_PASSWORD</span><span class=\"o\">=</span>\r\n</code></pre></div></div><p style=\"margin: 20px 0px; color: rgb(93, 93, 93); font-family: proxima-nova, Helvetica, Arial, sans-serif;\">Then we’ll input our local credentials in the .env file (which is not stored in the repo, remember?):</p><p style=\"margin: 20px 0px; color: rgb(93, 93, 93); font-family: proxima-nova, Helvetica, Arial, sans-serif;\"><code class=\"language-plaintext highlighter-rouge\" style=\"font-family: monospace, monospace; font-size: 1em; display: inline-block; white-space: pre; padding: 0px 5px; background: rgb(244, 244, 244); line-height: 24px;\">.env</code></p><div class=\"language-bash highlighter-rouge\" style=\"color: rgb(93, 93, 93); font-family: proxima-nova, Helvetica, Arial, sans-serif;\"><div class=\"highlight\"><pre class=\"highlight\" style=\"font-family: monospace, monospace; font-size: 1em; margin-top: 20px; margin-bottom: 20px; white-space: pre-wrap; padding: 15px; background: rgb(244, 244, 244); max-width: 900px; color: rgb(61, 61, 61);\"><code style=\"font-family: monospace, monospace; font-size: 1em; display: inline-block; white-space: pre; background: none; padding: 0px;\"><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">DB_HOST</span><span class=\"o\">=</span>localhost\r\n<span class=\"nv\" style=\"color: rgb(17, 93, 139);\">DB_PORT</span><span class=\"o\">=</span>3306\r\n<span class=\"nv\" style=\"color: rgb(17, 93, 139);\">DB_DATABASE</span><span class=\"o\">=</span>api_example\r\n<span class=\"nv\" style=\"color: rgb(17, 93, 139);\">DB_USERNAME</span><span class=\"o\">=</span>api_user\r\n<span class=\"nv\" style=\"color: rgb(17, 93, 139);\">DB_PASSWORD</span><span class=\"o\">=</span>api_password\r\n</code></pre></div></div><p style=\"margin: 20px 0px; color: rgb(93, 93, 93); font-family: proxima-nova, Helvetica, Arial, sans-serif;\">We can now create a class to hold our database connection and add the initialization of the connection to our bootstrap.php file:</p><p style=\"margin: 20px 0px; color: rgb(93, 93, 93); font-family: proxima-nova, Helvetica, Arial, sans-serif;\"><code class=\"language-plaintext highlighter-rouge\" style=\"font-family: monospace, monospace; font-size: 1em; display: inline-block; white-space: pre; padding: 0px 5px; background: rgb(244, 244, 244); line-height: 24px;\">src/System/DatabaseConnector.php</code></p><div class=\"language-php highlighter-rouge\" style=\"color: rgb(93, 93, 93); font-family: proxima-nova, Helvetica, Arial, sans-serif;\"><div class=\"highlight\"><pre class=\"highlight\" style=\"font-family: monospace, monospace; font-size: 1em; margin-top: 20px; margin-bottom: 20px; white-space: pre-wrap; padding: 15px; background: rgb(244, 244, 244); max-width: 900px; color: rgb(61, 61, 61);\"><code style=\"font-family: monospace, monospace; font-size: 1em; display: inline-block; white-space: pre; background: none; padding: 0px;\"><span class=\"cp\" style=\"color: rgb(154, 154, 154); font-style: italic;\">&lt;?php</span>\r\n<span class=\"kn\" style=\"color: rgb(76, 191, 156);\">namespace</span> <span class=\"nn\" style=\"color: rgb(76, 191, 156);\">Src\\System</span><span class=\"p\">;</span>\r\n\r\n<span class=\"kd\" style=\"color: rgb(76, 191, 156);\">class</span> <span class=\"nc\" style=\"color: rgb(17, 93, 139);\">DatabaseConnector</span> <span class=\"p\">{</span>\r\n\r\n    <span class=\"k\" style=\"color: rgb(76, 191, 156);\">private</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$dbConnection</span> <span class=\"o\">=</span> <span class=\"kc\" style=\"color: rgb(76, 191, 156);\">null</span><span class=\"p\">;</span>\r\n\r\n    <span class=\"k\" style=\"color: rgb(76, 191, 156);\">public</span> <span class=\"k\" style=\"color: rgb(76, 191, 156);\">function</span> <span class=\"n\" style=\"color: rgb(17, 93, 139);\">__construct</span><span class=\"p\">()</span>\r\n    <span class=\"p\">{</span>\r\n        <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$host</span> <span class=\"o\">=</span> <span class=\"nb\" style=\"color: rgb(17, 93, 139);\">getenv</span><span class=\"p\">(</span><span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'DB_HOST\'</span><span class=\"p\">);</span>\r\n        <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$port</span> <span class=\"o\">=</span> <span class=\"nb\" style=\"color: rgb(17, 93, 139);\">getenv</span><span class=\"p\">(</span><span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'DB_PORT\'</span><span class=\"p\">);</span>\r\n        <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$db</span>   <span class=\"o\">=</span> <span class=\"nb\" style=\"color: rgb(17, 93, 139);\">getenv</span><span class=\"p\">(</span><span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'DB_DATABASE\'</span><span class=\"p\">);</span>\r\n        <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$user</span> <span class=\"o\">=</span> <span class=\"nb\" style=\"color: rgb(17, 93, 139);\">getenv</span><span class=\"p\">(</span><span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'DB_USERNAME\'</span><span class=\"p\">);</span>\r\n        <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$pass</span> <span class=\"o\">=</span> <span class=\"nb\" style=\"color: rgb(17, 93, 139);\">getenv</span><span class=\"p\">(</span><span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'DB_PASSWORD\'</span><span class=\"p\">);</span>\r\n\r\n        <span class=\"k\" style=\"color: rgb(76, 191, 156);\">try</span> <span class=\"p\">{</span>\r\n            <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$this</span><span class=\"o\">-&gt;</span><span class=\"n\" style=\"color: rgb(17, 93, 139);\">dbConnection</span> <span class=\"o\">=</span> <span class=\"k\" style=\"color: rgb(76, 191, 156);\">new</span> <span class=\"err\">\\</span><span class=\"nf\" style=\"color: rgb(17, 93, 139);\">PDO</span><span class=\"p\">(</span>\r\n                <span class=\"s2\" style=\"color: rgb(226, 40, 102);\">\"mysql:host=</span><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$host</span><span class=\"s2\" style=\"color: rgb(226, 40, 102);\">;port=</span><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$port</span><span class=\"s2\" style=\"color: rgb(226, 40, 102);\">;charset=utf8mb4;dbname=</span><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$db</span><span class=\"s2\" style=\"color: rgb(226, 40, 102);\">\"</span><span class=\"p\">,</span>\r\n                <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$user</span><span class=\"p\">,</span>\r\n                <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$pass</span>\r\n            <span class=\"p\">);</span>\r\n        <span class=\"p\">}</span> <span class=\"k\" style=\"color: rgb(76, 191, 156);\">catch</span> <span class=\"p\">(</span><span class=\"err\">\\</span><span class=\"nc\" style=\"color: rgb(17, 93, 139);\">PDOException</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$e</span><span class=\"p\">)</span> <span class=\"p\">{</span>\r\n            <span class=\"k\" style=\"color: rgb(76, 191, 156);\">exit</span><span class=\"p\">(</span><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$e</span><span class=\"o\">-&gt;</span><span class=\"nf\" style=\"color: rgb(17, 93, 139);\">getMessage</span><span class=\"p\">());</span>\r\n        <span class=\"p\">}</span>\r\n    <span class=\"p\">}</span>\r\n\r\n    <span class=\"k\" style=\"color: rgb(76, 191, 156);\">public</span> <span class=\"k\" style=\"color: rgb(76, 191, 156);\">function</span> <span class=\"n\" style=\"color: rgb(17, 93, 139);\">getConnection</span><span class=\"p\">()</span>\r\n    <span class=\"p\">{</span>\r\n        <span class=\"k\" style=\"color: rgb(76, 191, 156);\">return</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$this</span><span class=\"o\">-&gt;</span><span class=\"n\" style=\"color: rgb(17, 93, 139);\">dbConnection</span><span class=\"p\">;</span>\r\n    <span class=\"p\">}</span>\r\n<span class=\"p\">}</span>\r\n</code></pre></div></div><p style=\"margin: 20px 0px; color: rgb(93, 93, 93); font-family: proxima-nova, Helvetica, Arial, sans-serif;\"><code class=\"language-plaintext highlighter-rouge\" style=\"font-family: monospace, monospace; font-size: 1em; display: inline-block; white-space: pre; padding: 0px 5px; background: rgb(244, 244, 244); line-height: 24px;\">bootstrap.php</code>&nbsp;(full version)</p><div class=\"language-php highlighter-rouge\" style=\"color: rgb(93, 93, 93); font-family: proxima-nova, Helvetica, Arial, sans-serif;\"><div class=\"highlight\"><pre class=\"highlight\" style=\"font-family: monospace, monospace; font-size: 1em; margin-top: 20px; margin-bottom: 20px; white-space: pre-wrap; padding: 15px; background: rgb(244, 244, 244); max-width: 900px; color: rgb(61, 61, 61);\"><code style=\"font-family: monospace, monospace; font-size: 1em; display: inline-block; white-space: pre; background: none; padding: 0px;\"><span class=\"cp\" style=\"color: rgb(154, 154, 154); font-style: italic;\">&lt;?php</span>\r\n<span class=\"k\" style=\"color: rgb(76, 191, 156);\">require</span> <span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'vendor/autoload.php\'</span><span class=\"p\">;</span>\r\n<span class=\"kn\" style=\"color: rgb(76, 191, 156);\">use</span> <span class=\"nc\" style=\"color: rgb(17, 93, 139);\">Dotenv\\Dotenv</span><span class=\"p\">;</span>\r\n\r\n<span class=\"kn\" style=\"color: rgb(76, 191, 156);\">use</span> <span class=\"nc\" style=\"color: rgb(17, 93, 139);\">Src\\System\\DatabaseConnector</span><span class=\"p\">;</span>\r\n\r\n<span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$dotenv</span> <span class=\"o\">=</span> <span class=\"k\" style=\"color: rgb(76, 191, 156);\">new</span> <span class=\"nc\" style=\"color: rgb(17, 93, 139);\">DotEnv</span><span class=\"p\">(</span><span class=\"k\" style=\"color: rgb(76, 191, 156);\">__DIR__</span><span class=\"p\">);</span>\r\n<span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$dotenv</span><span class=\"o\">-&gt;</span><span class=\"nf\" style=\"color: rgb(17, 93, 139);\">load</span><span class=\"p\">();</span>\r\n\r\n<span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$dbConnection</span> <span class=\"o\">=</span> <span class=\"p\">(</span><span class=\"k\" style=\"color: rgb(76, 191, 156);\">new</span> <span class=\"nc\" style=\"color: rgb(17, 93, 139);\">DatabaseConnector</span><span class=\"p\">())</span><span class=\"o\">-&gt;</span><span class=\"nf\" style=\"color: rgb(17, 93, 139);\">getConnection</span><span class=\"p\">();</span>\r\n</code></pre></div></div><p style=\"margin: 20px 0px; color: rgb(93, 93, 93); font-family: proxima-nova, Helvetica, Arial, sans-serif;\">Let’s create a&nbsp;<code class=\"language-plaintext highlighter-rouge\" style=\"font-family: monospace, monospace; font-size: 1em; display: inline-block; white-space: pre; padding: 0px 5px; background: rgb(244, 244, 244); line-height: 24px;\">dbseed.php</code>&nbsp;file which creates our&nbsp;<code class=\"language-plaintext highlighter-rouge\" style=\"font-family: monospace, monospace; font-size: 1em; display: inline-block; white-space: pre; padding: 0px 5px; background: rgb(244, 244, 244); line-height: 24px;\">Person</code>&nbsp;table and inserts some records in it for testing:</p><p style=\"margin: 20px 0px; color: rgb(93, 93, 93); font-family: proxima-nova, Helvetica, Arial, sans-serif;\"><code class=\"language-plaintext highlighter-rouge\" style=\"font-family: monospace, monospace; font-size: 1em; display: inline-block; white-space: pre; padding: 0px 5px; background: rgb(244, 244, 244); line-height: 24px;\">dbseed.php</code></p><div class=\"language-php highlighter-rouge\" style=\"color: rgb(93, 93, 93); font-family: proxima-nova, Helvetica, Arial, sans-serif;\"><div class=\"highlight\"><pre class=\"highlight\" style=\"font-family: monospace, monospace; font-size: 1em; margin-top: 20px; margin-bottom: 20px; white-space: pre-wrap; padding: 15px; background: rgb(244, 244, 244); max-width: 900px; color: rgb(61, 61, 61);\"><code style=\"font-family: monospace, monospace; font-size: 1em; display: inline-block; white-space: pre; background: none; padding: 0px;\"><span class=\"cp\" style=\"color: rgb(154, 154, 154); font-style: italic;\">&lt;?php</span>\r\n<span class=\"k\" style=\"color: rgb(76, 191, 156);\">require</span> <span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'bootstrap.php\'</span><span class=\"p\">;</span>\r\n\r\n<span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$statement</span> <span class=\"o\">=</span> <span class=\"sh\" style=\"color: rgb(226, 40, 102);\">&lt;&lt;&lt;EOS\r\n    CREATE TABLE IF NOT EXISTS person (\r\n        id INT NOT NULL AUTO_INCREMENT,\r\n        firstname VARCHAR(100) NOT NULL,\r\n        lastname VARCHAR(100) NOT NULL,\r\n        firstparent_id INT DEFAULT NULL,\r\n        secondparent_id INT DEFAULT NULL,\r\n        PRIMARY KEY (id),\r\n        FOREIGN KEY (firstparent_id)\r\n            REFERENCES person(id)\r\n            ON DELETE SET NULL,\r\n        FOREIGN KEY (secondparent_id)\r\n            REFERENCES person(id)\r\n            ON DELETE SET NULL\r\n    ) ENGINE=INNODB;\r\n\r\n    INSERT INTO person\r\n        (id, firstname, lastname, firstparent_id, secondparent_id)\r\n    VALUES\r\n        (1, \'Krasimir\', \'Hristozov\', null, null),\r\n        (2, \'Maria\', \'Hristozova\', null, null),\r\n        (3, \'Masha\', \'Hristozova\', 1, 2),\r\n        (4, \'Jane\', \'Smith\', null, null),\r\n        (5, \'John\', \'Smith\', null, null),\r\n        (6, \'Richard\', \'Smith\', 4, 5),\r\n        (7, \'Donna\', \'Smith\', 4, 5),\r\n        (8, \'Josh\', \'Harrelson\', null, null),\r\n        (9, \'Anna\', \'Harrelson\', 7, 8);\r\nEOS;</span>\r\n\r\n<span class=\"k\" style=\"color: rgb(76, 191, 156);\">try</span> <span class=\"p\">{</span>\r\n    <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$createTable</span> <span class=\"o\">=</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$dbConnection</span><span class=\"o\">-&gt;</span><span class=\"nb\" style=\"color: rgb(17, 93, 139);\">exec</span><span class=\"p\">(</span><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$statement</span><span class=\"p\">);</span>\r\n    <span class=\"k\" style=\"color: rgb(76, 191, 156);\">echo</span> <span class=\"s2\" style=\"color: rgb(226, 40, 102);\">\"Success!</span><span class=\"se\" style=\"color: rgb(153, 15, 105);\">\\n</span><span class=\"s2\" style=\"color: rgb(226, 40, 102);\">\"</span><span class=\"p\">;</span>\r\n<span class=\"p\">}</span> <span class=\"k\" style=\"color: rgb(76, 191, 156);\">catch</span> <span class=\"p\">(</span><span class=\"err\">\\</span><span class=\"nc\" style=\"color: rgb(17, 93, 139);\">PDOException</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$e</span><span class=\"p\">)</span> <span class=\"p\">{</span>\r\n    <span class=\"k\" style=\"color: rgb(76, 191, 156);\">exit</span><span class=\"p\">(</span><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$e</span><span class=\"o\">-&gt;</span><span class=\"nf\" style=\"color: rgb(17, 93, 139);\">getMessage</span><span class=\"p\">());</span>\r\n<span class=\"p\">}</span>\r\n</code></pre></div></div><p style=\"margin: 20px 0px; color: rgb(93, 93, 93); font-family: proxima-nova, Helvetica, Arial, sans-serif;\">Our database is all set! If you want to reset it, just drop the&nbsp;<code class=\"language-plaintext highlighter-rouge\" style=\"font-family: monospace, monospace; font-size: 1em; display: inline-block; white-space: pre; padding: 0px 5px; background: rgb(244, 244, 244); line-height: 24px;\">person</code>&nbsp;table in MySQL and then run&nbsp;<code class=\"language-plaintext highlighter-rouge\" style=\"font-family: monospace, monospace; font-size: 1em; display: inline-block; white-space: pre; padding: 0px 5px; background: rgb(244, 244, 244); line-height: 24px;\">php dbseed.php</code>&nbsp;(I didn’t add the drop statement to the seeder as a precaution against running it by mistake).</p><h2 id=\"add-a-gateway-class-for-the-person-table\" style=\"margin: 60px 0px 10px; font-size: 38px; line-height: 54px; font-family: proxima-nova, Helvetica, sans-serif; color: rgb(93, 93, 93);\"><a href=\"https://developer.okta.com/blog/2019/03/08/simple-rest-api-php#add-a-gateway-class-for-the-person-table\" style=\"color: rgb(61, 61, 61); transition: color 0.4s ease 0s; position: relative;\">Add a Gateway Class for the Person Table</a></h2><p style=\"margin: 20px 0px; color: rgb(93, 93, 93); font-family: proxima-nova, Helvetica, Arial, sans-serif;\">There are many patterns for working with databases in an object-oriented context, ranging from simple execution of direct SQL statements when needed (in a procedural way) to complex ORM systems (two of the most popular ORM choices in PHP are Eloquent and Doctrine). For our simple API, it makes sense to use a simple pattern as well so we’ll go with a Table Gateway. We’ll even skip creating a&nbsp;<code class=\"language-plaintext highlighter-rouge\" style=\"font-family: monospace, monospace; font-size: 1em; display: inline-block; white-space: pre; padding: 0px 5px; background: rgb(244, 244, 244); line-height: 24px;\">Person</code>&nbsp;class (as the classical pattern would require) and just go with the&nbsp;<code class=\"language-plaintext highlighter-rouge\" style=\"font-family: monospace, monospace; font-size: 1em; display: inline-block; white-space: pre; padding: 0px 5px; background: rgb(244, 244, 244); line-height: 24px;\">PersonGateway</code>&nbsp;class. We’ll implement methods to return all records, return a specific person and add/update/delete a person.</p><p style=\"margin: 20px 0px; color: rgb(93, 93, 93); font-family: proxima-nova, Helvetica, Arial, sans-serif;\"><code class=\"language-plaintext highlighter-rouge\" style=\"font-family: monospace, monospace; font-size: 1em; display: inline-block; white-space: pre; padding: 0px 5px; background: rgb(244, 244, 244); line-height: 24px;\">src/TableGateways/PersonGateway.php</code></p><div class=\"language-php highlighter-rouge\" style=\"color: rgb(93, 93, 93); font-family: proxima-nova, Helvetica, Arial, sans-serif;\"><div class=\"highlight\"><pre class=\"highlight\" style=\"font-family: monospace, monospace; font-size: 1em; margin-top: 20px; margin-bottom: 20px; white-space: pre-wrap; padding: 15px; background: rgb(244, 244, 244); max-width: 900px; color: rgb(61, 61, 61);\"><code style=\"font-family: monospace, monospace; font-size: 1em; display: inline-block; white-space: pre; background: none; padding: 0px;\"><span class=\"cp\" style=\"color: rgb(154, 154, 154); font-style: italic;\">&lt;?php</span>\r\n<span class=\"kn\" style=\"color: rgb(76, 191, 156);\">namespace</span> <span class=\"nn\" style=\"color: rgb(76, 191, 156);\">Src\\TableGateways</span><span class=\"p\">;</span>\r\n\r\n<span class=\"kd\" style=\"color: rgb(76, 191, 156);\">class</span> <span class=\"nc\" style=\"color: rgb(17, 93, 139);\">PersonGateway</span> <span class=\"p\">{</span>\r\n\r\n    <span class=\"k\" style=\"color: rgb(76, 191, 156);\">private</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$db</span> <span class=\"o\">=</span> <span class=\"kc\" style=\"color: rgb(76, 191, 156);\">null</span><span class=\"p\">;</span>\r\n\r\n    <span class=\"k\" style=\"color: rgb(76, 191, 156);\">public</span> <span class=\"k\" style=\"color: rgb(76, 191, 156);\">function</span> <span class=\"n\" style=\"color: rgb(17, 93, 139);\">__construct</span><span class=\"p\">(</span><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$db</span><span class=\"p\">)</span>\r\n    <span class=\"p\">{</span>\r\n        <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$this</span><span class=\"o\">-&gt;</span><span class=\"n\" style=\"color: rgb(17, 93, 139);\">db</span> <span class=\"o\">=</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$db</span><span class=\"p\">;</span>\r\n    <span class=\"p\">}</span>\r\n\r\n    <span class=\"k\" style=\"color: rgb(76, 191, 156);\">public</span> <span class=\"k\" style=\"color: rgb(76, 191, 156);\">function</span> <span class=\"n\" style=\"color: rgb(17, 93, 139);\">findAll</span><span class=\"p\">()</span>\r\n    <span class=\"p\">{</span>\r\n        <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$statement</span> <span class=\"o\">=</span> <span class=\"s2\" style=\"color: rgb(226, 40, 102);\">\"\r\n            SELECT \r\n                id, firstname, lastname, firstparent_id, secondparent_id\r\n            FROM\r\n                person;\r\n        \"</span><span class=\"p\">;</span>\r\n\r\n        <span class=\"k\" style=\"color: rgb(76, 191, 156);\">try</span> <span class=\"p\">{</span>\r\n            <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$statement</span> <span class=\"o\">=</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$this</span><span class=\"o\">-&gt;</span><span class=\"n\" style=\"color: rgb(17, 93, 139);\">db</span><span class=\"o\">-&gt;</span><span class=\"nf\" style=\"color: rgb(17, 93, 139);\">query</span><span class=\"p\">(</span><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$statement</span><span class=\"p\">);</span>\r\n            <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$result</span> <span class=\"o\">=</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$statement</span><span class=\"o\">-&gt;</span><span class=\"nf\" style=\"color: rgb(17, 93, 139);\">fetchAll</span><span class=\"p\">(</span><span class=\"err\">\\</span><span class=\"no\" style=\"color: rgb(17, 93, 139);\">PDO</span><span class=\"o\">::</span><span class=\"no\" style=\"color: rgb(17, 93, 139);\">FETCH_ASSOC</span><span class=\"p\">);</span>\r\n            <span class=\"k\" style=\"color: rgb(76, 191, 156);\">return</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$result</span><span class=\"p\">;</span>\r\n        <span class=\"p\">}</span> <span class=\"k\" style=\"color: rgb(76, 191, 156);\">catch</span> <span class=\"p\">(</span><span class=\"err\">\\</span><span class=\"nc\" style=\"color: rgb(17, 93, 139);\">PDOException</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$e</span><span class=\"p\">)</span> <span class=\"p\">{</span>\r\n            <span class=\"k\" style=\"color: rgb(76, 191, 156);\">exit</span><span class=\"p\">(</span><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$e</span><span class=\"o\">-&gt;</span><span class=\"nf\" style=\"color: rgb(17, 93, 139);\">getMessage</span><span class=\"p\">());</span>\r\n        <span class=\"p\">}</span>\r\n    <span class=\"p\">}</span>\r\n\r\n    <span class=\"k\" style=\"color: rgb(76, 191, 156);\">public</span> <span class=\"k\" style=\"color: rgb(76, 191, 156);\">function</span> <span class=\"n\" style=\"color: rgb(17, 93, 139);\">find</span><span class=\"p\">(</span><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$id</span><span class=\"p\">)</span>\r\n    <span class=\"p\">{</span>\r\n        <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$statement</span> <span class=\"o\">=</span> <span class=\"s2\" style=\"color: rgb(226, 40, 102);\">\"\r\n            SELECT \r\n                id, firstname, lastname, firstparent_id, secondparent_id\r\n            FROM\r\n                person\r\n            WHERE id = ?;\r\n        \"</span><span class=\"p\">;</span>\r\n\r\n        <span class=\"k\" style=\"color: rgb(76, 191, 156);\">try</span> <span class=\"p\">{</span>\r\n            <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$statement</span> <span class=\"o\">=</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$this</span><span class=\"o\">-&gt;</span><span class=\"n\" style=\"color: rgb(17, 93, 139);\">db</span><span class=\"o\">-&gt;</span><span class=\"nf\" style=\"color: rgb(17, 93, 139);\">prepare</span><span class=\"p\">(</span><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$statement</span><span class=\"p\">);</span>\r\n            <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$statement</span><span class=\"o\">-&gt;</span><span class=\"nf\" style=\"color: rgb(17, 93, 139);\">execute</span><span class=\"p\">(</span><span class=\"k\" style=\"color: rgb(76, 191, 156);\">array</span><span class=\"p\">(</span><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$id</span><span class=\"p\">));</span>\r\n            <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$result</span> <span class=\"o\">=</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$statement</span><span class=\"o\">-&gt;</span><span class=\"nf\" style=\"color: rgb(17, 93, 139);\">fetchAll</span><span class=\"p\">(</span><span class=\"err\">\\</span><span class=\"no\" style=\"color: rgb(17, 93, 139);\">PDO</span><span class=\"o\">::</span><span class=\"no\" style=\"color: rgb(17, 93, 139);\">FETCH_ASSOC</span><span class=\"p\">);</span>\r\n            <span class=\"k\" style=\"color: rgb(76, 191, 156);\">return</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$result</span><span class=\"p\">;</span>\r\n        <span class=\"p\">}</span> <span class=\"k\" style=\"color: rgb(76, 191, 156);\">catch</span> <span class=\"p\">(</span><span class=\"err\">\\</span><span class=\"nc\" style=\"color: rgb(17, 93, 139);\">PDOException</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$e</span><span class=\"p\">)</span> <span class=\"p\">{</span>\r\n            <span class=\"k\" style=\"color: rgb(76, 191, 156);\">exit</span><span class=\"p\">(</span><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$e</span><span class=\"o\">-&gt;</span><span class=\"nf\" style=\"color: rgb(17, 93, 139);\">getMessage</span><span class=\"p\">());</span>\r\n        <span class=\"p\">}</span>    \r\n    <span class=\"p\">}</span>\r\n\r\n    <span class=\"k\" style=\"color: rgb(76, 191, 156);\">public</span> <span class=\"k\" style=\"color: rgb(76, 191, 156);\">function</span> <span class=\"n\" style=\"color: rgb(17, 93, 139);\">insert</span><span class=\"p\">(</span><span class=\"kt\" style=\"color: rgb(76, 191, 156);\">Array</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$input</span><span class=\"p\">)</span>\r\n    <span class=\"p\">{</span>\r\n        <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$statement</span> <span class=\"o\">=</span> <span class=\"s2\" style=\"color: rgb(226, 40, 102);\">\"\r\n            INSERT INTO person \r\n                (firstname, lastname, firstparent_id, secondparent_id)\r\n            VALUES\r\n                (:firstname, :lastname, :firstparent_id, :secondparent_id);\r\n        \"</span><span class=\"p\">;</span>\r\n\r\n        <span class=\"k\" style=\"color: rgb(76, 191, 156);\">try</span> <span class=\"p\">{</span>\r\n            <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$statement</span> <span class=\"o\">=</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$this</span><span class=\"o\">-&gt;</span><span class=\"n\" style=\"color: rgb(17, 93, 139);\">db</span><span class=\"o\">-&gt;</span><span class=\"nf\" style=\"color: rgb(17, 93, 139);\">prepare</span><span class=\"p\">(</span><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$statement</span><span class=\"p\">);</span>\r\n            <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$statement</span><span class=\"o\">-&gt;</span><span class=\"nf\" style=\"color: rgb(17, 93, 139);\">execute</span><span class=\"p\">(</span><span class=\"k\" style=\"color: rgb(76, 191, 156);\">array</span><span class=\"p\">(</span>\r\n                <span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'firstname\'</span> <span class=\"o\">=&gt;</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$input</span><span class=\"p\">[</span><span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'firstname\'</span><span class=\"p\">],</span>\r\n                <span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'lastname\'</span>  <span class=\"o\">=&gt;</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$input</span><span class=\"p\">[</span><span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'lastname\'</span><span class=\"p\">],</span>\r\n                <span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'firstparent_id\'</span> <span class=\"o\">=&gt;</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$input</span><span class=\"p\">[</span><span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'firstparent_id\'</span><span class=\"p\">]</span> <span class=\"o\">??</span> <span class=\"kc\" style=\"color: rgb(76, 191, 156);\">null</span><span class=\"p\">,</span>\r\n                <span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'secondparent_id\'</span> <span class=\"o\">=&gt;</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$input</span><span class=\"p\">[</span><span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'secondparent_id\'</span><span class=\"p\">]</span> <span class=\"o\">??</span> <span class=\"kc\" style=\"color: rgb(76, 191, 156);\">null</span><span class=\"p\">,</span>\r\n            <span class=\"p\">));</span>\r\n            <span class=\"k\" style=\"color: rgb(76, 191, 156);\">return</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$statement</span><span class=\"o\">-&gt;</span><span class=\"nf\" style=\"color: rgb(17, 93, 139);\">rowCount</span><span class=\"p\">();</span>\r\n        <span class=\"p\">}</span> <span class=\"k\" style=\"color: rgb(76, 191, 156);\">catch</span> <span class=\"p\">(</span><span class=\"err\">\\</span><span class=\"nc\" style=\"color: rgb(17, 93, 139);\">PDOException</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$e</span><span class=\"p\">)</span> <span class=\"p\">{</span>\r\n            <span class=\"k\" style=\"color: rgb(76, 191, 156);\">exit</span><span class=\"p\">(</span><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$e</span><span class=\"o\">-&gt;</span><span class=\"nf\" style=\"color: rgb(17, 93, 139);\">getMessage</span><span class=\"p\">());</span>\r\n        <span class=\"p\">}</span>    \r\n    <span class=\"p\">}</span>\r\n\r\n    <span class=\"k\" style=\"color: rgb(76, 191, 156);\">public</span> <span class=\"k\" style=\"color: rgb(76, 191, 156);\">function</span> <span class=\"n\" style=\"color: rgb(17, 93, 139);\">update</span><span class=\"p\">(</span><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$id</span><span class=\"p\">,</span> <span class=\"kt\" style=\"color: rgb(76, 191, 156);\">Array</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$input</span><span class=\"p\">)</span>\r\n    <span class=\"p\">{</span>\r\n        <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$statement</span> <span class=\"o\">=</span> <span class=\"s2\" style=\"color: rgb(226, 40, 102);\">\"\r\n            UPDATE person\r\n            SET \r\n                firstname = :firstname,\r\n                lastname  = :lastname,\r\n                firstparent_id = :firstparent_id,\r\n                secondparent_id = :secondparent_id\r\n            WHERE id = :id;\r\n        \"</span><span class=\"p\">;</span>\r\n\r\n        <span class=\"k\" style=\"color: rgb(76, 191, 156);\">try</span> <span class=\"p\">{</span>\r\n            <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$statement</span> <span class=\"o\">=</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$this</span><span class=\"o\">-&gt;</span><span class=\"n\" style=\"color: rgb(17, 93, 139);\">db</span><span class=\"o\">-&gt;</span><span class=\"nf\" style=\"color: rgb(17, 93, 139);\">prepare</span><span class=\"p\">(</span><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$statement</span><span class=\"p\">);</span>\r\n            <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$statement</span><span class=\"o\">-&gt;</span><span class=\"nf\" style=\"color: rgb(17, 93, 139);\">execute</span><span class=\"p\">(</span><span class=\"k\" style=\"color: rgb(76, 191, 156);\">array</span><span class=\"p\">(</span>\r\n                <span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'id\'</span> <span class=\"o\">=&gt;</span> <span class=\"p\">(</span><span class=\"n\" style=\"color: rgb(17, 93, 139);\">int</span><span class=\"p\">)</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$id</span><span class=\"p\">,</span>\r\n                <span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'firstname\'</span> <span class=\"o\">=&gt;</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$input</span><span class=\"p\">[</span><span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'firstname\'</span><span class=\"p\">],</span>\r\n                <span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'lastname\'</span>  <span class=\"o\">=&gt;</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$input</span><span class=\"p\">[</span><span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'lastname\'</span><span class=\"p\">],</span>\r\n                <span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'firstparent_id\'</span> <span class=\"o\">=&gt;</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$input</span><span class=\"p\">[</span><span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'firstparent_id\'</span><span class=\"p\">]</span> <span class=\"o\">??</span> <span class=\"kc\" style=\"color: rgb(76, 191, 156);\">null</span><span class=\"p\">,</span>\r\n                <span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'secondparent_id\'</span> <span class=\"o\">=&gt;</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$input</span><span class=\"p\">[</span><span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'secondparent_id\'</span><span class=\"p\">]</span> <span class=\"o\">??</span> <span class=\"kc\" style=\"color: rgb(76, 191, 156);\">null</span><span class=\"p\">,</span>\r\n            <span class=\"p\">));</span>\r\n            <span class=\"k\" style=\"color: rgb(76, 191, 156);\">return</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$statement</span><span class=\"o\">-&gt;</span><span class=\"nf\" style=\"color: rgb(17, 93, 139);\">rowCount</span><span class=\"p\">();</span>\r\n        <span class=\"p\">}</span> <span class=\"k\" style=\"color: rgb(76, 191, 156);\">catch</span> <span class=\"p\">(</span><span class=\"err\">\\</span><span class=\"nc\" style=\"color: rgb(17, 93, 139);\">PDOException</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$e</span><span class=\"p\">)</span> <span class=\"p\">{</span>\r\n            <span class=\"k\" style=\"color: rgb(76, 191, 156);\">exit</span><span class=\"p\">(</span><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$e</span><span class=\"o\">-&gt;</span><span class=\"nf\" style=\"color: rgb(17, 93, 139);\">getMessage</span><span class=\"p\">());</span>\r\n        <span class=\"p\">}</span>    \r\n    <span class=\"p\">}</span>\r\n\r\n    <span class=\"k\" style=\"color: rgb(76, 191, 156);\">public</span> <span class=\"k\" style=\"color: rgb(76, 191, 156);\">function</span> <span class=\"n\" style=\"color: rgb(17, 93, 139);\">delete</span><span class=\"p\">(</span><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$id</span><span class=\"p\">)</span>\r\n    <span class=\"p\">{</span>\r\n        <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$statement</span> <span class=\"o\">=</span> <span class=\"s2\" style=\"color: rgb(226, 40, 102);\">\"\r\n            DELETE FROM person\r\n            WHERE id = :id;\r\n        \"</span><span class=\"p\">;</span>\r\n\r\n        <span class=\"k\" style=\"color: rgb(76, 191, 156);\">try</span> <span class=\"p\">{</span>\r\n            <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$statement</span> <span class=\"o\">=</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$this</span><span class=\"o\">-&gt;</span><span class=\"n\" style=\"color: rgb(17, 93, 139);\">db</span><span class=\"o\">-&gt;</span><span class=\"nf\" style=\"color: rgb(17, 93, 139);\">prepare</span><span class=\"p\">(</span><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$statement</span><span class=\"p\">);</span>\r\n            <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$statement</span><span class=\"o\">-&gt;</span><span class=\"nf\" style=\"color: rgb(17, 93, 139);\">execute</span><span class=\"p\">(</span><span class=\"k\" style=\"color: rgb(76, 191, 156);\">array</span><span class=\"p\">(</span><span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'id\'</span> <span class=\"o\">=&gt;</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$id</span><span class=\"p\">));</span>\r\n            <span class=\"k\" style=\"color: rgb(76, 191, 156);\">return</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$statement</span><span class=\"o\">-&gt;</span><span class=\"nf\" style=\"color: rgb(17, 93, 139);\">rowCount</span><span class=\"p\">();</span>\r\n        <span class=\"p\">}</span> <span class=\"k\" style=\"color: rgb(76, 191, 156);\">catch</span> <span class=\"p\">(</span><span class=\"err\">\\</span><span class=\"nc\" style=\"color: rgb(17, 93, 139);\">PDOException</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$e</span><span class=\"p\">)</span> <span class=\"p\">{</span>\r\n            <span class=\"k\" style=\"color: rgb(76, 191, 156);\">exit</span><span class=\"p\">(</span><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$e</span><span class=\"o\">-&gt;</span><span class=\"nf\" style=\"color: rgb(17, 93, 139);\">getMessage</span><span class=\"p\">());</span>\r\n        <span class=\"p\">}</span>    \r\n    <span class=\"p\">}</span>\r\n<span class=\"p\">}</span>\r\n</code></pre></div></div><p style=\"margin: 20px 0px; color: rgb(93, 93, 93); font-family: proxima-nova, Helvetica, Arial, sans-serif;\">Obviously, in a production system, you would want to handle the exceptions more gracefully instead of just exiting with an error message.</p><p style=\"margin: 20px 0px; color: rgb(93, 93, 93); font-family: proxima-nova, Helvetica, Arial, sans-serif;\">Here are some examples of using the gateway:</p><div class=\"language-php highlighter-rouge\" style=\"color: rgb(93, 93, 93); font-family: proxima-nova, Helvetica, Arial, sans-serif;\"><div class=\"highlight\"><pre class=\"highlight\" style=\"font-family: monospace, monospace; font-size: 1em; margin-top: 20px; margin-bottom: 20px; white-space: pre-wrap; padding: 15px; background: rgb(244, 244, 244); max-width: 900px; color: rgb(61, 61, 61);\"><code style=\"font-family: monospace, monospace; font-size: 1em; display: inline-block; white-space: pre; background: none; padding: 0px;\"><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$personGateway</span> <span class=\"o\">=</span> <span class=\"k\" style=\"color: rgb(76, 191, 156);\">new</span> <span class=\"nc\" style=\"color: rgb(17, 93, 139);\">PersonGateway</span><span class=\"p\">(</span><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$dbConnection</span><span class=\"p\">);</span>\r\n\r\n\r\n<span class=\"c1\" style=\"color: rgb(154, 154, 154); font-style: italic;\">// return all records</span>\r\n<span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$result</span> <span class=\"o\">=</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$personGateway</span><span class=\"o\">-&gt;</span><span class=\"nf\" style=\"color: rgb(17, 93, 139);\">findAll</span><span class=\"p\">();</span>\r\n\r\n<span class=\"c1\" style=\"color: rgb(154, 154, 154); font-style: italic;\">// return the record with id = 1</span>\r\n<span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$result</span> <span class=\"o\">=</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$personGateway</span><span class=\"o\">-&gt;</span><span class=\"nf\" style=\"color: rgb(17, 93, 139);\">find</span><span class=\"p\">(</span><span class=\"mi\" style=\"color: rgb(153, 15, 105);\">1</span><span class=\"p\">);</span>\r\n\r\n<span class=\"c1\" style=\"color: rgb(154, 154, 154); font-style: italic;\">// insert a new record</span>\r\n<span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$result</span> <span class=\"o\">=</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$personGateway</span><span class=\"o\">-&gt;</span><span class=\"nf\" style=\"color: rgb(17, 93, 139);\">insert</span><span class=\"p\">([</span>\r\n    <span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'firstname\'</span> <span class=\"o\">=&gt;</span> <span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'Doug\'</span><span class=\"p\">,</span>\r\n    <span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'lastname\'</span> <span class=\"o\">=&gt;</span> <span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'Ellis\'</span>\r\n<span class=\"p\">]);</span>\r\n\r\n<span class=\"c1\" style=\"color: rgb(154, 154, 154); font-style: italic;\">// update the record with id = 10</span>\r\n<span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$result</span> <span class=\"o\">=</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$personGateway</span><span class=\"o\">-&gt;</span><span class=\"nf\" style=\"color: rgb(17, 93, 139);\">update</span><span class=\"p\">(</span><span class=\"mi\" style=\"color: rgb(153, 15, 105);\">10</span><span class=\"p\">,</span> <span class=\"p\">[</span>\r\n    <span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'firstname\'</span> <span class=\"o\">=&gt;</span> <span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'Doug\'</span><span class=\"p\">,</span>\r\n    <span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'lastname\'</span> <span class=\"o\">=&gt;</span> <span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'Ellis\'</span><span class=\"p\">,</span>\r\n    <span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'secondparent_id\'</span> <span class=\"o\">=&gt;</span> <span class=\"mi\" style=\"color: rgb(153, 15, 105);\">1</span>\r\n<span class=\"p\">]);</span>\r\n\r\n<span class=\"c1\" style=\"color: rgb(154, 154, 154); font-style: italic;\">// delete the record with id = 10</span>\r\n<span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$result</span> <span class=\"o\">=</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$personGateway</span><span class=\"o\">-&gt;</span><span class=\"nb\" style=\"color: rgb(17, 93, 139);\">delete</span><span class=\"p\">(</span><span class=\"mi\" style=\"color: rgb(153, 15, 105);\">10</span><span class=\"p\">);</span>\r\n</code></pre></div></div><h2 id=\"implement-the-php-rest-api\" style=\"margin: 60px 0px 10px; font-size: 38px; line-height: 54px; font-family: proxima-nova, Helvetica, sans-serif; color: rgb(93, 93, 93);\"><a href=\"https://developer.okta.com/blog/2019/03/08/simple-rest-api-php#implement-the-php-rest-api\" style=\"color: rgb(61, 61, 61); transition: color 0.4s ease 0s; position: relative;\">Implement the PHP REST API</a></h2><p style=\"margin: 20px 0px; color: rgb(93, 93, 93); font-family: proxima-nova, Helvetica, Arial, sans-serif;\">We will implement a REST API now with the following endpoints:</p><div class=\"language-plaintext highlighter-rouge\" style=\"color: rgb(93, 93, 93); font-family: proxima-nova, Helvetica, Arial, sans-serif;\"><div class=\"highlight\"><pre class=\"highlight\" style=\"font-family: monospace, monospace; font-size: 1em; margin-top: 20px; margin-bottom: 20px; white-space: pre-wrap; padding: 15px; background: rgb(244, 244, 244); max-width: 900px; color: rgb(61, 61, 61);\"><code style=\"font-family: monospace, monospace; font-size: 1em; display: inline-block; white-space: pre; background: none; padding: 0px;\">// return all records\r\nGET /person\r\n\r\n// return a specific record\r\nGET /person/{id}\r\n\r\n// create a new record\r\nPOST /person\r\n\r\n// update an existing record\r\nPUT /person/{id}\r\n\r\n// delete an existing record\r\nDELETE /person/{id}\r\n</code></pre></div></div><p style=\"margin: 20px 0px; color: rgb(93, 93, 93); font-family: proxima-nova, Helvetica, Arial, sans-serif;\">We’ll create a&nbsp;<code class=\"language-plaintext highlighter-rouge\" style=\"font-family: monospace, monospace; font-size: 1em; display: inline-block; white-space: pre; padding: 0px 5px; background: rgb(244, 244, 244); line-height: 24px;\">/public/index.php</code>&nbsp;file to serve as our front controller and process the requests, and a&nbsp;<code class=\"language-plaintext highlighter-rouge\" style=\"font-family: monospace, monospace; font-size: 1em; display: inline-block; white-space: pre; padding: 0px 5px; background: rgb(244, 244, 244); line-height: 24px;\">src/Controller/PersonController.php</code>&nbsp;to handle the API endpoints (called from the front controller after validating the URI).</p><p style=\"margin: 20px 0px; color: rgb(93, 93, 93); font-family: proxima-nova, Helvetica, Arial, sans-serif;\"><code class=\"language-plaintext highlighter-rouge\" style=\"font-family: monospace, monospace; font-size: 1em; display: inline-block; white-space: pre; padding: 0px 5px; background: rgb(244, 244, 244); line-height: 24px;\">public/index.php</code></p><div class=\"language-php highlighter-rouge\" style=\"color: rgb(93, 93, 93); font-family: proxima-nova, Helvetica, Arial, sans-serif;\"><div class=\"highlight\"><pre class=\"highlight\" style=\"font-family: monospace, monospace; font-size: 1em; margin-top: 20px; margin-bottom: 20px; white-space: pre-wrap; padding: 15px; background: rgb(244, 244, 244); max-width: 900px; color: rgb(61, 61, 61);\"><code style=\"font-family: monospace, monospace; font-size: 1em; display: inline-block; white-space: pre; background: none; padding: 0px;\"><span class=\"cp\" style=\"color: rgb(154, 154, 154); font-style: italic;\">&lt;?php</span>\r\n<span class=\"k\" style=\"color: rgb(76, 191, 156);\">require</span> <span class=\"s2\" style=\"color: rgb(226, 40, 102);\">\"../bootstrap.php\"</span><span class=\"p\">;</span>\r\n<span class=\"kn\" style=\"color: rgb(76, 191, 156);\">use</span> <span class=\"nc\" style=\"color: rgb(17, 93, 139);\">Src\\Controller\\PersonController</span><span class=\"p\">;</span>\r\n\r\n<span class=\"nb\" style=\"color: rgb(17, 93, 139);\">header</span><span class=\"p\">(</span><span class=\"s2\" style=\"color: rgb(226, 40, 102);\">\"Access-Control-Allow-Origin: *\"</span><span class=\"p\">);</span>\r\n<span class=\"nb\" style=\"color: rgb(17, 93, 139);\">header</span><span class=\"p\">(</span><span class=\"s2\" style=\"color: rgb(226, 40, 102);\">\"Content-Type: application/json; charset=UTF-8\"</span><span class=\"p\">);</span>\r\n<span class=\"nb\" style=\"color: rgb(17, 93, 139);\">header</span><span class=\"p\">(</span><span class=\"s2\" style=\"color: rgb(226, 40, 102);\">\"Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE\"</span><span class=\"p\">);</span>\r\n<span class=\"nb\" style=\"color: rgb(17, 93, 139);\">header</span><span class=\"p\">(</span><span class=\"s2\" style=\"color: rgb(226, 40, 102);\">\"Access-Control-Max-Age: 3600\"</span><span class=\"p\">);</span>\r\n<span class=\"nb\" style=\"color: rgb(17, 93, 139);\">header</span><span class=\"p\">(</span><span class=\"s2\" style=\"color: rgb(226, 40, 102);\">\"Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With\"</span><span class=\"p\">);</span>\r\n\r\n<span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$uri</span> <span class=\"o\">=</span> <span class=\"nb\" style=\"color: rgb(17, 93, 139);\">parse_url</span><span class=\"p\">(</span><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$_SERVER</span><span class=\"p\">[</span><span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'REQUEST_URI\'</span><span class=\"p\">],</span> <span class=\"kc\" style=\"color: rgb(76, 191, 156);\">PHP_URL_PATH</span><span class=\"p\">);</span>\r\n<span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$uri</span> <span class=\"o\">=</span> <span class=\"nb\" style=\"color: rgb(17, 93, 139);\">explode</span><span class=\"p\">(</span> <span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'/\'</span><span class=\"p\">,</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$uri</span> <span class=\"p\">);</span>\r\n\r\n<span class=\"c1\" style=\"color: rgb(154, 154, 154); font-style: italic;\">// all of our endpoints start with /person</span>\r\n<span class=\"c1\" style=\"color: rgb(154, 154, 154); font-style: italic;\">// everything else results in a 404 Not Found</span>\r\n<span class=\"k\" style=\"color: rgb(76, 191, 156);\">if</span> <span class=\"p\">(</span><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$uri</span><span class=\"p\">[</span><span class=\"mi\" style=\"color: rgb(153, 15, 105);\">1</span><span class=\"p\">]</span> <span class=\"o\">!==</span> <span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'person\'</span><span class=\"p\">)</span> <span class=\"p\">{</span>\r\n    <span class=\"nb\" style=\"color: rgb(17, 93, 139);\">header</span><span class=\"p\">(</span><span class=\"s2\" style=\"color: rgb(226, 40, 102);\">\"HTTP/1.1 404 Not Found\"</span><span class=\"p\">);</span>\r\n    <span class=\"k\" style=\"color: rgb(76, 191, 156);\">exit</span><span class=\"p\">();</span>\r\n<span class=\"p\">}</span>\r\n\r\n<span class=\"c1\" style=\"color: rgb(154, 154, 154); font-style: italic;\">// the user id is, of course, optional and must be a number:</span>\r\n<span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$userId</span> <span class=\"o\">=</span> <span class=\"kc\" style=\"color: rgb(76, 191, 156);\">null</span><span class=\"p\">;</span>\r\n<span class=\"k\" style=\"color: rgb(76, 191, 156);\">if</span> <span class=\"p\">(</span><span class=\"k\" style=\"color: rgb(76, 191, 156);\">isset</span><span class=\"p\">(</span><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$uri</span><span class=\"p\">[</span><span class=\"mi\" style=\"color: rgb(153, 15, 105);\">2</span><span class=\"p\">]))</span> <span class=\"p\">{</span>\r\n    <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$userId</span> <span class=\"o\">=</span> <span class=\"p\">(</span><span class=\"n\" style=\"color: rgb(17, 93, 139);\">int</span><span class=\"p\">)</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$uri</span><span class=\"p\">[</span><span class=\"mi\" style=\"color: rgb(153, 15, 105);\">2</span><span class=\"p\">];</span>\r\n<span class=\"p\">}</span>\r\n\r\n<span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$requestMethod</span> <span class=\"o\">=</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$_SERVER</span><span class=\"p\">[</span><span class=\"s2\" style=\"color: rgb(226, 40, 102);\">\"REQUEST_METHOD\"</span><span class=\"p\">];</span>\r\n\r\n<span class=\"c1\" style=\"color: rgb(154, 154, 154); font-style: italic;\">// pass the request method and user ID to the PersonController and process the HTTP request:</span>\r\n<span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$controller</span> <span class=\"o\">=</span> <span class=\"k\" style=\"color: rgb(76, 191, 156);\">new</span> <span class=\"nc\" style=\"color: rgb(17, 93, 139);\">PersonController</span><span class=\"p\">(</span><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$dbConnection</span><span class=\"p\">,</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$requestMethod</span><span class=\"p\">,</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$userId</span><span class=\"p\">);</span>\r\n<span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$controller</span><span class=\"o\">-&gt;</span><span class=\"nf\" style=\"color: rgb(17, 93, 139);\">processRequest</span><span class=\"p\">();</span>\r\n</code></pre></div></div><p style=\"margin: 20px 0px; color: rgb(93, 93, 93); font-family: proxima-nova, Helvetica, Arial, sans-serif;\"><code class=\"language-plaintext highlighter-rouge\" style=\"font-family: monospace, monospace; font-size: 1em; display: inline-block; white-space: pre; padding: 0px 5px; background: rgb(244, 244, 244); line-height: 24px;\">src/Controller/PersonController.php</code></p><div class=\"language-php highlighter-rouge\" style=\"color: rgb(93, 93, 93); font-family: proxima-nova, Helvetica, Arial, sans-serif;\"><div class=\"highlight\"><pre class=\"highlight\" style=\"font-family: monospace, monospace; font-size: 1em; margin-top: 20px; margin-bottom: 20px; white-space: pre-wrap; padding: 15px; background: rgb(244, 244, 244); max-width: 900px; color: rgb(61, 61, 61);\"><code style=\"font-family: monospace, monospace; font-size: 1em; display: inline-block; white-space: pre; background: none; padding: 0px;\"><span class=\"cp\" style=\"color: rgb(154, 154, 154); font-style: italic;\">&lt;?php</span>\r\n<span class=\"kn\" style=\"color: rgb(76, 191, 156);\">namespace</span> <span class=\"nn\" style=\"color: rgb(76, 191, 156);\">Src\\Controller</span><span class=\"p\">;</span>\r\n\r\n<span class=\"kn\" style=\"color: rgb(76, 191, 156);\">use</span> <span class=\"nc\" style=\"color: rgb(17, 93, 139);\">Src\\TableGateways\\PersonGateway</span><span class=\"p\">;</span>\r\n\r\n<span class=\"kd\" style=\"color: rgb(76, 191, 156);\">class</span> <span class=\"nc\" style=\"color: rgb(17, 93, 139);\">PersonController</span> <span class=\"p\">{</span>\r\n\r\n    <span class=\"k\" style=\"color: rgb(76, 191, 156);\">private</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$db</span><span class=\"p\">;</span>\r\n    <span class=\"k\" style=\"color: rgb(76, 191, 156);\">private</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$requestMethod</span><span class=\"p\">;</span>\r\n    <span class=\"k\" style=\"color: rgb(76, 191, 156);\">private</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$userId</span><span class=\"p\">;</span>\r\n\r\n    <span class=\"k\" style=\"color: rgb(76, 191, 156);\">private</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$personGateway</span><span class=\"p\">;</span>\r\n\r\n    <span class=\"k\" style=\"color: rgb(76, 191, 156);\">public</span> <span class=\"k\" style=\"color: rgb(76, 191, 156);\">function</span> <span class=\"n\" style=\"color: rgb(17, 93, 139);\">__construct</span><span class=\"p\">(</span><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$db</span><span class=\"p\">,</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$requestMethod</span><span class=\"p\">,</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$userId</span><span class=\"p\">)</span>\r\n    <span class=\"p\">{</span>\r\n        <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$this</span><span class=\"o\">-&gt;</span><span class=\"n\" style=\"color: rgb(17, 93, 139);\">db</span> <span class=\"o\">=</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$db</span><span class=\"p\">;</span>\r\n        <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$this</span><span class=\"o\">-&gt;</span><span class=\"n\" style=\"color: rgb(17, 93, 139);\">requestMethod</span> <span class=\"o\">=</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$requestMethod</span><span class=\"p\">;</span>\r\n        <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$this</span><span class=\"o\">-&gt;</span><span class=\"n\" style=\"color: rgb(17, 93, 139);\">userId</span> <span class=\"o\">=</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$userId</span><span class=\"p\">;</span>\r\n\r\n        <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$this</span><span class=\"o\">-&gt;</span><span class=\"n\" style=\"color: rgb(17, 93, 139);\">personGateway</span> <span class=\"o\">=</span> <span class=\"k\" style=\"color: rgb(76, 191, 156);\">new</span> <span class=\"nc\" style=\"color: rgb(17, 93, 139);\">PersonGateway</span><span class=\"p\">(</span><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$db</span><span class=\"p\">);</span>\r\n    <span class=\"p\">}</span>\r\n\r\n    <span class=\"k\" style=\"color: rgb(76, 191, 156);\">public</span> <span class=\"k\" style=\"color: rgb(76, 191, 156);\">function</span> <span class=\"n\" style=\"color: rgb(17, 93, 139);\">processRequest</span><span class=\"p\">()</span>\r\n    <span class=\"p\">{</span>\r\n        <span class=\"k\" style=\"color: rgb(76, 191, 156);\">switch</span> <span class=\"p\">(</span><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$this</span><span class=\"o\">-&gt;</span><span class=\"n\" style=\"color: rgb(17, 93, 139);\">requestMethod</span><span class=\"p\">)</span> <span class=\"p\">{</span>\r\n            <span class=\"k\" style=\"color: rgb(76, 191, 156);\">case</span> <span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'GET\'</span><span class=\"o\">:</span>\r\n                <span class=\"k\" style=\"color: rgb(76, 191, 156);\">if</span> <span class=\"p\">(</span><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$this</span><span class=\"o\">-&gt;</span><span class=\"n\" style=\"color: rgb(17, 93, 139);\">userId</span><span class=\"p\">)</span> <span class=\"p\">{</span>\r\n                    <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$response</span> <span class=\"o\">=</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$this</span><span class=\"o\">-&gt;</span><span class=\"nf\" style=\"color: rgb(17, 93, 139);\">getUser</span><span class=\"p\">(</span><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$this</span><span class=\"o\">-&gt;</span><span class=\"n\" style=\"color: rgb(17, 93, 139);\">userId</span><span class=\"p\">);</span>\r\n                <span class=\"p\">}</span> <span class=\"k\" style=\"color: rgb(76, 191, 156);\">else</span> <span class=\"p\">{</span>\r\n                    <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$response</span> <span class=\"o\">=</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$this</span><span class=\"o\">-&gt;</span><span class=\"nf\" style=\"color: rgb(17, 93, 139);\">getAllUsers</span><span class=\"p\">();</span>\r\n                <span class=\"p\">};</span>\r\n                <span class=\"k\" style=\"color: rgb(76, 191, 156);\">break</span><span class=\"p\">;</span>\r\n            <span class=\"k\" style=\"color: rgb(76, 191, 156);\">case</span> <span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'POST\'</span><span class=\"o\">:</span>\r\n                <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$response</span> <span class=\"o\">=</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$this</span><span class=\"o\">-&gt;</span><span class=\"nf\" style=\"color: rgb(17, 93, 139);\">createUserFromRequest</span><span class=\"p\">();</span>\r\n                <span class=\"k\" style=\"color: rgb(76, 191, 156);\">break</span><span class=\"p\">;</span>\r\n            <span class=\"k\" style=\"color: rgb(76, 191, 156);\">case</span> <span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'PUT\'</span><span class=\"o\">:</span>\r\n                <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$response</span> <span class=\"o\">=</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$this</span><span class=\"o\">-&gt;</span><span class=\"nf\" style=\"color: rgb(17, 93, 139);\">updateUserFromRequest</span><span class=\"p\">(</span><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$this</span><span class=\"o\">-&gt;</span><span class=\"n\" style=\"color: rgb(17, 93, 139);\">userId</span><span class=\"p\">);</span>\r\n                <span class=\"k\" style=\"color: rgb(76, 191, 156);\">break</span><span class=\"p\">;</span>\r\n            <span class=\"k\" style=\"color: rgb(76, 191, 156);\">case</span> <span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'DELETE\'</span><span class=\"o\">:</span>\r\n                <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$response</span> <span class=\"o\">=</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$this</span><span class=\"o\">-&gt;</span><span class=\"nf\" style=\"color: rgb(17, 93, 139);\">deleteUser</span><span class=\"p\">(</span><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$this</span><span class=\"o\">-&gt;</span><span class=\"n\" style=\"color: rgb(17, 93, 139);\">userId</span><span class=\"p\">);</span>\r\n                <span class=\"k\" style=\"color: rgb(76, 191, 156);\">break</span><span class=\"p\">;</span>\r\n            <span class=\"k\" style=\"color: rgb(76, 191, 156);\">default</span><span class=\"o\">:</span>\r\n                <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$response</span> <span class=\"o\">=</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$this</span><span class=\"o\">-&gt;</span><span class=\"nf\" style=\"color: rgb(17, 93, 139);\">notFoundResponse</span><span class=\"p\">();</span>\r\n                <span class=\"k\" style=\"color: rgb(76, 191, 156);\">break</span><span class=\"p\">;</span>\r\n        <span class=\"p\">}</span>\r\n        <span class=\"nb\" style=\"color: rgb(17, 93, 139);\">header</span><span class=\"p\">(</span><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$response</span><span class=\"p\">[</span><span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'status_code_header\'</span><span class=\"p\">]);</span>\r\n        <span class=\"k\" style=\"color: rgb(76, 191, 156);\">if</span> <span class=\"p\">(</span><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$response</span><span class=\"p\">[</span><span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'body\'</span><span class=\"p\">])</span> <span class=\"p\">{</span>\r\n            <span class=\"k\" style=\"color: rgb(76, 191, 156);\">echo</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$response</span><span class=\"p\">[</span><span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'body\'</span><span class=\"p\">];</span>\r\n        <span class=\"p\">}</span>\r\n    <span class=\"p\">}</span>\r\n\r\n    <span class=\"k\" style=\"color: rgb(76, 191, 156);\">private</span> <span class=\"k\" style=\"color: rgb(76, 191, 156);\">function</span> <span class=\"n\" style=\"color: rgb(17, 93, 139);\">getAllUsers</span><span class=\"p\">()</span>\r\n    <span class=\"p\">{</span>\r\n        <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$result</span> <span class=\"o\">=</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$this</span><span class=\"o\">-&gt;</span><span class=\"n\" style=\"color: rgb(17, 93, 139);\">personGateway</span><span class=\"o\">-&gt;</span><span class=\"nf\" style=\"color: rgb(17, 93, 139);\">findAll</span><span class=\"p\">();</span>\r\n        <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$response</span><span class=\"p\">[</span><span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'status_code_header\'</span><span class=\"p\">]</span> <span class=\"o\">=</span> <span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'HTTP/1.1 200 OK\'</span><span class=\"p\">;</span>\r\n        <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$response</span><span class=\"p\">[</span><span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'body\'</span><span class=\"p\">]</span> <span class=\"o\">=</span> <span class=\"nb\" style=\"color: rgb(17, 93, 139);\">json_encode</span><span class=\"p\">(</span><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$result</span><span class=\"p\">);</span>\r\n        <span class=\"k\" style=\"color: rgb(76, 191, 156);\">return</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$response</span><span class=\"p\">;</span>\r\n    <span class=\"p\">}</span>\r\n\r\n    <span class=\"k\" style=\"color: rgb(76, 191, 156);\">private</span> <span class=\"k\" style=\"color: rgb(76, 191, 156);\">function</span> <span class=\"n\" style=\"color: rgb(17, 93, 139);\">getUser</span><span class=\"p\">(</span><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$id</span><span class=\"p\">)</span>\r\n    <span class=\"p\">{</span>\r\n        <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$result</span> <span class=\"o\">=</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$this</span><span class=\"o\">-&gt;</span><span class=\"n\" style=\"color: rgb(17, 93, 139);\">personGateway</span><span class=\"o\">-&gt;</span><span class=\"nf\" style=\"color: rgb(17, 93, 139);\">find</span><span class=\"p\">(</span><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$id</span><span class=\"p\">);</span>\r\n        <span class=\"k\" style=\"color: rgb(76, 191, 156);\">if</span> <span class=\"p\">(</span><span class=\"o\">!</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$result</span><span class=\"p\">)</span> <span class=\"p\">{</span>\r\n            <span class=\"k\" style=\"color: rgb(76, 191, 156);\">return</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$this</span><span class=\"o\">-&gt;</span><span class=\"nf\" style=\"color: rgb(17, 93, 139);\">notFoundResponse</span><span class=\"p\">();</span>\r\n        <span class=\"p\">}</span>\r\n        <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$response</span><span class=\"p\">[</span><span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'status_code_header\'</span><span class=\"p\">]</span> <span class=\"o\">=</span> <span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'HTTP/1.1 200 OK\'</span><span class=\"p\">;</span>\r\n        <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$response</span><span class=\"p\">[</span><span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'body\'</span><span class=\"p\">]</span> <span class=\"o\">=</span> <span class=\"nb\" style=\"color: rgb(17, 93, 139);\">json_encode</span><span class=\"p\">(</span><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$result</span><span class=\"p\">);</span>\r\n        <span class=\"k\" style=\"color: rgb(76, 191, 156);\">return</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$response</span><span class=\"p\">;</span>\r\n    <span class=\"p\">}</span>\r\n\r\n    <span class=\"k\" style=\"color: rgb(76, 191, 156);\">private</span> <span class=\"k\" style=\"color: rgb(76, 191, 156);\">function</span> <span class=\"n\" style=\"color: rgb(17, 93, 139);\">createUserFromRequest</span><span class=\"p\">()</span>\r\n    <span class=\"p\">{</span>\r\n        <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$input</span> <span class=\"o\">=</span> <span class=\"p\">(</span><span class=\"k\" style=\"color: rgb(76, 191, 156);\">array</span><span class=\"p\">)</span> <span class=\"nb\" style=\"color: rgb(17, 93, 139);\">json_decode</span><span class=\"p\">(</span><span class=\"nb\" style=\"color: rgb(17, 93, 139);\">file_get_contents</span><span class=\"p\">(</span><span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'php://input\'</span><span class=\"p\">),</span> <span class=\"kc\" style=\"color: rgb(76, 191, 156);\">TRUE</span><span class=\"p\">);</span>\r\n        <span class=\"k\" style=\"color: rgb(76, 191, 156);\">if</span> <span class=\"p\">(</span><span class=\"o\">!</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$this</span><span class=\"o\">-&gt;</span><span class=\"nf\" style=\"color: rgb(17, 93, 139);\">validatePerson</span><span class=\"p\">(</span><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$input</span><span class=\"p\">))</span> <span class=\"p\">{</span>\r\n            <span class=\"k\" style=\"color: rgb(76, 191, 156);\">return</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$this</span><span class=\"o\">-&gt;</span><span class=\"nf\" style=\"color: rgb(17, 93, 139);\">unprocessableEntityResponse</span><span class=\"p\">();</span>\r\n        <span class=\"p\">}</span>\r\n        <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$this</span><span class=\"o\">-&gt;</span><span class=\"n\" style=\"color: rgb(17, 93, 139);\">personGateway</span><span class=\"o\">-&gt;</span><span class=\"nf\" style=\"color: rgb(17, 93, 139);\">insert</span><span class=\"p\">(</span><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$input</span><span class=\"p\">);</span>\r\n        <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$response</span><span class=\"p\">[</span><span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'status_code_header\'</span><span class=\"p\">]</span> <span class=\"o\">=</span> <span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'HTTP/1.1 201 Created\'</span><span class=\"p\">;</span>\r\n        <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$response</span><span class=\"p\">[</span><span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'body\'</span><span class=\"p\">]</span> <span class=\"o\">=</span> <span class=\"kc\" style=\"color: rgb(76, 191, 156);\">null</span><span class=\"p\">;</span>\r\n        <span class=\"k\" style=\"color: rgb(76, 191, 156);\">return</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$response</span><span class=\"p\">;</span>\r\n    <span class=\"p\">}</span>\r\n\r\n    <span class=\"k\" style=\"color: rgb(76, 191, 156);\">private</span> <span class=\"k\" style=\"color: rgb(76, 191, 156);\">function</span> <span class=\"n\" style=\"color: rgb(17, 93, 139);\">updateUserFromRequest</span><span class=\"p\">(</span><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$id</span><span class=\"p\">)</span>\r\n    <span class=\"p\">{</span>\r\n        <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$result</span> <span class=\"o\">=</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$this</span><span class=\"o\">-&gt;</span><span class=\"n\" style=\"color: rgb(17, 93, 139);\">personGateway</span><span class=\"o\">-&gt;</span><span class=\"nf\" style=\"color: rgb(17, 93, 139);\">find</span><span class=\"p\">(</span><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$id</span><span class=\"p\">);</span>\r\n        <span class=\"k\" style=\"color: rgb(76, 191, 156);\">if</span> <span class=\"p\">(</span><span class=\"o\">!</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$result</span><span class=\"p\">)</span> <span class=\"p\">{</span>\r\n            <span class=\"k\" style=\"color: rgb(76, 191, 156);\">return</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$this</span><span class=\"o\">-&gt;</span><span class=\"nf\" style=\"color: rgb(17, 93, 139);\">notFoundResponse</span><span class=\"p\">();</span>\r\n        <span class=\"p\">}</span>\r\n        <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$input</span> <span class=\"o\">=</span> <span class=\"p\">(</span><span class=\"k\" style=\"color: rgb(76, 191, 156);\">array</span><span class=\"p\">)</span> <span class=\"nb\" style=\"color: rgb(17, 93, 139);\">json_decode</span><span class=\"p\">(</span><span class=\"nb\" style=\"color: rgb(17, 93, 139);\">file_get_contents</span><span class=\"p\">(</span><span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'php://input\'</span><span class=\"p\">),</span> <span class=\"kc\" style=\"color: rgb(76, 191, 156);\">TRUE</span><span class=\"p\">);</span>\r\n        <span class=\"k\" style=\"color: rgb(76, 191, 156);\">if</span> <span class=\"p\">(</span><span class=\"o\">!</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$this</span><span class=\"o\">-&gt;</span><span class=\"nf\" style=\"color: rgb(17, 93, 139);\">validatePerson</span><span class=\"p\">(</span><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$input</span><span class=\"p\">))</span> <span class=\"p\">{</span>\r\n            <span class=\"k\" style=\"color: rgb(76, 191, 156);\">return</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$this</span><span class=\"o\">-&gt;</span><span class=\"nf\" style=\"color: rgb(17, 93, 139);\">unprocessableEntityResponse</span><span class=\"p\">();</span>\r\n        <span class=\"p\">}</span>\r\n        <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$this</span><span class=\"o\">-&gt;</span><span class=\"n\" style=\"color: rgb(17, 93, 139);\">personGateway</span><span class=\"o\">-&gt;</span><span class=\"nf\" style=\"color: rgb(17, 93, 139);\">update</span><span class=\"p\">(</span><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$id</span><span class=\"p\">,</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$input</span><span class=\"p\">);</span>\r\n        <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$response</span><span class=\"p\">[</span><span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'status_code_header\'</span><span class=\"p\">]</span> <span class=\"o\">=</span> <span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'HTTP/1.1 200 OK\'</span><span class=\"p\">;</span>\r\n        <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$response</span><span class=\"p\">[</span><span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'body\'</span><span class=\"p\">]</span> <span class=\"o\">=</span> <span class=\"kc\" style=\"color: rgb(76, 191, 156);\">null</span><span class=\"p\">;</span>\r\n        <span class=\"k\" style=\"color: rgb(76, 191, 156);\">return</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$response</span><span class=\"p\">;</span>\r\n    <span class=\"p\">}</span>\r\n\r\n    <span class=\"k\" style=\"color: rgb(76, 191, 156);\">private</span> <span class=\"k\" style=\"color: rgb(76, 191, 156);\">function</span> <span class=\"n\" style=\"color: rgb(17, 93, 139);\">deleteUser</span><span class=\"p\">(</span><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$id</span><span class=\"p\">)</span>\r\n    <span class=\"p\">{</span>\r\n        <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$result</span> <span class=\"o\">=</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$this</span><span class=\"o\">-&gt;</span><span class=\"n\" style=\"color: rgb(17, 93, 139);\">personGateway</span><span class=\"o\">-&gt;</span><span class=\"nf\" style=\"color: rgb(17, 93, 139);\">find</span><span class=\"p\">(</span><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$id</span><span class=\"p\">);</span>\r\n        <span class=\"k\" style=\"color: rgb(76, 191, 156);\">if</span> <span class=\"p\">(</span><span class=\"o\">!</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$result</span><span class=\"p\">)</span> <span class=\"p\">{</span>\r\n            <span class=\"k\" style=\"color: rgb(76, 191, 156);\">return</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$this</span><span class=\"o\">-&gt;</span><span class=\"nf\" style=\"color: rgb(17, 93, 139);\">notFoundResponse</span><span class=\"p\">();</span>\r\n        <span class=\"p\">}</span>\r\n        <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$this</span><span class=\"o\">-&gt;</span><span class=\"n\" style=\"color: rgb(17, 93, 139);\">personGateway</span><span class=\"o\">-&gt;</span><span class=\"nb\" style=\"color: rgb(17, 93, 139);\">delete</span><span class=\"p\">(</span><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$id</span><span class=\"p\">);</span>\r\n        <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$response</span><span class=\"p\">[</span><span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'status_code_header\'</span><span class=\"p\">]</span> <span class=\"o\">=</span> <span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'HTTP/1.1 200 OK\'</span><span class=\"p\">;</span>\r\n        <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$response</span><span class=\"p\">[</span><span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'body\'</span><span class=\"p\">]</span> <span class=\"o\">=</span> <span class=\"kc\" style=\"color: rgb(76, 191, 156);\">null</span><span class=\"p\">;</span>\r\n        <span class=\"k\" style=\"color: rgb(76, 191, 156);\">return</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$response</span><span class=\"p\">;</span>\r\n    <span class=\"p\">}</span>\r\n\r\n    <span class=\"k\" style=\"color: rgb(76, 191, 156);\">private</span> <span class=\"k\" style=\"color: rgb(76, 191, 156);\">function</span> <span class=\"n\" style=\"color: rgb(17, 93, 139);\">validatePerson</span><span class=\"p\">(</span><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$input</span><span class=\"p\">)</span>\r\n    <span class=\"p\">{</span>\r\n        <span class=\"k\" style=\"color: rgb(76, 191, 156);\">if</span> <span class=\"p\">(</span><span class=\"o\">!</span> <span class=\"k\" style=\"color: rgb(76, 191, 156);\">isset</span><span class=\"p\">(</span><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$input</span><span class=\"p\">[</span><span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'firstname\'</span><span class=\"p\">]))</span> <span class=\"p\">{</span>\r\n            <span class=\"k\" style=\"color: rgb(76, 191, 156);\">return</span> <span class=\"kc\" style=\"color: rgb(76, 191, 156);\">false</span><span class=\"p\">;</span>\r\n        <span class=\"p\">}</span>\r\n        <span class=\"k\" style=\"color: rgb(76, 191, 156);\">if</span> <span class=\"p\">(</span><span class=\"o\">!</span> <span class=\"k\" style=\"color: rgb(76, 191, 156);\">isset</span><span class=\"p\">(</span><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$input</span><span class=\"p\">[</span><span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'lastname\'</span><span class=\"p\">]))</span> <span class=\"p\">{</span>\r\n            <span class=\"k\" style=\"color: rgb(76, 191, 156);\">return</span> <span class=\"kc\" style=\"color: rgb(76, 191, 156);\">false</span><span class=\"p\">;</span>\r\n        <span class=\"p\">}</span>\r\n        <span class=\"k\" style=\"color: rgb(76, 191, 156);\">return</span> <span class=\"kc\" style=\"color: rgb(76, 191, 156);\">true</span><span class=\"p\">;</span>\r\n    <span class=\"p\">}</span>\r\n\r\n    <span class=\"k\" style=\"color: rgb(76, 191, 156);\">private</span> <span class=\"k\" style=\"color: rgb(76, 191, 156);\">function</span> <span class=\"n\" style=\"color: rgb(17, 93, 139);\">unprocessableEntityResponse</span><span class=\"p\">()</span>\r\n    <span class=\"p\">{</span>\r\n        <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$response</span><span class=\"p\">[</span><span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'status_code_header\'</span><span class=\"p\">]</span> <span class=\"o\">=</span> <span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'HTTP/1.1 422 Unprocessable Entity\'</span><span class=\"p\">;</span>\r\n        <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$response</span><span class=\"p\">[</span><span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'body\'</span><span class=\"p\">]</span> <span class=\"o\">=</span> <span class=\"nb\" style=\"color: rgb(17, 93, 139);\">json_encode</span><span class=\"p\">([</span>\r\n            <span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'error\'</span> <span class=\"o\">=&gt;</span> <span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'Invalid input\'</span>\r\n        <span class=\"p\">]);</span>\r\n        <span class=\"k\" style=\"color: rgb(76, 191, 156);\">return</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$response</span><span class=\"p\">;</span>\r\n    <span class=\"p\">}</span>\r\n\r\n    <span class=\"k\" style=\"color: rgb(76, 191, 156);\">private</span> <span class=\"k\" style=\"color: rgb(76, 191, 156);\">function</span> <span class=\"n\" style=\"color: rgb(17, 93, 139);\">notFoundResponse</span><span class=\"p\">()</span>\r\n    <span class=\"p\">{</span>\r\n        <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$response</span><span class=\"p\">[</span><span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'status_code_header\'</span><span class=\"p\">]</span> <span class=\"o\">=</span> <span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'HTTP/1.1 404 Not Found\'</span><span class=\"p\">;</span>\r\n        <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$response</span><span class=\"p\">[</span><span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'body\'</span><span class=\"p\">]</span> <span class=\"o\">=</span> <span class=\"kc\" style=\"color: rgb(76, 191, 156);\">null</span><span class=\"p\">;</span>\r\n        <span class=\"k\" style=\"color: rgb(76, 191, 156);\">return</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$response</span><span class=\"p\">;</span>\r\n    <span class=\"p\">}</span>\r\n<span class=\"p\">}</span>\r\n</code></pre></div></div><p style=\"margin: 20px 0px; color: rgb(93, 93, 93); font-family: proxima-nova, Helvetica, Arial, sans-serif;\">You can test the API with a tool like Postman. First, go to the project directory and start the PHP server:</p><div class=\"language-bash highlighter-rouge\" style=\"color: rgb(93, 93, 93); font-family: proxima-nova, Helvetica, Arial, sans-serif;\"><div class=\"highlight\"><pre class=\"highlight\" style=\"font-family: monospace, monospace; font-size: 1em; margin-top: 20px; margin-bottom: 20px; white-space: pre-wrap; padding: 15px; background: rgb(244, 244, 244); max-width: 900px; color: rgb(61, 61, 61);\"><code style=\"font-family: monospace, monospace; font-size: 1em; display: inline-block; white-space: pre; background: none; padding: 0px;\">php <span class=\"nt\" style=\"color: rgb(17, 93, 139);\">-S</span> 127.0.0.1:8000 <span class=\"nt\" style=\"color: rgb(17, 93, 139);\">-t</span> public\r\n</code></pre></div></div><p style=\"margin: 20px 0px; color: rgb(93, 93, 93); font-family: proxima-nova, Helvetica, Arial, sans-serif;\">Then connect to&nbsp;<code class=\"language-plaintext highlighter-rouge\" style=\"font-family: monospace, monospace; font-size: 1em; display: inline-block; white-space: pre; padding: 0px 5px; background: rgb(244, 244, 244); line-height: 24px;\">127.0.0.1:8000</code>&nbsp;with Postman and send http requests. Note: when making PUT and POST requests, make sure to set the Body type to&nbsp;<code class=\"language-plaintext highlighter-rouge\" style=\"font-family: monospace, monospace; font-size: 1em; display: inline-block; white-space: pre; padding: 0px 5px; background: rgb(244, 244, 244); line-height: 24px;\">raw</code>, then paste the payload in JSON format and set the content type to JSON (application/json).</p><h2 id=\"secure-your-php-rest-api-with-oauth-20\" style=\"margin: 60px 0px 10px; font-size: 38px; line-height: 54px; font-family: proxima-nova, Helvetica, sans-serif; color: rgb(93, 93, 93);\"><a href=\"https://developer.okta.com/blog/2019/03/08/simple-rest-api-php#secure-your-php-rest-api-with-oauth-20\" style=\"color: rgb(61, 61, 61); transition: color 0.4s ease 0s; position: relative;\">Secure Your PHP REST API with OAuth 2.0</a></h2><p style=\"margin: 20px 0px; color: rgb(93, 93, 93); font-family: proxima-nova, Helvetica, Arial, sans-serif;\">We’ll use Okta as our authorization server and we’ll implement the Client Credentials Flow. The flow is recommended for machine-to-machine authentication when the client is private and works like this: The client application holds a Client ID and a Secret; The client passes these credentials to Okta and obtains an access token; The client sends the access token to the REST API server; The server asks Okta for some metadata that allows it to verify tokens and validates the token (alternatively, it can just ask Okta to verify the token); The server then provides the API resource if the token is valid, or responds with a 401 Unauthorized status code if the token is missing, expired or invalid.</p><p style=\"margin: 20px 0px; color: rgb(93, 93, 93); font-family: proxima-nova, Helvetica, Arial, sans-serif;\">Before you proceed, you need to log into your Okta account (or&nbsp;<a href=\"https://developer.okta.com/signup/\" style=\"color: rgb(0, 125, 193); transition: color 0.4s ease 0s;\">create a new one for free</a>), create your authorization server and set up your client application.</p><p style=\"margin: 20px 0px; color: rgb(93, 93, 93); font-family: proxima-nova, Helvetica, Arial, sans-serif;\">Log in to your developer console, navigate to API, then to the Authorization Servers tab. Click on the link to your default server. We will copy the Issuer Uri field from this Settings tab and add it to our .env file:</p><div class=\"language-bash highlighter-rouge\" style=\"color: rgb(93, 93, 93); font-family: proxima-nova, Helvetica, Arial, sans-serif;\"><div class=\"highlight\"><pre class=\"highlight\" style=\"font-family: monospace, monospace; font-size: 1em; margin-top: 20px; margin-bottom: 20px; white-space: pre-wrap; padding: 15px; background: rgb(244, 244, 244); max-width: 900px; color: rgb(61, 61, 61);\"><code style=\"font-family: monospace, monospace; font-size: 1em; display: inline-block; white-space: pre; background: none; padding: 0px;\"><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">OKTAISSUER</span><span class=\"o\">=</span>https://<span class=\"o\">{</span>yourOktaDomain<span class=\"o\">}</span>/oauth2/default\r\n</code></pre></div></div><p style=\"margin: 20px 0px; color: rgb(93, 93, 93); font-family: proxima-nova, Helvetica, Arial, sans-serif;\"><img src=\"https://d33wubrfki0l68.cloudfront.net/a2a3089d69ed2091787f036835f33b11be680236/5e015/assets-jekyll/blog/php-rest-api/issuer-uri-3e49681c30392497b9c354af8c39e9eca952e38ddc62a1f4201acebb3e62c3a8.png\" alt=\"Find the issuer URI\" width=\"800\" class=\"center-image\" style=\"border: 0px; max-width: 100%; margin: 0px auto; display: block;\"></p><p style=\"margin: 20px 0px; color: rgb(93, 93, 93); font-family: proxima-nova, Helvetica, Arial, sans-serif;\">You can see the Issuer URI of my test Okta account in the screenshot above. Copy your own value and put it in your&nbsp;<code class=\"language-plaintext highlighter-rouge\" style=\"font-family: monospace, monospace; font-size: 1em; display: inline-block; white-space: pre; padding: 0px 5px; background: rgb(244, 244, 244); line-height: 24px;\">.env</code>&nbsp;file.</p><p style=\"margin: 20px 0px; color: rgb(93, 93, 93); font-family: proxima-nova, Helvetica, Arial, sans-serif;\">Next click the&nbsp;<span style=\"font-weight: 600;\">Edit</span>&nbsp;icon, go to the&nbsp;<span style=\"font-weight: 600;\">Scopes</span>&nbsp;tab and click&nbsp;<span style=\"font-weight: 600;\">Add Scope</span>&nbsp;to add a scope for the REST API. We’ll title it&nbsp;<code class=\"language-plaintext highlighter-rouge\" style=\"font-family: monospace, monospace; font-size: 1em; display: inline-block; white-space: pre; padding: 0px 5px; background: rgb(244, 244, 244); line-height: 24px;\">person_api</code>:</p><p style=\"margin: 20px 0px; color: rgb(93, 93, 93); font-family: proxima-nova, Helvetica, Arial, sans-serif;\"><img src=\"https://d33wubrfki0l68.cloudfront.net/8f18883a5564aa1c95fa53b521a55073564cb70b/be5c8/assets-jekyll/blog/php-rest-api/create-the-person-scope-f58079e15c73061ae5581e44fbaa6a8f0b3ec410656a684562b74157594b8d50.png\" alt=\"Create the person_api scope\" width=\"800\" class=\"center-image\" style=\"border: 0px; max-width: 100%; margin: 0px auto; display: block;\"></p><p style=\"margin: 20px 0px; color: rgb(93, 93, 93); font-family: proxima-nova, Helvetica, Arial, sans-serif;\">We need to add the scope to our&nbsp;<code class=\"language-plaintext highlighter-rouge\" style=\"font-family: monospace, monospace; font-size: 1em; display: inline-block; white-space: pre; padding: 0px 5px; background: rgb(244, 244, 244); line-height: 24px;\">.env</code>&nbsp;file as well. We’ll add the following to&nbsp;<code class=\"language-plaintext highlighter-rouge\" style=\"font-family: monospace, monospace; font-size: 1em; display: inline-block; white-space: pre; padding: 0px 5px; background: rgb(244, 244, 244); line-height: 24px;\">.env.example</code>:</p><div class=\"language-bash highlighter-rouge\" style=\"color: rgb(93, 93, 93); font-family: proxima-nova, Helvetica, Arial, sans-serif;\"><div class=\"highlight\"><pre class=\"highlight\" style=\"font-family: monospace, monospace; font-size: 1em; margin-top: 20px; margin-bottom: 20px; white-space: pre-wrap; padding: 15px; background: rgb(244, 244, 244); max-width: 900px; color: rgb(61, 61, 61);\"><code style=\"font-family: monospace, monospace; font-size: 1em; display: inline-block; white-space: pre; background: none; padding: 0px;\"><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">SCOPE</span><span class=\"o\">=</span>\r\n</code></pre></div></div><p style=\"margin: 20px 0px; color: rgb(93, 93, 93); font-family: proxima-nova, Helvetica, Arial, sans-serif;\">and the key with the value to .env:</p><div class=\"language-bash highlighter-rouge\" style=\"color: rgb(93, 93, 93); font-family: proxima-nova, Helvetica, Arial, sans-serif;\"><div class=\"highlight\"><pre class=\"highlight\" style=\"font-family: monospace, monospace; font-size: 1em; margin-top: 20px; margin-bottom: 20px; white-space: pre-wrap; padding: 15px; background: rgb(244, 244, 244); max-width: 900px; color: rgb(61, 61, 61);\"><code style=\"font-family: monospace, monospace; font-size: 1em; display: inline-block; white-space: pre; background: none; padding: 0px;\"><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">SCOPE</span><span class=\"o\">=</span>person_api\r\n</code></pre></div></div><p style=\"margin: 20px 0px; color: rgb(93, 93, 93); font-family: proxima-nova, Helvetica, Arial, sans-serif;\">The next step is to create a client. Navigate to&nbsp;<span style=\"font-weight: 600;\">Applications</span>, then click&nbsp;<span style=\"font-weight: 600;\">Add Application</span>. Select&nbsp;<span style=\"font-weight: 600;\">Service</span>, then click&nbsp;<span style=\"font-weight: 600;\">Next</span>. Enter a name for your service, (e.g. People Manager), then click&nbsp;<span style=\"font-weight: 600;\">Done</span>. This will take you to a page that has your client credentials:</p><p style=\"margin: 20px 0px; color: rgb(93, 93, 93); font-family: proxima-nova, Helvetica, Arial, sans-serif;\"><img src=\"https://d33wubrfki0l68.cloudfront.net/b3cead4231bdf5fba20e3277572de24664183959/73926/assets-jekyll/blog/php-rest-api/view-client-credentials-ab7c1ca4feb6f4556712d4ce589243281c5d557dd918d903ec709c10c3095cd4.png\" alt=\"View the client credentials\" width=\"800\" class=\"center-image\" style=\"border: 0px; max-width: 100%; margin: 0px auto; display: block;\"></p><p style=\"margin: 20px 0px; color: rgb(93, 93, 93); font-family: proxima-nova, Helvetica, Arial, sans-serif;\">These are the credentials that your client application will need in order to authenticate. For this example, the client and server code will be in the same repository, so we will add these credentials to our&nbsp;<code class=\"language-plaintext highlighter-rouge\" style=\"font-family: monospace, monospace; font-size: 1em; display: inline-block; white-space: pre; padding: 0px 5px; background: rgb(244, 244, 244); line-height: 24px;\">.env</code>&nbsp;file as well (make sure to replace&nbsp;<code class=\"language-plaintext highlighter-rouge\" style=\"font-family: monospace, monospace; font-size: 1em; display: inline-block; white-space: pre; padding: 0px 5px; background: rgb(244, 244, 244); line-height: 24px;\">{yourClientId}</code>&nbsp;and&nbsp;<code class=\"language-plaintext highlighter-rouge\" style=\"font-family: monospace, monospace; font-size: 1em; display: inline-block; white-space: pre; padding: 0px 5px; background: rgb(244, 244, 244); line-height: 24px;\">{yourClientSecret}</code>&nbsp;with the values from this page):</p><p style=\"margin: 20px 0px; color: rgb(93, 93, 93); font-family: proxima-nova, Helvetica, Arial, sans-serif;\">Add to .env.example:</p><div class=\"language-bash highlighter-rouge\" style=\"color: rgb(93, 93, 93); font-family: proxima-nova, Helvetica, Arial, sans-serif;\"><div class=\"highlight\"><pre class=\"highlight\" style=\"font-family: monospace, monospace; font-size: 1em; margin-top: 20px; margin-bottom: 20px; white-space: pre-wrap; padding: 15px; background: rgb(244, 244, 244); max-width: 900px; color: rgb(61, 61, 61);\"><code style=\"font-family: monospace, monospace; font-size: 1em; display: inline-block; white-space: pre; background: none; padding: 0px;\"><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">OKTACLIENTID</span><span class=\"o\">=</span>\r\n<span class=\"nv\" style=\"color: rgb(17, 93, 139);\">OKTASECRET</span><span class=\"o\">=</span>\r\n</code></pre></div></div><p style=\"margin: 20px 0px; color: rgb(93, 93, 93); font-family: proxima-nova, Helvetica, Arial, sans-serif;\">Add to .env:</p><div class=\"language-bash highlighter-rouge\" style=\"color: rgb(93, 93, 93); font-family: proxima-nova, Helvetica, Arial, sans-serif;\"><div class=\"highlight\"><pre class=\"highlight\" style=\"font-family: monospace, monospace; font-size: 1em; margin-top: 20px; margin-bottom: 20px; white-space: pre-wrap; padding: 15px; background: rgb(244, 244, 244); max-width: 900px; color: rgb(61, 61, 61);\"><code style=\"font-family: monospace, monospace; font-size: 1em; display: inline-block; white-space: pre; background: none; padding: 0px;\"><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">OKTACLIENTID</span><span class=\"o\">={</span>yourClientId<span class=\"o\">}</span>\r\n<span class=\"nv\" style=\"color: rgb(17, 93, 139);\">OKTASECRET</span><span class=\"o\">={</span>yourClientSecret<span class=\"o\">}</span>\r\n</code></pre></div></div><h2 id=\"add-authentication-to-your-php-rest-api\" style=\"margin: 60px 0px 10px; font-size: 38px; line-height: 54px; font-family: proxima-nova, Helvetica, sans-serif; color: rgb(93, 93, 93);\"><a href=\"https://developer.okta.com/blog/2019/03/08/simple-rest-api-php#add-authentication-to-your-php-rest-api\" style=\"color: rgb(61, 61, 61); transition: color 0.4s ease 0s; position: relative;\">Add Authentication to Your PHP REST API</a></h2><p style=\"margin: 20px 0px; color: rgb(93, 93, 93); font-family: proxima-nova, Helvetica, Arial, sans-serif;\">We’ll use the Okta JWT Verifier library. It requires a JWT library (we’ll use&nbsp;<code class=\"language-plaintext highlighter-rouge\" style=\"font-family: monospace, monospace; font-size: 1em; display: inline-block; white-space: pre; padding: 0px 5px; background: rgb(244, 244, 244); line-height: 24px;\">spomky-labs/jose</code>) and a PSR-7 compliant library (we’ll use&nbsp;<code class=\"language-plaintext highlighter-rouge\" style=\"font-family: monospace, monospace; font-size: 1em; display: inline-block; white-space: pre; padding: 0px 5px; background: rgb(244, 244, 244); line-height: 24px;\">guzzlehttp/psr7</code>). We’ll install everything through composer:</p><div class=\"language-bash highlighter-rouge\" style=\"color: rgb(93, 93, 93); font-family: proxima-nova, Helvetica, Arial, sans-serif;\"><div class=\"highlight\"><pre class=\"highlight\" style=\"font-family: monospace, monospace; font-size: 1em; margin-top: 20px; margin-bottom: 20px; white-space: pre-wrap; padding: 15px; background: rgb(244, 244, 244); max-width: 900px; color: rgb(61, 61, 61);\"><code style=\"font-family: monospace, monospace; font-size: 1em; display: inline-block; white-space: pre; background: none; padding: 0px;\">composer require okta/jwt-verifier spomky-labs/jose guzzlehttp/psr7\r\n</code></pre></div></div><p style=\"margin: 20px 0px; color: rgb(93, 93, 93); font-family: proxima-nova, Helvetica, Arial, sans-serif;\">Now we can add the authorization code to our front controller (if using a framework, we’ll do this in a middleware instead):</p><p style=\"margin: 20px 0px; color: rgb(93, 93, 93); font-family: proxima-nova, Helvetica, Arial, sans-serif;\"><code class=\"language-plaintext highlighter-rouge\" style=\"font-family: monospace, monospace; font-size: 1em; display: inline-block; white-space: pre; padding: 0px 5px; background: rgb(244, 244, 244); line-height: 24px;\">public/index.php</code>&nbsp;(full version for clarity)</p><div class=\"language-php highlighter-rouge\" style=\"color: rgb(93, 93, 93); font-family: proxima-nova, Helvetica, Arial, sans-serif;\"><div class=\"highlight\"><pre class=\"highlight\" style=\"font-family: monospace, monospace; font-size: 1em; margin-top: 20px; margin-bottom: 20px; white-space: pre-wrap; padding: 15px; background: rgb(244, 244, 244); max-width: 900px; color: rgb(61, 61, 61);\"><code style=\"font-family: monospace, monospace; font-size: 1em; display: inline-block; white-space: pre; background: none; padding: 0px;\"><span class=\"cp\" style=\"color: rgb(154, 154, 154); font-style: italic;\">&lt;?php</span>\r\n<span class=\"k\" style=\"color: rgb(76, 191, 156);\">require</span> <span class=\"s2\" style=\"color: rgb(226, 40, 102);\">\"../bootstrap.php\"</span><span class=\"p\">;</span>\r\n<span class=\"kn\" style=\"color: rgb(76, 191, 156);\">use</span> <span class=\"nc\" style=\"color: rgb(17, 93, 139);\">Src\\Controller\\PersonController</span><span class=\"p\">;</span>\r\n\r\n<span class=\"nb\" style=\"color: rgb(17, 93, 139);\">header</span><span class=\"p\">(</span><span class=\"s2\" style=\"color: rgb(226, 40, 102);\">\"Access-Control-Allow-Origin: *\"</span><span class=\"p\">);</span>\r\n<span class=\"nb\" style=\"color: rgb(17, 93, 139);\">header</span><span class=\"p\">(</span><span class=\"s2\" style=\"color: rgb(226, 40, 102);\">\"Content-Type: application/json; charset=UTF-8\"</span><span class=\"p\">);</span>\r\n<span class=\"nb\" style=\"color: rgb(17, 93, 139);\">header</span><span class=\"p\">(</span><span class=\"s2\" style=\"color: rgb(226, 40, 102);\">\"Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE\"</span><span class=\"p\">);</span>\r\n<span class=\"nb\" style=\"color: rgb(17, 93, 139);\">header</span><span class=\"p\">(</span><span class=\"s2\" style=\"color: rgb(226, 40, 102);\">\"Access-Control-Max-Age: 3600\"</span><span class=\"p\">);</span>\r\n<span class=\"nb\" style=\"color: rgb(17, 93, 139);\">header</span><span class=\"p\">(</span><span class=\"s2\" style=\"color: rgb(226, 40, 102);\">\"Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With\"</span><span class=\"p\">);</span>\r\n\r\n<span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$uri</span> <span class=\"o\">=</span> <span class=\"nb\" style=\"color: rgb(17, 93, 139);\">parse_url</span><span class=\"p\">(</span><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$_SERVER</span><span class=\"p\">[</span><span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'REQUEST_URI\'</span><span class=\"p\">],</span> <span class=\"kc\" style=\"color: rgb(76, 191, 156);\">PHP_URL_PATH</span><span class=\"p\">);</span>\r\n<span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$uri</span> <span class=\"o\">=</span> <span class=\"nb\" style=\"color: rgb(17, 93, 139);\">explode</span><span class=\"p\">(</span><span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'/\'</span><span class=\"p\">,</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$uri</span><span class=\"p\">);</span>\r\n\r\n<span class=\"c1\" style=\"color: rgb(154, 154, 154); font-style: italic;\">// all of our endpoints start with /person</span>\r\n<span class=\"c1\" style=\"color: rgb(154, 154, 154); font-style: italic;\">// everything else results in a 404 Not Found</span>\r\n<span class=\"k\" style=\"color: rgb(76, 191, 156);\">if</span> <span class=\"p\">(</span><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$uri</span><span class=\"p\">[</span><span class=\"mi\" style=\"color: rgb(153, 15, 105);\">1</span><span class=\"p\">]</span> <span class=\"o\">!==</span> <span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'person\'</span><span class=\"p\">)</span> <span class=\"p\">{</span>\r\n    <span class=\"nb\" style=\"color: rgb(17, 93, 139);\">header</span><span class=\"p\">(</span><span class=\"s2\" style=\"color: rgb(226, 40, 102);\">\"HTTP/1.1 404 Not Found\"</span><span class=\"p\">);</span>\r\n    <span class=\"k\" style=\"color: rgb(76, 191, 156);\">exit</span><span class=\"p\">();</span>\r\n<span class=\"p\">}</span>\r\n\r\n<span class=\"c1\" style=\"color: rgb(154, 154, 154); font-style: italic;\">// the user id is, of course, optional and must be a number:</span>\r\n<span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$userId</span> <span class=\"o\">=</span> <span class=\"kc\" style=\"color: rgb(76, 191, 156);\">null</span><span class=\"p\">;</span>\r\n<span class=\"k\" style=\"color: rgb(76, 191, 156);\">if</span> <span class=\"p\">(</span><span class=\"k\" style=\"color: rgb(76, 191, 156);\">isset</span><span class=\"p\">(</span><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$uri</span><span class=\"p\">[</span><span class=\"mi\" style=\"color: rgb(153, 15, 105);\">2</span><span class=\"p\">]))</span> <span class=\"p\">{</span>\r\n    <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$userId</span> <span class=\"o\">=</span> <span class=\"p\">(</span><span class=\"n\" style=\"color: rgb(17, 93, 139);\">int</span><span class=\"p\">)</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$uri</span><span class=\"p\">[</span><span class=\"mi\" style=\"color: rgb(153, 15, 105);\">2</span><span class=\"p\">];</span>\r\n<span class=\"p\">}</span>\r\n\r\n<span class=\"c1\" style=\"color: rgb(154, 154, 154); font-style: italic;\">// authenticate the request with Okta:</span>\r\n<span class=\"k\" style=\"color: rgb(76, 191, 156);\">if</span> <span class=\"p\">(</span><span class=\"o\">!</span> <span class=\"nf\" style=\"color: rgb(17, 93, 139);\">authenticate</span><span class=\"p\">())</span> <span class=\"p\">{</span>\r\n    <span class=\"nb\" style=\"color: rgb(17, 93, 139);\">header</span><span class=\"p\">(</span><span class=\"s2\" style=\"color: rgb(226, 40, 102);\">\"HTTP/1.1 401 Unauthorized\"</span><span class=\"p\">);</span>\r\n    <span class=\"k\" style=\"color: rgb(76, 191, 156);\">exit</span><span class=\"p\">(</span><span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'Unauthorized\'</span><span class=\"p\">);</span>\r\n<span class=\"p\">}</span>\r\n\r\n<span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$requestMethod</span> <span class=\"o\">=</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$_SERVER</span><span class=\"p\">[</span><span class=\"s2\" style=\"color: rgb(226, 40, 102);\">\"REQUEST_METHOD\"</span><span class=\"p\">];</span>\r\n\r\n<span class=\"c1\" style=\"color: rgb(154, 154, 154); font-style: italic;\">// pass the request method and user ID to the PersonController:</span>\r\n<span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$controller</span> <span class=\"o\">=</span> <span class=\"k\" style=\"color: rgb(76, 191, 156);\">new</span> <span class=\"nc\" style=\"color: rgb(17, 93, 139);\">PersonController</span><span class=\"p\">(</span><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$dbConnection</span><span class=\"p\">,</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$requestMethod</span><span class=\"p\">,</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$userId</span><span class=\"p\">);</span>\r\n<span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$controller</span><span class=\"o\">-&gt;</span><span class=\"nf\" style=\"color: rgb(17, 93, 139);\">processRequest</span><span class=\"p\">();</span>\r\n\r\n<span class=\"k\" style=\"color: rgb(76, 191, 156);\">function</span> <span class=\"n\" style=\"color: rgb(17, 93, 139);\">authenticate</span><span class=\"p\">()</span> <span class=\"p\">{</span>\r\n    <span class=\"k\" style=\"color: rgb(76, 191, 156);\">try</span> <span class=\"p\">{</span>\r\n        <span class=\"k\" style=\"color: rgb(76, 191, 156);\">switch</span><span class=\"p\">(</span><span class=\"kc\" style=\"color: rgb(76, 191, 156);\">true</span><span class=\"p\">)</span> <span class=\"p\">{</span>\r\n            <span class=\"k\" style=\"color: rgb(76, 191, 156);\">case</span> <span class=\"nb\" style=\"color: rgb(17, 93, 139);\">array_key_exists</span><span class=\"p\">(</span><span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'HTTP_AUTHORIZATION\'</span><span class=\"p\">,</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$_SERVER</span><span class=\"p\">)</span> <span class=\"o\">:</span>\r\n                <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$authHeader</span> <span class=\"o\">=</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$_SERVER</span><span class=\"p\">[</span><span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'HTTP_AUTHORIZATION\'</span><span class=\"p\">];</span>\r\n                <span class=\"k\" style=\"color: rgb(76, 191, 156);\">break</span><span class=\"p\">;</span>\r\n            <span class=\"k\" style=\"color: rgb(76, 191, 156);\">case</span> <span class=\"nb\" style=\"color: rgb(17, 93, 139);\">array_key_exists</span><span class=\"p\">(</span><span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'Authorization\'</span><span class=\"p\">,</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$_SERVER</span><span class=\"p\">)</span> <span class=\"o\">:</span>\r\n                <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$authHeader</span> <span class=\"o\">=</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$_SERVER</span><span class=\"p\">[</span><span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'Authorization\'</span><span class=\"p\">];</span>\r\n                <span class=\"k\" style=\"color: rgb(76, 191, 156);\">break</span><span class=\"p\">;</span>\r\n            <span class=\"k\" style=\"color: rgb(76, 191, 156);\">default</span> <span class=\"o\">:</span>\r\n                <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$authHeader</span> <span class=\"o\">=</span> <span class=\"kc\" style=\"color: rgb(76, 191, 156);\">null</span><span class=\"p\">;</span>\r\n                <span class=\"k\" style=\"color: rgb(76, 191, 156);\">break</span><span class=\"p\">;</span>\r\n        <span class=\"p\">}</span>\r\n        <span class=\"nb\" style=\"color: rgb(17, 93, 139);\">preg_match</span><span class=\"p\">(</span><span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'/Bearer\\s(\\S+)/\'</span><span class=\"p\">,</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$authHeader</span><span class=\"p\">,</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$matches</span><span class=\"p\">);</span>\r\n        <span class=\"k\" style=\"color: rgb(76, 191, 156);\">if</span><span class=\"p\">(</span><span class=\"o\">!</span><span class=\"k\" style=\"color: rgb(76, 191, 156);\">isset</span><span class=\"p\">(</span><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$matches</span><span class=\"p\">[</span><span class=\"mi\" style=\"color: rgb(153, 15, 105);\">1</span><span class=\"p\">]))</span> <span class=\"p\">{</span>\r\n            <span class=\"k\" style=\"color: rgb(76, 191, 156);\">throw</span> <span class=\"k\" style=\"color: rgb(76, 191, 156);\">new</span> <span class=\"err\">\\</span><span class=\"nf\" style=\"color: rgb(17, 93, 139);\">Exception</span><span class=\"p\">(</span><span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'No Bearer Token\'</span><span class=\"p\">);</span>\r\n        <span class=\"p\">}</span>\r\n        <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$jwtVerifier</span> <span class=\"o\">=</span> <span class=\"p\">(</span><span class=\"k\" style=\"color: rgb(76, 191, 156);\">new</span> <span class=\"err\">\\</span><span class=\"nf\" style=\"color: rgb(17, 93, 139);\">Okta\\JwtVerifier\\JwtVerifierBuilder</span><span class=\"p\">())</span>\r\n            <span class=\"o\">-&gt;</span><span class=\"nf\" style=\"color: rgb(17, 93, 139);\">setIssuer</span><span class=\"p\">(</span><span class=\"nb\" style=\"color: rgb(17, 93, 139);\">getenv</span><span class=\"p\">(</span><span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'OKTAISSUER\'</span><span class=\"p\">))</span>\r\n            <span class=\"o\">-&gt;</span><span class=\"nf\" style=\"color: rgb(17, 93, 139);\">setAudience</span><span class=\"p\">(</span><span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'api://default\'</span><span class=\"p\">)</span>\r\n            <span class=\"o\">-&gt;</span><span class=\"nf\" style=\"color: rgb(17, 93, 139);\">setClientId</span><span class=\"p\">(</span><span class=\"nb\" style=\"color: rgb(17, 93, 139);\">getenv</span><span class=\"p\">(</span><span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'OKTACLIENTID\'</span><span class=\"p\">))</span>\r\n            <span class=\"o\">-&gt;</span><span class=\"nf\" style=\"color: rgb(17, 93, 139);\">build</span><span class=\"p\">();</span>\r\n        <span class=\"k\" style=\"color: rgb(76, 191, 156);\">return</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$jwtVerifier</span><span class=\"o\">-&gt;</span><span class=\"nf\" style=\"color: rgb(17, 93, 139);\">verify</span><span class=\"p\">(</span><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$matches</span><span class=\"p\">[</span><span class=\"mi\" style=\"color: rgb(153, 15, 105);\">1</span><span class=\"p\">]);</span>\r\n    <span class=\"p\">}</span> <span class=\"k\" style=\"color: rgb(76, 191, 156);\">catch</span> <span class=\"p\">(</span><span class=\"err\">\\</span><span class=\"nc\" style=\"color: rgb(17, 93, 139);\">Exception</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$e</span><span class=\"p\">)</span> <span class=\"p\">{</span>\r\n        <span class=\"k\" style=\"color: rgb(76, 191, 156);\">return</span> <span class=\"kc\" style=\"color: rgb(76, 191, 156);\">false</span><span class=\"p\">;</span>\r\n    <span class=\"p\">}</span>\r\n<span class=\"p\">}</span>\r\n</code></pre></div></div><h2 id=\"build-a-sample-client-application-command-line-script-to-test-the-php-rest-api\" style=\"margin: 60px 0px 10px; font-size: 38px; line-height: 54px; font-family: proxima-nova, Helvetica, sans-serif; color: rgb(93, 93, 93);\"><a href=\"https://developer.okta.com/blog/2019/03/08/simple-rest-api-php#build-a-sample-client-application-command-line-script-to-test-the-php-rest-api\" style=\"color: rgb(61, 61, 61); transition: color 0.4s ease 0s; position: relative;\">Build a Sample Client Application (Command Line Script) to Test the PHP REST API</a></h2><p style=\"margin: 20px 0px; color: rgb(93, 93, 93); font-family: proxima-nova, Helvetica, Arial, sans-serif;\">In this section, we will add a simple client application (a command line script using curl) to test the REST API. We’ll create a new php file ‘public/clients.php’ with a very simple flow: it will retrieve the Okta details (issuer, scope, client id and secret) from the .env file, then it will obtain an access token from Okta and it will run API calls to get all users and get a specific user (passing the Okta access token in the Authorization header).</p><p style=\"margin: 20px 0px; color: rgb(93, 93, 93); font-family: proxima-nova, Helvetica, Arial, sans-serif;\"><code class=\"language-plaintext highlighter-rouge\" style=\"font-family: monospace, monospace; font-size: 1em; display: inline-block; white-space: pre; padding: 0px 5px; background: rgb(244, 244, 244); line-height: 24px;\">public/client.php</code></p><div class=\"language-php highlighter-rouge\" style=\"color: rgb(93, 93, 93); font-family: proxima-nova, Helvetica, Arial, sans-serif;\"><div class=\"highlight\"><pre class=\"highlight\" style=\"font-family: monospace, monospace; font-size: 1em; margin-top: 20px; margin-bottom: 20px; white-space: pre-wrap; padding: 15px; background: rgb(244, 244, 244); max-width: 900px; color: rgb(61, 61, 61);\"><code style=\"font-family: monospace, monospace; font-size: 1em; display: inline-block; white-space: pre; background: none; padding: 0px;\"><span class=\"cp\" style=\"color: rgb(154, 154, 154); font-style: italic;\">&lt;?php</span>\r\n<span class=\"k\" style=\"color: rgb(76, 191, 156);\">require</span> <span class=\"s2\" style=\"color: rgb(226, 40, 102);\">\"../bootstrap.php\"</span><span class=\"p\">;</span>\r\n\r\n<span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$clientId</span>     <span class=\"o\">=</span> <span class=\"nb\" style=\"color: rgb(17, 93, 139);\">getenv</span><span class=\"p\">(</span><span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'OKTACLIENTID\'</span><span class=\"p\">);</span>\r\n<span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$clientSecret</span> <span class=\"o\">=</span> <span class=\"nb\" style=\"color: rgb(17, 93, 139);\">getenv</span><span class=\"p\">(</span><span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'OKTASECRET\'</span><span class=\"p\">);</span>\r\n<span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$scope</span>        <span class=\"o\">=</span> <span class=\"nb\" style=\"color: rgb(17, 93, 139);\">getenv</span><span class=\"p\">(</span><span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'SCOPE\'</span><span class=\"p\">);</span>\r\n<span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$issuer</span>       <span class=\"o\">=</span> <span class=\"nb\" style=\"color: rgb(17, 93, 139);\">getenv</span><span class=\"p\">(</span><span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'OKTAISSUER\'</span><span class=\"p\">);</span>\r\n\r\n<span class=\"c1\" style=\"color: rgb(154, 154, 154); font-style: italic;\">// obtain an access token</span>\r\n<span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$token</span> <span class=\"o\">=</span> <span class=\"nf\" style=\"color: rgb(17, 93, 139);\">obtainToken</span><span class=\"p\">(</span><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$issuer</span><span class=\"p\">,</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$clientId</span><span class=\"p\">,</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$clientSecret</span><span class=\"p\">,</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$scope</span><span class=\"p\">);</span>\r\n\r\n<span class=\"c1\" style=\"color: rgb(154, 154, 154); font-style: italic;\">// test requests</span>\r\n<span class=\"nf\" style=\"color: rgb(17, 93, 139);\">getAllUsers</span><span class=\"p\">(</span><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$token</span><span class=\"p\">);</span>\r\n<span class=\"nf\" style=\"color: rgb(17, 93, 139);\">getUser</span><span class=\"p\">(</span><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$token</span><span class=\"p\">,</span> <span class=\"mi\" style=\"color: rgb(153, 15, 105);\">1</span><span class=\"p\">);</span>\r\n\r\n<span class=\"c1\" style=\"color: rgb(154, 154, 154); font-style: italic;\">// end of client.php flow</span>\r\n\r\n<span class=\"k\" style=\"color: rgb(76, 191, 156);\">function</span> <span class=\"n\" style=\"color: rgb(17, 93, 139);\">obtainToken</span><span class=\"p\">(</span><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$issuer</span><span class=\"p\">,</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$clientId</span><span class=\"p\">,</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$clientSecret</span><span class=\"p\">,</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$scope</span><span class=\"p\">)</span> <span class=\"p\">{</span>\r\n    <span class=\"k\" style=\"color: rgb(76, 191, 156);\">echo</span> <span class=\"s2\" style=\"color: rgb(226, 40, 102);\">\"Obtaining token...\"</span><span class=\"p\">;</span>\r\n\r\n    <span class=\"c1\" style=\"color: rgb(154, 154, 154); font-style: italic;\">// prepare the request</span>\r\n    <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$uri</span> <span class=\"o\">=</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$issuer</span> <span class=\"mf\" style=\"color: rgb(153, 15, 105);\">.</span> <span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'/v1/token\'</span><span class=\"p\">;</span>\r\n    <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$token</span> <span class=\"o\">=</span> <span class=\"nb\" style=\"color: rgb(17, 93, 139);\">base64_encode</span><span class=\"p\">(</span><span class=\"s2\" style=\"color: rgb(226, 40, 102);\">\"</span><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$clientId</span><span class=\"s2\" style=\"color: rgb(226, 40, 102);\">:</span><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$clientSecret</span><span class=\"s2\" style=\"color: rgb(226, 40, 102);\">\"</span><span class=\"p\">);</span>\r\n    <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$payload</span> <span class=\"o\">=</span> <span class=\"nb\" style=\"color: rgb(17, 93, 139);\">http_build_query</span><span class=\"p\">([</span>\r\n        <span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'grant_type\'</span> <span class=\"o\">=&gt;</span> <span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'client_credentials\'</span><span class=\"p\">,</span>\r\n        <span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'scope\'</span>      <span class=\"o\">=&gt;</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$scope</span>\r\n    <span class=\"p\">]);</span>\r\n\r\n    <span class=\"c1\" style=\"color: rgb(154, 154, 154); font-style: italic;\">// build the curl request</span>\r\n    <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$ch</span> <span class=\"o\">=</span> <span class=\"nb\" style=\"color: rgb(17, 93, 139);\">curl_init</span><span class=\"p\">();</span>\r\n    <span class=\"nb\" style=\"color: rgb(17, 93, 139);\">curl_setopt</span><span class=\"p\">(</span><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$ch</span><span class=\"p\">,</span> <span class=\"no\" style=\"color: rgb(17, 93, 139);\">CURLOPT_URL</span><span class=\"p\">,</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$uri</span><span class=\"p\">);</span>\r\n    <span class=\"nb\" style=\"color: rgb(17, 93, 139);\">curl_setopt</span><span class=\"p\">(</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$ch</span><span class=\"p\">,</span> <span class=\"no\" style=\"color: rgb(17, 93, 139);\">CURLOPT_HTTPHEADER</span><span class=\"p\">,</span> <span class=\"p\">[</span>\r\n        <span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'Content-Type: application/x-www-form-urlencoded\'</span><span class=\"p\">,</span>\r\n        <span class=\"s2\" style=\"color: rgb(226, 40, 102);\">\"Authorization: Basic </span><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$token</span><span class=\"s2\" style=\"color: rgb(226, 40, 102);\">\"</span>\r\n    <span class=\"p\">]);</span>\r\n    <span class=\"nb\" style=\"color: rgb(17, 93, 139);\">curl_setopt</span><span class=\"p\">(</span><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$ch</span><span class=\"p\">,</span> <span class=\"no\" style=\"color: rgb(17, 93, 139);\">CURLOPT_POST</span><span class=\"p\">,</span> <span class=\"mi\" style=\"color: rgb(153, 15, 105);\">1</span><span class=\"p\">);</span>\r\n    <span class=\"nb\" style=\"color: rgb(17, 93, 139);\">curl_setopt</span><span class=\"p\">(</span><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$ch</span><span class=\"p\">,</span> <span class=\"no\" style=\"color: rgb(17, 93, 139);\">CURLOPT_POSTFIELDS</span><span class=\"p\">,</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$payload</span><span class=\"p\">);</span>\r\n    <span class=\"nb\" style=\"color: rgb(17, 93, 139);\">curl_setopt</span><span class=\"p\">(</span><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$ch</span><span class=\"p\">,</span> <span class=\"no\" style=\"color: rgb(17, 93, 139);\">CURLOPT_RETURNTRANSFER</span><span class=\"p\">,</span> <span class=\"kc\" style=\"color: rgb(76, 191, 156);\">true</span><span class=\"p\">);</span>\r\n\r\n    <span class=\"c1\" style=\"color: rgb(154, 154, 154); font-style: italic;\">// process and return the response</span>\r\n    <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$response</span> <span class=\"o\">=</span> <span class=\"nb\" style=\"color: rgb(17, 93, 139);\">curl_exec</span><span class=\"p\">(</span><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$ch</span><span class=\"p\">);</span>\r\n    <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$response</span> <span class=\"o\">=</span> <span class=\"nb\" style=\"color: rgb(17, 93, 139);\">json_decode</span><span class=\"p\">(</span><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$response</span><span class=\"p\">,</span> <span class=\"kc\" style=\"color: rgb(76, 191, 156);\">true</span><span class=\"p\">);</span>\r\n    <span class=\"k\" style=\"color: rgb(76, 191, 156);\">if</span> <span class=\"p\">(</span><span class=\"o\">!</span> <span class=\"k\" style=\"color: rgb(76, 191, 156);\">isset</span><span class=\"p\">(</span><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$response</span><span class=\"p\">[</span><span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'access_token\'</span><span class=\"p\">])</span>\r\n        <span class=\"o\">||</span> <span class=\"o\">!</span> <span class=\"k\" style=\"color: rgb(76, 191, 156);\">isset</span><span class=\"p\">(</span><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$response</span><span class=\"p\">[</span><span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'token_type\'</span><span class=\"p\">]))</span> <span class=\"p\">{</span>\r\n        <span class=\"k\" style=\"color: rgb(76, 191, 156);\">exit</span><span class=\"p\">(</span><span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'failed, exiting.\'</span><span class=\"p\">);</span>\r\n    <span class=\"p\">}</span>\r\n\r\n    <span class=\"k\" style=\"color: rgb(76, 191, 156);\">echo</span> <span class=\"s2\" style=\"color: rgb(226, 40, 102);\">\"success!</span><span class=\"se\" style=\"color: rgb(153, 15, 105);\">\\n</span><span class=\"s2\" style=\"color: rgb(226, 40, 102);\">\"</span><span class=\"p\">;</span>\r\n    <span class=\"c1\" style=\"color: rgb(154, 154, 154); font-style: italic;\">// here\'s your token to use in API requests</span>\r\n    <span class=\"k\" style=\"color: rgb(76, 191, 156);\">return</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$response</span><span class=\"p\">[</span><span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'token_type\'</span><span class=\"p\">]</span> <span class=\"mf\" style=\"color: rgb(153, 15, 105);\">.</span> <span class=\"s2\" style=\"color: rgb(226, 40, 102);\">\" \"</span> <span class=\"mf\" style=\"color: rgb(153, 15, 105);\">.</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$response</span><span class=\"p\">[</span><span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'access_token\'</span><span class=\"p\">];</span>\r\n<span class=\"p\">}</span>\r\n\r\n<span class=\"k\" style=\"color: rgb(76, 191, 156);\">function</span> <span class=\"n\" style=\"color: rgb(17, 93, 139);\">getAllUsers</span><span class=\"p\">(</span><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$token</span><span class=\"p\">)</span> <span class=\"p\">{</span>\r\n    <span class=\"k\" style=\"color: rgb(76, 191, 156);\">echo</span> <span class=\"s2\" style=\"color: rgb(226, 40, 102);\">\"Getting all users...\"</span><span class=\"p\">;</span>\r\n    <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$ch</span> <span class=\"o\">=</span> <span class=\"nb\" style=\"color: rgb(17, 93, 139);\">curl_init</span><span class=\"p\">();</span>\r\n    <span class=\"nb\" style=\"color: rgb(17, 93, 139);\">curl_setopt</span><span class=\"p\">(</span><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$ch</span><span class=\"p\">,</span> <span class=\"no\" style=\"color: rgb(17, 93, 139);\">CURLOPT_URL</span><span class=\"p\">,</span> <span class=\"s2\" style=\"color: rgb(226, 40, 102);\">\"http://127.0.0.1:8000/person\"</span><span class=\"p\">);</span>\r\n    <span class=\"nb\" style=\"color: rgb(17, 93, 139);\">curl_setopt</span><span class=\"p\">(</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$ch</span><span class=\"p\">,</span> <span class=\"no\" style=\"color: rgb(17, 93, 139);\">CURLOPT_HTTPHEADER</span><span class=\"p\">,</span> <span class=\"p\">[</span>\r\n        <span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'Content-Type: application/json\'</span><span class=\"p\">,</span>\r\n        <span class=\"s2\" style=\"color: rgb(226, 40, 102);\">\"Authorization: </span><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$token</span><span class=\"s2\" style=\"color: rgb(226, 40, 102);\">\"</span>\r\n    <span class=\"p\">]);</span>\r\n    <span class=\"nb\" style=\"color: rgb(17, 93, 139);\">curl_setopt</span><span class=\"p\">(</span><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$ch</span><span class=\"p\">,</span> <span class=\"no\" style=\"color: rgb(17, 93, 139);\">CURLOPT_RETURNTRANSFER</span><span class=\"p\">,</span> <span class=\"kc\" style=\"color: rgb(76, 191, 156);\">true</span><span class=\"p\">);</span>\r\n    <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$response</span> <span class=\"o\">=</span> <span class=\"nb\" style=\"color: rgb(17, 93, 139);\">curl_exec</span><span class=\"p\">(</span><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$ch</span><span class=\"p\">);</span>\r\n\r\n    <span class=\"nb\" style=\"color: rgb(17, 93, 139);\">var_dump</span><span class=\"p\">(</span><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$response</span><span class=\"p\">);</span>\r\n<span class=\"p\">}</span>\r\n\r\n<span class=\"k\" style=\"color: rgb(76, 191, 156);\">function</span> <span class=\"n\" style=\"color: rgb(17, 93, 139);\">getUser</span><span class=\"p\">(</span><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$token</span><span class=\"p\">,</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$id</span><span class=\"p\">)</span> <span class=\"p\">{</span>\r\n    <span class=\"k\" style=\"color: rgb(76, 191, 156);\">echo</span> <span class=\"s2\" style=\"color: rgb(226, 40, 102);\">\"Getting user with id#</span><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$id</span><span class=\"s2\" style=\"color: rgb(226, 40, 102);\">...\"</span><span class=\"p\">;</span>\r\n    <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$ch</span> <span class=\"o\">=</span> <span class=\"nb\" style=\"color: rgb(17, 93, 139);\">curl_init</span><span class=\"p\">();</span>\r\n    <span class=\"nb\" style=\"color: rgb(17, 93, 139);\">curl_setopt</span><span class=\"p\">(</span><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$ch</span><span class=\"p\">,</span> <span class=\"no\" style=\"color: rgb(17, 93, 139);\">CURLOPT_URL</span><span class=\"p\">,</span> <span class=\"s2\" style=\"color: rgb(226, 40, 102);\">\"http://127.0.0.1:8000/person/\"</span> <span class=\"mf\" style=\"color: rgb(153, 15, 105);\">.</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$id</span><span class=\"p\">);</span>\r\n    <span class=\"nb\" style=\"color: rgb(17, 93, 139);\">curl_setopt</span><span class=\"p\">(</span> <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$ch</span><span class=\"p\">,</span> <span class=\"no\" style=\"color: rgb(17, 93, 139);\">CURLOPT_HTTPHEADER</span><span class=\"p\">,</span> <span class=\"p\">[</span>\r\n        <span class=\"s1\" style=\"color: rgb(226, 40, 102);\">\'Content-Type: application/json\'</span><span class=\"p\">,</span>\r\n        <span class=\"s2\" style=\"color: rgb(226, 40, 102);\">\"Authorization: </span><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$token</span><span class=\"s2\" style=\"color: rgb(226, 40, 102);\">\"</span>\r\n    <span class=\"p\">]);</span>\r\n    <span class=\"nb\" style=\"color: rgb(17, 93, 139);\">curl_setopt</span><span class=\"p\">(</span><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$ch</span><span class=\"p\">,</span> <span class=\"no\" style=\"color: rgb(17, 93, 139);\">CURLOPT_RETURNTRANSFER</span><span class=\"p\">,</span> <span class=\"kc\" style=\"color: rgb(76, 191, 156);\">true</span><span class=\"p\">);</span>\r\n    <span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$response</span> <span class=\"o\">=</span> <span class=\"nb\" style=\"color: rgb(17, 93, 139);\">curl_exec</span><span class=\"p\">(</span><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$ch</span><span class=\"p\">);</span>\r\n\r\n    <span class=\"nb\" style=\"color: rgb(17, 93, 139);\">var_dump</span><span class=\"p\">(</span><span class=\"nv\" style=\"color: rgb(17, 93, 139);\">$response</span><span class=\"p\">);</span>\r\n<span class=\"p\">}</span>\r\n</code></pre></div></div><p style=\"margin: 20px 0px; color: rgb(93, 93, 93); font-family: proxima-nova, Helvetica, Arial, sans-serif;\">You can run the application from the command line by going to the&nbsp;<code class=\"language-plaintext highlighter-rouge\" style=\"font-family: monospace, monospace; font-size: 1em; display: inline-block; white-space: pre; padding: 0px 5px; background: rgb(244, 244, 244); line-height: 24px;\">/public</code>&nbsp;directory and running:</p><div class=\"language-bash highlighter-rouge\" style=\"color: rgb(93, 93, 93); font-family: proxima-nova, Helvetica, Arial, sans-serif;\"><div class=\"highlight\"><pre class=\"highlight\" style=\"font-family: monospace, monospace; font-size: 1em; margin-top: 20px; margin-bottom: 20px; white-space: pre-wrap; padding: 15px; background: rgb(244, 244, 244); max-width: 900px; color: rgb(61, 61, 61);\"><code style=\"font-family: monospace, monospace; font-size: 1em; display: inline-block; white-space: pre; background: none; padding: 0px;\">php client.php\r\n</code></pre></div></div><p style=\"margin: 20px 0px; color: rgb(93, 93, 93); font-family: proxima-nova, Helvetica, Arial, sans-serif;\">(Don’t forget to start the server if you haven’t already!)</p><div class=\"language-bash highlighter-rouge\" style=\"color: rgb(93, 93, 93); font-family: proxima-nova, Helvetica, Arial, sans-serif;\"><div class=\"highlight\"><pre class=\"highlight\" style=\"font-family: monospace, monospace; font-size: 1em; margin-top: 20px; margin-bottom: 20px; white-space: pre-wrap; padding: 15px; background: rgb(244, 244, 244); max-width: 900px; color: rgb(61, 61, 61);\"><code style=\"font-family: monospace, monospace; font-size: 1em; display: inline-block; white-space: pre; background: none; padding: 0px;\">php <span class=\"nt\" style=\"color: rgb(17, 93, 139);\">-S</span> 127.0.0.1:8000 <span class=\"nt\" style=\"color: rgb(17, 93, 139);\">-t</span> public\r\n</code></pre></div></div><p style=\"margin: 20px 0px; color: rgb(93, 93, 93); font-family: proxima-nova, Helvetica, Arial, sans-serif;\">That’s it!</p><div><br></div>', '/storage/images/journals/1600770710.png', 'Sharing', 1, NULL, '2020-09-22 10:31:50', '2020-09-22 10:31:50');
INSERT INTO `journals` (`id`, `title`, `content`, `file`, `type`, `user_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(9, 'Laravel: View Composer', '<p id=\"7679\" class=\"jr js ho jt b ju jv jw jx jy jz ka kb kc kd ke kf kg kh ki kj kk kl km kn ko gn aq\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 2em 0px -0.46em; color: rgb(41, 41, 41); word-break: break-word; line-height: 32px; letter-spacing: -0.003em; font-family: medium-content-serif-font, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-size: 21px;\">One of the exciting features Laravel provides is the&nbsp;<em class=\"kp\" style=\"box-sizing: inherit;\">view composer</em>. In my opinion a really powerful view extension which allows the developer to pass variables from a global point to the template.</p><h2 id=\"7338\" class=\"kq kr ho bi fn ks kt jw ku kv ka kw kx ke ky kz ki la lb km lc aq\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 1.72em 0px -0.31em; color: rgb(41, 41, 41); font-family: medium-content-sans-serif-font, &quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, &quot;Lucida Sans&quot;, Geneva, Arial, sans-serif; font-weight: 600; line-height: 32px; letter-spacing: -0.022em; font-size: 26px;\">How can I make use of view composers?</h2><p id=\"42ae\" class=\"jr js ho jt b ju ld jw jx jy le ka kb kc lf ke kf kg lg ki kj kk lh km kn ko gn aq\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 0.86em 0px -0.46em; color: rgb(41, 41, 41); word-break: break-word; line-height: 32px; letter-spacing: -0.003em; font-family: medium-content-serif-font, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-size: 21px;\">First of all you need to know that there are two different types of v<em class=\"kp\" style=\"box-sizing: inherit;\">iew composers</em>. Class based and Closure Based.</p><figure class=\"li lj lk ll lm gz\" style=\"box-sizing: inherit; margin-top: 56px; margin-bottom: 0px; clear: both; color: rgba(0, 0, 0, 0.8); font-family: medium-content-sans-serif-font, -apple-system, system-ui, &quot;Segoe UI&quot;, Roboto, Oxygen, Ubuntu, Cantarell, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, sans-serif; font-size: medium;\"><div class=\"hg s cx\" style=\"box-sizing: inherit; position: relative; margin: auto;\"><div class=\"sy hi s\" style=\"box-sizing: inherit; height: 0px; padding-bottom: 241px;\"><iframe src=\"https://medium.com/media/84a05aa02d299a9f8722b6eac396d929\" allowfullscreen=\"\" frameborder=\"0\" height=\"241\" width=\"680\" title=\"medium-view-composers.php\" class=\"t u v em aj\" scrolling=\"auto\" style=\"box-sizing: inherit; position: absolute; top: 0px; left: 0px; width: 680px; height: 241px;\"></iframe></div></div></figure><p id=\"714d\" class=\"jr js ho jt b ju jv jw jx jy jz ka kb kc kd ke kf kg kh ki kj kk kl km kn ko gn aq\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 2em 0px -0.46em; color: rgb(41, 41, 41); word-break: break-word; line-height: 32px; letter-spacing: -0.003em; font-family: medium-content-serif-font, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-size: 21px;\">The difference is pretty simple,&nbsp;<span class=\"jt lo\" style=\"box-sizing: inherit; font-family: medium-content-serif-font, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-weight: 700;\">closures</span>&nbsp;are easy to use without putting to much effort into the setup but they lead to overloading of the service provider.</p><p id=\"db12\" class=\"jr js ho jt b ju jv jw jx jy jz ka kb kc kd ke kf kg kh ki kj kk kl km kn ko gn aq\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 2em 0px -0.46em; color: rgb(41, 41, 41); word-break: break-word; line-height: 32px; letter-spacing: -0.003em; font-family: medium-content-serif-font, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-size: 21px;\"><span class=\"jt lo\" style=\"box-sizing: inherit; font-family: medium-content-serif-font, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-weight: 700;\">Class based</span>&nbsp;<em class=\"kp\" style=\"box-sizing: inherit;\">view composers</em>&nbsp;on the other hand lead you directly to the design principle&nbsp;<span class=\"jt lo\" style=\"box-sizing: inherit; font-family: medium-content-serif-font, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-weight: 700;\">separation of concerns.&nbsp;</span>Another benefit is that you are able to test isolated this piece of code and it is easier for other developers to maintain the existing code.</p><blockquote class=\"lp\" style=\"box-sizing: inherit; margin-bottom: 0px; padding-left: 30px; color: rgba(0, 0, 0, 0.8); font-family: medium-content-sans-serif-font, -apple-system, system-ui, &quot;Segoe UI&quot;, Roboto, Oxygen, Ubuntu, Cantarell, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, sans-serif; font-size: medium;\"><p id=\"8e40\" class=\"lq lr ho hp b ls lt lu lv lw lx ko bm\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 2.75em 0px -0.46em; color: rgb(117, 117, 117); font-family: medium-content-title-font, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; line-height: 44px; letter-spacing: -0.014em; font-size: 30px;\">In computer science, separation of concerns (SoC) is the process of breaking a computer program into distinct features that overlap in functionality as little as possible. A concern is any piece of interest or focus in a program. Typically, concerns are synonymous with features or behaviors. Progress towards SoC is traditionally achieved through modularity and encapsulation with the help of information hiding.</p></blockquote><h2 id=\"29fd\" class=\"kq kr ho bi fn ks ly jw ku lz ka kw ma ke ky mb ki la mc km lc aq\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 2.64em 0px -0.31em; color: rgb(41, 41, 41); font-family: medium-content-sans-serif-font, &quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, &quot;Lucida Sans&quot;, Geneva, Arial, sans-serif; font-weight: 600; line-height: 32px; letter-spacing: -0.022em; font-size: 26px;\">Understanding the View::composer method parameters</h2><p id=\"ec9e\" class=\"jr js ho jt b ju ld jw jx jy le ka kb kc lf ke kf kg lg ki kj kk lh km kn ko gn aq\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 0.86em 0px -0.46em; color: rgb(41, 41, 41); word-break: break-word; line-height: 32px; letter-spacing: -0.003em; font-family: medium-content-serif-font, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-size: 21px;\">In the example, you can see that the View::composer method has two parameters.</p><figure class=\"li lj lk ll lm gz\" style=\"box-sizing: inherit; margin-top: 56px; margin-bottom: 0px; clear: both; color: rgba(0, 0, 0, 0.8); font-family: medium-content-sans-serif-font, -apple-system, system-ui, &quot;Segoe UI&quot;, Roboto, Oxygen, Ubuntu, Cantarell, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, sans-serif; font-size: medium;\"><div class=\"hg s cx\" style=\"box-sizing: inherit; position: relative; margin: auto;\"><div class=\"sy hi s\" style=\"box-sizing: inherit; height: 0px; padding-bottom: 241px;\"><iframe src=\"https://medium.com/media/84a05aa02d299a9f8722b6eac396d929\" allowfullscreen=\"\" frameborder=\"0\" height=\"241\" width=\"680\" title=\"medium-view-composers.php\" class=\"t u v em aj\" scrolling=\"auto\" style=\"box-sizing: inherit; position: absolute; top: 0px; left: 0px; width: 680px; height: 241px;\"></iframe></div></div></figure><p id=\"1910\" class=\"jr js ho jt b ju jv jw jx jy jz ka kb kc kd ke kf kg kh ki kj kk kl km kn ko gn aq\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 2em 0px -0.46em; color: rgb(41, 41, 41); word-break: break-word; line-height: 32px; letter-spacing: -0.003em; font-family: medium-content-serif-font, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-size: 21px;\"><span class=\"jt lo\" style=\"box-sizing: inherit; font-family: medium-content-serif-font, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-weight: 700;\">The first parameter</span>&nbsp;is a string or an array of view names, which you want to listen to. This means, if this template gets rendered, your&nbsp;<em class=\"kp\" style=\"box-sizing: inherit;\">view composer</em>&nbsp;gets triggered and will pass the included variables to the view.</p><p id=\"79c7\" class=\"jr js ho jt b ju jv jw jx jy jz ka kb kc kd ke kf kg kh ki kj kk kl km kn ko gn aq\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 2em 0px -0.46em; color: rgb(41, 41, 41); word-break: break-word; line-height: 32px; letter-spacing: -0.003em; font-family: medium-content-serif-font, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-size: 21px;\">Instead of selecting all templates manually you can also use wildcards. This can be done by the Asterisk (*) character and it is really useful if you want to append data to every view, even more if the application has a complex template structure with several subfolders.</p><p id=\"2dfa\" class=\"jr js ho jt b ju jv jw jx jy jz ka kb kc kd ke kf kg kh ki kj kk kl km kn ko gn aq\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 2em 0px -0.46em; color: rgb(41, 41, 41); word-break: break-word; line-height: 32px; letter-spacing: -0.003em; font-family: medium-content-serif-font, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-size: 21px;\">Use cases could be for example the sidebar or navigation elements which need to be in each view.</p><figure class=\"li lj lk ll lm gz\" style=\"box-sizing: inherit; margin-top: 56px; margin-bottom: 0px; clear: both; color: rgba(0, 0, 0, 0.8); font-family: medium-content-sans-serif-font, -apple-system, system-ui, &quot;Segoe UI&quot;, Roboto, Oxygen, Ubuntu, Cantarell, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, sans-serif; font-size: medium;\"><div class=\"hg s cx\" style=\"box-sizing: inherit; position: relative; margin: auto;\"><div class=\"xd hi s\" style=\"box-sizing: inherit; height: 0px; padding-bottom: 263px;\"><iframe src=\"https://medium.com/media/eba8fe8f5c94b7af726eadcb5a20d114\" allowfullscreen=\"\" frameborder=\"0\" height=\"263\" width=\"680\" title=\"view-composer-parameters.php\" class=\"t u v em aj\" scrolling=\"auto\" style=\"box-sizing: inherit; position: absolute; top: 0px; left: 0px; width: 680px; height: 263px;\"></iframe></div></div></figure><p id=\"c223\" class=\"jr js ho jt b ju jv jw jx jy jz ka kb kc kd ke kf kg kh ki kj kk kl km kn ko gn aq\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 2em 0px -0.46em; color: rgb(41, 41, 41); word-break: break-word; line-height: 32px; letter-spacing: -0.003em; font-family: medium-content-serif-font, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-size: 21px;\"><span class=\"jt lo\" style=\"box-sizing: inherit; font-family: medium-content-serif-font, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-weight: 700;\">The second parameter&nbsp;</span>is either the closure or the class name of the&nbsp;<em class=\"kp\" style=\"box-sizing: inherit;\">view composer</em>.</p><p id=\"47b8\" class=\"jr js ho jt b ju jv jw jx jy jz ka kb kc kd ke kf kg kh ki kj kk kl km kn ko gn aq\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 2em 0px -0.46em; color: rgb(41, 41, 41); word-break: break-word; line-height: 32px; letter-spacing: -0.003em; font-family: medium-content-serif-font, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-size: 21px;\">In both ways you have the parameter&nbsp;<em class=\"kp\" style=\"box-sizing: inherit;\">$view</em>&nbsp;bound as a parameter and with it you can simply append variables to the view by using the method&nbsp;<span class=\"jt lo\" style=\"box-sizing: inherit; font-family: medium-content-serif-font, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-weight: 700;\">-&gt;with().</span></p><figure class=\"li lj lk ll lm gz\" style=\"box-sizing: inherit; margin-top: 56px; margin-bottom: 0px; clear: both; color: rgba(0, 0, 0, 0.8); font-family: medium-content-sans-serif-font, -apple-system, system-ui, &quot;Segoe UI&quot;, Roboto, Oxygen, Ubuntu, Cantarell, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, sans-serif; font-size: medium;\"><div class=\"hg s cx\" style=\"box-sizing: inherit; position: relative; margin: auto;\"><div class=\"xe hi s\" style=\"box-sizing: inherit; height: 0px; padding-bottom: 681px;\"><iframe src=\"https://medium.com/media/985d3664c6e3d4cffd112c3319dc6b0b\" allowfullscreen=\"\" frameborder=\"0\" height=\"681\" width=\"680\" title=\"wildcard-view-composers.php\" class=\"t u v em aj\" scrolling=\"auto\" style=\"box-sizing: inherit; position: absolute; top: 0px; left: 0px; width: 680px; height: 681px;\"></iframe></div></div></figure><h2 id=\"3066\" class=\"kq kr ho bi fn ks kt jw ku kv ka kw kx ke ky kz ki la lb km lc aq\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 1.72em 0px -0.31em; color: rgb(41, 41, 41); font-family: medium-content-sans-serif-font, &quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, &quot;Lucida Sans&quot;, Geneva, Arial, sans-serif; font-weight: 600; line-height: 32px; letter-spacing: -0.022em; font-size: 26px;\">Setting up the view composer</h2><p id=\"c6a9\" class=\"jr js ho jt b ju ld jw jx jy le ka kb kc lf ke kf kg lg ki kj kk lh km kn ko gn aq\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 0.86em 0px -0.46em; color: rgb(41, 41, 41); word-break: break-word; line-height: 32px; letter-spacing: -0.003em; font-family: medium-content-serif-font, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-size: 21px;\">As you might know Laravel works a lot with providers you can now guess what is coming next? Yes, we have to register a service provider and within the provider we can make use of the just learned usage of the&nbsp;<em class=\"kp\" style=\"box-sizing: inherit;\">view composer</em>.</p><figure class=\"li lj lk ll lm gz\" style=\"box-sizing: inherit; margin-top: 56px; margin-bottom: 0px; clear: both; color: rgba(0, 0, 0, 0.8); font-family: medium-content-sans-serif-font, -apple-system, system-ui, &quot;Segoe UI&quot;, Roboto, Oxygen, Ubuntu, Cantarell, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, sans-serif; font-size: medium;\"><div class=\"hg s cx\" style=\"box-sizing: inherit; position: relative; margin: auto;\"><div class=\"xf hi s\" style=\"box-sizing: inherit; height: 0px; padding-bottom: 659px;\"><iframe src=\"https://medium.com/media/b9369d9a91c3614173180418ca50d183\" allowfullscreen=\"\" frameborder=\"0\" height=\"659\" width=\"680\" title=\"Medium-ViewComposerServiceProvider.php\" class=\"t u v em aj\" scrolling=\"auto\" style=\"box-sizing: inherit; position: absolute; top: 0px; left: 0px; width: 680px; height: 659px;\"></iframe></div></div><figcaption class=\"md me gj gh gi mf mg bi bj bk bl bm\" style=\"box-sizing: inherit; font-family: medium-content-sans-serif-font, &quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, &quot;Lucida Sans&quot;, Geneva, Arial, sans-serif; font-size: 16px; line-height: 20px; color: rgb(117, 117, 117); margin-left: auto; margin-right: auto; max-width: 728px; margin-top: 10px; text-align: center;\">View Composer Service Provider</figcaption></figure><p id=\"c2ed\" class=\"jr js ho jt b ju jv jw jx jy jz ka kb kc kd ke kf kg kh ki kj kk kl km kn ko gn aq\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 2em 0px -0.46em; color: rgb(41, 41, 41); word-break: break-word; line-height: 32px; letter-spacing: -0.003em; font-family: medium-content-serif-font, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-size: 21px;\">The only thing left now is registering the new service provider in the ~/config/app.php</p><figure class=\"li lj lk ll lm gz\" style=\"box-sizing: inherit; margin-top: 56px; margin-bottom: 0px; clear: both; color: rgba(0, 0, 0, 0.8); font-family: medium-content-sans-serif-font, -apple-system, system-ui, &quot;Segoe UI&quot;, Roboto, Oxygen, Ubuntu, Cantarell, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, sans-serif; font-size: medium;\"><div class=\"hg s cx\" style=\"box-sizing: inherit; position: relative; margin: auto;\"><div class=\"xg hi s\" style=\"box-sizing: inherit; height: 0px; padding-bottom: 461px;\"><iframe src=\"https://medium.com/media/aa37bee49386090464ed6be49bca3b09\" allowfullscreen=\"\" frameborder=\"0\" height=\"461\" width=\"680\" title=\"medium-app.php\" class=\"t u v em aj\" scrolling=\"auto\" style=\"box-sizing: inherit; position: absolute; top: 0px; left: 0px; width: 680px; height: 461px;\"></iframe></div></div></figure><p id=\"68b8\" class=\"jr js ho jt b ju jv jw jx jy jz ka kb kc kd ke kf kg kh ki kj kk kl km kn ko gn aq\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 2em 0px -0.46em; color: rgb(41, 41, 41); word-break: break-word; line-height: 32px; letter-spacing: -0.003em; font-family: medium-content-serif-font, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-size: 21px;\">That’s it, now we are good to go and can test the&nbsp;<em class=\"kp\" style=\"box-sizing: inherit;\">view composer</em>.</p><h2 id=\"a045\" class=\"kq kr ho bi fn ks kt jw ku kv ka kw kx ke ky kz ki la lb km lc aq\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 1.72em 0px -0.31em; color: rgb(41, 41, 41); font-family: medium-content-sans-serif-font, &quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, &quot;Lucida Sans&quot;, Geneva, Arial, sans-serif; font-weight: 600; line-height: 32px; letter-spacing: -0.022em; font-size: 26px;\">Testing a view composer</h2><p id=\"a582\" class=\"jr js ho jt b ju ld jw jx jy le ka kb kc lf ke kf kg lg ki kj kk lh km kn ko gn aq\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 0.86em 0px -0.46em; color: rgb(41, 41, 41); word-break: break-word; line-height: 32px; letter-spacing: -0.003em; font-family: medium-content-serif-font, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-size: 21px;\">Let’s imagine we have a page called&nbsp;<em class=\"kp\" style=\"box-sizing: inherit;\">/detail&nbsp;</em>and this page needs a simple array of navigation items (see code below).</p><figure class=\"li lj lk ll lm gz\" style=\"box-sizing: inherit; margin-top: 56px; margin-bottom: 0px; clear: both; color: rgba(0, 0, 0, 0.8); font-family: medium-content-sans-serif-font, -apple-system, system-ui, &quot;Segoe UI&quot;, Roboto, Oxygen, Ubuntu, Cantarell, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, sans-serif; font-size: medium;\"><div class=\"hg s cx\" style=\"box-sizing: inherit; position: relative; margin: auto;\"><div class=\"xg hi s\" style=\"box-sizing: inherit; height: 0px; padding-bottom: 461px;\"><iframe src=\"https://medium.com/media/1225af933396f81e66359d33c8ce158e\" allowfullscreen=\"\" frameborder=\"0\" height=\"461\" width=\"680\" title=\"Medium-NavigationComposer.php\" class=\"t u v em aj\" scrolling=\"auto\" style=\"box-sizing: inherit; position: absolute; top: 0px; left: 0px; width: 680px; height: 461px;\"></iframe></div></div><figcaption class=\"md me gj gh gi mf mg bi bj bk bl bm\" style=\"box-sizing: inherit; font-family: medium-content-sans-serif-font, &quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, &quot;Lucida Sans&quot;, Geneva, Arial, sans-serif; font-size: 16px; line-height: 20px; color: rgb(117, 117, 117); margin-left: auto; margin-right: auto; max-width: 728px; margin-top: 10px; text-align: center;\">Navigation Composer example for the test</figcaption></figure><p id=\"2c00\" class=\"jr js ho jt b ju jv jw jx jy jz ka kb kc kd ke kf kg kh ki kj kk kl km kn ko gn aq\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 2em 0px -0.46em; color: rgb(41, 41, 41); word-break: break-word; line-height: 32px; letter-spacing: -0.003em; font-family: medium-content-serif-font, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-size: 21px;\">To test now our&nbsp;<em class=\"kp\" style=\"box-sizing: inherit;\">view composer</em>&nbsp;Laravel provides us the right tools, by using&nbsp;<em class=\"kp\" style=\"box-sizing: inherit;\">-&gt;assertViewHas().&nbsp;</em>This method checks if our&nbsp;<em class=\"kp\" style=\"box-sizing: inherit;\">view composer</em>&nbsp;is listening to the right view and appends the variable $navigation to it.</p><figure class=\"li lj lk ll lm gz\" style=\"box-sizing: inherit; margin-top: 56px; margin-bottom: 0px; clear: both; color: rgba(0, 0, 0, 0.8); font-family: medium-content-sans-serif-font, -apple-system, system-ui, &quot;Segoe UI&quot;, Roboto, Oxygen, Ubuntu, Cantarell, &quot;Open Sans&quot;, &quot;Helvetica Neue&quot;, sans-serif; font-size: medium;\"><div class=\"hg s cx\" style=\"box-sizing: inherit; position: relative; margin: auto;\"><div class=\"xh hi s\" style=\"box-sizing: inherit; height: 0px; padding-bottom: 307px;\"><iframe src=\"https://medium.com/media/333a105d86a78d6ce0b62616f63703b9\" allowfullscreen=\"\" frameborder=\"0\" height=\"307\" width=\"680\" title=\"Medium-ViewComposerTest.php\" class=\"t u v em aj\" scrolling=\"auto\" style=\"box-sizing: inherit; position: absolute; top: 0px; left: 0px; width: 680px; height: 307px;\"></iframe></div></div><figcaption class=\"md me gj gh gi mf mg bi bj bk bl bm\" style=\"box-sizing: inherit; font-family: medium-content-sans-serif-font, &quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, &quot;Lucida Sans&quot;, Geneva, Arial, sans-serif; font-size: 16px; line-height: 20px; color: rgb(117, 117, 117); margin-left: auto; margin-right: auto; max-width: 728px; margin-top: 10px; text-align: center;\">View Composer test</figcaption></figure><p id=\"4e44\" class=\"jr js ho jt b ju jv jw jx jy jz ka kb kc kd ke kf kg kh ki kj kk kl km kn ko gn aq\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 2em 0px -0.46em; color: rgb(41, 41, 41); word-break: break-word; line-height: 32px; letter-spacing: -0.003em; font-family: medium-content-serif-font, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-size: 21px;\">I know this is the most basic test you could possibly write, but it is a good start to see if the&nbsp;<em class=\"kp\" style=\"box-sizing: inherit;\">view composer</em>&nbsp;works.</p><h2 id=\"52f2\" class=\"kq kr ho bi fn ks kt jw ku kv ka kw kx ke ky kz ki la lb km lc aq\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 1.72em 0px -0.31em; color: rgb(41, 41, 41); font-family: medium-content-sans-serif-font, &quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, &quot;Lucida Sans&quot;, Geneva, Arial, sans-serif; font-weight: 600; line-height: 32px; letter-spacing: -0.022em; font-size: 26px;\">Conclusion</h2><p id=\"e293\" class=\"jr js ho jt b ju ld jw jx jy le ka kb kc lf ke kf kg lg ki kj kk lh km kn ko gn aq\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 0.86em 0px -0.46em; color: rgb(41, 41, 41); word-break: break-word; line-height: 32px; letter-spacing: -0.003em; font-family: medium-content-serif-font, Georgia, Cambria, &quot;Times New Roman&quot;, Times, serif; font-size: 21px;\">Either closure or class based&nbsp;<em class=\"kp\" style=\"box-sizing: inherit;\">view composers&nbsp;</em>will simplify the code and make it easier for other developers to work with it. Also it is a part of Laravel and why should we not use such a powerful service.</p>', '/storage/images/journals/1600770788.jpeg', 'Sharing', 1, NULL, '2020-09-22 10:33:08', '2020-09-22 10:33:08');
INSERT INTO `journals` (`id`, `title`, `content`, `file`, `type`, `user_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(10, 'Create web notifications using Laravel and Pusher Channel', '<h1 id=\"d393\" class=\"km kn hh at fz ko kp kq kr ks kt ku kv kw kx ky kz la lb lc ld cd\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 1.95em 0px -0.28em; font-family: medium-content-sans-serif-font, \"Lucida Grande\", \"Lucida Sans Unicode\", \"Lucida Sans\", Geneva, Arial, sans-serif; color: rgb(41, 41, 41); font-weight: 600; line-height: 40px; letter-spacing: -0.022em; font-size: 36px;\">What we would be building</h1><p id=\"fd9b\" class=\"jj jk hh jm b jn le jp jq jr lf jt ju jv lg jx jy jz lh kb kc kd li kf kg kh gz cd\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 0.86em 0px -0.46em; color: rgb(41, 41, 41); word-break: break-word; line-height: 32px; letter-spacing: -0.003em; font-family: medium-content-serif-font, Georgia, Cambria, \"Times New Roman\", Times, serif; font-size: 21px;\">After this tutorial we would demonstrate how we can have a small web application show notifications using Laravel and Pusher. It would be similar to how websites like Facebook show notifications. Here is a preview of what we would be building:</p><figure class=\"lk ll lm ln lo lp gt gu paragraph-image\" style=\"box-sizing: inherit; margin: 56px auto 0px; clear: both; color: rgba(0, 0, 0, 0.8); font-family: medium-content-sans-serif-font, -apple-system, system-ui, \"Segoe UI\", Roboto, Oxygen, Ubuntu, Cantarell, \"Open Sans\", \"Helvetica Neue\", sans-serif; font-size: medium;\"><div class=\"lq lr cf ls aj\" style=\"box-sizing: inherit; width: 680px; position: relative; transition: transform 300ms cubic-bezier(0.2, 0, 0.2, 1) 0s; cursor: zoom-in; z-index: auto;\"><div class=\"gt gu lj\" style=\"box-sizing: inherit; margin-left: auto; margin-right: auto; max-width: 1425px;\"><div class=\"lw s cf gh\" style=\"box-sizing: inherit; position: relative; background-color: rgb(242, 242, 242); margin: auto;\"><div class=\"lx ly s\" style=\"box-sizing: inherit; padding-bottom: 367.438px; height: 0px;\"><div class=\"cb lt t u v ez aj bv lu lv\" style=\"box-sizing: inherit; position: absolute; top: 0px; left: 0px; width: 680px; overflow: hidden; opacity: 0; height: 367.438px; transition: opacity 100ms ease 400ms; will-change: transform; transform: translateZ(0px);\"><img alt=\"Image for post\" class=\"t u v ez aj lz ma ap tu\" src=\"https://miro.medium.com/freeze/max/60/0*TGchtsn3yh_zesn_.gif?q=20\" width=\"1425\" height=\"770\" style=\"box-sizing: inherit; position: absolute; top: 0px; left: 0px; width: 680px; visibility: hidden; height: 367.438px; filter: blur(20px); transform: scale(1.1); transition: visibility 0ms ease 400ms;\"></div><img alt=\"Image for post\" class=\"fm tq t u v ez aj c\" width=\"1425\" height=\"770\" src=\"https://miro.medium.com/max/2850/0*TGchtsn3yh_zesn_.gif\" srcset=\"https://miro.medium.com/max/552/0*TGchtsn3yh_zesn_.gif 276w, https://miro.medium.com/max/1104/0*TGchtsn3yh_zesn_.gif 552w, https://miro.medium.com/max/1280/0*TGchtsn3yh_zesn_.gif 640w, https://miro.medium.com/max/1400/0*TGchtsn3yh_zesn_.gif 700w\" sizes=\"700px\" style=\"box-sizing: inherit; background-color: rgb(255, 255, 255); position: absolute; top: 0px; left: 0px; width: 680px; height: 367.438px; opacity: 1; transition: opacity 400ms ease 0ms;\"></div></div></div></div></figure><h1 id=\"c9b5\" class=\"km kn hh at fz ko kp kq kr ks kt ku kv kw kx ky kz la lb lc ld cd\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 1.95em 0px -0.28em; font-family: medium-content-sans-serif-font, \"Lucida Grande\", \"Lucida Sans Unicode\", \"Lucida Sans\", Geneva, Arial, sans-serif; color: rgb(41, 41, 41); font-weight: 600; line-height: 40px; letter-spacing: -0.022em; font-size: 36px;\">Setting up your Pusher application</h1><p id=\"11b9\" class=\"jj jk hh jm b jn le jp jq jr lf jt ju jv lg jx jy jz lh kb kc kd li kf kg kh gz cd\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 0.86em 0px -0.46em; color: rgb(41, 41, 41); word-break: break-word; line-height: 32px; letter-spacing: -0.003em; font-family: medium-content-serif-font, Georgia, Cambria, \"Times New Roman\", Times, serif; font-size: 21px;\">Create a <a href=\"https://pusher.com/\" class=\"ci dj ki kj kk kl\" rel=\"noopener nofollow\" style=\"box-sizing: inherit; color: inherit; -webkit-tap-highlight-color: transparent; background-repeat: repeat-x; background-image: url(\"data:image/svg+xml;utf8,<svg preserveAspectRatio=\\\"none\\\" viewBox=\\\"0 0 1 1\\\" xmlns=\\\"http://www.w3.org/2000/svg\\\"><line x1=\\\"0\\\" y1=\\\"0\\\" x2=\\\"1\\\" y2=\\\"1\\\" stroke=\\\"rgba(41, 41, 41, 1)\\\" /></svg>\"); background-size: 1px 1px; background-position: 0px calc(1em + 1px);\">Pusher account</a>, if you have not already, and then set up your application as seen in the screenshot below.</p><figure class=\"lk ll lm ln lo lp gt gu paragraph-image\" style=\"box-sizing: inherit; margin: 56px auto 0px; clear: both; color: rgba(0, 0, 0, 0.8); font-family: medium-content-sans-serif-font, -apple-system, system-ui, \"Segoe UI\", Roboto, Oxygen, Ubuntu, Cantarell, \"Open Sans\", \"Helvetica Neue\", sans-serif; font-size: medium;\"><div class=\"lq lr cf ls aj\" style=\"box-sizing: inherit; width: 680px; position: relative; transition: transform 300ms cubic-bezier(0.2, 0, 0.2, 1) 0s; cursor: zoom-in; z-index: auto;\"><div class=\"gt gu mc\" style=\"box-sizing: inherit; margin-left: auto; margin-right: auto; max-width: 797px;\"><div class=\"lw s cf gh\" style=\"box-sizing: inherit; position: relative; background-color: rgb(242, 242, 242); margin: auto;\"><div class=\"md ly s\" style=\"box-sizing: inherit; height: 0px; padding-bottom: 555.422px;\"><div class=\"cb lt t u v ez aj bv lu lv\" style=\"box-sizing: inherit; position: absolute; top: 0px; left: 0px; width: 680px; overflow: hidden; opacity: 0; height: 555.422px; transition: opacity 100ms ease 400ms; will-change: transform; transform: translateZ(0px);\"><img alt=\"Image for post\" class=\"t u v ez aj lz ma ap tu\" src=\"https://miro.medium.com/max/60/0*K04Ev0MvChmu8nUg.png?q=20\" width=\"797\" height=\"651\" style=\"box-sizing: inherit; position: absolute; top: 0px; left: 0px; width: 680px; visibility: hidden; height: 555.422px; filter: blur(20px); transform: scale(1.1); transition: visibility 0ms ease 400ms;\"></div><img alt=\"Image for post\" class=\"fm tq t u v ez aj c\" width=\"797\" height=\"651\" src=\"https://miro.medium.com/max/1594/0*K04Ev0MvChmu8nUg.png\" srcset=\"https://miro.medium.com/max/552/0*K04Ev0MvChmu8nUg.png 276w, https://miro.medium.com/max/1104/0*K04Ev0MvChmu8nUg.png 552w, https://miro.medium.com/max/1280/0*K04Ev0MvChmu8nUg.png 640w, https://miro.medium.com/max/1400/0*K04Ev0MvChmu8nUg.png 700w\" sizes=\"700px\" style=\"box-sizing: inherit; background-color: rgb(255, 255, 255); position: absolute; top: 0px; left: 0px; width: 680px; height: 555.422px; opacity: 1; transition: opacity 400ms ease 0ms;\"></div></div></div></div></figure><h1 id=\"7ffa\" class=\"km kn hh at fz ko kp kq kr ks kt ku kv kw kx ky kz la lb lc ld cd\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 1.95em 0px -0.28em; font-family: medium-content-sans-serif-font, \"Lucida Grande\", \"Lucida Sans Unicode\", \"Lucida Sans\", Geneva, Arial, sans-serif; color: rgb(41, 41, 41); font-weight: 600; line-height: 40px; letter-spacing: -0.022em; font-size: 36px;\">Setting up your Laravel application</h1><p id=\"682d\" class=\"jj jk hh jm b jn le jp jq jr lf jt ju jv lg jx jy jz lh kb kc kd li kf kg kh gz cd\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 0.86em 0px -0.46em; color: rgb(41, 41, 41); word-break: break-word; line-height: 32px; letter-spacing: -0.003em; font-family: medium-content-serif-font, Georgia, Cambria, \"Times New Roman\", Times, serif; font-size: 21px;\">You can create a new Laravel application by running the command below in your terminal:</p><pre class=\"lk ll lm ln lo me mf dz\" style=\"box-sizing: inherit; margin-top: 56px; margin-bottom: 0px; padding: 20px; background: rgb(242, 242, 242); color: rgba(0, 0, 0, 0.8);\"><span id=\"5120\" class=\"cd mg kn hh mh b av mi mj s mk\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; display: block; font-size: 16px; color: rgb(41, 41, 41); letter-spacing: -0.022em; line-height: 1.18; font-family: Menlo, Monaco, \"Courier New\", Courier, monospace; margin-top: -0.09em; margin-bottom: -0.09em; white-space: pre-wrap;\">laravel new laravel-web-notifications</span></pre><p id=\"b8c8\" class=\"jj jk hh jm b jn jo jp jq jr js jt ju jv jw jx jy jz ka kb kc kd ke kf kg kh gz cd\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 2em 0px -0.46em; color: rgb(41, 41, 41); word-break: break-word; line-height: 32px; letter-spacing: -0.003em; font-family: medium-content-serif-font, Georgia, Cambria, \"Times New Roman\", Times, serif; font-size: 21px;\">After that, we will need to install the Pusher PHP SDK, you can do this using Composer by running the command below:</p><pre class=\"lk ll lm ln lo me mf dz\" style=\"box-sizing: inherit; margin-top: 56px; margin-bottom: 0px; padding: 20px; background: rgb(242, 242, 242); color: rgba(0, 0, 0, 0.8);\"><span id=\"1e8b\" class=\"cd mg kn hh mh b av mi mj s mk\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; display: block; font-size: 16px; color: rgb(41, 41, 41); letter-spacing: -0.022em; line-height: 1.18; font-family: Menlo, Monaco, \"Courier New\", Courier, monospace; margin-top: -0.09em; margin-bottom: -0.09em; white-space: pre-wrap;\">composer require pusher/pusher-php-server</span></pre><p id=\"f0f7\" class=\"jj jk hh jm b jn jo jp jq jr js jt ju jv jw jx jy jz ka kb kc kd ke kf kg kh gz cd\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 2em 0px -0.46em; color: rgb(41, 41, 41); word-break: break-word; line-height: 32px; letter-spacing: -0.003em; font-family: medium-content-serif-font, Georgia, Cambria, \"Times New Roman\", Times, serif; font-size: 21px;\">When Composer is done, we will need to configure Laravel to use Pusher as its broadcast driver, to do this, open the <code class=\"gh ml mm mn mh b\" style=\"box-sizing: inherit; background-color: rgb(242, 242, 242); font-family: Menlo, Monaco, \"Courier New\", Courier, monospace; padding: 2px 4px; font-size: 15.75px;\">.env</code> file that is in the root directory of your Laravel installation. Update the values to correspond with the configuration below:</p><pre class=\"lk ll lm ln lo me mf dz\" style=\"box-sizing: inherit; margin-top: 56px; margin-bottom: 0px; padding: 20px; background: rgb(242, 242, 242); color: rgba(0, 0, 0, 0.8);\"><span id=\"a571\" class=\"cd mg kn hh mh b av mi mj s mk\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; display: block; font-size: 16px; color: rgb(41, 41, 41); letter-spacing: -0.022em; line-height: 1.18; font-family: Menlo, Monaco, \"Courier New\", Courier, monospace; margin-top: -0.09em; margin-bottom: -0.09em; white-space: pre-wrap;\">PUSHER_APP_ID=322700<br style=\"box-sizing: inherit;\">BROADCAST_DRIVER=pusher</span><span id=\"ba9f\" class=\"cd mg kn hh mh b av mo mp mq mr ms mj s mk\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; display: block; font-size: 16px; color: rgb(41, 41, 41); letter-spacing: -0.022em; line-height: 1.18; font-family: Menlo, Monaco, \"Courier New\", Courier, monospace; margin-bottom: -0.09em; white-space: pre-wrap; margin-top: 1.91em;\">// Get the credentials from your pusher dashboard<br style=\"box-sizing: inherit;\">PUSHER_APP_ID=XXXXX<br style=\"box-sizing: inherit;\">PUSHER_APP_KEY=XXXXXXX<br style=\"box-sizing: inherit;\">PUSHER_APP_SECRET=XXXXXXX</span></pre><blockquote class=\"jg jh ji\" style=\"box-sizing: inherit; margin-bottom: 0px; margin-left: -20px; box-shadow: rgb(41, 41, 41) 3px 0px 0px 0px inset; padding-left: 23px; color: rgba(0, 0, 0, 0.8); font-family: medium-content-sans-serif-font, -apple-system, system-ui, \"Segoe UI\", Roboto, Oxygen, Ubuntu, Cantarell, \"Open Sans\", \"Helvetica Neue\", sans-serif; font-size: medium;\"><p id=\"64ef\" class=\"jj jk jl jm b jn jo jp jq jr js jt ju jv jw jx jy jz ka kb kc kd ke kf kg kh gz cd\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 2em 0px -0.46em; color: rgb(41, 41, 41); word-break: break-word; line-height: 32px; letter-spacing: -0.003em; font-style: italic; font-family: medium-content-serif-font, Georgia, Cambria, \"Times New Roman\", Times, serif; font-size: 21px;\"><span class=\"hh\" style=\"box-sizing: inherit; font-style: normal;\">Important Note: If you’re using the </span><span class=\"jm mt\" style=\"box-sizing: inherit; font-family: medium-content-serif-font, Georgia, Cambria, \"Times New Roman\", Times, serif; font-weight: 700;\"><span class=\"hh\" style=\"box-sizing: inherit; font-style: normal;\">EU</span></span><span class=\"hh\" style=\"box-sizing: inherit; font-style: normal;\"> or </span><span class=\"jm mt\" style=\"box-sizing: inherit; font-family: medium-content-serif-font, Georgia, Cambria, \"Times New Roman\", Times, serif; font-weight: 700;\"><span class=\"hh\" style=\"box-sizing: inherit; font-style: normal;\">AP</span></span><span class=\"hh\" style=\"box-sizing: inherit; font-style: normal;\"> Cluster, make sure to update the options array in your </span><code class=\"gh ml mm mn mh b\" style=\"box-sizing: inherit; background-color: rgb(242, 242, 242); font-family: Menlo, Monaco, \"Courier New\", Courier, monospace; padding: 2px 4px; font-size: 15.75px;\"><span class=\"hh\" style=\"box-sizing: inherit; font-style: normal;\">config/broadcasting.php</span></code><span class=\"hh\" style=\"box-sizing: inherit; font-style: normal;\"> config since Laravel defaults to using the US Server. You can use all the options the Pusher PHP Library supports.</span></p></blockquote><p id=\"c629\" class=\"jj jk hh jm b jn jo jp jq jr js jt ju jv jw jx jy jz ka kb kc kd ke kf kg kh gz cd\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 2em 0px -0.46em; color: rgb(41, 41, 41); word-break: break-word; line-height: 32px; letter-spacing: -0.003em; font-family: medium-content-serif-font, Georgia, Cambria, \"Times New Roman\", Times, serif; font-size: 21px;\">Open <code class=\"gh ml mm mn mh b\" style=\"box-sizing: inherit; background-color: rgb(242, 242, 242); font-family: Menlo, Monaco, \"Courier New\", Courier, monospace; padding: 2px 4px; font-size: 15.75px;\">config/app.php</code> and uncomment the <code class=\"gh ml mm mn mh b\" style=\"box-sizing: inherit; background-color: rgb(242, 242, 242); font-family: Menlo, Monaco, \"Courier New\", Courier, monospace; padding: 2px 4px; font-size: 15.75px;\">App\\Providers\\BroadcastServiceProvider::class</code> .</p><h1 id=\"557d\" class=\"km kn hh at fz ko kp kq kr ks kt ku kv kw kx ky kz la lb lc ld cd\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 1.95em 0px -0.28em; font-family: medium-content-sans-serif-font, \"Lucida Grande\", \"Lucida Sans Unicode\", \"Lucida Sans\", Geneva, Arial, sans-serif; color: rgb(41, 41, 41); font-weight: 600; line-height: 40px; letter-spacing: -0.022em; font-size: 36px;\">Creating our Laravel and Pusher application</h1><p id=\"9248\" class=\"jj jk hh jm b jn le jp jq jr lf jt ju jv lg jx jy jz lh kb kc kd li kf kg kh gz cd\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 0.86em 0px -0.46em; color: rgb(41, 41, 41); word-break: break-word; line-height: 32px; letter-spacing: -0.003em; font-family: medium-content-serif-font, Georgia, Cambria, \"Times New Roman\", Times, serif; font-size: 21px;\">Now that we are done with configuration, let us create our application. First we would create an <code class=\"gh ml mm mn mh b\" style=\"box-sizing: inherit; background-color: rgb(242, 242, 242); font-family: Menlo, Monaco, \"Courier New\", Courier, monospace; padding: 2px 4px; font-size: 15.75px;\">Event</code> class that would broadcast to Pusher from our Laravel application. Events can be fired from anywhere in the application.</p><pre class=\"lk ll lm ln lo me mf dz\" style=\"box-sizing: inherit; margin-top: 56px; margin-bottom: 0px; padding: 20px; background: rgb(242, 242, 242); color: rgba(0, 0, 0, 0.8);\"><span id=\"a1bd\" class=\"cd mg kn hh mh b av mi mj s mk\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; display: block; font-size: 16px; color: rgb(41, 41, 41); letter-spacing: -0.022em; line-height: 1.18; font-family: Menlo, Monaco, \"Courier New\", Courier, monospace; margin-top: -0.09em; margin-bottom: -0.09em; white-space: pre-wrap;\">php artisan make:event StatusLiked</span></pre><p id=\"c6bd\" class=\"jj jk hh jm b jn jo jp jq jr js jt ju jv jw jx jy jz ka kb kc kd ke kf kg kh gz cd\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 2em 0px -0.46em; color: rgb(41, 41, 41); word-break: break-word; line-height: 32px; letter-spacing: -0.003em; font-family: medium-content-serif-font, Georgia, Cambria, \"Times New Roman\", Times, serif; font-size: 21px;\">This will create a new <code class=\"gh ml mm mn mh b\" style=\"box-sizing: inherit; background-color: rgb(242, 242, 242); font-family: Menlo, Monaco, \"Courier New\", Courier, monospace; padding: 2px 4px; font-size: 15.75px;\">StatusLiked</code> class in the <code class=\"gh ml mm mn mh b\" style=\"box-sizing: inherit; background-color: rgb(242, 242, 242); font-family: Menlo, Monaco, \"Courier New\", Courier, monospace; padding: 2px 4px; font-size: 15.75px;\">app/Events</code> directory. Open the contents of the file and update to the following below:</p><pre class=\"lk ll lm ln lo me mf dz\" style=\"box-sizing: inherit; margin-top: 56px; margin-bottom: 0px; padding: 20px; background: rgb(242, 242, 242); color: rgba(0, 0, 0, 0.8);\"><span id=\"d8c7\" class=\"cd mg kn hh mh b av mi mj s mk\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; display: block; font-size: 16px; color: rgb(41, 41, 41); letter-spacing: -0.022em; line-height: 1.18; font-family: Menlo, Monaco, \"Courier New\", Courier, monospace; margin-top: -0.09em; margin-bottom: -0.09em; white-space: pre-wrap;\"><?php</span><span id=\"24b6\" class=\"cd mg kn hh mh b av mo mp mq mr ms mj s mk\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; display: block; font-size: 16px; color: rgb(41, 41, 41); letter-spacing: -0.022em; line-height: 1.18; font-family: Menlo, Monaco, \"Courier New\", Courier, monospace; margin-bottom: -0.09em; white-space: pre-wrap; margin-top: 1.91em;\">namespace App\\Events;</span><span id=\"31cb\" class=\"cd mg kn hh mh b av mo mp mq mr ms mj s mk\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; display: block; font-size: 16px; color: rgb(41, 41, 41); letter-spacing: -0.022em; line-height: 1.18; font-family: Menlo, Monaco, \"Courier New\", Courier, monospace; margin-bottom: -0.09em; white-space: pre-wrap; margin-top: 1.91em;\">use Illuminate\\Queue\\SerializesModels;<br style=\"box-sizing: inherit;\">use Illuminate\\Foundation\\Events\\Dispatchable;<br style=\"box-sizing: inherit;\">use Illuminate\\Broadcasting\\InteractsWithSockets;<br style=\"box-sizing: inherit;\">use Illuminate\\Contracts\\Broadcasting\\ShouldBroadcast;</span><span id=\"4c34\" class=\"cd mg kn hh mh b av mo mp mq mr ms mj s mk\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; display: block; font-size: 16px; color: rgb(41, 41, 41); letter-spacing: -0.022em; line-height: 1.18; font-family: Menlo, Monaco, \"Courier New\", Courier, monospace; margin-bottom: -0.09em; white-space: pre-wrap; margin-top: 1.91em;\">class StatusLiked implements ShouldBroadcast<br style=\"box-sizing: inherit;\">{<br style=\"box-sizing: inherit;\">    use Dispatchable, InteractsWithSockets, SerializesModels;</span><span id=\"23a1\" class=\"cd mg kn hh mh b av mo mp mq mr ms mj s mk\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; display: block; font-size: 16px; color: rgb(41, 41, 41); letter-spacing: -0.022em; line-height: 1.18; font-family: Menlo, Monaco, \"Courier New\", Courier, monospace; margin-bottom: -0.09em; white-space: pre-wrap; margin-top: 1.91em;\">    public $username;</span><span id=\"138c\" class=\"cd mg kn hh mh b av mo mp mq mr ms mj s mk\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; display: block; font-size: 16px; color: rgb(41, 41, 41); letter-spacing: -0.022em; line-height: 1.18; font-family: Menlo, Monaco, \"Courier New\", Courier, monospace; margin-bottom: -0.09em; white-space: pre-wrap; margin-top: 1.91em;\">    public $message;</span><span id=\"6243\" class=\"cd mg kn hh mh b av mo mp mq mr ms mj s mk\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; display: block; font-size: 16px; color: rgb(41, 41, 41); letter-spacing: -0.022em; line-height: 1.18; font-family: Menlo, Monaco, \"Courier New\", Courier, monospace; margin-bottom: -0.09em; white-space: pre-wrap; margin-top: 1.91em;\">    /**<br style=\"box-sizing: inherit;\">     * Create a new event instance.<br style=\"box-sizing: inherit;\">     *<br style=\"box-sizing: inherit;\">     * @return void<br style=\"box-sizing: inherit;\">     */<br style=\"box-sizing: inherit;\">    public function __construct($username)<br style=\"box-sizing: inherit;\">    {<br style=\"box-sizing: inherit;\">        $this->username = $username;<br style=\"box-sizing: inherit;\">        $this->message  = \"{$username} liked your status\";<br style=\"box-sizing: inherit;\">    }</span><span id=\"10cf\" class=\"cd mg kn hh mh b av mo mp mq mr ms mj s mk\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; display: block; font-size: 16px; color: rgb(41, 41, 41); letter-spacing: -0.022em; line-height: 1.18; font-family: Menlo, Monaco, \"Courier New\", Courier, monospace; margin-bottom: -0.09em; white-space: pre-wrap; margin-top: 1.91em;\">    /**<br style=\"box-sizing: inherit;\">     * Get the channels the event should broadcast on.<br style=\"box-sizing: inherit;\">     *<br style=\"box-sizing: inherit;\">     * @return Channel|array<br style=\"box-sizing: inherit;\">     */<br style=\"box-sizing: inherit;\">    public function broadcastOn()<br style=\"box-sizing: inherit;\">    {<br style=\"box-sizing: inherit;\">        return [\'status-liked\'];<br style=\"box-sizing: inherit;\">    }<br style=\"box-sizing: inherit;\">}</span></pre><p id=\"bedd\" class=\"jj jk hh jm b jn jo jp jq jr js jt ju jv jw jx jy jz ka kb kc kd ke kf kg kh gz cd\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 2em 0px -0.46em; color: rgb(41, 41, 41); word-break: break-word; line-height: 32px; letter-spacing: -0.003em; font-family: medium-content-serif-font, Georgia, Cambria, \"Times New Roman\", Times, serif; font-size: 21px;\">Above, we have implemented the <code class=\"gh ml mm mn mh b\" style=\"box-sizing: inherit; background-color: rgb(242, 242, 242); font-family: Menlo, Monaco, \"Courier New\", Courier, monospace; padding: 2px 4px; font-size: 15.75px;\">ShouldBroadcast</code> interface and this tells Laravel that this event should be broadcasted using whatever driver we have set in the configuration file.</p><p id=\"878d\" class=\"jj jk hh jm b jn jo jp jq jr js jt ju jv jw jx jy jz ka kb kc kd ke kf kg kh gz cd\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 2em 0px -0.46em; color: rgb(41, 41, 41); word-break: break-word; line-height: 32px; letter-spacing: -0.003em; font-family: medium-content-serif-font, Georgia, Cambria, \"Times New Roman\", Times, serif; font-size: 21px;\">We also have a constructor that accepts two parameters, username and verb. We will get back to this later on. We assigned these variables to class properties named the same way. It is important to set the visibility of the properties to <span class=\"jm mt\" style=\"box-sizing: inherit; font-family: medium-content-serif-font, Georgia, Cambria, \"Times New Roman\", Times, serif; font-weight: 700;\">public</span>; if you don’t, the property will be ignored.</p><p id=\"7143\" class=\"jj jk hh jm b jn jo jp jq jr js jt ju jv jw jx jy jz ka kb kc kd ke kf kg kh gz cd\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 2em 0px -0.46em; color: rgb(41, 41, 41); word-break: break-word; line-height: 32px; letter-spacing: -0.003em; font-family: medium-content-serif-font, Georgia, Cambria, \"Times New Roman\", Times, serif; font-size: 21px;\">Lastly, we set the channel name to broadcast on.</p><h1 id=\"41aa\" class=\"km kn hh at fz ko kp kq kr ks kt ku kv kw kx ky kz la lb lc ld cd\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 1.95em 0px -0.28em; font-family: medium-content-sans-serif-font, \"Lucida Grande\", \"Lucida Sans Unicode\", \"Lucida Sans\", Geneva, Arial, sans-serif; color: rgb(41, 41, 41); font-weight: 600; line-height: 40px; letter-spacing: -0.022em; font-size: 36px;\">Creating the application views</h1><p id=\"81c4\" class=\"jj jk hh jm b jn le jp jq jr lf jt ju jv lg jx jy jz lh kb kc kd li kf kg kh gz cd\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 0.86em 0px -0.46em; color: rgb(41, 41, 41); word-break: break-word; line-height: 32px; letter-spacing: -0.003em; font-family: medium-content-serif-font, Georgia, Cambria, \"Times New Roman\", Times, serif; font-size: 21px;\">We will keep it simple and create a single view where you can see a navigation bar with a notification icon. The icon will be updated when new notifications are available without the need to refresh the page. The notifications are ephemeral in this tutorial by design; you can extend the functionality and make it last longer after the page reloads if you so desire.</p><p id=\"8413\" class=\"jj jk hh jm b jn jo jp jq jr js jt ju jv jw jx jy jz ka kb kc kd ke kf kg kh gz cd\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 2em 0px -0.46em; color: rgb(41, 41, 41); word-break: break-word; line-height: 32px; letter-spacing: -0.003em; font-family: medium-content-serif-font, Georgia, Cambria, \"Times New Roman\", Times, serif; font-size: 21px;\">Open the <code class=\"gh ml mm mn mh b\" style=\"box-sizing: inherit; background-color: rgb(242, 242, 242); font-family: Menlo, Monaco, \"Courier New\", Courier, monospace; padding: 2px 4px; font-size: 15.75px;\">welcome.blade.php</code> file and replace it with the HTML below.</p><pre class=\"lk ll lm ln lo me mf dz\" style=\"box-sizing: inherit; margin-top: 56px; margin-bottom: 0px; padding: 20px; background: rgb(242, 242, 242); color: rgba(0, 0, 0, 0.8);\"><span id=\"3833\" class=\"cd mg kn hh mh b av mi mj s mk\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; display: block; font-size: 16px; color: rgb(41, 41, 41); letter-spacing: -0.022em; line-height: 1.18; font-family: Menlo, Monaco, \"Courier New\", Courier, monospace; margin-top: -0.09em; margin-bottom: -0.09em; white-space: pre-wrap;\"><!DOCTYPE html><br style=\"box-sizing: inherit;\"><html lang=\"en\"><br style=\"box-sizing: inherit;\">  <head><br style=\"box-sizing: inherit;\">    <meta charset=\"utf-8\"><br style=\"box-sizing: inherit;\">    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\"><br style=\"box-sizing: inherit;\">    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\"><br style=\"box-sizing: inherit;\">    <title>Demo Application</title><br style=\"box-sizing: inherit;\">    <link rel=\"stylesheet\" href=\"//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css\" integrity=\"sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u\" crossorigin=\"anonymous\"><br style=\"box-sizing: inherit;\">    <link rel=\"stylesheet\" type=\"text/css\" href=\"/css/bootstrap-notifications.min.css\"><br style=\"box-sizing: inherit;\">    <!--[if lt IE 9]><br style=\"box-sizing: inherit;\">      <script src=\"https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js\"></script><br style=\"box-sizing: inherit;\">      <script src=\"https://oss.maxcdn.com/respond/1.4.2/respond.min.js\"></script><br style=\"box-sizing: inherit;\">    <![endif]--><br style=\"box-sizing: inherit;\">  </head><br style=\"box-sizing: inherit;\">  <body><br style=\"box-sizing: inherit;\">    <nav class=\"navbar navbar-inverse\"><br style=\"box-sizing: inherit;\">      <div class=\"container-fluid\"><br style=\"box-sizing: inherit;\">        <div class=\"navbar-header\"><br style=\"box-sizing: inherit;\">          <button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" data-target=\"#bs-example-navbar-collapse-9\" aria-expanded=\"false\"><br style=\"box-sizing: inherit;\">            <span class=\"sr-only\">Toggle navigation</span><br style=\"box-sizing: inherit;\">            <span class=\"icon-bar\"></span><br style=\"box-sizing: inherit;\">            <span class=\"icon-bar\"></span><br style=\"box-sizing: inherit;\">            <span class=\"icon-bar\"></span><br style=\"box-sizing: inherit;\">          </button><br style=\"box-sizing: inherit;\">          <a class=\"navbar-brand\" href=\"#\">Demo App</a><br style=\"box-sizing: inherit;\">        </div></span><span id=\"fc2f\" class=\"cd mg kn hh mh b av mo mp mq mr ms mj s mk\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; display: block; font-size: 16px; color: rgb(41, 41, 41); letter-spacing: -0.022em; line-height: 1.18; font-family: Menlo, Monaco, \"Courier New\", Courier, monospace; margin-bottom: -0.09em; white-space: pre-wrap; margin-top: 1.91em;\">        <div class=\"collapse navbar-collapse\"><br style=\"box-sizing: inherit;\">          <ul class=\"nav navbar-nav\"><br style=\"box-sizing: inherit;\">            <li class=\"dropdown dropdown-notifications\"><br style=\"box-sizing: inherit;\">              <a href=\"#notifications-panel\" class=\"dropdown-toggle\" data-toggle=\"dropdown\"><br style=\"box-sizing: inherit;\">                <i data-count=\"0\" class=\"glyphicon glyphicon-bell notification-icon\"></i><br style=\"box-sizing: inherit;\">              </a></span><span id=\"8594\" class=\"cd mg kn hh mh b av mo mp mq mr ms mj s mk\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; display: block; font-size: 16px; color: rgb(41, 41, 41); letter-spacing: -0.022em; line-height: 1.18; font-family: Menlo, Monaco, \"Courier New\", Courier, monospace; margin-bottom: -0.09em; white-space: pre-wrap; margin-top: 1.91em;\">              <div class=\"dropdown-container\"><br style=\"box-sizing: inherit;\">                <div class=\"dropdown-toolbar\"><br style=\"box-sizing: inherit;\">                  <div class=\"dropdown-toolbar-actions\"><br style=\"box-sizing: inherit;\">                    <a href=\"#\">Mark all as read</a><br style=\"box-sizing: inherit;\">                  </div><br style=\"box-sizing: inherit;\">                  <h3 class=\"dropdown-toolbar-title\">Notifications (<span class=\"notif-count\">0</span>)</h3><br style=\"box-sizing: inherit;\">                </div><br style=\"box-sizing: inherit;\">                <ul class=\"dropdown-menu\"><br style=\"box-sizing: inherit;\">                </ul><br style=\"box-sizing: inherit;\">                <div class=\"dropdown-footer text-center\"><br style=\"box-sizing: inherit;\">                  <a href=\"#\">View All</a><br style=\"box-sizing: inherit;\">                </div><br style=\"box-sizing: inherit;\">              </div><br style=\"box-sizing: inherit;\">            </li><br style=\"box-sizing: inherit;\">            <li><a href=\"#\">Timeline</a></li><br style=\"box-sizing: inherit;\">            <li><a href=\"#\">Friends</a></li><br style=\"box-sizing: inherit;\">          </ul><br style=\"box-sizing: inherit;\">        </div><br style=\"box-sizing: inherit;\">      </div><br style=\"box-sizing: inherit;\">    </nav></span><span id=\"f695\" class=\"cd mg kn hh mh b av mo mp mq mr ms mj s mk\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; display: block; font-size: 16px; color: rgb(41, 41, 41); letter-spacing: -0.022em; line-height: 1.18; font-family: Menlo, Monaco, \"Courier New\", Courier, monospace; margin-bottom: -0.09em; white-space: pre-wrap; margin-top: 1.91em;\">    <script src=\"//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js\"></script><br style=\"box-sizing: inherit;\">    <script src=\"//js.pusher.com/3.1/pusher.min.js\"></script><br style=\"box-sizing: inherit;\">    <script src=\"//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js\" integrity=\"sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa\" crossorigin=\"anonymous\"></script></span><span id=\"99f5\" class=\"cd mg kn hh mh b av mo mp mq mr ms mj s mk\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; display: block; font-size: 16px; color: rgb(41, 41, 41); letter-spacing: -0.022em; line-height: 1.18; font-family: Menlo, Monaco, \"Courier New\", Courier, monospace; margin-bottom: -0.09em; white-space: pre-wrap; margin-top: 1.91em;\">    <script type=\"text/javascript\"><br style=\"box-sizing: inherit;\">      var notificationsWrapper   = $(\'.dropdown-notifications\');<br style=\"box-sizing: inherit;\">      var notificationsToggle    = notificationsWrapper.find(\'a[data-toggle]\');<br style=\"box-sizing: inherit;\">      var notificationsCountElem = notificationsToggle.find(\'i[data-count]\');<br style=\"box-sizing: inherit;\">      var notificationsCount     = parseInt(notificationsCountElem.data(\'count\'));<br style=\"box-sizing: inherit;\">      var notifications          = notificationsWrapper.find(\'ul.dropdown-menu\');</span><span id=\"c056\" class=\"cd mg kn hh mh b av mo mp mq mr ms mj s mk\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; display: block; font-size: 16px; color: rgb(41, 41, 41); letter-spacing: -0.022em; line-height: 1.18; font-family: Menlo, Monaco, \"Courier New\", Courier, monospace; margin-bottom: -0.09em; white-space: pre-wrap; margin-top: 1.91em;\">      if (notificationsCount <= 0) {<br style=\"box-sizing: inherit;\">        notificationsWrapper.hide();<br style=\"box-sizing: inherit;\">      }</span><span id=\"25bf\" class=\"cd mg kn hh mh b av mo mp mq mr ms mj s mk\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; display: block; font-size: 16px; color: rgb(41, 41, 41); letter-spacing: -0.022em; line-height: 1.18; font-family: Menlo, Monaco, \"Courier New\", Courier, monospace; margin-bottom: -0.09em; white-space: pre-wrap; margin-top: 1.91em;\">      // Enable pusher logging - don\'t include this in production<br style=\"box-sizing: inherit;\">      // Pusher.logToConsole = true;</span><span id=\"095e\" class=\"cd mg kn hh mh b av mo mp mq mr ms mj s mk\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; display: block; font-size: 16px; color: rgb(41, 41, 41); letter-spacing: -0.022em; line-height: 1.18; font-family: Menlo, Monaco, \"Courier New\", Courier, monospace; margin-bottom: -0.09em; white-space: pre-wrap; margin-top: 1.91em;\">      var pusher = new Pusher(\'API_KEY_HERE\', {<br style=\"box-sizing: inherit;\">        encrypted: true<br style=\"box-sizing: inherit;\">      });</span><span id=\"ca36\" class=\"cd mg kn hh mh b av mo mp mq mr ms mj s mk\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; display: block; font-size: 16px; color: rgb(41, 41, 41); letter-spacing: -0.022em; line-height: 1.18; font-family: Menlo, Monaco, \"Courier New\", Courier, monospace; margin-bottom: -0.09em; white-space: pre-wrap; margin-top: 1.91em;\">      // Subscribe to the channel we specified in our Laravel Event<br style=\"box-sizing: inherit;\">      var channel = pusher.subscribe(\'status-liked\');</span><span id=\"f2cd\" class=\"cd mg kn hh mh b av mo mp mq mr ms mj s mk\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; display: block; font-size: 16px; color: rgb(41, 41, 41); letter-spacing: -0.022em; line-height: 1.18; font-family: Menlo, Monaco, \"Courier New\", Courier, monospace; margin-bottom: -0.09em; white-space: pre-wrap; margin-top: 1.91em;\">      // Bind a function to a Event (the full Laravel class)<br style=\"box-sizing: inherit;\">      channel.bind(\'App\\\\Events\\\\StatusLiked\', function(data) {<br style=\"box-sizing: inherit;\">        var existingNotifications = notifications.html();<br style=\"box-sizing: inherit;\">        var avatar = Math.floor(Math.random() * (71 - 20 + 1)) + 20;<br style=\"box-sizing: inherit;\">        var newNotificationHtml = `<br style=\"box-sizing: inherit;\">          <li class=\"notification active\"><br style=\"box-sizing: inherit;\">              <div class=\"media\"><br style=\"box-sizing: inherit;\">                <div class=\"media-left\"><br style=\"box-sizing: inherit;\">                  <div class=\"media-object\"><br style=\"box-sizing: inherit;\">                    <img src=\"https://api.adorable.io/avatars/71/`+avatar+`.png\" class=\"img-circle\" alt=\"50x50\" style=\"width: 50px; height: 50px;\"><br style=\"box-sizing: inherit;\">                  </div><br style=\"box-sizing: inherit;\">                </div><br style=\"box-sizing: inherit;\">                <div class=\"media-body\"><br style=\"box-sizing: inherit;\">                  <strong class=\"notification-title\">`+data.message+`</strong><br style=\"box-sizing: inherit;\">                  <!--p class=\"notification-desc\">Extra description can go here</p--><br style=\"box-sizing: inherit;\">                  <div class=\"notification-meta\"><br style=\"box-sizing: inherit;\">                    <small class=\"timestamp\">about a minute ago</small><br style=\"box-sizing: inherit;\">                  </div><br style=\"box-sizing: inherit;\">                </div><br style=\"box-sizing: inherit;\">              </div><br style=\"box-sizing: inherit;\">          </li><br style=\"box-sizing: inherit;\">        `;<br style=\"box-sizing: inherit;\">        notifications.html(newNotificationHtml + existingNotifications);</span><span id=\"727f\" class=\"cd mg kn hh mh b av mo mp mq mr ms mj s mk\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; display: block; font-size: 16px; color: rgb(41, 41, 41); letter-spacing: -0.022em; line-height: 1.18; font-family: Menlo, Monaco, \"Courier New\", Courier, monospace; margin-bottom: -0.09em; white-space: pre-wrap; margin-top: 1.91em;\">        notificationsCount += 1;<br style=\"box-sizing: inherit;\">        notificationsCountElem.attr(\'data-count\', notificationsCount);<br style=\"box-sizing: inherit;\">        notificationsWrapper.find(\'.notif-count\').text(notificationsCount);<br style=\"box-sizing: inherit;\">        notificationsWrapper.show();<br style=\"box-sizing: inherit;\">      });<br style=\"box-sizing: inherit;\">    </script><br style=\"box-sizing: inherit;\">  </body><br style=\"box-sizing: inherit;\"></html></span></pre><p id=\"f20b\" class=\"jj jk hh jm b jn jo jp jq jr js jt ju jv jw jx jy jz ka kb kc kd ke kf kg kh gz cd\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 2em 0px -0.46em; color: rgb(41, 41, 41); word-break: break-word; line-height: 32px; letter-spacing: -0.003em; font-family: medium-content-serif-font, Georgia, Cambria, \"Times New Roman\", Times, serif; font-size: 21px;\">This is mostly a lot of Bootstrap noise so we will isolate the important parts, mostly Javascript. We include the <a href=\"http://js.pusher.com/3.1/pusher.min.js\" class=\"ci dj ki kj kk kl\" rel=\"noopener nofollow\" style=\"box-sizing: inherit; color: inherit; -webkit-tap-highlight-color: transparent; background-repeat: repeat-x; background-image: url(\"data:image/svg+xml;utf8,<svg preserveAspectRatio=\\\"none\\\" viewBox=\\\"0 0 1 1\\\" xmlns=\\\"http://www.w3.org/2000/svg\\\"><line x1=\\\"0\\\" y1=\\\"0\\\" x2=\\\"1\\\" y2=\\\"1\\\" stroke=\\\"rgba(41, 41, 41, 1)\\\" /></svg>\"); background-size: 1px 1px; background-position: 0px calc(1em + 1px);\">Pusher javascript library</a>, and then we added the javascript block that does the magic. Let us look at some snippets of the javascript block:</p><pre class=\"lk ll lm ln lo me mf dz\" style=\"box-sizing: inherit; margin-top: 56px; margin-bottom: 0px; padding: 20px; background: rgb(242, 242, 242); color: rgba(0, 0, 0, 0.8);\"><span id=\"2bc8\" class=\"cd mg kn hh mh b av mi mj s mk\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; display: block; font-size: 16px; color: rgb(41, 41, 41); letter-spacing: -0.022em; line-height: 1.18; font-family: Menlo, Monaco, \"Courier New\", Courier, monospace; margin-top: -0.09em; margin-bottom: -0.09em; white-space: pre-wrap;\">// Enable pusher logging - don\'t include this in production<br style=\"box-sizing: inherit;\">// Pusher.logToConsole = true;</span><span id=\"7625\" class=\"cd mg kn hh mh b av mo mp mq mr ms mj s mk\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; display: block; font-size: 16px; color: rgb(41, 41, 41); letter-spacing: -0.022em; line-height: 1.18; font-family: Menlo, Monaco, \"Courier New\", Courier, monospace; margin-bottom: -0.09em; white-space: pre-wrap; margin-top: 1.91em;\">// Initiate the Pusher JS library<br style=\"box-sizing: inherit;\">var pusher = new Pusher(\'API_KEY_HERE\', {<br style=\"box-sizing: inherit;\">    encrypted: true<br style=\"box-sizing: inherit;\">});</span><span id=\"cec6\" class=\"cd mg kn hh mh b av mo mp mq mr ms mj s mk\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; display: block; font-size: 16px; color: rgb(41, 41, 41); letter-spacing: -0.022em; line-height: 1.18; font-family: Menlo, Monaco, \"Courier New\", Courier, monospace; margin-bottom: -0.09em; white-space: pre-wrap; margin-top: 1.91em;\">// Subscribe to the channel we specified in our Laravel Event<br style=\"box-sizing: inherit;\">var channel = pusher.subscribe(\'status-liked\');</span><span id=\"0567\" class=\"cd mg kn hh mh b av mo mp mq mr ms mj s mk\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; display: block; font-size: 16px; color: rgb(41, 41, 41); letter-spacing: -0.022em; line-height: 1.18; font-family: Menlo, Monaco, \"Courier New\", Courier, monospace; margin-bottom: -0.09em; white-space: pre-wrap; margin-top: 1.91em;\">// Bind a function to a Event (the full Laravel class)<br style=\"box-sizing: inherit;\">channel.bind(\'App\\\\Events\\\\StatusLiked\', function(data) {<br style=\"box-sizing: inherit;\">    // this is called when the event notification is received...<br style=\"box-sizing: inherit;\">});</span></pre><blockquote class=\"jg jh ji\" style=\"box-sizing: inherit; margin-bottom: 0px; margin-left: -20px; box-shadow: rgb(41, 41, 41) 3px 0px 0px 0px inset; padding-left: 23px; color: rgba(0, 0, 0, 0.8); font-family: medium-content-sans-serif-font, -apple-system, system-ui, \"Segoe UI\", Roboto, Oxygen, Ubuntu, Cantarell, \"Open Sans\", \"Helvetica Neue\", sans-serif; font-size: medium;\"><p id=\"3e24\" class=\"jj jk jl jm b jn jo jp jq jr js jt ju jv jw jx jy jz ka kb kc kd ke kf kg kh gz cd\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 2em 0px -0.46em; color: rgb(41, 41, 41); word-break: break-word; line-height: 32px; letter-spacing: -0.003em; font-style: italic; font-family: medium-content-serif-font, Georgia, Cambria, \"Times New Roman\", Times, serif; font-size: 21px;\"><span class=\"jm mt\" style=\"box-sizing: inherit; font-family: medium-content-serif-font, Georgia, Cambria, \"Times New Roman\", Times, serif; font-weight: 700;\"><span class=\"hh\" style=\"box-sizing: inherit; font-style: normal;\">PROTIP</span></span><span class=\"hh\" style=\"box-sizing: inherit; font-style: normal;\">: By default, Laravel will broadcast the event using the event’s class name. However, you may customize the broadcast name by defining a broadcast as method on the event:</span></p><p id=\"0f5a\" class=\"jj jk jl jm b jn jo jp jq jr js jt ju jv jw jx jy jz ka kb kc kd ke kf kg kh gz cd\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 2em 0px -0.46em; color: rgb(41, 41, 41); word-break: break-word; line-height: 32px; letter-spacing: -0.003em; font-style: italic; font-family: medium-content-serif-font, Georgia, Cambria, \"Times New Roman\", Times, serif; font-size: 21px;\"><span class=\"hh\" style=\"box-sizing: inherit; font-style: normal;\">public function broadcastAs() {</span></p><p id=\"eca3\" class=\"jj jk jl jm b jn jo jp jq jr js jt ju jv jw jx jy jz ka kb kc kd ke kf kg kh gz cd\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 2em 0px -0.46em; color: rgb(41, 41, 41); word-break: break-word; line-height: 32px; letter-spacing: -0.003em; font-style: italic; font-family: medium-content-serif-font, Georgia, Cambria, \"Times New Roman\", Times, serif; font-size: 21px;\"><span class=\"hh\" style=\"box-sizing: inherit; font-style: normal;\">return ‘event-name’;</span></p><p id=\"3817\" class=\"jj jk jl jm b jn jo jp jq jr js jt ju jv jw jx jy jz ka kb kc kd ke kf kg kh gz cd\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 2em 0px -0.46em; color: rgb(41, 41, 41); word-break: break-word; line-height: 32px; letter-spacing: -0.003em; font-style: italic; font-family: medium-content-serif-font, Georgia, Cambria, \"Times New Roman\", Times, serif; font-size: 21px;\"><span class=\"hh\" style=\"box-sizing: inherit; font-style: normal;\">}</span></p></blockquote><p id=\"e625\" class=\"jj jk hh jm b jn jo jp jq jr js jt ju jv jw jx jy jz ka kb kc kd ke kf kg kh gz cd\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 2em 0px -0.46em; color: rgb(41, 41, 41); word-break: break-word; line-height: 32px; letter-spacing: -0.003em; font-family: medium-content-serif-font, Georgia, Cambria, \"Times New Roman\", Times, serif; font-size: 21px;\">The code above just initializes the Pusher JS library and subscribes to a channel. It then sets a callback to call when the event broadcasted is received on that channel.</p><h1 id=\"b0a1\" class=\"km kn hh at fz ko kp kq kr ks kt ku kv kw kx ky kz la lb lc ld cd\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 1.95em 0px -0.28em; font-family: medium-content-sans-serif-font, \"Lucida Grande\", \"Lucida Sans Unicode\", \"Lucida Sans\", Geneva, Arial, sans-serif; color: rgb(41, 41, 41); font-weight: 600; line-height: 40px; letter-spacing: -0.022em; font-size: 36px;\">Testing our set up</h1><p id=\"fb74\" class=\"jj jk hh jm b jn le jp jq jr lf jt ju jv lg jx jy jz lh kb kc kd li kf kg kh gz cd\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 0.86em 0px -0.46em; color: rgb(41, 41, 41); word-break: break-word; line-height: 32px; letter-spacing: -0.003em; font-family: medium-content-serif-font, Georgia, Cambria, \"Times New Roman\", Times, serif; font-size: 21px;\">Finally to test our set up, we will create a route that manually calls the event. If everything works as expected, we will get a new notification anytime we hit the route. Let’s add the new route:</p><pre class=\"lk ll lm ln lo me mf dz\" style=\"box-sizing: inherit; margin-top: 56px; margin-bottom: 0px; padding: 20px; background: rgb(242, 242, 242); color: rgba(0, 0, 0, 0.8);\"><span id=\"e58f\" class=\"cd mg kn hh mh b av mi mj s mk\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; display: block; font-size: 16px; color: rgb(41, 41, 41); letter-spacing: -0.022em; line-height: 1.18; font-family: Menlo, Monaco, \"Courier New\", Courier, monospace; margin-top: -0.09em; margin-bottom: -0.09em; white-space: pre-wrap;\">Route::get(\'test\', function () {<br style=\"box-sizing: inherit;\">    event(new App\\Events\\StatusLiked(\'Someone\'));<br style=\"box-sizing: inherit;\">    return \"Event has been sent!\";<br style=\"box-sizing: inherit;\">});</span></pre><p id=\"3312\" class=\"jj jk hh jm b jn jo jp jq jr js jt ju jv jw jx jy jz ka kb kc kd ke kf kg kh gz cd\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 2em 0px -0.46em; color: rgb(41, 41, 41); word-break: break-word; line-height: 32px; letter-spacing: -0.003em; font-family: medium-content-serif-font, Georgia, Cambria, \"Times New Roman\", Times, serif; font-size: 21px;\">Now we can start a PHP server using Laravel so we can test our code to see if it works.</p><pre class=\"lk ll lm ln lo me mf dz\" style=\"box-sizing: inherit; margin-top: 56px; margin-bottom: 0px; padding: 20px; background: rgb(242, 242, 242); color: rgba(0, 0, 0, 0.8);\"><span id=\"98d2\" class=\"cd mg kn hh mh b av mi mj s mk\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; display: block; font-size: 16px; color: rgb(41, 41, 41); letter-spacing: -0.022em; line-height: 1.18; font-family: Menlo, Monaco, \"Courier New\", Courier, monospace; margin-top: -0.09em; margin-bottom: -0.09em; white-space: pre-wrap;\">$ php artisan serve</span></pre><h1 id=\"71da\" class=\"km kn hh at fz ko kp kq kr ks kt ku kv kw kx ky kz la lb lc ld cd\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 1.95em 0px -0.28em; font-family: medium-content-sans-serif-font, \"Lucida Grande\", \"Lucida Sans Unicode\", \"Lucida Sans\", Geneva, Arial, sans-serif; color: rgb(41, 41, 41); font-weight: 600; line-height: 40px; letter-spacing: -0.022em; font-size: 36px;\">Conclusion</h1><p id=\"f3a9\" class=\"jj jk hh jm b jn le jp jq jr lf jt ju jv lg jx jy jz lh kb kc kd li kf kg kh gz cd\" data-selectable-paragraph=\"\" style=\"box-sizing: inherit; margin: 0.86em 0px -0.46em; color: rgb(41, 41, 41); word-break: break-word; line-height: 32px; letter-spacing: -0.003em; font-family: medium-content-serif-font, Georgia, Cambria, \"Times New Roman\", Times, serif; font-size: 21px;\">In this article we have been able to leverage the power of Pusher to create a modern web notifications system and it was very easy. This is just scratching the surface of what can be really done using Pusher. The example was just to show you the possibilities.</p>', '/storage/images/journals/1600770879.jpg', 'Sharing', 1, NULL, '2020-09-22 10:34:39', '2020-09-22 17:32:09');

-- --------------------------------------------------------

--
-- Table structure for table `journal_subject`
--

CREATE TABLE `journal_subject` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `journal_id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `journal_subject`
--

INSERT INTO `journal_subject` (`id`, `journal_id`, `subject_id`) VALUES
(1, 6, 9),
(2, 7, 9),
(3, 8, 6),
(4, 9, 9),
(6, 10, 9);

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`id`, `title`, `file`, `duration`, `subject_id`, `user_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'What is HTML', '/storage/video/lesson/1600870791.mp4', '77.03', 1, 1, NULL, '2020-09-23 14:19:51', '2020-09-23 15:35:35'),
(2, 'HTML Structure', '/storage/video/lesson/1600870791.mp4', '77.03', 1, 1, NULL, '2020-09-23 14:22:17', '2020-09-23 14:22:17'),
(3, 'Text', '/storage/video/lesson/1600870791.mp4', '77.03', 1, 1, NULL, '2020-09-23 14:22:29', '2020-09-23 14:22:29'),
(4, 'List', '/storage/video/lesson/1600870791.mp4', '77.03', 1, 1, NULL, '2020-09-23 14:22:41', '2020-09-23 14:22:41'),
(5, 'Links', '/storage/video/lesson/1600870791.mp4', '77.03', 1, 1, NULL, '2020-09-23 14:22:51', '2020-09-23 14:22:51'),
(6, 'Tables', '/storage/video/lesson/1600870791.mp4', '77.03', 1, 1, NULL, '2020-09-23 14:23:00', '2020-09-23 14:23:00'),
(7, 'Images', '/storage/video/lesson/1600870791.mp4', '77.03', 1, 1, NULL, '2020-09-23 14:23:10', '2020-09-23 14:23:10'),
(8, 'Forms', '/storage/video/lesson/1600870791.mp4', '77.03', 1, 1, NULL, '2020-09-23 14:23:20', '2020-09-23 14:23:20'),
(9, 'Div', '/storage/video/lesson/1600870791.mp4', '77.03', 1, 1, NULL, '2020-09-23 14:23:29', '2020-09-23 14:23:29'),
(10, 'CSS Syntax', '/storage/video/lesson/1600871154.mp4', '77.03', 2, 1, NULL, '2020-09-23 14:25:54', '2020-09-23 14:25:54'),
(11, 'CSS Inclusion', '/storage/video/lesson/1600871191.mp4', '77.03', 2, 1, NULL, '2020-09-23 14:26:32', '2020-09-23 14:26:32');

-- --------------------------------------------------------

--
-- Table structure for table `lesson_student`
--

CREATE TABLE `lesson_student` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lesson_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`, `city_id`, `user_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'တိုက်အမှတ် (၁၆၉)၊ အခန်းနံပါတ် 8/A၊ MTP ကွန်ဒို၊ အင်းစိန်လမ်းမကြီး၊ ၉ ရပ်ကွက်၊ လှိုင်မြို့နယ်။', 1, 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(2, 'တိုက်အမှတ် (29 A/ 5A) ၊ No.1 Beauty Saloon အပေါ်ထပ် ၅ လွှာ ၊ ခိုင်ရွှေဝါလမ်း လှည်းတန်း။', 1, 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(3, 'လမ်း ၄၀ ၊ ၇၀x ၇၁ ကြား ၊ ဝါမြဲ Learning Center။', 2, 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38');

-- --------------------------------------------------------

--
-- Table structure for table `mentors`
--

CREATE TABLE `mentors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `degree` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `portfolio` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mentors`
--

INSERT INTO `mentors` (`id`, `degree`, `portfolio`, `staff_id`, `course_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Degree Something', 'Portfolio Something', 18, 2, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(2, 'Degree Something', 'Portfolio Something', 19, 2, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(3, 'Degree Something', 'Portfolio Something', 20, 2, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(4, 'Degree Something', 'Portfolio Something', 21, 2, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(5, 'Degree Something', 'Portfolio Something', 22, 2, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(6, 'Degree Something', 'Portfolio Something', 23, 2, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(7, 'Degree Something', 'Portfolio Something', 24, 2, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(8, 'Degree Something', 'Portfolio Something', 25, 3, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(9, 'Degree Something', 'Portfolio Something', 26, 3, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(10, 'Degree Something', 'Portfolio Something', 27, 6, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_08_19_000001_create_cities_table', 1),
(5, '2019_08_19_000002_create_townships_table', 1),
(6, '2019_08_19_000003_create_locations_table', 1),
(7, '2019_08_19_000004_create_education_table', 1),
(8, '2019_08_19_000005_create_courses_table', 1),
(9, '2019_08_19_000006_create_subjects_table', 1),
(10, '2019_08_19_000007_create_mentors_table', 1),
(11, '2020_01_14_033323_create_staff_table', 1),
(12, '2020_01_14_033324_create_teachers_table', 1),
(13, '2020_01_15_073925_create_batches_table', 1),
(14, '2020_01_15_077777_create_batch_teacher', 1),
(15, '2020_01_15_077778_create_batch_mentor_table', 1),
(16, '2020_01_15_077778_create_inquires_table', 1),
(18, '2020_01_15_154958_create_student_subject_table', 1),
(19, '2020_01_16_092250_create_permission_tables', 1),
(20, '2020_01_18_163155_create_groups_table', 1),
(21, '2020_01_18_163439_create_group_student_table', 1),
(22, '2020_02_07_175917_create_units_table', 1),
(23, '2020_02_07_182722_create_student_unit_table', 1),
(24, '2020_02_10_045150_create_incomes_table', 1),
(25, '2020_02_10_045158_create_expenses_table', 1),
(26, '2020_02_11_092948_create_attendances_table', 1),
(27, '2020_09_16_194716_create_lessons_table', 1),
(28, '2020_09_16_194725_create_topics_table', 1),
(29, '2020_09_16_194936_create_posts_table', 1),
(30, '2020_09_16_195019_create_projectypes_table', 1),
(31, '2020_09_16_195617_create_projects_table', 1),
(32, '2020_09_16_195639_create_journals_table', 1),
(33, '2020_09_16_195703_create_feedbacks_table', 1),
(34, '2020_09_19_222357_create_batch_subject_table', 1),
(35, '2020_09_19_222410_create_batch_student_table', 1),
(36, '2020_09_19_222422_create_lesson_student_table', 1),
(37, '2020_09_19_222436_create_batch_projecttype_table', 1),
(38, '2020_01_15_084648_create_students_table', 2);

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
(2, 'App\\User', 19),
(2, 'App\\User', 20),
(2, 'App\\User', 21),
(2, 'App\\User', 22),
(2, 'App\\User', 23),
(2, 'App\\User', 24),
(2, 'App\\User', 25),
(2, 'App\\User', 26),
(2, 'App\\User', 27),
(2, 'App\\User', 28),
(4, 'App\\User', 2),
(4, 'App\\User', 3),
(4, 'App\\User', 4),
(4, 'App\\User', 5),
(4, 'App\\User', 6),
(4, 'App\\User', 7),
(4, 'App\\User', 8),
(4, 'App\\User', 9),
(4, 'App\\User', 10),
(4, 'App\\User', 11),
(4, 'App\\User', 12),
(4, 'App\\User', 13),
(4, 'App\\User', 14),
(4, 'App\\User', 15),
(4, 'App\\User', 16),
(4, 'App\\User', 17),
(4, 'App\\User', 18),
(8, 'App\\User', 29),
(8, 'App\\User', 30),
(8, 'App\\User', 31),
(8, 'App\\User', 32),
(8, 'App\\User', 33);

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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `file` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `topic_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `projecttype_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projecttypes`
--

CREATE TABLE `projecttypes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ON',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projecttypes`
--

INSERT INTO `projecttypes` (`id`, `name`, `status`, `user_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Web Design', 'ON', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(2, 'Laravel Project', 'ON', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(3, 'Kotlin', 'ON', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(4, 'Flutter', 'ON', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38');

-- --------------------------------------------------------

--
-- Table structure for table `project_student`
--

CREATE TABLE `project_student` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL
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
(1, 'Admin', 'web', '2020-09-22 07:15:36', '2020-09-22 07:15:36'),
(2, 'Mentor', 'web', '2020-09-22 07:15:36', '2020-09-22 07:15:36'),
(3, 'Intern Mentor', 'web', '2020-09-22 07:15:36', '2020-09-22 07:15:36'),
(4, 'Teacher', 'web', '2020-09-22 07:15:36', '2020-09-22 07:15:36'),
(5, 'HR', 'web', '2020-09-22 07:15:36', '2020-09-22 07:15:36'),
(6, 'Business Development', 'web', '2020-09-22 07:15:36', '2020-09-22 07:15:36'),
(7, 'Recruitment', 'web', '2020-09-22 07:15:36', '2020-09-22 07:15:36'),
(8, 'Student', 'web', '2020-09-22 07:15:36', '2020-09-22 07:15:36');

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
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dob` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fathername` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nrc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `joineddate` date NOT NULL,
  `leavedate` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `location_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `dob`, `fathername`, `nrc`, `phone`, `photo`, `joineddate`, `leavedate`, `status`, `location_id`, `user_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '1970-03-24', 'Adolph Hegmann', '12/ASaNa(N)777777', '845.950.2208 x60273', 'https://lorempixel.com/640/480/?66751', '2011-06-10', NULL, 0, 1, 2, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(2, '2004-07-30', 'Karli Ledner MD', '12/ASaNa(N)777777', '+1-880-234-2915', 'https://lorempixel.com/640/480/?32773', '2002-04-15', NULL, 0, 1, 3, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(3, '2017-11-18', 'Erica Reichert', '12/ASaNa(N)777777', '(692) 678-7267 x642', 'https://lorempixel.com/640/480/?67055', '2000-01-20', NULL, 0, 1, 4, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(4, '1989-10-01', 'Fern Tremblay', '12/ASaNa(N)777777', '(574) 264-1782 x319', 'https://lorempixel.com/640/480/?91532', '1985-07-25', NULL, 0, 1, 5, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(5, '1997-11-11', 'Juston Rau', '12/ASaNa(N)777777', '+1-812-844-1627', 'https://lorempixel.com/640/480/?67640', '2004-08-26', NULL, 0, 1, 6, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(6, '1970-09-03', 'Bethel Dickens IV', '12/ASaNa(N)777777', '+17614245209', 'https://lorempixel.com/640/480/?39054', '1975-12-28', NULL, 0, 1, 7, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(7, '2004-07-01', 'Lempi Hane', '12/ASaNa(N)777777', '1-620-742-2587 x05336', 'https://lorempixel.com/640/480/?71477', '1999-10-06', NULL, 0, 1, 8, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(8, '1979-11-30', 'Chanelle Bailey IV', '12/ASaNa(N)777777', '745-574-1101', 'https://lorempixel.com/640/480/?17163', '1987-08-22', NULL, 0, 1, 9, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(9, '1987-01-06', 'Miss Anya Stehr', '12/ASaNa(N)777777', '1-647-674-6313 x149', 'https://lorempixel.com/640/480/?80766', '2003-03-30', NULL, 0, 2, 10, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(10, '1971-12-17', 'Neoma Paucek', '12/ASaNa(N)777777', '+1 (734) 962-8507', 'https://lorempixel.com/640/480/?56387', '2015-03-18', NULL, 0, 2, 11, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(11, '1998-01-20', 'Wendell Heaney', '12/ASaNa(N)777777', '(803) 440-8295 x036', 'https://lorempixel.com/640/480/?47609', '1979-06-09', NULL, 0, 3, 12, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(12, '2003-04-13', 'Karine Rath PhD', '12/ASaNa(N)777777', '726.288.8202', 'https://lorempixel.com/640/480/?58595', '2020-07-14', NULL, 0, 3, 13, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(13, '2008-04-22', 'Prof. Kenyon West', '12/ASaNa(N)777777', '(873) 479-8083 x97187', 'https://lorempixel.com/640/480/?97034', '1990-05-10', NULL, 0, 3, 14, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(14, '1979-11-26', 'Breanna Reynolds', '12/ASaNa(N)777777', '+14847159860', 'https://lorempixel.com/640/480/?42037', '2020-02-01', NULL, 0, 1, 15, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(15, '1996-07-22', 'Colin Ortiz', '12/ASaNa(N)777777', '1-485-920-8971', 'https://lorempixel.com/640/480/?34425', '2012-01-14', NULL, 0, 1, 16, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(16, '1984-07-27', 'Genoveva Zieme', '12/ASaNa(N)777777', '+1-446-690-6395', 'https://lorempixel.com/640/480/?72630', '1976-01-02', NULL, 0, 1, 17, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(17, '2019-05-09', 'Emilia Bailey', '12/ASaNa(N)777777', '+1 (219) 509-3008', 'https://lorempixel.com/640/480/?43273', '1975-07-28', NULL, 0, 1, 18, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(18, '2007-11-11', 'Evie Howell', '12/ASaNa(N)777777', '905-609-1262 x16516', 'https://lorempixel.com/640/480/?99914', '2005-08-25', NULL, 0, 1, 19, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(19, '1986-08-01', 'Janessa Cremin', '12/ASaNa(N)777777', '1-624-479-3374', 'https://lorempixel.com/640/480/?91796', '2002-03-18', NULL, 0, 1, 20, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(20, '2011-07-16', 'Henriette Yundt', '12/ASaNa(N)777777', '(954) 757-4794', 'https://lorempixel.com/640/480/?25272', '2004-12-17', NULL, 0, 1, 21, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(21, '1980-11-11', 'Dr. Stephania Bergnaum', '12/ASaNa(N)777777', '+1-502-710-7155', 'https://lorempixel.com/640/480/?52698', '1996-03-05', NULL, 0, 1, 22, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(22, '2011-02-15', 'Dr. Audrey Bernhard DDS', '12/ASaNa(N)777777', '594-355-5750 x27986', 'https://lorempixel.com/640/480/?86970', '2016-10-10', NULL, 0, 1, 23, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(23, '2002-11-02', 'Royce Sanford', '12/ASaNa(N)777777', '(689) 656-9388 x51453', 'https://lorempixel.com/640/480/?95849', '2013-11-01', NULL, 0, 1, 24, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(24, '2006-03-09', 'Brandi Streich Sr.', '12/ASaNa(N)777777', '971.544.5894', 'https://lorempixel.com/640/480/?70723', '2007-04-01', NULL, 0, 1, 25, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(25, '1999-01-07', 'Mr. Rudy Casper PhD', '12/ASaNa(N)777777', '+1-353-294-2109', 'https://lorempixel.com/640/480/?64332', '1979-12-09', NULL, 0, 1, 26, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(26, '2017-04-20', 'Ana Kohler Jr.', '12/ASaNa(N)777777', '(267) 946-1987', 'https://lorempixel.com/640/480/?92077', '1970-03-02', NULL, 0, 1, 27, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(27, '1989-05-30', 'Mrs. Marjory Daugherty Sr.', '12/ASaNa(N)777777', '(475) 341-0237', 'https://lorempixel.com/640/480/?70687', '2004-11-20', NULL, 0, 1, 28, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `photo` longtext COLLATE utf8mb4_unicode_ci,
  `namee` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namem` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `degree` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `accepted_year` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p1` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p1_phone` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p1_relationship` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p2` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p2_phone` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p2_relationship` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `because` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `township_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `photo`, `namee`, `namem`, `email`, `phone`, `address`, `degree`, `city`, `accepted_year`, `dob`, `gender`, `p1`, `p1_phone`, `p1_relationship`, `p2`, `p2_phone`, `p2_relationship`, `because`, `status`, `township_id`, `user_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Stuent One', 'ကိုကို', 'studentone@gmail.com', '0987654321', 'Building(A-0601) Pearl Condo', 'BIT', 'Yangon', '2020', '1997-11-05', 'male', 'U Mg', '098765432', 'Father', 'Daw Mya', '0987654321', 'Mother', 'မြန်မြန်ဆန်ဆန် နဲ့ IT field ထဲဝင်နိုင်မယ်ထင်လို့ပါ.', '0', 9, 31, NULL, '2020-09-22 07:56:10', '2020-09-25 05:25:01'),
(2, NULL, 'Stuent Two', 'ကြောျကြောျ', 'studenttwo@gmail.com', '0987654321', 'asdfasdfasdfasfdasdfasdfasdfasfdasdfasdfasdfasfdasdfasdfasdfasfdasdfasdfasdfasfdasdfasdfasdfasfd', 'Bc.Sc', 'Yangon', '2020', '2012-02-06', 'male', 'U Aung', '0987654321', 'Father', 'Daw Aye', '0987654321', 'Mother', 'becoz becoz becoz becozbecoz becozbecoz becozbecoz becozbecoz becozbecoz becozbecoz becozbecoz becozbecoz becozbecoz becozbecoz becoz', '0', 2, 32, NULL, '2020-09-22 09:08:17', '2020-09-22 09:08:17'),
(3, NULL, 'Student Four', 'အောငျအောငျ', 'studentfour@gmail.com', '0987654321', '220920000211181003220920000211181003220920000211181003220920000211181003220920000211181003', 'Bc.Sc', 'Yangon', '2020', '2008-06-22', 'female', 'U Myo', '0987654321', 'Father', 'Daw aye', '0987654321', 'Mother', '220920000211181003220920000211181003220920000211181003220920000211181003220920000211181003220920000211181003220920000211181003', '0', 2, 33, NULL, '2020-09-22 09:10:08', '2020-09-22 09:10:08');

-- --------------------------------------------------------

--
-- Table structure for table `student_subject`
--

CREATE TABLE `student_subject` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_subject`
--

INSERT INTO `student_subject` (`id`, `subject_id`, `student_id`) VALUES
(4, 1, 2),
(5, 2, 2),
(6, 3, 2),
(7, 4, 2),
(8, 5, 2),
(9, 1, 3),
(10, 2, 3),
(11, 3, 3),
(12, 4, 3),
(13, 5, 3),
(14, 6, 3),
(33, 1, 1),
(34, 2, 1),
(35, 5, 1),
(36, 14, 1),
(37, 15, 1),
(38, 16, 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_unit`
--

CREATE TABLE `student_unit` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `unit_id` bigint(20) UNSIGNED NOT NULL,
  `symbol` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `logo`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'HTML', '/storage/images/subjects/html.png', NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(2, 'CSS', '/storage/images/subjects/css.png', NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(3, 'JavaScript', '/storage/images/subjects/js.png', NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(4, 'JQuery', '/storage/images/subjects/jq.png', NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(5, 'Bootstrap', '/storage/images/subjects/bootstrap.png', NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(6, 'PHP', '/storage/images/subjects/php.png', NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(7, 'MySQL', '/storage/images/subjects/mysql.png', NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(8, 'CodeIgniter', '/storage/images/subjects/ci.png', NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(9, 'Laravel', '/storage/images/subjects/laravel.png', NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(10, 'API', '/storage/images/subjects/api.png', NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(11, 'Vue', '/storage/images/subjects/vue.png', NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(12, 'UI / UX', '/storage/images/subjects/front-end.png', NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(13, 'Project Management', '/storage/images/subjects/project-management.png', NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(14, 'Kotlin', '/storage/images/subjects/kotlin.png', NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(15, 'Flutter', '/storage/images/subjects/flutter.png', NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(16, 'Java', '/storage/images/subjects/java.png', NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(17, 'C#', '/storage/images/subjects/c1.png', NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(18, 'C++', '/storage/images/subjects/c2.png', NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(19, 'Database Design and Development', '/storage/images/subjects/database.png', NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(20, 'Python', '/storage/images/subjects/python.png', NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(21, 'Japan', '/storage/images/subjects/japan.png', NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(22, 'Wordpress', '/storage/images/subjects/wordpress.png', NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(23, 'Microsoft Word', '/storage/images/subjects/microsoft-word.png', NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(24, 'Microsoft Excel', '/storage/images/subjects/microsoft-excel.png', NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(25, 'Microsoft Powerpoint', '/storage/images/subjects/microsoft-powerpoint.png', NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(26, 'HR', '/storage/images/subjects/hr.png', NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(27, 'Photoshop', '/storage/images/subjects/photoshop.png', NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(28, 'Swift', '/storage/images/subjects/swift.png', NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(29, 'GitHub', '/storage/images/subjects/1600786229.png', NULL, '2020-09-22 14:50:29', '2020-09-22 14:50:29');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `degree` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `degree`, `staff_id`, `course_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Degree Something', 1, 2, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(2, 'Degree Something', 2, 2, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(3, 'Degree Something', 3, 2, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(4, 'Degree Something', 4, 2, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(5, 'Degree Something', 5, 2, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(6, 'Degree Something', 6, 3, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(7, 'Degree Something', 7, 4, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(8, 'Degree Something', 8, 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(9, 'Degree Something', 9, 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(10, 'Degree Something', 10, 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(11, 'Degree Something', 11, 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(12, 'Degree Something', 12, 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(13, 'Degree Something', 13, 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(14, 'Degree Something', 14, 6, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(15, 'Degree Something', 15, 6, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(16, 'Degree Something', 16, 6, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(17, 'Degree Something', 17, 6, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `name`, `user_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Announcement', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(2, 'Assignment', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(3, 'Live Recording', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(4, 'Post', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(5, 'Project Title', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(6, 'Schedule', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(7, 'Survey', 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38');

-- --------------------------------------------------------

--
-- Table structure for table `townships`
--

CREATE TABLE `townships` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `townships`
--

INSERT INTO `townships` (`id`, `name`, `city_id`, `user_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Lanmadaw', 1, 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(2, 'Latha', 1, 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(3, 'Kyauktada', 1, 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(4, 'Pabedan', 1, 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(5, 'Pazundaung', 1, 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(6, 'Ahlone', 1, 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(7, 'Kyeemyindaing', 1, 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(8, 'Sanchaung', 1, 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(9, 'Bahan', 1, 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(10, 'Botahtaung', 1, 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(11, 'Mingalartaungnyunt', 1, 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(12, 'Tamwe', 1, 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(13, 'Yankin', 1, 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(14, 'Dagon', 1, 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(15, 'Dagon Myothit (East)', 1, 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(16, 'Dagon Myothit (North)', 1, 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(17, 'Dagon Myothit (South)', 1, 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(18, 'Dagon Myothit (Seikkan)', 1, 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(19, 'Kamaryut', 1, 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(20, 'Insein', 1, 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(21, 'Hlaing', 1, 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(22, 'Hlaingtharya', 1, 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(23, 'Mayangone', 1, 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(24, 'Mingaladon', 1, 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(25, 'North Okkalapa', 1, 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(26, 'South Okkalapa', 1, 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(27, 'Thingangyun', 1, 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(28, 'Thaketa', 1, 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(29, 'Thanlyin', 1, 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(30, 'Dala', 1, 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(31, 'Dawbon', 1, 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(32, 'Hmawbi', 1, 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(33, 'Hlegu', 1, 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(34, 'Htantabin', 1, 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(35, 'Kawhmu', 1, 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(36, 'Kayan', 1, 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(37, 'Kungyangon', 1, 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(38, 'Shwepyithar', 1, 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(39, 'Taikkyi', 1, 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(40, 'Thongwa', 1, 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(41, 'Twantay', 1, 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(42, 'Kyauktan', 1, 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(43, 'Seikgyikanaungto', 1, 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(44, 'Palae Myothit', 1, 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(45, 'Palae Myothit', 1, 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(46, 'Aung Myay Thar Zan', 2, 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(47, 'Chan Aye Thar Zan', 2, 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(48, 'Chan Mya Thazi', 2, 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(49, 'Chan Mya Thar Si', 2, 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(50, 'Kyaukpadaung', 2, 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(51, 'Kyaukse', 2, 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(52, 'Maha Aungmye', 2, 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(53, 'Mahlaing', 2, 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(54, 'Meiktila', 2, 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(55, 'Mogok', 2, 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(56, 'Myingyan', 2, 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(57, 'Myittha', 2, 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(58, 'Natogyi', 2, 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(59, 'Ngazun', 2, 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(60, 'Nyaung-U', 2, 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(61, 'Patheingyi', 2, 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(62, 'Pyawbwe ', 2, 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(63, 'Pyigyidagun ', 2, 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(64, 'Pyinoolwin', 2, 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(65, 'Singu', 2, 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(66, 'Sintgaing', 2, 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(67, 'Tada-U', 2, 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(68, 'Taungtha', 2, 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(69, 'Thabeikkyin', 2, 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(70, 'Thazi', 2, 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(71, 'Wundwin', 2, 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(72, 'Yamethin', 2, 1, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `description`, `course_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Basic Requirement', 2, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(2, 'Design Concepts ( UI / UX )', 2, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(3, 'Database Knowledges ( MySQL )', 2, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(4, 'Java Basic', 2, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(5, 'Web App Frameworks ( CodeIgniter, Laravel )', 2, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(6, 'Logical Thinking', 2, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(7, 'Problem Solving', 2, NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38');

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
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$aO6k5niYJInskcegvJ707esa1reeDb9YA6bdR43m/myx6PXeFG3aC', NULL, '2020-09-22 07:15:36', '2020-09-22 07:15:36'),
(2, 'Thet Paing Htut', 'thetpainghtut.bf@gmail.com', NULL, '$2y$10$xVZfCBayGdiQi7jdR0GXj.ZcJ9uSddzn5OIPp9K.Mrr2q70FWoKM6', NULL, '2020-09-22 07:15:37', '2020-09-22 07:15:37'),
(3, 'Ya Thaw Myat Noe', 'yathawmyatnoe007@gmail.com', NULL, '$2y$10$4K2NFHFK41LFqqWc2hK0SOnbHdAX0ua6hj0J5k1knqvcgnOdDmWRK', NULL, '2020-09-22 07:15:37', '2020-09-22 07:15:37'),
(4, 'Hein Min Htet', 'heinminhtet8138@gmail.com', NULL, '$2y$10$UpFxiC4PPqmV6YNrtqKQ8eg174rPSEYP3Ju4xqKoqULLpxxP.0p7q', NULL, '2020-09-22 07:15:37', '2020-09-22 07:15:37'),
(5, 'Min Pike Hmu', 'minpikehmu10@gmail.com', NULL, '$2y$10$Dz819xfDV0UZpyr.42arW.isjl2tF1HFDQXDT.0TbpScCd2zaUjzq', NULL, '2020-09-22 07:15:37', '2020-09-22 07:15:37'),
(6, 'Kyaw Zin Aung', 'ukza11977296@gmail.com', NULL, '$2y$10$Y3IQ5PYhq69V2e9ErFuooutTy4JJUHmj8BYmA9pspc38KTiXqiuze', NULL, '2020-09-22 07:15:37', '2020-09-22 07:15:37'),
(7, 'Aung Zin Phyo', 'aungzinphyo94@gmail.com', NULL, '$2y$10$gNCaIeP9q6IrvPFaQernPeg9leztaGp8gpoxeQNbifFMNxYbJomea', NULL, '2020-09-22 07:15:37', '2020-09-22 07:15:37'),
(8, 'Min Aung Hein', 'minaunghein@gmail.com', NULL, '$2y$10$NlOiG9F6Uqo4ofawNnCoxu1W0CjCkO8Es2ltMvJIk2t/5KF0ZjNom', NULL, '2020-09-22 07:15:37', '2020-09-22 07:15:37'),
(9, 'Pyae Phyo Khaing', 'pyaephyokhaing@gmail.com', NULL, '$2y$10$PP6xhR3CwkoAY02hJUS1pOyfApyvGl8ADz7foMHae5zyk3ypqFN/e', NULL, '2020-09-22 07:15:37', '2020-09-22 07:15:37'),
(10, 'July Oo', 'julyoo@gmail.com', NULL, '$2y$10$IjTalOqNpLqeMEhLPsqUO.vV/CwKFLqI0IvhRRbh0V9qMG4LB.5Qa', NULL, '2020-09-22 07:15:37', '2020-09-22 07:15:37'),
(11, 'Thi Dar Htut', 'thidarhtut@gmail.com', NULL, '$2y$10$bolvbVf/2pWOmC2MJPQSe.wIsW9hU0VA7hwYnyd4Qbh6GLbzWnnVG', NULL, '2020-09-22 07:15:37', '2020-09-22 07:15:37'),
(12, 'Phyu Phyu Khaing Aye', 'phyuphyukhaingaye@gmail.com', NULL, '$2y$10$IIA/9.0.eKE32WvgV8bck.J6LjEOwUJQGOfrZ9WDW2OaPbyBD12EK', NULL, '2020-09-22 07:15:37', '2020-09-22 07:15:37'),
(13, 'Thuzar Myint', 'thuzarmyint@gmail.com', NULL, '$2y$10$Ow0oTmHFf2lIapjD0YW8UeQeiLI1WUHdQyDr/KRVCQ0PhlvVGAuy.', NULL, '2020-09-22 07:15:37', '2020-09-22 07:15:37'),
(14, 'Kyi Kyi Swe', 'kyikyiswe@gmail.com', NULL, '$2y$10$/2DvnvOivP7eauqT.mbBDOk.6FFfEbcRJuX1XI19Kg22.3HR1D0Fm', NULL, '2020-09-22 07:15:37', '2020-09-22 07:15:37'),
(15, 'JP Teacher One', 'jpteacherone@gmail.com', NULL, '$2y$10$BKJZ1E8aQATkY9s7Fs/N2uY15Cv13y47IAnugRXJLUfpDRCuFoNVW', NULL, '2020-09-22 07:15:37', '2020-09-22 07:15:37'),
(16, 'JP Teacher Two', 'jpteachertwo@gmail.com', NULL, '$2y$10$DlReQeRGPmmwBpcnHZK/BemaqUE7Yi9/m7s.Qp0S9tUNupS0xlXny', NULL, '2020-09-22 07:15:37', '2020-09-22 07:15:37'),
(17, 'JP Teacher Three', 'jpteachero@gmail.com', NULL, '$2y$10$PvNPeSzcVpCQac.9m97pbONGgLznUVTRlqZEgPAVX4JfnzIufVUDS', NULL, '2020-09-22 07:15:37', '2020-09-22 07:15:37'),
(18, 'Yee Wai Khaing', 'yeewaikhaing@gmail.com', NULL, '$2y$10$cHGodAj0KCdPHtFrQXbFA.QtrYNam.NBECWIAiGvP85KXaBHOgNze', NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(19, 'Aye Lwin Soe', 'ayelwinsoe.it2018@gmail.com', NULL, '$2y$10$yehjo0VU4udq65vHbr3AY.F9IwtrVv9ZqvjmiDByA/bUiZTHPRIKi', NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(20, 'Honey Htun', 'hannihtun195@gmail.com', NULL, '$2y$10$.iLXg1B1Sul.PjkgCE4WdOCUWOUooARwGy91Q5eRwpshXrh2f.g5C', NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(21, 'Aye Chan Oo', 'chanlaymaymay23@gmail.com', NULL, '$2y$10$EZwa/CLkOWTX2.4ZLRkRKOu/VzBJcR4PPCcQZTtxJhVRND1/ZWzCC', NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(22, 'Nyi Ye Lin', 'nyiyelin4@gmail.com', NULL, '$2y$10$n86Tw1yRkBsVWl3hnnr7r.lpAfZvoVrK8JZeMzeoDvMUt4kQQeYTu', NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(23, 'Kyawt Yin Win', 'kyawtyinwin@gmail.com', NULL, '$2y$10$zyWHn7lpvsmjbSVUOit4QushmbSMs.BdCCq85sDqMQo1SdrQIxDF6', NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(24, 'Hnin Ei Phyu', 'hnineiphyu@gmail.com', NULL, '$2y$10$nAbhXi7HK4RgLznHO30m/ejAKBLXxrJX8FWccMIl/MqxxE5bdTwGC', NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(25, 'Kaung Myat Thway', 'kaungmyatthway@gmail.com', NULL, '$2y$10$eUWSbPzMowu4PCPzzfH2Z.51C.g7BmK1k35MmPjvG0IybhSiz.TBS', NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(26, 'Chan Ei Hmwe', 'chaneihmweit@gmail.com', NULL, '$2y$10$Itlp/BOgaCGd708lXdDzx.u7RG7Mkdv5fepXpbNjakB5mggFIHG0a', NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(27, 'Si Thu Aung', 'sithuaung192@gmail.com', NULL, '$2y$10$/D6plySgY4qp4lOfwfWFM.684NXpY8Y15weQcwnj6JFSrCp5VdEUi', NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(28, 'May Zin Phyo', 'mayzinphyo@gmail.com', NULL, '$2y$10$4s4dqaGYLu9kUxJLYrLhWuCkIJb4uLRdz5hwM3RSQ84lGYv702AiW', NULL, '2020-09-22 07:15:38', '2020-09-22 07:15:38'),
(31, 'Stuent One', 'studentone@gmail.com', NULL, '$2y$10$D.DvVkoP92b0nKUH2t1Mp.0dM0s3can8jPP5QgtoQOCdJBN16U2E2', NULL, '2020-09-22 07:56:10', '2020-09-22 07:56:10'),
(32, 'Stuent Two', 'studenttwo@gmail.com', NULL, '$2y$10$vemIFSyjBB3JesqWOENpIOmncK6znd9c8rEPlstLvjEZq3tudMCyO', NULL, '2020-09-22 09:08:17', '2020-09-22 09:08:17'),
(33, 'Student Four', 'studentfour@gmail.com', NULL, '$2y$10$hx8Ed2cIm46aqTKl0FMfdOuaX26VNsw5lg0D9O6vXD12TY.NZRyby', NULL, '2020-09-22 09:10:08', '2020-09-22 09:10:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attendances_student_id_foreign` (`student_id`),
  ADD KEY `attendances_user_id_foreign` (`user_id`);

--
-- Indexes for table `batches`
--
ALTER TABLE `batches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `batches_course_id_foreign` (`course_id`),
  ADD KEY `batches_location_id_foreign` (`location_id`);

--
-- Indexes for table `batch_mentor`
--
ALTER TABLE `batch_mentor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `batch_mentor_batch_id_foreign` (`batch_id`),
  ADD KEY `batch_mentor_mentor_id_foreign` (`mentor_id`);

--
-- Indexes for table `batch_post`
--
ALTER TABLE `batch_post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `batch_post_batch_id_foreign` (`batch_id`),
  ADD KEY `batch_post_post_id_foreign` (`post_id`);

--
-- Indexes for table `batch_projecttype`
--
ALTER TABLE `batch_projecttype`
  ADD PRIMARY KEY (`id`),
  ADD KEY `batch_projecttype_batch_id_foreign` (`batch_id`),
  ADD KEY `batch_projecttype_projecttype_id_foreign` (`projecttype_id`);

--
-- Indexes for table `batch_student`
--
ALTER TABLE `batch_student`
  ADD PRIMARY KEY (`id`),
  ADD KEY `batch_student_batch_id_foreign` (`batch_id`),
  ADD KEY `batch_student_student_id_foreign` (`student_id`);

--
-- Indexes for table `batch_subject`
--
ALTER TABLE `batch_subject`
  ADD PRIMARY KEY (`id`),
  ADD KEY `batch_subject_batch_id_foreign` (`batch_id`),
  ADD KEY `batch_subject_subject_id_foreign` (`subject_id`);

--
-- Indexes for table `batch_teacher`
--
ALTER TABLE `batch_teacher`
  ADD PRIMARY KEY (`id`),
  ADD KEY `batch_teacher_batch_id_foreign` (`batch_id`),
  ADD KEY `batch_teacher_teacher_id_foreign` (`teacher_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_user_id_foreign` (`user_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_projecttype`
--
ALTER TABLE `course_projecttype`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_projecttype_course_id_foreign` (`course_id`),
  ADD KEY `course_projecttype_projecttype_id_foreign` (`projecttype_id`);

--
-- Indexes for table `course_subject`
--
ALTER TABLE `course_subject`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_subject_course_id_foreign` (`course_id`),
  ADD KEY `course_subject_subject_id_foreign` (`subject_id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`),
  ADD KEY `education_user_id_foreign` (`user_id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expenses_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feedbacks_student_id_foreign` (`student_id`),
  ADD KEY `feedbacks_batch_id_foreign` (`batch_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `groups_batch_id_foreign` (`batch_id`);

--
-- Indexes for table `group_student`
--
ALTER TABLE `group_student`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_student_group_id_foreign` (`group_id`),
  ADD KEY `group_student_student_id_foreign` (`student_id`);

--
-- Indexes for table `incomes`
--
ALTER TABLE `incomes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `incomes_location_id_foreign` (`location_id`),
  ADD KEY `incomes_user_id_foreign` (`user_id`);

--
-- Indexes for table `inquires`
--
ALTER TABLE `inquires`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inquires_education_id_foreign` (`education_id`),
  ADD KEY `inquires_batch_id_foreign` (`batch_id`),
  ADD KEY `inquires_user_id_foreign` (`user_id`);

--
-- Indexes for table `journals`
--
ALTER TABLE `journals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `journals_user_id_foreign` (`user_id`);

--
-- Indexes for table `journal_subject`
--
ALTER TABLE `journal_subject`
  ADD PRIMARY KEY (`id`),
  ADD KEY `journal_subject_journal_id_foreign` (`journal_id`),
  ADD KEY `journal_subject_subject_id_foreign` (`subject_id`);

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lessons_subject_id_foreign` (`subject_id`),
  ADD KEY `lessons_user_id_foreign` (`user_id`);

--
-- Indexes for table `lesson_student`
--
ALTER TABLE `lesson_student`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lesson_student_lesson_id_foreign` (`lesson_id`),
  ADD KEY `lesson_student_student_id_foreign` (`student_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `locations_city_id_foreign` (`city_id`),
  ADD KEY `locations_user_id_foreign` (`user_id`);

--
-- Indexes for table `mentors`
--
ALTER TABLE `mentors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mentors_staff_id_foreign` (`staff_id`),
  ADD KEY `mentors_course_id_foreign` (`course_id`);

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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_topic_id_foreign` (`topic_id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projects_projecttype_id_foreign` (`projecttype_id`);

--
-- Indexes for table `projecttypes`
--
ALTER TABLE `projecttypes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projecttypes_user_id_foreign` (`user_id`);

--
-- Indexes for table `project_student`
--
ALTER TABLE `project_student`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_student_project_id_foreign` (`project_id`),
  ADD KEY `project_student_student_id_foreign` (`student_id`);

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
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`),
  ADD KEY `staff_location_id_foreign` (`location_id`),
  ADD KEY `staff_user_id_foreign` (`user_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_email_unique` (`email`),
  ADD KEY `students_township_id_foreign` (`township_id`),
  ADD KEY `students_user_id_foreign` (`user_id`);

--
-- Indexes for table `student_subject`
--
ALTER TABLE `student_subject`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_subject_subject_id_foreign` (`subject_id`),
  ADD KEY `student_subject_student_id_foreign` (`student_id`);

--
-- Indexes for table `student_unit`
--
ALTER TABLE `student_unit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_unit_student_id_foreign` (`student_id`),
  ADD KEY `student_unit_unit_id_foreign` (`unit_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teachers_staff_id_foreign` (`staff_id`),
  ADD KEY `teachers_course_id_foreign` (`course_id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topics_user_id_foreign` (`user_id`);

--
-- Indexes for table `townships`
--
ALTER TABLE `townships`
  ADD PRIMARY KEY (`id`),
  ADD KEY `townships_city_id_foreign` (`city_id`),
  ADD KEY `townships_user_id_foreign` (`user_id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`),
  ADD KEY `units_course_id_foreign` (`course_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `batches`
--
ALTER TABLE `batches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `batch_mentor`
--
ALTER TABLE `batch_mentor`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `batch_post`
--
ALTER TABLE `batch_post`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `batch_projecttype`
--
ALTER TABLE `batch_projecttype`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `batch_student`
--
ALTER TABLE `batch_student`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `batch_subject`
--
ALTER TABLE `batch_subject`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `batch_teacher`
--
ALTER TABLE `batch_teacher`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `course_projecttype`
--
ALTER TABLE `course_projecttype`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `course_subject`
--
ALTER TABLE `course_subject`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `group_student`
--
ALTER TABLE `group_student`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `incomes`
--
ALTER TABLE `incomes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inquires`
--
ALTER TABLE `inquires`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `journals`
--
ALTER TABLE `journals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `journal_subject`
--
ALTER TABLE `journal_subject`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `lesson_student`
--
ALTER TABLE `lesson_student`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mentors`
--
ALTER TABLE `mentors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projecttypes`
--
ALTER TABLE `projecttypes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `project_student`
--
ALTER TABLE `project_student`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student_subject`
--
ALTER TABLE `student_subject`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `student_unit`
--
ALTER TABLE `student_unit`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `townships`
--
ALTER TABLE `townships`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendances`
--
ALTER TABLE `attendances`
  ADD CONSTRAINT `attendances_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `attendances_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `batches`
--
ALTER TABLE `batches`
  ADD CONSTRAINT `batches_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `batches_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `batch_mentor`
--
ALTER TABLE `batch_mentor`
  ADD CONSTRAINT `batch_mentor_batch_id_foreign` FOREIGN KEY (`batch_id`) REFERENCES `batches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `batch_mentor_mentor_id_foreign` FOREIGN KEY (`mentor_id`) REFERENCES `mentors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `batch_post`
--
ALTER TABLE `batch_post`
  ADD CONSTRAINT `batch_post_batch_id_foreign` FOREIGN KEY (`batch_id`) REFERENCES `batches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `batch_post_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `batch_projecttype`
--
ALTER TABLE `batch_projecttype`
  ADD CONSTRAINT `batch_projecttype_batch_id_foreign` FOREIGN KEY (`batch_id`) REFERENCES `batches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `batch_projecttype_projecttype_id_foreign` FOREIGN KEY (`projecttype_id`) REFERENCES `projecttypes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `batch_student`
--
ALTER TABLE `batch_student`
  ADD CONSTRAINT `batch_student_batch_id_foreign` FOREIGN KEY (`batch_id`) REFERENCES `batches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `batch_student_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `batch_subject`
--
ALTER TABLE `batch_subject`
  ADD CONSTRAINT `batch_subject_batch_id_foreign` FOREIGN KEY (`batch_id`) REFERENCES `batches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `batch_subject_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `batch_teacher`
--
ALTER TABLE `batch_teacher`
  ADD CONSTRAINT `batch_teacher_batch_id_foreign` FOREIGN KEY (`batch_id`) REFERENCES `batches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `batch_teacher_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `course_projecttype`
--
ALTER TABLE `course_projecttype`
  ADD CONSTRAINT `course_projecttype_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_projecttype_projecttype_id_foreign` FOREIGN KEY (`projecttype_id`) REFERENCES `projecttypes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `course_subject`
--
ALTER TABLE `course_subject`
  ADD CONSTRAINT `course_subject_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_subject_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `education`
--
ALTER TABLE `education`
  ADD CONSTRAINT `education_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `expenses`
--
ALTER TABLE `expenses`
  ADD CONSTRAINT `expenses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD CONSTRAINT `feedbacks_batch_id_foreign` FOREIGN KEY (`batch_id`) REFERENCES `batches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `feedbacks_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `groups_batch_id_foreign` FOREIGN KEY (`batch_id`) REFERENCES `batches` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `group_student`
--
ALTER TABLE `group_student`
  ADD CONSTRAINT `group_student_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `group_student_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `incomes`
--
ALTER TABLE `incomes`
  ADD CONSTRAINT `incomes_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `incomes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `inquires`
--
ALTER TABLE `inquires`
  ADD CONSTRAINT `inquires_batch_id_foreign` FOREIGN KEY (`batch_id`) REFERENCES `batches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `inquires_education_id_foreign` FOREIGN KEY (`education_id`) REFERENCES `education` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `inquires_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `journals`
--
ALTER TABLE `journals`
  ADD CONSTRAINT `journals_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `journal_subject`
--
ALTER TABLE `journal_subject`
  ADD CONSTRAINT `journal_subject_journal_id_foreign` FOREIGN KEY (`journal_id`) REFERENCES `journals` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `journal_subject_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lessons`
--
ALTER TABLE `lessons`
  ADD CONSTRAINT `lessons_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lessons_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lesson_student`
--
ALTER TABLE `lesson_student`
  ADD CONSTRAINT `lesson_student_lesson_id_foreign` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lesson_student_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `locations`
--
ALTER TABLE `locations`
  ADD CONSTRAINT `locations_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `locations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `mentors`
--
ALTER TABLE `mentors`
  ADD CONSTRAINT `mentors_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mentors_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_topic_id_foreign` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_projecttype_id_foreign` FOREIGN KEY (`projecttype_id`) REFERENCES `projecttypes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `projecttypes`
--
ALTER TABLE `projecttypes`
  ADD CONSTRAINT `projecttypes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `project_student`
--
ALTER TABLE `project_student`
  ADD CONSTRAINT `project_student_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `project_student_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `staff_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_township_id_foreign` FOREIGN KEY (`township_id`) REFERENCES `townships` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `students_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `student_subject`
--
ALTER TABLE `student_subject`
  ADD CONSTRAINT `student_subject_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_subject_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `student_unit`
--
ALTER TABLE `student_unit`
  ADD CONSTRAINT `student_unit_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_unit_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teachers_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `teachers_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `topics`
--
ALTER TABLE `topics`
  ADD CONSTRAINT `topics_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `townships`
--
ALTER TABLE `townships`
  ADD CONSTRAINT `townships_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `townships_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `units`
--
ALTER TABLE `units`
  ADD CONSTRAINT `units_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
