-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.11 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for mygym
CREATE DATABASE IF NOT EXISTS `mygym` /*!40100 DEFAULT CHARACTER SET utf32 COLLATE utf32_unicode_ci */;
USE `mygym`;

-- Dumping structure for table mygym.days
CREATE TABLE IF NOT EXISTS `days` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table mygym.day_exercises
CREATE TABLE IF NOT EXISTS `day_exercises` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `exercise_id` bigint(20) unsigned NOT NULL,
  `day_id` bigint(20) unsigned NOT NULL,
  `number_of_rounds` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `day_exercises_exercise_id_foreign` (`exercise_id`),
  KEY `day_exercises_day_id_foreign` (`day_id`),
  CONSTRAINT `day_exercises_day_id_foreign` FOREIGN KEY (`day_id`) REFERENCES `days` (`id`) ON DELETE CASCADE,
  CONSTRAINT `day_exercises_exercise_id_foreign` FOREIGN KEY (`exercise_id`) REFERENCES `exercises` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table mygym.email_notifications
CREATE TABLE IF NOT EXISTS `email_notifications` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `type` enum('assign-to','change-plan') COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `plan_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `email_notifications_user_id_foreign` (`user_id`),
  KEY `email_notifications_plan_id_foreign` (`plan_id`),
  CONSTRAINT `email_notifications_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `plans` (`id`) ON DELETE CASCADE,
  CONSTRAINT `email_notifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table mygym.exercises
CREATE TABLE IF NOT EXISTS `exercises` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table mygym.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table mygym.plans
CREATE TABLE IF NOT EXISTS `plans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table mygym.plan_days
CREATE TABLE IF NOT EXISTS `plan_days` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `day_id` bigint(20) unsigned NOT NULL,
  `plan_id` bigint(20) unsigned NOT NULL,
  `type` enum('body','legs','hands') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `plan_days_day_id_foreign` (`day_id`),
  KEY `plan_days_plan_id_foreign` (`plan_id`),
  CONSTRAINT `plan_days_day_id_foreign` FOREIGN KEY (`day_id`) REFERENCES `days` (`id`) ON DELETE CASCADE,
  CONSTRAINT `plan_days_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `plans` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table mygym.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `age` int(11) DEFAULT NULL,
  `email` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Data exporting was unselected.

-- Dumping structure for table mygym.user_plans
CREATE TABLE IF NOT EXISTS `user_plans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `plan_id` bigint(20) unsigned NOT NULL,
  `number_of_weeks` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_plans_user_id_foreign` (`user_id`),
  KEY `user_plans_plan_id_foreign` (`plan_id`),
  CONSTRAINT `user_plans_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `plans` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_plans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Data exporting was unselected.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
