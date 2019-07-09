<?php
/**
 * Created by PhpStorm.
 * User: Sullivan Honnet
 * Date: 27/05/2019
 * Time: 08:12
 *
 *Permet de changer le mot de passe
 */



session_start();

if(empty($_SESSION["login"])){
    header("Refresh:0;URL=login.php");
}else {
    include("database.php");


    ?>

    <!DOCTYPE html>
    <html>
    <head>
        <title>Changement de mot de passe</title>
        <script> function verif() {
                if (document.forms["ok"]["pwd1"].value !== document.forms["ok"]["pwd2"].value && document.forms["ok"]["pwd1"].value.length) {
                    alert("Mots de passe différent");
                    return false;
                }
            }</script>
    </head>
    <body>

    <form action="insertMDP.php" method="post" id="ok" onsubmit="return verif()">
        <div style="text-align: left;">
            <fieldset>
                <legend>&nbsp;Changement de mot de passe&nbsp;</legend>
                <table>
                    <tr>
                        <td>Password :</td>
                        <td><input type='password' name='pwd1' id="pwd1" maxlength="8" required></td>
                    </tr>
                    <tr>
                        <td>Confirmation password :</td>
                        <td><input type='password' name='pwd2' id="pwd2" maxlength="8" required></td>
                    </tr>
                </table>
                <input type='submit' value="Confirmer" id="button"><br>
            </fieldset>
        </div>
    </form>


    </body>


    </html>
    <?php
}