<?php
/**
 * Created by PhpStorm.
 * User: Sullivan Honnet
 * Date: 28/05/2019
 * Time: 09:41
 *
 * Valide ou dévalide un tâche et met à jour la base de données
 */

include ("database.php");

session_start();

$id = $_SESSION["id"];

$sql = "SELECT * FROM sutache,sutuser where sutache.idtache=sutuser.idTache and  sutache.idTache='".$_POST["idtache"]."'";

$r = query($sql);

$row = mysqli_fetch_assoc($r);

$sql = "SELECT admin FROM suuser WHERE idUser = $id";

$re = query($sql);

$fields = mysqli_fetch_assoc($re);


//si la tâche est déjà validée par l'utilisateur et que l'utilisateur est le demandeur
if($row["adminC"]==1 && ($row["idDemandeur"] === $id || $fields["admin"]==2) && isset($_POST["admin"]) && $_POST["admin"] === "ok") {


    $sql = "UPDATE sutuser SET adminC = 0 WHERE idTache = '" . $_POST["idtache"] . "'";

    query($sql);

    $sql = "UPDATE sutuser SET checked = 0 WHERE  idTache = '" . $_POST["idtache"] . "'";

    query($sql);

    $sql = "UPDATE sutache SET dateSuppr = '0000-00-00', wait = 'non' where idTache ='" . $_POST["idtache"] . "'";

    query($sql);
}
else{
	
	//si la tâche n'est pas déjà validée par l'utilisateur et que l'utilisateur est le demandeur
    if($row["adminC"]==0 && ($row["idDemandeur"] === $id || $fields["admin"]==2) && isset($_POST["admin"]) && $_POST["admin"] === "ok"){


        $sql = "UPDATE sutuser SET adminC = 1 WHERE idTache = '" . $_POST["idtache"] . "'";

        query($sql);

        $sql = "UPDATE sutache SET dateSuppr = CURRENT_TIMESTAMP, wait = 'Validé' where idTache ='" . $_POST["idtache"] . "'";

        query($sql);
    }else {

        $sql = "SELECT * FROM sutache,sutuser where sutache.idtache=sutuser.idTache and idUser=$id and sutache.idTache='".$_POST["idtache"]."'";

        $r = query($sql);

        $row = mysqli_fetch_assoc($r);
		//Si l'utilisateur a déjà validé la tâche on dévalide
        if ($row["checked"]==1 && !isset($_POST["admin"])) {

            $sql = "UPDATE sutuser SET checked = 0 WHERE idUser='" . $id . "' and idTache = '" . $_POST["idtache"] . "'";

            query($sql);

        } else {
			//On valide la tâche

            $sql = "UPDATE sutuser SET checked = 1 WHERE idUser='" . $id . "' and idTache = '" . $_POST["idtache"] . "'";

            query($sql);
        }
    }
}

header("Refresh:0; URL=hub2.php");