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
<body style="font-family: Trebuchet,Trebuchet MS,Arial,Helvetica,Sans-serif;">

<?php
/**
 * Created by PhpStorm.
 * User: Sullivan Honnet
 * Date: 24/05/2019
 * Time: 14:47
 *
 *Il s'agit du hub récapitulatif des tâches sans ordonnance par utilisateur
 */



session_start();

if(empty($_SESSION["login"])){
    header("Refresh:0;URL=login.php");
}else {
    include("database.php");
    include("fcAffi.php");


    $id = $_SESSION["id"];
    $_SESSION["last"] = "hub.php";

    echo "<div style='width: 1002px; text-align: left; height: 100%; z-index: 0; position: relative; padding: 0px;margin: 0 auto;'>";

    echo "<a style='float:left' href='login.php'><img src=\"img/inside-logout-icon.png\">logout</a>";

    echo "<a style='float:right' href='ajouterTache.php'><img src=\"img/add.png\">Ajouter une tâche</a><br/>";

    if ($_SESSION["admin"] >= "1") {
        echo "<br/><a style='float:right' href='utilisateur.php'><img src=\"img/Programming-Show-Property-icon.png\">Gestion des utilisateurs</a>";
        echo "<a style='float: bottom' href='backup.php'><img src=\"img/Data-Database-Backup-icon.png\">Backup</a>";
    }

    $cpt = 0;

    echo "<div id='pageContent' style='padding-top: 24px; padding-left: 25px; padding-right: 25px; padding-bottom: 18px;'>";


    $order = "";
    $orderD = "";

    $affi = "<h2 id='menu1' onclick='afficheMenu(this)'><a style='cursor: pointer;'>Liste des tâches</a></h2>";

    $sql = "SELECT DISTINCT nom,prenom,idUser,color,dateFin FROM suuser order by nom,prenom";

    $res = query($sql);

    $affi .= "<table><tr><form action='hub2.php' method='post' id='sub$cpt'>";


    while ($row = mysqli_fetch_assoc($res)) {
        if ((strtotime($row["dateFin"]) > time() || strtotime($row["dateFin"]) < 0 || strtotime($row["dateFin"]) === false)) {
            $color = $row["color"];
            $id = $row["idUser"];
            $affi .= "<span style='color: #$color;padding-right: 12px'><input type='checkbox' name='id' value='$id' onclick='valider($cpt)' >" . $row["prenom"] . "</span>";
        }
    }
    $cpt += 1;

    $affi .= "</form><form id='sub$cpt' action='hub.php'><input type='image' src='img/Reset-icon.png' alt='Submit'></a></form></tr></table>";

    $cpt += 1;

    $affi .= "<br/>";

    $cpt += 1;

    $sql = "SELECT sutache.*, sutuser.*, suuser.*, count(sutuser.idTache) as nb FROM sutache,sutuser,suuser where suuser.idUser = sutuser.idUser and sutuser.idTache = sutache.idTache GROUP by sutuser.idTache order by dateSuppr, priorite DESC, dateCreation DESC, deadline, sutache.idTache DESC";


    $affi .= "<table id='sousmenu1' style='display: table' class='ta'><tr>";
    $affi .= "<td style='max-width: 45px'><form method='post' id='sub$cpt'><input type='text' name='order' value='sutache.idTache' hidden><a onclick='valider($cpt)' style='cursor: pointer; cursor: hand'>Num</a></form></td>";
    $cpt += 1;
    $affi .= "<td style='text-align: center; width: 400px'><form method='post' id='sub$cpt'><input type='text' name='order' value='sutache.nomTache' hidden><a onclick='valider($cpt)' style='cursor: pointer; cursor: hand'>Tâches</a></form></td>";
    $cpt += 1;
    $affi .= "<td style='text-align: center; '><form method='post' id='sub$cpt'><input type='text' name='order' value='idDemandeur' hidden><a onclick='valider($cpt)' style='cursor: pointer; cursor: hand'>Demandeur</a></form></td>";
    $cpt += 1;
    $affi .= "<td style='text-align: center; width: 80px'>Qui</td>";
    $cpt += 1;
    $affi .= "<td style='width: 80px; text-align: center'>BD</td>";
    $cpt += 1;
    $affi .= "<td style='width: 80px; text-align: center'><form method='post' id='sub$cpt'><input type='text' name='order' value='sutache.dateCreation' hidden><a onclick='valider($cpt)' style='cursor: pointer; cursor: hand'>Début</a></form></td>";
    $cpt += 1;
    $affi .= "<td style='width: 80px; text-align: center'><form method='post' id='sub$cpt'><input type='text' name='order' value='sutache.deadline' hidden><a onclick='valider($cpt)' style='cursor: pointer; cursor: hand'>Statut</a></form></td>";
    $cpt += 1;
    $affi .= "<td style='width: 80px; text-align: center'><form method='post' id='sub$cpt'><input type='text' name='order' value='sutache.dateSuppr' hidden><a onclick='valider($cpt)' style='cursor: pointer; cursor: hand'>Fin</a></form></td>";
    $affi .= "<td style='text-align: center; '>Validation</td>";
    $affi .= "<td style='text-align: center; '>Actions</td>";


//Si on souhaite ordonner la liste selon une des colonnes 
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (isset($_POST["order"])) {
            $order = $_POST["order"];

            $affi = "<h2 id='menu1' onclick='afficheMenu(this)'><a style='cursor: pointer;'>Liste des tâches</a></h2>";

            $sql = "SELECT DISTINCT nom,prenom,idUser,color,dateFin FROM suuser order by nom,prenom";

            $res = query($sql);

            $affi .= "<table><tr><form action='hub2.php' method='post' id='sub$cpt'>";

            while ($row = mysqli_fetch_assoc($res)) {
                if ((strtotime($row["dateFin"]) > time() || strtotime($row["dateFin"]) < 0 || strtotime($row["dateFin"]) === false)) {
                    $color = $row["color"];
                    $id = $row["idUser"];
                    $affi .= "<span style='color: #$color;padding-right: 12px'><input type='checkbox' name='id' value='$id' onclick='valider($cpt)'>" . $row["prenom"] . "</span>";
                }
            }

            $cpt += 1;

            $affi .= "</form><form id='sub$cpt' action='hub.php'><a onclick='valider($cpt)' style='cursor: pointer'><img src='img/Reset-icon.png'></a></form></tr></table>";

            $cpt += 1;

            $affi .= "<br/>";

            $sql = "SELECT sutache.*, sutuser.*, suuser.*, count(sutuser.idTache) as nb FROM sutache,sutuser,suuser where suuser.idUser = sutuser.idUser and sutuser.idTache = sutache.idTache group by sutuser.idTache ORDER by $order, priorite DESC";


            $cpt += 1;

            $affi .= "<table id='sousmenu1' style='display: table' class='ta'><tr>";

            $affi .= "<td style='max-width: 45px'><form method='post' id='sub$cpt'><input type='text' name='orderD' value='sutache.idTache' hidden><a onclick='valider($cpt)' style='cursor: pointer;'>Num</a></form></td>";
            $cpt += 1;
            $affi .= "<td style='text-align: center; width: 400px'><form method='post' id='sub$cpt'><input type='text' name='orderD' value='sutache.nomTache' hidden><a onclick='valider($cpt)' style='cursor: pointer;'>Tâches</a></form></td>";
            $cpt += 1;
            $affi .= "<td style='text-align: center; '><form method='post' id='sub$cpt'><input type='text' name='orderD' value='idDemandeur' hidden><a onclick='valider($cpt)' style='cursor: pointer; '>Demandeur</a></form></td>";
            $cpt += 1;
            $affi .= "<td style='text-align: center; width: 80px'>Qui</td>";
            $cpt += 1;
            $affi .= "<td style='text-align: center; width: 80px'>BD</td>";
            $cpt += 1;
            $affi .= "<td style='width: 80px; text-align: center'><form method='post' id='sub$cpt'><input type='text' name='orderD' value='sutache.dateCreation' hidden><a onclick='valider($cpt)' style='cursor: pointer; '>Début</a></form></td>";
            $cpt += 1;
            $affi .= "<td style='width: 80px; text-align: center'><form method='post' id='sub$cpt'><input type='text' name='orderD' value='sutache.deadline' hidden><a onclick='valider($cpt)' style='cursor: pointer; '>Statut</a></form></td>";
            $cpt += 1;
            $affi .= "<td style='width: 80px; text-align: center'><form method='post' id='sub$cpt'><input type='text' name='orderD' value='sutache.dateSuppr' hidden><a onclick='valider($cpt)' style='cursor: pointer; '>Fin</a></form></td>";
            $affi .= "<td style='text-align: center; '>Validation</td>";
            $affi .= "<td style='text-align: center; '>Actions</td>";


        } else {
            if (isset($_POST["orderD"])) {
                $orderD = $_POST["orderD"];
                $sql = "SELECT sutache.*, sutuser.*, suuser.*, count(sutuser.idTache) as nb FROM sutache,sutuser,suuser where suuser.idUser = sutuser.idUser and sutuser.idTache = sutache.idTache group by sutuser.idTache ORDER by $orderD DESC";
            }
        }
    }

    echo $affi;

    echo "</tr>";

    $cpt += 1;

    $result = query($sql);

    while ($row = mysqli_fetch_assoc($result)) {

        if (($row["suppr"] === "non" && $row["archive"] === "non") && (strtotime($row["dateFin"]) > time() || strtotime($row["dateFin"]) < 0 || strtotime($row["dateFin"]) === false)) {

            if (isset($row["dateSuppr"]) && substr($row["dateSuppr"], 0, 10) !== "0000-00-00" && $row["adminC"] == 1) {

                echo affiTf($row, $cpt);
            } else {

                echo affiTnf($row, $cpt);
            }
            $cpt += 1;
        }

    }

    echo "</table>";

    echo "</div>";
    echo "<br/>";
    echo "<div>";
    echo "<table class='ta' style='border: none'>";
    echo "<td style='border: none'><form method='post' target='_blank' action='pdf.php' id='sub$cpt'><input type='text' name='order' value='$order' hidden><input type='text' name='orderD' value='$orderD' hidden><a style=' cursor: pointer' onclick='valider($cpt)'><img src='img/Download-icon.png' alt='Submit'>Version PDF</a></form></td>";
    $cpt++;
    echo "<td style='border: none'><form method='post' target='_blank' action='reunion.php' id='sub$cpt'><a style=' cursor: pointer' onclick='valider($cpt)'><img src='img/Download-icon.png' alt='Submit'>Réunion</a></form></td>";
    echo "<td style='border: none'>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</td>";
    echo "<td style='border: none;'><a href=\"affiSuppr.php\"><img src=\"img/zoom-search-2-icon.png\" alt=\"\" title=\"Voir les tâches supprimées\">Tâches supprimées</a></td>";
    echo "<td style='border: none'>&emsp;&emsp;</td>";
    echo "<td style='border: none'><a href=\"archive.php\"><img src='img/Folder-Archive-icon.png' alt='' title='Archiver'/>Archiver</a>&emsp;&emsp;<a style='cursor: pointer' href='tacheArchi.php'><img src=\"img/Programming-Show-Property-icon.png\" alt='Submit' title='Voir les tâches archivées'/>Tâches archivées</a></td>";
    echo "</table>";
    echo "</div>";

    echo "<br/>";
    echo "<br/>";

}

?>


</body>
</html>
