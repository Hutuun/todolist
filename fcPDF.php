<?php
/**
 * Created by PhpStorm.
 * User: Sullivan Honnet
 * Date: 4/06/2019
 * Time: 10:53
 *
 *Fonctions d'affichage des tâches pour les pdf
 */



/**
* Fonction d'affichage des tâches non finies
*/
function affiTnfPDF($row){
    $color = "#000000";
    if($row["priorite"]==1){
        $color = "#cca300";
    }
    if ($row["priorite"]==2){
        $color ='#880000';
    }
    if ($row["priorite"]==3){
        $color ="#cc0000";
    }
    if ($row["priorite"]==4){
        $color ="#ff0000";
    }
    $str = "<tr><td style='text-align: center'>".$row["idTache"]."</td>";
    $str .= "<td style='color: $color; padding-left: 4px; padding-right: 4px'>".$row["nomTache"]."</td>";
    $sql = "SELECT nom, prenom, idUser,color From suuser, sutache where idDemandeur ='" . $row["idDemandeur"] . "' and suuser.idUser=sutache.idDemandeur";
    $res = query($sql);

    $field = mysqli_fetch_assoc($res);

    $color = "#".$field["color"];

    $str .= "<td style='color: $color; text-align: center'>" .strtoupper(substr($field["prenom"],0,1)).strtoupper(substr($field["nom"],0,1)). "</td>";


    $str .= "<td style='text-align: center'>".personPDF($row["idTache"])."</td>";
    $str .= "<td style='text-align: center'>".bdPDF($row["idTache"])."</td>";
    $date = $row["dateCreation"];
    $ymd = substr($date, 0, 10);
    $date = date("d/m", strtotime($ymd));
    $str .= "<td style='text-align: center'>" . $date . "</td>";
    $str .= "<td style='text-align: center'>";
    if(isset($row["deadline"]) && substr($row["deadline"],0,10)!=="0000-00-00") {
        $date = $row["deadline"];
        $ymd = substr($date, 0, 10);
        $date = date("d/m", strtotime($ymd));
        $str .= "<span style='text-align: center'>" . $date . "</span>";
    }else {
        if($row["wait"]!=="non") {
            if ($row["wait"] === "oui") {
                $str .= "<span style='text-align: center'>En attente</span>";
            }elseif ($row["wait"] === "En cours") {
                $str .= "<span style='text-align: center'>En cours</span>";
            }
            elseif ($row["wait"] === "A Tester") {
                $str .= "<span style='text-align: center'>A tester</span>";
            }
            elseif ($row["wait"] === "A Mettre en prod") {
                $str .= "<span style='text-align: center'>A mettre en prod</span>";
            }
            elseif ($row["wait"] === "Abandon") {
                $str .= "<span style='text-align: center'>Abandon</span>";
            }
            elseif($row["wait"]==="Validé"){
                $str .= "<span style='text-align: center'>".$row["wait"]."</span>";
            }else{
                $str .= "<span style='text-align: center'>".$row["wait"]."</span>";
            }
        }
    }
    $str .= "</td>";
    if(isset($row["dateSuppr"]) && substr($row["dateSuppr"],0,10)!=="0000-00-00") {
        $date = $row["dateSuppr"];
        $ymd = substr($date, 0, 10);
        $date = date("d/m", strtotime($ymd));
        $str .= "<td style='text-align: center'>" . $date . "</td>";
    }else{
        $str .= "<td></td>";
    }


    $str .= "<td>".validPDF($row["idTache"],$row["idDemandeur"])."</td>";


    return $str;

}

