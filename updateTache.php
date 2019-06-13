<?php
/**
 * Created by PhpStorm.
 * User: Sullivan Honnet
 * Date: 12/06/2019
 * Time: 16:10
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
$idTache = $_POST["idtache"];
$nom = $_POST["nom"];
$prio = $_POST["prio"];
$sql = "SELECT * FROM sutache where idTache=$idTache";
$res=query($sql);
$row=mysqli_fetch_assoc($res);
$dead = $row["deadline"];
$dd= $row["dateCreation"];
$df = $row["dateSuppr"];
if ($_POST["deadline"]!=="") {
    $dead = $_POST["deadline"];
}
$desc = $_POST["desc"];
if ($_POST["dd"]!=="") {
    $dd= $_POST["dd"];
}
if ($_POST["df"]!=="") {
    $df = $_POST["df"];
}
$sql = "UPDATE `sutache` SET `nomTache`=\"$nom\",`descriptionTache`=\"$desc\",`idDemandeur`=$demandeur,`priorite`=$prio,`deadline`=\"$dead\",`dateCreation`=\"$dd\",`dateSuppr`=\"$df\"
WHERE `idTache`='$idTache'";


query($sql);
$sql = "SELECT idBD FROM subd";
$res = query($sql);
while ($row = mysqli_fetch_assoc($res)){
    $id = $row["idBD"];
    if(isset($_POST["$id"])){
        $sql = "INSERT INTO sutbd(idBD,idTache) VALUES (\"$id\", \"$idTache\")";
        query($sql);
    }
    else{
    $sql = "DELETE FROM sutbd WHERE `idBD`='$id' and `idTache`='$idTache'";
    query($sql);
}
}
$sql = "SELECT * From suuser";
$res = query($sql);
$mailto="";
while ($row = mysqli_fetch_assoc($res)) {
    $id = $row["idUser"];
    if(isset($_POST["$id"])) {
        $sql = "INSERT INTO sutuser(idUser, idTache, checked) VALUES (\"$id\",\"$idTache\",0);";
        $r=query($sql);
        if($r!==false) {
            $mailto .= $row["mail"] . ",";
        }
    }
    else{
        $sql = "DELETE FROM sutuser WHERE `idUser`='$id' and `idTache`='$idTache'";
        $r=query($sql);
        if($r!==false) {
            $mailto .= $row["mail"] . ",";
        }
    }
}

$sql = "SELECT nom, prenom, mail FROM suuser WHERE suuser.idUser = '".$demandeur."' ";


$res = query($sql);

$row = mysqli_fetch_assoc($res);


$mailFrom = $row["mail"];


$header = "From: Automatique <$mailFrom> \n";
$header .= "MIME-Version: 1.0 \n";
$header .= "Content-Transfer-Encoding: 8bit \r\n";
mail($mailto,"Une de vos tâches a été modifiée","La tâche $idTache a été modifiée.",$header);

header("Refresh:0, URL=hub.php");