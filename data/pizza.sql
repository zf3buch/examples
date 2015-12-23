SET FOREIGN_KEY_CHECKS=0;

START TRANSACTION;

DROP TABLE IF EXISTS `pizza`;

CREATE TABLE IF NOT EXISTS `pizza` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pos` int(10) unsigned NOT NULL,
  `neg` int(10) unsigned NOT NULL,
  `rate` float(6,4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=17 ;

INSERT INTO `pizza` (`id`, `name`, `image`, `pos`, `neg`, `rate`) VALUES
(1, 'Pizza Mista', '/assets/custom/pizza/001.jpg', 10, 3, 0.7692),
(2, 'Pizza Oliva', '/assets/custom/pizza/002.jpg', 12, 5, 0.7059),
(3, 'Pizza Margherita', '/assets/custom/pizza/003.jpg', 5, 8, 0.3846),
(4, 'Pizza Gambero', '/assets/custom/pizza/004.jpg', 3, 11, 0.2143),
(5, 'Pizza Verdura', '/assets/custom/pizza/005.jpg', 6, 7, 0.4615),
(6, 'Pizza Peperone', '/assets/custom/pizza/006.jpg', 2, 9, 0.1818),
(7, 'Pizza Vegetariana', '/assets/custom/pizza/007.jpg', 4, 13, 0.2353),
(8, 'Pizza Salame', '/assets/custom/pizza/008.jpg', 15, 3, 0.8333),
(9, 'Pizza Funghi e Oliva', '/assets/custom/pizza/009.jpg', 6, 8, 0.4286),
(10, 'Pizza Salame e Pomodoro', '/assets/custom/pizza/010.jpg', 8, 5, 0.6154),
(11, 'Pizza Frutti di Mare', '/assets/custom/pizza/011.jpg', 7, 9, 0.4375),
(12, 'Pizza Salame e Speciale', '/assets/custom/pizza/012.jpg', 15, 1, 0.9375),
(13, 'Pizza Prosciutto', '/assets/custom/pizza/013.jpg', 9, 4, 0.6923),
(14, 'Pizza Melanzane', '/assets/custom/pizza/014.jpg', 8, 8, 0.5000),
(15, 'Pizza Salame e Prosciutto', '/assets/custom/pizza/015.jpg', 13, 5, 0.7222),
(16, 'Pizza alla Mamma', '/assets/custom/pizza/016.jpg', 9, 7, 0.5625);

SET FOREIGN_KEY_CHECKS=1;

COMMIT;
