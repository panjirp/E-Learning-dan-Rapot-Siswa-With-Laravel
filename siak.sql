-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2018 at 09:09 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siak`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer` text NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`id`, `question_id`, `answer`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'a', 0, '2018-07-03 17:06:47', '2018-07-03 10:06:47'),
(2, 1, 'b', 0, '2018-07-03 15:17:25', '2018-07-03 08:17:25'),
(3, 1, 'c', 1, '2018-07-03 17:06:47', '2018-07-03 10:06:47'),
(4, 1, 'd', 0, '2018-07-03 15:17:25', '2018-07-03 08:17:25'),
(5, 2, 'e', 1, '2018-07-02 05:02:22', '0000-00-00 00:00:00'),
(6, 2, 'f', 0, '2018-07-02 05:02:39', '0000-00-00 00:00:00'),
(7, 3, 'g', 0, '2018-07-03 02:30:29', '2018-07-03 02:30:29'),
(8, 3, 'h', 0, '2018-07-03 02:30:29', '2018-07-03 02:30:29'),
(9, 3, 'i', 0, '2018-07-03 02:30:29', '2018-07-03 02:30:29'),
(10, 3, 'j', 1, '2018-07-03 02:30:29', '2018-07-03 02:30:29'),
(11, 4, 'g', 0, '2018-07-03 02:35:02', '2018-07-03 02:35:02'),
(12, 4, 'h', 0, '2018-07-03 02:35:02', '2018-07-03 02:35:02'),
(13, 4, 'i', 0, '2018-07-03 02:35:02', '2018-07-03 02:35:02'),
(14, 4, 'j', 1, '2018-07-03 02:35:02', '2018-07-03 02:35:02'),
(31, 10, '23', 1, '2018-07-03 09:51:02', '2018-07-03 09:51:02'),
(32, 10, '22', 0, '2018-07-03 09:51:02', '2018-07-03 09:51:02'),
(33, 10, '21', 0, '2018-07-03 09:51:02', '2018-07-03 09:51:02'),
(34, 10, '3', 0, '2018-07-03 09:51:02', '2018-07-03 09:51:02'),
(35, 11, '12', 1, '2018-07-03 09:51:55', '2018-07-03 09:51:55'),
(36, 11, '13', 0, '2018-07-03 09:51:55', '2018-07-03 09:51:55'),
(37, 11, '14', 0, '2018-07-03 09:51:55', '2018-07-03 09:51:55'),
(38, 11, '15', 0, '2018-07-03 09:51:55', '2018-07-03 09:51:55'),
(39, 12, 'a', 1, '2018-07-09 11:22:17', '2018-07-09 11:22:17'),
(40, 12, 'b', 0, '2018-07-09 11:22:17', '2018-07-09 11:22:17'),
(41, 12, 'c', 0, '2018-07-09 11:22:17', '2018-07-09 11:22:17'),
(42, 12, 'd', 0, '2018-07-09 11:22:17', '2018-07-09 11:22:17'),
(43, 13, 'a', 0, '2018-07-09 11:23:56', '2018-07-09 11:23:56'),
(44, 13, 'b', 0, '2018-07-09 11:23:56', '2018-07-09 11:23:56'),
(45, 13, 'c', 0, '2018-07-09 11:23:56', '2018-07-09 11:23:56'),
(46, 13, 'd', 1, '2018-07-09 11:23:56', '2018-07-09 11:23:56');

-- --------------------------------------------------------

--
-- Table structure for table `catatansiswa`
--

