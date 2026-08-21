<?php
include "connection.php";
session_start();
$user = $_SESSION["u"];

if (isset($_POST["payment"])) {

    $payment = json_decode($_POST["payment"], true);

    $date = new DateTime();
    $date->setTimezone(new DateTimeZone("Asia/Colombo"));
    $time = $date->format("Y-m-d H-i-s");

    Database::iud("INSERT INTO `order_history` (`oder_id`,`oder_date`,`amount`,`user_id`)
    VALUES ('" . $payment["order_id"] . "','" . $time . "','" . $payment["amount"] . "','" . $user["id"] . "')");

    $orderHistoryId = Database::$connection->insert_id;

    Database::iud("INSERT INTO `order_item` (`oi_qty`,`order_history_ohid`,`stock_stock_id`)
    VALUES ('" . $payment["qty"] . "','" . $orderHistoryId . "','" . $payment["stockId"] . "')");

    $rs = Database::search("SELECT * FROM `stock` WHERE `stock_id` = '" . $payment["stockId"] . "'");
    $d = $rs->fetch_assoc();

    $newQty = $d["qty"] - $payment["qty"];
    Database::iud("UPDATE `stock` SET `qty` = '" . $newQty . "' WHERE `stock_id` = '" . $payment["stockId"] . "'");

    echo("Success");
}
