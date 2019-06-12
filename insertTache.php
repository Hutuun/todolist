<?php
/**
 * Created by PhpStorm.
 * User: Sullivan honnet
 * Date: 27/05/2019
 * Time: 14:46
 */

include ("database.php");

session_start();


$sql = "SELECT idUser From suuser";
$res = query($sql);


while ($row = mysqli_fetch_assoc($res)) {
    $id = $row["idUser"];
    if(isset($_POST["d$id"])) {
        $demandeur = $_POST["d$id"];
    }
}


$nom = $_POST["nom"];
$prio = $_POST["prio"];
$dead = "";
if ($_POST["deadline"]!=="") {
    $dead = $_POST["deadline"];
}
$desc = $_POST["desc"];

$sql = "SELECT idTache From sutache order by idTache";

$res = query($sql);
$cpt = 0;
while ($row = mysqli_fetch_assoc($res)){

    $cpt += 1;

}




$sql = "INSERT IGNORE INTO sutache(idTache, nomTache, descriptionTache, idDemandeur, priorite ,deadline, dateCreation, dateSuppr) VALUES (\"$cpt\", \"$nom\",\"$desc\",\"$demandeur\",$prio,\"$dead\",CURRENT_TIME,\"''\");";

query($sql);


/*
 * Y A UN BUG SALE
 */

$sql = "SELECT idBD FROM subd";

$res = query($sql);

while ($row = mysqli_fetch_assoc($res)){
    $id = $row["idBD"];


    if(isset($_POST["$id"])){
        $sql = "INSERT INTO sutbd(idBD,idTache) VALUES (\"$id\", \"$cpt\")";
        query($sql);
    }
}

$sql = "SELECT idUser From suuser";
$res = query($sql);

$mailto="";

while ($row = mysqli_fetch_assoc($res)) {
    $id = $row["idUser"];
    if(isset($_POST["$id"])) {

        $sql = "INSERT INTO sutuser(idUser, idTache, checked) VALUES (\"$id\",\"$cpt\",0);";
        query($sql);


        $sql ="SELECT nom,prenom,mail,dateFin FROM suuser where idUser=$id";
        $res=query($sql);

        while($row=mysqli_fetch_assoc($res)){
            if($row["mail"]!=NULL && (strtotime($row["dateFin"]) > time() || strtotime($row["dateFin"])<0 || strtotime($row["dateFin"])===false)) {
                $mailto .= $row["mail"] . ",";
            }
        }
    }
}


$sql = "SELECT nom, prenom, mail FROM suuser WHERE suuser.idUser = '".$demandeur."' ";


$res = query($sql);

$row = mysqli_fetch_assoc($res);
$nom = $row["nom"]." ".$row["prenom"];
$mailFrom = $row["mail"];


$header = "From: Automatique <$mailFrom> \n";
$header .= "MIME-Version: 1.0 \n";
$header .= "Content-Transfer-Encoding: 8bit \r\n";
mail($mailto,"Nouvelle tâche","Une nouvelle tâche a été ajoutée.",$header);

if(isset($_POST["tache"])){
    header("Refresh:0; URL=ajouterTache.php");
}else{

    header("Refresh:0; URL=hub.php");
}