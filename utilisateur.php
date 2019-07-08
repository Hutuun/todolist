<?php
/**
 * Created by PhpStorm.
 * User: Lauriane
 * Date: 8/07/2019
 * Time: 11:21
 * *
 * Permet de d'activer ou de désactiver des utilisateurs
 */

include ("database.php");

?>

<!DOCTYPE html>
<html>
<head>
    <title>TODO</title>
    <meta charset="utf-8">
</head>
<body>
<h1>Statut des utilisateurs</h1>
<br/>
<br/>
<div class="contenu_page">
    <form id="tache" method="post" action="updateUser.php">
        <fieldset>
            <table>
                <tr>
                    <td><label>Utilisateur : </label></td>
                    <?php
                    $sql = "SELECT * FROM suuser order by nom,prenom";

                    $res = query($sql);


                    echo "<td><table>";
                    while ($row = mysqli_fetch_assoc($res)) {
                        if (strtotime($row["dateFin"]) > time() || strtotime($row["dateFin"])<0 || strtotime($row["dateFin"])==false) {
                            echo '<td style="color: #'.$row["color"].'"><input type="checkbox" class="per" checked value="' . $row['idUser'] . '" name="' . $row['idUser'] . '">' . substr_replace($row['nom'],strtoupper(substr($row['nom'],0,1)),0,1) . ' ' . substr_replace($row['prenom'],strtoupper(substr($row['prenom'],0,1)),0,1) . '</td>';
                        }else{
                            echo '<td style="color: #'.$row["color"].'"><input type="checkbox" class="per"  value="' . $row['idUser'] . '" name="' . $row['idUser'] . '">' . substr_replace($row['nom'],strtoupper(substr($row['nom'],0,1)),0,1) . ' ' . substr_replace($row['prenom'],strtoupper(substr($row['prenom'],0,1)),0,1) . '</td>';
                        }
                    }
                    echo "</table></td>";
                    ?></tr>
            </table>
        </fieldset>
        <br/>
        <fieldset style="border: 0px">
            <i style="font-size: 12px; color:#e60000;">Les utilisateurs actifs sont cochés, décochez pour les désactiver</i>

            <p><?php
                if($_SESSION["admin"]>=1){
                    echo "<label style=\"float: right\">La personne ne se trouve pas dans la liste ? cliquez <a href=\"ajouterUser.php\">ici</a> &nbsp;</label>";
                }
                ?></p>

            <br/><br/>
            <p>
                <a href="hub2.php" style="text-decoration: none"><input type='button' value='Annuler' style="width: 80px"/></a>
                <input type="submit"  value="Valider" name="valider" style="width: 80px"/>
            </p>
        </fieldset>
    </form>
</div>
</body>

</html>
