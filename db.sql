CREATE DATABASE authsystem;

CREATE TABLE IF NOT EXISTS `users` (
 `id` int(20) NOT NULL AUTO_INCREMENT,
 `name` varchar(50) NOT NULL,
 `email` varchar(50) NOT NULL,
 `password` varchar(50) NOT NULL,
 PRIMARY KEY (`id`)
);