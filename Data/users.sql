CREATE TABLE `users` (
`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
`type` enum(`member`,`admin`) NOT NULL,
`username` VARCHAR(30) NOT NULL,
`email` VARCHAR(100) NOT NULL,
`pass` VARBINARY(32) NOT NULL,
`fName` VARCHAR(25) NOT NULL,
`lname` VARCHAR(50) NOT NULL,
`dateExpires` DATE NOT NULL,
`dateCreated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
`dateModified` TIMESTAMP NOT NULL DEFAULT `oooo-oo-oo oo:oo:oo`,
PRIMARY KEY (`id`),
UNIQUE KEY `username` (`username`),
UNIQUE KEY `email' ('email')
)ENGINE=MyISAM DEFAULT CHARSET=utf8;