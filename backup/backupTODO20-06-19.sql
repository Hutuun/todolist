

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
  `suppr` varchar(3) NOT NULL DEFAULT 'non',
  `archive` varchar(3) NOT NULL DEFAULT 'non',
  `wait` varchar(3) NOT NULL DEFAULT 'non'
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('0',"Unité / Projets / Chercheurs programme","Faire un programme php",'2',0,'0000-00-00 00:00:00','2019-05-20 00:00:00','2019-06-03 00:00:00','non','oui','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('1',"TODO","Création d'une TODO list pour enrengistrer les tâches à faire. Et c'est long.",'2',0,'0000-00-00 00:00:00','2019-05-23 10:00:00','0000-00-00 00:00:00','non','non','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('2',"Présentation c++/java","Présentation c++/java",'2',0,'2019-06-14 00:00:00','2019-06-07 00:00:00','2019-06-14 14:11:52','non','non','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('3',"PV réunion 5/6","PV réunion 5/6",'2',0,'2019-06-05 00:00:00','2019-06-05 00:00:00','2019-06-07 15:33:26','non','oui','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('4',"Visite site inv","visiter le site de l'inventaire de la recherche",'2',0,'0000-00-00 00:00:00','2019-05-24 00:00:00','2019-06-07 15:33:39','non','oui','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('5',"Accès intranet","Accès intranet",'2',0,'0000-00-00 00:00:00','2019-05-31 00:00:00','2019-06-07 15:33:37','non','oui','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('6',"Accès bd","Accès à la base de données tel que cvchercheur ou projetsdr",'2',0,'0000-00-00 00:00:00','2019-06-03 00:00:00','2019-06-07 15:33:33','non','oui','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('7',"Accès code source de l'inventaire","Accès code",'2',0,'0000-00-00 00:00:00','2019-06-03 00:00:00','2019-06-07 15:33:17','non','oui','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('8',"Doc stage","Document à envoyer pour le stage, la fiche de suivi",'2',0,'2019-06-03 00:00:00','2019-06-03 00:00:00','2019-06-07 15:33:31','non','oui','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('9',"MCD <> phpmyadmin","Document des différence entre la vu de la base de donnée et les tables réellement dans la base de donnée",'2',0,'0000-00-00 00:00:00','2019-06-05 00:00:00','2019-06-07 15:35:40','non','oui','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('10',"Doc chaine de caractère en sql","Doc chaine de caractère en sql avec les fonctions utiles",'2',0,'0000-00-00 00:00:00','2019-06-05 00:00:00','2019-06-07 15:33:29','non','oui','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('11',"Statistiques BD","Calcul de statistiques sur la base de données de INFOFIN suite à la réunion du lundi 03/06/2019.",'2',0,'0000-00-00 00:00:00','2019-06-06 16:30:19','2019-06-11 16:15:58','non','oui','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('12',"Mailing PHP","Faire le mailing de INFOFIN en PHP.",'2',0,'0000-00-00 00:00:00','2019-06-06 16:30:56','0000-00-00 00:00:00','non','non','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('13',"Mailing DOC/XLS","Faire le mailing de INFOFIN avec DOC et XLS.",'2',0,'0000-00-00 00:00:00','2019-06-06 16:31:27','0000-00-00 00:00:00','non','non','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('14',"Présentation mailing","Modifier la présentation du mailing suite aux demandes de la réunion du lundi 03/06/2019.",'2',0,'0000-00-00 00:00:00','2019-06-06 16:32:24','2019-06-20 08:13:16','non','non','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('15',"Corrections INFOFIN","Faire quelques corrections sur INFOFIN suite aux demandes lors de la réunion du lundi 03/06/2019.",'2',0,'0000-00-00 00:00:00','2019-06-06 16:33:45','0000-00-00 00:00:00','non','non','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('16',"Nouveautés INFOFIN","Ajouter de nouvelles fonctionnalités sur INFOFIN suite aux demandes lors de la réunion du lundi 03/06/2019.",'2',0,'0000-00-00 00:00:00','2019-06-06 16:34:11','0000-00-00 00:00:00','non','non','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('17',"Présentation INSA Rouen","Faire la présentation de l'INSA Rouen Normandie.",'2',0,'2019-06-07 00:00:00','2019-06-06 00:00:00','2019-06-11 10:31:22','non','oui','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('18',"Connection à INFOFIN","Faire en sorte de pouvoir se connecter à INFOFIN sur projetsdr.",'2',0,'0000-00-00 00:00:00','2019-06-06 16:36:30','2019-06-14 11:25:19','non','non','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('19',"Seul admin subscribers","Vérifier que seuls les admins peuvent voir les subscribers sur INFOFIN et sinon le mettre en place.",'2',0,'0000-00-00 00:00:00','2019-06-06 16:37:32','0000-00-00 00:00:00','non','non','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('20',"Analyse tables","Analyser les tables d'INFOFIN.",'2',0,'0000-00-00 00:00:00','2019-06-06 16:38:29','2019-06-11 16:18:44','non','oui','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('21',"Sécurité Mysqli et PDO","Voir les différences, notamment au niveau de la sécurité, entre Mysqli et PDO.",'2',0,'0000-00-00 00:00:00','2019-06-06 16:39:12','0000-00-00 00:00:00','non','non','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('22',"Mail gros projets","Envoyer par mail le lien affichant les projets majeurs ainsi qu'une explication.",'2',0,'0000-00-00 00:00:00','2019-06-06 16:40:26','2019-06-11 16:12:29','non','oui','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('23',"Passage Mysqli","Passer l'application INFOFIN de Mysql à Mysqli et vérifier que tout fonctionne.",'2',0,'0000-00-00 00:00:00','2019-06-06 16:41:12','2019-06-14 11:25:39','non','non','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('24',"Problème page profil INFOFIN","Régler le problème de la table p2_scientific_domain d'INFOFIN sur projetsdr.",'2',0,'0000-00-00 00:00:00','2019-06-06 16:42:13','2019-06-14 11:25:42','non','non','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('25',"Ajout chercheurs+MA2 mailing","Ajouter tous les chercheurs et les masters2 au mailing.
A faire par une autre personne.",'2',0,'0000-00-00 00:00:00','2019-06-06 16:48:26','0000-00-00 00:00:00','non','non','oui');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('26',"Bonnes pratiques encodage","Faire une sorte de manuel regroupant les bonnes pratiques d'encodage d'un INFOFIN.
A faire par une autre personne.",'2',0,'0000-00-00 00:00:00','2019-06-06 16:49:11','0000-00-00 00:00:00','non','non','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('27',"Digger 7 personnes","Rechercher :
- Nicolas KACZMAREK (matricule 89134)

- Tania D’HAIJERE (matricule 326416)

- Quentin EVRARD

- Fabio STOCH

- Dieter WEBER

- Samuel VANDEN ABEELE

- Natalia DE SOUZA AROUJO (matricule 20009116)",'2',0,'0000-00-00 00:00:00','2019-06-11 10:08:36','2019-06-14 09:31:57','non','non','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('28',"Book","Les livres",'2',0,'0000-00-00 00:00:00','2019-06-11 10:13:41','0000-00-00 00:00:00','non','non','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('29',"Présentation du 24/06","Faire une présentation d'un sujet sur l'informatique.",'2',0,'2019-06-24 00:00:00','2019-06-11 11:10:12','0000-00-00 00:00:00','non','non','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('30',"Modification d'un projet","Régler le problème de modification d'un projet sur projetsdr/infofin.",'2',1,'0000-00-00 00:00:00','2019-06-11 11:11:56','2019-06-14 07:52:11','non','non','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('31',"Sécurité Mysqli/PDO","Faire un document relatant les différences de sécurité entre mysqli et PDO",'2',0,'0000-00-00 00:00:00','2019-06-11 16:20:48','2019-06-11 16:21:18','non','oui','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('32',"Cofund : Tests et Vérifications"," A ne pas oublier de tester sur tous les browser",'2',0,'0000-00-00 00:00:00','2019-06-12 07:55:39','0000-00-00 00:00:00','non','non','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('33',"Cofund : corrections: 5, 9, 10"," ",'2',0,'0000-00-00 00:00:00','2019-06-12 07:56:15','2019-06-19 11:54:10','non','non','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('34',"Rendre Paradox 7 compatible sous Windows 10","",'2',0,'0000-00-00 00:00:00','2019-06-12 10:23:20','0000-00-00 00:00:00','non','non','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('35',"Texte Bibi Cvchercheur","Ajouter le texte de bibiane dans l'apllis",'2',0,'0000-00-00 00:00:00','2019-06-12 14:13:24','2019-06-19 11:18:56','non','non','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('36',"Programme 16 bits sur Windows10","Voir s'il est possible d’exécuter un programme 16 bits sur Windows 10 et si ce n'est pas possible, voir pour faire une machine virtuelle.",'2',0,'0000-00-00 00:00:00','2019-06-12 14:23:23','2019-06-19 11:28:39','non','non','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('37',"Etudes sur les messageries","Faire une étude sur les messageries les plus utilisées.",'2',0,'0000-00-00 00:00:00','2019-06-12 15:11:44','2019-06-14 11:29:12','non','non','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('38',"Appli : Logo des organisations","Homogénéiser la taille des logos pour les mettre sur le site INFOFIN.",'2',0,'0000-00-00 00:00:00','2019-06-14 09:04:30','0000-00-00 00:00:00','non','non','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('39',"FTP sous windows 10","",'2',0,'0000-00-00 00:00:00','2019-06-14 09:34:18','0000-00-00 00:00:00','non','non','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('40',"Bannière : dessiner pour Port Part","",'2',0,'0000-00-00 00:00:00','2019-06-14 09:35:12','0000-00-00 00:00:00','non','non','oui');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('41',"Intégrer Bannière","",'2',0,'0000-00-00 00:00:00','2019-06-14 09:35:25','0000-00-00 00:00:00','non','non','oui');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('42',"Texte Bibi Inventaire","",'2',0,'0000-00-00 00:00:00','2019-06-14 11:16:41','2019-06-19 11:19:04','non','non','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('43',"Présentation : Comment crée-t-on un compilateur ?","",'2',0,'2019-06-24 00:00:00','2019-06-14 11:23:56','0000-00-00 00:00:00','non','non','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('44',"Remplacer lien mail","Voir s'il est possible de remplacer les liens des descriptions courtes lors de l'envoi du mail.",'2',0,'0000-00-00 00:00:00','2019-06-14 11:31:30','0000-00-00 00:00:00','non','non','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('45',"Phrase accroche INFOFIN","Changer la phrase d'accroche de l'INFOFIN s'il y en a un seul.",'2',0,'0000-00-00 00:00:00','2019-06-14 13:59:07','2019-06-19 11:29:02','non','non','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('46',"teste archi","teste archivage",'2',0,'0000-00-00 00:00:00','2019-06-17 15:29:29','0000-00-00 00:00:00','non','oui','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('47',"Mailing : Changer l'expéditeur","",'2',0,'0000-00-00 00:00:00','2019-06-19 08:49:37','2019-06-19 11:29:12','non','non','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('48',"Mailing : Mail différent selon @ulb ou autre","",'2',0,'0000-00-00 00:00:00','2019-06-19 08:50:08','0000-00-00 00:00:00','non','non','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('49',"Mailing : Hyperlien sur la bannière","",'2',0,'0000-00-00 00:00:00','2019-06-19 08:50:30','2019-06-20 07:14:09','non','non','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('50',"Mailing : Remplacer phrase d'accroche et de fin","",'2',0,'0000-00-00 00:00:00','2019-06-19 08:50:53','2019-06-19 11:29:48','non','non','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('51',"Mailing : Ajouter espace entre les cadres","",'2',0,'0000-00-00 00:00:00','2019-06-19 08:51:19','2019-06-19 11:30:03','non','non','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('52',"Mailing : Mettre 1er au lieu 1","",'2',0,'0000-00-00 00:00:00','2019-06-19 08:51:38','2019-06-19 11:30:29','non','non','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('53',"Mailing : Faire un bouton Contacts et Détails","",'2',0,'0000-00-00 00:00:00','2019-06-19 08:52:05','2019-06-19 11:30:20','non','non','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('54',"Appli : Liste déroulante pour justificatifs","",'2',0,'0000-00-00 00:00:00','2019-06-19 08:52:41','0000-00-00 00:00:00','non','non','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('55',"Appli : Limiter taille description courte","",'2',0,'0000-00-00 00:00:00','2019-06-19 08:53:00','0000-00-00 00:00:00','non','non','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('56',"Statistiques sur le nombre de document par projet","",'2',0,'0000-00-00 00:00:00','2019-06-19 08:53:49','2019-06-19 11:30:41','non','non','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('57',"PV réunion INFOFIN du 18/06/19","",'2',0,'0000-00-00 00:00:00','2019-06-19 08:54:08','2019-06-19 11:30:49','non','non','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('58',"Liste des encodeurs 2018-2019","",'2',0,'0000-00-00 00:00:00','2019-06-19 08:54:58','0000-00-00 00:00:00','non','non','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('59',"Statistiques sur les clients mails","",'2',0,'0000-00-00 00:00:00','2019-06-19 08:55:14','2019-06-19 11:31:05','non','non','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('60',"Liste des bonnes pratiques d'encodage","",'2',0,'0000-00-00 00:00:00','2019-06-19 08:55:35','2019-06-20 08:14:06','oui','non','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('61',"Réactualisation automatique de phpmyadmin","",'2',0,'0000-00-00 00:00:00','2019-06-19 09:31:19','0000-00-00 00:00:00','non','non','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('62',"TODOlist mail avec pdf","Envoie des mail lors de la création des tâches avec un pdf décrivant la tâche.",'2',0,'0000-00-00 00:00:00','2019-06-19 10:04:00','0000-00-00 00:00:00','non','non','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('63',"Ajouter FileZilla connecter sur cvchercheurs","",'2',0,'0000-00-00 00:00:00','2019-06-19 10:17:15','0000-00-00 00:00:00','non','non','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('64',"Appli : Changer la numérotation des pages","",'2',0,'0000-00-00 00:00:00','2019-06-19 10:42:00','2019-06-19 11:31:29','non','non','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('65',"Appli : Mettre en valeur le tri par colonne","",'2',0,'0000-00-00 00:00:00','2019-06-19 10:42:19','0000-00-00 00:00:00','non','non','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('66',"Appli : Modifications sur les deadlines","Deadline1 avant deadline2 et s'il y a une deadline 2, le justificatif est obligatoire.",'2',0,'0000-00-00 00:00:00','2019-06-19 10:43:28','0000-00-00 00:00:00','non','non','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('67',"Appli : Modifier les lignes de contacts à la fin","",'2',0,'0000-00-00 00:00:00','2019-06-19 10:43:48','0000-00-00 00:00:00','non','non','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('68',"Appli : Créer une table pour savoir les pics de fréquentation","",'2',0,'0000-00-00 00:00:00','2019-06-19 10:44:20','0000-00-00 00:00:00','non','non','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('69',"Appli : Archiver les anciens projets ","",'2',0,'0000-00-00 00:00:00','2019-06-19 10:45:18','0000-00-00 00:00:00','non','non','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('70',"Compte rendu inventaire","",'2',0,'0000-00-00 00:00:00','2019-06-19 11:23:56','0000-00-00 00:00:00','non','non','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('71',"moteur de recherche non fonctionnel","",'2',0,'0000-00-00 00:00:00','2019-06-19 11:25:21','0000-00-00 00:00:00','non','non','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('72',"Rajouter membres extérieurs CVChercheurs","bla",'2',0,'0000-00-00 00:00:00','2019-06-19 11:26:10','0000-00-00 00:00:00','non','non','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('73',"Mailing : Faire la liste des choses à vérifier par Daniele Carati","",'2',0,'0000-00-00 00:00:00','2019-06-19 11:26:10','0000-00-00 00:00:00','non','non','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('74',"spinoff","",'2',0,'0000-00-00 00:00:00','2019-06-19 11:27:48','0000-00-00 00:00:00','non','non','oui');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('75',"brevet, tech prot","",'2',0,'0000-00-00 00:00:00','2019-06-19 11:30:41','0000-00-00 00:00:00','non','non','oui');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('76',"programme vérifiant la cohérence","",'2',0,'0000-00-00 00:00:00','2019-06-19 11:31:34','0000-00-00 00:00:00','non','non','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('77',"Retours sur le PV du 18/06/2019","",'2',0,'0000-00-00 00:00:00','2019-06-19 11:32:48','0000-00-00 00:00:00','non','non','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('78',"Répercuter les tâches 64 - 65 - 66 (- 23 ?) sur INFOFIN","",'2',0,'0000-00-00 00:00:00','2019-06-19 11:35:11','0000-00-00 00:00:00','non','non','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('79',"Cofund : Tâches finies : 1, 2, 3, 4, 6, 7, 8","",'2',0,'0000-00-00 00:00:00','2019-06-19 11:35:25','2019-06-19 11:42:30','non','non','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('80',"Envoi Message Délégué","",'2',0,'0000-00-00 00:00:00','2019-06-19 11:40:01','0000-00-00 00:00:00','non','non','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('81',"FileZilla","",'2',0,'0000-00-00 00:00:00','2019-06-19 11:43:31','0000-00-00 00:00:00','non','non','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('82',"Mettre en production la demande Bibi Euraxess","",'2',0,'0000-00-00 00:00:00','2019-06-19 11:55:32','0000-00-00 00:00:00','non','non','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('83',"Mettre en production la demande Bibi Euraxess","",'2',0,'0000-00-00 00:00:00','2019-06-19 11:56:28','0000-00-00 00:00:00','non','non','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('84',"Correction Erreur découvert par manon","",'2',0,'0000-00-00 00:00:00','2019-06-19 11:58:05','0000-00-00 00:00:00','non','non','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('85',"Fichier excel","",'2',0,'0000-00-00 00:00:00','2019-06-19 14:56:41','2019-06-20 07:52:15','non','non','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('86',"Bouton -> icone dans l'application TODO !!!","Avec des bouton c'est plus beau !!!",'2',0,'0000-00-00 00:00:00','2019-06-20 07:55:17','0000-00-00 00:00:00','non','non','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('87',"Suggestion of 5 experts","",'2',1,'0000-00-00 00:00:00','2019-06-20 08:08:30','2019-06-20 08:08:33','non','non','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('88',"Appli : Refuser les justificatifs de moins de 3 caractères","",'2',0,'0000-00-00 00:00:00','2019-06-20 08:19:40','0000-00-00 00:00:00','non','non','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('89',"INFOFIN : vérifier l'application niveau matricules pour que cela se fasse sur 8 positions","",'2',0,'0000-00-00 00:00:00','2019-06-20 08:23:57','0000-00-00 00:00:00','non','non','non');
INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`, `archive`,`wait`) VALUES ('90',"Prévoir questions d'embauche pour futur stagiaire","",'2',0,'0000-00-00 00:00:00','2019-06-20 09:47:34','0000-00-00 00:00:00','non','non','non');
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
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd2', '14'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd2', '15'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd2', '16'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd2', '17'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd2', '18'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd2', '19'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd2', '20'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd2', '22'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd2', '23'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd2', '24'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd2', '25'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd2', '26'); 
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
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd2', '38'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd0', '39'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd5', '40'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd5', '41'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd1', '42'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd0', '43'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd2', '44'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd2', '45'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd2', '47'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd2', '48'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd2', '49'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd2', '50'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd2', '51'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd2', '52'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd2', '53'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd2', '54'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd2', '55'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd2', '56'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd2', '57'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd2', '58'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd2', '59'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd2', '60'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd0', '61'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd0', '62'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd4', '63'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd2', '64'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd2', '65'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd2', '66'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd2', '68'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd2', '69'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd1', '70'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd1', '71'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd4', '72'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd2', '73'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd1', '74'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd1', '75'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd1', '76'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd2', '77'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd2', '78'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd5', '79'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd4', '80'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd0', '81'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd4', '82'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd1', '83'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd0', '84'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd1', '85'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd0', '86'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd5', '87'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd2', '88'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd2', '89'); 
INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('bd0', '90'); 
DROP TABLE IF EXISTS `sutuser`;
CREATE TABLE `sutuser` (
  `idUser` int(6) NOT NULL,
  `idTache` int(6) NOT NULL,
  `checked` tinyint(1) NOT NULL DEFAULT '0',
  `adminC` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('1', '0', 1, 1); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('1', '1', 0, 0); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('1', '2', 1, 1); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('1', '3', 1, 1); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('1', '4', 1, 1); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('1', '5', 1, 1); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('1', '6', 1, 1); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('1', '7', 1, 1); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('1', '8', 1, 1); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('1', '9', 1, 1); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('1', '10', 1, 1); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('1', '27', 1, 1); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('1', '28', 0, 0); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('1', '35', 1, 1); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('1', '42', 1, 1); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('1', '43', 0, 0); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('1', '62', 1, 0); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('1', '63', 0, 0); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('1', '70', 0, 0); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('1', '71', 0, 0); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('1', '74', 0, 0); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('1', '75', 0, 0); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('1', '76', 0, 0); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('1', '82', 0, 0); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('1', '83', 0, 0); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('1', '84', 0, 0); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('1', '85', 1, 1); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('1', '86', 1, 0); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('1', '90', 0, 0); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('3', '11', 1, 1); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('3', '12', 0, 0); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('3', '13', 0, 0); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('3', '14', 1, 1); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('3', '15', 0, 0); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('3', '16', 0, 0); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('3', '17', 1, 1); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('3', '18', 1, 1); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('3', '19', 0, 0); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('3', '20', 1, 1); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('3', '22', 1, 1); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('3', '23', 1, 1); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('3', '24', 1, 1); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('3', '25', 0, 0); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('3', '26', 0, 0); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('3', '29', 0, 0); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('3', '30', 1, 1); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('3', '31', 1, 1); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('3', '36', 1, 1); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('3', '37', 1, 1); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('3', '38', 0, 0); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('3', '44', 0, 0); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('3', '45', 1, 1); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('3', '47', 1, 1); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('3', '48', 0, 0); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('3', '49', 1, 1); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('3', '50', 1, 1); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('3', '51', 1, 1); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('3', '52', 1, 1); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('3', '53', 1, 1); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('3', '54', 0, 0); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('3', '55', 0, 0); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('3', '56', 1, 1); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('3', '57', 1, 1); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('3', '58', 0, 0); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('3', '59', 1, 1); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('3', '60', 0, 0); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('3', '61', 0, 0); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('3', '64', 1, 1); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('3', '65', 1, 0); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('3', '66', 1, 0); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('3', '68', 0, 0); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('3', '69', 0, 0); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('3', '73', 0, 0); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('3', '77', 0, 0); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('3', '78', 0, 0); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('3', '88', 0, 0); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('3', '89', 0, 0); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('3', '90', 0, 0); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('5', '32', 0, 0); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('5', '33', 1, 1); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('5', '34', 0, 0); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('5', '39', 0, 0); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('5', '40', 0, 0); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('5', '41', 0, 0); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('5', '72', 0, 0); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('5', '79', 1, 1); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('5', '80', 0, 0); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('5', '81', 0, 0); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('5', '82', 0, 0); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('5', '83', 0, 0); 
INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('5', '87', 0, 1); 
DROP TABLE IF EXISTS `suuser`;
CREATE TABLE `suuser` (
  `idUser` int(6) NOT NULL,
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
INSERT IGNORE INTO `suuser` (`idUser`, `nom`, `prenom`, `admin`,`login`,`password`, `dateDebut`, `dateFin`, `mail`, `color`) VALUES('2', "Vanhoren", "Maxime", '2',"mv","mv", '2019-05-28 10:57:47', '0000-00-00 00:00:00', "prosprs@gmail.com", 'cc0099'); 
INSERT IGNORE INTO `suuser` (`idUser`, `nom`, `prenom`, `admin`,`login`,`password`, `dateDebut`, `dateFin`, `mail`, `color`) VALUES('3', "Ferchaud", "Manon", '0',"mf","mf", '2019-05-27 00:00:00', '0000-00-00 00:00:00', "manon.ferchaud@insa-rouen.fr", '0000ff'); 
INSERT IGNORE INTO `suuser` (`idUser`, `nom`, `prenom`, `admin`,`login`,`password`, `dateDebut`, `dateFin`, `mail`, `color`) VALUES('5', "Vanobbergen", "Pierre", '0',"pv","pv", '2019-06-14 00:00:00', '0000-00-00 00:00:00', "pierrevob@hotmail.com", '00ff00'); 
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
