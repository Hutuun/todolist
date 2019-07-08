<?php
/**
 * Created by PhpStorm.
 * User: Lauriane
 * Date: 8/07/2019
 * Time: 11:30
 * *
 * Fait les modifications de l'utilisateur dans la base de données
 */

include ("database.php");

$sql = "SELECT * FROM suuser";

$res = query($sql);

while ($row = mysqli_fetch_assoc($res)){
    $id = $row["idUser"];
    if(!isset($_POST["$id"])){
        if ($row["dateFin"]==="0000-00-00 00:00:00"){

            $sql = "UPDATE suuser SET dateFin=CURRENT_TIME() WHERE idUser='$id'";
            query($sql, true);
       }
    }else{
        $sql = "UPDATE suuser SET dateFin = default WHERE idUser='$id'";
        query($sql, true);
    }

}

header("Refresh:0;URL=hub2.php");