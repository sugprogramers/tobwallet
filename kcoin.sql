CREATE DATABASE IF NOT EXISTS kcoin;
USE kcoin;

DROP TABLE IF EXISTS `administrator`;
CREATE TABLE `administrator` (
  `IdAdministrator` int(10) NOT NULL auto_increment,
  `Email` varchar(50) NOT NULL,  
  `Password` varchar(50) NOT NULL,
  `FirstName` varchar(70) NOT NULL,
  `LastName` varchar(70) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Phone` varchar(9) NOT NULL,
  PRIMARY KEY (`IdAdministrator`),
 UNIQUE KEY `Unique_Email` (`Email`) 
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

INSERT INTO `administrator` (`IdAdministrator`, `Email`, `Password`, `FirstName`, `LastName`, `Address`, `Phone`) VALUES
(1, 'admin@gmail.com', '123456', 'admin', 'admin', 'address admin', '262625262');


DROP TABLE IF EXISTS `versionkcoin`;
CREATE TABLE `versionkcoin` (
  `IdVersionKcoin` int(10) NOT NULL auto_increment,
  `Name` varchar(100) NOT NULL,  
  `Path` varchar(100) NOT NULL,  
  PRIMARY KEY (`IdVersionKcoin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


--  StatusUser : 1 = Register , 2 = Approved , 3 = Rejected , 4 = Mining 
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `IdUser` int(10) NOT NULL auto_increment,
  `Email` varchar(50) NOT NULL,  
  `Password` varchar(50) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `MiddleName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `Country` varchar(100) NOT NULL,
  `City` varchar(100) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `Birthday` date DEFAULT '0000-00-00' ,
  `YearGraduation` varchar(50) NOT NULL,
  `Cohort` varchar(60) NOT NULL,
  `ImageDriver` varchar(100) NOT NULL,
  `ImagePhoto` varchar(100) NOT NULL,
  `MiningOption` int(30) NOT NULL,
  `StatusUser` int(30) NOT NULL,
  `Mac` varchar(100) NOT NULL,
  `TokenMac` varchar(100) NOT NULL,
  `StatusTokenMac` int(30) NOT NULL,
  `WalletAddress` varchar(100) NOT NULL,

  `NumberMasterNode` int(30) NOT NULL,
  PRIMARY KEY  (`IdUser`),
  UNIQUE KEY `Unique_Email` (`Email`) 
) ENGINE=InnoDB DEFAULT CHARSET=utf8  AUTO_INCREMENT=1;

-- alter table user add COLUMN `NumberMasterNode` int(30) NOT NULL DEFAULT 0;

-- ALTER TABLE user ADD COLUMN  `Mac` varchar(100) NOT NULL,  ADD COLUMN `TokenMac` varchar(100) NOT NULL,  ADD COLUMN  `StatusTokenMac` int(30) NOT NULL;
-- update user set StatusTokenMac = 1 , TokenMac = MD5(LEFT(UUID(), 8)) ;
-- alter table user add column `WalletAddress` varchar(100) NOT NULL;

CREATE TABLE `queueemail` (
`IdQueueEmail` int(50) NOT NULL auto_increment,   
`To` varchar(50) not null,
`Subject` varchar(200) not null,
`Body` text NOT NULL,
`Status` int(50) NOT NULL ,
`Log` text NOT NULL,
`IdUser` int(50) NOT NULL,
`CreateDateTime` datetime DEFAULT '0000-00-00 00:00:00',
PRIMARY KEY  (`IdQueueEmail`)
) ENGINE=INNODB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


-- Bd : Mac , Token ,  StatusToken ,

-- Nombres POST o GET: func , mac , token  
-- Nombres Funciones (func):  validateMac , setMac
-- Respuesta Json : {"status":"0","msg":"Ivalido pasajero","data":[]}
-- Status :  0 : exeption or error ,  1 : existe  ,  2 : no existe 