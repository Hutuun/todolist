<?php
/**
 * Created by PhpStorm.
 * User: Sullivan Honnet
 * Date: 12/06/2019
 * Time: 16:10
 *
 * Met à jours la tâche dans la base de données et envoie un mail au personne concerné par la tâche
 */
 
 

session_start();

if(empty($_SESSION["login"])){
    header("Refresh:0;URL=login.php");
}else {
    include("database.php");
    include("fcPDF.php");
    require("vendor/autoload.php");

    $sql = "SELECT idUser From suuser";

    $res = query($sql);

    while ($row = mysqli_fetch_assoc($res)) {
        $id = $row["idUser"];
        if (isset($_POST["d$id"])) {
            $demandeur = $_POST["d$id"];
        }
    }
    $idTache = $_POST["idtache"];

    $nom = str_ireplace("\"", "'", $_POST["nom"]);
    if ($nom === "") {
        $nom = $_POST["nom"];
    }

    $prio = $_POST["prio"];
    $sql = "SELECT * FROM sutache where idTache='$idTache'";


    $mod = "";

    $res = query($sql);
    $row = mysqli_fetch_assoc($res);

    if ($nom !== $row["nomTache"]) {
        $mod .= "Le nom de la tâche a été modifié<br/>";
    }

    if ($prio !== $row["priorite"]) {
        $mod .= "La priorité de la tâche a été modifiée<br/>";
    }

    $dead = $row["deadline"];
    $dd = $row["dateCreation"];
    $df = $row["dateSuppr"];
    if ($_POST["deadline"] !== "") {
        $dead = $_POST["deadline"];
    }
    if ($dead !== $row["deadline"]) {
        $mod .= "La deadline de la tâche a été modifiée<br/>";
    }

    $desc = str_ireplace("\"", "'", $_POST["desc"]);
    if ($desc === "") {
        $desc = $_POST["desc"];
    }
    if ($desc !== $row["descriptionTache"]) {
        $mod .= "La description de la tâche a été modifiée<br/>";
    }

    if ($_POST["dd"] !== "") {
        $dd = $_POST["dd"];
    }
    if ($dd !== $row["dateCreation"]) {
        $mod .= "La date de création de la tâche a été modifiée<br/>";
    }

    if ($_POST["df"] !== "") {
        $df = $_POST["df"];
    }
    if (isset($row["dateFin"])) {
        if ($df !== $row["dateFin"]) {
            $mod .= "La date de fin de la tâche a été modifiée<br/>";
        }
    }
    $wait = "non";
    if (isset($_POST["wait"])) {
        $wait = "oui";
    }
    if (isset($_POST["cours"])) {
        $wait = $_POST["cours"];
    }
    if (isset($_POST["test"])) {
        $wait = $_POST["test"];
    }
    if (isset($_POST["prod"])) {
        $wait = $_POST["prod"];
    }
    if (isset($_POST["abandon"])) {
        $wait = $_POST["abandon"];
    }
    if ($_POST["autre"] !== "") {
        $wait = $_POST["autre"];
    }
    if ($wait != $row["wait"]) {
        if ($wait === "non") {
            $mod .= "La tâche n'est plus en attente. <br/>";
        } else {
            $mod .= "La tâche a été mis en attente. <br/>";
        }
    }
    $sql = "UPDATE `sutache` SET `nomTache`=\"$nom\",`descriptionTache`=\"$desc\",`idDemandeur`='$demandeur',`priorite`='$prio',`deadline`=\"$dead\",`dateCreation`=\"$dd\",`dateSuppr`=\"$df\", `wait`='$wait'
WHERE `idTache`='$idTache'";

    query($sql);
    $sql = "SELECT idBD, nomBD FROM subd";
    $res = query($sql);

//message de modification de la bd
    $modBD = "";
    while ($row = mysqli_fetch_assoc($res)) {
        $id = $row["idBD"];
        if (isset($_POST["$id"])) {
            $sql = "INSERT INTO sutbd(idBD,idTache) VALUES (\"$id\", \"$idTache\")";
            query($sql, false);

            $modBD .= "La base de données : " . $row['nomBD'] . " a été ajouté<br/>";
        } else {
            $sql = "SELECT * FROM sutbd WHERE idBD = '$id' and idTache = '$idTache'";
            $r = query($sql, false);
            if (mysqli_num_rows($r) > 0) {
                $sql = "DELETE FROM sutbd WHERE `idBD`='$id' and `idTache`='$idTache'";
                query($sql, false);
                $modBD .= "La base de données : " . $row['nomBD'] . " a été retiré.<br/>";
            }
        }
    }
    $sql = "SELECT prenom,nom,mail,idUser From suuser";
    $res = query($sql);


    $mailto = "";


    $mailto2 = "";
    $messageADD = "";

    $mailto3 = "";
    $messageSUPPR .= "";
    while ($row = mysqli_fetch_assoc($res)) {
        $id = $row["idUser"];
        if (isset($_POST["$id"])) {
            $sql = "INSERT INTO sutuser(idUser, idTache, checked) VALUES (\"$id\",\"$idTache\",0);";
            $r = query($sql, false);
            if (!$r) {
                $mailto .= $row["mail"] . ",";

            } else {
                $mailto2 .= $row["mail"] . ",";
                $messageADD .= $row["prenom"] . " " . $row["nom"] . " a été ajouté à la tâche. <br/>";
            }

        } else {
            $sql = "select * from sutuser WHERE `idUser`='$id' and `idTache`='$idTache'";
            $r = query($sql);
            if (mysqli_num_rows($r) > 0) {
                $sql = "DELETE FROM sutuser WHERE `idUser`='$id' and `idTache`='$idTache'";
                $r = query($sql, false);
                $mailto3 .= $row["mail"] . ",";
                $messageSUPPR .= $row["prenom"] . " " . $row["nom"] . " a été retiré de la tâche.<br/>";
            }
        }
    }
    $pdf = new Mpdf\Mpdf();

    $pdf->AddPage();

    $affi = "<!DOCTYPE html>
<html lang='fr'>
<head title='PDF'>
    <meta charset=\"UTF-8\">
    <script src=\"js/function.js\" type=\"text/javascript\"></script>
    <style>
        table.ta,td{
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>
<body style=\"font - family: Trebuchet,Trebuchet MS,Arial,Helvetica,Sans - serif;\">";

    $sql = "SELECT * FROM sutache,suuser,sutuser WHERE sutache.idTache = '$idTache' and idDemandeur = suuser.idUser and sutuser.idTache = sutache.idTache";
    $res = query($sql);
    $row = mysqli_fetch_assoc($res);

    $affi .= "<h2>La T&acirc;che</h2>";

    $color = "#" . $row["color"];

    $affi .= "<p>Num&eacute;ro : " . $row["idTache"] . "</p>";
    $affi .= "<p>T&acirc;che : " . $row["nomTache"] . "</p>";
    $affi .= "<p>Description : " . $row["descriptionTache"] . "</p>";

    $date = $row["dateCreation"];
    $ymd = substr($date, 0, 10);
    $date = date("d/m/y", strtotime($ymd));
    $affi .= "<p>Date de d&eacute;but : " . $date . "</p>";
    if (isset($row["deadline"]) && substr($row["deadline"], 0, 10) !== "0000-00-00") {
        $date = $row["deadline"];
        $ymd = substr($date, 0, 10);
        $date = date("d/m/y", strtotime($ymd));
        $affi .= "<p>Deadline : " . $date . "</p>";
    }
    if (isset($row["dateSuppr"]) && substr($row["dateSuppr"], 0, 10) !== "0000-00-00") {
        $date = $row["dateSuppr"];
        $ymd = substr($date, 0, 10);
        $date = date("d/m/y", strtotime($ymd));
        $affi .= "<p> Date de fin : " . $date . "</p>";
    }
    $affi .= "<p>Priorit&eacute; : ";

    $prio = "La t&acirc;che n'est pas prioritaire</p>";

    if ($row["priorite"] == 1) {
        $prio = "La t&acirc;che est prioritaire</p>";
    }
    if ($row["priorite"] == 2) {
        $prio = "La t&acirc;che est tr&egrave;s prioritaire</p>";
    }
    $affi .= $prio;

    $affi .= "<p>Demande effectu&eacute;e par : <q style='color: $color'>" . $row["prenom"] . " " . $row["nom"] . "</q> ";
    if ($row["adminC"] == true) {
        $affi .= "qui a valid&eacute; la t&acirc;che</p>";
    } else {
        $affi .= "qui n'a pas valid&eacute; la t&acirc;che</p>";
    }


    $sql = "SELECT * FROM sutache,sutuser,suuser WHERE sutache.idTache = '$idTache'
        AND sutache.idTache = sutuser.idTache
        AND sutuser.idUser = suuser.idUser";

    $result = query($sql);


    $affi .= "<h2>Les personnes et les Bases de donn&eacute;es affect&eacute;es &agrave; cette t&acirc;che</h2>";
    $affi .= "<p>R&eacute;alis&eacute; par : <ul>";
    while ($row = mysqli_fetch_assoc($result)) {

        $color = "#" . $row["color"];

        $affi .= "<li style='color: $color'>" . $row["prenom"] . " " . $row["nom"] . "</li> ";
        if ($row["checked"] == true) {
            $affi .= "qui a valid&eacute; sa t&acirc;che</p>";
        } else {
            $aff .= "qui n'a pas valid&eacute; sa t&acirc;che</p>";
            if (strtotime($row["dateFin"]) < time() && strtotime($row["dateFin"]) > 0) {
                $affi .= "et qui ne travaille plus ici</p>";
            } else {
                $affi .= "</p>";
            }
        }
    }
    $affi .= "</ul>";

    $sql = "SELECT * FROM sutache,sutbd,subd WHERE sutache.idTache = '$idTache'
        AND sutache.idTache = sutbd.idTache
        AND sutbd.idBD = subd.idBD";

    $result = query($sql);

    if ($result->num_rows > 0) {

        $affi .= "<p>R&eacute;alis&eacute; sur : <ul>";

        while ($row = mysqli_fetch_assoc($result)) {

            $color = "#" . $row["color"];

            $affi .= "<li style='color: $color'>" . $row["nomBD"] . "</li></p>";

        }
    }

    $affi .= "</body></html>";


    $pdf->WriteHTML($affi);


    $path = "tache/";


    $file_name = "tache$idTache.pdf";

    $pdf->Output($path . "$file_name", \Mpdf\Output\Destination::FILE);


    $typepiecejointe = filetype($path . $file_name);
    $data = chunk_split(base64_encode(file_get_contents($path . $file_name)));

    $sql = "SELECT mail FROM suuser WHERE suuser.idUser = '" . $demandeur . "' ";


    $res = query($sql);

    $row = mysqli_fetch_assoc($res);


    $mailto .= $row["mail"];

    $boundary = md5(uniqid(time()));
    $entete = "From: application@todo.be\r\n";
    $entete .= "Reply-to: Maxime.Vanhoren@ulb.ac.be \r\n";
    $entete .= "X-Priority: 1 \r\n";
    $entete .= "MIME-Version: 1.0 \r\n";
    $entete .= "Content-Type: multipart/mixed; boundary=\"$boundary\" \r\n";
    $entete .= " \r\n";

    $message = "--$boundary \r\n";
    $message .= "Content-Type: text/html; charset=\"UTF8\" \r\n";
    $message .= "Content-Transfer-Encoding:8bit \r\n";
    $message .= "<br/>\r\n";
    $message .= "La tâche a été modifiée.<br/>";
    $message .= "<br/>\r\n";
    $message .= $mod;
    $message .= "\r\n";
    $message .= "--$boundary \r\n";
    $message .= "Content-Type: $typepiecejointe; name=\"$file_name\" \r\n";
    $message .= "Content-Transfer-Encoding: base64 \r\n";
    $message .= "Content-Disposition: attachment; filename=\"$file_name\" \r\n";
    $message .= "\r\n";
    $message .= $data . "\r\n";
    $message .= "\r\n";
    $message .= "--$boundary-- \r\n";

//Ici si on envoie plusieur mail le système ne supporte pas

    /*
    $boundary = md5(uniqid(time()));
    $entete2 = "From: application@todo.be\r\n";
    $entete2 .= "Reply-to: Maxime.Vanhoren@ulb.ac.be \r\n";
    $entete2 .= "X-Priority: 1 \r\n";
    $entete2 .= "MIME-Version: 1.0 \r\n";
    $entete2 .= "Content-Type: multipart/mixed; boundary=\"$boundary\" \r\n";
    $entete2 .= " \r\n";

    $message2  = "--$boundary \r\n";
    $message2 .= "Content-Type: text/html; charset=\"UTF8\" \r\n";
    $message2 .= "Content-Transfer-Encoding:8bit \r\n";
    $message2 .= "<br/>\r\n";
    $message2 .= "Vous avez été ajouté à la tâche n°$idTache.<br/>";
    $message2 .= "<br/>\r\n";
    $message2 .= "--$boundary \r\n";
    $message2 .= "Content-Type: $typepiecejointe; name=\"$file_name\" \r\n";
    $message2 .= "Content-Transfer-Encoding: base64 \r\n";
    $message2 .= "Content-Disposition: attachment; filename=\"$file_name\" \r\n";
    $message2 .= "\r\n";
    $message2 .= $data."\r\n";
    $message2 .= "\r\n";
    $message2 .= "--$boundary-- \r\n";

    $boundary = md5(uniqid(time()));
    $entete3 = "From: application@todo.be\r\n";
    $entete3 .= "Reply-to: Maxime.Vanhoren@ulb.ac.be \r\n";
    $entete3 .= "X-Priority: 1 \r\n";
    $entete3 .= "MIME-Version: 1.0 \r\n";
    $entete3 .= "Content-Type: multipart/mixed; boundary=\"$boundary\" \r\n";
    $entete3 .= " \r\n";

    $message3  = "--$boundary \r\n";
    $message3 .= "Content-Type: text/html; charset=\"UTF8\" \r\n";
    $message3 .= "Content-Transfer-Encoding:8bit \r\n";
    $message3 .= "<br/>\r\n";
    $message3 .= "Vous avez été retiré de la tâche n°$idTache.<br/>";
    $message3 .= "<br/>\r\n";
    $message3 .= "--$boundary-- \n";
    */


    mail($mailto, "Une de vos tâches, n°$idTache, a été modifiée", $message, $entete);

    //mail($mailto2,"Ajouté à la tâche n°$idTache",$message2,$entete2);

    //mail($mailto3,"Supprimé de la tâche n°$idTache",$message3,$entete3);

    header("Refresh:0, URL=hub2.php");
}