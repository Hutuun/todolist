<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <script src="js/function.js" type="text/javascript"></script>
    <title>Todo</title>
    <style>
        table.ta,td{
            border: 1px solid black;
            border-collapse: collapse;
        }
        .download.icon {
            color: #000;
            position: absolute;
            margin-left: 3px;
            margin-top: 12px;
            width: 13px;
            height: 4px;
            border-radius: 2px;
            border: solid 2px currentColor;
            border-top: none;
        }
        .download.icon:before {
            content: '';
            position: absolute;
            left: 6px;
            top: -9px;
            width: 1px;
            height: 10px;
            background-color: currentColor;
        }
        .download.icon:after {
            content: '';
            position: absolute;
            left: 4px;
            top: -4px;
            width: 4px;
            height: 4px;
            border-top: solid 2px currentColor;
            border-right: solid 2px currentColor;
            -webkit-transform: rotate(135deg);
            transform: rotate(135deg);
        }
        .check.icon {
            color: #000;
            position: relative;
            margin-left: 2px;
            margin-top: 2px;
            width: 15px;
            height: 5px;
            border-bottom: solid 1px currentColor;
            border-left: solid 1px currentColor;
            -webkit-transform: rotate(-45deg);
            transform: rotate(-45deg);
        }
        .check.icon2 {
            color: #000;
            position: relative;
            margin-left: 2px;
            margin-top: 2px;
            width: 15px;
            height: 5px;
            border-bottom: solid 3px currentColor;
            border-left: solid 3px currentColor;
            -webkit-transform: rotate(-45deg);
            transform: rotate(-45deg);
        }
        .close.icon {
            color: #000;
            position: absolute;
            width: 10px;
            height: 10px;
        }
        .close.icon:before {
            content: '';
            position: absolute;
            top: 10px;
            width: 21px;
            height: 1px;
            background-color: currentColor;
            -webkit-transform: rotate(-45deg);
            transform: rotate(-45deg);
        }
        .close.icon:after {
            content: '';
            position: absolute;
            top: 10px;
            width: 21px;
            height: 1px;
            background-color: currentColor;
            -webkit-transform: rotate(45deg);
            transform: rotate(45deg);
        }
    </style>
</head>
<body style="font-family: Trebuchet,Trebuchet MS,Arial,Helvetica,Sans-serif; background-color: #ffffff ">

<?php
/**
 * Created by PhpStorm.
 * User: Sullivan Honnet
 * Date: 24/05/2019
 * Time: 14:47
 */

include ("database.php");
include ("fcAffi.php");

session_start();

$id = $_SESSION["id"];

echo "<div style='width: 1002px; text-align: left; height: 100%; z-index: 0; position: relative; padding: 0px;margin: 0 auto;'>";

echo "<a style='float:left' href='login.php'><img src=\"inside-logout-icon.png\">logout</a>";

echo "<a style='float:right' href='ajouterTache.php'><img src=\"add.png\">Ajouter une tâche</a><br>";

if($_SESSION["admin"]>="1") {

    echo "<br><a style='float:right' href='ajouterUser.php'><img src=\"add.png\">Ajouter un utilisateur</a>";
    echo "<a style='float: bottom' href='backup.php'><img src=\"Data-Database-Backup-icon.png\">Backup</a>";
}

$cpt = 0;

echo "<div id='pageContent' style='padding-top: 24px; padding-left: 25px; padding-right: 25px; padding-bottom: 18px; background-color: white'>";



$order="";
$orderD="";

$affi =  "<h2 id='menu1' onclick='afficheMenu(this)'><a style='cursor: pointer; '>Liste des tâches</a></h2>";

$sql = "SELECT DISTINCT nom,prenom,idUser,color FROM suuser where idUser<>4 order by nom,prenom";

$res = query($sql);

$affi .= "<table><tr><form method='post' id='sub$cpt'>";



while ($row = mysqli_fetch_assoc($res)){
    if ((strtotime($row["dateFin"]) > time() || strtotime($row["dateFin"])<0 || strtotime($row["dateFin"])===false)) {
        $color = $row["color"];
        $id = $row["idUser"];
        $affi .= "<span style='color: #$color ;padding-right: 12px'><input type='checkbox' name='id' value='$id' onclick='valider($cpt)' >" . $row["prenom"] . "</span>";
    }
}
$affi.= "<span style='padding-right: 12px'><input type='checkbox' name='id' value='4' onclick='valider($cpt)'>Autre</span></form>";

$affi.="<form action='hub.php'><input type='submit' value='Reset'></form></tr></table>";

$affi.="<br/>";

$cpt +=1;

$id = $_POST["id"];

$sql = "SELECT sutache.*, sutuser.*, suuser.*, count(sutuser.idTache) as nb FROM sutache,sutuser,suuser where suuser.idUser = sutuser.idUser and sutuser.idTache = sutache.idTache and suuser.idUser = $id GROUP by sutuser.idTache order by dateSuppr, priorite DESC, dateCreation, deadline, sutache.idTache";

