SET FOREIGN_KEY_CHECKS=0;

START TRANSACTION;

DROP TABLE IF EXISTS `user`;

CREATE TABLE IF NOT EXISTS `user` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('customer','staff','admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'customer',
  `first_name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=4 ;

INSERT INTO `user` (`id`, `email`, `password`, `role`, `first_name`, `last_name`) VALUES
(1, 'kunde@vote-my-pizza.de', '$2y$10$LgI03AFI.lu5lB1t4Rfpy.ipppiAE79Xz1Dk6pi1RVIAW2./5at2.', 'customer', 'Kuno', 'Kunde'),
(2, 'mitarbeiter@vote-my-pizza.de', '$2y$10$hSdZnVzQFQ/WV9c59Z.J5eD2T5ysL5EklRCyi67VhSb25mqG7oIKq', 'staff', 'Michael', 'Mitarbeiter'),
(3, 'admin@vote-my-pizza.de', '$2y$10$MNLzqwHkE4HNbjWIiF7i3e8aKvrBsPm8CRUF3aFbT9f1nAMeOmPDO', 'admin', 'Adonis', 'Admin');

SET FOREIGN_KEY_CHECKS=1;

COMMIT;
