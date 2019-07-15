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
<h1>Insertion d'un nouvel utilisateur</h1>
<br/>
<br/>
<div class="contenu_page">
    <form id="user" method="post" action="insertUser.php">
        <fieldset>
            <legend>&nbsp;Veuillez sélectionner les informations</legend>
            <table>
                <tr>
                    <td><label style="color:#e60000;">Prénom : </label></td>
                    <td><input type="text" name="prenom" style="width: 150%" maxlength="100" required></td>
                </tr>
                <tr>
                    <td><label style="color:#e60000;">Nom : </label></td>
                    <td><input type="text" name="nom" style="width: 150%" maxlength="100" required></td>
                </tr>
                <tr>
                    <td><label>Date de début : </label></td>
                    <td><input type="date" name="dated" style="width: 150%"></td>
                </tr>
                <tr>
                    <td><label>Date de fin : </label></td>
                    <td><input type="date" name="datef" style="width: 150%" ></td>
                </tr>
                <tr>
                    <td><label style="color:#e60000;">Mail : </label></td>
                    <td><input type="email" name="mail" style="width: 150%" required></td>
                </tr>
                <tr>
                    <td><label>Couleur : </label></td>
                    <td><input type="color" name="color" style="width: 155%"></td>
                </tr>
                <tr>
                    <td><label>Admin : </label></td>
                    <td><input type="checkbox" name="admin"></td>
                </tr>

            </table>

        </fieldset>
        <br/>
        <fieldset style="border: 0px">
            <i style="color:#e60000;font-size: 12px;">Les sections en rouge sont obligatoires</i>
            <p>
                <a href="hub2.php" style="text-decoration: none"><input type='button' value='Annuler' style="width: 80px"/></a>
                <label class="right">&nbsp;</label>
                <input type="submit" value="Valider" style="width: 80px"/>
            </p>
        </fieldset>

    </form>
</div>
<br/>
<h1>Statut des utilisateurs</h1>
<br/>
<br/>
<div class="contenu_page">
    <form id="tache" method="post" action="updateUser.php">
        <fieldset>
            <table>
                <tr>
                    <td><label>Utilisateurs : </label></td>
                    <?php
                    $sql = "SELECT * FROM suuser order by nom,prenom";

                    $res = query($sql);


                    echo "<td><table>";
                    while ($row = mysqli_fetch_assoc($res)) {
                        if($row["admin"]==2) {
                            continue;
                        }
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
            <p>
                <a href="hub2.php" style="text-decoration: none"><input type='button' value='Annuler' style="width: 80px"/></a>
                <input type="submit"  value="Valider" name="valider" style="width: 80px"/>
            </p>
        </fieldset>
    </form>
</div>
</body>

</html>
