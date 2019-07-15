<?php
/**
 * Created by PhpStorm.
 * User: Lauriane
 * Date: 9/07/2019
 * Time: 14:03
 *
 * Hub contenant les tâches supprimées
 */

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <script src="js/function.js" type="text/javascript"></script>
    <style>
        table.ta,td{
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>
<body style="font-family: Trebuchet,Trebuchet MS,Arial,Helvetica,Sans-serif;">

<?php

session_start();

if(empty($_SESSION["login"])){
    header("Refresh:0;URL=login.php");
}else {
    include("database.php");
    include("fcAffi.php");

    $id = $_SESSION["id"];

    echo "<div style='width: 1002px; text-align: left; height: 100%; z-index: 0; position: relative; padding: 0px;margin: 0 auto;'>";

    echo "<a style='float:left' href='login.php'><img src=\"img/inside-logout-icon.png\">logout</a>";

    echo "<a style='float:right' href='ajouterTache.php'><img src=\"img/add.png\">Ajouter une tâche</a><br>";

    if ($_SESSION["admin"] >= "1") {

        echo "<br><a style='float:right' href='utilisateur.php'><img src=\"img/Programming-Show-Property-icon.png\">Gestion des utilisateurs</a>";
        echo "<a style='float: bottom' href='backup.php'><img src=\"img/Data-Database-Backup-icon.png\">Backup</a>";

    }

    $cpt = 0;

    echo "<div id='pageContent' style='padding-top: 24px; padding-left: 25px; padding-right: 25px; padding-bottom: 18px;'>";


    $sql = "SELECT sutache.*, sutuser.*, suuser.*, count(sutuser.idTache) as nb FROM sutache,sutuser,suuser where suuser.idUser = sutuser.idUser and sutuser.idTache = sutache.idTache GROUP by sutuser.idTache order by  sutache.idTache, dateSuppr, priorite DESC, dateCreation";

    $order = "";
    $orderD = "";

    $affi = "<h2 id='menu1' onclick='afficheMenu(this)'><a style='cursor: pointer; cursor: hand'>Liste des tâches supprimées</a></h2>";
    $affi .= "<table id='sousmenu1' style='display: table' class='ta'><tr>";
    $affi .= "<td style='max-width: 45px'><form method='post' id='sub$cpt'><input type='text' name='order' value='sutache.idTache' hidden><a onclick='valider($cpt)' style='cursor: pointer;'>Num</a></form></td>";
    $cpt += 1;
    $affi .= "<td style='text-align: center; width: 400px''><form method='post' id='sub$cpt'><input type='text' name='order' value='sutache.nomTache' hidden><a onclick='valider($cpt)' style='cursor: pointer;'>Tâches</a></form></td>";
    $cpt += 1;
    $affi .= "<td style='text-align: center; '><form method='post' id='sub$cpt'><input type='text' name='order' value='idDemandeur' hidden><a onclick='valider($cpt)' style='cursor: pointer;'>Demandeur</a></form></td>";
    $cpt += 1;
    $affi .= "<td style='text-align: center; width: 80px'>Qui</td>";
    $cpt += 1;
    $affi .= "<td style='text-align: center; width: 80px'>BD</td>";
    $cpt += 1;
    $affi .= "<td style='text-align: center; width: 80px '><form method='post' id='sub$cpt'><input type='text' name='order' value='sutache.dateCreation' hidden><a onclick='valider($cpt)' style='cursor: pointer;'>Début</a></form></td>";
    $cpt += 1;
    $affi .= "<td style='text-align: center; width: 80px '><form method='post' id='sub$cpt'><input type='text' name='order' value='sutache.deadline' hidden><a onclick='valider($cpt)' style='cursor: pointer; '>Statut</a></form></td>";
    $cpt += 1;
    $affi .= "<td style='text-align: center; width: 80px '><form method='post' id='sub$cpt'><input type='text' name='order' value='sutache.dateSuppr' hidden><a onclick='valider($cpt)' style='cursor: pointer; '>Fin</a></form></td>";
    $affi .= "<td style='text-align: center; '>Actions</td>";

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (isset($_POST["order"])) {
            $order = $_POST["order"];
            $sql = "SELECT sutache.*, sutuser.*, suuser.*, count(sutuser.idTache) as nb FROM sutache,sutuser,suuser where suuser.idUser = sutuser.idUser and sutuser.idTache = sutache.idTache group by sutuser.idTache ORDER by $order, priorite DESC";

            $affi = "<h2 id='menu1' onclick='afficheMenu(this)'><a style='cursor: pointer;'>Liste des tâches supprimées</a></h2>";
            $affi .= "<table id='sousmenu1' style='display: table' class='ta'><tr>";

            $affi .= "<td style='max-width: 45px'><form method='post' id='sub$cpt'><input type='text' name='orderD' value='sutache.idTache' hidden><a onclick='valider($cpt)' style='cursor: pointer;'>Num</a></form></td>";
            $cpt += 1;
            $affi .= "<td style='text-align: center; width: 400px'><form method='post' id='sub$cpt'><input type='text' name='orderD' value='sutache.nomTache' hidden><a onclick='valider($cpt)' style='cursor: pointer;'>Tâche</a></form></td>";
            $cpt += 1;
            $affi .= "<td style='text-align: center; '><form method='post' id='sub$cpt'><input type='text' name='orderD' value='idDemandeur' hidden><a onclick='valider($cpt)' style='cursor: pointer;'>Demandeur</a></form></td>";
            $cpt += 1;
            $affi .= "<td style='text-align: center; width: 80px'>Qui</td>";
            $cpt += 1;
            $affi .= "<td style='text-align: center; width: 80px'>BD</td>";
            $cpt += 1;
            $affi .= "<td style='text-align: center; width: 80px '><form method='post' id='sub$cpt'><input type='text' name='orderD' value='sutache.dateCreation' hidden><a onclick='valider($cpt)' style='cursor: pointer;'>Début</a></form></td>";
            $cpt += 1;
            $affi .= "<td style='text-align: center; width: 80px '><form method='post' id='sub$cpt'><input type='text' name='orderD' value='sutache.deadline' hidden><a onclick='valider($cpt)' style='cursor: pointer;'>Statut</a></form></td>";
            $cpt += 1;
            $affi .= "<td style='text-align: center; width: 80px '><form method='post' id='sub$cpt'><input type='text' name='orderD' value='sutache.dateSuppr' hidden><a onclick='valider($cpt)' style='cursor: pointer; '>Fin</a></form></td>";
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

        if ($row["archive"] === "non" && $row["suppr"] === "oui") {


            echo affSuppr($row, $cpt);

        }

    }

    $cpt += 1;

?>
</table>

</div>

<br/>
<table class='ta' style='border: none'>

    <td style='border: none'><a href="hub2.php" "><img src="img/arrow-back-icon.png" alt=""/>Retour</a></td>
    <td style='border: none'>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</td>

        <?php
        echo "<td style='border: none'><form method='post' action='pdfsuppr.php' id='sub$cpt'><input type='text' name='order' value='$order' hidden><input type='text' name='orderD' value='$orderD' hidden><a style='cursor: pointer' onclick='valider($cpt)'><img src='img/Download-icon.png' alt='Submit'>Version PDF des tâches supprimées</a></form></td>";
        }
?>

</table>
<br/>

</body>
</html>