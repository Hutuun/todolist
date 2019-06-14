<?php
/**
 * Created by PhpStorm.
 * User: Sullivan Honnet
 * Date: 29/05/2019
 * Time: 16:22
 */

include ("database.php");

$sql = "SELECT * FROM sutache where idTache='".$_POST["idtache"]."'";

$r = query($sql);

$row = mysqli_fetch_assoc($r);

if($row["suppr"]==="non") {
    $sql = "UPDATE sutache SET suppr='oui', dateSuppr=CURRENT_TIMESTAMP WHERE idTache='" . $_POST["idtache"] . "'";

    query($sql);
}else{
    $sql = "UPDATE sutache SET suppr='non', dateSuppr='0000-00-00 00:00:00' WHERE idTache='" . $_POST["idtache"] . "'";

    query($sql);
}

header("Refresh:0; URL=hub.php");