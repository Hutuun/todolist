<?php
/**
 * Created by PhpStorm.
 * User: Sullivan
 * Date: 28/05/2019
 * Time: 08:04
 */

function affiTnf($row,&$cpt){
    $color = "#000000";
    if($row["priorite"]==1){
        $color = "#ffa900";
    }
    if ($row["priorite"]==2){
        $color ="#ff0000";
    }
    $str = "<tr><td style='text-align: center'>".$row["idTache"]."</td>";
    $str .= "<td style='color: $color; padding-left: 4px; padding-right: 4px'><form method='post' action='afficheTache.php' id='sub$cpt'><input name='idtache' type='text' value='".$row["idTache"]."' hidden><a onclick='valider($cpt)' style='cursor: pointer'>".$row["nomTache"]."</a></form></td>";
    $cpt+=1;
    $sql = "SELECT nom, prenom, idUser,color From suuser, sutache where idDemandeur ='" . $row["idDemandeur"] . "' and suuser.idUser=sutache.idDemandeur";
    $res = query($sql);

    $field = mysqli_fetch_assoc($res);

    $color = "#".$field["color"];

    $nom = $field["nom"];
    $prenom = $field["prenom"];

    $str .= "<td style='text-align: center'><span style='color: $color;'  title='$prenom $nom'>" .strtoupper(substr($field["prenom"],0,1)).strtoupper(substr($field["nom"],0,1)). "</span></td>";


    $str .= "<td style='text-align: center'>".person($row["idTache"])."</td>";
    $str .= "<td style='text-align: center'>".bd($row["idTache"])."</td>";
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

    $str .= "<td style='text-align: center'>".valid($row["idTache"],$row["idDemandeur"],$cpt)."</td>";

    if($row["idUser"]===$_SESSION["id"] || $_SESSION["id"]===$row["idDemandeur"] || $_SESSION["admin"]==2){
        $str.="<td style='text-align: center;'><form method='post' action='modifTache.php' id='sub$cpt'><input name='idtache' type='text' value='".$row["idTache"]."' hidden><a onclick='valider($cpt)' style='cursor: pointer'><img src=\"write-paper-ink-icon.png\"></a></form></td>";
        $cpt+=1;
    }else{
        $str.="<td></td>";
    }

    if(($_SESSION["id"]===$row["idDemandeur"] && $_SESSION["admin"]==1) || $_SESSION["admin"]==2) {
        $str .= "<td style='text-align: center'><form method='post' action='supprTache.php' id='sub$cpt'><input type='text' value='" . $row["idTache"] . "' name='idtache' hidden><a onclick='valider($cpt)' style='cursor: pointer;'><img alt='' src='delete.png'/></a></form></td></tr>";
        $cpt += 1;
    }else {
        if ($_SESSION["admin"] == 1) {
            $str .= "<td></td></tr>";
        }
    }
    return $str;

}


