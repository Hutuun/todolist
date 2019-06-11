<?php
/**
 * Created by PhpStorm.
 * User: Sullivan Honnet
 * Date: 7/06/2019
 * Time: 13:54
 */

include ("database.php");

session_start();

$id = $_SESSION["id"];

$pwd = $_POST["pwd1"];

$sql = "UPDATE suuser SET `password` = '$pwd' WHERE idUser = '$id'";

query($sql);

header("Refresh:0; URL=hub.php");