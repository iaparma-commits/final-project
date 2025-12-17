-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2025 at 01:05 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `budget_planning_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `audit_logs`
--

CREATE TABLE `audit_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `budget_id` bigint(20) UNSIGNED DEFAULT NULL,
  `action` enum('Create','Update','Delete','Approve','Adjust') NOT NULL,
  `action_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `budget_adjustments`
--

CREATE TABLE `budget_adjustments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `budget_id` bigint(20) UNSIGNED NOT NULL,
  `adjusted_by` bigint(20) UNSIGNED NOT NULL,
  `old_amount` decimal(15,2) NOT NULL,
  `new_amount` decimal(15,2) NOT NULL,
  `reason` text NOT NULL,
  `adjusted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `budget_allocations`
--

CREATE TABLE `budget_allocations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `amount_allocated` decimal(15,2) NOT NULL,
  `period_start` date NOT NULL,
  `period_end` date NOT NULL,
  `status` enum('Pending','Approved','Rejected','Adjusted','Active','Closed','Cancelled') NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `budget_allocations`
--

INSERT INTO `budget_allocations` (`id`, `project_id`, `created_by`, `amount_allocated`, `period_start`, `period_end`, `status`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 100000000.00, '2005-10-21', '2005-10-21', 'Pending', '2025-12-16 15:33:34', '2025-12-16 15:33:34');

-- --------------------------------------------------------

--
-- Table structure for table `budget_approvals`
--

CREATE TABLE `budget_approvals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `budget_id` bigint(20) UNSIGNED NOT NULL,
  `decision` enum('Approved','Rejected') NOT NULL,
  `remarks` text DEFAULT NULL,
  `approved_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `budget_expenses`
--

CREATE TABLE `budget_expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `budget_id` bigint(20) UNSIGNED NOT NULL,
  `amount_spent` decimal(15,2) NOT NULL,
  `expense_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `budget_expenses`
--

INSERT INTO `budget_expenses` (`id`, `budget_id`, `amount_spent`, `expense_date`, `created_at`, `updated_at`) VALUES
(2, 2, 5000000.00, '2005-10-21', '2025-12-16 15:35:25', '2025-12-16 15:35:25');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2025_12_16_152100_create_users_table', 1),
(2, '2025_12_16_152120_create_projects_table', 1),
(3, '2025_12_16_152139_create_budget_allocations_table', 1),
(4, '2025_12_16_152158_create_budget_approvals_table', 1),
(5, '2025_12_16_152226_create_budget_adjustments_table', 1),
(6, '2025_12_16_152253_create_budget_expenses_table', 1),
(7, '2025_12_16_152310_create_audit_logs_table', 1),
(8, '2025_12_16_154815_create_sessions_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `department_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `project_name`, `department_name`, `created_at`, `updated_at`) VALUES
(1, 'Building', 'CCS', '2025-12-16 15:27:38', '2025-12-16 15:27:38');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('V1KK4tMOVQDjwL6iKet2S1X2H0lSDzkdSgKqvWbe', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaTF3NzdkbktaUHdhcVJyY1dwU0lSZFhRQlh1MnBtRlV5RlRMS3A5MSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO3M6NToicm91dGUiO3M6OToiZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1765929536);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` enum('Admin','Manager','Finance') NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `role`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Ian Parma', 'iaparma@my.cspc.edu.ph', 'Admin', 'Active', '2025-12-16 15:27:04', '2025-12-16 15:56:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audit_logs`
--
ALTER TABLE `audit_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `audit_logs_user_id_foreign` (`user_id`),
  ADD KEY `audit_logs_budget_id_foreign` (`budget_id`);

--
-- Indexes for table `budget_adjustments`
--
ALTER TABLE `budget_adjustments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `budget_adjustments_budget_id_foreign` (`budget_id`),
  ADD KEY `budget_adjustments_adjusted_by_foreign` (`adjusted_by`);

--
-- Indexes for table `budget_allocations`
--
ALTER TABLE `budget_allocations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `budget_allocations_project_id_foreign` (`project_id`),
  ADD KEY `budget_allocations_created_by_foreign` (`created_by`);

--
-- Indexes for table `budget_approvals`
--
ALTER TABLE `budget_approvals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `budget_approvals_budget_id_foreign` (`budget_id`);

--
-- Indexes for table `budget_expenses`
--
ALTER TABLE `budget_expenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `budget_expenses_budget_id_foreign` (`budget_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `audit_logs`
--
ALTER TABLE `audit_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `budget_adjustments`
--
ALTER TABLE `budget_adjustments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `budget_allocations`
--
ALTER TABLE `budget_allocations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `budget_approvals`
--
ALTER TABLE `budget_approvals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `budget_expenses`
--
ALTER TABLE `budget_expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `audit_logs`
--
ALTER TABLE `audit_logs`
  ADD CONSTRAINT `audit_logs_budget_id_foreign` FOREIGN KEY (`budget_id`) REFERENCES `budget_allocations` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `audit_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `budget_adjustments`
--
ALTER TABLE `budget_adjustments`
  ADD CONSTRAINT `budget_adjustments_adjusted_by_foreign` FOREIGN KEY (`adjusted_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `budget_adjustments_budget_id_foreign` FOREIGN KEY (`budget_id`) REFERENCES `budget_allocations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `budget_allocations`
--
ALTER TABLE `budget_allocations`
  ADD CONSTRAINT `budget_allocations_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `budget_allocations_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `budget_approvals`
--
ALTER TABLE `budget_approvals`
  ADD CONSTRAINT `budget_approvals_budget_id_foreign` FOREIGN KEY (`budget_id`) REFERENCES `budget_allocations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `budget_expenses`
--
ALTER TABLE `budget_expenses`
  ADD CONSTRAINT `budget_expenses_budget_id_foreign` FOREIGN KEY (`budget_id`) REFERENCES `budget_allocations` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
