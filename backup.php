<?php
/**
 * Created by PhpStorm.
 * User: Sullivan Honnet
 * Date: 4/06/2019
 * Time: 15:59
 */

include ("database.php");



$da = date("d-m-y",time());

$file = fopen("backupTODO$da.sql","w+");

fwrite($file,"\n\n");

$sql = "SELECT * FROM sutache";

$res = query($sql);


fwrite($file,"DROP TABLE IF EXISTS `sutache`;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;\n");



while($row = mysqli_fetch_assoc($res)){
    $id = $row["idTache"];
    $nom = $row["nomTache"];
    $descriptionTache = $row["descriptionTache"];
    $idDemandeur = $row["idDemandeur"];
    $priorite = $row["priorite"];
    $deadline = $row["deadline"];
    $dateCreation = $row["dateCreation"];
    $dateSuppr = $row["dateSuppr"];
    $suppr = $row["suppr"];
    fwrite($file,"INSERT IGNORE INTO `sutache` (`idTache`, `nomTache`, `descriptionTache`, `idDemandeur`, `priorite`, `deadline`, `dateCreation`, `dateSuppr`, `suppr`) VALUES ('$id',\"$nom\",\"$descriptionTache\",'$idDemandeur',$priorite,'$deadline','$dateCreation','$dateSuppr','$suppr');\n");

}

fwrite($file,"DROP TABLE IF EXISTS `subd`;
CREATE TABLE `subd` (
  `idBD` varchar(6) NOT NULL,
  `nomBD` varchar(100) NOT NULL,
  `diminutif` varchar(6) NOT NULL,
  `color` varchar(6) NOT NULL DEFAULT '000000'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;\n");

$sql = "SeLeCT * FROM subd";

$res = query($sql);

while($row = mysqli_fetch_assoc($res)) {

    $id = $row["idBD"];
    $nom = $row["nomBD"];
    $diminutif = $row["diminutif"];
    $color = $row["color"];
    fwrite($file,"INSERT IGNORE INTO `subd` (`idBD`, `nomBD`, `diminutif`, `color`) VALUES('$id', \"$nom\", \"$diminutif\", '$color'); \n");

}

fwrite($file,"DROP TABLE IF EXISTS `sutbd`;
CREATE TABLE `sutbd` (
  `idBD` varchar(6) NOT NULL,
  `idTache` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;\n");

$sql = "SELECT * FROM sutbd";

$res = query($sql);

while($row = mysqli_fetch_assoc($res)) {
    $id = $row["idBD"];
    $id2 = $row["idTache"];
    fwrite($file,"INSERT IGNORE INTO `sutbd` (`idBD`, `idTache`) VALUES('$id', '$id2'); \n");
}

fwrite($file,"DROP TABLE IF EXISTS `sutuser`;
CREATE TABLE `sutuser` (
  `idUser` varchar(6) NOT NULL,
  `idTache` varchar(6) NOT NULL,
  `checked` tinyint(1) NOT NULL DEFAULT '0',
  `adminC` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;\n");

$sql = "SELECT * FROM sutuser";

$res = query($sql);

while($row = mysqli_fetch_assoc($res)) {
    $id = $row["idUser"];
    $id2 = $row["idTache"];
    $checked = $row["checked"];
    $adminC = $row["adminC"];
    fwrite($file,"INSERT IGNORE INTO `sutuser` (`idUser`, `idTache`, `checked`, `adminC`) VALUES('$id', '$id2', $checked, $adminC); \n");
}

fwrite($file,"DROP TABLE IF EXISTS `suuser`;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT=\"table des utilisateurs de la TODO list\";\n");

$sql = "SELECT * FROM suuser";

$res = query($sql);

while($row = mysqli_fetch_assoc($res)) {
    $id = $row["idUser"];
    $nom = $row["nom"];
    $prenom = $row["prenom"];
    $admin = $row["admin"];
    $login = $row["login"];
    $password = $row["password"];
    $dateDebut = $row["dateDebut"];
    $dateFin = $row["dateFin"];
    $mail = $row["mail"];
    $color = $row["color"];
    fwrite($file,"INSERT IGNORE INTO `suuser` (`idUser`, `nom`, `prenom`, `admin`,`login`,`password`, `dateDebut`, `dateFin`, `mail`, `color`) VALUES('$id', \"$nom\", \"$prenom\", '$admin',\"$login\",\"$password\", '$dateDebut', '$dateFin', \"$mail\", '$color'); \n");
}

fwrite($file,"ALTER TABLE `subd`
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
");

fclose($file);

header("Refresh:0 ;URL=hub.php");