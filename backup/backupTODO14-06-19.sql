

DROP TABLE IF EXISTS `sutache`;
CREATE TABLE `sutache` (
`idTache` int(6) NOT NULL,
  `nomTache` varchar(500) NOT NULL,
  `descriptionTache` varchar(1500) NOT NULL,
  `idDemandeur` varchar(6) NOT NULL,
  `priorite` tinyint(4) NOT NULL DEFAULT '0',
  `deadline` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `dateCreation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dateSuppr` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `suppr` varchar(3) NOT NULL DEFAULT 'non'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`) VALUES ('0',"upc programme","Faire un programme php",'2',0,'0000-00-00 00:00:00','2019-05-20 00:00:00','2019-05-24 00:00:00','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`) VALUES ('1',"TODO","Création d'une TODO list pour enrengistrer les tâches à faire. Et c'est long.",'2',0,'0000-00-00 00:00:00','2019-05-23 10:00:00','0000-00-00 00:00:00','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`) VALUES ('2',"Présentation c++/java","Présentation c++/java",'2',0,'2019-06-14 00:00:00','2019-06-07 00:00:00','0000-00-00 00:00:00','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`) VALUES ('3',"PV réunion 5/6","PV réunion 5/6",'2',0,'2019-06-05 00:00:00','2019-06-05 00:00:00','2019-06-07 15:33:26','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`) VALUES ('4',"Visite site inv","visiter le site de l'inventaire de la recherche",'2',0,'0000-00-00 00:00:00','2019-05-24 00:00:00','2019-06-07 15:33:39','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`) VALUES ('5',"Accès intranet","Accès intranet",'2',0,'0000-00-00 00:00:00','2019-05-31 00:00:00','2019-06-07 15:33:37','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`) VALUES ('6',"Accès bd","Accès à la base de donnée",'2',0,'0000-00-00 00:00:00','2019-06-03 00:00:00','2019-06-07 15:33:33','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`) VALUES ('7',"Accès code","Accès code",'2',0,'0000-00-00 00:00:00','2019-06-03 00:00:00','2019-06-07 15:33:17','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`) VALUES ('8',"Doc stage","Document à envoyer pour le stage, la fiche de suivi",'2',0,'2019-06-03 00:00:00','2019-06-03 00:00:00','2019-06-07 15:33:31','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`) VALUES ('9',"MCD <> phpmyadmin","Document des différence entre la vu de la base de donnée et les tables réellement dans la base de donnée",'2',0,'0000-00-00 00:00:00','2019-06-05 00:00:00','2019-06-07 15:35:40','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`) VALUES ('10',"Doc chaine de caractère en sql","Doc chaine de caractère en sql avec les fonctions utiles",'2',0,'0000-00-00 00:00:00','2019-06-05 00:00:00','2019-06-07 15:33:29','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`) VALUES ('11',"Statistiques BD","Calcul de statistiques sur la base de données de INFOFIN suite à la réunion du lundi 03/06/2019.",'2',0,'0000-00-00 00:00:00','2019-06-06 16:30:19','2019-06-11 16:15:58','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`) VALUES ('12',"Mailing PHP","Faire le mailing de INFOFIN en PHP.",'2',1,'0000-00-00 00:00:00','2019-06-06 16:30:56','0000-00-00 00:00:00','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`) VALUES ('13',"Mailing DOC/XLS","Faire le mailing de INFOFIN avec DOC et XLS.",'2',0,'0000-00-00 00:00:00','2019-06-06 16:31:27','0000-00-00 00:00:00','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`) VALUES ('14',"Présentation mailing","Modifier la présentation du mailing suite aux demandes de la réunion du lundi 03/06/2019.",'2',0,'0000-00-00 00:00:00','2019-06-06 16:32:24','0000-00-00 00:00:00','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`) VALUES ('15',"Corrections INFOFIN","Faire quelques corrections sur INFOFIN suite aux demandes lors de la réunion du lundi 03/06/2019.",'2',0,'0000-00-00 00:00:00','2019-06-06 16:33:45','0000-00-00 00:00:00','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`) VALUES ('16',"Nouveautés INFOFIN","Ajouter de nouvelles fonctionnalités sur INFOFIN suite aux demandes lors de la réunion du lundi 03/06/2019.",'2',0,'0000-00-00 00:00:00','2019-06-06 16:34:11','0000-00-00 00:00:00','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`) VALUES ('17',"Présentation INSA Rouen","Faire la présentation de l'INSA Rouen Normandie.",'2',0,'2019-06-07 00:00:00','2019-06-06 00:00:00','2019-06-11 10:31:22','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`) VALUES ('18',"Connection à INFOFIN","Faire en sorte de pouvoir se connecter à INFOFIN sur projetsdr.",'2',0,'0000-00-00 00:00:00','2019-06-06 16:36:30','0000-00-00 00:00:00','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`) VALUES ('19',"Seul admin subscribers","Vérifier que seuls les admins peuvent voir les subscribers sur INFOFIN et sinon le mettre en place.",'2',0,'0000-00-00 00:00:00','2019-06-06 16:37:32','0000-00-00 00:00:00','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`) VALUES ('20',"Analyse tables","Analyser les tables d'INFOFIN.",'2',0,'0000-00-00 00:00:00','2019-06-06 16:38:29','2019-06-11 16:18:44','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`) VALUES ('21',"Sécurité Mysqli et PDO","Voir les différences, notamment au niveau de la sécurité, entre Mysqli et PDO.",'2',0,'0000-00-00 00:00:00','2019-06-06 16:39:12','0000-00-00 00:00:00','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`) VALUES ('22',"Mail gros projets","Envoyer par mail le lien affichant les projets majeurs ainsi qu'une explication.",'2',0,'0000-00-00 00:00:00','2019-06-06 16:40:26','2019-06-11 16:12:29','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`) VALUES ('23',"Passage Mysqli","Passer l'application INFOFIN de Mysql à Mysqli et vérifier que tout fonctionne.",'2',0,'0000-00-00 00:00:00','2019-06-06 16:41:12','0000-00-00 00:00:00','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`) VALUES ('24',"Problème page profil INFOFIN","Régler le problème de la table p2_scientific_domain d'INFOFIN sur projetsdr.",'2',0,'0000-00-00 00:00:00','2019-06-06 16:42:13','0000-00-00 00:00:00','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`) VALUES ('25',"Ajout chercheurs+MA2 mailing","Ajouter tous les chercheurs et les masters2 au mailing.",'2',0,'0000-00-00 00:00:00','2019-06-06 16:48:26','0000-00-00 00:00:00','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`) VALUES ('26',"Bonnes pratiques encodage","Faire une sorte de manuel regroupant les bonnes pratiques d'encodage d'un INFOFIN",'2',0,'0000-00-00 00:00:00','2019-06-06 16:49:11','0000-00-00 00:00:00','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`) VALUES ('27',"Digger 7 personnes","Rechercher :
- Nicolas KACZMAREK (matricule 89134)

- Tania D’HAIJERE (matricule 326416)

- Quentin EVRARD

- Fabio STOCH

- Dieter WEBER

- Samuel VANDEN ABEELE

- Natalia DE SOUZA AROUJO (matricule 20009116)",'2',0,'0000-00-00 00:00:00','2019-06-11 10:08:36','0000-00-00 00:00:00','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`) VALUES ('28',"Book","Les livres",'2',0,'0000-00-00 00:00:00','2019-06-11 10:13:41','0000-00-00 00:00:00','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`) VALUES ('29',"Présentation du 21/06","Faire une présentation d'un sujet sur l'informatique.",'2',0,'2019-06-21 00:00:00','2019-06-11 11:10:12','0000-00-00 00:00:00','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`) VALUES ('30',"Modification d'un projet","Régler le problème de modification d'un projet sur projetsdr/infofin.",'2',1,'0000-00-00 00:00:00','2019-06-11 11:11:56','2019-06-14 07:52:11','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`) VALUES ('31',"Sécurité Mysqli/PDO","Faire un document relatant les différences de sécurité entre mysqli et PDO",'2',0,'0000-00-00 00:00:00','2019-06-11 16:20:48','2019-06-11 16:21:18','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`) VALUES ('32',"Cofund : Tests et Vérifications"," ",'2',0,'0000-00-00 00:00:00','2019-06-12 07:55:39','0000-00-00 00:00:00','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`) VALUES ('33',"Cofund : corrections"," ",'2',0,'0000-00-00 00:00:00','2019-06-12 07:56:15','0000-00-00 00:00:00','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`) VALUES ('34',"Rendre Paradox 7 compatible sous Windows 10","",'2',0,'0000-00-00 00:00:00','2019-06-12 10:23:20','0000-00-00 00:00:00','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`) VALUES ('35',"Texte Cvchercheur","Ajouter le texte de bibiane dans l'apllis",'2',0,'0000-00-00 00:00:00','2019-06-12 14:13:24','0000-00-00 00:00:00','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`) VALUES ('36',"Programme 16 bits sur Windows10","Voir s'il est possible d’exécuter un programme 16 bits sur Windows 10 et si ce n'est pas possible, voir pour faire une machine virtuelle.",'2',0,'0000-00-00 00:00:00','2019-06-12 14:23:23','0000-00-00 00:00:00','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`) VALUES ('37',"Etudes sur les messageries","Faire une étude sur les messageries les plus utilisées.",'2',0,'0000-00-00 00:00:00','2019-06-12 15:11:44','0000-00-00 00:00:00','non');
DROP TABLE IF EXISTS `subd`;
CREATE TABLE `subd` (
  `idBD` varchar(6) NOT NULL,
  `nomBD` varchar(100) NOT NULL,
  `diminutif` varchar(6) NOT NULL,
  `color` varchar(6) NOT NULL DEFAULT '000000'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT IGNORE INTO `subd` (`idBD`, `nomBD`, `diminutif`, `color`) VALUES('bd0', "Autre", "AUT", '000000'); 
INSERT IGNORE INTO `subd` (`idBD`, `nomBD`, `diminutif`, `color`) VALUES('bd1', "Inventaire 2.0", "INV", 'ff0000'); 
INSERT IGNORE INTO `subd` (`idBD`, `nomBD`, `diminutif`, `color`) VALUES('bd2', "Infofin", "INF", '0000ff'); 
INSERT IGNORE INTO `subd` (`idBD`, `nomBD`, `diminutif`, `color`) VALUES('bd3', "ProjetsDR", "PDR", '00ff40'); 
INSERT IGNORE INTO `subd` (`idBD`, `nomBD`, `diminutif`, `color`) VALUES('bd4', "CVchercheurs", "CVC", 'cc3300'); 
INSERT IGNORE INTO `subd` (`idBD`, `nomBD`, `diminutif`, `color`) VALUES('bd5', "Port. Part.", "PaPo", '66ffff'); 
INSERT IGNORE INTO `subd` (`idBD`, `nomBD`, `diminutif`, `color`) VALUES('bd6', "FU", "FU", 'ff33cc'); 
INSERT IGNORE INTO `subd` (`idBD`, `nomBD`, `diminutif`, `color`) VALUES('bd7', "Prest. 1/3", "P1/3", 'aaaaaa'); 
INSERT IGNORE INTO `subd` (`idBD`, `nomBD`, `diminutif`, `color`) VALUES('bd8', "Proposition de thèse", "PTh", 'ffa900'); 
DROP TABLE IF EXISTS `sutbd`;
CREATE TABLE `sutbd` (
  `idBD` varchar(6) NOT NULL,
  `idTache` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd1', '0'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd0', '1'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd0', '2'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd0', '3'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd1', '4'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd1', '5'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd1', '6'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd1', '7'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd0', '8'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd1', '9'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd0', '10'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd2', '11'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd2', '12'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd2', '13'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd0', '14'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd2', '15'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd2', '16'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd2', '17'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd2', '18'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd2', '19'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd2', '20'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd2', '22'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd2', '23'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd2', '24'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd0', '25'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd0', '26'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd4', '27'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd0', '28'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd0', '29'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd2', '30'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd2', '31'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd5', '32'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd5', '33'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd0', '34'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd4', '35'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd0', '36'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd2', '37'); 
DROP TABLE IF EXISTS `sutuser`;
CREATE TABLE `sutuser` (
  `idUser` varchar(6) NOT NULL,
  `idTache` varchar(6) NOT NULL,
  `checked` tinyint(1) NOT NULL DEFAULT '0',
  `adminC` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('1', '0', 1, 1); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('1', '1', 0, 0); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('1', '2', 0, 0); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('1', '3', 1, 1); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('1', '4', 1, 1); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('1', '5', 1, 1); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('1', '6', 1, 1); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('1', '7', 1, 1); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('1', '8', 1, 1); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('1', '9', 1, 1); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('1', '10', 1, 1); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('1', '27', 1, 0); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('1', '28', 0, 0); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('1', '35', 1, 0); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('3', '11', 1, 1); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('3', '12', 0, 0); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('3', '13', 0, 0); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('3', '14', 0, 0); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('3', '15', 0, 0); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('3', '16', 0, 0); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('3', '17', 1, 1); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('3', '18', 1, 0); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('3', '19', 0, 0); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('3', '20', 1, 1); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('3', '22', 1, 1); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('3', '23', 1, 0); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('3', '24', 1, 0); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('3', '29', 0, 0); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('3', '30', 1, 1); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('3', '31', 1, 1); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('3', '36', 1, 0); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('3', '37', 1, 0); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('4', '25', 0, 0); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('4', '26', 0, 0); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('5', '32', 0, 0); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('5', '33', 0, 0); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('5', '34', 0, 0); 
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
INSERT IGNORE INTO `suuser` (`idUser`, `nom`, `prenom`, `admin`,`login`,`password`, `dateDebut`, `dateFin`, `mail`, `color`) VALUES('1', "Honnet", "Sullivan", '0',"sh","Letemps", '2019-05-28 10:57:47', '0000-00-00 00:00:00', "sullivan1.honnet@gmail.com", 'ff0000'); 
INSERT IGNORE INTO `suuser` (`idUser`, `nom`, `prenom`, `admin`,`login`,`password`, `dateDebut`, `dateFin`, `mail`, `color`) VALUES('2', "Vanhoren", "Maxime", '2',"mv","mv", '2019-05-28 10:57:47', '0000-00-00 00:00:00', "pprosprs@gmail.com", 'cc0099'); 
INSERT IGNORE INTO `suuser` (`idUser`, `nom`, `prenom`, `admin`,`login`,`password`, `dateDebut`, `dateFin`, `mail`, `color`) VALUES('3', "Ferchaud", "Manon", '0',"mf","mf", '2019-05-27 00:00:00', '0000-00-00 00:00:00', "mmanon.ferchaud@insa-rouen.fr", '0000ff'); 
INSERT IGNORE INTO `suuser` (`idUser`, `nom`, `prenom`, `admin`,`login`,`password`, `dateDebut`, `dateFin`, `mail`, `color`) VALUES('4', "Autre", "Personne", '1',"pa","ok", '2019-06-06 16:46:45', '0000-00-00 00:00:00', "", '000000'); 
INSERT IGNORE INTO `suuser` (`idUser`, `nom`, `prenom`, `admin`,`login`,`password`, `dateDebut`, `dateFin`, `mail`, `color`) VALUES('5', "Vanobbergen", "Pierre", '0',"pv","pv", '2019-06-14 00:00:00', '0000-00-00 00:00:00', "ppierrevob@hotmail.com", '00ff00'); 
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
  ADD UNIQUE KEY `id` (`idBD`,`idTache`),
  ADD CONSTRAINT `fk_sutbd_idBD` FOREIGN KEY (`idBD`) REFERENCES `subd` (`idBD`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sutbd_idTache` FOREIGN KEY (`idTache`) REFERENCES `sutache` (`idTache`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `sutuser`
ADD UNIQUE KEY `id` (`idUser`,`idTache`),
  ADD CONSTRAINT `fk_sutuser_idTache` FOREIGN KEY (`idTache`) REFERENCES `sutache`(`idTache`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sutuser_idUser` FOREIGN KEY (`idUser`) REFERENCES `suuser`(`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;
