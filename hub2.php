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
            position: relative;
            padding-left: 40px;
            width: 15px;
            height: 10px;
        }
        .close.icon:before {
            content: '';
            position: absolute;
            top: 6px;
            width: 15px;
            height: 1px;
            background-color: currentColor;
            -webkit-transform: rotate(-45deg);
            transform: rotate(-45deg);
        }
        .close.icon:after {
            content: '';
            position: absolute;
            top: 6px;
            width: 15px;
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
 *
 *Il s'agit du hub principal avec par defaut un trie selon l'utilisateur connecté
 */

include ("database.php");
include ("fcAffi.php");

session_start();

$id = $_SESSION["id"];
$_SESSION["last"]="hub2.php";

echo "<div style='width: 1002px; text-align: left; height: 100%; z-index: 0; position: relative; padding: 0px;margin: 0 auto;'>";

echo "<a style='float:left' href='login.php'><img src=\"img/inside-logout-icon.png\">logout</a>";

echo "<a style='float:right' href='ajouterTache.php'><img src=\"img/add.png\">Ajouter une tâche</a><br>";

if($_SESSION["admin"]>="1") {

    echo "<br><a style='float:right' href='ajouterUser.php'><img src=\"img/add.png\">Ajouter un utilisateur</a>";
    echo "<a style='float: bottom' href='backup.php'><img src=\"img/Data-Database-Backup-icon.png\">Backup</a>";
    echo "<br><a style='float:right' href='utilisateur.php'><img src=\"img/add.png\">Voir les utilisateurs</a>";
}

$cpt = 0;

echo "<div id='pageContent' style='padding-top: 24px; padding-left: 25px; padding-right: 25px; padding-bottom: 18px; background-color: white'>";



$order="";
$orderD="";

$affi =  "<h2 id='menu1' onclick='afficheMenu(this)'><a style='cursor: pointer; '>Liste des tâches</a></h2>";

$sql = "SELECT DISTINCT nom,prenom,idUser,color,dateFin FROM suuser order by nom,prenom";

$res = query($sql);

$affi .= "<table><tr><form method='post' id='sub$cpt'>";



while ($row = mysqli_fetch_assoc($res)){
    if ((strtotime($row["dateFin"]) > time() || strtotime($row["dateFin"])<0 || strtotime($row["dateFin"])===false)) {
        $color = $row["color"];
        $id = $row["idUser"];
        $affi .= "<span style='color: #$color ;padding-right: 12px'><input type='checkbox' name='id' value='$id' onclick='valider($cpt)' >" . $row["prenom"] . "</span>";
    }
}
$cpt += 1;

$affi.="</form><form id='sub$cpt' action='hub.php'><input type='image' alt='Submit' src='img/Reset-icon.png'></a></form></tr></table>";

$cpt += 1;

$affi.="<br/>";

$cpt +=1;
$id = $_SESSION["id"];

if(isset($_POST["id"])) {
    $id = $_POST["id"];
}

$sql = "SELECT * FROM sutache,sutuser,suuser where suuser.idUser = sutuser.idUser and sutuser.idTache = sutache.idTache and suuser.idUser = '$id' GROUP by sutuser.idTache order by dateSuppr, priorite DESC, dateCreation DESC, deadline, sutache.idTache";

$sql2 = "SELECT * FROM sutache,sutuser,suuser where sutache.idTache = sutuser.idTache and suuser.idUser=sutuser.idUser and suuser.idUser <> '$id' GROUP by sutuser.idTache order by dateSuppr, priorite DESC, dateCreation, deadline, sutache.idTache";

$affi .=  "<table id='sousmenu1' style='display: table' class='ta'><tr>";
$affi .= "<td style='max-width: 45px'><form action='hub2.php' method='post' id='sub$cpt'><input type='text' name='order' value='sutache.idTache' hidden><a onclick='valider($cpt)' style='cursor: pointer; '>Num</a></form></td>";
$cpt += 1;
$affi .= "<td style='text-align: center; width: 400px'><form action='hub2.php' method='post' id='sub$cpt'><input type='text' name='order' value='sutache.nomTache' hidden><a onclick='valider($cpt)' style='cursor: pointer; '>Tâches</a></form></td>";
$cpt += 1;
$affi .= "<td style='text-align: center; '><form action='hub2.php' method='post' id='sub$cpt'><input type='text' name='order' value='idDemandeur' hidden><a onclick='valider($cpt)' style='cursor: pointer; '>Demandeur</a></form></td>";
$cpt += 1;
$affi .= "<td style='text-align: center; width: 80px'>Qui</td>";
$cpt += 1;
$affi .= "<td style='width: 80px; text-align: center'>BD</td>";
$cpt += 1;
$affi .= "<td style='width: 80px; text-align: center'><form action='hub2.php' method='post' id='sub$cpt'><input type='text' name='order' value='sutache.dateCreation' hidden><a onclick='valider($cpt)' style='cursor: pointer; '>Début</a></form></td>";
$cpt += 1;
$affi .= "<td style='width: 80px; text-align: center'><form action='hub2.php' method='post' id='sub$cpt'><input type='text' name='order' value='sutache.deadline' hidden><a onclick='valider($cpt)' style='cursor: pointer;'>Statut</a></form></td>";
$cpt += 1;
$affi .= "<td style='width: 80px; text-align: center'><form action='hub2.php' method='post' id='sub$cpt'><input type='text' name='order' value='sutache.dateSuppr' hidden><a onclick='valider($cpt)' style='cursor: pointer;'>Fin</a></form></td>";
$affi .= "<td style='text-align: center; '>Validation</td>";
$affi .= "<td style='text-align: center; '>Actions</td>";


if($_SERVER["REQUEST_METHOD"]==="POST") {
    if (isset($_POST["order"])) {
        $order = $_POST["order"];

        $affi =  "<h2 id='menu1' onclick='afficheMenu(this)'><a style='cursor: pointer;'>Liste des tâches</a></h2>";


        $sql = "SELECT DISTINCT nom,prenom,idUser,color,dateFin FROM suuser order by nom,prenom";

        $res = query($sql);

        $affi .= "<table><tr><form method='post' id='sub$cpt'>";


        while ($row = mysqli_fetch_assoc($res)){
            if ((strtotime($row["dateFin"]) > time() || strtotime($row["dateFin"])<0 || strtotime($row["dateFin"])===false)) {
                $color = $row["color"];
                $id = $row["idUser"];
                $affi .= "<span style='color: #$color;padding-right: 12px'><input type='checkbox' name='id' value='$id' onclick='valider($cpt)'>" . $row["prenom"] .  "</span>";
            }
        }

        $cpt += 1;

        $affi.="</form><form id='sub$cpt' action='hub.php'><a onclick='valider($cpt)' style='cursor: pointer;'><img src='img/Reset-icon.png'></a></form></tr></table>";

        $cpt +=1;

        $affi.="<br/>";

        $cpt +=1;

        $id = $_SESSION["id"];

        $sql = "SELECT sutache.*, sutuser.*, suuser.*, count(sutuser.idTache) as nb FROM sutache,sutuser,suuser where suuser.idUser = '$id' and suuser.idUser = sutuser.idUser and sutuser.idTache = sutache.idTache GROUP by sutuser.idTache ORDER by $order, priorite DESC";
        $sql2 = "SELECT sutache.*, sutuser.*, suuser.*, count(sutuser.idTache) as nb FROM sutache,sutuser,suuser where sutache.idTache = sutuser.idTache and suuser.idUser=sutuser.idUser and suuser.idUser <> '$id' GROUP by sutuser.idTache ORDER by $order, priorite DESC";

        $affi .=  "<table id='sousmenu1' style='display: table' class='ta'><tr>";

        $affi .= "<td style='max-width: 45px'><form action='hub2.php' method='post' id='sub$cpt'><input type='text' name='orderD' value='sutache.idTache' hidden><a onclick='valider($cpt)' style='cursor: pointer; cursor: hand'>Num</a></form></td>";
        $cpt += 1;
        $affi .= "<td style='text-align: center; width: 400px'><form action='hub2.php' method='post' id='sub$cpt'><input type='text' name='orderD' value='sutache.nomTache' hidden><a onclick='valider($cpt)' style='cursor: pointer; cursor: hand'>Tâches</a></form></td>";
        $cpt += 1;
        $affi .= "<td style='text-align: center; '><form action='hub2.php' method='post' id='sub$cpt'><input type='text' name='orderD' value='idDemandeur' hidden><a onclick='valider($cpt)' style='cursor: pointer; cursor: hand'>Demandeur</a></form></td>";
        $cpt += 1;
        $affi .= "<td style='text-align: center; width: 80px'>Qui</td>";
        $cpt += 1;
        $affi .= "<td style='text-align: center; width: 80px'>BD</td>";
        $cpt += 1;
        $affi .= "<td style='width: 80px; text-align: center'><form action='hub2.php' method='post' id='sub$cpt'><input type='text' name='orderD' value='sutache.dateCreation' hidden><a onclick='valider($cpt)' style='cursor: pointer; cursor: hand'>Début</a></form></td>";
        $cpt += 1;
        $affi .= "<td style='width: 80px; text-align: center'><form action='hub2.php' method='post' id='sub$cpt'><input type='text' name='orderD' value='sutache.deadline' hidden><a onclick='valider($cpt)' style='cursor: pointer; cursor: hand'>Statut</a></form></td>";
        $cpt += 1;
        $affi .= "<td style='width: 80px; text-align: center'><form action='hub2.php' method='post' id='sub$cpt'><input type='text' name='orderD' value='sutache.dateSuppr' hidden><a onclick='valider($cpt)' style='cursor: pointer; cursor: hand'>Fin</a></form></td>";
        $affi .= "<td style='text-align: center; '>Validation</td>";
        $affi .= "<td style='text-align: center; '>Actions</td>";


    }else {
        if (isset($_POST["orderD"])) {
            $orderD = $_POST["orderD"];

            $sql = "SELECT sutache.*, sutuser.*, suuser.*, count(sutuser.idTache) as nb FROM sutache,sutuser,suuser where suuser.idUser = sutuser.idUser and sutuser.idTache = sutache.idTache and suuser.idUser = '$id' group by sutuser.idTache ORDER by $orderD DESC, priorite DESC";
            $sql2 = "SELECT sutache.*, sutuser.*, suuser.*, count(sutuser.idTache) as nb FROM sutache,sutuser,suuser where suuser.idUser = sutuser.idUser and sutuser.idTache = sutache.idTache and suuser.idUser <> '$id' group by sutuser.idTache ORDER by $orderD DESC, priorite DESC";

        }
    }
}

echo $affi;

echo "</tr>";

$cpt += 1;

$result = query($sql);
$memory = array();
while ($row = mysqli_fetch_assoc($result)){

    $memory[] = $row["idTache"];
    if(($row["suppr"]==="non"&&$row["archive"]==="non") && (strtotime($row["dateFin"]) > time() || strtotime($row["dateFin"])<0 || strtotime($row["dateFin"])===false)) {

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

    if($row["suppr"]==="non" && $row["archive"]==="non" && !in_array($row["idTache"],$memory)) {

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

echo "<br/>";
echo "<div>";
echo "<table class='ta' style='border: none'>";
echo "<td style='border: none'><form method='post' action='pdf.php' id='sub$cpt'><input type='text' name='order' value='$order' hidden><input type='text' name='orderD' value='$orderD' hidden><a style=' cursor: pointer' onclick='valider($cpt)'><img src='img/Download-icon.png' alt='Submit'>Imprimer en PDF</a></form></td><td style='border: none'>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</td><td style='border: none'><a href=\"archive.php\"><img src='img/Folder-Archive-icon.png' alt='' title='Archiver'/>Archiver</a>&emsp;&emsp;<a style='cursor: pointer' href='tacheArchi.php'><img src=\"img/Programming-Show-Property-icon.png\" alt='Submit' title='Voir les tâches archivées'/>Voir les tâches archivées</a></td>";
echo "</table>";
echo "</div>";
?>


<br/>
<br/>
</body>
</html>
