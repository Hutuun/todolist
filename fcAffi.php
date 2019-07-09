<?php
/**
 * Created by PhpStorm.
 * User: Sullivan
 * Date: 28/05/2019
 * Time: 08:04
 *
 *Contient les fonctions d'affichage
 */


/**
* Fonction d'affichage des tâches non finies
*/
function affiTnf($row,&$cpt){
    $color = "#000000";
    if($row["priorite"]==1){
        $color = "#ffa900";
    }
    if ($row["priorite"]==2){
        $color ="#880000";
    }
    if ($row["priorite"]==3){
        $color ="#cc0000";
    }
    if ($row["priorite"]==4){
        $color ="#ff0000";
    }
    $str = "<tr><td style='text-align: center'>".$row["idTache"]."</td>";
    $str .= "<td style='color: $color; padding-left: 4px; padding-right: 4px'><form method='post' action='afficheTache.php' id='sub$cpt'><input name='idtache' type='text' value='".$row["idTache"]."' hidden><a onclick='valider($cpt)' style='cursor: pointer' title=\"".$row["descriptionTache"]."\">".$row["nomTache"]."</a></form></td>";
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

    $str .= "<td style='text-align: center'>".valid($row["idTache"],$row["idDemandeur"],$cpt)."</td>";

    $sql = "SELECT suuser.idUser FROM sutuser,suuser WHERE suuser.idUser=sutuser.idUser and sutuser.idtache='".$row["idTache"]."'";

    $res = query($sql);

    $b = false;

    while ($field= mysqli_fetch_assoc($res)){
        if($_SESSION["id"]==$field["idUser"]){
            $b = true;
            break;
        }
    }
    if($row["descriptionTache"]!==""){
        $str.= "<td><table><td style='border: none'><img src=\"img/information-icon2.png\" title=\"".$row["descriptionTache"]."\"></td>";
    }else{
        $str.= "<td><table><td style='border: none'><img src=\"img/information-icon.png\" title=\"".$row["descriptionTache"]."\"></td>";
    }
    if($b||$_SESSION["id"]===$row["idDemandeur"] || $_SESSION["admin"]=="2"){
        $str.="<td style='border: none'><form method='post' action='modifTache.php' id='sub$cpt'><input name='idtache' type='text' value='".$row["idTache"]."' hidden><a onclick='valider($cpt)' style='cursor: pointer'><img src=\"img/write-paper-ink-icon.png\" title='Modification de la tâche'></a></form></td>";
        $cpt+=1;
    }else{
        $str.="<td style='border: none'></td>";
    }

    if(($_SESSION["id"]===$row["idDemandeur"] && $_SESSION["admin"]==1) || $_SESSION["admin"]==2) {
        $str .= "<td style='text-align: center; border: none'><form method='post' action='supprTache.php' id='sub$cpt'><input type='text' value='" . $row["idTache"] . "' name='idtache' hidden><a onclick='valider($cpt)' style='cursor: pointer;'><img alt='' src='img/delete.png'  title='suppression définitif'/></a></form></td></td></table></tr>";
        $cpt += 1;
    }else {

        $str .= "<td style='border: none'></td></td></table></tr>";

    }

    return $str;

}