$sql2 = "SELECT sutache.*, sutuser.*, suuser.*, count(sutuser.idTache) as nb FROM sutache,sutuser,suuser where suuser.idUser = sutuser.idUser and sutuser.idTache = sutache.idTache and suuser.idUser <> $id GROUP by sutuser.idTache order by dateSuppr, priorite DESC, dateCreation, deadline, sutache.idTache";

$affi .=  "<table id='sousmenu1' style='display: table' class='ta'><tr>";
$affi .= "<td style='max-width: 45px'><form action='hub.php' method='post' id='sub$cpt'><input type='text' name='order' value='sutache.idTache' hidden><a onclick='valider($cpt)' style='cursor: pointer; cursor: hand'>Num</a></form></td>";
$cpt += 1;
$affi .= "<td style='text-align: center; width: 400px'><form action='hub.php' method='post' id='sub$cpt'><input type='text' name='order' value='sutache.nomTache' hidden><a onclick='valider($cpt)' style='cursor: pointer; cursor: hand'>Tâches</a></form></td>";
$cpt += 1;
$affi .= "<td style='text-align: center; '><form action='hub.php' method='post' id='sub$cpt'><input type='text' name='order' value='idDemandeur' hidden><a onclick='valider($cpt)' style='cursor: pointer; cursor: hand'>Demandeur</a></form></td>";
$cpt += 1;
$affi .= "<td style='text-align: center; width: 80px'>Qui</td>";
$cpt += 1;
$affi .= "<td style='width: 80px; text-align: center'>BD</td>";
$cpt += 1;
$affi .= "<td style='width: 80px; text-align: center'><form action='hub.php' method='post' id='sub$cpt'><input type='text' name='order' value='sutache.dateCreation' hidden><a onclick='valider($cpt)' style='cursor: pointer; cursor: hand'>Début</a></form></td>";
$cpt += 1;
$affi .= "<td style='width: 80px; text-align: center'><form action='hub.php' method='post' id='sub$cpt'><input type='text' name='order' value='sutache.deadline' hidden><a onclick='valider($cpt)' style='cursor: pointer; cursor: hand'>Deadline</a></form></td>";
$cpt += 1;
$affi .= "<td style='width: 80px; text-align: center'><form action='hub.php' method='post' id='sub$cpt'><input type='text' name='order' value='sutache.dateSuppr' hidden><a onclick='valider($cpt)' style='cursor: pointer; cursor: hand'>Fin</a></form></td>";
$affi .= "<td style='text-align: center; '>Validation</td>";
$affi .= "<td style='text-align: center; '>modif</td>";
if($_SESSION["admin"]>="1") {
    $affi .= "<td style='text-align: center; '>Supprimer</td>";
}

