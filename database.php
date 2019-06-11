<?php
/**
 * Created by PhpStorm.
 * User: Sullivan Honnet
 * Date: 24/05/2019
 * Time: 13:00
 */


$liaison = mysqli_connect("localhost","root","","todolist","3306");
mysqli_set_charset($liaison,'UTF8');


function query($query){
    global $liaison;
    $res = mysqli_query($liaison,$query);

    echo mysqli_error($liaison);

    return $res;

}