CREATE TABLE `catatansiswa` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `kelas_name` varchar(20) NOT NULL,
  `semester` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `kebersihan` varchar(1) NOT NULL,
  `kerapihan` varchar(1) NOT NULL,
  `ibadah` varchar(1) NOT NULL,
  `kesantunan` varchar(1) NOT NULL,
  `sakit` int(3) NOT NULL,
  `ijin` int(3) NOT NULL,
  `tanpa_keterangan` int(3) NOT NULL,
  `membolos` int(3) NOT NULL,
  `catatan_tambahan` text NOT NULL,
  `tuntas` int(11) NOT NULL,
  `lulus` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catatansiswa`
--

INSERT INTO `catatansiswa` (`id`, `student_id`, `kelas_name`, `semester`, `teacher_id`, `kebersihan`, `kerapihan`, `ibadah`, `kesantunan`, `sakit`, `ijin`, `tanpa_keterangan`, `membolos`, `catatan_tambahan`, `tuntas`, `lulus`, `created_at`, `updated_at`) VALUES
(1, 1, 'X TKJ 1', 1, 1, 'B', 'A', 'A', 'A', 1, 0, 0, 0, 'Pertahankan!', 0, 0, '2018-07-26 07:55:19', '2018-07-26 00:55:19');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `vocational_id` int(11) NOT NULL,
  `name` varchar(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `vocational_id`, `name`, `teacher_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'X TKJ 1', 1, '2018-05-29 11:44:22', '2018-04-22 01:43:40'),
(2, 3, 'IX A', 0, '2018-04-18 18:42:51', '0000-00-00 00:00:00'),
(31, 4, 'XI AK 2', 0, '2018-05-02 12:56:51', '2018-05-02 05:56:51'),
(33, 5, 'XII BHS', 0, '2018-07-17 17:27:22', '2018-07-17 10:27:22'),
(34, 6, 'XII TB', 0, '2018-07-17 17:27:30', '2018-07-17 10:27:30');

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `id` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text,
  `url` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`id`, `schedule_id`, `name`, `description`, `url`, `created_at`, `updated_at`) VALUES
