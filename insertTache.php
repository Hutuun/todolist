<?php
/**
 * Created by PhpStorm.
 * User: Sullivan honnet
 * Date: 27/05/2019
 * Time: 14:46
 *
 *Crée une nouvelle tâche et envoie un mail aux personne concerné avec le de tâche et le pdf du récapitulatif des tâches
 */

include ("database.php");
include ("fcPDF.php");
require ("vendor/autoload.php");

session_start();

$pdf = new Mpdf\Mpdf();

$pdf->AddPage();

$affi = "<!DOCTYPE html>
<html>
<head>
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


$sql = "SELECT idUser From suuser";
$res = query($sql);



while ($row = mysqli_fetch_assoc($res)) {
    $id = $row["idUser"];
    if(isset($_POST["d$id"])) {
        $demandeur = $_POST["d$id"];
    }
}


$nom = $_POST["nom"];
$nom = str_ireplace("\"","'",$nom);
$prio = $_POST["prio"];
$dead = "";
if ($_POST["deadline"]!=="") {
    $dead = $_POST["deadline"];
}
$desc = $_POST["desc"];

$desc = str_ireplace("\"","'",$desc);

$wait = "non";
if(isset($_POST["wait"])){
    $wait = "oui";
}
if(isset($_POST["cours"])){
    $wait = $_POST["cours"];
}
if(isset($_POST["test"])){
    $wait = $_POST["test"];
}
if(isset($_POST["prod"])){
    $wait = $_POST["prod"];
}
if(isset($_POST["abandon"])){
    $wait = $_POST["abandon"];
}
if(isset($_POST["autre"])){
    $wait = $_POST["autre"];
}
$sql = "SELECT idTache From sutache order by idTache";

$res = query($sql);
$cpt = 0;
while ($row = mysqli_fetch_assoc($res)){

    $cpt += 1;

}


$sql = "LOCK TABLE sutache write, sutuser write ,sutbd write, subd read, suuser read";

query($sql);

$sql = "INSERT IGNORE INTO sutache(idTache, nomTache, descriptionTache, idDemandeur, priorite ,deadline, dateCreation, dateSuppr, wait) VALUES (\"$cpt\", \"$nom\",\"$desc\",\"$demandeur\",$prio,\"$dead\",CURRENT_TIME,\"''\",'$wait');";

query($sql);

$sql = "SELECT idBD FROM subd";

$res = query($sql);
$noBD = true;
while ($row = mysqli_fetch_assoc($res)){
    $id = $row["idBD"];

    if(isset($_POST["$id"])){
        $sql = "INSERT INTO sutbd(idBD,idTache) VALUES (\"$id\", \"$cpt\")";
        query($sql);
        $noBD = false;
    }


}

if ($noBD){
    $sql = "INSERT INTO sutbd(idBD,idTache) VALUES (\"bd0\", \"$cpt\")";
    query($sql);
}

$sql = "SELECT * From suuser";
$res = query($sql);

$mailto="";

while ($row = mysqli_fetch_assoc($res)) {
    $id = $row["idUser"];
    if(isset($_POST["$id"])) {

        $sql = "INSERT INTO sutuser(idUser, idTache, checked) VALUES (\"$id\",\"$cpt\",0);";
        query($sql);

        $mailto.=$row["mail"].",";
    }
}

$sql = "UNLOCK TABLE";

query($sql);

$sql = "SELECT * FROM sutache,suuser,sutuser WHERE sutache.idTache = '$cpt' and idDemandeur = suuser.idUser and sutuser.idTache = sutache.idTache";
$res = query($sql);
$row = mysqli_fetch_assoc($res);

$affi .= "<h2>La T&acirc;che</h2>";

$color = "#".$row["color"];

$affi .= "<p>Num&eacute;ro : ".$row["idTache"]."</p>";
$affi .= "<p>T&acirc;che : ".$row["nomTache"]."</p>";
$affi .= "<p>Description : ".$row["descriptionTache"]."</p>";

