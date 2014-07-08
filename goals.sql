
DROP TABLE IF EXISTS `goals`;

CREATE TABLE `goals` (
  `user_id` int(20) NOT NULL AUTO_INCREMENT,
  `goal4jaaga` varchar(500) DEFAULT NULL,
  `goal4week` varchar(500) DEFAULT NULL,
  `CS_id` varchar(20) DEFAULT NULL,
  `Git_id` varchar(20) DEFAULT NULL,
  `CA_id` varchar(20) DEFAULT NULL,
  `course` varchar(200) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `goals_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;