(27, 1, 'Materi 1', 'ini deskripsi materi 1', 'course/1/Materi 1/', '2018-06-25 13:44:00', '2018-06-25 06:44:00'),
(28, 2, 'Materi 1', 'deskripsi', 'course/2/Materi 1/', '2018-05-20 07:35:45', '2018-05-20 07:35:45'),
(29, 1, 'Materi 2', 'ini deskripsi materi 2', 'course/1/asdxxx/', '2018-06-25 13:44:18', '2018-06-25 06:44:18');

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
(1, '2018_04_17_132209_create_siak_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id` int(11) NOT NULL,
  `subject_name` varchar(20) NOT NULL,
  `subjecttype_id` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `kelas_name` varchar(11) NOT NULL,
  `nilai_ujian` varchar(5) NOT NULL,
  `kkm_nu` int(3) NOT NULL,
  `kkm_ns` int(3) NOT NULL,
  `attitude` varchar(2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id`, `subject_name`, `subjecttype_id`, `schedule_id`, `student_id`, `teacher_id`, `semester`, `kelas_name`, `nilai_ujian`, `kkm_nu`, `kkm_ns`, `attitude`, `created_at`, `updated_at`) VALUES
(8, 'Bahasa Indonesia', 1, 2, 1, 1, 1, 'X TKJ 1', '99', 80, 75, 'A', '2018-07-25 16:22:59', '2018-07-25 09:22:59'),
(9, 'Bahasa Indonesia', 1, 2, 4, 1, 1, 'X TKJ 1', '70', 80, 75, 'C', '2018-07-25 16:23:05', '2018-07-25 09:23:05'),
(10, 'Matematika', 2, 1, 1, 1, 1, 'X TKJ 1', '85', 75, 75, 'B', '2018-07-26 04:51:52', '2018-07-25 21:51:52');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `quiz_id`, `question`, `created_at`, `updated_at`) VALUES
(1, 1, 'abc?', '2018-07-02 04:23:43', '0000-00-00 00:00:00'),
(2, 1, 'def?', '2018-07-02 05:01:23', '0000-00-00 00:00:00'),
(3, 1, 'ghi', '2018-07-03 02:30:29', '2018-07-03 02:30:29'),
(4, 1, 'ghi', '2018-07-03 02:35:02', '2018-07-03 02:35:02'),
(10, 1, 'asd', '2018-07-03 09:51:02', '2018-07-03 09:51:02'),
(11, 1, 'asdasd', '2018-07-03 09:51:55', '2018-07-03 09:51:55'),
(12, 2, 'ABC', '2018-07-09 11:22:17', '2018-07-09 11:22:17'),
(13, 2, 'DEF', '2018-07-09 11:23:56', '2018-07-09 11:23:56');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `id` int(11) NOT NULL,
  `materi_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `total_question` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id`, `materi_id`, `name`, `total_question`, `time`, `created_at`, `updated_at`) VALUES
(1, 27, 'Exercise 1', 10, 20, '2018-07-02 04:21:45', '0000-00-00 00:00:00'),
(2, 28, 'Exercise2', 0, 10, '2018-07-09 11:19:56', '2018-07-09 11:19:56'),
(5, 28, 'Exercise2', 0, 10, '2018-07-09 11:22:03', '2018-07-09 11:22:03');

-- --------------------------------------------------------

--
-- Table structure for table `religion`
--

CREATE TABLE `religion` (
  `id` int(11) NOT NULL,
  `name` varchar(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `religion`
--

INSERT INTO `religion` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Islam', '2018-04-18 18:41:56', '0000-00-00 00:00:00'),
(2, 'Kristen', '2018-04-18 18:41:56', '0000-00-00 00:00:00'),
(3, 'Hindu', '2018-04-18 18:41:56', '0000-00-00 00:00:00'),
(4, 'Buddha', '2018-04-18 18:41:56', '0000-00-00 00:00:00'),
(5, 'Kong Hu Cu', '2018-04-18 18:41:56', '0000-00-00 00:00:00'),
(6, 'Katolik', '2018-04-18 18:41:56', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `teacher_id`, `subject_id`, `kelas_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2018-06-10 11:49:46', '0000-00-00 00:00:00'),
(2, 1, 2, 1, '2018-06-10 11:49:53', '0000-00-00 00:00:00'),
(3, 1, 1, 31, '2018-06-10 11:49:59', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `score`
--

CREATE TABLE `score` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `marks` int(11) NOT NULL,
  `precentage` varchar(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `score`
--

INSERT INTO `score` (`id`, `student_id`, `quiz_id`, `marks`, `precentage`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, '100', '2018-07-01 23:29:59', '2018-07-01 23:29:59'),
(2, 1, 1, 2, '33.33333333', '2018-07-04 02:35:34', '2018-07-04 02:35:34'),
(3, 1, 1, 2, '33.33333333', '2018-07-04 03:01:28', '2018-07-04 03:01:28'),
(4, 1, 1, 2, '33.33333333', '2018-07-04 03:03:11', '2018-07-04 03:03:11'),
(5, 1, 1, 1, '16.66666667', '2018-07-04 03:07:40', '2018-07-04 03:07:40'),
(6, 1, 1, 0, '0', '2018-07-04 03:07:46', '2018-07-04 03:07:46'),
(7, 1, 1, 0, '0', '2018-07-04 03:07:52', '2018-07-04 03:07:52'),
(8, 1, 1, 0, '0', '2018-07-04 03:07:58', '2018-07-04 03:07:58'),
(9, 1, 1, 0, '0', '2018-07-05 23:57:07', '2018-07-05 23:57:07'),
(10, 1, 1, 0, '0', '2018-07-07 23:58:37', '2018-07-07 23:58:37');

-- --------------------------------------------------------

--
-- Table structure for table `sex`
--

CREATE TABLE `sex` (
  `id` int(11) NOT NULL,
  `name` varchar(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sex`
--

INSERT INTO `sex` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Laki - Laki', '2018-04-19 18:58:29', '0000-00-00 00:00:00'),
(2, 'Perempuan', '2018-04-19 18:58:39', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `name` varchar(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Aktif', '2018-04-18 18:40:59', '0000-00-00 00:00:00'),
(2, 'Lulus', '2018-04-18 18:40:59', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `fullname` varchar(50) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `nisn` varchar(11) NOT NULL,
  `address` varchar(200) NOT NULL,
  `birth_date` date NOT NULL,
  `birth_place` varchar(20) NOT NULL,
  `kelas_id` varchar(11) NOT NULL,
  `entry_year` int(4) NOT NULL,
  `religion_id` int(11) NOT NULL,
  `phone_number` int(20) DEFAULT NULL,
  `picture` varchar(50) DEFAULT NULL,
  `status_id` int(11) NOT NULL,
  `sex_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `user_id`, `fullname`, `nis`, `nisn`, `address`, `birth_date`, `birth_place`, `kelas_id`, `entry_year`, `religion_id`, `phone_number`, `picture`, `status_id`, `sex_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'Siswa', '4814010016', '3435312', 'Serang - Banten', '1995-12-15', 'Purwakarta', '1', 2014, 1, 231352, 'images\\profile_default.png', 1, 1, '2018-06-26 08:48:15', '2018-06-26 01:48:15'),
(2, NULL, 'Syahrini', '21212121212', '', 'jl. jl. terus', '2002-04-28', 'Jakarta', '2', 2017, 2, 2123132121, 'images/21212121212.png', 2, 2, '2018-07-19 13:04:46', '2018-07-19 06:04:46'),
(3, NULL, 'Kurt Cobain', '29092091', '', 'Amerika', '1999-04-10', 'Amerika', '2', 2017, 4, 231352, 'images\\profile_default.png', 1, 1, '2018-05-23 16:10:05', '2018-05-23 09:10:05'),
(4, NULL, 'Sukajan Bin Sukijan', '123123kepolu', '123123', 'benerbenerkepolu', '2018-06-07', 'hmmm', '1', 2014, 1, 123123, NULL, 1, 1, '2018-06-03 18:23:08', '2018-06-03 11:23:08'),
(5, NULL, 'TEST', '', '', 'asdasd', '2018-07-12', 'asdasd', '', 0, 1, 1234123, NULL, 0, 1, '2018-07-09 18:06:08', '2018-07-09 18:06:08'),
(6, NULL, 'asdasd', '', '', 'asdasd', '2018-07-06', 'asdasd', '', 0, 1, 0, NULL, 0, 1, '2018-07-09 18:08:54', '2018-07-09 18:08:54'),
(7, NULL, 'test', '2122233', '', 'asdsd', '2018-07-05', 'mansmdnmans', '1', 2013, 1, 123123, NULL, 1, 1, '2018-07-26 05:06:58', '2018-07-25 22:06:58'),
(8, NULL, 'sss', '212', '2222', 'sadasd', '2018-07-13', 'sadasd', '1', 2211, 1, 123123, NULL, 1, 1, '2018-07-10 01:18:17', '2018-07-09 18:18:17');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `subjecttype_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `name`, `subjecttype_id`, `created_at`, `updated_at`) VALUES
(1, 'Matematika', 2, '2018-06-10 11:50:40', '0000-00-00 00:00:00'),
(2, 'Bahasa Indonesia', 1, '2018-06-10 11:50:54', '0000-00-00 00:00:00'),
(4, 'Agama', 1, '2018-06-10 11:51:00', '2018-05-05 02:22:34');

-- --------------------------------------------------------

--
-- Table structure for table `subjecttype`
--

CREATE TABLE `subjecttype` (
  `id` int(11) NOT NULL,
  `desc` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjecttype`
--

INSERT INTO `subjecttype` (`id`, `desc`, `created_at`, `updated_at`) VALUES
(1, 'NORMATIF', '2018-06-10 11:42:00', '0000-00-00 00:00:00'),
(2, 'ADAPTIF', '2018-06-10 11:42:00', '0000-00-00 00:00:00'),
(3, 'DASAR KOMPETENSI', '2018-06-10 11:43:40', '0000-00-00 00:00:00'),
(4, 'KOMPETENSI KEJURUAN', '2018-06-10 11:43:53', '0000-00-00 00:00:00'),
(5, 'MUATAN LOKAL DAN PENGEMBANGAN', '2018-06-10 11:44:22', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `fullname` varchar(50) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `birth_date` date NOT NULL,
  `birth_place` varchar(20) NOT NULL,
  `religion_id` int(11) NOT NULL,
  `sex_id` int(11) NOT NULL,
  `phone_number` int(20) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `picture` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `user_id`, `fullname`, `nip`, `birth_date`, `birth_place`, `religion_id`, `sex_id`, `phone_number`, `address`, `picture`, `created_at`, `updated_at`) VALUES
(1, 3, 'Guru 1', '00012340', '1970-04-04', 'Serang', 1, 1, 2313523, 'Serang - Banten', 'images/profile_default.png', '2018-07-25 07:56:40', '2018-07-25 00:56:40'),
(8, NULL, 'Guru 2', '12323', '2018-05-09', 'sdsad', 1, 1, 23123, 'sadsad', NULL, '2018-07-25 07:56:49', '2018-07-25 00:56:49');

-- --------------------------------------------------------

--
-- Table structure for table `tugas`
--

CREATE TABLE `tugas` (
  `id` int(11) NOT NULL,
  `materi_id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `description` text NOT NULL,
  `url` varchar(225) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tugas`
--

INSERT INTO `tugas` (`id`, `materi_id`, `name`, `description`, `url`, `created_at`, `updated_at`) VALUES
(1, 27, 'Tugas 1', 'asda', 'course/1/Materi 1/tugas/', '2018-07-18 08:15:33', '2018-07-18 08:15:33');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `description` varchar(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `description`, `created_at`, `updated_at`) VALUES
(1, 'SMK Student', '2018-04-18 18:40:28', '0000-00-00 00:00:00'),
(2, 'SMP Student', '2018-04-18 18:40:28', '0000-00-00 00:00:00'),
(3, 'Teacher', '2018-04-18 18:40:28', '0000-00-00 00:00:00'),
(4, 'Admin', '2018-04-18 18:40:28', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `type_id`, `created_at`, `updated_at`, `remember_token`) VALUES
(1, 'siswa', '$2y$10$F21bh99VE4JdEK2zqIl3d.mNTonKOB1KoS1FkLVWMMonBlXFQpxfu', 1, '2018-04-17 06:50:51', '2018-06-26 01:48:28', 'oFW4ADoGTcQkl3tTAehx7yBLzhjJJGk3oj9nxQNoNKDfzbu1m6IWgsf6gyHs'),
(2, 'admin', '$2y$10$N8nGUWSM8bCydPehulwYyurHP7zlpC4iKTKA5hNRVRQHP30tAPHLK', 4, NULL, NULL, 'qFRJtTiInlH9dmXD6CnWxJGZdKpZKw9mA9DTQsgcJ7J2M4HM8LwkweuMNjcJ'),
(3, 'guru', '$2y$10$RjxYNzgnasUIgcIEhBI7Que7kBCsgmgLKn9MCNJGIfHt5u/4lUF3i', 3, NULL, '2018-06-25 09:17:57', 'yws0GRUD0CwOfgpDsa4nuJyOgRmLVtnqwLVozF8zJ6R7i6sIHxpUJLUOycJE');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `materi_id` int(11) NOT NULL,
  `video` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `materi_id`, `video`, `created_at`, `updated_at`) VALUES
(1, 27, 'https://www.youtube.com/watch?v=vEYBWm4_71Y', '2018-06-26 15:52:06', '0000-00-00 00:00:00'),
(2, 2, NULL, '2018-04-18 18:44:19', '0000-00-00 00:00:00'),
(3, 27, NULL, '2018-07-04 23:06:14', '2018-07-04 23:06:14'),
(4, 27, NULL, '2018-07-04 23:06:33', '2018-07-04 23:06:33');

-- --------------------------------------------------------

--
-- Table structure for table `vocational`
--

CREATE TABLE `vocational` (
  `id` int(11) NOT NULL,
  `name` varchar(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vocational`
--

INSERT INTO `vocational` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'TKJ', '2018-04-20 09:27:43', '2018-04-20 02:27:43'),
(3, 'SMP', '2018-04-18 18:39:27', '0000-00-00 00:00:00'),
(4, 'AKUNTANSI', '2018-04-20 09:25:50', '2018-04-20 02:25:50'),
(5, 'BAHASA', '2018-04-20 09:27:50', '2018-04-20 02:27:50'),
(6, 'TATA BOGA', '2018-04-20 19:01:31', '2018-04-20 12:01:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catatansiswa`
--
ALTER TABLE `catatansiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `religion`
--
ALTER TABLE `religion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sex`
--
ALTER TABLE `sex`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjecttype`
--
ALTER TABLE `subjecttype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vocational`
--
ALTER TABLE `vocational`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `catatansiswa`
--
ALTER TABLE `catatansiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `religion`
--
ALTER TABLE `religion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `score`
--
ALTER TABLE `score`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sex`
--
ALTER TABLE `sex`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subjecttype`
--
ALTER TABLE `subjecttype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vocational`
--
ALTER TABLE `vocational`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
