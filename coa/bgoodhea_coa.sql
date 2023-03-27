-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 28, 2023 at 12:48 PM
-- Server version: 5.7.23-23
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bgoodhea_coa`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) NOT NULL,
  `date_of_birth` date NOT NULL,
  `marital_status` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nationality` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `have_ni` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ni_number` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ni_reference_number` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `have_mnc` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mnc_pin` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `relative_name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `relationship` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address1` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address2` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address3` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postTown` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postcode` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `relative_tel_code` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `relative_tel` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `relative_mobile_code` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `relative_mobile` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `relative_email` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visa_status` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `other_note` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visa_expiry_date` date NOT NULL,
  `passport_no` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `place_of_issue` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `issue_date` date NOT NULL,
  `expiry_date` date NOT NULL,
  `have_sharecode` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sharecode` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `choose` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disable` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disability_note` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_note` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `offence` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `offence_note` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disciplinary_procedure` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disciplinary_note` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `criminal_offence` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `criminal_note` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agree_declaration` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agree` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `signature` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `application_comments` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `employee_id`, `date_of_birth`, `marital_status`, `nationality`, `have_ni`, `ni_number`, `ni_reference_number`, `have_mnc`, `mnc_pin`, `relative_name`, `relationship`, `address1`, `address2`, `address3`, `postTown`, `postcode`, `relative_tel_code`, `relative_tel`, `relative_mobile_code`, `relative_mobile`, `relative_email`, `visa_status`, `other_note`, `visa_expiry_date`, `passport_no`, `place_of_issue`, `issue_date`, `expiry_date`, `have_sharecode`, `sharecode`, `choose`, `gender`, `age`, `disable`, `disability_note`, `service`, `service_note`, `offence`, `offence_note`, `disciplinary_procedure`, `disciplinary_note`, `criminal_offence`, `criminal_note`, `agree_declaration`, `agree`, `signature`, `name`, `date`, `application_comments`, `created_at`, `updated_at`) VALUES
(15, 4, '1987-08-26', 'Married', 'British Citizen', 'yes', 'SS528421B', NULL, 'yes', '16C0057O', 'Tony Kurian', 'Husband', '3 Charlbury Close', NULL, NULL, 'Wellingborough', 'NN8 2NS', '44', '7458687678', '44', '7458687678', 'kuriantony7@gmail.com', 'Other', 'British Citizen', '2032-03-22', '130343856', 'HMPO', '2022-03-22', '2032-03-22', 'yes', '1234', 'Asian', 'Female', 'age4', 'no', NULL, 'no', NULL, 'no', NULL, 'no', NULL, 'no', NULL, 'on', 'on', 'Lincy Mathew', 'Lincy Mathew', '2023-02-28', NULL, '2023-02-28 10:41:38', '2023-02-28 10:41:38');

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) NOT NULL,
  `bank_name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort_code` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_no` bigint(20) DEFAULT NULL,
  `account_holder` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address1` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address2` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address3` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postTown` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postcode` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) NOT NULL,
  `comment_section` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `employee_id`, `comment_section`, `comment`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 3, 'DBS', 'test comment', 'Mary Ann', '2023-02-28 09:16:27', '2023-02-28 09:16:27'),
(2, 3, 'DBS', 'test', 'Mary Ann', '2023-02-28 09:16:56', '2023-02-28 09:16:56'),
(3, 4, 'Application', 'Nil', 'Mary Ann', '2023-02-28 10:43:46', '2023-02-28 10:43:46');

-- --------------------------------------------------------

--
-- Table structure for table `contracts`
--

CREATE TABLE `contracts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) NOT NULL,
  `commencement_date` date NOT NULL,
  `weekday_longday_type1` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weekday_night_type1` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_holiday_type1` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weekend_longday_type1` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weekend_night_type1` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weekday_longday_type2` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weekend_longday_type2` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_holiday_type2` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kitchen_weekday_longday` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kitchen_weekday_night` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kitchen_bank_holiday` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kitchen_weekend_longday` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kitchen_weekend_night` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `domestic_weekday_longday` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `domestic_weekday_night` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `domestic_bank_holiday` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `domestic_weekend_longday` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `domestic_weekend_night` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `care_weekday_longday` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `care_weekday_night` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `care_bank_holiday` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `care_weekend_longday` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `care_weekend_night` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `living_weekday_longday` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `living_weekday_night` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `living_bank_holiday` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `living_weekend_longday` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `living_weekend_night` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dbsdatas`
--

CREATE TABLE `dbsdatas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) NOT NULL,
  `have_dbs` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dbsNumber` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dbsdatas`
