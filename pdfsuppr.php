<?php
/**
 * Created by PhpStorm.
 * User: Lauriane
 * Date: 9/07/2019
 * Time: 14:28
 * pdf des tâches supprimées
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

    $sql = "SELECT sutache.*, sutuser.*, suuser.*, count(sutuser.idTache) as nb FROM sutache,sutuser,suuser where suuser.idUser = sutuser.idUser and sutuser.idTache = sutache.idTache GROUP by sutuser.idTache order by dateSuppr, priorite DESC, dateCreation";

    if (isset($_POST["order"]) && $_POST["order"] !== "") {
        $order = $_POST["order"];
        $sql = "SELECT sutache.*, sutuser.*, suuser.*, count(sutuser.idTache) as nb FROM sutache,sutuser,suuser where suuser.idUser = sutuser.idUser and sutuser.idTache = sutache.idTache group by sutuser.idTache ORDER by $order, priorite DESC";
    } else {
        if (isset($_POST["orderD"]) && $_POST["orderD"] !== "") {
            $orderD = $_POST["orderD"];
            $sql = "SELECT sutache.*, sutuser.*, suuser.*, count(sutuser.idTache) as nb FROM sutache,sutuser,suuser where suuser.idUser = sutuser.idUser and sutuser.idTache = sutache.idTache group by sutuser.idTache ORDER by $orderD DESC";

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
    </style>
</head>
<body style=\"font-family: Trebuchet,Trebuchet MS,Arial,Helvetica,Sans-serif;\">";

    $affi .= "<h2>Liste des tâches archivées</h2>";
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

    while ($row = mysqli_fetch_assoc($result)) {

        if (($row["suppr"] === "oui" && $row["archive"] === "non")) {

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