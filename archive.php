<?php
/**
 * Created by PhpStorm.
 * User: Sullivan Honnet
 * Date: 17/06/2019
 * Time: 16:17
 *
 * Vérifie si la tâche a été validée depuis au moins 7 jours si oui l'archive
 */


include ("database.php");


$sql = "SELECT idTache,dateSuppr,suppr FROM sutache";

$res = query($sql);

while ($row = mysqli_fetch_assoc($res)){

    $str = $row["dateSuppr"];
    $id = $row["idTache"];

    if($str!=="0000-00-00 00:00:00" && $row["suppr"]!=="oui"){

       if(strtotime($str)<strtotime(date("d-M-Y H:i:s")." -5 day")){
           $sql = "UPDATE `sutache` SET `archive`='oui' WHERE `idTache`=$id";
           query($sql);
       }
    }
}

header("Refresh:0; URL=hub2.php");