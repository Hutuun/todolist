<?php
/**
 * Created by PhpStorm.
 * User: Sullivan Honnet
 * Date: 12/06/2019
 * Time: 09:22
 */

include ("database.php");

$sql = "SELECT * FROM suuser order by nom,prenom";

$res = query($sql);

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
</head>
<body>
<h1>Modification d'une tâche</h1>
<br/>
<br/>
<div class="contenu_page">
    <form id="tache" method="post" action="insertTache.php">
        <fieldset>
            <legend>&nbsp;Veuillez sélectionner les informations</legend>
            <table>
                <tr>
                    <td><label>Demandé par : </label></td>
                    <?php
                    echo "<td><table>";
                    while ($row = mysqli_fetch_assoc($res)) {
                        if ((strtotime($row["dateFin"]) > time() || strtotime($row["dateFin"])<0 || strtotime($row["dateFin"])==false) && $row["admin"]>=1) {
                            if ($row["idUser"] == $r["idDemandeur"]) {
                                echo '<td style="color: #' . $row["color"] . '"><input type="checkbox" checked value="' . $row['idUser'] . '" name="d' . $row['idUser'] . '">' . substr_replace($row['nom'], strtoupper(substr($row['nom'], 0, 1)), 0, 1) . ' ' . substr_replace($row['prenom'], strtoupper(substr($row['prenom'], 0, 1)), 0, 1) . '</td>';
                            }else{
                                echo '<td style="color: #' . $row["color"] . '"><input type="checkbox" value="' . $row['idUser'] . '" name="d' . $row['idUser'] . '">' . substr_replace($row['nom'], strtoupper(substr($row['nom'], 0, 1)), 0, 1) . ' ' . substr_replace($row['prenom'], strtoupper(substr($row['prenom'], 0, 1)), 0, 1) . '</td>';

                            }
                        }
                    }
                    echo "</table></td>";
                    ?>
                </tr>
                <tr>
                    <td><label>Utilisateur : </label></td>
                    <?php
                    $sql = "SELECT * FROM suuser order by nom,prenom";

                    $res = query($sql);


                    echo "<td><table>";
                    while ($row = mysqli_fetch_assoc($res)) {
                        if (strtotime($row["dateFin"]) > time() || strtotime($row["dateFin"])<0 || strtotime($row["dateFin"])==false) {
                            $sql = "SELECT * FROM suuser,sutuser,sutache where sutache.idTache=$id and sutache.idTache=sutuser.idTache and sutuser.idUser=suuser.idUser";

                            $resultat = query($sql);
                            while ($f = mysqli_fetch_assoc($resultat)) {
                                if($f["idUser"]===$row["idUser"]) {
                                    echo '<td style="color: #'.$row["color"].'"><input type="checkbox" checked  value="' . $row['idUser'] . '" name="' . $row['idUser'] . '">' . substr_replace($row['nom'],strtoupper(substr($row['nom'],0,1)),0,1) . ' ' . substr_replace($row['prenom'],strtoupper(substr($row['prenom'],0,1)),0,1) . '</td>';
                                }else{
                                    echo '<td style="color: #'.$row["color"].'"><input type="checkbox"  value="' . $row['idUser'] . '" name="' . $row['idUser'] . '">' . substr_replace($row['nom'],strtoupper(substr($row['nom'],0,1)),0,1) . ' ' . substr_replace($row['prenom'],strtoupper(substr($row['prenom'],0,1)),0,1) . '</td>';
                                }
                            }
                        }
                    }
                    echo "</table></td>";
                    ?></tr>
                <tr>
                    <td><label>Nom de la tâche : </label></td>
                    <td><input type="text" name="nom" value="<?php echo $r["nomTache"];?>" style="width: 60%" maxlength="100" required></td></tr>
                <tr>
                    <td><label>Base de données : </label></td>
                    <?php
                    echo "<td><table>";

                    $sql = "SELECT * FROM subd";

                    $res = query($sql);

                    while ($row = mysqli_fetch_assoc($res)) {

                        $sql = "SELECT * FROM subd,sutbd,sutache where sutache.idTache=$id and sutache.idTache=sutbd.idTache and sutbd.idBD=subd.idBD";

                        $resultat = query($sql);
                        while ($f = mysqli_fetch_assoc($resultat)) {
                            if($f["idBD"]===$row["idBD"]) {
                                echo '<td style="color: #' . $row["color"] . '"><input type="checkbox" checked  value="' . $row['idBD'] . '" name="' . $row['idBD'] . '">' . substr_replace($row['nomBD'], strtoupper(substr($row["nomBD"], 0, 1)), 0, 1) . '</td>';
                            }else{
                                echo '<td style="color: #' . $row["color"] . '"><input type="checkbox"  value="' . $row['idBD'] . '" name="' . $row['idBD'] . '">' . substr_replace($row['nomBD'], strtoupper(substr($row["nomBD"], 0, 1)), 0, 1) . '</td>';
                            }
                        }
                    }
                    echo "</table></td>";
                    ?>
                </tr>
                <tr>
                    <td><label>Priorité : </label></td>
                    <td><select  name="prio" style="width:61%" >
                            <?php
                            if($r["priorite"]==0) {
                                echo "<option value='0' selected>Pas prioritaire</option>";
                            }else {
                                echo "<option value='0'>Pas prioritaire</option>";
                                if($r["priorite"]==1) {
                                    echo "<option value='1' selected> Prioritaire</option>";
                                }
                                else{
                                    echo "<option value='1'> Prioritaire</option>";
                                    echo "<option value='2' selected>Très prioritaire</option>";
                                }
                            }

                            ?>
                    </td>
                </tr>
                <tr>
                    <td><label>Deadline(opt) : </label></td>
                    <td><input type="date"  value="<?php if($r["deadline"]!=="0000-00-00"){
                        echo date("y-m-d",$r["deadline"]);
                    }else{
                        echo "";
                        }?>" name="deadline" style="width:60%" ></td>
                </tr>
                <tr>
                    <td><label>Description : </label></td>
                    <td><textarea style="resize: none; width: 60%"  name="desc" maxlength="1500"><?php echo $r["descriptionTache"];?></textarea></td>
                </tr>
            </table>
        </fieldset>
        <br/>
        <fieldset style="border: 0px">
            <p>
                <label style="float: right">La personne ne se trouve pas dans la liste ? cliquez <a href="ajouterUser.php">ici</a> &nbsp;</label>
            </p>
            <br/><br/>
            <p>
                <a href="hub.php"><input type='button' value='Annuler' style="width: 80px"/></a>
                <input type="reset">
                <input type="submit" value="Valider" name="valider" style="width: 80px"/>
            </p>
        </fieldset>
    </form>
</div>
</body>

</html>