--

INSERT INTO `dbsdatas` (`id`, `employee_id`, `have_dbs`, `dbsNumber`, `created_at`, `updated_at`) VALUES
(1, 3, 'no', NULL, '2023-02-28 09:13:42', '2023-02-28 09:13:42');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) NOT NULL,
  `study_place` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qualification` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qualified_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `employee_id`, `study_place`, `qualification`, `qualified_date`, `created_at`, `updated_at`) VALUES
(1, 4, 'Bangalore,India', 'BSC Nursing', '2009-10-05', '2023-02-28 10:38:48', '2023-02-28 10:38:48');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `posts` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kitchen_assistant` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `domestic_Care` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `care_assistant` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `living_Care` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address1` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address2` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address3` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postTown` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postcode` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_no` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_code` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uk_contact_no` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login_id` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '2',
  `registration_status` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Completed',
  `application_status` enum('Pending','Submitted','Under Review','Approved') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `reference_status` enum('Pending','Submitted','Under Review','Approved') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `health_status` enum('Pending','Submitted','Under Review','Approved') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `dbs_status` enum('Pending','Requested','Submitted','Under Review','Approved') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `training_status` enum('Pending','Requested','Submitted','Under Review','Approved') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `bank_status` enum('Pending','Submitted','Under Review','Approved') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `starter_status` enum('Pending','Submitted','Under Review','Approved') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `starterChecklist` enum('Pending','Upload','Form') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `induction_checklist` enum('Pending','Submitted','Under Review','Approved') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `employee_contract` enum('Pending','Sent','Commented','Submitted','Under Review','Approved') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `final_check` enum('Pending','Approved') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `policy_agree` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `title`, `surname`, `firstname`, `posts`, `kitchen_assistant`, `domestic_Care`, `care_assistant`, `living_Care`, `status`, `address1`, `address2`, `address3`, `postTown`, `postcode`, `contact_no`, `country_code`, `uk_contact_no`, `email`, `login_id`, `password`, `role`, `registration_status`, `application_status`, `reference_status`, `health_status`, `dbs_status`, `training_status`, `bank_status`, `starter_status`, `starterChecklist`, `induction_checklist`, `employee_contract`, `final_check`, `policy_agree`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mr', 'Ann', 'Mary', 'Senior Care Assistant', NULL, NULL, 'on', NULL, 'experienced', 'Royal Mail', 'Mount Pleasant Mail Centre', 'Farringdon Road', 'London', 'EC1A 1BB', '9847123456', NULL, '9847123456', 'samthomaskb08@gmail.com', 'admin123', '$2y$10$kQ29eZb7JrxL.4YlhJLYzOiEgQstiVS02b7tCjA9cLjqnOI5BXdey', '1', 'Completed', 'Pending', 'Pending', 'Pending', 'Pending', 'Pending', 'Pending', 'Pending', 'Pending', 'Pending', 'Pending', 'Pending', 'yes', NULL, '2023-02-22 11:40:46', '2023-02-22 11:42:35'),
(2, 'Mr', 'Test', 'Test', 'Care Assistant', NULL, NULL, NULL, NULL, 'fresher', 'Test', 'Test', 'Test', 'Test', 'Test', '9847521245', NULL, '9847521245', 'sam@echoapps360.com', 'test123', '$2y$10$M3byslCljc2sKqWzSA0NFu.n4g6MrJdspv0lgppQ8VU4huyBbMn6m', '2', 'Completed', 'Pending', 'Pending', 'Pending', 'Pending', 'Pending', 'Pending', 'Pending', 'Pending', 'Pending', 'Pending', 'Pending', 'no', NULL, '2023-02-22 11:59:57', '2023-02-22 11:59:57'),
(3, 'Miss', 'Mathew', 'Manju', 'Care Assistant', 'on', NULL, NULL, NULL, 'experienced', 'Match Options Ltd', 'Spencer House', '3 Spencer Parade', 'Northampton', 'NN1 5AA', '7894561234', NULL, '7894561234', 'manju@echoapps360.com', 'manjutest123', '$2y$10$hgUiurixJvCiR129fC11se4WcibiXvTjpjnYgPawmQtISfMo5rl5u', '2', 'Completed', 'Pending', 'Pending', 'Pending', 'Under Review', 'Pending', 'Pending', 'Pending', 'Pending', 'Pending', 'Pending', 'Pending', 'yes', NULL, '2023-02-28 09:12:11', '2023-02-28 09:16:56'),
(4, 'Mrs', 'Mathew', 'Lincy', 'Nurse', NULL, NULL, NULL, NULL, 'experienced', '3 Charlbury Close', NULL, NULL, 'Wellingborough', 'NN8 2NS', '7404017974', '44', '7404017974', 'mathewlincy8@gmail.com', 'Lincy', '$2y$10$JUs0YmgWqslC9tCWUjkOGuD7eNNePagJSmtbLGhUAXgL4lOjssnbO', '2', 'Completed', 'Approved', 'Pending', 'Pending', 'Pending', 'Pending', 'Pending', 'Pending', 'Pending', 'Pending', 'Pending', 'Pending', 'yes', NULL, '2023-02-28 09:27:29', '2023-02-28 10:43:46');

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) NOT NULL,
  `file_type` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_type_additional` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiry_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `employee_id`, `file_type`, `file_type_additional`, `file_name`, `file_path`, `expiry_date`, `created_at`, `updated_at`) VALUES
