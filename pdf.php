<?php
/**
 * Created by PhpStorm.
 * User: Sullivan Honnet
 * Date: 31/05/2019
 * Time: 14:47
 *
 * Création du pdf contenant toute les tâches non archivées ou supprimées
 */



session_start();

if(empty($_SESSION["login"])){
    header("Refresh:0;URL=login.php");
}else {
    include("database.php");
    include("fcPDF.php");


    require("vendor/autoload.php");

    $pdf = new \Mpdf\Mpdf();

    $pdf->AddPage();

    $id = $_SESSION["id"];

    if (isset($_POST["id"])) {
        $id = $_POST["id"];
    }

    $sql = "SELECT * FROM sutache,sutuser,suuser where suuser.idUser = sutuser.idUser and sutuser.idTache = sutache.idTache and suuser.idUser = '$id' GROUP by sutuser.idTache order by dateSuppr, priorite DESC, dateCreation DESC, deadline, sutache.idTache";

    $sql2 = "SELECT * FROM sutache,sutuser,suuser where sutache.idTache = sutuser.idTache and suuser.idUser=sutuser.idUser and suuser.idUser <> '$id' GROUP by sutuser.idTache order by dateSuppr, priorite DESC, dateCreation, deadline, sutache.idTache";

    if (isset($_POST["order"]) && $_POST["order"] !== "") {
        $order = $_POST["order"];
        $id = $_SESSION["id"];

        $sql = "SELECT sutache.*, sutuser.*, suuser.*, count(sutuser.idTache) as nb FROM sutache,sutuser,suuser where suuser.idUser = '$id' and suuser.idUser = sutuser.idUser and sutuser.idTache = sutache.idTache GROUP by sutuser.idTache ORDER by $order, priorite DESC";
        $sql2 = "SELECT sutache.*, sutuser.*, suuser.*, count(sutuser.idTache) as nb FROM sutache,sutuser,suuser where sutache.idTache = sutuser.idTache and suuser.idUser=sutuser.idUser and suuser.idUser <> '$id' GROUP by sutuser.idTache ORDER by $order, priorite DESC";
    } else {
        if (isset($_POST["orderD"]) && $_POST["orderD"] !== "") {
            $orderD = $_POST["orderD"];
            $sql = "SELECT sutache.*, sutuser.*, suuser.*, count(sutuser.idTache) as nb FROM sutache,sutuser,suuser where suuser.idUser = sutuser.idUser and sutuser.idTache = sutache.idTache and suuser.idUser = '$id' group by sutuser.idTache ORDER by $orderD DESC, priorite DESC";
            $sql2 = "SELECT sutache.*, sutuser.*, suuser.*, count(sutuser.idTache) as nb FROM sutache,sutuser,suuser where suuser.idUser = sutuser.idUser and sutuser.idTache = sutache.idTache and suuser.idUser <> '$id' group by sutuser.idTache ORDER by $orderD DESC, priorite DESC";

        }
    }
    $result = query($sql);

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
        .download.icon {
            color: #000;
            position: relative;
            margin-left: 3px;
            margin-top: 12px;
            width: 13px;
            height: 4px;
            border-radius: 1px;
            border: solid 1px currentColor;
            border-top: none;
        }

        .download.icon:before {
            content: '';
            position: relative;
            left: 6px;
            top: -9px;
            width: 1px;
            height: 10px;
            background-color: currentColor;
        }

        .download.icon:after {
            content: '';
            position: relative;
            left: 4px;
            top: -4px;
            width: 4px;
            height: 4px;
            border-top: solid 1px currentColor;
            border-right: solid 1px currentColor;
            -webkit-transform: rotate(135deg);
            transform: rotate(135deg);
        }
        .check.icon {
            color: #000;
            position: relative;
            margin-left: 2px;
            margin-top: 2px;
            width: 10px;
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
            width: 10px;
            height: 5px;
            border-bottom: solid 1px currentColor;
            border-left: solid 1px currentColor;
            -webkit-transform: rotate(-45deg);
            transform: rotate(-45deg);
        }
    </style>
</head>
<body style=\"font-family: Trebuchet,Trebuchet MS,Arial,Helvetica,Sans-serif;\">";

    $affi .= "<h2>Liste des tâches</h2>";
    $affi .= "<table style='display: table;' class='ta'>";
    $affi .= "<tr><td style='max-width: 45px'>Num</td>";
    $affi .= "<td style='text-align: center; width: 300px'>Tâches</td>";
    $affi .= "<td>Demandeur</td>";
    $affi .= "<td style='text-align: center; width: 80px'>Qui</td>";
    $affi .= "<td style='text-align: center; width: 80px'>BD</td>";
    $affi .= "<td style='width: 80px; text-align: center'>Début</td>";
    $affi .= "<td style='width: 80px; text-align: center'>Deadline</td>";
    $affi .= "<td style='width: 80px; text-align: center'>Fin</td>";
    $affi .= "<td>Validé</td>";

    $affi .= "</tr>";
    $memory = array();
    while ($row = mysqli_fetch_assoc($result)) {

        $memory[] = $row["idTache"];
        if (($row["suppr"] === "non" && $row["archive"] === "non") && (strtotime($row["dateFin"]) > time() || strtotime($row["dateFin"]) < 0 || strtotime($row["dateFin"]) === false)) {

            if (isset($row["dateSuppr"]) && substr($row["dateSuppr"], 0, 10) !== "0000-00-00" && $row["adminC"] == 1) {

                $affi .= affiTfPDF($row);
            } else {

                $affi .= affiTnfPDF($row);
            }
        }

    }

    $result = query($sql2);

    while ($row = mysqli_fetch_assoc($result)) {

        if ($row["suppr"] === "non" && $row["archive"] === "non" && !in_array($row["idTache"], $memory)) {

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

    $pdf->Output();
}
