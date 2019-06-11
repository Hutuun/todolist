<?php
/**
 * Created by PhpStorm.
 * User: Sullivan Honnet
 * Date: 28/05/2019
 * Time: 10:03
 */

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
                    <td><label>Prénom : </label></td>
                    <td><input type="text" name="prenom" style="width: 150%" maxlength="100" required></td>
                </tr>
                <tr>
                    <td><label>Nom : </label></td>
                    <td><input type="text" name="nom" style="width: 150%" maxlength="100" required></td>
                </tr>
                <tr>
                    <td><label>Date de début : </label></td>
                    <td><input type="date" name="dated" style="width: 150%" required></td>
                </tr>
                <tr>
                    <td><label>Date de fin : </label></td>
                    <td><input type="date" name="datef" style="width: 150%" ></td>
                </tr>
                <tr>
                    <td><label>Mail : </label></td>
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
