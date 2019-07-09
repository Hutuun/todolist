<?php
/**
 * Created by PhpStorm.
 * User: Sullivan Honnet
 * Date: 27/05/2019
 * Time: 14:41
 *
 * Permet de choisir les informations contenues dans la tâche
 */



session_start();

if(empty($_SESSION["login"])){
    header("Refresh:0;URL=login.php");
}else {
    include("database.php");

    $sql = "SELECT * FROM suuser order by nom,prenom";

    $res = query($sql);


    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>TODO</title>
        <meta charset="utf-8">
        <script>
            function f() {
                var a = document.getElementsByClassName("per")
                var b = false;

                for (var i = 0; i < a.length; i++) {

                    if (a[i].checked) {
                        b = true;
                    }
                }

                return b;
            }
        </script>
        <script src="js/function.js"></script>
    </head>
    <body>
    <h1>Insertion d'une tâche</h1>
    <br/>
    <br/>
    <div class="contenu_page">
        <form id="tache" method="post" onsubmit="return f();" action="insertTache.php">
            <fieldset>
                <legend>&nbsp;Veuillez sélectionner les informations</legend>
                <table>
                    <tr>
                        <td><label style="color: #e60000">Demandé par : </label></td>
                        <?php
                        echo "<td><table>";
                        while ($row = mysqli_fetch_assoc($res)) {
                            if ((strtotime($row["dateFin"]) > time() || strtotime($row["dateFin"]) < 0 || strtotime($row["dateFin"]) == false) && $row["admin"] >= 1) {
                                if ($row["idUser"] == 2) {
                                    echo '<td style="color: #' . $row["color"] . '"><input type="checkbox" checked value="' . $row['idUser'] . '" name="d' . $row['idUser'] . '">' . substr_replace($row['nom'], strtoupper(substr($row['nom'], 0, 1)), 0, 1) . ' ' . substr_replace($row['prenom'], strtoupper(substr($row['prenom'], 0, 1)), 0, 1) . '</td>';
                                } else {
                                    echo '<td style="color: #' . $row["color"] . '"><input type="checkbox" value="' . $row['idUser'] . '" name="d' . $row['idUser'] . '">' . substr_replace($row['nom'], strtoupper(substr($row['nom'], 0, 1)), 0, 1) . ' ' . substr_replace($row['prenom'], strtoupper(substr($row['prenom'], 0, 1)), 0, 1) . '</td>';

                                }
                            }
                        }
                        echo "</table></td>";
                        ?>
                    </tr>
                    <tr>
                        <td><label style="color: #e60000">Utilisateur : </label></td>
                        <?php
                        $sql = "SELECT * FROM suuser order by nom,prenom";

                        $res = query($sql);


                        echo "<td><table>";
                        while ($row = mysqli_fetch_assoc($res)) {
                            if (strtotime($row["dateFin"]) > time() || strtotime($row["dateFin"]) < 0 || strtotime($row["dateFin"]) == false) {
                                echo '<td style="color: #' . $row["color"] . '"><input type="checkbox" class="per"  value="' . $row['idUser'] . '" name="' . $row['idUser'] . '">' . substr_replace($row['nom'], strtoupper(substr($row['nom'], 0, 1)), 0, 1) . ' ' . substr_replace($row['prenom'], strtoupper(substr($row['prenom'], 0, 1)), 0, 1) . '</td>';
                            }
                        }
                        echo "</table></td>";
                        ?></tr>
                    <tr>
                        <td><label style="color: #e60000">Nom de la tâche : </label></td>
                        <td><input type="text" name="nom" style="width: 60%" maxlength="200" required></td>
                    </tr>
                    <tr>
                        <td><label>Base de données : </label></td>
                        <?php
                        echo "<td><table>";

                        $sql = "SELECT * FROM subd";

                        $res = query($sql);

                        while ($row = mysqli_fetch_assoc($res)) {
                            echo '<td style="color: #' . $row["color"] . '"><input type="checkbox"  value="' . $row['idBD'] . '" name="' . $row['idBD'] . '">' . substr_replace($row['nomBD'], strtoupper(substr($row["nomBD"], 0, 1)), 0, 1) . '</td>';
                        }
                        echo "</table></td>";
                        ?>
                    </tr>
                    <tr>
                        <td><label>Priorité : </label></td>
                        <td><select name="prio" style="width:61%">
                                <option value="0">Pas prioritaire</option>
                                <option value="1"> Prioritaire</option>
                                <option value="2">Très prioritaire de niveau 1</option>
                                <option value="3">Très prioritaire de niveau 2</option>
                                <option value='4'>Très prioritaire de niveau 3</option>

                        </td>
                    </tr>
                    <tr>
                        <td><label>Deadline : </label></td>
                        <td><input type="date" name="deadline" style="width:60%"></td>
                    </tr>
                    <tr>
                        <td><label>Description : </label></td>
                        <td><textarea style="resize: none; width: 60%" name="desc" maxlength="1500"></textarea></td>
                    </tr>
                </table>
                <!-- todo Ajouter des statut différent -->
                <table>
                    <tr>
                        <td style="padding-right: 70px"><label>Statut : </label></td>
                        <td style="padding-left: 4px"><input type="checkbox" class="inf" name="wait" value="oui"
                                                             onclick='CocheTout(this.name)'>En attente
                        </td>
                        <td style="padding-left: 4px"><input type="checkbox" class="inf" name="cours" value="En cours"
                                                             onclick='CocheTout(this.name)'>En cours
                        </td>
                        <td style="padding-left: 4px"><input type="checkbox" class="inf" name="test" value="A tester"
                                                             onclick='CocheTout(this.name)'>A tester
                        </td>
                        <td style="padding-left: 4px"><input type="checkbox" class="inf" name="prod"
                                                             value="A mettre en prod" onclick='CocheTout(this.name)'>A
                            mettre en prod
                        </td>
                        <td style="padding-left: 4px"><input type="checkbox" class="inf" name="abandon" value="Abandon"
                                                             onclick='CocheTout(this.name)'>Abandon
                        </td>
                        <td style="padding-left: 4px"><input type="text" class="inf" name="autre" maxlength="20"
                                                             onkeypress="CocheTout(this.name)">Autres
                        </td>
                    </tr>
                </table>
            </fieldset>
            <br/>
            <fieldset style="border: 0px">
                <i style="font-size: 12px; color:#e60000;">Les sections en rouge sont obligatoires</i>
                <p><?php
                    if ($_SESSION["admin"] >= 1) {
                        echo "<label style=\"float: right\">La personne ne se trouve pas dans la liste ? cliquez <a href=\"ajouterUser.php\">ici</a> &nbsp;</label>";
                    }
                    ?></p>

                <br/><br/>
                <p>
                    <a href="hub2.php" style="text-decoration: none"><input type='button' value='Annuler'
                                                                            style="width: 80px"/></a>
                    <input type="submit" value="Nouvelle tâche" name="tache" style="width: 120px"/>
                    <input type="submit" value="Valider" name="valider" style="width: 80px"/>
                </p>
            </fieldset>
        </form>
    </div>
    </body>

    </html>
    <?php
}