/**
*Foncion d'affichage des tâches finies
*/
function affiTfPDF($row){

    $color = '#000000';
    if($row["priorite"]==1){
        $color = '#cca300';
    }
    if ($row["priorite"]==2){
        $color ='#880000';
    }
    if ($row["priorite"]==3){
        $color ="#cc0000";
    }
    if ($row["priorite"]==4){
        $color ="#ff0000";
    }
    $str = "<tr style='background-color: lightgray'><td style='text-align: center'>".$row["idTache"]."</td>";
    $str .= "<td style='color: $color; padding-left: 4px; padding-right: 4px'>".$row["nomTache"]."</td>";

    $sql = "SELECT nom, prenom, idUser,color From suuser, sutache where idDemandeur ='" . $row["idDemandeur"] . "' and suuser.idUser=sutache.idDemandeur";
    $res = query($sql);

    $field = mysqli_fetch_assoc($res);

    $color = "#".$field["color"];

    $str .= "<td style='color: $color; text-align: center'>" .strtoupper(substr($field["prenom"],0,1)).strtoupper(substr($field["nom"],0,1)). "</td>";


    $str .= "<td style='text-align: center'>".personPDF($row["idTache"])."</td>";
    $str .= "<td style='text-align: center'>".bdPDF($row["idTache"])."</td>";
    $date = $row["dateCreation"];
    $ymd = substr($date, 0, 10);
    $date = date("d/m", strtotime($ymd));
    $str .= "<td style='text-align: center'>" . $date . "</td>";
    $str .= "<td style='text-align: center'>";
    if(isset($row["deadline"]) && substr($row["deadline"],0,10)!=="0000-00-00") {
        $date = $row["deadline"];
        $ymd = substr($date, 0, 10);
        $date = date("d/m", strtotime($ymd));
        $str .= "<span style='text-align: center'>" . $date . "</span>";
    }else {
        if($row["wait"]!=="non") {
            if ($row["wait"] === "oui") {
                $str .= "<span style='text-align: center'>En attente</span>";
            }elseif ($row["wait"] === "En cours") {
                $str .= "<span style='text-align: center'>En cours</span>";
            }
            elseif ($row["wait"] === "A Tester") {
                $str .= "<span style='text-align: center'>A tester</span>";
            }
            elseif ($row["wait"] === "A Mettre en prod") {
                $str .= "<span style='text-align: center'>A mettre en prod</span>";
            }
            elseif ($row["wait"] === "Abandon") {
                $str .= "<span style='text-align: center'>Abandon</span>";
            }
            elseif($row["wait"]==="Validé"){
                $str .= "<span style='text-align: center'>".$row["wait"]."</span>";
            }else{
                $str .= "<span style='text-align: center'>".$row["wait"]."</span>";
            }
        }
    }
    $str .= "</td>";
    if(isset($row["dateSuppr"]) && substr($row["dateSuppr"],0,10)!=="0000-00-00") {
        $date = $row["dateSuppr"];
        $ymd = substr($date, 0, 10);
        $date = date("d/m", strtotime($ymd));
        $str .= "<td style='text-align: center'>" . $date . "</td>";
    }else{
        $str .= "<td></td>";
    }

    $str .= "<td>".validPDF($row["idTache"],$row["idDemandeur"])."</td>";


    return $str;
}


/*
*Fonction qui affiche les initiales des personnes qui sont affectées à une tâche
*/
function personPDF($res){

    $str ="";

    $sql = "SELECT nom, prenom, color, checked FROM suuser,sutuser where sutuser.idTache='$res' and suuser.idUser=sutuser.idUser";

    $r = query($sql);


    while($row = mysqli_fetch_assoc($r)){

        $color = "#" . $row["color"];
        $str .= "<span style='color: $color;'>" . substr($row["prenom"], 0, 1) . substr($row["nom"], 0, 1) . "</span>";


    }


    return $str;
}


/*
*Fonction d'affichage des base de données d'une tâche
*/
function bdPDF($res){

    $str ="";
    $sql ="SELECT diminutif,color FROM subd,sutbd WHERE sutbd.idTache='$res' and sutbd.idBD=subd.idBD";
    $r = query($sql);
    while ($row = mysqli_fetch_assoc($r)){

        $color = "#".$row["color"];
        $str .= "<span style='color: $color'>".$row["diminutif"]."</span>";
    }

    $str .="";

    return $str;
}

