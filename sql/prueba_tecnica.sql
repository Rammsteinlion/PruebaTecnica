CREATE TABLE IF NOT EXISTS `APPX_employee` (`id` int(11) NOT NULL AUTO_INCREMENT,`firstname` text,`lastname` text,`department_id` int(11) DEFAULT '0',`salary` double DEFAULT '0',`educationlevel_id` int(11) DEFAULT '0',PRIMARY KEY (`id`)) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `APPX_department` (`id` int(11) NOT NULL AUTO_INCREMENT,`department_name` text,`department_city` text,PRIMARY KEY (`id`)) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `APPX_employee` (`id` int(11) NOT NULL AUTO_INCREMENT,`firstname` text,`lastname` text,`department_id` int(11) DEFAULT '0',`salary` double DEFAULT '0',`educationlevel_id` int(11) DEFAULT '0',PRIMARY KEY (`id`)) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;