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

$id = $_POST["idtache"];

$nom = $_POST["nom"];
$prio = $_POST["prio"];
$dead = "";
if ($_POST["deadline"]!=="") {
    $dead = $_POST["deadline"];
}
$desc = $_POST["desc"];

$sql = "SELECT idBD FROM subd";

$res = query($sql);

while ($row = mysqli_fetch_assoc($res)){
    $id = $row["idBD"];


    if(isset($_POST["$id"])){
        $sql = "INSERT INTO sutbd(idBD,idTache) VALUES (\"$id\", \"$cpt\")";
        query($sql);
    }
}