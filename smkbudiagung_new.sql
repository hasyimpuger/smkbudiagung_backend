-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2018 at 11:09 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smkbudiagung`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `category_type` enum('gallery','ekskul','program_study','news','info','event') NOT NULL,
  `category_icon` varchar(50) NOT NULL,
  `category_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `category_updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `category_deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `class_id` int(11) NOT NULL,
  `class_name` varchar(100) NOT NULL,
  `class_program_study_id` int(11) NOT NULL,
  `class_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `class_updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `class_deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `educations`
--

CREATE TABLE `educations` (
  `education_id` int(11) NOT NULL,
  `education_almamater` varchar(100) NOT NULL,
  `education_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `education_updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `education_deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `event_created_by_id` int(11) NOT NULL,
  `event_title` varchar(100) NOT NULL,
  `event_content` text NOT NULL,
  `event_poster` varchar(100) NOT NULL,
  `event_location` varchar(100) NOT NULL,
  `event_date_start` date NOT NULL,
  `event_date_end` date NOT NULL,
  `event_time_start` time NOT NULL,
  `event_time_end` time NOT NULL,
  `event_every` varchar(255) NOT NULL,
  `event_location_map` varchar(255) NOT NULL,
  `event_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `event_updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `event_deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `event_guest_stars`
--

CREATE TABLE `event_guest_stars` (
  `event_guest_star_id` int(11) NOT NULL,
  `event_guest_star_event_id` int(11) NOT NULL,
  `event_guest_star_guest_star_id` int(11) NOT NULL,
  `event_guest_star_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `event_guest_star_updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `event_guest_star_deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `event_lists`
--