(1, 4, 'Passport', 'Passport', 'Lincy  British Passport.pdf', 'https://coa.b-goodhealthcare.co.uk/files/1677580624_Lincy  British Passport.pdf', '2032-03-22', '2023-02-28 10:37:04', '2023-02-28 10:37:04'),
(2, 4, 'BRP', 'BRP', 'Lincy  British Passport.pdf', 'https://coa.b-goodhealthcare.co.uk/files/1677580643_Lincy  British Passport.pdf', '2032-03-22', '2023-02-28 10:37:23', '2023-02-28 10:37:23');

-- --------------------------------------------------------

--
-- Table structure for table `healths`
--

CREATE TABLE `healths` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) NOT NULL,
  `gp_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gp_country_code` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gp_mobile` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address1` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address2` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address3` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postTown` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postcode` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `depression` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `depression_note` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `epilepsy` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `epilepsy_note` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ailment` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ailment_note` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spinal` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `spinal_note` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `arthritis` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `arthritis_note` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `heart` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `heart_note` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kidney` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kidney_note` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diabetes` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diabetes_note` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skin` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `skin_note` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `medication` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alcohol` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tobacco` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disabled` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disabled_note` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `benefit` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `absent` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pregnant` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pregnant_note` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inductions`
--

CREATE TABLE `inductions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `induction_date` date NOT NULL,
  `induction_time` time NOT NULL,
  `limit` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inductions`
--

INSERT INTO `inductions` (`id`, `induction_date`, `induction_time`, `limit`, `created_at`, `updated_at`) VALUES
(1, '2023-03-02', '10:00:00', '5', '2023-02-28 09:20:10', '2023-02-28 09:20:10');

-- --------------------------------------------------------

--
-- Table structure for table `induction_checklists`
--

CREATE TABLE `induction_checklists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) NOT NULL,
  `history` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `philosophy` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personality` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `organisation` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `handbook` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contacts` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `policy` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opportunity` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `workplace` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `statement` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sick` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duty` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uniform` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `availability` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transportation` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `protection` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `complaints` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trainings` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hygiene` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agree` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `signature` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `induction_onlines`
--