if($_SERVER["REQUEST_METHOD"]==="POST") {
    if (isset($_POST["order"])) {
        $order = $_POST["order"];

        $affi =  "<h2 id='menu1' onclick='afficheMenu(this)'><a style='cursor: pointer;'>Liste des tâches</a></h2>";


        $sql = "SELECT DISTINCT nom,prenom,idUser,color FROM suuser where idUser <> 4 order by nom,prenom";

        $res = query($sql);

        $affi .= "<table><tr><form method='post' id='sub$cpt'>";

        while ($row = mysqli_fetch_assoc($res)){
            if ((strtotime($row["dateFin"]) > time() || strtotime($row["dateFin"])<0 || strtotime($row["dateFin"])===false)) {
                $color = $row["color"];
                $id = $row["idUser"];
                $affi .= "<span style='color: #$color;padding-right: 12px'><input type='checkbox' name='id' value='$id' onclick='valider($cpt)'>" . $row["prenom"] . " " . $row["nom"] . "</span>";
            }
        }
        $affi.= "<span style='padding-right: 12px'><input type='checkbox' name='id' value='4' onclick='valider($cpt)'>Personne Autre</span></form>";

        $affi.="<form action='hub.php'><input type='submit' value='Reset'></form></tr></table>";

        $affi.="<br/>";

        $cpt +=1;

        $id = $_POST["id"];

        $sql = "SELECT sutache.*, sutuser.*, suuser.*, count(sutuser.idTache) as nb FROM sutache,sutuser,suuser where suuser.idUser = '$id' and suuser.idUser = sutuser.idUser and sutuser.idTache = sutache.idTache "."group by sutuser.idTache ORDER by $order, priorite DESC";
        $sql2 = "SELECT sutache.*, sutuser.*, suuser.*, count(sutuser.idTache) as nb FROM sutache,sutuser,suuser where suuser.idUser <> '$id' and suuser.idUser = sutuser.idUser and sutuser.idTache = sutache.idTache group by sutuser.idTache ORDER by $order, priorite DESC";

        $affi .=  "<table id='sousmenu1' style='display: table' class='ta'><tr>";

        $affi .= "<td style='max-width: 45px'><form action='hub.php' method='post' id='sub$cpt'><input type='text' name='orderD' value='sutache.idTache' hidden><a onclick='valider($cpt)' style='cursor: pointer; cursor: hand'>Num</a></form></td>";
        $cpt += 1;
        $affi .= "<td style='text-align: center; width: 400px'><form action='hub.php' method='post' id='sub$cpt'><input type='text' name='orderD' value='sutache.nomTache' hidden><a onclick='valider($cpt)' style='cursor: pointer; cursor: hand'>Tâches</a></form></td>";
        $cpt += 1;
        $affi .= "<td style='text-align: center; '><form action='hub.php' method='post' id='sub$cpt'><input type='text' name='orderD' value='idDemandeur' hidden><a onclick='valider($cpt)' style='cursor: pointer; cursor: hand'>Demandeur</a></form></td>";
        $cpt += 1;
        $affi .= "<td style='text-align: center; width: 80px'>Qui</td>";
        $cpt += 1;
        $affi .= "<td style='text-align: center; width: 80px'>BD</td>";
        $cpt += 1;
        $affi .= "<td style='width: 80px; text-align: center'><form action='hub.php' method='post' id='sub$cpt'><input type='text' name='orderD' value='sutache.dateCreation' hidden><a onclick='valider($cpt)' style='cursor: pointer; cursor: hand'>Début</a></form></td>";
        $cpt += 1;
        $affi .= "<td style='width: 80px; text-align: center'><form action='hub.php' method='post' id='sub$cpt'><input type='text' name='orderD' value='sutache.deadline' hidden><a onclick='valider($cpt)' style='cursor: pointer; cursor: hand'>Deadline</a></form></td>";
        $cpt += 1;
        $affi .= "<td style='width: 80px; text-align: center'><form action='hub.php' method='post' id='sub$cpt'><input type='text' name='orderD' value='sutache.dateSuppr' hidden><a onclick='valider($cpt)' style='cursor: pointer; cursor: hand'>Fin</a></form></td>";
        $affi .= "<td style='text-align: center; '>Validation</td>";
        $affi .= "<td style='text-align: center; '>modif</td>";
        if($_SESSION["admin"]>="1") {
            $affi .= "<td style='text-align: center; '>Supprimer</td>";
        }

    }else {
        if (isset($_POST["orderD"])) {
            $orderD = $_POST["orderD"];

            $sql = "SELECT sutache.*, sutuser.*, suuser.*, count(sutuser.idTache) as nb FROM sutache,sutuser,suuser where suuser.idUser = sutuser.idUser and sutuser.idTache = sutache.idTache and suuser.idUser = $id group by sutuser.idTache ORDER by $orderD DESC, priorite DESC";
            $sql2 = "SELECT sutache.*, sutuser.*, suuser.*, count(sutuser.idTache) as nb FROM sutache,sutuser,suuser where suuser.idUser = sutuser.idUser and sutuser.idTache = sutache.idTache and suuser.idUser <> $id group by sutuser.idTache ORDER by $orderD DESC, priorite DESC";

        }
    }
}

echo $affi;

echo "</tr>";

$cpt += 1;

$result = query($sql);

while ($row = mysqli_fetch_assoc($result)){

    if($row["suppr"]==="non"||(strtotime($row["dateFin"]) > time() || strtotime($row["dateFin"])<0 || strtotime($row["dateFin"])===false)) {

        if(isset($row["dateSuppr"]) && substr($row["dateSuppr"],0,10)!=="0000-00-00" && $row["adminC"]==1 ) {

            echo affiTf($row, $cpt);
        }
        else{

            echo affiTnf($row,$cpt);
        }
        $cpt+=1;
    }

}

$result = query($sql2);

while ($row = mysqli_fetch_assoc($result)){

    if($row["suppr"]==="non") {

        if(isset($row["dateSuppr"]) && substr($row["dateSuppr"],0,10)!=="0000-00-00" && $row["adminC"]==1 ) {

            echo affiTf($row, $cpt);
        }
        else{

            echo affiTnf($row,$cpt);
        }
        $cpt+=1;
    }

}


echo "</table>";

echo "</div>";

echo "<form action='tacheSuppr.php'><input type='submit' name='' value='Voir les tâches supprimées' style='float: right'></form>";
echo "<form method='post' action='pdf.php' id='sub$cpt'><input type='text' name='order' value='$order' hidden><input type='text' name='orderD' value='$orderD' hidden><a style='float:bottom; cursor: pointer' onclick='valider($cpt)'>Imprimer en PDF<div class='download icon'></div></a></form><br/>";

?>

</body>
</html>
