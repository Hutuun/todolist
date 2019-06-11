<?php
/**
 * Created by PhpStorm.
 * User: Sullivan Honnet
 * Date: 27/05/2019
 * Time: 14:41
 */

include ("database.php");

$sql = "SELECT * FROM suuser order by nom,prenom";

$res = query($sql);



?>
<!DOCTYPE html>
<html>
        <head>
            <title>TODO</title>
            <meta charset="utf-8">
        </head>
        <body>
            <h1>Insertion d'une tâche</h1>
            <br/>
<br/>
<div class="contenu_page">
    <form id="tache" method="post" action="insertTache.php">
        <fieldset>
            <legend>&nbsp;Veuillez sélectionner les informations</legend>
            <table>
                <tr>
                    <td><label>Demander par : </label></td>
                    <?php
                    echo "<td><table>";
                    while ($row = mysqli_fetch_assoc($res)) {
                        if ((strtotime($row["dateFin"]) > time() || strtotime($row["dateFin"])<0 || strtotime($row["dateFin"])==false) && $row["admin"]>=1) {
                            echo '<td style="color: #'.$row["color"].'"><input type="checkbox"  value="' . $row['idUser'] . '" name="d' . $row['idUser'] . '">' . substr_replace($row['nom'],strtoupper(substr($row['nom'],0,1)),0,1) . ' ' . substr_replace($row['prenom'],strtoupper(substr($row['prenom'],0,1)),0,1) . '</td>';
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
                                echo '<td style="color: #'.$row["color"].'"><input type="checkbox"  value="' . $row['idUser'] . '" name="' . $row['idUser'] . '">' . substr_replace($row['nom'],strtoupper(substr($row['nom'],0,1)),0,1) . ' ' . substr_replace($row['prenom'],strtoupper(substr($row['prenom'],0,1)),0,1) . '</td>';
                            }
                        }
                    echo "</table></td>";
                   ?></tr>
                <tr>
                    <td><label>Nom de la tâche : </label></td>
                    <td><input type="text" name="nom" style="width: 60%" maxlength="100" required></td></tr>
                <tr>
                    <td><label>Base de données : </label></td>
                    <?php
                    echo "<td><table>";

                    $sql = "SELECT * FROM subd";

                    $res = query($sql);

                    while ($row = mysqli_fetch_assoc($res)) {
                        echo '<td style="color: #'.$row["color"].'"><input type="checkbox"  value="' . $row['idBD'] . '" name="' . $row['idBD'] . '">' . substr_replace($row['nomBD'],strtoupper(substr($row["nomBD"],0,1)),0,1). '</td>';
                    }
                    echo "</table></td>";
                    ?>
                </tr>
                <tr>
                    <td><label>Priorité : </label></td>
                    <td><select  name="prio" style="width:61%" >
                            <option value="0">Pas prioritaire</option>
                            <option value="1"> Prioritaire</option>
                            <option value="2">Très prioritaire</option>
                    </td>
                </tr>
                <tr>
                    <td><label>Deadline(opt) : </label></td>
                    <td><input type="date" name="deadline" style="width:60%" ></td>
                </tr>
                <tr>
                    <td><label>Description : </label></td>
                    <td><textarea style="resize: none; width: 60%" name="desc" maxlength="1500" required></textarea></td>
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
                <label class="right">&nbsp;</label>
                <input type="submit" value="Valider" style="width: 80px"/>
            </p>
        </fieldset>
    </form>
</div>
</body>

</html>