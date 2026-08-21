<?php

include "connection.php";

$color = $_POST["color"];

// echo($brand); 

if (empty($color)) {
    echo ("Please Enter Your color");
} else if (strlen($color) > 20) {
    echo ("Your color Shuld be less than 20 Characters");
} else {

    $rs = Database::search("SELECT * FROM `color` WHERE `color_name` = '" . $color . "'");
    $num = $rs->num_rows;

    if ($num > 0) {
        echo ("Your color is allredy exists");
    } else {
        Database::iud("INSERT INTO `color` (`color_name`) VALUE ('" . $color . "')");
        echo ("Success");
    }
}