CREATE TABLE `induction_onlines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `induction_date` date NOT NULL,
  `induction_time` time NOT NULL,
  `limit` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `induction_users`
--

CREATE TABLE `induction_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `induction_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `induction_user_onlines`
--

CREATE TABLE `induction_user_onlines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `induction_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_05_27_131301_create_modules_table', 1),
(6, '2022_05_27_131535_create_privileges_table', 1),
(11, '2022_05_27_132229_create_employees_table', 2),
(12, '2014_10_12_200000_add_two_factor_columns_to_users_table', 3),
(14, '2022_06_11_055845_create_files_table', 4),
(16, '2022_06_20_054932_create_employees_table', 5),
(17, '2022_06_22_122507_create_files_table', 6),
(18, '2022_06_22_123526_create_files_table', 7),
(19, '2022_07_12_075945_create_banks_table', 8),
(20, '2022_07_12_153516_create_tests_table', 9),
(21, '2022_07_13_104255_create_banks_table', 10),
(22, '2022_07_13_115529_create_starters_table', 11),
(23, '2022_07_14_134619_create_healths_table', 12),
(24, '2022_07_14_150336_create_applications_table', 13),
(25, '2022_07_15_051523_create_healths_table', 14),
(26, '2022_07_15_061437_create_healths_table', 15),
(27, '2022_07_15_120247_create_inductions_table', 16),
(28, '2022_07_15_120322_create_induction_users_table', 16),
(29, '2022_07_15_120806_create_induction_onlines_table', 17),
(30, '2022_07_15_120834_create_induction_user_onlines_table', 17);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `privileges`
--

CREATE TABLE `privileges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) NOT NULL,
  `view_user` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edit_user` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_user` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `upload_user` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `download_user` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `view_application` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edit_application` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_application` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `upload_application` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `download_application` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `view_training` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edit_training` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_training` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `upload_training` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `download_training` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `view_reference` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edit_reference` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_reference` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `upload_reference` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `download_reference` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `view_health` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edit_health` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_health` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `upload_health` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `download_health` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `view_dbs` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edit_dbs` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_dbs` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `upload_dbs` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `download_dbs` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `view_bank` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edit_bank` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_bank` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `upload_bank` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `download_bank` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `view_starter` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edit_starter` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_starter` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `upload_starter` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `download_starter` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `view_contract` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edit_contract` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_contract` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `upload_contract` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `download_contract` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `view_induction` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edit_induction` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_induction` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `upload_induction` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `download_induction` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `terms_condition` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_template` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contract_content` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pay_rates` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_role` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `add_staff` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `view_edit` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delete_deactivate` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `references`
--

CREATE TABLE `references` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) NOT NULL,
  `refer1_name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `refer2_name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `refer1_job` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `refer2_job` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `other_note1` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_note2` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `refer1_address` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `refer2_address` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `refer1_company` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `refer2_company` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `refer1_tel` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `refer2_tel` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `refer1_email` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `refer2_email` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) NOT NULL,
  `role_name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `starters`
--

CREATE TABLE `starters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) NOT NULL,
  `insurance` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `statementA` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statementB` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statementC` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `loan` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_complete` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_debit` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `loan_plan` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pg_loan` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_pg_complete` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pg_debit` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `signature` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `starter_files`
--

CREATE TABLE `starter_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

CREATE TABLE `templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heading` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `template_section` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `template` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` (`id`, `heading`, `template_section`, `template`, `created_at`, `updated_at`) VALUES
(1, 'Terms & Conditions', 'Policy', '<p>We and our partners store and/or access information on a device, such as cookies and process personal data, such as unique identifiers and standard information sent by a device for personalised ads and content, ad and content measurement, and audience insights, as well as to develop and improve products. With your permission we and our partners may use precise geolocation data and identification through device scanning. You may click to consent to our and our partners&rsquo; processing as described above. Alternatively you may access more detailed information and change your preferences before consenting or to refuse consenting.</p>\n\n<p>Please note that some processing of your personal data may not require your consent, but you have a right to object to such processing. Your preferences will apply to this website only. You can change your preferences at any time by returning to this site or visit our privacy policy.</p>', '2022-11-03 14:12:29', '2022-11-21 13:07:52'),
(2, NULL, 'Indroduction1', '<p>This document outlines the Terms and Conditions which apply to your contract and other information which is relevant to your employment.<br />\n&nbsp;</p>', '2022-12-11 21:02:39', '2023-02-22 04:08:57'),
(3, NULL, 'Indroduction2', '<p>2.Employment<br />\nThe Employee agrees that he or she will faithfully and to the best of their ability to carry out the duties and responsibilities communicated to them by the Employer. The Employee shall comply with all company policies, rules and procedures at all times.</p>\n\n<p>3.Position<br />\nIt is the duty of the Employee to perform all essential job functions and duties. From time to time, the Employer may also add other duties within the reasonable scope of the Employee&rsquo;s work.</p>\n\n<p>&nbsp;</p>', '2022-12-11 21:04:16', '2023-02-22 04:22:21'),
(4, NULL, 'Indroduction3', '<p>4.Benefits<br />\nThe Employee has the right to participate in any benefits plans offered by the Employer.&nbsp;&nbsp;Access to these benefits will only be possible after the probationary period has passed.</p>\n\n<p>&nbsp;</p>', '2022-12-12 03:53:55', '2023-02-22 04:28:25'),
(5, NULL, 'Trainings', '<p>It is understood that the first 6 months&nbsp;of employment constitutes a probationary period. During this time, the Employee is not eligible for paid time off or other benefits. During this time, the Employer also exercises the right to terminate employment at any time without advanced notice.</p>', '2022-11-24 20:40:45', '2023-02-22 04:30:50'),
(6, NULL, 'Termination1', '<p>It is the intention of both parties to form a long and mutually profitable relationship. However, this relationship may be terminated by either party at any time provided [length of time] written notice is delivered to the other party.</p>', '2022-11-24 20:46:47', '2023-02-22 04:24:46'),
(7, NULL, 'Termination2', '<p>1.Entirety<br />\nThis contract represents the entire agreement between the two parties and supersedes any previous written or oral agreement. This agreement may be modified at any time, provided the written consent of both the Employer and the Employee.</p>\n\n<p>2.Legal Authorization<br />\nThe Employee agree that he or she is fully authorized to work in [country name] and can provide proof of this with legal documentation. This documentation will be obtained by the Employer for legal records.</p>\n\n<p>3.Severability<br />\nThe parties agree that if any portion of this contract is found to be void or unenforceable, it shall be struck from the record and the remaining provisions will retain their full force and effect.</p>\n\n<p>4.Jurisdiction<br />\nThis contract shall be governed, interpreted, and construed in accordance with the laws of [state, province or territory].</p>', '2022-11-24 21:01:49', '2023-02-22 04:27:03'),
(8, NULL, 'end', '<p><span dir=\"ltr\">If you are in agreement with the above terms and conditions and policies of the company as outlined in above clauses, please sign this statement and return to B-Good Healthcare Ltd. It is the responsibility of the staff to retain a copy in their personal file.</span></p>\n\n<p><br />\n<span dir=\"ltr\">Yours sincerely,<br />\nManager<br />\nB-Good Healthcare Ltd</span></p>', '2022-11-29 13:46:10', '2023-02-22 04:33:27');

-- --------------------------------------------------------

--
-- Table structure for table `trainings`
--

CREATE TABLE `trainings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) NOT NULL,
  `have_training` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `upload_status` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `training_comments` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$ThQmkJEKKIaVyg64/YCDUud7UmBul/YPypuaZRb2Jec8b.dP/cb1.', NULL, NULL, NULL, NULL, '2022-05-29 03:27:40', '2022-05-29 03:27:40');