/**
*Foncion d'affichage des tâches finies
*/
function affiTf($row,&$cpt){

    $color = '#000000';
    if($row["priorite"]==1){
        $color = '#ffa900';
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
    $str .= "<td style='color: $color; padding-left: 4px; padding-right: 4px'><form method='post' action='afficheTache.php' id='sub$cpt'><input name='idtache' type='text' value='".$row["idTache"]."' hidden><a onclick='valider($cpt)' style='cursor: pointer' title=\"".$row["descriptionTache"]."\"> ".$row["nomTache"]."</a></form></td>";
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

    $str .= "<td>".valid($row["idTache"],$row["idDemandeur"],$cpt)."</td>";

    $sql = "SELECT suuser.idUser FROM sutuser,suuser WHERE suuser.idUser=sutuser.idUser and idtache='".$row["idTache"]."'";

    $res = query($sql);

    $b = false;

    while ($field= mysqli_fetch_assoc($res)){
        if($_SESSION["id"]==$field["idUser"]){
            $b = true;
            break;
        }
    }


    if($row["descriptionTache"]!==""){
        $str.= "<td><table><td style='border: none'><img src=\"img/information-icon2.png\" title=\"".$row["descriptionTache"]."\"></td>";
    }else{
        $str.= "<td><table><td style='border: none'><img src=\"img/information-icon.png\" title=\"".$row["descriptionTache"]."\"></td>";
    }
    if($b||$_SESSION["id"]===$row["idDemandeur"] || $_SESSION["admin"]=="2"){
        $str.="<td style='border: none'><form method='post' action='modifTache.php' id='sub$cpt'><input name='idtache' type='text' value='".$row["idTache"]."' hidden><a onclick='valider($cpt)' style='cursor: pointer'><img src=\"img/write-paper-ink-icon.png\" title='Modification de la tâche'></a></form></td>";
        $cpt+=1;
    }else{
        $str.="<td style='border: none'></td>";
    }

    if(($_SESSION["id"]===$row["idDemandeur"] && $_SESSION["admin"]==1) || $_SESSION["admin"]==2) {
        $str .= "<td style='text-align: center; border: none'><form method='post' action='supprTache.php' id='sub$cpt'><input type='text' value='" . $row["idTache"] . "' name='idtache' hidden><a onclick='valider($cpt)' style='cursor: pointer;'><img alt='' src='img/delete.png'  title='suppression définitif'/></a></form></td></td></table></tr>";
        $cpt += 1;
    }else {

        $str .= "<td style='border: none'></td></td></table></tr>";

    }

    return $str;
}


/**
*Fonction d'affichage des tâches archivées ou supprimées
*/
function affSuppr($row,&$cpt){
    $color = "#000000";
    if($row["priorite"]==1){
        $color = "#ffa900";
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
    $str .= "<td style='color: $color; padding-left: 4px; padding-right: 4px'><form method='post' action='afficheTache.php' id='sub$cpt'><input name='idtache' type='text' value='".$row["idTache"]."' hidden><a onclick='valider($cpt)' style='cursor: pointer' title=\"".$row["descriptionTache"]."\">".$row["nomTache"]."</a></form></td>";
    $cpt+=1;
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

    $sql = "SELECT suuser.idUser FROM sutuser,suuser WHERE suuser.idUser=sutuser.idUser and idtache='".$row["idTache"]."'";

    $res = query($sql);

    $b = false;

    while ($field= mysqli_fetch_assoc($res)){
        if($_SESSION["id"]==$field["idUser"]){
            $b = true;
            break;
        }
    }

    if($row["descriptionTache"]!==""){
        $str.= "<td><table><td style='border: none'><img src=\"img/information-icon2.png\" title=\"".$row["descriptionTache"]."\"></td>";
    }else{
        $str.= "<td><table><td style='border: none'><img src=\"img/information-icon.png\" title=\"".$row["descriptionTache"]."\"></td>";
    }

    if($b||$_SESSION["id"]===$row["idDemandeur"] || $_SESSION["admin"]=="2"){
        $str.="<td style='text-align: center;border: none'><form method='post' action='modifTache.php' id='sub$cpt'><input name='idtache' type='text' value='".$row["idTache"]."' hidden><a onclick='valider($cpt)' style='cursor: pointer'><img src=\"img/write-paper-ink-icon.png\" title='Modification de la tâche'></a></form></td>";
        $cpt+=1;
    }else{
        $str.="<td style='border: none'></td>";
    }
    if(($_SESSION["id"]===$row["idDemandeur"] && $_SESSION["admin"]==1) || $_SESSION["admin"]==2) {
        $str .= "<td style='text-align: center; border: none'><form method='post' action='supprTache.php' id='sub$cpt'><input type='text' value='" . $row["idTache"] . "' name='idtache' hidden><a onclick='valider($cpt)' style='cursor: pointer;'><img alt='' src='img/delete.png' title='suppression définitif'/></a></form></td></td></table></tr>";
        $cpt += 1;
    }else {

        $str .= "<td style='border: none'></td></td></table></tr>";

    }

    return $str;
}

/*
*Fonction qui affiche les initiales des personnes qui sont affectées à une tâche
*/
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


/*
*Fonction d'affichage des base de données d'une tâche
*/
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


/**
*Fonction d'affichage des symboles de validation
*Si l'utilisateur loggé est affecter à la tâche il voit sa couleur pour son symbole et la couleur verte pour le symbole des autres personnes qui sont affectées à une tâche et en rouge pour le symbole du demandeur
*Si l'utilisateur est aussi le demandeur de la tâche, il voit aussi sa couleur pour son symbole de validation finale de la tâche
*/
function valid($res,$idD,&$cpt)
{


    $str = "<table>\n";

    $sql = "SELECT nom, prenom, color, adminC FROM suuser,sutuser where suuser.idUser = '$idD' and idTache='$res'";

    $r = query($sql);

    $row = mysqli_fetch_assoc($r);

    $id = $_SESSION["id"];

    $sql = "SELECT * FROM suuser where idUser=$id";

    $resultat = query($sql);

    $r = mysqli_fetch_assoc($resultat);

    $stri = "";
	
	//Si l'utilisateur est le demandeur de la tâche ou un responsable de rang supérieur
    if ($_SESSION["id"] === $idD || $r["admin"] == 2) {
        $color = "#" . $row["color"];

        $sql = "SELECT * FROM suuser,sutuser,sutache where idDemandeur=suuser.idUser and sutache.idTache=sutuser.idTache and sutache.idTache=$res";

        $resultat = query($sql);

        while ($row = mysqli_fetch_assoc($resultat)) {
            if ($r["admin"] != 2) {
				//si la tâche est validé par le responsable
                if ($row["adminC"] == 1) {
                    $str .= "<td style='padding: 2px; border: none'>
            <form method='post' action='checked.php' id='sub$cpt'>
            <a onclick='valider($cpt)' style='cursor: pointer'>
            <input type='submit' id='sub$cpt' hidden>
            <input type='text' value='" . $res . "' name='idtache' hidden>
            <input type='text' value='ok' name='admin' hidden>
            <div class='check icon2' style='color: red'>
            </div>
            </a>
            </form>
            </td>
            ";

                    $cpt += 1;
                    break;
                } else {
					//Si la tâche n'a pas été validée par les personnes qui doivent réaliser la tâche
                    if ($row["checked"] == 0) {
                        $stri = "<td style='color: $color;padding: 2px; border: none'>
            <div class='close icon' style='color: $color'>
            </div>
            </td>
            ";

						//on break pour éviter d'afficher plusieur fois la croix
                        break;
                    }
					//la tâche a été validée par toutes les personnes qui doivent la faire
                    $stri = "<td style='padding: 2px; border: none'>
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

                }
            } else {
				//si la tâche est validé par le responsable
                if ($row["adminC"] == 1) {
                    $str .= "<td style='padding: 2px; border: none'>
            <form method='post' action='checked.php' id='sub$cpt'>
            <a onclick='valider($cpt)' style='cursor: pointer'>
            <input type='submit' id='sub$cpt' hidden>
            <input type='text' value='" . $res . "' name='idtache' hidden>
            <input type='text' value='ok' name='admin' hidden>
            <div class='check icon2' style='color: red'>
            </div>
            </a>
            </form>
            </td>
            ";

                    $cpt += 1;
                    break;
                } else {
					//Si la tâche n'a pas été validée par les personnes qui doivent réaliser la tâche
                    if ($row["checked"] == 0) {
                        $stri = "<td style='padding: 2px; border: none; '>
            <form method='post' action='checked.php' id='sub$cpt'>
            <a onclick='valider($cpt)' style='cursor: pointer'>
            <input type='submit' id='sub$cpt' hidden>
            <input type='text' value='" . $res . "' name='idtache' hidden>
            <input type='text' value='ok' name='admin' hidden>
            <div class='close icon' style='color: $color'>
            </div>
            </a>
            </form>
            </td>
            ";

                        $cpt +=1;


                        break;
                    }
					//la tâche a été validée par toutes les personnes qui doivent la faire
                    $stri = "<td style='padding: 2px; border: none'>
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
                }
            }
        }

            $str .= $stri;

            $sql = "SELECT suuser.idUser,nom, prenom, color, checked, adminC FROM suuser,sutuser where sutuser.idTache='$res' and suuser.idUser=sutuser.idUser";

            $r = query($sql);

			//On affiche les symboles pour les personnes qui sont sur la tâche

            while ($row = mysqli_fetch_assoc($r)) {

				//Si l'utilisateur est le demandeur ET qu'il travail sur la tâche
                if ($_SESSION["id"] === $row["idUser"]) {
					//Si l'utilisateur n'a pas validé
                    if ($row["checked"] == 0 && $row["adminC"] == 0) {

                        $color = "#" . $row["color"];
                        $str .= "<td style=' padding: 3px ; border: none'>
                    <form method='post' action='checked.php' id='sub$cpt'>
                    <a onclick='valider($cpt)' style='cursor: pointer'>
                    <input type='submit' id='sub$cpt' hidden>
                    <input type='text' value='" . $res . "' name='idtache' hidden>
                    <div class='check icon' style='color: $color'>
                    </div>
                    </a>
                    </form>
                    </td>";


                        $cpt += 1;
                    } else {
						//Si la tâche est validé
                        if ($row["checked"] == 1 && $row["adminC"] == 1) {
                            $color = "#" . $row["color"];
                            $str .= "<td style=' padding: 3px ; border: none'>
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
                            $color = "#" . $row["color"];
                            $str .= "<td style=' padding: 3px ; border: none'>
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
                        }
                    }
					//Si l'utilisateur est le demandeur ET qu'il NE TRAVAIL PAS sur la tâche
                } else {
					//Si la tâche a été validé 
                    if ($row["checked"] == 1) {

                        $str .= "<td style='padding: 3px ; border: none'><div class='check icon2' style='color: green'></td>";
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
				//Si l'utilisateur travaille bien sur la tâche
                if ($_SESSION["id"] === $row["idUser"]) {

					//Si l'utilisateur n'a pas validé et le demandeur non plus
                    if ($row["checked"] == 0 && $row["adminC"] == 0) {

                        $color = "#" . $row["color"];
                        $str .= "<td style=' padding: 3px ; border: none'>
                    <form method='post' action='checked.php' id='sub$cpt'>
                    <a onclick='valider($cpt)' style='cursor: pointer'>
                    <input type='submit' id='sub$cpt' hidden>
                    <input type='text' value='" . $res . "' name='idtache' hidden>
                    <div class='check icon' style='color: $color'>
                    </div>
                    </a>
                    </form>
                    </td>";


                        $cpt += 1;
                    } else {
						//Si le demandeur de la tâche a validée
                        if ($b && $row["adminC"] == 1){
                            $b = false;

                            $str .= "<td style='padding: 3px ; border: none'><div class='check icon2' style='color: red'></td>";
                        }
						//Si L'utilisateur a validé
                        if ($row["checked"] == 1) {
                            $color = "#" . $row["color"];
                            $str .= "<td style=' padding: 3px ; border: none'>
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
							//Si l'utilisateur n'a pas validé
                            $color = "#" . $row["color"];
                            $str .= "<td style=' padding: 3px ; border: none'>
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
                        }
                    }
					//Si l'utilisateur n'est pas sur la tâche
                } else {
					//Si la tâche est validée par le demandeur
                    if ($b && $row["adminC"] == 1){
                        $b = false;

                        $str .= "<td style='padding: 3px ; border: none'><div class='check icon2' style='color: red'></td>";
                    }
					//Si la tâche est validée par la personne affectée
                    if ($row["checked"] == 1) {
                        $str .= "<td style='padding: 3px ; border: none'><div class='check icon2' style='color: green'></td>";
                    }

                }


            }
        }

        $str .= "</table>";

        return $str;
    }