function affiTf($row,&$cpt){

    $color = '#000000';
    if($row["priorite"]==1){
        $color = '#ffa900';
    }
    if ($row["priorite"]==2){
        $color ='#ff0000';
    }
    $str = "<tr style='background-color: lightgray'><td style='text-align: center'>".$row["idTache"]."</td>";
    $str .= "<td style='color: $color; padding-left: 4px; padding-right: 4px'><form method='post' action='afficheTache.php' id='sub$cpt'><input name='idtache' type='text' value='".$row["idTache"]."' hidden><a onclick='valider($cpt)' style='cursor: pointer'>".$row["nomTache"]."</a></form></td>";
    $cpt += 1;

    $sql = "SELECT nom, prenom, idUser,color From suuser, sutache where idDemandeur ='" . $row["idDemandeur"] . "' and suuser.idUser=sutache.idDemandeur";
    $res = query($sql);

    $field = mysqli_fetch_assoc($res);

    $color = "#".$field["color"];

    $nom = $field["nom"];
    $prenom = $field["prenom"];


    $str .= "<td style=' text-align: center'><span style='color: $color;' title='$prenom $nom'>" .strtoupper(substr($field["prenom"],0,1)).strtoupper(substr($field["nom"],0,1)). "</span></td>";


    $str .= "<td style='text-align: center'>".person($row["idTache"])."</td>";
    $str .= "<td style='text-align: center'>".bd($row["idTache"])."</td>";
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

    $str .= "<td>".valid($row["idTache"],$row["idDemandeur"],$cpt)."</td>";


    if($row["idUser"]===$_SESSION["id"]||$_SESSION["id"]===$row["idDemandeur"] || $_SESSION["admin"]=="2"){
        $str.="<td style='text-align: center;'><form method='post' action='modifTache.php' id='sub$cpt'><input name='idtache' type='text' value='".$row["idTache"]."' hidden><a onclick='valider($cpt)' style='cursor: pointer'><img src=\"write-paper-ink-icon.png\"></a></form></td>";
        $cpt+=1;
    }else{
        $str.="<td></td>";
    }

    if(($_SESSION["id"]===$row["idDemandeur"] && $_SESSION["admin"]=="1") || $_SESSION["admin"]=="2") {
        $str .= "<td style='text-align: center;'><form method='post' action='supprTache.php' id='sub$cpt'><input type='text' value='" . $row["idTache"] . "' name='idtache' hidden><a onclick='valider($cpt)' style='cursor: pointer; cursor: hand;'><img src='delete.png'></a></form></td></tr>";
        $cpt +=1;
    }
    else {
        if ($_SESSION["admin"] == 1) {
            $str .= "<td></td></tr>";
        }
    }
    return $str;
}

function affSuppr($row,&$cpt){
    $color = "#000000";
    if($row["priorite"]==1){
        $color = "#ffa900";
    }
    if ($row["priorite"]==2){
        $color ="#ff0000";
    }
    $str = "<tr><td style='text-align: center'>".$row["idTache"]."</td>";
    $str .= "<td style='color: $color; padding-left: 4px; padding-right: 4px'><form method='post' action='afficheTache.php' id='sub$cpt'><input name='idtache' type='text' value='".$row["idTache"]."' hidden><a onclick='valider($cpt)' style='cursor: pointer'>".$row["nomTache"]."</a></form></td>";
    $cpt+=1;
    $sql = "SELECT nom, prenom, idUser,color From suuser, sutache where idDemandeur ='" . $row["idDemandeur"] . "' and suuser.idUser=sutache.idDemandeur";
    $res = query($sql);

    $field = mysqli_fetch_assoc($res);

    $color = "#".$field["color"];

    $nom = $field["nom"];
    $prenom = $field["prenom"];

    $str .= "<td style=' text-align: center'><td style='color: $color;' title='$prenom $nom'>" .strtoupper(substr($field["prenom"],0,1)).strtoupper(substr($field["nom"],0,1)). "</td>";


    $str .= "<td>".person($row["idTache"])."</td>";
    $str .= "<td>".bd($row["idTache"])."</td>";
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

    if(($_SESSION["id"]===$row["idDemandeur"] && $_SESSION["admin"]==1) || $_SESSION["admin"]==2) {
        $str .= "<td style='text-align: center'><form method='post' action='supprTache.php' id='sub$cpt'><input type='text' value='" . $row["idTache"] . "' name='idtache' hidden><a onclick='valider($cpt)' style='cursor: pointer;'><img alt='' src='delete.png'/></a></form></td></tr>";
        $cpt += 1;
    }else {
        if ($_SESSION["admin"] >= 1) {
            $str .= "<td></td></tr>";
        }
    }
    return $str;
}


