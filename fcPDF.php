<?php
/**
 * Created by PhpStorm.
 * User: Sullivan Honnet
 * Date: 4/06/2019
 * Time: 10:53
 */




function affiTnfPDF($row,&$cpt){
    $color = "#000000";
    if($row["priorite"]==1){
        $color = "#cca300";
    }
    if ($row["priorite"]==2){
        $color ="#ff0000";
    }
    $str = "<tr><td style='text-align: center'>".$row["idTache"]."</td>";
    $str .= "<td style='color: $color; padding-left: 4px; padding-right: 4px'>".$row["nomTache"]."</td>";
    $cpt+=1;
    $sql = "SELECT nom, prenom, idUser,color From suuser, sutache where idDemandeur ='" . $row["idDemandeur"] . "' and suuser.idUser=sutache.idDemandeur";
    $res = query($sql);

    $field = mysqli_fetch_assoc($res);

    $color = "#".$field["color"];

    $str .= "<td style='color: $color; text-align: center'>" .strtoupper(substr($field["prenom"],0,1)).strtoupper(substr($field["nom"],0,1)). "</td>";


    $str .= "<td>".personPDF($row["idTache"],$row["idDemandeur"])."</td>";
    $str .= "<td>".bdPDF($row["idTache"])."</td>";
    $date = $row["dateCreation"];
    $ymd = substr($date, 0, 10);
    $date = date("d/m", strtotime($ymd));
    $str .= "<td style='text-align: center'>" . $date . "</td>";
    if(isset($row["deadline"]) && substr($row["deadline"],0,10)!=="0000-00-00") {
        $date = $row["deadline"];
        $ymd = substr($date, 0, 10);
        $date = date("d/m", strtotime($ymd));
        $str .= "<td style='text-align: center'>" . $date . "</td>";
    }else {
        $str .= "<td></td>";
    }
    if(isset($row["dateSuppr"]) && substr($row["dateSuppr"],0,10)!=="0000-00-00") {
        $date = $row["dateSuppr"];
        $ymd = substr($date, 0, 10);
        $date = date("d/m", strtotime($ymd));
        $str .= "<td style='text-align: center'>" . $date . "</td>";
    }else{
        $str .= "<td></td>";
    }


    $str .= "<td>".validPDF($row["idTache"],$row["idDemandeur"],$cpt,$b)."</td>";


    return $str;

}

function affiTfPDF($row,&$cpt){

    $color = '#000000';
    if($row["priorite"]==1){
        $color = '#cca300';
    }
    if ($row["priorite"]==2){
        $color ='#ff0000';
    }
    $str = "<tr style='background-color: lightgray'><td style='text-align: center'>".$row["idTache"]."</td>";
    $str .= "<td style='color: $color; padding-left: 4px; padding-right: 4px'>".$row["nomTache"]."</td>";
    $cpt += 1;

    $sql = "SELECT nom, prenom, idUser,color From suuser, sutache where idDemandeur ='" . $row["idDemandeur"] . "' and suuser.idUser=sutache.idDemandeur";
    $res = query($sql);

    $field = mysqli_fetch_assoc($res);

    $color = "#".$field["color"];

    $str .= "<td style='color: $color; text-align: center'>" .strtoupper(substr($field["prenom"],0,1)).strtoupper(substr($field["nom"],0,1)). "</td>";


    $str .= "<td>".personPDF($row["idTache"],$row["idDemandeur"])."</td>";
    $str .= "<td>".bdPDF($row["idTache"])."</td>";
    $date = $row["dateCreation"];
    $ymd = substr($date, 0, 10);
    $date = date("d/m", strtotime($ymd));
    $str .= "<td style='text-align: center'>" . $date . "</td>";
    if(isset($row["deadline"]) && substr($row["deadline"],0,10)!=="0000-00-00") {

        $date = $row["deadline"];
        $ymd = substr($date, 0, 10);
        $date = date("d/m", strtotime($ymd));
        $str .= "<td style='text-align: center'>" . $date . "</td>";
    }else {
        $str .= "<td></td>";
    }
    if(isset($row["dateSuppr"]) && substr($row["dateSuppr"],0,10)!=="0000-00-00") {
        $date = $row["dateSuppr"];
        $ymd = substr($date, 0, 10);
        $date = date("d/m", strtotime($ymd));
        $str .= "<td style='text-align: center'>" . $date . "</td>";
    }else{
        $str .= "<td></td>";
    }

    $str .= "<td>".validPDF($row["idTache"],$row["idDemandeur"],$cpt,$b)."</td>";


    return $str;
}




