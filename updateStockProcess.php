<?php

include "connection.php";

$productId =  $_POST["p"];
$qty =  $_POST["q"];
$price =  $_POST["up"];

//echo($productId);

if (empty($qty)) {
    echo("Please Enter Your Qty.");
}elseif (!is_numeric($qty)) {
    echo("Only Numbers Can Be Enter Fro Qty.");
}elseif (strlen($qty) > 10) {
    echo("Your Qty Should Be Less Than 10 Characters.");
}else if (empty($price)) {
    echo("Please Enter Your Price.");
}elseif (!is_numeric($price)) {
    echo("Only Numbers Can Be Enter Fro Price.");
}else{
    //echo("Success");

    $rs =  Database::search("SELECT * FROM `stock` WHERE `product_id` = '".$productId."' AND `price` ='".$price."'");
    $n = $rs->num_rows;
    $d = $rs->fetch_assoc();

    if ($n == 1) {
        //Update Query
        $newQty = $d["qty"] + $qty;
        Database::iud("UPDATE `stock` SET `qty` = '".$newQty."' WHERE `stock_id` = '".$d["stock_id"]."'");
        echo("Stock Updated Successfully.");
    }else{

        //Insert Query
        Database::iud("INSERT INTO `stock` (`price`,`qty`,`product_id`) VALUES ('".$price."','".$qty."','".$productId."')");
        echo("New Stock Added Successfully");
    }
}
?>