/**
*Fonction d'affichage des symboles de validation
* Ici le symbole est juste des "OK" de couleur
* Pour des explications il s'agit de la même fonction valid que dans fcAffi.php
*/
function validPDF($res,$idD){


    $str = "<span>";

    $sql = "SELECT nom, prenom, color, adminC FROM suuser,sutuser where suuser.idUser = '$idD' and idTache='$res'";

    $r = query($sql);

    $row = mysqli_fetch_assoc($r);

    $id = $_SESSION["id"];

    $sql = "SELECT * FROM suuser where idUser=$id";

    $resultat = query($sql);

    $r = mysqli_fetch_assoc($resultat);

    $stri = "";

    if ($_SESSION["id"] === $idD || $r["admin"] == 2) {
        $color = "#" . $row["color"];

        $sql = "SELECT * FROM suuser,sutuser,sutache where idDemandeur=suuser.idUser and sutache.idTache=sutuser.idTache and sutache.idTache=$res";

        $resultat = query($sql);

        while ($row = mysqli_fetch_assoc($resultat)) {
            if ($r["admin"] != 2) {
                if ($row["adminC"] == 1) {
                    $str .= "<span style='padding: 2px; border: none; color: red'>OK</span>";

                    break;
                } else {
                    if ($row["checked"] == 0) {
                        $stri = "<span style='color: $color;padding: 2px; border: none; color: red'>KO</span>";


                        break;
                    }
                    $stri = "<span style='padding: 2px; border: none; color: red'>OK</span>";


                }
            } else {

                if ($row["adminC"] == 1) {
                    $str .= "<span style='padding: 2px; border: none; color: red'>OK</span>";

                    break;
                } else {
                    if ($row["checked"] == 0) {
                        $stri = "<span style='padding: 2px; border: none; color: red '>KO</span>";




                        break;
                    }
                    $stri = "<span style='padding: 2px; border: none; color: red'>KO</span>";

                }
            }
        }

        $str .= $stri;

        $sql = "SELECT suuser.idUser,nom, prenom, color, checked, adminC FROM suuser,sutuser where sutuser.idTache='$res' and suuser.idUser=sutuser.idUser";

        $r = query($sql);

        while ($row = mysqli_fetch_assoc($r)) {


            if ($_SESSION["id"] === $row["idUser"]) {

                if ($row["checked"] == 0 && $row["adminC"] == 0) {

                    $color = "#" . $row["color"];
                    $str .= "<span style=' padding: 3px ; border: none; color: $color'></span>";


                } else {
                    if ($row["checked"] == 1 && $row["adminC"] == 1) {
                        $color = "#" . $row["color"];
                        $str .= "<span style=' padding: 3px ; border: none; color: green'>OK</span>";

                    } else {
                        $color = "#" . $row["color"];
                        $str .= "<span style=' padding: 3px ; border: none; color: $color'></span>";

                    }
                }
            } else {
                if ($row["checked"] == 1) {

                    $str .= "<span style='padding: 3px ; border: none; color: green'>OK</span>";
                }
            }


        }

    }

    ///Pas Admin mais un simple utilisateur


    else {
        $sql = "SELECT suuser.idUser,nom, prenom, color, checked, adminC FROM suuser,sutuser where sutuser.idTache='$res' and suuser.idUser=sutuser.idUser";

        $r = query($sql);

        $b=true;

        while ($row = mysqli_fetch_assoc($r)) {
            if ($_SESSION["id"] === $row["idUser"]) {


                if ($row["checked"] == 0 && $row["adminC"] == 0) {

                    $color = "#" . $row["color"];
                    $str .= "<span style=' padding: 3px ; border: none; color: $color'></span>";


                } else {
                    if ($b && $row["adminC"] == 1){
                        $b = false;

                        $str .= "<span style='padding: 3px ; border: none; color: red'>OK</span>";
                    }
                    if ($row["checked"] == 1) {
                        $color = "#" . $row["color"];
                        $str .= "<span style=' padding: 3px ; border: none; color: green'>OK</span>";
                        $cpt += 1;
                    } else {
                        $color = "#" . $row["color"];
                        $str .= "<span style=' padding: 3px ; border: none;  color: $color'></span>";

                    }
                }
            } else {
                if ($b && $row["adminC"] == 1){
                    $b = false;

                    $str .= "<span style='padding: 3px ; border: none; color: red'>OK</span>";
                }
                if ($row["checked"] == 1) {
                    $str .= "<span style='padding: 3px ; border: none; color: green'>OK</span>";
                }

            }


        }
    }

    $str .= "</span>";

    return $str;
}