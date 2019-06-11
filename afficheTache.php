
<?php
/**
 * Created by PhpStorm.
 * User: Sullivan Honnet
 * Date: 4/06/2019
 * Time: 12:30
 */


include ("database.php");

$id = $_POST["idtache"];

require ("vendor/autoload.php");

$pdf = new Mpdf\Mpdf();

$pdf->AddPage();

$aff ="<!DOCTYPE html>
<html>
<head>
    <meta charset=\"UTF-8\">
    <script src=\"js/function.js\" type=\"text/javascript\"></script>
    <title>Tache $id</title>

</head>
<body>";



$sql = "SELECT * FROM sutache,suuser,sutuser WHERE sutache.idTache = '$id' and idDemandeur = suuser.idUser and sutuser.idTache = sutache.idTache";

$result = query($sql);



$aff .= "<h2>La Tâche</h2>";

$row = mysqli_fetch_assoc($result);

$color = "#".$row["color"];

$aff .= "<p>Numéro : ".$row["idTache"]."</p>";
$aff .= "<p>Tache : ".$row["nomTache"]."</p>";
$aff .= "<p>Description : ".$row["descriptionTache"]."</p>";

$date = $row["dateCreation"];
$ymd = substr($date, 0, 10);
$date = date("d/m/y", strtotime($ymd));
$aff .= "<p>Date de début : " . $date . "</p>";
if(isset($row["deadline"]) && substr($row["deadline"],0,10)!=="0000-00-00") {
    $date = $row["deadline"];
    $ymd = substr($date, 0, 10);
    $date = date("d/m/y", strtotime($ymd));
    $aff .= "<p>Deadline : " . $date . "</p>";
}
if(isset($row["dateSuppr"]) && substr($row["dateSuppr"],0,10)!=="0000-00-00") {
    $date = $row["dateSuppr"];
    $ymd = substr($date, 0, 10);
    $date = date("d/m/y", strtotime($ymd));
    $aff .= "<p> Date de fin : " . $date . "</p>";
}
$aff .= "<p>Priorité : ";

$prio = "La tâche n'est pas prioritaire</p>";

if ($row["priorite"]==1){
    $prio = "La tâche est prioritaire</p>";
}
if ($row["priorite"]==2){
    $prio = "La tâche est très prioritaire</p>";
}
$aff .= $prio;

$aff .= "<p>Demande effectuée par : <q style='color: $color'>".$row["prenom"]." ".$row["nom"]."</q> ";
if($row["adminC"]==true){
    $aff .= "qui a validé la tâche</p>";
}else{
    $aff .= "qui n'a pas validé la tâche</p>";
}



$sql = "SELECT * FROM sutache,sutuser,suuser WHERE sutache.idTache = '$id'
        AND sutache.idTache = sutuser.idTache
        AND sutuser.idUser = suuser.idUser";

$result = query($sql);



$aff .= "<h2>Les personnes et les Bases de données affectées à cette tâche</h2>";
$aff .= "<p>Réalisé par : <ul>";
while ($row = mysqli_fetch_assoc($result)){

    $color = "#".$row["color"];

    $aff .= "<li style='color: $color'>".$row["prenom"]." ".$row["nom"]."</li> ";
    if($row["checked"]==true){
        $aff .= "qui a validé sa tâche</p>";
    }else{
        $aff .= "qui n'a pas validé sa tache ";
        if(strtotime($row["dateFin"]) < time() && strtotime($row["dateFin"])>0){
            $aff .="et qui ne travaille plus ici</p>";
        }else{
            $aff.="</p>";
        }
    }
}
$aff.="</ul>";

$sql = "SELECT * FROM sutache,sutbd,subd WHERE sutache.idTache = '$id'
        AND sutache.idTache = sutbd.idTache
        AND sutbd.idBD = subd.idBD";

$result = query($sql);

if($result->num_rows>0) {

    $aff .= "<p>Réalisé sur : <ul>";

    while ($row = mysqli_fetch_assoc($result)) {

        $color = "#" . $row["color"];

        $aff .= "<li style='color: $color'>" . $row["nomBD"] . "</li></p>";

    }
}

$aff .= "</body></html>";

$pdf->WriteHTML($aff);

$pdf->Close();

$pdf->Output();