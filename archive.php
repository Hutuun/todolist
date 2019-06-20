<?php
/**
 * Created by PhpStorm.
 * User: Sullivan Honnet
 * Date: 17/06/2019
 * Time: 16:17
 */


include ("database.php");


$sql = "SELECT idTache,dateSuppr FROM sutache";

$res = query($sql);

while ($row = mysqli_fetch_assoc($res)){

    $str = $row["dateSuppr"];
    $id = $row["idTache"];

    if($str!=="0000-00-00 00:00:00"){

       if(strtotime($str)<strtotime(date("d-M-Y H:i:s")." -7 day")){
           $sql = "UPDATE `sutache` SET `archive`='oui' WHERE `idTache`=$id";
           query($sql);
       }
    }
}

header("Refresh:0; URL=hub2.php");