CREATE TABLE `event_lists` (
  `event_list_id` int(11) NOT NULL,
  `event_list_event_id` int(11) NOT NULL,
  `event_list_content` varchar(100) NOT NULL,
  `event_list_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `event_list_updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `event_list_deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fiturs`
--

CREATE TABLE `fiturs` (
  `fitur_id` int(11) NOT NULL,
  `fitur_name` varchar(100) NOT NULL,
  `fitur_icon` varchar(100) NOT NULL,
  `fitur_description` text NOT NULL,
  `fitur_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fitur_updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `fitur_deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `gallery_id` int(11) NOT NULL,
  `gallery_category_id` int(11) NOT NULL,
  `gallery_poster` varchar(100) NOT NULL,
  `gallery_info` varchar(100) NOT NULL,
  `gallery_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `gallery_updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `gallery_deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `guest_stars`
--

CREATE TABLE `guest_stars` (
  `guest_star_id` int(11) NOT NULL,
  `guest_star_name` varchar(100) NOT NULL,
  `guest_star_as` varchar(100) NOT NULL,
  `guest_star_photo` varchar(100) NOT NULL,
  `guest_star_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `guest_star_updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `guest_star_deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `leaderships`
--

CREATE TABLE `leaderships` (
  `leaderships_id` int(11) NOT NULL,
  `leaderships_year_start` year(4) NOT NULL,
  `leaderships_year_end` year(4) NOT NULL,
  `leaderships_headmaster_id` int(11) NOT NULL,
  `leaderships_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `leaderships_updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `leaderships_deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mottos`
--

CREATE TABLE `mottos` (
  `motto_id` int(11) NOT NULL,
  `motto_text` varchar(100) NOT NULL,
  `motto_maker_id` int(11) NOT NULL,
  `motto_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `motto_updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `motto_deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `owner_quotes`
--

CREATE TABLE `owner_quotes` (
  `owner_quote_id` int(11) NOT NULL,
  `owner_quote_name` varchar(100) NOT NULL,
  `owner_quote_as` varchar(100) NOT NULL,
  `owner_quote_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `owner_quote_updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `owner_quote_deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE `parents` (
  `parent_id` int(11) NOT NULL,
  `parent_student_id` int(11) NOT NULL,
  `parent_name` varchar(100) NOT NULL,
  `parent_born_year` int(11) NOT NULL,
  `parent_education_ladder` char(1) NOT NULL,
  `parent_job` char(1) NOT NULL,
  `parent_salary` char(1) NOT NULL,
  `parent_nik` int(11) NOT NULL,
  `parent_type` enum('dad','mom','guardian') NOT NULL,
  `parent_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `parent_updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `parent_deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_type` enum('news','info') NOT NULL,
  `post_title` varchar(100) NOT NULL,
  `post_content` text NOT NULL,
  `post_category_id` int(11) NOT NULL,
  `post_poster` varchar(100) NOT NULL,
  `post_created_by_id` int(11) NOT NULL,
  `post_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `post_updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `program_studies`
--

CREATE TABLE `program_studies` (
  `program_study_id` int(11) NOT NULL,
  `program_study_name` varchar(100) NOT NULL,
  `program_study_kapro_id` int(11) NOT NULL,
  `program_study_akreditasi` enum('a++','a+','a','a-','b+','b','b-','c+','c','c-','d+','d','d-','e+','e') NOT NULL,
  `program_study_category_id` int(11) NOT NULL,
  `program_study_description` text NOT NULL,
  `program_study_curiculum` text NOT NULL,
  `program_study_poster` varchar(100) NOT NULL,
  `program_study_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `program_study_updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `program_study_deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `quotes`
--

CREATE TABLE `quotes` (
  `quote_id` int(11) NOT NULL,
  `quote_text` varchar(100) NOT NULL,
  `quote_owner_quote_id` int(11) NOT NULL,
  `quote_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `quote_updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `quote_deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `review_user_id` int(11) NOT NULL,
  `review_rating` enum('1','2','3','4','5','0') NOT NULL,
  `review_text` text NOT NULL,
  `review_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `review_updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `review_deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `school_id` int(11) NOT NULL,
  `school_contact_us` char(20) NOT NULL,
  `school_postal_code` char(20) NOT NULL,
  `school_city` varchar(100) NOT NULL,
  `school_province` varchar(100) NOT NULL,
  `school_name` varchar(100) NOT NULL,
  `school_logo` varchar(100) NOT NULL,
  `school_register_start` datetime NOT NULL,
  `school_register_end` datetime NOT NULL,
  `school_register_text_first` varchar(100) NOT NULL,
  `school_register_text_second` varchar(100) NOT NULL,
  `school_visi` text NOT NULL,
  `school_misi` text NOT NULL,
  `school_history` text NOT NULL,
  `school_updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sponsors`
--

CREATE TABLE `sponsors` (
  `sponsor_id` int(11) NOT NULL,
  `sponsor_name` varchar(100) NOT NULL,
  `sponsor_logo` varchar(100) NOT NULL,
  `sponsor_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sponsor_updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `sponsor_deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sponsors`
--

INSERT INTO `sponsors` (`sponsor_id`, `sponsor_name`, `sponsor_logo`, `sponsor_created_at`, `sponsor_updated_at`, `sponsor_deleted_at`) VALUES
(6, 'testing', 'alyazenita_.png', '2018-06-06 09:37:27', '0000-00-00 00:00:00', '2018-06-06 03:37:27'),
(8, 'huhuhaha', 'default.png', '2018-06-06 09:37:47', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'sdfsdf', 'default.png', '2018-06-06 09:37:20', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'asdsda', 'default.png', '2018-06-06 09:37:20', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'vcxcvcxv', 'default.png', '2018-06-06 09:37:20', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'sadw', 'default.png', '2018-06-06 09:36:12', '0000-00-00 00:00:00', '2018-06-06 03:36:12'),
(13, 'sdfsdf', 'default.png', '2018-06-06 09:36:12', '0000-00-00 00:00:00', '2018-06-06 03:36:12'),
(14, 'zxczccxz', 'default.png', '2018-06-06 09:36:12', '0000-00-00 00:00:00', '2018-06-06 03:36:12'),
(15, 'wette', 'default.png', '2018-06-06 09:36:12', '0000-00-00 00:00:00', '2018-06-06 03:36:12'),
(16, 'gfgn', 'default.png', '2018-06-06 09:36:12', '0000-00-00 00:00:00', '2018-06-06 03:36:12');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `student_user_id` int(11) NOT NULL,
  `student_status` enum('official','applicant') NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `student_nipd` char(15) NOT NULL,
  `student_gender` enum('M','F') NOT NULL,
  `student_nisn` char(11) NOT NULL,
  `student_born_in` varchar(200) NOT NULL,
  `student_born_date` date NOT NULL,
  `student_nik` int(20) NOT NULL,
  `student_religion` enum('islam','kristen','katholik','hindu','budha','konghucu') NOT NULL,
  `student_address` text NOT NULL,
  `student_rt` char(5) NOT NULL,
  `student_rw` char(5) NOT NULL,
  `student_hutment` varchar(100) NOT NULL,
  `student_village` varchar(100) NOT NULL,
  `student_districts` varchar(100) NOT NULL,
  `student_postal_code` char(10) NOT NULL,
  `student_type_stay` char(1) NOT NULL,
  `student_transport` char(1) NOT NULL,
  `student_house_phone` char(15) NOT NULL,
  `student_hand_phone` char(15) NOT NULL,
  `student_email` varchar(100) NOT NULL,
  `student_skhun` char(50) NOT NULL,
  `student_accept_kps` char(1) NOT NULL,
  `student_no_kps` int(11) NOT NULL,
  `student_romble_now` varchar(50) NOT NULL,
  `student_no_exam_member` int(11) NOT NULL,
  `student_no_series_of_diplomas` int(11) NOT NULL,
  `student_accept_kip` char(1) NOT NULL,
  `student_no_kip` int(11) NOT NULL,
  `student_name_in_kip` varchar(100) NOT NULL,
  `student_no_in_kks` int(11) NOT NULL,
  `student_no_registration_akta` char(50) NOT NULL,
  `student_bank` varchar(100) NOT NULL,
  `student_no_rek_bank` char(50) NOT NULL,
  `student_rek_name` varchar(100) NOT NULL,
  `student_feasible_pip` char(1) NOT NULL,
  `student_ reason_feasible_pip` varchar(100) NOT NULL,
  `student_special_needs` text NOT NULL,
  `student_origin_school` varchar(100) NOT NULL,
  `student_child_to` int(11) NOT NULL,
  `student_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `student_updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `student_deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_activities`
--

CREATE TABLE `student_activities` (
  `student_activity_id` int(11) NOT NULL,
  `student_activity_name` varchar(100) NOT NULL,
  `student_activity_poster` varchar(100) NOT NULL,
  `student_activity_coach_id` int(11) NOT NULL,
  `student_activity_category_id` int(11) DEFAULT NULL,
  `student_activity_description` text NOT NULL,
  `student_activity_type` enum('ekskul','organization') NOT NULL,
  `student_activity_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `student_activity_updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `student_activity_deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `student_activity_tags`
--

CREATE TABLE `student_activity_tags` (
  `student_activity_tag_id` int(11) NOT NULL,
  `student_activity_tag_ekskul_id` int(11) NOT NULL,
  `student_activity_tag_type` enum('gallery','achievment') NOT NULL,
  `student_activity_tag_post_id` int(11) NOT NULL,
  `student_activity_tag_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `student_activity_tag_updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `student_activity_tag_deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `studies`
--

CREATE TABLE `studies` (
  `study_id` int(11) NOT NULL,
  `study_name` int(11) NOT NULL,
  `study_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `study_updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `study_deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `teacher_id` int(11) NOT NULL,
  `teacher_user_id` int(11) NOT NULL,
  `teacher_name` varchar(100) NOT NULL,
  `teacher_nuptk` char(20) NOT NULL,
  `teacher_gender` enum('M','F') NOT NULL,
  `teacher_born_in` varchar(100) NOT NULL,
  `teacher_born_date` date NOT NULL,
  `teacher_nip` char(50) NOT NULL,
  `teacher_job_status` char(1) NOT NULL,
  `teacher_type_ptk` char(1) NOT NULL,
  `teacher_religion` enum('islam','kristen','katholik','hindu','budha','konghucu') NOT NULL,
  `teacher_street_address` varchar(100) NOT NULL,
  `teacher_rt` char(5) NOT NULL,
  `teacher_rw` char(5) NOT NULL,
  `teacher_hutment` varchar(100) NOT NULL,
  `teacher_village` varchar(100) NOT NULL,
  `teacher_districts` varchar(100) NOT NULL,
  `teacher_postal_code` char(20) NOT NULL,
  `teacher_home_phone` char(15) NOT NULL,
  `teacher_hand_phone` char(15) NOT NULL,
  `teacher_email` varchar(100) NOT NULL,
  `teacher_additional_task` varchar(100) NOT NULL,
  `teacher_sk_cpns` varchar(100) NOT NULL,
  `teacher_date_cpns` date NOT NULL,
  `teacher_sk_appointment` varchar(100) NOT NULL,
  `teacher_tmt_appointment` date NOT NULL,
  `teacher_agency_appointment` char(1) NOT NULL,
  `teacher_rank_group` varchar(100) NOT NULL,
  `teacher_salary_source` char(1) NOT NULL,
  `teacher_mom` varchar(100) NOT NULL,
  `teacher_marriage_status` char(1) NOT NULL,
  `teacher_wife` varchar(100) NOT NULL,
  `teacher_wife_nip` char(50) NOT NULL,
  `teacher_wife_job` varchar(100) NOT NULL,
  `teacher_tmt_pns` date NOT NULL,
  `teacher_after_licence_headmaster` tinyint(1) NOT NULL,
  `teacher_ever_training_supervisor` tinyint(1) NOT NULL,
  `teacher_skill_braille` tinyint(1) NOT NULL,
  `teacher_skill_sign_language` tinyint(1) NOT NULL,
  `teacher_npwp` char(20) NOT NULL,
  `teacher_name_taxpayer` varchar(100) NOT NULL,
  `teacher_citizenship` char(3) NOT NULL,
  `teacher_bank` varchar(100) NOT NULL,
  `teacher_no_rek` char(50) NOT NULL,
  `teacher_rek_name` varchar(100) NOT NULL,
  `teacher_nik` char(20) NOT NULL,
  `teacher_title_id` int(11) NOT NULL,
  `teacher_greeting` text NOT NULL,
  `teacher_level` enum('headmaster','vice_principal','common') NOT NULL DEFAULT 'common',
  `teacher_status` enum('active','leave','','') NOT NULL,
  `teacher_facebook` varchar(100) NOT NULL,
  `teacher_twitter` varchar(100) NOT NULL,
  `teacher_instagram` varchar(100) NOT NULL,
  `teacher_leave_at` timestamp NULL DEFAULT NULL,
  `teacher_created_at` timestamp NULL DEFAULT NULL,
  `teacher_updated_at` timestamp NULL DEFAULT NULL,
  `teacher_deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`teacher_id`, `teacher_user_id`, `teacher_name`, `teacher_nuptk`, `teacher_gender`, `teacher_born_in`, `teacher_born_date`, `teacher_nip`, `teacher_job_status`, `teacher_type_ptk`, `teacher_religion`, `teacher_street_address`, `teacher_rt`, `teacher_rw`, `teacher_hutment`, `teacher_village`, `teacher_districts`, `teacher_postal_code`, `teacher_home_phone`, `teacher_hand_phone`, `teacher_email`, `teacher_additional_task`, `teacher_sk_cpns`, `teacher_date_cpns`, `teacher_sk_appointment`, `teacher_tmt_appointment`, `teacher_agency_appointment`, `teacher_rank_group`, `teacher_salary_source`, `teacher_mom`, `teacher_marriage_status`, `teacher_wife`, `teacher_wife_nip`, `teacher_wife_job`, `teacher_tmt_pns`, `teacher_after_licence_headmaster`, `teacher_ever_training_supervisor`, `teacher_skill_braille`, `teacher_skill_sign_language`, `teacher_npwp`, `teacher_name_taxpayer`, `teacher_citizenship`, `teacher_bank`, `teacher_no_rek`, `teacher_rek_name`, `teacher_nik`, `teacher_title_id`, `teacher_greeting`, `teacher_level`, `teacher_status`, `teacher_facebook`, `teacher_twitter`, `teacher_instagram`, `teacher_leave_at`, `teacher_created_at`, `teacher_updated_at`, `teacher_deleted_at`) VALUES
(1, 2, 'Abdul Majid', '', 'M', 'Subang', '1986-02-02', '', '', '', 'islam', 'Jalancagak', '12', '05', 'Sukaasih', 'Sukamulya', 'Jalan Cagak', '19765', '089712712123', '089712712123', 'huhu@gmail.com', '', '', '0000-00-00', '', '0000-00-00', '', '', '', 'aminah', '1', 'sukinem', '', '', '0000-00-00', 0, 0, 0, 0, '', '', '', '', '', '', '', 0, 'hai, nama saya adul', 'common', 'active', '', '', '', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_files`
--

CREATE TABLE `teacher_files` (
  `teacher_file_id` int(11) NOT NULL,
  `teacher_file_teacher_id` int(11) NOT NULL,
  `teacher_file_type` enum('silabus','rpp','modul') NOT NULL,
  `teacher_file_title` varchar(100) NOT NULL,
  `teacher_file_name` varchar(100) NOT NULL,
  `teacher_file_ext` char(5) NOT NULL,
  `teacher_file_size` int(11) NOT NULL,
  `teacher_file_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `teacher_file_updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `teacher_file_deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_files`
--

INSERT INTO `teacher_files` (`teacher_file_id`, `teacher_file_teacher_id`, `teacher_file_type`, `teacher_file_title`, `teacher_file_name`, `teacher_file_ext`, `teacher_file_size`, `teacher_file_created_at`, `teacher_file_updated_at`, `teacher_file_deleted_at`) VALUES
(1, 1, 'silabus', 'huha', '11401054_WDC2016_Mesakke_Subang3.pdf', '.pdf', 1873, '2018-06-06 22:27:30', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 1, 'silabus', 'Matematika', 'ANGGARAN_DASAR.docx', '.docx', 32, '2018-06-06 22:26:32', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 1, 'silabus', 'huha', '11401054_WDC2016_Mesakke_Subang4.pdf', '.pdf', 1873, '2018-06-06 22:28:54', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 1, 'modul', 'modul 1', '11401054_WDC2016_Mesakke_Subang5.pdf', '.pdf', 1873, '2018-06-06 22:30:04', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 1, 'modul', 'Matematika', 'Asal_Mula_VOC.docx', '.docx', 43, '2018-06-06 22:35:13', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 1, 'modul', 'asd', 'ahmadirfan.pdf', '.pdf', 1776, '2018-06-06 22:35:28', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `teachs`
--

CREATE TABLE `teachs` (
  `teach_id` int(11) NOT NULL,
  `teach_teacher_id` int(11) NOT NULL,
  `teach_study_id` int(11) NOT NULL,
  `teach_class_id` int(11) NOT NULL,
  `teach_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `teach_updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `teach_deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `titles`
--

CREATE TABLE `titles` (
  `title_id` int(11) NOT NULL,
  `title_name` varchar(100) NOT NULL,
  `title_abbr` char(10) NOT NULL,
  `title_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `title_updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `title_deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_username` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_role` enum('admin','student','teacher') NOT NULL,
  `user_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_username`, `user_password`, `user_role`, `user_created_at`, `user_updated_at`, `user_deleted_at`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '2018-06-03 16:26:54', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'teacher', '8d788385431273d11e8b43bb78f3aa41', 'teacher', '2018-06-06 13:19:26', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `video_id` int(11) NOT NULL,
  `video_poster` varchar(100) NOT NULL,
  `video_file` varchar(100) NOT NULL,
  `video_title` varchar(100) NOT NULL,
  `video_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `video_updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `video_deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `educations`
--
ALTER TABLE `educations`
  ADD PRIMARY KEY (`education_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `event_guest_stars`
--
ALTER TABLE `event_guest_stars`
  ADD PRIMARY KEY (`event_guest_star_id`);

--
-- Indexes for table `event_lists`
--
ALTER TABLE `event_lists`
  ADD PRIMARY KEY (`event_list_id`);

--
-- Indexes for table `fiturs`
--
ALTER TABLE `fiturs`
  ADD PRIMARY KEY (`fitur_id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`gallery_id`);

--
-- Indexes for table `guest_stars`
--
ALTER TABLE `guest_stars`
  ADD PRIMARY KEY (`guest_star_id`);

--
-- Indexes for table `leaderships`
--
ALTER TABLE `leaderships`
  ADD PRIMARY KEY (`leaderships_id`);

--
-- Indexes for table `mottos`
--
ALTER TABLE `mottos`
  ADD PRIMARY KEY (`motto_id`);

--
-- Indexes for table `owner_quotes`
--
ALTER TABLE `owner_quotes`
  ADD PRIMARY KEY (`owner_quote_id`);

--
-- Indexes for table `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`parent_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `program_studies`
--
ALTER TABLE `program_studies`
  ADD PRIMARY KEY (`program_study_id`);

--
-- Indexes for table `quotes`
--
ALTER TABLE `quotes`
  ADD PRIMARY KEY (`quote_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`school_id`);

--
-- Indexes for table `sponsors`
--
ALTER TABLE `sponsors`
  ADD PRIMARY KEY (`sponsor_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `student_activities`
--
ALTER TABLE `student_activities`
  ADD PRIMARY KEY (`student_activity_id`);

--
-- Indexes for table `student_activity_tags`
--
ALTER TABLE `student_activity_tags`
  ADD PRIMARY KEY (`student_activity_tag_id`);

--
-- Indexes for table `studies`
--
ALTER TABLE `studies`
  ADD PRIMARY KEY (`study_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `teacher_files`
--
ALTER TABLE `teacher_files`
  ADD PRIMARY KEY (`teacher_file_id`);

--
-- Indexes for table `teachs`
--
ALTER TABLE `teachs`
  ADD PRIMARY KEY (`teach_id`);

--
-- Indexes for table `titles`
--
ALTER TABLE `titles`
  ADD PRIMARY KEY (`title_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`video_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `educations`
--
ALTER TABLE `educations`
  MODIFY `education_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `event_guest_stars`
--
ALTER TABLE `event_guest_stars`
  MODIFY `event_guest_star_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `event_lists`
--
ALTER TABLE `event_lists`
  MODIFY `event_list_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fiturs`
--
ALTER TABLE `fiturs`
  MODIFY `fitur_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `gallery_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `guest_stars`
--
ALTER TABLE `guest_stars`
  MODIFY `guest_star_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `leaderships`
--
ALTER TABLE `leaderships`
  MODIFY `leaderships_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mottos`
--
ALTER TABLE `mottos`
  MODIFY `motto_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `owner_quotes`
--
ALTER TABLE `owner_quotes`
  MODIFY `owner_quote_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `parents`
--
ALTER TABLE `parents`
  MODIFY `parent_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `program_studies`
--
ALTER TABLE `program_studies`
  MODIFY `program_study_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `quotes`
--
ALTER TABLE `quotes`
  MODIFY `quote_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
  MODIFY `school_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sponsors`
--
ALTER TABLE `sponsors`
  MODIFY `sponsor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `student_activities`
--
ALTER TABLE `student_activities`
  MODIFY `student_activity_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `student_activity_tags`
--
ALTER TABLE `student_activity_tags`
  MODIFY `student_activity_tag_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `studies`
--
ALTER TABLE `studies`
  MODIFY `study_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `teacher_files`
--
ALTER TABLE `teacher_files`
  MODIFY `teacher_file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `teachs`
--
ALTER TABLE `teachs`
  MODIFY `teach_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `titles`
--
ALTER TABLE `titles`
  MODIFY `title_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `video_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
