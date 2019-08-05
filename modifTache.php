<?php
/**
 * Created by PhpStorm.
 * User: Sullivan Honnet
 * Date: 12/06/2019
 * Time: 09:22
 *
 * Page de modifiction des informations dans une tâche
 */

session_start();

if(empty($_SESSION["login"])){
    header("Refresh:0;URL=login.php");
}else{

include ("database.php");

$id = $_POST["idtache"];

$sql = "SELECT * FROM sutache WHERE idTache =$id";

$resultat = query($sql);

$r = mysqli_fetch_assoc($resultat);




?>
<!DOCTYPE html>
<html>
<head>
    <title>TODO</title>
    <meta charset="utf-8">
    <script src="js/function.js"></script>
    <script >
        function f() {
            var a = document.getElementsByClassName("per")
            var b = false;

            for (var i=0; i<a.length;i++){

                if(a[i].checked){
                    b = true;
                }
            }

            if(!b){
                document.getElementById('messageErreur').innerHTML = "Vous avez des informations imcomplètes"
            }
            return b;
        }

        function reunion() {


            var reunion = document.getElementById('bd10');

            if (reunion.checked) {

                var ajout = document.getElementById('reunionOu');

                ajout.innerHTML = "<td><label>Où :</label></td><td><input type='text' value='<?php echo $r['ou']?>' name='ou' style='width: 60%' maxlength='50'></td>";

                ajout = document.getElementById('reunionHeure');

                ajout.innerHTML = "<td><label>Heure :</label></td><td><input type='text' value='<?php echo $r['heure']?>' name='heure' style='width: 60%' maxlength='8'></td>";

            }else{
                var ajout = document.getElementById('reunionOu');

                ajout.innerHTML = "";

                ajout = document.getElementById('reunionHeure');

                ajout.innerHTML = "";
            }
        }
    </script>
</head>
<body>
<h1>Modification d'une tâche</h1>
<br/>

<div id="messageErreur">

</div>

<br/>

<div class="contenu_page">
    <form id="tache" method="post" onsubmit="return f();" action="updateTache.php">
        <fieldset>
            <legend>&nbsp;Veuillez sélectionner les informations</legend>
            <table>
                <tr>
                    <td><label style="color:#e60000;">Demandé par : </label></td>
                    <?php
                    $sql = "SELECT * FROM suuser order by nom,prenom";

                    $res = query($sql);

                    $str="";

                    echo "<td><table>";
                    while ($row = mysqli_fetch_assoc($res)) {
                        if ((strtotime($row["dateFin"]) > time() || strtotime($row["dateFin"])<0 || strtotime($row["dateFin"])==false) && $row["admin"]>=1) {
                            $stri = '<td style="color: #'.$row["color"].'"><input type="checkbox"  value="' . $row['idUser'] . '" name="d' . $row['idUser'] . '">' . substr_replace($row['nom'],strtoupper(substr($row['nom'],0,1)),0,1) . ' ' . substr_replace($row['prenom'],strtoupper(substr($row['prenom'],0,1)),0,1) . '</td>';

                            if ($row["idUser"] == $r["idDemandeur"]) {
                                $stri = '<td style="color: #'.$row["color"].'"><input type="checkbox" checked  value="' . $row['idUser'] . '" name="d' . $row['idUser'] . '">' . substr_replace($row['nom'],strtoupper(substr($row['nom'],0,1)),0,1) . ' ' . substr_replace($row['prenom'],strtoupper(substr($row['prenom'],0,1)),0,1) . '</td>';

                            }
                            $str.= $stri;
                        }
                    }
                    echo $str;
                    echo "</table></td>";
                    ?>
                </tr>
                <tr>
                    <td><label style="color:#e60000;">Utilisateur : </label></td>
                    <?php
                    $sql = "SELECT * FROM suuser order by nom,prenom";

                    $res = query($sql);
                    $str = "";

                    echo "<td><table>";
                    while ($row = mysqli_fetch_assoc($res)) {
                        if (strtotime($row["dateFin"]) > time() || strtotime($row["dateFin"])<0 || strtotime($row["dateFin"])==false) {
                            $sql = "SELECT * FROM suuser,sutuser,sutache where sutache.idTache=$id and sutache.idTache=sutuser.idTache and sutuser.idUser=suuser.idUser";

                            $resultat = query($sql);
                            while ($f = mysqli_fetch_assoc($resultat)) {

                                $stri = '<td style="color: #'.$row["color"].'"><input type="checkbox" class="per" value="' . $row['idUser'] . '" name="' . $row['idUser'] . '">' . substr_replace($row['nom'],strtoupper(substr($row['nom'],0,1)),0,1) . ' ' . substr_replace($row['prenom'],strtoupper(substr($row['prenom'],0,1)),0,1) . '</td>';
                                if($f["idUser"]===$row["idUser"]) {
                                    $stri = '<td style="color: #'.$row["color"].'"><input type="checkbox" checked class="per" value="' . $row['idUser'] . '" name="' . $row['idUser'] . '">' . substr_replace($row['nom'],strtoupper(substr($row['nom'],0,1)),0,1) . ' ' . substr_replace($row['prenom'],strtoupper(substr($row['prenom'],0,1)),0,1) . '</td>';
                                    break;
                                }
                            }
                            $str .= $stri;
                        }
                    }
                    echo $str;
                    echo "</table></td>";
                    ?></tr>
                <tr>
                    <td><label style="color:#e60000;">Nom de la tâche : </label></td>
                    <td><input type="text" name="nom" value="<?php echo $r["nomTache"];?>" style="width: 60%" maxlength="100" required></td></tr>
                <tr>
                    <td><label>Base de données : </label></td>
                    <?php
                    echo "<td><table>";


                    $sql = "SELECT * FROM subd";
                    $res = query($sql);
                    $str="";
                    while ($row = mysqli_fetch_assoc($res)) {

                        $sql = "SELECT * FROM subd,sutbd where sutbd.idTache=$id  and sutbd.idBD=subd.idBD;";

                        $resultat = query($sql);
                        $stri = '<td style="color: #' . $row["color"] . '"><input type="checkbox" onclick="reunion()" id="'.$row['idBD'].'" value="' . $row['idBD'] . '" name="' . $row['idBD'] . '">' . substr_replace($row['nomBD'], strtoupper(substr($row["nomBD"], 0, 1)), 0, 1) . '</td>';
                        while ($f = mysqli_fetch_assoc($resultat)) {

                            $stri = '<td style="color: #' . $row["color"] . '"><input type="checkbox" onclick="reunion()" id="'.$row['idBD'].'"  value="' . $row['idBD'] . '" name="' . $row['idBD'] . '">' . substr_replace($row['nomBD'], strtoupper(substr($row["nomBD"], 0, 1)), 0, 1) . '</td>';


                            if($f["idBD"]===$row["idBD"]) {
                                $stri = '<td style="color: #' . $row["color"] . '"><input type="checkbox" onclick="reunion()" id="'.$row['idBD'].'" checked  value="' . $row['idBD'] . '" name="' . $row['idBD'] . '">' . substr_replace($row['nomBD'], strtoupper(substr($row["nomBD"], 0, 1)), 0, 1) . '</td>';
                                break;
                            }

                        }
                        $str .= $stri;
                    }
                    echo $str;
                    echo "</table></td>";
                    ?>
                </tr>
                <tr>
                    <td><label>Priorité : </label></td>
                    <td><select  name="prio" style="width:61%" >
                            <?php
                            if($r["priorite"]==0) {
                                echo "<option value='0' selected>Pas prioritaire</option>";
                                echo "<option value='1'>Prioritaire</option>";
                                echo "<option value='2'>Très prioritaire de niveau 1</option>";
                                echo "<option value='3'>Très prioritaire de niveau 2</option>";
                                echo "<option value='4'>Très prioritaire de niveau 3</option>";
                            }else {
                                echo "<option value='0'>Pas prioritaire</option>";
                                if($r["priorite"]==1) {
                                    echo "<option value='1' selected>Prioritaire</option>";
                                    echo "<option value='2'>Très prioritaire de niveau 1</option>";
                                    echo "<option value='3'>Très prioritaire de niveau 2</option>";
                                    echo "<option value='4'>Très prioritaire de niveau 3</option>";
                                }
                                else{
                                    echo "<option value='1'>Prioritaire</option>";
                                    if($r["priorite"]==2) {
                                        echo "<option value='2' selected>Très prioritaire de niveau 1</option>";
                                        echo "<option value='3'>Très prioritaire de niveau 2</option>";
                                        echo "<option value='4'>Très prioritaire de niveau 3</option>";
                                    }
                                    else{
                                        echo "<option value='2'>Très prioritaire de niveau 1</option>";
                                        if($r["priorite"]==3) {
                                            echo "<option value='3' selected>Très prioritaire de niveau 2</option>";
                                            echo "<option value='4'>Très prioritaire de niveau 3</option>";
                                        }else{
                                            echo "<option value='3'>Très prioritaire de niveau 2</option>";
                                            echo "<option value='4' selected>Très prioritaire de niveau 3</option>";
                                        }
                                    }
                                }
                            }

                            ?>
                    </td>
                </tr>
                <tr>
                    <td><label>Date de début : </label></td>
                    <td><input type="date" value="<?php
                        echo date("Y-m-d",strtotime(substr($r["dateCreation"],0,10)));
                        ?>" name="dd" style="width:60%" ></td>
                </tr>
                <tr>
                    <td><label>Deadline(opt) : </label></td>
                    <td><input type="date"  value="<?php if($r["deadline"]!=="0000-00-00 00:00:00"){
                            echo date("Y-m-d",strtotime(substr($r["deadline"],0,10)));
                    }else{
                        echo "";
                        }?>" name="deadline" style="width:60%" ></td>
                </tr>
                <tr>
                    <td><label>Date de fin : </label></td>
                    <td><input type="date" value="<?php
                        if($r["dateSuppr"]!=="0000-00-00 00:00:00") {
                            echo date("Y-m-d", strtotime(substr($r["dateSuppr"], 0, 10)));
                        }else{
                            echo "";
                        }
                        ?>" name="df" style="width:60%" ></td>
                </tr>
                <tr id="reunionOu"></tr>
                <tr id="reunionHeure"></tr>

                <tr>
                    <td><label>Description : </label></td>
                    <td><textarea style="resize: none; width: 60%"  name="desc" maxlength="1500"><?php echo $r["descriptionTache"];?></textarea></td>
                </tr>
            </table>
            <table>
                <tr>
                    <td><label style="padding-right: 70px">Statut : </label></td>
                    <td style="padding-left: 4px"><?php
                        $b = false;
                        if($r["wait"]!=="oui") {
                            if($r["wait"]==="non") {
                                $b = true;
                            }
                            echo "<input type=\"checkbox\"  name=\"wait\" class='inf' value=\"oui\" onclick='CocheTout(this.name)'>En attente</td>";

                        }else{
                            echo "<input type=\"checkbox\" checked name=\"wait\" class='inf' value=\"oui\" onclick='CocheTout(this.name)'>En attente</td>";
                            $b = true;
                        }
                        if ($r["wait"] === "En cours") {
                            echo "<td style=\"padding-left: 4px\"><input type=\"checkbox\" class=\"inf\" checked name=\"cours\" value=\"En cours\" onclick='CocheTout(this.name)'>En cours</td>";
                            $b = true;
                        }
                        else {
                            echo "<td style=\"padding-left: 4px\"><input type=\"checkbox\" class=\"inf\" name=\"cours\" value=\"En cours\" onclick='CocheTout(this.name)'>En cours</td>";
                        }
                        if ($r["wait"] === "A tester") {
                            echo "<td style=\"padding-left: 4px\"><input type=\"checkbox\" class=\"inf\" checked name=\"test\" value=\"A tester\" onclick='CocheTout(this.name)'>A tester</td>";
                            $b = true;
                        }
                        else{
                            echo "<td style=\"padding-left: 4px\"><input type=\"checkbox\" class=\"inf\" name=\"test\" value=\"A tester\" onclick='CocheTout(this.name)'>A tester</td>";
                        }
                        if ($r["wait"] === "Mettre en prod") {
                            echo "<td style=\"padding-left: 4px\"><input type=\"checkbox\" class=\"inf\" checked name=\"prod\" value=\"Mettre en prod\" onclick='CocheTout(this.name)'>A mettre en prod</td>";
                            $b = true;
                        }
                        else{
                            echo "<td style=\"padding-left: 4px\"><input type=\"checkbox\" class=\"inf\" name=\"prod\" value=\"Mettre en prod\" onclick='CocheTout(this.name)'>A mettre en prod</td>";
                        }
                        if ($r["wait"] === "Abandon") {
                            echo "<td style=\"padding-left: 4px\"><input type=\"checkbox\" class=\"inf\" checked name=\"abandon\" value=\"Abandon\" onclick='CocheTout(this.name)'>Abandon</td>";
                            $b = true;
                        }
                        else{
                            echo "<td style=\"padding-left: 4px\"><input type=\"checkbox\" class=\"inf\" name=\"abandon\" value=\"Abandon\" onclick='CocheTout(this.name)'>Abandon</td>";
                        }
                        if($b){
                            echo "<td style=\"padding-left: 4px\"><input type=\"text\" class=\"inf\" name=\"autre\" maxlength=\"20\" style='width: 120px' onkeypress=\"CocheTout(this.name)\">Autres</td>";
                        }else{
                            echo "<td style=\"padding-left: 4px\"><input type=\"text\" class=\"inf\" name=\"autre\" maxlength=\"20\" style='width: 120px' value='$r[wait]' onkeypress=\"CocheTout(this.name)\">Autres</td>";
                        }


                    ?>
                </tr>
                </tr>
            </table>
        </fieldset>
        <br/>
        <fieldset style="border: 0px">
            <i style="font-size: 12px; color:#e60000;">Les sections en rouge sont obligatoires</i>
            <p><?php
                if($_SESSION["admin"]>=1){
                    echo "<label style=\"float: right\">La personne ne se trouve pas dans la liste ? cliquez <a href=\"utilisateur.php\">ici</a> &nbsp;</label>";
                }
                ?></p>
            <br/><br/>
            <p>
                <input type="text" value="<?php echo $id;}?>" name="idtache" hidden>
                <a href="hub2.php" style="text-decoration: none"><input type='button' value='Annuler' style="width: 80px"/></a>
                <input type="submit" value="Valider" name="valider" style="width: 80px"/>
            </p>
        </fieldset>
    </form>
</div>
</body>

</html>