function person($res){

    $str ="<div>\n";


    $sql = "SELECT nom, prenom, color, checked FROM suuser,sutuser where sutuser.idTache='$res' and suuser.idUser=sutuser.idUser";

    $r = query($sql);


    while($row = mysqli_fetch_assoc($r)){

        $color = "#" . $row["color"];
        $nom = $row["nom"];
        $prenom = $row["prenom"];
        $str .= "<span style='color: $color; padding-right: 2px;padding-left: 2px' title='$prenom $nom'>" . strtoupper(substr($prenom, 0, 1)) . strtoupper(substr($nom, 0, 1)) . "</span>";
    }
    $str .="</div>";

    return $str;
}

function bd($res){

    $str ="<div>\n";

    $sql ="SELECT nomBD,diminutif,color FROM subd,sutbd WHERE sutbd.idTache='$res' and sutbd.idBD=subd.idBD";

    $r = query($sql);

    while ($row = mysqli_fetch_assoc($r)){

        $color = "#".$row["color"];
        $nom = $row["nomBD"];
        $str .= "<span style='color: $color; padding-right: 2px; padding-left: 2px' title='$nom'>".$row["diminutif"]."</span>";

    }

    $str .="</div>";

    return $str;
}

function valid($res,$idD,&$cpt){


    $str ="<table>\n";

        $sql = "SELECT nom, prenom, color, adminC FROM suuser,sutuser where suuser.idUser = '$idD' and idTache='$res'";

        $r = query($sql);

        $row = mysqli_fetch_assoc($r);

        $id = $_SESSION["id"];

        $sql = "SELECT * FROM suuser where idUser=$id";

        $resultat = query($sql);

        $r = mysqli_fetch_assoc($resultat);

    if($_SESSION["id"]===$idD || $r["admin"]==2) {
        $color = "#" . $row["color"];

        $sql = "SELECT * FROM suuser,sutuser,sutache where idDemandeur=suuser.idUser and sutache.idTache=sutuser.idTache and sutache.idTache=$res";

        $resultat = query($sql);

        while ($row = mysqli_fetch_assoc($resultat)) {
            if ($row["adminC"] == 1) {
                $str .= "<td style='color: $color;padding: 2px; border: none'>
            <form method='post' action='checked.php' id='sub$cpt'>
            <a onclick='valider($cpt)' style='cursor: pointer'>
            <input type='submit' id='sub$cpt' hidden>
            <input type='text' value='" . $res . "' name='idtache' hidden>
            <input type='text' value='ok' name='admin' hidden>
            <div class='check icon' style='color: $color'>
            </div>
            </a>
            </form>
            </td>
            ";

                $cpt += 1;
                break;
            } else {
                if ($row["checked"] == 0) {
                    $stri = "<td style='color: $color;padding: 2px; border: none'>
            <div class='close icon' style='color: $color'>
            </div>
            </td>
            ";


                    break;
                }
                $stri = "<td style='color: $color;padding: 2px; border: none'>
            <form method='post' action='checked.php' id='sub$cpt'>
            <a onclick='valider($cpt)' style='cursor: pointer'>
            <input type='submit' id='sub$cpt' hidden>
            <input type='text' value='" . $res . "' name='idtache' hidden>
            <input type='text' value='ok' name='admin' hidden>
            <div class='check icon2' style='color: $color'>
            </div>
            </a>
            </form>
            </td>
            ";
                $cpt += 1;

            }
        }

        $str .= $stri;

        $sql = "SELECT suuser.idUser,nom, prenom, color, checked, adminC FROM suuser,sutuser where sutuser.idTache='$res' and suuser.idUser=sutuser.idUser";

        $r = query($sql);

        while($row = mysqli_fetch_assoc($r)){


            if($_SESSION["id"]===$row["idUser"] ) {

                if ($row["checked"] == 0 && $row["adminC"] == 0) {

                    $color = "#" . $row["color"];
                    $str .= "<td style='color: $color; padding: 3px ; border: none'>
                    <form method='post' action='checked.php' id='sub$cpt'>
                    <a onclick='valider($cpt)' style='cursor: pointer'>
                    <input type='submit' id='sub$cpt' hidden>
                    <input type='text' value='" . $res . "' name='idtache' hidden>
                    <div class='check icon2' style='color: $color'>
                    </div>
                    </a>
                    </form>
                    </td>";


                    $cpt += 1;
                } else {
                    if ($row["checked"] == 1 && $row["adminC"] == 1) {
                        $color = "#" . $row["color"];
                        $str .= "<td style='color: $color; padding: 3px ; border: none'>
                        <form method='post' action='checked.php' id='sub$cpt'>
                        <a onclick='valider($cpt)' style='cursor: pointer'>
                        <input type='submit' id='sub$cpt' hidden>
                        <input type='text' value='" . $res . "' name='idtache' hidden>
                        <div class='check icon' style='color: $color'>
                        </div>
                        </a>
                        </form>
                        </td>";

                        $cpt +=1;
                    }
                    else{
                        $color = "#" . $row["color"];
                        $str .= "<td style='color: $color; padding: 3px ; border: none'>
                        <form method='post' action='checked.php' id='sub$cpt'>
                        <a onclick='valider($cpt)' style='cursor: pointer'>
                        <input type='submit' id='sub$cpt' hidden>
                        <input type='text' value='" . $res . "' name='idtache' hidden>
                        <div class='check icon2' style='color: $color'>
                        </div>
                        </a>
                        </form>
                        </td>";
                        $cpt +=1;
                    }
                }
            }else{
                if ($row["checked"] == 1) {
                    $color = "#" . $row["color"];

                    $str .= "<td style='color: $color; padding: 3px ; border: none'><div class='check icon' style='color: $color'></td>";
                }
            }


        }
    }else {
        $sql = "SELECT suuser.idUser,nom, prenom, color, checked, adminC FROM suuser,sutuser where sutuser.idTache='$res' and suuser.idUser=sutuser.idUser";

        $r = query($sql);

        while ($row = mysqli_fetch_assoc($r)) {
            if ($_SESSION["id"] === $row["idUser"]) {


                if ($row["checked"] == 0 && $row["adminC"] == 0) {

                    $color = "#" . $row["color"];
                    $str .= "<td style='color: $color; padding: 3px ; border: none'>
                    <form method='post' action='checked.php' id='sub$cpt'>
                    <a onclick='valider($cpt)' style='cursor: pointer'>
                    <input type='submit' id='sub$cpt' hidden>
                    <input type='text' value='" . $res . "' name='idtache' hidden>
                    <div class='check icon2' style='color: $color'>
                    </div>
                    </a>
                    </form>
                    </td>";


                    $cpt += 1;
                } else {
                    if ($row["checked"] == 1) {
                        $color = "#" . $row["color"];
                        $str .= "<td style='color: $color; padding: 3px ; border: none'>
                    <form method='post' action='checked.php' id='sub$cpt'>
                    <a onclick='valider($cpt)' style='cursor: pointer'>
                    <input type='submit' id='sub$cpt' hidden>
                    <input type='text' value='" . $res . "' name='idtache' hidden>
                    <div class='check icon' style='color: $color'>
                    </div>
                    </a>
                    </form>
                    </td>";
                        $cpt +=1;
                    } else {
                        $color = "#" . $row["color"];
                        $str .= "<td style='color: $color; padding: 3px ; border: none'>
                    <form method='post' action='checked.php' id='sub$cpt'>
                    <a onclick='valider($cpt)' style='cursor: pointer'>
                    <input type='submit' id='sub$cpt' hidden>
                    <input type='text' value='" . $res . "' name='idtache' hidden>
                    <div class='check icon2' style='color: $color'>
                    </div>
                    </a>
                    </form>
                    </td>";
                        $cpt +=1;
                    }
                }
            } else {
                if ($row["checked"] == 1) {
                    $color = "#" . $row["color"];
                    $str .= "<td style='color: $color; padding: 3px ; border: none'><div class='check icon' style='color: $color'></td>";
                }

            }


        }
    }

    $str .="</table>";

    return $str;
}