-- --------------------------------------------------------

--
-- Table structure for table `user_contracts`
--

CREATE TABLE `user_contracts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `signature` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `action` enum('Commented','Submitted','Under Review','Approved') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `workers`
--

CREATE TABLE `workers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` bigint(20) NOT NULL,
  `role_id` bigint(20) NOT NULL,
  `address` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postcode` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_code_contact` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_tel` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_code_mobile` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_no` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login_id` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff_status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `works`
--

CREATE TABLE `works` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) NOT NULL,
  `from` date NOT NULL,
  `to` date NOT NULL,
  `employer_name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_type` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_title` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `works`
--

INSERT INTO `works` (`id`, `employee_id`, `from`, `to`, `employer_name`, `business_type`, `job_title`, `created_at`, `updated_at`) VALUES
(1, 4, '2015-01-05', '2023-02-28', 'London Northwest Healthcare NHS trust', 'NHS', 'RGN', '2023-02-28 10:40:45', '2023-02-28 10:40:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contracts`
--
ALTER TABLE `contracts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dbsdatas`
--
ALTER TABLE `dbsdatas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `healths`
--
ALTER TABLE `healths`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inductions`
--
ALTER TABLE `inductions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `induction_checklists`
--
ALTER TABLE `induction_checklists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `induction_onlines`
--
ALTER TABLE `induction_onlines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `induction_users`
--
ALTER TABLE `induction_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `induction_user_onlines`
--
ALTER TABLE `induction_user_onlines`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `privileges`
--
ALTER TABLE `privileges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `references`
--
ALTER TABLE `references`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `starters`
--
ALTER TABLE `starters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `starter_files`
--
ALTER TABLE `starter_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `templates`
--
ALTER TABLE `templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainings`
--
ALTER TABLE `trainings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_contracts`
--
ALTER TABLE `user_contracts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workers`
--
ALTER TABLE `workers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `works`
--
ALTER TABLE `works`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contracts`
--
ALTER TABLE `contracts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dbsdatas`
--
ALTER TABLE `dbsdatas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `healths`
--
ALTER TABLE `healths`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inductions`
--
ALTER TABLE `inductions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `induction_checklists`
--
ALTER TABLE `induction_checklists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `induction_onlines`
--
ALTER TABLE `induction_onlines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `induction_users`
--
ALTER TABLE `induction_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `induction_user_onlines`
--
ALTER TABLE `induction_user_onlines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `privileges`
--
ALTER TABLE `privileges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `references`
--
ALTER TABLE `references`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `starters`
--
ALTER TABLE `starters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `starter_files`
--
ALTER TABLE `starter_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `templates`
--
ALTER TABLE `templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `trainings`
--
ALTER TABLE `trainings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_contracts`
--
ALTER TABLE `user_contracts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `workers`
--
ALTER TABLE `workers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `works`
--
ALTER TABLE `works`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
