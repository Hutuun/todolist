<?php
/**
 * Created by PhpStorm.
 * User: Sullivan Honnet
 * Date: 24/07/2019
 * Time: 15:38
 *
 * Programme qui affiche les réunions
 */

session_start();

if(empty($_SESSION["login"])){
    header("Refresh:0;URL=login.php");
}else{

    include ("database.php");
    require ("vendor/autoload.php");

    $pdf = new Mpdf\Mpdf();
    $pdf->AddPage('L');

    $code = "<!DOCTYPE html>
    <html lang=\"fr\">
    <head>
        <meta charset=\"UTF-8\">
        <script src=\"js/function.js\" type=\"text/javascript\"></script>
        <title>Todo</title>
        <style>
            table.ta,td{
            border: 1px solid black;
            border-collapse: collapse;
        }
        </style>
    </head>
    <body style=\"font-family: Trebuchet,Trebuchet MS,Arial,Helvetica,Sans-serif;\">";


    $sql = "SELECT * FROM sutache WHERE idTache IN (SELECT idTache FROM sutbd WHERE idBD = 'bd10')";

    $res = query($sql);

    $code .= "<table class='ta'>
                <tr>
                    <td style='text-align: center;width: 200px'>Quoi</td>
                    <td style='text-align: center;width: 150px'>Jour</td>
                    <td style='text-align: center;width: 150px'>Heure</td>
                    <td style='text-align: center;width: 150px'>Où</td>
                    <td style='text-align: center;width: 250px'>Description</td>
                </tr>";

    while($row = mysqli_fetch_assoc($res)){
        $code .= "<tr>
                    <td style='text-align: center;'>$row[nomTache]</td>
                    <td style='text-align: center;'>$row[deadline]</td>
                    <td style='text-align: center;'>$row[heure]</td>
                    <td style='text-align: center;'>$row[ou]</td>
                    <td style='text-align: center;'>$row[descriptionTache]</td>
                  </tr>";
    }

    $code .= "</table>";
    $pdf->WriteHTML($code);

    $pdf->Output();




}