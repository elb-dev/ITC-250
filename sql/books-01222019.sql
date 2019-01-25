/*
books-01222019.sql
author, description, etc.

potential SQL commands below:

###Selects book titles with their categories.
SELECT BookTitle, Category FROM wn19_Books INNER JOIN wn19_Categories ON wn19_Books.CategoryID = wn19_Categories.CategoryID;
*/
###Shows all PHP books
SELECT BookTitle, Category FROM wn19_Books INNER JOIN wn19_Categories ON wn19_Books.CategoryID = wn19_Categories.CategoryID WHERE wn19_Categories.CategoryID = 2;

###Shows all PHP books with aliasing
SELECT BookTitle, Category FROM wn19_Books AS b INNER JOIN wn19_Categories AS c ON b.CategoryID = c.CategoryID WHERE c.CategoryID = 2;

###Here we add the book description
SELECT BookTitle, Category, b.Description AS 'Book Description'
FROM wn19_Books AS b 
INNER JOIN wn19_Categories AS c 
ON b.CategoryID = c.CategoryID 
WHERE c.CategoryID = 2;

###Show the number of books for each category
SELECT COUNT(c.categoryID) AS 'Number of Books', Category
FROM wn19_Books AS b 
INNER JOIN wn19_Categories AS c 
ON b.CategoryID = c.CategoryID
GROUP BY Category;

-- Adminer 4.6.3 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `wn19_Books`;
CREATE TABLE `wn19_Books` (
  `BookID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `BookTitle` varchar(120) DEFAULT NULL,
  `Authors` varchar(120) DEFAULT NULL,
  `CategoryID` int(11) DEFAULT '0',
  `ISBN` varchar(30) DEFAULT NULL,
  `Edition` varchar(20) DEFAULT NULL,
  `Description` text,
  `Rating` int(11) DEFAULT NULL,
  `Price` float(6,2) DEFAULT NULL,
  PRIMARY KEY (`BookID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `wn19_Books` (`BookID`, `BookTitle`, `Authors`, `CategoryID`, `ISBN`, `Edition`, `Description`, `Rating`, `Price`) VALUES
(1,	'Professional ADO.NET',	'Smith',	1,	'568524456',	'2nd Edition',	'A great .NET book',	8,	23.50),
(2,	'Apache Server Unleashed',	'Jones',	2,	'12345678',	'1st Edition',	'A great PHP book',	7,	29.50),
(3,	'ASP.NET Unleashed',	'Doe',	1,	'345678976',	'1st Edition',	'A great .NET book',	9,	39.95),
(4,	'Introducing .NET',	'Wilson',	1,	'67890567',	'3rd Edition',	'A great .NET book',	8,	24.45),
(5,	'Professional C#',	'Jones',	1,	'568524456',	'1st Edition',	'A great .NET book',	6,	38.45),
(6,	'Beginning C++',	'Jackson',	3,	'12345678',	'1st Edition',	'A great programming book',	10,	41.40),
(7,	'Beginning J++',	'Johnson',	3,	'345678976',	'1st Edition',	'A great programming book',	8,	44.30),
(8,	'Beginning PHP',	'Smith',	2,	'345678976',	'2nd Edition',	'A great PHP book',	7,	55.50),
(9,	'Beginning MySQL',	'McDonald',	2,	'67890567',	'1st Edition',	'A great PHP book',	6,	98.20),
(10,	'Beginning Visual Basic',	'Cox',	3,	'12345678',	'1st Edition',	'A great .NET book',	8,	58.95),
(11,	'Beginning XHTML',	'Jones',	4,	'12345678',	'1st Edition',	'A great HTML book',	5,	39.95),
(12,	'Hacking Exposed',	'Evans',	5,	'12345678',	'2nd Edition',	'A great .NET book',	9,	22.20),
(13,	'Effective Java',	'Franklin',	3,	'568524456',	'1st Edition',	'A great programming book',	8,	91.20),
(14,	'JavaScript Bible',	'Jones',	4,	'12345678',	'1st Edition',	'A great HTML book',	6,	33.55),
(15,	'Beginning PHP4 and XML',	'Doe',	2,	'12345678',	'2nd Edition',	'A great PHP book',	7,	48.50),
(16,	'VBScript Regular Expressions',	'Smith',	3,	'12345678',	'1st Edition',	'A great programming book',	7,	49.50),
(17,	'Programming ASP',	'Johnson',	6,	'67890567',	'4th Edition',	'A great ASP book',	8,	49.50),
(18,	'Programming PHP',	'Doe',	2,	'345678976',	'1st Edition',	'A great PHP book',	9,	49.50),
(19,	'Programming C#',	'Jones',	1,	'568524456',	'1st Edition',	'A great .NET book',	7,	49.50),
(20,	'Programming Java',	'Smith',	3,	'56780765',	'5th Edition',	'A great programming book',	6,	49.50),
(21,	'Introducing XML',	'Evans',	4,	'12345678',	'1st Edition',	'A great HTML book',	8,	33.95);

DROP TABLE IF EXISTS `wn19_Categories`;
CREATE TABLE `wn19_Categories` (
  `CategoryID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Category` varchar(120) DEFAULT NULL,
  `Description` text,
  PRIMARY KEY (`CategoryID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `wn19_Categories` (`CategoryID`, `Category`, `Description`) VALUES
(1,	'DotNet',	'Microsoft \'s flagship server technology.'),
(2,	'PHP',	'The world\'s most popular open source technology.'),
(3,	'Programming',	'Books of general programming interest.'),
(4,	'HTML',	'Web page architecture.'),
(5,	'Networking',	'How networks connect us.'),
(6,	'ASP',	'Microsoft \'s classic server technology.');

-- Turns back on foreign keys.
SET foreign_key_checks = 1;
-- 2019-01-22 23:51:31