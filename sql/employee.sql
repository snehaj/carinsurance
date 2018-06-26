
CREATE TABLE `employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `ssn` varchar(255) NOT NULL,
  `is_employee` enum('yes','no') NOT NULL DEFAULT 'yes',
  `email` varchar(255) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `address` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
  
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `language` (
  `code` char(2) NOT NULL,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `employee_i18n` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL DEFAULT '0',
  `language_code` char(2) NOT NULL,
  `introduction` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `experience` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `education` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  INDEX employee_id (employee_id),
    FOREIGN KEY (employee_id)
        REFERENCES employee(id)
        ON UPDATE CASCADE ON DELETE CASCADE,
    INDEX language(language_code),
    FOREIGN KEY (language_code)
        REFERENCES language(code)
        ON UPDATE CASCADE ON DELETE CASCADE
		
  
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `employee_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL DEFAULT '0',
  `createdBy` varchar(255) NOT NULL,
  `modifiedBy` varchar(255) DEFAULT NULL,
  `createDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `lastModified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
   PRIMARY KEY (`id`),
   INDEX employee_id (employee_id),
    FOREIGN KEY (employee_id)
        REFERENCES employee(id)
        ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;