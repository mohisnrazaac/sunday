ALTER TABLE `users` ADD `user_role` INT NULL AFTER `email`;
CREATE TABLE `messages` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `messages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

ALTER TABLE `messages` ADD `receiver_id` bigint UNSIGNED NOT NULL AFTER `user_id`;


<<<<<<< HEAD
<--After 4rth of September following commands need to execute-->
=======
<--On 4rth of September following commands need to execute-->
>>>>>>> main
ALTER TABLE messages ADD COLUMN read_at TIMESTAMP NULL DEFAULT NULL AFTER message;
ALTER TABLE `departments` CHANGE `id` `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT, add PRIMARY KEY (`id`);


<<<<<<< HEAD
<--AFter 10th September Following commands need to run-->
ALTER TABLE `terms` CHANGE `image` `fileattachment` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL;


<!-- After 12 September -->

ALTER TABLE `coursemediafile` CHANGE `id` `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT, add PRIMARY KEY (`id`);
=======
<--on 10th September Following commands need to run-->
ALTER TABLE `terms` CHANGE `image` `fileattachment` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL;


<!-- on 12 September -->

ALTER TABLE `coursemediafile` CHANGE `id` `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT, add PRIMARY KEY (`id`);

<!-- on 15 of september -->

ALTER TABLE `courses` ADD `created_by` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP AFTER `updated_at`, ADD `updated_by` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP AFTER `created_by`;
ALTER TABLE `courses` ADD `current_step` ENUM('section','lecture','quiz','assignment','media','completed') NULL DEFAULT 'completed' AFTER `updated_by`;
ALTER TABLE `courses` ADD `last_step_id` INT NULL DEFAULT NULL AFTER `current_step`;
ALTER TABLE `courses` CHANGE `created_by` `created_by` BIGINT NULL DEFAULT NULL;
ALTER TABLE `courses` CHANGE `updated_by` `updated_by` BIGINT NULL DEFAULT NULL;
ALTER TABLE `courses` CHANGE `current_step` `current_step` ENUM('section','lecture','quiz','assignment','media','completed','course') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT 'completed';
ALTER TABLE `sessions` ADD `created_by` BIGINT NULL DEFAULT NULL AFTER `updated_at`, ADD `updated_by` BIGINT NULL DEFAULT NULL AFTER `created_by`;
ALTER TABLE `quizzes` ADD `created_by` BIGINT NULL DEFAULT NULL AFTER `updated_at`, ADD `updated_by` BIGINT NULL DEFAULT NULL AFTER `created_by`;
ALTER TABLE `assignment` ADD `created_by` BIGINT NULL DEFAULT NULL AFTER `updated_at`, ADD `updated_by` BIGINT NULL DEFAULT NULL AFTER `created_by`;
ALTER TABLE `coursemediafile` ADD `created_by` BIGINT NULL DEFAULT NULL AFTER `updated_at`, ADD `updated_by` BIGINT NULL DEFAULT NULL AFTER `created_by`;
ALTER TABLE `terms` ADD `created_by` BIGINT NULL DEFAULT NULL AFTER `updated_at`, ADD `updated_by` BIGINT NULL DEFAULT NULL AFTER `created_by`;
>>>>>>> main