$date = $row["dateCreation"];
$ymd = substr($date, 0, 10);
$date = date("d/m/y", strtotime($ymd));
$affi .= "<p>Date de d&eacute;but : " . $date . "</p>";
if(isset($row["deadline"]) && substr($row["deadline"],0,10)!=="0000-00-00") {
    $date = $row["deadline"];
    $ymd = substr($date, 0, 10);
    $date = date("d/m/y", strtotime($ymd));
    $affi .= "<p>Deadline : " . $date . "</p>";
}
if(isset($row["dateSuppr"]) && substr($row["dateSuppr"],0,10)!=="0000-00-00") {
    $date = $row["dateSuppr"];
    $ymd = substr($date, 0, 10);
    $date = date("d/m/y", strtotime($ymd));
    $affi .= "<p> Date de fin : " . $date . "</p>";
}
$affi .= "<p>Priorit&eacute; : ";

$prio = "La t&acirc;che n'est pas prioritaire</p>";

if ($row["priorite"]==1){
    $prio = "La t&acirc;che est prioritaire</p>";
}
if ($row["priorite"]==2){
    $prio = "La t&acirc;che est tr&egrave;s prioritaire</p>";
}
$affi .= $prio;

$affi .= "<p>Demande effectu&eacute;e par : <q style='color: $color'>".$row["prenom"]." ".$row["nom"]."</q> ";
if($row["adminC"]==true){
    $affi .= "qui a valid&eacute; la t&acirc;che</p>";
}else{
    $affi .= "qui n'a pas valid&eacute; la t&acirc;che</p>";
}



$sql = "SELECT * FROM sutache,sutuser,suuser WHERE sutache.idTache = '$cpt'
        AND sutache.idTache = sutuser.idTache
        AND sutuser.idUser = suuser.idUser";

$result = query($sql);



$affi .= "<h2>Les personnes et les Bases de donn&eacute;es affect&eacute;es &agrave; cette t&acirc;che</h2>";
$affi .= "<p>R&eacute;alis&eacute; par : <ul>";
while ($row = mysqli_fetch_assoc($result)){

    $color = "#".$row["color"];

    $affi .= "<li style='color: $color'>".$row["prenom"]." ".$row["nom"]."</li> ";
    if($row["checked"]==true){
        $affi .= "qui a valid&eacute; sa t&acirc;che</p>";
    }else{
        $aff .= "qui n'a pas valid&eacute; sa t&acirc;che</p>";
        if(strtotime($row["dateFin"]) < time() && strtotime($row["dateFin"])>0){
            $affi .="et qui ne travaille plus ici</p>";
        }else{
            $affi .="</p>";
        }
    }
}
$affi .="</ul>";

$sql = "SELECT * FROM sutache,sutbd,subd WHERE sutache.idTache = '$cpt'
        AND sutache.idTache = sutbd.idTache
        AND sutbd.idBD = subd.idBD";

$result = query($sql);

if($result->num_rows>0) {

    $affi .= "<p>R&eacute;alis&eacute; sur : <ul>";

    while ($row = mysqli_fetch_assoc($result)) {

        $color = "#" . $row["color"];

        $affi .= "<li style='color: $color'>" . $row["nomBD"] . "</li></p>";

    }
}

//Parti envoie du mail

$affi .= "</body></html>";


$pdf->WriteHTML($affi);



$path ="tache/";



$file_name = "tache$cpt.pdf";

$pdf->Output($path."$file_name",\Mpdf\Output\Destination::FILE);

$sql = "SELECT nom, prenom, mail FROM suuser WHERE suuser.idUser = '".$demandeur."' ";


$res = query($sql);

$row = mysqli_fetch_assoc($res);


$mailto .= $row["mail"];

$url = "http://projetsdr.ulb.be/todo/login.php";

$typepiecejointe = filetype($path.$file_name);
$data = chunk_split( base64_encode(file_get_contents($path.$file_name)) );



$boundary = md5(uniqid(time()));
$entete = "From: application@todo.be\r\n";
$entete .= "Reply-to: Maxime.Vanhoren@ulb.ac.be \r\n";
$entete .= "X-Priority: 1 \r\n";
$entete .= "MIME-Version: 1.0 \r\n";
$entete .= "Content-Type: multipart/mixed; boundary=\"$boundary\" \r\n";
$entete .= " \r\n";


