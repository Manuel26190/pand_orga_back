-- Active: 1721052888491@@127.0.0.1@3306@pand_orga
CREATE DATABASE pand_orga;

DROP DATABASE pand_orga;



DROP TABLE IF EXISTS `users`;

DROP TABLE IF EXISTS `notes`;

DROP TABLE IF EXISTS `events`;

CREATE TABLE `users` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `pseudo` varchar(255) NOT NULL,    
    `password` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
)

CREATE TABLE notes (
    `id` int(11) NOT NULL AUTO_INCREMENT,    
    `content` text NOT NULL,
    PRIMARY KEY (`id`)
)

CREATE TABLE events (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `title` varchar(255) NOT NULL,
    `date_start` datetime NOT NULL,
    `date_end` datetime NOT NULL,
    PRIMARY KEY (`id`)
)

