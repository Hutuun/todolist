

DROP TABLE IF EXISTS `sutache`;
CREATE TABLE `sutache` (
`idTache` int(6) NOT NULL,
  `nomTache` varchar(500) NOT NULL,
  `descriptionTache` varchar(1500) NOT NULL,
  `idDemandeur` varchar(6) NOT NULL,
  `priorite` tinyint(4) NOT NULL DEFAULT '0',
  `deadline` timestamp NULL DEFAULT NULL,
  `dateCreation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dateSuppr` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `suppr` varchar(3) NOT NULL DEFAULT 'non'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`) VALUES ('4',"Digger 7 personnes","voila",'2',0,'0000-00-00 00:00:00','2019-06-11 10:47:55','0000-00-00 00:00:00','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`) VALUES ('5',"ok","ok",'2',0,'0000-00-00 00:00:00','2019-06-11 13:48:11','0000-00-00 00:00:00','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`) VALUES ('t0',"php upc","Faire un programme php",'2',0,'','2019-05-20 09:00:00','2019-06-07 11:37:16','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`) VALUES ('t1',"TODO","Création d'une TODO list pour enrengistrer les tâches à faire.",'2',0,'','2019-05-23 10:00:00','0000-00-00 00:00:00','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`) VALUES ('t2',"ok","ok",'2',0,'0000-00-00 00:00:00','2019-06-07 16:26:59','2019-06-11 10:22:09','oui');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`) VALUES ('t3',"ok","ok",'2',0,'0000-00-00 00:00:00','2019-06-07 16:30:50','0000-00-00 00:00:00','non');
DROP TABLE IF EXISTS `subd`;
CREATE TABLE `subd` (
  `idBD` varchar(6) NOT NULL,
  `nomBD` varchar(100) NOT NULL,
  `diminutif` varchar(6) NOT NULL,
  `color` varchar(6) NOT NULL DEFAULT '000000'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT IGNORE INTO `subd` (`idBD`, `nomBD`, `diminutif`, `color`) VALUES('bd0', "Autre", "autre", '000000'); 
INSERT IGNORE INTO `subd` (`idBD`, `nomBD`, `diminutif`, `color`) VALUES('bd1', "Inventaire 2.0", "INV2.0", 'ff0000'); 
INSERT IGNORE INTO `subd` (`idBD`, `nomBD`, `diminutif`, `color`) VALUES('bd2', "Infofin", "INFOfi", '0000ff'); 
DROP TABLE IF EXISTS `sutbd`;
CREATE TABLE `sutbd` (
  `idBD` varchar(6) NOT NULL,
  `idTache` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd0', 't1'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd1', 't0'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd1', 't2'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd2', 't2'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd0', 't3'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd1', 't3'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd2', 't3'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd0', '4'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd0', '5'); 
DROP TABLE IF EXISTS `sutuser`;
CREATE TABLE `sutuser` (
  `idUser` varchar(6) NOT NULL,
  `idTache` varchar(6) NOT NULL,
  `checked` tinyint(1) NOT NULL DEFAULT '0',
  `adminC` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('1', 't0', 0, 1); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('1', 't1', 0, 0); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('1', 't2', 0, 0); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('2', 't2', 0, 0); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('1', 't3', 0, 0); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('2', 't3', 0, 0); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('1', '4', 0, 0); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('1', '5', 0, 0); 
DROP TABLE IF EXISTS `suuser`;
CREATE TABLE `suuser` (
  `idUser` varchar(6) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `admin` varchar(3) NOT NULL DEFAULT 'non',
  `login` varchar(10) NOT NULL,
  `password` varchar(21000) NOT NULL DEFAULT 'Default',
  `dateDebut` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dateFin` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `mail` varchar(100) DEFAULT NULL,
  `color` varchar(6) NOT NULL DEFAULT '000000' COMMENT 'code hexa de la couleur'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT="table des utilisateurs de la TODO list";
INSERT IGNORE INTO `suuser` (`idUser`, `nom`, `prenom`, `admin`,`login`,`password`, `dateDebut`, `dateFin`, `mail`, `color`) VALUES('', "Ferchaud", "Manon", '0',"","", '0000-00-00 00:00:00', '0000-00-00 00:00:00', "2manon.ferchaud@insa-rouen.fr", '0000ff'); 
INSERT IGNORE INTO `suuser` (`idUser`, `nom`, `prenom`, `admin`,`login`,`password`, `dateDebut`, `dateFin`, `mail`, `color`) VALUES('1', "Honnet", "Sullivan", '0',"1","ok", '2019-05-28 10:57:47', '0000-00-00 00:00:00', "sullivan1.honnet@gmail.com", 'ff0000'); 
INSERT IGNORE INTO `suuser` (`idUser`, `nom`, `prenom`, `admin`,`login`,`password`, `dateDebut`, `dateFin`, `mail`, `color`) VALUES('2', "Vanhoren", "Maxime", '2',"mv","mv", '2019-05-28 10:57:47', '0000-00-00 00:00:00', "", 'cc0099'); 
INSERT IGNORE INTO `suuser` (`idUser`, `nom`, `prenom`, `admin`,`login`,`password`, `dateDebut`, `dateFin`, `mail`, `color`) VALUES('4', "ok", "ok", '0',"oo","", '2019-06-03 00:00:00', '2019-06-10 00:00:00', "ok@ok.com", '00ff00'); 
ALTER TABLE `subd`
  ADD PRIMARY KEY (`idBD`);


ALTER TABLE `sutache`
  ADD PRIMARY KEY (`idTache`);

ALTER TABLE `sutbd`
  ADD KEY `fk_sutbd_idBD` (`idBD`),
  ADD KEY `fk_sutbd_idTache` (`idTache`);

ALTER TABLE `sutuser`
  ADD KEY `fk_sutuser_idUser` (`idUser`),
  ADD KEY `fk_sutuser_idTache` (`idTache`);


ALTER TABLE `suuser`
  ADD PRIMARY KEY (`idUser`);

ALTER TABLE `sutbd`
  ADD CONSTRAINT `fk_sutbd_idBD` FOREIGN KEY (`idBD`) REFERENCES `subd` (`idBD`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sutbd_idTache` FOREIGN KEY (`idTache`) REFERENCES `sutache` (`idTache`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `sutuser`
  ADD CONSTRAINT `fk_sutuser_idTache` FOREIGN KEY (`idTache`) REFERENCES `sutache`(`idTache`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sutuser_idUser` FOREIGN KEY (`idUser`) REFERENCES `suuser`(`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;
