<?php

include "connection.php";

$warrenty = $_POST["warrenty"];

// echo($brand); 

if (empty($warrenty)) {
    echo ("Please Enter Your Warrenty Time Period");
} else if (strlen($warrenty) > 20) {
    echo ("Your Warrenty time Period Shuld be less than 20 Characters");
} else {

    $rs = Database::search("SELECT * FROM `warrenty` WHERE `warrenty_time_period` = '" . $warrenty. "'");
    $num = $rs->num_rows;

    if ($num > 0) {
        echo ("Your Warrenty Time Period is allredy exists");
    } else {
        Database::iud("INSERT INTO `warrenty` (`warrenty_time_period`) VALUE ('" . $warrenty . "')");
        echo ("Success");
    }
}
