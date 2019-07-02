<?php
/**
 * Created by PhpStorm.
 * User: Sullivan Honnet
 * Date: 12/06/2019
 * Time: 16:10
 */
include ("database.php");
session_start();


$sql = "SELECT idUser From suuser";

$res = query($sql);

while ($row = mysqli_fetch_assoc($res)) {
    $id = $row["idUser"];
    if(isset($_POST["d$id"])) {
        $demandeur = $_POST["d$id"];
    }
}
$idTache = $_POST["idtache"];

$nom = str_ireplace("\"","'",$_POST["nom"]);
if($nom===""){
    $nom = $_POST["nom"];
}

$prio = $_POST["prio"];
$sql = "SELECT * FROM sutache where idTache='$idTache'";

$res=query($sql);
$row=mysqli_fetch_assoc($res);

$dead = $row["deadline"];
$dd= $row["dateCreation"];
$df = $row["dateSuppr"];
if ($_POST["deadline"]!=="") {
    $dead = $_POST["deadline"];
}

$desc = str_ireplace("\"","'",$_POST["desc"]);
if($desc===""){
    $desc = $_POST["desc"];
}

if ($_POST["dd"]!=="") {
    $dd= $_POST["dd"];
}
if ($_POST["df"]!=="") {
    $df = $_POST["df"];
}
$wait = "non";
if(isset($_POST["wait"])){
    $wait = "oui";
}

$sql = "UPDATE `sutache` SET `nomTache`=\"$nom\",`descriptionTache`=\"$desc\",`idDemandeur`='$demandeur',`priorite`='$prio',`deadline`=\"$dead\",`dateCreation`=\"$dd\",`dateSuppr`=\"$df\", `wait`='$wait'
WHERE `idTache`='$idTache'";

query($sql);
$sql = "SELECT idBD FROM subd";
$res = query($sql);
while ($row = mysqli_fetch_assoc($res)){
    $id = $row["idBD"];
    if(isset($_POST["$id"])){
        $sql = "INSERT INTO sutbd(idBD,idTache) VALUES (\"$id\", \"$idTache\")";
        query($sql,false);
    }
    else{
    $sql = "DELETE FROM sutbd WHERE `idBD`='$id' and `idTache`='$idTache'";
    query($sql,false);
}
}
$sql = "SELECT * From suuser";
$res = query($sql);
$mailto="";

while ($row = mysqli_fetch_assoc($res)) {
    $id = $row["idUser"];
    if(isset($_POST["$id"])) {
        $sql = "INSERT INTO sutuser(idUser, idTache, checked) VALUES (\"$id\",\"$idTache\",0);";
        $r = query($sql,false);

        if($r!==false) {
            $mailto .= $row["mail"] . ",";
        }
    }
    else{
        $sql = "select * from sutuser WHERE `idUser`='$id' and `idTache`='$idTache'";
        $r = query($sql);
        if (mysqli_num_rows($r)>0) {
            $sql = "DELETE FROM sutuser WHERE `idUser`='$id' and `idTache`='$idTache'";
            $r = query($sql,false);
            $mailto .= $row["mail"] . ",";
        }
    }
}

$sql = "SELECT nom, prenom, mail FROM suuser WHERE suuser.idUser = '".$demandeur."' ";


$res = query($sql);

$row = mysqli_fetch_assoc($res);


$mailto .= $row["mail"];

$reply = $row["mail"];

$boundary = md5(uniqid(time()));
$entete = "From: upc.php.sendauto@gmail.com \r\n";
$entete .= "Reply-to: $reply \r\n";
$entete .= "X-Priority: 1 \r\n";
$entete .= "MIME-Version: 1.0 \r\n";
$entete .= "Content-Type: multipart/mixed; boundary=\"$boundary\" \r\n";
$entete .= " \r\n";

$message  = "--$boundary \r\n";
$message .= "Content-Type: text/html; charset=\"UTF8\" \r\n";
$message .= "Content-Transfer-Encoding:8bit \r\n";
$message .= "\r\n";
$message .= "Une nouvelle a été modifiée.";
$message .= "\r\n";
$message .= "--$boundary-- \n";

mail($mailto,"Une de vos tâches a été modifiée",$message,$entete);

header("Refresh:0, URL=hub2.php");