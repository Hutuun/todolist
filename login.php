<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
<?php
/**
 * Created by PhpStorm.
 * User: Sulliavn Honnet
 * Date: 24/05/2019
 * Time: 13:00
 */

include ("database.php");

?>
<form action="logged.php" method='post'>
    <div style="text-align: left;">
        <fieldset>
            <legend style="font-size: 21px; font-family: Arial; font-weight: bold">&nbsp;Formulaire de connexion à la TODO list&nbsp;</legend>
            <table><tr>
                    <td>Login : </td><td><input type='text' name='login'></td>
                </tr>
                <tr>
                    <td>Password : </td><td><input type='password' name='pwd'></td>
                </tr>
            </table>
            <input type='submit' value="Connexion"><br>
        </fieldset>
    </div>
</form>

</body>
</html>