function personPDF($res,$idD){

    $str ="<ul>\n";

    $sql = "SELECT nom, prenom, color, checked FROM suuser,sutuser where sutuser.idTache='$res' and suuser.idUser=sutuser.idUser";

    $r = query($sql);


    while($row = mysqli_fetch_assoc($r)){

        $color = "#" . $row["color"];
        $str .= "<li style='color: $color;'>" . substr($row["prenom"], 0, 1) . substr($row["nom"], 0, 1) . "</li>";


    }
    $str .="</ul>";

    return $str;
}

function bdPDF($res){

    $str ="<ul style='page-break-inside: avoid'>";
    $sql ="SELECT diminutif,color FROM subd,sutbd WHERE sutbd.idTache='$res' and sutbd.idBD=subd.idBD";
    $r = query($sql);
    while ($row = mysqli_fetch_assoc($r)){

        $color = "#".$row["color"];
        $str .= "<li style='color: $color'>".$row["diminutif"]."</li>";
    }

    $str .="</ul>";

    return $str;
}


function validPDF($res,$idD,&$cpt,$b){


    $str ="<ul>\n";

    $sql = "SELECT nom, prenom, color, adminC FROM suuser,sutuser where suuser.idUser = '$idD' and idTache='$res'";

    $r = query($sql);

    $row = mysqli_fetch_assoc($r);
    if($row["adminC"]==1 ) {
        $color = "#" . $row["color"];


        $str .= "<li style='color: $color;padding: 2px; border: none'>
            
            <div class='check icon2' style='color: $color'>
            </div>
           
            </li>
            ";
        $cpt += 1;

        $sql = "SELECT suuser.idUser,nom, prenom, color, checked, adminC FROM suuser,sutuser where sutuser.idTache='$res' and suuser.idUser=sutuser.idUser";

        $r = query($sql);

        while($row = mysqli_fetch_assoc($r)){
            if($_SESSION["id"]===$row["idUser"] ) {


                if ($row["checked"] == 0 && $row["adminC"] == 0) {

                    $color = "#" . $row["color"];
                    $str .= "<li style='color: $color; padding: 3px ; border: none'>
                 
                    <div class='check icon2' style='color: $color'>
                    </div>
                   
                    </li>";


                    $cpt += 1;
                } else {
                    if ($row["checked"] == 1 && $row["adminC"] == 1) {
                        $color = "#" . $row["color"];
                        $str .= "<li style='color: $color; padding: 3px ; border: none'>
        
                        <div class='check icon' style='color: $color'>
                        </div>
                     
                        </li>";
                    }
                    else{

                    }
                }
            }else{
                if ($row["checked"] == 1) {
                    $color = "#" . $row["color"];
                    $str .= "<li style='color: $color; padding: 3px ; border: none'><div class='check icon' style='color: $color'></li>";
                }
            }


        }
    }else {
        $sql = "SELECT suuser.idUser,nom, prenom, color, checked, adminC FROM suuser,sutuser where sutuser.idTache='$res' and suuser.idUser=sutuser.idUser";

        $r = query($sql);

        while ($row = mysqli_fetch_assoc($r)) {
            if ($_SESSION["id"] === $row["idUser"]) {


                if ($row["checked"] == 0 && $row["adminC"] == 0) {


                } else {
                    if ($row["checked"] == 1) {
                        $color = "#" . $row["color"];
                        $str .= "<li style='color: $color; padding: 3px ; border: none'>

                    <div class='check icon' style='color: $color'>
                    </div>

                    </li>";
                    } else {

                    }
                }
            } else {
                if ($row["checked"] == 1) {
                    $color = "#" . $row["color"];
                    $str .= "<li style='color: $color; padding: 3px ; border: none'><div class='check icon' style='color: $color'></li>";
                }

            }


        }
    }

    $str .="</ul>";

    return $str;
}