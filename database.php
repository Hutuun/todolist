<?php
/**
 * Created by PhpStorm.
 * User: Sullivan Honnet
 * Date: 24/05/2019
 * Time: 13:00
 */


$liaison = mysqli_connect("localhost","projetsdr","7Bs3H4b6","projetsdr");
mysqli_set_charset($liaison,'UTF8');


function query($query,$b=true){
    global $liaison;
    $res = mysqli_query($liaison,$query);

    if($b)
        echo mysqli_error($liaison);

    return $res;

}