<?php
/**
 * Created by PhpStorm.
 * User: Sullivan Honnet
 * Date: 24/05/2019
 * Time: 15:27
 */

include ("database.php");

    $id = $_POST["login"];
    $pwd = $_POST["pwd"];

    $sql = "SELECT * FROM suuser ";
    $res = query($sql);


    $b = false;
    while($row = mysqli_fetch_assoc($res)){
        if($row["login"]==="$id" && $row["password"])
            $b = true;
            break;
    }
    if(!$b) {
        header("Refresh:0; URL=login.php");
    }else {

    session_start();



     if(strtotime($row["dateFin"]) > time() || strtotime($row["dateFin"])===false || strtotime($row["dateFin"])<0) {
        if ($row["password"] == "Default" || $row["password"] == "" ) {
            echo "<script>alert(\"Vous avez le mot de passe par défaut, vous allez donc changer de mot de passe!\")</script>";
            $_SESSION["login"] = $row["login"];
            $_SESSION["id"] = $row["idUser"];
            $_SESSION["admin"] = $row["admin"];
            $_SESSION["mdp"] = $row["password"];

            header("Refresh:0; URL=changeMDP.php");
        } else {
            $_SESSION["login"] = $row["login"];
            $_SESSION["id"] = $row["idUser"];
            $_SESSION["admin"] = $row["admin"];

            header("Refresh:0; URL=hub2.php");
        }
     }else{

         header("Refresh:0; URL=login.php");
     }

}


