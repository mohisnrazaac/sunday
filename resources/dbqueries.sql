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


<--After 4rth of September following commands need to execute-->
ALTER TABLE messages ADD COLUMN read_at TIMESTAMP NULL DEFAULT NULL AFTER message;
ALTER TABLE `departments` CHANGE `id` `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT, add PRIMARY KEY (`id`);


<--AFter 10th September Following commands need to run-->
ALTER TABLE `terms` CHANGE `image` `fileattachment` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL;


<!-- After 12 September -->

ALTER TABLE `coursemediafile` CHANGE `id` `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT, add PRIMARY KEY (`id`);