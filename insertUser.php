<?php
/**
 * Created by PhpStorm.
 * User: Sullivan Honnet
 * Date: 28/05/2019
 * Time: 10:23
 */

include ("database.php");

$sql = "SELECT idUser FROM suuser order by idUser";

$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$dateDebut = date("d-m-y",time());
$dateDebut = $_POST["dated"];
$dateFin = "0000-00-00 00:00:00";
$dateFin = $_POST["datef"];
$mail = $_POST["mail"];
$login = strtolower(substr($_POST["prenom"],0,1).substr($_POST["nom"],0,1));
$color = substr($_POST["color"],1);

$res = query($sql);

$cpt = 1;

$admin = "0";

if(isset($_POST["admin"]))
    $admin = "1";

//création du nouvel id
while ($row = mysqli_fetch_assoc($res)){
    $cpt += 1;
}

$sql = "INSERT INTO suuser(idUser,nom,prenom,admin,login,password,dateDebut,dateFin,mail,color) VALUES (\"$cpt\",\"$nom\",\"$prenom\",\"$admin\",\"$login\",\"\",\"$dateDebut\",\"$dateFin\",\"$mail\",\"$color\")";

query($sql);

header("Refresh:0; URL=hub.php");