$message  = "--$boundary \r\n";
$message .= "Content-Type: text/html; charset=\"UTF8\" \r\n";
$message .= "Content-Transfer-Encoding:8bit \r\n";
$message .= "\r\n";
$message .= "Une nouvelle t&acirc;che a été ajout&eacute;e.<br/>";
$message .= "<br/>\r\n";
$message .= "Lien vers l'application :".$url."<br/>";
$message .= "<br/>\r\n";
$message .= "--$boundary \n";
$message .= "Content-Type: $typepiecejointe; name=\"$file_name\" \r\n";
$message .= "Content-Transfer-Encoding: base64 \r\n";
$message .= "Content-Disposition: attachment; filename=\"$file_name\" \r\n";
$message .= "\r\n";
$message .= $data."\r\n";
$message .= "\r\n";


$pdf = new \Mpdf\Mpdf();

$pdf->AddPage();

$sql = "SELECT sutache.*, sutuser.*, suuser.*, count(sutuser.idTache) as nb FROM sutache,sutuser,suuser where suuser.idUser = sutuser.idUser and sutuser.idTache = sutache.idTache GROUP by sutuser.idTache order by dateSuppr, priorite DESC, dateCreation";

$affi = "<!DOCTYPE html>
<html>
<head>
    <meta charset=\"UTF-8\">
    <script src=\"js/function.js\" type=\"text/javascript\"></script>
    <style>
        table.ta,td{
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>
<body style=\"font-family: Trebuchet,Trebuchet MS,Arial,Helvetica,Sans-serif;\">";

$affi .=  "<h2>Liste des tâches</h2>";
$affi .=  "<table style='display: table;' class='ta'>";
$affi .= "<tr><td style='max-width: 45px'>Num</td>";
$affi .= "<td style='text-align: center; width: 300px'>Tâches</td>";
$affi .= "<td>Demandeur</td>";
$affi .= "<td style='text-align: center; width: 80px'>Qui</td>";
$affi .= "<td style='text-align: center; width: 80px'>BD</td>";
$affi .= "<td style='width: 80px; text-align: center'>Début</td>";
$affi .= "<td style='width: 80px; text-align: center'>Deadline</td>";
$affi .= "<td style='width: 80px; text-align: center'>Fin</td>";
$affi .= "<td>Validé</td>";

$affi.="</tr>";


$result = query($sql);


while ($row = mysqli_fetch_assoc($result)) {

    if (($row["suppr"] === "non" && $row["archive"]==="non")) {

        if (isset($row["dateSuppr"]) && substr($row["dateSuppr"], 0, 10) !== "0000-00-00" && $row["adminC"] == 1) {

            $affi .= affiTfPDF($row);


        } else {

            $affi .= affiTnfPDF($row);

        }

    }

}



$affi .= "</table>";


$affi .= "</div>";


$affi .= "</body>";
$affi .= "</html>";

$pdf->WriteHTML($affi);

$path ="tache/";

$file_name = "listTache.pdf";

$pdf->Output($path."$file_name",\Mpdf\Output\Destination::FILE);

$typepiecejointe = filetype($path.$file_name);
$data = chunk_split( base64_encode(file_get_contents($path.$file_name)) );

$message .= "--$boundary \n";
$message .= "Content-Type: $typepiecejointe; name=\"$file_name\" \r\n";
$message .= "Content-Transfer-Encoding: base64 \r\n";
$message .= "Content-Disposition: attachment; filename=\"$file_name\" \r\n";
$message .= "\r\n";
$message .= $data."\r\n";
$message .= "\r\n";
$message .= "--".$boundary."--";

mail($mailto,"Nouvelle tâche id n°$cpt",$message,$entete);

if(isset($_POST["tache"])){
    header("Refresh:0; URL=ajouterTache.php");
}else{
    header("Refresh:0; URL=hub2.php");
}